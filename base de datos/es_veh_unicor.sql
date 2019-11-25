-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2019 a las 19:12:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `es_veh_unicor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AUTENTICACION`
--

CREATE TABLE `AUTENTICACION` (
  `ID` varchar(25) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `HASH` varchar(200) NOT NULL,
  `CODIGOVERIFICACION` varchar(50) DEFAULT NULL,
  `OLVIDOCONTRASENA` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AUTENTICACION`
--

INSERT INTO `AUTENTICACION` (`ID`, `USUARIO`, `HASH`, `CODIGOVERIFICACION`, `OLVIDOCONTRASENA`) VALUES
('111111111', 'usuario1', '$2y$10$grK0AEstTyAnj4.cbkN3jOAO8lhoJKW1.RW/xyVmlHe9kx1T2FoL2', NULL, 0),
('222222222', 'usuario2', '$2y$10$d99pPMLJecVqbiJLb8NDD.bfMNC4nuL3eNiEf5ClG09ZLT9MBcInS', NULL, 0),
('333333333', 'usuario3', '$2y$10$5K1x4ICeHuHbDjRUvNxgp.1tthAAfqWjMh423MDQ3Qopw9GoCwvpC', NULL, 0),
('444444444', 'usuario4', '$2y$10$KcNYDbTUqZRLNnk000mf3uH6onk0lIfmaVtZReHfSPOd1A3D95yk6', NULL, 0),
('555555555', 'usuario5', '$2y$10$1IaBb2Lle3AwdnBc6bZlAOWt6po0Fa8MSMhitQEUdwaBtZjmxhZky', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `ID` varchar(25) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `OCUPACION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`ID`, `NOMBRES`, `APELLIDOS`, `CORREO`, `OCUPACION`) VALUES
('111111111', 'Andrea', 'Almanza', 'correo1@gmail.com', 'estudiante'),
('222222222', 'Maria', 'Trujillo', 'correo2@gmail.com', 'estudiante'),
('333333333', 'Pedro', 'Rosales', 'correo3@gmail.com', 'estudiante'),
('444444444', 'Juan', 'Gomez', 'correo4@gmail.com', 'estudiante'),
('555555555', 'Romario', 'Fernandez', 'correo5@gmail.com', 'visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REGISTRO`
--

CREATE TABLE `REGISTRO` (
  `PLACA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `FECHA_ENT` varchar(100) NOT NULL,
  `FECHA_SAL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `REGISTRO`
--

INSERT INTO `REGISTRO` (`PLACA`, `MODELO`, `FECHA_ENT`, `FECHA_SAL`) VALUES
('USR100', 'AKT 200', '2018-08-05 0:46:48', '2019-08-05 09:06:05'),
('USR111', 'BOXER 001', '2019-08-05 07:47:08', '2019-08-05 08:19:52'),
('USR222', 'BEST 100', '2019-07-05 14:00:00', '2019-07-05 16:00:00'),
('USR300', 'ZUSUKI 100', '2019-07-05 08:00:00', '2019-07-05 15:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VEHICULO`
--

CREATE TABLE `VEHICULO` (
  `PLACA` varchar(6) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `VEHICULO`
--

INSERT INTO `VEHICULO` (`PLACA`, `MODELO`, `ID`) VALUES
('USR100', 'AKT 200', '111111111'),
('USR111', 'BOXER 001', '111111111'),
('USR200', 'YAMAHA 125', '222222222'),
('USR222', 'BEST 100', '222222222'),
('USR300', 'ZUSUKI 100', '333333333'),
('USR333', 'HERO HONDA', '333333333'),
('USR400', 'ZUSUKI 80', '444444444'),
('USR444', 'YAMAHA FZ', '444444444'),
('VIS123', 'TOYOTA PRADO', '555555555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIGILANTE`
--

CREATE TABLE `VIGILANTE` (
  `ID` varchar(25) NOT NULL,
  `ESTADO` tinyint(1) NOT NULL,
  `LUGAR_VIGILANCIA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AUTENTICACION`
--
ALTER TABLE `AUTENTICACION`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `REGISTRO`
--
ALTER TABLE `REGISTRO`
  ADD PRIMARY KEY (`PLACA`,`FECHA_ENT`);

--
-- Indices de la tabla `VEHICULO`
--
ALTER TABLE `VEHICULO`
  ADD PRIMARY KEY (`PLACA`),
  ADD KEY `ID_FK` (`ID`);

--
-- Indices de la tabla `VIGILANTE`
--
ALTER TABLE `VIGILANTE`
  ADD PRIMARY KEY (`ID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AUTENTICACION`
--
ALTER TABLE `AUTENTICACION`
  ADD CONSTRAINT `ID_FK_AUTH` FOREIGN KEY (`ID`) REFERENCES `PERSONA` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `REGISTRO`
--
ALTER TABLE `REGISTRO`
  ADD CONSTRAINT `PLACA_FK_REG` FOREIGN KEY (`PLACA`) REFERENCES `VEHICULO` (`PLACA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VEHICULO`
--
ALTER TABLE `VEHICULO`
  ADD CONSTRAINT `ID_FK` FOREIGN KEY (`ID`) REFERENCES `PERSONA` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VIGILANTE`
--
ALTER TABLE `VIGILANTE`
  ADD CONSTRAINT `ID_FK_VIG` FOREIGN KEY (`ID`) REFERENCES `PERSONA` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
