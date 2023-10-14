-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 14 2023 г., 12:00
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
-- База данных: `tablelist`
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
(13, 'Физика'),
(15, 'Обществознание'),
(16, 'История'),
(17, 'Литература'),
(18, 'Биология'),
(19, 'Химия');

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
(11, 'Канныкин', 'Станислав', 'Владимирович', NULL),
(12, 'Брежнев', 'Александр', 'Вячеславович', NULL),
(13, 'Рощупкина', 'Елена', 'Николаевна', NULL),
(14, 'Гончарюк', 'Наталья', 'Владимировна', NULL),
(16, 'Самулева', 'Лидия', 'Ивановна', NULL),
(17, 'Болгова ', 'Татьяна', 'Сергеевна', NULL),
(21, 'Цыгуль', 'Оксана', 'Владимировна', 18),
(22, 'Цыгуль', 'Оксана', 'Владимировна', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `аудитории`
--

CREATE TABLE `аудитории` (
  `id_аудитории` int(11) NOT NULL,
  `номер` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `аудитории`
--

INSERT INTO `аудитории` (`id_аудитории`, `номер`) VALUES
(1, '314'),
(5, '311'),
(9, '301 2к');

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
(9, 'П-23-1'),
(10, 'П-23-2'),
(11, 'П-23-3'),
(12, 'П-23-4'),
(13, 'П-23-5'),
(14, 'П-23-6'),
(15, 'П-23-7');

-- --------------------------------------------------------

--
-- Структура таблицы `расписание`
--

CREATE TABLE `расписание` (
  `id_расписания` int(100) NOT NULL,
  `дата` date NOT NULL,
  `id_группы` int(11) NOT NULL,
  `дисциплины` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `расписание`
--

INSERT INTO `расписание` (`id_расписания`, `дата`, `id_группы`, `дисциплины`) VALUES
(171, '2023-10-11', 9, '{\"1\": {\"lesson\": \"6\", \"cabinet\": \"5\", \"teacher\": \"13\", \"s_group_check_box\": false}, \"2\": {\"lesson\": \"18\", \"cabinet\": \"1\", \"teacher\": \"17\", \"s_group_check_box\": true}, \"3\": {\"lesson\": \"6\", \"cabinet\": \"5\", \"teacher\": \"13\", \"s_group_check_box\": false}, \"4\": {\"lesson\": \"14\", \"cabinet\": \"1\", \"teacher\": \"12\", \"s_group_check_box\": true}, \"2-2\": {\"lesson\": \"2\", \"cabinet\": \"5\", \"teacher\": \"16\", \"s_group_check_box\": true}, \"4-2\": {\"lesson\": \"1\", \"cabinet\": \"9\", \"teacher\": \"11\", \"s_group_check_box\": true}}'),
(172, '2023-10-12', 10, '{\"1\": {\"lesson\": \"18\", \"cabinet\": \"5\", \"teacher\": \"17\", \"s_group_check_box\": false}, \"2\": {\"lesson\": \"2\", \"cabinet\": \"9\", \"teacher\": \"17\", \"s_group_check_box\": true}, \"2-2\": {\"lesson\": \"18\", \"cabinet\": \"5\", \"teacher\": \"12\", \"s_group_check_box\": true}}');

-- --------------------------------------------------------

--
-- Структура таблицы `статистика`
--

CREATE TABLE `статистика` (
  `id_статистики` int(11) NOT NULL,
  `id_группы` int(11) DEFAULT NULL,
  `id_дисциплины` int(11) DEFAULT NULL,
  `часы` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`id_аудитории`);

--
-- Индексы таблицы `группы`
--
ALTER TABLE `группы`
  ADD PRIMARY KEY (`id_группы`);

--
-- Индексы таблицы `расписание`
--
ALTER TABLE `расписание`
  ADD PRIMARY KEY (`id_расписания`),
  ADD KEY `id_группы` (`id_группы`);

--
-- Индексы таблицы `статистика`
--
ALTER TABLE `статистика`
  ADD PRIMARY KEY (`id_статистики`),
  ADD KEY `id_группы` (`id_группы`),
  ADD KEY `id_дисциплины` (`id_дисциплины`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `дисциплины`
--
ALTER TABLE `дисциплины`
  MODIFY `id_дисциплины` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  MODIFY `id_преподавателя` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `аудитории`
--
ALTER TABLE `аудитории`
  MODIFY `id_аудитории` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `группы`
--
ALTER TABLE `группы`
  MODIFY `id_группы` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `расписание`
--
ALTER TABLE `расписание`
  MODIFY `id_расписания` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `преподаватели`
--
ALTER TABLE `преподаватели`
  ADD CONSTRAINT `преподаватели_ibfk_1` FOREIGN KEY (`id_дисциплины`) REFERENCES `дисциплины` (`id_дисциплины`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `расписание`
--
ALTER TABLE `расписание`
  ADD CONSTRAINT `расписание_ibfk_1` FOREIGN KEY (`id_группы`) REFERENCES `группы` (`id_группы`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `статистика`
--
ALTER TABLE `статистика`
  ADD CONSTRAINT `статистика_ibfk_1` FOREIGN KEY (`id_группы`) REFERENCES `группы` (`id_группы`),
  ADD CONSTRAINT `статистика_ibfk_2` FOREIGN KEY (`id_дисциплины`) REFERENCES `дисциплины` (`id_дисциплины`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
