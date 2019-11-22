-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2019 at 02:15 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Stand-in structure for view `count_seat`
-- (See below for the actual view)
--
CREATE TABLE `count_seat` (
`schedule_id` int(11)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_set`
-- (See below for the actual view)
--
CREATE TABLE `count_set` (
`schedule_id` int(11)
,`count(*)` bigint(21)
);

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
(9, 330457, '2019-11-21 13:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT '0',
  `seat_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `schedule_id`, `occupied`, `seat_number`) VALUES
(7, 9, 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tes`
-- (See below for the actual view)
--
CREATE TABLE `tes` (
`schedule_id` int(11)
,`film_id` int(11)
,`showtime` datetime
);

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
(27, 'abda', '$2y$10$ttmWuOpL06ceEfw05JYMAe7wSA4YWQbCo/tPfGKEv.Jvil.iQHBme', 'abdashaffan@gmail.com', '+6281319770772', '4c4b4c6993873029ae124f19f52b81c7640f17e1544aa6103e3017f2c8782a70', 0x5265736f7572636520696420233131, 'image/png');

-- --------------------------------------------------------

--
-- Structure for view `count_seat`
--
DROP TABLE IF EXISTS `count_seat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_seat`  AS  select `seats`.`schedule_id` AS `schedule_id`,count(0) AS `count` from `seats` group by `seats`.`schedule_id` ;

-- --------------------------------------------------------

--
-- Structure for view `count_set`
--
DROP TABLE IF EXISTS `count_set`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_set`  AS  select `seats`.`schedule_id` AS `schedule_id`,count(0) AS `count(*)` from `seats` group by `seats`.`schedule_id` ;

-- --------------------------------------------------------

--
-- Structure for view `tes`
--
DROP TABLE IF EXISTS `tes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tes`  AS  select `schedule`.`schedule_id` AS `schedule_id`,`schedule`.`film_id` AS `film_id`,`schedule`.`showtime` AS `showtime` from `schedule` where (`schedule`.`film_id` = 1) ;

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
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
