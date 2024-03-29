/*
Navicat MySQL Data Transfer

Source Server         : mysql5.1_portable_wac
Source Server Version : 50152
Source Host           : localhost:3306
Source Database       : db_wac_erp

Target Server Type    : MYSQL
Target Server Version : 50152
File Encoding         : 65001

Date: 2011-09-09 17:37:40
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
INSERT INTO sf_guard_group VALUES ('1', 'admin', 'Administrator group', '2009-12-19 08:12:50', '2009-12-19 08:12:50');
INSERT INTO sf_guard_group VALUES ('2', 'group1', '布匹生产部门', '2010-03-17 10:14:46', '2010-03-29 08:53:06');
INSERT INTO sf_guard_group VALUES ('3', 'follows', '跟单员', '2010-03-18 08:26:41', '2010-04-14 03:51:53');
INSERT INTO sf_guard_group VALUES ('4', 'orders', '落单员', '2010-03-18 09:06:29', '2010-04-14 03:50:42');
INSERT INTO sf_guard_group VALUES ('5', 'auditors', '审批员', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group VALUES ('9', 't1', 't1', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO sf_guard_group VALUES ('10', 't2', 't2', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO sf_guard_group VALUES ('11', 't3', 't3', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO sf_guard_group VALUES ('12', 't4', 't4', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO sf_guard_group VALUES ('14', 't5', 't5', '2011-01-04 10:30:06', '2011-01-04 10:30:06');
INSERT INTO sf_guard_group VALUES ('15', 't6', 't6', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group VALUES ('16', 't7', 't711', '2011-03-29 10:26:23', '2011-06-03 08:36:28');

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
INSERT INTO sf_guard_group_permission VALUES ('1', '1', '2009-12-19 08:12:51', '2009-12-19 08:12:51');
INSERT INTO sf_guard_group_permission VALUES ('2', '6', '2010-03-29 08:53:06', '2010-03-29 08:53:06');
INSERT INTO sf_guard_group_permission VALUES ('2', '7', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '9', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '11', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '14', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '15', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '17', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '18', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '20', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '21', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '23', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '25', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '26', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '28', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '30', '2010-04-06 07:59:03', '2010-04-06 07:59:03');
INSERT INTO sf_guard_group_permission VALUES ('2', '31', '2010-04-09 07:54:27', '2010-04-09 07:54:27');
INSERT INTO sf_guard_group_permission VALUES ('3', '6', '2010-04-14 03:51:10', '2010-04-14 03:51:10');
INSERT INTO sf_guard_group_permission VALUES ('3', '12', '2010-04-14 03:51:10', '2010-04-14 03:51:10');
INSERT INTO sf_guard_group_permission VALUES ('3', '15', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO sf_guard_group_permission VALUES ('3', '18', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO sf_guard_group_permission VALUES ('3', '23', '2010-04-14 07:32:38', '2010-04-14 07:32:38');
INSERT INTO sf_guard_group_permission VALUES ('4', '6', '2010-04-14 03:50:17', '2010-04-14 03:50:17');
INSERT INTO sf_guard_group_permission VALUES ('4', '7', '2010-04-14 03:50:17', '2010-04-14 03:50:17');
INSERT INTO sf_guard_group_permission VALUES ('5', '7', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '9', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '11', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '12', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '14', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '15', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '17', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '18', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '20', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '21', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '23', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '25', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '26', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '28', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('5', '30', '2010-04-16 03:47:28', '2010-04-16 03:47:28');
INSERT INTO sf_guard_group_permission VALUES ('9', '7', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO sf_guard_group_permission VALUES ('9', '12', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO sf_guard_group_permission VALUES ('9', '18', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO sf_guard_group_permission VALUES ('10', '11', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO sf_guard_group_permission VALUES ('10', '15', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO sf_guard_group_permission VALUES ('10', '20', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO sf_guard_group_permission VALUES ('11', '17', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO sf_guard_group_permission VALUES ('11', '25', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO sf_guard_group_permission VALUES ('12', '9', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO sf_guard_group_permission VALUES ('12', '17', '2010-12-30 08:55:05', '2010-12-30 08:55:05');
INSERT INTO sf_guard_group_permission VALUES ('14', '12', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO sf_guard_group_permission VALUES ('14', '17', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO sf_guard_group_permission VALUES ('14', '21', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO sf_guard_group_permission VALUES ('15', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '5', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '6', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '7', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '9', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '11', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '12', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '14', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '15', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '17', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '23', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('15', '28', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO sf_guard_group_permission VALUES ('16', '11', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO sf_guard_group_permission VALUES ('16', '15', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO sf_guard_group_permission VALUES ('16', '20', '2011-03-29 10:26:48', '2011-03-29 10:26:48');

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
INSERT INTO sf_guard_permission VALUES ('1', 'admin', '超级管理权', '2009-12-19 08:12:50', '2010-03-18 10:10:39');
INSERT INTO sf_guard_permission VALUES ('5', 'app_system_setting', '系统设置', '2010-03-18 10:08:32', '2010-03-18 10:08:32');
INSERT INTO sf_guard_permission VALUES ('6', 'app_cloth_produce', '布匹生产流程', '2010-03-18 10:10:07', '2010-03-18 10:10:07');
INSERT INTO sf_guard_permission VALUES ('7', 'app_order_manager', '订单/生产单管理', '2010-04-06 07:33:30', '2010-04-06 07:33:30');
INSERT INTO sf_guard_permission VALUES ('9', 'app_customer_order_audit', '订单审批', '2010-04-06 07:34:40', '2010-04-06 07:34:40');
INSERT INTO sf_guard_permission VALUES ('11', 'app_production_order_audit', '生产单审批', '2010-04-06 07:35:29', '2010-04-06 07:35:29');
INSERT INTO sf_guard_permission VALUES ('12', 'app_cotton_order_manager', '棉纱单管理', '2010-04-06 07:36:35', '2010-04-06 07:36:35');
INSERT INTO sf_guard_permission VALUES ('14', 'app_cotton_order_audit', '棉纱单审批', '2010-04-06 07:37:21', '2010-04-06 07:37:21');
INSERT INTO sf_guard_permission VALUES ('15', 'app_dye_order_manager', '浆染纱生产管理', '2010-04-06 07:38:05', '2010-04-06 07:38:05');
INSERT INTO sf_guard_permission VALUES ('17', 'app_dye_order_audit', '浆染单审批', '2010-04-06 07:38:46', '2010-04-06 07:38:46');
INSERT INTO sf_guard_permission VALUES ('18', 'app_weave_order_manager', '织造布生产管理', '2010-04-06 07:39:07', '2010-04-06 07:39:17');
INSERT INTO sf_guard_permission VALUES ('20', 'app_weave_order_audit', '织造单审批', '2010-04-06 07:40:42', '2010-04-06 07:40:42');
INSERT INTO sf_guard_permission VALUES ('21', 'app_weave_qc_form_manager', '织造QC单管理', '2010-04-06 07:41:04', '2010-04-06 07:41:04');
INSERT INTO sf_guard_permission VALUES ('23', 'app_clean_up_form_manager', '整理定型单管理', '2010-04-06 07:42:18', '2010-04-06 07:42:18');
INSERT INTO sf_guard_permission VALUES ('25', 'app_clean_up_form_audit', '整理定型单审批', '2010-04-06 07:42:50', '2010-04-06 07:42:50');
INSERT INTO sf_guard_permission VALUES ('26', 'app_clean_up_qc_form_manager1', '整理QC单管理1', '2010-04-06 07:43:28', '2010-09-23 16:20:32');
INSERT INTO sf_guard_permission VALUES ('28', 'app_final_cloth_form_manager', '成品布生产管理', '2010-04-06 07:44:18', '2010-04-06 07:44:18');
INSERT INTO sf_guard_permission VALUES ('30', 'app_final_cloth_form_audit', '成品单审批', '2010-04-06 07:45:03', '2010-04-06 07:58:32');
INSERT INTO sf_guard_permission VALUES ('31', 'app_statistic_manager', '查询与统计', '2010-04-09 07:54:02', '2010-04-09 07:54:02');
INSERT INTO sf_guard_permission VALUES ('32', 'app_final_cloth_qc_form_manager', '成品布QC管理1', '2010-09-06 15:19:11', '2011-04-11 07:55:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------
INSERT INTO sf_guard_user VALUES ('1', 'admin', 'sha1', '59f12273dd2e1c99581bfc24ca702c8e', 'e8efdc7df4a04fcf3afd22d82f8ee4ca60f9b4c3', '1', '1', '2011-09-07 02:07:15', '2009-12-19 08:12:50', '2011-09-07 02:07:15');
INSERT INTO sf_guard_user VALUES ('17', 'user1', 'sha1', 'e83ecdefb483cd2db998fd0daa0c5d87', '09b27f59c370d8506dab409f8e6e9a7e533f7a46', '1', '0', '2011-03-31 04:01:35', '2011-03-31 02:40:56', '2011-07-25 08:54:14');
INSERT INTO sf_guard_user VALUES ('18', 'user2', 'sha1', '1cf2166bd1239849b913ff34710b5a08', '789577ef91737d016a50c99bf037bcd97544a4a0', '1', '0', null, '2011-06-10 06:27:07', '2011-06-10 06:27:07');

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
INSERT INTO sf_guard_user_group VALUES ('1', '1', '2009-12-19 08:12:50', '2009-12-19 08:12:50');
INSERT INTO sf_guard_user_group VALUES ('17', '5', '2011-07-25 08:54:14', '2011-07-25 08:54:14');
INSERT INTO sf_guard_user_group VALUES ('18', '11', '2011-07-25 08:49:08', '2011-07-25 08:49:08');
INSERT INTO sf_guard_user_group VALUES ('18', '12', '2011-07-25 08:49:08', '2011-07-25 08:49:08');
INSERT INTO sf_guard_user_group VALUES ('18', '16', '2011-07-25 08:49:08', '2011-07-25 08:49:08');

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
-- Table structure for `wac_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `wac_attribute`;
CREATE TABLE `wac_attribute` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_attribute_set`
-- ----------------------------
DROP TABLE IF EXISTS `wac_attribute_set`;
CREATE TABLE `wac_attribute_set` (
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
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_attribute_set
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_attribute_set_attribute_link`
-- ----------------------------
DROP TABLE IF EXISTS `wac_attribute_set_attribute_link`;
CREATE TABLE `wac_attribute_set_attribute_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `attribute_set_id` bigint(20) DEFAULT '0',
  `attribute_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`attribute_set_id`),
  KEY `Index_2` (`attribute_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_attribute_set_attribute_link
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_category
-- ----------------------------
INSERT INTO wac_category VALUES ('1', '0', '0', '1', '22', '0', 'ROOT', null, '1', 'ROOT', 'ROOT', 'root', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:37', '0000-00-00 00:00:00');
INSERT INTO wac_category VALUES ('2', '1', '0', '2', '21', '1', null, null, '1', null, '我的分类', 'root', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:37', '2011-03-22 03:04:51');
INSERT INTO wac_category VALUES ('34', '2', '0', '3', '6', '2', null, null, '1', null, 'a1', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-21 09:36:51', '2011-07-21 03:42:03');
INSERT INTO wac_category VALUES ('35', '2', '1', '7', '8', '2', null, null, '1', null, 'a2', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:24', '2011-07-21 03:42:05');
INSERT INTO wac_category VALUES ('36', '2', '2', '9', '10', '2', null, null, '1', null, 'a3', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:24', '2011-07-21 03:42:07');
INSERT INTO wac_category VALUES ('37', '2', '3', '11', '20', '2', null, null, '1', null, 'a4', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:37', '2011-07-21 03:42:10');
INSERT INTO wac_category VALUES ('38', '34', '0', '4', '5', '3', null, null, '1', null, 'a11', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-21 09:36:51', '2011-07-21 03:42:14');
INSERT INTO wac_category VALUES ('40', '37', '0', '12', '19', '3', null, null, '1', null, 'ax', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:37', '2011-07-21 03:47:08');
INSERT INTO wac_category VALUES ('42', '43', '0', '14', '15', '5', null, null, '1', null, 'a412', 'leaf', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:24', '2011-07-21 09:37:45');
INSERT INTO wac_category VALUES ('43', '40', '0', '13', '16', '4', null, null, '1', null, 'n1', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:24', '2011-07-21 09:37:15');
INSERT INTO wac_category VALUES ('49', '40', '1', '17', '18', '4', null, null, '1', null, 'sss', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:25:42', '2011-07-22 03:26:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_country
-- ----------------------------
INSERT INTO wac_country VALUES ('1', null, null, 'CHN', '中国', null, '', '0', '0', null, null, '50', '1', '2010-01-24 05:30:00', '2010-01-24 05:30:00');
INSERT INTO wac_country VALUES ('2', null, null, 'USA', '美国', null, '', '0', '0', null, null, '50', '1', '2011-03-01 07:42:50', '2011-03-01 07:43:14');
INSERT INTO wac_country VALUES ('5', null, null, 'ENG', '英国', null, '', '0', '0', null, null, '50', '1', '2011-01-27 08:58:12', '2011-01-27 08:58:36');
INSERT INTO wac_country VALUES ('6', null, null, 'tt91', 't191', null, 'tt911', '0', '0', null, null, '50', '1', '2011-06-10 06:25:22', '2011-06-10 06:25:46');
INSERT INTO wac_country VALUES ('7', null, null, 't2', 't2', null, 't2', '0', '0', null, null, '50', '1', '2011-06-10 06:26:05', '2011-06-10 06:26:05');

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
INSERT INTO wac_currency VALUES ('1', '元', 'RMB', null, null, null, '0', '0', null, null, '50', '1', '2010-02-03 18:22:50', '2010-02-03 18:22:50');

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
-- Table structure for `wac_customer`
-- ----------------------------
DROP TABLE IF EXISTS `wac_customer`;
CREATE TABLE `wac_customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
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
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_customer_address`
-- ----------------------------
DROP TABLE IF EXISTS `wac_customer_address`;
CREATE TABLE `wac_customer_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `is_default` smallint(6) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`customer_id`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_customer_address
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_file
-- ----------------------------
INSERT INTO wac_file VALUES ('1', '0', '0', '1', '38', '0', 'root', '1', 'ROOT', 'ROOT', 'ROOT', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '0000-00-00 00:00:00');
INSERT INTO wac_file VALUES ('2', '1', '0', '2', '9', '1', 'root', '1', null, null, 'A:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:19', '2011-03-04 08:02:04');
INSERT INTO wac_file VALUES ('3', '1', '1', '10', '13', '1', 'root', '1', null, null, 'B:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:19', '2011-03-04 10:28:32');
INSERT INTO wac_file VALUES ('4', '1', '2', '14', '37', '1', 'root', '1', null, null, 'C:', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '0000-00-00 00:00:00');
INSERT INTO wac_file VALUES ('56', '0', '0', '1', '10', '0', 'root', '17', 'root_17', 'root_17', 'Root', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 02:40:57');
INSERT INTO wac_file VALUES ('57', '56', '0', '2', '9', '1', 'branch', '17', 'branch_17_1', 'branch_17_1', 'My Branch 1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 02:40:57');
INSERT INTO wac_file VALUES ('58', '57', '0', '3', '8', '2', 'branch', '17', null, null, 'My Folder1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:04', '2011-03-31 04:02:06');
INSERT INTO wac_file VALUES ('59', '58', '0', '4', '5', '3', 'leaf', '17', null, 'p15s516ttm6gpkdglo1b0nunj3.zip', 'aports.zip', '1/6/', 'application/zip', '118066', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:24', '2011-03-31 04:02:24');
INSERT INTO wac_file VALUES ('60', '58', '1', '6', '7', '3', 'leaf', '17', null, 'p15s516ttmfmm1jip11um1ltamk34.zip', 'Bat_To_Exe_Converter.zip', '1/6/', 'application/zip', '102081', null, '0', '0', null, null, '50', '1', '2011-03-31 04:02:28', '2011-03-31 04:02:28');
INSERT INTO wac_file VALUES ('79', '0', '0', '1', '4', '0', 'root', '18', 'root_18_0', 'root_18_0', 'Root', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-06-10 06:27:07', '2011-06-10 06:27:07');
INSERT INTO wac_file VALUES ('80', '79', '0', '2', '3', '1', 'branch', '18', 'branch_18_0', 'branch_18_0', 'My Branch 1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-06-10 06:27:08', '2011-06-10 06:27:08');
INSERT INTO wac_file VALUES ('90', '2', '0', '3', '8', '2', 'branch', '1', null, null, 'a1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:19', '2011-07-22 08:15:10');
INSERT INTO wac_file VALUES ('91', '3', '0', '11', '12', '2', 'branch', '1', null, null, 'b1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:19', '2011-07-22 08:15:26');
INSERT INTO wac_file VALUES ('93', '90', '0', '4', '5', '3', 'leaf', '1', null, 'p1658er88c16u7fl2lu5lo810973.zip', 'Bat_To_Exe_Converter.zip', 'e/r/', 'application/zip', '102081', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:41', '2011-07-22 08:19:41');
INSERT INTO wac_file VALUES ('94', '90', '1', '6', '7', '3', 'leaf', '1', null, 'p1658er88c35k1ebm133c1re2q0b4.zip', 'BcompilerGUI win.zip', 'e/r/', 'application/zip', '89775', null, '0', '0', null, null, '50', '1', '2011-07-22 08:19:43', '2011-07-22 08:19:43');
INSERT INTO wac_file VALUES ('102', '4', '0', '15', '36', '2', 'branch', '1', null, null, 'c1', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-22 08:39:43');
INSERT INTO wac_file VALUES ('103', '102', '0', '16', '35', '3', 'branch', '1', null, null, 'c11', null, null, '0', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-22 08:39:48');
INSERT INTO wac_file VALUES ('104', '103', '0', '17', '18', '4', 'leaf', '1', null, 'p1658g0jli1uhs1423j61dg11ssi3.zip', 'Bat_To_Exe_Converter.zip', 'g/0/', 'application/zip', '102081', null, '0', '0', null, null, '50', '1', '2011-07-22 08:40:05', '2011-07-22 08:40:05');
INSERT INTO wac_file VALUES ('105', '103', '1', '23', '24', '4', 'leaf', '1', null, 'p1658g0jliv1u59j19tcgg4atn4.zip', 'BcompilerGUI win.zip', 'g/0/', 'application/zip', '89775', null, '0', '0', null, null, '50', '1', '2011-07-25 03:13:33', '2011-07-22 08:40:07');
INSERT INTO wac_file VALUES ('106', '103', '2', '29', '30', '4', 'leaf', '1', null, 'p1658g0jli11ph1sil1j4eaqi1qtu5.zip', 'BullzipPDFPrinter_7_1_0_1195.zip', 'g/0/', 'application/zip', '146498', null, '0', '0', null, null, '50', '1', '2011-07-25 03:13:34', '2011-07-22 08:40:11');
INSERT INTO wac_file VALUES ('107', '103', '3', '31', '36', '4', 'leaf', '1', null, 'p1658g0jli1vcu1h81j4sj2qg7k6.zip', 'compiler-latest.zip', 'g/0/', 'application/zip', '740272', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-22 08:40:14');
INSERT INTO wac_file VALUES ('108', '103', '4', '39', '38', '6', 'leaf', '1', null, 'p1658g0jlik1027951gclsqe07.zip', 'jquery.jqGrid-3.6.2.zip', 'g/0/', 'application/zip', '71703', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-25 03:16:18');
INSERT INTO wac_file VALUES ('109', '103', '5', '31', '36', '4', 'leaf', '1', null, 'p1658g25f811gf1r8egg1bje1lqc8.zip', 'plupload_1_3_0.zip', 'g/2/', 'application/zip', '89849', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-22 08:40:56');
INSERT INTO wac_file VALUES ('110', '103', '6', '38', '39', '7', 'leaf', '1', null, 'p1658g25f83c51i2j18ijj7c2fn9.zip', 'plupload_1_4_2.zip', 'g/2/', 'application/zip', '83559', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-25 03:16:18');
INSERT INTO wac_file VALUES ('111', '103', '7', '36', '37', '5', 'leaf', '1', null, 'p165fkgfdj1m6h17fc18k7611t0v3.zip', 'navicat9_mysql_en.zip', 'k/g/', 'application/zip', '897017', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-25 03:16:17');
INSERT INTO wac_file VALUES ('112', '103', '8', '38', '39', '5', 'leaf', '1', null, 'p165fkgov81ibd14s51375eu0jv04.zip', 'memcached-1.2.6-win32-bin.zip', 'k/g/', 'application/zip', '9222', null, '0', '0', null, null, '50', '1', '2011-07-25 03:15:54', '2011-07-25 03:16:18');

-- ----------------------------
-- Table structure for `wac_language`
-- ----------------------------
DROP TABLE IF EXISTS `wac_language`;
CREATE TABLE `wac_language` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `culture_code` varchar(255) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '0',
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
  KEY `Index_1` (`code`),
  KEY `Index_2` (`priority`),
  KEY `Index_3` (`created_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_language
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material`;
CREATE TABLE `wac_material` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT '0',
  `model_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`sku`),
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_category`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_category`;
CREATE TABLE `wac_material_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `left_number` bigint(20) DEFAULT '0',
  `right_number` bigint(20) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `code` varchar(255) NOT NULL,
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
  UNIQUE KEY `AK_Key_2` (`code`),
  KEY `Index_1` (`parent_id`),
  KEY `Index_2` (`position`),
  KEY `Index_3` (`left_number`),
  KEY `Index_4` (`right_number`),
  KEY `Index_5` (`level`),
  KEY `Index_6` (`code`),
  KEY `Index_7` (`user_id`),
  KEY `Index_8` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_category
-- ----------------------------
INSERT INTO wac_material_category VALUES ('1', '0', '0', '1', '24', '0', 'ROOT', null, '1', 'ROOT', 'ROOT', 'root', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '0000-00-00 00:00:00');
INSERT INTO wac_material_category VALUES ('2', '1', '0', '2', '23', '1', 'MATERIAL_CATEGORY', null, '1', 'MATERIAL CATEGORY', '物料分类', 'root', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-03-22 03:04:51');
INSERT INTO wac_material_category VALUES ('139', '137', '0', '18', '19', '5', 'b2e', null, '1', 'b2e', 'b2e', 'leaf', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 11:03:28');
INSERT INTO wac_material_category VALUES ('130', '2', '0', '3', '6', '2', 'a1', null, '1', 'a1', 'a1', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 03:13:21', '2011-07-22 03:13:23');
INSERT INTO wac_material_category VALUES ('131', '2', '1', '7', '8', '2', 'a2', null, '1', 'a2', 'a2', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:00', '2011-07-22 03:13:26');
INSERT INTO wac_material_category VALUES ('132', '2', '2', '9', '10', '2', 'a3', null, '1', 'a3', 'a3', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:03', '2011-07-22 03:13:31');
INSERT INTO wac_material_category VALUES ('133', '2', '3', '11', '22', '2', 'a4', null, '1', 'a4', 'a4', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 03:13:35');
INSERT INTO wac_material_category VALUES ('134', '130', '0', '4', '5', '3', 'a11', null, '1', 'a11', 'a11', 'leaf', null, '0', '0', null, null, '50', '1', '2011-07-22 03:13:45', '2011-07-22 03:13:45');
INSERT INTO wac_material_category VALUES ('135', '133', '0', '12', '21', '3', 'ax', null, '1', 'ax', 'ax', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 11:03:28');
INSERT INTO wac_material_category VALUES ('136', '135', '0', '13', '16', '4', 'ax1', null, '1', 'ax1', 'ax1', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 11:03:28');
INSERT INTO wac_material_category VALUES ('137', '135', '1', '17', '20', '4', 'ax2', null, '1', 'ax2', 'ax2', 'branch', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 11:03:28');
INSERT INTO wac_material_category VALUES ('138', '136', '0', '14', '15', '5', 'b1d', null, '1', 'b1d', 'b1d', 'leaf', null, '0', '0', null, null, '50', '1', '2011-07-22 11:03:04', '2011-07-22 11:03:28');

-- ----------------------------
-- Table structure for `wac_material_category_link`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_category_link`;
CREATE TABLE `wac_material_category_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `material_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`material_id`),
  KEY `Index_2` (`category_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_category_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_delivery_order`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_delivery_order`;
CREATE TABLE `wac_material_delivery_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `src_storehouse_id` bigint(20) DEFAULT '0',
  `src_storeroom_id` bigint(20) DEFAULT '0',
  `dst_storehouse_id` bigint(20) DEFAULT '0',
  `dst_storeroom_id` bigint(20) DEFAULT '0',
  `total_price` decimal(10,0) DEFAULT NULL,
  `biz_date` datetime DEFAULT NULL,
  `current_state` smallint(6) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`user_id`),
  KEY `Index_2` (`code`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_delivery_order
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_delivery_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_delivery_order_item`;
CREATE TABLE `wac_material_delivery_order_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `material_id` bigint(20) DEFAULT '0',
  `qty` float DEFAULT '0',
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`material_id`),
  KEY `Index_2` (`order_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_delivery_order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_purchase_order`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_purchase_order`;
CREATE TABLE `wac_material_purchase_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `biz_date` datetime DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `current_state` smallint(6) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`user_id`),
  KEY `Index_2` (`code`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_purchase_order
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_purchase_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_purchase_order_item`;
CREATE TABLE `wac_material_purchase_order_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `material_id` bigint(20) DEFAULT '0',
  `qty` float DEFAULT '0',
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`material_id`),
  KEY `Index_2` (`order_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_purchase_order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_sales_order`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_sales_order`;
CREATE TABLE `wac_material_sales_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `src_storehouse_id` bigint(20) DEFAULT '0',
  `src_storeroom_id` bigint(20) DEFAULT '0',
  `customer_id` bigint(20) DEFAULT '0',
  `total_price` decimal(10,0) DEFAULT NULL,
  `biz_date` datetime DEFAULT NULL,
  `current_state` smallint(6) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`user_id`),
  KEY `Index_2` (`code`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_sales_order
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_sale_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_sale_order_item`;
CREATE TABLE `wac_material_sale_order_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `material_id` bigint(20) DEFAULT '0',
  `qty` float DEFAULT '0',
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`material_id`),
  KEY `Index_2` (`order_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_sale_order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_shipping_order`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_shipping_order`;
CREATE TABLE `wac_material_shipping_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `src_storehouse_id` bigint(20) DEFAULT '0',
  `src_storeroom_id` bigint(20) DEFAULT '0',
  `customer_id` bigint(20) DEFAULT '0',
  `customer_address_id` bigint(20) DEFAULT '0',
  `shipping_method_id` bigint(20) DEFAULT '0',
  `total_price` decimal(10,0) DEFAULT NULL,
  `biz_date` datetime DEFAULT NULL,
  `current_state` smallint(6) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`user_id`),
  KEY `Index_2` (`code`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_shipping_order
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_material_shipping_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_material_shipping_order_item`;
CREATE TABLE `wac_material_shipping_order_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `material_id` bigint(20) DEFAULT '0',
  `qty` float DEFAULT '0',
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`material_id`),
  KEY `Index_2` (`order_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_material_shipping_order_item
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_order_state_history`
-- ----------------------------
DROP TABLE IF EXISTS `wac_order_state_history`;
CREATE TABLE `wac_order_state_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT '0',
  `order_type` smallint(6) DEFAULT '0',
  `state` smallint(6) DEFAULT '0',
  `changer_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`order_type`),
  KEY `Index_2` (`order_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_order_state_history
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product`;
CREATE TABLE `wac_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT '0',
  `attribute_set_id` bigint(20) DEFAULT '0',
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
  KEY `Index_4` (`attribute_set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_attribute_number`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_attribute_number`;
CREATE TABLE `wac_product_attribute_number` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `attribute_id` bigint(20) DEFAULT '0',
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
  KEY `Index_1` (`attribute_id`),
  KEY `Index_2` (`value`),
  KEY `Index_3` (`product_id`,`attribute_id`),
  KEY `Index_4` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_attribute_number
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_attribute_object`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_attribute_object`;
CREATE TABLE `wac_product_attribute_object` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `attribute_id` bigint(20) DEFAULT '0',
  `value` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`attribute_id`),
  KEY `Index_2` (`value`),
  KEY `Index_3` (`product_id`,`attribute_id`),
  KEY `Index_4` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_attribute_object
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_attribute_text`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_attribute_text`;
CREATE TABLE `wac_product_attribute_text` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `attribute_id` bigint(20) DEFAULT '0',
  `value` text,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_attribute_text
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_attribute_varchar`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_attribute_varchar`;
CREATE TABLE `wac_product_attribute_varchar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `attribute_id` bigint(20) DEFAULT '0',
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
  KEY `Index_1` (`attribute_id`),
  KEY `Index_2` (`value`),
  KEY `Index_3` (`product_id`,`attribute_id`),
  KEY `Index_4` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_attribute_varchar
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_category`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_category`;
CREATE TABLE `wac_product_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `left_number` bigint(20) DEFAULT '0',
  `right_number` bigint(20) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `code` varchar(255) NOT NULL,
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
  UNIQUE KEY `AK_Key_2` (`code`),
  KEY `Index_1` (`parent_id`),
  KEY `Index_2` (`position`),
  KEY `Index_3` (`left_number`),
  KEY `Index_4` (`right_number`),
  KEY `Index_5` (`level`),
  KEY `Index_6` (`code`),
  KEY `Index_7` (`user_id`),
  KEY `Index_8` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_category
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_product_category_link`
-- ----------------------------
DROP TABLE IF EXISTS `wac_product_category_link`;
CREATE TABLE `wac_product_category_link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0',
  `category_id` bigint(20) DEFAULT '0',
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`product_id`,`category_id`),
  KEY `Index_2` (`product_id`),
  KEY `Index_3` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_product_category_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_shipping_method`
-- ----------------------------
DROP TABLE IF EXISTS `wac_shipping_method`;
CREATE TABLE `wac_shipping_method` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
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
  KEY `Index_2` (`updated_at`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_shipping_method
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_storehouse`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storehouse`;
CREATE TABLE `wac_storehouse` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `area_size` float NOT NULL DEFAULT '0',
  `area_size_unit_code` varchar(255) DEFAULT NULL,
  `capacity` float NOT NULL DEFAULT '0',
  `capacity_unit_code` varchar(255) DEFAULT NULL,
  `postalcode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_man` varchar(255) DEFAULT NULL,
  `tel1` varchar(255) DEFAULT NULL,
  `tel2` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storehouse
-- ----------------------------
INSERT INTO wac_storehouse VALUES ('29', 't5', 't5', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:48:09', '2011-06-09 10:48:09');
INSERT INTO wac_storehouse VALUES ('30', 't6', 't6', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:50:30', '2011-06-09 10:50:30');
INSERT INTO wac_storehouse VALUES ('23', 'd1', 'd1', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 08:48:25', '2011-06-09 08:48:25');
INSERT INTO wac_storehouse VALUES ('26', 't12', 't12', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:39:08', '2011-06-09 10:39:08');
INSERT INTO wac_storehouse VALUES ('24', 'd2', 'd2', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 08:49:09', '2011-06-09 08:49:09');
INSERT INTO wac_storehouse VALUES ('28', 't4', 't4', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:44:17', '2011-06-09 10:44:17');
INSERT INTO wac_storehouse VALUES ('15', '我的小仓1', 'k1', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-07 06:47:36', '2011-06-07 06:47:36');
INSERT INTO wac_storehouse VALUES ('27', 't3', 't3', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:41:37', '2011-06-09 10:41:37');
INSERT INTO wac_storehouse VALUES ('17', 'a6', 'a6', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 08:02:03', '2011-06-09 02:30:02');
INSERT INTO wac_storehouse VALUES ('18', 'ca5a', 'ca5a', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 02:36:19', '2011-06-09 02:36:19');
INSERT INTO wac_storehouse VALUES ('25', 't1', 't1', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 10:38:00', '2011-06-09 10:38:00');
INSERT INTO wac_storehouse VALUES ('48', 't2', 't2', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:50:28', '2011-06-10 06:50:28');
INSERT INTO wac_storehouse VALUES ('21', 'k31', 'k31', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 02:51:44', '2011-06-09 02:51:44');
INSERT INTO wac_storehouse VALUES ('32', 't71', 't71', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 11:04:34', '2011-06-09 11:04:58');
INSERT INTO wac_storehouse VALUES ('33', 't8', 't8', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 11:00:49', '2011-06-09 11:00:49');
INSERT INTO wac_storehouse VALUES ('35', 'a1', 'a1', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 11:01:55', '2011-06-09 11:01:55');
INSERT INTO wac_storehouse VALUES ('36', 'a21', 'a21', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:22:25', '2011-06-10 06:22:49');
INSERT INTO wac_storehouse VALUES ('37', 't69', 't69', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-09 11:04:38', '2011-06-09 11:04:38');
INSERT INTO wac_storehouse VALUES ('38', 'a7', 'a7', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 03:56:43', '2011-06-10 03:56:43');
INSERT INTO wac_storehouse VALUES ('39', 'a8', 'a8', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 03:59:46', '2011-06-10 03:59:46');
INSERT INTO wac_storehouse VALUES ('43', 'a4', 'a4', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:33:03', '2011-06-10 06:33:03');
INSERT INTO wac_storehouse VALUES ('42', 'a3', 'a3', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:22:25', '2011-06-10 06:22:25');
INSERT INTO wac_storehouse VALUES ('44', 'a41', 'a41', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:33:16', '2011-06-10 06:33:16');
INSERT INTO wac_storehouse VALUES ('45', 'c1', 'c1', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:45:04', '2011-06-10 06:45:04');
INSERT INTO wac_storehouse VALUES ('46', 'c2', 'c2', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:45:14', '2011-06-10 06:45:14');
INSERT INTO wac_storehouse VALUES ('47', 'c12', 'c12', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:45:30', '2011-06-10 06:45:30');
INSERT INTO wac_storehouse VALUES ('49', 't21', 't21', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:50:46', '2011-06-10 06:50:46');
INSERT INTO wac_storehouse VALUES ('50', 't22', 't22', '0', null, '0', null, null, null, null, null, null, '0', '0', null, null, '50', '1', '2011-06-10 06:51:04', '2011-06-10 06:51:04');

-- ----------------------------
-- Table structure for `wac_storehouse_material_biz_item`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storehouse_material_biz_item`;
CREATE TABLE `wac_storehouse_material_biz_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `storehouse_id` bigint(20) NOT NULL DEFAULT '0',
  `material_id` bigint(20) DEFAULT '0',
  `order_type` smallint(6) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT '0',
  `qty` float DEFAULT NULL,
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `unit_cost` decimal(10,0) DEFAULT NULL,
  `trade_date` datetime DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`storehouse_id`),
  KEY `Index_2` (`material_id`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`order_type`,`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storehouse_material_biz_item
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_storehouse_material_quantity`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storehouse_material_quantity`;
CREATE TABLE `wac_storehouse_material_quantity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `storehouse_id` bigint(20) NOT NULL DEFAULT '0',
  `storeroom_id` bigint(20) DEFAULT '0',
  `material_id` bigint(20) DEFAULT NULL,
  `qty` float DEFAULT '0',
  `qty_unit_code` varchar(255) DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`storehouse_id`,`material_id`),
  KEY `Index_2` (`qty`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`),
  KEY `Index_5` (`storehouse_id`,`storeroom_id`,`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storehouse_material_quantity
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_storehouse_parameter`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storehouse_parameter`;
CREATE TABLE `wac_storehouse_parameter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `storehouse_id` bigint(20) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storehouse_parameter
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_storehouse_quickstat`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storehouse_quickstat`;
CREATE TABLE `wac_storehouse_quickstat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` smallint(6) DEFAULT '0',
  `storehouse_id` bigint(20) NOT NULL DEFAULT '0',
  `material_id` bigint(20) DEFAULT NULL,
  `qty` float DEFAULT '0',
  `stat_date` datetime DEFAULT NULL,
  `pr_int1` int(11) DEFAULT '0',
  `pr_int2` int(11) DEFAULT '0',
  `pr_str1` varchar(255) DEFAULT NULL,
  `pr_str2` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '50',
  `is_avail` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Index_1` (`storehouse_id`,`material_id`),
  KEY `Index_2` (`qty`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storehouse_quickstat
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_storeroom`
-- ----------------------------
DROP TABLE IF EXISTS `wac_storeroom`;
CREATE TABLE `wac_storeroom` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `storehouse_id` bigint(20) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `area_size` float NOT NULL DEFAULT '0',
  `area_size_unit_code` varchar(255) DEFAULT NULL,
  `capacity` float NOT NULL DEFAULT '0',
  `capacity_unit_code` varchar(255) DEFAULT NULL,
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
  KEY `Index_5` (`storehouse_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_storeroom
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_supplier`
-- ----------------------------
DROP TABLE IF EXISTS `wac_supplier`;
CREATE TABLE `wac_supplier` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
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
  KEY `Index_2` (`code`),
  KEY `Index_3` (`created_at`),
  KEY `Index_4` (`is_avail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for `wac_sysmsg`
-- ----------------------------
DROP TABLE IF EXISTS `wac_sysmsg`;
CREATE TABLE `wac_sysmsg` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `culture_code` varchar(255) DEFAULT NULL,
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
  KEY `Index_2` (`priority`),
  KEY `Index_3` (`created_at`),
  KEY `Index_1` (`code`,`culture_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_sysmsg
-- ----------------------------
INSERT INTO wac_sysmsg VALUES ('1', 'sys_add_succ', 'zh_CN', '', '添加成功!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-04 23:06:28');
INSERT INTO wac_sysmsg VALUES ('2', 'sys_edit_succ', 'zh_CN', '', '修改成功!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-05 01:30:38');
INSERT INTO wac_sysmsg VALUES ('3', 'sys_del_succ', 'zh_CN', '', '删除成功!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-05 01:30:57');
INSERT INTO wac_sysmsg VALUES ('4', 'sys_err_duplicated_code', 'zh_CN', '', '错误, 已存在相同的编码(%s)!', '0', '0', null, null, '50', '1', '2011-06-03 09:09:22', '2011-06-03 09:09:46');
INSERT INTO wac_sysmsg VALUES ('5', 'sys_err_duplicated_name', 'zh_CN', '', '错误, 已存在相同的名称(%s)!', '0', '0', null, null, '50', '1', '2011-06-03 09:09:10', '2011-06-03 09:09:34');
INSERT INTO wac_sysmsg VALUES ('6', 'sys_operation_succ', 'zh_CN', '', '操作成功!', '0', '0', null, null, '50', '1', '2011-07-14 10:28:41', '2011-07-14 10:29:05');
INSERT INTO wac_sysmsg VALUES ('7', 'sys_err_entity_not_found', 'zh_CN', '', '错误, 找不到相符记录!', '0', '0', null, null, '50', '1', '2011-07-18 10:48:01', '2011-07-18 10:48:25');
INSERT INTO wac_sysmsg VALUES ('8', 'sys_err_invalid_dye_order', 'zh_CN', '', '错误, 请输入有效浆染单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-16 23:22:19');
INSERT INTO wac_sysmsg VALUES ('9', 'sys_err_invalid_weave_order', 'zh_CN', '', '错误, 请输入有效织造单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-16 23:22:40');
INSERT INTO wac_sysmsg VALUES ('10', 'sys_err_invalid_clean_up_form', 'zh_CN', '', '错误, 请输入有效后整单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-16 23:23:16');
INSERT INTO wac_sysmsg VALUES ('11', 'sys_err_invalid_final_order', 'zh_CN', '', '错误, 请输入有效成品单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-16 23:24:50');
INSERT INTO wac_sysmsg VALUES ('12', 'sys_err_invalid_goods_category', 'zh_CN', '', '错误, 请输入有效货物品种!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-17 00:07:48');
INSERT INTO wac_sysmsg VALUES ('13', 'sys_log_add', 'zh_CN', '', '%s 添加了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-17 02:04:16');
INSERT INTO wac_sysmsg VALUES ('14', 'sys_log_edit', 'zh_CN', '', '%s 编辑了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-17 02:04:18');
INSERT INTO wac_sysmsg VALUES ('15', 'sys_log_delete', 'zh_CN', '', '%s 删除了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-17 02:04:00');
INSERT INTO wac_sysmsg VALUES ('16', 'sys_err_invalid_supplier', 'zh_CN', '', '错误, 请输入有效供应厂商!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-20 02:36:45');
INSERT INTO wac_sysmsg VALUES ('17', 'sys_err_invalid_color', 'zh_CN', null, '错误, 请输入有效颜色!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('18', 'sys_err_invalid_jar', 'zh_CN', null, '错误, 请输入有效缸号!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('19', 'sys_err_invalid_axis', 'zh_CN', null, '错误, 请输入有效轴号!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('20', 'sys_err_invalid_cotton_goods_category', 'zh_CN', null, '错误, 请输入有效棉纱品种!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('21', 'sys_audit_succ', 'zh_CN', '', '审核操作完成!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-23 18:24:22');
INSERT INTO wac_sysmsg VALUES ('22', 'sys_err_invaild_audit_status', 'zh_CN', '', '错误, 审核操作无效! \r\n请检查本单是否已审核?', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-23 18:26:46');
INSERT INTO wac_sysmsg VALUES ('23', 'sys_err_invaild_audit_zero_item', 'zh_CN', '', '错误, 审核操作无效! \r\n请检查本单是否存在输入子项?', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-02-24 19:41:12');
INSERT INTO wac_sysmsg VALUES ('24', 'sys_err_invalid_spinner', 'zh_CN', null, '错误, 请输入有效纺织机号!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('25', 'sys_invalid_user_authenticate', 'zh_CN', '', '错误, 无效的用户验证!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-03-03 19:48:22');
INSERT INTO wac_sysmsg VALUES ('26', 'sys_err_invalid_customer_order', 'zh_CN', '', '错误, 请输入有效订单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-03-13 19:12:01');
INSERT INTO wac_sysmsg VALUES ('27', 'sys_err_invalid_customer', 'zh_CN', '', '错误, 请输入有效客户!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-04-06 22:51:15');
INSERT INTO wac_sysmsg VALUES ('28', 'sys_err_sample_jar_not_existed', 'zh_CN', null, '错误, 请输入有效封样缸号!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('29', 'sys_err_invalid_storehouse', 'zh_CN', '', '错误, 请输入有效仓库!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-04-06 22:51:06');
INSERT INTO wac_sysmsg VALUES ('30', 'sys_err_goods_number_insufficient_in_factory', 'zh_CN', null, '错误, \'%s\' 存量不足!  [现有数量%s,消耗数量%s]', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('31', 'sys_log_audit', 'zh_CN', null, '%s 审核了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('32', 'sys_err_predefined_class_delete', 'zh_CN', null, '错误, 此分类为系统预定义的必须项,禁止删除!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('33', 'sys_err_predefined_class_edit', 'zh_CN', null, '错误, 此分类为系统预定义的必须项,编码禁止更改!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '0000-00-00 00:00:00');
INSERT INTO wac_sysmsg VALUES ('34', 'sys_err_invaild_target', 'zh_CN', '', '错误, 请输入有效目的地!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-06-22 14:39:41');
INSERT INTO wac_sysmsg VALUES ('35', 'sys_err_invalid_dispatch_order', 'zh_CN', '', '错误, 请输入有效出仓单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-08-19 09:28:33');
INSERT INTO wac_sysmsg VALUES ('36', 'sys_err_dispatch_order_qc_only_once', 'zh_CN', '', '错误, 此出货单已存在QC记录, 请复查以往QC单!', '0', '0', null, null, '50', '1', '2011-06-03 06:23:10', '2010-09-01 03:08:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_log
-- ----------------------------
INSERT INTO wac_system_log VALUES ('1', '1', '2', 'admin 添加了 用户权限, (id为 32)', '0', '0', null, null, '50', '1', '2010-09-06 07:18:47', '2010-09-06 07:18:47');
INSERT INTO wac_system_log VALUES ('2', '1', '2', 'admin 添加了 订单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:35', '2010-09-06 07:20:35');
INSERT INTO wac_system_log VALUES ('3', '1', '2', 'admin 添加了 订单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:20:43', '2010-09-06 07:20:43');
INSERT INTO wac_system_log VALUES ('4', '1', '2', 'admin 添加了 生产单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:22:41', '2010-09-06 07:22:41');
INSERT INTO wac_system_log VALUES ('5', '1', '2', 'admin 添加了 生产单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:23:00', '2010-09-06 07:23:00');
INSERT INTO wac_system_log VALUES ('6', '1', '2', 'admin 添加了 棉纱单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:02', '2010-09-06 07:24:02');
INSERT INTO wac_system_log VALUES ('7', '1', '2', 'admin 添加了 棉纱单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:21', '2010-09-06 07:24:21');
INSERT INTO wac_system_log VALUES ('8', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:24:50', '2010-09-06 07:24:50');
INSERT INTO wac_system_log VALUES ('9', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:25:09', '2010-09-06 07:25:09');
INSERT INTO wac_system_log VALUES ('10', '1', '2', 'admin 添加了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:26:57', '2010-09-06 07:26:57');
INSERT INTO wac_system_log VALUES ('11', '1', '2', 'admin 添加了 浆染单项目, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:27:45', '2010-09-06 07:27:45');
INSERT INTO wac_system_log VALUES ('12', '1', '2', 'admin 添加了 浆染单项目, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:02', '2010-09-06 07:28:02');
INSERT INTO wac_system_log VALUES ('13', '1', '2', 'admin 审核了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:16', '2010-09-06 07:28:16');
INSERT INTO wac_system_log VALUES ('14', '1', '2', 'admin 添加了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:28:48', '2010-09-06 07:28:48');
INSERT INTO wac_system_log VALUES ('15', '1', '2', 'admin 添加了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:53', '2010-09-06 07:35:53');
INSERT INTO wac_system_log VALUES ('16', '1', '2', 'admin 审核了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:35:58', '2010-09-06 07:35:58');
INSERT INTO wac_system_log VALUES ('17', '1', '2', 'admin 添加了 织造单子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:28', '2010-09-06 07:38:28');
INSERT INTO wac_system_log VALUES ('18', '1', '2', 'admin 审核了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 07:38:34', '2010-09-06 07:38:34');
INSERT INTO wac_system_log VALUES ('19', '1', '2', 'admin 编辑了 权限管理, (id为 26)', '0', '0', null, null, '50', '1', '2010-09-23 08:23:40', '2010-09-23 08:23:40');
INSERT INTO wac_system_log VALUES ('20', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:46:47', '2010-10-04 07:46:47');
INSERT INTO wac_system_log VALUES ('21', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:47:50', '2010-10-04 07:47:50');
INSERT INTO wac_system_log VALUES ('22', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:49:12', '2010-10-04 07:49:12');
INSERT INTO wac_system_log VALUES ('23', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:50:13', '2010-10-04 07:50:13');
INSERT INTO wac_system_log VALUES ('24', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:54:53', '2010-10-04 07:54:53');
INSERT INTO wac_system_log VALUES ('25', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:55:37', '2010-10-04 07:55:37');
INSERT INTO wac_system_log VALUES ('26', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:56:20', '2010-10-04 07:56:20');
INSERT INTO wac_system_log VALUES ('27', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 07:59:51', '2010-10-04 07:59:51');
INSERT INTO wac_system_log VALUES ('28', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:00:29', '2010-10-04 08:00:29');
INSERT INTO wac_system_log VALUES ('29', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:10', '2010-10-04 08:01:10');
INSERT INTO wac_system_log VALUES ('30', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:01:48', '2010-10-04 08:01:48');
INSERT INTO wac_system_log VALUES ('31', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:03:08', '2010-10-04 08:03:08');
INSERT INTO wac_system_log VALUES ('32', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:07:42', '2010-10-04 08:07:42');
INSERT INTO wac_system_log VALUES ('33', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:08:29', '2010-10-04 08:08:29');
INSERT INTO wac_system_log VALUES ('34', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2010-10-04 08:10:59', '2010-10-04 08:10:59');
INSERT INTO wac_system_log VALUES ('35', '1', '2', 'admin 添加了 用户管理, (id为 4)', '0', '0', null, null, '50', '1', '2010-10-04 08:17:10', '2010-10-04 08:17:10');
INSERT INTO wac_system_log VALUES ('36', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:18:55', '2010-10-04 08:18:55');
INSERT INTO wac_system_log VALUES ('37', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:08', '2010-10-04 08:19:08');
INSERT INTO wac_system_log VALUES ('38', '1', '2', 'admin 删除了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2010-10-04 08:19:21', '2010-10-04 08:19:21');
INSERT INTO wac_system_log VALUES ('39', '1', '2', 'admin 添加了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:13:51', '2010-12-30 08:13:51');
INSERT INTO wac_system_log VALUES ('40', '1', '2', 'admin 删除了 用户组管理, (id为 6)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:15', '2010-12-30 08:20:15');
INSERT INTO wac_system_log VALUES ('41', '1', '2', 'admin 添加了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:20:51', '2010-12-30 08:20:51');
INSERT INTO wac_system_log VALUES ('42', '1', '2', 'admin 添加了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:22:38', '2010-12-30 08:22:38');
INSERT INTO wac_system_log VALUES ('43', '1', '2', 'admin 删除了 用户组管理, (id为 8)', '0', '0', null, null, '50', '1', '2010-12-30 08:23:09', '2010-12-30 08:23:09');
INSERT INTO wac_system_log VALUES ('44', '1', '2', 'admin 删除了 用户组管理, (id为 7)', '0', '0', null, null, '50', '1', '2010-12-30 08:40:20', '2010-12-30 08:40:20');
INSERT INTO wac_system_log VALUES ('45', '1', '2', 'admin 添加了 用户组管理, (id为 9)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:04', '2010-12-30 08:41:04');
INSERT INTO wac_system_log VALUES ('46', '1', '2', 'admin 添加了 用户组管理, (id为 10)', '0', '0', null, null, '50', '1', '2010-12-30 08:41:18', '2010-12-30 08:41:18');
INSERT INTO wac_system_log VALUES ('47', '1', '2', 'admin 添加了 用户组管理, (id为 11)', '0', '0', null, null, '50', '1', '2010-12-30 08:48:56', '2010-12-30 08:48:56');
INSERT INTO wac_system_log VALUES ('48', '1', '2', 'admin 添加了 用户组管理, (id为 12)', '0', '0', null, null, '50', '1', '2010-12-30 08:55:06', '2010-12-30 08:55:06');
INSERT INTO wac_system_log VALUES ('49', '1', '2', 'admin 添加了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-03 07:20:10', '2011-01-03 07:20:10');
INSERT INTO wac_system_log VALUES ('50', '1', '2', 'admin 删除了 用户组管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-01-04 10:29:42', '2011-01-04 10:29:42');
INSERT INTO wac_system_log VALUES ('51', '1', '2', 'admin 添加了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-01-04 10:30:06', '2011-01-04 10:30:06');
INSERT INTO wac_system_log VALUES ('52', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:34:27', '2011-01-04 10:34:27');
INSERT INTO wac_system_log VALUES ('53', '1', '2', 'admin 删除了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:05', '2011-01-04 10:35:05');
INSERT INTO wac_system_log VALUES ('54', '1', '2', 'admin 添加了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-04 10:35:20', '2011-01-04 10:35:20');
INSERT INTO wac_system_log VALUES ('55', '1', '2', 'admin 删除了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-01-05 06:10:51', '2011-01-05 06:10:51');
INSERT INTO wac_system_log VALUES ('56', '1', '2', 'admin 添加了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:23:56', '2011-01-06 03:23:56');
INSERT INTO wac_system_log VALUES ('57', '1', '2', 'admin 删除了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:31', '2011-01-06 03:25:31');
INSERT INTO wac_system_log VALUES ('58', '1', '2', 'admin 添加了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:25:54', '2011-01-06 03:25:54');
INSERT INTO wac_system_log VALUES ('59', '1', '2', 'admin 编辑了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-06 03:26:11', '2011-01-06 03:26:11');
INSERT INTO wac_system_log VALUES ('60', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:00', '2011-01-07 03:33:00');
INSERT INTO wac_system_log VALUES ('61', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:33:52', '2011-01-07 03:33:52');
INSERT INTO wac_system_log VALUES ('62', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:35:58', '2011-01-07 03:35:58');
INSERT INTO wac_system_log VALUES ('63', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:36:44', '2011-01-07 03:36:44');
INSERT INTO wac_system_log VALUES ('64', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:47:34', '2011-01-07 03:47:34');
INSERT INTO wac_system_log VALUES ('65', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:53:09', '2011-01-07 03:53:09');
INSERT INTO wac_system_log VALUES ('66', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 03:59:54', '2011-01-07 03:59:54');
INSERT INTO wac_system_log VALUES ('67', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:49', '2011-01-07 04:00:49');
INSERT INTO wac_system_log VALUES ('68', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-07 04:00:54', '2011-01-07 04:00:54');
INSERT INTO wac_system_log VALUES ('69', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:26:53', '2011-01-10 09:26:53');
INSERT INTO wac_system_log VALUES ('70', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:29:05', '2011-01-10 09:29:05');
INSERT INTO wac_system_log VALUES ('71', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:28', '2011-01-10 09:33:28');
INSERT INTO wac_system_log VALUES ('72', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:33:33', '2011-01-10 09:33:33');
INSERT INTO wac_system_log VALUES ('73', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:05', '2011-01-10 09:34:05');
INSERT INTO wac_system_log VALUES ('74', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:34:18', '2011-01-10 09:34:18');
INSERT INTO wac_system_log VALUES ('75', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:48:58', '2011-01-10 09:48:58');
INSERT INTO wac_system_log VALUES ('76', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:21', '2011-01-10 09:49:21');
INSERT INTO wac_system_log VALUES ('77', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:49:36', '2011-01-10 09:49:36');
INSERT INTO wac_system_log VALUES ('78', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 09:52:20', '2011-01-10 09:52:20');
INSERT INTO wac_system_log VALUES ('79', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:05:08', '2011-01-10 10:05:08');
INSERT INTO wac_system_log VALUES ('80', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-01-10 10:15:58', '2011-01-10 10:15:58');
INSERT INTO wac_system_log VALUES ('81', '1', '2', 'admin 添加了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:16:39', '2011-01-10 10:16:39');
INSERT INTO wac_system_log VALUES ('82', '1', '2', 'admin 编辑了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:19', '2011-01-10 10:17:19');
INSERT INTO wac_system_log VALUES ('83', '1', '2', 'admin 删除了 国家, (id为 3)', '0', '0', null, null, '50', '1', '2011-01-10 10:17:29', '2011-01-10 10:17:29');
INSERT INTO wac_system_log VALUES ('84', '1', '2', 'admin 添加了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:45:08', '2011-01-10 10:45:08');
INSERT INTO wac_system_log VALUES ('85', '1', '2', 'admin 编辑了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:46:15', '2011-01-10 10:46:15');
INSERT INTO wac_system_log VALUES ('86', '1', '2', 'admin 删除了 国家, (id为 4)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:00', '2011-01-10 10:47:00');
INSERT INTO wac_system_log VALUES ('87', '1', '2', 'admin 添加了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-10 10:47:15', '2011-01-10 10:47:15');
INSERT INTO wac_system_log VALUES ('88', '1', '2', 'admin 添加了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:29', '2011-01-10 10:53:29');
INSERT INTO wac_system_log VALUES ('89', '1', '2', 'admin 删除了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-01-10 10:53:48', '2011-01-10 10:53:48');
INSERT INTO wac_system_log VALUES ('90', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:45:54', '2011-01-21 10:45:54');
INSERT INTO wac_system_log VALUES ('91', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:00', '2011-01-21 10:46:00');
INSERT INTO wac_system_log VALUES ('92', '1', '2', 'admin 添加了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:11', '2011-01-21 10:46:11');
INSERT INTO wac_system_log VALUES ('93', '1', '2', 'admin 删除了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:25', '2011-01-21 10:46:25');
INSERT INTO wac_system_log VALUES ('94', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:46:59', '2011-01-21 10:46:59');
INSERT INTO wac_system_log VALUES ('95', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-01-21 10:47:13', '2011-01-21 10:47:13');
INSERT INTO wac_system_log VALUES ('96', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:07', '2011-01-21 10:48:07');
INSERT INTO wac_system_log VALUES ('97', '1', '2', 'admin 添加了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:12', '2011-01-21 10:48:12');
INSERT INTO wac_system_log VALUES ('98', '1', '2', 'admin 添加了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:15', '2011-01-21 10:48:15');
INSERT INTO wac_system_log VALUES ('99', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-01-21 10:48:31', '2011-01-21 10:48:31');
INSERT INTO wac_system_log VALUES ('100', '1', '2', 'admin 删除了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-01-21 10:52:13', '2011-01-21 10:52:13');
INSERT INTO wac_system_log VALUES ('101', '1', '2', 'admin 删除了 国家, (id为 10)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:07', '2011-01-21 10:54:07');
INSERT INTO wac_system_log VALUES ('102', '1', '2', 'admin 编辑了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:29', '2011-01-21 10:54:29');
INSERT INTO wac_system_log VALUES ('103', '1', '2', 'admin 删除了 国家, (id为 9)', '0', '0', null, null, '50', '1', '2011-01-21 10:54:35', '2011-01-21 10:54:35');
INSERT INTO wac_system_log VALUES ('104', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:18', '2011-01-22 03:27:18');
INSERT INTO wac_system_log VALUES ('105', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:27:27', '2011-01-22 03:27:27');
INSERT INTO wac_system_log VALUES ('106', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:48:52', '2011-01-22 03:48:52');
INSERT INTO wac_system_log VALUES ('107', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:34', '2011-01-22 03:54:34');
INSERT INTO wac_system_log VALUES ('108', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 03:54:43', '2011-01-22 03:54:43');
INSERT INTO wac_system_log VALUES ('109', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:40', '2011-01-22 09:05:40');
INSERT INTO wac_system_log VALUES ('110', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:05:47', '2011-01-22 09:05:47');
INSERT INTO wac_system_log VALUES ('111', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-22 09:08:54', '2011-01-22 09:08:54');
INSERT INTO wac_system_log VALUES ('112', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:25', '2011-01-24 07:42:25');
INSERT INTO wac_system_log VALUES ('113', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 07:42:30', '2011-01-24 07:42:30');
INSERT INTO wac_system_log VALUES ('114', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:21', '2011-01-24 08:51:21');
INSERT INTO wac_system_log VALUES ('115', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-24 08:51:32', '2011-01-24 08:51:32');
INSERT INTO wac_system_log VALUES ('116', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:27', '2011-01-27 08:57:27');
INSERT INTO wac_system_log VALUES ('117', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:57:35', '2011-01-27 08:57:35');
INSERT INTO wac_system_log VALUES ('118', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:30', '2011-01-27 08:58:30');
INSERT INTO wac_system_log VALUES ('119', '1', '2', 'admin 编辑了 国家, (id为 5)', '0', '0', null, null, '50', '1', '2011-01-27 08:58:36', '2011-01-27 08:58:36');
INSERT INTO wac_system_log VALUES ('120', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:32', '2011-02-08 08:40:32');
INSERT INTO wac_system_log VALUES ('121', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-02-08 08:40:53', '2011-02-08 08:40:53');
INSERT INTO wac_system_log VALUES ('122', '1', '2', 'admin 编辑了 用户组管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-02-15 10:20:26', '2011-02-15 10:20:26');
INSERT INTO wac_system_log VALUES ('123', '1', '2', 'admin 添加了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-25 08:39:05', '2011-02-25 08:39:05');
INSERT INTO wac_system_log VALUES ('124', '1', '2', 'admin 添加了 用户组管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-02-25 08:40:12', '2011-02-25 08:40:12');
INSERT INTO wac_system_log VALUES ('125', '1', '2', 'admin 添加了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:44:57', '2011-02-25 08:44:57');
INSERT INTO wac_system_log VALUES ('126', '1', '2', 'admin 删除了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-02-25 08:46:56', '2011-02-25 08:46:56');
INSERT INTO wac_system_log VALUES ('127', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 08:45:40', '2011-02-28 08:45:40');
INSERT INTO wac_system_log VALUES ('128', '1', '2', 'admin 编辑了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-02-28 09:45:52', '2011-02-28 09:45:52');
INSERT INTO wac_system_log VALUES ('129', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:39:37', '2011-03-01 07:39:37');
INSERT INTO wac_system_log VALUES ('130', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:02', '2011-03-01 07:43:02');
INSERT INTO wac_system_log VALUES ('131', '1', '2', 'admin 编辑了 国家, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-01 07:43:15', '2011-03-01 07:43:15');
INSERT INTO wac_system_log VALUES ('132', '1', '2', 'admin 删除了 系统参数, (id为 13,11,10,9,8,7,6,5,4,3,2)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:26', '2011-03-01 07:45:26');
INSERT INTO wac_system_log VALUES ('133', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:45:46', '2011-03-01 07:45:46');
INSERT INTO wac_system_log VALUES ('134', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:47:54', '2011-03-01 07:47:54');
INSERT INTO wac_system_log VALUES ('135', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:06', '2011-03-01 07:51:06');
INSERT INTO wac_system_log VALUES ('136', '1', '2', 'admin 编辑了 系统参数, (id为 1)', '0', '0', null, null, '50', '1', '2011-03-01 07:51:38', '2011-03-01 07:51:38');
INSERT INTO wac_system_log VALUES ('137', '1', '2', 'admin 添加了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 07:53:11', '2011-03-01 07:53:11');
INSERT INTO wac_system_log VALUES ('138', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 08:08:06', '2011-03-01 08:08:06');
INSERT INTO wac_system_log VALUES ('139', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 08:56:14', '2011-03-01 08:56:14');
INSERT INTO wac_system_log VALUES ('140', '1', '2', 'admin 编辑了 系统参数, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:50', '2011-03-01 09:01:50');
INSERT INTO wac_system_log VALUES ('141', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-01 09:01:57', '2011-03-01 09:01:57');
INSERT INTO wac_system_log VALUES ('142', '1', '2', 'admin 添加了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-29 10:19:38', '2011-03-29 10:19:38');
INSERT INTO wac_system_log VALUES ('143', '1', '2', 'admin 编辑了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-29 10:20:36', '2011-03-29 10:20:36');
INSERT INTO wac_system_log VALUES ('144', '1', '2', 'admin 删除了 用户管理, (id为 5)', '0', '0', null, null, '50', '1', '2011-03-29 10:20:54', '2011-03-29 10:20:54');
INSERT INTO wac_system_log VALUES ('145', '1', '2', 'admin 添加了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-29 10:26:23', '2011-03-29 10:26:23');
INSERT INTO wac_system_log VALUES ('146', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-29 10:26:48', '2011-03-29 10:26:48');
INSERT INTO wac_system_log VALUES ('147', '1', '2', 'admin 添加了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:19', '2011-03-29 10:30:19');
INSERT INTO wac_system_log VALUES ('148', '1', '2', 'admin 编辑了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:46', '2011-03-29 10:30:46');
INSERT INTO wac_system_log VALUES ('149', '1', '2', 'admin 删除了 权限管理, (id为 33)', '0', '0', null, null, '50', '1', '2011-03-29 10:30:55', '2011-03-29 10:30:55');
INSERT INTO wac_system_log VALUES ('150', '1', '2', 'admin 添加了 用户管理, (id为 7)', '0', '0', null, null, '50', '1', '2011-03-30 03:39:45', '2011-03-30 03:39:45');
INSERT INTO wac_system_log VALUES ('151', '1', '2', 'admin 编辑了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2011-03-30 03:39:54', '2011-03-30 03:39:54');
INSERT INTO wac_system_log VALUES ('152', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-30 03:40:28', '2011-03-30 03:40:28');
INSERT INTO wac_system_log VALUES ('153', '1', '2', 'admin 添加了 用户管理, (id为 8)', '0', '0', null, null, '50', '1', '2011-03-30 08:47:10', '2011-03-30 08:47:10');
INSERT INTO wac_system_log VALUES ('154', '1', '2', 'admin 删除了 用户管理, (id为 8)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:27', '2011-03-30 09:18:27');
INSERT INTO wac_system_log VALUES ('155', '1', '2', 'admin 删除了 用户管理, (id为 7)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:32', '2011-03-30 09:18:32');
INSERT INTO wac_system_log VALUES ('156', '1', '2', 'admin 删除了 用户管理, (id为 6)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:37', '2011-03-30 09:18:37');
INSERT INTO wac_system_log VALUES ('157', '1', '2', 'admin 删除了 用户管理, (id为 4)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:42', '2011-03-30 09:18:42');
INSERT INTO wac_system_log VALUES ('158', '1', '2', 'admin 删除了 用户管理, (id为 3)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:47', '2011-03-30 09:18:47');
INSERT INTO wac_system_log VALUES ('159', '1', '2', 'admin 删除了 用户管理, (id为 2)', '0', '0', null, null, '50', '1', '2011-03-30 09:18:52', '2011-03-30 09:18:52');
INSERT INTO wac_system_log VALUES ('160', '1', '2', 'admin 添加了 用户管理, (id为 9)', '0', '0', null, null, '50', '1', '2011-03-30 09:19:27', '2011-03-30 09:19:27');
INSERT INTO wac_system_log VALUES ('161', '1', '2', 'admin 添加了 用户管理, (id为 10)', '0', '0', null, null, '50', '1', '2011-03-30 09:19:46', '2011-03-30 09:19:46');
INSERT INTO wac_system_log VALUES ('162', '1', '2', 'admin 删除了 用户管理, (id为 10)', '0', '0', null, null, '50', '1', '2011-03-30 09:36:46', '2011-03-30 09:36:46');
INSERT INTO wac_system_log VALUES ('163', '1', '2', 'admin 删除了 用户管理, (id为 9)', '0', '0', null, null, '50', '1', '2011-03-30 09:36:51', '2011-03-30 09:36:51');
INSERT INTO wac_system_log VALUES ('164', '1', '2', 'admin 添加了 用户管理, (id为 11)', '0', '0', null, null, '50', '1', '2011-03-30 09:37:10', '2011-03-30 09:37:10');
INSERT INTO wac_system_log VALUES ('165', '1', '2', 'admin 添加了 用户管理, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-30 09:37:24', '2011-03-30 09:37:24');
INSERT INTO wac_system_log VALUES ('166', '1', '2', 'admin 删除了 用户管理, (id为 12)', '0', '0', null, null, '50', '1', '2011-03-30 10:26:02', '2011-03-30 10:26:02');
INSERT INTO wac_system_log VALUES ('167', '1', '2', 'admin 删除了 用户管理, (id为 11)', '0', '0', null, null, '50', '1', '2011-03-30 10:26:07', '2011-03-30 10:26:07');
INSERT INTO wac_system_log VALUES ('168', '1', '2', 'admin 添加了 用户管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-03-30 10:31:30', '2011-03-30 10:31:30');
INSERT INTO wac_system_log VALUES ('169', '1', '2', 'admin 删除了 用户管理, (id为 13)', '0', '0', null, null, '50', '1', '2011-03-30 10:43:13', '2011-03-30 10:43:13');
INSERT INTO wac_system_log VALUES ('170', '1', '2', 'admin 添加了 用户管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-30 10:44:21', '2011-03-30 10:44:21');
INSERT INTO wac_system_log VALUES ('171', '1', '2', 'admin 删除了 用户管理, (id为 14)', '0', '0', null, null, '50', '1', '2011-03-31 02:34:46', '2011-03-31 02:34:46');
INSERT INTO wac_system_log VALUES ('172', '1', '2', 'admin 删除了 用户管理, (id为 15)', '0', '0', null, null, '50', '1', '2011-03-31 02:38:45', '2011-03-31 02:38:45');
INSERT INTO wac_system_log VALUES ('173', '1', '2', 'admin 删除了 用户管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-03-31 02:40:43', '2011-03-31 02:40:43');
INSERT INTO wac_system_log VALUES ('174', '1', '2', 'admin 添加了 用户管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-03-31 02:40:57', '2011-03-31 02:40:57');
INSERT INTO wac_system_log VALUES ('175', '1', '2', 'admin 添加了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-06 09:34:21', '2011-04-06 09:34:21');
INSERT INTO wac_system_log VALUES ('176', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:52:39', '2011-04-07 02:52:39');
INSERT INTO wac_system_log VALUES ('177', '1', '2', 'admin 编辑了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:52:55', '2011-04-07 02:52:55');
INSERT INTO wac_system_log VALUES ('178', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-07 02:53:41', '2011-04-07 02:53:41');
INSERT INTO wac_system_log VALUES ('179', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:55:06', '2011-04-07 03:55:06');
INSERT INTO wac_system_log VALUES ('180', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:56:26', '2011-04-07 03:56:26');
INSERT INTO wac_system_log VALUES ('181', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 03:56:34', '2011-04-07 03:56:34');
INSERT INTO wac_system_log VALUES ('182', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 06:28:51', '2011-04-07 06:28:51');
INSERT INTO wac_system_log VALUES ('183', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-04-07 06:28:58', '2011-04-07 06:28:58');
INSERT INTO wac_system_log VALUES ('184', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-07 06:29:11', '2011-04-07 06:29:11');
INSERT INTO wac_system_log VALUES ('185', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-07 06:29:17', '2011-04-07 06:29:17');
INSERT INTO wac_system_log VALUES ('186', '1', '2', 'admin 编辑了 系统参数, (id为 14)', '0', '0', null, null, '50', '1', '2011-04-07 08:36:06', '2011-04-07 08:36:06');
INSERT INTO wac_system_log VALUES ('187', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:55:51', '2011-04-11 02:55:51');
INSERT INTO wac_system_log VALUES ('188', '1', '2', 'admin 编辑了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:55:59', '2011-04-11 02:55:59');
INSERT INTO wac_system_log VALUES ('189', '1', '2', 'admin 删除了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-04-11 02:56:05', '2011-04-11 02:56:05');
INSERT INTO wac_system_log VALUES ('190', '1', '2', 'admin 添加了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:44', '2011-04-11 03:10:44');
INSERT INTO wac_system_log VALUES ('191', '1', '2', 'admin 编辑了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:53', '2011-04-11 03:10:53');
INSERT INTO wac_system_log VALUES ('192', '1', '2', 'admin 删除了 国家, (id为 8)', '0', '0', null, null, '50', '1', '2011-04-11 03:10:56', '2011-04-11 03:10:56');
INSERT INTO wac_system_log VALUES ('193', '1', '2', 'admin 添加了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 05:42:33', '2011-04-11 05:42:33');
INSERT INTO wac_system_log VALUES ('194', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:33', '2011-04-11 06:02:33');
INSERT INTO wac_system_log VALUES ('195', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:48', '2011-04-11 06:02:48');
INSERT INTO wac_system_log VALUES ('196', '1', '2', 'admin 删除了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 06:02:54', '2011-04-11 06:02:54');
INSERT INTO wac_system_log VALUES ('197', '1', '2', 'admin 添加了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-04-11 06:37:58', '2011-04-11 06:37:58');
INSERT INTO wac_system_log VALUES ('198', '1', '2', 'admin 删除了 用户组管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-04-11 06:50:11', '2011-04-11 06:50:11');
INSERT INTO wac_system_log VALUES ('199', '1', '2', 'admin 添加了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 07:43:40', '2011-04-11 07:43:40');
INSERT INTO wac_system_log VALUES ('200', '1', '2', 'admin 删除了 用户组管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-04-11 07:45:44', '2011-04-11 07:45:44');
INSERT INTO wac_system_log VALUES ('201', '1', '2', 'admin 添加了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:45:59', '2011-04-11 07:45:59');
INSERT INTO wac_system_log VALUES ('202', '1', '2', 'admin 编辑了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:46:13', '2011-04-11 07:46:13');
INSERT INTO wac_system_log VALUES ('203', '1', '2', 'admin 删除了 用户组管理, (id为 19)', '0', '0', null, null, '50', '1', '2011-04-11 07:46:19', '2011-04-11 07:46:19');
INSERT INTO wac_system_log VALUES ('204', '1', '2', 'admin 编辑了 权限管理, (id为 32)', '0', '0', null, null, '50', '1', '2011-04-11 07:55:10', '2011-04-11 07:55:10');
INSERT INTO wac_system_log VALUES ('205', '1', '2', 'admin 编辑了 用户管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-06-02 09:20:36', '2011-06-02 09:20:36');
INSERT INTO wac_system_log VALUES ('206', '1', '2', 'admin 添加了 系统信息, (id为 37)', '0', '0', null, null, '50', '1', '2011-06-03 03:57:48', '2011-06-03 03:57:48');
INSERT INTO wac_system_log VALUES ('207', '1', '2', 'admin 删除了 系统信息, (id为 37)', '0', '0', null, null, '50', '1', '2011-06-03 03:58:10', '2011-06-03 03:58:10');
INSERT INTO wac_system_log VALUES ('208', '1', '2', 'admin 添加了 系统信息, (id为 38)', '0', '0', null, null, '50', '1', '2011-06-03 03:58:22', '2011-06-03 03:58:22');
INSERT INTO wac_system_log VALUES ('209', '1', '2', 'admin 编辑了 系统信息, (id为 38)', '0', '0', null, null, '50', '1', '2011-06-03 03:58:34', '2011-06-03 03:58:34');
INSERT INTO wac_system_log VALUES ('210', '1', '2', 'admin 删除了 系统信息, (id为 38)', '0', '0', null, null, '50', '1', '2011-06-03 03:58:39', '2011-06-03 03:58:39');
INSERT INTO wac_system_log VALUES ('211', '1', '2', 'admin 添加了 系统信息, (id为 39)', '0', '0', null, null, '50', '1', '2011-06-03 06:34:23', '2011-06-03 06:34:23');
INSERT INTO wac_system_log VALUES ('212', '1', '2', 'admin 删除了 系统信息, (id为 39)', '0', '0', null, null, '50', '1', '2011-06-03 07:00:31', '2011-06-03 07:00:31');
INSERT INTO wac_system_log VALUES ('213', '1', '2', 'admin 编辑了 系统信息, (id为 36)', '0', '0', null, null, '50', '1', '2011-06-03 07:27:48', '2011-06-03 07:27:48');
INSERT INTO wac_system_log VALUES ('214', '1', '2', 'admin 添加了 系统信息, (id为 40)', '0', '0', null, null, '50', '1', '2011-06-03 08:03:43', '2011-06-03 08:03:43');
INSERT INTO wac_system_log VALUES ('215', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:36:28', '2011-06-03 08:36:28');
INSERT INTO wac_system_log VALUES ('216', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:36:42', '2011-06-03 08:36:42');
INSERT INTO wac_system_log VALUES ('217', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:37:14', '2011-06-03 08:37:14');
INSERT INTO wac_system_log VALUES ('218', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:38:32', '2011-06-03 08:38:32');
INSERT INTO wac_system_log VALUES ('219', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:44:50', '2011-06-03 08:44:50');
INSERT INTO wac_system_log VALUES ('220', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:46:19', '2011-06-03 08:46:19');
INSERT INTO wac_system_log VALUES ('221', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:48:04', '2011-06-03 08:48:04');
INSERT INTO wac_system_log VALUES ('222', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:56:13', '2011-06-03 08:56:13');
INSERT INTO wac_system_log VALUES ('223', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:58:00', '2011-06-03 08:58:00');
INSERT INTO wac_system_log VALUES ('224', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:59:13', '2011-06-03 08:59:13');
INSERT INTO wac_system_log VALUES ('225', '1', '2', 'admin 编辑了 用户组管理, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-03 08:59:49', '2011-06-03 08:59:49');
INSERT INTO wac_system_log VALUES ('226', '1', '2', 'admin 编辑了 系统信息, (id为 4)', '0', '0', null, null, '50', '1', '2011-06-03 09:06:41', '2011-06-03 09:06:41');
INSERT INTO wac_system_log VALUES ('227', '1', '2', 'admin 编辑了 系统信息, (id为 5)', '0', '0', null, null, '50', '1', '2011-06-03 09:08:08', '2011-06-03 09:08:08');
INSERT INTO wac_system_log VALUES ('228', '1', '2', 'admin 编辑了 系统信息, (id为 5)', '0', '0', null, null, '50', '1', '2011-06-03 09:08:22', '2011-06-03 09:08:22');
INSERT INTO wac_system_log VALUES ('229', '1', '2', 'admin 编辑了 系统信息, (id为 5)', '0', '0', null, null, '50', '1', '2011-06-03 09:09:15', '2011-06-03 09:09:15');
INSERT INTO wac_system_log VALUES ('230', '1', '2', 'admin 编辑了 系统信息, (id为 5)', '0', '0', null, null, '50', '1', '2011-06-03 09:09:34', '2011-06-03 09:09:34');
INSERT INTO wac_system_log VALUES ('231', '1', '2', 'admin 编辑了 系统信息, (id为 4)', '0', '0', null, null, '50', '1', '2011-06-03 09:09:46', '2011-06-03 09:09:46');
INSERT INTO wac_system_log VALUES ('232', '1', '2', 'admin 添加了 , (id为 1)', '0', '0', null, null, '50', '1', '2011-06-03 09:39:23', '2011-06-03 09:39:23');
INSERT INTO wac_system_log VALUES ('233', '1', '2', 'admin 添加了 , (id为 2)', '0', '0', null, null, '50', '1', '2011-06-07 02:38:14', '2011-06-07 02:38:14');
INSERT INTO wac_system_log VALUES ('234', '1', '2', 'admin 添加了 , (id为 3)', '0', '0', null, null, '50', '1', '2011-06-07 02:39:45', '2011-06-07 02:39:45');
INSERT INTO wac_system_log VALUES ('235', '1', '2', 'admin 添加了 wacStorehouse, (id为 4)', '0', '0', null, null, '50', '1', '2011-06-07 02:44:43', '2011-06-07 02:44:43');
INSERT INTO wac_system_log VALUES ('236', '1', '2', 'admin 添加了 wacStorehouse, (id为 5)', '0', '0', null, null, '50', '1', '2011-06-07 02:59:48', '2011-06-07 02:59:48');
INSERT INTO wac_system_log VALUES ('237', '1', '2', 'admin 添加了 wacStorehouse, (id为 6)', '0', '0', null, null, '50', '1', '2011-06-07 03:00:01', '2011-06-07 03:00:01');
INSERT INTO wac_system_log VALUES ('238', '1', '2', 'admin 添加了 wacStorehouse, (id为 7)', '0', '0', null, null, '50', '1', '2011-06-07 03:00:47', '2011-06-07 03:00:47');
INSERT INTO wac_system_log VALUES ('239', '1', '2', 'admin 添加了 wacStorehouse, (id为 8)', '0', '0', null, null, '50', '1', '2011-06-07 03:00:59', '2011-06-07 03:00:59');
INSERT INTO wac_system_log VALUES ('240', '1', '2', 'admin 添加了 wacStorehouse, (id为 9)', '0', '0', null, null, '50', '1', '2011-06-07 03:01:31', '2011-06-07 03:01:31');
INSERT INTO wac_system_log VALUES ('241', '1', '2', 'admin 添加了 wacStorehouse, (id为 10)', '0', '0', null, null, '50', '1', '2011-06-07 06:25:15', '2011-06-07 06:25:15');
INSERT INTO wac_system_log VALUES ('242', '1', '2', 'admin 添加了 wacStorehouse, (id为 11)', '0', '0', null, null, '50', '1', '2011-06-07 06:37:14', '2011-06-07 06:37:14');
INSERT INTO wac_system_log VALUES ('243', '1', '2', 'admin 添加了 wacStorehouse, (id为 12)', '0', '0', null, null, '50', '1', '2011-06-07 06:39:09', '2011-06-07 06:39:09');
INSERT INTO wac_system_log VALUES ('244', '1', '2', 'admin 添加了 wacStorehouse, (id为 13)', '0', '0', null, null, '50', '1', '2011-06-07 06:39:19', '2011-06-07 06:39:19');
INSERT INTO wac_system_log VALUES ('245', '1', '2', 'admin 添加了 wacStorehouse, (id为 14)', '0', '0', null, null, '50', '1', '2011-06-07 06:39:52', '2011-06-07 06:39:52');
INSERT INTO wac_system_log VALUES ('246', '1', '2', 'admin 添加了 wacStorehouse, (id为 15)', '0', '0', null, null, '50', '1', '2011-06-07 06:47:36', '2011-06-07 06:47:36');
INSERT INTO wac_system_log VALUES ('247', '1', '2', 'admin 添加了 wacStorehouse, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-09 02:22:46', '2011-06-09 02:22:46');
INSERT INTO wac_system_log VALUES ('248', '1', '2', 'admin 添加了 wacStorehouse, (id为 17)', '0', '0', null, null, '50', '1', '2011-06-09 02:30:02', '2011-06-09 02:30:02');
INSERT INTO wac_system_log VALUES ('249', '1', '2', 'admin 编辑了 wacStorehouse, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-09 02:31:30', '2011-06-09 02:31:30');
INSERT INTO wac_system_log VALUES ('250', '1', '2', 'admin 编辑了 wacStorehouse, (id为 16)', '0', '0', null, null, '50', '1', '2011-06-09 02:33:00', '2011-06-09 02:33:00');
INSERT INTO wac_system_log VALUES ('251', '1', '2', 'admin 添加了 wacStorehouse, (id为 18)', '0', '0', null, null, '50', '1', '2011-06-09 02:36:19', '2011-06-09 02:36:19');
INSERT INTO wac_system_log VALUES ('252', '1', '2', 'admin 添加了 wacStorehouse, (id为 19)', '0', '0', null, null, '50', '1', '2011-06-09 02:50:11', '2011-06-09 02:50:11');
INSERT INTO wac_system_log VALUES ('253', '1', '2', 'admin 编辑了 wacStorehouse, (id为 19)', '0', '0', null, null, '50', '1', '2011-06-09 02:50:35', '2011-06-09 02:50:35');
INSERT INTO wac_system_log VALUES ('254', '1', '2', 'admin 编辑了 wacStorehouse, (id为 12)', '0', '0', null, null, '50', '1', '2011-06-09 02:50:57', '2011-06-09 02:50:57');
INSERT INTO wac_system_log VALUES ('255', '1', '2', 'admin 编辑了 wacStorehouse, (id为 12)', '0', '0', null, null, '50', '1', '2011-06-09 02:51:04', '2011-06-09 02:51:04');
INSERT INTO wac_system_log VALUES ('256', '1', '2', 'admin 添加了 wacStorehouse, (id为 20)', '0', '0', null, null, '50', '1', '2011-06-09 02:51:36', '2011-06-09 02:51:36');
INSERT INTO wac_system_log VALUES ('257', '1', '2', 'admin 添加了 wacStorehouse, (id为 21)', '0', '0', null, null, '50', '1', '2011-06-09 02:51:44', '2011-06-09 02:51:44');
INSERT INTO wac_system_log VALUES ('258', '1', '2', 'admin 添加了 wacStorehouse, (id为 22)', '0', '0', null, null, '50', '1', '2011-06-09 02:53:58', '2011-06-09 02:53:58');
INSERT INTO wac_system_log VALUES ('259', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 03:52:16', '2011-06-09 03:52:16');
INSERT INTO wac_system_log VALUES ('260', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 03:52:37', '2011-06-09 03:52:37');
INSERT INTO wac_system_log VALUES ('261', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 03:54:03', '2011-06-09 03:54:03');
INSERT INTO wac_system_log VALUES ('262', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 03:58:23', '2011-06-09 03:58:23');
INSERT INTO wac_system_log VALUES ('263', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 08:32:07', '2011-06-09 08:32:07');
INSERT INTO wac_system_log VALUES ('264', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 08:37:51', '2011-06-09 08:37:51');
INSERT INTO wac_system_log VALUES ('265', '1', '2', 'admin 添加了 wacStorehouse, (id为 23)', '0', '0', null, null, '50', '1', '2011-06-09 08:48:25', '2011-06-09 08:48:25');
INSERT INTO wac_system_log VALUES ('266', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 08:48:52', '2011-06-09 08:48:52');
INSERT INTO wac_system_log VALUES ('267', '1', '2', 'admin 添加了 wacStorehouse, (id为 24)', '0', '0', null, null, '50', '1', '2011-06-09 08:49:09', '2011-06-09 08:49:09');
INSERT INTO wac_system_log VALUES ('268', '1', '2', 'admin 编辑了 wacStorehouse, (id为 20)', '0', '0', null, null, '50', '1', '2011-06-09 08:50:17', '2011-06-09 08:50:17');
INSERT INTO wac_system_log VALUES ('269', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:30:21', '2011-06-09 10:30:21');
INSERT INTO wac_system_log VALUES ('270', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:35:17', '2011-06-09 10:35:17');
INSERT INTO wac_system_log VALUES ('271', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:36:18', '2011-06-09 10:36:18');
INSERT INTO wac_system_log VALUES ('272', '1', '2', 'admin 添加了 wacStorehouse, (id为 25)', '0', '0', null, null, '50', '1', '2011-06-09 10:38:00', '2011-06-09 10:38:00');
INSERT INTO wac_system_log VALUES ('273', '1', '2', 'admin 添加了 wacStorehouse, (id为 26)', '0', '0', null, null, '50', '1', '2011-06-09 10:39:08', '2011-06-09 10:39:08');
INSERT INTO wac_system_log VALUES ('274', '1', '2', 'admin 添加了 wacStorehouse, (id为 27)', '0', '0', null, null, '50', '1', '2011-06-09 10:41:37', '2011-06-09 10:41:37');
INSERT INTO wac_system_log VALUES ('275', '1', '2', 'admin 添加了 wacStorehouse, (id为 28)', '0', '0', null, null, '50', '1', '2011-06-09 10:44:17', '2011-06-09 10:44:17');
INSERT INTO wac_system_log VALUES ('276', '1', '2', 'admin 添加了 wacStorehouse, (id为 29)', '0', '0', null, null, '50', '1', '2011-06-09 10:48:09', '2011-06-09 10:48:09');
INSERT INTO wac_system_log VALUES ('277', '1', '2', 'admin 添加了 wacStorehouse, (id为 30)', '0', '0', null, null, '50', '1', '2011-06-09 10:50:30', '2011-06-09 10:50:30');
INSERT INTO wac_system_log VALUES ('278', '1', '2', 'admin 添加了 wacStorehouse, (id为 31)', '0', '0', null, null, '50', '1', '2011-06-09 10:51:47', '2011-06-09 10:51:47');
INSERT INTO wac_system_log VALUES ('279', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:52:02', '2011-06-09 10:52:02');
INSERT INTO wac_system_log VALUES ('280', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:56:26', '2011-06-09 10:56:26');
INSERT INTO wac_system_log VALUES ('281', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 10:57:52', '2011-06-09 10:57:52');
INSERT INTO wac_system_log VALUES ('282', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 11:00:05', '2011-06-09 11:00:05');
INSERT INTO wac_system_log VALUES ('283', '1', '2', 'admin 添加了 wacStorehouse, (id为 32)', '0', '0', null, null, '50', '1', '2011-06-09 11:00:25', '2011-06-09 11:00:25');
INSERT INTO wac_system_log VALUES ('284', '1', '2', 'admin 添加了 wacStorehouse, (id为 33)', '0', '0', null, null, '50', '1', '2011-06-09 11:00:49', '2011-06-09 11:00:49');
INSERT INTO wac_system_log VALUES ('285', '1', '2', 'admin 添加了 wacStorehouse, (id为 34)', '0', '0', null, null, '50', '1', '2011-06-09 11:01:12', '2011-06-09 11:01:12');
INSERT INTO wac_system_log VALUES ('286', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-09 11:01:36', '2011-06-09 11:01:36');
INSERT INTO wac_system_log VALUES ('287', '1', '2', 'admin 添加了 wacStorehouse, (id为 35)', '0', '0', null, null, '50', '1', '2011-06-09 11:01:55', '2011-06-09 11:01:55');
INSERT INTO wac_system_log VALUES ('288', '1', '2', 'admin 添加了 wacStorehouse, (id为 36)', '0', '0', null, null, '50', '1', '2011-06-09 11:02:20', '2011-06-09 11:02:20');
INSERT INTO wac_system_log VALUES ('289', '1', '2', 'admin 添加了 wacStorehouse, (id为 37)', '0', '0', null, null, '50', '1', '2011-06-09 11:04:38', '2011-06-09 11:04:38');
INSERT INTO wac_system_log VALUES ('290', '1', '2', 'admin 编辑了 wacStorehouse, (id为 32)', '0', '0', null, null, '50', '1', '2011-06-09 11:04:58', '2011-06-09 11:04:58');
INSERT INTO wac_system_log VALUES ('291', '1', '2', 'admin 添加了 wacStorehouse, (id为 38)', '0', '0', null, null, '50', '1', '2011-06-10 03:56:43', '2011-06-10 03:56:43');
INSERT INTO wac_system_log VALUES ('292', '1', '2', 'admin 添加了 wacStorehouse, (id为 39)', '0', '0', null, null, '50', '1', '2011-06-10 03:59:46', '2011-06-10 03:59:46');
INSERT INTO wac_system_log VALUES ('293', '1', '2', 'admin 添加了 wacStorehouse, (id为 40)', '0', '0', null, null, '50', '1', '2011-06-10 04:02:36', '2011-06-10 04:02:36');
INSERT INTO wac_system_log VALUES ('294', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 04:03:23', '2011-06-10 04:03:23');
INSERT INTO wac_system_log VALUES ('295', '1', '2', 'admin 添加了 wacStorehouse, (id为 41)', '0', '0', null, null, '50', '1', '2011-06-10 04:58:44', '2011-06-10 04:58:44');
INSERT INTO wac_system_log VALUES ('296', '1', '2', 'admin 添加了 wacStorehouse, (id为 42)', '0', '0', null, null, '50', '1', '2011-06-10 06:22:25', '2011-06-10 06:22:25');
INSERT INTO wac_system_log VALUES ('297', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 06:22:32', '2011-06-10 06:22:32');
INSERT INTO wac_system_log VALUES ('298', '1', '2', 'admin 编辑了 wacStorehouse, (id为 36)', '0', '0', null, null, '50', '1', '2011-06-10 06:22:49', '2011-06-10 06:22:49');
INSERT INTO wac_system_log VALUES ('299', '1', '2', 'admin 编辑了 国家, (id为 6)', '0', '0', null, null, '50', '1', '2011-06-10 06:25:46', '2011-06-10 06:25:46');
INSERT INTO wac_system_log VALUES ('300', '1', '2', 'admin 添加了 国家, (id为 7)', '0', '0', null, null, '50', '1', '2011-06-10 06:26:05', '2011-06-10 06:26:05');
INSERT INTO wac_system_log VALUES ('301', '1', '2', 'admin 编辑了 用户管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-06-10 06:26:44', '2011-06-10 06:26:44');
INSERT INTO wac_system_log VALUES ('302', '1', '2', 'admin 添加了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-06-10 06:27:08', '2011-06-10 06:27:08');
INSERT INTO wac_system_log VALUES ('303', '1', '2', 'admin 编辑了 wacStorehouse, (id为 35)', '0', '0', null, null, '50', '1', '2011-06-10 06:32:15', '2011-06-10 06:32:15');
INSERT INTO wac_system_log VALUES ('304', '1', '2', 'admin 编辑了 wacStorehouse, (id为 42)', '0', '0', null, null, '50', '1', '2011-06-10 06:32:40', '2011-06-10 06:32:40');
INSERT INTO wac_system_log VALUES ('305', '1', '2', 'admin 添加了 wacStorehouse, (id为 43)', '0', '0', null, null, '50', '1', '2011-06-10 06:33:03', '2011-06-10 06:33:03');
INSERT INTO wac_system_log VALUES ('306', '1', '2', 'admin 添加了 wacStorehouse, (id为 44)', '0', '0', null, null, '50', '1', '2011-06-10 06:33:16', '2011-06-10 06:33:16');
INSERT INTO wac_system_log VALUES ('307', '1', '2', 'admin 添加了 wacStorehouse, (id为 45)', '0', '0', null, null, '50', '1', '2011-06-10 06:45:04', '2011-06-10 06:45:04');
INSERT INTO wac_system_log VALUES ('308', '1', '2', 'admin 添加了 wacStorehouse, (id为 46)', '0', '0', null, null, '50', '1', '2011-06-10 06:45:14', '2011-06-10 06:45:14');
INSERT INTO wac_system_log VALUES ('309', '1', '2', 'admin 添加了 wacStorehouse, (id为 47)', '0', '0', null, null, '50', '1', '2011-06-10 06:45:30', '2011-06-10 06:45:30');
INSERT INTO wac_system_log VALUES ('310', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 06:46:18', '2011-06-10 06:46:18');
INSERT INTO wac_system_log VALUES ('311', '1', '2', 'admin 添加了 wacStorehouse, (id为 48)', '0', '0', null, null, '50', '1', '2011-06-10 06:50:28', '2011-06-10 06:50:28');
INSERT INTO wac_system_log VALUES ('312', '1', '2', 'admin 添加了 wacStorehouse, (id为 49)', '0', '0', null, null, '50', '1', '2011-06-10 06:50:46', '2011-06-10 06:50:46');
INSERT INTO wac_system_log VALUES ('313', '1', '2', 'admin 添加了 wacStorehouse, (id为 50)', '0', '0', null, null, '50', '1', '2011-06-10 06:51:04', '2011-06-10 06:51:04');
INSERT INTO wac_system_log VALUES ('314', '1', '2', 'admin 添加了 wacStorehouse, (id为 51)', '0', '0', null, null, '50', '1', '2011-06-10 06:51:37', '2011-06-10 06:51:37');
INSERT INTO wac_system_log VALUES ('315', '1', '2', 'admin 编辑了 wacStorehouse, (id为 51)', '0', '0', null, null, '50', '1', '2011-06-10 06:56:06', '2011-06-10 06:56:06');
INSERT INTO wac_system_log VALUES ('316', '1', '2', 'admin 添加了 wacStorehouse, (id为 52)', '0', '0', null, null, '50', '1', '2011-06-10 06:58:30', '2011-06-10 06:58:30');
INSERT INTO wac_system_log VALUES ('317', '1', '2', 'admin 编辑了 wacStorehouse, (id为 52)', '0', '0', null, null, '50', '1', '2011-06-10 06:58:44', '2011-06-10 06:58:44');
INSERT INTO wac_system_log VALUES ('318', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 06:58:59', '2011-06-10 06:58:59');
INSERT INTO wac_system_log VALUES ('319', '1', '2', 'admin 添加了 wacStorehouse, (id为 53)', '0', '0', null, null, '50', '1', '2011-06-10 07:50:57', '2011-06-10 07:50:57');
INSERT INTO wac_system_log VALUES ('320', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 08:01:51', '2011-06-10 08:01:51');
INSERT INTO wac_system_log VALUES ('321', '1', '2', 'admin 删除了 wacStorehouse, (id为 Array)', '0', '0', null, null, '50', '1', '2011-06-10 08:02:06', '2011-06-10 08:02:06');
INSERT INTO wac_system_log VALUES ('322', '1', '2', 'admin 编辑了 系统信息, (id为 6)', '0', '0', null, null, '50', '1', '2011-07-14 10:29:05', '2011-07-14 10:29:05');
INSERT INTO wac_system_log VALUES ('323', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-07-18 10:37:51', '2011-07-18 10:37:51');
INSERT INTO wac_system_log VALUES ('324', '1', '2', 'admin 编辑了 系统信息, (id为 7)', '0', '0', null, null, '50', '1', '2011-07-18 10:48:25', '2011-07-18 10:48:25');
INSERT INTO wac_system_log VALUES ('325', '1', '2', 'admin 编辑了 用户管理, (id为 18)', '0', '0', null, null, '50', '1', '2011-07-25 08:49:08', '2011-07-25 08:49:08');
INSERT INTO wac_system_log VALUES ('326', '1', '2', 'admin 编辑了 系统信息, (id为 40)', '0', '0', null, null, '50', '1', '2011-07-25 08:51:22', '2011-07-25 08:51:22');
INSERT INTO wac_system_log VALUES ('327', '1', '2', 'admin 添加了 系统信息, (id为 41)', '0', '0', null, null, '50', '1', '2011-07-25 08:51:56', '2011-07-25 08:51:56');
INSERT INTO wac_system_log VALUES ('328', '1', '2', 'admin 删除了 系统信息, (id为 41)', '0', '0', null, null, '50', '1', '2011-07-25 08:52:50', '2011-07-25 08:52:50');
INSERT INTO wac_system_log VALUES ('329', '1', '2', 'admin 删除了 系统信息, (id为 40)', '0', '0', null, null, '50', '1', '2011-07-25 08:52:56', '2011-07-25 08:52:56');
INSERT INTO wac_system_log VALUES ('330', '1', '2', 'admin 编辑了 用户管理, (id为 17)', '0', '0', null, null, '50', '1', '2011-07-25 08:54:14', '2011-07-25 08:54:14');
INSERT INTO wac_system_log VALUES ('331', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-22 08:15:57', '2011-08-22 08:15:57');
INSERT INTO wac_system_log VALUES ('332', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-22 08:33:18', '2011-08-22 08:33:18');
INSERT INTO wac_system_log VALUES ('333', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-22 08:35:47', '2011-08-22 08:35:47');
INSERT INTO wac_system_log VALUES ('334', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-22 08:36:05', '2011-08-22 08:36:05');
INSERT INTO wac_system_log VALUES ('335', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-22 09:08:58', '2011-08-22 09:08:58');
INSERT INTO wac_system_log VALUES ('336', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-23 02:13:41', '2011-08-23 02:13:41');
INSERT INTO wac_system_log VALUES ('337', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-23 02:43:43', '2011-08-23 02:43:43');
INSERT INTO wac_system_log VALUES ('338', '1', '2', 'admin 添加了 系统参数, (id为 15)', '0', '0', null, null, '50', '1', '2011-08-23 02:52:27', '2011-08-23 02:52:27');
INSERT INTO wac_system_log VALUES ('339', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-23 03:58:44', '2011-08-23 03:58:44');
INSERT INTO wac_system_log VALUES ('340', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-23 03:59:04', '2011-08-23 03:59:04');
INSERT INTO wac_system_log VALUES ('341', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-23 03:59:23', '2011-08-23 03:59:23');
INSERT INTO wac_system_log VALUES ('342', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 02:25:52', '2011-08-24 02:25:52');
INSERT INTO wac_system_log VALUES ('343', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 02:36:32', '2011-08-24 02:36:32');
INSERT INTO wac_system_log VALUES ('344', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 02:37:38', '2011-08-24 02:37:38');
INSERT INTO wac_system_log VALUES ('345', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:16:31', '2011-08-24 03:16:31');
INSERT INTO wac_system_log VALUES ('346', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:21:49', '2011-08-24 03:21:49');
INSERT INTO wac_system_log VALUES ('347', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:38:52', '2011-08-24 03:38:52');
INSERT INTO wac_system_log VALUES ('348', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:39:18', '2011-08-24 03:39:18');
INSERT INTO wac_system_log VALUES ('349', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:45:02', '2011-08-24 03:45:02');
INSERT INTO wac_system_log VALUES ('350', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:45:50', '2011-08-24 03:45:50');
INSERT INTO wac_system_log VALUES ('351', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:47:04', '2011-08-24 03:47:04');
INSERT INTO wac_system_log VALUES ('352', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:47:09', '2011-08-24 03:47:09');
INSERT INTO wac_system_log VALUES ('353', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:47:28', '2011-08-24 03:47:28');
INSERT INTO wac_system_log VALUES ('354', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:48:21', '2011-08-24 03:48:21');
INSERT INTO wac_system_log VALUES ('355', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:48:41', '2011-08-24 03:48:41');
INSERT INTO wac_system_log VALUES ('356', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:49:11', '2011-08-24 03:49:11');
INSERT INTO wac_system_log VALUES ('357', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:50:43', '2011-08-24 03:50:43');
INSERT INTO wac_system_log VALUES ('358', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:50:51', '2011-08-24 03:50:51');
INSERT INTO wac_system_log VALUES ('359', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:56:56', '2011-08-24 03:56:56');
INSERT INTO wac_system_log VALUES ('360', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:57:14', '2011-08-24 03:57:14');
INSERT INTO wac_system_log VALUES ('361', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 03:57:24', '2011-08-24 03:57:24');
INSERT INTO wac_system_log VALUES ('362', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:09:06', '2011-08-24 06:09:06');
INSERT INTO wac_system_log VALUES ('363', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:09:09', '2011-08-24 06:09:09');
INSERT INTO wac_system_log VALUES ('364', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:09:21', '2011-08-24 06:09:21');
INSERT INTO wac_system_log VALUES ('365', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:12:48', '2011-08-24 06:12:48');
INSERT INTO wac_system_log VALUES ('366', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:12:51', '2011-08-24 06:12:51');
INSERT INTO wac_system_log VALUES ('367', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:12:54', '2011-08-24 06:12:54');
INSERT INTO wac_system_log VALUES ('368', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:12:56', '2011-08-24 06:12:56');
INSERT INTO wac_system_log VALUES ('369', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:12:58', '2011-08-24 06:12:58');
INSERT INTO wac_system_log VALUES ('370', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:13:01', '2011-08-24 06:13:01');
INSERT INTO wac_system_log VALUES ('371', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:13:20', '2011-08-24 06:13:20');
INSERT INTO wac_system_log VALUES ('372', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:14:06', '2011-08-24 06:14:06');
INSERT INTO wac_system_log VALUES ('373', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:15:15', '2011-08-24 06:15:15');
INSERT INTO wac_system_log VALUES ('374', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:15:18', '2011-08-24 06:15:18');
INSERT INTO wac_system_log VALUES ('375', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:15:22', '2011-08-24 06:15:22');
INSERT INTO wac_system_log VALUES ('376', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:22:03', '2011-08-24 06:22:03');
INSERT INTO wac_system_log VALUES ('377', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:24:45', '2011-08-24 06:24:45');
INSERT INTO wac_system_log VALUES ('378', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:25:08', '2011-08-24 06:25:08');
INSERT INTO wac_system_log VALUES ('379', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:25:32', '2011-08-24 06:25:32');
INSERT INTO wac_system_log VALUES ('380', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:39:10', '2011-08-24 06:39:10');
INSERT INTO wac_system_log VALUES ('381', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 06:47:48', '2011-08-24 06:47:48');
INSERT INTO wac_system_log VALUES ('382', '1', '2', 'admin 编辑了 wacUserParameter, (id为 )', '0', '0', null, null, '50', '1', '2011-08-24 07:18:06', '2011-08-24 07:18:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_parameter
-- ----------------------------
INSERT INTO wac_system_parameter VALUES ('1', '货币', 'setting/system/currency', '0', 'CNY', '0', '0', null, null, '50', '1', '2011-08-24 06:47:24', '2011-08-24 06:47:48');
INSERT INTO wac_system_parameter VALUES ('12', '打印模块-本公司名称', 'setting/print/companyName', '0', 'ABC有限公司', '0', '0', null, null, '50', '1', '2011-08-24 07:17:42', '2011-08-24 07:18:06');
INSERT INTO wac_system_parameter VALUES ('15', '每页条项数', 'setting/display/rowNum', '2', '15', '0', '0', null, null, '50', '1', '2011-08-23 02:52:27', '2011-08-23 02:52:27');

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
INSERT INTO wac_unit VALUES ('1', '米', 'unit_meter', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:29:58', '2010-01-16 18:29:58');
INSERT INTO wac_unit VALUES ('2', '公斤', 'unit_kilogram', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:47:42', '2010-01-16 18:47:42');
INSERT INTO wac_unit VALUES ('3', '吨', 'unit_ton', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:48:07', '2010-01-16 18:48:07');
INSERT INTO wac_unit VALUES ('4', '平方米', 'unit_square', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:51:56', '2010-01-16 18:51:56');
INSERT INTO wac_unit VALUES ('5', '码', 'unit_yard', '0', '0', '0', null, null, '50', '1', '2010-01-16 18:54:30', '2010-01-16 18:54:30');
INSERT INTO wac_unit VALUES ('6', '立方米', 'unit_cubic_meter', '0', '0', '0', null, null, '50', '1', '2010-07-12 10:54:02', '2010-07-12 10:54:02');
INSERT INTO wac_unit VALUES ('7', '寸', 'unit_inch', '0', '0', '0', null, null, '50', '1', '2010-08-20 07:13:46', '2010-08-20 07:13:46');

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
-- Table structure for `wac_user_parameter`
-- ----------------------------
DROP TABLE IF EXISTS `wac_user_parameter`;
CREATE TABLE `wac_user_parameter` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_user_parameter
-- ----------------------------
INSERT INTO wac_user_parameter VALUES ('2', '1', null, 'setting/display/rowNum', '0', '25', '0', '0', null, null, '50', '1', '2011-08-24 06:21:39', '2011-08-24 06:22:03');

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
INSERT INTO wac_workflow VALUES ('1', '布料生产流程', 'wf_cloth', '0', '布料生产所需流程', '0', '0', null, null, '50', '1', '2010-01-24 08:20:55', '2010-01-24 00:20:55');
INSERT INTO wac_workflow VALUES ('2', '待定', 'none', '0', 'memo', '0', '0', null, null, '50', '1', '2010-01-24 13:24:41', '2010-01-24 05:24:41');

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
INSERT INTO wac_workflow_item VALUES ('3', '1', '棉纱入仓', 'wf_cloth_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 02:13:51', '2010-01-24 02:13:51');
INSERT INTO wac_workflow_item VALUES ('8', '1', '浆染生产阶段', 'wf_cloth_dye', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:17:54', '2010-01-24 05:17:54');
INSERT INTO wac_workflow_item VALUES ('9', '1', '织造生产阶段', 'wf_cloth_weave', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:18:17', '2010-01-24 05:18:17');
INSERT INTO wac_workflow_item VALUES ('10', '1', '整理阶段', 'wf_cloth_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:07', '2010-01-24 05:19:31');
INSERT INTO wac_workflow_item VALUES ('11', '1', '成品布出仓', 'wf_cloth_final', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 05:20:09', '2010-01-24 05:20:09');
INSERT INTO wac_workflow_item VALUES ('12', '1', '订单建立', 'wf_cloth_production_create', '0', null, '0', '0', null, null, '50', '1', '2010-02-03 01:08:44', '2010-02-03 01:08:44');
INSERT INTO wac_workflow_item VALUES ('13', '1', '棉纱发货阶段', 'wf_dispatch_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:45', '2010-06-22 15:33:45');
INSERT INTO wac_workflow_item VALUES ('14', '1', '浆染纱发货阶段', 'wf_dispatch_dye', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:33:58', '2010-06-22 15:33:58');
INSERT INTO wac_workflow_item VALUES ('15', '1', '织造布发货阶段', 'wf_dispatch_weave', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 15:34:13', '2010-06-22 15:34:13');
INSERT INTO wac_workflow_item VALUES ('16', '1', '后整布发货阶段', 'wf_dispatch_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 06:04:09', '2010-06-22 15:34:32');
INSERT INTO wac_workflow_item VALUES ('17', '1', '成品布发货阶段', 'wf_dispatch_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-06-25 02:30:10', '2010-06-22 15:34:44');
INSERT INTO wac_workflow_item VALUES ('18', '1', '成品测试', 'wf_qc_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-08-31 09:45:08', '2010-08-31 09:45:08');
