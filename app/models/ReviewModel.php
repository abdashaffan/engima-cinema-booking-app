<?php


class ReviewModel
{
    private $table = 'review';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllReviewAndUserByFilmId($id)
    {
        $this->db->query(
            "SELECT comment, rating, username, profile_picture FROM review NATURAL JOIN user WHERE film_id={$id}"
        );
        return $this->db->resultSet();
    }
}
