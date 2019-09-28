<?php


class RegisterModel
{
    private $table = 'user';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function validateUsername()
    {
        $username = $_GET['username'];
        var_dump($username);
    }
}