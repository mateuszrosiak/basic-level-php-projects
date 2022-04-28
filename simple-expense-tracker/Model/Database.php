<?php

declare(strict_types = 1);

namespace App;

use PDO;
use PDOException;

class Database
{
    public function __construct(array $dbConfig)
    {
        try {
            $this->createConnection($dbConfig);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function createConnection(array $dbConfig) {
        $dsn = "mysql:dbname={$dbConfig['database']};host={$dbConfig['host']}";

        $this->conn = new PDO(
            $dsn,
            $dbConfig['user'],
            $dbConfig['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    public function createExpense(array $data): void {
        try {
        $name = $this->conn->quote($data['name']);
        $amount = $this->conn->quote($data['amount']);
        $expenseType = $this->conn->quote($data['type']);
        $expenseAddDate = $this->conn->quote($data['date']);

        $sql = "INSERT INTO main(category, name, value, date) VALUES($expenseType, $name, $amount, $expenseAddDate)";

         $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
            exit;
        }
    }

    public function getAllExpenses(): array {
        $sql = "SELECT category, name, value, date FROM main";

        $result = $this->conn->query($sql);

        $expenses = $result->fetchAll();
        return $expenses;
    }

}