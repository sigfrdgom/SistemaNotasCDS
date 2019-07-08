-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2019 a las 19:44:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(128) NOT NULL,
  `cohorte` varchar(64) NOT NULL,
  `descripcion` varchar(128) NOT NULL,
  `duracion` varchar(64) NOT NULL,
  `sede` varchar(64) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `cohorte`, `descripcion`, `duracion`, `sede`, `estado`, `nivel`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'C# MVC', 'COHORTE 1', 'mvc', '12 semanas', 'SANTA ANA', 1, 1, '2018-06-01', '2018-06-20'),
(2, 'C# XAMARIN', 'COHORTE 2', 'xamarin', '12 semanas', 'SANTA ANA', 1, 1, '2019-06-01', '2018-07-03'),
(3, 'HTML CUT', 'COHORTE 3', 'Diseño front end con tecnologias web', '12 semanas', 'SANTA ANA', 1, 1, '2018-11-10', '2019-01-23'),
(4, 'ANALISTA PROGRAMADOR PHP', 'COHORTE 4', 'Analista programador en lenguaje php', '12 semanas', 'SANTA ANA', 1, 1, '2019-01-29', '2019-04-29'),
(5, 'C# XAMARIN', 'COHORTE 5', 'Desarrollador de aplicaciones C sharp Xamarin', '11 semanas', 'SANTA ANA', 1, 1, '2019-05-13', '2019-07-06'),
(6, 'ANALISTA PROGRAMADOR PHP', 'COHORTE 6', 'Analista programador en lenguaje php', '11 semanas', 'SANTA ANA', 1, 1, '2019-07-12', '2019-09-30'),
(7, 'C# MVC', 'COHORTE 1', 'mvc', '12 semanas', 'SANTA ANA', 1, 2, '2019-06-20', '2019-06-20'),
(8, 'C# MVC', 'COHORTE 1', 'mvc', '12 semanas', 'SANTA ANA', 1, 3, '2019-06-20', '2019-06-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` set('FEMENINO','MASCULINO','INDEFINIDO') NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(17) NOT NULL,
  `especialidad` varchar(64) NOT NULL,
  `tipo_usuario` set('DOCENTE','ADMINISTRADOR') NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombres`, `apellidos`, `fecha_nacimiento`, `sexo`, `dui`, `nit`, `especialidad`, `tipo_usuario`, `pass`, `estado`) VALUES
(1, 'Juan Carlos', 'Peraza Lopez', '1998-06-16', 'MASCULINO', '21234578-9', '2547-845678-879-9', 'programacion', 'ADMINISTRADOR', '12345', 1),
(2, 'Jose Mauricio', 'Gudiel', '1998-03-06', 'MASCULINO', '21234567-9', '2547-845678-879-9', 'programacion', 'DOCENTE', '12345', 1),
(3, 'Monica', 'Monica', '1985-05-15', 'FEMENINO', '01245789-9', '0124-457895-458-7', 'psicologia', 'DOCENTE', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `id_curso`, `id_participante`, `estado`, `observaciones`) VALUES
(11, 1, 1, 1, 'TODO BIEN, TODO CORRECTO'),
(35, 7, 1, 1, 'TODO BIEN, TODO CORRECTO'),
(36, 8, 1, 1, 'TODO BIEN, TODO CORRECTO'),
(37, 1, 2, 1, 'ok todo bien'),
(38, 7, 2, 1, 'ok todo bien'),
(39, 8, 2, 1, 'ok todo bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(64) NOT NULL,
  `descripcion_modulo` varchar(255) NOT NULL,
  `horas_modulo` varchar(64) NOT NULL,
  `tipo_modulo` int(11) NOT NULL,
  `evaluacion1` tinyint(4) NOT NULL,
  `evaluacion2` tinyint(4) DEFAULT NULL,
  `evaluacion3` tinyint(4) DEFAULT NULL,
  `evaluacion4` tinyint(4) DEFAULT NULL,
  `evaluacion5` tinyint(4) DEFAULT NULL,
  `evaluacion6` tinyint(4) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nombre_modulo`, `descripcion_modulo`, `horas_modulo`, `tipo_modulo`, `evaluacion1`, `evaluacion2`, `evaluacion3`, `evaluacion4`, `evaluacion5`, `evaluacion6`, `estado`) VALUES
(1, 'LOGICA Y MATEMATICA', 'matematica', '12 horas', 1, 25, 25, 25, 25, 0, 0, 1),
(2, 'LOGICA DE PROGRAMACION', 'logica', '12 horas', 1, 25, 25, 25, 25, 0, 0, 1),
(3, 'PROGRAMACION C# BASICA', 'C', '24 horas', 2, 30, 30, 40, 0, 0, 0, 1),
(4, 'CERTIFICACION C# NIVEL UNO', 'certificacion', '4 horas', 3, 100, 0, 0, 0, 0, 0, 1),
(5, 'MAQUETACION DE INTERFACES XAML', 'maquetacion xml', '12', 3, 20, 20, 20, 20, 20, 0, 1),
(6, 'METODOLOGIA DE INVESTIGACION DE TEXTOS EN INGLES', 'ingles', '18', 1, 25, 25, 30, 20, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_curso`
--

CREATE TABLE `modulos_curso` (
  `id_modulos_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos_curso`
--

INSERT INTO `modulos_curso` (`id_modulos_curso`, `id_curso`, `id_modulo`, `id_docente`, `observaciones`) VALUES
(2, 1, 1, 1, 'Ninguna'),
(3, 1, 2, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(4, 1, 3, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(5, 1, 4, 2, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(6, 2, 1, 2, 'ninguna'),
(7, 2, 2, 2, 'ninguna'),
(8, 2, 6, 2, 'ninguna'),
(9, 2, 3, 2, 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_modulos_curso` int(11) NOT NULL,
  `nota1` float(4,2) NOT NULL DEFAULT '0.00',
  `nota2` float(4,2) DEFAULT NULL,
  `nota3` float(4,2) DEFAULT NULL,
  `nota4` float(4,2) DEFAULT NULL,
  `nota5` float(4,2) DEFAULT NULL,
  `nota6` float(4,2) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id_nota`, `id_participante`, `id_modulos_curso`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `observaciones`) VALUES
(1, 1, 2, 9.99, 8.85, 7.00, 5.00, 6.50, 10.00, 'Todo bien todo correcto'),
(2, 2, 2, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'Todo bien todo correcto'),
(3, 1, 3, 10.00, 9.00, 9.00, 9.00, 0.00, 0.00, 'ninguna'),
(4, 1, 4, 7.00, 7.00, 8.00, 0.00, 0.00, 0.00, 'ninguna'),
(5, 1, 5, 9.99, 0.00, 0.00, 0.00, 0.00, 0.00, ''),
(6, 2, 3, 0.00, 8.00, 9.00, 10.00, 0.00, 0.00, ''),
(7, 2, 4, 8.00, 8.00, 5.00, 0.00, 0.00, 0.00, 'ninguna'),
(8, 2, 5, 9.50, 0.00, 0.00, 0.00, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_participante` int(11) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` set('FEMENINO','MASCULINO','INDEFINIDO') NOT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `nit` varchar(17) DEFAULT NULL,
  `carnet_minoridad` varchar(15) DEFAULT NULL,
  `direccion` varchar(64) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_participante`, `nombres`, `apellidos`, `fecha_nacimiento`, `sexo`, `dui`, `nit`, `carnet_minoridad`, `direccion`, `telefono`, `email`, `pass`, `estado`) VALUES
(1, 'Daniel', 'Perez Perez', '1995-02-12', 'MASCULINO', '02478959-9', '4578-789459-789-9', '3456789', 'en algun lugar de santa ana', '2345-6789', 'jp@jp.com', '12345', 1),
(2, 'Maria', 'Pletiez Martinez', '1997-04-12', 'FEMENINO', '05789463-9', '0210-120497-100-9', '', 'en algun lugar de santa ana', '2440-9885', 'maria.pleitez@outlook.com', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentajes_curso`
--

CREATE TABLE `porcentajes_curso` (
  `id_porcentajes_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_tipo_modulo` int(11) NOT NULL,
  `porcentaje` double NOT NULL,
  `observacion` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `porcentajes_curso`
--

INSERT INTO `porcentajes_curso` (`id_porcentajes_curso`, `id_curso`, `id_tipo_modulo`, `porcentaje`, `observacion`) VALUES
(1, 1, 1, 15, 'Conjunto de módulos comunes'),
(2, 1, 2, 30, 'Conjunto de módulos de especialidad'),
(3, 1, 3, 40, 'Evaluación de certificación'),
(4, 1, 5, 15, 'Modulo de habilidades blandas'),
(5, 2, 1, 20, 'Conjunto de módulos comunes'),
(6, 2, 2, 25, 'Conjunto de módulos de especialidad'),
(7, 2, 5, 15, 'Modulo de habilidades blandas'),
(8, 2, 3, 40, 'Evaluación de certificación'),
(9, 3, 1, 15, 'Conjunto de módulos comunes'),
(10, 3, 2, 30, 'Conjunto de módulos de especialidad'),
(11, 3, 5, 15, 'Modulo de habilidades blandas'),
(12, 3, 3, 40, 'Evaluación de certificación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_modulo`
--

CREATE TABLE `tipo_modulo` (
  `id_tipo_modulo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_modulo`
--

INSERT INTO `tipo_modulo` (`id_tipo_modulo`, `nombre`, `estado`) VALUES
(1, 'COMUN', 1),
(2, 'ESPECIALIDAD', 1),
(3, 'CERTIFICACION', 1),
(4, 'PASANTIA', 1),
(5, 'HABILIDADES BLANDAS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `fk_id_curso2_idx` (`id_curso`),
  ADD KEY `fk_id_estudiante2_idx` (`id_participante`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `fk_tipo_modulo_idx` (`tipo_modulo`);

--
-- Indices de la tabla `modulos_curso`
--
ALTER TABLE `modulos_curso`
  ADD PRIMARY KEY (`id_modulos_curso`),
  ADD KEY `fk_id_curso_idx` (`id_curso`),
  ADD KEY `fk_docente_modulo_idx` (`id_docente`),
  ADD KEY `fk_id_modulo` (`id_modulo`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_mxp_idx` (`id_modulos_curso`),
  ADD KEY `fk_participante_idx` (`id_participante`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`);

--
-- Indices de la tabla `porcentajes_curso`
--
ALTER TABLE `porcentajes_curso`
  ADD PRIMARY KEY (`id_porcentajes_curso`),
  ADD KEY `fk_tipo_porcentaje_idx` (`id_tipo_modulo`),
  ADD KEY `fk_curso_porcentajes_idx` (`id_curso`);

--
-- Indices de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  ADD PRIMARY KEY (`id_tipo_modulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modulos_curso`
--
ALTER TABLE `modulos_curso`
  MODIFY `id_modulos_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `porcentajes_curso`
--
ALTER TABLE `porcentajes_curso`
  MODIFY `id_porcentajes_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  MODIFY `id_tipo_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_id_curso2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_estudiante2` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `fk_tipo_modulo` FOREIGN KEY (`tipo_modulo`) REFERENCES `tipo_modulo` (`id_tipo_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modulos_curso`
--
ALTER TABLE `modulos_curso`
  ADD CONSTRAINT `fk_docente_modulo` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_mxp` FOREIGN KEY (`id_modulos_curso`) REFERENCES `modulos_curso` (`id_modulos_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participante` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `porcentajes_curso`
--
ALTER TABLE `porcentajes_curso`
  ADD CONSTRAINT `fk_curso_porcentajes` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_porcentaje` FOREIGN KEY (`id_tipo_modulo`) REFERENCES `tipo_modulo` (`id_tipo_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
