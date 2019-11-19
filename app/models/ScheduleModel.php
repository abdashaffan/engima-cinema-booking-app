<?php


class ScheduleModel
{
    private $table = 'schedule';
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    //TODO: ubah jadi yg blom lewat hari ini
    //TODO: ubah count seatnya itung yg occupied doang
    public function getAllScheduleByFilmId($id)
    {
        $this->db->query(
            "SELECT {$this->table}.schedule_id, showtime, count FROM {$this->table}  LEFT JOIN (SELECT schedule_id, COUNT(*) AS count FROM seats GROUP BY(schedule_id)) as count_seat ON {$this->table}.schedule_id=count_seat.schedule_id WHERE film_id={$id}"
        );
        return $this->db->resultSet();
    }

    public function getScheduleByScheduleId($id)
    {
        $this->db->query(
            "SELECT  * FROM {$this->table}  WHERE schedule_id={$id}"
        );
        return $this->db->resultSet()[0];
    }
}