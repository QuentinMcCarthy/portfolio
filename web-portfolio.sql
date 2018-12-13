-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 07:54 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `url` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_info`
--

CREATE TABLE `sidebar_info` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `contentid` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar_info`
--

INSERT INTO `sidebar_info` (`id`, `contentid`, `content`) VALUES
(1, 'userImage', 'default-userimage.png'),
(2, 'userName', 'Lorem Ipsum'),
(3, 'userContent', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'userGithub', ''),
(5, 'userFacebook', ''),
(6, 'userGoogle', ''),
(7, 'userBehance', ''),
(8, 'userLinkedin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, '', 'admin', '$2y$10$W5Y3LhdeqDmiS1xn7MaTfuSnoUdL13hXpxnH3kKtQKy5c.gPoaXGS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image` (`image`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `sidebar_info`
--
ALTER TABLE `sidebar_info`
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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sidebar_info`
--
ALTER TABLE `sidebar_info`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
