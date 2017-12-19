-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 19 2017 г., 15:22
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skillogram`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advertising`
--

CREATE TABLE `advertising` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `logo` varchar(64) NOT NULL,
  `content` varchar(64) NOT NULL,
  `text` varchar(256) NOT NULL,
  `likes` int(11) NOT NULL,
  `price` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advertising`
--

INSERT INTO `advertising` (`id`, `title`, `logo`, `content`, `text`, `likes`, `price`) VALUES
(1, 'Реклама', 'assets/img/logo_adv.png', 'assets/img/adv1.png', 'Размещение рекламы на сайте.\r\nПотому что могу', 76, 'Цена: 666р'),
(2, 'Реклама', 'assets/img/logo_adv.png', 'assets/img/adv2.jpg', 'Размещение рекламы на сайте', 97, 'Цена: 999р'),
(3, 'Реклама', 'assets/img/logo_adv.png', 'assets/img/adv3.jpg', 'Размещение рекламы на сайте', 333, 'Цена: 333р');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(22, 3),
(26, 1),
(27, 3),
(29, 3),
(33, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  `content` varchar(64) NOT NULL,
  `comment` varchar(128) NOT NULL,
  `hash_tag` varchar(32) NOT NULL,
  `count_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `user_id`, `added_at`, `content`, `comment`, `hash_tag`, `count_like`) VALUES
(21, 1, '2017-11-26 18:13:20', 'assets/img/img_down/6698.jpeg', 'Море', '#cool', 16),
(22, 4, '2017-11-26 18:14:09', 'assets/img/img_down/1599.jpeg', 'Море', '#summer', 7),
(23, 3, '2017-11-26 18:14:47', 'assets/img/img_down/3064.jpg', 'Горы', '#горы', 6),
(24, 1, '2017-11-26 18:15:42', 'assets/img/img_down/1383.jpg', 'Super', '#wow', 5),
(25, 1, '2017-11-26 18:16:06', 'assets/img/img_down/6347.jpg', 'Wow', 'eeee', 7),
(26, 1, '2017-11-26 18:16:34', 'assets/img/img_down/7742.jpg', 'Море', '#summer', 8),
(27, 1, '2017-11-26 18:16:52', 'assets/img/img_down/3338.jpeg', 'Море', '#cool', 26),
(28, 3, '2017-12-06 23:21:49', 'assets/img/img_down/9624.jpg', 'Лето 2017', 'Залив', 65),
(29, 3, '2017-12-06 23:23:29', 'assets/img/img_down/3720.jpg', 'Лето 2016', 'Чудское озеро', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  `text` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_comment`
--

INSERT INTO `post_comment` (`id`, `post_id`, `user_id`, `added_at`, `text`) VALUES
(114, 28, 1, '2017-12-18 22:40:22', 'Крутая фотка! это где?'),
(115, 28, 3, '2017-12-18 22:40:47', 'Это Финский залив!'),
(116, 26, 3, '2017-12-18 22:41:16', 'Здорово!'),
(117, 23, 1, '2017-12-18 22:41:32', 'Еееееее'),
(118, 28, 1, '2017-12-18 22:43:26', 'Привет!');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `avatar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `avatar`) VALUES
(1, 'Sergey', '$2y$10$2bBEBT4jVCVyazCsRP/GUu1Bj5Fv97OxYtF1fte8Vf1MUiPyuCf9e', 'assets/img/avatar/1176.png'),
(2, 'Alex', '$2y$10$LUcgFde1YEifyERNRorlMurPi.OAmk4FjqhYh5B7HG0AgYbr4SSea', 'assets/img/avatar/4518.png'),
(3, 'Dima', '$2y$10$6dpDzPSQBfD.Zx5XHvo75.3N37jgSijD3TmwTgoH7lE4KzmmA8l/O', 'assets/img/avatar/2305.png'),
(4, 'John', '$2y$10$AJdOVYpneVPEBMikmDnmuexLj3HszxOFLNJC16PjqvQXaJm79649q', 'assets/img/avatar/3041.png'),
(6, 'Stiven', '$2y$10$.lFhEQvZmmDlUW0j72R6V.lTTig.MOIgb/QzmTysWlumGWpdi.XiO', 'assets/img/avatar/8047.jpg'),
(26, 'Letto', '$2y$10$fMoll/PrJDkuqA6yA/RGM.E7bad8xbXpVADgbs4q1JPOQpaBcsdRG', 'assets/img/avatar/3155.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`post_id`,`user_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`user_id`,`comment`,`hash_tag`);

--
-- Индексы таблицы `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`,`post_id`,`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
