<?php

namespace App;

use Error;
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

    public function createConnection(): void
    {
        $config = [
            "host"     => "db-basic-php-projects",
            "dbname"   => "weights",
            "username" => "weights_admin",
            "password" => "weights_admin_pass",
        ];

        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";

        $this->conn = new PDO(
            $dsn,
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
    }

    public function getAllEntries(): array
    {
        $sql = 'SELECT id, date, weight FROM entries';

        $result = $this->conn->query($sql);

        $weights = $result->fetchAll();

        return $weights;
    }

    public function addEntry(array $params): void
    {
        try {
            $date   = $this->conn->quote($params['date']);
            $weight = $this->conn->quote($params['weight']);

            $sql = "INSERT INTO entries(date,weight) VALUES($date, $weight)";
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new error($e->getMessage());
            exit;
        }
    }

    public function deleteEntry(int $noteId): void
    {
        try {
            $sql = "DELETE FROM entries WHERE id=($noteId)";
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new error($e->getMessage());
            exit;
        }
    }

}