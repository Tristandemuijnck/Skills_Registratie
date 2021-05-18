-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 mei 2021 om 14:15
-- Serverversie: 10.4.13-MariaDB
-- PHP-versie: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_winkel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abouts`
--

CREATE TABLE `abouts` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `abouts`
--

INSERT INTO `abouts` (`ID`, `title`, `subtitle`, `description`, `links`) VALUES
(4, 'ICT Beheer', 'Bla ICT', 'ICT-beheer is de discipline waarbij alle IT-middelen van een bedrijf worden beheerd in overeenstemming met zijn behoeften en prioriteiten.', ''),
(6, 'Cyber-security', 'Iets met veiligheid', 'Cyber security Cybersecurity is het beschermen van computers, servers, mobiele apparaten, elektronische systemen, netwerken en gegevens tegen schadelijke aanvallen.', ''),
(7, 'Applicatie Ontwikkeling', 'Het ontwikkelen van applicaties', 'Applicatieontwikkeling is het proces waarlangs organisaties programmatuur bouwen om hun bedrijfsprocessen te ondersteunen.', ''),
(8, 'Een frisse start!', '', 'Het team van ROCvA hebben besloten om in samenwerking met hun ICT leerlingen een bedrijf te gaan starten waarbij IT services geleverd kunnen worden onder andere:  Lees verder', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `emailadres` varchar(50) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`admin_ID`, `naam`, `achternaam`, `emailadres`, `wachtwoord`, `date`) VALUES
(3, 'Siem', 'Postmus', 'siempostmus@ziggo.nl', '$2y$10$n.SQJ3C8cFiie7vIakn/qOM3X0yqtpA8lReXXK9cWowZDLsybQzKq', '2021-01-12 23:00:00'),
(4, 'Aras', 'Vahidnia', 'arasvah23@outlook.com', '$2y$10$KR9kVn.Faa8CJLEgLL6lWOcP5fC.tE62fga7laqavD/W2EeQjPfU6', '2021-01-12 23:00:00'),
(5, 'SJonnie', 'Pietersen', 'alien@alien.nl', '$2y$10$0Zdwna2E1bKs.EEMioW.YeRLS7iBLfBkjHSv.EOGAMBdmO9T0cd7a', '2021-01-12 23:00:00'),
(6, 'Vincenzo', 'van WIjk', 'Vincenzovanwijk12@gmail.com', '$2y$10$HE8xC.odW74e2dUvJ7fpperZavndJgXqDawk3czgq8OHrSUyK1n/u', '2021-01-13 23:00:00'),
(7, 'test', 'test', 'test@test.nl', '$2y$10$0VRrpE/jvRWejiSMRLcsjehFI/97i/VLIrUykFWoOD4MhLP4Nx3u2', '2021-03-29 23:51:52');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afhandeling`
--

CREATE TABLE `afhandeling` (
  `ticket_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `status` enum('bezig','opgelost','doorgezet','') NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bd_vacature`
--

CREATE TABLE `bd_vacature` (
  `bedrijf_ID` int(11) NOT NULL,
  `bedrijfsnaam` varchar(50) NOT NULL,
  `omschrijving` varchar(200) NOT NULL,
  `vacature` varchar(30) NOT NULL,
  `stageplek` varchar(10) NOT NULL,
  `startdatum` varchar(20) NOT NULL,
  `functieomschrijving` varchar(200) NOT NULL,
  `status` enum('bezig','geaccepteerd','geweigerd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bd_vacature`
--

INSERT INTO `bd_vacature` (`bedrijf_ID`, `bedrijfsnaam`, `omschrijving`, `vacature`, `stageplek`, `startdatum`, `functieomschrijving`, `status`) VALUES
(0, 'HJAK', 'dddfdf', 'ICT-Beheer', 'ja', '1990-10-10', 'dfdfdfdf', 'geaccepteerd'),
(1, 'henk', 'tetst', 'Applicatie ontwikkeling', 'ja', '2021-03-29', 'test', 'geaccepteerd'),
(6, 'hajaaaak', 'Voor ict-beheerdrs', 'Applicatie ontwikkeling', 'ja', '2021-10-10', 'het opzetten van een website', 'geaccepteerd'),
(8, 'henk', 'test', 'Applicatie ontwikkeling', 'ja', '2021-03-30', 'test', ''),
(9, 'henk', 'test', 'Applicatie ontwikkeling', 'nee', '2021-03-17', 'test', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedrijf`
--

CREATE TABLE `bedrijf` (
  `bedrijf_ID` int(11) NOT NULL,
  `bedrijfsnaam` varchar(256) NOT NULL,
  `kvk_nummer` int(255) NOT NULL,
  `btw_nummer` varchar(20) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `emailadres` varchar(256) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `telefoonnummer` int(15) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `postcode` varchar(256) NOT NULL,
  `rechtsvorm` varchar(50) NOT NULL,
  `huisnummer` varchar(10) NOT NULL,
  `plaats` varchar(50) NOT NULL,
  `land` varchar(50) NOT NULL,
  `datum_oprichting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bedrijf`
--

INSERT INTO `bedrijf` (`bedrijf_ID`, `bedrijfsnaam`, `kvk_nummer`, `btw_nummer`, `naam`, `emailadres`, `wachtwoord`, `telefoonnummer`, `adres`, `postcode`, `rechtsvorm`, `huisnummer`, `plaats`, `land`, `datum_oprichting`) VALUES
(2, 'henk', 123456, '21', 'Siem', 'siemp2003@gmail.com', '$2y$10$6EHlp67wR7ya615DXrsS2uETg0qjMVTvugyovhqw2mr', 2147483647, 'Casperfagel Straat', '1215GN', 'ZZP', '17', 'Hilversum', 'Nederland', '2021-04-02');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `categorie_ID` int(11) NOT NULL,
  `inhoud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chat_geschiedenis`
--

CREATE TABLE `chat_geschiedenis` (
  `chat_ID` int(11) NOT NULL,
  `inhoud` longtext NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactpersoon`
--

CREATE TABLE `contactpersoon` (
  `contactpersoon_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `overheid_ID` int(5) NOT NULL,
  `bedrijf_ID` int(11) NOT NULL,
  `functie` varchar(50) NOT NULL,
  `afdeling` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `categoryid` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `faq`
--

INSERT INTO `faq` (`id`, `categoryid`, `question`, `answer`) VALUES
(1, 'optie 2', 'vraag 2 ', 'antwoord 2 '),
(2, 'Algemeen', 'vraag 1', 'antwoord 1'),
(3, 'optie 3', 'Vraag 3', 'Antwoord 3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ikwil`
--

CREATE TABLE `ikwil` (
  `ikwil_id` int(10) NOT NULL,
  `naam` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `beschrijving` mediumtext NOT NULL,
  `optie` varchar(55) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ikwil`
--

INSERT INTO `ikwil` (`ikwil_id`, `naam`, `email`, `beschrijving`, `optie`, `datum`) VALUES
(1, '', '', 'r', 'vraag', '2021-01-24 23:00:00'),
(2, '', '', 'da', 'suggestie', '2021-03-29 23:28:41'),
(3, '', '', '', 'suggestie', '2021-04-05 19:31:16'),
(4, '', '', '', 'suggestie', '2021-04-05 19:41:47');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerker_ID` int(5) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`medewerker_ID`, `naam`, `tussenvoegsel`, `achternaam`, `email`, `wachtwoord`, `datum`) VALUES
(5, 'Siem', '', 'Pietersen', 'siempostmus@ziggo.nl', '$2y$10$23GcqDw///TyfrCporr2teLy/8NbhcKBDNgOk2FRXivYjOt4sS1ue', '2021-03-30 00:08:41');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overheid`
--

CREATE TABLE `overheid` (
  `overheid_ID` int(11) NOT NULL,
  `contactpersoon_ID` int(11) NOT NULL,
  `soort_overheid` varchar(256) NOT NULL,
  `kvk_nummer` int(11) NOT NULL,
  `btw_nummer` int(11) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `emailadres` varchar(256) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `huisnummer` varchar(20) NOT NULL,
  `plaats` varchar(50) NOT NULL,
  `land` varchar(50) NOT NULL,
  `datum_oprichting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `particulier`
--

CREATE TABLE `particulier` (
  `user_ID` int(11) NOT NULL,
  `geslacht` varchar(4) NOT NULL,
  `titel` varchar(25) NOT NULL,
  `geboortedatum` date NOT NULL,
  `naam` varchar(256) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(256) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `leerlingnummer` int(11) NOT NULL,
  `huisnummer` varchar(10) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `plaats` varchar(30) NOT NULL,
  `land` varchar(50) NOT NULL,
  `telefoonnummer` int(10) NOT NULL,
  `mobielnummer` int(15) NOT NULL,
  `emailadres` varchar(256) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `particulier`
--

INSERT INTO `particulier` (`user_ID`, `geslacht`, `titel`, `geboortedatum`, `naam`, `tussenvoegsel`, `achternaam`, `adres`, `leerlingnummer`, `huisnummer`, `postcode`, `plaats`, `land`, `telefoonnummer`, `mobielnummer`, `emailadres`, `wachtwoord`) VALUES
(2, 'Man', 'admin', '2003-04-18', 'Siem', '', 'Postmus', 'Casperfagel Straat', 0, '17', '1215GN', 'Hilversum', 'Netherlands', 6, 6, 'siempostmus@ziggo.nl', '$2y$10$IlrcvGZOh.eO.ls8fg2/VOuvHPCrzqNG20z8/SSNOfLWYTPdVkRd6'),
(3, 'Man', 'admin', '2002-05-04', 'Vincenzo', 'van', 'Wijk', 'Frederikhendrikstraat', 123456789, '1052HX', '62h', 'Amsterdam', 'Nederland', 644167052, 612345678, 'Vincenzovanwijk12@gmail.com', '$2y$10$3gZHeX8BRmI5hXwAgON1gOSi3sul7TPXsj56Z71qNSyczL8Sz9V.K'),
(4, 'a', 'particulier', '0001-01-01', 'a', 'a', 'a', 'a', 1, '1', 'a', '1', 'a', 1, 1, '1@1.com', '$2y$10$9A.daHpqkmtKjTa8mCnILekhxqpR1eNy8lmOhp19IJXnE2Of0iYKW'),
(5, 'man', 'particulier', '2002-05-05', 'Vin', 'Vin', 'Vin', 'man m,', 12, '1010ab', 'mna ', '', 'man ', 12, 12, '13@13.com', '$2y$10$mUURJzWP/4SA0lHcR4Nusu4E5tsbpdhXV0m.HrytokqbWqiJZEnTS'),
(6, 'Admi', 'admin', '2020-12-01', 'adsas', 'a', 'nicht', 'Dirk Sonoystraat, 75', 17, '1067XX', 'Amster', '123', 'Netherlands', 612345678, 231798745, 'isma1@live.nl', '$2y$10$78iOAnow/1eqLTXyocYCyefPfiIOtvIh.ywKesfrg9opTlj4Fv9V2'),
(9, 'Man', 'particulier', '2002-10-27', 'Mohammed', 'el', 'Malki', 'Dr. H. Colijnstraat, 175', 135, '1067CE', 'Amster', '56789', 'Nederland', 645221345, 645221445, 'elmalki1958888@outlook.com', '$2y$10$BxcU/CE5eSJX/w7jyJgxeuhMHa6wmAjV8Q2e8WfM9aPOCVtMWxBtC'),
(11, 'Man', 'particulier', '2002-10-27', 'Mohammed', 'e', 'Malki', 'Dr. H. Colijnstraat, 175', 123, '1067CE', 'Amster', '146', 'Nederland', 645221345, 645221445, 'elmalki1959@outlook.com', '$2y$10$Y8xvA2FF55Cmu2YsM.zmxeghx6nlItZ50a.zlRlnLuyEs1obZYRu2'),
(12, 'Man', 'particulier', '2002-10-27', 'ISSYY', 'el', 'Malki', 'DhfRfhf.H.cfgolijnsgtragfgatttttt', 123, '193DCE', 'Amster', '146', 'Nederland', 645221345, 645221445, 'elmalki2002@gmail.com', '$2y$10$kDqbE423zHYgKZdjx14ZRuy11oQKHu2jcVtfQZgos/pe076FWsv4O'),
(13, 'Man', 'particulier', '2002-10-27', 'Dario', 'rtrt', 'rt', 'Dr. H. Colijnstraat, 175', 123, '1067 CE', 'Amster', '12', 'Nederland', 645221345, 645221445, 'dario123@outlook.com', '$2y$10$3fP6ei6EB1ILmn7yMs3ozu0olRaDTxZYMCKpl6f.F0sh2.uGM5tR.'),
(14, 'man', 'admin', '1991-04-14', 'a', 'a', 'a', 'ergens', 50, '1111kc', 'waar', '1', 'daar', 206958495, 613938845, 'a@a.nl', '$2y$10$PGciQGgGCX72RIhlbJGRm.UZB1TtBotq2R.zGN/h1kyhDLwIhk/Gu'),
(15, 'Man', 'particulier', '2003-04-18', 'Siem', '', 'Postmus', 'Casper Fagelstraat', 17, '1215GN', 'Hilversum', '2109405', 'Netherlands', 6, 6, 'siempostmus@hotmail.nl', '$2y$10$QcHT2rM3p6r8RfyDMO2W8uSNC.Eg/ZrOcuIeTDtTAutbloRcD684G'),
(16, 'Man', 'particulier', '2003-04-18', 'Siem', 'bla', 'henkie', 'Casperfagel Straat', 17, '1215GN', 'Hilversum', '2109405', 'Nederland', 6, 6, 'siemp2003@gmail.com', '$2y$10$/zGRaUrOFFN2Ln0GOOrPnO35bmyLsZyf0Z1Nz./fFUVybtscRwH2.'),
(17, 'man', 'particulier', '2000-01-01', 'kanes', 'k', 'kanes', 'aras', 20, '1111kv', 'daar', '13', 'neder', 202020202, 611112233, 'aras91@hotmail.com', '$2y$10$2jaSdhcX1Q3V911lq.IhW.HpFbH.OZfgTi8oXXNkvnajIxxpS8tuK');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `skills`
--

CREATE TABLE `skills` (
  `skills_id` int(100) NOT NULL,
  `skills_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `skills`
--

INSERT INTO `skills` (`skills_id`, `skills_name`) VALUES
(1, 'Java'),
(2, 'Php'),
(4, 'JavaScript');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `skills_med`
--

CREATE TABLE `skills_med` (
  `skills_reg_id` int(11) NOT NULL,
  `medewerker_ID` int(5) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `skill` varchar(60) NOT NULL,
  `niveau` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `skills_med`
--

INSERT INTO `skills_med` (`skills_reg_id`, `medewerker_ID`, `naam`, `skill`, `niveau`) VALUES
(9, 5, 'Siem', 'Java', 1),
(10, 5, 'Siem', 'Php', 3),
(11, 5, 'Siem', 'JavaScript', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sollicitatie`
--

CREATE TABLE `sollicitatie` (
  `user_ID` int(11) NOT NULL,
  `stage_ID` int(11) DEFAULT NULL,
  `bedrijf_ID` int(11) DEFAULT NULL,
  `vacature` varchar(400) NOT NULL,
  `status` enum('bezig','geaccepteerd','geweigerd') NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `cv` varchar(255) NOT NULL,
  `motivatiebrief` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sollicitatie`
--

INSERT INTO `sollicitatie` (`user_ID`, `stage_ID`, `bedrijf_ID`, `vacature`, `status`, `datum`, `cv`, `motivatiebrief`) VALUES
(2, NULL, NULL, 'Cyber Security', 'geaccepteerd', '2021-03-29 22:21:45', 'Technisch Ontwerp - SA.docx', 'Systeem analyse APP.docx');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stageplek`
--

CREATE TABLE `stageplek` (
  `stage_ID` int(11) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `adres` varchar(256) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `telefoonnummer` int(15) NOT NULL,
  `emailadres` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ticket`
--

CREATE TABLE `ticket` (
  `ticket_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `melder_ID` int(11) NOT NULL,
  `chat_ID` int(11) NOT NULL,
  `prioriteit` varchar(10) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `uitleg` longtext NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacature`
--

CREATE TABLE `vacature` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `vacature`
--

INSERT INTO `vacature` (`ID`, `title`, `subtitle`, `description`, `links`) VALUES
(4, 'ICT Beheerder', 'Bla ICTa', 'ICT-beheer is de discipline waarbij alle IT-middelen van een bedrijf worden beheerd in overeenstemming met zijn behoeften en prioriteiten.', ''),
(6, 'Cyber-security', 'Iets met veiligheid', 'Cybersecurity is het beschermen van computers, servers, mobiele apparaten, elektronische systemen, netwerken en gegevens tegen schadelijke aanvallen.', ''),
(11, 'Codeerderderder', 'APO 26666', 'T.E.O.T.W', ''),
(12, 'Applicatie Ontwikkelaar', 'Bouwen van applicaties', 'Applicatieontwikkeling is het proces waarlangs organisaties programmatuur bouwen om hun bedrijfsprocessen te ondersteunen.', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexen voor tabel `afhandeling`
--
ALTER TABLE `afhandeling`
  ADD UNIQUE KEY `medewerker_ID` (`user_ID`),
  ADD UNIQUE KEY `ticket_ID` (`ticket_ID`);

--
-- Indexen voor tabel `bd_vacature`
--
ALTER TABLE `bd_vacature`
  ADD UNIQUE KEY `bedrijf_ID` (`bedrijf_ID`);

--
-- Indexen voor tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  ADD PRIMARY KEY (`bedrijf_ID`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_ID`);

--
-- Indexen voor tabel `chat_geschiedenis`
--
ALTER TABLE `chat_geschiedenis`
  ADD PRIMARY KEY (`chat_ID`);

--
-- Indexen voor tabel `contactpersoon`
--
ALTER TABLE `contactpersoon`
  ADD PRIMARY KEY (`contactpersoon_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`),
  ADD UNIQUE KEY `overheid_ID` (`overheid_ID`),
  ADD UNIQUE KEY `bedrijf_ID` (`bedrijf_ID`);

--
-- Indexen voor tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `ikwil`
--
ALTER TABLE `ikwil`
  ADD PRIMARY KEY (`ikwil_id`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerker_ID`);

--
-- Indexen voor tabel `overheid`
--
ALTER TABLE `overheid`
  ADD PRIMARY KEY (`overheid_ID`),
  ADD UNIQUE KEY `contactpersoon_ID` (`contactpersoon_ID`);

--
-- Indexen voor tabel `particulier`
--
ALTER TABLE `particulier`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexen voor tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skills_id`);

--
-- Indexen voor tabel `skills_med`
--
ALTER TABLE `skills_med`
  ADD PRIMARY KEY (`skills_reg_id`),
  ADD KEY `medewerker_ID` (`medewerker_ID`),
  ADD KEY `skill` (`skill`);

--
-- Indexen voor tabel `sollicitatie`
--
ALTER TABLE `sollicitatie`
  ADD UNIQUE KEY `user_ID` (`user_ID`),
  ADD UNIQUE KEY `stage_ID` (`stage_ID`,`bedrijf_ID`);

--
-- Indexen voor tabel `stageplek`
--
ALTER TABLE `stageplek`
  ADD PRIMARY KEY (`stage_ID`);

--
-- Indexen voor tabel `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`),
  ADD UNIQUE KEY `chat_ID` (`chat_ID`);

--
-- Indexen voor tabel `vacature`
--
ALTER TABLE `vacature`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `bedrijf`
--
ALTER TABLE `bedrijf`
  MODIFY `bedrijf_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorie_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `chat_geschiedenis`
--
ALTER TABLE `chat_geschiedenis`
  MODIFY `chat_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `contactpersoon`
--
ALTER TABLE `contactpersoon`
  MODIFY `contactpersoon_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `ikwil`
--
ALTER TABLE `ikwil`
  MODIFY `ikwil_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerker_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `overheid`
--
ALTER TABLE `overheid`
  MODIFY `overheid_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `particulier`
--
ALTER TABLE `particulier`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `skills_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `skills_med`
--
ALTER TABLE `skills_med`
  MODIFY `skills_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `stageplek`
--
ALTER TABLE `stageplek`
  MODIFY `stage_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `vacature`
--
ALTER TABLE `vacature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afhandeling`
--
ALTER TABLE `afhandeling`
  ADD CONSTRAINT `afhandeling_ibfk_1` FOREIGN KEY (`ticket_ID`) REFERENCES `ticket` (`ticket_ID`);

--
-- Beperkingen voor tabel `chat_geschiedenis`
--
ALTER TABLE `chat_geschiedenis`
  ADD CONSTRAINT `chat_geschiedenis_ibfk_1` FOREIGN KEY (`chat_ID`) REFERENCES `ticket` (`chat_ID`);

--
-- Beperkingen voor tabel `overheid`
--
ALTER TABLE `overheid`
  ADD CONSTRAINT `overheid_ibfk_1` FOREIGN KEY (`contactpersoon_ID`) REFERENCES `contactpersoon` (`contactpersoon_ID`),
  ADD CONSTRAINT `overheid_ibfk_2` FOREIGN KEY (`overheid_ID`) REFERENCES `contactpersoon` (`overheid_ID`);

--
-- Beperkingen voor tabel `skills_med`
--
ALTER TABLE `skills_med`
  ADD CONSTRAINT `skills_med_ibfk_1` FOREIGN KEY (`medewerker_ID`) REFERENCES `medewerker` (`medewerker_ID`);

--
-- Beperkingen voor tabel `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `particulier` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
