-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 10:08 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
  `usuario_nombre` varchar(25) DEFAULT NULL,
  `usuario_usuario` varchar(75) NOT NULL DEFAULT '',
  `usuario_clave` varchar(50) NOT NULL,
  `usuario_empresa` varchar(75) DEFAULT NULL,
  `usuario_email` varchar(75) DEFAULT NULL,
  `usuario_telefono` varchar(25) DEFAULT NULL,
  `usuario_fax` varchar(25) DEFAULT NULL,
  `usuario_direccion` tinytext,
  `usuario_idioma` varchar(12) DEFAULT NULL,
  `usuario_site` varchar(10) NOT NULL DEFAULT 'TEAM',
  `usuario_tire_shipping_comment` text,
  `usuario_batery_shipping_comment` text,
  `usuario_total_visitas` int(10) UNSIGNED DEFAULT '0',
  `usuario_acuerdo` tinyint(4) DEFAULT '0',
  `pais_id` smallint(6) NOT NULL DEFAULT '0',
  `usuario_llanta` char(3) DEFAULT '0',
  `usuario_bateria` char(3) DEFAULT '0',
  `usuario_afiliado_lite` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_usuario`, `usuario_clave`, `usuario_empresa`, `usuario_email`, `usuario_telefono`, `usuario_fax`, `usuario_direccion`, `usuario_idioma`, `usuario_site`, `usuario_tire_shipping_comment`, `usuario_batery_shipping_comment`, `usuario_total_visitas`, `usuario_acuerdo`, `pais_id`, `usuario_llanta`, `usuario_bateria`, `usuario_afiliado_lite`) VALUES
(6080, 'PAN - AHMAD AWWAD', 'auto_dk@hotmail.com', 'Ahma2108', 'Auto DK', 'auto_dk@hotmail.com', '(507)774-7426', '', 'Via Interamericana\r\nDavid, Chiriqui', 'spanish', 'TEAM', '', '', 0, 0, 167, 'YES', 'NO', 'NO'),
(6124, 'FIJ - Surendra Prasad', 'surensonu@yahoo.com', 'Sure2016', 'Prasad\'s Tyre', 'surensonu@yahoo.com', '', '', '', 'english', 'TEAM', '', '', 0, 0, 73, 'YES', 'NO', 'NO'),
(6128, 'MAL - Kah Siong Law', 'wheeltraktyresbtu@gmail.com', 'Kah2016', 'WHEELTRAK TYRES (BTU) SDN. BHD.', 'wheeltraktyresbtu@gmail.com', '', '', '', 'english', 'TEAM', '', '', 0, 1, 131, 'YES', 'NO', 'NO'),
(6129, 'UNI - Bassam AL Kabra', 'bk-goodyear@hotmail.com', 'Bass2016', 'WWT', 'bk-goodyear@hotmail.com', '', '', '', 'english', 'TEAM', '', '', 0, 1, 225, 'YES', 'NO', 'NO'),
(6200, 'USA - Joseph Arisso', 'jarisso@gmhco.com', 'jose5749', 'Global Material Handling Corp. (GMH)', 'jarisso@gmhco.com', '(305) 608-5749', '', '7750 NW 46th Street\r\nMiami, FL 33166', 'spanish', 'TEAM', '', '', 0, 1, 1, 'YES', 'NO', 'NO'),
(6245, 'PER - Ricardo Ramirez', 'brandtires@outlook.es', 'Rica2156', 'Brand Tires', 'brandtires@outlook.es', '8542156', '930956036', '', 'spanish', 'TEAM', '', '', 0, 0, 170, 'YES', 'NO', 'NO'),
(6379, 'Abdiel Bonilla', 'centrodist@autocentro.com.pa', 'Abdi3241', 'AUTO CENTRO S.A', 'centrodist@autocentro.com.pa', '(507) 217-2033', '', '', 'spanish', 'TEAM', '', '', 0, 0, 167, 'YES', 'NO', 'NO'),
(6304, 'PAR - Jose Acosta', 'comercial@mariamlubricantes.com', 'jose4599', 'MARIAM LUBRICANTES  S.R.L.', 'comercial@mariamlubricantes.com', '(595) 21 754 599', '', '', 'spanish', 'TEAM', '', '', 0, 1, 169, 'YES', 'NO', 'NO'),
(6354, 'ECU - Alexandra Huayamave', 'alexa54@msn.com', 'Alex0656', 'KEYTEL S.A.', 'alexa54@msn.com', '593042130656', '', 'AV. DE LAS AMERICAS 13-14 y FRENTE A SUPERMERCADOS AVICOLA FERNANDEZ sector', 'spanish', 'TEAM', '', '', 0, 0, 64, 'YES', 'NO', 'NO'),
(6562, 'ECU - Luis Romero', 'luis.romero@almacenesmym.com', 'luis7826', 'Almacenes MYM', 'luis.romero@almacenesmym.com', '(593) 980907826', '', '', 'spanish', 'TEAM', '', '', 2, 1, 64, 'YES', 'NO', 'NO'),
(6486, 'Miguel Massaro', 'Ciclomotosojeda@yahoo.com', 'Mig9339', 'Ciclo Motos Ojeda', 'Ciclomotosojeda@yahoo.com', '5802656319339', '', 'Ciudad Ojeda, Av. Intercomunal, Local S/N, Sector Las Morochas', 'spanish', 'TEAM', '', '', 0, 1, 233, 'YES', 'NO', 'NO'),
(6554, 'PTY - Fabio Perez', 'fabioperez@mphmotopartes.com', 'fb0507', 'Moto Partes Mph S.A.', 'jibarra@duratread.com', '507 264-2901', '507 391-3599', 'Panama Albrook', 'spanish', 'TEAM', '', '', 0, 0, 167, 'NO', 'NO', 'NO'),
(5984, 'Gaston Aguilar', 'gaguilar', 'Cctinc2012', 'TEAM GROUP', 'gaguilar@teamgroup.biz', '(507) 265 3508', '(507) 265 3243', 'Plaza La Boca, Panama City, Rep. de Panama', 'spanish', 'TEAM', '', '', 108, 1, 167, 'YES', 'NO', 'YES'),
(6535, 'COL - Jose Oliveiro Bocan', 'job01', 'josolv', 'Master Llantas', 'oliverioleather77@hotmail.com', '57-317-893-6062', '', 'Carrera 29c No. 20-46 Sur, BogotÃ¡, Colombia', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6011, 'ECU - Guillermo Jarrin', 'cauchosierra593admin', '2831csec', 'Reencauchadora De La Sierra', 'gjarrin@cauchosierra.com', '02 2406151 ', '', '\"Av. El Inca 1890 entre Izazaga e Isla Seymour\r\nTel. 02 2406151 / 2406559 /09 99706050\r\nQuito - Ecuador\r\n\"', 'spanish', 'TEAM', '', '', 9, 1, 64, 'YES', 'NO', 'NO'),
(6021, 'DOM - administrador', 'yuriko809admin', '3163yurp', 'Yuriko Investment SRL', 'mjoa2509@yahoo.es', '18094881987', '', 'Ave. RÃ³mulo Betancourt #508, entre Caonabo y San PÃ­o\r\nSanto Domingo', 'spanish', 'TEAM', '', '', 3, 1, 63, 'YES', 'NO', 'NO'),
(6541, 'COL - Rodney Ballen', 'rodneyballen@gmail.com', 'colo4569', 'Rodney Ballen', 'rodnyballen@gmail.com', '(57) 3209081265', '', 'Bogota', 'spanish', 'TEAM', '', '', 1, 1, 49, 'YES', 'NO', 'YES'),
(6025, 'Master Tires S.A.C.', 'mastertires51admin', '2582mtpe', 'MASTER TIRES S.A.C.', 'jreina@mastertires.pe', '998733316', '', 'Calle Los Antares 320 Torre A Oficina 909 Urb. Alborada, Santiago de Surco - Lima, PerÃº.', 'spanish', 'TEAM', '', '', 6, 1, 170, 'YES', 'NO', 'NO'),
(6027, 'PER - JUAN BUSTIOS', 'jbustios@llantamax.pe', 'Juan4600', 'Llantamax SAC', 'jbustios@llantamax.pe', '948874600', '', 'Av. Alfredo Mendiola 7002 Int 10 / Urb Pro San martin de Porres', 'spanish', 'TEAM', '', '', 0, 1, 170, 'YES', 'NO', 'NO'),
(5977, 'Laurence Turnbull', 'laurenceuser', '1322alan', 'TEAM GROUP', 'lturnbull@duratread.com', '(507) 265 3508', '(507) 265 3243', 'Ancon, La Boca', 'english', 'TEAM', '', '', 28, 1, 167, 'YES', 'YES', 'YES'),
(6039, 'COL - Nestor Melo', 'servymaqcomercial1@gmail.com', 'nest6019', 'SERVYMAQ S.A.S.', 'servymaqcomercial1@gmail.com', '(57) 314 4526019', '', 'Calle 23 G #109-82. Fontibon Versalles.', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6048, 'COL - GUSTAVO A SANCHEZ', 'gsanchez@llantassagusa.com', 'Gust1921', 'Llantas e Importaciones Sagu S.A.S', 'gsanchez@llantassagusa.com', '5714102528', '', 'Carrera 73 A No. 52 A 37/43. BogotÃ¡, Colombia.', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6049, 'BOL - RAFAEL MALDONADO', 'megacaucholpz@hotmail.com', 'Rafa4877', 'Megacaucho', 'megacaucholpz@hotmail.com', '591 76724877', '', 'Av. 6 de Marzo, entre calles 121 y 122 No. 45, Zona Villa Bolivar B', 'spanish', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6052, 'ARG - Gustavo Bignasco', 'gustavo@larocca.com.ar', 'gust1337', 'LAROCCA NEUMATICOS S.A.', 'gustavo@larocca.com.ar', '(54) 15 5003 1337', '', 'Av. Eva Peron 2242\r\nC1406HMK\r\nBuenos Aires', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6065, 'BOL - MILTON ARGOÃ‘A', 'Recabol_oruro@hotmail.com', 'Milt9881', 'Recabol', 'Recabol_oruro@hotmail.com', '72459881', '', 'Proxima direccion: Av. Circunvalacion y Beni', 'spanish', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6073, 'CHI - Fernando Balart Rub', 'fbalart@popayan.cl', 'fern2010', 'Comercial Popayan Ltda', 'fbalart@popayan.cl', '', '', '', 'spanish', 'TEAM', '', '', 0, 1, 45, 'YES', 'NO', 'NO'),
(6075, 'CHI - MAURICIO RUIZ', 'mruiz@irenesa.cl', 'Maur7430', 'Irenesa', 'mruiz@irenesa.cl', '56-2 2520 7430', '', 'Avda. Pdte. Eduardo Frei M. NÂº 3011', 'spanish', 'TEAM', '', '', 0, 0, 45, 'YES', 'NO', 'NO'),
(6086, 'CHI - Rene Alvarez', 'ventas@armstrongltda.cl', 'Rene8506', 'Armstrong Lubricantes ltda.', 'ventas@armstrongltda.cl', '41-288 8506', '', 'Av. Prat 1184', 'spanish', 'TEAM', '', '', 0, 0, 45, 'YES', 'NO', 'NO'),
(6100, 'ARG - administrador', 'gsb54admin', '3080gsar', 'GSB SERVICIOS ESPECIALES SA.', 'repuestoscasacentral@gsb.com.ar', '(54) 11 4846-7000 ', '', 'Colectora Este Km 27.333, Don Torcuato CP B1611GEM\r\nBuenos Aires', 'spanish', 'TEAM', '', '', 1, 1, 12, 'YES', 'NO', 'NO'),
(6106, 'CHI - Miguel Aburto', 'maburto@invlaguna.cl', 'Migu9500', 'INVERSIONES LAGUNA S.A.', 'maburto@invlaguna.cl', '56 2 27339500', '', 'Cerro El Plomo 5630, Of 1703 - Las Conde-Santiago', 'spanish', 'TEAM', '', '', 0, 1, 45, 'YES', 'NO', 'NO'),
(6108, 'ARG - Fabian Gomez Bravo', 'fgomeztiregroup@gmail.com', 'fabi6144', 'AFILIADO ARGENTINA', 'fgomeztiregroup@gmail.com', '(54) 9 264 5066144', '', 'Mendoza 435 norte. San Juan', 'spanish', 'TEAM', '', '', 6, 1, 12, 'YES', 'NO', 'NO'),
(6149, 'BOL - Arvind Sharma', 'asmibha@mibha.com', 'arvi8450', 'Mimex Import Export', 'asmibha@mibha.com', '(56) 956148450', '', '', 'english', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6130, 'DOM - DONATO ANGELASTRO', 'petrostarcaribe.ventas@gmail.com', 'Dona1068', 'PETROSTARCARIBE SRL', 'petrostarcaribe.ventas@gmail.com', '(809)8461068', '', 'Santo Domingo', 'spanish', 'TEAM', '', '', 0, 1, 63, 'YES', 'NO', 'NO'),
(6137, 'COL - Julio Giraldo', 'jgiraldo@redllantas.com', 'Juli8144', 'REDLLANTAS S.A.S', 'jgiraldo@redllantas.com', '4 268 8144', '', 'Transv. Inferior Cra 32 # 1B SUR-51 OF. 429. MedellÃ­n, Colombia.', 'spanish', 'TEAM', '', '', 1, 1, 49, 'YES', 'NO', 'NO'),
(6264, 'VEN - Jose Hernandez', 'awsgroup@gmail.com', 'jose0470', 'AWS Business Group', 'awsgroup@gmail.com', '(58) 412-2255297', '', 'Caracas', 'spanish', 'TEAM', '', '', 0, 1, 233, 'YES', 'NO', 'NO'),
(6158, 'PER - Armando Garzon', 'armando.garzon@megarep.com.pe', 'Arma7000', 'SOLTRAK SAC', 'armando.garzon@soltrak.com.pe', '1 63017000', '', 'Av. Argentina 5799 - C de la Legua / Callao', 'spanish', 'TEAM', '', '', 0, 1, 170, 'YES', 'NO', 'NO'),
(6504, 'PAN jossyibarra', 'jossy', 'nissan', 'cct', 'jibarra@duratread.com', '0', '0', '0', 'english', 'TEAM', '', '', 0, 1, 167, 'YES', 'NO', 'NO'),
(6177, 'COL - Maria Morena', 'maria.morena@ruedasindustriales.com.co', 'Mari0502', 'Ruedas Industriales S.A.S.', 'maria.morena@ruedasindustriales.com.co', '4 262 0502', '', 'Cra 52 NÂº 36-69 / Medellin - Colombia', 'spanish', 'TEAM', '', '', 0, 0, 49, 'YES', 'NO', 'NO'),
(6180, 'DOM - Salvador Depaola', 'salvadorcarmelodp1@hotmail.com', 'salv7240', 'Totalmotos Carabobo C.A / BOMRESET MOTORES SRL', 'salvadorcarmelodp1@hotmail.com', '241 859 7240', '', '', 'spanish', 'TEAM', '', '', 0, 1, 63, 'YES', 'NO', 'NO'),
(6187, 'Jossy Ibarra', 'jibarra@duratread.com', 'Cctinc2012', 'TEAM GROUP', 'jibarra@duratread.com', '(507) 265 3508', '(507) 265 3243', 'Ancon, Ciudad de Panama', 'spanish', 'TEAM', '', '', 7, 1, 167, 'YES', 'NO', 'YES'),
(6186, 'MEX - Ivan Carranza Ramir', 'icarranza@mscentral.com.mx', 'ivan4041', 'MS Central de distribuciones S.A de C.V.', 'icarranza@mscentral.com.mx', '(52) (662) 2 61 40 40', '', 'JesÃºs GarcÃ­a Morales 883, La Manga, 83220 Hermosillo, Son.', 'spanish', 'TEAM', '', '', 0, 1, 140, 'YES', 'NO', 'NO'),
(6198, 'COL - Sergio Villarreal', 'negociosinternacionales@redllantas.com', 'Serg8144', 'REDLLANTAS S.A.S', 'negociosinternacionales@redllantas.com', '4 268 8144', '', 'Transv. Inferior Cra 32 # 1B SUR-51 OF. 429. MedellÃ­n, Colombia.', 'spanish', 'TEAM', '', '', 5, 1, 49, 'YES', 'NO', 'NO'),
(6197, 'MEX - Felix Bailon', 'llanterarunago@hotmail.com', 'feli5085', 'LLANTAS Y SERVICIOS RUNAGO', 'llanterarunago@hotmail.com', '(52) (899) 1295085', '', '', 'spanish', 'TEAM', '', '', 3, 1, 140, 'YES', 'NO', 'NO'),
(6212, 'PAN - Raul Castrellon', 'panamabrands@gmail.com', 'raul4657', 'Brands Corporation, S.A.', 'panamabrands@gmail.com', '(507) 314-1102', '(507) 6257-4657', '', 'spanish', 'TEAM', '', '', 10, 1, 167, 'YES', 'NO', 'NO'),
(6457, 'ARG - Sergio Morello', 'sergiomorello@fibertel.com.ar', 'serg9916', 'Neumaticos Fidelco S.A.', 'sergiomorello@fibertel.com.ar', '(54) 11 4772-9916', '', 'Teodoro Garca 2106 3A. Buenos Aires', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6219, 'BOL - Marcelo Cerna', 'cobocaucho@gmail.com', '3/1/5013', 'COBOCAUCHO IMP EXPORT Ltda.', 'cobocaucho@gmail.com', '+591 4 4445013', '', '', 'spanish', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6225, 'BOL - Grover Pena', 'impsud2001@hotmail.com', 'Grov3298', 'IMPORTADORA DE LLANTAS SUDAMERICANA LTDA.', 'impsud2001@hotmail.com', '591+4+4253298', '', 'Av. Guillermo Killman NÂº 2001 esq. Av. Siles (diagonal a la rontonda del Avion)', 'spanish', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6235, 'ECU - Diego DueÃ±as', 'diego@duenasgutierrez.com', 'Dieg3888', 'EMPROSERVIS CIA. LTDA.', 'diego@duenasgutierrez.com', '3713-888', '', 'AV. QUEVEDO 1229 Y PUERTO ILA KM. 2 VIA QUEVEDO', 'spanish', 'TEAM', '', '', 0, 1, 64, 'YES', 'NO', 'NO'),
(6244, 'PER - Victor Fernando Cal', 'fernandoc900@hotmail.com', 'Vict5357', 'Chinita Parts', 'fernandoc900@hotmail.com', '977505357', '', '', 'spanish', 'TEAM', '', '', 1, 1, 170, 'YES', 'NO', 'NO'),
(6247, 'COL - Luis Arley', 'surtillantasdeloriente@hotmail.com', 'Luis4021', 'Surtillantas del Oriente', 'surtillantasdeloriente@hotmail.com', '098-6564021', '', '', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6251, 'BOL - Jorge Carrasco', 'carrascojorgev@yahoo.com.ar', 'Jorg5738', 'VAL LLANTAS', 'carrascojorgev@yahoo.com.ar', '(591-3) 341 5738', '', 'Av. Cristobal de Mendoza # 1585, 2do anillo Esq Alemana', 'spanish', 'TEAM', '', '', 0, 1, 28, 'YES', 'NO', 'NO'),
(6561, 'MEX - Armando Yanez', 'armando@maquinariayautopartes.com', 'arma1493', 'Maquinaria y Autopartes de Mexico', 'armando@maquinariayautopartes.com', '(52) 5526361493', '', 'Mexico DF', 'spanish', 'TEAM', '', '', 0, 0, 140, 'YES', 'NO', 'NO'),
(6263, 'COL-Jhon Nino', 'gerencia@gnrepresentaciones.co', 'jhon3887', 'GN Representaciones', 'gerencia@gnrepresentaciones.co', '573214493887', '', 'Cra. 28 #68-83, BogotÃ¡', 'spanish', 'TEAM', '', '', 16, 1, 49, 'YES', 'NO', 'NO'),
(6266, 'GUA - administrador', 'vitatrac502admin', '4159vigt', 'Llantas Vitatrac S A (Vitatrac)', 'pserrano@vitatrac.com.gt', '(502) 2 419 3333', '', 'Calzada Aguilar Batres  56-18 zona 11\r\nGuatemala', 'spanish', 'TEAM', '', '', 0, 0, 91, 'YES', 'NO', 'NO'),
(6270, 'COL - Tatiana Franco', 'canaveralejo57admin', '3578acco', 'Agroindustriales Canaveralejo', 'tatiana-franco@agrocanaveralejo.com.co', '(57) 3155585957', '', 'Colombia', 'spanish', 'TEAM', '', '', 4, 1, 49, 'YES', 'NO', 'NO'),
(6285, 'CHI - administrador', 'imoto56admin', '2665imch', 'IMPORTADORA IMOTO S.A.', 'curquizar@imoto.cl', '(56) 2291-67846', '', 'Argomedo 363, Santiago Chile', 'spanish', 'TEAM', '', '', 15, 1, 45, 'YES', 'NO', 'NO'),
(6287, 'SAL - Mauricio Rodriguez', 'mjrodriguez@unillantas.com.sv', 'maur0000', 'Unillantas', 'mjrodriguez@unillantas.com.sv', '50322250000', '', 'Boulevard Los HÃ©roes entre 23 y 25 calle poniente San Salvador, El Salvador, CA.', 'spanish', 'TEAM', '', '', 0, 1, 66, 'YES', 'NO', 'NO'),
(6302, 'Reencafe S.A.', 'reencafe57admin', '2748reco', 'Reencafe S.A.', 'hector.concha@reencafe.com', '  ', '', '', 'spanish', 'TEAM', '', '', 4, 1, 49, 'YES', 'NO', 'NO'),
(6294, 'COL - Jose Oliverio', 'oliverioleather77@hotmail.com', 'oliv3356', 'Master Llantas', 'oliverioleather77@hotmail.com', '3107773356', '', 'Carrera 29 C No. 20-46 Sur', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6503, 'PER - Giuseppe Ascencios', 'giuseppe.ascencios@gmail.com', 'gius1873', 'CORPORACION MIGA SAC', 'giuseppe.ascencios@gmail.com', '(51) 972731873', '', 'Lima', 'spanish', 'TEAM', '', '', 0, 1, 170, 'YES', 'NO', 'NO'),
(6332, 'JJ', 'jjsanchez', '17310226', 'TeamGroup', 'jjsanchez@teamgroup.biz', '62314022', '0', '', 'spanish', 'TEAM', '', '', 14, 1, 167, 'YES', 'YES', 'NO'),
(6538, 'Fernando Almada', 'falmada', 'fernando888', 'OMBU', 'compras@maquinasombu.com.ar', '8008886628', '', '', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6336, 'CHI - Sergio Contreras', 'empresactrdistribucion@gmail.com', 'serg2427', 'Importadora CTR SPA', 'empresactrdistribucion@gmail.com', '(56) 9 56372427', '', 'Napoleon NÂ°3565, Oficina 202 Las Condes Santiago', 'spanish', 'TEAM', '', '', 0, 1, 45, 'YES', 'NO', 'NO'),
(6357, 'VEN - Vicente Larroca', 'enzolarocca4@hotmail.com', 'Enzo4012', 'ERCAPAN Representaciones barum .ca', 'enzolarocca4@hotmail.com', '4144327587', '', 'P.H. 909 - Piso 14, Calle 50', 'spanish', 'TEAM', '', '', 0, 1, 233, 'YES', 'NO', 'NO'),
(6358, 'ARG - Pablo Giaccio', 'ecolforsa@gmail.com', 'pabl5498', 'Ecolfor S.A', 'ecolforsa@gmail.com', '(54) 2262615498', '', '', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6366, 'Suzy Turnbull', 'sturnbull@dmppanama.com', '12345678', 'dmppanama', 'sturnbull@dmppanama.com', '0', '0', '', 'english', 'TEAM', '', '', 1, 1, 7, 'YES', 'NO', 'NO'),
(6372, 'CHI - Carlos del Canto', 'cdelcanto@me.com', 'carl7257', 'Independiente', 'cdelcanto@me.com', '(56) 91617257', '', '', 'spanish', 'TEAM', '', '', 11, 1, 45, 'YES', 'NO', 'NO'),
(6374, 'PAN - Elias Rodriguez', 'multillantas507admin', '3744mupa', 'Multillantas Z/L S.A.', 'erodriguez@multillantaszl.com', '(507) 66774232', '(507) 430-3721', 'France Field Edif. Multillantas. Zona Libre Colon.', 'spanish', 'TEAM', '', '', 3, 1, 167, 'YES', 'NO', 'NO'),
(6376, 'COL - Carlos Malagon', 'gerencia@stallion.com.co', 'Carl2485', 'Stallion S.A.S', 'gerencia@stallion.com.co', '57 315 553 2485', '', 'Calle 25N # 5BN-45; Ofc. 402 Edf. Feglaro', 'spanish', 'TEAM', '', '', 0, 1, 49, 'YES', 'NO', 'NO'),
(6377, 'Ralf', 'Ralf', 'Ralf123', ' ', 'ralf.tenbrink@gmail.com', ' ', '', '', 'english', 'TEAM', '', '', 5, 1, 226, 'YES', 'NO', 'NO'),
(6378, 'PAR - Naida Lacour', 'naida@sunset.com.py', 'naid0127', 'SUNSET-IMPAR', 'naida@sunset.com.py', '(595) 61 500-127', '', 'Paraguay', 'spanish', 'TEAM', '', '', 0, 1, 169, 'YES', 'NO', 'NO'),
(6557, 'CUB - Frank Martinez', 'neumaticos@serenatradinginc.com', 'fran4417', 'SERENA TRADING INC', 'neumaticos@serenatradinginc.com', '537 204 4417', '', '#ra Ave. Esq a 78, Edf Habana. Habana', 'spanish', 'TEAM', '', '', 2, 1, 57, 'YES', 'NO', 'NO'),
(6456, 'VEN - Maria Murgueytio', 'COMPRAS@CAUCHOSAA.COM', 'mari8868', 'Comercializadora Aponte Aponte, C.A.', 'COMPRAS@CAUCHOSAA.COM', '(58) 414 1188868', '', 'San Diego â€“ Edo. Carabobo', 'spanish', 'TEAM', '', '', 1, 1, 233, 'YES', 'NO', 'NO'),
(6416, 'DOM - Javier Polanco', 'moto@ilp.com.do', 'javi5161', 'Importadora La Plaza C por A', 'moto@ilp.com.do', '809-971-5161', '', 'Por A. Calle F No. 3. Cerro Alto, Santiago', 'spanish', 'TEAM', '', '', 0, 1, 63, 'YES', 'NO', 'NO'),
(6417, 'Ricardo Cuevas', 'rcuevas@ciabol.com.bo', 'rica7685', 'CIABOL Ltda', 'rcuevas@ciabol.com.bo', '591 46635858 -103', '', '', 'spanish', 'TEAM', '', '', 2, 1, 28, 'YES', 'NO', 'NO'),
(6555, 'HON - Rodolfo Martinez', 'gerencia@regigante.hn', 'rodo3030', 'Refrillantas', 'gerencia@regigante.hn', '(504) 2227-3030', '', 'Tegucigalpa', 'spanish', 'TEAM', '', '', 0, 0, 97, 'YES', 'NO', 'NO'),
(6558, 'Egy - Youssef Zayed Samaa', 'Yousef.Zayed@mcv-eg.com', 'Yous1210', 'Manufacturing Commercial Vehicles (MCV)', 'Yousef.Zayed@mcv-eg.com', '202 2 65 65 846', '', 'Egypt', 'english', 'TEAM', '', '', 2, 1, 65, 'YES', 'NO', 'NO'),
(6437, 'COS - ROBERTO MARIN', 'rmarin@mayoristadellantas.com', 'ROBE7685', 'MAYORISTA DE LLANTAS', 'rmarin@mayoristadellantas.com', '88672222', '', '', 'spanish', 'TEAM', '', '', 0, 1, 54, 'YES', 'NO', 'NO'),
(6559, 'MEX - Daniel De La Maza', 'grupomaza52admin', 'dani2541', 'Comercial Arredondo S.A. (GRUPO MAZA)', 'mazaroperico@hotmail.com', '(52) 444 818 2541', '', '', 'spanish', 'TEAM', '', '', 1, 1, 140, 'YES', 'NO', 'NO'),
(6560, 'URU - administrador', 'petin598admin', '3080peur', 'Petin S.A.', 'ddaronch@petinsa.com.uy', '(598) 2901 6060', '', 'Paysandu 1440, Montevideo', 'spanish', 'TEAM', '', '', 8, 1, 229, 'YES', 'NO', 'NO'),
(6449, 'PAN - Sarbjit Singh', 'ssingn@grupomelo.com', 'sarb8300', 'Copama, S.A.', 'ssingn@grupomelo.com', '(507) 290 8300', '', 'Via Tocumen frente a Brisas del Golf', 'spanish', 'TEAM', '', '', 0, 1, 167, 'YES', 'NO', 'NO'),
(6466, 'PER - administrador', 'megallantastrujillo51admin', '2914mgpe', 'Megallantas Trujillo EIRL', 'mega_llantas@hotmail.com', '(51) 44 215 270', '', 'Avenida America Sur 291 URB. Andres Razuri', 'spanish', 'TEAM', '', '', 10, 1, 170, 'YES', 'NO', 'NO'),
(6549, 'ECU - Marilyn Sosa', 'msosa@tire-experts.com.ec', 'mari3695', 'NATIONAL TIRE EXPERTS S.A.', 'msosa@tire-experts.com.ec', '(593) 593-23-703695', '', 'Santo Domingo, VÃ­a Quevedo km 2 Â½ y segunda circunvalacion', 'spanish', 'TEAM', '', '', 8, 1, 64, 'YES', 'NO', 'NO'),
(6472, 'Lotour', 'Lotour', 'Lotour2017', 'lotour', 'lturnbull@duratread.com', '0', '0', '', 'english', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6533, 'PER - Jhon Tomas', 'jtv_10@hotmail.com', 'jhon6515', 'Multillantas Thomas Importadores', 'jtv_10@hotmail.com', '(51) 995956515', '', 'Lima', 'spanish', 'TEAM', '', '', 0, 1, 170, 'YES', 'NO', 'NO'),
(6474, 'Redous', 'Redous', 'Redous2017', 'Redous', 'lturnbull@duratread.com', '', '', '', 'spanish', 'TEAM', '', '', 0, 1, 25, 'YES', 'NO', 'NO'),
(6477, 'PAN - administrador', 'tambor507admin', '3910tapa', 'Tambor, S.A.', 'Gcoluche@toyotarp.com', '(507) 210-7000', '', '', 'spanish', 'TEAM', '', '', 1, 1, 167, 'YES', 'NO', 'NO'),
(6544, 'Bruno Raeymakers', 'bruno.raeymaekers@telenet.be', 'brunbelg', 'Andreas & Lancer Pte. Ltd.', 'bruno.raeymaekers@telenet.be', '0', '0', '', 'english', 'TEAM', '', '', 3, 1, 23, 'YES', 'NO', 'NO'),
(6476, 'ARG - Guillermo Leon', 'guillermo.leon@neumaticoscorral.com', 'guil7056', 'Neumaticos Corral', 'guillermo.leon@neumaticoscorral.com', '(54) 9 11 40977056', '', '', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6480, 'PAN - Carlos Martinelli', 'speedservice.cm@gmail.com', 'carl2324', 'Speed Service', 'speedservice.cm@gmail.com', '(507) 66122324', '', 'Ciudad de Panama', 'spanish', 'TEAM', '', '', 0, 1, 167, 'YES', 'NO', 'NO'),
(6483, 'SAL - Ricardo Palma', 'rpalma@gposantacruz.com', 'rica4328', 'Grupo Santa Cruz S.A. de C.V.', 'rpalma@gposantacruz.com', '(503) 78384328', '', '', 'spanish', 'TEAM', '', '', 0, 1, 66, 'YES', 'NO', 'NO'),
(6485, 'URU - Cesar Rodriguez', 'metalrodriguez@yahoo.com.ar', 'cesa2420', 'Amifer S.A.', 'metalrodriguez@yahoo.com.ar', '(598) 43202420', '', 'Ruta 67 Km. 32.500 - Sauce, Canelones.', 'spanish', 'TEAM', '', '', 0, 1, 229, 'YES', 'NO', 'NO'),
(6487, 'PER - administrador', 'geiser51admin', '3827gepe', 'Geiser Servicios y Logistica SAC', 'esther.carrion@nagasco.com.pe', '51 1 3262533', '', 'Av Mariscal Eloy Ureta 191, Distrito de Lima 15022,', 'spanish', 'TEAM', '', '', 1, 1, 170, 'YES', 'NO', 'NO'),
(6490, 'PER - Rodolfo Ocana', 'Rodolfo.ocana @orica.com', 'Rodo6000', 'Orica Mining Services Peru S.A.', 'Rodolfo.ocana @orica.com', '51 217 6000', '', 'Lima', 'spanish', 'TEAM', '', '', 1, 1, 170, 'YES', 'NO', 'NO'),
(6493, 'ARG - Ignacio Puertolas', 'ipuertolas', 'ignacio24', 'Agro Vial', 'i.puertolas.atv@gmail.com', '011 46350005', '', 'Pola 2364 Capital federal', 'spanish', 'TEAM', '', '', 3, 1, 12, 'YES', 'NO', 'NO'),
(6495, 'Duratread-VISITANTE', 'duratreadvisitante', 'visitante', 'Duratread Tires', 'sales@duratread.com', '(507) 265 3508', '(507) 265 3243', '', 'spanish', 'TEAM', '', '', 0, 1, 167, 'YES', 'NO', 'NO'),
(6496, 'Duratread-VISITANTE', 'duratreadvisitante', 'guest', 'Duratread Tires', 'sales@duratread.com', '(507) 265 3508', '(507) 265 3243', '', 'english', 'TEAM', '', '', 0, 1, 167, 'YES', 'NO', 'NO'),
(6501, 'PAN - Victor Cano', 'vcano@maxillantas.com.pa', 'vict3200', 'Renfrio S.A.', 'vcano@maxillantas.com.pa', '(507) 2933200', '', 'Panama', 'spanish', 'TEAM', '', '', 0, 0, 167, 'YES', 'NO', 'NO'),
(6502, 'CHI - Oscar Lizana', 'olizana@armstrongltda.cl', 'Osca4204', 'Armstrong Lubricantes ltda.', 'olizana@armstrongltda.cl', '97888 4204', '', 'Calle Alcantara 728, Las Condes, Santiago, RegiÃ³n Metropolitana, Chile', 'spanish', 'TEAM', '', '', 0, 1, 45, 'YES', 'NO', 'NO'),
(6556, 'CHI - administrador', 'importadoranova56admin', '4325inch', 'Importadora Nova S.A.', 'finanzas@importadoranova.cl', '(56) 224985500', '', '', 'spanish', 'TEAM', '', '', 2, 1, 45, 'YES', 'NO', 'NO'),
(6543, 'William Barahona', 'william_barahona@yahoo.com', 'will0282', 'CALABAZO TIRES & RUBBER, LLC', 'william_barahona@yahoo.com', '(909) 325-0282', '', '5490 W MISSION BLVD\r\nONTARIO, CA 91762\r\nEIN: 81-0956080', 'english', 'TEAM', '', '', 10, 1, 2, 'YES', 'NO', 'NO'),
(6551, 'COL - Gustavo Cadavid', 'akita@akitamotos.com', 'gcd7606', 'Akita Motos  S . A', 'akita@akitamotos.com', '+57-4 265-7606', '', 'CA 43 A 19 127 INT 202 Antioquia Medellin', 'spanish', 'TEAM', '', '', 4, 1, 49, 'YES', 'NO', 'NO'),
(6509, 'ECU - Ricardo Mariduena', 'rimasu2002@hotmail.com', 'Rica1953', 'Agrollantas S.A.', 'rimasu2002@hotmail.com', '4-231-1953', '', 'Guayaquil', 'spanish', 'TEAM', '', '', 0, 1, 64, 'YES', 'NO', 'NO'),
(6514, 'ECU - Jorge Rugel', 'chicho5804@hotmail.com', 'Jorg4391', 'Comercial Rugel', 'chicho5804@hotmail.com', '2464391', '', 'Guayaquil - Ecuador', 'spanish', 'TEAM', '', '', 0, 1, 64, 'YES', 'NO', 'NO'),
(6515, 'MEX - Patricia Luna', 'patricialuna@mscentral.com.mx', 'patr4040', 'MS Central de distribuciones S.A de C.V.', 'patricialuna@mscentral.com.mx', '(52) (662) 2 61 40 40', '', 'Hermosillo', 'spanish', 'TEAM', '', '', 0, 1, 140, 'YES', 'NO', 'NO'),
(6529, 'BAR - Christian Black', 'lumatrading.bb@gmail.com', 'chri7236', 'LUMA Trading', 'lumatrading.bb@gmail.com', '1 (246) 262 7236', '', 'St Thomas', 'spanish', 'TEAM', '', '', 0, 1, 21, 'YES', 'NO', 'NO'),
(6520, 'NIC - Eusebio Orozco', 'paradox505admin', '3495ipni', 'IMPORTACIONES PARADOX S.A', 'iparadoxsa@gmail.com', '(505) 22226850', '', 'Managua', 'spanish', 'TEAM', '', '', 4, 1, 156, 'YES', 'NO', 'NO'),
(6523, 'CHI - administrador', 'orica56admin', '2997orch', 'Orica Chile S.A.', 'carlos.yanez@orica.com', '(56) 227153823', '', 'Santiago - Chile', 'spanish', 'TEAM', '', '', 0, 0, 45, 'YES', 'NO', 'NO'),
(6524, 'URU - Santiago Rey', 'gomas@adinet.com.uy', 'sant2898', 'SANTIAGO REY', 'gomas@adinet.com.uy', '(598) 2 203 28 98', '', 'Montevideo', 'spanish', 'TEAM', '', '', 0, 1, 229, 'YES', 'NO', 'NO'),
(6526, 'Pablo Gialevra', 'pgialevra', 'pablo4236', 'pauny', 'compras@pauny.com.ar', '+ 543533-423609', '', '', 'spanish', 'TEAM', '', '', 0, 1, 12, 'YES', 'NO', 'NO'),
(6546, 'DRCSpanish', 'drc', 'span987654321', 'DRC', 'lturnbull@duratread.com', '0', '0', '0', 'spanish', 'TEAM', '', '', 1, 1, 167, 'YES', 'NO', 'NO'),
(6547, 'VEN - Maria G. Murgueytio', 'mg001', '001mg', 'Comercializadora Aponte Aponte, C.A.', 'aponteaponte.compras@gmail.com', '+58-424-4410849', '', 'Avenida Este Oeste, Local GalpÃ³n Nro. 103, Parcelas Integradas L-103 y L-95, UrbanizaciÃ³n Parque Comercio Industrial Castillito, San Diego, Valencia Edo. Carabobo. Zona Postal 2006.', 'spanish', 'TEAM', '', '', 4, 1, 233, 'YES', 'NO', 'NO'),
(6548, 'Reencafe Test', 'laurie', 'laurie', 'h', 'lturnbull@duratread.com', '', '', '', 'english', 'TEAM', '', '', 9, 1, 1, 'YES', 'NO', 'NO'),
(6550, 'COS - administrador', 'megallantas506admin', '4159mecr', 'MEGA Llantas', 'erick.alfaro@megallantascr.com', '(506) 88273131', '', 'Alajuela', 'spanish', 'TEAM', '', '', 24, 1, 54, 'YES', 'NO', 'NO'),
(6552, 'PAN - Diva Arauz', 'repuestos.pa@grupoconstrumarket.com', 'diva0141', 'Construmarket Panama', 'repuestos.pa@grupoconstrumarket.com', '222-0141', '', 'Via Ricardo J Alfaro, entre la entrada a El Bosque y Linda Vista. Ciudad de Panama.', 'spanish', 'TEAM', '', '', 1, 1, 167, 'YES', 'NO', 'NO'),
(6553, 'CHI - Eduardo Villar', 'ventasindustriales@rtschile.com', 'edua9381', 'Rolling Tire Service Mine Cia. Ltda.', 'ventasindustriales@rtschile.com', '(56) 988889381', '', '', 'spanish', 'TEAM', '', '', 3, 1, 45, 'YES', 'NO', 'NO'),
(6563, 'CHI - Pedro Medar Jacek', 'pmedar@gmail.com', 'pedr9705', 'Canopus Industrial Supplies', 'pmedar@gmail.com', '(56) 9 51799705', '', 'Av. Manuel Rodriguez Norte 53, Dpto 408. Santiago', 'spanish', 'TEAM', '', '', 7, 1, 45, 'YES', 'NO', 'NO'),
(6564, 'CHI - Daniel Carvajal', 'derco56admin', '3163dech', 'Derco Parts S.A.', 'danielcarvajal@derco.cl', '(56) 2 2 25602275', '', 'Santiago', 'spanish', 'TEAM', '', '', 0, 0, 45, 'YES', 'NO', 'NO'),
(6565, 'Redoustest', 'redoustest', 'GLASginger2856', 'Redoust Tyres South America', 'lturnbull@teamgroup.biz', '999999', '999999', '', 'english', 'TEAM', '', '', 0, 0, 1, 'YES', 'NO', 'NO'),
(6566, 'URU - usuario', 'petin598user', 'peti6060', 'Petin S.A.', 'tecprod@petinsa.com.uy', '(598) 2901 6060', '', 'Paysandu 1440. Montevideo', 'spanish', 'TEAM', '', '', 0, 0, 229, 'YES', 'NO', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6567;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
