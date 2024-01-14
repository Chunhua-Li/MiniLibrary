-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------
USE assignment2;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `phoneNumber`, `emailAddress`, `password`) VALUES
(1, 'John', '(438) 123-2345', 'john@gmail.com', '123456ab'),
(2, 'Marry', '(438) 123-2167', 'marry@gmail.com', '098789Sc'),
(3, 'Peter', '(438) 123-0789', 'peter@gmail.com', 'Ae231678'),
(4, 'Steven', '(514) 123-2367', 'steven@gmail.com', 'Q129807b'),
(5, 'Mark', '(218) 123-2345', 'mark@gmail.com', 'A768093c'),
(6, 'Danie', '(432) 163-7345', 'danie@gmail.com', '678ertCB'),
(7, 'Adams', '(438) 123-2305', 'adams@gmail.com', 'asd8651B'),
(9, 'Pan', '(438) 123-4532', 'pan@gmail.com', 'as78967H'),
(10, 'Carlos', '(438) 123-2678', 'carlos@gmail.com', 'alskdf1C'),
(12, 'Albert', '306-2039843', 'xiaolin.wu@gmail.com', '22222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
