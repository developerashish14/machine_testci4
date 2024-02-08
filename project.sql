-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 03:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `full_name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `created_at`, `full_name`, `phone`, `email`, `address`, `dob`, `gender`, `image`) VALUES
(2, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(5, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(6, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(7, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(8, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(9, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(10, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(11, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(12, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(13, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(14, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(15, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(16, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(17, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(18, '2024-02-07 20:10:08', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(19, '2024-02-07 20:09:20', 'Ashish Rawat', 2147483647, 'as31234@gmail.com', 'Noida', '2024-02-07', 'Male', '1707335555_c178e5e2ead7a2eb2878.jpg'),
(20, '2024-02-07 21:20:44', 'ashish rawat', 2147483647, 'arawat@cftedu.in', 'test', '2024-02-08', 'Male', '1707340844_75c13111a93dba8dd251.jpg'),
(21, '2024-02-07 21:20:44', 'ashish rawat', 2147483647, 'arawat@cftedu.in', 'test', '2024-02-08', 'Male', '1707340844_201f9d1ba64dfaf83118.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
