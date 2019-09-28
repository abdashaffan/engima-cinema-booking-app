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

    public function saveProfilePicture()
    { }

    public function encrypt_password()
    { }

    public function addNewUser($data)
    {
        $query =
            "INSERT INTO {$this->table} VALUES
            (
                0, 
                :username,
                :password,
                :email,
                :profile_picture,
                :phone_num
            )";
        $this->db->query($query);
        $this->db->bind('username', $data["username"]);
        $this->db->bind('password', $data["password"]);
        $this->db->bind('email', $data["email"]);
        $this->db->bind('profile_picture', $data["profile_picture"]);
        $this->db->bind('phone_num', $data["phone_num"]);
        $this->db->execute();


        return $this->db->rowCount();
    }
}