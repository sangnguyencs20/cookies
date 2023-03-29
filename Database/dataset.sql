-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 09:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `cookies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Màn hình'),
(2, 'Bàn phím'),
(3, 'Chuột'),
(4, 'Tai nghe');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject_name` varchar(250) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Quang ', 'Hồ Minh', 'hominhquang01@gmail.com', '0965649531', ' SET CHÂN VÁY & ÁO XÔ TAY PHỒNG', 'xinh ngất ngây', '2022-11-16 13:48:13', '2022-11-17 08:37:31', 1),
(4, 'Linh ', 'Vương ', 'vuongkhanhlinh99@gmail.com', '09664524611', 'ĐẦM TAY PHỒNG', 'Ooiiii!!! cứ cam cam mà lên hình là xinh không chịu nỗi\r\n\r\nCác bạn biết gì chưa? style này đang hít lắm đó nha.', '2022-11-16 14:33:03', '2022-12-06 08:42:36', 1),
(5, 'Hoang', 'Quan', 'quan123@gmail.com', '098744658', 'Tỷ lệ thắng của Hàn Quốc trước Brazil', 'Trước màn so tài ở vòng 16 đội World Cup 2022, tuyển Hàn Quốc chỉ thắng một trong 5 lần gần nhất đối đầu Brazil, tương đương tỷ lệ 20%.', '2022-12-05 09:43:46', '2023-02-17 10:14:19', 1),
(7, 'Thuc', 'Anh', 'thucanh123@gmail.com', '02236997', 'Sắc vóc của người yêu \'Người Dơi\' Robert Pattinson', 'Suki Waterhouse bắt đầu công việc người mẫu từ năm 16 tuổi. Cô được phát hiện tại một quán pub.', '2022-12-05 09:35:56', '2023-01-09 07:19:43', 1),
(8, 'Vuong', 'Linh', 'linhdangyeu123@gmail.com', '0964524611', 'anh Quang oi', 'em Linh Tân Tỵ gửi anh Quang Kỷ Mão', '2022-12-22 13:54:46', '2022-12-22 13:47:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `fullname`, `user_id`, `email`, `phone_number`, `address`, `order_date`, `status`, `total_money`) VALUES
(1, 'Vuong Khanh Linh', 3, 'vuongkhanhlinh99@gmail.com', '0964524611', '109/11/7A đường số 8 phường Linh Xuân - Thủ Đức ', '2022-11-17 23:59:51', 0, 200000),
(2, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '096564953', '127 Ngô Thì Nhậm - Dĩ An - Bình Dương', '2022-11-17 23:59:51', 1, 300000),
(3, 'Hồ Minh Quang', 3, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2022-11-28 10:34:55', 1, 6840000),
(7, 'Hoang Quan', 1, 'quan123@gmail.com', '0111113132', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2022-12-05 05:35:01', 1, 750000),
(8, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2022-12-06 07:46:23', 0, 6080000),
(9, 'Sang', 2, 'sang123@gmail.com', '0665465', 'qwqeqwe', '2022-12-07 09:16:00', 0, 1260000),
(10, 'HUy', 1, 'quang123@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2022-12-08 08:27:06', 2, 650000),
(11, 'Vuong Khanh Linh', 2, 'linhdangyeu123@gmail.com', '0964524611', 'Linh Xuan - Thu Duc', '2022-12-22 13:49:39', 0, 12090000),
(12, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2023-01-09 07:29:23', 0, 200000),
(13, 'aaa', 1, 'aaaa@gmail.com', 'adwad', 'asdasdsad', '2023-01-11 11:58:49', 1, 14189000),
(14, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2023-02-16 10:46:29', 0, 450000),
(15, 'Hồ Minh Quang', 2, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2023-02-20 07:16:27', 0, 0),
(16, 'Hồ Quang', 2, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2023-02-23 19:59:30', 0, 13270000),
(17, 'Hồ Minh Quang', 2, 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '2023-02-24 08:40:58', 0, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `oder_details`
--

CREATE TABLE `oder_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oder_details`
--

INSERT INTO `oder_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 1, 3, 100000, 1, 100000),
(2, 1, 1, 100000, 1, 100000),
(3, 2, 1, 150000, 1, 100000),
(4, 2, 2, 200000, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(350) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `discount`, `category_id`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'GLORIOUS GMMK PRO', 199000, 100000, 4, 'asset/photo/452039.jpg', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\"><b>THÔNG SỐ KỸ THUẬT</b></font></p><p>\r\nTên bàn phím cơ: Glorious GMMK Pro\r\nCỡ 75', '2023-02-19 09:50:45', '2023-02-19 09:50:45', 0),
(2, 'PLANCK MECHANICAL', 350000, 200000, 4, 'asset/photo/452039.jpg', 'Các thông số chi tiết\r\nNgười thiết kế: Jack Humbert (OLKB)\r\nSản xuất bởi: Drop\r\nPCBA làm bởi OLKB\r\nVỏ nhôm CNC được anod hóa\r\nDùng switch hot-swap của', '2023-02-19 09:20:46', '2023-02-19 09:20:46', 0),
(3, 'THE WHITEFOX KEYBOARD', 190000, 100000, 2, 'asset/photo/banphim4.jpg', '<p><b>THÔNG SỐ KỸ THUẬT </b></p><p><span style=\"font-size: 1rem;\">Tên bàn phím cơ: WhiteFox\r\nCỡ 65% layout\r\nCase CNC anod hóa\r\nKeycap PBT Dye-sub', '2022-12-05 09:41:50', '2022-12-05 09:41:50', 0),
(4, 'NYM96 BAREBONES', 149000, 59000, 2, 'asset/photo/banphim5.jpg', 'THÔNG SỐ KỸ THUẬT\r\n96 phím\r\nCase và plate chất liệu Aluminum 6063\r\nKết nối USB-C\r\nChân đứng cao su\r\nKích thước (bản đã ráp) : 15 x 5.5 x 1.7 in (38.1', '2022-11-18 10:35:43', '2022-11-18 10:35:43', 0),
(5, 'Rezo HT03', 250000, 100000, 4, 'asset/photo/tainghe4.jpg', 'Với mắt cảm biến, DareU trang bị cho mẫu chuột của họ cảm biến quang nâng cao Razer 5G với thông số độ nhạy đạt 16000 DPI, 450 IPS tracking speed cùng', '2022-11-18 09:53:21', '2022-11-18 09:53:21', 0),
(6, 'Razer Barracuda X', 300000, 250000, 4, 'asset/photo/tainghe1.jpg', 'C (không dây, có dây)\r\nPlayStation (không dây, có dây)\r\nNintendo Switch (không dây, có dây)\r\nThiết bị Android (không dây, có dây)\r\nXbox (có dây)\r\nPhụ ', '2022-11-18 08:58:28', '2022-11-18 08:58:28', 0),
(7, 'Sony WH-CH510', 360000, 240000, 4, 'asset/photo/tainghe3.jpg', 'Sony vừa mới cho ra mắt chiếc tai nghe bluetooth Sony WH-CH510 có thiết kế gọn nhẹ và dễ dàng gập bẻ. Ngoài ra, điểm đặc biệt của chiếc tai nghe chùm ', '2022-11-18 08:08:32', '2022-11-18 08:08:32', 0),
(8, 'OPPO ENCO Air 2 ETE11', 100000, 50000, 4, 'asset/photo/tainghe6.jpg', 'Chuột không dây Logitech  M300 kết nối không dây qua USB Receiver 2.4GHz hoặc Bluetooth 3.0, 4.0. Logitech  M300 là một trong những dòng chuột máy tín', '2022-11-18 09:58:20', '2022-11-18 09:58:20', 0),
(9, 'Asus TUF VG279Q1R | 24inch', 3200000, 3000000, 1, 'asset/photo/manhinh_item1-removebg-preview.png', 'Tên sản phẩm: Màn hình Asus TUF VG279Q1R\r\nKích thước: 27 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 250 nit', '2022-11-18 10:36:22', '2022-11-18 10:36:22', 0),
(10, 'LG 34WN750-B | 34inch', 9490000, 8990000, 1, 'asset/photo/manhinh_item2-removebg-preview.png', 'Tên sản phẩm: Màn hình LG 34WN750-B\r\nKích thước: 34 inch\r\nĐộ phân giải: UW-QHD (3440 x 1440)\r\nTỷ lệ màn hình: 21:9\r\nTấm nền: IPS\r\nĐộ sáng: 300 nits\r\nM', '2022-11-18 10:11:02', '2022-11-18 10:11:02', 0),
(11, 'Asus VZ249HEG1R | 24 inch', 3690000, 3470000, 1, 'asset/photo/manhinh_item7.jpg', 'Tên sản phẩm: Màn Asus VZ249HEG1R\r\nKích thước: 24 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 250 nits\r\nMàu hi', '2022-11-18 16:41:10', '2022-11-18 16:41:10', 0),
(12, 'LG 24GN60R-B | 24 inch', 4890000, 4280000, 1, 'asset/photo/manhinh_item6-removebg-preview.png', 'Tên sản phẩm: Màn hình LG 24GN60R-B\r\nKích thước: 24 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 300 nits\r\nMàu', '2022-11-18 10:05:05', '2022-11-18 10:05:05', 0),
(13, 'IQUNIX F97 Graffiti Diary', 6000000, 5900000, 2, 'asset/photo/banphim_item1.jpg', 'Tên sản phẩm: Bàn phím IQUNIX F97 Graffiti Diar\r\nKích thước phím: 96% - 100 phím\r\nKeycap: PBT Dye Sublimation  Keycaps\r\nCase: Aluminum Frame\r\nKhả năng', '2022-11-18 10:19:07', '2022-11-18 10:19:07', 0),
(14, 'IQUNIX ZX75 Camping', 6000000, 5089000, 2, 'asset/photo/banphim_item2.jpg', 'Tên sản phẩm: Bàn phím IQUNIX ZX75 Camping \r\nLayout: 75%\r\nSố phím: 81\r\nSwitch: Cherry Sw \r\nKeycap: PBT Double Shot\r\nProfile Keycap: Cherry \r\nKết nối: ', '2022-11-18 10:02:09', '2022-11-18 10:02:09', 0),
(15, 'Newmen GM980 Starry Gasket', 1790000, 1690000, 2, 'asset/photo/banphim_item4.jpg', 'Tên sản phẩm: Bàn phím không dây Newmen GM680 Jungle Dual Mode \r\nLoại sản phẩm : bàn phím cơ chế độ kép không dây bluetooth 5.0/3.0, wireless 2.4 và c', '2022-11-18 10:52:42', '2022-11-18 10:52:42', 0),
(17, 'Newmen GM980 Nebula Gasket', 3050000, 2890000, 2, 'asset/photo/banphim_item5.jpg', 'Tên sản phẩm: Bàn phím Newmen GM980 Nebula Gasket\r\nLayout: 98 phím\r\nCase phím: Acrylic trong suốt\r\nKết nối: 3 chế độ (USB-C/ Bluetooth/ Wireless)\r\nSwi', '2022-11-18 10:02:13', '2022-11-18 10:02:13', 0),
(18, 'DareU A950 Star Black', 2022000, 1088000, 3, 'asset/photo/chuot_item1.jpg', 'Tên sản phẩm: Chuột DareU A950 Star Black\r\nKhả năng kết nối: 3 MODE (Type-C/ Bluetooth/ 2.4G)\r\nSwitch: Micro Switch (50 million)\r\nCảm Biến: CX52850\r\nM', '2022-11-18 10:13:16', '2022-11-18 10:13:16', 0),
(19, 'Fuhlen D90s Wireless White', 600000, 540000, 3, 'asset/photo/chuot_item2.jpg', 'Tên sản phẩm: Chuột Fuhlen D90s Wireless White\r\nThiết kế: đối xứng\r\nMàu sắc: Trắng\r\nKết nối: USB Type-C + wireless 2.4G.\r\nSwitch: Huano\r\nMắt cảm biến:', '2022-11-18 10:21:17', '2022-11-18 10:21:17', 0),
(20, 'DareU A950 Candy Pink', 2016000, 1088000, 3, 'asset/photo/chuot_item3.jpg', 'Tên sản phẩm: Chuột DareU A950 Candy Pink\r\nKhả năng kết nối: 3 MODE (Type-C/ Bluetooth/ 2.4G)\r\nSwitch: Micro Switch (50 million)\r\nCảm Biến: CX52850\r\nM', '2022-11-18 10:18:18', '2022-11-18 10:18:18', 0),
(21, 'Motospeed V100', 780000, 650000, 3, 'asset/photo/chuot_item4.jpg', '1. Cảm biến Pixart 3327 NEW\r\n2. Nút bấm huano độ bền 20 triệu lần\r\n3. Dây tín hiệu bọc dù mềm độ dài 1.5m, chống nhiễu, đầu cắm USB mạ vàng\r\n4. Chân đ', '2022-11-18 16:24:28', '2022-11-18 16:24:28', 0),
(22, 'LC Power LC-M35-UWQHD-120-C', 5600000, 4500000, 1, 'asset/photo/manhinh_item3.jpg', 'Tên sản phẩm: Màn hình LC Power LC-M35-UWQHD-120-C\r\nKích thước: 35 inch\r\nĐộ phân giải: 3440 x 1440\r\nĐộ cong: 1800R\r\nTỷ lệ màn hình: 21:9\r\nTấm nền: VA\r', '2022-11-18 16:34:13', '2022-11-25 07:20:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, 'hominhquang01@gmail.com1668524190', '2022-11-15 15:56:30'),
(1, 'hominhquang01@gmail.com1668529091', '2022-11-15 17:18:11'),
(1, 'hominhquang01@gmail.com1668617895', '2022-11-16 17:58:15'),
(1, 'hominhquang01@gmail.com1668619678', '2022-11-16 18:27:58'),
(1, 'hominhquang01@gmail.com1670078524', '2022-12-03 15:42:04'),
(1, 'hominhquang01@gmail.com1670232327', '2022-12-05 10:25:27'),
(1, 'hominhquang01@gmail.com1670236459', '2022-12-05 11:34:19'),
(1, 'hominhquang01@gmail.com1670238439', '2022-12-05 12:07:19'),
(1, 'hominhquang01@gmail.com1670238492', '2022-12-05 12:08:12'),
(1, 'hominhquang01@gmail.com1670238694', '2022-12-05 12:11:34'),
(1, 'hominhquang01@gmail.com1670255845', '2022-12-05 16:57:25'),
(1, 'hominhquang01@gmail.com1670308413', '2022-12-06 07:33:33'),
(1, 'hominhquang01@gmail.com1670312546', '2022-12-06 08:42:26'),
(1, 'hominhquang01@gmail.com1670397701', '2022-12-07 08:21:41'),
(1, 'hominhquang01@gmail.com1670398500', '2022-12-07 08:35:00'),
(1, 'hominhquang01@gmail.com1670399904', '2022-12-07 08:58:24'),
(1, 'hominhquang01@gmail.com1670407867', '2022-12-07 11:11:07'),
(1, 'hominhquang01@gmail.com1670480658', '2022-12-08 07:24:18'),
(1, 'hominhquang01@gmail.com1671173292', '2022-12-16 07:48:12'),
(1, 'hominhquang01@gmail.com1671713031', '2022-12-22 13:43:51'),
(1, 'hominhquang01@gmail.com1671713225', '2022-12-22 13:47:05'),
(1, 'hominhquang01@gmail.com1672815266', '2023-01-04 07:54:26'),
(1, 'hominhquang01@gmail.com1673245159', '2023-01-09 07:19:19'),
(1, 'hominhquang01@gmail.com1673421862', '2023-01-11 08:24:22'),
(1, 'hominhquang01@gmail.com1673434736', '2023-01-11 11:58:56'),
(1, 'hominhquang01@gmail.com1673434816', '2023-01-11 12:00:16'),
(1, 'hominhquang01@gmail.com1674383777', '2023-01-22 11:36:17'),
(1, 'hominhquang01@gmail.com1675227793', '2023-02-01 06:03:13'),
(1, 'hominhquang01@gmail.com1675406372', '2023-02-03 07:39:32'),
(1, 'hominhquang01@gmail.com1676540740', '2023-02-16 10:45:40'),
(1, 'hominhquang01@gmail.com1676625138', '2023-02-17 10:12:18'),
(1, 'hominhquang01@gmail.com1676625227', '2023-02-17 10:13:47'),
(2, 'vuongkhanhlinh99@gmail.com1670215142', '2022-12-05 05:39:02'),
(2, 'vuongkhanhlinh99@gmail.com1670236433', '2022-12-05 11:33:53'),
(2, 'vuongkhanhlinh99@gmail.com1670238419', '2022-12-05 12:06:59'),
(2, 'vuongkhanhlinh99@gmail.com1670239775', '2022-12-05 12:29:35'),
(2, 'vuongkhanhlinh99@gmail.com1670255748', '2022-12-05 16:55:48'),
(2, 'vuongkhanhlinh99@gmail.com1670255990', '2022-12-05 16:59:50'),
(2, 'vuongkhanhlinh99@gmail.com1670256035', '2022-12-05 17:00:35'),
(2, 'vuongkhanhlinh99@gmail.com1670308206', '2022-12-06 07:30:06'),
(2, 'vuongkhanhlinh99@gmail.com1670310838', '2022-12-06 08:13:58'),
(2, 'vuongkhanhlinh99@gmail.com1670310940', '2022-12-06 08:15:40'),
(2, 'vuongkhanhlinh99@gmail.com1670310960', '2022-12-06 08:16:00'),
(2, 'vuongkhanhlinh99@gmail.com1670400241', '2022-12-07 09:04:01'),
(2, 'vuongkhanhlinh99@gmail.com1670402452', '2022-12-07 09:40:52'),
(2, 'vuongkhanhlinh99@gmail.com1670402489', '2022-12-07 09:41:29'),
(2, 'vuongkhanhlinh99@gmail.com1670402500', '2022-12-07 09:41:40'),
(2, 'vuongkhanhlinh99@gmail.com1670402551', '2022-12-07 09:42:31'),
(2, 'vuongkhanhlinh99@gmail.com1670407872', '2022-12-07 11:11:12'),
(2, 'vuongkhanhlinh99@gmail.com1670407900', '2022-12-07 11:11:40'),
(2, 'vuongkhanhlinh99@gmail.com1670480503', '2022-12-08 07:21:43'),
(2, 'vuongkhanhlinh99@gmail.com1671173309', '2022-12-16 07:48:29'),
(2, 'vuongkhanhlinh99@gmail.com1671713023', '2022-12-22 13:43:43'),
(2, 'vuongkhanhlinh99@gmail.com1671713088', '2022-12-22 13:44:48'),
(2, 'vuongkhanhlinh99@gmail.com1671713106', '2022-12-22 13:45:06'),
(2, 'vuongkhanhlinh99@gmail.com1671713230', '2022-12-22 13:47:10'),
(2, 'vuongkhanhlinh99@gmail.com1672477086', '2022-12-31 09:58:06'),
(2, 'vuongkhanhlinh99@gmail.com1676796325', '2023-02-19 09:45:25'),
(2, 'vuongkhanhlinh99@gmail.com1676873638', '2023-02-20 07:13:58'),
(2, 'vuongkhanhlinh99@gmail.com1677178797', '2023-02-23 19:59:57'),
(2, 'vuongkhanhlinh99@gmail.com1677224302', '2023-02-24 08:38:22'),
(2, 'vuongkhanhlinh99@gmail.com1677224330', '2023-02-24 08:38:50'),
(2, 'vuongkhanhlinh99@gmail.com1677224344', '2023-02-24 08:39:04'),
(2, 'vuongkhanhlinh99@gmail.com1677654064', '2023-03-01 08:01:04'),
(2, 'vuongkhanhlinh99@gmail.com1678172533', '2023-03-07 08:02:13'),
(3, 'meocao52@gmail.com1668584377', '2022-11-16 08:39:37'),
(3, 'meocao52@gmail.com1668585298', '2022-11-16 08:54:58'),
(3, 'meocao52@gmail.com1668626344', '2022-11-16 20:19:04'),
(3, 'meocao52@gmail.com1668708250', '2022-11-17 19:04:10'),
(3, 'meocao52@gmail.com1668784191', '2022-11-18 16:09:51'),
(3, 'meocao52@gmail.com1668940269', '2022-11-20 11:31:09'),
(3, 'meocao52@gmail.com1668940327', '2022-11-20 11:32:07'),
(3, 'meocao52@gmail.com1669627402', '2022-11-28 10:23:22'),
(3, 'meocao52@gmail.com1670397711', '2022-12-07 08:21:51'),
(3, 'meocao52@gmail.com1672477091', '2022-12-31 09:58:11'),
(3, 'meocao52@gmail.com1678865097', '2023-03-15 08:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`, `thumbnail`) VALUES
(1, 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '123456', 1, '2022-11-15 16:20:46', '2022-11-15 16:20:46', 0, NULL),
(2, 'Vuong Khanh Linh', 'vuongkhanhlinh99@gmail.com', '0964524611', '109/11/7A đường số 8 Linh Xuân Thủ Đức', '123456', 1, '2022-12-22 13:44:31', '2022-12-22 13:44:31', 0, ''),
(3, 'Vương Khánh Linh', 'meocao52@gmail.com', '0964524611', '109/11/7A duong so 8 Linh Trung Thu Duc', '123456', 2, '2022-12-07 08:35:26', '2022-12-07 08:35:26', 0, NULL),
(4, 'Sang', 'sang@gmail.com', '033345656', '11111', '123456', 2, '2022-12-07 09:34:10', '2022-12-07 09:34:10', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `oder_details`
--
ALTER TABLE `oder_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oder_details`
--
ALTER TABLE `oder_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `oders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `oder_details`
--
ALTER TABLE `oder_details`
  ADD CONSTRAINT `oder_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `oder_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `oders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
