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

        # Check if schedule exists
        # If not then create new schedules
        # Else just return available schedules
        $result = $this->db->resultSet();
        if(!$result){
            $this->addScheduleByFilmId($id);

            # Get again 
            $this->db->query(
                "SELECT {$this->table}.schedule_id, showtime, count FROM {$this->table}  LEFT JOIN (SELECT schedule_id, COUNT(*) AS count FROM seats GROUP BY(schedule_id)) as count_seat ON {$this->table}.schedule_id=count_seat.schedule_id WHERE film_id={$id}"
            );
            $result = $this->db->resultSet();
        }
        return $result;
    }

    public function getScheduleByScheduleId($id)
    {
        $this->db->query(
            "SELECT  * FROM {$this->table}  WHERE schedule_id={$id}"
        );
        return $this->db->resultSet()[0];
    }

    private function addScheduleByFilmId($id){

        # Add film by id
        # Id from TheMovieDB
        # Schedule added for seven days after the show
        # Schedule will be hardcoded
        # For each of the days, there will be only ONE schedule (CMON, we're testing !)

        // idk how to access the film model
        $film_model = new FilmModel();
        $film = $film_model->getFilmByIdTMDB($id);
        $release_date = new DateTime($film["release_date"]);
        for ($i=0;$i<7;$i++){
            $playing_time = $release_date->modify("+{$i} days");
            $hour = rand(8,22);
            $playing_time = $playing_time->modify("+{$hour} hours");
            $query = "INSERT INTO {$this->table} (
                film_id,
                showtime
            ) VALUES 
            (
                :film_id,
                :showtime
            );";
            $this->db->query($query);
            $this->db->bind('film_id',$id);
            $this->db->bind('showtime',$playing_time->format("Y:m:d H:i:s"));
            $this->db->execute();
        }

        # return nothing (??)
    }
}