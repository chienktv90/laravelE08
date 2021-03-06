-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 04:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sukien`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_crud`
--

CREATE TABLE `form_crud` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `form_crud`
--

INSERT INTO `form_crud` (`id`, `name`, `age`) VALUES
(1, 'chienle', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

CREATE TABLE `sukien` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf16_vietnamese_ci NOT NULL,
  `ngay` date NOT NULL,
  `hinh` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `idQuan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Dumping data for table `sukien`
--

INSERT INTO `sukien` (`id`, `ten`, `ngay`, `hinh`, `idQuan`, `status`) VALUES
(5, 'Dự án Khởi Nghiệp', '2019-06-16', 'images/test.jpg', 0, 0),
(6, 'Google Cloud in CANTHO 01 - 2010', '2019-06-15', 'images/introduce google cloud.png', 0, 0),
(7, 'EduKing Khai giảng trung tâm mới', '2019-06-15', 'images/gdg 19.png', 0, 0),
(8, 'Lập trình web larael khóa 7', '2020-01-09', 'images/test.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_crud`
--
ALTER TABLE `form_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_crud`
--
ALTER TABLE `form_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
