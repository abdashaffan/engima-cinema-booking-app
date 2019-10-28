<?php


/**
 * 
 * Review Resource Controller
 * 
 */

class ReviewController extends Controller{


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

        switch($_SERVER["REQUEST_METHOD"]){
            
            
            case("GET") :
                $url = parse_url($_SERVER["REQUEST_URI"]);
                if($url["path"]==="/deleteReview"){

                    $this->delete();

                } else {

                    $this->get();

                }

                break;

            case("POST") :

                $this->post();
                break;
        
        }


    }

    private function delete(){

        $db = new DB();
        $user = Auth::getCurrentUser();


        $query = "DELETE FROM review WHERE movie_id=" . $_GET["movieid"] ." AND user_id=" . $user["id"]. ";";
        $db->executeQuery($query);

        redirect("/transaction");

    }

    private function get(){


        $db = new DB();
        $user = Auth::getCurrentUser();

        $query = "SELECT * FROM movies WHERE id=" . $_GET["movieid"] . ";";
        $movie = $db->executeQuery($query)[0];

        $query ="SELECT * FROM review WHERE movie_id=" . $_GET["movieid"] ." AND user_id=" . $user["id"]. ";";


        $result = $db->executeQuery($query)[0];

        print_r($result["rating"]);
        View::render("userReview",["review"=>$result,"movie"=>$movie]);

    }

    private function post(){


        $rate = $_POST["rate"];
        $comment = $_POST["subject"];
        $movie_id = $_POST["movieid"];
        $user = Auth::getCurrentUser();


        //DELETE and INSERT
        $query = "DELETE FROM review WHERE movie_id=" . $movie_id . " AND user_id=" . $user["id"] . ";";
        $db = new DB();

        $db->executeQuery($query);

        $query = "INSERT INTO review (`user_id`, `movie_id`, `rating`, `review`) VALUES (";
        $query = $query . $user["id"] . "," . $movie_id . "," . $rate . ",'" . $comment . "');";

        $db->executeQuery($query);

        redirect("/transaction");



    }
}