<?php


/**
 * 
 * DetailpageController class
 * Used to handle detailpage
 * 
 */


class DetailpageController extends Controller{

    public function __construct(){

        /**
         * Constructor class
         */

         if(Auth::userAuthenticated()){

         } else{
             redirect('/login');
         }

    }

    public function invoke(){
        /**
         * 
         * Display movie detail page
         * 
         */

        /**
         * Get data from DB
         */

         /**
          * Get movie details
          */
        $mov_id = $_GET['id'];
        $db = new DB();
        $query = "SELECT * FROM movies WHERE movies.id = '$mov_id'";
        $review_q = "SELECT AVG(rating) as rate FROM review WHERE review.movie_id = '$mov_id'";
        $reviews = "SELECT *  FROM review JOIN (
            SELECT username,id FROM user) as T 
            ON T.id = review.user_id
            WHERE review.movie_id = '$mov_id'";
        $result = $db->executeQuery($query);
        $rating_result = $db->executeQuery($review_q);
        $reviews = $db->executeQuery($reviews);

        /**
         * Get movie schedules
         */
        $schedule_q = "SELECT * FROM schedules WHERE schedules.movie_id = '$mov_id'";
        $schedule_result = $db->executeQuery($schedule_q); 

        View::render('detailpage',[
            "movie"=>$result,
            "schedules"=>$schedule_result,
            "rating_data"=>$rating_result,
            "reviews"=>$reviews]);
    }
}