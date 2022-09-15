<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

class Database
{

    public function __construct()
    {
        try {
            $this->createConnection();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    private function createConnection(): void
    {
        $config = [
            'host'     => 'db-basic-php-projects',
            'dbname'   => 'todo',
            'user'     => 'todo_admin',
            'password' => 'admin',
        ];

        $dsn
            = "mysql:dbname={$config['dbname']};host={$config['host']};charset=utf8";

        $this->conn = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
    }

//    public function getAllEntries(): array
//    {
//        $sql = 'SELECT '
//    }
}