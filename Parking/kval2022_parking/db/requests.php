<?php

function mysqlAddTicket($name, $carNumber, $carBrand, $date, $time, $price) {
    $sql = "SELECT clients.id FROM clients WHERE car_number='{$carNumber}'";
    $clientId = query($sql);
    if ($clientId) {
        $sql = "INSERT INTO tickets (t_date, t_time, t_price, t_status) 
                VALUES ('{$date}','{$time}','{$price}',0)";
        $ticketId = insert($sql);
        $sql = "INSERT INTO clients_tickets (client_id, ticket_id) 
                VALUES ('{$clientId[0]['id']}', '{$ticketId}')";
        insert($sql);
        return $ticketId;
    } else {
        $sql = "INSERT INTO clients (client_name, car_number, car_brand, salary) 
                VALUES ('{$name}','{$carNumber}','{$carBrand}', 0)";
        $clientId = insert($sql);
        $sql = "INSERT INTO tickets (t_date, t_time, t_price, t_status) 
                VALUES ('{$date}','{$time}','{$price}',0)";
        $ticketId = insert($sql);
        $sql = "INSERT INTO clients_tickets (client_id, ticket_id) 
                VALUES ('{$clientId}', '{$ticketId}')";
        insert($sql);
        return $ticketId;
    }
}

function mysqlGetNoCash() {
    $sql = "SELECT * FROM tickets WHERE t_status=0";
    return query($sql);
}
