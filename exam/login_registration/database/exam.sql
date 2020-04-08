-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 02:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `birthdate`, `date_created`, `date_updated`) VALUES
(2, 'mj.remetio001@gmail.com', 'a1Bz20ydqelm8m1wql4297f44b13955235245b2497399d7a93', 'mark joseph remetio', '10/11/1998', '2020-04-08 11:10:59', '2020-04-08 11:10:59'),
(3, 'mj@gmail.com', 'a1Bz20ydqelm8m1wql4297f44b13955235245b2497399d7a93', 'mark ', '10/11/1998', '2020-04-08 11:25:56', '2020-04-08 11:25:56'),
(4, 'm@gmail.com', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'asd', '123', '2020-04-08 11:27:09', '2020-04-08 11:27:09'),
(5, 'asdasd', 'a1Bz20ydqelm8m1wqla8f5f167f44f4964e6c998dee827110c', 'asdasd', 'asdasd', '2020-04-08 11:32:04', '2020-04-08 11:32:04'),
(6, 'fasdas', 'a1Bz20ydqelm8m1wql4297f44b13955235245b2497399d7a93', 'zzz', 'asdasd', '2020-04-08 12:10:19', '2020-04-08 12:10:19'),
(7, 'mjoseph@gmail.com', 'a1Bz20ydqelm8m1wql4297f44b13955235245b2497399d7a93', 'mjoseph', '10/11/1998', '2020-04-08 12:31:35', '2020-04-08 12:31:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
