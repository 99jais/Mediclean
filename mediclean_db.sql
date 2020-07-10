-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 12:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediclean`
--

-- --------------------------------------------------------

--
-- Table structure for table `mediclean_db`
--

CREATE TABLE `mediclean_db` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `covid_19` varchar(100) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `textt` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediclean_db`
--

INSERT INTO `mediclean_db` (`id`, `uname`, `email`, `address_line1`, `address_line2`, `city`, `pincode`, `phone_number`, `place`, `covid_19`, `other`, `textt`) VALUES
(3, 'pulkit', 'pulkit@gmail.com', 'goribari', 'howrah', 'kolkata', '707432', '8756437657', 'Lab', NULL, 'Other_medical_waste', 'Masks and Gloves'),
(5, 'aman', 'aman@gmail.com', 'cap camp', 'saltlake', 'kolkata', '700434', '3847938247', 'Hospital', NULL, 'Other_medical_waste', 'needles - 700, syringes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mediclean_db`
--
ALTER TABLE `mediclean_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mediclean_db`
--
ALTER TABLE `mediclean_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
