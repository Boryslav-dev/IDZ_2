-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 11 2021 г., 12:21
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `idz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pass_manager`
--

CREATE TABLE `pass_manager` (
  `ID` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `resource` text DEFAULT NULL,
  `login` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pass_manager`
--

INSERT INTO `pass_manager` (`ID`, `user_name`, `resource`, `login`, `email`, `password`, `description`) VALUES
(28, 'VmxvZGlr', 'RmdkZ2Rm', 'Qm9yeQ==', 'cmFid29ya0BnbWFpbC5jb20=', 'ZmRzZ2Y=', 'Z2ZzZGdmc2Q='),
(29, 'VmxvZGlr', 'bnVyZQ==', 'VmFsaWtr', 'cmFid29ya0BnbWFpbC5jb20=', 'ZmRzZ2Y=', 'RGZnZmRnc2c='),
(32, 'Vm9sa2lfMg==', 'bnVyZQ==', 'VmxhZGltaXI=', 'cmFid29ya0BnbWFpbC5jb20=', 'ZmRzZ2Y=', 'NjU0ZmdkeXRyeXRleQ=='),
(33, 'Qm9yeXNsYXY=', 'bnVyZQ==', 'Qm9yeXNsYXY=', 'cmFid29ya0BnbWFpbGNvbQ==', 'YmdqZGZnaGRm', 'V1dwdloyWnpaR1prY3c9PQ==');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(0, 'Bory', '$2y$10$uRC3qFSZ0OePsI0ZsfE1K.XNxRKRANb3tqxWR2f227..tLmOjd2MS'),
(0, 'Volki', '$2y$10$NIMTI59PeQHeG5seluDJlu4hnuvs8M1NtKi5nOjv8x3TIDKzrA9Tq'),
(0, 'Volki_2', '$2y$10$uPaP3TfFsf/XI5JIz3NjGeZWMVsYRV.P.IiMF2cawinkrYfI.q9Dy'),
(0, 'Boryslav', '$2y$10$ZXltJImws4IxuabYKg84SeYG8Hsum4e0/HRvpXZWLcnq.YIXSJdCG');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pass_manager`
--
ALTER TABLE `pass_manager`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pass_manager`
--
ALTER TABLE `pass_manager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
