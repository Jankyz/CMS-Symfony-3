-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 01 Paź 2018, 18:33
-- Wersja serwera: 5.7.19
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rockon`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` datetime NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `registeredAt` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `birthdate`, `position`, `email`, `password`, `registeredAt`, `username`, `roles`) VALUES
(1, 'Jan', 'Nowak', '1898-01-01 00:00:00', 'Company CEO', 'ceo@rockon.io', '$2y$13$sQnQaIs21E7Q2yEXhqXWTOwZqFZyT8BVvGp2tFP9T.DVzw5vwWSMC', '2018-10-01 18:29:06', 'Ceo', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(2, 'Adam', 'Kowalski', '1898-01-01 00:00:00', 'Company SEO', 'seo@rockon.io', '$2y$13$NDkLgcEneoaykkxErpCMnOyv7a1iWwMi7bRGoTLULy6LXvRgQrhEe', '2018-10-01 18:29:53', 'Seo', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(3, 'Tomasz', 'Wiśniewski', '1898-01-01 00:00:00', 'Company TESTER', 'tester@rockon.io', '$2y$13$MHjeXtkbvL2n.McdelsQBeGcmMKVtmBU9VomeTFO5s1gtc5ve6Ree', '2018-10-01 18:31:29', 'Tester', 'a:1:{i:0;s:9:\"ROLE_USER\";}');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
