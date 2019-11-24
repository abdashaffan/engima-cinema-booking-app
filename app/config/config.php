<?php


define('PROJECT_NAME', 'engima');
define('ROOT',  "{$_SERVER["DOCUMENT_ROOT"]}/" . PROJECT_NAME);
define('DEFAULT_CONTROLLER', 'HomeController');
define('DEFAULT_METHOD', 'index');
// GANTI SESUAI NAMA FILE MASING"
define('BASE_URL', 'https://ec2-107-21-68-151.compute-1.amazonaws.com/' . PROJECT_NAME . '/public');
// GANTI SESUAI CONFIG MYSQL MASING"
define('DB_HOST', 'database-1.cmqcolum2oyw.us-east-1.rds.amazonaws.com');
define('DB_USER', 'rootroot');
define('DB_PASS', 'rootroot');
define('DB_NAME', 'tubes_1_wbd');
define('BASE_CSS', "/" . PROJECT_NAME . "/public/css/base.css");
define('BASE_JS', "/" . PROJECT_NAME . "/public/js/index.js");
define('TRANSACTION_WS_URL', 'http://localhost:3000');
define('BANK_WS_URL', 'localhost:8080');
