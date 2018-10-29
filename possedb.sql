/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : possedb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-20 18:02:50
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `comentarios`
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comentario_desc` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`comentario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES ('95', '7', 'Sdfsdf', '3');
INSERT INTO `comentarios` VALUES ('96', '7', 'Muy bueno', '12');
INSERT INTO `comentarios` VALUES ('97', '7', 'Dfsdfsdf', '3');
INSERT INTO `comentarios` VALUES ('98', '211', 'Asdasd', '3');
INSERT INTO `comentarios` VALUES ('99', '2', 'Interesante', '3');
INSERT INTO `comentarios` VALUES ('100', '215', 'Jaja\n', '1');
INSERT INTO `comentarios` VALUES ('101', '215', 'Jaja', '3');
INSERT INTO `comentarios` VALUES ('102', '215', 'Jajaja\n', '3');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `usuario_id` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd ad asd asd', 'hola! 01', 'img/imagen01.jpg', '8', '2017-11-01 20:34:28', null, null);
INSERT INTO `posts` VALUES ('2', 'werwrwerwerwerwerwerwrwerwerwerwerwe', 'hola 02', 'img/imagen02.jpg', '8', '2017-11-01 20:34:28', null, null);
INSERT INTO `posts` VALUES ('3', 'sdfsdf hhhhhh hh h h h h h h ', 'hola 03', 'img/imagen03.jpg', '3', '2017-11-01 20:34:28', null, '2017-12-18 16:34:27');
INSERT INTO `posts` VALUES ('4', 'sdklklsdkldsfklsdfkldsfkldfkldsf', 'hola 04', 'img/imagen04.jpg', '7', '2017-11-01 20:34:28', null, null);
INSERT INTO `posts` VALUES ('5', 'nodejs nodejs nodejs nodejs', 'NODEJS', 'img/imagen02.jpg', '3', '2017-11-01 20:34:28', null, '2017-12-18 16:35:34');
INSERT INTO `posts` VALUES ('6', 'mongodb mongodb mongodb mongodb mongodb mongodb mongodb mongodb', 'MONGO DB', 'img/imagen03.jpg', '3', '2017-11-01 20:34:28', null, '2017-12-18 16:34:55');
INSERT INTO `posts` VALUES ('7', 'php php php php ', 'PHP', 'img/imagen04.jpg', '8', '2017-11-01 20:34:28', null, null);
INSERT INTO `posts` VALUES ('203', 'nada que decir sobre esto', 'hashshh', 'img/__suavesita___by_re_sublimity_kun-d479t22.png', '3', '2017-12-19 16:33:17', null, null);
INSERT INTO `posts` VALUES ('204', 'nada que decir es un comentario', 'deathcore', 'img/111folder.jpg', '3', '2017-12-19 16:33:38', null, null);
INSERT INTO `posts` VALUES ('205', 'asdddd', 'Angelmaker', 'img/Album Cover Art - Size (700x700).jpg', '3', '2017-12-19 16:33:58', null, null);
INSERT INTO `posts` VALUES ('206', 'asddd', 'Aasdd', 'img/art_trade___nikoh_oc_ailin_by_drunkenxdragoon-d62b311.jpg', '3', '2017-12-19 16:34:42', null, '2017-12-20 17:59:52');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(39) NOT NULL,
  `url_avatar` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('3', 'sergio', 'posse', 'posse@posse', 'img/Qntal-Nihil.jpg');
INSERT INTO `usuarios` VALUES ('7', 'Josesito', 'posse', 'josesito@jose', 'img/vacio.jpg');
INSERT INTO `usuarios` VALUES ('8', 'Fulano', 'asd', 'asd@asd', 'img/vacio.jpg');
INSERT INTO `usuarios` VALUES ('12', 'asd', 'asd', 'asd', 'img/11folder.jpg');
INSERT INTO `usuarios` VALUES ('13', '56y', 'asd', 'asd', 'img/vacio.jpg');
INSERT INTO `usuarios` VALUES ('14', 'gege', 'gege', 'gege', 'img/vacio.jpg');
INSERT INTO `usuarios` VALUES ('15', '555ff', 'dfg', 'dfg', 'img/vacio.jpg');
INSERT INTO `usuarios` VALUES ('16', 'sdf', 'sdff', '', 'img/vacio.jpg');
