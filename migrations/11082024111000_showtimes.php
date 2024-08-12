<?php

class Showtimes
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS showtimes (
                    id INT auto_increment NOT NULL,
                    movie_id INT NOT NULL,
                    hall_id INT NOT NULL,
                    `date` DATE NOT NULL,
                    `time` TIME NOT NULL,
                    price DECIMAL(10,2) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT showtimes_pk PRIMARY KEY (id),
                    CONSTRAINT movies_FK FOREIGN KEY (movie_id) REFERENCES `movies`(id),
                    CONSTRAINT halls_FK FOREIGN KEY (hall_id) REFERENCES `halls`(id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);

        $insertSql = "INSERT INTO showtimes 
                        (movie_id, hall_id, `date`, `time`, price)
                    VALUES
                        (1, 1, '2024-08-12', '13:30:00', 18.00),
                        (1, 1, '2024-08-12', '19:40:00', 33.00),

                        (2, 2, '2024-08-12', '15:30:00', 18.00),
                        (2, 2, '2024-08-12', '21:40:00', 33.00),

                        (3, 3, '2024-08-12', '16:00:00', 18.00),
                        (3, 3, '2024-08-12', '20:00:00', 33.00),

                        (1, 1, '2024-08-13', '13:30:00', 18.00),
                        (1, 1, '2024-08-13', '19:40:00', 33.00),

                        (2, 2, '2024-08-13', '15:30:00', 18.00),
                        (2, 2, '2024-08-13', '21:40:00', 33.00),

                        (3, 3, '2024-08-13', '16:00:00', 18.00),
                        (3, 3, '2024-08-13', '20:00:00', 33.00);";

        $db->exec($insertSql);
    }
}