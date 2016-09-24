-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2012 a las 15:49:42
-- Versión del servidor: 5.0.92
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisdataw_carrito_compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(5) NOT NULL auto_increment,
  `nombre` varchar(80) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `telefono` varchar(50) default NULL,
  `direccion` varchar(50) default NULL,
  `fec_alta` date NOT NULL,
  PRIMARY KEY  (`id_cliente`),
  UNIQUE KEY `e-mail` (`e-mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_pedidos`
--

CREATE TABLE IF NOT EXISTS `det_pedidos` (
  `id_detpedido` int(5) NOT NULL auto_increment,
  `id_pedido` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(5) NOT NULL,
  PRIMARY KEY  (`id_detpedido`),
  KEY `id_pedido` (`id_pedido`,`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(5) NOT NULL auto_increment,
  `id_cliente` int(5) NOT NULL,
  `fec_alta` date NOT NULL,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_pedido`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(5) NOT NULL auto_increment,
  `nomproducto` varchar(80) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio_dolar` int(10) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `id_categoria` varchar(50) NOT NULL,
  `precio_soles` int(11) NOT NULL,
  PRIMARY KEY  (`id_producto`),
  KEY `nombre` (`nomproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nomproducto`, `descripcion`, `precio_dolar`, `foto`, `id_categoria`, `precio_soles`) VALUES
(1, 'Dominio', 'Dominio', 12, '', '', 0),
(2, 'Hosting', 'Plan  Basico', 30, '', 'Hosting', 80),
(3, 'Hosting', 'Plan  Estandar', 45, '', 'Hosting', 122),
(4, 'Hosting', 'Plan  Empresarial', 100, '', 'Hosting', 270),
(5, 'Hosting', 'Plan  Profesional', 148, '', 'Hosting', 400);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
