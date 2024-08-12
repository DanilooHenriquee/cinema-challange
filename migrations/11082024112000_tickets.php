<?php

class Tickets
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS tickets (
                    id INT auto_increment NOT NULL,
                    user_id INT NOT NULL,
                    showtime_id INT NOT NULL,
                    seat_id INT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT tickets_pk PRIMARY KEY (id),
                    CONSTRAINT users_FK FOREIGN KEY (user_id) REFERENCES `users`(id),
                    CONSTRAINT showtimes_FK FOREIGN KEY (showtime_id) REFERENCES `showtimes`(id),
                    CONSTRAINT seats_FK FOREIGN KEY (seat_id) REFERENCES `seats`(id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);
    }
}