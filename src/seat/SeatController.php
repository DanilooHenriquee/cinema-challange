<?php

namespace App\seat;

use Config\Controller;

class SeatController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('seatModel');
    }

    public function getSeatsByShowtimeId()
    {
        try {
            $hall = json_decode(file_get_contents('php://input'), true);

            $seats = $this->seatModel->getSeatsByShowtimeId($hall['showtimeId']);

            print json_encode(Array('seats' => $seats));
            exit;

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}