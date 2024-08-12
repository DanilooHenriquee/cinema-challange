<?php

namespace Config;

use Config\Database;
use PDOException;

class Migration
{
    private $db;

    public function __construct() 
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
        $this->run();
    }

    private function run()
    {
        $this->createMigrationsTable();
        $executedMigrations = $this->getExecutedMigrations();
        $newMigrations = $this->getNewMigrations($executedMigrations);

        foreach ($newMigrations as $migration) {
            require_once $migration;
            $migrationClassName = $this->getClassNameFromFile($migration);
            $migrationInstance = new $migrationClassName();
            $migrationInstance->up($this->db);

            $this->recordMigration($migration);
        }
    }

    private function createMigrationsTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS migrations (
                migration BIGINT PRIMARY KEY
            )";
            $this->db->exec($sql);
        } catch (PDOException $e) {
            die("Erro ao criar a tabela de migrations: " . $e->getMessage());
        }
    }

    private function getExecutedMigrations()
    {
        try {
            $stmt = $this->db->query("SELECT migration FROM migrations");
            return $stmt->fetchAll(\PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            die("Erro ao buscar as migrations executadas: " . $e->getMessage());
        }
    }

    private function getNewMigrations($executedMigrations)
    {
        $allMigrations = glob(__DIR__ . '/../migrations/*.php');
        return array_filter($allMigrations, function($migration) use ($executedMigrations) {
            $migrationNumber = $this->getMigrationNumberFromFile($migration);
            return !in_array($migrationNumber, $executedMigrations);
        });
    }

    private function getClassNameFromFile($filePath)
    {
        $fileName = basename($filePath, '.php');
        $className = ucfirst(explode('_', $fileName, 2)[1]);
        return $className;
    }

    private function getMigrationNumberFromFile($filePath)
    {
        $fileName = basename($filePath, '.php');
        $migrationNumber = explode('_', $fileName, 2)[0];
        return $migrationNumber;
    }

    private function recordMigration($migration)
    {
        try {
            $migrationNumber = $this->getMigrationNumberFromFile($migration);
            $stmt = $this->db->prepare("INSERT INTO migrations (migration) VALUES (:migration)");
            $stmt->execute([':migration' => $migrationNumber]);
        } catch (PDOException $e) {
            die("Erro ao registrar a migration: " . $e->getMessage());
        }
    }
}