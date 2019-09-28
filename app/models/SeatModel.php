<?php

class SeatModel
{
    private $table = 'seats';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSeatByScheduleId($id)
    {   
        $this->db->query("SELECT * FROM {$this->table} WHERE schedule_id={$id}"
        );
        return $this->db->resultSet();
    }
}
