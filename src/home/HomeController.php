<?php

namespace App\home;

use Config\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('movieModel');
    }

    public function index()
    {
        try {
            $movies = $this->movieModel->getAll();

            $this->load->view('home/index', compact('movies'));

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}