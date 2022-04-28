<?php

declare(strict_types = 1);

namespace App;

$dbConfig = require_once("Model/db_config.php");
require_once ("Controller/Controller.php");

$request = $_POST;

$controller = new Controller($dbConfig, $request);
$controller->run();