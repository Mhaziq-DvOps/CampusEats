-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for campuseats
CREATE DATABASE IF NOT EXISTS `campuseats` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `campuseats`;

-- Dumping structure for table campuseats.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Street_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Postcode` int NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Admin_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.business_hour
CREATE TABLE IF NOT EXISTS `business_hour` (
  `Day_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Day_Of_Week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Day_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.captcha
CREATE TABLE IF NOT EXISTS `captcha` (
  `Capt_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int NOT NULL,
  `Type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Capt_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Pro_Id` bigint unsigned NOT NULL,
  `Cust_Id` bigint unsigned NOT NULL,
  `Pro_Qty` int NOT NULL,
  `Order_Type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookPax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookTable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_pro_id_foreign` (`Pro_Id`),
  KEY `cart_cust_id_foreign` (`Cust_Id`),
  CONSTRAINT `cart_cust_id_foreign` FOREIGN KEY (`Cust_Id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_pro_id_foreign` FOREIGN KEY (`Pro_Id`) REFERENCES `product` (`P_Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.customer_order
CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `User_Id` bigint unsigned NOT NULL,
  `T_Id` bigint unsigned DEFAULT NULL,
  `D_Id` bigint unsigned DEFAULT NULL,
  `O_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Street_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_State` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `O_Payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Payment_No` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `O_Date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `O_Time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Book_Date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Book_Time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `T_Pax` int DEFAULT NULL,
  `O_Total_Price` double NOT NULL,
  `O_Type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `O_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `Tracking_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_order_user_id_foreign` (`User_Id`),
  CONSTRAINT `customer_order_user_id_foreign` FOREIGN KEY (`User_Id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.data
CREATE TABLE IF NOT EXISTS `data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `Faq_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Faq_Category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Faq_Question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Faq_Answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.log
CREATE TABLE IF NOT EXISTS `log` (
  `Log_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Cust_Id` bigint unsigned DEFAULT NULL,
  `Manager_Id` bigint unsigned DEFAULT NULL,
  `Log_Module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Log_Pay_Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Log_Total_Price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Log_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Log_Id`),
  KEY `log_cust_id_foreign` (`Cust_Id`),
  KEY `log_manager_id_foreign` (`Manager_Id`),
  CONSTRAINT `log_cust_id_foreign` FOREIGN KEY (`Cust_Id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `log_manager_id_foreign` FOREIGN KEY (`Manager_Id`) REFERENCES `manager` (`Manager_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.manager
CREATE TABLE IF NOT EXISTS `manager` (
  `Manager_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Shop_Id` bigint unsigned NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isBanned` tinyint(1) NOT NULL DEFAULT '0',
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Street_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Postcode` int NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ban` int NOT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.order_product
CREATE TABLE IF NOT EXISTS `order_product` (
  `Order_Id` bigint unsigned NOT NULL,
  `P_Id` bigint unsigned NOT NULL,
  `Order_Quantity` bigint NOT NULL,
  `Order_Price` double NOT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Order_Id`,`P_Id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`Order_Id`) REFERENCES `customer_order` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_reset_tokens_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.payment_type
CREATE TABLE IF NOT EXISTS `payment_type` (
  `PM_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int NOT NULL DEFAULT '1',
  `Image` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PM_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.product
CREATE TABLE IF NOT EXISTS `product` (
  `P_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `P_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cat_Id` bigint unsigned NOT NULL,
  `P_Shop` bigint unsigned DEFAULT NULL,
  `P_Duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `S_Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `L_Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_Price` double NOT NULL,
  `P_Disc_Price` double DEFAULT NULL,
  `P_Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P_Status` int DEFAULT NULL,
  `promotion_id` bigint unsigned DEFAULT NULL,
  `P_Quantity` int DEFAULT NULL,
  `P_Slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`P_Id`),
  KEY `product_promotion_id_foreign` (`promotion_id`),
  CONSTRAINT `product_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`Promotion_Id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.product_category
CREATE TABLE IF NOT EXISTS `product_category` (
  `P_Cat_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `P_Cat_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_Cat_Slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`P_Cat_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.promotion
CREATE TABLE IF NOT EXISTS `promotion` (
  `Promotion_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Promo_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Promo_Descr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Promo_Discount` int NOT NULL,
  `Promo_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Promo_Start` date NOT NULL,
  `Promo_End` date NOT NULL,
  `Manager_id` bigint unsigned NOT NULL,
  `Promo_Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Promotion_Id`),
  KEY `promotion_manager_id_foreign` (`Manager_id`),
  CONSTRAINT `promotion_manager_id_foreign` FOREIGN KEY (`Manager_id`) REFERENCES `manager` (`Manager_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.restaurant_table
CREATE TABLE IF NOT EXISTS `restaurant_table` (
  `T_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Shop_Id` bigint unsigned NOT NULL,
  `T_Pax` int NOT NULL,
  `T_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`T_Id`),
  KEY `restaurant_table_shop_id_foreign` (`Shop_Id`),
  CONSTRAINT `restaurant_table_shop_id_foreign` FOREIGN KEY (`Shop_Id`) REFERENCES `shop` (`Shop_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.review
CREATE TABLE IF NOT EXISTS `review` (
  `Review_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `User_Id` bigint unsigned NOT NULL,
  `P_Id` bigint unsigned NOT NULL,
  `R_Rating` int NOT NULL,
  `R_Comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `R_Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `R_Sentiment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Review_Id`),
  KEY `review_user_id_foreign` (`User_Id`),
  KEY `review_p_id_foreign` (`P_Id`),
  CONSTRAINT `review_p_id_foreign` FOREIGN KEY (`P_Id`) REFERENCES `product` (`P_Id`) ON DELETE CASCADE,
  CONSTRAINT `review_user_id_foreign` FOREIGN KEY (`User_Id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.shop
CREATE TABLE IF NOT EXISTS `shop` (
  `Shop_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `S_Category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `S_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `S_Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dine_In` int DEFAULT NULL,
  `Delivery` int DEFAULT NULL,
  `Pick_Up` int DEFAULT NULL,
  `Booking` int DEFAULT NULL,
  `S_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `S_Reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `S_Termcond` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `S_Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `S_Banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `S_Table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Shop_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.shop_category
CREATE TABLE IF NOT EXISTS `shop_category` (
  `S_Cat_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `S_Cat_Slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `S_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`S_Cat_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.terms
CREATE TABLE IF NOT EXISTS `terms` (
  `T_Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `T_Topics` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `T_Contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`T_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table campuseats.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isBanned` tinyint(1) NOT NULL DEFAULT '0',
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` int DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email_Verified_At` timestamp NULL DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
