-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 11:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `ImageURL` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `text`, `ImageURL`, `userid`) VALUES
(1, 'asdasdads', '', 0),
(2, 'wwwwwwwwwwwwwwww', '', 0),
(3, 'asdasdasdasdsad', '', 0),
(4, 'asdasdasdasdsad', '', 0),
(5, 'asdasdasdasdsad', '', 0),
(6, 'asdasdasdasdsad', '', 0),
(7, 'Test Darwin', '', 0),
(11, 'Hello World', '', 0),
(12, 'Hello World', '', 0),
(13, 'Hello World', '', 0),
(14, 'Hello World', '', 0),
(15, 'HEY!', '', 0),
(16, 'wow!', '', 0),
(17, 'test', '', 0),
(18, 'test123123', '', 0),
(19, 'jhjgjvj', '', 0),
(20, 'jhjgjvj', '', 0),
(21, 'test123', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `userid`) VALUES
(1, 'First Post', 0),
(2, 'Second Posts', 0),
(3, 'asdasdasdasd', 0),
(4, 'dddddddddddddd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES
(2, 'asdsad', '$2y$10$MyQU4xIJ6b3B4R9lb1EAweYjnqLY57NaPSD9YZ9IpPrhiHbvbZWOC', 0),
(3, 'darwin1234', '$2y$10$hEw4Ya5QmV1O4edoho/oa.oub.7uZyWiabDaJEIM/K8MBKjn139m.', 1),
(4, 'vanhalen', '$2y$10$4KerCmvfbfkt4k.YpAXun.ydATBLziIzO4uDsKFmqMDjGbYhmWfwu', 0),
(5, 'test123', '$2y$10$HeJeypg2s07vX83XjwgRher4C1AmsGsEC7gNi04AZXdOhragJZ9Ka', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
