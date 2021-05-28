-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2021 a las 04:22:04
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inscripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adulto`
--

CREATE TABLE `adulto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `sisben` varchar(50) DEFAULT NULL,
  `nombre_contacto` varchar(255) NOT NULL,
  `telefono_contacto` varchar(50) DEFAULT NULL,
  `celular_contacto` varchar(50) NOT NULL,
  `direccion_contacto` varchar(255) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `recibo` varchar(50) NOT NULL,
  `certificado_postulacion` varchar(50) NOT NULL,
  `certificado_sisben` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adulto`
--

INSERT INTO `adulto` (`id`, `nombre`, `documento`, `fecha_expedicion`, `fecha_nacimiento`, `sexo`, `direccion`, `telefono`, `sisben`, `nombre_contacto`, `telefono_contacto`, `celular_contacto`, `direccion_contacto`, `cedula`, `recibo`, `certificado_postulacion`, `certificado_sisben`, `fecha_creacion`) VALUES
(1, 'Marina', '100', '2021-03-08', '2021-03-09', 'Femenino', 'Blas de Lezo', '300', '32', 'Abelardo', '32432', '3423', 'Calle 70', '100.pdf', '100.png', '100.jpg', '100.png', '2021-03-09 02:04:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `estado_upload` int(11) NOT NULL DEFAULT 1,
  `observacion` text DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `documento`, `imagen`, `img`, `estado`, `estado_upload`, `observacion`, `users_id`, `fecha_creacion`) VALUES
(1, '100', 'cedula', '100.pdf', 'pendiente', 2, 'nuevo200333', 3, '2021-03-09 02:05:14'),
(2, '100', 'recibo', '100.png', 'pendiente', 1, 'nuevojjj', 3, '2021-03-09 02:06:23'),
(3, '100', 'certificado_postulacion', '100.jpg', 'pendiente', 2, 'grtui', 3, '2021-03-09 02:17:02'),
(4, '100', 'certificado_sisben', '100.png', 'Correcto', 1, 'ferty', 3, '2021-03-09 02:39:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `accessToken` varchar(250) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `perfil`, `authKey`, `accessToken`, `activate`) VALUES
(1, 'mai', 'mai@gmail.com', 'fsbqobwqC.aMo', 'admin', '709409aef90a926a5df642c31e4ccefe26e37f85af5ad3acb1baceb479331d6f623381346422a6b03c180a814c1c432c6c94e3a45c3044aab007feb079be986ec78e14ebb9810832431fe11dc305675a6c43f8ea5e87a5b93d4257ef428015111be0d3fe', '32f79b3c278f3db2cb36634b36c7c8d639bd56fc2b43edf339141422cdb3e9452d02164aa5aed00d9a2d436845cd7a4b0f107572740e198039142920884796726c8cf21aa4227d09ad3d1790abeb0130b9a5ca26f0814056bce80c102863cc362e2f49e9', 1),
(2, 'sak', 'sak@gmail.com', 'fsbqobwqC.aMo', 'funcionario', '25bdd4bdbfb9a49dc90bb5901ea7810ea76495b3da45f6d77731cb551676f9eba7d15c52bd80cfbccc24d554ccbc7edcd9fa8ac0aabcd863b5fd8d4e10caaad713686a51865f0965c5ad5d676f6cebfd4c653c996f23b52cd053f1e2d918546de08e0bc6', '693c86bc5a74101a699e91bf49ab668b6a3d330fb3aabba58075afd66292894f9550879715dec9e7ddfa456c01f1f85969683089122f8fce1c401a0b92411979727fc7c27826470048ecdf2fcc60e11225aaad7de7cc43192042feaa7b8d3c1bccf4b69c', 1),
(3, 'admin', 'admin@admin.com', 'fsmNAnxm5cBw.', 'admin', '44863c265a7b62e49cc6568547133ef57aeaba5af8997ae18675c81452a117ec5e5f611c10e2a651f48edc768cb7db5f5097aee2e732a43b663424c9901bf339cd40adf952209e201425e213b289c0c9687dd7d681e681944dde15f28a2d2c4bf40f3abd', '523699c47a98c6f8b14ce532b2deacff00b02ef334cecf03b2fd03abc6a064a5703c2450cbd29298e55bda18f00505b4c32f8201e648f69ddbb90c52ef15e7c6c2b7ea9398f50da1c82bba7aa99d725f68f80e12fe841391fa8f16140e48d3dbf2821447', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adulto`
--
ALTER TABLE `adulto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adulto`
--
ALTER TABLE `adulto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
