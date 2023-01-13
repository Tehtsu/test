-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jan 2023 um 09:07
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `birthday`
--

CREATE TABLE `birthday` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Montag'),
(2, 'Dienstag'),
(3, 'Mittwoch'),
(4, 'Donnerstag'),
(5, 'Freitag'),
(6, 'Samstag'),
(7, 'Sonntag');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `games`
--

INSERT INTO `games` (`id`, `name`) VALUES
(1, 'Phasmo'),
(2, 'WOT'),
(3, 'Pummelparty'),
(4, 'Amoung Us'),
(5, 'Crab Game'),
(6, 'Apex'),
(7, 'LOL'),
(8, 'RISK'),
(9, 'POE'),
(10, 'ARK'),
(11, 'F1'),
(12, 'COD'),
(13, 'FallGuys'),
(14, 'PUBG'),
(15, 'GarticPhone'),
(16, 'Valorant'),
(17, 'witch it'),
(18, 'diablo 3'),
(19, 'v rising'),
(20, 'WOW'),
(21, 'fortnite'),
(22, 'raft'),
(23, 'stronghold'),
(24, 'DeadByDayligth'),
(25, 'CS GO');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `overview`
--

CREATE TABLE `overview` (
  `id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `times` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `overview`
--

INSERT INTO `overview` (`id`, `day_id`, `game_id`, `times`, `name`, `datum`) VALUES
(1, 6, 20, '22 - 00 Uhr', 'Tehtsu', '2023-01-14'),
(2, 6, 20, '22 - 00 Uhr', 'Tehtsu', '2023-01-14'),
(3, 1, 18, '20 - 23 Uhr', 'TEST', '2023-01-16'),
(4, 3, 18, '23 - 01 Uhr', 'tetsuya', '2023-01-18'),
(5, 7, 1, '20 - 23 Uhr', 'tetsuya', '2023-01-15');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `times`
--

INSERT INTO `times` (`id`, `time`) VALUES
(1, '18 - 19 Uhr'),
(2, '19 - 20 Uhr'),
(3, '20 - 21 Uhr'),
(4, '21 - 22 Uhr'),
(5, '22 - 23 Uhr'),
(6, '23 - 00 Uhr'),
(7, '00 - 01 Uhr'),
(8, '02 - 03 Uhr'),
(9, '03 - 04 Uhr'),
(10, '04 - 05 Uhr'),
(11, '05 - 06 Uhr'),
(12, '06 - 07 Uhr'),
(13, '07 - 08 Uhr'),
(14, '08 - 09 Uhr'),
(15, '09 - 10 Uhr'),
(16, '10 - 11 Uhr'),
(17, '11 - 12 Uhr'),
(18, '12 - 13 Uhr'),
(19, '13 - 14 Uhr'),
(20, '14 - 15 Uhr'),
(21, '15 - 16 Uhr'),
(22, '16 - 17 Uhr'),
(23, '17 - 18 Uhr');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `overview`
--
ALTER TABLE `overview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `time_id` (`times`);

--
-- Indizes für die Tabelle `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `overview`
--
ALTER TABLE `overview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `overview`
--
ALTER TABLE `overview`
  ADD CONSTRAINT `overview_ibfk_1` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  ADD CONSTRAINT `overview_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
