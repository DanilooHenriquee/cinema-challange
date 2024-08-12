<?php

namespace App\auth;

use Config\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->service('authService');
        $this->load->service('userService');
        $this->load->model('userModel');

    }

    public function create()
    {
        try {
            $this->load->view('auth/form');
        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    public function store()
    {
        try {
            $data = $_POST;

            $this->userService->store($data);

            echo json_encode(Array('message' => 'Cadastro realizado com sucesso!'));
            exit;

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    public function login()
    {
        try {
            $this->load->view('auth/login');
        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

    public function authentication()
    {
        try {
            $data = $_POST;

            $user = $this->authService->authentication($data['email'], $data['password']);

            $_SESSION['user'] = $user;

            echo json_encode(Array('message' => 'Usuário autenticado com sucesso!'));
            exit;

        } catch (\Exception $e) {
            print json_encode(Array('error' => true, 'message' => $e->getMessage()));
            exit;
        }
    }

    public function logout()
    {
        // destruir a sessão
    }

}