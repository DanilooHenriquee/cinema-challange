<?php

class Halls
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS halls (
                    id INT auto_increment NOT NULL,
                    seat_layout_id INT NOT NULL,
                    `name` VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT halls_pk PRIMARY KEY (id),
                    CONSTRAINT halls_seat_layouts_FK FOREIGN KEY (seat_layout_id) REFERENCES `seat_layouts`(id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);

        $insertSql = "INSERT INTO halls 
                        (seat_layout_id, `name`)
                    VALUES
                        (1, 'Sala 01'),
                        (2, 'Sala 02'),
                        (3, 'Sala 03');";

        $db->exec($insertSql);
    }
}