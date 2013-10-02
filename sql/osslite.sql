/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.16
Source Server Version : 50154
Source Host           : 192.168.1.16:3306
Source Database       : osslite

Target Server Type    : MYSQL
Target Server Version : 50154
File Encoding         : 65001

Date: 2012-07-16 15:12:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `oss_ad`
-- ----------------------------
DROP TABLE IF EXISTS `oss_ad`;
CREATE TABLE `oss_ad` (
  `ad_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(255) NOT NULL DEFAULT '',
  `ad_content` text NOT NULL,
  `ad_start` int(10) unsigned NOT NULL DEFAULT '0',
  `ad_end` int(10) unsigned NOT NULL DEFAULT '0',
  `ad_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_ad
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_admin`
-- ----------------------------
DROP TABLE IF EXISTS `oss_admin`;
CREATE TABLE `oss_admin` (
  `admin_id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_permissions` text NOT NULL,
  `admin_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_admin
-- ----------------------------
INSERT INTO `oss_admin` VALUES ('1', 'admin', 'D033E22AE348AEB5660FC2140AEC35850C4DA997', 'all', '1');
INSERT INTO `oss_admin` VALUES ('3', 'root', 'DC76E9F0C0006E8F919E0C515C66DBBA3982F785', 'all', '1');

-- ----------------------------
-- Table structure for `oss_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `oss_admin_log`;
CREATE TABLE `oss_admin_log` (
  `log_time` int(10) NOT NULL DEFAULT '0',
  `log_info` varchar(255) NOT NULL,
  `log_ip` varchar(50) NOT NULL DEFAULT '',
  `log_agent` varchar(255) NOT NULL,
  `admin_id` int(4) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_admin_log
-- ----------------------------
INSERT INTO `oss_admin_log` VALUES ('1334202913', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334202916', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334203342', '更新菜单:游戏论坛', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324035', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324124', '更新设置', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324210', '删除游戏:1', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324219', '删除游戏:3', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324223', '删除游戏:4', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324268', '更新游戏:盛世三国', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324315', '更新服务器:盛世三国1服', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334324340', '更新游戏:盛世三国', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333095', '更新游戏:盛世三国', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333105', '更新充值:支付宝', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333393', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333401', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333410', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333425', '删除充值:3', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333429', '删除充值:4', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333481', '更新充值:充值卡支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333486', '删除充值:6', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333489', '删除充值:7', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333525', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334333659', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334334826', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334335232', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334335269', '删除充值:1', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334335284', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334335303', '更新充值:充值卡支付', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334545001', '登陆系统:admin', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334545078', '批量删除内容', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334545395', '登陆系统:admin', '58.63.87.243', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.12 (KHTML, like Gecko) Maxthon/3.3.6.2000 Chrome/18.0.966.0 Safari/535.12', '1');
INSERT INTO `oss_admin_log` VALUES ('1334564248', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334564406', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334564555', '更新服务器:盛世三国1服', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334564654', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334564722', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334565947', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334566027', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334566491', '更新充值:103', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334566496', '更新充值:103', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334569692', '登陆系统:admin', '111.193.202.217', 'Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko/20100101 Firefox/11.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1334575439', '更新设置', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334580065', '更新服务器:盛世三国1服', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334581630', '更新模板:templates/kele/part_service.html', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334582045', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334582082', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334582334', '更新模板:templates/kele/part_service.html', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334584659', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334584698', '更新游戏:盛世三国', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334586140', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334586143', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334586180', '更新充值:移动充值卡', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334586202', '插入充值:联通充值卡', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334599803', '插入内容:盛世三国 全新跨服BOSS战预告', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334599812', '更新内容:盛世三国 全新跨服BOSS战预告', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334599829', '批量删除内容', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334606430', '更新服务器:盛世三国1服', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334606448', '更新服务器:盛世三国1服', '58.63.87.243', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334627246', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334627263', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (Windows NT 6.0; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1334652272', '登陆系统:admin', '59.41.217.24', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334655768', '登陆系统:admin', '60.208.111.201', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; QQDownload 691; WebSaver; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET CLR 1.1.4322; .NET4.0C; SaaYaa)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334655823', '更新模板:templates/kele/card_log.html', '60.208.111.201', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; QQDownload 691; WebSaver; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET CLR 1.1.4322; .NET4.0C; SaaYaa)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334658626', '更新模板:templates/kele/card_log.html', '60.208.111.201', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; QQDownload 691; WebSaver; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET CLR 1.1.4322; .NET4.0C; SaaYaa)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334658639', '更新模板:templates/kele/card_log.html', '60.208.111.201', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; QQDownload 691; WebSaver; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET CLR 1.1.4322; .NET4.0C; SaaYaa)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334659530', '更新模板:templates/kele/card_log.html', '60.208.111.201', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; QQDownload 691; WebSaver; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET CLR 1.1.4322; .NET4.0C; SaaYaa)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334683404', '登陆系统:admin', '113.116.94.21', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334683903', '更新管理员:admin', '59.41.217.24', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334755374', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334755526', '更新充值:网银支付', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334755943', '更新充值:移动充值卡', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334761937', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334761977', '更新游戏:盛世三国', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334761997', '更新服务器:盛世三国1服', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334804002', '登陆系统:admin', '222.125.227.203', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.5.21022; .NET CLR 3.5.30729; .NET CLR 3.0.30618)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334826381', '登陆系统:admin', '58.60.38.252', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334826398', '更新服务器:盛世三国1服', '58.60.38.252', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334826501', '更新服务器:龙争虎斗', '58.60.38.252', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334867375', '登陆系统:admin', '59.41.219.158', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334889324', '登陆系统:admin', '58.60.36.141', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334889755', '登陆系统:admin', '58.60.36.141', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334890437', '更新模板:templates/kele/reg.html', '58.60.36.141', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334890488', '更新模板:templates/kele/reg.html', '58.60.36.141', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334891980', '登陆系统:admin', '58.62.12.47', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; Avant Browser; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1334929964', '登陆系统:admin', '222.125.226.109', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.5.21022; .NET CLR 3.5.30729; .NET CLR 3.0.30618)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335019023', '登陆系统:admin', '222.125.230.95', 'Mozilla/5.0 (Windows NT 6.0; rv:11.0) Gecko/20100101 Firefox/11.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1335106929', '登陆系统:admin', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335106973', '插入新手卡:1111', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335106989', '插入新手卡:2222', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107007', '登陆系统:admin', '59.41.219.189', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107029', '清空缓存', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107087', '插入新手卡:盛世三国新手卡', '59.41.219.189', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107104', '插入新手卡:465456', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107142', '插入新手卡:盛世三国新手礼包', '59.41.219.189', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107152', '插入新手卡:ewqeq', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335107159', '插入新手卡:ewqeqw', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335108254', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335108263', '插入新手卡:test', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335109005', '登陆系统:admin', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335109148', '登陆系统:admin', '59.41.219.189', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Avant Browser)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335109216', '更新新手卡:盛世三国新手卡', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335109232', '更新新手卡:盛世三国一区新手卡', '113.116.75.160', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335167141', '登陆系统:admin', '58.62.167.60', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20120325 Firefox/11.0 AvantBrowser/Tri-Core', '1');
INSERT INTO `oss_admin_log` VALUES ('1335167747', '更新会员:zcr189', '58.62.167.60', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20120325 Firefox/11.0 AvantBrowser/Tri-Core', '1');
INSERT INTO `oss_admin_log` VALUES ('1335170179', '登陆系统:admin', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335171582', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335171585', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335172728', '更新新手卡:盛世三国新手卡', '58.62.167.60', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20120325 Firefox/11.0 AvantBrowser/Tri-Core', '1');
INSERT INTO `oss_admin_log` VALUES ('1335172974', '更新模板:templates/kele/part_game_new.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335173030', '更新模板:templates/kele/part_game_hot.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335173120', '更新模板:templates/kele/user.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335177897', '更新新手卡:盛世三国一区新手卡', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335177907', '更新新手卡:盛三一区新手卡', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335191964', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192038', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192060', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192105', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192124', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192161', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192179', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192213', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192225', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192619', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335192929', '更新模板:templates/kele/user_card.html', '14.153.215.112', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335236530', '登陆系统:admin', '58.60.84.33', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335236570', '更新会员:zxx3929', '58.60.84.33', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335333374', '登陆系统:admin', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335333408', '更新模板:templates/kele/footer.html', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335333813', '登陆系统:admin', '59.41.218.128', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334495', '更新连接:最新网页游戏资讯', '59.41.218.128', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334537', '更新连接:最新网页游戏资讯', '59.41.218.128', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334553', '更新连接:最新网页游戏资讯', '59.41.218.128', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334600', '更新连接:最新网页游戏资讯', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334634', '更新连接:最新网页游戏资讯', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334641', '更新连接:最新网页游戏资讯', '59.41.218.128', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334644', '更新连接:最新网页游戏资讯', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335334670', '更新连接:最新网页游戏资讯', '58.60.85.150', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335368865', '登陆系统:admin', '58.62.82.230', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335381602', '登陆系统:admin', '58.62.14.221', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335381622', '更新管理员:admin', '58.62.14.221', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335446704', '登陆系统:admin', '58.60.37.73', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335446832', '更新服务器:龙争虎斗', '58.60.37.73', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335452312', '登陆系统:admin', '113.108.206.220', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335574946', '登陆系统:admin', '218.20.248.96', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335577363', '登陆系统:admin', '114.248.233.37', 'Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko/20100101 Firefox/11.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1335580936', '登陆系统:admin', '114.248.233.37', 'Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko/20100101 Firefox/11.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1335582287', '登陆系统:admin', '114.248.233.37', 'Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko/20100101 Firefox/11.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1335583340', '登陆系统:admin', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335594812', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335594827', '删除充值:5', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335594831', '删除充值:8', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335594861', '插入充值:移动充值卡', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335594954', '插入充值:联通充值卡', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335597369', '登陆系统:admin', '218.20.248.96', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335609015', '登陆系统:admin', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335609684', '更新模板:templates/kele/reg.html', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335609688', '清空缓存', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335609826', '更新模板:templates/kele/reg.html', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335610022', '更新模板:templates/kele/reg.html', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335610299', '更新模板:templates/kele/reg.html', '219.134.165.45', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335656121', '登陆系统:admin', '183.1.253.92', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335656404', '插入内容:51盛宴，起飞《盛世三国》首服“龙争虎斗”今日震撼开启', '183.1.253.92', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335657575', '插入内容:盛世三国好礼不断 龙争虎斗谁与争锋', '183.1.253.92', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335658169', '插入内容:起飞五一专署活动，助你笑傲《盛世三国》', '183.1.253.92', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335665023', '登陆系统:admin', '58.62.84.253', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335670980', '登陆系统:admin', '58.62.84.253', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335678831', '插入内容:[公告]   4月29日违规账号处理公告', '58.62.84.253', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335682511', '登陆系统:admin', '222.129.39.167', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1335687965', '登陆系统:admin', '58.62.86.32', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335688008', '登陆系统:admin', '58.62.86.32', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335688194', '登陆系统:admin', '113.116.74.16', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335691818', '清空缓存', '113.116.74.16', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335694924', '插入会员:ceshi001', '113.116.74.16', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335694950', '插入会员:ceshi001', '113.116.74.16', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335697646', '登陆系统:admin', '222.129.39.167', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1335697747', '更新管理员:admin', '58.62.86.32', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335760327', '登陆系统:admin', '58.62.86.32', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335809192', '登陆系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335825898', '退出系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335825932', '登陆系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335834616', '退出系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335834754', '登陆系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335835016', '更新充值:529', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335835037', '更新充值:529', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335872602', '登陆系统:admin', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335875079', '更新会员:985292477', '58.62.166.173', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335878298', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335878403', '更新会员:985292477', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335878541', '更新会员:985292477', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1335880106', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336016331', '登陆系统:admin', '125.77.237.175', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336016760', '更新会员:zxx0909', '125.77.237.175', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336058626', '登陆系统:admin', '58.62.13.42', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336119591', '更新会员:985292477', '58.62.13.42', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336228679', '登陆系统:admin', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336283177', '登陆系统:admin', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336294195', '登陆系统:admin', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336294324', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336294460', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336297373', '更新设置', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336297756', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336297835', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336298017', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336298328', '更新设置', '14.153.215.251', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336298368', '更新设置', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336298636', '更新会员:mtfsh', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336298744', '更新会员:mtfsh', '59.41.219.130', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336403825', '登陆系统:admin', '58.63.65.35', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336403870', '更新会员:Just', '58.63.65.35', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336441046', '登陆系统:admin', '14.153.212.156', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336558822', '登陆系统:admin', '58.63.65.35', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336723997', '登陆系统:admin', '58.63.84.135', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336724457', '登陆系统:admin', '110.249.134.214', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; InfoPath.2; .NET4.0C; .NET4.0E; AskTbAF3-SRS/5.9.0.12758; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1336743905', '登陆系统:admin', '119.59.237.246', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1336744341', '退出系统:admin', '119.59.237.246', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1337065269', '登陆系统:admin', '117.82.183.242', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337065317', '更新会员:hongqi1024', '117.82.183.242', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337126482', '登陆系统:admin', '58.60.86.164', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337126618', '删除连接:最新网页游戏资讯', '58.60.86.164', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337126633', '更新连接:游戏资讯平台', '58.60.86.164', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337126802', '清空缓存', '58.60.86.164', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; QQDownload 708; SLCC1; .NET CLR 2.0.50727; InfoPath.2; WWTClient2; .NET CLR 3.0.30729; .NET CLR 3.5.21022; .NET4.0C; .NET4.0E)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337135063', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337145441', '登陆系统:admin', '114.248.231.184', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337172667', '登陆系统:admin', '117.82.183.242', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337176283', '登陆系统:admin', '220.152.236.191', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1337176410', '退出系统:admin', '220.152.236.191', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1337179372', '登陆系统:admin', '117.82.183.242', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337179444', '登陆系统:admin', '220.152.236.191', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1337179786', '退出系统:admin', '220.152.236.191', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1337182937', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337182972', '更新设置', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337183016', '清空缓存', '110.80.15.14', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337248223', '登陆系统:admin', '58.209.95.25', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337343447', '登陆系统:admin', '117.82.179.222', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337344215', '登陆系统:admin', '121.204.197.178', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337344376', '更新设置', '121.204.197.178', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337593343', '登陆系统:admin', '117.83.81.81', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337643902', '登陆系统:admin', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337650248', '登陆系统:admin', '111.193.213.130', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337650358', '插入充值:骏网一卡通', '111.193.213.130', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337657572', '登陆系统:admin', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337657599', '更新充值:移动充值卡', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337658784', '更新充值:联通充值卡', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337658794', '更新充值:骏网一卡通', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337659044', '登陆系统:admin', '111.193.213.130', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337659133', '插入充值:电信充值卡', '111.193.213.130', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337664598', '更新充值:电信充值卡', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337695007', '登陆系统:admin', '110.80.15.14', 'Mozilla/5.0 (Windows NT 5.2; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337695058', '退出系统:admin', '110.80.15.14', 'Mozilla/5.0 (Windows NT 5.2; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1337695144', '登陆系统:admin', '117.82.179.84', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1337849327', '登陆系统:admin', '111.193.213.130', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1338000158', '登陆系统:admin', '121.28.160.56', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; InfoPath.2; .NET4.0C; .NET4.0E; AskTbAF3-SRS/5.9.0.12758; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338130473', '登陆系统:admin', '114.219.171.181', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338170808', '登陆系统:admin', '222.92.13.98', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338170878', '登陆系统:admin', '121.28.160.56', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; SV1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; InfoPath.2; .NET4.0C; .NET4.0E; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338346763', '登陆系统:admin', '222.92.13.98', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338348909', '登陆系统:admin', '222.92.13.98', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338427969', '登陆系统:admin', '222.92.13.98', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338428014', '登陆系统:admin', '222.92.13.98', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338432190', '退出系统:admin', '222.92.13.98', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338432207', '登陆系统:admin', '222.92.13.98', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338513782', '登陆系统:admin', '222.92.13.98', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338686894', '登陆系统:admin', '222.129.35.159', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338687467', '登陆系统:admin', '222.129.35.159', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338687691', '插入服务器:龙飞凤舞', '222.129.35.159', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338772141', '登陆系统:admin', '114.218.83.74', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338773288', '登陆系统:admin', '222.129.33.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.52 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338773462', '登陆系统:admin', '114.218.83.74', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338777060', '更新服务器:龙飞凤舞', '114.218.83.74', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338797838', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338801660', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338822514', '登陆系统:admin', '222.93.76.53', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1338822679', '登陆系统:admin', '120.84.13.126', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1338859188', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338859275', '更新连接:好玩的网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338859511', '更新连接:好玩的网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338859532', '更新连接:好玩的网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338859543', '更新连接:好玩的网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338866254', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338866274', '更新连接:网页345', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338866301', '更新连接:网页345', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338866335', '更新连接:网页345', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338866729', '更新连接:游客来', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338876518', '更新连接:哎呀游戏网', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338881005', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338881025', '更新连接:新开网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338885405', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338885422', '更新连接:咕咕鱼开服表', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338909788', '登陆系统:admin', '119.59.239.205', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1338910095', '退出系统:admin', '119.59.239.205', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1338944326', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338944783', '插入新手卡:盛三一区新手卡', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338945001', '更新新手卡:盛三二区新手卡', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338947939', '更新连接:玩页游新服网', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338948130', '登陆系统:admin', '180.117.228.247', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338948263', '插入内容:起飞《盛世三国》新服今日13:00震撼开启', '180.117.228.247', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338948380', '更新内容:起飞《盛世三国》新服今日13:00震撼开启', '180.117.228.247', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338949863', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338949880', '更新连接:969G网页游戏', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338950438', '插入会员:777flytuiguang', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338950487', '更新连接:55网页游戏开服表', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338950538', '更新连接:55网页游戏开服表', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338950551', '删除连接:55网页游戏开服表', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338950597', '删除连接:游戏资讯平台', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951070', '更新会员:777flytuiguagn', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951083', '更新会员:777flytuiguagn', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951134', '更新会员:777flytuiguagn', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951374', '更新会员:777flytuiguagn', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951856', '更新会员:777flytg', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338951879', '更新会员:777flytg', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338952459', '登陆系统:admin', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338952518', '插入会员:tuiguang', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338952900', '插入会员:tuiguang', '180.117.228.247', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338960882', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962808', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962848', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962863', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962869', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962879', '删除连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338962890', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338963699', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338963723', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338963734', '更新连接:热门游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338965823', '登陆系统:admin', '180.117.231.206', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1338970550', '更新连接:新开网页游戏', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338972143', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338972185', '更新连接:网页游戏开服表', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338973360', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338973927', '插入内容:盛世三国好礼不断 龙飞凤舞谁与争锋', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338973956', '更新内容:盛世三国好礼不断 龙飞凤舞谁与争锋', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338973971', '更新内容:盛世三国好礼不断 龙飞凤舞谁与争锋', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1338973982', '更新内容:盛世三国好礼不断 龙飞凤舞谁与争锋', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339034459', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339039965', '登陆系统:admin', '180.117.231.206', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339040031', '更新服务器:龙飞凤舞', '180.117.231.206', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339058881', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339059403', '插入内容:起飞《盛世三国》6月11日全服维护更新公告', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339060036', '更新内容:起飞《盛世三国》6月11日全服维护更新公告', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339060514', '插入内容:起飞《盛世三国》6月8日线路维护公告', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339063992', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339064005', '登陆系统:admin', '180.117.231.206', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339069801', '登陆系统:admin', '114.218.136.103', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339070049', '登陆系统:admin', '114.218.136.103', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339084303', '登陆系统:admin', '114.218.136.103', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339411258', '登陆系统:admin', '222.93.68.166', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339411388', '插入内容:起飞《盛世三国》6月12日5:00-6:30 临时维护公告', '222.93.68.166', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339439690', '登陆系统:admin', '222.93.68.166', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339553864', '登陆系统:admin', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339557389', '登陆系统:admin', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339557458', '插入内容:起飞《盛世三国》新区活动-“战力礼包”更新说明', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339590569', '登陆系统:admin', '117.82.172.228', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339590653', '更新会员:yxq851201', '117.82.172.228', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1339653974', '登陆系统:admin', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339654124', '插入内容:起飞《盛世三国》6月18日更新公告', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339661415', '更新连接:网页游戏开服表', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339661558', '删除连接:网页游戏开服表', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339668881', '登陆系统:admin', '180.106.86.165', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339723529', '登陆系统:admin', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339723563', '更新连接:网页游戏开服表', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339726461', '更新连接:82yx开服表', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339727945', '更新连接:86wan开服表', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339740022', '更新连接:游戏窝门户网', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339742191', '更新连接:网页游戏大全', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339744772', '更新连接:八目鱼网页游戏', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339747924', '更新连接:2678网页游戏开服表', '114.217.18.209', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339902898', '登陆系统:admin', '117.82.178.97', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339902927', '更新会员:tianwei', '117.82.178.97', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339982720', '登陆系统:admin', '123.124.206.69', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1339982889', '插入服务器:飞龙乘云', '123.124.206.69', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0', '1');
INSERT INTO `oss_admin_log` VALUES ('1339983516', '更新服务器:飞龙乘云', '180.117.9.172', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1339997488', '登陆系统:admin', '180.117.9.172', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339997501', '更新连接:66378游戏网', '180.117.9.172', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1339997837', '更新连接:66378游戏网', '180.117.9.172', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340000982', '更新连接:今日新开网页游戏', '180.117.9.172', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340009558', '更新连接:要发开服表', '180.117.9.172', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340072383', '登陆系统:admin', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340072396', '更新连接:乐翻网', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340074947', '更新连接:256cha网页游戏', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340075422', '更新服务器:飞龙乘云', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340075767', '更新新手卡:龙争虎斗新手卡', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340075784', '更新新手卡:龙飞凤舞新手卡', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340075828', '插入新手卡:飞龙乘云新手卡', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340095796', '登陆系统:admin', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340095998', '登陆系统:admin', '180.117.58.194', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340096408', '插入内容:盛世三国双线三区飞龙乘云6月23日13点耀世开启', '180.117.58.194', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340096425', '更新内容:盛世三国双线三区飞龙乘云6月23日13点耀世开启', '180.117.58.194', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340096437', '更新内容:盛世三国双线三区飞龙乘云6月23日13点耀世开启', '180.117.58.194', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340096455', '更新内容:盛世三国双线三区飞龙乘云6月23日13点耀世开启', '180.117.58.194', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340106032', '登陆系统:admin', '58.209.223.27', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1340106159', '更新内容:起飞《盛世三国》6月18日更新公告', '58.209.223.27', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1340106200', '插入内容:起飞《盛世三国》6月20日线路维护公告', '58.209.223.27', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1340113121', '登陆系统:admin', '119.59.207.15', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1340113399', '退出系统:admin', '119.59.207.15', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1340185594', '登陆系统:admin', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340185720', '更新服务器:飞龙乘云', '180.117.58.194', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340253519', '更新会员:yxq851201', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340253660', '更新会员:yxq851201', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340260666', '登陆系统:admin', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340260691', '更新会员:pingzi17', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340260725', '更新会员:pingzi17', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340262523', '登陆系统:admin', '110.80.15.14', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.2; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340262692', '更新会员:12', '110.80.15.14', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.2; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340264329', '登陆系统:admin', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340264341', '更新会员:pingzi17', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340266813', '更新会员:yxq851201', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340266896', '退出系统:admin', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340266913', '登陆系统:admin', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340266953', '更新会员:yxq851201', '58.208.83.200', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340267385', '登陆系统:admin', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340267493', '插入内容:起飞《盛世三国》6月25日更新、端午节活动公告', '58.208.83.200', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340335162', '登陆系统:admin', '114.217.16.49', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340335243', '插入内容:起飞《盛世三国》6月22日补偿公告', '114.217.16.49', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340355572', '登陆系统:admin', '114.217.16.49', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340401395', '登陆系统:admin', '119.59.156.106', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1340409222', '更新会员:tianwei', '222.93.69.70', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340416808', '登陆系统:admin', '221.225.11.139', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340416839', '更新会员:zz01', '221.225.11.139', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340430708', '更新会员:ff77', '221.225.11.139', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340430884', '登陆系统:admin', '221.225.11.139', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340431008', '登陆系统:admin', '221.225.11.139', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340501846', '登陆系统:admin', '222.93.68.49', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19', '1');
INSERT INTO `oss_admin_log` VALUES ('1340504870', '登陆系统:admin', '221.225.11.139', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340591363', '登陆系统:admin', '117.83.20.14', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340591379', '更新会员:yxq851201', '117.83.20.14', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.46 Safari/536.5', '1');
INSERT INTO `oss_admin_log` VALUES ('1340629348', '登陆系统:admin', '58.249.63.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1340629475', '退出系统:admin', '58.249.63.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2', '1');
INSERT INTO `oss_admin_log` VALUES ('1340674020', '更新会员:a547227221', '114.218.81.253', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1340674068', '更新会员:yxq851201', '114.218.81.253', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; QQDownload 708; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341475966', '登陆系统:admin', '192.168.1.104', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341475976', '清空缓存', '192.168.1.104', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341477909', '登陆系统:admin', '192.168.1.104', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.47 Safari/536.11', '1');
INSERT INTO `oss_admin_log` VALUES ('1341542566', '登陆系统:admin', '192.168.1.86', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.47 Safari/536.11', '1');
INSERT INTO `oss_admin_log` VALUES ('1341913257', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341913259', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341913274', '插入管理员:root', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341913296', '更新管理员:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341937666', '登陆系统:root', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341937668', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341938938', '登陆系统:root', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341938940', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341939179', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341939240', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1341995516', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1341995518', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342019059', '登陆系统:root', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1342019061', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1342019325', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '3');
INSERT INTO `oss_admin_log` VALUES ('1342022135', '登陆系统:root', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '3');
INSERT INTO `oss_admin_log` VALUES ('1342022138', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0)', '3');
INSERT INTO `oss_admin_log` VALUES ('1342118079', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342118082', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342119878', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342120015', '更新设置', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342120069', '插入内容:asdasdasda', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342262747', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342262749', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342277264', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342278108', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342278372', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342281619', '登陆系统:admin', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342281682', '更新内容:asdasdasda', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342283256', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342283286', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');
INSERT INTO `oss_admin_log` VALUES ('1342283359', '清空缓存', '192.168.1.88', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; 360SE)', '1');

-- ----------------------------
-- Table structure for `oss_card`
-- ----------------------------
DROP TABLE IF EXISTS `oss_card`;
CREATE TABLE `oss_card` (
  `card_id` int(4) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(50) DEFAULT NULL,
  `card_logo` varchar(50) DEFAULT NULL,
  `card_depict` varchar(255) DEFAULT NULL,
  `card_link` varchar(50) DEFAULT NULL,
  `card_state` tinyint(1) DEFAULT NULL,
  `card_game_id` int(4) DEFAULT NULL,
  `card_server_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_card
-- ----------------------------
INSERT INTO `oss_card` VALUES ('1', '龙争虎斗新手卡', '', '盛世三国一区龙争虎斗新手卡', '', '1', '2', '0');
INSERT INTO `oss_card` VALUES ('2', '龙飞凤舞新手卡', '', '盛世三国-双线二区龙飞凤舞新手卡', '', '1', '2', '0');
INSERT INTO `oss_card` VALUES ('3', '飞龙乘云新手卡', '', '盛世三国-双线三区飞龙乘云新手卡', '', '1', '2', '0');

-- ----------------------------
-- Table structure for `oss_card_number`
-- ----------------------------
DROP TABLE IF EXISTS `oss_card_number`;
CREATE TABLE `oss_card_number` (
  `number_id` int(4) NOT NULL AUTO_INCREMENT,
  `card_id` int(4) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `number_state` smallint(2) DEFAULT NULL,
  `number_add_time` datetime DEFAULT NULL,
  `number_get_time` datetime DEFAULT NULL,
  `number_get_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`number_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_card_number
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_cashlog`
-- ----------------------------
DROP TABLE IF EXISTS `oss_cashlog`;
CREATE TABLE `oss_cashlog` (
  `log_id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `truename` varchar(50) NOT NULL,
  `idcard` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `bankno` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `cash` int(4) NOT NULL,
  `log_state` tinyint(2) unsigned zerofill DEFAULT '00',
  `log_ip` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_cashlog
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_config`
-- ----------------------------
DROP TABLE IF EXISTS `oss_config`;
CREATE TABLE `oss_config` (
  `config_type` varchar(10) NOT NULL DEFAULT '',
  `config_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_config
-- ----------------------------
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');
INSERT INTO `oss_config` VALUES ('config', 'YTozNTp7czo5OiJzaXRlX25hbWUiO3M6Mzc6IuaDs+eOqeWknyHkuIropoHlpJ/njqnmuLjmiI/lubPlj7DvvIEiO3M6ODoic2l0ZV9pY3AiO3M6NDM6IuaWh+e9keaWh1syMDEwXTIxOOWPt++8jOWGgElDUOWkhzEwMjA0MDUxLTIiO3M6MTM6InNpdGVfa2V5d29yZHMiO3M6MTI6Iue9kemhtea4uOaIjyI7czoxNjoic2l0ZV9kZXNjcmlwdGlvbiI7czoxMjoi572R6aG15ri45oiPIjtzOjExOiJzaXRlX25vdGljZSI7czowOiIiO3M6MTA6InNpdGVfc3RhdGUiO3M6MzoieWVzIjtzOjE1OiJzaXRlX2Nsb3NlX3RleHQiO3M6Mjc6Iuezu+e7n+e7tOaKpO+8jOivt+eojeWQju+8gSI7czo3OiJzaXRlX2lwIjtzOjIyOiIxMC4xMC4xMC4qDQoxMjcuMC4wLjEwIjtzOjEzOiJzaXRlX2JhZHdvcmRzIjtzOjA6IiI7czoxMzoic2l0ZV9sYW5ndWFnZSI7czo3OiJjaGluZXNlIjtzOjEzOiJzaXRlX3RlbXBsYXRlIjtzOjQ6ImtlbGUiO3M6MTE6Im9ubGluZV90aW1lIjtpOjYwO3M6MTM6InJld3JpdGVfc3RhdGUiO3M6Mjoibm8iO3M6MTQ6ImZlZWRiYWNrX3N0YXRlIjtzOjI6Im5vIjtzOjEzOiJmZWVkYmFja19zaXplIjtzOjI6Im5vIjtzOjEzOiJjb21tZW50X3N0YXRlIjtzOjI6Im5vIjtzOjEyOiJtZW1iZXJfc3RhdGUiO3M6MzoieWVzIjtzOjIzOiJtZW1iZXJfdmFsaWRhdGlvbl9zdGF0ZSI7czoyOiJubyI7czoxODoiaW5kZXhfY29tbWVudF9zaXplIjtpOjEwO3M6MjY6ImluZGV4X2NvbW1lbnRfY29udGVudF9zaXplIjtpOjE4O3M6MTY6ImNvbnRlbnRfaG90X3NpemUiO2k6MTA7czoyMjoiY29udGVudF9ob3RfdGl0bGVfc2l6ZSI7aToxODtzOjE3OiJjb250ZW50X2Jlc3Rfc2l6ZSI7aToxMDtzOjIzOiJjb250ZW50X2Jlc3RfdGl0bGVfc2l6ZSI7aToxODtzOjEyOiJjb21tZW50X3NpemUiO2k6MTA7czoxMToic2VhcmNoX3NpemUiO2k6MTA7czoxMToic210cF9zZXJ2ZXIiO3M6MTI6InNtdHAuMTYzLmNvbSI7czo5OiJzbXRwX3BvcnQiO3M6MjoiMjUiO3M6OToic210cF91c2VyIjtzOjE1OiJ3aG1lZGlhQDE2My5jb20iO3M6MTM6InNtdHBfcGFzc3dvcmQiO3M6MTQ6IndobWVkaWE1NzU5Mzc1IjtzOjE2OiJpbWFnZV90aHVtYl9vcGVuIjtzOjI6Im5vIjtzOjE3OiJpbWFnZV90aHVtYl93aWR0aCI7aToxMDA7czoxODoiaW1hZ2VfdGh1bWJfaGVpZ2h0IjtpOjEwMDtzOjE1OiJpbWFnZV90ZXh0X29wZW4iO3M6Mjoibm8iO3M6OToiaW1hZ2VfcG9zIjtpOjE7fQ==');

-- ----------------------------
-- Table structure for `oss_content`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content`;
CREATE TABLE `oss_content` (
  `content_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `content_title` varchar(255) NOT NULL,
  `content_url` varchar(255) NOT NULL DEFAULT '',
  `content_keywords` varchar(255) NOT NULL DEFAULT '',
  `content_text` text NOT NULL,
  `content_description` varchar(255) NOT NULL DEFAULT '',
  `content_password` varchar(255) NOT NULL,
  `content_thumb` varchar(255) NOT NULL,
  `content_support` smallint(5) unsigned NOT NULL DEFAULT '0',
  `content_against` smallint(5) unsigned NOT NULL DEFAULT '0',
  `content_click_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content_comment_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `content_is_best` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content_is_comment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content_time` int(10) unsigned NOT NULL DEFAULT '0',
  `channel_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `category_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `member_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_content_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content_attachment`;
CREATE TABLE `oss_content_attachment` (
  `attachment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_name` varchar(30) NOT NULL,
  `content_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`attachment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content_attachment
-- ----------------------------
INSERT INTO `oss_content_attachment` VALUES ('1', '20120429073737_mvsqee.jpg', '11');
INSERT INTO `oss_content_attachment` VALUES ('2', '20120429073847_fellwk.jpg', '11');
INSERT INTO `oss_content_attachment` VALUES ('3', '20120429073916_rokxwz.jpg', '11');
INSERT INTO `oss_content_attachment` VALUES ('4', '20120429073942_nlglxm.jpg', '11');
INSERT INTO `oss_content_attachment` VALUES ('5', '20120429080736_ibsxgs.jpg', '13');
INSERT INTO `oss_content_attachment` VALUES ('6', '20120429080820_hrhein.jpg', '13');
INSERT INTO `oss_content_attachment` VALUES ('7', '20120429080854_oqdfhq.jpg', '13');
INSERT INTO `oss_content_attachment` VALUES ('8', '20120429080924_bfzjdi.jpg', '13');
INSERT INTO `oss_content_attachment` VALUES ('9', '20120606100222_zqxbsc.jpg', '15');
INSERT INTO `oss_content_attachment` VALUES ('10', '20120606100313_jyurnc.jpg', '15');
INSERT INTO `oss_content_attachment` VALUES ('11', '20120606100331_wvgnrl.jpg', '15');
INSERT INTO `oss_content_attachment` VALUES ('12', '20120606100340_yhlvds.jpg', '15');
INSERT INTO `oss_content_attachment` VALUES ('13', '20120606100358_bvnkqa.jpg', '15');
INSERT INTO `oss_content_attachment` VALUES ('14', '20120619165423_bmswzi.jpg', '22');

-- ----------------------------
-- Table structure for `oss_content_category`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content_category`;
CREATE TABLE `oss_content_category` (
  `category_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '',
  `category_deep` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `category_sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `category_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_id` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content_category
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_content_channel`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content_channel`;
CREATE TABLE `oss_content_channel` (
  `channel_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(50) NOT NULL,
  `channel_description` varchar(255) NOT NULL,
  `channel_banner` varchar(255) NOT NULL DEFAULT '',
  `channel_index` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `channel_index_truncate` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_index_size` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_index_style` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_list_truncate` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_list_size` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_list_style` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `channel_content_style` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `channel_content_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `channel_sort` tinyint(3) NOT NULL DEFAULT '0',
  `channel_read_permissions` tinyint(3) NOT NULL DEFAULT '0',
  `channel_write_permissions` tinyint(3) NOT NULL DEFAULT '0',
  `channel_comment_permissions` tinyint(3) NOT NULL DEFAULT '0',
  `channel_upload_ext` varchar(255) NOT NULL DEFAULT '',
  `channel_cache` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `channel_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content_channel
-- ----------------------------
INSERT INTO `oss_content_channel` VALUES ('1', '游戏动态', '游戏动态', '', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '-1', '0', '0', 'jpg,png,gif,bmp,zip,rar,tar,7z,torrent,mp3,wma,swf,doc,docx,xls,xlsx,ppt,pptx,mdb,mdbx', '1', '1');
INSERT INTO `oss_content_channel` VALUES ('2', '常见问题', '常见问题', '', '0', '0', '0', '1', '0', '0', '1', '1', '0', '0', '-1', '0', '0', 'jpg,png,gif,bmp,zip,rar,tar,7z,torrent,mp3,wma,swf,doc,docx,xls,xlsx,ppt,pptx,mdb,mdbx', '1', '1');

-- ----------------------------
-- Table structure for `oss_content_comment`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content_comment`;
CREATE TABLE `oss_content_comment` (
  `comment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `comment_content` text NOT NULL,
  `comment_reply` text NOT NULL,
  `comment_time` int(10) unsigned NOT NULL DEFAULT '0',
  `comment_ip` varchar(50) NOT NULL DEFAULT '',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `member_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_content_link`
-- ----------------------------
DROP TABLE IF EXISTS `oss_content_link`;
CREATE TABLE `oss_content_link` (
  `link_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL,
  `content_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_content_link
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `oss_feedback`;
CREATE TABLE `oss_feedback` (
  `feedback_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `feedback_name` varchar(50) NOT NULL DEFAULT '',
  `feedback_content` text NOT NULL,
  `feedback_reply` text NOT NULL,
  `feedback_time` int(10) unsigned NOT NULL DEFAULT '0',
  `feedback_reply_time` int(10) unsigned NOT NULL DEFAULT '0',
  `feedback_ip` varchar(20) NOT NULL DEFAULT '',
  `feedback_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_game`
-- ----------------------------
DROP TABLE IF EXISTS `oss_game`;
CREATE TABLE `oss_game` (
  `game_id` int(4) NOT NULL AUTO_INCREMENT,
  `game_type` tinyint(2) DEFAULT NULL,
  `game_no` varchar(50) DEFAULT NULL,
  `game_name` varchar(50) DEFAULT NULL,
  `game_logo` varchar(50) DEFAULT NULL,
  `game_logo2` varchar(50) DEFAULT NULL,
  `game_logo3` varchar(50) DEFAULT NULL,
  `game_logo4` varchar(50) DEFAULT NULL,
  `game_logo5` varchar(50) DEFAULT NULL,
  `game_logo6` varchar(50) DEFAULT NULL,
  `game_logo7` varchar(50) DEFAULT NULL,
  `game_logo8` varchar(50) DEFAULT NULL,
  `game_logo9` varchar(50) DEFAULT NULL,
  `game_depict` varchar(255) DEFAULT NULL,
  `game_website` varchar(50) DEFAULT NULL,
  `game_bbs` varchar(50) DEFAULT NULL,
  `game_freshman` varchar(50) DEFAULT NULL,
  `game_is_show` tinyint(1) DEFAULT NULL,
  `game_is_focus` tinyint(1) DEFAULT NULL,
  `game_is_best` tinyint(1) DEFAULT NULL,
  `game_is_hot` tinyint(1) DEFAULT NULL,
  `game_sort` smallint(2) DEFAULT NULL,
  `game_money_per` smallint(2) DEFAULT NULL,
  `game_money_name` varchar(50) DEFAULT NULL,
  `game_pay_role` tinyint(1) DEFAULT NULL,
  `game_login_gateway` varchar(50) DEFAULT NULL,
  `game_pay_gateway` varchar(50) DEFAULT NULL,
  `game_port_config1` varchar(255) DEFAULT NULL,
  `game_port_config2` varchar(255) DEFAULT NULL,
  `game_port_config3` varchar(255) DEFAULT NULL,
  `game_port_config4` varchar(255) DEFAULT NULL,
  `game_port_config5` varchar(255) DEFAULT NULL,
  `game_port_s1` varchar(50) DEFAULT NULL,
  `game_port_s2` varchar(50) DEFAULT NULL,
  `game_port_s3` varchar(50) DEFAULT NULL,
  `game_port_s4` varchar(50) DEFAULT NULL,
  `game_port_s5` varchar(50) DEFAULT NULL,
  `to_gold_rate` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '1RMB兑换比率',
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_game
-- ----------------------------
INSERT INTO `oss_game` VALUES ('2', '0', 'SSSG', '盛世三国', '20120416161728_xqpedm.jpg', '20120416164547_vbchjn.jpg', '20120416215818_axzmzn.png', '20120416164707_vgbiac.jpg', '20120416162006_ooaoqr.jpg', '20120322175044_dtpvor.jpg', '20120322175044_pcfqbx.jpg', '20120322175044_wtlsba.jpg', '20120322175044_rxcajz.jpg', '《盛世三国》以汉末黄巾之乱、诸侯割据并终成三国鼎立之势为故事蓝本，再现了三国时期烽烟四起，豪情万丈的壮观场面。游戏运用了多种当下最新技术，打造了各式各样逼真的场景，绚丽的光影，极大丰富了游戏的画面表现...', 'http://sg.777fly.com', 'http://bbs.777fly.com', '', '1', '1', '1', '1', '0', '100', '银子', '0', '', '', '5VkSdZfPdyaM56SAUppI', '5VkSdZfPdyaM56SAUppI', '', '', '', 'login_key', 'pay_key', '', '', '', '100');

-- ----------------------------
-- Table structure for `oss_gamelog`
-- ----------------------------
DROP TABLE IF EXISTS `oss_gamelog`;
CREATE TABLE `oss_gamelog` (
  `log_id` int(4) NOT NULL AUTO_INCREMENT,
  `log_user_id` int(4) DEFAULT NULL,
  `log_game_id` int(4) DEFAULT NULL,
  `log_server_id` int(4) DEFAULT NULL,
  `log_server_name` varchar(50) DEFAULT NULL,
  `log_time` int(10) DEFAULT NULL,
  `log_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_gamelog
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_link`
-- ----------------------------
DROP TABLE IF EXISTS `oss_link`;
CREATE TABLE `oss_link` (
  `link_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(50) NOT NULL,
  `link_logo` varchar(100) NOT NULL DEFAULT '',
  `link_text` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_sort` int(4) unsigned NOT NULL DEFAULT '0',
  `link_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_link
-- ----------------------------
INSERT INTO `oss_link` VALUES ('1', '可乐游戏平台', '', '', 'http://www.ctrlz.cn', '1', '1');
INSERT INTO `oss_link` VALUES ('15', '热门游戏开服表', '', '', 'http://kf.reyoo.net', '12', '1');
INSERT INTO `oss_link` VALUES ('16', '新开网页游戏', '', '', 'http://www.03th.com/', '13', '1');
INSERT INTO `oss_link` VALUES ('4', '好玩的网页游戏', '', '', 'http://www.1617u.com/', '4', '1');
INSERT INTO `oss_link` VALUES ('5', '网页345', '', '', 'http://www.wy345.com', '5', '1');
INSERT INTO `oss_link` VALUES ('6', '游客来', '', '', 'http://www.youkelai.com/', '6', '1');
INSERT INTO `oss_link` VALUES ('7', '哎呀游戏网', '', '', 'http://www.92ay.com/', '7', '1');
INSERT INTO `oss_link` VALUES ('8', '新开网页游戏', '', '', 'http://www.521g.com/', '7', '1');
INSERT INTO `oss_link` VALUES ('9', '咕咕鱼开服表', '', '', 'http://new.guguyu.com/', '9', '1');
INSERT INTO `oss_link` VALUES ('10', '玩页游新服网', '', '', 'http://new.wanyeyou.com/', '10', '1');
INSERT INTO `oss_link` VALUES ('11', '969G网页游戏', '', '', 'http://www.969g.com/', '11', '1');
INSERT INTO `oss_link` VALUES ('12', '55网页游戏开服表', '', '', 'http://www.55g.cc/', '12', '1');
INSERT INTO `oss_link` VALUES ('17', '网页游戏开服表', '', '', 'http://www.vs912.com/', '14', '1');
INSERT INTO `oss_link` VALUES ('19', '网页游戏开服表', '', '', 'http://www.kaifu100.com', '1', '1');
INSERT INTO `oss_link` VALUES ('20', '82yx开服表', '', '', 'http://www.82yx.com', '1', '1');
INSERT INTO `oss_link` VALUES ('21', '86wan开服表', '', '', 'http://kf.86wan.com', '1', '1');
INSERT INTO `oss_link` VALUES ('22', '游戏窝门户网', '', '', 'http://www.yoxiwo.com', '1', '1');
INSERT INTO `oss_link` VALUES ('23', '网页游戏大全', '', '', 'http://www.3761.com', '1', '1');
INSERT INTO `oss_link` VALUES ('24', '八目鱼网页游戏', '', '', 'http://www.bamuyu.com', '1', '1');
INSERT INTO `oss_link` VALUES ('25', '2678网页游戏开服表', '', '', 'http://www.2678.com', '1', '1');
INSERT INTO `oss_link` VALUES ('26', '66378游戏网', '', '', 'http://www.66378.com', '1', '1');
INSERT INTO `oss_link` VALUES ('27', '今日新开网页游戏', '', '', 'http://www.591wy.com', '1', '1');
INSERT INTO `oss_link` VALUES ('28', '要发开服表', '', '', 'http://www.188play.com/', '1', '1');
INSERT INTO `oss_link` VALUES ('29', '乐翻网', '', '', 'http://www.6fan.net', '1', '1');
INSERT INTO `oss_link` VALUES ('30', '256cha网页游戏', '', '', 'http://www.256cha.com', '1', '1');

-- ----------------------------
-- Table structure for `oss_member`
-- ----------------------------
DROP TABLE IF EXISTS `oss_member`;
CREATE TABLE `oss_member` (
  `member_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '帐号id',
  `member_username` varchar(50) NOT NULL COMMENT '用户名',
  `member_password` varchar(255) NOT NULL COMMENT '密码',
  `member_safecode` varchar(255) NOT NULL COMMENT '命案码，应该是第二密码',
  `member_mail` varchar(255) NOT NULL COMMENT '邮箱',
  `member_nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `member_name` varchar(50) NOT NULL DEFAULT '' COMMENT '真实名称',
  `member_card` varchar(50) NOT NULL COMMENT '身份证号',
  `member_bank` varchar(50) DEFAULT NULL,
  `member_bankno` varchar(50) DEFAULT NULL,
  `member_sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `member_birthday` int(10) unsigned NOT NULL DEFAULT '0',
  `member_phone` varchar(50) NOT NULL DEFAULT '',
  `member_photo` varchar(50) NOT NULL DEFAULT '',
  `member_from` varchar(255) NOT NULL DEFAULT '',
  `member_other` varchar(255) NOT NULL DEFAULT '',
  `member_join_time` int(10) NOT NULL DEFAULT '0',
  `member_join_ip` varchar(50) NOT NULL,
  `member_last_time` int(10) NOT NULL DEFAULT '0',
  `member_last_ip` varchar(50) NOT NULL,
  `member_validation` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `member_validation_key` varchar(32) NOT NULL,
  `member_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `spread_user` varchar(50) NOT NULL,
  `spread_keyword` varchar(50) NOT NULL,
  `guid_op` varchar(32) NOT NULL DEFAULT '' COMMENT '充值到游戏时使用的临时guid',
  `cur_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '当前剩余的充值',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_member
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `oss_member_group`;
CREATE TABLE `oss_member_group` (
  `group_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_member_group
-- ----------------------------
INSERT INTO `oss_member_group` VALUES ('1', '推广渠道');

-- ----------------------------
-- Table structure for `oss_menu`
-- ----------------------------
DROP TABLE IF EXISTS `oss_menu`;
CREATE TABLE `oss_menu` (
  `menu_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_target` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `menu_mode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `menu_sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `menu_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_menu
-- ----------------------------
INSERT INTO `oss_menu` VALUES ('1', '首页', '/', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('2', '游戏中心', 'game.php', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('3', '游戏动态', 'news.php', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('4', '用户中心', 'user.php', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('5', '充值中心', 'pay.php', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('6', '新手礼包', 'card.php', '0', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('7', '游戏论坛', 'http://bbs.777fly.com', '1', '0', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('8', '关于我们', '#', '0', '1', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('9', '联系我们', '#', '0', '1', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('10', '家长监护', '#', '0', '1', '1', '1', '0');
INSERT INTO `oss_menu` VALUES ('11', '纠纷处理', '#', '0', '1', '1', '1', '0');

-- ----------------------------
-- Table structure for `oss_online`
-- ----------------------------
DROP TABLE IF EXISTS `oss_online`;
CREATE TABLE `oss_online` (
  `online_time` int(10) unsigned NOT NULL DEFAULT '0',
  `online_ip` varchar(20) NOT NULL,
  `online_url` varchar(255) NOT NULL,
  `online_agent` varchar(255) NOT NULL,
  KEY `onlinetime` (`online_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_online
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_page`
-- ----------------------------
DROP TABLE IF EXISTS `oss_page`;
CREATE TABLE `oss_page` (
  `page_id` int(3) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL DEFAULT '',
  `page_content` text NOT NULL,
  `page_permissions` int(3) NOT NULL DEFAULT '0',
  `page_sort` int(3) unsigned NOT NULL DEFAULT '0',
  `page_state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_page
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_pay`
-- ----------------------------
DROP TABLE IF EXISTS `oss_pay`;
CREATE TABLE `oss_pay` (
  `pay_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '支付唯一id',
  `pay_order_no` varchar(255) DEFAULT NULL COMMENT '订单号',
  `pay_type` smallint(2) DEFAULT NULL,
  `pay_mode_id` varchar(50) DEFAULT NULL COMMENT '充值方式',
  `pay_state` tinyint(1) DEFAULT NULL COMMENT '充值状态: 0为未处理;1为已经处理',
  `pay_user` varchar(50) DEFAULT NULL COMMENT '充值的帐号',
  `pay_tel` varchar(50) DEFAULT NULL COMMENT '手机',
  `pay_game_id` int(4) DEFAULT NULL COMMENT '充值到的游戏id',
  `pay_server_id` int(4) DEFAULT NULL COMMENT '充值游戏的第几区',
  `pay_game_user` varchar(50) DEFAULT NULL COMMENT '充值到游戏中的游戏帐号',
  `pay_game_role` varchar(50) DEFAULT NULL COMMENT '游戏中的角色名称',
  `pay_money` int(4) DEFAULT NULL COMMENT '充值金额',
  `pay_time` int(10) DEFAULT NULL COMMENT '充值时间',
  `pay_ip` varchar(50) DEFAULT NULL COMMENT '充值时的ip',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_pay
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_pay2game`
-- ----------------------------
DROP TABLE IF EXISTS `oss_pay2game`;
CREATE TABLE `oss_pay2game` (
  `pay_id` int(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付唯一id',
  `pay_state` tinyint(1) DEFAULT NULL COMMENT '充值状态: 0为未处理;1为已经处理',
  `pay_game_id` int(4) DEFAULT NULL COMMENT '充值到的游戏id',
  `pay_server_id` int(4) DEFAULT NULL COMMENT '充值游戏的第几区',
  `pay_game_user` varchar(50) DEFAULT NULL COMMENT '充值到游戏中的游戏帐号',
  `pay_game_role` varchar(50) DEFAULT NULL COMMENT '游戏中的角色名称',
  `pay_gold` int(4) DEFAULT NULL COMMENT '兑换的金币(非RMB)',
  `pay_time` int(10) DEFAULT NULL COMMENT '充值时间',
  `pay_ip` varchar(50) DEFAULT NULL COMMENT '充值时的ip',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_pay2game
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_pay2pl`
-- ----------------------------
DROP TABLE IF EXISTS `oss_pay2pl`;
CREATE TABLE `oss_pay2pl` (
  `pay_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '支付唯一id',
  `pay_order_no` varchar(255) DEFAULT NULL COMMENT '订单号',
  `pay_mode_id` smallint(2) DEFAULT NULL COMMENT '充值方式id',
  `pay_state` tinyint(1) DEFAULT NULL COMMENT '充值状态: 0为失败;1为成功',
  `pay_user_id` int(11) unsigned NOT NULL COMMENT '充值到的帐号id',
  `pay_tel` varchar(50) DEFAULT NULL COMMENT '手机',
  `pay_money` int(4) DEFAULT NULL COMMENT '充值金额',
  `pay_time` int(10) DEFAULT NULL COMMENT '充值时间',
  `pay_ip` varchar(50) DEFAULT NULL COMMENT '充值时的ip',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_pay2pl
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_paymode`
-- ----------------------------
DROP TABLE IF EXISTS `oss_paymode`;
CREATE TABLE `oss_paymode` (
  `mode_id` int(4) NOT NULL AUTO_INCREMENT,
  `mode_no` varchar(50) DEFAULT NULL,
  `mode_name` varchar(50) DEFAULT NULL,
  `mode_logo` varchar(50) DEFAULT NULL,
  `mode_depict` varchar(255) DEFAULT NULL,
  `mode_state` tinyint(1) DEFAULT NULL,
  `mode_is_default` tinyint(1) DEFAULT NULL,
  `mode_sort` smallint(2) DEFAULT NULL,
  `mode_money_per` smallint(2) DEFAULT NULL,
  `mode_port_config1` varchar(255) DEFAULT NULL,
  `mode_port_config2` varchar(255) DEFAULT NULL,
  `mode_port_config3` varchar(255) DEFAULT NULL,
  `mode_port_config4` varchar(255) DEFAULT NULL,
  `mode_port_config5` varchar(255) DEFAULT NULL,
  `mode_port_config6` varchar(255) DEFAULT NULL,
  `mode_port_config7` varchar(255) DEFAULT NULL,
  `mode_port_s1` varchar(50) DEFAULT NULL,
  `mode_port_s2` varchar(50) DEFAULT NULL,
  `mode_port_s3` varchar(50) DEFAULT NULL,
  `mode_port_s4` varchar(50) DEFAULT NULL,
  `mode_port_s5` varchar(50) DEFAULT NULL,
  `mode_port_s6` varchar(50) DEFAULT NULL,
  `mode_port_s7` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_paymode
-- ----------------------------
INSERT INTO `oss_paymode` VALUES ('2', 'HEEPAY', '网银支付', '', '骏网网银', '1', '1', '0', '100', '1453775', 'A9FDAB586E3B44E49C925BC5', 'http://www.777fly.com/pay/heepay/notify_url.php', 'http://www.777fly.com/pay/heepay/return_url.php', '', '', '', 'agent_id', 'key', 'notify_url', 'return_url', '', '', '');
INSERT INTO `oss_paymode` VALUES ('3', 'HEEPAY-SZX', '移动充值卡', '', '', '1', '0', '0', '95', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `oss_paymode` VALUES ('4', 'HEEPAY-UNICOM', '联通充值卡', '', '', '1', '0', '0', '95', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `oss_paymode` VALUES ('5', 'HEEPAY-CARD', '骏网一卡通', '', '', '1', '0', '0', '85', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `oss_paymode` VALUES ('6', 'HEEPAY-DIANXIN', '电信充值卡', '', '', '1', '0', '0', '95', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `oss_server`
-- ----------------------------
DROP TABLE IF EXISTS `oss_server`;
CREATE TABLE `oss_server` (
  `server_id` int(4) NOT NULL AUTO_INCREMENT,
  `game_id` int(4) DEFAULT NULL,
  `server_no` varchar(50) DEFAULT NULL,
  `server_name` varchar(50) DEFAULT NULL,
  `server_logo` varchar(50) DEFAULT NULL,
  `server_logo2` varchar(50) DEFAULT NULL,
  `server_logo3` varchar(50) DEFAULT NULL,
  `server_depict` varchar(255) DEFAULT NULL,
  `server_line` varchar(50) DEFAULT NULL,
  `server_state` smallint(2) DEFAULT NULL,
  `server_trunon_date` date DEFAULT NULL,
  `server_trunon_hour` smallint(2) DEFAULT NULL,
  `server_login_gateway` varchar(50) DEFAULT NULL,
  `server_pay_gateway` varchar(50) DEFAULT NULL,
  `server_is_show` tinyint(1) DEFAULT NULL,
  `server_is_best` tinyint(1) DEFAULT NULL,
  `server_is_pay` tinyint(1) DEFAULT NULL,
  `server_sort` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_server
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_vote`
-- ----------------------------
DROP TABLE IF EXISTS `oss_vote`;
CREATE TABLE `oss_vote` (
  `vote_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `vote_title` varchar(255) NOT NULL,
  `vote_start` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_end` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_mode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vote_place` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vote_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_vote_item`
-- ----------------------------
DROP TABLE IF EXISTS `oss_vote_item`;
CREATE TABLE `oss_vote_item` (
  `item_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `item_title` varchar(255) NOT NULL DEFAULT '',
  `item_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `vote_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_vote_item
-- ----------------------------

-- ----------------------------
-- Table structure for `oss_vote_log`
-- ----------------------------
DROP TABLE IF EXISTS `oss_vote_log`;
CREATE TABLE `oss_vote_log` (
  `log_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `log_ip` varchar(50) NOT NULL DEFAULT '',
  `log_agent` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of oss_vote_log
-- ----------------------------

-- ----------------------------
-- Procedure structure for `pay_to_game`
-- ----------------------------
DROP PROCEDURE IF EXISTS `pay_to_game`;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `pay_to_game`(user_id int, pay_money int)
BEGIN
    END
;;
DELIMITER ;
