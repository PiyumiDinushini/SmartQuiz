-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 09:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinequiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'main', 'admin', 'mainadmin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `statement` varchar(1000) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `statement`, `option1`, `option2`, `option3`, `option4`, `option5`, `answer`) VALUES
(1, 'Which of the following is not true?', 'A server side scripting language', 'Use # to make a multi-line comment', 'Use define () function to create constants', 'Variable name start with a dollar ($) sign', 'Dot (.) used to concatenate ', 'Use # to make a multi-line comment'),
(2, 'Which environment variable use to identify clients browser and platform?', 'preg_match', '$_REQUEST', 'var_dump', 'getenv', 'HTTP_USER_AGENT ', 'HTTP_USER_AGENT '),
(3, 'Which is incorrect on php session?', 'Store user information to be used across multiple pages', 'A session is started with the session_start() function', 'A PHP session can be destroyed by session_destroy() function', 'The session_start() function can be anywhere  in your document', 'Set with the PHP global variable: $_SESSION', 'The session_start() function can be anywhere  in your document'),
(4, 'Which returns the name and path of the current file?', '$_PHP_SELF', 'header()', 'getenv', '$_REQUEST', 'var_dump()', '$_PHP_SELF'),
(5, '$_REQUEST is', 'Used to send information to the web server by the client', 'Used to check existence of string patterns in a string', 'Used to get information sent using both the GET and POST Method', 'Used to generate random numbers within given range', 'Used to access the value of any environment variable', 'Used to get information sent using both the GET and POST Method');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'saman', 'rathnayaka', 'saman@gmail.com', '2df806ae8cc8cc3cfc72edeb05436a162b248e9d'),
(2, 'selin', 'andrew', 'selin@gmail.com', '6b42b2eee99ff0d0a4d8e73fb658c61daa51ccbf'),
(3, 'sam', 'rathnayaka', 'sam@gmail.com', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
