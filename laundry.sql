-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2022 at 09:06 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_email` varchar(30) DEFAULT NULL,
  `admin_phone_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone_no`) VALUES
(1, 'admin', 'admin@gmail', '0754667788'),
(2, 'Jacob', 'jacob@gmail.com', '0799665544'),
(3, 'admin amdin', 'amdins@gmail.com', '0777331122'),
(4, 'mohammed mohammed', 'mohammed@gmail.com', '0723288187');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(30) DEFAULT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_phone_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone_no`) VALUES
(10, 'test user', 'customers@gmail.com', '0788201122'),
(11, 'mkeme jdkneend', 'customertwo@gmail.com', '0788110099'),
(12, 'customer che', 'customersd@gmail.com', '0788221900'),
(13, 'regina james', 'regina@gmail.com', '0788766559');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int NOT NULL,
  `order_ref` varchar(30) DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `order_delivery_required` varchar(30) DEFAULT NULL,
  `order_delivery_location` varchar(30) DEFAULT NULL,
  `order_customer_id` int DEFAULT NULL,
  `order_status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `order_ref`, `order_date`, `order_delivery_required`, `order_delivery_location`, `order_customer_id`, `order_status`) VALUES
(9, 'W3907Sl61', '2022-09-16 10:53:06', 'Tuesday', 'kiambu', 11, 'on transit'),
(10, '03KRR7116', '2022-09-16 12:06:14', 'Sunday', 'kisumu ndogo', 12, 'on transit'),
(11, 'X1767F210', '2022-09-16 12:30:14', 'Tuesday', 'kiakmdkde', 11, 'delivered'),
(13, 'w2l96167K', '2022-09-17 11:44:54', 'Sunday', 'Nairobi', 13, 'delivered'),
(14, '8O8389R26', '2022-09-17 11:51:29', 'Thursday', 'kisumu', 13, 'pending'),
(15, '768S96iC0', '2022-09-17 11:52:09', 'Wednesday', 'kisumu', 13, 'on transit');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_items`
--

CREATE TABLE `customer_order_items` (
  `item_id` int NOT NULL,
  `item_total_cost` varchar(30) DEFAULT NULL,
  `item_comments` varchar(30) DEFAULT NULL,
  `item_order_id` int DEFAULT NULL,
  `item_service_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_order_items`
--

INSERT INTO `customer_order_items` (`item_id`, `item_total_cost`, `item_comments`, `item_order_id`, `item_service_id`) VALUES
(5, '230', 'Button replacement', 9, 2),
(9, '200', 'all white shirts regarededede', 13, 5),
(10, '200', 'all white shirts regarededede', 14, 5),
(11, '230', 'Button replacement', 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int NOT NULL,
  `delivery_ref` varchar(30) DEFAULT NULL,
  `delivery_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `delivery_comments` varchar(30) DEFAULT NULL,
  `delivery_employee_id` int DEFAULT NULL,
  `delivery_order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_ref`, `delivery_date`, `delivery_comments`, `delivery_employee_id`, `delivery_order_id`) VALUES
(3, '782K73D66', '2022-09-16 11:40:53', 'on transit', 7, 9),
(4, '473J2N58j', '2022-09-16 12:07:35', 'on transit', 7, 10),
(5, '9WJ296162', '2022-09-16 12:30:51', 'delivered', 8, 11),
(6, 'O5F64V706', '2022-09-17 11:54:24', 'delivered', 9, 13),
(7, '7343R46oA', '2022-09-17 11:55:04', 'on transit', 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int NOT NULL,
  `employee_name` varchar(30) DEFAULT NULL,
  `employee_email` varchar(30) DEFAULT NULL,
  `employee_phone_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_phone_no`) VALUES
(7, 'delivery', 'delivery@gmail.com', '0788112211'),
(8, 'employee chedked', 'employeees@gmail.com', '0788222222'),
(9, 'rozina peter', 'rozina@gmail.com', '0722112233');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int NOT NULL,
  `login_username` varchar(30) DEFAULT NULL,
  `login_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `login_rank` varchar(30) DEFAULT NULL,
  `login_admin_id` int DEFAULT NULL,
  `login_customer_id` int DEFAULT NULL,
  `login_employee_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`, `login_admin_id`, `login_customer_id`, `login_employee_id`) VALUES
(3, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 1, NULL, NULL),
(16, 'customertwo', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', NULL, 11, NULL),
(17, 'adminadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 3, NULL, NULL),
(18, 'deliveryguy', 'delivery', 'employee', NULL, NULL, 7),
(19, 'customerthree', 'f5e3cdfb1aebecb1c5cec2589e0957b9', 'customer', NULL, 12, NULL),
(20, 'employeetest', '5f4dcc3b5aa765d61d8327deb882cf99', 'employee', NULL, NULL, 8),
(21, 'mohammed', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 4, NULL, NULL),
(22, 'regina', '221182760f5b980c97c7a74a94d57364', 'customer', NULL, 13, NULL),
(23, 'rozina', '91c5c95159f7377b0b87600fa254cf9b', 'employee', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `payment_amount` int DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_mode` varchar(30) DEFAULT NULL,
  `payment_ref` varchar(30) DEFAULT NULL,
  `payment_order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `payment_date`, `payment_mode`, `payment_ref`, `payment_order_id`) VALUES
(5, 230, '2022-09-16 10:53:12', 'M-PESA', 'okjhngdsbt', 9),
(6, 988, '2022-09-16 12:06:20', 'M-PESA', 'kmnhgbfde8', 10),
(7, 230, '2022-09-16 12:30:20', 'M-PESA', 'kmnbvcfdsd', 11),
(9, 200, '2022-09-17 11:45:13', 'M-PESA', 'plmkjhbgfd', 13),
(10, 200, '2022-09-17 11:51:36', 'M-PESA', 'okjhbgfdr6', 14),
(11, 230, '2022-09-17 11:52:17', 'M-PESA', 'okjhbgfder', 15);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int NOT NULL,
  `service_name` varchar(30) DEFAULT NULL,
  `service_cost_description` varchar(50) DEFAULT NULL,
  `service_desc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_cost_description`, `service_desc`) VALUES
(2, 'Repair', '230', 'Button replacement'),
(5, 'washing 5 white shirts', '200', 'all white shirts regarededede');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer_id` (`order_customer_id`);

--
-- Indexes for table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_service_id` (`item_service_id`),
  ADD KEY `item_order_id` (`item_order_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `delivery_employee_id` (`delivery_employee_id`),
  ADD KEY `delivery_order_id` (`delivery_order_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `login_employee_id` (`login_employee_id`),
  ADD KEY `login_customer_id` (`login_customer_id`),
  ADD KEY `login_admin_id` (`login_admin_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_order_id` (`payment_order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`order_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  ADD CONSTRAINT `customer_order_items_ibfk_1` FOREIGN KEY (`item_service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_items_ibfk_2` FOREIGN KEY (`item_order_id`) REFERENCES `customer_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`delivery_employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`delivery_order_id`) REFERENCES `customer_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`login_employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`login_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`login_admin_id`) REFERENCES `Admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payment_order_id`) REFERENCES `customer_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
