-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 05:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latenueave`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail_log`
--

CREATE TABLE `audit_trail_log` (
  `log_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_trail_log`
--

INSERT INTO `audit_trail_log` (`log_id`, `user_id`, `login_time`, `logout_time`, `session_id`) VALUES
(124, 1, '2024-11-27 06:12:32', '2024-11-27 06:13:06', '7tov0tdacj309r3egjku4ebhge'),
(125, 24, '2024-11-27 06:12:38', '2024-11-27 06:12:59', '7tov0tdacj309r3egjku4ebhge'),
(126, 24, '2024-11-28 12:56:41', '2024-11-28 13:11:51', '57phc3q4quffa08sht6n0o6u59'),
(127, 1, '2024-11-28 13:11:56', '2024-11-28 13:15:05', '57phc3q4quffa08sht6n0o6u59'),
(128, 1, '2024-11-28 13:18:34', '2024-11-28 13:18:56', '57phc3q4quffa08sht6n0o6u59'),
(129, 1, '2024-11-28 13:19:04', '2024-11-28 16:47:07', '57phc3q4quffa08sht6n0o6u59'),
(130, 24, '2024-11-28 16:47:13', '2024-11-28 16:59:06', '57phc3q4quffa08sht6n0o6u59'),
(131, 1, '2024-11-28 16:59:10', NULL, '57phc3q4quffa08sht6n0o6u59'),
(132, 1, '2024-12-02 05:56:49', '2024-12-02 06:05:02', 'hg3ut8nhulg4m5j6316q4vukks'),
(133, 1, '2024-12-02 06:05:07', NULL, 'hg3ut8nhulg4m5j6316q4vukks'),
(134, 1, '2024-12-02 12:58:09', '2024-12-02 13:01:14', 'f6msq2a64l7a9l8pudoidud21e'),
(135, 1, '2024-12-02 13:14:48', '2024-12-02 13:15:12', 'f6msq2a64l7a9l8pudoidud21e'),
(136, 22, '2024-12-02 18:22:39', NULL, 'liqh3rmi4jkpg865jo5j46n8gr'),
(137, 22, '2024-12-03 02:34:04', '2024-12-03 03:10:43', '2ub7va0gffk7s4e3scb42kbu31'),
(138, 1, '2024-12-03 03:04:19', '2024-12-03 03:10:47', '2ub7va0gffk7s4e3scb42kbu31'),
(139, 24, '2024-12-03 03:12:38', '2024-12-03 03:13:29', 'od796hliaqrs1nj5d0if4no5ns'),
(140, 22, '2024-12-03 03:13:31', '2024-12-03 03:13:43', '2ub7va0gffk7s4e3scb42kbu31'),
(141, 22, '2024-12-03 07:15:15', '2024-12-03 07:15:51', '2ub7va0gffk7s4e3scb42kbu31'),
(142, 1, '2024-12-03 12:07:43', '2024-12-03 12:37:20', 'q985dm8euafd1dp31hr8ucf4pk'),
(143, 22, '2024-12-03 12:34:28', '2024-12-03 12:36:29', 'q985dm8euafd1dp31hr8ucf4pk'),
(144, 1, '2024-12-04 04:03:36', NULL, '9e17gsj5lsf06hceei025ga4c0'),
(145, 24, '2024-12-04 04:37:45', NULL, '9e17gsj5lsf06hceei025ga4c0'),
(146, 1, '2024-12-04 21:45:31', '2024-12-04 21:55:52', '57bgngjrh6pf4af04js8licd3n'),
(147, 22, '2024-12-04 21:50:42', '2024-12-04 21:56:09', '57bgngjrh6pf4af04js8licd3n'),
(149, 28, '2024-12-05 04:24:39', '2024-12-05 04:24:51', 'k9qp6q5qv6fq4mhr690194ol2a'),
(150, 28, '2024-12-05 04:25:40', '2024-12-05 04:26:40', 'k9qp6q5qv6fq4mhr690194ol2a'),
(151, 29, '2024-12-05 05:38:40', NULL, '2cvadcrls8e37175fe542ci2cm'),
(152, 30, '2024-12-05 06:04:03', NULL, 'k9qp6q5qv6fq4mhr690194ol2a'),
(153, 1, '2024-12-05 06:06:14', NULL, 'k9qp6q5qv6fq4mhr690194ol2a');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_info`
--

CREATE TABLE `bank_account_info` (
  `bank_id` int(10) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `bank_acct_no` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_account_info`
--

INSERT INTO `bank_account_info` (`bank_id`, `bank_name`, `first_name`, `last_name`, `middle_name`, `bank_acct_no`) VALUES
(4, 'Landbank', 'Jhon Paul', 'Manlapaz', 'Gascon', '97643672');

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `name` varchar(255) NOT NULL,
  `municipality_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`name`, `municipality_name`) VALUES
('Bagumbayan', 'Bocaue'),
('Balagtas', 'Bocaue'),
('Bambang', 'Bocaue'),
('Biñang 1st', 'Bocaue'),
('Biñang 2nd', 'Bocaue'),
('Bolacan', 'Bocaue'),
('Bunlo', 'Bocaue'),
('Caingin', 'Bocaue'),
('Duhat', 'Bocaue'),
('Igulot', 'Bocaue'),
('Lolomboy', 'Bocaue'),
('Palingsapar', 'Bocaue'),
('Santol', 'Bocaue'),
('Sulucan', 'Bocaue'),
('Tambubongg', 'Bocaue'),
('Turo', 'Bocaue'),
('Wakas North', 'Bocaue'),
('Wakas South', 'Bocaue'),
('Abangan Norte', 'Marilao'),
('Abangan Sur', 'Marilao'),
('Ibayo', 'Marilao'),
('Lambakin', 'Marilao'),
('Lias', 'Marilao'),
('Nagbalon', 'Marilao'),
('Patubig', 'Marilao'),
('Poblacion I', 'Marilao'),
('Poblacion II', 'Marilao'),
('Prenza I', 'Marilao'),
('Prenza II', 'Marilao'),
('Saog', 'Marilao'),
('Sta. Rosa I', 'Marilao'),
('Sta. Rosa II', 'Marilao'),
('Tabing Ilog', 'Marilao'),
('Tambubong', 'Marilao'),
('Bagbaguin', 'Meycauayan'),
('Bahay Pare', 'Meycauayan'),
('Bancal', 'Meycauayan'),
('Banga', 'Meycauayan'),
('Bangkal', 'Meycauayan'),
('Bayugo', 'Meycauayan'),
('Calvario', 'Meycauayan'),
('Camalig', 'Meycauayan'),
('Hulo', 'Meycauayan'),
('Iba', 'Meycauayan'),
('Langka', 'Meycauayan'),
('Lawa', 'Meycauayan'),
('Liputan', 'Meycauayan'),
('Longos', 'Meycauayan'),
('Malhacan', 'Meycauayan'),
('Pandayan', 'Meycauayan'),
('Pantoc', 'Meycauayan'),
('Perez', 'Meycauayan'),
('Poblacion', 'Meycauayan'),
('Saluysoy', 'Meycauayan'),
('Tugatog', 'Meycauayan'),
('Ubihan', 'Meycauayan'),
('Zamora', 'Meycauayan');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `variation_id`, `quantity`) VALUES
(29, 1, 28, 2),
(30, 1, 19, 2),
(31, 1, 24, 2),
(48, 22, 14, 1),
(49, 22, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Tops'),
(2, 'Dresses'),
(3, 'Pants'),
(4, 'Bags'),
(19, 'Top and Bottom');

-- --------------------------------------------------------

--
-- Table structure for table `e_wallet_info`
--

CREATE TABLE `e_wallet_info` (
  `e_wallet_id` int(10) NOT NULL,
  `e_wallet_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `e_wallet_no` varchar(128) NOT NULL,
  `e_wallet_qrcode` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_wallet_info`
--

INSERT INTO `e_wallet_info` (`e_wallet_id`, `e_wallet_name`, `last_name`, `first_name`, `middle_name`, `e_wallet_no`, `e_wallet_qrcode`) VALUES
(1, 'GCash', 'Manlapaz', 'Jhon Paul', 'Gascon', '0961170037', './payments/658086.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `invoice_created` date NOT NULL DEFAULT current_timestamp(),
  `tax` decimal(10,2) NOT NULL DEFAULT 0.12,
  `invoice_total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `user_id`, `order_id`, `invoice_created`, `tax`, `invoice_total_amount`) VALUES
(1, 24, 17, '2024-12-04', 0.12, 658.88),
(2, 22, 15, '2024-12-05', 0.12, 692.48),
(3, 22, 16, '2024-12-05', 0.12, 996.00),
(4, 30, 20, '2024-12-05', 0.12, 1419.36),
(5, 29, 19, '2024-12-05', 0.12, 692.48);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_details_id` int(10) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `detail_id` int(10) NOT NULL,
  `invoice_subtotal_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `payment_method_id` int(10) NOT NULL,
  `payment_method` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mode_of_payment`
--

INSERT INTO `mode_of_payment` (`payment_method_id`, `payment_method`) VALUES
(1, 'E-Wallet'),
(3, 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `name` varchar(255) NOT NULL,
  `province_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`name`, `province_name`) VALUES
('Bocaue', 'Bulacan'),
('Marilao', 'Bulacan'),
('Meycauayan', 'Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(150) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `payment_slip` varchar(128) NOT NULL,
  `pay_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` int(50) NOT NULL DEFAULT 0,
  `ship_id` int(10) DEFAULT NULL,
  `payment_method_id` int(10) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivered_to`, `phone_no`, `payment_slip`, `pay_status`, `order_date`, `order_status`, `ship_id`, `payment_method_id`, `subtotal`, `total_amount`) VALUES
(10, 22, 'Pipoy Backburner', '0961170031', 'pay_slip_673a1e97d22758.32602018.jpg', 1, '2024-11-18', 0, 8, 1, 3696.00, 4239.52),
(11, 22, 'Jp Manlapaz', '0912345678', 'pay_slip_673f8a6bdafd56.85567772.jpg', 1, '2024-11-22', 1, 9, 1, 0.00, 100.00),
(12, 22, 'Jp Manlapaz', '0912345678', 'pay_slip_673f8d55d29ee2.89114393.jpg', 1, '2024-11-22', 2, 10, 1, 0.00, 100.00),
(13, 22, 'Jp Manlapaz', '0961170031', 'pay_slip_673f8e3f607fa4.22685981.jpg', 1, '2024-11-22', 3, 11, 1, 1298.00, 1553.76),
(14, 24, 'Wilfredo', '0912345678', 'pay_slip_67489f16dba096.84765770.jpeg', 0, '2024-11-29', 4, 12, 1, 599.00, 770.88),
(15, 22, 'Oj Popgi', '0912345689', 'pay_slip_674e752792bd70.06264613.jpg', 1, '2024-12-03', 0, 13, 1, 529.00, 692.48),
(16, 22, 'Marvin Pogi', '0961170031', 'pay_slip_674e768bd7ea79.74864525.jpg', 1, '2024-12-03', 0, 14, 1, 800.00, 996.00),
(17, 24, 'Wilfredo', '0912345678', 'pay_slip_674fde40e986b5.92510718.jfif', 1, '2024-12-04', 0, 15, 1, 499.00, 658.88),
(18, 29, 'Glenn Panglinan', '0916983479', 'pay_slip_67513cea52cf30.80310784.jpg', 0, '2024-12-05', 4, 16, 1, 2256.00, 2626.72),
(19, 29, 'Glenn Panglinan', '0916983479', 'pay_slip_67513dee304b61.62776255.jpg', 1, '2024-12-05', 2, 17, 1, 529.00, 692.48),
(20, 30, 'Jhon Paul Manlapaz', '0912345689', 'pay_slip_675142b1968f32.40200137.jpg', 1, '2024-12-05', 2, 18, 1, 1178.00, 1419.36);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `variation_id`, `quantity`) VALUES
(18, 10, 24, 2),
(19, 10, 26, 2),
(20, 10, 14, 2),
(21, 11, 17, 1),
(22, 11, 23, 1),
(23, 12, 23, 1),
(24, 12, 28, 1),
(25, 13, 22, 1),
(26, 13, 28, 1),
(27, 14, 3, 1),
(28, 15, 23, 1),
(29, 16, 17, 1),
(30, 17, 20, 1),
(31, 18, 18, 2),
(32, 18, 23, 2),
(33, 19, 23, 1),
(34, 20, 23, 1),
(35, 20, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp(),
  `supplier_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_image`, `category_id`, `uploaded_date`, `supplier_id`) VALUES
(22, 'Long Sleeve and High Waist Skirt', '2pc all black, not your ordinary office casual', './uploads/black-long-sleeve.jpg', 19, '2024-10-24', 1),
(23, 'Black Mini Long Sleeve Dress', 'Double lined textured fabric with Low V neck line', './uploads/mini-long-sleeve.jpg', 2, '2024-10-24', 2),
(24, 'Sleeveless Wrap Dress', 'Sleek black wrap dress with minimalist brooch detail.', './uploads/sleeveless-polo.jpg', 2, '2024-10-24', 3),
(31, 'Striped Skirt Suit', 'Chic striped blouse and skirt combo with stylish puff sleeves.', './uploads/667058.jpg', 19, '2024-11-01', 1),
(32, 'Lace-Up Ruffle Set', 'Elegant blouse with ruffles and lace-up details, paired with classic tweed shorts.', './uploads/464565410_1112351330899806_6805711670287378347_n.jpg', 19, '2024-11-05', 2),
(33, 'Pink and Gray Accent Set', 'Relaxed pink shirt with a gray sweater drape, styled with a white skirt.', './uploads/464797809_1112355264232746_7419343388875901145_n.jpg', 19, '2024-11-05', 3),
(34, 'Red Elegant Dress', 'Stunning red formal dress with a sleek silhouette and refined details, perfect for making a bold statement.', './uploads/464736431_1112327217568884_8110814620774362682_n.jpg', 2, '2024-11-05', 2),
(35, 'Ivory Elegance Dress', 'Chic white long sleeve dress with a graceful silhouette, ideal for a sophisticated, minimalist look.', './uploads/longsleevedress.jpg', 2, '2024-11-05', 1),
(36, 'Blue Checkered Delight Dress', 'A chic and comfortable blue checkered dress perfect for any occasion.', './uploads/464560903_1112321847569421_2787655799854867078_n.jpg', 2, '2024-11-05', 3),
(37, 'Beige Elegance Fit', 'A sleek and stylish beige suit that exudes sophistication for any formal event.', './uploads/464586837_1112260617575544_8837306672443634886_n.jpg', 19, '2024-11-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `quantity_in_stock`, `unit_price`) VALUES
(3, 23, 4, 7, 599.00),
(14, 22, 4, 18, 500.00),
(17, 24, 4, 4, 800.00),
(18, 31, 3, 8, 599.00),
(19, 31, 1, 10, 500.00),
(20, 37, 3, 9, 499.00),
(21, 37, 2, 4, 549.00),
(22, 36, 1, 8, 499.00),
(23, 36, 3, 3, 529.00),
(24, 34, 4, 13, 699.00),
(25, 32, 1, 10, 599.00),
(26, 32, 2, 6, 649.00),
(27, 33, 4, 15, 699.00),
(28, 35, 4, 18, 799.00);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`name`) VALUES
('Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `ship_id` int(10) NOT NULL,
  `ship_add_street` varchar(128) NOT NULL,
  `ship_add_barangay` varchar(128) NOT NULL,
  `ship_add_municipality` varchar(128) NOT NULL,
  `ship_add_province` varchar(128) DEFAULT NULL,
  `ship_add_postalcode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`ship_id`, `ship_add_street`, `ship_add_barangay`, `ship_add_municipality`, `ship_add_province`, `ship_add_postalcode`) VALUES
(8, 'Topaz St.', 'Poblacion 1', 'Marilao', 'Bulacan', 3019),
(9, 'Old 29 Franc Compound', 'Poblacion 1', 'Marilao', 'Bu', 3019),
(10, 'Ipo St.', 'Bundukan', 'Marilao', 'Bulacan', 3019),
(11, 'Ipo St.', 'Bundukan', 'Bocaue', 'Bulacan', 3018),
(12, 'First  st., Hermacon Compound', 'lias', 'marilao', 'bulacan', 3019),
(13, 'Ipo St.', 'Biñang 2nd', 'Bocaue', 'Bulacan', 3018),
(14, 'Blk 4 Lot 24 Ipo St', 'Biñang 2nd', 'Bocaue', 'Bulacan', 3018),
(15, 'First  st., Hermacon Compound', 'Lias', 'Marilao', 'Bulacan', 3019),
(16, 'Blk 11 Lot 19, Villa Regina 2', 'Lias', 'Marilao', 'Bulacan', 2019),
(17, 'Blk 11 Lot 19, Villa Regina 2', 'Lias', 'Marilao', 'Bulacan', 2019),
(18, 'Ipo St.', 'Bambang', 'Bocaue', 'Bulacan', 3018);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'L'),
(3, 'M'),
(4, 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) NOT NULL,
  `supp_name` varchar(128) NOT NULL,
  `supp_email` varchar(255) NOT NULL,
  `supp_contact` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supp_name`, `supp_email`, `supp_contact`) VALUES
(1, 'Supplier A', 'suppliera@gmail.com', '@supplierA on Zalo'),
(2, 'Supplier B', 'supplierb@gmail.com', '@supplierB on Zalo'),
(3, 'Supplier C', 'supplierc@gmail.com', '@supplierC on Zalo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_selling_products`
-- (See below for the actual view)
--
CREATE TABLE `top_selling_products` (
`variation_id` int(11)
,`total_quantity` decimal(32,0)
,`product_name` varchar(200)
,`product_desc` text
,`product_image` varchar(255)
,`product_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `verification_code` varchar(128) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`, `isAdmin`, `verification_code`, `email_verified_at`) VALUES
(1, 'Rose Anne', 'Manlapaz', 'admin@gmail.com', 'admin123', '9810283472', '2022-04-10', 1, '', NULL),
(11, 'Jhon Paul ', 'Manlapaz', 'jhonpaulmanlapaz@yahoo.com', '1234', '0961170031', '2024-10-30', 0, '', NULL),
(22, 'Jhon Paul ', 'Manlapaz', 'jhonpaulmanlapaz1804@gmail.com', 'banawan123', 'jhonpaulma', '2024-11-15', 0, '773896', '2024-11-15 10:36:33'),
(24, 'wilfredo', 'ibanez', 'ibanezwilfredo16@gmail.com', '123', '0949654842', '2024-11-16', 0, '153052', '2024-11-16 15:28:47'),
(26, 'Isaac Darry', 'Banawan', 'isaacbanawan10@gmail.com', 'Darrdarry1017', '0912387591', '2024-11-21', 0, '317707', NULL),
(28, 'Jhon Paul ', 'Manlapaz', 'customer@gmail.com', 'customer123', '0912345678', '2024-12-05', 0, '147190', '2024-12-05 12:24:22'),
(29, 'Glenn', 'Pangilinan', 'glennpangilinan.pdm@gmail.com', 'Admin123', '0916983479', '2024-12-05', 0, '210459', '2024-12-05 13:38:26'),
(30, 'Jhon Paul ', 'Manlapaz', 'manlapazjhonpaulg.pdm@gmail.com', '12345', '0912345678', '2024-12-05', 0, '257107', '2024-12-05 14:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `status` enum('login','logout') NOT NULL,
  `event_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session_id`, `status`, `event_time`) VALUES
(1, 1, '7tov0tdacj309r3egjku4ebhge', 'login', '2024-11-27 14:12:32'),
(2, 24, '7tov0tdacj309r3egjku4ebhge', 'login', '2024-11-27 14:12:38'),
(3, 24, '7tov0tdacj309r3egjku4ebhge', 'logout', '2024-11-27 14:12:59'),
(4, 1, '7tov0tdacj309r3egjku4ebhge', 'logout', '2024-11-27 14:13:06'),
(5, 24, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-28 20:56:41'),
(6, 24, '57phc3q4quffa08sht6n0o6u59', 'logout', '2024-11-28 21:11:51'),
(7, 1, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-28 21:11:56'),
(8, 1, '57phc3q4quffa08sht6n0o6u59', 'logout', '2024-11-28 21:15:05'),
(9, 1, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-28 21:18:34'),
(10, 1, '57phc3q4quffa08sht6n0o6u59', 'logout', '2024-11-28 21:18:56'),
(11, 1, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-28 21:19:04'),
(12, 1, '57phc3q4quffa08sht6n0o6u59', 'logout', '2024-11-29 00:47:07'),
(13, 24, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-29 00:47:13'),
(14, 24, '57phc3q4quffa08sht6n0o6u59', 'logout', '2024-11-29 00:59:06'),
(15, 1, '57phc3q4quffa08sht6n0o6u59', 'login', '2024-11-29 00:59:10'),
(16, 1, 'hg3ut8nhulg4m5j6316q4vukks', 'login', '2024-12-02 13:56:49'),
(17, 1, 'hg3ut8nhulg4m5j6316q4vukks', 'logout', '2024-12-02 14:05:02'),
(18, 1, 'hg3ut8nhulg4m5j6316q4vukks', 'login', '2024-12-02 14:05:07'),
(19, 1, 'f6msq2a64l7a9l8pudoidud21e', 'login', '2024-12-02 20:58:09'),
(20, 1, 'f6msq2a64l7a9l8pudoidud21e', 'logout', '2024-12-02 21:01:14'),
(21, 1, 'f6msq2a64l7a9l8pudoidud21e', 'login', '2024-12-02 21:14:48'),
(22, 1, 'f6msq2a64l7a9l8pudoidud21e', 'logout', '2024-12-02 21:15:12'),
(23, 22, 'liqh3rmi4jkpg865jo5j46n8gr', 'login', '2024-12-03 02:22:39'),
(24, 22, '2ub7va0gffk7s4e3scb42kbu31', 'login', '2024-12-03 10:34:04'),
(25, 1, '2ub7va0gffk7s4e3scb42kbu31', 'login', '2024-12-03 11:04:19'),
(26, 22, '2ub7va0gffk7s4e3scb42kbu31', 'logout', '2024-12-03 11:10:43'),
(27, 1, '2ub7va0gffk7s4e3scb42kbu31', 'logout', '2024-12-03 11:10:47'),
(28, 24, 'od796hliaqrs1nj5d0if4no5ns', 'login', '2024-12-03 11:12:38'),
(29, 24, 'od796hliaqrs1nj5d0if4no5ns', 'logout', '2024-12-03 11:13:29'),
(30, 22, '2ub7va0gffk7s4e3scb42kbu31', 'login', '2024-12-03 11:13:31'),
(31, 22, '2ub7va0gffk7s4e3scb42kbu31', 'logout', '2024-12-03 11:13:43'),
(32, 22, '2ub7va0gffk7s4e3scb42kbu31', 'login', '2024-12-03 15:15:15'),
(33, 22, '2ub7va0gffk7s4e3scb42kbu31', 'logout', '2024-12-03 15:15:51'),
(34, 1, 'q985dm8euafd1dp31hr8ucf4pk', 'login', '2024-12-03 20:07:43'),
(35, 22, 'q985dm8euafd1dp31hr8ucf4pk', 'login', '2024-12-03 20:34:28'),
(36, 22, 'q985dm8euafd1dp31hr8ucf4pk', 'logout', '2024-12-03 20:36:29'),
(37, 1, 'q985dm8euafd1dp31hr8ucf4pk', 'logout', '2024-12-03 20:37:20'),
(38, 1, '9e17gsj5lsf06hceei025ga4c0', 'login', '2024-12-04 12:03:36'),
(39, 24, '9e17gsj5lsf06hceei025ga4c0', 'login', '2024-12-04 12:37:45'),
(40, 1, '57bgngjrh6pf4af04js8licd3n', 'login', '2024-12-05 05:45:31'),
(41, 22, '57bgngjrh6pf4af04js8licd3n', 'login', '2024-12-05 05:50:42'),
(42, 1, '57bgngjrh6pf4af04js8licd3n', 'logout', '2024-12-05 05:55:52'),
(43, 22, '57bgngjrh6pf4af04js8licd3n', 'logout', '2024-12-05 05:56:09'),
(44, 27, '57bgngjrh6pf4af04js8licd3n', 'login', '2024-12-05 05:57:33'),
(45, 27, '57bgngjrh6pf4af04js8licd3n', 'logout', '2024-12-05 05:57:44'),
(46, 28, 'k9qp6q5qv6fq4mhr690194ol2a', 'login', '2024-12-05 12:24:39'),
(47, 28, 'k9qp6q5qv6fq4mhr690194ol2a', 'logout', '2024-12-05 12:24:51'),
(48, 28, 'k9qp6q5qv6fq4mhr690194ol2a', 'login', '2024-12-05 12:25:40'),
(49, 28, 'k9qp6q5qv6fq4mhr690194ol2a', 'logout', '2024-12-05 12:26:40'),
(50, 29, '2cvadcrls8e37175fe542ci2cm', 'login', '2024-12-05 13:38:40'),
(51, 30, 'k9qp6q5qv6fq4mhr690194ol2a', 'login', '2024-12-05 14:04:03'),
(52, 1, 'k9qp6q5qv6fq4mhr690194ol2a', 'login', '2024-12-05 14:06:14');

--
-- Triggers `user_sessions`
--
DELIMITER $$
CREATE TRIGGER `after_login_insert` AFTER INSERT ON `user_sessions` FOR EACH ROW BEGIN
    IF NEW.status = 'login' THEN
        INSERT INTO audit_trail_log (user_id, session_id, login_time)
        VALUES (NEW.user_id, NEW.session_id, NEW.event_time);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_logout_insert` AFTER INSERT ON `user_sessions` FOR EACH ROW BEGIN
    IF NEW.status = 'logout' THEN
        UPDATE audit_trail_log
        SET logout_time = NEW.event_time
        WHERE user_id = NEW.user_id
          AND session_id = NEW.session_id
          AND logout_time IS NULL;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_audit_trail`
-- (See below for the actual view)
--
CREATE TABLE `view_audit_trail` (
`log_id` int(10)
,`user_id` int(10)
,`login_time` timestamp
,`logout_time` timestamp
,`session_id` varchar(255)
,`first_name` varchar(200)
,`last_name` varchar(255)
,`isAdmin` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cancelled_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_cancelled_orders` (
`delivered_to` varchar(150)
,`phone_no` varchar(10)
,`order_date` date
,`payment_method` varchar(128)
,`order_status` int(50)
,`order_id` int(11)
,`pay_status` int(11)
,`payment_slip` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cart`
-- (See below for the actual view)
--
CREATE TABLE `view_cart` (
`user_id` int(11)
,`cart_id` int(11)
,`quantity` int(11)
,`unit_price` decimal(10,2)
,`product_name` varchar(200)
,`product_image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_checkout`
-- (See below for the actual view)
--
CREATE TABLE `view_checkout` (
`user_id` int(11)
,`cart_id` int(11)
,`quantity` int(11)
,`unit_price` decimal(10,2)
,`product_name` varchar(200)
,`product_image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_delivered_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_delivered_orders` (
`delivered_to` varchar(150)
,`phone_no` varchar(10)
,`order_date` date
,`payment_method` varchar(128)
,`order_status` int(50)
,`order_id` int(11)
,`pay_status` int(11)
,`payment_slip` varchar(128)
,`email` varchar(255)
,`first_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pending_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_pending_orders` (
`delivered_to` varchar(150)
,`phone_no` varchar(10)
,`order_date` date
,`payment_method` varchar(128)
,`order_status` int(50)
,`order_id` int(11)
,`pay_status` int(11)
,`payment_slip` varchar(128)
,`email` varchar(255)
,`first_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_processing_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_processing_orders` (
`delivered_to` varchar(150)
,`phone_no` varchar(10)
,`order_date` date
,`payment_method` varchar(128)
,`order_status` int(50)
,`order_id` int(11)
,`pay_status` int(11)
,`payment_slip` varchar(128)
,`email` varchar(255)
,`first_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products`
-- (See below for the actual view)
--
CREATE TABLE `view_products` (
`product_image` varchar(255)
,`product_name` varchar(200)
,`product_desc` text
,`category_name` varchar(150)
,`supp_name` varchar(128)
,`product_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product_sizes`
-- (See below for the actual view)
--
CREATE TABLE `view_product_sizes` (
`quantity_in_stock` int(11)
,`product_name` varchar(200)
,`product_image` varchar(255)
,`size_name` varchar(100)
,`unit_price` decimal(10,2)
,`variation_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_shipped_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_shipped_orders` (
`delivered_to` varchar(150)
,`phone_no` varchar(10)
,`order_date` date
,`payment_method` varchar(128)
,`order_status` int(50)
,`order_id` int(11)
,`pay_status` int(11)
,`payment_slip` varchar(128)
,`email` varchar(255)
,`first_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_shipping_address`
-- (See below for the actual view)
--
CREATE TABLE `view_shipping_address` (
`ship_id` int(10)
,`ship_add_street` varchar(128)
,`ship_add_barangay` varchar(128)
,`ship_add_municipality` varchar(128)
,`ship_add_province` varchar(128)
,`ship_add_postalcode` int(10)
,`order_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `top_selling_products`
--
DROP TABLE IF EXISTS `top_selling_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_selling_products`  AS SELECT `ps`.`variation_id` AS `variation_id`, sum(`o`.`quantity`) AS `total_quantity`, `p`.`product_name` AS `product_name`, `p`.`product_desc` AS `product_desc`, `p`.`product_image` AS `product_image`, `p`.`product_id` AS `product_id` FROM ((`order_details` `o` join `product_size_variation` `ps` on(`ps`.`variation_id` = `o`.`variation_id`)) join `product` `p` on(`p`.`product_id` = `ps`.`product_id`)) GROUP BY `ps`.`variation_id`, `p`.`product_name`, `p`.`product_desc`, `p`.`product_image`, `p`.`product_id` ORDER BY sum(`o`.`quantity`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_audit_trail`
--
DROP TABLE IF EXISTS `view_audit_trail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_audit_trail`  AS SELECT `a`.`log_id` AS `log_id`, `a`.`user_id` AS `user_id`, `a`.`login_time` AS `login_time`, `a`.`logout_time` AS `logout_time`, `a`.`session_id` AS `session_id`, `u`.`first_name` AS `first_name`, `u`.`last_name` AS `last_name`, `u`.`isAdmin` AS `isAdmin` FROM (`audit_trail_log` `a` join `users` `u` on(`a`.`user_id` = `u`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_cancelled_orders`
--
DROP TABLE IF EXISTS `view_cancelled_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cancelled_orders`  AS SELECT `orders`.`delivered_to` AS `delivered_to`, `orders`.`phone_no` AS `phone_no`, `orders`.`order_date` AS `order_date`, `mode_of_payment`.`payment_method` AS `payment_method`, `orders`.`order_status` AS `order_status`, `orders`.`order_id` AS `order_id`, `orders`.`pay_status` AS `pay_status`, `orders`.`payment_slip` AS `payment_slip` FROM ((`orders` join `mode_of_payment`) join `users`) WHERE `orders`.`payment_method_id` = `mode_of_payment`.`payment_method_id` AND `orders`.`order_status` = 4 AND `orders`.`user_id` = `users`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_cart`
--
DROP TABLE IF EXISTS `view_cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cart`  AS SELECT `c`.`user_id` AS `user_id`, `c`.`cart_id` AS `cart_id`, `c`.`quantity` AS `quantity`, `ps`.`unit_price` AS `unit_price`, `p`.`product_name` AS `product_name`, `p`.`product_image` AS `product_image` FROM ((`cart` `c` join `product_size_variation` `ps` on(`ps`.`variation_id` = `c`.`variation_id`)) join `product` `p` on(`ps`.`product_id` = `p`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_checkout`
--
DROP TABLE IF EXISTS `view_checkout`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_checkout`  AS SELECT `c`.`user_id` AS `user_id`, `c`.`cart_id` AS `cart_id`, `c`.`quantity` AS `quantity`, `ps`.`unit_price` AS `unit_price`, `p`.`product_name` AS `product_name`, `p`.`product_image` AS `product_image` FROM ((`cart` `c` join `product_size_variation` `ps` on(`ps`.`variation_id` = `c`.`variation_id`)) join `product` `p` on(`ps`.`product_id` = `p`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_delivered_orders`
--
DROP TABLE IF EXISTS `view_delivered_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_delivered_orders`  AS SELECT `orders`.`delivered_to` AS `delivered_to`, `orders`.`phone_no` AS `phone_no`, `orders`.`order_date` AS `order_date`, `mode_of_payment`.`payment_method` AS `payment_method`, `orders`.`order_status` AS `order_status`, `orders`.`order_id` AS `order_id`, `orders`.`pay_status` AS `pay_status`, `orders`.`payment_slip` AS `payment_slip`, `users`.`email` AS `email`, `users`.`first_name` AS `first_name` FROM ((`orders` join `mode_of_payment`) join `users`) WHERE `orders`.`payment_method_id` = `mode_of_payment`.`payment_method_id` AND `orders`.`order_status` = 3 AND `orders`.`user_id` = `users`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_pending_orders`
--
DROP TABLE IF EXISTS `view_pending_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pending_orders`  AS SELECT `orders`.`delivered_to` AS `delivered_to`, `orders`.`phone_no` AS `phone_no`, `orders`.`order_date` AS `order_date`, `mode_of_payment`.`payment_method` AS `payment_method`, `orders`.`order_status` AS `order_status`, `orders`.`order_id` AS `order_id`, `orders`.`pay_status` AS `pay_status`, `orders`.`payment_slip` AS `payment_slip`, `users`.`email` AS `email`, `users`.`first_name` AS `first_name` FROM ((`orders` join `mode_of_payment`) join `users`) WHERE `orders`.`payment_method_id` = `mode_of_payment`.`payment_method_id` AND `orders`.`order_status` = 0 AND `orders`.`user_id` = `users`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_processing_orders`
--
DROP TABLE IF EXISTS `view_processing_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_processing_orders`  AS SELECT `orders`.`delivered_to` AS `delivered_to`, `orders`.`phone_no` AS `phone_no`, `orders`.`order_date` AS `order_date`, `mode_of_payment`.`payment_method` AS `payment_method`, `orders`.`order_status` AS `order_status`, `orders`.`order_id` AS `order_id`, `orders`.`pay_status` AS `pay_status`, `orders`.`payment_slip` AS `payment_slip`, `users`.`email` AS `email`, `users`.`first_name` AS `first_name` FROM ((`orders` join `mode_of_payment`) join `users`) WHERE `orders`.`payment_method_id` = `mode_of_payment`.`payment_method_id` AND `orders`.`order_status` = 1 AND `orders`.`user_id` = `users`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_products`
--
DROP TABLE IF EXISTS `view_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products`  AS SELECT `p`.`product_image` AS `product_image`, `p`.`product_name` AS `product_name`, `p`.`product_desc` AS `product_desc`, `c`.`category_name` AS `category_name`, `s`.`supp_name` AS `supp_name`, `p`.`product_id` AS `product_id` FROM ((`product` `p` join `category` `c`) join `supplier` `s`) WHERE `p`.`category_id` = `c`.`category_id` AND `p`.`supplier_id` = `s`.`supplier_id` ORDER BY `p`.`product_name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `view_product_sizes`
--
DROP TABLE IF EXISTS `view_product_sizes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_product_sizes`  AS SELECT `v`.`quantity_in_stock` AS `quantity_in_stock`, `p`.`product_name` AS `product_name`, `p`.`product_image` AS `product_image`, `s`.`size_name` AS `size_name`, `v`.`unit_price` AS `unit_price`, `v`.`variation_id` AS `variation_id` FROM ((`product_size_variation` `v` join `product` `p`) join `sizes` `s`) WHERE `p`.`product_id` = `v`.`product_id` AND `v`.`size_id` = `s`.`size_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_shipped_orders`
--
DROP TABLE IF EXISTS `view_shipped_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_shipped_orders`  AS SELECT `orders`.`delivered_to` AS `delivered_to`, `orders`.`phone_no` AS `phone_no`, `orders`.`order_date` AS `order_date`, `mode_of_payment`.`payment_method` AS `payment_method`, `orders`.`order_status` AS `order_status`, `orders`.`order_id` AS `order_id`, `orders`.`pay_status` AS `pay_status`, `orders`.`payment_slip` AS `payment_slip`, `users`.`email` AS `email`, `users`.`first_name` AS `first_name` FROM ((`orders` join `mode_of_payment`) join `users`) WHERE `orders`.`payment_method_id` = `mode_of_payment`.`payment_method_id` AND `orders`.`order_status` = 2 AND `orders`.`user_id` = `users`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_shipping_address`
--
DROP TABLE IF EXISTS `view_shipping_address`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_shipping_address`  AS SELECT `sa`.`ship_id` AS `ship_id`, `sa`.`ship_add_street` AS `ship_add_street`, `sa`.`ship_add_barangay` AS `ship_add_barangay`, `sa`.`ship_add_municipality` AS `ship_add_municipality`, `sa`.`ship_add_province` AS `ship_add_province`, `sa`.`ship_add_postalcode` AS `ship_add_postalcode`, `o`.`order_id` AS `order_id` FROM (`shipping_address` `sa` join `orders` `o` on(`sa`.`ship_id` = `o`.`ship_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail_log`
--
ALTER TABLE `audit_trail_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bank_account_info`
--
ALTER TABLE `bank_account_info`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`name`),
  ADD KEY `municipality_name` (`municipality_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_cart` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `e_wallet_info`
--
ALTER TABLE `e_wallet_info`
  ADD PRIMARY KEY (`e_wallet_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_details_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `detail_id` (`detail_id`);

--
-- Indexes for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`name`),
  ADD KEY `province_name` (`province_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ship_id` (`ship_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail_log`
--
ALTER TABLE `audit_trail_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `bank_account_info`
--
ALTER TABLE `bank_account_info`
  MODIFY `bank_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `e_wallet_info`
--
ALTER TABLE `e_wallet_info`
  MODIFY `e_wallet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `invoice_details_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `payment_method_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `ship_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_trail_log`
--
ALTER TABLE `audit_trail_log`
  ADD CONSTRAINT `audit_trail_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_ibfk_1` FOREIGN KEY (`municipality_name`) REFERENCES `municipalities` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`detail_id`) REFERENCES `invoice_details` (`invoice_details_id`);

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_ibfk_1` FOREIGN KEY (`province_name`) REFERENCES `provinces` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ship_id`) REFERENCES `shipping_address` (`ship_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `mode_of_payment` (`payment_method_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
