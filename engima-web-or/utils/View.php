<?php



/**
 * 
 * View Class
 * 
 * 
 */


 class View{


    public static function render($path,$array_of_variables=[]) {

        /**
         * Extract variables
         */

        extract($array_of_variables);
        ob_start();

        require_once($_SERVER["DOCUMENT_ROOT"] . "/views/" . $path . ".php");
        $content = ob_get_contents();
        ob_end_clean();

        echo($content);
        die();

    }

 }