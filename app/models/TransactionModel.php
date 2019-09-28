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
            WHERE t.user_id =:id"           
        );
        $this->db->bind('id', $userid);
        return $this->db->resultSet();
    }
}