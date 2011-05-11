/*
Navicat MySQL Data Transfer

Source Server         : mysql5.1_portable
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : db_wac_erp

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-05-11 18:35:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `sf_guard_group`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group`;
CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_group
-- ----------------------------
INSERT INTO `sf_guard_group` VALUES ('1', 'admin', 'Administrator group', '2009-12-19 08:12:50', '2009-12-19 08:12:50');
INSERT INTO `sf_guard_group` VALUES ('2', 'group1', '布匹生产部门', '2010-03-17 10:14:46', '2010-03-29 08:53:06');
INSERT INTO `sf_guard_group` VALUES ('3', 'follows', '跟单员', '2010-03-18 08:26:41', '2010-04-14 03:51:53');
INSERT INTO `sf_guard_group` VALUES ('4', 'orders', '落单员', '2010-03-18 09:06:29', '2010-04-14 03:50:42');
INSERT INTO `sf_guard_group` VALUES ('5', 'auditors', '审批员', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group` VALUES ('9', 't1', 't1', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO `sf_guard_group` VALUES ('10', 't2', 't2', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO `sf_guard_group` VALUES ('11', 't3', 't3', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO `sf_guard_group` VALUES ('12', 't4', 't4', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO `sf_guard_group` VALUES ('14', 't5', 't5', '2011-01-04 10:30:06', '2011-01-04 10:30:06');
INSERT INTO `sf_guard_group` VALUES ('15', 't6', 't6', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group` VALUES ('16', 't7', 't7', '2011-03-29 10:26:23', '2011-03-30 03:40:28');

-- ----------------------------
-- Table structure for `sf_guard_group_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group_permission`;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_group_permission
-- ----------------------------
INSERT INTO `sf_guard_group_permission` VALUES ('1', '1', '2009-12-19 08:12:51', '2009-12-19 08:12:51');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '6', '2010-03-29 08:53:06', '2010-03-29 08:53:06');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '7', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '9', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '11', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '14', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '15', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '17', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '18', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '20', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '21', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '23', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '25', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '26', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '28', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '30', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO `sf_guard_group_permission` VALUES ('2', '31', '2010-04-09 07:54:27', '2010-04-09 07:54:27');
INSERT INTO `sf_guard_group_permission` VALUES ('3', '6', '2010-04-14 03:51:10', '2010-04-14 03:51:10');
INSERT INTO `sf_guard_group_permission` VALUES ('3', '12', '2010-04-14 03:51:10', '2010-04-14 03:51:10');
INSERT INTO `sf_guard_group_permission` VALUES ('3', '15', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO `sf_guard_group_permission` VALUES ('3', '18', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO `sf_guard_group_permission` VALUES ('3', '23', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO `sf_guard_group_permission` VALUES ('4', '6', '2010-04-14 03:50:17', '2010-04-14 03:50:17');
INSERT INTO `sf_guard_group_permission` VALUES ('4', '7', '2010-04-14 03:50:17', '2010-04-14 03:50:17');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '7', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '9', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '11', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '12', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '14', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '15', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '17', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '18', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '20', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '21', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '23', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '25', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '26', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '28', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('5', '30', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO `sf_guard_group_permission` VALUES ('9', '7', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO `sf_guard_group_permission` VALUES ('9', '12', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO `sf_guard_group_permission` VALUES ('9', '18', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO `sf_guard_group_permission` VALUES ('10', '11', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO `sf_guard_group_permission` VALUES ('10', '15', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO `sf_guard_group_permission` VALUES ('10', '20', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO `sf_guard_group_permission` VALUES ('11', '17', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO `sf_guard_group_permission` VALUES ('11', '25', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO `sf_guard_group_permission` VALUES ('12', '9', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO `sf_guard_group_permission` VALUES ('12', '17', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO `sf_guard_group_permission` VALUES ('14', '12', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO `sf_guard_group_permission` VALUES ('14', '17', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO `sf_guard_group_permission` VALUES ('14', '21', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '5', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '6', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '7', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '9', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '11', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '12', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '14', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '15', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '17', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '23', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('15', '28', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `sf_guard_group_permission` VALUES ('16', '11', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO `sf_guard_group_permission` VALUES ('16', '15', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO `sf_guard_group_permission` VALUES ('16', '20', '2011-03-29 10:26:48', '2011-03-29 10:26:48');

-- ----------------------------
-- Table structure for `sf_guard_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_permission`;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_permission
-- ----------------------------
INSERT INTO `sf_guard_permission` VALUES ('1', 'admin', '超级管理权', '2009-12-19 08:12:50', '2010-03-18 10:10:39');
INSERT INTO `sf_guard_permission` VALUES ('5', 'app_system_setting', '系统设置', '2010-03-18 10:08:32', '2010-03-18 10:08:32');
INSERT INTO `sf_guard_permission` VALUES ('6', 'app_cloth_produce', '布匹生产流程', '2010-03-18 10:10:07', '2010-03-18 10:10:07');
INSERT INTO `sf_guard_permission` VALUES ('7', 'app_order_manager', '订单/生产单管理', '2010-04-06 07:33:30', '2010-04-06 07:33:30');
INSERT INTO `sf_guard_permission` VALUES ('9', 'app_customer_order_audit', '订单审批', '2010-04-06 07:34:40', '2010-04-06 07:34:40');
INSERT INTO `sf_guard_permission` VALUES ('11', 'app_production_order_audit', '生产单审批', '2010-04-06 07:35:29', '2010-04-06 07:35:29');
INSERT INTO `sf_guard_permission` VALUES ('12', 'app_cotton_order_manager', '棉纱单管理', '2010-04-06 07:36:35', '2010-04-06 07:36:35');
INSERT INTO `sf_guard_permission` VALUES ('14', 'app_cotton_order_audit', '棉纱单审批', '2010-04-06 07:37:21', '2010-04-06 07:37:21');
INSERT INTO `sf_guard_permission` VALUES ('15', 'app_dye_order_manager', '浆染纱生产管理', '2010-04-06 07:38:05', '2010-04-06 07:38:05');
INSERT INTO `sf_guard_permission` VALUES ('17', 'app_dye_order_audit', '浆染单审批', '2010-04-06 07:38:46', '2010-04-06 07:38:46');
INSERT INTO `sf_guard_permission` VALUES ('18', 'app_weave_order_manager', '织造布生产管理', '2010-04-06 07:39:07', '2010-04-06 07:39:17');
INSERT INTO `sf_guard_permission` VALUES ('20', 'app_weave_order_audit', '织造单审批', '2010-04-06 07:40:42', '2010-04-06 07:40:42');
INSERT INTO `sf_guard_permission` VALUES ('21', 'app_weave_qc_form_manager', '织造QC单管理', '2010-04-06 07:41:04', '2010-04-06 07:41:04');
INSERT INTO `sf_guard_permission` VALUES ('23', 'app_clean_up_form_manager', '整理定型单管理', '2010-04-06 07:42:18', '2010-04-06 07:42:18');
INSERT INTO `sf_guard_permission` VALUES ('25', 'app_clean_up_form_audit', '整理定型单审批', '2010-04-06 07:42:50', '2010-04-06 07:42:50');
INSERT INTO `sf_guard_permission` VALUES ('26', 'app_clean_up_qc_form_manager1', '整理QC单管理1', '2010-04-06 07:43:28', '2010-09-23 16:20:32');
INSERT INTO `sf_guard_permission` VALUES ('28', 'app_final_cloth_form_manager', '成品布生产管理', '2010-04-06 07:44:18', '2010-04-06 07:44:18');
INSERT INTO `sf_guard_permission` VALUES ('30', 'app_final_cloth_form_audit', '成品单审批', '2010-04-06 07:45:03', '2010-04-06 07:58:32');
INSERT INTO `sf_guard_permission` VALUES ('31', 'app_statistic_manager', '查询与统计', '2010-04-09 07:54:02', '2010-04-09 07:54:02');
INSERT INTO `sf_guard_permission` VALUES ('32', 'app_final_cloth_qc_form_manager', '成品布QC管理1', '2010-09-06 15:19:11', '2011-04-11 07:55:10');

-- ----------------------------
-- Table structure for `sf_guard_remember_key`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_remember_key`;
CREATE TABLE `sf_guard_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_remember_key
-- ----------------------------

-- ----------------------------
-- Table structure for `sf_guard_user`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user`;
CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------
INSERT INTO `sf_guard_user` VALUES ('1', 'admin', 'sha1', '59f12273dd2e1c99581bfc24ca702c8e', 'e8efdc7df4a04fcf3afd22d82f8ee4ca60f9b4c3', '1', '1', '2011-05-11 09:52:32', '2009-12-19 08:12:50', '2011-05-11 09:52:33');
INSERT INTO `sf_guard_user` VALUES ('17', 'user1', 'sha1', 'e83ecdefb483cd2db998fd0daa0c5d87', 'bafb2f103d52d727ba3eb8c5d9532c871d04e455', '1', '0', '2011-03-31 04:01:35', '2011-03-31 02:40:56', '2011-03-31 04:01:35');

-- ----------------------------
-- Table structure for `sf_guard_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_group`;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user_group
-- ----------------------------
INSERT INTO `sf_guard_user_group` VALUES ('1', '1', '2009-12-19 08:12:50', '2009-12-19 08:12:50');
INSERT INTO `sf_guard_user_group` VALUES ('17', '2', '2011-03-31 02:40:56', '2011-03-31 02:40:56');
INSERT INTO `sf_guard_user_group` VALUES ('17', '4', '2011-03-31 02:40:56', '2011-03-31 02:40:56');

-- ----------------------------
-- Table structure for `sf_guard_user_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_permission`;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_category`
-- ----------------------------
DROP TABLE IF EXISTS `wac_category`;
CREATE TABLE `wac_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `position` bigint(20) unsigned NOT NULL DEFAULT '0',
  `left_number` bigint(20) unsigned NOT NULL DEFAULT '0',
  `right_number` bigint(20) unsigned NOT NULL DEFAULT '0',
  `level` bigint(20) unsigned NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `memo` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`parent_id`),
  KEY `Index_2` (`left_number`),
  KEY `Index_3` (`right_number`),
  KEY `Index_4` (`code`),
  KEY `Index_5` (`name`),
  KEY `Index_6` (`created_at`),
  KEY `Index_7` (`user_id`),
  KEY `Index_8` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_category
-- ----------------------------
INSERT INTO `wac_category` VALUES ('1', '0', '0', '1', '16', '0', 'ROOT', null, '1', 'ROOT', 'ROOT', 'root', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:15', '0000-00-00 00:00:00');
INSERT INTO `wac_category` VALUES ('2', '1', '0', '2', '15', '1', null, null, '1', null, '我的分类', 'root', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:15', '2011-03-22 03:04:51');
INSERT INTO `wac_category` VALUES ('7', '2', '0', '3', '14', '2', null, null, '1', null, 'A1', 'branch', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:15', '2011-03-30 10:46:06');
INSERT INTO `wac_category` VALUES ('13', '0', '0', '1', '4', '0', 'root_17', null, '17', 'root_17', 'Root', 'root', null, '0', '0', null, null, '50', '1', '2011-03-31 02:40:56', '2011-03-31 02:40:56');
INSERT INTO `wac_category` VALUES ('14', '13', '0', '2', '3', '1', 'branch_17_1', null, '17', 'branch_17_1', 'My Branch 1', 'branch', null, '0', '0', null, null, '50', '1', '2011-03-31 02:40:57', '2011-03-31 02:40:57');
INSERT INTO `wac_category` VALUES ('15', '19', '1', '11', '12', '4', null, null, '1', null, '999', 'leaf', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:16', '2011-04-22 07:58:40');
INSERT INTO `wac_category` VALUES ('16', '7', '0', '4', '7', '3', null, null, '1', null, 'New node', 'branch', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:13', '2011-04-01 08:26:57');
INSERT INTO `wac_category` VALUES ('17', '19', '0', '9', '10', '4', null, null, '1', null, '88', 'leaf', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:13', '2011-04-19 10:54:59');
INSERT INTO `wac_category` VALUES ('18', '2', '1', '7', '14', '2', null, null, '1', null, 'a', 'branch', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:15', '2011-04-18 11:07:17');
INSERT INTO `wac_category` VALUES ('19', '18', '0', '8', '13', '3', null, null, '1', null, 'B1', 'branch', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:15', '2011-04-18 11:07:23');

-- ----------------------------
-- Table structure for `wac_country`
-- ----------------------------
DROP TABLE IF EXISTS `wac_country`;
CREATE TABLE `wac_country` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `iso_code2` varchar(255) DEFAULT NULL,
  `iso_code3` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`name`),
  KEY `Index_4` (`iso_code2`),
  KEY `Index_5` (`iso_code3`),
  KEY `Index_6` (`code`),
  KEY `Index_2` (`priority`),
  KEY `Index_3` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_country
-- ----------------------------
INSERT INTO `wac_country` VALUES ('1', null, null, 'CHN', '中国', null, '', '0', '0', null, null, '50', '1', '2010-01-24 05:30:00', '2010-01-24 05:30:00');
INSERT INTO `wac_country` VALUES ('2', null, null, 'USA', '美国', null, '', '0', '0', null, null, '50', '1', '2011-03-01 07:42:50', '2011-03-01 07:43:14');
INSERT INTO `wac_country` VALUES ('5', null, null, 'ENG', '英国', null, '', '0', '0', null, null, '50', '1', '2011-01-27 08:58:12', '2011-01-27 08:58:36');
INSERT INTO `wac_country` VALUES ('6', null, null, 'tt9', 't19', null, 'tt91', '0', '0', null, null, '50', '0', '2011-04-07 06:28:34', '2011-04-07 06:28:58');

-- ----------------------------
-- Table structure for `wac_currency`
-- ----------------------------
DROP TABLE IF EXISTS `wac_currency`;
CREATE TABLE `wac_currency` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbo_left` varchar(255) DEFAULT NULL,
  `symbo_right` varchar(255) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_currency
-- ----------------------------
INSERT INTO `wac_currency` VALUES ('1', '元', 'RMB', null, null, null, '0', '0', null, null, '50', '1', '2010-02-03 18:22:50', '2010-02-03 18:22:50');

-- ----------------------------
-- Table structure for `wac_currency_ratio`
-- ----------------------------
DROP TABLE IF EXISTS `wac_currency_ratio`;
CREATE TABLE `wac_currency_ratio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `from_currency_code` varchar(255) DEFAULT NULL,
  `to_currency_code` varchar(255) DEFAULT NULL,
  `ratio` float DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`from_currency_code`),
  KEY `Index_2` (`to_currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_currency_ratio
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_file`
-- ----------------------------
DROP TABLE IF EXISTS `wac_file`;
CREATE TABLE `wac_file` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `position` bigint(20) unsigned NOT NULL DEFAULT '0',
  `left_number` bigint(20) unsigned NOT NULL DEFAULT '0',
  `right_number` bigint(20) unsigned NOT NULL DEFAULT '0',
  `level` bigint(20) unsigned NOT NULL DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `size` int(10) unsigned DEFAULT '0',
  `memo` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`parent_id`),
  KEY `Index_2` (`left_number`),
  KEY `Index_3` (`right_number`),
  KEY `Index_4` (`code`),
  KEY `Index_5` (`name`),
  KEY `Index_6` (`created_at`),
  KEY `Index_7` (`user_id`),
  KEY `Index_8` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_file
-- ----------------------------
INSERT INTO `wac_file` VALUES ('1', '0', '0', '1', '32', '0', 'root', '1', 'ROOT', 'ROOT', 'ROOT', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '0000-00-00 00:00:00');
INSERT INTO `wac_file` VALUES ('2', '1', '0', '2', '17', '1', 'root', '1', null, null, 'A:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-03-04 08:02:04');
INSERT INTO `wac_file` VALUES ('3', '1', '1', '18', '29', '1', 'root', '1', null, null, 'B:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-03-04 10:28:32');
INSERT INTO `wac_file` VALUES ('4', '1', '2', '30', '31', '1', 'root', '1', null, null, 'C:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '0000-00-00 00:00:00');
INSERT INTO `wac_file` VALUES ('50', '53', '3', '30', '31', '3', 'leaf', '1', null, 'p15ru0afqbh8f1mlh1sem1j241rch3.zip', 'aports.zip', '0/a/', 'application/zip', '118066', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-04-22 07:59:03');
INSERT INTO `wac_file` VALUES ('53', '3', '0', '19', '28', '2', 'branch', '1', null, null, 'B1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-03-28 10:35:09');
INSERT INTO `wac_file` VALUES ('56', '0', '0', '1', '10', '0', 'root', '17', 'root_17', 'root_17', 'Root', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 02:40:57');
INSERT INTO `wac_file` VALUES ('57', '56', '0', '2', '9', '1', 'branch', '17', 'branch_17_1', 'branch_17_1', 'My Branch 1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 02:40:57');
INSERT INTO `wac_file` VALUES ('58', '57', '0', '3', '8', '2', 'branch', '17', null, null, 'My Folder1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 04:02:06');
INSERT INTO `wac_file` VALUES ('59', '58', '0', '4', '5', '3', 'leaf', '17', null, 'p15s516ttm6gpkdglo1b0nunj3.zip', 'aports.zip', '1/6/', 'application/zip', '118066', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:24', '2011-03-31 04:02:24');
INSERT INTO `wac_file` VALUES ('60', '58', '1', '6', '7', '3', 'leaf', '17', null, 'p15s516ttmfmm1jip11um1ltamk34.zip', 'Bat_To_Exe_Converter.zip', '1/6/', 'application/zip', '102081', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:28', '2011-03-31 04:02:28');
INSERT INTO `wac_file` VALUES ('69', '2', '1', '5', '16', '2', 'branch', '1', null, null, 'C1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('70', '69', '0', '6', '7', '3', 'leaf', '1', null, 'p15t4jdpbecmjh0v12gcm3flt43.zip', 'BcompilerGUI win.zip', 'j/d/', 'application/zip', '89775', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('71', '69', '1', '8', '9', '3', 'leaf', '1', null, 'p15t4jee9n1v8715c61bel1r81orf4.zip', 'BullzipPDFPrinter_7_1_0_1195.zip', 'j/e/', 'application/zip', '1085199', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('72', '69', '2', '10', '11', '3', 'leaf', '1', null, 'p15t4jf0qcku41vr13qavk51k3m5.zip', 'magento99-1.4.2.0.zip', 'j/f/', 'application/zip', '105567', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('73', '69', '3', '12', '13', '3', 'leaf', '1', null, 'p15tcauuaeilu1c1cblf1ep91thi3.zip', 'memcached-1.2.6-win32-bin.zip', 'a/u/', 'application/zip', '9222', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('74', '69', '4', '14', '15', '3', 'leaf', '1', null, 'p15tcauuaejkr3s61cts1rc78054.zip', 'mongo-1.1.0.zip', 'a/u/', 'application/zip', '110292', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:32', '2011-04-18 11:09:56');
INSERT INTO `wac_file` VALUES ('75', '2', '0', '3', '4', '2', 'leaf', '1', null, 'p15tk4po80vjg1b8ehu114fe1vs73.zip', 'magmi_0.7.8.zip', '4/p/', 'application/zip', '28180', null, '0', '0', null, null, '50', '1', '2011-04-18 11:09:27', '2011-04-18 11:09:51');
INSERT INTO `wac_file` VALUES ('76', '53', '0', '20', '21', '3', 'leaf', '1', null, 'p15tk4po80co412802dh1hsk1shi4.zip', 'memcached-1.2.6-win32-bin.zip', '4/p/', 'application/zip', '9222', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-04-18 11:09:30');
INSERT INTO `wac_file` VALUES ('77', '53', '1', '24', '25', '3', 'leaf', '1', null, 'p15tmmapvh1h11hgof6e127v44i3.zip', 'aports.zip', 'm/a/', 'application/zip', '118066', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-04-19 10:54:19');
INSERT INTO `wac_file` VALUES ('78', '53', '2', '24', '29', '3', 'leaf', '1', null, 'p15tmmapvh1eth7kdsvn1k6n1hie4.zip', 'Bat_To_Exe_Converter.zip', 'm/a/', 'application/zip', '102081', null, '0', '0', null, null, '50', '1', '2011-04-22 07:58:39', '2011-04-19 10:54:26');

-- ----------------------------
-- Table structure for `wac_sysmsg`
-- ----------------------------
DROP TABLE IF EXISTS `wac_sysmsg`;
CREATE TABLE `wac_sysmsg` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`priority`),
  KEY `Index_3` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_sysmsg
-- ----------------------------
INSERT INTO `wac_sysmsg` VALUES ('1', 'sys_add_succ', '', '添加成功!', '0', '0', null, null, '50', '1', '2010-02-04 23:06:28', '2010-02-04 23:06:28');
INSERT INTO `wac_sysmsg` VALUES ('2', 'sys_edit_succ', '', '修改成功!', '0', '0', null, null, '50', '1', '2010-02-05 01:30:38', '2010-02-05 01:30:38');
INSERT INTO `wac_sysmsg` VALUES ('3', 'sys_del_succ', '', '删除成功!', '0', '0', null, null, '50', '1', '2010-02-05 01:30:57', '2010-02-05 01:30:57');
INSERT INTO `wac_sysmsg` VALUES ('4', 'sys_err_goods_category_not_existed', '', '错误, 不存在的货物品种!', '0', '0', null, null, '50', '1', '2010-02-09 03:22:26', '2010-02-08 19:22:26');
INSERT INTO `wac_sysmsg` VALUES ('5', 'sys_err_invalid_production_order', '', '错误, 请输入有效生产单!', '0', '0', null, null, '50', '1', '2010-03-14 03:11:13', '2010-02-08 19:22:11');
INSERT INTO `wac_sysmsg` VALUES ('6', 'sys_err_invalid_factory', '', '错误, 请输入有效工厂!', '0', '0', null, null, '50', '1', '2010-02-09 03:22:19', '2010-02-08 19:22:19');
INSERT INTO `wac_sysmsg` VALUES ('7', 'sys_err_invalid_cotton_order', '', '错误, 请输入有效棉纱单!', '0', '0', null, null, '50', '1', '2010-02-16 23:21:55', '2010-02-16 23:21:55');
INSERT INTO `wac_sysmsg` VALUES ('8', 'sys_err_invalid_dye_order', '', '错误, 请输入有效浆染单!', '0', '0', null, null, '50', '1', '2010-02-16 23:22:19', '2010-02-16 23:22:19');
INSERT INTO `wac_sysmsg` VALUES ('9', 'sys_err_invalid_weave_order', '', '错误, 请输入有效织造单!', '0', '0', null, null, '50', '1', '2010-02-16 23:22:40', '2010-02-16 23:22:40');
INSERT INTO `wac_sysmsg` VALUES ('10', 'sys_err_invalid_clean_up_form', '', '错误, 请输入有效后整单!', '0', '0', null, null, '50', '1', '2010-06-09 10:24:35', '2010-02-16 23:23:16');
INSERT INTO `wac_sysmsg` VALUES ('11', 'sys_err_invalid_final_order', '', '错误, 请输入有效成品单!', '0', '0', null, null, '50', '1', '2010-02-16 23:24:50', '2010-02-16 23:24:50');
INSERT INTO `wac_sysmsg` VALUES ('12', 'sys_err_invalid_goods_category', '', '错误, 请输入有效货物品种!', '0', '0', null, null, '50', '1', '2010-02-17 00:07:48', '2010-02-17 00:07:48');
INSERT INTO `wac_sysmsg` VALUES ('13', 'sys_log_add', '', '%s 添加了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:16', '2010-02-17 02:04:16');
INSERT INTO `wac_sysmsg` VALUES ('14', 'sys_log_edit', '', '%s 编辑了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:18', '2010-02-17 02:04:18');
INSERT INTO `wac_sysmsg` VALUES ('15', 'sys_log_delete', '', '%s 删除了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:00', '2010-02-17 02:04:00');
INSERT INTO `wac_sysmsg` VALUES ('16', 'sys_err_invalid_supplier', '', '错误, 请输入有效供应厂商!', '0', '0', null, null, '50', '1', '2010-02-20 02:36:45', '2010-02-20 02:36:45');
INSERT INTO `wac_sysmsg` VALUES ('17', 'sys_err_invalid_color', null, '错误, 请输入有效颜色!', '0', '0', null, null, '50', '1', '2010-02-22 10:33:40', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('18', 'sys_err_invalid_jar', null, '错误, 请输入有效缸号!', '0', '0', null, null, '50', '1', '2010-02-22 10:34:00', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('19', 'sys_err_invalid_axis', null, '错误, 请输入有效轴号!', '0', '0', null, null, '50', '1', '2010-02-22 10:34:53', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('20', 'sys_err_invalid_cotton_goods_category', null, '错误, 请输入有效棉纱品种!', '0', '0', null, null, '50', '1', '2010-02-23 02:20:35', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('21', 'sys_audit_succ', '', '审核操作完成!', '0', '0', null, null, '50', '1', '2010-02-23 18:24:22', '2010-02-23 18:24:22');
INSERT INTO `wac_sysmsg` VALUES ('22', 'sys_err_invaild_audit_status', '', '错误, 审核操作无效! \r\n请检查本单是否已审核?', '0', '0', null, null, '50', '1', '2010-02-25 08:42:50', '2010-02-23 18:26:46');
INSERT INTO `wac_sysmsg` VALUES ('23', 'sys_err_invaild_audit_zero_item', '', '错误, 审核操作无效! \r\n请检查本单是否存在输入子项?', '0', '0', null, null, '50', '1', '2010-02-25 08:42:54', '2010-02-24 19:41:12');
INSERT INTO `wac_sysmsg` VALUES ('24', 'sys_err_invalid_spinner', null, '错误, 请输入有效纺织机号!', '0', '0', null, null, '50', '1', '2010-02-26 04:19:30', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('25', 'sys_invalid_user_authenticate', '', '错误, 无效的用户验证!', '0', '0', null, null, '50', '1', '2010-03-03 19:48:22', '2010-03-03 19:48:22');
INSERT INTO `wac_sysmsg` VALUES ('26', 'sys_err_invalid_customer_order', '', '错误, 请输入有效订单!', '0', '0', null, null, '50', '1', '2010-03-13 19:12:01', '2010-03-13 19:12:01');
INSERT INTO `wac_sysmsg` VALUES ('27', 'sys_err_invalid_customer', '', '错误, 请输入有效客户!', '0', '0', null, null, '50', '1', '2010-04-07 06:51:15', '2010-04-06 22:51:15');
INSERT INTO `wac_sysmsg` VALUES ('28', 'sys_err_sample_jar_not_existed', null, '错误, 请输入有效封样缸号!', '0', '0', null, null, '50', '1', '2010-03-25 03:34:57', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('29', 'sys_err_invalid_storehouse', '', '错误, 请输入有效仓库!', '0', '0', null, null, '50', '1', '2010-04-07 06:51:06', '2010-04-06 22:51:06');
INSERT INTO `wac_sysmsg` VALUES ('30', 'sys_err_goods_number_insufficient_in_factory', null, '错误, \'%s\' 存量不足!  [现有数量%s,消耗数量%s]', '0', '0', null, null, '50', '1', '2010-04-08 08:48:12', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('31', 'sys_log_audit', null, '%s 审核了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-04-07 08:46:44', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('32', 'sys_err_predefined_class_delete', null, '错误, 此分类为系统预定义的必须项,禁止删除!', '0', '0', null, null, '50', '1', '2010-05-18 06:36:38', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('33', 'sys_err_predefined_class_edit', null, '错误, 此分类为系统预定义的必须项,编码禁止更改!', '0', '0', null, null, '50', '1', '2010-05-18 07:22:42', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('34', 'sys_err_invaild_target', '', '错误, 请输入有效目的地!', '0', '0', null, null, '50', '1', '2010-06-22 14:39:41', '2010-06-22 14:39:41');
INSERT INTO `wac_sysmsg` VALUES ('35', 'sys_err_invalid_dispatch_order', '', '错误, 请输入有效出仓单!', '0', '0', null, null, '50', '1', '2010-08-19 09:28:33', '2010-08-19 09:28:33');
INSERT INTO `wac_sysmsg` VALUES ('36', 'sys_err_dispatch_order_qc_only_once', '', '错误, 此出货单已存在QC记录, 请复查以往QC单!', '0', '0', null, null, '50', '1', '2010-09-01 03:10:10', '2010-09-01 03:08:26');

-- ----------------------------
-- Table structure for `wac_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `wac_system_log`;
CREATE TABLE `wac_system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `content` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`updated_at`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_log
-- ----------------------------
INSERT INTO `wac_system_log` VALUES ('1', '1', '2', 'admin 添加了 用户权限, (id为 32)', '0', '0', null, null, '50', '1', '2010-09-06 07:18:47', '2010-09-06 07:18:47');
INSERT INTO `wac_system_log` VALUES ('2', '1', '2', 'admin 添加了 订单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:35', '2010-09-06 07:20:35');
INSERT INTO `wac_system_log` VALUES ('3', '1', '2', 'admin 添加了 订单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:43', '2010-09-06 07:20:43');
INSERT INTO `wac_system_log` VALUES ('4', '1', '2', 'admin 添加了 生产单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:22:41', '2010-09-06 07:22:41');
INSERT INTO `wac_system_log` VALUES ('5', '1', '2', 'admin 添加了 生产单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:23:00', '2010-09-06 07:23:00');
INSERT INTO `wac_system_log` VALUES ('6', '1', '2', 'admin 添加了 棉纱单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:02', '2010-09-06 07:24:02');
INSERT INTO `wac_system_log` VALUES ('7', '1', '2', 'admin 添加了 棉纱单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:21', '2010-09-06 07:24:21');
INSERT INTO `wac_system_log` VALUES ('8', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:50', '2010-09-06 07:24:50');
INSERT INTO `wac_system_log` VALUES ('9', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:25:09', '2010-09-06 07:25:09');
INSERT INTO `wac_system_log` VALUES ('10', '1', '2', 'admin 添加了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:26:57', '2010-09-06 07:26:57');
INSERT INTO `wac_system_log` VALUES ('11', '1', '2', 'admin 添加了 浆染单项目, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:27:45', '2010-09-06 07:27:45');
INSERT INTO `wac_system_log` VALUES ('12', '1', '2', 'admin 添加了 浆染单项目, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:02', '2010-09-06 07:28:02');
INSERT INTO `wac_system_log` VALUES ('13', '1', '2', 'admin 审核了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:16', '2010-09-06 07:28:16');
INSERT INTO `wac_system_log` VALUES ('14', '1', '2', 'admin 添加了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:48', '2010-09-06 07:28:48');
INSERT INTO `wac_system_log` VALUES ('15', '1', '2', 'admin 添加了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:53', '2010-09-06 07:35:53');
INSERT INTO `wac_system_log` VALUES ('16', '1', '2', 'admin 审核了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:58', '2010-09-06 07:35:58');
INSERT INTO `wac_system_log` VALUES ('17', '1', '2', 'admin 添加了 织造单子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:28', '2010-09-06 07:38:28');
INSERT INTO `wac_system_log` VALUES ('18', '1', '2', 'admin 审核了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:34', '2010-09-06 07:38:34');
INSERT INTO `wac_system_log` VALUES ('19', '1', '2', 'admin 编辑了 权限管理, (id为 26)', '0', '0', null, null, '50', '1', '2010-09-23 08:23:40', '2010-09-23 08:23:40');
INSERT INTO `wac_system_log` VALUES ('20', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:46:47', '2010-10-04 07:46:47');
INSERT INTO `wac_system_log` VALUES ('21', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:47:50', '2010-10-04 07:47:50');
INSERT INTO `wac_system_log` VALUES ('22', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:49:12', '2010-10-04 07:49:12');
INSERT INTO `wac_system_log` VALUES ('23', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:50:13', '2010-10-04 07:50:13');
INSERT INTO `wac_system_log` VALUES ('24', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:54:53', '2010-10-04 07:54:53');
INSERT INTO `wac_system_log` VALUES ('25', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:55:37', '2010-10-04 07:55:37');
INSERT INTO `wac_system_log` VALUES ('26', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:56:20', '2010-10-04 07:56:20');
INSERT INTO `wac_system_log` VALUES ('27', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:59:51', '2010-10-04 07:59:51');
INSERT INTO `wac_system_log` VALUES ('28', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:00:29', '2010-10-04 08:00:29');
INSERT INTO `wac_system_log` VALUES ('29', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:10', '2010-10-04 08:01:10');
INSERT INTO `wac_system_log` VALUES ('30', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:48', '2010-10-04 08:01:48');
INSERT INTO `wac_system_log` VALUES ('31', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:03:08', '2010-10-04 08:03:08');
INSERT INTO `wac_system_log` VALUES ('32', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:07:42', '2010-10-04 08:07:42');
INSERT INTO `wac_system_log` VALUES ('33', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:08:29', '2010-10-04 08:08:29');
INSERT INTO `wac_system_log` VALUES ('34', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:10:59', '2010-10-04 08:10:59');
INSERT INTO `wac_system_log` VALUES ('35', '1', '2', 'admin 添加了 用户管理, (id为 4)', '0', '0', null, null, '50', '1', '2010-10-04 08:17:10', '2010-10-04 08:17:10');
INSERT INTO `wac_system_log` VALUES ('36', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:18:55', '2010-10-04 08:18:55');
INSERT INTO `wac_system_log` VALUES ('37', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:08', '2010-10-04 08:19:08');
INSERT INTO `wac_system_log` VALUES ('38', '1', '2', 'admin 删除了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:21', '2010-10-04 08:19:21');
INSERT INTO `wac_system_log` VALUES ('39', '1', '2', 'admin 添加了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:13:51', '2010-12-30 08:13:51');
INSERT INTO `wac_system_log` VALUES ('40', '1', '2', 'admin 删除了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:15', '2010-12-30 08:20:15');
INSERT INTO `wac_system_log` VALUES ('41', '1', '2', 'admin 添加了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:51', '2010-12-30 08:20:51');
INSERT INTO `wac_system_log` VALUES ('42', '1', '2', 'admin 添加了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:22:38', '2010-12-30 08:22:38');
INSERT INTO `wac_system_log` VALUES ('43', '1', '2', 'admin 删除了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:23:09', '2010-12-30 08:23:09');
INSERT INTO `wac_system_log` VALUES ('44', '1', '2', 'admin 删除了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:40:20', '2010-12-30 08:40:20');
INSERT INTO `wac_system_log` VALUES ('45', '1', '2', 'admin 添加了 用户组管理, (id为 9)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO `wac_system_log` VALUES ('46', '1', '2', 'admin 添加了 用户组管理, (id为 10)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO `wac_system_log` VALUES ('47', '1', '2', 'admin 添加了 用户组管理, (id为 11)', '0', '0', null, null, '50', '1', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO `wac_system_log` VALUES ('48', '1', '2', 'admin 添加了 用户组管理, (id为 12)', '0', '0', null, null, '50', '1', '2010-12-30 08:55:06', '2010-12-30 08:55:06');
INSERT INTO `wac_system_log` VALUES ('49', '1', '2', 'admin 添加了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-03 07:20:10', '2011-01-03 07:20:10');
INSERT INTO `wac_system_log` VALUES ('50', '1', '2', 'admin 删除了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-04 10:29:42', '2011-01-04 10:29:42');
INSERT INTO `wac_system_log` VALUES ('51', '1', '2', 'admin 添加了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-01-04 10:30:06', '2011-01-04 10:30:06');
INSERT INTO `wac_system_log` VALUES ('52', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:34:27', '2011-01-04 10:34:27');
INSERT INTO `wac_system_log` VALUES ('53', '1', '2', 'admin 删除了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:05', '2011-01-04 10:35:05');
INSERT INTO `wac_system_log` VALUES ('54', '1', '2', 'admin 添加了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:20', '2011-01-04 10:35:20');
INSERT INTO `wac_system_log` VALUES ('55', '1', '2', 'admin 删除了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-05 06:10:51', '2011-01-05 06:10:51');
INSERT INTO `wac_system_log` VALUES ('56', '1', '2', 'admin 添加了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:23:56', '2011-01-06 03:23:56');
INSERT INTO `wac_system_log` VALUES ('57', '1', '2', 'admin 删除了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:31', '2011-01-06 03:25:31');
INSERT INTO `wac_system_log` VALUES ('58', '1', '2', 'admin 添加了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:54', '2011-01-06 03:25:54');
INSERT INTO `wac_system_log` VALUES ('59', '1', '2', 'admin 编辑了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:26:11', '2011-01-06 03:26:11');
INSERT INTO `wac_system_log` VALUES ('60', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:00', '2011-01-07 03:33:00');
INSERT INTO `wac_system_log` VALUES ('61', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:52', '2011-01-07 03:33:52');
INSERT INTO `wac_system_log` VALUES ('62', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:35:58', '2011-01-07 03:35:58');
INSERT INTO `wac_system_log` VALUES ('63', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:36:44', '2011-01-07 03:36:44');
INSERT INTO `wac_system_log` VALUES ('64', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:47:34', '2011-01-07 03:47:34');
INSERT INTO `wac_system_log` VALUES ('65', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:53:09', '2011-01-07 03:53:09');
INSERT INTO `wac_system_log` VALUES ('66', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:59:54', '2011-01-07 03:59:54');
INSERT INTO `wac_system_log` VALUES ('67', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:49', '2011-01-07 04:00:49');
INSERT INTO `wac_system_log` VALUES ('68', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:54', '2011-01-07 04:00:54');
INSERT INTO `wac_system_log` VALUES ('69', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:26:53', '2011-01-10 09:26:53');
INSERT INTO `wac_system_log` VALUES ('70', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:29:05', '2011-01-10 09:29:05');
INSERT INTO `wac_system_log` VALUES ('71', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:28', '2011-01-10 09:33:28');
INSERT INTO `wac_system_log` VALUES ('72', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:33', '2011-01-10 09:33:33');
INSERT INTO `wac_system_log` VALUES ('73', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:05', '2011-01-10 09:34:05');
INSERT INTO `wac_system_log` VALUES ('74', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:18', '2011-01-10 09:34:18');
INSERT INTO `wac_system_log` VALUES ('75', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:48:58', '2011-01-10 09:48:58');
INSERT INTO `wac_system_log` VALUES ('76', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:21', '2011-01-10 09:49:21');
INSERT INTO `wac_system_log` VALUES ('77', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:36', '2011-01-10 09:49:36');
INSERT INTO `wac_system_log` VALUES ('78', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:52:20', '2011-01-10 09:52:20');
INSERT INTO `wac_system_log` VALUES ('79', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:05:08', '2011-01-10 10:05:08');
INSERT INTO `wac_system_log` VALUES ('80', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:15:58', '2011-01-10 10:15:58');
INSERT INTO `wac_system_log` VALUES ('81', '1', '2', 'admin 添加了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:16:39', '2011-01-10 10:16:39');
INSERT INTO `wac_system_log` VALUES ('82', '1', '2', 'admin 编辑了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:19', '2011-01-10 10:17:19');
INSERT INTO `wac_system_log` VALUES ('83', '1', '2', 'admin 删除了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:29', '2011-01-10 10:17:29');
INSERT INTO `wac_system_log` VALUES ('84', '1', '2', 'admin 添加了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:45:08', '2011-01-10 10:45:08');
INSERT INTO `wac_system_log` VALUES ('85', '1', '2', 'admin 编辑了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:46:15', '2011-01-10 10:46:15');
INSERT INTO `wac_system_log` VALUES ('86', '1', '2', 'admin 删除了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:00', '2011-01-10 10:47:00');
INSERT INTO `wac_system_log` VALUES ('87', '1', '2', 'admin 添加了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:15', '2011-01-10 10:47:15');
INSERT INTO `wac_system_log` VALUES ('88', '1', '2', 'admin 添加了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:29', '2011-01-10 10:53:29');
INSERT INTO `wac_system_log` VALUES ('89', '1', '2', 'admin 删除了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:48', '2011-01-10 10:53:48');
INSERT INTO `wac_system_log` VALUES ('90', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:45:54', '2011-01-21 10:45:54');
INSERT INTO `wac_system_log` VALUES ('91', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:00', '2011-01-21 10:46:00');
INSERT INTO `wac_system_log` VALUES ('92', '1', '2', 'admin 添加了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:11', '2011-01-21 10:46:11');
INSERT INTO `wac_system_log` VALUES ('93', '1', '2', 'admin 删除了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:25', '2011-01-21 10:46:25');
INSERT INTO `wac_system_log` VALUES ('94', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:59', '2011-01-21 10:46:59');
INSERT INTO `wac_system_log` VALUES ('95', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:47:13', '2011-01-21 10:47:13');
INSERT INTO `wac_system_log` VALUES ('96', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:07', '2011-01-21 10:48:07');
INSERT INTO `wac_system_log` VALUES ('97', '1', '2', 'admin 添加了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:12', '2011-01-21 10:48:12');
INSERT INTO `wac_system_log` VALUES ('98', '1', '2', 'admin 添加了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:15', '2011-01-21 10:48:15');
INSERT INTO `wac_system_log` VALUES ('99', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:31', '2011-01-21 10:48:31');
INSERT INTO `wac_system_log` VALUES ('100', '1', '2', 'admin 删除了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-21 10:52:13', '2011-01-21 10:52:13');
INSERT INTO `wac_system_log` VALUES ('101', '1', '2', 'admin 删除了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:07', '2011-01-21 10:54:07');
INSERT INTO `wac_system_log` VALUES ('102', '1', '2', 'admin 编辑了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:29', '2011-01-21 10:54:29');
INSERT INTO `wac_system_log` VALUES ('103', '1', '2', 'admin 删除了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:35', '2011-01-21 10:54:35');
INSERT INTO `wac_system_log` VALUES ('104', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:18', '2011-01-22 03:27:18');
INSERT INTO `wac_system_log` VALUES ('105', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:27', '2011-01-22 03:27:27');
INSERT INTO `wac_system_log` VALUES ('106', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:48:52', '2011-01-22 03:48:52');
INSERT INTO `wac_system_log` VALUES ('107', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:34', '2011-01-22 03:54:34');
INSERT INTO `wac_system_log` VALUES ('108', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:43', '2011-01-22 03:54:43');
INSERT INTO `wac_system_log` VALUES ('109', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:40', '2011-01-22 09:05:40');
INSERT INTO `wac_system_log` VALUES ('110', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:47', '2011-01-22 09:05:47');
INSERT INTO `wac_system_log` VALUES ('111', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:08:54', '2011-01-22 09:08:54');
INSERT INTO `wac_system_log` VALUES ('112', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:25', '2011-01-24 07:42:25');
INSERT INTO `wac_system_log` VALUES ('113', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:30', '2011-01-24 07:42:30');
INSERT INTO `wac_system_log` VALUES ('114', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:21', '2011-01-24 08:51:21');
INSERT INTO `wac_system_log` VALUES ('115', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:32', '2011-01-24 08:51:32');
INSERT INTO `wac_system_log` VALUES ('116', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:27', '2011-01-27 08:57:27');
INSERT INTO `wac_system_log` VALUES ('117', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:35', '2011-01-27 08:57:35');
INSERT INTO `wac_system_log` VALUES ('118', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:30', '2011-01-27 08:58:30');
INSERT INTO `wac_system_log` VALUES ('119', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:36', '2011-01-27 08:58:36');
INSERT INTO `wac_system_log` VALUES ('120', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:32', '2011-02-08 08:40:32');
INSERT INTO `wac_system_log` VALUES ('121', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:53', '2011-02-08 08:40:53');
INSERT INTO `wac_system_log` VALUES ('122', '1', '2', 'admin 编辑了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO `wac_system_log` VALUES ('123', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-25 08:39:05', '2011-02-25 08:39:05');
INSERT INTO `wac_system_log` VALUES ('124', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO `wac_system_log` VALUES ('125', '1', '2', 'admin 添加了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:44:57', '2011-02-25 08:44:57');
INSERT INTO `wac_system_log` VALUES ('126', '1', '2', 'admin 删除了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:46:56', '2011-02-25 08:46:56');
INSERT INTO `wac_system_log` VALUES ('127', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 08:45:40', '2011-02-28 08:45:40');
INSERT INTO `wac_system_log` VALUES ('128', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 09:45:52', '2011-02-28 09:45:52');
INSERT INTO `wac_system_log` VALUES ('129', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:39:37', '2011-03-01 07:39:37');
INSERT INTO `wac_system_log` VALUES ('130', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:02', '2011-03-01 07:43:02');
INSERT INTO `wac_system_log` VALUES ('131', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:15', '2011-03-01 07:43:15');
INSERT INTO `wac_system_log` VALUES ('132', '1', '2', 'admin 删除了 系统参数, (id为 13,11,10,9,8,7,6,5,4,3,2)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:26', '2011-03-01 07:45:26');
INSERT INTO `wac_system_log` VALUES ('133', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:46', '2011-03-01 07:45:46');
INSERT INTO `wac_system_log` VALUES ('134', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:47:54', '2011-03-01 07:47:54');
INSERT INTO `wac_system_log` VALUES ('135', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:06', '2011-03-01 07:51:06');
INSERT INTO `wac_system_log` VALUES ('136', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:38', '2011-03-01 07:51:38');
INSERT INTO `wac_system_log` VALUES ('137', '1', '2', 'admin 添加了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 07:53:11', '2011-03-01 07:53:11');
INSERT INTO `wac_system_log` VALUES ('138', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 08:08:06', '2011-03-01 08:08:06');
INSERT INTO `wac_system_log` VALUES ('139', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 08:56:14', '2011-03-01 08:56:14');
INSERT INTO `wac_system_log` VALUES ('140', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:50', '2011-03-01 09:01:50');
INSERT INTO `wac_system_log` VALUES ('141', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:57', '2011-03-01 09:01:57');
INSERT INTO `wac_system_log` VALUES ('142', '1', '2', 'admin 添加了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-29 10:19:38', '2011-03-29 10:19:38');
INSERT INTO `wac_system_log` VALUES ('143', '1', '2', 'admin 编辑了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-29 10:20:36', '2011-03-29 10:20:36');
INSERT INTO `wac_system_log` VALUES ('144', '1', '2', 'admin 删除了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-03-29 10:20:54', '2011-03-29 10:20:54');
INSERT INTO `wac_system_log` VALUES ('145', '1', '2', 'admin 添加了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-29 10:26:23', '2011-03-29 10:26:23');
INSERT INTO `wac_system_log` VALUES ('146', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO `wac_system_log` VALUES ('147', '1', '2', 'admin 添加了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:19', '2011-03-29 10:30:19');
INSERT INTO `wac_system_log` VALUES ('148', '1', '2', 'admin 编辑了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:46', '2011-03-29 10:30:46');
INSERT INTO `wac_system_log` VALUES ('149', '1', '2', 'admin 删除了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:55', '2011-03-29 10:30:55');
INSERT INTO `wac_system_log` VALUES ('150', '1', '2', 'admin 添加了 用户管理, (id为 7)', '0', '0', null, null, '50', '1', '2011-03-30 03:39:45', '2011-03-30 03:39:45');
INSERT INTO `wac_system_log` VALUES ('151', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2011-03-30 03:39:54', '2011-03-30 03:39:54');
INSERT INTO `wac_system_log` VALUES ('152', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-30 03:40:28', '2011-03-30 03:40:28');
INSERT INTO `wac_system_log` VALUES ('153', '1', '2', 'admin 添加了 用户管理, (id为 8)', '0', '0', null, null, '50', '1', '2011-03-30 08:47:10', '2011-03-30 08:47:10');
INSERT INTO `wac_system_log` VALUES ('154', '1', '2', 'admin 删除了 用户管理, (id为 8)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:27', '2011-03-30 09:18:27');
INSERT INTO `wac_system_log` VALUES ('155', '1', '2', 'admin 删除了 用户管理, (id为 7)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:32', '2011-03-30 09:18:32');
INSERT INTO `wac_system_log` VALUES ('156', '1', '2', 'admin 删除了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:37', '2011-03-30 09:18:37');
INSERT INTO `wac_system_log` VALUES ('157', '1', '2', 'admin 删除了 用户管理, (id为 4)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:42', '2011-03-30 09:18:42');
INSERT INTO `wac_system_log` VALUES ('158', '1', '2', 'admin 删除了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:47', '2011-03-30 09:18:47');
INSERT INTO `wac_system_log` VALUES ('159', '1', '2', 'admin 删除了 用户管理, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:52', '2011-03-30 09:18:52');
INSERT INTO `wac_system_log` VALUES ('160', '1', '2', 'admin 添加了 用户管理, (id为 9)', '0', '0', null, null, '50', '1', '2011-03-30 09:19:27', '2011-03-30 09:19:27');
INSERT INTO `wac_system_log` VALUES ('161', '1', '2', 'admin 添加了 用户管理, (id为 10)', '0', '0', null, null, '50', '1', '2011-03-30 09:19:46', '2011-03-30 09:19:46');
INSERT INTO `wac_system_log` VALUES ('162', '1', '2', 'admin 删除了 用户管理, (id为 10)', '0', '0', null, null, '50', '1', '2011-03-30 09:36:46', '2011-03-30 09:36:46');
INSERT INTO `wac_system_log` VALUES ('163', '1', '2', 'admin 删除了 用户管理, (id为 9)', '0', '0', null, null, '50', '1', '2011-03-30 09:36:51', '2011-03-30 09:36:51');
INSERT INTO `wac_system_log` VALUES ('164', '1', '2', 'admin 添加了 用户管理, (id为 11)', '0', '0', null, null, '50', '1', '2011-03-30 09:37:10', '2011-03-30 09:37:10');
INSERT INTO `wac_system_log` VALUES ('165', '1', '2', 'admin 添加了 用户管理, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-30 09:37:24', '2011-03-30 09:37:24');
INSERT INTO `wac_system_log` VALUES ('166', '1', '2', 'admin 删除了 用户管理, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-30 10:26:02', '2011-03-30 10:26:02');
INSERT INTO `wac_system_log` VALUES ('167', '1', '2', 'admin 删除了 用户管理, (id为 11)', '0', '0', null, null, '50', '1', '2011-03-30 10:26:07', '2011-03-30 10:26:07');
INSERT INTO `wac_system_log` VALUES ('168', '1', '2', 'admin 添加了 用户管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-03-30 10:31:30', '2011-03-30 10:31:30');
INSERT INTO `wac_system_log` VALUES ('169', '1', '2', 'admin 删除了 用户管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-03-30 10:43:13', '2011-03-30 10:43:13');
INSERT INTO `wac_system_log` VALUES ('170', '1', '2', 'admin 添加了 用户管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-30 10:44:21', '2011-03-30 10:44:21');
INSERT INTO `wac_system_log` VALUES ('171', '1', '2', 'admin 删除了 用户管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-31 02:34:46', '2011-03-31 02:34:46');
INSERT INTO `wac_system_log` VALUES ('172', '1', '2', 'admin 删除了 用户管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-03-31 02:38:45', '2011-03-31 02:38:45');
INSERT INTO `wac_system_log` VALUES ('173', '1', '2', 'admin 删除了 用户管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-31 02:40:43', '2011-03-31 02:40:43');
INSERT INTO `wac_system_log` VALUES ('174', '1', '2', 'admin 添加了 用户管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-03-31 02:40:57', '2011-03-31 02:40:57');
INSERT INTO `wac_system_log` VALUES ('175', '1', '2', 'admin 添加了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-06 09:34:21', '2011-04-06 09:34:21');
INSERT INTO `wac_system_log` VALUES ('176', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:52:39', '2011-04-07 02:52:39');
INSERT INTO `wac_system_log` VALUES ('177', '1', '2', 'admin 编辑了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:52:55', '2011-04-07 02:52:55');
INSERT INTO `wac_system_log` VALUES ('178', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:53:41', '2011-04-07 02:53:41');
INSERT INTO `wac_system_log` VALUES ('179', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:55:06', '2011-04-07 03:55:06');
INSERT INTO `wac_system_log` VALUES ('180', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:56:26', '2011-04-07 03:56:26');
INSERT INTO `wac_system_log` VALUES ('181', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:56:34', '2011-04-07 03:56:34');
INSERT INTO `wac_system_log` VALUES ('182', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 06:28:51', '2011-04-07 06:28:51');
INSERT INTO `wac_system_log` VALUES ('183', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 06:28:58', '2011-04-07 06:28:58');
INSERT INTO `wac_system_log` VALUES ('184', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-07 06:29:11', '2011-04-07 06:29:11');
INSERT INTO `wac_system_log` VALUES ('185', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-07 06:29:17', '2011-04-07 06:29:17');
INSERT INTO `wac_system_log` VALUES ('186', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-04-07 08:36:06', '2011-04-07 08:36:06');
INSERT INTO `wac_system_log` VALUES ('187', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:55:51', '2011-04-11 02:55:51');
INSERT INTO `wac_system_log` VALUES ('188', '1', '2', 'admin 编辑了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:55:59', '2011-04-11 02:55:59');
INSERT INTO `wac_system_log` VALUES ('189', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:56:05', '2011-04-11 02:56:05');
INSERT INTO `wac_system_log` VALUES ('190', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:44', '2011-04-11 03:10:44');
INSERT INTO `wac_system_log` VALUES ('191', '1', '2', 'admin 编辑了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:53', '2011-04-11 03:10:53');
INSERT INTO `wac_system_log` VALUES ('192', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:56', '2011-04-11 03:10:56');
INSERT INTO `wac_system_log` VALUES ('193', '1', '2', 'admin 添加了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 05:42:33', '2011-04-11 05:42:33');
INSERT INTO `wac_system_log` VALUES ('194', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:33', '2011-04-11 06:02:33');
INSERT INTO `wac_system_log` VALUES ('195', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:48', '2011-04-11 06:02:48');
INSERT INTO `wac_system_log` VALUES ('196', '1', '2', 'admin 删除了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:54', '2011-04-11 06:02:54');
INSERT INTO `wac_system_log` VALUES ('197', '1', '2', 'admin 添加了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-04-11 06:37:58', '2011-04-11 06:37:58');
INSERT INTO `wac_system_log` VALUES ('198', '1', '2', 'admin 删除了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-04-11 06:50:11', '2011-04-11 06:50:11');
INSERT INTO `wac_system_log` VALUES ('199', '1', '2', 'admin 添加了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 07:43:40', '2011-04-11 07:43:40');
INSERT INTO `wac_system_log` VALUES ('200', '1', '2', 'admin 删除了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 07:45:44', '2011-04-11 07:45:44');
INSERT INTO `wac_system_log` VALUES ('201', '1', '2', 'admin 添加了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:45:59', '2011-04-11 07:45:59');
INSERT INTO `wac_system_log` VALUES ('202', '1', '2', 'admin 编辑了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:46:13', '2011-04-11 07:46:13');
INSERT INTO `wac_system_log` VALUES ('203', '1', '2', 'admin 删除了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:46:19', '2011-04-11 07:46:19');
INSERT INTO `wac_system_log` VALUES ('204', '1', '2', 'admin 编辑了 权限管理, (id为 32)', '0', '0', null, null, '50', '1', '2011-04-11 07:55:10', '2011-04-11 07:55:10');

-- ----------------------------
-- Table structure for `wac_system_parameter`
-- ----------------------------
DROP TABLE IF EXISTS `wac_system_parameter`;
CREATE TABLE `wac_system_parameter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_parameter
-- ----------------------------
INSERT INTO `wac_system_parameter` VALUES ('1', '货币', 'default/system/currency', '0', 'RMB', '0', '0', null, null, '50', '1', '2011-03-01 07:51:14', '2011-03-01 07:51:38');
INSERT INTO `wac_system_parameter` VALUES ('12', '打印模块-本公司名称', 'default/print/company_name', '0', 'KK有限公司', '0', '0', null, null, '50', '1', '2011-03-01 09:01:26', '2011-03-01 09:01:50');
INSERT INTO `wac_system_parameter` VALUES ('14', 'test', 'test', '2', '5.111', '0', '0', null, null, '50', '1', '2011-04-07 08:35:42', '2011-04-07 08:36:06');

-- ----------------------------
-- Table structure for `wac_template`
-- ----------------------------
DROP TABLE IF EXISTS `wac_template`;
CREATE TABLE `wac_template` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_3` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_template
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_unit`
-- ----------------------------
DROP TABLE IF EXISTS `wac_unit`;
CREATE TABLE `wac_unit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`name`),
  KEY `Index_3` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_unit
-- ----------------------------
INSERT INTO `wac_unit` VALUES ('1', '米', 'unit_meter', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:29:58', '2010-01-16 18:29:58');
INSERT INTO `wac_unit` VALUES ('2', '公斤', 'unit_kilogram', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:47:42', '2010-01-16 18:47:42');
INSERT INTO `wac_unit` VALUES ('3', '吨', 'unit_ton', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:48:07', '2010-01-16 18:48:07');
INSERT INTO `wac_unit` VALUES ('4', '平方米', 'unit_square', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:51:56', '2010-01-16 18:51:56');
INSERT INTO `wac_unit` VALUES ('5', '码', 'unit_yard', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:54:30', '2010-01-16 18:54:30');
INSERT INTO `wac_unit` VALUES ('6', '立方米', 'unit_cubic_meter', '0', '0', '0', null, null, '50', '1', '2010-07-12 10:54:02', '2010-07-12 10:54:02');
INSERT INTO `wac_unit` VALUES ('7', '寸', 'unit_inch', '0', '0', '0', null, null, '50', '1', '2010-08-20 07:13:46', '2010-08-20 07:13:46');

-- ----------------------------
-- Table structure for `wac_unit_ratio`
-- ----------------------------
DROP TABLE IF EXISTS `wac_unit_ratio`;
CREATE TABLE `wac_unit_ratio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `from_unit_code` varchar(255) DEFAULT NULL,
  `to_unit_code` varchar(255) DEFAULT NULL,
  `ratio` float DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`from_unit_code`),
  KEY `Index_2` (`to_unit_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_unit_ratio
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_unit_type`
-- ----------------------------
DROP TABLE IF EXISTS `wac_unit_type`;
CREATE TABLE `wac_unit_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`name`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_unit_type
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_workflow`
-- ----------------------------
DROP TABLE IF EXISTS `wac_workflow`;
CREATE TABLE `wac_workflow` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `memo` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_workflow
-- ----------------------------
INSERT INTO `wac_workflow` VALUES ('1', '布料生产流程', 'wf_cloth', '0', '布料生产所需流程', '0', '0', null, null, '50', '1', '2010-01-24 08:20:55', '2010-01-24 00:20:55');
INSERT INTO `wac_workflow` VALUES ('2', '待定', 'none', '0', 'memo', '0', '0', null, null, '50', '1', '2010-01-24 13:24:41', '2010-01-24 05:24:41');

-- ----------------------------
-- Table structure for `wac_workflow_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_workflow_item`;
CREATE TABLE `wac_workflow_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `workflow_id` bigint(20) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `is_final` tinyint(1) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`code`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`),
  KEY `FK_Reference_9` (`workflow_id`),
  CONSTRAINT `FK_Reference_9` FOREIGN KEY (`workflow_id`) REFERENCES `wac_workflow` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_workflow_item
-- ----------------------------
INSERT INTO `wac_workflow_item` VALUES ('3', '1', '棉纱入仓', 'wf_cloth_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 02:13:51', '2010-01-24 02:13:51');
INSERT INTO `wac_workflow_item` VALUES ('8', '1', '浆染生产阶段', 'wf_cloth_dye', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:17:54', '2010-01-24 05:17:54');
INSERT INTO `wac_workflow_item` VALUES ('9', '1', '织造生产阶段', 'wf_cloth_weave', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:18:17', '2010-01-24 05:18:17');
INSERT INTO `wac_workflow_item` VALUES ('10', '1', '整理阶段', 'wf_cloth_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:07', '2010-01-24 05:19:31');
INSERT INTO `wac_workflow_item` VALUES ('11', '1', '成品布出仓', 'wf_cloth_final', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:20:09', '2010-01-24 05:20:09');
INSERT INTO `wac_workflow_item` VALUES ('12', '1', '订单建立', 'wf_cloth_production_create', '0', null, '0', '0', null, null, '50', '1', '2010-02-03 01:08:44', '2010-02-03 01:08:44');
INSERT INTO `wac_workflow_item` VALUES ('13', '1', '棉纱发货阶段', 'wf_dispatch_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:45', '2010-06-22 15:33:45');
INSERT INTO `wac_workflow_item` VALUES ('14', '1', '浆染纱发货阶段', 'wf_dispatch_dye', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:58', '2010-06-22 15:33:58');
INSERT INTO `wac_workflow_item` VALUES ('15', '1', '织造布发货阶段', 'wf_dispatch_weave', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:34:13', '2010-06-22 15:34:13');
INSERT INTO `wac_workflow_item` VALUES ('16', '1', '后整布发货阶段', 'wf_dispatch_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:09', '2010-06-22 15:34:32');
INSERT INTO `wac_workflow_item` VALUES ('17', '1', '成品布发货阶段', 'wf_dispatch_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-06-25 02:30:10', '2010-06-22 15:34:44');
INSERT INTO `wac_workflow_item` VALUES ('18', '1', '成品测试', 'wf_qc_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-08-31 09:45:08', '2010-08-31 09:45:08');
