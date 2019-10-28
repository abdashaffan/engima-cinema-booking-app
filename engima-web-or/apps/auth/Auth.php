<?php



/**
 * 
 * Auth class
 * Used to authorize user
 * 
 */



class Auth{


    private static $redirect_url = "/login";

    public static function userAuthenticated(){

        /**
         * 
         * Authorize whether user has logged in
         * If so, do nothing
         * Else, redirect to login page
         * 
        */

        $cookie_string = $_COOKIE["user_string"];

        // Get user in database

        $db = new DB();
        $query = "SELECT * FROM cookies WHERE cookies_string = '" . $cookie_string . "' ";
        $res = $db->executeQuery($query);
        if(count($res)==0){

            /**
             * 
             * False !
             * 
             */

            return False;
        
        } else {

            return True;



        }




    }

    public static function getCurrentUser(){

        /**
         * 
         * Get current user's info
         * 
         */

        $cookie_string = $_COOKIE["user_string"];

        $db = new DB();

        $query = "SELECT user_id FROM cookies WHERE cookies_string = '" . $cookie_string . "';";
        $result = $db->executeQuery($query);


        if(count($result)==0){

            return NULL;
        }

        /**
         * Get user
         */

        $query = "SELECT * FROM user WHERE id = " . $result[0]["user_id"] . ";";
        $result = $db->executeQuery($query);



        if(count($result)==0) {

            return NULL;
        
        } else {

            return $result[0];
        }



    }




}