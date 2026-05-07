-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2026 a las 15:20:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `silvercord`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `artista` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `portada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `artista`, `nombre`, `portada`) VALUES
(1, 'Ghost', 'Impera', 'Recursos/Impera.jpg'),
(2, 'Gojira', 'The Way Of All Flesh', 'Recursos/TWOAF.jpg'),
(3, 'Jinjer', 'Duél', 'Recursos/Duel.jpg'),
(4, 'Lorna Shore', 'And I Return To Nothingness', 'Recursos/AIRTN.jpg'),
(5, 'Ghost', 'Skeletá', 'Recursos/Skeleta.jpg'),
(6, 'Gojira', 'From Mars To Sirius', 'Recursos/FMTS.jpg'),
(7, 'Subvision', 'So Far So Noir', 'Recursos/SFSN.jpeg'),
(8, 'Imperial Triumphant', 'Goldstar', 'Recursos/Goldstar.jpg'),
(9, 'Tobias Forge', 'Passiflora', 'Recursos/Passiflora.png'),
(10, 'Magna Carta Cartel', 'The Dying Option', 'Recursos/TDO.jpg'),
(11, 'Slipknot', 'Iowa', 'Recursos/Iowa.jpg'),
(12, 'Repugnant', 'Epitome Of Darkness', 'Recursos/EOD.jpg'),
(15, 'Magna Carta Cartel', 'Good Morning Restrained', 'Recursos/GMR.jpg'),
(16, 'Jinjer', 'Wallflowers', 'Recursos/Wallflowers.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `id_album`, `id_usuario`, `fecha`) VALUES
(1, 1, 1, '2026-05-05 05:53:43'),
(2, 2, 1, '2026-05-05 05:55:36'),
(3, 3, 1, '2026-05-05 06:07:35'),
(4, 4, 1, '2026-05-05 06:08:35'),
(5, 5, 1, '2026-05-05 06:11:07'),
(6, 6, 1, '2026-05-05 06:11:37'),
(7, 7, 1, '2026-05-05 06:12:37'),
(8, 8, 1, '2026-05-05 06:17:13'),
(9, 9, 1, '2026-05-05 06:17:53'),
(10, 10, 1, '2026-05-05 06:18:37'),
(11, 11, 1, '2026-05-05 06:19:16'),
(12, 12, 1, '2026-05-05 06:20:37'),
(15, 15, 1, '2026-05-05 20:03:48'),
(16, 16, 10, '2026-05-05 23:20:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `numero` varchar(19) NOT NULL,
  `vencimiento` varchar(5) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `nombre`, `apellidos`, `numero`, `vencimiento`, `cvv`, `id_usuario`) VALUES
(1, 'Leopoldo Javier', 'Hermosillo Corrales', '1234-5678-1234-5678', '10/26', '388', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `contrasena`) VALUES
(1, 'Leopoldo Javier', 'Hermosillo Corrales', 'leopoldojavih@gmail.com', '$2y$10$Ybb/jK6QfN0wkPuzR8.JI.MmUaOHM0Ztt8GqKKZfipnM5urW4gPDe'),
(10, 'Adin Benjamin', 'Josuewosky Luna', 'adinbenjamin67@gmail.com', '$2y$10$9ULu4NoK/wiYG6z75KUK9.X6P7r5V5Z7E8UwvwekSNvA87/DLLdqe'),
(12, 'Jennifer', 'Cordova', 'cordovaJ34@gmail.com', '$2y$10$l65Oa2PkP2tbyQ5hpsdZcOfIG0phOvgCVdJeGphIKw/zQDj9YH8Vu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_ibfk_1` (`id_album`),
  ADD KEY `registros_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
