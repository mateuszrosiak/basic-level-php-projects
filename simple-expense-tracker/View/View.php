<?php

namespace App;

class View
{
    public function __construct(array $allExpenses)
    {
        require_once("./layout.php");
    }
}