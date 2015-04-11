

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_access
-- ----------------------------
DROP TABLE IF EXISTS `admin_access`;
CREATE TABLE `admin_access` (
  `admin_id` int(11) NOT NULL,
  `competence_id` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`,`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_access
-- ----------------------------
INSERT INTO `admin_access` VALUES ('1', '1');
INSERT INTO `admin_access` VALUES ('1', '2');
INSERT INTO `admin_access` VALUES ('1', '3');
INSERT INTO `admin_access` VALUES ('1', '4');
INSERT INTO `admin_access` VALUES ('1', '5');
INSERT INTO `admin_access` VALUES ('1', '6');
INSERT INTO `admin_access` VALUES ('12', '1');
INSERT INTO `admin_access` VALUES ('12', '3');

-- ----------------------------
-- Table structure for admin_table
-- ----------------------------
DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE `admin_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `login_date` datetime NOT NULL,
  `login_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_table
-- ----------------------------
INSERT INTO `admin_table` VALUES ('1', 'admin', 'sssasd666', '2015-04-10 14:19:15', '2015-04-10 14:19:19', '');
INSERT INTO `admin_table` VALUES ('39', 'ami2ng', 'asdadasdadsd3', '2015-04-11 01:51:57', '2015-04-11 01:51:57', 'unlogin');

-- ----------------------------
-- Table structure for competence
-- ----------------------------
DROP TABLE IF EXISTS `competence`;
CREATE TABLE `competence` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of competence
-- ----------------------------
INSERT INTO `competence` VALUES ('1', '登陆');
INSERT INTO `competence` VALUES ('2', '查看客户信息');
INSERT INTO `competence` VALUES ('3', '编辑客户信息');
INSERT INTO `competence` VALUES ('4', '查看商品信息');
INSERT INTO `competence` VALUES ('5', '编辑商品信息');
INSERT INTO `competence` VALUES ('6', '编辑客户的商品信息');
INSERT INTO `competence` VALUES ('7', '添加管理员账号');

-- ----------------------------
-- Table structure for customer_information
-- ----------------------------
DROP TABLE IF EXISTS `customer_information`;
CREATE TABLE `customer_information` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `phones` varchar(500) DEFAULT NULL,
  `remark` text,
  `address` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_information
-- ----------------------------
INSERT INTO `customer_information` VALUES ('1', '张三', 'zs', '12312341232', '这是张三', '福建漳州xxx路');
INSERT INTO `customer_information` VALUES ('5', '李四', 'ls', '12323123123123', '备注asda大', '福州');

-- ----------------------------
-- Table structure for customer_price
-- ----------------------------
DROP TABLE IF EXISTS `customer_price`;
CREATE TABLE `customer_price` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `price` decimal(10,5) DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_price
-- ----------------------------
INSERT INTO `customer_price` VALUES ('1', '1', '1', '2212.55500', '备asdasd注asdasasxcvxcvxcvda大');
INSERT INTO `customer_price` VALUES ('2', '1', '3', '7722.55500', '6666备asdasd注da大');
INSERT INTO `customer_price` VALUES ('4', '1', '4', '211.55000', '备mndfg注asda大');
INSERT INTO `customer_price` VALUES ('5', '2', '1', '211.55000', '备mndfg注asda大');
INSERT INTO `customer_price` VALUES ('7', '2', '4', '91661.55000', '99666备mndfg注asda大');

-- ----------------------------
-- Table structure for goods_table
-- ----------------------------
DROP TABLE IF EXISTS `goods_table`;
CREATE TABLE `goods_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` decimal(10,5) DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_table
-- ----------------------------
INSERT INTO `goods_table` VALUES ('1', '蜡烛1', '13.00000', '备注大蜡烛');
INSERT INTO `goods_table` VALUES ('3', '蜡烛2', '12.50000', '备注大蜡烛');
INSERT INTO `goods_table` VALUES ('4', '蜡烛2333', '12.00000', 'asd备注大蜡烛');
