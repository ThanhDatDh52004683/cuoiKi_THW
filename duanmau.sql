-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 24, 2022 lúc 03:26 AM
-- Phiên bản máy phục vụ: 8.0.27
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `email` varchar(225) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '12345', 'josephhuy19062002@gmail.com'),
(2, 'QuangHuy', '123', 'josephhuy19062002@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hinh` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int NOT NULL,
  `idsp` int NOT NULL,
  `noidung` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postdate` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

DROP TABLE IF EXISTS `chitiet_hoadon`;
CREATE TABLE IF NOT EXISTS `chitiet_hoadon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idthanhtoan` int NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int DEFAULT NULL,
  `gia` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hoadon`
--

INSERT INTO `chitiet_hoadon` (`id`, `idthanhtoan`, `tensp`, `soluong`, `gia`) VALUES
(1, 3, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(2, 4, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(3, 5, 'Laptop Acer Aspire 5 A515-55-35SE', 2, 22000000),
(4, 5, 'Laptop Acer Aspire 3 A315-56-37DV NX.HS5SV', 1, 22300000),
(5, 6, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(6, 7, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(7, 8, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(8, 9, 'Laptop Asus Vivobook Flip 14 TP470EA EC346W', 1, 1340000),
(9, 10, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(10, 10, 'Laptop HP 15S-FQ5080TU 6K7A0PA', 1, 9500000),
(11, 11, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(12, 11, 'Laptop Acer Aspire 3 A315-56-37DV NX.HS5SV', 1, 22300000),
(13, 12, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(14, 12, 'Laptop ASUS VivoBook A515EA-BQ1530W', 1, 13150000),
(15, 13, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(16, 14, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(17, 15, 'Laptop Acer Aspire 5 A515-55-35SE', 1, 22000000),
(18, 16, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(19, 17, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(20, 18, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 1, 22000000),
(21, 18, 'Laptop Acer Aspire 5 A515-55-35SE', 2, 22000000),
(22, 19, 'Laptop MSI Katana GF66 11UD-696VN', 1, 16200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `iddanhmuc` int NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  PRIMARY KEY (`iddanhmuc`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddanhmuc`, `tendanhmuc`) VALUES
(1, 'Acer'),
(2, 'Asus'),
(3, 'HP'),
(4, 'Msi'),
(5, 'Mac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tongtien` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `username`, `hoten`, `email`, `diachi`, `dienthoai`, `tongtien`) VALUES
(3, 'lethanhtam', 'lê thanh tâm', 'leben012626@gmail.com', '5/15a chánh hưng', '01262643165', 22000000),
(5, 'lethanhtam', 'lê thanh tâm', 'leben2@gmail.com', '1 phạm hùng', '01262643165', 66300000),
(6, 'lethanhtam', 'da', 'đá', 'đâs', 'dsadsd', 22000000),
(7, 'lethanhtam', 'Trương Hoàng Vũ', '1@gmail.com', '123hhh', '123', 22000000),
(8, 'lethanhtam', 'le ben', '2@gmail.com', '123hh', '123', 22000000),
(9, 'vutruong', 'vũ', 'vu@gmail.com', 'bình tân', '0123', 1340000),
(10, 'vutruong', 'hoàng', '1@gmail.com', 'quận 8', '0123', 31500000),
(11, 'lethanhtam', 'vũ', '1@gmail.com', '123', '123', 44300000),
(12, 'lethanhtam', 'test', '1@gmail.com', '123', '123', 35150000),
(13, 'lethanhtam', 'dsa', 'leben012626@gmail.com', 'dá', 'dsa', 22000000),
(14, 'lethanhtam', 'đá', 'leben@gmail.com', '123', '123', 22000000),
(15, 'vutruong', 'nam', 'nam@gmail.com', '123', '123', 22000000),
(16, 'lethanhtam', 'lê thanh tâm', 'leben012626@gmail.com', '123', '123', 22000000),
(17, 'lethanhtam', 'lê thanh tâm', 'leben012626@gmail.com', '123', '123', 22000000),
(18, 'lethanhtam', 'lê thanh tâm', 'ben@gmail.com', '123', '123', 66000000),
(19, 'ben', '123', '123', '123', '213', 16200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hinh` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `tensp` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `iddanhmuc` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `hinh`, `tensp`, `gia`, `iddanhmuc`) VALUES
(1, 'Laptop Acer Aspire 3 A315-56-37DV NX.HS5SV.png', 'Laptop Acer Aspire 3 A315-56-37DV NX.HS5SV', 22300000, 1),
(2, 'Laptop Acer Aspire 5 A515-55-35SE.png', 'Laptop Acer Aspire 5 A515-55-35SE', 22000000, 1),
(3, 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005.jpg', 'Laptop Acer Gaming Nitro 5 Eagle AN515-57-71VV NH.QENSV.005', 22000000, 1),
(10, 'Laptop Gaming Acer Nitro 5 Tiger AN515 58 52SP.jpg', 'Laptop Gaming Acer Nitro 5 Tiger AN515 58 52SP', 22900000, 1),
(21, 'Laptop Asus Gaming Rog Strix G15 G513IH HN015W.png', 'Laptop Asus Gaming Rog Strix G15 G513IH HN015W', 19015000, 2),
(22, 'Laptop ASUS VivoBook A515EA-BQ1530W.jpg', 'Laptop ASUS VivoBook A515EA-BQ1530W', 13150000, 2),
(23, 'Laptop Asus Vivobook Flip 14 TP470EA EC346W.jpg', 'Laptop Asus Vivobook Flip 14 TP470EA EC346W', 1340000, 2),
(24, 'Laptop Asus Zenbook UX425EA-KI839W.png', 'Laptop Asus Zenbook UX425EA-KI839W', 15900000, 2),
(33, 'Laptop HP 14-CF2033WM 3V7G4UA.jpg', 'Laptop HP 14-CF2033WM 3V7G4UA', 11990000, 3),
(34, 'Laptop HP 15S-FQ5080TU 6K7A0PA.png', 'Laptop HP 15S-FQ5080TU 6K7A0PA', 9500000, 3),
(35, 'Laptop HP DQ2031TG.png', 'Laptop HP DQ2031TG', 11500000, 3),
(36, 'Laptop HP Gaming Victus 16-E0175AX 4R0U8PA.png', 'Laptop HP Gaming Victus 16-E0175AX 4R0U8PA', 13500000, 3),
(45, 'Laptop Gaming MSI Bravo 15 B5DD 276VN.png', 'Laptop Gaming MSI Bravo 15 B5DD 276VN', 19900000, 4),
(46, 'Laptop MSI Crosshair 15 B12UEZ-460VN.png', 'Laptop MSI Crosshair 15 B12UEZ-460VN', 12000000, 4),
(47, 'Laptop MSI Katana GF66 11UD-696VN.png', 'Laptop MSI Katana GF66 11UD-696VN', 16200000, 4),
(48, 'Laptop MSI Modern 14 B5M 203VN.png', 'Laptop MSI Modern 14 B5M 203VN', 11900000, 4),
(57, 'Apple MacBook Air M1 256GB 2020.png', 'Apple MacBook Air M1 256GB 2020', 23000000, 5),
(58, 'Apple Macbook Air M2 2022 8GB 256GB.png', 'Apple Macbook Air M2 2022 8GB 256GB', 24400000, 5),
(59, 'Apple Macbook Pro 13 M2 2022 8GB 256GB.png', 'Apple Macbook Pro 13 M2 2022 8GB 256GB', 29500000, 5),
(60, 'Macbook Pro 14 M1 Pro 10 CPU - 16 GPU 16GB 1TB 2021.png', 'Macbook Pro 14 M1 Pro 10 CPU - 16 GPU 16GB 1TB 2021', 39000000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `name` varchar(225) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `avata` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `avata`) VALUES
(45, 'vutruong', '123', 'truonghoangvu', 'truong@gmail.com', '123'),
(44, 'lethanhtam', '123', 'leben', 'leben012626@gmail.com', '123'),
(38, 'ben', '123', 'ben1', 'ben@gmail.com', '123'),
(43, '1', '123', '1', '1@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
