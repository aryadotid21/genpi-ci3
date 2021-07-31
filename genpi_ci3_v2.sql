-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2021 at 06:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genpi_ci3_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(5) UNSIGNED NOT NULL,
  `follower_id` int(100) NOT NULL,
  `following_id` int(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(10, 17, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(17, 'aryadotid21@gmail.com', '$2y$10$J.krONpkWFFN0jnIjHET1O3dgXX9quH2bW0rtx1ZrXty8kyg3cPkG', 'Muhammad Arya Dyas', 'Laboriosam esse ea', 'xW4JeSZHahjiFVEB.JPG', '2021-07-31 20:36:34', '2021-07-31 20:36:34'),
(18, 'tycexamu@mailinator.com', '$2y$10$pGQE4MrJJ5WD2Y6jprkVQOnHyKaCDoPr3rCtbMXDGD2pV7RL6g.TW', 'Samantha Lopez', 'Est illo omnis a qui', 'd5qSTs3gxnmzahc7.jpg', '2021-07-31 20:53:20', '2021-07-31 20:53:20'),
(19, 'musykifep@mailinator.com', '$2y$10$BBfiSFfRnvNF8IUGnWzypusnFzJZ1lafIbZM.H65VSUvdxXx.m1am', 'Dylan Case', 'Sit exercitationem a', 'XYrwi4CGtWyNkmMd.png', '2021-07-31 20:53:31', '2021-07-31 20:53:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
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
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
