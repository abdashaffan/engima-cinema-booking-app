<?php


class FilmModel
{
    private $table = 'film';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    //TODO changee to get all
    //TODO fix review decimal
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
}