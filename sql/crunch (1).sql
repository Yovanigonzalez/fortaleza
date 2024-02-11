-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2024 a las 07:32:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crunch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `digital`
--

CREATE TABLE `digital` (
  `id` int(11) NOT NULL,
  `subtitulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `digital`
--

INSERT INTO `digital` (`id`, `subtitulo`) VALUES
(1, 'POLLOS'),
(2, 'POLLOS COMBOS'),
(3, 'ALITAS'),
(4, 'TENDERS'),
(5, 'CREPAS'),
(6, 'HAMBURGESAS'),
(7, 'COSTILLAS'),
(8, 'GUARNICIONES'),
(9, 'BEBIDAS'),
(10, 'MIXIOTES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio1` decimal(10,2) DEFAULT NULL,
  `precio2` decimal(10,2) DEFAULT NULL,
  `precio3` decimal(10,2) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `estatus` varchar(20) NOT NULL DEFAULT 'activo',
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `titulo`, `subtitulo`, `descripcion`, `precio1`, `precio2`, `precio3`, `categoria`, `estatus`, `imagen`, `fecha_creacion`) VALUES
(3, '', 'POLLO ASADO', 'INCLUYEN: ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:36:11'),
(4, '', 'POLLO ROSTIZADO', 'INCLUYEN: ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:36:24'),
(5, '', 'POLLO BARBACOA', 'INCLUYEN: ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:36:33'),
(7, '', 'POLLO BROASTER', 'INCLUYEN BROASTER: ENSALADA DULCE O PURE DE PAPA + TORTILLAS + SALSA', 95.00, 175.00, 330.00, 'pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:37:24'),
(8, '', 'POLLO BBQ', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:37:43'),
(9, '', 'POLLO ENCACAHUATADO', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:37:53'),
(10, '', 'POLLO CHILTEPÍN', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:01'),
(11, '', 'POLLO TAMARINDO', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:12'),
(12, '', 'POLLO MANGO HABANERO', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:18'),
(13, '', 'POLLO HORMIGA LIMÓN ', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:26'),
(14, '', 'POLLO A LA DIABLA', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:36'),
(15, '', 'POLLO CHIPOTLE', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:44'),
(16, '', 'POLLO ADOBADO', 'INCLUYEN GOURMET:  ARROZ O ESPAGUETI + TORTILLAS O TOTOPOS + SALSA', 95.00, 175.00, 330.00, 'Pollo', 'activo', '../view/pollo.jpg', '2024-02-07 18:38:51'),
(21, '', '1 POLLO TRADICIONAL ASADO', 'ARROZ O ESPAGUETI + FRIJOLES CHARROS O REFRITOS + 1/2 KILO DE TORTILLAS + SALSA + REFRESCO DE 2 LITROS', 290.00, 0.00, 0.00, 'Pollo Combos', 'activo', '../view/pollo.jpg', '2024-02-07 19:57:59'),
(22, '', '1 POLLO TRADICIONAL BARBACOA', 'ARROZ O ESPAGUETI + FRIJOLES CHARROS O REFRITOS + 1/2 KILO DE TORTILLAS + SALSA + REFRESCO DE 2 LITROS', 290.00, 0.00, 0.00, 'Pollo Combos', 'activo', '../view/pollo.jpg', '2024-02-07 20:05:29'),
(23, '', '1 POLLO TRADICIONAL ROSTIZADO', 'ARROZ O ESPAGUETI + FRIJOLES CHARROS O REFRITOS + 1/2 KILO DE TORTILLAS + SALSA + REFRESCO DE 2 LITROS', 290.00, 0.00, 0.00, 'Pollo Combos', 'activo', '../view/pollo.jpg', '2024-02-07 20:06:00'),
(24, '', '1 POLLO BROASTER ', 'ARROZ O ESPAGUETI O PURE DE PAPA O ENSALADA DULCE + FRIJOLES CHARROS O REFRITOS + 1/2 KILO DE TORTILLAS + SALSA + REFRESCO DE 2 LITROS', 305.00, 0.00, 0.00, 'Pollo Combos', 'activo', '../view/pollo.jpg', '2024-02-07 20:07:13'),
(25, '', '1 POLLO GOURMET', 'ARROZ O ESPAGUETI O PURE DE PAPA O ENSALADA DULCE+ FRIJOLES CHARROS O REFRITOS + 1/2 KILO DE TORTILLAS + SALSA + REFRESCO DE 2 LITROS', 305.00, 0.00, 0.00, 'Pollo Combos', 'activo', '../view/pollo.jpg', '2024-02-07 20:08:01'),
(26, '', '1 ORDEN ALITAS', '(6 PIEZAS)', 75.00, 0.00, 0.00, 'Alitas', 'activo', '../view/alitas.jpg', '2024-02-07 20:17:43'),
(27, '', 'PAQUETE 1 ', '(12 PIEZAS)', 120.00, 0.00, 0.00, 'Alitas', 'activo', '../view/alitas.jpg', '2024-02-07 20:18:05'),
(28, '', 'PAQUETE 2', '(24 PIEZAS)', 230.00, 0.00, 0.00, 'Alitas', 'activo', '../view/alitas.jpg', '2024-02-07 20:18:37'),
(29, '', 'PAQUETE PREMIUM', '(36 PIEZAS)', 325.00, 0.00, 0.00, 'Alitas', 'activo', '../view/alitas.jpg', '2024-02-07 20:19:21'),
(30, '', 'TENDERS', '4 PIEZAS ENSALADA DULCE, CAPTSU + PAPAS A LA FRANCESA', 135.00, 0.00, 0.00, 'Tenders', 'activo', '../view/tenders.jpg', '2024-02-07 20:21:09'),
(31, '', 'TENDERS', '10 PIEZAS ENSALADA DULCE, CATSUP + PAPAS A LA FRANCESA', 220.00, 0.00, 0.00, 'Tenders', 'activo', '../view/tenders.jpg', '2024-02-07 20:21:53'),
(32, '', '1 ORDEN (CREPAS)', '4 PIEZAS', 65.00, 0.00, 0.00, 'Crepas', 'activo', '../view/crepas.jpg', '2024-02-07 20:35:26'),
(33, '', 'PAQUETE 1 (CREPAS)', '8 PIEZAS', 120.00, 0.00, 0.00, 'Crepas', 'activo', '../view/crepas.jpg', '2024-02-07 20:36:01'),
(34, '', 'PAQUETE 2 (CREPAS)', '12 PIEZAS', 170.00, 0.00, 0.00, 'Crepas', 'activo', '../view/crepas.jpg', '2024-02-07 20:36:25'),
(35, '', 'PAQUETE PREMIUM (CREPAS)', '16 PIEZAS', 210.00, 0.00, 0.00, 'Crepas', 'activo', '../view/crepas.jpg', '2024-02-07 20:36:49'),
(36, '', '1 HAMBURGUESA SENCILLA', 'INCLUYE PAPAS A LA FRANCESA', 75.00, 0.00, 0.00, 'Hamburgesas', 'activo', '../view/HAMBUERGESA.jpg', '2024-02-07 20:37:44'),
(37, '', '1 HAMBURGUESA DOBLE', 'INCLUYE DOBLE CARNE Y PAPAS A LA FRANCESA', 95.00, 0.00, 0.00, 'Hamburgesas', 'activo', '../view/HAMBUERGESA.jpg', '2024-02-07 20:38:22'),
(38, '', '1 HAMBURGUESA PREMIUM', 'INCLUYE DOBLE CARNE Y PAPAS A LA FRANCESA + UNA LATA DE JUGO', 105.00, 0.00, 0.00, 'Hamburgesas', 'activo', '../view/HAMBUERGESA.jpg', '2024-02-07 20:39:01'),
(39, '', 'PAQUETE 1 (MIXIOTES)', '5 MIXIOTES', 105.00, 0.00, 0.00, 'Mixiotes', 'activo', '../view/MIXIOTES.jpg', '2024-02-07 20:41:36'),
(40, '', 'PAQUETE 2 (MIXIOTES)', '5 MIXIOTES + GUARNICION CHICA', 140.00, 0.00, 0.00, 'Mixiotes', 'activo', '../view/MIXIOTES.jpg', '2024-02-07 20:42:15'),
(41, '', 'PAQUETE 3 (MIXIOTES)', '10 MIXIOTES + GUARNICION GRANDE', 265.00, 0.00, 0.00, 'Mixiotes', 'activo', '../view/MIXIOTES.jpg', '2024-02-07 20:42:54'),
(42, '', 'PAQUETE 4 (MIXIOTES)', '15 MIXIOTES + GUARNICION GRANDE', 375.00, 0.00, 0.00, 'Mixiotes', 'activo', '../view/MIXIOTES.jpg', '2024-02-07 20:43:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `cantidad` decimal(5,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `cantidad`, `descripcion`, `precio`, `categoria`, `fecha_creacion`) VALUES
(1, 0.50, '1/2 Pollo Asado', 95.00, 'Pollo', '2024-02-11 06:09:18'),
(2, 1.00, '1 Pollo Asado', 175.00, 'Pollo', '2024-02-11 06:10:05'),
(3, 2.00, '2 Pollo Asado', 330.00, 'Pollo', '2024-02-11 06:10:10'),
(4, 0.50, '1/2 Pollo Rostizado', 95.00, 'Pollo', '2024-02-11 06:10:16'),
(5, 1.00, '1 Pollo Rostizado', 175.00, 'Pollo', '2024-02-11 06:10:22'),
(6, 2.00, '2 Pollo Rostizado', 330.00, 'Pollo', '2024-02-11 06:10:28'),
(7, 0.50, '1/2 Pollo Barbacoa', 95.00, 'Pollo', '2024-02-11 06:10:37'),
(8, 1.00, '1 Pollo Barbacoa', 175.00, 'Pollo', '2024-02-11 06:10:48'),
(9, 2.00, '2 Pollo Barbacoa', 330.00, 'Pollo', '2024-02-11 06:10:57'),
(10, 0.50, '1/2 Pollo Broaster', 105.00, 'Pollo', '2024-02-11 06:11:05'),
(11, 1.00, '2 Pollo Broaster', 360.00, 'Pollo', '2024-02-11 06:11:14'),
(12, 2.00, '2 Pollo Broaster', 360.00, 'Pollo', '2024-02-11 06:11:24'),
(13, 0.50, '1/2 Pollo BBQ', 105.00, 'Pollo', '2024-02-11 06:11:35'),
(14, 1.00, '1 Pollo BBQ', 190.00, 'Pollo', '2024-02-11 06:11:42'),
(15, 2.00, '2 Pollo BBQ', 360.00, 'Pollo', '2024-02-11 06:11:48'),
(16, 0.50, '1/2 Pollo Encacahuatado', 105.00, 'Pollo', '2024-02-11 06:11:58'),
(17, 1.00, '1 Pollo Encacahuatado', 190.00, 'Pollo', '2024-02-11 06:12:05'),
(18, 2.00, '2 Pollo Encacahuatado', 360.00, 'Pollo', '2024-02-11 06:12:12'),
(19, 0.50, '1/2 Pollo Chilpetin', 105.00, 'Pollo', '2024-02-11 06:12:20'),
(20, 1.00, '1 Pollo Chilpetin', 190.00, 'Pollo', '2024-02-11 06:12:35'),
(21, 2.00, '2 Pollo Chilpetin', 360.00, 'Pollo', '2024-02-11 06:12:47'),
(22, 0.50, '1/2 Pollo Tamarindo', 105.00, 'Pollo', '2024-02-11 06:13:09'),
(23, 1.00, '1 Pollo Tamarindo', 190.00, 'Pollo', '2024-02-11 06:13:19'),
(24, 2.00, '2 Pollo Tamarindo', 360.00, 'Pollo', '2024-02-11 06:13:26'),
(25, 0.50, '1/2 Pollo Mango Habanero', 105.00, 'Pollo', '2024-02-11 06:13:35'),
(26, 1.00, '1 Pollo Mango Habanero', 190.00, 'Pollo', '2024-02-11 06:13:43'),
(27, 2.00, '2 Pollo Mango Habanero', 360.00, 'Pollo', '2024-02-11 06:13:51'),
(28, 0.50, '1/2 Pollo Hormiga Limon', 105.00, 'Pollo', '2024-02-11 06:14:00'),
(29, 1.00, '1 Pollo Hormiga Limon', 190.00, 'Pollo', '2024-02-11 06:14:08'),
(30, 2.00, '2 Pollo Hormiga Limon', 360.00, 'Pollo', '2024-02-11 06:14:16'),
(31, 0.50, '1/2 Pollo A la Diabla', 105.00, 'Pollo', '2024-02-11 06:14:23'),
(32, 1.00, '1 Pollo A la Diabla', 190.00, 'Pollo', '2024-02-11 06:14:33'),
(33, 2.00, '2 Pollo A la Diabla', 360.00, 'Pollo', '2024-02-11 06:14:43'),
(34, 0.50, '1/2 Pollo Chipotle', 105.00, 'Pollo', '2024-02-11 06:14:52'),
(35, 1.00, '1 Pollo Chipotle', 190.00, 'Pollo', '2024-02-11 06:15:02'),
(36, 2.00, '2 Pollo Chipotle', 360.00, 'Pollo', '2024-02-11 06:15:09'),
(37, 0.50, '1/2 Pollo Adobado', 105.00, 'Pollo', '2024-02-11 06:15:19'),
(39, 1.00, '1 Pollo Adobado', 190.00, 'Pollo', '2024-02-11 06:15:57'),
(40, 2.00, '2 Pollo Adobado', 360.00, 'Pollo', '2024-02-11 06:16:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `endpoint` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `p256dh_key` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `telefono`, `correo`, `contrasena`, `rol`) VALUES
(12, 'Yovani', '2491115518', 'yovanigonzar@gmail.com', '$2y$10$UL16hmz6GD9oVK2XP8i.L.2Ana1R7O1CHFQJWSAMEhMqb2DZLU04.', 'job'),
(13, 'Super Administrador Heriberto', '2381667070', 'asadoslafortaleza2381274286@gmail.com', '$2y$10$LSp27oAN63qUYsiqMs57re/Vu7DXM2U9p75OP5arqQgqI7fU.Qjj6', 'super'),
(14, 'lau', '2491115518', 'lau@gmail.com', '$2y$10$T50cvyeKtccTLgKaB086T./ZVIVBE5TugBtTZOOFfDgt5PEncjQf6', 'admin'),
(17, 'Yovani', '2491753453', 'giovanigonza88@gmail.com', '$2y$10$9cUTt/3z3GA4BP95p4MbK.bPHk15jDdFC64LTn2vopcWxm8H9xYA6', 'admin'),
(18, 't', '2381667070', 'y@gmail.com', '$2y$10$bbEK010tgRoknQx8uGc2Me6GamzMdxx9m1DR/HHVz.g5bWSpim4bK', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `digital`
--
ALTER TABLE `digital`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `digital`
--
ALTER TABLE `digital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
