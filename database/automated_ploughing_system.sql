-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2023 at 05:26 AM
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
-- Database: `automated_ploughing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(200) NOT NULL,
  `admin_login_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_contacts` varchar(200) NOT NULL,
  `admin_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_login_id`, `admin_name`, `admin_contacts`, `admin_address`) VALUES
(4, 7, 'System Admin', '+547761323542', '90127 Localhost'),
(5, 8, 'System Administrator', '90222432323', '901238 Bomet');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(200) NOT NULL,
  `farmer_login_id` int(200) NOT NULL,
  `farmer_name` varchar(200) NOT NULL,
  `farmer_contacts` varchar(200) NOT NULL,
  `farmer_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `farmer_login_id`, `farmer_name`, `farmer_contacts`, `farmer_address`) VALUES
(1, 2, 'Jasmine Kipchirchir', '09876543', '90128 Localhost'),
(4, 11, 'Chebet Chepkwony', '086717312133', '120 Localhost');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(200) NOT NULL,
  `login_email` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_email`, `login_password`, `login_rank`) VALUES
(2, 'jaskip@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Farmer'),
(7, 'sysadmin@aps.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Admin'),
(8, 'admin@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Admin'),
(11, 'chebetchepkwony90@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Farmer'),
(12, 'hello@tata.co', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Service Provider'),
(13, 'info@komatsu.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Service Provider'),
(14, 'info@sanny.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Service Provider');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(200) NOT NULL,
  `payment_request_id` int(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_ref_code` varchar(200) NOT NULL,
  `payment_means` varchar(200) NOT NULL,
  `payment_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_request_id`, `payment_amount`, `payment_ref_code`, `payment_means`, `payment_date`) VALUES
(3, 2, '45000', 'FYQJROHE37', 'Debit / Credit Card', '2023-06-21 02:11:08.722273'),
(4, 3, '56000', 'D1BZKJ3VN7', 'Mpesa', '2023-06-21 02:11:14.592088'),
(5, 4, '25000', 'G5T8XIV2NA', 'Mpesa', '2023-06-21 02:48:22.811397'),
(6, 5, '90000', 'RVK01QTO8F', 'Mpesa', '2023-06-21 02:52:28.943069'),
(8, 6, '150000', '65Q90DIRXB', 'Debit / Credit Card', '2023-06-21 03:19:03.574665');

-- --------------------------------------------------------

--
-- Table structure for table `ploughing_service_providers`
--

CREATE TABLE `ploughing_service_providers` (
  `service_provider_id` int(200) NOT NULL,
  `service_provider_login_id` int(200) NOT NULL,
  `service_provider_name` varchar(200) NOT NULL,
  `service_provider_contacts` varchar(200) NOT NULL,
  `service_provider_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ploughing_service_providers`
--

INSERT INTO `ploughing_service_providers` (`service_provider_id`, `service_provider_login_id`, `service_provider_name`, `service_provider_contacts`, `service_provider_address`) VALUES
(2, 12, 'Tata', '0712564532', '120 Localhost'),
(3, 13, 'Komatsu Heavy Movers', '06774231242423', '12876 Localhost'),
(4, 14, 'Sanny Inc', '000542353423', '09423 Kyoto Japan');

-- --------------------------------------------------------

--
-- Table structure for table `ploughing_service_request`
--

CREATE TABLE `ploughing_service_request` (
  `request_id` int(200) NOT NULL,
  `request_famer_id` int(200) NOT NULL,
  `request_service_provider_id` int(200) NOT NULL,
  `request_location` longtext NOT NULL,
  `request_farm_size` varchar(200) NOT NULL,
  `request_date` varchar(200) NOT NULL,
  `request_payment_status` varchar(200) NOT NULL,
  `request_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ploughing_service_request`
--

INSERT INTO `ploughing_service_request` (`request_id`, `request_famer_id`, `request_service_provider_id`, `request_location`, `request_farm_size`, `request_date`, `request_payment_status`, `request_cost`) VALUES
(2, 4, 3, 'Bomet Town', '14', '2023-07-06', 'Paid', '45000'),
(3, 4, 4, 'Narok Town', '100', '2023-06-22', 'Paid', '56000'),
(4, 1, 4, 'Kilgoris', '10', '2023-06-23', 'Paid', '25000'),
(5, 1, 3, 'Bomet', '100', '2023-07-08', 'Paid', '90000'),
(6, 4, 2, 'Iten', '100', '2023-06-30', 'Paid', '150000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `AdminLogin` (`admin_login_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`),
  ADD KEY `FarmerLogin` (`farmer_login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PaymentRequestID` (`payment_request_id`);

--
-- Indexes for table `ploughing_service_providers`
--
ALTER TABLE `ploughing_service_providers`
  ADD PRIMARY KEY (`service_provider_id`),
  ADD KEY `ServiceProvderName` (`service_provider_login_id`);

--
-- Indexes for table `ploughing_service_request`
--
ALTER TABLE `ploughing_service_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `RequestFARMER` (`request_famer_id`),
  ADD KEY `RequestProvider` (`request_service_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ploughing_service_providers`
--
ALTER TABLE `ploughing_service_providers`
  MODIFY `service_provider_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ploughing_service_request`
--
ALTER TABLE `ploughing_service_request`
  MODIFY `request_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `AdminLogin` FOREIGN KEY (`admin_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `FarmerLogin` FOREIGN KEY (`farmer_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `PaymentRequestID` FOREIGN KEY (`payment_request_id`) REFERENCES `ploughing_service_request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ploughing_service_providers`
--
ALTER TABLE `ploughing_service_providers`
  ADD CONSTRAINT `ServiceProvderName` FOREIGN KEY (`service_provider_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ploughing_service_request`
--
ALTER TABLE `ploughing_service_request`
  ADD CONSTRAINT `RequestFARMER` FOREIGN KEY (`request_famer_id`) REFERENCES `farmers` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RequestProvider` FOREIGN KEY (`request_service_provider_id`) REFERENCES `ploughing_service_providers` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
