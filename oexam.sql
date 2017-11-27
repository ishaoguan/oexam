/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : oexam

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-15 09:02:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `flag` tinyint(4) NOT NULL COMMENT '0->老师，1->管理员',
  `telephone` varchar(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2016-12-12/584e8c7e2ad24.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '1', '', null);
INSERT INTO admin VALUES ('4', '123', 'e10adc3949ba59abbe56e057f20f883e', '2016-12-12/584e8c7e2ad24.jpg', '甘鑫', '0', '15898145017', '331596350@qq.com');
INSERT INTO admin VALUES ('6', 'nutter', '202cb962ac59075b964b07152d234b70', '2017-06-28/59534609aad59.jpg', 'nutter', '0', '18911111111', '`');
INSERT INTO admin VALUES ('7', 'nut', '202cb962ac59075b964b07152d234b70', '2017-06-29/5954b0aa02519.jpg', 'nut', '0', '', '972360566@qq.com');

-- ----------------------------
-- Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `sans` varchar(200) DEFAULT NULL,
  `dans` varchar(200) DEFAULT NULL,
  `jans` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO answer VALUES ('12', '12', 'A,B,C,D,D,D,D', 'AB,AB,B', 'T,F');
INSERT INTO answer VALUES ('39', '39', 'D,C,D,D,D,ABCD,B', 'BCD,BCD,BCD', 'N,N');
INSERT INTO answer VALUES ('40', '40', 'D,C,D,D,D,ABCD,B', 'BCD,BCD,BCD', 'N,N');
INSERT INTO answer VALUES ('41', '41', 'D,C,D,D,D,ABCD,B', 'BCD,BCD,BCD', 'N,N');
INSERT INTO answer VALUES ('42', '42', 'D,C,D,D,D,ABCD,B', 'AD,BD,ACD', 'T,T');
INSERT INTO answer VALUES ('43', '43', 'B,B,C,D,C,D', 'AB,BC,BC,D', 'F,F');
INSERT INTO answer VALUES ('44', '44', 'D,D,C,D,ABCD,B', 'ABC,BC,ACD,CD', 'N,N');
INSERT INTO answer VALUES ('45', '45', 'D,D,C,D,ABCD,B', 'ABC,BC,ACD,CD', 'N,N');
INSERT INTO answer VALUES ('46', '46', 'C,D,D,D,D,D', 'CD,CD,CD,CD', 'F,F');
INSERT INTO answer VALUES ('47', '47', null, null, null);

-- ----------------------------
-- Table structure for `grade`
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `subtime` datetime NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO grade VALUES ('12', '21', '79', '2', '2017-09-19 13:47:09');
INSERT INTO grade VALUES ('40', '22', '79', '12', '2017-11-01 15:32:03');
INSERT INTO grade VALUES ('41', '22', '79', '12', '2017-11-03 09:53:49');
INSERT INTO grade VALUES ('42', '22', '79', '12', '2017-11-09 13:57:38');
INSERT INTO grade VALUES ('43', '22', '80', '3', '2017-11-14 10:04:32');
INSERT INTO grade VALUES ('44', '22', '80', '12', '2017-11-14 10:11:43');
INSERT INTO grade VALUES ('45', '22', '80', '100', '2017-11-14 10:35:14');
INSERT INTO grade VALUES ('46', '22', '80', '3', '2017-11-14 10:37:01');
INSERT INTO grade VALUES ('47', '22', '80', '0', '2017-11-15 08:32:42');

-- ----------------------------
-- Table structure for `jtest`
-- ----------------------------
DROP TABLE IF EXISTS `jtest`;
CREATE TABLE `jtest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `explain` varchar(200) NOT NULL,
  `ans` varchar(5) NOT NULL,
  `aid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jtest
-- ----------------------------
INSERT INTO jtest VALUES ('193', '说话声音大小是属于语音四元素中的音高', '无', 'F', '4', '58');
INSERT INTO jtest VALUES ('194', '语音的本质属性是自然性', '无', 'T', '4', '58');
INSERT INTO jtest VALUES ('195', '不同的音素决定于音长', '无', 'T', '4', '58');
INSERT INTO jtest VALUES ('196', '发音器官中起共鸣作用的是肺', '无', 'F', '4', '58');
INSERT INTO jtest VALUES ('200', '音节是语音的基本结构单位', '无', 'T', '7', '69');
INSERT INTO jtest VALUES ('201', '“量”字的韵母不属于撮口呼', '无', 'T', '7', '69');
INSERT INTO jtest VALUES ('202', '“告”字的韵母属于开口呼', '无', 'T', '7', '69');
INSERT INTO jtest VALUES ('206', '说话声音大小是属于语音四元素中的音高', '无', 'N', '7', '71');
INSERT INTO jtest VALUES ('207', '语音的本质属性是自然性', '无', 'N', '7', '71');
INSERT INTO jtest VALUES ('208', '不同的音素决定于音长', '无', 'N', '7', '71');

-- ----------------------------
-- Table structure for `painfo`
-- ----------------------------
DROP TABLE IF EXISTS `painfo`;
CREATE TABLE `painfo` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `endtime` datetime NOT NULL,
  `examtime` datetime NOT NULL,
  `totaltime` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `code` char(5) NOT NULL COMMENT '试题码',
  `aid` int(11) NOT NULL COMMENT '老师id',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of painfo
-- ----------------------------
INSERT INTO painfo VALUES ('79', '普通话', '2017-08-29 08:44:24', '2017-08-28 08:44:24', '60', '69', 'lUUcf', '7');
INSERT INTO painfo VALUES ('80', '一级模拟测试', '2017-11-15 10:02:25', '2017-11-14 10:02:25', '60', '71', 'ZDdER', '7');

-- ----------------------------
-- Table structure for `paper`
-- ----------------------------
DROP TABLE IF EXISTS `paper`;
CREATE TABLE `paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `sids` varchar(500) DEFAULT NULL,
  `dids` varchar(500) DEFAULT NULL,
  `jids` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paper
-- ----------------------------
INSERT INTO paper VALUES ('67', '78', '4', '592,594,595,596,597,598', '599,600,601,602,603,604', '195,196');
INSERT INTO paper VALUES ('68', '79', '7', '614,615,616,617,619,620,621', '623,625,626', '200,201');
INSERT INTO paper VALUES ('69', '80', '7', '644,645,646,647,648,649', '650,652,654,655', '207,208');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `degree` tinyint(4) DEFAULT NULL,
  `intro` text,
  `pic` varchar(60) DEFAULT NULL,
  `studentid` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO student VALUES ('18', '甘鑫', '202cb962ac59075b964b07152d234b70', '0', '2016-12-07', '3', '个性签名', '2016-12-12/584e7aad685c7.jpg', '14110100123');
INSERT INTO student VALUES ('19', '123', '202cb962ac59075b964b07152d234b70', '0', '2016-12-03', '2', 'sssss', '2016-12-14/585106988000d.jpg', '14110100123');
INSERT INTO student VALUES ('20', '222', '202cb962ac59075b964b07152d234b70', '0', '2016-12-14', '3', 'ss', '2016-12-14/585106e605686.jpg', '14110100123');
INSERT INTO student VALUES ('21', 'admin', '202cb962ac59075b964b07152d234b70', '0', '0000-00-00', '0', '', '2017-07-09/59619aa4733c2.jpg', '');
INSERT INTO student VALUES ('22', 'nut', '202cb962ac59075b964b07152d234b70', '0', '0000-00-00', '0', '123', '2017-07-09/59619b90a6067.jpg', '14110100102');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tyid` char(2) NOT NULL COMMENT 'd 多选题 s单选题  j填空题',
  `content` varchar(200) NOT NULL,
  `op1` varchar(40) NOT NULL,
  `op2` varchar(40) NOT NULL,
  `op3` varchar(40) NOT NULL,
  `op4` varchar(40) NOT NULL,
  `ans` varchar(40) NOT NULL,
  `aid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `explain` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=656 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO test VALUES ('592', 's', '32位微型计算机中乘除法部件位于（  ）中。', 'CPU', '接口', '检测器', '专用芯片', 'A', '4', '58', '乘除法部件属于运算器部位，而运算器是cpu的重要组成部件');
INSERT INTO test VALUES ('593', 's', '计算机中一次能处理的最大二进制位数称为（）', '位', '字节', '字长', '代码', 'C', '4', '58', '字长是由计算机数据线的条数决定的，一条数据线可以读写一位数据，数据线的条数就决定了计算机中一次能处理的最大二进制位数');
INSERT INTO test VALUES ('594', 's', '微型机计算机的发展以（）技术为指标', '操作系统', '微处理器', '磁盘', '软件', 'B', '4', '58', '无');
INSERT INTO test VALUES ('595', 's', 'CPU中不包含（）', '存储器', '运算器', '寄存器', '控制器', 'A', '4', '58', '无');
INSERT INTO test VALUES ('596', 's', '二进制1001101B的十进制表示为（）', '4DH', '95D', '77D', '9AD', 'D', '4', '58', '无');
INSERT INTO test VALUES ('597', 's', '某存储器芯片的存储容量为8K*1位，则它的地址线和数据线引脚相加的和为（）', '11', '12', '13', '14', 'D', '4', '58', '8K*1即2^13*1(位)，因此地址线位13条，数据线为1条，一条信号线对应一个芯片的引脚，引脚总和即为信号线的总和。');
INSERT INTO test VALUES ('598', 's', 'Cache的速度应比从主存储器取数据的速度()', '快', '稍慢', '慢', '相等', 'A', '4', '58', 'Cache的作用是为了提高存取速度，肯定要比主存速度快');
INSERT INTO test VALUES ('599', 'd', '关于MCS-51单片机时序描述正确的有', '若外接晶振频率为12MHz，则每秒钟有12M个时钟周期', '1个机器周期等于12个时钟周期', '指令周期为整数个机器周期，指令不同，指令周期也不近相同', ' 指令周期为整数个机器周期，指令虽不同，指令周期却完全相同', 'ABC', '4', '58', '无');
INSERT INTO test VALUES ('600', 'd', '浮点运算指令不属于', '算术运算指令', '逻辑运算指令', '移位操作指令', '特权指令', 'BCD', '4', '58', '无');
INSERT INTO test VALUES ('601', 'd', '数据库管理系统的工作包括', '定义数据库', '对已定义的数据库进行管理', '数据通信 ', '为定义的数据库提供操作系统', 'ABC', '4', '58', '无');
INSERT INTO test VALUES ('602', 'd', '韵母中能做韵头的只有', 'i', 'u', 'v', 'a', 'ABC', '4', '58', '无');
INSERT INTO test VALUES ('603', 'd', '下面的几个声母中，属于擦音的有', 'q', 'l', 'k', 'm', 'ABD', '4', '58', '无');
INSERT INTO test VALUES ('604', 'd', '在普通话中，下面的字要读轻声的有', '我们', '桌子', '来了', '试试', 'ABCD', '4', '58', '无');
INSERT INTO test VALUES ('614', 's', '声调的基本性质决定于', '音高', '音强', '音色', '音长', 'D', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('615', 's', '不同的音素决定于', '音高', '音强', '音色', '音长', 'C', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('616', 's', '不同的元音决定于', '发音体', '发音方法', '共鸣器形状', '音长', 'D', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('617', 's', '男子和女子声音差别决定于', '发音方法', '共鸣器', '发音体', '用力大小', 'D', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('618', 's', '语音的本质属性是', '生理性', '自然性', '随意性', '物理性', 'C', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('619', 's', '发音器官中起共鸣作用的是', '肺和气管', '喉头和声带', '口腔和鼻腔', '声带和口腔', 'D', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('620', 's', '汉语拼音字母b,d,g发音不同是由于', '发音体不同', '发音方法不同', '共鸣器形状不同', '空间环境不同', 'ABCD', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('621', 's', '说话声音大小是属于语音四元素中的', '音高', '音强', '音色', '音长', 'B', '7', '69', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('622', 'd', '根据气流到达咽腔后通道的不同，发出的音分为', '口音', '鼻', '口鼻音', '边音', 'ABC', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('623', 'd', '普通话主要依靠（）来区别意义', '音高', '音强', '音长', '音色', 'AD', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('624', 'd', '最小的语音单位包括（）', '音节', '音位', '音素', '音步', 'BC', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('625', 'd', '音素可以分为（）', '塞音', '元音', '清音', '辅音', 'BD', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('626', 'd', '音韵学把汉语音节结构分为（）', '声母', '音素', '韵母', '声调', 'ACD', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('627', 'd', '现代汉语常用的记音符号有（）', '反切', '注音字母', '汉语拼音方案', '国际音标', 'CD', '7', '69', '操作系统都有哪些');
INSERT INTO test VALUES ('642', 's', '声调的基本性质决定于', '音高', '音强', '音色', '音长', 'D', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('643', 's', '不同的音素决定于', '音高', '音强', '音色', '音长', 'C', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('644', 's', '不同的元音决定于', '发音体', '发音方法', '共鸣器形状', '音长', 'D', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('645', 's', '男子和女子声音差别决定于', '发音方法', '共鸣器', '发音体', '用力大小', 'D', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('646', 's', '语音的本质属性是', '生理性', '自然性', '随意性', '物理性', 'C', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('647', 's', '发音器官中起共鸣作用的是', '肺和气管', '喉头和声带', '口腔和鼻腔', '声带和口腔', 'D', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('648', 's', '汉语拼音字母b,d,g发音不同是由于', '发音体不同', '发音方法不同', '共鸣器形状不同', '空间环境不同', 'ABCD', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('649', 's', '说话声音大小是属于语音四元素中的', '音高', '音强', '音色', '音长', 'B', '7', '71', 'sdfsfsddfsdfsf');
INSERT INTO test VALUES ('650', 'd', '根据气流到达咽腔后通道的不同，发出的音分为', '口音', '鼻', '口鼻音', '边音', 'ABC', '7', '71', '操作系统都有哪些');
INSERT INTO test VALUES ('651', 'd', '普通话主要依靠（）来区别意义', '音高', '音强', '音长', '音色', 'AD', '7', '71', '操作系统都有哪些');
INSERT INTO test VALUES ('652', 'd', '最小的语音单位包括（）', '音节', '音位', '音素', '音步', 'BC', '7', '71', '操作系统都有哪些');
INSERT INTO test VALUES ('653', 'd', '音素可以分为（）', '塞音', '元音', '清音', '辅音', 'BD', '7', '71', '操作系统都有哪些');
INSERT INTO test VALUES ('654', 'd', '音韵学把汉语音节结构分为（）', '声母', '音素', '韵母', '声调', 'ACD', '7', '71', '操作系统都有哪些');
INSERT INTO test VALUES ('655', 'd', '现代汉语常用的记音符号有（）', '反切', '注音字母', '汉语拼音方案', '国际音标', 'CD', '7', '71', '操作系统都有哪些');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(40) NOT NULL,
  `aid` int(11) NOT NULL,
  `changetime` datetime NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO type VALUES ('58', '测试题库', '4', '2016-12-30 09:34:15');
INSERT INTO type VALUES ('69', '普通话', '7', '2017-08-28 08:44:15');
INSERT INTO type VALUES ('71', '一级普通话测试', '7', '2017-11-14 10:02:04');
