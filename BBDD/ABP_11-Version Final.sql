-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2019 a las 19:05:52
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ABP_11`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAMPEONATO`
--

CREATE TABLE `CAMPEONATO` (
  `idCampeonato` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fechaIniInscripcion` date NOT NULL,
  `fechaFinInscripcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CAMPEONATO`
--

INSERT INTO `CAMPEONATO` (`idCampeonato`, `nombre`, `fechaIniInscripcion`, `fechaFinInscripcion`) VALUES
(1, 'Roland Garros', '2019-01-16', '2019-02-06'),
(2, 'Wimbeldon', '2019-01-16', '2019-02-06'),
(3, 'Prueba', '2018-11-21', '2019-01-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIA`
--

CREATE TABLE `CATEGORIA` (
  `idCategoria` int(10) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `idCampeonato` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`idCategoria`, `genero`, `nivel`, `idCampeonato`) VALUES
(0, 'A', 'Primera', 3),
(1, 'M', 'Primera', 1),
(2, 'M', 'Segunda', 1),
(7, 'F', 'Primera', 1),
(8, 'F', 'Segunda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIA_PAREJA`
--

CREATE TABLE `CATEGORIA_PAREJA` (
  `CategoriaidCategoria` int(10) NOT NULL,
  `CategoriaidCampeonato` int(10) NOT NULL,
  `ParejaidPareja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CATEGORIA_PAREJA`
--

INSERT INTO `CATEGORIA_PAREJA` (`CategoriaidCategoria`, `CategoriaidCampeonato`, `ParejaidPareja`) VALUES
(0, 3, 54),
(0, 3, 55),
(0, 3, 56),
(0, 3, 57),
(0, 3, 58),
(0, 3, 59),
(0, 3, 60),
(0, 3, 61),
(0, 3, 62),
(0, 3, 63),
(0, 3, 64),
(0, 3, 65),
(0, 3, 66),
(0, 3, 67),
(0, 3, 68),
(0, 3, 69),
(1, 1, 1),
(1, 1, 70),
(1, 1, 71),
(1, 1, 72),
(1, 1, 73),
(1, 1, 74),
(1, 1, 75),
(1, 1, 76),
(1, 1, 77),
(1, 1, 78),
(1, 1, 79),
(1, 1, 80),
(1, 1, 81),
(1, 1, 82),
(1, 1, 83),
(1, 1, 84);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLASES`
--

CREATE TABLE `CLASES` (
  `idEscuela` int(10) NOT NULL,
  `idClase` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `capacidadAlumnos` int(11) NOT NULL,
  `idPista` int(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL,
  `entrenador` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CLASES`
--

INSERT INTO `CLASES` (`idEscuela`, `idClase`, `fecha`, `hora`, `capacidadAlumnos`, `idPista`, `Pistanombre`, `entrenador`) VALUES
(1, 1, '2019-01-16', '12:00:00', 5, 3, 'Court 1', 'noe'),
(3, 2, '2019-01-16', '13:30:00', 5, 11, 'Court2', 'noe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENFRENTAMIENTO`
--

CREATE TABLE `ENFRENTAMIENTO` (
  `idEnfrentamiento` int(10) NOT NULL,
  `idGrupo` int(10) NOT NULL,
  `idPareja1` int(10) NOT NULL,
  `idPareja2` int(10) NOT NULL,
  `GrupoidCategoria` int(10) NOT NULL,
  `GrupoidCampeonato` int(10) NOT NULL,
  `set1` varchar(3) DEFAULT '0-0',
  `set2` varchar(3) DEFAULT '0-0',
  `set3` varchar(3) DEFAULT '0-0',
  `fechaPropuesta` date DEFAULT NULL,
  `horaPropuesta` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ENFRENTAMIENTO`
--

INSERT INTO `ENFRENTAMIENTO` (`idEnfrentamiento`, `idGrupo`, `idPareja1`, `idPareja2`, `GrupoidCategoria`, `GrupoidCampeonato`, `set1`, `set2`, `set3`, `fechaPropuesta`, `horaPropuesta`) VALUES
(859, 19, 77, 78, 1, 1, '6-3', '3-6', '4-6', NULL, NULL),
(860, 19, 77, 79, 1, 1, '6-1', '2-6', '6-4', NULL, NULL),
(861, 19, 77, 80, 1, 1, '6-2', '3-6', '7-5', NULL, NULL),
(862, 19, 77, 81, 1, 1, '6-4', '4-6', '6-7', NULL, NULL),
(863, 19, 77, 82, 1, 1, '3-6', '6-2', '6-1', NULL, NULL),
(864, 19, 77, 83, 1, 1, '1-6', '6-3', '6-0', NULL, NULL),
(865, 19, 77, 84, 1, 1, '6-3', '2-6', '6-1', NULL, NULL),
(866, 19, 78, 79, 1, 1, '6-2', '2-6', '7-5', NULL, NULL),
(867, 19, 78, 80, 1, 1, '6-7', '7-6', '6-7', NULL, NULL),
(868, 19, 78, 81, 1, 1, '1-6', '6-3', '6-3', NULL, NULL),
(869, 19, 78, 82, 1, 1, '2-6', '6-1', '6-3', NULL, NULL),
(870, 19, 78, 83, 1, 1, '6-3', '4-6', '6-1', NULL, NULL),
(871, 19, 78, 84, 1, 1, '1-6', '3-6', '6-2', NULL, NULL),
(872, 19, 79, 80, 1, 1, '2-6', '7-5', '6-1', NULL, NULL),
(873, 19, 79, 81, 1, 1, '4-6', '7-5', '6-7', NULL, NULL),
(874, 19, 79, 82, 1, 1, '6-3', '2-6', '2-6', NULL, NULL),
(875, 19, 79, 83, 1, 1, '6-1', '1-6', '6-1', NULL, NULL),
(876, 19, 79, 84, 1, 1, '6-2', '3-6', '6-2', NULL, NULL),
(877, 19, 80, 81, 1, 1, '7-5', '5-7', '2-6', NULL, NULL),
(878, 19, 80, 82, 1, 1, '6-3', '3-6', '6-4', NULL, NULL),
(879, 19, 80, 83, 1, 1, '7-5', '5-7', '7-5', NULL, NULL),
(880, 19, 80, 84, 1, 1, '1-6', '6-1', '6-1', NULL, NULL),
(881, 19, 81, 82, 1, 1, '0-6', '6-1', '6-2', NULL, NULL),
(882, 19, 81, 83, 1, 1, '2-6', '6-3', '6-7', NULL, NULL),
(883, 19, 81, 84, 1, 1, '6-1', '2-6', '6-7', NULL, NULL),
(884, 19, 82, 83, 1, 1, '6-2', '1-6', '3-6', NULL, NULL),
(885, 19, 82, 84, 1, 1, '6-1', '2-6', '6-4', NULL, NULL),
(886, 19, 83, 84, 1, 1, '6-1', '1-6', '6-1', NULL, NULL),
(887, 18, 1, 70, 1, 1, '6-2', '2-6', '6-1', NULL, NULL),
(888, 18, 1, 71, 1, 1, '2-6', '6-3', '3-6', '2019-01-17', '10:30:00'),
(889, 18, 1, 72, 1, 1, '6-3', '4-6', '4-6', NULL, NULL),
(890, 18, 1, 73, 1, 1, '6-3', '2-6', '7-5', NULL, NULL),
(891, 18, 1, 74, 1, 1, '2-6', '6-1', '6-3', NULL, NULL),
(892, 18, 1, 75, 1, 1, '6-4', '4-6', '6-2', NULL, NULL),
(893, 18, 1, 76, 1, 1, '6-3', '3-6', '6-1', NULL, NULL),
(894, 18, 70, 71, 1, 1, '6-4', '4-6', '7-5', NULL, NULL),
(895, 18, 70, 72, 1, 1, '4-6', '6-2', '6-1', NULL, NULL),
(896, 18, 70, 73, 1, 1, '6-1', '2-6', '6-3', NULL, NULL),
(897, 18, 70, 74, 1, 1, '6-2', '4-6', '6-1', NULL, NULL),
(898, 18, 70, 75, 1, 1, '2-6', '6-1', '6-2', NULL, NULL),
(899, 18, 70, 76, 1, 1, '1-6', '6-3', '6-2', NULL, NULL),
(900, 18, 71, 72, 1, 1, '4-6', '6-2', '6-1', NULL, NULL),
(901, 18, 71, 73, 1, 1, '2-6', '6-1', '6-3', NULL, NULL),
(902, 18, 71, 74, 1, 1, '3-6', '7-5', '7-5', NULL, NULL),
(903, 18, 71, 75, 1, 1, '1-6', '6-1', '6-2', NULL, NULL),
(904, 18, 71, 76, 1, 1, '2-6', '6-1', '7-5', NULL, NULL),
(905, 18, 72, 73, 1, 1, '6-1', '2-6', '6-3', NULL, NULL),
(906, 18, 72, 74, 1, 1, '6-2', '3-6', '6-7', NULL, NULL),
(907, 18, 72, 75, 1, 1, '7-5', '5-7', '6-1', NULL, NULL),
(908, 18, 72, 76, 1, 1, '2-6', '6-3', '6-4', NULL, NULL),
(909, 18, 73, 74, 1, 1, '1-6', '6-4', '4-6', NULL, NULL),
(910, 18, 73, 75, 1, 1, '2-6', '6-3', '6-2', NULL, NULL),
(911, 18, 73, 76, 1, 1, '1-6', '6-3', '6-2', NULL, NULL),
(912, 18, 74, 75, 1, 1, '2-6', '6-4', '6-3', NULL, NULL),
(913, 18, 74, 76, 1, 1, '6-1', '2-6', '6-4', NULL, NULL),
(914, 18, 75, 76, 1, 1, '6-1', '2-6', '6-4', NULL, NULL),
(915, 20, 54, 55, 0, 3, '6-2', '6-3', '0-0', '2019-01-17', '20:00:00'),
(916, 20, 54, 56, 0, 3, '6-1', '5-7', '6-4', NULL, NULL),
(917, 20, 54, 57, 0, 3, '6-4', '3-6', '6-3', NULL, NULL),
(918, 20, 54, 58, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(919, 20, 54, 59, 0, 3, '0-0', '0-0', '0-0', '2019-01-17', '17:00:00'),
(920, 20, 54, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(921, 20, 54, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(922, 20, 55, 56, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(923, 20, 55, 57, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(924, 20, 55, 58, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(925, 20, 55, 59, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(926, 20, 55, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(927, 20, 55, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(928, 20, 56, 57, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(929, 20, 56, 58, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(930, 20, 56, 59, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(931, 20, 56, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(932, 20, 56, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(933, 20, 57, 58, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(934, 20, 57, 59, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(935, 20, 57, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(936, 20, 57, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(937, 20, 58, 59, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(938, 20, 58, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(939, 20, 58, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(940, 20, 59, 60, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(941, 20, 59, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(942, 20, 60, 61, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(943, 21, 62, 63, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(944, 21, 62, 64, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(945, 21, 62, 65, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(946, 21, 62, 66, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(947, 21, 62, 67, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(948, 21, 62, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(949, 21, 62, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(950, 21, 63, 64, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(951, 21, 63, 65, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(952, 21, 63, 66, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(953, 21, 63, 67, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(954, 21, 63, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(955, 21, 63, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(956, 21, 64, 65, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(957, 21, 64, 66, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(958, 21, 64, 67, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(959, 21, 64, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(960, 21, 64, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(961, 21, 65, 66, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(962, 21, 65, 67, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(963, 21, 65, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(964, 21, 65, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(965, 21, 66, 67, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(966, 21, 66, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(967, 21, 66, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(968, 21, 67, 68, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(969, 21, 67, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL),
(970, 21, 68, 69, 0, 3, '0-0', '0-0', '0-0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENFRENTAMIENTO_RONDA`
--

CREATE TABLE `ENFRENTAMIENTO_RONDA` (
  `idEnfrentamientoRonda` varchar(10) NOT NULL,
  `set1` varchar(3) DEFAULT NULL,
  `set2` varchar(3) DEFAULT NULL,
  `set3` varchar(3) DEFAULT NULL,
  `idPareja1` int(10) NOT NULL,
  `idPareja2` int(10) NOT NULL,
  `horaPropuesta` time DEFAULT NULL,
  `fechaPropuesta` date DEFAULT NULL,
  `CategoriaidCategoria` int(10) NOT NULL,
  `CategoriaidCampeonato` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ENFRENTAMIENTO_RONDA`
--

INSERT INTO `ENFRENTAMIENTO_RONDA` (`idEnfrentamientoRonda`, `set1`, `set2`, `set3`, `idPareja1`, `idPareja2`, `horaPropuesta`, `fechaPropuesta`, `CategoriaidCategoria`, `CategoriaidCampeonato`) VALUES
('0 CUA 0', '7-6', '6-4', '0-0', 54, 55, '17:00:00', '2019-01-17', 0, 3),
('0 CUA 2', '7-5', '3-6', '2-6', 56, 57, '17:00:00', '2019-01-17', 0, 3),
('0 CUA 4', '6-3', '7-5', '6-1', 62, 63, NULL, NULL, 0, 3),
('0 CUA 6', '6-1', '6-3', '0-0', 64, 65, NULL, NULL, 0, 3),
('0 FIN 0', '0-0', '0-0', '0-0', 54, 57, NULL, NULL, 0, 3),
('0 SEM 0', '6-2', '3-6', '3-6', 62, 57, NULL, NULL, 0, 3),
('0 SEM 2', '7-6', '6-3', '0-0', 54, 64, NULL, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESCUELA_DEPORTIVA`
--

CREATE TABLE `ESCUELA_DEPORTIVA` (
  `idEscuela` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Fundacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ESCUELA_DEPORTIVA`
--

INSERT INTO `ESCUELA_DEPORTIVA` (`idEscuela`, `nombre`, `Fundacion`) VALUES
(1, 'Escuela1', '2018-12-19'),
(3, 'Escuela2', '2018-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GRUPO`
--

CREATE TABLE `GRUPO` (
  `idGrupo` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  `idCampeonato` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `GRUPO`
--

INSERT INTO `GRUPO` (`idGrupo`, `nombre`, `idCategoria`, `idCampeonato`) VALUES
(18, 'PrimeraM 2', 1, 1),
(19, 'PrimeraM 1', 1, 1),
(20, 'PrimeraA 2', 0, 3),
(21, 'PrimeraA 1', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GRUPO_PAREJA`
--

CREATE TABLE `GRUPO_PAREJA` (
  `GrupoidGrupo` int(10) NOT NULL,
  `GrupoidCategoria` int(10) NOT NULL,
  `GrupoidCampeonato` int(10) NOT NULL,
  `ParejaidPareja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `GRUPO_PAREJA`
--

INSERT INTO `GRUPO_PAREJA` (`GrupoidGrupo`, `GrupoidCategoria`, `GrupoidCampeonato`, `ParejaidPareja`) VALUES
(18, 1, 1, 1),
(18, 1, 1, 70),
(18, 1, 1, 71),
(18, 1, 1, 72),
(18, 1, 1, 73),
(18, 1, 1, 74),
(18, 1, 1, 75),
(18, 1, 1, 76),
(19, 1, 1, 77),
(19, 1, 1, 78),
(19, 1, 1, 79),
(19, 1, 1, 80),
(19, 1, 1, 81),
(19, 1, 1, 82),
(19, 1, 1, 83),
(19, 1, 1, 84),
(20, 0, 3, 54),
(20, 0, 3, 55),
(20, 0, 3, 56),
(20, 0, 3, 57),
(20, 0, 3, 58),
(20, 0, 3, 59),
(20, 0, 3, 60),
(20, 0, 3, 61),
(21, 0, 3, 62),
(21, 0, 3, 63),
(21, 0, 3, 64),
(21, 0, 3, 65),
(21, 0, 3, 66),
(21, 0, 3, 67),
(21, 0, 3, 68),
(21, 0, 3, 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTICIA`
--

CREATE TABLE `NOTICIA` (
  `idNoticia` int(11) NOT NULL,
  `imageURL` varchar(50) DEFAULT NULL,
  `enlace` varchar(50) DEFAULT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `NOTICIA`
--

INSERT INTO `NOTICIA` (`idNoticia`, `imageURL`, `enlace`, `texto`) VALUES
(1, '../Views/images/matchpadel.jpg', 'https://www.youtube.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida, justo tincidunt tristique bibendum, enim purus lacinia augue, et molestie diam erat at orci. Duis lacinia et neque vel euismod. Etiam odio urna, lacinia a orci quis, blandit imperdiet mauris. Phasellus tristique elementum nunc vitae feugiat. Duis sit amet ante porttitor neque tempus sagittis. Donec leo tortor, mollis vel semper eget, rutrum a nisl. Nunc sodales finibus molestie.'),
(4, '../Views/images/matchpadel.jpg', 'youtube.com', 'wwewewew');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAREJA`
--

CREATE TABLE `PAREJA` (
  `idPareja` int(10) NOT NULL,
  `login1` varchar(10) NOT NULL,
  `login2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PAREJA`
--

INSERT INTO `PAREJA` (`idPareja`, `login1`, `login2`) VALUES
(1, 'noe', 'luis'),
(2, 'alex', 'brais'),
(54, 'bejo', 'bejoi'),
(55, 'bejoia', 'cecilioG'),
(56, 'costa', 'e'),
(57, 'gumer', 'i'),
(58, 'i10', 'i2'),
(59, 'i4', 'i5'),
(60, 'i6', 'i7'),
(61, 'i8', 'i9'),
(62, 'ii', 'iia'),
(63, 'iii', 'iiia'),
(64, 'inmortal', 'ivan'),
(65, 'ivan1', 'jacinto'),
(66, 'josemi', 'jug1'),
(67, 'jug10', 'jug11'),
(68, 'jug12', 'jug13'),
(69, 'jug14', 'jug15'),
(70, 'jug16', 'jug17'),
(71, 'jug18', 'jug19'),
(72, 'jug20', 'jug21'),
(73, 'jug22', 'jug23'),
(74, 'jug24', 'jug25'),
(75, 'jug26', 'jug27'),
(76, 'jug28', 'jug29'),
(77, 'jug30', 'jug31'),
(78, 'jug70', 'jug71'),
(79, 'jug72', 'jug73'),
(80, 'jug74', 'jug75'),
(81, 'jug76', 'jug77'),
(82, 'jug78', 'jug79'),
(83, 'kidd', 'locoplaya'),
(84, 'poncio', 'pilatos'),
(85, 'Sharapova', 'rivolf'),
(86, 'ruper', 'rober'),
(87, 'roberto', 'rogiberto'),
(88, 't', 't1'),
(89, 't10', 't11'),
(90, 'tania', 'bejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PARTIDO`
--

CREATE TABLE `PARTIDO` (
  `idPartido` int(10) NOT NULL,
  `Usuariologin` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `promo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PARTIDO`
--

INSERT INTO `PARTIDO` (`idPartido`, `Usuariologin`, `fecha`, `hora`, `promo`) VALUES
(7, 'adri', '2019-01-17', '09:00:00', 1),
(8, 'adri', '2019-01-17', '09:00:00', 1),
(9, 'adri', '2019-01-16', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA`
--

CREATE TABLE `PISTA` (
  `idPista` int(10) NOT NULL,
  `restriccion` tinyint(1) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PISTA`
--

INSERT INTO `PISTA` (`idPista`, `restriccion`, `nombre`, `hora`, `fecha`) VALUES
(0, 1, 'Court2', '17:00:00', '2019-01-17'),
(1, 1, 'Court1', '09:00:00', '2019-01-17'),
(2, 1, 'Court1', '10:30:00', '2019-01-17'),
(3, 1, 'Court1', '12:00:00', '2019-01-17'),
(4, 1, 'Court1', '13:30:00', '2019-01-17'),
(5, 1, 'Court1', '17:00:00', '2019-01-17'),
(6, 0, 'Court1', '18:30:00', '2019-01-17'),
(7, 0, 'Court1', '20:00:00', '2019-01-17'),
(8, 0, 'Court2', '09:00:00', '2019-01-17'),
(9, 1, 'Court2', '10:30:00', '2019-01-17'),
(10, 1, 'Court2', '12:00:00', '2019-01-17'),
(11, 1, 'Court2', '13:30:00', '2019-01-17'),
(12, 0, 'Court2', '20:00:00', '2019-01-17'),
(13, 0, 'Court2', '18:30:00', '2019-01-17'),
(14, 0, 'Court3', '09:00:00', '2019-01-17'),
(15, 1, 'Court3', '10:30:00', '2019-01-17'),
(16, 0, 'Court3', '12:00:00', '2019-01-17'),
(17, 0, 'Court3', '13:30:00', '2019-01-17'),
(18, 1, 'Court3', '17:00:00', '2019-01-17'),
(19, 1, 'Court3', '18:30:00', '2019-01-17'),
(20, 0, 'Court3', '20:00:00', '2019-01-17'),
(21, 0, 'Court4', '09:00:00', '2019-01-17'),
(22, 1, 'Court4', '10:30:00', '2019-01-17'),
(23, 0, 'Court4', '12:00:00', '2019-01-17'),
(24, 1, 'Court4', '13:30:00', '2019-01-17'),
(25, 1, 'Court4', '17:00:00', '2019-01-17'),
(26, 0, 'Court4', '18:30:00', '2019-01-17'),
(27, 0, 'Court4', '20:00:00', '2019-01-17'),
(28, 0, 'Court4', '20:00:00', '2019-01-18'),
(29, 0, 'Court4', '09:00:00', '2019-01-18'),
(30, 0, 'Court4', '10:30:00', '2019-01-18'),
(31, 0, 'Court4', '12:00:00', '2019-01-18'),
(32, 0, 'Court4', '13:30:00', '2019-01-18'),
(33, 0, 'Court4', '17:00:00', '2019-01-18'),
(34, 0, 'Court4', '18:30:00', '2019-01-18'),
(35, 0, 'Court3', '09:00:00', '2019-01-18'),
(36, 0, 'Court3', '10:30:00', '2019-01-18'),
(37, 0, 'Court3', '12:00:00', '2019-01-18'),
(38, 0, 'Court3', '13:30:00', '2019-01-18'),
(39, 0, 'Court3', '17:00:00', '2019-01-18'),
(40, 0, 'Court3', '18:30:00', '2019-01-18'),
(41, 0, 'Court3', '20:00:00', '2019-01-18'),
(42, 0, 'Court2', '09:00:00', '2019-01-18'),
(43, 0, 'Court2', '10:30:00', '2019-01-18'),
(44, 0, 'Court2', '12:00:00', '2019-01-18'),
(45, 0, 'Court2', '13:30:00', '2019-01-18'),
(46, 0, 'Court2', '17:00:00', '2019-01-18'),
(47, 0, 'Court2', '18:30:00', '2019-01-18'),
(48, 0, 'Court2', '20:00:00', '2019-01-18'),
(49, 0, 'Court1', '09:00:00', '2019-01-18'),
(50, 0, 'Court1', '10:30:00', '2019-01-18'),
(51, 0, 'Court1', '12:00:00', '2019-01-18'),
(52, 0, 'Court1', '13:30:00', '2019-01-18'),
(53, 0, 'Court1', '17:00:00', '2019-01-18'),
(54, 0, 'Court1', '18:30:00', '2019-01-18'),
(55, 0, 'Court1', '20:00:00', '2019-01-18'),
(56, 0, 'Court1', '09:00:00', '2019-01-19'),
(57, 0, 'Court1', '10:30:00', '2019-01-19'),
(58, 0, 'Court1', '12:00:00', '2019-01-19'),
(59, 0, 'Court1', '13:30:00', '2019-01-19'),
(60, 0, 'Court1', '17:00:00', '2019-01-19'),
(61, 0, 'Court1', '18:30:00', '2019-01-19'),
(62, 0, 'Court1', '20:00:00', '2019-01-19'),
(63, 0, 'Court2', '09:00:00', '2019-01-19'),
(64, 0, 'Court2', '10:30:00', '2019-01-19'),
(65, 0, 'Court2', '12:00:00', '2019-01-19'),
(66, 0, 'Court2', '13:30:00', '2019-01-19'),
(67, 0, 'Court2', '17:00:00', '2019-01-19'),
(68, 0, 'Court2', '18:30:00', '2019-01-19'),
(69, 0, 'Court2', '20:00:00', '2019-01-19'),
(70, 0, 'Court3', '09:00:00', '2019-01-19'),
(71, 0, 'Court3', '10:30:00', '2019-01-19'),
(72, 0, 'Court3', '12:00:00', '2019-01-19'),
(73, 0, 'Court3', '13:30:00', '2019-01-19'),
(74, 0, 'Court3', '17:00:00', '2019-01-19'),
(75, 0, 'Court3', '18:30:00', '2019-01-19'),
(76, 0, 'Court3', '20:00:00', '2019-01-19'),
(77, 0, 'Court4', '09:00:00', '2019-01-19'),
(78, 0, 'Court4', '10:30:00', '2019-01-19'),
(79, 0, 'Court4', '12:00:00', '2019-01-19'),
(80, 0, 'Court4', '13:30:00', '2019-01-19'),
(81, 0, 'Court4', '17:00:00', '2019-01-19'),
(82, 0, 'Court4', '18:30:00', '2019-01-19'),
(83, 0, 'Court4', '20:00:00', '2019-01-19'),
(84, 0, 'Court1', '09:00:00', '2019-01-20'),
(85, 0, 'Court1', '10:30:00', '2019-01-20'),
(86, 0, 'Court1', '12:00:00', '2019-01-20'),
(87, 0, 'Court1', '13:30:00', '2019-01-20'),
(88, 0, 'Court1', '17:00:00', '2019-01-20'),
(89, 0, 'Court1', '18:30:00', '2019-01-20'),
(90, 0, 'Court1', '20:00:00', '2019-01-20'),
(91, 0, 'Court2', '09:00:00', '2019-01-20'),
(92, 0, 'Court2', '10:30:00', '2019-01-20'),
(93, 0, 'Court2', '12:00:00', '2019-01-20'),
(94, 0, 'Court2', '13:30:00', '2019-01-20'),
(95, 0, 'Court2', '17:00:00', '2019-01-20'),
(96, 0, 'Court2', '18:30:00', '2019-01-20'),
(97, 0, 'Court2', '20:00:00', '2019-01-20'),
(98, 0, 'Court3', '09:00:00', '2019-01-20'),
(99, 0, 'Court3', '10:30:00', '2019-01-20'),
(100, 0, 'Court3', '12:00:00', '2019-01-20'),
(101, 0, 'Court3', '13:30:00', '2019-01-20'),
(102, 0, 'Court3', '17:00:00', '2019-01-20'),
(103, 0, 'Court3', '18:30:00', '2019-01-20'),
(104, 0, 'Court3', '20:00:00', '2019-01-20'),
(105, 0, 'Court4', '09:00:00', '2019-01-20'),
(106, 0, 'Court4', '10:30:00', '2019-01-20'),
(107, 0, 'Court4', '12:00:00', '2019-01-20'),
(108, 0, 'Court4', '13:30:00', '2019-01-20'),
(109, 0, 'Court4', '17:00:00', '2019-01-20'),
(110, 0, 'Court4', '18:30:00', '2019-01-20'),
(111, 0, 'Court4', '20:00:00', '2019-01-20'),
(112, 0, 'Court1', '09:00:00', '2019-01-21'),
(113, 0, 'Court1', '10:30:00', '2019-01-21'),
(114, 0, 'Court1', '12:00:00', '2019-01-21'),
(115, 0, 'Court1', '13:30:00', '2019-01-21'),
(116, 0, 'Court1', '17:00:00', '2019-01-21'),
(117, 0, 'Court1', '18:30:00', '2019-01-21'),
(118, 0, 'Court1', '20:00:00', '2019-01-21'),
(119, 0, 'Court2', '09:00:00', '2019-01-21'),
(120, 0, 'Court2', '10:30:00', '2019-01-21'),
(121, 0, 'Court2', '12:00:00', '2019-01-21'),
(122, 0, 'Court2', '13:30:00', '2019-01-21'),
(123, 0, 'Court2', '17:00:00', '2019-01-21'),
(124, 0, 'Court2', '18:30:00', '2019-01-21'),
(125, 0, 'Court2', '20:00:00', '2019-01-21'),
(126, 0, 'Court3', '09:00:00', '2019-01-21'),
(127, 0, 'Court3', '10:30:00', '2019-01-21'),
(128, 0, 'Court3', '12:00:00', '2019-01-21'),
(129, 0, 'Court3', '13:30:00', '2019-01-21'),
(130, 0, 'Court3', '17:00:00', '2019-01-21'),
(131, 0, 'Court3', '18:30:00', '2019-01-21'),
(132, 0, 'Court3', '20:00:00', '2019-01-21'),
(133, 0, 'Court4', '09:00:00', '2019-01-21'),
(134, 0, 'Court4', '10:30:00', '2019-01-21'),
(135, 0, 'Court4', '12:00:00', '2019-01-21'),
(136, 0, 'Court4', '13:30:00', '2019-01-21'),
(137, 0, 'Court4', '17:00:00', '2019-01-21'),
(138, 0, 'Court4', '18:30:00', '2019-01-21'),
(139, 0, 'Court4', '20:00:00', '2019-01-21'),
(140, 0, 'Court1', '09:00:00', '2019-01-22'),
(141, 0, 'Court1', '10:30:00', '2019-01-22'),
(142, 0, 'Court1', '12:00:00', '2019-01-22'),
(143, 0, 'Court1', '13:30:00', '2019-01-22'),
(144, 0, 'Court1', '17:00:00', '2019-01-22'),
(145, 0, 'Court1', '18:30:00', '2019-01-22'),
(146, 0, 'Court1', '20:00:00', '2019-01-22'),
(147, 0, 'Court2', '09:00:00', '2019-01-22'),
(148, 0, 'Court2', '10:30:00', '2019-01-22'),
(149, 0, 'Court2', '12:00:00', '2019-01-22'),
(150, 0, 'Court2', '13:30:00', '2019-01-22'),
(151, 0, 'Court2', '17:00:00', '2019-01-22'),
(152, 0, 'Court2', '18:30:00', '2019-01-22'),
(153, 0, 'Court2', '20:00:00', '2019-01-22'),
(154, 0, 'Court3', '09:00:00', '2019-01-22'),
(155, 0, 'Court3', '10:30:00', '2019-01-22'),
(156, 0, 'Court3', '12:00:00', '2019-01-22'),
(157, 0, 'Court3', '13:30:00', '2019-01-22'),
(158, 0, 'Court3', '17:00:00', '2019-01-22'),
(159, 0, 'Court3', '18:30:00', '2019-01-22'),
(160, 0, 'Court3', '20:00:00', '2019-01-22'),
(161, 0, 'Court4', '09:00:00', '2019-01-22'),
(162, 0, 'Court4', '10:30:00', '2019-01-22'),
(163, 0, 'Court4', '12:00:00', '2019-01-22'),
(164, 0, 'Court4', '13:30:00', '2019-01-22'),
(165, 0, 'Court4', '17:00:00', '2019-01-22'),
(166, 0, 'Court4', '18:30:00', '2019-01-22'),
(167, 0, 'Court4', '20:00:00', '2019-01-22'),
(168, 0, 'Court1', '09:00:00', '2019-01-23'),
(169, 0, 'Court1', '10:30:00', '2019-01-23'),
(170, 0, 'Court1', '12:00:00', '2019-01-23'),
(171, 0, 'Court1', '13:30:00', '2019-01-23'),
(172, 0, 'Court1', '17:00:00', '2019-01-23'),
(173, 0, 'Court1', '18:30:00', '2019-01-23'),
(174, 0, 'Court1', '20:00:00', '2019-01-23'),
(175, 0, 'Court2', '09:00:00', '2019-01-23'),
(176, 0, 'Court2', '10:30:00', '2019-01-23'),
(177, 0, 'Court2', '12:00:00', '2019-01-23'),
(178, 0, 'Court2', '13:30:00', '2019-01-23'),
(179, 0, 'Court2', '17:00:00', '2019-01-23'),
(180, 0, 'Court2', '18:30:00', '2019-01-23'),
(181, 0, 'Court2', '20:00:00', '2019-01-23'),
(182, 0, 'Court3', '09:00:00', '2019-01-23'),
(183, 0, 'Court3', '10:30:00', '2019-01-23'),
(184, 0, 'Court3', '12:00:00', '2019-01-23'),
(185, 0, 'Court3', '13:30:00', '2019-01-23'),
(186, 0, 'Court3', '17:00:00', '2019-01-23'),
(187, 0, 'Court3', '18:30:00', '2019-01-23'),
(188, 0, 'Court3', '20:00:00', '2019-01-23'),
(189, 0, 'Court4', '09:00:00', '2019-01-23'),
(190, 0, 'Court4', '10:30:00', '2019-01-23'),
(191, 0, 'Court4', '12:00:00', '2019-01-23'),
(192, 0, 'Court4', '13:30:00', '2019-01-23'),
(193, 0, 'Court4', '17:00:00', '2019-01-23'),
(194, 0, 'Court4', '18:30:00', '2019-01-23'),
(195, 0, 'Court4', '20:00:00', '2019-01-23'),
(196, 0, 'Court1', '09:00:00', '2019-01-24'),
(197, 0, 'Court1', '10:30:00', '2019-01-24'),
(198, 0, 'Court1', '12:00:00', '2019-01-24'),
(199, 0, 'Court1', '13:30:00', '2019-01-24'),
(200, 0, 'Court1', '17:00:00', '2019-01-24'),
(201, 0, 'Court1', '18:30:00', '2019-01-24'),
(202, 0, 'Court1', '20:00:00', '2019-01-24'),
(203, 0, 'Court2', '09:00:00', '2019-01-24'),
(204, 0, 'Court2', '10:30:00', '2019-01-24'),
(205, 0, 'Court2', '12:00:00', '2019-01-24'),
(206, 0, 'Court2', '13:30:00', '2019-01-24'),
(207, 0, 'Court2', '17:00:00', '2019-01-24'),
(208, 0, 'Court2', '18:30:00', '2019-01-24'),
(209, 0, 'Court2', '20:00:00', '2019-01-24'),
(210, 0, 'Court3', '09:00:00', '2019-01-24'),
(211, 0, 'Court3', '10:30:00', '2019-01-24'),
(212, 0, 'Court3', '12:00:00', '2019-01-24'),
(213, 0, 'Court3', '13:30:00', '2019-01-24'),
(214, 0, 'Court3', '17:00:00', '2019-01-24'),
(215, 0, 'Court3', '18:30:00', '2019-01-24'),
(216, 0, 'Court3', '20:00:00', '2019-01-24'),
(217, 0, 'Court4', '09:00:00', '2019-01-24'),
(218, 0, 'Court4', '10:30:00', '2019-01-24'),
(219, 0, 'Court4', '12:00:00', '2019-01-24'),
(220, 0, 'Court4', '13:30:00', '2019-01-24'),
(221, 0, 'Court4', '17:00:00', '2019-01-24'),
(222, 0, 'Court4', '18:30:00', '2019-01-24'),
(223, 0, 'Court4', '20:00:00', '2019-01-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA_ENFRENTAMIENTO`
--

CREATE TABLE `PISTA_ENFRENTAMIENTO` (
  `PistaidPista` int(10) NOT NULL,
  `EnfrentamientoidEnfrentamiento` int(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PISTA_ENFRENTAMIENTO`
--

INSERT INTO `PISTA_ENFRENTAMIENTO` (`PistaidPista`, `EnfrentamientoidEnfrentamiento`, `Pistanombre`) VALUES
(22, 888, 'Court4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA_ENFRENTAMIENTO_RONDA`
--

CREATE TABLE `PISTA_ENFRENTAMIENTO_RONDA` (
  `PistaidPista` int(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL,
  `Enfrentamiento_RondaidEnfrentamientoRonda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA_PARTIDO`
--

CREATE TABLE `PISTA_PARTIDO` (
  `PistaidPista` int(10) NOT NULL,
  `PartidoidPartido` int(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA_USUARIO`
--

CREATE TABLE `PISTA_USUARIO` (
  `PistaidPista` int(10) NOT NULL,
  `Usuariologin` varchar(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PISTA_USUARIO`
--

INSERT INTO `PISTA_USUARIO` (`PistaidPista`, `Usuariologin`, `Pistanombre`) VALUES
(24, 'tania', 'Court4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `login` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`login`, `password`, `rol`, `nombre`, `apellidos`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin'),
('adri', 'adri', 'admin', 'adrian', 'gonzalez'),
('alex', 'alex', 'deportista', 'alex', 'vila'),
('bejo', 'bejo', 'deportista', 'bejo', 'bejo'),
('bejoi', 'bejo', 'deportista', 'bejo', 'bejo'),
('bejoia', 'bejo', 'deportista', 'bejo', 'bejo'),
('brais', 'brais', 'deportista', 'brais', 'santos'),
('cecilioG', 'cecilioG', 'deportista', 'ceci', 'ceci'),
('cecilioGi', 'cecilioG', 'deportista', 'ceci', 'ceci'),
('cecilioGia', 'cecilioG', 'deportista', 'ceci', 'ceci'),
('costa', 'costa', 'deportista', 'costa', 'costa'),
('costai', 'costa', 'deportista', 'costa', 'costa'),
('e', 'e', 'deportista', 'q', 'q'),
('e1', 'e', 'deportista', 'q', 'q'),
('e10', 'e', 'deportista', 'q', 'q'),
('e11', 'e', 'deportista', 'q', 'q'),
('e12', 'e', 'deportista', 'q', 'q'),
('e13', 'e', 'deportista', 'q', 'q'),
('e14', 'e', 'deportista', 'q', 'q'),
('e15', 'e', 'deportista', 'q', 'q'),
('e16', 'e', 'deportista', 'q', 'q'),
('e17', 'e', 'deportista', 'q', 'q'),
('e18', 'e', 'deportista', 'q', 'q'),
('e2', 'e', 'deportista', 'q', 'q'),
('e3', 'e', 'deportista', 'q', 'q'),
('e4', 'e', 'deportista', 'q', 'q'),
('e5', 'e', 'deportista', 'q', 'q'),
('e6', 'e', 'deportista', 'q', 'q'),
('e7', 'e', 'deportista', 'q', 'q'),
('e8', 'e', 'deportista', 'q', 'q'),
('e9', 'e', 'deportista', 'q', 'q'),
('gonza', 'gonza', 'entrenador', 'pedro', 'pedro'),
('gumer', 'gumer', 'deportista', 'gumer', 'gumer'),
('gumeri', 'gumer', 'deportista', 'gumer', 'gumer'),
('gumeria', 'gumer', 'deportista', 'gumer', 'gumer'),
('gumeria1', 'gumer', 'deportista', 'gumer', 'gumer'),
('i', 'i', 'deportista', 'i', 'i'),
('i10', 'i5', 'deportista', 'i5', 'i5'),
('i2', 'ii', 'deportista', 'i', 'i'),
('i4', 'ii', 'deportista', 'i', 'i'),
('i5', 'i5', 'deportista', 'i', 'i'),
('i6', 'i5', 'deportista', 'i5', 'i5'),
('i7', 'i5', 'deportista', 'i5', 'i5'),
('i8', 'i5', 'deportista', 'i5', 'i5'),
('i9', 'i5', 'deportista', 'i5', 'i5'),
('ii', 'ii', 'deportista', 'i', 'i'),
('iia', 'ii', 'deportista', 'i', 'i'),
('iia1', 'ii', 'deportista', 'i', 'i'),
('iii', 'iii', 'deportista', 'i', 'i'),
('iiia', 'iii', 'deportista', 'i', 'i'),
('iiia1', 'iii', 'deportista', 'i', 'i'),
('inmortal', 'inmortal', 'deportista', 'in', 'mortal'),
('inmortali', 'inmortal', 'deportista', 'in', 'mortal'),
('ivan', 'ivan', 'entrenador', 'ivan', 'fernandez'),
('ivan1', 'ivan1', 'deportista', 'ivan', 'de dios'),
('jacinto', 'jacinto', 'deportista', 'ja', 'cinto'),
('jacintoi', 'jacinto', 'deportista', 'ja', 'cinto'),
('jacintoia', 'jacinto', 'deportista', 'ja', 'cinto'),
('jacintoia1', 'jacinto', 'deportista', 'ja', 'cinto'),
('jaco', 'jaco', 'deportista', 'jacobo', 'martinez'),
('josemi', 'josemi', 'deportista', 'jose', 'mi'),
('josemii', 'josemi', 'deportista', 'jose', 'mi'),
('jug1', 'hola', 'deportista', 'jugador', 'jugador'),
('jug10', 'hola', 'deportista', 'jugador', 'jugador'),
('jug11', 'hola', 'deportista', 'jugador', 'jugador'),
('jug12', 'hola', 'deportista', 'jugador', 'jugador'),
('jug13', 'hola', 'deportista', 'jugador', 'jugador'),
('jug14', 'hola', 'deportista', 'jugador', 'jugador'),
('jug15', 'hola', 'deportista', 'jugador', 'jugador'),
('jug16', 'hola', 'deportista', 'jugador', 'jugador'),
('jug17', 'hola', 'deportista', 'jugador', 'jugador'),
('jug18', 'hola', 'deportista', 'jugador', 'jugador'),
('jug19', 'hola', 'deportista', 'jugador', 'jugador'),
('jug2', 'hola', 'deportista', 'jugador', 'jugador'),
('jug20', 'hola', 'deportista', 'jugador', 'jugador'),
('jug21', 'hola', 'deportista', 'jugador', 'jugador'),
('jug22', 'hola', 'deportista', 'jugador', 'jugador'),
('jug23', 'hola', 'deportista', 'jugador', 'jugador'),
('jug24', 'hola', 'deportista', 'jugador', 'jugador'),
('jug25', 'hola', 'deportista', 'jugador', 'jugador'),
('jug26', 'hola', 'deportista', 'jugador', 'jugador'),
('jug27', 'hola', 'deportista', 'jugador', 'jugador'),
('jug28', 'hola', 'deportista', 'jugador', 'jugador'),
('jug29', 'hola', 'deportista', 'jugador', 'jugador'),
('jug3', 'hola', 'deportista', 'jugador', 'jugador'),
('jug30', 'hola', 'deportista', 'jugador', 'jugador'),
('jug31', 'hola', 'deportista', 'jugador', 'jugador'),
('jug32', 'hola', 'deportista', 'jugador', 'jugador'),
('jug33', 'hola', 'deportista', 'jugador', 'jugador'),
('jug34', 'hola', 'deportista', 'jugador', 'jugador'),
('jug35', 'hola', 'deportista', 'jugador', 'jugador'),
('jug36', 'hola', 'deportista', 'jugador', 'jugador'),
('jug37', 'hola', 'deportista', 'jugador', 'jugador'),
('jug38', 'hola', 'deportista', 'jugador', 'jugador'),
('jug39', 'hola', 'deportista', 'jugador', 'jugador'),
('jug4', 'hola', 'deportista', 'jugador', 'jugador'),
('jug40', 'hola', 'deportista', 'jugador', 'jugador'),
('jug41', 'hola', 'deportista', 'jugador', 'jugador'),
('jug42', 'hola', 'deportista', 'jugador', 'jugador'),
('jug43', 'hola', 'deportista', 'jugador', 'jugador'),
('jug44', 'hola', 'deportista', 'jugador', 'jugador'),
('jug45', 'hola', 'deportista', 'jugador', 'jugador'),
('jug46', 'hola', 'deportista', 'jugador', 'jugador'),
('jug48', 'hola', 'deportista', 'jugador', 'jugador'),
('jug49', 'hola', 'deportista', 'jugador', 'jugador'),
('jug5', 'hola', 'deportista', 'jugador', 'jugador'),
('jug50', 'hola', 'deportista', 'jugador', 'jugador'),
('jug51', 'hola', 'deportista', 'jugador', 'jugador'),
('jug52', 'hola', 'deportista', 'jugador', 'jugador'),
('jug53', 'hola', 'deportista', 'jugador', 'jugador'),
('jug54', 'hola', 'deportista', 'jugador', 'jugador'),
('jug55', 'hola', 'deportista', 'jugador', 'jugador'),
('jug56', 'hola', 'deportista', 'jugador', 'jugador'),
('jug57', 'hola', 'deportista', 'jugador', 'jugador'),
('jug58', 'hola', 'deportista', 'jugador', 'jugador'),
('jug59', 'hola', 'deportista', 'jugador', 'jugador'),
('jug6', 'hola', 'deportista', 'jugador', 'jugador'),
('jug60', 'hola', 'deportista', 'jugador', 'jugador'),
('jug61', 'hola', 'deportista', 'jugador', 'jugador'),
('jug62', 'hola', 'deportista', 'jugador', 'jugador'),
('jug63', 'hola', 'deportista', 'jugador', 'jugador'),
('jug64', 'hola', 'deportista', 'jugador', 'jugador'),
('jug65', 'hola', 'deportista', 'jugador', 'jugador'),
('jug66', 'hola', 'deportista', 'jugador', 'jugador'),
('jug67', 'hola', 'deportista', 'jugador', 'jugador'),
('jug68', 'hola', 'deportista', 'jugador', 'jugador'),
('jug69', 'hola', 'deportista', 'jugador', 'jugador'),
('jug7', 'hola', 'deportista', 'jugador', 'jugador'),
('jug70', 'hola', 'deportista', 'jugador', 'jugador'),
('jug71', 'hola', 'deportista', 'jugador', 'jugador'),
('jug72', 'hola', 'deportista', 'jugador', 'jugador'),
('jug73', 'hola', 'deportista', 'jugador', 'jugador'),
('jug74', 'hola', 'deportista', 'jugador', 'jugador'),
('jug75', 'hola', 'deportista', 'jugador', 'jugador'),
('jug76', 'hola', 'deportista', 'jugador', 'jugador'),
('jug77', 'hola', 'deportista', 'jugador', 'jugador'),
('jug78', 'hola', 'deportista', 'jugador', 'jugador'),
('jug79', 'hola', 'deportista', 'jugador', 'jugador'),
('jug8', 'hola', 'deportista', 'jugador', 'jugador'),
('jug80', 'hola', 'deportista', 'jugador', 'jugador'),
('jug9', 'hola', 'deportista', 'jugador', 'jugador'),
('jugador', 'jugador', 'deportista', 'jugador', 'jugador'),
('kidd', 'keo', 'deportista', 'kidd', 'keo'),
('kiddi', 'keo', 'deportista', 'kidd', 'keo'),
('locoplaya', 'locoplaya', 'deportista', 'locoplaya', 'loco'),
('locoplayai', 'locoplaya', 'deportista', 'locoplaya', 'loco'),
('luis', 'luis', 'deportista', 'luis', 'rodriguez'),
('manuel', 'manuel', 'admin', 'manuel', 'vila'),
('nairo', 'nairo', 'deportista', 'nairo', 'nairo'),
('nairoi', 'nairo', 'deportista', 'nairo', 'nairo'),
('nairoia1', 'nairo', 'deportista', 'nairo', 'nairo'),
('noe', 'noe', 'deportista', 'noe', 'ferreiro'),
('o', 'o', 'deportista', 'q', 'q'),
('o1', 'o', 'deportista', 'q', 'q'),
('o10', 'o', 'deportista', 'q', 'q'),
('o11', 'o', 'deportista', 'q', 'q'),
('o12', 'o', 'deportista', 'q', 'q'),
('o13', 'o', 'deportista', 'q', 'q'),
('o14', 'o', 'deportista', 'q', 'q'),
('o15', 'o', 'deportista', 'q', 'q'),
('o16', 'o', 'deportista', 'q', 'q'),
('o17', 'o', 'deportista', 'q', 'q'),
('o18', 'o', 'deportista', 'q', 'q'),
('o2', 'o', 'deportista', 'q', 'q'),
('o3', 'o', 'deportista', 'q', 'q'),
('o4', 'o', 'deportista', 'q', 'q'),
('o5', 'o', 'deportista', 'q', 'q'),
('o6', 'o', 'deportista', 'q', 'q'),
('o7', 'o', 'deportista', 'q', 'q'),
('o8', 'o', 'deportista', 'q', 'q'),
('o9', 'o', 'deportista', 'q', 'q'),
('pablo', 'pablo', 'deportista', 'pablo', 'sobrado'),
('pabloi', 'pablo', 'deportista', 'pablo', 'sobrado'),
('paquito', 'paquito', 'deportista', 'paco', 'navarro'),
('paquitoi', 'paquito', 'deportista', 'paco', 'navarro'),
('paquitoia1', 'paquito', 'deportista', 'paco', 'navarro'),
('patrisito', 'patrisito', 'deportista', 'patrisito', 'patrisito'),
('patrisitoi', 'patrisito', 'deportista', 'patrisito', 'patrisito'),
('pedro', 'pedro', 'deportista', 'pedro', 'hernandez'),
('pepe', 'pepe', 'deportista', 'pedro', 'perez'),
('pilatos', 'pilatos', 'deportista', 'pila', 'pila'),
('pilatosi', 'pilatos', 'deportista', 'pila', 'pila'),
('pla', 'pla', 'deportista', 'pla', 'pla'),
('plai', 'pla', 'deportista', 'pla', 'pla'),
('ponce', 'ponce', 'deportista', 'ponce', 'ponce'),
('poncei', 'ponce', 'deportista', 'ponce', 'ponce'),
('ponceia', 'ponce', 'deportista', 'ponce', 'ponce'),
('poncio', 'poncio', 'deportista', 'poncio', 'poncio'),
('poncioi', 'poncio', 'deportista', 'poncio', 'poncio'),
('q', 'q', 'deportista', 'q', 'q'),
('q1', 'q', 'deportista', 'q', 'q'),
('q10', 'q', 'deportista', 'q', 'q'),
('q11', 'q', 'deportista', 'q', 'q'),
('q12', 'q', 'deportista', 'q', 'q'),
('q13', 'q', 'deportista', 'q', 'q'),
('q14', 'q', 'deportista', 'q', 'q'),
('q15', 'q', 'deportista', 'q', 'q'),
('q16', 'q', 'deportista', 'q', 'q'),
('q17', 'q', 'deportista', 'q', 'q'),
('q18', 'q', 'deportista', 'q', 'q'),
('q2', 'q', 'deportista', 'q', 'q'),
('q3', 'q', 'deportista', 'q', 'q'),
('q4', 'q', 'deportista', 'q', 'q'),
('q5', 'q', 'deportista', 'q', 'q'),
('q6', 'q', 'deportista', 'q', 'q'),
('q7', 'q', 'deportista', 'q', 'q'),
('q8', 'q', 'deportista', 'q', 'q'),
('q9', 'q', 'deportista', 'q', 'q'),
('r', 'r', 'deportista', 'q', 'q'),
('r1', 'r', 'deportista', 'q', 'q'),
('r10', 'r', 'deportista', 'q', 'q'),
('r11', 'r', 'deportista', 'q', 'q'),
('r12', 'r', 'deportista', 'q', 'q'),
('r13', 'r', 'deportista', 'q', 'q'),
('r14', 'r', 'deportista', 'q', 'q'),
('r15', 'r', 'deportista', 'q', 'q'),
('r16', 'r', 'deportista', 'q', 'q'),
('r17', 'r', 'deportista', 'q', 'q'),
('r18', 'r', 'deportista', 'q', 'q'),
('r2', 'r', 'deportista', 'q', 'q'),
('r3', 'r', 'deportista', 'q', 'q'),
('r4', 'r', 'deportista', 'q', 'q'),
('r5', 'r', 'deportista', 'q', 'q'),
('r6', 'r', 'deportista', 'q', 'q'),
('r7', 'r', 'deportista', 'q', 'q'),
('r8', 'r', 'deportista', 'q', 'q'),
('r9', 'r', 'deportista', 'q', 'q'),
('rafa', 'rafa', 'deportista', 'rafael', 'nadal'),
('rafai', 'rafa', 'deportista', 'rafael', 'nadal'),
('rafaia1', 'rafa', 'deportista', 'rafael', 'nadal'),
('rivolf', 'rivolf', 'deportista', 'lejias', 'fairy'),
('rivolfi', 'rivolf', 'deportista', 'lejias', 'fairy'),
('rivolfia1', 'rivolf', 'deportista', 'lejias', 'fairy'),
('rober', 'rober', 'deportista', 'rober', 'rober'),
('roberi', 'rober', 'deportista', 'rober', 'rober'),
('roberia', 'rober', 'deportista', 'rober', 'rober'),
('roberia1', 'rober', 'deportista', 'rober', 'rober'),
('roberto', 'roberto', 'deportista', 'roberto', 'roberto'),
('robertoi', 'roberto', 'deportista', 'roberto', 'roberto'),
('robertoia', 'roberto', 'deportista', 'roberto', 'roberto'),
('robertoia1', 'roberto', 'deportista', 'roberto', 'roberto'),
('rogiberia3', 'rogiberto', 'deportista', 'rogi', 'rogi'),
('rogiberto', 'rogiberto', 'deportista', 'rogi', 'rogi'),
('rogibertoi', 'rogiberto', 'deportista', 'rogi', 'rogi'),
('ruper', 'ruper', 'deportista', 'ruper', 'ruper'),
('ruperi', 'ruper', 'deportista', 'ruper', 'ruper'),
('ruperia', 'ruper', 'deportista', 'ruper', 'ruper'),
('ruperia1', 'ruper', 'deportista', 'ruper', 'ruper'),
('Sharapova', 'shara', 'deportista', 'Sharapova', 'Sharapova'),
('sharapovai', 'shara', 'deportista', 'Sharapova', 'Sharapova'),
('t', 't', 'deportista', 'q', 'q'),
('t1', 't', 'deportista', 'q', 'q'),
('t10', 't', 'deportista', 'q', 'q'),
('t11', 't', 'deportista', 'q', 'q'),
('t12', 't', 'deportista', 'q', 'q'),
('t13', 't', 'deportista', 'q', 'q'),
('t14', 't', 'deportista', 'q', 'q'),
('t15', 't', 'deportista', 'q', 'q'),
('t16', 't', 'deportista', 'q', 'q'),
('t17', 't', 'deportista', 'q', 'q'),
('t18', 't', 'deportista', 'q', 'q'),
('t2', 't', 'deportista', 'q', 'q'),
('t3', 't', 'deportista', 'q', 'q'),
('t4', 't', 'deportista', 'q', 'q'),
('t5', 't', 'deportista', 'q', 'q'),
('t6', 't', 'deportista', 'q', 'q'),
('t7', 't', 'deportista', 'q', 'q'),
('t8', 't', 'deportista', 'q', 'q'),
('t9', 't', 'deportista', 'q', 'q'),
('tania', 'tania', 'deportista', 'Tania', 'Tania'),
('u', 'u', 'deportista', 'u', 'u'),
('u10', 'u5', 'deportista', 'u5', 'u5'),
('u2', 'ui', 'deportista', 'u', 'u'),
('u4', 'ui', 'deportista', 'u', 'u'),
('u5', 'u5', 'deportista', 'u', 'u'),
('u6', 'u5', 'deportista', 'u5', 'u5'),
('u7', 'u5', 'deportista', 'u5', 'u5'),
('u8', 'u5', 'deportista', 'u5', 'u5'),
('u9', 'u5', 'deportista', 'u5', 'u5'),
('ui', 'ui', 'deportista', 'u', 'u'),
('uia', 'ui', 'deportista', 'u', 'u'),
('uia1', 'ui', 'deportista', 'u', 'u'),
('uii', 'uii', 'deportista', 'u', 'u'),
('uiia', 'uii', 'deportista', 'u', 'u'),
('uiia1', 'uii', 'deportista', 'u', 'u'),
('w', 'w', 'deportista', 'q', 'q'),
('w1', 'w', 'deportista', 'q', 'q'),
('w10', 'w', 'deportista', 'q', 'q'),
('w11', 'w', 'deportista', 'q', 'q'),
('w12', 'w', 'deportista', 'q', 'q'),
('w13', 'w', 'deportista', 'q', 'q'),
('w14', 'w', 'deportista', 'q', 'q'),
('w15', 'w', 'deportista', 'q', 'q'),
('w16', 'w', 'deportista', 'q', 'q'),
('w17', 'w', 'deportista', 'q', 'q'),
('w18', 'w', 'deportista', 'q', 'q'),
('w2', 'w', 'deportista', 'q', 'q'),
('w3', 'w', 'deportista', 'q', 'q'),
('w4', 'w', 'deportista', 'q', 'q'),
('w5', 'w', 'deportista', 'q', 'q'),
('w6', 'w', 'deportista', 'q', 'q'),
('w7', 'w', 'deportista', 'q', 'q'),
('w8', 'w', 'deportista', 'q', 'q'),
('w9', 'w', 'deportista', 'q', 'q'),
('x', 'x', 'deportista', 'x', 'x'),
('x10', 'x5', 'deportista', 'x5', 'x5'),
('x2', 'xi', 'deportista', 'x', 'x'),
('x4', 'xi', 'deportista', 'x', 'x'),
('x5', 'x5', 'deportista', 'x', 'x'),
('x6', 'x5', 'deportista', 'x5', 'x5'),
('x7', 'x5', 'deportista', 'x5', 'x5'),
('x8', 'x5', 'deportista', 'x5', 'x5'),
('x9', 'x5', 'deportista', 'x5', 'x5'),
('xi', 'xi', 'deportista', 'x', 'x'),
('xia', 'xi', 'deportista', 'x', 'x'),
('xia1', 'xi', 'deportista', 'x', 'x'),
('xii', 'xii', 'deportista', 'x', 'x'),
('xiia', 'xii', 'deportista', 'x', 'x'),
('xiia1', 'xii', 'deportista', 'x', 'x'),
('y', 'y', 'deportista', 'y', 'y'),
('y10', 'y5', 'deportista', 'y5', 'y5'),
('y2', 'yi', 'deportista', 'y', 'y'),
('y4', 'yi', 'deportista', 'y', 'y'),
('y5', 'y5', 'deportista', 'y', 'y'),
('y6', 'y5', 'deportista', 'y5', 'y5'),
('y7', 'y5', 'deportista', 'y5', 'y5'),
('y8', 'y5', 'deportista', 'y5', 'y5'),
('y9', 'y5', 'deportista', 'y5', 'y5'),
('yi', 'yi', 'deportista', 'y', 'y'),
('yia', 'yi', 'deportista', 'y', 'y'),
('yia1', 'yi', 'deportista', 'y', 'y'),
('yii', 'yii', 'deportista', 'y', 'y'),
('yiia', 'yii', 'deportista', 'y', 'y'),
('yiia1', 'yii', 'deportista', 'y', 'y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO_CLASES`
--

CREATE TABLE `USUARIO_CLASES` (
  `Usuariologin` varchar(10) NOT NULL,
  `idClase` int(10) NOT NULL,
  `asistencia` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIO_CLASES`
--

INSERT INTO `USUARIO_CLASES` (`Usuariologin`, `idClase`, `asistencia`) VALUES
('alex', 1, 1),
('bejo', 1, 1),
('bejo', 2, 0),
('bejoi', 1, 0),
('costa', 1, 0),
('luis', 1, 0),
('luis', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO_PARTIDO`
--

CREATE TABLE `USUARIO_PARTIDO` (
  `login` varchar(10) NOT NULL,
  `idPartido` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CAMPEONATO`
--
ALTER TABLE `CAMPEONATO`
  ADD PRIMARY KEY (`idCampeonato`);

--
-- Indices de la tabla `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`idCategoria`,`idCampeonato`),
  ADD KEY `FKCategoria820366` (`idCampeonato`);

--
-- Indices de la tabla `CATEGORIA_PAREJA`
--
ALTER TABLE `CATEGORIA_PAREJA`
  ADD PRIMARY KEY (`CategoriaidCategoria`,`CategoriaidCampeonato`,`ParejaidPareja`),
  ADD KEY `FKCategoria_61351` (`ParejaidPareja`);

--
-- Indices de la tabla `CLASES`
--
ALTER TABLE `CLASES`
  ADD PRIMARY KEY (`idClase`),
  ADD KEY `FKClases896929` (`idEscuela`),
  ADD KEY `entrenador` (`entrenador`);

--
-- Indices de la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  ADD PRIMARY KEY (`idEnfrentamiento`),
  ADD KEY `FKEnfrentami378644` (`idGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`),
  ADD KEY `Participar1` (`idPareja1`),
  ADD KEY `Participar2` (`idPareja2`);

--
-- Indices de la tabla `ENFRENTAMIENTO_RONDA`
--
ALTER TABLE `ENFRENTAMIENTO_RONDA`
  ADD PRIMARY KEY (`idEnfrentamientoRonda`),
  ADD KEY `CategoriaidCampeonato` (`CategoriaidCampeonato`),
  ADD KEY `CategoriaidCategoria` (`CategoriaidCategoria`),
  ADD KEY `ENFRENTAMIENTO_RONDA_ibfk_3` (`idPareja1`),
  ADD KEY `ENFRENTAMIENTO_RONDA_ibfk_4` (`idPareja2`);

--
-- Indices de la tabla `ESCUELA_DEPORTIVA`
--
ALTER TABLE `ESCUELA_DEPORTIVA`
  ADD PRIMARY KEY (`idEscuela`);

--
-- Indices de la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD PRIMARY KEY (`idGrupo`,`idCategoria`,`idCampeonato`),
  ADD KEY `FKGrupo534436` (`idCategoria`,`idCampeonato`);

--
-- Indices de la tabla `GRUPO_PAREJA`
--
ALTER TABLE `GRUPO_PAREJA`
  ADD PRIMARY KEY (`GrupoidGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`,`ParejaidPareja`),
  ADD KEY `FKGrupo_Pare335066` (`ParejaidPareja`);

--
-- Indices de la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  ADD PRIMARY KEY (`idPareja`),
  ADD KEY `FKPareja935810` (`login2`),
  ADD KEY `FKPareja935811` (`login1`);

--
-- Indices de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
  ADD PRIMARY KEY (`idPartido`),
  ADD KEY `FKPartido332324` (`Usuariologin`);

--
-- Indices de la tabla `PISTA`
--
ALTER TABLE `PISTA`
  ADD PRIMARY KEY (`idPista`,`nombre`);

--
-- Indices de la tabla `PISTA_ENFRENTAMIENTO`
--
ALTER TABLE `PISTA_ENFRENTAMIENTO`
  ADD PRIMARY KEY (`PistaidPista`,`EnfrentamientoidEnfrentamiento`,`Pistanombre`),
  ADD KEY `FKPista_Enfr227256` (`EnfrentamientoidEnfrentamiento`),
  ADD KEY `FKPista_Enfr536426` (`PistaidPista`,`Pistanombre`);

--
-- Indices de la tabla `PISTA_ENFRENTAMIENTO_RONDA`
--
ALTER TABLE `PISTA_ENFRENTAMIENTO_RONDA`
  ADD PRIMARY KEY (`PistaidPista`,`Pistanombre`,`Enfrentamiento_RondaidEnfrentamientoRonda`);

--
-- Indices de la tabla `PISTA_PARTIDO`
--
ALTER TABLE `PISTA_PARTIDO`
  ADD PRIMARY KEY (`PistaidPista`,`PartidoidPartido`,`Pistanombre`),
  ADD KEY `FKPista_Part533754` (`PistaidPista`,`Pistanombre`),
  ADD KEY `FKPista_Part354171` (`PartidoidPartido`);

--
-- Indices de la tabla `PISTA_USUARIO`
--
ALTER TABLE `PISTA_USUARIO`
  ADD PRIMARY KEY (`PistaidPista`,`Usuariologin`,`Pistanombre`),
  ADD KEY `FKPista_Usua768358` (`Usuariologin`),
  ADD KEY `Reserva` (`PistaidPista`,`Pistanombre`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `USUARIO_CLASES`
--
ALTER TABLE `USUARIO_CLASES`
  ADD PRIMARY KEY (`Usuariologin`,`idClase`),
  ADD KEY `FKUsuario_Cl558557` (`idClase`);

--
-- Indices de la tabla `USUARIO_PARTIDO`
--
ALTER TABLE `USUARIO_PARTIDO`
  ADD PRIMARY KEY (`login`,`idPartido`),
  ADD KEY `fk_idPartido` (`idPartido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CAMPEONATO`
--
ALTER TABLE `CAMPEONATO`
  MODIFY `idCampeonato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `CLASES`
--
ALTER TABLE `CLASES`
  MODIFY `idClase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  MODIFY `idEnfrentamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

--
-- AUTO_INCREMENT de la tabla `ESCUELA_DEPORTIVA`
--
ALTER TABLE `ESCUELA_DEPORTIVA`
  MODIFY `idEscuela` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  MODIFY `idGrupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  MODIFY `idPareja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
  MODIFY `idPartido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD CONSTRAINT `FKCategoria820366` FOREIGN KEY (`idCampeonato`) REFERENCES `CAMPEONATO` (`idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `CATEGORIA_PAREJA`
--
ALTER TABLE `CATEGORIA_PAREJA`
  ADD CONSTRAINT `FKCategoria_61351` FOREIGN KEY (`ParejaidPareja`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKCategoria_869408` FOREIGN KEY (`CategoriaidCategoria`,`CategoriaidCampeonato`) REFERENCES `CATEGORIA` (`idCategoria`, `idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `CLASES`
--
ALTER TABLE `CLASES`
  ADD CONSTRAINT `FKClases896929` FOREIGN KEY (`idEscuela`) REFERENCES `ESCUELA_DEPORTIVA` (`idEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrenador` FOREIGN KEY (`entrenador`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  ADD CONSTRAINT `FKEnfrentami378644` FOREIGN KEY (`idGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`) REFERENCES `GRUPO` (`idGrupo`, `idCategoria`, `idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Participar1` FOREIGN KEY (`idPareja1`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Participar2` FOREIGN KEY (`idPareja2`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ENFRENTAMIENTO_RONDA`
--
ALTER TABLE `ENFRENTAMIENTO_RONDA`
  ADD CONSTRAINT `ENFRENTAMIENTO_RONDA_ibfk_1` FOREIGN KEY (`CategoriaidCampeonato`) REFERENCES `CATEGORIA` (`idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ENFRENTAMIENTO_RONDA_ibfk_2` FOREIGN KEY (`CategoriaidCategoria`) REFERENCES `CATEGORIA` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ENFRENTAMIENTO_RONDA_ibfk_3` FOREIGN KEY (`idPareja1`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ENFRENTAMIENTO_RONDA_ibfk_4` FOREIGN KEY (`idPareja2`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD CONSTRAINT `FKGrupo534436` FOREIGN KEY (`idCategoria`,`idCampeonato`) REFERENCES `CATEGORIA` (`idCategoria`, `idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `GRUPO_PAREJA`
--
ALTER TABLE `GRUPO_PAREJA`
  ADD CONSTRAINT `FKGrupo_Pare335066` FOREIGN KEY (`ParejaidPareja`) REFERENCES `PAREJA` (`idPareja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKGrupo_Pare474868` FOREIGN KEY (`GrupoidGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`) REFERENCES `GRUPO` (`idGrupo`, `idCategoria`, `idCampeonato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  ADD CONSTRAINT `FKPareja935810` FOREIGN KEY (`login2`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKPareja935811` FOREIGN KEY (`login1`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
  ADD CONSTRAINT `FKPartido332324` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PISTA_ENFRENTAMIENTO`
--
ALTER TABLE `PISTA_ENFRENTAMIENTO`
  ADD CONSTRAINT `FKPista_Enfr227256` FOREIGN KEY (`EnfrentamientoidEnfrentamiento`) REFERENCES `ENFRENTAMIENTO` (`idEnfrentamiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKPista_Enfr536426` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PISTA_ENFRENTAMIENTO_RONDA`
--
ALTER TABLE `PISTA_ENFRENTAMIENTO_RONDA`
  ADD CONSTRAINT `PISTA_ENFRENTAMIENTO_RONDA_ibfk_1` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PISTA_PARTIDO`
--
ALTER TABLE `PISTA_PARTIDO`
  ADD CONSTRAINT `FKPista_Part354171` FOREIGN KEY (`PartidoidPartido`) REFERENCES `PARTIDO` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKPista_Part533754` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PISTA_USUARIO`
--
ALTER TABLE `PISTA_USUARIO`
  ADD CONSTRAINT `FKPista_Usua768358` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reserva` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIO_CLASES`
--
ALTER TABLE `USUARIO_CLASES`
  ADD CONSTRAINT `FKUsuario_Cl558557` FOREIGN KEY (`idClase`) REFERENCES `CLASES` (`idClase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKUsuario_Cl645704` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIO_PARTIDO`
--
ALTER TABLE `USUARIO_PARTIDO`
  ADD CONSTRAINT `fk_idPartido` FOREIGN KEY (`idPartido`) REFERENCES `PARTIDO` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`login`) REFERENCES `USUARIO` (`login`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
