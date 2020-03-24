-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2020 a las 16:24:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `anyo` int(5) NOT NULL,
  `duracion` int(10) NOT NULL,
  `director` varchar(50) NOT NULL,
  `origen` varchar(50) NOT NULL,
  `calificacion` enum('Todas las edades','+7','+12','+16','+18','XXX') NOT NULL,
  `reparto` varchar(1000) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `productora` varchar(50) NOT NULL,
  `genero` enum('Accion','Ciencia Ficcion','Drama','Terror','Thriller','Romance','Aventuras','Musical','Belica','Comedia','Oeste','Infantiles','Adultas') NOT NULL,
  `Sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `anyo`, `duracion`, `director`, `origen`, `calificacion`, `reparto`, `imagen`, `productora`, `genero`, `Sinopsis`) VALUES
(1, 'Regreso al futuro', 1985, 116, 'Robert Zemeckis', 'Estados Unidos', 'Todas las edades', 'Michael J. Fox, Christopher Lloyd, Lea Thompson, Crispin Glover, Claudia Wells, Thomas F. Wilson, James Tolkan, Billy Zane, Sachi Parker', 'direccion de la imagen', 'Universal Pictures / Amblin Entertainment', 'Ciencia Ficcion', 'El adolescente Marty McFly es amigo de Doc, un científico al que todos toman por loco. Cuando Doc crea una máquina para viajar en el tiempo, un error fortuito hace que Marty llegue a 1955, año en el que sus futuros padres aún no se habían conocido. Después de impedir su primer encuentro, deberá conseguir que se conozcan y se casen; de lo contrario, su existencia no sería posible.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
