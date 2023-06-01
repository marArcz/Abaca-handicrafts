-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:07 AM
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
-- Database: `abaca_handicraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`) VALUES
(5, 'admin', '$2y$10$gGPM2cz0vjvsPrKkIVYDAOAE5fx7qtwb9rJNh9N29MMDo1hhPuUMG', 'Administrator', 'Admin', '../../assets/images/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(11, 6, 1, 1),
(12, 7, 1, 1),
(13, 8, 1, 1),
(14, 9, 1, 1),
(15, 7, 2, 1),
(16, 13, 2, 1),
(17, 12, 2, 1),
(18, 21, 2, 1),
(22, 6, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`) VALUES
(1, 'Baskets', '../assets/images/categories/basket.png'),
(8, 'Dress', '../assets/images/categories/dress.png'),
(9, 'Souvenirs', '../assets/images/categories/souviner.png'),
(10, 'Bags', '../assets/images/categories/bag.png'),
(11, 'Footwear', '../assets/images/categories/slipers.png'),
(12, 'Vases', '../assets/images/categories/flower.png'),
(13, 'Jars', '../assets/images/categories/garapon.png'),
(14, 'Hats', '../assets/images/categories/hat.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `shipping_address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `user_id`, `total`, `status`, `shipping_address`, `payment_method`, `ordered_at`, `updated_at`) VALUES
(9, 'ABACAMAY230000000009', 2, 2040, 'Processing', 'Gogon Centro, Catanduanes, Bicol Region, 4800, Philippines', 'Cash', '2023-05-29 07:43:07', '2023-05-30 01:23:11'),
(13, 'ABACAMAY2300013', 3, 640, 'Processing', 'Philippines', 'Cash', '2023-05-30 23:30:42', '2023-06-01 01:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_image`, `quantity`) VALUES
(10, 9, 6, 'Fruit Basket', 180, '../assets/images/products/fruit basket.png', 3),
(18, 13, 12, 'Abaca Bag', 320, '../assets/images/products/bag3.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 - Out of stock\r\n1 - Available',
  `category_id` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL COMMENT '1-true, 0-false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `image`, `status`, `category_id`, `is_featured`) VALUES
(6, 'Fruit Basket', 180, 'Basket for fruits', '../assets/images/products/fruit basket.png', 1, 1, 1),
(7, 'Totbag', 120, 'Abaca totbags', '../assets/images/products/totbag group1.png', 1, 10, 1),
(8, 'Abaca Souvenir Dog', 110, 'Dog shaped souvenir made from abaca', '../assets/images/products/dog.png', 1, 9, 1),
(9, 'Pink Abaca Bag', 120, 'Bag made from abaca', '../assets/images/products/bag2.png', 1, 10, 0),
(10, 'Light brown flower vase', 210, 'Flower vase made from abaca', '../assets/images/products/flower base.png', 1, 12, 0),
(11, 'Dark brown flower vase', 210, 'Flower vase made from abaca', '../assets/images/products/flower base -1.png', 1, 12, 1),
(12, 'Abaca Bag', 320, 'Bag made of abaca', '../assets/images/products/bag3.png', 1, 10, 1),
(13, 'Fruit bowl', 260, 'Bowl for fruits', '../assets/images/products/fruit bowl.png', 1, 1, 1),
(14, 'Pink bag with ribbon', 240, 'Abaca bag styled with a ribbon', '../assets/images/products/bag6.png', 1, 10, 1),
(15, 'Abaca Hat', 149, 'Hat made from abaca', '../assets/images/products/hat.png', 1, 14, 1),
(16, 'White and green abaca dress', 3700, 'Beautiful Dress made from abaca.', '../assets/images/products/dress3.png', 1, 8, 0),
(17, 'Abaca Jar White', 89, 'Can be used to store any fitting items inside or be used as a pen holder ', '../assets/images/products/garapon dirty white.png', 1, 13, 0),
(18, 'Abaca Souvenir Carabao', 210, 'Carabao shaped souvenir made from abaca', '../assets/images/products/carabao.png', 1, 9, 1),
(19, 'Abaca Dress', 4600, 'Whole dress made from abaca', '../assets/images/products/dress.png', 1, 8, 1),
(20, 'Shoulder Bag Black', 230, 'Black shoulder bag', '../assets/images/products/bag12.png', 1, 10, 1),
(21, 'Abaca Souvenir Rabbit', 110, 'White Colored rabbit souvenir made from abaca', '../assets/images/products/rabbit white.png', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `src`) VALUES
(5, 6, '../assets/images/products/fruit basket2.png'),
(6, 7, '../assets/images/products/tobag orange.png'),
(7, 7, '../assets/images/products/totbag black and white.png'),
(8, 7, '../assets/images/products/totbag group.png'),
(9, 7, '../assets/images/products/totbag nude.png'),
(10, 7, '../assets/images/products/totpag puple.png'),
(12, 10, '../assets/images/products/flower base-up.png'),
(16, 13, '../assets/images/products/fruit bowl. side.png'),
(17, 13, '../assets/images/products/fruit bowl single.png'),
(18, 15, '../assets/images/products/hat2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `email`, `password`, `photo`) VALUES
(1, 'Marlo', 'Zafe', 'Philippines', 'johndoe@gmail.com', '$2y$10$.N.exQa360CjXPTGadQrDOVNKowuytu/ZCF7g4OqUlvrkUN6O5tCC', '../assets/images/default.jpg'),
(2, 'Marlo', 'Zafe', 'Gogon Centro, Catanduanes, Bicol Region, 4800, Philippines', 'marlozafe13@gmail.com', '$2y$10$onVcN6C7ZHt93BfTSOx.VuITWv7J1K/xy9q4hIHuxBLJYMdfaOjTW', '../assets/images/default.jpg'),
(3, 'John', 'Doe', 'Philippines', 'mar19arcz@gmail.com', '$2y$10$LlhDqcCcU1skqK0Z5aaqS.ai/YYHTqIzaxJQVaIxao0v9ErgDwjMe', '../assets/images/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
