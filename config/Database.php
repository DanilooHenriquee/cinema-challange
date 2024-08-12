<?php

namespace Config;

use PDO;

require_once(ROOT."env.php");

class Database 
{
    private static $instance = null;
    private $dbname;
    private $db;

    private function __construct()
    {
        try {
            $this->dbname = DB_DATABASE;

            $dsn = "mysql:host=" . DB_HOST;
            $user = DB_USERNAME;
            $pass = DB_PASSWORD;

            $this->db = new PDO($dsn, $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->createDatabase();

            $this->useDatabase();

        } catch (\Exception $e) {
            print 'Error: ' . $e->getMessage();
            exit;
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    private function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS {$this->dbname}";

            $this->db->exec($sql);

        } catch (\Exception $e) {
            print 'Error: ' . $e->getMessage();
            exit;
        }
    }

    private function useDatabase()
    {
        try {

            $this->db->exec("USE $this->dbname");

        } catch (\Exception $e) {
            print 'Error: ' . $e->getMessage();
            exit;
        }
    }

    public function getConnection()
    {
        return $this->db;
    }

}