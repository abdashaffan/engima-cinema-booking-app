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
        $result = file_get_contents(TRANSACTION_WS_URL . "/api/transaksi");
        $transactions = json_decode($result,true)["response"];
        $user_transactions= [];
        foreach ($transactions as $transaction){
            if($transaction["id_pengguna"]==$userid){
                array_push($user_transactions,$transaction);
            }
        }
        return $user_transactions;
        
        
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
        foreach($transactions as $transaction){
            if ($transaction["status_transaksi"]=='pending'){
                $tranc_time = new DateTime($transaction["waktu_pembuatan_transaksi"]);
                $tranc_endtime = new DateTime($transaction["waktu_pembuatan_transaksi"]);
                $tranc_endtime->modify('+2 minutes');

                # Adjust timezone to Indonesia
                $tranc_time->setTimeZone(new DateTimeZone("Asia/Jakarta"));
                $tranc_endtime->setTimeZone(new DateTimeZone("Asia/Jakarta"));
                # Check whether a transaction occured between time and endtime of transaction
                # Get soap body
                # Harga fixed to 30000
                $request_body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:k03="http://K03G04Tubes2.org/">' . PHP_EOL;
                $request_body = $request_body . '  <soapenv:Header/>' . PHP_EOL;
                $request_body = $request_body . '  <soapenv:Body>' . PHP_EOL;
                $request_body = $request_body . '    <k03:isTransactionExist>' . PHP_EOL;
                $request_body = $request_body . '      <to_account>' . $transaction["va_tujuan"]. ' </to_account>' . PHP_EOL;
                $request_body = $request_body . '        <nominal>30000</nominal>' . PHP_EOL;
                $request_body = $request_body . '        <!--Optional:-->' . PHP_EOL;
                $request_body = $request_body . '        <begin_date>' . $tranc_time->format("Y:m:d H:i:s") .'</begin_date>' . PHP_EOL;
                $request_body = $request_body . '        <!--Optional:-->' . PHP_EOL;
                $request_body = $request_body . '        <end_date>' . $tranc_endtime->format("Y:m:d H:i:s") .'</end_date>' . PHP_EOL;
                $request_body = $request_body . '    </k03:isTransactionExist>' . PHP_EOL;
                $request_body = $request_body . '  </soapenv:Body>' . PHP_EOL;
                $request_body = $request_body . '  </soapenv:Envelope>' . PHP_EOL;

                #  adjust header for SOAP
                print(strlen($request_body));
                print($request_body);
                $headers = array(
                    "Accept-Encoding: gzip,deflate",
                    "Content-Type: text/xml;charset=UTF-8",
                    "SOAPAction: \"\"", 
                    "Content-length: ".strlen($request_body),
                    "Host: " . BANK_WS_URL,
                    "Connection: Keep-Alive",
                    "User-Agent: Apache-HttpClient/4.1.1 (java 1.5)",
                );

                $url = "http://" . BANK_WS_URL . "/services/bankpro";
                print($url);
                # curl
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body); // the SOAP request
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);
            
                # search true or false
                if(strstr($response,"true")){
                    echo "ketemu !";
                } else {
                    echo "tidak !"; 
                }
            }
        }


        exit();
    }
}