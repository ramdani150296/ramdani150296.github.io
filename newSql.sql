-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bdd
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `m_accuracy_stocks`
--

DROP TABLE IF EXISTS `m_accuracy_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_accuracy_stocks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cut_off` date DEFAULT NULL,
  `plant` tinytext DEFAULT NULL,
  `sloc` tinytext DEFAULT NULL,
  `type` tinytext DEFAULT NULL,
  `group` tinytext DEFAULT NULL,
  `pack_size` tinytext DEFAULT NULL,
  `material` tinytext DEFAULT NULL,
  `desc` tinytext DEFAULT NULL,
  `uom` tinytext DEFAULT NULL,
  `batch` tinytext DEFAULT NULL,
  `sled_bbd` date DEFAULT NULL,
  `val_type` tinytext DEFAULT NULL,
  `storage_type` tinytext DEFAULT NULL,
  `storage_bin` tinytext DEFAULT NULL,
  `total_stock` tinytext DEFAULT NULL,
  `unposted` tinytext DEFAULT NULL,
  `onhand_rev` tinytext DEFAULT NULL,
  `good` tinytext DEFAULT NULL,
  `bad` tinytext DEFAULT NULL,
  `diff_qty` tinytext DEFAULT NULL,
  `bin_accuracy` tinytext DEFAULT NULL,
  `std_price` tinytext DEFAULT NULL,
  `onhand_val` tinytext DEFAULT NULL,
  `physic_val` tinytext DEFAULT NULL,
  `diff_val` tinytext DEFAULT NULL,
  `ed_pisik` date DEFAULT NULL,
  `ket` tinytext DEFAULT NULL,
  `val_god` tinytext DEFAULT NULL,
  `val_bad` tinytext DEFAULT NULL,
  `akurasi` tinytext DEFAULT NULL,
  `kode` tinytext DEFAULT NULL,
  `bulan` tinytext DEFAULT NULL,
  `stock_fisik` tinytext DEFAULT NULL,
  `type_1` tinytext NOT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_accuracy_stocks`
--

LOCK TABLES `m_accuracy_stocks` WRITE;
/*!40000 ALTER TABLE `m_accuracy_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_accuracy_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_comparison_stocks`
--

DROP TABLE IF EXISTS `m_comparison_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_comparison_stocks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bulan` tinytext DEFAULT NULL,
  `jenis_penyimpanan` tinytext DEFAULT NULL,
  `plant` tinytext DEFAULT NULL,
  `group` tinytext DEFAULT NULL,
  `material` tinytext DEFAULT NULL,
  `desc` tinytext DEFAULT NULL,
  `pack_size` tinytext DEFAULT NULL,
  `val_type` tinytext DEFAULT NULL,
  `batch` tinytext DEFAULT NULL,
  `sled_bbd` date DEFAULT NULL,
  `uom` tinytext DEFAULT NULL,
  `system_cycle_count` tinytext DEFAULT NULL,
  `system_stock_taking` tinytext DEFAULT NULL,
  `fisik_cycle_count` tinytext DEFAULT NULL,
  `fisik_stock_taking` tinytext DEFAULT NULL,
  `cc` tinytext DEFAULT NULL,
  `st` tinytext DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `gap_akurasi` tinytext DEFAULT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_comparison_stocks`
--

LOCK TABLES `m_comparison_stocks` WRITE;
/*!40000 ALTER TABLE `m_comparison_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_comparison_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_critical_stocks`
--

DROP TABLE IF EXISTS `m_critical_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_critical_stocks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `plant` tinytext DEFAULT NULL,
  `name_1` tinytext DEFAULT NULL,
  `storage_location` tinytext DEFAULT NULL,
  `material_type` tinytext DEFAULT NULL,
  `material_group` tinytext DEFAULT NULL,
  `pack_size_old` tinytext DEFAULT NULL,
  `material` tinytext DEFAULT NULL,
  `material_desc` tinytext DEFAULT NULL,
  `batch` tinytext DEFAULT NULL,
  `sled_bbd` date DEFAULT NULL,
  `valuation_type` tinytext DEFAULT NULL,
  `gr_date` tinytext DEFAULT NULL,
  `mkt_category_3` tinytext DEFAULT NULL,
  `total_stock_bu` tinytext DEFAULT NULL,
  `base_unit` tinytext DEFAULT NULL,
  `cut_off_stock` tinytext DEFAULT NULL,
  `storage_conditions` tinytext DEFAULT NULL,
  `total_shelf_life` tinytext DEFAULT NULL,
  `standard_price` tinytext DEFAULT NULL,
  `total_value` tinytext DEFAULT NULL,
  `time_to_expired` tinytext DEFAULT NULL,
  `shelf_life` tinytext DEFAULT NULL,
  `ket_shelf_life` tinytext DEFAULT NULL,
  `principal_non_principal` tinytext DEFAULT NULL,
  `status_inventory` tinytext DEFAULT NULL,
  `sisa_sled_bbd` tinytext DEFAULT NULL,
  `shelf_life_in_month` tinytext DEFAULT NULL,
  `qty_sales` tinytext DEFAULT NULL,
  `qty_pgi` tinytext DEFAULT NULL,
  `qty_nkb` tinytext DEFAULT NULL,
  `qty_sto` tinytext DEFAULT NULL,
  `qty_disposal` tinytext DEFAULT NULL,
  `qty_migo` tinytext DEFAULT NULL,
  `remaks_migo` tinytext DEFAULT NULL,
  `sales` tinytext DEFAULT NULL,
  `pgi` tinytext DEFAULT NULL,
  `nkb` tinytext DEFAULT NULL,
  `sto` tinytext DEFAULT NULL,
  `disposal` tinytext DEFAULT NULL,
  `migo` tinytext DEFAULT NULL,
  `aall` tinytext DEFAULT NULL,
  `value_sales` tinytext DEFAULT NULL,
  `value_pgi` tinytext DEFAULT NULL,
  `value_nkb` tinytext DEFAULT NULL,
  `value_sto` tinytext DEFAULT NULL,
  `value_disposal` tinytext DEFAULT NULL,
  `value_migo` tinytext DEFAULT NULL,
  `progress_value` tinytext DEFAULT NULL,
  `value_awal` tinytext DEFAULT NULL,
  `kategory_progres` tinytext DEFAULT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_critical_stocks`
--

LOCK TABLES `m_critical_stocks` WRITE;
/*!40000 ALTER TABLE `m_critical_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_critical_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_monitoring_stocks`
--

DROP TABLE IF EXISTS `m_monitoring_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_monitoring_stocks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `plant` varchar(255) NOT NULL,
  `name_1` varchar(255) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `material_type` varchar(255) NOT NULL,
  `material_group` varchar(255) NOT NULL,
  `pack_size_old` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `material_description` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `sled_bbd` date NOT NULL,
  `valuation_type` varchar(255) NOT NULL,
  `gr_date` varchar(255) NOT NULL,
  `mkt_category_3` varchar(255) NOT NULL,
  `total_stock_bu` varchar(255) NOT NULL,
  `base_unit` varchar(255) NOT NULL,
  `cut_off_stock` varchar(255) NOT NULL,
  `storage_conditions` varchar(255) NOT NULL,
  `total_shelf_life` varchar(255) NOT NULL,
  `mkt_category_1` varchar(255) NOT NULL,
  `standard_price` varchar(255) NOT NULL,
  `total_value` varchar(255) NOT NULL,
  `time_to_expired` varchar(255) NOT NULL,
  `shelf_life` varchar(255) NOT NULL,
  `ket_shelf_life` varchar(500) NOT NULL,
  `claim_no_claim` varchar(255) NOT NULL,
  `status_inventory` varchar(255) NOT NULL,
  `sisa_sled_bbd` varchar(255) NOT NULL,
  `ket_mat_group` varchar(500) NOT NULL,
  `sisa_total_shelf_life_in_month` varchar(255) NOT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_monitoring_stocks`
--

LOCK TABLES `m_monitoring_stocks` WRITE;
/*!40000 ALTER TABLE `m_monitoring_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_monitoring_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_summary`
--

DROP TABLE IF EXISTS `m_summary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_summary` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bulan` date DEFAULT NULL,
  `semester` tinytext DEFAULT NULL,
  `plant` tinytext DEFAULT NULL,
  `keterangan_ho_cbg` tinytext DEFAULT NULL,
  `nama_cabang_plant` tinytext DEFAULT NULL,
  `create_do` tinytext DEFAULT NULL,
  `create_sukses` tinytext DEFAULT NULL,
  `do_gagal` tinytext DEFAULT NULL,
  `do_gagal_persent` tinytext DEFAULT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_summary`
--

LOCK TABLES `m_summary` WRITE;
/*!40000 ALTER TABLE `m_summary` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_summary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_undeliverable_stocks`
--

DROP TABLE IF EXISTS `m_undeliverable_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_undeliverable_stocks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `plant` tinytext DEFAULT NULL,
  `plant_desc` tinytext DEFAULT NULL,
  `shipment_no` tinytext DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_no` tinytext DEFAULT NULL,
  `delivery_type` tinytext DEFAULT NULL,
  `delivery_type_desc` tinytext DEFAULT NULL,
  `ship_to_party` tinytext DEFAULT NULL,
  `ship_to_party_desc` tinytext DEFAULT NULL,
  `shipping_point` tinytext DEFAULT NULL,
  `sales_group` tinytext DEFAULT NULL,
  `material_no` tinytext DEFAULT NULL,
  `storage` tinytext DEFAULT NULL,
  `line_item` tinytext DEFAULT NULL,
  `brand` tinytext DEFAULT NULL,
  `material_desc` tinytext DEFAULT NULL,
  `uom` tinytext DEFAULT NULL,
  `delivery_qty` tinytext DEFAULT NULL,
  `value_tax` tinytext DEFAULT NULL,
  `total_value_tax` tinytext DEFAULT NULL,
  `ext_vehicle_data` tinytext DEFAULT NULL,
  `int_vehicle_id` tinytext DEFAULT NULL,
  `int_driver_code` tinytext DEFAULT NULL,
  `int_driver_name` tinytext DEFAULT NULL,
  `int_helper_code_1` tinytext DEFAULT NULL,
  `pod_date` date DEFAULT NULL,
  `diff_qty` tinytext DEFAULT NULL,
  `uom_pod` tinytext DEFAULT NULL,
  `pod_reason_code` tinytext DEFAULT NULL,
  `pod_reason_desc` tinytext DEFAULT NULL,
  `rejection` tinytext DEFAULT NULL,
  `condition_group_2` tinytext DEFAULT NULL,
  `ket_tambahan` tinytext DEFAULT NULL,
  `bulan` tinytext DEFAULT NULL,
  `value_gagal` tinytext DEFAULT NULL,
  `cek_segment` tinytext DEFAULT NULL,
  `ke_cbg_atau_bukan` tinytext DEFAULT NULL,
  `mk3_category` tinytext DEFAULT NULL,
  `week` tinytext DEFAULT NULL,
  `recorded_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_undeliverable_stocks`
--

LOCK TABLES `m_undeliverable_stocks` WRITE;
/*!40000 ALTER TABLE `m_undeliverable_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_undeliverable_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `reaction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Deni ramdani','rdeni9722@gmail.com','$2y$10$/v4lENurQJhmOVFIkw3xwekCAoQ6rpAJkB/UgDedpAX.7dhF.Kz5y',2,1,1684853743,NULL);
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

-- Dump completed on 2023-07-01 16:27:01
