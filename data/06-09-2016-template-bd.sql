/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 5.5.32 : Database - template-bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `template-bd`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1;

/*Data for the table `contactenos` */

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
) ENGINE=MyISAM AUTO_INCREMENT=12048 DEFAULT CHARSET=latin1;

/*Data for the table `contador` */

insert  into `contador`(`id`,`IP`,`hora`,`fecha`,`segundos`,`fechacorta`) values (12047,'127.0.0.1','08:31:32 AM','Miércoles 09 de Setiembre de 2015 Hora: 08:31:32 A','1441812692','2015-09-09');

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
  `tamano_cimgcontenido` varchar(10) DEFAULT NULL,
  `idexcel` varchar(30) DEFAULT NULL,
  `articulosrelacionados` varchar(1) DEFAULT NULL COMMENT 'Habilitar Articulos Relacionados',
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenido` */

insert  into `contenido`(`ccodcontenido`,`ccodpage`,`ccodcategoria`,`ccodmodulo`,`ccodestcontenido`,`cnomcontenido`,`camicontenido`,`crescontenido`,`ctagcontenido`,`ccodinterno`,`ccodmoneda`,`nstocontenido`,`cimgcontenido`,`cestcontenido`,`cestcomenface`,`ctipcontenido`,`curlcontenido`,`nviscontenido`,`cestcomentario`,`cestcompartirredes`,`nnrocomentario`,`dfeccontenido`,`ccodusuario`,`dfecmodifica`,`precio`,`precio_oferta`,`garantia`,`codigo_curso`,`duracion_curso`,`inicioclases`,`modalidad_curso`,`cordcontenido`,`estado`,`url_video`,`tamano_cimgcontenido`,`idexcel`,`articulosrelacionados`) values ('12172809150911160548QTW3','12172809','1','1100','1103','vaso de leche madres ate vitarte','vaso-de-leche-madres-ate-vitarte','				<span style=\"color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 17.5636px;\">Con madres&nbsp;del VASO DE LECHE del distrito de ATE atendiendo sus solicitudes y preparando actividades</span>		 		 ','',NULL,'','0.000','/imagen/12172809/vasodelecheate.jpg','1','1','1','',5,'0','1',0,'2015-09-11 00:00:00','100','2015-09-11 17:32:11','0','0','3 Meses','','1 Mes','1970-01-01','1',0,'1',NULL,NULL,NULL,NULL),('1217280915091201582176BS','12172809','1','1100','1103','instalacion comedor','instalacion-comedor','','',NULL,'','0.000','/imagen/12172809/instalaciondecomeducacion.jpg','1','','1','',3,'0','0',0,'2015-09-12 00:00:00','100','2015-09-11 18:58:21','0','0','6','','1 Mes','1970-01-01','',0,'1',NULL,NULL,NULL,NULL),('12172809150912015910LUST','12172809','1','1100','1103','alumnos','alumnos','','',NULL,'','0.000','/imagen/12172809/alumnosirgorettimaria.jpg','1','','1','',1,'0','0',0,'2015-09-12 00:00:00','100','2015-09-11 18:59:10','0','0','6','','1 Mes','1970-01-01','',0,'1',NULL,NULL,NULL,NULL),('12172809150924193556NYIA','12172809','1','2000','2001','Sistema Nacional Pensiones','VI12172809150924193556NYIA','','',NULL,'','0.000','/imagen/sistema-nacional-de-pensiones.jpg','1','0','1','',0,'1','0',0,'2015-09-24 12:35:56','','2015-09-24 12:35:56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1','http://www.youtube.com/v/5ECfRpXYe0Y',NULL,NULL,NULL),('12172809150924193630ESQ9','12172809','1','2000','2001','Que es la Jubilacion','VI12172809150924193630ESQ9','','',NULL,'','0.000','/imagen/que-es-la-jubilacion.jpg','1','0','1','',0,'1','0',0,'2015-09-24 12:36:30','','2015-09-24 12:36:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1','http://www.youtube.com/v/dl39OdfzuCQ',NULL,NULL,NULL),('12172809150924193655LZ8Q','12172809','1','2000','2001','Fuerzas Armadas Pension','VI12172809150924193655LZ8Q','','',NULL,'','0.000','/imagen/pension-fuerzas-armadas.jpg','1','0','1','',0,'1','0',0,'2015-09-24 12:36:55','','2015-09-24 12:36:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1','http://www.youtube.com/v/aohvYW2fGvc',NULL,NULL,NULL);

/*Table structure for table `contenidodetalle` */

DROP TABLE IF EXISTS `contenidodetalle`;

CREATE TABLE `contenidodetalle` (
  `ccodcontenido` varchar(24) NOT NULL,
  `cdetcontenido` longtext NOT NULL,
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenidodetalle` */

insert  into `contenidodetalle`(`ccodcontenido`,`cdetcontenido`) values ('12172809150911160548QTW3','                                        <span style=\"color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 17.5636px;\">Con madres&nbsp;del VASO DE LECHE del distrito de ATE atendiendo sus solicitudes y preparando actividades</span>                                          '),('1217280915091201582176BS',''),('12172809150912015910LUST','');

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

/*Table structure for table `detalle_colaboradores` */

DROP TABLE IF EXISTS `detalle_colaboradores`;

CREATE TABLE `detalle_colaboradores` (
  `idcolaboradores` int(12) NOT NULL AUTO_INCREMENT,
  `idactividad` int(12) DEFAULT NULL,
  `idpromo` int(12) DEFAULT NULL,
  `monto_colaborado` decimal(50,0) DEFAULT NULL,
  PRIMARY KEY (`idcolaboradores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_colaboradores` */

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `estiloclases` */

insert  into `estiloclases`(`ccodclase`,`ccodplantilla`,`cnomclase`,`cdesclase`) values (1,'0001','inicio','inicio'),(2,'0001','contenido','contenido'),(3,'0001','portada-laterales','portada-laterales'),(4,'0001','saludos','saludos'),(5,'0001','portada','portada'),(6,'0001','vacio','vacio'),(7,'0001','stylo_col_4','stylo_col_4'),(8,'0001','fondocate','fondocate'),(9,'0001','art_listado_01','art_listado_01'),(10,'0001','enlaces_pie','enlaces_pie'),(11,'0001','lista_hori_1','lista_hori_1'),(13,'0001','lista_hori_1_titulo','lista_hori_1_titulo'),(14,'0001','titulo_portada','titulo_portada'),(15,'0001','portada_Resumen','portada_Resumen'),(16,'0001','cuadrado_titulo','cuadrado_titulo'),(17,'0001','cuadrado_multicolor','cuadrado_multicolor');

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
  `galeria_imagen` varchar(200) DEFAULT NULL COMMENT 'que tipo de libreria se usara para presentar la galeria de imagenes',
  `menu_estilo` varchar(5) DEFAULT NULL COMMENT 'se cambio porque ya jala sde webparametros y solo guarda 2 difitos',
  PRIMARY KEY (`ccodplantilla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `estilopagina` */

insert  into `estilopagina`(`ccodplantilla`,`cnomplantilla`,`crutaplan`,`cestplantilla`,`cimgplantilla`,`ccodpage`,`webancho`,`webfondocolor`,`webfondoimagen`,`webfondorepetir`,`webestilo`,`webtexto`,`webmsup`,`webminf`,`cabeceraalto`,`cabecerafondocolor`,`cabecerafondoimagen`,`cabemenualto`,`cabemenufondocolor`,`cabemenufondoimagen`,`cabecontenidoalto`,`cabecontenidofondocolor`,`cabecontenidofondoimagen`,`columnaizqancho`,`cuerpofondocolor`,`cuerpofondoimagen`,`columnacenancho`,`columnaderancho`,`piecontenidoalto`,`piecontenidofondocolor`,`piecontenidofondoimagen`,`piemenualto`,`piemenufondocolor`,`piemenufondoimagen`,`piealto`,`piefondocolor`,`piefondoimagen`,`menusupalinea`,`menusupmizq`,`menusupmder`,`menusupancho`,`menusupalto`,`menusupcolor`,`menusupimagen`,`menusuptexto`,`menusupactcolor`,`menusupactimagen`,`menusupacttexto`,`menupiealinea`,`menupiemizq`,`menupiemder`,`menupieancho`,`menupiealto`,`menupiecolor`,`menupieimagen`,`menupietexto`,`menupieactcolor`,`menupieactimagen`,`menupieacttexto`,`menuhortituloalto`,`menuhortitulocolor`,`menuhortituloimagen`,`menuhortitulotexto`,`menuhoritemalto`,`menuhoritemcolor`,`menuhoritemimagen`,`menuhoritemtexto`,`menuhoritemactcolor`,`menuhoritemactimagen`,`menuhoritemacttexto`,`menuhorpiealto`,`menuhorpiecolor`,`menuhorpieimagen`,`hometituloalto`,`hometitulocolor`,`hometituloimagen`,`hometitulotxtcolor`,`ccodusuario`,`dfecmodifica`,`tipo_slider_banner`,`propaganda_1_1`,`propaganda_1_2`,`propaganda_1_3`,`titulo_propaganda_1_1`,`titulo_propaganda_1_2`,`titulo_propaganda_1_3`,`texto_propaganda_1_1`,`texto_propaganda_1_2`,`texto_propaganda_1_3`,`sBaseVirtual0`,`sBase0`,`sName0`,`ampliarimagen_portada`,`ampliarvideo_portada`,`galeria_imagen`,`menu_estilo`) values ('0001','alhuaycenteno_01','','1','tp0001.jpg','12172809','980','00142f','bg.jpg','Z','4','000000','0','0','125','','cabecera.png','40','ffffff','menucabecera.jpg','','FFFFFF','','0','','contenido.png','730','250','','','','40','ffffff','menucabecera.jpg','80','ffffff','','right','10','10','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','000000','right','0','0','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','191919','40','ffffff','menuizqtitulo.jpg','ffffff','30','ff7f00','','ffffff','5fbf00','','00ffff','0','FFFFFF','','35','005fbf','','ffffff','11061212','2011-12-28 00:00:00','jFlow','imagen/Venta-de-Boxes.gif','imagen/curso-reparacion-de-celulares.gif','imagen/reparacion-de-celulares.gif','Venta de Boxes<br/>Cajas de Desbloqueo y Reparación de Celulares','Curso de Reparación de Celulares','Reparación de Celulares','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio\">Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Se brinda Soporte y Asesoramiento\">Se brinda Soporte y Asesoramiento.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Los mejores precios del mercado\">Los mejores precios del mercado.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Asesoria para formar tu propio Negocio\">Asesoria para formar tu propio Negocio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Profesores Capacitados\">Profesores Capacitados.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Manuales de Servicio y Diagramas Todas las Marcas\">Manuales de Servicio y Diagramas Todas las Marcas.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Trabajamos con todas las marcas y modelos de celulares\">Trabajamos con todas las marcas y modelos de celulares.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips\">Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Servicio de JTAG para reparacion de boot para telefonos muertos\">Servicio de JTAG para reparacion de boot para telefonos muertos.</p>','imagen/12172809','imagen/12172809','fotos','NO','SI',NULL,NULL);

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

insert  into `estiloseccion`(`ccodsecestilo`,`cnomsecestilo`,`cimgsecestilo`,`cestsecestilo`,`cincsecestilo`,`ccodmodulo`,`cactusuario`) values ('1101','Pagina','estilo_imgpagina.gif','1','articulo_estilo01.php','1100','0'),('1102','Resumen','estiloresumen.gif','1','articulo_estilo02.php','1100','0'),('1103','Resumen doble','estiloresumendoble.gif','1','articulo_estilo03.php','1100','0'),('1104','Listado','estilolistado.gif','1','articulo_estilo04.php','1100','0'),('1105','Listado doble','estilolistadoble.gif','1','articulo_estilo05.php','1100','0'),('1106','Galeria','estilogaleria.gif','1','art_stylo_galeria.php','1100','0'),('1201','Pagina','estilo_imgpagina.gif','1','catalogo_estilo01.php','1200','0'),('1202','Resumen (1)','estiloresumen.gif','1','catalogo_estilo02.php','1200','0'),('1203','Resumen doble','estiloresumendoble.gif','1','catalogo_estilo03.php','1200','0'),('1204','Listado','estilolistado.gif','1','catalogo_estilo04.php','1200','0'),('1205','Listado precios','estilolistadoble.gif','1','catalogo_estilo05.php','1200','0'),('1206','Galeria','estilogaleria.gif','1','catalogo_estilo06.php','1200','0'),('1401','Album','estilogaleria.gif','1','fotos_estilos01.php','1400','0'),('1402','Estilo Full Screen','estilogaleria.gif','1','fotos_estilos02.php','1400','0'),('8801','Contactos','estilosformulario.gif','1','contactenos/contactenos.php','8800','0'),('8802','Buscador','estilosformulario.gif','1','buscador_01.php','8800','0'),('8803','Cotizar','estilosformulario.gif','1','form_cotizar.php','8800',''),('8804','Maps','estilosformulario.gif','1','mapa/form_mapa.php','8800','0'),('1107','Estilo Blog','estiloblog.gif','1','articulo_estilo07.php','1100','0'),('1108','Estilo Blog-Imagen','estiloblog.gif','1','articulo_estilo08.php','1100','0'),('1901','Tienda 1','','1','tienda_virtual/vercarrito.php','1900','0'),('1601','Metodo Pago 1','','1','metodo_pago01.php','1600','0'),('1701','Envio Instruccion Pago 1','','1','envio-instruccion-pagos01.php','1700','0'),('1801','Prod.Listado 1','','1','estilo_pre_01.php','1800','0'),('1802','Prod.Ofertas 1','','1','oferta_01.php','1800','0'),('1207','Estilo Curso Resumen 01','','1','style-curso-resumen-01.php','1200','0'),('1803','Curso Listado 1','','1','estilo_pre-curso_01.php','1800','0'),('1109','Listado Numeros','estilolistado.gif','1','articulo_estilo09.php','1100','0'),('1804','Lstdo Hori 2nivel','','1','stilo-lis-hori-01.php','1800','0'),('1805','Lstdo Hori Pro IMG','','1','stilo-lis-hori-img-01.php','1800','0'),('1806','infinitecarousel 2','','1','infinitecarousel2.php','1800','0'),('8805','Registro Contingente ','estilosformulario.gif','1','form-registro-contingente.php','8800','0'),('1110','Listado Comentarios','estilolistado.gif','1','articulo_estilo10.php','1100','0'),('8806','Formulario Acceso','estilosformulario.gif','1','form-iniciar-sesion.php','8800','0'),('8807','Configuracion Usuario','estilosformulario.gif','1','form-configuracion-usuario.php','8800','0'),('1807','Listado Comentario Portada','','1','listado-comentario-portada.php','1800','0'),('1808','Listado Usuario Portada','','1','listado-usuarios-portada.php','1800','0'),('8808','Formulario Recordar Contrasena','estilosformulario.gif','1','form-recordatorio-contrasena.php','8800','0'),('2001','Videos Listado General','estilogaleria.gif','1','videos-listado-general.php','2000','0'),('1809','Videos slider Portada ','','1','videos-slider-portada-infinitecarousel2.php','1800','0'),('1403','Panel Izquierdo','estilogaleria.gif','1','foto_ctn_iz_centro.php','1400','0'),('1810','Fotos slider Portada','','1','fotos-slider-portada-infinitecarousel2.php','1800','0'),('1811','Fotos slider Portada Thumbnail','','1','fotos-slider-portada-Thumbnails.php','1800','0'),('1404','Lstado Hori Categoria superior','estilogaleria.gif','1','foto_lstado_hori_categoria_superiror.php','1400','0'),('1812','Tab TabStylesInspiration hori ','','1','tabs_TabStylesInspiration_hori_cate01.php','1800','0'),('1813','Tab jquery steps verti 1','','1','tabs_jquery_steps_verti_01.php','1800',''),('8809','Maps Sin Pre-Imagen','estilosformulario.gif','1','mapa/form_mapa_sin_pre_imagen.php','8800',''),('1405','Album PhotoSwipe','estilogaleria.gif','1','foto_album_photoswipe.php','1400','0'),('1111','Galeria photoswipe','estilolistado.gif','1','art_stylo_galeria_photoswipe.php','1100','0'),('1112','Resumen Galeria','estilolistado.gif','1','articulo_resumen_galeria.php','1100','0'),('1113','Resumen_02','estilolistado.gif','1','articulo_resumen2.php','1100','0'),('1814','Lstdo Hori2nivelyArticulo','estilolistado.gif','1','stilo-lis-Hori2nivelyArticulo-01.php','1800','');

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

/*Table structure for table `listado_actividades` */

DROP TABLE IF EXISTS `listado_actividades`;

CREATE TABLE `listado_actividades` (
  `idactividad` int(12) NOT NULL AUTO_INCREMENT,
  `nomb_actividad` char(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `listado_actividades` */

/*Table structure for table `listado_cuarto_contingente_93` */

DROP TABLE IF EXISTS `listado_cuarto_contingente_93`;

CREATE TABLE `listado_cuarto_contingente_93` (
  `apellidos` varchar(150) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `celular1` varchar(20) DEFAULT NULL,
  `celular2` varchar(20) DEFAULT NULL,
  `idpromo` int(12) NOT NULL AUTO_INCREMENT,
  `promo` varchar(250) DEFAULT 'SI',
  `imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idpromo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `listado_cuarto_contingente_93` */

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
  `ctelefonopri` varchar(150) NOT NULL,
  `ctelefonosec` varchar(150) NOT NULL,
  `tmovil1` varchar(150) DEFAULT NULL,
  `tmovil2` varchar(150) DEFAULT NULL,
  `tmovil3` varchar(150) DEFAULT NULL,
  `tmovil4` varchar(150) DEFAULT NULL,
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
  `cscriptfacebook` longblob COMMENT 'para insertar script de facebook',
  `fb_admins_facebook` varchar(50) DEFAULT NULL,
  `fb_app_id_facebook` varchar(50) DEFAULT NULL,
  `Script_chat` longblob,
  PRIMARY KEY (`ccodpage`),
  UNIQUE KEY `camipage` (`camipage`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `page` */

insert  into `page`(`ccodpage`,`cnompage`,`cnikpage`,`cdocpage`,`crazpage`,`cslogan`,`ccodidioma`,`camipage`,`cdefpage`,`credpage`,`cestpage`,`ctitpage`,`ctagpage`,`cdespage`,`cpiepage`,`canagoogle`,`ccodpais`,`clogo`,`nmosprecio`,`ccodmoneda`,`cfavicon`,`ccodplantilla`,`nvispage`,`cemacontacto`,`cemasoporte`,`cemaventas`,`cdistrito`,`cdirecempresa`,`chorarioatencion`,`ctelefonopri`,`ctelefonosec`,`tmovil1`,`tmovil2`,`tmovil3`,`tmovil4`,`cod_google_map`,`anchomapa`,`altomapa`,`credYoutube`,`credTwitter`,`credFacebook`,`ccodmodulo`,`cprovincia`,`imagen_mapa`,`rutaimages`,`cprovincia2`,`cdistrito2`,`cdirecempresa2`,`estado`,`cscriptfacebook`,`fb_admins_facebook`,`fb_app_id_facebook`,`Script_chat`) values ('12172809','geoenterprice','geoenterprice','','','','es','desarrollo.com','1','','1','Soluciones Gis - Enterprice S.A.C','Posee una amplia organización adecuada para desarrollar distintos tipos de consultorías, para lo cual cuenta con las siguientes áreas técnicas:Catastro,Topografía y Geodesia,Medio Ambiente,Sistemas de Información Geográfica y Sistemas,Ordenamiento del Territorio,Capacitación,Prevención de Riesgos                                                                                                                                                                                                           ',' técnicas: Catastro, Topografía y Geodesia,Medio Ambiente,Sistemas de Información Geográfica y Sistemas,Ordenamiento del Territorio,Capacitación,Prevención de Riesgos\r\ncursos: gis , base de datos postgres.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ','<br>\nCopyright © 2011 FP Diesel Todos los derechos reservados<br>\nAv. Elmer Faucett 330 Urb. La Colonial - Callao 01 Perú \nTeléfono: +511 4520378 Fax +511 4520378 Nextel: 813*4542 / 813*4197  gerencia@rysdistribuciones.com  \n','<script>\r\n  (function(i,s,o,g,r,a,m){i[\\\\\\\\\\\\\\\'GoogleAnalyticsObject\\\\\\\\\\\\\\\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\\\\\\\\\\\\\\\'script\\\\\\\\\\\\\\\',\\\\\\\\\\\\\\\'//www.google-analytics.com/analytics.js\\\\\\\\\\\\\\\',\\\\\\\\\\\\\\\'ga\\\\\\\\\\\\\\\');\r\n\r\n  ga(\\\\\\\\\\\\\\\'create\\\\\\\\\\\\\\\', \\\\\\\\\\\\\\\'UA-55353009-1\\\\\\\\\\\\\\\', \\\\\\\\\\\\\\\'auto\\\\\\\\\\\\\\\');\r\n  ga(\\\\\\\\\\\\\\\'send\\\\\\\\\\\\\\\', \\\\\\\\\\\\\\\'pageview\\\\\\\\\\\\\\\');\r\n\r\n</script>                                                                                                                                                                                                                                                                                                                                                                                                                                  ','PE000000','/imagen/12172807/logo-gis.gif','0','D','/imagen/12172807/soluciones_gis_menu.ico','0001',112178,'soluciones@geoenterprice.com','gerencia@rysdistribuciones.com','soluciones@geoenterprice.com','Breña','Dirección:  Jr. Huaraz 1652',' Horario de atención : Lunes a Viernes  de  8 Am - 5 Pm                                             ','017220864','',NULL,NULL,NULL,NULL,'<iframe width=\"99%\" height=\"450\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://www.google.es/maps?q=-12.065677,-77.049926&num=1&hl=es-419&ie=UTF8&ll=-12.06626,-77.049828&spn=0.002859,0.005284&t=m&z=14&output=embed\"></iframe><br /><small><a href=\"https://www.google.es/maps?q=-12.065677,-77.049926&num=1&hl=es-419&ie=UTF8&ll=-12.06626,-77.049828&spn=0.002859,0.005284&t=m&z=14&source=embed\" style=\"color:#0000FF;text-align:left\">Ver mapa más grande</a></small>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ','95%','470','https://www.youtube.com/user/solucionesenterprice','https://twitter.com/geoenterprice','https://www.facebook.com/geoenterprice','1100','Cercado de Lima','/imagen/12172807/mapa-de-sitio.png','','','','',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pagehome` */

DROP TABLE IF EXISTS `pagehome`;

CREATE TABLE `pagehome` (
  `ccodinicio` int(8) NOT NULL AUTO_INCREMENT,
  `ccodpage` varchar(8) NOT NULL,
  `cnomhome` varchar(100) NOT NULL,
  `ccodclase` int(11) NOT NULL,
  `cesthome` varchar(1) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `pagehome` */

insert  into `pagehome`(`ccodinicio`,`ccodpage`,`cnomhome`,`ccodclase`,`cesthome`,`ctiphome`,`cimgpubli`,`nancho`,`nalto`,`curlpubli`,`cadspubli`,`ccodestilo`,`ccodmodulo`,`ccodseccion`,`ccodcategoria`,`nnroitems`,`ccodorden`,`cubidestino`,`cordpublica`,`cpubsec`,`cpubnom`,`cpubres`,`cpubimg`,`cimgsize`,`dfecinicio`,`dfecfinal`,`anchowin`,`altowin`,`cimagen1`,`curl1`,`titulo_imagen1`,`texto_imagen1`,`cimagen2`,`curl2`,`titulo_imagen2`,`texto_imagen2`,`cimagen3`,`curl3`,`titulo_imagen3`,`texto_imagen3`,`cimagen4`,`curl4`,`titulo_imagen4`,`texto_imagen4`,`cimagen5`,`curl5`,`titulo_imagen5`,`texto_imagen5`,`dfechome`,`estado`,`mostrar_titulo`,`texto1`,`texto2`,`texto3`,`texto4`,`texto5`) values (94,'12172809','cabecera-imagen',6,'1','1','/imagen/12172809/juan%20carlos%20banner.jpg',980,225,'','',NULL,'',NULL,'',0,'','1',0,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-09-09','','no',NULL,NULL,NULL,NULL,NULL),(96,'12172809','Ultimas Noticias',14,'2','4','',NULL,NULL,'','','1806','1100','121728090001000000000000','0',1,'1','3',1,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-09-11','','si',NULL,NULL,NULL,NULL,NULL),(97,'12172809','borrame',1,'2','1','/imagen/12172809/vasodelecheate.jpg',200,200,'','',NULL,'',NULL,'',0,'','3',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-09-15','','si',NULL,NULL,NULL,NULL,NULL),(99,'12172809','Videos Portada',1,'2','4','',NULL,NULL,'','','1809','2000','121728092002000000000000','0',1,'1','3',0,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2015-09-24','','si',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pagehomedet` */

DROP TABLE IF EXISTS `pagehomedet`;

CREATE TABLE `pagehomedet` (
  `ccodinicio` int(8) NOT NULL,
  `ccoddestino` varchar(24) NOT NULL,
  PRIMARY KEY (`ccodinicio`,`ccoddestino`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pagehomedet` */

insert  into `pagehomedet`(`ccodinicio`,`ccoddestino`) values (94,'T'),(96,'D'),(97,'T'),(99,'D');

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
  `mostrarportada` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ccodmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `pagemenu` */

insert  into `pagemenu`(`ccodmenu`,`ccodpage`,`cnommenu`,`cubimenu`,`cclamenu`,`cestmenu`,`cmenuorden`,`mostrarportada`) values (1,'12172809','Cabecera','1','','1','0',NULL),(3,'12172809','Pie','5','','1','',NULL);

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

insert  into `pagesucursal`(`ccodsucursal`,`ccodpage`,`ctipsucursal`,`cnomsucursal`,`cdessucursal`,`ccodubigeo`,`cdiroficina`,`clatsucursal`,`clonsucursal`,`ctelsucursal`,`cfaxsucursal`,`cmovsucursal`,`cnexsucursal`,`cemasucursal`,`curlsucursal`,`cestsucursal`,`dfecsucursal`,`dfecmodifica`,`ccodusuario`,`cod_google_map`,`anchomapa`,`altomapa`,`horario_atencion`,`localprincipal`) values (1,'12172809','01','Callao','','','jr callao','','','4520378','4520378','813*4542','','gerencia@rysdistribuciones.com','www.rysdistribuciones.com','1','2011-08-01','2014-08-22 23:28:30','11061212','<iframe width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&output=embed\"></iframe><br /><small>Ver <a href=\"http://maps.google.com.pe/maps/ms?msid=209071589162732424069.0004bdc90414f5d1803a5&msa=0&hl=es&ie=UTF8&t=m&ll=-12.042783,-77.047977&spn=0.004722,0.008572&z=17&source=embed\" style=\"color:#0000FF;text-align:left\">www.gamatell.com</a> en un mapa más grande</small>                                                                                                                                                                                                                                                                                                                                                                ','660','450','Lunes a Viernes de  8 Am - 5 Pm                                    ','si');

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
  `ccodestilomenu` varchar(4) DEFAULT NULL COMMENT 'guarda el codigo de estilo menu lo saca de la tabla webparametros campo ctipparametro',
  `cnombreestilomenu` varchar(15) DEFAULT NULL COMMENT 'guarda el Nombre de estilo menu',
  PRIMARY KEY (`ccodseccion`),
  KEY `camiseccion` (`ccodpage`,`camiseccion`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`ccodseccion`,`ccodpage`,`ccodplantilla`,`ccodmodulo`,`ccodsecestilo`,`ccodclase`,`cnomseccion`,`camiseccion`,`ctitseccion`,`cdesseccion`,`ctagseccion`,`cimgseccion`,`cestseccion`,`cnivseccion`,`ctipseccion`,`cestpublico`,`cnewmenu`,`curlseccion`,`cpagseccion`,`cordcontenido`,`nvisseccion`,`dfecseccion`,`ccodusuario`,`dfecmodifica`,`estado`,`totalpantalla`,`paginator`,`mostrarurlcatebase`,`ccodestilomenu`,`cnombreestilomenu`) values ('121728090001000000000000','12172809','0001','1100','1102',9,'Noticias','noticias','Noticias','','','','1','1','1','0','0','','12',2,0,'2015-09-11','100','2015-09-21 18:14:02','1','totalpantalla',NULL,'SI',NULL,NULL),('121728092000000000000000','12172809','0001','1100','1101',9,'Juan Carlos Alhuay Centeno','juan-carlos-alhuay-centeno','Juan Carlos Alhuay Centeno','','','','1','1','2','0','0','/index.php','12',1,0,'2015-09-14','100','2015-09-15 03:13:17','1','totalpantalla',NULL,'SI',NULL,NULL),('121728092001000000000000','12172809','0001','1100','1101',9,'Galeria Fotos','galeria-fotos','Galeria Fotos','','','','1','1','1','0','0','','12',3,0,'2015-09-14','100','2015-09-15 02:15:44','1','ambos',NULL,'SI',NULL,NULL),('121728092002000000000000','12172809','0001','2000','2001',13,'Galeria Videos','galeria-videos','Galeria Videos','','','','1','1','1','0','0','','12',4,0,'2015-09-14','100','2015-09-24 17:20:29','1','totalpantalla',NULL,'SI',NULL,NULL),('121728092003000000000000','12172809','0001','8800','8801',9,'Contactenos','contactenos','Contactenos','','','','1','1','1','0','0','','12',5,0,'2015-09-14','100','2015-09-14 19:16:57','1','totalpantalla',NULL,'',NULL,NULL),('121728090001000100000000','12172809','0001','1100','1102',9,'borrame1','borrame1','borrame1','','','','1','2','1','0','0','','12',0,0,'2015-09-26','100','2015-09-26 15:35:57','1','ambos',NULL,NULL,NULL,NULL);

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

insert  into `seccioncontenido`(`ccodpage`,`ccodseccion`,`ccodcontenido`,`cordcontenido`) values ('12172809','121728090001000000000000','12172809150911160548QTW3',0),('12172809','121728090001000000000000','1217280915091201582176BS',0),('12172809','121728090001000000000000','12172809150912015910LUST',0),('12172809','121728092002000000000000','12172809150924193556NYIA',0),('12172809','121728092002000000000000','12172809150924193630ESQ9',0),('12172809','121728092002000000000000','12172809150924193655LZ8Q',0),('12172809','121728092002000000000000','12172809150924200707N6CQ',0),('12172809','121728092002000000000000','121728091509242011179YW5',0);

/*Table structure for table `seccionmenu` */

DROP TABLE IF EXISTS `seccionmenu`;

CREATE TABLE `seccionmenu` (
  `ccodseccion` varchar(24) NOT NULL,
  `ccodmenu` int(8) NOT NULL COMMENT 'viene tabla webparametros',
  `cordmenu` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ccodseccion`,`ccodmenu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccionmenu` */

insert  into `seccionmenu`(`ccodseccion`,`ccodmenu`,`cordmenu`) values ('121728062000000000000000',1,0),('121728062005000000000000',1,0),('121728062002000000000000',1,0),('121728062003000000000000',1,0),('121728060001000000000000',1,0),('121728062004000000000000',1,0),('121728062013000000000000',1,0),('121728070001000000000000',1,0),('121728072000000000000000',1,0),('121728072001000000000000',1,0),('121728072002000000000000',1,0),('121728072003000000000000',1,0),('121728072004000000000000',1,0),('121728090001000000000000',1,0),('121728092000000000000000',1,0),('121728092001000000000000',1,0),('121728092002000000000000',1,0),('121728092003000000000000',1,0);

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
  `2visitaancon` varchar(3) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`) USING BTREE,
  KEY `id` (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nick`,`password`,`nombre`,`email`,`cookie`,`eliminado`,`fecha`,`compania-eliminame`,`telefono`,`nivel`,`imagenfoto`,`patrulla`,`id_conpania`,`facebook`,`2visitaancon`,`estado`) values (100,'alextutor','nmûúÛ0n›„|Œ¢Þ','alexzander huiza quispe','sisdatahost@hotmail.com','','NO','2015-01-16 22:17:40','1','996272600','USUARIO','/imagen/foto-usuarios/quebrada-inozente-rios-huiza.jpg','',1,'https://www.facebook.com/alexhuizaquispe',NULL,'1'),(204,'adamo','X\\v¿%µ‰@½\\É­]C','adamo','sisdatahost@hotmail.com','','NO','2015-01-16 22:17:40','1','996272600','USUARIO','/imagen/foto-usuarios/quebrada-inozente-rios-huiza.jpg','',1,'https://www.facebook.com/alexhuizaquispe',NULL,'1'),(205,'Erika','Ê½„gÁ?8«¦Ž_Rºç','Erika','sisdatahost@hotmail.com','','NO','2016-03-16 15:46:23',NULL,'','USUARIO','/modulos/comentario-combinado-multiple/usuario-anonimo.gif',NULL,NULL,NULL,NULL,'-2'),(206,'rolando','½—É’KîÅ\r*\0T¬Ô','rolando','sisdatahost@hotmail.com','','NO','2016-03-17 19:52:12',NULL,'','USUARIO','/modulos/comentario-combinado-multiple/usuario-anonimo.gif',NULL,NULL,NULL,NULL,'1');

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

insert  into `webparametros`(`ccodparametro`,`ctipparametro`,`cvalparametro`,`cnomparametro`,`cdesparametro`) values ('0001','0','------------','Modulo','Modulo'),('0001','1','1100','Articulos','Articulos'),('0001','1','1200','Catalogo','Catalogo'),('0001','1','1300','Enlaces','Enlaces'),('0001','1','1400','Galeria de Fotos','Galeria de Fotos'),('0001','1','1500','Descargas','Descargas'),('0001','1','1600','Videos','Videos'),('0001','1','1700','Eventos','Eventos'),('0001','1','1800','Galeria 360','Galeria 360'),('0001','1','8800','Formularios','Formularios'),('0001','1','9900','Web Apps','Web Apps'),('0002','0','------------','Monedas','Monedas'),('0002','1','E','Euro','EUR'),('0002','1','D','Dolares','US$.'),('0002','1','S','Nuevo Soles','S/.'),('0003','0','------------','Tipos de Sucursales','Tipos de Sucursales'),('0003','1','01','Sede Principal','Sede Principal'),('0003','1','02','Sucursal','Sucursal'),('0003','1','03','Agencia','Agencia'),('0003','1','04','Distribuidor','Distribuidor'),('0004','0','------------','Ubicaciones Web','Ubicaciones Web'),('0004','1','1','Cabecera','Cabecera'),('0004','1','2','Columna Izquierda','Columna Izquierda'),('0004','1','3','Columna Central','Columna Central'),('0004','1','4','Columna Derecha','Columna Derecha'),('0004','1','5','Pie pagina','Pie pagina'),('0005','0','------------','Destino Url','Destino Url'),('0005','1','1','Es una seccion ','Es una seccion '),('0005','1','2','Es un enlace o link','Es un enlace o link'),('0006','0','------------','Sexo','Sexo'),('0006','1','F','Femenino','Femenino'),('0006','1','M','Masculino','Masculino'),('0006','1','E','No especificado','No especificado'),('0007','0','------------','Ordenar contenidos por','Ordenar contenidos por'),('0007','1','1','Fecha de ingreso','Fecha de ingreso'),('0007','1','2','Titulo del Item','Titulo del Item'),('0007','1','3','Orden Personalizado','Orden Personalizado'),('0007','1','4','Ordenar mas votados','Ordenar mas votados'),('0007','1','5','Ordenar mas comentados','Ordenar mas comentados'),('0012','0','------------','Tipos de Acceso','Tipos de Acceso'),('0012','1','0','Publico','Publico'),('0012','1','1','Privado ','Privado '),('0013','0','------------','Categorias de Contenidos','Categorias de Contenidos'),('0013','1','1','Normal','Normal'),('0013','1','2','Destacado','Destacado'),('0008','0','------------','TIPOS DE CAMPOS','TIPOS DE CAMPOS'),('0008','1','I','Campo de texto','Campo de texto'),('0008','1','S','Seleccion Simple','Seleccion Simple'),('0008','1','M','Seleccion Multiple','Seleccion Multiple'),('0010','0','------------','Idiomas','Idiomas'),('0010','1','es','Español','Español'),('0010','1','en','English','English'),('0010','1','fr','French','French'),('0011','0','------------','Tipo Telefono',''),('0011','1','FTEL','Telefono Fijo','Telefono Fijo'),('0011','1','TMOV','Telefono Movil','Telefono Movil'),('0011','1','TRPM','Telefono RPM','Telefono RPM'),('0011','1','TRPC','Telefono RPC','Telefono RPC'),('0011','1','TNEX','Nextel','Nextel'),('0014','0','------------','Tipo Contenido','Tipo Contenido'),('0014','1','1','Imagen (Gif / Jpg)','Imagen (Gif / Jpg)'),('0014','1','2','Animacion Flash (Swf)','Animacion Flash (Swf)'),('0014','1','3','Codigo Html','Codigo Html'),('0014','1','4','Contenido Dinamico','Contenido Dinamico'),('0015','0','------------','Orden Extraccion Contenido','Orden Extraccion Contenido'),('0015','1','1','Fecha de ingreso','Fecha de ingreso'),('0015','1','2','Codigo de Producto','Codigo de Producto'),('0015','1','3','Nombre de Producto','Nombre de Producto'),('0015','1','4','Mas visitados','Mas visitados'),('0016','0','------------','Ubicacion Contenido','Ubicacion Contenido'),('0016','1','1','Cabecera','Cabecera'),('0016','1','2','Columna Izquierda','Columna Izquierda'),('0016','1','3','Columna Centro','Columna Centro'),('0016','1','4','Columna Derecha','Columna Derecha'),('0016','1','5','Pie Pagina','Pie Pagina'),('1000','0','------------','Tipo Paquete','Tipo paquete'),('1000','1','VU','Vuelo','Vuelo'),('1000','1','HO','Hotel','Hotel'),('1000','1','VH','Vuelo Hotel','Vuelo Hotel'),('1001','0','------------','Clase de viaje','Clase de viaje'),('1001','1','N','Negocios','Negocios'),('1001','1','T','Turista','Turista'),('1002','0','------------','Tipos de Hotel','Tipos de Hotel'),('1002','1','','-','-'),('1002','1','E2','2 Estrellas','2 Estrellas'),('1002','1','E3','3 Estrellas','3 Estrellas'),('1002','1','E4','4 Estrellas','4 Estrellas'),('1002','1','E5','5 Estrellas','5 Estrellas'),('1003','0','------------','Tipo de Habitaciones','Tipo de Habitaciones'),('1003','1','','-','-'),('1003','1','HS','Simple','Simple'),('1003','1','HD','Doble','Doble'),('1003','1','HT','Triple','Triple'),('1003','1','AP','Apartamento','Apartamento'),('1004','0','------------','Regimen alimentario','Regimen alimentario'),('1004','1','','-','-'),('1004','1','1','Solo alojamiento','Solo alojamiento'),('1004','1','2','Alojamiento y desayuno','Alojamiento y desayuno'),('1004','1','3','Media Pension','Media Pension'),('1004','1','4','Pension completa','Pension completa'),('1004','1','5','Todo incluido','Todo Incluido'),('1005','0','------------','Medio de transporte','Medio de transporte'),('1005','1','1','Vuelo','Vuelo'),('1005','1','2','Tren','Tren'),('1005','1','3','Bus','Bus'),('0014','1','5','Slider Imagenes (nivo-slider)','Slider Imagenes (nivo-slider)'),('0014','1','6','Ventana Popup','Ventana Popup'),('0014','1','7','Slider Imagenes (jFlow)','Slider Imagenes (jFlow)'),('0001','1','1900','Compras','Compras'),('0014','1','9','Contactenos Portada 1 ','Contactenos Portada 1'),('0017','0','------------','Estilo Web','Estilo Web'),('0017','1','1','Izquierda Pantalla','Izquierda Pantalla'),('0017','1','2','Derecha Pantalla','Derecha Pantalla'),('0017','1','3','Ambos','Ambos'),('0018','1','1','Cabecera','Cabecera'),('0018','1','2','Columna Izquierda','Columna Izquierda'),('0018','1','3','Columna Derecha','Columna Derecha'),('0018','1','5','Pie Pagina','Pie Pagina'),('0014','1','8','infinitecarousel 2','infinitecarousel 2'),('0019','0','------------','Tipo Asistencia','Tipo Asistencia'),('0019','1','1','Virtual','Virtual'),('0019','1','2','Presencial ','Presencial '),('0017','1','4','Total Pantalla','Total Pantalla'),('0014','1','10','Slider Imagenes(LayerSlider5)','Slider Imagenes(LayerSlider5)'),('0005','1','3','Es una seccion contenido','Es una seccion contenido'),('0014','1','11','Formulario Buscador','Formulario Buscador'),('0004','1','6','Cabecera TOP-1','Cabecera TOP-1'),('0004','1','7','Cabecera TOP-2','Cabecera TOP-2'),('0004','1','8','Cabecera TOP-3','Cabecera TOP-3'),('0004','1','9','Cabecera TOP-4','Cabecera TOP-4'),('0018','0','------------','Ubicacion Menu','Ubicacion Menu'),('0020','0','------------','Menu Estilos','Menu Estilos'),('0020','1','1','Menu Estilo 01','Menu Estilo 01'),('0020','1','2','Menu Estilo 02','Menu Estilo 02'),('0020','1','3','Menu Estilo 03','Menu Estilo 03'),('0020','1','4','Menu Estilo 04','Menu Estilo 04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
