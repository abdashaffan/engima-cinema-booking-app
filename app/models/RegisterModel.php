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
        #
        #   TODO
        #

        return false;
    }

    public function saveProfilePicture()
    {
        #
        #   TODO
        #
    }

    public function encrypt_password()
    {
        #
        #   TODO
        #
    }

    public function addNewUser($data)
    {
        // $data['id'] = '';
        $query =
            "INSERT INTO {$this->table} (
                username,
                password,
                email,
                profile_picture,
                phone_num   
            ) VALUES
            (
                :username,
                :password,
                :email,
                :profile_picture,
                :phone_num
            )";
        var_dump($query);
        $this->db->query($query);
        $this->db->bind('username', $data["username"]);
        $this->db->bind('password', $data["password"]);
        $this->db->bind('email', $data["email"]);
        $this->db->bind('profile_picture', $data["profile_picture"]);
        $this->db->bind('phone_num', $data["phone_num"]);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            $this->model("Login")->setLoginCookie($data["username"]);
        }
        return $this->db->rowCount();
    }
}