-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: exa
-- ------------------------------------------------------
-- Server version	5.6.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_modulos`
--

DROP TABLE IF EXISTS `admin_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_modulos` (
  `ID_MODULO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MODULO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_MODULO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_modulos`
--

LOCK TABLES `admin_modulos` WRITE;
/*!40000 ALTER TABLE `admin_modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permisos`
--

DROP TABLE IF EXISTS `admin_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_permisos` (
  `ID_ROL` int(11) NOT NULL,
  `ID_MODULO` int(11) NOT NULL,
  `PRIORIDAD` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_MODULO`),
  KEY `FK_REFERENCE_3` (`ID_MODULO`),
  CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_ROL`) REFERENCES `admin_roles` (`ID_ROL`),
  CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_MODULO`) REFERENCES `admin_modulos` (`ID_MODULO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permisos`
--

LOCK TABLES `admin_permisos` WRITE;
/*!40000 ALTER TABLE `admin_permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'admin');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_usuarios`
--

DROP TABLE IF EXISTS `admin_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(30) NOT NULL,
  `CLAVE` varchar(200) NOT NULL,
  `ESTADO` varchar(2) NOT NULL,
  `FECHA_REGISTRO` datetime NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `ID_PERSONA` int(11) DEFAULT NULL,
  `FOTOGRAFIA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_REFERENCE_1` (`ID_ROL`),
  KEY `FK_REFERENCE_7` (`ID_PERSONA`),
  CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_ROL`) REFERENCES `admin_roles` (`ID_ROL`),
  CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tab_personas` (`ID_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_usuarios`
--

LOCK TABLES `admin_usuarios` WRITE;
/*!40000 ALTER TABLE `admin_usuarios` DISABLE KEYS */;
INSERT INTO `admin_usuarios` VALUES (1,'root','63a9f0ea7bb98050796b649e85481845','AC','2017-11-15 00:00:00',1,1,NULL);
/*!40000 ALTER TABLE `admin_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_asistencia`
--

DROP TABLE IF EXISTS `tab_asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_asistencia` (
  `ID_ASISTENCIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `ASISTENCIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ASISTENCIA`),
  KEY `FK_REFERENCE_9` (`ID_PERSONA`),
  CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tab_personas` (`ID_PERSONA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_asistencia`
--

LOCK TABLES `tab_asistencia` WRITE;
/*!40000 ALTER TABLE `tab_asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_cargos`
--

DROP TABLE IF EXISTS `tab_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_cargos` (
  `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT,
  `CARGO` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_cargos`
--

LOCK TABLES `tab_cargos` WRITE;
/*!40000 ALTER TABLE `tab_cargos` DISABLE KEYS */;
INSERT INTO `tab_cargos` VALUES (1,'estudiante');
/*!40000 ALTER TABLE `tab_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_meses`
--

DROP TABLE IF EXISTS `tab_meses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_meses` (
  `ID_MES` int(11) NOT NULL AUTO_INCREMENT,
  `MES` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MES`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_meses`
--

LOCK TABLES `tab_meses` WRITE;
/*!40000 ALTER TABLE `tab_meses` DISABLE KEYS */;
INSERT INTO `tab_meses` VALUES (1,'ENERO'),(2,'FEBRERO'),(3,'MARZO');
/*!40000 ALTER TABLE `tab_meses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_pagos`
--

DROP TABLE IF EXISTS `tab_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_pagos` (
  `ID_PAGO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) DEFAULT NULL,
  `TOTAL` float DEFAULT NULL,
  `FECHA_REGISTRO` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PAGO`),
  KEY `FK_REFERENCE_12` (`ID_PERSONA`),
  CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_PERSONA`) REFERENCES `tab_personas` (`ID_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_pagos`
--

LOCK TABLES `tab_pagos` WRITE;
/*!40000 ALTER TABLE `tab_pagos` DISABLE KEYS */;
INSERT INTO `tab_pagos` VALUES (1,NULL,9.232,'2017-11-09 00:00:00');
/*!40000 ALTER TABLE `tab_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_pagos_mes`
--

DROP TABLE IF EXISTS `tab_pagos_mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_pagos_mes` (
  `ID_PAGO` int(11) DEFAULT NULL,
  `ID_MES` int(11) DEFAULT NULL,
  `MESES` int(11) DEFAULT NULL,
  KEY `FK_REFERENCE_11` (`ID_MES`),
  KEY `FK_REFERENCE_8` (`ID_PAGO`),
  CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_MES`) REFERENCES `tab_meses` (`ID_MES`),
  CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_PAGO`) REFERENCES `tab_pagos` (`ID_PAGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_pagos_mes`
--

LOCK TABLES `tab_pagos_mes` WRITE;
/*!40000 ALTER TABLE `tab_pagos_mes` DISABLE KEYS */;
INSERT INTO `tab_pagos_mes` VALUES (1,1,1),(1,2,2),(1,3,0);
/*!40000 ALTER TABLE `tab_pagos_mes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_personas`
--

DROP TABLE IF EXISTS `tab_personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab_personas` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CARGO` int(11) DEFAULT NULL,
  `NOMBRES` varchar(30) DEFAULT NULL,
  `APELLIDOS` varchar(30) DEFAULT NULL,
  `CEDULA` varchar(30) DEFAULT NULL,
  `NRO_TELEFONO` varchar(50) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(60) DEFAULT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`),
  KEY `FK_REFERENCE_10` (`ID_CARGO`),
  CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_CARGO`) REFERENCES `tab_cargos` (`ID_CARGO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_personas`
--

LOCK TABLES `tab_personas` WRITE;
/*!40000 ALTER TABLE `tab_personas` DISABLE KEYS */;
INSERT INTO `tab_personas` VALUES (1,1,'Andres','Galindo','1234567890','0987654321','korbold@live.com','2017-11-16');
/*!40000 ALTER TABLE `tab_personas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-30 19:12:19
