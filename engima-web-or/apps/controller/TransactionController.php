<?php


/**
 * 
 * Transaction Controller
 * 
 */

class TransactionController{

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

        $user = Auth::getCurrentUser();

        $query = "SELECT * FROM (SELECT name, date, time, schedule_id, movie_id"; 
        $query = $query . " FROM (SELECT date, time, schedule_id, movie_id FROM ";
        $query = $query . "schedules JOIN orders ON schedules.id = orders.schedule_id ";
        $query = $query . "WHERE orders.user_id =" . $user["id"]. ") as order_schedule ";
        $query = $query . "JOIN movies ON order_schedule.movie_id = movies.id) AS ";
        $query = $query . "ordered_movies LEFT OUTER JOIN (SELECT movie_id as reviewed_movie_id ";
        $query = $query . "FROM review WHERE user_id = " . $user["id"]. ") AS review_table ON ";
        $query = $query . "ordered_movies.movie_id = review_table.reviewed_movie_id;";

        $db = new DB();
        $result = $db->executeQuery($query);
        
        View::render("transaction",["movies"=>$result]);

    }

}