-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2019 at 07:34 AM
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
-- Table structure for table `booked_seats`
--

CREATE TABLE `booked_seats` (
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_seat`
-- (See below for the actual view)
--
CREATE TABLE `count_seat` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_set`
-- (See below for the actual view)
--
CREATE TABLE `count_set` (
);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sinopsis` text,
  `rating` decimal(10,2) NOT NULL DEFAULT '3.00',
  `genre` varchar(255) DEFAULT NULL,
  `length` int(11) NOT NULL DEFAULT '120',
  `release_date` date NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '35000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `title`, `sinopsis`, `rating`, `genre`, `length`, `release_date`, `thumbnail`, `price`) VALUES
(1, 'Avengers: End Game', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '9.25', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '1.jpeg', 20000),
(2, 'My Lucky Day', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '7.50', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '2.jpg', 20000),
(3, 'Abda Shaffan Diva', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2.10', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '3.jpg', 20000),
(4, 'Amateur Radio Club', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.75', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '4.jpg', 20000),
(5, 'Naruto Shippuden', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1.00', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '1.jpeg', 20000),
(6, 'Kimi no nawa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4.00', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '2.jpg', 20000),
(7, 'Bleach', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.00', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '4.jpg', 20000),
(8, 'Boku Dake Ga Inai Machi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.00', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '1.jpeg', 20000),
(9, 'Weathering with you', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.00', 'Drama, Fantasy, Adventure', 1, '1999-10-04', '1.jpeg', 20000),
(10, 'Avengers: End Game', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.00', 'Drama, Fantasy, Adventure', 187, '1999-10-04', '1.jpeg', 20000),
(11, 'The Greatest Showman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Vel risus commodo viverra maecenas accumsan lacus vel facilisis.', '5.00', 'Horror', 120, '2019-11-30', '5.jpg', 35000),
(12, 'Dora and the Lost City of Gold', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut tristique et egestas quis. Cursus vitae congue mauris rhoncus.\r\n\r\n', '3.50', 'Comedy', 120, '2019-11-30', 'dora.jpg', 35000),
(13, 'Aladdin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut tristique et egestas quis. Cursus vitae congue mauris rhoncus.\r\n\r\n', '3.00', 'Adventure', 120, '2019-11-30', 'aladdin.jpg', 35000),
(14, 'Charlies\' Angles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut tristique et egestas quis. Cursus vitae congue mauris rhoncus.', '3.15', 'Adventure', 120, '2019-11-30', 'ca.jpeg', 35000),
(15, 'Crazy Rich Asian', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut tristique et egestas quis. Cursus vitae congue mauris rhoncus.', '3.00', 'Romance', 120, '2019-11-30', 'cra.jpg', 35000);

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
(1, 1, '2020-01-01 00:00:00'),
(2, 1, '2020-01-02 12:30:00'),
(3, 1, '2020-01-03 23:40:00'),
(4, 1, '2021-01-08 00:01:00'),
(5, 2, '2020-09-01 00:00:00'),
(6, 3, '2020-09-03 00:00:00'),
(7, 4, '2020-09-29 00:00:00'),
(8, 5, '2020-12-12 00:00:00'),
(9, 0, '2019-11-19 07:54:29'),
(10, 11, '2019-11-30 00:00:00');

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
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(26, 'admin', '$2y$10$54FZ88342PSxku66sC/MOOnzKAupMokgWzd3Om6WsVcR7yy0YZBhq', 'admin@engima.com', '+6281319770771', '517b148e67ca2276afcd6ea3c1941784209065c8c930379d1c5e63445181f44f', 0x5265736f7572636520696420233130, 'image/jpeg'),
(27, 'abda', '$2y$10$ttmWuOpL06ceEfw05JYMAe7wSA4YWQbCo/tPfGKEv.Jvil.iQHBme', 'abdashaffan@gmail.com', '+6281319770772', NULL, 0x5265736f7572636520696420233131, 'image/png'),
(28, 'rika', '$2y$10$EWiADXghxnvIi2gDAY5vDu6ehNUEd8Zq4JLv1nuYAt6sdzGRoY97a', 'rika@admin.com', '081333333333', NULL, 0x5265736f7572636520696420233130, 'image/png'),
(29, 'seldy', '$2y$10$iNbLjRWFVWlQZh/W4uN7WOBThKu4fE6rm7GtZz9EW8ku5sqK7jMSC', 'seldy@admin.com', '+6281311111113', NULL, 0x5265736f7572636520696420233130, 'image/png');

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
-- Indexes for table `booked_seats`
--
ALTER TABLE `booked_seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`);

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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_seats`
--
ALTER TABLE `booked_seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
