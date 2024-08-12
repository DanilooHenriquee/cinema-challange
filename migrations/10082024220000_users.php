<?php

class Users
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT auto_increment NOT NULL,
                    `name` varchar(255) NOT NULL,
                    cellphone varchar(100) NOT NULL,
                    email varchar(255) NOT NULL,
                    `password` varchar(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT users_pk PRIMARY KEY (id),
                    CONSTRAINT users_unique UNIQUE KEY (email)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);
    }
}