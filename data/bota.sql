-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2020 at 07:06 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bota`
--

-- --------------------------------------------------------

--
-- Table structure for table `bota_product`
--

CREATE TABLE IF NOT EXISTS `bota_product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bota_product`
--

INSERT INTO `bota_product` (`id`, `title`, `description`, `img`, `price`, `user_id`) VALUES
(9, 'A bac', 'this is product test', '../uploads/1598554189-baelen.jpg', '999', 1),
(11, 'B', 'Sort', '../uploads/1598554842-images.jpg', '900', 8),
(12, 'product test 1234', 'product test 1234', '../uploads/1598555036-baelen.jpg', '500', 8);

-- --------------------------------------------------------

--
-- Table structure for table `bota_user`
--

CREATE TABLE IF NOT EXISTS `bota_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bota_user`
--

INSERT INTO `bota_user` (`id`, `name`, `email`, `password`, `uid`, `role`) VALUES
(8, 'Tuyền', 'giabao1008@gmail.com', '$2y$10$wnykMSnO5sszM9fU4D9mreTazsQvwbRJujcNWH7GZsnLXC4sH6lma', NULL, 3),
(12, 'admin', 'admin@gmail.com', '$2y$10$4F46yyE1i6I2w/m1.Tbrp.7zNEfuTV9dm5myd9t4NeSVVGjyAzTsi', NULL, 3),
(14, 'tuyen', 'tuyen@gmail.com', '$2y$10$Oerz.1cB.8gE1ehpLYQuv.xUbx9QBKHGVKn7HqnFfrJb6LjxcMiFC', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bota_product`
--
ALTER TABLE `bota_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bota_user`
--
ALTER TABLE `bota_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bota_product`
--
ALTER TABLE `bota_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bota_user`
--
ALTER TABLE `bota_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
