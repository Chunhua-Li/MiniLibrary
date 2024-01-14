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

--
-- Table structure for table `reviews`
USE assignment2;


CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `bookId` int(100) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userName`, `bookId`, `review`) VALUES
(1, 'John', 1, 'It is really good.'),
(2, 'Marry', 1, 'A good novel'),
(3, 'Peter', 1, 'Boring'),
(4, 'Steven', 1, 'Not bad'),
(5, 'Mark', 2, 'Dull'),
(6, 'Danie', 2, 'Interesting'),
(7, 'Adams', 3, 'Wonderful'),
(9, 'Pan', 3, 'I like it'),
(10, 'Carlos', 3, 'Fantastic'),
(12, 'Albert', 1, 'The Shadow of the Wind is the best book I have ever read.'),
(13, 'Albert', 1, 'very good.'),
(14, 'Albert', 18, 'dshfdh'),
(15, 'Albert', 8, 'fine.'),
(16, 'Wu', 1, 'sdfs\'fdgd?'),
(17, 'Wu', 19, 'It\'s very interesting.'),
(18, 'John', 20, 'funny!'),
(19, 'John', 22, 'interesting!'),
(23, 'John', 1, 'good'),
(24, 'John', 1, 'I like it.'),
(25, 'John', 29, 'It is so funny!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
