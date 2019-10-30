-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2019 a las 22:31:51
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiladora`
--

DROP TABLE IF EXISTS `alquiladora`;
CREATE TABLE IF NOT EXISTS `alquiladora` (
  `id_alquiladora` int(10) NOT NULL AUTO_INCREMENT,
  `capacidad_mesa` int(12) NOT NULL,
  `diseño` text NOT NULL,
  `modelo_silla` varchar(20) NOT NULL,
  `num_sillas` int(40) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `forro` varchar(20) NOT NULL,
  `loza` varchar(20) NOT NULL,
  `cristaleria` varchar(20) NOT NULL,
  `mesero` int(50) NOT NULL,
  `comentario` varchar(256) DEFAULT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_alquiladora`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alquiladora`
--

INSERT INTO `alquiladora` (`id_alquiladora`, `capacidad_mesa`, `diseño`, `modelo_silla`, `num_sillas`, `foto`, `precio`, `forro`, `loza`, `cristaleria`, `mesero`, `comentario`, `id_cuenta`) VALUES
(1, 12, '', 'Sillas de madera', 12, '', 3500, 'Sin forro', 'Ceramica', 'Cristal cortado', 24, 'Excelente servicio', 1),
(2, 20, '', 'Sillas de metal ', 20, '', 3000, 'Tela', 'Barro', 'Copas', 25, 'Calidad en los servicios', 2),
(3, 24, '', 'Silla Tiffany', 24, '', 4000, 'Textil color morado', 'Vajillas de vidrio', 'Vados de vidrio', 24, 'Calidad y comodidad ', 3),
(4, 8, '', 'Silla de madera', 8, '', 1500, 'Sin forro', 'Vajilla porcelana ', 'Vaso tequilero', 10, 'Excelente servicio', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `curp` varchar(20) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `cuenta_bancaria` bigint(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pago_total` float NOT NULL,
  `tipo_evento` varchar(50) NOT NULL,
  PRIMARY KEY (`curp`,`tipo_evento`),
  KEY `tipo_evento` (`tipo_evento`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`curp`, `rfc`, `nombre`, `paterno`, `materno`, `cuenta_bancaria`, `login`, `pago_total`, `tipo_evento`) VALUES
('HYTR234567JUKLPG21', 'HYGT236541WE1', 'Brenda ', 'Torres', 'Martínez', 1234567123456789, 'HYTR234567JUKLPG21', 0, 'Corporativo'),
('JKKK555555PPPPPP99', 'WWWW777777UU2', 'Roman', 'Bedolla', 'Gallegos', 123456789234567823, 'JKKK555555PPPPPP99', 0, 'Social'),
('PPPP888888PPPPPP88', 'FFFF888888FF8', 'Maria', 'Delgado', 'Delgado', 300300300300100100, 'PPPP888888PPPPPP88', 0, 'Corporativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

DROP TABLE IF EXISTS `comida`;
CREATE TABLE IF NOT EXISTS `comida` (
  `id_comida` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fotos` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `comentario` varchar(256) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `tipo_comida` varchar(50) NOT NULL,
  PRIMARY KEY (`id_comida`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`id_comida`, `nombre`, `fotos`, `precio`, `comentario`, `id_cuenta`, `tipo_comida`) VALUES
(1, 'Mole estilo Oaxaca', '', 1000, 'Buena calidad', 7, 'mexicana'),
(2, 'Pozole estilo Aguascalientes', '', 1200, 'Platillos  de excelente calidad.', 7, 'mexicana'),
(3, 'Paella de mariscos', '', 900, 'Buen servicio', 8, 'Española'),
(4, 'Pollo a la parmesana', '', 450, 'Excelente servicio, buen sazon. ', 9, 'Italiana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancaria`
--

DROP TABLE IF EXISTS `cuenta_bancaria`;
CREATE TABLE IF NOT EXISTS `cuenta_bancaria` (
  `id_cuenta` int(11) NOT NULL,
  `cuenta_bancaria` bigint(16) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta_bancaria`
--

INSERT INTO `cuenta_bancaria` (`id_cuenta`, `cuenta_bancaria`, `nombre_proveedor`, `tipo`) VALUES
(1, 1234567922345678, 'Servicio de comida vegana', 'Comida Vegana'),
(2, 3452367681212345, 'Salones Puebla', 'salon'),
(3, 1234567948140544, 'Grupos musicales \"El poblanito\"', 'Grupo musical'),
(4, 7890000765420000, 'Decoración La flor de Atlixco', 'flores'),
(5, 5675670000234123, 'Universión', 'Payasos'),
(6, 3458902465791590, 'Alquiladora Los angeles ', 'alquiladora'),
(7, 123123000000123000, 'Servicio de comida mexicana', 'mexicana'),
(8, 400440044000545450, 'Servicio de comida española', 'Gastronomía española'),
(9, 100121200022002200, 'Italian food MX', 'Italiana con influencia cultural estadounidense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicio`
--

DROP TABLE IF EXISTS `detalle_servicio`;
CREATE TABLE IF NOT EXISTS `detalle_servicio` (
  `id_detalle_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_alquiladora` int(11) NOT NULL,
  `id_comida` int(11) NOT NULL,
  `id_entretenimiento` int(11) NOT NULL,
  `id_floreria` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL,
  `id_salon` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_servicio`),
  KEY `fk_detalle_servicio_servicio1_idx` (`id_servicio`),
  KEY `id_staff` (`id_staff`),
  KEY `id_comida` (`id_comida`),
  KEY `id_entretenimiento` (`id_entretenimiento`),
  KEY `id_floreria` (`id_floreria`),
  KEY `id_musica` (`id_musica`),
  KEY `id_salon` (`id_salon`),
  KEY `id_alquiladora` (`id_alquiladora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entretenimiento`
--

DROP TABLE IF EXISTS `entretenimiento`;
CREATE TABLE IF NOT EXISTS `entretenimiento` (
  `id_entretenimiento` int(100) NOT NULL AUTO_INCREMENT,
  `payasos` varchar(15) NOT NULL,
  `precio` float NOT NULL,
  `comentario` varchar(256) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_entretenimiento`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entretenimiento`
--

INSERT INTO `entretenimiento` (`id_entretenimiento`, `payasos`, `precio`, `comentario`, `id_cuenta`) VALUES
(1, 'Lagrimita', 1500, 'Diversas dinámicas para chicos y grandes, música en vivo,regalos para niños.  ', 5),
(2, 'Pepi y papa', 2000, 'Diversion en grande, show en vivo, dinamicas para ninos, chistes etc.', 5),
(3, 'Chuponcito. ', 2500, 'Sonrisas en cada momento, regalos, música en vivo.', 5),
(4, 'Los bombones', 1500, 'Buen servicio, excelente diversión.', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `floreria`
--

DROP TABLE IF EXISTS `floreria`;
CREATE TABLE IF NOT EXISTS `floreria` (
  `id_floreria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `fotos` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `comentario` varchar(256) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_floreria`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `floreria`
--

INSERT INTO `floreria` (`id_floreria`, `nombre`, `fotos`, `precio`, `comentario`, `id_cuenta`) VALUES
(1, 'Classic Rosas rojas', '', 640, 'Diseño de rosas en cajas de madera color negro, 12 rosas rojas.', 4),
(2, 'Lofty White-Rojas', '', 340, 'Diseño de rosas en cajas de madera color blanco,cinco rosas rosas.', 4),
(3, 'Arreglo de girasoles', '', 590, 'Jarrón de vidrio con 6, 8 o 10 girasoles grandes. ', 4),
(4, 'Canastas de mimbre', '', 1990, 'Mezcla de hojas de color verde cenizo y flores poco comunes como el anturio, heliconia o bromelia. ', 4),
(5, 'Ramillete de flores', '', 490, 'Flores como las margaritas o gerbenas sobre elementos como esferas, canastas o lámparas. ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

DROP TABLE IF EXISTS `musica`;
CREATE TABLE IF NOT EXISTS `musica` (
  `id_musica` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `comentario` varchar(256) DEFAULT NULL,
  `id_tipoMusica` int(11) DEFAULT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_musica`),
  KEY `id_cuenta` (`id_cuenta`),
  KEY `id_tipoMusica` (`id_tipoMusica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id_musica`, `nombre`, `comentario`, `id_tipoMusica`, `id_cuenta`) VALUES
(1, 'Mariachi Pedregal', 'Música regional mexicana, diversos exitos.', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

DROP TABLE IF EXISTS `salon`;
CREATE TABLE IF NOT EXISTS `salon` (
  `id_salon` int(100) NOT NULL AUTO_INCREMENT,
  `capacidad` int(11) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `fotos` varchar(250) NOT NULL,
  `telefono` int(10) NOT NULL,
  `precio` float NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `comentario` varchar(256) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_salon`),
  KEY `id_cuenta` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id_salon`, `capacidad`, `ubicacion`, `fotos`, `telefono`, `precio`, `nombre`, `comentario`, `id_cuenta`) VALUES
(6, 500, 'Allende, 514 72760 San Pedro Cholula, Puebla.', 'a22d9-acrofest.jpg', 2147483647, 5000, 'Acrofest', '', 2),
(7, 1500, '27 Oriente, 610 72762 San Pedro Cholula, Puebla.', '99547-linda_vista.jpg', 2147483647, 6000, 'Linda Vista', 'Excelente ambiente.', 2),
(8, 250, 'Insurgentes, 13101 Col. Guadalupe Hidalgo 72490 Puebla, Puebla.', 'e076b-altamira.jpg', 2147483647, 5000, 'Jardín Altamida', 'Excelente ilumicación,cuenta con áreas verdes.', 2),
(9, 1200, ' Av. 5 de Mayo, 1408 72810 Cholula, Puebla.', 'b2d1f-los_girasoles.jpg', 2147483647, 6500, 'Los girasoles', 'Excelente ubicación, espacios amplios, buena iluminación. ', 2),
(10, 400, 'Prolongación 8 Norte,1814 Col. Ex hacienda Santa Teresa 72810 San Andrés Cholula, Puebla.', '293d1-picasso-s.jpg', 2147483647, 3500, 'Picasso\'s', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_servicio` date NOT NULL,
  `fecha_instalacion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `hora` time DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `tipo_evento` varchar(50) NOT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `fk_servicio_cliente1_idx` (`curp`),
  KEY `fk_servicio_staff1_idx` (`id_staff`),
  KEY `tipo_evento` (`tipo_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id_staff` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `cuenta_bancaria` bigint(20) NOT NULL,
  PRIMARY KEY (`id_staff`),
  KEY `fk_staff_usuario1_idx` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id_staff`, `nombre`, `paterno`, `materno`, `login`, `cuenta_bancaria`) VALUES
(2, 'GUADALUPE', 'PEREZ', 'GARCIA', 'lupita', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomusica`
--

DROP TABLE IF EXISTS `tipomusica`;
CREATE TABLE IF NOT EXISTS `tipomusica` (
  `id_tipoMusica` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `hora` int(10) NOT NULL,
  PRIMARY KEY (`id_tipoMusica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipomusica`
--

INSERT INTO `tipomusica` (`id_tipoMusica`, `nombre`, `precio`, `hora`) VALUES
(1, 'Mariachi', 5000, 2),
(2, 'DJ', 10000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nivel`) VALUES
('admin', 'admin', 'administrador'),
('brendaIM20', 'brendaIM20', 'administrador_evento'),
('guillermoST17', 'guillermoST17', 'administrador_evento'),
('HYTR234567JUKLPG21', '1Dmustr4', 'cliente'),
('JKKK555555PPPPPP99', 'Roman1212', 'cliente'),
('lupita', 'lupita', 'administrador_evento'),
('PPPP888888PPPPPP88', 'Maria122', 'cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiladora`
--
ALTER TABLE `alquiladora`
  ADD CONSTRAINT `alquiladora_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`);

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  ADD CONSTRAINT `detalle_servicio_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `detalle_servicio_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `detalle_servicio_ibfk_3` FOREIGN KEY (`id_comida`) REFERENCES `comida` (`id_comida`),
  ADD CONSTRAINT `detalle_servicio_ibfk_4` FOREIGN KEY (`id_entretenimiento`) REFERENCES `entretenimiento` (`id_entretenimiento`),
  ADD CONSTRAINT `detalle_servicio_ibfk_5` FOREIGN KEY (`id_floreria`) REFERENCES `floreria` (`id_floreria`),
  ADD CONSTRAINT `detalle_servicio_ibfk_6` FOREIGN KEY (`id_musica`) REFERENCES `musica` (`id_musica`),
  ADD CONSTRAINT `detalle_servicio_ibfk_7` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`),
  ADD CONSTRAINT `detalle_servicio_ibfk_8` FOREIGN KEY (`id_alquiladora`) REFERENCES `alquiladora` (`id_alquiladora`),
  ADD CONSTRAINT `fk_detalle_servicio_servicio1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_servicio_staff1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `id_staff_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entretenimiento`
--
ALTER TABLE `entretenimiento`
  ADD CONSTRAINT `entretenimiento_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `floreria`
--
ALTER TABLE `floreria`
  ADD CONSTRAINT `floreria_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`id_tipoMusica`) REFERENCES `tipomusica` (`id_tipoMusica`),
  ADD CONSTRAINT `musica_ibfk_2` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `salon_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_bancaria` (`id_cuenta`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_staff1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`tipo_evento`) REFERENCES `cliente` (`tipo_evento`);

--
-- Filtros para la tabla `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
