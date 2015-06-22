-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2015 a las 07:12:21
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
  `nombreCategoria` varchar(50) NOT NULL,
  `nombreImagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `nombreImagen`) VALUES
(1, 'Vehículos', 'categoria_vehiculos.jpg'),
(2, 'Electrodomésticos', 'categoria_electrodomesticos.jpg'),
(3, 'Computación', 'categoria_computacion.jpg'),
(4, 'Teléfonos', 'categoria_telefonos.jpg'),
(5, 'Ropa, Moda y Belleza', 'categoria_ropa_moda_y_belleza.jpg'),
(6, 'Deportes', 'categoria_deporte.jpg'),
(7, 'Libros', 'categoria_libros.jpg'),
(8, 'Entretenimiento', 'categoria_entretenimiento.jpg'),
(9, 'Inmuebles', 'categoria_inmuebles.jpg'),
(10, 'Animales', 'categoria_animales.jpg'),
(11, 'Servicios', 'categoria_servicios.jpg'),
(12, 'Hogar', 'categoria_hogar.jpg');

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
  `argumento` varchar(140) NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `idSubasta` int(11) unsigned NOT NULL,
  `monto` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idOferta`, `argumento`, `idUsuario`, `idSubasta`, `monto`) VALUES
(7, 'Necesito para cabalgarla desde Los Andes hasta Mexico', 1, 25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`idSubasta` int(10) unsigned NOT NULL,
  `nombreSubasta` varchar(30) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `idCategoria` int(10) unsigned DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `ganador` int(10) unsigned DEFAULT NULL,
  `nombreImagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idSubasta`, `nombreSubasta`, `descripcion`, `idUsuario`, `idCategoria`, `fechaInicio`, `fechaFin`, `ganador`, `nombreImagen`) VALUES
(20, 'Espejo', 'Espejo sin marco. Medidas: 0.8m x 1.2m', 5, 12, '2015-06-01', '2015-06-29', NULL, 'espejo.jpg'),
(21, 'Silla', 'Silla donde se sentó Freddie Mercury una vez', 6, 12, '2015-06-03', '2015-06-07', NULL, 'silla.jpg'),
(22, 'Aceite y vinagre', '200ml de aceite y 300ml de vinagre. No incluye fascos', 8, 12, '2015-06-05', '2015-06-15', NULL, 'aceitevinagre.jpg'),
(25, 'Llama ', 'Llama adulta oriunda de Tilcara. Es mansita', 10, 10, '2015-06-04', '2015-07-03', NULL, 'llama.jpg'),
(26, 'Guante ', 'Guante de malla de acero inox. tejido, anticorte, marca *manulatex* de industria francesa', 10, 5, '2015-06-03', '2015-07-01', NULL, 'guante.jpg'),
(27, 'Casa con faro', 'Bonita casa con vista al mar y un faro muy luminoso para orientar barquitos', 12, 9, '2015-06-04', '2015-06-30', NULL, 'faro.jpg'),
(28, 'Cama', 'Cama de roble. Dos plazas.', 6, 12, '2015-06-03', '2015-06-30', NULL, 'cama.jpg'),
(29, 'Citroen 3CV', 'Modelo 79. Está como nuevo.', 1, 1, '2015-05-07', '2015-06-01', NULL, 'citroen.jpg'),
(34, 'Mochila de tela', 'Marca Mochilona. Medidas 60x40x30.', 8, 12, '2015-05-28', '2015-06-15', NULL, 'mochila.jpg'),
(35, 'Llave', 'Llave de aleación. Me la encontré en la vereda.', 12, 12, '2015-05-24', '2015-06-21', NULL, 'llave.jpg'),
(37, 'Libro raro', 'No tiene nombre en la tapa. No entiendo que dicen los textos. Parece viejo.', 5, 7, '2015-05-17', '2015-06-08', NULL, 'libro.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `DNI`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `userAdmin`) VALUES
(1, 36546888, 'Emiliano', 'Retamar', 'ejemplo@hotmail.com', 'hola', 'Calle Falsa 123', 4222244, 0),
(5, 4567788, 'Emi', 'Retamar', 'hola@hotmail.com', '1231435', 'sakdjkld', 12314, 0),
(6, 2132133, 'deh', 'dah', 'di@hotmail.com', '123', 'kasjdkla', 123, 0),
(8, 0, '', '', '', '', '', 0, 0),
(10, 34994585, 'Deh', 'Dah', 'askld|@gmail.com', '123', 'fuck', 14677, 0),
(12, 33333333, 'fa', 'fa', 'f@f', '123456', 'fa', 0, 0),
(13, 11111111, 'aa', 'aa', 'a@a.com', '123456', 'a', 12345678, 0);

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
MODIFY `idCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idComentario` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `idOferta` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `idSubasta` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
