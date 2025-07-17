-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blogger_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_on` date NOT NULL,
  `category` text NOT NULL,
  `keyword` text NOT NULL,
  `imagepath` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blogger_id`, `title`, `description`, `created_on`, `category`, `keyword`, `imagepath`, `status`) VALUES
(127, 1, 'TED Blog', '                    ED Blog is the non-profit organization’s official news space covering inspiring stories, upcoming events, and commentary on past conferences. It focuses on topics like global issues and humanity ‒ a popular platform for finding valuable insights and tips for self-improvement.  The posts are easy to read and accessible, with plenty of whitespace and clear, concise image descriptions.  Finding specific articles couldn’t be easier with the filter on the top menu bar. You can search by popularity, publication period, and relevant live events. There’s also a search bar to find a specific post or writer. Alternatively, curate the results using author tags under each post’s title.  Social media icons and the newsletter signup button are noticeable but not distracting. The same goes for the ads on the right side of the page.  Overall, it’s a great blog to draw inspiration from if you want to create a text-heavy one.                ', '2025-07-17', 'ted talks', 'ted,talk,motivation,reel,tedtalks,talks,publicspeaking,public,speaking', 'tedtalks.jfif', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `blogger`
--

CREATE TABLE `blogger` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogger`
--

INSERT INTO `blogger` (`id`, `name`, `email`, `password`) VALUES
(1, 'madhav', 'madhav', 'madhav'),
(2, 'vikas', 'vikas', 'vikas'),
(4, 'hiya', 'hiya', 'hiya'),
(24, 'ria', 'ria@qqe.com', 'ria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blogger`
--
ALTER TABLE `blogger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `blogger`
--
ALTER TABLE `blogger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
