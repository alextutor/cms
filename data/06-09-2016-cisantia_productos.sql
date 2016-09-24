/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 5.5.32 : Database - cisantia_productos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `cisantia_productos`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `archivos` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contador` */

insert  into `contador`(`id`,`IP`,`hora`,`fecha`,`segundos`,`fechacorta`) values (1,'127.0.0.1','07:51:15 AM','Lunes 08 de Agosto de 2016 Hora: 07:51:15 AM','1470667875','2016-08-08');

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

insert  into `contenido`(`ccodcontenido`,`ccodpage`,`ccodcategoria`,`ccodmodulo`,`ccodestcontenido`,`cnomcontenido`,`camicontenido`,`crescontenido`,`ctagcontenido`,`ccodinterno`,`ccodmoneda`,`nstocontenido`,`cimgcontenido`,`cestcontenido`,`cestcomenface`,`ctipcontenido`,`curlcontenido`,`nviscontenido`,`cestcomentario`,`cestcompartirredes`,`nnrocomentario`,`dfeccontenido`,`ccodusuario`,`dfecmodifica`,`precio`,`precio_oferta`,`garantia`,`codigo_curso`,`duracion_curso`,`inicioclases`,`modalidad_curso`,`cordcontenido`,`estado`,`url_video`,`tamano_cimgcontenido`,`idexcel`,`articulosrelacionados`) values ('12172813140930052402U5UO','12172813','1','1200','1204','Servicios de Topografía y Cartografia','servicios-de-topografia-y-cartografia','','',NULL,'','0.000','/imagen/servicio_topografia_cartografia.gif','1','0','1','',402,'','0',0,'2014-09-30 00:00:00','1','2014-09-29 18:26:28','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('1217281314093005434563XL','12172813','1','1200','1207','Servicios sistemas de información geográfica','servicios-sistemas-de-informacion-geografica','','',NULL,'','0.000','','1','0','1','',415,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 12:26:03','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('121728131409222358197G4R','12172813','2','1200','1204','Quienes Somos','quienes-somos','','',NULL,'','0.000','/web/12172806/fotos/presentacion.gif','1','0','1','',788,'','0',0,'2014-09-22 00:00:00','1','2014-09-28 14:06:45','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('1217281314093022250887I1','12172813','1','1200','1204','Ordenamiento Ambiental','ordenamiento-ambiental','','',NULL,'','0.000','/imagen/ordenamiento-ambiental.gif','1','0','1','',355,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 15:00:29','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222523BDHL','12172813','1','1200','1204','Auditoria Ambiental y Territorial','auditoria-ambiental-y-territorial','','',NULL,'','0.000','/imagen/auditoria-ambiental-territorial.gif','1','0','1','',363,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 15:01:16','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222322VDY5','12172813','1','1200','1207','Servicios de geomarketing','servicios-de-geomarketing','','',NULL,'','0.000','','1','0','1','',422,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 14:59:04','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('121728131409302223419QS1','12172813','1','1200','1207','Ordenamiento y gestión territorial','ordenamiento-y-gestion-territorial','','',NULL,'','0.000','','1','0','1','',510,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 12:42:28','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222356LLOI','12172813','1','1200','1207','Catastro Urbano','catastro-urbano','','',NULL,'','0.000','','1','0','1','',367,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 13:19:43','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222412WPKH','12172813','1','1200','1207','Estudios de Impacto Ambiental','estudios-de-impacto-ambiental','','',NULL,'','0.000','','1','0','1','',757,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 13:30:53','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222427LUDT','12172813','1','1200','1204','Gestión Integral de Residuos','gestion-integral-de-residuos','','',NULL,'','0.000','/imagen/Gestion-Integral-de-Residuos.gif','1','0','1','',367,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 14:03:33','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813140930222438D111','12172813','1','1200','1207','Educación Ambiental','educacion-ambiental','','',NULL,'','0.000','','1','0','1','',368,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 14:51:55','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('1217281314093022245326HR','12172813','1','1200','1204','Ordenación del Territorio','ordenacion-del-territorio','','',NULL,'','0.000','/imagen/ordenacion-territorio.gif','1','0','1','',341,'','0',0,'2014-09-30 00:00:00','1','2014-09-30 14:55:01','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('1217281314092901243444OC','12172813','1','1200','1207','Profesionales','profesionales','','',NULL,'','0.000','','1','0','1','',404,'','0',0,'2014-09-29 00:00:00','1','2014-09-29 06:05:30','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('1217281314093005175575VC','12172813','1','1200','1207','Proyectos en planificación y gestión territorial','proyectos-en-planificacion-y-gestion-territorial','','',NULL,'','0.000','','1','0','1','',426,'','0',0,'2014-09-30 00:00:00','1','2014-09-29 18:20:10','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001023300OF8I','12172813','1','1200','1207','En Canales de Riego','en-canales-de-riego','','',NULL,'','0.000','','1','0','1','',431,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:10:50','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('121728131410010233217TS3','12172813','1','1200','1204','Construcción Obras Hidraulicas','construccion-obras-hidraulicas','','',NULL,'','0.000','/imagen/construccion_obras_hidraulicas.gif','1','0','1','',762,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:14:00','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001023334GSCD','12172813','1','1200','1204','Construcción Carreteras','construccion-carreteras','','',NULL,'','0.000','/imagen/construccion_carreteras.gif','1','0','1','',303,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:16:41','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('121728131410010233507S6A','12172813','1','1200','1204','Construcción Puentes','construccion-puentes','','',NULL,'','0.000','/imagen/construccion_puentes.gif','1','0','1','',314,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:17:45','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001023403ZQ3T','12172813','1','1200','1204','Capacitación','capacitacion','','',NULL,'','0.000','/imagen/capacitacion_topografica.gif','1','0','1','',350,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:20:41','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001032340UEJS','12172813','1','1200','1207','Venta y Alquiler de Equipos Topográficos','venta-y-alquiler-de-equipos-topograficos','','',NULL,'','0.000','','1','0','1','',392,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:28:22','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001032355YOK4','12172813','1','1200','1207','Alquiler de Vehiculos','alquiler-de-vehiculos','','',NULL,'','0.000','','1','0','1','',315,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 16:30:23','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001041834DHV4','12172813','1','1200','1204','Capacitacion en Salud ocupacional','capacitacion-en-salud-ocupacional','','',NULL,'','0.000','/imagen/capacitacion-temas-salud-ocupacional.gif','1','0','1','',550,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 17:18:34','0','0','6','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL),('12172813141001033617UKOQ','12172813','1','1200','1204','Venta de EPPS','venta-de-epps','','',NULL,'','0.000','/imagen/equipo-proteccion.gif','1','0','1','',446,'','0',0,'2014-10-01 00:00:00','1','2014-09-30 17:15:30','0','0','3 Meses','','1 Mes','1970-01-01','Virtual',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `contenidodetalle` */

DROP TABLE IF EXISTS `contenidodetalle`;

CREATE TABLE `contenidodetalle` (
  `ccodcontenido` varchar(24) NOT NULL,
  `cdetcontenido` longtext NOT NULL,
  PRIMARY KEY (`ccodcontenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `contenidodetalle` */

insert  into `contenidodetalle`(`ccodcontenido`,`cdetcontenido`) values ('121728131409222358197G4R','<p><strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> es una empresa Peruana dedicada a los servicios de consultor&iacute;a de Proyectos de Obras civiles (Proyectos de Riego, Carreteras, Puentes, Topograf&iacute;a, Cartograf&iacute;a y edici&oacute;n de trabajos en el sistema de Informaci&oacute;n Geogr&aacute;fica (GIS).</p>\r\n<p><strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> tiene como objetivo principal realizar diversos tipos de consultor&iacute;as relacionadas con obras civiles y &nbsp;la informaci&oacute;n geogr&aacute;fica. Para ello, ejecuta estudios a nivel nacional, en todos los campos del desarrollo econ&oacute;mico del pa&iacute;s.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"clear\">\r\n<ul>\r\n<li>Venta y alquiler de equipos topogr&aacute;ficos.</li>\r\n<li>Alquiler de Veh&iacute;culos (camionetas y Autos).</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_estilo_col_1\">\r\n<div class=\"estilo_col_1\">\r\n<div class=\"titulo\">MISI&Oacute;N</div>\r\n<div class=\"detalle\"><span>Brindar soluciones y servicios que apoyen la gesti&oacute;n de las organizaciones y empresas, principalmente a los procesos de toma de decisiones</span>.</div>\r\n</div>\r\n<div class=\"estilo_col_1\">\r\n<div class=\"titulo\">VISI&Oacute;N</div>\r\n<div class=\"detalle\"><span>Ser una empresa l&iacute;der que utilice la informaci&oacute;n eficazmente de cada organizaci&oacute;n contribuyendo al desarrollo de la misma,&nbsp; brindando &nbsp;soluciones de avanzada e implementar procesos de continua investigaci&oacute;n que nos permitan posicionarnos como la empresa l&iacute;der en nuestro rubro.</span></div>\r\n</div>\r\n<div class=\"estilo_col_1\">\r\n<div class=\"titulo\">FILOSOF&Iacute;A</div>\r\n<div class=\"detalle\"><span>Adquisici&oacute;n constante de tecnolog&iacute;a de punta y capacitaci&oacute;n permanente de personal, para proporcionar un servicio de calidad total. Cada Profesional especialista en su rubro garantizar&aacute; la calidad del trabajo a servir.</span></div>\r\n</div>\r\n</div>'),('1217281314092901243444OC','<div class=\"ctn_global\">\r\n<div class=\"ctn_izq_50\">\r\n<ul>\r\n<li>03 Ingenieros civiles.</li>\r\n<li>\r\n<p>02 Ingenieros Ge&oacute;grafos, 01 Bachiller.</p>\r\n</li>\r\n<li>\r\n<p>02 Ingenieros Hidr&aacute;ulicos.</p>\r\n</li>\r\n<li>\r\n<p>01 Economista.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_dere_50\">\r\n<ul>\r\n<li>01 Ingeniero Agr&iacute;cola.</li>\r\n<li>\r\n<p>01 Ingeniero Agr&oacute;nomo.</p>\r\n</li>\r\n<li>\r\n<p>01 Arquitecto.</p>\r\n</li>\r\n<li>\r\n<p>Y otros profesionales.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>'),('1217281314093005175575VC','<div class=\"ctn_global\">\r\n<ul>\r\n<li>Determinar ubicaci&oacute;n para construcciones: centros m&eacute;dicos, supermercados, escuelas, &aacute;reas verdes, entre otros.</li>\r\n<li>\r\n<p>Determinar zonas ambientales: potenciales.</p>\r\n</li>\r\n<li>\r\n<p>Uso del territorio, atractivo tur&iacute;stico y econ&oacute;mico (recaudaci&oacute;n de fondos).</p>\r\n</li>\r\n<li>\r\n<p>Zonas de equipamiento, servicios, protecci&oacute;n social.</p>\r\n</li>\r\n<li>\r\n<p>Monitoreo con im&aacute;genes satelitales, planos para la focalizaci&oacute;n de recursos de su empresa, entre otros</p>\r\n</li>\r\n</ul>\r\n<div class=\"clear\">&nbsp;</div>\r\n</div>'),('12172813140930052402U5UO','<p><strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> ofrece servicios y consultor&iacute;a de topograf&iacute;a, cartograf&iacute;a, Geodesia y sistemas de informaci&oacute;n geogr&aacute;fica. Este abanico de servicios nos permite abarcar todo el proceso relacionado con la informaci&oacute;n geogr&aacute;fica, desde la toma de datos de campo, hasta la edici&oacute;n del mapa o la publicaci&oacute;n de geoda tos en internet o DVD. Desde los servicios m&aacute;s cl&aacute;sicos de topograf&iacute;a, apoyados en la tecnolog&iacute;a m&aacute;s avanzada de l&aacute;ser y posicionamiento por sat&eacute;lite, hasta los servicios m&aacute;s innovadores.<br /> <strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> ofrece un amplio abanico de soluciones.</p>'),('1217281314093005434563XL','<div class=\"ctn_global\">\r\n<div class=\"ctn_izq_img_dere\">Los sistemas de informaci&oacute;n geogr&aacute;fica ofrecen soluci&oacute;n a la gesti&oacute;n territorial y a cualquier proceso de negocio que requiera el manejo de datos geogr&aacute;ficos, enfocados a manejo y explotaci&oacute;n de informaci&oacute;n, cuyo objetivo es brindar an&aacute;lisis eficiente para la toma de decisiones, usando como herramientas tecnol&oacute;gicas Sistemas de Informaci&oacute;n Geogr&aacute;ficos, Sistemas enfocados a Inteligencia de Negocios y Tableros de Control (DashBoards).\r\n<div class=\"clear center pding_top_10 pding_b_10\"><span class=\"celeste bold\">Servicio personalizado:</span></div>\r\nActuaciones topogr&aacute;ficas personalizadas seg&uacute;n las necesidades de cada obra dependiendo siempre de la direcci&oacute;n de obra y las necesidades de la misma. <br /> <br />\r\n<div class=\"clear h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/presentacion-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\"> Presentaci&oacute;n:</span> El producto topogr&aacute;fico entregado se presenta de forma clara y precisa facilitando tanto la lectura de los datos como la representaci&oacute;n de los mismos.</div>\r\n</div>\r\n<div class=\"clear  h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/presicion-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\"> Precisi&oacute;n:</span> Garant&iacute;a de precisi&oacute;n de los datos mediante los aparatos y el respaldo de una marca puntera como es Leica.</div>\r\n</div>\r\n<div class=\"clear  h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/entorno-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\"> Entorno:</span> Nuestros diferentes aparatos topogr&aacute;ficos nos permiten optimizar la medici&oacute;n de cualquier tipo de terreno y obra.</div>\r\n</div>\r\n<div class=\"clear  h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/operatividad-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\"> Operatividad:</span> Posibilidad in-situ de trasladar la informaci&oacute;n del plano a pie de obra.</div>\r\n</div>\r\n<div class=\"clear  h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/instrumentos-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\">Instrumentos:</span> Los aparatos con su software espec&iacute;fico para cada tipo de obra controla los equipos terrestres, GPS y el enlace geom&aacute;tico constante con la oficina t&eacute;cnica proporciona informaci&oacute;n en tiempo real.</div>\r\n</div>\r\n<div class=\"clear  h_100\">\r\n<div class=\"float_l wid_110\"><img src=\"/imagen/servicio-topografia.jpg\" alt=\"\" width=\"100\" height=\"71\" /></div>\r\n<div class=\" m_l_120\"><span class=\"celeste bold\">Servicio R&aacute;pido:</span> La intercomunicaci&oacute;n de todo el sistema permite optimizar al m&aacute;ximo la velocidad de trabajo y la de respuesta en caso de urgencia.</div>\r\n</div>\r\n<br />\r\n<div class=\"clear center  pding_top_10 pding_b_10\"><span class=\"celeste bold\">Topograf&iacute;a del terreno</span></div>\r\n<div class=\"ctn_izq_50\">\r\n<ul>\r\n<li>Parcelas r&uacute;sticas y urbanas.</li>\r\n<li>Auscultaci&oacute;n.</li>\r\n<li>Hidrograf&iacute;a.</li>\r\n<li>Complejos industriales.</li>\r\n<li>Instalaciones deportivas.</li>\r\n<li>Explotaciones agr&iacute;colas.</li>\r\n<li>Arqueolog&iacute;a.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_dere_50\">\r\n<ul>\r\n<li>Periciales.</li>\r\n<li>Miner&iacute;a.</li>\r\n<li>Vuelos.</li>\r\n<li>T&uacute;neles.</li>\r\n<li>Superestructuras.</li>\r\n<li>etc.</li>\r\n</ul>\r\n</div>\r\n<div class=\"clear center  pding_top_10 pding_b_10\">\r\n<p>Todos nuestros productos dependiendo del servicio brindado se enfocan a dar un servicio integral que genere continuidad en el analisis establecido.</p>\r\n</div>\r\n<ul>\r\n<li>Consultor&iacute;a en proyectos de implantaci&oacute;n y desarrollos GIS.</li>\r\n<li>Venta de Cartograf&iacute;a Comercial.</li>\r\n<li>Servicios de Geomarketing y redes de transporte y distribuci&oacute;n.</li>\r\n<li>Servicio de Geocodificaci&oacute;n de bases de datos.</li>\r\n<li>Desarrollo e Integraci&oacute;n de aplicaciones geogr&aacute;fica.</li>\r\n<li>Bussiness Inteligent, Reporting, Cuadros de Mando.</li>\r\n<li>Servicio de Alojamiento de Mapas en internet.</li>\r\n</ul>\r\n</div>\r\n<!--Fin Lado Izquierda -->\r\n<div class=\"ctn_Dere_img_dere\">\r\n<p><img src=\"/imagen/servicios_sistemas_informacion_geografica.gif\" alt=\"\" width=\"200px\" height=\"220\" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"/imagen/implantacion_desarrollos_GIS.gif\" alt=\"\" width=\"250\" height=\"400\" /></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>'),('12172813140930222322VDY5','<div>El SIG son utilizados con mayor frecuencia en actividades empresariales porque nos permite cartografiar a nuestros clientes y estudiar la ubicaci&oacute;n de futuros y/o potenciales, as&iacute; como la posibilidad de analizar geogr&aacute;ficamente mercados, la competencia y su inserci&oacute;n geogr&aacute;fica, el estudio de ubicar nuevas sucursales, son algunas de las m&aacute;s importantes aplicaciones de los SIG.<br /><br /> <strong>CISANTIAGO</strong> ofrece servicios de consultor&iacute;a e investigaci&oacute;n en marketing empresarial a entidades financieras y compa&ntilde;&iacute;as nacionales o extranjeras que requieran de informaci&oacute;n basada en tecnolog&iacute;a de mapeo y bases de datos.<br /> Sus servicios se orientan a desarrollar y potenciar las decisiones que las empresas tomen respecto a la identificaci&oacute;n de la demanda, manejo de bases de datos, planeamiento de actividades por sectores geogr&aacute;ficos, entre otros. Entre los servicios que ofrece cuentan:</div>\r\n<p><br /><br /></p>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Bases de datos catastrales.</li>\r\n<li>Estudios de mercado.</li>\r\n<li>An&aacute;lisis de mercados y zonas de influencia.</li>\r\n<li>Zonificaci&oacute;n de ventas y Geomarketing.</li>\r\n<li>SIG bancario</li>\r\n<li>SIG empresarial de ventas y distribuci&oacute;n.</li>\r\n<li>Mapas de densidad de clientes.</li>\r\n<li>Mapas de ubicaci&oacute;n de cajeros autom&aacute;ticos.</li>\r\n<li>Verificaci&oacute;n domiciliaria y comercial.</li>\r\n<li>Georreferenciaci&oacute;n de clientes y competencia.</li>\r\n<li>Geomarketing: distribuci&oacute;n de publicidad: buzoneo.</li>\r\n<li>Cuadros de mando de negocio: par&aacute;metros de negocio por unidad territorial.</li>\r\n<li>Generaci&oacute;n de &aacute;reas comerciales.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/servicios_geomarketing.gif\" alt=\"\" width=\"200\" height=\"180\" /></div>'),('121728131409302223419QS1','<p>Tenemos como objeto social: la prevenci&oacute;n y mitigaci&oacute;n de desastres la gesti&oacute;n de proyectos de habilitaci&oacute;n urbana el catastro e ingenier&iacute;a de valuaciones la auditor&iacute;a y demarcaci&oacute;n territorial el manejo y ordenamiento de cuencas la planificaci&oacute;n territorial y proyectos la elaboraci&oacute;n de cartograf&iacute;a en general en base de planos, mapas, fotograf&iacute;as a&eacute;reas, im&aacute;genes satelitales y base de datos alfanum&eacute;ricos geogr&aacute;ficos asesor&iacute;a y consultor&iacute;a en materia minera, industrial, agricultura, salud, transporte y educaci&oacute;n y estudios hidrol&oacute;gicos, climatol&oacute;gicos y geol&oacute;gicos.</p>\r\n<p align=\"center\"><img src=\"/imagen/servicios_geomarketing_clip_image002.gif\" alt=\"\" width=\"564\" height=\"236\" /></p>\r\n<p>Dentro de esta marco legal y situacional, CISANTIAGO ofrece a las municipalidades interesadas en promover y administrar una ocupaci&oacute;n planificada del territorio y la localizaci&oacute;n de las actividades econ&oacute;micas; el desarrollo, aplicaci&oacute;n y evaluaci&oacute;n de un plan de ordenamiento territorial ambientalmente sustentable con instrumentos de ordenamiento y orientaci&oacute;n adaptados a las condiciones socioecon&oacute;micas y culturales espec&iacute;ficas de cada realidad municipal.</p>\r\n<p align=\"center\"><img src=\"/imagen/servicios_geomarketing_clip_image002.jpg\" alt=\"\" width=\"628\" height=\"291\" /></p>\r\n<p>Entre los Servicios que ofrecemos son :</p>\r\n<div class=\"ctn_izq_50\">\r\n<ul>\r\n<li>Propuestas de Limites Distritales.</li>\r\n<li>Plan de Acondicionamiento Territorial.</li>\r\n<li>Estudios de Diagn&oacute;sticos de Zonificaci&oacute;n para la Demarcaci&oacute;n Territorial.</li>\r\n<li>Estudios Territoriales.</li>\r\n<li>Planes Urbanos.</li>\r\n<li>An&aacute;lisis y monitoreo de cuencas Hidrogr&aacute;ficas.</li>\r\n<li>Sistemas de Gesti&oacute;n Municipal.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_dere_50\"><img src=\"/imagen/ordenamiento_gestion_territorial.gif\" alt=\"\" width=\"250\" height=\"188\" /></div>'),('12172813140930222356LLOI','<p>El Catastro es el inventario de bienes inmuebles (terrenos, edificios, etc.), desde esta perspectiva, el catastro es considerado como un sistema de informaci&oacute;n, basado en la realidad inmobiliaria, como base para el desarrollo econ&oacute;mico y social, la administraci&oacute;n de las tierras, la planificaci&oacute;n urbana y rural, el monitoreo ambiental y el desarrollo local, regional y nacional, de esta manera se constituye entonces, en una herramienta fundamental para garantizar la ordenaci&oacute;n del territorio con fines de desarrollo, a trav&eacute;s de la adecuada, precisa y oportuna definici&oacute;n de los tres aspectos m&aacute;s relevantes de la propiedad inmobiliaria: descripci&oacute;n f&iacute;sica, situaci&oacute;n jur&iacute;dica y valor econ&oacute;mico , convirti&eacute;ndose de esta forma en la fuente primaria de datos del sistema de informaci&oacute;n territorial, el cual permitir&aacute; establecer una base com&uacute;n o red entre las distintas organizaciones p&uacute;blicas y privadas que produzcan informaci&oacute;n geogr&aacute;fica, cartogr&aacute;fica y catastral del territorio nacional.</p>\r\n<p align=\"center\"><img src=\"/imagen/catastro_urbano.gif\" alt=\"\" width=\"544\" height=\"384\" /></p>\r\n<p><br /><br />Entre los servicios que ofrece <strong>CISANTIAGO</strong> para los municipios son:</p>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Levantamiento Catastral y/o actualizaci&oacute;n automatizada de informaci&oacute;n de servicios (vialidad, redes de transporte, telefon&iacute;a, electricidad, salud, educaci&oacute;n etc.), necesarios para la Gesti&oacute;n Municipal.</li>\r\n<li>Generaci&oacute;n de base de datos catastrales provenientes del registro de la propiedad.</li>\r\n<li>Automatizaci&oacute;n de la Cartograf&iacute;a digital proveniente del levantamiento F&iacute;sico.</li>\r\n<li>Capacitaci&oacute;n e implementaci&oacute;n en sistemas catastrales.</li>\r\n<li>Dise&ntilde;o e implementaci&oacute;n de un Sistema de Informaci&oacute;n Catastral urbano de acuerdo a los requerimientos de los gobiernos locales.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/catrasto_urbano_municipal.gif\" alt=\"\" width=\"200\" height=\"194\" /></div>'),('12172813140930222412WPKH','<p>Un EIA es un procedimiento jur&iacute;dico, administrativo y t&eacute;cnico cuyo objetivo es estimar y evaluar la alteraci&oacute;n generada en el ambiente como consecuencia de un proyecto o actividad con el fin de determinar su viabilidad del punto de vista f&iacute;sico, biol&oacute;gico, socioecon&oacute;mico, jur&iacute;dico, etc. Toda obra implica un impacto en el ambiente: un cambio, positivo o negativo, en el medio receptor del proyecto. El EIA es una herramienta de gesti&oacute;n ambiental fundamental dentro de la planificaci&oacute;n y toma de decisiones ya que, previo a la ejecuci&oacute;n de un proyecto, emprendimiento o actividad permite evaluar y ponderar la dimensi&oacute;n de sus impactos en el medio para poder evitar, minimizar o compensar posibles da&ntilde;os. Incorpora las variables ambientales m&aacute;s significativas a lo largo de todo el ciclo del proyecto y de este modo incluye los costos ambientales al an&aacute;lisis de factibilidad.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"cnt_img_sola\"><img style=\"float: left;\" src=\"/imagen/estudios_impacto_ambiental_1.gif\" alt=\"\" width=\"250\" height=\"194\" /> <img style=\"float: right;\" src=\"/imagen/estudios_impacto_ambiental_2.gif\" alt=\"\" width=\"250\" height=\"194\" />\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>Al interpretar los impactos susceptibles de ser generados desde las etapas m&aacute;s tempranas del proyecto, ya sean negativos o positivos, se puede identificar aquellas alternativas que impliquen una mayor compatibilidad con el ambiente. El Estudio de Impacto Ambiental (EsIA) corresponde a la etapa t&eacute;cnica de la evaluaci&oacute;n que, de acuerdo al tipo de proyecto, puede incluir un Plan de Gesti&oacute;n Ambiental y un Programa de Monitoreo. Se basa - dentro de un determinado marco legal - en la descripci&oacute;n de las actividades propias del proyecto y de su l&iacute;nea de base (medio sin proyecto), y en la descripci&oacute;n y evaluaci&oacute;n de los impactos identificados. Esto permite tomar medidas de prevenci&oacute;n, mitigaci&oacute;n o compensaci&oacute;n as&iacute; como realizar un seguimiento de las tendencias a futuro una vez que la obra est&eacute; operando. Un equipo interdisciplinario formado por profesionales de distintas especialidades como gestores ambientales, bi&oacute;logos, ge&oacute;logos, antrop&oacute;logos, qu&iacute;micos, etc. son los encargados de llevar adelante esta EIA, con el objeto de cumplir con los lineamientos del proyecto bas&aacute;ndose en los principios rectores del desarrollo sustentable.</p>'),('12172813140930222427LUDT','<p>La generaci&oacute;n y disposici&oacute;n de los residuos es conocida como una de las problem&aacute;ticas ambientales m&aacute;s importantes, tanto a nivel local como mundial. El problema es muy complejo debido al crecimiento de la poblaci&oacute;n y del consumo, y a la din&aacute;mica de los ecosistemas receptores.<br /><br /> Las consecuencias sobre el medio f&iacute;sico y biol&oacute;gico as&iacute; como sobre la salud son graves si no se lleva a cabo un tratamiento adecuado. A nivel empresa, industria o comunidad, los residuos se convierten a corto y largo plazo en un problema que de no ser prevenido, trae serios problemas en la salud de la poblaci&oacute;n y en el ambiente.</p>\r\n<div class=\"clear\">Gestionar los residuos de forma integral implica un an&aacute;lisis y control en todo su ciclo: desde la generaci&oacute;n, el almacenamiento, la recolecci&oacute;n, el transporte y el procesamiento, hasta la disposici&oacute;n final. Una gesti&oacute;n integral implica, adem&aacute;s, la selecci&oacute;n y aplicaci&oacute;n de t&eacute;cnicas, tecnolog&iacute;as y programas de manejo acordes con objetivos espec&iacute;ficos relacionados con pol&iacute;ticas de reducci&oacute;n, reciclaje y reutilizaci&oacute;n. Estas se basan en criterios sanitarios, ambientales y econ&oacute;micos. Con simples t&eacute;cnicas de minimizaci&oacute;n, recolecci&oacute;n, acopio y tratamiento se puede reducir significativamente el impacto ambiental y hasta lograr convertir los desechos en un subproducto para la venta. As&iacute; se evitan costos, riesgos para la salud y el ecosistema y se aprovechan mejor recursos energ&eacute;ticos y materias primas. La poblaci&oacute;n es cada vez m&aacute;s consciente de los problemas que implica la contaminaci&oacute;n por basurales a cielo abierto, efluentes industriales, residuos peligrosos, etc. En especial en lugares de alta biodiversidad o valor paisaj&iacute;stico donde el deterioro del medio (calidad del aire, agua, suelo y paisaje), a parte de los efectos directos sobre la salud, perjudica el funcionamiento de las econom&iacute;as regionales. Para hacer frente a esta problem&aacute;tica la educaci&oacute;n y capacitaci&oacute;n ambiental, el cambio en las pr&aacute;cticas y costumbres de consumo, la incorporaci&oacute;n de tecnolog&iacute;as y t&eacute;cnicas para recolectar, tratar y disponer los residuos, son herramientas de gesti&oacute;n que pueden estar combinadas de acuerdo a necesidades espec&iacute;ficas dentro de un Programa de Gesti&oacute;n Integral de Residuos. Estos programas se dise&ntilde;an a medida dependiendo de las caracter&iacute;sticas de la comunidad o de la organizaci&oacute;n que los solicite.<br /><br /> <strong>CISANTIAGO</strong> brinda soluciones ambientales orientadas para mejorar la calidad de vida de los habitantes los cuales son:</div>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul id=\"vinetarectanguloverde\">\r\n<li>Proyectos de Inversi&oacute;n P&uacute;blica en el marco del SNIP.</li>\r\n<li>Expedientes T&eacute;cnicos de Proyectos de Inversi&oacute;n P&uacute;blica.</li>\r\n<li>Estudios de Impacto Ambiental de proyectos de infraestructura de residuos s&oacute;lidos.</li>\r\n<li>Proyectos de Infraestructura para gesti&oacute;n de residuos s&oacute;lidos: rellenos sanitarios, plantas de tratamiento, recuperaci&oacute;n y reciclaje.</li>\r\n<li>Plan de recuperaci&oacute;n de botaderos.</li>\r\n<li>Proyectos de Biodigestores.</li>\r\n<li>Planes Integrales de Gesti&oacute;n Ambiental de Residuos S&oacute;lidos (PIGARS).</li>\r\n<li>Planes Distritales de Gesti&oacute;n Ambiental de Residuos S&oacute;lidos (PDGARS).</li>\r\n<li>Estudios de caracterizaci&oacute;n de residuos s&oacute;lidos (ECRS).</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/proyectos_Biodigestores.gif\" alt=\"\" width=\"200\" height=\"155\" /></div>\r\n<p><br /><br /></p>\r\n<div class=\"clear\"><strong>CISANTIAGO</strong> es l&iacute;der en evaluaciones de Impacto ambientales en formulaci&oacute;n, evaluaci&oacute;n y promoci&oacute;n de proyectos de desarrollo sustentable. Conocemos a fondo la estructura econ&oacute;mica y social de una amplia gama de sectores y regiones y, adem&aacute;s, tenemos una capacidad singular para dise&ntilde;ar pol&iacute;ticas sectoriales y transversales desde una concepci&oacute;n multidisciplinaria integradora de los enfoques econ&oacute;mico, social, ambiental, comunicacional y de ingenier&iacute;a. Estamos a disposici&oacute;n de las empresas privadas, entidades p&uacute;blicas y organismos cooperantes para servirlos con las mejores pr&aacute;cticas de consultor&iacute;a y asesor&iacute;a en:</div>\r\n<p><br /><br /></p>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>EIA de Proyectos de Carreteras.</li>\r\n<li>EIA de Proyectos Portuarios y Aeroportuarios.</li>\r\n<li>EIA de Proyectos Hidroenerg&eacute;ticos .</li>\r\n<li>EIA de Proyectos Petroleros.</li>\r\n<li>EIA de Proyectos de Energ&iacute;a Renovable .</li>\r\n<li>EIA de planes de competitividad sectorial y de productos.</li>\r\n<li>Planes de desarrollo Regional y Local.</li>\r\n<li>Planes de Integraci&oacute;n Macroregional .</li>\r\n<li>Planes de Desarrollo de Cuencas .</li>\r\n<li>Diagn&oacute;sticos Ambientales.</li>\r\n<li>Cuantificaci&oacute;n y Mitigaci&oacute;n de Riesgos Ambientales .</li>\r\n<li>Estudios de Integraci&oacute;n Paisaj&iacute;stica.</li>\r\n<li>Estudios de Sostenibilidad Ambiental .</li>\r\n<li>Estudios de Factores y Condicionantes Ambientales de Proyectos nuevos .</li>\r\n<li>Dise&ntilde;o de Pol&iacute;ticas Ambientales .</li>\r\n<li>Manejo de Conflictos Medioambientales y facilitaci&oacute;n de Soluciones .</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/Proyectos_Petroleros.gif\" alt=\"\" width=\"200\" height=\"125\" /></div>'),('12172813140930222438D111','<p>La educaci&oacute;n ambiental es un proceso continuo y permanente que busca fortalecer en las personas el conocimiento, la actitud y la pr&aacute;ctica de acciones conscientes hacia el desarrollo sostenible. Para ello Consorcio Inmobiliaria Santiago S.A.C. se ha especializado en:</p>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Educaci&oacute;n ambiental en instituciones educativas.</li>\r\n<li>Formaci&oacute;n y fortalecimiento de comit&eacute;s ambientales escolares y vecinales.</li>\r\n<li>Elaboraci&oacute;n de recursos comunicacionales.</li>\r\n<li>Capacitaci&oacute;n a docentes.</li>\r\n<li>Capacitaci&oacute;n a docentes.</li>\r\n<li>Implementaci&oacute;n de buenas pr&aacute;cticas ambientales.</li>\r\n<li>Organizaci&oacute;n de concursos ambientales.</li>\r\n<li>Talleres y campa&ntilde;as de sensibilizaci&oacute;n ambiental.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/educacion-ambiental.gif\" alt=\"\" width=\"200\" height=\"187\" /></div>\r\n<div>\r\n<h2>Residuos Solidos</h2>\r\nLa gesti&oacute;n de residuos se refiere al control y manejo de todo el ciclo de los residuos, desde la generaci&oacute;n, separaci&oacute;n en la fuente, almacenamiento, recolecci&oacute;n selectiva, transporte, tratamiento, reciclaje, transferencia hasta la disposici&oacute;n final; utilizando tecnolog&iacute;a adecuada y procedimientos que impliquen el menor impacto negativo. IPES, trabaja la gesti&oacute;n de residuos en base al cumplimiento de la legislaci&oacute;n ambiental, con un enfoque preventivo de minimizaci&oacute;n de residuos a trav&eacute;s de las 3R (reducci&oacute;n, reuso y reciclaje), involucrando a diversos actores sociales, p&uacute;blicos y privados.\r\n<p>Para ello IPES se ha especializado en:</p>\r\n</div>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Caracterizaci&oacute;n de residuos.</li>\r\n<li>Estudios de mercado de residuos.</li>\r\n<li>Elaboraci&oacute;n de Planes Integrales de Gesti&oacute;n de Residuos S&oacute;lidos.</li>\r\n<li>Dise&ntilde;o de infraestructura de manejo de residuos.</li>\r\n<li>Dise&ntilde;o e implementaci&oacute;n de sistemas de recolecci&oacute;n selectiva.</li>\r\n<li>Implementaci&oacute;n de Microempresas de Gesti&oacute;n Ambiental (MEGA).</li>\r\n<li>Gesti&oacute;n de aceites usados.</li>\r\n<li>Gesti&oacute;n de residuos electr&oacute;nicos.</li>\r\n<li>Implementaci&oacute;n y administraci&oacute;n de Bolsas de Residuos.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/residuos-solidos.gif\" alt=\"\" width=\"200\" height=\"166\" /></div>\r\n<div>\r\n<div class=\"clear\">\r\n<h2>Gobiernos</h2>\r\n<p>La naturaleza de Consorcio Inmobiliaria Santiago S.A.C. le permite ejecutar una gran diversidad de proyectos para el Sector P&uacute;blico, para esto identifica problemas y propone soluciones eficientes para m&uacute;ltiples campos del desarrollo estatal, entre los cuales se encuentran:</p>\r\n<br />\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Planificaci&oacute;n y ordenamiento territorial.</li>\r\n<li>Censos, demograf&iacute;a y poblaci&oacute;n.</li>\r\n<li>Delimitaci&oacute;n y titulaci&oacute;n territorial.</li>\r\n<li>Tributaci&oacute;n Estatal, Regional o Municipal.</li>\r\n<li>Sistematizaci&oacute;n de procesos Registrales.</li>\r\n<li>Zonificaci&oacute;n econ&oacute;mica.</li>\r\n<li>Prevenci&oacute;n y atenci&oacute;n de desastres.</li>\r\n<li>Evaluaci&oacute;n y asignaci&oacute;n de riesgos.</li>\r\n<li>Proyectos Ambientales.</li>\r\n<li>Evaluaci&oacute;n y supervisi&oacute;n de proyectos de diversas &iacute;ndoles .</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/prevencion-atencion-desastres.gif\" alt=\"\" width=\"200\" height=\"168\" /></div>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"clear\">\r\n<h2>Mineria</h2>\r\n<p>Consorcio Inmobiliaria Santiago S.A.C. realiza servicios orientados a la exploraci&oacute;n, explotaci&oacute;n y administraci&oacute;n de proyectos mineros, especializ&aacute;ndose en proyectos que requieran topograf&iacute;a y cartograf&iacute;a digital. Adem&aacute;s, el &aacute;rea de Medio Ambiente de Consorcio Inmobiliaria Santiago S.A.C. desarrolla estudios que buscan definir el equilibrio entre las inversiones y los controles sobre la contaminaci&oacute;n del medio ambiente, resolviendo temas como: efluvios mineros hacia r&iacute;os y cursos de agua, aguas &aacute;cidas, producci&oacute;n de residuos, relaves y alteraci&oacute;n del paisaje, entre otros, para lo cual desarrolla estudios de EIA, PAMA, Evaluaciones Ambientales, Prospecciones y otros relacionados. Entre los servicios brindados destacan:</p>\r\n<br />\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Servicios de Fotogrametr&iacute;a y control terrestre.</li>\r\n<li>Levantamientos Topogr&aacute;ficos.</li>\r\n<li>Desarrollo de Ortofotos y DTM.</li>\r\n<li>Elaboraci&oacute;n de Sistemas SIG de monitoreo y control.</li>\r\n<li>Proyectos Medio Ambientales (EIA, PAMA, entre otros).</li>\r\n<li>Procesamiento de Im&aacute;genes Satelitales (Aster, Iconos, Quick bird, Spot).</li>\r\n<li>Desarrollo de Mapas Geol&oacute;gicos.</li>\r\n<li>Servicios de Prospecci&oacute;n y Evaluaci&oacute;n de Cierre de minas.</li>\r\n<li>Elaboracion de Sistemas SIG para Catastro Minero.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/levantamiento-topografico.gif\" alt=\"\" width=\"200\" height=\"187\" /></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"clear\">\r\n<h2>Geomarketing</h2>\r\n<p>Consorcio Inmobiliaria Santiago S.A.C. ofrece servicios de consultor&iacute;a e investigaci&oacute;n en marketing empresarial a entidades financieras y compa&ntilde;&iacute;as nacionales o extranjeras que requieran de informaci&oacute;n basada en tecnolog&iacute;a de mapeo y bases de datos.</p>\r\n<p><br /> Sus servicios se orientan a desarrollar y potenciar las decisiones que las empresas tomen respecto a la identificaci&oacute;n de la demanda, manejo de bases de datos, planeamiento de actividades por sectores geogr&aacute;ficos, entre otros. Entre los servicios que ofrece cuentan:</p>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Bases de datos catastrales.</li>\r\n<li>Estudios de mercado.</li>\r\n<li>An&aacute;lisis de mercados y zonas de influencia.</li>\r\n<li>Zonificaci&oacute;n de ventas y Geomarketing.</li>\r\n<li>SIG bancario.</li>\r\n<li>SIG empresarial de ventas y distribuci&oacute;n.</li>\r\n<li>Mapas de densidad de clientes.</li>\r\n<li>Mapas de ubicaci&oacute;n de cajeros autom&aacute;ticos.</li>\r\n<li>Verificaci&oacute;n domiciliaria y comercial.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/estudio-mercado.gif\" alt=\"\" width=\"200\" height=\"167\" /></div>\r\n</div>'),('1217281314093022245326HR','<p>Dentro de los trabajos habituales realizados en <strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> est&aacute;n los relacionados con la ordenaci&oacute;n del territorio. En general la planificaci&oacute;n territorial y urban&iacute;stica se sustenta en an&aacute;lisis previos sobre el territorio en su conjunto.</p>\r\n<p>El equipo t&eacute;cnico realiza inventarios y diagn&oacute;sticos de la situaci&oacute;n actual del medio f&iacute;sico y de la funcionalidad ecol&oacute;gica del mismo. En funci&oacute;n de las caracter&iacute;sticas de importancia, singularidad, rareza, vulnerabilidad, fragilidad, conectividad y complejidad, se elaboran valoraciones jerarquizadas y se representan gr&aacute;ficamente en mapas tem&aacute;ticos y de valoraci&oacute;n.</p>\r\n<p>Se realizan tambi&eacute;n an&aacute;lisis paisaj&iacute;sticos, inventarios de bienes de inter&eacute;s cultural, de patrimonio hist&oacute;rico-art&iacute;stico y arqueol&oacute;gico.</p>\r\n<p>Esta informaci&oacute;n se representa gr&aacute;ficamente, especialmente los relativos al an&aacute;lisis del paisaje, as&iacute; como los elementos de apoyo para su valoraci&oacute;n</p>\r\n<p>Se contemplan an&aacute;lisis de riesgos naturales, con determinaci&oacute;n de zonas inundables y clasificaci&oacute;n de especial protecci&oacute;n por riesgos de erosi&oacute;n, deslizamientos, erosi&oacute;n, subsidencias, etc. Se representan gr&aacute;ficamente en funci&oacute;n de la valoraci&oacute;n jerarquizada e importancia de los mismos.</p>\r\n<p>Estudios socioecon&oacute;micos, de infraestructuras (abastecimiento, tratamiento y gesti&oacute;n de aguas y residuos, v&iacute;as de comunicaci&oacute;n, dotaciones,...), completan el an&aacute;lisis previo que sirve de base para la posterior planificaci&oacute;n.</p>'),('1217281314093022250887I1','<p>Tenemos por objeto social: la evaluaci&oacute;n, estudio y monitoreo ambiental el ecoturismo y reactivaci&oacute;n econ&oacute;mica (PAMA) proyectos de saneamiento ambiental planificaci&oacute;n y manejo de &aacute;reas verdes la auditor&iacute;a ambiental restauraci&oacute;n y reforestaci&oacute;n de &aacute;reas intervenidas cursos, seminarios y talleres acerca de la conservaci&oacute;n de la calidad ambiental, uso sostenible de los recursos naturales y la educaci&oacute;n ambiental la comercializaci&oacute;n, distribuci&oacute;n, representaci&oacute;n comercial, importaci&oacute;n y exportaci&oacute;n de productos y subproductos derivados de los recursos naturales la asesor&iacute;a y consultor&iacute;a en materia minera, industrial, agricultura, salud, transporte y educaci&oacute;n y estudios hidrol&oacute;gicos, climatol&oacute;gicos y geol&oacute;gicos.</p>'),('12172813140930222523BDHL','<p>Ordenaci&oacute;n sistem&aacute;tica, documentada, peri&oacute;dica y objetiva de la eficacia de la organizaci&oacute;n del Sistema de Gesti&oacute;n y de procedimientos destinados a la protecci&oacute;n del Ambiente y el Territorio. Est&aacute; centrado en el Impacto Territorial-Ambiental de todo proceso empresarial con el fin de enjuiciar, si procede y ayudar a que la organizaci&oacute;n y su funcionamiento sean conformes con lo dispuesto por quien tiene el poder leg&iacute;timo para disponerlo.</p>'),('12172813141001023300OF8I','<div>Contamos con profesionales con mas de 20 a&ntilde;os de experiencia en este tipo de rubro. Brindamos servicio de elaboraci&oacute;n de expedientes t&eacute;cnicos y ejecuci&oacute;n. Tipos de Reservorio:</div>\r\n<div class=\"ctn_izq_img_dere\">\r\n<ul>\r\n<li>Reservorio de tipo dique con Revestimiento Pl&aacute;stico.</li>\r\n<li>Reservorio Escavado.</li>\r\n<li>Reservorio Estanque.</li>\r\n<li>Reservorio Envase.</li>\r\n<li>Reservorio Tipo Escalonado.</li>\r\n<li>Defensas Ribere&ntilde;os.</li>\r\n</ul>\r\n</div>\r\n<div class=\"ctn_Dere_img_dere\"><img src=\"/imagen/defensas_riberenos.gif\" alt=\"\" width=\"200\" height=\"150\" /></div>\r\n<p>Riego por aspersi&oacute;n y goteo:</p>\r\n<div>\r\n<ul>\r\n<li>El Riego y las Nuevas Tecnolog&iacute;as.</li>\r\n<li>Caracteristicas del Riego por Goteo.</li>\r\n<li>La Imparable Difusi&oacute;n del Goteo.</li>\r\n<li>Ventajas del Riego por Goteo.</li>\r\n<li>Inconvenientes del Riego por Goteo.</li>\r\n<li>Instalaciones Necesarias para el Riego por Goteo.</li>\r\n</ul>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"red bold center\">\r\n<h2>Tipos de Presas:</h2>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"clear\"><span class=\"celeste bold\">Presas de Gravedad:</span><br /> <br /> Las presas de gravedad son estructuras de hormig&oacute;n de secci&oacute;n triangular; la base es ancha y se va estrechando hacia la parte superior; la cara que da al embalse es pr&aacute;cticamente vertical. Vistas desde arriba son rectas o de curva suave. La estabilidad de estas presas radica en su propio peso. Es el tipo de construcci&oacute;n m&aacute;s duradero y el que requiere menor mantenimiento. Su altura suele estar limitada por la resistencia del terreno. Un ejemplo de este tipo de presas es la presa Grande Dixence, en Suiza (1962), la cual tiene una altura de 284 m y es una de las m&aacute;s grandes del mundo.<br /> <span class=\"celeste bold\"><br /> Presas de B&oacute;veda:</span><br /> <br /> Este tipo de presa utiliza los fundamentos te&oacute;ricos de la b&oacute;veda. La curvatura presenta una convexidad dirigida hacia el embalse, con el fin de que la carga se distribuya por toda la presa hacia los extremos. En condiciones favorables, esta estructura necesita menos hormig&oacute;n que la de gravedad, pero es dif&iacute;cil encontrar emplazamientos donde se puedan construir.<br /> <span class=\"celeste bold\"><br /> Presas de Contrafuertes:</span><br /> <br /> Las presas de contrafuertes tienen una pared que soporta el agua y una serie de contrafuertes o pilares, de forma triangular, que sujetan la pared y transmiten la carga del agua a la base. Hay varios tipos de presa de contrafuertes: los m&aacute;s comunes son de planchas uniformes y de b&oacute;vedas m&uacute;ltiples.\r\n<ul>\r\n<li>En las de planchas uniformes el elemento que contiene el agua es un conjunto de planchas que cubren la superficie entre los contrafuertes.</li>\r\n<li>En las de b&oacute;vedas m&uacute;ltiples, &eacute;stas permiten que los contrafuertes est&eacute;n m&aacute;s espaciados.</li>\r\n</ul>\r\nEstas presas precisan de un 35 a un 50% del hormig&oacute;n que necesitar&iacute;a una de gravedad de tama&ntilde;o similar aunque a pesar del ahorro de hormig&oacute;n las presas de contrafuertes no son siempre m&aacute;s econ&oacute;micas que las de gravedad, ya que el costo de las complicadas estructuras para forjar el hormig&oacute;n y la instalaci&oacute;n de refuerzos de acero suele equivaler al ahorro en materiales de construcci&oacute;n. Este tipo de presa es necesario en terrenos poco estables.<br /> <span class=\"celeste bold\"><br /> Presas de Elementos sin Trabar:</span><br /> <br /> Las presas de tierra y piedra utilizan materiales naturales con la m&iacute;nima transformaci&oacute;n, aunque la disponibilidad de materiales utilizables en los alrededores condiciona la elecci&oacute;n de este tipo de presa. El desarrollo de las excavadoras y otras grandes m&aacute;quinas ha hecho que este tipo de presas compita en costos con las de hormig&oacute;n. La escasa estabilidad de estos materiales obliga a que la anchura de la base de este tipo de presas sea de cuatro a siete veces mayor que su altura. La cuant&iacute;a de filtraciones es inversamente proporcional a la distancia que debe recorrer el agua; por lo tanto, la ancha base debe estar bien asentada sobre un terreno cimentado. Las presas de elementos sin trabar pueden estar construidas con materiales impermeables en su totalidad, como arcilla, o estar formadas por un n&uacute;cleo de material impermeable reforzado por los dos lados con materiales m&aacute;s permeables, como arena, grava o roca, el n&uacute;cleo debe extenderse hasta mucho m&aacute;s abajo de la base para evitar filtraciones.<br /><br />\r\n<div class=\"red bold center\">\r\n<h2>Defensas Ribere&ntilde;as:</h2>\r\n</div>\r\n<br /> La protecci&oacute;n contra las inundaciones incluye, tanto los medios estructurales, como los no estructurales, que dan protecci&oacute;n o reducen los riesgos de inundaci&oacute;n.<br /><br /> Las medidas estructurales incluyen las represas y reservorios, modificaciones a los canales de los r&iacute;os por otros m&aacute;s amplios, defensas ribere&ntilde;as, depresiones para desbordamiento, cauces de alivio, obras de drenaje y el mantenimiento y limpieza de los mismo para evitar que se obstruyan.<br /> <br />Las medidas no estructurales consisten en el control del uso de los terrenos aluviales mediante zonificaci&oacute;n, los reglamentos para su uso, las ordenanzas sanitarias y de construcci&oacute;n, y la reglamentaci&oacute;n del uso de la tierra de las cuencas hidrogr&aacute;ficaspara no ocupar los cauces y terrenos aluviales de r&iacute;os y ramblas con edificaciones o barreras.<br /><br /> Las defensas ribere&ntilde;as son estructuras construidas para proteger de las crecidas de los r&iacute;os las &aacute;reas aleda&ntilde;as a estos cursos de agua.<br /><br /> La forma y el material empleado en su construcci&oacute;n var&iacute;a, fundamentalmente en funci&oacute;n de:<br /> Los materiales disponibles localmente El tipo de uso que se da a las &aacute;reas aleda&ntilde;as. Generalmente en &aacute;reas rurales se usan diques de tierra, mientras que en las &aacute;reas urbanas se utilizan diques de hormig&oacute;n.</div>'),('121728131410010233217TS3','<p>Contamos con profesionales que tienen m&aacute;s de 20 a&ntilde;os de experiencia ejecutando obras hidr&aacute;ulicas con ello garantizamos la calidad de obra. <br /><br /> Contamos con profesionales que ejecutaron canales de riego, reservorios de concreto armado, de concreto cicl&oacute;peo, y de geomembrana. Asimismo ejecutaron presas, defensas ribere&ntilde;as.</p>'),('12172813141001023334GSCD','<p>Contamos con Ingenieros Especialistas de carreteras con mas 10 a&ntilde;os de experiencia.</p>'),('121728131410010233507S6A','<p>Contamos con Ingenieros Civiles estructuralistas que tienen m&aacute;s de 10 a&ntilde;os de experiencia ejecutando Puentes.</p>'),('12172813141001023403ZQ3T','<p>Capacitar y motivar al personal en la prevenci&oacute;n de los riesgos del trabajo, sobre:</p>\r\n<ul>\r\n<li>Prevenci&oacute;n de Enfermedades Ocupacionales.</li>\r\n<li>Primeros Auxilios.</li>\r\n<li>Automedicaci&oacute;n y abusos de sustancias.</li>\r\n<li>Ergonom&iacute;a en el trabajo.</li>\r\n<li>Seguridad e higiene en el trabajo.</li>\r\n<li>Efectos en la salud por el ruido industrial.</li>\r\n<li>Uso y mantenimiento de los Equipos de Protecci&oacute;n Personal.</li>\r\n<li>Causas y Consecuencias de los Accidentes del trabajo.</li>\r\n<li>Factores de riesgo Psicosociales en el trabajo.</li>\r\n<li>Bioseguridad de Instituciones de Salud.</li>\r\n<li>Manejo seguro de plaguicidas.</li>\r\n<li>Prevenci&oacute;n de la Intoxicaci&oacute;n por Metales pesados.</li>\r\n</ul>'),('12172813141001032340UEJS','<p>Contamos con Stok de equipos Topogr&aacute;ficos (Leyca, Topcon) Miras Topogr&aacute;ficas, Prismas y Radios, GPS submilimetricos RTK. Marcamos la calidad por lo que nuestra empresa realizamos capacitaci&oacute;n por la compra de cualquier equipo a adquirir.</p>\r\n<div class=\"cnt_img_sola\"><img style=\"float: left;\" src=\"/imagen/venta-de-equipos-topograficos_1.gif\" alt=\"\" width=\"244\" height=\"206\" /> <img style=\"float: right;\" src=\"/imagen/nivel-topcon-atg6.gif\" alt=\"\" width=\"244\" height=\"206\" />\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>'),('12172813141001032355YOK4','<p>Alquilamos Veh&iacute;culos a Empresas (contamos con camionetas y autos)</p>\r\n<div class=\"cnt_img_sola\"><img style=\"float: left;\" src=\"/imagen/Hilux_1.gif\" alt=\"\" width=\"350\" height=\"169\" /> <img style=\"float: right;\" src=\"/imagen/Hilux_2.gif\" alt=\"\" width=\"350\" height=\"169\" />\r\n<div style=\"clear: both;\">&nbsp;</div>\r\n</div>'),('12172813141001033617UKOQ','<p>La normativa sobre la seguridad y salud ocupacional obliga el uso obligatorio de EPPS seg&uacute;n el rubro de la Empresa.</p>\r\n<p><strong><br />Seguridad industrial:<br /></strong><br /> venta de botiqu&iacute;n, f&eacute;rulas, camilla r&iacute;gida, se&ntilde;al&eacute;tica (riesgo cr&iacute;tico, cinta de peligro, mallas de seguridad, luces de emergencia, reflectores).</p>'),('12172813141001034133Z5K1',''),('12172813141001041834DHV4','<p>Programas de capacitaci&oacute;n, entrenamiento e inducci&oacute;n: temas (materiales peligrosos - MATPEL, primeros auxilios, protecci&oacute;n de incendios, seguridad en construcci&oacute;n, seguridad en la industria, seguridad en oficinas, trabajos en altura, trabajos en caliente, trabajos:<br /><br /> <br /> -Consultor&iacute;a y capacitaci&oacute;n en el tema de seguridad en el transporte de materiales peligrosos (explosivos, sustancias qu&iacute;micas, desechos hospitalarios, el&eacute;ctricos, y otros).</p>');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

insert  into `estilocontenido`(`ccodestcontenido`,`ccodmodulo`,`cnomestcontenido`,`cimgestcontenido`,`cestestcontenido`,`cincestcontenido`) values ('1101','1100','Imagen derecha','estilo_imgderecha.gif','1','articuloderecha.php'),('1102','1100','Imagen izquierda','estilo_imgizquierda.gif','1','articuloizquierda.php'),('1103','1100','Imagen centro','estilo_imgcentro.gif','1','articulocentro.php'),('1104','1100','Pagina','estilo_imgpagina.gif','1','articulopagina.php'),('1201','1200','Cata Imagen derecha','estilo_imgderecha.gif','1','catalogoderecha.php'),('1202','1200','Cata Imagen izquierda','estilo_imgizquierda.gif','1','catalogoizquierda.php'),('1203','1200','Cata Imagen Central','estilo_imgcentro.gif','1','catalogocentro.php'),('1901','1300','Imagen derecha','estilo_imgderecha.gif','1','paquetesderecha.php'),('1902','1300','Imagen izquierda','estilo_imgizquierda.gif','1','paquetesizquierda.php'),('1903','1300','Imagen centro','estilo_imgcentro.gif','1','paquetescentro.php'),('2001','1500','Vista de Anuncio','vistanuncio.gif','1','anunciosver.php'),('1204','1200','Imagen derecha','estilo_imgderecha.gif','1','articuloderecha.php'),('1205','1200','Imagen izquierda','estilo_imgizquierda.gif','1','articuloizquierda.php'),('1206','1200','Imagen centro','estilo_imgcentro.gif','1','articulocentro.php'),('1207','1200','Pagina','estilo_imgpagina.gif','1','articulopagina.php');

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

insert  into `estilopagina`(`ccodplantilla`,`cnomplantilla`,`crutaplan`,`cestplantilla`,`cimgplantilla`,`ccodpage`,`webancho`,`webfondocolor`,`webfondoimagen`,`webfondorepetir`,`webestilo`,`webtexto`,`webmsup`,`webminf`,`cabeceraalto`,`cabecerafondocolor`,`cabecerafondoimagen`,`cabemenualto`,`cabemenufondocolor`,`cabemenufondoimagen`,`cabecontenidoalto`,`cabecontenidofondocolor`,`cabecontenidofondoimagen`,`columnaizqancho`,`cuerpofondocolor`,`cuerpofondoimagen`,`columnacenancho`,`columnaderancho`,`piecontenidoalto`,`piecontenidofondocolor`,`piecontenidofondoimagen`,`piemenualto`,`piemenufondocolor`,`piemenufondoimagen`,`piealto`,`piefondocolor`,`piefondoimagen`,`menusupalinea`,`menusupmizq`,`menusupmder`,`menusupancho`,`menusupalto`,`menusupcolor`,`menusupimagen`,`menusuptexto`,`menusupactcolor`,`menusupactimagen`,`menusupacttexto`,`menupiealinea`,`menupiemizq`,`menupiemder`,`menupieancho`,`menupiealto`,`menupiecolor`,`menupieimagen`,`menupietexto`,`menupieactcolor`,`menupieactimagen`,`menupieacttexto`,`menuhortituloalto`,`menuhortitulocolor`,`menuhortituloimagen`,`menuhortitulotexto`,`menuhoritemalto`,`menuhoritemcolor`,`menuhoritemimagen`,`menuhoritemtexto`,`menuhoritemactcolor`,`menuhoritemactimagen`,`menuhoritemacttexto`,`menuhorpiealto`,`menuhorpiecolor`,`menuhorpieimagen`,`hometituloalto`,`hometitulocolor`,`hometituloimagen`,`hometitulotxtcolor`,`ccodusuario`,`dfecmodifica`,`tipo_slider_banner`,`propaganda_1_1`,`propaganda_1_2`,`propaganda_1_3`,`titulo_propaganda_1_1`,`titulo_propaganda_1_2`,`titulo_propaganda_1_3`,`texto_propaganda_1_1`,`texto_propaganda_1_2`,`texto_propaganda_1_3`,`sBaseVirtual0`,`sBase0`,`sName0`,`ampliarimagen_portada`,`ampliarvideo_portada`,`galeria_imagen`,`menu_estilo`) values ('0001','cisantiago','cisantiago','1','tp0001.jpg','12172813','980','00142f','bg.jpg','Z','4','000000','0','0','125','','cabecera.png','40','ffffff','menucabecera.jpg','','FFFFFF','','0','','contenido.png','730','250','','','','40','ffffff','menucabecera.jpg','80','ffffff','','right','10','10','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','000000','right','0','0','120','40','ffffff','menusup.jpg','ffffff','ffffff','menusupactive.jpg','191919','40','ffffff','menuizqtitulo.jpg','ffffff','30','ff7f00','','ffffff','5fbf00','','00ffff','0','FFFFFF','','35','005fbf','','ffffff','11061212','2011-12-28 00:00:00','jFlow','imagen/Venta-de-Boxes.gif','imagen/curso-reparacion-de-celulares.gif','imagen/reparacion-de-celulares.gif','Venta de Boxes<br/>Cajas de Desbloqueo y Reparación de Celulares','Curso de Reparación de Celulares','Reparación de Celulares','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio\">Herramientas  Profesionales  para  Desbloquear  Equipos  Celulares al mejor precio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Se brinda Soporte y Asesoramiento\">Se brinda Soporte y Asesoramiento.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Los mejores precios del mercado\">Los mejores precios del mercado.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Asesoria para formar tu propio Negocio\">Asesoria para formar tu propio Negocio.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Profesores Capacitados\">Profesores Capacitados.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Manuales de Servicio y Diagramas Todas las Marcas\">Manuales de Servicio y Diagramas Todas las Marcas.</p>','<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Trabajamos con todas las marcas y modelos de celulares\">Trabajamos con todas las marcas y modelos de celulares.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips\">Cambio de todo tipo de repuestos, reparaciones de hardware, reprogramacion de chips.</p>\r\n<p><img class=\"dott\" src=\"/imagen/msg-success.png\" alt=\"Servicio de JTAG para reparacion de boot para telefonos muertos\">Servicio de JTAG para reparacion de boot para telefonos muertos.</p>','imagen/12172813','imagen/12172813','fotos',NULL,NULL,'PhotoSwipe','1');

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

insert  into `estiloseccion`(`ccodsecestilo`,`cnomsecestilo`,`cimgsecestilo`,`cestsecestilo`,`cincsecestilo`,`ccodmodulo`,`cactusuario`) values ('1101','Pagina','estilo_imgpagina.gif','1','articulo_estilo01.php','1100','0'),('1102','Resumen','estiloresumen.gif','1','articulo_estilo02.php','1100','0'),('1103','Resumen doble','estiloresumendoble.gif','1','articulo_estilo03.php','1100','0'),('1104','Listado','estilolistado.gif','1','articulo_estilo04.php','1100','0'),('1105','Listado doble','estilolistadoble.gif','1','articulo_estilo05.php','1100','0'),('1106','Galeria','estilogaleria.gif','1','art_stylo_galeria.php','1100','0'),('1201','Pagina','estilo_imgpagina.gif','1','catalogo_estilo01.php','1200','0'),('1202','Resumen (1)','estiloresumen.gif','1','catalogo_estilo02.php','1200','0'),('1203','Resumen doble','estiloresumendoble.gif','1','catalogo_estilo03.php','1200','0'),('1204','Listado','estilolistado.gif','1','catalogo_estilo04.php','1200','0'),('1205','Listado precios','estilolistadoble.gif','1','catalogo_estilo05.php','1200','0'),('1206','Galeria','estilogaleria.gif','1','catalogo_estilo06.php','1200','0'),('1401','Album','estilogaleria.gif','1','fotos_estilos01.php','1400','0'),('1402','Estilo Full Screen','estilogaleria.gif','1','fotos_estilos02.php','1400','0'),('8801','Contactos','estilosformulario.gif','1','contactenos/contactenos.php','8800','0'),('8802','Buscador','estilosformulario.gif','1','buscador_01.php','8800','0'),('8803','Cotizar','estilosformulario.gif','1','form_cotizar.php','8800',''),('8804','Maps','estilosformulario.gif','1','mapa/form_mapa.php','8800','0'),('1107','Estilo Blog','estiloblog.gif','1','articulo_estilo07.php','1100','0'),('1108','Estilo Blog-Imagen','estiloblog.gif','1','articulo_estilo08.php','1100','0'),('1901','Tienda 1','','1','tienda_virtual/vercarrito.php','1900','0'),('1601','Metodo Pago 1','','1','metodo_pago01.php','1600','0'),('1701','Envio Instruccion Pago 1','','1','envio-instruccion-pagos01.php','1700','0'),('1801','Prod.Listado 1','','1','estilo_pre_01.php','1800','0'),('1802','Prod.Ofertas 1','','1','oferta_01.php','1800','0'),('1207','Estilo Curso Resumen 01','','1','style-curso-resumen-01.php','1200','0'),('1803','Curso Listado 1','','1','estilo_pre-curso_01.php','1800','0'),('1109','Listado Numeros','estilolistado.gif','1','articulo_estilo09.php','1100','0'),('1804','Lstdo Hori 2nivel','','1','stilo-lis-hori-01.php','1800','0'),('1805','Lstdo Hori Pro IMG','','1','stilo-lis-hori-img-01.php','1800','0'),('1806','infinitecarousel 2','','1','infinitecarousel2.php','1800','0'),('8805','Registro Contingente ','estilosformulario.gif','1','form-registro-contingente.php','8800','0'),('1110','Listado Comentarios','estilolistado.gif','1','articulo_estilo10.php','1100','0'),('8806','Formulario Acceso','estilosformulario.gif','1','form-iniciar-sesion.php','8800','0'),('8807','Configuracion Usuario','estilosformulario.gif','1','form-configuracion-usuario.php','8800','0'),('1807','Listado Comentario Portada','','1','listado-comentario-portada.php','1800','0'),('1808','Listado Usuario Portada','','1','listado-usuarios-portada.php','1800','0'),('8808','Formulario Recordar Contrasena','estilosformulario.gif','1','form-recordatorio-contrasena.php','8800','0'),('2001','Videos Listado General','estilogaleria.gif','1','videos-listado-general.php','2000','0'),('1809','Videos slider Portada ','','1','videos-slider-portada-infinitecarousel2.php','1800','0'),('1403','Panel Izquierdo','estilogaleria.gif','1','foto_ctn_iz_centro.php','1400','0'),('1810','Fotos slider Portada','','1','fotos-slider-portada-infinitecarousel2.php','1800','0'),('1811','Fotos slider Portada Thumbnail','','1','fotos-slider-portada-Thumbnails.php','1800','0'),('1404','Lstado Hori Categoria superior','estilogaleria.gif','1','foto_lstado_hori_categoria_superiror.php','1400','0'),('1812','Tab TabStylesInspiration hori ','','1','tabs_TabStylesInspiration_hori_cate01.php','1800','0'),('1813','Tab jquery steps verti 1','','1','tabs_jquery_steps_verti_01.php','1800','0'),('8809','Maps Sin Pre-Imagen','estilosformulario.gif','1','mapa/form_mapa_sin_pre_imagen.php','8800',''),('1405','Album PhotoSwipe','estilogaleria.gif','1','foto_album_photoswipe.php','1400','0'),('1111','Galeria photoswipe','estilolistado.gif','1','art_stylo_galeria_photoswipe.php','1100','0'),('1112','Resumen Galeria','estilolistado.gif','1','articulo_resumen_galeria.php','1100','0'),('1113','Resumen_02','estilolistado.gif','1','articulo_resumen2.php','1100','0'),('1814','Lstdo Hori2nivelyArticulo','','1','stilo-lis-Hori2nivelyArticulo-01.php','1800','0');

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

insert  into `page`(`ccodpage`,`cnompage`,`cnikpage`,`cdocpage`,`crazpage`,`cslogan`,`ccodidioma`,`camipage`,`cdefpage`,`credpage`,`cestpage`,`ctitpage`,`ctagpage`,`cdespage`,`cpiepage`,`canagoogle`,`ccodpais`,`clogo`,`nmosprecio`,`ccodmoneda`,`cfavicon`,`ccodplantilla`,`nvispage`,`cemacontacto`,`cemasoporte`,`cemaventas`,`cdistrito`,`cdirecempresa`,`chorarioatencion`,`ctelefonopri`,`ctelefonosec`,`tmovil1`,`tmovil2`,`tmovil3`,`tmovil4`,`cod_google_map`,`anchomapa`,`altomapa`,`credYoutube`,`credTwitter`,`credFacebook`,`ccodmodulo`,`cprovincia`,`imagen_mapa`,`rutaimages`,`cprovincia2`,`cdistrito2`,`cdirecempresa2`,`estado`,`cscriptfacebook`,`fb_admins_facebook`,`fb_app_id_facebook`,`Script_chat`) values ('12172813','Consorcio Inmobiliaria Santiago S.A.C.','cisantiago','','Consorcio Inmobiliaria Santiago S.A.C.','','es','desarrollo.com','1','','1','Servicios de Topografía','Posee una amplia organización adecuada para desarrollar distintos tipos de consultorías, para lo cual cuenta con las siguientes áreas técnicas:Catastro,Topografía y Geodesia,Medio Ambiente,Sistemas de Información Geográfica y Sistemas,Ordenamiento del Territorio,Capacitación,Prevención de Riesgos                                                                                                                                                                                                           ','técnicas: Catastro, Topografía y Geodesia,Medio Ambiente,Sistemas de Información Geográfica y Sistemas,Ordenamiento del Territorio,Capacitación,Prevención de Riesgos                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ','<br>\nCopyright © 2011 FP Diesel Todos los derechos reservados<br>\nAv. Elmer Faucett 330 Urb. La Colonial - Callao 01 Perú \nTeléfono: +511 4520378 Fax +511 4520378 Nextel: 813*4542 / 813*4197  gerencia@rysdistribuciones.com  \n','                                                                                                       <script>\r\n  (function(i,s,o,g,r,a,m){i[\\\\\\\'GoogleAnalyticsObject\\\\\\\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\\\\\\\'script\\\\\\\',\\\\\\\'//www.google-analytics.com/analytics.js\\\\\\\',\\\\\\\'ga\\\\\\\');\r\n\r\n  ga(\\\\\\\'create\\\\\\\', \\\\\\\'UA-38704880-1\\\\\\\', \\\\\\\'auto\\\\\\\');\r\n  ga(\\\\\\\'send\\\\\\\', \\\\\\\'pageview\\\\\\\');\r\n\r\n</script>                                                                                                                                                                                                                                                                                                                                                           ','PE000000','/imagen/12172813/logo_empresa.gif','0','D','/imagen/soluciones_gis_menu.ico','0001',112178,'gerencia@cisantiago.com','gerencia@rysdistribuciones.com','gerencia@cisantiago.com','',' Dirección:  Jr. Tahuantinsuyo 248   Urb. Andahuaylas     Santa Anita - Lima  ','Horario de atención : Lunes a Viernes  de  8 Am - 5 Pm                                              ','<strong>Atención al Cliente : </strong>(01) 3623015 ','<strong>  Celular: </strong>944896024  / 944896031','<strong>   RPM :</strong> #085150, #085169','','','','<iframe src=\"https://mapsengine.google.com/map/embed?mid=zd0Nu8FZj6OI.krOwbxSz05No\" width=\"100%\" height=\"400px\"></iframe>                      ','100%','400px','https://www.youtube.com/user/topografiacisantiago','','https://www.facebook.com/pages/Cisantiago/403340949760319','1200','','','','','','',NULL,'						   						   						   						   						   						   						   						   						   						   						                                                                                                                                                                                                                                                                                                            ','','','                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ');

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
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

/*Data for the table `pagehome` */

insert  into `pagehome`(`ccodinicio`,`ccodpage`,`cnomhome`,`ccodclase`,`cesthome`,`ctiphome`,`cimgpubli`,`nancho`,`nalto`,`curlpubli`,`cadspubli`,`ccodestilo`,`ccodmodulo`,`ccodseccion`,`ccodcategoria`,`nnroitems`,`ccodorden`,`cubidestino`,`cordpublica`,`cpubsec`,`cpubnom`,`cpubres`,`cpubimg`,`cimgsize`,`dfecinicio`,`dfecfinal`,`anchowin`,`altowin`,`cimagen1`,`curl1`,`titulo_imagen1`,`texto_imagen1`,`cimagen2`,`curl2`,`titulo_imagen2`,`texto_imagen2`,`cimagen3`,`curl3`,`titulo_imagen3`,`texto_imagen3`,`cimagen4`,`curl4`,`titulo_imagen4`,`texto_imagen4`,`cimagen5`,`curl5`,`titulo_imagen5`,`texto_imagen5`,`dfechome`,`estado`,`mostrar_titulo`,`texto1`,`texto2`,`texto3`,`texto4`,`texto5`) values (73,'12172813','Cabecera Animada',2,'1','5','',980,250,'','',NULL,'',NULL,'',0,'','1',0,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'/imagen/12172813/propaganda_1_1_4.jpg','',NULL,NULL,'/imagen/12172813/propaganda_1_1_3.jpg','',NULL,NULL,'/imagen/12172813/propaganda_1_1_2.gif','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-09-28','1','si','','','','',''),(74,'12172813','Bienvenida',4,'1','3','',NULL,NULL,'','<p><strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> tiene como objetivo principal realizar diversos tipos de consultor&iacute;as relacionadas con obras civiles y &nbsp;la informaci&oacute;n geogr&aacute;fica. Para ello, ejecuta estudios a nivel nacional, en todos los campos del desarrollo econ&oacute;mico del pa&iacute;s.<br /> <strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> es un conjunto de profesionales multidisciplinario de investigaci&oacute;n, consultor&iacute;a y docencia, que opera con sede en Lima, oficinas descentralizas. <br /> <strong>Consorcio Inmobiliaria Santiago S.A.C.</strong> posee una amplia organizaci&oacute;n adecuada para desarrollar distintos tipos de consultor&iacute;as, para lo cual cuenta con tres bloques de consultor&iacute;as t&eacute;cnicas:</p>',NULL,'',NULL,'',0,'','3',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-09-28','1','si',NULL,NULL,NULL,NULL,NULL),(76,'12172813','Facebook',3,'2','3','',NULL,NULL,'','<p><iframe style=\"border: none; overflow: hidden; width: 99%; height: 290px;\" frameborder=\"0\" height=\"150\" scrolling=\"no\" src=\"//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FCisantiago%2F403340949760319&amp;width=200px&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false\" width=\"300\"></iframe></p>',NULL,'',NULL,'',0,'','4',2,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-09-28','2','si',NULL,NULL,NULL,NULL,NULL),(83,'12172813','Bienvenida-Areas',7,'1','4','',NULL,NULL,'','','1814','1100','121728131416000000000000','0',10,'1','3',2,'0','1','1','1','3','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-10-02','1','no',NULL,NULL,NULL,NULL,NULL),(84,'12172813','Bienvenida-Flash',6,'2','3','',NULL,NULL,'','<div style=\"float: left;\"><object id=\"area ingenieria geografica\" width=\"290\" height=\"220\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" align=\"middle\">\r\n				<param name=\"movie\" value=\"area_ingenieria_geografica.swf\" />\r\n				<param name=\"quality\" value=\"high\" />\r\n				<param name=\"bgcolor\" value=\"#ffffff\" />\r\n				<param name=\"play\" value=\"true\" />\r\n				<param name=\"loop\" value=\"true\" />\r\n				<param name=\"wmode\" value=\"transparent\" />\r\n				<param name=\"scale\" value=\"showall\" />\r\n				<param name=\"menu\" value=\"true\" />\r\n				<param name=\"devicefont\" value=\"false\" />\r\n				<param name=\"salign\" value=\"\" />\r\n				<param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n				<!-- [if !IE]>-->\r\n			  <object type=\"application/x-shockwave-flash\" data=\"area_ingenieria_geografica.swf\" width=\"290\" height=\"220\">\r\n					<param name=\"movie\" value=\"area_ingenieria_geografica.swf\" />\r\n					<param name=\"quality\" value=\"high\" />\r\n					<param name=\"bgcolor\" value=\"#ffffff\" />\r\n					<param name=\"play\" value=\"true\" />\r\n					<param name=\"loop\" value=\"true\" />\r\n					<param name=\"wmode\" value=\"transparent\" />\r\n					<param name=\"scale\" value=\"showall\" />\r\n					<param name=\"menu\" value=\"true\" />\r\n					<param name=\"devicefont\" value=\"false\" />\r\n					<param name=\"salign\" value=\"\" />\r\n					<param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n				<!--<![endif]-->\r\n					<a href=\"http://www.adobe.com/go/getflash\">\r\n						<img src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"Obtener Adobe Flash Player\" />\r\n					</a>\r\n				<!-- [if !IE]>-->\r\n				</object></object> <!--<![endif]--></div>\r\n<div style=\"float: right;\"><object id=\"area ingenieria geografica\" width=\"290\" height=\"220\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" align=\"middle\">\r\n				<param name=\"movie\" value=\"area_servicio_venta.swf\" />\r\n				<param name=\"quality\" value=\"high\" />\r\n				<param name=\"bgcolor\" value=\"#ffffff\" />\r\n				<param name=\"play\" value=\"true\" />\r\n				<param name=\"loop\" value=\"true\" />\r\n				<param name=\"wmode\" value=\"transparent\" />\r\n				<param name=\"scale\" value=\"showall\" />\r\n				<param name=\"menu\" value=\"true\" />\r\n				<param name=\"devicefont\" value=\"false\" />\r\n				<param name=\"salign\" value=\"\" />\r\n				<param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n				<!-- [if !IE]>-->\r\n			  <object type=\"application/x-shockwave-flash\" data=\"area_servicio_venta.swf\" width=\"290\" height=\"220\">\r\n					<param name=\"movie\" value=\"area_servicio_venta.swf\" />\r\n					<param name=\"quality\" value=\"high\" />\r\n					<param name=\"bgcolor\" value=\"#ffffff\" />\r\n					<param name=\"play\" value=\"true\" />\r\n					<param name=\"loop\" value=\"true\" />\r\n					<param name=\"wmode\" value=\"transparent\" />\r\n					<param name=\"scale\" value=\"showall\" />\r\n					<param name=\"menu\" value=\"true\" />\r\n					<param name=\"devicefont\" value=\"false\" />\r\n					<param name=\"salign\" value=\"\" />\r\n					<param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n				<!--<![endif]-->\r\n					<a href=\"http://www.adobe.com/go/getflash\">\r\n						<img src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"Obtener Adobe Flash Player\" />\r\n					</a>\r\n				<!-- [if !IE]>-->\r\n				</object></object> <!--<![endif]--></div>',NULL,'',NULL,'',0,'','3',3,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-10-04','2','no',NULL,NULL,NULL,NULL,NULL),(79,'12172813','Contacto',3,'2','3','',NULL,NULL,'','<div id=\"m_cont_late\">\r\n<div style=\"padding-left: 20px; padding-top: 96px;\">\r\n<p>Oficina: &nbsp;<strong>(051)3623015</strong><br /><br /> Celular:&nbsp; <strong>944-896024<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 944-896031<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 940-168879<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 942-655039 </strong><br /><br /> Rpm&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <strong> #085150 <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; #085169 </strong></p>\r\n<p class=\"size_11\"><strong>gerencia@cisantiago.com</strong></p>\r\n</div>\r\n</div>',NULL,'',NULL,'',0,'','4',1,'0','0','0','0','','0000-00-00','0000-00-00',0,0,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'','',NULL,NULL,'2014-10-01','2','no',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `pagehomedet` */

DROP TABLE IF EXISTS `pagehomedet`;

CREATE TABLE `pagehomedet` (
  `ccodinicio` int(8) NOT NULL,
  `ccoddestino` varchar(24) NOT NULL,
  PRIMARY KEY (`ccodinicio`,`ccoddestino`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pagehomedet` */

insert  into `pagehomedet`(`ccodinicio`,`ccoddestino`) values (11,'D'),(12,'D'),(13,'D'),(14,'D'),(73,'T'),(74,'D'),(76,'D'),(79,'T'),(83,'D'),(84,'D');

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

insert  into `pagemenu`(`ccodmenu`,`ccodpage`,`cnommenu`,`cubimenu`,`cclamenu`,`cestmenu`,`cmenuorden`,`mostrarportada`) values (1,'12172813','Cabecera','1','','1','0',NULL),(3,'12172813','Pie','5','','1','',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

insert  into `pedido`(`id_pedido`,`ccodcontenido`,`cnomcontenido`,`precio`,`cimgcontenido`,`atendido`,`IP`) values (1,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(2,'12172806140911004923OKYF','NCK Dongle','130','/web/12172806/fotos/productos/nck-dongle.jpg','NO','127.0.0.1'),(3,'121728061409222358197G4R','Quienes Somos','0','/web/12172806/fotos/presentacion.gif','NO','127.0.0.1');

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
  `cordcontenido` int(5) NOT NULL,
  `nvisseccion` int(9) NOT NULL,
  `dfecseccion` date NOT NULL,
  `ccodusuario` varchar(10) NOT NULL,
  `dfecmodifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` varchar(5) DEFAULT NULL,
  `totalpantalla` varchar(30) DEFAULT NULL,
  `paginator` varchar(5) DEFAULT NULL,
  `mostrarurlcatebase` varchar(5) DEFAULT NULL,
  `multidrop` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ccodseccion`),
  KEY `camiseccion` (`ccodpage`,`camiseccion`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`ccodseccion`,`ccodpage`,`ccodplantilla`,`ccodmodulo`,`ccodsecestilo`,`ccodclase`,`cnomseccion`,`camiseccion`,`ctitseccion`,`cdesseccion`,`ctagseccion`,`cimgseccion`,`cestseccion`,`cnivseccion`,`ctipseccion`,`cestpublico`,`cnewmenu`,`curlseccion`,`cpagseccion`,`cordcontenido`,`nvisseccion`,`dfecseccion`,`ccodusuario`,`dfecmodifica`,`estado`,`totalpantalla`,`paginator`,`mostrarurlcatebase`,`multidrop`) values ('121728131416000100010000','12172813','0001','1100','1101',2,'Proyectos planificación y gestión territorial','proyectos-planificacion-y-gestion-territorial','Proyectos planificación y gestión territorial','','','','1','3','1','0','0','','12',1,0,'2014-09-29','1','2014-10-02 07:49:58','1','derepantalla',NULL,NULL,NULL),('121728131417000000000000','12172813','0001','8800','8801',2,'Contactenos','contactenos','Contactenos','','','','1','1','1','0','0','','12',5,0,'2014-09-28','100','2016-08-15 04:09:58','1','totalpantalla',NULL,'SI','simple'),('121728131418000000000000','12172813','0001','1100','1101',2,'Profesionales','profesionales','Profesionales','','','','1','1','1','0','0','','12',4,0,'2014-09-28','100','2016-08-15 04:09:50','1','derepantalla',NULL,'SI','simple'),('121728131409000000000000','12172813','0001','1200','1201',2,'Inicio','inicio','INICIO','','','','1','1','2','0','0','/index.php','1',1,0,'2014-08-13','100','2016-08-15 04:09:21','1','ambos','NO','SI','simple'),('121728131416000100030000','12172813','0001','1100','1101',2,'sistemas información geográfica','sistemas-informacion-geografica','sistemas información geográfica','','','','1','3','1','0','0','','12',3,0,'2014-09-29','1','2014-10-04 05:09:00','1','totalpantalla',NULL,NULL,NULL),('121728131416000100020000','12172813','0001','1100','1101',2,'Topografía y Cartografia','topografia-y-cartografia','Topografía y Cartografia','','','','1','3','1','0','0','','12',2,0,'2014-09-29','1','2014-10-02 08:08:02','1','derepantalla',NULL,NULL,NULL),('121728131416000100000000','12172813','0001','1100','1109',2,'Ingeniería Geográfica','ingenieria-geografica','Ingeniería Geográfica','','','','1','2','1','0','0','','12',1,0,'2014-09-29','1','2014-10-02 07:49:02','1','derepantalla',NULL,NULL,NULL),('121728131415000000000000','12172813','0001','1100','1101',2,'Quienes Somos','quienes-somos','Quienes Somos','','','','1','1','1','0','0','','12',3,0,'2014-09-20','100','2016-08-15 04:09:41','1','derepantalla',NULL,'SI','simple'),('121728131416000000000000','12172813','0001','1100','1109',2,'Servicios','servicios','Servicios','','','','1','1','1','0','0','','12',2,0,'2014-09-20','100','2016-08-15 04:09:33','1','derepantalla',NULL,'SI','simple'),('121728131416000400000000','12172813','0001','1100','1109',2,'Venta Capacitación Salud Ocupacional','venta-capacitacion-salud-ocupacional','Venta Capacitación Salud Ocupacional','','','','1','2','1','0','0','','12',4,0,'2014-09-29','1','2014-10-02 07:49:30','1','derepantalla',NULL,NULL,NULL),('121728131416000300000000','12172813','0001','1100','1109',2,'Venta y alquiler','venta-y-alquiler','Venta y alquiler','','','','1','2','1','0','0','','12',3,0,'2014-09-29','1','2014-10-01 03:32:25','1','derepantalla',NULL,NULL,NULL),('121728131416000200000000','12172813','0001','1100','1109',2,'Ingeniería Civil','ingenieria-civil','Ingeniería Civil','','','','1','2','1','0','0','','12',2,0,'2014-09-29','1','2014-10-02 07:49:10','1','derepantalla',NULL,NULL,NULL),('121728131416000100040000','12172813','0001','1100','1101',2,'geomarketing','geomarketing','geomarketing','','','','1','3','1','0','0','','12',4,0,'2014-09-29','1','2014-10-02 08:11:28','1','derepantalla',NULL,NULL,NULL),('121728131416000100050000','12172813','0001','1100','1101',2,'Ordenamiento y gestión territorial','ordenamiento-y-gestion-territorial','Ordenamiento y gestión territorial','','','','1','3','1','0','0','','12',5,0,'2014-09-29','1','2014-09-30 23:44:38','1','derepantalla',NULL,NULL,NULL),('121728131416000100060000','12172813','0001','1100','1101',2,'Catastro Urbano','catastro-urbano','Catastro Urbano','','','','1','3','1','0','0','','12',6,0,'2014-09-29','1','2014-10-01 00:18:32','1','derepantalla',NULL,NULL,NULL),('121728131416000100070000','12172813','0001','1100','1101',2,'Estudio Impacto Ambiental','estudio-impacto-ambiental','Estudio Impacto Ambiental','','','','1','3','1','0','0','','12',7,0,'2014-09-29','1','2014-10-02 08:13:15','1','derepantalla',NULL,NULL,NULL),('121728131416000100080000','12172813','0001','1100','1101',2,'Gestión Integral de Residuos','gestion-integral-de-residuos','Gestión Integral de Residuos','','','','1','3','1','0','0','','12',8,0,'2014-09-29','1','2014-09-30 05:21:59','1','derepantalla',NULL,NULL,NULL),('121728131416000100090000','12172813','0001','1100','1101',2,'Educación Ambiental','educacion-ambiental','Educación Ambiental','','','','1','3','1','0','0','','12',9,0,'2014-09-29','1','2014-10-01 01:29:47','1','derepantalla',NULL,NULL,NULL),('121728131416000100100000','12172813','0001','1100','1101',2,'Ordenación del Territorio','ordenacion-del-territorio','Ordenación del Territorio','','','','1','3','1','0','0','','12',10,0,'2014-09-29','1','2014-09-30 05:22:25','1','derepantalla',NULL,NULL,NULL),('121728131416000100110000','12172813','0001','1100','1101',2,'Ordenamiento Ambiental','ordenamiento-ambiental','Ordenamiento Ambiental','','','','1','3','1','0','0','','12',11,0,'2014-09-29','1','2014-09-30 05:22:32','1','derepantalla',NULL,NULL,NULL),('121728131416000100120000','12172813','0001','1100','1101',2,'Auditoria Ambiental y Territorial','auditoria-ambiental-y-territorial','Auditoria Ambiental y Territorial','','','','1','3','1','0','0','','12',12,0,'2014-09-29','1','2014-09-30 05:22:39','1','derepantalla',NULL,NULL,NULL),('121728131416000200010000','12172813','0001','1100','1101',2,'Canales de Riego','canales-de-riego','Canales de Riego','','','','1','3','1','0','0','','12',1,0,'2014-09-30','1','2014-10-02 08:16:22','1','derepantalla',NULL,NULL,NULL),('121728131416000200020000','12172813','0001','1100','1101',2,'Construcción Obras Hidraulicas','construccion-obras-hidraulicas','Construcción Obras Hidraulicas','','','','1','3','1','0','0','','12',2,0,'2014-09-30','1','2014-10-01 03:13:28','1','derepantalla',NULL,NULL,NULL),('121728131416000200030000','12172813','0001','1100','1101',2,'Construcción Carreteras','construccion-carreteras','Construcción Carreteras','','','','1','3','1','0','0','','12',3,0,'2014-09-30','1','2014-10-01 03:16:54','1','derepantalla',NULL,NULL,NULL),('121728131416000200040000','12172813','0001','1100','1101',2,'Construcción Puentes','construccion-puentes','Construcción Puentes','','','','1','3','1','0','0','','12',4,0,'2014-09-30','1','2014-10-01 03:17:24','1','derepantalla',NULL,NULL,NULL),('121728131416000200050000','12172813','0001','1100','1101',2,'Capacitación','capacitacion','Capacitación','','','','1','3','1','0','0','','12',5,0,'2014-09-30','1','2014-10-01 03:19:54','1','derepantalla',NULL,NULL,NULL),('121728131416000300010000','12172813','0001','1100','1101',2,'Venta y Alquiler de Equipos Topográficos','venta-y-alquiler-de-equipos-topograficos','Venta y Alquiler de Equipos Topográficos','','','','1','3','1','0','0','','12',1,0,'2014-09-30','1','2014-10-01 03:27:53','1','derepantalla',NULL,NULL,NULL),('121728131416000300020000','12172813','0001','1100','1101',2,'Alquiler de Vehiculos','alquiler-de-vehiculos','Alquiler de Vehiculos','','','','1','3','1','0','0','','12',2,0,'2014-09-30','1','2014-10-01 03:28:00','1','derepantalla',NULL,NULL,NULL),('121728131416000400010000','12172813','0001','1100','1101',2,'Venta EPPS','venta-epps','Venta EPPS','','','','1','3','1','0','0','','12',1,0,'2014-09-30','1','2014-10-02 08:13:45','1','derepantalla',NULL,NULL,NULL),('121728131416000400020000','12172813','0001','1100','1101',2,'Capacitacion en Salud ocupacional','capacitacion-en-salud-ocupacional','Capacitacion en Salud ocupacional','','','','1','3','1','0','0','','12',2,0,'2014-09-30','1','2014-10-01 03:49:23','1','derepantalla',NULL,NULL,NULL);

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

insert  into `seccioncontenido`(`ccodpage`,`ccodseccion`,`ccodcontenido`,`cordcontenido`) values ('12172813','121728131416000100050000','121728131409302223419QS1',0),('12172813','121728131416000100000000','121728131409302223419QS1',0),('12172813','121728131416000100030000','1217281314093005434563XL',0),('12172813','121728131416000100000000','1217281314093005434563XL',0),('12172813','121728131416000100040000','12172813140930222322VDY5',0),('12172813','121728131416000100000000','12172813140930222322VDY5',0),('12172813','121728131416000000000000','12172813140930222322VDY5',0),('12172813','121728131416000000000000','121728131409302223419QS1',0),('12172813','121728131415000000000000','121728131409222358197G4R',0),('12172813','121728131418000000000000','1217281314092901243444OC',0),('12172813','121728131416000000000000','1217281314093005434563XL',0),('12172813','121728131416000000000000','12172813140930052402U5UO',0),('12172813','121728131416000100020000','12172813140930052402U5UO',0),('12172813','121728131416000000000000','1217281314093005175575VC',0),('12172813','121728131416000100000000','1217281314093005175575VC',0),('12172813','121728131416000100010000','1217281314093005175575VC',0),('12172813','121728131416000100000000','12172813140930052402U5UO',0),('12172813','121728131416000100060000','12172813140930222356LLOI',0),('12172813','121728131416000100000000','12172813140930222356LLOI',0),('12172813','121728131416000000000000','12172813140930222356LLOI',0),('12172813','121728131416000100070000','12172813140930222412WPKH',0),('12172813','121728131416000100000000','12172813140930222412WPKH',0),('12172813','121728131416000000000000','12172813140930222412WPKH',0),('12172813','121728131416000100080000','12172813140930222427LUDT',0),('12172813','121728131416000100000000','12172813140930222427LUDT',0),('12172813','121728131416000000000000','12172813140930222427LUDT',0),('12172813','121728131416000100090000','12172813140930222438D111',0),('12172813','121728131416000100000000','12172813140930222438D111',0),('12172813','121728131416000000000000','12172813140930222438D111',0),('12172813','121728131416000100100000','1217281314093022245326HR',0),('12172813','121728131416000100000000','1217281314093022245326HR',0),('12172813','121728131416000000000000','1217281314093022245326HR',0),('12172813','121728131416000100110000','1217281314093022250887I1',0),('12172813','121728131416000100000000','1217281314093022250887I1',0),('12172813','121728131416000000000000','1217281314093022250887I1',0),('12172813','121728131416000100120000','12172813140930222523BDHL',0),('12172813','121728131416000100000000','12172813140930222523BDHL',0),('12172813','121728131416000000000000','12172813140930222523BDHL',0),('12172813','121728131416000200010000','12172813141001023300OF8I',0),('12172813','121728131416000200000000','12172813141001023300OF8I',0),('12172813','121728131416000000000000','12172813141001023300OF8I',0),('12172813','121728131416000200020000','121728131410010233217TS3',0),('12172813','121728131416000200000000','121728131410010233217TS3',0),('12172813','121728131416000000000000','121728131410010233217TS3',0),('12172813','121728131416000200030000','12172813141001023334GSCD',0),('12172813','121728131416000200000000','12172813141001023334GSCD',0),('12172813','121728131416000000000000','12172813141001023334GSCD',0),('12172813','121728131416000200040000','121728131410010233507S6A',0),('12172813','121728131416000200000000','121728131410010233507S6A',0),('12172813','121728131416000000000000','121728131410010233507S6A',0),('12172813','121728131416000200050000','12172813141001023403ZQ3T',0),('12172813','121728131416000200000000','12172813141001023403ZQ3T',0),('12172813','121728131416000000000000','12172813141001023403ZQ3T',0),('12172813','121728131416000300010000','12172813141001032340UEJS',0),('12172813','121728131416000300000000','12172813141001032340UEJS',0),('12172813','121728131416000000000000','12172813141001032340UEJS',0),('12172813','121728131416000300020000','12172813141001032355YOK4',0),('12172813','121728131416000300000000','12172813141001032355YOK4',0),('12172813','121728131416000000000000','12172813141001032355YOK4',0),('12172813','121728131416000400010000','12172813141001033617UKOQ',0),('12172813','121728131416000400000000','12172813141001033617UKOQ',0),('12172813','121728131416000000000000','12172813141001033617UKOQ',0),('12172813','121728131416000000000000','12172813141001034133Z5K1',0),('12172813','121728131416000400000000','12172813141001034133Z5K1',0),('12172813','121728131416000400010000','12172813141001034133Z5K1',0),('12172813','121728131416000000000000','12172813141001041834DHV4',0),('12172813','121728131416000400000000','12172813141001041834DHV4',0),('12172813','121728131416000400020000','12172813141001041834DHV4',0);

/*Table structure for table `seccionmenu` */

DROP TABLE IF EXISTS `seccionmenu`;

CREATE TABLE `seccionmenu` (
  `ccodseccion` varchar(24) NOT NULL,
  `ccodmenu` int(8) NOT NULL,
  `cordmenu` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ccodmenu`,`ccodseccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `seccionmenu` */

insert  into `seccionmenu`(`ccodseccion`,`ccodmenu`,`cordmenu`) values ('121728131416000000000000',1,2),('121728131417000000000000',1,5),('121728131418000000000000',1,4),('121728131409000000000000',1,1),('121728131415000000000000',1,3);

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
