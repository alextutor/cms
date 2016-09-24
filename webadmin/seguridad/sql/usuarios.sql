-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2011 a las 17:16:13
-- Versión del servidor: 5.0.91
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `info_infodisfap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` bigint(7) NOT NULL auto_increment,
  `nick` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `nombre` char(255) default NULL,
  `email` char(100) default NULL,
  `cookie` text NOT NULL,
  KEY `id` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nick`, `password`, `nombre`, `email`, `cookie`) VALUES
(1, 'alextutor', '0403221757', 'alex', 'ceicorperu.com', '512407574'),
(2, 'alhuay', '0403221757', 'alhuay', 'juancarlosalhuay@hotmail.com', '');
