-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 13 2023 г., 00:45
-- Версия сервера: 5.7.33
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `list`
--

-- --------------------------------------------------------

--
-- Структура таблицы `дисциплины`
--

CREATE TABLE `дисциплины` (
  `id_дисциплины` int(11) NOT NULL,
  `название` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `дисциплины`
--

INSERT INTO `дисциплины` (`id_дисциплины`, `название`) VALUES
(1, 'Математика'),
(2, 'Информатика'),
(4, 'Физика'),
(5, 'Обществознание'),
(6, 'Русский язык'),
(7, 'Физика');

-- --------------------------------------------------------

--
-- Структура таблицы `преподаватели`
--

CREATE TABLE `преподаватели` (
  `id_преподавателя` int(11) NOT NULL,
  `фамилия` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `имя` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `отчество` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_дисциплины` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `преподаватели`
--

INSERT INTO `преподаватели` (`id_преподавателя`, `фамилия`, `имя`, `отчество`, `id_дисциплины`) VALUES
(1, 'Спицина', 'Ольга', 'Ивановна', 2),
(3, 'Ткаченко', 'Алла', 'Юрьевна', 1),
(5, 'Амельчакова', 'Елена', 'Анатольевна', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `аудитории`
--

CREATE TABLE `аудитории` (
  `id_аудитории` int(11) NOT NULL,
  `номер` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_дисциплины` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `аудитории`
--

INSERT INTO `аудитории` (`id_аудитории`, `номер`, `id_дисциплины`) VALUES
(1, '314', 1),
(2, '301/2', 6),
(3, '311', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `группы`
--

CREATE TABLE `группы` (
  `id_группы` int(11) NOT NULL,
  `группа` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `группы`
--

INSERT INTO `группы` (`id_группы`, `группа`) VALUES
(1, 'ИСП-22-4'),
(2, 'ИСП-22-3');

-- --------------------------------------------------------

--
-- Структура таблицы `расписание`
--

CREATE TABLE `расписание` (
  `id_расписания` int(11) NOT NULL,
  `дата` date NOT NULL,
  `группа` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `дисциплины` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `расписание`
--

INSERT INTO `расписание` (`id_расписания`, `дата`, `группа`, `дисциплины`) VALUES
(83, '2023-08-11', '1', '[]'),
(93, '2023-08-12', '2', '{\"2\": {\"lesson\": \"1\", \"cabinet\": \"1\", \"teacher\": \"1\"}}'),
(95, '2023-08-12', '1', '{\"2\": {\"lesson\": \"2\", \"cabinet\": \"1\", \"teacher\": \"3\"}}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `дисциплины`
--
ALTER TABLE `дисциплины`
  ADD PRIMARY KEY (`id_дисциплины`);

--
-- Индексы таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  ADD PRIMARY KEY (`id_преподавателя`),
  ADD KEY `id_дисциплины` (`id_дисциплины`);

--
-- Индексы таблицы `аудитории`
--
ALTER TABLE `аудитории`
  ADD PRIMARY KEY (`id_аудитории`),
  ADD KEY `id_дисциплины` (`id_дисциплины`);

--
-- Индексы таблицы `группы`
--
ALTER TABLE `группы`
  ADD PRIMARY KEY (`id_группы`);

--
-- Индексы таблицы `расписание`
--
ALTER TABLE `расписание`
  ADD PRIMARY KEY (`id_расписания`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `дисциплины`
--
ALTER TABLE `дисциплины`
  MODIFY `id_дисциплины` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  MODIFY `id_преподавателя` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `аудитории`
--
ALTER TABLE `аудитории`
  MODIFY `id_аудитории` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `группы`
--
ALTER TABLE `группы`
  MODIFY `id_группы` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `расписание`
--
ALTER TABLE `расписание`
  MODIFY `id_расписания` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  ADD CONSTRAINT `преподаватели_ibfk_1` FOREIGN KEY (`id_дисциплины`) REFERENCES `дисциплины` (`id_дисциплины`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `аудитории`
--
ALTER TABLE `аудитории`
  ADD CONSTRAINT `аудитории_ibfk_1` FOREIGN KEY (`id_дисциплины`) REFERENCES `дисциплины` (`id_дисциплины`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
