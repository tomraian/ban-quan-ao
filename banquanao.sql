-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 21, 2021 lúc 04:57 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

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
(1, 'admin', 'admin@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(3, 'Hoàng Duy Admin', 'duyadmin@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `cartOrderAmount` int(11) NOT NULL,
  `cartSize` varchar(255) NOT NULL,
  `cartStatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `cartOrderAmount`, `cartSize`, `cartStatus`) VALUES
(233, 85, 2, 'M', b'0'),
(234, 86, 6, 'M', b'0'),
(235, 83, 1, 'M', b'0'),
(252, 76, 1, 'L', b'0'),
(257, 84, 3, 'M', b'0'),
(258, 83, 1, 'S', b'0'),
(259, 84, 3, 'M', b'0'),
(260, 86, 6, 'S', b'0'),
(261, 83, 1, 'M', b'0'),
(262, 71, 4, 'M', b'0'),
(263, 67, 1, 'M', b'0'),
(264, 83, 1, 'M', b'0'),
(265, 80, 3, 'M', b'0'),
(266, 78, 1, 'M', b'0'),
(267, 58, 1, 'M', b'0'),
(268, 57, 1, 'L', b'0'),
(269, 71, 4, 'M', b'0'),
(270, 71, 1, 'S', b'0'),
(271, 80, 1, 'M', b'0'),
(272, 80, 1, 'M', b'0'),
(286, 85, 2, 'M', b'1'),
(287, 84, 3, 'S', b'1'),
(288, 83, 1, 'M', b'1'),
(289, 76, 1, 'M', b'1'),
(290, 47, 1, 'M', b'1'),
(291, 76, 1, 'S', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`categoryId`, `categoryName`, `categoryLink`) VALUES
(6, 'Áo khoác', 'ao-khoac'),
(8, 'Áo tay dài', 'ao-tay-dai'),
(9, 'Áo trùm đầu', 'ao-trum-dau'),
(10, 'ÁO', 'ao'),
(11, 'Sơ mi', 'so-mi'),
(13, 'Quần dài', 'quan-dai'),
(14, 'Quần ngắn', 'quan-ngan'),
(17, 'Phụ kiện', 'phu-kien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactHeading` varchar(255) NOT NULL,
  `contactPhone` varchar(12) NOT NULL,
  `contactMessage` text NOT NULL,
  `contactTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contactStatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactId`, `contactName`, `contactEmail`, `contactHeading`, `contactPhone`, `contactMessage`, `contactTime`, `contactStatus`) VALUES
(2, 'áđâs', '123@gmail.com', 'web chán ', '2312312', '123123', '2021-08-20 02:54:56', b'1'),
(4, 'Duy', 'duy@gmail.com', 'không có gì đâu', '039444333', 'hihihhi demo', '2021-08-20 02:51:11', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerPhone` int(11) NOT NULL,
  `customerAddress` text NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `customerNote` text NOT NULL,
  `customerPayment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `customerName`, `customerPhone`, `customerAddress`, `customerEmail`, `customerNote`, `customerPayment`) VALUES
(49, 'Hoàng Duy', 123123, '12312312231', 'duy@gmail.com', 'Nhờ shipper gọi trước khi giao hàng, Đặt zxcnzxcjznxd nkjn jknsdá zxjkcnk jsnkjádnzhdákdh khkjádjkádhká hkzjxcnkjzcn', 'cod'),
(50, 'demo', 2147483647, '123123ád ád 2', 'demo@gmail.com', '123á đá ', 'cod'),
(51, 'bảo', 2147483647, 'Hồ Chí Minh', 'bao@gmail.com', 'ádá áđâsd', 'cod'),
(52, 'Duy', 28102003, 'Hồ Chí Minh, Hóc Môn', 'duy@gmail.com', '', 'cod'),
(53, 'Meooo', 123321, 'meo meo meo', 'meooo@gmail.com', 'meo meo meomeo meo meomeo meo meomeo meo meomeo meo meo', 'atm'),
(54, 'mòe mòe mòe', 2147483647, 'Hồ Chí Minh, Hóc Môn', 'moemoeeo@gmail.com', '', 'cod'),
(55, 'ahihihihih', 123123, '123123', 'hihi@gmail.com', '123123', 'atm'),
(56, 'Hoàng Duy', 394448743, 'Quận 12', 'hoangduy@gmail.com', 'đặt cho vui thôi chứ boom hàng đó', 'atm'),
(57, 'Hoàng Duy', 394448743, 'Quận 12', 'hoangduy@gmail.com', 'lần này k boom đâu huhu', 'cod'),
(58, 'mòe mòe mòe', 2147483647, 'Hồ Chí Minh, Hóc Môn', 'duy@gmail.com', '', 'cod'),
(59, 'mòe mòe mòe', 2147483647, 'Hồ Chí Minh, Hóc Môn', 'duy@gmail.com', '', 'atm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `orderCode` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderStatus` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cartId`, `orderCode`, `customerId`, `orderTime`, `orderStatus`, `userId`) VALUES
(69, 233, 'DH23161076', 49, '2021-08-17 08:47:05', 'hide', 0),
(70, 234, 'DH23161076', 49, '2021-08-17 08:47:05', 'hide', 0),
(71, 235, 'DH35539615', 50, '2021-08-17 09:01:10', 'hide', 0),
(72, 252, 'DH77335614', 51, '2021-08-17 08:56:04', 'cancel', 0),
(73, 257, 'DH28667652', 52, '2021-08-18 10:50:30', 'hide', 1),
(74, 258, 'DH42187720', 53, '2021-08-20 03:10:31', 'hide', 0),
(75, 259, 'DH55113412', 54, '2021-08-18 10:53:22', 'cancel', 1),
(76, 260, 'DH55113412', 54, '2021-08-18 10:53:22', 'cancel', 1),
(77, 261, 'DH28450419', 55, '2021-08-20 03:10:17', 'hide', 0),
(78, 262, 'DH28450419', 55, '2021-08-20 03:10:17', 'hide', 0),
(79, 263, 'DH28450419', 55, '2021-08-20 03:10:17', 'hide', 0),
(80, 264, 'DH81812478', 56, '2021-08-20 03:08:58', 'hide', 7),
(81, 265, 'DH81812478', 56, '2021-08-20 03:08:58', 'hide', 7),
(82, 266, 'DH81812478', 56, '2021-08-20 03:08:58', 'hide', 7),
(83, 267, 'DH81812478', 56, '2021-08-20 03:08:58', 'hide', 7),
(84, 268, 'DH81812478', 56, '2021-08-20 03:08:58', 'hide', 7),
(85, 269, 'DH51562276', 57, '2021-08-20 03:08:55', 'hide', 7),
(86, 270, 'DH51562276', 57, '2021-08-20 03:08:55', 'hide', 7),
(87, 271, 'DH48581301', 58, '2021-08-20 03:14:43', 'hide', 1),
(88, 272, 'DH15916948', 59, '2021-08-20 03:32:14', 'cancel', 1);

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
  `productLink` text NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productImage`, `productPrice`, `productDiscount`, `productDesc`, `productAmount`, `productFeatured`, `productStatus`, `productLink`, `categoryId`) VALUES
(47, 'Áo Pet Cầu Vồng - APCV', '22fe4dfc5129087fa84099c69f1ed9c6.jpg', 70000, 140000, 'size S fit cho Pet từ 1kg\r\n\r\nsize L fit cho Pet từ 3kg trở xuống', 1000, b'0', b'1', '', 10),
(48, 'Áo Thun Basic Degrey Trắng - ATBD Trắng', 'ac65347e57b60f77779f8d35ff7e52ae.jpg', 190000, 0, 'áo này đẹp lắm mua nha\r\n\r\nmàu trắng như tuyết mà mặc ấm lắm', 1000, b'0', b'1', '', 10),
(49, 'Áo Thun Basic Degrey Đen - ATBD Đen', 'ff73d36fc977066d7362c6150210a1bd.jpg', 190000, 0, 'Cũng giống áo màu trắng mà cái này color đen xì nhaaaaa!', 1000, b'0', b'1', '', 10),
(50, 'Áo Thun Cầu Vồng Degrey - ATCV', 'd286705e29d93630966d0f02e52a2085.jpg', 170000, 0, 'Phiên bản nâng cấp của áo màu trắng, có thêm cầu vồng \r\n\r\nthích hợp cho diện khi đi chơi cùng bạn bè ', 1000, b'0', b'1', '', 10),
(51, 'Hút Đi Logo Nhiều Màu - HLNM', '6cbfbe6c3d2a3632ec1c88c0d3357357.jpg', 380000, 0, 'áo dành cho các bạn thích mặc ở mùa hè nắng nóng\r\n\r\nmặc cái này đi cua gái bao dính nha mấy bợn !', 1000, b'0', b'1', '', 10),
(52, 'Áo thun xike Degrey Trắng - AXK Trắng', '12a774e640552e051e305d1fcd3f3954.jpg', 225000, 0, 'Phiên limited bán khi nào hết thì sản xuất tiếp !\r\n\r\nĐảm bảo bao bền, bao rẻ xé là rách', 1000, b'0', b'1', '', 10),
(53, 'Áo Giờ Giải Lao Đen - GGL Đen', 'b5dcf7955e32e42aa6961343402cbddd.jpg', 380000, 0, 'Áo này mặc mát lắm , đảm bảo mặc xong như đi xông hơi', 1000, b'0', b'1', '', 6),
(54, 'Áo khoác Degrey Thêu Vàng - AKDV', '8952d785433776ddc1fdf8621ba02f66.jpg', 270000, 0, 'Áo này mặc vào mùa hè là bao ngầu, khùng luôn nha mấy bạn', 1000, b'0', b'1', '', 6),
(55, 'Áo Khoác Degrey Trắng Đen - AKTD', '885855805c0af8d200c2f767866db44d.jpg', 270000, 0, 'Áo khoác đẹp màu trắng đen, thích hợp cho việc đi đánh nghen bao dính', 1000, b'0', b'1', '', 6),
(56, 'Áo Khoác Giờ Giải Lao - GGL', '3297233bcfe6484ccdc493f8e2ca4676.jpg', 380000, 0, 'Áo khoác phù hợp cho việc đi giải lao, mỗi lần giải lao bạn nên mặc áo này \r\n\r\ncòn tác dụng của nó là tốn thời gian thay áo của bạn thoi chứ ko có lợi gì đâu', 1000, b'0', b'1', '', 6),
(57, 'Áo Khoác Hoả Tiễn Đen - RJB ÁO', 'ffa0262c81cd2e18d341a0e7048248fc.jpg', 270000, 0, 'Áo khoác phù hợp cho các bạn đam mê tên lữa \r\n\r\nmặc xong đảm bảo Kim Jong un còn không dám đụng đến bạn', 10000, b'0', b'1', '', 6),
(58, 'Áo Khoác Mặt Cười Degrey - HMC', '0fbba95d07b09fb5c9671472df6c2ca8.jpg', 240000, 0, 'Mặc áo này không cần thể hiện cảm xúc nhiều vì áo khác có làm giúp bạn\r\n\r\nmặc xong đảm bảo trầm cảm', 10000, b'0', b'1', '', 6),
(59, 'Áo Degrey Tay Dài Thêu Nắng Hồng - DGST Hồng', 'ce3489043ea4e855644efcb7c9080cb5.jpg', 160000, 0, 'Áo tay dài thoáng mát siêu nam tính và dễ thương :)) ', 1000, b'0', b'1', '', 8),
(60, 'Áo Tay Dài Đẹp Lắm - ATD Trắng', '6790a348d6793fac571a60ea93a28cef.jpg', 175000, 0, 'Áo trắng tinh phù hợp cho cho việc bốc vác hoặc FUHO\r\n\r\nÁo dài tay cũng chẳng giúp bạn tay dài ra đâu nên hãy mua nhé!', 1000, b'0', b'1', '', 8),
(61, 'Áo Tay Dài Đẹp Lắm - ATD Đen', '897113b9889e620316cafc7e4e8ecb7c.jpg', 175100, 0, 'Cũng giống cái áo màu trắng kia \r\n\r\nChức năng của chiếc áo này Đặt biệt dành cho các bạn có làn da Đen\r\n Chộm tró là như 1 nhẫn giả', 1000, b'0', b'1', '', 6),
(62, 'Áo Tay Dài Đẹp Lắm Wax - ATD Wax', '8f7cb87de58221cf8ef8858ee55869f2.jpeg', 175000, 0, 'Phiên bản màu xám chả tác dụng cái gì mặc cho vui \r\n\r\nđược chưa', 1000, b'0', b'1', '', 8),
(63, 'Sweater Degrey Phản Quang - SDPQ', 'fb89bc763257b85094e09bf919220f1a.jpeg', 195000, 0, 'áo mặc vào buổi tối siêu nổi bật \r\n\r\nkhi mặc vào ban đêm đảm biết Bố Bạn Là Ai', 10000, b'0', b'1', '', 8),
(64, 'Blackpink Sweater - BPS', '99d1dabbf4712a8c14b23e9a65625e51.jpeg', 195000, 0, 'Mặc áo này đi coi Nhóm T-ARA nhảy bao ngầu luôn nha', 1000, b'0', b'1', '', 8),
(65, 'Hút Đì Loang Đen - HTB Đen', '0223df4efadfa3ad6cde90e8efce5681.jpeg', 270000, 0, 'Áo Tuy là màu đen nhưng rất trắng nha các bạn', 1000, b'0', b'1', '', 9),
(66, 'Hút Đì Loang Hồng - HTB Hồng', '89cc64c1ca3c7e497b2db039888f38ff.jpeg', 270000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'0', b'1', '', 9),
(67, 'Hút Đì Loang Xanh - HTB Xanh', '49d4f366a6e3792996f5ca3cc06e5080.jpeg', 270000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'0', b'1', '', 9),
(68, 'Hút Đì Loang Xám - HTL', '1d1038b8a6ef548bb1ee2a1780603daa.jpeg', 234000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', '', 9),
(69, 'Hút Đì Loang Cam - HTS', '9cae9878912f74cd996e1b0d34cbdc12.jpeg', 234000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', '', 9),
(70, 'Hút Đi Degrey x Cối Xay Gió', '5249efc1112663d9d463b753cb145c93.jpeg', 144000, 14000, 'Áo Này mặc siêu bay luôn nha', 1000, b'1', b'1', 'hut-di-degrey-x-coi-xay-gio', 9),
(71, 'Degrey Pant Đen - DP Đen', 'b99a55cebbf639bc3d1327b76f0fc01e.jpeg', 288000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', '', 13),
(72, 'Degrey Pant Kem - DP Kem', 'aad3886855da437fe2b6986288096a9e.jpeg', 280000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', '', 6),
(73, 'Degrey Pant Trắng - DP Trắng', 'caa0fde4d06f2b4c949ac41f62d5526b.jpeg', 280000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 10000, b'1', b'1', '', 6),
(74, 'Quần Dài Chữ Degrey - QDCD', '493dc5fa11054d0eeeb00639345ecd72.jpeg', 195000, 0, 'Quần bao ngầu luôn nha', 1000, b'1', b'1', '', 13),
(75, 'Quần Dài Classic Chữ Degrey Xanh - QDCX', '2081b53def4a7d02a8f2c568be45e1ef.jpeg', 96000, 0, 'Quần đẹp Quá', 10000, b'1', b'1', '', 13),
(76, 'Quàn Dài Degrey Wax - QDW', '9f9e344eec211f86f08229c275d03303.jpeg', 350000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', '', 13),
(77, 'Degrey Quần Jean Ngắn Đen - QJN Đen', 'e2d8ea197dd7ecedd6fc83b87bd1110e.jpeg', 203000, 0, 'Quần này vào mùa đông đi chơi bao ấm cúng nhaa', 1000, b'1', b'1', 'degrey-quan-jean-ngan-den---qjn-den', 14),
(78, 'Degrey Quần Jean Ngắn Xám - QJN Xám', '1bc4c3e03126d227b8c2a085ef6f4a53.jpeg', 203000, 290000, 'Lên youtube coi chứ ko biết nói gì', 1111, b'1', b'1', 'degrey-quan-jean-ngan-xam---qjn-xam', 14),
(79, 'Degrey Quần Jean Ngắn Xanh - QJN Xanh', '14ecce3cd081435a45ac39f5fb4ea168.jpeg', 203000, 290000, 'Như mấy cái khác :v', 10000, b'1', b'1', 'degrey-quan-jean-ngan-xanh---qjn-xanh', 14),
(80, 'Quần Degrey Ngắn Nhiều Túi - QNNT', '3a7c16042603aa27ee4104eca01b5dc7.jpeg', 210000, 300000, 'Quần dễ dàng vận động nhất là ở trên giường', 1000, b'1', b'1', 'quan-degrey-ngan-nhieu-tui---qnnt', 14),
(81, 'Quần Degrey Ngắn Màu Navy - QN Navy', '96b73864bb60cc73429c7815bccb4845.jpeg', 210000, 300000, 'Như mấy cái kia :v\r\n', 1000, b'1', b'1', 'quan-degrey-ngan-mau-navy---qn-navy', 14),
(82, 'Quần Degrey Ngắn Wax-QNW', '89d4932f837292df32f867adbc352905.jpeg', 210000, 300000, 'Như mấy cái kia luôn hihi :V\r\n', 0, b'1', b'1', 'quan-degrey-ngan-wax-qnw', 14),
(83, 'Sơ Mi Siết Tay Anh Xanh-STA Xanh', '3059efc1bf5eac52f29db0a21806051b.jpeg', 330000, 165000, 'Áo này mặc đi biển là ko sợ cá mập luôn nha ', 10000, b'1', b'1', 'so-mi-siet-tay-anh-xanh-sta-xanh', 11),
(84, 'Ice Cream Shirt-ICS Blue', '49ef9d60d6370ccf80e9f7437404470f.jpeg', 290000, 0, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 1000, b'1', b'1', 'ice-cream-shirt-ics-blue', 11),
(85, 'Ice Cream Shirt-ICS Pink', '7b48e7bb5d33fde000a7ed491aaf3a8a.jpeg', 290000, 2000, 'Size S áp dụng cho các bạn dưới 60kg\r\nSize M áp dụng cho các bạn từ 60-75kg\r\nSize L áp dụng cho các bạn trên 75kg', 5, b'1', b'1', 'ice-cream-shirt-ics-pink', 11),
(86, 'Sơ Mi UFO Degrey-SMU', '866d37f74728e0779c384c4367ce0113.jpeg', 149000, 1000, 'Mặc áo này auto crush đỗ nha', 10000, b'0', b'1', 'so-mi-ufo-degrey-smu', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderImage`, `sliderName`, `sliderDesc`) VALUES
(1, '32314a5850ced93511a5285c388b0173.jpg', 'Cá sấu cam tím ', 'cá sấu slider cam tím'),
(3, 'd1eae78dfa3aece30a9311739bdf19e1.jpg', 'cá sấu cam', 'cá sấu cam slider');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_store`
--

CREATE TABLE `tbl_store` (
  `storeId` int(11) NOT NULL,
  `storeName` text NOT NULL,
  `storeAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_store`
--

INSERT INTO `tbl_store` (`storeId`, `storeName`, `storeAddress`) VALUES
(2, 'HCM - Q.Phú Nhuận: 43 Huỳnh Văn Bánh', 'HCM - Q.Phú Nhuận: 43 Huỳnh Văn Bánh'),
(3, 'HCM - Q.Tân Phú: 905 Lũy Bán Bích', 'HCM - Q.Tân Phú: 905 Lũy Bán Bích'),
(4, 'HCM - Q.1: 26 Lý Tự Trọng (TNP)', 'HCM - Q.1: 26 Lý Tự Trọng (TNP)'),
(5, '123321', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.776732369764!2d106.67183871327994!3d10.828390892286269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175293f0f9c427f%3A0x75a1668e9fedb190!2sQuang%20Trung!5e0!3m2!1sen!2s!4v1629435343962!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPhone` varchar(11) NOT NULL,
  `userGender` bit(1) NOT NULL,
  `userBirthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `userName`, `userEmail`, `userPassword`, `userAddress`, `userPhone`, `userGender`, `userBirthday`) VALUES
(1, 'Duy', 'duy@gmail.com', 'c65a733b0c14cf6e385e1d7c2b5e5910', 'Hồ Chí Minh, Hóc Môn', '02147483647', b'0', '2003-10-28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`storeId`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_store`
--
ALTER TABLE `tbl_store`
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
