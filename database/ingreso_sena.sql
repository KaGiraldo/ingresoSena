-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2022 a las 23:01:45
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingreso_sena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `serial` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `pertenece` varchar(20) NOT NULL,
  `autorizado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_ingreso_salida`
--

CREATE TABLE `fecha_ingreso_salida` (
  `id` bigint(20) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `idIS` bigint(20) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_salida`
--

CREATE TABLE `ingreso_salida` (
  `idIS` bigint(20) NOT NULL,
  `cedula` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id` int(15) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `sede` varchar(150) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `sede`, `contrasena`) VALUES
(1, 123456789, 'Brayan Jesus', 'Charris Cantillo', 'brayan@misena.edu.co', '2', 'sena123'),
(2, 1007976835, 'Kristopher', 'Giraldo', 'kagiraldo538@misena.edu.co', '1', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`serial`);

--
-- Indices de la tabla `fecha_ingreso_salida`
--
ALTER TABLE `fecha_ingreso_salida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_salida`
--
ALTER TABLE `ingreso_salida`
  ADD PRIMARY KEY (`idIS`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fecha_ingreso_salida`
--
ALTER TABLE `fecha_ingreso_salida`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_salida`
--
ALTER TABLE `ingreso_salida`
  MODIFY `idIS` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
