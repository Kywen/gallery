/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : gallery

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-06-24 13:19:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of img
-- ----------------------------
INSERT INTO `img` VALUES ('1', '1.jpg', '向日葵女孩');
INSERT INTO `img` VALUES ('2', '2.jpg', '午后');
INSERT INTO `img` VALUES ('3', '3.jpg', '孤独的旅程');
INSERT INTO `img` VALUES ('4', '4.jpg', '逆光');
INSERT INTO `img` VALUES ('5', '5.jpg', '宁夏');
INSERT INTO `img` VALUES ('6', '6.jpg', 'Smile');
INSERT INTO `img` VALUES ('7', '7.jpg', '看海');
INSERT INTO `img` VALUES ('8', '8.jpg', '绽放');
INSERT INTO `img` VALUES ('9', '9.jpg', '安静');
INSERT INTO `img` VALUES ('10', '10.jpg', '猫');
INSERT INTO `img` VALUES ('11', '11.jpg', '松鼠');
INSERT INTO `img` VALUES ('12', '12.jpg', '北极熊');
INSERT INTO `img` VALUES ('13', '13.jpg', 'Princess');
INSERT INTO `img` VALUES ('14', '14.jpg', '咦?');
INSERT INTO `img` VALUES ('15', '15.jpg', '一个人');
INSERT INTO `img` VALUES ('16', '16.jpg', 'Dear');
INSERT INTO `img` VALUES ('17', '17.jpg', '午餐时间');
