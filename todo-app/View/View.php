<?php

declare(strict_types=1);

namespace App;

class View
{
    protected array $params;

    public function __construct(array $params)
    {
        $this->params = $params;
        require_once('./layout.php');
    }
}