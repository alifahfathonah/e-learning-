-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 12:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResestId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResestId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(31, 'nicolasmahlangu75@gmail.com', '5f492c44d62a3d34', '$2y$10$elEHdWbd.UDTA2RFmaCuoeGzhPl7D87tlzhmTi10wYVkQ9.KWxtjO', '1612365036'),
(38, 'nicolasmahlangu6@gmail.com', 'd30cec2473268cfa', '$2y$10$/d6OjlLcILTStwUGc0JJB.H4q1/fiJZYBXB8QCKZArYRFWZnUYb3.', '1612380298'),
(43, 'ashoktut.2@gmail.com', '4bd9867bae0859e9', '$2y$10$jUZfstxqN20gewkr3fdh6ODPdm3Gq9OjrQ5GxSCibgJ0LoxhneztC', '1612553793');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email_address`, `user_pass`) VALUES
(1, 'jyjytyjy', 'tghfghg@fdhg.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'student', 'student@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'me2', 'student1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Sello', 'sello@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'poppy', 'poppy@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 'nicholas', 'nicolasmahlangu75@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'nick', 'nicolasmahlangu6@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'me', 'me@gmail.com', '186bca7826f8aeb9aa3eb12928329389'),
(9, 'testing', 'ashoktut.2@gmail.com', '$2y$10$5tPGtuxZyBKJfO5bsQqd7.xSm85SOTGv.4MXNE0KldZrvh0QS9kv2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResestId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
