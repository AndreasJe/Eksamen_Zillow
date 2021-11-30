-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 30. 11 2021 kl. 04:11:47
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
('0c477e534b702871b0352fcbc8a786ea', 'Andet Hus', '30.000', 'Vinterstøvlevej 28, 4000 Århus', 'Smuk hus på Bornholm', '2021-11-29 15:35:47.000000', 'Andreas Jensen', '184'),
('11ee82d60f3165c5198051cbbfd983be', 'Hus 2', '40.000', 'Bornedahlvej 29, 3400 Vejen.', 'Smukt hus ved vejen', '2021-11-29 15:42:06.000000', 'Andreas Jensen', '184'),
('1215b32eaf611a3b7872873039a3959b', 'House', '45,356', '280 Washington Street, Hudson MA 1749', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:51.000000', 'Andreas Jensen', '184'),
('264b2cc42130eda62f7b1b618dded90f', 'House', '45,356', '135 Fairgrounds Memorial Pkwy, Ithaca NY 14850', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:41:49.000000', 'Andreas Jensen', '184'),
('463e3d4328fe31302f8a1da3985e1dc6', 'House 2', '45,356', '255 W Main St, Avon CT 6001', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:51:52.000000', 'Andreas Jensen', '184'),
('4f707af5d82231266f2ac4b398d59f30', 'House 13', '50,856', '3501 20th Av, Valley AL 36854', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:25.000000', 'Andreas Jensen', '184'),
('5209a9e4663a741d206d7832705872fa', 'House 2', '45,356', '1608 W Magnolia Ave, Geneva AL 36340', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:53:36.000000', 'Andreas Jensen', '184'),
('7b15325961a064cfa3df4c612144f70d', 'House 13', '50,856', 'Near the roundabout', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:39.000000', 'Andreas Jensen', '184'),
('938da942273019062db0c68f7fd12d6b', 'House 10', '546,409', '0 Tuscumbia Rd, Lebanon, MO 65536', 'Great future investment potential in residential development! Come take a look today!', '2021-11-28 07:35:10.000000', 'Sofie Rødthår', '184'),
('adac2eb0be4f87150568209452e068bf', 'House 11', '546,409', '506 State Road, North Dartmouth MA 2747', 'Acreage like this in the city limits is hard to find! Two sides of road frontage and great pasture l', '2021-11-28 07:35:50.000000', 'Poul Hansen', '184'),
('ba5be05a726bfd8adf7f5ae87125da0f', 'TEST', 'TEST', 'EST', 'TESTT', '2021-11-30 02:21:36.000000', 'TSET', '184'),
('bbaa4bd5f1d86e3db7188456670a2984', 'House 6', '45,356', ' 137 Teaticket Hwy, East Falmouth MA 2536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:03:06.000000', 'Katrine Parkinson', '184'),
('c3a373e7827278433be3f74b133410a5', 'House 2', '42.000', '3371 S Alabama Ave, Monroeville AL 36460', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:57:10.000000', 'Andreas Jensen', '184'),
('c532a7707a31d5a6b81303e34e97d3e2', 'House 7', '45,356', '374 William S Canning Blvd, Fall River MA 2721', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:04:47.000000', 'Damgaard Petersen', '184'),
('cb54a4ec70ee362e7ce5d4cf1bace02c', 'House 12', '620,620', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street Featuring Tons Of Space', '2021-11-28 07:23:53.000000', 'Ben Dover', '184'),
('d18786380a97b276b31b820098e2429a', 'Grandpa\'s House', '485,152', '434 S Garden St, Visalia, CA 93277', 'Hard to find Duplex near Downtown Visalia. Walking distance to all amenities.', '2021-11-29 14:32:34.000000', 'Andreas Jensen', '184'),
('d87aaeb1e39befdc925d17576bc86dfe', 'Granny\'s House', '49.000', 'Avalon, Arbor Gates, Visalia, CA 93277', 'Arbor Gates is ideally located in southwest Visalia and provides the privacy and security of a gated', '2021-11-29 14:29:32.000000', 'Andreas Jensen', '184'),
('ed64f0dd5b291ef12177325b6d70229d', 'Hus - API test', '15.000', '123 Park St. Hamilton 45403 NY', 'Beautiful House that has been configured via the api', '2021-11-28 08:05:19.000000', 'Andreas Jensen', '184'),
('ed8fec5bd99a0a20b871ca23deaece56', 'Hus', '50.000', 'Andedamsvej 20, 2000 Rønne, Bornholm', 'Huset er som nyt', '2021-11-30 02:34:55.000000', 'Arne Vindslev', '184');

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
(184, 'Buller', 'andr030i@stud.kea.dk', '$2y$10$7fRCyPxU/Yt8EXScrNXy/uFn6L6DuE3nObrxuyPJxX4DgAbDEf0Vm', '9f53006076019257ee5ed8a1350a0637', 'a64fb29c5aec6b3aecd8f89a0bfe9926', 0, '4', 'Andreas', 'Jensen', '96d42'),
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
