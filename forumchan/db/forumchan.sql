-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2019 г., 08:17
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forumchan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id_file`, `url`, `id_message`) VALUES
(23, 'winter-4680713.jpg', 55),
(24, 'maxresdefault.jpg', 56),
(25, 'drago.jpg', 57),
(26, '', 58),
(27, '', 59),
(28, 'winter-4680713.jpg', 60);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id_message`, `id_theme`, `id_user`, `title`, `time`, `text`) VALUES
(1, 1, 6, 'Invoker', '2019-11-03 12:16:08', 'Как контрить эту имбу?'),
(2, 3, 3, 'Кто уже купил?', '2019-11-04 14:19:17', 'Стоит ли покупать?'),
(3, 2, 7, 'Есть русские?', '2019-11-10 12:16:16', 'Ищу игроков, меняю скины'),
(5, 4, 7, 'Стоит играть?', '2019-09-02 14:19:13', 'Свежая игра от культовых разработчиков, с великолепной графикой. Стоит ли покупать и наслаждаться игрой?'),
(6, 13, 5, 'Лучшие игры', '2019-11-08 11:22:23', 'Самые лучшие игры в стиме'),
(7, 1, 3, 'Как контрить Doom\'а?', '2019-06-19 07:15:15', 'Против меня постоянно попадается Doom, и я не могу его законтрить. Подскажите, что мене делать :)'),
(8, 8, 5, '', '2019-10-04 12:33:21', 'Batman'),
(9, 8, 5, '', '2019-08-04 12:33:21', 'Superman'),
(12, 8, 2, '', '2019-02-17 06:33:21', 'I\'m Batman!'),
(13, 8, 6, '', '2019-06-24 09:14:30', 'Sups'),
(17, 8, 5, '', '2019-09-04 12:33:21', 'Superman'),
(18, 8, 6, '', '2019-10-04 12:33:21', 'Batman'),
(20, 8, 2, '', '2019-03-17 06:33:21', 'I\'m Batman!'),
(21, 8, 6, '', '2019-03-24 09:14:30', 'Sups'),
(27, 2, 1, '', '2019-12-09 12:39:05', 'Есть. Пошли в катку, счас по мидлу раскатем один на один на ножах? ))'),
(28, 2, 1, '', '2019-12-09 12:40:51', 'Русские есть?'),
(29, 2, 1, 'Приветствие', '2019-12-09 12:41:10', 'Привет всем!'),
(30, 4, 1, '', '2019-12-09 12:41:55', 'Не знаю, посмотори обзоры'),
(37, 8, 3, 'Люблю Бэтмена!', '2019-12-11 21:40:36', 'Мой любимый герой! Самый лучший! И самый сильный!'),
(55, 8, 1, 'Batman', '2019-12-12 11:03:57', 'Cool!'),
(56, 13, 1, 'Steam - лучшая игровая площадка!', '2019-12-12 11:15:08', 'Лучшие игры по самым низким ценам!'),
(57, 8, 1, 'А где робин?', '2019-12-13 07:52:38', 'Тоже отличный герой, не хуже этих двоих!'),
(58, 8, 1, 'Супермен!', '2019-12-13 07:53:44', 'Никого нет сильнее его!'),
(59, 1, 1, 'Очень просто!', '2019-12-13 07:55:33', 'Самый лучший герой - это прямые руки)'),
(60, 1, 1, 'Кто лучше - Riki ил Bh?', '2019-12-13 08:00:07', 'Лучшая крыса доты!');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id_theme` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `active` bit(1) DEFAULT NULL COMMENT '1 - активный, 0 - нет'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id_theme`, `title`, `id_user`, `active`) VALUES
(1, 'Dota 2', 1, b'1'),
(2, 'Counter Strike', 4, b'1'),
(3, 'Red Dead Redemption II', 5, b'1'),
(4, 'Death Stranding', 2, b'1'),
(5, 'Cyberpunk 2077', 1, b'1'),
(6, 'Tesla Cyber Truck', 3, b'1'),
(7, 'Marvel', 2, b'0'),
(8, 'Кто круче: Бэтмен или Супермен?', 1, b'1'),
(9, 'Yandex', 4, b'0'),
(10, 'Google', 5, b'1'),
(11, 'Twitch', 2, b'1'),
(12, 'Комиксы', 1, b'0'),
(13, 'Steam', 3, b'1'),
(14, 'Avengers', 2, b'0');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `phone`, `active`, `id_group`, `email`) VALUES
(1, 'kamshir', 'fc5e038d38a57032085441e7fe7010b0', '7(965)051-84-06', b'1', 1, 'iammaksim2000shirshikov@gmail.com'),
(2, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '7(924)167-11-02', b'0', 2, 'sadas@gmail.com'),
(3, 'Katya', '674f3c2c1a8a6f90461e8a66fb5550ba', '7(345)123-43-45', b'0', 2, 'katya@mail.ru'),
(4, 'alesha', 'd9b159b570ed9b8eee7af9d896fcbfe9', '', b'0', 2, 'leha@gmail.com'),
(5, 'matvey', '9e740ea000956e02766ffa46f1f1a658', '7(924)145-23-44', b'0', 2, 'matvey@mail.ru'),
(6, 'admin', 'a86e600529db6102fc11beca69ad1205', '7(456)901-34-12', b'0', 2, 'admin@gmail.com'),
(7, 'aleksey', 'c7d8bc88cfef0f52a4d3a88651398eb4', '7(987)123-45-61', b'0', 2, 'ialeks@gmail.com'),
(8, 'Nikolya', '6d3f173ac9f242ff4f2bccc17b2b610b', '7(911)241-57-90', b'0', 2, 'nikolya@gmail.com'),
(10, 'nicky', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', b'0', NULL, 'devilNicky@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `view`
--

CREATE TABLE `view` (
  `id_view` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_message` (`id_message`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_theme` (`id_theme`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id_theme`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_group` (`id_group`);

--
-- Индексы таблицы `view`
--
ALTER TABLE `view`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_theme` (`id_theme`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id_message`) REFERENCES `message` (`id_message`);

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id_theme`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);

--
-- Ограничения внешнего ключа таблицы `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `view_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id_theme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
