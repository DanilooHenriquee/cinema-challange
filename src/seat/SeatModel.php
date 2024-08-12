<?php

namespace App\seat;

use Config\Model;

use PDO;

use PDOException;

class SeatModel extends Model
{
    private $table = 'seats';

    private $fillable = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function getSeatsByShowtimeId($showtimeId)
    {
        try {
            $stmt = $this->db->query("SELECT
                                            seats.id AS seat_id,
                                            seats.*,
                                            CASE
                                                WHEN tickets.id IS NOT NULL THEN 0
                                                ELSE 1
                                            END AS available
                                        FROM
                                            seats
                                        INNER JOIN
                                            seat_layouts ON seat_layouts.id = seats.seat_layout_id
                                        INNER JOIN
                                            halls ON halls.seat_layout_id = seat_layouts.id
                                        LEFT JOIN
                                            tickets ON tickets.seat_id = seats.id AND tickets.showtime_id = $showtimeId
                                        WHERE
                                            halls.id = (
                                                SELECT hall_id
                                                FROM showtimes
                                                WHERE id = $showtimeId
                                            )
                                        ");



            $seats = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $seats;

        } catch (PDOException $e) {
            throw $e;
        }
    }

}