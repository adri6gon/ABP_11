-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2018 a las 18:18:11
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
(1, 'Roland Garros', '2018-11-22', '2018-12-06'),
(2, 'Wimbeldon', '2018-11-22', '2018-12-06'),
(3, 'Prueba', '2018-11-21', '2018-11-29');

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
(3, 'M', 'Tercera', 1),
(7, 'F', 'Primera', 1),
(8, 'F', 'Segunda', 1),
(9, 'F', 'Tercera', 1);

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
(1, 1, '2018-12-18', '18:00:00', 5, 3, 'Court 1', 'noe'),
(3, 2, '2018-12-20', '00:59:00', 5, 11, 'Court2', 'noe');

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
  `set3` varchar(3) DEFAULT '0-0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ENFRENTAMIENTO`
--

INSERT INTO `ENFRENTAMIENTO` (`idEnfrentamiento`, `idGrupo`, `idPareja1`, `idPareja2`, `GrupoidCategoria`, `GrupoidCampeonato`, `set1`, `set2`, `set3`) VALUES
(859, 19, 77, 78, 1, 1, '6-3', '3-6', '4-6'),
(860, 19, 77, 79, 1, 1, '6-1', '2-6', '6-4'),
(861, 19, 77, 80, 1, 1, '6-2', '3-6', '7-5'),
(862, 19, 77, 81, 1, 1, '6-4', '4-6', '6-7'),
(863, 19, 77, 82, 1, 1, '3-6', '6-2', '6-1'),
(864, 19, 77, 83, 1, 1, '1-6', '6-3', '6-0'),
(865, 19, 77, 84, 1, 1, '6-3', '2-6', '6-1'),
(866, 19, 78, 79, 1, 1, '6-2', '2-6', '7-5'),
(867, 19, 78, 80, 1, 1, '6-7', '7-6', '6-7'),
(868, 19, 78, 81, 1, 1, '1-6', '6-3', '6-3'),
(869, 19, 78, 82, 1, 1, '2-6', '6-1', '6-3'),
(870, 19, 78, 83, 1, 1, '6-3', '4-6', '6-1'),
(871, 19, 78, 84, 1, 1, '1-6', '3-6', '6-2'),
(872, 19, 79, 80, 1, 1, '2-6', '7-5', '6-1'),
(873, 19, 79, 81, 1, 1, '4-6', '7-5', '6-7'),
(874, 19, 79, 82, 1, 1, '6-3', '2-6', '2-6'),
(875, 19, 79, 83, 1, 1, '6-1', '1-6', '6-1'),
(876, 19, 79, 84, 1, 1, '6-2', '3-6', '6-2'),
(877, 19, 80, 81, 1, 1, '7-5', '5-7', '2-6'),
(878, 19, 80, 82, 1, 1, '6-3', '3-6', '6-4'),
(879, 19, 80, 83, 1, 1, '7-5', '5-7', '7-5'),
(880, 19, 80, 84, 1, 1, '1-6', '6-1', '6-1'),
(881, 19, 81, 82, 1, 1, '0-6', '6-1', '6-2'),
(882, 19, 81, 83, 1, 1, '2-6', '6-3', '6-7'),
(883, 19, 81, 84, 1, 1, '6-1', '2-6', '6-7'),
(884, 19, 82, 83, 1, 1, '6-2', '1-6', '3-6'),
(885, 19, 82, 84, 1, 1, '6-1', '2-6', '6-4'),
(886, 19, 83, 84, 1, 1, '6-1', '1-6', '6-1'),
(887, 18, 1, 70, 1, 1, '6-2', '2-6', '6-1'),
(888, 18, 1, 71, 1, 1, '2-6', '6-3', '3-6'),
(889, 18, 1, 72, 1, 1, '6-3', '4-6', '4-6'),
(890, 18, 1, 73, 1, 1, '6-3', '2-6', '7-5'),
(891, 18, 1, 74, 1, 1, '2-6', '6-1', '6-3'),
(892, 18, 1, 75, 1, 1, '6-4', '4-6', '6-2'),
(893, 18, 1, 76, 1, 1, '6-3', '3-6', '6-1'),
(894, 18, 70, 71, 1, 1, '6-4', '4-6', '7-5'),
(895, 18, 70, 72, 1, 1, '4-6', '6-2', '6-1'),
(896, 18, 70, 73, 1, 1, '6-1', '2-6', '6-3'),
(897, 18, 70, 74, 1, 1, '6-2', '4-6', '6-1'),
(898, 18, 70, 75, 1, 1, '2-6', '6-1', '6-2'),
(899, 18, 70, 76, 1, 1, '1-6', '6-3', '6-2'),
(900, 18, 71, 72, 1, 1, '4-6', '6-2', '6-1'),
(901, 18, 71, 73, 1, 1, '2-6', '6-1', '6-3'),
(902, 18, 71, 74, 1, 1, '3-6', '7-5', '7-5'),
(903, 18, 71, 75, 1, 1, '1-6', '6-1', '6-2'),
(904, 18, 71, 76, 1, 1, '2-6', '6-1', '7-5'),
(905, 18, 72, 73, 1, 1, '6-1', '2-6', '6-3'),
(906, 18, 72, 74, 1, 1, '6-2', '3-6', '6-7'),
(907, 18, 72, 75, 1, 1, '7-5', '5-7', '6-1'),
(908, 18, 72, 76, 1, 1, '2-6', '6-3', '6-4'),
(909, 18, 73, 74, 1, 1, '1-6', '6-4', '4-6'),
(910, 18, 73, 75, 1, 1, '2-6', '6-3', '6-2'),
(911, 18, 73, 76, 1, 1, '1-6', '6-3', '6-2'),
(912, 18, 74, 75, 1, 1, '2-6', '6-4', '6-3'),
(913, 18, 74, 76, 1, 1, '6-1', '2-6', '6-4'),
(914, 18, 75, 76, 1, 1, '6-1', '2-6', '6-4'),
(915, 20, 54, 55, 0, 3, '6-2', '6-3', '0-0'),
(916, 20, 54, 56, 0, 3, '6-1', '5-7', '6-4'),
(917, 20, 54, 57, 0, 3, '6-4', '3-6', '6-3'),
(918, 20, 54, 58, 0, 3, '0-0', '0-0', '0-0'),
(919, 20, 54, 59, 0, 3, '0-0', '0-0', '0-0'),
(920, 20, 54, 60, 0, 3, '0-0', '0-0', '0-0'),
(921, 20, 54, 61, 0, 3, '0-0', '0-0', '0-0'),
(922, 20, 55, 56, 0, 3, '0-0', '0-0', '0-0'),
(923, 20, 55, 57, 0, 3, '0-0', '0-0', '0-0'),
(924, 20, 55, 58, 0, 3, '0-0', '0-0', '0-0'),
(925, 20, 55, 59, 0, 3, '0-0', '0-0', '0-0'),
(926, 20, 55, 60, 0, 3, '0-0', '0-0', '0-0'),
(927, 20, 55, 61, 0, 3, '0-0', '0-0', '0-0'),
(928, 20, 56, 57, 0, 3, '0-0', '0-0', '0-0'),
(929, 20, 56, 58, 0, 3, '0-0', '0-0', '0-0'),
(930, 20, 56, 59, 0, 3, '0-0', '0-0', '0-0'),
(931, 20, 56, 60, 0, 3, '0-0', '0-0', '0-0'),
(932, 20, 56, 61, 0, 3, '0-0', '0-0', '0-0'),
(933, 20, 57, 58, 0, 3, '0-0', '0-0', '0-0'),
(934, 20, 57, 59, 0, 3, '0-0', '0-0', '0-0'),
(935, 20, 57, 60, 0, 3, '0-0', '0-0', '0-0'),
(936, 20, 57, 61, 0, 3, '0-0', '0-0', '0-0'),
(937, 20, 58, 59, 0, 3, '0-0', '0-0', '0-0'),
(938, 20, 58, 60, 0, 3, '0-0', '0-0', '0-0'),
(939, 20, 58, 61, 0, 3, '0-0', '0-0', '0-0'),
(940, 20, 59, 60, 0, 3, '0-0', '0-0', '0-0'),
(941, 20, 59, 61, 0, 3, '0-0', '0-0', '0-0'),
(942, 20, 60, 61, 0, 3, '0-0', '0-0', '0-0'),
(943, 21, 62, 63, 0, 3, '0-0', '0-0', '0-0'),
(944, 21, 62, 64, 0, 3, '0-0', '0-0', '0-0'),
(945, 21, 62, 65, 0, 3, '0-0', '0-0', '0-0'),
(946, 21, 62, 66, 0, 3, '0-0', '0-0', '0-0'),
(947, 21, 62, 67, 0, 3, '0-0', '0-0', '0-0'),
(948, 21, 62, 68, 0, 3, '0-0', '0-0', '0-0'),
(949, 21, 62, 69, 0, 3, '0-0', '0-0', '0-0'),
(950, 21, 63, 64, 0, 3, '0-0', '0-0', '0-0'),
(951, 21, 63, 65, 0, 3, '0-0', '0-0', '0-0'),
(952, 21, 63, 66, 0, 3, '0-0', '0-0', '0-0'),
(953, 21, 63, 67, 0, 3, '0-0', '0-0', '0-0'),
(954, 21, 63, 68, 0, 3, '0-0', '0-0', '0-0'),
(955, 21, 63, 69, 0, 3, '0-0', '0-0', '0-0'),
(956, 21, 64, 65, 0, 3, '0-0', '0-0', '0-0'),
(957, 21, 64, 66, 0, 3, '0-0', '0-0', '0-0'),
(958, 21, 64, 67, 0, 3, '0-0', '0-0', '0-0'),
(959, 21, 64, 68, 0, 3, '0-0', '0-0', '0-0'),
(960, 21, 64, 69, 0, 3, '0-0', '0-0', '0-0'),
(961, 21, 65, 66, 0, 3, '0-0', '0-0', '0-0'),
(962, 21, 65, 67, 0, 3, '0-0', '0-0', '0-0'),
(963, 21, 65, 68, 0, 3, '0-0', '0-0', '0-0'),
(964, 21, 65, 69, 0, 3, '0-0', '0-0', '0-0'),
(965, 21, 66, 67, 0, 3, '0-0', '0-0', '0-0'),
(966, 21, 66, 68, 0, 3, '0-0', '0-0', '0-0'),
(967, 21, 66, 69, 0, 3, '0-0', '0-0', '0-0'),
(968, 21, 67, 68, 0, 3, '0-0', '0-0', '0-0'),
(969, 21, 67, 69, 0, 3, '0-0', '0-0', '0-0'),
(970, 21, 68, 69, 0, 3, '0-0', '0-0', '0-0');

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
(89, 't10', 't11');

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
(7, 'adri', '2018-11-23', '09:00:00', 1),
(8, 'adri', '2018-11-23', '09:00:00', 1),
(9, 'adri', '2018-11-22', '12:00:00', 1);

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
(0, 0, 'Court2', '17:00:00', '2018-11-22'),
(1, 1, 'Court1', '09:00:00', '2018-11-22'),
(2, 1, 'Court1', '10:30:00', '2018-11-22'),
(3, 0, 'Court1', '12:00:00', '2018-11-22'),
(4, 1, 'Court1', '13:30:00', '2018-11-22'),
(5, 0, 'Court1', '17:00:00', '2018-11-22'),
(6, 0, 'Court1', '18:30:00', '2018-11-22'),
(7, 0, 'Court1', '20:00:00', '2018-11-22'),
(8, 0, 'Court2', '09:00:00', '2018-11-22'),
(9, 1, 'Court2', '10:30:00', '2018-11-22'),
(10, 1, 'Court2', '12:00:00', '2018-11-22'),
(11, 1, 'Court2', '13:30:00', '2018-11-22'),
(12, 0, 'Court2', '20:00:00', '2018-11-22'),
(13, 0, 'Court2', '18:30:00', '2018-11-22'),
(14, 0, 'Court3', '09:00:00', '2018-11-22'),
(15, 0, 'Court3', '10:30:00', '2018-11-22'),
(16, 0, 'Court3', '12:00:00', '2018-11-22'),
(17, 0, 'Court3', '13:30:00', '2018-11-22'),
(18, 0, 'Court3', '17:00:00', '2018-11-22'),
(19, 1, 'Court3', '18:30:00', '2018-11-22'),
(20, 0, 'Court3', '20:00:00', '2018-11-22'),
(21, 0, 'Court4', '09:00:00', '2018-11-22'),
(22, 0, 'Court4', '10:30:00', '2018-11-22'),
(23, 0, 'Court4', '12:00:00', '2018-11-22'),
(24, 0, 'Court4', '13:30:00', '2018-11-22'),
(25, 0, 'Court4', '17:00:00', '2018-11-22'),
(26, 0, 'Court4', '18:30:00', '2018-11-22'),
(27, 0, 'Court4', '20:00:00', '2018-11-22'),
(28, 0, 'Court4', '20:00:00', '2018-11-23'),
(29, 0, 'Court4', '09:00:00', '2018-11-23'),
(30, 0, 'Court4', '10:30:00', '2018-11-23'),
(31, 0, 'Court4', '12:00:00', '2018-11-23'),
(32, 0, 'Court4', '13:30:00', '2018-11-23'),
(33, 0, 'Court4', '17:00:00', '2018-11-23'),
(34, 0, 'Court4', '18:30:00', '2018-11-23'),
(35, 0, 'Court3', '09:00:00', '2018-11-23'),
(36, 0, 'Court3', '10:30:00', '2018-11-23'),
(37, 0, 'Court3', '12:00:00', '2018-11-23'),
(38, 0, 'Court3', '13:30:00', '2018-11-23'),
(39, 0, 'Court3', '17:00:00', '2018-11-23'),
(40, 0, 'Court3', '18:30:00', '2018-11-23'),
(41, 0, 'Court3', '20:00:00', '2018-11-23'),
(42, 0, 'Court2', '09:00:00', '2018-11-23'),
(43, 0, 'Court2', '10:30:00', '2018-11-23'),
(44, 0, 'Court2', '12:00:00', '2018-11-23'),
(45, 0, 'Court2', '13:30:00', '2018-11-23'),
(46, 0, 'Court2', '17:00:00', '2018-11-23'),
(47, 0, 'Court2', '18:30:00', '2018-11-23'),
(48, 0, 'Court2', '20:00:00', '2018-11-23'),
(49, 0, 'Court1', '09:00:00', '2018-11-23'),
(50, 0, 'Court1', '10:30:00', '2018-11-23'),
(51, 0, 'Court1', '12:00:00', '2018-11-23'),
(52, 0, 'Court1', '13:30:00', '2018-11-23'),
(53, 0, 'Court1', '17:00:00', '2018-11-23'),
(54, 0, 'Court1', '18:30:00', '2018-11-23'),
(55, 0, 'Court1', '20:00:00', '2018-11-23'),
(56, 0, 'Court1', '09:00:00', '2018-11-24'),
(57, 0, 'Court1', '10:30:00', '2018-11-24'),
(58, 0, 'Court1', '12:00:00', '2018-11-24'),
(59, 0, 'Court1', '13:30:00', '2018-11-24'),
(60, 0, 'Court1', '17:00:00', '2018-11-24'),
(61, 0, 'Court1', '18:30:00', '2018-11-24'),
(62, 0, 'Court1', '20:00:00', '2018-11-24'),
(63, 0, 'Court2', '09:00:00', '2018-11-24'),
(64, 0, 'Court2', '10:30:00', '2018-11-24'),
(65, 0, 'Court2', '12:00:00', '2018-11-24'),
(66, 0, 'Court2', '13:30:00', '2018-11-24'),
(67, 0, 'Court2', '17:00:00', '2018-11-24'),
(68, 0, 'Court2', '18:30:00', '2018-11-24'),
(69, 0, 'Court2', '20:00:00', '2018-11-24'),
(70, 0, 'Court3', '09:00:00', '2018-11-24'),
(71, 0, 'Court3', '10:30:00', '2018-11-24'),
(72, 0, 'Court3', '12:00:00', '2018-11-24'),
(73, 0, 'Court3', '13:30:00', '2018-11-24'),
(74, 0, 'Court3', '17:00:00', '2018-11-24'),
(75, 0, 'Court3', '18:30:00', '2018-11-24'),
(76, 0, 'Court3', '20:00:00', '2018-11-24'),
(77, 0, 'Court4', '09:00:00', '2018-11-24'),
(78, 0, 'Court4', '10:30:00', '2018-11-24'),
(79, 0, 'Court4', '12:00:00', '2018-11-24'),
(80, 0, 'Court4', '13:30:00', '2018-11-24'),
(81, 0, 'Court4', '17:00:00', '2018-11-24'),
(82, 0, 'Court4', '18:30:00', '2018-11-24'),
(83, 0, 'Court4', '20:00:00', '2018-11-24'),
(84, 0, 'Court1', '09:00:00', '2018-11-25'),
(85, 0, 'Court1', '10:30:00', '2018-11-25'),
(86, 0, 'Court1', '12:00:00', '2018-11-25'),
(87, 0, 'Court1', '13:30:00', '2018-11-25'),
(88, 0, 'Court1', '17:00:00', '2018-11-25'),
(89, 0, 'Court1', '18:30:00', '2018-11-25'),
(90, 0, 'Court1', '20:00:00', '2018-11-25'),
(91, 0, 'Court2', '09:00:00', '2018-11-25'),
(92, 0, 'Court2', '10:30:00', '2018-11-25'),
(93, 0, 'Court2', '12:00:00', '2018-11-25'),
(94, 0, 'Court2', '13:30:00', '2018-11-25'),
(95, 0, 'Court2', '17:00:00', '2018-11-25'),
(96, 0, 'Court2', '18:30:00', '2018-11-25'),
(97, 0, 'Court2', '20:00:00', '2018-11-25'),
(98, 0, 'Court3', '09:00:00', '2018-11-25'),
(99, 0, 'Court3', '10:30:00', '2018-11-25'),
(100, 0, 'Court3', '12:00:00', '2018-11-25'),
(101, 0, 'Court3', '13:30:00', '2018-11-25'),
(102, 0, 'Court3', '17:00:00', '2018-11-25'),
(103, 0, 'Court3', '18:30:00', '2018-11-25'),
(104, 0, 'Court3', '20:00:00', '2018-11-25'),
(105, 0, 'Court4', '09:00:00', '2018-11-25'),
(106, 0, 'Court4', '10:30:00', '2018-11-25'),
(107, 0, 'Court4', '12:00:00', '2018-11-25'),
(108, 0, 'Court4', '13:30:00', '2018-11-25'),
(109, 0, 'Court4', '17:00:00', '2018-11-25'),
(110, 0, 'Court4', '18:30:00', '2018-11-25'),
(111, 0, 'Court4', '20:00:00', '2018-11-25'),
(112, 0, 'Court1', '09:00:00', '2018-11-26'),
(113, 0, 'Court1', '10:30:00', '2018-11-26'),
(114, 0, 'Court1', '12:00:00', '2018-11-26'),
(115, 0, 'Court1', '13:30:00', '2018-11-26'),
(116, 0, 'Court1', '17:00:00', '2018-11-26'),
(117, 0, 'Court1', '18:30:00', '2018-11-26'),
(118, 0, 'Court1', '20:00:00', '2018-11-26'),
(119, 0, 'Court2', '09:00:00', '2018-11-26'),
(120, 0, 'Court2', '10:30:00', '2018-11-26'),
(121, 0, 'Court2', '12:00:00', '2018-11-26'),
(122, 0, 'Court2', '13:30:00', '2018-11-26'),
(123, 0, 'Court2', '17:00:00', '2018-11-26'),
(124, 0, 'Court2', '18:30:00', '2018-11-26'),
(125, 0, 'Court2', '20:00:00', '2018-11-26'),
(126, 0, 'Court3', '09:00:00', '2018-11-26'),
(127, 0, 'Court3', '10:30:00', '2018-11-26'),
(128, 0, 'Court3', '12:00:00', '2018-11-26'),
(129, 0, 'Court3', '13:30:00', '2018-11-26'),
(130, 0, 'Court3', '17:00:00', '2018-11-26'),
(131, 0, 'Court3', '18:30:00', '2018-11-26'),
(132, 0, 'Court3', '20:00:00', '2018-11-26'),
(133, 0, 'Court4', '09:00:00', '2018-11-26'),
(134, 0, 'Court4', '10:30:00', '2018-11-26'),
(135, 0, 'Court4', '12:00:00', '2018-11-26'),
(136, 0, 'Court4', '13:30:00', '2018-11-26'),
(137, 0, 'Court4', '17:00:00', '2018-11-26'),
(138, 0, 'Court4', '18:30:00', '2018-11-26'),
(139, 0, 'Court4', '20:00:00', '2018-11-26'),
(140, 0, 'Court1', '09:00:00', '2018-11-27'),
(141, 0, 'Court1', '10:30:00', '2018-11-27'),
(142, 0, 'Court1', '12:00:00', '2018-11-27'),
(143, 0, 'Court1', '13:30:00', '2018-11-27'),
(144, 0, 'Court1', '17:00:00', '2018-11-27'),
(145, 0, 'Court1', '18:30:00', '2018-11-27'),
(146, 0, 'Court1', '20:00:00', '2018-11-27'),
(147, 0, 'Court2', '09:00:00', '2018-11-27'),
(148, 0, 'Court2', '10:30:00', '2018-11-27'),
(149, 0, 'Court2', '12:00:00', '2018-11-27'),
(150, 0, 'Court2', '13:30:00', '2018-11-27'),
(151, 0, 'Court2', '17:00:00', '2018-11-27'),
(152, 0, 'Court2', '18:30:00', '2018-11-27'),
(153, 0, 'Court2', '20:00:00', '2018-11-27'),
(154, 0, 'Court3', '09:00:00', '2018-11-27'),
(155, 0, 'Court3', '10:30:00', '2018-11-27'),
(156, 0, 'Court3', '12:00:00', '2018-11-27'),
(157, 0, 'Court3', '13:30:00', '2018-11-27'),
(158, 0, 'Court3', '17:00:00', '2018-11-27'),
(159, 0, 'Court3', '18:30:00', '2018-11-27'),
(160, 0, 'Court3', '20:00:00', '2018-11-27'),
(161, 0, 'Court4', '09:00:00', '2018-11-27'),
(162, 0, 'Court4', '10:30:00', '2018-11-27'),
(163, 0, 'Court4', '12:00:00', '2018-11-27'),
(164, 0, 'Court4', '13:30:00', '2018-11-27'),
(165, 0, 'Court4', '17:00:00', '2018-11-27'),
(166, 0, 'Court4', '18:30:00', '2018-11-27'),
(167, 0, 'Court4', '20:00:00', '2018-11-27'),
(168, 0, 'Court1', '09:00:00', '2018-11-28'),
(169, 0, 'Court1', '10:30:00', '2018-11-28'),
(170, 0, 'Court1', '12:00:00', '2018-11-28'),
(171, 0, 'Court1', '13:30:00', '2018-11-28'),
(172, 0, 'Court1', '17:00:00', '2018-11-28'),
(173, 0, 'Court1', '18:30:00', '2018-11-28'),
(174, 0, 'Court1', '20:00:00', '2018-11-28'),
(175, 0, 'Court2', '09:00:00', '2018-11-28'),
(176, 0, 'Court2', '10:30:00', '2018-11-28'),
(177, 0, 'Court2', '12:00:00', '2018-11-28'),
(178, 0, 'Court2', '13:30:00', '2018-11-28'),
(179, 0, 'Court2', '17:00:00', '2018-11-28'),
(180, 0, 'Court2', '18:30:00', '2018-11-28'),
(181, 0, 'Court2', '20:00:00', '2018-11-28'),
(182, 0, 'Court3', '09:00:00', '2018-11-28'),
(183, 0, 'Court3', '10:30:00', '2018-11-28'),
(184, 0, 'Court3', '12:00:00', '2018-11-28'),
(185, 0, 'Court3', '13:30:00', '2018-11-28'),
(186, 0, 'Court3', '17:00:00', '2018-11-28'),
(187, 0, 'Court3', '18:30:00', '2018-11-28'),
(188, 0, 'Court3', '20:00:00', '2018-11-28'),
(189, 0, 'Court4', '09:00:00', '2018-11-28'),
(190, 0, 'Court4', '10:30:00', '2018-11-28'),
(191, 0, 'Court4', '12:00:00', '2018-11-28'),
(192, 0, 'Court4', '13:30:00', '2018-11-28'),
(193, 0, 'Court4', '17:00:00', '2018-11-28'),
(194, 0, 'Court4', '18:30:00', '2018-11-28'),
(195, 0, 'Court4', '20:00:00', '2018-11-28'),
(196, 0, 'Court1', '09:00:00', '2018-11-29'),
(197, 0, 'Court1', '10:30:00', '2018-11-29'),
(198, 0, 'Court1', '12:00:00', '2018-11-29'),
(199, 0, 'Court1', '13:30:00', '2018-11-29'),
(200, 0, 'Court1', '17:00:00', '2018-11-29'),
(201, 0, 'Court1', '18:30:00', '2018-11-29'),
(202, 0, 'Court1', '20:00:00', '2018-11-29'),
(203, 0, 'Court2', '09:00:00', '2018-11-29'),
(204, 0, 'Court2', '10:30:00', '2018-11-29'),
(205, 0, 'Court2', '12:00:00', '2018-11-29'),
(206, 0, 'Court2', '13:30:00', '2018-11-29'),
(207, 0, 'Court2', '17:00:00', '2018-11-29'),
(208, 0, 'Court2', '18:30:00', '2018-11-29'),
(209, 0, 'Court2', '20:00:00', '2018-11-29'),
(210, 0, 'Court3', '09:00:00', '2018-11-29'),
(211, 0, 'Court3', '10:30:00', '2018-11-29'),
(212, 0, 'Court3', '12:00:00', '2018-11-29'),
(213, 0, 'Court3', '13:30:00', '2018-11-29'),
(214, 0, 'Court3', '17:00:00', '2018-11-29'),
(215, 0, 'Court3', '18:30:00', '2018-11-29'),
(216, 0, 'Court3', '20:00:00', '2018-11-29'),
(217, 0, 'Court4', '09:00:00', '2018-11-29'),
(218, 0, 'Court4', '10:30:00', '2018-11-29'),
(219, 0, 'Court4', '12:00:00', '2018-11-29'),
(220, 0, 'Court4', '13:30:00', '2018-11-29'),
(221, 0, 'Court4', '17:00:00', '2018-11-29'),
(222, 0, 'Court4', '18:30:00', '2018-11-29'),
(223, 0, 'Court4', '20:00:00', '2018-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA_ENFRENTAMIENTO`
--

CREATE TABLE `PISTA_ENFRENTAMIENTO` (
  `PistaidPista` int(10) NOT NULL,
  `EnfrentamientoidEnfrentamiento` int(10) NOT NULL,
  `Pistanombre` varchar(30) NOT NULL
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

--
-- Volcado de datos para la tabla `PISTA_PARTIDO`
--

INSERT INTO `PISTA_PARTIDO` (`PistaidPista`, `PartidoidPartido`, `Pistanombre`) VALUES
(1, 7, 'Court1'),
(1, 8, 'Court1'),
(1, 9, 'Court1');

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
(2, 'luis', 'Court1'),
(4, 'luis', 'Court1'),
(9, 'luis', 'Court2'),
(10, 'luis', 'Court2'),
(11, 'adri', 'Court2'),
(17, 'noe', 'Court3'),
(19, 'noe', 'Court3');

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
('bejoi', 1, 1),
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
  MODIFY `idPareja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
