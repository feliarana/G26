-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2015 a las 20:47:25
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`idCategoria` int(10) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Autos'),
(2, 'Electrodomesticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`idComentario` int(10) unsigned NOT NULL,
  `texto` varchar(140) NOT NULL,
  `respuesta` varchar(140) NOT NULL,
  `idSubasta` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`idOferta` int(10) unsigned NOT NULL,
  `Argumento` varchar(256) NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `idSubasta` int(11) unsigned NOT NULL,
  `monto` double unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`idSubasta` int(10) unsigned NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `idCategoria` int(10) unsigned DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `ganador` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idSubasta`, `nombre`, `descripcion`, `idUsuario`, `idCategoria`, `fechaInicio`, `fechaFin`, `ganador`) VALUES
(5, 'Computadora', 'Una computadora para vender', 1, 2, '2015-06-02', '2015-06-18', NULL),
(6, 'Heladera', 'Una heladera nueva, con refrigerador', 5, 2, '2015-06-04', '2015-06-08', NULL),
(7, 'Televisor', 'Televisor pantalla plana de 32''''', 8, 2, '2015-06-01', '2015-06-07', NULL),
(8, 'Netbook', 'Netbook del gobierno pa'' juga'' al conter', 8, 2, '2015-06-01', '2015-06-16', NULL),
(9, 'Fiat 600', 'Fitito para irse de gira con los pibe', 1, 1, '2015-05-27', '2015-06-06', NULL),
(10, 'Chevrolet Astra', 'A gas', 6, NULL, '2015-06-03', '2015-06-11', NULL),
(11, 'Renault 18', 'Patente nueva', 7, NULL, '2015-05-23', '2015-06-26', NULL),
(12, 'Monitor de PC', 'Nuevo 21''', 5, 2, '2015-06-01', '2015-06-12', NULL),
(13, 'Camioneta Amarok', 'Ultimo modelo 2015', 1, 1, '2015-05-31', '2015-06-14', NULL),
(14, 'Nebulizador', 'Excelente estado', 6, 2, '2015-06-04', '2015-06-30', NULL),
(15, 'Ford Escort', 'Color blanco, usado', 7, 1, '2015-05-29', '2015-06-17', NULL),
(16, 'Lavarropas', 'Automatico', 7, 2, '2015-05-26', '2015-06-09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(10) unsigned NOT NULL,
  `DNI` int(9) unsigned NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(20) unsigned NOT NULL,
  `userAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `DNI`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `userAdmin`) VALUES
(1, 36546888, 'Emiliano', 'Retamar', 'ejemplo@hotmail.com', 'hola', 'Calle Falsa 123', 4222244, 0),
(5, 4567788, 'Emi', 'Retamar', 'hola@hotmail.com', '1231435', 'sakdjkld', 12314, 0),
(6, 2132133, 'deh', 'dah', 'di@hotmail.com', '123', 'kasjdkla', 123, 0),
(7, 2, 'hi', 'ho', 'hu', '123', 'sdj', 123, 0),
(8, 0, '', '', '', '', '', 0, 0),
(9, 577783472, 'dsadas', 'aldsjflakjs', 'aklsdj@akldsjaks', '123', 'kaljds', 0, 0),
(10, 34994585, 'Deh', 'Dah', 'askld|@gmail.com', '123', 'fuck', 14677, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`idComentario`), ADD KEY `idSubasta` (`idSubasta`), ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
 ADD PRIMARY KEY (`idOferta`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idSubasta` (`idSubasta`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
 ADD PRIMARY KEY (`idSubasta`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `DNI` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `idCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idComentario` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `idOferta` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `idSubasta` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `subasta_comentario` FOREIGN KEY (`idSubasta`) REFERENCES `subasta` (`idSubasta`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_comentario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
ADD CONSTRAINT `subasta_oferta` FOREIGN KEY (`idSubasta`) REFERENCES `subasta` (`idSubasta`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_oferta` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subasta`
--
ALTER TABLE `subasta`
ADD CONSTRAINT `categoria_subasta` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE SET NULL ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_subasta` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
