-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: timekeepersdb
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `beneficios`
--

DROP TABLE IF EXISTS `beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficios`
--

LOCK TABLES `beneficios` WRITE;
/*!40000 ALTER TABLE `beneficios` DISABLE KEYS */;
INSERT INTO `beneficios` VALUES (1,'Alturas','2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'Equipo pesado','2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'Lluvia','2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'Vibración','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'Sótanos','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_salario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8937 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES (5655,'Jose Hernandez','49133','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5946,'Gabriel Gonzalez','78296','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5960,'Jaime Velasquez','55437','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6161,'Pedro Gomez','68614','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6287,'Miguel Rodriguez','80907','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6441,'Enrique Gonzalez','50255','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6654,'Jorge Mendoza','49777','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7574,'Manual Melendez','81913','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7735,'Pedro Lamarte','49546','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7775,'Fernando Alvarado','44001','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7960,'Marta Fernandez','80680','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7965,'Diego Justiniani','66561','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8100,'Ivan Fernandez','88685','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8121,'Andrea Guardia','82928','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8236,'Jorge Rivera','52085','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8362,'Roberto Cherigo','54062','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8413,'Rebeca Martinez','49044','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8703,'Luis Carlos Aguilar','79187','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8749,'Roberto Salgado','61335','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8936,'Juan Alberto Rodriguez','29052','Por hora','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas_beneficios`
--

DROP TABLE IF EXISTS `cuentas_beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas_beneficios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_beneficios`
--

LOCK TABLES `cuentas_beneficios` WRITE;
/*!40000 ALTER TABLE `cuentas_beneficios` DISABLE KEYS */;
INSERT INTO `cuentas_beneficios` VALUES (1,'8.0.7.755 beneficio eaque (rtr)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'1.4.1.223 beneficio alias (nha)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'0.3.3.478 beneficio est (vyu)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'5.7.3.378 beneficio provident (qrh)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'6.9.5.834 beneficio placeat (rwq)','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `cuentas_beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas_costos`
--

DROP TABLE IF EXISTS `cuentas_costos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas_costos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_costos`
--

LOCK TABLES `cuentas_costos` WRITE;
/*!40000 ALTER TABLE `cuentas_costos` DISABLE KEYS */;
INSERT INTO `cuentas_costos` VALUES (1,'1.3.1.303.9.','Demarcacion / Batambores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'1.3.1.304.9.','Limpieza (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'1.3.1.308.9.','Oficina/deposito construcc (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'1.3.1.309.9.','Cerca/Vallas/Aleros aceras (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'1.3.1.330.9.','Campamento (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6,'1.3.1.331.9.','Instalacion de Sanitarios (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7,'1.3.1.332.9.','Comedores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8,'1.3.1.334.9.','Instalacion de Cocina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(9,'1.3.2.101.9.','Desmonte (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(10,'1.3.2.102.9.','Desraigue (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(11,'1.3.2.103.9.','Drenajes temporales (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(12,'1.3.2.335.9.','Trampa de grasa (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(13,'1.3.2.401.9.','Viga-ducto electrica (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(14,'1.3.2.402.9.','Camara de transformador (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(15,'1.3.2.403.9.','Camara electrica de paso (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(16,'1.3.2.410.9.','Viga-ducto de telefonos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(17,'1.3.2.411.9.','Camara de telefonos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(18,'1.3.2.420.9.','Sub Estacion Electrica (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(19,'1.3.2.599.9.','MDO de Calles de Acceso (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(20,'1.3.2.699.9.','MDO de Pavimentos  (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(21,'1.3.2.799.9.','MDO de Cerca de Ciclon  (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(22,'1.3.2.899.9.','MDO de Muro de Reten (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(23,'1.3.2.901.9.','Garita (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(24,'1.3.2.902.9.','Tinaquera (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(25,'1.3.2.903.9.','Maceteros completos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(26,'1.3.2.904.9.','Jardineria (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(27,'1.3.2.905.9.','Aceras (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(28,'1.3.2.906.9.','Cordon comun (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(29,'1.3.2.907.9.','Cordon cuneta (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(30,'1.3.2.908.9.','Tope de Estacionamiento (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(31,'1.3.2.909.9.','Media Cana (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(32,'1.3.2.910.9.','Bolardos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(33,'1.3.2.912.9.','Parachoques (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(34,'1.3.2.915.9.','Puente de Acceso (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(35,'1.3.2.916.9.','Bumpers de Anden (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(36,'1.3.3.30.9.','Losa Hidrostatica (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(37,'1.3.3.40.9.','Foso de Ascensor (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(38,'1.3.3.50.9.','Tanque de agua soterrado (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(39,'1.3.3.60.9.','Piscina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(40,'1.3.3.61.9.','Espejo de Agua (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(41,'1.3.3.70.9.','Tanque de Agua Elevado (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(42,'1.3.3.80.9.','Fosos de Achique (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(43,'1.3.3.160.9.','Matt Foundation (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(44,'1.3.3.199.9.','Mdo de Cabezales y Zapatas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(45,'1.3.3.260.9.','Vigas de tranferencia (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(46,'1.3.3.299.9.','Mdo de Vigas Sismicas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(47,'1.3.3.399.9.','Mdo de Fundaciones Corridas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(48,'1.3.3.499.9.','MDO de Piso sobre tierra (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(49,'1.3.3.599.9.','MDO de Columnas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(50,'1.3.3.699.9.','MDO de Shear walls (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(51,'1.3.3.701.9.','Outriggers (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(52,'1.3.3.799.9.','MDO de Vigas  de concreto (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(53,'1.3.3.864.9.','Pedestales de Torres de Enfriamiento (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(54,'1.3.3.899.9.','MDO de Losa Postensada (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(55,'1.3.3.990.9.','MDO de Estructura (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(56,'1.3.3.999.9.','MDO de Escaleras (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(57,'1.3.4.109.9.','Replanteo (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(58,'1.3.4.126.9.','Demolicion de paredes (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(59,'1.3.4.143.9.','Albanileria para subcntrts (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(60,'1.3.4.152.9.','Paredes de Covintec (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(61,'1.3.4.153.9.','Paredes de Plycem (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(62,'1.3.4.154.9.','Descolgados (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(63,'1.3.4.197.9.','Albanileria repar.dSbcntrt (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(64,'1.3.4.190.9.','Mano de Obra de Paredes (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(65,'1.3.4.290.9.','Mano de Obra de Repello (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(66,'1.3.4.402.9.','Pedestales (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(67,'1.3.4.403.9.','Capiteles (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(68,'1.3.4.404.9.','Baranda, balaustr, pirndls (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(69,'1.3.5.101.9.','Platos y planchas de acero (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(70,'1.3.5.102.9.','Pernos de fijacion (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(71,'1.3.5.103.9.','Columnas WF (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(72,'1.3.5.104.9.','Columnas de tubo (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(73,'1.3.5.105.9.','Cerchas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(74,'1.3.5.106.9.','Marcos rigidos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(75,'1.3.5.107.9.','Vigas WF (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(76,'1.3.5.108.9.','Refuerzos y miscelaneos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(77,'1.3.5.109.9.','Tensores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(78,'1.3.5.201.9.','Sostenedores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(79,'1.3.5.202.9.','Alineadores barra + tuerca (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(80,'1.3.5.203.9.','Alineadores de platina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(81,'1.3.5.204.9.','Carriols glv. 3\"x2\" cl. 16 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(82,'1.3.5.205.9.','Carriols glv. 4\"x2\" cl. 16 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(83,'1.3.5.206.9.','Carriols glv. 6\"x2\" cl. 16 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(84,'1.3.5.207.9.','Carriols glv. 8\"x2\" cl. 16 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(85,'1.3.5.208.9.','Carrls glv 10\"x2.5\" cal 16 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(86,'1.3.5.399.9.','Mano de obra Metaldeck (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(87,'1.3.5.801.9.','Cubierta de junta de piso (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(88,'1.3.5.802.9.','Cubierta de junta de pared (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(89,'1.3.5.803.9.','Cubierta junta cielo ras (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(90,'1.3.5.804.9.','Cubierta de junta de techo (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(91,'1.3.7.201.9.','Fiberglass 1-1/2\"+alambre (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(92,'1.3.7.202.9.','Fiberglass 2\"+ alambre (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(93,'1.3.7.203.9.','Fiberglass 3\"+ alambre (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(94,'1.3.7.204.9.','Aislante tipo Low-e (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(95,'1.3.7.310.9.','Shigles (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(96,'1.3.7.320.9.','Tejas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(97,'1.3.7.401.9.','Laminas cal. 26 galvanizad (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(98,'1.3.7.402.9.','Laminas cal. 26 esmaltado (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(99,'1.3.7.403.9.','Laminas cal. 24 esmaltado (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(100,'1.3.7.404.9.','Laminas cal. 26 aluzinc (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(101,'1.3.7.405.9.','Tornillos de techo (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(102,'1.3.7.406.9.','Cumbreras (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(103,'1.3.7.415.9.','Paneles prefabricados pard (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(104,'1.3.7.460.9.','Laminas esmaltadas pared (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(105,'1.3.7.601.9.','Solapas cal. 20 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(106,'1.3.7.602.9.','Canales pluvials cl. 16<4\' (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(107,'1.3.7.603.9.','Canales pluvials cl. 16>4\' (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(108,'1.3.7.604.9.','Canales especiales (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(109,'1.3.7.605.9.','Cuellos para bajantes (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(110,'1.3.7.606.9.','Bajantes pluviales PVC 4\"0 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(111,'1.3.7.607.9.','Bajantes pluviales PVC 6\"0 (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(112,'1.3.7.608.9.','Codos y miscelaneos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(113,'1.3.9.785.9.','Moldura de Aluminio (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(114,'1.3.9.901.9.','Preparacion de superficie (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(115,'1.3.9.902.9.','Pintura paredes interiores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(116,'1.3.9.903.9.','Pintura paredes exteriores (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(117,'1.3.9.904.9.','Pintura elementos metalics (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(118,'1.3.9.905.9.','Pintura de pisos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(119,'1.3.9.906.9.','Pintura de puertas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(120,'1.3.9.907.9.','Pintura de pavimentos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(121,'1.3.10.201.9.','Persianas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(122,'1.3.10.202.9.','Parrillas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(123,'1.3.10.203.9.','Mallas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(124,'1.3.10.204.9.','Ventilaciones (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(125,'1.3.10.210.9.','Escotilla (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(126,'1.3.10.701.9.','Accesorios de bano (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(127,'1.3.10.702.9.','Gabinete medico (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(128,'1.3.10.703.9.','Accesorios de cocina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(129,'1.3.10.704.9.','Accesorios de lavanderia (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(130,'1.3.10.705.9.','Accesorios de closets (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(131,'1.3.13.801.9.','Estructura de Piscina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(132,'1.3.17.401.9.','Grua Torre (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(133,'1.3.17.403.9.','Montacargas (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(134,'1.3.17.901.9.','Mant. equipo y formaleta (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(135,'1.3.19.501.9.','Manejo de materiales (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(136,'1.3.19.502.9.','Limpieza continua + chuta (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(137,'1.3.19.503.9.','Terminacion / Acabado finl (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(138,'1.3.19.504.9.','Mantenimiento post-entrega (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(139,'1.3.19.506.9.','Proteccion de Acabados (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(140,'1.3.19.507.9.','Manteni.Aceras y Calles (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(141,'1.3.19.524.9.','Rampa de lavado de camiones (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(142,'1.3.19.530.9.','Custodio de Llaves (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(143,'1.3.19.591.9.','Limpieza de oficina (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(144,'1.3.19.592.9.','Limpieza Final (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(145,'1.3.20.101.9.','Ingeniero residente (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(146,'1.3.20.102.9.','Capataces / Jefes cuadrill (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(147,'1.3.20.103.9.','Timekeeper (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(148,'1.3.20.104.9.','Almacenista (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(149,'1.3.20.106.9.','Gerente de Proyecto (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(150,'1.3.20.107.9.','Ingeniero Asistente (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(151,'1.3.20.108.9.','Asistente Administrativo (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(152,'1.3.20.109.9.','Ingeniero Control Calidad (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(153,'1.3.20.110.9.','Administracion Proyectos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(154,'1.3.20.111.9.','Ingeniero Seguridad (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(155,'1.3.20.112.9.','Ing. electromecanico/plomr (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(156,'1.3.20.113.9.','Arquitecto de Acabados (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(157,'1.3.20.114.9.','Sub capataz (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(158,'1.3.20.120.9.','Capacitacion de Personal (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(159,'1.3.20.125.9.','Control de Costos (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(160,'1.3.20.130.9.','Asesor de Instalacion Plato (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(161,'1.3.20.135.9.','Submitals (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(162,'1.3.20.137.9.','Ing de Estructura Metalica (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(163,'1.3.20.138.9.','Ing. Control de Programacion (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(164,'1.3.20.139.9.','Ing. Logistica y Abastecimiento (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(165,'1.3.20.140.9.','Ing Control Leed (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(166,'1.3.20.141.9.','Arq. Planos As Built (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22'),(167,'1.3.20.201.9.','Pick-up asignado a proyect (MDO)','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `cuentas_costos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriados`
--

LOCK TABLES `feriados` WRITE;
/*!40000 ALTER TABLE `feriados` DISABLE KEYS */;
INSERT INTO `feriados` VALUES (1,'2016-12-18','2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'2016-12-11','2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'2016-12-04','2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'2016-11-23','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'2016-12-14','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6,'2016-12-07','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7,'2016-12-15','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8,'2016-12-19','2016-12-23 13:37:22','2016-12-23 13:37:22'),(9,'2016-11-26','2016-12-23 13:37:22','2016-12-23 13:37:22'),(10,'2016-12-16','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `feriados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas_entrada`
--

DROP TABLE IF EXISTS `horas_entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas_entrada` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_entrada` date NOT NULL,
  `hora_entrada` text COLLATE utf8_unicode_ci NOT NULL,
  `colaborador_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_entrada_colaborador_id_foreign` (`colaborador_id`),
  CONSTRAINT `horas_entrada_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas_entrada`
--

LOCK TABLES `horas_entrada` WRITE;
/*!40000 ALTER TABLE `horas_entrada` DISABLE KEYS */;
INSERT INTO `horas_entrada` VALUES (1,'2016-12-04','07:00',5655,'2016-12-06 13:39:32','2016-12-06 13:39:32'),(2,'2016-12-05','07:30',5655,'2016-12-06 13:39:32','2016-12-06 13:39:32'),(3,'2016-12-06','07:00',5655,'2016-12-06 13:39:32','2016-12-06 13:39:32'),(4,'2016-12-07','07:00',5655,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(5,'2016-12-08','07:00',5655,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(6,'2016-12-09','07:00',5655,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(7,'2016-12-10','07:00',5655,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(8,'2016-12-11','08:00',5655,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(9,'2016-12-12','07:00',5655,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(10,'2016-12-13','07:00',5655,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(11,'2016-12-14','07:00',5655,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(12,'2016-12-15','07:00',5655,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(13,'2016-12-16','07:00',5655,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(14,'2016-12-17','07:00',5655,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(15,'2016-12-18','07:00',5655,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(16,'2016-12-19','07:00',5655,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(17,'2016-12-20','07:00',5655,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(18,'2016-12-21','08:00',5655,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(19,'2016-12-22','08:00',5655,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(20,'2016-12-23','07:00',5655,'2016-12-23 13:47:12','2016-12-23 13:47:12');
/*!40000 ALTER TABLE `horas_entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas_laboradas`
--

DROP TABLE IF EXISTS `horas_laboradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas_laboradas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `colaborador_id` int(10) unsigned NOT NULL,
  `planilla_id` int(10) unsigned NOT NULL,
  `cuenta_costo_id` int(10) unsigned NOT NULL,
  `beneficio_id` int(10) unsigned NOT NULL,
  `cuenta_beneficio_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_laboradas_colaborador_id_foreign` (`colaborador_id`),
  KEY `horas_laboradas_planilla_id_foreign` (`planilla_id`),
  KEY `horas_laboradas_cuenta_costo_id_foreign` (`cuenta_costo_id`),
  KEY `horas_laboradas_beneficio_id_foreign` (`beneficio_id`),
  KEY `horas_laboradas_cuenta_beneficio_id_foreign` (`cuenta_beneficio_id`),
  CONSTRAINT `horas_laboradas_cuenta_beneficio_id_foreign` FOREIGN KEY (`cuenta_beneficio_id`) REFERENCES `cuentas_beneficios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_beneficio_id_foreign` FOREIGN KEY (`beneficio_id`) REFERENCES `beneficios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_cuenta_costo_id_foreign` FOREIGN KEY (`cuenta_costo_id`) REFERENCES `cuentas_costos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_planilla_id_foreign` FOREIGN KEY (`planilla_id`) REFERENCES `planillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas_laboradas`
--

LOCK TABLES `horas_laboradas` WRITE;
/*!40000 ALTER TABLE `horas_laboradas` DISABLE KEYS */;
INSERT INTO `horas_laboradas` VALUES (1,5655,1,14,1,1,'2016-12-06 13:39:33','2016-12-06 13:39:33'),(2,5655,1,10,2,2,'2016-12-09 13:40:29','2016-12-09 13:40:29');
/*!40000 ALTER TABLE `horas_laboradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas_laboradas_detalles`
--

DROP TABLE IF EXISTS `horas_laboradas_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas_laboradas_detalles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_laborada` date NOT NULL,
  `horas_laboradas` double(8,2) NOT NULL,
  `horas_laborada_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_laboradas_detalles_horas_laborada_id_foreign` (`horas_laborada_id`),
  CONSTRAINT `horas_laboradas_detalles_horas_laborada_id_foreign` FOREIGN KEY (`horas_laborada_id`) REFERENCES `horas_laboradas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas_laboradas_detalles`
--

LOCK TABLES `horas_laboradas_detalles` WRITE;
/*!40000 ALTER TABLE `horas_laboradas_detalles` DISABLE KEYS */;
INSERT INTO `horas_laboradas_detalles` VALUES (1,'2016-12-04',8.00,1,'2016-12-06 13:39:33','2016-12-06 13:39:33'),(2,'2016-12-05',8.00,1,'2016-12-06 13:39:33','2016-12-06 13:39:33'),(3,'2016-12-06',10.00,1,'2016-12-06 13:39:33','2016-12-06 13:39:33'),(4,'2016-12-07',4.00,1,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(5,'2016-12-08',8.00,1,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(6,'2016-12-09',0.00,1,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(7,'2016-12-07',8.00,2,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(8,'2016-12-08',3.00,2,'2016-12-09 13:40:29','2016-12-09 13:40:29'),(9,'2016-12-09',12.00,2,'2016-12-09 13:40:30','2016-12-09 13:40:30'),(10,'2016-12-10',4.00,1,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(11,'2016-12-11',5.00,1,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(12,'2016-12-12',16.00,1,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(13,'2016-12-10',4.00,2,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(14,'2016-12-11',3.00,2,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(15,'2016-12-12',0.00,2,'2016-12-12 13:41:18','2016-12-12 13:41:18'),(16,'2016-12-13',8.00,1,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(17,'2016-12-14',8.00,1,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(18,'2016-12-13',0.00,2,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(19,'2016-12-14',0.00,2,'2016-12-14 13:42:03','2016-12-14 13:42:03'),(20,'2016-12-15',10.00,1,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(21,'2016-12-16',0.00,1,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(22,'2016-12-17',10.00,1,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(23,'2016-12-15',0.00,2,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(24,'2016-12-16',10.00,2,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(25,'2016-12-17',0.00,2,'2016-12-17 13:45:29','2016-12-17 13:45:29'),(26,'2016-12-18',9.00,1,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(27,'2016-12-19',9.00,1,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(28,'2016-12-20',9.00,1,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(29,'2016-12-18',0.00,2,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(30,'2016-12-19',0.00,2,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(31,'2016-12-20',3.00,2,'2016-12-20 13:46:09','2016-12-20 13:46:09'),(32,'2016-12-21',10.00,1,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(33,'2016-12-22',0.00,1,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(34,'2016-12-23',10.00,1,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(35,'2016-12-21',0.00,2,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(36,'2016-12-22',10.00,2,'2016-12-23 13:47:12','2016-12-23 13:47:12'),(37,'2016-12-23',0.00,2,'2016-12-23 13:47:12','2016-12-23 13:47:12');
/*!40000 ALTER TABLE `horas_laboradas_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas_laboradas_recargos`
--

DROP TABLE IF EXISTS `horas_laboradas_recargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas_laboradas_recargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_laborada` date NOT NULL,
  `horas_laboradas` double NOT NULL,
  `codigo_recargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas_laborada_id` int(10) unsigned NOT NULL,
  `colaborador_id` int(10) unsigned NOT NULL,
  `planilla_id` int(10) unsigned NOT NULL,
  `cuenta_costo_id` int(10) unsigned NOT NULL,
  `beneficio_id` int(10) unsigned NOT NULL,
  `cuenta_beneficio_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_laboradas_recargos_codigo_recargo_foreign` (`codigo_recargo`),
  KEY `horas_laboradas_recargos_horas_laborada_id_foreign` (`horas_laborada_id`),
  KEY `horas_laboradas_recargos_colaborador_id_foreign` (`colaborador_id`),
  KEY `horas_laboradas_recargos_planilla_id_foreign` (`planilla_id`),
  KEY `horas_laboradas_recargos_cuenta_costo_id_foreign` (`cuenta_costo_id`),
  KEY `horas_laboradas_recargos_beneficio_id_foreign` (`beneficio_id`),
  KEY `horas_laboradas_recargos_cuenta_beneficio_id_foreign` (`cuenta_beneficio_id`),
  CONSTRAINT `horas_laboradas_recargos_cuenta_beneficio_id_foreign` FOREIGN KEY (`cuenta_beneficio_id`) REFERENCES `cuentas_beneficios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_beneficio_id_foreign` FOREIGN KEY (`beneficio_id`) REFERENCES `beneficios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_codigo_recargo_foreign` FOREIGN KEY (`codigo_recargo`) REFERENCES `recargos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_cuenta_costo_id_foreign` FOREIGN KEY (`cuenta_costo_id`) REFERENCES `cuentas_costos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_horas_laborada_id_foreign` FOREIGN KEY (`horas_laborada_id`) REFERENCES `horas_laboradas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_laboradas_recargos_planilla_id_foreign` FOREIGN KEY (`planilla_id`) REFERENCES `planillas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas_laboradas_recargos`
--

LOCK TABLES `horas_laboradas_recargos` WRITE;
/*!40000 ALTER TABLE `horas_laboradas_recargos` DISABLE KEYS */;
INSERT INTO `horas_laboradas_recargos` VALUES (1,'2016-12-04',8,'C_2_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(2,'2016-12-05',8,'C_1_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(3,'2016-12-06',8,'C_1_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(4,'2016-12-06',2,'C_1_88',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(5,'2016-12-07',4,'C_3_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(6,'2016-12-07',4,'C_3_00',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(7,'2016-12-07',2.5,'C_3_12',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(8,'2016-12-07',0.5,'C_3_75',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(9,'2016-12-07',1,'C_6_56',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(10,'2016-12-08',3,'C_1_00',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(11,'2016-12-08',5,'C_1_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(12,'2016-12-08',2.5,'C_1_25',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(13,'2016-12-08',0.5,'C_1_50',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(14,'2016-12-09',8,'C_1_00',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(15,'2016-12-09',2.5,'C_2_18',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(16,'2016-12-09',1.5,'C_2_63',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(17,'2016-12-10',4,'C_1_00',2,5655,1,10,2,2,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(18,'2016-12-10',4,'C_1_00',1,5655,1,14,1,1,'2016-12-14 13:42:19','2016-12-14 13:42:19'),(19,'2016-12-11',5,'C_2_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(20,'2016-12-11',3,'C_2_00',2,5655,1,10,2,2,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(21,'2016-12-12',8,'C_1_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(22,'2016-12-12',2.5,'C_1_88',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(23,'2016-12-12',0.5,'C_2_25',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(24,'2016-12-12',5,'C_3_94',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(25,'2016-12-13',0,'C_1_00',2,5655,1,10,2,2,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(26,'2016-12-13',8,'C_1_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(27,'2016-12-14',8,'C_3_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(28,'2016-12-15',8,'C_3_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(29,'2016-12-15',1,'C_3_12',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(30,'2016-12-15',1,'C_5_47',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(31,'2016-12-16',0,'C_3_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(32,'2016-12-16',8,'C_3_00',2,5655,1,10,2,2,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(33,'2016-12-16',0,'C_5_47',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(34,'2016-12-16',2,'C_5_47',2,5655,1,10,2,2,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(35,'2016-12-17',8,'C_1_00',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47'),(36,'2016-12-17',2,'C_3_94',1,5655,1,14,1,1,'2016-12-23 13:47:47','2016-12-23 13:47:47');
/*!40000 ALTER TABLE `horas_laboradas_recargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas_logs`
--

DROP TABLE IF EXISTS `horas_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` text COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `action` text COLLATE utf8_unicode_ci NOT NULL,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas_logs`
--

LOCK TABLES `horas_logs` WRITE;
/*!40000 ALTER TABLE `horas_logs` DISABLE KEYS */;
INSERT INTO `horas_logs` VALUES (1,'horas_entrada',1,'{\"fecha_entrada\":\"2016-12-04\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-06 09:39:32\",\"created_at\":\"2016-12-06 09:39:32\",\"id\":1}','add','2','2016-12-06 13:39:32','2016-12-06 13:39:32'),(2,'horas_entrada',2,'{\"fecha_entrada\":\"2016-12-05\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:30\",\"updated_at\":\"2016-12-06 09:39:32\",\"created_at\":\"2016-12-06 09:39:32\",\"id\":2}','add','2','2016-12-06 13:39:32','2016-12-06 13:39:32'),(3,'horas_entrada',3,'{\"fecha_entrada\":\"2016-12-06\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-06 09:39:32\",\"created_at\":\"2016-12-06 09:39:32\",\"id\":3}','add','2','2016-12-06 13:39:32','2016-12-06 13:39:32'),(4,'horas_laboradas',1,'{\"colaborador_id\":5655,\"planilla_id\":1,\"cuenta_costo_id\":14,\"beneficio_id\":1,\"cuenta_beneficio_id\":1,\"updated_at\":\"2016-12-06 09:39:33\",\"created_at\":\"2016-12-06 09:39:33\",\"id\":1}','add','2','2016-12-06 13:39:33','2016-12-06 13:39:33'),(5,'horas_laboradas_detalles',1,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-04\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-06 09:39:33\",\"created_at\":\"2016-12-06 09:39:33\",\"id\":1}','add','2','2016-12-06 13:39:33','2016-12-06 13:39:33'),(6,'horas_laboradas_detalles',2,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-05\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-06 09:39:33\",\"created_at\":\"2016-12-06 09:39:33\",\"id\":2}','add','2','2016-12-06 13:39:33','2016-12-06 13:39:33'),(7,'horas_laboradas_detalles',3,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-06\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-06 09:39:33\",\"created_at\":\"2016-12-06 09:39:33\",\"id\":3}','add','2','2016-12-06 13:39:33','2016-12-06 13:39:33'),(8,'horas_entrada',4,'{\"fecha_entrada\":\"2016-12-07\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":4}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(9,'horas_entrada',5,'{\"fecha_entrada\":\"2016-12-08\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":5}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(10,'horas_entrada',6,'{\"fecha_entrada\":\"2016-12-09\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":6}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(11,'horas_laboradas_detalles',4,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-07\",\"horas_laboradas\":4,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":4}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(12,'horas_laboradas_detalles',5,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-08\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":5}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(13,'horas_laboradas_detalles',6,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-09\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":6}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(14,'horas_laboradas',2,'{\"colaborador_id\":5655,\"planilla_id\":1,\"cuenta_costo_id\":10,\"beneficio_id\":2,\"cuenta_beneficio_id\":2,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":2}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(15,'horas_laboradas_detalles',7,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-07\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":7}','add','2','2016-12-09 13:40:29','2016-12-09 13:40:29'),(16,'horas_laboradas_detalles',8,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-08\",\"horas_laboradas\":3,\"updated_at\":\"2016-12-09 09:40:29\",\"created_at\":\"2016-12-09 09:40:29\",\"id\":8}','add','2','2016-12-09 13:40:30','2016-12-09 13:40:30'),(17,'horas_laboradas_detalles',9,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-09\",\"horas_laboradas\":12,\"updated_at\":\"2016-12-09 09:40:30\",\"created_at\":\"2016-12-09 09:40:30\",\"id\":9}','add','2','2016-12-09 13:40:30','2016-12-09 13:40:30'),(18,'horas_entrada',7,'{\"fecha_entrada\":\"2016-12-10\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":7}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(19,'horas_entrada',8,'{\"fecha_entrada\":\"2016-12-11\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"08:00\",\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":8}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(20,'horas_entrada',9,'{\"fecha_entrada\":\"2016-12-12\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":9}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(21,'horas_laboradas_detalles',10,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-10\",\"horas_laboradas\":4,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":10}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(22,'horas_laboradas_detalles',11,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-11\",\"horas_laboradas\":5,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":11}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(23,'horas_laboradas_detalles',12,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-12\",\"horas_laboradas\":16,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":12}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(24,'horas_laboradas_detalles',13,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-10\",\"horas_laboradas\":4,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":13}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(25,'horas_laboradas_detalles',14,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-11\",\"horas_laboradas\":3,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":14}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(26,'horas_laboradas_detalles',15,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-12\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-12 09:41:18\",\"created_at\":\"2016-12-12 09:41:18\",\"id\":15}','add','2','2016-12-12 13:41:18','2016-12-12 13:41:18'),(27,'horas_entrada',10,'{\"fecha_entrada\":\"2016-12-13\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":10}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(28,'horas_entrada',11,'{\"fecha_entrada\":\"2016-12-14\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":11}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(29,'horas_laboradas_detalles',16,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-13\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":16}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(30,'horas_laboradas_detalles',17,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-14\",\"horas_laboradas\":8,\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":17}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(31,'horas_laboradas_detalles',18,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-13\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":18}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(32,'horas_laboradas_detalles',19,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-14\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-14 09:42:03\",\"created_at\":\"2016-12-14 09:42:03\",\"id\":19}','add','2','2016-12-14 13:42:03','2016-12-14 13:42:03'),(33,'horas_entrada',12,'{\"fecha_entrada\":\"2016-12-15\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":12}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(34,'horas_entrada',13,'{\"fecha_entrada\":\"2016-12-16\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":13}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(35,'horas_entrada',14,'{\"fecha_entrada\":\"2016-12-17\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":14}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(36,'horas_laboradas_detalles',20,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-15\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":20}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(37,'horas_laboradas_detalles',21,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-16\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":21}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(38,'horas_laboradas_detalles',22,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-17\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":22}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(39,'horas_laboradas_detalles',23,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-15\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":23}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(40,'horas_laboradas_detalles',24,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-16\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":24}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(41,'horas_laboradas_detalles',25,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-17\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-17 09:45:29\",\"created_at\":\"2016-12-17 09:45:29\",\"id\":25}','add','2','2016-12-17 13:45:29','2016-12-17 13:45:29'),(42,'horas_entrada',15,'{\"fecha_entrada\":\"2016-12-18\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":15}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(43,'horas_entrada',16,'{\"fecha_entrada\":\"2016-12-19\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":16}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(44,'horas_entrada',17,'{\"fecha_entrada\":\"2016-12-20\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":17}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(45,'horas_laboradas_detalles',26,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-18\",\"horas_laboradas\":9,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":26}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(46,'horas_laboradas_detalles',27,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-19\",\"horas_laboradas\":9,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":27}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(47,'horas_laboradas_detalles',28,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-20\",\"horas_laboradas\":9,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":28}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(48,'horas_laboradas_detalles',29,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-18\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":29}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(49,'horas_laboradas_detalles',30,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-19\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":30}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(50,'horas_laboradas_detalles',31,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-20\",\"horas_laboradas\":3,\"updated_at\":\"2016-12-20 09:46:09\",\"created_at\":\"2016-12-20 09:46:09\",\"id\":31}','add','2','2016-12-20 13:46:09','2016-12-20 13:46:09'),(51,'horas_entrada',18,'{\"fecha_entrada\":\"2016-12-21\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"08:00\",\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":18}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(52,'horas_entrada',19,'{\"fecha_entrada\":\"2016-12-22\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"08:00\",\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":19}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(53,'horas_entrada',20,'{\"fecha_entrada\":\"2016-12-23\",\"colaborador_id\":\"5655\",\"hora_entrada\":\"07:00\",\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":20}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(54,'horas_laboradas_detalles',32,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-21\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":32}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(55,'horas_laboradas_detalles',33,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-22\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":33}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(56,'horas_laboradas_detalles',34,'{\"horas_laborada_id\":1,\"fecha_laborada\":\"2016-12-23\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":34}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(57,'horas_laboradas_detalles',35,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-21\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":35}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(58,'horas_laboradas_detalles',36,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-22\",\"horas_laboradas\":10,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":36}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12'),(59,'horas_laboradas_detalles',37,'{\"horas_laborada_id\":2,\"fecha_laborada\":\"2016-12-23\",\"horas_laboradas\":0,\"updated_at\":\"2016-12-23 09:47:12\",\"created_at\":\"2016-12-23 09:47:12\",\"id\":37}','add','2','2016-12-23 13:47:12','2016-12-23 13:47:12');
/*!40000 ALTER TABLE `horas_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2333 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2312,'2014_10_12_000000_create_users_table',1),(2313,'2014_10_12_100000_create_password_resets_table',1),(2314,'2016_06_01_000001_create_oauth_auth_codes_table',1),(2315,'2016_06_01_000002_create_oauth_access_tokens_table',1),(2316,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(2317,'2016_06_01_000004_create_oauth_clients_table',1),(2318,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(2319,'2016_10_25_044948_create_colaboradores_table',1),(2320,'2016_10_25_045858_create_proyectos_table',1),(2321,'2016_10_25_050048_create_planillas_table',1),(2322,'2016_10_25_191106_create_horas_entrada_table',1),(2323,'2016_10_26_173525_create_cuentas_costos_table',1),(2324,'2016_10_26_174917_create_cuentas_beneficios_table',1),(2325,'2016_10_26_175624_create_beneficios_table',1),(2326,'2016_10_26_180330_create_horas_laboradas_table',1),(2327,'2016_10_26_235126_create_horas_laboradas_detalles_table',1),(2328,'2016_11_07_142307_create_horas_log_table',1),(2329,'2016_12_17_115246_create_feriados_table',1),(2330,'2016_12_22_151357_create_recargos_table',1),(2331,'2016_12_22_152944_create_horas_laboradas_recargos_table',1),(2332,'2016_12_22_160757_create_semanas_procesadas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planillas`
--

DROP TABLE IF EXISTS `planillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planillas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `proyecto_id` int(10) unsigned NOT NULL,
  `colaborador_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planillas_proyecto_id_foreign` (`proyecto_id`),
  KEY `planillas_colaborador_id_foreign` (`colaborador_id`),
  CONSTRAINT `planillas_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `planillas_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planillas`
--

LOCK TABLES `planillas` WRITE;
/*!40000 ALTER TABLE `planillas` DISABLE KEYS */;
INSERT INTO `planillas` VALUES (1,'PL564564',1,5655,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'PL564564',1,6287,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'PL564564',1,7574,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'PL564564',1,8236,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'PL564564',1,6161,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(6,'PL894985',2,6654,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(7,'PL894985',2,8936,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(8,'PL894985',2,5960,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(9,'PL894985',2,8703,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(10,'PL894985',2,8749,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(11,'PL894985',2,7965,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(12,'PL894985',2,8413,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(13,'PL894985',2,8121,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(14,'PL321564',5,8100,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(15,'PL321564',5,7735,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(16,'PL321564',5,6441,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(17,'PL321564',5,7775,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(18,'PL321564',5,8362,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(19,'PL321564',5,7960,'2016-12-23 13:37:22','2016-12-23 13:37:22'),(20,'PL321564',5,5946,'2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `planillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'P2015-01 Santa Maria Plaza','2016-12-23 13:37:22','2016-12-23 13:37:22'),(2,'P2015-07 Aquavita','2016-12-23 13:37:22','2016-12-23 13:37:22'),(3,'P2015-08 Aria Estructura y Albañileria','2016-12-23 13:37:22','2016-12-23 13:37:22'),(4,'P2015-09 Aria Acabados','2016-12-23 13:37:22','2016-12-23 13:37:22'),(5,'P2015-12 Casablanca','2016-12-23 13:37:22','2016-12-23 13:37:22'),(6,'P2015-15 King\'s Park Torre 500 Estructura','2016-12-23 13:37:22','2016-12-23 13:37:22'),(7,'P2016-36 King\'s Park Torre 500 Terminacion','2016-12-23 13:37:22','2016-12-23 13:37:22'),(8,'P2015-16 Torre Global Bank','2016-12-23 13:37:22','2016-12-23 13:37:22'),(9,'P2015-17 Green Garden','2016-12-23 13:37:22','2016-12-23 13:37:22'),(10,'P2015-19 Albatross','2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recargos`
--

DROP TABLE IF EXISTS `recargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recargos` (
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recargo` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recargos`
--

LOCK TABLES `recargos` WRITE;
/*!40000 ALTER TABLE `recargos` DISABLE KEYS */;
INSERT INTO `recargos` VALUES ('C_1_00','Horas a 1.00',1,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_1_25','Horas a 1.25',1.25,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_1_50','Horas a 1.50',1.5,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_1_88','Horas a 1.88',1.88,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_2_00','Horas a 2.00',2,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_2_18','Horas a 2.18',2.18,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_2_25','Horas a 2.25',2.25,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_2_50','Horas a 2.50',2.5,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_2_63','Horas a 2.63',2.63,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_3_00','Horas a 3.00',3,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_3_12','Horas a 3.12',3.12,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_3_28','Horas a 3.28',3.28,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_3_75','Horas a 3.75',3.75,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_3_94','Horas a 3.94',3.94,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_5_47','Horas a 5.47',5.47,'2016-12-23 13:37:22','2016-12-23 13:37:22'),('C_6_56','Horas a 6.56',6.56,'2016-12-23 13:37:22','2016-12-23 13:37:22');
/*!40000 ALTER TABLE `recargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semanas_procesadas`
--

DROP TABLE IF EXISTS `semanas_procesadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semanas_procesadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semanas_procesadas`
--

LOCK TABLES `semanas_procesadas` WRITE;
/*!40000 ALTER TABLE `semanas_procesadas` DISABLE KEYS */;
INSERT INTO `semanas_procesadas` VALUES (1,'48','2016-12-14 13:42:19','2016-12-14 13:42:19'),(2,'49','2016-12-23 13:47:47','2016-12-23 13:47:47');
/*!40000 ALTER TABLE `semanas_procesadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` enum('admin','timekeeper') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Timekeeper','info@wlacruz.com.ve','$2y$10$P.exlkyj.mMySc.GvBeraezVEO1ngt2Il0fux5RYQ0qCkyhKWUbLu','admin',NULL,NULL,NULL),(2,'Wuilliam','wuilliam321@gmail.com','$2y$10$HSuSK7gj0uVPj9T4bvO/sucWIPGVKsbfidDeNjmWFHTOF5xMrLyJu','timekeeper','K9m4hFBSAbtHA82eHj8J9nEGFcKjBTawqlaosFnPwUTgIVZV2u5vKE73T561',NULL,'2016-12-23 15:20:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-23 12:40:36
