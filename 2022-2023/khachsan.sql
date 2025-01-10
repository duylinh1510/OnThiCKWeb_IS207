-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2025 lúc 05:59 AM
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
-- Cơ sở dữ liệu: `khachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(50) NOT NULL,
  `TENHD` varchar(100) DEFAULT NULL,
  `MAKH` varchar(50) DEFAULT NULL,
  `TONGTIEN` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `TENHD`, `MAKH`, `TONGTIEN`) VALUES
('HD001', 'Hóa đơn A', 'KH001', 1200000.00),
('HD0010', 'Hóa đơn 10', 'KH009', 1000000.00),
('HD002', 'Hóa đơn B', 'KH002', 2200000.00),
('HD003', 'Hóa đơn C', 'KH003', 1800000.00),
('HD004', 'Hóa đơn D', 'KH004', 1500000.00),
('HD005', 'Hóa đơn E', 'KH005', 2000000.00),
('HD006', 'Hóa đơn F', 'KH006', 2500000.00),
('HD007', 'Hóa đơn G', 'KH007', 3000000.00),
('HD008', 'Hóa đơn H', 'KH008', 1800000.00),
('HD009', 'Hóa đơn 9', 'KH009', 1000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(50) NOT NULL,
  `TENKH` varchar(100) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `CCCN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `CCCN`) VALUES
('KH001', 'Nguyen Van A', '0912345678', '123456789'),
('KH002', 'Tran Thi B', '0987654321', '987654321'),
('KH003', 'Le Van C', '0918765432', '112233445'),
('KH004', 'Pham Thi D', '0971234567', '556677889'),
('KH005', 'Nguyen Van E', '0934567890', '223344556'),
('KH006', 'Tran Thi F', '0967891234', '334455667'),
('KH007', 'Le Van G', '0901234567', '445566778'),
('KH008', 'Pham Thi H', '0923456789', '556677889'),
('KH009', 'Linh', '0967339425', '080204016001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MAPHONG` varchar(50) NOT NULL,
  `TENPHONG` varchar(100) DEFAULT NULL,
  `TINHTRANG` varchar(20) DEFAULT NULL,
  `LOAIPHONG` varchar(20) DEFAULT NULL CHECK (`LOAIPHONG` in ('phòng đơn','phòng đôi'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MAPHONG`, `TENPHONG`, `TINHTRANG`, `LOAIPHONG`) VALUES
('P001', 'Phòng 101', 'Đang thuê', 'phòng đơn'),
('P002', 'Phòng 102', 'Đang thuê', 'phòng đôi'),
('P003', 'Phòng 103', 'Đang thuê', 'phòng đôi'),
('P004', 'Phòng 104', 'Đang thuê', 'phòng đơn'),
('P005', 'Phòng 105', 'Đang thuê', 'phòng đơn'),
('P006', 'Phòng 106', 'Đang thuê', 'phòng đôi'),
('P007', 'Phòng 107', 'Đang thuê', 'phòng đơn'),
('P008', 'Phòng 108', 'Đang thuê', 'phòng đôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `MAHD` varchar(50) NOT NULL,
  `MAPHONG` varchar(50) NOT NULL,
  `NGAYTHUE` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `GIATHUE` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`MAHD`, `MAPHONG`, `NGAYTHUE`, `NGAYTRA`, `GIATHUE`) VALUES
('HD001', 'P001', '2024-01-01', '2024-01-05', 300000.00),
('HD0010', 'P002', '2025-01-09', '2025-01-10', 100000.00),
('HD0010', 'P004', '2025-01-09', '2025-01-10', 100000.00),
('HD0010', 'P005', '2025-01-09', '2025-01-10', 100000.00),
('HD0010', 'P007', '2025-01-09', '2025-01-10', 100000.00),
('HD002', 'P003', '2024-01-02', '2024-01-06', 400000.00),
('HD003', 'P002', '2024-01-03', '2024-01-07', 450000.00),
('HD004', 'P004', '2024-01-04', '2024-01-08', 350000.00),
('HD005', 'P005', '2024-01-05', '2024-01-10', 500000.00),
('HD006', 'P006', '2024-01-06', '2024-01-11', 600000.00),
('HD007', 'P007', '2024-01-07', '2024-01-12', 400000.00),
('HD008', 'P008', '2024-01-08', '2024-01-13', 550000.00);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MAPHONG`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MAHD`,`MAPHONG`),
  ADD KEY `MAPHONG` (`MAPHONG`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Các ràng buộc cho bảng `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`MAPHONG`) REFERENCES `phong` (`MAPHONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
