drop database if exists shoestore;
create database shoestore;
use shoestore;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(255) UNIQUE COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE IF NOT EXISTS `prodajalec` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(255) UNIQUE COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'aktiviran'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE IF NOT EXISTS `stranka` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(255) UNIQUE COLLATE utf8_slovenian_ci NOT NULL,
  `naslov` varchar(255) UNIQUE COLLATE utf8_slovenian_ci NOT NULL,
  `telefon` int(9) UNIQUE NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'aktiviran'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE IF NOT EXISTS `narocilo` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `vsota` int(11) NOT NULL,
  `status` varchar(12) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'caka'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE IF NOT EXISTS `narocilo_izdelek` (
  `id` int(11) NOT NULL,
  `id_narocila` int(11) NOT NULL,
  `id_izdelek` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE IF NOT EXISTS `shoe` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL,
  `status` varchar(11) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'aktiviran'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `shoe` (`id`, `brand`, `name`, `price`, `size`) VALUES 
(1, 'Nike', 'Air Max 90', 90, 42), 
(2, 'Adidas', 'Superstar', 70, 40), 
(3, 'Jordan', 'Air Jordan 1', 150, 41), 
(4, 'Puma', 'XO', 120, 43);

ALTER TABLE `shoe`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `shoe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

INSERT INTO `administrator` (`id`, `ime`, `priimek`, `email`, `geslo`) VALUES
(1, 'Janez', 'Admin', 'janez@admin-ep.si', '$2y$10$vEYQCdZpWX1s0uEzNlwLnupb0poS/MTYylMsoN5zeF52L9t3ueW1O');

ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

INSERT INTO `prodajalec` (`id`, `ime`, `priimek`, `email`, `geslo`, `status`) VALUES
(1, 'Miha', 'Prodajalec', 'miha@prodajalec-ep.si', '$2y$10$B.TddWuVVL1cGInme8o.Fu5T1RO4lbcu/n1chulgi83c1hYkr1Yki', 'aktiviran'),
(2, 'Maša', 'prodajalec', 'masa@prodajalec-ep.si', '$2y$10$ihdju2LNBAE8hQ8HSueZDe091WQnV4oh0VM/acZWEGk6S8jujxlKy', 'aktiviran');

ALTER TABLE `prodajalec`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prodajalec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

INSERT INTO `stranka` (`id`, `ime`, `priimek`, `email`, `naslov`, `telefon`, `geslo`, `status`) VALUES
(1, 'Mateja', 'Kupec', 'mateja@stranka-ep.si','Vojkova 7','111222111', '$2y$10$aiQzQo/d6/NlubUrJytI2Ozr418k.CFo7cNjPlLtJ8Sv9CF1s2A2m', 'aktiviran'),
(2, 'Sand', 'Kupec', 'sandi@stranka-ep.si','Prekorje 29', '333444555', '$2y$10$irxAXiSk8bZVX2.7w3GqcO/ony38.0QwTWr/dhdo31/9kWdUVKmp6', 'aktiviran');

ALTER TABLE `stranka`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stranka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `narocilo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `narocilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `narocilo_izdelek`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `narocilo_izdelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;