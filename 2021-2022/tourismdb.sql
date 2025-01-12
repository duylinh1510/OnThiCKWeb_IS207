-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2025 lúc 08:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourismdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet`
--

CREATE TABLE `chitiet` (
  `MaTour` int(11) NOT NULL,
  `MaDDL` int(11) NOT NULL,
  `Ngay` float NOT NULL,
  `Dem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet`
--

INSERT INTO `chitiet` (`MaTour`, `MaDDL`, `Ngay`, `Dem`) VALUES
(1, 1, 1.5, 1),
(2, 2, 1, 0.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdl`
--

CREATE TABLE `diemdl` (
  `MaDDL` int(11) NOT NULL,
  `TenDDL` varchar(255) NOT NULL,
  `MaTTP` int(11) NOT NULL,
  `Dactrung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdl`
--

INSERT INTO `diemdl` (`MaDDL`, `TenDDL`, `MaTTP`, `Dactrung`) VALUES
(1, 'Hồ Hoàn Kiếm', 2, 'Tham quan'),
(2, 'Chợ Bến Thành', 2, 'Tham quan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtp`
--

CREATE TABLE `tinhtp` (
  `MaTTP` int(11) NOT NULL,
  `TenTTP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtp`
--

INSERT INTO `tinhtp` (`MaTTP`, `TenTTP`) VALUES
(1, 'Hà Nội'),
(2, 'Hồ Chí Minh'),
(3, 'Đà Nẵng'),
(4, 'Nha Trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `MaTour` int(11) NOT NULL,
  `TenTour` varchar(255) NOT NULL,
  `NgayKhoiHanh` date NOT NULL,
  `SoNgay` float NOT NULL,
  `SoDem` float NOT NULL,
  `Gia` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`MaTour`, `TenTour`, `NgayKhoiHanh`, `SoNgay`, `SoDem`, `Gia`) VALUES
(1, 'Tour Hà Nội - Đà Nẵng', '2025-01-20', 5, 4, 5000000.00),
(2, 'Tour Sài Gòn - Nha Trang', '2025-02-15', 4, 3, 4500000.00),
(3, 'Tour Long An - Vũng Tàu', '2025-01-12', 3, 2, 3000000.00);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD PRIMARY KEY (`MaTour`,`MaDDL`),
  ADD KEY `MaDDL` (`MaDDL`);

--
-- Chỉ mục cho bảng `diemdl`
--
ALTER TABLE `diemdl`
  ADD PRIMARY KEY (`MaDDL`),
  ADD KEY `MaTTP` (`MaTTP`);

--
-- Chỉ mục cho bảng `tinhtp`
--
ALTER TABLE `tinhtp`
  ADD PRIMARY KEY (`MaTTP`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`MaTour`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diemdl`
--
ALTER TABLE `diemdl`
  MODIFY `MaDDL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tinhtp`
--
ALTER TABLE `tinhtp`
  MODIFY `MaTTP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `MaTour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `chitiet_ibfk_1` FOREIGN KEY (`MaTour`) REFERENCES `tour` (`MaTour`),
  ADD CONSTRAINT `chitiet_ibfk_2` FOREIGN KEY (`MaDDL`) REFERENCES `diemdl` (`MaDDL`);

--
-- Các ràng buộc cho bảng `diemdl`
--
ALTER TABLE `diemdl`
  ADD CONSTRAINT `diemdl_ibfk_1` FOREIGN KEY (`MaTTP`) REFERENCES `tinhtp` (`MaTTP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
