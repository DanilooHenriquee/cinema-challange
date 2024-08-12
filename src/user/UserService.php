<?php

namespace App\user;

use Config\Service;

class UserService extends Service
{
    public function __construct() 
    {
        parent::__construct();

        $this->load->model('userModel');
    }

    public function store(array $data)
    {
        try {
            $this->userModel->add($data);

            return true;

        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }

    public function update(int $id, array $data)
    {
        try {
            // dd([$id, $data]);

            // Se Chegou aqui os campos obrigatórios já foram validados.

            // fazer o tratamento e chamar o model

            $this->userModel->update($id, $data);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}