-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.3.32-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour eval_base
CREATE DATABASE IF NOT EXISTS `eval_base` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `eval_base`;

-- Listage de la structure de la table eval_base. Clients
CREATE TABLE IF NOT EXISTS `Clients` (
  `cli_num` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(50) DEFAULT NULL,
  `cli_adresse` varchar(50) DEFAULT NULL,
  `cli_tel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cli_num`),
  KEY `cli_nom` (`cli_nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table eval_base. Commande
CREATE TABLE IF NOT EXISTS `Commande` (
  `com_num` int(11) NOT NULL AUTO_INCREMENT,
  `cli_num` int(11) NOT NULL,
  `com_date` datetime NOT NULL,
  `com_obs` varchar(50) NOT NULL,
  PRIMARY KEY (`com_num`),
  KEY `cli_num` (`cli_num`),
  CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`cli_num`) REFERENCES `Clients` (`cli_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table eval_base. est_compose
CREATE TABLE IF NOT EXISTS `est_compose` (
  `com_num` int(11) NOT NULL AUTO_INCREMENT,
  `pro_num` int(11) NOT NULL,
  `est_qte` int(11) NOT NULL,
  PRIMARY KEY (`com_num`,`pro_num`),
  KEY `pro_num` (`pro_num`),
  CONSTRAINT `est_compose_ibfk_1` FOREIGN KEY (`com_num`) REFERENCES `Commande` (`com_num`),
  CONSTRAINT `est_compose_ibfk_2` FOREIGN KEY (`pro_num`) REFERENCES `Produit` (`pro_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table eval_base. Produit
CREATE TABLE IF NOT EXISTS `Produit` (
  `pro_num` int(11) NOT NULL AUTO_INCREMENT,
  `pro_libelle` varchar(50) NOT NULL,
  `pro_description` varchar(50) NOT NULL,
  PRIMARY KEY (`pro_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
