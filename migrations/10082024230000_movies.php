<?php

class Movies
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS movies (
                    id INT auto_increment NOT NULL,
                    title varchar(100) NOT NULL,
                    `description` TEXT NOT NULL,
                    duration varchar(30) NOT NULL,
                    score DECIMAL(10,2) NOT NULL,
                    release_date TIMESTAMP NOT NULL,
                    image TEXT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT movies_pk PRIMARY KEY (id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);

        /**
         * Você é um amigo, amigo.
         */
        $insertSql = "INSERT INTO movies 
                        (title, `description`, duration, score, release_date, image)
                    VALUES
                        ('Deadpool', 'O anti-herói sarcástico Deadpool embarca em sua primeira aventura cheia de ação e humor ácido.', '1:30', 9.8, CURRENT_TIMESTAMP, 'assets/img/deadpool-1.jpg'),
                        ('Deadpool 2', 'Deadpool retorna em uma sequência explosiva, enfrentando novos desafios e fazendo aliados inesperados.', '1:30', 9.8, CURRENT_TIMESTAMP, 'assets/img/deadpool-2.webp'),
                        ('Deadpool & Wolverine', 'Deadpool une forças com Wolverine para enfrentar uma ameaça poderosa em uma aventura épica.', '1:30', 10, CURRENT_TIMESTAMP, 'assets/img/deadpool-3.jpg');";

        $db->exec($insertSql);
    }
}