-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2025 lúc 06:00 AM
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
-- Cơ sở dữ liệu: `thuexe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(50) NOT NULL,
  `TENKH` varchar(100) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `DIACHI`) VALUES
('KH001', 'Nguyen Van A', '0912345678', '123 Le Loi, HCM'),
('KH002', 'Tran Thi B', '0987654321', '456 Nguyen Trai, HN'),
('KH003', 'Pham Van C', '0938123456', '789 Hai Ba Trung, DN'),
('KH004', 'Nguyen Thi D', '0945678901', '101 Phan Chau Trinh, HCM'),
('KH005', 'Le Van E', '0923456789', '202 Le Thanh Ton, HN'),
('KH006', 'Do Thi F', '0971234567', '303 Tran Hung Dao, DN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `MAKH` varchar(50) DEFAULT NULL,
  `SOXE` varchar(50) DEFAULT NULL,
  `NGAYTHUE` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `GIATHUE` float DEFAULT NULL,
  `MAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`MAKH`, `SOXE`, `NGAYTHUE`, `NGAYTRA`, `GIATHUE`, `MAT`) VALUES
('KH002', 'XE002', '2025-01-03', '2025-01-07', 3200000, 3),
('KH003', 'XE003', '2025-01-05', '2025-01-10', 6000000, 4),
('KH004', 'XE006', '2025-01-08', '2025-01-12', 4400000, 5),
('KH005', 'XE007', '2025-01-09', '2025-01-14', 5000000, 6),
('KH006', 'XE008', '2025-01-10', '2025-01-15', 6500000, 7),
('KH001', 'XE009', '2025-01-06', '2025-01-09', 2250000, 8),
('KH003', 'XE010', '2025-01-04', '2025-01-09', 4500000, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `SOXE` varchar(50) NOT NULL,
  `TENXE` varchar(100) DEFAULT NULL,
  `HANGXE` varchar(100) DEFAULT NULL,
  `SOCHO` varchar(10) DEFAULT NULL,
  `NAMSX` varchar(4) DEFAULT NULL,
  `DGTHUE` float DEFAULT NULL,
  `TINHTRANG` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`SOXE`, `TENXE`, `HANGXE`, `SOCHO`, `NAMSX`, `DGTHUE`, `TINHTRANG`) VALUES
('62A-23647', 'Aventador SVJ', 'Lamborghini', '2', '2024', 50000000, 0),
('XE001', 'Toyota Camry', 'Toyota', '5', '2020', 1000000, 0),
('XE002', 'Honda Civic', 'Honda', '5', '2019', 800000, 0),
('XE003', 'Hyundai SantaFe', 'Hyundai', '7', '2021', 1200000, 1),
('XE004', 'Kia Morning', 'Kia', '4', '2018', 500000, 1),
('XE005', 'Ford Ranger', 'Ford', '5', '2022', 1500000, 1),
('XE006', 'Mazda CX-5', 'Mazda', '5', '2021', 1100000, 1),
('XE007', 'Mitsubishi Xpander', 'Mitsubishi', '7', '2020', 1000000, 1),
('XE008', 'VinFast Lux SA2.0', 'VinFast', '7', '2022', 1300000, 1),
('XE009', 'Toyota Vios', 'Toyota', '5', '2019', 750000, 1),
('XE010', 'Hyundai Kona', 'Hyundai', '5', '2021', 900000, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MAT`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `SOXE` (`SOXE`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`SOXE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `thue`
--
ALTER TABLE `thue`
  MODIFY `MAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`SOXE`) REFERENCES `xe` (`SOXE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
