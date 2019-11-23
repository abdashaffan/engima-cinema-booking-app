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

    public function deleteSeat($schedule_id,$chair){
        $query = "DELETE FROM seats WHERE schedule_id= :s_id AND seat_number= :sn;";
        $this->db->query($query);
        $this->db->bind("s_id",$schedule_id);
        $this->db->bind("sn",$chair);
        $this->db->execute();   
    }
}