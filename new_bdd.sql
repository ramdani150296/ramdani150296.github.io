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
-- Table structure for table `tbl_akurasi_stock`
--

DROP TABLE IF EXISTS `tbl_akurasi_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_akurasi_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cut_off` varchar(128) DEFAULT '0',
  `plant` varchar(128) DEFAULT '0',
  `sloc` varchar(128) DEFAULT '0',
  `type` varchar(128) DEFAULT '0',
  `group` varchar(128) DEFAULT '0',
  `pack_size` varchar(50) DEFAULT '0',
  `material` varchar(50) DEFAULT '0',
  `description` varchar(50) DEFAULT '0',
  `uom` varchar(50) DEFAULT '0',
  `batch` varchar(50) DEFAULT '0',
  `sled_bdd` varchar(50) DEFAULT '0',
  `valution_type` varchar(50) DEFAULT '0',
  `storage_type` varchar(50) DEFAULT '0',
  `storage_bin` varchar(50) DEFAULT '0',
  `total_stock` varchar(50) DEFAULT '0',
  `unposted` varchar(50) DEFAULT '0',
  `stock_onhand` varchar(50) DEFAULT '0',
  `stock_good` varchar(50) DEFAULT '0',
  `stock_bad` varchar(50) DEFAULT '0',
  `diff_qty` varchar(50) DEFAULT '0',
  `bin_accurasi` varchar(50) DEFAULT '0',
  `std_price` varchar(50) DEFAULT '0',
  `onhand_val` varchar(50) DEFAULT '0',
  `physic_val` varchar(50) DEFAULT '0',
  `dif_val` varchar(50) DEFAULT '0',
  `ed_fisik` varchar(50) DEFAULT '0',
  `keterangan` varchar(50) DEFAULT '0',
  `val_god` varchar(50) DEFAULT '0',
  `val_bad` varchar(50) DEFAULT '0',
  `akurasi` varchar(50) DEFAULT '0',
  `type_action` varchar(50) DEFAULT '0',
  `kode` varchar(128) DEFAULT '0',
  `bulan` varchar(128) DEFAULT '0',
  `total_fisik` varchar(125) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_akurasi_stock`
--

LOCK TABLES `tbl_akurasi_stock` WRITE;
/*!40000 ALTER TABLE `tbl_akurasi_stock` DISABLE KEYS */;
INSERT INTO `tbl_akurasi_stock` VALUES (1,'45043','SBY','TG01','ZTRD','BEGA','12X1 KG','20001067','CHEESE CHEDDAR PROCESS SLICE W/ BURGER','PAC','2000094118','45112','E12','C.06A.1.10','47',NULL,'47','47','0','0','100,00%','89505','4206735','4206735','0','45112','Akurat','4206735','0','Akurat','Cycle Count','A','Mei','47',NULL);
/*!40000 ALTER TABLE `tbl_akurasi_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_critical_stock`
--

DROP TABLE IF EXISTS `tbl_critical_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_critical_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant` varchar(50) NOT NULL DEFAULT '0',
  `nama_area` varchar(50) NOT NULL DEFAULT '0',
  `storage_location` varchar(50) NOT NULL DEFAULT '0',
  `material_type` varchar(50) NOT NULL DEFAULT '0',
  `material_group` varchar(50) NOT NULL DEFAULT '0',
  `material_group_desc` varchar(50) NOT NULL DEFAULT '0',
  `pack_size_old` varchar(50) NOT NULL DEFAULT '0',
  `material` varchar(50) NOT NULL DEFAULT '0',
  `material_description` varchar(50) NOT NULL DEFAULT '0',
  `batch` varchar(50) NOT NULL DEFAULT '0',
  `tanggal_ed` date DEFAULT NULL,
  `valution_tipe` varchar(50) NOT NULL DEFAULT '0',
  `gr_date` date DEFAULT NULL,
  `mkt_categori3` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_bu` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_bu` varchar(50) NOT NULL DEFAULT '0',
  `available_stock_bu` varchar(50) NOT NULL DEFAULT '0',
  `base_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_ou` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_ou` varchar(50) NOT NULL DEFAULT '0',
  `available_stock_ou` varchar(50) NOT NULL DEFAULT '0',
  `order_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_su` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_su` varchar(50) NOT NULL DEFAULT '0',
  `available_su` varchar(50) NOT NULL DEFAULT '0',
  `sales_unit` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_product` varchar(50) NOT NULL DEFAULT '0',
  `periode_shelf_life` varchar(50) NOT NULL DEFAULT '0',
  `cut_off_stock` date DEFAULT NULL,
  `storage_condition` varchar(50) NOT NULL DEFAULT '0',
  `total_self_life` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category1` varchar(50) NOT NULL DEFAULT '0',
  `standard_price` varchar(50) NOT NULL DEFAULT '0',
  `total_value` varchar(50) NOT NULL DEFAULT '0',
  `time_to_expired` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_present` varchar(50) NOT NULL DEFAULT '0',
  `ket_self_life` varchar(50) NOT NULL DEFAULT '0',
  `kategori_principal` varchar(50) NOT NULL DEFAULT '0',
  `status_inventory` varchar(50) NOT NULL DEFAULT '0',
  `sisa_sled` varchar(50) NOT NULL DEFAULT '0',
  `ket_mat_group` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_month` varchar(50) NOT NULL DEFAULT '0',
  `create_et` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80007 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_critical_stock`
--

LOCK TABLES `tbl_critical_stock` WRITE;
/*!40000 ALTER TABLE `tbl_critical_stock` DISABLE KEYS */;
INSERT INTO `tbl_critical_stock` VALUES (79985,'3110','ANCOL','FG01','ZFGD','DIAMOND','ICE CREAM STICK CHOCONUT VANILLA 50 ML','30 PCS','10000008','DIAMOND','AIV01001','2024-12-31','','2023-03-15','DIA','60','0','60','PC','2','0','2','CAR','2','0','2','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','3488','209280','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79986,'3110','ANCOL','FG01','ZFGD','DIAMOND','ICE CREAM STICK CHOCONUT VANILLA 50 ML','30 PCS','10000008','DIAMOND','AKG01001','2024-12-31','','2023-05-19','DIA','1500','0','1500','PC','50','0','50','CAR','50','0','50','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','3488','5232000','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79987,'3110','ANCOL','FG01','ZFGD','JUMBO','ICE CREAM STICK DUA RASA 47 ML','30 PCS','10000009','JUMBO','TRW02001','2024-12-31','','2022-12-10','DIA','1680','0','1680','PC','56','0','56','CAR','56','0','56','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','2794','4693920','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','JUMBO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79988,'3110','ANCOL','FG01','ZFGD','MAGIC','ICE CREAM STICK VANILLA 60 ML','30 PCS','10000010','MAGIC','TSK01001','2024-12-31','','2023-02-21','DIA','570','0','570','PC','19','0','19','CAR','19','0','19','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','4840','2758800','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','MAGIC','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79989,'3110','ANCOL','FG01','ZFGD','MAGIC','ICE CREAM STICK VANILLA 60 ML','30 PCS','10000010','MAGIC','TYE01001','2024-12-31','','2023-04-04','DIA','240','0','240','PC','8','0','8','CAR','8','0','8','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','4840','1161600','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','MAGIC','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79990,'3110','ANCOL','FG01','ZFGD','MAGIC','ICE CREAM STICK VANILLA 60 ML','30 PCS','10000010','MAGIC','TRD01001','2024-12-31','','2023-04-04','DIA','390','0','390','PC','13','0','13','CAR','13','0','13','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','4840','1887600','577','1.0685185185185','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','MAGIC','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79991,'3110','ANCOL','RT02','ZFGD','DIAMOND','ICE CREAM REG. CUP CHOCOLATE 75 ML','45 PCS','10000015','DIAMOND','SOS','2018-01-01','','0000-00-00','DIA','116','0','116','PC','2.578','0','2.578','CAR','2.578','0','2.578','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','1814','210424','-1979','-3.6648148148148','1. Sisa Shelf Life &lt;=0%','Non Principal','Inventory Risk','1. Expired','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79992,'3110','ANCOL','RT02','ZFGD','DIAMOND','ICE CREAM REG. CUP DURIAN 75 ML','45 PCS','10000016','DIAMOND','SOS','2018-01-01','','0000-00-00','DIA','675','0','675','PC','15','0','15','CAR','15','0','15','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','3360','2268000','-1979','-3.6648148148148','1. Sisa Shelf Life &lt;=0%','Non Principal','Inventory Risk','1. Expired','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79993,'3110','ANCOL','RT02','ZFGD','DIAMOND','ICE CREAM REG. CUP STRAWBERRY 75 ML','45 PCS','10000017','DIAMOND','SOS','2018-01-01','','0000-00-00','DIA','61','0','61','PC','1.356','0','1.356','CAR','1.356','0','1.356','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','1820','111020','-1979','-3.6648148148148','1. Sisa Shelf Life &lt;=0%','Non Principal','Inventory Risk','1. Expired','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79994,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM CHOCOLATE 100 ML','24 PCS','10000019','SOMBRERO','AIG01001','2024-08-14','','2023-05-20','DIA','600','0','600','PC','25','0','25','CAR','25','0','25','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5461','3276600','438','0.81111111111111','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79995,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM CHOCOLATE 100 ML','24 PCS','10000019','SOMBRERO','ALE01001','2024-09-09','','2023-05-23','DIA','288','0','288','PC','12','0','12','CAR','12','0','12','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5461','1572768','464','0.85925925925926','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79996,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM STRAWBERRY 100 ML','24 PCS','10000020','SOMBRERO','TYS01001','2024-05-26','','2023-04-17','DIA','24','0','24','PC','1','0','1','CAR','1','0','1','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5810','139440','358','0.66296296296296','4. Sisa Shelf Life &gt;60-75%','Non Principal','Inventory Risk','5. Sisa Exp 9-12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79997,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM STRAWBERRY 100 ML','24 PCS','10000020','SOMBRERO','TSM01001','2024-06-19','','2023-03-16','DIA','480','0','480','PC','20','0','20','CAR','20','0','20','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5810','2788800','382','0.70740740740741','4. Sisa Shelf Life &gt;60-75%','Non Principal','Inventory Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79998,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM STRAWBERRY 100 ML','24 PCS','10000020','SOMBRERO','AIW01001','2024-08-30','','2023-05-22','DIA','480','0','480','PC','20','0','20','CAR','20','0','20','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5810','2788800','454','0.84074074074074','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(79999,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM VANILLA 100 ML','24 PCS','10000021','SOMBRERO','AM101001','2024-07-03','','2023-03-16','DIA','864','0','864','PC','36','0','36','CAR','36','0','36','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5064','4375296','396','0.73333333333333','4. Sisa Shelf Life &gt;60-75%','Non Principal','Inventory Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80000,'3110','ANCOL','FG01','ZFGD','SOMBRERO','ICE CREAM VANILLA 100 ML','24 PCS','10000021','SOMBRERO','ALC01001','2024-09-07','','2023-05-22','DIA','456','0','456','PC','19','0','19','CAR','19','0','19','CAR','540','','2023-06-03','FROZEN','540','ICE CREAM','5064','2309184','462','0.85555555555556','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','SOMBRERO','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80001,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX CHOCOLATE 10 L','1X10 LT','10000029','DIAMOND','AFI03001','2024-11-13','','2023-05-24','DIA','284','2','282','CAR','284','2','282','CAR','284','2','282','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128503','36494852','529','0.96357012750455','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80002,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX CHOCOLATE 10 L','1X10 LT','10000029','DIAMOND','AFG03001','2024-11-11','','2023-05-22','DIA','2','2','0','CAR','2','2','0','CAR','2','2','0','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128503','257006','527','0.95992714025501','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80003,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX CHOCOLATE 10 L','1X10 LT','10000029','DIAMOND','AFK03001','2024-11-15','','2023-05-26','DIA','400','0','400','CAR','400','0','400','CAR','400','0','400','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128503','51401200','531','0.9672131147541','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80004,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX VANILLA 10 L','1X10 LT','10000030','DIAMOND','AFQ05001','2024-11-21','','2023-05-22','DIA','300','0','300','CAR','300','0','300','CAR','300','0','300','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128411','38523300','537','0.97814207650273','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80005,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX VANILLA 10 L','1X10 LT','10000030','DIAMOND','AFB05002','2024-11-06','','2023-05-07','DIA','120','0','120','CAR','120','0','120','CAR','120','0','120','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128411','15409320','522','0.95081967213115','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07'),(80006,'3110','ANCOL','FG01','ZFGD','DIAMOND','SOFT MIX VANILLA 10 L','1X10 LT','10000030','DIAMOND','AKW05001','2024-10-28','','2023-04-28','DIA','103','19','84','CAR','103','19','84','CAR','103','19','84','CAR','549','','2023-06-03','FROZEN','549','ICE CREAM','128411','13226333','513','0.9344262295082','-','Non Principal','Inventory No Risk','6. Sisa Exp &gt;12 bln','DIAMOND','5. Shelf Life 12-24 bln','2023-06-24 09:34:07');
/*!40000 ALTER TABLE `tbl_critical_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_monitoring_stock`
--

DROP TABLE IF EXISTS `tbl_monitoring_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_monitoring_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` varchar(128) NOT NULL DEFAULT '0',
  `kode_plant` varchar(128) NOT NULL DEFAULT '0',
  `nama_plant` varchar(128) NOT NULL DEFAULT '0',
  `store_location` varchar(128) NOT NULL DEFAULT '0',
  `material_type` varchar(11) NOT NULL DEFAULT '0',
  `material_group` varchar(11) NOT NULL DEFAULT '0',
  `material_group_description` varchar(200) NOT NULL DEFAULT '0',
  `pack_size_old` varchar(200) NOT NULL DEFAULT '0',
  `material` varchar(50) NOT NULL DEFAULT '0',
  `material_description` varchar(50) NOT NULL DEFAULT '0',
  `batch` varchar(50) NOT NULL DEFAULT '0',
  `sledd_bdd` varchar(50) NOT NULL DEFAULT '0',
  `valution_type` varchar(50) NOT NULL DEFAULT '0',
  `gr_date` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category3` varchar(50) NOT NULL DEFAULT '0',
  `total_stock` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery` varchar(50) NOT NULL DEFAULT '0',
  `available_stock` varchar(50) NOT NULL DEFAULT '0',
  `base_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_cost` varchar(50) NOT NULL DEFAULT '0',
  `total_value` varchar(50) NOT NULL DEFAULT '0',
  `keterangan_ed` varchar(50) NOT NULL DEFAULT '0',
  `kategori_principal` varchar(50) NOT NULL DEFAULT '0',
  `cut_off_stock` varchar(200) NOT NULL DEFAULT '0',
  `total_self_life` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category1` varchar(50) NOT NULL DEFAULT '0',
  `standard_price` varchar(50) NOT NULL DEFAULT '0',
  `time_to_expired` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life` varchar(50) NOT NULL DEFAULT '0',
  `ket_shelf_life` varchar(50) NOT NULL DEFAULT '0',
  `sisa_sledd` varchar(50) NOT NULL DEFAULT '0',
  `ket_mat_group` varchar(50) NOT NULL DEFAULT '0',
  `status_inventory` varchar(50) NOT NULL DEFAULT '0',
  `claim_no_claim` varchar(150) NOT NULL DEFAULT '0',
  `sisa_total_shelf_life` varchar(250) NOT NULL DEFAULT '0',
  `create_et` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `storage_condition` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_monitoring_stock`
--

LOCK TABLES `tbl_monitoring_stock` WRITE;
/*!40000 ALTER TABLE `tbl_monitoring_stock` DISABLE KEYS */;
INSERT INTO `tbl_monitoring_stock` VALUES (1,'MEI 23','3110','ANCOL','9999','ZFGD','DIAMOND','DIAMOND','30 PCS','10000008','ICE CREAM STICK CHOCONUT VANILLA 50 ML','SOS','0','','-','DIA','29','0','29','PC','3487','101123','ED','No Claim','45061','0','0','0','0','0','0','0','0','0','0','0','2023-06-24 15:45:26','0'),(4,'44927','3110','ANCOL','FG01','ZFGD','SOMBRERO','0','24 PCS','10000020','ICE CREAM STRAWBERRY 100 ML','TSM01001','45462','','45001','DIA','96','0','0','PC','0','537504','0','0','17 Juni 2023','540','ICE CREAM','5599','368','0.68','4. Sisa Shelf Life &gt;60-75%','6. Sisa Exp &gt;12 bln','SOMBRERO','Inventory Risk','Non Principal','0','2023-06-24 09:07:49','FROZEN'),(5,'44927','3110','ANCOL','FG01','ZFGD','SOMBRERO','0','24 PCS','10000020','ICE CREAM STRAWBERRY 100 ML','TSM01001','45462','','45001','DIA','96','0','0','PC','0','537504','0','0','17 Juni 2023','540','ICE CREAM','5599','368','0.68','4. Sisa Shelf Life &gt;60-75%','6. Sisa Exp &gt;12 bln','SOMBRERO','Inventory Risk','Non Principal','0','2023-06-24 09:08:16','FROZEN'),(6,'44927','3110','ANCOL','FG01','ZFGD','SOMBRERO','0','24 PCS','10000020','ICE CREAM STRAWBERRY 100 ML','TSM01001','45462','','45001','DIA','96','0','0','PC','0','537504','0','0','17 Juni 2023','540','ICE CREAM','5599','368','0.68','4. Sisa Shelf Life &gt;60-75%','6. Sisa Exp &gt;12 bln','SOMBRERO','Inventory Risk','Non Principal','0','2023-06-24 09:10:59','FROZEN'),(7,'44927','3110','ANCOL','FG01','ZFGD','SOMBRERO','0','24 PCS','10000020','ICE CREAM STRAWBERRY 100 ML','TSM01001','45462','','45001','DIA','96','0','0','PC','0','537504','0','0','17 Juni 2023','540','ICE CREAM','5599','368','0.68','4. Sisa Shelf Life &gt;60-75%','6. Sisa Exp &gt;12 bln','SOMBRERO','Inventory Risk','Non Principal','0','2023-06-24 22:11:39','FROZEN'),(8,'44927','3110','ANCOL','FG01','ZFGD','SOMBRERO','0','24 PCS','10000020','ICE CREAM STRAWBERRY 100 ML','TSM01001','45462','','45001','DIA','96','0','0','PC','0','537504','0','0','17 Juni 2023','540','ICE CREAM','5599','368','0.68','4. Sisa Shelf Life &gt;60-75%','6. Sisa Exp &gt;12 bln','SOMBRERO','Inventory Risk','Non Principal','0','2023-06-24 22:12:00','FROZEN');
/*!40000 ALTER TABLE `tbl_monitoring_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_perbandingan`
--

DROP TABLE IF EXISTS `tbl_perbandingan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_perbandingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(128) NOT NULL DEFAULT '0',
  `jenis_penyimpanan` varchar(128) NOT NULL DEFAULT '0',
  `plant` varchar(128) NOT NULL DEFAULT '0',
  `material` varchar(128) NOT NULL DEFAULT '0',
  `description` varchar(128) NOT NULL DEFAULT '0',
  `pack_size` varchar(128) NOT NULL DEFAULT '0',
  `valution_type` varchar(128) NOT NULL DEFAULT '0',
  `batch` varchar(128) NOT NULL DEFAULT '0',
  `sled_bdd` varchar(128) NOT NULL DEFAULT '0',
  `uom` varchar(128) NOT NULL DEFAULT '0',
  `system_cycle_count` varchar(128) NOT NULL DEFAULT '0',
  `system_stock_taking` varchar(128) NOT NULL DEFAULT '0',
  `fisik_cycle_count` varchar(128) NOT NULL DEFAULT '0',
  `fisik_stock_taking` varchar(128) NOT NULL DEFAULT '0',
  `akurasi_cc` varchar(128) NOT NULL DEFAULT '0',
  `akurasi_st` varchar(128) NOT NULL DEFAULT '0',
  `keterangan` varchar(128) NOT NULL DEFAULT '0',
  `gap_akurat` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_perbandingan`
--

LOCK TABLES `tbl_perbandingan` WRITE;
/*!40000 ALTER TABLE `tbl_perbandingan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_perbandingan` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'Deni ramdani','Rdeni9722@gmail.com','$2y$10$/v4lENurQJhmOVFIkw3xwekCAoQ6rpAJkB/UgDedpAX.7dhF.Kz5y',2,1,1684853743,NULL),(2,'yoga agustin','yogaagustin@gmail.com','$2y$10$5C1f7dfeF11MM8deSF./t.hzTlajjFrsbKoxhhmthCkbbNTpCmnIu',2,1,1684854680,NULL);
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

-- Dump completed on 2023-06-25 12:28:55
