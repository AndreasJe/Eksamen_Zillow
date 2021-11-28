-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 11 2021 kl. 15:37:35
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
  `item_author` varchar(30) NOT NULL,
  `item_author_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_location`, `item_features`, `item_log`, `item_author`, `item_author_id`) VALUES
('06d26ff3c2157a80bce56be67320cc3b', 'Hus', '$45,356', '1441 Thomas Dr, Lebanon, MO 65536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:05:19.000000', 'Andreas Jensen', '184'),
('5b063dda3ce6ae94506b4a19baf6bf59', 'House 3', '$546,409', 'Damgadevej, 4000 Roskilde', 'Flot og nydeligt. Ofte rengjort, men overvejende tilrøget', '2021-11-28 07:35:59.000000', 'John Doe', '184'),
('6a7a2ddafc95b45a62404238e6d47e3f', 'House 1', '$420,690', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street', '2021-11-28 07:22:09.000000', 'Arthur', '184'),
('8beed7296556d53e1f8f5e8759f60a82', 'House 3', '$420,690', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street', '2021-11-28 07:23:16.000000', 'Don Ø', '184'),
('90634ec445c31ffec7d3d2be88e6e419', 'House 1', '$420,690', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street', '2021-11-28 07:29:27.000000', 'Arthuro Bungami', '184'),
('938da942273019062db0c68f7fd12d6b', 'House 3', '$546,409', 'Damgadevej, 4000 Roskilde', 'Flot og nydeligt. Ofte rengjort, men overvejende tilrøget', '2021-11-28 07:35:10.000000', 'Sofie Rødthår', '184'),
('a7c2ce85a706601034d9178268816e0d', 'House 1', '$420,690', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street', '2021-11-28 07:22:06.000000', 'Karsten Villerslev', '184'),
('adac2eb0be4f87150568209452e068bf', 'House 3', '$546,409', 'Damgadevej, 4000 Roskilde', 'Flot og nydeligt. Ofte rengjort, men overvejende tilrøget', '2021-11-28 07:35:50.000000', 'Poul Hansen', '184'),
('bbaa4bd5f1d86e3db7188456670a2984', 'Hus', '$45,356', '1441 Thomas Dr, Lebanon, MO 65536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:03:06.000000', 'Katrine Parkinson', '184'),
('c532a7707a31d5a6b81303e34e97d3e2', 'Hus', '$45,356', '1441 Thomas Dr, Lebanon, MO 65536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:04:47.000000', 'Damgaard Petersen', '184'),
('cb54a4ec70ee362e7ce5d4cf1bace02c', 'House 2', '$620,620', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street Featuring Tons Of Space', '2021-11-28 07:23:53.000000', 'Ben Dover', '184'),
('ed64f0dd5b291ef12177325b6d70229d', 'Hus', '$45,356', '1441 Thomas Dr, Lebanon, MO 65536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:05:19.000000', 'Andreas Jensen', '184');

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
(184, 'Buller', 'andr030i@stud.kea.dk', '$2y$10$vP.sMgndFSECz98kHBGPgORVgG1rDBq2GIJr2T88h1KM9hIn.cFS2', '9f53006076019257ee5ed8a1350a0637', 'a64fb29c5aec6b3aecd8f89a0bfe9926', 0, '4', 'Andreas', 'Jensen', '557ec'),
(196, NULL, 'gud.er.gud@gmail.com', '$2y$10$C2UNEeRDIjcYpK2AJHMSnO7llThVN.WG0p6olqcG8jGihtk1pXH6K', '0ebf06e6e5f3bc59896938aed893a428', '9a72ea19c55601f74e22787c1416642d', 0, NULL, NULL, NULL, 'b9f9f'),
(198, NULL, 'asd@asd.dk', '$2y$10$i4sjQSIsd0HJyuq01ohTHOqTpaXMHMtm1xXrD5Jr4oDPxcFuTpJT2', 'f7a6e0e9d40af7b4780e4ebe95dddc8f', '4a172ca2cfa239ab149142243b60c5bb', 0, NULL, NULL, NULL, '74bbb'),
(200, NULL, 'asdd@asd.dk', '$2y$10$EWPZK/qFHV9/00VHZMaemedfC389mfFv12/ZMDN73mPVBlKk7cugO', '9031ffcd2061cfd6e61b76e8d59aa051', 'b830cf15e1305e51ad5ba0d9d54e44ad', 0, NULL, NULL, NULL, '5bfbe'),
(201, NULL, 'andr03@0tud.de', '$2y$10$UMyAIhQ7m8HTtvPBM2kS7e8FFBNCcY9CTGKy8GfQxz2kcK3t9Ajyq', 'b39478b78c3dede4d872717d4fad70d9', '4bc16ceb32fce2e2f6559ed3efe72169', 0, NULL, NULL, NULL, '3a284'),
(203, NULL, 'andr03@0tdud.de', '$2y$10$vpUeCy8IrhXBVxL2ixvWEOsgrUhREmvJ9LI9kRROxNkx01cLCdTHm', '52ace3608308f4562c0d811ff007c8ca', '97bbf10aaa3f14680ea6a55317872015', 0, NULL, NULL, NULL, 'dfff4'),
(205, NULL, 'andr030i@stu.dk', '$2y$10$ecIqSOxmHW4zsD9QYxueY.CtPP1gasZUQ5eelzMaqOYSZcxpArd16', 'e89fbc1952701618281fa278ad9dbec7', '82e06526167ff9b795a6cba39ba93b50', 0, NULL, NULL, NULL, 'ef63f');

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
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
