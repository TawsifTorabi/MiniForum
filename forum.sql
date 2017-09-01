-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 10:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `questionID` int(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `userID`, `questionID`, `answer`) VALUES
(1, 1, 3, 'C is a programming language, DO you know?'),
(2, 4, 3, 'It is a proggramming language.'),
(3, 3, 3, 'Whot! You dont now? :O'),
(4, 1, 5, 'lol'),
(5, 1, 3, 'safdgsfg'),
(6, 1, 5, 'yo'),
(7, 1, 6, 'ghgh'),
(8, 1, 1, 'ddf');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(255) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `answered` varchar(3) NOT NULL,
  `TagID` int(255) NOT NULL,
  `userID` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `question`, `description`, `answered`, `TagID`, `userID`) VALUES
(1, 'Where is Google?', 'where is google', 'no', 1, 4),
(2, 'What is HTML?', 'Hypertext Markup Language, a standardized system for tagging text files to achieve font, color, graphic, and hyperlink effects on World Wide Web pages.', 'no', 1, 2),
(3, 'What is C?', 'C is a computer programming language. That means that you can use C to create lists of instructions for a computer to follow. C is one of thousands of programming languages currently in use.', 'yes', 2, 1),
(4, 'What is javascript?', 'an object-oriented computer programming language commonly used to create interactive effects within web browsers.', ' no', 5, 3),
(5, 'sdsd', 'sdsd', 'no', 5, 2),
(6, 'hala', 'hala', 'no', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `TagID` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `title`, `description`) VALUES
(1, 'HTML', 'Hyper Text markup language to create or design website'),
(2, 'C', 'C is a computer programming language'),
(3, 'C++', 'C++ is a programming language'),
(4, 'Java', 'java is an Object Oriented Programming language'),
(5, 'javascript', 'javascript is the most powerful browser scripting language'),
(6, 'CSS', 'CSS is a markup language to set a webpage''s look');

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE IF NOT EXISTS `usersdata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `name`, `email`, `password`, `privilege`) VALUES
(1, 'Test', 'test@test.net', 'test', 'admin'),
(2, 'abir', 'abir@abir.net', 'abir', 'user'),
(3, 'taw', 'tawsiftorabi.jr@gmail.com', 'taw', 'user'),
(4, 'nafis', 'nafis@nafis.net', 'nafis', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
