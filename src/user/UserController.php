<?php

namespace App\user;

use Config\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->service('userService');
    }

    public function edit($id)
    {
        $user = [
            "name" => "Danilo Henrique Costa Farias",
            "age" => 28,
            "id"=> "111",
        ];

        $this->load->view('user/index', compact('user'));
    }

    public function update()
    {
        try {
            $data = $_POST;

            // Validação dos dados

            echo json_encode($data);
            exit;

            $this->userService->update($data['id'], $data);

        } catch (\Exception $e) {
            print $e->getMessage();
            exit;
        }
    }

}