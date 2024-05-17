-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2024 lúc 12:01 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitaploncnm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sdt` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phanquyen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `ten`, `password`, `sdt`, `email`, `phanquyen`) VALUES
(1, 'Tơ', 'e10adc3949ba59abbe56e057f20f883e', '0387120640', 'abc@gmail.com', 1),
(5, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0365103570', 'admin@gmail.com', 2),
(6, 'Tơ', 'e10adc3949ba59abbe56e057f20f883e', '1233446758', 'xyz@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploadfile`
--

CREATE TABLE `uploadfile` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_account` int(10) UNSIGNED NOT NULL,
  `tenfile` varchar(200) NOT NULL,
  `loaifile` varchar(200) NOT NULL,
  `uploadtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `uploadfile`
--

INSERT INTO `uploadfile` (`id`, `id_account`, `tenfile`, `loaifile`, `uploadtime`) VALUES
(10, 1, 'Giao diện hệ thống ', 'docx', '2024-05-04'),
(11, 1, 'Test case', 'docx', '2024-05-05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sdt` (`sdt`,`email`),
  ADD KEY `password` (`password`);

--
-- Chỉ mục cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD CONSTRAINT `id_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
