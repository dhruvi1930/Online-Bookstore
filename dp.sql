-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 07:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_price` int(11) NOT NULL,
  `b_quantity` int(11) NOT NULL,
  `b_img` varchar(15) NOT NULL,
  `b_genre` varchar(15) NOT NULL,
  `b_author` varchar(15) NOT NULL,
  `b_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_price`, `b_quantity`, `b_img`, `b_genre`, `b_author`, `b_desc`) VALUES
(1, 'The Perfect Us', 150, 5, 'img/perfact.png', 'Romance', 'Durjoy Datta', 'Avantika is an investment banker, an ambitious go-getter and the exact opposite of Deb-a corporate professional turned failed writer, turned scripter of saas-bahu serials.'),
(2, 'All the Light we Cannot See', 200, 5, 'img/light.png', 'Romance', 'Anthony Doerr', 'When Marie Laure goes blind, aged six, her father builds her a model of their Paris neighbourhood, so she can memorize it with her fingers and then navigate the real streets.'),
(3, 'Her Last Wish', 100, 5, 'img/wish.png', 'Romance', 'AJAY PANDEY', 'His father\'s over expectations only ruined his self-confidence further with each failure. A ray of hope walked into his life as his wife, a charismatic personality spreading joy wherever she went. Everything is going per plan, but darkness comes knocking soon.'),
(4, 'The Girl in Room 105', 200, 5, 'img/105.png', 'Drama', 'Chetan Bhagat', 'Hi, I’m Keshav, and my life is screwed. I hate my job and my girlfriend left me. Ah, the beautiful Zara. Zara is from Kashmir. She is a Muslim.'),
(5, 'Tom Gates #15: What Monster?', 190, 5, 'img/tom.png', 'Drama', 'Liz Pichon', 'The bestselling, fully illustrated Tom Gates series is back! Winner of the ROALD DAHL FUNNY PRIZE. '),
(6, 'Harry Potter and the Cursed Child ', 190, 5, 'img/hp.png', 'Drama', 'J.K.Rowling', 'The official playscript of the original West End production of Harry Potter and the Cursed Child. It was always difficult being Harry Potter and it isn\'t much easier'),
(7, 'Batman: Killing Joke (Deluxe)', 300, 5, 'img/batman.png', 'Entertainment', 'Alan Moore', 'Launched with stark, THE KILLING JOKE is Alan Moore\'s fantastic reflection on the razor-thin line amongst rational sanity and craziness, boldness and villainy, drama and tragedy.'),
(8, 'LIke The Flowing River', 300, 5, 'img/river.png', 'Entertainment', 'Paulo Coelho', ' In this riveting collection of thoughts and stories, Paulo Coelho, the author of ‘The Alchemist’, offers his personal reflections on a wide range of subjects '),
(9, 'The 7 Habits of Highly Effective People', 274, 5, 'img/7habit.png', 'self-help', 'R. Stephen Cove', 'It is rightly said that habits make or break a man. If you want to know why you are not doing something right, sometimes all you need is to perform an analysis of your habits and consider altering them.'),
(10, 'The Heart of Success', 224, 5, 'img/hos.png', 'self-help', 'Om Swami', '6 Business principles to up your game you may have an Oscar-winning screenplay and a star-studded cast, but no scene is shot without “action.” '),
(11, 'Krishnayan', 262, 5, 'img/ky.png', 'fiction', 'Kajajal oza vai', 'This product is from Prabhat Prakashan, one of the leading publishing houses in India. Prabhat Prakashan has a glorious history of fifty years of publishing quality books on almost all streams of literature,');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `u_nm` varchar(100) NOT NULL,
  `f_nm` varchar(100) NOT NULL,
  `l_nm` varchar(100) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `u_mob_no` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`u_nm`, `f_nm`, `l_nm`, `u_pass`, `e_mail`, `u_mob_no`, `gender`) VALUES
('bansi', 'bansi', 'jadav', '827ccb0eea8a706c4c34a16891f84e7b', 'j12345@gmail.com', 2147483647, 'F'),
('neha', 'neha', 'patel', '827ccb0eea8a706c4c34a16891f84e7b', 'n12345@gmail.com', 2147483647, 'F'),
('dhruvi', 'dhruvi', 'lad', '123445', 'dhruvihl369@gmail.com', 2147483647, 'F'),
('parv', 'parv', 'parikh', '1234', 'parv5111@gmail.com', 2147483647, 'M'),
('bada', 'lee', 'hiten', '123', 'j123q@gmail.com', 2147483647, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `t_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`t_id`, `flag`) VALUES
(1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD UNIQUE KEY `uniqid` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
