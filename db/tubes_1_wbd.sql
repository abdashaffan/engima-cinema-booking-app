-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2019 at 12:29 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_wbd_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `rating` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `film_id`, `user_id`, `comment`, `rating`) VALUES
(1, 1, 1, 'Great, cool, woowwowow soo goood so badd woow waa', '6.25'),
(2, 3, 1, 'eatettxtyfx', '6.00'),
(3, 2, 27, 'yha', '6.50');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `showtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `film_id`, `showtime`) VALUES
(38, 501907, '2019-11-22 21:00:00'),
(39, 501907, '2019-11-23 11:00:00'),
(40, 501907, '2019-11-24 17:00:00'),
(41, 501907, '2019-11-25 19:00:00'),
(42, 501907, '2019-11-26 16:00:00'),
(43, 501907, '2019-11-27 13:00:00'),
(44, 501907, '2019-11-28 13:00:00'),
(45, 630900, '2019-11-23 10:48:42'),
(46, 630900, '2019-11-24 08:48:42'),
(47, 630900, '2019-11-25 07:48:42'),
(48, 630900, '2019-11-26 21:48:42'),
(49, 630900, '2019-11-27 09:48:42'),
(50, 630900, '2019-11-28 13:48:42'),
(51, 630900, '2019-11-29 12:48:42'),
(52, 330457, '2019-11-20 08:00:00'),
(53, 330457, '2019-11-21 20:00:00'),
(54, 330457, '2019-11-22 13:00:00'),
(55, 330457, '2019-11-23 16:00:00'),
(56, 330457, '2019-11-24 15:00:00'),
(57, 330457, '2019-11-25 20:00:00'),
(58, 330457, '2019-11-26 19:00:00'),
(59, 638806, '2019-11-23 21:00:00'),
(60, 638806, '2019-11-24 19:00:00'),
(61, 638806, '2019-11-25 19:00:00'),
(62, 638806, '2019-11-26 16:00:00'),
(63, 638806, '2019-11-27 20:00:00'),
(64, 638806, '2019-11-28 22:00:00'),
(65, 638806, '2019-11-29 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `schedule_id`, `seat_number`) VALUES
(7, 9, 1),
(11, 63, 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `login_token` varchar(255) DEFAULT NULL,
  `profile_picture` blob NOT NULL,
  `mime` varchar(255) DEFAULT '""'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone_num`, `login_token`, `profile_picture`, `mime`) VALUES
(27, 'abda', '$2y$10$ttmWuOpL06ceEfw05JYMAe7wSA4YWQbCo/tPfGKEv.Jvil.iQHBme', 'abdashaffan@gmail.com', '+6281319770772', NULL, 0x5265736f7572636520696420233131, 'image/png'),
(28, 'alamhasabie', '$2y$10$/nGAmaqgrMsvLUO5acYcYe/.wo8cQgfL9WndH9t8bLcW.pxJWAjlS', 'alamhasabie@yahoo.com', '087722679123', '8397f81780454f3ed8c738c33b955e0881a703833fcaea5bad0d89893e8bd3c8', 0x30, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
