<?php

declare(strict_types=1);

namespace App;

require_once('./View/View.php');
require_once('./Model/Database.php');
require_once('./Request/Request.php');

class Controller
{
    protected View $view;
    protected Database $database;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->database = new Database();
        $this->request  = $request;
    }

    public function run()
    {
        if(!$this->request->isPost())
        {
            print_r($this->request->getGetData());
        }

        $view = new View();
    }
}