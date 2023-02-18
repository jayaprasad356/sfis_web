-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 08:50 AM
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
-- Database: `sfis_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `permissions` text NOT NULL,
  `refer_code` text DEFAULT NULL,
  `fcm_id` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `forgot_password_code` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `role`, `permissions`, `refer_code`, `fcm_id`, `status`, `created_by`, `forgot_password_code`, `date_created`) VALUES
(1, 'Kathiravan', 'Kathir', 'Kathiravan123', 'Kathirrosan80@gmail.com', 'Super Admin', '', 'SFIS', NULL, 1, 0, NULL, '2023-02-17 10:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `referred_by` text DEFAULT NULL,
  `refer_code` text DEFAULT NULL,
  `joined_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile`, `email`, `city`, `pincode`, `state`, `referred_by`, `refer_code`, `joined_date`) VALUES
(1, 'Sanjay', 'Kumar', '9752620123', 'sanjukumar23@gmail.com', 'Cheppakam', '620108', 'Tamilnadu', '', 'SFIS99185', '2023-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `registration_number` text DEFAULT NULL,
  `rc_status` text DEFAULT NULL,
  `chassis_number` text DEFAULT NULL,
  `engine_number` text DEFAULT NULL,
  `owner_name` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `registration_date` text DEFAULT NULL,
  `fuel_type` text DEFAULT NULL,
  `norms_type` text DEFAULT NULL,
  `vehicle_category` text DEFAULT NULL,
  `vehicle_class` text DEFAULT NULL,
  `number_of_cylinder` text DEFAULT NULL,
  `owner_serial_number` text DEFAULT NULL,
  `standing_capacity` text DEFAULT NULL,
  `sleeper_capacity` text DEFAULT NULL,
  `body_type` text DEFAULT NULL,
  `owner_mobile_no` text DEFAULT NULL,
  `ownership` text DEFAULT NULL,
  `colour` text DEFAULT NULL,
  `manufacturer` text DEFAULT NULL,
  `manufacturer_model` text DEFAULT NULL,
  `seating_capacity` text DEFAULT NULL,
  `insurance_policy_no` text DEFAULT NULL,
  `insurance_company_name` text DEFAULT NULL,
  `insurance_validity` text DEFAULT NULL,
  `financer` text DEFAULT NULL,
  `puc_number` text DEFAULT NULL,
  `puc_valid_upto` text DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `rc_registration_location` text DEFAULT NULL,
  `manufacturingYear` text DEFAULT NULL,
  `unladden_weight` text DEFAULT NULL,
  `wheelbase` text DEFAULT NULL,
  `gross_vehicle_weight` text DEFAULT NULL,
  `blacklist_status` text DEFAULT NULL,
  `fitness_upto` text DEFAULT NULL,
  `cubic_capacity` text DEFAULT NULL,
  `mv_tax_upto` text DEFAULT NULL,
  `permit_type` text DEFAULT NULL,
  `permit_no` text DEFAULT NULL,
  `permit_validity_upto` text DEFAULT NULL,
  `npermit_no` text DEFAULT NULL,
  `npermit_upto` text DEFAULT NULL,
  `npermit_issued_by` text DEFAULT NULL,
  `noc_valid_upto` text DEFAULT NULL,
  `noc_details` text DEFAULT NULL,
  `noc_status` text DEFAULT NULL,
  `noc_issue_date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
