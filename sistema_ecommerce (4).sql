-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2023 a las 23:26:28
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_completo`, `email`, `clave`) VALUES
(1, 'dagoberto Alvarez', 'saulzuniga606@gmail.com', '$2y$10$YP6HqzJHbA3DXO4zI6hsZuufRgh8He0gynbqHsNPPpDBUlV0z4WpG'),
(2, 'fernando miguel zuniga', 'saulzuniga810@gmail.com', '$2y$10$s0O8zHDegBBGYKATE2r24.0HLpELOsIOV/ewFoQJLi0upI7nTUQam'),
(3, 'sau', 'sauzuniga2@gmail.com', '$2y$10$elirnoA07G5JB84wZsGJYOpvx8tArlwXOO/M7vX0XFOmrgxu2IuYG'),
(4, 'ramiro', 'sauzuniga707@gmail.com', '$2y$10$bBIbJPrBxORtB8MBU3c5SubuEEe9Dd6JjebKp.3PfROLm4dGkBl3u'),
(5, 'Isais Giron', 'saul1000@gmail.com', '$2y$10$EKyTuvNrPKHwCknBATezG.l5ftT7RfPsQWiTWMqWeutYZJ9cDioae'),
(6, 'Bryan', 'bryan606@gmail.com', '$2y$10$JSLdCh2R2iuhnvoF5BTfu.AueZ7aBPQwRiW1722.1OfpSYOP1oYni');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `Pregunta` text COLLATE utf8_spanish2_ci,
  `Respuesta` text COLLATE utf8_spanish2_ci,
  `Hora_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `Pregunta`, `Respuesta`, `Hora_creacion`) VALUES
(2, 'Â¿Cual es el color del cielo? ', '<div>Azul</div>', '2023-12-03 22:12:17'),
(3, 'Â¿Quienes son?', '<div>Una empresa de ecommerce</div>', '2023-12-03 22:14:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs_clientes`
--

CREATE TABLE `faqs_clientes` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `faqs_clientes`
--

INSERT INTO `faqs_clientes` (`id`, `pregunta`) VALUES
(1, 'Â¿Cuantos metodos de pago hay XD?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idped` int(11) NOT NULL,
  `iddusu` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `fecped` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `dirusuped` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telusuped` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idped`, `iddusu`, `idpro`, `fecped`, `estado`, `dirusuped`, `telusuped`) VALUES
(5, 3, 9, '2023-10-07 22:37:11', 2, 'rdr', 'srsrs'),
(6, 3, 9, '2023-10-08 21:23:59', 2, 'rdr', 'srsrs'),
(47, 3, 9, '2023-11-03 23:18:31', 2, 'ff', '2424'),
(48, 3, 8, '2023-11-03 23:18:42', 2, 'ff', '2424'),
(49, 3, 7, '2023-11-03 23:21:20', 2, 'el cuarisd', '42452424'),
(50, 3, 7, '2023-11-03 23:22:13', 2, 'ugbs', '43242'),
(51, 3, 6, '2023-11-03 23:24:14', 2, 'uni', '23456'),
(52, 3, 7, '2023-11-03 23:24:17', 2, 'uni', '23456'),
(53, 3, 8, '2023-11-03 23:24:20', 2, 'uni', '23456'),
(54, 3, 7, '2023-11-04 15:18:55', 2, 'calle el manuel', '424252'),
(55, 3, 7, '2023-11-04 16:06:28', 2, 'univovo', '4242424'),
(56, 3, 7, '2023-11-04 16:12:12', 2, 'el ugb', '34553563'),
(57, 3, 8, '2023-11-04 16:13:31', 2, 'el ugb', '34553563'),
(58, 3, 6, '2023-11-04 23:30:36', 2, 'el ugb', '34553563'),
(59, 3, 6, '2023-11-09 21:17:20', 2, 'el ugb', '34553563'),
(60, 3, 7, '2023-11-09 21:17:24', 2, 'el ugb', '34553563'),
(61, 3, 8, '2023-11-09 21:17:27', 2, 'el ugb', '34553563'),
(62, 3, 6, '2023-11-10 21:55:02', 2, 'el ugb', '34553563'),
(63, 6, 18, '2023-12-04 13:56:44', 2, 'el ugb', '34553563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nompro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `despro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `prepro` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rutimapro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nompro`, `despro`, `prepro`, `estado`, `rutimapro`) VALUES
(18, 'Mario and Luigi superstar saga', 'cartucho de gameboy advance', '10.00', 1, '20231202001706.jpg'),
(19, 'Resident evil 1', 'Juego de ps1', '40.00', 1, '20231202024121.jpg'),
(22, 'Discman sony', 'Primera generacion de discman', '10.00', 1, '20231202044646.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusu` int(11) NOT NULL,
  `nomusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apeusu` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emausu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pasusu` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idusu`, `nomusu`, `apeusu`, `emausu`, `pasusu`, `estado`) VALUES
(3, 'Ramiro', 'Villegas', 'Ramiro@gmail.com', 'agosto2001', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs_clientes`
--
ALTER TABLE `faqs_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idped`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `faqs_clientes`
--
ALTER TABLE `faqs_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
