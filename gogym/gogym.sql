-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2026 a las 03:55:06
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
-- Base de datos: `gogym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL COMMENT 'Table AI ID',
  `firstname` varchar(50) NOT NULL COMMENT 'Sender''s firstname',
  `lastname` varchar(50) NOT NULL COMMENT 'Sender''s lastname',
  `email` varchar(254) NOT NULL COMMENT 'Sender''s email',
  `cellphone_number` varchar(15) NOT NULL COMMENT 'Sender''s cellphone number',
  `message` text NOT NULL COMMENT 'Sender''s message',
  `creation_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Form entry creation date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `firstname`, `lastname`, `email`, `cellphone_number`, `message`, `creation_date`) VALUES
(1, 'asdasdasd', 'asdasdasd', 'goran.westberg@thalamuscorp.com', '111111111111', 'asdasd', '2026-01-08 20:14:29'),
(2, 'Goran', 'Westberg', 'goran.westberg@thalamuscorp.com', '113234273611', '', '2026-01-08 20:18:21'),
(3, 'Goran', 'Westberg', 'goran.westberg@thalamuscorp.com', '113234273622', '', '2026-01-08 20:34:46'),
(5, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasd', '2026-01-10 16:46:48'),
(6, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasd', '2026-01-10 16:50:10'),
(7, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasdasd', '2026-01-10 16:50:32'),
(8, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasdasd', '2026-01-10 16:53:14'),
(9, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'ASDASDASD', '2026-01-10 17:12:10'),
(10, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasdasd', '2026-01-10 17:13:40'),
(11, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasdasd', '2026-01-10 17:17:21'),
(12, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasd', '2026-01-10 17:18:01'),
(13, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdasdasd', '2026-01-10 17:23:58'),
(14, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdsad', '2026-01-10 17:24:54'),
(15, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'dassadasd', '2026-01-10 17:26:05'),
(16, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '113234273611', 'asdfsdafdsaf', '2026-01-10 17:58:40'),
(17, 'Goran', 'Westberg', 'gorandirkwestberg@gmail.com', '1132342736', 'asdasd', '2026-01-10 20:51:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL COMMENT 'UID',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `document_number` varchar(8) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(500) NOT NULL,
  `membership` varchar(20) NOT NULL,
  `membership_expiration` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cellphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `document_number`, `email`, `password`, `membership`, `membership_expiration`, `active`, `creation_date`, `cellphone`) VALUES
(5, 'Goran', 'Westberg', '44640898', 'gorandirkwestberg@gmail.com', '$2y$10$Lml/auhnoSoICSxAiUdikeW907Y0T0HKGOYdZxyYrv9oFY0ZuuuRO', 'Bronce', '2026-02-11 23:13:32', 1, '2026-01-11 21:45:18', '1132342736');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_hash` char(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `used` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `token_hash`, `expires_at`, `used`) VALUES
(1, 5, 'd3295dc23446fc6665ff4458c0e71cd3286f71710318ddd751dfbfaf931a7619', '2026-01-12 04:29:30', 0),
(2, 5, '7bb6f0bd8f6006e341438a8850dd20bcbc9c1a3669782617ca5598b6cff4259a', '2026-01-12 04:30:28', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table AI ID', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'UID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
