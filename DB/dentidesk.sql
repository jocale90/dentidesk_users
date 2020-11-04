/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50133
 Source Host           : localhost:3306
 Source Schema         : dentidesk

 Target Server Type    : MySQL
 Target Server Version : 50133
 File Encoding         : 65001

 Date: 04/11/2020 19:37:12
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@dentidesk.com', '+56965529251', 'dentidesk', '2020-11-04 19:22:08');
INSERT INTO `users` VALUES (2, 'Maria Perez', 'maria@gmail.com', '+56965845785', 'dentidesk', '2020-11-04 00:00:00');
INSERT INTO `users` VALUES (3, 'Martin Gonzalez', 'mgonzalez@gmail.com', '+56985456552', 'dentidesk', '2020-11-04 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
