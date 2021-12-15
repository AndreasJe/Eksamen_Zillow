-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 15. 12 2021 kl. 23:35:01
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
  `item_log` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_author` varchar(30) NOT NULL,
  `item_author_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_location`, `item_features`, `item_log`, `item_author`, `item_author_id`) VALUES
('0c477e534b702871b0352fcbc8a786ea', 'Paul Skammelsens Hus', '30.000', 'Vinterstøvlevej 02, 2400 Kolding', 'Smukt hus på Færgeøerne. Fantastisk sted at boltre sig i laden og med ænderne', '2021-11-29 15:35:47', 'Andreas Jensen', '275'),
('11ee82d60f3165c5198051cbbfd983be', 'Hus 2', '40.000', 'Bornedahlvej 29, 3400 Vejen.', 'Smukt hus ved vejen', '2021-11-29 15:42:06', 'Andreas Jensen', '275'),
('1215b32eaf611a3b7872873039a3959b', 'House', '45,356', '280 Washington Street, Hudson MA 1749', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:51', 'Andreas Jensen', '275'),
('15f7e2e4bdd656aa7df4d54c64b32ca2', 'Arne Jensen Automobiler', '5.000.000', 'Salbjergvej 28, 2300 Havdrup', 'Bilforretning med alt der skal bruges', '2021-12-04 18:13:38', 'Andreas Jensen', '275'),
('264b2cc42130eda62f7b1b618dded90f', 'House', '45,356', '135 Fairgrounds Memorial Pkwy, Ithaca NY 14850', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:41:49', 'Andreas Jensen', '275'),
('463e3d4328fe31302f8a1da3985e1dc6', 'House 2', '45,356', '255 W Main St, Avon CT 6001', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:51:52', 'Andreas Jensen', '275'),
('488a29e6e2698ec31e87b64b7bbe1b64', 'Best of the Best', '420.069', 'Long Island City 23, 4500 Havdrup', 'Beautiful', '2021-12-05 04:36:14', ' Another User', '275'),
('4f707af5d82231266f2ac4b398d59f30', 'House 13', '50,856', '3501 20th Av, Valley AL 36854', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:25', 'Andreas Jensen', '275'),
('50f9dd7603dee56889e0e9244b44d472', 'Lane Street 42th.', '45.000', 'Baseball street 32, LuckeyLukeLand.', 'Lovely house for a family of 5. Enjoy this lovely cabin for all kinds.', '2021-12-05 04:42:51', ' Another User', '275'),
('5209a9e4663a741d206d7832705872fa', 'House 2', '45,356', '1608 W Magnolia Ave, Geneva AL 36340', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:53:36', 'Andreas Jensen', '275'),
('6c46dbacc0d419c3181bf1e4476ef817', 'Best of the Best', '420.069', 'Long Island City 23, 4500 Havdrup', 'Beautiful', '2021-12-05 04:41:17', ' Another User', '275'),
('7b15325961a064cfa3df4c612144f70d', 'House 13', '50,856', 'Near the roundabout', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 14:40:39', 'Andreas Jensen', '275'),
('938da942273019062db0c68f7fd12d6b', 'House 10', '546,409', '0 Tuscumbia Rd, Lebanon, MO 65536', 'Great future investment potential in residential development! Come take a look today!', '2021-11-28 07:35:10', 'Sofie Rødthår', '275'),
('adac2eb0be4f87150568209452e068bf', 'House 11', '546,409', '506 State Road, North Dartmouth MA 2747', 'Acreage like this in the city limits is hard to find! Two sides of road frontage and great pasture l', '2021-11-28 07:35:50', 'Poul Hansen', '275'),
('ba5be05a726bfd8adf7f5ae87125da0f', 'TEST', 'TEST', 'EST', 'TESTT', '2021-11-30 02:21:36', 'TSET', '275'),
('bbaa4bd5f1d86e3db7188456670a2984', 'House 6', '45,356', ' 137 Teaticket Hwy, East Falmouth MA 2536', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:03:06', 'Katrine Parkinson', '275'),
('c3a373e7827278433be3f74b133410a5', 'House 2', '42.000', '3371 S Alabama Ave, Monroeville AL 36460', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-29 13:57:10', 'Andreas Jensen', '275'),
('c532a7707a31d5a6b81303e34e97d3e2', 'House 7', '45,356', '374 William S Canning Blvd, Fall River MA 2721', 'Be prepared for a jaw-drop! This adorable home has more space that you would ever expect', '2021-11-28 08:04:47', 'Damgaard Petersen', '275'),
('cb54a4ec70ee362e7ce5d4cf1bace02c', 'House 12', '620,620', '4725 Bronx Blvd #B, Bronx, NY 10470', 'This Gorgeous Single Home Is Nestled On A Beautiful Tree Lined Street Featuring Tons Of Space', '2021-11-28 07:23:53', 'Ben Dover', '275'),
('d18786380a97b276b31b820098e2429a', 'Grandpa\'s House', '485,152', '434 S Garden St, Visalia, CA 93277', 'Hard to find Duplex near Downtown Visalia. Walking distance to all amenities.', '2021-11-29 14:32:34', 'Andreas Jensen', '275'),
('d87aaeb1e39befdc925d17576bc86dfe', 'Granny\'s House', '49.000', 'Avalon, Arbor Gates, Visalia, CA 93277', 'Arbor Gates is ideally located in southwest Visalia and provides the privacy and security of a gated', '2021-11-29 14:29:32', 'Andreas Jensen', '275'),
('ed64f0dd5b291ef12177325b6d70229d', 'Hus - API test', '15.000', '123 Park St. Hamilton 45403 NY', 'Beautiful House that has been configured via the api', '2021-11-28 08:05:19', 'Andreas Jensen', '275'),
('ed8fec5bd99a0a20b871ca23deaece56', 'Hus', '50.000', 'Andedamsvej 20, 2000 Rønne, Bornholm', 'Huset er som nyt', '2021-11-30 02:34:55', 'Arne Vindslev', '275');

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
(184, 'Buller', 'gud.er.gud@gmail.com', '$2y$10$7fRCyPxU/Yt8EXScrNXy/uFn6L6DuE3nObrxuyPJxX4DgAbDEf0Vm', 'b826eceda60bb01ea7731d6adfa59635', 'a64fb29c5aec6b3aecd8f89a0bfe9926', 1, '22486050', 'Andreas', 'Jensen', '96005'),
(268, 'Buller2', 'asd@asd.dk', '$2y$10$7DAuSXzZrX6jQJmvxauVbO5B9q7q..tCIlEHuGvpukjXBhC01OKeC', 'ff8825021f1efe3f4ccb233969d3558b', '3ebaab0e8586d86744de7094638aec79', 0, '12345678', 'Another', 'User', 'a0814'),
(270, NULL, 'asd2@asd.dk', '$2y$10$yZ5fMT3ydnJuD02k1j.94ehWbTEuKHgxqDPnxnbinkAOm7pGgjosS', 'c8d73723a5ca113c1b2f857d1ba3cad3', 'a7021e0c5c7925a9bb8a77dd386b8469', 0, NULL, NULL, NULL, 'eae05'),
(275, NULL, 'andr030i@stud.kea.dk', '$2y$10$ucblArrGEapVkBF4gUa0h.lCqM4iReN3McBTMeK4vqQSyMND58yNS', '206745244a819870d7acd1fc89d75730', '4e3da157f2c0fe97cfb78fc42a6cb067', 0, NULL, NULL, NULL, 'b8d44');

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
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
