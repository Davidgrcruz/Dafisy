-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2023 a las 11:07:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuario`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `FiltrarVentas` (IN `p_codigo_compra` INT)   BEGIN
    SELECT ventas.codigo_compra, ventas.valor_compra, ventas.fecha_compra, clientes.*
    FROM ventas
    INNER JOIN clientes ON ventas.ID_cliente = clientes.ID_cliente
    WHERE ventas.codigo_compra = p_codigo_compra;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(20) NOT NULL,
  `nombre_cliente` char(50) NOT NULL,
  `telefono_cliente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_cliente`, `nombre_cliente`, `telefono_cliente`) VALUES
(1, 'santiago', 32565632),
(2, 'gabriel', 21312),
(9, 'santiago', 32565632);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Nombre_producto` char(30) NOT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `C_tecnicas` char(30) NOT NULL,
  `ID_producto` int(11) NOT NULL,
  `marca` char(30) NOT NULL,
  `categoria` char(30) NOT NULL,
  `Precio` int(11) NOT NULL,
  `estado_P` char(20) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Nombre_producto`, `Imagen`, `C_tecnicas`, `ID_producto`, `marca`, `categoria`, `Precio`, `estado_P`, `stock`) VALUES
('esfero', 'santi.jpg', '', 0, '', '', 0, 'Existente', 0),
('resma de papel', '315742920_178492398114710_2150720627635362489_n.jpg', '', 1, 'Reprograf', 'papeleria', 12000, 'Existente', 17),
('cuaderno', NULL, '', 2, 'Q`nota', 'papeleria', 7000, 'Existente', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh`
--

CREATE TABLE `sh` (
  `Nombre` char(30) NOT NULL,
  `Apellido` char(30) NOT NULL,
  `ID` int(12) NOT NULL,
  `Email` char(30) NOT NULL,
  `Dir` char(30) NOT NULL,
  `Pass` char(12) NOT NULL,
  `Tel` int(12) NOT NULL,
  `Fec` date NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sh`
--

INSERT INTO `sh` (`Nombre`, `Apellido`, `ID`, `Email`, `Dir`, `Pass`, `Tel`, `Fec`, `rol`, `estado`) VALUES
('', '', 0, '', '', '', 0, '0000-00-00', 'administrador', 'inactivo'),
('', '', 1, '', 'kljlkj', '', 0, '0000-00-00', 'administrador', 'activo'),
('Felipe', 'quinto', 5, 'felipe123', 'avenida siempreviva', 'alv', 413123, '2001-06-05', '', NULL),
('Laura', '', 116, '', '', '', 0, '2003-03-03', 'administrador', 'activo'),
('David', '', 117, '', 'av siempreviva', 'Dos', 0, '0000-00-00', 'administrador', 'activo'),
('', '', 21200120, '', 'lala@gmail.com', '', 0, '0000-00-00', 'administrador', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `codigo_compra` int(20) NOT NULL,
  `valor_compra` int(20) NOT NULL,
  `fecha_compra` date NOT NULL,
  `ID_cliente` int(20) NOT NULL,
  `ID_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`codigo_compra`, `valor_compra`, `fecha_compra`, `ID_cliente`, `ID_producto`) VALUES
(0, 24000, '0000-00-00', 1, 0),
(5, 50000, '2023-06-27', 2, 1),
(6, 36000, '0000-00-00', 1, 0),
(7, 24000, '0000-00-00', 1, 0),
(8, 48000, '0000-00-00', 1, 0),
(9, 48000, '0000-00-00', 1, 0),
(10, 36000, '0000-00-00', 1, 0),
(11, 36000, '0000-00-00', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`);

--
-- Indices de la tabla `sh`
--
ALTER TABLE `sh`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`codigo_compra`),
  ADD KEY `ID_cliente` (`ID_cliente`),
  ADD KEY `ID_producto` (`ID_producto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`ID_producto`) REFERENCES `producto` (`ID_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
