-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 05:09:00
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `idmed` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dosis` varchar(50) DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`idmed`, `nombre`, `dosis`, `iduser`) VALUES
(13, 'Medicamento X', '2 pastillas diarias', 18),
(14, 'Medicamento Y', '1 pastilla diaria', 18),
(15, 'Medicamento J', '450mg por día', 19),
(16, 'Medicamento D', '1 pastilla diaria', 19),
(17, 'Medicamento T', '1 cada 8 horas', 20),
(18, 'Medicamento R', '2 pastillas matutinas', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_viaje`
--

CREATE TABLE `user_viaje` (
  `iduv` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idviaje` int(11) NOT NULL,
  `pago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_viaje`
--

INSERT INTO `user_viaje` (`iduv`, `iduser`, `idviaje`, `pago`) VALUES
(94, 18, 6, 0),
(95, 19, 5, 0),
(96, 20, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `nacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `es_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `dni`, `nacimiento`, `telefono`, `pass`, `es_admin`) VALUES
(11, 'Agustín', 'Coronel', 39121961, '1997-03-03', 4375633, '$2y$10$gpGmslMtV7//9agwRbzcp.YHwD.YuJFQOHvY5g1qrSL0856u4fBQy', 1),
(18, 'Maria', 'Perez', 17555521, '1945-04-06', 4303032, '$2y$10$Tvg0Am/2VtXTWUvDpoaIUeIyiXYMf8CrkBQtkpkcB7g27lftAd.Rm', 0),
(19, 'Juan', 'Martinez', 2433268, '1953-09-12', 4592136, '$2y$10$baubIswu58Bt0hsJYQMr5.GJ0MIgxFgI4ee.rpE1BM1nrDoCVAUlG', 0),
(20, 'Ricardo', 'Gomez', 10178266, '1973-06-23', 4264365, '$2y$10$OL9gpBfzcYC2GhiMZ8hrZ.pe4472laCLz/WzaLibAgYz5Q17Q3R5O', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `fsalida` date NOT NULL,
  `fllegada` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `hotel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `destino`, `fsalida`, `fllegada`, `descripcion`, `precio`, `hotel`) VALUES
(5, 'Mar del Plata', '2020-01-06', '2020-01-17', 'Viaje a la Playa', 30000, 'El Marplatense'),
(6, 'Mendoza', '2020-02-21', '2020-03-03', 'Viaje a tomar vinito', 40000, 'El Mendocino'),
(7, 'Buenos Aires', '2020-03-30', '2020-04-04', 'Viaje a el Obelisco', 15000, 'El Porteño'),
(8, 'Ushuaia', '2020-03-30', '2020-04-04', 'Viaje para tener Frío', 70000, 'El Fueguino'),
(9, 'Posadas', '2019-12-04', '2019-12-23', 'Viaje para tener Calor', 60000, 'El Misionero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`idmed`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `user_viaje`
--
ALTER TABLE `user_viaje`
  ADD PRIMARY KEY (`iduv`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idviaje` (`idviaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `idmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user_viaje`
--
ALTER TABLE `user_viaje`
  MODIFY `iduv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `user_viaje`
--
ALTER TABLE `user_viaje`
  ADD CONSTRAINT `user_viaje_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `user_viaje_ibfk_2` FOREIGN KEY (`idviaje`) REFERENCES `viajes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
