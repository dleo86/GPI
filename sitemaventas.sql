-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2020 a las 06:22:29
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitemaventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulos` int(11) NOT NULL,
  `codArt` varchar(45) NOT NULL,
  `nomArt` varchar(45) NOT NULL,
  `stockArt` int(11) NOT NULL,
  `precioArt` float NOT NULL,
  `marcaArt` varchar(150) DEFAULT NULL,
  `Img` varchar(200) DEFAULT NULL,
  `TipoArt_idTipoArt1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulos`, `codArt`, `nomArt`, `stockArt`, `precioArt`, `marcaArt`, `Img`, `TipoArt_idTipoArt1`) VALUES
(4, '60095', 'Monitor 15\'', 12, 150, 'Samsung', '1589989587_monitor15lg.jpg', 3),
(5, '6023', 'Monitor 17\'', 10, 195, 'LG', '1589989513_monitor17lg.jpg', 3),
(6, '75006', 'Mouse Inalambrico', 15, 22, 'Brb', NULL, 2),
(7, '66452', 'Teclado Inalambrico', 15, 225, 'Brb', 'tecladosIn.jpg', 2),
(10, '66052', 'Teclado Gamer', 15, 223, 'Genius', '1589900261_tecladogamer.jpg', 2),
(11, '66044', 'Mouse gamer', 35, 150, 'Genius', '1589900631_mousegamer.jpg', 2),
(12, '664509', 'Mouse Logitecho', 10, 280, 'Logitech', '1589919417_mouseLogitech.jpg', 1),
(14, ' 50069', 'Mouse Razer', 10, 225, 'Razer', '1589922158_mouserazer.jpg', 1),
(15, '50077', 'Mouse Brb', 15, 450, ' Brb', '1590775361_mousebrb.jpg', 1),
(16, '776455', 'Micro Intel i3', 12, 8000, ' Intel', '1590791898_microi3.jpg', 7),
(17, '776460', 'Micro Intel i7', 13, 9000, 'Intel', '1590776513_microi7.jpg', 7),
(18, '776458', 'Micro Intel i5', 10, 8500, 'Intel', '1590776583_microi5.jpg', 7),
(19, '776470', 'AMD Ryzen 3', 8, 9100, ' AMD', '1590776814_amdryzen3.jpg', 7),
(20, '776475', 'AMD Ryzen 5', 5, 10000, 'AMD', '1590776798_amdryzen5.jpg', 7),
(21, '776477', 'AMD Ryzen 7', 6, 12000, 'AMD', '1590776904_amdryzen7.jpg', 7),
(22, '450060', 'router tp-link tl-wr740n wireless ', 4, 4500, ' TP-Link', '1590777256_tplink-tlwr740n.jpg', 6),
(23, '450062', 'router tp-link tl-wr841n wireless doble anten', 3, 5200, 'TP-Link', '1590777438_tplink-tlwr841nd-wireless-doble-antena.jpg', 6),
(25, '50079', 'Mouse Logitech g203', 10, 850, ' Logitech', '1591206907_mouse-gamer-logitech-g203.jpg', 1),
(26, ' 456004', ' linksys N300', 3, 8500, ' Cisco', '1591207737_linksysN300.jpg', 6),
(27, '456010', 'linksys LRT214', 3, 4900, 'Cisco', '1591207964_linksys-lrt214.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idCaja` int(11) NOT NULL,
  `totalCaja` float NOT NULL,
  `subtotalCaja` float DEFAULT NULL,
  `fechaCaja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idCaja`, `totalCaja`, `subtotalCaja`, `fechaCaja`) VALUES
(1, 0, 0, '2020-05-25'),
(2, 75, 50, '2020-05-26'),
(3, 100, 80, '2020-05-27'),
(5, 500, 150, '2020-05-27'),
(6, 500, 250, '2020-05-29'),
(7, 100, 5, '2020-06-02'),
(8, 800, 150, '2020-06-03'),
(9, 560, 300, '2020-06-04'),
(10, 2500, 2500, '2020-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Persona_idPersona`) VALUES
(1, 3),
(2, 8),
(4, 14),
(5, 15),
(6, 17),
(7, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_venta`
--

CREATE TABLE `compra_venta` (
  `Proveedor_idProveedor` int(11) NOT NULL,
  `Articulo_idArticulos` int(11) NOT NULL,
  `Articulo_TipoArt_idTipoArt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra_venta`
--

INSERT INTO `compra_venta` (`Proveedor_idProveedor`, `Articulo_idArticulos`, `Articulo_TipoArt_idTipoArt`) VALUES
(1, 4, 0),
(1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `idDomicilio` int(11) NOT NULL,
  `calleDom` varchar(45) DEFAULT NULL,
  `numDom` int(11) DEFAULT NULL,
  `pisoDom` int(11) DEFAULT NULL,
  `dptoDom` varchar(45) DEFAULT NULL,
  `codPostal` int(11) DEFAULT NULL,
  `Localidad_idLocalidad1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`idDomicilio`, `calleDom`, `numDom`, `pisoDom`, `dptoDom`, `codPostal`, `Localidad_idLocalidad1`) VALUES
(1, 'Terrada', 255, 0, '', 8000, 1),
(2, 'Rosales', 451, NULL, NULL, 8000, 1),
(3, 'Alsina', 1003, 4, 'A', 8000, 1),
(8, 'rosales', 11, 0, '', 8000, 1),
(10, 'Sarmiento', 124, 2, ' B', 5000, 2),
(12, 'Aslina', 10, 5, 'F ', 8500, 4),
(16, 'Terrada', 564, 8, 'C', 8005, 2),
(17, ' Alberdi', 740, 4, 'A', 8100, 2),
(19, ' Rosales', 1224, 0, ' ', 0, 2),
(20, ' Berutti', 104, 0, ' ', 0, 1),
(21, 'Viamonte', 282, 0, '', 0, 1),
(25, 'Sagasti', 844, 0, ' ', 0, 1),
(28, '', 0, 0, '', 0, 1),
(29, '', 0, 0, '', 0, 2),
(30, 'Estomba', 774, 0, '', 8000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `idIva` int(11) NOT NULL,
  `descripIva` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`idIva`, `descripIva`) VALUES
(1, 'Resp Inscripto'),
(2, 'No responsable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idLocalidad` int(11) NOT NULL,
  `nombreLoc` varchar(45) DEFAULT NULL,
  `Provincia_idProvincia1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `nombreLoc`, `Provincia_idProvincia1`) VALUES
(1, 'Bahia Blanca', 1),
(2, 'Buenos Aires', 1),
(3, 'Rosario', 5),
(4, 'Cordoba', 2),
(5, 'Santa Rosa', 3),
(6, 'La Plata', 1),
(7, 'Monte Hermoso', 1),
(9, 'Santa Fe', 5),
(10, 'Parana', 4),
(11, 'Mar del Plata', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nomPersona` varchar(45) NOT NULL,
  `ApelPersona` varchar(45) NOT NULL,
  `nacPersona` date DEFAULT NULL,
  `telPersona` varchar(45) DEFAULT NULL,
  `emailPersona` varchar(45) DEFAULT NULL,
  `dniPersona` varchar(45) NOT NULL,
  `imgPersona` varchar(45) DEFAULT NULL,
  `Domicilio_idDomicilio1` int(11) NOT NULL,
  `Iva_idIva1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nomPersona`, `ApelPersona`, `nacPersona`, `telPersona`, `emailPersona`, `dniPersona`, `imgPersona`, `Domicilio_idDomicilio1`, `Iva_idIva1`) VALUES
(1, 'Ricardo Javier', 'Narvaja', '2014-04-14', '2914389824', 'narvaja@gmail.com', '21506669', NULL, 1, 1),
(2, 'Diego ', 'Barrientos', '1978-05-06', '2914871012', '', '33545900', NULL, 2, 2),
(3, 'Mariana', 'Arias', '1986-05-06', '2914559824', 'marias@gmail.com', '32105666', NULL, 3, 1),
(6, 'Juan Roberto', 'Perez', '2020-05-05', '2914555336', 'pepe@gmail.com', '29129086', NULL, 8, 1),
(8, ' Ricardo', 'Ferretti', '1976-06-18', ' 0114562584', 'ferre@gmail.com', '26109802', NULL, 10, 1),
(10, ' Leandro Javier', 'Xavier', '1991-06-05', ' 3514515926', 'xavi@gmail.com', '28233812', NULL, 12, 1),
(14, 'Tomas', 'Molina', '1988-04-28', ' 4515978', 'molina@gmail.com', '34006908', NULL, 16, 2),
(15, ' Alberto', 'Flores', '1978-06-07', ' 0114389654', 'flores@gmail.com', '28150633', NULL, 17, 1),
(17, ' Marina', 'Copa', '1997-04-08', '0114229654', 'copa@gmail.com', ' 32211133', NULL, 19, 1),
(18, ' Edgar', 'Mazza', '1970-05-11', ' ', 'mazza@gmail.com', '25124998', NULL, 20, 1),
(19, ' Martiniano', 'Molina', '1974-05-05', '2914546300', 'molina74@gmail.com', '28200666', NULL, 21, 1),
(23, 'Juan Carlos', 'Cove', '1986-05-05', ' ', 'cove@gmail.com', '', NULL, 25, 1),
(24, 'Pablo', 'Cifuenn', '0000-00-00', '', '', '34116908', NULL, 28, 1),
(25, 'Rosario', 'Bonacorsi', '0000-00-00', '', '', '38105998', NULL, 29, 1),
(26, 'Lautaro', 'Acosta', '1991-11-12', '2914559312', 'acosta@gmail.com', '32999001', NULL, 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `cuitProv` varchar(45) NOT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `cuitProv`, `RazonSocial`, `Persona_idPersona`) VALUES
(1, '66-35545911-5', 'Resp Inscrip', 2),
(2, '66-80504168-5', 'Resp Inscrip', 6),
(3, '22-2820066-31', 'Resp Inscrip', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` int(11) NOT NULL,
  `nomProv` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nomProv`) VALUES
(1, 'Buenos Aires'),
(2, 'Cordoba'),
(3, 'La Pampa'),
(4, 'Entre Rios'),
(5, 'Santa Fe'),
(6, 'San Luis'),
(7, 'Mendoza'),
(8, 'La Rioja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoart`
--

CREATE TABLE `tipoart` (
  `idTipoArt` int(11) NOT NULL,
  `descripArt` varchar(200) DEFAULT NULL,
  `tipoArt` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoart`
--

INSERT INTO `tipoart` (`idTipoArt`, `descripArt`, `tipoArt`) VALUES
(1, 'Mouse Genius', 'Perifericos'),
(2, 'Para escuchar', 'Parlantes'),
(3, 'Todos los monitores', 'Monitores'),
(6, 'Articulos de redes', ' Conectividad'),
(7, ' Micros para PC', ' Microprocesadores'),
(8, 'Para todo tipo de Mother', ' Gabinetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userPriv` varchar(45) NOT NULL,
  `userIngreso` date DEFAULT NULL,
  `Persona_idPersona1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `userName`, `userPass`, `userPriv`, `userIngreso`, `Persona_idPersona1`) VALUES
(1, 'admin', '$2y$10$6k05oeqVPjA5fnPuGyoSHuwnPNcUQZuiMLu5GfKZYSObu9wEJPS3e', 'Admin', '2020-05-01', 1),
(2, 'xavi', '$2y$10$hsJFgFoWlUAwGUjpjyHPo.DPjA8NF8C52febIDg2VA1n.s8ryVDES', 'Usuario', '2020-05-24', 10),
(7, 'carloscove', '$2y$10$fTNYLuxHkJNH5xFB9Pzcyuja23F3nFtLa3AELhNx25Aas/4Vov7Pe', 'Usuario', '2020-06-04', 23),
(8, 'cifu', '$2y$10$DarZCWRSmSK6dgcS0vGKdemXZRtrcvE28IhU4qegRGQABVg/MOhiW', 'Usuario', '2020-06-05', 24),
(9, 'bonacor', '$2y$10$patPP1IqQ5HDiSyavKqKgeiDe7Ktz6QbdPoBvUkE2VKw4zkpoT.wO', 'Usuario', '2020-06-05', 25),
(10, 'lauacosta', '$2y$10$eNe3jaIEzUShKpt9Xwugj.U/ICCNz.NZNBHD23o/njLxfWhgSLBVa', 'Usuario', '2020-06-05', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fechaVenta` datetime NOT NULL,
  `tipoVenta` varchar(45) NOT NULL,
  `descVenta` varchar(150) DEFAULT NULL,
  `producVenta` varchar(255) NOT NULL,
  `medioPago` varchar(100) NOT NULL,
  `totalVenta` float NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Caja_idCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fechaVenta`, `tipoVenta`, `descVenta`, `producVenta`, `medioPago`, `totalVenta`, `Usuario_idUsuario`, `Caja_idCaja`) VALUES
(1, '2020-05-14 14:00:00', 'Contado', '', 'Mouse Brb', 'Efectivo', 150, 1, 1),
(4, '2020-05-25 16:43:04', 'Contado', ' ', 'Teclado LG', 'Efectivo', 250, 1, 1),
(5, '2020-05-29 11:15:13', 'Cuotas', ' ', ' Mouse Brb', ' Tarjeta', 500, 2, 5),
(6, '2020-05-29 11:16:09', 'Contado', ' 10%', 'Monitor LG', 'Efectivo', 8500, 2, 6),
(7, '2020-05-29 11:16:51', 'Contado', ' ', ' Micro Intel I3', 'Efectivo', 5000, 1, 6),
(8, '2020-05-29 11:17:11', 'Contado', ' ', 'Micro Intel I7', 'Efectivo', 9500, 1, 6),
(9, '2020-05-29 11:26:21', 'Contado', '10%', 'Teclado LG', 'Efectivo', 500, 2, 6),
(10, '2020-05-29 19:31:33', 'Contado', ' ', 'AMD Ryzen 3', 'Efectivo', 9500, 1, 6),
(11, '2020-05-29 19:32:24', 'Contado', ' ', 'Micro Intel i5', 'Efectivo', 8200, 1, 6),
(12, '2020-06-02 10:07:26', 'Contado', '10%', 'Mouse Razer', 'Efectivo', 650, 2, 7),
(13, '2020-06-02 10:07:53', 'Cuotas', ' ', 'Micro Intel i5', 'Tarjeta', 8000, 1, 7),
(14, '2020-06-02 10:08:48', 'Contado', '10%', 'router tp-link tl-wr940n', 'Efectivo', 5500, 2, 7),
(15, '2020-06-02 11:49:29', 'Contado', ' ', 'Micro Intel i5', 'Efectivo', 9500, 1, 7),
(16, '2020-06-02 11:49:50', 'Cuotas', '10%', 'AMD Ryzen 7', 'Tarjeta', 10000, 1, 7),
(17, '2020-06-02 11:50:29', 'Contado', ' ', 'Teclado Gamer', 'Efectivo', 1500, 2, 7),
(18, '2020-06-02 11:50:48', 'Contado', ' ', 'Mouse Logitecho', 'Efectivo', 2000, 2, 7),
(19, '2020-06-02 11:51:28', 'Contado', ' ', 'Mouse Brb', 'Efectivo', 1500, 1, 7),
(20, '2020-06-02 11:52:00', 'Contado', '10%', 'Mouse Razer', 'Efectivo', 1500, 1, 7),
(21, '2020-06-02 11:52:23', 'Contado', ' ', 'Mouse Brb', 'Efectivo', 1200, 1, 7),
(22, '2020-06-04 17:55:55', 'Contado', ' ', 'Teclado Inalambrico', 'Efectivo', 3400, 2, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulos`),
  ADD KEY `fk_Articulo_TipoArt1_idx` (`TipoArt_idTipoArt1`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_Cliente_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `compra_venta`
--
ALTER TABLE `compra_venta`
  ADD KEY `fk_Compra_Venta_Proveedor1_idx` (`Proveedor_idProveedor`),
  ADD KEY `fk_Compra_Venta_Articulo1_idx` (`Articulo_idArticulos`,`Articulo_TipoArt_idTipoArt`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`idDomicilio`),
  ADD KEY `fk_Domicilio_Localidad1_idx` (`Localidad_idLocalidad1`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`idIva`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`),
  ADD KEY `fk_Localidad_Provincia1_idx` (`Provincia_idProvincia1`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Persona_Domicilio1_idx` (`Domicilio_idDomicilio1`),
  ADD KEY `fk_Persona_Iva1_idx` (`Iva_idIva1`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `fk_Proveedor_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `tipoart`
--
ALTER TABLE `tipoart`
  ADD PRIMARY KEY (`idTipoArt`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Persona1_idx` (`Persona_idPersona1`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `fk_Venta_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Venta_Caja1_idx` (`Caja_idCaja`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `idDomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `idIva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipoart`
--
ALTER TABLE `tipoart`
  MODIFY `idTipoArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_Articulo_TipoArt1` FOREIGN KEY (`TipoArt_idTipoArt1`) REFERENCES `tipoart` (`idTipoArt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_venta`
--
ALTER TABLE `compra_venta`
  ADD CONSTRAINT `fk_Compra_Venta_Articulo1` FOREIGN KEY (`Articulo_idArticulos`) REFERENCES `articulo` (`idArticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compra_Venta_Proveedor1` FOREIGN KEY (`Proveedor_idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_Domicilio_Localidad1` FOREIGN KEY (`Localidad_idLocalidad1`) REFERENCES `localidad` (`idLocalidad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `fk_Localidad_Provincia1` FOREIGN KEY (`Provincia_idProvincia1`) REFERENCES `provincia` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Domicilio1` FOREIGN KEY (`Domicilio_idDomicilio1`) REFERENCES `domicilio` (`idDomicilio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_Iva1` FOREIGN KEY (`Iva_idIva1`) REFERENCES `iva` (`idIva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_Proveedor_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Persona1` FOREIGN KEY (`Persona_idPersona1`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Caja1` FOREIGN KEY (`Caja_idCaja`) REFERENCES `caja` (`idCaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
