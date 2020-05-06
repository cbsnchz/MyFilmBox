-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 18:27:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreUsuario`, `nombre`, `password`, `rol`) VALUES
(1, 'chbalbas@ucm.es', 'Christian Balbás', '$2y$10$TV5rVVtg8MbtSnKnEm6/wuueUv09jiddeRl0zLT6L6QBt6cPNgVaS', 'admin'),
(2, 'terfer02@ucm.es', 'teresa fernandez merino', '$2y$10$9Ybw1l5TMgy/ba5UL4/Dpukjc59/UimBP3Yv./me7dt7gDCjR7sl6', 'admin'),
(3, 'davfer13@ucm.es', 'David Fernández', '$2y$10$PO2gP8rTPf9/sGpG8Ohv4O2dHeAUTWMqqW2kKz.UbOvVd7uX4XyMu', 'admin'),
(5, 'usuario1@gmail.com', 'Usuario1', '$2y$10$LNaq3jonGnFc.j6P3p3p9.UgJtPMUw0.jXo4JyDjNoxTAWr90okom', 'user'),
(6, 'profeusuario@gmail.com', 'Profe Usuario', '$2y$10$Bhn4zNB4l5kBtXaABfY5pe1V/w.f0pZXIj1OF3TkRVBv.UY9DxEGa', 'user'),
(7, 'profeadmin@gmail.com', 'Profe Admin', '$2y$10$ts4PkT3MF/0E/WON3vwbkO.TnilH0VClR3.SSloPIV/A/9/kooW6O', 'admin'),
(8, 'profecritico@gmail.com', 'Profe Critico', '$2y$10$RvTS.X7.1Ym/6TEYerWTg.QwD74N7E62r3e1mx6dKtYW7DRAqgnje', 'critico'),
(9, 'cinefilo1@gmail.com', 'Cinéfilo1', '$2y$10$a5KeNwoc70aloaU3mpX1nuKALnTUsR28ZsQK2eE6INRLexySRIFQi', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
