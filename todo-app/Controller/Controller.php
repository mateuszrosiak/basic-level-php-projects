<?php

declare(strict_types=1);

namespace App;

require_once('./View/View.php');

class Controller
{
    protected View $view;

    public function __construct()
    {

    }

    public function run(){

        $view = new View();
    }
}