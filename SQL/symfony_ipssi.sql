-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 09:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony_ipssi`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`) VALUES
(1, 'Article numero 455', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nisl mi, malesuada eu facilisis in, tempor vitae neque. Quisque consequat in diam non porttitor. Nulla facilisi. Phasellus tempus lectus luctus dui placerat gravida. Praesent nec arcu non erat feugiat gravida. Fusce dictum consectetur consectetur. Phasellus mattis commodo enim sed rutrum. Quisque semper viverra quam in bibendum. Phasellus dignissim, est quis ullamcorper finibus, nulla neque sagittis diam, ac scelerisque ipsum lectus in lectus. Pellentesque luctus placerat dolor sed condimentum. Etiam non vestibulum mi, sed tincidunt ante. Donec feugiat pretium laoreet. Integer urna ipsum, laoreet vitae tellus et, semper accumsan justo.'),
(2, 'Article numero 2', 'Maecenas lobortis elit eget nulla molestie, quis aliquam lectus interdum. Sed quam sapien, varius eget tempus ut, aliquet vel ante. Etiam imperdiet varius volutpat. Quisque vel lacus egestas, pharetra sapien vel, tincidunt nisl. Mauris at nunc at justo tincidunt commodo. Aliquam quis lacinia sapien, nec cursus mi. Donec aliquet vel mauris sed lobortis. Phasellus mattis vulputate diam sit amet fermentum. Sed ac dui sit amet libero lacinia tristique sit amet sed erat. Phasellus euismod eros vel est sollicitudin, eget placerat metus dictum. Nam venenatis ac diam pretium ultrices. Duis viverra, massa id elementum pulvinar, quam dolor faucibus ligula, at ornare erat ipsum non mauris.');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'test@test.com', '[\"ROLE_USER\"]', '$2y$13$WlTdhbYh4IWqF/xtySq8bOuuoRee5bg4clcYrrgz/BLduOzWY6yJO'),
(2, 'user@test.com', '[]', '$2y$13$aTOMWgtKJdtlnb74Be724eGoI9Ri9cqNNEHM04Xdev.xOAM4iJYvm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
