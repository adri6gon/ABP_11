-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2018 a las 21:22:58
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
(2, 'Wimbledon', '2018-10-24', '2018-10-31');

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
(4, 'F', 'Primera', 2),
(5, 'F', 'Segunda', 2),
(6, 'F', 'Tercera', 2),
(7, 'F', 'Primera', 1),
(8, 'F', 'Segunda', 1),
(9, 'F', 'Tercera', 1),
(10, 'M', 'Segunda', 2),
(11, 'M', 'Primera', 2),
(12, 'M', 'Tercera', 2);

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
(1, 1, 4);

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
(1, 1, 1, 2, 1, 1, NULL, NULL, NULL),
(2, 1, 3, 4, 1, 1, NULL, NULL, NULL),
(3, 1, 1, 4, 1, 1, NULL, NULL, NULL),
(4, 1, 2, 3, 1, 1, NULL, NULL, NULL),
(5, 1, 2, 4, 1, 1, NULL, NULL, NULL),
(6, 1, 1, 3, 1, 1, NULL, NULL, NULL);

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
(1, 'MasculinoPrimera', 1, 1),
(2, 'MasculinoSegunda', 1, 1),
(3, 'MasculinoTercera', 3, 1),
(4, 'FemeninoPrimera', 7, 1),
(5, 'FemeninoSegunda', 8, 1),
(6, 'FemeninoTercera', 9, 1);

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
(1, 1, 1, 1),
(1, 1, 1, 2),
(1, 1, 1, 3),
(1, 1, 1, 4);

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
(4, 'jaco', 'luis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PARTIDO`
--

CREATE TABLE `PARTIDO` (
  `idPartido` int(10) NOT NULL,
  `Usuariologin` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `promo` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PARTIDO`
--

INSERT INTO `PARTIDO` (`idPartido`, `Usuariologin`, `fecha`, `hora`, `promo`) VALUES
(1, 'adri', '2018-10-11', '13:30:00', 0),
(2, 'adri', '2018-10-11', '17:00:00', 0),
(3, 'adri', '2018-10-11', '19:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA`
--

CREATE TABLE `PISTA` (
  `idPista` int(10) NOT NULL,
  `restriccion` tinyint(1) DEFAULT 0,
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
(8, 0, 'Court2', '09:00:00', '2018-10-10'),
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
(28, 0, 'Court4', '20:00:00', '2018-10-11');

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
(3, 1, 'Court1'),
(4, 2, 'Court1'),
(5, 3, 'Court1'),
(6, 4, 'Court1');

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
(9, 'adri', 'Court2'),
(16, 'adri', 'Court3');

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
------------------------------------------------------------
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
('brais', 'brais', 'deportista', 'brais', 'santos'),
('ivan', 'ivan', 'deportista', 'ivan', 'fernandez'),
('ivan1', 'ivan1', 'deportista', 'ivan', 'de dios'),
('jaco', 'jaco', 'deportista', 'jacobo', 'martinez'),
('luis', 'luis', 'deportista', 'luis', 'rodriguez'),
('manuel', 'manuel', 'admin', 'manuel', 'vila'),
('noe', 'noe', 'deportista', 'noe', 'ferreiro'),
('pedro', 'pedro', 'deportista', 'pedro', 'hernandez');

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
-- Indices de la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  ADD PRIMARY KEY (`idPareja`),
  ADD KEY `FKPareja935811` (`login1`),
  ADD KEY `FKPareja935810` (`login2`);

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
  MODIFY `idEnfrentamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  MODIFY `idPareja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FKCategoria820366` FOREIGN KEY (`idCampeonato`) REFERENCES `CAMPEONATO` (`idCampeonato`);

--
-- Filtros para la tabla `CATEGORIA_PAREJA`
--
ALTER TABLE `CATEGORIA_PAREJA`
  ADD CONSTRAINT `FKCategoria_61351` FOREIGN KEY (`ParejaidPareja`) REFERENCES `PAREJA` (`idPareja`),
  ADD CONSTRAINT `FKCategoria_869408` FOREIGN KEY (`CategoriaidCategoria`,`CategoriaidCampeonato`) REFERENCES `CATEGORIA` (`idCategoria`, `idCampeonato`);

--
-- Filtros para la tabla `ENFRENTAMIENTO`
--
ALTER TABLE `ENFRENTAMIENTO`
  ADD CONSTRAINT `FKEnfrentami378644` FOREIGN KEY (`idGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`) REFERENCES `GRUPO` (`idGrupo`, `idCategoria`, `idCampeonato`),
  ADD CONSTRAINT `Participar1` FOREIGN KEY (`idPareja1`) REFERENCES `PAREJA` (`idPareja`),
  ADD CONSTRAINT `Participar2` FOREIGN KEY (`idPareja2`) REFERENCES `PAREJA` (`idPareja`);

--
-- Filtros para la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD CONSTRAINT `FKGrupo534436` FOREIGN KEY (`idCategoria`,`idCampeonato`) REFERENCES `CATEGORIA` (`idCategoria`, `idCampeonato`);

--
-- Filtros para la tabla `GRUPO_PAREJA`
--
ALTER TABLE `GRUPO_PAREJA`
  ADD CONSTRAINT `FKGrupo_Pare335066` FOREIGN KEY (`ParejaidPareja`) REFERENCES `PAREJA` (`idPareja`),
  ADD CONSTRAINT `FKGrupo_Pare474868` FOREIGN KEY (`GrupoidGrupo`,`GrupoidCategoria`,`GrupoidCampeonato`) REFERENCES `GRUPO` (`idGrupo`, `idCategoria`, `idCampeonato`);

--
-- Filtros para la tabla `PAREJA`
--
ALTER TABLE `PAREJA`
  ADD CONSTRAINT `FKPareja935810` FOREIGN KEY (`login2`) REFERENCES `USUARIO` (`login`),
  ADD CONSTRAINT `FKPareja935811` FOREIGN KEY (`login1`) REFERENCES `USUARIO` (`login`);

--
-- Filtros para la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
  ADD CONSTRAINT `FKPartido332324` FOREIGN KEY (`Usuariologin`) REFERENCES `USUARIO` (`login`);

--
-- Filtros para la tabla `PISTA_ENFRENTAMIENTO`
--
ALTER TABLE `PISTA_ENFRENTAMIENTO`
  ADD CONSTRAINT `FKPista_Enfr227256` FOREIGN KEY (`EnfrentamientoidEnfrentamiento`) REFERENCES `ENFRENTAMIENTO` (`idEnfrentamiento`),
  ADD CONSTRAINT `FKPista_Enfr536426` FOREIGN KEY (`PistaidPista`,`Pistanombre`) REFERENCES `PISTA` (`idPista`, `nombre`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
