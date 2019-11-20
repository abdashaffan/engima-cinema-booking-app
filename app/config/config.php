<?php


define('PROJECT_NAME', 'engima');
define('ROOT',  "{$_SERVER["DOCUMENT_ROOT"]}/" . PROJECT_NAME);
define('DEFAULT_CONTROLLER', 'HomeController');
define('DEFAULT_METHOD', 'index');
// GANTI SESUAI NAMA FILE MASING"
define('BASE_URL', 'http://localhost/' . PROJECT_NAME . '/public');
// GANTI SESUAI CONFIG MYSQL MASING"
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'tubes_wbd_1');
define('BASE_CSS', "/" . PROJECT_NAME . "/public/css/base.css");
define('BASE_JS', "/" . PROJECT_NAME . "/public/js/index.js");
define('TRANSACTION_WS_URL','localhost:3000');