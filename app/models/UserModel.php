<?php


class UserModel
{
    private $nama = 'Abda Shaffan D';
    private $id =1;

    public function getUser()
    {
        return $this->nama;
    }
    public function getUserID()
    {
        return $this->id;
    }

}