-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-05-2020 a las 20:54:10
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id13879041_cc_glories`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `id_usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `icono`) VALUES
(1, 'Alimentación', 'icon-alimentacion.png'),
(2, 'Belleza', 'icon-belleza.png'),
(3, 'Deportes', 'icon-deportes.png'),
(4, 'Electrónica', 'icon-electronica.png'),
(5, 'Moda', 'icon-moda.png'),
(6, 'Restauración', 'icon-restauracion.png');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `id_nivel`, `alta`, `valoraciones`) VALUES
(1, 21, 2, '2020-05-27', 0),
(2, 22, 2, '2020-05-27', 0),
(3, 23, 2, '2020-05-27', 0),
(4, 24, 2, '2020-05-27', 0),
(5, 25, 2, '2020-05-27', 0),
(6, 26, 2, '2020-05-27', 0),
(7, 27, 2, '2020-05-27', 0),
(8, 28, 2, '2020-05-27', 0),
(9, 29, 2, '2020-05-27', 0),
(10, 30, 2, '2020-05-27', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nombre`) VALUES
(1, 'Nada'),
(2, 'Principiante'),
(3, 'Intermedio'),
(4, 'Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superadministradores`
--

CREATE TABLE `superadministradores` (
  `id_superadmin` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superadministradores`
--

INSERT INTO `superadministradores` (`id_superadmin`, `id_usuario`) VALUES
(1, 19),
(2, 20);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `id_admin`, `id_categoria`, `nombre`, `descripcion`, `logo`, `horario`, `telefono`, `ubicacion`, `foto1`, `foto2`, `foto3`) VALUES
(1, 1, 6, 'Burger King', 'Disfrute de una amplia variedad de hamburguesas a la brasa, pollo, pescado y verduras, ensaladas y postres.', 'bk-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '66.012.34.56', '3-B', 'bk-01.jpg', 'bk-02.jpg', 'bk-03.jpg'),
(2, 2, 6, 'Mc Donalds', 'Mcdonald\'s ofrece productos elaborados con los mejores ingredientes, recién hechos, que cumplen y superan los más exigentes estándares de seguridad alimentaria desde el origen hasta el restaurante. Ponen a tu disposición una comida variada, con gran sabor, un menú con opciones para todos los gustos, y que puedas tener acceso en todo momento a la información nutricional y alérgenos de sus productos. ', 'mcdonalds-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.06.65', '0-C', 'mcdonalds-01.jpg', 'mcdonalds-02.jpg', 'mcdonalds-03.jpg'),
(3, 3, 6, 'Mussol', 'Una oferta gastronómica con lo mejor de la cocina tradicional española, servido junto a una cerveza natural en un ambiente inspirado en las tabernas clásicas. Aquí el tapeo es un arte. Prueba sus Huevos Rotos Clásicos o los de la Abuela. Disfruta de sus platos para compartir: sus fiestas mayores con una selección de ingredientes para combinar, tostas a tu gusto, parrillada de carne, capeas con una selección de los mejores platos y una amplia variedad de raciones con los mejores sabores del pueblo, la huerta y el puerto.', 'mussol-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.02.15', '2-D', 'mussol-01.jpg', 'mussol-02.jpg', 'mussol-03.jpg'),
(4, 4, 2, 'Sephora', 'En Sephora se ofrece a los clientes una serie de productos relacionados con la belleza y el cuidado personal. Sephora se encarga del maquillaje y productos cosméticos para la mujer, pero también tiene una amplia gama de productos para el cuidado del hombre. También se ofrece a los clientes el mejor asesoramiento sobre todos los productos, para que los clientes puedan conocer todo acerca de cada producto.', 'sephora-logo.jpg', 'lunes a sábado : Abierto de 9:00 a 21:00', '687.611.817', '4-B', 'sephora-01.jpg', 'sephora-02.jpg', 'sephora-03.png'),
(5, 5, 2, 'Druni', 'Deja tu huella allá donde vayas, la esencia de perfume no solo es un aroma, es mucho más, es como tu carta de presentación y dice mucho de tu personalidad.', 'druni-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '687.611.817', '2-A', 'druni-01.jpg', 'druni-02.jpg', 'druni-03.jpg'),
(6, 6, 2, 'Occitane', 'Cadena francesa de venta de productos para la piel, el pelo y el baño, muchos de ingredientes naturales.\r\n', 'occitane-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.06.65', '1-C', 'occitane-01.jpg', 'occitane-02.jpg', 'occitane-03.jpg'),
(7, 7, 1, 'Mercadona', 'Productos de alimentación, droguería y perfumería en supermercados con aparcamiento y servicio a domicilio.', 'mercadona-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '687.611.817', '0-D', 'mercadona-01.jpg', 'mercadona-03.jpg', 'mercadona-03.jpg'),
(8, 8, 1, 'Aldi', 'Cadena de supermercados que vende productos frescos como carne, verduras o lácteos a precios económicos.\r\n', 'aldi-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '687.611.817', '9-E', 'aldi-01.jpg', 'aldi-02.jpg', 'aldi-03.jpg'),
(9, 9, 1, 'Dia', 'Alimentación, bebidas, droguería y perfumería en supermercados con productos propios y de primeras marcas.\r\n', 'dia-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '93.486.06.65', '2-V', 'dia-01.jpg', 'dia-02.jpg', 'dia-03.jpg'),
(10, 10, 3, 'Adidas', 'Ropa y accesorios deportivos que cuenta con marca propia, para hombres, mujeres y niños en cadena de tiendas.\r\n', 'adidas-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '687.611.817', '7-W', 'adidas-01.jpg', 'adidas-02.jpg', 'adidas-03.jpg'),
(11, 11, 3, 'Decathlon', 'Decathlon es una cadena de establecimientos de grandes superficies, dedicada a la venta y distribución de material deportivo, filial del grupo francés Mulliez. Presente en 57 países, destaca por un fuerte desarrollo de sus marcas propias.​', 'decathlon-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '687.611.817', '3-W', 'decathlon-01.jpg', 'decathlon-02.jpg', 'decathlon-03.jpg'),
(12, 12, 3, 'AW Lab', 'La tienda online de calzado, ropa y accesorios para hombres y mujeres con la tendencia del estilo deportivo urbano. Zapatos Nike, Adidas y All Star. ', 'awlab-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.06.65', '7-U', 'awlab-01.jpg', 'awlab-02.jpg', 'awlab-03.jpg'),
(13, 13, 4, 'Mediamarkt', 'MediaMarkt es una cadena de establecimientos de grandes superficies, dedicada a la venta de electrodomésticos, informática y electrónica de consumo, perteneciente a MediaMarktSaturn Retail Group, filial del grupo alemán Ceconomy.', 'mediamarkt-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '687.611.817', '8-S', 'mediamarkt-01.jpg', 'mediamarkt-02.jpg', 'mediamarkt-03.jpg'),
(14, 14, 4, 'Phone house', 'Carphone Warehouse es un minorista de telefonía móvil, con más de 1.700 tiendas de toda Europa. Tiene su sede en el Reino Unido, que incluye todas las tiendas de Carphone Warehouse. Fuera de Irlanda y el Reino Unido.', 'phonehouse-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '687.611.817', '2-A', 'phonehouse-01.jpg', 'phonehouse-02.jpg', 'phonehouse-03.jpg'),
(15, 15, 4, 'Worten', 'Worten es una cadena portuguesa de establecimientos dedicada a la venta de electrodomésticos y electrónica perteneciente al grupo portugués Sonae. Worten cuenta con tiendas en Portugal y España.', 'worten-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '93.486.06.65', '5-A', 'worten-01.jpg', 'worten-02.jpg', 'worten-03.jpg'),
(16, 16, 5, 'C y A', 'Lo sabemos, vestir a la última y sentirte cómodo a la vez son aspectos clave para funcionar en tu día a día. Por eso, en las secciones de C&A podrás encontrar prendas que marquen tendencia y que, a la vez, te acompañen en tu enérgico ritmo de vida. La moda online de C&A está pensada para ti, para que disfrutes cada momento con cómodos looks y vayas siempre a la última.', 'c_a-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '687.611.817', '0-A', 'c_a-01.jpg', 'c_a-02.jpg', 'c_a-03.jpg'),
(17, 17, 5, 'Zara', 'Zara es una cadena de moda de la provincia española en Arteixo, La Coruña perteneciente al grupo Inditex. Fue fundada por Amancio Ortega Gaona y Rosalía Mera.​ Es la cadena insignia del grupo textil Inditex y cuenta con más 2.040 tiendas repartidas por todo el mundo.​', 'zara-logo.png', 'lunes a sábado : Abierto de 9:00 a 22:00', '687.611.817', '0-B', 'zara-01.jpg', 'zara-02.jpg', 'zara-03.jpg'),
(18, 18, 5, 'H y M', 'Hennes & Mauritz AB o simplemente H&M es una cadena sueca de tiendas de ropa, complementos y cosmética con establecimientos en Europa, Oriente Próximo, África, Asia y América. Cuenta con 4700 tiendas propias repartidas en 69 países y da empleo a aproximadamente 161 000 personas.', 'h_m-logo.png', 'lunes a domingo : Abierto de 9:00 a 1:00', '93.486.06.65', '0-F', 'h_m-01.jpg', 'h_m-02.jpg', 'h_m-03.jpg');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `apellidos`, `telefono`, `newsletter`) VALUES
(1, 'admin1', 'admin1', 'Jordi', 'Lopez', '660123456', 0),
(2, 'admin2', 'admin2', 'Maria', 'Garcia', '660123456', 0),
(3, 'admin3', 'admin3', 'Alba', 'Ponce', '660123456', 0),
(4, 'admin4', 'admin4', 'Miriameta', 'Boix', '660123456', 0),
(5, 'admin5', 'admin5', 'Ana', 'Soler', '660123456', 0),
(6, 'admin6', 'admin6', 'Sergi', 'Navarro', '660123456', 0),
(7, 'admin7', 'admin7', 'Ana', 'Sanz', '660123456', 0),
(8, 'admin8', 'admin8', 'Isabel', 'Prat', '660123456', 0),
(9, 'admin9', 'admin9', 'Cristina', 'Boix', '660123456', 0),
(10, 'admin10', 'admin10', 'Neus', 'Pla', '660123456', 0),
(11, 'admin11', 'admin11', 'Lluis', 'Mont', '660123456', 0),
(12, 'admin12', 'admin12', 'Adriá', 'Sánchez', '660123456', 0),
(13, 'admin13', 'admin13', 'Eugenio', 'Burgos', '660123456', 0),
(14, 'admin14', 'admin14', 'Mario', 'Noblejas', '660123456', 0),
(15, 'admin15', 'admin15', 'Fernando', 'Arnau', '660123456', 0),
(16, 'admin16', 'admin16', 'Josep', 'Navarro', '660123456', 0),
(17, 'admin17', 'admin17', 'Lluis', 'Paz', '660123456', 0),
(18, 'admin18', 'admin18', 'Ismael', 'Guerrero', '660123456', 0),
(19, 'superadmin1', 'superadmin1', 'Angello', 'Zamudio', '660123456', 0),
(20, 'superadmin2', 'superadmin2', 'Gerard', 'Prat', '660123456', 0),
(21, 'cliente1', 'cliente1', 'José', 'Rodriguez', '660987654', 1),
(22, 'cliente2', 'cliente2', 'Félix', 'Castro', '660987654', 1),
(23, 'cliente3', 'cliente3', 'Omar', 'Santos', '660987654', 1),
(24, 'cliente4', 'cliente4', 'Fátima', 'Vall', '660987654', 1),
(25, 'cliente5', 'cliente5', 'Miquel', 'Boix', '660987654', 1),
(26, 'cliente6', 'cliente6', 'Marta', 'Prat', '660987654', 1),
(27, 'cliente7', 'cliente7', 'Augusto', 'Ugarte', '660987654', 1),
(28, 'cliente8', 'cliente8', 'Laura', 'Chávez', '660987654', 1),
(29, 'cliente9', 'cliente9', 'Lluis', 'Manzanares', '660987654', 1),
(30, 'cliente10', 'cliente10', 'Gloria', 'Moreno', '660987654', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`, `id_cliente`, `id_tienda`, `puntuacion`, `comentario`, `aprobado`, `fecha`, `nivel`) VALUES
(1, 1, 7, 5, 'Me encanta, hay de todo y buena calidad, hoy he comprado sushi, a ver cómo está.', 1, '2020-05-27', 2),
(2, 1, 1, 4, 'Atienden rápido, buen servicio, limpio y muy amplio e intimo la zona de arriba', 0, '2020-05-27', 2),
(3, 1, 11, 2, 'No hay mucha variedad, es más un centro de recogida de pedidos que una tienda', 1, '2020-05-27', 2),
(4, 1, 8, 4, 'Los helados son muy buenos también junto con la panadería y pastelería.', 1, '2020-05-27', 2),
(5, 1, 9, 5, 'Limpio, bien surtido y trato amable por las cajeras.', 1, '2020-05-27', 2),
(6, 1, 4, 4, 'Todo mucho más ordenado que en otros sephora. La chica fue muy atenta conmigo.', 1, '2020-05-27', 2),
(7, 1, 5, 2, 'Muy buenos productos y buenos precios pero las dependientas tienen muy pocas ganas de trabajar. No sé cuál será su situación laboral y si está justificada su actitud, pero he ido pidiendo consejo para elegir un maquillaje y me han atendido con muy pocas ganas y despachándome rápido, finalmente me he traído uno que no cumplía con lo que le pedía. Igualmente me ha pasado con el resto de la compra, y sinceramente después de haberme gastado 50€ en productos no es agradable salir con esa sensación de mala atención.', 1, '2020-05-27', 2),
(8, 1, 6, 5, 'Me encantan sus productos especialmente el aceite de almendras que te deja la piel suave e hidratada. La dependienta también te ayuda mucho en aconsejarte y elegir el producto o productos adecuados para ti y para tus regalos a tu familia y amigos.', 1, '2020-05-27', 2),
(9, 1, 10, 1, 'Si estáis cerrados lo mínimo que podrías hacer es ponerlo en la web. Y cambiar el contestador. \r\nPenoso', 1, '2020-05-27', 2),
(10, 1, 12, 5, 'Bonita tienda de deportes,  no es muy grande, pero tienen bastante variedad,  diferentes tipos de zapatillas tanto de chica como de chico,  sudaderas... Tienen también zapatillas de niño,  te tratan muy bien,  súper simpáticos y amables,  tienda acogedora, con  precios asequibles.', 1, '2020-05-27', 2),
(11, 1, 13, 4, 'Espacioso y con buenos productos. Casi todo lo que tengo en casa es de allí y nunca he tenido queja alguna, ni con las devoluciones. Eso sí, echo en falta la anterior sección de libros y películas, antes era más grande y contenía ofertas interesantes.', 1, '2020-05-27', 2),
(12, 1, 14, 1, 'Son unos auténticos estafadores, siempre ponen pegas para las devoluciones, te venden cosas rotas o ya usadas y que han sido vendidas anteriormente.', 1, '2020-05-27', 2),
(13, 1, 15, 4, 'Aparcamiento justo en la puerta, nunca he esperado mucho tiempo en la cola, no hay tanta aglomeración de gente, aquello es muy grande y tienen de todo.', 1, '2020-05-27', 2),
(14, 1, 16, 4, 'Es un establecimiento donde puedes comprar todo tipo de ropa  tanto para el hombre como para la mujer. Su relacion precio calidad es buena.', 1, '2020-05-27', 2),
(15, 1, 17, 5, 'La ropa muy bien y la calidad bastante buena, me gusta comprar allí y mi madre también.', 1, '2020-05-27', 2),
(16, 1, 18, 4, 'Es un establecimiento donde puedes comprar todo tipo de ropa  tanto para el hombre como para la mujer. Su relacion precio calidad es buena.', 1, '2020-05-27', 2),
(17, 1, 3, 1, 'No se por donde empezar... El bar esta sucio, el bocadillo que pedí me lo trajeron en media hora y frio y la gente maleducada.', 1, '2020-05-27', 2),
(18, 1, 2, 4, 'Buen lugar. Los camareros y el personal muy amables. Los baños limpios.\r\n', 1, '2020-05-27', 2),
(19, 3, 2, 1, 'Pésimo total las bandejas dnd se sirve la comida chorreando le puso el papel y se mojó del agua q traía las patatas fritas las mesas sucias ....un desastre total es la primera vez que pasa eso en un Mac donald.', 1, '2020-05-28', 2),
(20, 2, 7, 3, 'Siempre muy limpio. La única pega que pondría es que las cajeras deberían estar más atentas a los clientes y hablar menos de sus vidas las unas con las otras mientras nos cobran. Sus vidas no me interesan lo más mínimo.', 1, '2020-05-29', 2),
(21, 2, 8, 2, 'Le faltan marcas yo echo de menos entre otros el arroz la cazuela que se consume en casa de toda la vida es tan bueno como el mejor pero más baratito.', 1, '2020-05-29', 2),
(22, 2, 9, 4, 'El parking no merece la pena entrar si es por una o dos cosas ya que te costará más que lo que compres. Empleados algo bordes si entras en repetidas ocasiones por varios productos por olvidos o lo que sea.', 1, '2020-05-29', 2),
(23, 2, 4, 3, 'Muy pequeño, me gustaría que fuese más grande.', 1, '2020-05-29', 2),
(24, 2, 5, 4, 'Variedad, limpieza,buen servicio y empleadas simpáticas no creo que se pueda pedir más a este tipo establecimientos.', 1, '2020-05-29', 2),
(25, 2, 6, 3, 'Cadena de productos de perfumería y similares, a veces con buenas ofertas.', 1, '2020-05-29', 2),
(26, 2, 10, 4, 'Tienen buenos precios y algunos modelos que no encuentras casi en ninguna tienda. Los chicos son muy amables.', 1, '2020-05-29', 2),
(27, 2, 11, 4, 'Es una gran opción si no dispones de coche. Podría ser más grande y estar mejor surtido. La tienda grande está lejos y no siempre se puede ir.', 1, '2020-05-29', 2),
(28, 2, 12, 3, 'La ropa está bien en lo que a calidad/precio se refiere. En ropa de mujer encuentras muchas tallas y eso se agradece. La ropa de niños es muy chula y tienen muchas ofertas en conjuntos que son una monada.', 1, '2020-05-29', 2),
(29, 2, 13, 2, 'Suelen tener lo que voy buscando. El problema es que cuesta mucho trabajo que te atiendan.', 1, '2020-05-29', 2),
(30, 2, 14, 5, 'Muy buen sitio donde informarse de los últimos modelos de móviles. También hacen seguros que están bastante bien y contratos de luz con los que te ahorras bastante comparado con otras compañías. Me atendió un chico llamado David fue muy apañado y simpático.', 1, '2020-05-29', 2),
(31, 2, 15, 3, 'Desde la ultima reforma que lo hicieron la mitad de grande ha perdido mucha variedad de productos.', 1, '2020-05-29', 2),
(32, 2, 16, 3, 'Me gusta el apartado que tienen de la firma cortefiel, tienen poco espacio dedicado a ropa de mujer.', 1, '2020-05-29', 2),
(33, 2, 17, 1, 'Son pésimas en la hora de la atención al cliente. Súper lentas. En caja siempre están de cachondeo y les pesa trabajar. Increíble los lentas que son, encima te mandan de una a otra con tal de no atenderte. Pésimo todas.', 1, '2020-05-29', 2),
(34, 2, 18, 2, 'La veo escasa de personal si necesitas que te saquen una talla nunca encuentras a alguien la última vez que estuve  me tuve que ir indignada después  de estar media hora esperando alguien para que me mirara  si había una talla.. pregunte y por lo visto estaban todas en almacén y siempre hay mucha cola a la hora de pagar', 1, '2020-05-29', 2),
(35, 2, 1, 2, 'Que cambien la lechuga de vez en cuando por favor, lamentable lo asquerosa que estaba. Por lo demás bien.', 0, '2020-05-29', 2),
(36, 2, 2, 1, '30 minutos esperando mi pedido, no por culpa de los chicos desde luego que fueron amables, si no por la falta de personal. La comida estaba muy buena, pero los de arriba deberían mirar el poner más personal', 1, '2020-05-29', 2),
(37, 2, 3, 5, 'Servicio muy amable y ambiente muy agradable. La comida también estaba muy buena, destaco especialmente los escalopines, el queso de cabra le da un toque de sabor estupendo.', 1, '2020-05-29', 2),
(38, 3, 7, 1, 'Pésima la previsión de carnes, no había de casi nada, no volveré más.', 1, '2020-05-29', 2),
(39, 3, 8, 5, 'La verdad que los trabajadores son muy amables y durante el estado de alarme y aún el miedo que tienen siguen ayudándote como siempre.', 1, '2020-05-29', 2),
(40, 3, 9, 2, 'No gusta nada las nuevas ubicaciones de la pescadería', 1, '2020-05-29', 2),
(41, 3, 4, 5, 'El personal muy atento y considerado', 1, '2020-05-29', 2),
(42, 3, 5, 5, 'Tienda situada en un entorno inmejorable. Unos perfumes espectaculares. Unas ofertas muy buenas y un trato inmejorable. Recomendable. Hay que ir cada mes al menos una vez. Siempre que voy me llevo unas colonias y perfumes buenísimos. Gracias por todo. Me encanta.', 1, '2020-05-29', 2),
(43, 3, 6, 1, 'Esta muy bien porque puedes encontrar muchas cosas y de diferentes marcas. Pero las dependientas son unas acosadoras que intentan venderte la línea que cada una vende.', 1, '2020-05-29', 2),
(44, 3, 10, 4, 'Buen equipo', 1, '2020-05-29', 2),
(45, 3, 11, 5, 'Local grande, organizado por deporte en distintos pisos, la atención es buena, cuesta encontrar a alguno de los empleados, pero cuando logras tener su atención te ayudan en todo lo que necesitas! Hay que ir con tiempo porque siempre se forma cola para pagar, aunque esta la opción de hacerlo usando una máquina para el pago con tarjeta.', 1, '2020-05-29', 2),
(46, 3, 12, 3, ' Hace 2 meses\r\nCada vez que voy bajo la mayoría de los productos de varios géneros, hay un cartel con el precio no correspondente al real y cada vez que voy a la caja tengo una sorpresa en lo que quiero comprar.', 1, '2020-05-29', 2),
(47, 3, 13, 1, 'Media Markt ....99,9% inversión en publicidad 00,01 % inversión en equipo humano y selección de personal , imagino que pagan lo que pagan..y se nota notablemente...horrible la atención, la profesionalidad, atención telefónica inexistente.', 1, '2020-05-29', 2),
(48, 3, 14, 2, 'Pocos conocimientos d los empleados, falta de profesionalidad, trato  informal, rayando mala educación.', 1, '2020-05-29', 2),
(49, 3, 15, 2, 'He realizado una compra de una lavadora, que al usarla por primera vez resulta que estaba dañada y pierde agua. No tienen servicio de atención al cliente.', 1, '2020-05-29', 2),
(50, 3, 16, 3, 'Hace muchos años que compro en C y A. Uso talla grande y siempre encuentro lo que busco. Me gusta mucho su ropa. También compro ropa para mis nietas y nietos.', 1, '2020-05-29', 2),
(51, 3, 17, 3, 'Tienda de Ropa bonita y a un precio que se puede comprar, zapatos, complementos muy chulos. Calidad buena. Todas las semanas hay algo distinto. Y la ropa de niños me encanta.', 1, '2020-05-29', 2),
(52, 3, 18, 5, 'Me gusta mucho, he encontrado ropa bastante bien de precio por las rebajas.', 1, '2020-05-29', 2),
(53, 3, 1, 5, 'En la categoría de comida rápida me gusta el whoper.  Intento no comer carbohidratos así que si necesito comer algo rápido lo pido con ensalada y la hamburguesa es lo suficientemente grande para quedar saciada sin comer el pan. Claro que también voy como capricho y entonces pido hasta patatas :)', 1, '2020-05-29', 2),
(54, 3, 3, 5, 'Muy bien,limpio y atención rápida, suelo ir a comer un día por semana al salir d curro y 0 quejas :)', 1, '2020-05-29', 2),
(55, 4, 7, 5, 'Amplio y cómodo local donde puedes comprar todo lo necesario para tu hogar o cualquier otra comprra rápida. Buena atención y con los precios característicos de esta cadena de supermercados. Buena atención', 1, '2020-05-29', 2),
(56, 4, 8, 4, 'Es agradable, no se diferencia tanto de su competencia en cuanto a espacio. Tiene productos buenos a buenos precios, si hay que verificar (como en todos) que los precios bajos sean de buena calidad y no rendidos con otros ingredientes. Tiene buena variedad de quesos y jamones.', 1, '2020-05-29', 2),
(57, 4, 9, 5, 'Este negocio destaca por la buena atención al cliente,la familiaridad en el trato,la limpieza de sus instalaciones,la excelente calidad-precio de sus productos y al gran esfuerzo y trabajo que realizan día a día todos sus emplead@s. \r\n Mucha salud y ánimo!!!', 1, '2020-05-29', 2),
(58, 4, 4, 4, 'Tienda que se dedica a la venta de todo tipo de maquillajes, productos de belleza, todo lo referente al cuidado de la piel y por extensión a la perfumería en general. Se encuentra ubicado dentro del Corte Inglés, y tiene una amplia variedad para la comercialización. La atención brindada por sus dependientes es dedicada y amable y los precios son de moderados a altos. Es recomendable su visita!!\r\n', 1, '2020-05-29', 2),
(59, 4, 5, 2, 'Mi padre se ha quedado sin regalo de reyes. El pedido se realizo hace mas de dos semanas y hemos estado esperando al transportista en 4 ocasiones sin salir de casa. Por estar en las fechas le sugiero que voy a recoger el producto a la tienda físicamente conservándome el precio y me niegan esta opción. Supuestamente me realizaran el abono pero me han ocasionado un gran perjuicio y molestias.', 1, '2020-05-29', 2),
(60, 4, 6, 4, 'Me fascinan todos sus productos. No sabría cuál es el favorito... pero sus fragancias son divinas...', 1, '2020-05-29', 2),
(61, 4, 10, 4, 'Una garantía variedad de zapatillas y artículos de deporte. Todo muy bien señalizado y limpio. \r\nEl trato del personal excelente. \r\nSi tuviese que cambiar algo sería, habilitar más sitios para sentarse y probarse las zapatillas ya que hay poco y es muy estrecho. Añadiría también más espejos de pie.', 1, '2020-05-29', 2),
(62, 4, 11, 1, 'La compra online va de pena, hice un pedido el 10-Mayo y aún está en preparación, me han anulado artículos de mi compra. La fecha estimada de entrega era el pasado 21-Mayo, estoy por anularlo no creo ni que lo reciba en este año. Nunca más.', 1, '2020-05-29', 2),
(63, 4, 12, 3, 'Me encanta la tienda! Productos chulos y exclusivos. Los vendedores muy amables y serviciales', 1, '2020-05-29', 2),
(64, 4, 13, 2, 'Que casualidad que todos los dispositivos que he comprado alli han salido defectuosos. Incluida engañifa de devolverte el dinero para no cubrir garantía para que luego tu compres el mismo articulo mas caro: me he sentido engañado casi en cada visita. Nada recomendable.', 1, '2020-05-29', 2),
(65, 4, 14, 2, 'Compré mi telefono hace 5 meses la atencion fue estupenda, el problema es el siguiente, te ofrecen un seguro(tienen varios tipos) yo escogí el que cubria todo ya que iba a sacar un telefono de gama alta en este caso un Samsung S10+, la…', 1, '2020-05-29', 2),
(66, 4, 15, 1, 'Menuda vergüenza de tienda. Realicé un pedido valorado en 100€. A la semana y media, me dicen que se cancela parte del pedido. Voy a tienda y me confirman que es así, pero que recibiré seguro el resto. Ahora acabo de recibir otro correo diciendo que se cancela por completo. Menuda Vergüenza. \r\nVenden más de lo que tienen. \r\nNo la recomiendo a nadie. PÉSIMOS.', 1, '2020-05-29', 2),
(67, 4, 16, 5, 'Magnifica tienda de ropa y complementos muy bien surtida y atendida', 1, '2020-05-29', 2),
(68, 4, 17, 5, 'Me encanta esta tienda de ropa, en calidad y precio, para mí es mejor que el Corte inglés. Hay una gran variedad de ropa a muy buen precio.', 1, '2020-05-29', 2),
(69, 4, 18, 5, 'Gran tienda donde encontramos ropa para todas las edades y tallas. \r\nEn planta alta está la colección de señoras.\r\nEn la planta sótano se encuentra la sección de caballeros.\r\nTambién en planta baja tienen la lencería de señoras y Tallas especiales para señoras al mismo precio que el resto de la colección !!\r\n\r\nMe parece de los comercios más completos del centro y de los que mayor relación calidad-precio ofrecen.', 1, '2020-05-29', 2),
(70, 4, 1, 1, 'Voy 3 días seguidos y las pantallas para comprar las tienen apagadas. Me resultaban muy cómodas, se podría quitar todo lo que no te gusta de hamburguesas, tener más tiempo para elegir etc. No vuelvo mas', 1, '2020-05-29', 2),
(71, 4, 2, 5, 'Buena experiencia! Menú cupón de steakhouse con feta bites. Me ha gustado bastante, y está en todo el centro. Buen sitio.', 1, '2020-05-29', 2),
(72, 4, 3, 4, 'Es muy bueno para ir con amigos y disfrutar de algo para picar y compartir. El vino de verano es rico. Aunque dicen que te llaman para tu pedido lo mejor es ir y verificar, aveces no lo hacen. Casi siempre está lleno y hay que tener cuidado con las mesas.', 1, '2020-05-29', 2),
(73, 5, 7, 4, 'En su línea. Muy buena atención y buenos productos. La única pega lo caras que son las bolsas de la compra', 1, '2020-05-29', 2),
(74, 5, 8, 2, 'Compré ayer pechuga de pollo rural para empanarlo porque me sale muy rico ,mi sorpresa fue que después de prepararlo y freírlo estaba tan duro que me resultó desagradable y decepcionante .', 1, '2020-05-29', 2),
(75, 5, 9, 2, 'No lo detesto,  pero siempre que voy a por el pan que me gusta  nunca hay,  y solo son las 20.45 hrs,por lo demás  ....bien, compro  bastante ahí.', 1, '2020-05-29', 2),
(76, 5, 4, 2, 'No me ha gustado como me han tratado. Por eso no le pongo más estrellas', 1, '2020-05-29', 2),
(77, 5, 5, 3, 'Un poco caro.', 1, '2020-05-29', 2),
(78, 5, 6, 2, 'Muy caro.', 1, '2020-05-29', 2),
(79, 5, 10, 1, 'Estuve aquí con mi madre para buscar un regalo por navidad y un chico que trabaja allí ,escuchándonos hablar italiano llamó una compañera para\" controlarnos\" porque italianas. He trabajado en muchas tiendas y nunca me he permitido comportarme así. Una vergüenza.', 1, '2020-05-29', 2),
(80, 5, 11, 5, 'Buena ropa deportiva y muy bien atendido por el personal. Se nota que lo hacen con profesionalidad.', 1, '2020-05-29', 2),
(81, 5, 12, 1, 'La tienda en general, bien.Los empleados son muy atentos y amables pero el encargado de cobrar, que creo es el encargado de la tienda, es un déspota que me hizo sentir hasta vergüenza ajena del comportamiento grosero con los empleados', 1, '2020-05-29', 2),
(82, 5, 13, 3, 'He comprado un climatizador y el empleado a sido amable me a dicho como funciona y me acompañado con el paquete hasta la caja para que yo no la cogiera pues pesaba. Muy agradable y agradecida por el trato', 1, '2020-05-29', 2),
(83, 5, 14, 4, 'Buena atención. Juani ha sido muy amable y resolutiva.', 1, '2020-05-29', 2),
(84, 5, 15, 5, 'Buena atención del personal, súper efectiva.', 1, '2020-05-29', 2),
(85, 5, 16, 4, 'Muy buena tienda, todo muy bien colocado y te atienden rápido.', 1, '2020-05-29', 2),
(86, 5, 17, 3, 'La ropa es muy bonita y concuerda con los precios, fui en la época de rebajas buscando unos vaqueros vintage que fuesen  buenos calidad-precio y en esta tienda los encontré. La recomiendo!', 1, '2020-05-29', 2),
(87, 5, 18, 3, 'Ropa juvenil y ha bien precio. Vestir a la moda de forma más o menos asequible.', 1, '2020-05-29', 2),
(88, 5, 1, 1, 'No recomiendo este Burger King por la gente que trabaja. Muy lenta mucha suciedad', 1, '2020-05-29', 2),
(89, 5, 2, 4, 'La atención recibida de Juan Luis ha sido excelente, trato cordial y servicial, de 10. \r\nSólo con eso merece la pena repetir.', 1, '2020-05-29', 2),
(90, 5, 3, 2, 'Solo se me ocurre pensar que los gerentes o responsables de este restaurantes están de vacaciones... desordenado y sucio, hay mucha rotación de mesas y no se limpian... muy muy lento', 1, '2020-05-29', 2);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `superadministradores`
--
ALTER TABLE `superadministradores`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
