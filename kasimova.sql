-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2023 г., 16:37
-- Версия сервера: 10.3.36-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kasimova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carpet`
--

CREATE TABLE `carpet` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carpet`
--

INSERT INTO `carpet` (`id`, `id_master`, `id_user`, `name`, `tel`, `email`, `date`, `time`, `status`) VALUES
(1, 1, 1, '1', '1', '1@1', '2023-05-05', '15:00', 1),
(2, 2, 1, '1', '1', '1@1', '2023-05-05', '16:00', 1),
(3, 2, 1, '1', '1', '1@1', '2023-05-06', '10:00', 2),
(4, 7, 1, '1', '1', '1@1', '2023-05-06', '10:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallary`
--

INSERT INTO `gallary` (`id`, `id_master`, `img`) VALUES
(22, 1, '1.jpg'),
(23, 1, '2.jpg'),
(24, 1, '3.jpg'),
(25, 1, '4.jpg'),
(28, 1, '6455053761bf4.jpg'),
(29, 1, '645505376a385.png'),
(30, 1, '645505376ff93.jpg'),
(31, 1, '6455053782c06.png');

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stage` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id`, `name`, `stage`, `desc`, `foto`) VALUES
(1, 'Арина Минина', 'Стаж 3 года', 'Арина Минина – мастер по наращиванию и ламинированию ресниц в Омске. У  Арины отличные отзывы клиентов о ее работе, поэтому большинство являются постоянными и записываются на процедуры заранее. Свободные окошки на реснички можно посмотреть в системе онлайн записи.\r\n\r\n', '7.jpg'),
(2, 'Милана Яновская', 'Стаж 4 года', 'Станислав – мастер немного мрачной, но эффектной графики! Он готов раскрыть любую идею в уникальной интерпретации. Такая работа будет только у вас! <br><br>\r\nВ татуировке Станислав с 2014 года, создает индивидуальные эскизы. Его кредо –  идеальное исполнение каждой татуировки! Он знает и умеет делать ровный контур и надежный покрас. Не боится сложных мест нанесения. Участник Московского тату-фестиваля. <br><br>', '8.jpg'),
(7, 'Карина Левина', 'Стаж 2 года', 'Станислав – мастер немного мрачной, но эффектной графики! Он готов раскрыть любую идею в уникальной интерпретации. Такая работа будет только у вас! <br><br>\r\nВ татуировке Станислав с 2014 года, создает индивидуальные эскизы. Его кредо –  идеальное исполнение каждой татуировки! Он знает и умеет делать ровный контур и надежный покрас. Не боится сложных мест нанесения. Участник Московского тату-фестиваля. <br><br>', '4.jpg'),
(8, '123', '789', '123', '85c14e593acfd37d79babdbb57d97064.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `rewiews`
--

CREATE TABLE `rewiews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estimation` int(11) NOT NULL,
  `plus` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minus` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rewiews`
--

INSERT INTO `rewiews` (`id`, `id_user`, `estimation`, `plus`, `minus`, `comment`, `date`, `answer`, `status`) VALUES
(1, 1, 5, 'bvcbvcbgg', 'bvcbvc', 'bvcbcv', '05.05.2023', '123', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_usl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `styles`
--

INSERT INTO `styles` (`id`, `id_master`, `id_usl`) VALUES
(8, 1, 1),
(10, 2, 3),
(11, 2, 4),
(12, 7, 5),
(13, 7, 6),
(14, 7, 1),
(16, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `tel`, `name`, `status`) VALUES
(1, '1@1', 'b7f09f1a6db323a068da2d0353e2e757', '1', '1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `title`, `price`, `img`, `text`) VALUES
(1, 'Наращивание ресниц', 700, '1.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!'),
(2, 'Ламинирование ресниц', 701, '2.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!'),
(3, 'Ламинирование бровей', 703, '3.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!'),
(4, 'Окрашивание бровей', 704, '13.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!'),
(5, 'Перманент бровей', 705, '14.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!'),
(6, 'Перманент межреснмчкм', 750000, '14.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non, quisquam. Debitis voluptatibus quis odit excepturi nemo, ad natus nihil quod, adipisci eius expedita dicta. Accusamus nam dolores fugit temporibus at!');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carpet`
--
ALTER TABLE `carpet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- Индексы таблицы `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rewiews`
--
ALTER TABLE `rewiews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_usl` (`id_usl`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carpet`
--
ALTER TABLE `carpet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `rewiews`
--
ALTER TABLE `rewiews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carpet`
--
ALTER TABLE `carpet`
  ADD CONSTRAINT `carpet_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carpet_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallary`
--
ALTER TABLE `gallary`
  ADD CONSTRAINT `gallary_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rewiews`
--
ALTER TABLE `rewiews`
  ADD CONSTRAINT `rewiews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `styles`
--
ALTER TABLE `styles`
  ADD CONSTRAINT `styles_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `masters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `styles_ibfk_2` FOREIGN KEY (`id_usl`) REFERENCES `uslugi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
