<?php



/**
 * 
 * Redirect util
 * 
 */


function redirect($url, $status=302){


    /**
     * Status code mapper
     */

    $status_dictionary = [
        302 => "302 Found",
        400 => "400 Bad Request",
        403 => "403 Forbidden",
        404 => "404 Not Found"
    ];

    header("HTTP/1.1 " . $status_dictionary[$status]);
    header("Location : " . $url, "HTTP/1.1 ");
    die();

}