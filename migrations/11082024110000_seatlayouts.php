<?php

class Seatlayouts
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS seat_layouts (
                    id INT auto_increment NOT NULL,
                    `description` TEXT NOT NULL,
                    `rows` INT NOT NULL,
                    `columns` INT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT seat_layouts_pk PRIMARY KEY (id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);

        $insertSql = "INSERT INTO seat_layouts 
                        (`description`, `rows`, `columns`)
                    VALUES
                        ('Modelo com 10 fileiras e 10 cadeiras', 10, 10),
                        ('Modelo com 10 fileiras e 10 cadeiras', 10, 10),
                        ('Modelo com 10 fileiras e 10 cadeiras', 10, 10);";

        $db->exec($insertSql);
    }
}