<?php

namespace App\user;

use Config\Model;

use PDO;

use PDOException;

class UserModel extends Model
{
    private $table = 'users';

    private $fillable = [
        'id',
        'name',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM $this->table");

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE email = :email");

            $stmt->execute(['email' => $email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                print json_encode(Array('error' => true, 'message' => 'Usuário não encontrado!'));
                exit;
            }

            return $user;

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function add(array $data)
    {
        try {
            $sql = "INSERT INTO `users` (`name`, cellphone, email, `password`) 
                VALUES (:name, :cellphone, :email, :password)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':cellphone', $data['cellphone'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);

            $stmt->execute();

            return true;

        } catch (PDOException $e) {
            print "Erro ao inserir o usuário: " . $e->getMessage();
            exit;
        }
    }
}