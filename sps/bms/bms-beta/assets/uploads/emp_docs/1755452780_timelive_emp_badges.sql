/*
 Navicat Premium Data Transfer

 Source Server         : SPS Production
 Source Server Type    : MySQL
 Source Server Version : 110502
 Source Host           : 9bb5e098-us-south.lb.appdomain.cloud:3306
 Source Schema         : spsbmsprod

 Target Server Type    : MySQL
 Target Server Version : 110502
 File Encoding         : 65001

 Date: 07/08/2025 18:09:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for timelive_emp_badges
-- ----------------------------
DROP TABLE IF EXISTS `timelive_emp_badges`;
CREATE TABLE `timelive_emp_badges`  (
  `emp_badge_id` int NOT NULL AUTO_INCREMENT,
  `badge_title` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `badge_url` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `completed_on` date NULL DEFAULT NULL,
  `created_on` date NULL DEFAULT NULL,
  `last_updated_on` timestamp NOT NULL DEFAULT current_timestamp,
  `emp_id` int NULL DEFAULT NULL,
  `expiry_date` date NULL DEFAULT NULL,
  `vnd_id` int NULL DEFAULT NULL,
  `ddl_group_id` int NULL DEFAULT NULL,
  `ddl_product_id` int NULL DEFAULT NULL,
  `ddl_practice_id` int NULL DEFAULT NULL,
  `department_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`emp_badge_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 229 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
