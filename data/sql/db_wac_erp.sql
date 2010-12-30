/*
Navicat MySQL Data Transfer

Source Server         : mysql5.1_portable
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : db_wac_erp

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-09-15 18:07:11
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_group
-- ----------------------------
INSERT INTO `sf_guard_group` VALUES ('1', 'admin', 'Administrator group', '2010-07-09 15:40:51', '2010-07-09 15:40:51');

-- ----------------------------
-- Table structure for `sf_guard_group_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_group_permission`;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_group_permission
-- ----------------------------
INSERT INTO `sf_guard_group_permission` VALUES ('1', '1', '2010-07-09 15:40:51', '2010-07-09 15:40:51');

-- ----------------------------
-- Table structure for `sf_guard_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_permission`;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_permission
-- ----------------------------
INSERT INTO `sf_guard_permission` VALUES ('1', 'admin', 'Administrator permission', '2010-07-09 15:40:51', '2010-07-09 15:40:51');

-- ----------------------------
-- Table structure for `sf_guard_remember_key`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_remember_key`;
CREATE TABLE `sf_guard_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user
-- ----------------------------
INSERT INTO `sf_guard_user` VALUES ('1', 'admin', 'sha1', '510e6b9c368e179bf9b76bb6602ce3b0', 'f6782d01a7be84eefb17931fba2fbc5aa5eaeab7', '1', '1', '2010-09-15 15:39:10', '2010-07-09 15:40:51', '2010-09-15 15:39:10');

-- ----------------------------
-- Table structure for `sf_guard_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_group`;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user_group
-- ----------------------------
INSERT INTO `sf_guard_user_group` VALUES ('1', '1', '2010-07-09 15:40:51', '2010-07-09 15:40:51');

-- ----------------------------
-- Table structure for `sf_guard_user_permission`
-- ----------------------------
DROP TABLE IF EXISTS `sf_guard_user_permission`;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_guard_user_permission
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_country
-- ----------------------------
INSERT INTO `wac_country` VALUES ('1', null, null, 'CHN', '中国', null, '', '0', '0', null, null, '50', '1', '2010-01-24 13:30:24', '2010-01-24 13:30:24');
INSERT INTO `wac_country` VALUES ('2', null, null, 'USA', '美国', null, '', '0', '0', null, null, '50', '1', '2010-02-02 04:06:18', '2010-02-02 04:06:18');

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
INSERT INTO `wac_currency` VALUES ('1', '元', 'RMB', null, null, null, '0', '0', null, null, '50', '1', '2010-02-04 02:23:14', '2010-02-04 02:23:14');

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
INSERT INTO `wac_sysmsg` VALUES ('1', 'sys_add_succ', '', '添加成功!', '0', '0', null, null, '50', '1', '2010-02-05 07:06:52', '2010-02-05 07:06:52');
INSERT INTO `wac_sysmsg` VALUES ('2', 'sys_edit_succ', '', '修改成功!', '0', '0', null, null, '50', '1', '2010-02-05 09:31:02', '2010-02-05 09:31:02');
INSERT INTO `wac_sysmsg` VALUES ('3', 'sys_del_succ', '', '删除成功!', '0', '0', null, null, '50', '1', '2010-02-05 09:31:21', '2010-02-05 09:31:21');
INSERT INTO `wac_sysmsg` VALUES ('4', 'sys_err_goods_category_not_existed', '', '错误, 不存在的货物品种!', '0', '0', null, null, '50', '1', '2010-02-09 11:22:50', '2010-02-09 03:22:50');
INSERT INTO `wac_sysmsg` VALUES ('5', 'sys_err_invalid_production_order', '', '错误, 请输入有效生产单!', '0', '0', null, null, '50', '1', '2010-03-14 11:11:37', '2010-02-09 03:22:35');
INSERT INTO `wac_sysmsg` VALUES ('6', 'sys_err_invalid_factory', '', '错误, 请输入有效工厂!', '0', '0', null, null, '50', '1', '2010-02-09 11:22:43', '2010-02-09 03:22:43');
INSERT INTO `wac_sysmsg` VALUES ('7', 'sys_err_invalid_cotton_order', '', '错误, 请输入有效棉纱单!', '0', '0', null, null, '50', '1', '2010-02-17 07:22:19', '2010-02-17 07:22:19');
INSERT INTO `wac_sysmsg` VALUES ('8', 'sys_err_invalid_dye_order', '', '错误, 请输入有效浆染单!', '0', '0', null, null, '50', '1', '2010-02-17 07:22:43', '2010-02-17 07:22:43');
INSERT INTO `wac_sysmsg` VALUES ('9', 'sys_err_invalid_weave_order', '', '错误, 请输入有效织造单!', '0', '0', null, null, '50', '1', '2010-02-17 07:23:04', '2010-02-17 07:23:04');
INSERT INTO `wac_sysmsg` VALUES ('10', 'sys_err_invalid_clean_up_form', '', '错误, 请输入有效后整单!', '0', '0', null, null, '50', '1', '2010-06-09 18:24:59', '2010-02-17 07:23:40');
INSERT INTO `wac_sysmsg` VALUES ('11', 'sys_err_invalid_final_order', '', '错误, 请输入有效成品单!', '0', '0', null, null, '50', '1', '2010-02-17 07:25:14', '2010-02-17 07:25:14');
INSERT INTO `wac_sysmsg` VALUES ('12', 'sys_err_invalid_goods_category', '', '错误, 请输入有效货物品种!', '0', '0', null, null, '50', '1', '2010-02-17 08:08:12', '2010-02-17 08:08:12');
INSERT INTO `wac_sysmsg` VALUES ('13', 'sys_log_add', '', '%s 添加了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 18:04:40', '2010-02-17 10:04:40');
INSERT INTO `wac_sysmsg` VALUES ('14', 'sys_log_edit', '', '%s 编辑了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 18:04:42', '2010-02-17 10:04:42');
INSERT INTO `wac_sysmsg` VALUES ('15', 'sys_log_delete', '', '%s 删除了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-02-17 18:04:24', '2010-02-17 10:04:24');
INSERT INTO `wac_sysmsg` VALUES ('16', 'sys_err_invalid_supplier', '', '错误, 请输入有效供应厂商!', '0', '0', null, null, '50', '1', '2010-02-20 10:37:09', '2010-02-20 10:37:09');
INSERT INTO `wac_sysmsg` VALUES ('17', 'sys_err_invalid_color', null, '错误, 请输入有效颜色!', '0', '0', null, null, '50', '1', '2010-02-22 18:34:04', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('18', 'sys_err_invalid_jar', null, '错误, 请输入有效缸号!', '0', '0', null, null, '50', '1', '2010-02-22 18:34:24', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('19', 'sys_err_invalid_axis', null, '错误, 请输入有效轴号!', '0', '0', null, null, '50', '1', '2010-02-22 18:35:17', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('20', 'sys_err_invalid_cotton_goods_category', null, '错误, 请输入有效棉纱品种!', '0', '0', null, null, '50', '1', '2010-02-23 10:20:59', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('21', 'sys_audit_succ', '', '审核操作完成!', '0', '0', null, null, '50', '1', '2010-02-24 02:24:46', '2010-02-24 02:24:46');
INSERT INTO `wac_sysmsg` VALUES ('22', 'sys_err_invaild_audit_status', '', '错误, 审核操作无效! \r\n请检查本单是否已审核?', '0', '0', null, null, '50', '1', '2010-02-25 16:43:14', '2010-02-24 02:27:10');
INSERT INTO `wac_sysmsg` VALUES ('23', 'sys_err_invaild_audit_zero_item', '', '错误, 审核操作无效! \r\n请检查本单是否存在输入子项?', '0', '0', null, null, '50', '1', '2010-02-25 16:43:18', '2010-02-25 03:41:36');
INSERT INTO `wac_sysmsg` VALUES ('24', 'sys_err_invalid_spinner', null, '错误, 请输入有效纺织机号!', '0', '0', null, null, '50', '1', '2010-02-26 12:19:54', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('25', 'sys_invalid_user_authenticate', '', '错误, 无效的用户验证!', '0', '0', null, null, '50', '1', '2010-03-04 03:48:46', '2010-03-04 03:48:46');
INSERT INTO `wac_sysmsg` VALUES ('26', 'sys_err_invalid_customer_order', '', '错误, 请输入有效订单!', '0', '0', null, null, '50', '1', '2010-03-14 03:12:25', '2010-03-14 03:12:25');
INSERT INTO `wac_sysmsg` VALUES ('27', 'sys_err_invalid_customer', '', '错误, 请输入有效客户!', '0', '0', null, null, '50', '1', '2010-04-07 14:51:39', '2010-04-07 06:51:39');
INSERT INTO `wac_sysmsg` VALUES ('28', 'sys_err_sample_jar_not_existed', null, '错误, 请输入有效封样缸号!', '0', '0', null, null, '50', '1', '2010-03-25 11:35:21', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('29', 'sys_err_invalid_storehouse', '', '错误, 请输入有效仓库!', '0', '0', null, null, '50', '1', '2010-04-07 14:51:30', '2010-04-07 06:51:30');
INSERT INTO `wac_sysmsg` VALUES ('30', 'sys_err_goods_number_insufficient_in_factory', null, '错误, \'%s\' 存量不足!  [现有数量%s,消耗数量%s]', '0', '0', null, null, '50', '1', '2010-04-08 16:48:36', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('31', 'sys_log_audit', null, '%s 审核了 %s, (id为 %s)', '0', '0', null, null, '50', '1', '2010-04-07 16:47:08', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('32', 'sys_err_predefined_class_delete', null, '错误, 此分类为系统预定义的必须项,禁止删除!', '0', '0', null, null, '50', '1', '2010-05-18 14:37:02', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('33', 'sys_err_predefined_class_edit', null, '错误, 此分类为系统预定义的必须项,编码禁止更改!', '0', '0', null, null, '50', '1', '2010-05-18 15:23:06', '0000-00-00 00:00:00');
INSERT INTO `wac_sysmsg` VALUES ('34', 'sys_err_invaild_target', '', '错误, 请输入有效目的地!', '0', '0', null, null, '50', '1', '2010-06-22 22:40:05', '2010-06-22 22:40:05');
INSERT INTO `wac_sysmsg` VALUES ('35', 'sys_err_invalid_dispatch_order', '', '错误, 请输入有效出仓单!', '0', '0', null, null, '50', '1', '2010-08-19 17:28:57', '2010-08-19 17:28:57');
INSERT INTO `wac_sysmsg` VALUES ('36', 'sys_err_dispatch_order_qc_only_once', '', '错误, 此出货单已存在QC记录, 请复查以往QC单!', '0', '0', null, null, '50', '1', '2010-09-01 11:10:34', '2010-09-01 11:08:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_log
-- ----------------------------
INSERT INTO `wac_system_log` VALUES ('1', '1', '2', 'admin 添加了 用户权限, (id为 32)', '0', '0', null, null, '50', '1', '2010-09-06 15:19:11', '2010-09-06 15:19:11');
INSERT INTO `wac_system_log` VALUES ('2', '1', '2', 'admin 添加了 订单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:20:59', '2010-09-06 15:20:59');
INSERT INTO `wac_system_log` VALUES ('3', '1', '2', 'admin 添加了 订单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 15:21:07', '2010-09-06 15:21:07');
INSERT INTO `wac_system_log` VALUES ('4', '1', '2', 'admin 添加了 生产单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:23:05', '2010-09-06 15:23:05');
INSERT INTO `wac_system_log` VALUES ('5', '1', '2', 'admin 添加了 生产单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 15:23:24', '2010-09-06 15:23:24');
INSERT INTO `wac_system_log` VALUES ('6', '1', '2', 'admin 添加了 棉纱单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:24:26', '2010-09-06 15:24:26');
INSERT INTO `wac_system_log` VALUES ('7', '1', '2', 'admin 添加了 棉纱单, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 15:24:45', '2010-09-06 15:24:45');
INSERT INTO `wac_system_log` VALUES ('8', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:25:14', '2010-09-06 15:25:14');
INSERT INTO `wac_system_log` VALUES ('9', '1', '2', 'admin 添加了 棉纱单物料子项, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 15:25:33', '2010-09-06 15:25:33');
INSERT INTO `wac_system_log` VALUES ('10', '1', '2', 'admin 添加了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:27:21', '2010-09-06 15:27:21');
INSERT INTO `wac_system_log` VALUES ('11', '1', '2', 'admin 添加了 浆染单项目, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:28:09', '2010-09-06 15:28:09');
INSERT INTO `wac_system_log` VALUES ('12', '1', '2', 'admin 添加了 浆染单项目, (id为 2)', '0', '0', null, null, '50', '1', '2010-09-06 15:28:26', '2010-09-06 15:28:26');
INSERT INTO `wac_system_log` VALUES ('13', '1', '2', 'admin 审核了 浆染单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:28:40', '2010-09-06 15:28:40');
INSERT INTO `wac_system_log` VALUES ('14', '1', '2', 'admin 添加了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:29:12', '2010-09-06 15:29:12');
INSERT INTO `wac_system_log` VALUES ('15', '1', '2', 'admin 添加了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:36:17', '2010-09-06 15:36:17');
INSERT INTO `wac_system_log` VALUES ('16', '1', '2', 'admin 审核了 出货单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:36:22', '2010-09-06 15:36:22');
INSERT INTO `wac_system_log` VALUES ('17', '1', '2', 'admin 添加了 织造单子项, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:38:52', '2010-09-06 15:38:52');
INSERT INTO `wac_system_log` VALUES ('18', '1', '2', 'admin 审核了 织造单, (id为 1)', '0', '0', null, null, '50', '1', '2010-09-06 15:38:58', '2010-09-06 15:38:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wac_system_parameter
-- ----------------------------
INSERT INTO `wac_system_parameter` VALUES ('1', '货币', 'default_currency', '0', 'RMB', '0', '0', null, null, '50', '1', '2010-02-04 03:39:00', '2010-02-04 03:39:00');
INSERT INTO `wac_system_parameter` VALUES ('2', '布匹单位', 'default_cloth_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-08-20 11:41:50', '2010-02-04 03:40:20');
INSERT INTO `wac_system_parameter` VALUES ('3', '棉纱单位', 'default_cotton_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-02-09 15:56:11', '2010-02-08 16:16:40');
INSERT INTO `wac_system_parameter` VALUES ('4', '浆染棉纱单位', 'default_dye_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-02-23 02:29:14', '2010-02-23 02:29:14');
INSERT INTO `wac_system_parameter` VALUES ('5', '布匹检查单位', 'default_check_length_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-03-08 02:32:14', '2010-03-08 02:32:14');
INSERT INTO `wac_system_parameter` VALUES ('6', '经密单位', 'default_warp_density_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-03-08 10:00:29', '2010-03-08 10:00:29');
INSERT INTO `wac_system_parameter` VALUES ('7', '纬密单位', 'default_filling_density_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-03-08 10:00:54', '2010-03-08 10:00:54');
INSERT INTO `wac_system_parameter` VALUES ('8', '组织单位', 'default_texture_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-03-08 10:01:09', '2010-03-08 10:01:09');
INSERT INTO `wac_system_parameter` VALUES ('9', '布幅单位', 'default_roll_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-03-09 03:45:49', '2010-03-09 03:45:49');
INSERT INTO `wac_system_parameter` VALUES ('10', '提前预警日数', 'default_alert_delivery_days', '0', '3', '0', '0', null, null, '50', '1', '2010-04-20 17:30:00', '2010-04-20 09:30:00');
INSERT INTO `wac_system_parameter` VALUES ('11', '预警提示记录数目', 'default_alert_rows', '0', '5', '0', '0', null, null, '50', '1', '2010-04-20 17:29:55', '2010-04-20 09:29:55');
INSERT INTO `wac_system_parameter` VALUES ('12', '打印-本公司名称', 'print_company_name', '0', '布业有限公司', '0', '0', null, null, '50', '1', '2010-07-30 11:35:32', '2010-07-30 11:35:32');
INSERT INTO `wac_system_parameter` VALUES ('13', '包装单位', 'default_wrapper_unit_code', '0', 'unit_yard', '0', '0', null, null, '50', '1', '2010-08-19 16:34:20', '2010-08-19 16:34:20');

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
INSERT INTO `wac_unit` VALUES ('1', '米', 'unit_meter', '0', '0', '0', null, null, '50', '1', '2010-01-17 02:30:22', '2010-01-17 02:30:22');
INSERT INTO `wac_unit` VALUES ('2', '公斤', 'unit_kilogram', '0', '0', '0', null, null, '50', '1', '2010-01-17 02:48:06', '2010-01-17 02:48:06');
INSERT INTO `wac_unit` VALUES ('3', '吨', 'unit_ton', '0', '0', '0', null, null, '50', '1', '2010-01-17 02:48:31', '2010-01-17 02:48:31');
INSERT INTO `wac_unit` VALUES ('4', '平方米', 'unit_square', '0', '0', '0', null, null, '50', '1', '2010-01-17 02:52:20', '2010-01-17 02:52:20');
INSERT INTO `wac_unit` VALUES ('5', '码', 'unit_yard', '0', '0', '0', null, null, '50', '1', '2010-01-17 02:54:54', '2010-01-17 02:54:54');
INSERT INTO `wac_unit` VALUES ('6', '立方米', 'unit_cubic_meter', '0', '0', '0', null, null, '50', '1', '2010-07-12 18:54:26', '2010-07-12 18:54:26');
INSERT INTO `wac_unit` VALUES ('7', '寸', 'unit_inch', '0', '0', '0', null, null, '50', '1', '2010-08-20 15:14:10', '2010-08-20 15:14:10');

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
INSERT INTO `wac_workflow` VALUES ('1', '布料生产流程', 'wf_cloth', '0', '布料生产所需流程', '0', '0', null, null, '50', '1', '2010-01-24 16:21:19', '2010-01-24 08:21:19');
INSERT INTO `wac_workflow` VALUES ('2', '待定', 'none', '0', 'memo', '0', '0', null, null, '50', '1', '2010-01-24 21:25:05', '2010-01-24 13:25:05');

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
INSERT INTO `wac_workflow_item` VALUES ('3', '1', '棉纱入仓', 'wf_cloth_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 10:14:15', '2010-01-24 10:14:15');
INSERT INTO `wac_workflow_item` VALUES ('8', '1', '浆染生产阶段', 'wf_cloth_dye', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 13:18:18', '2010-01-24 13:18:18');
INSERT INTO `wac_workflow_item` VALUES ('9', '1', '织造生产阶段', 'wf_cloth_weave', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 13:18:41', '2010-01-24 13:18:41');
INSERT INTO `wac_workflow_item` VALUES ('10', '1', '整理阶段', 'wf_cloth_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 14:04:31', '2010-01-24 13:19:55');
INSERT INTO `wac_workflow_item` VALUES ('11', '1', '成品布出仓', 'wf_cloth_final', '0', null, '0', '0', null, null, '50', '1', '2010-01-24 13:20:33', '2010-01-24 13:20:33');
INSERT INTO `wac_workflow_item` VALUES ('12', '1', '订单建立', 'wf_cloth_production_create', '0', null, '0', '0', null, null, '50', '1', '2010-02-03 09:09:08', '2010-02-03 09:09:08');
INSERT INTO `wac_workflow_item` VALUES ('13', '1', '棉纱发货阶段', 'wf_dispatch_cotton', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 23:34:09', '2010-06-22 23:34:09');
INSERT INTO `wac_workflow_item` VALUES ('14', '1', '浆染纱发货阶段', 'wf_dispatch_dye', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 23:34:22', '2010-06-22 23:34:22');
INSERT INTO `wac_workflow_item` VALUES ('15', '1', '织造布发货阶段', 'wf_dispatch_weave', '0', null, '0', '0', null, null, '50', '1', '2010-06-22 23:34:37', '2010-06-22 23:34:37');
INSERT INTO `wac_workflow_item` VALUES ('16', '1', '后整布发货阶段', 'wf_dispatch_clean_up', '0', null, '0', '0', null, null, '50', '1', '2010-06-23 14:04:33', '2010-06-22 23:34:56');
INSERT INTO `wac_workflow_item` VALUES ('17', '1', '成品布发货阶段', 'wf_dispatch_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-06-25 10:30:34', '2010-06-22 23:35:08');
INSERT INTO `wac_workflow_item` VALUES ('18', '1', '成品测试', 'wf_qc_final_cloth', '0', null, '0', '0', null, null, '50', '1', '2010-08-31 17:45:32', '2010-08-31 17:45:32');
