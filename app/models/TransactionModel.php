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
            "SELECT * FROM {$this->table}"
        );
        return $this->db->resultSet();
    }

    public function getAllUserTransaction($userid)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE user_id==$userid"
        );
        return $this->db->resultSet();
    }
}