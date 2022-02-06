-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `mgr_start_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_id`, `dept_name`, `mgr_start_date`) VALUES
(15, '1105', 'IT', '2021-11-03'),
(12, '1111', 'Programming Dept', '2021-11-09'),
(13, '1112', 'IOT', '2021-11-09'),
(14, '1114', 'networking', '2021-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `ssn` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dno` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `ssn`, `name`, `bdate`, `address`, `dno`, `salary`, `position`, `bloodgroup`, `sex`, `remark`, `email`, `password`, `degree`, `image`) VALUES
(5, '1001', 'Mehedi Hasan', '12/12/1996', 'Dhaka-1216', '1111', '40000', 'S.r Developer', 'AB+', 'Male', ' good', 'mehedi.mk93@gmail.com', 'mehedi', 'B.Sc Engg in CSE', 'user-icon-vector-260nw-393536320.jpg'),
(6, '1002', 'Md Abdul jabbar', '12/12/1996', 'Dhaka-1216', '1112', '30000', 'S.r Developer', 'AB+', 'Male', ' good', 'jabbar12@gmail.com', '12345', 'Diploma Engg', 'user-icon-vector-260nw-393536320.jpg'),
(7, '1003', 'Azizul Hakim', '12/2/2000', 'Kushtia', '1111', '50000', 'S.r Developer', 'A-', 'Male', ' good', 'azizul@gmail.com', '1234', 'B.Sc Engg in CSE', 'employee.png'),
(8, '1004', 'Rihan Khan', '12/12/2000', 'Dhaka-1216', '1112', '20000', 'J.r Developer', 'AB+', 'Male', ' good', 'rihan@gmail.com', '1234', 'Diploma Engg', 'user-icon-vector-260nw-393536320.jpg'),
(9, '1005', 'Faruk khan', '4/10/1997', 'Kushtia', '1112', '15000', 'Intern ', 'AB+', 'Male', ' good ', 'faruk@gmail.com', '1234', 'B.Sc Engg in CSE', 'employee.png'),
(10, '1006', 'Khan', '4/10/1997', 'Rajbari', '1112', '30000', 'J.r Developer', 'AB+', 'Male', ' good', 'khan@gmail.com', '1234', 'B.Sc Engg in CSE', 'user-icon-vector-260nw-393536320.jpg'),
(11, '1007', 'Mahim khan', '12-10-20', 'Kushtia', '1114', '20000', 'Intern ', 'B-', 'Male', ' good', 'mahim@gmail.com', '1234', 'Diploma Engg', 'employee.png'),
(12, '1008', 'Mehedi Hasan1', '12/12/2000', 'Dhaka-1216', '1111', '40000', 'S.r Developer', 'AB-', 'Male', ' good', 'mehedi1@gmail.com', '1234', 'B.Sc Engg in CSE', 'user-icon-vector-260nw-393536320.jpg'),
(13, '1009', 'Mehedi2', '12/2/2000', 'Dhaka, Bangladesh', '1112', '30000', 'J.r Developer', 'AB+', 'Male', ' good ', 'mehedi2@gmail.com', '1234', 'Diploma Engg', 'employee.png'),
(14, '1010', 'Hasan', '12/2/2000', 'Kushtia', '1112', '20000', 'Intern ', 'AB+', 'Male', ' good', 'hasan@gmail.com', '1234', 'Diploma Engg', 'employee.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`) VALUES
(1, 'mehedi', 'mehedi');

-- --------------------------------------------------------

--
-- Table structure for table `notice_tbl`
--

CREATE TABLE `notice_tbl` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(200) NOT NULL,
  `notice_date` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_tbl`
--

INSERT INTO `notice_tbl` (`id`, `notice_title`, `notice_date`, `image`) VALUES
(1, 'demo Notice', '2021-12-02', 'Employee Notice.pdf'),
(2, 'demo notice-2', '2021-11-17', 'Employee Notice.pdf'),
(3, 'demo notice-3', '2021-11-17', 'Employee Notice.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_id` varchar(200) NOT NULL,
  `project_location` varchar(200) NOT NULL,
  `dept_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_id`, `project_location`, `dept_id`) VALUES
(7, 'Demo porject1', '12321', 'From BITI', '1111'),
(8, 'Demo porject2', '12322', 'From LICT', '1112'),
(9, 'Demo porject3', '12323', 'From netsoft', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `medical` varchar(200) NOT NULL,
  `total_days` varchar(50) NOT NULL,
  `absent` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `dailybase` varchar(100) NOT NULL,
  `totalsal` varchar(100) NOT NULL,
  `house_rent` varchar(100) NOT NULL,
  `traveling` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `name`, `salary`, `medical`, `total_days`, `absent`, `month`, `dailybase`, `totalsal`, `house_rent`, `traveling`) VALUES
(3, '1001', 'Mehedi Hasan', '40000', '1500', '22', '8', '12/12/20', '1333.3333333333', '56433.333333333', '17600', '8000'),
(4, '1003', 'Azizul Hakim', '50000', '1500', '30', '0', '12/12/20', '1666.6666666667', '91500', '30000', '10000'),
(5, '1002', 'Md Abdul jabbar', '30000', '1500', '29', '1', '12/12/20', '1000', '53900', '17400', '6000'),
(6, '1004', 'Rihan Khan', '20000', '800', '25', '5', '12/12/20', '666.66666666667', '26132.666666667', '6666.6666666667', '2000'),
(7, '1005', 'Faruk khan', '15000', '800', '22', '8', '12/12/20', '500', '17700', '4400', '1500'),
(8, '1006', 'Khan', '30000', '1500', '28', '2', '12/12/20', '1000', '52300', '16800', '6000'),
(9, '1007', 'Mahim khan', '20000', '800', '30', '0', '12/12/20', '666.66666666667', '30800', '8000', '2000'),
(10, '1008', 'Mehedi Hasan1', '40000', '1500', '29', '1', '12/12/20', '1333.3333333333', '71366.666666667', '23200', '8000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ssn`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD KEY `from department2` (`dno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`),
  ADD KEY `from department` (`dept_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_ibfk_1` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `from department2` FOREIGN KEY (`dno`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `from department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`ssn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
