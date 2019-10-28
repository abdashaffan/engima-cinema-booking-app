<?php


/**
 * 
 * BookingController
 * 
 */


class BookingController extends Controller{


    public function __construct(){
        
        if(Auth::userAuthenticated()){

            /**
             * Do nothing
             */


        } else {
            
            // Not authenticated
            redirect('/login');

        }
    
    }


    public function invoke(){

        $schedule_id = $_GET["scheduleid"];
        $db = new DB();

        $query = "SELECT * FROM schedules WHERE id=" . $schedule_id . ";";
        $schedule = $db->executeQuery($query)[0];



        /**
         * Get movies
         */

        $query =  "SELECT * FROM movies WHERE id=" . $schedule["movie_id"] . ";";
        
        $movie = $db->executeQuery($query)[0];

        /**
         * Get all seats taken from schedule
         * 
         */

        $query = "SELECT seat FROM orders WHERE schedule_id =" . $schedule["id"] . ";";
        $result = $db->executeQuery($query);

        $seats_taken = [];

        $user = Auth::getCurrentUser();


        foreach($result as $res){

            array_push($seats_taken,$res["seat"]);
        }


        View::render("bookingticket",[
            "schedule"=>$schedule,
            "movie"=>$movie,
            "seats_taken"=>$seats_taken, 
            "user"=>$user
        ]);



    }




}