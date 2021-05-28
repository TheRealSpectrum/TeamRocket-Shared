-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 09:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`) VALUES
(48, '9', '2021-05-20 14:59:21', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(49, '10', '2021-05-20 14:59:50', 'Prepare for trouble!\r\nAnd make it double!\r\nTo protect the world from devastation!\r\nTo unite all peoples within our nation!\r\nTo denounce the evils of truth and love!\r\nTo extend our reach to the stars above!\r\nJessie!\r\nJames!\r\nTeam Rocket blasts off at the speed of light!\r\nSurrender now, or prepare to fight!');

-- --------------------------------------------------------

--
-- Table structure for table `memes`
--

CREATE TABLE `memes` (
  `id` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `likecount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memes`
--

INSERT INTO `memes` (`id`, `uid`, `link`, `date`, `likecount`) VALUES
(30, '10', 'https://media.giphy.com/media/129OnZ9Qn2i0Ew/giphy.gif', '2021-05-20 15:52:45', 3),
(31, '10', 'https://assets3.thrillist.com/v1/image/2625866/1584x3000/scale;jpeg_quality=60.jpg', '2021-05-20 15:53:21', 1),
(34, '10', 'https://assets3.thrillist.com/v1/image/2617098/1584x3000/scale;jpeg_quality=60.jpg', '2021-05-20 15:55:05', 0),
(35, '10', 'https://assets3.thrillist.com/v1/image/2625879/1584x3000/scale;jpeg_quality=60.jpg', '2021-05-20 15:56:46', 0),
(36, '10', 'https://assets3.thrillist.com/v1/image/2616270/1584x3000/scale;jpeg_quality=60.jpg', '2021-05-20 15:57:17', 1),
(37, '10', 'https://assets3.thrillist.com/v1/image/2625888/1584x3000/scale;jpeg_quality=60.jpg', '2021-05-20 15:57:51', 0),
(49, '9', 'https://i.kym-cdn.com/entries/icons/original/000/000/143/493654d6ef.jpg', '2021-05-27 16:05:59', 0),
(50, '9', 'https://i.kym-cdn.com/entries/icons/original/000/000/143/493654d6ef.jpg', '2021-05-27 16:07:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(9, 'Matthew Wildhagen', 'mwildhagen@hotmail.com', 'Matt', '$2y$10$LLopRpUPTGbNfDktBtAHmegj1KXUkSDS7wW.K6UxbUfou/2J33/2u'),
(10, 'Jesse James', 'JJ@gmail.com', 'Jesse', '$2y$10$SfM2lVXS6j3kA8pqCXdzIutX.appaWmxzglFsNKXuYTJAFjs2/JHa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `memes`
--
ALTER TABLE `memes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `memes`
--
ALTER TABLE `memes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
