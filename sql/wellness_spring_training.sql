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
(32, 'Andy Zhèn Forests', 0, 0, 0, 0, 0),
(33, 'Barangay Navio Biyolinistas', 0, 0, 0, 0, 0),
(34, 'Bennionville Bobcats', 0, 0, 0, 0, 0),
(35, 'Bentown Tippers', 0, 0, 0, 0, 0),
(36, 'Billings Enforcers', 0, 0, 0, 0, 0),
(37, 'Billville Jovyans', 0, 0, 0, 0, 0),
(38, 'Bjornstad Bears', 0, 0, 0, 0, 0),
(39, 'Bryton Headaches', 0, 0, 0, 0, 0),
(40, 'Chandler Bings', 0, 0, 0, 0, 0),
(41, 'Dayville Daytrippers', 0, 0, 0, 0, 0),
(42, 'Dahlberg Dall Sheep', 0, 0, 0, 0, 0),
(43, 'Grandberg Fir Peaks', 0, 0, 0, 0, 0),
(44, 'Florence Nightingales', 0, 0, 0, 0, 0),
(45, 'Gruberton Groupers', 0, 0, 0, 0, 0),
(46, 'Hughville Wagoneers', 0, 0, 0, 0, 0),
(47, 'Jorlette Coordinators', 0, 0, 0, 0, 0),
(48, 'Knowlton Knolls', 0, 0, 0, 0, 0),
(49, 'Lawless Mappers', 0, 0, 0, 0, 0),
(50, 'Mainekala Down Easters', 0, 0, 0, 0, 0),
(51, 'Marbraska Whitings', 0, 0, 0, 0, 0),
(52, 'Megtown Senders', 0, 0, 0, 0, 0),
(53, 'Mirandaville Mallards', 0, 0, 0, 0, 0),
(54, 'Pearsonville Felines', 0, 0, 0, 0, 0),
(55, 'Reynoldstown Wrappers', 0, 0, 0, 0, 0),
(56, 'Rosieville Riveters', 0, 0, 0, 0, 0),
(57, 'Sobczakgo Cubs', 0, 0, 0, 0, 0),
(58, 'Sudsville Swimmers', 0, 0, 0, 0, 0),
(59, 'Victorville Vicars', 0, 0, 0, 0, 0),
(60, 'Wellsville Kakuros', 0, 0, 0, 0, 0),
(61, 'Worthenton Originals', 0, 0, 0, 0, 0);

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
