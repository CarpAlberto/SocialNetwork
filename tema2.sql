-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mai 2015 la 06:43
-- Versiune server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tema2`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comentarii`
--

CREATE TABLE IF NOT EXISTS `comentarii` (
`ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Update` int(11) NOT NULL,
  `Data` int(11) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conferinta`
--

CREATE TABLE IF NOT EXISTS `conferinta` (
`ID` int(11) NOT NULL,
  `Nume_Conferinta` varchar(50) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ID_Creator` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conferinta`
--

INSERT INTO `conferinta` (`ID`, `Nume_Conferinta`, `Data`, `ID_Creator`) VALUES
(31, 'undefined', '2015-05-05 19:05:03', 14),
(32, '14', '2015-05-05 19:14:43', 14),
(33, '14', '2015-05-05 19:31:12', 14),
(34, '14', '2015-05-05 19:33:10', 14),
(35, '14', '2015-05-05 19:34:18', 14),
(36, '14', '2015-05-05 19:39:08', 14),
(37, '14', '2015-05-10 20:10:17', 14),
(38, '14', '2015-05-10 20:10:32', 14),
(39, '14', '2015-05-10 20:11:12', 14),
(40, '14', '2015-05-10 20:11:13', 14),
(41, 'Mihai Alina', '2015-05-10 20:24:58', 15),
(42, '15', '2015-05-10 20:30:11', 15),
(43, '15', '2015-05-10 20:35:20', 15),
(44, '15', '2015-05-10 20:37:42', 15),
(45, 'Matei Ioana', '2015-05-10 23:16:59', 14),
(46, 'Matei Ioana', '2015-05-11 01:21:45', 14),
(47, '14', '2015-05-11 10:29:25', 14),
(48, '14', '2015-05-11 10:41:42', 14);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conferinta_users`
--

CREATE TABLE IF NOT EXISTS `conferinta_users` (
`ID` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_conferinta` int(11) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conferinta_users`
--

INSERT INTO `conferinta_users` (`ID`, `id_users`, `id_conferinta`, `Data`) VALUES
(18, 15, 35, '2015-05-05 19:34:29'),
(19, 16, 35, '2015-05-05 19:34:34'),
(22, 15, 37, '2015-05-10 20:10:22'),
(29, 15, 41, '2015-05-10 20:24:58'),
(30, 18, 41, '2015-05-10 20:24:58'),
(31, 15, 41, '2015-05-10 20:24:58'),
(36, 15, 43, '2015-05-10 20:35:22'),
(37, 18, 43, '2015-05-10 20:35:27'),
(40, 19, 44, '2015-05-10 20:37:47'),
(41, 18, 45, '2015-05-10 23:16:59'),
(42, 15, 45, '2015-05-10 23:16:59'),
(43, 14, 45, '2015-05-10 23:16:59'),
(44, 16, 46, '2015-05-11 01:21:45'),
(45, 15, 46, '2015-05-11 01:21:45'),
(46, 14, 46, '2015-05-11 01:21:45'),
(49, 15, 47, '2015-05-11 10:30:01');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conf_messages`
--

CREATE TABLE IF NOT EXISTS `conf_messages` (
`ID` int(11) NOT NULL,
  `ID_Conf` int(11) NOT NULL,
  `Text` text NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conf_messages`
--

INSERT INTO `conf_messages` (`ID`, `ID_Conf`, `Text`, `User`) VALUES
(1, 45, 'ana', 15),
(2, 45, 'bla', 15);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conversatie`
--

CREATE TABLE IF NOT EXISTS `conversatie` (
`ID` int(11) NOT NULL,
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conversatie`
--

INSERT INTO `conversatie` (`ID`, `User1`, `User2`, `Data`) VALUES
(2, 14, 15, '2015-04-09 01:40:33'),
(3, 16, 14, '2015-04-10 19:43:44'),
(5, 14, 17, '2015-04-11 02:48:54'),
(7, 14, 18, '2015-04-16 01:51:10'),
(8, 16, 29, '2015-05-02 15:12:50'),
(9, 14, 19, '2015-05-10 13:42:14'),
(10, 15, 18, '2015-05-10 16:51:40'),
(15, 14, 29, '2015-05-10 21:57:17'),
(31, 16, 15, '2015-05-11 11:58:56');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conversatie_reply`
--

CREATE TABLE IF NOT EXISTS `conversatie_reply` (
`ID` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` tinyint(1) NOT NULL,
  `ID_Conversatie` int(11) NOT NULL,
  `Sender` int(11) NOT NULL,
  `Media` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conversatie_reply`
--

INSERT INTO `conversatie_reply` (`ID`, `Message`, `Time`, `Status`, `ID_Conversatie`, `Sender`, `Media`) VALUES
(188, 'hey', '2015-05-10 17:55:19', 1, 2, 15, 'null'),
(189, 'hey', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(190, 'ce faci', '2015-05-10 17:55:19', 1, 2, 15, 'null'),
(191, 'hey', '2015-05-10 17:55:19', 1, 2, 15, 'null'),
(192, 'hey', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(193, 'lllll', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(194, 'bazaie', '2015-05-10 17:55:20', 1, 2, 15, 'null'),
(195, 'aaaa', '2015-05-10 17:55:20', 1, 2, 15, 'null'),
(196, 'aaaaaaaaaaa', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(197, 'ttttt', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(198, ' gggg', '2015-05-10 17:55:20', 1, 2, 15, 'null'),
(199, 'aaa', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(200, 'hand up', '2015-05-10 18:05:26', 1, 2, 14, 'null'),
(201, 'every day', '2015-05-10 17:58:28', 1, 10, 15, 'null'),
(202, 'fire', '2015-05-10 18:06:02', 1, 2, 15, 'null'),
(203, ' comeone', '2015-05-10 18:06:07', 1, 2, 14, 'null'),
(204, 'heu alina', '2015-05-10 19:08:18', 1, 10, 15, 'null'),
(205, ' hey', '2015-05-10 19:09:06', 1, 7, 18, 'null'),
(206, 'plm', '2015-05-10 19:09:10', 1, 7, 14, 'null'),
(207, 'mamam', '2015-05-10 19:09:31', 1, 10, 18, 'null'),
(208, 'test', '2015-05-10 19:09:51', 1, 10, 18, 'null'),
(209, 'conf', '2015-05-10 19:10:18', 1, 7, 18, 'null'),
(210, 'msg Alina', '2015-05-10 19:10:27', 1, 10, 15, 'null'),
(211, 'hey', '2015-05-10 19:10:31', 1, 7, 18, 'null'),
(212, 'test', '2015-05-10 19:10:38', 1, 7, 14, 'null'),
(213, 'fisier', '2015-05-10 19:14:56', 1, 10, 15, 'Laborator IX.7z'),
(214, 'hey', '2015-05-10 19:43:05', 1, 7, 14, 'null'),
(215, 'morti matii', '2015-05-10 19:43:26', 1, 7, 18, 'null'),
(216, 'nu vrei', '2015-05-10 19:43:40', 1, 7, 18, 'null'),
(217, 'text', '2015-05-10 19:44:02', 1, 7, 18, 'null'),
(218, 'opopopo', '2015-05-10 19:44:51', 1, 7, 18, '1427686363_device_camera_capture_photo_-128.png'),
(219, 'bla', '2015-05-10 19:54:10', 1, 7, 14, 'null'),
(220, 'null', '2015-05-10 19:56:14', 1, 2, 15, 'document.docx'),
(221, 'hey', '2015-05-10 20:04:26', 1, 7, 14, 'null'),
(222, 'TEST', '2015-05-10 20:08:33', 1, 2, 14, 'null'),
(223, 'null', '2015-05-10 20:08:47', 1, 2, 14, 'manactiv.pptx'),
(224, ' HEY', '2015-05-10 20:09:49', 1, 2, 14, 'null'),
(225, 'merge', '2015-05-10 20:09:59', 1, 2, 15, 'null'),
(226, 'popo', '2015-05-10 21:57:17', 0, 15, 14, 'null'),
(227, 'hey', '2015-05-11 11:49:54', 1, 3, 14, 'null'),
(228, 'hey', '2015-05-10 22:07:42', 0, 10, 15, 'null'),
(229, 'hey', '2015-05-10 22:07:55', 1, 2, 15, 'null'),
(230, 'uu', '2015-05-10 22:08:07', 1, 2, 15, 'null'),
(231, 'mama', '2015-05-10 22:08:23', 1, 2, 14, 'null'),
(232, 'da stiu', '2015-05-10 22:08:34', 1, 2, 15, 'null'),
(233, 'hey', '2015-05-10 22:37:22', 1, 2, 14, 'null'),
(234, 'buna', '2015-05-10 22:37:35', 1, 2, 15, 'null'),
(235, 'test aditional', '2015-05-10 22:38:27', 1, 2, 14, 'document.docx'),
(236, 'null', '2015-05-10 22:39:57', 1, 2, 15, 'tema2_.sql'),
(237, 'hey', '2015-05-10 22:46:15', 1, 2, 14, 'null'),
(238, 'only', '2015-05-10 22:46:44', 1, 2, 15, 'null'),
(239, 's', '2015-05-10 22:46:59', 1, 2, 14, 'null'),
(240, 'da', '2015-05-10 22:47:57', 1, 2, 14, 'null'),
(241, 'da', '2015-05-10 22:48:14', 1, 2, 14, 'null'),
(242, 'hey', '2015-05-10 22:49:30', 1, 2, 14, 'null'),
(243, 'soooo', '2015-05-10 22:49:37', 1, 2, 14, 'null'),
(244, 'eee', '2015-05-10 22:50:24', 1, 2, 14, 'null'),
(245, 'da', '2015-05-10 22:50:32', 1, 2, 15, 'null'),
(246, 'hey', '2015-05-10 22:53:33', 1, 2, 14, 'null'),
(247, 'somewhere only we know', '2015-05-10 22:54:31', 1, 2, 15, 'null'),
(248, 'tesy', '2015-05-10 22:56:04', 1, 2, 14, 'null'),
(249, 'here', '2015-05-10 22:56:20', 1, 2, 15, 'null'),
(250, 'hhh', '2015-05-10 22:56:56', 1, 2, 14, 'null'),
(251, 'jjj', '2015-05-10 22:57:35', 1, 2, 15, 'null'),
(252, 'ooo', '2015-05-10 22:58:09', 1, 2, 15, 'null'),
(253, 'uuu', '2015-05-10 22:59:00', 1, 2, 15, 'null'),
(254, 'pppp', '2015-05-10 23:00:13', 1, 2, 15, 'null'),
(255, 'ppp', '2015-05-10 23:01:09', 1, 2, 15, 'null'),
(256, 'ce faci', '2015-05-10 23:02:27', 1, 2, 15, 'null'),
(257, ' binr', '2015-05-10 23:02:35', 1, 2, 15, 'null'),
(258, 'hhh', '2015-05-10 23:03:06', 1, 2, 14, 'null'),
(259, 'AAAA', '2015-05-10 23:04:58', 1, 2, 15, 'null'),
(260, 'AAA', '2015-05-10 23:05:08', 0, 10, 15, 'null'),
(261, ' AAA', '2015-05-10 23:05:23', 1, 2, 14, 'null'),
(262, ' OOOO', '2015-05-10 23:06:18', 1, 2, 14, 'null'),
(263, 'cata', '2015-05-10 23:06:48', 1, 2, 14, 'null'),
(264, 'naspa', '2015-05-10 23:06:56', 1, 2, 14, 'null'),
(265, 'neata', '2015-05-10 23:08:25', 1, 2, 15, 'null'),
(266, 'null', '2015-05-10 23:09:47', 1, 2, 15, 'mail_notification.png'),
(267, 'hey', '2015-05-11 09:03:27', 0, 7, 14, 'null'),
(268, 'HEY', '2015-05-11 09:05:34', 1, 2, 14, 'null'),
(270, 'CE FACI', '2015-05-11 09:05:53', 1, 2, 14, 'null'),
(271, 'CE', '2015-05-11 09:06:03', 1, 2, 14, 'null'),
(285, 'hey', '2015-05-11 09:18:05', 1, 2, 14, 'null'),
(287, 'buna', '2015-05-11 09:18:58', 1, 2, 15, 'null'),
(288, 'bla', '2015-05-11 09:19:44', 1, 2, 14, 'null'),
(289, 'cf', '2015-05-11 09:19:48', 1, 2, 15, 'null'),
(290, 'test', '2015-05-11 09:19:56', 1, 2, 14, 'null'),
(291, 'hey', '2015-05-11 09:20:09', 1, 2, 15, 'null'),
(292, 'buna', '2015-05-11 09:20:16', 1, 2, 14, 'null'),
(293, 'bla', '2015-05-11 09:21:20', 0, 10, 15, 'null'),
(294, 'bla', '2015-05-11 09:21:33', 1, 2, 15, 'null'),
(295, 'null', '2015-05-11 09:22:00', 1, 2, 14, 'null'),
(296, 'space', '2015-05-11 09:22:14', 1, 2, 14, 'null'),
(297, 'hey', '2015-05-11 09:24:26', 0, 10, 15, 'null'),
(298, 'hey', '2015-05-11 09:24:38', 1, 2, 15, 'null'),
(299, 'test', '2015-05-11 09:25:00', 1, 2, 14, 'null'),
(300, 'msg', '2015-05-11 09:25:41', 1, 2, 15, 'null'),
(301, 'hey', '2015-05-11 09:27:31', 1, 2, 15, 'null'),
(302, 'hey', '2015-05-11 09:27:47', 1, 2, 15, 'null'),
(303, 'doamne', '2015-05-11 09:28:05', 1, 2, 15, 'null'),
(304, 'eee', '2015-05-11 09:28:33', 1, 2, 14, 'null'),
(305, ' hey', '2015-05-11 09:30:12', 1, 2, 14, 'null'),
(306, 'bau', '2015-05-11 09:30:26', 1, 2, 14, 'null'),
(307, 'b', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(308, 'h', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(309, 'i', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(310, 'pp', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(311, 'm', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(312, 'test', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(313, 'plm', '2015-05-11 09:35:38', 1, 2, 14, 'null'),
(314, 'hey', '2015-05-11 09:35:58', 1, 2, 15, 'null'),
(315, 'test', '2015-05-11 09:36:12', 1, 2, 14, 'null'),
(316, 'hey', '2015-05-11 09:36:20', 1, 2, 15, 'null'),
(317, 'hey', '2015-05-11 09:36:33', 1, 2, 15, 'null'),
(318, 'hey', '2015-05-11 09:36:45', 1, 2, 14, 'null'),
(319, 'bla', '2015-05-11 09:36:59', 1, 2, 14, 'null'),
(320, 'test', '2015-05-11 09:38:17', 1, 2, 14, 'null'),
(321, 'test', '2015-05-11 09:38:28', 1, 2, 15, 'null'),
(322, 'hihi', '2015-05-11 09:38:43', 1, 2, 14, 'null'),
(323, 'plm', '2015-05-11 09:39:02', 1, 2, 14, 'null'),
(324, 'hihi', '2015-05-11 09:40:23', 1, 2, 15, 'null'),
(325, 'ma', '2015-05-11 09:40:44', 1, 2, 14, 'null'),
(326, 'plm', '2015-05-11 09:44:05', 1, 2, 14, 'null'),
(327, 'cacat', '2015-05-11 09:44:05', 1, 2, 14, 'null'),
(328, 'bau', '2015-05-11 09:44:47', 1, 2, 14, 'null'),
(329, 'na', '2015-05-11 09:44:59', 1, 2, 14, 'null'),
(330, 'test', '2015-05-11 09:45:12', 1, 2, 14, 'null'),
(331, 'heu', '2015-05-11 09:45:17', 1, 2, 14, 'null'),
(332, 'eeeee', '2015-05-11 09:45:35', 1, 2, 14, 'null'),
(333, 'hey', '2015-05-11 09:47:05', 1, 2, 14, 'null'),
(334, 'd', '2015-05-11 09:47:55', 1, 2, 14, 'null'),
(335, 'd', '2015-05-11 09:47:57', 1, 2, 14, 'null'),
(336, 'd', '2015-05-11 09:47:57', 1, 2, 14, 'null'),
(337, 'd', '2015-05-11 09:47:57', 1, 2, 14, 'null'),
(338, 'hey', '2015-05-11 09:49:07', 1, 2, 14, 'null'),
(339, 'hassy', '2015-05-11 09:49:12', 1, 2, 14, 'null'),
(340, 'ce faci', '2015-05-11 09:49:21', 1, 2, 15, 'null'),
(341, 'plm', '2015-05-11 09:49:29', 1, 2, 15, 'null'),
(342, 'stf', '2015-05-11 09:49:37', 1, 2, 14, 'null'),
(343, 'bla', '2015-05-11 10:21:04', 1, 2, 14, 'null'),
(344, 'bla bla', '2015-05-11 10:21:13', 1, 2, 14, 'null'),
(345, 'hey', '2015-05-11 10:21:51', 1, 2, 15, 'null'),
(346, 'ia-o', '2015-05-11 10:23:07', 1, 2, 14, 'document.docx'),
(347, ' as', '2015-05-11 10:36:41', 1, 5, 17, 'null'),
(348, 'asds', '2015-05-11 10:36:41', 1, 5, 17, 'null'),
(349, 'null', '2015-05-11 10:36:41', 1, 5, 17, 'null'),
(350, 'ad', '2015-05-11 10:36:42', 1, 5, 17, 'null'),
(351, 'sd', '2015-05-11 10:36:42', 1, 5, 17, 'null'),
(352, 'a', '2015-05-11 10:36:42', 1, 5, 17, 'null'),
(353, 'das', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(354, 'ds', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(355, 'null', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(356, 'dasdsad', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(357, 'as', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(358, 'dsad', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(359, 'sa', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(360, 'das', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(361, 'dd', '2015-05-11 10:36:43', 1, 5, 17, 'null'),
(362, 'sa', '2015-05-11 10:36:45', 1, 5, 17, 'null'),
(363, 'das', '2015-05-11 10:36:45', 1, 5, 17, 'null'),
(364, 'gutu-te', '2015-05-11 10:36:47', 1, 5, 14, 'null'),
(365, 'ia-o', '2015-05-11 10:36:50', 1, 5, 14, 'null'),
(366, 'null', '2015-05-11 10:37:13', 1, 5, 17, 'imagine3_hover.jpg'),
(367, 'asdasd', '2015-05-11 10:37:15', 1, 5, 17, 'null'),
(368, 'asd', '2015-05-11 10:37:16', 1, 5, 17, 'null'),
(369, 'asda', '2015-05-11 10:37:16', 1, 5, 17, 'null'),
(370, 'sd', '2015-05-11 10:37:17', 1, 5, 17, 'null'),
(371, 'd', '2015-05-11 10:37:17', 1, 5, 17, 'null'),
(372, 'dsa', '2015-05-11 10:37:17', 1, 5, 17, 'null'),
(373, 'd', '2015-05-11 10:37:17', 1, 5, 17, 'null'),
(374, 'dsa', '2015-05-11 10:37:17', 1, 5, 17, 'null'),
(375, 'das', '2015-05-11 10:37:18', 1, 5, 17, 'null'),
(376, 'd', '2015-05-11 10:37:18', 1, 5, 17, 'null'),
(377, 'k', '2015-05-11 10:48:18', 1, 2, 14, 'null'),
(378, 'test', '2015-05-11 10:48:47', 1, 5, 14, 'null'),
(379, 'test', '2015-05-11 10:48:51', 1, 2, 14, 'null'),
(380, 'mesaj', '2015-05-11 11:58:57', 1, 31, 16, 'null'),
(381, 'test', '2015-05-11 11:59:03', 1, 31, 15, 'null');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `familie_useri`
--

CREATE TABLE IF NOT EXISTS `familie_useri` (
`ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Nume` varchar(200) NOT NULL,
  `ID_Info_Familie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `familie_useri`
--

INSERT INTO `familie_useri` (`ID`, `ID_User`, `Nume`, `ID_Info_Familie`) VALUES
(1, 14, 'Carp Roxana', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `fotografii`
--

CREATE TABLE IF NOT EXISTS `fotografii` (
`ID` int(11) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `OwnerID` int(11) NOT NULL,
  `DataUploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `fotografii`
--

INSERT INTO `fotografii` (`ID`, `Nume`, `Path`, `OwnerID`, `DataUploaded`) VALUES
(1, '7.jpg', 'http://localhost/Tema2/Views/public/images/resources/Array/7.jpg', 15, '2015-04-07 16:46:01'),
(2, '7.jpg', 'http://localhost/Tema2/Views/public/images/resources/Array/7.jpg', 15, '2015-04-07 16:46:26'),
(6, 'WP_20140522_020.jpg', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/WP_20140522_020.jpg', 14, '2015-04-07 18:38:07'),
(7, 'WP_20140522_036.jpg', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/WP_20140522_036.jpg', 14, '2015-04-07 18:57:56'),
(8, 'poze.png', 'http://localhost/Tema2/Views/public/images/resources/matei_ioana@yahoo.com/poze.png', 15, '2015-04-07 18:59:44'),
(9, 'an3_calc.jpg', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/an3_calc.jpg', 14, '2015-04-14 05:45:15'),
(10, 'banchet.jpg', 'http://localhost/Tema2/Views/public/images/resources/alina_mihai@yahoo.com/banchet.jpg', 18, '2015-04-16 01:47:04'),
(11, '11182002_848899565181178_787202335_o(1).jpg', 'http://localhost/Tema2/Views/public/images/resources/alberto@yahoo.com/11182002_848899565181178_7872', 14, '2015-05-10 15:21:57'),
(12, '11182002_848899565181178_787202335_o(1).jpg', 'http://localhost/Tema2/Views/public/images/resources/alberto@yahoo.com/11182002_848899565181178_7872', 14, '2015-05-10 15:25:34');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `grupuri`
--

CREATE TABLE IF NOT EXISTS `grupuri` (
`ID` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `grupuri`
--

INSERT INTO `grupuri` (`ID`, `Nume`, `UserID`, `Data`) VALUES
(8, 'Prieteni', 15, '2015-04-08'),
(9, 'Familie', 14, '2015-04-08'),
(10, 'Boss', 14, '2015-05-10'),
(11, '', 14, '2015-05-10'),
(13, 'Scoala', 14, '2015-05-10'),
(14, 'Ioni', 14, '2015-05-10'),
(17, 'Ioane', 14, '2015-05-10');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `grupuriuseri`
--

CREATE TABLE IF NOT EXISTS `grupuriuseri` (
`ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Grup` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `grupuriuseri`
--

INSERT INTO `grupuriuseri` (`ID`, `ID_User`, `ID_Grup`) VALUES
(4, 14, 8),
(6, 14, 9),
(8, 14, 10),
(9, 14, 11),
(11, 14, 13),
(32, 14, 14),
(35, 14, 17),
(3, 15, 8),
(7, 15, 9),
(37, 15, 17),
(5, 16, 8),
(36, 16, 17);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `info_familie`
--

CREATE TABLE IF NOT EXISTS `info_familie` (
`ID` int(11) NOT NULL,
  `Relatie_Familie` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `info_familie`
--

INSERT INTO `info_familie` (`ID`, `Relatie_Familie`) VALUES
(1, 'Frate'),
(2, 'Sora'),
(3, 'Mama'),
(4, 'Tata'),
(5, 'Nepot'),
(6, 'Unchi'),
(7, 'Bunic'),
(8, 'Var');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `info_locatie`
--

CREATE TABLE IF NOT EXISTS `info_locatie` (
`ID` int(11) NOT NULL,
  `Tara` varchar(50) NOT NULL,
  `Oras` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `info_locatie`
--

INSERT INTO `info_locatie` (`ID`, `Tara`, `Oras`) VALUES
(1, 'Romania', 'Suceava'),
(2, 'Bahamas', 'New Providence'),
(3, 'Suceava', 'Romania'),
(4, 'Anguilla', 'Anguilla'),
(5, 'Romainia', 'Iasi'),
(6, 'Romainia', 'Arges'),
(7, 'Romainia', 'Bacau'),
(8, 'Romainia', 'Bacau'),
(9, 'Afghanistan', ''),
(10, 'Afghanistan', ''),
(11, 'Algeria', 'Annaba'),
(12, 'Algeria', 'Batna'),
(13, 'Romainia', 'Bacau'),
(14, 'Bangladesh', 'Chittagong'),
(15, 'Bangladesh', 'Chittagong'),
(16, 'Bangladesh', 'Chittagong'),
(17, 'Bangladesh', 'Chittagong'),
(18, 'Bangladesh', 'Chittagong'),
(19, 'Bangladesh', 'Chittagong'),
(20, 'Bangladesh', 'Chittagong'),
(21, 'Bangladesh', 'Chittagong'),
(22, 'Bangladesh', 'Chittagong'),
(23, 'Bangladesh', 'Chittagong'),
(24, 'Bangladesh', 'Chittagong'),
(25, 'Bangladesh', 'Chittagong'),
(26, 'Bangladesh', 'Chittagong'),
(27, 'Bangladesh', 'Chittagong'),
(28, 'Bangladesh', 'Chittagong'),
(29, 'Bangladesh', 'Chittagong'),
(30, 'Bangladesh', 'Chittagong'),
(31, 'Bangladesh', 'Chittagong'),
(32, 'Bangladesh', 'Chittagong'),
(33, 'Bangladesh', 'Bhola'),
(34, 'Bangladesh', 'Bhola'),
(35, 'Bangladesh', 'Bhola'),
(36, 'Bangladesh', 'Bhola'),
(37, 'Bangladesh', 'Bhola'),
(38, 'Bangladesh', 'Bhola'),
(39, 'Bangladesh', 'Bhola'),
(40, 'Bangladesh', 'Bhola'),
(41, 'Bangladesh', 'Bhola'),
(42, 'Bangladesh', 'Bhola'),
(43, 'Bangladesh', 'Bhola'),
(44, 'Bangladesh', 'Bhola'),
(45, 'Bangladesh', 'Bhola'),
(46, 'Bangladesh', 'Bhola'),
(47, 'Bangladesh', 'Bhola'),
(48, 'Bangladesh', 'Bhola'),
(49, 'Albania', 'Devoll (Bilisht)'),
(50, 'Afghanistan', 'Baghlan'),
(51, 'American Samoa', 'Rose Island'),
(52, 'American Samoa', 'Rose Island'),
(53, 'Antigua and Barbuda', 'Saint Paul'),
(54, 'American Samoa', 'Rose Island'),
(55, 'Anguilla', 'Anguilla'),
(56, 'Russia', 'Tverskaya'),
(57, 'American Samoa', 'Swains Island'),
(58, 'Angola', 'Canillo'),
(59, 'Antartica', 'Antartica'),
(60, 'American Samoa', 'Rose Island'),
(61, 'Albania', 'Devoll (Bilisht)'),
(62, 'Albania', 'Devoll (Bilisht)'),
(63, 'Albania', 'Devoll (Bilisht)'),
(64, 'American Samoa', 'Western'),
(65, 'Anguilla', ''),
(66, 'Anguilla', ''),
(67, 'Anguilla', ''),
(68, 'Angola', 'Benguela'),
(69, 'Angola', 'Canillo'),
(70, 'American Samoa', 'Swains Island'),
(71, 'Antartica', 'Antartica'),
(72, 'Australia', 'Queensland');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `info_relatii`
--

CREATE TABLE IF NOT EXISTS `info_relatii` (
`ID` int(11) NOT NULL,
  `Status_Relatie` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `info_relatii`
--

INSERT INTO `info_relatii` (`ID`, `Status_Relatie`) VALUES
(1, 'nespecificat'),
(2, 'Intr-o relatie'),
(3, 'Intr-o relatie complicata'),
(4, 'Vaduv/a'),
(5, 'Logodit/a'),
(6, 'Singur/a'),
(7, 'Casatorit/a'),
(8, 'Despartit/a'),
(9, 'Divortat/a');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `info_studii`
--

CREATE TABLE IF NOT EXISTS `info_studii` (
`ID` int(11) NOT NULL,
  `Facultate` varchar(50) DEFAULT NULL,
  `Liceu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `info_studii`
--

INSERT INTO `info_studii` (`ID`, `Facultate`, `Liceu`) VALUES
(1, 'Politehnica', ' '),
(9, 'ATM', 'Campulung'),
(10, NULL, NULL),
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL),
(14, NULL, NULL),
(15, NULL, NULL),
(16, NULL, NULL),
(17, NULL, NULL),
(18, NULL, NULL),
(19, NULL, NULL),
(20, 'Academia Tehnica Militara', NULL),
(21, 'Academia Tehnica Militara', ' '),
(22, 'ATM', 'Liceul Petru Rares'),
(23, NULL, NULL),
(24, NULL, NULL),
(25, NULL, NULL),
(26, NULL, NULL),
(27, NULL, NULL),
(28, NULL, NULL),
(29, NULL, NULL),
(30, NULL, NULL),
(31, NULL, NULL),
(32, NULL, NULL),
(33, NULL, NULL),
(34, NULL, NULL),
(35, NULL, NULL),
(36, NULL, NULL),
(37, NULL, NULL),
(38, NULL, NULL),
(39, NULL, NULL),
(40, NULL, NULL),
(41, NULL, NULL),
(42, NULL, NULL),
(43, NULL, NULL),
(44, NULL, NULL),
(45, NULL, NULL),
(46, NULL, NULL),
(47, NULL, NULL),
(48, NULL, NULL),
(49, NULL, NULL),
(50, NULL, NULL),
(51, NULL, NULL),
(52, NULL, NULL),
(53, NULL, NULL),
(54, NULL, NULL),
(55, NULL, NULL),
(56, NULL, NULL),
(57, NULL, NULL),
(58, NULL, NULL),
(59, NULL, NULL),
(60, NULL, NULL),
(61, NULL, NULL),
(62, NULL, NULL),
(63, NULL, NULL),
(64, NULL, NULL),
(65, NULL, NULL),
(66, NULL, NULL),
(67, NULL, NULL),
(68, NULL, NULL),
(69, NULL, NULL),
(70, NULL, NULL),
(71, NULL, NULL),
(72, NULL, NULL),
(73, NULL, NULL),
(74, NULL, NULL),
(75, NULL, NULL),
(76, NULL, NULL),
(77, NULL, NULL),
(78, NULL, NULL),
(79, NULL, NULL),
(80, NULL, NULL),
(81, NULL, NULL),
(82, NULL, NULL),
(83, NULL, NULL),
(84, NULL, NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `info_useri`
--

CREATE TABLE IF NOT EXISTS `info_useri` (
`ID` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `ID_Info_Studii` int(11) NOT NULL,
  `ID_Locatie` int(11) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Photo_Profil` varchar(100) DEFAULT NULL,
  `Data_Nasterii` date DEFAULT NULL,
  `Telefon` decimal(10,0) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Info_Relatie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `info_useri`
--

INSERT INTO `info_useri` (`ID`, `Nume`, `Prenume`, `ID_Info_Studii`, `ID_Locatie`, `Sex`, `Photo_Profil`, `Data_Nasterii`, `Telefon`, `Status`, `Info_Relatie`) VALUES
(1, 'Carp', 'Alberto', 9, 1, 1, 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', '1916-12-19', '11223', 2, 3),
(2, 'Matei', 'Ioana', 1, 2, 0, 'http://localhost/Tema2/Views/public/images/resources/matei_ioana@yahoo.com/Ioana_Matei_Max.jpg', '1900-12-01', '0', 3, 0),
(3, 'Oblesniuc', 'Ioana', 0, 2, 0, 'http://localhost/Tema2/Views/public/images/resources/ioana_oblesniuc@yahoo.com/p.jpg', '1900-12-05', '9999999999', 4, 0),
(4, 'Hiji', 'Iulian', 0, 4, 1, 'http://localhost/Tema2/Views/public/images/resources/hiji_iulian@yahoo.com/Hiji_Iulian_Max.jpg', '1905-12-01', '45465365', 1, 0),
(5, 'Mihai', 'Alina', 22, 3, 0, 'http://localhost/Tema2/Views/public/images/resources/alina_mihai@yahoo.com/Alina_Mihai_Max.jpg', '1994-12-09', '8989887688', 5, 2),
(6, 'Grosu', 'Daniel', 10, 5, 1, NULL, '1993-12-28', '818823274', 5, 6),
(7, 'Mihai', 'Florea', 11, 6, 1, 'http://localhost/Tema2/Views/public/images/resources/mihai.her_love@yahoo.com/Mihai_Florea_Max.jpg', '1983-12-10', '7656785', 6, 2),
(16, 'Balan', 'Geanina', 20, 13, 0, 'http://localhost/Tema2/Views/public/images/resources/balan.geanina@gmail.com/Geanina_Balan_Max.jpg', '1992-12-18', '876756789', 13, 1),
(17, 'AAAAAAAA', 'AAAAAAAA', 73, 61, 0, 'http://localhost/Tema2/Views/public/images/resources/AAAA@AAAA.com/imagine3_hover.jpg', '1911-12-07', '12345678', 61, 1),
(18, 'AAAAAAAA', 'AAAAAAAA', 74, 62, 0, 'http://localhost/Tema2/Views/public/images/resources/AAAA@AAAA.com/imagine3_hover.jpg', '1911-12-07', '1234567866', 62, 1),
(19, 'AAAAAAAA', 'AAAAAAAA', 75, 63, 0, 'http://localhost/Tema2/Views/public/images/resources/AAAA@AAAA.com/imagine3_hover.jpg', '1911-12-07', '1234567866', 63, 1),
(20, 'Test', 'Test', 82, 70, 0, 'http://localhost/Tema2/Views/public/images/resources/test@test.com/mail_notification (1).png', '1910-12-05', '9999999999', 70, 1),
(21, 'Test', 'Test', 84, 72, 0, 'http://localhost/Tema2/Views/public/images/resources/test@test.com/imagine3_hover.jpg', '1911-12-12', '4545454545', 72, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `notificari`
--

CREATE TABLE IF NOT EXISTS `notificari` (
`ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Imagine` text NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `notificari`
--

INSERT INTO `notificari` (`ID`, `ID_User`, `Text`, `Data`, `Imagine`, `Status`) VALUES
(3, 14, 'Oblesniuc Ioana a postat in cronologia ta', '2015-04-13 06:39:51', 'http://localhost/Tema2/Views/public/images/resources/ioana_oblesniuc@yahoo.com/p.jpg', 1),
(4, 14, 'Carp Alberto a postat in cronologia ta', '2015-04-13 07:30:02', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(5, 16, 'Carp Alberto a postat in cronologia ta', '2015-04-13 06:54:08', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(6, 16, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-13 19:38:18', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(7, 14, 'Carp Albertoa adaugat un comentariu la postarea din cronologia ta', '2015-04-13 20:10:27', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(8, 14, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-14 00:15:16', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(9, 14, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-14 00:15:16', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(10, 14, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-14 00:15:16', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(11, 14, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-14 00:16:59', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(12, 14, 'Mihai Alinaa adaugat un comentariu la postarea din cronologia ta', '2015-04-15 17:37:26', 'http://localhost/Tema2/Views/public/images/resources/alina_mihai@yahoo.com/Alina_Mihai_Max.jpg', 1),
(14, 14, 'Matei Ioanaa adaugat un comentariu la postarea ta', '2015-04-20 04:22:23', 'http://localhost/Tema2/Views/public/images/resources/matei_ioana@yahoo.com/Ioana_Matei_Max.jpg', 1),
(15, 15, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-21 04:36:50', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(16, 15, 'Carp Albertoa adaugat un comentariu la postarea ta', '2015-04-24 07:40:09', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(18, 15, 'Carp Alberto ti-a acceptat  cererea de prietenie.', '2015-04-24 08:02:03', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(19, 15, 'Carp Alberto ti-a acceptat  cererea de prietenie.', '2015-05-10 07:48:41', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(20, 15, 'Carp Alberto ti-a acceptat  cererea de prietenie.', '2015-05-10 07:48:41', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(21, 17, 'Carp Alberto ti-a acceptat  cererea de prietenie.', '2015-05-11 10:36:23', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 0),
(22, 15, 'Carp Alberto ti-a acceptat  cererea de prietenie.', '2015-05-11 01:54:06', 'http://localhost/Tema2/Views/public/images/resources/alberto_carp@yahoo.com/Alberto_Carp_Max.jpg', 1),
(23, 15, 'Oblesniuc Ioana ti-a acceptat  cererea de prietenie.', '2015-05-11 02:50:28', 'http://localhost/Tema2/Views/public/images/resources/ioana_oblesniuc@yahoo.com/p.jpg', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `prieteni`
--

CREATE TABLE IF NOT EXISTS `prieteni` (
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `prieteni`
--

INSERT INTO `prieteni` (`User1`, `User2`, `Status`, `Data`) VALUES
(14, 16, 1, '2015-04-12 07:32:58'),
(14, 19, 0, '2015-05-10 14:40:36'),
(15, 14, 1, '2015-05-11 01:52:32'),
(15, 16, 1, '2015-05-11 02:50:25'),
(15, 17, 0, '2015-05-11 10:49:32'),
(17, 14, 1, '2015-05-11 01:36:23'),
(18, 14, 1, '2015-04-15 16:49:38'),
(18, 15, 1, '2015-04-20 04:22:38');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
`ID` int(11) NOT NULL,
  `Update_Text` text NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Permisiuni` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_User_Target` int(11) NOT NULL,
  `Media` text
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `updates`
--

INSERT INTO `updates` (`ID`, `Update_Text`, `Data`, `Permisiuni`, `ID_User`, `ID_User_Target`, `Media`) VALUES
(84, 'bla', '2015-04-24 15:56:57', 0, 14, 14, 'null'),
(85, 'ana', '2015-04-24 15:57:42', 0, 14, 14, 'null'),
(86, 'miau', '2015-04-24 15:57:52', 0, 14, 14, 'null'),
(87, 'ioi', '2015-04-24 16:00:21', 0, 14, 14, 'null'),
(88, 'blue', '2015-04-24 16:02:19', 0, 14, 14, 'banchet.jpg'),
(89, 'bla', '2015-04-24 16:19:04', 0, 14, 14, 'null'),
(90, 'ioooo', '2015-04-24 16:19:57', 0, 14, 14, 'null');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `useri`
--

CREATE TABLE IF NOT EXISTS `useri` (
`ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `ID_Info` int(11) NOT NULL,
  `Privilegii` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `useri`
--

INSERT INTO `useri` (`ID`, `Email`, `Parola`, `ID_Info`, `Privilegii`) VALUES
(14, 'alberto@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 1, 2),
(15, 'matei_ioana@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 2, 2),
(16, 'ioana_oblesniuc@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 3, 0),
(17, 'hiji_iulian@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 4, 2),
(18, 'alina_mihai@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 5, 0),
(19, 'dani_grosu@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 6, 1),
(20, 'mihai.her_love@yahoo.com', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 7, 0),
(29, 'balan.geanina@gmail.com', '7c94e539e5224ae857dc11bfdcd65383e4c1c9882103e4fdcc4e543e57b23ac4', 16, 0),
(30, 'AAAA@AAAA.com', '12f234f1a70297c4f9abb50b3c5d49dc15b704ae8b71323606ef998e123cf322', 17, 0),
(34, 'test@test.com', '7c94e539e5224ae857dc11bfdcd65383e4c1c9882103e4fdcc4e543e57b23ac4', 21, 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `userstatus`
--

CREATE TABLE IF NOT EXISTS `userstatus` (
`ID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `userstatus`
--

INSERT INTO `userstatus` (`ID`, `Status`, `UpdateTime`) VALUES
(1, 1, '2015-05-11 10:59:46'),
(2, 0, '2015-05-11 10:53:36'),
(3, 1, '2015-05-11 13:43:47'),
(4, 0, '2015-05-11 12:14:30'),
(5, 0, '2015-05-10 20:28:09'),
(6, 1, '2015-05-11 11:17:39'),
(7, 0, '2015-05-02 11:46:36'),
(8, 0, '2015-05-02 13:24:10'),
(9, 0, '2015-05-02 13:26:58'),
(10, 0, '2015-05-02 13:27:51'),
(11, 0, '2015-05-02 13:28:23'),
(12, 0, '2015-05-02 13:28:25'),
(13, 0, '2015-05-02 15:26:22'),
(14, 0, '2015-05-02 13:35:41'),
(15, 0, '2015-05-02 13:36:40'),
(16, 0, '2015-05-02 13:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarii`
--
ALTER TABLE `comentarii`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_User` (`ID_User`,`ID_Update`), ADD KEY `ID_Update` (`ID_Update`);

--
-- Indexes for table `conferinta`
--
ALTER TABLE `conferinta`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_Creator` (`ID_Creator`);

--
-- Indexes for table `conferinta_users`
--
ALTER TABLE `conferinta_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `id_user` (`id_users`,`id_conferinta`), ADD KEY `id_conferinta` (`id_conferinta`);

--
-- Indexes for table `conf_messages`
--
ALTER TABLE `conf_messages`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_Conf` (`ID_Conf`,`User`);

--
-- Indexes for table `conversatie`
--
ALTER TABLE `conversatie`
 ADD PRIMARY KEY (`ID`), ADD KEY `User1` (`User1`,`User2`), ADD KEY `User2` (`User2`);

--
-- Indexes for table `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_Conversatie` (`ID_Conversatie`), ADD KEY `Sender` (`Sender`);

--
-- Indexes for table `familie_useri`
--
ALTER TABLE `familie_useri`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_User` (`ID_User`,`ID_Info_Familie`), ADD KEY `ID_Info_Familie` (`ID_Info_Familie`);

--
-- Indexes for table `fotografii`
--
ALTER TABLE `fotografii`
 ADD PRIMARY KEY (`ID`), ADD KEY `OwnerID` (`OwnerID`);

--
-- Indexes for table `grupuri`
--
ALTER TABLE `grupuri`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Nume` (`Nume`), ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `grupuriuseri`
--
ALTER TABLE `grupuriuseri`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_User` (`ID_User`,`ID_Grup`), ADD KEY `ID_Grup` (`ID_Grup`);

--
-- Indexes for table `info_familie`
--
ALTER TABLE `info_familie`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_locatie`
--
ALTER TABLE `info_locatie`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_relatii`
--
ALTER TABLE `info_relatii`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_studii`
--
ALTER TABLE `info_studii`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_useri`
--
ALTER TABLE `info_useri`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`), ADD KEY `ID_Info_Studii` (`ID_Info_Studii`), ADD KEY `ID_Locatie` (`ID_Locatie`), ADD KEY `Status` (`Status`), ADD KEY `Info_Relatie` (`Info_Relatie`);

--
-- Indexes for table `notificari`
--
ALTER TABLE `notificari`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `prieteni`
--
ALTER TABLE `prieteni`
 ADD PRIMARY KEY (`User1`,`User2`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_User` (`ID_User`), ADD KEY `ID_User_Source` (`ID_User_Target`);

--
-- Indexes for table `useri`
--
ALTER TABLE `useri`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Email` (`Email`), ADD KEY `ID_Info` (`ID_Info`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
 ADD PRIMARY KEY (`ID`), ADD KEY `Status` (`Status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarii`
--
ALTER TABLE `comentarii`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conferinta`
--
ALTER TABLE `conferinta`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `conferinta_users`
--
ALTER TABLE `conferinta_users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `conf_messages`
--
ALTER TABLE `conf_messages`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conversatie`
--
ALTER TABLE `conversatie`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=382;
--
-- AUTO_INCREMENT for table `familie_useri`
--
ALTER TABLE `familie_useri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fotografii`
--
ALTER TABLE `fotografii`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `grupuri`
--
ALTER TABLE `grupuri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `grupuriuseri`
--
ALTER TABLE `grupuriuseri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `info_familie`
--
ALTER TABLE `info_familie`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `info_locatie`
--
ALTER TABLE `info_locatie`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `info_relatii`
--
ALTER TABLE `info_relatii`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `info_studii`
--
ALTER TABLE `info_studii`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `info_useri`
--
ALTER TABLE `info_useri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notificari`
--
ALTER TABLE `notificari`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `useri`
--
ALTER TABLE `useri`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `comentarii`
--
ALTER TABLE `comentarii`
ADD CONSTRAINT `comentarii_ibfk_1` FOREIGN KEY (`ID_Update`) REFERENCES `updates` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentarii_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `conferinta`
--
ALTER TABLE `conferinta`
ADD CONSTRAINT `conferinta_ibfk_1` FOREIGN KEY (`ID_Creator`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `conferinta_users`
--
ALTER TABLE `conferinta_users`
ADD CONSTRAINT `conf_id_users` FOREIGN KEY (`id_users`) REFERENCES `useri` (`ID`),
ADD CONSTRAINT `conferinta_users_ibfk_1` FOREIGN KEY (`id_conferinta`) REFERENCES `conferinta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `conversatie`
--
ALTER TABLE `conversatie`
ADD CONSTRAINT `conversatie_ibfk_1` FOREIGN KEY (`User1`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `conversatie_ibfk_2` FOREIGN KEY (`User2`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `conversatie_reply`
--
ALTER TABLE `conversatie_reply`
ADD CONSTRAINT `conversatie_reply_ibfk_1` FOREIGN KEY (`ID_Conversatie`) REFERENCES `conversatie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `conversatie_reply_ibfk_2` FOREIGN KEY (`Sender`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `familie_useri`
--
ALTER TABLE `familie_useri`
ADD CONSTRAINT `familie_useri_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `familie_useri_ibfk_2` FOREIGN KEY (`ID_Info_Familie`) REFERENCES `info_familie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `fotografii`
--
ALTER TABLE `fotografii`
ADD CONSTRAINT `fotografii_ibfk_1` FOREIGN KEY (`OwnerID`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `grupuri`
--
ALTER TABLE `grupuri`
ADD CONSTRAINT `grupuri_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `grupuriuseri`
--
ALTER TABLE `grupuriuseri`
ADD CONSTRAINT `grupuriuseri_ibfk_1` FOREIGN KEY (`ID_Grup`) REFERENCES `grupuri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `grupuriuseri_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `notificari`
--
ALTER TABLE `notificari`
ADD CONSTRAINT `notificari_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `useri` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
