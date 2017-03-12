-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2017 at 12:31 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaguars`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `last_update`) VALUES
(31, 'yeesaa', '2017-03-05 18:23:35', '2017-03-07 17:59:27'),
(32, 'asdaku', '2017-03-08 21:54:28', '2017-03-11 18:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edit_by` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `thread_id`, `body`, `created_at`, `last_update`, `edit_by`) VALUES
(2, 11, 17, 'test edit again tesasda ', '2017-03-12 10:22:03', '2017-03-12 10:28:43', 'Admin | admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `locked`, `category_id`, `created_at`, `last_update`) VALUES
(15, 'testaaaa', 0, 32, '2017-03-11 18:46:54', '2017-03-12 08:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0',
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sticky` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edit_by` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `description`, `locked`, `forum_id`, `user_id`, `sticky`, `created_at`, `last_update`, `edit_by`) VALUES
(13, 'ey', 'hadas', 0, 15, 8, 0, '2017-03-11 18:48:26', NULL, NULL),
(14, 'updateaaaa', 'asda', 0, 15, 2, 0, '2017-03-11 18:54:00', '2017-03-12 08:36:02', 'Admin | hassan@gmail.com'),
(17, 'test post', 'test post', 0, 15, 9, 0, '2017-03-11 21:33:04', '2017-03-12 10:21:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `signature` text NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fname`, `lname`, `gender`, `country`, `banned`, `image`, `signature`, `role`, `created_at`, `last_update`) VALUES
(2, 'root1222222', 'root1', 'root1', 'root1', 'male', 'egypt', 0, 'assets/img/14891021801.jpg', 'root1', 'user', '2017-03-08 18:46:09', '2017-03-11 20:10:04'),
(3, 'root22', 'root', 'asdasd', 'asdasd', 'male', 'egypt', 0, '', 'asdasd', 'admin', '2017-03-08 18:46:46', '2017-03-11 21:19:15'),
(4, 'rootasdsa', 'asad', 'asdasd', 'asdasd', 'male', 'egypt', 0, '', '', 'user', '2017-03-08 18:47:36', '2017-03-11 21:32:14'),
(7, 'hassanmamin994@gmail.com', '8d6eb54ba0d73717b61b9926c74edf05', 'hassan', 'amin', 'male', 'Egypt', 0, 'assets/img/1489183875Screenshot from 2017-03-10 21-25-39.png', 'test again', 'user', '2017-03-10 22:11:15', '2017-03-11 19:41:06'),
(8, 'hassan@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 'hassan', 'aminaaa', 'female', 'usa', 0, '', 'asdasda', 'admin', '2017-03-11 18:13:33', '2017-03-11 20:50:03'),
(9, 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'male', 'Egypt', 0, 'assets/uploads/test@test.com', 'sig', 'user', '2017-03-11 21:23:48', '2017-03-11 21:27:31'),
(10, 'testt@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'testtt', 'testta', 'male', 'Egypt', 0, 'assets/uploads/testt@gmail.com', 'sig', 'admin', '2017-03-12 07:52:14', '2017-03-12 09:50:54'),
(11, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'root', 'root', 'male', 'Egypt', 0, '', '', 'admin', '2017-03-12 09:53:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
