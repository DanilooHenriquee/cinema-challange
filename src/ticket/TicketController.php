<?php

namespace App\ticket;

use Config\Controller;

class TicketController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ticketModel');
    }

    public function store()
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);

            if (!isset($data) || empty($data)) {
                throw new \Exception('Dados incorretos, favor verificar');
            }

            foreach ($data['seatId'] as $seat) {
                $this->ticketModel->add($data['userId'], $data['showtimeId'], $seat);
            }

            print json_encode(Array('message' => 'Compra realizada com sucesso!'));
            exit;

        } catch (\Exception $e) {
            print json_encode(Array('error' => true, 'message' => $e->getMessage()));
            exit;
        }
    }

}