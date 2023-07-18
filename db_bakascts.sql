-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2021 at 11:21 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bakascts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ctsreport`
--

CREATE TABLE IF NOT EXISTS `tb_ctsreport` (
  `qr_id` int(250) NOT NULL AUTO_INCREMENT,
  `idNum` int(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'No contact',
  PRIMARY KEY (`qr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `tb_ctsreport`
--

INSERT INTO `tb_ctsreport` (`qr_id`, `idNum`, `time`, `date`, `status`) VALUES
(219, 140, '02:07:51 PM', 'November 18, 2021', 'No contact'),
(212, 165, '03:45:56 PM', 'November 8, 2021', 'Positive'),
(187, 337, '11:34:16 PM', 'November 6, 2021', 'No contact'),
(186, 337, '11:30:50 PM', 'November 6, 2021', 'No contact'),
(185, 337, '11:30:24 PM', 'November 6, 2021', 'No contact'),
(184, 337, '11:29:39 PM', 'November 6, 2021', 'No contact'),
(211, 334, '03:45:46 PM', 'November 8, 2021', 'Self-isolated'),
(209, 165, '01:02:26 AM', 'November 7, 2021', 'No contact'),
(218, 334, '08:44:01 AM', 'November 12, 2021', 'No contact'),
(208, 140, '01:01:20 AM', 'November 7, 2021', 'No contact'),
(207, 140, '12:58:58 AM', 'November 7, 2021', 'No contact'),
(206, 165, '12:58:27 AM', 'November 7, 2021', 'No contact'),
(205, 334, '12:58:20 AM', 'November 7, 2021', 'No contact'),
(204, 337, '12:53:13 AM', 'November 7, 2021', 'No contact'),
(203, 337, '12:36:14 AM', 'November 7, 2021', 'No contact'),
(202, 337, '12:15:38 AM', 'November 7, 2021', 'No contact'),
(201, 337, '12:14:54 AM', 'November 7, 2021', 'No contact'),
(200, 140, '12:06:26 AM', 'November 7, 2021', 'No contact'),
(199, 337, '12:00:21 AM', 'November 7, 2021', 'No contact'),
(198, 337, '11:53:45 PM', 'November 6, 2021', 'No contact'),
(197, 337, '11:52:53 PM', 'November 6, 2021', 'No contact'),
(217, 337, '10:58:12 PM', 'November 10, 2021', 'No contact'),
(220, 140, '02:11:38 PM', 'November 18, 2021', 'No contact'),
(221, 140, '02:12:49 PM', 'November 18, 2021', 'No contact'),
(222, 140, '02:13:55 PM', 'November 18, 2021', 'No contact'),
(223, 140, '02:16:43 PM', 'November 18, 2021', 'No contact'),
(224, 140, '02:17:21 PM', 'November 18, 2021', 'No contact'),
(225, 337, '09:58:11 PM', 'November 19, 2021', 'No contact'),
(226, 337, '10:00:46 PM', 'November 19, 2021', 'No contact'),
(241, 334, '05:55:53 PM', 'November 28, 2021', 'No contact'),
(242, 165, '05:56:51 PM', 'November 28, 2021', 'No contact');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `idNum` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `user` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`idNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10108 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`idNum`, `firstName`, `lastName`, `user`, `password`) VALUES
(10093, 'DJ', 'Ramirez', 'DjRamz', '12345'),
(10095, 'Kryzle Rahne', 'Enriquez', 'kryEn', '12345'),
(10096, 'Cesar', 'Bicol', 'ceSarB', 'asdf'),
(10097, 'Matthew', 'Ortega', 'JmRTG', 'ortga11'),
(10107, 'Kristina', 'Perez', 'tina123', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usersreg`
--

CREATE TABLE IF NOT EXISTS `tb_usersreg` (
  `idNum` int(30) NOT NULL AUTO_INCREMENT,
  `email` text,
  `firstName` text,
  `lastName` text,
  `password` text,
  `gender` varchar(6) NOT NULL,
  `image_path` text,
  `contactNum` varchar(20) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` text,
  PRIMARY KEY (`idNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=343 ;

--
-- Dumping data for table `tb_usersreg`
--

INSERT INTO `tb_usersreg` (`idNum`, `email`, `firstName`, `lastName`, `password`, `gender`, `image_path`, `contactNum`, `street`, `barangay`, `city`) VALUES
(140, 'cesar@gmail.com', 'Cesar Edgardo', 'Bicol', '1111', 'Male', 'male.jfif', '09999235159', '21 Malayang Parang', 'Barangay 4', 'Batangas City'),
(165, 'djramirez@gmail.com', 'David Jezzrel', 'Ramirez', 'djdjdj', 'Male', 'guy.png', '09234982312', '231 Kalabaw Street', 'Wawa', 'Batangas City'),
(334, 'kryzlerahneenriquez@gmail.com', 'Kryzle Rahne', 'Enriquez', 'krykry', 'Female', 'girl.jpg', '09980295159', '11 National Road Street', 'Gulod Itaas', 'Batangas City'),
(337, 'john@gmail.com', 'John Matthew', 'Ortega', 'j0hny', 'Male', 'maledp.png', '09987442165', '14 Malinaw Street', 'Barangay 16', 'Batangas City'),
(338, 'thea@gmail.com', 'Althea Fatima', 'Arcilla', '1234', 'Female', 'avatar.jpg', '09986128972', '68 Mariwasa Purok 2', '', 'Batangas City');
