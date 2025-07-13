-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2025 a las 23:20:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museo_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arqueologia`
--

CREATE TABLE `arqueologia` (
  `ida` int(11) NOT NULL,
  `integridadHistorica` varchar(255) DEFAULT NULL,
  `estetica` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botanica`
--

CREATE TABLE `botanica` (
  `idb` int(11) NOT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `reino` varchar(255) DEFAULT NULL,
  `phylum` varchar(255) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `clase` varchar(255) DEFAULT NULL,
  `orden` varchar(255) DEFAULT NULL,
  `familia` varchar(255) DEFAULT NULL,
  `genero` varchar(255) NOT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `botanica`
--

INSERT INTO `botanica` (`idb`, `distribucion`, `reino`, `phylum`, `division`, `clase`, `orden`, `familia`, `genero`, `especie`, `pieza_id`) VALUES
(1, 'Botanica', 'Plantae', 'Magnoliophyta', 'Magnoliophyta', 'Magnoliopsida', 'Fabales', 'Fabaceae', 'Erythrina', 'E. crista-galli', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `idd` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`idd`, `nombre`, `apellido`, `fecha`) VALUES
(9, 'Neldo', 'Croissant', '2025-07-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geologia`
--

CREATE TABLE `geologia` (
  `idg` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ictiologia`
--

CREATE TABLE `ictiologia` (
  `idi` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oologia`
--

CREATE TABLE `oologia` (
  `ido` int(11) NOT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osteologia`
--

CREATE TABLE `osteologia` (
  `idos` int(11) NOT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paleontologia`
--

CREATE TABLE `paleontologia` (
  `idp` int(11) NOT NULL,
  `eras` varchar(255) DEFAULT NULL,
  `periodos` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `clase` varchar(255) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `id` int(11) NOT NULL,
  `numinventario` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `estadoconservacion` varchar(255) DEFAULT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT NULL,
  `cantidadpiezas` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(255) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `donante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `pieza` (`id`, `numinventario`, `especie`, `estadoconservacion`, `fecha_ingreso`, `cantidadpiezas`, `clasificacion`, `observacion`, `imagen`, `donante_id`, `usuario_id`) VALUES
(9, '1', 'E. crista-galli', 'botanica', '2025-07-07 03:00:00', '2', 'botanica', 'Árbol nativo de Sudamérica, especialmente de Argentina, Uruguay, Paraguay y el sur de Brasil. Sus flores rojas intensas florecen en primavera y verano, atrayendo aves polinizadoras. Es la flor nacional de Argentina y Uruguay.', NULL, 9, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `dni`, `nombre`, `apellido`, `telefono`, `email`, `clave`, `fecha_registro`, `tipo_usuario`) VALUES
(15, '10000000', 'administrador', 'admin', '3408435262', 'admin@gmail.com', '$2y$10$F4a8CY5I/AMnABGuKcCd/./ARVi43jOyN6l/4tsZ0U3JS4xo80NCG', '2025-07-07', 'administrador'),
(16, '20000000', 'gerente', 'gerente', '3408435263', 'ger@gmail.com', '$2y$10$dDOF0XXN0AA54rbnpHD6IOGBRsxigxjRI82QxKLlMekn2GcOnGeNa', '2025-07-07', 'gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zoologia`
--

CREATE TABLE `zoologia` (
  `idz` int(11) NOT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `reino` varchar(255) NOT NULL,
  `phylum` varchar(255) DEFAULT NULL,
  `clase` varchar(255) DEFAULT NULL,
  `orden` varchar(255) DEFAULT NULL,
  `familia` varchar(255) DEFAULT NULL,
  `genero` varchar(255) NOT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `pieza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arqueologia`
--
ALTER TABLE `arqueologia`
  ADD PRIMARY KEY (`ida`),
  ADD KEY `fk_arqueologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `botanica`
--
ALTER TABLE `botanica`
  ADD PRIMARY KEY (`idb`),
  ADD KEY `fk_botanica_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
  ADD PRIMARY KEY (`idd`);

--
-- Indices de la tabla `geologia`
--
ALTER TABLE `geologia`
  ADD PRIMARY KEY (`idg`),
  ADD KEY `fk_geologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `ictiologia`
--
ALTER TABLE `ictiologia`
  ADD PRIMARY KEY (`idi`),
  ADD KEY `fk_ictiologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `oologia`
--
ALTER TABLE `oologia`
  ADD PRIMARY KEY (`ido`),
  ADD KEY `fk_oologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `osteologia`
--
ALTER TABLE `osteologia`
  ADD PRIMARY KEY (`idos`),
  ADD KEY `fk_osteologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `paleontologia`
--
ALTER TABLE `paleontologia`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `fk_paleontologia_pieza1_idx` (`pieza_id`);

--
-- Indices de la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pieza_donante_idx` (`donante_id`),
  ADD KEY `fk_pieza_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zoologia`
--
ALTER TABLE `zoologia`
  ADD PRIMARY KEY (`idz`),
  ADD KEY `fk_zoologia_pieza1_idx` (`pieza_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arqueologia`
--
ALTER TABLE `arqueologia`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `botanica`
--
ALTER TABLE `botanica`
  MODIFY `idb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `donante`
--
ALTER TABLE `donante`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `geologia`
--
ALTER TABLE `geologia`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ictiologia`
--
ALTER TABLE `ictiologia`
  MODIFY `idi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oologia`
--
ALTER TABLE `oologia`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `osteologia`
--
ALTER TABLE `osteologia`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paleontologia`
--
ALTER TABLE `paleontologia`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `zoologia`
--
ALTER TABLE `zoologia`
  MODIFY `idz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arqueologia`
--
ALTER TABLE `arqueologia`
  ADD CONSTRAINT `fk_arqueologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `botanica`
--
ALTER TABLE `botanica`
  ADD CONSTRAINT `fk_botanica_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `geologia`
--
ALTER TABLE `geologia`
  ADD CONSTRAINT `fk_geologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ictiologia`
--
ALTER TABLE `ictiologia`
  ADD CONSTRAINT `fk_ictiologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oologia`
--
ALTER TABLE `oologia`
  ADD CONSTRAINT `fk_oologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `osteologia`
--
ALTER TABLE `osteologia`
  ADD CONSTRAINT `fk_osteologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paleontologia`
--
ALTER TABLE `paleontologia`
  ADD CONSTRAINT `fk_paleontologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD CONSTRAINT `fk_pieza_donante` FOREIGN KEY (`donante_id`) REFERENCES `donante` (`idd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pieza_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zoologia`
--
ALTER TABLE `zoologia`
  ADD CONSTRAINT `fk_zoologia_pieza1` FOREIGN KEY (`pieza_id`) REFERENCES `pieza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
