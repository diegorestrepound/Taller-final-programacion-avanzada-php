-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2020 a las 04:25:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgenero`
--

CREATE TABLE `tblgenero` (
  `idgenero` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblgenero`
--

INSERT INTO `tblgenero` (`idgenero`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhistorias`
--

CREATE TABLE `tblhistorias` (
  `idhistoria` int(10) NOT NULL,
  `paciente` int(20) NOT NULL,
  `medico` int(20) NOT NULL,
  `observacion` text NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblhistorias`
--

INSERT INTO `tblhistorias` (`idhistoria`, `paciente`, `medico`, `observacion`, `fecha`) VALUES
(23423, 234563456, 23543342, 'Fiebre', '2020-03-03'),
(546566, 1234567894, 132557886, 'Problema respiratorio', '2020-03-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicos`
--

CREATE TABLE `tblmedicos` (
  `numerodocumento` int(20) NOT NULL,
  `tipodoc` int(3) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmedicos`
--

INSERT INTO `tblmedicos` (`numerodocumento`, `tipodoc`, `nombre`) VALUES
(23543342, 1, 'Juan Pablo'),
(132557886, 1, 'Jose Lopez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpacientes`
--

CREATE TABLE `tblpacientes` (
  `numerodocumento` int(10) NOT NULL,
  `tipodoc` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` int(3) NOT NULL,
  `edad` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpacientes`
--

INSERT INTO `tblpacientes` (`numerodocumento`, `tipodoc`, `nombre`, `apellido`, `genero`, `edad`) VALUES
(234563456, 1, 'Juan Jose', 'Jurado', 1, 19),
(1234567894, 1, 'Carlos', 'Zapata', 1, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipodocumento`
--

CREATE TABLE `tbltipodocumento` (
  `idtipodoc` int(3) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltipodocumento`
--

INSERT INTO `tbltipodocumento` (`idtipodoc`, `nombre`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta De Identidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblgenero`
--
ALTER TABLE `tblgenero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `tblhistorias`
--
ALTER TABLE `tblhistorias`
  ADD PRIMARY KEY (`idhistoria`),
  ADD KEY `paciente` (`paciente`),
  ADD KEY `medico` (`medico`);

--
-- Indices de la tabla `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD PRIMARY KEY (`numerodocumento`),
  ADD KEY `tipodoc` (`tipodoc`);

--
-- Indices de la tabla `tblpacientes`
--
ALTER TABLE `tblpacientes`
  ADD PRIMARY KEY (`numerodocumento`),
  ADD KEY `tipodoc` (`tipodoc`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  ADD PRIMARY KEY (`idtipodoc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblgenero`
--
ALTER TABLE `tblgenero`
  MODIFY `idgenero` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  MODIFY `idtipodoc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblhistorias`
--
ALTER TABLE `tblhistorias`
  ADD CONSTRAINT `tblhistorias_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `tblpacientes` (`numerodocumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblhistorias_ibfk_2` FOREIGN KEY (`medico`) REFERENCES `tblmedicos` (`numerodocumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD CONSTRAINT `tblmedicos_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblpacientes`
--
ALTER TABLE `tblpacientes`
  ADD CONSTRAINT `tblpacientes_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblpacientes_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `tblgenero` (`idgenero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
