-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mai 2015 la 05:24
-- Versiune server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tema2_`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`ID` int(11) NOT NULL,
  `FROM` int(11) NOT NULL,
  `TO` int(11) NOT NULL,
  `TEXT` varchar(400) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `chat`
--

INSERT INTO `chat` (`ID`, `FROM`, `TO`, `TEXT`, `Status`) VALUES
(4, 1, 3, 'test', 1),
(5, 1, 3, 'alt', 1),
(6, 3, 1, 'test', 1),
(7, 3, 1, 'test', 1),
(8, 1, 3, 'hey', 1),
(9, 3, 1, 'hey', 1),
(10, 1, 3, 'TEST', 1),
(11, 3, 1, 'TEST', 1),
(12, 1, 3, 'test', 1),
(13, 3, 1, 'test', 1),
(14, 1, 3, 'test', 1),
(15, 1, 3, 'test', 1),
(16, 1, 3, 'bau', 1),
(17, 3, 1, 'test', 1),
(18, 1, 3, 'test', 1),
(19, 3, 1, ' ? ', 1),
(20, 1, 3, 'ce faci ? ', 1),
(21, 1, 3, 'bina', 1),
(22, 3, 1, 'bau', 1),
(23, 1, 3, 'bau', 1),
(24, 4, 1, 'hey', 1),
(25, 1, 3, 'buna', 0),
(26, 4, 1, 'hey', 1),
(27, 4, 1, 'vb cu mine', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
`ID` int(11) NOT NULL,
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `friends`
--

INSERT INTO `friends` (`ID`, `User1`, `User2`, `GroupId`, `Status`) VALUES
(1, 1, 3, 1, 1),
(2, 1, 4, 1, 1),
(3, 1, 5, 1, 1),
(4, 5, 3, 1, 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`ID` int(11) NOT NULL,
  `Nume` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `groups`
--

INSERT INTO `groups` (`ID`, `Nume`) VALUES
(1, 'Familie'),
(2, 'Prieteni'),
(3, 'Rude'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `useri`
--

CREATE TABLE IF NOT EXISTS `useri` (
`ID` int(11) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Parola` varchar(120) NOT NULL,
  `Status` int(11) NOT NULL,
  `Photo_Profil` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `useri`
--

INSERT INTO `useri` (`ID`, `Username`, `Email`, `Parola`, `Status`, `Photo_Profil`) VALUES
(1, 'Alberto234', 'alberto@yahoo.com', '1234', 1, 'http://localhost/Tema_2_M/Imagini/Alberto234/admin.png'),
(3, 'Bogdan', 'bogdan@yahoo.com', '1234', 1, '""'),
(4, 'Bogdan2', 'bogdan2@yahoo.com', '1234', 1, '""'),
(5, 'Bogdan3', 'bogdan3@yahoo.com', '1234', 2, 'http://localhost/Tema_2_M/Imagini/Bogdan3/admin.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`ID`), ADD KEY `FROM` (`FROM`,`TO`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`ID`), ADD KEY `User1` (`User1`,`User2`,`GroupId`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`ID`), ADD KEY `Nume` (`Nume`);

--
-- Indexes for table `useri`
--
ALTER TABLE `useri`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `useri`
--
ALTER TABLE `useri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
