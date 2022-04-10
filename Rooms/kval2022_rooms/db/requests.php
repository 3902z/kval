<?php

function mysqlAddRequest($name, $type, $action, $floor, $footage) {
    $sql = "SELECT * FROM rooms WHERE r_type='{$type}' 
                      AND r_action='{$action}'
                      AND r_floor='{$floor}'
                      AND r_footage='{$footage}'
                      AND r_available=1";
    $rooms = query($sql);
    if (!$rooms) {
        $sql = "INSERT INTO rooms (r_type, r_action, r_floor, r_footage, r_available) 
                VALUES ('{$type}', '{$action}', '{$floor}', '{$footage}', 0)";
        $roomId = insert($sql);
        $sql = "INSERT INTO requests (customer_name) VALUES('{$name}')";
        $requestId = insert($sql);
        $sql = "INSERT INTO rooms_requests (room_id, request_id) VALUES('{$roomId}', '{$requestId}')";
        insert($sql);
        return $requestId;
    } else {
        return $rooms;
    }
}

function mysqlGetRoomByType($type) {
    $sql = "SELECT * FROM rooms WHERE r_type='{$type}'";
    return query($sql);
}

function mysqlGetRoomByAction($action) {
    $sql = "SELECT * FROM rooms WHERE r_action='{$action}'";
    return query($sql);
}

