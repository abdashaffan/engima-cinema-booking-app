<?php


/**
 * 
 * RegisterController class
 * Used to handle register
 * 
 */


class RegisterController extends Controller{

    public function __construct(){


        if(Auth::userAuthenticated()){

            redirect('/home');
        }

        // Else do nothing

    }

    public function invoke(){

        if ($_SERVER["REQUEST_METHOD"]==="GET"){

            $this->handleGet();

        } else if ($_SERVER["REQUEST_METHOD"]==="POST"){

            $this->handlePost();

        }



    }

    private function handleGet(){

        View::render('auth/register');


    }

    private function handlePost(){


        /**
         * File upload not working for now
         */


        /**
         * 
         * Register new user
         * 
         */

        /**
         * Initial state : All input is already validated
         * 
         */

        $db = new DB();

        $query = "INSERT INTO user ";
        $query = $query . "(`username` , `phone_number` , `email` , `photo_url`, `password`) ";
        $query = $query . "VALUES (";
        
        /**
         * Username
         */
        $query = $query . "'" . $_POST["username"] . "',";

        /**
         * phone number
         */
        $query = $query . "'" . $_POST["phoneNumber"] . "',";

        /**
         * Email
         */
        $query = $query . "'" . $_POST["email"] . "',";

        /**
         * PhotoURL
         */
        $query = $query . "'/public/img/user.jpg',";

        /**
         * Password
         */
        $query = $query . "'" . $_POST["password"] . "');";



        
        $db->executeQuery($query);



        /**
         * Insert cookies
        */

        /**
         *  get Current user
         */

        $query = "SELECT * FROM user WHERE email='" . $_POST["email"] . "';";
        $res = $db->executeQuery($query);

        $user = $res[0];

        $cookies_unique = FALSE;
        while(!$cookies_unique){

            /**
             * Generate random string
             */
            $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%";
            $cookie_string = "";
            for ($i=0; $i<32; $i++){
    
                $cookie_string = $cookie_string . $char[rand(0,66)];
    
            }

            /**
             * Checks whether cookie is unique
             */
            $query = "SELECT * FROM cookies WHERE cookies_string = '" . $cookie_string . "' ";
            $res = $db->executeQuery($query);
            if (count($res)==0){

                /**
                 * Cookies is unique
                 */

                $query = "INSERT INTO `cookies` (`user_id`,`cookies_string`) VALUES ";
                $query = $query . "('" . $user["id"] . "','" . $cookie_string . "');";
                $db->executeQuery($query);
    
                $cookies_unique = TRUE;

                /**
                 * Set cookie
                 */
                setcookie("user_string",$cookie_string,time()+3600);

                /**
                 * Redirect to homepage
                 */

                redirect('/home');


            }
        }

    }




}