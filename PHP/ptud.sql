-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 01:26 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ptud`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `ID_DanhGia` int(10) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `ID_ThanhVien` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`ID_DanhGia`, `NoiDung`, `ID_ThanhVien`) VALUES
(10, 'Rất hài lòng!', 1),
(11, 'Rất vui!!!', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goitap`
--

CREATE TABLE `goitap` (
  `IDGoiTap` int(10) NOT NULL,
  `TenGoi` varchar(100) NOT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `ThoiHan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `goitap`
--

INSERT INTO `goitap` (`IDGoiTap`, `TenGoi`, `Gia`, `ThoiHan`) VALUES
(1, '1 Thángg', 100000.00, '1 tháng'),
(2, '3 tháng', 250000.00, '3 tháng'),
(3, '6 Tháng', 450000.00, '6 tháng'),
(4, '1 Năm', 800000.00, '1 năm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHoaDon` int(10) NOT NULL,
  `SoTien` double(10,4) NOT NULL,
  `TinhTrangThanhToan` varchar(50) DEFAULT NULL,
  `HinhThucThanhToan` varchar(50) DEFAULT NULL,
  `NgayThanhToan` datetime DEFAULT NULL,
  `NgayLapHoaDon` datetime NOT NULL,
  `IDThanhVien` int(10) DEFAULT NULL,
  `IDNhanVien` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IDHoaDon`, `SoTien`, `TinhTrangThanhToan`, `HinhThucThanhToan`, `NgayThanhToan`, `NgayLapHoaDon`, `IDThanhVien`, `IDNhanVien`) VALUES
(1, 200000.0000, 'Đã thanh toán', 'Chuyển Khoản ngân hàng', '2024-11-05 11:05:10', '2024-09-15 00:00:00', 1, 1),
(5, 999999.9999, 'Đã thanh toán', 'Chuyển Khoản ngân hàng', '2024-11-05 11:04:02', '2024-11-05 07:03:01', 1, 1),
(6, 999999.9999, 'Chờ xác nhận', 'Tiền Mặt', '2024-11-05 09:57:55', '2024-11-05 07:04:56', 1, 1),
(13, 450000.0000, 'Chưa Thanh Toán', NULL, NULL, '2024-12-08 08:56:26', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `IDKhuyenMai` int(10) NOT NULL,
  `TenKhuyenMai` varchar(100) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `MucGiamGia` decimal(10,5) DEFAULT NULL,
  `DieuKien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`IDKhuyenMai`, `TenKhuyenMai`, `NoiDung`, `MucGiamGia`, `DieuKien`) VALUES
(2, 'giảm 25k', 'Giảm 25k cho đơn 500k', 25000.00000, 50000),
(3, 'giảm 50k', 'giảm 50k cho đơn 750k', 50000.00000, 750000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `IDLichLamViec` int(10) NOT NULL,
  `NgayLamViec` datetime NOT NULL,
  `CaLamViec` varchar(50) DEFAULT NULL,
  `TrangThai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IDNhanVien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`IDLichLamViec`, `NgayLamViec`, `CaLamViec`, `TrangThai`, `IDNhanVien`) VALUES
(1, '2024-09-20 00:00:00', '6:00-8:00 AM', 'Đã hoàn thành', 1),
(912136063, '2024-12-20 00:00:00', '15:00 - 17:00 PM', 'Đã hoàn thành', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsutapluyen`
--

CREATE TABLE `lichsutapluyen` (
  `NgayTap` datetime NOT NULL,
  `IDThanhVien` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsutapluyen`
--

INSERT INTO `lichsutapluyen` (`NgayTap`, `IDThanhVien`) VALUES
('2024-10-12 00:00:00', 1),
('2024-12-04 16:42:15', 1),
('2024-12-04 00:00:00', 1),
('2024-12-04 00:00:00', 1),
('2024-12-04 00:00:00', 3),
('2024-12-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(10) NOT NULL,
  `TenNhanVien` varchar(250) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NgayVaoLam` date NOT NULL,
  `IDRole` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`IDNhanVien`, `TenNhanVien`, `SoDienThoai`, `Password`, `DiaChi`, `Email`, `NgayVaoLam`, `IDRole`) VALUES
(1, 'Minh', '0379789461', 'e10adc3949ba59abbe56e057f20f883e', 'â', 'npnminh@gmail.com', '2024-05-05', 1),
(2, 'Nguyễn Duy Bảo', '0822191159', 'e10adc3949ba59abbe56e057f20f883e', '26 nê nợi', 'nguyenduybaoaaa@gmail.com', '2024-10-09', 2),
(3, 'MA', '0354455525', 'e10adc3949ba59abbe56e057f20f883e', 'ai biet a', 'kbiet@gmail.com', '2024-10-09', 3),
(4, 'dũng', '0354729909', 'e10adc3949ba59abbe56e057f20f883e', '123456 a', 'duybao11123@gmail.com', '2003-01-10', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoikhachhang`
--

CREATE TABLE `phanhoikhachhang` (
  `IDPhanHoi` int(10) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `IDNhanVien` int(10) DEFAULT NULL,
  `ID_DanhGia` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `IDThanhVien` int(10) NOT NULL,
  `TenThanhVien` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `NgayThamGia` date NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`IDThanhVien`, `TenThanhVien`, `SoDienThoai`, `DiaChi`, `email`, `NgayThamGia`, `Password`) VALUES
(1, 'Nguyễn Duy Bảo', '0822191159', 'quang trung, 340', 'dba@gmaail.aaa', '2024-09-12', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'dung', '0354729909', 'quang trung', 'nguyenduybaodt1821@gmail.com', '2024-12-04', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien_goitap`
--

CREATE TABLE `thanhvien_goitap` (
  `ThoiGianBatDau` datetime NOT NULL,
  `ThoiGIanKetThuc` datetime NOT NULL,
  `IDThanhVien` int(10) DEFAULT NULL,
  `IDGoiTap` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien_goitap`
--

INSERT INTO `thanhvien_goitap` (`ThoiGianBatDau`, `ThoiGIanKetThuc`, `IDThanhVien`, `IDGoiTap`) VALUES
('2024-10-22 00:50:45', '2024-10-22 17:50:45', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `IDThietBi` int(10) NOT NULL,
  `TenThietBi` varchar(100) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `NgaySanXuat` date NOT NULL,
  `NoiSanXuat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` (`IDThietBi`, `TenThietBi`, `TinhTrang`, `NgaySanXuat`, `NoiSanXuat`) VALUES
(3, 'máy tập chân', 'ok', '2024-12-03', 'nghệ an'),
(4, 'máy chạy', 'ok', '2024-12-03', 'nghệ an'),
(5, 'máy nâng đùiaaa', 'Cũ', '2000-10-01', 'nghệ ann');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi_loi`
--

CREATE TABLE `thietbi_loi` (
  `NgayXayRaLoi` datetime NOT NULL,
  `ThongTinLoi` varchar(255) NOT NULL,
  `KetQuaBaoTri` varchar(255) NOT NULL,
  `ChiPhiBaoTri` decimal(10,4) NOT NULL,
  `IDThietBi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbi_loi`
--

INSERT INTO `thietbi_loi` (`NgayXayRaLoi`, `ThongTinLoi`, `KetQuaBaoTri`, `ChiPhiBaoTri`, `IDThietBi`) VALUES
('2003-01-10 00:00:00', 'hu', 'Đã sửa', 50000.0000, 3),
('2222-01-10 00:00:00', 'hu', 'Không sửa được', 250000.0000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `IDRole` int(10) NOT NULL,
  `TenViTri` varchar(100) NOT NULL,
  `MoTa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`IDRole`, `TenViTri`, `MoTa`) VALUES
(1, 'Quản lý', 'Quản trị tất cả'),
(2, 'Nhân viên ', 'Nhân viên trực quầy'),
(3, 'Kế toán', 'bộ phận kế toán');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`ID_DanhGia`),
  ADD KEY `fk_idthanhvien_danhgia` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `goitap`
--
ALTER TABLE `goitap`
  ADD PRIMARY KEY (`IDGoiTap`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `IDThanhVien` (`IDThanhVien`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`IDKhuyenMai`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`IDLichLamViec`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `lichsutapluyen`
--
ALTER TABLE `lichsutapluyen`
  ADD KEY `IDThanhVien` (`IDThanhVien`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`),
  ADD KEY `IDRole` (`IDRole`);

--
-- Chỉ mục cho bảng `phanhoikhachhang`
--
ALTER TABLE `phanhoikhachhang`
  ADD PRIMARY KEY (`IDPhanHoi`),
  ADD KEY `fk_idthanhvien_phkh` (`IDNhanVien`),
  ADD KEY `fk_iddanhgia_dg` (`ID_DanhGia`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`IDThanhVien`);

--
-- Chỉ mục cho bảng `thanhvien_goitap`
--
ALTER TABLE `thanhvien_goitap`
  ADD KEY `IDThanhVien` (`IDThanhVien`),
  ADD KEY `IDGoiTap` (`IDGoiTap`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`IDThietBi`);

--
-- Chỉ mục cho bảng `thietbi_loi`
--
ALTER TABLE `thietbi_loi`
  ADD KEY `IDThietBi` (`IDThietBi`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`IDRole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `ID_DanhGia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `goitap`
--
ALTER TABLE `goitap`
  MODIFY `IDGoiTap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHoaDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `IDKhuyenMai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `IDLichLamViec` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=912136064;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `IDNhanVien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phanhoikhachhang`
--
ALTER TABLE `phanhoikhachhang`
  MODIFY `IDPhanHoi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `IDThanhVien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `IDThietBi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_idthanhvien_danhgia` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`IDThanhVien`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDThanhVien`) REFERENCES `thanhvien` (`IDThanhVien`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`);

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviec_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`);

--
-- Các ràng buộc cho bảng `lichsutapluyen`
--
ALTER TABLE `lichsutapluyen`
  ADD CONSTRAINT `lichsutapluyen_ibfk_1` FOREIGN KEY (`IDThanhVien`) REFERENCES `thanhvien` (`IDThanhVien`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDRole`) REFERENCES `vaitro` (`IDRole`);

--
-- Các ràng buộc cho bảng `phanhoikhachhang`
--
ALTER TABLE `phanhoikhachhang`
  ADD CONSTRAINT `fk_iddanhgia_dg` FOREIGN KEY (`ID_DanhGia`) REFERENCES `danhgia` (`ID_DanhGia`),
  ADD CONSTRAINT `fk_idthanhvien_phkh` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`);

--
-- Các ràng buộc cho bảng `thanhvien_goitap`
--
ALTER TABLE `thanhvien_goitap`
  ADD CONSTRAINT `thanhvien_goitap_ibfk_1` FOREIGN KEY (`IDThanhVien`) REFERENCES `thanhvien` (`IDThanhVien`),
  ADD CONSTRAINT `thanhvien_goitap_ibfk_2` FOREIGN KEY (`IDGoiTap`) REFERENCES `goitap` (`IDGoiTap`);

--
-- Các ràng buộc cho bảng `thietbi_loi`
--
ALTER TABLE `thietbi_loi`
  ADD CONSTRAINT `FKTBL` FOREIGN KEY (`IDThietBi`) REFERENCES `thietbi` (`IDThietBi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
