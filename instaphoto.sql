-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2018 at 01:54 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instaphoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `media` text NOT NULL,
  `img` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `username`, `media`, `img`) VALUES
(1, 'nick', '../assets/uploads/posts/img/photo.jpeg', 1),
(2, 'nick', '../assets/uploads/posts/img/photo.jpeg', 1),
(3, 'mary', '../assets/uploads/posts/vid/1.mp4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

CREATE TABLE `posts_comments` (
  `pid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` varchar(120) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_comments`
--

INSERT INTO `posts_comments` (`pid`, `username`, `comment`, `post_date`) VALUES
(1, 'nick', 'This is a beautiful place!', '2018-02-06 01:53:32'),
(2, 'nick', 'Hello. This comment is posted first', '2018-02-06 01:41:05'),
(2, 'nick', 'This comment is posted second', '2018-02-06 01:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE `posts_likes` (
  `pid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_likes`
--

INSERT INTO `posts_likes` (`pid`, `username`, `liked`) VALUES
(1, 'nick', 1),
(2, 'nick', 0),
(3, 'nick', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `profile_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `profile_img`) VALUES
('mary', '$2y$10$OXOhR3Q8S5XfhdRs2E3UDODb5vcJnVGBeS46udAgKONLoLEG99RwO', 'mary@essex.ac.uk', ''),
('nick', '$2y$10$T2HoGFzv9F/43sLCia1KKeCzxyXPnoFro9oqmz4.xhj.TcX8LSQIe', 'nick@nick.com', '../assets/uploads/profile/1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `posts_comments`
--
ALTER TABLE `posts_comments`
  ADD PRIMARY KEY (`pid`,`username`,`comment`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`pid`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `posts_comments`
--
ALTER TABLE `posts_comments`
  ADD CONSTRAINT `posts_comments_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_comments_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD CONSTRAINT `posts_likes_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `posts` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_likes_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
