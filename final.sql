-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2019 at 03:48 PM
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
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `coef`
--

DROP TABLE IF EXISTS `coef`;
CREATE TABLE IF NOT EXISTS `coef` (
  `tof` varchar(50) NOT NULL,
  `A` double NOT NULL,
  `B` double NOT NULL,
  `C` double NOT NULL,
  `D` double NOT NULL,
  `E` double NOT NULL,
  `F` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coef`
--

INSERT INTO `coef` (`tof`, `A`, `B`, `C`, `D`, `E`, `F`) VALUES
('pbe', 5, 4, 5, 0.5, 0.5, 0.5),
('sbe', 0.5, 0.5, 0.5, 4, 5, 7),
('le', 10, 10, 10, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `hatchback`
--

DROP TABLE IF EXISTS `hatchback`;
CREATE TABLE IF NOT EXISTS `hatchback` (
  `parameter` varchar(50) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hatchback`
--

INSERT INTO `hatchback` (`parameter`, `min`, `max`) VALUES
('es', 0, 2000),
('eop', 0, 80),
('ms', 0, 120),
('nat', 3.2, 4.8),
('fa', 130, 260),
('art', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sedan`
--

DROP TABLE IF EXISTS `sedan`;
CREATE TABLE IF NOT EXISTS `sedan` (
  `parameter` varchar(50) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sedan`
--

INSERT INTO `sedan` (`parameter`, `min`, `max`) VALUES
('es', 0, 2500),
('eop', 0, 100),
('ms', 0, 200),
('nat', 3.2, 4.8),
('fa', 130, 260),
('art', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suv`
--

DROP TABLE IF EXISTS `suv`;
CREATE TABLE IF NOT EXISTS `suv` (
  `parameter` varchar(50) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suv`
--

INSERT INTO `suv` (`parameter`, `min`, `max`) VALUES
('es', 0, 3500),
('eop', 0, 120),
('ms', 0, 150),
('nat', 3.2, 4.8),
('fa', 130, 260),
('art', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `phno` varchar(13) NOT NULL,
  `age` int(3) NOT NULL,
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `cooid` varchar(250) NOT NULL,
  `approval` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`fname`, `lname`, `username`, `password`, `dept`, `phno`, `age`, `uid`, `user_type`, `question`, `answer`, `cooid`, `approval`) VALUES
('Akilesh', 'S', 'akilesh.sharma18@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'CS', '8050012797', 20, 1, 'User', 'Phone Model?', 'Nokia Lumia 830', 'yEeApzunpcG', '1'),
('Alan', 'Jacob', 'alan1998jac@gmail.com', '202cb962ac59075b964b07152d234b70', 'CS', '9900245549', 21, 3, 'DB_Admin', 'abc', 'xyz', '', '1'),
('Abhijith', 'Venugopal', 'abhijith@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'CS', '08050012797', 22, 4, 'Predictor_Admin', 'abc', 'xyz', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `name` varchar(255) DEFAULT NULL,
  `model` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `es` int(11) DEFAULT NULL,
  `eop` int(11) DEFAULT NULL,
  `ms` int(11) DEFAULT NULL,
  `nat` float DEFAULT NULL,
  `fa` int(11) DEFAULT NULL,
  `art` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`name`, `model`, `company`, `category`, `es`, `eop`, `ms`, `nat`, `fa`, `art`) VALUES
('Figo', 1, 'Ford', 'Hatchback', 600, 40, 80, 4, 200, 7),
('Brio', 1, 'Honda', 'Hatchback', 1600, 20, 30, 3.9, 150, 6),
('Brio', 2, 'Honda', 'Hatchback', 1800, 60, 50, 3.5, 170, 5),
('Baleno', 1, 'Suzuki', 'Hatchback', 800, 30, 70, 4.3, 140, 4),
('Baleno', 2, 'Suzuki', 'Hatchback', 1000, 70, 85, 4, 250, 3),
('Baleno', 3, 'Suzuki', 'Hatchback', 1600, 10, 95, 3.3, 200, 2),
('City', 1, 'Honda', 'Sedan', 1000, 20, 130, 4.6, 150, 9),
('City', 2, 'Honda', 'Sedan', 1500, 30, 140, 4, 220, 8),
('City', 3, 'Honda', 'Sedan', 2000, 66, 150, 3.5, 200, 7),
('Accent', 1, 'Hyundai ', 'Sedan', 2300, 50, 160, 4.5, 180, 6),
('Accent', 1, 'Hyundai ', 'Sedan', 2500, 80, 180, 4.7, 150, 5),
('CR-V', 1, 'Honda', 'SUV', 1000, 50, 50, 4.6, 140, 8),
('EcoSport', 1, 'Ford', 'SUV', 2000, 60, 60, 4.4, 160, 6),
('Rush', 1, 'Toyota', 'SUV', 3000, 80, 100, 3.8, 200, 3),
('Rush', 2, 'Toyota', 'SUV', 3300, 110, 140, 3.3, 240, 2),
('Figo', 7, 'Ford', 'SUV', 100, 110, 100, 4.3, 150, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
