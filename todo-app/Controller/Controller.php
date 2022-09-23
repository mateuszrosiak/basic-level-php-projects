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
        $entries = $this->database->getAllEntries();

        if (count($_GET) > 0) {
            if ($this->request->getGetData()['action'] === 'delete') {
                $id = (int) $this->request->getGetData()['id'];
                $this->database->deleteTask($id);
            }
        }


        if ($this->request->isPost()) {
            $postData = $this->request->getPostData();
            if ( ! empty($postData)) {
                $postParams = [
                    'date'     => $postData['date'],
                    'task'     => $postData['task'],
                    'due-date' => $postData['due-date'],
                ];

                $this->database->addTask($postParams);
            }
        }
        $view = new View($entries);
    }
}