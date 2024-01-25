-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 10:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_sach` int(11) NOT NULL,
  `tensach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(1, 'Truyện ngắn - Tản văn'),
(2, 'Ngôn Tình'),
(3, 'Truyện Trinh Thám'),
(4, 'Tiểu thuyết'),
(5, 'Huyền Bí - Giả Tưởng - Kinh dị');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(100) NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gia` float NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `id_sach` int(11) NOT NULL,
  `tensach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `gia` float NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id_sach`, `tensach`, `tacgia`, `id_danhmuc`, `gia`, `hinh`) VALUES
(1, 'Từ Điển Tiếng “Em”', 'Khotudien', 1, 47000, 'tudientiengem.jpg'),
(2, 'Lì Quá Để Nói Quài', 'Anh Cầm Fact', 1, 58000, 'liquadenoiquai.jpg'),
(3, 'Chuyện Kể Rằng Có Nàng Và Tôi', 'Nhiều Tác Giả', 1, 57000, 'chuyenkerangconangvatoi.jpg'),
(4, 'Có Một Ngày, Bố Mẹ Sẽ Già Đi', 'Nhiều Tác Giả', 1, 76000, 'comotngaybomesegiadi.jpg'),
(5, 'Vui Vẻ Không Quạu Nha', 'Ở Đây Zui Nè', 1, 55000, 'vuivekhongquaunha.jpg'),
(6, 'Bậc Thầy Chém Giá', 'Mèo Lười Ngủ Ngày', 2, 129000, 'bacthaychemgia.jpg'),
(7, 'Nhiệt Độ Xã Giao', 'Carbeeq', 2, 87000, 'nhietdoxagiao.jpg'),
(8, 'Thế Gian Này, Nếu Chẳng Còn Mèo', 'Kawamura Genki', 4, 48000, 'thegiannay.jpg'),
(9, 'Cây Cam Ngọt Của Tôi', 'José Mauro de Vasconcelos', 4, 70000, 'caycam.jpg'),
(10, 'Nhà Giả Kim', 'Paulo Coelho', 4, 53000, 'nhagiakim.jpg'),
(11, 'Phía Sau Nghi Can X', 'Higashino Keigo', 3, 87000, 'phiasaunghican.jpg'),
(12, 'Vụ Ám Sát Ông Roger Ackroyd', 'Agatha Christie', 3, 100000, 'vuamsat.jpg'),
(13, 'Biểu Tượng Thất Truyền', 'Dan Brown', 3, 153000, 'bieutuong.jpg'),
(14, 'Án Mạng Trên Chuyến Tàu Tốc Hành Phương Đông', 'Agatha Christie', 3, 96000, 'anmang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `user_type`, `image`, `ip_user`, `address`, `phone`) VALUES
(1, 'admin01', 'admin01@gmail.com', '123456Aa', 'admin', 'customer-1.png', '0', '404', '0123456789'),
(2, 'user', 'user01@gmail.com', '123456Aa', 'user', 'avatar-trang.jpg', '::1', '404', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id_sach`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `id_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
