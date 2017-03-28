-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 03 2017 kl. 14:53:23
-- Serverversion: 5.6.24
-- PHP-version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slipseknuden`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `fk_created` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `brands`
--

INSERT INTO `brands` (`id`, `name`, `fk_created`, `fk_edited`) VALUES
(1, 'Shoon', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `employeerole`
--

CREATE TABLE IF NOT EXISTS `employeerole` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `employeerole`
--

INSERT INTO `employeerole` (`id`, `title`) VALUES
(1, 'Direktør'),
(2, 'Sekræter'),
(3, 'Sælger');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `fk_role` int(11) DEFAULT NULL,
  `fk_img` int(11) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `fk_hired` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `fk_role`, `fk_img`, `password`, `username`, `fk_hired`) VALUES
(2, 'Anders', 'Hansen', 'Anders@slips.dk', 1, 188, NULL, NULL, 107),
(3, 'Hansen', 'Madsen', 'Mads@mads.dk', 1, 189, NULL, NULL, 108),
(4, 'Test', 'Hansen', 'test@test.dk', 1, 190, NULL, NULL, 109);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL,
  `logDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `editedBy` int(11) DEFAULT NULL,
  `logMessage` text,
  `logChange` varchar(45) DEFAULT NULL,
  `logIp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `log`
--

INSERT INTO `log` (`id`, `logDate`, `editedBy`, `logMessage`, `logChange`, `logIp`) VALUES
(93, '2017-03-27 13:17:35', NULL, NULL, 'Oprettet Produkt - Test', NULL),
(94, '2017-03-27 13:21:31', NULL, NULL, 'Oprettet Produkt - Test', NULL),
(95, '2017-03-27 13:23:46', NULL, NULL, 'Oprettet Produkt - Test V2', NULL),
(96, '2017-03-27 13:39:08', NULL, NULL, 'Oprettet Produkt - Test', NULL),
(97, '2017-03-27 14:42:49', NULL, NULL, 'Oprettet Produkt - Test V2', NULL),
(98, '2017-03-27 14:43:16', NULL, NULL, 'Oprettet Produkt - Test V3', NULL),
(99, '2017-03-27 14:47:16', NULL, NULL, 'Oprettet Produkt - Test V4', NULL),
(100, '2017-03-27 14:47:51', NULL, NULL, 'Oprettet Produkt - Test V5', NULL),
(101, '2017-03-27 14:48:12', NULL, NULL, 'Oprettet Produkt - Test V5', NULL),
(102, '2017-03-27 14:48:36', NULL, NULL, 'Oprettet Produkt - Test V5', NULL),
(103, '2017-03-27 14:50:36', NULL, NULL, 'Oprettet Produkt - Test', NULL),
(104, '2017-03-28 11:04:43', NULL, NULL, 'Oprettet Produkt - Test Test', NULL),
(105, '2017-03-28 11:16:21', NULL, NULL, 'Oprettet Produkt - Test', NULL),
(107, '2017-03-28 14:50:07', NULL, NULL, 'Oprettet Ansat - Anders Hansen', NULL),
(108, '2017-03-28 14:51:15', NULL, NULL, 'Oprettet Ansat - Hansen Madsen', NULL),
(109, '2017-03-28 14:52:32', NULL, NULL, 'Oprettet Ansat - Test Hansen', NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `from_first_name` varchar(45) DEFAULT NULL,
  `from_last_name` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `message` text,
  `time_send` datetime DEFAULT CURRENT_TIMESTAMP,
  `from_email` varchar(126) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `article` text,
  `fk_created` int(11) DEFAULT NULL,
  `fk_img` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `news`
--

INSERT INTO `news` (`id`, `title`, `article`, `fk_created`, `fk_img`, `fk_edited`) VALUES
(8, 'Test', 'Dette er en test nyhed.\r\nDette er en test nyhed.\r\nDette er en test nyhed.\r\nDette er en test nyhed.\r\nDette er en test nyhed.', 94, 178, NULL),
(11, 'Test V2', 'KJSDFKLSJDF kljdg 4353', 97, 181, NULL),
(12, 'Test V3', 'klsdjfklj v3', 98, 182, NULL),
(13, 'Test V4', 'Test', 99, 183, NULL),
(14, 'Test V5', 'V5', 102, NULL, NULL),
(15, 'Test', '500x300', 103, 184, NULL),
(16, 'Test Test', 'dæskjfls kljsd kljs kj skldjfsdfjsdklfjsdklsj sdjksdfkljdklfsj sdkjdlfjsdfkjfls sdfkjsdflsjfksdj sdfjksldfksj', 104, 185, NULL),
(17, 'Test V2', 'dkfsjfsdjk sdjfsdklj fsdlfjsdljf klsfjsdlk fjsdljsdkl fjsdkljfsdj fklsdjfklsdj fksdjfklsj fklsdj flsdjfklsdjf klsdjfklsdj fklsdjfklsdjfsdjfkljsdlfjsdfkljsdklfjkfjsdklfjsdklfjsdklfjsdfklsdfjsdlfjsdklfjsdkfjsdkfklsdfjsdklfjsdklfjsdklfjsd', 105, 186, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `time_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `position` int(11) DEFAULT NULL,
  `fk_pages_details` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL,
  `fk_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `pagesdetails`
--

CREATE TABLE IF NOT EXISTS `pagesdetails` (
  `id` int(11) NOT NULL,
  `text` text,
  `fk_img` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL,
  `fk_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `picturecategory`
--

CREATE TABLE IF NOT EXISTS `picturecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `filepath` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `picturecategory`
--

INSERT INTO `picturecategory` (`id`, `category`, `filepath`) VALUES
(1, 'Ansat', 'employee_img'),
(2, 'Produkt', 'product_img'),
(3, 'Nyhed', 'news_img');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL,
  `filename` varchar(256) DEFAULT NULL,
  `fk_pictureCategory` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL,
  `fk_created` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `pictures`
--

INSERT INTO `pictures` (`id`, `filename`, `fk_pictureCategory`, `fk_edited`, `fk_created`) VALUES
(177, 'rock_of_ages.jpg', 2, NULL, NULL),
(178, 'Lige-Nu-hollow.jpg', 3, NULL, NULL),
(181, 'unnamed.png', 3, NULL, NULL),
(182, NULL, 3, NULL, NULL),
(183, NULL, 3, NULL, NULL),
(184, NULL, 3, NULL, NULL),
(185, NULL, 3, NULL, NULL),
(186, NULL, 3, NULL, NULL),
(188, NULL, 1, NULL, NULL),
(189, NULL, 1, NULL, NULL),
(190, 'annelise.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `price` decimal(8,2) DEFAULT NULL,
  `priceDiscount` int(11) DEFAULT NULL,
  `fk_created` int(11) DEFAULT NULL,
  `fk_img` int(11) DEFAULT NULL,
  `fk_brand` int(11) DEFAULT NULL,
  `fk_edited` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `priceDiscount`, `fk_created`, `fk_img`, `fk_brand`, `fk_edited`) VALUES
(128, 'Test', '3434', '23.00', 23, 93, 177, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `shopsetting`
--

CREATE TABLE IF NOT EXISTS `shopsetting` (
  `id` int(11) NOT NULL,
  `shopName` varchar(45) DEFAULT NULL,
  `shopAdress` varchar(45) DEFAULT NULL,
  `shopZipcode` int(11) DEFAULT NULL,
  `shopCity` varchar(45) DEFAULT NULL,
  `shopemail` varchar(65) DEFAULT NULL,
  `shopPhone` int(11) DEFAULT NULL,
  `shopFacebook` varchar(65) DEFAULT NULL,
  `shopTwitter` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_createdBrand_idx` (`fk_created`), ADD KEY `fk_editedBrand_idx` (`fk_edited`);

--
-- Indeks for tabel `employeerole`
--
ALTER TABLE `employeerole`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_role_idx` (`fk_role`), ADD KEY `fk_img_idx` (`fk_img`), ADD KEY `fk_hired_idx` (`fk_hired`);

--
-- Indeks for tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_editedBy_idx` (`editedBy`);

--
-- Indeks for tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_img_idx` (`fk_img`), ADD KEY `fk_edited_idx` (`fk_edited`), ADD KEY `fk_newsCreated_idx` (`fk_created`);

--
-- Indeks for tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_edited_idx` (`fk_edited`), ADD KEY `fk_pagesDetails_idx` (`fk_pages_details`), ADD KEY `fk_pageCreated_idx` (`fk_created`);

--
-- Indeks for tabel `pagesdetails`
--
ALTER TABLE `pagesdetails`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_img_idx` (`fk_img`), ADD KEY `fk_:edited_idx` (`fk_edited`), ADD KEY `fk_pageDetailsCreated_idx` (`fk_created`);

--
-- Indeks for tabel `picturecategory`
--
ALTER TABLE `picturecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_picCreated_idx` (`fk_created`), ADD KEY `fk_picEdited_idx` (`fk_edited`), ADD KEY `fk_picCategory_idx` (`fk_pictureCategory`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_brand_idx` (`fk_brand`), ADD KEY `fk_image_idx` (`fk_img`), ADD KEY `fk_edited_idx` (`fk_edited`), ADD KEY `fk_createdProduct_idx` (`fk_created`);

--
-- Indeks for tabel `shopsetting`
--
ALTER TABLE `shopsetting`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `employeerole`
--
ALTER TABLE `employeerole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tilføj AUTO_INCREMENT i tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- Tilføj AUTO_INCREMENT i tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Tilføj AUTO_INCREMENT i tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `pagesdetails`
--
ALTER TABLE `pagesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `picturecategory`
--
ALTER TABLE `picturecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- Tilføj AUTO_INCREMENT i tabel `shopsetting`
--
ALTER TABLE `shopsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `brands`
--
ALTER TABLE `brands`
ADD CONSTRAINT `fk_createdBrand` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_editedBrand` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `employees`
--
ALTER TABLE `employees`
ADD CONSTRAINT `fk_employeeImg` FOREIGN KEY (`fk_img`) REFERENCES `pictures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hired` FOREIGN KEY (`fk_hired`) REFERENCES `log` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_role` FOREIGN KEY (`fk_role`) REFERENCES `employeerole` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `log`
--
ALTER TABLE `log`
ADD CONSTRAINT `fk_editedBy` FOREIGN KEY (`editedBy`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `fk_newsCreated` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_newsEdited` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_newsImg` FOREIGN KEY (`fk_img`) REFERENCES `pictures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `pages`
--
ALTER TABLE `pages`
ADD CONSTRAINT `fk_pageCreated` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pageEdited` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pagesDetails` FOREIGN KEY (`fk_pages_details`) REFERENCES `pagesdetails` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `pagesdetails`
--
ALTER TABLE `pagesdetails`
ADD CONSTRAINT `fk_pageDetailsCreated` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pageDetailsEdited` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pagesDetailsImg` FOREIGN KEY (`fk_img`) REFERENCES `pictures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `pictures`
--
ALTER TABLE `pictures`
ADD CONSTRAINT `fk_picCategory` FOREIGN KEY (`fk_pictureCategory`) REFERENCES `picturecategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_picCreated` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_picEdited` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrænsninger for tabel `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `fk_brand` FOREIGN KEY (`fk_brand`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_createdProduct` FOREIGN KEY (`fk_created`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_editedProduct` FOREIGN KEY (`fk_edited`) REFERENCES `log` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_productImage` FOREIGN KEY (`fk_img`) REFERENCES `pictures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
