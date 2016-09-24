-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2012 a las 15:53:47
-- Versión del servidor: 5.0.92
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gamatell_general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campana`
--

CREATE TABLE IF NOT EXISTS `campana` (
  `idcampana` tinyint(12) NOT NULL auto_increment,
  `descripcampana` varchar(200) NOT NULL,
  PRIMARY KEY  (`idcampana`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `campana`
--

INSERT INTO `campana` (`idcampana`, `descripcampana`) VALUES
(1, 'Navideña'),
(2, 'San Valentin'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` tinyint(4) NOT NULL auto_increment,
  `descripcion` varchar(600) NOT NULL,
  PRIMARY KEY  (`idcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `descripcion`) VALUES
(31, 'caja desbloqueo'),
(32, 'cable celulares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactenos`
--

CREATE TABLE IF NOT EXISTS `contactenos` (
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` longtext NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `codigo` bigint(12) NOT NULL auto_increment,
  `asunto` varchar(200) NOT NULL,
  `procedencia` varchar(200) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `contactenos`
--

INSERT INTO `contactenos` (`nombre`, `apellido`, `email`, `comentario`, `telefono`, `fecha`, `codigo`, `asunto`, `procedencia`) VALUES
('dfsfd', '', 'fsdf@hotmail.com', 'adasd', '', 'Lunes 16 de Abril de 2012 Hora: 04:35:58 AM', 67, '', 'Formulario Contactenos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` tinyint(11) NOT NULL auto_increment,
  `nombproductos` varchar(300) NOT NULL,
  `idcategoria` tinyint(11) NOT NULL,
  `idsudcategoria` tinyint(11) NOT NULL,
  `detalle` varchar(800) NOT NULL,
  `preciosoles` decimal(11,0) NOT NULL,
  `preciosolesoferta` decimal(11,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `rutaimagen` varchar(300) NOT NULL,
  `mostrar` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `fechacorta` date NOT NULL,
  `idcampana` varchar(12) NOT NULL,
  `borrado` varchar(1) NOT NULL,
  `ruta_archivo_php` varchar(300) NOT NULL,
  `precio_dolar` decimal(10,0) NOT NULL,
  PRIMARY KEY  (`idproductos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombproductos`, `idcategoria`, `idsudcategoria`, `detalle`, `preciosoles`, `preciosolesoferta`, `cantidad`, `rutaimagen`, `mostrar`, `fecha`, `fechacorta`, `idcampana`, `borrado`, `ruta_archivo_php`, `precio_dolar`) VALUES
(122, 'Caja SELG Fusion Box SE Tool con tarjeta SE Tool con software y juego de cables (10 uds.) ', 31, 0, 'SELG Fusion Box es una interface especial para trabajar con SE Tool & LG Tool presentada por el equipo SE Tool.\r\n\r\nTarjeta SE Tool estÃ¡ activada para trabajar con las Ãºltimas versiones de SE Tool y LG Tool.\r\n', '150', '150', 1, 'http://www.gamatell.com/productos/130_130/Caja-SELG-Fusion-Box-SE-Tool-con-tarjeta-SE-Tool-con-software-y-juego-de-cables-10-uds_.jpg', 1, '0000-00-00', '0000-00-00', '', '0', 'archivos_php/selg_fusion_box_se_tool_pack_with_se_tool_card_v1_107_10_cables.php', '150'),
(121, 'Avator Box', 31, 0, 'Avator Box es una herramienta para el servicio tÃ©cnico de telÃ©fonos celulares chinos, sirve para una detecciÃ³n rÃ¡pida de pinouts.', '150', '150', 1, 'http://www.gamatell.com/productos/130_130/Avator-Box.gif', 1, '0000-00-00', '0000-00-00', '', '0', 'archivos_php/Avator_Box.php', '150'),
(123, 'GPG Dragon', 31, 0, 'Dispositivo GPG Dragon para reparar telÃ©fonos celulares chinos permite detectar pines, flashear y liberar celulares a base de los procesadores MTK, Spreadtrum, NXP, Infineon, Qualcomm, Silabs, Anyka, ADI y SKY.\r\n\r\nEl software de GPG Dragon se actualiza a la Ãºltima versiÃ³n automÃ¡ticamente. ', '150', '150', 1, 'http://www.gamatell.com/productos/130_130/GPG-Dragon.jpg', 1, '0000-00-00', '0000-00-00', '', '0', 'archivos_php/gpg_dragon.php', '150');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `idsubcategoria` tinyint(4) NOT NULL auto_increment,
  `descripSubcategoria` varchar(600) NOT NULL,
  `idcategoria` tinyint(11) NOT NULL,
  PRIMARY KEY  (`idsubcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
