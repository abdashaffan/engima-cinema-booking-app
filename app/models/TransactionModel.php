<?php


class TransactionModel
{
    private $table = 'transaction';
    private $db;
    

    public function __construct()
    {
        $this->db = new Database();
    }

    //TO DO chane to get all
    public function getAllTransaction()
    {
        $this->db->query(
            "SELECT * FROM {$this->table} t INNER JOIN schedule s ON t.schedule_ID=s.schedule_ID INNER JOIN film f ON s.film_id=f.film_id"
        );
        return $this->db->resultSet();
    }

    public function getAllUserTransaction($userid)
    {

        # Get all transactions from WS URL
        # Ineffective, but working for this current moment
        $result = file_get_contents(TRANSACTION_WS_URL . "/api/transaksi/" . $userid);
        $transactions = json_decode($result,true)["response"];
        
        return $transactions["results"];
        
        
    }
    public function delReviewTransactionUpdate($transid){
        // set Transaction Status by id
        $query2=
            "UPDATE transaction t
            SET status=0
            WHERE transaction_id=:id And status=1 ;
            ";
        $this->db->query($query2);
        $this->db->bind('id', $transid);
        $this->db->execute();
    }
    public function getPairReviewId($transid,$userid){
        $query2=
            "SELECT review_id
            FROM transaction t INNER JOIN schedule s ON t.schedule_id=s.schedule_id INNER JOIN review r ON s.film_id=r.film_id 
            WHERE transaction_id=:trans AND user_id=:user ;
            ";
        $this->db->query($query2);
        $this->db->bind('trans', $transid);
        $this->db->bind('user', $userid);
        $this->db->execute();   
    }

    public function addTransaction($data)
    {
        $query =
            "INSERT INTO {$this->table} (
                user_id,
                seat_id,
                schedule_id,
                status
            ) VALUES
            (
                :user_id,
                :seat_id,
                :schedule_id,
                0
            )";

        $this->db->query($query);
        $this->db->bind('user_id', $data["user_id"]);
        $this->db->bind('seat_id', $data["seat_id"]);
        $this->db->bind('schedule_id', $data["schedule_id"]);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function updateAllTransactions(){
        # Does not return anything

        # Fetch the data
        # Get current time

        $timeNow = new DateTime();
        $data = file_get_contents(TRANSACTION_WS_URL . "/api/transaksi");
        $json_data = json_decode($data,true);
        $transactions = $json_data["response"];
        try {
            foreach($transactions as $transaction){
                if ($transaction["status_transaksi"]=='PENDING'){
    
                    $check = $this->checkIfTransactionIsPaid($transaction);
    
                    if($check==true){
    
                        $this->setStatus($transaction,"SUCCESS");
    
                    } else if ($check==false) {
                        $tranc_endtime = new DateTime($transaction["waktu_pembuatan_transaksi"]);
                        $tranc_endtime->modify('+2 minutes');
                        $tranc_endtime->setTimeZone(new DateTimeZone("Asia/Jakarta"));
                        if($tranc_endtime >= $timeNow){
                            # Transaction can still be paid
                            # Keep pending status
                        } else {
                            $this->setStatus($transaction,"CANCELLED");
                        }
                    }
                }
            }
        } catch(Exception $e){
            echo "Error ! " . $e->getMessage();
            die();
        }
        
    }

    private function checkIfTransactionIsPaid($transaction){

        $tranc_time = new DateTime($transaction["waktu_pembuatan_transaksi"]);
        $tranc_endtime = new DateTime($transaction["waktu_pembuatan_transaksi"]);
        $tranc_endtime->modify('+2 minutes');

        # Adjust timezone to Indonesia
        $tranc_time->setTimeZone(new DateTimeZone("Asia/Jakarta"));
        $tranc_endtime->setTimeZone(new DateTimeZone("Asia/Jakarta"));
        # Check whether a transaction occured between time and endtime of transaction
        # Get SOAP request, price fixed at 30000

        $request_body = $this->getTransactionSOAPBody(
            $transaction["va_tujuan"],
            $tranc_time->format("Y:m:d H:i:s"),
            $tranc_endtime->format("Y:m:d H:i:s"));

        $headers = $this->getTransactionSOAPHeader(strlen($request_body));
        $url = "http://" . BANK_WS_URL . "/services/bankpro";
        # curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        # Return without parsing
        if(strstr($response,"true")){
            return true;
        } else if (strstr($response,"false")){
            return false;
        } else {
            return null;
        }


    }

    private function getTransactionSOAPBody($va_number,$begin_time,$end_time){

        $request_body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:k03="http://K03G04Tubes2.org/">' . PHP_EOL;
        $request_body = $request_body . '  <soapenv:Header/>' . PHP_EOL;
        $request_body = $request_body . '  <soapenv:Body>' . PHP_EOL;
        $request_body = $request_body . '    <k03:isTransactionExist>' . PHP_EOL;
        $request_body = $request_body . '      <to_account>' . $va_number. ' </to_account>' . PHP_EOL;
        $request_body = $request_body . '        <nominal>30000</nominal>' . PHP_EOL;
        $request_body = $request_body . '        <!--Optional:-->' . PHP_EOL;
        $request_body = $request_body . '        <begin_date>' . $begin_time .'</begin_date>' . PHP_EOL;
        $request_body = $request_body . '        <!--Optional:-->' . PHP_EOL;
        $request_body = $request_body . '        <end_date>' . $end_time .'</end_date>' . PHP_EOL;
        $request_body = $request_body . '    </k03:isTransactionExist>' . PHP_EOL;
        $request_body = $request_body . '  </soapenv:Body>' . PHP_EOL;
        $request_body = $request_body . '  </soapenv:Envelope>' . PHP_EOL;


        return $request_body;
    }

    private function getTransactionSOAPHeader($len_of_request_body){

        $headers = array(
            "Accept-Encoding: gzip,deflate",
            "Content-Type: text/xml;charset=UTF-8",
            "SOAPAction: \"\"", 
            "Content-length: ".$len_of_request_body,
            "Host: " . BANK_WS_URL,
            "Connection: Keep-Alive",
            "User-Agent: Apache-HttpClient/4.1.1 (java 1.5)",
        );

        return $headers;

    }

    private function setStatus($transaction,$status){
        $ch = curl_init();
        $url = TRANSACTION_WS_URL . "/api/transaksi/" . $transaction["id_transaksi"];
        $request_body = json_encode(["status"=>$status]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$request_body);


        curl_exec($ch);
        curl_close($ch);

    }
}