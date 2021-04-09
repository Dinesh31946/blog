-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 10:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_description` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_on` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `title_description`, `description`, `thumbnail`, `added_by`, `added_on`, `is_active`, `is_delete`) VALUES
(1, 'BEST LAPTOP IN 2021', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'bg3.jpg', 'admin', '2021-04-08', 1, 0),
(2, 'BEST LAPTOP IN 2020', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'inspiration1.jpg', 'admin', '2021-04-08', 1, 0),
(3, 'BEST LAPTOP IN 2021', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board. The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'bg4.jpg', 'admin', '2021-04-09', 1, 0),
(4, 'BEST LAPTOP IN 2020', 'Title Description', 'admin Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board. The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'about-us.png', 'admin', '2021-04-10', 1, 0),
(5, 'BEST LAPTOP IN 2021', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board. The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'inspiration2.jpg', 'admin', '2021-04-11', 1, 0),
(6, 'BEST LAPTOP IN 2021', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board. The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'inspiration3.jpg', 'admin', '2021-04-12', 1, 0),
(7, 'BEST LAPTOP IN 2021', 'Title Description', 'Generally, Dell computers are some of the best available and are considered to be better than HP. Though HP have some great laptops, across their whole range there are many that can\'t compete with other brands. Whereas Dell have a pretty great range of laptops across the board. The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.\r\n\r\nThe Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.', 'inspiration4.jpg', 'admin', '2021-04-13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `role`, `is_active`, `is_delete`) VALUES
(1, 'admin', 'admin', 'super_admin', 1, 0),
(2, 'guest_admin', 'guest_admin', 'guest_admin', 1, 0),
(3, 'Dinesh Gosavi', '123456', 'super_admin', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
