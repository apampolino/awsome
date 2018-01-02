<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Manila');

define("HTTP_HOST", "http://awsome.local/");
define("CONFIG_PATH", "../app/config/config.php");
define("CONTROLLERS_PATH", "../app/controllers/");
define("VIEWS_PATH", "../app/views/");
define("MODELS_PATH", "../app/models/");
define("VIEWS_CACHE_PATH", "../cache/");

require_once '../vendor/autoload.php';
require_once '../vendor/awsome/src/Helper/helper_functions.php';

use \Awsome\Core\AwsomeApplication as App;

$app = new App;

require_once '../app/config/Routes.php';

$app->run();






