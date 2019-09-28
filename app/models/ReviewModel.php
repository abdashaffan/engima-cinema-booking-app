<?php


class ReviewModel
{
    private $table = 'review';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllReviewByFilmId($id)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE film_id={$id}"
        );
        return $this->db->resultSet();
    }
}
