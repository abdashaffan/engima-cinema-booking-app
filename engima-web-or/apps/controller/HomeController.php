<?php


/**
 * 
 * HomeController
 * Class for home
 * 
 */



class HomeController extends Controller{


    public function __construct(){

        /**
         * 
         * Constructor class
         * 
        */

        if(Auth::userAuthenticated()){




        } else {
            
            // Not authenticated
            redirect('/login');

        }


    }

    public function invoke(){

        /**
         * 
         * Display homepage
         * 
         */

        /**
         * Get data from DB
         */

        $db = new DB();
        $query = "SELECT * FROM movies LIMIT 10";
        $result = $db->executeQuery($query);
        View::render('home',["movies"=>$result]);

    }


}