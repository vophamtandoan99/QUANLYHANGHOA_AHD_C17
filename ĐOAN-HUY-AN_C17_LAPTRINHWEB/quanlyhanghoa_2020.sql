-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 02:31 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyhanghoa_2020`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `maDL` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenDL` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(12) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `daily`
--

INSERT INTO `daily` (`id`, `maDL`, `tenDL`, `diachi`, `sdt`, `status`) VALUES
(2, 'DL001', 'bán sỉ', 'Phú Yên', 337338920, 2),
(3, 'DL003', 'ĐOAN', 'ĐOAN', 337338920, 2),
(4, 'DL006', 'Đại Lý Xăng Dầu', 'Bình Dương', 337338923, 2),
(5, 'DL9996', 'Link Kim Ngon', 'Hòa Xuân', 356987233, 1),
(6, 'DL002', 'Sum Dự', 'Phú Yên', 337338920, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `export`
--

CREATE TABLE `export` (
  `id` int(11) NOT NULL,
  `tenhangid` int(11) NOT NULL,
  `nccid` int(11) NOT NULL,
  `dailyid` int(11) NOT NULL,
  `tenkhoid` int(11) NOT NULL,
  `giaxuat` int(100) NOT NULL,
  `soluong` int(100) NOT NULL,
  `tonggia` int(100) NOT NULL,
  `ngayxuat` date NOT NULL,
  `ngxuat` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `export`
--

INSERT INTO `export` (`id`, `tenhangid`, `nccid`, `dailyid`, `tenkhoid`, `giaxuat`, `soluong`, `tonggia`, `ngayxuat`, `ngxuat`, `status`) VALUES
(26, 13, 4, 5, 15, 6000, 50, 315000, '2021-01-09', 16, 1),
(27, 13, 4, 5, 15, 7000, 16, 117600, '2021-01-09', 16, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `maHang` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenHang` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `maHang`, `tenHang`, `status`) VALUES
(13, 'H01', 'Nhựa dẻo', 2),
(15, 'MH001', 'Laptop', 1),
(16, 'MH002', 'Tủ Lạnh', 1),
(17, 'MH003', 'Iphone XS Max', 1),
(18, 'MH004', 'Điện Thoại', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `tenncc` int(11) NOT NULL,
  `tenhang` int(11) NOT NULL,
  `tenkho` int(11) NOT NULL,
  `gianhap` int(100) NOT NULL,
  `soluong` int(100) NOT NULL,
  `tonggia` int(100) NOT NULL,
  `dateimport` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `nguoilap` int(11) NOT NULL,
  `status` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `import`
--

INSERT INTO `import` (`id`, `tenncc`, `tenhang`, `tenkho`, `gianhap`, `soluong`, `tonggia`, `dateimport`, `nguoilap`, `status`) VALUES
(160, 4, 13, 15, 6000, 200, 1200000, '2021-01-09', 16, '1'),
(161, 7, 18, 17, 5500, 500, 2750000, '2021-01-09', 16, '2'),
(162, 7, 16, 16, 6000, 5500, 33000000, '2021-01-09', 16, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `makho` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenkho` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodienthoai` int(12) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `makho`, `tenkho`, `diachi`, `sodienthoai`, `status`) VALUES
(15, 'MK001', 'Hòa Xuân', 'Phú Yên', 337338920, 1),
(16, 'MK002', 'Tuy Hòa', 'Đông Hòa', 907091997, 1),
(17, 'MK003', 'TP.HCM', 'Tp.Hồ Chí Minh', 337338920, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(11) NOT NULL,
  `maNCC` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenNCC` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(12) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `maNCC`, `tenNCC`, `diachi`, `sdt`, `status`) VALUES
(4, 'NCC001', 'Apple', 'Tp.Hồ Chí Minh', 23895671, 1),
(7, 'NCC002', 'Panasonic', 'Bình Dương', 907091997, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `mota`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tenhangid` int(11) NOT NULL,
  `tennccid` int(11) NOT NULL,
  `tenkhoid` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaxuat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tenhangid`, `tennccid`, `tenkhoid`, `soluong`, `giaxuat`) VALUES
(36, 13, 4, 15, 134, 6000),
(37, 18, 7, 17, 500, 5500),
(38, 16, 7, 16, 5500, 6000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `gender` int(2) NOT NULL,
  `address` varchar(256) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `roleid` int(11) NOT NULL,
  `dateofbirth` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `gender`, `address`, `phone`, `roleid`, `dateofbirth`, `status`) VALUES
(16, 'vophamtandoan99@gmail.com', 'Võ Phạm Tấn Đoan', '123', 1, 'Phú Yên', 337338920, 1, '2021-01-09', 1),
(17, 'buikhachuy@gmail.com', 'Bùi Khắc Huy', '123', 1, 'Phú Yên', 337338920, 2, '2021-01-09', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EXPORT_HANGHOA` (`tenhangid`),
  ADD KEY `FK_EXPORT_NCC` (`nccid`),
  ADD KEY `FK_EXPORT_DAILY` (`dailyid`),
  ADD KEY `FK_EXPORT_NGXUAT` (`ngxuat`),
  ADD KEY `FK_EXPORT_KHOID` (`tenkhoid`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_IMPORT_KHO` (`tenkho`),
  ADD KEY `FK_IMPORT_NCC` (`tenncc`),
  ADD KEY `FK_IMPORT_HANGHOA` (`tenhang`),
  ADD KEY `FK_IMPORT_NGUOILAP` (`nguoilap`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SANPHAM_NCC` (`tennccid`),
  ADD KEY `FK_SANPHAM_KHO` (`tenkhoid`),
  ADD KEY `FK_SANPHAM_HANGHOA` (`tenhangid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USERSS_ROLE` (`roleid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `export`
--
ALTER TABLE `export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `FK_EXPORT_DAILY` FOREIGN KEY (`dailyid`) REFERENCES `daily` (`id`),
  ADD CONSTRAINT `FK_EXPORT_HANGHOA` FOREIGN KEY (`tenhangid`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `FK_EXPORT_KHOID` FOREIGN KEY (`tenkhoid`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `FK_EXPORT_NCC` FOREIGN KEY (`nccid`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `FK_EXPORT_NGXUAT` FOREIGN KEY (`ngxuat`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `FK_IMPORT_HANGHOA` FOREIGN KEY (`tenhang`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `FK_IMPORT_KHO` FOREIGN KEY (`tenkho`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `FK_IMPORT_NCC` FOREIGN KEY (`tenncc`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `FK_IMPORT_NGUOILAP` FOREIGN KEY (`nguoilap`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_HANGHOA` FOREIGN KEY (`tenhangid`) REFERENCES `hanghoa` (`id`),
  ADD CONSTRAINT `FK_SANPHAM_KHO` FOREIGN KEY (`tenkhoid`) REFERENCES `kho` (`id`),
  ADD CONSTRAINT `FK_SANPHAM_NCC` FOREIGN KEY (`tennccid`) REFERENCES `nhacungcap` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USERSS_ROLE` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `FK_USER_ROLE` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
