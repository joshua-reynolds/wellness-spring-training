-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2023 at 06:51 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellness_spring_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `bats`
--

DROP TABLE IF EXISTS `bats`;
CREATE TABLE IF NOT EXISTS `bats` (
  `bat_id` int NOT NULL AUTO_INCREMENT,
  `team_id` int NOT NULL,
  `bat_result` int NOT NULL,
  `bat_date` datetime NOT NULL,
  PRIMARY KEY (`bat_id`),
  UNIQUE KEY `bat_id` (`bat_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `runner1` int NOT NULL DEFAULT '0',
  `runner2` int NOT NULL DEFAULT '0',
  `runner3` int NOT NULL DEFAULT '0',
  `outs` int NOT NULL DEFAULT '0',
  `runs` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_id`),
  UNIQUE KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `runner1`, `runner2`, `runner3`, `outs`, `runs`) VALUES
(0, 'Andy Zhen Forests', 0, 0, 0, 0, 0),
(1, 'Bennionville Bobcats', 0, 0, 0, 0, 0),
(2, 'Bentown Tippers', 0, 0, 0, 0, 0),
(3, 'Billings Enforcers', 0, 0, 0, 0, 0),
(4, 'Billville Jovyans', 0, 0, 0, 0, 0),
(5, 'Bjornstad Bears', 0, 0, 0, 0, 0),
(6, 'Byron Bay Bee-Eaters', 0, 0, 0, 0, 0),
(7, 'Chandler Bings', 0, 0, 0, 0, 0),
(8, 'Dayville Daytrippers', 0, 0, 0, 0, 0),
(9, 'Dahlberg Dall Sheep', 0, 0, 0, 0, 0),
(10, 'Grandberg Fir Peaks', 0, 0, 0, 0, 0),
(11, 'Florence Nightingales', 0, 0, 0, 0, 0),
(12, 'Gruberton Groupers', 0, 0, 0, 0, 0),
(13, 'Hughville Wagoneers', 0, 0, 0, 0, 0),
(14, 'Jacksonville Jackrabbits', 0, 0, 0, 0, 0),
(15, 'Jorlette Coordinators', 0, 0, 0, 0, 0),
(16, 'Knowlton Knolls', 0, 0, 0, 0, 0),
(17, 'Lawless Mappers', 0, 0, 0, 0, 0),
(18, 'Madsburg Avocados', 0, 0, 0, 0, 0),
(19, 'Marbraska Whitings', 0, 0, 0, 0, 0),
(20, 'Megtown Senders', 0, 0, 0, 0, 0),
(21, 'Mirandaville Mallards', 0, 0, 0, 0, 0),
(22, 'Motown Mosquedas', 0, 0, 0, 0, 0),
(23, 'Natesville Narwhals', 0, 0, 0, 0, 0),
(24, 'Pearsonville Felines', 0, 0, 0, 0, 0),
(25, 'Reynoldstown Wrappers', 0, 0, 0, 0, 0),
(26, 'Rosieville Riveters', 0, 0, 0, 0, 0),
(27, 'Sudsville Swimmers', 0, 0, 0, 0, 0),
(28, 'Timtown Trekkers', 0, 0, 0, 0, 0),
(29, 'Victorville Vicars', 0, 0, 0, 0, 0),
(30, 'Wellsville Kakuros', 0, 0, 0, 0, 0),
(31, 'Worthenton Originals', 0, 0, 0, 0, 0)

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bats`
--
ALTER TABLE `bats`
  ADD CONSTRAINT `bats_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
