<?php


class FilmModel
{
    private $table = 'film';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    //TO DO chane to get all
    public function getAllCurrentFilm()
    {
        $this->db->query(
            "SELECT * FROM {$this->table}"
        );
        return $this->db->resultSet();
    }

    public function getFilmById($id)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE film_id={$id}"
        );
        return $this->db->resultSet()[0];
    }

    public function getResult($keyword)
    {
        $query = "
            SELECT * from {$this->table} WHERE title LIKE :keyword
        ";
        $this->db->query($query);
        $this->db->bind('keyword', "%" . $keyword . "%");
        return $this->db->resultset();
    }
}