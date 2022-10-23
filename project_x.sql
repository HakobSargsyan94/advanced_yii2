-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 24 2022 г., 01:16
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_x`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`id`, `token`, `expiration_date`) VALUES
(1, 'asd', '2022-10-22 23:51:04'),
(2, 'd627d681a859aa5cafcef2b2ca6f515a', '2022-10-23 00:02:28'),
(3, '89ea0b7a915b50bd1fb0b2e20222f439', '2022-10-23 00:43:36'),
(4, '86eb7e0fe1000f7979536a0366e811e5', '2022-10-23 00:30:25'),
(5, '827a8409e557cb878453c993f293fc48', '2022-10-23 01:05:46'),
(6, 'fdfa62437930a510c9c5d09b8b24d782', '2022-10-23 01:03:39'),
(7, 'f5794a8c41289e9fac1f6dfb06c97eda', '2022-10-23 01:27:58'),
(8, '59483fa41079eff314326106a22a5e9f', '2022-10-23 01:38:53'),
(9, 'a4ddeec66cc18e311d1cd534b8ef9b79', '2022-10-23 01:46:34'),
(10, 'c3ebe869cb03a858d70289f43e25e39b', '2022-10-23 01:53:33'),
(11, 'cfa805ad7b1dde52661ec4fc11f7a162', '2022-10-23 02:00:02'),
(12, 'af27f83d536e7f73696012da1fe2db85', '2022-10-23 02:07:07'),
(13, 'ec0619c73ecff4b4cf28d12660107bc1', '2022-10-24 00:35:29');

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `spend_time` int(11) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `data`, `spend_time`, `memory`) VALUES
(1, '{\r\n\"name\":\"test\",\r\n\"id\":\"dddd\",\r\n\"ss\":\"sssssss\"\r\n}', 0, 44536),
(2, '{\"name\":\"test\",\"id\":\"asdasdasdsad\"}', 0, 44920),
(3, '{\r\n\"name\":\"test\",\r\n\"id\":\"1sssssssssssss23\",\r\n\"id\":\"1sssssssssssss23\"\r\n}', 0, 44536),
(4, '{\"name\":\"test\",\"id\":\"123\"}', 0, 44536),
(5, '{\"name\":\"test\",\"id\":\"123\"}', 0, 44456),
(6, '{\"name\":\"test\",\"id\":\"123\"}', 0, 44456),
(7, '{\"name\":\"test\",\"id\":\"123\"}', 0, 44920),
(8, '{\"name\":\"time\",\"phone\":\"213123123\"}', 0, 44792),
(9, '{\"name\":\"time\",\"phone\":\"213123123\"}', 0, 44792),
(10, '{\"name\" : \"time\", \"phone\" : \"213123123\"}', 0, 44568),
(11, '{\"name\" : \"time\", \"phone\" : \"213123123\"}', 0, 44568),
(12, '{\r\n  \"name\": \"Default product template\",\r\n  \"wrapper\": \"div#div_id.div_class[attribute-one=value]\",\r\n  \"sections\": {\r\n    \"main\": {\r\n      \"type\": \"product\"\r\n    }\r\n  },\r\n  \"order\": [\r\n    \"main\"\r\n  ]\r\n}', 0, 110520);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1666466202),
('m220811_081634_create_user_table', 1666466204),
('m221022_200158_create_data_table', 1666469071),
('m221022_200332_create_auth_table', 1666469071);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hakob', '18GE6o_yRB7VXimjUCDfIkfdHC3m7Dun', '$2y$13$A9ERjCZCDtENAjFe6bVwjetlRijNPFyOXBIHNEwDG/6Ph/4OiNPey', NULL, 'teamlead@mail.ru', 10, 1666466221, 1666466221);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
