-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 07:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(6) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `country` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `country`, `contact`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'America', '1234567891');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Computer Science'),
(2, 'Mathematics'),
(3, 'Physics'),
(4, 'Chemistry'),
(5, 'Business'),
(6, 'Botany'),
(8, 'Geology'),
(12, 'Accounts'),
(13, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(6) NOT NULL,
  `post_id` int(6) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `name`, `email`, `comment`) VALUES
(1, 2, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 'Well Done.'),
(2, 2, 'user', 'user@gmail.com', 'hello World'),
(3, 3, 'user', 'user@gmail.com', 'Very Good!'),
(4, 5, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 'Good'),
(5, 6, 'Kshitiz Varshney', 'varshneykshitiz123@gmail.com', 'Well Done Kshitiz Varshney.\r\nKeep it up and keep Posting such material.'),
(6, 6, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 'Comment by Hardik'),
(7, 7, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 'Good post.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(6) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `instution` varchar(60) NOT NULL,
  `country` text NOT NULL,
  `title` varchar(60) NOT NULL,
  `short_desc` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_name`, `user_email`, `user_contact`, `instution`, `country`, `title`, `short_desc`, `category`, `content`, `date`) VALUES
(1, 'user', 'user@gmail.com', 1234567891, 'Aligarh', 'India', 'Brain', '', 'Biology', '<p>Brain is the C.P.U. of human body. Full form of C.P.U. is Central Processing Unit.</p>\r\n', '2021-02-25 07:20:23'),
(3, 'user', 'user@gmail.com', 1234567891, 'Aligarh', 'India', 'Invention of Zero', '', 'Mathematics', '<p>Zero was Invented by Aryabhatta. He was an Indian.</p>\r\n', '2021-03-02 05:51:21'),
(4, 'user', 'user@gmail.com', 1234567891, 'Aligarh', 'India', 'Carbon', '', 'Chemistry', '<p>There are 3 alotropes of carbon.</p>\r\n', '2021-03-02 06:01:29'),
(5, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 2147483647, 'AMU', 'India', 'Laws of Motion', '', 'Physics', '<p>There are 3 Laws of motion.</p>\r\n', '2021-03-04 03:10:38'),
(6, 'Kshitiz Varshney', 'varshneykshitiz123@gmail.com', 2147483647, 'Assisi Convent School', 'India', 'Viscosity', '', 'Physics', '<ul>\r\n	<li>It is an opposing force which come in to play when an fluid is flowing over a surface.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-31 04:04:23'),
(7, 'user', 'user@gmail.com', 2147483647, 'Aligarh Muslim University', 'India', 'Abacus', '', 'Computer Science', '<p>Abacus is used for performing mathematical calculations.</p>\r\n', '2021-04-01 07:01:27'),
(8, 'user', 'user@gmail.com', 2147483647, 'Aligarh Muslim University', 'India', 'Github', 'GitHub, Inc. is a provider of Internet hosting for software development and version control using Git.', 'Computer Science', '<p>GitHub offers its basic services free of charge. Its more advanced professional and enterprise services are commercial.&nbsp;Free GitHub accounts are commonly used to host&nbsp;<a href=\"https://en.wikipedia.org/wiki/Open-source\">open-source</a>&nbsp;projects.&nbsp;As of January 2019, GitHub offers unlimited private&nbsp;<a href=\"https://en.wikipedia.org/wiki/Repository_(version_control)\">repositories</a>&nbsp;to all plans, including free accounts, but allowed only up to three collaborators per repository for free.&nbsp;Starting from April 15, 2020, the free plan allows unlimited collaborators, but restricts private repositories to 2,000 minutes of GitHub Actions&nbsp;per month.&nbsp;As of January 2020, GitHub reports having over 40&nbsp;million users&nbsp;and more than 190&nbsp;million&nbsp;<a href=\"https://en.wikipedia.org/wiki/Repository_(version_control)\">repositories</a>&nbsp;(including at least 28&nbsp;million public repositories),&nbsp;making it the largest host of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Source_code\">source code</a>&nbsp;in the world.</p>\r\n', '2021-04-01 07:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `instution` varchar(100) NOT NULL,
  `country` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `name`, `email`, `instution`, `country`, `password`, `contact`) VALUES
(1, 13899, 'user', 'user@gmail.com', 'Aligarh Muslim University', 'India', 'user', '09458804481'),
(2, 76688, 'Hardik Varshney', 'varshneyhardik98@gmail.com', 'Delhi University', 'India', 'hardik', '09458804481');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
