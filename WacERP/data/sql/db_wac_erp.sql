/*
Navicat MySQL Data Transfer

Source Server         : mysql5.1_portable
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : db_wac_erp

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-03-24 18:12:21
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_group
-- ----------------------------
INSERT INTO `sf_guard_group` VALUES ('1', 'admin', 'Administrator group', '2009-12-19 08:12:50', '2009-12-19 08:12:50'), ('2', 'group1', '布匹生产部门', '2010-03-17 10:14:46', '2010-03-29 08:53:06'), ('3', 'follows', '跟单员', '2010-03-18 08:26:41', '2010-04-14 03:51:53'), ('4', 'orders', '落单员', '2010-03-18 09:06:29', '2010-04-14 03:50:42'), ('5', 'auditors', '审批员', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('9', 't1', 't1', '2010-12-30 08:41:04', '2010-12-30 08:41:04'), ('10', 't2', 't2', '2010-12-30 08:41:18', '2010-12-30 08:41:18'), ('11', 't3', 't3', '2010-12-30 08:48:56', '2010-12-30 08:48:56'), ('12', 't4', 't4', '2010-12-30 08:55:05', '2010-12-30 08:55:05'), ('14', 't5', 't5', '2011-01-04 10:30:06', '2011-01-04 10:30:06'), ('15', 't6', 't6', '2011-02-25 08:40:12', '2011-02-25 08:40:12');

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
INSERT INTO `sf_guard_group_permission` VALUES ('1', '1', '2009-12-19 08:12:51', '2009-12-19 08:12:51'), ('2', '6', '2010-03-29 08:53:06', '2010-03-29 08:53:06'), ('2', '7', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '9', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '11', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '14', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '15', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '17', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '18', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '20', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '21', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '23', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '25', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '26', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '28', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '30', '2010-04-06 07:59:03', '2010-04-06 07:59:03'), ('2', '31', '2010-04-09 07:54:27', '2010-04-09 07:54:27'), ('3', '6', '2010-04-14 03:51:10', '2010-04-14 03:51:10'), ('3', '12', '2010-04-14 03:51:10', '2010-04-14 03:51:10'), ('3', '15', '2010-04-14 07:32:38', '2010-04-14 07:32:38'), ('3', '18', '2010-04-14 07:32:38', '2010-04-14 07:32:38'), ('3', '23', '2010-04-14 07:32:38', '2010-04-14 07:32:38'), ('4', '6', '2010-04-14 03:50:17', '2010-04-14 03:50:17'), ('4', '7', '2010-04-14 03:50:17', '2010-04-14 03:50:17'), ('5', '7', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '9', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '11', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '12', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '14', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '15', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '17', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '18', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '20', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '21', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '23', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '25', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '26', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '28', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('5', '30', '2010-04-16 03:47:28', '2010-04-16 03:47:28'), ('9', '7', '2010-12-30 08:41:04', '2010-12-30 08:41:04'), ('9', '12', '2010-12-30 08:41:04', '2010-12-30 08:41:04'), ('9', '18', '2010-12-30 08:41:04', '2010-12-30 08:41:04'), ('10', '11', '2010-12-30 08:41:18', '2010-12-30 08:41:18'), ('10', '15', '2010-12-30 08:41:18', '2010-12-30 08:41:18'), ('10', '20', '2010-12-30 08:41:18', '2010-12-30 08:41:18'), ('11', '17', '2010-12-30 08:48:56', '2010-12-30 08:48:56'), ('11', '25', '2010-12-30 08:48:56', '2010-12-30 08:48:56'), ('12', '9', '2010-12-30 08:55:05', '2010-12-30 08:55:05'), ('12', '17', '2010-12-30 08:55:05', '2010-12-30 08:55:05'), ('14', '12', '2011-02-15 10:20:26', '2011-02-15 10:20:26'), ('14', '17', '2011-02-15 10:20:26', '2011-02-15 10:20:26'), ('14', '21', '2011-02-15 10:20:26', '2011-02-15 10:20:26'), ('15', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '5', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '6', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '7', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '9', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '11', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '12', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '14', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '15', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '17', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '23', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('15', '28', '2011-02-25 08:40:12', '2011-02-25 08:40:12');

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
INSERT INTO `sf_guard_permission` VALUES ('1', 'admin', '超级管理权', '2009-12-19 08:12:50', '2010-03-18 10:10:39'), ('5', 'app_system_setting', '系统设置', '2010-03-18 10:08:32', '2010-03-18 10:08:32'), ('6', 'app_cloth_produce', '布匹生产流程', '2010-03-18 10:10:07', '2010-03-18 10:10:07'), ('7', 'app_order_manager', '订单/生产单管理', '2010-04-06 07:33:30', '2010-04-06 07:33:30'), ('9', 'app_customer_order_audit', '订单审批', '2010-04-06 07:34:40', '2010-04-06 07:34:40'), ('11', 'app_production_order_audit', '生产单审批', '2010-04-06 07:35:29', '2010-04-06 07:35:29'), ('12', 'app_cotton_order_manager', '棉纱单管理', '2010-04-06 07:36:35', '2010-04-06 07:36:35'), ('14', 'app_cotton_order_audit', '棉纱单审批', '2010-04-06 07:37:21', '2010-04-06 07:37:21'), ('15', 'app_dye_order_manager', '浆染纱生产管理', '2010-04-06 07:38:05', '2010-04-06 07:38:05'), ('17', 'app_dye_order_audit', '浆染单审批', '2010-04-06 07:38:46', '2010-04-06 07:38:46'), ('18', 'app_weave_order_manager', '织造布生产管理', '2010-04-06 07:39:07', '2010-04-06 07:39:17'), ('20', 'app_weave_order_audit', '织造单审批', '2010-04-06 07:40:42', '2010-04-06 07:40:42'), ('21', 'app_weave_qc_form_manager', '织造QC单管理', '2010-04-06 07:41:04', '2010-04-06 07:41:04'), ('23', 'app_clean_up_form_manager', '整理定型单管理', '2010-04-06 07:42:18', '2010-04-06 07:42:18'), ('25', 'app_clean_up_form_audit', '整理定型单审批', '2010-04-06 07:42:50', '2010-04-06 07:42:50'), ('26', 'app_clean_up_qc_form_manager1', '整理QC单管理1', '2010-04-06 07:43:28', '2010-09-23 16:20:32'), ('28', 'app_final_cloth_form_manager', '成品布生产管理', '2010-04-06 07:44:18', '2010-04-06 07:44:18'), ('30', 'app_final_cloth_form_audit', '成品单审批', '2010-04-06 07:45:03', '2010-04-06 07:58:32'), ('31', 'app_statistic_manager', '查询与统计', '2010-04-09 07:54:02', '2010-04-09 07:54:02'), ('32', 'app_final_cloth_qc_form_manager', '成品布QC管理', '2010-09-06 15:19:11', '2010-09-06 15:19:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------
INSERT INTO `sf_guard_user` VALUES ('1', 'admin', 'sha1', '59f12273dd2e1c99581bfc24ca702c8e', 'e8efdc7df4a04fcf3afd22d82f8ee4ca60f9b4c3', '1', '1', '2011-03-24 07:02:08', '2009-12-19 08:12:50', '2011-03-24 07:02:08'), ('2', 'user1', 'sha1', 'c345a581068c0e84a409593ff2298c39', '0bd1714316e66cc94baf6a3ed92de38f290c0698', '1', '0', '2010-04-16 03:37:36', '2010-03-16 03:51:00', '2010-04-16 03:37:36'), ('3', 'user3d', 'sha1', 'c7a425f5b1257a058200d77d4a587b1a', 'e63e8320cc2bec3447f4b67d78916debdd8fd289', '0', '0', '2010-04-16 03:37:54', '2010-03-18 07:52:28', '2010-10-04 16:11:23'), ('4', 'user4', 'sha1', '405d75945172940fce6a4c655ab0cb61', '6e781805e294cb10fb4686fa0a5b371f98a8cd7e', '1', '0', null, '2010-10-04 16:17:34', '2010-10-04 16:17:34'), ('5', 'user52', 'sha1', 'b005d2da40d0cc9e391e4d683ad10e31', '562ea2d60ad031c5caa4f5e960156b7c62ff5e8b', '1', '0', null, '2011-02-25 08:39:05', '2011-02-28 09:45:51');

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
INSERT INTO `sf_guard_user_group` VALUES ('1', '1', '2009-12-19 08:12:50', '2009-12-19 08:12:50'), ('2', '4', '2010-04-14 03:52:23', '2010-04-14 03:52:23'), ('3', '4', '2010-10-04 16:08:53', '2010-10-04 16:08:53'), ('4', '3', '2010-10-04 16:17:34', '2010-10-04 16:17:34'), ('5', '3', '2011-02-25 08:39:05', '2011-02-25 08:39:05'), ('5', '9', '2011-02-25 08:39:05', '2011-02-25 08:39:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_category
-- ----------------------------
INSERT INTO `wac_category` VALUES ('1', '0', '0', '1', '4', '0', 'ROOT', null, '1', 'ROOT', 'ROOT', 'root', null, '0', '0', null, null, '50', '1', '2011-03-24 02:42:38', '0000-00-00 00:00:00'), ('2', '1', '0', '2', '3', '1', null, null, '1', null, '我的分类', 'root', null, '0', '0', null, null, '50', '1', '2011-03-24 02:42:35', '2011-03-22 03:04:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_country
-- ----------------------------
INSERT INTO `wac_country` VALUES ('1', null, null, 'CHN', '中国', null, '', '0', '0', null, null, '50', '1', '2010-01-24 05:30:00', '2010-01-24 05:30:00'), ('2', null, null, 'USA', '美国', null, '', '0', '0', null, null, '50', '1', '2011-03-01 07:42:50', '2011-03-01 07:43:14'), ('5', null, null, 'ENG', '英国', null, '', '0', '0', null, null, '50', '1', '2011-01-27 08:58:12', '2011-01-27 08:58:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_file
-- ----------------------------
INSERT INTO `wac_file` VALUES ('1', '0', '0', '1', '8', '0', 'root', '1', 'ROOT', 'ROOT', 'ROOT', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-24 09:01:18', '0000-00-00 00:00:00'), ('2', '1', '0', '2', '3', '1', 'root', '1', null, null, 'A:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-24 09:01:24', '2011-03-04 08:02:04'), ('3', '1', '1', '4', '5', '1', 'root', '1', null, null, 'B:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-24 09:01:27', '2011-03-04 10:28:32'), ('4', '1', '2', '6', '7', '1', 'root', '1', null, null, 'C:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-24 09:01:36', '0000-00-00 00:00:00');

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
INSERT INTO `wac_sysmsg` VALUES ('1', 'sys_add_succ', '', '添加成功!', '0', '0', null, null, '50', '1', '2010-02-04 23:06:28', '2010-02-04 23:06:28'), ('2', 'sys_edit_succ', '', '修改成功!', '0', '0', null, null, '50', '1', '2010-02-05 01:30:38', '2010-02-05 01:30:38'), ('3', 'sys_del_succ', '', '删除成功!', '0', '0', null, null, '50', '1', '2010-02-05 01:30:57', '2010-02-05 01:30:57'), ('4', 'sys_err_goods_category_not_existed', '', '错误, 不存在的货物品种!', '0', '0', null, null, '50', '1', '2010-02-09 03:22:26', '2010-02-08 19:22:26'), ('5', 'sys_err_invalid_production_order', '', '错误, 请输入有效生产单!', '0', '0', null, null, '50', '1', '2010-03-14 03:11:13', '2010-02-08 19:22:11'), ('6', 'sys_err_invalid_factory', '', '错误, 请输入有效工厂!', '0', '0', null, null, '50', '1', '2010-02-09 03:22:19', '2010-02-08 19:22:19'), ('7', 'sys_err_invalid_cotton_order', '', '错误, 请输入有效棉纱单!', '0', '0', null, null, '50', '1', '2010-02-16 23:21:55', '2010-02-16 23:21:55'), ('8', 'sys_err_invalid_dye_order', '', '错误, 请输入有效浆染单!', '0', '0', null, null, '50', '1', '2010-02-16 23:22:19', '2010-02-16 23:22:19'), ('9', 'sys_err_invalid_weave_order', '', '错误, 请输入有效织造单!', '0', '0', null, null, '50', '1', '2010-02-16 23:22:40', '2010-02-16 23:22:40'), ('10', 'sys_err_invalid_clean_up_form', '', '错误, 请输入有效后整单!', '0', '0', null, null, '50', '1', '2010-06-09 10:24:35', '2010-02-16 23:23:16'), ('11', 'sys_err_invalid_final_order', '', '错误, 请输入有效成品单!', '0', '0', null, null, '50', '1', '2010-02-16 23:24:50', '2010-02-16 23:24:50'), ('12', 'sys_err_invalid_goods_category', '', '错误, 请输入有效货物品种!', '0', '0', null, null, '50', '1', '2010-02-17 00:07:48', '2010-02-17 00:07:48'), ('13', 'sys_log_add', '', '%s 添加了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:16', '2010-02-17 02:04:16'), ('14', 'sys_log_edit', '', '%s 编辑了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:18', '2010-02-17 02:04:18'), ('15', 'sys_log_delete', '', '%s 删除了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 10:04:00', '2010-02-17 02:04:00'), ('16', 'sys_err_invalid_supplier', '', '错误, 请输入有效供应厂商!', '0', '0', null, null, '50', '1', '2010-02-20 02:36:45', '2010-02-20 02:36:45'), ('17', 'sys_err_invalid_color', null, '错误, 请输入有效颜色!', '0', '0', null, null, '50', '1', '2010-02-22 10:33:40', '0000-00-00 00:00:00'), ('18', 'sys_err_invalid_jar', null, '错误, 请输入有效缸号!', '0', '0', null, null, '50', '1', '2010-02-22 10:34:00', '0000-00-00 00:00:00'), ('19', 'sys_err_invalid_axis', null, '错误, 请输入有效轴号!', '0', '0', null, null, '50', '1', '2010-02-22 10:34:53', '0000-00-00 00:00:00'), ('20', 'sys_err_invalid_cotton_goods_category', null, '错误, 请输入有效棉纱品种!', '0', '0', null, null, '50', '1', '2010-02-23 02:20:35', '0000-00-00 00:00:00'), ('21', 'sys_audit_succ', '', '审核操作完成!', '0', '0', null, null, '50', '1', '2010-02-23 18:24:22', '2010-02-23 18:24:22'), ('22', 'sys_err_invaild_audit_status', '', '错误, 审核操作无效! \r\n请检查本单是否已审核?', '0', '0', null, null, '50', '1', '2010-02-25 08:42:50', '2010-02-23 18:26:46'), ('23', 'sys_err_invaild_audit_zero_item', '', '错误, 审核操作无效! \r\n请检查本单是否存在输入子项?', '0', '0', null, null, '50', '1', '2010-02-25 08:42:54', '2010-02-24 19:41:12'), ('24', 'sys_err_invalid_spinner', null, '错误, 请输入有效纺织机号!', '0', '0', null, null, '50', '1', '2010-02-26 04:19:30', '0000-00-00 00:00:00'), ('25', 'sys_invalid_user_authenticate', '', '错误, 无效的用户验证!', '0', '0', null, null, '50', '1', '2010-03-03 19:48:22', '2010-03-03 19:48:22'), ('26', 'sys_err_invalid_customer_order', '', '错误, 请输入有效订单!', '0', '0', null, null, '50', '1', '2010-03-13 19:12:01', '2010-03-13 19:12:01'), ('27', 'sys_err_invalid_customer', '', '错误, 请输入有效客户!', '0', '0', null, null, '50', '1', '2010-04-07 06:51:15', '2010-04-06 22:51:15'), ('28', 'sys_err_sample_jar_not_existed', null, '错误, 请输入有效封样缸号!', '0', '0', null, null, '50', '1', '2010-03-25 03:34:57', '0000-00-00 00:00:00'), ('29', 'sys_err_invalid_storehouse', '', '错误, 请输入有效仓库!', '0', '0', null, null, '50', '1', '2010-04-07 06:51:06', '2010-04-06 22:51:06'), ('30', 'sys_err_goods_number_insufficient_in_factory', null, '错误, \'%s\' 存量不足!  [现有数量%s,消耗数量%s]', '0', '0', null, null, '50', '1', '2010-04-08 08:48:12', '0000-00-00 00:00:00'), ('31', 'sys_log_audit', null, '%s 审核了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-04-07 08:46:44', '0000-00-00 00:00:00'), ('32', 'sys_err_predefined_class_delete', null, '错误, 此分类为系统预定义的必须项,禁止删除!', '0', '0', null, null, '50', '1', '2010-05-18 06:36:38', '0000-00-00 00:00:00'), ('33', 'sys_err_predefined_class_edit', null, '错误, 此分类为系统预定义的必须项,编码禁止更改!', '0', '0', null, null, '50', '1', '2010-05-18 07:22:42', '0000-00-00 00:00:00'), ('34', 'sys_err_invaild_target', '', '错误, 请输入有效目的地!', '0', '0', null, null, '50', '1', '2010-06-22 14:39:41', '2010-06-22 14:39:41'), ('35', 'sys_err_invalid_dispatch_order', '', '错误, 请输入有效出仓单!', '0', '0', null, null, '50', '1', '2010-08-19 09:28:33', '2010-08-19 09:28:33'), ('36', 'sys_err_dispatch_order_qc_only_once', '', '错误, 此出货单已存在QC记录, 请复查以往QC单!', '0', '0', null, null, '50', '1', '2010-09-01 03:10:10', '2010-09-01 03:08:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_log
-- ----------------------------
INSERT INTO `wac_system_log` VALUES ('1', '1', '2', 'admin 添加了 用户权限, (id为 32)', '0', '0', null, null, '50', '1', '2010-09-06 07:18:47', '2010-09-06 07:18:47'), ('2', '1', '2', 'admin 添加了 订单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:35', '2010-09-06 07:20:35'), ('3', '1', '2', 'admin 添加了 订单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:43', '2010-09-06 07:20:43'), ('4', '1', '2', 'admin 添加了 生产单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:22:41', '2010-09-06 07:22:41'), ('5', '1', '2', 'admin 添加了 生产单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:23:00', '2010-09-06 07:23:00'), ('6', '1', '2', 'admin 添加了 棉纱单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:02', '2010-09-06 07:24:02'), ('7', '1', '2', 'admin 添加了 棉纱单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:21', '2010-09-06 07:24:21'), ('8', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:50', '2010-09-06 07:24:50'), ('9', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:25:09', '2010-09-06 07:25:09'), ('10', '1', '2', 'admin 添加了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:26:57', '2010-09-06 07:26:57'), ('11', '1', '2', 'admin 添加了 浆染单项目, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:27:45', '2010-09-06 07:27:45'), ('12', '1', '2', 'admin 添加了 浆染单项目, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:02', '2010-09-06 07:28:02'), ('13', '1', '2', 'admin 审核了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:16', '2010-09-06 07:28:16'), ('14', '1', '2', 'admin 添加了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:48', '2010-09-06 07:28:48'), ('15', '1', '2', 'admin 添加了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:53', '2010-09-06 07:35:53'), ('16', '1', '2', 'admin 审核了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:58', '2010-09-06 07:35:58'), ('17', '1', '2', 'admin 添加了 织造单子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:28', '2010-09-06 07:38:28'), ('18', '1', '2', 'admin 审核了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:34', '2010-09-06 07:38:34'), ('19', '1', '2', 'admin 编辑了 权限管理, (id为 26)', '0', '0', null, null, '50', '1', '2010-09-23 08:23:40', '2010-09-23 08:23:40'), ('20', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:46:47', '2010-10-04 07:46:47'), ('21', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:47:50', '2010-10-04 07:47:50'), ('22', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:49:12', '2010-10-04 07:49:12'), ('23', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:50:13', '2010-10-04 07:50:13'), ('24', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:54:53', '2010-10-04 07:54:53'), ('25', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:55:37', '2010-10-04 07:55:37'), ('26', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:56:20', '2010-10-04 07:56:20'), ('27', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:59:51', '2010-10-04 07:59:51'), ('28', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:00:29', '2010-10-04 08:00:29'), ('29', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:10', '2010-10-04 08:01:10'), ('30', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:48', '2010-10-04 08:01:48'), ('31', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:03:08', '2010-10-04 08:03:08'), ('32', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:07:42', '2010-10-04 08:07:42'), ('33', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:08:29', '2010-10-04 08:08:29'), ('34', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:10:59', '2010-10-04 08:10:59'), ('35', '1', '2', 'admin 添加了 用户管理, (id为 4)', '0', '0', null, null, '50', '1', '2010-10-04 08:17:10', '2010-10-04 08:17:10'), ('36', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:18:55', '2010-10-04 08:18:55'), ('37', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:08', '2010-10-04 08:19:08'), ('38', '1', '2', 'admin 删除了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:21', '2010-10-04 08:19:21'), ('39', '1', '2', 'admin 添加了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:13:51', '2010-12-30 08:13:51'), ('40', '1', '2', 'admin 删除了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:15', '2010-12-30 08:20:15'), ('41', '1', '2', 'admin 添加了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:51', '2010-12-30 08:20:51'), ('42', '1', '2', 'admin 添加了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:22:38', '2010-12-30 08:22:38'), ('43', '1', '2', 'admin 删除了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:23:09', '2010-12-30 08:23:09'), ('44', '1', '2', 'admin 删除了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:40:20', '2010-12-30 08:40:20'), ('45', '1', '2', 'admin 添加了 用户组管理, (id为 9)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:04', '2010-12-30 08:41:04'), ('46', '1', '2', 'admin 添加了 用户组管理, (id为 10)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:18', '2010-12-30 08:41:18'), ('47', '1', '2', 'admin 添加了 用户组管理, (id为 11)', '0', '0', null, null, '50', '1', '2010-12-30 08:48:56', '2010-12-30 08:48:56'), ('48', '1', '2', 'admin 添加了 用户组管理, (id为 12)', '0', '0', null, null, '50', '1', '2010-12-30 08:55:06', '2010-12-30 08:55:06'), ('49', '1', '2', 'admin 添加了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-03 07:20:10', '2011-01-03 07:20:10'), ('50', '1', '2', 'admin 删除了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-04 10:29:42', '2011-01-04 10:29:42'), ('51', '1', '2', 'admin 添加了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-01-04 10:30:06', '2011-01-04 10:30:06'), ('52', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:34:27', '2011-01-04 10:34:27'), ('53', '1', '2', 'admin 删除了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:05', '2011-01-04 10:35:05'), ('54', '1', '2', 'admin 添加了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:20', '2011-01-04 10:35:20'), ('55', '1', '2', 'admin 删除了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-05 06:10:51', '2011-01-05 06:10:51'), ('56', '1', '2', 'admin 添加了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:23:56', '2011-01-06 03:23:56'), ('57', '1', '2', 'admin 删除了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:31', '2011-01-06 03:25:31'), ('58', '1', '2', 'admin 添加了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:54', '2011-01-06 03:25:54'), ('59', '1', '2', 'admin 编辑了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:26:11', '2011-01-06 03:26:11'), ('60', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:00', '2011-01-07 03:33:00'), ('61', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:52', '2011-01-07 03:33:52'), ('62', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:35:58', '2011-01-07 03:35:58'), ('63', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:36:44', '2011-01-07 03:36:44'), ('64', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:47:34', '2011-01-07 03:47:34'), ('65', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:53:09', '2011-01-07 03:53:09'), ('66', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:59:54', '2011-01-07 03:59:54'), ('67', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:49', '2011-01-07 04:00:49'), ('68', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:54', '2011-01-07 04:00:54'), ('69', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:26:53', '2011-01-10 09:26:53'), ('70', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:29:05', '2011-01-10 09:29:05'), ('71', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:28', '2011-01-10 09:33:28'), ('72', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:33', '2011-01-10 09:33:33'), ('73', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:05', '2011-01-10 09:34:05'), ('74', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:18', '2011-01-10 09:34:18'), ('75', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:48:58', '2011-01-10 09:48:58'), ('76', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:21', '2011-01-10 09:49:21'), ('77', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:36', '2011-01-10 09:49:36'), ('78', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:52:20', '2011-01-10 09:52:20'), ('79', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:05:08', '2011-01-10 10:05:08'), ('80', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:15:58', '2011-01-10 10:15:58'), ('81', '1', '2', 'admin 添加了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:16:39', '2011-01-10 10:16:39'), ('82', '1', '2', 'admin 编辑了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:19', '2011-01-10 10:17:19'), ('83', '1', '2', 'admin 删除了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:29', '2011-01-10 10:17:29'), ('84', '1', '2', 'admin 添加了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:45:08', '2011-01-10 10:45:08'), ('85', '1', '2', 'admin 编辑了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:46:15', '2011-01-10 10:46:15'), ('86', '1', '2', 'admin 删除了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:00', '2011-01-10 10:47:00'), ('87', '1', '2', 'admin 添加了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:15', '2011-01-10 10:47:15'), ('88', '1', '2', 'admin 添加了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:29', '2011-01-10 10:53:29'), ('89', '1', '2', 'admin 删除了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:48', '2011-01-10 10:53:48'), ('90', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:45:54', '2011-01-21 10:45:54'), ('91', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:00', '2011-01-21 10:46:00'), ('92', '1', '2', 'admin 添加了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:11', '2011-01-21 10:46:11'), ('93', '1', '2', 'admin 删除了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:25', '2011-01-21 10:46:25'), ('94', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:59', '2011-01-21 10:46:59'), ('95', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:47:13', '2011-01-21 10:47:13'), ('96', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:07', '2011-01-21 10:48:07'), ('97', '1', '2', 'admin 添加了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:12', '2011-01-21 10:48:12'), ('98', '1', '2', 'admin 添加了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:15', '2011-01-21 10:48:15'), ('99', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:31', '2011-01-21 10:48:31'), ('100', '1', '2', 'admin 删除了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-21 10:52:13', '2011-01-21 10:52:13'), ('101', '1', '2', 'admin 删除了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:07', '2011-01-21 10:54:07');
INSERT INTO `wac_system_log` VALUES ('102', '1', '2', 'admin 编辑了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:29', '2011-01-21 10:54:29'), ('103', '1', '2', 'admin 删除了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:35', '2011-01-21 10:54:35'), ('104', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:18', '2011-01-22 03:27:18'), ('105', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:27', '2011-01-22 03:27:27'), ('106', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:48:52', '2011-01-22 03:48:52'), ('107', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:34', '2011-01-22 03:54:34'), ('108', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:43', '2011-01-22 03:54:43'), ('109', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:40', '2011-01-22 09:05:40'), ('110', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:47', '2011-01-22 09:05:47'), ('111', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:08:54', '2011-01-22 09:08:54'), ('112', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:25', '2011-01-24 07:42:25'), ('113', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:30', '2011-01-24 07:42:30'), ('114', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:21', '2011-01-24 08:51:21'), ('115', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:32', '2011-01-24 08:51:32'), ('116', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:27', '2011-01-27 08:57:27'), ('117', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:35', '2011-01-27 08:57:35'), ('118', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:30', '2011-01-27 08:58:30'), ('119', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:36', '2011-01-27 08:58:36'), ('120', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:32', '2011-02-08 08:40:32'), ('121', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:53', '2011-02-08 08:40:53'), ('122', '1', '2', 'admin 编辑了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-02-15 10:20:26', '2011-02-15 10:20:26'), ('123', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-25 08:39:05', '2011-02-25 08:39:05'), ('124', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12'), ('125', '1', '2', 'admin 添加了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:44:57', '2011-02-25 08:44:57'), ('126', '1', '2', 'admin 删除了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:46:56', '2011-02-25 08:46:56'), ('127', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 08:45:40', '2011-02-28 08:45:40'), ('128', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 09:45:52', '2011-02-28 09:45:52'), ('129', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:39:37', '2011-03-01 07:39:37'), ('130', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:02', '2011-03-01 07:43:02'), ('131', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:15', '2011-03-01 07:43:15'), ('132', '1', '2', 'admin 删除了 系统参数, (id为 13,11,10,9,8,7,6,5,4,3,2)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:26', '2011-03-01 07:45:26'), ('133', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:46', '2011-03-01 07:45:46'), ('134', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:47:54', '2011-03-01 07:47:54'), ('135', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:06', '2011-03-01 07:51:06'), ('136', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:38', '2011-03-01 07:51:38'), ('137', '1', '2', 'admin 添加了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 07:53:11', '2011-03-01 07:53:11'), ('138', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 08:08:06', '2011-03-01 08:08:06'), ('139', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 08:56:14', '2011-03-01 08:56:14'), ('140', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:50', '2011-03-01 09:01:50'), ('141', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:57', '2011-03-01 09:01:57');

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
INSERT INTO `wac_system_parameter` VALUES ('1', '货币', 'default/system/currency', '0', 'RMB', '0', '0', null, null, '50', '1', '2011-03-01 07:51:14', '2011-03-01 07:51:38'), ('12', '打印模块-本公司名称', 'default/print/company_name', '0', 'KK有限公司', '0', '0', null, null, '50', '1', '2011-03-01 09:01:26', '2011-03-01 09:01:50'), ('14', 'test', 'test', '1', '5.111', '0', '0', null, null, '50', '1', '2011-03-01 09:01:33', '2011-03-01 09:01:57');

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
INSERT INTO `wac_unit` VALUES ('1', '米', 'unit_meter', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:29:58', '2010-01-16 18:29:58'), ('2', '公斤', 'unit_kilogram', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:47:42', '2010-01-16 18:47:42'), ('3', '吨', 'unit_ton', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:48:07', '2010-01-16 18:48:07'), ('4', '平方米', 'unit_square', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:51:56', '2010-01-16 18:51:56'), ('5', '码', 'unit_yard', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:54:30', '2010-01-16 18:54:30'), ('6', '立方米', 'unit_cubic_meter', '0', '0', '0', null, null, '50', '1', '2010-07-12 10:54:02', '2010-07-12 10:54:02'), ('7', '寸', 'unit_inch', '0', '0', '0', null, null, '50', '1', '2010-08-20 07:13:46', '2010-08-20 07:13:46');

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
INSERT INTO `wac_workflow` VALUES ('1', '布料生产流程', 'wf_cloth', '0', '布料生产所需流程', '0', '0', null, null, '50', '1', '2010-01-24 08:20:55', '2010-01-24 00:20:55'), ('2', '待定', 'none', '0', 'memo', '0', '0', null, null, '50', '1', '2010-01-24 13:24:41', '2010-01-24 05:24:41');

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
INSERT INTO `wac_workflow_item` VALUES ('3', '1', '棉纱入仓', 'wf_cloth_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 02:13:51', '2010-01-24 02:13:51'), ('8', '1', '浆染生产阶段', 'wf_cloth_dye', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:17:54', '2010-01-24 05:17:54'), ('9', '1', '织造生产阶段', 'wf_cloth_weave', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:18:17', '2010-01-24 05:18:17'), ('10', '1', '整理阶段', 'wf_cloth_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:07', '2010-01-24 05:19:31'), ('11', '1', '成品布出仓', 'wf_cloth_final', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:20:09', '2010-01-24 05:20:09'), ('12', '1', '订单建立', 'wf_cloth_production_create', '0', null, '0', '0', null, null, '50', '1', '2010-02-03 01:08:44', '2010-02-03 01:08:44'), ('13', '1', '棉纱发货阶段', 'wf_dispatch_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:45', '2010-06-22 15:33:45'), ('14', '1', '浆染纱发货阶段', 'wf_dispatch_dye', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:58', '2010-06-22 15:33:58'), ('15', '1', '织造布发货阶段', 'wf_dispatch_weave', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:34:13', '2010-06-22 15:34:13'), ('16', '1', '后整布发货阶段', 'wf_dispatch_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:09', '2010-06-22 15:34:32'), ('17', '1', '成品布发货阶段', 'wf_dispatch_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-06-25 02:30:10', '2010-06-22 15:34:44'), ('18', '1', '成品测试', 'wf_qc_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-08-31 09:45:08', '2010-08-31 09:45:08');
