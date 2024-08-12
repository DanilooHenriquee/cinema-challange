<?php

namespace App\error;

use Config\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showError(int $code, string $message, array $data = [])
    {
        try {
            switch ($code) {
                case 404:
                default:
                    $this->error404($message, $data);
                    break;
            }
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    private function error()
    {
        // $this->load->view("error/404", Array('message' => $message, 'data'=> $data));
    }

    private function error404($message, $data)
    {
        // Gravar um log de erro se for em ambiente dev
        $this->load->view("error/404");
    }
}