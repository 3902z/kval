CREATE TABLE `Penalties` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `p_date` DATE NULL
        DEFAULT NULL COMMENT 'Дата нарушения',
    `p_time` TIME NULL
        DEFAULT NULL COMMENT 'Время нарушения',
    `p_type` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Вид нарушения',
    `p_amount` INT(11) NULL
        DEFAULT NULL COMMENT 'Размер штрафа',
    PRIMARY KEY (`id`)
)
    COMMENT='Штрафы'
ENGINE=InnoDB
;

CREATE TABLE `Cars` (
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `car_number` VARCHAR(255) NULL
       DEFAULT '' COMMENT 'Номер машины',
   PRIMARY KEY (`id`)
)
    COMMENT='Машины'
ENGINE=InnoDB
;

CREATE TABLE `Cars_Penalties` (
   `car_id` INT(11) NOT NULL,
   `penalty_id` INT(11) NOT NULL,
   PRIMARY KEY (`car_id`, `penalty_id`),
   INDEX `car_id` (`car_id`),
   INDEX `penalty_id` (`penalty_id`),
   CONSTRAINT `FK_Penalties` FOREIGN KEY (`penalty_id`)
       REFERENCES `Penalties` (`id`) ON DELETE CASCADE,
   CONSTRAINT `FK_Car` FOREIGN KEY (`car_id`)
       REFERENCES `Cars` (`id`) ON DELETE CASCADE
)
    COMMENT='Таблица связи машин и штрафов'
ENGINE=InnoDB
;