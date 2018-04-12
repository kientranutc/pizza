/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pizza

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-12 16:51:40
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO banner VALUES ('1', 'Tests', 'http://store-test.local/source/Untitled.png', '1', 'http://localhost:8000/api/details', '2018-04-11 16:24:21', '2018-04-11 09:24:21');
INSERT INTO banner VALUES ('3', 'Test', 'http://store-test.local/source/category.png', '1', 'http://localhost:8000/api/details', '2018-04-11 16:27:52', '2018-04-11 09:27:52');

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
INSERT INTO categories VALUES ('4', 'pizza', 'pizza', '1', '2018-04-12 14:57:47', '2018-04-12 07:57:47');

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
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO customer VALUES ('1', 'test', 'test', 'kienkienutc95@gamil.com', 'áadfdsgh', '1', '0964953028', 'Hà nội', '2018-04-12 16:36:47', '2018-04-12 16:36:47');
INSERT INTO customer VALUES ('2', 'kientran', null, 'kienkienutc95@gmail.com', 'e6e061838856bf47e1de730719fb2609', null, '0964953029', null, '2018-04-12 09:36:56', '2018-04-12 09:36:56');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_create` varchar(255) DEFAULT NULL,
  `user_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO news VALUES ('2', 'Test1-1', '2', 'http://store-test.local/source/category.png', 'test1-1', '<p>test-description2</p>', '1', '2018-04-11 13:20:51', '2018-04-11 06:20:51', 'Admin', 'Admin');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `note` text,
  `total` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `user_update` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO orders VALUES ('1', '2018-04-11 13:23:00', 'test', '1000', '1', '0', 'Admin', '2018-04-11 15:03:12', '2018-04-11 08:03:12');

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
INSERT INTO order_detail VALUES ('1', '2', '60000', '2', '10', '2018-04-11 14:33:45', '2018-04-11 14:33:45');
INSERT INTO order_detail VALUES ('1', '3', '5000', '1', null, '2018-04-11 13:24:19', '2018-04-11 13:24:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO products VALUES ('2', 'test ', 'test', '<p>test</p>', 'http://store-test.local/source/cake2.png', '5678568', '1', '10', '2018-04-12 16:50:29', '2018-04-12 09:50:29', '4', '1');
INSERT INTO products VALUES ('3', 'Pizza', 'pizza', '<p>test</p>', 'http://store-test.local/source/cake2.png', '5678568', '1', '10', '2018-04-12 14:56:33', '2018-04-12 07:56:33', '4', '1');
INSERT INTO products VALUES ('4', 'Pizza phô mai', 'pizza-pho-mai', '<p>test</p>', 'http://store-test.local/source/cake2.png', '100000', '1', '0', '2018-04-12 15:03:06', '2018-04-12 15:03:06', '4', '1');

-- ----------------------------
-- Table structure for `rate_product`
-- ----------------------------
DROP TABLE IF EXISTS `rate_product`;
CREATE TABLE `rate_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `rate_number` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rate_product
-- ----------------------------
INSERT INTO rate_product VALUES ('1', '2', null, '2');
INSERT INTO rate_product VALUES ('2', '3', null, '4');
INSERT INTO rate_product VALUES ('3', '2', null, '3');
INSERT INTO rate_product VALUES ('4', '4', null, '1');
INSERT INTO rate_product VALUES ('5', '4', null, '4');

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
INSERT INTO role VALUES ('1', 'admin', 'admin', '1', '1', '', '', '2018-04-09 10:25:04', null);
INSERT INTO role VALUES ('2', 'member', 'member', '2', '1', '', '', '2018-04-09 10:25:43', null);

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
INSERT INTO users VALUES ('1', 'Admin', 'Admin', 'kienkienutc95@gmail.com', '$2y$10$rlK4DHEnZtPhJFcFFbgj5ezqWfQnvYAgdZPvLj81StpgNLor6TnSW', null, '0', 'FA56gKwhSKAM9oqF3IK20Jxit1js2QE3LpBOSahSdXH1eEN6kSwKoGpfhiTd', null, '2018-04-09 09:56:37', '1', '');
INSERT INTO users VALUES ('6', 'member', 'member', 'admin@gmail.com', '$2y$10$yM9ijtaai8z.qVKGBgGmXeSGvfMcRMA3ORpWHb0wC0gamhsnyTJYq', null, '0', 'Z9mDqnF6JaeUWW9utkOk3iLvaGm9NWVFdczAEQrnTeFxhN1AcBHNtjciHj7r', '2018-04-09 09:56:28', '2018-04-11 02:54:38', '0', 'http://store-test.local/source/category.png');

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
INSERT INTO user_role VALUES ('1', '1', '2017-12-25 06:36:21', '2018-04-09 09:49:30');
INSERT INTO user_role VALUES ('6', '2', '2018-04-09 09:56:28', '2018-04-09 10:27:24');
