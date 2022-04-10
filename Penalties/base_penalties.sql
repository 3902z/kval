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
-- База данных: `s`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_number` varchar(255) DEFAULT '' COMMENT 'Номер машины'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Машины';

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `car_number`) VALUES
(5, 'н111нн'),
(6, 'щ222щщ');

-- --------------------------------------------------------

--
-- Структура таблицы `cars_penalties`
--

CREATE TABLE `cars_penalties` (
  `car_id` int(11) NOT NULL,
  `penalty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица связи машин и штрафов';

--
-- Дамп данных таблицы `cars_penalties`
--

INSERT INTO `cars_penalties` (`car_id`, `penalty_id`) VALUES
(5, 9),
(5, 10),
(5, 11),
(6, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `penalties`
--

CREATE TABLE `penalties` (
  `id` int(11) NOT NULL,
  `p_date` date DEFAULT NULL COMMENT 'Дата нарушения',
  `p_time` time DEFAULT NULL COMMENT 'Время нарушения',
  `p_type` varchar(255) DEFAULT '' COMMENT 'Вид нарушения',
  `p_amount` int(11) DEFAULT NULL COMMENT 'Размер штрафа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Штрафы';

--
-- Дамп данных таблицы `penalties`
--

INSERT INTO `penalties` (`id`, `p_date`, `p_time`, `p_type`, `p_amount`) VALUES
(9, '2022-04-20', '18:04:00', 'Нарушение н111нн', 12),
(10, '2022-04-20', '18:06:00', 'Нарушение 22', 123),
(11, '2022-04-22', '18:05:00', 'Нарушение 55', 5555),
(12, '2022-04-04', '18:06:00', 'Нарушение 88', 6766);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars_penalties`
--
ALTER TABLE `cars_penalties`
  ADD PRIMARY KEY (`car_id`,`penalty_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `penalty_id` (`penalty_id`);

--
-- Индексы таблицы `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars_penalties`
--
ALTER TABLE `cars_penalties`
  ADD CONSTRAINT `FK_Car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Penalties` FOREIGN KEY (`penalty_id`) REFERENCES `penalties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
