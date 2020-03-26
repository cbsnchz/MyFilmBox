-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2020 a las 18:04:43
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
  `imagen` varchar(100) NOT NULL,
  `productora` varchar(100) NOT NULL,
  `genero` enum('Accion','Ciencia Ficcion','Drama','Terror','Thriller','Romance','Aventuras','Musical','Belica','Comedia','Oeste','Infantiles','Adultas') NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `anyo`, `duracion`, `director`, `origen`, `calificacion`, `reparto`, `imagen`, `productora`, `genero`, `sinopsis`) VALUES
(1, 'Regreso al futuro', 1985, 116, 'Robert Zemeckis', 'Estados Unidos', 'Todas las edades', 'Michael J. Fox, Christopher Lloyd, Lea Thompson, Crispin Glover, Claudia Wells, Thomas F. Wilson, James Tolkan, Billy Zane, Sachi Parker', 'img/regresoalfuturo.jpg', 'Universal Pictures / Amblin Entertainment', 'Ciencia Ficcion', 'El adolescente Marty McFly es amigo de Doc, un científico al que todos toman por loco. Cuando Doc crea una máquina para viajar en el tiempo, un error fortuito hace que Marty llegue a 1955, año en el que sus futuros padres aún no se habían conocido. Después de impedir su primer encuentro, deberá conseguir que se conozcan y se casen; de lo contrario, su existencia no sería posible.'),
(2, 'Togo', 2019, 113, 'Ericson Core', 'Estados Unidos', '+7', 'Willem Dafoe, Julianne Nicholson, Christopher Heyerdahl, Richard Dormer, Adrien Dorval, Madeline Wickins, Michael Greyeyes, Nive Nielsen, Nikolai Nikolaeff, Thorbjørn Harr, Catherine McGregor, Michael McElhatton, Brandon Oakes, Paul Piaskowski, Michael Gaston, Shaun Benson, Jamie McShane, Sean Hoy, Tom Carey, Chad Nobert, Malik McCall, Mark Krysko, Elena Porter, Dave Trimble, Barb Mitchell, Steven McCarthy, Sarah Wheeldon', 'img/togo.jpg', 'Walt Disney Pictures. Distribuida por Disney+', 'Aventuras', 'Cuenta la historia de Togo, un perro de trineos que ganó la carrera más importante de esta disciplina en 1925 pese a haber sido considerado incapaz de terminarla siquiera debido a su pequeño tamaño.'),
(3, 'Sinister', 2012, 110, 'Scott Derrickson', 'Estados Unidos', '+18', 'Ethan Hawke, James Ransone, Juliet Rylance, Vincent D\'Onofrio, Fred Dalton Thompson, Clare Foley, Michael Hall D\'Addario, Victoria Leigh', 'img/sinister.jpg', 'Automatik Entertainment / Blumhouse Productions / ', 'Terror', 'Un periodista viaja con su familia a lo largo y ancho del país para investigar terribles asesinatos que luego convierte en libros. Cuando llega a una casa donde ha tenido lugar el asesinato de una familia, encuentra una cinta que desvela horribles pistas que van más allá del esclarecimiento de la tragedia. (FILMAFFINITY)'),
(4, 'Pocahontas', 1995, 78, 'Mike Gabriel, Eric Goldberg', 'Estados Unidos', 'Todas las edades', 'Animacion', 'img/pocahontas.jpg', 'Walt Disney Pictures', 'Infantiles', 'Pocahontas, la hija del Jefe Powhatan, vigila la llegada de un gran grupo de colonos ingleses, guiados por el ambicioso gobernador Radcliff y el valiente capitán John Smith. Con su juguetón compañero Meeko, un travieso mapache, y con Flit, un alegre pájaro, Pocahontas entabla una fuerte amistad con el Capitán Smith. Pero cuando empiezan a surgir tensiones entre las dos culturas, Pocahontas recurre a la sabiduría de la Abuela Sauce para encontrar una manera de lograr la paz entre su pueblo y los conquistadores.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
