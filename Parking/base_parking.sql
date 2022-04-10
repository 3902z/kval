-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 21:21
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
-- База данных: `s`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT '' COMMENT 'ФИО заказчика',
  `car_number` varchar(255) DEFAULT '' COMMENT 'Номер машины',
  `car_brand` varchar(255) DEFAULT '' COMMENT 'Марка машины',
  `salary` int(5) DEFAULT 0 COMMENT 'Скидка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Клиенты';

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `car_number`, `car_brand`, `salary`) VALUES
(1, 'Иванов И.И.', 'ш111шш', 'BMW', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `clients_tickets`
--

CREATE TABLE `clients_tickets` (
  `client_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица связи клиентов и квитанций';

--
-- Дамп данных таблицы `clients_tickets`
--

INSERT INTO `clients_tickets` (`client_id`, `ticket_id`) VALUES
(1, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `t_date` date DEFAULT NULL COMMENT 'Дата въезда',
  `t_time` time DEFAULT NULL COMMENT 'Время въезда',
  `t_price` int(11) DEFAULT NULL,
  `t_status` int(1) DEFAULT 0 COMMENT 'Статус оплаты'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Квитанции';

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `t_date`, `t_time`, `t_price`, `t_status`) VALUES
(1, '2022-04-14', '21:12:00', 1000, 1),
(4, '2022-04-17', '01:17:00', 600, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients_tickets`
--
ALTER TABLE `clients_tickets`
  ADD PRIMARY KEY (`client_id`,`ticket_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients_tickets`
--
ALTER TABLE `clients_tickets`
  ADD CONSTRAINT `FK_Clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Tickets` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
