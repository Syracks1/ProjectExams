-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 mei 2018 om 08:11
-- Serverversie: 5.7.19
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsforever`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Med_id` int(11) NOT NULL AUTO_INCREMENT,
  `fil_id` int(11) DEFAULT NULL,
  `U_id` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `tell` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Med_id`),
  KEY `U_id` (`U_id`),
  KEY `FK_employee_location` (`fil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `employee`
--

INSERT INTO `employee` (`Med_id`, `fil_id`, `U_id`, `name`, `adress`, `tell`) VALUES
(1, 1, 6, 'Henk', 'Test123', '077-46852396'),
(33, 1, 7, 'Henk Test', 'Test123', '077-46852396');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `function`
--

DROP TABLE IF EXISTS `function`;
CREATE TABLE IF NOT EXISTS `function` (
  `Func_id` int(11) NOT NULL,
  `Func_name` varchar(25) NOT NULL,
  PRIMARY KEY (`Func_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `function`
--

INSERT INTO `function` (`Func_id`, `Func_name`) VALUES
(1, 'Tester');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `fil_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `Fil_place` varchar(25) DEFAULT NULL,
  `Fil_adress` varchar(50) DEFAULT NULL,
  `Fil_tell` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`fil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `location`
--

INSERT INTO `location` (`fil_id`, `name`, `Fil_place`, `Fil_adress`, `Fil_tell`) VALUES
(1, 'ToolsForEverVenray', 'Horst', 'Test', '077-85285296'),
(2, 'ToolsForEverSevenum', 'Sevenum', 'Horsterweg 31', '06-58936854');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_tokens`
--

DROP TABLE IF EXISTS `login_tokens`;
CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` char(64) NOT NULL DEFAULT '0',
  `U_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `FK_login_tokens_user` (`U_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `U_id`) VALUES
(97, 'c2c3ec0e7b3f17bc07fc071c8dc5676376a498ab', 6),
(98, '7fedcd10f6dceaa556ace16c4f9ec37730d4dd3d', 6),
(99, 'ba741361cd27fa84c61a994a10a0ac5aa8046be2', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` text NOT NULL,
  `Price` float NOT NULL DEFAULT '0',
  `Sup_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Prod_id`),
  KEY `FK_products_supplier` (`Sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`Prod_id`, `Description`, `Price`, `Sup_id`) VALUES
(1, 'Hamer 1', 80.8, 1),
(2, 'Schroevendraaier', 50, 1),
(3, 'Steeksleutel', 50.8, 1),
(4, 'Imbus sleutel', 1.8, 1),
(15, 'Bram wil graag dat ik hier random dingen in ga voeren om een hele lange regel te krijgen. dus dat is wat ik nu aan het doen ben', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` int(11) NOT NULL DEFAULT '0',
  `Min_amount` int(11) NOT NULL DEFAULT '0',
  `Max_amount` int(11) NOT NULL DEFAULT '0',
  `Prod_id` int(11) NOT NULL DEFAULT '0',
  `fil_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Stock_id`),
  KEY `FK_stock_products` (`Prod_id`),
  KEY `fil_id` (`fil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `stock`
--

INSERT INTO `stock` (`Stock_id`, `Amount`, `Min_amount`, `Max_amount`, `Prod_id`, `fil_id`) VALUES
(4, 896, 1, 1000, 3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `Sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `Sup_name` varchar(25) NOT NULL DEFAULT '0',
  `Sup_location` varchar(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `supplier`
--

INSERT INTO `supplier` (`Sup_id`, `Sup_name`, `Sup_location`) VALUES
(1, 'Erik Leveranciers', 'Venray');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `U_id` int(11) NOT NULL AUTO_INCREMENT,
  `Func_id` int(11) DEFAULT NULL,
  `Passw` varchar(60) NOT NULL,
  `User_name` varchar(25) NOT NULL,
  PRIMARY KEY (`U_id`),
  KEY `FK_user_function` (`Func_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`U_id`, `Func_id`, `Passw`, `User_name`) VALUES
(5, 1, '$2y$10$8YkMI.8exZNLWTTD28EL0eQHcd7dfXWoEbob0h.d.lqbEjBUljOOW', 'Peter'),
(6, 1, '$2y$10$Jpf9DrqeJuooF8pZQ9TRpeRlQUzPXc/7aLdi0w1JIQNYNj/wTg/se', 'Henk'),
(7, 1, '$2y$10$ewb585C.rLWnMuwAk48N0OdP1nip7/PzKr0V6ugpnjSj6gGHQru1G', 'Gebruiker');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_employee_location` FOREIGN KEY (`fil_id`) REFERENCES `location` (`fil_id`),
  ADD CONSTRAINT `FK_employee_user` FOREIGN KEY (`U_id`) REFERENCES `user` (`U_id`);

--
-- Beperkingen voor tabel `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `FK_login_tokens_user` FOREIGN KEY (`U_id`) REFERENCES `user` (`U_id`);

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_supplier` FOREIGN KEY (`Sup_id`) REFERENCES `supplier` (`Sup_id`);

--
-- Beperkingen voor tabel `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FK_stock_location` FOREIGN KEY (`fil_id`) REFERENCES `location` (`fil_id`),
  ADD CONSTRAINT `FK_stock_products` FOREIGN KEY (`Prod_id`) REFERENCES `products` (`Prod_id`);

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_function` FOREIGN KEY (`Func_id`) REFERENCES `function` (`Func_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
