-- C. A. HIDROVEN 
 --Version 1.0 
 -- Creado por: 
 -- Ing. Samuel Velasquez
 -- Fecha: 16 de noviembre de 2021
CREATE DATABASE IF NOT EXISTS hidroven;
USE hidroven;
DROP TABLE IF EXISTS celular;
CREATE TABLE `celular` (
  `cedula` varchar(8) NOT NULL,
  `celular` varchar(11) NOT NULL,
  PRIMARY KEY (`cedula`,`celular`),
  KEY `cedula_idx` (`cedula`),
  CONSTRAINT `cedula_cel` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS departamentos;
CREATE TABLE `departamentos` (
  `id` varchar(2) NOT NULL DEFAULT '00',
  `dpto` varchar(60) DEFAULT 'departamento',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO departamentos VALUES("01","Junta Directiva");
INSERT INTO departamentos VALUES("02","Auditoría Interna");
INSERT INTO departamentos VALUES("03","Presidencia");
INSERT INTO departamentos VALUES("04","Gerencia General de Seguridad Integral");
INSERT INTO departamentos VALUES("05","Viceprecidencia de Gestión Administrativa");
INSERT INTO departamentos VALUES("06","Viceprecidencia de Servicios Hidrológicos");
INSERT INTO departamentos VALUES("07","Gerencia General de Administración");
INSERT INTO departamentos VALUES("08","Gerencia General de Comercialización");
INSERT INTO departamentos VALUES("09","Gerencia General de Talento Humano");
INSERT INTO departamentos VALUES("10","Consultoría Jurídica");
INSERT INTO departamentos VALUES("11","Gerencia General de Seguimiento");
INSERT INTO departamentos VALUES("12","Gerencia General de Imagen y Comunicaciones");
INSERT INTO departamentos VALUES("13","Gerencia General de Protección al Patrimonio");
INSERT INTO departamentos VALUES("14","Gerencia General de Tecnología de la Información");
INSERT INTO departamentos VALUES("15","Gerencia General de Planificación y Presupuesto");
INSERT INTO departamentos VALUES("16","Gerencia General de Planificación de Proyecto");
INSERT INTO departamentos VALUES("17","Gerencia General de Tratamiento, Operaciones y Mantenimiento");
INSERT INTO departamentos VALUES("18","Gerencia General de Fortalecimiento del Poder Popular");
DROP TABLE IF EXISTS direccion;
CREATE TABLE `direccion` (
  `cedula` varchar(8) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `urbanizacion` varchar(45) DEFAULT NULL,
  `edificio` varchar(45) DEFAULT NULL,
  `piso` varchar(45) DEFAULT NULL,
  `parroquia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `cedula` (`cedula`),
  CONSTRAINT `cedula_dir` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS email;
CREATE TABLE `email` (
  `cedula` varchar(8) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula`,`email`),
  KEY `cedula_email_idx` (`cedula`),
  CONSTRAINT `cedula_email` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS fiscal;
CREATE TABLE `fiscal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_fiscal` varchar(4) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
INSERT INTO fiscal VALUES("2","2021","1");
DROP TABLE IF EXISTS islr;
CREATE TABLE `islr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(8) NOT NULL,
  `fiscal` int(11) NOT NULL,
  `ingreso` float NOT NULL,
  `deduccion` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`),
  KEY `fiscal` (`fiscal`),
  CONSTRAINT `islr_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`),
  CONSTRAINT `islr_ibfk_2` FOREIGN KEY (`fiscal`) REFERENCES `fiscal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS meses;
CREATE TABLE `meses` (
  `id` varchar(2) NOT NULL,
  `mes` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO meses VALUES("01","enero");
INSERT INTO meses VALUES("02","febrero");
INSERT INTO meses VALUES("03","marzo");
INSERT INTO meses VALUES("04","abril");
INSERT INTO meses VALUES("05","mayo");
INSERT INTO meses VALUES("06","junio");
INSERT INTO meses VALUES("07","julio");
INSERT INTO meses VALUES("08","agosto");
INSERT INTO meses VALUES("09","septiembre");
INSERT INTO meses VALUES("10","octubre");
INSERT INTO meses VALUES("11","noviembre");
INSERT INTO meses VALUES("12","diciembre");
DROP TABLE IF EXISTS recibos;
CREATE TABLE `recibos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(8) NOT NULL,
  `mes` varchar(2) NOT NULL,
  `fiscal` int(11) NOT NULL,
  `ingreso` float NOT NULL,
  `sso` float NOT NULL,
  `lrpe` float NOT NULL,
  `faov` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`),
  KEY `mes` (`mes`),
  KEY `fiscal` (`fiscal`),
  CONSTRAINT `recibos_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`),
  CONSTRAINT `recibos_ibfk_2` FOREIGN KEY (`mes`) REFERENCES `meses` (`id`),
  CONSTRAINT `recibos_ibfk_3` FOREIGN KEY (`fiscal`) REFERENCES `fiscal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS rutas;
CREATE TABLE `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(12) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `url` varchar(250) NOT NULL,
  `paso` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=830 DEFAULT CHARSET=utf8mb4;
INSERT INTO rutas VALUES("1","SVelasquez","2021-10-30 18:03:36","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("2","SVelasquez","2021-10-30 18:03:38","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("3","","2021-10-30 18:03:58","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("4","","2021-10-30 18:05:25","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("5","","2021-10-30 18:05:29","/hidroven/php/login.php","");
INSERT INTO rutas VALUES("6","SVelasquez","2021-10-30 18:05:40","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("7","SVelasquez","2021-10-30 18:14:17","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("8","SVelasquez","2021-10-30 18:14:41","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("9","SVelasquez","2021-10-30 18:14:53","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("10","SVelasquez","2021-10-30 18:24:36","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("11","SVelasquez","2021-10-30 18:26:04","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("12","SVelasquez","2021-10-30 18:26:25","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("13","SVelasquez","2021-10-30 18:30:04","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("14","SVelasquez","2021-10-30 18:30:52","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("15","SVelasquez","2021-10-30 18:37:54","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("16","","2021-10-30 18:39:02","","");
INSERT INTO rutas VALUES("17","SVelasquez","2021-10-30 18:39:15","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("18","SVelasquez","2021-10-30 18:39:51","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("19","SVelasquez","2021-10-30 18:41:02","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("20","SVelasquez","2021-10-30 18:41:17","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("21","SVelasquez","2021-10-30 18:43:46","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("22","SVelasquez","2021-10-30 18:46:12","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("23","SVelasquez","2021-10-30 18:53:07","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("24","SVelasquez","2021-10-30 18:53:22","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("25","SVelasquez","2021-10-30 18:54:23","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("26","SVelasquez","2021-10-30 18:59:59","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("27","SVelasquez","2021-10-30 19:02:48","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("28","SVelasquez","2021-10-30 19:03:18","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("29","SVelasquez","2021-10-30 19:07:32","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("30","SVelasquez","2021-10-30 19:08:08","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("31","SVelasquez","2021-10-30 19:08:52","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("32","SVelasquez","2021-10-30 19:08:53","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("33","SVelasquez","2021-10-30 19:08:53","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("34","SVelasquez","2021-10-30 19:08:53","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("35","SVelasquez","2021-10-30 19:09:01","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("36","SVelasquez","2021-10-30 19:09:16","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("37","SVelasquez","2021-10-30 19:09:25","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("38","SVelasquez","2021-10-30 19:09:27","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("39","SVelasquez","2021-10-30 19:09:27","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("40","SVelasquez","2021-10-30 19:09:27","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("41","SVelasquez","2021-10-30 19:09:27","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("42","SVelasquez","2021-10-30 19:09:33","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("43","SVelasquez","2021-10-30 19:09:34","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("44","SVelasquez","2021-10-30 19:09:41","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("45","SVelasquez","2021-10-30 19:10:05","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("46","SVelasquez","2021-10-30 19:12:03","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("47","SVelasquez","2021-10-30 19:13:11","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("48","SVelasquez","2021-10-30 19:13:25","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("49","SVelasquez","2021-10-30 19:13:36","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("50","SVelasquez","2021-10-30 19:13:44","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("51","SVelasquez","2021-10-30 19:13:58","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("52","SVelasquez","2021-10-30 19:14:16","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("53","SVelasquez","2021-10-30 19:15:10","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("54","SVelasquez","2021-10-30 19:15:24","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("55","SVelasquez","2021-10-30 19:16:26","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("56","SVelasquez","2021-10-30 19:16:35","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("57","SVelasquez","2021-10-30 19:16:45","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("58","SVelasquez","2021-10-30 19:17:38","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("59","SVelasquez","2021-10-30 19:17:44","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("60","SVelasquez","2021-10-30 19:17:58","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("61","SVelasquez","2021-10-30 19:18:04","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("62","SVelasquez","2021-10-30 19:18:13","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("63","SVelasquez","2021-10-30 19:18:21","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("64","SVelasquez","2021-10-30 19:18:30","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("65","SVelasquez","2021-10-30 19:18:35","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("66","SVelasquez","2021-10-30 19:21:39","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("67","SVelasquez","2021-10-30 19:21:51","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("68","SVelasquez","2021-10-30 19:21:58","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("69","SVelasquez","2021-10-30 19:22:12","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("70","SVelasquez","2021-10-30 19:37:24","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("71","SVelasquez","2021-10-30 19:39:53","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("72","SVelasquez","2021-10-30 19:40:08","/hidroven/php/bitacora.php?IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("73","SVelasquez","2021-10-30 19:43:08","/hidroven/php/bitacora.php?IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("74","SVelasquez","2021-10-30 19:43:26","/hidroven/php/bitacora.php?IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("75","SVelasquez","2021-10-30 19:43:27","/hidroven/php/bitacora.php?IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","IdUser=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("76","SVelasquez","2021-10-30 19:43:29","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("77","SVelasquez","2021-10-30 19:43:32","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("78","SVelasquez","2021-10-30 19:43:46","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("79","SVelasquez","2021-10-30 19:44:35","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("80","SVelasquez","2021-10-30 19:44:36","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("81","SVelasquez","2021-10-30 19:44:36","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("82","SVelasquez","2021-10-30 19:44:37","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("83","SVelasquez","2021-10-30 19:44:37","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("84","SVelasquez","2021-10-30 19:44:38","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("85","SVelasquez","2021-10-30 19:44:40","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("86","SVelasquez","2021-10-30 19:46:13","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("87","SVelasquez","2021-10-30 19:46:22","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("88","SVelasquez","2021-10-30 19:46:54","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("89","SVelasquez","2021-10-30 19:47:30","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("90","SVelasquez","2021-10-30 19:47:40","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("91","SVelasquez","2021-10-30 19:47:42","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("92","SVelasquez","2021-10-30 19:48:00","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("93","SVelasquez","2021-10-30 19:48:31","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("94","SVelasquez","2021-10-30 19:48:58","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("95","SVelasquez","2021-10-30 19:49:00","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("96","SVelasquez","2021-10-30 19:50:51","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("97","SVelasquez","2021-10-30 19:50:57","/hidroven/php/bitacora.php?page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("98","SVelasquez","2021-10-30 19:51:09","/hidroven/php/bitacora.php?page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("99","SVelasquez","2021-10-30 19:51:19","/hidroven/php/bitacora.php?page=10&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=10&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("100","SVelasquez","2021-10-30 19:51:32","/hidroven/php/bitacora.php?page=9&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=9&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("101","SVelasquez","2021-10-30 19:51:37","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("102","SVelasquez","2021-10-30 19:51:50","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("103","SVelasquez","2021-10-30 19:53:45","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("104","SVelasquez","2021-10-30 19:53:48","/hidroven/php/bitacora.php?page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("105","SVelasquez","2021-10-30 19:53:51","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("106","SVelasquez","2021-10-30 19:55:08","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("107","SVelasquez","2021-10-30 19:55:36","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("108","SVelasquez","2021-10-30 19:55:39","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("109","SVelasquez","2021-10-30 19:57:10","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("110","SVelasquez","2021-10-30 19:57:12","/hidroven/php/bitacora.php?page=10&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=10&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("111","SVelasquez","2021-10-30 19:57:15","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("112","SVelasquez","2021-10-30 19:59:00","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("113","SVelasquez","2021-10-30 19:59:03","/hidroven/php/bitacora.php?page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("114","SVelasquez","2021-10-30 19:59:06","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("115","SVelasquez","2021-10-30 19:59:27","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("116","SVelasquez","2021-10-30 19:59:29","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("117","SVelasquez","2021-10-30 19:59:56","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("118","SVelasquez","2021-10-30 19:59:58","/hidroven/php/bitacora.php?page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("119","SVelasquez","2021-10-30 20:00:04","/hidroven/php/bitacora.php?page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("120","SVelasquez","2021-10-30 20:00:05","/hidroven/php/bitacora.php?page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("121","SVelasquez","2021-10-30 20:00:08","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("122","SVelasquez","2021-10-30 20:00:10","/hidroven/php/bitacora.php?page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("123","SVelasquez","2021-10-30 20:00:12","/hidroven/php/bitacora.php?page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("124","SVelasquez","2021-10-30 20:00:13","/hidroven/php/bitacora.php?page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("125","SVelasquez","2021-10-30 20:00:45","/hidroven/php/bitacora.php?page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("126","SVelasquez","2021-10-30 20:00:48","/hidroven/php/bitacora.php?page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=13&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("127","SVelasquez","2021-10-30 20:00:51","/hidroven/php/bitacora.php?page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("128","SVelasquez","2021-10-30 20:00:53","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("129","SVelasquez","2021-10-30 20:02:15","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("130","SVelasquez","2021-10-30 20:03:21","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("131","SVelasquez","2021-10-30 20:05:16","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("132","SVelasquez","2021-10-30 20:05:17","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("133","SVelasquez","2021-10-30 20:05:17","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("134","SVelasquez","2021-10-30 20:05:17","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("135","SVelasquez","2021-10-30 20:05:17","/hidroven/php/bitacora.php?page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=11&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("136","SVelasquez","2021-10-30 20:05:29","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("137","SVelasquez","2021-10-30 20:05:35","/hidroven/php/bitacora.php?page=5&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=5&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("138","SVelasquez","2021-10-30 20:05:37","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("139","SVelasquez","2021-10-30 20:06:01","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("140","SVelasquez","2021-10-30 20:08:57","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("141","SVelasquez","2021-10-30 20:08:59","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("142","SVelasquez","2021-10-30 20:09:06","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("143","SVelasquez","2021-10-30 20:09:16","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("144","SVelasquez","2021-10-30 20:10:35","/hidroven/php/bitacora.php?page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=8&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("145","SVelasquez","2021-10-30 20:10:45","/hidroven/php/bitacora.php?page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=14&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("146","SVelasquez","2021-10-30 20:10:50","/hidroven/php/bitacora.php?page=15&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=15&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("147","SVelasquez","2021-10-30 20:10:54","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("148","SVelasquez","2021-10-30 20:13:55","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("149","SVelasquez","2021-10-30 20:49:30","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("150","SVelasquez","2021-10-30 20:49:44","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("151","SVelasquez","2021-10-30 20:49:49","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("152","SVelasquez","2021-10-30 20:49:55","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("153","","2021-10-30 20:50:52","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("154","","2021-10-30 20:50:53","/hidroven/php/login.php","");
INSERT INTO rutas VALUES("155","SamiVN","2021-10-30 20:51:01","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("156","SamiVN","2021-10-30 20:51:04","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("157","SamiVN","2021-10-30 20:51:05","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("158","SamiVN","2021-10-30 20:53:06","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("159","SamiVN","2021-10-30 20:53:39","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("160","SamiVN","2021-10-30 20:53:39","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("161","SamiVN","2021-10-30 20:54:56","/hidroven/php/","");
INSERT INTO rutas VALUES("162","SamiVN","2021-10-30 20:54:59","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("163","SamiVN","2021-10-30 20:56:41","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("164","","2021-10-30 20:57:06","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("165","","2021-10-30 20:57:07","/hidroven/php/login.php","");
INSERT INTO rutas VALUES("166","SVelasquez","2021-10-30 20:57:15","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("167","SVelasquez","2021-10-30 20:57:17","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("168","SVelasquez","2021-10-30 20:58:34","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("169","SVelasquez","2021-10-30 20:58:43","/hidroven/php/bitacora.php?usuarioId=SamiVN&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SamiVN&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("170","SVelasquez","2021-10-30 20:58:51","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("171","SVelasquez","2021-10-30 20:59:08","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("172","SVelasquez","2021-10-30 20:59:58","/hidroven/php/bitacora.php?usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("173","SVelasquez","2021-10-30 21:00:06","/hidroven/php/bitacora.php?page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=2&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("174","SVelasquez","2021-10-30 21:00:15","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("175","SVelasquez","2021-10-30 21:01:25","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("176","SVelasquez","2021-10-30 21:01:31","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("177","SVelasquez","2021-10-30 21:01:42","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","page=1&usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("178","SVelasquez","2021-10-30 21:29:12","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("179","SVelasquez","2021-10-30 21:29:18","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("180","SVelasquez","2021-10-30 21:30:26","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("181","SVelasquez","2021-10-30 21:30:52","/hidroven/php/bitacora.php?page=1&usuarioId=SamiVN&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=SamiVN&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("182","SVelasquez","2021-10-30 21:44:54","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("183","SVelasquez","2021-10-30 21:44:56","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("184","SVelasquez","2021-10-30 21:45:00","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("185","SVelasquez","2021-10-30 21:45:03","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("186","SVelasquez","2021-10-30 21:47:08","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&dia=01&mes=01&a%C3%B1o=2021","page=1&usuarioId=SVelasquez&dia=01&mes=01&a%C3%B1o=2021");
INSERT INTO rutas VALUES("187","SVelasquez","2021-10-30 21:49:43","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021","page=1&usuarioId=SVelasquez&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("188","SVelasquez","2021-10-30 21:50:09","/hidroven/php/bitacora.php?page=17&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=17&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("189","SVelasquez","2021-10-30 21:50:17","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("190","SVelasquez","2021-10-30 21:50:22","/hidroven/php/bitacora.php?page=18&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=18&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("191","SVelasquez","2021-10-30 21:52:04","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30","page=1&usuarioId=SVelasquez&a%C3%B1o=2021&mes=10&dia=30");
INSERT INTO rutas VALUES("192","SVelasquez","2021-10-30 21:55:14","/hidroven/php/bitacora.php?page=1&usuarioId=YHerrera&dia=29&mes=10&a%C3%B1o=2021","page=1&usuarioId=YHerrera&dia=29&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("193","SVelasquez","2021-10-30 21:56:01","/hidroven/php/bitacora.php?page=1&usuarioId=SamiVN&dia=30&mes=10&a%C3%B1o=2021","page=1&usuarioId=SamiVN&dia=30&mes=10&a%C3%B1o=2021");
INSERT INTO rutas VALUES("194","SVelasquez","2021-10-30 22:03:12","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("195","SVelasquez","2021-10-30 22:03:13","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("196","SVelasquez","2021-10-30 22:03:26","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("197","SVelasquez","2021-10-30 22:09:46","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("198","SVelasquez","2021-10-30 22:10:02","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("199","","2021-10-30 22:10:09","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("200","","2021-10-30 22:10:14","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("201","","2021-10-30 22:11:35","/hidroven/php/login.php","");
INSERT INTO rutas VALUES("202","SVelasquez","2021-10-30 22:11:43","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("203","SVelasquez","2021-10-30 22:11:50","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("204","SVelasquez","2021-10-30 22:12:06","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("205","SVelasquez","2021-10-30 22:13:01","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("206","SVelasquez","2021-10-30 22:16:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("207","SVelasquez","2021-10-30 22:20:12","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("208","SVelasquez","2021-10-30 22:21:56","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("209","SVelasquez","2021-10-30 22:22:01","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("210","SVelasquez","2021-10-30 22:23:20","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("211","SVelasquez","2021-10-30 22:23:57","/hidroven/php/recibos.php","");
INSERT INTO rutas VALUES("212","SVelasquez","2021-10-30 22:24:06","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("213","SVelasquez","2021-10-30 22:27:11","/hidroven/php/audit.php","");
INSERT INTO rutas VALUES("214","SVelasquez","2021-11-01 21:20:05","/hidroven/php/","");
INSERT INTO rutas VALUES("215","SVelasquez","2021-11-02 16:41:54","/hidroven/php/","");
INSERT INTO rutas VALUES("216","SVelasquez","2021-11-02 16:41:56","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("217","SVelasquez","2021-11-02 16:41:57","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("218","SVelasquez","2021-11-02 16:45:48","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("219","SVelasquez","2021-11-02 16:45:53","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("220","SVelasquez","2021-11-02 16:46:00","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("221","SVelasquez","2021-11-02 16:46:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("222","SVelasquez","2021-11-02 16:46:10","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("223","SVelasquez","2021-11-02 16:46:47","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("224","SVelasquez","2021-11-02 16:46:51","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("225","SVelasquez","2021-11-02 16:52:26","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("226","SVelasquez","2021-11-02 16:52:49","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("227","SVelasquez","2021-11-02 16:52:52","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("228","SVelasquez","2021-11-02 16:53:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("229","SVelasquez","2021-11-02 16:53:56","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("230","SVelasquez","2021-11-02 17:06:00","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("231","SVelasquez","2021-11-02 17:06:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("232","SVelasquez","2021-11-02 17:08:40","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("233","SVelasquez","2021-11-02 17:12:16","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("234","SVelasquez","2021-11-02 17:12:49","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("235","SVelasquez","2021-11-02 17:12:56","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("236","SVelasquez","2021-11-02 17:13:59","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("237","SVelasquez","2021-11-02 17:16:19","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("238","SVelasquez","2021-11-02 17:18:42","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("239","SVelasquez","2021-11-02 17:20:28","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("240","SVelasquez","2021-11-02 17:23:48","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("241","SVelasquez","2021-11-02 17:24:16","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("242","SVelasquez","2021-11-02 17:24:20","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("243","SVelasquez","2021-11-02 17:24:42","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("244","SVelasquez","2021-11-02 17:26:53","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("245","SVelasquez","2021-11-02 17:27:35","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("246","SVelasquez","2021-11-02 17:28:24","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("247","SVelasquez","2021-11-02 17:30:27","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("248","SVelasquez","2021-11-02 17:30:41","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("249","SVelasquez","2021-11-02 17:30:52","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("250","SVelasquez","2021-11-02 17:30:57","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("251","SVelasquez","2021-11-02 17:33:02","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("252","SVelasquez","2021-11-02 17:33:20","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("253","SVelasquez","2021-11-02 17:34:10","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("254","SVelasquez","2021-11-02 17:35:30","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("255","SVelasquez","2021-11-02 17:35:44","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("256","SVelasquez","2021-11-02 17:35:48","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("257","SVelasquez","2021-11-02 17:38:02","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("258","SVelasquez","2021-11-02 17:41:00","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("259","SVelasquez","2021-11-02 17:43:22","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("260","SVelasquez","2021-11-02 17:43:44","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("261","SVelasquez","2021-11-02 17:44:50","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("262","SVelasquez","2021-11-02 17:46:20","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("263","SVelasquez","2021-11-02 17:46:31","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("264","SVelasquez","2021-11-02 17:46:36","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("265","SVelasquez","2021-11-02 17:50:45","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("266","SVelasquez","2021-11-02 17:50:58","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("267","SVelasquez","2021-11-02 17:51:03","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("268","SVelasquez","2021-11-02 17:51:31","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("269","SVelasquez","2021-11-02 17:51:49","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("270","SVelasquez","2021-11-02 17:52:22","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("271","SVelasquez","2021-11-02 17:53:05","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("272","SVelasquez","2021-11-02 17:53:11","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("273","SVelasquez","2021-11-02 17:53:19","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("274","SVelasquez","2021-11-02 17:53:35","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("275","SVelasquez","2021-11-02 17:54:18","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("276","SVelasquez","2021-11-02 17:54:32","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("277","SVelasquez","2021-11-02 17:54:38","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("278","SVelasquez","2021-11-02 17:58:33","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("279","SVelasquez","2021-11-02 17:58:39","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("280","SVelasquez","2021-11-02 17:58:50","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("281","SVelasquez","2021-11-02 17:58:58","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("282","SVelasquez","2021-11-02 18:00:23","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("283","SVelasquez","2021-11-02 18:01:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("284","SVelasquez","2021-11-02 18:01:48","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("285","SVelasquez","2021-11-02 18:02:40","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("286","SVelasquez","2021-11-02 18:06:07","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("287","SVelasquez","2021-11-02 18:06:27","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("288","SVelasquez","2021-11-02 18:06:40","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("289","SVelasquez","2021-11-02 18:06:40","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("290","SVelasquez","2021-11-02 18:07:26","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("291","SVelasquez","2021-11-02 18:07:31","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("292","SVelasquez","2021-11-02 18:08:07","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("293","SVelasquez","2021-11-02 18:11:25","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("294","SVelasquez","2021-11-02 18:12:21","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("295","SVelasquez","2021-11-02 18:12:41","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("296","SVelasquez","2021-11-02 18:13:05","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("297","SVelasquez","2021-11-02 18:13:26","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("298","SVelasquez","2021-11-02 18:13:32","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("299","SVelasquez","2021-11-02 18:13:53","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("300","SVelasquez","2021-11-02 18:15:25","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("301","SVelasquez","2021-11-02 18:15:37","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("302","SVelasquez","2021-11-02 18:15:42","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("303","SVelasquez","2021-11-02 18:16:25","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("304","SVelasquez","2021-11-02 18:17:17","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("305","SVelasquez","2021-11-02 18:17:53","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("306","SVelasquez","2021-11-02 18:19:36","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("307","SVelasquez","2021-11-02 18:19:56","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("308","SVelasquez","2021-11-02 18:20:00","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("309","SVelasquez","2021-11-02 18:20:33","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("310","SVelasquez","2021-11-02 18:21:45","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("311","SVelasquez","2021-11-02 18:22:01","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("312","SVelasquez","2021-11-02 18:23:31","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("313","SVelasquez","2021-11-02 18:24:59","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("314","SVelasquez","2021-11-02 18:26:13","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("315","SVelasquez","2021-11-02 18:26:36","/hidroven/php/registrar.php","");
INSERT INTO rutas VALUES("316","SVelasquez","2021-11-02 18:26:51","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("317","SVelasquez","2021-11-02 18:35:07","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("318","SVelasquez","2021-11-02 18:36:53","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("319","SVelasquez","2021-11-02 18:37:32","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("320","SVelasquez","2021-11-02 18:38:04","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("321","SVelasquez","2021-11-02 18:38:16","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("322","SVelasquez","2021-11-02 18:38:26","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("323","SVelasquez","2021-11-02 18:38:28","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("324","SVelasquez","2021-11-02 18:38:56","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("325","SVelasquez","2021-11-02 18:39:24","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("326","SVelasquez","2021-11-02 18:40:54","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("327","SVelasquez","2021-11-02 18:43:40","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("328","SVelasquez","2021-11-02 18:45:05","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("329","SVelasquez","2021-11-02 18:48:12","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("330","SVelasquez","2021-11-02 18:49:10","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("331","SVelasquez","2021-11-02 18:49:33","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("332","SVelasquez","2021-11-02 18:54:28","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("333","SVelasquez","2021-11-02 18:54:39","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&dia=02&mes=11&a%C3%B1o=2021","page=1&usuarioId=SVelasquez&dia=02&mes=11&a%C3%B1o=2021");
INSERT INTO rutas VALUES("334","SVelasquez","2021-11-02 18:54:44","/hidroven/php/bitacora.php?page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02","page=12&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02");
INSERT INTO rutas VALUES("335","SVelasquez","2021-11-02 18:54:45","/hidroven/php/bitacora.php?page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02","page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02");
INSERT INTO rutas VALUES("336","SVelasquez","2021-11-02 18:55:10","/hidroven/php/bitacora.php?page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02","page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02");
INSERT INTO rutas VALUES("337","SVelasquez","2021-11-02 18:55:13","/hidroven/php/bitacora.php?page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02","page=7&usuarioId=SVelasquez&a%C3%B1o=2021&mes=11&dia=02");
INSERT INTO rutas VALUES("338","SVelasquez","2021-11-02 18:55:17","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("339","SVelasquez","2021-11-02 18:55:26","/hidroven/php/bitacora.php?page=1&usuarioId=SVelasquez&dia=02&mes=11&a%C3%B1o=2021","page=1&usuarioId=SVelasquez&dia=02&mes=11&a%C3%B1o=2021");
INSERT INTO rutas VALUES("340","SVelasquez","2021-11-02 18:55:55","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("341","SVelasquez","2021-11-02 18:56:01","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("342","SVelasquez","2021-11-02 18:56:26","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000","page=1&usuarioId=&dia=00&mes=00&a%C3%B1o=0000");
INSERT INTO rutas VALUES("343","SVelasquez","2021-11-02 18:56:27","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("344","SVelasquez","2021-11-02 18:56:37","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("345","SVelasquez","2021-11-02 18:57:07","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("346","SVelasquez","2021-11-02 18:57:08","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("347","SVelasquez","2021-11-02 18:57:09","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("348","SVelasquez","2021-11-02 18:57:13","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("349","SVelasquez","2021-11-02 18:57:14","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("350","SVelasquez","2021-11-02 19:10:33","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("351","SVelasquez","2021-11-02 19:10:34","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("352","SVelasquez","2021-11-02 19:11:12","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("353","SVelasquez","2021-11-02 19:11:13","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("354","SVelasquez","2021-11-02 19:11:13","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("355","SVelasquez","2021-11-02 19:11:14","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("356","SVelasquez","2021-11-02 19:11:14","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("357","SVelasquez","2021-11-02 19:11:14","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("358","SVelasquez","2021-11-02 19:11:22","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("359","SVelasquez","2021-11-02 19:11:23","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("360","SVelasquez","2021-11-02 19:11:27","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("361","SVelasquez","2021-11-02 19:11:35","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("362","SVelasquez","2021-11-02 19:11:42","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("363","SVelasquez","2021-11-02 19:11:43","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("364","SVelasquez","2021-11-02 19:11:56","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("365","SVelasquez","2021-11-02 19:11:57","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("366","SVelasquez","2021-11-02 19:11:57","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("367","SVelasquez","2021-11-02 19:11:58","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("368","SVelasquez","2021-11-02 19:11:58","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("369","SVelasquez","2021-11-02 19:11:58","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("370","SVelasquez","2021-11-02 19:11:59","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("371","SVelasquez","2021-11-02 19:11:59","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("372","SVelasquez","2021-11-02 19:11:59","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("373","SVelasquez","2021-11-02 19:11:59","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("374","SVelasquez","2021-11-02 19:11:59","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("375","SVelasquez","2021-11-02 19:12:00","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("376","SVelasquez","2021-11-02 19:12:00","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("377","SVelasquez","2021-11-02 19:12:36","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("378","SVelasquez","2021-11-02 19:12:37","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("379","SVelasquez","2021-11-02 19:12:37","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("380","SVelasquez","2021-11-02 19:12:38","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("381","SVelasquez","2021-11-02 19:12:38","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("382","SVelasquez","2021-11-02 19:12:39","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("383","SVelasquez","2021-11-02 19:12:39","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("384","SVelasquez","2021-11-02 19:12:42","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("385","SVelasquez","2021-11-02 19:12:47","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("386","SVelasquez","2021-11-02 19:14:31","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("387","SVelasquez","2021-11-02 19:14:32","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("388","SVelasquez","2021-11-02 19:14:33","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("389","SVelasquez","2021-11-02 19:14:33","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("390","SVelasquez","2021-11-02 19:14:34","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("391","SVelasquez","2021-11-02 19:14:34","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("392","SVelasquez","2021-11-02 19:14:42","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("393","SVelasquez","2021-11-02 19:14:42","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("394","SVelasquez","2021-11-02 19:14:42","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("395","SVelasquez","2021-11-02 19:14:43","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("396","SVelasquez","2021-11-02 19:14:43","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("397","SVelasquez","2021-11-02 19:14:43","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("398","SVelasquez","2021-11-02 19:16:13","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("399","SVelasquez","2021-11-02 19:17:11","/hidroven/php/bitacora.php?page=1&usuarioId=&dia=&mes=&a%C3%B1o=","page=1&usuarioId=&dia=&mes=&a%C3%B1o=");
INSERT INTO rutas VALUES("400","SVelasquez","2021-11-02 19:17:13","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("401","SVelasquez","2021-11-02 19:17:36","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("402","SVelasquez","2021-11-02 19:17:42","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("403","SVelasquez","2021-11-02 19:17:44","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("404","SVelasquez","2021-11-02 19:17:45","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("405","SVelasquez","2021-11-02 19:17:46","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("406","SVelasquez","2021-11-02 19:17:47","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("407","SVelasquez","2021-11-02 19:18:00","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("408","SVelasquez","2021-11-02 19:18:04","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("409","SVelasquez","2021-11-02 19:18:10","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("410","SVelasquez","2021-11-02 19:19:36","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("411","SVelasquez","2021-11-02 19:19:42","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("412","SVelasquez","2021-11-02 19:19:44","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("413","SVelasquez","2021-11-02 19:19:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("414","SVelasquez","2021-11-02 19:19:53","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("415","SVelasquez","2021-11-02 19:20:02","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("416","SVelasquez","2021-11-02 19:20:12","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("417","SVelasquez","2021-11-02 19:20:13","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("418","SVelasquez","2021-11-02 19:20:22","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("419","SVelasquez","2021-11-02 19:29:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("420","SVelasquez","2021-11-02 19:29:58","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("421","SVelasquez","2021-11-02 19:32:05","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("422","SVelasquez","2021-11-02 19:32:08","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("423","SVelasquez","2021-11-02 19:33:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("424","SVelasquez","2021-11-02 19:33:54","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("425","SVelasquez","2021-11-02 19:38:09","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("426","SVelasquez","2021-11-02 19:38:21","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("427","SVelasquez","2021-11-02 19:38:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("428","SVelasquez","2021-11-02 19:38:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("429","SVelasquez","2021-11-02 19:39:00","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("430","SVelasquez","2021-11-02 19:39:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("431","SVelasquez","2021-11-02 19:48:32","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("432","SVelasquez","2021-11-02 19:48:59","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("433","SVelasquez","2021-11-02 19:49:04","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("434","SVelasquez","2021-11-02 19:49:40","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("435","SVelasquez","2021-11-02 19:50:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("436","SVelasquez","2021-11-02 19:52:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("437","SVelasquez","2021-11-02 19:52:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("438","SVelasquez","2021-11-02 19:53:07","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("439","SVelasquez","2021-11-02 19:53:08","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("440","SVelasquez","2021-11-02 19:53:09","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("441","SVelasquez","2021-11-02 19:53:09","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("442","SVelasquez","2021-11-02 19:53:09","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("443","SVelasquez","2021-11-02 19:53:29","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("444","SVelasquez","2021-11-02 19:53:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("445","SVelasquez","2021-11-02 19:54:04","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("446","SVelasquez","2021-11-02 19:54:37","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("447","SVelasquez","2021-11-02 19:55:03","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("448","SVelasquez","2021-11-02 19:55:55","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("449","SVelasquez","2021-11-02 19:56:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("450","SVelasquez","2021-11-02 19:57:57","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("451","SVelasquez","2021-11-02 20:07:24","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("452","SVelasquez","2021-11-02 20:08:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("453","SVelasquez","2021-11-02 20:09:05","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("454","SVelasquez","2021-11-02 20:09:25","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("455","SVelasquez","2021-11-02 20:10:07","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("456","SVelasquez","2021-11-02 20:10:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("457","SVelasquez","2021-11-02 20:11:27","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("458","SVelasquez","2021-11-02 20:11:58","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("459","SVelasquez","2021-11-02 20:13:29","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("460","SVelasquez","2021-11-02 20:13:55","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("461","SVelasquez","2021-11-02 20:31:06","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("462","SVelasquez","2021-11-02 20:31:39","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("463","SVelasquez","2021-11-02 20:38:36","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("464","SVelasquez","2021-11-02 20:40:28","/hidroven/php/","");
INSERT INTO rutas VALUES("465","SVelasquez","2021-11-02 20:40:32","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("466","SVelasquez","2021-11-02 20:41:15","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("467","SVelasquez","2021-11-02 20:42:05","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("468","SVelasquez","2021-11-02 20:42:24","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("469","SVelasquez","2021-11-02 21:46:58","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("470","SVelasquez","2021-11-02 21:46:59","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("471","SVelasquez","2021-11-02 21:47:00","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("472","SVelasquez","2021-11-02 21:47:11","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("473","SVelasquez","2021-11-02 21:47:31","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("474","SVelasquez","2021-11-02 21:48:47","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("475","SVelasquez","2021-11-02 21:49:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("476","SVelasquez","2021-11-02 21:49:24","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("477","SVelasquez","2021-11-02 21:49:29","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("478","SVelasquez","2021-11-02 21:50:09","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("479","SVelasquez","2021-11-02 21:50:36","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("480","SVelasquez","2021-11-02 21:51:29","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("481","SVelasquez","2021-11-02 21:52:39","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("482","SVelasquez","2021-11-02 21:53:00","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("483","SVelasquez","2021-11-02 21:53:02","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("484","SVelasquez","2021-11-02 21:53:48","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("485","SVelasquez","2021-11-02 21:54:19","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("486","SVelasquez","2021-11-02 21:55:31","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("487","SVelasquez","2021-11-02 21:55:46","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("488","SVelasquez","2021-11-02 21:56:35","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("489","SVelasquez","2021-11-02 21:56:54","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("490","SVelasquez","2021-11-02 21:57:02","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("491","SVelasquez","2021-11-02 21:57:55","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("492","SVelasquez","2021-11-02 21:59:57","/hidroven/php/admin_editar.php","");
INSERT INTO rutas VALUES("493","SVelasquez","2021-11-02 22:00:06","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("494","SVelasquez","2021-11-02 22:00:10","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("495","SVelasquez","2021-11-02 22:00:10","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("496","SVelasquez","2021-11-02 22:00:10","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("497","SVelasquez","2021-11-02 22:00:10","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("498","SVelasquez","2021-11-02 22:00:11","/hidroven/php/buscar.php","");
INSERT INTO rutas VALUES("499","SVelasquez","2021-11-02 22:00:21","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("500","SVelasquez","2021-11-02 22:00:38","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("501","SVelasquez","2021-11-02 22:01:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("502","SVelasquez","2021-11-02 22:01:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("503","SVelasquez","2021-11-02 22:01:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("504","SVelasquez","2021-11-02 22:01:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("505","SVelasquez","2021-11-02 22:01:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("506","SVelasquez","2021-11-02 22:01:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("507","SVelasquez","2021-11-02 22:01:47","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("508","SVelasquez","2021-11-02 22:01:50","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("509","SVelasquez","2021-11-02 22:01:51","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("510","SVelasquez","2021-11-02 22:01:57","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("511","SVelasquez","2021-11-02 22:02:02","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("512","SVelasquez","2021-11-02 22:02:04","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("513","SVelasquez","2021-11-02 22:02:05","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("514","SVelasquez","2021-11-02 22:02:37","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("515","SVelasquez","2021-11-02 22:02:48","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("516","SVelasquez","2021-11-02 22:02:50","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("517","SVelasquez","2021-11-02 22:15:43","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("518","SVelasquez","2021-11-02 22:15:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("519","SVelasquez","2021-11-02 22:15:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("520","SVelasquez","2021-11-02 22:15:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("521","SVelasquez","2021-11-02 22:15:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("522","SVelasquez","2021-11-02 22:15:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("523","SVelasquez","2021-11-02 22:15:45","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("524","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("525","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("526","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("527","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("528","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("529","SVelasquez","2021-11-02 22:15:46","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("530","SVelasquez","2021-11-02 22:15:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("531","SVelasquez","2021-11-02 22:15:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("532","SVelasquez","2021-11-02 22:15:49","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("533","SVelasquez","2021-11-02 22:15:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("534","SVelasquez","2021-11-02 22:21:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("535","SVelasquez","2021-11-02 22:21:50","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("536","SVelasquez","2021-11-02 22:21:50","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("537","SVelasquez","2021-11-02 22:21:51","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("538","SVelasquez","2021-11-02 22:21:51","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("539","SVelasquez","2021-11-02 22:21:51","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("540","SVelasquez","2021-11-02 22:21:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("541","SVelasquez","2021-11-02 22:21:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("542","SVelasquez","2021-11-02 22:21:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("543","SVelasquez","2021-11-02 22:21:52","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("544","SVelasquez","2021-11-02 22:21:54","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("545","SVelasquez","2021-11-02 22:21:56","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("546","SVelasquez","2021-11-02 22:22:10","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("547","SVelasquez","2021-11-02 22:22:17","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("548","SVelasquez","2021-11-02 22:22:18","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("549","SVelasquez","2021-11-02 22:22:19","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("550","SVelasquez","2021-11-02 22:22:19","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("551","SVelasquez","2021-11-03 02:55:13","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("552","SVelasquez","2021-11-03 02:55:57","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("553","SVelasquez","2021-11-03 16:37:12","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("554","SVelasquez","2021-11-03 16:37:23","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("555","SVelasquez","2021-11-03 16:37:25","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("556","SVelasquez","2021-11-03 16:37:26","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("557","SVelasquez","2021-11-03 16:38:18","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("558","SVelasquez","2021-11-03 16:38:19","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("559","SVelasquez","2021-11-03 16:38:19","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("560","SVelasquez","2021-11-03 16:38:19","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("561","SVelasquez","2021-11-03 16:38:19","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("562","SVelasquez","2021-11-03 16:38:34","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("563","SVelasquez","2021-11-03 16:38:45","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("564","SVelasquez","2021-11-03 16:38:46","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("565","SVelasquez","2021-11-03 16:38:46","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("566","SVelasquez","2021-11-03 16:38:50","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("567","SVelasquez","2021-11-03 16:38:58","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("568","SVelasquez","2021-11-03 16:39:14","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("569","SVelasquez","2021-11-03 16:39:14","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("570","SVelasquez","2021-11-03 16:39:14","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("571","SVelasquez","2021-11-03 16:39:15","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("572","SVelasquez","2021-11-03 16:39:15","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("573","SVelasquez","2021-11-03 16:39:15","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("574","SVelasquez","2021-11-03 16:39:16","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("575","SVelasquez","2021-11-03 16:39:55","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("576","SVelasquez","2021-11-03 16:40:15","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("577","SVelasquez","2021-11-03 16:41:24","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("578","SVelasquez","2021-11-03 16:41:46","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("579","SVelasquez","2021-11-03 16:41:46","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("580","SVelasquez","2021-11-03 16:41:47","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("581","SVelasquez","2021-11-03 16:41:47","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("582","SVelasquez","2021-11-03 16:41:47","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("583","SVelasquez","2021-11-03 16:42:01","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("584","SVelasquez","2021-11-03 16:42:28","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("585","SVelasquez","2021-11-03 16:43:05","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("586","SVelasquez","2021-11-03 16:43:25","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("587","SVelasquez","2021-11-03 16:44:09","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("588","SVelasquez","2021-11-03 16:44:44","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("589","SVelasquez","2021-11-03 16:45:43","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("590","SVelasquez","2021-11-03 16:47:28","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("591","SVelasquez","2021-11-03 16:48:06","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("592","SVelasquez","2021-11-03 16:48:28","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("593","SVelasquez","2021-11-03 16:48:49","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("594","SVelasquez","2021-11-03 16:49:06","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("595","SVelasquez","2021-11-03 16:49:14","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("596","SVelasquez","2021-11-03 16:50:57","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("597","SVelasquez","2021-11-03 16:50:58","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("598","SVelasquez","2021-11-03 16:51:00","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("599","SVelasquez","2021-11-03 16:51:02","/hidroven/php/restore.php","");
INSERT INTO rutas VALUES("600","SVelasquez","2021-11-03 16:51:04","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("601","SVelasquez","2021-11-03 16:51:21","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("602","SVelasquez","2021-11-03 16:51:34","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("603","SVelasquez","2021-11-03 16:52:04","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("604","SVelasquez","2021-11-03 16:52:08","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("605","SVelasquez","2021-11-03 16:52:08","/hidroven/php/restore.php","");
INSERT INTO rutas VALUES("606","SVelasquez","2021-11-03 16:53:10","/hidroven/php/restore.php","");
INSERT INTO rutas VALUES("607","SVelasquez","2021-11-03 16:53:33","/hidroven/php/restore.php","");
INSERT INTO rutas VALUES("608","SVelasquez","2021-11-03 16:53:45","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("609","SVelasquez","2021-11-03 16:53:57","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("610","SVelasquez","2021-11-03 16:54:00","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("611","SVelasquez","2021-11-03 16:54:25","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("612","SVelasquez","2021-11-03 16:54:28","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("613","SVelasquez","2021-11-03 16:54:30","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("614","SVelasquez","2021-11-03 16:55:18","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("615","SVelasquez","2021-11-03 16:55:35","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("616","SVelasquez","2021-11-03 16:55:38","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("617","SVelasquez","2021-11-03 16:55:40","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("618","SVelasquez","2021-11-03 16:55:43","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("619","SVelasquez","2021-11-03 16:55:45","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("620","SVelasquez","2021-11-03 16:56:11","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("621","SVelasquez","2021-11-03 16:56:13","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("622","SVelasquez","2021-11-03 16:56:15","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("623","SVelasquez","2021-11-03 16:56:17","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("624","SVelasquez","2021-11-03 16:56:35","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("625","SVelasquez","2021-11-03 16:56:38","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("626","SVelasquez","2021-11-03 16:56:39","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("627","SVelasquez","2021-11-03 16:56:40","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("628","SVelasquez","2021-11-03 16:56:41","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("629","SVelasquez","2021-11-03 16:56:43","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("630","SVelasquez","2021-11-03 16:56:44","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("631","SVelasquez","2021-11-03 16:56:45","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("632","SVelasquez","2021-11-03 16:56:47","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("633","SVelasquez","2021-11-03 16:56:58","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("634","SVelasquez","2021-11-03 16:56:59","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("635","SVelasquez","2021-11-03 16:57:01","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("636","SVelasquez","2021-11-03 16:57:02","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("637","SVelasquez","2021-11-03 16:57:03","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("638","SVelasquez","2021-11-03 16:57:04","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("639","SVelasquez","2021-11-03 16:57:07","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("640","SVelasquez","2021-11-03 16:57:23","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("641","SVelasquez","2021-11-03 16:57:51","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("642","SVelasquez","2021-11-03 16:58:44","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("643","SVelasquez","2021-11-03 16:59:50","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("644","SVelasquez","2021-11-03 16:59:54","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("645","SVelasquez","2021-11-03 16:59:56","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("646","SVelasquez","2021-11-03 16:59:57","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("647","SVelasquez","2021-11-03 17:00:06","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("648","SVelasquez","2021-11-03 17:00:27","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("649","SVelasquez","2021-11-03 17:00:30","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("650","SVelasquez","2021-11-03 17:01:13","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("651","SVelasquez","2021-11-03 17:01:21","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("652","SVelasquez","2021-11-03 17:01:25","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("653","SVelasquez","2021-11-03 17:01:27","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("654","SVelasquez","2021-11-03 17:01:32","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("655","SVelasquez","2021-11-03 17:01:44","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("656","SVelasquez","2021-11-03 17:01:52","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("657","SVelasquez","2021-11-03 17:01:54","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("658","SVelasquez","2021-11-03 17:02:04","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("659","SVelasquez","2021-11-03 17:02:04","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("660","SVelasquez","2021-11-03 17:02:05","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("661","SVelasquez","2021-11-03 17:02:05","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("662","SVelasquez","2021-11-03 17:02:06","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("663","SVelasquez","2021-11-03 17:04:46","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("664","SVelasquez","2021-11-03 17:04:51","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("665","SVelasquez","2021-11-03 17:05:00","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("666","SVelasquez","2021-11-03 17:05:01","/hidroven/php/editar.php","");
INSERT INTO rutas VALUES("667","SVelasquez","2021-11-03 17:05:07","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("668","SVelasquez","2021-11-03 17:08:20","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("669","SVelasquez","2021-11-03 17:08:52","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("670","SVelasquez","2021-11-03 17:10:50","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("671","SVelasquez","2021-11-03 17:10:56","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("672","SVelasquez","2021-11-03 17:10:57","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("673","SVelasquez","2021-11-03 17:10:57","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("674","SVelasquez","2021-11-03 17:10:58","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("675","SVelasquez","2021-11-03 17:11:05","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("676","SVelasquez","2021-11-03 17:13:05","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("677","SVelasquez","2021-11-03 17:13:28","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("678","SVelasquez","2021-11-03 17:13:48","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("679","SVelasquez","2021-11-03 17:13:56","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("680","SVelasquez","2021-11-03 17:14:37","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("681","SVelasquez","2021-11-03 17:14:43","/hidroven/assets/header.php","");
INSERT INTO rutas VALUES("682","SVelasquez","2021-11-03 17:15:22","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("683","SVelasquez","2021-11-03 17:15:55","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("684","SVelasquez","2021-11-03 17:16:32","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("685","SVelasquez","2021-11-03 17:16:52","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("686","SVelasquez","2021-11-03 17:17:51","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("687","SVelasquez","2021-11-03 17:18:40","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("688","SVelasquez","2021-11-03 17:19:07","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("689","SVelasquez","2021-11-03 17:19:37","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("690","SVelasquez","2021-11-03 17:20:01","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("691","SVelasquez","2021-11-03 17:20:03","/hidroven/php/recibos.php","");
INSERT INTO rutas VALUES("692","SVelasquez","2021-11-03 17:20:06","/hidroven/php/bitacora.php","");
INSERT INTO rutas VALUES("693","SVelasquez","2021-11-03 17:20:07","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("694","SVelasquez","2021-11-03 17:20:27","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("695","SVelasquez","2021-11-03 17:20:28","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("696","SVelasquez","2021-11-03 17:20:29","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("697","SVelasquez","2021-11-03 17:20:31","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("698","SVelasquez","2021-11-03 17:20:32","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("699","SVelasquez","2021-11-03 17:20:34","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("700","SVelasquez","2021-11-03 17:20:35","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("701","SVelasquez","2021-11-03 17:20:37","/hidroven/php/vacaciones.php","");
INSERT INTO rutas VALUES("702","SVelasquez","2021-11-03 17:20:38","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("703","SVelasquez","2021-11-03 17:20:40","/hidroven/php/constancia.php","");
INSERT INTO rutas VALUES("704","SVelasquez","2021-11-03 17:20:41","/hidroven/php/reposo.php","");
INSERT INTO rutas VALUES("705","SVelasquez","2021-11-03 17:36:00","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("706","SVelasquez","2021-11-03 17:36:01","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("707","SVelasquez","2021-11-03 17:36:19","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("708","SVelasquez","2021-11-03 18:33:16","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("709","SVelasquez","2021-11-03 18:33:30","/hidroven/php/perfil.php","");
INSERT INTO rutas VALUES("710","SVelasquez","2021-11-03 18:33:35","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("711","SVelasquez","2021-11-03 18:33:43","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("712","SVelasquez","2021-11-03 18:36:51","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("713","SVelasquez","2021-11-03 18:38:33","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("714","SVelasquez","2021-11-03 18:38:33","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("715","SVelasquez","2021-11-03 18:38:34","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("716","SVelasquez","2021-11-03 18:38:34","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("717","SVelasquez","2021-11-03 18:38:39","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("718","SVelasquez","2021-11-03 18:38:44","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("719","SVelasquez","2021-11-03 18:38:45","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("720","SVelasquez","2021-11-03 18:40:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("721","SVelasquez","2021-11-03 18:40:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("722","SVelasquez","2021-11-03 18:40:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("723","SVelasquez","2021-11-03 18:40:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("724","SVelasquez","2021-11-03 18:40:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("725","SVelasquez","2021-11-03 18:40:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("726","SVelasquez","2021-11-03 18:40:27","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("727","SVelasquez","2021-11-03 18:40:27","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("728","SVelasquez","2021-11-03 18:40:27","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("729","SVelasquez","2021-11-03 18:40:27","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("730","SVelasquez","2021-11-03 18:40:28","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("731","SVelasquez","2021-11-03 18:40:28","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("732","SVelasquez","2021-11-03 18:40:28","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("733","SVelasquez","2021-11-03 18:40:29","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("734","SVelasquez","2021-11-03 18:40:29","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("735","SVelasquez","2021-11-03 18:40:29","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("736","SVelasquez","2021-11-03 18:41:12","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("737","SVelasquez","2021-11-03 18:41:12","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("738","SVelasquez","2021-11-03 18:41:12","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("739","SVelasquez","2021-11-03 18:41:13","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("740","SVelasquez","2021-11-03 18:41:13","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("741","SVelasquez","2021-11-03 18:41:13","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("742","SVelasquez","2021-11-03 18:41:21","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("743","SVelasquez","2021-11-03 18:41:22","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("744","SVelasquez","2021-11-03 18:41:22","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("745","SVelasquez","2021-11-03 18:41:22","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("746","SVelasquez","2021-11-03 18:41:22","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("747","SVelasquez","2021-11-03 18:41:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("748","SVelasquez","2021-11-03 18:41:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("749","SVelasquez","2021-11-03 18:41:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("750","SVelasquez","2021-11-03 18:41:24","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("751","SVelasquez","2021-11-03 18:41:27","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("752","SVelasquez","2021-11-03 18:41:28","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("753","SVelasquez","2021-11-03 18:42:01","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("754","SVelasquez","2021-11-03 18:42:01","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("755","SVelasquez","2021-11-03 18:42:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("756","SVelasquez","2021-11-03 18:42:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("757","SVelasquez","2021-11-03 18:42:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("758","SVelasquez","2021-11-03 18:42:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("759","SVelasquez","2021-11-03 18:42:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("760","SVelasquez","2021-11-03 18:42:03","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("761","SVelasquez","2021-11-03 18:42:03","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("762","SVelasquez","2021-11-03 18:42:03","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("763","SVelasquez","2021-11-03 18:42:03","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("764","SVelasquez","2021-11-03 18:42:18","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("765","SVelasquez","2021-11-03 18:42:20","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("766","SVelasquez","2021-11-03 18:42:22","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("767","SVelasquez","2021-11-03 18:42:25","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("768","SVelasquez","2021-11-03 18:42:25","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("769","SVelasquez","2021-11-03 18:42:25","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("770","SVelasquez","2021-11-03 18:42:25","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("771","SVelasquez","2021-11-03 18:42:28","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("772","SVelasquez","2021-11-03 18:42:29","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("773","SVelasquez","2021-11-03 18:42:50","/hidroven/php/index.php","");
INSERT INTO rutas VALUES("774","SVelasquez","2021-11-03 18:42:52","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("775","SVelasquez","2021-11-03 18:42:53","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("776","SVelasquez","2021-11-03 18:45:31","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("777","SVelasquez","2021-11-03 18:46:08","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("778","SVelasquez","2021-11-03 18:47:05","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("779","SVelasquez","2021-11-03 18:47:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("780","SVelasquez","2021-11-03 18:47:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("781","SVelasquez","2021-11-03 18:47:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("782","SVelasquez","2021-11-03 18:47:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("783","SVelasquez","2021-11-03 18:47:38","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("784","SVelasquez","2021-11-03 18:48:51","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("785","SVelasquez","2021-11-03 18:49:10","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("786","SVelasquez","2021-11-03 18:49:17","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("787","SVelasquez","2021-11-03 18:50:08","/hidroven/php/","");
INSERT INTO rutas VALUES("788","SVelasquez","2021-11-03 18:51:09","/hidroven/php/db_select.php","");
INSERT INTO rutas VALUES("789","SVelasquez","2021-11-03 18:51:10","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("790","SVelasquez","2021-11-03 18:51:37","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("791","SVelasquez","2021-11-03 18:52:08","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("792","SVelasquez","2021-11-03 18:54:48","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("793","SVelasquez","2021-11-03 18:55:33","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("794","SVelasquez","2021-11-03 18:56:45","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("795","SVelasquez","2021-11-03 18:57:01","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("796","SVelasquez","2021-11-03 18:57:32","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("797","SVelasquez","2021-11-03 18:57:34","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("798","SVelasquez","2021-11-03 18:58:29","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("799","SVelasquez","2021-11-03 18:59:49","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("800","SVelasquez","2021-11-03 19:01:34","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("801","SVelasquez","2021-11-03 19:06:02","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("802","SVelasquez","2021-11-03 19:06:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("803","SVelasquez","2021-11-03 19:07:00","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("804","SVelasquez","2021-11-03 19:07:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("805","SVelasquez","2021-11-03 19:08:20","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("806","SVelasquez","2021-11-03 19:10:32","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("807","SVelasquez","2021-11-03 19:11:23","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("808","SVelasquez","2021-11-03 19:11:57","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("809","SVelasquez","2021-11-03 19:12:17","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("810","SVelasquez","2021-11-03 19:12:34","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("811","SVelasquez","2021-11-03 19:12:52","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("812","SVelasquez","2021-11-03 19:15:33","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("813","SVelasquez","2021-11-03 19:16:04","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("814","SVelasquez","2021-11-03 19:16:24","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("815","SVelasquez","2021-11-03 19:16:43","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("816","SVelasquez","2021-11-03 19:17:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("817","SVelasquez","2021-11-03 19:17:46","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("818","SVelasquez","2021-11-03 19:18:11","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("819","SVelasquez","2021-11-03 19:19:32","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("820","SVelasquez","2021-11-03 19:20:04","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("821","SVelasquez","2021-11-03 19:20:26","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("822","SVelasquez","2021-11-03 19:20:49","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("823","SVelasquez","2021-11-03 19:21:01","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("824","SVelasquez","2021-11-03 19:21:21","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("825","SVelasquez","2021-11-03 19:21:43","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("826","SVelasquez","2021-11-03 19:22:17","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("827","SVelasquez","2021-11-03 19:22:41","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("828","SVelasquez","2021-11-03 19:23:49","/hidroven/php/backup.php","");
INSERT INTO rutas VALUES("829","SVelasquez","2021-11-03 19:32:05","/hidroven/php/backup.php","");
DROP TABLE IF EXISTS telefono;
CREATE TABLE `telefono` (
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`cedula`,`telefono`),
  KEY `cedula_idx` (`cedula`),
  CONSTRAINT `cedula` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS temp;
CREATE TABLE `temp` (
  `cedula` varchar(8) NOT NULL DEFAULT '0',
  `userid` varchar(12) NOT NULL DEFAULT 'username',
  `clave` varchar(60) NOT NULL DEFAULT 'password',
  `p_nombre` varchar(25) DEFAULT 'nombre',
  `s_nombre` varchar(25) DEFAULT NULL,
  `p_apellido` varchar(25) DEFAULT 'apellido',
  `s_apellido` varchar(25) DEFAULT NULL,
  `nacionalidad` tinyint(1) DEFAULT 1,
  `admin` tinyint(1) DEFAULT 0,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_nac` date DEFAULT '0001-01-01',
  `fecha_ing` date DEFAULT '0001-01-01',
  `cargo` varchar(30) DEFAULT 'cargo',
  `dpto` varchar(2) DEFAULT '00',
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `userid` (`userid`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `dpto` (`dpto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE `usuarios` (
  `cedula` varchar(8) NOT NULL DEFAULT '0',
  `userid` varchar(12) NOT NULL DEFAULT 'username',
  `clave` varchar(60) NOT NULL DEFAULT 'password',
  `p_nombre` varchar(25) DEFAULT 'nombre',
  `s_nombre` varchar(25) DEFAULT NULL,
  `p_apellido` varchar(25) DEFAULT 'apellido',
  `s_apellido` varchar(25) DEFAULT NULL,
  `nacionalidad` tinyint(1) DEFAULT 1,
  `admin` tinyint(1) DEFAULT 0,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_nac` date DEFAULT '0001-01-01',
  `fecha_ing` date DEFAULT '0001-01-01',
  `cargo` varchar(30) DEFAULT 'cargo',
  `dpto` varchar(2) DEFAULT '00',
  `salario` float DEFAULT 0,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `userid` (`userid`),
  KEY `dpto` (`dpto`),
  CONSTRAINT `dpto` FOREIGN KEY (`dpto`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO usuarios VALUES("11562812","YHerrera","$2y$10$XBlkrrP3Be23Df52/7bSaO5rgqxOiAPEX.ovI9VKhNl01epZpJpjG","Yerlín","Naizami","Herrea","","1","0","1","2009-02-12","2021-10-13","Gerente de Sistemas","14","0");
INSERT INTO usuarios VALUES("26254447","SVelasquez","$2y$10$UXV1.lO3aCCzOrwMh/.q/.tSqJfFAjeGr8fsvxK4GTwlEPyivYRUe","Samuel","David","Velásquez","Núñez","1","1","1","1998-02-18","2020-12-07","Pasante","01","0");
INSERT INTO usuarios VALUES("26254448","SamiVN","$2y$10$uKw9sRcX.fsTZlybMtt6Gu1jx8BJ16PkZYoEEpIq9xOB0u9stondK","Samantha","Sofía","Velásquez","Núñez","1","0","1","1998-02-18","2021-10-12","Ingeniero Civil","01","0");
