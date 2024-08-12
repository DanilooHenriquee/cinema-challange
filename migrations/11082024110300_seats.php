<?php

class Seats
{
    public function up($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS seats (
                    id INT auto_increment NOT NULL,
                    seat_layout_id INT NOT NULL,
                    `row` INT NOT NULL,
                    `column` INT NOT NULL,
                    seat_code VARCHAR(10) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                    CONSTRAINT seats_pk PRIMARY KEY (id),
                    CONSTRAINT seats_seat_layouts_FK FOREIGN KEY (seat_layout_id) REFERENCES `seat_layouts`(id)
                )
                ENGINE=InnoDB
                DEFAULT CHARSET=utf8mb4
                COLLATE=utf8mb4_general_ci;";

        $db->exec($sql);

        /**
         * Gerar os registros padrões
         * Não quero fazer outra migration '-'
         */
        $seatLayouts = [
            ['id' => 1, 'description' => 'Sala 01'],
            ['id' => 2, 'description' => 'Sala 02'],
            ['id' => 3, 'description' => 'Sala 03'],
        ];
        
        foreach ($seatLayouts as $layout) {
            $seatLayoutId = $layout['id'];
            $rows = 10;
            $columns = 10;
        
            for ($row = 0; $row < $rows; $row++) {
                $rowLetter = chr(65 + $row);
        
                for ($col = 1; $col <= $columns; $col++) {
                    $seatCode = $rowLetter . $col;
        
                    $insertSql = "INSERT INTO seats (seat_layout_id, `row`, `column`, seat_code) VALUES (?, ?, ?, ?)";
                    $stmt = $db->prepare($insertSql);
                    $stmt->execute([$seatLayoutId, $row + 1, $col, $seatCode]);
                }
            }
        }
    }

}