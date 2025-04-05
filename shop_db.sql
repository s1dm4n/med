-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2025 г., 17:10
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `brand_id` int NOT NULL,
  `brand_title` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(12, 'Светлый мед'),
(15, 'Темный мед'),
(20, 'Подарочные надоборы'),
(21, 'Продукция пчеловодства');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `p_id` int NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 2, '::1', 0, 1),
(33, 8, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(6, 'Мед'),
(7, 'Подарки'),
(8, 'Продукты');

-- --------------------------------------------------------

--
-- Структура таблицы `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int NOT NULL,
  `email` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=canelled, 1= pending, 2 =  shipping, 3 =  delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `ref_id`, `p_status`, `status`) VALUES
(1, 23, 0, 0, '5BwxiHOKU7', '', 1),
(2, 23, 0, 0, '5BwxiHOKU7', '', 1),
(3, 15, 0, 0, 'Lw4NNQNpo0', '', 1),
(4, 15, 0, 0, 'UVOW7Neec', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `prod_count` int DEFAULT NULL,
  `total_amt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `prod_count`, `total_amt`) VALUES
(2, 18, 'Andrey Andreev', 'asd@mail.ra', '123', 1, 2300),
(3, 22, 'Андрей Васильев', 'asd@mail.ru', '123', 2, 12900);

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `amt` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(1, 1, 4, 13, 33800),
(2, 1, 13, 1, 400),
(3, 1, 11, 1, 900),
(4, 1, 7, 1, 2900),
(5, 2, 7, 1, 2900),
(6, 3, 4, 1, 2600),
(7, 4, 7, 1, 2900),
(8, 5, 7, 1, 2900),
(9, 6, 10, 1, 500),
(10, 4, 7, 1, 2900),
(11, 5, 7, 1, 2900),
(12, 6, 8, 1, 10000),
(13, 7, 4, 12, 31200),
(14, 8, 7, 2, 5800),
(15, 9, 16, 2, 1800),
(16, 1, 4, 1, 2600),
(17, 1, 4, 1, 2600),
(18, 2, 12, 1, 1500),
(19, 2, 6, 1, 2300),
(20, 3, 8, 1, 10000),
(21, 3, 7, 1, 2900);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_cat` int NOT NULL,
  `product_brand` int NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int NOT NULL,
  `product_desc` mediumtext NOT NULL,
  `product_image` mediumtext NOT NULL,
  `product_keywords` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(3, 6, 12, 'Мёд Цветочный для кондитерских изделий', 3000, 'Цветочный мёд имеет ярко-жёлтый или светло-горчичный оттенок. Аромат слабо выражен, однако различим запах сена и пыльцы. Имеет сладкий приятный вкус с небольшой горчинкой. Вызывает лёгкое першение в горле.', '1743642459_n4sshpdw5fvaj6ayw2ftuur1mcx7uaaa.png', 'Мед'),
(4, 6, 12, 'Мёд натуральный Акациевый (жидкий)', 2600, 'По цвету различают акациевый мёд золотистый или практически прозрачный. По вкусу невероятно нежный и умеренно сладкий. Приторность и горечь отсутствуют. Особенностью является душистый аромат, который перешёл от акации. Не засахаривается.', '1743642374_2bh4sdfizfnqex2ll2ptiznhrzlpn70q.png', 'Мед'),
(6, 6, 15, 'Мёд натуральный Боярышниковый', 2300, 'Натуральный боярышниковый мёд имеет тёмно-янтарный оттенок. На вкус горьковатый, что отражается на послевкусии. Отличается резким и насыщенным ароматом. Консистенция густая и вязкая. Процесс кристаллизации быстрый – проходит на протяжении месяца.', '1743642525_36aymx4ty98jqtbptzxetvd8adv7vkyg.png', 'Мед'),
(7, 6, 15, 'Мёд натуральный Гречишный (жидкий)', 2900, 'Продукт обладает специфическим вкусом с приятной горчинкой. В гречишном мёде содержится множество минералов и витаминов: железо, цинк, магний, кальций, незаменимые аминокислоты и многое другое. Основные свойства:\r\n\r\nподнятие иммунитета;\r\nподдержание работы сердца;\r\nантибактериальный эффект.', '1743642258_Безымянный.png', 'Мед'),
(8, 7, 21, 'Тара восковая', 10000, 'Воск - естественная «упаковка», которая как нельзя лучше сохраняет полезные свойства меда. На этой странице мы предлагаем купить восковую тару (шестигранную) объемом 0,32 литра. Она изготовлена из натурального пчелиного воска и абсолютно экологична!', '1743643828_upz7k3q2f6etan58bkpfjjxc68tefrkb.png', 'Подарки'),
(9, 8, 21, 'Маточное молочко', 3000, 'Маточное молочко нативное 15 грамм — ценный продукт пчелиного производства светло-жёлтого цвета с приятным насыщенным запахом и кисловатым вкусом. Консистенция очень жирной сметаны.\r\n\r\nНатуральное вещество содержит весь спектр витаминов группы В, присутствуют также А, С, D. Это кладезь органических и жирных кислот, макро- и микроэлементов. Калорийность невысокая. Углеводы составляют всего от 8 до 20%.', '1743644309_vntwj3r0n3istv2c32uyiv6dhhumwt12.png', 'Продукты'),
(10, 8, 21, 'Забрус', 500, 'Забрус отличается сильным антивоспалительным, антисептическим, регенеративным, болеутоляющим, успокаивающим действием на организм.\r\nПродукцию используют при ОРВИ, ОРЗ, гриппе, астме, рините, гайморите, синусите. Пчелопродукт помогает при пародонтозе, стоматите, гингивите, панкреатите, язве, дерматите. Это действенное средство при депрессивных состояниях, апатиях, перепадах настроения.\r\nЗабрус жуют в течение 10–15 минут не глотая. Лечиться этим средством можно только при отсутствии аллергии на продукты пчелиного происхождения. Желательно перед использованием вещества проконсультироваться с врачом.\r\n\r\nЗабрус жуют в течение 10–15 минут не глотая. Лечиться этим средством можно только при отсутствии аллергии на продукты пчелиного происхождения. Желательно перед использованием вещества проконсультироваться с врачом.\r\n\r\n', '1743644399_mq90qs6aya3mlhxy44m3xfn5of2qrbk1.png', 'Продукты'),
(11, 8, 21, 'Пчелиный воск', 900, 'Пчелиный воск может похвастаться мощным антивоспалительным, бактерицидным, смягчающим, регенерирующим действием.\r\nВоск используют для лечения дерматологических заболеваний, в гинекологии — для снятия воспаления при женских болезнях. Применяют пчелопродукт и для снижения чувствительности зубов, при пародонтозе, стоматите, пародонтите. Средство полезно при бронхите, синусите, трахеите, рините.\r\n\r\nПчелопродукт можно пожевать несколько минут при заболеваниях дыхательных путей и горла. Также его используют как мазь, нанося на больные места.\r\n\r\n', '1743644475_gcl8s4xcmi29bth7bj1ydvp49uynb3di.png', 'Продукты'),
(12, 7, 20, 'Деревянный бочонок', 1500, 'Попробуйте мед в его самой аутентичной и экологичной подаче – в деревянном бочонке, который восхищает своей природной красотой и мастерским исполнением. Бочонок объемом 0,3 кг имитирует традиционный туесок, создавая неповторимую атмосферу уюта и натуральности.\r\n\r\nИзготовленный из высококачественной древесины, он не только сохраняет свежесть меда, но и подчеркивает его природную ценность. Такой бочонок станет не просто упаковкой, а стильным элементом декора или запоминающимся подарком для ценителей всего натурального.\r\n\r\nНаполните свой дом теплотой природных традиций или удивите близких необычным презентом, который сочетает в себе полезный продукт и элегантное оформление. Деревянный бочонок с медом – это идеальный выбор для тех, кто ценит качество и уникальность!', '1743644236_3lfgdb71ehurq5ble8a5dqh6xq5fywjc.png', 'Подарки'),
(13, 7, 20, 'Набор «Ассорти № 3 Цветочные узоры»', 400, 'Откройте для себя богатство вкусов с набором медов «Ассорти № 3 Цветочные узоры». В этом изысканном комплекте собраны три разнообразных сорта натурального цветочного меда, каждый из которых создан пчелами из нектара различных цветов. Насладитесь мягким и деликатным вкусом акациевого меда, насыщенностью классического цветочного и свежестью лугового меда.\r\n\r\nКаждая баночка оформлена в элегантном стиле с элементами цветочных узоров, что делает набор не только вкусным, но и стильным подарком. «Ассорти № 3 Цветочные узоры» – это идеальный выбор для тех, кто ценит качество, природную пользу и эстетику. Порадуйте себя или близких этим уникальным набором, который подарит настоящее удовольствие от каждого глотка!', '1743644129_6fgrb84y1dnnqk3g4a14w4u7tldqro6q.png', 'Подарки'),
(14, 7, 20, 'Набор «Ассорти Цветочные узоры»', 2999, 'Попробуйте гармонию природы с нашим набором медов «Ассорти Цветочные узоры». В комплекте собраны три уникальных сорта натурального цветочного меда, каждый из которых раскрывает особенный вкус и аромат. Легкий и нежный акациевый мед, насыщенный цветочный и тонкий луговой – идеальное сочетание для истинных гурманов.\r\n\r\nКаждая баночка оформлена в элегантном дизайне с элементами цветочных узоров, что делает набор не только вкусным, но и прекрасным подарком для ваших близких. Насладитесь разнообразием оттенков меда или порадуйте своих друзей и близких этой уникальной коллекцией!', '1743642704_eys37mm5bluilibhra2q06jiue7uiix4.png', 'Подарки');

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(15, 'asd', 'asd', 'yugeshverma@gmail.com', '123', '123', '123', '123'),
(16, '123', '123', '$email', '123', '$mobile', '123', '123'),
(17, '', '', 'asd@mail.ru', '', '123', '123', ''),
(18, 'Andrey', 'Andreev', 'asd@mail.ra', '123', '123', '123', '123'),
(19, 'Andrey', 'Andreev', 'asd@mail.com', '123', '123', '123', '123'),
(20, 'Andrey', 'Andreev', 'asd@mail.uk', '123', '123', '123', '123'),
(21, 'Andrey', 'Andreev', 'asd@mail.as', '123', '123', '123', '123'),
(22, 'Андрей', 'Васильев', 'asd@mail.ru', 'admin123', '248939', '123', 'Москва'),
(23, 'das', 'asd', 'asd@mail.rus', '123', '248939', 'asd', '123');

--
-- Триггеры `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'asd', 'asd', 'codeim@yandex.ru', 'es', '123', '123', '123'),
(15, 'asd', 'asd', 'yugeshverma@gmail.com', '123', '123', '123', '123'),
(16, '123', '123', '$email', '123', '$mobile', '123', '123'),
(17, '', '', 'asd@mail.ru', '', '123', '123', ''),
(18, 'Andrey', 'Andreev', 'asd@mail.ra', '123', '123', '123', '123'),
(19, 'Andrey', 'Andreev', 'asd@mail.com', '123', '123', '123', '123'),
(20, 'Andrey', 'Andreev', 'asd@mail.uk', '123', '123', '123', '123'),
(21, 'Andrey', 'Andreev', 'asd@mail.as', '123', '123', '123', '123'),
(22, 'Андрей', 'Васильев', 'asd@mail.ru', 'admin123', '248939', '123', 'Москва'),
(23, 'das', 'asd', 'asd@mail.rus', '123', '248939', 'asd', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
