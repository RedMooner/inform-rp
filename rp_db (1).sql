-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 24 2023 г., 11:59
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rp_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `InformSystems`
--

CREATE TABLE `InformSystems` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `InformSystems`
--

INSERT INTO `InformSystems` (`id`, `title`, `owner`) VALUES
(8, 'ЕСВН «Система видеонаблюдения Пермского края»', 5),
(9, 'РСТК ЕСОП «Единая система оплаты проезда и учета пассажиропотока в Пермском крае» - SOP', 5),
(10, 'РИСОГД ПК «Региональная государственная информационная система обеспечения градостроительной деятельности» - RISOGD', 6),
(11, 'ЕИС УФХД «Единая информационная система управления финансово-хозяйственной деятельностью» - CA', 7),
(12, 'Интеграционный сервис взаимодействия «АЦК-Финансы» с ЕИС УФХД ПК - ACK', 7),
(13, 'ИС «МСЭД» - MSED', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `Owners`
--

CREATE TABLE `Owners` (
  `id` int(11) NOT NULL,
  `FIO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Owners`
--

INSERT INTO `Owners` (`id`, `FIO`) VALUES
(5, 'Михеев Максим Викторович '),
(6, 'Евтушенко Владислав Валерьевич'),
(7, 'Жаров Вадим Станиславович'),
(8, 'Спирина Светлана Станиславовна'),
(9, 'Кокорин Павел Иванович'),
(10, 'Новоселов Ярослав Павлович');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'redmoon', ',kjrgjcn59', 1),
(2, 'user', 'user', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `VMs`
--

CREATE TABLE `VMs` (
  `id` int(11) NOT NULL,
  `informSystem` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `VMs`
--

INSERT INTO `VMs` (`id`, `informSystem`, `ip`) VALUES
(1, 1, '127.0.0.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `InformSystems`
--
ALTER TABLE `InformSystems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Owners`
--
ALTER TABLE `Owners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `VMs`
--
ALTER TABLE `VMs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `InformSystems`
--
ALTER TABLE `InformSystems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `Owners`
--
ALTER TABLE `Owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `VMs`
--
ALTER TABLE `VMs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
