-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 11 2021 kl. 01:48:06
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
-- Struktur-dump for tabellen `items`
--

CREATE TABLE `items` (
  `item_id` varchar(32) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(30) NOT NULL,
  `item_location` varchar(50) NOT NULL,
  `item_features` varchar(100) NOT NULL,
  `item_log` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `item_author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_location`, `item_features`, `item_log`, `item_author`) VALUES
('28a0b3866b4df1e8635697332ed341d4', 'House 1', '42069', '192 Green Dr, Edwards, MO 65326', 'Cozy lake retreat or ideal VRBO. This adorable well cared for home boasts a spacious kitchen', '2021-11-27 23:53:21.000000', 'Arthur');

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
(184, 'Buller', 'andr030i@stud.kea.dk', '$2y$10$SNXEp6eQMkhSjRh31IEeBuF37oCvZxwVvR/kLzpDWG2Odiv10K.6O', '9f53006076019257ee5ed8a1350a0637', 'a64fb29c5aec6b3aecd8f89a0bfe9926', 0, '22486050', 'Andreas', 'Jensen', 'e1092'),
(196, NULL, 'gud.er.gud@gmail.com', '$2y$10$C2UNEeRDIjcYpK2AJHMSnO7llThVN.WG0p6olqcG8jGihtk1pXH6K', '0ebf06e6e5f3bc59896938aed893a428', '9a72ea19c55601f74e22787c1416642d', 0, NULL, NULL, NULL, 'b9f9f'),
(198, NULL, 'asd@asd.dk', '$2y$10$i4sjQSIsd0HJyuq01ohTHOqTpaXMHMtm1xXrD5Jr4oDPxcFuTpJT2', 'f7a6e0e9d40af7b4780e4ebe95dddc8f', '4a172ca2cfa239ab149142243b60c5bb', 0, NULL, NULL, NULL, '74bbb'),
(200, NULL, 'asdd@asd.dk', '$2y$10$EWPZK/qFHV9/00VHZMaemedfC389mfFv12/ZMDN73mPVBlKk7cugO', '9031ffcd2061cfd6e61b76e8d59aa051', 'b830cf15e1305e51ad5ba0d9d54e44ad', 0, NULL, NULL, NULL, '5bfbe');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `item_id` (`item_id`);

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
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
