<?php

/**
 * Autoload file
 * Load all classes necessary
 */



/**
 * 
 * Controllers
 * 
 */

require_once("apps/controller/Controller.php");
require_once("apps/controller/LoginController.php");
require_once("apps/controller/Controller.php");
require_once("apps/controller/RegisterController.php");
require_once("apps/controller/HomeController.php");
require_once("apps/controller/LogoutController.php");
require_once("apps/controller/APIController.php");
require_once("apps/controller/DetailpageController.php");
require_once("apps/controller/SearchController.php");
require_once("apps/controller/BookingController.php");
require_once("apps/controller/TransactionController.php");
require_once("apps/controller/ReviewController.php");

/**
 * Utils and Auth
 */
require_once("utils/Redirect.php");
require_once("apps/auth/Auth.php");
require_once("utils/DB.php");
require_once("utils/View.php");