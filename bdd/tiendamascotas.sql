-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2021 a las 18:36:23
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendamascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliId` int(11) NOT NULL,
  `cliNombre` varchar(100) NOT NULL,
  `cliCedula` varchar(20) NOT NULL,
  `cliUsuario` varchar(50) NOT NULL,
  `cliContraseña` varchar(50) NOT NULL,
  `cliCorreo` varchar(128) NOT NULL,
  `cliTelefono` varchar(20) NOT NULL,
  `cliDirección` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliId`, `cliNombre`, `cliCedula`, `cliUsuario`, `cliContraseña`, `cliCorreo`, `cliTelefono`, `cliDirección`) VALUES
(1, 'Alexander Vallejo', '1726770659', 'alex', '12345678', 'alex@hotmail.com', '0980490759', 'Quitumbe'),
(2, 'Diego Quimbita', '1726770659', 'diego', '12345678', 'diego@hotmail.com', '0980490758', 'Quitumbe'),
(3, 'Renato Rodriguez', '1726770658', 'renato', '12345678', 'renato@hotmail.com', '0980490757', 'Quitumbe'),
(4, 'Andres Solarte', '1726770657', 'andre', '12345678', 'andres@hotmail.com', '0980490756', 'Quitumbe'),
(5, 'Margaret Pullupaxi', '1726770656', 'margaret', '12345678', 'margaret@hotmail.com', '0980490755', 'Quitumbe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleorden`
--

CREATE TABLE `detalleorden` (
  `detId` int(11) NOT NULL,
  `ordId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL,
  `especie` varchar(200) NOT NULL,
  `raza` varchar(200) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fechaNacimeinto` date NOT NULL,
  `estado` enum('1','0') DEFAULT NULL,
  `rutaFoto` varchar(200) DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `especie`, `raza`, `detalle`, `fechaNacimeinto`, `estado`, `rutaFoto`, `precio`) VALUES
(1, 'Felino', 'Angora', 'Gato Angora Educado', '2021-06-01', '1', 'img/archivos/7.jpg', 25.00),
(3, 'Felino', 'Angora Turco', 'Gato Angora Turco Dormilon', '2021-05-18', '1', 'img/archivos/9.jpg', 75.00),
(4, 'Canino', 'Chiguagua', 'Perro Chiguagua Enojon', '2021-05-14', '1', 'img/archivos/10.jpg', 60.00),
(5, 'Canino', 'Pitbull Blue', 'Pitbull blue grande', '2021-05-17', '1', 'img/archivos/5.jpg', 150.00),
(6, 'Felino', 'Gato Egipcio', 'Gato Egipcio Pequeño', '2021-06-01', '1', 'img/archivos/6.jpeg', 80.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ordId` int(11) NOT NULL,
  `cliid` int(11) NOT NULL,
  `ordPrecioTotal` decimal(10,2) NOT NULL,
  `ordFechaCreacion` date NOT NULL,
  `ordFechaModificacion` date NOT NULL,
  `ordEstado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliId`);

--
-- Indices de la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD PRIMARY KEY (`detId`),
  ADD KEY `ordId` (`ordId`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ordId`),
  ADD KEY `cliid` (`cliid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  MODIFY `detId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ordId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD CONSTRAINT `detalleorden_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mascota` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleorden_ibfk_2` FOREIGN KEY (`ordId`) REFERENCES `orden` (`ordId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`cliid`) REFERENCES `clientes` (`cliId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
