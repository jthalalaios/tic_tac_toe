-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 07:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tic_tac_toe`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(3) NOT NULL,
  `id_user` int(3) DEFAULT NULL,
  `move` varchar(30) DEFAULT NULL,
  `game_number` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `move`, `game_number`) VALUES
(229, 7, 'top-left', 13),
(230, 8, 'top-right', 13),
(231, 7, 'middle-middle', 13),
(232, 8, 'bottom-right', 13),
(233, 7, 'middle-right', 13),
(234, 8, 'middle-left', 13),
(235, 8, 'middle-middle', 13),
(241, 7, 'top-left', 3),
(242, 8, 'middle-middle', 3),
(243, 7, 'top-right', 3),
(244, 8, 'middle-left', 3),
(245, 7, 'bottom-right', 3),
(246, 7, 'bottom-right', 3),
(247, 7, 'bottom-right', 3),
(248, 7, 'bottom-right', 3),
(250, 9, 'top-left', 3),
(251, 10, 'top-right', 3),
(252, 9, 'middle-middle', 3),
(253, 10, 'middle-right', 3),
(258, 11, 'top-left', 4),
(259, 12, 'top-right', 4),
(260, 11, 'middle-middle', 4),
(261, 12, 'middle-right', 4),
(266, 11, 'top-left', 3),
(267, 12, 'top-right', 3),
(268, 11, 'middle-middle', 3),
(269, 12, 'middle-right', 3),
(270, 13, 'top-left', 4),
(271, 14, 'top-right', 4),
(272, 13, 'middle-middle', 4),
(273, 14, 'middle-right', 4),
(274, 13, 'top-left', 5),
(275, 14, 'middle-left', 5),
(276, 13, 'top-middle', 5),
(277, 14, 'top-right', 5),
(278, 13, 'bottom-left', 5),
(279, 14, 'bottom-middle', 5),
(280, 13, 'bottom-right', 5),
(281, 14, 'middle-middle', 5),
(282, 14, 'bottom-right', 5),
(283, 14, 'bottom-right', 5),
(284, 14, 'middle-right', 5),
(285, 14, 'top-middle', 5),
(286, 14, 'top-middle', 5),
(287, 14, 'top-left', 5),
(288, 13, 'top-left', 6),
(289, 14, 'top-right', 6),
(290, 13, 'middle-middle', 6),
(291, 14, 'middle-right', 6),
(312, 13, 'top-left', 3),
(313, 14, 'top-right', 3),
(314, 13, 'middle-middle', 3),
(315, 14, 'middle-right', 3),
(316, 13, 'top-left', 4),
(317, 14, 'top-right', 4),
(318, 13, 'middle-middle', 4),
(319, 14, 'bottom-right', 4),
(320, 13, 'middle-right', 4),
(321, 13, 'middle-middle', 4),
(322, 14, 'bottom-middle', 4),
(331, 13, 'top-left', 3),
(332, 14, 'top-right', 3),
(333, 13, 'middle-middle', 3),
(334, 14, 'middle-left', 3),
(335, 13, 'bottom-left', 3),
(336, 14, 'bottom-right', 3),
(337, 14, 'middle-middle', 3),
(338, 13, 'middle-right', 3),
(339, 14, 'bottom-middle', 3),
(340, 14, 'middle-middle', 3),
(341, 14, 'top-middle', 3),
(342, 14, 'top-middle', 3),
(343, 14, 'top-middle', 3),
(344, 13, 'top-middle', 4),
(345, 14, 'middle-left', 4),
(346, 13, 'middle-right', 4),
(347, 13, 'middle-right', 4),
(348, 13, 'middle-right', 4),
(349, 14, 'top-right', 4),
(350, 13, 'middle-middle', 4),
(351, 13, 'top-middle', 4),
(352, 13, 'top-middle', 4),
(357, 17, 'top-left', 3),
(358, 18, 'top-right', 3),
(359, 17, 'middle-middle', 3),
(360, 18, 'middle-right', 3),
(371, 17, 'top-left', 3),
(372, 18, 'top-right', 3),
(373, 17, 'middle-middle', 3),
(374, 18, 'middle-right', 3),
(379, 17, 'top-left', 3),
(380, 18, 'top-right', 3),
(381, 17, 'middle-middle', 3),
(382, 18, 'middle-right', 3),
(383, 17, 'bottom-middle', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'test1'),
(2, 'test2'),
(3, 'test12'),
(4, 'test21'),
(5, 'test123'),
(6, 'test321'),
(7, 'gfhg'),
(8, 'test22'),
(9, 'tharas'),
(10, 'aliento1'),
(11, 'testtt'),
(12, 'eeeee'),
(13, 'tharas1'),
(14, 'aliento12'),
(15, 'tharass'),
(16, '123test'),
(17, 'test45'),
(18, 'test65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
