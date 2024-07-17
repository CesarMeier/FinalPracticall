-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2024 a las 23:11:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arqueologia`
--

INSERT INTO `arqueologia` (`ida`, `integridadHistorica`, `estetica`, `material`, `reino`, `clase`, `orden`, `familia`, `genero`, `especie`, `pieza_id`) VALUES
(1, 'tjfjj', 'ryjrej', 'rtjdfr', 'hewhe', 'gfedjher', 'trjjjjjgr', 'edhtrh', 'rtjtrjgfd', 'djhgj', 8);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `idd` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`idd`, `nombre`, `apellido`, `fecha`) VALUES
(8, 'luisna', 'meier', '2024-07-16'),
(9, 'rty', 'gfdgf', '2024-07-17'),
(10, 'dsydy', 'grdfgdrt', '2024-07-17'),
(11, 'ftygjfg', 'djrtyj', '2024-07-17');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `id` int(11) NOT NULL,
  `numinventario` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `estadoconservacion` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `cantidadpiezas` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(255) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `donante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `pieza` (`id`, `numinventario`, `especie`, `estadoconservacion`, `fecha_ingreso`, `cantidadpiezas`, `clasificacion`, `observacion`, `donante_id`, `usuario_id`) VALUES
(8, '425', 'asdsada', 'gdsfsd', '2024-07-16', '2', 'arqueologia', 'gsderfhe', 8, 20),
(9, '145', 'rtdhdf', 'trhdfg', '2024-07-16', '6', 'paleontologia', 'tsydd', 9, 20),
(10, '23', 'hdrgdrg', 'drghrt', '2024-07-08', '3', 'arqueologia', 'shdgfh', 10, 20),
(11, '9', 'drtuj', 'dfjgjd', '2024-07-16', '3', 'arqueologia', 'hdgh', 11, 20);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `dni`, `nombre`, `apellido`, `telefono`, `email`, `clave`, `fecha_registro`, `tipo_usuario`) VALUES
(18, '44135799', 'cesario', 'diaz', '3857435262', 'cesarmeier@gmail.com', '$2y$10$fh9PhJq185NF0H/8SMPsO..iNV8h2PayIHJglQ.aoddcZeHPHkVue', '2024-06-08', 'gerente'),
(20, '44135797', 'cesar', 'diaz', '3857435262', 'cesarmeier@gmail.com', '$2y$10$kjtWAuBHqZoUeULYovluH.Jy9T0F4Y2km0mStjSH20r7wY.cy5NJi', '2024-06-05', 'administrador'),
(21, '22333444', 'Cesar Oscar', 'Diaz Meier', '0385743526', 'cesar44135797@gmail.com', '$2y$10$Y/VgXxZOMFTKu8N3U9.gE.gYk79khrrEwygXLnMsNOh6ah44lLbo2', '2024-07-17', 'gerente');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `idb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donante`
--
ALTER TABLE `donante`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `geologia`
--
ALTER TABLE `geologia`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ictiologia`
--
ALTER TABLE `ictiologia`
  MODIFY `idi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oologia`
--
ALTER TABLE `oologia`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `osteologia`
--
ALTER TABLE `osteologia`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paleontologia`
--
ALTER TABLE `paleontologia`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
