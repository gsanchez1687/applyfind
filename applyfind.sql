-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 14-03-2023 a las 17:19:26
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `applyfind`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `activo`) VALUES
(17, 'Administracion / Oficina', 1),
(18, 'Almacén', 1),
(19, 'Atencion a clientes', 1),
(20, 'CallCenter', 1),
(21, 'Compras', 1),
(22, 'Contabilidad', 1),
(23, 'Dirección', 1),
(24, 'Diseño Grafico', 1),
(25, 'Informática', 1),
(26, 'Ingeniería', 1),
(27, 'Investigacion y Calidad', 1),
(28, 'Legal / Asesoría', 1),
(29, 'Mantenimiento y Reparaciones Técnicas', 1),
(30, 'Marketing / Ventas', 1),
(31, 'Medicina / Salud', 1),
(32, 'Mercadeo / Publicidad / Comunicacion', 1),
(33, 'Otros', 1),
(34, 'Producción / Operaciones', 1),
(35, 'Recursos Humanos', 1),
(36, 'Servicios Generales / Aseo y Seguridad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `sexo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `sexo`, `activo`) VALUES
(1, 'Masculino', 1),
(2, 'Femenino', 1),
(3, 'Ambos', 1),
(4, 'Indistinto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `idioma`, `codigo`, `activo`) VALUES
(1, 'Ingles', 'en', 1),
(2, 'Español', 'es', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `modulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `dipositivo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `iso`, `nombre`, `activo`) VALUES
(1, 'AF', 'Afganistán', 0),
(2, 'AX', 'Islas Gland', 0),
(3, 'AL', 'Albania', 0),
(4, 'DE', 'Alemania', 0),
(5, 'AD', 'Andorra', 0),
(6, 'AO', 'Angola', 0),
(7, 'AI', 'Anguilla', 0),
(8, 'AQ', 'Antártida', 0),
(9, 'AG', 'Antigua y Barbuda', 0),
(10, 'AN', 'Antillas Holandesas', 0),
(11, 'SA', 'Arabia Saudí', 0),
(12, 'DZ', 'Argelia', 0),
(13, 'AR', 'Argentina', 0),
(14, 'AM', 'Armenia', 0),
(15, 'AW', 'Aruba', 0),
(16, 'AU', 'Australia', 0),
(17, 'AT', 'Austria', 0),
(18, 'AZ', 'Azerbaiyán', 0),
(19, 'BS', 'Bahamas', 0),
(20, 'BH', 'Bahréin', 0),
(21, 'BD', 'Bangladesh', 0),
(22, 'BB', 'Barbados', 0),
(23, 'BY', 'Bielorrusia', 0),
(24, 'BE', 'Bélgica', 0),
(25, 'BZ', 'Belice', 0),
(26, 'BJ', 'Benin', 0),
(27, 'BM', 'Bermudas', 0),
(28, 'BT', 'Bhután', 0),
(29, 'BO', 'Bolivia', 1),
(30, 'BA', 'Bosnia y Herzegovina', 0),
(31, 'BW', 'Botsuana', 0),
(32, 'BV', 'Isla Bouvet', 0),
(33, 'BR', 'Brasil', 0),
(34, 'BN', 'Brunéi', 0),
(35, 'BG', 'Bulgaria', 0),
(36, 'BF', 'Burkina Faso', 0),
(37, 'BI', 'Burundi', 0),
(38, 'CV', 'Cabo Verde', 0),
(39, 'KY', 'Islas Caimán', 0),
(40, 'KH', 'Camboya', 0),
(41, 'CM', 'Camerún', 0),
(42, 'CA', 'Canadá', 0),
(43, 'CF', 'República Centroafricana', 0),
(44, 'TD', 'Chad', 0),
(45, 'CZ', 'República Checa', 0),
(46, 'CL', 'Chile', 0),
(47, 'CN', 'China', 0),
(48, 'CY', 'Chipre', 0),
(49, 'CX', 'Isla de Navidad', 0),
(50, 'VA', 'Ciudad del Vaticano', 0),
(51, 'CC', 'Islas Cocos', 0),
(52, 'CO', 'Colombia', 1),
(53, 'KM', 'Comoras', 0),
(54, 'CD', 'República Democrática del Congo', 0),
(55, 'CG', 'Congo', 0),
(56, 'CK', 'Islas Cook', 0),
(57, 'KP', 'Corea del Norte', 0),
(58, 'KR', 'Corea del Sur', 0),
(59, 'CI', 'Costa de Marfil', 0),
(60, 'CR', 'Costa Rica', 0),
(61, 'HR', 'Croacia', 0),
(62, 'CU', 'Cuba', 0),
(63, 'DK', 'Dinamarca', 0),
(64, 'DM', 'Dominica', 0),
(65, 'DO', 'República Dominicana', 0),
(66, 'EC', 'Ecuador', 0),
(67, 'EG', 'Egipto', 0),
(68, 'SV', 'El Salvador', 0),
(69, 'AE', 'Emiratos Árabes Unidos', 0),
(70, 'ER', 'Eritrea', 0),
(71, 'SK', 'Eslovaquia', 0),
(72, 'SI', 'Eslovenia', 0),
(73, 'ES', 'España', 0),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', 0),
(75, 'US', 'Estados Unidos', 0),
(76, 'EE', 'Estonia', 0),
(77, 'ET', 'Etiopía', 0),
(78, 'FO', 'Islas Feroe', 0),
(79, 'PH', 'Filipinas', 0),
(80, 'FI', 'Finlandia', 0),
(81, 'FJ', 'Fiyi', 0),
(82, 'FR', 'Francia', 0),
(83, 'GA', 'Gabón', 0),
(84, 'GM', 'Gambia', 0),
(85, 'GE', 'Georgia', 0),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', 0),
(87, 'GH', 'Ghana', 0),
(88, 'GI', 'Gibraltar', 0),
(89, 'GD', 'Granada', 0),
(90, 'GR', 'Grecia', 0),
(91, 'GL', 'Groenlandia', 0),
(92, 'GP', 'Guadalupe', 0),
(93, 'GU', 'Guam', 0),
(94, 'GT', 'Guatemala', 0),
(95, 'GF', 'Guayana Francesa', 0),
(96, 'GN', 'Guinea', 0),
(97, 'GQ', 'Guinea Ecuatorial', 0),
(98, 'GW', 'Guinea-Bissau', 0),
(99, 'GY', 'Guyana', 0),
(100, 'HT', 'Haití', 0),
(101, 'HM', 'Islas Heard y McDonald', 0),
(102, 'HN', 'Honduras', 0),
(103, 'HK', 'Hong Kong', 0),
(104, 'HU', 'Hungría', 0),
(105, 'IN', 'India', 0),
(106, 'ID', 'Indonesia', 0),
(107, 'IR', 'Irán', 0),
(108, 'IQ', 'Iraq', 0),
(109, 'IE', 'Irlanda', 0),
(110, 'IS', 'Islandia', 0),
(111, 'IL', 'Israel', 0),
(112, 'IT', 'Italia', 0),
(113, 'JM', 'Jamaica', 0),
(114, 'JP', 'Japón', 0),
(115, 'JO', 'Jordania', 0),
(116, 'KZ', 'Kazajstán', 0),
(117, 'KE', 'Kenia', 0),
(118, 'KG', 'Kirguistán', 0),
(119, 'KI', 'Kiribati', 0),
(120, 'KW', 'Kuwait', 0),
(121, 'LA', 'Laos', 0),
(122, 'LS', 'Lesotho', 0),
(123, 'LV', 'Letonia', 0),
(124, 'LB', 'Líbano', 0),
(125, 'LR', 'Liberia', 0),
(126, 'LY', 'Libia', 0),
(127, 'LI', 'Liechtenstein', 0),
(128, 'LT', 'Lituania', 0),
(129, 'LU', 'Luxemburgo', 0),
(130, 'MO', 'Macao', 0),
(131, 'MK', 'ARY Macedonia', 0),
(132, 'MG', 'Madagascar', 0),
(133, 'MY', 'Malasia', 0),
(134, 'MW', 'Malawi', 0),
(135, 'MV', 'Maldivas', 0),
(136, 'ML', 'Malí', 0),
(137, 'MT', 'Malta', 0),
(138, 'FK', 'Islas Malvinas', 0),
(139, 'MP', 'Islas Marianas del Norte', 0),
(140, 'MA', 'Marruecos', 0),
(141, 'MH', 'Islas Marshall', 0),
(142, 'MQ', 'Martinica', 0),
(143, 'MU', 'Mauricio', 0),
(144, 'MR', 'Mauritania', 0),
(145, 'YT', 'Mayotte', 0),
(146, 'MX', 'Mexico', 1),
(147, 'FM', 'Micronesia', 0),
(148, 'MD', 'Moldavia', 0),
(149, 'MC', 'Mónaco', 0),
(150, 'MN', 'Mongolia', 0),
(151, 'MS', 'Montserrat', 0),
(152, 'MZ', 'Mozambique', 0),
(153, 'MM', 'Myanmar', 0),
(154, 'NA', 'Namibia', 0),
(155, 'NR', 'Nauru', 0),
(156, 'NP', 'Nepal', 0),
(157, 'NI', 'Nicaragua', 0),
(158, 'NE', 'Níger', 0),
(159, 'NG', 'Nigeria', 0),
(160, 'NU', 'Niue', 0),
(161, 'NF', 'Isla Norfolk', 0),
(162, 'NO', 'Noruega', 0),
(163, 'NC', 'Nueva Caledonia', 0),
(164, 'NZ', 'Nueva Zelanda', 0),
(165, 'OM', 'Omán', 0),
(166, 'NL', 'Países Bajos', 0),
(167, 'PK', 'Pakistán', 0),
(168, 'PW', 'Palau', 0),
(169, 'PS', 'Palestina', 0),
(170, 'PA', 'Panamá', 1),
(171, 'PG', 'Papúa Nueva Guinea', 0),
(172, 'PY', 'Paraguay', 0),
(173, 'PE', 'Perú', 1),
(174, 'PN', 'Islas Pitcairn', 0),
(175, 'PF', 'Polinesia Francesa', 0),
(176, 'PL', 'Polonia', 0),
(177, 'PT', 'Portugal', 0),
(178, 'PR', 'Puerto Rico', 0),
(179, 'QA', 'Qatar', 0),
(180, 'GB', 'Reino Unido', 0),
(181, 'RE', 'Reunión', 0),
(182, 'RW', 'Ruanda', 0),
(183, 'RO', 'Rumania', 0),
(184, 'RU', 'Rusia', 0),
(185, 'EH', 'Sahara Occidental', 0),
(186, 'SB', 'Islas Salomón', 0),
(187, 'WS', 'Samoa', 0),
(188, 'AS', 'Samoa Americana', 0),
(189, 'KN', 'San Cristóbal y Nevis', 0),
(190, 'SM', 'San Marino', 0),
(191, 'PM', 'San Pedro y Miquelón', 0),
(192, 'VC', 'San Vicente y las Granadinas', 0),
(193, 'SH', 'Santa Helena', 0),
(194, 'LC', 'Santa Lucía', 0),
(195, 'ST', 'Santo Tomé y Príncipe', 0),
(196, 'SN', 'Senegal', 0),
(197, 'CS', 'Serbia y Montenegro', 0),
(198, 'SC', 'Seychelles', 0),
(199, 'SL', 'Sierra Leona', 0),
(200, 'SG', 'Singapur', 0),
(201, 'SY', 'Siria', 0),
(202, 'SO', 'Somalia', 0),
(203, 'LK', 'Sri Lanka', 0),
(204, 'SZ', 'Suazilandia', 0),
(205, 'ZA', 'Sudáfrica', 0),
(206, 'SD', 'Sudán', 0),
(207, 'SE', 'Suecia', 0),
(208, 'CH', 'Suiza', 0),
(209, 'SR', 'Surinam', 0),
(210, 'SJ', 'Svalbard y Jan Mayen', 0),
(211, 'TH', 'Tailandia', 0),
(212, 'TW', 'Taiwán', 0),
(213, 'TZ', 'Tanzania', 0),
(214, 'TJ', 'Tayikistán', 0),
(215, 'IO', 'Territorio Británico del Océano Índico', 0),
(216, 'TF', 'Territorios Australes Franceses', 0),
(217, 'TL', 'Timor Oriental', 0),
(218, 'TG', 'Togo', 0),
(219, 'TK', 'Tokelau', 0),
(220, 'TO', 'Tonga', 0),
(221, 'TT', 'Trinidad y Tobago', 0),
(222, 'TN', 'Túnez', 0),
(223, 'TC', 'Islas Turcas y Caicos', 0),
(224, 'TM', 'Turkmenistán', 0),
(225, 'TR', 'Turquía', 0),
(226, 'TV', 'Tuvalu', 0),
(227, 'UA', 'Ucrania', 0),
(228, 'UG', 'Uganda', 0),
(229, 'UY', 'Uruguay', 0),
(230, 'UZ', 'Uzbekistán', 0),
(231, 'VU', 'Vanuatu', 0),
(232, 'VE', 'Venezuela', 1),
(233, 'VN', 'Vietnam', 0),
(234, 'VG', 'Islas Vírgenes Británicas', 0),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', 0),
(236, 'WF', 'Wallis y Futuna', 0),
(237, 'YE', 'Yemen', 0),
(238, 'DJ', 'Yibuti', 0),
(239, 'ZM', 'Zambia', 0),
(240, 'ZW', 'Zimbabue', 0),
(241, 'RD', 'Republica Dominicana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulates`
--

CREATE TABLE `postulates` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_personal` int(50) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `file` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `postulates`
--

INSERT INTO `postulates` (`id`, `nombre`, `apellido`, `telefono_personal`, `email`, `file`, `date`) VALUES
(129, 'GUILLERMO', 'SANCHEZ', 2147483647, 'gsanchez1687@gmail.com', 'GUILLERMO.pdf', '2015-06-17 15:41:48'),
(130, 'GUILLERMO', 'SANCHEZ', 2147483647, 'gsanchez1687@gmail.com', 'GUILLERMO.pdf', '2015-06-17 15:45:13'),
(131, 'GUILLERMO', 'SANCHEZ', 2147483647, 'gsanchez1687@gmail.com', 'GUILLERMO.pdf', '2015-06-17 16:01:21'),
(132, 'isa', 'calderon', 2147483647, 'isa69gmail.com', 'isa.pdf', '2015-06-19 11:58:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`) VALUES
(1, 'Administración De Autotransporte y Logística'),
(2, 'Actuario'),
(3, 'Abogacía/Derecho/Leyes'),
(4, 'Administración de Empresas'),
(5, 'Administración de Empresas de Servicios'),
(6, 'Administración de Empresas Turísticas'),
(7, 'Administración de Hoteles y Restaurantes'),
(8, 'Administración de Negocios Internacionales'),
(9, 'Administración de Predios Agrícolas'),
(10, 'Administración de Ventas'),
(11, 'Administración Empresas en Marketing y Comunicación Digital'),
(12, 'Administración en Producción Gastronómica'),
(13, 'Administración Financiera'),
(14, 'Administración Hotelera Profesional'),
(15, 'Administración Industrial'),
(16, 'Administración Pública'),
(17, 'Administración y Evaluación De Proyectos'),
(18, 'Administración y Producción Agropecuaria'),
(19, 'Agrobiotecnología'),
(20, 'Agronomía'),
(21, 'Análisis de Sistemas / Analista Programador'),
(22, 'Animación Digital'),
(23, 'Antropología'),
(24, 'Arqueología'),
(25, 'Arquitectura'),
(26, 'Arte Dramático / Actuación / Teatro'),
(27, 'Artes / Artes Plásticas / Artes Gráficas'),
(28, 'Asistente de Odontología Dental'),
(29, 'Asistente Ejecutivo'),
(30, 'Asistente Judicial'),
(31, 'Astronomía'),
(32, 'Automatización y Control Industrial'),
(33, 'Auxiliar Paramédico'),
(34, 'Bachiller en Ciencias Religiosas'),
(35, 'Bachillerato en Arte'),
(36, 'Bachillerato en Ciencias'),
(37, 'Bachillerato en Humanidades'),
(38, 'Bacteriología'),
(39, 'Bar Training'),
(40, 'Bibliotecología / Documentación'),
(41, 'Bíoanalisis / Biotecnología Industrial'),
(42, 'Biología'),
(43, 'Biología en Gestión de Recursos Naturales'),
(44, 'Biología Marina'),
(45, 'Bioquímica'),
(46, 'Biotecnología / Bioingeniería'),
(47, 'Caligrafía Pública'),
(48, 'Canto / Interpretación en Canto'),
(49, 'Cartografía'),
(50, 'Chofer / Transporte'),
(51, 'Ciencia Política / Licenciatura en Ciencia Política'),
(52, 'Ciencias Físicas'),
(53, 'Ciencias Hídricas'),
(54, 'Cine / Séptimo Arte'),
(55, 'Clasificación Arancelaria y Despacho Aduanero'),
(56, 'Comercialización'),
(57, 'Comercio Internacional / Comercio Exterior'),
(58, 'Computación e Informática'),
(59, 'Comunicación Audiovisual / Multimedial'),
(60, 'Comunicación Escénica'),
(61, 'Comunicación Social / Empresarial'),
(62, 'Consejería Educacional y Vocacional Enseñanza Básica'),
(63, 'Consejería Educacional y Vocacional Enseñanza Media'),
(64, 'Conservación Industrial de Alimentos por Frío'),
(65, 'Construcción Civil'),
(66, 'Construcciones Metálicas'),
(67, 'Contactología'),
(68, 'Contador Auditor'),
(69, 'Contador General / Contabilidad'),
(70, 'Contador Público y Auditor'),
(71, 'Cosmetología'),
(72, 'Creación e Interpretación Musical'),
(73, 'Danza / Interpretación en Danza'),
(74, 'Decoración de Interiores'),
(75, 'Dibujo de Proyectos de Arquitectura e Ingenieria'),
(76, 'Dibujo Industrial'),
(77, 'Dibujo Técnico'),
(78, 'Dibujo y Proyectos Industriales'),
(79, 'Diplomado'),
(80, 'Dirección de Arte'),
(81, 'Dirección y Producción'),
(82, 'Dirección y Producción de eventos'),
(83, 'Diseño'),
(84, 'Diseño de Interiores / Decoración'),
(85, 'Diseño de Interiores y Mobiliario'),
(86, 'Diseño de Objetos y Ambientes'),
(87, 'Diseño de Vestuario / Textil / Moda'),
(88, 'Diseño Digital'),
(89, 'Diseño Editorial'),
(90, 'Diseño Gráfico'),
(91, 'Diseño Industrial / Dibujo Proyectos'),
(92, 'Diseño y Producción de Areas Verdes'),
(93, 'Diseño y Producción Industrial'),
(94, 'Diseño y Programación Multimedia / Diseño Digital'),
(95, 'Doctorado'),
(96, 'Ecología'),
(97, 'Economía '),
(98, 'Ecoturismo'),
(99, 'Educación Física'),
(100, 'Educación Parvularia / Inicial / Párvulo'),
(101, 'Electricidad'),
(102, 'Electromecánico'),
(103, 'Electrónica'),
(104, 'Electrónica de Sistemas Computarizados'),
(105, 'Enfermería'),
(106, 'Enseñanza Media o Superior'),
(107, 'Escenografía'),
(108, 'Escultura'),
(109, 'Estadísticas'),
(110, 'Estética'),
(111, 'Estudios espaciales'),
(112, 'Farmacia Técnica'),
(113, 'Filosofía'),
(114, 'Finanzas Bancarias / Negocios Internacionales'),
(115, 'Física / Ciencias Físicas'),
(116, 'Fisioterapia'),
(117, 'Fonoaudiología'),
(118, 'Fotografía'),
(119, 'Frigorista Electromecánico'),
(120, 'Fuerzas Armadas / Milicia'),
(121, 'Gasfitería'),
(122, 'Gastronomía / Cocina'),
(123, 'Geofísica'),
(124, 'Geografía'),
(125, 'Geología / Ciencias Geológicas'),
(126, 'Geomensura / Topografía / Agrimensura'),
(127, 'Geoquímica'),
(128, 'Guardia de Seguridad'),
(129, 'Higienista Dental'),
(130, 'Historia / Licenciatura en Historia'),
(131, 'Historia del Arte'),
(132, 'Historia y Geografía'),
(133, 'Hotelería / Administración Hotelera'),
(134, 'Idiomas'),
(135, 'Ilustración Digital'),
(136, 'Informática'),
(137, 'Informática Biomédica'),
(138, 'Ingeniería'),
(139, 'Ingeniería Aerospacial / Aeronáutica'),
(140, 'Ingeniería Agrícola'),
(141, 'Ingeniería Ambiental'),
(142, 'Ingeniería Biomédica'),
(143, 'Ingeniería Bioquímica'),
(144, 'Ingeniería Civil'),
(145, 'Ingeniería Civil Eléctrica / Ingeniería Eléctrica '),
(146, 'Ingeniería Civil Electrónica'),
(147, 'Ingeniería Civil en Electricidad'),
(148, 'Ingeniería Civil en Energías Renovables'),
(149, 'Ingeniería Civil en Informática / Computación'),
(150, 'Ingenieria Civil en Sonido'),
(151, 'Ingeniería Civil Industrial'),
(152, 'Ingeniería Civil Matemática'),
(153, 'Ingeniería Civil Mecánica'),
(154, 'Ingeniería Comercial'),
(155, 'Ingeniería de Bioprocesos'),
(156, 'Ingeniería de Diseño / Automatización Electrónica'),
(157, 'Ingeniería de Ejecución'),
(158, 'Ingeniería de Ejecución en Administración'),
(159, 'Ingeniería de Ejecución en Administración Hotelera'),
(160, 'Ingeniería de Ejecución en Administración Turística'),
(161, 'Ingeniería de Ejecución en Computación e Informática'),
(162, 'Ingeniería de Ejecución en Marketing'),
(163, 'Ingeniería de Ejecución en Mecánica Automotriz y Autotrónica'),
(164, 'Ingeniería de Ejecución en Sonido'),
(165, 'Ingeniería de Ejecución Industrial'),
(166, 'Ingeniería de Información y Control de Gestión'),
(167, 'Ingeniería de Petróleos / Petroquímica'),
(168, 'Ingeniería de Producción'),
(169, 'Ingeniería Diseño de Productos'),
(170, 'Ingeniería Ejecución Administración de Empresas'),
(171, 'Ingeniería Ejecución en Gestión Industrial'),
(172, 'Ingeniería Ejecución Web Manager'),
(173, 'Ingeniería Electrónica'),
(174, 'Ingeniería en Acuicultura / Acuicultura'),
(175, 'Ingeniería en Administración Agroindustrial'),
(176, 'Ingeniería en Administración de Empresas'),
(177, 'Ingeniería en Administración de Operaciones'),
(178, 'Ingeniería en Administración Hotelera Internacional'),
(179, 'Ingeniería en Administración Industrial'),
(180, 'Ingeniería en Agronegocios'),
(181, 'Ingeniería en Agronomía'),
(182, 'Ingeniería en Alimentos'),
(183, 'Ingeniería en Automatización y Control Industrial'),
(184, 'Ingeniería en Automatización y Robótica'),
(185, 'Ingeniería en Aviación Comercial'),
(186, 'Ingeniería en Bioinformática'),
(187, 'Ingenieria en Biotecnología'),
(188, 'Ingenieria en Comercio / Negocio Internacional'),
(189, 'Ingeniería en Computación'),
(190, 'Ingeniería en Conectividad y Redes'),
(191, 'Ingeniería en Construcción'),
(192, 'Ingeniería en Control de Gestión'),
(193, 'Ingeniería en Control e Instrumentación Industrial'),
(194, 'Ingeniería en Deportes'),
(195, 'Ingeniería en Electricidad'),
(196, 'Ingeniería en Estadística'),
(197, 'Ingeniería en Fabricación y montaje Ind.'),
(198, 'Ingeniería en Física'),
(199, 'Ingeniería en Geografía'),
(200, 'Ingeniería en Geomensura'),
(201, 'Ingeniería en Gestión'),
(202, 'Ingeniería en Gestión de Calidad y Ambiente'),
(203, 'Ingeniería en Gestión de Negocios'),
(204, 'Ingeniería en Gestión e Informática'),
(205, 'Ingeniería en Gestión y Control de Calidad'),
(206, 'Ingeniería en Gestión y Desarrollo Tecnológico'),
(207, 'Ingeniería en Industrias de la Madera'),
(208, 'Ingeniería en Informática / Sistemas'),
(209, 'Ingeniería en Logística'),
(210, 'Ingeniería en Mantenimiento Industrial'),
(211, 'Ingeniería en manufactura industrial'),
(212, 'Ingeniería en Maquinaria y Vehículos Automotrices'),
(213, 'Ingeniería en Marina Mercante'),
(214, 'Ingeniería en Mecatrónica'),
(215, 'Ingeniería en Metalmecánica'),
(216, 'Ingeniería en Minas'),
(217, 'Ingeniería en Obras Civiles'),
(218, 'Ingeniería en Prevención de Riesgos'),
(219, 'Ingeniería en procesos de la madera'),
(220, 'Ingeniería en Proyectos Industriales'),
(221, 'Ingeniería en Recursos Naturales Renovables'),
(222, 'Ingeniería en Refrigeración y Climatización'),
(223, 'Ingenieria en RRHH'),
(224, 'Ingeniería en Sonido'),
(225, 'Ingeniería en Telecomunicaciones'),
(226, 'Ingeniería en Transporte'),
(227, 'Ingeniería en transporte marítimo'),
(228, 'Ingeniería en Turismo y Hotelería'),
(229, 'Ingeniería Forestal'),
(230, 'Ingeniería Hidráulica'),
(231, 'Ingeniería Industrial'),
(232, 'Ingeniería Matemáticas'),
(233, 'Ingeniería Mecánica'),
(234, 'Ingeniería Mecánica en Producción Industrial'),
(235, 'Ingeniería Metálica / Metalúrgica'),
(236, 'Ingeniería Pesquera / Cultivos Marinos'),
(237, 'Ingeniería Química'),
(238, 'Ingeniería Textil'),
(239, 'Ingeniero Naval'),
(240, 'Instrumentación Quirúrgica'),
(241, 'Jardinería / Floricultura'),
(242, 'Junior / Cadete / Oficinista'),
(243, 'Kinesiología'),
(244, 'Laboratorio Dental / Mecánica Dental'),
(245, 'Letras'),
(246, 'Licenciatura en Archivología'),
(247, 'Licenciatura en Arte / Bellas Artes'),
(248, 'Licenciatura en Artes Visuales'),
(249, 'Licenciatura en Ciencias Biológicas'),
(250, 'Licenciatura en Ciencias del Medio Ambiente'),
(251, 'Licenciatura en Ciencias Religiosas y Estudios Eclesiásticos'),
(252, 'Licenciatura en Computación'),
(253, 'Licenciatura en Educación / Magisterio'),
(254, 'Licenciatura en Filosofía'),
(255, 'Licenciatura en Física'),
(256, 'Licenciatura en Gestión de Medios y Entretenimiento'),
(257, 'Licenciatura en Literatura / Literatura / Letras'),
(258, 'Licenciatura en Producción de Bio-Imágenes'),
(259, 'Licenciatura en Química'),
(260, 'Licenciatura en Recursos Humanos'),
(261, 'Licenciatura en Seguridad e Higiene en el Trabajo'),
(262, 'Licenciatura en Tecnología educativa'),
(263, 'Licenciatura nivel inicial'),
(264, 'Locución y Conducción de Radio y TV'),
(265, 'Maestría en Dirección Comercial'),
(266, 'Maestro Mayor de Obras'),
(267, 'Magister'),
(268, 'Magister en Ciencias de la Educación'),
(269, 'Manteniemiento de Maquinaria Pesada'),
(270, 'Mantenimiento de Maquinaria de Planta'),
(271, 'Mantenimiento Industrial / Producción Industrial'),
(272, 'Marketing / Mercadotecnia'),
(273, 'Martillero y Corredor Público'),
(274, 'Masoterapia'),
(275, 'Matemática'),
(276, 'Matrón(a)'),
(277, 'Mayordomo'),
(278, 'MBA'),
(279, 'MBA Ejecutivo'),
(280, 'MBA Joven Profesional'),
(281, 'MBA Profesional Internacional'),
(282, 'Mecánica'),
(283, 'Mecánica Automotriz'),
(284, 'Mecánica Industrial'),
(285, 'Mecatrónica'),
(286, 'Medicina'),
(287, 'Medicina Veterinaria'),
(288, 'Metálica y Autopartes'),
(289, 'Meteorología'),
(290, 'Microbiología industrial de alimentos'),
(291, 'Minero Metalúrgico'),
(292, 'Modelista de Vestuario'),
(293, 'Museología'),
(294, 'Música'),
(295, 'Músico - Terapia'),
(296, 'Musicoterapia'),
(297, 'Negocios Internacionales'),
(298, 'Notario Público / Escribano Público'),
(299, 'Nutrición / Nutrición y Dietética'),
(300, 'Nutrición y Alimentación Institucional'),
(301, 'Obstetricia y Puericultura'),
(302, 'Oceanografía'),
(303, 'Odontología'),
(304, 'Oftalmología'),
(305, 'Optica'),
(306, 'Optometría'),
(307, 'Orfebrería / Joyería'),
(308, 'Orientación Familiar'),
(309, 'Paisajismo / Diseño de Paisaje'),
(310, 'Panadero'),
(311, 'Paramédico'),
(312, 'Párvulo'),
(313, 'Pastelería Internacional'),
(314, 'Pedagogía'),
(315, 'Pedagogía Básica / Educación Básica / Primaria'),
(316, 'Pedagogía Educación Media en Lenguaje y Comunicación'),
(317, 'Pedagogía en Biología y Ciencias Naturales'),
(318, 'Pedagogía en Ciencias'),
(319, 'Pedagogía en Cs. Naturales y Física'),
(320, 'Pedagogía en Cs. Naturales y Química'),
(321, 'Pedagogía en Educación Diferencial'),
(322, 'Pedagogía en Educación Física y Deporte'),
(323, 'Pedagogía en Historia / Ciencias Sociales'),
(324, 'Pedagogía en Inglés / Idiomas'),
(325, 'Pedagogía en Lengua Castellana y Comunicación'),
(326, 'Pedagogía en Matemáticas / Computación'),
(327, 'Pedagogía en Música / Arte'),
(328, 'Pedagogía en Religión'),
(329, 'Pedagogía Media / Educación Media / Secundaria'),
(330, 'Pedagogía Media en Religión y Educación Moral'),
(331, 'Peluquería'),
(332, 'Periodismo'),
(333, 'Periodismo Deportivo'),
(334, 'Perito Criminalístico'),
(335, 'Piloto / Aviación'),
(336, 'Pintura'),
(337, 'Podología'),
(338, 'Preparador Físico'),
(339, 'Prevención de Riesgos / Seguridad Industrial'),
(340, 'Procesos Agroindustriales'),
(341, 'Procesos De Producción'),
(342, 'Producción Gastronómica'),
(343, 'Producción Musical'),
(344, 'Programación'),
(345, 'Psicología'),
(346, 'Psicología Clínica'),
(347, 'Psicología Educacional'),
(348, 'Psicología Laboral'),
(349, 'Psicopedagogía / Educación Diferencial'),
(350, 'Publicidad'),
(351, 'Publicidad Profesional Mención Marketing y Medios'),
(352, 'Publicidad Técnica Mención Marketing Promocional'),
(353, 'Puericultura'),
(354, 'Química / Analista Químico'),
(355, 'Química De Materiales'),
(356, 'Química Industrial'),
(357, 'Química Marina'),
(358, 'Química y Farmacia'),
(359, 'Químico Laboratista Industrial'),
(360, 'Recursos Humanos / Relaciones Industriales'),
(361, 'Redes y Comunicación de Datos / Conectividad'),
(362, 'Relaciones del Trabajo'),
(363, 'Relaciones Públicas'),
(364, 'Sacerdocio'),
(365, 'Secretariado'),
(366, 'Secretariado Bilingue'),
(367, 'Servicios  Posventa Área Automotriz'),
(368, 'Servicios Domésticos'),
(369, 'Sevicios Domésticos / Empleada Doméstica'),
(370, 'Sistemas de Gestión de la Calidad'),
(371, 'Sociología'),
(372, 'Técnico / Tecnólogo / Técnico Superior'),
(373, 'Técnico Agrícola'),
(374, 'Técnico AudioVisual'),
(375, 'Técnico Cinematográfico'),
(376, 'Técnico Control de producción industrial'),
(377, 'Técnico de Nivel Sup. en Contacto con la Naturaleza y Deporte Aventura'),
(378, 'Técnico de Nivel Sup. en Guía Turístico en la Naturaleza'),
(379, 'Técnico de Nivel Superior en Actividad Física y Deportes'),
(380, 'Técnico de Nivel Superior en Administración de Empresas'),
(381, 'Técnico de Nivel Superior en Administración de Negocios Gastronómicos'),
(382, 'Técnico de Nivel Superior en Bioprocesos Industriales'),
(383, 'Técnico de Nivel Superior en Computación'),
(384, 'Técnico de Nivel Superior en Organización y Producción de Eventos'),
(385, 'Técnico de Nivel Superior en Sonido'),
(386, 'Técnico de Nivel Superior en Vitivinicultura y Enología'),
(387, 'Técnico de RadioDiagnóstico y Radioterapia'),
(388, 'Técnico Deportivo'),
(389, 'Técnico en Administración de Recursos Humanos'),
(390, 'Técnico en Arte y Gestión Cultural'),
(391, 'Técnico en Climatización'),
(392, 'Técnico en Comunicación para las Organizaciones Sociales'),
(393, 'Técnico en control de calidad'),
(394, 'Técnico en Diseño de Espacios y Equipamientos'),
(395, 'Técnico en Diseño editorial'),
(396, 'Técnico en Diseño Gráfico'),
(397, 'Técnico en Economía y Administración de la pequeñas y mediana empresa'),
(398, 'Técnico en Edificación'),
(399, 'Técnico en Electricidad'),
(400, 'Técnico en Electricidad Industrial'),
(401, 'Técnico en Enfermería'),
(402, 'Técnico en Fabricación y montaje Industrial'),
(403, 'Técnico en Geomensura'),
(404, 'Técnico en Gestión y Control de calidad'),
(405, 'Técnico en Logística'),
(406, 'Técnico en Mantención'),
(407, 'Técnico en Matricería'),
(408, 'Técnico en Medio Ambiente'),
(409, 'Técnico en Metalmecánica'),
(410, 'Técnico en Obras civiles'),
(411, 'Técnico en Oleohidráulica y Neumática'),
(412, 'Técnico en óptica'),
(413, 'Técnico en Planificación Vial'),
(414, 'Técnico en Prevención de Riesgos'),
(415, 'Técnico en Procesos de la madera'),
(416, 'Técnico en Producción y realización de medios masivos'),
(417, 'Técnico en Refrigeración'),
(418, 'Técnico en Restauración'),
(419, 'Técnico en Salud Natural y Terapias Complementarias'),
(420, 'Técnico en Soporte Computacional'),
(421, 'Técnico en Topografia'),
(422, 'Técnico en Trabajo Social'),
(423, 'Técnico en Tránsito y Transporte'),
(424, 'Técnico Financiero'),
(425, 'Técnico Jurídico'),
(426, 'Técnico Marino'),
(427, 'Técnico Nivel Medio Naval'),
(428, 'Técnico Nivel Superior Naval'),
(429, 'Técnico Productor en Medios Visuales'),
(430, 'Técnico Profesional Archivero'),
(431, 'Técnico Superior en Administración Agrícola'),
(432, 'Técnico Superior en administración cooperativa y mutual'),
(433, 'Técnico Superior en Bromatología'),
(434, 'Técnico Veterinario'),
(435, 'Tecnología en gestión Forestal'),
(436, 'Tecnología en Metalurgia'),
(437, 'Técnología en Minería'),
(438, 'Tecnología en Minería y Metalurgía'),
(439, 'Tecnología en Recursos del Mar'),
(440, 'Tecnología en Sonido'),
(441, 'Tecnología Forestal'),
(442, 'Tecnología Industrial de alimentos del mar'),
(443, 'Tecnología Industrial de la madera'),
(444, 'Tecnología Industrial de los alimentos'),
(445, 'Tecnología Médica'),
(446, 'Tecnología Pecuaria'),
(447, 'Tecnologías De La Información y Comunicación'),
(448, 'Tecnólogo / Técnico Control Industrial'),
(449, 'Tecnólogo / Técnico en alimentos'),
(450, 'Tecnólogo / Técnico en Construcción'),
(451, 'Telecomunicaciones'),
(452, 'Teología'),
(453, 'Terapia Física'),
(454, 'Terapia Ocupacional'),
(455, 'Trabajo Social / Servicio Social'),
(456, 'Traducción / Intérprete'),
(457, 'Tripulante de Cabina / Azafata(o)'),
(458, 'Turismo  / Administración en Turismo'),
(459, 'Turismo de Aventura'),
(460, 'Turismo Técnico Mención Empresas de Viajes'),
(461, 'Turismo Técnico Mención Tráfico y Carga Aérea'),
(462, 'Urbanismo'),
(463, 'Venta y Publicidad'),
(464, 'Zootecnia / Zoología'),
(465, 'Relaciones Internacionales'),
(466, 'Técnico en Administración de Programas Sociales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles`
--

CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`) VALUES
(3, 'Sanchez', 'Guillermo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles_fields`
--

CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(3, NULL, 'gsanchez1687', '4c7d0598ef004868dcf8d099546cd417', 'gsanchez1687@gmail.com', '04264061970', 'Caracas', 'c3dd7fcda89c2dc3814fc9a897d3d39d', '2015-06-26 14:26:30', '2023-03-14 20:37:59', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tag` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `proposito` text COLLATE utf8_spanish_ci NOT NULL,
  `funcion` text COLLATE utf8_spanish_ci NOT NULL,
  `formacion` text COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `experiencia` text COLLATE utf8_spanish_ci NOT NULL,
  `habilidad` text COLLATE utf8_spanish_ci NOT NULL,
  `beneficio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `cantidad_vacante` int(2) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `tiempo_experiencia` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad_min` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad_max` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `salario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `departamento_id`, `pais_id`, `titulo`, `slug`, `tag`, `descripcion`, `proposito`, `funcion`, `formacion`, `conocimiento`, `experiencia`, `habilidad`, `beneficio`, `fecha_contratacion`, `cantidad_vacante`, `genero_id`, `tiempo_experiencia`, `edad_min`, `edad_max`, `salario`, `activo`, `prioridad`, `creado`, `modificado`) VALUES
(1, 30, 232, 'EJECUTIVO DE VENTAS DE CONSUMIBLES', 'ejecutivo-de-ventas-de-consumibles', 'ventas ejecutivo', '<p><strong>Empresa L&iacute;der en su Rubro se encuentra en la b&uacute;squeda de 4 ejecutivos de Ventas: REPORTA A: DIRECCI&Oacute;N COMERCIAL</strong></p>', '<p>Administrar y manejar las cuentas garantizando crecimiento sostenible con eficiencia y rentabilidad de una l&iacute;nea de producto de la empresa.</p>', '<p>1. Responsable por la relaci&oacute;n con el cliente.</p><p>2. Identificar/Prospectar oportunidades de negocios con nuevos clientes.</p><p>3. Generar/Hacer presentaciones de producto y workshops para clientes.</p><p>4. Generar/Hacer reportes semanales.</p><p>5. Seguimiento organizado y sistem&aacute;tico del proceso de ventas para garantizar las metas solicitadas.</p><p>6. Auto capacitaci&oacute;n constante de las pol&iacute;ticas y procesos de los productos.</p>', '<p>Preferentemente T&eacute;cnico Profesional en curso.</p>', '<p><strong>Computaci&oacute;n</strong>: B&aacute;sico.</p><p><strong>Edad</strong>: 20 - 45 a&ntilde;os.</p><p><strong>Sexo</strong>: Indistinto.</p>', '<p>1. M&iacute;nima 12 meses en venta de suministros gen&eacute;ricos o compatibles, sistemas continuos; componentes para recarga de suministros y/o funciones similares o en departamentos comerciales.</p><p>2. Manejo de cartera de clientes.</p>', '<p>1. Persona con perfil de ventas.</p><p>2. Excelente dicci&oacute;n.</p><p>3. Trabajo en equipo.</p><p>4. Organizado y Sistem&aacute;tico (trabajo en procesos).</p><p>5. Pro Activo.</p><p>6. Orientado a resultados.</p><p>7. Capaz de efectuar su trabajo sin supervisi&oacute;n directa (independiente).</p><p>8. Responsable.</p><p>9. Habilidad para trabajar bajo presi&oacute;n.</p><p>10. Facilidad para interrelacionarse en diferentes niveles socio-econ&oacute;micos (comunicaci&oacute;n). 11. Orientaci&oacute;n al cliente.</p>', '<p>Sueldo base Atractivo al mercado. Comisiones atractivas. Bonos por cumplimiento de objetivos. Asignaci&oacute;n de movilidad por visitas a clientes.</p>', '2015-07-02', 88, 4, '2', '20', '45', 'A Convenir', 1, 0, '2015-06-16 00:00:00', '2016-02-05 15:38:52'),
(2, 30, 146, 'EJECUTIVO DE VENTAS DE IMPRESORAS (TéRMICAS, MATRIZ DE PUNTOS, DE ETIQUETAS)', 'ejecutivo-de-ventas-de-impresoras-termicas-matriz-de-puntos-de-etiquetas', 'ejecutivo ventas', '<p><strong>Empresa L&iacute;der en su Rubro se encuentra en la b&uacute;squeda de 4 ejecutivos de Ventas: REPORTA A: DIRECCI&Oacute;N COMERCIAL</strong></p>', '<p>Administrar y manejar las cuentas garantizando crecimiento sostenible con eficiencia y rentabilidad de una l&iacute;nea de producto de la empresa.</p>', '<p>1. Responsable por la relaci&oacute;n con el cliente.</p><p>2. Identificar/Prospectar oportunidades de negocios con nuevos clientes.</p><p>3. Generar/Hacer presentaciones de producto y workshops para clientes.</p><p>4. Generar/Hacer reportes semanales.</p><p>5. Seguimiento organizado y sistem&aacute;tico del proceso de ventas para garantizar las metas solicitadas.</p><p>6. Auto capacitaci&oacute;n constante de las pol&iacute;ticas y procesos de los productos.</p>', '<p>Preferentemente T&eacute;cnico Profesional en curso.</p>', '<p><strong>Computaci&oacute;n</strong>: B&aacute;sico.</p><p><strong>Edad</strong>: 20 - 45 a&ntilde;os.</p><p><strong>Sexo</strong>: Indistinto.</p>', '<p>1. M&iacute;nima 12 meses en venta de suministros gen&eacute;ricos o compatibles, sistemas continuos; componentes para recarga de suministros y/o funciones similares o en departamentos comerciales.</p><p>2. Manejo de cartera de clientes.</p>', '<p>1. Persona con perfil de ventas.</p><p>2. Excelente dicci&oacute;n.</p><p>3. Trabajo en equipo.</p><p>4. Organizado y Sistem&aacute;tico (trabajo en procesos).</p><p>5. Pro Activo.</p><p>6. Orientado a resultados.</p><p>7. Capaz de efectuar su trabajo sin supervisi&oacute;n directa (independiente).</p><p>8. Responsable.</p><p>9. Habilidad para trabajar bajo presi&oacute;n.</p><p>10. Facilidad para interrelacionarse en diferentes niveles socio-econ&oacute;micos (comunicaci&oacute;n).</p><p>11. Orientaci&oacute;n al cliente.</p>', '<p>Sueldo base Atractivo al mercado. Comisiones atractivas. Bonos por cumplimiento de objetivos. Asignaci&oacute;n de movilidad por visitas a clientes.</p>', '2015-07-02', 4, 4, '2', '20', '45', 'A Convenir', 1, 0, '2015-06-11 00:00:00', '2016-02-05 15:38:52'),
(3, 26, 146, 'INGENIERO O ARQUITECTO - ASISTENTE DE PROYECTOS DE ILUMINACION', 'ingeniero-o-arquitecto-asistente-de-proyectos-de-iluminacion', 'arquitecto iluminacion ingeniero', '<p><strong>REPORTA A: Gerencia de soporte T&eacute;cnico</strong></p>', '<p>Cumplir en tiempo y forma con todas las tareas asignadas por el &aacute;rea</p>', '<p>1. Realizar el an&aacute;lisis y dise&ntilde;o, as&iacute; como las simulaciones por medio del Dialux EVO de los proyectos de iluminaci&oacute;n que se soliciten</p><p>2. Llevar un control de los proyectos realizados.</p><p>3. Hacer levantamientos de proyectos de iluminaci&oacute;n con los clientes.</p><p>4. Probar e instalar las luminarias con tecnolog&iacute;a led, as&iacute; como efectuar instalaciones el&eacute;ctricas.</p><p>5. Apoyar a la supervisi&oacute;n de salidas y entradas del inventario.</p>', '<p>Preferentemente Licenciatura o Ingenier&iacute;a</p>', '<p>Dialux. Autocad. Microsoft office.</p><p><strong>Edad</strong>: 22 - 30 a&ntilde;os.</p><p><strong>Sexo</strong>: Indistinto.</p>', '<p>1. M&iacute;nima de un a&ntilde;o con conocimiento de Dialux y Autocad, Tecnolog&iacute;a led, L&aacute;mparas de alumbrado p&uacute;blico, Comercial, e industrial.</p>', '<p>Proactivo: Impulsa al cambio de mejoras, sabe el sentido de la urgencia. Autodidacta: Investigar por su propia cuenta, cualquier tema que se desconozca relacionado con la iluminaci&oacute;n, tecnolog&iacute;a Led, normas, estudios fotom&eacute;tricos, caracter&iacute;sticas de las luminarias de Sonaray y de la competencia, etc. Organizado Actitud de servicio Responsable</p>', '<p>Salario atractivo. Prestaciones de Ley. Capacitaciones.</p>', '2015-07-02', 4, 4, '2', '22', '30', 'A Convenir', 1, 0, '2015-06-11 00:00:00', '2016-02-05 15:38:51'),
(4, 30, 146, 'EJECUTIVO DE VENTAS DE LÁMPARAS CON TECNOLOGÍA LED', 'ejecutivo-de-ventas-de-lamparas-con-tecnologia-led', 'led lamparas', '<p><strong>Empresa L&iacute;der en su Rubro se encuentra en la b&uacute;squeda de 4 ejecutivos de Ventas: REPORTA A: DIRECCI&Oacute;N COMERCIAL</strong></p>\r\n', '<p>Administrar y manejar las cuentas garantizando crecimiento sostenible con eficiencia y rentabilidad de una l&iacute;nea de producto de la empresa.</p>', '<p>1. Responsable por la relaci&oacute;n con el cliente.</p><p>2. Identificar/Prospectar oportunidades de negocios con nuevos clientes. 3. Generar/Hacer presentaciones de producto y workshops para clientes.</p><p>4. Generar/Hacer reportes semanales.</p><p>5. Seguimiento organizado y sistem&aacute;tico del proceso de ventas para garantizar las metas solicitadas.</p><p>6. Auto capacitaci&oacute;n constante de las pol&iacute;ticas y procesos de los productos.</p>', '<p>Preferentemente Licenciatura o T&eacute;cnico Profesional en curso.</p>', '<p><strong>Computaci&oacute;n</strong>: B&aacute;sico.</p><p><strong>Edad</strong>: 20 - 45 a&ntilde;os. <strong>Sexo</strong>: Indistinto.</p>', '<p>1. M&iacute;nima 12 meses en venta de l&aacute;mparas de alumbrado p&uacute;blico, comercial e industrial y/o funciones similares o en departamentos comerciales.</p><p>2. Manejo de cartera de clientes.</p>', '<p>1. Persona con perfil de ventas.</p><p>2. Excelente dicci&oacute;n.</p><p>3. Trabajo en equipo.</p><p>4. Organizado y Sistem&aacute;tico (trabajo en procesos).</p><p>5. Pro Activo.</p><p>6. Orientado a resultados.</p><p>7. Capaz de efectuar su trabajo sin supervisi&oacute;n directa (independiente).</p><p>8. Responsable.</p><p>9. Habilidad para trabajar bajo presi&oacute;n.</p><p>10. Facilidad para interrelacionarse en diferentes niveles socio-econ&oacute;micos (comunicaci&oacute;n).</p><p>11. Orientaci&oacute;n al cliente.</p>', '<p>Sueldo base Atractivo al mercado. Comisiones atractivas. Bonos por cumplimiento de objetivos Asignaci&oacute;n de movilidad por visitas a clientes. Valores agregados:</p><p>1. Posibilidades de crecimiento personal y ascensos</p><p>2. Capacitaciones peri&oacute;dicas. 3. Posibilidades de viajes.</p>', '2015-07-07', 4, 4, '2', '20', '45', 'A Convenir', 1, 1, '2015-06-18 14:51:00', '2016-02-05 15:38:50'),
(5, 25, 232, 'Desarrollador web', 'desarrollador-web', 'php,informatica', '<p>se solicita desarrollador web para las paginas de la empresa</p>\r\n', '', '', '', '', '', '', '', '2016-02-03', 1, 1, '2', '20', '30', '10000', 1, 1, '2016-02-03 14:15:35', '2016-02-05 15:38:50'),
(6, 17, 29, 'Almacenista vendedor - Vendedor y Atención al Publico en Distrito Capital - Grupo Target Movil II', 'almacenista-vendedor-vendedor-y-atencion-al-publico-en-distrito-capital-grupo-target-movil-ii', 'ventas, vendedor, atencion al publico, distrito capital', '<h3>Descripci&oacute;n</h3>\r\n\r\n<ul>\r\n	<li>Distinguida compa&ntilde;&iacute;a solicita vendedores con experiencia en atenci&oacute;n al publico para trabajar en una de sus tiendas de tecnolog&iacute;a ubicada en el centro de Caracas.</li>\r\n	<li>Cantidad de Vacantes: 3</li>\r\n</ul>\r\n', '', '', '', '', '', '', '', '2016-02-05', 1, 1, '1', '', '', '1', 1, 0, '2016-02-05 10:53:18', '2016-02-05 15:38:49'),
(7, 21, 146, 'Analista de administración de ventas en Carabobo - Oxicorte de mexico', 'analista-de-administracion-de-ventas-en-carabobo-oxicorte-de-mexico', 'mexico, ventas, administracion', '<p>Facturaci&oacute;n Atenci&oacute;n Telef&oacute;nica Cuadre de caja Manejo de punto de Venta, Efectivo, cheque, Responsable, Puntual, Ordenada Manejo de informaci&oacute;n confidencial, excelente vocabulario<br />\r\nRelaciones interpersonales<br />\r\nControl de emociones.<br />\r\n&bull; Fecha de Contrataci&oacute;n: 15/02/2016<br />\r\n&bull; Cantidad de Vacantes: 1</p>\r\n', '', '', '', '', '', '', '', '2016-02-05', 2, 4, '5', '', '', 'A convenir', 1, 1, '2016-02-05 11:01:42', '2023-03-14 12:53:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo_postulantes`
--

CREATE TABLE `trabajo_postulantes` (
  `id` int(11) NOT NULL,
  `trabajo_id` int(11) NOT NULL,
  `postulante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajo_postulantes`
--

INSERT INTO `trabajo_postulantes` (`id`, `trabajo_id`, `postulante_id`) VALUES
(1, 1, 130);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulates`
--
ALTER TABLE `postulates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varname` (`varname`,`widget`,`visible`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status` (`status`),
  ADD KEY `superuser` (`superuser`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `departamento_id` (`departamento_id`),
  ADD KEY `pais_id` (`pais_id`);

--
-- Indices de la tabla `trabajo_postulantes`
--
ALTER TABLE `trabajo_postulantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`postulante_id`),
  ADD KEY `trabajo_id` (`trabajo_id`),
  ADD KEY `postulante_id` (`postulante_id`),
  ADD KEY `trabajo_id_2` (`trabajo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `postulates`
--
ALTER TABLE `postulates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT de la tabla `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `trabajo_postulantes`
--
ALTER TABLE `trabajo_postulantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `trabajos_ibfk_4` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `trabajos_ibfk_5` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `trabajo_postulantes`
--
ALTER TABLE `trabajo_postulantes`
  ADD CONSTRAINT `trabajo_postulantes_ibfk_1` FOREIGN KEY (`trabajo_id`) REFERENCES `trabajos` (`id`),
  ADD CONSTRAINT `trabajo_postulantes_ibfk_2` FOREIGN KEY (`postulante_id`) REFERENCES `postulates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
