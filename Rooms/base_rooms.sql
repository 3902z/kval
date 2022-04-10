-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 20:13
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
-- База данных: `r`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT '' COMMENT 'ФИО заказчика'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заявки на квартиры';

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `customer_name`) VALUES
(1, 'Иванов И.И.');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `r_type` varchar(255) DEFAULT '' COMMENT 'Вид комнаты(1-комната,2,3,студия)',
  `r_action` varchar(255) DEFAULT '' COMMENT 'Тип сделки (обмен, продажа, покупка)',
  `r_floor` int(5) DEFAULT 1 COMMENT 'Этаж',
  `r_footage` int(10) DEFAULT 10 COMMENT 'Метраж',
  `r_available` int(1) DEFAULT 0 COMMENT 'Наличие квартиры'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Квартиры';

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `r_type`, `r_action`, `r_floor`, `r_footage`, `r_available`) VALUES
(2, '1-комнатная', 'Обмен', 1, 1, 1),
(3, '1-комнатная', 'Обмен', 2, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms_requests`
--

CREATE TABLE `rooms_requests` (
  `room_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица связи квартир и заявок';

--
-- Дамп данных таблицы `rooms_requests`
--

INSERT INTO `rooms_requests` (`room_id`, `request_id`) VALUES
(3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms_requests`
--
ALTER TABLE `rooms_requests`
  ADD PRIMARY KEY (`room_id`,`request_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `request_id` (`request_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rooms_requests`
--
ALTER TABLE `rooms_requests`
  ADD CONSTRAINT `FK_Request` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
