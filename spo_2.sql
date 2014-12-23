-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-07-2014 a las 13:24:13
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `spo_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm001_dominios`
--

CREATE TABLE IF NOT EXISTS `tm001_dominios` (
  `tm001_dominio_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm001_numero_dominio` int(11) NOT NULL,
  `tm001_nombre_dominio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tm001_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tm001_descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`tm001_dominio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Primera jerarquia de la Norma ISO-27002' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tm001_dominios`
--

INSERT INTO `tm001_dominios` (`tm001_dominio_id`, `tm001_numero_dominio`, `tm001_nombre_dominio`, `tm001_created`, `tm001_descripcion`) VALUES
(1, 5, 'Política de Seguridad', '2014-06-23 13:58:10', NULL),
(2, 6, 'Aspectos Organizativos de la Seguridad de la Información', '2014-06-23 13:58:10', NULL),
(3, 7, 'Gestión de Activos', '2014-06-23 14:03:34', NULL),
(4, 8, 'Seguridad Ligada a los Recursos Humanos', '2014-06-23 14:03:34', NULL),
(5, 9, 'Seguridad Fisica y del Entorno', '2014-06-23 14:07:45', NULL),
(6, 10, 'Gestión de Comunicaciones y Operaciones', '2014-06-23 14:07:45', NULL),
(7, 11, 'Control de Acceso', '2014-06-23 14:13:02', NULL),
(8, 12, 'Adquisición, Desarrollo y Mantenimiento de Sistemas de Información', '2014-06-23 14:13:02', NULL),
(9, 13, 'Gestión de Incidentes en la Seguridad de la Información', '2014-06-23 14:14:45', NULL),
(10, 14, 'Gestión de la Continuidad del Negocio', '2014-06-23 14:14:45', NULL),
(11, 15, 'Cumplimiento', '2014-06-23 14:15:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm002_objetivos`
--

CREATE TABLE IF NOT EXISTS `tm002_objetivos` (
  `tm002_objetivo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm002_nombre_objetivo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tm002_descripcion_objetivo` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `tm002_numero_objetivo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tm002_fk_tm001_dominio_id` int(11) NOT NULL,
  `tm002_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tm002_objetivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Segunda jerarquia de la Norma ISO-27002 - Generara Métrica' AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `tm002_objetivos`
--

INSERT INTO `tm002_objetivos` (`tm002_objetivo_id`, `tm002_nombre_objetivo`, `tm002_descripcion_objetivo`, `tm002_numero_objetivo`, `tm002_fk_tm001_dominio_id`, `tm002_created`) VALUES
(1, 'Política de Seguridad de la Información', 'Proporcionar dirección gerencial y apoyo a la seguridad de la información en concordancia con los requerimientos comerciales y leyes y regulaciones relevantes.', '5.1', 1, '2014-06-23 14:25:21'),
(2, 'Organización Interna', 'Manejar la seguridad de la información dentro de la organización.', '6.1', 2, '2014-06-23 14:30:12'),
(3, 'Terceros', 'Mantener la seguridad de la información de la organización y los medios de procesamiento de la información a los cuales entidades externas tienen acceso y procesan; o son comunicados a o manejados por entidades externas.', '6.2', 2, '2014-06-23 14:30:12'),
(4, 'Responsabilidad sobre los Activos', 'Lograr y mantener la protección adecuada de los activos organizacionales.', '7.1', 3, '2014-06-23 14:33:22'),
(5, 'Clasificación de la Información', 'Asegurar que la información reciba un nivel de protección adecuado.', '7.2', 3, '2014-06-23 14:33:22'),
(6, 'Antes del Empleo', 'Asegurar que los empleados, contratistas y terceros entiendan sus responsabilidades, y sean adecuados para los roles para los cuales se les considera; y reducir el riesgo de robo, fraude o mal uso de los medios.', '8.1', 4, '2014-06-23 14:43:35'),
(7, 'Durante el Empleo', 'Asegurar que todos los empleados, contratistas y terceros estén al tanto de las amenazas e inquietudes sobre la seguridad de información, sus responsabilidades y obligaciones, y que estén equipados para apoyar la política en el curso de su trabajo normal, y reducir los riesgos de error humano.', '8.2', 4, '2014-06-23 14:43:35'),
(8, 'Cese del Empleo o Cambio de puesto de trabajo.', 'Asegurar que los empleados, contratistas y terceros salgan de una organización o cambien de empleo de una manera ordenada.', '8.3', 4, '2014-06-23 14:59:41'),
(9, 'Areas Seguras', 'Evitar el acceso fisico no autorizado, daño e interferencia al local y la información de la organización.', '9.1', 5, '2014-06-23 14:59:41'),
(10, 'Seguridad de los Equipos', 'Evitar la pérdida, daño, robo o compromiso de los activos y la interrupción de las actividades de la organización.', '9.2', 5, '2014-06-23 15:18:36'),
(11, 'Responsabilidades y Procedimientos de Operación', 'Asegurar la operación correcta y segura de los medios de procesamiento de la información.', '10.1', 6, '2014-06-23 15:23:31'),
(12, 'Gestión de la Provisión de Servicios por Terceros', 'Implementar y mantener el nivel apropiado de seguridad de la información y entrega del servicio en linea con los contratos de entrega del servicio de terceros.', '10.2', 6, '2014-06-23 15:23:31'),
(13, 'Planificación y Aceptación del Sistema', 'Minimizar el riesgo de fallas en los sistemas.', '10.3', 6, '2014-06-23 15:27:41'),
(14, 'Protección contra el Código Malicioso y Descargable', 'Proteger la intergridad del software y la información.', '10.4', 6, '2014-06-23 15:27:41'),
(15, 'Copias de Seguridad', 'Mantener la integridad y disponibilidad de los servicios de procesamiento de la información y comunicaciones', '10.5', 6, '2014-06-23 15:31:05'),
(16, 'Gestión de la Seguridad de las Redes', 'Asegurar la protección de la información en redes y la protección de la infraestructura de soporte.', '10.6', 6, '2014-06-23 15:31:05'),
(17, 'Manipulación de los Soportes', 'Evitar la divulgación, modificación, eliminación o destrucción no autorizada de los activos; y  la interrupción de las actividades comerciales.', '10.7', 6, '2014-06-23 15:36:16'),
(18, 'Intercambio de Información', 'Mantener la seguridad de la información y software intercambiados dentro de una organización y con cualquier entidad externa.', '10.8', 6, '2014-06-23 15:36:33'),
(19, 'Servicios de Comercio Electronico', 'Asegurar la seguridad de los servicios de comercio electronico y su uso seguro.', '10.9', 6, '2014-06-23 15:41:47'),
(20, 'Supervisión', 'Detectar acitividades de procesamiento de información no autorizadas.', '10.10', 6, '2014-06-23 15:41:47'),
(21, 'Requisitos del Negocio para el Control de Acceso', 'Controlar acceso a la información.', '11.1', 7, '2014-06-23 15:46:19'),
(22, 'Gestión de Acceso de Usuario', 'Asegurar el acceso del usuario autorizado y evitar el acceso no autorizado a los sistemas de información.', '11.2', 7, '2014-06-23 15:46:19'),
(23, 'Responsabilidades del Usuario', 'Evitar el acceso de usuarios no autorizados, y el compromiso o robo de la información y los medios de procesamiento de la información.', '11.3', 7, '2014-06-23 15:48:56'),
(24, 'Control de Acceso a la Red', 'Evitar el acceso no autorizadoa los servicios de red.', '11.4', 7, '2014-06-23 15:48:56'),
(25, 'Control de Acceso al Sistema Operativo', 'Evitar el acceso no operativo a los sistemas operativos.', '11.5', 7, '2014-06-23 15:53:10'),
(26, 'Control de Acceso a las Aplicaciones y a la Información', 'Evitar el acceso no autorizado a la información mantenida en los sistemas de aplicación.', '11.6', 7, '2014-06-23 15:53:10'),
(27, 'Ordenadores Pórtatiles y Teletrabajo', 'Asegurar la seguridad de la información cuando se utilice medios de computación móvil y teletrabajo.', '11.7', 7, '2014-06-23 15:55:46'),
(28, 'Requisitos de Seguridad de los Sistemas de Información', 'Asegurar que la seguridad sea una parte integral de los sistemas de información.', '12.1', 8, '2014-06-25 09:15:48'),
(29, 'Tratamiento Correcto de las Aplicaciones', 'Evitar errores, pérdida, modificación no autorizada o mal uso de la información de las aplicaciones.', '12.2', 8, '2014-06-25 09:15:48'),
(30, 'Controles Criptográficos ', 'Proteger la confidencialidad, autenticidad o integridad de la información a través de medios criptográficos.', '12.3', 8, '2014-06-25 09:22:13'),
(31, 'Seguridad de los Archivos del Sistema', 'Garantizar la Seguridad de los Archivos del Sistema', '12.4', 8, '2014-06-25 09:27:14'),
(32, 'Seguridad en los Procesos de Desarrollo y Soporte', 'Mantener la seguridad del software e información del sistema de aplicación.', '12.5', 8, '2014-06-25 09:27:14'),
(33, 'Gestión de la Vulnerabilidad Técnica', 'Reducir los riesgos resultantes de la explotación de vulnerabilidades técnicas publicadas', '12.6', 8, '2014-06-25 09:32:11'),
(34, 'Notificación de eventos y puntos débiles de Seguridad de la Información', 'Asegurar que la información de los eventos y debilidades en la seguridad de la información asociados con los sistemas de información sea comunicada de manera que permita tomar una acción correctiva.', '13.1', 9, '2014-06-25 09:32:11'),
(35, 'Gestión de Incidentes y Mejoras de Seguridad de la Inforamción', 'Asegurar que apliquen un enfoque consistente y efectivo a la gestión de la Seguridad de la Información.', '13.2', 9, '2014-06-25 09:51:10'),
(36, 'Aspectos de la Seguridad de la Información en la gestión de la continuidad del Negocio', 'Contrarrestar las interrupciones de las actividades comerciales y proteger los procesos comerciales críticos de los efectos de fallas o desastres importantes o desastres en los sistemas de información y asegurar su  reanudación oportuna.', '14.1', 10, '2014-06-25 09:51:10'),
(37, 'Cumplimiento de los Requisitos Legales', 'Evitar violaciones de cualquier ley, obligación reguladora o contractual y de cualquier requerimiento de seguridad', '15.1', 11, '2014-06-25 10:06:20'),
(38, 'Cumplimiento de las Politicas y Normas de Seguridad y Cumplimiento Técnico', 'Asegurar el cumplimiento de los sistemas con las politicas y estándares de seguridad organizacional', '15.2', 11, '2014-06-25 10:06:20'),
(39, 'Consideraciones sobre las auditorías de los Sistemas de Información', 'Maximizar la efectividad y minimizar la interferencia de el proceso de auditoria de los sistemas de información', '15.3', 11, '2014-06-25 10:12:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm003_controles`
--

CREATE TABLE IF NOT EXISTS `tm003_controles` (
  `tm003_control_id` int(3) NOT NULL AUTO_INCREMENT,
  `tm003_nombre_control` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `tm003_descripcion_control` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tm003_numero_control` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tm003_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tm003_fk_tm002_objetivo_id` int(11) NOT NULL,
  `tm003_obejtivo_general` int(11) DEFAULT NULL,
  PRIMARY KEY (`tm003_control_id`),
  KEY `tm003_fk_tm002_objetivo_id` (`tm003_fk_tm002_objetivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Controles de norma ISO 2700' AUTO_INCREMENT=165 ;

--
-- Volcado de datos para la tabla `tm003_controles`
--

INSERT INTO `tm003_controles` (`tm003_control_id`, `tm003_nombre_control`, `tm003_descripcion_control`, `tm003_numero_control`, `tm003_created`, `tm003_fk_tm002_objetivo_id`, `tm003_obejtivo_general`) VALUES
(1, 'Documento de política de seguridad de la información.', NULL, '5.1.1', '2014-06-25 14:26:14', 1, NULL),
(2, 'Revisión de la política de seguridad de la información.', NULL, '5.1.2', '2014-06-25 14:26:14', 1, NULL),
(3, 'Compromiso de la Dirección con la seguridad de la información.', NULL, '6.1.1', '2014-06-25 14:26:14', 2, NULL),
(4, 'Coordinación de la seguridad de la información.', NULL, '6.1.2', '2014-06-25 14:26:14', 2, NULL),
(5, 'Asignación de responsabilidades relativas a la seguridad de la información.', NULL, '6.1.3', '2014-06-25 14:26:14', 2, NULL),
(6, 'Proceso de autorización de recursos para el tratamiento de la información.', NULL, '6.1.4', '2014-06-25 14:26:14', 2, NULL),
(7, 'Acuerdos de confidencialidad.', NULL, '6.1.5', '2014-06-25 14:26:14', 2, NULL),
(8, 'Contacto con las autoridades.', NULL, '6.1.6', '2014-06-25 14:26:14', 2, NULL),
(9, 'Contacto con grupos de especial interés.', NULL, '6.1.7', '2014-06-25 14:26:14', 2, NULL),
(10, 'Revisión independiente de la seguridad de la información.', NULL, '6.1.8', '2014-06-25 14:26:14', 2, NULL),
(11, 'Identificación de los riesgos derivados del acceso de terceros.', NULL, '6.2.1', '2014-06-25 14:26:14', 3, NULL),
(12, 'Tratamiento de la seguridad en la relación con los clientes.', NULL, '6.2.2', '2014-06-25 14:26:14', 3, NULL),
(13, 'Tratamiento de la seguridad en contratos con terceros.', NULL, '6.2.3', '2014-06-25 14:26:14', 3, NULL),
(14, 'Inventario de activos.', NULL, '7.1.1', '2014-06-25 14:26:14', 4, NULL),
(15, 'Propiedad de los activos.', NULL, '7.1.2', '2014-06-25 14:26:14', 4, NULL),
(16, 'Uso aceptable de los activos.', NULL, '7.1.3', '2014-06-25 14:26:14', 4, NULL),
(17, 'Directrices de clasificación.', NULL, '7.2.1', '2014-06-25 14:26:14', 5, NULL),
(18, 'Etiquetado y manipulado de la información.', NULL, '7.2.2', '2014-06-25 14:26:14', 5, NULL),
(19, 'Funciones y responsabilidades.', NULL, '8.1.1', '2014-06-25 14:26:14', 6, NULL),
(20, 'Investigación de antecedentes.', NULL, '8.1.2', '2014-06-25 14:26:14', 6, NULL),
(21, 'Términos y condiciones de contratación.', NULL, '8.1.3', '2014-06-25 14:26:14', 6, NULL),
(22, 'Responsabilidades de la Dirección.', NULL, '8.2.1', '2014-06-25 14:26:14', 7, NULL),
(23, 'Concienciación, formación y capacitación en seguridad de la información.', NULL, '8.2.2', '2014-06-25 14:26:14', 7, NULL),
(24, 'Proceso disciplinario.', NULL, '8.2.3', '2014-06-25 14:26:14', 7, NULL),
(25, 'Responsabilidad del cese o cambio.', NULL, '8.3.1', '2014-06-25 14:26:14', 8, NULL),
(26, 'Devolución de activos.', NULL, '8.3.2', '2014-06-25 14:26:14', 8, NULL),
(27, 'Retirada de los derechos de acceso.', NULL, '8.3.3', '2014-06-25 14:26:14', 8, NULL),
(28, 'Perímetro de seguridad física.', NULL, '9.1.1', '2014-06-25 14:26:14', 9, NULL),
(29, 'Controles físicos de entrada.', NULL, '9.1.2', '2014-06-25 14:26:14', 9, NULL),
(30, 'Seguridad de oficinas, despachos e instalaciones.', NULL, '9.1.3', '2014-06-25 14:26:14', 9, NULL),
(31, 'Protección contra las amenazas externas y de origen ambiental.', NULL, '9.1.4', '2014-06-25 14:26:14', 9, NULL),
(32, 'Trabajo en áreas seguras.', NULL, '9.1.5', '2014-06-25 14:26:14', 9, NULL),
(33, 'Áreas de acceso público y de carga y descarga.', NULL, '9.1.6', '2014-06-25 14:26:14', 9, NULL),
(34, 'Emplazamiento y protección de equipos.', NULL, '9.2.1', '2014-06-25 14:26:14', 10, NULL),
(35, 'Instalaciones de suministro.', NULL, '9.2.2', '2014-06-25 14:26:14', 10, NULL),
(36, 'Seguridad del cableado.', NULL, '9.2.3', '2014-06-25 14:26:14', 10, NULL),
(37, 'Mantenimiento de los equipos.', NULL, '9.2.4', '2014-06-25 14:26:14', 10, NULL),
(38, 'Seguridad de los equipos fuera de las instalaciones.', NULL, '9.2.5', '2014-06-25 14:26:14', 10, NULL),
(39, 'Reutilización o retirada segura de equipos.', NULL, '9.2.6', '2014-06-25 14:26:14', 10, NULL),
(40, 'Retirada de materiales propiedad de la empresa.', NULL, '9.2.7', '2014-06-25 14:26:14', 10, NULL),
(41, 'Documentación de los procedimientos de operación.', NULL, '10.1.1', '2014-06-25 14:26:14', 11, NULL),
(42, 'Gestión de cambios.', NULL, '10.1.2', '2014-06-25 14:26:14', 11, NULL),
(43, 'Segregación de tareas.', NULL, '10.1.3', '2014-06-25 14:26:14', 11, NULL),
(44, 'Separación de los recursos de desarrollo, prueba y operación.', NULL, '10.1.4', '2014-06-25 14:26:14', 11, NULL),
(45, 'Provisión de servicios.', NULL, '10.2.1', '2014-06-25 14:26:14', 12, NULL),
(46, 'Supervisión y revisión de los servicios prestados por terceros.', NULL, '10.2.2', '2014-06-25 14:26:14', 12, NULL),
(47, 'Gestión del cambio en los servicios prestados por terceros.', NULL, '10.2.3', '2014-06-25 14:26:14', 12, NULL),
(48, 'Gestión de capacidades.', NULL, '10.3.1', '2014-06-25 14:26:14', 13, NULL),
(49, 'Aceptación del sistema.', NULL, '10.3.2', '2014-06-25 14:26:14', 13, NULL),
(50, 'Controles contra el código malicioso.', NULL, '10.4.1', '2014-06-25 14:26:14', 14, NULL),
(51, 'Controles contra el código descargado en el cliente.', NULL, '10.4.2', '2014-06-25 14:26:14', 14, NULL),
(52, 'Copias de seguridad de la información.', NULL, '10.5.1', '2014-06-25 14:26:14', 15, NULL),
(53, 'Controles de red.', NULL, '10.6.1', '2014-06-25 14:26:14', 16, NULL),
(54, 'Seguridad de los servicios de red.', NULL, '10.6.2', '2014-06-25 14:26:14', 16, NULL),
(55, 'Gestión de soportes extraíbles.', NULL, '10.7.1', '2014-06-25 14:26:14', 17, NULL),
(56, 'Retirada de soportes.', NULL, '10.7.2', '2014-06-25 14:26:14', 17, NULL),
(57, 'Procedimientos de manipulación de la información.', NULL, '10.7.3', '2014-06-25 14:26:14', 17, NULL),
(58, 'Seguridad de la documentación del sistema.', NULL, '10.7.4', '2014-06-25 14:26:14', 17, NULL),
(59, 'Políticas y procedimientos de intercambio de información.', NULL, '10.8.1', '2014-06-25 14:26:14', 18, NULL),
(60, 'Acuerdos de intercambio.', NULL, '10.8.2', '2014-06-25 14:26:14', 18, NULL),
(61, 'Soportes físicos en tránsito.', NULL, '10.8.3', '2014-06-25 14:26:14', 18, NULL),
(62, 'Mensajería electrónica.', NULL, '10.8.4', '2014-06-25 14:26:14', 18, NULL),
(63, 'Sistemas de información empresariales.', NULL, '10.8.5', '2014-06-25 14:26:14', 18, NULL),
(64, 'Información públicamente disponible.', NULL, '10.9.3', '2014-06-25 14:26:14', 19, NULL),
(65, 'Registros de auditoria.', NULL, '10.10.1', '2014-06-25 14:26:14', 20, NULL),
(66, 'Supervisión del uso del sistema.', NULL, '10.10.2', '2014-06-25 14:26:14', 20, NULL),
(67, 'Protección de la información de los registros.', NULL, '10.10.3', '2014-06-25 14:26:14', 20, NULL),
(68, 'Registros de administración y operación.', NULL, '10.10.4', '2014-06-25 14:26:14', 20, NULL),
(69, 'Registro de fallos.', NULL, '10.10.5', '2014-06-25 14:26:14', 20, NULL),
(70, 'Sincronización del reloj.', NULL, '10.10.6', '2014-06-25 14:26:14', 20, NULL),
(71, 'Política de control de acceso.', NULL, '11.1.1', '2014-06-25 14:26:14', 21, NULL),
(72, 'Registro de usuario.', NULL, '11.2.1', '2014-06-25 14:26:14', 22, NULL),
(73, 'Gestión de privilegios.', NULL, '11.2.2', '2014-06-25 14:26:14', 22, NULL),
(74, 'Gestión de contraseñas de usuario.', NULL, '11.2.3', '2014-06-25 14:26:14', 22, NULL),
(75, 'Revisión de los derechos de acceso de usuario.', NULL, '11.2.4', '2014-06-25 14:26:14', 22, NULL),
(76, 'Uso de contraseñas.', NULL, '11.3.1', '2014-06-25 14:26:14', 23, NULL),
(77, 'Equipo de usuario desatendido.', NULL, '11.3.2', '2014-06-25 14:26:14', 23, NULL),
(78, 'Política de puesto de trabajo despejado y pantalla limpia.', NULL, '11.3.3', '2014-06-25 14:26:14', 23, NULL),
(79, 'Política de uso de los servicios en red.', NULL, '11.4.1', '2014-06-25 14:26:14', 24, NULL),
(80, 'Autenticación de usuario para conexiones externas.', NULL, '11.4.2', '2014-06-25 14:26:14', 24, NULL),
(81, 'Identificación de los equipos en las redes.', NULL, '11.4.3', '2014-06-25 14:26:14', 24, NULL),
(82, 'Protección de los puertos de diagnóstico y configuración remotos.', NULL, '11.4.4', '2014-06-25 14:26:14', 24, NULL),
(83, 'Segregación de las redes.', NULL, '11.4.5', '2014-06-25 14:26:14', 24, NULL),
(84, 'Control de la conexión a la red.', NULL, '11.4.6', '2014-06-25 14:26:14', 24, NULL),
(85, 'Control de encaminamiento (routing) de red.', NULL, '11.4.7', '2014-06-25 14:26:14', 24, NULL),
(86, 'Procedimientos seguros de inicio de sesión.', NULL, '11.5.1', '2014-06-25 14:26:14', 25, NULL),
(87, 'Identificación y autenticación de usuario.', NULL, '11.5.2', '2014-06-25 14:26:14', 25, NULL),
(88, 'Sistema de gestión de contraseñas.', NULL, '11.5.3', '2014-06-25 14:26:14', 25, NULL),
(89, 'Uso de los recursos del sistema.', NULL, '11.5.4', '2014-06-25 14:26:14', 25, NULL),
(90, 'Desconexión automática de sesión.', NULL, '11.5.5', '2014-06-25 14:26:14', 25, NULL),
(91, 'Limitación del tiempo de conexión.', NULL, '11.5.6', '2014-06-25 14:26:14', 25, NULL),
(92, 'Restricción del acceso a la información.', NULL, '11.6.1', '2014-06-25 14:26:14', 26, NULL),
(93, 'Aislamiento de sistemas sensibles.', NULL, '11.6.2', '2014-06-25 14:26:14', 26, NULL),
(94, 'Ordenadores portátiles y comunicaciones móviles.', NULL, '11.7.1', '2014-06-25 14:26:14', 27, NULL),
(95, 'Análisis y especificación de los requisitos de seguridad.', NULL, '12.1.1', '2014-06-25 14:26:14', 28, NULL),
(96, 'Validación de los datos de entrada.', NULL, '12.2.1', '2014-06-25 14:26:14', 29, NULL),
(97, 'Política de uso de los controles criptográficos.', NULL, '12.3.1', '2014-06-25 14:26:14', 30, NULL),
(98, 'Gestión de claves.', NULL, '12.3.2', '2014-06-25 14:26:14', 30, NULL),
(99, 'Control del software en explotación.', NULL, '12.4.1', '2014-06-25 14:26:14', 31, NULL),
(100, 'Procedimientos de control de cambios.', NULL, '12.5.1', '2014-06-25 14:26:14', 32, NULL),
(101, 'Revisión técnica de las aplicaciones tras efectuar cambios en el sistema operativo.', NULL, '12.5.2', '2014-06-25 14:26:14', 32, NULL),
(102, 'Restricciones a los cambios en los paquetes de software.', NULL, '12.5.3', '2014-06-25 14:26:14', 32, NULL),
(103, 'Fugas de información.', NULL, '12.5.4', '2014-06-25 14:26:14', 32, NULL),
(104, 'Externalización del desarrollo de software.', NULL, '12.5.5', '2014-06-25 14:26:14', 32, NULL),
(105, 'Control de las vulnerabilidades técnicas.', NULL, '12.6.1', '2014-06-25 14:26:14', 33, NULL),
(106, 'Notificación de los eventos de seguridad de la información.', NULL, '13.1.1', '2014-06-25 14:26:14', 34, NULL),
(107, 'Notificación de puntos débiles de seguridad.', NULL, '13.1.2', '2014-06-25 14:26:14', 34, NULL),
(108, 'Responsabilidades y procedimientos.', NULL, '13.2.1', '2014-06-25 14:26:14', 35, NULL),
(109, 'Aprendizaje de los incidentes de seguridad de la información.', NULL, '13.2.2', '2014-06-25 14:26:14', 35, NULL),
(110, 'Recopilación de evidencias.', NULL, '13.2.3', '2014-06-25 14:26:14', 35, NULL),
(111, 'Inclusión de la seguridad de la información en el proceso de gestión de la continuidad del negocio.', NULL, '14.1.1', '2014-06-25 14:26:14', 36, NULL),
(112, 'Continuidad del negocio y evaluación de riesgos.', NULL, '14.1.2', '2014-06-25 14:26:14', 36, NULL),
(113, 'Desarrollo e implantación de planes de continuidad que incluyan la seguridad de la información.', NULL, '14.1.3', '2014-06-25 14:26:14', 36, NULL),
(114, 'Marco de referencia para la planificación de la continuidad  del negocio.', NULL, '14.1.4', '2014-06-25 14:26:14', 36, NULL),
(115, 'Pruebas, mantenimiento y reevaluación de planes de continuidad.', NULL, '14.1.5', '2014-06-25 14:26:14', 36, NULL),
(116, 'Identificación de la legislación aplicable.', NULL, '15.1.1', '2014-06-25 14:26:14', 37, NULL),
(117, 'Derechos de propiedad intelectual (DPI).', NULL, '15.1.2', '2014-06-25 14:26:14', 37, NULL),
(118, 'Protección de los documentos de la organización.', NULL, '15.1.3', '2014-06-25 14:26:14', 37, NULL),
(119, 'Protección de datos y privacidad de la información de carácter personal.', NULL, '15.1.4', '2014-06-25 14:26:15', 37, NULL),
(120, 'Prevención del uso indebido de recursos de tratamiento de la información.', NULL, '15.1.5', '2014-06-25 14:26:15', 37, NULL),
(121, 'Regulación de los controles criptográficos.', NULL, '15.1.6', '2014-06-25 14:26:15', 37, NULL),
(122, 'Cumplimiento de las políticas y normas de seguridad.', NULL, '15.2.1', '2014-06-25 14:26:15', 38, NULL),
(123, 'Comprobación del cumplimiento técnico.', NULL, '15.2.2', '2014-06-25 14:26:15', 38, NULL),
(124, 'Controles de auditoria de los sistemas de información.', NULL, '15.3.1', '2014-06-25 14:26:15', 39, NULL),
(125, 'Protección de las herramientas de auditoria de los sistemas de información.', NULL, '15.3.2', '2014-06-25 14:26:15', 39, NULL),
(126, 'Política de Seguridad de la Información', NULL, '5.1', '2014-06-26 11:49:18', 1, 1),
(127, 'Organización Interna', NULL, '6.1', '2014-06-26 11:49:18', 2, 1),
(128, 'Terceros', NULL, '6.2', '2014-06-26 11:49:18', 3, 1),
(129, 'Responsabilidad sobre los Activos', NULL, '7.1', '2014-06-26 11:49:18', 4, 1),
(130, 'Clasificación de la Información', NULL, '7.2', '2014-06-26 11:49:18', 5, 1),
(131, 'Antes del Empleo', NULL, '8.1', '2014-06-26 11:49:18', 6, 1),
(132, 'Durante el Empleo', NULL, '8.2', '2014-06-26 11:49:18', 7, 1),
(133, 'Cese del Empleo o Cambio de puesto de trabajo.', NULL, '8.3', '2014-06-26 11:49:18', 8, 1),
(134, 'Areas Seguras', NULL, '9.1', '2014-06-26 11:49:18', 9, 1),
(135, 'Seguridad de los Equipos', NULL, '9.2', '2014-06-26 11:49:18', 10, 1),
(136, 'Responsabilidades y Procedimientos de Operación', NULL, '10.1', '2014-06-26 11:49:18', 11, 1),
(137, 'Gestión de la Provisión de Servicios por Terceros', NULL, '10.2', '2014-06-26 11:49:18', 12, 1),
(138, 'Planificación y Aceptación del Sistema', NULL, '10.3', '2014-06-26 11:49:18', 13, 1),
(139, 'Protección contra el Código Malicioso y Descargable', NULL, '10.4', '2014-06-26 11:49:18', 14, 1),
(140, 'Copias de Seguridad', NULL, '10.5', '2014-06-26 11:49:18', 15, 1),
(141, 'Gestión de la Seguridad de las Redes', NULL, '10.6', '2014-06-26 11:49:18', 16, 1),
(142, 'Manipulación de los Soportes', NULL, '10.7', '2014-06-26 11:49:18', 17, 1),
(143, 'Intercambio de Información', NULL, '10.8', '2014-06-26 11:49:18', 18, 1),
(144, 'Servicios de Comercio Electronico', NULL, '10.9', '2014-06-26 11:49:18', 19, 1),
(145, 'Supervisión', NULL, '10.10', '2014-06-26 11:49:18', 20, 1),
(146, 'Requisitos del Negocio para el Control de Acceso', NULL, '11.1', '2014-06-26 11:49:18', 21, 1),
(147, 'Gestión de Acceso de Usuario', NULL, '11.2', '2014-06-26 11:49:18', 22, 1),
(148, 'Responsabilidades del Usuario', NULL, '11.3', '2014-06-26 11:49:18', 23, 1),
(149, 'Control de Acceso a la Red', NULL, '11.4', '2014-06-26 11:49:18', 24, 1),
(150, 'Control de Acceso al Sistema Operativo', NULL, '11.5', '2014-06-26 11:49:18', 25, 1),
(151, 'Control de Acceso a las Aplicaciones y a la Información', NULL, '11.6', '2014-06-26 11:49:18', 26, 1),
(152, 'Ordenadores Pórtatiles y Teletrabajo', NULL, '11.7', '2014-06-26 11:49:18', 27, 1),
(153, 'Requisitos de Seguridad de los Sistemas de Información', NULL, '12.1', '2014-06-26 11:49:18', 28, 1),
(154, 'Tratamiento Correcto de las Aplicaciones', NULL, '12.2', '2014-06-26 11:49:18', 29, 1),
(155, 'Controles Criptográficos', NULL, '12.3', '2014-06-26 11:49:18', 30, 1),
(156, 'Seguridad de los Archivos del Sistema', NULL, '12.4', '2014-06-26 11:49:18', 31, 1),
(157, 'Seguridad en los Procesos de Desarrollo y Soporte', NULL, '12.5', '2014-06-26 11:49:18', 32, 1),
(158, 'Gestión de la Vulnerabilidad Técnica', NULL, '12.6', '2014-06-26 11:49:18', 33, 1),
(159, 'Notificación de eventos y puntos débiles de Seguridad de la Información', NULL, '13.1', '2014-06-26 11:49:18', 34, 1),
(160, 'Gestión de Incidentes y Mejoras de Seguridad de la Inforamción', NULL, '13.2', '2014-06-26 11:49:18', 35, 1),
(161, 'Aspectos de la Seguridad de la Información en la gestión de la continuidad del Negocio', NULL, '14.1', '2014-06-26 11:49:18', 36, 1),
(162, 'Cumplimiento de los Requisitos Legales', NULL, '15.1', '2014-06-26 11:49:18', 37, 1),
(163, 'Cumplimiento de las Politicas y Normas de Seguridad y Cumplimiento Técnico', NULL, '15.2', '2014-06-26 11:49:18', 38, 1),
(164, 'Consideraciones sobre las auditorías de los Sistemas de Información', NULL, '15.3', '2014-06-26 11:49:18', 39, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm004_objetivos_pp`
--

CREATE TABLE IF NOT EXISTS `tm004_objetivos_pp` (
  `tm004_objetivo_pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm004_nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm004_objetivo_pp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Objetivos del Plan de la Patria' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tm004_objetivos_pp`
--

INSERT INTO `tm004_objetivos_pp` (`tm004_objetivo_pp_id`, `tm004_nombre`) VALUES
(1, 'Incrementar los niveles de seguridad de los activos de PDVSA, sus Filiales y Empresas Mixtas. '),
(2, 'Contar con el personal idóneo y calificado para cumplir con las funciones de la organización; fundamentado en la mejora continua de los procesos dentro de un ambiente interno apropiado para el desempeño superior de la misma.'),
(3, 'Elevar el nivel de conciencia de los trabajadores de PDVSA, terceros, relacionados y comunidades en cuanto la corresponsabilidad en materia de seguridad y el deber social para propiciar una conducta acorde al rol de PDVSA en el desarrollo integral de la nación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm005_lineas_accion`
--

CREATE TABLE IF NOT EXISTS `tm005_lineas_accion` (
  `tm05_lineas_accion_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm005_descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `tm005_fk_tm004_objetivo_id` int(11) NOT NULL,
  PRIMARY KEY (`tm05_lineas_accion_id`),
  KEY `tm005_fk_tm004_objetivo_id` (`tm005_fk_tm004_objetivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Lineas de Accion del Plan de la Patria' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tm005_lineas_accion`
--

INSERT INTO `tm005_lineas_accion` (`tm05_lineas_accion_id`, `tm005_descripcion`, `tm005_fk_tm004_objetivo_id`) VALUES
(1, 'Implantar el Modelo de Defensa Integral en todos los negocios y filiales de la Industria.', 1),
(2, 'Fortalecer y sistematizar la gestión de los riesgos y amenazas en los activos tangibles e intangibles de la industria.', 1),
(3, 'Actualizar la plataforma tecnológica de seguridad en los diferentes negocios y filiales.', 1),
(4, 'Asegurar la incorporación de la disciplina de  ingeniería de seguridad dentro de cada una de las fases en todo los proyectos de la Industria. ', 1),
(5, 'Educar, Concienciar y fomentar la corresponsabilidad en materia de seguridad y el deber socio-político en el personal de la industria petrolera y las comunidades aledañas.', 3),
(6, 'Manejar de forma integral información interna y externa para facilitar la toma de decisiones oportunas.', 1),
(7, 'Revisión continua de  los Procesos, Servicios y Productos de la Organización.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm006_actividades`
--

CREATE TABLE IF NOT EXISTS `tm006_actividades` (
  `tm006_actividades_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm006_descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `tm006_actividad_numero` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `tm006_fk_tm005_lineas_acc_id` int(11) NOT NULL,
  PRIMARY KEY (`tm006_actividades_id`),
  KEY `tm006_fk_tm005_lineas_acc_id` (`tm006_fk_tm005_lineas_acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Actividades correspondientes a la Linea de Accion' AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `tm006_actividades`
--

INSERT INTO `tm006_actividades` (`tm006_actividades_id`, `tm006_descripcion`, `tm006_actividad_numero`, `tm006_fk_tm005_lineas_acc_id`) VALUES
(1, 'Fortalecer el esquema de relaciones entre los negocio,  trabajadores, trabajadoras y comunidades. (Definir esquema de relaciones. Resp: Todas las Funciones).', '1.1', 1),
(2, 'Establecer Convenio Interinstitucional FANB – PDVSA. (Resp: Gerencia Funcional de Protección Industrial-Corporativo).', '1.2', 1),
(3, 'Fortalecer las relaciones con los Organismos de Seguridad Ciudadana e Instituciones encargados de la administración de justicia. ', '1.3', 1),
(4, 'Actualizar, revisar y evaluar los Planes de Contingencia y Emergencia en los diferentes negocios y filiales. (Establecer Lineamientos. Resp: Gerencia Funcional de Protección Industrial-Corporativo).', '1.4', 1),
(5, 'Establecer y Administrar las zonas de seguridad. ', '1.5', 1),
(6, 'Activar sistemáticamente las salas situacionales  para el manejo de eventos políticos y de seguridad en los diferentes negocios y filiales.  (Emitir lineamientos. Resp: Gerencia Funcional de Información Estratégica).', '1.6', 1),
(7, 'Crear los nuevos centros de reacción y respuestas. (Establecer Lineamientos. Resp: Gerente General de PCP Faja y Gerencia Funcional de Protección Industrial).', '1.7', 1),
(8, 'Incorporar tecnologías para la clasificación y manejo seguro de los activos de información. (Emitir lineamientos Resp: Gerencia Funcional de Seguridad en Tecnología de Información).', '1.8', 1),
(9, 'Fortalecer y actualizar los Cuerpo combatientes existentes en los diferentes negocios y filiales de la Industria. (Emitir lineamientos Resp: Gerencia Funcional de Protección Industrial).', '1.9', 1),
(10, 'Actualizar los estudios de impacto y el Mapa de Seguridad de la Plataforma Tecnológica de la Corporación.  (Resp: Gerencia Funcional de Seguridad en Tecnología de Información).', '2.1', 2),
(11, 'Actualizar y jerarquizar sistemáticamente los escenarios de riesgos y amenazas físicos y lógicos en todos los negocios y filiales de la industria.', '2.2', 2),
(12, 'Diseñar e implantar medidas innovadoras de Protección y Resguardo para el manejo de los riesgos físicos y lógicos. ', '2.3', 2),
(13, 'Asesorar y acompañar a los custodios en la implantación y cumplimiento de las medidas de protección físicos y lógicos . ', '2.4', 2),
(14, 'Incrementar los análisis casuísticos y forenses de las desviaciones en los  procesos para el manejo de los riesgos en los diferentes negocios y filiales.', '2.5', 2),
(15, 'Impulsar el cumplimiento de las medidas de protección generadas en los estudios de riesgos y amenazas. (Definir estrategias, Resp: Gerencia Funcional de Prevención de Pérdidas).', '2.6', 2),
(16, 'Diseñar  estrategias comunicacionales para fortalecer la cultura preventiva.', '2.7', 2),
(17, 'Actualizar y mantener la plataforma de seguridad en tecnología de la información  (IDS, Firewall, Proxy, Otros).', '3.1', 3),
(18, 'Actualizar y mantener la plataforma de protección física en los diferentes negocios y filiales de la corporación. ', '3.2', 3),
(19, 'Incorporar nuevas tecnologías para la plataforma de seguridad física y  seguridad en tecnología de la información. ', '3.3', 3),
(20, 'Implantar y actualizar métodos y tecnología para el monitoreo y evaluación de los procesos medulares de los negocios.', '3.4', 3),
(21, 'Incorporar la disciplina de ingeniería de seguridad en todos los proyectos de la industria de manera obligatoria. ', '4.1', 4),
(22, 'Actualizar y difundir Normativas Técnicas de Ingeniería de Seguridad.', '4.2', 4),
(23, 'Actualizar y Desarrollar Premisas y Lineamientos de Ingeniería, Términos de referencia para los proyectos. ', '4.3', 4),
(24, 'Fortalecer las competencias en el personal de PCP en las áreas de Ingeniería de Proyecto y Seguridad. ', '4.4', 4),
(25, 'Incorporar de manera temprana y planificada el personal de Protección en las diferentes fases del proyecto.', '4.5', 4),
(26, 'Consolidar y fortalecer los mecanismos de comunicación con los entes y organismos del Estado (FANB, OSC´s, Gobiernos Regionales y Locales). ', '6.1', 6),
(27, 'Consolidar y fortalecer las redes interna de información.', '6.2', 6),
(28, 'Fortalecer las redes de información comunitarias e interinstitucionales regionales y locales. ', '6.3', 6),
(29, 'Actualizar e incorporar tecnología para el monitoreo en tiempo real de los procesos medulares y de apoyo de la industria. (Definir estratégica, Resp: Equipo Multidisciplinario).', '6.4', 6),
(30, 'Generar de forma oportuna escenarios y alertas tempranas sobre los riesgos y amenazas a los procesos medulares y de apoyo a los negocios.', '6.5', 6),
(31, 'Monitorear de manera sistemática los hechos políticos y sociales, nacionales e internacionales que puedan afectar a la industria.', '6.6', 6),
(32, 'Fortalecer las técnicas, herramientas y competencias para la captura, procesamiento, análisis y prognosis de la información. ', '6.7', 6),
(33, 'Evaluar de forma critica el desempeño de la función en el marco de los nuevos retos de PDVSA. (Diseñar estrategia, Resp: Sub-Gerente Corporativo de PCP).', '7.1', 7),
(34, 'Fortalecer el sistema de control de gestión de la organización, basado en el manejo de indicadores de efectividad, eficacia y eficiencia.', '7.2', 7),
(35, 'Revisar y actualizar las competencias de los procesos para el desarrollo de planes de formación y el cierre de brechas.', '7.3', 7),
(36, 'Actualizar y mantener las normas, políticas, procedimientos y certificaciones de la Organización.', '7.4', 7),
(37, 'Actualizar, desarrollar e integrar el Sistemas de Información de PCP. (Diseñar estrategia, Resp: Equipo Multidisciplinario-Corporativo).', '7.5', 7),
(38, 'Fortalecer el clima laboral de la organización.', '7.6', 7),
(39, 'Diseñar e implementar mecanismos de comunicación y educación  para la concienciación en materia de seguridad.', '5.1', 5),
(40, 'Realizar jornadas  y foros de concienciación y educación que incorporen a los trabajadores, trabajadoras, comunidades y relacionados.', '5.2', 5),
(41, 'Actualizar  los programas educativos dirigidos a fomentar el conocimiento de las normas, políticas de seguridad, valores políticos y sociales en el personal de la industria. ', '5.3', 5),
(42, 'Establecer jornadas de intercambio con los custodios para el seguimiento al cumplimiento de las medidas de protección. (Definir estrategias, Resp: Gerencia Funcional de Prevención de Pérdidas)', '5.4', 5),
(43, 'Coordinar simulacros con los custodios y Organismos de Seguridad Ciudadana, para fortalecer la respuesta del personal antes situaciones de amenazas y riesgos.', '5.5', 5),
(44, 'Promover el trabajo voluntario para el mejoramiento de la infraestructura de servicios de las comunidades aledañas. ', '5.6', 5),
(45, 'Promover la discusión, análisis y participación  política de los trabajadores en apoyo al proceso Revolucionario Bolivariano y Chavista.', '5.7', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm007_tareas`
--

CREATE TABLE IF NOT EXISTS `tm007_tareas` (
  `tm007_tareas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm007_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `tm007_fk_tm006_activ_id` int(11) NOT NULL,
  PRIMARY KEY (`tm007_tareas_id`),
  KEY `tm007_fk_tm006_activ_id` (`tm007_fk_tm006_activ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tareas descritas en el plan operativo' AUTO_INCREMENT=85 ;

--
-- Volcado de datos para la tabla `tm007_tareas`
--

INSERT INTO `tm007_tareas` (`tm007_tareas_id`, `tm007_descripcion`, `tm007_fk_tm006_activ_id`) VALUES
(1, 'Realizar reuniones con la Gcia. De AIT en todas las Divisiones con la finalidad de hacer la revisión de los productos y servicios ofecidos por ambas organizaciones. (Implantación de Libro de bitácora para salas de servidores o centros de Datos).', 1),
(2, 'Apalancar el Dominio 14. Gestión de la Continuidad del Negocio de la Norma ISO 27002 para SGSI a traves de:\n   - Actualización, revisión y evaluación de planes de continuidad.', 4),
(3, 'Apalancar el Dominio 14.  Solicitar y asesorar elaboracion de Plan de Conting o Plan Operat de la Plataforma de AIT', 4),
(4, 'Reforzar el control 14.1.5 de la Norma ISO 27002 para SGSI, referente a las pruebas, mantenimiento y reevaluación de planes de continuidad.', 4),
(5, 'Apalancar el Dominio 14. Gestión de la Continuidad del Negocio de la Norma ISO 27002 para el SGSI, a traves de la revisión y/o ejecución de actividades contenidas en el Plan Maestro, dependiendo del estado de alerta.', 6),
(6, 'Revisar y aprobar Lineamiento relacionado con Clasificación y Rotulación de Información que refiere al Objetivo de Control 7.2 ', 8),
(7, 'Realizar auditoria en STI Corporativo/región/negocio/filiales sobre el cumplimiento del lineamiento de Clasificación y Rotulación de Información que refiere al Objetivo de Control 7.2 y 15.3.', 8),
(8, 'Mantener toda la documentación que maneje internamente STI Corporativo/región/negocio/filiales clasificada, rotulada y con su control de versión, que refiere al Objetivo de Control 7.2.', 8),
(9, 'Revisar y aprobar Lineamiento relacionado con Controles criptográficos que refiere al Objetivo de Control 12.3 ', 8),
(10, 'Generar, controlar y resguardar las Llaves PGP del personal de STI Corporativo/región/negocio/filiales que permite cifrar la información considerada "Confidencial" o "Estrictamente Confidencial", referido al Objetivo de Control 12.3.', 8),
(11, 'Controlar y resguardar las Llaves PGP del personal de STI que permite cifrar la información considerada "Confidencial" o "Estrictamente Confidencial", referido al Objetivo de Control 12.3.', 8),
(12, 'Participación Proyectos TSM/ DSM  - reuniones con equipo de proyecto para analizar productos ', 8),
(13, 'Ejecucion de proyectos: Automatizacion de PCP , referencia control 10.3 ISO 27002  SGSI', 8),
(14, ' Ejecucion de proyectos : Inteligencia de negocios -  referencia control 10.3 ISO 27001  SGSI', 8),
(15, 'Inicio Proyecto implatancion de GRC - referencia control  10.2 -10.3 ISO 27001 SGSI', 8),
(16, 'Reportar el diseño de la Arquitectura de Seguridad que avala la Plataforma de Seguridad de la región/negocio/filial para atender el Objetivo de Control 10.3', 10),
(17, 'En función de apalancar el Objetivo de control 7.1 Responsabilidad sobre los activos, es necesario mantener un inventario actualizado de los dispositivos de seguridad  de la plataforma, por tanto se debe realizar una revisiń mensual del inventario para garantizar que el mismo tenga la información requerida.', 10),
(18, 'Apalancar el requisito 4.2 de la Norma ISO 27001 para el SGSI, a traves de la elaboración de Analisis de Impacto a los activos de información de STI/Negocio, en concordancia con lo establecido en las Políticas, Normas y Lineamientos en materia de seguridad de información ', 10),
(19, 'Participacion Proyecto  Antifraude ( Asuntos internos) teniendo referencia el dominio 15 de la norma 27002 para el SGSI', 11),
(20, 'Realizar visitas a las instalaciones de PDVSA para el levantamiento de información de insumo para los analisis de riesgo. ', 11),
(21, 'Reforzar el requisito 4.2 de la Norma ISO 27001 para el SGSI, a traves de la elaboración de Analisis de Riesgo Lógico a los activos de información de STI.', 11),
(22, 'Llevar a cabo la  sincronización de relojes de los equipos de STI, que permitan apalancar el Objetivo de Control 10.10.', 12),
(23, 'Reportar las autorizaciones de acceso a equipos de Tercero a las Instalaciones de la región/negocio/filial con el formato homologado de Carta de Compromiso de Prohibición de Acceso a la red por parte de Tercero que apalanca el Objetivo de Control 6.2. ', 12),
(24, 'Reportar las autorizaciones de Intercambio y Transferencia de Información de la región/negocio/filial, para apalancar el Objetivo de Control 10.8.', 12),
(25, 'Reportar los controles de cambio que impactan en la plataforma tecnológica de la región/negocio/filial, apalancando el Objetivo de Control 12.5.', 12),
(26, 'En cuanto al cumplimiento del Objetivo de control 8.3 Cese del empleo o cambio de puesto de trabajo, debemos tener un procedimiento que nos permita desactivar los accesos lógicos de los usuarios al momento de ser desincorporados o cambiados en sus funciones, para lo cual tenemos la tarea de depuración de cuentas de red de acuerdo los criterios estabecidos por el procedimiento.', 12),
(27, 'Reforzar los Objetivos de Control  4.2, 10.5 y 14 - Establecimiento del SGSI, Copias de Seguridad y Gestión de la Continuidad del Negocio de la Norma ISO 27002 para el SGSI a traves de la realización de auditorías internas, con el fin de validar la correcta ejecución de los procedimientos asociados', 12),
(28, 'Apalancar los Objetivos de Control  4.2, 10.5 y 14 - Establecimiento del SGSI, Copias de Seguridad y Gestión de la Continuidad del Negocio de la Norma ISO 27002 para el SGSI a traves de la incorporación de mejoras a los procedimientos y formatos del proceso de ERC, en pro de la mejora continua de la función', 12),
(29, 'Reforzar el Objetivo de Control 10.5 - Copias de Seguridad de la Norma ISO 27002 para el SGSI a traves de la realización de traslado y resguardo de los medios de respaldo de datos criticos de la plataforma tecnologica. ', 12),
(30, 'Reforzar el Objetivo de Control 10.5 - Copias de Seguridad de la Norma ISO 27002 para el SGSI a traves de pruebas de integridad, recuperación y restauración de la información contenida en los medios de respaldo de datos criticos de la plataforma tecnologica', 12),
(31, 'Apalancar el dominio 14. Gestión de la Continuidad del Negocio de la Norma ISO 27002 para el SGSI, a traves de la realización de resguardo de claves de maximo privilegio de los sistemas criticos  de la plataforma tecnologica.', 12),
(32, 'Atender lo establecido en el el Control 10.9.3. de la Norma ISO 27002 para el SGSI, a través de Evaluaciones Lógicas a aplicaciones que estén disponibles públicamente (extranet)', 12),
(33, 'Realizar Depuración de Cuentas a Sistemas Críticos, Para cumplir con el Objetivo de control 8.3', 12),
(34, 'Atender lo establecido en el Objetivo de Control 12.2 de la Norma ISO 27002 para el SGSI, a través de Evaluaciones Lógicas a aplicaciones ', 12),
(35, 'Participacion proyecto de seguridad Fase II , con referencia a ISO 27001 controles A.5.1 - A.7.2 - A.10.3 ', 12),
(36, 'Participacion en reuniones de levantamiento de informacion para consultorias relacionadas al proyecto agil, con referencia al control 15.2 ISO 27002  ', 12),
(37, 'Reportar las consultorias de seguridad que impactan en la plataforma tecnológica de la región/negocio/filial, apalancando el Objetivo de Control 12.1.', 13),
(38, 'Atender lo establecido en el requisito 4.2 de la Norma ISO 27001 y el objetivo de control 12.2 de la Norma ISO 27001 para el SGSI a traves de la elaboración y seguimiento de los cronogramas de mitigación de los activos de información de STI/Negocio.', 13),
(39, 'Reportar las arquitecturas de seguridad que impactan en la plataforma tecnológica de la región/negocio/filial, apalancando el Objetivo de Control 12.1.', 13),
(40, 'Consolidar propuesta y generar el contenido de seguridad en Tecnología de información a entregar a Prevención para su publicación ( entre las notas se tiene: medios removibles (Objetivo de Control 10.7.), prevenir  accesos no autorizados a los recursos de información (Objetivo de Control 11.3.), Clasificación y Rotulación de la Información (Objetivo de Control 7.2.), acceso desde dispositivos móviles (Objetivo de Control 11.7.), nuevo marco normativo interno en materia de seguridad de infomación (Objetivo de Control 5.1.) etc.), que apalanca el Objetivo de Control 8.2.', 16),
(41, 'Generar propuestas de contenido de seguridad en Tecnología de información a entregar a APS Corporativo ( entre las notas se tiene: medios removibles (Objetivo de Control 10.7.), prevenir  accesos no autorizados a los recursos de información (Objetivo de Control 11.3.), Clasificación y Rotulación de la Información (Objetivo de Control 7.2.), acceso desde dispositivos móviles (Objetivo de Control 11.7.), nuevo marco normativo interno en materia de seguridad de infomación (Objetivo de Control 5.1.) etc.), que apalanca el Objetivo de Control 8.2.', 16),
(42, 'Con el fin de dar cumplimiento al Objetivo de control 10.1 Responsabilidades y procedimientos de operación, debemos mantener los equipos de seguridad con la documentación solictada en el inventario de dispositvos de seguridad.', 17),
(43, 'Con el fin de dar cumplimiento al Objetivo de control 10.1 Responsabilidades y procedimientos de operación, se debe Asegurar la operación correcta y segura de los recursos de la Plataforma de Seguridad, mediante el plan de mantenimiento de los equipos.', 17),
(44, 'Cumplir con todos los requerimientos legales aplicables para el monitoreo y el registro de actividades y detectar actividades de procesamiento de la información no autorizadas, de acuerdo al Objetivo de control 13.2 Gestión de incidentes y mejoras de seguridad de la información.', 17),
(45, 'El Objetivo de control 10.4 Protección contra el código malicioso y descargable, lo mantendremos mediante la depuración de los equipos de seguridad perimetral en cuanto a reglas y objetos, poe lo que debemos considerarlos dentro de la planificación', 17),
(46, 'En el objetivo de control 10.10 Supervisión, encontramos la necesidad de mantener registros de auditoria sobre los sistemas de seguridad que nos permitan controlar las acciones realizadas sobre los mismos, lo que nos obliga a tener un almacenaminento de estos registros en un lugar seguro, accesible y auditable.', 17),
(47, 'Para dar cumplimiento al Objetivo de control 11.2 Gestión de acceso de usuario, tenemos como actividad el cumplimiento del procedmiento establecido para el otorgamiento de acceso a los recursos de Internet.', 17),
(48, 'Para el Objetivo de control 11.4 Control de acceso a la red, donde se requiere prevenir el acceso no autorizado a los servicios de red, tenderemos la depuración programada de los accesos otorgados a los recursos de Internet', 17),
(49, 'Con el fin de prevenir el acceso no autorizado a los sistemas operativos y dar cumplimento al Objetivo de control 11.5 Control de Acceso al sistema operativo, será necesario aplicar depuraciones planificadas a los accesos remotos a la plataforma tecnológica.', 17),
(50, 'En cuanto a el Objetivo de control 11.6 Control de acceso a las aplicaciones e información, que nos permite prevenir el acceso no autorizado a la información contenida en los sistemas de aplicación, estaremos verificando recurrentemente los usuarios que tiene acceso a estos sistemas y confirmar que solo los autorizados  tengan acceso en el archivo de claves perimetrales.', 17),
(51, 'En el Objetivo de control 13.1 Notificación de eventos y puntos débiles de seguridad de la Información tenemos que asegurar que los eventos y debilidades en la seguridad asociados con los sistemas de información se comuniquen de modo que se puedan realizar acciones correctivas oportunas, cosa que lograremos con el reporte de monitoreo donde se incluyen los incidentes ocurridos en la plataforma.', 17),
(52, 'De acuerdo al Objetivo de control 13.2 Gestión de incidentes y mejoras de seguridad de la información necesitamos garantizar que se aplica un enfoque consistente y eficaz para la gestión de los incidentes en la seguridad de información, por lo que será necesario mantener un control sobre los casos de incidente y su estatus a través del tiempo mediante los reportes de monitoreo de la plataforma.', 17),
(53, 'Instalación y/o actualización de dispositivos de seguridad perimetral (IDS, firewall, Web Cache, VPN, Citrix, Consolidador) para oficinas nacionales e internacionales de Bariven (PSBV, PSI Y SHANGHAI)', 17),
(54, 'Sincronización de los equipos de la plataforma de seguridad con la plataforma NTP de PCP. Con el fin de asegurar la correcta  fijacion del tiempo en los registros de auditoria y demas archivos que utilice la plataforma se seguridad.', 17),
(55, 'Divulgar la importancia de DSM, identificar los usuarios a utilizar la solución, e implantar la solución en STI de la región/negocio/filial, referido al Objetivo de Control 12.3.', 19),
(56, 'Proyecto Movilidad Sap  con referencia a ISO 27001 controles A.5.1 - A.7.2 - A.10.3 - A11.2 ', 19),
(57, 'Divulgar la importancia de DSM e identificar los usuarios a utilizar la solución en PCP de la región/negocio/filial, referido al Objetivo de Control 12.3.', 19),
(58, 'Divulgar la importancia de DSM y obtener la aprobación del Gerente de 1era o 2da. Línea para la implantación de la Solución en región/negocio/filial, referido al Objetivo de Control 12.3.', 19),
(59, 'Implantar la solución TSM en PCP  EyP Occidente, referido al Objetivo de Control 11.4.', 19),
(60, 'Implantar la solución DSM en PCP y una gerencia de la región/negocio/filial, referido al Objetivo de Control 12.3.', 19),
(61, 'Diseño y Lineamiento de soluciones de seguridad en ambientes virtualizados, referido al Objetivo de Control 10.3, 12.1 y 5.1.', 19),
(62, 'Reingenería del sistema automatizado de Control de acceso de equipos a Tercero, referido al Objetivo de Control 10.3, 12.1 y 6.2', 19),
(63, 'Desarrollar e implementar los proyectos de Adaptación y actualización de la Gerencia Funcional de Seguridad en Tecnologías de Información', 19),
(64, 'Realizar informe de avance del desarrollo e implementación de los proyectos de Adaptación y actualización de la Gerencia Funcional de Seguridad en Tecnologías de Información', 19),
(65, 'Fortalecer el dominio 14. Gestión de la Continuidad del Negocio y el objetivo de control 12.6 de la Norma ISO 27002 para el SGSI a traves de la incorporación de soluciones de seguridad para la Automatización de Claves de Máximo Privilegio, Planes de Continuidad y Gestión de Vulnerabilidades', 19),
(66, 'Proyecto de Inteligencia de Negocio controles A.5.1 - A.7.2 - A.10.3 - A11.2', 20),
(67, 'Reportar estrategias educativas de sensibilización y concienciación en materia de Seguridad de Información y del SGSI para el personal de soporte integral de AIT, Operadores de Protección Industrial y personal STI, el cual apalanca el Objetivo de Control 8.2', 24),
(68, 'Realizar adiestramiento relacionado al proceso de Inteligencia Aplicada al Dato. el cual apalanca el Objetivo de Control 8.2', 24),
(69, 'Realizar talleres relacionados al proceso de Protección Lógica, el cual apalanca el Objetivo de Control 8.2', 24),
(70, 'Realizar talleres relacionados al proceso de Evaluación, Respuesta y Contingencia, el cual apalanca el Objetivo de Control 8.2', 24),
(71, 'Realizar talleres relacionados al proceso de Arquitectura Preventiva de Seguridad, el cual apalanca el Objetivo de Control 8.2', 24),
(72, 'Revisar y actualizar Politicas de Seguridad, apalanca el Objetivo de Control 5.1', 36),
(73, 'Revisar y actualizar Normativas de Seguridad, apalanca el Objetivo de Control 5.1', 36),
(74, 'Revisar y actualizar Lineamientos de Seguridad, apalanca el Objetivo de Control 5.1 ', 36),
(75, 'Revisar y notificar al personal de la Industria por incumplimiento de las Políticas, Normativas, que refiere al Objetivo de Control 15.1.', 36),
(76, 'Diseñar el mecanismo de comunicación referente a las categorias existentes para el Acceso de Internet, atendiendo el Objetivo de Control 11.1.', 36),
(77, 'Revisar y aprobar Lineamiento sobre acceso desde dispositivos móviles, atendiendo el Objetivo de Control 11.7.', 36),
(78, 'Revisar y aprobar producto comunicacional sobre el uso adecuado de medios Removibles de Terceros, atendiendo el Requisito: Control A10.7.1 Control de Medios Removibles. Norma ISO 27001:2005.', 36),
(79, 'Realizar Mesas de Trabajo con el personal de APS a nivel nacional, atendiendo el Objetivo de Control 8.2.', 38),
(80, 'Realizar Mesas de Trabajo con el personal de ERC a nivel nacional, atendiendo el Objetivo de Control 8.2. ', 38),
(81, 'Realizar Mesas de Trabajo con el personal de PL a nivel nacional, atendiendo el Objetivo de Control 8.2. ', 38),
(82, 'Dictar charlas en centros educativos relacionadas a la seguridad de la informacion.', 39),
(83, 'Idear y solicitar al personal de PP del área estrategias de comunicación y educación para los usuarios en materia de concienciación de Seguridad de Información, basada en los eventos de Seguridad ocurridos durante el año, lo cual apalanca el Control 8.2.', 39),
(84, 'Revisión y reingeneria del contenido educativo en materia de Seguridad de Información, en pro de su mejora, el cual  apalanca el Control 8.2. ', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm008_ubicacion`
--

CREATE TABLE IF NOT EXISTS `tm008_ubicacion` (
  `tm008_ubicacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm008_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm008_ubicacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Listado de Negocios y/o Filiales' AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tm008_ubicacion`
--

INSERT INTO `tm008_ubicacion` (`tm008_ubicacion_id`, `tm008_descripcion`) VALUES
(1, 'Corporativo'),
(2, 'Comercio y Suministro'),
(3, 'PDVSA Naval'),
(4, 'Exploración y Producción FPO'),
(5, 'Refinación'),
(6, 'Exploración y Producción Occidente'),
(7, 'Exploración y Producción Oriente'),
(8, 'PDVSA Industrial'),
(9, 'Ingenieria y Construcción'),
(10, 'INTEVEP'),
(11, 'Metropolitana'),
(12, 'PDVSA Gas'),
(13, 'PDVSA Servicios'),
(14, 'Bariven');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm009_responsable`
--

CREATE TABLE IF NOT EXISTS `tm009_responsable` (
  `tm009_responsable_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm009_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm009_responsable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Responsables de la Gerencia Funcional' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tm009_responsable`
--

INSERT INTO `tm009_responsable` (`tm009_responsable_id`, `tm009_descripcion`) VALUES
(1, 'STI - APS'),
(2, 'STI - IAD'),
(3, 'STI - PL'),
(4, 'STI - ERC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm010_frecuencia`
--

CREATE TABLE IF NOT EXISTS `tm010_frecuencia` (
  `tm010_frecuencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm010_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm010_frecuencia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Frecuencia de Ejecución de las Tareas' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tm010_frecuencia`
--

INSERT INTO `tm010_frecuencia` (`tm010_frecuencia_id`, `tm010_descripcion`) VALUES
(1, 'Anual'),
(2, 'Semestral'),
(3, 'Trimestral'),
(4, 'Bimestral'),
(5, 'Mensual'),
(6, 'Bianual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm011_unidad`
--

CREATE TABLE IF NOT EXISTS `tm011_unidad` (
  `tm011_unidad_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm011_descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm011_unidad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Unidad de Medida para la Tarea' AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tm011_unidad`
--

INSERT INTO `tm011_unidad` (`tm011_unidad_id`, `tm011_descripcion`) VALUES
(1, 'Accesos otorgados a recursos de Internet que cumplen con el procedimiento.'),
(2, 'Cantidad de equipos con Logs registrando su actividad.'),
(3, 'Cantidad de equipos en el inventario, con toda la documentación.'),
(4, 'Certificado de Adiestramiento.'),
(5, 'Charla ejecutada.'),
(6, 'Equipos actualizados en el inventario.'),
(7, 'Estrategia Educativa'),
(8, 'Ficha del Proyecto Actualizada'),
(9, 'Informe'),
(10, 'Informe de Análisis de Impacto a los activos de información de STI/Negocio'),
(11, 'Informe de Analisis de Riesgo'),
(12, 'Informe de Avance'),
(13, 'informe de Depuracion de Acceso Logico.'),
(14, 'Informe de Evaluación Lógica'),
(15, 'Informe de Gestion'),
(16, 'Informe Producto entregado a proyecto'),
(17, 'Lista de Asistencia'),
(18, 'Minuta'),
(19, 'Nota de Correo'),
(20, 'Plan Maestro Actualizado.'),
(21, 'Procedimiento y Formatos asociados actualizados.'),
(22, 'Producto Comunicacional.'),
(23, 'Producto.'),
(24, 'Registros'),
(25, 'Taller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `to001_usuarios`
--

CREATE TABLE IF NOT EXISTS `to001_usuarios` (
  `to001_usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `to001_indicador` varchar(100) NOT NULL,
  `to001_fk_tm008_ubic_id` int(11) NOT NULL,
  `to001_rol` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`to001_usuario_id`),
  KEY `to001_fk_tm008_ubic_id` (`to001_fk_tm008_ubic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Usuarios con acceso al Sistema' AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `to001_usuarios`
--

INSERT INTO `to001_usuarios` (`to001_usuario_id`, `to001_indicador`, `to001_fk_tm008_ubic_id`, `to001_rol`) VALUES
(1, 'MUJICAC', 1, 0),
(2, 'ORTEGAV', 1, 0),
(3, 'SANCHEZNY', 1, 0),
(4, 'RAMIREZKD', 1, 0),
(5, 'FERNANDEZKW', 1, 0),
(6, 'MONTEROJL', 2, 0),
(7, 'CABEZAI', 3, 0),
(8, 'MAVAREST', 4, 0),
(9, 'VARGASCB', 5, 0),
(10, 'MORANMN', 6, 0),
(11, 'MOLINOSC', 7, 0),
(12, 'RODRIGUEZFJX', 8, 0),
(13, 'CARPIOJ', 9, 0),
(14, 'RIVASK', 10, 0),
(15, 'VELASCOMA', 11, 0),
(16, 'CONTRERASAHF', 12, 0),
(17, 'VIVASNS', 13, 0),
(18, 'SUAREZMA', 14, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `to013_plan_anual`
--

CREATE TABLE IF NOT EXISTS `to013_plan_anual` (
  `to013_plan_anual_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm007_tareas_id` int(11) NOT NULL,
  `tm008_ubicacion_id` int(11) NOT NULL,
  `tm009_responsable_id` int(11) NOT NULL,
  `tm010_frecuencia_id` int(11) NOT NULL,
  `tm011_unidad_id` int(11) NOT NULL,
  `meta` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `planificadas` int(11) NOT NULL,
  `ejecutadas` int(11) NOT NULL,
  `bajo_demanda` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`to013_plan_anual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tr001_control_tarea`
--

CREATE TABLE IF NOT EXISTS `tr001_control_tarea` (
  `tr001_control_tarea_id` int(11) NOT NULL,
  `tr001_fk_tm007_tareas_id` int(11) NOT NULL,
  `tr001_fk_tm003_control_id` int(11) NOT NULL,
  PRIMARY KEY (`tr001_control_tarea_id`),
  KEY `tr001_fk_tm007_tareas_id` (`tr001_fk_tm007_tareas_id`,`tr001_fk_tm003_control_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Control Relacionado a la Tarea';

--
-- Volcado de datos para la tabla `tr001_control_tarea`
--

INSERT INTO `tr001_control_tarea` (`tr001_control_tarea_id`, `tr001_fk_tm007_tareas_id`, `tr001_fk_tm003_control_id`) VALUES
(2, 2, 161),
(3, 3, 161),
(4, 4, 124),
(5, 5, 161),
(6, 6, 130),
(7, 7, 130),
(8, 7, 164),
(9, 8, 130),
(10, 9, 155),
(11, 10, 155),
(12, 11, 155),
(14, 13, 138),
(15, 14, 138),
(16, 15, 137),
(17, 15, 138),
(18, 16, 138),
(19, 17, 136),
(21, 19, 162),
(22, 19, 163),
(23, 19, 164),
(26, 22, 145),
(27, 23, 128),
(28, 24, 143),
(29, 25, 157),
(30, 26, 133),
(31, 27, 140),
(32, 27, 161),
(33, 28, 140),
(34, 28, 161),
(35, 29, 140),
(36, 30, 140),
(37, 31, 161),
(38, 32, 64),
(39, 33, 133),
(40, 34, 154),
(41, 35, 126),
(42, 35, 130),
(43, 35, 138),
(44, 36, 163),
(45, 37, 153),
(46, 38, 154),
(47, 39, 153),
(48, 40, 132),
(49, 41, 132),
(50, 42, 136),
(51, 43, 136),
(52, 44, 160),
(53, 45, 139),
(54, 46, 145),
(55, 47, 147),
(56, 48, 149),
(57, 49, 150),
(58, 50, 151),
(59, 51, 159),
(60, 52, 160),
(63, 55, 155),
(64, 56, 126),
(66, 56, 130),
(67, 56, 138),
(65, 56, 147),
(68, 57, 155),
(69, 58, 155),
(70, 59, 149),
(71, 60, 155),
(72, 61, 126),
(73, 61, 138),
(74, 61, 153),
(79, 65, 158),
(78, 65, 161),
(80, 66, 125),
(81, 66, 130),
(82, 66, 138),
(83, 66, 147),
(84, 67, 132),
(85, 68, 132),
(86, 69, 132),
(87, 70, 132),
(88, 71, 132),
(89, 72, 126),
(90, 73, 126),
(91, 74, 126),
(92, 75, 162),
(93, 76, 146),
(94, 77, 152),
(95, 78, 55),
(96, 79, 132),
(97, 80, 132),
(98, 81, 132),
(100, 83, 132),
(101, 84, 132);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tm003_controles`
--
ALTER TABLE `tm003_controles`
  ADD CONSTRAINT `tm003_controles_ibfk_1` FOREIGN KEY (`tm003_fk_tm002_objetivo_id`) REFERENCES `tm002_objetivos` (`tm002_objetivo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tm005_lineas_accion`
--
ALTER TABLE `tm005_lineas_accion`
  ADD CONSTRAINT `tm005_lineas_accion_ibfk_1` FOREIGN KEY (`tm005_fk_tm004_objetivo_id`) REFERENCES `tm004_objetivos_pp` (`tm004_objetivo_pp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tm006_actividades`
--
ALTER TABLE `tm006_actividades`
  ADD CONSTRAINT `tm006_actividades_ibfk_1` FOREIGN KEY (`tm006_fk_tm005_lineas_acc_id`) REFERENCES `tm005_lineas_accion` (`tm05_lineas_accion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tm007_tareas`
--
ALTER TABLE `tm007_tareas`
  ADD CONSTRAINT `tm007_tareas_ibfk_1` FOREIGN KEY (`tm007_fk_tm006_activ_id`) REFERENCES `tm006_actividades` (`tm006_actividades_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tr001_control_tarea`
--
ALTER TABLE `tr001_control_tarea`
  ADD CONSTRAINT `tr001_control_tarea_ibfk_1` FOREIGN KEY (`tr001_control_tarea_id`) REFERENCES `tm003_controles` (`tm003_control_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tr001_control_tarea_ibfk_2` FOREIGN KEY (`tr001_fk_tm007_tareas_id`) REFERENCES `tm007_tareas` (`tm007_tareas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
