-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2018 a las 13:18:46
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
(1, 'Roland Garros', '2018-10-24', '2018-10-31'),
(2, 'Wimbeldon', '2018-11-29', '2018-12-27');

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
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 10),
(1, 1, 11),
(1, 1, 12),
(1, 1, 13),
(1, 1, 14),
(1, 1, 15),
(1, 1, 16),
(1, 1, 17),
(1, 1, 18),
(1, 1, 19),
(1, 1, 20),
(1, 1, 21),
(1, 1, 22),
(1, 1, 23),
(1, 1, 24);

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
  `set1` varchar(3) DEFAULT NULL,
  `set2` varchar(3) DEFAULT NULL,
  `set3` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ENFRENTAMIENTO`
--

INSERT INTO `ENFRENTAMIENTO` (`idEnfrentamiento`, `idGrupo`, `idPareja1`, `idPareja2`, `GrupoidCategoria`, `GrupoidCampeonato`, `set1`, `set2`, `set3`) VALUES
(606, 8, 1, 2, 1, 1, '0-0', '0-0', '0-0'),
(607, 8, 1, 3, 1, 1, '0-0', '0-0', '0-0'),
(608, 8, 1, 4, 1, 1, '0-0', '0-0', '0-0'),
(609, 8, 1, 5, 1, 1, '0-0', '0-0', '0-0'),
(610, 8, 1, 10, 1, 1, '0-0', '0-0', '0-0'),
(611, 8, 1, 11, 1, 1, '0-0', '0-0', '0-0'),
(612, 8, 1, 12, 1, 1, '0-0', '0-0', '0-0'),
(613, 8, 1, 13, 1, 1, '0-0', '0-0', '0-0'),
(614, 8, 1, 14, 1, 1, '0-0', '0-0', '0-0'),
(615, 8, 2, 3, 1, 1, '0-0', '0-0', '0-0'),
(616, 8, 2, 4, 1, 1, '0-0', '0-0', '0-0'),
(617, 8, 2, 5, 1, 1, '0-0', '0-0', '0-0'),
(618, 8, 2, 10, 1, 1, '0-0', '0-0', '0-0'),
(619, 8, 2, 11, 1, 1, '0-0', '0-0', '0-0'),
(620, 8, 2, 12, 1, 1, '0-0', '0-0', '0-0'),
(621, 8, 2, 13, 1, 1, '0-0', '0-0', '0-0'),
(622, 8, 2, 14, 1, 1, '0-0', '0-0', '0-0'),
(623, 8, 3, 4, 1, 1, '0-0', '0-0', '0-0'),
(624, 8, 3, 5, 1, 1, '0-0', '0-0', '0-0'),
(625, 8, 3, 10, 1, 1, '0-0', '0-0', '0-0'),
(626, 8, 3, 11, 1, 1, '0-0', '0-0', '0-0'),
(627, 8, 3, 12, 1, 1, '0-0', '0-0', '0-0'),
(628, 8, 3, 13, 1, 1, '0-0', '0-0', '0-0'),
(629, 8, 3, 14, 1, 1, '0-0', '0-0', '0-0'),
(630, 8, 4, 5, 1, 1, '0-0', '0-0', '0-0'),
(631, 8, 4, 10, 1, 1, '0-0', '0-0', '0-0'),
(632, 8, 4, 11, 1, 1, '0-0', '0-0', '0-0'),
(633, 8, 4, 12, 1, 1, '0-0', '0-0', '0-0'),
(634, 8, 4, 13, 1, 1, '0-0', '0-0', '0-0'),
(635, 8, 4, 14, 1, 1, '0-0', '0-0', '0-0'),
(636, 8, 5, 10, 1, 1, '0-0', '0-0', '0-0'),
(637, 8, 5, 11, 1, 1, '0-0', '0-0', '0-0'),
(638, 8, 5, 12, 1, 1, '0-0', '0-0', '0-0'),
(639, 8, 5, 13, 1, 1, '0-0', '0-0', '0-0'),
(640, 8, 5, 14, 1, 1, '0-0', '0-0', '0-0'),
(641, 8, 10, 11, 1, 1, '0-0', '0-0', '0-0'),
(642, 8, 10, 12, 1, 1, '0-0', '0-0', '0-0'),
(643, 8, 10, 13, 1, 1, '0-0', '0-0', '0-0'),
(644, 8, 10, 14, 1, 1, '0-0', '0-0', '0-0'),
(645, 8, 11, 12, 1, 1, '0-0', '0-0', '0-0'),
(646, 8, 11, 13, 1, 1, '0-0', '0-0', '0-0'),
(647, 8, 11, 14, 1, 1, '0-0', '0-0', '0-0'),
(648, 8, 12, 13, 1, 1, '0-0', '0-0', '0-0'),
(649, 8, 12, 14, 1, 1, '0-0', '0-0', '0-0'),
(650, 8, 13, 14, 1, 1, '0-0', '0-0', '0-0');

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
(8, 'PrimeraM 2', 1, 1),
(9, 'PrimeraM 1', 1, 1);

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
(8, 1, 1, 1),
(8, 1, 1, 2),
(8, 1, 1, 3),
(8, 1, 1, 4),
(8, 1, 1, 5),
(8, 1, 1, 10),
(8, 1, 1, 11),
(8, 1, 1, 12),
(8, 1, 1, 13),
(8, 1, 1, 14),
(9, 1, 1, 15),
(9, 1, 1, 16),
(9, 1, 1, 17),
(9, 1, 1, 18),
(9, 1, 1, 19),
(9, 1, 1, 20),
(9, 1, 1, 21),
(9, 1, 1, 22),
(9, 1, 1, 23),
(9, 1, 1, 24);

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
(1, '../Views/images/biblio.png', 'https://www.youtube.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida, justo tincidunt tristique bibendum, enim purus lacinia augue, et molestie diam erat at orci. Duis lacinia et neque vel euismod. Etiam odio urna, lacinia a orci quis, blandit imperdiet mauris. Phasellus tristique elementum nunc vitae feugiat. Duis sit amet ante porttitor neque tempus sagittis. Donec leo tortor, mollis vel semper eget, rutrum a nisl. Nunc sodales finibus molestie.'),
(4, 'wewew', 'youtube.com', 'wwewewew');

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
(3, 'noe', 'jaco'),
(4, 'jaco', 'luis'),
(5, 'alex', 'bejo'),
(10, 'alex', 'bejoi'),
(11, 'alex', 'bejoia'),
(12, 'alex', 'brais'),
(13, 'alex', 'cecilioG'),
(14, 'alex', 'cecilioGi'),
(15, 'alex', 'cecilioGia'),
(16, 'alex', 'costa'),
(17, 'alex', 'costai'),
(18, 'alex', 'e'),
(19, 'alex', 'e10'),
(20, 'alex', 'e11'),
(21, 'alex', 'e12'),
(22, 'alex', 'e13'),
(23, 'alex', 'e14'),
(24, 'alex', 'e15'),
(25, 'alex', 'e16'),
(26, 'alex', 'e17'),
(27, 'alex', 'e18'),
(34, 'e', 'e1'),
(35, 'e', 'e10'),
(36, 'e', 'e11'),
(37, 'e', 'e12'),
(38, 'e', 'e13'),
(39, 'e', 'e14'),
(40, 'e', 'e15'),
(41, 'e', 'e16'),
(42, 'e', 'e17'),
(43, 'e', 'e18'),
(44, 'e', 'e2'),
(45, 'e', 'e3'),
(46, 'e', 'e4'),
(47, 'e', 'e5'),
(48, 'e', 'e6'),
(49, 'e', 'i'),
(50, 'e', 'i10'),
(51, 'e', 'i4'),
(52, 'e', 'i4'),
(53, 'e', 'i5');

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
(1, 'adri', '2018-10-11', '13:30:00', 0),
(2, 'adri', '2018-10-11', '17:00:00', 1),
(3, 'adri', '2018-10-11', '19:00:00', 1);

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
(0, 0, 'Court2', '17:00:00', '2018-10-10'),
(1, 1, 'Court1', '09:00:00', '2018-10-10'),
(2, 1, 'Court1', '10:30:00', '2018-10-10'),
(3, 0, 'Court1', '12:00:00', '2018-10-10'),
(4, 0, 'Court1', '13:30:00', '2018-10-10'),
(5, 0, 'Court1', '17:00:00', '2018-10-10'),
(6, 0, 'Court1', '18:30:00', '2018-10-10'),
(7, 0, 'Court1', '20:00:00', '2018-10-10'),
(8, 1, 'Court2', '09:00:00', '2018-10-10'),
(9, 1, 'Court2', '10:30:00', '2018-10-10'),
(10, 0, 'Court2', '12:00:00', '2018-10-10'),
(11, 0, 'Court2', '13:30:00', '2018-10-10'),
(12, 0, 'Court2', '20:00:00', '2018-10-10'),
(13, 0, 'Court2', '18:30:00', '2018-10-10'),
(14, 0, 'Court3', '09:00:00', '2018-10-10'),
(15, 0, 'Court3', '10:30:00', '2018-10-10'),
(16, 1, 'Court3', '12:00:00', '2018-10-10'),
(17, 0, 'Court3', '13:30:00', '2018-10-10'),
(18, 0, 'Court3', '17:00:00', '2018-10-10'),
(19, 0, 'Court3', '18:30:00', '2018-10-10'),
(20, 0, 'Court3', '20:00:00', '2018-10-10'),
(21, 0, 'Court4', '09:00:00', '2018-10-10'),
(22, 0, 'Court4', '10:30:00', '2018-10-10'),
(23, 0, 'Court4', '12:00:00', '2018-10-10'),
(24, 0, 'Court4', '13:30:00', '2018-10-10'),
(25, 0, 'Court4', '17:00:00', '2018-10-10'),
(26, 0, 'Court4', '18:30:00', '2018-10-10'),
(27, 0, 'Court4', '20:00:00', '2018-10-10'),
(28, 0, 'Court4', '20:00:00', '2018-10-11'),
(29, 0, 'Court4', '09:00:00', '2018-10-11'),
(30, 0, 'Court4', '10:30:00', '2018-10-11'),
(31, 0, 'Court4', '12:00:00', '2018-10-11'),
(32, 0, 'Court4', '13:30:00', '2018-10-11'),
(33, 0, 'Court4', '17:00:00', '2018-10-11'),
(34, 0, 'Court4', '18:30:00', '2018-10-11'),
(35, 0, 'Court3', '09:00:00', '2018-10-11'),
(36, 0, 'Court3', '10:30:00', '2018-10-11'),
(37, 0, 'Court3', '12:00:00', '2018-10-11'),
(38, 0, 'Court3', '13:30:00', '2018-10-11'),
(39, 0, 'Court3', '17:00:00', '2018-10-11'),
(40, 0, 'Court3', '18:30:00', '2018-10-11'),
(41, 0, 'Court3', '20:00:00', '2018-10-11'),
(42, 0, 'Court2', '09:00:00', '2018-10-11'),
(43, 0, 'Court2', '10:30:00', '2018-10-11'),
(44, 0, 'Court2', '12:00:00', '2018-10-11'),
(45, 0, 'Court2', '13:30:00', '2018-10-11'),
(46, 0, 'Court2', '17:00:00', '2018-10-11'),
(47, 0, 'Court2', '18:30:00', '2018-10-11'),
(48, 0, 'Court2', '20:00:00', '2018-10-11'),
(49, 0, 'Court1', '09:00:00', '2018-10-11'),
(50, 0, 'Court1', '10:30:00', '2018-10-11'),
(51, 0, 'Court1', '12:00:00', '2018-10-11'),
(52, 0, 'Court1', '13:30:00', '2018-10-11'),
(53, 0, 'Court1', '17:00:00', '2018-10-11'),
(54, 0, 'Court1', '18:30:00', '2018-10-11'),
(55, 0, 'Court1', '20:00:00', '2018-10-11'),
(56, 0, 'Court1', '09:00:00', '2018-10-12'),
(57, 0, 'Court1', '10:30:00', '2018-10-12'),
(58, 0, 'Court1', '12:00:00', '2018-10-12'),
(59, 0, 'Court1', '13:30:00', '2018-10-12'),
(60, 0, 'Court1', '17:00:00', '2018-10-12'),
(61, 0, 'Court1', '18:30:00', '2018-10-12'),
(62, 0, 'Court1', '20:00:00', '2018-10-12'),
(63, 0, 'Court2', '09:00:00', '2018-10-12'),
(64, 0, 'Court2', '10:30:00', '2018-10-12'),
(65, 0, 'Court2', '12:00:00', '2018-10-12'),
(66, 0, 'Court2', '13:30:00', '2018-10-12'),
(67, 0, 'Court2', '17:00:00', '2018-10-12'),
(68, 0, 'Court2', '18:30:00', '2018-10-12'),
(69, 0, 'Court2', '20:00:00', '2018-10-12'),
(70, 0, 'Court3', '09:00:00', '2018-10-12'),
(71, 0, 'Court3', '10:30:00', '2018-10-12'),
(72, 0, 'Court3', '12:00:00', '2018-10-12'),
(73, 0, 'Court3', '13:30:00', '2018-10-12'),
(74, 0, 'Court3', '17:00:00', '2018-10-12'),
(75, 0, 'Court3', '18:30:00', '2018-10-12'),
(76, 0, 'Court3', '20:00:00', '2018-10-12'),
(77, 0, 'Court4', '09:00:00', '2018-10-12'),
(78, 0, 'Court4', '10:30:00', '2018-10-12'),
(79, 0, 'Court4', '12:00:00', '2018-10-12'),
(80, 0, 'Court4', '13:30:00', '2018-10-12'),
(81, 0, 'Court4', '17:00:00', '2018-10-12'),
(82, 0, 'Court4', '18:30:00', '2018-10-12'),
(83, 0, 'Court4', '20:00:00', '2018-10-12'),
(84, 0, 'Court1', '09:00:00', '2018-10-13'),
(85, 0, 'Court1', '10:30:00', '2018-10-13'),
(86, 0, 'Court1', '12:00:00', '2018-10-13'),
(87, 0, 'Court1', '13:30:00', '2018-10-13'),
(88, 0, 'Court1', '17:00:00', '2018-10-13'),
(89, 0, 'Court1', '18:30:00', '2018-10-13'),
(90, 0, 'Court1', '20:00:00', '2018-10-13'),
(91, 0, 'Court2', '09:00:00', '2018-10-13'),
(92, 0, 'Court2', '10:30:00', '2018-10-13'),
(93, 0, 'Court2', '12:00:00', '2018-10-13'),
(94, 0, 'Court2', '13:30:00', '2018-10-13'),
(95, 0, 'Court2', '17:00:00', '2018-10-13'),
(96, 0, 'Court2', '18:30:00', '2018-10-13'),
(97, 0, 'Court2', '20:00:00', '2018-10-13'),
(98, 0, 'Court3', '09:00:00', '2018-10-13'),
(99, 0, 'Court3', '10:30:00', '2018-10-13'),
(100, 0, 'Court3', '12:00:00', '2018-10-13'),
(101, 0, 'Court3', '13:30:00', '2018-10-13'),
(102, 0, 'Court3', '17:00:00', '2018-10-13'),
(103, 0, 'Court3', '18:30:00', '2018-10-13'),
(104, 0, 'Court3', '20:00:00', '2018-10-13'),
(105, 0, 'Court4', '09:00:00', '2018-10-13'),
(106, 0, 'Court4', '10:30:00', '2018-10-13'),
(107, 0, 'Court4', '12:00:00', '2018-10-13'),
(108, 0, 'Court4', '13:30:00', '2018-10-13'),
(109, 0, 'Court4', '17:00:00', '2018-10-13'),
(110, 0, 'Court4', '18:30:00', '2018-10-13'),
(111, 0, 'Court4', '20:00:00', '2018-10-13'),
(112, 0, 'Court1', '09:00:00', '2018-10-14'),
(113, 0, 'Court1', '10:30:00', '2018-10-14'),
(114, 0, 'Court1', '12:00:00', '2018-10-14'),
(115, 0, 'Court1', '13:30:00', '2018-10-14'),
(116, 0, 'Court1', '17:00:00', '2018-10-14'),
(117, 0, 'Court1', '18:30:00', '2018-10-14'),
(118, 0, 'Court1', '20:00:00', '2018-10-14'),
(119, 0, 'Court2', '09:00:00', '2018-10-14'),
(120, 0, 'Court2', '10:30:00', '2018-10-14'),
(121, 0, 'Court2', '12:00:00', '2018-10-14'),
(122, 0, 'Court2', '13:30:00', '2018-10-14'),
(123, 0, 'Court2', '17:00:00', '2018-10-14'),
(124, 0, 'Court2', '18:30:00', '2018-10-14'),
(125, 0, 'Court2', '20:00:00', '2018-10-14'),
(126, 0, 'Court3', '09:00:00', '2018-10-14'),
(127, 0, 'Court3', '10:30:00', '2018-10-14'),
(128, 0, 'Court3', '12:00:00', '2018-10-14'),
(129, 0, 'Court3', '13:30:00', '2018-10-14'),
(130, 0, 'Court3', '17:00:00', '2018-10-14'),
(131, 0, 'Court3', '18:30:00', '2018-10-14'),
(132, 0, 'Court3', '20:00:00', '2018-10-14'),
(133, 0, 'Court4', '09:00:00', '2018-10-14'),
(134, 0, 'Court4', '10:30:00', '2018-10-14'),
(135, 0, 'Court4', '12:00:00', '2018-10-14'),
(136, 0, 'Court4', '13:30:00', '2018-10-14'),
(137, 0, 'Court4', '17:00:00', '2018-10-14'),
(138, 0, 'Court4', '18:30:00', '2018-10-14'),
(139, 0, 'Court4', '20:00:00', '2018-10-14'),
(140, 0, 'Court1', '09:00:00', '2018-10-15'),
(141, 0, 'Court1', '10:30:00', '2018-10-15'),
(142, 0, 'Court1', '12:00:00', '2018-10-15'),
(143, 0, 'Court1', '13:30:00', '2018-10-15'),
(144, 0, 'Court1', '17:00:00', '2018-10-15'),
(145, 0, 'Court1', '18:30:00', '2018-10-15'),
(146, 0, 'Court1', '20:00:00', '2018-10-15'),
(147, 0, 'Court2', '09:00:00', '2018-10-15'),
(148, 0, 'Court2', '10:30:00', '2018-10-15'),
(149, 0, 'Court2', '12:00:00', '2018-10-15'),
(150, 0, 'Court2', '13:30:00', '2018-10-15'),
(151, 0, 'Court2', '17:00:00', '2018-10-15'),
(152, 0, 'Court2', '18:30:00', '2018-10-15'),
(153, 0, 'Court2', '20:00:00', '2018-10-15'),
(154, 0, 'Court3', '09:00:00', '2018-10-15'),
(155, 0, 'Court3', '10:30:00', '2018-10-15'),
(156, 0, 'Court3', '12:00:00', '2018-10-15'),
(157, 0, 'Court3', '13:30:00', '2018-10-15'),
(158, 0, 'Court3', '17:00:00', '2018-10-15'),
(159, 0, 'Court3', '18:30:00', '2018-10-15'),
(160, 0, 'Court3', '20:00:00', '2018-10-15'),
(161, 0, 'Court4', '09:00:00', '2018-10-15'),
(162, 0, 'Court4', '10:30:00', '2018-10-15'),
(163, 0, 'Court4', '12:00:00', '2018-10-15'),
(164, 0, 'Court4', '13:30:00', '2018-10-15'),
(165, 0, 'Court4', '17:00:00', '2018-10-15'),
(166, 0, 'Court4', '18:30:00', '2018-10-15'),
(167, 0, 'Court4', '20:00:00', '2018-10-15'),
(168, 0, 'Court1', '09:00:00', '2018-10-16'),
(169, 0, 'Court1', '10:30:00', '2018-10-16'),
(170, 0, 'Court1', '12:00:00', '2018-10-16'),
(171, 0, 'Court1', '13:30:00', '2018-10-16'),
(172, 0, 'Court1', '17:00:00', '2018-10-16'),
(173, 0, 'Court1', '18:30:00', '2018-10-16'),
(174, 0, 'Court1', '20:00:00', '2018-10-16'),
(175, 0, 'Court2', '09:00:00', '2018-10-16'),
(176, 0, 'Court2', '10:30:00', '2018-10-16'),
(177, 0, 'Court2', '12:00:00', '2018-10-16'),
(178, 0, 'Court2', '13:30:00', '2018-10-16'),
(179, 0, 'Court2', '17:00:00', '2018-10-16'),
(180, 0, 'Court2', '18:30:00', '2018-10-16'),
(181, 0, 'Court2', '20:00:00', '2018-10-16'),
(182, 0, 'Court3', '09:00:00', '2018-10-16'),
(183, 0, 'Court3', '10:30:00', '2018-10-16'),
(184, 0, 'Court3', '12:00:00', '2018-10-16'),
(185, 0, 'Court3', '13:30:00', '2018-10-16'),
(186, 0, 'Court3', '17:00:00', '2018-10-16'),
(187, 0, 'Court3', '18:30:00', '2018-10-16'),
(188, 0, 'Court3', '20:00:00', '2018-10-16'),
(189, 0, 'Court4', '09:00:00', '2018-10-16'),
(190, 0, 'Court4', '10:30:00', '2018-10-16'),
(191, 0, 'Court4', '12:00:00', '2018-10-16'),
(192, 0, 'Court4', '13:30:00', '2018-10-16'),
(193, 0, 'Court4', '17:00:00', '2018-10-16'),
(194, 0, 'Court4', '18:30:00', '2018-10-16'),
(195, 0, 'Court4', '20:00:00', '2018-10-16'),
(196, 0, 'Court1', '09:00:00', '2018-10-17'),
(197, 0, 'Court1', '10:30:00', '2018-10-17'),
(198, 0, 'Court1', '12:00:00', '2018-10-17'),
(199, 0, 'Court1', '13:30:00', '2018-10-17'),
(200, 0, 'Court1', '17:00:00', '2018-10-17'),
(201, 0, 'Court1', '18:30:00', '2018-10-17'),
(202, 0, 'Court1', '20:00:00', '2018-10-17'),
(203, 0, 'Court2', '09:00:00', '2018-10-17'),
(204, 0, 'Court2', '10:30:00', '2018-10-17'),
(205, 0, 'Court2', '12:00:00', '2018-10-17'),
(206, 0, 'Court2', '13:30:00', '2018-10-17'),
(207, 0, 'Court2', '17:00:00', '2018-10-17'),
(208, 0, 'Court2', '18:30:00', '2018-10-17'),
(209, 0, 'Court2', '20:00:00', '2018-10-17'),
(210, 0, 'Court3', '09:00:00', '2018-10-17'),
(211, 0, 'Court3', '10:30:00', '2018-10-17'),
(212, 0, 'Court3', '12:00:00', '2018-10-17'),
(213, 0, 'Court3', '13:30:00', '2018-10-17'),
(214, 0, 'Court3', '17:00:00', '2018-10-17'),
(215, 0, 'Court3', '18:30:00', '2018-10-17'),
(216, 0, 'Court3', '20:00:00', '2018-10-17'),
(217, 0, 'Court4', '09:00:00', '2018-10-17'),
(218, 0, 'Court4', '10:30:00', '2018-10-17'),
(219, 0, 'Court4', '12:00:00', '2018-10-17'),
(220, 0, 'Court4', '13:30:00', '2018-10-17'),
(221, 0, 'Court4', '17:00:00', '2018-10-17'),
(222, 0, 'Court4', '18:30:00', '2018-10-17'),
(223, 0, 'Court4', '20:00:00', '2018-10-17');

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
(1, 1, 'Court1'),
(2, 2, 'Court1'),
(3, 3, 'Court1');

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
(1, 'noe', 'Court1'),
(2, 'noe', 'Court1'),
(8, 'noe', 'Court2'),
(9, 'luis', 'Court2'),
(16, 'adri', 'Court3');

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
('ivan', 'ivan', 'deportista', 'ivan', 'fernandez'),
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
-- Indices de la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  ADD PRIMARY KEY (`idEnfrentamiento`),
  ADD KEY `FKEnfrentami378644` (`idGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`),
  ADD KEY `Participar1` (`idPareja1`),
  ADD KEY `Participar2` (`idPareja2`);

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
  MODIFY `idCampeonato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  MODIFY `idEnfrentamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT de la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  MODIFY `idGrupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  MODIFY `idPareja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
  MODIFY `idPartido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `FKPartido332324` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`);

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
  ADD CONSTRAINT `FKPista_Part354171` FOREIGN KEY (`PartidoidPartido`) REFERENCES `PARTIDO` (`idPartido`),
  ADD CONSTRAINT `FKPista_Part533754` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`);

--
-- Filtros para la tabla `PISTA_USUARIO`
--
ALTER TABLE `PISTA_USUARIO`
  ADD CONSTRAINT `FKPista_Usua768358` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`),
  ADD CONSTRAINT `Reserva` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`);

--
-- Filtros para la tabla `USUARIO_PARTIDO`
--
ALTER TABLE `USUARIO_PARTIDO`
  ADD CONSTRAINT `fk_idPartido` FOREIGN KEY (`idPartido`) REFERENCES `PARTIDO` (`idPartido`),
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`login`) REFERENCES `USUARIO` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
