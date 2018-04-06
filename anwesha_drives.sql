-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2018 at 11:01 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anwesha_drives`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `email`, `type`) VALUES
(1, 'admin', 'admin', 'abc@gmail.com', 'Super_Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingid` varchar(50) NOT NULL,
  `vehicleid` varchar(11) NOT NULL,
  `bookingFrom` datetime NOT NULL,
  `bookingTo` datetime NOT NULL,
  `actualfrom` datetime DEFAULT NULL,
  `actualto` datetime DEFAULT NULL,
  `bookingby` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `vehicleid`, `bookingFrom`, `bookingTo`, `actualfrom`, `actualto`, `bookingby`, `phone`, `email`, `status`, `address`, `price`) VALUES
('1', '2', '2018-01-01 08:30:00', '2018-01-02 08:30:00', NULL, '2018-01-07 06:46:06', 'kandarp lalit', '7979936859', '', 'INACTIVE', 'Office', 1999),
('5', '2', '2018-01-05 08:30:00', '2018-01-06 08:30:00', NULL, NULL, 'Akash Gautam', '9938225493', 'gautamakash91@gmail.com', 'INACTIVE', 'Office_pickup', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` int(6) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `experience` varchar(30) NOT NULL,
  UNIQUE KEY `empid` (`empid`),
  UNIQUE KEY `empid_2` (`empid`),
  KEY `empid_3` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` int(20) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicleid` int(11) NOT NULL AUTO_INCREMENT,
  `vehiclename` varchar(20) DEFAULT NULL,
  `vehicletype` varchar(10) DEFAULT NULL,
  `vehiclesubcategory` varchar(20) DEFAULT NULL,
  `ownername` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`vehicleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleid`, `vehiclename`, `vehicletype`, `vehiclesubcategory`, `ownername`, `phone`, `address`) VALUES
(1, 'Mahindra_TUV', 'SUV', 'car', 'Rahul ', '8114789310', 'Patia Bhubaneswra'),
(2, 'Hyundai_Eon', 'Hatchback', 'car', 'Ashutosh Nayak', '9583110600', 'Saswati Homes, patia , Rajeev '),
(3, 'Mahindra-KUV100', 'Hatchback', 'car', 'biswajit mohanty', '9937899787', 'pt no.m/9,madhusudan nagar, bh'),
(4, 'Mahindra_Scorpio', 'SUV', 'car', 'sai prasad nayak', '8114789310', 'bhubaneswar');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_names`
--

CREATE TABLE IF NOT EXISTS `vehicle_names` (
  `names` varchar(30) NOT NULL,
  `hourly` int(11) NOT NULL,
  `12_hours` int(11) NOT NULL,
  `24_hours` int(11) NOT NULL,
  PRIMARY KEY (`names`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_names`
--

INSERT INTO `vehicle_names` (`names`, `hourly`, `12_hours`, `24_hours`) VALUES
('Chevrolet_Beat', 140, 1500, 2600),
('Honda_City', 200, 2000, 3400),
('Hyundai_Eon', 130, 1400, 2500),
('Hyundai_Verna', 200, 2000, 3400),
('Mahindra-KUV100', 160, 1700, 3200),
('Mahindra_Scorpio', 240, 2400, 4000),
('Mahindra_TUV', 220, 2200, 3600),
('Mahindra_XUV500', 260, 2800, 4200),
('Maruti_Alto', 120, 1300, 2400),
('Maruti_Ciaz', 200, 2000, 3400),
('Maruti_Suzuki_Swift', 160, 1700, 3200),
('Maruti_Swift_Dzire', 180, 1800, 3200),
('Volkswagen_Polo', 160, 1700, 3200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
