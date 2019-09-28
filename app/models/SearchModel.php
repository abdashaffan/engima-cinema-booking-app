<?php


class SearchModel
{
    private $table = 'film';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function countResult($keyword)
    {
        $query = "
            SELECT * from {$this->table} WHERE title LIKE :keyword
        ";
        $this->db->query($query);
        $this->db->bind('keyword', "%" . $keyword . "%");
        return $this->db->resultset();
    }
}