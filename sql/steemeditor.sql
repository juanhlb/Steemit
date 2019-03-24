-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2018 a las 20:53:07
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `steemeditor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inises`
--

CREATE TABLE `inises` (
  `usuario` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_codigo` bigint(20) NOT NULL,
  `nombre_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `confirmado_email` tinyint(1) NOT NULL,
  `enviado_email_confirmacion` tinyint(1) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_acceso` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `confirmado_usuario` tinyint(1) NOT NULL,
  `pago_acceso` tinyint(1) NOT NULL,
  `pkey` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `cod_aprobacion` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_codigo`, `nombre_usuario`, `email`, `contrasena`, `confirmado_email`, `enviado_email_confirmacion`, `bloqueado`, `fecha_registro`, `tipo_acceso`, `confirmado_usuario`, `pago_acceso`, `pkey`, `cod_aprobacion`) VALUES
(1, 'juanhlb', 'juanhlb@gmail.com', 'caracas1*', 0, 0, 0, '2018-03-21', 'S', 0, 0, '', ''),
(2, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, 0, '2018-03-21', '', 0, 0, '', 'fbc00c567c41ef62dd9dec9a1a7a9fd241d00348'),
(3, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, 0, '2018-03-21', '', 0, 0, '', 'c78e8242fb569504062a5120f8b174ed6977506b'),
(4, 'asdasdasd', 'adas@adss.com', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 0, 0, 0, '2018-03-21', '', 0, 0, '', '696314d78d52de59efc73bb19b5afc81ddf3e67b'),
(5, 'juanhl', 'ccc@adss.com', '612b3e70664276260109d3cb279cbc826c450776', 0, 0, 0, '2018-03-21', '', 0, 0, '', '407a48199e97d05b3eab9158131767c4e0d57a00'),
(6, 'asdasdasd', 'adas@adss.com', '54fd1711209fb1c0781092374132c66e79e2241b', 0, 0, 0, '2018-03-21', '', 0, 0, '', 'eb050cdb1fd5ee6c39850b2d63eadd05debfd50c'),
(7, '', 'asc', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0, 0, 0, '2018-03-21', '', 0, 0, '', '76e875333da54b291efc1f3c67027177fcf36602'),
(8, 'ssasd', 'ss@adss.com', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 0, 0, 0, '2018-03-21', '', 0, 0, '', 'f6c7695c5fbb0b83e2da3699be42b605324eccb4'),
(9, 'asdasdasds', 'addas@adss.com', '11f6ad8ec52a2984abaafd7c3b516503785c2072', 0, 0, 0, '2018-03-21', '', 0, 0, '', 'e73fb065442166e12b94212ae15048c2029a8b54'),
(10, 'asdasdccasd', 'adaccs@adss.com', 'd36da3e6884f6d1e9e7983ff13e99cf5c8f5745a', 0, 0, 0, '2018-03-21', '', 0, 0, '', '162be7ffbf0eb3c2619b4c15e89a5fa00d1f98bb'),
(11, 'asdasdasdd', 'adas@adss.come', 'f44fe052b6bae5efcb693c23071b0f6d3a4e1955', 0, 0, 0, '2018-03-21', '', 0, 0, '', '6592f0890fa26f6832dd80797d5665d0fc8eef4d'),
(12, 'j1', 'j1@adss.com', '30e1fe53111f7e583c382596a32885fd27283970', 0, 0, 0, '2018-03-22', '', 0, 0, '', 'bbd0085dd4f4e49f2aa1f47cb73fcbfd46d5ff16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inises`
--
ALTER TABLE `inises`
  ADD KEY `usuario` (`usuario`),
  ADD KEY `usuario_2` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_codigo`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
