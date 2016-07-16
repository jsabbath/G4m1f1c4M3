-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2016 a las 01:05:32
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

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
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nvchidpersona` int(11) NOT NULL,
  `nvchdni` varchar(8) NOT NULL,
  `nvchnombre` varchar(50) NOT NULL DEFAULT '0',
  `nvchapellido` varchar(50) NOT NULL DEFAULT '0',
  `nvchcorreo` varchar(50) NOT NULL,
  `chrgenero` tinyint(4) NOT NULL DEFAULT '0',
  `chrtipopersona` tinyint(4) NOT NULL,
  `nvchdnihijo` varchar(8) NOT NULL,
  `dtnacimiento` varchar(20) DEFAULT NULL,
  `dtregistro` varchar(20) DEFAULT NULL,
  `nvchalias` varchar(100) NOT NULL,
  `vchimgbanner` varchar(250) NOT NULL,
  `vchimg` varchar(250) NOT NULL,
  `nvchintereses` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nvchidpersona`, `nvchdni`, `nvchnombre`, `nvchapellido`, `nvchcorreo`, `chrgenero`, `chrtipopersona`, `nvchdnihijo`, `dtnacimiento`, `dtregistro`, `nvchalias`, `vchimgbanner`, `vchimg`, `nvchintereses`) VALUES
(1, '73935286', 'luis Ã¡ngel', 'rivera canales', 'luis@gmail.com', 1, 1, '', '2016-06-08', '2016-06-18', 'mayimboo', 'fondoperfil.jpg', 'face-7.jpg', 'soy muy animoso, y estoy en sustentaciÃ³n de consultoria'),
(2, '07454546', 'PÃ©rez', 'yauricasa apumayta', 'junior@gmail.com', 2, 1, '12312312', '2016-06-11', '2016-06-03', 'josh', '', '', ''),
(28, '55555553', 'Juanito hitler', 'Maldonado bonaparte', 'punkjosh@gmail.com', 1, 1, '', '2016-07-13', '2016-07-16', '', '', '', ''),
(29, '07654237', 'Liliana', 'andrade serpa', 'jlopez@gmail.com', 2, 2, '99999999', '2016-07-14', '2016-07-09', '', '', '', ''),
(30, '12121212', 'Liliana campos', ' sadoval meltrozo', 'carlos@gmail.com', 2, 2, '21322133', '2016-07-13', '2016-07-07', '', '', '', ''),
(32, '75000577', 'andres', 'yauricasa apumayta', 'jlopez@gmail.com', 2, 2, '12312312', '2016-07-05', '2016-07-21', '', '', '', ''),
(36, '13131313', 'esther', 'yauricasa apumayta', 'junior@gmail.com', 1, 1, '', '2016-07-23', '2016-07-15', '', '', '', ''),
(37, '14141414', 'amparo', 'solier nedrano', 'luis@gmail.com', 2, 1, '', '2016-07-30', '2016-07-08', '', '', '', ''),
(38, '15151515', 'edita lorena', 'cajas tupia', 'luis@gmail.com', 2, 3, '', '2016-07-23', '2016-07-15', '', '', '', ''),
(39, '16161616', 'luis angel', 'yauricasa apumayta', 'luis@gmail.com', 1, 1, '', '2016-07-20', '2016-07-02', '', '', '', ''),
(40, '0000009', 'pero', 'yuri', 'pyuri@gmail.com', 1, 3, '', '2016-07-06', '2016-07-08', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `intidcategoria` int(11) NOT NULL,
  `nvchcategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`intidcategoria`, `nvchcategoria`) VALUES
(1, 'Números');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_chat`
--

CREATE TABLE `tb_chat` (
  `intidchat` int(11) NOT NULL,
  `intidyo` int(11) NOT NULL,
  `intidtu` int(11) NOT NULL,
  `nvchmsj` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_chat`
--

INSERT INTO `tb_chat` (`intidchat`, `intidyo`, `intidtu`, `nvchmsj`) VALUES
(1, 1, 2, 'hola profesor buenas noches'),
(2, 1, 3, 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISICING ELIT. MINIMA MODI PERFERENDIS ULLAM HARUM SIMILIQUE EXPLICABO ARCHITECTO ALIQUID REM ID VEL DEBITIS, INVENTORE TOTAM MAIORES ENIM IUSTO EARUM FUGIT IURE, ASSUMENDA\n'),
(3, 2, 1, 'hola que tal?'),
(4, 2, 1, 'hola como etas?'),
(5, 2, 1, 'una pregunta'),
(20, 1, 2, ':D'),
(21, 1, 2, ':V'),
(32, 1, 2, 'hole nuevamente'),
(33, 1, 2, 'hole nuevamente'),
(34, 1, 2, 'aqui otra vez profe que tal?'),
(35, 1, 2, 'hola profe'),
(36, 1, 3, 'como anda profe'),
(37, 1, 3, 'hola como anda='),
(38, 1, 2, 'buenas profesor'),
(39, 1, 3, 'buenas noches docente'),
(40, 1, 3, 'ssdfsdfsdf'),
(41, 1, 2, 'hola teacher'),
(42, 1, 3, 'bunasnoches teachr'),
(43, 1, 3, 'hola profe'),
(44, 1, 29, 'hola profe'),
(45, 1, 28, 'buenas nohes profesor'),
(46, 1, 1, 'hola'),
(47, 1, 30, 'hola'),
(48, 1, 30, 'Hola'),
(49, 1, 2, 'hola hola'),
(50, 1, 28, 'hola'),
(51, 1, 1, 'buenas noches luis'),
(52, 1, 2, 'muy bien y ud?'),
(53, 1, 1, 'hola compa'),
(54, 1, 28, 'buenas noches profesor'),
(55, 1, 28, 'buenas tardes profesor'),
(56, 1, 1, ':V'),
(57, 1, 1, 'asas'),
(58, 1, 28, 'hola'),
(59, 1, 1, 'buesnas noches profesor'),
(60, 1, 2, 'HOLASÃ‡'),
(61, 1, 28, 'HOLA PROFESOR'),
(62, 1, 28, 'hola'),
(63, 1, 38, 'hola edita, lei tu mensaje'),
(64, 1, 36, 'Hola esther muy buenos dias'),
(65, 0, 30, 'hola miss'),
(66, 0, 36, 'hola'),
(67, 0, 30, 'buenas tardes miss'),
(68, 0, 32, 'hola muy buenas tardes miss'),
(69, 1, 38, 'hola profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_docente`
--

CREATE TABLE `tb_docente` (
  `intiddocente` int(11) NOT NULL,
  `nvchnombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchapellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchcelular` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nvchcorreo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_docente`
--

INSERT INTO `tb_docente` (`intiddocente`, `nvchnombre`, `nvchapellidos`, `nvchcelular`, `nvchcorreo`) VALUES
(2, 'Carlos', 'Peralta', '957696959', 'carlosgmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado`
--

CREATE TABLE `tb_estado` (
  `intidestado` int(11) NOT NULL,
  `intidpersona` int(11) NOT NULL,
  `nvchestado` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dtfecha` date DEFAULT NULL,
  `nvchhora` time DEFAULT NULL,
  `nvchdia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nvchdatedia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nvchmes` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nvchhoraind` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nvchminuto` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_estado`
--

INSERT INTO `tb_estado` (`intidestado`, `intidpersona`, `nvchestado`, `dtfecha`, `nvchhora`, `nvchdia`, `nvchdatedia`, `nvchmes`, `nvchhoraind`, `nvchminuto`) VALUES
(55, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, quidem, non! Ea, voluptatem deleniti impedit tempora officia error, sunt illum eos harum unde, cum laborum quos laudantium! Possimus, maxime, eum?', '2016-07-01', '16:09:44', 'Viernes', '1', 'Julio', '4', '09 pm'),
(58, 1, 'hola que tal\r\n', '2016-07-02', '01:25:17', 'Sabado', '2', 'Julio', '1', '25 am'),
(59, 1, 'peluca sape\r\n', '2016-07-02', '01:26:23', 'Sabado', '2', 'Julio', '1', '26 am'),
(60, 1, 'como quisiera dormirme pero tengo que hacer mi tarea', '2016-07-02', '01:28:35', 'Sabado', '2', 'Julio', '1', '28 am'),
(61, 0, 'hola\r\n', '2016-07-02', '03:00:50', 'Sabado', '2', 'Julio', '3', '00 am'),
(62, 3, 'hola\r\n', '2016-07-02', '03:32:54', 'Sabado', '2', 'Julio', '3', '32 am'),
(63, 3, ':D', '2016-07-02', '03:33:04', 'Sabado', '2', 'Julio', '3', '33 am'),
(64, 1, 'hola\r\n', '2016-07-02', '03:40:56', 'Sabado', '2', 'Julio', '3', '40 am'),
(65, 1, 'ya me dio sueÃ±o\r\n', '2016-07-02', '03:41:19', 'Sabado', '2', 'Julio', '3', '41 am'),
(66, 1, 'este es un comentario\r\n', '2016-07-02', '18:33:30', 'Sabado', '2', 'Julio', '6', '33 pm'),
(67, 1, '				                                ', '2016-07-06', '17:15:59', 'Miercoles', '6', 'Julio', '5', '15 pm'),
(68, 1, '				                                ', '2016-07-08', '18:35:22', 'Viernes', '8', 'Julio', '6', '35 pm'),
(69, 1, '				                                ', '2016-07-08', '18:35:25', 'Viernes', '8', 'Julio', '6', '35 pm'),
(70, 1, 'hola que tal\r\n', '2016-07-09', '14:48:46', 'Sabado', '9', 'Julio', '2', '48 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_padre`
--

CREATE TABLE `tb_padre` (
  `intidpadre` int(11) NOT NULL,
  `intdnipadre` int(8) NOT NULL,
  `nvchnombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchapellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchcorreo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchcelular` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `intidhijo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_padre`
--

INSERT INTO `tb_padre` (`intidpadre`, `intdnipadre`, `nvchnombre`, `nvchapellidos`, `nvchcorreo`, `nvchcelular`, `intidhijo`) VALUES
(2, 73969785, 'Felipe', 'diaz rivarola', 'papa@gmail.com', '989675674', 98987898),
(3, 98899878, 'andres', 'calderon  mendoza', 'roquyauricasa@gmail.com', '987656545', 75645654);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pers_resp`
--

CREATE TABLE `tb_pers_resp` (
  `intidprsprg` int(11) NOT NULL,
  `inpers` int(11) NOT NULL,
  `ispreg` int(11) DEFAULT NULL,
  `nvchrspt` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `punto` int(11) NOT NULL,
  `moro` int(11) NOT NULL,
  `mplata` int(11) NOT NULL,
  `mbronce` int(11) NOT NULL,
  `toro` int(11) NOT NULL,
  `tplata` int(11) NOT NULL,
  `tbronce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_pers_resp`
--

INSERT INTO `tb_pers_resp` (`intidprsprg`, `inpers`, `ispreg`, `nvchrspt`, `punto`, `moro`, `mplata`, `mbronce`, `toro`, `tplata`, `tbronce`) VALUES
(21, 1, 3, 'esta es mi respuesta', 0, 0, 0, 0, 0, 0, 0),
(22, 1, 2, 'COMO ESTAS TU?', 0, 0, 0, 0, 0, 0, 0),
(23, 1, 3, '1452', 0, 0, 0, 0, 0, 0, 0),
(24, 1, 2, 'COMO ESTAS TU?', 0, 0, 0, 0, 0, 0, 0),
(25, 1, 8, '1200435', 0, 0, 0, 0, 0, 0, 0),
(26, 1, 9, 'Ollanta humala', 0, 0, 0, 0, 0, 0, 0),
(54, 1, NULL, '', 0, 100, 0, 0, 0, 0, 0),
(55, 1, NULL, '', 0, 0, 0, 0, 0, 1, 0),
(56, 28, NULL, '', 1000, 1, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pregunta`
--

CREATE TABLE `tb_pregunta` (
  `intidpregunta` int(11) NOT NULL,
  `intidtarea` int(11) NOT NULL,
  `nvchpregunta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nvchdescripcion` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chrhabilitado` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_pregunta`
--

INSERT INTO `tb_pregunta` (`intidpregunta`, `intidtarea`, `nvchpregunta`, `nvchdescripcion`, `chrhabilitado`) VALUES
(2, 7, 'how are you?', 'como se traduce mejor la siguiente oracion', 'A'),
(3, 7, 'AmÃ©rica fue descubierta por julio verne.', 'Responde V o F', 'A'),
(8, 7, 'cuantos aÃ±os tiene la tierra', 'piensa adecuadamente y responde segÃºn creas conveniente', 'A'),
(9, 7, 'Presidente del PerÃº', 'escriba los nombres y apellidos completos', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_premio`
--

CREATE TABLE `tb_premio` (
  `intidpremio` int(11) NOT NULL,
  `nvchpremio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nvchimagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intpuntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_respuesta`
--

CREATE TABLE `tb_respuesta` (
  `intidrespuesta` int(11) NOT NULL,
  `intidpregunta` int(11) NOT NULL,
  `nvchrespuesta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chrvf` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_respuesta`
--

INSERT INTO `tb_respuesta` (`intidrespuesta`, `intidpregunta`, `nvchrespuesta`, `chrvf`) VALUES
(13, 2, 'como Estas tu?', '0'),
(14, 2, 'cuantos aÃ±os tienes?', '0'),
(15, 2, 'tu como estas?', '1'),
(16, 2, 'alternativa de prueba', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tarea`
--

CREATE TABLE `tb_tarea` (
  `intidtarea` int(11) NOT NULL,
  `nvchtarea` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vchmaterial` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nvchdescripciontarea` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tarea`
--

INSERT INTO `tb_tarea` (`intidtarea`, `nvchtarea`, `vchmaterial`, `nvchdescripciontarea`) VALUES
(7, 'open english', 'http://www.google.com.pe', 'Tooltips are useful when you need to describe a link. The plugin was inspired by jQuery.tipsy plugin written by Jason Frame. Tooltips have since been updated to work without images, animate with a CSS animation, and data-attributes for local title storage. If you want to include this plugin functionality individually, then you will need tooltip.js. Else, as mentioned in the chapter Bootstrap Plugins Overview, you can include bootstrap.js or the minified bootstrap.min.js.'),
(8, 'El principito, obra literarea', 'http://www.google.com/el?principito', 'obra escrita por su autor y subjetiva, basada en hechos no sucedidos nunca.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_user`
--

CREATE TABLE `tb_user` (
  `intiduser` int(11) NOT NULL,
  `nvchusername` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nvchpassword` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `intidpersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_user`
--

INSERT INTO `tb_user` (`intiduser`, `nvchusername`, `nvchpassword`, `intidpersona`) VALUES
(1, 'sasha@gamificame.com', 'u2011110220', 1),
(2, 'juanito@gamificame.com', 'u2011110220', 2),
(3, 'admin@gamificame.com', 'u2011110220', 3),
(4, 'punkjosh@gamificame.com', 'u2011110220', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`nvchidpersona`),
  ADD UNIQUE KEY `nvchdni` (`nvchdni`);

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`intidcategoria`),
  ADD UNIQUE KEY `nvchcategoria` (`nvchcategoria`);

--
-- Indices de la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`intidchat`);

--
-- Indices de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  ADD PRIMARY KEY (`intiddocente`);

--
-- Indices de la tabla `tb_estado`
--
ALTER TABLE `tb_estado`
  ADD PRIMARY KEY (`intidestado`);

--
-- Indices de la tabla `tb_padre`
--
ALTER TABLE `tb_padre`
  ADD PRIMARY KEY (`intidpadre`),
  ADD KEY `intidhijo` (`intidhijo`);

--
-- Indices de la tabla `tb_pers_resp`
--
ALTER TABLE `tb_pers_resp`
  ADD PRIMARY KEY (`intidprsprg`),
  ADD KEY `inpers` (`inpers`),
  ADD KEY `ispreg` (`ispreg`);

--
-- Indices de la tabla `tb_pregunta`
--
ALTER TABLE `tb_pregunta`
  ADD PRIMARY KEY (`intidpregunta`);

--
-- Indices de la tabla `tb_respuesta`
--
ALTER TABLE `tb_respuesta`
  ADD PRIMARY KEY (`intidrespuesta`);

--
-- Indices de la tabla `tb_tarea`
--
ALTER TABLE `tb_tarea`
  ADD PRIMARY KEY (`intidtarea`);

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
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `nvchidpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `intidcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `intidchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  MODIFY `intiddocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_estado`
--
ALTER TABLE `tb_estado`
  MODIFY `intidestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `tb_padre`
--
ALTER TABLE `tb_padre`
  MODIFY `intidpadre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_pers_resp`
--
ALTER TABLE `tb_pers_resp`
  MODIFY `intidprsprg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `tb_pregunta`
--
ALTER TABLE `tb_pregunta`
  MODIFY `intidpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_respuesta`
--
ALTER TABLE `tb_respuesta`
  MODIFY `intidrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tb_tarea`
--
ALTER TABLE `tb_tarea`
  MODIFY `intidtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `intiduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
