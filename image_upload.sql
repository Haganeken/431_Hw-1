-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2020 at 09:25 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `photographer` text NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `name`, `date`, `photographer`, `location`) VALUES
(10, '123123123', 'bob', '2020-03-03', 'test photog', 'someplace test'),
(11, '12312312312', 'test2', '2020-03-06', 'test2', 'testloc2'),
(12, '9a636e1e365d9d834dbe5266ce877bd7.jpg', 'Propaine', '2020-04-10', 'bobby', 'alren'),
(13, '9a636e1e365d9d834dbe5266ce877bd7.jpg', 'Propaine', '2020-04-10', 'bobby', 'alren'),
(14, '9a636e1e365d9d834dbe5266ce877bd7.jpg', 'Propaine', '2020-04-10', 'bobby', 'alren'),
(15, 'download.png', 'test', '2019-01-01', 'bobby', 'test'),
(16, 'download.png', 'test', '2019-01-01', 'bobby', 'test'),
(17, 'download.png', 'test', '2019-01-01', 'bobby', 'test'),
(18, 'download.png', 'test', '2019-01-01', 'bobby', 'test'),
(19, 'download.png', 'test', '2019-01-01', 'bobby', 'test'),
(20, '3qewoy.jpg', 'meme', '2030-12-15', 'Future', 'nowhere'),
(21, '3qewoy.jpg', 'meme', '2030-12-15', 'Future', 'nowhere'),
(22, '3qewoy.jpg', 'meme', '2030-12-15', 'Future', 'nowhere');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
