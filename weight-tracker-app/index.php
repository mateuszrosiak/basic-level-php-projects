<?php

declare(strict_types=1);

namespace App;

require_once("Controller/Controller.php");

$postRequest = $_POST;
$getRequest = $_GET;

$controller = new Controller($postRequest, $getRequest);