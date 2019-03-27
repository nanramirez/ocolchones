-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 20:51:04
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocolchones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(10) NOT NULL,
  `tipoTransporte` varchar(50) NOT NULL,
  `cantidadUnidades` int(10) NOT NULL,
  `nombreUnidad` varchar(50) NOT NULL,
  `costoPorUnidad` float NOT NULL,
  `descuento` float NOT NULL,
  `importe` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `tipoTransporte`, `cantidadUnidades`, `nombreUnidad`, `costoPorUnidad`, `descuento`, `importe`, `iva`, `total`, `fecha`) VALUES
(1, 'Ferrocarril', 150, 'PRISA', 10, 0, 1500, 240, 1740, '03/27/19 12:03:55'),
(2, 'Barco', 150, 'TMC', 10, 20, 1220, 195.2, 1415.2, '03/27/19 12:08:53'),
(3, 'Barco', 150, 'DG', 10, 20, 1220, 195.2, 1415.2, '03/27/19 12:13:54'),
(4, 'Barco', 150, 'KUGAR', 10, 20, 1220, 195.2, 1415.2, '03/27/19 12:24:05'),
(5, 'Ferrocarril', 150, 'PRISA', 10, 0, 1500, 240, 1740, '03/27/19 12:26:47'),
(6, 'Barco', 150, 'TMC', 10, 20, 1220, 195.2, 1415.2, '03/27/19 19:19:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
