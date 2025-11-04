-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 17, 2022 lúc 03:11 PM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nike_php`
--
-- --------------------------------------------------------
create database nike_php;
--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

USE nike_php;

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');
-- pass: 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(1, 'SL1', 1, 1);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

-- INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `diachi`, `chucvu`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Men', 1),
(2, 'Women', 2),
(3,'Kids',3);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_payment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

-- INSERT INTO `tbl_giohang` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_payment`) VALUES
-- (28, 1, '4095', 0, '0'),
-- (31, 1, '1378', 0, '0'),
-- (32, 3, '6909', 0, '0'),
-- (34, 3, '3504', 0, '0'),
-- (35, 3, '4469', 0, '0'),
-- (36, 3, '6875', 1, 'tienmat'),
-- (37, 3, '3524', 1, 'Chuyển Khoảng'),
-- (38, 9, '8326', 1, 'Tiền Mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` VALUES(1,'Nike Air Force 1','Nike-1','2929000',12,'ma.jpg','Sự rạng rỡ vẫn tồn tại trong Nike Air Force 1 , phiên bản bóng rổ nguyên bản mang đến sự thay đổi mới mẻ về những gì bạn biết rõ nhất: lớp phủ được khâu bền, lớp hoàn thiện gọn gàng và lượng đèn flash hoàn hảo giúp bạn tỏa sáng.','',1,0);
INSERT INTO `tbl_sanpham` VALUES(2,'Zion 3 PF','Nike-2','4109000',24,'mb.jpg','Chiếc giày đặc trưng thứ ba của Zion nhằm tôn vinh sự cống hiến mà anh ấy đã bỏ ra để tạo ra trò chơi đặc biệt của mình. Được trang bị công nghệ sẵn sàng cho sân đấu, nó được thiết kế dành cho những người chơi bóng thành thạo cả trên bộ và trên không. Ở mức thấp và kiềm chế, sau đó bùng nổ lên trời và quay trở lại trái đất một cách êm ái.','',1,0);
INSERT INTO `tbl_sanpham` VALUES(3,'Nike Full Force Low','Nike-3','2649000',10,'mc.jpg','Một đôi giày mới với nét hấp dẫn cổ điển—giấc mơ cổ điển của bạn vừa trở thành hiện thực. Thiết kế tối giản này lấy cảm hứng từ AF-1 cổ điển, sau đó chuyển sang phong cách thập niên 80 với đường khâu ngược và màu sắc lấy cảm hứng từ trường đại học.','',1,0);


INSERT INTO `tbl_sanpham` VALUES(4,'Nike Air Max Solo','Nike-4','2929000',15,'wa.jpg','Cách giải thích hiện đại về các yếu tố cổ điển này là hoàn hảo cho những người hâm mộ cuồng nhiệt Air Max. Mặc lớp lưới thoáng khí và da tổng hợp sang trọng, với phần lót gót lấy cảm hứng từ AM90. AM180 ảnh hưởng đến kết cấu của thiết bị Air, mang lại lượng đệm vừa phải.','',2,0);
INSERT INTO `tbl_sanpham` VALUES(5,'Nike Dunk Low','Nike-5','2929000',20,'wb.jpg','Với thiết kế vòng mang tính biểu tượng, Nike Dunk Low mang phong cách cổ điển của thập niên 80 trở lại đường phố trong khi cổ giày có đệm, cổ thấp cho phép bạn mang trận đấu của mình đi bất cứ đâu—một cách thoải mái.','',2,0);
INSERT INTO `tbl_sanpham` VALUES(6,'Jordan Stadium 90','Nike-6','4109000',13,'wc.jpg','Phát triển trò chơi của bạn. Stadium 90 lấy các yếu tố từ những người vĩ đại và biến chúng thành thứ gì đó hoàn toàn độc đáo. Kết hợp các yếu tố thiết kế mang tính biểu tượng từ AJ1 và AJ5, đây là mẫu giày cổ điển mới tập trung vào sự thoải mái, độ bền và độ ổn định.','',2,0);


INSERT INTO `tbl_sanpham` VALUES(7,'Nike Dunk Low SE','Nike-7','2929000',15,'ka.jpg','Tôn vinh tiềm năng vô tận của bạn và sức mạnh khi chơi với phiên bản Nike Dunk đặc biệt này. Với chất liệu da bền và khả năng bám đường, chúng tôi đã thiết kế những đôi giày này với ý tưởng dành cho các ngôi sao trong tương lai. Hãy mặc chúng vào, thắt dây giày và cho cả thế giới thấy bạn chọn cách tận hưởng niềm vui như thế nào.','',3,0);
INSERT INTO `tbl_sanpham` VALUES(8,'Nike Air More Uptempo','Nike-8','2929000',6,'kb.jpg','Một điều nổi bật về Nike Air More Uptempo. Bạn có đoán được nó là gì không? Đó là tất cả về A-I-R! Những đôi giày hàng ngày này đã đạt được đẳng cấp riêng vào những năm 90. Giờ đây, họ sẵn sàng giúp bạn vạch ra con đường mới với phong cách huyền thoại và sự thoải mái lâu dài của đệm khí.','',3,0);
INSERT INTO `tbl_sanpham` VALUES(9,'Nike Air Max SYSTM','Nike-9','2929000',8,'kc.jpg','Băng cassette, video ca nhạc và khu trung tâm mua sắm—thập niên 80 có tất cả. Chúng tôi đang kỷ niệm kỷ nguyên khốc liệt đó với Nike Air Max SYSTM. Từ bộ phận Air to lớn và táo bạo ở gót chân cho đến những đường nét thiết kế lấy cảm hứng từ đôi giày Air Max cũ yêu thích của chúng tôi, những cú đá này đều nhằm mục đích mang lại những gì thú vị và giới thiệu nó cho thế hệ mới.','',3,0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `id_dangky` int(11) NOT NULL
);

CREATE TABLE `tbl_thongke` (
  `Id_thongke` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `ngaydat` varchar(50) NOT NULL,
  `doanhthu` varchar(50)
);
INSERT INTO `tbl_thongke` VALUES(1,"2023-11-01","5000000");
INSERT INTO `tbl_thongke` VALUES(2,"2023-11-02","4000000");
INSERT INTO `tbl_thongke` VALUES(3,"2023-11-03","10000000");
INSERT INTO `tbl_thongke` VALUES(4,"2023-11-04","9000000");


CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `vnp_amuont` varchar(50) NOT NULL,
  `vnp_bankCode` varchar(50) NOT NULL,
  `cnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_oderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
);
CREATE TABLE `tbl_landlord` (
  `id_landlord` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `address` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id_landlord`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `tbl_rental` (
  `id_rental` INT(11) NOT NULL AUTO_INCREMENT,
  `id_landlord` INT(11) NOT NULL,
  `product_name` VARCHAR(100) NOT NULL,
  `product_image` VARCHAR(100) NOT NULL,
  `rental_price` FLOAT NOT NULL,
  `rental_duration` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `status` INT(1) NOT NULL DEFAULT 1, -- 1: Available, 0: Rented
  PRIMARY KEY (`id_rental`),
  FOREIGN KEY (`id_landlord`) REFERENCES `tbl_landlord`(`id_landlord`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
