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
        $this->db->query(
            "SELECT * FROM {$this->table} t INNER JOIN schedule s ON t.schedule_ID=s.schedule_ID INNER JOIN film f ON s.film_id=f.film_id 
            WHERE t.user_id =:id ORDER BY showtime DESC"           
        );
        $this->db->bind('id', $userid);
        return $this->db->resultSet();
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
}