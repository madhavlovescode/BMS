-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:44 AM
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
(26, 1, 'Top 8 amusement park in ahmedabad', '                                                                                                                                                                                                        Shankus Water Park Ahmedabad Constructed on a whopping 200 square hectares of land, Shankus Water Park Ahmedabad is Gujarat’s largest and oldest water park! The Zip Zam Zoom Slide, Shanku’s Twister and the Racing Slide are just some of the most popular of Shankus Water Park Rides.  Shankus Water Park Price: Rs. 1000 per person (Mondays to Saturdays), Rs. 1200 per person on Sundays.  Shankus Water Park Timings: 10 a.m. to 5 p.m.  Shankus Water Park Booking: While tickets are available at the venue, their online booking portal often has discounts which you can avail when you book online.  Maniar’s Wonderland This cool amusement park comes with an indoor snow area, as well as outdoor pools and rides. Some of the top attractions include the Aqua Roller, Buggy Ride, Aqua Splash and Aqua Ball.   Price: Adults Rs. 220, Children Rs. 180;  Snow Park – Adults Rs. 450, Children Rs. 400.  Timing: 10 a.m. to 8.30 p.m.  Splash the Fun World Another must-visit amusement park in Ahmedabad, featuring over 25 regular and water rides! Make sure you visit their artificial waterfall which is a highlight of the place.  Price: Adults Rs. 750, Children Rs. 600 (with food).  Timings: 10 a.m. to 6 p.m.  Adventure World Amusement Park From roller coasters to zip lines and even water slides, this one has everything that a thrill-seeker could possibly want.  Price: Entry Free – pay only for your rides.  Timings: 10 a.m. to 10 p.m.  Balvatika If you have very young children, this might be the best option for you. Their kid-friendly rides like the Bubble Ride, Bungee Jumping, Desert Safari and Bowling Alley are perfect for a fun-filled family day that everyone can enjoy.  Price: Adults and children above 12: Rs. 3, Children between 3 to 12 years: Rs. 2.  Timings: 9 a.m. to 10.15 p.m.  Amrapali Funland This wonderful amusement park has something for kids of all ages. Older kids will love their thrilling roller coasters, while the smaller kids will have an unforgettable time in the bumper cars and the carousel!  Price: Rs. 500 per person (for the full package).  Timings: 10 a.m. to 10 p.m.  Swapna Srushti Water Park If you’re looking for a big water park with plenty of water rides, this is the best choice! Some of their key attractions include the Mississippi Water Ride, Thunder Wave Pool, Thrilling Fog and Amazing Bucket Fall.  Price: Entry Rs. 500 per person.  Timings: 11 a.m. to 5 p.m.  Jaldhara Water World Apart from the various types of cool rides here, this amusement park also has facilities to host private functions that can be organised by the poolside.                                                                                                                                                                 ', '2025-07-15', 'enterntainment', 'amusement park,enjoy,fun,children,kids', 'har.jpg', 'pending');

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
(18, 'vikas', 'vikas@gmail.com', 'vikas');

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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `blogger`
--
ALTER TABLE `blogger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
