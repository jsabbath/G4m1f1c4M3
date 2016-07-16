-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2016 a las 18:59:02
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_gamificame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_chat`
--

CREATE TABLE `tb_chat` (
  `intidchat` int(11) NOT NULL,
  `intidemisor` int(11) NOT NULL,
  `vchmensaje` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_persona`
--

CREATE TABLE `tb_persona` (
  `intidpersona` int(11) NOT NULL,
  `vchnombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `vchapellido` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `dtnacimiento` date NOT NULL,
  `vchemail` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `inttipopersona` int(11) NOT NULL,
  `dtregistro` date NOT NULL,
  `vchip` varchar(24) COLLATE utf8_spanish2_ci NOT NULL,
  `vchdataadicional` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_persona`
--

INSERT INTO `tb_persona` (`intidpersona`, `vchnombre`, `vchapellido`, `dtnacimiento`, `vchemail`, `inttipopersona`, `dtregistro`, `vchip`, `vchdataadicional`) VALUES
(1, 'Elver', 'Galarga', '2000-05-05', 'egalarga@gmail.com', 1, '2016-05-05', ':2', 'mozilla hoy'),
(2, 'Juanito Hitler', 'Lopez Bolaños', '1990-05-05', 'elpadre@gmail.com', 1, '2016-05-05', ':2', 'mozilla hoy'),
(3, 'Elver', 'Galarga', '2000-05-05', 'elhijo@gmail.com', 3, '2016-05-05', ':2', 'mozilla hoy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_premio`
--

CREATE TABLE `tb_premio` (
  `intidpremio` int(11) NOT NULL,
  `vchnombrepremio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `vchdescripcionpremio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `vchimgpremio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipopersona`
--

CREATE TABLE `tb_tipopersona` (
  `intidtipopersona` int(11) NOT NULL,
  `vchtipopersona` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `vchdescripciontipopersona` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `dtregistro` date NOT NULL,
  `vchip` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `vchdataadicional` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_tipopersona`
--

INSERT INTO `tb_tipopersona` (`intidtipopersona`, `vchtipopersona`, `vchdescripciontipopersona`, `dtregistro`, `vchip`, `vchdataadicional`) VALUES
(1, 'alumno', 'solo es un director', '2016-05-05', ':1', 'dede mozilla'),
(2, 'docente', 'solo es un alumno básico', '2016-05-05', ':1', 'dede mozilla'),
(3, 'director', 'este es el director', '2016-05-05', ':1', 'dede mozilla'),
(4, 'padre', 'este es el padre', '2016-05-05', ':1', 'dede mozilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE `tb_user` (
  `intiduser` int(11) NOT NULL,
  `vchusername` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `vchpassword` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `intidpersona` int(11) NOT NULL,
  `dtregistro` date NOT NULL,
  `vchip` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `vchotrosdatos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`intiduser`, `vchusername`, `vchpassword`, `intidpersona`, `dtregistro`, `vchip`, `vchotrosdatos`) VALUES
(1, 'junior@ucci.edu.pe', 'u2011110220', 1, '2016-05-07', '::1', ''),
(2, 'usuario2@gamificame.com', 'u2011110220', 2, '2016-05-18', '::1', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_persona`
--
ALTER TABLE `tb_persona`
  ADD PRIMARY KEY (`intidpersona`),
  ADD KEY `inttipopersona` (`inttipopersona`);

--
-- Indices de la tabla `tb_tipopersona`
--
ALTER TABLE `tb_tipopersona`
  ADD PRIMARY KEY (`intidtipopersona`);

--
-- Indices de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`intiduser`),
  ADD KEY `intidpersona` (`intidpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_persona`
--
ALTER TABLE `tb_persona`
  MODIFY `intidpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_tipopersona`
--
ALTER TABLE `tb_tipopersona`
  MODIFY `intidtipopersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `intiduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_persona`
--
ALTER TABLE `tb_persona`
  ADD CONSTRAINT `tb_persona_ibfk_1` FOREIGN KEY (`inttipopersona`) REFERENCES `tb_tipopersona` (`intidtipopersona`);

--
-- Filtros para la tabla `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`intidpersona`) REFERENCES `tb_persona` (`intidpersona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
