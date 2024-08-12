<?php

namespace App\ticket;

use Config\Model;

use PDO;

use PDOException;

class TicketModel extends Model
{
    private $table = 'tickets';

    private $fillable = [
        'id',
        'name',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function add($user_id, $showtime_id, $seat_id)
    {
        try {
            $sql = "INSERT INTO `tickets` (user_id, showtime_id, seat_id) 
                VALUES (:user_id, :showtime_id, :seat_id)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':showtime_id', $showtime_id, PDO::PARAM_INT);
            $stmt->bindParam(':seat_id', $seat_id, PDO::PARAM_INT);

            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            print "Erro ao inserir o pedido de compra: " . $e->getMessage();
            exit;
        }
    }
}