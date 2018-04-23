/*
Navicat MySQL Data Transfer

Source Server         : ECS
Source Server Version : 50559
Source Host           : 139.129.94.14:3306
Source Database       : test_byyl

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2018-04-22 15:11:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  `ip_addr` varchar(100) DEFAULT NULL,
  `t_time` datetime DEFAULT NULL,
  `q_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
