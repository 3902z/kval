CREATE TABLE `Tickets` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `t_date` DATE NULL
        DEFAULT NULL COMMENT 'Дата въезда',
    `t_time` TIME NULL
        DEFAULT NULL COMMENT 'Время въезда',
    `t_price` INT(11) NULL
        DEFAULT 0 COMMENT 'Стоимость',
    `t_status` INT(1) NULL
        DEFAULT 0 COMMENT 'Статус оплаты',
    PRIMARY KEY (`id`)
)
    COMMENT='Квитанции'
ENGINE=InnoDB
;

CREATE TABLE `Clients` (
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `client_name` VARCHAR(255) NULL
       DEFAULT '' COMMENT 'ФИО заказчика',
   `car_number` VARCHAR(255) NULL
       DEFAULT '' COMMENT 'Номер машины',
   `car_brand` VARCHAR(255) NULL
       DEFAULT '' COMMENT 'Марка машины',
   `salary` INT(5) NULL
       DEFAULT 0 COMMENT 'Скидка',
   PRIMARY KEY (`id`)
)
    COMMENT='Клиенты'
ENGINE=InnoDB
;

CREATE TABLE `Clients_Tickets` (
   `client_id` INT(11) NOT NULL,
   `ticket_id` INT(11) NOT NULL,
   PRIMARY KEY (`client_id`, `ticket_id`),
   INDEX `client_id` (`client_id`),
   INDEX `ticket_id` (`ticket_id`),
   CONSTRAINT `FK_Clients` FOREIGN KEY (`client_id`)
       REFERENCES `Clients` (`id`) ON DELETE CASCADE,
   CONSTRAINT `FK_Tickets` FOREIGN KEY (`ticket_id`)
       REFERENCES `Tickets` (`id`) ON DELETE CASCADE
)
    COMMENT='Таблица связи клиентов и квитанций'
ENGINE=InnoDB
;