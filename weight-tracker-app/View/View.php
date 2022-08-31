<?php

namespace App;

class View
{

    public function __construct(array $allEntries)
    {
        require_once("./layout.php");
    }
}