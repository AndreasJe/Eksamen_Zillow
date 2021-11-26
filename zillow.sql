-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 27. 11 2021 kl. 00:16:28
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zillow`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(22) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT 'hg',
  `verification_key` varchar(32) NOT NULL DEFAULT '123132123',
  `forgot_pass_key` varchar(32) NOT NULL DEFAULT '1254545',
  `verified` tinyint(1) DEFAULT NULL,
  `user_phone` varchar(8) DEFAULT NULL,
  `first_name` varchar(22) DEFAULT NULL,
  `last_name` varchar(22) DEFAULT NULL,
  `authentication_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `verification_key`, `forgot_pass_key`, `verified`, `user_phone`, `first_name`, `last_name`, `authentication_code`) VALUES
(184, 'Buller', 'andr030i@stud.kea.dk', '$2y$10$dYk0SwA.bflJNxUYkb7IVeGcFbuJ2r2ex9THNhivMmxDXBilH2rLe', '9f53006076019257ee5ed8a1350a0637', 'ebad24e92a07d22bdeaa78d3d793bd9c', 0, '22486050', 'Andreas', 'Jensen', 'e1092');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
