<?php


/**
 * 
 * Class to handle
 * AJAX Request
 * 
 */


class APIController extends Controller{


    /**
     * 
     * private data to represent URI cascades
     * 
     */

    private $data;

    public function invoke(){

        /**
         * 
         * Check what API is invoked
         * 
         */
        $this->data = json_decode(file_get_contents("php://input"),TRUE);
        $function = $this->data["function"];        

        $res = $this->$function();

        /**
         * Serialize data to JSON
         */

        header('Content-Type: application/json');
        echo json_encode($res);

    }


    private function checkIfUsernameUnique(){



        $db = new DB();
        $query = "SELECT * FROM user WHERE username='" . $this->data["username"] . "';";
        $res = $db->executeQuery($query);

        if(count($res)==0){

            return ["unique"=>TRUE];

        } else {

            return ["unique"=>FALSE];
        }

    }

    private function checkIfEmailUnique(){



        $db = new DB();
        $query = "SELECT * FROM user WHERE email='" . $this->data["email"] . "';";
        $res = $db->executeQuery($query);

        if(count($res)==0){

            return ["unique"=>TRUE];

        } else {

            return ["unique"=>FALSE];
        }

    }

    private function checkIfPhoneUnique(){

        $db = new DB();
        $query = "SELECT * FROM user WHERE phone_number='" . $this->data["phoneNumber"] . "';";
        $res = $db->executeQuery($query);

        if(count($res)==0){

            return ["unique"=>TRUE];

        } else {

            return ["unique"=>FALSE];
        }



    }

    private function checkSubmission(){

        $db = new DB();
        $query = "SELECT * FROM user WHERE phone_number='" . $this->data["phoneNumber"] . "' ";
        $query = $query . "OR email='" . $this->data["email"] . "' ";
        $query = $query . "OR username='" . $this->data["username"] . "';";
        $res = $db->executeQuery($query);

        if(count($res)==0){

            return ["unique"=>TRUE];

        } else {

            return ["unique"=>FALSE];
        }


    }

    private function bookSeats(){

        $db = new DB();
        $query = "INSERT INTO orders (`schedule_id`,`user_id`,`seat`) ";
        print($this->data["schedule_id"]);
        $query = $query . "VALUES (" . $this->data["schedule_id"] . "," . $this->data["user_id"] . "," . $this->data["seat"] . ");";
        $db->executeQuery($query);

        $query = "UPDATE schedules SET num_seats = num_seats - 1 WHERE id=" . $this->data["schedule_id"] . ";";
        $db->executeQuery($query);

        return ["bookstatus"=>"success"];
 
    }

}