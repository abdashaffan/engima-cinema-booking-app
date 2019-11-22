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
        //occupied di hardcode karena sebenernya gak kepake
        //cuma kalo dihapus dbnya jadi corrupt...
        $query =
            "INSERT INTO {$this->table} (
                schedule_id,
                occupied,
                seat_number
            ) VALUES
            (
                {$schedule_id},
                1,
                {$seat_number}
            )";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->lastInsertId();
    }
}