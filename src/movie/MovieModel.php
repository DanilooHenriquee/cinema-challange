<?php

namespace App\movie;

use Config\Model;

use PDO;

use PDOException;

class MovieModel extends Model
{
    private $table = 'movies';

    private $fillable = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        try {
            $stmt = $this->db->query("SELECT * FROM $this->table WHERE id = $id");

            $movie = $stmt->fetch(PDO::FETCH_ASSOC);

            return $movie;

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getAll()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM $this->table");

            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $movies;

        } catch (PDOException $e) {
            throw $e;
        }
    }

}