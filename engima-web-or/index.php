<?php


require_once("autoload.php");


/**
 * Get request
 */

$request = $_SERVER["REQUEST_URI"];
$controller = NULL;

$request = parse_url($request);


/**Do routing and invoke controllers */

switch($request["path"]){


    case ('/login') :

        $controller = new LoginController();
        break;

    case('/register'):

        $controller = new RegisterController();
        break;

    case('/') :
    case('/home'):

        $controller = new HomeController();
        break;
    case('/detailpage'):
    
        $controller = new DetailpageController();
        break;

    case('/logout') :

        $controller = new LogoutController();
        break;

    case('/api') :

        $controller = new APIController();
        break;

    case('/search') :

        $controller = new SearchController();
        break;

    case('/booking') :

        $controller = new BookingController();
        break;

    case('/transaction') :

        $controller = new TransactionController();
        break;

    case('/deleteReview') :
    case('/review') :

        $controller = new ReviewController();
        break;

}

if ($controller!=NULL){

    $controller->invoke();

}