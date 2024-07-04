-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:47 PM
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
-- Database: `myprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `nbheur` int(11) NOT NULL,
  `jour` date NOT NULL,
  `idstudent` int(11) NOT NULL,
  `tabrir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id`, `nbheur`, `jour`, `idstudent`, `tabrir`) VALUES
(1, 2, '2023-05-09', 1, ''),
(2, 4, '2023-05-09', 2, 'aze'),
(4, 4, '2023-05-02', 3, 'QZERTY'),
(5, 5, '2023-05-01', 4, ''),
(6, 6, '2023-05-03', 5, ''),
(7, 7, '2023-05-10', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `image`) VALUES
(622755377, 'mekkaoui', 'mekkaoui', 'mekkaoui', 0x41646d696e2e706e67),
(629085172, 'admin', 'admin', 'admin', 0x356137383865663939642e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `dept`, `name`) VALUES
(1, 5, 3),
(2, 5, 2),
(3, 2, 1),
(4, 1, 1),
(5, 1, 2),
(6, 3, 1),
(9, 3, 2),
(10, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `name`) VALUES
(1, 'mathe'),
(2, 'info'),
(3, 'physique'),
(4, 'svt'),
(5, 'arab');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `idstudent` int(11) NOT NULL,
  `note` float NOT NULL,
  `controle` int(11) NOT NULL,
  `idteacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(25) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `email`, `password`, `name`, `image`) VALUES
(8976434, 'parents', 'parents', 'MEKKAOUI', '');

-- --------------------------------------------------------

--
-- Table structure for table `sexe`
--

CREATE TABLE `sexe` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sexe`
--

INSERT INTO `sexe` (`id`, `name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` blob NOT NULL,
  `location` text NOT NULL,
  `sphone` bigint(20) NOT NULL,
  `sexe` int(11) NOT NULL,
  `classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `password`, `name`, `image`, `location`, `sphone`, `sexe`, `classe`) VALUES
(1, 'm@g.com', 'papa@g.com', 'mama', 0x356137383865663939642e706e67, 'hay essaada', 2345678, 1, 1),
(2, 'mekkaoui', 'mekkaoui', 'mekkaoui', 0x746561636865722e706e67, 'lhay eljadid', 708550919, 1, 3),
(3, 'AZERTY', 'mekk', 'AZERTY', 0x66616365626f6f6b2e706e67, 'AZERTY', 234567, 1, 1),
(4, 'YTREZ', 'YTREZ', 'YTREZ', 0x746561636865722e706e67, 'YTREZ', 76543, 2, 1),
(5, 'YTREZHGF', 'YTREZHGF', 'YTREZHGF', 0x5354414646532e706e67, 'YTREZHGF', 2345676543, 1, 1),
(6, 'YTRFC', 'YTRFC', 'YTRFC', 0x435553542e706e67, 'YTRFC', 4567890, 1, 1),
(7, 'abdessamad', 'abdessamad', 'abdessamad', 0x73747564656e742e706e67, 'hay essaada nr 35 goulmima', 708551965, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` text NOT NULL,
  `outgoing_msg_id` text NOT NULL,
  `text_message` text NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachabs`
--

CREATE TABLE `teachabs` (
  `id` int(11) NOT NULL,
  `nh` int(11) NOT NULL,
  `jour` date NOT NULL,
  `idteach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachabs`
--

INSERT INTO `teachabs` (`id`, `nh`, `jour`, `idteach`) VALUES
(21, 6, '2023-05-01', 7654321),
(23, 9, '2023-05-17', 7123456);

-- --------------------------------------------------------

--
-- Table structure for table `teachclasse`
--

CREATE TABLE `teachclasse` (
  `id` int(11) NOT NULL,
  `teachid` int(11) NOT NULL,
  `classeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachclasse`
--

INSERT INTO `teachclasse` (`id`, `teachid`, `classeid`) VALUES
(6, 7654321, 1),
(7, 7654321, 4),
(8, 7654321, 5),
(9, 7654321, 10),
(10, 7123456, 2),
(11, 7123456, 3),
(12, 7123456, 9),
(13, 7123456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sexe` int(11) NOT NULL,
  `image` blob NOT NULL,
  `dept` int(11) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `email`, `password`, `name`, `sexe`, `image`, `dept`, `location`) VALUES
(7123456, 'teacher', 'teacher', 'mohamed', 0, 0x623263323065326439622e706e67, 0, 'hay essaada'),
(7654321, 'mekkaouii', 'mekkaouii', 'mekkaouii', 0, 0x5354414646532e706e67, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `img` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `img`, `status`, `username`) VALUES
(1, 7123456, '', 'Active', 'mekkaoui'),
(2, 7654321, '', 'Active', 'mekkaoui'),
(3, 622755377, '', 'offline', 'baraghi'),
(4, 629085172, '', 'Active', 'abdessamad'),
(5, 8976434, '', 'Active', 'parentes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lstudent` (`idstudent`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept` (`dept`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notestudent` (`idstudent`),
  ADD KEY `idtea` (`idteacher`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe` (`classe`),
  ADD KEY `sexe` (`sexe`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `teachabs`
--
ALTER TABLE `teachabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idteach` (`idteach`);

--
-- Indexes for table `teachclasse`
--
ALTER TABLE `teachclasse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teach` (`teachid`),
  ADD KEY `clasid` (`classeid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1622755379;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teachabs`
--
ALTER TABLE `teachabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teachclasse`
--
ALTER TABLE `teachclasse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `lstudent` FOREIGN KEY (`idstudent`) REFERENCES `student` (`id`);

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `dept` FOREIGN KEY (`dept`) REFERENCES `dept` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `idtea` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `notestudent` FOREIGN KEY (`idstudent`) REFERENCES `student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `classe` FOREIGN KEY (`classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `sexe` FOREIGN KEY (`sexe`) REFERENCES `sexe` (`id`);

--
-- Constraints for table `teachabs`
--
ALTER TABLE `teachabs`
  ADD CONSTRAINT `idteach` FOREIGN KEY (`idteach`) REFERENCES `teacher` (`id`);

--
-- Constraints for table `teachclasse`
--
ALTER TABLE `teachclasse`
  ADD CONSTRAINT `clasid` FOREIGN KEY (`classeid`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `teach` FOREIGN KEY (`teachid`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
