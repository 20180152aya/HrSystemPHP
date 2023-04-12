-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 01:50 PM
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
-- Database: `hrsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rule` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `rule`, `image`) VALUES
(40, 'maner', 'manerhamedzaki@gmail.com', 'maner', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '598857member-2.jpg'),
(41, 'ayahamedzaki@gmail.com', 'ayahamedzaki@gmail.com', 'x', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '609579ben-garratt.jpg'),
(42, 'mm', 'mm@gmail.com', 'mm', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '851627Ethel Davis.webp'),
(43, 'hjfm', 'ayahamedzaki@gmail.com', 'b', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '326461member-2.jpg'),
(44, 'ayahamedzaki', 'ayahamedzaki@gmail.com', 'aya', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '957572Lena Keller.webp'),
(45, 'maner', 'ayahamedzaki@gmail.com', 'maner', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 'fake.png'),
(46, 'cqmcv', 'ayahamedzaki@gmail.com', 'c', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '834933member-2.jpg'),
(47, 'aya', 'ayahamedzaki@gmail.com', 'ayaa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '580811member-2.jpg'),
(48, 'Lenaa', 'Lena@gmail.com', 'Lena', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, '140350Lena Keller.webp'),
(49, 'gggg', 'Aya@gmail.com', 'ggg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'fake.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminswiththem`
-- (See below for the actual view)
--
CREATE TABLE `adminswiththem` (
`IDadmin` int(11)
,`name` varchar(50)
,`password` varchar(50)
,`IDthem` int(11)
,`color` varchar(20)
,`adminID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `adminwithrules`
-- (See below for the actual view)
--
CREATE TABLE `adminwithrules` (
`adminID` int(11)
,`adminName` varchar(50)
,`email` varchar(100)
,`username` varchar(50)
,`rule` int(11)
,`rulesID` int(11)
,`ruleName` varchar(50)
,`image` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'HR'),
(2, 'Web'),
(6, 'AI'),
(8, 'Data Seience'),
(11, 'CS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmentswithoutemployee`
-- (See below for the actual view)
--
CREATE TABLE `departmentswithoutemployee` (
`id` int(11)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `salary`, `image`, `departmentID`) VALUES
(43, 'aya', 3500, '88859rr.jpeg', 1),
(50, 's d', 86, '843157img7.jpg', 1),
(51, 'vsd', 23543, '924799img6.jpg', 1),
(54, 'fdv', 4500, '175646img5.jpg', 1),
(55, 'aya', 3000, '920752ben-garratt.jpg', 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeesjoinwithdepartment`
-- (See below for the actual view)
--
CREATE TABLE `employeesjoinwithdepartment` (
`empID` int(11)
,`empName` varchar(40)
,`empSalary` int(11)
,`depID` int(11)
,`image` varchar(250)
,`depName` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Employee & Department only'),
(3, 'Department only');

-- --------------------------------------------------------

--
-- Table structure for table `them`
--

CREATE TABLE `them` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT '0',
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `them`
--

INSERT INTO `them` (`id`, `color`, `adminID`) VALUES
(13, '0', 47),
(14, '1', 44),
(15, '1', 49);

-- --------------------------------------------------------

--
-- Structure for view `adminswiththem`
--
DROP TABLE IF EXISTS `adminswiththem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminswiththem`  AS SELECT `admins`.`id` AS `IDadmin`, `admins`.`name` AS `name`, `admins`.`password` AS `password`, `them`.`id` AS `IDthem`, `them`.`color` AS `color`, `them`.`adminID` AS `adminID` FROM (`admins` join `them` on(`admins`.`id` = `them`.`adminID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `adminwithrules`
--
DROP TABLE IF EXISTS `adminwithrules`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminwithrules`  AS SELECT `admins`.`id` AS `adminID`, `admins`.`name` AS `adminName`, `admins`.`email` AS `email`, `admins`.`username` AS `username`, `admins`.`rule` AS `rule`, `rules`.`id` AS `rulesID`, `rules`.`name` AS `ruleName`, `admins`.`image` AS `image` FROM (`admins` join `rules` on(`admins`.`rule` = `rules`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `departmentswithoutemployee`
--
DROP TABLE IF EXISTS `departmentswithoutemployee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentswithoutemployee`  AS SELECT `departments`.`id` AS `id`, `departments`.`name` AS `name` FROM (`departments` left join `employees` on(`employees`.`departmentID` = `departments`.`id`)) WHERE `employees`.`departmentID` is nullnull  ;

-- --------------------------------------------------------

--
-- Structure for view `employeesjoinwithdepartment`
--
DROP TABLE IF EXISTS `employeesjoinwithdepartment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeesjoinwithdepartment`  AS SELECT `employees`.`id` AS `empID`, `employees`.`name` AS `empName`, `employees`.`salary` AS `empSalary`, `departments`.`id` AS `depID`, `employees`.`image` AS `image`, `departments`.`name` AS `depName` FROM (`employees` join `departments` on(`employees`.`departmentID` = `departments`.`id`)) ORDER BY `employees`.`id` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule` (`rule`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `them`
--
ALTER TABLE `them`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `them`
--
ALTER TABLE `them`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`rule`) REFERENCES `rules` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `them`
--
ALTER TABLE `them`
  ADD CONSTRAINT `them_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
