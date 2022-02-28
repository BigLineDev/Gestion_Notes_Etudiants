--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gestionetudiant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`userid`, `password`) VALUES
('admin', 'D00F5D5217896FB7FD601412CB890830');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL,
  `matiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`name`, `id`, `matiere`) VALUES
('Seven', 7, 'Matiere 1'),
('Eight', 8, 'Matiere 2'),
('Nine', 9, 'Matiere 3'),
('Ten', 10, 'Matiere 4'),
('Demo Class', 88, "Matiere 5");

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class` varchar(30) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `marks` int(3) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES
('Liam Moore', 10, 'Demo Class', 61, 49, 50, 55, 70, 285, 57),
('Karen', 5, 'Nine', 71, 50, 59, 65, 75, 320, 64),
('Thomas', 11, 'Eight', 50, 50, 50, 50, 49, 249, 49.8),
('Emma Ashley', 21, 'Ten', 72, 68, 82, 59, 76, 357, 71.4),
('Oliver Cooper', 19, 'Ten', 71, 78, 73, 82, 85, 389, 77.8);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `rno`, `class_name`, `adresse`, `phone`) VALUES
('Liam Moore', 10, 'Demo Class', 'Paris', '+33445140055'),
('Carol Davis', 5, 'Eight', 'Dakar', '+221771234567'),
('Thomas', 11, 'Eight', 'Thies', '+22177778899'),
('James Peterson', 9, 'Nine', 'Mbour', '+2217744565'),
('Jeanne Palmer', 2, 'Nine', 'Dakar', '+221771234567'),
('Karen', 5, 'Nine', 'Dakar', '+221771234567'),
('Lucia Muff', 12, 'Nine', 'Dakar', '+221771234567'),
('Rod Glover', 11, 'Nine', 'Dakar', '+221771234567'),
('Bran David', 15, 'Seven', 'Dakar', '+221771234567'),
('Miguel Tracy', 8, 'Seven', 'Dakar', '+221771234567'),
('Stacy', 9, 'Seven', 'Dakar', '+221771234567'),
('Emma Ashley', 21, 'Ten', 'Dakar', '+221771234567'),
('Oliver Cooper', 19, 'Ten', 'Dakar', '+221771234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `class` (`class`),
  ADD KEY `name` (`name`,`rno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`name`,`rno`),
  ADD KEY `class_name` (`class_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`name`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`name`,`rno`) REFERENCES `students` (`name`, `rno`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`);