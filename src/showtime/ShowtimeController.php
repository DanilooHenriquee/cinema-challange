<?php

namespace App\showtime;

use Config\Controller;

class ShowtimeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('showtimeModel');
    }

    public function getAvailableHours()
    {
        try {
            $date = json_decode(file_get_contents('php://input'), true);

            $showtimes = $this->showtimeModel->getShowtimesByDate($date['showtimeDate']);

            print json_encode(Array('showtimes' => $showtimes));
            exit;

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}