<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($data)
{
    echo '<br>
    <div style="
    background-color: lightgreen;
    border: 1px dotted black; 
    padding: 10px;
    display: inline-block;
    ">';
    print_r($data);
    echo '</div>';
}
