-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 12 2023 г., 10:01
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

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
(6, 'Русский язык'),
(11, 'Обществознание'),
(12, 'Психология');

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
(3, 'Ткаченко', 'Алла', 'Юрьевна', 1),
(9, 'Назарова', 'Ольга', 'Игоревна', NULL),
(10, 'Кривобок', 'Д.', 'М.', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `аудитории`
--

CREATE TABLE `аудитории` (
  `id_аудитории` int(11) NOT NULL,
  `номер` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_дисциплины` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `аудитории`
--

INSERT INTO `аудитории` (`id_аудитории`, `номер`, `id_дисциплины`) VALUES
(1, '314', 1),
(5, '311', NULL),
(7, '404/2', NULL),
(8, '103', NULL);

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
(2, 'ИСП-22-3'),
(3, 'ИСП-22-5'),
(4, 'ТЭО-21'),
(5, 'Э\\С-22д'),
(6, 'АСА-23д'),
(7, 'МТО-22-2'),
(8, 'МТО-19-2');

-- --------------------------------------------------------

--
-- Структура таблицы `расписание`
--

CREATE TABLE `расписание` (
  `id_расписания` int(100) NOT NULL,
  `дата` date NOT NULL,
  `группа` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `дисциплины` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `расписание`
--

INSERT INTO `расписание` (`id_расписания`, `дата`, `группа`, `дисциплины`) VALUES
(160, '2023-09-16', '1', '{\"1\": {\"lesson\": \"1\", \"cabinet\": \"1\", \"teacher\": \"3\"}, \"2\": {\"lesson\": \"1\", \"cabinet\": \"1\", \"teacher\": \"3\"}, \"3\": {\"lesson\": \"1\", \"cabinet\": \"1\", \"teacher\": \"3\"}}'),
(167, '2023-09-12', '4', '{\"1\": {\"lesson\": \"6\", \"cabinet\": \"7\", \"teacher\": \"10\"}}');

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
  MODIFY `id_дисциплины` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  MODIFY `id_преподавателя` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `аудитории`
--
ALTER TABLE `аудитории`
  MODIFY `id_аудитории` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `группы`
--
ALTER TABLE `группы`
  MODIFY `id_группы` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `расписание`
--
ALTER TABLE `расписание`
  MODIFY `id_расписания` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

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
