-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2019 a las 14:34:08
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `descripcion`) VALUES
('1', 'Ciencia FicciÃ³n'),
('2', 'FantÃ¡stica'),
('3', 'Novela histÃ³rica'),
('4', 'Infantil'),
('5', 'Novela negra'),
('6', 'DivulgaciÃ³n cientÃ­fica'),
('7', 'PoesÃ­a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `isbn` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `autor` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `editorial` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `genero` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `edicion` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `argumento` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `titulo`, `autor`, `fecha_alta`, `editorial`, `genero`, `edicion`, `argumento`) VALUES
('1234567891234', 'Cien aÃ±os de soledad', 'GarcÃ­a MÃ¡rquez', '2015-12-23', 'PingÃ¼ino', '1', '12', ' e31213 '),
('322433244423', 'Elantris', 'Brandon Sanderson', '2002-03-12', 'Ediciones B', '2', '10 Anivers', ' Bienvenidos a la ciudad de Elantris, la poderosa y bella capital de Arelon llamada la Â«ciudad de los diosesÂ». AntaÃ±o famosa sede de inmortales, lugar repleto de poderosa magia, Elantris ha caÃ­do '),
('4356909234134', 'Harry Potter y la Piedra Filosofal', 'J.K. Rowling', '2019-01-02', 'Salamandra', '4', '18', 'Harry se ha quedado huÃ©rfano y vive en casa de sus abobinables tios. Un dÃ­a recibe una carta que cambiarÃ¡ su vida para siempre. '),
('5465901232453', 'Poeta en Nueva York', 'Federico GarcÃ­a Lorca', '2018-08-08', 'Create Space', '7', '20', 'Poemario escrito entre 1929 y 1939 durante la estancia del autor en la Universidad de Columbia. '),
('9783425467234', 'El gen egoÃ­sta', 'Richard Dawkins', '2018-03-15', 'Salvat', '6', '1', 'Dawkins, zoÃ³logo especializado en comportamiento animal y evoluciÃ³n explica las bases evolutivas del comportamiento ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(36) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(1) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `tipo`) VALUES
('administrador@email.com', '123456', 'A'),
('gestion@email.com', 'qweasd', 'G'),
('usuario1@email.com', '123qwe', 'N'),
('usuario2@gmail.com', 'qwe123', 'N'),
('usuario4@email.com', '123456', 'N');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_generos` (`genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_generos` FOREIGN KEY (`genero`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
