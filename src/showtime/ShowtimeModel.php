<?php

namespace App\showtime;

use Config\Model;

use PDO;

use PDOException;

class ShowtimeModel extends Model
{
    private $table = 'showtimes';

    private $fillable = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM $this->table");

            $showtimes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $showtimes;

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getShowtimesByDate($date)
    {
        try {
            $stmt = $this->db->query("SELECT * FROM $this->table WHERE date = '$date'");

            $showtimes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $showtimes;

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getDateShowtimes()
    {
        try {
            $stmt = $this->db->query("SELECT DISTINCT date FROM $this->table");

            $showtimes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $showtimes;

        } catch (PDOException $e) {
            throw $e;
        }
    }

}