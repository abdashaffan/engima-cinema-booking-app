<?php


class ReviewModel
{
    private $table = 'review';
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 

    }

    public function addNewUserReview($data)
    {
        $query =
            "INSERT INTO {$this->table} (
                film_id,
                user_id,
                comment,
                rating
            ) VALUES
            (
                :film_id,
                :user_id,
                :comment,
                :rating
            )";
        var_dump($query);
        
        $this->db->query($query);
        $this->db->bind('film_id', $data["film_id"]);
        $this->db->bind('user_id', $data["user_id"]);
        $this->db->bind('comment', $data["comment"]);
        $this->db->bind('rating', $data["rating"]);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getReviewedFilmName($film_id)
    {
        $this->db->query(
            "SELECT title FROM {$this->table} r INNER JOIN film f ON r.film_id=f.film_id WHERE f.film_id = :id"
        );
        $this->db->bind('id', $film_id);
        return $this->db->resultSet();
    }
}
