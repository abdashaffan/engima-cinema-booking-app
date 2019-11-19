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
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE schedule_id = :id ORDER BY seat_number"
        );
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addSeat($schedule_id, $seat_number)
    {
        $query =
            "INSERT INTO {$this->table} (
                schedule_id,
                seat_number
            ) VALUES
            (
                {$schedule_id},
                {$seat_number}
            )";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->lastInsertId();
    }
}
