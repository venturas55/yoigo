-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-07-2019 a las 07:44:13
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yoigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `tienda` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_pregunta` int(5) NOT NULL,
  `respuesta` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de evaluaciones';

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`tienda`, `id_pregunta`, `respuesta`) VALUES
('MasLife', 1001, 'bien'),
('MasLife', 1002, 'regular'),
('MasLife', 1003, 'bien'),
('MasLife', 1004, 'regular'),
('MasLife', 1005, 'bien'),
('MasLife', 2001, 'regular'),
('MasLife', 2002, 'bien'),
('MasLife', 2003, 'regular'),
('MasLife', 2004, 'bien'),
('MasLife', 2005, 'regular'),
('MasLife', 2006, 'bien'),
('MasLife', 2007, 'regular'),
('MasLife', 3001, 'bien'),
('MasLife', 3002, 'regular'),
('MasLife', 3011, 'bien'),
('MasLife', 3012, 'regular'),
('MasLife', 4001, 'bien'),
('MasLife', 4002, 'regular'),
('MasLife', 4003, 'bien'),
('MasLife', 4004, 'regular'),
('YOIGO', 1001, 'bien'),
('YOIGO', 1002, 'bien'),
('YOIGO', 1003, 'bien'),
('YOIGO', 1004, 'bien'),
('YOIGO', 1005, 'bien'),
('YOIGO', 2001, 'bien'),
('YOIGO', 2002, 'bien'),
('YOIGO', 2003, 'bien'),
('YOIGO', 2004, 'bien'),
('YOIGO', 2005, 'bien'),
('YOIGO', 2006, 'bien'),
('YOIGO', 2007, 'bien'),
('YOIGO', 3001, 'bien'),
('YOIGO', 3002, 'bien'),
('YOIGO', 3011, 'bien'),
('YOIGO', 3012, 'bien'),
('YOIGO', 4001, 'bien'),
('YOIGO', 4002, 'bien'),
('YOIGO', 4003, 'bien'),
('YOIGO', 4004, 'bien'),
('yoigo2', 1001, 'mal'),
('yoigo2', 1002, 'mal'),
('yoigo2', 1003, 'mal'),
('yoigo2', 1004, 'mal'),
('yoigo2', 1005, 'bien'),
('yoigo2', 2001, 'mal'),
('yoigo2', 2002, 'mal'),
('yoigo2', 2003, 'mal'),
('yoigo2', 2004, 'mal'),
('yoigo2', 2005, 'mal'),
('yoigo2', 2006, 'bien'),
('yoigo2', 2007, 'bien'),
('yoigo2', 3001, 'bien'),
('yoigo2', 3002, 'bien'),
('yoigo2', 3011, 'bien'),
('yoigo2', 3012, 'bien'),
('yoigo2', 4001, 'bien'),
('yoigo2', 4002, 'bien'),
('yoigo2', 4003, 'bien'),
('yoigo2', 4004, 'bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(5) NOT NULL,
  `pregunta` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `peso` int(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de preguntas';

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `peso`) VALUES
(1001, 'Rotulo', 1),
(1002, 'Escaparate', 1),
(1003, 'Limpieza de la tienda', 1),
(1004, 'PLV y maquetas', 1),
(1005, 'Carrito exterior', 1),
(2001, 'Revistas selladas', 1),
(2002, 'Yoigo note', 1),
(2003, 'Tele marqueting', 1),
(2004, 'Objetivos diarios actualizados (plantilla)', 1),
(2005, 'Documentación subida', 1),
(2006, 'Contratos bloqueados', 1),
(2007, 'Oferta tactica', 1),
(3001, 'Uniforme', 1),
(3002, 'Chapa identificativa', 1),
(3011, 'Barba arreglada', 1),
(3012, 'Maquillaje. Pelo recogido', 1),
(4001, 'Stock cuadrado', 1),
(4002, 'Traspasos realizados', 1),
(4003, 'Pedidos introducidos en el sistema', 1),
(4004, 'Ingresos cajas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ubicacion` varchar(70) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de tiendas';

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`nombre`, `ubicacion`, `observacion`) VALUES
('MasLife', 'Lebara', 'nueva'),
('YOIGO', 'PUERTO', 'ABIERTA'),
('yoigo2', 'port2', 'cerrrada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`tienda`,`id_pregunta`),
  ADD KEY `pregunta_FK` (`id_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `pregunta_FK` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `tienda_FK` FOREIGN KEY (`tienda`) REFERENCES `tiendas` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
