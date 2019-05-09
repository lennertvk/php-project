-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 mei 2019 om 21:10
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

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
  `titel` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `image`, `text`, `minified`, `image_likes`, `titel`, `userid`, `datum`, `tijd`) VALUES
(113, 'downloads.jpg', 'Pompoenen komen oorspronkelijk uit de regio Midden- en Zuid-Amerika, waar ze al duizenden jaren voor Christus werden verbouwd. In Europa werden deze vruchten pas in de 16e eeuw voor het eerst gesignaleerd. Enigszins verrassend is het feit, dat pompoenen familie zijn van de komkommer en meloen. Pompoenen worden dan ook beschouwd als ‘vruchtgroente’.', NULL, 5, 'pompoen', 0, '0000-00-00', '00:00:00'),
(114, 'minidownloads.jpg', 'Pompoenen komen oorspronkelijk uit de regio Midden- en Zuid-Amerika, waar ze al duizenden jaren voor Christus werden verbouwd. In Europa werden deze vruchten pas in de 16e eeuw voor het eerst gesignaleerd. Enigszins verrassend is het feit, dat pompoenen familie zijn van de komkommer en meloen. Pompoenen worden dan ook beschouwd als ‘vruchtgroente’.\r\n', 1, 0, 'pompoen', 0, '0000-00-00', '00:00:00'),
(115, '2019-02-20_11h38_35.png', 'Feit 1 Wereldwijd wordt er veel meer voedsel geproduceerd dan nodig is om alle mensen van voldoende eten te voorzien.\r\n\r\nFeit 2 Eén op de negen mensen lijdt aan een voedseltekort. Dat zijn 793 miljoen mensen met honger.', NULL, 2, 'eten', 0, '0000-00-00', '00:00:00'),
(116, 'mini2019-02-20_11h38_35.png', 'Feit 1 Wereldwijd wordt er veel meer voedsel geproduceerd dan nodig is om alle mensen van voldoende eten te voorzien.\r\n\r\nFeit 2 Eén op de negen mensen lijdt aan een voedseltekort. Dat zijn 793 miljoen mensen met honger.', 1, 5, 'eten', 0, '0000-00-00', '00:00:00'),
(117, '2019-01-23_19h01_20.png', 'Kleine reunie gepland met de vrienden', NULL, 1, 'the good times', 0, '0000-00-00', '00:00:00'),
(118, 'mini2019-01-23_19h01_20.png', 'Kleine reunie gepland met de vrienden', 1, 0, 'the good times', 0, '0000-00-00', '00:00:00'),
(119, '2019-01-29_13h57_59.png', '1\r\n', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(120, 'mini2019-01-29_13h57_59.png', '1\r\n', 1, 2, '', 0, '0000-00-00', '00:00:00'),
(121, '2019-01-30_14h55_53.png', 'jdsklmjf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(122, 'mini2019-01-30_14h55_53.png', 'jdsklmjf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(123, '2019-01-30_14h54_11.png', 'fsqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(124, 'mini2019-01-30_14h54_11.png', 'fsqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(125, '2019-01-30_14h06_30.png', 'dsqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(126, 'mini2019-01-30_14h06_30.png', 'dsqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(127, '2019-03-11_13h01_59.png', 'fsqd', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(128, 'mini2019-03-11_13h01_59.png', 'fsqd', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(129, '2019-03-01_11h41_31.png', 'fsqfqs', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(130, 'mini2019-03-01_11h41_31.png', 'fsqfqs', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(131, '2019-04-01_12h54_04.png', 'sqff', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(132, 'mini2019-04-01_12h54_04.png', 'sqff', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(133, '2019-04-02_14h21_29.png', 'fsqffd', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(134, 'mini2019-04-02_14h21_29.png', 'fsqffd', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(135, '2019-04-15_16h44_17.png', 'fsqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(136, 'mini2019-04-15_16h44_17.png', 'fsqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(137, '2019-03-13_22h18_54.png', 'fsqdfdf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(138, 'mini2019-03-13_22h18_54.png', 'fsqdfdf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(139, '2019-04-09_15h08_36.png', 'dfqsf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(140, 'mini2019-04-09_15h08_36.png', 'dfqsf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(141, '2019-03-05_16h19_03.png', 'qsfsdf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(142, 'mini2019-03-05_16h19_03.png', 'qsfsdf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(143, '2019-01-23_19h01_20.png', 'fdsq', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(144, 'mini2019-01-23_19h01_20.png', 'fdsq', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(145, '2019-01-23_19h01_20.png', 'f', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(146, 'mini2019-01-23_19h01_20.png', 'f', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(147, '2019-01-28_14h12_15.png', 'fsdqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(148, 'mini2019-01-28_14h12_15.png', 'fsdqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(149, '2019-01-28_14h12_24.png', 'dsfq', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(150, 'mini2019-01-28_14h12_24.png', 'dsfq', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(151, '2019-01-28_14h12_15.png', 'fsdqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(152, 'mini2019-01-28_14h12_15.png', 'fsdqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(153, '2019-01-28_14h12_15.png', 'fsdqf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(154, 'mini2019-01-28_14h12_15.png', 'fsdqf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(155, '2019-01-28_14h12_24.png', 'fsdfqsdfqs', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(156, 'mini2019-01-28_14h12_24.png', 'fsdfqsdfqs', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(157, '2019-01-29_13h57_59.png', 'fsfqsdf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(158, 'mini2019-01-29_13h57_59.png', 'fsfqsdf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(159, '2019-01-30_14h06_30.png', 'dsqfsdf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(160, 'mini2019-01-30_14h06_30.png', 'dsqfsdf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(161, '2019-01-30_14h54_11.png', 'fsdqdf', NULL, 0, '', 0, '0000-00-00', '00:00:00'),
(162, 'mini2019-01-30_14h54_11.png', 'fsdqdf', 1, 0, '', 0, '0000-00-00', '00:00:00'),
(165, 'draw-bighorn-ram-15.jpg', 'hoe teken je een geit', NULL, 0, 'hoe teken je een geit', 0, '2019-05-09', '11:40:17'),
(166, 'minidraw-bighorn-ram-15.jpg', 'hoe teken je een geit', 1, 0, 'hoe teken je een geit', 0, '2019-05-09', '11:40:17');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `likes`
--

INSERT INTO `likes` (`id`, `id_image`, `user_id`) VALUES
(5, 116, 1234),
(8, 117, 1234),
(9, 120, 1234),
(10, 120, 0),
(11, 115, 0),
(12, 115, 0);

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
(14, 'tom.testeron@hotmail.com', 'tom', '$2y$16$uM5zMgs3v4SPDnIFqKTGmek61xV9AToL0dlHS10sOrVf.FFJI8ZC.', 'Hallooo', 'images/profile/user_id-1557390028-user_id-1556185527-2019-02-20_11h38_35.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
