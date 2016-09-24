/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 5.5.32 : Database - pedro_productos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `pedro_productos`;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id_archivos` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_archivos` int(11) DEFAULT NULL,
  `tipo_archivos` varchar(11) DEFAULT NULL,
  `id_tipo_archivos` int(11) DEFAULT NULL,
  `nombre_archivos` varchar(255) DEFAULT NULL,
  `archivo_archivos` varchar(255) DEFAULT NULL,
  `extension_archivos` varchar(255) DEFAULT NULL,
  `portada_archivos` int(11) DEFAULT NULL,
  `fecha_archivos` datetime DEFAULT NULL,
  PRIMARY KEY (`id_archivos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='usado para webadmin\\tiny_mce\\plugins\\jfilebrowser';

/*Data for the table `archivos` */

insert  into `archivos`(`id_archivos`,`categoria_archivos`,`tipo_archivos`,`id_tipo_archivos`,`nombre_archivos`,`archivo_archivos`,`extension_archivos`,`portada_archivos`,`fecha_archivos`) values (1,45,'tinymce',NULL,'P1140636.JPG','20150606175600_0.jpg','jpg',NULL,'2015-06-06 17:56:00'),(2,45,'tinymce',NULL,'P1140636.JPG','20150606180351_0.jpg','jpg',NULL,'2015-06-06 18:03:51');

/*Table structure for table `atributos` */

DROP TABLE IF EXISTS `atributos`;

CREATE TABLE `atributos` (
  `ccodatributo` varchar(14) NOT NULL,
  `ccodpage` varchar(8) NOT NULL,
  `cnivatributo` varchar(1) NOT NULL,
  `cnomatributo` varchar(50) NOT NULL,
  `cselatributo` varchar(1) NOT NULL,
  `cestatributo` varchar(1) NOT NULL,
  `cdesatributo` text NOT NULL,
  `cimgatributo` varchar(100) NOT NULL,
  `cverlista` varchar(1) NOT NULL,
  PRIMARY KEY (`ccodatributo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `atributos` */

/*Table structure for table `atributoscontenido` */

DROP TABLE IF EXISTS `atributoscontenido`;

CREATE TABLE `atributoscontenido` (
  `ccodcontenido` varchar(20) NOT NULL DEFAULT '',
  `ccodatributo` varchar(14) NOT NULL,
  `ctxtdetalle` varchar(500) NOT NULL,
  PRIMARY KEY (`ccodcontenido`,`ccodatributo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `atributoscontenido` */

/*Table structure for table `atributosseccion` */

DROP TABLE IF EXISTS `atributosseccion`;

CREATE TABLE `atributosseccion` (
  `ccodatributo` varchar(14) NOT NULL,
  `ccodseccion` varchar(20) NOT NULL,
  `cestrelacion` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `atributosseccion` */

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idcategoria` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titu_cate` varchar(200) NOT NULL,
  `orden` varchar(20) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `descri_cate` longtext NOT NULL,
  `img_cate` longtext NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`idcategoria`,`titu_cate`,`orden`,`estado`,`descri_cate`,`img_cate`) values (77,'pagina','','1','',''),(78,'curso','','1','','');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `cat_id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `tipo_cat` varchar(11) DEFAULT '1',
  `nivel_cat` int(11) DEFAULT '1',
  `parent_id_cat` int(10) DEFAULT '0',
  `name_cat` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `desc_cat` text CHARACTER SET latin1,
  `status_cat` int(11) DEFAULT '1',
  `image_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `imagen_activa_cat` int(11) DEFAULT '1',
  `orden_cat` int(11) DEFAULT NULL,
  `default_cat` int(11) DEFAULT NULL,
  `fecha_cat` datetime DEFAULT NULL,
  `fecha_edit_cat` datetime DEFAULT NULL,
  `usu_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `usu_edit_cat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`cat_id_cat`),
  UNIQUE KEY `key1` (`name_cat`,`parent_id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='usado para webadmin\\tiny_mce\\plugins\\jfilebrowser';

/*Data for the table `categorias` */

insert  into `categorias`(`cat_id_cat`,`tipo_cat`,`nivel_cat`,`parent_id_cat`,`name_cat`,`desc_cat`,`status_cat`,`image_cat`,`imagen_activa_cat`,`orden_cat`,`default_cat`,`fecha_cat`,`fecha_edit_cat`,`usu_cat`,`usu_edit_cat`) values (45,'5',1,0,'prueba',NULL,1,NULL,1,NULL,NULL,'2015-06-06 05:45:30',NULL,NULL,NULL);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `codcli` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(30) NOT NULL,
  PRIMARY KEY (`codcli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `id_noticia` varchar(24) COLLATE utf8_bin DEFAULT NULL COMMENT 'viene de codigo contenido',
  `nombre` char(50) COLLATE utf8_bin DEFAULT NULL,
  `comentario` longtext COLLATE utf8_bin,
  `fechacorta` date NOT NULL,
  `fechalarga` varchar(80) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(400) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `aceptado` tinyint(1) NOT NULL,
  `imagenfoto` varchar(250) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL,
  `idcate` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=621 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `comentarios` */

/*Table structure for table `compania` */

DROP TABLE IF EXISTS `compania`;

CREATE TABLE `compania` (
  `id_conpania` bigint(11) NOT NULL AUTO_INCREMENT,
  `desc_compania` varchar(300) DEFAULT NULL,
  `orden` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_conpania`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `compania` */

/*Table structure for table `contactenos` */

DROP TABLE IF EXISTS `contactenos`;

CREATE TABLE `contactenos` (
  `nombre` varchar(600) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` longtext NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo` bigint(12) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(800) NOT NULL,
  `procedencia` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

/*Data for the table `contactenos` */

insert  into `contactenos`(`nombre`,`apellido`,`email`,`comentario`,`telefono`,`fecha`,`codigo`,`asunto`,`procedencia`) values ('prueba alex','','sisdatahost@hotmail.com','hola esto es unaprueba                ','996272600','2016-01-13 18:09:58',201,'prueba','Formulario Contactenos'),('Prueba2','','sisdatahost@hotmail.com','                prueba 2','996272600','2016-01-22 02:52:33',202,'Pruebs2','Formulario Contactenos'),('dsfdef','','pedrinxcam@hotmail.com','  dsfsdtrttrtr              ','112236633','2016-01-27 04:51:08',203,'fsdfdsfsdf','Formulario Contactenos');

/*Table structure for table `contador` */

DROP TABLE IF EXISTS `contador`;

CREATE TABLE `contador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `segundos` varchar(30) DEFAULT NULL,
  `fechacorta` date NOT NULL,
  KEY `id` (`id`),
  KEY `IP` (`IP`)
) ENGINE=MyISAM AUTO_INCREMENT=12325 DEFAULT CHARSET=latin1;

/*Data for the table `contador` */

insert  into `contador`(`id`,`IP`,`hora`,`fecha`,`segundos`,`fechacorta`) values (12048,'127.0.0.1','05:17:46 PM','Miércoles 09 de Diciembre de 2015 Hora: 05:17:46 P','1449710266','2015-12-09'),(12049,'179.7.64.60','01:14:31 PM','Lunes 28 de Diciembre de 2015 Hora: 01:14:31 PM','1451337271','2015-12-28'),(12050,'179.7.68.252','04:19:18 PM','Lunes 28 de Diciembre de 2015 Hora: 04:19:18 PM','1451348358','2015-12-28'),(12051,'190.90.23.146','08:22:19 PM','Lunes 28 de Diciembre de 2015 Hora: 08:22:19 PM','1451362939','2015-12-28'),(12052,'66.249.65.60','11:15:38 PM','Lunes 28 de Diciembre de 2015 Hora: 11:15:38 PM','1451373338','2015-12-28'),(12053,'66.220.146.20','05:36:03 AM','Martes 29 de Diciembre de 2015 Hora: 05:36:03 AM','1451396163','2015-12-29'),(12054,'66.220.146.24','05:36:05 AM','Martes 29 de Diciembre de 2015 Hora: 05:36:05 AM','1451396165','2015-12-29'),(12055,'69.171.228.117','05:36:06 AM','Martes 29 de Diciembre de 2015 Hora: 05:36:06 AM','1451396166','2015-12-29'),(12056,'173.252.122.122','12:50:53 PM','Martes 29 de Diciembre de 2015 Hora: 12:50:53 PM','1451422253','2015-12-29'),(12057,'173.252.79.115','12:50:54 PM','Martes 29 de Diciembre de 2015 Hora: 12:50:54 PM','1451422254','2015-12-29'),(12058,'66.220.156.101','12:51:17 PM','Martes 29 de Diciembre de 2015 Hora: 12:51:17 PM','1451422277','2015-12-29'),(12059,'190.239.239.125','12:51:17 PM','Martes 29 de Diciembre de 2015 Hora: 12:51:17 PM','1451422277','2015-12-29'),(12060,'158.69.215.11','03:34:55 PM','Martes 29 de Diciembre de 2015 Hora: 03:34:55 PM','1451432095','2015-12-29'),(12061,'38.100.21.172','04:12:45 PM','Martes 29 de Diciembre de 2015 Hora: 04:12:45 PM','1451434365','2015-12-29'),(12062,'66.249.65.63','04:15:22 PM','Martes 29 de Diciembre de 2015 Hora: 04:15:22 PM','1451434522','2015-12-29'),(12063,'179.7.75.1','07:17:42 PM','Martes 29 de Diciembre de 2015 Hora: 07:17:42 PM','1451445462','2015-12-29'),(12064,'180.76.15.151','12:24:30 PM','Miércoles 30 de Diciembre de 2015 Hora: 12:24:30 P','1451507070','2015-12-30'),(12065,'179.7.78.1','12:26:03 PM','Miércoles 30 de Diciembre de 2015 Hora: 12:26:03 P','1451507163','2015-12-30'),(12066,'179.7.67.193','07:51:48 PM','Miércoles 30 de Diciembre de 2015 Hora: 07:51:48 P','1451533908','2015-12-30'),(12067,'195.22.126.126','12:15:19 AM','Jueves 31 de Diciembre de 2015 Hora: 12:15:19 AM','1451549719','2015-12-31'),(12068,'179.7.68.186','06:28:47 AM','Jueves 31 de Diciembre de 2015 Hora: 06:28:47 AM','1451572127','2015-12-31'),(12069,'136.243.48.83','06:59:26 AM','Jueves 31 de Diciembre de 2015 Hora: 06:59:26 AM','1451573966','2015-12-31'),(12070,'157.55.39.225','06:54:30 PM','Jueves 31 de Diciembre de 2015 Hora: 06:54:30 PM','1451616870','2015-12-31'),(12071,'66.249.65.57','07:45:05 PM','Jueves 31 de Diciembre de 2015 Hora: 07:45:05 PM','1451619905','2015-12-31'),(12072,'179.7.91.122','09:52:49 PM','Jueves 31 de Diciembre de 2015 Hora: 09:52:49 PM','1451627569','2015-12-31'),(12073,'180.76.15.145','09:54:30 PM','Jueves 31 de Diciembre de 2015 Hora: 09:54:30 PM','1451627670','2015-12-31'),(12074,'179.7.67.186','12:22:43 AM','Viernes 01 de Enero de 2016 Hora: 12:22:43 AM','1451636563','2016-01-01'),(12075,'179.7.88.58','08:40:10 AM','Viernes 01 de Enero de 2016 Hora: 08:40:10 AM','1451666410','2016-01-01'),(12076,'192.99.107.208','08:59:10 AM','Viernes 01 de Enero de 2016 Hora: 08:59:10 AM','1451667550','2016-01-01'),(12077,'158.69.225.34','05:57:35 PM','Viernes 01 de Enero de 2016 Hora: 05:57:35 PM','1451699855','2016-01-01'),(12078,'40.77.167.34','06:36:29 PM','Viernes 01 de Enero de 2016 Hora: 06:36:29 PM','1451702189','2016-01-01'),(12079,'136.243.48.85','09:48:17 PM','Viernes 01 de Enero de 2016 Hora: 09:48:17 PM','1451713697','2016-01-01'),(12080,'157.55.39.76','11:45:58 PM','Viernes 01 de Enero de 2016 Hora: 11:45:58 PM','1451720758','2016-01-01'),(12081,'136.243.48.86','01:09:43 AM','Sabado 02 de Enero de 2016 Hora: 01:09:43 AM','1451725783','2016-01-02'),(12082,'37.1.202.50','12:19:13 PM','Sabado 02 de Enero de 2016 Hora: 12:19:13 PM','1451765953','2016-01-02'),(12083,'179.7.73.146','07:43:01 PM','Sabado 02 de Enero de 2016 Hora: 07:43:01 PM','1451792581','2016-01-02'),(12084,'52.35.213.194','02:29:58 AM','Domingo 03 de Enero de 2016 Hora: 02:29:58 AM','1451816998','2016-01-03'),(12085,'207.46.13.31','06:01:53 AM','Domingo 03 de Enero de 2016 Hora: 06:01:53 AM','1451829713','2016-01-03'),(12086,'180.76.15.28','07:34:13 AM','Domingo 03 de Enero de 2016 Hora: 07:34:13 AM','1451835253','2016-01-03'),(12087,'136.243.48.82','07:45:52 AM','Domingo 03 de Enero de 2016 Hora: 07:45:52 AM','1451835952','2016-01-03'),(12088,'179.7.71.189','09:20:23 PM','Domingo 03 de Enero de 2016 Hora: 09:20:23 PM','1451884823','2016-01-03'),(12089,'179.7.71.189','09:20:23 PM','Domingo 03 de Enero de 2016 Hora: 09:20:23 PM','1451884823','2016-01-03'),(12090,'180.76.15.18','11:43:25 PM','Domingo 03 de Enero de 2016 Hora: 11:43:25 PM','1451893405','2016-01-03'),(12091,'78.47.191.20','12:28:20 AM','Lunes 04 de Enero de 2016 Hora: 12:28:20 AM','1451896100','2016-01-04'),(12092,'181.233.198.66','12:17:13 PM','Lunes 04 de Enero de 2016 Hora: 12:17:13 PM','1451938633','2016-01-04'),(12093,'142.4.206.84','03:56:23 PM','Lunes 04 de Enero de 2016 Hora: 03:56:23 PM','1451951783','2016-01-04'),(12094,'179.7.78.189','06:44:09 PM','Lunes 04 de Enero de 2016 Hora: 06:44:09 PM','1451961849','2016-01-04'),(12095,'66.249.65.117','01:46:04 AM','Martes 05 de Enero de 2016 Hora: 01:46:04 AM','1451987164','2016-01-05'),(12096,'157.55.39.176','04:07:30 AM','Martes 05 de Enero de 2016 Hora: 04:07:30 AM','1451995650','2016-01-05'),(12097,'180.76.15.154','05:08:55 AM','Martes 05 de Enero de 2016 Hora: 05:08:55 AM','1451999335','2016-01-05'),(12098,'66.249.65.114','08:25:15 AM','Martes 05 de Enero de 2016 Hora: 08:25:15 AM','1452011115','2016-01-05'),(12099,'54.183.13.153','10:48:28 PM','Martes 05 de Enero de 2016 Hora: 10:48:28 PM','1452062908','2016-01-05'),(12100,'69.58.178.58','02:43:27 AM','Miércoles 06 de Enero de 2016 Hora: 02:43:27 AM','1452077007','2016-01-06'),(12101,'179.7.70.202','06:24:52 AM','Miércoles 06 de Enero de 2016 Hora: 06:24:52 AM','1452090292','2016-01-06'),(12102,'148.245.154.182','09:53:50 AM','Miércoles 06 de Enero de 2016 Hora: 09:53:50 AM','1452102830','2016-01-06'),(12103,'208.80.194.124','10:34:26 AM','Miércoles 06 de Enero de 2016 Hora: 10:34:26 AM','1452105266','2016-01-06'),(12104,'180.76.15.5','01:06:12 PM','Miércoles 06 de Enero de 2016 Hora: 01:06:12 PM','1452114372','2016-01-06'),(12105,'180.76.15.19','01:06:12 PM','Miércoles 06 de Enero de 2016 Hora: 01:06:12 PM','1452114372','2016-01-06'),(12106,'157.55.39.127','02:00:18 PM','Miércoles 06 de Enero de 2016 Hora: 02:00:18 PM','1452117618','2016-01-06'),(12107,'66.249.65.39','03:02:40 PM','Miércoles 06 de Enero de 2016 Hora: 03:02:40 PM','1452121360','2016-01-06'),(12108,'207.46.13.181','06:22:58 PM','Miércoles 06 de Enero de 2016 Hora: 06:22:58 PM','1452133378','2016-01-06'),(12109,'54.194.151.13','07:02:28 PM','Miércoles 06 de Enero de 2016 Hora: 07:02:28 PM','1452135748','2016-01-06'),(12110,'179.7.69.74','08:08:03 PM','Miércoles 06 de Enero de 2016 Hora: 08:08:03 PM','1452139683','2016-01-06'),(12111,'66.249.65.1','09:05:23 PM','Miércoles 06 de Enero de 2016 Hora: 09:05:23 PM','1452143123','2016-01-06'),(12112,'91.121.100.66','02:28:31 AM','Jueves 07 de Enero de 2016 Hora: 02:28:31 AM','1452162511','2016-01-07'),(12113,'89.145.95.43','07:27:59 AM','Jueves 07 de Enero de 2016 Hora: 07:27:59 AM','1452180479','2016-01-07'),(12114,'180.76.15.30','04:30:01 PM','Jueves 07 de Enero de 2016 Hora: 04:30:01 PM','1452213001','2016-01-07'),(12115,'66.249.65.42','05:34:29 PM','Jueves 07 de Enero de 2016 Hora: 05:34:29 PM','1452216869','2016-01-07'),(12116,'180.76.15.161','08:15:02 PM','Jueves 07 de Enero de 2016 Hora: 08:15:02 PM','1452226502','2016-01-07'),(12117,'180.76.15.160','12:21:14 AM','Viernes 08 de Enero de 2016 Hora: 12:21:14 AM','1452241274','2016-01-08'),(12118,'180.76.15.11','05:39:02 AM','Viernes 08 de Enero de 2016 Hora: 05:39:02 AM','1452260342','2016-01-08'),(12119,'180.76.15.134','12:26:28 PM','Viernes 08 de Enero de 2016 Hora: 12:26:28 PM','1452284788','2016-01-08'),(12120,'180.76.15.6','01:11:33 PM','Viernes 08 de Enero de 2016 Hora: 01:11:33 PM','1452287493','2016-01-08'),(12121,'190.235.67.200','01:34:25 PM','Viernes 08 de Enero de 2016 Hora: 01:34:25 PM','1452288865','2016-01-08'),(12122,'190.235.92.63','03:56:11 PM','Viernes 08 de Enero de 2016 Hora: 03:56:11 PM','1452297371','2016-01-08'),(12123,'179.7.75.134','06:36:19 PM','Viernes 08 de Enero de 2016 Hora: 06:36:19 PM','1452306979','2016-01-08'),(12124,'179.7.75.134','06:36:19 PM','Viernes 08 de Enero de 2016 Hora: 06:36:19 PM','1452306979','2016-01-08'),(12125,'190.42.16.54','07:10:50 PM','Viernes 08 de Enero de 2016 Hora: 07:10:50 PM','1452309050','2016-01-08'),(12126,'194.44.161.58','08:42:02 PM','Viernes 08 de Enero de 2016 Hora: 08:42:02 PM','1452314522','2016-01-08'),(12127,'199.116.169.254','06:32:31 AM','Sabado 09 de Enero de 2016 Hora: 06:32:31 AM','1452349951','2016-01-09'),(12128,'66.249.88.161','09:56:15 AM','Miércoles 13 de Enero de 2016 Hora: 09:56:15 AM','1452707775','2016-01-13'),(12129,'157.55.39.10','09:58:11 AM','Miércoles 13 de Enero de 2016 Hora: 09:58:11 AM','1452707891','2016-01-13'),(12130,'93.92.217.228','11:18:04 AM','Miércoles 13 de Enero de 2016 Hora: 11:18:04 AM','1452712684','2016-01-13'),(12131,'190.239.69.75','11:49:27 AM','Miércoles 13 de Enero de 2016 Hora: 11:49:27 AM','1452714567','2016-01-13'),(12132,'179.7.85.146','01:10:44 PM','Miércoles 13 de Enero de 2016 Hora: 01:10:44 PM','1452719444','2016-01-13'),(12133,'207.241.225.227','03:59:20 PM','Miércoles 13 de Enero de 2016 Hora: 03:59:20 PM','1452729560','2016-01-13'),(12134,'207.241.225.244','04:08:50 PM','Miércoles 13 de Enero de 2016 Hora: 04:08:50 PM','1452730130','2016-01-13'),(12135,'207.241.226.218','04:40:34 PM','Miércoles 13 de Enero de 2016 Hora: 04:40:34 PM','1452732034','2016-01-13'),(12136,'207.241.231.248','04:45:48 PM','Miércoles 13 de Enero de 2016 Hora: 04:45:48 PM','1452732348','2016-01-13'),(12137,'207.241.226.230','04:52:59 PM','Miércoles 13 de Enero de 2016 Hora: 04:52:59 PM','1452732779','2016-01-13'),(12138,'207.241.231.247','04:55:33 PM','Miércoles 13 de Enero de 2016 Hora: 04:55:33 PM','1452732933','2016-01-13'),(12139,'207.241.225.235','05:13:24 PM','Miércoles 13 de Enero de 2016 Hora: 05:13:24 PM','1452734004','2016-01-13'),(12140,'66.249.65.45','06:34:21 PM','Miércoles 13 de Enero de 2016 Hora: 06:34:21 PM','1452738861','2016-01-13'),(12141,'207.241.225.226','02:42:01 AM','Jueves 14 de Enero de 2016 Hora: 02:42:01 AM','1452768121','2016-01-14'),(12142,'181.65.186.90','07:18:50 AM','Jueves 14 de Enero de 2016 Hora: 07:18:50 AM','1452784730','2016-01-14'),(12143,'107.191.49.142','01:52:32 PM','Jueves 14 de Enero de 2016 Hora: 01:52:32 PM','1452808352','2016-01-14'),(12144,'179.7.84.180','07:32:32 PM','Jueves 14 de Enero de 2016 Hora: 07:32:32 PM','1452828752','2016-01-14'),(12145,'180.76.15.25','09:05:49 PM','Jueves 14 de Enero de 2016 Hora: 09:05:49 PM','1452834349','2016-01-14'),(12146,'180.76.15.146','11:51:39 PM','Jueves 14 de Enero de 2016 Hora: 11:51:39 PM','1452844299','2016-01-14'),(12147,'180.76.15.16','02:52:51 AM','Viernes 15 de Enero de 2016 Hora: 02:52:51 AM','1452855171','2016-01-15'),(12148,'180.76.15.33','02:54:23 AM','Viernes 15 de Enero de 2016 Hora: 02:54:23 AM','1452855263','2016-01-15'),(12149,'65.19.167.130','03:09:20 AM','Viernes 15 de Enero de 2016 Hora: 03:09:20 AM','1452856160','2016-01-15'),(12150,'212.100.243.116','03:43:10 AM','Viernes 15 de Enero de 2016 Hora: 03:43:10 AM','1452858190','2016-01-15'),(12151,'212.100.243.113','03:43:10 AM','Viernes 15 de Enero de 2016 Hora: 03:43:10 AM','1452858190','2016-01-15'),(12152,'180.76.15.12','08:10:51 AM','Viernes 15 de Enero de 2016 Hora: 08:10:51 AM','1452874251','2016-01-15'),(12153,'180.76.15.147','12:48:45 PM','Viernes 15 de Enero de 2016 Hora: 12:48:45 PM','1452890925','2016-01-15'),(12154,'190.239.79.221','02:32:43 PM','Viernes 15 de Enero de 2016 Hora: 02:32:43 PM','1452897163','2016-01-15'),(12155,'190.234.105.42','02:34:22 PM','Viernes 15 de Enero de 2016 Hora: 02:34:22 PM','1452897262','2016-01-15'),(12156,'180.76.15.140','02:53:06 PM','Viernes 15 de Enero de 2016 Hora: 02:53:06 PM','1452898386','2016-01-15'),(12157,'192.241.169.95','03:44:48 PM','Viernes 15 de Enero de 2016 Hora: 03:44:48 PM','1452901488','2016-01-15'),(12158,'136.243.48.84','04:10:20 AM','Sabado 16 de Enero de 2016 Hora: 04:10:20 AM','1452946220','2016-01-16'),(12159,'24.189.30.206','06:15:12 AM','Sabado 16 de Enero de 2016 Hora: 06:15:12 AM','1452953712','2016-01-16'),(12160,'190.239.79.53','10:05:33 AM','Sabado 16 de Enero de 2016 Hora: 10:05:33 AM','1452967533','2016-01-16'),(12161,'82.80.130.200','12:18:37 PM','Sabado 16 de Enero de 2016 Hora: 12:18:37 PM','1452975517','2016-01-16'),(12162,'180.76.15.29','03:00:57 PM','Sabado 16 de Enero de 2016 Hora: 03:00:57 PM','1452985257','2016-01-16'),(12163,'179.7.86.60','06:54:30 PM','Sabado 16 de Enero de 2016 Hora: 06:54:30 PM','1452999270','2016-01-16'),(12164,'190.239.66.105','11:02:13 PM','Sabado 16 de Enero de 2016 Hora: 11:02:13 PM','1453014133','2016-01-16'),(12165,'190.239.73.66','05:25:22 AM','Domingo 17 de Enero de 2016 Hora: 05:25:22 AM','1453037122','2016-01-17'),(12166,'81.177.143.31','07:10:32 AM','Domingo 17 de Enero de 2016 Hora: 07:10:32 AM','1453043432','2016-01-17'),(12167,'199.189.248.10','07:15:45 AM','Domingo 17 de Enero de 2016 Hora: 07:15:45 AM','1453043745','2016-01-17'),(12168,'79.170.44.125','07:27:48 AM','Domingo 17 de Enero de 2016 Hora: 07:27:48 AM','1453044468','2016-01-17'),(12169,'176.57.210.32','07:28:14 AM','Domingo 17 de Enero de 2016 Hora: 07:28:14 AM','1453044494','2016-01-17'),(12170,'103.9.171.125','07:28:33 AM','Domingo 17 de Enero de 2016 Hora: 07:28:33 AM','1453044513','2016-01-17'),(12171,'40.77.167.51','09:41:43 AM','Domingo 17 de Enero de 2016 Hora: 09:41:43 AM','1453052503','2016-01-17'),(12172,'157.55.39.152','09:42:33 AM','Domingo 17 de Enero de 2016 Hora: 09:42:33 AM','1453052553','2016-01-17'),(12173,'193.90.12.87','09:43:12 AM','Domingo 17 de Enero de 2016 Hora: 09:43:12 AM','1453052592','2016-01-17'),(12174,'157.55.39.20','09:44:22 AM','Domingo 17 de Enero de 2016 Hora: 09:44:22 AM','1453052662','2016-01-17'),(12175,'207.46.13.136','11:07:14 AM','Domingo 17 de Enero de 2016 Hora: 11:07:14 AM','1453057634','2016-01-17'),(12176,'190.239.82.190','06:26:20 PM','Domingo 17 de Enero de 2016 Hora: 06:26:20 PM','1453083980','2016-01-17'),(12177,'192.99.107.243','08:33:10 PM','Domingo 17 de Enero de 2016 Hora: 08:33:10 PM','1453091590','2016-01-17'),(12178,'179.7.81.127','08:38:19 PM','Domingo 17 de Enero de 2016 Hora: 08:38:19 PM','1453091899','2016-01-17'),(12179,'37.16.0.71','01:29:20 AM','Lunes 18 de Enero de 2016 Hora: 01:29:20 AM','1453109360','2016-01-18'),(12180,'193.201.227.79','05:37:58 AM','Lunes 18 de Enero de 2016 Hora: 05:37:58 AM','1453124278','2016-01-18'),(12181,'190.223.140.23','12:35:54 PM','Lunes 18 de Enero de 2016 Hora: 12:35:54 PM','1453149354','2016-01-18'),(12182,'190.239.80.157','01:35:55 PM','Lunes 18 de Enero de 2016 Hora: 01:35:55 PM','1453152955','2016-01-18'),(12183,'180.76.15.159','07:24:43 PM','Lunes 18 de Enero de 2016 Hora: 07:24:43 PM','1453173883','2016-01-18'),(12184,'66.249.90.33','12:14:21 AM','Martes 19 de Enero de 2016 Hora: 12:14:21 AM','1453191261','2016-01-19'),(12185,'179.7.94.255','06:30:35 AM','Martes 19 de Enero de 2016 Hora: 06:30:35 AM','1453213835','2016-01-19'),(12186,'179.7.70.63','08:35:07 PM','Martes 19 de Enero de 2016 Hora: 08:35:07 PM','1453264507','2016-01-19'),(12187,'180.76.15.144','10:57:41 PM','Martes 19 de Enero de 2016 Hora: 10:57:41 PM','1453273061','2016-01-19'),(12188,'104.45.149.158','04:24:39 AM','Miércoles 20 de Enero de 2016 Hora: 04:24:39 AM','1453292679','2016-01-20'),(12189,'207.46.13.167','05:19:42 PM','Miércoles 20 de Enero de 2016 Hora: 05:19:42 PM','1453339182','2016-01-20'),(12190,'179.7.92.255','09:14:27 PM','Miércoles 20 de Enero de 2016 Hora: 09:14:27 PM','1453353267','2016-01-20'),(12191,'180.76.15.10','04:39:12 AM','Jueves 21 de Enero de 2016 Hora: 04:39:12 AM','1453379952','2016-01-21'),(12192,'181.114.121.154','05:00:31 AM','Jueves 21 de Enero de 2016 Hora: 05:00:31 AM','1453381231','2016-01-21'),(12193,'77.75.79.101','10:02:07 AM','Jueves 21 de Enero de 2016 Hora: 10:02:07 AM','1453399327','2016-01-21'),(12194,'159.203.98.206','04:29:38 PM','Jueves 21 de Enero de 2016 Hora: 04:29:38 PM','1453422578','2016-01-21'),(12195,'179.7.88.127','05:50:17 PM','Jueves 21 de Enero de 2016 Hora: 05:50:17 PM','1453427417','2016-01-21'),(12196,'157.55.39.168','06:21:37 PM','Jueves 21 de Enero de 2016 Hora: 06:21:37 PM','1453429297','2016-01-21'),(12197,'190.239.85.190','06:47:17 PM','Jueves 21 de Enero de 2016 Hora: 06:47:17 PM','1453430837','2016-01-21'),(12198,'157.55.39.167','10:18:02 PM','Jueves 21 de Enero de 2016 Hora: 10:18:02 PM','1453443482','2016-01-21'),(12199,'180.76.15.157','09:36:15 AM','Viernes 22 de Enero de 2016 Hora: 09:36:15 AM','1453484175','2016-01-22'),(12200,'181.64.192.29','02:10:12 PM','Viernes 22 de Enero de 2016 Hora: 02:10:12 PM','1453500612','2016-01-22'),(12201,'198.50.210.164','06:40:21 PM','Viernes 22 de Enero de 2016 Hora: 06:40:21 PM','1453516821','2016-01-22'),(12202,'179.7.66.40','06:44:44 PM','Viernes 22 de Enero de 2016 Hora: 06:44:44 PM','1453517084','2016-01-22'),(12203,'190.43.20.158','07:25:35 PM','Viernes 22 de Enero de 2016 Hora: 07:25:35 PM','1453519535','2016-01-22'),(12204,'5.61.40.20','07:51:03 PM','Viernes 22 de Enero de 2016 Hora: 07:51:03 PM','1453521063','2016-01-22'),(12205,'79.98.107.90','12:56:31 AM','Sabado 23 de Enero de 2016 Hora: 12:56:31 AM','1453539391','2016-01-23'),(12206,'179.7.86.232','09:14:08 AM','Sabado 23 de Enero de 2016 Hora: 09:14:08 AM','1453569248','2016-01-23'),(12207,'180.76.15.142','02:54:55 PM','Sabado 23 de Enero de 2016 Hora: 02:54:55 PM','1453589695','2016-01-23'),(12208,'207.46.13.103','06:45:55 PM','Sabado 23 de Enero de 2016 Hora: 06:45:55 PM','1453603555','2016-01-23'),(12209,'190.239.86.170','06:53:48 AM','Domingo 24 de Enero de 2016 Hora: 06:53:48 AM','1453647228','2016-01-24'),(12210,'180.76.15.34','11:24:33 AM','Domingo 24 de Enero de 2016 Hora: 11:24:33 AM','1453663473','2016-01-24'),(12211,'192.99.107.229','12:12:39 PM','Domingo 24 de Enero de 2016 Hora: 12:12:39 PM','1453666359','2016-01-24'),(12212,'190.239.74.162','01:59:36 PM','Domingo 24 de Enero de 2016 Hora: 01:59:36 PM','1453672776','2016-01-24'),(12213,'186.115.188.223','03:47:57 PM','Domingo 24 de Enero de 2016 Hora: 03:47:57 PM','1453679277','2016-01-24'),(12214,'180.76.15.163','02:07:36 AM','Lunes 25 de Enero de 2016 Hora: 02:07:36 AM','1453716456','2016-01-25'),(12215,'208.115.113.86','04:35:12 AM','Lunes 25 de Enero de 2016 Hora: 04:35:12 AM','1453725312','2016-01-25'),(12216,'179.7.86.49','07:36:11 AM','Lunes 25 de Enero de 2016 Hora: 07:36:11 AM','1453736171','2016-01-25'),(12217,'190.239.87.1','09:03:03 AM','Lunes 25 de Enero de 2016 Hora: 09:03:03 AM','1453741383','2016-01-25'),(12218,'207.46.13.70','03:20:16 PM','Lunes 25 de Enero de 2016 Hora: 03:20:16 PM','1453764016','2016-01-25'),(12219,'190.239.71.181','03:26:41 PM','Lunes 25 de Enero de 2016 Hora: 03:26:41 PM','1453764401','2016-01-25'),(12220,'132.184.0.124','06:29:08 PM','Lunes 25 de Enero de 2016 Hora: 06:29:08 PM','1453775348','2016-01-25'),(12221,'62.212.73.49','07:45:02 PM','Lunes 25 de Enero de 2016 Hora: 07:45:02 PM','1453779902','2016-01-25'),(12222,'207.46.13.186','03:03:03 AM','Martes 26 de Enero de 2016 Hora: 03:03:03 AM','1453806183','2016-01-26'),(12223,'179.7.72.4','07:38:41 PM','Martes 26 de Enero de 2016 Hora: 07:38:41 PM','1453865921','2016-01-26'),(12224,'191.237.47.72','08:26:06 AM','Miércoles 27 de Enero de 2016 Hora: 08:26:06 AM','1453911966','2016-01-27'),(12225,'180.76.15.155','11:30:19 AM','Miércoles 27 de Enero de 2016 Hora: 11:30:19 AM','1453923019','2016-01-27'),(12226,'46.4.50.83','04:51:02 PM','Miércoles 27 de Enero de 2016 Hora: 04:51:02 PM','1453942262','2016-01-27'),(12227,'179.7.95.128','07:02:48 PM','Miércoles 27 de Enero de 2016 Hora: 07:02:48 PM','1453950168','2016-01-27'),(12228,'180.76.15.148','03:14:17 AM','Jueves 28 de Enero de 2016 Hora: 03:14:17 AM','1453979657','2016-01-28'),(12229,'190.237.183.23','08:59:43 AM','Jueves 28 de Enero de 2016 Hora: 08:59:43 AM','1454000383','2016-01-28'),(12230,'181.177.235.194','10:02:04 AM','Jueves 28 de Enero de 2016 Hora: 10:02:04 AM','1454004124','2016-01-28'),(12231,'46.165.242.204','10:04:36 AM','Jueves 28 de Enero de 2016 Hora: 10:04:36 AM','1454004276','2016-01-28'),(12232,'190.239.70.26','04:35:40 PM','Jueves 28 de Enero de 2016 Hora: 04:35:40 PM','1454027740','2016-01-28'),(12233,'190.239.79.95','05:35:26 PM','Jueves 28 de Enero de 2016 Hora: 05:35:26 PM','1454031326','2016-01-28'),(12234,'190.239.70.134','06:44:54 PM','Jueves 28 de Enero de 2016 Hora: 06:44:54 PM','1454035494','2016-01-28'),(12235,'157.55.39.180','06:52:46 PM','Jueves 28 de Enero de 2016 Hora: 06:52:46 PM','1454035966','2016-01-28'),(12236,'157.55.39.45','07:52:55 PM','Jueves 28 de Enero de 2016 Hora: 07:52:55 PM','1454039575','2016-01-28'),(12237,'179.7.94.239','08:22:14 PM','Jueves 28 de Enero de 2016 Hora: 08:22:14 PM','1454041334','2016-01-28'),(12238,'69.50.216.246','05:06:24 AM','Viernes 29 de Enero de 2016 Hora: 05:06:24 AM','1454072784','2016-01-29'),(12239,'173.252.79.118','09:12:41 AM','Viernes 29 de Enero de 2016 Hora: 09:12:41 AM','1454087561','2016-01-29'),(12240,'190.236.86.178','04:15:12 PM','Viernes 29 de Enero de 2016 Hora: 04:15:12 PM','1454112912','2016-01-29'),(12241,'157.55.39.42','05:34:34 PM','Viernes 29 de Enero de 2016 Hora: 05:34:34 PM','1454117674','2016-01-29'),(12242,'179.7.86.178','07:10:57 PM','Viernes 29 de Enero de 2016 Hora: 07:10:57 PM','1454123457','2016-01-29'),(12243,'181.64.192.2','05:29:00 AM','Sabado 30 de Enero de 2016 Hora: 05:29:00 AM','1454160540','2016-01-30'),(12244,'179.7.64.178','07:41:42 PM','Sabado 30 de Enero de 2016 Hora: 07:41:42 PM','1454211702','2016-01-30'),(12245,'208.115.113.94','09:36:21 PM','Sabado 30 de Enero de 2016 Hora: 09:36:21 PM','1454218581','2016-01-30'),(12246,'190.234.106.32','05:05:35 AM','Domingo 31 de Enero de 2016 Hora: 05:05:35 AM','1454245535','2016-01-31'),(12247,'180.76.15.150','06:19:14 AM','Domingo 31 de Enero de 2016 Hora: 06:19:14 AM','1454249954','2016-01-31'),(12248,'5.196.219.112','08:33:16 AM','Domingo 31 de Enero de 2016 Hora: 08:33:16 AM','1454257996','2016-01-31'),(12249,'190.234.106.93','12:44:07 PM','Domingo 31 de Enero de 2016 Hora: 12:44:07 PM','1454273047','2016-01-31'),(12250,'180.76.15.139','05:28:09 PM','Domingo 31 de Enero de 2016 Hora: 05:28:09 PM','1454290089','2016-01-31'),(12251,'65.55.217.55','06:43:47 PM','Domingo 31 de Enero de 2016 Hora: 06:43:47 PM','1454294627','2016-01-31'),(12252,'190.239.79.60','07:04:29 PM','Domingo 31 de Enero de 2016 Hora: 07:04:29 PM','1454295869','2016-01-31'),(12253,'179.7.93.8','07:49:54 PM','Domingo 31 de Enero de 2016 Hora: 07:49:54 PM','1454298594','2016-01-31'),(12254,'65.55.218.168','10:15:32 PM','Domingo 31 de Enero de 2016 Hora: 10:15:32 PM','1454307332','2016-01-31'),(12255,'72.167.190.20','12:23:21 AM','Lunes 01 de Febrero de 2016 Hora: 12:23:21 AM','1454315001','2016-02-01'),(12256,'180.76.15.24','06:19:19 AM','Lunes 01 de Febrero de 2016 Hora: 06:19:19 AM','1454336359','2016-02-01'),(12257,'190.234.105.153','06:48:02 AM','Lunes 01 de Febrero de 2016 Hora: 06:48:02 AM','1454338082','2016-02-01'),(12258,'180.76.15.23','11:04:40 AM','Lunes 01 de Febrero de 2016 Hora: 11:04:40 AM','1454353480','2016-02-01'),(12259,'190.234.71.51','11:07:05 AM','Lunes 01 de Febrero de 2016 Hora: 11:07:05 AM','1454353625','2016-02-01'),(12260,'190.216.119.45','12:22:24 PM','Lunes 01 de Febrero de 2016 Hora: 12:22:24 PM','1454358144','2016-02-01'),(12261,'179.7.67.72','08:23:29 PM','Lunes 01 de Febrero de 2016 Hora: 08:23:29 PM','1454387009','2016-02-01'),(12262,'192.99.107.205','11:42:22 PM','Lunes 01 de Febrero de 2016 Hora: 11:42:22 PM','1454398942','2016-02-01'),(12263,'52.27.99.58','02:28:46 AM','Martes 02 de Febrero de 2016 Hora: 02:28:46 AM','1454408926','2016-02-02'),(12264,'52.34.87.146','07:46:21 AM','Martes 02 de Febrero de 2016 Hora: 07:46:21 AM','1454427981','2016-02-02'),(12265,'52.91.231.233','12:45:07 PM','Martes 02 de Febrero de 2016 Hora: 12:45:07 PM','1454445907','2016-02-02'),(12266,'185.36.100.145','01:58:43 PM','Martes 02 de Febrero de 2016 Hora: 01:58:43 PM','1454450323','2016-02-02'),(12267,'179.7.92.199','08:34:34 PM','Martes 02 de Febrero de 2016 Hora: 08:34:34 PM','1454474074','2016-02-02'),(12268,'77.75.76.166','04:20:27 AM','Miércoles 03 de Febrero de 2016 Hora: 04:20:27 AM','1454502027','2016-02-03'),(12269,'93.115.95.201','08:40:50 AM','Miércoles 03 de Febrero de 2016 Hora: 08:40:50 AM','1454517650','2016-02-03'),(12270,'77.75.78.167','10:29:51 AM','Miércoles 03 de Febrero de 2016 Hora: 10:29:51 AM','1454524191','2016-02-03'),(12271,'77.75.78.171','12:28:12 PM','Miércoles 03 de Febrero de 2016 Hora: 12:28:12 PM','1454531292','2016-02-03'),(12272,'180.76.15.27','02:02:04 PM','Miércoles 03 de Febrero de 2016 Hora: 02:02:04 PM','1454536924','2016-02-03'),(12273,'176.126.252.11','08:19:21 PM','Miércoles 03 de Febrero de 2016 Hora: 08:19:21 PM','1454559561','2016-02-03'),(12274,'77.247.181.165','12:17:00 AM','Jueves 04 de Febrero de 2016 Hora: 12:17:00 AM','1454573820','2016-02-04'),(12275,'77.75.79.17','07:29:33 AM','Jueves 04 de Febrero de 2016 Hora: 07:29:33 AM','1454599773','2016-02-04'),(12276,'69.58.178.56','11:02:05 AM','Jueves 04 de Febrero de 2016 Hora: 11:02:05 AM','1454612525','2016-02-04'),(12277,'179.7.81.2','08:38:38 PM','Jueves 04 de Febrero de 2016 Hora: 08:38:38 PM','1454647118','2016-02-04'),(12278,'89.145.95.42','06:51:32 PM','Viernes 05 de Febrero de 2016 Hora: 06:51:32 PM','1454727092','2016-02-05'),(12279,'179.7.72.123','07:13:20 PM','Viernes 05 de Febrero de 2016 Hora: 07:13:20 PM','1454728400','2016-02-05'),(12280,'180.76.15.158','11:41:35 PM','Viernes 05 de Febrero de 2016 Hora: 11:41:35 PM','1454744495','2016-02-05'),(12281,'179.7.69.155','06:34:14 AM','Sabado 06 de Febrero de 2016 Hora: 06:34:14 AM','1454769254','2016-02-06'),(12282,'207.46.13.133','01:50:32 PM','Sabado 06 de Febrero de 2016 Hora: 01:50:32 PM','1454795432','2016-02-06'),(12283,'181.224.231.231','04:11:27 PM','Sabado 06 de Febrero de 2016 Hora: 04:11:27 PM','1454803887','2016-02-06'),(12284,'181.64.192.172','06:16:38 PM','Sabado 06 de Febrero de 2016 Hora: 06:16:38 PM','1454811398','2016-02-06'),(12285,'179.7.89.27','07:20:24 PM','Sabado 06 de Febrero de 2016 Hora: 07:20:24 PM','1454815224','2016-02-06'),(12286,'82.223.157.53','08:34:10 AM','Domingo 07 de Febrero de 2016 Hora: 08:34:10 AM','1454862850','2016-02-07'),(12287,'54.85.198.156','08:38:25 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:25 AM','1454863105','2016-02-07'),(12288,'52.5.69.31','08:38:39 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:39 AM','1454863119','2016-02-07'),(12289,'54.174.179.157','08:38:39 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:39 AM','1454863119','2016-02-07'),(12290,'54.173.9.10','08:38:39 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:39 AM','1454863119','2016-02-07'),(12291,'52.6.5.122','08:38:39 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:39 AM','1454863119','2016-02-07'),(12292,'52.0.86.232','08:38:39 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:39 AM','1454863119','2016-02-07'),(12293,'52.7.46.16','08:38:40 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:40 AM','1454863120','2016-02-07'),(12294,'52.5.133.46','08:38:41 AM','Domingo 07 de Febrero de 2016 Hora: 08:38:41 AM','1454863121','2016-02-07'),(12295,'5.149.254.109','09:26:42 AM','Domingo 07 de Febrero de 2016 Hora: 09:26:42 AM','1454866002','2016-02-07'),(12296,'190.239.77.145','11:12:18 AM','Domingo 07 de Febrero de 2016 Hora: 11:12:18 AM','1454872338','2016-02-07'),(12297,'84.204.166.219','11:15:56 AM','Domingo 07 de Febrero de 2016 Hora: 11:15:56 AM','1454872556','2016-02-07'),(12298,'179.7.89.174','08:43:11 PM','Domingo 07 de Febrero de 2016 Hora: 08:43:11 PM','1454906591','2016-02-07'),(12299,'180.76.15.13','02:41:29 AM','Lunes 08 de Febrero de 2016 Hora: 02:41:29 AM','1454928089','2016-02-08'),(12300,'180.76.15.31','02:41:30 AM','Lunes 08 de Febrero de 2016 Hora: 02:41:30 AM','1454928090','2016-02-08'),(12301,'52.36.23.58','08:20:05 AM','Lunes 08 de Febrero de 2016 Hora: 08:20:05 AM','1454948405','2016-02-08'),(12302,'180.76.15.136','08:22:35 AM','Lunes 08 de Febrero de 2016 Hora: 08:22:35 AM','1454948555','2016-02-08'),(12303,'173.252.75.117','10:03:35 AM','Lunes 08 de Febrero de 2016 Hora: 10:03:35 AM','1454954615','2016-02-08'),(12304,'173.252.102.115','10:05:12 AM','Lunes 08 de Febrero de 2016 Hora: 10:05:12 AM','1454954712','2016-02-08'),(12305,'192.99.107.214','12:01:26 PM','Lunes 08 de Febrero de 2016 Hora: 12:01:26 PM','1454961686','2016-02-08'),(12306,'66.249.75.225','12:27:30 PM','Lunes 08 de Febrero de 2016 Hora: 12:27:30 PM','1454963250','2016-02-08'),(12307,'179.7.82.96','08:38:35 PM','Lunes 08 de Febrero de 2016 Hora: 08:38:35 PM','1454992715','2016-02-08'),(12308,'180.76.15.162','03:39:39 AM','Martes 09 de Febrero de 2016 Hora: 03:39:39 AM','1455017979','2016-02-09'),(12309,'66.249.75.29','03:54:17 AM','Martes 09 de Febrero de 2016 Hora: 03:54:17 AM','1455018857','2016-02-09'),(12310,'208.109.181.201','04:28:24 AM','Domingo 14 de Febrero de 2016 Hora: 04:28:24 AM','1455452904','2016-02-14'),(12311,'66.249.66.146','07:14:45 AM','Domingo 14 de Febrero de 2016 Hora: 07:14:45 AM','1455462885','2016-02-14'),(12312,'66.249.66.141','07:31:23 AM','Domingo 14 de Febrero de 2016 Hora: 07:31:23 AM','1455463883','2016-02-14'),(12313,'66.249.66.35','08:28:12 AM','Domingo 14 de Febrero de 2016 Hora: 08:28:12 AM','1455467292','2016-02-14'),(12314,'190.239.87.230','09:21:57 AM','Domingo 14 de Febrero de 2016 Hora: 09:21:57 AM','1455470517','2016-02-14'),(12315,'179.7.93.97','10:00:43 AM','Domingo 14 de Febrero de 2016 Hora: 10:00:43 AM','1455472843','2016-02-14'),(12316,'77.75.78.162','11:06:32 AM','Domingo 14 de Febrero de 2016 Hora: 11:06:32 AM','1455476792','2016-02-14'),(12317,'66.249.66.41','12:28:39 PM','Domingo 14 de Febrero de 2016 Hora: 12:28:39 PM','1455481719','2016-02-14'),(12318,'66.249.66.136','01:27:16 PM','Domingo 14 de Febrero de 2016 Hora: 01:27:16 PM','1455485236','2016-02-14'),(12319,'72.10.193.114','01:49:52 PM','Domingo 14 de Febrero de 2016 Hora: 01:49:52 PM','1455486592','2016-02-14'),(12320,'67.205.95.172','03:37:38 PM','Domingo 14 de Febrero de 2016 Hora: 03:37:38 PM','1455493058','2016-02-14'),(12321,'128.30.52.73','04:48:53 PM','Domingo 14 de Febrero de 2016 Hora: 04:48:53 PM','1455497333','2016-02-14'),(12322,'128.30.52.70','04:48:55 PM','Domingo 14 de Febrero de 2016 Hora: 04:48:55 PM','1455497335','2016-02-14'),(12323,'128.30.52.96','04:48:56 PM','Domingo 14 de Febrero de 2016 Hora: 04:48:56 PM','1455497336','2016-02-14'),(12324,'128.30.52.71','04:49:07 PM','Domingo 14 de Febrero de 2016 Hora: 04:49:07 PM','1455497347','2016-02-14');

/*Table structure for table `contenido` */

DROP TABLE IF EXISTS `contenido`;

CREATE TABLE `contenido` (
  `ccodcontenido` varchar(24) NOT NULL,
  `ccodpage` varchar(8) NOT NULL,
  `ccodcategoria` varchar(1) NOT NULL,
  `ccodmodulo` varchar(4) NOT NULL DEFAULT '',
  `ccodestcontenido` varchar(4) NOT NULL DEFAULT '',
  `cnomcontenido` varchar(255) NOT NULL,
  `camicontenido` varchar(80) NOT NULL,
  `crescontenido` longtext,
  `ctagcontenido` varchar(255) DEFAULT NULL,
  `ccodinterno` varchar(30) DEFAULT NULL,
  `ccodmoneda` varchar(1) NOT NULL,
  `nstocontenido` decimal(12,3) NOT NULL DEFAULT '0.000',
  `cimgcontenido` varchar(150) DEFAULT NULL,
  `cestcontenido` varchar(1) NOT NULL DEFAULT '0',
  `cestcomenface` varchar(1) DEFAULT '0' COMMENT 'comentario facebook',
  `ctipcontenido` varchar(1) NOT NULL DEFAULT '0',
  `curlcontenido` varchar(255) DEFAULT NULL,
  `nviscontenido` int(9) NOT NULL DEFAULT '0' COMMENT 'visitas a este articulo',
  `cestcomentario` varchar(1) NOT NULL DEFAULT '0' COMMENT 'Habilitar Comentarios',
  `cestcompartirredes` varchar(1) DEFAULT '0' COMMENT 'Habilitar Compartir Redes Sociales',
  `nnrocomentario` int(9) NOT NULL DEFAULT '0',
  `dfeccontenido` datetime NOT NULL,
  `ccodusuario` varchar(10) NOT NULL DEFAULT '',
  `dfecmodifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `precio` decimal(11,0) DEFAULT NULL,
  `precio_oferta` decimal(11,0) DEFAULT NULL,
  `garantia` varchar(200) DEFAULT NULL,
  `codigo_curso` varchar(30) DEFAULT NULL,
  `duracion_curso` varchar(20) DEFAULT NULL,
  `inicioclases` varchar(150) DEFAULT NULL,
  `modalidad_curso` varchar(100) DEFAULT NULL,
  `cordcontenido` int(5) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `url_video` varchar(1200) DEFAULT NULL,
  `idexcel` varchar(40) DEFAULT NULL COMMENT 'de la tabla excel_archivos',
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenido` */

insert  into `contenido`(`ccodcontenido`,`ccodpage`,`ccodcategoria`,`ccodmodulo`,`ccodestcontenido`,`cnomcontenido`,`camicontenido`,`crescontenido`,`ctagcontenido`,`ccodinterno`,`ccodmoneda`,`nstocontenido`,`cimgcontenido`,`cestcontenido`,`cestcomenface`,`ctipcontenido`,`curlcontenido`,`nviscontenido`,`cestcomentario`,`cestcompartirredes`,`nnrocomentario`,`dfeccontenido`,`ccodusuario`,`dfecmodifica`,`precio`,`precio_oferta`,`garantia`,`codigo_curso`,`duracion_curso`,`inicioclases`,`modalidad_curso`,`cordcontenido`,`estado`,`url_video`,`idexcel`) values ('12172810151210182835HXGP','12172810','1','1100','1101','Quienes Somos','quienes-somos','Puertas y Creaciones. Somos fabricantes de <span style=\"font-weight: bold;\">puertas de madera</span>,<span style=\"font-weight: bold;\"> portones de madera</span>, <span style=\"font-weight: bold;\">ventanas de madera </span>y <span style=\"font-weight: bold;\">Reposteros de madera</span> Siguiendo una estricta línea de calidad, en la utilización del tipo de madera adecuada para cada tipo de trabajo.<div><br></div><div>Puertas y Creaciones. Tambien nos dedicamos a los muebles en&nbsp;<span style=\"font-weight: bold;\">Melamines&nbsp;&nbsp;</span>y todo tipo de trabajos en&nbsp;<span style=\"font-weight: bold;\">drywall</span>.</div>','',NULL,'','0.000','/imagen/12172810/puertas-madera-y-ventanas-madera.jpg','1','','1','',243,'0','0',0,'2015-12-10 00:00:00','100','2016-02-14 23:15:21','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'-2',NULL,NULL),('12172810151224155614JYVC','12172810','1','1100','1101','Puerta de Madera modelo 6','puerta-de-madera-modelo-6','','',NULL,'','0.000','/imagen/12172810/puerta8.jpg','1','1','1','',6,'0','1',0,'2015-12-24 00:00:00','100','2016-02-15 08:12:09','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'-2',NULL,NULL),('121728101601030355457G6C','12172810','1','1100','1101','Puerta de Madera modelo 1','puerta-de-madera-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00013.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 08:11:45','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103035803RIYD','12172810','1','1100','1101','Puerta de Madera modelo 4','puerta-de-madera-modelo-4','','',NULL,'','0.000','/imagen/12172810/1401296491135.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 08:12:01','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103035936MR8I','12172810','1','1100','1101','Puerta de Madera modelo 5','puerta-de-madera-modelo-5','','',NULL,'','0.000','/imagen/12172810/cam00016.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 08:11:38','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('121728101601030402398D0O','12172810','1','1100','1101','Puerta de Madera modelo 2','puerta-de-madera-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00125.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 08:11:53','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103040345F1V8','12172810','1','1100','1101','Puerta de Madera modelo 3','puerta-de-madera-modelo-3','','',NULL,'','0.000','/imagen/12172810/1436026774458.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 08:11:31','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103040547L9Y5','12172810','1','1100','1101','Ventanas de madera modelo 1','ventanas-de-madera-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00082.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:31:50','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('1217281016010304073698TM','12172810','1','1100','1101','Ventanas de madera modelo 2','ventanas-de-madera-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00175.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 07:58:13','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103041225XSQO','12172810','1','1100','1101','Reposteros de madera modelo 1','reposteros-de-madera-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00263.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 07:45:28','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103041630YOEM','12172810','1','1100','1101','Muebles modelo 1','muebles-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00196.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 07:42:58','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('121728101601030438139N7C','12172810','1','1100','1101','Muebles modelo 2','muebles-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00252.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:36:06','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103044433SNDE','12172810','1','1100','1101','Reposteros de madera modelo 2','reposteros-de-madera-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00264.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-15 07:58:05','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103044800B70R','12172810','1','1100','1101','Melamine modelo 1','melamine-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00096.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:32:25','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103044937BZ87','12172810','1','1100','1101','Melamine modelo 2','melamine-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00100.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:33:25','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103045105DLSJ','12172810','1','1100','1101','Melamine modelo 3','melamine-modelo-3','','',NULL,'','0.000','/imagen/12172810/cam00256.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:27:17','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160103045236T4SF','12172810','1','1100','1101','Melamine modelo 4','melamine-modelo-4','','',NULL,'','0.000','/imagen/12172810/cam00265.jpg','1','','1','',0,'0','0',0,'2016-01-03 00:00:00','100','2016-02-14 22:35:54','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160107042018BZKA','12172810','1','1100','1101','Reposteros de madera modelo 3','reposteros-de-madera-modelo-3','','',NULL,'','0.000','/imagen/12172810/cam00306.jpg','1','','1','',0,'0','0',0,'2016-01-07 00:00:00','100','2016-02-14 22:30:34','0','0','3 Meses','','1 Mes','1970-01-01','1',3,'1',NULL,NULL),('121728101601070422430FZG','12172810','1','1100','1101','Reposteros de madera modelo 4','reposteros-de-madera-modelo-4','','',NULL,'','0.000','/imagen/12172810/cam00307.jpg','1','','1','',0,'0','0',0,'2016-01-07 00:00:00','100','2016-02-14 22:30:10','0','0','3 Meses','','1 Mes','1970-01-01','1',4,'1',NULL,NULL),('12172810160107042509G5TH','12172810','1','1100','1101','Melamine modelo 5','melamine-modelo-5','','',NULL,'','0.000','/imagen/12172810/cam00135.jpg','1','','1','',0,'0','0',0,'2016-01-07 00:00:00','100','2016-02-14 22:25:35','0','0','3 Meses','','1 Mes','1970-01-01','1',5,'1',NULL,NULL),('1217281016010704283040OX','12172810','1','1100','1101','Melamine modelo 6','melamine-modelo-6','','',NULL,'','0.000','/imagen/12172810/cam00140.jpg','1','','1','',0,'0','0',0,'2016-01-07 00:00:00','100','2016-02-14 22:25:52','0','0','3 Meses','','1 Mes','1970-01-01','1',6,'1',NULL,NULL),('12172810160109024756DUQV','12172810','1','1100','1101','drywall modelo 1','drywall-modelo-1','','',NULL,'','0.000','/imagen/12172810/cam00311.jpg','1','','1','',0,'0','0',0,'2016-01-09 00:00:00','100','2016-02-14 22:28:16','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160109024910TLBU','12172810','1','1100','1101','drywall modelo 2','drywall-modelo-2','','',NULL,'','0.000','/imagen/12172810/cam00317.jpg','1','','1','',0,'0','0',0,'2016-01-09 00:00:00','100','2016-02-14 22:28:27','0','0','3 Meses','','1 Mes','1970-01-01','1',1,'1',NULL,NULL),('12172810160109025023MUDQ','12172810','1','1100','1101','drywall modelo 3','drywall-modelo-3','','',NULL,'','0.000','/imagen/12172810/cam00315.jpg','1','','1','',0,'0','0',0,'2016-01-09 00:00:00','100','2016-02-14 22:27:54','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160109025158XNE2','12172810','1','1100','1101','drywall modelo 4','drywall-modelo-4','','',NULL,'','0.000','/imagen/12172810/cam00318.jpg','1','','1','',0,'0','0',0,'2016-01-09 00:00:00','100','2016-02-14 22:28:05','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160115034732YX6C','12172810','1','1100','1101','Puerta de Madera modelo 7','puerta-de-madera-modelo-7','','',NULL,'','0.000','/imagen/12172810/cam00250.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-15 07:41:25','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('121728101601150353177RW3','12172810','1','1100','1101','Melamine modelo 7','melamine-modelo-7','','',NULL,'','0.000','/imagen/12172810/cam00068.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-14 22:25:00','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('1217281016011503551922PV','12172810','1','1100','1101','Melamine modelo 8','melamine-modelo-8','','',NULL,'','0.000','/imagen/12172810/1403299743055.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-14 22:25:15','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160115040005LMQU','12172810','1','1100','1101','Reposteros de madera modelo 5','reposteros-de-madera-modelo-5','','',NULL,'','0.000','/imagen/12172810/getattachment%20(2).jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-14 22:38:53','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160115040852CIWA','12172810','1','1100','1101','Melamines modelo 6','melamines-modelo-6','','',NULL,'','0.000','/imagen/12172810/cam00139.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-15 08:10:43','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160115041529PHTI','12172810','1','1100','1101','Muebles modelo 3','muebles-modelo-3','','',NULL,'','0.000','/imagen/12172810/cam00140.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-15 07:43:16','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160115042716ZDH1','12172810','1','1100','1101','Puerta de Madera modelo 8','puerta-de-madera-modelo-8','','',NULL,'','0.000','/imagen/12172810/1403975375441.jpg','1','','1','',0,'0','0',0,'2016-01-15 00:00:00','100','2016-02-15 07:43:31','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('121728101601220355027VGI','12172810','1','1100','1101','drywall modelo 5','drywall-modelo-5','','',NULL,'','0.000','/imagen/12172810/getattachment%20(3).jpg','1','','1','',0,'0','0',0,'2016-01-22 00:00:00','100','2016-02-15 07:45:59','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160122035626R3JT','12172810','1','1100','1101','drywall modelo 6','drywall-modelo-6','','',NULL,'','0.000','/imagen/12172810/getattachment%20(1).jpg','1','','1','',0,'0','0',0,'2016-01-22 00:00:00','100','2016-02-15 08:10:05','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160122035816DE9C','12172810','1','1100','1101','drywall modelo 7','drywall-modelo-7','','',NULL,'','0.000','/imagen/12172810/cam00105.jpg','1','','1','',0,'0','0',0,'2016-01-22 00:00:00','100','2016-02-14 21:58:29','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL),('12172810160122035917WC86','12172810','1','1100','1101','drywall modelo 8','drywall-modelo-8','','',NULL,'','0.000','/imagen/12172810/cam00104.jpg','1','','1','',0,'0','0',0,'2016-01-22 00:00:00','100','2016-02-14 21:58:37','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL);

/*Table structure for table `contenidodetalle` */

DROP TABLE IF EXISTS `contenidodetalle`;

CREATE TABLE `contenidodetalle` (
  `ccodcontenido` varchar(24) NOT NULL,
  `cdetcontenido` longtext NOT NULL,
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenidodetalle` */

insert  into `contenidodetalle`(`ccodcontenido`,`cdetcontenido`) values ('12172810151210182835HXGP','                                                                                                                                                                                                                                                                                                                                                                                            <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif;\"><br></p><p style=\"font-family: Verdana, Arial, Helvetica, sans-serif;\"><span style=\"font-size: small;\">&nbsp;</span></p>                                                                                                                                                                                                                                                                                                                                                                                                               '),('12172810151224155614JYVC',''),('121728101601030355457G6C',''),('12172810160103035803RIYD',''),('12172810160103035936MR8I',''),('121728101601030402398D0O',''),('12172810160103040345F1V8',''),('12172810160103040547L9Y5',''),('1217281016010304073698TM',''),('12172810160103041225XSQO',''),('12172810160103041630YOEM',''),('121728101601030438139N7C',''),('12172810160103044433SNDE',''),('12172810160103044800B70R',''),('12172810160103044937BZ87',''),('12172810160103045105DLSJ',''),('12172810160103045236T4SF',''),('12172810160107042018BZKA',''),('121728101601070422430FZG',''),('12172810160107042509G5TH',''),('1217281016010704283040OX',''),('12172810160109024756DUQV',''),('12172810160109024910TLBU',''),('12172810160109025023MUDQ',''),('12172810160109025158XNE2',''),('12172810160115034732YX6C',''),('121728101601150353177RW3',''),('1217281016011503551922PV',''),('12172810160115040005LMQU',''),('12172810160115040852CIWA',''),('12172810160115041529PHTI',''),('12172810160115042716ZDH1',''),('121728101601220355027VGI',''),('12172810160122035626R3JT',''),('12172810160122035816DE9C',''),('12172810160122035917WC86','');

/*Table structure for table `contenidogaleria` */

DROP TABLE IF EXISTS `contenidogaleria`;

CREATE TABLE `contenidogaleria` (
  `ccodgaleria` int(10) DEFAULT NULL,
  `ccodcontenido` varchar(72) DEFAULT NULL,
  `ccodmodulo` varchar(12) DEFAULT NULL,
  `cnomgaleria` varchar(1500) DEFAULT NULL,
  `cdesgaleria` text,
  `cimggaleria` varchar(600) DEFAULT NULL,
  `curlgaleria` varchar(450) DEFAULT NULL,
  `clatitud` varchar(90) DEFAULT NULL,
  `clongitud` varchar(90) DEFAULT NULL,
  `cordgaleria` int(6) DEFAULT NULL,
  `ccodusuario` varchar(30) DEFAULT NULL,
  `dfecmodifica` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contenidogaleria` */

/*Table structure for table `contenidounidad` */

DROP TABLE IF EXISTS `contenidounidad`;

CREATE TABLE `contenidounidad` (
  `ccodunidad` int(78) NOT NULL,
  `ccodcontenido` varchar(72) DEFAULT NULL,
  `cnomunidad` varchar(90) DEFAULT NULL,
  `nfacunidad` decimal(11,0) DEFAULT NULL,
  `nstounidad` decimal(11,0) DEFAULT NULL,
  `npreunidad` decimal(11,0) DEFAULT NULL,
  `npreoferta` decimal(11,0) DEFAULT NULL,
  `cestunidad` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`ccodunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contenidounidad` */

/*Table structure for table `doctorresponde` */

DROP TABLE IF EXISTS `doctorresponde`;

CREATE TABLE `doctorresponde` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `id_noticia` varchar(24) COLLATE utf8_bin DEFAULT NULL COMMENT 'viene de codigo contenido',
  `nombre` char(50) COLLATE utf8_bin DEFAULT NULL,
  `comentario` longtext COLLATE utf8_bin,
  `fechacorta` date NOT NULL,
  `fechalarga` varchar(80) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(400) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `aceptado` tinyint(1) NOT NULL,
  `imagenfoto` varchar(250) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL,
  `mostrarportada` int(4) NOT NULL,
  `rutaimagen` varchar(200) COLLATE utf8_bin NOT NULL,
  `idcate` tinyint(4) NOT NULL,
  `respuestaenviada` int(2) NOT NULL,
  `idsubcate` tinyint(4) NOT NULL,
  `procedencia` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_cliente` tinyint(4) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_bin NOT NULL,
  `idSubSubcate` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=983 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `doctorresponde` */

/*Table structure for table `estiloclases` */

DROP TABLE IF EXISTS `estiloclases`;

CREATE TABLE `estiloclases` (
  `ccodclase` int(11) NOT NULL AUTO_INCREMENT,
  `ccodplantilla` varchar(6) DEFAULT NULL,
  `cnomclase` varchar(50) DEFAULT NULL,
  `cdesclase` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ccodclase`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `estiloclases` */

insert  into `estiloclases`(`ccodclase`,`ccodplantilla`,`cnomclase`,`cdesclase`) values (1,'0001','inicio','inicio'),(2,'0001','contenido','contenido'),(3,'0001','portada-laterales','portada-laterales'),(4,'0001','saludos','saludos'),(5,'0001','portada','portada'),(6,'0001','vacio','vacio'),(7,'0001','stylo_col_4','stylo_col_4'),(8,'0001','fondocate','fondocate'),(9,'0001','art_listado_01','art_listado_01'),(10,'0001','enlaces_pie','enlaces_pie'),(11,'0001','lista_hori_1','lista_hori_1'),(13,'0001','lista_hori_1_titulo','lista_hori_1_titulo'),(14,'0001','titulo_portada','titulo_portada'),(15,'0001','portada_Resumen','portada_Resumen'),(16,NULL,'cuadrado_titulo','cuadrado_titulo');

/*Table structure for table `estilocontenido` */

DROP TABLE IF EXISTS `estilocontenido`;

CREATE TABLE `estilocontenido` (
  `ccodestcontenido` varchar(4) NOT NULL,
  `ccodmodulo` varchar(4) NOT NULL,
  `cnomestcontenido` varchar(100) NOT NULL,
  `cimgestcontenido` varchar(50) NOT NULL,
  `cestestcontenido` char(1) NOT NULL,
  `cincestcontenido` varchar(50) NOT NULL,
  PRIMARY KEY (`ccodestcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `estilocontenido` */

insert  into `estilocontenido`(`ccodestcontenido`,`ccodmodulo`,`cnomestcontenido`,`cimgestcontenido`,`cestestcontenido`,`cincestcontenido`) values ('1101','1100','Imagen derecha','estilo_imgderecha.gif','1','articuloderecha.php'),('1102','1100','Imagen izquierda','estilo_imgizquierda.gif','1','articuloizquierda.php'),('1103','1100','Imagen centro','estilo_imgcentro.gif','1','articulocentro.php'),('1104','1100','Pagina','estilo_imgpagina.gif','1','articulopagina.php'),('1201','1200','Imagen derecha','estilo_imgderecha.gif','1','catalogoderecha.php'),('1202','1200','Imagen izquierda','estilo_imgizquierda.gif','1','catalogoizquierda.php'),('1203','1200','Imagen Central','estilo_imgcentro.gif','1','catalogocentro.php'),('1901','1300','Imagen derecha','estilo_imgderecha.gif','1','paquetesderecha.php'),('1902','1300','Imagen izquierda','estilo_imgizquierda.gif','1','paquetesizquierda.php'),('1903','1300','Imagen centro','estilo_imgcentro.gif','1','paquetescentro.php'),('2001','1500','Vista de Anuncio','vistanuncio.gif','1','anunciosver.php'),('1401','1400','','','','articulocentro.php');

/*Table structure for table `estilopagina` */

DROP TABLE IF EXISTS `estilopagina`;

CREATE TABLE `estilopagina` (
  `ccodplantilla` varchar(6) NOT NULL DEFAULT '',
  `cnomplantilla` varchar(50) NOT NULL DEFAULT '',
  `crutaplan` varchar(30) NOT NULL,
  `cestplantilla` char(1) NOT NULL DEFAULT '',
  `cimgplantilla` varchar(100) NOT NULL DEFAULT '',
  `ccodpage` varchar(8) DEFAULT NULL,
  `webancho` varchar(4) NOT NULL DEFAULT '',
  `webfondocolor` varchar(7) NOT NULL DEFAULT '',
  `webfondoimagen` varchar(100) NOT NULL DEFAULT '',
  `webfondorepetir` varchar(1) NOT NULL,
  `webestilo` char(1) NOT NULL DEFAULT '',
  `webtexto` varchar(7) NOT NULL,
  `webmsup` varchar(4) NOT NULL,
  `webminf` varchar(4) NOT NULL,
  `cabeceraalto` varchar(4) NOT NULL DEFAULT '',
  `cabecerafondocolor` varchar(7) NOT NULL DEFAULT '',
  `cabecerafondoimagen` varchar(100) NOT NULL DEFAULT '',
  `cabemenualto` varchar(4) NOT NULL DEFAULT '',
  `cabemenufondocolor` varchar(7) NOT NULL DEFAULT '',
  `cabemenufondoimagen` varchar(100) NOT NULL DEFAULT '',
  `cabecontenidoalto` varchar(4) NOT NULL,
  `cabecontenidofondocolor` varchar(7) NOT NULL,
  `cabecontenidofondoimagen` varchar(50) NOT NULL,
  `columnaizqancho` varchar(4) NOT NULL DEFAULT '',
  `cuerpofondocolor` varchar(7) NOT NULL,
  `cuerpofondoimagen` varchar(50) NOT NULL,
  `columnacenancho` varchar(4) NOT NULL DEFAULT '',
  `columnaderancho` varchar(4) NOT NULL DEFAULT '',
  `piecontenidoalto` varchar(4) NOT NULL,
  `piecontenidofondocolor` varchar(7) NOT NULL,
  `piecontenidofondoimagen` varchar(50) NOT NULL,
  `piemenualto` varchar(4) NOT NULL DEFAULT '',
  `piemenufondocolor` varchar(7) NOT NULL DEFAULT '',
  `piemenufondoimagen` varchar(100) NOT NULL DEFAULT '',
  `piealto` varchar(4) NOT NULL DEFAULT '',
  `piefondocolor` varchar(7) NOT NULL DEFAULT '',
  `piefondoimagen` varchar(100) NOT NULL DEFAULT '',
  `menusupalinea` varchar(7) NOT NULL,
  `menusupmizq` varchar(4) NOT NULL,
  `menusupmder` varchar(4) NOT NULL,
  `menusupancho` varchar(4) NOT NULL,
  `menusupalto` varchar(4) NOT NULL,
  `menusupcolor` varchar(7) NOT NULL,
  `menusupimagen` varchar(50) NOT NULL,
  `menusuptexto` varchar(7) NOT NULL,
  `menusupactcolor` varchar(7) NOT NULL,
  `menusupactimagen` varchar(50) NOT NULL,
  `menusupacttexto` varchar(7) NOT NULL,
  `menupiealinea` varchar(7) NOT NULL,
  `menupiemizq` varchar(4) NOT NULL,
  `menupiemder` varchar(4) NOT NULL,
  `menupieancho` varchar(4) NOT NULL,
  `menupiealto` varchar(4) NOT NULL,
  `menupiecolor` varchar(7) NOT NULL,
  `menupieimagen` varchar(50) NOT NULL,
  `menupietexto` varchar(7) NOT NULL,
  `menupieactcolor` varchar(7) NOT NULL,
  `menupieactimagen` varchar(50) NOT NULL,
  `menupieacttexto` varchar(7) NOT NULL,
  `menuhortituloalto` varchar(4) NOT NULL,
  `menuhortitulocolor` varchar(7) NOT NULL,
  `menuhortituloimagen` varchar(50) NOT NULL,
  `menuhortitulotexto` varchar(7) NOT NULL,
  `menuhoritemalto` varchar(4) NOT NULL,
  `menuhoritemcolor` varchar(7) NOT NULL,
  `menuhoritemimagen` varchar(50) NOT NULL,
  `menuhoritemtexto` varchar(7) NOT NULL,
  `menuhoritemactcolor` varchar(7) NOT NULL,
  `menuhoritemactimagen` varchar(50) NOT NULL,
  `menuhoritemacttexto` varchar(7) NOT NULL,
  `menuhorpiealto` varchar(4) NOT NULL,
  `menuhorpiecolor` varchar(7) NOT NULL,
  `menuhorpieimagen` varchar(50) NOT NULL,
  `hometituloalto` varchar(4) NOT NULL,
  `hometitulocolor` varchar(7) NOT NULL,
  `hometituloimagen` varchar(30) NOT NULL,
  `hometitulotxtcolor` varchar(7) NOT NULL,
  `ccodusuario` varchar(10) NOT NULL DEFAULT '',
  `dfecmodifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo_slider_banner` varchar(30) DEFAULT NULL,
  `propaganda_1_1` varchar(300) DEFAULT NULL,
  `propaganda_1_2` varchar(300) DEFAULT NULL,
  `propaganda_1_3` varchar(300) DEFAULT NULL,
  `titulo_propaganda_1_1` varchar(300) DEFAULT NULL,
  `titulo_propaganda_1_2` varchar(300) DEFAULT NULL,
  `titulo_propaganda_1_3` varchar(300) DEFAULT NULL,
  `texto_propaganda_1_1` longtext,
  `texto_propaganda_1_2` longtext,
  `texto_propaganda_1_3` longtext,
  `sBaseVirtual0` varchar(800) DEFAULT NULL COMMENT 'ubicación de la carpeta de recursos web',
  `sBase0` varchar(1200) DEFAULT NULL COMMENT 'ruta real / física',
  `sName0` varchar(100) DEFAULT NULL COMMENT 'titulo 1 assetmanager',
  `ampliarimagen_portada` varchar(2) DEFAULT NULL COMMENT 'para saber si se amplia imagen en la portada o se muestra como una noticia',
  `ampliarvideo_portada` varchar(2) DEFAULT NULL COMMENT 'para saber si se amplia Video en la portada o se muestra como una noticia',
  PRIMARY KEY (`ccodplantilla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `estilopagina` */

insert  into `estilopagina`(`ccodplantilla`,`cnomplantilla`,`crutaplan`,`cestplantilla`,`cimgplantilla`,`ccodpage`,`webancho`,`webfondocolor`,`webfondoimagen`,`webfondorepetir`,`webestilo`,`webtexto`,`webmsup`,`webminf`,`cabeceraalto`,`cabecerafondocolor`,`cabecerafondoimagen`,`cabemenualto`,`cabemenufondocolor`,`cabemenufondoimagen`,`cabecontenidoalto`,`cabecontenidofondocolor`,`cabecontenidofondoimagen`,`columnaizqancho`,`cuerpofondocolor`,`cuerpofondoimagen`,`columnacenancho`,`columnaderancho`,`piecontenidoalto`,`piecontenidofondocolor`,`piecontenidofondoimagen`,`piemenualto`,`piemenufondocolor`,`piemenufondoimagen`,`piealto`,`piefondocolor`,`piefondoimagen`,`menusupalinea`,`menusupmizq`,`menusupmder`,`menusupancho`,`menusupalto`,`menusupcolor`,`menusupimagen`,`menusuptexto`,`menusupactcolor`,`menusupactimagen`,`menusupacttexto`,`menupiealinea`,`menupiemizq`,`menupiemder`,`menupieancho`,`menupiealto`,`menupiecolor`,`menupieimagen`,`menupietexto`,`menupieactcolor`,`menupieactimagen`,`menupieacttexto`,`menuhortituloalto`,`menuhortitulocolor`,`menuhortituloimagen`,`menuhortitulotexto`,`menuhoritemalto`,`menuhoritemcolor`,`menuhoritemimagen`,`menuhoritemtexto`,`menuhoritemactcolor`,`menuhoritemactimagen`,`menuhoritemacttexto`,`menuhorpiealto`,`menuhorpiecolor`,`menuhorpieimagen`,`hometituloalto`,`hometitulocolor`,`hometituloimagen`,`hometitulotxtcolor`,`ccodusuario`,`dfecmodifica`,`tipo_slider_banner`,`propaganda_1_1`,`propaganda_1_2`,`propaganda_1_3`,`titulo_propaganda_1_1`,`titulo_propaganda_1_2`,`titulo_propaganda_1_3`,`texto_propaganda_1_1`,`texto_propaganda_1_2`,`texto_propaganda_1_3`,`sBaseVirtual0`,`sBase0`,`sName0`,`ampliarimagen_portada`,`ampliarvideo_portada`) values ('0001','puertasycreaciones','','1','tp0001.jpg','12172810','980','00142f','bg.jpg','Z','2','000000','0','0','125','','cabecera.png','40','ffffff','menucabecera.jpg','','FFFFFF','','0','','contenido.png','730','250','','','','40','ffffff','menucabecera.jpg','80','ffffff','','right','10','10','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','000000','right','0','0','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','191919','40','ffffff','menuizqtitulo.jpg','ffffff','30','ff7f00','','ffffff','5fbf00','','00ffff','0','FFFFFF','','35','005fbf','','ffffff','11061212','2011-12-28 00:00:00','jFlow','imagen/Venta-de-Boxes.gif','imagen/curso-reparacion-de-celulares.gif','imagen/reparacion-de-celulares.gif','Venta de Boxes<br/>Cajas de Desbloqueo y Reparación de Celulares','Curso de Reparación de Celulares','Reparación de Celulares','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio\">Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Se brinda Soporte y Asesoramiento\">Se brinda Soporte y Asesoramiento.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Los mejores precios del mercado\">Los mejores precios del mercado.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Asesoria para formar tu propio Negocio\">Asesoria para formar tu propio Negocio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Profesores Capacitados\">Profesores Capacitados.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Manuales de Servicio y Diagramas Todas las Marcas\">Manuales de Servicio y Diagramas Todas las Marcas.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Trabajamos con todas las marcas y modelos de celulares\">Trabajamos con todas las marcas y modelos de celulares.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips\">Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Servicio de JTAG para reparacion de boot para telefonos muertos\">Servicio de JTAG para reparacion de boot para telefonos muertos.</p>','imagen/12172810','imagen/12172810','fotos','NO','SI');

/*Table structure for table `estiloseccion` */

DROP TABLE IF EXISTS `estiloseccion`;

CREATE TABLE `estiloseccion` (
  `ccodsecestilo` varchar(4) NOT NULL,
  `cnomsecestilo` varchar(30) NOT NULL,
  `cimgsecestilo` varchar(30) NOT NULL,
  `cestsecestilo` char(1) NOT NULL,
  `cincsecestilo` varchar(50) NOT NULL,
  `ccodmodulo` varchar(4) NOT NULL,
  `cactusuario` varchar(1) NOT NULL,
  PRIMARY KEY (`ccodsecestilo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `estiloseccion` */

insert  into `estiloseccion`(`ccodsecestilo`,`cnomsecestilo`,`cimgsecestilo`,`cestsecestilo`,`cincsecestilo`,`ccodmodulo`,`cactusuario`) values ('1101','Pagina','estilo_imgpagina.gif','1','articulo_estilo01.php','1100','0'),('1102','Resumen','estiloresumen.gif','1','articulo_estilo02.php','1100','0'),('1103','Resumen doble','estiloresumendoble.gif','1','articulo_estilo03.php','1100','0'),('1104','Listado','estilolistado.gif','1','articulo_estilo04.php','1100','0'),('1105','Listado doble','estilolistadoble.gif','1','articulo_estilo05.php','1100','0'),('1106','Galeria','estilogaleria.gif','1','art_stylo_galeria.php','1100','0'),('1201','Pagina','estilo_imgpagina.gif','1','catalogo_estilo01.php','1200','0'),('1202','Resumen (1)','estiloresumen.gif','1','catalogo_estilo02.php','1200','0'),('1203','Resumen doble','estiloresumendoble.gif','1','catalogo_estilo03.php','1200','0'),('1204','Listado','estilolistado.gif','1','catalogo_estilo04.php','1200','0'),('1205','Listado precios','estilolistadoble.gif','1','catalogo_estilo05.php','1200','0'),('1206','Galeria','estilogaleria.gif','1','catalogo_estilo06.php','1200','0'),('1401','Album','estilogaleria.gif','1','fotos_estilos01.php','1400','0'),('1402','Estilo Full Screen','estilogaleria.gif','1','fotos_estilos02.php','1400','0'),('8801','Contactos','estilosformulario.gif','1','contactenos/contactenos.php','8800','0'),('8802','Buscador','estilosformulario.gif','1','buscador_01.php','8800','0'),('8803','Cotizar','estilosformulario.gif','1','form_cotizar.php','8800',''),('8804','Maps','estilosformulario.gif','1','mapa/form_mapa.php','8800','0'),('1107','Estilo Blog','estiloblog.gif','1','articulo_estilo07.php','1100','0'),('1108','Estilo Blog-Imagen','estiloblog.gif','1','articulo_estilo08.php','1100','0'),('1901','Tienda 1','','1','tienda_virtual/vercarrito.php','1900','0'),('1601','Metodo Pago 1','','1','metodo_pago01.php','1600','0'),('1701','Envio Instruccion Pago 1','','1','envio-instruccion-pagos01.php','1700','0'),('1801','Prod.Listado 1','','1','estilo_pre_01.php','1800','0'),('1802','Prod.Ofertas 1','','1','oferta_01.php','1800','0'),('1207','Estilo Curso Resumen 01','','1','style-curso-resumen-01.php','1200','0'),('1803','Curso Listado 1','','1','estilo_pre-curso_01.php','1800','0'),('1109','Listado Numeros','estilolistado.gif','1','articulo_estilo09.php','1100','0'),('1804','Lstdo Hori 2nivel','','1','stilo-lis-hori-01.php','1800','0'),('1805','Lstdo Hori Pro IMG','','1','stilo-lis-hori-img-01.php','1800','0'),('1806','infinitecarousel 2','','1','infinitecarousel2.php','1800','0'),('8805','Registro Contingente ','estilosformulario.gif','1','form-registro-contingente.php','8800','0'),('1110','Listado Comentarios','estilolistado.gif','1','articulo_estilo10.php','1100','0'),('8806','Formulario Acceso','estilosformulario.gif','1','form-iniciar-sesion.php','8800','0'),('8807','Configuracion Usuario','estilosformulario.gif','1','form-configuracion-usuario.php','8800','0'),('1807','Listado Comentario Portada','','1','listado-comentario-portada.php','1800','0'),('1808','Listado Usuario Portada','','1','listado-usuarios-portada.php','1800','0'),('8808','Formulario Recordar Contrasena','estilosformulario.gif','1','form-recordatorio-contrasena.php','8800','0'),('2001','Videos Listado General','estilogaleria.gif','1','videos-listado-general.php','2000','0'),('1809','Videos slider Portada ','','1','videos-slider-portada-infinitecarousel2.php','1800','0'),('1403','Panel Izquierdo','estilogaleria.gif','1','foto_ctn_iz_centro.php','1400','0'),('1810','Fotos slider Portada','','1','fotos-slider-portada-infinitecarousel2.php','1800','0'),('1811','Fotos slider Portada Thumbnail','','1','fotos-slider-portada-Thumbnails.php','1800','0'),('1404','Lstado Hori Categoria superior','estilogaleria.gif','1','foto_lstado_hori_categoria_superiror.php','1400','0'),('1812','Tab TabStylesInspiration hori ','','1','tabs_TabStylesInspiration_hori_cate01.php','1800','0'),('1813','Tab jquery steps verti 1','','1','tabs_jquery_steps_verti_01.php','1800',''),('8809','Maps Sin Pre-Imagen','estilosformulario.gif','1','mapa/form_mapa_sin_pre_imagen.php','8800',''),('1405','Album PhotoSwipe','estilogaleria.gif','1','foto_album_photoswipe.php','1400','0'),('1111','Galeria photoswipe','estilolistado.gif','1','art_stylo_galeria_photoswipe.php','1100','0');

/*Table structure for table `excel_archivos` */

DROP TABLE IF EXISTS `excel_archivos`;

CREATE TABLE `excel_archivos` (
  `idexcel` varchar(30) CHARACTER SET latin1 NOT NULL,
  `cNuevoNombreexcel` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `cNombreoriginalexcel` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `archivocss` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `contenido_excel` longtext CHARACTER SET utf8,
  `dfeccontenido` datetime DEFAULT NULL,
  PRIMARY KEY (`idexcel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `excel_archivos` */

/*Table structure for table `facdeta` */

DROP TABLE IF EXISTS `facdeta`;

CREATE TABLE `facdeta` (
  `facnum` int(10) unsigned NOT NULL,
  `codpro` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`facnum`,`codpro`),
  KEY `producto_has_factura_FKIndex1` (`codpro`),
  KEY `producto_has_factura_FKIndex2` (`facnum`),
  CONSTRAINT `facdeta_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `producto` (`codpro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facdeta_ibfk_2` FOREIGN KEY (`facnum`) REFERENCES `factura` (`facnum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `facdeta` */

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `facnum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codcli` int(10) unsigned NOT NULL,
  `facfec` date NOT NULL,
  `facmon` decimal(10,2) NOT NULL,
  `facdes` int(10) unsigned NOT NULL,
  `factot` decimal(10,2) NOT NULL,
  PRIMARY KEY (`facnum`),
  KEY `factura_FKIndex1` (`codcli`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`codcli`) REFERENCES `cliente` (`codcli`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `factura` */

/*Table structure for table `foto_contenido` */

DROP TABLE IF EXISTS `foto_contenido`;

CREATE TABLE `foto_contenido` (
  `ccodfoto` int(24) NOT NULL AUTO_INCREMENT,
  `ccodcontenido` varchar(24) DEFAULT NULL,
  `ccodpage` varchar(8) DEFAULT NULL,
  `url_foto` varchar(1200) DEFAULT NULL,
  `ccodusuario` varchar(10) DEFAULT '',
  `dfeccontenido` datetime DEFAULT '0000-00-00 00:00:00',
  `dfecmodifica` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ccodfoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `foto_contenido` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idmenu` tinyint(12) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`idmenu`,`titulo`,`descripcion`,`estado`) values (5,'cabecera','','1'),(6,'pie','','1');

/*Table structure for table `page` */

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page` (
  `ccodpage` varchar(8) NOT NULL,
  `cnompage` varchar(40) NOT NULL,
  `cnikpage` varchar(30) NOT NULL,
  `cdocpage` varchar(15) NOT NULL,
  `crazpage` varchar(150) NOT NULL,
  `cslogan` varchar(150) NOT NULL,
  `ccodidioma` varchar(2) NOT NULL,
  `camipage` varchar(60) NOT NULL,
  `cdefpage` varchar(1) NOT NULL,
  `credpage` varchar(8) NOT NULL,
  `cestpage` varchar(1) NOT NULL,
  `ctitpage` varchar(90) NOT NULL,
  `ctagpage` varchar(500) NOT NULL,
  `cdespage` text NOT NULL,
  `cpiepage` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `canagoogle` longblob NOT NULL,
  `ccodpais` varchar(8) NOT NULL,
  `clogo` varchar(100) NOT NULL,
  `nmosprecio` varchar(1) NOT NULL,
  `ccodmoneda` varchar(15) NOT NULL,
  `cfavicon` varchar(100) NOT NULL,
  `ccodplantilla` varchar(6) NOT NULL,
  `nvispage` int(9) NOT NULL,
  `cemacontacto` varchar(100) NOT NULL,
  `cemasoporte` varchar(100) NOT NULL,
  `cemaventas` varchar(100) NOT NULL,
  `cdistrito` varchar(400) DEFAULT NULL,
  `cdirecempresa` varchar(400) NOT NULL,
  `chorarioatencion` varchar(100) NOT NULL,
  `ctelefonopri` varchar(100) NOT NULL,
  `ctelefonosec` varchar(100) NOT NULL,
  `tfax` varchar(50) DEFAULT NULL,
  `tmovil1` varchar(50) DEFAULT NULL,
  `tmovil2` varchar(50) DEFAULT NULL,
  `tmovil3` varchar(100) DEFAULT NULL,
  `tmovil4` varchar(100) DEFAULT NULL,
  `cod_google_map` varchar(1000) DEFAULT NULL,
  `anchomapa` varchar(20) DEFAULT NULL,
  `altomapa` varchar(20) DEFAULT NULL,
  `credYoutube` varchar(200) DEFAULT NULL,
  `credTwitter` varchar(200) DEFAULT NULL,
  `credFacebook` varchar(200) DEFAULT NULL,
  `ccodmodulo` varchar(4) DEFAULT NULL,
  `cprovincia` varchar(300) DEFAULT NULL,
  `imagen_mapa` varchar(300) DEFAULT NULL,
  `rutaimages` varchar(500) DEFAULT NULL,
  `cprovincia2` varchar(300) DEFAULT NULL,
  `cdistrito2` varchar(300) DEFAULT NULL,
  `cdirecempresa2` varchar(400) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodpage`),
  UNIQUE KEY `camipage` (`camipage`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `page` */

insert  into `page`(`ccodpage`,`cnompage`,`cnikpage`,`cdocpage`,`crazpage`,`cslogan`,`ccodidioma`,`camipage`,`cdefpage`,`credpage`,`cestpage`,`ctitpage`,`ctagpage`,`cdespage`,`cpiepage`,`canagoogle`,`ccodpais`,`clogo`,`nmosprecio`,`ccodmoneda`,`cfavicon`,`ccodplantilla`,`nvispage`,`cemacontacto`,`cemasoporte`,`cemaventas`,`cdistrito`,`cdirecempresa`,`chorarioatencion`,`ctelefonopri`,`ctelefonosec`,`tfax`,`tmovil1`,`tmovil2`,`tmovil3`,`tmovil4`,`cod_google_map`,`anchomapa`,`altomapa`,`credYoutube`,`credTwitter`,`credFacebook`,`ccodmodulo`,`cprovincia`,`imagen_mapa`,`rutaimages`,`cprovincia2`,`cdistrito2`,`cdirecempresa2`,`estado`) values ('12172810','Puertas y Creaciones','puertas y creaciones Madera','','Puertas y Creaciones','','es','desarrollo.com','1','','1','Puertas de madera -  Ventanas de Madera Lima',' puertas madera,portones madera,ventanas de madera, muebles en melamine, trabajos en Drywall.                                                                                                                                                                                                                                                                                                                                                                                                                       ','Somos fabricantes de puertas de madera,portones de madera,ventanas de madera, drywall , Melamines  Siguiendo una estricta línea de calidad, en la utilización del tipo de madera adecuada    para  cada  tipo de trabajo.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ','<br>\nCopyright © 2011 FP Diesel Todos los derechos reservados<br>\nAv. Elmer Faucett 330 Urb. La Colonial - Callao 01 Perú \nTeléfono: +511 4520378 Fax +511 4520378 Nextel: 813*4542 / 813*4197  gerencia@rysdistribuciones.com  \n','                                     <script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-56115528-1\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n\r\n</script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ','PE000000','/imagen/12172810/logo-puertas-madera-200px.png','0','D','/imagen/12172807/soluciones_gis_menu.ico','0001',112178,'informes@puertasycreaciones.com','gerencia@rysdistribuciones.com','informes@puertasycreaciones.com','San Martin de Porres',' Dirección:  Calle 10 de Febrero Mz: K Lote: 11  Condevilla Señor ','                                                                                                    ','','','','990952231','','','','<iframe width=\"99%\" height=\"400\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://www.google.es/maps/ms?msa=0&msid=209071589162732424069.0005060769ca5eea27477&hl=es-419&ie=UTF8&t=m&ll=-12.019132,-77.082524&spn=0.01679,0.030427&z=15&output=embed\"></iframe><br /><small>Ver <a href=\"https://www.google.es/maps/ms?msa=0&msid=209071589162732424069.0005060769ca5eea27477&hl=es-419&ie=UTF8&t=m&ll=-12.019132,-77.082524&spn=0.01679,0.030427&z=15&source=embed\" style=\"color:#0000FF;text-align:left\">puertas y creaciones</a> en un mapa ampliado</small>       \r\n                                                                                                                                                                                                                                                                                                                                                                                                                                    ','95%','470','','','https://www.facebook.com/puertasycreaciones','1100','Lima','/imagen/12172810/mapa-de-sitio.png','','','','',NULL);

/*Table structure for table `pagehome` */

DROP TABLE IF EXISTS `pagehome`;

CREATE TABLE `pagehome` (
  `ccodinicio` int(8) NOT NULL AUTO_INCREMENT,
  `ccodpage` varchar(8) NOT NULL,
  `cnomhome` varchar(100) NOT NULL,
  `ccodclase` int(11) NOT NULL,
  `cesthome` varchar(3) NOT NULL,
  `ctiphome` varchar(3) NOT NULL,
  `cimgpubli` varchar(100) NOT NULL,
  `nancho` int(6) DEFAULT NULL,
  `nalto` int(6) DEFAULT NULL,
  `curlpubli` varchar(500) NOT NULL,
  `cadspubli` text NOT NULL,
  `ccodestilo` char(10) DEFAULT NULL,
  `ccodmodulo` varchar(4) NOT NULL,
  `ccodseccion` varchar(24) DEFAULT NULL,
  `ccodcategoria` varchar(1) NOT NULL,
  `nnroitems` int(8) NOT NULL,
  `ccodorden` varchar(1) NOT NULL,
  `cubidestino` varchar(2) NOT NULL,
  `cordpublica` int(4) NOT NULL,
  `cpubsec` varchar(1) NOT NULL DEFAULT '0',
  `cpubnom` varchar(1) NOT NULL DEFAULT '0',
  `cpubres` varchar(1) NOT NULL DEFAULT '0',
  `cpubimg` varchar(1) NOT NULL DEFAULT '0',
  `cimgsize` varchar(1) NOT NULL,
  `dfecinicio` date NOT NULL,
  `dfecfinal` date NOT NULL,
  `anchowin` int(4) NOT NULL,
  `altowin` int(4) NOT NULL,
  `cimagen1` varchar(150) NOT NULL,
  `curl1` varchar(150) NOT NULL,
  `titulo_imagen1` varchar(300) DEFAULT NULL,
  `texto_imagen1` longtext,
  `cimagen2` varchar(150) NOT NULL,
  `curl2` varchar(150) NOT NULL,
  `titulo_imagen2` varchar(300) DEFAULT NULL,
  `texto_imagen2` longtext,
  `cimagen3` varchar(150) NOT NULL,
  `curl3` varchar(150) NOT NULL,
  `titulo_imagen3` varchar(300) DEFAULT NULL,
  `texto_imagen3` longtext,
  `cimagen4` varchar(150) NOT NULL,
  `curl4` varchar(150) NOT NULL,
  `titulo_imagen4` varchar(300) DEFAULT NULL,
  `texto_imagen4` longtext,
  `cimagen5` varchar(150) NOT NULL,
  `curl5` varchar(150) NOT NULL,
  `titulo_imagen5` varchar(300) DEFAULT NULL,
  `texto_imagen5` longtext,
  `dfechome` date NOT NULL,
  `estado` varchar(10) NOT NULL,
  `mostrar_titulo` varchar(2) DEFAULT NULL,
  `texto1` varchar(150) DEFAULT NULL,
  `texto2` varchar(150) DEFAULT NULL,
  `texto3` varchar(150) DEFAULT NULL,
  `texto4` varchar(150) DEFAULT NULL,
  `texto5` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ccodinicio`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

/*Data for the table `pagehome` */

insert  into `pagehome`(`ccodinicio`,`ccodpage`,`cnomhome`,`ccodclase`,`cesthome`,`ctiphome`,`cimgpubli`,`nancho`,`nalto`,`curlpubli`,`cadspubli`,`ccodestilo`,`ccodmodulo`,`ccodseccion`,`ccodcategoria`,`nnroitems`,`ccodorden`,`cubidestino`,`cordpublica`,`cpubsec`,`cpubnom`,`cpubres`,`cpubimg`,`cimgsize`,`dfecinicio`,`dfecfinal`,`anchowin`,`altowin`,`cimagen1`,`curl1`,`titulo_imagen1`,`texto_imagen1`,`cimagen2`,`curl2`,`titulo_imagen2`,`texto_imagen2`,`cimagen3`,`curl3`,`titulo_imagen3`,`texto_imagen3`,`cimagen4`,`curl4`,`titulo_imagen4`,`texto_imagen4`,`cimagen5`,`curl5`,`titulo_imagen5`,`texto_imagen5`,`dfechome`,`estado`,`mostrar_titulo`,`texto1`,`texto2`,`texto3`,`texto4`,`texto5`) values (100,'12172810','Contacto',3,'1','3','',NULL,NULL,'','<div id=\"m_cont_late\">\r\n<div style=\"padding-left: 10px; padding-top: 10px; color: #fff;\">\r\n<p>CONTACTENOS</p>\r\n</div>\r\n<div class=\"bold m_l_5 naranja t16  m_top_20\"><a class=\"phone\" title=\"ring ring ring\" href=\"tel:990952231\"><span class=\"nrocelular\"> 990952231</span> </a></div>\r\n<div class=\"clear\">&nbsp;</div>\r\n</div>',NULL,'',NULL,'',0,'','4',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-12-10','1','no',NULL,NULL,NULL,NULL,NULL),(101,'12172810','Facebook',3,'1','3','',NULL,NULL,'','<p><iframe style=\"border: none; overflow: hidden; width: 99%; height: 290px;\" frameborder=\"0\" height=\"150\" scrolling=\"no\" src=\"//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/puertasycreaciones&amp;width=200px&amp;height=290&amp;colorscheme=light&amp;show_faces=true\r\n&amp;header=true&amp;stream=false&amp;show_border=false\" width=\"300\"></iframe></p>',NULL,'',NULL,'',0,'','4',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-12-10','1','si',NULL,NULL,NULL,NULL,NULL),(102,'12172810','Puertas de Madera en lima',4,'1','3','',NULL,NULL,'','<p>Puertas y Creaciones.&nbsp;Somos fabricantes de <strong>puertas de madera</strong>, <strong>portones de madera</strong>, <strong>ventanas de madera</strong> y&nbsp;<strong>Reposteros de madera</strong>&nbsp;Siguiendo una estricta l&iacute;nea de calidad, en la utilizaci&oacute;n del tipo de madera adecuada &nbsp; &nbsp;para &nbsp;cada &nbsp;tipo de trabajo.</p>\r\n<p>Puertas y Creaciones.&nbsp;Tambien nos dedicamos a los muebles en <strong>melamine</strong> y todo tipo de trabajos en <strong>drywall</strong><em>.</em></p>',NULL,'',NULL,'',0,'','3',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-12-21','1','si',NULL,NULL,NULL,NULL,NULL),(103,'12172810','Cabecera Animada',2,'1','5','',100,240,'','',NULL,'',NULL,'',0,'','1',0,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'/imagen/12172810/puertas-creaciones-1.jpg','',NULL,NULL,'/imagen/12172810/puertas-creaciones-2.jpg','',NULL,NULL,'/imagen/12172810/puertas-creaciones-3.jpg','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-12-21','','si','','','','',''),(104,'12172810','Bienvenida-Areas',8,'1','4','',NULL,NULL,'','','1805','1100','121728102000000000000000','0',9,'1','3',2,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-12-22','','no',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pagehomedet` */

DROP TABLE IF EXISTS `pagehomedet`;

CREATE TABLE `pagehomedet` (
  `ccodinicio` int(8) NOT NULL,
  `ccoddestino` varchar(24) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodinicio`,`ccoddestino`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pagehomedet` */

insert  into `pagehomedet`(`ccodinicio`,`ccoddestino`,`estado`) values (100,'T',NULL),(101,'T',NULL),(102,'D',NULL),(103,'T',NULL),(104,'D',NULL);

/*Table structure for table `pagemenu` */

DROP TABLE IF EXISTS `pagemenu`;

CREATE TABLE `pagemenu` (
  `ccodmenu` int(8) NOT NULL AUTO_INCREMENT,
  `ccodpage` varchar(8) NOT NULL,
  `cnommenu` varchar(50) NOT NULL,
  `cubimenu` varchar(1) NOT NULL,
  `cclamenu` varchar(20) NOT NULL,
  `cestmenu` varchar(1) NOT NULL,
  `cmenuorden` varchar(1) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `pagemenu` */

insert  into `pagemenu`(`ccodmenu`,`ccodpage`,`cnommenu`,`cubimenu`,`cclamenu`,`cestmenu`,`cmenuorden`,`estado`) values (1,'12172810','Cabecera','1','','1','0',NULL),(3,'12172810','Pie','5','','1','',NULL);

/*Table structure for table `pagesucursal` */

DROP TABLE IF EXISTS `pagesucursal`;

CREATE TABLE `pagesucursal` (
  `ccodsucursal` int(9) NOT NULL AUTO_INCREMENT,
  `ccodpage` varchar(24) DEFAULT NULL,
  `ctipsucursal` varchar(6) DEFAULT NULL,
  `cnomsucursal` varchar(300) DEFAULT NULL,
  `cdessucursal` varchar(765) DEFAULT NULL,
  `ccodubigeo` varchar(30) DEFAULT NULL,
  `cdiroficina` varchar(765) DEFAULT NULL,
  `clatsucursal` varchar(90) DEFAULT NULL,
  `clonsucursal` varchar(90) DEFAULT NULL,
  `ctelsucursal` varchar(90) DEFAULT NULL,
  `cfaxsucursal` varchar(90) DEFAULT NULL,
  `cmovsucursal` varchar(90) DEFAULT NULL,
  `cnexsucursal` varchar(90) DEFAULT NULL,
  `cemasucursal` varchar(300) DEFAULT NULL,
  `curlsucursal` varchar(300) DEFAULT NULL,
  `cestsucursal` char(3) DEFAULT NULL,
  `dfecsucursal` date DEFAULT NULL,
  `dfecmodifica` datetime DEFAULT NULL,
  `ccodusuario` varchar(48) DEFAULT NULL,
  `cod_google_map` longtext,
  `anchomapa` varchar(10) DEFAULT NULL,
  `altomapa` varchar(10) DEFAULT NULL,
  `horario_atencion` varchar(800) DEFAULT NULL,
  `localprincipal` char(10) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pagesucursal` */

insert  into `pagesucursal`(`ccodsucursal`,`ccodpage`,`ctipsucursal`,`cnomsucursal`,`cdessucursal`,`ccodubigeo`,`cdiroficina`,`clatsucursal`,`clonsucursal`,`ctelsucursal`,`cfaxsucursal`,`cmovsucursal`,`cnexsucursal`,`cemasucursal`,`curlsucursal`,`cestsucursal`,`dfecsucursal`,`dfecmodifica`,`ccodusuario`,`cod_google_map`,`anchomapa`,`altomapa`,`horario_atencion`,`localprincipal`,`estado`) values (1,'12172809','01','Callao','','','jr callao','','','4520378','4520378','813*4542','','gerencia@rysdistribuciones.com','www.rysdistribuciones.com','1','2011-08-01','2014-08-22 23:28:30','11061212','<iframe width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&output=embed\"></iframe><br /><small>Ver <a href=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&source=embed\" style=\"color:#0000FF;text-align:left\">www.gamatell.com</a> en un mapa más grande</small>                                                                                                                                                                                                                                                                                                                                                                ','660','450','Lunes a Viernes de  8 Am - 5 Pm                                    ','si',NULL);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `ccodcontenido` varchar(24) DEFAULT NULL,
  `cnomcontenido` varchar(255) DEFAULT NULL,
  `precio` decimal(11,0) DEFAULT NULL,
  `cimgcontenido` varchar(150) DEFAULT NULL,
  `atendido` varchar(10) DEFAULT NULL,
  `IP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `codpro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nompro` varchar(30) NOT NULL,
  `prepro` decimal(10,2) NOT NULL,
  PRIMARY KEY (`codpro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) NOT NULL,
  `detalle_articulo` longtext NOT NULL,
  `idcategoria` tinyint(11) NOT NULL,
  `idsubcategoria` tinyint(11) NOT NULL,
  `detalle_curso` longtext NOT NULL,
  `preciosoles` decimal(11,0) NOT NULL,
  `preciosolesoferta` decimal(11,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `mostrar` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `fechacorta` date NOT NULL,
  `idcampana` varchar(12) NOT NULL,
  `borrado` varchar(1) NOT NULL,
  `en_oferta` varchar(3) NOT NULL,
  `curso` varchar(500) NOT NULL,
  `duracion` varchar(200) NOT NULL,
  `inicioclases` date NOT NULL,
  `modalidad` varchar(200) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `orden` varchar(5) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `imagen` longtext NOT NULL,
  `codigo_curso` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `amigable` varchar(200) NOT NULL,
  PRIMARY KEY (`idproductos`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

/*Table structure for table `seccion` */

DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion` (
  `ccodseccion` varchar(24) NOT NULL,
  `ccodpage` varchar(8) NOT NULL,
  `ccodplantilla` varchar(6) NOT NULL,
  `ccodmodulo` varchar(4) NOT NULL,
  `ccodsecestilo` varchar(4) NOT NULL,
  `ccodclase` int(11) DEFAULT NULL,
  `cnomseccion` varchar(50) NOT NULL,
  `camiseccion` varchar(50) NOT NULL,
  `ctitseccion` varchar(100) NOT NULL,
  `cdesseccion` text NOT NULL,
  `ctagseccion` varchar(250) NOT NULL,
  `cimgseccion` varchar(100) NOT NULL,
  `cestseccion` varchar(1) NOT NULL DEFAULT '0',
  `cnivseccion` char(1) NOT NULL DEFAULT '1',
  `ctipseccion` char(1) NOT NULL DEFAULT '0',
  `cestpublico` varchar(1) NOT NULL DEFAULT '0',
  `cnewmenu` varchar(1) NOT NULL DEFAULT '0',
  `curlseccion` varchar(255) DEFAULT NULL,
  `cpagseccion` varchar(4) NOT NULL,
  `cordcontenido` int(5) NOT NULL,
  `nvisseccion` int(9) NOT NULL,
  `dfecseccion` date NOT NULL,
  `ccodusuario` varchar(10) NOT NULL,
  `dfecmodifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` varchar(5) DEFAULT NULL,
  `totalpantalla` varchar(30) DEFAULT NULL,
  `paginator` varchar(5) DEFAULT NULL,
  `mostrarurlcatebase` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`ccodseccion`),
  KEY `camiseccion` (`ccodpage`,`camiseccion`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`ccodseccion`,`ccodpage`,`ccodplantilla`,`ccodmodulo`,`ccodsecestilo`,`ccodclase`,`cnomseccion`,`camiseccion`,`ctitseccion`,`cdesseccion`,`ctagseccion`,`cimgseccion`,`cestseccion`,`cnivseccion`,`ctipseccion`,`cestpublico`,`cnewmenu`,`curlseccion`,`cpagseccion`,`cordcontenido`,`nvisseccion`,`dfecseccion`,`ccodusuario`,`dfecmodifica`,`estado`,`totalpantalla`,`paginator`,`mostrarurlcatebase`) values ('121728100001000000000000','12172810','0001','1200','1201',2,'Inicio','inicio','Inicio','','','','1','1','2','0','0','/index.php','12',1,0,'2015-12-09','100','2015-12-21 17:13:10','1','derepantalla',NULL,'SI'),('121728102000000000000000','12172810','0001','1100','1109',2,'Servicios','servicios','Servicios','','','','1','1','1','0','0','','12',2,0,'2015-12-09','100','2015-12-22 02:02:09','1','derepantalla',NULL,'SI'),('121728102001000000000000','12172810','0001','1100','1101',2,'Quienes Somos','quienes-somos','Quienes Somos','','','','1','1','1','0','0','','12',3,0,'2015-12-09','100','2015-12-10 18:43:54','1','derepantalla',NULL,'SI'),('121728102002000000000000','12172810','0001','8800','8809',2,'Ubicación','ubicacion','Ubicación','','','','1','1','1','0','0','','12',4,0,'2015-12-09','100','2016-02-12 13:08:23','1','derepantalla',NULL,'SI'),('121728102003000000000000','12172810','0001','8800','8801',2,'Contactenos','contactenos','Contactenos','','','','1','1','1','0','0','','12',5,0,'2015-12-09','100','2015-12-16 19:52:51','1','totalpantalla',NULL,'SI'),('121728102000000100000000','12172810','0001','1100','1111',9,'Puertas de Madera','puertas-de-madera','Puertas de Madera','<p>Fabricamos<strong> Puertas de Madera</strong> a &nbsp;su medida, a su gusto, y a su presupuesto ,&nbsp;<strong>Puertas de Madera</strong>&nbsp;&nbsp;En diferentes estilos y acabados&nbsp;</p>','','/imagen/12172810/puerta-exterior-madera-maciza.jpg','1','2','1','0','0','','12',1,0,'2015-12-21','100','2016-02-15 05:02:41','1','derepantalla',NULL,NULL),('121728102000000200000000','12172810','0001','1100','1111',9,'Ventanas de madera','ventanas-de-madera','Ventanas de madera','','','/imagen/12172810/ventana-madera-1.jpg','1','2','1','0','0','','12',2,0,'2015-12-21','100','2016-02-14 22:19:33','1','derepantalla',NULL,NULL),('121728102000000300000000','12172810','0001','1100','1111',9,'Reposteros de madera','reposteros-de-madera','Reposteros de madera','','','/imagen/12172810/repostero-madera.jpg','1','2','1','0','0','','12',3,0,'2015-12-21','100','2016-02-14 22:19:43','1','derepantalla',NULL,NULL),('121728102000000400000000','12172810','0001','1100','1111',9,'Muebles','muebles','Muebles','','','/imagen/12172810/muebles-madera.jpg','1','2','1','0','0','','12',4,0,'2015-12-21','100','2016-02-13 14:03:51','1','derepantalla',NULL,NULL),('121728102000000500000000','12172810','0001','1100','1111',9,'drywall','drywall','drywall','','','/imagen/12172810/oficinas-420x279.jpg','1','2','1','0','0','','12',5,0,'2015-12-21','100','2016-02-13 14:03:57','1','derepantalla',NULL,NULL),('121728102000000600000000','12172810','0001','1100','1111',9,'Melamines','melamines','Melamines','','','/imagen/12172810/muebles-melamine.jpg','1','2','1','0','0','','12',6,0,'2015-12-21','100','2016-02-13 14:04:03','1','derepantalla',NULL,NULL);

/*Table structure for table `seccioncontenido` */

DROP TABLE IF EXISTS `seccioncontenido`;

CREATE TABLE `seccioncontenido` (
  `ccodpage` varchar(8) NOT NULL,
  `ccodseccion` varchar(24) NOT NULL,
  `ccodcontenido` varchar(24) NOT NULL,
  `cordcontenido` int(9) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodpage`,`ccodseccion`,`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccioncontenido` */

insert  into `seccioncontenido`(`ccodpage`,`ccodseccion`,`ccodcontenido`,`cordcontenido`,`estado`) values ('12172810','121728102001000000000000','12172810151210182835HXGP',0,NULL),('12172810','121728102000000100000000','12172810151224155614JYVC',0,NULL),('12172810','121728102000000100000000','121728101601030355457G6C',0,NULL),('12172810','121728102000000000000000','121728101601030355457G6C',0,NULL),('12172810','121728102000000100000000','12172810160103035803RIYD',0,NULL),('12172810','121728102000000100000000','12172810160103035936MR8I',0,NULL),('12172810','121728102000000100000000','121728101601030402398D0O',0,NULL),('12172810','121728102000000100000000','12172810160103040345F1V8',0,NULL),('12172810','121728102000000200000000','12172810160103040547L9Y5',0,NULL),('12172810','121728102000000200000000','1217281016010304073698TM',0,NULL),('12172810','121728102000000300000000','12172810160103041225XSQO',0,NULL),('12172810','121728102000000400000000','12172810160103041630YOEM',0,NULL),('12172810','121728102000000000000000','12172810160103041630YOEM',0,NULL),('12172810','121728102000000400000000','121728101601030438139N7C',0,NULL),('12172810','121728102000000000000000','121728101601030438139N7C',0,NULL),('12172810','121728102000000300000000','12172810160103044433SNDE',0,NULL),('12172810','121728102000000000000000','12172810160103044433SNDE',0,NULL),('12172810','121728102000000600000000','12172810160103044800B70R',0,NULL),('12172810','121728102000000000000000','12172810160103044800B70R',0,NULL),('12172810','121728102000000600000000','12172810160103044937BZ87',0,NULL),('12172810','121728102000000000000000','12172810160103044937BZ87',0,NULL),('12172810','121728102000000600000000','12172810160103045105DLSJ',0,NULL),('12172810','121728102000000000000000','12172810160103045105DLSJ',0,NULL),('12172810','121728102000000600000000','12172810160103045236T4SF',0,NULL),('12172810','121728102000000000000000','12172810160103045236T4SF',0,NULL),('12172810','121728102000000000000000','1217281016010304073698TM',0,NULL),('12172810','121728102000000000000000','12172810160103035803RIYD',0,NULL),('12172810','121728102000000000000000','12172810160103035936MR8I',0,NULL),('12172810','121728102000000000000000','12172810151224155614JYVC',0,NULL),('12172810','121728102000000300000000','12172810160107042018BZKA',0,NULL),('12172810','121728102000000000000000','12172810160107042018BZKA',0,NULL),('12172810','121728102000000300000000','121728101601070422430FZG',0,NULL),('12172810','121728102000000000000000','121728101601070422430FZG',0,NULL),('12172810','121728102000000600000000','12172810160107042509G5TH',0,NULL),('12172810','121728102000000000000000','12172810160107042509G5TH',0,NULL),('12172810','121728102000000600000000','1217281016010704283040OX',0,NULL),('12172810','121728102000000000000000','1217281016010704283040OX',0,NULL),('12172810','121728102000000000000000','121728101601030402398D0O',0,NULL),('12172810','121728102000000500000000','12172810160109024756DUQV',0,NULL),('12172810','121728102000000000000000','12172810160109024756DUQV',0,NULL),('12172810','121728102000000500000000','12172810160109024910TLBU',0,NULL),('12172810','121728102000000000000000','12172810160109024910TLBU',0,NULL),('12172810','121728102000000500000000','12172810160109025023MUDQ',0,NULL),('12172810','121728102000000000000000','12172810160109025023MUDQ',0,NULL),('12172810','121728102000000500000000','12172810160109025158XNE2',0,NULL),('12172810','121728102000000000000000','12172810160109025158XNE2',0,NULL),('12172810','121728102000000100000000','12172810160115034732YX6C',0,NULL),('12172810','121728102000000000000000','12172810160115034732YX6C',0,NULL),('12172810','121728102000000600000000','121728101601150353177RW3',0,NULL),('12172810','121728102000000000000000','121728101601150353177RW3',0,NULL),('12172810','121728102000000600000000','1217281016011503551922PV',0,NULL),('12172810','121728102000000000000000','1217281016011503551922PV',0,NULL),('12172810','121728102000000300000000','12172810160115040005LMQU',0,NULL),('12172810','121728102000000000000000','12172810160115040005LMQU',0,NULL),('12172810','121728102000000600000000','12172810160115040852CIWA',0,NULL),('12172810','121728102000000000000000','12172810160115040852CIWA',0,NULL),('12172810','121728102000000400000000','12172810160115041529PHTI',0,NULL),('12172810','121728102000000000000000','12172810160115041529PHTI',0,NULL),('12172810','121728102000000100000000','12172810160115042716ZDH1',0,NULL),('12172810','121728102000000000000000','12172810160115042716ZDH1',0,NULL),('12172810','121728102000000500000000','121728101601220355027VGI',0,NULL),('12172810','121728102000000000000000','121728101601220355027VGI',0,NULL),('12172810','121728102000000500000000','12172810160122035626R3JT',0,NULL),('12172810','121728102000000000000000','12172810160122035626R3JT',0,NULL),('12172810','121728102000000500000000','12172810160122035816DE9C',0,NULL),('12172810','121728102000000000000000','12172810160122035816DE9C',0,NULL),('12172810','121728102000000500000000','12172810160122035917WC86',0,NULL),('12172810','121728102000000000000000','12172810160122035917WC86',0,NULL),('12172810','121728102000000000000000','121728102000000100000000',0,NULL),('12172810','121728102000000100000000','121728102000000100000000',0,NULL);

/*Table structure for table `seccionmenu` */

DROP TABLE IF EXISTS `seccionmenu`;

CREATE TABLE `seccionmenu` (
  `ccodseccion` varchar(24) NOT NULL,
  `ccodmenu` int(8) NOT NULL,
  `cordmenu` int(8) NOT NULL DEFAULT '0',
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodmenu`,`ccodseccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccionmenu` */

insert  into `seccionmenu`(`ccodseccion`,`ccodmenu`,`cordmenu`,`estado`) values ('121728062000000000000000',1,0,NULL),('121728062005000000000000',1,0,NULL),('121728062002000000000000',1,0,NULL),('121728062003000000000000',1,0,NULL),('121728060001000000000000',1,0,NULL),('121728062004000000000000',1,0,NULL),('121728062013000000000000',1,0,NULL),('121728070001000000000000',1,0,NULL),('121728072000000000000000',1,0,NULL),('121728072001000000000000',1,0,NULL),('121728072002000000000000',1,0,NULL),('121728072003000000000000',1,0,NULL),('121728072004000000000000',1,0,NULL),('121728090001000000000000',1,0,NULL),('121728092000000000000000',1,0,NULL),('121728092001000000000000',1,0,NULL),('121728092002000000000000',1,0,NULL),('121728092003000000000000',1,0,NULL),('121728100001000000000000',1,0,NULL),('121728102000000000000000',1,0,NULL),('121728102001000000000000',1,0,NULL),('121728102002000000000000',1,0,NULL),('121728102003000000000000',1,0,NULL);

/*Table structure for table `subcategoria` */

DROP TABLE IF EXISTS `subcategoria`;

CREATE TABLE `subcategoria` (
  `idsubcategoria` tinyint(12) NOT NULL AUTO_INCREMENT,
  `idcategoria` tinyint(12) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` longtext NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`idsubcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subcategoria` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` bigint(7) NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nombre` char(255) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `cookie` text NOT NULL,
  `eliminado` text NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `compania-eliminame` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `imagenfoto` varchar(500) DEFAULT NULL,
  `patrulla` varchar(500) DEFAULT NULL,
  `id_conpania` bigint(7) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`) USING BTREE,
  KEY `id` (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nick`,`password`,`nombre`,`email`,`cookie`,`eliminado`,`fecha`,`compania-eliminame`,`telefono`,`nivel`,`imagenfoto`,`patrulla`,`id_conpania`,`facebook`,`estado`) values (100,'alextutor','nmûúÛ0n›„|Œ¢Þ','alexzander huiza quispe','sisdatahost@hotmail.com','','NO','2015-01-16 22:17:40','1','996272600','ADMINISTRADOR','/imagen/foto-usuarios/quebrada-inozente-rios-huiza.jpg','',1,'https://www.facebook.com/alexhuizaquispe',NULL),(204,'prueba','nmûúÛ0n›„|Œ¢Þ','alexzander huiza quispe','sisdatahost@hotmail.com','','NO','2015-01-16 22:17:40','1','996272600','ADMINISTRADOR','/imagen/foto-usuarios/quebrada-inozente-rios-huiza.jpg','',1,'https://www.facebook.com/alexhuizaquispe',NULL);

/*Table structure for table `webmodulos` */

DROP TABLE IF EXISTS `webmodulos`;

CREATE TABLE `webmodulos` (
  `ccodmodulo` varchar(4) NOT NULL,
  `cnommodulo` varchar(50) NOT NULL,
  `cestmodulo` varchar(1) NOT NULL,
  `cactgaleria` varchar(1) NOT NULL,
  `es_producto` char(2) DEFAULT NULL COMMENT 'utilizado por jq_selectseccion.php',
  PRIMARY KEY (`ccodmodulo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `webmodulos` */

insert  into `webmodulos`(`ccodmodulo`,`cnommodulo`,`cestmodulo`,`cactgaleria`,`es_producto`) values ('1100','Articulos','1','','S'),('1400','Galeria Fotos','1','S','S'),('8800','Formularios','1','','N'),('1200','Catalogo','1','','S'),('1300','Paquetes','1','','S'),('1500','Anuncios','1','','-'),('1900','Compras','1','','N'),('1600','Metodo pago','1','','N'),('1700','Envio instruccion pagos','1','','N'),('1800','Presentacion','1','','N'),('2000','Galeria Videos','1','','N');

/*Table structure for table `weboperaciones` */

DROP TABLE IF EXISTS `weboperaciones`;

CREATE TABLE `weboperaciones` (
  `ccodoperacion` varchar(4) NOT NULL,
  `cnomoperacion` varchar(100) NOT NULL,
  `camioperacion` varchar(50) NOT NULL,
  `cimgoperacion` varchar(50) NOT NULL,
  `cincoperacion` varchar(50) NOT NULL,
  `cnivoperacion` char(1) NOT NULL,
  `cicooperacion` varchar(1) NOT NULL,
  `ctipoperacion` varchar(1) NOT NULL,
  `cestoperacion` varchar(1) NOT NULL,
  PRIMARY KEY (`ccodoperacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `weboperaciones` */

insert  into `weboperaciones`(`ccodoperacion`,`cnomoperacion`,`camioperacion`,`cimgoperacion`,`cincoperacion`,`cnivoperacion`,`cicooperacion`,`ctipoperacion`,`cestoperacion`) values ('1000','Configuracion','','','','1','0','A','1'),('1110','Config','','config.jpg','juvame_config.php','2','1','A','1'),('1120','Menu','','menu.jpg','menu.php','2','1','A','1'),('1130','Sucursal','','sucursal.jpg','sucursal.php','2','1','A','1'),('1140','Seccion','','seccion.jpg','seccion.php','2','1','A','1'),('2000','Contenidos','','','contenidos.php','1','0','A','1'),('2110','Articulo','','articulos.jpg','contenido.php','2','1','A','1'),('2140','Galeria de fotos','','fotos.jpg','galeriafotos.php','2','1','A','1'),('2990','Tablero','','tablero.jpg','tablero.php','2','1','A','1'),('3130','Mi Buzon','','mibuzon.jpg','mibuzon.php','2','1','A','1'),('4120','Personas','','clientes.jpg','panel_miperfil.php','2','1','A','1');

/*Table structure for table `webparametros` */

DROP TABLE IF EXISTS `webparametros`;

CREATE TABLE `webparametros` (
  `ccodparametro` varchar(4) NOT NULL,
  `ctipparametro` char(1) NOT NULL,
  `cvalparametro` varchar(15) NOT NULL,
  `cnomparametro` varchar(30) NOT NULL,
  `cdesparametro` varchar(100) NOT NULL,
  PRIMARY KEY (`ccodparametro`,`ctipparametro`,`cvalparametro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `webparametros` */

insert  into `webparametros`(`ccodparametro`,`ctipparametro`,`cvalparametro`,`cnomparametro`,`cdesparametro`) values ('0001','0','','Modulo','Modulo'),('0001','1','1100','Articulos','Articulos'),('0001','1','1200','Catalogo','Catalogo'),('0001','1','1300','Enlaces','Enlaces'),('0001','1','1400','Galeria de Fotos','Galeria de Fotos'),('0001','1','1500','Descargas','Descargas'),('0001','1','1600','Videos','Videos'),('0001','1','1700','Eventos','Eventos'),('0001','1','1800','Galeria 360','Galeria 360'),('0001','1','8800','Formularios','Formularios'),('0001','1','9900','Web Apps','Web Apps'),('0002','0','','Monedas','Monedas'),('0002','1','E','Euro','EUR'),('0002','1','D','Dolares','US$.'),('0002','1','S','Nuevo Soles','S/.'),('0003','0','','Tipos de Sucursales','Tipos de Sucursales'),('0003','1','01','Sede Principal','Sede Principal'),('0003','1','02','Sucursal','Sucursal'),('0003','1','03','Agencia','Agencia'),('0003','1','04','Distribuidor','Distribuidor'),('0004','0','','Ubicaciones Web','Ubicaciones Web'),('0004','1','1','Cabecera','Cabecera'),('0004','1','2','Columna Izquierda','Columna Izquierda'),('0004','1','3','Columna Central','Columna Central'),('0004','1','4','Columna Derecha','Columna Derecha'),('0004','1','5','Pie pagina','Pie pagina'),('0005','0','','Destino Url','Destino Url'),('0005','1','1','Es una seccion ','Es una seccion '),('0005','1','2','Es un enlace o link','Es un enlace o link'),('0006','0','','Sexo','Sexo'),('0006','1','F','Femenino','Femenino'),('0006','1','M','Masculino','Masculino'),('0006','1','E','No especificado','No especificado'),('0007','0','','Ordenar contenidos por','Ordenar contenidos por'),('0007','1','1','Fecha de ingreso','Fecha de ingreso'),('0007','1','2','Titulo del Item','Titulo del Item'),('0007','1','3','Orden Personalizado','Orden Personalizado'),('0007','1','4','Ordenar mas votados','Ordenar mas votados'),('0007','1','5','Ordenar mas comentados','Ordenar mas comentados'),('0012','0','','Tipos de Acceso','Tipos de Acceso'),('0012','1','0','Publico','Publico'),('0012','1','1','Privado ','Privado '),('0013','0','','Categorias de Contenidos','Categorias de Contenidos'),('0013','1','1','Normal','Normal'),('0013','1','2','Destacado','Destacado'),('0008','0','','TIPOS DE CAMPOS','TIPOS DE CAMPOS'),('0008','1','I','Campo de texto','Campo de texto'),('0008','1','S','Seleccion Simple','Seleccion Simple'),('0008','1','M','Seleccion Multiple','Seleccion Multiple'),('0010','0','','Idiomas','Idiomas'),('0010','1','es','Español','Español'),('0010','1','en','English','English'),('0010','1','fr','French','French'),('0011','0','','Tipo Telefono',''),('0011','1','FTEL','Telefono Fijo','Telefono Fijo'),('0011','1','TMOV','Telefono Movil','Telefono Movil'),('0011','1','TRPM','Telefono RPM','Telefono RPM'),('0011','1','TRPC','Telefono RPC','Telefono RPC'),('0011','1','TNEX','Nextel','Nextel'),('0014','0','','Tipo Contenido','Tipo Contenido'),('0014','1','1','Imagen (Gif / Jpg)','Imagen (Gif / Jpg)'),('0014','1','2','Animacion Flash (Swf)','Animacion Flash (Swf)'),('0014','1','3','Codigo Html','Codigo Html'),('0014','1','4','Contenido Dinamico','Contenido Dinamico'),('0015','0','','Orden Extraccion Contenido','Orden Extraccion Contenido'),('0015','1','1','Fecha de ingreso','Fecha de ingreso'),('0015','1','2','Codigo de Producto','Codigo de Producto'),('0015','1','3','Nombre de Producto','Nombre de Producto'),('0015','1','4','Mas visitados','Mas visitados'),('0016','0','','Ubicacion Contenido','Ubicacion Contenido'),('0016','1','1','Cabecera','Cabecera'),('0016','1','2','Columna Izquierda','Columna Izquierda'),('0016','1','3','Columna Centro','Columna Centro'),('0016','1','4','Columna Derecha','Columna Derecha'),('0016','1','5','Pie Pagina','Pie Pagina'),('1000','0','','Tipo Paquete','Tipo paquete'),('1000','1','VU','Vuelo','Vuelo'),('1000','1','HO','Hotel','Hotel'),('1000','1','VH','Vuelo Hotel','Vuelo Hotel'),('1001','0','','Clase de viaje','Clase de viaje'),('1001','1','N','Negocios','Negocios'),('1001','1','T','Turista','Turista'),('1002','0','','Tipos de Hotel','Tipos de Hotel'),('1002','1','','-','-'),('1002','1','E2','2 Estrellas','2 Estrellas'),('1002','1','E3','3 Estrellas','3 Estrellas'),('1002','1','E4','4 Estrellas','4 Estrellas'),('1002','1','E5','5 Estrellas','5 Estrellas'),('1003','0','','Tipo de Habitaciones','Tipo de Habitaciones'),('1003','1','','-','-'),('1003','1','HS','Simple','Simple'),('1003','1','HD','Doble','Doble'),('1003','1','HT','Triple','Triple'),('1003','1','AP','Apartamento','Apartamento'),('1004','0','','Regimen alimentario','Regimen alimentario'),('1004','1','','-','-'),('1004','1','1','Solo alojamiento','Solo alojamiento'),('1004','1','2','Alojamiento y desayuno','Alojamiento y desayuno'),('1004','1','3','Media Pension','Media Pension'),('1004','1','4','Pension completa','Pension completa'),('1004','1','5','Todo incluido','Todo Incluido'),('1005','0','','Medio de transporte','Medio de transporte'),('1005','1','1','Vuelo','Vuelo'),('1005','1','2','Tren','Tren'),('1005','1','3','Bus','Bus'),('0014','1','5','Slider Imagenes (nivo-slider)','Slider Imagenes (nivo-slider)'),('0014','1','6','Ventana Popup','Ventana Popup'),('0014','1','7','Slider Imagenes (jFlow)','Slider Imagenes (jFlow)'),('0001','1','1900','Compras','Compras'),('0014','1','9','Contactenos Portada 1 ','Contactenos Portada 1'),('0017','0','','Estilo Web','Estilo Web'),('0017','1','1','Izquierda Pantalla','Izquierda Pantalla'),('0017','1','2','Derecha Pantalla','Derecha Pantalla'),('0017','1','3','Ambos','Ambos'),('0018','0','','Ubicacion Menu','Ubicacion Menu'),('0018','1','1','Cabecera','Cabecera'),('0018','1','2','Columna Izquierda','Columna Izquierda'),('0018','1','3','Columna Derecha','Columna Derecha'),('0018','1','5','Pie Pagina','Pie Pagina'),('0014','1','8','infinitecarousel 2','infinitecarousel 2'),('ccod','','','',''),('0019','0','','',''),('0019','1','1','Virtual','Virtual'),('0019','1','2','Presencial ','Presencial '),('0017','1','4','Total Pantalla','Total Pantalla');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
