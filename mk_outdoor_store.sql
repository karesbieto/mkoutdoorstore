-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 08:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mk_outdoor_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tents and Shelters'),
(2, 'Sleeping Pads / Bags'),
(3, 'Cookware'),
(4, 'Camping Stove'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `subject`, `message`, `time`) VALUES
(1, 'Kate', 'Esbieto', 'karesbieto0304@gmail.com', 'Test lang', 'Tsting Only', '2019-05-28 04:48:58'),
(2, 'MK', 'Esbieto', 'mkesbieto@mail.com', 'Where is your store?', 'I would like to ask the exact location of the store. And can you guide me on how to get there?', '2019-05-28 05:00:21'),
(3, 'Kate', 'Esbieto', 'karesbieto0304@gmail.com', 'Tents', 'Do you have a tent good for 14 persons?', '2019-05-28 05:02:36'),
(4, 'Kate', 'Esbieto', 'karesbieto0304@gmail.com', 'Stove', 'How much is the dual stove?', '2019-05-28 05:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(1, 'Mountain Trails Tent', '3300.00', 'Twin Peaks Tent', '../assets/images/mountaintrailstwinpeaktent.jpg', 1),
(2, 'Klymit Insulated', '4250.00', 'Static V', '../assets/images/klymitinsulated.webp', 2),
(3, 'Sleeping Bag', '4590.00', 'Snugpak Jungle ', '../assets/images/Snugpak_Enhanced_Patrol_Poncho.jpg', 2),
(4, 'Kovea Camp 1', '3795.00', 'Expedition Stove', '../assets/images/koveastove.jpg', 4),
(8, 'Sierra Designs Studio ', '18895.00', '2 Person Tent', '../assets/images/sierradesign.webp', 1),
(9, 'Sierra Designs Tarp', '18895.00', ' Mountain Guide Tarp', '../assets/images/Sierradesignountainguidetarp.webp', 1),
(10, 'Kovea Cookset', '2190.00', 'Aluminum Solo Cookset', '../assets/images/koveacookset.jpg', 3),
(11, 'Deluxe Twin Stove', '5300.00', 'White, Black', '../assets/images/twinstove.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(2, 2, 1, 2),
(3, 3, 2, 1),
(4, 4, 3, 1),
(5, 5, 2, 1),
(7, 7, 2, 1),
(8, 8, 4, 7),
(9, 9, 3, 2),
(10, 9, 2, 2),
(12, 10, 9, 1),
(13, 11, 1, 1),
(14, 11, 2, 1),
(15, 12, 1, 1),
(16, 12, 2, 1),
(17, 13, 1, 1),
(18, 13, 2, 1),
(19, 14, 1, 1),
(20, 14, 2, 1),
(21, 15, 1, 1),
(22, 15, 2, 1),
(23, 16, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transaction_code`, `purchase_date`, `total`, `status_id`, `payment_mode_id`) VALUES
(2, 3, 'DF4B8E - 15', '0000-00-00', '250.00', 1, 1),
(3, 3, '503DCC - 15', '0000-00-00', '250.00', 1, 1),
(4, 3, '3B7EE0 - 15', '0000-00-00', '150.00', 1, 1),
(5, 3, '87757A - 15', '0000-00-00', '250.00', 1, 1),
(7, 3, '20FC85 - 15', '0000-00-00', '250.00', 1, 1),
(8, 3, '4F0530 - 15', '0000-00-00', '700.00', 1, 1),
(9, 3, '0CE9E1-1558519216', '0000-00-00', '800.00', 1, 1),
(10, 3, '380DCC-1558524222', '2019-05-22', '150.00', 1, 1),
(11, 3, '9478EA-1558617565', '2019-05-23', '375.00', 1, 1),
(12, 3, '35F089-1558617626', '2019-05-23', '375.00', 1, 1),
(13, 3, 'B5D659-1558617749', '2019-05-23', '375.00', 1, 1),
(14, 3, '32128D-1558618024', '2019-05-23', '375.00', 1, 1),
(15, 3, '29C05D-1558618108', '2019-05-23', '375.00', 1, 1),
(16, 3, 'BE8D2E-1558689660', '2019-05-24', '450.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Completed'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `address`, `role_id`) VALUES
(1, 'Mark', 'Esbieto', 'mk', 'mkesbi', 'mkesbi@gmail.com', 'Paranaque', 2),
(2, 'Kate', 'Esbieto', 'karesbieto', 'karesbieto0304', 'karesbieto@gmail.com', 'Paranaque', 2),
(3, 'Kate', 'Esbieto', 'kesbieto', '$2y$10$YNIFwNRNUzuQsrebC2IPUOP3IilTVYWlQ96VGp1bDy/G7Qc/H2GjC', 'karesbieto0304@gmail.com', 'Paranaque', 2),
(4, 'Mk', 'Esbeito', 'mkesbieto', '$2y$10$XGNRuDHZjTpv9s57CkabqecMOvOdfWSU.QL/18AGEh3be7WGcyNzC', 'mkesbieto@gmail.com', 'Paranaque', 2),
(5, 'Mk Outdoor', 'Store Admin', 'mkadmin', '$2y$10$WPB2fDIQkFj1TCeZMVoIReUx6A4GZgm0MNvT.vwg.Yh8QeTMUHM/m', 'mkoutdoorstore@gmail.com', 'Paranaque', 1),
(6, 'Mk', 'Restaurant', 'mkresto', '$2y$10$tyEnaLbtngNlidHUcecOPuOreyyTPMVMUvGp.HrOXcYVstqWD2/Yi', 'mkrestaurant03@gmail.com', 'Paranaque', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymend_mode_id` (`payment_mode_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `item_order`
--
ALTER TABLE `item_order`
  ADD CONSTRAINT `item_order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
