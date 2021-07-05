-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 21:35:51
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gifactins`
--

CREATE TABLE `gifactins` (
  `id` int(10) UNSIGNED NOT NULL,
  `valorpago` double(10,2) UNSIGNED NOT NULL,
  `pruvisual` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gifactins`
--

INSERT INTO `gifactins` (`id`, `valorpago`, `pruvisual`, `created`, `created_by`) VALUES
(19, 100000.00, NULL, '2021-06-15 16:23:53', 1),
(20, 150000.00, NULL, '2021-06-15 16:25:13', 1),
(21, 234444.11, NULL, '2021-06-15 16:37:42', 1),
(22, 57500.00, NULL, '2021-06-20 06:03:08', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giinsumos`
--

CREATE TABLE `giinsumos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `stock` double(12,2) UNSIGNED DEFAULT 0.00,
  `used` tinyint(1) DEFAULT 0,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giinsumos`
--

INSERT INTO `giinsumos` (`id`, `nombre`, `stock`, `used`, `medida_id`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(5, 'CUADERNOS NORMA', 160.00, 1, 2, '2021-06-15 16:01:35', 1, '2021-06-15 16:25:13', 1),
(6, 'ESENCIA DE COCO 100MG', 250.00, 1, 2, '2021-06-15 16:01:40', 1, '2021-06-15 16:23:53', 1),
(7, 'AZUCAR MORENA', 165.00, 1, 1, '2021-06-15 16:01:46', 1, '2021-06-20 06:03:08', 12),
(8, 'HARINA \"LA INSUPERABLE\"', 250.00, 1, 1, '2021-06-15 16:01:49', 1, '2021-06-15 16:23:53', 1),
(9, 'ARROZ ROA', 0.00, 1, 1, '2021-06-15 16:37:13', 1, '2021-07-04 13:07:12', 1),
(10, 'ARROZ TOLIMA', 5.00, 1, 2, '2021-06-20 05:57:02', 12, '2021-07-04 09:31:02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giinsumosconsumidos`
--

CREATE TABLE `giinsumosconsumidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `insumo_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giinsumosconsumidos`
--

INSERT INTO `giinsumosconsumidos` (`id`, `insumo_id`, `cantidad`, `presentacion_id`, `created`, `created_by`) VALUES
(2, 9, 500, 3, '2021-07-03 04:24:59', 1),
(3, 10, 2, 2, '2021-07-03 04:25:28', 1),
(4, 10, 3, 2, '2021-07-04 09:31:02', 1),
(5, 9, 10, 1, '2021-07-04 13:07:12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gilistainsumos`
--

CREATE TABLE `gilistainsumos` (
  `id` int(10) UNSIGNED NOT NULL,
  `insumo_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double(12,2) UNSIGNED NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `factins_id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gilistainsumos`
--

INSERT INTO `gilistainsumos` (`id`, `insumo_id`, `cantidad`, `presentacion_id`, `factins_id`, `created`, `created_by`) VALUES
(33, 7, 10.00, 1, 19, '2021-06-15 16:23:53', 1),
(34, 5, 10.00, 2, 19, '2021-06-15 16:23:53', 1),
(35, 6, 5.00, 4, 19, '2021-06-15 16:23:53', 1),
(36, 8, 5.00, 3, 19, '2021-06-15 16:23:53', 1),
(37, 7, 3.00, 3, 20, '2021-06-15 16:25:13', 1),
(38, 5, 3.00, 4, 20, '2021-06-15 16:25:13', 1),
(39, 9, 10.00, 3, 21, '2021-06-15 16:37:42', 1),
(40, 9, 10.00, 1, 22, '2021-06-20 06:03:08', 12),
(41, 10, 10.00, 2, 22, '2021-06-20 06:03:08', 12),
(42, 7, 5.00, 1, 22, '2021-06-20 06:03:08', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gilistaproductos`
--

CREATE TABLE `gilistaproductos` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double(12,2) UNSIGNED NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gilistaproductos`
--

INSERT INTO `gilistaproductos` (`id`, `producto_id`, `cantidad`, `presentacion_id`, `created`, `created_by`) VALUES
(1, 2, 15.00, 2, '2021-07-04 11:24:20', 1),
(2, 2, 10.00, 4, '2021-07-04 11:24:58', 1),
(3, 1, 10.00, 4, '2021-07-04 11:24:58', 1),
(4, 2, 10.00, 2, '2021-07-04 11:28:53', 1),
(5, 1, 10.00, 2, '2021-07-04 11:28:53', 1),
(6, 1, 500.00, 2, '2021-07-04 13:11:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gilisttempins`
--

CREATE TABLE `gilisttempins` (
  `id` int(10) UNSIGNED NOT NULL,
  `insumo_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double(12,2) UNSIGNED NOT NULL,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gilisttempins`
--

INSERT INTO `gilisttempins` (`id`, `insumo_id`, `cantidad`, `medida_id`, `presentacion_id`, `created_by`) VALUES
(68, 9, 2.00, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gilisttemppro`
--

CREATE TABLE `gilisttemppro` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double(12,2) UNSIGNED NOT NULL,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gilisttempven`
--

CREATE TABLE `gilisttempven` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `presentacion_id` int(10) UNSIGNED NOT NULL,
  `cantidad` double(12,2) UNSIGNED NOT NULL,
  `val_unit` double(12,2) UNSIGNED NOT NULL,
  `val_total` double(12,2) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gilisttempven`
--

INSERT INTO `gilisttempven` (`id`, `producto_id`, `medida_id`, `presentacion_id`, `cantidad`, `val_unit`, `val_total`, `created_by`) VALUES
(8, 2, 2, 4, 5.00, 1000.00, 250000.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gimedida`
--

CREATE TABLE `gimedida` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gimedida`
--

INSERT INTO `gimedida` (`id`, `nombre`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 'PESO', '2021-06-10 22:31:50', 1, NULL, NULL),
(2, 'UNIDAD', '2021-06-10 22:31:50', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gipermisos`
--

CREATE TABLE `gipermisos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gipermisos`
--

INSERT INTO `gipermisos` (`id`, `nombre`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 'CREAR USUARIOS', '2021-05-14 00:00:00', 1, '2021-05-14 00:00:00', 1),
(2, 'MODIFICAR USUARIOS', '2021-05-17 11:09:45', 1, '2021-05-17 11:09:45', 1),
(3, 'CREAR INSUMOS', '2021-06-11 00:25:12', 1, NULL, NULL),
(4, 'MODIFICAR INSUMOS', '2021-06-11 00:25:12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gipermiso_girol`
--

CREATE TABLE `gipermiso_girol` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `permiso_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gipermiso_girol`
--

INSERT INTO `gipermiso_girol` (`id`, `rol_id`, `permiso_id`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 1, 1, '2021-05-14 00:00:00', 1, NULL, NULL),
(2, 1, 2, '2021-05-17 11:10:22', 1, NULL, NULL),
(3, 2, 3, '2021-05-17 11:10:22', 1, NULL, NULL),
(4, 2, 4, '2021-06-10 17:26:19', 1, NULL, NULL),
(5, 1, 3, '2021-06-11 20:11:47', 1, NULL, NULL),
(6, 1, 4, '2021-06-11 20:11:47', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gipresentacion`
--

CREATE TABLE `gipresentacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `multfactor` int(10) UNSIGNED NOT NULL,
  `abreviacion` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gipresentacion`
--

INSERT INTO `gipresentacion` (`id`, `medida_id`, `nombre`, `multfactor`, `abreviacion`, `created`, `created_by`) VALUES
(1, 1, 'KILOGRAMO(S)', 1, 'KG(S)', '2021-06-11 20:31:56', 1),
(2, 2, 'UNIDAD(ES)', 1, 'UD(S)', '2021-06-11 20:31:56', 1),
(3, 1, 'BULTO 50 KILOGRAMOS', 50, 'BULTO 50 KG(S)', '2021-06-11 22:49:57', 1),
(4, 2, 'CAJA DE 50 UNIDADES', 50, 'CAJA 50 UDS', '2021-06-11 22:49:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giproductos`
--

CREATE TABLE `giproductos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `precio` double(12,2) UNSIGNED DEFAULT NULL,
  `stock` double(12,2) UNSIGNED DEFAULT 0.00,
  `used` tinyint(1) DEFAULT 0,
  `medida_id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giproductos`
--

INSERT INTO `giproductos` (`id`, `nombre`, `precio`, `stock`, `used`, `medida_id`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 'PAN DE BONO PEQUEñO', 500.00, 310.00, 1, 2, '2021-06-30 21:45:10', 1, '2021-07-04 13:54:22', 1),
(2, 'PAN DE BONO GRANDE', 1000.00, 750.00, 1, 2, '2021-06-30 21:50:30', 1, '2021-07-04 14:28:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giroles`
--

CREATE TABLE `giroles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giroles`
--

INSERT INTO `giroles` (`id`, `nombre`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 'ADMINISTRADOR', '2021-05-14 00:00:00', 1, '2021-05-14 00:00:00', 1),
(2, 'INVENTARIO INSUMOS', '2021-05-17 11:09:18', 1, '2021-05-17 11:09:18', 1),
(3, 'INVENTARIO PRODUCTOS', '2021-06-06 17:01:12', 1, '2021-06-06 17:01:12', 1),
(4, 'VENTAS', '2021-06-06 17:06:09', 1, NULL, NULL),
(5, 'CONTABILIDAD', '2021-06-06 00:07:49', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gitipide`
--

CREATE TABLE `gitipide` (
  `id` int(10) UNSIGNED NOT NULL,
  `abreviacion` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gitipide`
--

INSERT INTO `gitipide` (`id`, `abreviacion`, `nombre`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 'C.C.', 'Cedula de ciudadanía', '2021-05-16 00:00:00', 1, '2021-05-16 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giusuarios`
--

CREATE TABLE `giusuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipide_id` int(10) UNSIGNED NOT NULL,
  `numide` varchar(20) NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `prinom` varchar(50) NOT NULL,
  `secnom` varchar(50) DEFAULT NULL,
  `priape` varchar(50) NOT NULL,
  `secape` varchar(50) DEFAULT NULL,
  `nickname` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `reset_pass` tinyint(1) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giusuarios`
--

INSERT INTO `giusuarios` (`id`, `tipide_id`, `numide`, `rol_id`, `prinom`, `secnom`, `priape`, `secape`, `nickname`, `email`, `email_verified_at`, `password`, `reset_pass`, `remember_token`, `active`, `created`, `created_by`, `updated`, `updated_by`) VALUES
(1, 1, '1065819503', 1, 'Admin', '', '', NULL, 'admin', 'ejdao2015@hotmail.com', NULL, '$2y$10$g11glnxSpXdSMVFCFaMMkeHbWswvBz3ggsiOXadYDyBNlMHBVpAKK', 0, NULL, 1, '2021-05-14 00:00:00', 1, '2021-06-07 00:13:34', 7),
(9, 1, '41878965', 4, 'Francisco', 'Martin', 'Segundo', 'Cabello', NULL, 'francisco@hotmail.com', NULL, '$2y$10$u2vryoeEst2rsESUZXGRme2l1fHNi2.6Xnme5IUFGIFyL0Y1zdYmS', 0, NULL, 1, '2021-06-07 22:45:32', 1, '2021-06-10 16:15:20', 1),
(12, 1, '123456', 2, 'Gustavo', NULL, 'Mota', 'Pinilla', NULL, 'gustavo@hotmail.com', NULL, '$2y$10$sN9CZ24/6gA9thF09CK/0.9mh41Wob4FvgvsSQCt1P2/AxWDl2EmK', 0, NULL, 0, '2021-06-20 05:47:12', 1, '2021-07-04 09:30:41', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gifactins`
--
ALTER TABLE `gifactins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giinsumos`
--
ALTER TABLE `giinsumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giinsumosconsumidos`
--
ALTER TABLE `giinsumosconsumidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gilistainsumos`
--
ALTER TABLE `gilistainsumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gilistaproductos`
--
ALTER TABLE `gilistaproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gilisttempins`
--
ALTER TABLE `gilisttempins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gilisttemppro`
--
ALTER TABLE `gilisttemppro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gilisttempven`
--
ALTER TABLE `gilisttempven`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gimedida`
--
ALTER TABLE `gimedida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gipermisos`
--
ALTER TABLE `gipermisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gipermiso_girol`
--
ALTER TABLE `gipermiso_girol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gipresentacion`
--
ALTER TABLE `gipresentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giproductos`
--
ALTER TABLE `giproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giroles`
--
ALTER TABLE `giroles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gitipide`
--
ALTER TABLE `gitipide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giusuarios`
--
ALTER TABLE `giusuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gifactins`
--
ALTER TABLE `gifactins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `giinsumos`
--
ALTER TABLE `giinsumos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `giinsumosconsumidos`
--
ALTER TABLE `giinsumosconsumidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gilistainsumos`
--
ALTER TABLE `gilistainsumos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `gilistaproductos`
--
ALTER TABLE `gilistaproductos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `gilisttempins`
--
ALTER TABLE `gilisttempins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `gilisttemppro`
--
ALTER TABLE `gilisttemppro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `gilisttempven`
--
ALTER TABLE `gilisttempven`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gimedida`
--
ALTER TABLE `gimedida`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gipermisos`
--
ALTER TABLE `gipermisos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gipermiso_girol`
--
ALTER TABLE `gipermiso_girol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `gipresentacion`
--
ALTER TABLE `gipresentacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `giproductos`
--
ALTER TABLE `giproductos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `giroles`
--
ALTER TABLE `giroles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gitipide`
--
ALTER TABLE `gitipide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `giusuarios`
--
ALTER TABLE `giusuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;