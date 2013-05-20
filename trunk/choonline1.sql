/*
MySQL Data Transfer
Source Host: localhost
Source Database: choonline1
Target Host: localhost
Target Database: choonline1
Date: 5/20/2013 5:36:54 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for binh_luan
-- ----------------------------
DROP TABLE IF EXISTS `binh_luan`;
CREATE TABLE `binh_luan` (
  `Ma_tai_khoan` int(10) unsigned NOT NULL DEFAULT '0',
  `Ma_san_pham` int(10) unsigned DEFAULT NULL,
  `Ma_binh_luan` int(10) unsigned DEFAULT NULL,
  `Binh_luan` text,
  PRIMARY KEY (`Ma_tai_khoan`),
  KEY `Ma_tai_khoan` (`Ma_binh_luan`),
  KEY `binhluan_sanpham` (`Ma_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for chi_tiet_don_hang
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE `chi_tiet_don_hang` (
  `Ma_trang_thai` int(10) unsigned NOT NULL DEFAULT '0',
  `Ma_don_hang` int(10) unsigned DEFAULT NULL,
  `Ma_san_pham_can_ban` int(10) unsigned DEFAULT NULL,
  `So_luong` int(10) unsigned DEFAULT NULL,
  `Gia` float unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_trang_thai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for danh_muc
-- ----------------------------
DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE `danh_muc` (
  `Ma_danh_muc` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_danh_muc` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Bi_xoa` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_danh_muc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for don_hang
-- ----------------------------
DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang` (
  `Ma_don_hang` int(11) NOT NULL DEFAULT '0',
  `Ma_tai_khoan_mua` int(10) unsigned DEFAULT NULL,
  `Thoi_gian_dat` date DEFAULT NULL,
  `Tong_thanh_toan` float unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_don_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gio_hang
-- ----------------------------
DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(10) unsigned NOT NULL DEFAULT '0',
  `ma_san_pham` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ma_gio_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for loai_tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `loai_tai_khoan`;
CREATE TABLE `loai_tai_khoan` (
  `Ma_loai_tai_khoan` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_loai_tai_khoan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ma_loai_tai_khoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for san_pham
-- ----------------------------
DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE `san_pham` (
  `Ma_san_pham` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_san_pham` varchar(255) DEFAULT NULL,
  `Gia_ban` int(10) unsigned DEFAULT NULL,
  `Hinh_dai_dien` varchar(255) DEFAULT NULL,
  `Dac_ta` longtext,
  `Ma_tinh_trang` int(10) unsigned DEFAULT NULL,
  `Ma_danh_muc` int(10) unsigned DEFAULT NULL,
  `So_luong_ton` int(10) unsigned DEFAULT NULL,
  `So_luong_ban` int(10) unsigned DEFAULT NULL,
  `So_luot_xem` int(10) unsigned DEFAULT NULL,
  `Ma_nguoi_ban` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE `tai_khoan` (
  `Ma_tai_khoan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ten_dang_nhap` varchar(255) DEFAULT NULL,
  `Mat_khau` varchar(255) DEFAULT NULL,
  `Ma_loai_tai_khoan` int(10) unsigned DEFAULT NULL,
  `Ma_tinh_trang` int(10) unsigned DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `So_dien_thoai` text,
  `Dia_chi` text,
  `Ho_ten` text,
  PRIMARY KEY (`Ma_tai_khoan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tham_so
-- ----------------------------
DROP TABLE IF EXISTS `tham_so`;
CREATE TABLE `tham_so` (
  `Ma_tham_so` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_tham_so` varchar(255) DEFAULT NULL,
  `Gia_tri` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_tham_so`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for thu_vien_anh
-- ----------------------------
DROP TABLE IF EXISTS `thu_vien_anh`;
CREATE TABLE `thu_vien_anh` (
  `Ma_san_pham` int(10) unsigned NOT NULL DEFAULT '0',
  `Ma_thu_vien` int(11) DEFAULT NULL,
  `Duong_dan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ma_san_pham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tinh_trang_san_pham
-- ----------------------------
DROP TABLE IF EXISTS `tinh_trang_san_pham`;
CREATE TABLE `tinh_trang_san_pham` (
  `Ma_tinh_trang` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_tinh_trang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ma_tinh_trang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for trang_thai_don_hang
-- ----------------------------
DROP TABLE IF EXISTS `trang_thai_don_hang`;
CREATE TABLE `trang_thai_don_hang` (
  `Ma_trang_thai_don_hang` int(10) unsigned NOT NULL DEFAULT '0',
  `Ten_trang_thai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ma_trang_thai_don_hang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for trang_thai_tai_khoan
-- ----------------------------
DROP TABLE IF EXISTS `trang_thai_tai_khoan`;
CREATE TABLE `trang_thai_tai_khoan` (
  `Ma_tinh_trang` int(10) unsigned NOT NULL DEFAULT '0',
  `Tinh_trang` varchar(255) DEFAULT NULL,
  `Bi_xoa` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Ma_tinh_trang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `binh_luan` VALUES ('1', '1', null, 'Hàng Việt Nam chất lượng cao.');
INSERT INTO `danh_muc` VALUES ('1', 'Điện thoại', null, null);
INSERT INTO `danh_muc` VALUES ('2', 'Máy tính', null, null);
INSERT INTO `danh_muc` VALUES ('3', 'Thời trang', null, null);
INSERT INTO `danh_muc` VALUES ('4', 'Mĩ phẩm', null, null);
INSERT INTO `danh_muc` VALUES ('5', 'Ba lô', null, null);
INSERT INTO `danh_muc` VALUES ('6', 'Mắt Kính', null, null);
INSERT INTO `danh_muc` VALUES ('7', 'Đồ chơi', null, null);
INSERT INTO `danh_muc` VALUES ('8', 'Điện Gia dụng', null, null);
INSERT INTO `danh_muc` VALUES ('9', 'Máy ảnh', null, null);
INSERT INTO `danh_muc` VALUES ('10', 'X-teen', null, null);
INSERT INTO `danh_muc` VALUES ('11', 'Linh kiện ', null, null);
INSERT INTO `danh_muc` VALUES ('12', null, null, null);
INSERT INTO `loai_tai_khoan` VALUES ('1', 'Người bán');
INSERT INTO `loai_tai_khoan` VALUES ('2', 'Người mua');
INSERT INTO `loai_tai_khoan` VALUES ('3', 'admin');
INSERT INTO `san_pham` VALUES ('1', 'Bobi Craft 103BRW-XL – Gia đình nhà gấu / 30cm', '579000', null, 'Bộ thú bông gia đình nhà gấu Bobi Craft 103BRW-XL được làm hoàn toàn bằng tay nên rất tinh xảo và mang giá trị nghệ thuật cao. Bên cạnh đó chất liệu len nhập khẩu cao cấp cho sản phẩm màu sắc đẹp mắt và đặc biệt an toàn cho bé khi sử dụng. Với bộ thú bông gia đình nhà gấu, bé sẽ thỏa thích chơi trò chơi gia đình để phát triển khả năng ngôn ngữ trong quá trình giao tiếp với những người bạn nhỏ này.', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('2', 'Dragon Itoys - Chuột hamster Chatimals biết nói  Hồng', '399000', null, 'Chú chuột hamster Chatimals Dragon Itoys xinh xắn biết nói sẽ sớm trở thành người bạn thân thiết với bé những khi bố mẹ bận rộn và phải để bé chơi 1 mình. Chỉ cần nhấn vào bàn tay trái của chú chuột và nói chuyện với chú ta, chú sẽ lặp lại bất cứ điều gì bạn nói, thậm chí là miệng chú ta còn cử động thật sự. Đặc biệt, Chú chuột hamster Chatimals Dragon Itoys còn có thể chọn cách đáp lại bằng giọng cao hay thấp để gây nên sự bất ngờ thú vị và sẽ khiến bất cứ ai nghe thấy đều phải bật cười. Chú chuột có hình dáng tròn trịa của một con thú nhồi bông và khoác lên mình lớp lông mềm mại sẽ càng giúp các bé yêu chú thêm.\r\n\r\nChú chuột hamster Chatimals Dragon Itoys xinh xắn biết nói sẽ sớm trở thành người bạn thân thiết với bé những khi bố m', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('3', 'Disney – Thú nhồi bông Mickey / 14cm', '129000', null, 'hú nhồi bông là một trong những người bạn thơ ấu thân thiết của mọi trẻ nhỏ. Bố mẹ hãy trang bị cho bé yêu nhà mình một chú chuột Mickey Disney xinh xắn có thiết kế kiểu dáng đứng cho bé dễ dàng ôm khi chơi hay khi ngủ. Sản phẩm được làm từ chất liệu bông mềm mại sẽ cho bé yêu cảm giác được ôm ấp, vuốt ve, dễ chịu, đỡ quấy khóc hơn. Ngoài ra, chú chuột Mickey Disney còn có thể trở thành một món đồ nội thất ngộ nghĩnh cho gia đình bạn. ', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('4', 'Kiddy Clay SKB12 – Đất nặn và bộ phụ kiện hình thú', '109000', null, 'Được tự tay tạo ra những con vật, cây cối bằng đất sét luôn khiến trẻ thích thú. Bé được thỏa sức sáng tạo hay mô phỏng những con vật, đồ vật xung quanh bằng chính đôi bàn tay của mình. Việc này không những giúp bé rèn luyện sự khéo léo mà còn góp phần phát triển tư duy nghệ thuật trong trẻ. Bộ đất nặn Kiddy Clay 6 màu cùng bộ phụ kiện hình thú cho bé tạo ra một bộ sưu tập các con thú sống động. Bé sẽ tạo ra các loại thú khác nhau chỉ bằng cách sử dụng bộ đất nặn Kiddy Clay và sự sáng tạo.', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('5', '4M – Tranh khảm cửa sổ mini nàng tiên cá', '139000', null, 'Tranh khảm mini hình nàng tiên cá 4M rất thích hợp cho những em bé gái trang trí cửa sổ hay góc học tập trong phòng. Với những miếng khảm đủ màu sẽ dính trên hầu hết các bề mặt sáng bóng như mặt kính, bé sẽ ghép khớp lại với nhau trên bản phác thảo có sẵn để tạo thành hình nàng tiên cá xinh xắn. Tranh khảm 4M này không chỉ làm cho cửa kính phòng bé thêm sinh động mà còn giúp bé rèn luyện sự khéo léo, tính cẩn thận.', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('6', 'Xe tải thả vật nuôi Benho [YT6027]', '235000', null, 'Thông tin chi tiết sản phẩm\r\n\r\nXe thả vật nuôi [YT6027]\r\nXe thả hình, giúp trẻ nhận biết về các con vật thân quen với những đặc trưng riêng biệt của chúng. \r\nĐồng thời giúp trẻ nhận biết về sự tương thích, bé phải tìm cửa để nhét các con vật vào đúng cửa cho chúng. \r\nVới sản phẩm này, bé sẽ kéo xe đi khắp nơi để khoe mọi người. \r\nSản phẩm phù hợp cho bé từ 2-4 tuổi. \r\nKích thước 27*13.5*13.5cm.', '1', '7', null, null, null, '1');
INSERT INTO `san_pham` VALUES ('7', 'Điện thoại di động Nokia Lumia 520', '3840000', 'images/dt/Nokia-Lumia-520-l.jpg', 'Màn hình: WVGA, 4.0 inches\r\nHĐH: Windows Phone 8\r\nCPU: Dual-core 1 GHz\r\nCamera: 5.0 MP\r\nDung lượng pin: 1430 mAh\r\nBảo hành chính hãng 12 tháng (xem điểm bảo hành)\r\nBộ sản phẩm gồm có: Thân máy, pin, sạc, cáp, tai nghe, sách hướng dẫn (xem ảnh mở hộp)', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('8', 'Điện thoại di động Samsung Galaxy S3 I9300', '10900000', 'images/dt/Samsung-Galaxy-S3-I9300-l.jpg', 'Màn hình HD, 4.8 inches\r\nHĐH: Android 4.0.4 (ICS)\r\nCPU: Quad-core 1.4 GHz\r\nCamera: 8.0 MP\r\nDung lượng pin: 2100 mAh\r\nBảo hành chính hãng 12 tháng (xem điểm bảo hành)\r\nBộ sản phẩm gồm có: Thân máy, pin, sạc, tai nghe, cáp, sách hướng dẫn. (xem ảnh mở hộp)', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('9', 'Điện thoại di động Nokia C3-01.5', '6390000', 'images/dt/HTC-Desire-U-l.jpg', 'Điện thoại mạ vàng 18 cara\r\nMàn hình QVGA, 2.4 inches\r\nCamera: 5.0 MP\r\nHỗ trợ thẻ nhớ đến 32GB\r\nDung lượng pin 1050 mAh\r\nBảo hành chính hãng 12 tháng', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('10', 'Điện thoại di động LG Optimus L5 II Dual E455', '4290000', 'images/dt/LG-Optimus-L5-II-Dual-l.jpg', 'Màn hình: WVGA, 4.0 inches\r\nHĐH: Android 4.1 (Jelly Bean)\r\nCPU: Solo-core 1 GHz\r\nCamera: 5.0 MP\r\nDung lượng pin: 1700 mAh', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('11', 'Điện thoại di động HTC Desire U', '5290000', 'images/dt/HTC-Desire-U-l.jpg', 'Màn hình: WVGA, 4.0 inches\r\nHĐH: Android 4.0.4 (ICS)\r\nCPU: Solo-core 1 GHz\r\nCamera: 5.0 MP\r\nDung lượng pin: 1650 mAh\r\nBảo hành chính hãng 12 tháng (xe', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('12', 'Điện thoại di động Alcatel One Touch Idol 6030D', '5490000', 'images/dt/Alcatel-One-Touch-Idol-6030D-l.jpg', 'Màn hình: qHD, 4.66 inches\r\nHĐH: Android 4.1.2 (Jelly Bean)\r\nCPU: Dual-core 1 GHz\r\nCamera: 8.0 MP\r\nDung lượng pin: 1800 mAh\r\nBảo hành chính hãng 12 tháng ', '1', '1', null, null, null, null);
INSERT INTO `san_pham` VALUES ('13', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('14', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('15', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('16', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('17', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('18', null, null, null, null, null, '2', null, null, null, null);
INSERT INTO `san_pham` VALUES ('19', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('20', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('21', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('22', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('23', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('24', null, null, null, null, null, '3', null, null, null, null);
INSERT INTO `san_pham` VALUES ('25', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('26', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('27', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('28', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('29', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('30', null, null, null, null, null, '4', null, null, null, null);
INSERT INTO `san_pham` VALUES ('31', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('32', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('33', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('34', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('35', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('36', null, null, null, null, null, '5', null, null, null, null);
INSERT INTO `san_pham` VALUES ('37', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('38', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('39', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('40', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('41', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('42', null, null, null, null, null, '6', null, null, null, null);
INSERT INTO `san_pham` VALUES ('43', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('44', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('45', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('46', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('47', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('48', null, null, null, null, null, '8', null, null, null, null);
INSERT INTO `san_pham` VALUES ('49', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('50', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('51', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('52', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('53', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('54', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('55', null, null, null, null, null, '9', null, null, null, null);
INSERT INTO `san_pham` VALUES ('56', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('57', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('58', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('59', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('60', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('61', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('62', null, null, null, null, null, '10', null, null, null, null);
INSERT INTO `san_pham` VALUES ('63', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('64', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('65', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('66', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('67', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('68', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('69', null, null, null, null, null, '11', null, null, null, null);
INSERT INTO `san_pham` VALUES ('70', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `san_pham` VALUES ('71', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `san_pham` VALUES ('72', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `san_pham` VALUES ('73', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `san_pham` VALUES ('74', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `san_pham` VALUES ('75', null, null, null, null, null, '12', null, null, null, null);
INSERT INTO `tai_khoan` VALUES ('1', 'seller01', '999999999', '1', '1', 'phuocvoquang@gmail.com', '12345678', 'Quảng Trị', null);
INSERT INTO `tai_khoan` VALUES ('2', 'seller02', '123456', '2', '1', 'tester1@gmail.com', '053.3828137', 'tp. Hồ Chid Minh', null);
INSERT INTO `tinh_trang_san_pham` VALUES ('0', 'còn hàng');
INSERT INTO `tinh_trang_san_pham` VALUES ('1', 'hết hàng');
INSERT INTO `trang_thai_tai_khoan` VALUES ('0', 'Đã kích hoạt', null);
INSERT INTO `trang_thai_tai_khoan` VALUES ('1', 'Khóa', null);
INSERT INTO `trang_thai_tai_khoan` VALUES ('2', 'Chưa kích hoạt', null);
