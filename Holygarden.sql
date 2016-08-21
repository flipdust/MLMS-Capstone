CREATE DATABASE  IF NOT EXISTS `dbholygarden` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbholygarden`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: dbholygarden
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `tblacunit`
--

DROP TABLE IF EXISTS `tblacunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblacunit` (
  `intUnitID` int(11) NOT NULL AUTO_INCREMENT,
  `strUnitName` varchar(45) NOT NULL,
  `intUnitStatus` int(11) NOT NULL,
  `intCapacity` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intLevelAshID` int(11) NOT NULL,
  PRIMARY KEY (`intUnitID`),
  KEY `fk_tblacunit_intLevelAshID_idx` (`intLevelAshID`),
  CONSTRAINT `fk_tblacunit_intLevelAshID` FOREIGN KEY (`intLevelAshID`) REFERENCES `tbllevelash` (`intLevelAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblacunit`
--

LOCK TABLES `tblacunit` WRITE;
/*!40000 ALTER TABLE `tblacunit` DISABLE KEYS */;
INSERT INTO `tblacunit` VALUES (26,'A0001',0,2,0,83),(27,'A0002',0,2,0,83),(28,'B0001',0,2,0,86),(29,'B0002',0,2,0,86);
/*!40000 ALTER TABLE `tblacunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblashcrypt`
--

DROP TABLE IF EXISTS `tblashcrypt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblashcrypt` (
  `intAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strAshName` varchar(45) NOT NULL,
  `intNoOfLevel` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intAshID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblashcrypt`
--

LOCK TABLES `tblashcrypt` WRITE;
/*!40000 ALTER TABLE `tblashcrypt` DISABLE KEYS */;
INSERT INTO `tblashcrypt` VALUES (8,'masaya',2,0),(9,'malungkot',2,0);
/*!40000 ALTER TABLE `tblashcrypt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblblock`
--

DROP TABLE IF EXISTS `tblblock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblblock` (
  `intBlockID` int(11) NOT NULL AUTO_INCREMENT,
  `strBlockName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intSectionID` int(11) NOT NULL,
  `intTypeID` int(11) NOT NULL,
  PRIMARY KEY (`intBlockID`),
  KEY `fk_tblblock_intSectionID_idx` (`intSectionID`),
  KEY `fk_tblblock_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblblock_intSectionID` FOREIGN KEY (`intSectionID`) REFERENCES `tblsection` (`intSectionID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblblock_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblblock`
--

LOCK TABLES `tblblock` WRITE;
/*!40000 ALTER TABLE `tblblock` DISABLE KEYS */;
INSERT INTO `tblblock` VALUES (35,'A',2,0,16,20),(36,'B',2,0,16,20),(37,'A',2,0,15,19),(38,'B',2,0,15,19);
/*!40000 ALTER TABLE `tblblock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscount`
--

DROP TABLE IF EXISTS `tbldiscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldiscount` (
  `intDiscountID` int(11) NOT NULL AUTO_INCREMENT,
  `strDescription` varchar(45) NOT NULL,
  `dblPercent` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intServiceID` int(11) NOT NULL,
  PRIMARY KEY (`intDiscountID`),
  KEY `fk_tbldiscount_intServiceID_idx` (`intServiceID`),
  CONSTRAINT `fk_tbldiscount_intServiceID` FOREIGN KEY (`intServiceID`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscount`
--

LOCK TABLES `tbldiscount` WRITE;
/*!40000 ALTER TABLE `tbldiscount` DISABLE KEYS */;
INSERT INTO `tbldiscount` VALUES (8,'Senior Citizen',0.1,0,9),(9,'5 niche',0.1,0,10);
/*!40000 ALTER TABLE `tbldiscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemployee`
--

DROP TABLE IF EXISTS `tblemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblemployee` (
  `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  PRIMARY KEY (`intEmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemployee`
--

LOCK TABLES `tblemployee` WRITE;
/*!40000 ALTER TABLE `tblemployee` DISABLE KEYS */;
INSERT INTO `tblemployee` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `tblemployee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstallmentash`
--

DROP TABLE IF EXISTS `tblinstallmentash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstallmentash` (
  `intInstallmentAshID` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) NOT NULL,
  `strUnitName` varchar(45) NOT NULL,
  `strLevelName` varchar(45) NOT NULL,
  `strAshName` varchar(45) NOT NULL,
  `intTerm` int(11) NOT NULL,
  `dblRate` double NOT NULL,
  `dblDownpayment` double NOT NULL,
  `dblBalance` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationAshID` int(11) NOT NULL,
  PRIMARY KEY (`intInstallmentAshID`),
  KEY `fk_intReservationAshID_tblinstallmentash_idx` (`intReservationAshID`),
  CONSTRAINT `fk_intReservationAshID_tblinstallmentash` FOREIGN KEY (`intReservationAshID`) REFERENCES `tblreservationash` (`intReservationAsh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstallmentash`
--

LOCK TABLES `tblinstallmentash` WRITE;
/*!40000 ALTER TABLE `tblinstallmentash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinstallmentash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstallmentlot`
--

DROP TABLE IF EXISTS `tblinstallmentlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstallmentlot` (
  `intInstallmentLotID` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strLotName` varchar(45) NOT NULL,
  `strBlockName` varchar(45) NOT NULL,
  `strSectionName` varchar(45) NOT NULL,
  `intTerm` int(11) NOT NULL,
  `dblRate` double NOT NULL,
  `dblDownpayment` double NOT NULL,
  `dblBalance` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationLotID` int(11) NOT NULL,
  PRIMARY KEY (`intInstallmentLotID`),
  KEY `fk_intReservationLotID_tblinstallmentlot_idx` (`intReservationLotID`),
  CONSTRAINT `fk_intReservationLotID_tblinstallmentlot` FOREIGN KEY (`intReservationLotID`) REFERENCES `tblreservationlot` (`intReservationLot_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstallmentlot`
--

LOCK TABLES `tblinstallmentlot` WRITE;
/*!40000 ALTER TABLE `tblinstallmentlot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblinstallmentlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinterest`
--

DROP TABLE IF EXISTS `tblinterest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinterest` (
  `intInterestID` int(11) NOT NULL AUTO_INCREMENT,
  `intYear` int(11) NOT NULL,
  `dblPercent` double NOT NULL,
  `intTypeID` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intAtNeed` tinyint(4) NOT NULL,
  PRIMARY KEY (`intInterestID`),
  KEY `fk_tblInterest_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblinterest_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinterest`
--

LOCK TABLES `tblinterest` WRITE;
/*!40000 ALTER TABLE `tblinterest` DISABLE KEYS */;
INSERT INTO `tblinterest` VALUES (22,1,0.12,19,0,1),(23,1,0.12,20,0,1),(24,2,0.14,19,0,0),(25,2,0.14,20,0,0);
/*!40000 ALTER TABLE `tblinterest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinterestforlevel`
--

DROP TABLE IF EXISTS `tblinterestforlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinterestforlevel` (
  `intInterestID` int(11) NOT NULL AUTO_INCREMENT,
  `intYear` int(11) NOT NULL,
  `dblPercent` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intLevelAshID` int(11) NOT NULL,
  `intAtNeed` tinyint(4) NOT NULL,
  PRIMARY KEY (`intInterestID`),
  KEY `fk_tblinterestforlevel_intLevelAshID_idx` (`intLevelAshID`),
  CONSTRAINT `fk_tblinterestforlevel_intLevelAshID` FOREIGN KEY (`intLevelAshID`) REFERENCES `tbllevelash` (`intLevelAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinterestforlevel`
--

LOCK TABLES `tblinterestforlevel` WRITE;
/*!40000 ALTER TABLE `tblinterestforlevel` DISABLE KEYS */;
INSERT INTO `tblinterestforlevel` VALUES (13,1,0.1,0,83,0),(14,2,0.12,0,83,1),(15,1,0.1,0,84,0),(16,2,0.12,0,84,1);
/*!40000 ALTER TABLE `tblinterestforlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllevelash`
--

DROP TABLE IF EXISTS `tbllevelash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllevelash` (
  `intLevelAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strLevelName` varchar(45) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intAshID` int(11) NOT NULL,
  `intNoOfUnit` int(11) NOT NULL,
  `dblSellingPrice` double NOT NULL,
  PRIMARY KEY (`intLevelAshID`),
  KEY `fk_tblLevelAsh_intAshID_idx` (`intAshID`),
  CONSTRAINT `fk_tblLevelAsh_intAshID` FOREIGN KEY (`intAshID`) REFERENCES `tblashcrypt` (`intAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllevelash`
--

LOCK TABLES `tbllevelash` WRITE;
/*!40000 ALTER TABLE `tbllevelash` DISABLE KEYS */;
INSERT INTO `tbllevelash` VALUES (83,'A',0,9,2,30000),(84,'B',0,9,2,30000),(85,'A',0,8,2,30000),(86,'B',0,8,2,30000);
/*!40000 ALTER TABLE `tbllevelash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllot`
--

DROP TABLE IF EXISTS `tbllot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllot` (
  `intLotID` int(11) NOT NULL AUTO_INCREMENT,
  `strLotName` varchar(45) NOT NULL,
  `intLotStatus` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intBlockID` int(11) NOT NULL,
  PRIMARY KEY (`intLotID`),
  KEY `fk_tbllot_intBlockID_idx` (`intBlockID`),
  CONSTRAINT `fk_tbllot_intBlockID` FOREIGN KEY (`intBlockID`) REFERENCES `tblblock` (`intBlockID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllot`
--

LOCK TABLES `tbllot` WRITE;
/*!40000 ALTER TABLE `tbllot` DISABLE KEYS */;
INSERT INTO `tbllot` VALUES (68,'A0001',0,0,35),(69,'A0002',0,0,35),(70,'B0001',0,0,38),(71,'B0002',0,0,38);
/*!40000 ALTER TABLE `tbllot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreservationash`
--

DROP TABLE IF EXISTS `tblreservationash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblreservationash` (
  `intReservationAsh_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strAddress` varchar(100) NOT NULL,
  `strContactNo` varchar(45) NOT NULL,
  `intTypeOfPayment` int(11) NOT NULL,
  `dblReservationFee` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intUnitID` int(11) NOT NULL,
  PRIMARY KEY (`intReservationAsh_id`),
  KEY `fk_tblReservationLot_intUnitID_idx` (`intUnitID`),
  CONSTRAINT `fk_tblReservationAsh_intUnitID` FOREIGN KEY (`intUnitID`) REFERENCES `tblacunit` (`intUnitID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreservationash`
--

LOCK TABLES `tblreservationash` WRITE;
/*!40000 ALTER TABLE `tblreservationash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblreservationash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreservationlot`
--

DROP TABLE IF EXISTS `tblreservationlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblreservationlot` (
  `intReservationLot_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strAddress` varchar(100) NOT NULL,
  `strContactNo` varchar(45) NOT NULL,
  `intTypeOfPayment` int(11) NOT NULL,
  `dblReservationFee` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intLotID` int(11) NOT NULL,
  PRIMARY KEY (`intReservationLot_id`),
  KEY `fk_tblReservationLot_intUnitID_idx` (`intLotID`),
  CONSTRAINT `fk_tblReservationLot_intLotID` FOREIGN KEY (`intLotID`) REFERENCES `tbllot` (`intLotID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreservationlot`
--

LOCK TABLES `tblreservationlot` WRITE;
/*!40000 ALTER TABLE `tblreservationlot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblreservationlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsection`
--

DROP TABLE IF EXISTS `tblsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsection` (
  `intSectionID` int(11) NOT NULL AUTO_INCREMENT,
  `strSectionName` varchar(45) NOT NULL,
  `intNoOfBlock` int(11) NOT NULL,
  `intStatus` tinyint(2) NOT NULL,
  PRIMARY KEY (`intSectionID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsection`
--

LOCK TABLES `tblsection` WRITE;
/*!40000 ALTER TABLE `tblsection` DISABLE KEYS */;
INSERT INTO `tblsection` VALUES (15,'masaya',2,0),(16,'malungkot',2,0);
/*!40000 ALTER TABLE `tblsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservice`
--

DROP TABLE IF EXISTS `tblservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservice` (
  `intServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceName` varchar(45) NOT NULL,
  `dblServicePrice` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intServiceType` int(11) NOT NULL,
  PRIMARY KEY (`intServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservice`
--

LOCK TABLES `tblservice` WRITE;
/*!40000 ALTER TABLE `tblservice` DISABLE KEYS */;
INSERT INTO `tblservice` VALUES (9,'interment service',10000,0,1),(10,'painting of niche',1000,0,0);
/*!40000 ALTER TABLE `tblservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblspotashreserve`
--

DROP TABLE IF EXISTS `tblspotashreserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblspotashreserve` (
  `intSpotAshReserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strUnitName` varchar(45) NOT NULL,
  `strLevelName` varchar(45) NOT NULL,
  `strAshName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL,
  `intStatus` varchar(45) NOT NULL,
  `intReservationAsh_id` int(11) NOT NULL,
  PRIMARY KEY (`intSpotAshReserve_id`),
  KEY `fk_intReservationAsh_id_tblspotashreserve_idx` (`intReservationAsh_id`),
  CONSTRAINT `fk_intReservationAsh_id_tblspotashreserve` FOREIGN KEY (`intReservationAsh_id`) REFERENCES `tblreservationash` (`intReservationAsh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblspotashreserve`
--

LOCK TABLES `tblspotashreserve` WRITE;
/*!40000 ALTER TABLE `tblspotashreserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblspotashreserve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblspotlotreserve`
--

DROP TABLE IF EXISTS `tblspotlotreserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblspotlotreserve` (
  `intSpotLotReserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strLotName` varchar(45) NOT NULL,
  `strBlockName` varchar(45) NOT NULL,
  `strSectionName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationLot_id` int(11) NOT NULL,
  PRIMARY KEY (`intSpotLotReserve_id`),
  KEY `fk_intReservationLotID_tblspotLotReserve_idx` (`intReservationLot_id`),
  CONSTRAINT `fk_intReservationLotID_tblspotLotReserve` FOREIGN KEY (`intReservationLot_id`) REFERENCES `tblreservationlot` (`intReservationLot_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblspotlotreserve`
--

LOCK TABLES `tblspotlotreserve` WRITE;
/*!40000 ALTER TABLE `tblspotlotreserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblspotlotreserve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltypeoflot`
--

DROP TABLE IF EXISTS `tbltypeoflot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltypeoflot` (
  `intTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strTypeName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `dblSellingPrice` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltypeoflot`
--

LOCK TABLES `tbltypeoflot` WRITE;
/*!40000 ALTER TABLE `tbltypeoflot` DISABLE KEYS */;
INSERT INTO `tbltypeoflot` VALUES (19,'Lawn',1,76230,0),(20,'Garden',3,220500,0);
/*!40000 ALTER TABLE `tbltypeoflot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbholygarden'
--

--
-- Dumping routines for database 'dbholygarden'
--
/*!50003 DROP PROCEDURE IF EXISTS `checkBlockCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkBlockCount`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intBlockID) INTO curr FROM tblblock WHERE intSectionID = intID AND intStatus = 0;
	SELECT intNoOfBlock INTO max FROM tblsection WHERE intSectionID = intID;

	SELECT curr, max;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLevel`(IN intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intLevelAshID) INTO curr FROM tbllevelash WHERE intAshID = intID AND intStatus = 0;
	SELECT intNoOfLevel INTO max FROM tblashcrypt WHERE intAshID = intID;

	SELECT curr, max;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLotCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLotCount`(intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;	
	
	SELECT COUNT(intLotID) INTO curr FROM tbllot WHERE intBlockID = intID AND intStatus = 0;
	SELECT intNoOfLot INTO max FROM tblBlock WHERE intBlockID = intID;

	SELECT max,curr;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkUnit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUnit`(IN intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intUnitID) INTO curr FROM tblacunit WHERE intLevelAshID = intID AND intStatus = 0;
	SELECT intNoOfUnit INTO max FROM tbllevelash WHERE intLevelAshID = intID;


	SELECT curr, max;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateAshCrypt` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateAshCrypt`(IN ashID INT)
BEGIN


	UPDATE tblashcrypt set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID IN(select intLevelAshID from tbllevelash
														where intAshID = ashID);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateBlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 1 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 1 WHERE intBlockID = blockID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLevel`(IN LevelAshID INT)
BEGIN


	UPDATE tbllevelash set intStatus = 1 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID = LevelAshID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateLotType` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLotType`(IN typeID INT)
BEGIN

	
	UPDATE tbltypeoflot set intStatus = 1 WHERE intTypeID = typeID;

	UPDATE tblinterest set intStatus = 1 WHERE intTypeID = typeID;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection set intStatus = 1 where intSectionID = sectionId;

	update tblBlock set intStatus = 1 where intSectionID = sectionId;

	update tblLot set intStatus = 1 where intBlockID IN(select intBlockID from tblBlock
														where intSectionID = sectionId);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 1 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 1 WHERE intServiceID = serviceID;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveAshCrypt` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveAshCrypt`(IN ashID INT)
BEGIN


	UPDATE tblashcrypt set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID IN(select intLevelAshID from tbllevelash
														where intAshID = ashID);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveBlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 0 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 0 WHERE intBlockID = blockID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveLevel`(IN LevelAshID INT)
BEGIN


	UPDATE tbllevelash set intStatus = 0 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID = LevelAshID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveLotType` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveLotType`(IN typeID INT)
BEGIN

	
	UPDATE tbltypeoflot set intStatus = 0 WHERE intTypeID = typeID;

	UPDATE tblinterest set intStatus = 0 WHERE intTypeID = typeID;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection set intStatus = 0 where intSectionID = sectionId;

	update tblBlock set intStatus = 0 where intSectionID = sectionId;

	update tblLot set intStatus = 0 where intBlockID IN(select intBlockID from tblBlock
														where intSectionID = sectionId);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 0 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 0 WHERE intServiceID = serviceID;


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

-- Dump completed on 2016-08-20 15:34:28
