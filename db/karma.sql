-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2022 lúc 01:58 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `karma`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` varchar(255) COLLATE utf8_bin NOT NULL,
  `ProductID` varchar(255) COLLATE utf8_bin NOT NULL,
  `Price` varchar(255) COLLATE utf8_bin NOT NULL,
  `Amount` varchar(255) COLLATE utf8_bin NOT NULL,
  `Size` varchar(255) COLLATE utf8_bin NOT NULL,
  `Total` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Amount`, `Size`, `Total`) VALUES
('OD_01', 'NK0003', '190.00', '1', '37', '190'),
('OD_01', 'NK0006', '130.00', '1', '37', '130'),
('OD_02', 'NK0007', '130.00', '1', '37', '130'),
('OD_03', 'NK0006', '130.00', '1', '37', '130'),
('OD_04', 'NK0006', '130.00', '1', '37', '130'),
('OD_05', 'PM0002', '110.00', '1', '37', '110'),
('OD_06', 'PM0002', '110.00', '1', '37', '110');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(50) COLLATE utf8_bin NOT NULL,
  `UserID` varchar(255) COLLATE utf8_bin NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `LastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `City` varchar(255) COLLATE utf8_bin NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8_bin NOT NULL,
  `Address` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) COLLATE utf8_bin NOT NULL,
  `Phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `Notes` text COLLATE utf8_bin NOT NULL,
  `Total` varchar(255) COLLATE utf8_bin NOT NULL,
  `Status` varchar(10) COLLATE utf8_bin NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `FirstName`, `LastName`, `City`, `CompanyName`, `Address`, `Email`, `Phone`, `Notes`, `Total`, `Status`, `Created`) VALUES
('OD_01', 'USER02', 'huy', 'pham', 'Da Nang', 'dasdasdasd', '273 Huy nh', 'huy@yahoo.com', '0903504571', 'dsfsdfasdfdsafsda', '320', '1', '2019-05-14'),
('OD_02', 'USER02', 'huy', 'pham', 'Da Nang', 'jiyjhghjgf', 'tujyjtfghj', 'huy456@yahoo.com', '0903504571', '', '130', '1', '2019-05-14'),
('OD_03', 'USER02', 'huy', 'pham', 'Da Nang', 'dsfsdfsdf', 'sdfsdfsdgsdfgsdfg', 'huy456@yahoo.com', '0903504571', '', '130', '1', '2019-05-14'),
('OD_04', 'USER01', 'Huy', 'Pham', 'Ho Chi Minh', 'huy', '273 Huy', 'huyphamnguyenminh99@yahoo.com', '0767328271', '', '130', '1', '2019-05-18'),
('OD_05', 'USER03', 'hieu', 'hieu', 'Ho Chi Minh', 'sdwd', 'ưdadw', 'hieu01668506740@gmail.com', '0338898790', '', '110', '1', '2022-04-23'),
('OD_06', 'USER03', 'hieu', 'hieu', 'Da Nang', '', 'ấdsas', 'hieu01668506740@gmail.com', '0338898790', '', '110', '1', '2022-04-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` varchar(6) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(200) COLLATE utf8_bin NOT NULL,
  `BRAND` varchar(50) COLLATE utf8_bin NOT NULL,
  `COLOR` varchar(50) COLLATE utf8_bin NOT NULL,
  `PRICE` varchar(50) COLLATE utf8_bin NOT NULL,
  `SALE` int(1) NOT NULL,
  `OLDPRICE` varchar(50) COLLATE utf8_bin NOT NULL,
  `INF` varchar(7000) COLLATE utf8_bin NOT NULL,
  `IMAGE` varchar(100) COLLATE utf8_bin NOT NULL,
  `STATUS` int(1) NOT NULL,
  `CREATED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `NAME`, `BRAND`, `COLOR`, `PRICE`, `SALE`, `OLDPRICE`, `INF`, `IMAGE`, `STATUS`, `CREATED`) VALUES
('AD0001', 'Hoodie Adidas brown ', 'Adidas', 'Brown', '97.00', 1, '110.00', 'Designed for athletes who run to be the best at their sport, these shoes support multidirectional movements with flexible cushioning and a wide, stable platform in the forefoot and heel. They have a seamless, sock-like mesh upper with targeted areas of support and stretch for an adaptive fit. \r\n\r\nRunner type\r\nNeutral shoes for the versatile runner\r\n\r\nZoned support\r\nZoned Forgedmesh upper designed to support linear and lateral movements\r\n\r\nNatural movement\r\nFitcounter molded heel counter provides a natural fit that allows optimal movement of the Achilles', 'img/AD0001.jpg', 1, '2019-04-17'),
('CV0001', 'Adidas White Men\'s', 'Adidas', 'White', '97.00', 0, '0', 'Chuck 70 Psy-Kicks High', 'img/AD0002.jpg', 1, '2019-05-18'),
('CV0002', 'Adidas Skullcap', 'Adidas', 'Black', '95.00', 0, '0', 'Chuck 70 Archive Prints Hi', 'img/AD0003.jpg', 1, '2019-05-18'),
('CV0003', 'Adidas T-Shirt brown', 'Adidas', 'Brown', '220.00', 0, '0', 'Chuck Taylor All Star Lightweight Nylon', 'img/AD0004.jpg', 1, '2019-05-18'),
('CV0004', 'Converse T-Shirt Black Logo/white', 'Converse', 'Black', '80.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0004.jpg', 1, '2019-05-18'),
('CV0006', 'Converse AT191202', 'Converse', 'Blue', '80.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0006.jpg', 1, '2019-05-18'),
('CV0007', 'Converse All Star', 'Converse', 'White', '80.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0003.jpg', 1, '2019-05-18'),
('CV0008', 'Converse T-Shirt Red', 'Converse', 'Red', '85.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0008.jpg', 1, '2019-05-18'),
('CV0009', 'Converse T-Shirt Blue', 'Converse', 'Blue', '85.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0009.jpg', 1, '2019-05-18'),
('Cv0005', 'Converse C5', 'Converse', 'Black', '80.00', 0, '0', 'Chuck Taylor Classic', 'img/CV0005.jpg', 1, '2019-05-18'),
('NK0001', 'Nike Sportswear Swoosh DC5095-010', 'Nike', 'Black', '180.00', 0, '0', 'Twenty years ago, the Air Max 97 was the first Nike running shoe with full-length Max Air cushioning. In \'98, Tuned Air made its debut with a signature TPU cage-like upper. It\'s only natural for the two icons to collide today in the Air Max 97 Plus. The smooth and sleek full length Max Air unit balances out the vertical undulating lines of the Plus. Both design and innovation in the late \'90s were big, boastful and gutsy, and this shoe is a testament to how sneakers greatly drove those approaches.', 'img/N0001.jpg', 1, '2019-04-17'),
('NK0002', 'NIKE UNISEX BLACK', 'Nike', 'Black', '140.00', 0, '0', 'The legend lives on in the Nike Air Force 1 Low Retro QS Men\'s Shoe, a modern take on the icon that blends classic style and fresh, crisp details. This special edition plays up the AF1\'s versatility with new colors and materials.', 'img/N0002.jpg', 1, '2019-04-12'),
('NK0003', 'NIKE AIR MORE UPTEMO \'96 (BLACK)', 'Nike', 'Black', '190.00', 0, '0', 'Spotlighting the three-letter word synonymous with Nike technology, the Air More Uptempo was worn by the quickest players in 90\'s basketball and turned heads with its fashion-forward aesthetic. Our newest colorway radiates cool in three separate color blocks of black, grey and white.', 'img/N0003.jpg', 1, '2019-04-15'),
('NK0004', 'NIKE Tranning', 'Nike', 'Blue', '80.00', 1, '100.00', 'New with box: A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as the original box or bag) and/or with the original tags attached', 'img/N0004.jpg', 1, '2019-04-15'),
('NK0005', 'NIKE ATHLECTIC WHITE', 'Nike', 'White', '125.00', 1, '147.00', 'New with box: A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as the original box or bag) and/or with the original tags attached', 'img/N0005.jpg', 1, '2019-04-15'),
('NK0006', 'NIKE SWOOK', 'Nike', 'Black', '130.00', 1, '147.00', 'New with box: A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as the original box or bag) and/or with the original tags attached', 'img/N0006.jpg', 1, '2019-04-15'),
('NK0007', 'NIKE NSW HAND DRAWN AOP', 'Nike', 'Pink', '130.00', 1, '147.00', 'New with box: A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as the original box or bag) and/or with the original tags attached', 'img/N0007.jpg', 1, '2019-04-15'),
('NK0008', 'Nike Just Do It Red/Black Logo ', 'Nike', 'Red', '130.00', 1, '150.00', 'New with box: A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as the original box or bag) and/or with the original tags attached', 'img/N0008.jpg', 1, '2019-04-15'),
('PD0001', 'Palladium Box Logo Origins 172597-100', 'Paladium', 'White', '85.00', 1, '100.00', 'Behind the casual, slip-on construction of these Pampa Hi boots is one of our most cutting-edge designs. The memory foam sock-liner and 3D padded mesh...', 'img/PD0001.jpg', 1, '2019-05-18'),
('PD0002', 'PALLADENIM White Walking/Logo', 'Paladium', 'White', '105.00', 0, '0', 'The classic baggy denim look introduced workwear to the streets, and now these Pampa Hi boots are bringing it to your feet. The laser-engraved canvas streaks give the feel of a worn-in pair of jeans, with a stud and fastener to complete the transformation.', 'img/PD0002.jpg', 1, '2019-05-18'),
('PD0003', 'Palladium Box Logo Origins 172597-008', 'Paladium', 'Black', '105.00', 0, '0', 'The classic baggy denim look introduced workwear to the streets, and now these Pampa Hi boots are bringing it to your feet. The laser-engraved canvas streaks give the feel of a worn-in pair of jeans, with a stud and fastener to complete the transformation.', 'img/PD0003.jpg', 1, '2019-05-18'),
('PD0004', 'PAMLLADIUM T-SHIRT Green', 'Paladium', 'Green', '80.00', 1, '92.00', 'These soft moleskin Pampa Hi boots are printed with a strong statement in military-chic font. The red Palladium tongue panel pops off the sturdy khaki with style.', 'img/PD0004.jpg', 1, '2019-05-18'),
('PD0005', 'PALLADIUM Black Walking/Logo', 'Paladium', 'Black', '88.00', 1, '90.00', 'Boldly roam the city streets in these stonewashed canvas Pampa boots. Their military look exudes strength and confidence, while the ventilation holes and mesh lining let your feet breathe for extra comfort.', 'img/PD0005.jpg', 1, '2019-05-18'),
('PD0006', 'PALLADIUM Devil Felt LOGO Top', 'Paladium', 'White', '90.00', 1, '120.00', 'With great style comes great responsibility – these stonewashed Pampa boots help preserve the environment with their upper made of 100% organic cotton and lacetips made from bio-degradable plastic. The cork-laminated sock liner adds an extra level of comfort along the way.', 'img/PD0006.jpg', 1, '2019-05-18'),
('PD0007', 'PAMLLADIUM T-SHIRT Brown', 'Paladium', 'Brown', '70.00', 1, '85.00', 'Palladium Boots’ iconic Pampa Hi shoe is ready for summer in washed canvas and muted colors. With a lug sole, cushioned step and authentic military style, the men’s sneaker is a smart choice for exploring the city.', 'img/PD0007.jpg', 1, '2019-05-18'),
('PD0008', 'PALLADENIM T-Shirt Blue', 'Paladium', 'Blue', '90.00', 0, '0', 'The rugged look of distressed denim is hard to beat for jackets and jeans, so why not wear it on your feet too? The leather logo details add authenticity to the laser-engraved canvas of these heritage Pampa Hi boots.', 'img/PD0008.jpg', 1, '2019-05-18'),
('PM0001', 'PUMA T-Shirt White', 'Puma', 'White', '120.00', 0, '0', 'Stable, soft, and a solid silhouette. With LQDCELL Origin you get it all and then some. Experience a smooth mix of PUMA’s CELL-driven stable cushioning and street design in one serious shoe.', 'img/PM0001.jpg', 1, '2019-05-18'),
('PM0002', 'PUMA T-Shirt Power White', 'Puma', 'White', '110.00', 0, '0', 'CELL Venom makes a comeback with elevated features. Bringing back its original form with superior cushioning, the OG silhouette built with patented CELL technology fuses the best of performance and 90\'s street-ready style. CELL Venom Alert features the classic mesh upper with bold accents and signature translucent CELL heel pod.\r\n', 'img/PM0002.jpg', 1, '2019-05-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `Roleid` int(1) NOT NULL,
  `Role` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`Roleid`, `Role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Userid` varchar(255) COLLATE utf8_bin NOT NULL,
  `Username` varchar(255) COLLATE utf8_bin NOT NULL,
  `Password` varchar(255) COLLATE utf8_bin NOT NULL,
  `Firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) COLLATE utf8_bin NOT NULL,
  `Roleid` int(1) NOT NULL,
  `Create` date NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Userid`, `Username`, `Password`, `Firstname`, `Lastname`, `Phone`, `Email`, `Roleid`, `Create`, `Status`) VALUES
('USER01', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Hieu', 'Minh', '0348898790', 'mnjzhmfzmtf@rfnq.htr', 1, '2019-05-14', 1),
('USER02', 'nguyenvan01', '14e1b600b1fd579f47433b88e8d85291', 'Nguyen', 'Van ', '0935651566', 'mnjzhmfzmtf@rfnq.htr', 3, '2022-04-17', 1),
('USER03', 'hieuchauhoa', 'e10adc3949ba59abbe56e057f20f883e', 'hieu', 'hieu', '0338898790', 'mnjzhmfzmtfgg@lrfnq.htr', 3, '2022-04-23', 1),
('USER04', 'hieuchauhoa01', 'e10adc3949ba59abbe56e057f20f883e', 'minh', 'hiếu', '0368506740', 'mnzjijuywfnf@f.htr', 3, '2022-05-08', 1),
('USER05', 'hieuaa', 'e10adc3949ba59abbe56e057f20f883e', 'hieu', 'hieu', '0338898796', 'hieuaa@a.com', 3, '2022-05-08', 1),
('USER06', 'đas', 'e10adc3949ba59abbe56e057f20f883e', 'scsadasd', 'dsadasd', '0338898795', 'asdsdsda@adad.com', 3, '2022-05-08', 1),
('USER07', 'hieucc', 'e10adc3949ba59abbe56e057f20f883e', 'áasad', 'sdasdas', '0339987990', 'xifxi@oo.htr', 3, '2022-05-08', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `OrderID` (`OrderID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Roleid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Userid`),
  ADD KEY `Roleid` (`Roleid`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
