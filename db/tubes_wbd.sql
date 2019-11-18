-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2019 at 03:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_wbd`
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
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT 3.00,
  `genre` varchar(255) DEFAULT NULL,
  `length` int(11) NOT NULL DEFAULT 120,
  `release_date` date NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 35000
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
(10, 'Avengers: End Game', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8.00', 'Drama, Fantasy, Adventure', 187, '1999-10-04', '1.jpeg', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `film_id`, `user_id`, `comment`, `rating`) VALUES
(1, 1, 1, 'Great, cool, woowwowow soo goood so badd woow waa', '6.25'),
(2, 3, 1, 'eatettxtyfx', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `showtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `film_id`, `showtime`) VALUES
(1, 1, '2007-01-01 00:00:00'),
(2, 1, '2019-01-01 12:30:00'),
(3, 1, '2020-01-01 23:40:00'),
(4, 1, '2021-01-01 00:01:00'),
(5, 2, '2019-09-01 00:00:00'),
(6, 3, '2019-09-03 00:00:00'),
(7, 4, '2019-09-29 00:00:00'),
(8, 5, '2019-12-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT 0,
  `seat_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `schedule_id`, `occupied`, `seat_number`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 10),
(4, 2, 1, 2),
(5, 3, 1, 2),
(6, 1, 0, 11),
(7, 2, 1, 30),
(8, 2, 1, 10);

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
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `seat_id`, `schedule_id`, `status`) VALUES
(1, 1, 1, 4, 0),
(2, 1, 1, 5, 0),
(3, 1, 1, 6, 1),
(4, 1, 1, 7, 1);

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
(26, 'admin', '$2y$10$54FZ88342PSxku66sC/MOOnzKAupMokgWzd3Om6WsVcR7yy0YZBhq', 'admin@engima.com', '+6281319770771', NULL, 0x5265736f7572636520696420233130, 'image/jpeg'),
(27, 'abda', '$2y$10$ttmWuOpL06ceEfw05JYMAe7wSA4YWQbCo/tPfGKEv.Jvil.iQHBme', 'abdashaffan@gmail.com', '+6281319770772', NULL, 0x5265736f7572636520696420233131, 'image/png'),
(28, 'rika', '$2y$10$EWiADXghxnvIi2gDAY5vDu6ehNUEd8Zq4JLv1nuYAt6sdzGRoY97a', 'rika@admin.com', '081333333333', '8fa5d4c1dfe4265591d75302a340501310fec8c27cc3a1d995972ea73d31b2b0', 0x5265736f7572636520696420233130, 'image/png'),
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tes`  AS  select `schedule`.`schedule_id` AS `schedule_id`,`schedule`.`film_id` AS `film_id`,`schedule`.`showtime` AS `showtime` from `schedule` where `schedule`.`film_id` = 1 ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

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
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
