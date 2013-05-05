/*
MySQL Data Transfer
Source Host: localhost
Source Database: choonline
Target Host: localhost
Target Database: choonline
Date: 5/5/2013 9:29:37 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `UserName` varchar(255) DEFAULT NULL,
  `PassWord` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buyer
-- ----------------------------
DROP TABLE IF EXISTS `buyer`;
CREATE TABLE `buyer` (
  `BuyerID` varchar(11) NOT NULL DEFAULT '0',
  `Ngay_mua` date DEFAULT NULL,
  `Don_hangID` varchar(11) DEFAULT NULL,
  `Gio_hangID` varchar(10) DEFAULT NULL,
  `Trang_thai_don_hang` enum('') DEFAULT NULL,
  PRIMARY KEY (`BuyerID`),
  KEY `DonHang` (`Don_hangID`),
  KEY `GioHang` (`Gio_hangID`),
  CONSTRAINT `Buyer_User` FOREIGN KEY (`BuyerID`) REFERENCES `user` (`UserID`),
  CONSTRAINT `DonHang` FOREIGN KEY (`Don_hangID`) REFERENCES `don_hang` (`Don_hang_ID`),
  CONSTRAINT `GioHang` FOREIGN KEY (`Gio_hangID`) REFERENCES `gio_hang` (`Gio_hang_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for danh_muc
-- ----------------------------
DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE `danh_muc` (
  `Danh_mucID` varchar(10) NOT NULL DEFAULT '0',
  `Ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Danh_mucID`),
  CONSTRAINT `DanhMuc` FOREIGN KEY (`Danh_mucID`) REFERENCES `product` (`Danh_muc_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for don_hang
-- ----------------------------
DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang` (
  `Don_hang_ID` varchar(10) NOT NULL DEFAULT '0',
  `Product_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Don_hang_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gio_hang
-- ----------------------------
DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE `gio_hang` (
  `Gio_hang_ID` varchar(10) NOT NULL DEFAULT '0',
  `ProductID` varchar(10) DEFAULT NULL,
  `Don_hangID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Gio_hang_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `ProductID` varchar(10) NOT NULL DEFAULT '0',
  `Ten_san_pham` varchar(255) DEFAULT NULL,
  `Loai_san_pham` varchar(255) DEFAULT NULL,
  `Gia_ban` float unsigned DEFAULT NULL,
  `Hinh_dai_dien` varchar(255) DEFAULT NULL,
  `Xuat_xu` varchar(255) DEFAULT NULL,
  `Mo_ta` varchar(255) DEFAULT NULL,
  `Gallery` varchar(255) DEFAULT NULL,
  `So_luot_xem` int(10) unsigned DEFAULT NULL,
  `So_luong_ton` int(10) unsigned DEFAULT NULL,
  `So_luong_da_ban` int(10) unsigned DEFAULT NULL,
  `Danh_muc_ID` varchar(255) DEFAULT NULL,
  `Tinh_trang_sp` enum('Còn','Hết') DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `Danh_muc_ID` (`Danh_muc_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for seller
-- ----------------------------
DROP TABLE IF EXISTS `seller`;
CREATE TABLE `seller` (
  `SellerID` varchar(10) NOT NULL DEFAULT '0',
  `ProductID` varchar(10) DEFAULT NULL,
  `Don_hangID` varchar(255) DEFAULT NULL,
  `Trang_thai_don_hang` enum('Hủy','Đang Giao','Đang đặt') DEFAULT NULL,
  PRIMARY KEY (`SellerID`),
  CONSTRAINT `seller_user` FOREIGN KEY (`SellerID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserID` varchar(10) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `PassWord` varchar(255) DEFAULT NULL,
  `Trang_thai_ID` enum('Delete','Block') DEFAULT NULL,
  `Ho_ten` varchar(255) DEFAULT NULL,
  `Ngay_sinh` date DEFAULT NULL,
  `Dia_chi` varchar(255) DEFAULT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `So_CMND` int(11) DEFAULT NULL,
  `Loai_tai_khoan` enum('Seller','Admin','Buyer') DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `gio_hang` VALUES ('ádasd', null, null);
INSERT INTO `product` VALUES ('0', 'Máy bay', 'DCTE', '900000', '../images/Revell_Academy_Space.jpeg', 'Việt Nam', 'đồ chơi trẻ em, không gây nguy hiểm!!', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('01', 'topkk', '123456', null, 'Võ Quang Phước', '2012-09-12', 'Quảng Trị', '01655888851', 'phuocvoquang@gmail.com', '198319865', 'Buyer');
