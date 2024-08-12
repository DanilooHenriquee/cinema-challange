<?php

namespace App\movie;

use Config\Controller;

class MovieController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('movieModel');
        $this->load->model('showtimeModel');
    }

    public function details($id)
    {
        try {

            $user = isset($_SESSION['user']) ? $_SESSION['user'] : ['name' => 'guest'];
            $movie = $this->movieModel->get($id);
            $showtimes = $this->showtimeModel->getDateShowtimes();

            $this->load->view('movie/details', compact('movie', 'showtimes', 'user'));

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}