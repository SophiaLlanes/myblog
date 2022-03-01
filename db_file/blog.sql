-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 12:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `title` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`title`, `id`, `fullname`, `nickname`, `post`, `image`) VALUES
('Me', 1, 'Sophie L', 'Sophie', 'I\'m Sophie L, and I\'m from the Laguna province. I am now pursuing a degree in Multimedia Arts. Furthermore, I am knowledgeable, capable, and self-assured. From the beginning, I\'ve learned to be extremely hardworking and dedicated to my profession. I\'ve been taught to focus on my interest since I was a child.\r<br/>I\'ve never been interested in bookish knowledge, and it\'s true that merely reading a book can\'t provide you with enough practical experience and knowledge. Training as an artist and maintaining a healthy work-life balance had finally gotten me to where I am now. I\'ve recently started a new degree in a different field of art, and I\'m determined to succeed.\r<br/>', 'bgg1.jpg'),
('People', 2, 'Sophie L', 'Sophie', 'People in my life have changed me by providing me with a vision for the future. I am only here thanks of their efforts, at the college of my dreams.\r<br/>In addition, when we talk of family, the first individuals that come to mind are our friends. Friendship\'s importance should never be overlooked. My few pals who have stuck by me through thick and thin have always had my back. My friends had always encouraged me to discover myself, even when I was in school. So, I\'d say I\'m happy with my surroundings, and I\'m grateful to God for providing me with a positive environment throughout my life.\r<br/>', 'bg2.jpg'),
('School', 3, 'Sophie L', 'Sophie', 'My school has always provided me with a complete education and has assisted me in developing my personality and skills. It shaped me into the person I am today. What I do today determines my future, and it is the strength of the present that allows me to exhibit my future. As a result, without action, a dream will remain a dream. My activity is what makes my dream come true.\r<br/>It\'s not as important to whine about what life hasn\'t given me as it is to discover what life has in store for me. God has endowed everyone with potential, and it is up to us to decide how we will use it. We weave our present into a magnificent future design.\r<br/>As a role model, the freedom warriors have always been an inspiration to me, and I have always aspired to be like them. I\'m inspired by their passion, energy, and vigor with which they overcame obstacles in their lives and made the world a better place than it is today. As a result, how we master ourselves to investigate a lovely future is in our hands, and I sincerely believe in this. \"Wishing all of my pals the best of luck.\"\r<br/>', 'bg3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$PrEd/Hj8p7HYNwwXdg0GiOX1W2CgYbAYKB76IoNmXzhCPaXrxElkK');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `hobbies` text NOT NULL,
  `interest` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `blog_id`, `fullname`, `nickname`, `date`, `hobbies`, `interest`, `comment`) VALUES
(1, 1, 'dave', 'dave', '10/10/25', 'graphic design', 'graphic design', 'amazing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
