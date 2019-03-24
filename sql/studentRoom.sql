-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: studentroom
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;t_usert_user

--
-- Table structure for table `t_apply`
--

DROP TABLE IF EXISTS `t_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_apply` (
  `i_apply` int(11) NOT NULL AUTO_INCREMENT,
  `i_user` int(11) DEFAULT NULL,
  `property_img` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `certificate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `apply_time` datetime DEFAULT NULL,
  `auditing_time` datetime DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `id_number` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_apply`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_browse_record`
--

DROP TABLE IF EXISTS `t_browse_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_browse_record` (
  `i_browse_record` bigint(20) NOT NULL,
  `i_property` bigint(20) DEFAULT NULL,
  `i_user` bigint(20) DEFAULT NULL,
  `browse_record` datetime DEFAULT NULL,
  PRIMARY KEY (`i_browse_record`),
  KEY `Index_i_property` (`i_property`),
  KEY `Index_i_user` (`i_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='浏览记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_comment`
--

DROP TABLE IF EXISTS `t_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_comment` (
  `i_comment` bigint(20) NOT NULL,
  `i_property` bigint(20) DEFAULT NULL,
  `floor_num` int(11) DEFAULT NULL,
  `i_user` bigint(20) DEFAULT NULL,
  `name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `comment` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL,
  PRIMARY KEY (`i_comment`),
  KEY `Index_i_property` (`i_property`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_contract`
--

DROP TABLE IF EXISTS `t_contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_contract` (
  `i_contract` bigint(20) NOT NULL,
  `startDate` datetime DEFAULT NULL,
  `i_legaladvisor` bigint(20) DEFAULT NULL,
  `validate` int(11) DEFAULT NULL,
  `file` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='合同表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_document`
--

DROP TABLE IF EXISTS `t_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_document` (
  `i_document` bigint(20) NOT NULL,
  `i_user` bigint(20) DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `path` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `crt_time` datetime DEFAULT NULL,
  PRIMARY KEY (`i_document`),
  KEY `Index_i_user` (`i_user`),
  KEY `Index_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='文件表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_landlord`
--

DROP TABLE IF EXISTS `t_landlord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_landlord` (
  `i_user` bigint(20) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `property_picture` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `property_info` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `apply_date` datetime DEFAULT NULL,
  `audit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`i_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房东信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_legaladvisor`
--

DROP TABLE IF EXISTS `t_legaladvisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_legaladvisor` (
  `i_legaladvisor` bigint(20) DEFAULT NULL,
  `first_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `second_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `company` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='法律顾问表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_order`
--

DROP TABLE IF EXISTS `t_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_order` (
  `i_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `i_student` bigint(20) DEFAULT NULL,
  `name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `i_property` bigint(20) DEFAULT NULL,
  `i_landlord` bigint(20) DEFAULT NULL,
  `apply_date` datetime DEFAULT NULL,
  `check_in_time` date DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `tanency` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `property_type` int(11) DEFAULT NULL,
  `bill_included` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `contract_type` int(11) DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL,
  `memo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `crt_time` datetime DEFAULT NULL,
  `upd_time` datetime DEFAULT NULL,
  PRIMARY KEY (`i_order`),
  KEY `Index_i_landlord` (`i_landlord`),
  KEY `Index_i_student` (`i_student`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='订单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_property`
--

DROP TABLE IF EXISTS `t_property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_property` (
  `i_property` bigint(20) NOT NULL,
  `address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `full_address` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `rent_per_week` int(11) DEFAULT NULL,
  `i_owner` bigint(20) DEFAULT NULL,
  `owner_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `smoker` int(11) DEFAULT NULL,
  `pets` int(11) DEFAULT NULL,
  `parlor` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `post_code` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `img_path` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `detail_description` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `t_propertycol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `img_path1` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `img_path2` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `img_path3` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `img_path4` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_property`),
  KEY `Index_longitude` (`longitude`),
  KEY `Index_latitude` (`latitude`),
  KEY `Index_rent` (`rent_per_week`),
  KEY `Index_smoker` (`smoker`),
  KEY `Index_pets` (`pets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房屋信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_student_detail`
--

DROP TABLE IF EXISTS `t_student_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_student_detail` (
  `i_student` bigint(20) NOT NULL,
  `year_of_study` int(11) DEFAULT NULL,
  `university` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `course` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `resident_address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `memo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='学生详情表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user` (
  `i_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `remaining_sum` float DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `verification_doc` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `pictrue` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `identity` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `memo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `crt_time` datetime DEFAULT NULL,
  `upd_time` datetime DEFAULT NULL,
  PRIMARY KEY (`i_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-23 23:54:36
