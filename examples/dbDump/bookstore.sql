/*
Navicat MySQL Data Transfer

Source Server         : debian
Source Server Version : 50166
Source Host           : debian:3306
Source Database       : myRecord

Target Server Type    : MYSQL
Target Server Version : 50166
File Encoding         : 65001

Date: 2013-02-25 00:39:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authors`
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', '2013-02-24 23:20:56', null, 'George R. R. Martin', '1965-01-03');
INSERT INTO `authors` VALUES ('2', '2013-02-24 23:21:30', null, 'Gárdonyi Géza', '1806-12-15');

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author_id`),
  CONSTRAINT `author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', '2013-02-24 23:22:11', null, 'A Game of Thrones', '1', '1991-04-15');
INSERT INTO `books` VALUES ('2', '2013-02-24 23:22:39', null, 'Ergi Csillagok', '2', '1854-03-12');
INSERT INTO `books` VALUES ('3', '2013-02-24 23:23:01', null, 'A Clash of Kings', '1', '1995-04-26');
