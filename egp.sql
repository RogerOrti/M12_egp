CREATE DATABASE  IF NOT EXISTS `egp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `egp`;
-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: egp
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `estat_tasca`
--

DROP TABLE IF EXISTS `estat_tasca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estat_tasca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_estat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estat_tasca`
--

LOCK TABLES `estat_tasca` WRITE;
/*!40000 ALTER TABLE `estat_tasca` DISABLE KEYS */;
/*!40000 ALTER TABLE `estat_tasca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectes`
--

DROP TABLE IF EXISTS `projectes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectes`
--

LOCK TABLES `projectes` WRITE;
/*!40000 ALTER TABLE `projectes` DISABLE KEYS */;
INSERT INTO `projectes` VALUES (1,'Projecte prova'),(2,'EGP Projecte '),(3,'EGP Projecte 2');
/*!40000 ALTER TABLE `projectes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'admin'),(2,'usuari_rojecte');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasques`
--

DROP TABLE IF EXISTS `tasques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_tasca` varchar(50) DEFAULT NULL,
  `desc_tasca` text,
  `data_inici` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `id_usuari` int DEFAULT NULL,
  `id_projecte` int DEFAULT NULL,
  `id_tipus` int DEFAULT NULL,
  `id_estat` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuari` (`id_usuari`),
  KEY `id_projecte` (`id_projecte`),
  KEY `id_tipus` (`id_tipus`),
  KEY `id_estat` (`id_estat`),
  CONSTRAINT `tasques_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `usuaris` (`id`),
  CONSTRAINT `tasques_ibfk_2` FOREIGN KEY (`id_projecte`) REFERENCES `projectes` (`id`),
  CONSTRAINT `tasques_ibfk_3` FOREIGN KEY (`id_tipus`) REFERENCES `tipus_tasca` (`id`),
  CONSTRAINT `tasques_ibfk_4` FOREIGN KEY (`id_estat`) REFERENCES `estat_tasca` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasques`
--

LOCK TABLES `tasques` WRITE;
/*!40000 ALTER TABLE `tasques` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipus_tasca`
--

DROP TABLE IF EXISTS `tipus_tasca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipus_tasca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_tipus` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_tasca`
--

LOCK TABLES `tipus_tasca` WRITE;
/*!40000 ALTER TABLE `tipus_tasca` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipus_tasca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuaris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `contrasenya` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris`
--

LOCK TABLES `usuaris` WRITE;
/*!40000 ALTER TABLE `usuaris` DISABLE KEYS */;
INSERT INTO `usuaris` VALUES (1,'Roger','$2y$10$bGjbeaXVfk1jTXfY/P29jufukOcrdZcjfSPYZNo7pgYBLyO03jwMy'),(2,'Pepe','$2y$10$GxqsxFsuukyvtoSVXIaA7ukqSYMWV6IPQZJUlEmNas3hLtyEMr82K');
/*!40000 ALTER TABLE `usuaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuaris_projecte_rol`
--

DROP TABLE IF EXISTS `usuaris_projecte_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuaris_projecte_rol` (
  `id_usuaris` int NOT NULL,
  `id_projectes` int NOT NULL,
  `id_rol` int DEFAULT NULL,
  PRIMARY KEY (`id_usuaris`,`id_projectes`),
  KEY `id_projectes` (`id_projectes`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuaris_projecte_rol_ibfk_1` FOREIGN KEY (`id_usuaris`) REFERENCES `usuaris` (`id`),
  CONSTRAINT `usuaris_projecte_rol_ibfk_2` FOREIGN KEY (`id_projectes`) REFERENCES `projectes` (`id`),
  CONSTRAINT `usuaris_projecte_rol_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris_projecte_rol`
--

LOCK TABLES `usuaris_projecte_rol` WRITE;
/*!40000 ALTER TABLE `usuaris_projecte_rol` DISABLE KEYS */;
INSERT INTO `usuaris_projecte_rol` VALUES (1,2,1),(1,3,1),(2,1,1);
/*!40000 ALTER TABLE `usuaris_projecte_rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-22 19:50:31
