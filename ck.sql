/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : ck

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2013-06-09 10:20:21
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `user_mark` varchar(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', ' 1');
INSERT INTO `admin` VALUES ('2', 'yingzi', '123', '0');

-- ----------------------------
-- Table structure for `out_product`
-- ----------------------------
DROP TABLE IF EXISTS `out_product`;
CREATE TABLE `out_product` (
  `id` int(11) NOT NULL auto_increment,
  `p_name` varchar(15) NOT NULL,
  `code` varchar(20) NOT NULL,
  `out_date` date NOT NULL,
  `in_price` decimal(10,1) NOT NULL,
  `out_price` decimal(10,1) NOT NULL,
  `out_num` int(11) NOT NULL,
  `stor_id` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of out_product
-- ----------------------------
INSERT INTO `out_product` VALUES ('1', '女装', '001', '2013-06-04', '100.0', '200.0', '5', '005');
INSERT INTO `out_product` VALUES ('3', '森马', '002', '2013-06-04', '80.0', '240.0', '10', '005');
INSERT INTO `out_product` VALUES ('4', '以纯', '003', '2013-06-04', '60.0', '180.0', '6', '005');
INSERT INTO `out_product` VALUES ('5', '女装', '001', '2013-06-06', '100.0', '150.0', '10', '001');
INSERT INTO `out_product` VALUES ('6', '薯片', '100', '2013-06-07', '3.0', '5.0', '5', '001');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_name` varchar(15) NOT NULL,
  `code` varchar(20) NOT NULL,
  `stor_id` varchar(10) NOT NULL,
  `in_date` date NOT NULL,
  `in_num` int(11) NOT NULL,
  `in_price` decimal(10,1) NOT NULL,
  `out_price` decimal(10,1) NOT NULL,
  `remark` text,
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('5', '薯片', '100', '001', '2013-06-07', '195', '3.0', '5.0', '');
INSERT INTO `product` VALUES ('6', '果粒橙', '200', '002', '2013-06-07', '200', '2.0', '3.5', '');
INSERT INTO `product` VALUES ('7', '巧克力', '101', '001', '2013-06-07', '100', '3.5', '7.0', '');
INSERT INTO `product` VALUES ('9', '香蕉', '500', '008', '2013-06-07', '50', '2.0', '3.5', '');
INSERT INTO `product` VALUES ('10', '女装', '001', '005', '2013-06-07', '85', '100.0', '150.0', '');
INSERT INTO `product` VALUES ('11', '裤子', '110', '1', '2013-06-07', '0', '1.0', '10.0', '1');

-- ----------------------------
-- Table structure for `stor_manage`
-- ----------------------------
DROP TABLE IF EXISTS `stor_manage`;
CREATE TABLE `stor_manage` (
  `stor_id` varchar(10) NOT NULL,
  `stor_name` varchar(20) NOT NULL,
  `remark` text,
  PRIMARY KEY  (`stor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stor_manage
-- ----------------------------
INSERT INTO `stor_manage` VALUES ('001', '食品仓库', '放真空食品');
INSERT INTO `stor_manage` VALUES ('002', '饮料仓库', '放碳酸饮料');
INSERT INTO `stor_manage` VALUES ('003', '蔬菜', ' 放新鲜蔬菜');
INSERT INTO `stor_manage` VALUES ('005', '衣服仓库', '存放衣服');
INSERT INTO `stor_manage` VALUES ('008', '水果仓库', '存放水果');
INSERT INTO `stor_manage` VALUES ('1', '1', '1');
