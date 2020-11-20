-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `idcategorias` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (2,'MANTENIMIENTO INMUEBLES',1),(4,'ricardo',0),(5,'MANTENIMIENTO MUEBLES',1),(6,'SERVICIOS',1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerimientos`
--

DROP TABLE IF EXISTS `requerimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requerimientos` (
  `idrequerimientos` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_atencion` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `solicitante_idusuarios` int NOT NULL,
  `soporte_idusuarios` int DEFAULT NULL,
  `idcategorias` int NOT NULL,
  `idtipo_servicio` int NOT NULL,
  PRIMARY KEY (`idrequerimientos`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_requerimientos_usuarios1_idx` (`solicitante_idusuarios`),
  KEY `fk_requerimientos_usuarios2_idx` (`soporte_idusuarios`),
  KEY `fk_requerimientos_categorias1_idx` (`idcategorias`),
  KEY `fk_requerimientos_tipo_servicio1_idx` (`idtipo_servicio`),
  CONSTRAINT `fk_requerimientos_categorias1` FOREIGN KEY (`idcategorias`) REFERENCES `categorias` (`idcategorias`),
  CONSTRAINT `fk_requerimientos_tipo_servicio1` FOREIGN KEY (`idtipo_servicio`) REFERENCES `tipo_servicio` (`idtipo_servicio`),
  CONSTRAINT `fk_requerimientos_usuarios1` FOREIGN KEY (`solicitante_idusuarios`) REFERENCES `usuarios` (`idusuarios`),
  CONSTRAINT `fk_requerimientos_usuarios2` FOREIGN KEY (`soporte_idusuarios`) REFERENCES `usuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerimientos`
--

LOCK TABLES `requerimientos` WRITE;
/*!40000 ALTER TABLE `requerimientos` DISABLE KEYS */;
INSERT INTO `requerimientos` VALUES (5,'0001','Reportado','Fugas en los baños','Baños principales',NULL,'2020-11-18 14:36:15',NULL,NULL,5,NULL,2,12),(6,'0002','Reportado','Problemas con tomacorriente sala','sala principal',NULL,'2020-11-19 11:18:06',NULL,NULL,5,NULL,2,14),(7,'0003','cancelado','Problemas con tomacorriente oficina','oficina principal',NULL,'2020-11-19 11:20:02','2020-11-20 00:43:23','2020-11-20 00:43:28',5,4,2,14),(8,'0004','Reportado','limpieza ','pasillo principal',NULL,'2020-11-19 11:22:00',NULL,NULL,5,NULL,6,20),(9,'0005','Reportado','aire acondicionado dañado','oficina principal',NULL,'2020-11-19 11:24:52',NULL,NULL,5,NULL,5,17),(10,'0006','Reportado','Se necesita un transporte para personal','Entrada principal',NULL,'2020-11-19 11:26:05',NULL,NULL,6,NULL,6,21);
/*!40000 ALTER TABLE `requerimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicio` (
  `idtipo_servicio` int NOT NULL AUTO_INCREMENT,
  `servicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorias_idcategorias` int NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtipo_servicio`),
  KEY `fk_tipo_servicio_categorias1_idx` (`categorias_idcategorias`),
  CONSTRAINT `fk_tipo_servicio_categorias1` FOREIGN KEY (`categorias_idcategorias`) REFERENCES `categorias` (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (11,'baño',2,0),(12,'BAÑOS',2,1),(13,'Cielo Raso',2,1),(14,'Eléctrico',2,1),(15,'Pared',2,1),(16,'Puerta',2,1),(17,'Aire acondicionado',5,1),(18,'Archivador',5,1),(19,'Puesto de trabajo',5,1),(20,'Aseo',6,1),(21,'Transporte',6,1);
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `idtipo_usuario` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'administrador'),(2,'soporte'),(3,'solicitante');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idtipo_usuario` int NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuarios_tipo_usuario_idx` (`idtipo_usuario`),
  CONSTRAINT `fk_usuarios_tipo_usuario` FOREIGN KEY (`idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin',12345678,'admin@admin.com','admin',1,1),(2,'mauricio martinez','cra 16 # 46-22',2147483647,'mauricio@mauricio.com','mauricio',2,1),(3,'ricardo rodriguez','el silencio',2147483647,'ricardo@ricardo.com','ricardo',2,0),(4,'alberto martinez','cra 16 # 46-22',2147483647,'alberto@alberto.com','alberto123',2,1),(5,'solicitante','dir solic',3653511,'cadicossamm@gmail.com','solicitante',3,1),(6,'mauricio martinez','cra 16 # 46-22',3653511,'maumarcastil@gmail.com','mau3653511',3,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db'
--
/*!50003 DROP PROCEDURE IF EXISTS `asignar_requerimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `asignar_requerimiento`(in idsoporte int, in codigo varchar(45))
BEGIN
UPDATE requerimientos r SET r.estado = 'en proceso', r.soporte_idusuarios = idsoporte,  r.fecha_atencion = now() WHERE r.codigo = codigo;
SELECT u.email FROM requerimientos r 
inner join usuarios u on r.solicitante_idusuarios = u.idusuarios
where r.codigo = codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cancelar_requerimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelar_requerimiento`(in codigo varchar(45))
BEGIN
UPDATE requerimientos r SET r.estado = 'cancelado',  r.fecha_finalizacion = now() WHERE r.codigo = codigo;

SELECT u.email FROM requerimientos r 
inner join usuarios u on r.solicitante_idusuarios = u.idusuarios
where r.codigo = codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `crear_requerimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_requerimiento`(in descripcion varchar(255), in ubicacion varchar(255), in solicitante int,in categoria int,in servicio int )
BEGIN
declare contador INT;
declare codigo varchar(45);

set contador = (select count(*) from requerimientos);
set codigo = concat("000", contador+1);
INSERT INTO `requerimientos` (`codigo`, `estado`, `descripcion`, `ubicacion`, `solicitante_idusuarios`, `idcategorias`, `idtipo_servicio`) VALUES (codigo, 'Reportado', descripcion, ubicacion, solicitante, categoria, servicio);
select codigo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `finalizar_requerimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `finalizar_requerimiento`(in codigo varchar(45), in detalle varchar(255))
BEGIN
UPDATE requerimientos r SET r.estado = 'atendido', r.detalle = detalle,  r.fecha_finalizacion = now() WHERE r.codigo = codigo;
SELECT u.email FROM requerimientos r 
inner join usuarios u on r.solicitante_idusuarios = u.idusuarios
where r.codigo = codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in email varchar(255), in pass varchar(255))
BEGIN
select u.*, t.tipo from usuarios u
inner join tipo_usuario t on u.idtipo_usuario = t.idtipo_usuario
where u.email = email and u.password = pass;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-20 15:39:30
