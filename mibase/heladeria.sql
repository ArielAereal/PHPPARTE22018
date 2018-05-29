-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2018 a las 00:02:13
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heladeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `nacionalidad` varchar(256) NOT NULL,
  `sexo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nombre` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helados`
--

CREATE TABLE `helados` (
  `id_helado` int(11) NOT NULL,
  `sabor` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `tipo` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `idLocal` int(11) NOT NULL,
  `dirección` varchar(50) NOT NULL,
  `idLocalidad` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idLocalidad` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `helados`
--
ALTER TABLE `helados`
  ADD PRIMARY KEY (`id_helado`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idLocal`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `helados`
--
ALTER TABLE `helados`
  MODIFY `id_helado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
