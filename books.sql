-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

CREATE DATABASE IF NOT EXISTS assignment2;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON assignment2.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE assignment2;

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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `publisher`, `description`, `userid`) VALUES
(1, 'The Shadow of the Wind', 'Carlos Ruiz Zafon', 'Mystery', 'Penguin Books', 'Historical Fiction', 1),
(2, 'To Kill A Mockingbird', 'Harper Lee', 'Fiction', 'J.B. Lippincott&Co.', 'Legal Drama', 1),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic Literature', 'Charles Scribner Sons', 'Jazz Age', 1),
(4, 'The Hitchhiker Guide to the Galaxy', 'Douglas Adams', 'Science Fiction', 'Pan Books', 'Humorous Science Fic', 1),
(5, '1984', 'George Orwell', 'Dystopian Fiction', 'Secher & Warburg', 'Political Science Fi', 1),
(7, 'The Da Vinci Code', 'Dan Brown', 'Mystery', 'Doubleday', 'Art Cryptography', 1),
(8, 'The Catcer in the Rye', 'J.D. Salinger', 'Coming-of-Age Fictio', 'Little, Brown and Company', 'Teenage Angst', 12),
(9, 'Harry Potter and the Philosopher Stone', 'J.K Rowling', 'Fantasy', 'Bloomsbury', 'Wizardry Magic', 12),
(10, 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', 'George Allen & Unwin', 'Epic Fantasy', 12),
(20, 'When the Snow Is Deeper Than My Boots Are Tall', 'Jean Reidy', 'Advice & Inspiration', 'Scholastic Canada', 'Find a frosty window.\r\nWatch the flakes fall.\r\nLook! The snow is deeper than my toes are tall.', 1),
(23, 'What If...', 'Samantha Berger', 'Advice & Inspiration', 'Scholastic Canada', 'This girl is determined to express herself! If she can\'t draw her dreams, she\'ll sculpt or build, carve or collage. If she can\'t do that, she\'ll turn her world into a canvas. And if everything around her is taken away, she\'ll sing, dance, and dream...', 1),
(29, 'Pete the Cat Saves Christmas', 'Eric Litwin', 'Humour & Funny Stori', 'Scholastic Canada', 'In this fun Christmas tale with a hilarious twist, Santa gets sick and calls on this groovy cat to fill in and save the day.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
