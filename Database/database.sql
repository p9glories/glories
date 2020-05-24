-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2020 a las 00:24:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cc_glories`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `id_usuario`) VALUES
(3, 5),
(2, 11),
(4, 22),
(5, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `icono`) VALUES
(4, 'Alimentación', 'icon-alimentacion.png'),
(5, 'Belleza', 'icon-belleza.png'),
(6, 'Deportes', 'icon-deportes.png'),
(7, 'Electrónica', 'icon-electronica.png'),
(8, 'Moda', 'icon-moda.png'),
(9, 'Restauración', 'icon-restauracion.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `alta` date NOT NULL,
  `valoraciones` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `id_nivel`, `alta`, `valoraciones`) VALUES
(10, 4, 3, '2020-01-29', 1),
(11, 12, 2, '2020-05-10', 0),
(12, 14, 2, '2020-05-17', 0),
(13, 16, 2, '2020-05-17', 0),
(14, 18, 2, '2020-05-17', 0),
(15, 20, 2, '2020-05-17', 0),
(18, 26, 2, '2020-05-17', 0),
(19, 28, 2, '2020-05-17', 0),
(20, 31, 2, '2020-05-17', 0),
(21, 34, 2, '2020-05-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nombre`) VALUES
(1, 'Principiante'),
(2, 'Intermedio'),
(3, 'Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superadministradores`
--

CREATE TABLE `superadministradores` (
  `id_superadmin` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superadministradores`
--

INSERT INTO `superadministradores` (`id_superadmin`, `id_usuario`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id_tienda` int(11) NOT NULL,
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
  `foto3` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `id_admin`, `id_categoria`, `nombre`, `descripcion`, `logo`, `horario`, `telefono`, `ubicacion`, `foto1`, `foto2`, `foto3`) VALUES
(1, 3, 9, 'Burger King', 'Disfrute de una amplia variedad de hamburguesas a la brasa, pollo, pescado y verduras, ensaladas y postres.', 'bk-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '66.012.34.56', '3-B', 'bk-01.jpg', 'bk-02.jpg', 'bk-03.jpg'),
(2, 2, 9, 'Mc Donalds', 'Mcdonald\'s ofrece productos elaborados con los mejores ingredientes, recién hechos, que cumplen y superan los más exigentes estándares de seguridad alimentaria desde el origen hasta el restaurante. Ponen a tu disposición una comida variada, con gran sabor, un menú con opciones para todos los gustos, y que puedas tener acceso en todo momento a la información nutricional y alérgenos de sus productos. ', 'mcdonalds-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.06.65', '0-C', 'mcdonalds-01.jpg', 'mcdonalds-02.jpg', 'mcdonalds-03.jpg'),
(3, 4, 9, 'Mussol', 'Una oferta gastronómica con lo mejor de la cocina tradicional española, servido junto a una cerveza natural en un ambiente inspirado en las tabernas clásicas. Aquí el tapeo es un arte. Prueba sus Huevos Rotos Clásicos o los de la Abuela. Disfruta de sus platos para compartir: sus fiestas mayores con una selección de ingredientes para combinar, tostas a tu gusto, parrillada de carne, capeas con una selección de los mejores platos y una amplia variedad de raciones con los mejores sabores del pueblo, la huerta y el puerto.', 'mussol-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.02.15', '2-D', 'mussol-01.jpg', 'mussol-02.jpg', 'mussol-03.jpg'),
(9, 5, 5, 'Sephora', 'En Sephora se ofrece a los clientes una serie de productos relacionados con la belleza y el cuidado personal. Sephora se encarga del maquillaje y productos cosméticos para la mujer, pero también tiene una amplia gama de productos para el cuidado del hombre. También se ofrece a los clientes el mejor asesoramiento sobre todos los productos, para que los clientes puedan conocer todo acerca de cada producto.', 'sephora-logo.jpg', 'lunes a sábado : Abierto de 9:00 a 21:00', '687.611.817', '4-B', 'sephora-01.jpg', 'sephora-02.jpg', 'sephora-03.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `apellidos`, `telefono`, `newsletter`) VALUES
(4, 'cliente', 'cliente', 'Jordi', 'Lopez', '660123456', 1),
(5, 'admin', 'admin', 'Maria', 'Garcia', '654963123', 0),
(6, 'superadmin', 'superadmin', 'Alba', 'Ponce', '456658703', 0),
(11, 'admin2', 'admin2', 'Miriameta', 'Boix', '667028922', 0),
(12, 'cliente2', 'cliente2', 'Ana', 'Soler', '913123123', 1),
(14, 'cliente3', 'cliente3', 'Sergi', 'Navarro', '667028922', 1),
(16, 'cliente4', 'cliente4', 'Ana', 'Sanz', '667028922', 1),
(18, 'cliente5', 'cliente5', 'Isabel', 'Prat', '667028922', 1),
(20, 'cliente6', 'cliente6', 'Cristina', 'Boix', '667028922', 1),
(22, 'admin3', 'admin3', 'Neus', 'Pla', '667028922', 1),
(24, 'admin4', 'admin4', 'Lluis', 'Mont', '667028922', 1),
(26, 'cliente7', 'cliente7', 'Adriá', 'Sánchez', '667028922', 1),
(28, 'cliente8', 'cliente8', 'Eugenio', 'Burgos', '667028922', 1),
(31, 'cliente9', 'cliente9', 'Mario', 'Noblejas', '667028922', 1),
(34, 'cliente10', 'cliente10', 'Fernando', 'Arnau', '667028922', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoracion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`, `id_cliente`, `id_tienda`, `puntuacion`, `comentario`, `aprobado`, `fecha`, `nivel`) VALUES
(1, 10, 1, 4, 'Es el Burguer King que suelo utilizar porque es el que tengo más cerca, pero el servicio es horrible. Los mediodías de entre semana, siendo 4 empleados (2 en cocina), nos tocó esperar más de 20 minutos únicamente siendo 4 personas pidiendo comida. ', 0, '2020-05-20', 3),
(3, 10, 2, 4, 'Restaurante con gran afluencia debido a la actividad del centro comercial. En general el personal suele ser bastante rápido y el tiempo de espera no es muy elevado.', 1, '2020-05-17', 4),
(9, 10, 3, 2, 'No estaba tan bueno', 0, '2020-05-23', 2),
(10, 12, 2, 5, 'Lo mejor', 0, '2020-05-23', 2),
(11, 11, 3, 5, 'Muy bueno, repetiría.', 0, '2020-05-23', 2),
(12, 12, 1, 4, 'Buen ambiente y servicio impecable.', 0, '2020-05-23', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `superadministradores`
--
ALTER TABLE `superadministradores`
  ADD PRIMARY KEY (`id_superadmin`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `superadministradores`
--
ALTER TABLE `superadministradores`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `FK_usuarios_Admin` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_niveles_clientes` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuarios_clientes` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `superadministradores`
--
ALTER TABLE `superadministradores`
  ADD CONSTRAINT `FK_usuarios_SuperAdmin` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD CONSTRAINT `FK_tiendas_administradores` FOREIGN KEY (`id_admin`) REFERENCES `administradores` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tiendas_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `FK_valoraciones_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_valoraciones_tienda` FOREIGN KEY (`id_tienda`) REFERENCES `tiendas` (`id_tienda`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
