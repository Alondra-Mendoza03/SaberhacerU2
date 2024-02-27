-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2024 a las 02:06:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `matricula` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`matricula`, `password`) VALUES
('21045140', ''),
('21045111', ''),
('', ''),
('21045826', ''),
('123456', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id` int(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `grupo` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `carrera`, `matricula`, `grupo`, `clave`) VALUES
(1, 'Seguridad informatica', 'Desarrollo de software', '21045632', '7IDSMA', '$2y$10$csL.uuOwJ1WUYOaeNHomge3scLSdhsFHECLce2hH999'),
(2, 'Metodologias para el desarrollo', 'Desarrollo de software', '21045111', '2TIDSM', '$2y$10$3F/qQyrE1cfabB7CbVTI5.TfQMyTbRrvNg/t6gSqWdb'),
(3, 'Experiencia de usuario', 'Entornos virtuales', '21045198', '3TSIDS', '$2y$10$Qu.eQnx.w.zb36TIYxYEQuR4k7utfkXFvHwTYB4E3wC'),
(4, 'Seguridad informatica II', 'ING. Desarrollo y Gesti[on de Software', '214520', '7IDGSA', '$2y$10$NDtzNG8xOQ5nJXlR.InUvelPFb4KkV52ASvlAc5uaie');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
