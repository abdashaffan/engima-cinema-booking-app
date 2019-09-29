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
        date_default_timezone_set(date_default_timezone_get());
        $currentDate = date('Y-m-d', time());
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE release_date = :date"
        );
        $this->db->bind('date', $currentDate);
        return $this->db->resultSet();
    }

    public function getFilmById($id)
    {   
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE film_id={$id} "
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