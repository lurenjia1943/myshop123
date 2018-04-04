-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 31 日 11:47
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `myshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `name` char(64) DEFAULT NULL,
  `img` char(255) DEFAULT NULL,
  `imgsrc` char(255) DEFAULT NULL,
  `content` char(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `num` smallint(6) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `xiaoliang` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `keywords` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `tid`, `name`, `img`, `imgsrc`, `content`, `price`, `num`, `status`, `xiaoliang`, `time`, `keywords`) VALUES
(10, 36, 'iPhone6S', '1458374622886149.jpeg', '1458374622883.jpg', '数码产品，苹果手机，iPhone6s,iPhone6S', 5999.00, 1, '0', 0, 1458473583, '数码产品苹果iPhone6S大屏手机IOS'),
(11, 37, 'vivo', '1458374700299072.jpeg', '1458374700808.jpg', '这个好极了', 1999.00, 11109, '1', 0, 1458473594, '数码产品大屏手机vivo手机安卓'),
(12, 35, '魅族1', '1458374714850450.jpeg', '1458374714603.jpg', '又是一个魅族', 2999.00, 11111, '0', 0, 1458473609, '数码产品大屏手机魅族手机手机安卓'),
(13, 38, '华为1', '1458374721643798.jpeg', '1458374721995.jpg', '华为手机不好', 3999.00, 1, '0', 0, 1458473622, '数码产品大屏手机华为手机安卓'),
(14, 36, 'iPhone6s', '1458374735880072.jpeg', '1458374735665.jpg', '漂亮到不行', 5999.00, 32767, '1', 0, 1458473646, '数码产品苹果iPhone6S大屏手机IOS'),
(15, 33, '小米5', '1458374766559298.jpeg', '1458374766492.jpg', '快的有点狠', 2999.00, 32767, '1', 0, 1458473849, '数码产品小米5大屏手机安卓'),
(16, 38, '华为P8', '1458374813287326.jpeg', '1458374813542.jpg', '华为P8真正好到不行', 4000.00, 9999, '1', 0, 1458473860, '数码产品华为P8大屏手机安卓'),
(17, 42, '新疆鲜核桃', '1458375432869086.gif', '1458375432537.jpg', '5斤装仅需68v顺丰包邮', 99.00, 999, '1', 0, 1458473939, '水果新疆鲜核桃新疆土特产'),
(18, 42, '新疆鲜核桃', '1458375441454399.gif', '1458375441211.jpg', '5斤装仅需68v顺丰包邮', 99.00, 9999, '1', 0, 1458473970, '水果新疆鲜核桃新疆土特产'),
(19, 42, '新疆鲜核桃', '1458375449493598.gif', '1458375449525.jpg', '5斤装仅需68v顺丰包邮', 99.00, 9999, '1', 0, 1458473976, '水果新疆鲜核桃新疆土特产'),
(20, 43, 'RIO锐澳鸡尾酒', '1458375495483995.gif', '1458375495618.jpg', 'RIO锐澳鸡尾酒', 7.00, 1, '0', 0, 1458620777, '啤酒饮料rules鸡尾酒'),
(21, 43, 'RIO锐澳鸡尾酒', '1458375504354302.gif', '1458375504328.jpg', 'RIO锐澳鸡尾酒', 7.00, 777, '1', 0, 1458474055, '啤酒饮料rules鸡尾酒'),
(22, 43, 'RIO锐澳鸡尾酒', '1458375518447916.gif', '1458375518713.jpg', 'RIO锐澳鸡尾酒', 7.00, 77, '1', 0, 1458474086, '啤酒饮料rules鸡尾酒'),
(23, 43, 'RIO锐澳鸡尾酒', '1458375527927381.gif', '1458375527266.jpg', 'RIO锐澳鸡尾酒', 7.00, 77, '0', 0, 1458474091, '啤酒饮料rules鸡尾酒'),
(24, 43, 'RIO锐澳鸡尾酒', '1458375538853569.gif', '1458375538123.jpg', 'RIO锐澳鸡尾酒', 7.00, 77, '1', 0, 1458474098, '啤酒饮料rules鸡尾酒'),
(25, 43, 'RIO锐澳鸡尾酒', '1458375584850721.gif', '1458375584716.jpg', 'RIO锐澳鸡尾酒', 7.00, 7777, '1', 0, 1458474104, '啤酒饮料rules鸡尾酒'),
(26, 43, 'RIO锐澳鸡尾酒', '1458375595773627.gif', '1458375595451.jpg', 'RIO锐澳鸡尾酒', 7.00, 776, '1', 0, 1458474132, '啤酒饮料rules鸡尾酒'),
(27, 43, 'RIO锐澳鸡尾酒', '1458375603428737.gif', '1458375603553.jpg', 'RIO锐澳鸡尾酒', 7.00, 777, '1', 0, 1458474138, '啤酒饮料rules鸡尾酒'),
(28, 44, '馨诚意家政', '1458375610965223.gif', '1458375610905.jpg', '家政', 999.00, 9999, '1', 0, 1458474191, '幼儿看护馨诚意家政保姆'),
(29, 44, '馨诚意家政', '1458375617699110.gif', '1458375617371.jpg', '家政', 999.00, 999, '1', 0, 1458474251, '幼儿看护馨诚意家政保姆'),
(30, 44, '馨诚意家政', '1458375627475477.gif', '1458375627272.jpg', '家政', 999.00, 999, '0', 0, 1458474257, '幼儿看护馨诚意家政保姆'),
(31, 44, '馨诚意家政', '1458375634759901.gif', '1458375634427.jpg', '家政', 999.00, 999, '0', 0, 1458474264, '幼儿看护馨诚意家政保姆'),
(32, 44, '馨诚意家政', '1458375641618326.gif', '1458375641704.jpg', '家政', 999.00, 9998, '0', 0, 1458474270, '幼儿看护馨诚意家政保姆'),
(33, 44, '馨诚意家政', '1458375648636881.gif', '1458375648782.jpg', '家政', 999.00, 999, '0', 0, 1458474279, '幼儿看护馨诚意家政保姆'),
(34, 33, '小米4', '1458475115657118.jpeg', '1458475115849.jpg', '小米4，清仓处理，大减价！', 2999.00, 0, '0', 0, 1458550420, '数码产品小米4大屏手机安卓');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` float unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `price` mediumint(9) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `beizhu` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT '0',
  `order_num` bigint(20) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `uid`, `gid`, `price`, `name`, `tel`, `address`, `beizhu`, `status`, `order_num`, `time`) VALUES
(2, 'chenxun', '@@17@@5@@22@@5@@15@@1', 3529, '陈询', '13653592881', '山西运城', '快点发', '3', 221458650238, 1458650253),
(3, 'chenxun', '@@17@@5@@22@@3@@15@@1', 3515, '陈询', '13653592881', '山西运城', '快点发', '0', 221458650496, 1458650505);

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `path` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `pid`, `name`, `path`) VALUES
(1, 0, '根类别', '0,'),
(27, 1, '服装', '0,1,'),
(31, 1, '数码', '0,1,'),
(33, 31, '小米', '0,1,31,'),
(34, 27, '冬装', '0,1,27,'),
(35, 31, '魅族', '0,1,31,'),
(36, 31, 'iphone', '0,1,31,'),
(37, 31, 'vivo', '0,1,31,'),
(38, 31, '华为', '0,1,31,'),
(39, 1, '餐饮娱乐', '0,1,'),
(40, 1, '家政服务', '0,1,'),
(42, 39, '水果', '0,1,39,'),
(43, 39, '啤酒', '0,1,39,'),
(44, 40, '幼儿看护', '0,1,40,');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `tel` bigint(11) DEFAULT NULL,
  `status` enum('1','2','3') DEFAULT '1',
  `account` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT '0',
  `ip` char(20) DEFAULT NULL,
  `zhuangtai` enum('0','1') DEFAULT '1',
  `sex` enum('男','女') DEFAULT NULL,
  `nicheng` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tel`, `status`, `account`, `time`, `lasttime`, `num`, `ip`, `zhuangtai`, `sex`, `nicheng`, `age`, `mail`) VALUES
(29, 'chenxun', 'e10adc3949ba59abbe56e057f20f883e', 13653592881, '3', NULL, 1458713724, 1458731473, 1, '127.0.0.1', '1', '男', '陈询', 18, '395696661@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
