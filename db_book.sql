-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(5) NOT NULL,
  `cate_name` varchar(99) NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `remark`, `user_id`) VALUES
(5, 'ບັນເທິງຄະດີ', '', 2),
(6, 'ສາລະຄະດີ', '', 2),
(7, 'ໜັງສືສຳລັບເດັກ ແລະ ເຍົາລະຊົນ', '', 2),
(8, 'ໜັງສືອ້າງອີງ', '', 2),
(9, 'ໜັງສືທີ່ໃຊ້ໃນການຮຽນ', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `dis_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_name` varchar(99) NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`dis_id`, `pro_id`, `dis_name`, `remark`, `user_id`) VALUES
(1, 6, 'ໂພນໂຮງ', '', 0),
(2, 6, 'ແກ້ວອຸດົມ', '', 2),
(3, 6, 'ວັງວຽງ', '', 2),
(4, 8, 'ຊຳເໜືອ', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(5) NOT NULL,
  `bill_no` varchar(99) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `o_qty` int(5) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `o_date` date NOT NULL,
  `o_time` time NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `bill_no`, `book_id`, `o_qty`, `sprice`, `amount`, `o_date`, `o_time`, `remark`, `user_id`) VALUES
(1, '', '2222', 2, 400000.00, 800000.00, '2023-12-14', '00:21:15', '', 2),
(2, '', '2222', 2, 400000.00, 800000.00, '2023-12-14', '21:01:33', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `book_id` varchar(5) NOT NULL,
  `cate_id` int(5) NOT NULL,
  `book_name` varchar(99) NOT NULL,
  `img` varchar(255) NOT NULL,
  `authors` varchar(99) NOT NULL,
  `press` varchar(99) NOT NULL,
  `qty` int(5) NOT NULL,
  `bprice` decimal(12,2) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`book_id`, `cate_id`, `book_name`, `img`, `authors`, `press`, `qty`, `bprice`, `sprice`, `remark`, `user_id`) VALUES
('2222', 5, 'Harry potter2', 'harry potter.JPG', 'ໂມ່ຊຽງຖົງຊິ່ວ', 'peijing', 100, 300000.00, 400000.00, '', 2),
('33333', 5, 'ປະລຳມະຈານລັດທິມານ(The untamed)', 'IMG_8289.JPG', 'ໂມ່ຊຽງຖົງຊິ່ວ', 'peijing', 100, 300000.00, 400000.00, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(99) NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`pro_id`, `pro_name`, `remark`, `user_id`) VALUES
(6, 'ວຽງຈັນ', '', 0),
(7, 'ນະຄອນຫຼວງ', '', 2),
(8, 'ຫົວພັນ', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `r_id` int(5) NOT NULL,
  `bill_no` varchar(99) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `r_qty` int(5) NOT NULL,
  `bprice` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`r_id`, `bill_no`, `book_id`, `r_qty`, `bprice`, `amount`, `r_date`, `r_time`, `remark`, `user_id`) VALUES
(4, '', '2222', 2, 300000.00, 600000.00, '2023-12-13', '23:52:44', '', 2),
(5, '', '2222', 2, 300000.00, 600000.00, '2023-12-14', '00:15:03', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `vill_id` int(5) NOT NULL,
  `fname` varchar(999) NOT NULL,
  `lname` varchar(999) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(99) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `username` varchar(999) NOT NULL,
  `status` varchar(999) NOT NULL,
  `password` varchar(90) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `pro_id`, `dis_id`, `vill_id`, `fname`, `lname`, `dob`, `gender`, `tel`, `username`, `status`, `password`, `remark`) VALUES
(2, 6, 1, 1, 'Nee', 'MP', '2005-02-11', 'F', '020584747436', 'nee', 'admin', '123', ''),
(3, 6, 1, 1, 'ມະນີ', 'ຄໍາທາວົງ', '2005-02-11', 'ຍິງ', '02094237977', 'Nunee', 'ຜູ້ບໍລິຫານ', '*0801D10217B06C5A9F32430C1A34E030D41A0257', '');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `vill_id` int(5) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `vill_name` varchar(99) NOT NULL,
  `remark` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`vill_id`, `pro_id`, `dis_id`, `vill_name`, `remark`, `user_id`) VALUES
(1, 6, 1, 'ແຈ້ງສະຫວ່າງ', '', 0),
(2, 6, 2, 'ແສງສະຫວ່າງ', '', 2),
(3, 8, 4, 'ທາດເມືອງ', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vill_id` (`vill_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`vill_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `dis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `vill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `products` (`book_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `products` (`book_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `districts` (`dis_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`vill_id`) REFERENCES `villages` (`vill_id`);

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `provinces` (`pro_id`),
  ADD CONSTRAINT `villages_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `districts` (`dis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
