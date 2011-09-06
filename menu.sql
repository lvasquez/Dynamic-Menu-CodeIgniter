/*
Navicat MySQL Data Transfer

Source Server         : TOOLTIPS
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : menu

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2011-09-06 12:28:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dyn_groups`
-- ----------------------------
DROP TABLE IF EXISTS `dyn_groups`;
CREATE TABLE `dyn_groups` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `abbrev` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Navigation groupings. Eg, header, sidebar, footer, etc';

-- ----------------------------
-- Records of dyn_groups
-- ----------------------------
INSERT INTO `dyn_groups` VALUES ('1', 'Header', 'header');
INSERT INTO `dyn_groups` VALUES ('2', 'Sidebar', 'sidebar');
INSERT INTO `dyn_groups` VALUES ('3', 'Footer', 'footer');
INSERT INTO `dyn_groups` VALUES ('4', 'Topbar', 'topbar');
INSERT INTO `dyn_groups` VALUES ('5', 'Sidebar1', 'sidebar1');
INSERT INTO `dyn_groups` VALUES ('6', 'Sidebar2', 'sidebar2');

-- ----------------------------
-- Table structure for `dyn_menu`
-- ----------------------------
DROP TABLE IF EXISTS `dyn_menu`;
CREATE TABLE `dyn_menu` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `link_type` varchar(20) collate utf8_unicode_ci NOT NULL default 'uri',
  `page_id` int(11) NOT NULL default '0',
  `module_name` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `uri` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `dyn_group_id` int(11) NOT NULL default '0',
  `position` int(5) NOT NULL default '0',
  `target` varchar(10) collate utf8_unicode_ci default NULL,
  `parent_id` int(11) NOT NULL default '0',
  `is_parent` tinyint(1) NOT NULL default '0',
  `show_menu` enum('0','1') collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `dyn_group_id - normal` (`dyn_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dyn_menu
-- ----------------------------
INSERT INTO `dyn_menu` VALUES ('1', 'Category 1', 'page', '1', '', 'http://www.category1.com', '', '1', '0', '', '0', '1', '1');
INSERT INTO `dyn_menu` VALUES ('2', 'Category 2', 'page', '2', '', 'http://www.category2.com', '', '1', '0', '', '0', '0', '1');
INSERT INTO `dyn_menu` VALUES ('3', 'Category 3', 'page', '3', '', 'http://www.category3.com', '', '1', '0', '', '0', '0', '1');
INSERT INTO `dyn_menu` VALUES ('4', 'Category 4', 'page', '4', '', 'http://www.category4.com', '', '1', '0', '', '0', '0', '1');
INSERT INTO `dyn_menu` VALUES ('5', 'Category 1 - 1', 'page', '5', '', 'http://www.category11.com', '', '1', '0', '', '1', '0', '1');
INSERT INTO `dyn_menu` VALUES ('6', 'Category 1 - 2', 'page', '6', '', 'http://www.category12.com', '', '1', '0', '', '1', '1', '1');
INSERT INTO `dyn_menu` VALUES ('7', 'Category 1 - 2 - 1', 'page', '7', '', 'http://www.category121.com', '', '1', '0', '', '6', '0', '1');
INSERT INTO `dyn_menu` VALUES ('8', 'Category 1 - 2 - 2', 'page', '8', '', 'http://www.category122.com', '', '1', '0', '', '6', '1', '1');
INSERT INTO `dyn_menu` VALUES ('9', 'Category 1 - 2 - 2 - 1', 'page', '9', '', 'http://www.category1221.com', '', '1', '0', '', '8', '0', '1');
INSERT INTO `dyn_menu` VALUES ('10', 'Category 1 - 2 - 2 - 2', 'page', '10', '', 'http://www.category1222.com', '', '1', '0', '', '8', '0', '1');
INSERT INTO `dyn_menu` VALUES ('11', 'Category 3 - 1', 'page', '11', '', 'http://www.category31.com', '', '1', '0', '', '3', '1', '1');
INSERT INTO `dyn_menu` VALUES ('12', 'Category 3 - 2', 'page', '12', '', 'http://www.category32.com', '', '1', '0', '', '3', '0', '1');
INSERT INTO `dyn_menu` VALUES ('13', 'Category 3 - 3', 'page', '13', '', 'http://www.category33.com', '', '1', '0', '', '3', '0', '1');
INSERT INTO `dyn_menu` VALUES ('14', 'Category 3 - 4', 'page', '14', '', 'http://www.category34.com', '', '1', '0', '', '3', '0', '1');
INSERT INTO `dyn_menu` VALUES ('15', 'Category 3 - 5', 'page', '15', '', 'http://www.category35.com', '', '1', '0', '', '3', '0', '1');
INSERT INTO `dyn_menu` VALUES ('16', 'Category 3 - 6', 'page', '16', '', 'http://www.category36.com', '', '1', '0', '', '3', '0', '1');
