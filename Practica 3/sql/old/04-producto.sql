-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2020 a las 12:16:19
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
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `categoria` enum('pelicula','serie','accesorio','merchandicing') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id`, `nombre`, `precio`, `descripcion`, `imagen`, `categoria`) VALUES
(1, 'Cascos inalámbricos', 19.99, 'Cascos inalámbricos para conectar mediante bluetooth.', 'img/cascos.jpg', 'accesorio'),
(2, 'Pocahontas (Pelicula)', 15.4, 'DVD con la pelicula de pocahontas', 'img/pocahontasdvd.jpg', 'pelicula'),
(3, 'Gladiator película', 12.3, 'Gladiator (Gladiador en Hispanoamérica y Gladiator en España) es una película épica del género péplum y acción de 2000 dirigida por Ridley Scott y protagonizada por Russell Crowe, Joaquin Phoenix y Connie Nielsen. Crowe interpreta a Máximo Décimo Meridio, un leal general hispano del ejército del Imperio romano que es traicionado por Cómodo, el ambicioso hijo del emperador Marco Aurelio, quien ha asesinado a su padre y se ha hecho con el trono. Forzado a convertirse en esclavo, Máximo triunfa como gladiador mientras anhela vengar la muerte de su familia y la del emperador.', 'img/gladiatordvd.jpg', 'pelicula'),
(4, 'Suits (la clave del éxito)', 140.45, 'Mike Ross es un joven con una mente brillante que siempre ha soñado con ser abogado, pero un incidente desafortunado le impide cumplirlo. Naturalmente inteligente y con una memoria eidética, se gana la vida suplantando a otros en los exámenes de admisión para la escuela de derecho. Envuelto en un encargo de tráfico de drogas, Mike sospecha que le han tendido una trampa y consigue deshacerse de la policía al colarse en una entrevista de trabajo para uno de los bufetes más importantes de Nueva York (Pearson Hardman).\r\n\r\nHarvey Specter es el mejor abogado de Manhattan. Brillante, calculador, elegante y atractivo, Harvey tiene fama de ganar todos sus casos, aunque a veces recurra a su propia interpretación de las reglas y recientemente ha sido promovido a socio mayoritario de su bufete, y tiene derecho, por la política de la empresa, a contratar a un asociado. A pesar de no ser licenciado y de presentarse en la entrevista con un maletín lleno de marihuana, Mike consigue impresionar a Harvey, demostrándole que posee un conocimiento enciclopédico del derecho.', 'img/suits.jpg', 'serie'),
(5, 'Varit Harry Potter', 44.99, 'Replpica exacta de la varita de Harry Potter en madera de sauco. Mantener fuera del alcance de los niños. \r\n', 'img/varitaharry.jpg', 'merchandicing'),
(6, 'Taza Star Wars', 9.95, '¿La taza perfecta para tomarte el desayuno y disfrutarlo a tope!', 'img/taza.jpg', 'merchandicing'),
(7, 'El último samurái (DVD)', 17.8, 'El capitán Nathan Algren (Tom Cruise) es un hombre a la deriva, atormentado moral y espiritualmente por los remordimientos de las batallas contra los indígenas norteamericanos. Una vez arriesgó su vida por el honor y por la patria, pero en los años transcurridos desde la guerra de Secesión estadounidense el mundo ha cambiado. El pragmatismo ha reemplazado al valor, el interés personal ha ocupado el lugar del sacrificio y el honor no se encuentra en ninguna parte. Recibe la oferta de marchar a Japón para entrenar a su inexperto ejército de reclutas y campesinos, aceptando inmediatamente debido al excelente salario que recibirá. El mediador del pacto es su antiguo superior en el 7.º Regimiento de Caballería, el coronel Bagley (Tony Goldwyn), que lo reconoce como un hombre muy capaz a pesar de sus limitaciones como el alcoholismo; Algren, sin embargo, lo considera un asesino frío y sin escrúpulos.', 'img/ultsamurai.jpg', 'pelicula'),
(8, 'Funko Baby Yoda', 11.95, 'Amplia tu colección con la siguiente edición Star Wars de la serie Mandalorian, personaje The Child Baby Yoda.', 'img/funkobabyyoda.jpg', 'merchandicing'),
(9, 'Funda Iphone 6 Star Wars', 29.95, 'Si estás buscando una funda de Star Wars para tu móvil, ya la has encontrado!. Gran resistencia al calor y los líquidos.', 'img/funda.jpg', 'accesorio'),
(10, '', 0, '', '', ''),
(11, '', 0, '', '', ''),
(12, '', 0, '', '', ''),
(13, '', 0, '', '', ''),
(14, '', 0, '', '', ''),
(15, '', 0, '', '', ''),
(16, '', 0, '', '', ''),
(17, '', 0, '', '', ''),
(18, '', 0, '', '', ''),
(19, '', 0, '', '', ''),
(20, '', 0, '', '', ''),
(21, '', 0, '', '', ''),
(22, '', 0, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id`);
COMMIT;

ALTER TABLE `producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
