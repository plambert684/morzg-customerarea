-- MariaDB dump 10.19  Distrib 10.11.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: clientarea
-- ------------------------------------------------------
-- Server version	10.11.2-MariaDB-1:10.11.2+maria~ubu2004

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
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_pk` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES
(2,'1',1,1),
(3,'1',1,4);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_status`
--

DROP TABLE IF EXISTS `invoice_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `icon` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_status`
--

LOCK TABLES `invoice_status` WRITE;
/*!40000 ALTER TABLE `invoice_status` DISABLE KEYS */;
INSERT INTO `invoice_status` VALUES
(1,'paid','success','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M9 11l3 3l8 -8\"></path>\n   <path d=\"M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9\"></path>\n</svg>'),
(2,'unpaid','danger','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z\"></path>\n   <path d=\"M12 8v4\"></path>\n   <path d=\"M12 16h.01\"></path>\n</svg>'),
(3,'canceled','secondary','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M3 3l18 18\"></path>\n   <path d=\"M7 3h7l5 5v7m0 4a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-14\"></path>\n</svg>'),
(4,'refunded','info','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M14 3v4a1 1 0 0 0 1 1h4\"></path>\n   <path d=\"M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z\"></path>\n   <path d=\"M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5\"></path>\n   <path d=\"M12 17v1m0 -8v1\"></path>\n</svg>'),
(5,'fraud','warning','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385\"></path>\n   <path d=\"M6 9l4 4\"></path>\n   <path d=\"M13 10l-4 -4\"></path>\n   <path d=\"M3 21h7\"></path>\n   <path d=\"M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0z\"></path>\n</svg>');
/*!40000 ALTER TABLE `invoice_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_support_ticket`
--

DROP TABLE IF EXISTS `message_support_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_support_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `support_ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_support_ticket`
--

LOCK TABLES `message_support_ticket` WRITE;
/*!40000 ALTER TABLE `message_support_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_support_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `vat_total_price` float NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES
(1,'05/03/2023',0.99,1.19,2,1,2),
(2,'17/03/2023',8,10,3,1,2);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES
(1,11.78,'LB-XS',1),
(2,4.54,'LB-M',1);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_paiement`
--

DROP TABLE IF EXISTS `order_paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(255) NOT NULL,
  `transaction_number` varchar(255) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_paiement`
--

LOCK TABLES `order_paiement` WRITE;
/*!40000 ALTER TABLE `order_paiement` DISABLE KEYS */;
INSERT INTO `order_paiement` VALUES
(1,'PayPal','XXXXXXXXXXXXXXXXX',1);
/*!40000 ALTER TABLE `order_paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES
(1,'LB-XS',1,'LoadBalancer de petite taille',1),
(2,'ServerManager-PRO',2,'Licence ServerManager PRO',2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `icon` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES
(1,'Load Balancer','primary','dist/img/services/loadbalancer_icon.svg'),
(2,'Software','info','dist/img/services/software_icon.svg');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES
(1,'05/03/23','05/04/23',NULL,1,1,1,1),
(3,'05/03/23','05/04/23',NULL,2,1,1,1);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_ticket`
--

DROP TABLE IF EXISTS `support_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `service_concerned_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_ticket`
--

LOCK TABLES `support_ticket` WRITE;
/*!40000 ALTER TABLE `support_ticket` DISABLE KEYS */;
INSERT INTO `support_ticket` VALUES
(1,'Problème ServerPro-Manager',1,NULL,NULL,1,1);
/*!40000 ALTER TABLE `support_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_ticket_department`
--

DROP TABLE IF EXISTS `support_ticket_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_ticket_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_ticket_department`
--

LOCK TABLES `support_ticket_department` WRITE;
/*!40000 ALTER TABLE `support_ticket_department` DISABLE KEYS */;
INSERT INTO `support_ticket_department` VALUES
(1,'billing');
/*!40000 ALTER TABLE `support_ticket_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_ticket_status`
--

DROP TABLE IF EXISTS `support_ticket_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_ticket_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `icon` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_ticket_status`
--

LOCK TABLES `support_ticket_status` WRITE;
/*!40000 ALTER TABLE `support_ticket_status` DISABLE KEYS */;
INSERT INTO `support_ticket_status` VALUES
(1,'open','success','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M3 9l9 6l9 -6l-9 -6l-9 6\"></path>\n   <path d=\"M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10\"></path>\n   <path d=\"M3 19l6 -6\"></path>\n   <path d=\"M15 13l6 6\"></path>\n</svg>'),
(2,'closed','secondary','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M18 6l-12 12\"></path>\n   <path d=\"M6 6l12 12\"></path>\n</svg>'),
(3,'waiting-customer-reply','danger','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4\"></path>\n   <path d=\"M12 8l0 3\"></path>\n   <path d=\"M12 14l0 .01\"></path>\n</svg>'),
(4,'waiting-staff-reply','info','<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon dropdown-item-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n   <path d=\"M8 9h8\"></path>\n   <path d=\"M8 13h6\"></path>\n   <path d=\"M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z\"></path>\n</svg>');
/*!40000 ALTER TABLE `support_ticket_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_pk2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'plambert@corehost-solutions.com','plambert','Paul','Lambert','1 rue Maurice Denis','Saint-Germain-en-Laye','Yvelines',78100,'France',999,'$2y$10$NH0/PmOlWsCxqifJ75OmfevXB8auw/62LMbTa/c7ZQdxhKvnlrklC','fr',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-03 14:02:46
