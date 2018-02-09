/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : myweb

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 09/02/2018 22:12:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '密码',
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '邮箱',
  `login_count` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆次数',
  `last_time` int(11) UNSIGNED ZEROFILL NOT NULL DEFAULT 00000000000 COMMENT '最后登录时间',
  `role` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '是否是超级管理员',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态',
  `create_time` int(11) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (23, 'wangheng', '2e016918cafb36905d8f119a024936ef', 'admin@qq.com', 14, 01518167762, 1, 1, 1517538197, 1518167762);

-- ----------------------------
-- Table structure for application
-- ----------------------------
DROP TABLE IF EXISTS `application`;
CREATE TABLE `application`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `application_id` int(11) NOT NULL COMMENT '应用id',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `application_id`(`application_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of application
-- ----------------------------
INSERT INTO `application` VALUES (1, 16, '<p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em;\">纳米维景具有深厚的辐射成像开发经验，可以为客户提供探测器部件、成像软件算法以及整体解决方案.</p><p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em;\">我们立足于创新性，致力于高速高精度的辐射成像。也正源于此，我们的技术与产品将是颠覆与领先于整个行业。从业界领先的CMOS探测器到新一代计算机断层扫描（CT）解决方案，这些颇具挑战的研究与产品，都是在践行我们超越成像极限的理念。我们可以提供计算机断层扫描、牙科X射线成像、骨科X射线成像、乳腺X射线成像和其他医疗应用领域的产品。</p><p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em;\">正因为我们拥有半导体设计、电子学设计、机械设计、固件和软件设计及算法开发等各个方向的技术积累，我们可以满足客户多样化、定制化及创新性的需求。</p><p><br/></p>', 1518171136, 1518171516);
INSERT INTO `application` VALUES (2, 15, '<p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em; font-family: &#39;microsoft yahei&#39;;\">纳米维景具有深厚的辐射成像开发经验，可以为客户提供探测器部件、成像软件算法以及整体解决方案。</p><p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em; font-family: &#39;microsoft yahei&#39;;\">我们可以提供PCBA检查、锂电池检查、机械部件检查等工业无损检查应用领域的产品。</p><p><br/></p>', 1518171533, 1518171533);
INSERT INTO `application` VALUES (3, 14, '<p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em; font-family: &#39;microsoft yahei&#39;;\">纳米维景具有深厚的辐射成像开发经验，可以为客户提供探测器部件、成像软件算法以及整体解决方案。</p><p style=\"margin: 20px 0px; padding: 0px; font-size: 15px; color: #666666; line-height: 33px; letter-spacing: 0.7px; text-align: justify; text-indent: 2em; font-family: &#39;microsoft yahei&#39;;\">应用于行李、货物安检的X射线成像，精准度、识别度要求越来越高。我们可以为X射线安检成像提供探测器核心部件及解决方案，满足客户高精度的要求。</p><p><br/></p>', 1518171545, 1518171545);

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '图片地址',
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '链接地址',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '描述',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL,
  `update_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES (17, '20180207\\f0f58d3822a8b10298d331bef78794e5.jpg', 'http://www.baidu.com', '哈哈哈哈', 0, 1517992515, 1517992515);
INSERT INTO `banner` VALUES (15, '20180207\\3d8b411bc2ef65de4af937d3b9e114ce.jpg', 'http://www.baidu.com', '哈哈哈', 0, 1517992487, 1517992487);
INSERT INTO `banner` VALUES (14, '20180207\\08f2ab81e6702c1c21d249738670d417.jpg', 'http://www.baidu.com', '哈哈哈', 0, 1517926503, 1517992424);
INSERT INTO `banner` VALUES (16, '20180207\\5158b7d6c9d5b8438db03302467a9b14.jpg', 'http://www.baidu.com', '哈哈哈哈哈', 0, 1517992502, 1517992502);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `category_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '<p><img src=\"/ueditor/php/upload/image/20180209/1518182205716098.jpg\" alt=\"\"/></p><p>探测器</p><p>我们致力于辐射成像探测器的研发和生产，不断突破高速高精度的技术极限，以满足不同领域客户的创新性需求。</p><p>我们拥有半导体设计、电子学设计、机械设计、固件和软件设计及等各个方向的技术积累，可以满足客户多样化、定制化的需求。</p><p>产品</p><p><br/></p>', 1518182244, 1518182244, 20);
INSERT INTO `category` VALUES (2, '<p><img src=\"/ueditor/php/upload/image/20180209/1518182693478675.jpg\" alt=\"\"/></p><p>辐射成像软件</p><p>我们提供完备的医疗软件解决方案：DRF动态软件配合本公司研发的同步盒，可以快速实现整个设备的连接、调试，采用iHDR-RT实时动态图像增强技术，使图像对比度更好、细节更清晰。DR控制台软件采用iHDR图像增强模块，可以采集到更清晰的图像。动物DR软件针对不同的动物和体位协议，可以更便捷的采集到图像。这些软件支持常见的高压发生器和平板探测器，并可支持定制开发。</p><p><br/></p>', 1518182696, 1518182696, 21);

-- ----------------------------
-- Table structure for column
-- ----------------------------
DROP TABLE IF EXISTS `column`;
CREATE TABLE `column`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '栏目ID',
  `column_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '栏目名称',
  `column_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '栏目链接',
  `sort` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of column
-- ----------------------------
INSERT INTO `column` VALUES (1, 0, '公司', 'http://127.0.0.1/index/about', 0, 1517982955, 1518087370);
INSERT INTO `column` VALUES (2, 1, '公司简介', 'http://127.0.0.1/index/about', 0, 1517983077, 1518087348);
INSERT INTO `column` VALUES (3, 1, '发展历程', 'http://127.0.0.1/index/about?id=3', 0, 1517983089, 1518087807);
INSERT INTO `column` VALUES (4, 1, '公司愿景', 'http://127.0.0.1/index/about?id=4', 0, 1517983120, 1518087863);
INSERT INTO `column` VALUES (5, 1, '公司使命', 'http://127.0.0.1/index/about?id=5', 0, 1517983137, 1518088064);
INSERT INTO `column` VALUES (6, 1, '价值观', 'http://127.0.0.1/index/about?id=6', 0, 1517983150, 1518088201);
INSERT INTO `column` VALUES (7, 1, '资质荣誉', 'http://127.0.0.1/index/about?id=7', 0, 1517983173, 1518088332);
INSERT INTO `column` VALUES (9, 0, '新闻', 'http://127.0.0.1/index/news?id=10', 0, 1517983229, 1518093464);
INSERT INTO `column` VALUES (10, 9, '公司动态', 'http://127.0.0.1/index/news?id=10', 0, 1517983245, 1518093778);
INSERT INTO `column` VALUES (11, 9, '新品发布', 'http://127.0.0.1/index/news?id=11', 0, 1517983265, 1518093796);
INSERT INTO `column` VALUES (12, 9, '市场活动', 'http://127.0.0.1/index/news?id=12', 0, 1517983283, 1518093803);
INSERT INTO `column` VALUES (13, 0, '应用', 'http://127.0.0.1/index/application', 0, 1517983310, 1518094611);
INSERT INTO `column` VALUES (14, 13, '安检', 'http://127.0.0.1/index/application/list?id=14', 0, 1517983341, 1518173619);
INSERT INTO `column` VALUES (15, 13, '工业', 'http://127.0.0.1/index/application/list?id=15', 0, 1517983358, 1518173630);
INSERT INTO `column` VALUES (16, 13, '医疗', 'http://127.0.0.1/index/application/list?id=16', 0, 1517983370, 1518173637);
INSERT INTO `column` VALUES (18, 0, '产品', 'http://www.baidu.com', 0, 1517983410, 1517983410);
INSERT INTO `column` VALUES (19, 18, '静态CT', 'http://www.baidu.com', 0, 1517983430, 1517983430);
INSERT INTO `column` VALUES (20, 18, '探测器', 'http://127.0.0.1/index/category?id=20', 0, 1517983443, 1518182281);
INSERT INTO `column` VALUES (21, 18, '辐射成像软件', 'http://127.0.0.1/index/category?id=21', 0, 1517983463, 1518182724);
INSERT INTO `column` VALUES (22, 0, '招聘英才', 'http://www.baidu.com', 0, 1517983485, 1517983485);
INSERT INTO `column` VALUES (23, 22, '社会招聘', 'http://www.baidu.com', 0, 1517983496, 1517983602);
INSERT INTO `column` VALUES (24, 22, '校园招聘', 'http://www.baidu.com', 0, 1517983518, 1517983518);
INSERT INTO `column` VALUES (25, 22, '用人理念', 'http://www.baidu.com', 0, 1517983535, 1517983535);
INSERT INTO `column` VALUES (26, 0, '联系我们', 'http://www.baidu.com', 0, 1517983617, 1517983617);
INSERT INTO `column` VALUES (27, 0, '首页', 'http://127.0.0.1/index/', 50, 1517988532, 1518087382);

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `link_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '链接名',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '地址',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES (12, '我的博客', 'http://www.wanghdeng669.top', 0, 1517890297, 1517894328);
INSERT INTO `links` VALUES (9, '百度', 'http://wjww.baidu.com', 0, 1517720888, 1517908159);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `content` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (4, '登录成功', 'wangheng', '127.0.0.1', 1517727992, 1517727992);
INSERT INTO `log` VALUES (10, '登录成功', 'asdsasadd', '127.0.0.1', 1517893094, 1517893094);
INSERT INTO `log` VALUES (6, '登录成功', 'wangheng', '127.0.0.1', 1517753441, 1517753441);
INSERT INTO `log` VALUES (7, '登录成功', 'wangheng', '127.0.0.1', 1517797710, 1517797710);
INSERT INTO `log` VALUES (8, '登录成功', 'wangheng', '127.0.0.1', 1517837206, 1517837206);
INSERT INTO `log` VALUES (9, '登录成功', 'wangheng', '127.0.0.1', 1517882095, 1517882095);
INSERT INTO `log` VALUES (14, '登录成功', 'wangheng', '127.0.0.1', 1517968508, 1517968508);
INSERT INTO `log` VALUES (12, '用户不存在', 'admin', '127.0.0.1', 1517908834, 1517908834);
INSERT INTO `log` VALUES (13, '登录成功', 'wangheng', '127.0.0.1', 1517908843, 1517908843);
INSERT INTO `log` VALUES (15, '登录成功', 'wangheng', '127.0.0.1', 1518056977, 1518056977);
INSERT INTO `log` VALUES (16, '登录成功', 'wangheng', '127.0.0.1', 1518167762, 1518167762);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '标题',
  `form` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '来源',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '图片路径',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `column_id` int(10) UNSIGNED NOT NULL COMMENT '所属栏目',
  `reveal` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否展示在首页',
  `views` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '浏览次数',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'Merak系列CMOS平板探测器即将亮相ECR', '北京海淀', '20180208\\c2eb2d4a7578da44d737cb55eac624d7.jpg', '2018年欧洲放射学大会（ECR）将于2018年2月28日-3月4日在奥地利维也纳举行，届时纳米维景也将携自主研发制造的中国首款Merak系列CMOS平板探测器参加此次盛会，我们的展位位于No.129,Expo X1......', '<p><img style=\"margin-right: auto;margin-left: auto;display: block\" src=\"/ueditor/php/upload/image/20180208/1518079351139345.jpg\" alt=\"\" width=\"1187\" height=\"372\"/></p><h3 style=\";text-align: center\"><span style=\"color: #000000\"><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">Merak</span><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">系列CMOS平板探测器即将亮相ECR</span></span></h3><p><span style=\"color: #000000\"><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">2018</span><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">年欧洲放射学大会（ECR）将于2018年2月28日-3月4日在奥地利维也纳举行，届时纳米维景也将携自主研发制造的中国首款Merak系列CMOS平板探测器参加此次盛会，我们的展位位于No.129,Expo X1，欢迎莅临参观。</span></span></p><p><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\"><span style=\"color: #000000\">欧洲放射学大会(ECR)简介</span></span></p><p><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\"><span style=\"color: #000000\">欧洲放射学会（ESR）在全球157个国家拥有超过75000名会员，是世界上最大的放射学会，每年主办欧洲最大和最具创新性的科学会议-欧洲放射学大会（ECR）。2017年ECR吸引了来自全球141个国家的26800多名与会者代表以及300家参展商。</span></span>&nbsp;</p><p><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">欧洲放射学大会（ECR）始于1967年，该会与北美放射学年会齐名，是放射学界公认的两大国际知名会议之一，原每四年在不同的地点举行，自1985年开始会议地点定在奥地利维也纳，1991年开始改为每两年举行一次，1999年后改为每年举办。2005年欧洲两大放射学机构-欧洲放射学协会和欧洲放射学大会在维也纳合并成立欧洲放射学会（ESR），从此之后，欧洲放射学会确立了自己在欧洲作为最大放射学会的地位。</span></p><p><span style=\";font-family: &#39;微软雅黑&#39;,&#39;sans-serif&#39;\">欧洲放射学会（ESR）是一个非营利非政治性的国际组织，使命是通过支持科学研究、教育和培训，不断提高放射学实践质量，来满足公众的医疗保健服务需求。</span></p><p><br/></p>', 10, 1, 0, 1518079414, 1518091410);
INSERT INTO `news` VALUES (2, 'Merak1313 CMOS平板探测器成功面世!', '北京海淀', '20180208\\f80de4175761c398a0a28423bde6ef60.jpg', '', '<h3 style=\"text-align: center;\">Merak1313 CMOS平板探测器成功面世！</h3><p>历经千锤百炼，Merak1313终于在今年9月成功面世，此款CMOS平板探测器是我们自主开发的第一款CMOS平板探测器，其采用业内领先的CMOS工艺技术，配备标准的GigE\r\n \r\nVision协议，使用国际先进的针状CsI闪烁体，具有低剂量高质成像、高分辨率、高灵敏度等特点，可广泛应用于牙科CBCT、工业无损检测等X射线成像领域，是X射线成像的利器。<strong><br/></strong></p><p>其核心竞争力在于：</p><p>1.低剂量获得更清晰的图像</p><p>2.四挡增益自由切换，满足不同应用场景</p><p>3.更宽的动态范围</p><p>4.全分辨率和全视野下的实时成像</p><p>5.标准的GigE Vision协议</p><p>6.硬件集成实时校正算法</p><p>&nbsp;</p><p>&nbsp;</p><p><img src=\"/ueditor/php/upload/image/20180208/1518079461976730.jpg\" alt=\"\" width=\"988\" height=\"658\"/></p><p><br/></p>', 11, 1, 0, 1518079583, 1518079810);
INSERT INTO `news` VALUES (3, 'Merak系列CMOS平板探测器精彩亮相RSNA', '北京海淀', '20180208\\97569a0b375c592c89eefeda28499d55.jpg', '', '<h3 class=\"p1\" style=\"text-align: center;\">Merak系列CMOS平板探测器精彩亮相RSNA</h3><p class=\"p1\">当地时间11月26日，第103届北美放射学年会（RSNA）在美国芝加哥麦考密克会展中心盛大开幕。纳米维景携自主研发生产的Merak系列平板探测器精彩亮相RSNA，向世界展示了纳米维景的科技实力。</p><p class=\"p1\" style=\"text-align: center;\"><span class=\"s2\"><img src=\"/ueditor/php/upload/image/20180208/1518079614420214.jpg\" alt=\"\" width=\"1008\" height=\"450\"/></span>纳米维景携自主研发<span class=\"s1\">Merak</span>系列产品亮相<span class=\"s1\">RSNA</span>&nbsp;</p><p class=\"p2\">今年的参会企业中，影像设备及部件公司依旧是主角，其中有一大批中国的影像公司，如东软医疗、迈瑞医疗、明峰医疗、蓝韵影像等公司。纳米维景也在此次展会上展示了作为一家中国科技公司的风采，吸引了牙科、乳腺、中小C-arm、Mini\r\n C-arm、小视野CBCT、工业无损检测、学术研究等领域同行的广泛关注，并达成进一步合作的意向，同时与欧美、日韩等地区客户建立了联系。</p><p class=\"p1\" style=\"text-align: left;\"><img src=\"/ueditor/php/upload/image/20180208/1518079614887795.jpg\" alt=\"\" width=\"1008\" height=\"450\"/></p><p class=\"p1\" style=\"text-align: left;\">正如此次北美放射学年会的主题“Explore Invent Transform”（探索、创造、变革），纳米维景也在不断的探索、创造、变革。以科技为根本，创造出属于中国人自己的首款CMOS平板探测器，并在此次展会中获得非凡的影响。&nbsp;</p><p class=\"p1\" style=\"text-align: center;\">&nbsp;<img src=\"/ueditor/php/upload/image/20180208/1518079615738974.jpg\" alt=\"\" width=\"1008\" height=\"450\"/>&nbsp;观展人员在详细了解Merak系列CMOS平板探测器</p><p class=\"p1\" style=\"text-align: left;\">&nbsp;Merak系列CMOS平板探测器汇集了多重优势，基于性能优异的针状CsI闪烁体和高灵敏度CMOS感光芯片，其可用更低的剂量获得更清晰的图像，同时动态范围也进一步提高，最大可达76dB。探测器内集成了四档增益，可以满足不同应用场景的需要。相对静态成像，Merak1313可以做到全分辨率和全视野下的实时动态成像，最高采集帧速率可达60fps。另外，为了最大化发挥探测器性能，硬件中嵌入了实时校准算法，以便于客户选取调用。</p><p class=\"p1\" style=\"text-align: left;\">路漫漫其修远兮，纳米维景将在不断的探索、创造、科技创新的道路上迅速发展壮大。</p><p><br/></p>', 12, 1, 0, 1518079665, 1518079816);
INSERT INTO `news` VALUES (4, '公司简介', '北京海淀', '', '', '<p><img src=\"http://127.0.0.1/static/index/picture/前台修图1.jpg\" alt=\"\"/></p><p><span style=\"color: #343434; font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; text-indent: 32px;\">&nbsp;北京纳米维景科技有限公司于2014年3月成立，总部坐落于中关村永丰产业基地，在用友软件园拥有上千平米的研发基地，并在成都设立了芯片研发中心，是一家致力于高速高精度辐射成像的高新技术企业，主要业务包括X射线CMOS探测器、X射线成像软件、静态CT解决方案等。</span></p><p></p><p><figure class=\"image align-center\"><img src=\"http://127.0.0.1/static/index/picture/banner_company32.jpg\" alt=\"\"/><figcaption></figcaption></figure></p><p></p><p><span style=\"color: #343434; font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; text-indent: 32px;\">&nbsp;纳米维景团队拥有十几年放射影像产品和核心部件研发经验并在业界积累了良好的口碑，公司自成立一直致力于国产X射线探测器及静态CT的自主研发，已经建立了一支四十多人的研发团队，其中博士硕士学历水平的超过一半，覆盖探测器闪烁晶体、PD、ASIC读出芯片、系统电子学、机械及软件算法等多个方面，在X射线探测器领域处于国内领先和国际先进的地位。</span></p><p><img style=\"margin-right: auto; margin-left: auto; display: block;\" src=\"http://127.0.0.1/static/index/picture/img_154021.jpg\" alt=\"\" width=\"871\" height=\"388\"/></p><p><span style=\"color: #343434; font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; text-indent: 32px;\">目前，纳米维景自主研发的静态CT原理已经验证成功并进入工程样机阶段，开发了CMOS探测器并进入转产阶段，顺利获得新一轮的风险投资。</span></p><p><br/></p>', 2, 0, 0, 1518084496, 1518084496);
INSERT INTO `news` VALUES (5, '发展历程', '北京海淀', '', '', '<p><img src=\"/ueditor/php/upload/image/20180208/1518087698101919.jpg\" alt=\"\"/></p>', 3, 0, 0, 1518087704, 1518087704);
INSERT INTO `news` VALUES (6, '公司愿景', '北京海淀', '', '', '<p><img src=\"/ueditor/php/upload/image/20180208/1518087840838192.jpg\" alt=\"公司愿景\"/></p><p><br/></p>', 4, 0, 0, 1518087844, 1518087844);
INSERT INTO `news` VALUES (7, '公司使命', '北京海淀', '', '', '<p><img src=\"/ueditor/php/upload/image/20180208/1518088031420142.jpg\" alt=\"公司使命\"/></p><p><br/></p>', 5, 0, 0, 1518088033, 1518088089);
INSERT INTO `news` VALUES (8, '价值观', '北京海淀', '', '', '<p><img src=\"http://www.nanovision.com.cn/storage/pages/January2018/culture.png\" alt=\"价值观\"/></p><p>价值观</p><p><img src=\"http://www.nanovision.com.cn/style/images/_culture/cul-1.png\" alt=\"\"/></p><h3>诚信·担当</h3><p>以诚立身，以信为人，踏实做事，勇于担当。</p><h3>专注·拼搏</h3><p>专注辐射成像领域，立足高速高精度成像技术前沿，履峰而上勇攀技术高峰，天行健君子以自强不息。</p><p><img src=\"http://www.nanovision.com.cn/style/images/_culture/cul-2.png\" alt=\"\"/></p><p><img src=\"http://www.nanovision.com.cn/style/images/_culture/cul-3.png\" alt=\"\"/></p><h3>高效·创新</h3><p>时间成就奇迹，高效缔造传奇，技术创新，产品创新，应用创新，自主创新赢天下。</p><h3>合作·共赢</h3><p>人心齐则士气足，士气足则百事兴，与队友合作共创佳绩，与客户合作共赢市场。</p><p><img src=\"http://www.nanovision.com.cn/style/images/_culture/cul-4.png\" alt=\"\"/></p><p><br/></p>', 6, 0, 0, 1518088159, 1518088173);
INSERT INTO `news` VALUES (9, '资质荣誉', '北京海淀', '', '', '<p><img src=\"/ueditor/php/upload/image/20180208/1518088313921497.jpg\" alt=\"\"/></p><p><br/></p>', 7, 0, 0, 1518088318, 1518088318);
INSERT INTO `news` VALUES (10, '光子流探测器——新一代辐射成像技术取得重大突破', '北京海淀', '', '2016新年伊始，当国人还沉浸在浓浓的春节氛围中时，北京纳米维景科技有限公司的光子流探测器取得重大突破，获取了第一张X光成像图，性能达到预期效果。 光子流探测器是介于传统光子积分探测器和新型光子计数探测器之间的一种X光子探测器，向高速推进就可以达到单光子计数成像效果，向低速推进可以实现积分成像效果，克服了单光子计数在大剂量时的光子堆积效应，也避免了长时间积分暗电流噪声过大的问题，此项技术国际首创！', '<h3 style=\"text-align: center;\">光子流探测器——新一代辐射成像技术取得重大突破</h3><p>2016新年伊始，当国人还沉浸在浓浓的春节氛围中时，北京纳米维景科技有限公司的光子流探测器取得重大突破，获取了第一张X光成像图，性能达到预期效果。</p><p>光子流探测器是介于传统光子积分探测器和新型光子计数探测器之间的一种X光子探测器，向高速推进就可以达到单光子计数成像效果，向低速推进可以实现积分成像效果，克服了单光子计数在大剂量时的光子堆积效应，也避免了长时间积分暗电流噪声过大的问题，此项技术国际首创！</p><p>光子流探测器可应用于医学和工业辐射成像领域，尤其适用于CT、DSA等高帧速率X光成像领域，是新一代辐射成像技术。</p><p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/ueditor/php/upload/image/20180208/1518089846154991.jpg\" alt=\"\"/></p><p style=\"text-align: center;\">光子流探测器</p><p style=\"text-align: center;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/ueditor/php/upload/image/20180208/1518089847992581.jpg\" alt=\"\"/>X光成像图</p><p><br/></p>', 10, 0, 0, 1518089887, 1518093344);
INSERT INTO `news` VALUES (11, '中国首款CMOS平板探测器即将亮相RSNA', '北京海淀', '', '中国首款CMOS平板探测器即将亮相RSNA  2017年第104届北美放射学会年会将于2017年11月26日-12月1日在美国芝加哥的麦考密克展览中心举行,届时纳米维景也将携自主研发制造的中国首款Merak系列CMOS平板探测器参加此次展会，展位South- Hall A 1456。', '<p><img src=\"/ueditor/php/upload/image/20180208/1518093884411142.jpg\" width=\"1010\" height=\"648\"/></p><h3 style=\"text-align: center\">中国首款CMOS平板探测器即将亮相RSNA</h3><p>2017年第104届北美放射学会年会将于2017年11月26日-12月1日在美国芝加哥的麦考密克展览中心举行,届时纳米维景也将携自主研发制造的中国首款Merak系列CMOS平板探测器参加此次展会，展位South- Hall A 1456。</p><h4>北美放射协会（RSNA）简介：</h4><p>北美放射学会（RSNA）成立于1915年，原名为西方伦琴学会，1920年更名为北美放射学会，是世界上最大、最具影响力的权威学术团体组织之一，在全球136个国家拥有超过54000名会员，由来自世界各地的放射科医师、医学物理学家和其他医疗专业人士组成。</p><p>北美放射学会年会是RSNA每年11月下旬召开的影像诊断、放射治疗及放射技术学的国际性会议，RSNA年会是全球放射学界规模最大、最能代表行业未来发展方向的顶级医疗盛会，有来自全球130多个国家的数万名放射学专业的专家、学者、企业代表参会，交流、探讨和展示国际放射学领域最新的科研成果。</p><p><br/></p>', 12, 0, 0, 1518093927, 1518093927);

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '网站标题',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '网站关键字',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '网站描述',
  `number` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '网站备案号',
  `statistics` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '统计代码',
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '可访问IP',
  `is_close` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否关闭',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES (1, '北京纳米维景科技有限公司', '纳米,维景科技', '纳米维景科技有限公司成立于2014年3月，坐落在中关村永丰高新技术产业基地，在用友软件园拥有上千平米的研发基地，是一家提供探测器核心部件和新一代CT解决方案的高科技企业，主要业务包括X射线光子探测器、CMOS平板探测器、X射线成像软件、静态CT解决方案等。', '京ICP备16037518号', 'a99cf70c4be57edf0893a7a2d93c4817', '192.168.1.1', 1, 0, 1517890691);

SET FOREIGN_KEY_CHECKS = 1;
