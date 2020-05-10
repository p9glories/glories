--
-- Creacio de la BD
--

CREATE DATABASE IF NOT EXISTS `p9`;
USE `p9`;

--
-- Creacio de TABLES
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `alta` date NOT NULL,
  `valoraciones` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `niveles` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `superadministradores` (
  `id_superadmin` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_superadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `tiendas` (
  `id_tienda` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto1` text COLLATE utf8_spanish_ci NOT NULL,
  `foto2` text COLLATE utf8_spanish_ci NOT NULL,
  `foto3` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `valoraciones` (
  `id_valoracion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_valoracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Creacio d' INDEX
--

ALTER TABLE `administradores`
  ADD KEY IF NOT EXISTS `id_usuario` (`id_usuario`);


ALTER TABLE `clientes`
  ADD KEY IF NOT EXISTS `id_usuario` (`id_usuario`),
  ADD KEY IF NOT EXISTS `id_nivel` (`id_nivel`);


ALTER TABLE `superadministradores`
  ADD KEY IF NOT EXISTS `id_usuario` (`id_usuario`);

ALTER TABLE `tiendas`
  ADD KEY IF NOT EXISTS `id_admin` (`id_admin`),
  ADD KEY IF NOT EXISTS `id_categoria` (`id_categoria`);

ALTER TABLE `usuarios`
  ADD UNIQUE KEY IF NOT EXISTS `email` (`email`);

ALTER TABLE `valoraciones`
  ADD KEY IF NOT EXISTS `id_cliente` (`id_cliente`),
  ADD KEY IF NOT EXISTS `id_tienda` (`id_tienda`);

--
-- Creacio de FK
--

ALTER TABLE `administradores`
  ADD CONSTRAINT `FK_usuarios_Admin` FOREIGN KEY IF NOT EXISTS (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_niveles_clientes` FOREIGN KEY IF NOT EXISTS (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuarios_clientes` FOREIGN KEY IF NOT EXISTS (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `superadministradores`
  ADD CONSTRAINT `FK_usuarios_SuperAdmin` FOREIGN KEY IF NOT EXISTS (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `tiendas`
  ADD CONSTRAINT `FK_tiendas_administradores` FOREIGN KEY IF NOT EXISTS (`id_admin`) REFERENCES `administradores` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tiendas_categorias` FOREIGN KEY IF NOT EXISTS (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `valoraciones`
  ADD CONSTRAINT `FK_valoraciones_clientes` FOREIGN KEY IF NOT EXISTS (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_valoraciones_tienda` FOREIGN KEY IF NOT EXISTS (`id_tienda`) REFERENCES `tiendas` (`id_tienda`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- FINAL
--