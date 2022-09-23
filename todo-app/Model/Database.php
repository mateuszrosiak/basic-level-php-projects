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

    public function getAllEntries(): array
    {
        $sql = 'SELECT id, date, task, `due-date` from entries';

        $result = $this->conn->query($sql);

        $tasks = $result->fetchAll();

        return $tasks;
    }

    public function addTask(array $params): void {

        try {
            $date = $this->conn->quote($params['date']);
            $task = $this->conn->quote($params['task']);
            $dueDate = $this->conn->quote($params['due-date']);

            $sql = "INSERT INTO entries(date, task, `due-date`) VALUES($date, $task, $dueDate)";
            $this->conn->exec($sql);
            header('Location: ./');

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function deleteTask(int $id): void {
        try {
            $sql = "DELETE FROM entries WHERE id={$id}";
            $this->conn->exec($sql);
            header('Location: ./');

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}