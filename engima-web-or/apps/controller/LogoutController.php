<?php


/**
 * 
 * LogoutController class
 * Used to log out user from web
 * 
 */

class LogoutController{


    public function invoke(){

        /**
         * 
         * Delete Cookies from Browser and Database
         * 
         */


        $query = "DELETE FROM cookies WHERE user_string = '" . $_COOKIE["user_string"] . "';";
        $db = new DB();

        $db->executeQuery($query);


        /**
         * Set cookie to be expired
         */

        setcookie("user_string","",time()-3600);

        redirect('/login');


    }



}