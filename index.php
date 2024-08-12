<?php

session_start();

require_once(dirname(__FILE__) ."/vendor/autoload.php");

use \Config\Migration;

new Migration();

use \Config\Router;

(new Router())->run();