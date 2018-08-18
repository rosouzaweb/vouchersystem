# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Base de Dados: vouchersystem
# Tempo de Geração: 2018-08-18 22:17:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela recipients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;

INSERT INTO `recipients` (`id`, `name`, `email`)
VALUES
	(1,'Rodrigo Souza','rodrigo@gowebdesign.com.br'),
	(2,'Sara Plech','sara.plech@hotmail.com');

/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela special_offers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `special_offers`;

CREATE TABLE `special_offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `fixed_percentage` float NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `special_offers` WRITE;
/*!40000 ALTER TABLE `special_offers` DISABLE KEYS */;

INSERT INTO `special_offers` (`id`, `name`, `fixed_percentage`, `created`)
VALUES
	(10,'New Recipients',10,'2018-08-18 14:53:36'),
	(11,'New Recipients',10,'2018-08-18 14:53:50'),
	(12,'Returning Recipients',5,'2018-08-18 14:56:00');

/*!40000 ALTER TABLE `special_offers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela vouchers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vouchers`;

CREATE TABLE `vouchers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `recipient_id` int(11) unsigned NOT NULL,
  `special_offer_id` int(11) unsigned NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT '',
  `expiration_date` datetime NOT NULL,
  `used` char(1) NOT NULL DEFAULT '',
  `date_usage` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `recipient_id` (`recipient_id`),
  KEY `special_offer_id` (`special_offer_id`),
  CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`recipient_id`) REFERENCES `recipients` (`id`),
  CONSTRAINT `vouchers_ibfk_2` FOREIGN KEY (`special_offer_id`) REFERENCES `special_offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;

INSERT INTO `vouchers` (`id`, `recipient_id`, `special_offer_id`, `code`, `expiration_date`, `used`, `date_usage`)
VALUES
	(2,1,11,'S51XA7G8O5','2018-09-02 14:53:50','N',NULL),
	(3,2,11,'DYZNA39UZ8','2018-09-02 14:53:50','N',NULL),
	(4,1,12,'HH9J4YU85J','2018-09-02 20:42:59','Y','2018-08-18 20:42:59'),
	(5,2,12,'8LIX65YC8G','2018-09-02 14:56:00','N',NULL);

/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
