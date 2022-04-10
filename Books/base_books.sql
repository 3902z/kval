-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 18:12
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `b`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `b_author` varchar(255) DEFAULT '' COMMENT 'Автор книги',
  `b_title` varchar(255) DEFAULT '' COMMENT 'Название книги',
  `b_publisher` varchar(255) DEFAULT '' COMMENT 'Издательство',
  `b_year` varchar(4) DEFAULT '' COMMENT 'Год издания',
  `b_cost` int(11) DEFAULT 0 COMMENT 'Стоимость книги',
  `b_available` int(1) DEFAULT 0 COMMENT 'Наличие книги'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Книги';

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `b_author`, `b_title`, `b_publisher`, `b_year`, `b_cost`, `b_available`) VALUES
(1, 'Автор 1', 'Книга 1', 'дом', '1233', 1123, 1),
(2, 'Автор 2', 'Книга 2', 'дом 33', '1234', 1111, 1),
(5, 'Автор 5', 'Книга 5', 'дом 11', '1111', 0, 0),
(6, 'Автор 7', 'Книга 8', 'дом 11', '1122', 0, 0),
(7, 'Автор 9', 'Книга 7', 'дом 55', '1124', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `books_requests`
--

CREATE TABLE `books_requests` (
  `book_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица связи книг и заявок';

--
-- Дамп данных таблицы `books_requests`
--

INSERT INTO `books_requests` (`book_id`, `request_id`) VALUES
(5, 1),
(6, 2),
(7, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT '' COMMENT 'ФИО заказчика',
  `request_date` date DEFAULT NULL COMMENT 'Дата заявки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заявки на книги';

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `customer_name`, `request_date`) VALUES
(1, 'Иванов Р.Р.', '2022-04-28'),
(2, 'Иванов С.С.', '2022-04-23'),
(3, 'Иванов А.А.', '2022-04-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_requests`
--
ALTER TABLE `books_requests`
  ADD PRIMARY KEY (`book_id`,`request_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_requests`
--
ALTER TABLE `books_requests`
  ADD CONSTRAINT `FK_Book` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Requests` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
