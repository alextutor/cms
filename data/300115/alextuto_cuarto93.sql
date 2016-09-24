/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 5.5.32 : Database - alextuto_cuarto93
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alextuto_cuarto93` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alextuto_cuarto93`;

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

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `codcli` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(30) NOT NULL,
  PRIMARY KEY (`codcli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`codcli`,`nomcli`) values (1,'Amado'),(2,'Amado');

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
) ENGINE=MyISAM AUTO_INCREMENT=620 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `comentarios` */

insert  into `comentarios`(`id`,`id_noticia`,`nombre`,`comentario`,`fechacorta`,`fechalarga`,`titulo`,`email`,`aceptado`,`imagenfoto`,`parent_id`,`idcate`) values (616,'','alfredo gavilan ruiz yann','me da gusto que se hallan reunido y tambien les envidio porque yo tambien quise participar porque siempre los recuerdo to lo que hemos pasadfo en la zona de emergencia saludos compañeros\r\n','2015-01-16','Viernes 16 de Enero de 2015 Hora: 02:36:09 AM','patrulla pantera y acuar','alfredo@hotmail.com',0,'/modulos/comentario-combinado-multiple/usuario-anonimo.gif',0,0);

/*Table structure for table `compania` */

DROP TABLE IF EXISTS `compania`;

CREATE TABLE `compania` (
  `id_conpania` bigint(11) NOT NULL AUTO_INCREMENT,
  `desc_compania` varchar(300) DEFAULT NULL,
  `orden` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_conpania`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `compania` */

insert  into `compania`(`id_conpania`,`desc_compania`,`orden`) values (1,'ALFA',2),(2,'BRAVO',3),(3,'CHARLY',4),(4,'DELTA',5),(5,'ECO',6),(6,'FOXTROP',7),(7,'OTROS',1);

/*Table structure for table `contactenos` */

DROP TABLE IF EXISTS `contactenos`;

CREATE TABLE `contactenos` (
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` longtext NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo` bigint(12) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(200) NOT NULL,
  `procedencia` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

/*Data for the table `contactenos` */

insert  into `contactenos`(`nombre`,`apellido`,`email`,`comentario`,`telefono`,`fecha`,`codigo`,`asunto`,`procedencia`) values ('pepe','','pepe@hotmail.com','hola a todos                ','996272600','2015-01-06 00:28:46',192,'prueba','Formulario Contactenos');

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
) ENGINE=MyISAM AUTO_INCREMENT=10278 DEFAULT CHARSET=latin1;

/*Data for the table `contador` */

insert  into `contador`(`id`,`IP`,`hora`,`fecha`,`segundos`,`fechacorta`) values (10219,'127.0.0.1','05:41:56 PM','Viernes 16 de Enero de 2015 Hora: 05:41:56 PM','1421426516','2015-01-16'),(10220,'190.40.64.134','04:59:14 PM','Viernes 16 de Enero de 2015 Hora: 04:59:14 PM','1421427554','2015-01-16'),(10221,'179.7.95.124','04:59:52 PM','Viernes 16 de Enero de 2015 Hora: 04:59:52 PM','1421427592','2015-01-16'),(10222,'190.113.210.149','05:48:09 PM','Viernes 16 de Enero de 2015 Hora: 05:48:09 PM','1421430489','2015-01-16'),(10223,'66.249.73.141','05:52:52 PM','Viernes 16 de Enero de 2015 Hora: 05:52:52 PM','1421430772','2015-01-16'),(10224,'66.249.73.149','07:44:50 PM','Viernes 16 de Enero de 2015 Hora: 07:44:50 PM','1421437490','2015-01-16'),(10225,'200.121.239.97','10:03:56 PM','Viernes 16 de Enero de 2015 Hora: 10:03:56 PM','1421445836','2015-01-16'),(10226,'179.7.81.188','10:17:59 PM','Viernes 16 de Enero de 2015 Hora: 10:17:59 PM','1421446679','2015-01-16'),(10227,'23.95.43.111','01:52:41 AM','Sabado 17 de Enero de 2015 Hora: 01:52:41 AM','1421459561','2015-01-17'),(10228,'66.249.73.158','03:07:13 AM','Sabado 17 de Enero de 2015 Hora: 03:07:13 AM','1421464033','2015-01-17'),(10229,'66.249.73.150','05:16:42 AM','Sabado 17 de Enero de 2015 Hora: 05:16:42 AM','1421471802','2015-01-17'),(10230,'38.100.21.67','08:43:04 AM','Sabado 17 de Enero de 2015 Hora: 08:43:04 AM','1421484184','2015-01-17'),(10231,'66.249.73.166','12:29:41 PM','Sabado 17 de Enero de 2015 Hora: 12:29:41 PM','1421497781','2015-01-17'),(10232,'179.7.65.124','04:58:11 PM','Sabado 17 de Enero de 2015 Hora: 04:58:11 PM','1421513891','2015-01-17'),(10233,'66.249.73.157','05:49:29 PM','Sabado 17 de Enero de 2015 Hora: 05:49:29 PM','1421516969','2015-01-17'),(10234,'66.249.75.53','12:04:58 PM','Domingo 18 de Enero de 2015 Hora: 12:04:58 PM','1421582698','2015-01-18'),(10235,'66.249.75.37','12:12:38 PM','Domingo 18 de Enero de 2015 Hora: 12:12:38 PM','1421583158','2015-01-18'),(10236,'66.220.156.116','03:40:58 PM','Domingo 18 de Enero de 2015 Hora: 03:40:58 PM','1421595658','2015-01-18'),(10237,'179.7.91.208','03:40:59 PM','Domingo 18 de Enero de 2015 Hora: 03:40:59 PM','1421595659','2015-01-18'),(10238,'66.249.75.78','04:59:06 PM','Domingo 18 de Enero de 2015 Hora: 04:59:06 PM','1421600346','2015-01-18'),(10239,'181.64.209.243','09:03:13 PM','Domingo 18 de Enero de 2015 Hora: 09:03:13 PM','1421614993','2015-01-18'),(10240,'181.66.157.119','04:59:42 AM','Lunes 19 de Enero de 2015 Hora: 04:59:42 AM','1421643582','2015-01-19'),(10241,'201.240.49.156','03:01:11 PM','Lunes 19 de Enero de 2015 Hora: 03:01:11 PM','1421679671','2015-01-19'),(10242,'190.234.105.190','03:58:26 PM','Lunes 19 de Enero de 2015 Hora: 03:58:26 PM','1421683106','2015-01-19'),(10243,'192.99.40.137','05:58:15 PM','Lunes 19 de Enero de 2015 Hora: 05:58:15 PM','1421690295','2015-01-19'),(10244,'181.64.83.74','10:58:50 PM','Lunes 19 de Enero de 2015 Hora: 10:58:50 PM','1421708330','2015-01-19'),(10245,'179.7.74.124','11:21:46 PM','Lunes 19 de Enero de 2015 Hora: 11:21:46 PM','1421709706','2015-01-19'),(10246,'190.233.219.39','11:43:49 PM','Lunes 19 de Enero de 2015 Hora: 11:43:49 PM','1421711029','2015-01-19'),(10247,'190.232.124.229','05:48:11 AM','Martes 20 de Enero de 2015 Hora: 05:48:11 AM','1421732891','2015-01-20'),(10248,'190.187.89.250','08:35:05 PM','Martes 20 de Enero de 2015 Hora: 08:35:05 PM','1421786105','2015-01-20'),(10249,'173.252.88.86','10:05:49 PM','Martes 20 de Enero de 2015 Hora: 10:05:49 PM','1421791549','2015-01-20'),(10250,'132.184.0.52','01:51:54 AM','Miércoles 21 de Enero de 2015 Hora: 01:51:54 AM','1421805114','2015-01-21'),(10251,'69.58.178.56','08:02:54 AM','Miércoles 21 de Enero de 2015 Hora: 08:02:54 AM','1421827374','2015-01-21'),(10252,'190.233.253.100','12:10:25 AM','Jueves 22 de Enero de 2015 Hora: 12:10:25 AM','1421885425','2015-01-22'),(10253,'66.249.79.70','03:33:30 AM','Jueves 22 de Enero de 2015 Hora: 03:33:30 AM','1421897610','2015-01-22'),(10254,'66.249.79.78','04:43:31 AM','Jueves 22 de Enero de 2015 Hora: 04:43:31 AM','1421901811','2015-01-22'),(10255,'66.249.79.62','08:34:56 AM','Jueves 22 de Enero de 2015 Hora: 08:34:56 AM','1421915696','2015-01-22'),(10256,'89.145.95.2','10:45:57 AM','Jueves 22 de Enero de 2015 Hora: 10:45:57 AM','1421923557','2015-01-22'),(10257,'190.237.126.40','04:41:46 PM','Jueves 22 de Enero de 2015 Hora: 04:41:46 PM','1421944906','2015-01-22'),(10258,'190.237.126.40','04:41:46 PM','Jueves 22 de Enero de 2015 Hora: 04:41:46 PM','1421944906','2015-01-22'),(10259,'181.67.162.198','02:49:23 AM','Sabado 24 de Enero de 2015 Hora: 02:49:23 AM','1422067763','2015-01-24'),(10260,'190.42.139.72','03:42:25 AM','Sabado 24 de Enero de 2015 Hora: 03:42:25 AM','1422070945','2015-01-24'),(10261,'66.249.64.17','03:03:01 PM','Sabado 24 de Enero de 2015 Hora: 03:03:01 PM','1422111781','2015-01-24'),(10262,'66.249.64.174','11:24:46 PM','Sabado 24 de Enero de 2015 Hora: 11:24:46 PM','1422141886','2015-01-24'),(10263,'66.249.64.166','12:20:57 AM','Domingo 25 de Enero de 2015 Hora: 12:20:57 AM','1422145257','2015-01-25'),(10264,'66.249.64.170','01:15:13 AM','Domingo 25 de Enero de 2015 Hora: 01:15:13 AM','1422148513','2015-01-25'),(10265,'157.55.39.133','01:32:34 PM','Domingo 25 de Enero de 2015 Hora: 01:32:34 PM','1422192754','2015-01-25'),(10266,'66.249.64.9','07:44:38 PM','Domingo 25 de Enero de 2015 Hora: 07:44:38 PM','1422215078','2015-01-25'),(10267,'66.249.88.132','10:16:44 PM','Domingo 25 de Enero de 2015 Hora: 10:16:44 PM','1422224204','2015-01-25'),(10268,'192.99.9.142','01:14:53 AM','Martes 27 de Enero de 2015 Hora: 01:14:53 AM','1422321293','2015-01-27'),(10269,'38.99.82.191','04:37:42 AM','Martes 27 de Enero de 2015 Hora: 04:37:42 AM','1422333462','2015-01-27'),(10270,'66.220.152.119','02:08:14 PM','Martes 27 de Enero de 2015 Hora: 02:08:14 PM','1422367694','2015-01-27'),(10271,'190.235.138.11','02:08:15 PM','Martes 27 de Enero de 2015 Hora: 02:08:15 PM','1422367695','2015-01-27'),(10272,'38.99.82.221','04:08:58 PM','Martes 27 de Enero de 2015 Hora: 04:08:58 PM','1422374938','2015-01-27'),(10273,'38.99.82.193','05:37:47 PM','Martes 27 de Enero de 2015 Hora: 05:37:47 PM','1422380267','2015-01-27'),(10274,'190.199.165.215','05:57:24 PM','Miércoles 28 de Enero de 2015 Hora: 05:57:24 PM','1422467844','2015-01-28'),(10275,'200.121.239.67','02:59:54 AM','Jueves 29 de Enero de 2015 Hora: 02:59:54 AM','1422500394','2015-01-29'),(10276,'66.249.79.13','04:32:26 AM','Jueves 29 de Enero de 2015 Hora: 04:32:26 AM','1422505946','2015-01-29'),(10277,'66.249.79.29','09:02:16 PM','Jueves 29 de Enero de 2015 Hora: 09:02:16 PM','1422565336','2015-01-29');

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
  `crescontenido` varchar(500) DEFAULT NULL,
  `ctagcontenido` varchar(255) DEFAULT NULL,
  `ccodinterno` varchar(30) DEFAULT NULL,
  `ccodmoneda` varchar(1) NOT NULL,
  `nstocontenido` decimal(12,3) NOT NULL DEFAULT '0.000',
  `cimgcontenido` varchar(150) DEFAULT NULL,
  `cestcontenido` varchar(1) NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenido` */

insert  into `contenido`(`ccodcontenido`,`ccodpage`,`ccodcategoria`,`ccodmodulo`,`ccodestcontenido`,`cnomcontenido`,`camicontenido`,`crescontenido`,`ctagcontenido`,`ccodinterno`,`ccodmoneda`,`nstocontenido`,`cimgcontenido`,`cestcontenido`,`ctipcontenido`,`curlcontenido`,`nviscontenido`,`cestcomentario`,`cestcompartirredes`,`nnrocomentario`,`dfeccontenido`,`ccodusuario`,`dfecmodifica`,`precio`,`precio_oferta`,`garantia`,`codigo_curso`,`duracion_curso`,`inicioclases`,`modalidad_curso`) values ('12172806141221221332IKTP','12172806','1','1200','1201','fotos 1ra visita ancon cuarto contingente 93','fotos-1ra-visita-ancon-cuarto-contingente-93','','',NULL,'','0.000','/cuarto-contingente-93-comandante.jpg','1','1','',0,'0','0',0,'2014-12-21 00:00:00','1','2014-12-21 12:13:56','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('1217280614122121531750W9','12172806','1','1200','1201','1ra visita infanteria','1ra-visita-infanteria','','',NULL,'','0.000','/1ra-visita-ancon-cuarto-contingente-93.jpg','1','1','',3,'0','0',0,'2014-12-21 00:00:00','1','2014-12-21 12:12:40','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806141225225820BZDF','12172806','1','1100','1103','Pasando rancho visita Infanteria Marina 2014','pasando-rancho-visita-infanteria-marina-2014','','',NULL,'','0.000','/pasando-rancho-visita-infanteria-marina-2014.jpg','1','1','',76,'1','1',0,'2014-12-25 00:00:00','1','2014-12-29 00:12:45','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('121728061412260122270H6T','12172806','1','1100','1103','Todos los Contingentes reunidos visita Infanteria de Marina 2014','todos-los-contingentes-reunidos-visita-infanteria-de-marina-2014','','',NULL,'','0.000','/todos-reunidos-visita-ancon.jpg','1','1','',141,'1','1',0,'2014-12-26 00:00:00','1','2014-12-31 08:06:05','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806141226025538F95O','12172806','1','1100','1103','Banderin cuarto contingente 93','banderin-cuarto-contingente-93','','',NULL,'','0.000','/banderin-cuarto-contingente-93.jpg','1','1','',110,'1','1',0,'2014-12-26 00:00:00','1','2014-12-29 09:31:29','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806141226025820JY6T','12172806','1','1100','1103','Recibiendo instruccion Balim 5','recibiendo-instruccion-balim-5','','',NULL,'','0.000','/recibiendo-instruccion.jpg','1','1','',110,'1','1',0,'2014-12-26 00:00:00','1','2014-12-27 13:04:07','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806141226032315H9U2','12172806','1','1100','1103','Cuarto Contingente 93 visita Infanteria Marina 2014','cuarto-contingente-93-visita-infanteria-marina-2014','','',NULL,'','0.000','/formacion-1-visita-infanteria-2014.jpg','1','1','',330,'1','1',0,'2014-12-26 00:00:00','1','2014-12-29 09:34:41','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806141226041222EABD','12172806','1','1100','1104','Cuarto contingente Noviembre 93 <br>Ex-infantes de Marina del Perú','cuarto-contingente-noviembre-93-<br>ex-infantes-de-marina-del-peru','','',NULL,'','0.000','','1','1','',266,'1','0',0,'2014-12-26 00:00:00','1','2014-12-27 13:03:12','0','0','3 Meses','','1 Mes','1970-01-01','Virtual'),('12172806150101223052NTNN','12172806','1','1100','1101','1ra visita infanteria','1ra-visita-infanteria','','',NULL,'','0.000','','1','1','',0,'0','0',0,'2015-01-01 00:00:00','1','2015-01-01 12:30:52','0','0','6','','1 Mes','1970-01-01','Virtual'),('12172806150114123405SJB5','12172806','1','1100','1104','aviso-logueado','aviso-logueado','','',NULL,'','0.000','','1','1','',73,'0','0',0,'2015-01-14 00:00:00','1','2015-01-14 02:34:05','0','0','6','','1 Mes','1970-01-01','Virtual');

/*Table structure for table `contenidodetalle` */

DROP TABLE IF EXISTS `contenidodetalle`;

CREATE TABLE `contenidodetalle` (
  `ccodcontenido` varchar(24) NOT NULL,
  `cdetcontenido` longtext NOT NULL,
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenidodetalle` */

insert  into `contenidodetalle`(`ccodcontenido`,`cdetcontenido`) values ('',''),('1217280614122121531750W9',''),('12172806141225225820BZDF',''),('121728061412260122270H6T','<p>Todos los contingentes reunidos 2014 en nuestra segunda casa Infanteria de Marina, cuarto contingente Noviembre 93,&nbsp;<span>primer contingente marzo 93&nbsp;</span></p>'),('12172806141226025538F95O','<p>Banderin del cuarto contingente 93 fuerza de Infanteria de Marina del Per&uacute;</p>'),('12172806141226025820JY6T',''),('12172806141226032315H9U2','<p>En formaci&oacute;n para la visita 2014 de Nuestra segunda casa Infanteria de Marina del Per&uacute;.</p>\r\n<p>cuarto contingente Noviembre 93</p>'),('12172806141226041222EABD','<p><span>Somos &nbsp;los integrantes que conformaron el&nbsp;</span><strong>cuarto contingente noviembre 93&nbsp;</strong><span>(compa&ntilde;ias Alfa , Bravo , Charly , Delta , Echo , Foxtrop) Ex-Infantes de Marina del Per&uacute;.</span></p>\r\n<p><span><span>Con esta web pretendemos crear un punto de encuentro entre todos los compa&ntilde;eros&nbsp;que&nbsp;<span>&nbsp;compartimos aquellos meses en la Infanter&iacute;a de Marina del Per&uacute;.&nbsp;</span></span></span></p>'),('12172806150101223052NTNN',''),('12172806150114123405SJB5','<div class=\"ctn_aviso_logueado\">Usted a Iniciado session, <a href=\"/include/control-usuario/salir.php\">Desconectate</a> de tu cuenta , Para poder registrar otro Usuario .</div>');

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
  `dfecmodifica` date DEFAULT NULL
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

insert  into `contenidounidad`(`ccodunidad`,`ccodcontenido`,`cnomunidad`,`nfacunidad`,`nstounidad`,`npreunidad`,`npreoferta`,`cestunidad`) values (1,'12172806140825111214XO63','reparaciones-de-celulares-chinos',NULL,NULL,NULL,NULL,NULL),(2,'121728061408280821463AHY','software-hardware',NULL,NULL,NULL,NULL,NULL),(3,'121728061408262137246UUQ','Curso reparaciones celulares',NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=982 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `doctorresponde` */

insert  into `doctorresponde`(`id`,`id_noticia`,`nombre`,`comentario`,`fechacorta`,`fechalarga`,`titulo`,`email`,`aceptado`,`imagenfoto`,`parent_id`,`mostrarportada`,`rutaimagen`,`idcate`,`respuestaenviada`,`idsubcate`,`procedencia`,`id_cliente`,`telefono`,`idSubSubcate`) values (978,'','alfredo gavilan ruiz yann','me da gusto que se hallan reunido y tambien les envidio porque yo tambien quise participar porque siempre los recuerdo to lo que hemos pasadfo en la zona de emergencia saludos compañeros\r\n','2015-01-16','Viernes 16 de Enero de 2015 Hora: 02:36:09 AM','patrulla pantera y acuar','alfredo@hotmail.com',1,'/modulos/comentario-combinado-multiple/usuario-anonimo.gif',0,1,'',0,0,0,'Noticias',0,'',0);

/*Table structure for table `estiloclases` */

DROP TABLE IF EXISTS `estiloclases`;

CREATE TABLE `estiloclases` (
  `ccodclase` int(11) NOT NULL AUTO_INCREMENT,
  `ccodplantilla` varchar(6) DEFAULT NULL,
  `cnomclase` varchar(50) DEFAULT NULL,
  `cdesclase` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ccodclase`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `estiloclases` */

insert  into `estiloclases`(`ccodclase`,`ccodplantilla`,`cnomclase`,`cdesclase`) values (1,'0001','inicio','inicio'),(2,'0001','contenido','contenido'),(3,'0001','portada-laterales','portada-laterales'),(4,'0001','saludos','saludos'),(5,'0001','portada','portada'),(6,'0001','vacio','vacio'),(7,'0001','stylo_col_4','stylo_col_4'),(8,'0001','fondocate','fondocate'),(9,'0001','art_listado_01','art_listado_01'),(10,'0001','enlaces_pie','enlaces_pie');

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

insert  into `estilocontenido`(`ccodestcontenido`,`ccodmodulo`,`cnomestcontenido`,`cimgestcontenido`,`cestestcontenido`,`cincestcontenido`) values ('1101','1100','Imagen derecha','estilo_imgderecha.gif','1','articuloderecha.php'),('1102','1100','Imagen izquierda','estilo_imgizquierda.gif','1','articuloizquierda.php'),('1103','1100','Imagen centro','estilo_imgcentro.gif','1','articulocentro.php'),('1104','1100','Pagina','estilo_imgpagina.gif','1','articulopagina.php'),('1201','1200','Imagen derecha','estilo_imgderecha.gif','1','catalogoderecha.php'),('1202','1200','Imagen izquierda','estilo_imgizquierda.gif','1','catalogoizquierda.php'),('1203','1200','Imagen Central','estilo_imgcentro.gif','1','catalogocentro.php'),('1901','1300','Imagen derecha','estilo_imgderecha.gif','1','paquetesderecha.php'),('1902','1300','Imagen izquierda','estilo_imgizquierda.gif','1','paquetesizquierda.php'),('1903','1300','Imagen centro','estilo_imgcentro.gif','1','paquetescentro.php'),('2001','1500','Vista de Anuncio','vistanuncio.gif','1','anunciosver.php');

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
  `sBase0` varchar(800) DEFAULT NULL COMMENT 'ruta real / física',
  `sName0` varchar(100) DEFAULT NULL COMMENT 'titulo 1 assetmanager',
  PRIMARY KEY (`ccodplantilla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `estilopagina` */

insert  into `estilopagina`(`ccodplantilla`,`cnomplantilla`,`crutaplan`,`cestplantilla`,`cimgplantilla`,`ccodpage`,`webancho`,`webfondocolor`,`webfondoimagen`,`webfondorepetir`,`webestilo`,`webtexto`,`webmsup`,`webminf`,`cabeceraalto`,`cabecerafondocolor`,`cabecerafondoimagen`,`cabemenualto`,`cabemenufondocolor`,`cabemenufondoimagen`,`cabecontenidoalto`,`cabecontenidofondocolor`,`cabecontenidofondoimagen`,`columnaizqancho`,`cuerpofondocolor`,`cuerpofondoimagen`,`columnacenancho`,`columnaderancho`,`piecontenidoalto`,`piecontenidofondocolor`,`piecontenidofondoimagen`,`piemenualto`,`piemenufondocolor`,`piemenufondoimagen`,`piealto`,`piefondocolor`,`piefondoimagen`,`menusupalinea`,`menusupmizq`,`menusupmder`,`menusupancho`,`menusupalto`,`menusupcolor`,`menusupimagen`,`menusuptexto`,`menusupactcolor`,`menusupactimagen`,`menusupacttexto`,`menupiealinea`,`menupiemizq`,`menupiemder`,`menupieancho`,`menupiealto`,`menupiecolor`,`menupieimagen`,`menupietexto`,`menupieactcolor`,`menupieactimagen`,`menupieacttexto`,`menuhortituloalto`,`menuhortitulocolor`,`menuhortituloimagen`,`menuhortitulotexto`,`menuhoritemalto`,`menuhoritemcolor`,`menuhoritemimagen`,`menuhoritemtexto`,`menuhoritemactcolor`,`menuhoritemactimagen`,`menuhoritemacttexto`,`menuhorpiealto`,`menuhorpiecolor`,`menuhorpieimagen`,`hometituloalto`,`hometitulocolor`,`hometituloimagen`,`hometitulotxtcolor`,`ccodusuario`,`dfecmodifica`,`tipo_slider_banner`,`propaganda_1_1`,`propaganda_1_2`,`propaganda_1_3`,`titulo_propaganda_1_1`,`titulo_propaganda_1_2`,`titulo_propaganda_1_3`,`texto_propaganda_1_1`,`texto_propaganda_1_2`,`texto_propaganda_1_3`,`sBaseVirtual0`,`sBase0`,`sName0`) values ('0001','cuarto_contingente','','1','tp0001.jpg','12172806','980','00142f','bg.jpg','Z','3','000000','0','0','125','','cabecera.png','40','ffffff','menucabecera.jpg','','FFFFFF','','0','','contenido.png','730','250','','','','40','ffffff','menucabecera.jpg','80','ffffff','','right','10','10','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','000000','right','0','0','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','191919','40','ffffff','menuizqtitulo.jpg','ffffff','30','ff7f00','','ffffff','5fbf00','','00ffff','0','FFFFFF','','35','005fbf','','ffffff','11061212','2011-12-28 00:00:00','jFlow','imagen/Venta-de-Boxes.gif','imagen/curso-reparacion-de-celulares.gif','imagen/reparacion-de-celulares.gif','Venta de Boxes<br/>Cajas de Desbloqueo y Reparación de Celulares','Curso de Reparación de Celulares','Reparación de Celulares','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio\">Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Se brinda Soporte y Asesoramiento\">Se brinda Soporte y Asesoramiento.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Los mejores precios del mercado\">Los mejores precios del mercado.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Asesoria para formar tu propio Negocio\">Asesoria para formar tu propio Negocio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Profesores Capacitados\">Profesores Capacitados.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Manuales de Servicio y Diagramas Todas las Marcas\">Manuales de Servicio y Diagramas Todas las Marcas.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Trabajamos con todas las marcas y modelos de celulares\">Trabajamos con todas las marcas y modelos de celulares.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips\">Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Servicio de JTAG para reparacion de boot para telefonos muertos\">Servicio de JTAG para reparacion de boot para telefonos muertos.</p>','/imagen','E:/Alex/Web/xampp/htdocs/desarrollo.com/imagen','imagen');

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

insert  into `estiloseccion`(`ccodsecestilo`,`cnomsecestilo`,`cimgsecestilo`,`cestsecestilo`,`cincsecestilo`,`ccodmodulo`,`cactusuario`) values ('1101','Pagina','estilo_imgpagina.gif','1','articulo_estilo01.php','1100','0'),('1102','Resumen','estiloresumen.gif','1','articulo_estilo02.php','1100','0'),('1103','Resumen doble','estiloresumendoble.gif','1','articulo_estilo03.php','1100','0'),('1104','Listado','estilolistado.gif','1','articulo_estilo04.php','1100','0'),('1105','Listado doble','estilolistadoble.gif','1','articulo_estilo05.php','1100','0'),('1106','Galeria','estilogaleria.gif','1','articulo_estilo06.php','1100','0'),('1201','Pagina','estilo_imgpagina.gif','1','catalogo_estilo01.php','1200','0'),('1202','Resumen (1)','estiloresumen.gif','1','catalogo_estilo02.php','1200','0'),('1203','Resumen doble','estiloresumendoble.gif','1','catalogo_estilo03.php','1200','0'),('1204','Listado','estilolistado.gif','1','catalogo_estilo04.php','1200','0'),('1205','Listado precios','estilolistadoble.gif','1','catalogo_estilo05.php','1200','0'),('1206','Galeria','estilogaleria.gif','1','catalogo_estilo06.php','1200','0'),('1401','Album','estilogaleria.gif','1','fotos_estilos01.php','1400','0'),('1402','Estilo Full Screen','estilogaleria.gif','1','fotos_estilos02.php','1400','0'),('8801','Contactos','estilosformulario.gif','1','contactenos/contactenos.php','8800','0'),('8802','Buscador','estilosformulario.gif','1','buscador_estilo01.php','8800','0'),('8803','Cotizar','estilosformulario.gif','1','form_cotizar.php','8800',''),('8804','Maps','estilosformulario.gif','1','mapa/form_mapa.php','8800','0'),('1107','Estilo Blog','estiloblog.gif','1','articulo_estilo07.php','1100','0'),('1108','Estilo Blog-Imagen','estiloblog.gif','1','articulo_estilo08.php','1100','0'),('1901','Tienda 1','','1','tienda_virtual/vercarrito.php','1900','0'),('1601','Metodo Pago 1','','1','metodo_pago01.php','1600','0'),('1701','Envio Instruccion Pago 1','','1','envio-instruccion-pagos01.php','1700','0'),('1801','Prod.Listado 1','','1','estilo_pre_01.php','1800','0'),('1802','Prod.Ofertas 1','','1','oferta_01.php','1800','0'),('1207','Estilo Curso Resumen 01','','1','style-curso-resumen-01.php','1200','0'),('1803','Curso Listado 1','','1','estilo_pre-curso_01.php','1800','0'),('1109','Listado Numeros','','1','articulo_estilo09.php','1100','0'),('1804','Lstdo Hori 2nivel','','1','stilo-lis-hori-01.php','1800','0'),('1805','Lstdo Hori Pro IMG','','1','stilo-lis-hori-img-01.php','1800','0'),('1806','infinitecarousel 2','','1','infinitecarousel2.php','1800','0'),('8805','Registro Contingente ','estilosformulario.gif','1','form-registro-contingente.php','8800','0'),('1110','Listado Comentarios','estilolistado.gif','1','articulo_estilo10.php','1100','0'),('8806','Formulario Acceso','estilosformulario.gif','1','form-iniciar-sesion.php','8800','0'),('8807','Configuracion Usuario','estilosformulario.gif','1','form-configuracion-usuario.php','8800','0'),('1807','Listado Comentario Portada','','1','listado-comentario-portada.php','1800','0'),('1808','Listado Usuario Portada','','1','listado-usuarios-portada.php','1800','0'),('8808','Formulario Recordar Contrasena','estilosformulario.gif','1','form-recordatorio-contrasena.php','8800','0');

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

insert  into `menu`(`idmenu`,`titulo`,`descripcion`,`estado`) values (1,'cabecera','<p>cabecera</p>','-2'),(2,'dasdsa','','-2'),(3,'dsadsa','','-2'),(4,'dasd','<p>dasd</p>','-2'),(5,'cabecera','','1'),(6,'pie','','1');

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
  `tmovil` varchar(50) DEFAULT NULL,
  `nextel` varchar(50) DEFAULT NULL,
  `cod_google_map` varchar(1000) DEFAULT NULL,
  `anchomapa` varchar(20) DEFAULT NULL,
  `altomapa` varchar(20) DEFAULT NULL,
  `credYoutube` varchar(200) DEFAULT NULL,
  `credTwitter` varchar(200) DEFAULT NULL,
  `credFacebook` varchar(200) DEFAULT NULL,
  `ccodmodulo` varchar(4) DEFAULT NULL,
  `rpm` varchar(100) DEFAULT NULL,
  `rpc` varchar(100) DEFAULT NULL,
  `cprovincia` varchar(300) DEFAULT NULL,
  `imagen_mapa` varchar(300) DEFAULT NULL,
  `rutaimages` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ccodpage`),
  UNIQUE KEY `camipage` (`camipage`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `page` */

insert  into `page`(`ccodpage`,`cnompage`,`cnikpage`,`cdocpage`,`crazpage`,`cslogan`,`ccodidioma`,`camipage`,`cdefpage`,`credpage`,`cestpage`,`ctitpage`,`ctagpage`,`cdespage`,`cpiepage`,`canagoogle`,`ccodpais`,`clogo`,`nmosprecio`,`ccodmoneda`,`cfavicon`,`ccodplantilla`,`nvispage`,`cemacontacto`,`cemasoporte`,`cemaventas`,`cdistrito`,`cdirecempresa`,`chorarioatencion`,`ctelefonopri`,`ctelefonosec`,`tfax`,`tmovil`,`nextel`,`cod_google_map`,`anchomapa`,`altomapa`,`credYoutube`,`credTwitter`,`credFacebook`,`ccodmodulo`,`rpm`,`rpc`,`cprovincia`,`imagen_mapa`,`rutaimages`) values ('12172806','Cuarto contingente 93 ','Cuarto contingente 93 ','','','','es','desarrollo.com','1','','1','Cuarto contingente Noviembre 93 ','                                                                                                                                                                                                                                                   ','                                                                                                                                                                                                                                                   ','<br>\nCopyright © 2011 FP Diesel Todos los derechos reservados<br>\nAv. Elmer Faucett 330 Urb. La Colonial - Callao 01 Perú \nTeléfono: +511 4520378 Fax +511 4520378 Nextel: 813*4542 / 813*4197  gerencia@rysdistribuciones.com  \n','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ','PE000000','/imagen/logo.gif','0','D','/banderin-3.ico','0001',112178,'info@cuartocontingente93.com','gerencia@rysdistribuciones.com','','Lima','Dirección : Ex - Infantes de Marina de Guerra del Perú','                                                                                                    ','------','','','','','     <iframe width=\"680px\" height=\"450\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&output=embed\"></iframe><br /><small>Ver <a href=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&source=embed\" style=\"color:#0000FF;text-align:left\">www.gamatell.com</a> en un mapa ampliado</small>                                                                                                                                                                                                                                                                                                                                                                                                                                        ','700','450','','','','1100','','','Lima ','/imagen/mapa.gif','');

/*Table structure for table `pagehome` */

DROP TABLE IF EXISTS `pagehome`;

CREATE TABLE `pagehome` (
  `ccodinicio` int(8) NOT NULL AUTO_INCREMENT,
  `ccodpage` varchar(8) NOT NULL,
  `cnomhome` varchar(100) NOT NULL,
  `ccodclase` int(11) NOT NULL,
  `cesthome` varchar(1) NOT NULL,
  `ctiphome` varchar(1) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

/*Data for the table `pagehome` */

insert  into `pagehome`(`ccodinicio`,`ccodpage`,`cnomhome`,`ccodclase`,`cesthome`,`ctiphome`,`cimgpubli`,`nancho`,`nalto`,`curlpubli`,`cadspubli`,`ccodestilo`,`ccodmodulo`,`ccodseccion`,`ccodcategoria`,`nnroitems`,`ccodorden`,`cubidestino`,`cordpublica`,`cpubsec`,`cpubnom`,`cpubres`,`cpubimg`,`cimgsize`,`dfecinicio`,`dfecfinal`,`anchowin`,`altowin`,`cimagen1`,`curl1`,`titulo_imagen1`,`texto_imagen1`,`cimagen2`,`curl2`,`titulo_imagen2`,`texto_imagen2`,`cimagen3`,`curl3`,`titulo_imagen3`,`texto_imagen3`,`cimagen4`,`curl4`,`titulo_imagen4`,`texto_imagen4`,`cimagen5`,`curl5`,`titulo_imagen5`,`texto_imagen5`,`dfechome`,`estado`,`mostrar_titulo`,`texto1`,`texto2`,`texto3`,`texto4`,`texto5`) values (72,'12172806','banner slider',9,'1','5','',980,350,'','',NULL,'',NULL,'',0,'','1',0,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'/ultimo-operativo-quebrada-inocente.jpg','',NULL,NULL,'/cuarto-contingente-93-cdra.jpg','',NULL,NULL,'/cuarto-contingente-93-comandante.jpg','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-19','','si','Ultimo operativo en Quebrada Inocente , Ancon-Lima ,Soportando el Sudor ,Cansancio ,Fatiga ,Hambre y Sueño pero con la Moral bien Elevada','1era visita Ancón cuarto contingente Noviembre 93  Ex-infantes de Marina del Perú','Cuarto contingente Noviembre 93 en nuestra segunda casa Infanteria de Marina','',''),(68,'12172806','Link de interes',10,'2','3','',NULL,NULL,'','<div class=\"item\">CONADIS</div>\r\n<div class=\"item\">Defensoria del Pueblo</div>\r\n<div class=\"item\">Ministerio de Defensa</div>\r\n<div class=\"item\">Marina de Guerra del Per&uacute;</div>\r\n<div class=\"item\">Ejercito Peruano</div>\r\n<div class=\"item\">Fuerza Aerea del Per&uacute;</div>',NULL,'',NULL,'',0,'','5',0,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-11-17','','si',NULL,NULL,NULL,NULL,NULL),(65,'12172806','1ra visita infanteria',3,'2','3','',NULL,NULL,'','<p><a title=\"Cuarto Contingente Noviembre 93\" href=\"http://www.youtube.com/v/uHnyXFX6rZY&amp;rel=0&amp;autoplay=1\" rel=\"shadowbox;width=500;height=400\"> <img src=\"http://img.youtube.com/vi/uHnyXFX6rZY/0.jpg\" alt=\"\" width=\"99%\" height=\"140px\" /> </a></p>',NULL,'',NULL,'',0,'','2',3,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-11-17','','si',NULL,NULL,NULL,NULL,NULL),(67,'12172806','Contactenos',3,'2','3','',NULL,NULL,'','<div id=\"m_cont_late\">\r\n<div style=\"padding-left: 20px; padding-top: 10px; color: #fff;\">\r\n<p>CONTACTENOS</p>\r\n</div>\r\n<div class=\"bold m_l_5 naranja t16  m_top_20\">Oficina:&nbsp;4539546</div>\r\n<div class=\"clear\">&nbsp;</div>\r\n</div>',NULL,'',NULL,'',0,'','2',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-11-17','','no',NULL,NULL,NULL,NULL,NULL),(73,'12172806','Cuarto contingente Noviembre 93 <br>Ex-infantes de Marina del Perú',4,'1','3','',NULL,NULL,'','<p>Bienvenidos,&nbsp;a todos los integrantes que conformaron el <strong>Cuarto Contingente Noviembre 1993 </strong>(compa&ntilde;ias Alfa , Bravo , Charly , Delta , Eco , Foxtrop) Ex-Infantes de Marina del Per&uacute;.&nbsp;\"Acci&oacute;n y Valor\"</p>',NULL,'',NULL,'',0,'','3',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-20','','no',NULL,NULL,NULL,NULL,NULL),(74,'12172806','Noticias Portada',9,'1','4','',NULL,NULL,'','','1806','1100','121728062004000000000000','0',10,'1','3',2,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-25','','no',NULL,NULL,NULL,NULL,NULL),(75,'12172806','Gorro Camuflado',3,'2','1','/gorro-ima.jpg',200,100,'','',NULL,'',NULL,'',0,'','4',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-26','','si',NULL,NULL,NULL,NULL,NULL),(76,'12172806','Balim 5',3,'1','1','/balim-5-960x640.jpg',200,140,'','',NULL,'',NULL,'',0,'','4',3,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-26','','si',NULL,NULL,NULL,NULL,NULL),(77,'12172806','Himno Infantería Marina Perú',3,'1','3','',NULL,NULL,'','<p><a title=\"Himno de Infanter&iacute;a de Marina del Per&uacute;\" href=\"http://www.youtube.com/v/p5qBXo3rHJM&amp;rel=0&amp;autoplay=1\" rel=\"shadowbox;width=500;height=400\"> <img src=\"http://img.youtube.com/vi/p5qBXo3rHJM/1.jpg\" alt=\"\" width=\"99%\" height=\"140px\" /> </a></p>',NULL,'',NULL,'',0,'','2',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-26','','si',NULL,NULL,NULL,NULL,NULL),(78,'12172806','Video Balim 5',3,'1','3','',NULL,NULL,'','<p><a title=\"Combatientes Balim 5\" href=\"http://www.youtube.com/v/wtUI-OyuLe8&amp;rel=0&amp;autoplay=1\" rel=\"shadowbox;width=500;height=400\"> <img src=\"http://img.youtube.com/vi/wtUI-OyuLe8/0.jpg\" alt=\"\" width=\"99%\" height=\"140px\" /> </a></p>',NULL,'',NULL,'',0,'','2',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-12-26','','si',NULL,NULL,NULL,NULL,NULL),(79,'12172806','Registrate',6,'1','3','',NULL,NULL,'','<div><a id=\"boton_css\" href=\"../registrate\"> Registrate </a></div>',NULL,'',NULL,'',0,'','2',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-01-06','','no',NULL,NULL,NULL,NULL,NULL),(80,'12172806','Comenta',6,'1','3','',NULL,NULL,'','<div><a id=\"boton_css\" href=\"../comenta\"> Comenta</a></div>',NULL,'',NULL,'',0,'','4',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-01-13','','no',NULL,NULL,NULL,NULL,NULL),(81,'12172806','Listado Comentarios Portada',9,'1','4','',NULL,NULL,'','','1807','1100','121728062000000000000000','0',1,'1','4',2,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-01-30','','no',NULL,NULL,NULL,NULL,NULL),(82,'12172806','Listado Usuario Portada',9,'1','4','',NULL,NULL,'','','1808','1100','121728062000000000000000','0',1,'1','5',0,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-01-30','','no',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pagehomedet` */

DROP TABLE IF EXISTS `pagehomedet`;

CREATE TABLE `pagehomedet` (
  `ccodinicio` int(8) NOT NULL,
  `ccoddestino` varchar(24) NOT NULL,
  PRIMARY KEY (`ccodinicio`,`ccoddestino`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pagehomedet` */

insert  into `pagehomedet`(`ccodinicio`,`ccoddestino`) values (11,'D'),(12,'D'),(13,'D'),(14,'D'),(65,'T'),(67,'T'),(68,'T'),(72,'T'),(73,'D'),(74,'D'),(75,'T'),(76,'T'),(77,'T'),(78,'T'),(79,'T'),(80,'T'),(81,'T'),(82,'T');

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
  PRIMARY KEY (`ccodmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `pagemenu` */

insert  into `pagemenu`(`ccodmenu`,`ccodpage`,`cnommenu`,`cubimenu`,`cclamenu`,`cestmenu`,`cmenuorden`) values (1,'12172806','Cabecera','1','','1','0'),(3,'12172806','Pie','5','','1','');

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
  PRIMARY KEY (`ccodsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pagesucursal` */

insert  into `pagesucursal`(`ccodsucursal`,`ccodpage`,`ctipsucursal`,`cnomsucursal`,`cdessucursal`,`ccodubigeo`,`cdiroficina`,`clatsucursal`,`clonsucursal`,`ctelsucursal`,`cfaxsucursal`,`cmovsucursal`,`cnexsucursal`,`cemasucursal`,`curlsucursal`,`cestsucursal`,`dfecsucursal`,`dfecmodifica`,`ccodusuario`,`cod_google_map`,`anchomapa`,`altomapa`,`horario_atencion`,`localprincipal`) values (1,'12172806','01','Callao','','','jr callao','','','4520378','4520378','813*4542','','gerencia@rysdistribuciones.com','www.rysdistribuciones.com','1','2011-08-01','2014-08-22 23:28:30','11061212','<iframe width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&output=embed\"></iframe><br /><small>Ver <a href=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&source=embed\" style=\"color:#0000FF;text-align:left\">www.gamatell.com</a> en un mapa más grande</small>                                                                                                                                                                                                                                                                                                                                                                ','660','450','Lunes a Viernes de  8 Am - 5 Pm                                    ','si');

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
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

insert  into `pedido`(`id_pedido`,`ccodcontenido`,`cnomcontenido`,`precio`,`cimgcontenido`,`atendido`,`IP`) values (1,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(2,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(3,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(4,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(5,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(6,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(7,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(8,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(9,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(10,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(11,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(12,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(13,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(14,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(15,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(16,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(17,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(18,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(19,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(20,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(21,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(22,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(23,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(24,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(25,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(26,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(27,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(28,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(29,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(30,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(31,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(32,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(33,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(34,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(35,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(36,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(37,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(38,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(39,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(40,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(41,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(42,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(43,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(44,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(45,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(46,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(47,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(48,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(49,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(50,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(51,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(52,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(53,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(54,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(55,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(56,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(57,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(58,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(59,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(60,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(61,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(62,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(63,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(64,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(65,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(66,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(67,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(68,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(69,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(70,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(71,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(72,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(73,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(74,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(75,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(76,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(77,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(78,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(79,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(80,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(81,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(82,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(83,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(84,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(85,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(86,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(87,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(88,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(89,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(90,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(91,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(92,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(93,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(94,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(95,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(96,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(97,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(98,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(99,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(100,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(101,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(102,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(103,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(104,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(105,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(106,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(107,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(108,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(109,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(110,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(111,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(112,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(113,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(114,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(115,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(116,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(117,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(118,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(119,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(120,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(121,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(122,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(123,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(124,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(125,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(126,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(127,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(128,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(129,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(130,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(131,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(132,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(133,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(134,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(135,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(136,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(137,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(138,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(139,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(140,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(141,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(142,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(143,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(144,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(145,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(146,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(147,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(148,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(149,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(150,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(151,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(152,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(153,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(154,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(155,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(156,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(157,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(158,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(159,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(160,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(161,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(162,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(163,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(164,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(165,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(166,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(167,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(168,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(169,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(170,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(171,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(172,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(173,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(174,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(175,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(176,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(177,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(178,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(179,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(180,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(181,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(182,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(183,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(184,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(185,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(186,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(187,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(188,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(189,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(190,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(191,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(192,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(193,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(194,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(195,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(196,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(197,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(198,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(199,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(200,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(201,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(202,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(203,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(204,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(205,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(206,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(207,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(208,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(209,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(210,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(211,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(212,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(213,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(214,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(215,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(216,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(217,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(218,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(219,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(220,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(221,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(222,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(223,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(224,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(225,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(226,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(227,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(228,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(229,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(230,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(231,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(232,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(233,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(234,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(235,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(236,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(237,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(238,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(239,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(240,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(241,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(242,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(243,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(244,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(245,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(246,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(247,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(248,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(249,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(250,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(251,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(252,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(253,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(254,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(255,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(256,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(257,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(258,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(259,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(260,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(261,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(262,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(263,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(264,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(265,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(266,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(267,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(268,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(269,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(270,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(271,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(272,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(273,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(274,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(275,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(276,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(277,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(278,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(279,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(280,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(281,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(282,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(283,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(284,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(285,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(286,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(287,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(288,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(289,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(290,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(291,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(292,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(293,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(294,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(295,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(296,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(297,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(298,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(299,'12172806140911004642H1LF','4SE Dongle','69','/web/12172806/fotos/productos/4se-dongle.jpg','NO','127.0.0.1'),(300,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(301,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(302,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(303,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(304,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(305,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(306,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(307,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(308,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(309,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(310,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(311,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(312,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(313,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(314,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(315,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(316,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(317,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(318,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(319,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(320,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(321,'12172806140911004840X5UV','Smart-Clip con S-Card + Smart Adaptor','299','/web/12172806/fotos/productos/smart-clip-con-s-card-plus-smart-adaptor.jpg','NO','127.0.0.1'),(322,'12172806140911004815AU11','ZZ-Key','90','/web/12172806/fotos/productos/zz-key.jpg','NO','127.0.0.1'),(323,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(324,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(325,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(326,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(327,'121728061409110047084ADA','UFS 3 Tornado','40','/web/12172806/fotos/productos/ufs-3-tornado.jpg','NO','127.0.0.1'),(328,'121728061409110046233KJG','GB-Key','110','/web/12172806/fotos/productos/gb-key.jpg','NO','127.0.0.1'),(329,'12172806140911004604ZAW4','Universal Box Dongle','330','/web/12172806/fotos/productos/universal-box-dongle.jpg','NO','127.0.0.1'),(330,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(331,'1217280614091100445719XN','Vygis','210','/web/12172806/fotos/productos/vygis.jpg','NO','127.0.0.1'),(332,'1217280614091100442897HV','SigmaKey','220','/web/12172806/fotos/productos/sigmakey.jpg','NO','127.0.0.1'),(333,'12172806140911004407J14E','Polar Box 3','220','/web/12172806/fotos/productos/polar-box-3.jpg','NO','127.0.0.1'),(334,'121728061409110043459CLC','Omnia Repair Tool (sin adaptadores JTAG)','190','/web/12172806/fotos/productos/omnia-repair-tool-sin-adaptadores-jtag.jpg','NO','127.0.0.1'),(335,'12172806140911004325VMDE','Octopus Box-Liberacion y Flasheo de celulares LG (Diseño nuevo)','200','/web/12172806/fotos/productos/octopus-box-liberaci-and-oacute-n-y-flasheo-de-celulares-lg-dise-and-ntilde-o-nuevo.jpg','NO','127.0.0.1'),(336,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(337,'121728061409110042370XHM','MXBOX Orange HTI PLUS con tarjeta','60','/web/12172806/fotos/productos/mxbox-orange-hti-plus-con-tarjeta.jpg','NO','127.0.0.1'),(338,'12172806140911004215DK4W','Medusa Box - Herramienta JTAG para muchas marcas','180','/web/12172806/fotos/productos/medusa-box-herramienta-jtag-para-muchas-marcas.jpg','NO','127.0.0.1'),(339,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(340,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(341,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(342,'12172806140911004043W0C5','GPG JTAG Box','160','/web/12172806/fotos/productos/gpg-jtag-box.jpg','NO','127.0.0.1'),(343,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(344,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(345,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(346,'12172806140819080130DGH4','Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.)','130','/web/12172806/fotos/productos/caja-selg-fusion-box-se-tool-con-tarjeta-se-tool-con-software-y-juego-de-cables-10-uds-.jpg','NO','127.0.0.1'),(347,'12172806140911004148Z5KQ','Infinity Plus Combo Pack','300','/web/12172806/fotos/productos/infinity-plus-combo-pack.jpg','NO','127.0.0.1'),(348,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(349,'121728061409110038464WD1','Avator Box','150','/web/12172806/fotos/productos/avator-box.gif','NO','127.0.0.1'),(350,'12172806140911004021SMRK','Furious Gold activada con todos los packs','430','/web/12172806/fotos/productos/furious-gold-activada-con-todos-los-packs.jpg','NO','127.0.0.1'),(351,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(352,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(353,'12172806140911004731XNXM','HWK','80','/web/12172806/fotos/productos/hwk.jpg','NO','127.0.0.1'),(354,'12172806140911004755WC7R','Sagem DD con juego de adaptadores de TP','160','/web/12172806/fotos/productos/sagem-dd-con-juego-de-adaptadores-de-tp.jpg','NO','127.0.0.1'),(355,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(356,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(357,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(358,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(359,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(360,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(361,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(362,'12172806140911004902R4ZQ','RIFF JTAG','160','/web/12172806/fotos/productos/riff-jtag.jpg','NO','127.0.0.1'),(363,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(364,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(365,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(366,'1217280614091100412717XV','Volcano Box - phone unlocking tool for Chinese mobiles','160','/web/12172806/fotos/productos/volcano-box-phone-unlocking-tool-for-chinese-mobiles.jpg','NO','127.0.0.1'),(367,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(368,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(369,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(370,'12172806140911004521TJ6Y','Pegasus Box para liberar, reparar, flashear teléfonos Samsung','150','/web/12172806/fotos/productos/pegasus-box-para-liberar-reparar-flashear-tel-and-eacute-fonos-samsung.jpg','NO','127.0.0.1'),(371,'12172806140911004304KOAL','NS Pro','130','/web/12172806/fotos/productos/ns-pro.jpg','NO','127.0.0.1'),(372,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(373,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1'),(374,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(375,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(376,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(377,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(378,'12172806140911004107PIPU','Cyclone Box','100','/web/12172806/fotos/productos/cyclone-box.jpg','NO','127.0.0.1'),(379,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(380,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(381,'12172806140911003912VNIG','GPG Dragon','130','/web/12172806/fotos/productos/gpg-dragon.jpg','NO','127.0.0.1');

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `codpro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nompro` varchar(30) NOT NULL,
  `prepro` decimal(10,2) NOT NULL,
  PRIMARY KEY (`codpro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

insert  into `producto`(`codpro`,`nompro`,`prepro`) values (1,'Disco duro 200 GB','80.00'),(2,'Memoria RAM 1GB','30.00'),(3,'Lectora DVD','24.00'),(4,'Memoria USB 2 GB','20.00'),(5,'Tarjeta de Video 512MB','180.00');

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

insert  into `productos`(`idproductos`,`marca`,`detalle_articulo`,`idcategoria`,`idsubcategoria`,`detalle_curso`,`preciosoles`,`preciosolesoferta`,`cantidad`,`mostrar`,`fecha`,`fechacorta`,`idcampana`,`borrado`,`en_oferta`,`curso`,`duracion`,`inicioclases`,`modalidad`,`titulo`,`orden`,`estado`,`imagen`,`codigo_curso`,`tipo`,`amigable`) values (6,'','<div class=\"contenedor_derecha\">\r\n<h1><strong>Quienes Somos</strong></h1>\r\n<p><img style=\"float: right;\" src=\"/imagen/presentacion.gif\" alt=\"texto alternativo\" width=\"285\" height=\"222\" /></p>\r\n<div id=\"texto\">\r\n<p align=\"justify\"><strong>Soluciones Enterprice S.A.C.</strong> es un conjunto de profesionales multidisciplinario de investigaci&oacute;n, consultor&iacute;a y docencia, que opera con sede en Lima, oficinas descentralizas.</p>\r\n<p align=\"justify\"><strong>Soluciones Enterprice S.A.C.</strong> posee una amplia organizaci&oacute;n adecuada para desarrollar distintos tipos de consultor&iacute;as, para lo cual cuenta con las siguientes <strong>&aacute;reas t&eacute;cnicas</strong>:</p>\r\n<ul>\r\n<li>Catastro.</li>\r\n<li>Topograf&iacute;a y Geodesia.</li>\r\n<li>Medio Ambiente.</li>\r\n<li>Sistemas de Informaci&oacute;n Geogr&aacute;fica y Sistemas.</li>\r\n<li>Ordenamiento del Territorio.</li>\r\n<li>Capacitaci&oacute;n.</li>\r\n<li>Prevenci&oacute;n de Riesgos.</li>\r\n</ul>\r\n</div>\r\n<div id=\"contorno_mision\">\r\n<div class=\"mision\">\r\n<div class=\"titulo\">Misi&oacute;n</div>\r\n<div class=\"detalle\">Brindar soluciones y servicios que apoyen la gesti&oacute;n de las organizaciones y empresas, principalmente a los procesos de toma de decisiones.</div>\r\n</div>\r\n<div class=\"vision\">\r\n<div class=\"titulo\">Visi&oacute;n</div>\r\n<div class=\"detalle\">Brindar soluciones de avanzada e implementar procesos de continua investigaci&oacute;n que nos permitan posicionarnos como la empresa l&iacute;der en de nuestro rubro.</div>\r\n</div>\r\n<div class=\"filosofia\">\r\n<div class=\"titulo\">Filosof&iacute;a</div>\r\n<div class=\"detalle\">Adquisici&oacute;n constante de tecnolog&iacute;a de punta y capacitaci&oacute;n permanente de personal, para proporcionar un servicio de calidad total.</div>\r\n</div>\r\n</div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','Quienes Somos','','1','','','1','quienes-somos'),(7,'','<div class=\"contenedor_derecha\">\r\n<h1><strong>Proyectos y asesor&iacute;as en planificaci&oacute;n y gesti&oacute;n territorial, para el apoyo a su empresa en temas de:</strong></h1>\r\n<div class=\"ctn_general_texto\">\r\n<div class=\"ctn_texto_img_dere\"><br /> <br />\r\n<ul type=\"disc\">\r\n<li>Determinar ubicaci&oacute;n para construcciones: centros m&eacute;dicos, supermercados, escuelas, &aacute;reas verdes, entre otros.</li>\r\n<li>\r\n<p>Determinar zonas ambientales: potenciales</p>\r\n</li>\r\n<li>\r\n<p>Uso del territorio, atractivo tur&iacute;stico y econ&oacute;mico (recaudaci&oacute;n de fondos).</p>\r\n</li>\r\n<li>\r\n<p>Zonas de equipamiento, servicios, protecci&oacute;n social.</p>\r\n</li>\r\n<li>\r\n<p>Monitoreo con im&aacute;genes satelitales, planos para la focalizaci&oacute;n de recursos de su empresa, entre otros</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"imagen\"><img src=\"/imagen/ingenieria-civil-y-tecnologias-de-la-construccion-300x350.gif\" alt=\"\" width=\"234\" height=\"273\" /></div>\r\n</div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','proyectos','','1','','','1','proyectos'),(8,'','<div id=\"contenedor_derecha\">\r\n<h1>Servicio de Topograf&iacute;a y Cartograf&iacute;a</h1>\r\n<div class=\"ctn_general_texto\">\r\n<div class=\"ctn_texto_img_dere\">\r\n<p align=\"justify\"><strong>Soluciones Enterprice S.A.C.</strong> ofrece servicios y consultor&iacute;a de topograf&iacute;a, cartograf&iacute;a y sistemas de informaci&oacute;n geogr&aacute;fica.</p>\r\n<p align=\"justify\">Este abanico de servicios nos permite abarcar todo el proceso relacionado con la informaci&oacute;n geogr&aacute;fica, desde la toma de datos de campo, hasta la edici&oacute;n del mapa o la publicaci&oacute;n de geodatos en internet o DVD.</p>\r\n<p align=\"justify\">Desde los servicios m&aacute;s cl&aacute;sicos de topograf&iacute;a, apoyados en la tecnolog&iacute;a m&aacute;s avanzada de l&aacute;ser y posicionamiento por sat&eacute;lite, hasta los servicios m&aacute;s innovadores, <strong>Soluciones Enterprice S.A.C.</strong> ofrece un amplio abanico de soluciones.</p>\r\n</div>\r\n<div class=\"imagen\"><img src=\"/imagen/topografia.gif\" alt=\"\" width=\"280\" height=\"209\" /></div>\r\n</div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','topografia','','1','','','1','topografia'),(9,'','<div id=\"contenedor_derecha\">\r\n<h1>Servicios de Sistemas de Informaci&oacute;n Geografica GIS</h1>\r\n<p align=\"justify\"><strong>Consultor&iacute;a </strong><br /> Disponemos de un equipo de consultores con amplia experiencia, capaces de analizar la situaci&oacute;n actual de una organizaci&oacute;n y proyectarla al futuro atendiendo a las necesidades expuesta por la direcci&oacute;n. <br /> <strong> Desarrollos a medida </strong><br /> Realizamos desarrollos atendiendo a las necesidades de nuestros clientes. Partimos de los requerimientos expresados por nuestros clientes y aplicando nuestra propia metodolog&iacute;a de desarrollo llegamos a obtener un producto final acorde con los requerimientos expresados<br /> <strong>Implantaci&oacute;n GIS Corporativos (Geosistemas, GIS especializados)</strong><br /> Nos encargamos de la direcci&oacute;n y ejecuci&oacute;n de complejos proyectos de implantaci&oacute;n de GIS Corporativos: GeoSistemas y/o GIS especializados. Cabe resaltar que no estamos vinculados a ning&uacute;n fabricante, tenemos independencia en nuestras implantaciones. Por tanto, tenemos una clara orientaci&oacute;n al cliente e implantamos soluciones alineadas con sus estrategias.</p>\r\n<p align=\"center\"><img src=\"/informacion-geografica-1_clip_image001.jpg\" alt=\"servicios-gis-formacion\" width=\"415\" height=\"237\" /></p>\r\n<p align=\"justify\"><strong>Formaci&oacute;n</strong><br /> Impartimos cursos con el objetivo de formar a nuestros clientes. Los cursos de formaci&oacute;n se preparan especificamente para cubrir las necesidades de nuesrtros clientes, nunca preparamos cursos gen&eacute;ricos orientados al p&uacute;blico en general. Siempre son cursos a medida y nos centramos en las funcionalidades demandadas, utilizamos los datos propios del cliente. <br /> <strong> Outsourcing tecnol&oacute;gico </strong><br /> Tenemos gran experiencia en el outsourcing tecnol&oacute;gico orientado al despliegue de GIS Corporativos. Trabajamos con socios en diferentes datacenter especializados y desplegamos soluciones en la nube. <br /> <strong>Outsourcing TI y procesos empresariales </strong><br /> Estamos especializado tanto en la externalizaci&oacute;n de TI como de los procesos empresariales. Disponemos de un modelo de costes claro, ofrecemos inteligencia e inovaci&oacute;n y garantizamos el cumplimiento del contrato minimizando riesgos.</p>\r\n<p><strong>Movilidad GIS</strong><br /> <br /> Las necesidades de movilidad han llegado al sector de los sistemas de informaci&oacute;n geogr&aacute;fica para facilitar y agilizar los procesos en los que la ubicaci&oacute;n de los elementos es importante. La reducci&oacute;n de costos y la exigente competitividad hacen creciente la necesidad de acceder a la informaci&oacute;n en el momento y lugar en que se origina, as&iacute; como a los datos geogr&aacute;ficos corporativos, desde cualquier dispositivo m&oacute;vil y en cualquier lugar en que nos encontremos.</p>\r\n<p align=\"center\"><img src=\"/informacion-geografica-1_clip_image001_0000.jpg\" alt=\"Geograma_Aplicaciones_mapas_para_telefonos_moviles\" width=\"305\" height=\"210\" /></p>\r\n<p><br /> Gracias a la arquitectura m-GIS desarrollada por <strong>Soluciones Enterprice</strong>, ofrecemos soluciones de movilidad SIG que le permitir&aacute;n:</p>\r\n<ul>\r\n<li>Conectarse a la base de datos corporativa mediante dispositivos m&oacute;viles</li>\r\n<li>Consultar mapas e informaci&oacute;n asociada remotamente</li>\r\n<li>Sincronizar datos geogr&aacute;ficos</li>\r\n<li>Desarrollar aplicaciones m&oacute;viles con funcionalidad geogr&aacute;fica</li>\r\n</ul>\r\n<p>En <strong>Soluciones Enterprice</strong> sabemos que el reto del GIS m&oacute;vil no es s&oacute;lo realizar de forma m&aacute;s eficiente el mismo trabajo que se hac&iacute;a hasta ahora, sino orientar a todos los usuarios hacia un nuevo modelo de GIS: los usuarios, clientes, los servicios, las herramientas, etc,&hellip; cada vez m&aacute;s componentes de los sistemas de informaci&oacute;n geogr&aacute;fica se encuentran fuera de las oficinas.</p>\r\n<p align=\"justify\">&nbsp;</p>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','informacion geografica','','1','','','1','informacion-geografica'),(10,'','<div class=\"contenedor_derecha\">\r\n<h1>Ordenamiento y Gesti&oacute;n Territorial</h1>\r\n<p>Tenemos como objeto social: la prevenci&oacute;n y mitigaci&oacute;n de desastres la gesti&oacute;n de proyectos de habilitaci&oacute;n urbana el catastro e ingenier&iacute;a de valuaciones la auditor&iacute;a y demarcaci&oacute;n territorial el manejo y ordenamiento de cuencas la planificaci&oacute;n territorial y proyectos la elaboraci&oacute;n de cartograf&iacute;a en general en base de planos, mapas, fotograf&iacute;as a&eacute;reas, im&aacute;genes satelitales y base de datos alfanum&eacute;ricos geogr&aacute;ficos asesor&iacute;a y consultor&iacute;a en materia minera, industrial, agricultura, salud, transporte y educaci&oacute;n y estudios hidrol&oacute;gicos, climatol&oacute;gicos y geol&oacute;gicos.</p>\r\n<p align=\"center\"><img src=\"/imagen/gestion-territorial-1.gif\" alt=\"\" width=\"582\" height=\"250\" /></p>\r\n<p align=\"justify\">Dentro de esta marco legal y situacional, Soluciones Enterprice S.A.C. ofrece a las municipalidades interesadas en promover y administrar una ocupaci&oacute;n planificada del territorio y la localizaci&oacute;n de las actividades econ&oacute;micas; el desarrollo, aplicaci&oacute;n y evaluaci&oacute;n de un plan de ordenamiento territorial ambientalmente sustentable con instrumentos de ordenamiento y orientaci&oacute;n adaptados a las condiciones socioecon&oacute;micas y culturales espec&iacute;ficas de cada realidad municipal.</p>\r\n<p align=\"center\"><img src=\"/imagen/gestion-territorial-2.gif\" alt=\"\" width=\"582\" height=\"330\" /></p>\r\n<h2>Entre los Servicios que ofrecemos son :</h2>\r\n<ul>\r\n<li>Propuestas de Limites Distritales.</li>\r\n<li>Plan de Acondicionamiento TerritorialEstudios de Diagnosticos de Zonificacion para la Demarcaci&oacute;n Territorial.</li>\r\n<li>Estudios Territoriales.</li>\r\n<li>Planes Urbanos An&aacute;lisis y monitoreo de cuencas Hidrogr&aacute;ficas.</li>\r\n<li>Sistemas de Gesti&oacute;n Municipal.</li>\r\n</ul>\r\n<table style=\"width: 100%;\" border=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><img src=\"/imagen/gestion-territorial-3.gif\" alt=\"\" width=\"300\" height=\"188\" /></td>\r\n<td>&nbsp;</td>\r\n<td align=\"center\"><img src=\"/imagen/gestion-territorial-4.gif\" alt=\"\" width=\"268\" height=\"188\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','gestion territorial','','1','','','1','gestion-territorial'),(11,'','<div class=\"contenedor_derecha\">\r\n<h1>Catastro Urbano</h1>\r\n<p align=\"justify\">El Catastro es el inventario de bienes inmuebles (terrenos, edificios, etc.), desde esta perspectiva, el catastro es considerado como un sistema de informaci&oacute;n, basado en la realidad inmobiliaria, como base para el desarrollo econ&oacute;mico y social, la administraci&oacute;n de las tierras, la planificaci&oacute;n urbana y rural, el monitoreo ambiental y el desarrollo local, regional y nacional, de esta manera se constituye entonces, en una herramienta fundamental para garantizar la ordenaci&oacute;n del territorio con fines de desarrollo, a trav&eacute;s de la adecuada, precisa y oportuna definici&oacute;n de los tres aspectos m&aacute;s relevantes de la propiedad inmobiliaria: descripci&oacute;n f&iacute;sica, situaci&oacute;n jur&iacute;dica y valor econ&oacute;mico , convirti&eacute;ndose de esta forma en la fuente primaria de datos del sistema de informaci&oacute;n territorial, el cual permitir&aacute; establecer una base com&uacute;n o red entre las distintas organizaciones p&uacute;blicas y privadas que produzcan informaci&oacute;n geogr&aacute;fica, cartogr&aacute;fica y catastral del territorio nacional.</p>\r\n<div class=\"cnt_img_sola\"><img src=\"/imagen/catastro-urbano.gif\" alt=\"\" width=\"548\" height=\"382\" /></div>\r\n<h2>Entre los servicios que ofrece Soluciones Enterprice S.A.C. para los Municipios son:</h2>\r\n<ul>\r\n<li>\r\n<p>Levantamiento Catastral y/o actualizaci&oacute;n automatizada de informaci&oacute;n de servicios (vialidad, redes de transporte, telefon&iacute;a, electricidad, salud, educaci&oacute;n etc.), necesarios para la gesti&oacute;n Municipal.</p>\r\n</li>\r\n<li>\r\n<p>Generaci&oacute;n de base de datos catastrales provenientes del registro de la propiedad.</p>\r\n</li>\r\n<li>\r\n<p>Automatizaci&oacute;n de la Cartograf&iacute;a digital proveniente del levantamiento fisico.</p>\r\n</li>\r\n<li>\r\n<p>Capacitaci&oacute;n e implementaci&oacute;n en sistemas catastrales.</p>\r\n</li>\r\n<li>\r\n<p>Dise&ntilde;o e implementaci&oacute;n de un Sistema de Informaci&oacute;n Catastral urbano de acuerdo a los requerimientos de los gobiernos locales.</p>\r\n</li>\r\n</ul>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','catastro urbano','','1','','','1','catastro-urbano'),(12,'','<div class=\"contenedor_derecha\">\r\n<h1>Estudios de Impacto Ambiental</h1>\r\n<p align=\"justify\">Un <strong>EIA</strong> es un procedimiento jur&iacute;dico, administrativo y t&eacute;cnico cuyo objetivo es estimar y evaluar la alteraci&oacute;n generada en el ambiente como consecuencia de un proyecto o actividad con el fin de determinar su viabilidad del punto de vista f&iacute;sico, biol&oacute;gico, socioecon&oacute;mico, jur&iacute;dico, etc.</p>\r\n<p align=\"justify\">Toda obra implica un impacto en el ambiente: un cambio, positivo o negativo, en el medio receptor del proyecto.</p>\r\n<p align=\"justify\">El <strong>EIA</strong> es una herramienta de gesti&oacute;n ambiental fundamental dentro de la planificaci&oacute;n y toma de decisiones ya que, previo a la ejecuci&oacute;n de un proyecto, emprendimiento o actividad permite evaluar y ponderar la dimensi&oacute;n de sus impactos en el medio para poder evitar, minimizar o compensar posibles da&ntilde;os. Incorpora las variables ambientales m&aacute;s significativas a lo largo de todo el ciclo del proyecto y de este modo incluye los costos ambientales al an&aacute;lisis de factibilidad.</p>\r\n<div class=\"cnt_img_sola\">\r\n<div class=\"img_1\"><img src=\"/imagen/evaluacion-impacto-ambiental-1.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div class=\"img_2\"><img src=\"/imagen/ambiental.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>\r\n<div class=\"ctn_general_texto\">\r\n<p>Al interpretar los impactos susceptibles de ser generados desde las etapas m&aacute;s tempranas del proyecto, ya sean negativos o positivos, se puede identificar aquellas alternativas que impliquen una mayor compatibilidad con el ambiente.</p>\r\n<p>El Estudio de Impacto Ambiental <strong>(EsIA)</strong> corresponde a la etapa t&eacute;cnica de la evaluaci&oacute;n que, de acuerdo al tipo de proyecto, puede incluir un Plan de Gesti&oacute;n Ambiental y un Programa de Monitoreo.</p>\r\n<p>Se basa dentro de un determinado marco legal en la descripci&oacute;n de las actividades propias del proyecto y de su l&iacute;nea de base (medio sin proyecto), y en la descripci&oacute;n y evaluaci&oacute;n de los impactos identificados. Esto permite tomar medidas de revenci&oacute;n, mitigaci&oacute;n o compensaci&oacute;n as&iacute; como realizar un seguimiento de las tendencias a futuro una vez que la obra est&eacute; operando.</p>\r\n<p>Un equipo interdisciplinario formado por profesionales de distintas especialidades como gestores ambientales, bi&oacute;logos, ge&oacute;logos, antrop&oacute;logos, qu&iacute;micos, etc. son los encargados de llevar adelante esta <strong>EIA</strong>, con el objeto de cumplir con los lineamientos del proyecto bas&aacute;ndose en los principios rectores del desarrollo sustentable.</p>\r\n</div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','impacto ambiental','','1','','','1','impacto-ambiental'),(13,'','<div class=\"contenedor_derecha\">\r\n<h1>Gesti&oacute;n Integral de Residuos y Efluentes Urbanos e Industriales</h1>\r\n<p>La generaci&oacute;n y disposici&oacute;n de los residuos es conocida como una de las problem&aacute;ticas ambientales m&aacute;s importantes, tanto a nivel local como mundial.</p>\r\n<p>El problema es muy complejo debido al crecimiento de la poblaci&oacute;n y del consumo, y a la din&aacute;mica de los ecosistemas receptores. Las consecuencias sobre el medio f&iacute;sico y biol&oacute;gico as&iacute; como sobre la salud son graves si no se lleva a cabo un tratamiento adecuado.</p>\r\n<p>A nivel empresa, industria o comunidad, los residuos se convierten a corto y largo plazo en un problema que de no ser prevenido, trae serios problemas en la salud de la poblaci&oacute;n y en el ambiente.</p>\r\n<p>Gestionar los residuos de forma integral implica un an&aacute;lisis y control en todo su ciclo: desde la generaci&oacute;n, el almacenamiento, la recolecci&oacute;n, el transporte y el procesamiento, hasta la disposici&oacute;n final. Una gesti&oacute;n integral implica, adem&aacute;s, la selecci&oacute;n y aplicaci&oacute;n de t&eacute;cnicas, tecnolog&iacute;as y programas de manejo acordes con objetivos espec&iacute;ficos relacionados con pol&iacute;ticas de reducci&oacute;n, reciclaje y reutilizaci&oacute;n. Estas se basan en criterios sanitarios, ambientales y econ&oacute;micos.</p>\r\n<p><span>Con simples t&eacute;cnicas de minimizaci&oacute;n, recolecci&oacute;n, acopio y tratamiento se puede reducir significativamente el impacto ambiental y hasta lograr</span> convertir los desechos en un subproducto para la venta. As&iacute; se evitan costos, riesgos para la salud y el ecosistema y se aprovechan mejor recursos energ&eacute;ticos y materias primas.</p>\r\n<div class=\"cnt_img_sola\">\r\n<div class=\"img_1\"><img src=\"/imagen/gestion-residuos.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div class=\"img_2\"><img src=\"/imagen/gestion-residuos-2.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>\r\n<p>La poblaci&oacute;n es cada vez m&aacute;s consciente de los problemas que implica la contaminaci&oacute;n por basurales a cielo abierto, efluentes industriales, residuos peligrosos, etc. En especial en lugares de alta biodiversidad o valor paisaj&iacute;stico donde el deterioro del medio (calidad del aire, agua, suelo y paisaje), a parte de los efectos directos sobre la salud, perjudica el funcionamiento de las econom&iacute;as regionales.</p>\r\n<p>Para hacer frente a esta problem&aacute;tica la educaci&oacute;n y capacitaci&oacute;n ambiental, el cambio en las pr&aacute;cticas y costumbres de consumo, la incorporaci&oacute;n de tecnolog&iacute;as y t&eacute;cnicas para recolectar, tratar y disponer los residuos, son herramientas de gesti&oacute;n que pueden estar combinadas de acuerdo a necesidades espec&iacute;ficas dentro de un Programa de Gesti&oacute;n Integral de Residuos. Estos programas se dise&ntilde;an a medida dependiendo de las caracter&iacute;sticas del la comunidad o de la organizaci&oacute;n que los solicite.</p>\r\n<h2>Soluciones Enterprice S.A.C. brinda&nbsp; soluciones ambientales orientados para mejorar la calidad de vida de los habitantes los cuales son:</h2>\r\n<ul>\r\n<li>Proyectos de Inversi&oacute;n P&uacute;blica en el marco del SNIP.</li>\r\n<li>Expedientes T&eacute;cnicos de Proyectos de Inversi&oacute;n P&uacute;blica.</li>\r\n<li>Estudios de Impacto Ambiental de proyectos de infraestructura de residuos s&oacute;lidos.</li>\r\n<li>Proyectos de Infraestructura para gesti&oacute;n de residuos s&oacute;lidos: rellenos sanitarios, plantas de tratamiento, recuperaci&oacute;n y reciclaje.</li>\r\n<li>Plan de recuperaci&oacute;n de botaderos.</li>\r\n<li>Proyectos de Biodigestores.</li>\r\n<li>Planes Integrales de Gesti&oacute;n Ambiental de Residuos S&oacute;lidos (PIGARS).</li>\r\n<li>Planes Distritales de Gesti&oacute;n Ambiental de Residuos S&oacute;lidos (PDGARS).</li>\r\n<li>Estudios de caracterizaci&oacute;n de residuos s&oacute;lidos (ECRS).</li>\r\n</ul>\r\n<p align=\"justify\"><strong>Soluciones Enterprice S.A.C.</strong> es l&iacute;der en evaluaciones de Impacto ambientales en formulaci&oacute;n, evaluaci&oacute;n y promoci&oacute;n de proyectos de desarrollo sustentable. Conocemos a fondo la estructura econ&oacute;mica y social de una amplia gama de sectores y regiones y, adem&aacute;s, tenemos una capacidad singular para dise&ntilde;ar pol&iacute;ticas sectoriales y transversales desde una concepci&oacute;n multidisciplinaria integradora de los enfoques econ&oacute;mico, social, ambiental, comunicacional y de ingenier&iacute;a.</p>\r\n<h2>Estamos a disposici&oacute;n de las empresas privadas, entidades p&uacute;blicas y organismos cooperantes para servirlos con las mejores pr&aacute;cticas de consultor&iacute;a y asesor&iacute;a en:</h2>\r\n<ul>\r\n<li>EIA de proyectos de carreteras.</li>\r\n<li>EIA de proyectos portuarios y aeroportuarios.</li>\r\n<li>EIA de proyectos hidroenerg&eacute;ticos.</li>\r\n<li>EIA de proyectos petroleros.</li>\r\n<li>EIA de proyectos de energ&iacute;a renovable.</li>\r\n<li>EIA de planes de competitividad sectorial y de productos.</li>\r\n<li>Planes de desarrollo regional y local.</li>\r\n<li>Planes de integraci&oacute;n macroregional.</li>\r\n<li>Planes de desarrollo de cuencas.</li>\r\n<li>Diagn&oacute;sticos ambientales.</li>\r\n<li>Cuantificaci&oacute;n y mitigaci&oacute;n de riesgos ambientales.</li>\r\n<li>Estudios de integraci&oacute;n paisaj&iacute;stica.</li>\r\n<li>Estudios de sostenibilidad ambiental.</li>\r\n<li>Estudios de factores y condicionantes ambientales de proyectos nuevos <br /> Dise&ntilde;o de pol&iacute;ticas ambientales.</li>\r\n<li>Manejo de conflictos medioambientales y facilitaci&oacute;n de soluciones.</li>\r\n</ul>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','gestion residuos','','1','','','1','gestion-residuos'),(14,'','<div class=\"contenedor_derecha\">\r\n<h1>Educacion Ambiental</h1>\r\n<p>La educaci&oacute;n ambiental es un proceso continuo y permanente que busca fortalecer en las personas el conocimiento, la actitud y la pr&aacute;ctica de acciones conscientes hacia el desarrollo sostenible.</p>\r\n<p>Para ello <strong>TelesigmaIPES</strong> se ha especializado en:</p>\r\n<ul>\r\n<li>Educaci&oacute;n ambiental en instituciones educativas.</li>\r\n<li>Formaci&oacute;n y fortalecimiento de comit&eacute;s ambientales escolares y vecinales.</li>\r\n<li>Elaboraci&oacute;n de recursos comunicacionales.</li>\r\n<li>Capacitaci&oacute;n a docentes.</li>\r\n<li>Elaboraci&oacute;n de materiales educativos.</li>\r\n<li>Implementaci&oacute;n de buenas pr&aacute;cticas ambientales.</li>\r\n<li>Organizaci&oacute;n de concursos ambientales.</li>\r\n<li>Talleres y campa&ntilde;as de sensibilizaci&oacute;n ambiental.</li>\r\n</ul>\r\n<h2>Residuos Solidos:</h2>\r\n<p>La gesti&oacute;n de residuos se refiere al control y manejo de todo el ciclo de los residuos, desde la generaci&oacute;n, separaci&oacute;n en la fuente, almacenamiento, recolecci&oacute;n selectiva, transporte, tratamiento, reciclaje, transferencia hasta la disposici&oacute;n final; utilizando tecnolog&iacute;a adecuada y procedimientos que impliquen el menor impacto negativo.</p>\r\n<div class=\"cnt_img_sola\">\r\n<div class=\"img_1\"><img src=\"/imagen/proyectos-ambientales-1.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div class=\"img_2\"><img src=\"/imagen/basura-electronica--02.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>\r\n<p>IPES, trabaja la gesti&oacute;n de residuos en base al cumplimiento de la legislaci&oacute;n ambiental, con un enfoque preventivo de minimiza-ci&oacute;n de residuos a trav&eacute;s de las 3R (reducci&oacute;n, reuso y reciclaje), involucrando a diversos actores sociales, p&uacute;blicos y privados.<br /> <br /> <span class=\"titulo_preguntas color_2\">Para ello IPES se ha especializado en:</span></p>\r\n<ul>\r\n<li>Caracterizaci&oacute;n de residuos.</li>\r\n<li>Estudios de mercado de residuos.</li>\r\n<li>Elaboraci&oacute;n de Planes Integrales de Gesti&oacute;n de Residuos S&oacute;lidos.</li>\r\n<li>Dise&ntilde;o de infraestructura de manejo de residuos.</li>\r\n<li>Dise&ntilde;o e implementaci&oacute;n de sistemas de recolecci&oacute;n selectiva.</li>\r\n<li>Implementaci&oacute;n de Microempresas de Gesti&oacute;n Ambiental (MEGA).</li>\r\n<li>Gesti&oacute;n de aceites usados.</li>\r\n<li>Gesti&oacute;n de residuos electr&oacute;nicos.</li>\r\n<li>Implementaci&oacute;n y administraci&oacute;n de Bolsas de Residuos.</li>\r\n</ul>\r\n<h2>Gobiernos:</h2>\r\n<p>La naturaleza de Soluciones Enterprice S.A.C. le permite ejecutar una gran diversidad de proyectos para el Sector P&uacute;blico, para esto identifica problemas y propone soluciones eficientes para m&uacute;ltiples campos del desarrollo estatal, entre los cuales se encuentran:</p>\r\n<ul>\r\n<li>Planificaci&oacute;n y ordenamiento territorial.</li>\r\n<li>Censos, demograf&iacute;a y poblaci&oacute;n.</li>\r\n<li>Delimitaci&oacute;n y Titulaci&oacute;n Territorial.</li>\r\n<li>Tributaci&oacute;n estatal, Regional o Municipal.</li>\r\n<li>Sistematizaci&oacute;n de procesos registrales.</li>\r\n<li>Zonificaci&oacute;n econ&oacute;mica.</li>\r\n<li>Prevenci&oacute;n y atenci&oacute;n de desastres.</li>\r\n<li>Evaluaci&oacute;n y asignaci&oacute;n de riesgos.</li>\r\n<li>Proyectos Ambientales.</li>\r\n<li>Evaluaci&oacute;n y supervisi&oacute;n de proyectos de diversas &iacute;ndoles <br /> Mineria.</li>\r\n</ul>\r\n<p>Soluciones Enterprice S.A.C. realiza servicios orientados a la exploraci&oacute;n, explotaci&oacute;n y administraci&oacute;n de proyectos mineros, especializ&aacute;ndose en proyectos que requieran topograf&iacute;a y cartograf&iacute;a digital. Adem&aacute;s, el &aacute;rea de Medio Ambiente de Soluciones Enterprice S.A.C. desarrolla estudios que buscan definir el equilibrio entre las inversiones y los controles sobre la contaminaci&oacute;n del medio ambiente, resolviendo temas como: efluvios mineros hacia r&iacute;os y cursos de agua, aguas &aacute;cidas, producci&oacute;n de residuos, relaves y alteraci&oacute;n del paisaje, entre otros, para lo cual desarrolla estudios de EIA, PAMA, Evaluaciones Ambientales, Prospecci&oacute;nes y otros relacionados.</p>\r\n<p class=\"titulo_preguntas color_2\">Entre los servicios brindados destacan:</p>\r\n<ul>\r\n<li>Servicios de Fotogrametr&iacute;a y control Terrestre.</li>\r\n<li>Levantamientos Topogr&aacute;ficos.</li>\r\n<li>Desarrollo de Ortofotos y DTM.</li>\r\n<li>Elaboraci&oacute;n de Sistemas SIG de monitoreo y control.</li>\r\n<li>Proyectos Medio Ambientales (EIA, PAMA, entre otros).</li>\r\n<li>Procesamiento de Im&aacute;genes Satelitales (Aster, Iconos, Quick bird, Spot).</li>\r\n<li>Desarrollo de Mapas Geol&oacute;gicos.</li>\r\n<li>Servicios de Prospecci&oacute;n y Evaluaci&oacute;n de Cierre de minas.</li>\r\n<li>Elaboracion de Sistemas SIG para Catastro Minero.</li>\r\n</ul>\r\n<h2>Geomarketing:</h2>\r\n<p>Soluciones Enterprice S.A.C. ofrece servicios de consultor&iacute;a e investigaci&oacute;n en marketing empresarial a entidades financieras y compa&ntilde;&iacute;as nacionales o extranjeras que requieran de informaci&oacute;n basada en tecnolog&iacute;a de mapeo y bases de datos.</p>\r\n<p>Sus servicios se orientan a desarrollar y potenciar las decisiones que las empresas tomen respecto a la identificaci&oacute;n de la demanda, manejo de bases de datos, planeamiento de actividades por sectores geogr&aacute;ficos, entre otros. Entre los servicios que ofrece cuentan:</p>\r\n<ul>\r\n<li>Bases de datos catastrales.</li>\r\n<li>Estudios de mercado.</li>\r\n<li>An&aacute;lisis de mercados y zonas de influencia.</li>\r\n<li>Zonificaci&oacute;n de ventas y Geomarketing.</li>\r\n<li>SIG bancario.</li>\r\n<li>SIG empresarial de ventas y distribuci&oacute;n.</li>\r\n<li>Mapas de densidad de clientes.</li>\r\n<li>Mapas de ubicaci&oacute;n de cajeros autom&aacute;ticos.</li>\r\n<li>Verificaci&oacute;n domiciliaria y comercial</li>\r\n</ul>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','educacion ambiental','','1','','','1','educacion-ambiental'),(15,'','<div class=\"contenedor_derecha\">\r\n<h1>Ordenaci&oacute;n del territorio</h1>\r\n<p align=\"justify\">Dentro de los trabajos habituales realizados en <strong>Soluciones Enterprice S.A.C.</strong> est&aacute;n los relacionados con la ordenaci&oacute;n del territorio. En general la planificaci&oacute;n territorial y urban&iacute;stica se sustenta en an&aacute;lisis previos sobre el territorio en su conjunto.</p>\r\n<p align=\"justify\">El equipo t&eacute;cnico realiza inventarios y diagn&oacute;sticos de la situaci&oacute;n actual del medio f&iacute;sico y de la funcionalidad ecol&oacute;gica del mismo. En funci&oacute;n de las caracter&iacute;sticas de importancia, singularidad, rareza, vulnerabilidad, fragilidad, conectividad y complejidad, se elaboran valoraciones jerarquizadas y se representan gr&aacute;ficamente en mapas tem&aacute;ticos y de valoraci&oacute;n.</p>\r\n<p align=\"justify\">Se realizan tambi&eacute;n an&aacute;lisis paisaj&iacute;sticos, inventarios de bienes de inter&eacute;s cultural, de patrimonio hist&oacute;rico-art&iacute;stico y arqueol&oacute;gico. Esta informaci&oacute;n se representa gr&aacute;ficamente, especialmente los relativos al an&aacute;lisis del paisaje, as&iacute; como los elementos de apoyo para su valoraci&oacute;n</p>\r\n<div class=\"cnt_img_sola\">\r\n<div class=\"img_1\"><img src=\"/imagen/ordenacion-territorio.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div class=\"img_2\"><img src=\"/imagen/ordenacion-territorio-1.gif\" alt=\"\" width=\"300\" height=\"240\" /></div>\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>\r\n<p align=\"justify\">Se contemplan an&aacute;lisis de riesgos naturales, con determinaci&oacute;n de zonas inundables y clasificaci&oacute;n de especial protecci&oacute;n por riesgos de erosi&oacute;n, deslizamientos, erosi&oacute;n, subsidencias, etc. Se representan gr&aacute;ficamente en funci&oacute;n de la valoraci&oacute;n jerarquizada e importancia de los mismos.</p>\r\n<p align=\"justify\">Estudios socioecon&oacute;micos, de infraestructuras (abastecimiento, tratamiento y gesti&oacute;n de aguas y residuos, v&iacute;as de comunicaci&oacute;n, dotaciones,...), completan el an&aacute;lisis previo que sirve de base para la posterior planificaci&oacute;n.</p>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','ordenacion territorio','','1','','','1','ordenacion-territorio'),(16,'','<div class=\"contenedor_derecha\">\r\n<h1>Ordenamiento Ambiental</h1>\r\n<div class=\"ctn_general_texto\">\r\n<div class=\"ctn_texto_img_dere\">\r\n<p align=\"justify\">Tenemos por objeto social: la evaluaci&oacute;n, estudio y monitoreo ambiental el ecoturismo y reactivaci&oacute;n econ&oacute;mica PAMA s proyectos de saneamiento ambiental planificaci&oacute;n y manejo de &aacute;reas verdes la auditor&iacute;a ambiental restauraci&oacute;n y reforestaci&oacute;n de &aacute;reas intervenidas cursos, seminarios y talleres acerca de la conservaci&oacute;n de la calidad ambiental, uso sostenible de los recursos naturales y la educaci&oacute;n ambiental la comercializaci&oacute;n, distribuci&oacute;n, representaci&oacute;n comercial, importaci&oacute;n y exportaci&oacute;n de productos y subproductos derivados de los recursos naturales la asesor&iacute;a y consultor&iacute;a en materia minera, industrial, agricultura, salud, transporte y educaci&oacute;n y estudios hidrol&oacute;gicos, climatol&oacute;gicos y geol&oacute;gicos.</p>\r\n</div>\r\n<div class=\"imagen\"><img src=\"/imagen/ordenamiento-ambiental.jpg\" alt=\"\" width=\"275\" height=\"184\" /></div>\r\n</div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','ordenamiento ambiental','','1','','','1','ordenamiento-ambiental'),(17,'','<h1>Servicios</h1>\r\n<div class=\"subcategorias\">\r\n<div class=\"iz\"><ol>\r\n<li><span>1</span>\r\n<p><a href=\"/servicios/proyectos\">Proyectos.</a></p>\r\n</li>\r\n<li><span>2</span>\r\n<p><a href=\"/servicios/topografia\">Topografia.</a></p>\r\n</li>\r\n<li><span>3</span>\r\n<p><a href=\"/servicios/informacion-geografica\">Informacion Geografica.</a></p>\r\n</li>\r\n<li><span>4</span>\r\n<p><a href=\"/servicios/gestion-territorial\">Gestion Territorial.</a></p>\r\n</li>\r\n<li><span>5</span>\r\n<p><a href=\"/servicios/catastro-urbano\">Catastro Urbano.</a></p>\r\n</li>\r\n</ol></div>\r\n<div class=\"der\"><ol>\r\n<li><span>6</span>\r\n<p><a href=\"/servicios/impacto-ambiental\">Impacto Ambiental.</a></p>\r\n</li>\r\n<li><span>7</span>\r\n<p><a href=\"/servicios/gestion-residuos\">Gestion Residuos.</a></p>\r\n</li>\r\n<li><span>8</span>\r\n<p><a href=\"/servicios/educacion-ambiental\">Educacion Ambiental.</a></p>\r\n</li>\r\n<li><span>9</span>\r\n<p><a href=\"/servicios/ordenacion-territorio\">Ordenacion Territorio.</a></p>\r\n</li>\r\n<li><span>10</span>\r\n<p><a href=\"/servicios/ordenamiento-ambiental\">Ordenamiento Ambiental.</a></p>\r\n</li>\r\n</ol></div>\r\n</div>',77,0,'','0','0',0,'SI','0000-00-00','0000-00-00','','','','','1 Mes','1970-01-01','Virtual','servicios','','1','','','1','servicios'),(18,'','<div>\r\n<p>\" <strong>Creando Aplicaciones GIS en Web con OpenSource\"</strong></p>\r\n<p>1) &nbsp;<strong>PORQUE LLEVAR ESTE CURSO</strong></p>\r\n<p>En este curso el participante tendr&aacute; la base para perfeccionarse en el campo de desarrollo de la plataforma GIS WEB &nbsp;para utilizar el OpenSource (Software Libre) y poder administrar, configurar, utilizar servicios GIS y en L&iacute;nea as&iacute; personalizar las Interface GIS Web sin saber programar soluciones con alternativas innovadoras de acuerdo a las necesidades.</p>\r\n<p><strong>Esta capacitaci&oacute;n va dirigido a:</strong></p>\r\n<p>&bull; Profesionales que buscan perfeccionarse a un nivel avanzado en temas relacionados a la Geomatica y que buscan incrementar su productividad extendiendo las aplicaciones GIS WEB a medida del cliente con software Libre.<br /> &bull; &nbsp;A todo profesional que quiere iniciarse en temas de desarrollo de proyectos GIS WEB.</p>\r\n<p><strong>2) OBJETIVOS</strong></p>\r\n<p>Capacitar al Personal en crear aplicaciones GIS Web con OpenSource de forma libre</p>\r\n.<strong>3. METODOLOGIA </strong>\r\n<p>La capacitaci&oacute;n se desarrollara con proyector multimedia para las exposiciones de clase, el cual ser&aacute; te&oacute;rico pr&aacute;ctico de acuerdo al temario que se le envia:</p>\r\n<p><strong>3.1. Temario del Curso en GIS WEB con Open Source</strong> <br /> <strong>(</strong><strong>15H Total, 5 sesiones de 3h)</strong></p>\r\n<ul>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Introducci&oacute;n de la tecnolog&iacute;a Open SourceArquitectura de MapGuide</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Configuraci&oacute;n de los servicios web (Apache o IIS)</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Descarga e instalaci&oacute;n de MapGuide Open Source (Servidor de Mapas)</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Descarga e instalaci&oacute;n de MapGuide Maestro</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Configuraci&oacute;n del Mapguide Open Source</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;El entorno de trabajo para su personalizaci&oacute;n</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Las fuentes de datos para su despliegue</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Las capas de datos</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;El Mapa</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;El dise&ntilde;o del visor cartogr&aacute;fico</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;La aplicaci&oacute;n Fusi&oacute;n</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Uso de Widgets</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Generaci&oacute;n de paquete de datos en el servidor de mapas</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Cargar un paquete en el servidor de mapas</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Visualizar el proyecto en el navegador</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Utilizando Servicios GIS existente y combinarlo al proyecto GIS</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Enlaces de inter&eacute;s</li>\r\n</ul>\r\n<p><strong>4) REQUERIMIENTOS BRINDADOS</strong></p>\r\n<p>4.1 &nbsp;Traer laptop, de nuestra parte brindaremos un proyector Multimedia &nbsp;para las exposici&oacute;n de las clases<br /> 4.2 Se brindara certificado a nombre de SOLUCIONES ENTERPRICE SAC a los participantes que cumplen el 100% de Asistencia.<br /> 4.3 Se entregara un Manual de Usuario en espa&ntilde;ol para cada participante del curso a desarrollarse.<br /> 4.4 Se entregara informaci&oacute;n digital trabajada en clase e informaci&oacute;n bibliograf&iacute;a</p>\r\n<p>seleccionada en un CD por cada participante.</p>\r\n<p><strong>5) INICIO</strong></p>\r\n<p>Inicio: Mi&eacute;rcoles &nbsp;11 de Junio &nbsp;del 2014</p>\r\n<p>Lunes y mi&eacute;rcoles de&nbsp; &nbsp;6:30 PM &ndash; 9:30 PM Duraci&oacute;n total 15 h (5 Sesiones de 3h)<br /> Lugar: Jr. Huaraz 1650 Bre&ntilde;a - Lima</p>\r\n<p><strong>6) &nbsp;INCRIPCION</strong></p>\r\n<p>El proceso de Inscripci&oacute;n es limitado, se realiza v&iacute;a correo electr&oacute;nico, el cual se inicia llenando la Ficha de Inscripci&oacute;n enviado por la empresa seg&uacute;n su solicitud,<br /> luego del cual recibir&aacute; la autorizaci&oacute;n de inscripci&oacute;n en el curso y posteriormente la autorizaci&oacute;n del pago del curso, esto se realizara por correo electr&oacute;nico al e-mail <a href=\"mailto:soluciones_enterprise@hotmail.com\">soluciones_enterprise@hotmail.com</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;o&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<a href=\"mailto:soluciones@geoenterprice.com\">soluciones@geoenterprice.com</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;o <a href=\"mailto:consultorgis@hotmail.com\">consultorgis@hotmail.com</a></p>\r\n<p><strong><span style=\"text-decoration: underline;\">* IMPORTANTE:</span></strong></p>\r\n<p>1.- El n&uacute;mero de vacantes es limitado, por lo que debe verificar la disponibilidad de vacantes a trav&eacute;s de la ficha de pre-inscripci&oacute;n, el cual una vez llenada, deber&aacute; ser enviada al e-mail <a href=\"mailto:soluciones_enterprise@hotmail.com\">soluciones_enterprise@hotmail.com</a> y <a href=\"mailto:soluciones@geoenterprice.com\">soluciones@geoenterprice.com</a> o <a href=\"mailto:consultorgis@hotmail.com\">consultorgis@hotmail.com</a></p>\r\n<p>2.- Para poder Asistir al curso es necesario haber recibido la autorizaci&oacute;n de pago respectiva por correo electr&oacute;nico, luego de recibir la autorizaci&oacute;n podr&aacute; cancelar los derechos acad&eacute;micos del curso haciendo el abono o transferencia en la cuenta de ahorro respectivo y enviando el voucher de dep&oacute;sito al correo indicado.</p>\r\n<p>3.- El pago podr&aacute; realizarse tambi&eacute;n el mismo d&iacute;a de inicio de la clase, por el cual el participante enviar&iacute;a una carta de compromiso de separaci&oacute;n de vacante indicando sus datos y enviando por e-mail hasta 1 antes de iniciado el curso.</p>\r\n<p>4.- La Asistencia en el curso en las fechas programadas es responsabilidad del participante, el cual no podr&aacute; ser postergada salvo que haya un consenso general entre todos los participantes y la empresa para casos de d&iacute;as feriados o de casos de fuerza mayor externa.</p>\r\n<p><strong>5.- Los Costos Ofrecidos son de forma Libre, Si la empresa o instituci&oacute;n abonara por el participante, deber&aacute; coordinarse previamente con nuestra parte para los tr&aacute;mites correspondientes y enviarle una nueva propuesta de acuerdo al mercado, lo cual mientras se efectu&eacute; el tr&aacute;mite, el participante asistir&aacute; a las clases independientemente hasta que se realice el pago correspondiente de acuerdo a los plazos que tiene cada empresa.</strong></p>\r\n</div>',78,0,'','450','0',0,'SI','0000-00-00','0000-00-00','','','','Desarrollo de Aplicaciones GIS WEB con Software Libre','1 Mes','2014-06-11','Virtual','Desarrollo de Aplicaciones GIS WEB con Software Libre','','1','<p><img title=\"gis1.jpg\" src=\"/webadmin/tiny_mce/plugins/jfilebrowser/archivos/20140606172427_0.jpg\" alt=\"gis1.jpg\" /></p>','','1','desarrollo-de-aplicaciones-gis-web-con-software-libre');

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
  `cordcontenido` varchar(1) NOT NULL,
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

insert  into `seccion`(`ccodseccion`,`ccodpage`,`ccodplantilla`,`ccodmodulo`,`ccodsecestilo`,`ccodclase`,`cnomseccion`,`camiseccion`,`ctitseccion`,`cdesseccion`,`ctagseccion`,`cimgseccion`,`cestseccion`,`cnivseccion`,`ctipseccion`,`cestpublico`,`cnewmenu`,`curlseccion`,`cpagseccion`,`cordcontenido`,`nvisseccion`,`dfecseccion`,`ccodusuario`,`dfecmodifica`,`estado`,`totalpantalla`,`paginator`,`mostrarurlcatebase`) values ('121728060001000000000000','12172806','0001','1100','1101',2,'Inicio','inicio','Inicio','','','','1','1','2','0','0','/index.php','12','1',0,'2014-11-16','1','2014-12-26 01:57:27','1','ambos',NULL,'SI'),('121728062000000000000000','12172806','0001','1100','1101',9,'Quienes Somos','quienes-somos','Quienes Somos','','','','1','1','1','0','0','','12','2',0,'2014-11-16','1','2014-11-17 02:41:10','1','ambos',NULL,'SI'),('121728062001000000000000','12172806','0001','8800','8804',9,'Ubicación','ubicacion','Ubicación','','','','1','1','1','0','0','','12','4',0,'2014-11-16','1','2014-12-26 02:33:08','1','izqpantalla',NULL,'SI'),('121728062002000000000000','12172806','0001','8800','8801',9,'Contactenos','contactenos','Contactenos','','','','1','1','1','0','0','','12','6',0,'2014-11-16','1','2015-01-06 00:44:33','1','totalpantalla',NULL,'NO'),('121728062003000000000000','12172806','0001','1400','1401',9,'Galeria','galeria','Galeria','','','','1','1','1','0','0','','12','3',0,'2014-11-16','1','2015-01-02 05:56:11','1','ambos',NULL,'SI'),('121728062004000000000000','12172806','0001','1100','1102',9,'Noticias','noticias','Noticias','','','','1','1','1','0','0','','10','3',0,'2014-12-25','1','2014-12-28 01:19:58','1','ambos',NULL,'SI'),('121728062005000000000000','12172806','0001','8800','8805',9,'Registrate','registrate','Registrate','','','','1','1','1','0','0','','12','5',0,'2015-01-05','100','2015-01-30 09:09:22','1','ambos',NULL,'SI'),('121728062006000000000000','12172806','0001','1100','1110',9,'Comenta','comenta','Comenta','','','','1','1','1','0','0','','12','',0,'2015-01-12','1','2015-01-13 10:01:53','1','ambos',NULL,'SI'),('121728062007000000000000','12172806','0001','1100','1101',9,'aviso logueado','aviso-logueado','aviso logueado','','','','1','1','1','0','0','','12','',0,'2015-01-14','1','2015-01-14 12:36:12','1','ambos',NULL,'SI'),('121728062008000000000000','12172806','0001','8800','8806',9,'IniciarSesion','iniciarsesion','IniciarSesion','','','','1','1','1','0','0','','12','',0,'2015-01-14','1','2015-01-15 00:16:08','1','ambos',NULL,'SI'),('121728062009000000000000','12172806','0001','8800','8807',9,'configuracion','configuracion','configuracion','','','','1','1','1','0','0','','12','',0,'2015-01-30','100','2015-01-30 09:21:42','1','ambos',NULL,'SI'),('121728062010000000000000','12172806','0001','1100','1101',9,'publica','','','','','','1','1','1','0','0','','12','',0,'2015-01-30','100','2015-01-30 09:33:24','1','ambos',NULL,'SI'),('121728062011000000000000','12172806','0001','8800','8808',9,'recordar contraseña','recordar-contrasena','recordar contraseña','','','','1','1','1','0','0','','12','',0,'2015-01-30','100','2015-01-30 21:25:42','1','ambos',NULL,'SI');

/*Table structure for table `seccioncontenido` */

DROP TABLE IF EXISTS `seccioncontenido`;

CREATE TABLE `seccioncontenido` (
  `ccodpage` varchar(8) NOT NULL,
  `ccodseccion` varchar(24) NOT NULL,
  `ccodcontenido` varchar(24) NOT NULL,
  `cordcontenido` int(9) NOT NULL,
  PRIMARY KEY (`ccodpage`,`ccodseccion`,`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccioncontenido` */

insert  into `seccioncontenido`(`ccodpage`,`ccodseccion`,`ccodcontenido`,`cordcontenido`) values ('12172806','121728062003000000000000','1217280614122121531750W9',0),('12172806','121728062004000000000000','12172806141225225820BZDF',0),('12172806','121728062004000000000000','121728061412260122270H6T',0),('12172806','121728062004000000000000','12172806141226025538F95O',0),('12172806','121728062004000000000000','12172806141226025820JY6T',0),('12172806','121728062004000000000000','12172806141226032315H9U2',0),('12172806','121728062000000000000000','12172806141226041222EABD',0),('12172806','121728062007000000000000','12172806150114123405SJB5',0);

/*Table structure for table `seccionmenu` */

DROP TABLE IF EXISTS `seccionmenu`;

CREATE TABLE `seccionmenu` (
  `ccodseccion` varchar(24) NOT NULL,
  `ccodmenu` int(8) NOT NULL,
  `cordmenu` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ccodmenu`,`ccodseccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccionmenu` */

insert  into `seccionmenu`(`ccodseccion`,`ccodmenu`,`cordmenu`) values ('121728062000000000000000',1,0),('121728062005000000000000',1,0),('121728062002000000000000',1,0),('121728062003000000000000',1,0),('121728060001000000000000',1,0),('121728062004000000000000',1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `subcategoria` */

insert  into `subcategoria`(`idsubcategoria`,`idcategoria`,`titulo`,`estado`,`descripcion`,`imagen`,`orden`) values (2,63,'puerta 2','1','','<p><img title=\"2eb_g.jpg\" src=\"/webadmin/tiny_mce/plugins/jfilebrowser/archivos/20140330210058_0.jpg\" alt=\"2eb_g.jpg\" /></p>',0),(3,63,'puerta 1','1','','<p><img title=\"CIMG0204.JPG\" src=\"/webadmin/tiny_mce/plugins/jfilebrowser/archivos/20140330210117_0.jpg\" alt=\"CIMG0204.jpg\" /></p>',0),(4,63,'puerta 3','-2','','<p><img title=\"CIMG0207.JPG\" src=\"/webadmin/tiny_mce/plugins/jfilebrowser/archivos/20140330210122_0.jpg\" alt=\"CIMG0207.jpg\" /></p>',0),(5,63,'puerta 3','1','','<p><img title=\"2eb_g.jpg\" src=\"/webadmin/tiny_mce/plugins/jfilebrowser/archivos/20140330210058_0.jpg\" alt=\"2eb_g.jpg\" /></p>',0);

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
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`) USING BTREE,
  KEY `id` (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nick`,`password`,`nombre`,`email`,`cookie`,`eliminado`,`fecha`,`compania-eliminame`,`telefono`,`nivel`,`imagenfoto`,`patrulla`,`id_conpania`,`facebook`) values (100,'alextutor','nmûúÛ0n›„|Œ¢Þ','alexzander huiza quispe','sisdatahost@hotmail.com','','NO','2015-01-16 22:17:40','1','996272600','ADMINISTRADOR',NULL,'',1,'dsds'),(99,'alfredo',']Ï²ágd\"¯\rb`Â”','alfredo gavilan ruiz yann','alfredo@hotmail.com','','NO','2015-01-16 02:33:21','7','996272600','USUARIO',NULL,'',7,NULL),(102,'carlosrivera','g¹Wò¦ÅN¨ZVU','juan Carlos rivera japa','juancarlosrivera1975@gmail.com','','NO','2015-01-18 21:05:40','5','997454307','USUARIO',NULL,'',5,NULL),(103,'miguelito','µ+ëûPr#«ñPˆkÞÊÒ','miguel angel cuevas guillen','miguel197372@hotmail.com','','NO','2015-01-20 00:09:32','1','997771848','USUARIO',NULL,'',1,NULL),(105,'vandamme','Ml”ìÑu$Øi¢½åÁÝž','jose Antonio Alarcon usca','ala71@hotmail.com','','NO','2015-01-21 02:29:24','6','994098677 ','USUARIO',NULL,'',6,NULL);

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

insert  into `webmodulos`(`ccodmodulo`,`cnommodulo`,`cestmodulo`,`cactgaleria`,`es_producto`) values ('1100','Articulos','1','','S'),('1400','Galeria Fotos','1','S','S'),('8800','Formularios','1','','N'),('1200','Catalogo','1','','S'),('1300','Paquetes','1','','S'),('1500','Anuncios','1','','-'),('1900','Compras','1','','N'),('1600','Metodo pago','1','','N'),('1700','Envio instruccion pagos','1','','N'),('1800','Presentacion','1','','N');

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

insert  into `webparametros`(`ccodparametro`,`ctipparametro`,`cvalparametro`,`cnomparametro`,`cdesparametro`) values ('0001','0','','Modulo','Modulo'),('0001','1','1100','Articulos','Articulos'),('0001','1','1200','Catalogo','Catalogo'),('0001','1','1300','Enlaces','Enlaces'),('0001','1','1400','Galeria de Fotos','Galeria de Fotos'),('0001','1','1500','Descargas','Descargas'),('0001','1','1600','Videos','Videos'),('0001','1','1700','Eventos','Eventos'),('0001','1','1800','Galeria 360','Galeria 360'),('0001','1','8800','Formularios','Formularios'),('0001','1','9900','Web Apps','Web Apps'),('0002','0','','Monedas','Monedas'),('0002','1','E','Euro','EUR'),('0002','1','D','Dolares','US$.'),('0002','1','S','Nuevo Soles','S/.'),('0003','0','','Tipos de Sucursales','Tipos de Sucursales'),('0003','1','01','Sede Principal','Sede Principal'),('0003','1','02','Sucursal','Sucursal'),('0003','1','03','Agencia','Agencia'),('0003','1','04','Distribuidor','Distribuidor'),('0004','0','','Ubicaciones Web','Ubicaciones Web'),('0004','1','1','Cabecera','Cabecera'),('0004','1','2','Columna Izquierda','Columna Izquierda'),('0004','1','3','Columna Central','Columna Central'),('0004','1','4','Columna Derecha','Columna Derecha'),('0004','1','5','Pie pagina','Pie pagina'),('0005','0','','Destino Url','Destino Url'),('0005','1','1','Es una seccion ','Es una seccion '),('0005','1','2','Es un enlace o link','Es un enlace o link'),('0006','0','','Sexo','Sexo'),('0006','1','F','Femenino','Femenino'),('0006','1','M','Masculino','Masculino'),('0006','1','E','No especificado','No especificado'),('0007','0','','Ordenar contenidos por','Ordenar contenidos por'),('0007','1','1','Fecha de ingreso','Fecha de ingreso'),('0007','1','2','Titulo del Item','Titulo del Item'),('0007','1','3','Orden Personalizado','Orden Personalizado'),('0007','1','4','Ordenar mas votados','Ordenar mas votados'),('0007','1','5','Ordenar mas comentados','Ordenar mas comentados'),('0012','0','','Tipos de Acceso','Tipos de Acceso'),('0012','1','0','Publico','Publico'),('0012','1','1','Privado ','Privado '),('0013','0','','Categorias de Contenidos','Categorias de Contenidos'),('0013','1','1','Normal','Normal'),('0013','1','2','Destacado','Destacado'),('0008','0','','TIPOS DE CAMPOS','TIPOS DE CAMPOS'),('0008','1','I','Campo de texto','Campo de texto'),('0008','1','S','Seleccion Simple','Seleccion Simple'),('0008','1','M','Seleccion Multiple','Seleccion Multiple'),('0010','0','','Idiomas','Idiomas'),('0010','1','es','Español','Español'),('0010','1','en','English','English'),('0010','1','fr','French','French'),('0011','0','','Tipo Telefono',''),('0011','1','FTEL','Telefono Fijo','Telefono Fijo'),('0011','1','TMOV','Telefono Movil','Telefono Movil'),('0011','1','TRPM','Telefono RPM','Telefono RPM'),('0011','1','TRPC','Telefono RPC','Telefono RPC'),('0011','1','TNEX','Nextel','Nextel'),('0014','0','','Tipo Contenido','Tipo Contenido'),('0014','1','1','Imagen (Gif / Jpg)','Imagen (Gif / Jpg)'),('0014','1','2','Animacion Flash (Swf)','Animacion Flash (Swf)'),('0014','1','3','Codigo Html','Codigo Html'),('0014','1','4','Contenido Dinamico','Contenido Dinamico'),('0015','0','','Orden Extraccion Contenido','Orden Extraccion Contenido'),('0015','1','1','Fecha de ingreso','Fecha de ingreso'),('0015','1','2','Codigo de Producto','Codigo de Producto'),('0015','1','3','Nombre de Producto','Nombre de Producto'),('0015','1','4','Mas visitados','Mas visitados'),('0016','0','','Ubicacion Contenido','Ubicacion Contenido'),('0016','1','1','Cabecera','Cabecera'),('0016','1','2','Columna Izquierda','Columna Izquierda'),('0016','1','3','Columna Centro','Columna Centro'),('0016','1','4','Columna Derecha','Columna Derecha'),('0016','1','5','Pie Pagina','Pie Pagina'),('1000','0','','Tipo Paquete','Tipo paquete'),('1000','1','VU','Vuelo','Vuelo'),('1000','1','HO','Hotel','Hotel'),('1000','1','VH','Vuelo Hotel','Vuelo Hotel'),('1001','0','','Clase de viaje','Clase de viaje'),('1001','1','N','Negocios','Negocios'),('1001','1','T','Turista','Turista'),('1002','0','','Tipos de Hotel','Tipos de Hotel'),('1002','1','','-','-'),('1002','1','E2','2 Estrellas','2 Estrellas'),('1002','1','E3','3 Estrellas','3 Estrellas'),('1002','1','E4','4 Estrellas','4 Estrellas'),('1002','1','E5','5 Estrellas','5 Estrellas'),('1003','0','','Tipo de Habitaciones','Tipo de Habitaciones'),('1003','1','','-','-'),('1003','1','HS','Simple','Simple'),('1003','1','HD','Doble','Doble'),('1003','1','HT','Triple','Triple'),('1003','1','AP','Apartamento','Apartamento'),('1004','0','','Regimen alimentario','Regimen alimentario'),('1004','1','','-','-'),('1004','1','1','Solo alojamiento','Solo alojamiento'),('1004','1','2','Alojamiento y desayuno','Alojamiento y desayuno'),('1004','1','3','Media Pension','Media Pension'),('1004','1','4','Pension completa','Pension completa'),('1004','1','5','Todo incluido','Todo Incluido'),('1005','0','','Medio de transporte','Medio de transporte'),('1005','1','1','Vuelo','Vuelo'),('1005','1','2','Tren','Tren'),('1005','1','3','Bus','Bus'),('0014','1','5','Slider Imagenes (nivo-slider)','Slider Imagenes (nivo-slider)'),('0014','1','6','Ventana Popup','Ventana Popup'),('0014','1','7','Slider Imagenes (jFlow)','Slider Imagenes (jFlow)'),('0001','1','1900','Compras','Compras'),('0014','1','9','Contactenos Portada 1 ','Contactenos Portada 1'),('0017','0','','Estilo Web','Estilo Web'),('0017','1','1','Izquierda Pantalla','Izquierda Pantalla'),('0017','1','2','Derecha Pantalla','Derecha Pantalla'),('0017','1','3','Ambos','Ambos'),('0018','0','','Ubicacion Menu','Ubicacion Menu'),('0018','1','1','Cabecera','Cabecera'),('0018','1','2','Columna Izquierda','Columna Izquierda'),('0018','1','3','Columna Derecha','Columna Derecha'),('0018','1','5','Pie Pagina','Pie Pagina'),('0014','1','8','infinitecarousel 2','infinitecarousel 2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
