-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 mei 2019 om 11:30
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-project`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `minified` tinyint(1) DEFAULT NULL,
  `image_likes` int(11) NOT NULL,
  `reported` int(1) NOT NULL DEFAULT '0',
  `titel` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `display` int(1) NOT NULL DEFAULT '1',
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `image`, `text`, `minified`, `image_likes`, `reported`, `titel`, `userid`, `datum`, `tijd`, `display`, `place`) VALUES
(434, 'DD_keto-meals_feat.jpg', 'test1', NULL, 0, 0, '', 0, '2019-05-16', '10:23:38', 1, 'Mechelen'),
(435, 'miniDD_keto-meals_feat.jpg', 'test1', 1, 0, 0, '', 0, '2019-05-16', '10:23:38', 1, 'Mechelen'),
(436, 'veganpowerbowls-2157-5-683x1024.jpg', 'test2', NULL, 0, 0, '', 0, '2019-05-16', '10:23:44', 1, 'Mechelen'),
(437, 'miniveganpowerbowls-2157-5-683x1024.jpg', 'test2', 1, 0, 0, '', 0, '2019-05-16', '10:23:44', 1, 'Mechelen'),
(438, '5783153.jpg', 'test3', NULL, 0, 0, '', 0, '2019-05-16', '10:23:50', 1, 'Mechelen'),
(439, 'mini5783153.jpg', 'test3', 1, 0, 0, '', 0, '2019-05-16', '10:23:50', 1, 'Mechelen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `bio`, `image`) VALUES
(12, 'test1', 'test1', '$2y$16$G7qAO2Xy0BoG9oE0xCoVk.oZQ.n3PfAEpjxX1PO45YaoiNBXhdHLC', '', ''),
(13, 'len.nert@hotmail.com', 'lennert', '$2y$16$4omT0U37AsEVvGogr6gUIeFpRBzpZPjNV7KOkJiqQVKcctQ6XxxHu', 'mijn naam is lennert', 'images/profile/user_id-1557389304-Tekengebied1.png'),
(14, 'tom.testeron@hotmail.com', 'tom', '$2y$16$uM5zMgs3v4SPDnIFqKTGmek61xV9AToL0dlHS10sOrVf.FFJI8ZC.', 'Hallooo', 'images/profile/user_id-1557390028-user_id-1556185527-2019-02-20_11h38_35.png'),
(15, 'lennert.van.kerckhove@gmail.com', 'lennert van kerckhove', '$2y$16$HdXVs2M39ogmt.T0.QNMd.oFfyRNyRjyeu1//TAyIPi8XEhAZz7EO', '', ''),
(16, 'test@test.com', 'session test', '$2y$16$wWBz1yCPc5UrPAUFORUmV.PToDARdoTM1DTPbpVt7/qT5NBmMyE9S', '', ''),
(17, 'test@test.com', 'test 23', '$2y$16$8OCTQS6Gx09iDaKsVs4hsuMdud/TeTiyIEDeTuAbxJ0LCvieyE.xS', '', ''),
(18, 'test@test.com', 'test4', '$2y$16$rOkz5C0ZowXi934cIRNyAOD0a7hLu4E4T7SFWY.evjUiYldZPIkmi', '', ''),
(19, 'fjklqsdj@test1116.ocm', 'lennert van kerckhove', '$2y$16$Nsu8mQshHf/i8ePcqT1x3uRReLMRY3uOxzn22m1vYCHDPIlUbK3tW', '', ''),
(20, 'test@test.com', 'test session 3', '$2y$16$0ajH8i8yGJYZYcR5lLiyo.pVJYpYYbn5jXC.fDXhslb76SwMfLKTa', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;