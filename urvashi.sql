-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 10:13 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urvashi`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE IF NOT EXISTS `shop_details` (
`shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_phone` varchar(255) NOT NULL,
  `shop_lat` varchar(255) NOT NULL,
  `shop_long` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`shop_id`, `shop_name`, `shop_address`, `shop_phone`, `shop_lat`, `shop_long`) VALUES
(1, 'SUNIL MEDICAL STORE', 'Shop No 8, Ratanada Bazar, Ratanada Bazar, Ratanada, Jodhpur, Rajasthan 342001', '291', '24.5854', '73.7125'),
(2, 'Anand Medical Store', '11, Ratanada Bazar, Ratanada Bazar, Subhash Chowk, Ratanada, Jodhpur, Rajasthan 342011', '291', '73.0161', '26.2845'),
(3, 'Bhandari Medical And Provision Store', 'High Ct Rd, Near Coffee House,Near Chandra Vilas Namkeen,Nayi Sadak, Sri Ganganagar, Jodhpur, Rajasthan 342001', '093528 01155', '26.288593', '73.026465'),
(4, 'Pali', '', '', '25.7711', '73.3234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
 ADD PRIMARY KEY (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
