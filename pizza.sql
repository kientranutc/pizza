/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pizza

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-18 08:17:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bank`
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seri` varchar(255) DEFAULT NULL,
  `pin` varchar(16) DEFAULT NULL,
  `money` double DEFAULT NULL,
  `content` text,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', '12345678910', '565642', '1000000', null, null, '2018-05-18 07:51:31', '2018-05-18 07:51:31');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', 'Tests', 'http://store-test.local/source/Untitled.png', '1', 'http://localhost:8000/api/details', '2018-04-11 16:24:21', '2018-04-11 09:24:21');
INSERT INTO `banner` VALUES ('3', 'Test', 'http://store-test.local/source/category.png', '1', 'http://localhost:8000/api/details', '2018-04-11 16:27:52', '2018-04-11 09:27:52');

-- ----------------------------
-- Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_create` varchar(255) DEFAULT NULL,
  `user_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('4', 'test2', 'http://pizza.local:8080/source/sale2.jpg', 'test2', '', '1', '2018-04-14 08:22:01', '2018-04-14 01:22:01', 'Admin', 'Admin');
INSERT INTO `blog` VALUES ('5', 'Test1-13', 'http://pizza.local:8080/source/sale3.png', 'test1-13', '<p>test</p>', '1', '2018-04-14 08:21:50', '2018-04-14 01:21:50', 'Admin', 'Admin');
INSERT INTO `blog` VALUES ('6', 'test-blog', 'http://pizza.local/source/Untitled.png', 'test-blog', '<p>test=blog</p>\r\n<p style=\"text-align: center;\"><img src=\"http://pizza.local/source/sale2_1.jpg\" alt=\"\" width=\"722\" height=\"555\" /></p>', '1', '2018-05-04 15:27:38', '2018-05-04 15:27:38', 'Admin', null);

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('4', 'pizza', 'pizza', '1', '2018-04-12 14:57:47', '2018-04-12 07:57:47');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '4', '2', 'test', '1', '2018-04-14 04:09:27', '2018-04-14 04:09:27');
INSERT INTO `comment` VALUES ('2', '4', '1', 'test-user', '1', '2018-04-14 04:19:39', '2018-04-14 04:19:39');
INSERT INTO `comment` VALUES ('3', '4', '1', 'testaaa', '1', '2018-04-14 04:21:48', '2018-04-14 04:21:48');
INSERT INTO `comment` VALUES ('4', '3', '1', 'test', '1', '2018-04-14 11:22:13', '2018-04-14 04:22:13');
INSERT INTO `comment` VALUES ('5', '3', '1', 'test', '1', '2018-04-14 04:33:47', '2018-04-14 04:33:47');
INSERT INTO `comment` VALUES ('6', '3', '1', 'testafasga', '1', '2018-04-14 11:36:31', '2018-04-14 11:36:31');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'test', 'test', 'kienkienutc95@gamil.com', 'e6e061838856bf47e1de730719fb2609', '1', '0964953028', 'Hà nội', '2018-04-14 11:18:34', '2018-04-14 11:18:34');
INSERT INTO `customer` VALUES ('2', 'kientran', 'Trần Chung Kiên', 'kienkienutc95@gmail.com', 'e6e061838856bf47e1de730719fb2609', null, '0964953029', 'Hà nội', '2018-04-14 15:20:27', '2018-04-14 15:20:27');
INSERT INTO `customer` VALUES ('3', 'mr.bean', 'Test1', 'kienkienutc95@gmail.coms', 'e6e061838856bf47e1de730719fb2609', null, '0964953027', 'Hà nội', '2018-04-14 15:20:34', '2018-04-14 15:20:34');
INSERT INTO `customer` VALUES ('4', null, 'Trần Chung Kiên', null, null, null, null, 'Hà nội ', '2018-04-14 16:10:34', '2018-04-14 16:10:34');
INSERT INTO `customer` VALUES ('5', null, 'Trần Chung Kiên', 'kienkienutc95@gmail.com', null, null, '0964953029', 'Hà nội ', '2018-04-14 16:15:46', '2018-04-14 16:15:46');
INSERT INTO `customer` VALUES ('6', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:37:52', '2018-05-04 11:37:52');
INSERT INTO `customer` VALUES ('7', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:38:02', '2018-05-04 11:38:02');
INSERT INTO `customer` VALUES ('8', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:38:17', '2018-05-04 11:38:17');
INSERT INTO `customer` VALUES ('9', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:38:36', '2018-05-04 11:38:36');
INSERT INTO `customer` VALUES ('10', null, '', '', null, null, '', '', '2018-05-04 11:39:14', '2018-05-04 11:39:14');
INSERT INTO `customer` VALUES ('11', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:39:35', '2018-05-04 11:39:35');
INSERT INTO `customer` VALUES ('12', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:40:30', '2018-05-04 11:40:30');
INSERT INTO `customer` VALUES ('13', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:41:34', '2018-05-04 11:41:34');
INSERT INTO `customer` VALUES ('14', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:42:07', '2018-05-04 11:42:07');
INSERT INTO `customer` VALUES ('15', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:42:35', '2018-05-04 11:42:35');
INSERT INTO `customer` VALUES ('16', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 11:43:52', '2018-05-04 11:43:52');
INSERT INTO `customer` VALUES ('17', null, '', '', null, null, '', '', '2018-05-04 12:36:18', '2018-05-04 12:36:18');
INSERT INTO `customer` VALUES ('18', null, '', '', null, null, '', '', '2018-05-04 12:37:19', '2018-05-04 12:37:19');
INSERT INTO `customer` VALUES ('19', null, 'Trần Chung Kiêns', 'kienkienutc95@gmail.com', null, null, '0964953028', 'Hà nội ', '2018-05-04 12:37:40', '2018-05-04 12:37:40');
INSERT INTO `customer` VALUES ('20', null, 'tesst', 'kienkienutc95@gmail.com', null, null, '0964953029', 'tesst', '2018-05-04 12:42:03', '2018-05-04 12:42:03');

-- ----------------------------
-- Table structure for `news_sale`
-- ----------------------------
DROP TABLE IF EXISTS `news_sale`;
CREATE TABLE `news_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_create` varchar(255) DEFAULT NULL,
  `user_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_sale
-- ----------------------------
INSERT INTO `news_sale` VALUES ('4', 'test2', 'http://pizza.local:8080/source/sale2.jpg', 'test2', '', '1', '2018-04-14 08:22:01', '2018-04-14 01:22:01', 'Admin', 'Admin');
INSERT INTO `news_sale` VALUES ('5', 'Test1-13', 'http://pizza.local:8080/source/sale3.png', 'test1-13', '<p>test</p>', '1', '2018-04-14 08:21:50', '2018-04-14 01:21:50', 'Admin', 'Admin');
INSERT INTO `news_sale` VALUES ('6', 'Tests', 'http://pizza.local/source/sale2.jpg', 'tests', '<p>test</p>', '0', '2018-05-04 14:20:41', '2018-05-04 14:20:41', 'Admin', 'Admin');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `note` text,
  `total` float(14,0) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `user_update` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '2018-04-14 16:15:47', 'giao sơm', '316000', '5', '1', null, '2018-05-04 11:27:25', '2018-05-04 11:27:25');
INSERT INTO `orders` VALUES ('2', '2018-05-04 11:37:52', 'giao sơm', '100000', '6', '0', null, '2018-05-04 11:37:53', '2018-05-04 11:37:53');
INSERT INTO `orders` VALUES ('3', '2018-05-04 11:38:02', 'giao sơm', '100000', '7', '0', null, '2018-05-04 11:38:02', '2018-05-04 11:38:02');
INSERT INTO `orders` VALUES ('4', '2018-05-04 11:38:18', 'giao sơm', '100000', '8', '0', null, '2018-05-04 11:38:18', '2018-05-04 11:38:18');
INSERT INTO `orders` VALUES ('5', '2018-05-04 11:38:36', 'giao sơm', '100000', '9', '0', null, '2018-05-04 11:38:36', '2018-05-04 11:38:36');
INSERT INTO `orders` VALUES ('6', '2018-05-04 11:39:14', '', '100000', '10', '0', null, '2018-05-04 11:39:14', '2018-05-04 11:39:14');
INSERT INTO `orders` VALUES ('7', '2018-05-04 11:39:35', 'giao sơm', '100000', '11', '0', null, '2018-05-04 11:39:35', '2018-05-04 11:39:35');
INSERT INTO `orders` VALUES ('8', '2018-05-04 11:40:30', 'giao sơm', '100000', '12', '0', null, '2018-05-04 11:40:30', '2018-05-04 11:40:30');
INSERT INTO `orders` VALUES ('9', '2018-05-04 11:41:34', 'giao sơm', '100000', '13', '0', null, '2018-05-04 11:41:34', '2018-05-04 11:41:34');
INSERT INTO `orders` VALUES ('10', '2018-05-04 11:42:08', 'giao sơm', '100000', '14', '0', null, '2018-05-04 11:42:08', '2018-05-04 11:42:08');
INSERT INTO `orders` VALUES ('11', '2018-05-04 11:42:35', 'giao sơm', '100000', '15', '0', null, '2018-05-04 11:42:35', '2018-05-04 11:42:35');
INSERT INTO `orders` VALUES ('12', '2018-05-04 11:43:52', 'giao sơm', '100000', '16', '0', null, '2018-05-04 11:43:52', '2018-05-04 11:43:52');
INSERT INTO `orders` VALUES ('13', '2018-05-04 12:36:18', '', '100000', '17', '0', null, '2018-05-04 12:36:18', '2018-05-04 12:36:18');
INSERT INTO `orders` VALUES ('14', '2018-05-04 12:37:19', '', '100000', '18', '0', null, '2018-05-04 12:37:19', '2018-05-04 12:37:19');
INSERT INTO `orders` VALUES ('15', '2018-05-04 12:37:40', 'giao sơm', '100000', '19', '0', null, '2018-05-04 12:37:40', '2018-05-04 12:37:40');
INSERT INTO `orders` VALUES ('16', '2018-05-04 12:38:57', '', '100000', '2', '0', null, '2018-05-04 12:38:57', '2018-05-04 12:38:57');
INSERT INTO `orders` VALUES ('17', '2018-05-04 12:42:03', 'tesst', '100000', '20', '0', null, '2018-05-04 12:42:03', '2018-05-04 12:42:03');
INSERT INTO `orders` VALUES ('18', '2018-05-04 12:45:56', '', '100000', '2', '0', null, '2018-05-04 12:45:56', '2018-05-04 12:45:56');
INSERT INTO `orders` VALUES ('19', '2018-05-04 12:47:25', '', '100000', '2', '0', null, '2018-05-04 12:47:25', '2018-05-04 12:47:25');
INSERT INTO `orders` VALUES ('20', '2018-05-04 12:47:34', '', '100000', '2', '0', null, '2018-05-04 12:47:34', '2018-05-04 12:47:34');
INSERT INTO `orders` VALUES ('21', '2018-05-04 12:49:03', '', '100000', '2', '0', null, '2018-05-04 12:49:03', '2018-05-04 12:49:03');
INSERT INTO `orders` VALUES ('22', '2018-05-04 12:51:45', '', '100000', '2', '0', null, '2018-05-04 12:51:45', '2018-05-04 12:51:45');
INSERT INTO `orders` VALUES ('23', '2018-05-04 12:56:27', '', '100000', '2', '0', null, '2018-05-04 12:56:27', '2018-05-04 12:56:27');
INSERT INTO `orders` VALUES ('24', '2018-05-04 12:57:11', '', '100000', '2', '0', null, '2018-05-04 12:57:11', '2018-05-04 12:57:11');
INSERT INTO `orders` VALUES ('25', '2018-05-04 13:03:54', '', '100000', '2', '0', null, '2018-05-04 13:03:54', '2018-05-04 13:03:54');
INSERT INTO `orders` VALUES ('26', '2018-05-04 13:09:26', '', '100000', '2', '0', null, '2018-05-04 13:09:26', '2018-05-04 13:09:26');
INSERT INTO `orders` VALUES ('27', '2018-05-04 13:38:15', '', '100000', '2', '0', null, '2018-05-04 13:38:15', '2018-05-04 13:38:15');
INSERT INTO `orders` VALUES ('28', '2018-05-04 13:44:31', '', '0', '2', '0', null, '2018-05-04 13:44:31', '2018-05-04 13:44:31');
INSERT INTO `orders` VALUES ('29', '2018-05-18 08:15:30', '', '216000', '2', '0', null, '2018-05-18 08:15:30', '2018-05-18 08:15:30');

-- ----------------------------
-- Table structure for `order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('1', '3', '120000', '2', '10', '2018-04-14 16:15:47', '2018-04-14 16:15:47');
INSERT INTO `order_detail` VALUES ('1', '4', '100000', '1', '0', '2018-04-14 16:15:47', '2018-04-14 16:15:47');
INSERT INTO `order_detail` VALUES ('2', '5', '100000', '1', '0', '2018-05-04 11:37:53', '2018-05-04 11:37:53');
INSERT INTO `order_detail` VALUES ('3', '5', '100000', '1', '0', '2018-05-04 11:38:02', '2018-05-04 11:38:02');
INSERT INTO `order_detail` VALUES ('4', '5', '100000', '1', '0', '2018-05-04 11:38:18', '2018-05-04 11:38:18');
INSERT INTO `order_detail` VALUES ('5', '5', '100000', '1', '0', '2018-05-04 11:38:36', '2018-05-04 11:38:36');
INSERT INTO `order_detail` VALUES ('6', '5', '100000', '1', '0', '2018-05-04 11:39:14', '2018-05-04 11:39:14');
INSERT INTO `order_detail` VALUES ('7', '5', '100000', '1', '0', '2018-05-04 11:39:35', '2018-05-04 11:39:35');
INSERT INTO `order_detail` VALUES ('8', '5', '100000', '1', '0', '2018-05-04 11:40:30', '2018-05-04 11:40:30');
INSERT INTO `order_detail` VALUES ('9', '5', '100000', '1', '0', '2018-05-04 11:41:34', '2018-05-04 11:41:34');
INSERT INTO `order_detail` VALUES ('10', '5', '100000', '1', '0', '2018-05-04 11:42:08', '2018-05-04 11:42:08');
INSERT INTO `order_detail` VALUES ('11', '5', '100000', '1', '0', '2018-05-04 11:42:35', '2018-05-04 11:42:35');
INSERT INTO `order_detail` VALUES ('12', '5', '100000', '1', '0', '2018-05-04 11:43:52', '2018-05-04 11:43:52');
INSERT INTO `order_detail` VALUES ('13', '5', '100000', '1', '0', '2018-05-04 12:36:18', '2018-05-04 12:36:18');
INSERT INTO `order_detail` VALUES ('14', '5', '100000', '1', '0', '2018-05-04 12:37:19', '2018-05-04 12:37:19');
INSERT INTO `order_detail` VALUES ('15', '5', '100000', '1', '0', '2018-05-04 12:37:41', '2018-05-04 12:37:41');
INSERT INTO `order_detail` VALUES ('16', '5', '100000', '1', '0', '2018-05-04 12:38:57', '2018-05-04 12:38:57');
INSERT INTO `order_detail` VALUES ('17', '5', '100000', '1', '0', '2018-05-04 12:42:03', '2018-05-04 12:42:03');
INSERT INTO `order_detail` VALUES ('18', '5', '100000', '1', '0', '2018-05-04 12:45:56', '2018-05-04 12:45:56');
INSERT INTO `order_detail` VALUES ('19', '5', '100000', '1', '0', '2018-05-04 12:47:25', '2018-05-04 12:47:25');
INSERT INTO `order_detail` VALUES ('20', '5', '100000', '1', '0', '2018-05-04 12:47:34', '2018-05-04 12:47:34');
INSERT INTO `order_detail` VALUES ('21', '5', '100000', '1', '0', '2018-05-04 12:49:03', '2018-05-04 12:49:03');
INSERT INTO `order_detail` VALUES ('22', '5', '100000', '1', '0', '2018-05-04 12:51:45', '2018-05-04 12:51:45');
INSERT INTO `order_detail` VALUES ('23', '5', '100000', '1', '0', '2018-05-04 12:56:27', '2018-05-04 12:56:27');
INSERT INTO `order_detail` VALUES ('24', '5', '100000', '1', '0', '2018-05-04 12:57:11', '2018-05-04 12:57:11');
INSERT INTO `order_detail` VALUES ('25', '5', '100000', '1', '0', '2018-05-04 13:03:54', '2018-05-04 13:03:54');
INSERT INTO `order_detail` VALUES ('26', '5', '100000', '1', '0', '2018-05-04 13:09:27', '2018-05-04 13:09:27');
INSERT INTO `order_detail` VALUES ('27', '5', '100000', '1', '0', '2018-05-04 13:38:15', '2018-05-04 13:38:15');
INSERT INTO `order_detail` VALUES ('29', '3', '120000', '2', '10', '2018-05-18 08:15:31', '2018-05-18 08:15:31');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  `user_id_create` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', 'test ', 'test', '<p>test</p>', 'http://pizza.local:8080/source/cake2.png', '200000', '1', '10', '2018-04-14 08:21:33', '2018-04-14 01:21:33', '4', '1');
INSERT INTO `products` VALUES ('3', 'Pizza', 'pizza', '<p>test</p>', 'http://pizza.local:8080/source/cake2.png', '120000', '1', '10', '2018-04-14 08:21:23', '2018-04-14 01:21:23', '4', '1');
INSERT INTO `products` VALUES ('4', 'Pizza phô mai', 'pizza-pho-mai', '<p>test</p>', 'http://pizza.local:8080/source/cake1.png', '100000', '1', '0', '2018-04-14 08:21:11', '2018-04-14 01:21:11', '4', '1');
INSERT INTO `products` VALUES ('5', 'pizza test', 'pizza-test', '<p>aaaac aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'http://localhost:8000/source/cake1.png', '100000', '1', '0', '2018-05-04 11:31:33', '2018-05-04 11:31:33', '4', '1');

-- ----------------------------
-- Table structure for `rate_product`
-- ----------------------------
DROP TABLE IF EXISTS `rate_product`;
CREATE TABLE `rate_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `rate_number` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rate_product
-- ----------------------------
INSERT INTO `rate_product` VALUES ('1', '2', '2', null, null);
INSERT INTO `rate_product` VALUES ('2', '3', '4', null, null);
INSERT INTO `rate_product` VALUES ('3', '2', '3', null, null);
INSERT INTO `rate_product` VALUES ('4', '4', '1', null, null);
INSERT INTO `rate_product` VALUES ('5', '4', '4', null, null);
INSERT INTO `rate_product` VALUES ('6', '5', '1', null, null);
INSERT INTO `rate_product` VALUES ('7', '4', '5', '2018-04-14 01:24:00', '2018-04-14 01:24:00');
INSERT INTO `rate_product` VALUES ('8', '4', '4', '2018-04-14 01:28:38', '2018-04-14 01:28:38');
INSERT INTO `rate_product` VALUES ('9', '2', '5', '2018-04-14 01:31:16', '2018-04-14 01:31:16');
INSERT INTO `rate_product` VALUES ('10', '2', '5', '2018-04-14 01:31:21', '2018-04-14 01:31:21');
INSERT INTO `rate_product` VALUES ('11', '4', '4', '2018-04-14 01:34:42', '2018-04-14 01:34:42');
INSERT INTO `rate_product` VALUES ('12', '3', '4', '2018-04-14 01:35:08', '2018-04-14 01:35:08');
INSERT INTO `rate_product` VALUES ('13', '2', '5', '2018-04-14 01:35:13', '2018-04-14 01:35:13');
INSERT INTO `rate_product` VALUES ('14', '2', '4', '2018-04-14 01:42:18', '2018-04-14 01:42:18');
INSERT INTO `rate_product` VALUES ('15', '3', '4', '2018-04-14 02:11:50', '2018-04-14 02:11:50');
INSERT INTO `rate_product` VALUES ('16', '4', '2', '2018-04-14 02:50:55', '2018-04-14 02:50:55');
INSERT INTO `rate_product` VALUES ('17', '3', '4', '2018-04-14 03:49:34', '2018-04-14 03:49:34');
INSERT INTO `rate_product` VALUES ('18', null, null, '2018-04-14 16:54:58', '2018-04-14 16:54:58');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin', 'admin', '1', '1', '', '', '2018-04-09 10:25:04', null);
INSERT INTO `role` VALUES ('2', 'member', 'member', '2', '1', '', '', '2018-04-09 10:25:43', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'Admin', 'kienkienutc95@gmail.com', '$2y$10$rlK4DHEnZtPhJFcFFbgj5ezqWfQnvYAgdZPvLj81StpgNLor6TnSW', null, '0', 'FA56gKwhSKAM9oqF3IK20Jxit1js2QE3LpBOSahSdXH1eEN6kSwKoGpfhiTd', null, '2018-04-09 09:56:37', '1', '');
INSERT INTO `users` VALUES ('6', 'member', 'member', 'admin@gmail.com', '$2y$10$yM9ijtaai8z.qVKGBgGmXeSGvfMcRMA3ORpWHb0wC0gamhsnyTJYq', null, '0', 'Z9mDqnF6JaeUWW9utkOk3iLvaGm9NWVFdczAEQrnTeFxhN1AcBHNtjciHj7r', '2018-04-09 09:56:28', '2018-04-11 02:54:38', '0', 'http://store-test.local/source/category.png');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1', '2017-12-25 06:36:21', '2018-04-09 09:49:30');
INSERT INTO `user_role` VALUES ('6', '2', '2018-04-09 09:56:28', '2018-04-09 10:27:24');
