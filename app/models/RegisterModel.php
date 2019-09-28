<?php


class RegisterModel
{
    private $table = 'user';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function checkIfUsernameExist($usernameInput)
    {
        // var_dump($usernameInput);
        return false;
    }
}