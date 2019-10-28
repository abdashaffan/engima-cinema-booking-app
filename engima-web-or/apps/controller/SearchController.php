<?php

/**
 * Search controller class
 */


class SearchController extends Controller {

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

        $db = new DB();
        $page = $_GET["page"];

        $movie_query = strtolower($_GET["search"]);

        $query = "SELECT * FROM movies WHERE LOWER(name) LIKE '%" .  $movie_query . "%' ";  

        /**
         * Add limit and offset
         */
        if($page==NULL){
            $page=1;
        }
        $query = $query . "LIMIT 3 OFFSET " . ($page-1)*3 . ";";

        $result = $db->executeQuery($query);

        View::render("search",["movies"=>$result,"search_query"=>$_GET["search"],"page"=>$_GET["page"]]);
    }
}