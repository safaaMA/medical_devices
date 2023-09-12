-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 06:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamode`
--

-- --------------------------------------------------------

--
-- Table structure for table `add-h`
--

CREATE TABLE `add-h` (
  `id` int(255) NOT NULL,
  `token` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `nameHos` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add-h`
--

INSERT INTO `add-h` (`id`, `token`, `nameHos`) VALUES
(38, '230911120353182', 'مستشفى الشفاء'),
(39, '230911010524105', 'مستشفى العراق');

-- --------------------------------------------------------

--
-- Table structure for table `adddiv`
--

CREATE TABLE `adddiv` (
  `id` int(255) NOT NULL,
  `token` int(255) NOT NULL,
  `div_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `div_namepers` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `div_photo` text CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `div_dete` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `div_hosname` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serialnumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adddiv`
--

INSERT INTO `adddiv` (`id`, `token`, `div_name`, `div_namepers`, `div_photo`, `div_dete`, `div_hosname`, `serialnumber`) VALUES
(92, 2567078, 'sla', 'علي', 'item-64ffd453025c98.78464670.jpg', '2023-09-12', '230911010524105', '5'),
(93, 3489411, 'skks', 'علي', 'item-64ffd46a7b7e63.33476129.jpg', '2023-09-12', '230911010524105', '2147483647'),
(95, 2502057, 'sdsd', 'علي', 'item-64ffd5acde02e1.00714506.jpg', '2023-09-12', '230911010524105', '2147483647'),
(99, 1799221, 'علي محمد', 'صفاء ', 'item-65008546456949.83232233.', '2023-09-01', '230911120353182', '10000020200200202020'),
(100, 4866801, 'zzz', 'صفاء', 'item-64ffece32588f5.57236583.', '2023-09-12', '230911010524105', '147111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `uswes`
--

CREATE TABLE `uswes` (
  `id` int(255) NOT NULL,
  `token` int(255) NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userMail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `conformPass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Rank` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uswes`
--

INSERT INTO `uswes` (`id`, `token`, `userName`, `userMail`, `password`, `conformPass`, `Rank`) VALUES
(1, 123456, 'محمد فرج', 'mo3', '123123', '123123', 0),
(16, 3736684, 'علي', 'ddaa', '12345', '12345', 1),
(18, 4151568, 'حسين', 'ssaa', '123', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add-h`
--
ALTER TABLE `add-h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adddiv`
--
ALTER TABLE `adddiv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uswes`
--
ALTER TABLE `uswes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add-h`
--
ALTER TABLE `add-h`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `adddiv`
--
ALTER TABLE `adddiv`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `uswes`
--
ALTER TABLE `uswes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
