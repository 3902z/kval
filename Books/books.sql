CREATE TABLE `Books` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `b_author` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Автор книги',
    `b_title` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Название книги',
    `b_publisher` VARCHAR(255) NULL
        DEFAULT '' COMMENT 'Издательство',
    `b_year` VARCHAR(4) NULL
        DEFAULT '' COMMENT 'Год издания',
    `b_cost` INT(11) NULL
        DEFAULT 0 COMMENT 'Стоимость книги',
    `b_available` INT(1) NULL
        DEFAULT 0 COMMENT 'Наличие книги',
    PRIMARY KEY (`id`)
)
    COMMENT='Книги'
ENGINE=InnoDB
;

CREATE TABLE `Requests` (
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `customer_name` VARCHAR(255) NULL
       DEFAULT '' COMMENT 'ФИО заказчика',
   `request_date` DATE NULL
       DEFAULT NULL COMMENT 'Дата заявки',
   PRIMARY KEY (`id`)
)
    COMMENT='Заявки на книги'
ENGINE=InnoDB
;

CREATE TABLE `Books_Requests` (
   `book_id` INT(11) NOT NULL,
   `request_id` INT(11) NOT NULL,
   PRIMARY KEY (`book_id`, `request_id`),
   INDEX `book_id` (`book_id`),
   INDEX `request_id` (`request_id`),
   CONSTRAINT `FK_Requests` FOREIGN KEY (`request_id`)
       REFERENCES `Requests` (`id`) ON DELETE CASCADE,
   CONSTRAINT `FK_Book` FOREIGN KEY (`book_id`)
       REFERENCES `Books` (`id`) ON DELETE CASCADE
)
    COMMENT='Таблица связи книг и заявок'
ENGINE=InnoDB
;