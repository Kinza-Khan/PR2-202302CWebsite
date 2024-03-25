-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 06:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptechstudent`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `salaryInc` (`e_id` INT, `e_salary` INT)  BEGIN
UPDATE faculty SET salary = salary + e_salary WHERE id = e_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `salInc` (`e_id` INT, `e_inc` INT)  BEGIN
UPDATE faculty SET salary =  salary + e_inc WHERE id = e_id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `salInc2` (`e_id_start` INT, `e_id_end` INT, `e_inc` INT)  BEGIN
-- UPDATE faculty SET salary =  salary + e_inc WHERE id >= e_id_start AND id <= e_id_end;
UPDATE faculty SET salary =  salary + e_inc WHERE id BETWEEN e_id_start AND e_id_end ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `salInc3` (`e_id_start` INT, `e_id_end` INT, `e_inc` INT)  BEGIN 
IF e_inc>0 THEN
BEGIN
-- UPDATE faculty SET salary =  salary + e_inc WHERE id >= e_id_start AND id <= e_id_end;
UPDATE faculty SET salary =  salary + e_inc WHERE id BETWEEN e_id_start AND e_id_end ;
END;
ELSE 
SELECT "you can't enter negative amount";
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'apple'),
(2, 'samsung'),
(3, 'sogo');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `des`) VALUES
(1, 'mobiles', 'abc'),
(2, 'laptops', 'hello'),
(3, 'watches', 'hello abc');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `des`, `image`) VALUES
(1, 'Mobiles', 'abc', 'mobile.webp'),
(2, 'bags', 'abcsdjsd', 'bags.webp'),
(3, 'Watch', 'abc', 'watch.webp');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `h_pay` int(11) NOT NULL,
  `y_pay` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `salary`, `department`, `h_pay`, `y_pay`, `dateTime`) VALUES
(1, 'Sir Mujahid', 100000, 'Mathematics', 340, 707200, '2023-12-29 07:34:54'),
(2, 'Sir Alvi', 105000, 'Chemistry', 350, 728000, '2023-12-29 07:30:29'),
(3, 'Sir Shabbir', 125000, 'Mathematics', 500, 1040000, '2023-12-29 07:30:29'),
(4, 'Sir hamza', 85000, 'Chemistry', 230, 478400, '2023-12-29 07:30:29'),
(5, 'sohial', 55000, 'admin', 0, 0, '2023-12-29 07:30:29'),
(6, 'musfirah', 85000, 'faculty', 450, 936000, '2023-12-29 07:31:54');

--
-- Triggers `faculty`
--
DELIMITER $$
CREATE TRIGGER `changePay` BEFORE INSERT ON `faculty` FOR EACH ROW BEGIN
SET NEW.y_pay = NEW.h_pay*2080;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeTime` BEFORE UPDATE ON `faculty` FOR EACH ROW BEGIN 
SET NEW.dateTime = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeYearlyPay` BEFORE UPDATE ON `faculty` FOR EACH ROW BEGIN
SET NEW.y_pay = NEW.h_pay*2080;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `total_products` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `u_id`, `u_name`, `u_email`, `total_products`, `total_amount`, `date_time`, `status`) VALUES
(1, 5, 'ali', 'ali@gmail.com', 5, 21000, '2024-02-28 07:09:25', 'pending'),
(2, 5, 'ali', 'ali@gmail.com', 5, 76000, '2024-02-28 07:13:15', 'pending'),
(3, 6, 'sana', 'sana@gmail.com', 3, 46000, '2024-03-01 06:35:58', 'approved'),
(4, 7, 'daniyal', 'daniyalrizwankhan2332@gmail.com', 3, 33000, '2024-03-01 07:23:17', 'approved');

-- --------------------------------------------------------

--
-- Stand-in structure for view `myallproductsdata`
-- (See below for the actual view)
--
CREATE TABLE `myallproductsdata` (
`name` varchar(50)
,`price` int(11)
,`des` varchar(100)
,`category name` varchar(50)
,`brand name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mydata`
-- (See below for the actual view)
--
CREATE TABLE `mydata` (
`Product Name` varchar(50)
,`price` int(11)
,`Category Name` varchar(50)
,`Brand Name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `p_id`, `p_name`, `p_price`, `p_qty`, `u_id`, `u_name`, `u_email`, `dateTime`, `status`) VALUES
(1, 1, 'Royal ', 18000, 2, 5, 'ali', 'ali@gmail.com', '2024-02-26 07:37:07', 'pending'),
(2, 3, 'Stay Bag Brown and Black', 13000, 1, 5, 'ali', 'ali@gmail.com', '2024-02-26 07:37:07', 'pending'),
(3, 3, 'Stay Bag Brown and Black', 26000, 2, 5, 'ali', 'ali@gmail.com', '2024-02-28 06:50:32', 'pending'),
(4, 6, 'abc', 270000, 3, 5, 'ali', 'ali@gmail.com', '2024-02-28 06:50:32', 'pending'),
(5, 1, 'Royal ', 27000, 3, 5, 'ali', 'ali@gmail.com', '2024-02-28 07:09:25', 'pending'),
(6, 4, 'Stay Galaxy Black', 24000, 2, 5, 'ali', 'ali@gmail.com', '2024-02-28 07:09:25', 'pending'),
(7, 2, 'Gucci', 40000, 2, 5, 'ali', 'ali@gmail.com', '2024-02-28 07:13:15', 'pending'),
(8, 4, 'Stay Galaxy Black', 36000, 3, 5, 'ali', 'ali@gmail.com', '2024-02-28 07:13:15', 'pending'),
(9, 3, 'Stay Bag Brown and Black', 26000, 2, 6, 'sana', 'sana@gmail.com', '2024-03-01 06:35:58', 'pending'),
(10, 2, 'Gucci', 20000, 1, 6, 'sana', 'sana@gmail.com', '2024-03-01 06:35:58', 'pending'),
(11, 4, 'Stay Galaxy Black', 24000, 2, 7, 'daniyal', 'daniyalrizwankhan2332@gmail.com', '2024-03-01 07:23:17', 'pending'),
(12, 1, 'Royal ', 9000, 1, 7, 'daniyal', 'daniyalrizwankhan2332@gmail.com', '2024-03-01 07:23:17', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `des`, `price`, `qty`, `image`, `c_id`) VALUES
(1, 'Royal ', 'Keep your hands free while keeping all your belongings safe and secure in this ultra-roomy 3-piece bag', 9000, 90, 'bg4.webp', 2),
(2, 'Gucci', 'this handy carrier is set to be your new daily staple. Bag X designed it with dedication so you can pair it with all of your outfits, from dresses to jeans, to look effortlessly gorgeous.', 20000, 90, 'bg3.webp', 2),
(3, 'Stay Bag Brown and Black', 'Branded Watches for Men. Upto 70% OFF on Men\'s Watches', 13000, 12, 'w3.webp', 3),
(4, 'Stay Galaxy Black', 'Shop Wrist Watches For Men in Pakistan with Free Delivery in ✓Karachi ✓Lahore', 12000, 98, 'w2.webp', 3),
(5, 'SVESTON SULTAN SV-9769-M', 'Shop Wrist Watches For Men in Pakistan with Free Delivery in ✓Karachi ✓Lahore', 15000, 89, 'w4.webp', 3),
(6, 'abc', 'SVESTON VANESIO SV-9304-M IS A GENTS STAINLESS STEEL WATCH HAVING 39MM DIAL AND COMES WITH STAINLESS STEEL WATCH CASE WITH DUAL TIME.', 90000, 67, 'w5.webp', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `des`, `c_id`, `b_id`) VALUES
(1, 'iphone 13', 20000, 'hello', 1, 1),
(2, 'iphone 14', 250000, 'hello', 1, 1),
(3, 'samsung galaxy', 150000, 'hello xyz', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `age` int(11) DEFAULT NULL CHECK (`age` > 18),
  `city` varchar(200) DEFAULT 'karachi',
  `f_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `gender`, `age`, `city`, `f_id`) VALUES
(1, 'ali', 'ali@gmail.com', 'male', 22, 'quetta', 2),
(2, 'aqsa', 'ali1@gmail.com', 'female', 22, 'lahore', 2),
(4, 'hamza khan', 'hamza@gmail.com', 'male', 22, 'quetta', 4),
(5, 'alisha', 'alisha@gmail.com', 'female', 24, 'islamabad', 2),
(6, 'meerab khan', 'meerab@gmail.com', 'female', 25, 'quetta', NULL),
(7, 'meerab', 'meerab12@gmail.com', 'female', 23, 'karachi', NULL),
(8, 'ali', 'ali12@gmail.com', 'male', 25, 'karachi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(4, 'admin', 'admin@gmail.com', '123', 1),
(5, 'ali', 'ali@gmail.com', '123', 2),
(6, 'sana', 'sana@gmail.com', '123', 2),
(7, 'daniyal', 'daniyalrizwankhan2332@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Structure for view `myallproductsdata`
--
DROP TABLE IF EXISTS `myallproductsdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `myallproductsdata`  AS SELECT `products`.`name` AS `name`, `products`.`price` AS `price`, `products`.`des` AS `des`, `categories`.`name` AS `category name`, `brands`.`name` AS `brand name` FROM ((`products` join `categories` on(`products`.`c_id` = `categories`.`id`)) join `brands` on(`products`.`b_id` = `brands`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `mydata`
--
DROP TABLE IF EXISTS `mydata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mydata`  AS SELECT `products`.`name` AS `Product Name`, `products`.`price` AS `price`, `categories`.`name` AS `Category Name`, `brands`.`name` AS `Brand Name` FROM ((`products` join `categories` on(`products`.`c_id` = `categories`.`id`)) join `brands` on(`products`.`b_id` = `brands`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
