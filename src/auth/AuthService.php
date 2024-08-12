<?php

namespace App\auth;

use Config\Service;

class AuthService extends Service
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('userModel');

    }

    public function authentication($email, $password)
    {
        try {

            $user = $this->userModel->getUserByEmail($email);

            if ($password != $user['password']) {
                throw new \Exception('Email ou senha inválido!');
            }

            return $user;

        } catch (\Exception $e) {
            throw $e;
        }
    }

}