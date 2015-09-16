-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2015 at 07:59 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercode`
--

CREATE TABLE IF NOT EXISTS `tbl_usercode` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `usercode` varchar(200) DEFAULT NULL,
  `usercreate` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userhistory`
--

CREATE TABLE IF NOT EXISTS `tbl_userhistory` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `textmessage` varchar(500) DEFAULT NULL,
  `datecreate` varchar(200) DEFAULT NULL,
  `totalbalance` int(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `numbercost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `userimei` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpass` varchar(255) NOT NULL,
  `createdate` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `userimei`, `username`, `userpass`, `createdate`, `status`) VALUES
(1, '87d948216a08639d7872c91fd9fb58bd', 'admin', '87d948216a08639d7872c91fd9fb58bd', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_usercode`
--
ALTER TABLE `tbl_usercode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userhistory`
--
ALTER TABLE `tbl_userhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_usercode`
--
ALTER TABLE `tbl_usercode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_userhistory`
--
ALTER TABLE `tbl_userhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
