<?php


class LoginModel
{
    private $table = 'user';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByEmail($email)
    {
        $this->db->query(
            "SELECT email,password,username FROM {$this->table} WHERE email=:email"
        );
        $this->db->bind('email', $email);

        return $this->db->single();
    }
}