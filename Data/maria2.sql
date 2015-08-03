# Host: localhost  (Version: 5.5.27)
# Date: 2014-10-08 23:17:00
# Generator: MySQL-Front 5.3  (Build 4.169)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username` (`admin_username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'admin','admin');

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) DEFAULT NULL,
  `article_content` text,
  `article_date` datetime DEFAULT NULL,
  `article_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_title` (`article_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "article"
#


#
# Structure for table "member"
#

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_username` varchar(255) NOT NULL DEFAULT '',
  `member_password` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_address` varchar(255) DEFAULT NULL,
  `member_no_telp` varchar(255) DEFAULT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_birthday` date DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_username` (`member_username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "member"
#

INSERT INTO `member` VALUES (1,'Administrator','asldbjhabckahjveuyvkajhsxacsdc','Administrator','Administrator','085363917117','Administrator','0000-00-00');

#
# Structure for table "kuesioner"
#

DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE `kuesioner` (
  `kuisoner_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `soal1` tinyint(3) DEFAULT NULL,
  `soal2` tinyint(3) DEFAULT NULL,
  `soal3` tinyint(3) DEFAULT NULL,
  `soal4` tinyint(3) DEFAULT NULL,
  `soal5` tinyint(3) DEFAULT NULL,
  `soal6` tinyint(3) DEFAULT NULL,
  `soal7` tinyint(3) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`kuisoner_id`),
  KEY `fkks_member` (`member_id`),
  CONSTRAINT `fkks_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "kuesioner"
#


#
# Structure for table "faktur"
#

DROP TABLE IF EXISTS `faktur`;
CREATE TABLE `faktur` (
  `faktur_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `faktur_number` varchar(100) DEFAULT NULL,
  `faktur_fotobukti` varchar(255) DEFAULT NULL,
  `faktur_ket` varchar(20) DEFAULT NULL COMMENT 'orderer,order_ok,order_confirm,order_cancel',
  `faktur_date` datetime DEFAULT NULL,
  PRIMARY KEY (`faktur_id`),
  UNIQUE KEY `faktur_number` (`faktur_number`),
  KEY `fkfaktur_member` (`member_id`),
  CONSTRAINT `fkfaktur_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "faktur"
#


#
# Structure for table "comment"
#

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `coment_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `comment_content` text,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`coment_id`),
  KEY `fkcm_article` (`article_id`),
  KEY `fkcm_member` (`member_id`),
  CONSTRAINT `fkcm_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkcm_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "comment"
#


#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_stock` int(11) NOT NULL DEFAULT '0',
  `product_price` int(11) NOT NULL DEFAULT '0',
  `product_detail` text,
  `product_image` varchar(255) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `product_date` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "product"
#


#
# Structure for table "rating"
#

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `fkrt_product` (`product_id`),
  CONSTRAINT `fkrt_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "rating"
#


#
# Structure for table "sms"
#

DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_title` varchar(50) DEFAULT NULL,
  `sms_content` text,
  `sms_date` date DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "sms"
#

INSERT INTO `sms` VALUES (1,'sms_ultah','cekrecord ini untuk cek ','2014-10-08');

#
# Structure for table "ukuran"
#

DROP TABLE IF EXISTS `ukuran`;
CREATE TABLE `ukuran` (
  `ukuran_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ukuran_id`),
  KEY `fk_product` (`product_id`),
  CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "ukuran"
#


#
# Structure for table "orders"
#

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran_id` int(11) DEFAULT NULL,
  `faktur_id` int(11) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fkorder_faktur` (`faktur_id`),
  KEY `fkorder_product` (`ukuran_id`),
  CONSTRAINT `fk_uk` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran` (`ukuran_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkorder_faktur` FOREIGN KEY (`faktur_id`) REFERENCES `faktur` (`faktur_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "orders"
#

