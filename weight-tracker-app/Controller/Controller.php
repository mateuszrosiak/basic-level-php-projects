<?php

namespace App;

require_once("./View/View.php");
require_once("./Model/Database.php");

class Controller
{
    public View $view;
    protected Database $database;
    private $postRequest;
    private $getRequest;


    public function __construct(array $postRequest, array $getRequest)
    {
        $this->database    = new Database();
        $this->postRequest = $postRequest;
        $this->getRequest  = $getRequest;
        $this->run();
    }


    private function run()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postData = $this->postRequest();
            if ( ! empty($postData)) {
                $postParams = [
                    'weight' => $postData['weight'],
                    'date'   => $postData['date'],
                ];

                $this->database->addEntry($postData);
            }
        }

        if (count($_GET) > 0) {
            if ($this->getRequestGet()['action'] == 'delete') {
                $noteId = $this->getRequestGet()['id'];

                $this->database->deleteEntry($noteId);

                header('Location: ./');
            }
        }

        $allEntries = $this->database->getAllEntries();

        $this->view = new View($allEntries);
    }


    public function postRequest(): array
    {
        return $this->postRequest;
    }

    public function getRequestGet(): array
    {
        return $this->getRequest ?? [];
    }

}