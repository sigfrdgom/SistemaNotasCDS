-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2019 a las 23:10:58
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
-- Base de datos: `notasfinal`
--
DROP DATABASE IF EXISTS notas;
CREATE DATABASE IF NOT EXISTS `notas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `notas`;

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
(1, 'C# MVC', 'COHORTE 1', 'CURSO DE MVC CON C', '12 semanas', 'SANTA ANA', 1, 1, '2019-06-01', '2019-06-20'),
(2, 'XAMARIN', 'COHORTE 2', 'CURSO DE XAMARIN', '12 semanas', 'SANTA ANA', 1, 1, '2019-06-01', '2019-07-03'),
(3, 'ANALISTA PROGRAMADOR DE PHP', 'COHORTE 1', 'CURSO SOBRE PHP Y EL ANALISIS', '12 Semanas', 'SANTA ANA', 1, 1, '2019-06-22', '2019-09-11'),
(4, 'XAMARIN', 'COHORTE 1', 'CURSO DE XAMARIN', '11 semana', 'SANTA ANA', 0, 1, '2019-02-02', '2019-04-05'),
(5, 'PROGRAMADOR JAVA', 'COHORTE 1', 'CURSO PARA APRENDE JAVA', '13 SEMANAS', 'SAN SALVADOR', 1, 1, '2019-03-04', '2019-06-07');

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
(1, 'ULISES', 'SAMAYOA', '1970-06-10', 'MASCULINO', '21234578-9', '2547-845678-879-9', 'PROGRAMACION', 'ADMINISTRADOR', '12345', 1),
(2, 'GUDIEL JOSELINO', 'DIAZ DE VIZVAR', '1990-10-10', 'MASCULINO', '12345678-9', '0210-111111-123-1', 'PROGRAMACION', 'DOCENTE', '12345', 1),
(3, 'NOEL GALDAMEZ', 'MORAN', '1991-07-07', 'MASCULINO', '19191919-9', '0111-999999-112-1', 'PROGRAMACION', 'DOCENTE', '12345', 1),
(4, 'ROGELIO', 'MARTINEZ ROJAS', '1979-09-09', 'MASCULINO', '11111111-9', '0133-818181-122-1', 'PSICOLOGIA', 'DOCENTE', '12345', 1),
(5, 'MONICA REYES', 'DEL CID LOPEZ', '1985-11-03', 'FEMENINO', '87654871-9', '0440-444444-121-1', 'PSICOLOGIA', 'DOCENTE', '12345', 1);

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
(1, 1, 1, 1, 'ninguna, todo wai'),
(2, 3, 1, 1, 'NORMAL'),
(3, 3, 2, 1, 'NORMAL'),
(4, 3, 3, 1, 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(64) NOT NULL,
  `descripcion_modulo` varchar(255) NOT NULL,
  `horas_modulo` varchar(20) NOT NULL,
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
(1, 'MATEMATICA', 'MODULO DE MATEMATICAS', '12 horas', 1, 25, 25, 25, 25, 0, 0, 1),
(2, 'LOGICA', 'MODULO DE LOGICA', '14 horas', 1, 30, 30, 40, 0, 0, 0, 1),
(3, 'C#', 'C', '16 horas', 2, 25, 25, 50, 0, 0, 0, 1),
(4, 'CERTIFICACIÓN C#', 'CERTIFICACIÓN DE C#', '8 horas', 3, 100, 0, 0, 0, 0, 0, 1),
(6, 'INTRODUCCIÓN A BASE DE DATOS', 'MODULO BASICO DE BASE DE DATOS', '8 HORAS', 2, 30, 35, 35, 0, 0, 0, 1),
(7, 'INTRODUCCION A JAVASCRIPT', 'DESCRIBE LOS PRINCIPIO DE JAVASCRIPT', '16 HORAS', 2, 25, 25, 25, 25, 0, 0, 1),
(8, 'CERTIFICACIÓN PHP', 'EXAMEN DE CERTIFICACION DE PHP', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(9, 'HABILIDADES PARA LA VIDA', 'MODULO DE PREPARACIÓN PARA LA VIDA', '30 HORAS', 1, 20, 20, 20, 20, 20, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_curso`
--

CREATE TABLE `modulos_curso` (
  `id_modulos_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos_curso`
--

INSERT INTO `modulos_curso` (`id_modulos_curso`, `id_curso`, `id_modulo`, `id_docente`, `observaciones`) VALUES
(2, 1, 1, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(3, 1, 2, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(4, 1, 3, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(5, 1, 4, 1, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_curso`
--

CREATE TABLE `nivel_curso` (
  `id_nivel_curso` int(11) NOT NULL,
  `nivel_curso` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_curso`
--

INSERT INTO `nivel_curso` (`id_nivel_curso`, `nivel_curso`, `estado`) VALUES
(1, 'Nivel 1', 1),
(2, 'Nivel 2', 0),
(3, 'Nivel 3', 0);

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
(1, 1, 2, 0.99, NULL, NULL, NULL, NULL, NULL, 'Todo bien todo correcto'),
(2, 1, 2, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'Todo bien todo correcto');

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
(1, 'CARLOS ALBERTO', 'MARTINEZ LOPEZ', '1993-06-21', 'MASCULINO', '02478959-9', '4578-789459-789-9', '3456789', 'en algun lugar de santa ana', '2345-6789', 'carlos.lopez@proyectosfgk.org', '12345', 1),
(2, 'SIGFRIDO', 'PERALTA GUEVARITA', '1990-05-05', 'MASCULINO', '12223456-9', '', '', 'COL.METROCENTRO', '2222-2222', 'sifri@gmail.com', '12345', 1),
(3, 'KEVIN', 'MARTINEZ AYALA', '1996-02-10', 'MASCULINO', '99999999-1', '', '', 'COL.GUATEMALA', '2222-2222', 'KEVIN@gmail.com', '12345', 1),
(4, 'ROBERTO', 'MORALES CHUMAGER', '2000-10-12', 'MASCULINO', '87654321-9', '', '', 'LAMATEPEC', '9999-9999', 'roberto@hotmail.com', '123456', 1),
(5, 'ELIZABETH ESPERANZA', 'CHANEL COCO', '1995-10-11', 'FEMENINO', '', '1313-123123-131-1', '', 'LAMATEPEC', '1111-1111', 'elizabeth@yahoo.com', '12345', 1),
(6, 'CLARA HAYDEE', 'ROJAS MARTINEZ', '1990-12-12', 'FEMENINO', '', '', '3333333', 'COL.GUATEMALITA', '9999-9872', 'klariwoman@hotmail.com', '12345', 1),
(7, 'MARGARITA TEODORA', 'CONTRERAS', '2003-03-05', 'INDEFINIDO', '10101010-9', '', '', 'COL.IVU', '9999-9999', 'teorodito@gmail.com', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentajes_curso`
--

CREATE TABLE `porcentajes_curso` (
  `id_porcentajes_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_tipo_modulo` int(11) NOT NULL,
  `porcentaje` double DEFAULT NULL,
  `observacion` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `porcentajes_curso`
--

INSERT INTO `porcentajes_curso` (`id_porcentajes_curso`, `id_curso`, `id_tipo_modulo`, `porcentaje`, `observacion`) VALUES
(1, 1, 1, 15, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(2, 1, 2, 45, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(3, 1, 3, 40, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

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
(3, 'CERTIFICACIÓN', 1),
(4, 'PASANTIA', 1),
(5, 'REFUERZO', 1),
(6, 'HORA SOCIAL', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_curso` (`nivel`);

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
-- Indices de la tabla `nivel_curso`
--
ALTER TABLE `nivel_curso`
  ADD PRIMARY KEY (`id_nivel_curso`);

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
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `modulos_curso`
--
ALTER TABLE `modulos_curso`
  MODIFY `id_modulos_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nivel_curso`
--
ALTER TABLE `nivel_curso`
  MODIFY `id_nivel_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `porcentajes_curso`
--
ALTER TABLE `porcentajes_curso`
  MODIFY `id_porcentajes_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  MODIFY `id_tipo_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`nivel`) REFERENCES `nivel_curso` (`id_nivel_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
