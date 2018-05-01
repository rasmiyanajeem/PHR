-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 05:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phr`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_record`
--

CREATE TABLE `doctor_record` (
  `r_id` int(255) NOT NULL,
  `d_id` int(255) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `Specialization` varchar(200) NOT NULL,
  `hospitals/clinics` varchar(200) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_record`
--

INSERT INTO `doctor_record` (`r_id`, `d_id`, `first_name`, `middle_name`, `last_name`, `Specialization`, `hospitals/clinics`, `phone`, `email`) VALUES
(2, 3, 'John', 'Daniel', 'Smith', 'M.D', 'Amritha', 2147483647, 'demo@demo.demo'),
(4, 27, 'John', 'Smith', 'Doe', 'M.D', 'Amritha', 2147483647, 'john@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_record`
--

CREATE TABLE `patient_health_record` (
  `r_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `testname` varchar(300) NOT NULL,
  `medical_report` varchar(10000) NOT NULL,
  `last_consulted_dr` varchar(1000) NOT NULL,
  `last_consulted_dr_phone` int(255) NOT NULL,
  `consulted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_health_record`
--

INSERT INTO `patient_health_record` (`r_id`, `p_id`, `testname`, `medical_report`, `last_consulted_dr`, `last_consulted_dr_phone`, `consulted_date`) VALUES
(3, 21, 'Hypothyroidism', 'uploads/patientrecordtable1510068606.png', 'john doe', 989898, '2017-11-25'),
(5, 21, 'Anemia', 'uploads/0yUzaiMd3MU1510080170.jpeg', 'Sam Wayne', 8312342, '2016-06-10'),
(6, 22, 'blood group', 'uploads/screencapture1921684350phrdev15100745572491510074826.png', 'Ajmal Hassan', 2147483647, '2017-11-09'),
(8, 21, 'Cardiomayopathy', 'uploads/test21510114569.png', 'House', 911, '2017-11-01'),
(9, 28, 'Depression', 'uploads/doctortable1510114826.png', 'G. House', 911, '2017-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `r_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `height` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `allergy` varchar(400) NOT NULL,
  `insurance` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `pincode` int(20) NOT NULL,
  `marital_status` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emergency-contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`r_id`, `p_id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `blood_group`, `height`, `weight`, `allergy`, `insurance`, `address`, `city`, `state`, `nationality`, `pincode`, `marital_status`, `phone`, `email`, `emergency-contact`) VALUES
(1, 21, 'John', 'Jade', 'Smith', 'Male', '2017-11-11', 'B-', 100, 75, 'nuts', 'yes', 'Runa Manzil JRA 65,, Janatha Stop, Manjummel P.O,', 'Port Blair*', 'Andaman and Nicobar Islands', 'India', 683501, 'Divorced', 2147483647, 'demo@demo.demo', 21312),
(2, 22, 'rasmiya', '', 'najeem', 'Female', '1997-09-13', 'O+', 165, 55, 'no', 'no', 'runa manzil, manjummel', 'Kochi', 'Kerala', 'India', 683501, 'Single', 944728047, 'rasmiyanajeem@gmail.com', 2147483647),
(3, 28, 'James', '', 'Wilson', 'Male', '2017-11-01', 'B+', 170, 67, 'no', 'yes', 'Vijayanagara Empire Street', 'Pasighat', 'Arunachal Pradesh', 'India', 682724, 'Divorced', 911, 'james@pb.com', 911);

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE `reg_users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`id`, `username`, `password`, `desig`) VALUES
(3, 'ajmalhassan', '1234', 'Doctor'),
(4, 'Rasmiya', '1234', 'Patient'),
(21, 'demo', 'demo', 'Patient'),
(22, 'rasmiya123', '1234', 'Patient'),
(27, 'smithdoe', '1234', 'Doctor'),
(28, 'james', 'demo', 'Patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_record`
--
ALTER TABLE `doctor_record`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `patient_health_record`
--
ALTER TABLE `patient_health_record`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_record`
--
ALTER TABLE `doctor_record`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient_health_record`
--
ALTER TABLE `patient_health_record`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reg_users`
--
ALTER TABLE `reg_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_record`
--
ALTER TABLE `doctor_record`
  ADD CONSTRAINT `doctor_record_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `reg_users` (`id`);

--
-- Constraints for table `patient_health_record`
--
ALTER TABLE `patient_health_record`
  ADD CONSTRAINT `patient_health_record_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `reg_users` (`id`);

--
-- Constraints for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD CONSTRAINT `patient_record_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `reg_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
