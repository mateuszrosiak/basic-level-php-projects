<?php

declare(strict_types=1);

namespace App;

require_once('./Controller/Controller.php');
require_once('./Request/Request.php');

$request = new Request($_POST, $_GET);

$controller = new Controller($request);
$controller->run();
