-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2025 a las 16:23:45
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
-- Base de datos: `quirofano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_ID` int(11) NOT NULL,
  `diagnosis_TypeName` text NOT NULL,
  `diagnosis_creationDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `doctor_ID` int(11) NOT NULL,
  `doctor_firstName` text NOT NULL,
  `doctor_lastName` text NOT NULL,
  `doctor_creationDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `patient_ID` int(11) NOT NULL,
  `patient_fullName` text NOT NULL,
  `patient_yearsOld` int(11) NOT NULL,
  `patient_sugeryDate` text NOT NULL,
  `patient_surgeryTime` time NOT NULL,
  `patient_surgeryRoom` int(11) NOT NULL,
  `patient_doctor_ID` int(11) NOT NULL,
  `patient_diagnosis_ID` int(11) NOT NULL,
  `patient_surgeryState_ID` int(11) NOT NULL,
  `patient_isDischarged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient_states`
--

CREATE TABLE `patient_states` (
  `patientsState_ID` int(11) NOT NULL,
  `patientsState_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patient_states`
--

INSERT INTO `patient_states` (`patientsState_ID`, `patientsState_Name`) VALUES
(1, 'En Espera'),
(2, 'En Cirugía'),
(3, 'En Recuperación'),
(4, 'Dado de Alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_ID` int(11) NOT NULL,
  `role_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_ID`, `role_Name`) VALUES
(1, 'Usuario Administrador'),
(2, 'Usuario Quirofano'),
(3, 'Usuario Vista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_firstName` text NOT NULL,
  `user_lastName` text NOT NULL,
  `user_userName` varchar(50) NOT NULL,
  `user_userPassword` varchar(50) NOT NULL,
  `user_role_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_ID`, `user_firstName`, `user_lastName`, `user_userName`, `user_userPassword`, `user_role_ID`) VALUES
(1, 'USUARIO', 'ADMINISTRADOR', 'Administrador', 'HospitalAdmin99', 1),
(2, 'QUIROFANO', 'SSMR', 'quirofano', 'ssquirofano', 2),
(3, 'VISTA', 'SSMR', 'usuario', 'ssusuario', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_ID`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_ID`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_ID`),
  ADD KEY `patient_doctor_ID` (`patient_doctor_ID`,`patient_diagnosis_ID`,`patient_surgeryState_ID`),
  ADD KEY `patient_diagnosis_ID` (`patient_diagnosis_ID`),
  ADD KEY `patient_surgeryState_ID` (`patient_surgeryState_ID`);

--
-- Indices de la tabla `patient_states`
--
ALTER TABLE `patient_states`
  ADD PRIMARY KEY (`patientsState_ID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_role_ID` (`user_role_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patient_states`
--
ALTER TABLE `patient_states`
  MODIFY `patientsState_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`patient_diagnosis_ID`) REFERENCES `diagnosis` (`diagnosis_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`patient_surgeryState_ID`) REFERENCES `patient_states` (`patientsState_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`patient_doctor_ID`) REFERENCES `doctors` (`doctor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_ID`) REFERENCES `roles` (`role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
