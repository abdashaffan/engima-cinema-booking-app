<?php



/**
 * 
 * LoginController class
 * Used to control login
 * 
 */


class LoginController extends Controller{



    public function __construct(){

        if(Auth::userAuthenticated()){

            redirect('/home');
        }

        // Else do nothing

    }

    public function invoke(){

        if($_SERVER["REQUEST_METHOD"] === "GET"){

            $this->handleGet();

        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $this->handlePost();

        } else {

            /**
             * No handling for this moment
             * Should throw to METHOD_NOT_ALLOWED , but for now
             * die()
             */
            die();
        }

    }

    private function handleGet(){

        
        View::render('auth/login');

    }

    private function handlePost(){

        /**
         * 
         * Handle Login Request
         * 
         */

        if(isset($_POST["username"])&&isset($_POST["password"])){

            $username = $_POST["username"];
            $password = $_POST["password"];
        
            /**
             * Find username and password match
             * Password is NOT hashed
             * 
             */

            
            
            $query = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "';";
        
            $db = new DB();
        
            $user = $db->executeQuery($query);
        
            if(count($user) == 0){
        
                /**
                 * No user is found
                 */

                View::render('auth/login');
                

            }
        
            $user = $user[0];
        
        
            /**
             * 
             * Checks whether cookies for this particular user exists
             * 
             */
            $query = "SELECT * FROM cookies WHERE user_id = '" . $user["id"] . "';";
            $res = $db->executeQuery($query);
            if(count($res)>0){

                /**
                 * 
                 * Delete user's cookies, maybe expired
                 * But can be because someone has accessed it from other place(s)
                 * 
                 */

                $query = "DELETE FROM cookies WHERE user_id = " . $user["id"] . ";";
                $db->executeQuery($query);



            }
        
            /**
             * Set cookies
            */

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
        

        
        
        } else {

            /** The POST request is not understood */
            $view->render("auth/login");
        
        }

    }
}