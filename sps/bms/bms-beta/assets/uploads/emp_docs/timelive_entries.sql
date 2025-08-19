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

 Date: 07/08/2025 18:12:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for timelive_entries
-- ----------------------------
DROP TABLE IF EXISTS `timelive_entries`;
CREATE TABLE `timelive_entries`  (
  `autoid` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time_entry_date` date NULL DEFAULT NULL,
  `time_entry_date_year` int NULL DEFAULT NULL,
  `time_entry_date_month` int NULL DEFAULT NULL,
  `time_entry_date_day` int NULL DEFAULT NULL,
  `client_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `project_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `task_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_time` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `task_desc` blob NULL,
  `work_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_billable` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `employee_department` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`autoid`) USING BTREE,
  INDEX `idx_employee_name`(`employee_name` ASC) USING BTREE,
  INDEX `idx_project_name`(`project_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 150246562 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
