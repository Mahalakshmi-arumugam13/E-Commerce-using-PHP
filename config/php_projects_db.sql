-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:19 PM
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
-- Database: `php_projects_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customername` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `totalprice` varchar(500) NOT NULL,
  `ordercreationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customername`, `email`, `phone`, `address`, `totalprice`, `ordercreationdate`) VALUES
(1, 'Mahalakshmi Arumugam', 'mahasuji13@gmail.com', '8754988536', 'Thiruppathur', '1200', '2024-06-03 11:41:35'),
(2, 'Seetha', 'seetha@gmail.com', '9087898765', 'Karaikudi', '1798', '2024-06-03 11:49:02'),
(3, 'Preethi', 'prrethi@gmail.com', '6789098789', 'Madurai', '6350', '2024-06-03 11:57:18'),
(4, 'Moorthy', 'moorthy@gmail.com', '8797979789', 'Chennai', '6350', '2024-06-03 12:11:18'),
(5, 'Jamu', 'jamu@gmail.com', '8976565678', 'Thiruppathur', '1339', '2024-06-03 12:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, '2', 'Key Board', '1'),
(2, '6', 'Wireless Modem', '2'),
(3, '2', 'Key Board', '1'),
(4, '6', 'Wireless Modem', '2'),
(5, '3', 'Mouse', '1'),
(6, '7', 'Wireless Keyboard', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `quantity`, `createddate`) VALUES
(1, 'Hard Disk', 'A hard disk is a data storage device that uses magnetic storage to store and retrieve digital information using one or more rigid rapidly rotating disks (platters) coated with magnetic material.', 1350, 'uploads/harddisk.jpg', '', '2024-06-03 09:10:58'),
(2, 'Key Board', 'A keyboard is an input device consisting of a set of keys that allows a user to input text, numbers, and commands into a computer or other digital devices.', 550, 'uploads/keyboard.webp', '', '2024-06-03 09:11:37'),
(3, 'Mouse', 'It typically includes buttons and sometimes a scroll wheel, allowing users to execute commands and navigate efficiently.', 440, 'uploads/mouse.jpg', '', '2024-06-03 09:13:24'),
(4, 'Pendrive', 'A pendrive, also known as a USB flash drive, is a portable storage device that uses flash memory and connects to computers via a USB port.', 700, 'uploads/pendrive.jpg', '', '2024-06-03 09:14:00'),
(5, 'Wifi Adapter', 'A WiFi adapter is a device that allows a computer or other electronic device to connect to a wireless network, enabling access to the internet and other network resources.', 880, 'uploads/wifi-adapter.jpg', '', '2024-06-03 09:14:32'),
(6, 'Wireless Modem', 'A wireless modem is a device that connects to the internet via a mobile network, providing WiFi connectivity to multiple devices without the need for wired connections.', 2900, 'uploads/wireless-modem.jpg', '', '2024-06-03 09:14:46'),
(7, 'Wireless Keyboard', 'A wireless keyboard is an input device that connects to a computer or other devices via Bluetooth or RF technology, eliminating the need for physical cables.', 899, 'uploads/keychron-k3.webp', '', '2024-06-03 09:15:09'),
(8, 'Headband', 'A headband is a fabric or flexible material worn around the head, typically to keep hair in place or to absorb sweat during physical activities.', 1220, 'uploads/zebronics-headband.jpg', '', '2024-06-03 09:15:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
