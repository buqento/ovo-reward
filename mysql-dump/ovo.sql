/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : ovo

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 24/10/2019 23:03:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP DATABASE IF EXISTS `ovo`;
CREATE DATABASE `ovo`;

use `ovo`;
-- ----------------------------
-- Table structure for reward
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `random_reward` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `get_reward` int(11) NULL DEFAULT NULL,
  `balance` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reward
-- ----------------------------
INSERT INTO `reward` VALUES (1, 'Deni', '10 - 20', 16, 184);
INSERT INTO `reward` VALUES (2, 'Gilbert', '45 - 75', 50, 134);
INSERT INTO `reward` VALUES (3, 'Brandon', '60 - 80', 61, 73);
INSERT INTO `reward` VALUES (4, 'There', '30 - 50', 39, 34);
INSERT INTO `reward` VALUES (5, 'Jill', '25 - 35', 33, 1);

SET FOREIGN_KEY_CHECKS = 1;
