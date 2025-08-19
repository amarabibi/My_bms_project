/*
 Navicat Premium Data Transfer

 Source Server         : SPS Production
 Source Server Type    : MySQL
 Source Server Version : 11.5.2
 Source Host           : 9bb5e098-us-south.lb.appdomain.cloud:3306
 Source Schema         : spsbmsprod

 Target Server Type    : MySQL
 Target Server Version : 11.5.2
 File Encoding         : 65001

 Date: 07/08/2025 18:06:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for employment_history
-- ----------------------------
DROP TABLE IF EXISTS `employment_history`;
CREATE TABLE `employment_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int NULL DEFAULT NULL,
  `ed_id` int NULL DEFAULT NULL,
  `department_id` int NULL DEFAULT NULL,
  `group_id` int NULL DEFAULT NULL,
  `practice_id` int NULL DEFAULT NULL,
  `role_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hire_date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `termination_date` date NULL DEFAULT '0000-00-00',
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `letter_attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `functional_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `corporate_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB 
  AUTO_INCREMENT = 219 
  DEFAULT CHARSET = utf8mb4 
  COLLATE = utf8mb4_general_ci 
  ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
