-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 04:19 AM
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
-- Database: `soil_moisture`
--

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notifID` int(11) NOT NULL,
  `Notif` text NOT NULL,
  `time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notifID`, `Notif`, `time`, `user_id`) VALUES
(1, 'Water in reservoir is nearing low.', '2023-05-02 08:07:28', 1),
(2, 'Water pump off', '2023-05-02 08:07:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `recomID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recommendation` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`recomID`, `user_id`, `recommendation`, `date`) VALUES
(1, 1, 'Prepare for rainy days', '2023-05-02 08:10:05'),
(2, 1, 'Heavy rainfall is expected. Please prepare your paddings. ', '2023-05-02 08:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` int(11) NOT NULL,
  `sensor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soilmoisturereadings`
--

CREATE TABLE `soilmoisturereadings` (
  `ReadingID` int(11) NOT NULL,
  `SensorID` varchar(200) NOT NULL,
  `ReadingTime` time NOT NULL,
  `SoilMoistureValue` int(11) NOT NULL,
  `Units` varchar(10) NOT NULL,
  `MoistureCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soilmoisturereadings`
--

INSERT INTO `soilmoisturereadings` (`ReadingID`, `SensorID`, `ReadingTime`, `SoilMoistureValue`, `Units`, `MoistureCategory`) VALUES
(425, 'Sensor 2', '09:16:19', -29, '%', 0),
(426, 'Sensor 3', '09:16:25', 8, '%', 0),
(427, 'Sensor 4', '09:16:31', 138, '%', 4),
(428, 'Sensor 1', '09:16:53', -1, '%', 0),
(429, 'Sensor 2', '09:16:59', -29, '%', 0),
(430, 'Sensor 3', '09:17:06', 7, '%', 0),
(431, 'Sensor 4', '09:17:12', 136, '%', 4),
(432, 'Sensor 1', '09:17:17', 2, '%', 0),
(433, 'Sensor 2', '09:17:40', -29, '%', 0),
(434, 'Sensor 3', '09:17:46', 8, '%', 0),
(435, 'Sensor 4', '09:17:52', 138, '%', 4),
(436, 'Sensor 1', '09:19:01', -6, '%', 0),
(437, 'Sensor 2', '09:19:07', -38, '%', 0),
(438, 'Sensor 4', '09:19:20', 152, '%', 4),
(439, 'Sensor 1', '09:19:41', -1, '%', 0),
(440, 'Sensor 2', '09:19:48', -28, '%', 0),
(441, 'Sensor 3', '09:19:54', 5, '%', 0),
(442, 'Sensor 4', '09:20:00', 141, '%', 4),
(443, 'Sensor 2', '09:20:28', -27, '%', 0),
(444, 'Sensor 3', '09:20:34', 6, '%', 0),
(445, 'Sensor 4', '09:20:41', 140, '%', 4),
(446, 'Sensor 1', '09:21:02', 1, '%', 0),
(447, 'Sensor 2', '09:21:08', -26, '%', 0),
(448, 'Sensor 3', '09:21:15', 6, '%', 0),
(449, 'Sensor 4', '09:21:21', 141, '%', 4),
(450, 'Sensor 1', '09:21:42', 1, '%', 0),
(451, 'Sensor 2', '09:21:49', -27, '%', 0),
(452, 'Sensor 3', '09:21:55', 6, '%', 0),
(453, 'Sensor 4', '09:22:01', 138, '%', 4),
(454, 'Sensor 1', '09:23:12', -6, '%', 0),
(455, 'Sensor 2', '09:23:18', -37, '%', 0),
(456, 'Sensor 3', '09:23:24', -3, '%', 0),
(457, 'Sensor 4', '09:23:31', 145, '%', 4),
(458, 'Sensor 1', '09:42:08', 3, '%', 0),
(459, 'Sensor 2', '09:42:15', -27, '%', 0),
(460, 'Sensor 3', '09:42:21', 4, '%', 0),
(461, 'Sensor 4', '09:42:27', 150, '%', 4),
(462, 'Sensor 1', '09:42:48', 1, '%', 0),
(463, 'Sensor 2', '09:42:55', -27, '%', 0),
(464, 'Sensor 3', '09:43:01', 4, '%', 0),
(465, 'Sensor 4', '09:43:07', 136, '%', 4),
(466, 'Sensor 1', '09:43:29', 2, '%', 0),
(467, 'Sensor 2', '09:43:35', -26, '%', 0),
(468, 'Sensor 3', '09:43:41', 5, '%', 0),
(469, 'Sensor 4', '09:43:48', 136, '%', 4),
(470, 'Sensor 1', '09:44:09', 2, '%', 0),
(471, 'Sensor 2', '09:44:15', -27, '%', 0),
(472, 'Sensor 3', '09:44:22', 8, '%', 0),
(473, 'Sensor 4', '09:44:28', 140, '%', 4),
(474, 'Sensor 1', '09:44:50', 16, '%', 1),
(475, 'Sensor 2', '09:44:56', 28, '%', 1),
(476, 'Sensor 3', '09:45:02', 65, '%', 3),
(477, 'Sensor 4', '09:45:09', 140, '%', 4),
(478, 'Sensor 1', '09:45:28', 44, '%', 2),
(479, 'Sensor 2', '09:45:34', -26, '%', 0),
(480, 'Sensor 3', '09:45:41', 62, '%', 2),
(481, 'Sensor 4', '09:45:47', 139, '%', 4),
(482, 'Sensor 1', '09:46:08', 127, '%', 4),
(483, 'Sensor 2', '09:46:15', 88, '%', 4),
(484, 'Sensor 3', '09:46:21', 95, '%', 4),
(485, 'Sensor 4', '09:46:27', 109, '%', 4),
(486, 'Sensor 1', '09:46:45', 126, '%', 4),
(487, 'Sensor 2', '09:46:51', 62, '%', 2),
(488, 'Sensor 3', '09:46:58', 89, '%', 4),
(489, 'Sensor 4', '09:47:04', 120, '%', 4),
(490, 'Sensor 1', '09:47:22', 123, '%', 4),
(491, 'Sensor 2', '09:47:28', 61, '%', 2),
(492, 'Sensor 3', '09:47:34', 86, '%', 3),
(493, 'Sensor 4', '09:47:40', 146, '%', 4),
(494, 'Sensor 1', '09:47:58', 121, '%', 4),
(495, 'Sensor 2', '09:48:04', 60, '%', 2),
(496, 'Sensor 3', '09:48:11', 85, '%', 3),
(497, 'Sensor 4', '09:48:18', 145, '%', 4),
(498, 'Sensor 1', '09:48:35', 120, '%', 4),
(499, 'Sensor 2', '09:48:41', 60, '%', 2),
(500, 'Sensor 3', '09:48:47', 85, '%', 3),
(501, 'Sensor 4', '09:48:54', 145, '%', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `email`, `gender`, `status`, `password`, `created_date`) VALUES
(1, 'Smart Agriculture', 'admin', 'agriculture@gmail.com', 'Male', 'Active', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2023-04-19 04:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `username`, `email`, `gender`, `status`, `password`, `created_date`) VALUES
(3, 'Raymart', 'cipher21', 'garcelalinette0325@gmail.com', 'Male', 'Active', '7a2462484a54446e6ba31758c0df96de9347d1c6', '2023-05-11 07:47:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`recomID`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soilmoisturereadings`
--
ALTER TABLE `soilmoisturereadings`
  ADD PRIMARY KEY (`ReadingID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `recomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soilmoisturereadings`
--
ALTER TABLE `soilmoisturereadings`
  MODIFY `ReadingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
