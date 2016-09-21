/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : carpooling

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-09-21 12:38:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(50) DEFAULT NULL COMMENT '字段名称',
  `code` varchar(20) DEFAULT NULL COMMENT '字段代码',
  `type` char(10) DEFAULT NULL COMMENT '字段类型',
  `content` text,
  `sort` int(11) DEFAULT '0' COMMENT '字段排序',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', '商城名称', 'mallName', 'text', '最云南', '1', '0', '0');
INSERT INTO `config` VALUES ('2', '商城标题', 'mallTitle', 'text', '最云南', '2', '0', '0');
INSERT INTO `config` VALUES ('3', '商城描述', 'mallDesc', 'text', '最云南,最云南', '3', '0', '0');
INSERT INTO `config` VALUES ('4', '商城关键字', 'mallKeywords', 'text', '最云南', '4', '0', '0');
INSERT INTO `config` VALUES ('5', '商城Logo', 'mallLogo', 'upload', '/static/mallLogo/20160812/ee4d4459b3369d962ee7d68a0b88473e.jpg', '5', '0', '0');
INSERT INTO `config` VALUES ('6', '底部设置', 'mallFooter', 'textarea', '<p>版权所有  最云南社有限公司</p>\n  <p>滇ICP证 16097834</p>\n  <p>2015 All copyrights by Kunming spring tour CO，ITd</p>', '6', '0', '0');
INSERT INTO `config` VALUES ('7', '联系电话', 'phoneNo', 'text', '4008627098', '7', '0', '0');
INSERT INTO `config` VALUES ('8', 'QQ', 'qqNo', 'text', '772947665', '8', '0', '0');
