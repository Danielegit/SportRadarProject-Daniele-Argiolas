-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 25, 2019 alle 18:52
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportrad`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `matches`
--

CREATE TABLE `matches` (
  `id` int(20) UNSIGNED NOT NULL,
  `team_one` varchar(45) DEFAULT NULL,
  `team_two` varchar(45) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `_SPORT` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `matches`
--

INSERT INTO `matches` (`id`, `team_one`, `team_two`, `event_date`, `_SPORT`) VALUES
(20, 'NY Yankees', 'Chicago Club', '2019-11-20 12:00:00', 6),
(21, 'Lakers ', 'Atlanta Hawks', '2019-11-25 20:00:00', 3),
(22, 'Philadelphia ', 'Boston Bruins', '2019-11-25 17:00:00', 2),
(23, 'Wallabies', 'Vienna', '2019-11-25 11:11:00', 5),
(25, 'Liverpool', 'Barcelona', '2019-11-22 12:22:00', 1),
(26, 'Milan', 'Rapid', '2019-11-26 10:30:00', 1),
(27, 'Nebraska', 'South Korea ', '2019-11-27 12:34:00', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `scores`
--

CREATE TABLE `scores` (
  `sc_id` int(20) UNSIGNED NOT NULL,
  `score_one` int(20) DEFAULT NULL,
  `score_two` int(20) DEFAULT NULL,
  `_MATCH` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `scores`
--

INSERT INTO `scores` (`sc_id`, `score_one`, `score_two`, `_MATCH`) VALUES
(13, 15, 4, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `sports`
--

CREATE TABLE `sports` (
  `cat_id` int(20) UNSIGNED NOT NULL,
  `sport_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `sports`
--

INSERT INTO `sports` (`cat_id`, `sport_type`) VALUES
(1, 'Football'),
(2, 'Ice Hockey'),
(3, 'Basketball'),
(4, 'Volleyball'),
(5, 'Rugby'),
(6, 'Baseball');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_SPORT` (`_SPORT`);

--
-- Indici per le tabelle `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `_MATCH` (`_MATCH`);

--
-- Indici per le tabelle `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `scores`
--
ALTER TABLE `scores`
  MODIFY `sc_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `sports`
--
ALTER TABLE `sports`
  MODIFY `cat_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`_SPORT`) REFERENCES `sports` (`cat_id`);

--
-- Limiti per la tabella `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`_MATCH`) REFERENCES `matches` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
