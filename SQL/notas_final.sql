-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2019 a las 19:21:33
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
CREATE DATABASE notas;
USE notas;
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
(3, 'ANALISTA PROGRAMADOR DE PHP', 'COHORTE 4', 'CURSO SOBRE PHP Y EL ANALISIS', '12 Semanas', 'SANTA ANA', 1, 1, '2019-06-22', '2019-09-11'),
(4, 'XAMARIN', 'COHORTE 5', 'CURSO DE XAMARIN', '11 semana', 'SANTA ANA', 1, 1, '2019-02-02', '2019-04-05'),
(5, 'HTML CUT', 'COHORTE 3', 'HTML CUT', '12 SEMANAS', 'SANTA ANA', 1, 1, '2019-03-04', '2019-06-07'),
(6, 'C# MVC', 'COHORTE 1', 'ORIENTADO AL APRENDIZAJE DE C# MVC', '12 semanas', 'SANTA ANA', 1, 2, '2019-07-10', '2019-07-11'),
(7, 'C# MVC', 'COHORTE 1', 'ORIENTADO AL APRENDIZAJE DE C# MVC', '12 semanas', 'SANTA ANA', 1, 3, '2019-07-10', '2019-07-11'),
(8, 'ANALISTA PROGRAMADOR PHP', 'COHORTE 6', 'Analista programador en lenguaje php', '11 SEMANAS', 'SANTA ANA', 1, 1, '2019-08-12', '2019-10-31'),
(9, 'ANALISTA PROGRAMADOR PHP', 'COHORTE 6', 'Analista programador en lenguaje php', '11 SEMANAS', 'SANTA ANA', 1, 2, '2019-07-18', '2019-07-31');

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
(1, 'ADAN ULISES', 'SAMAYOA', '1970-06-10', 'MASCULINO', '12345678-0', '2547-845678-879-9', 'PROGRAMACION', 'ADMINISTRADOR', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'JOSE MAURICIO', 'DIAZ DE VIZVAR', '1990-10-10', 'MASCULINO', '12345678-1', '0210-111111-123-1', 'PROGRAMACION', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 0),
(3, 'NOEL ', 'MORAN GALDAMEZ', '1991-07-07', 'MASCULINO', '12345678-2', '0111-999999-112-1', 'PROGRAMACION', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 1),
(4, 'ROGELIO', 'MARTINEZ ROJAS', '1979-09-09', 'MASCULINO', '12345678-3', '0133-818181-122-1', 'PSICOLOGIA', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 1),
(5, 'MONICA MARIA', 'DEL CID LOPEZ', '1985-11-03', 'FEMENINO', '12345678-4', '0440-444444-121-1', 'PSICOLOGIA', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 1),
(6, 'SILVIA', 'MUNGIA', '1985-04-08', 'FEMENINO', '12345678-5', '1234-123456-123-1', 'DOCENTE / PSICOLOGIA', 'ADMINISTRADOR', '21232f297a57a5a743894a0e4a801fc3', 1),
(7, 'DORIS', 'GRANADOS', '1998-01-01', 'FEMENINO', '12345678-6', '0210-010198-100-0', 'MATEMATICAS', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 1),
(8, 'CINDY', 'MALDONADO', '1985-02-02', 'FEMENINO', '12345678-7', '0210-02-111-10285', 'INGLES', 'DOCENTE', 'ac99fecf6fcb8c25d18788d14a5384ee', 0);

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
(1, 1, 1, 1, 'MATRICULA EN NORMALIDAD'),
(2, 1, 2, 1, 'MATRICULA EN NORMALIDAD'),
(3, 1, 3, 1, 'MATRICULA EN NORMALIDAD'),
(4, 1, 4, 1, 'MATRICULA EN NORMALIDAD'),
(5, 1, 5, 1, 'MATRICULA EN NORMALIDAD'),
(6, 1, 6, 1, 'MATRICULA EN NORMALIDAD'),
(7, 1, 7, 1, 'MATRICULA EN NORMALIDAD'),
(8, 1, 8, 1, 'MATRICULA EN NORMALIDAD'),
(9, 1, 9, 1, 'MATRICULA EN NORMALIDAD'),
(11, 6, 1, 1, 'MATRICULA EN NORMALIDAD'),
(12, 3, 10, 1, 'MATRICULA UNO DOS TRES'),
(13, 6, 5, 1, 'MATRICULA EN NORMALIDAD'),
(14, 7, 1, 1, 'MATRICULA EN NORMALIDAD'),
(15, 2, 9, 1, 'TODO BIEN, TODO CORRECTO');

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
(3, 'C# MVC FRAMEWORK', 'C', '16 horas', 2, 25, 25, 50, 0, 0, 0, 1),
(4, 'CERTIFICACIÓN C# NIVEL 1', 'CERTIFICACIÓN DE C#', '8 horas', 3, 100, 0, 0, 0, 0, 0, 1),
(6, 'INTRODUCCIÓN A BASE DE DATOS', 'MODULO BASICO DE BASE DE DATOS', '8 HORAS', 2, 30, 35, 35, 0, 0, 0, 1),
(7, 'JAVASCRIPT FRAMEWORKS', 'DESCRIBE LOS PRINCIPIO DE JAVASCRIPT Y USO DE FRAMEWORKS', '16 HORAS', 2, 25, 25, 25, 25, 0, 0, 1),
(8, 'CERTIFICACIÓN C# NIVEL 2', 'EXAMEN DE CERTIFICACION DE C# NIVEL DOS', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(9, 'REFUERZO DE HABILIDADES COMPUTACIONALES', 'MODULO DE PREPARACIÓN PARA CURSO EN GENERAL', '10 HORAS', 1, 20, 20, 20, 20, 20, 0, 1),
(10, 'HISTORIA DEL INTERNET', 'HISTORIA DEL INTERNET', '12', 1, 40, 30, 30, 0, 0, 0, 1),
(11, 'ALGORITMIA', 'LOGICA DE ALGORITMOS', '12', 1, 25, 25, 25, 25, 0, 0, 1),
(12, 'HISTORIA E INTERESES MUNDIALES', 'HISTORIA DEL INTERNET', '8', 1, 30, 30, 40, 0, 0, 0, 1),
(13, 'NOCIONES AVANZADA DE WIN ONE NT DRV TM', 'NOCIONES AVANZADAS DE WINDOWS', '16 horas', 1, 30, 30, 40, 0, 0, 0, 1),
(14, 'DATA LAYER ORM Y XML BASE DE DATOS CONEXIÓN BASE DE DATOS', 'INTORDUCCION A BASE DE DATOS', '18 HORAS', 1, 30, 30, 40, 0, 0, 0, 1),
(15, 'HTML CUT BÁSICO', 'CUT BASICO DE HTML Y DISEÑO WEB', '10 HORAS', 1, 30, 40, 30, 0, 0, 0, 1),
(16, 'ANALISIS Y TESTING DE SOFTWARE', 'ANALISIS Y TESTING DE SOFTWARE', '12', 1, 30, 30, 40, 0, 0, 0, 1),
(17, 'DATA LAYER LINQ', 'DATA LAYER  LINQ', '10 HORAS', 1, 30, 30, 40, 0, 0, 0, 1),
(18, 'PROGRAMING BEST PRACTICES', 'PROGRAMING BEST PRACTICES', '15 HORAS', 1, 30, 30, 40, 0, 0, 0, 1),
(19, 'INGLES E INVESTIGACIÓN EN INTERNET I', 'INGLES E INVESTIGACIÓN EN INTERNET I', '18 HORAS', 1, 10, 20, 20, 25, 25, 0, 1),
(20, 'LOGICA Y MATEMATICAS', 'LOGICA Y MATEMATICAS', '12 HORAS', 1, 25, 25, 25, 25, 0, 0, 1),
(21, 'C# BÁSICO', 'C# BÁSICO', '20 HORAS', 2, 30, 30, 40, 0, 0, 0, 1),
(22, 'C# INTERMEDIO Y Desing pattern', 'C# INTERMEDIO Y Desing pattern', '20 HORAS', 2, 20, 10, 20, 20, 30, 0, 1),
(23, 'HABILIDADES BLANDAS PUENTES NIVEL 1', 'HABILIDADES BLANDAS PUENTES', '80 HORAS', 5, 13, 14, 33, 40, 0, 0, 1),
(24, 'MAQUETACION BAJO XML', 'MAQUETACION DE COMPONENTES EN XML', '12 horas', 1, 25, 25, 25, 25, 0, 0, 1),
(25, 'C# AVANZADO', 'USO AVANZADO DE C# Y PATRONES DE DISEÑO', '20 HORAS', 2, 30, 30, 40, 0, 0, 0, 1),
(26, 'CERTIFICACION C# NIVEL 3', 'CERTIFICACION C# NIVEL TRES', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(27, 'GESTION INTEGRAL DE BASE DE DATOS', 'GESTION DE BASE DE DATOS', '12 horas', 2, 25, 25, 25, 25, 0, 0, 1),
(28, 'CERTIFICACION XAMARIN NIVEL 1', 'CERTIFICACION XAMARIN NIVEL UNO', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(29, 'CERTIFICACION XAMARIN NIVEL 2', 'CERTIFICACION XAMARIN NIVEL DOS', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(30, 'CERTIFICACION XAMARIN NIVEL 3', 'CERTIFICACION XAMARIN NIVEL TRES', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(31, 'CERTIFICACION HTML CUT NIVEL 1', 'CERTIFICACION HTML CUT NIVEL UNO', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(32, 'CERTIFICACION HTML CUT NIVEL 2', 'CERTIFICACION HTML CUT NIVEL DOS', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(33, 'CERTIFICACION HTML CUT NIVEL 3', 'CERTIFICACION HTML CUT NIVEL TRES', '4 HORAS', 3, 100, 0, 0, 0, 0, 0, 1),
(34, 'HABILIDADES BLANDAS PUENTES NIVEL 2', 'HABILIDADES BLANDAS PUENTES', '12 HORAS', 5, 25, 25, 50, 0, 0, 0, 1),
(35, 'PASANTIA NIVEL 2', 'PASANTIA NIVEL DOS', '240 HORAS', 4, 10, 20, 30, 40, 0, 0, 1),
(36, 'C# MVC API ADVANCED MANAGEMENT', 'USO AVANZADO DE C# MVC Y APIS', '18 HORAS', 2, 25, 25, 50, 0, 0, 0, 1),
(37, 'C# API CONSUME AND CREATION', 'CREACION Y CONSUMO DE APIS', '18 HORAS', 2, 25, 25, 25, 25, 0, 0, 1),
(38, 'C# SECURITY LAYERS', 'IMPLEMENTACION DE SEGURIDAD EN PROYECTOS C#', '20 HORAS', 2, 10, 10, 20, 25, 15, 20, 1),
(39, 'INTRODUCCION A JAVASCRIPT', 'INTRODUCCION A JAVASCRIPT', '12 HORAS', 1, 25, 25, 25, 25, 0, 0, 1);

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
(1, 1, 1, 7, 'TODO BIEN'),
(2, 1, 2, 2, 'TODO BIEN'),
(3, 1, 9, 2, 'TODO BIEN'),
(4, 1, 10, 2, 'TODO BIEN'),
(5, 1, 11, 2, 'TODO BIEN'),
(6, 1, 12, 2, 'TODO BIEN'),
(7, 1, 13, 2, 'TODO BIEN'),
(8, 1, 14, 2, 'TODO BIEN'),
(9, 1, 16, 2, 'TODO BIEN'),
(10, 1, 17, 2, 'TODO BIEN'),
(11, 1, 18, 2, 'TODO BIEN'),
(12, 1, 19, 8, 'TODO BIEN'),
(13, 1, 24, 2, 'TODO BIEN'),
(14, 1, 21, 2, 'TODO BIEN'),
(15, 1, 22, 2, 'TODO BIEN'),
(16, 1, 4, 1, 'TODO BIEN'),
(17, 1, 23, 5, 'TODO BIEN'),
(18, 6, 3, 3, 'TODO EN NORMALIDAD'),
(19, 6, 25, 3, 'TODO EN NORMALIDAD'),
(20, 6, 27, 3, 'TODO EN NORMALIDAD'),
(21, 6, 8, 1, 'TODO EN NORMALIDAD'),
(22, 6, 34, 6, 'TODO EN NORMALIDAD'),
(23, 7, 36, 3, 'MODULOS AVANZADOS'),
(24, 7, 37, 3, 'MODULOS AVANZADOS'),
(25, 7, 38, 3, 'MODULOS AVANZADOS'),
(26, 3, 1, 7, 'TODO CORRECTO'),
(27, 3, 9, 2, 'TODO CORRECTO'),
(28, 3, 10, 2, 'TODO CORRECTO'),
(29, 3, 11, 2, 'TODO CORRECTO'),
(30, 3, 12, 2, 'TODO CORRECTO'),
(31, 3, 6, 2, 'TODO CORRECTO'),
(32, 3, 7, 2, 'TODO CORRECTO'),
(33, 3, 31, 2, 'TODO CORRECTO'),
(34, 2, 1, 7, 'ninguna por el momento'),
(35, 2, 21, 2, 'ninguna por el momento');

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
(2, 'Nivel 2', 1),
(3, 'Nivel 3', 1);

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
(1, 1, 1, 10.00, 10.00, 7.00, 8.00, NULL, NULL, 'Participante matriculado con exito'),
(2, 1, 2, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(3, 1, 16, 10.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(4, 1, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(5, 1, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(6, 1, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(7, 1, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(8, 1, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(9, 1, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(10, 1, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(11, 1, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(12, 1, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(13, 1, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(14, 1, 14, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(15, 1, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(16, 1, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(17, 1, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(18, 2, 1, 10.00, 8.00, 8.00, 2.00, NULL, NULL, 'Participante matriculado con exito'),
(19, 2, 2, 8.00, 9.00, 9.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(20, 2, 16, 10.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(21, 2, 3, 10.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(22, 2, 4, 4.00, 4.00, 8.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(23, 2, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(24, 2, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(25, 2, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(26, 2, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(27, 2, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(28, 2, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(29, 2, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(30, 2, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(31, 2, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(32, 2, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(33, 2, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(34, 2, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(35, 3, 1, 10.00, 7.00, 9.00, 5.00, NULL, NULL, 'Participante matriculado con exito'),
(36, 3, 2, 8.00, 5.00, 4.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(37, 3, 16, 10.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(38, 3, 3, 0.00, 10.00, 10.00, 10.00, 4.00, NULL, 'Participante matriculado con exito'),
(39, 3, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(40, 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(41, 3, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(42, 3, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(43, 3, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(44, 3, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(45, 3, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(46, 3, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(47, 3, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(48, 3, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(49, 3, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(50, 3, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(51, 3, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(52, 4, 1, 10.00, 5.00, 5.00, 5.00, NULL, NULL, 'Participante matriculado con exito'),
(53, 4, 2, 10.00, 8.00, 8.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(54, 4, 16, 9.50, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(55, 4, 3, 0.00, 8.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(56, 4, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(57, 4, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(58, 4, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(59, 4, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(60, 4, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(61, 4, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(62, 4, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(63, 4, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(64, 4, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(65, 4, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(66, 4, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(67, 4, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(68, 4, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(69, 5, 1, 10.00, 10.00, 10.00, 9.00, NULL, NULL, 'Participante matriculado con exito'),
(70, 5, 2, 10.00, 8.00, 8.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(71, 5, 16, 9.80, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(72, 5, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(73, 5, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(74, 5, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(75, 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(76, 5, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(77, 5, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(78, 5, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(79, 5, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(80, 5, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(81, 5, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(82, 5, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(83, 5, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(84, 5, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(85, 5, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(86, 6, 1, 10.00, 2.00, 8.00, 5.00, NULL, NULL, 'Participante matriculado con exito'),
(87, 6, 2, 8.00, 8.00, 8.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(88, 6, 16, 8.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(89, 6, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(90, 6, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(91, 6, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(92, 6, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(93, 6, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(94, 6, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(95, 6, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(96, 6, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(97, 6, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(98, 6, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(99, 6, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(100, 6, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(101, 6, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(102, 6, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(103, 7, 1, 10.00, 9.00, 8.00, 7.00, NULL, NULL, 'Participante matriculado con exito'),
(104, 7, 2, 7.00, 8.00, 9.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(105, 7, 16, 8.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(106, 7, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(107, 7, 4, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(108, 7, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(109, 7, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(110, 7, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(111, 7, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(112, 7, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(113, 7, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(114, 7, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(115, 7, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(116, 7, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(117, 7, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(118, 7, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(119, 7, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(120, 8, 1, 10.00, 10.00, 10.00, 10.00, NULL, NULL, 'Participante matriculado con exito'),
(121, 8, 2, 5.00, 8.00, 8.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(122, 8, 16, 5.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(123, 8, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(124, 8, 4, 9.00, 9.00, 9.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(125, 8, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(126, 8, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(127, 8, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(128, 8, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(129, 8, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(130, 8, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(131, 8, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(132, 8, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(133, 8, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(134, 8, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(135, 8, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(136, 8, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(137, 9, 1, 10.00, 5.00, 5.00, 2.00, NULL, NULL, 'Participante matriculado con exito'),
(138, 9, 2, 9.00, 9.00, 9.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(139, 9, 16, 9.00, NULL, NULL, NULL, NULL, NULL, 'Participante matriculado con exito'),
(140, 9, 3, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'Participante matriculado con exito'),
(141, 9, 4, 8.00, 9.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(142, 9, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(143, 9, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(144, 9, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(145, 9, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(146, 9, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(147, 9, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(148, 9, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(149, 9, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(150, 9, 14, 0.00, 0.00, 0.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(151, 9, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(152, 9, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(153, 9, 13, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(154, 1, 18, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(155, 1, 21, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(156, 1, 19, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(157, 1, 20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(158, 1, 22, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(159, 10, 26, 10.00, 10.00, 10.00, 10.00, NULL, NULL, 'Participante matriculado con exito'),
(160, 10, 31, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(161, 10, 32, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(162, 10, 27, 10.00, 6.00, 10.00, 10.00, 10.00, NULL, 'Participante matriculado con exito'),
(163, 10, 28, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(164, 10, 29, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(165, 10, 30, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(166, 10, 33, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(167, 5, 18, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(168, 5, 21, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(169, 5, 19, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(170, 5, 20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(171, 5, 22, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'Participante matriculado con exito'),
(172, 1, 23, 10.00, 10.00, 10.00, NULL, NULL, NULL, 'Participante matriculado con exito'),
(173, 1, 24, 9.00, 7.00, 9.00, 10.00, NULL, NULL, 'Participante matriculado con exito'),
(174, 1, 25, 5.00, 8.00, 5.00, 7.00, 6.00, 8.00, 'Participante matriculado con exito');

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
(1, 'CARLOS ALBERTO', 'MARTINEZ LOPEZ', '1993-06-21', 'MASCULINO', '02345678-9', '4578-789459-789-9', '3456789', 'en algun lugar de santa ana', '2345-6789', 'carlos.lopez@proyectosfgk.org', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'SIGFRIDO ERNESTO', 'GOMEZ GUINEA', '1990-05-05', 'MASCULINO', '12223456-9', '', '', 'COL.METROCENTRO', '2222-2222', 'sifri@gmail.com', 'e4e4564027d73a4325024d948d167e93', 1),
(3, 'KEVIN', 'MARTINEZ AYALA', '1996-02-10', 'MASCULINO', '99999999-1', '', '', 'COL.GUATEMALA', '2222-2222', 'KEVIN@gmail.com', 'e4e4564027d73a4325024d948d167e93', 1),
(4, 'ROBERTO HAROLDO', 'MORALES CHUMAGER', '2000-10-12', 'MASCULINO', '87654321-9', '', '', 'LAMATEPEC', '2999-9999', 'roberto@hotmail.com', 'e4e4564027d73a4325024d948d167e93', 1),
(5, 'ELIZABETH ESPERANZA', 'CARRANZA MORALES', '1995-10-11', 'FEMENINO', '', '1313-123123-131-1', '', 'LAMATEPEC', '2111-1111', 'elizabeth@yahoo.com', 'e4e4564027d73a4325024d948d167e93', 1),
(6, 'CLARA HAYDEE', 'ROJAS MARTINEZ', '1990-12-12', 'FEMENINO', '', '', '3333333', 'COL.GUATEMALITA', '2999-9872', 'klariwoman@hotmail.com', 'e4e4564027d73a4325024d948d167e93', 1),
(7, 'MARGARITA TEODORA', 'CONTRERAS', '2003-03-05', 'INDEFINIDO', '10101010-9', '', '', 'COL.IVU', '2999-9999', 'teorodito@gmail.com', 'e4e4564027d73a4325024d948d167e93', 1),
(8, 'JOSE MARIO', 'DIAZ MONTORROZA', '1998-02-02', 'MASCULINO', '24578954-9', '', '', 'Col Buena Vista #2 #182', '2578-8969', 'JOSEDIAS@OUTLOOK.COM', 'e4e4564027d73a4325024d948d167e93', 1),
(9, 'ALEJANDRA DINORA', 'MARTINEZ REPREZA', '1998-05-05', 'FEMENINO', '14978245-9', '', '', 'COLONIA CUSCATLAN CASA 23', '2784-8974', 'ALEJANDRADINORAH@GMAIL.COM', 'e4e4564027d73a4325024d948d167e93', 1),
(10, 'MAURICIO ALFREDO', 'ORELLANA', '1997-07-19', 'MASCULINO', '09876543-1', '', '', 'EN ALGUN LUGAR DE SANTA ANA', '2458-8958', 'MAURICIO@OUTLOOK.COM', 'ESTUDIANTE', 1);

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
(1, 1, 1, 15, 'Creado'),
(2, 1, 2, 20, 'Creado'),
(3, 1, 3, 40, 'Creado'),
(4, 1, 4, 0, 'Creado'),
(5, 1, 5, 25, 'Creado'),
(6, 6, 1, 0, 'Creado'),
(7, 6, 2, 40, 'Creado'),
(8, 6, 3, 40, 'Creado'),
(9, 6, 4, 0, 'Creado'),
(10, 6, 5, 20, 'Creado'),
(11, 8, 1, 25, 'Creado'),
(12, 8, 2, 25, 'Creado'),
(13, 8, 3, 40, 'Creado'),
(14, 8, 4, 0, 'Creado'),
(15, 8, 5, 10, 'Creado'),
(16, 2, 1, 15, 'Creado'),
(17, 2, 2, 25, 'Creado'),
(18, 2, 3, 40, 'Creado'),
(19, 2, 4, 0, 'Creado'),
(20, 2, 5, 20, 'Creado'),
(21, 3, 1, 15, 'Creado'),
(22, 3, 2, 20, 'Creado'),
(23, 3, 3, 40, 'Creado'),
(24, 3, 4, 0, 'Creado'),
(25, 3, 5, 25, 'Creado');

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
(5, 'HABILIDADES BLANDAS', 1);

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
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `modulos_curso`
--
ALTER TABLE `modulos_curso`
  MODIFY `id_modulos_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `nivel_curso`
--
ALTER TABLE `nivel_curso`
  MODIFY `id_nivel_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `porcentajes_curso`
--
ALTER TABLE `porcentajes_curso`
  MODIFY `id_porcentajes_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  MODIFY `id_tipo_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
