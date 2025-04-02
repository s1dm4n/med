-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2024 г., 22:48
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

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
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `brand_id` int(100) NOT NULL,
  `brand_title` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(12, 'Nissan'),
(13, 'Smart'),
(14, 'Volkswagen'),
(15, 'hyndai'),
(16, 'Москвич'),
(17, 'Дополнительные услуги'),
(18, 'Товары');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 2, '::1', 0, 1),
(30, 6, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(6, 'Автомобили'),
(7, 'Услуги'),
(8, 'Товары');

-- --------------------------------------------------------

--
-- Структура таблицы `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=canelled, 1= pending, 2 =  shipping, 3 =  delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `ref_id`, `p_status`, `status`) VALUES
(1, 23, 0, 0, '5BwxiHOKU7', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(16, 1, 4, 1, 2600);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` mediumtext NOT NULL,
  `product_image` mediumtext NOT NULL,
  `product_keywords` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(3, 6, 8, 'Nissan Qashkai', 3000, 'серия городских компактных кроссоверов, выпускающихся японской компанией Nissan с 2006 года. Qashqai впервые был представлен как концепт на Женевском автосалоне в 2004 году, а с 2007 года стартовали продажи модели первого поколения. У модели первого поколения существовала и семиместная удлинённая версия, получившая название Qashqai+2.[⇨] Презентация модели второго поколения прошла в ноябре 2013 года, а выпускалась она вплоть до 2022 года.[⇨] В настоящий момент с 2021 года выпускается модель третьего поколения.', '1710801749_nissan.png', 'Автомобили'),
(4, 6, 16, 'Москвич 3', 2600, 'Москвич 3 оснащен современными технологиями и мультимедийными решениями: многофункциональный руль с электроусилителем и блоком управления круиз-контролем, цифровая приборная панель с дисплеем диагональю 10,25” и мультимедийной системой с сенсорным экраном такого же размера с возможностью подключения к смартфонам по протоколам Apple CarPlay и Android Auto, а также 6 динамиками и системой камер кругового обзора. Автомобиль оснащен электрическим стояночным тормозом с функцией автоудержания.', '1710802705_2fd76338ee1d0f78244670dc63503e97.png', 'Автомобили'),
(6, 6, 15, 'Hyndai Sonata', 2300, 'Hyundai Sonata — среднеразмерный переднеприводной седан. В соответствии с классификацией легковых автомобилей по формальному признаку (габариты), принятой в ЕС, автомобиль принадлежит к сегменту E — «Executive cars», по Euro NCAP — к «Large family car» (сегмент D)[1]. Неофициальные источники, дилеры и журналисты, специализирующиеся на данной тематике, относят автомобиль как к D-сегменту[2], так и к бизнес-классу.', '1710849233_eeb0a585378596f815e2d53974193d6d.png', 'Автомобили'),
(7, 6, 13, 'Smart Mini', 2900, 'Smart (Swatch Mercedes Art[1]) — марка автомобилей особо малого класса, выпускаемых одноимённой компанией, принадлежащей совместному предприятию Mercedes-Benz Group и Zhejiang Geely Holding Group. Совместное предприятие MCC (Micro Compact Car AG) создано корпорациями Daimler-Benz и швейцарской часовой компанией Swatch с целью создания городского двухместного и очень экономного мини-автомобиля Smart. Micro Compact Car в сентябре 2002 изменило название на Smart GmbH.', '1710849502_smart.png', 'Автомобили'),
(8, 7, 17, 'Личный водитель', 10000, '\r\nУслуга личного водителя предоставляет клиентам удобство и комфорт в перемещении, освобождая их от забот о вождении. Личный водитель предлагает качественное обслуживание, включая безопасность, надежность и конфиденциальность. Это позволяет клиентам сосредоточиться на своих делах или наслаждаться путешествием, в то время как профессиональный водитель обеспечивает комфортное и безопасное перемещение от места к месту. Услуга личного водителя может быть доступна по требованию или на постоянной основе и может быть настроена в соответствии с индивидуальными потребностями клиента.', '1710851105_driver.jpg', 'Услуги'),
(9, 7, 17, 'Доставка автомобиля', 3000, 'Доставка автомобиля - это удобный и надежный способ доставки транспортного средства от одной точки до другой. Независимо от того, нужно ли передвинуть автомобиль на большие расстояния или внутри города, услуги доставки автомобиля обеспечивают безопасность и эффективность. Профессиональные перевозчики заботятся о вашем автомобиле, обеспечивая его сохранность во время транспортировки. Этот сервис особенно ценен при переездах, покупке или продаже автомобиля, а также в случае необходимости доставки автомобиля на ремонт или обслуживание. Независимо от причины, доставка автомобиля предлагает удобство и спокойствие, обеспечивая перевозку вашего транспортного средства с минимальными хлопотами.', '1710851377_car_delivery.jpg', 'Услуги'),
(10, 7, 17, 'Детское кресло', 500, 'Аренда детского кресла - это удобное и безопасное решение для путешествий с маленькими детьми. Предоставляемые кресла соответствуют всем стандартам безопасности и удобства, обеспечивая комфорт и защиту для малышей во время поездок. Этот сервис особенно удобен для тех, кто путешествует редко или не хочет покупать дорогостоящее кресло только на короткий период времени. Аренда детского кресла позволяет родителям сэкономить деньги и пространство, а также обеспечить своим детям безопасность и комфорт во время путешествий.', '1710851503_baby_place.jpg', 'Услуги'),
(11, 7, 17, 'Аренда машиноместа', 900, 'Аренда машиноместа - это удобное решение для хранения автомобиля в условиях, когда у вас нет собственной парковки или она недостаточна. Предоставляемые места для парковки обеспечивают безопасное и удобное место для вашего автомобиля, где он будет находиться под постоянным контролем и защитой. Этот сервис особенно полезен в городах, где парковочные места ограничены, или для тех, кто временно нуждается в дополнительном месте для хранения своего автомобиля. Аренда машиноместа позволяет вам избежать проблем с парковкой, сэкономить время и нервы, а также обеспечить сохранность вашего автомобиля в любое время.', '1710851564_car_place.jpg', 'Услуги'),
(12, 8, 18, 'Термокружка', 1500, 'Термокружка - то практичное и удобное решение для тех, кто ценит горячие напитки в любое время и в любом месте. Термокружки сохраняют температуру вашего напитка в течение длительного времени, обеспечивая комфорт и удовольствие от его употребления в течение всего дня. Благодаря своей универсальности и портативности, термокружки идеально подходят для использования в офисе, в путешествиях, на прогулках или даже в автомобиле. При покупке термокружки стоит обратить внимание на ее объем, материал и качество изоляции, чтобы выбрать оптимальную модель, которая подходит именно вам.', '1710851779_27c76f4279a64a308d36ff8826509146ecbe6b92.png', 'Термокружка'),
(13, 8, 18, 'Подушка для сна', 400, 'Покупка подушки для автомобиля - это отличное решение для тех, кто ценит комфорт и поддержку во время длительных поездок. Подушки для автомобиля обеспечивают правильное положение тела и уменьшают напряжение на шее, спине и пояснице во время долгих поездок, делая вашу поездку более приятной и комфортной. Благодаря разнообразию моделей и дизайнов, вы можете подобрать подушку, которая идеально подходит для вашего автомобиля и ваших индивидуальных предпочтений. При покупке подушки для автомобиля стоит обратить внимание на ее размер, материал и уровень поддержки, чтобы выбрать оптимальную модель, которая обеспечит вам комфорт во время каждой поездки.', '1710852192_catalog-easyphoto-tmp-55-jpg-4-1200x1200_0.jpg', 'Подушка'),
(14, 8, 18, 'Термосумка', 2999, 'Покупка термосумки для автомобиля - это практичное решение для тех, кто ценит удобство и возможность сохранить свежесть и тепло продуктов во время длительных поездок. Термосумки обеспечивают надежное хранение и транспортировку продуктов, сохраняя их температуру в течение продолжительного времени, что позволяет вам наслаждаться свежими продуктами и прохладительными напитками в любое время. Благодаря разнообразию моделей и размеров, вы можете выбрать термосумку, которая идеально подходит для ваших потребностей и объема хранения. Покупка термосумки для автомобиля поможет вам сэкономить время и деньги, обеспечивая комфорт и удовольствие от каждой поездки.', '1710852440_16396.jpg', 'Сумка');

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
