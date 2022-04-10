<?php

function mysqlAddPenalty($carName, $penaltyDate, $penaltyTime, $penaltyType, $penaltyAmount) {
    $sql = "SELECT cars.id FROM cars WHERE car_number='{$carName}' LIMIT 1";
    if($carId = query($sql)) {
        $carId = $carId[0]['id'];
        $sql = "INSERT INTO Penalties (p_date, p_time, p_type, p_amount) 
                VALUES ('{$penaltyDate}','{$penaltyTime}', '{$penaltyType}','{$penaltyAmount}')";
        $penaltyId = insert($sql);
        $sql = "INSERT INTO Cars_Penalties (car_id, penalty_id) 
                        VALUES ('{$carId}', '{$penaltyId}')";
        insert($sql);
        return $penaltyId;
    } else {
        $sql = "INSERT INTO Penalties (p_date, p_time, p_type, p_amount) 
                VALUES ('{$penaltyDate}','{$penaltyTime}', '{$penaltyType}','{$penaltyAmount}')";
        $penaltyId = insert($sql);
        $sql = "INSERT INTO Cars (car_number) 
                        VALUES ('{$carName}')";
        $carId = insert($sql);
        $sql = "INSERT INTO Cars_Penalties (car_id, penalty_id) 
                        VALUES ('{$carId}', '{$penaltyId}')";
        insert($sql);
        return $penaltyId;
    }
}

function mysqlGetPenaltiesByDate($date1, $date2) {
    $sql = "SELECT * FROM penalties WHERE p_date BETWEEN '{$date1}' AND '{$date2}'";
    return query($sql);
}

function getMaxPenalties() {
    $sql = "SELECT cars.car_number as c_name, COUNT(cars_penalties.penalty_id) as p_count FROM cars_penalties JOIN cars WHERE cars.id=cars_penalties.car_id GROUP BY cars_penalties.car_id ORDER BY p_count DESC";
    return  query($sql);
}

