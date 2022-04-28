<?php

declare(strict_types = 1);

namespace App;

require_once("./debug/debug.php");
require_once("./View/View.php");
require_once("./Model/Database.php");

class Controller
{
    private View $view;
    private Database $database;
    private array $request;


    public function __construct(array $dbConfig, array $request)
    {
        $this->database = new Database($dbConfig);
        $this->request = $request;
    }

    public function run() {
        $postData = $this->getRequest();
        $postParams = [];

        if(!empty($postData)) {
            $this->postparams = [
                'name' => $_POST['name'],
                'amount' => $_POST['amount'],
                'expenseType' => $_POST['type'],
                'expenseAddDate' => $_POST['date']
            ];

            $this->database->createExpense($postData);
        }

        $allExpenses = $this->database->getAllExpenses();

        $this->view = new View($allExpenses);
    }

    private function getRequest(): array
    {
        return $this->request;
    }


}