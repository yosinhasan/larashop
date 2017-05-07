-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliveries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
INSERT INTO `deliveries` VALUES (1,25,NULL,'2017-05-07 19:00:24'),(2,19,NULL,'2017-05-07 19:02:16'),(3,18,NULL,'2017-05-07 19:02:38'),(4,17,NULL,'2017-05-07 19:03:10'),(5,15,NULL,'2017-05-07 19:03:29'),(6,13,NULL,'2017-05-07 19:03:35'),(7,11,NULL,'2017-05-07 19:03:46'),(8,9,NULL,'2017-05-07 19:50:42'),(9,10,NULL,'2017-05-07 20:07:18');
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Cream',10.50,'Cream is a dairy product composed of the higher-butterfat layer skimmed from the top of milk before homogenization.','2017-05-07 11:37:37','2017-05-07 11:37:37',NULL),(2,'Shampoo',13.80,'Shampoo is a hair care product, typically in the form of a viscous liquid, that is used for cleaning hair. ','2017-05-07 11:37:37','2017-05-07 11:37:37',NULL),(3,'Soap',3.60,'Soap is a surfactant cleaning compound used for personal or other cleaning.','2017-05-07 11:37:37','2017-05-07 11:37:37',NULL),(4,'Washing powder',23.00,'Washing powder is a type of detergent (cleaning agent) that is added for cleaning laundry, commonly mixtures of chemical compounds including alkylbenzenesulfonates, which are similar to soap but are less affected by hard water.','2017-05-07 11:37:37','2017-05-07 11:37:37',NULL),(5,'Test',150.00,'Hello world','2017-05-07 21:04:57','2017-05-07 21:04:57',NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (38,'2014_10_12_000000_create_users_table',1),(39,'2014_10_12_100000_create_password_resets_table',1),(40,'2017_05_05_102815_entrust_setup_tables',1),(41,'2017_05_05_110906_create_orders_table',1),(42,'2017_05_05_111014_create_order_items_table',1),(43,'2017_05_05_111037_create_deliveries_table',1),(44,'2017_05_05_111100_create_items_table',1),(45,'2017_05_05_112347_create_order_statuses_table',1),(46,'2017_05_05_114715_create_subscriptions_table',1),(47,'2017_05_06_205250_create_subscription_items_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  PRIMARY KEY (`order_id`,`item_id`),
  KEY `order_items_order_id_index` (`order_id`),
  KEY `order_items_item_id_index` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,10.50,1),(1,2,13.80,1),(1,3,3.60,1),(1,4,23.00,1),(2,2,13.80,10),(2,3,3.60,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'created','2017-05-07 11:37:37','2017-05-07 11:37:37'),(2,'failed','2017-05-07 11:37:37','2017-05-07 11:37:37'),(3,'paid','2017-05-07 11:37:37','2017-05-07 11:37:37');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '1',
  `total` decimal(8,2) NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,NULL,1,50.90,NULL,'2017-05-07 11:37:52',NULL),(2,2,NULL,1,141.60,NULL,'2017-05-07 12:33:47',NULL),(3,2,5,1,17.40,NULL,'2017-05-07 18:03:48',NULL),(4,2,6,1,17.40,NULL,'2017-05-07 18:03:48',NULL),(5,2,5,1,17.40,NULL,'2017-05-07 18:04:43',NULL),(6,2,6,1,17.40,NULL,'2017-05-07 18:04:43',NULL),(7,2,5,1,17.40,NULL,'2017-05-07 18:06:01',NULL),(8,2,6,1,17.40,NULL,'2017-05-07 18:06:01',NULL),(9,2,5,3,17.40,NULL,'2017-05-07 18:08:10',NULL),(10,2,6,3,17.40,NULL,'2017-05-07 18:08:10',NULL),(11,2,5,3,17.40,NULL,'2017-05-07 18:08:47',NULL),(12,2,5,2,17.40,NULL,'2017-05-07 18:13:07',NULL),(13,2,5,3,17.40,NULL,'2017-05-07 18:13:26',NULL),(14,2,5,2,17.40,NULL,'2017-05-07 18:16:14',NULL),(15,2,5,3,17.40,NULL,'2017-05-07 18:16:16',NULL),(16,2,5,2,17.40,NULL,'2017-05-07 18:16:18',NULL),(17,2,5,3,17.40,NULL,'2017-05-07 18:17:06',NULL),(18,2,5,3,17.40,NULL,'2017-05-07 18:17:23',NULL),(19,2,5,3,17.40,NULL,'2017-05-07 18:17:36',NULL),(20,2,5,2,17.40,NULL,'2017-05-07 18:17:50',NULL),(21,2,5,2,17.40,NULL,'2017-05-07 18:19:26',NULL),(22,2,5,2,17.40,NULL,'2017-05-07 18:19:46',NULL),(23,2,5,3,17.40,NULL,'2017-05-07 18:31:43',NULL),(24,2,5,2,17.40,NULL,'2017-05-07 18:34:30',NULL),(25,2,5,3,17.40,NULL,'2017-05-07 18:35:51',NULL),(26,2,5,2,17.40,NULL,'2017-05-07 18:39:59',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'manager','manager',NULL,'2017-05-07 11:37:37','2017-05-07 11:37:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_items` (
  `subscription_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  PRIMARY KEY (`subscription_id`,`item_id`),
  KEY `subscription_items_subscription_id_index` (`subscription_id`),
  KEY `subscription_items_item_id_index` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
INSERT INTO `subscription_items` VALUES (1,2,2),(1,3,2),(2,2,1),(2,3,1),(2,4,1),(3,2,1),(3,3,1),(4,1,10),(4,2,1),(5,2,1),(5,3,1),(6,2,1),(6,3,1);
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `next_order_date` date DEFAULT NULL,
  `day_iteration` int(11) NOT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,2,'2017-05-16','2017-09-13',60,'2017-05-07 19:51:51','2017-05-07 12:16:45','2017-05-07 19:51:51'),(2,2,'2017-05-10','2017-06-19',20,'2017-05-07 19:51:50','2017-05-07 12:28:30','2017-05-07 19:51:50'),(3,2,'2017-05-19','2017-05-29',10,'2017-05-07 20:32:40','2017-05-07 12:34:10','2017-05-07 20:32:40'),(4,2,'2017-05-08','2017-05-28',20,'2017-05-07 20:32:41','2017-05-07 17:42:47','2017-05-07 20:32:41'),(5,2,'2017-05-07','2017-05-17',10,NULL,'2017-05-07 17:54:03','2017-05-07 20:32:45'),(6,2,'2017-05-06','2017-05-08',1,NULL,'2017-05-07 17:58:41','2017-05-07 20:32:44');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriptions` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG','ISTPiC0Wz2hWjofN7wkYNIcam55ZO2SvdMPthA1IkWWg4PUTm5P3l4vUg7pP',NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(2,'Jon Jones','user1@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG','gn6LuB4AVJYuveO5WWByqeAB5akxFNRabBot79u0PdQDQvWottDxAiM9284t',NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(3,'Daniel Cormier','user2@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',NULL,NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(4,'Khabib Nurmagomedov','user3@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',NULL,NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(5,'Badr Hari','user4@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',NULL,NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(6,'Alistair Overeem','user5@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',NULL,NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36'),(7,'George St Pierre','user6@email.com',NULL,'$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',NULL,NULL,'2017-05-07 11:37:36','2017-05-07 11:37:36');
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

-- Dump completed on 2017-05-08  1:17:54
