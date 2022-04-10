CREATE TABLE `Rooms` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `r_type` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Вид комнаты(1-комната,2,3,студия)',
    `r_action` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Тип сделки (обмен, продажа, покупка)',
    `r_floor` INT(5) NULL
        DEFAULT 1 COMMENT 'Этаж',
    `r_footage` INT(10) NULL
        DEFAULT 10 COMMENT 'Метраж',
    `r_available` INT(1) NULL
        DEFAULT 0 COMMENT 'Наличие квартиры',
    PRIMARY KEY (`id`)
)
    COMMENT='Квартиры'
ENGINE=InnoDB
;

CREATE TABLE `Requests` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `customer_name` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'ФИО заказчика',
--     `room_type` VARCHAR(255) NULL
--         DEFAULT '' COMMENT 'Тип квартиры',
--     `room_action` VARCHAR(255) NULL
--         DEFAULT '' COMMENT 'Тип сделки',
--     `room_floor` INT(5) NULL
--         DEFAULT 1 COMMENT 'Этаж',
--     `room_footage` INT(10) NULL
--         DEFAULT 10 COMMENT 'Метраж',
    PRIMARY KEY (`id`)
)
    COMMENT='Заявки на квартиры'
ENGINE=InnoDB
;

CREATE TABLE `Rooms_Requests` (
    `room_id` INT(11) NOT NULL,
    `request_id` INT(11) NOT NULL,
    PRIMARY KEY (`room_id`, `request_id`),
    INDEX `room_id` (`room_id`),
    INDEX `request_id` (`request_id`),
    CONSTRAINT `FK_Rooms` FOREIGN KEY (`room_id`)
        REFERENCES `Rooms` (`id`) ON DELETE CASCADE,
    CONSTRAINT `FK_Request` FOREIGN KEY (`request_id`)
        REFERENCES `Requests` (`id`) ON DELETE CASCADE
)
    COMMENT='Таблица связи квартир и заявок'
ENGINE=InnoDB
;