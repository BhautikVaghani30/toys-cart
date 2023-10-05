-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 10:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecoomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(15, 'om jethva', 'om@gmail.com', '123'),
(17, 'bhautik', 'bhautik@gmail.com', '123'),
(19, 'dhruv ', 'dhruv@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart__id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `amount` int(50) NOT NULL,
  `que` int(50) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fid` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `F_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fid`, `username`, `email`, `F_desc`) VALUES
(1, '.bhautik.', '.bhautik@gmail.com.', '.this om toys store is very good center for buying toys.'),
(2, '.dhrupal.', '.dhrupal@gmail.com.', '.Clarity and Spelling: Consider using the correct spelling, \"Toy Store,\" to ensure clarity and avoid confusion among potential customers. Proper spelling enhances professionalism and credibility..'),
(3, '.goti.', '.goti@gmail.com.', '.Domain Availability: Check the availability of domain names associated with your chosen name. A strong online presence often starts with a domain name that matches your business name..'),
(4, '.selvin.', '.selvin@gmail.com.', '.Brand Identity: Think about the brand identity you want to create and ensure that the name aligns with your vision and target audience. A playful, whimsical name may appeal to children, while a more sophisticated name might target collectors or specialty toy buyers..');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `que` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'Panding'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `product_id`, `item_name`, `picture`, `amount`, `total_amount`, `created_at`, `que`, `order_status`) VALUES
(1, 1, 17, 'super car', 'p15.jpg', '250', 250, '2023-10-03 06:10:34', 1, 'Panding'),
(2, 1, 18, 'Racing car', 'product9.jpg', '99', 99, '2023-10-03 06:11:09', 1, 'Confirm'),
(3, 1, 24, 'soft toy', 'softtoy2.jpg', '299', 299, '2023-10-03 06:11:25', 1, 'Confirm'),
(4, 1, 28, 'Dog', 'p3.jpg', '199', 597, '2023-10-03 07:38:31', 3, 'Pending'),
(5, 1, 30, 'Penguin', 'p5.jpg', '150', 300, '2023-10-03 06:11:45', 2, 'Confirm'),
(6, 1, 34, 'VEBETO', 'p9.jpg', '699', 4194, '2023-10-03 07:38:23', 6, 'Pending'),
(7, 1, 35, 'Multicolor', 'p10.jpg', '123', 615, '2023-10-03 06:11:57', 5, 'Confirm'),
(8, 28, 17, 'super car', 'p15.jpg', '250', 750, '2023-10-03 06:30:40', 3, 'Pending'),
(9, 28, 18, 'Racing car', 'product9.jpg', '99', 198, '2023-10-03 06:30:31', 2, 'Confirm'),
(10, 28, 24, 'soft toy', 'softtoy2.jpg', '299', 299, '2023-10-03 06:29:18', 1, 'Confirm'),
(11, 28, 30, 'Penguin', 'p5.jpg', '150', 150, '2023-10-03 07:38:38', 1, 'Pending'),
(12, 1, 35, 'Multicolor', 'p10.jpg', '123', 123, '2023-10-03 07:37:42', 1, 'Confirm'),
(13, 1, 38, 'teddy ber', 'p19.jpg', '200', 200, '2023-10-03 08:04:40', 1, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `order_add_id` int(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(100) NOT NULL,
  `datetime` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`order_add_id`, `fullname`, `email`, `address`, `city`, `state`, `zip`, `datetime`, `user_id`) VALUES
(1, 'Angie Odom', 'vaghani@gmail.com', '2628 CARATOKE HWY', 'MOYOCK, NC', 'North Carolina', 27958, '2023-10-03 10:09:04', 1),
(2, 'Angie Odom', 'vaghani@gmail.com', '2628 CARATOKE HWY', 'MOYOCK, NC', 'North Carolina', 27958, '2023-10-03 10:13:04', 1),
(3, 'Angie Odom', 'vaghani@gmail.com', '2628 CARATOKE HWY', 'MOYOCK, NC', 'North Carolina', 27958, '2023-10-03 11:40:34', 1),
(4, 'dhrupal', 'dhrupal@gmail.com', 'katargam', 'surat', 'gujrat', 123456, '2023-10-03 11:56:39', 28),
(5, 'dhrupal', 'dhrupal@gmail.com', 'katargam', 'sur', 'gujrat', 123456, '2023-10-03 12:01:40', 28),
(6, 'bhautik', 'bhautik@gmail.com', 'mota varachha', 'surat', 'gujrat', 123456, '2023-10-03 13:00:09', 1),
(7, 'bhautik vaghani', 'vaghanibhautik@gmail.com', 'omkar', 'surat', 'gujrat', 123456, '2023-10-03 13:34:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(100) NOT NULL,
  `name_onc_card` varchar(100) NOT NULL,
  `credit_card_number` int(100) NOT NULL,
  `exp_month` int(100) NOT NULL,
  `exp_year` int(100) NOT NULL,
  `cvv` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `name_onc_card`, `credit_card_number`, `exp_month`, `exp_year`, `cvv`, `user_id`) VALUES
(1, 'hdfc', 1234567890, 12, 1234, 456, 1),
(2, 'hdfc', 987654321, 12, 1234, 345, 1),
(3, 'hdfc', 1234567890, 12, 0, 234, 1),
(4, 'icici', 1234567890, 6, 2026, 234, 28),
(5, 'icici', 1234567890, 6, 1234, 234, 28),
(6, 'icici', 1234567890, 12, 1234, 234, 1),
(7, 'hdfc', 2147483647, 6, 1234, 234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `item`, `desc`, `price`, `picture`) VALUES
(17, 'super car', 'Fast and famous Remote control toy for kids', 250, 'p15.jpg'),
(18, 'Racing car', 'Fast and famous Remote control toy for kids', 99, 'product9.jpg'),
(24, 'soft toy', 'Kids friendly softy toy not a harmful , so beutiful toy', 299, 'softtoy2.jpg'),
(26, 'Cable World', 'Cable World Plastic Battery Operated Converting Car to Robot, Robot to Car Automatically,Robot Toy, with Light and Sound for Kids Indoor and Outdoor 3 Year, Pack of 1', 439, 'p1.jpg'),
(27, 'Mi Arcus', 'Mi Arcus Soft Toy Dinosaur for Baby Girl and Boy 65x80 cm Dinosaur Animal Stuffed Plush Toys for Kids', 2211, 'p2.jpg'),
(28, 'Dog', 'Amazon Brand - Jam & Honey Husky Dog, Plush/Soft Toy for Boys, Girls and Kids, Super-Soft, Safe, Great Birthday Gift (Grey and White, 17 cm)', 199, 'p3.jpg'),
(29, 'VGRASSP', 'VGRASSP Magnetic Slate Toy is Very Useful, Helps Children in Learning How to Write, Read and Draw Non-Toxic Board, Small (Color as Per Stock)', 187, 'p4.jpg'),
(30, 'Penguin', 'Amazon Brand - Jam & Honey Penguin, Plush/Soft Toy for Boys, Girls and Kids, Super-Soft, Safe, Great Birthday Gift (Black and White, 17 cm)', 150, 'p5.jpg'),
(31, 'Umadiya', 'Umadiya® Branded Take Apart Dinosaur Toys, Pack of 4 Dinosaurs with Screwdrivers, Dino Kids Building Learning Toys, STEM Toy for Boys and Girls, 3 4 5 6 7 8 Year Old Boys and Girls (Dino-4)', 299, 'p6.jpg'),
(32, 'SUPER TOY', 'SUPER TOY 112 Talking Baby Flash Cards Educational Toys for 2 3 4 Years Old, Learning Resource Electronic Interactive Toys for 2-4 Year Old Boys Girls Toddlers Kids Birthday Gifts Ages 2 3 4 5', 449, 'p7.jpg'),
(33, 'Trinkets & More', 'Trinkets & More® - Wooden Hammer Ball Knock Pounding Bench with Box Case Fine Motor and Dexterity Skills Early Educational Toy Set for Kids 2+ Years (Hammer Ball)', 399, 'p8.jpg'),
(34, 'VEBETO', 'VEBETO Dancing Cactus Toy Kids (1 Year Brand Warranty) Talking Singing Wriggle Children Plush Electronic Toys Baby Voice Recording Repeats What You Say LED Lights Gift', 699, 'p9.jpg'),
(35, 'Multicolor', 'Graphene Rainbow Spring Fun Activity Stress Relief Toy for Kids Adults of All Age Group, for Birthdays, Compact and Portable Easy to Carry', 123, 'p10.jpg'),
(36, 'Mirana', 'Mirana C-Type USB Rechargeable Hover Football Indoor Floating Hoverball Soccer | Air Football Neon | Made in India Fun Toy Best Gift for Boys and Kids (Pink)', 849, 'p11.jpg'),
(37, 'tedy', 'Amazon Brand - Jam & Honey Husky Dog, Plush/Soft Toy for Boys, Girls and Kids, Super-Soft, Safe, Great Birthday Gift (Grey and White, 17 cm)', 399, 'p17.jpg'),
(38, 'teddy ber', 'this is very soft toys', 200, 'p19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `pwd`, `phone`, `addres`) VALUES
(1, 'bhautik', 'bhautik@gmail.com', '123456', '1234567890', 'surat'),
(2, 'dhaval', 'dhaval@gmail.com', '123456', '1234567890', 'surat'),
(3, 'aryan', 'aryan@gmail.com', '123456', '1234567890', 'mota varachha'),
(4, 'raj', 'raj@gmail.com', '123456', '1234567890', 'status hights'),
(5, 'vivek', 'vivek@gmail.com', '123456', '1234567890', 'nana varachha'),
(7, 'om', 'om@gmail.com', '123456', '1234567890', 'kapodra'),
(8, 'dhruv', 'dhruv@gmail.com', '123456', '1234567890', 'new katargam'),
(9, 'mayur', 'mayur@gmail.com', '123456', '1234567890', 'katargam'),
(10, 'viraj', 'viraj@gmail.com', '123456', '1234567890', 'kargil chowck'),
(11, 'sagar', 'sagar@gmail.com', '123456', '1234567890', 'kargil chowck'),
(12, 'dhruvin', 'dhruvin@gmail.com', '123456', '1234567890', 'surat'),
(13, 'krish', 'krish@gmail.com', '123456', '1234567890', 'surat'),
(14, 'uday', 'uday@gmail.com', '123456', '1234567890', 'dharam nagar road'),
(15, 'komil', 'komil@gmail.com', '123456', '1234567890', 'surat'),
(16, 'harsil', 'harsil@gmail.com', '123456', '1234567890', 'surat'),
(17, 'nayan', 'nayan@gmail.com', '123456', '1234567890', 'surat'),
(18, 'chintan', 'chintan@gmail.com', '123456', '1234567890', 'surat'),
(19, 'dhruvi', 'dhruvi@gmail.com', '123456', '1234567890', 'surat'),
(20, 'ekta', 'ekta@gmail.com', '123456', '1234567890', 'surat'),
(21, 'risha', 'risha@gmail.com', '123456', '1234567890', 'surat'),
(22, 'bhautik', 'vaghani@gmail.com', '123456', '1234567890', 'omkar'),
(23, 'priya', 'priya@gmail.com', '123456', '1234567890', 'gardn'),
(24, 'gopi', 'gopi@gmail.com', '123456', '1234567890', 'uk'),
(25, 'aryan', 'aryan@gmail.com', '123456', '1234567890', 'surat'),
(28, 'dhrupal', 'dhrupal@gmail.com', '123456', '1234567890', 'katargam'),
(29, 'goti', 'goti@gmail.com', '123456', '1234567890', 'UK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart__id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`order_add_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart__id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `order_add_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
