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
        # Now we're going to fetch user transaction data
        # However, now the data is stored separately, so we need to 

        // $this->db->query(
        //     "SELECT * FROM {$this->table} t INNER JOIN schedule s ON t.schedule_ID=s.schedule_ID INNER JOIN film f ON s.film_id=f.film_id 
        //     WHERE t.user_id =:id ORDER BY showtime DESC"           
        // );
        // $this->db->bind('id', $userid);
        // return $this->db->resultSet();

        # Inititate 
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

}