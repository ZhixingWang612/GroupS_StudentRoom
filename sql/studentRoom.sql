-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2019 at 11:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_apply`
--

DROP TABLE IF EXISTS `t_apply`;
CREATE TABLE IF NOT EXISTS `t_apply` (
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

-- --------------------------------------------------------

--
-- Table structure for table `t_browse_record`
--

DROP TABLE IF EXISTS `t_browse_record`;
CREATE TABLE IF NOT EXISTS `t_browse_record` (
  `i_browse_record` bigint(20) NOT NULL,
  `i_property` bigint(20) DEFAULT NULL,
  `i_user` bigint(20) DEFAULT NULL,
  `browse_record` datetime DEFAULT NULL,
  PRIMARY KEY (`i_browse_record`),
  KEY `Index_i_property` (`i_property`),
  KEY `Index_i_user` (`i_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Browse History';

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE IF NOT EXISTS `t_comment` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Comments';

-- --------------------------------------------------------

--
-- Table structure for table `t_contract`
--

DROP TABLE IF EXISTS `t_contract`;
CREATE TABLE IF NOT EXISTS `t_contract` (
  `i_contract` bigint(20) NOT NULL,
  `startDate` datetime DEFAULT NULL,
  `i_legaladvisor` bigint(20) DEFAULT NULL,
  `validate` int(11) DEFAULT NULL,
  `file` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Contracts';

--
-- Dumping data for table `t_contract`
--

INSERT INTO `t_contract` (`i_contract`, `startDate`, `i_legaladvisor`, `validate`, `file`) VALUES
(32, '2019-03-24 00:00:00', 3, 0, '15534418135954');

-- --------------------------------------------------------

--
-- Table structure for table `t_document`
--

DROP TABLE IF EXISTS `t_document`;
CREATE TABLE IF NOT EXISTS `t_document` (
  `i_document` bigint(20) NOT NULL,
  `i_user` bigint(20) DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `path` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `crt_time` datetime DEFAULT NULL,
  PRIMARY KEY (`i_document`),
  KEY `Index_i_user` (`i_user`),
  KEY `Index_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Documentations';

-- --------------------------------------------------------

--
-- Table structure for table `t_landlord`
--

DROP TABLE IF EXISTS `t_landlord`;
CREATE TABLE IF NOT EXISTS `t_landlord` (
  `i_user` bigint(20) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `property_picture` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `property_info` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `apply_date` datetime DEFAULT NULL,
  `audit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`i_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Landlord Info';

-- --------------------------------------------------------

--
-- Table structure for table `t_legaladvisor`
--

DROP TABLE IF EXISTS `t_legaladvisor`;
CREATE TABLE IF NOT EXISTS `t_legaladvisor` (
  `i_legaladvisor` bigint(20) DEFAULT NULL,
  `first_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `second_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `company` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Legal Advisors';

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

DROP TABLE IF EXISTS `t_order`;
CREATE TABLE IF NOT EXISTS `t_order` (
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Orders';

--
-- Dumping data for table `t_order`
--

INSERT INTO `t_order` (`i_order`, `i_student`, `name`, `phone`, `email`, `i_property`, `i_landlord`, `apply_date`, `check_in_time`, `state`, `tanency`, `property_type`, `bill_included`, `contract_type`, `is_verified`, `memo`, `crt_time`, `upd_time`) VALUES
(32, 1, 'Zhixing', '07521141312', '896730358@qq.com', 1, 2, '2019-03-24 15:32:08', NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_property`
--

DROP TABLE IF EXISTS `t_property`;
CREATE TABLE IF NOT EXISTS `t_property` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Property Info';

--
-- Dumping data for table `t_property`
--

INSERT INTO `t_property` (`i_property`, `address`, `full_address`, `longitude`, `latitude`, `description`, `payment`, `rent_per_week`, `i_owner`, `owner_name`, `phone`, `email`, `smoker`, `pets`, `parlor`, `bedroom`, `kitchen`, `post_code`, `bathroom`, `state`, `release_date`, `img_path`, `detail_description`, `t_propertycol`, `img_path1`, `img_path2`, `img_path3`, `img_path4`) VALUES
(1, 'near college', NULL, 317, 325, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 50, 2, 'Mr. ', NULL, NULL, 1, 1, 1, 2, 1, '360024', 1, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg'),
(2, 'near road', NULL, 318, 326, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 48, 2, 'Mr. Yi', NULL, NULL, 0, 0, 2, 1, 0, '360024', 2, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg'),
(3, 'near college', NULL, 319, 327, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 47, 2, 'Mr. Y', NULL, NULL, 0, 0, 1, 2, 1, '360024', 1, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg'),
(4, 'near road', NULL, 320, 328, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 46, 2, 'Mr. I', NULL, NULL, 0, 0, 2, 1, 1, '360024', 2, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg'),
(5, 'near college', NULL, 321, 329, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 45, 2, 'Mr. N', NULL, NULL, 1, 1, 1, 2, 1, '360024', 1, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg'),
(6, 'near road', NULL, 322, 330, 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', 1, 44, 2, 'Mr. S', NULL, NULL, 0, 0, 2, 1, 0, '360024', 2, NULL, '2019-02-01', 'img\\Room1.jpg', 'When we look at the news of the successful persons, we are easy to owe their success to their talent and hard working. Less people will search more information about how these people lived before they made a difference.', NULL, 'img\\Room1.jpg', 'img\\head.jpg', 'img\\house4.png', 'img\\Room1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_student_detail`
--

DROP TABLE IF EXISTS `t_student_detail`;
CREATE TABLE IF NOT EXISTS `t_student_detail` (
  `i_student` bigint(20) NOT NULL,
  `year_of_study` int(11) DEFAULT NULL,
  `university` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `course` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `resident_address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `memo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`i_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Student Info';

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User Table';

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`i_user`, `first_name`, `last_name`, `gender`, `email`, `phone`, `password`, `remaining_sum`, `birth_date`, `verification_doc`, `type`, `pictrue`, `identity`, `memo`, `crt_time`, `upd_time`) VALUES
(1, 'Zhixing', 'Wang', 1, '896730358@qq.com', '07521141312', '111', NULL, '1998-06-12', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Penglin', 'Cai', 1, '324343909@qq.com', '07454388398', '123', NULL, '2000-04-02', NULL, 2, NULL, NULL, NULL, NULL, NULL),
(3, 'Qiliang', 'Huang', 1, '098083984@qq.com', '09823932992', '131', NULL, '1993-05-18', NULL, 4, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
