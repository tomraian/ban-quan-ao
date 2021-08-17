-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2021 lúc 03:08 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminPassword`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(10, 'Yame'),
(17, 'Việt Tiến');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`categoryId`, `categoryName`) VALUES
(6, 'Áo khoác | Jacket'),
(8, 'Áo tay dài | Sweater'),
(9, 'Áo trùm đầu | Hoodie'),
(10, 'ÁO | CLOTHES'),
(11, 'Sơ mi | Shirt'),
(13, 'Quần dài | Pants'),
(14, 'Quần ngắn | Short');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productPrice` float NOT NULL,
  `productDiscount` float NOT NULL,
  `productDesc` text NOT NULL,
  `productAmount` int(11) NOT NULL,
  `productFeatured` bit(1) NOT NULL,
  `productStatus` bit(1) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productImage`, `productPrice`, `productDiscount`, `productDesc`, `productAmount`, `productFeatured`, `productStatus`, `categoryId`) VALUES
(47, 'Áo Pet Cầu Vồng - APCV', '22fe4dfc5129087fa84099c69f1ed9c6.jpg', 70000, 140000, 'size S fit cho Pet từ 1kg\r\n\r\nsize L fit cho Pet từ 3kg trở xuống', 1000, b'1', b'0', 10),
(48, 'Áo Thun Basic Degrey Trắng - ATBD Trắng', 'ac65347e57b60f77779f8d35ff7e52ae.jpg', 190000, 0, 'áo này đẹp lắm mua nha\r\n\r\nmàu trắng như tuyết mà mặc ấm lắm', 1000, b'1', b'0', 10),
(49, 'Áo Thun Basic Degrey Đen - ATBD Đen', 'ff73d36fc977066d7362c6150210a1bd.jpg', 190000, 0, 'Cũng giống áo màu trắng mà cái này color đen xì nhaaaaa!', 1000, b'1', b'0', 10),
(50, 'Áo Thun Cầu Vồng Degrey - ATCV', 'd286705e29d93630966d0f02e52a2085.jpg', 170000, 0, 'Phiên bản nâng cấp của áo màu trắng, có thêm cầu vồng \r\n\r\nthích hợp cho diện khi đi chơi cùng bạn bè ', 1000, b'1', b'0', 10),
(51, 'Hút Đi Logo Nhiều Màu - HLNM', '6cbfbe6c3d2a3632ec1c88c0d3357357.jpg', 380000, 0, 'áo dành cho các bạn thích mặc ở mùa hè nắng nóng\r\n\r\nmặc cái này đi cua gái bao dính nha mấy bợn !', 1000, b'1', b'0', 10),
(52, 'Áo thun xike Degrey Trắng - AXK Trắng', '12a774e640552e051e305d1fcd3f3954.jpg', 225000, 0, 'Phiên limited bán khi nào hết thì sản xuất tiếp !\r\n\r\nĐảm bảo bao bền, bao rẻ xé là rách', 1000, b'1', b'0', 10),
(53, 'Áo Giờ Giải Lao Đen - GGL Đen', 'b5dcf7955e32e42aa6961343402cbddd.jpg', 380000, 0, 'Áo này mặc mát lắm , đảm bảo mặc xong như đi xông hơi', 1000, b'1', b'0', 6),
(54, 'Áo khoác Degrey Thêu Vàng - AKDV', '8952d785433776ddc1fdf8621ba02f66.jpg', 270000, 0, 'Áo này mặc vào mùa hè là bao ngầu, khùng luôn nha mấy bạn', 1000, b'1', b'0', 6),
(55, 'Áo Khoác Degrey Trắng Đen - AKTD', '885855805c0af8d200c2f767866db44d.jpg', 270000, 0, 'Áo khoác đẹp màu trắng đen, thích hợp cho việc đi đánh nghen bao dính', 1000, b'1', b'0', 6),
(56, 'Áo Khoác Giờ Giải Lao - GGL', '3297233bcfe6484ccdc493f8e2ca4676.jpg', 380000, 0, 'Áo khoác phù hợp cho việc đi giải lao, mỗi lần giải lao bạn nên mặc áo này \r\n\r\ncòn tác dụng của nó là tốn thời gian thay áo của bạn thoi chứ ko có lợi gì đâu', 1000, b'1', b'0', 6),
(57, 'Áo Khoác Hoả Tiễn Đen - RJB ÁO', 'ffa0262c81cd2e18d341a0e7048248fc.jpg', 270000, 0, 'Áo khoác phù hợp cho các bạn đam mê tên lữa \r\n\r\nmặc xong đảm bảo Kim Jong un còn không dám đụng đến bạn', 10000, b'1', b'0', 6),
(58, 'Áo Khoác Mặt Cười Degrey - HMC', '0fbba95d07b09fb5c9671472df6c2ca8.jpg', 240000, 0, 'Mặc áo này không cần thể hiện cảm xúc nhiều vì áo khác có làm giúp bạn\r\n\r\nmặc xong đảm bảo trầm cảm', 10000, b'1', b'0', 6),
(59, 'Áo Degrey Tay Dài Thêu Nắng Hồng - DGST Hồng', 'ce3489043ea4e855644efcb7c9080cb5.jpg', 160000, 0, 'Áo tay dài thoáng mát siêu nam tính và dễ thương :)) ', 1000, b'1', b'0', 8),
(60, 'Áo Tay Dài Đẹp Lắm - ATD Trắng', '6790a348d6793fac571a60ea93a28cef.jpg', 175000, 0, 'Áo trắng tinh phù hợp cho cho việc bốc vác hoặc FUHO\r\n\r\nÁo dài tay cũng chẳng giúp bạn tay dài ra đâu nên hãy mua nhé!', 1000, b'1', b'0', 8),
(61, 'Áo Tay Dài Đẹp Lắm - ATD Đen', '897113b9889e620316cafc7e4e8ecb7c.jpg', 175100, 0, 'Cũng giống cái áo màu trắng kia \r\n\r\nChức năng của chiếc áo này Đặt biệt dành cho các bạn có làn da Đen\r\n Chộm tró là như 1 nhẫn giả', 1000, b'1', b'0', 6),
(62, 'Áo Tay Dài Đẹp Lắm Wax - ATD Wax', '8f7cb87de58221cf8ef8858ee55869f2.jpeg', 175000, 0, 'Phiên bản màu xám chả tác dụng cái gì mặc cho vui \r\n\r\nđược chưa', 1000, b'1', b'0', 8),
(63, 'Sweater Degrey Phản Quang - SDPQ', 'fb89bc763257b85094e09bf919220f1a.jpeg', 195000, 0, 'áo mặc vào buổi tối siêu nổi bật \r\n\r\nkhi mặc vào ban đêm đảm biết Bố Bạn Là Ai', 10000, b'1', b'0', 8),
(64, 'Blackpink Sweater - BPS', '99d1dabbf4712a8c14b23e9a65625e51.jpeg', 195000, 0, 'Mặc áo này đi coi Nhóm T-ARA nhảy bao ngầu luôn nha', 1000, b'1', b'0', 8),
(65, 'Hút Đì Loang Đen - HTB Đen', '0223df4efadfa3ad6cde90e8efce5681.jpeg', 270000, 0, 'Áo Tuy là màu đen nhưng rất trắng nha các bạn', 1000, b'1', b'0', 9),
(66, 'Hút Đì Loang Hồng - HTB Hồng', '89cc64c1ca3c7e497b2db039888f38ff.jpeg', 270000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 9),
(67, 'Hút Đì Loang Xanh - HTB Xanh', '49d4f366a6e3792996f5ca3cc06e5080.jpeg', 270000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 9),
(68, 'Hút Đì Loang Xám - HTL', '1d1038b8a6ef548bb1ee2a1780603daa.jpeg', 234000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 9),
(69, 'Hút Đì Loang Cam - HTS', '9cae9878912f74cd996e1b0d34cbdc12.jpeg', 234000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 9),
(70, 'Hút Đi Degrey x Cối Xay Gió', '5249efc1112663d9d463b753cb145c93.jpeg', 144000, 0, 'Áo Này mặc siêu bay luôn nha', 1000, b'1', b'0', 9),
(71, 'Degrey Pant Đen - DP Đen', 'b99a55cebbf639bc3d1327b76f0fc01e.jpeg', 288000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 13),
(72, 'Degrey Pant Kem - DP Kem', 'aad3886855da437fe2b6986288096a9e.jpeg', 280000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 6),
(73, 'Degrey Pant Trắng - DP Trắng', 'caa0fde4d06f2b4c949ac41f62d5526b.jpeg', 280000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 10000, b'1', b'0', 6),
(74, 'Quần Dài Chữ Degrey - QDCD', '493dc5fa11054d0eeeb00639345ecd72.jpeg', 195000, 0, 'Quần bao ngầu luôn nha', 1000, b'1', b'0', 13),
(75, 'Quần Dài Classic Chữ Degrey Xanh - QDCX', '2081b53def4a7d02a8f2c568be45e1ef.jpeg', 96000, 0, 'Quần đẹp Quá', 10000, b'1', b'0', 13),
(76, 'Quàn Dài Degrey Wax - QDW', '9f9e344eec211f86f08229c275d03303.jpeg', 350000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 13),
(77, 'Degrey Quần Jean Ngắn Đen - QJN Đen', 'e2d8ea197dd7ecedd6fc83b87bd1110e.jpeg', 203000, 0, 'Quần này vào mùa đông đi chơi bao ấm cúng nhaa', 1000, b'1', b'0', 14),
(78, 'Degrey Quần Jean Ngắn Xám - QJN Xám', '1bc4c3e03126d227b8c2a085ef6f4a53.jpeg', 203000, 290000, 'Lên youtube coi chứ ko biết nói gì', 1111, b'1', b'0', 14),
(79, 'Degrey Quần Jean Ngắn Xanh - QJN Xanh', '14ecce3cd081435a45ac39f5fb4ea168.jpeg', 203000, 290000, 'Như mấy cái khác :v', 10000, b'1', b'0', 14),
(80, 'Quần Degrey Ngắn Nhiều Túi - QNNT', '3a7c16042603aa27ee4104eca01b5dc7.jpeg', 210000, 300000, 'Quần dễ dàng vận động nhất là ở trên giường', 1000, b'1', b'0', 14),
(81, 'Quần Degrey Ngắn Màu Navy - QN Navy', '96b73864bb60cc73429c7815bccb4845.jpeg', 210000, 300000, 'Như mấy cái kia :v\r\n', 1000, b'1', b'0', 14),
(82, 'Quần Degrey Ngắn Wax - QNW', '89d4932f837292df32f867adbc352905.jpeg', 210000, 300000, 'Như mấy cái kia luôn hihi :V\r\n', 10000, b'1', b'0', 14),
(83, 'Sơ Mi Siết Tay Anh Xanh - STA Xanh', '3059efc1bf5eac52f29db0a21806051b.jpeg', 165000, 330000, 'Áo này mặc đi biển là ko sợ cá mập luôn nha ', 10000, b'1', b'0', 11),
(84, 'Ice Cream Shirt - ICS Blue', '49ef9d60d6370ccf80e9f7437404470f.jpeg', 290000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 11),
(85, 'Ice Cream Shirt - ICS Pink', '7b48e7bb5d33fde000a7ed491aaf3a8a.jpeg', 290000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'0', 11),
(86, 'Sơ Mi UFO Degrey - SMU', '866d37f74728e0779c384c4367ce0113.jpeg', 149000, 290000, 'Mặc áo này auto crush đỗ nha', 10000, b'1', b'0', 11);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
