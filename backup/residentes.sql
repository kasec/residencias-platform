-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: residentes
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_control` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES ('Pepe El','Toro es inocente','1304155','Female',1);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES ('ojo de agua sa.de.cv','dom. conocido ojo de agua de san juan','34860',1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros`
--

DROP TABLE IF EXISTS `maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maestros` (
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tarjeta` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` VALUES ('Joel ','Ramirez Barboza','17041554','Masculino',3);
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos` (
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES ('Ene - Jun 2019',1),('Ago - Dic 2019',2),('Ene - Jun 2020',3),('Ago - Dic 2020',4),('Ene - Jun 2021',5),('Ago - Dic 2021',6);
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residencias`
--

DROP TABLE IF EXISTS `residencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residencias` (
  `nom_alumno` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_maestro` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_empresa` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periodo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_residencia` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_proyecto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_alumnos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areas` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lenguajes` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_datos` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ideas` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frames` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residencias`
--

LOCK TABLES `residencias` WRITE;
/*!40000 ALTER TABLE `residencias` DISABLE KEYS */;
INSERT INTO `residencias` VALUES ('Pepe El Toro es inocente','Joel  Ramirez Barboza','ojo de agua sa.de.cv','Ene - Jun 2019','terminado','TICs','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15),('Pepe El Toro es inocente','Joel  Ramirez Barboza','ojo de agua sa.de.cv','Ene - Jun 2021','en proceso','TICs','','','privado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,16),('Pepe El Toro es inocente','Joel  Ramirez Barboza','ojo de agua sa.de.cv','Ago - Dic 2021','en proceso','Informatica','','','privado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,17),('Pepe El Toro es inocente','Joel  Ramirez Barboza','ojo de agua sa.de.cv','Ago - Dic 2021','terminado','Informatica','','','publico',NULL,NULL,NULL,NULL,NULL,NULL,NULL,18),('Pepe El Toro es inocente','Joel  Ramirez Barboza','','Ago - Dic 2019','terminado','Sistemas','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19);
/*!40000 ALTER TABLE `residencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-09 23:39:54
