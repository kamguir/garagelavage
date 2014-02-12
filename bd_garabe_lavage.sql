/*
SQLyog Enterprise v8.71 
MySQL - 5.5.16-log : Database - garage_lavage
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`garage_lavage` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `garage_lavage`;

/*Table structure for table `ref_couleur` */

DROP TABLE IF EXISTS `ref_couleur`;

CREATE TABLE `ref_couleur` (
  `id_couleur` int(11) NOT NULL,
  `nom_couleur` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_couleur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_couleur` */

LOCK TABLES `ref_couleur` WRITE;

insert  into `ref_couleur`(`id_couleur`,`nom_couleur`,`code`) values (1,'white','#FFFFFF'),(2,'black','#000000'),(3,'yellow','#FFFF00'),(4,'red','#FF0000'),(5,'blue','#0000FF'),(6,'green','#008000'),(7,'maroon','#800000'),(8,'whitesmoke','#F5F5F5'),(9,'gold','#FFD700'),(10,'yellowgreen','#9ACD32');

UNLOCK TABLES;

/*Table structure for table `ref_depances` */

DROP TABLE IF EXISTS `ref_depances`;

CREATE TABLE `ref_depances` (
  `id_ref_depances` int(11) NOT NULL,
  `libelle_depances` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ref_depances`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_depances` */

LOCK TABLES `ref_depances` WRITE;

insert  into `ref_depances`(`id_ref_depances`,`libelle_depances`) values (1,'eau'),(2,'electricité'),(3,'loyer'),(4,'employes'),(5,'Achat New Matériels'),(6,'maintenance Matériels'),(7,'produits lavage');

UNLOCK TABLES;

/*Table structure for table `ref_marque` */

DROP TABLE IF EXISTS `ref_marque`;

CREATE TABLE `ref_marque` (
  `marque_id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_libelle` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`marque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `ref_marque` */

LOCK TABLES `ref_marque` WRITE;

insert  into `ref_marque`(`marque_id`,`marque_libelle`) values (1,'alfa romeo                                        '),(2,'aro                                               '),(3,'aston martin                                      '),(4,'audi                                              '),(5,'auverland                                         '),(6,'bentley'),(7,'bmw                                               '),(8,'cadillac                                          '),(9,'chevrolet                                         '),(10,'chrysler                                          '),(11,'citroen                                           '),(12,'daewoo                                            '),(13,'daihatsu                                          '),(14,'dallas                                            '),(15,'ferrari                                           '),(16,'fiat                                              '),(17,'ford                                              '),(18,'fso                                               '),(19,'honda                                             '),(20,'hyundai                                           '),(21,'isuzu                                             '),(22,'iveco                                             '),(23,'jaguar                                            '),(24,'jeep                                              '),(25,'kia                                               '),(26,'lada                                              '),(27,'lamborghini                                       '),(28,'lancia                                            '),(29,'land-rover                                        '),(30,'ldv                                               '),(31,'lexus                                             '),(32,'lotus                                             '),(33,'maserati                                          '),(34,'maybach                                           '),(35,'mazda                                             '),(36,'mega                                              '),(37,'mercedes                                    '),(38,'mg                                                '),(39,'mini                                              '),(40,'mitsubishi                                        '),(41,'nissan                                            '),(42,'non renseignÃ©'),(43,'opel                                              '),(44,'peugeot                                           '),(45,'piaggio                                           '),(46,'porsche                                           '),(47,'proton                                            '),(48,'renault                                           '),(49,'renault v.i.                                      '),(50,'renaulttrucks                                     '),(51,'rolls royce                                       '),(52,'rover                                             '),(53,'saab                                              '),(54,'seat                                              '),(55,'skoda                                             '),(56,'smart                                             '),(57,'sovamag                                           '),(58,'ssangyong                                         '),(59,'subaru                                            '),(60,'suzuki                                            '),(61,'toyota                                            '),(62,'tvr                                               '),(63,'venturi                                           '),(64,'volkswagen                                        '),(65,'volvo                                             ');

UNLOCK TABLES;

/*Table structure for table `ref_motorisation` */

DROP TABLE IF EXISTS `ref_motorisation`;

CREATE TABLE `ref_motorisation` (
  `id_motorisation` int(11) NOT NULL,
  `motorisation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_motorisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_motorisation` */

LOCK TABLES `ref_motorisation` WRITE;

insert  into `ref_motorisation`(`id_motorisation`,`motorisation`) values (1,'diesel'),(2,'essence'),(3,'électriques'),(4,'hybrides'),(5,'GPL');

UNLOCK TABLES;

/*Table structure for table `ref_situation` */

DROP TABLE IF EXISTS `ref_situation`;

CREATE TABLE `ref_situation` (
  `id_situation` int(10) NOT NULL,
  `situation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_situation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_situation` */

LOCK TABLES `ref_situation` WRITE;

insert  into `ref_situation`(`id_situation`,`situation`) values (1,'marié(e)'),(2,'célibataire'),(3,'divorcé(e)'),(4,'veuf (ve)');

UNLOCK TABLES;

/*Table structure for table `ref_type_lavage` */

DROP TABLE IF EXISTS `ref_type_lavage`;

CREATE TABLE `ref_type_lavage` (
  `id_type_lavage` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_type_lavage`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ref_type_lavage` */

LOCK TABLES `ref_type_lavage` WRITE;

insert  into `ref_type_lavage`(`id_type_lavage`,`libelle`) values (1,'lavage extérieur'),(2,'lavage intérieur'),(3,'lavage sans eau');

UNLOCK TABLES;

/*Table structure for table `tbl_client` */

DROP TABLE IF EXISTS `tbl_client`;

CREATE TABLE `tbl_client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `cin_client` varchar(10) DEFAULT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `prenom_client` varchar(255) DEFAULT NULL,
  `situation` int(11) DEFAULT NULL,
  `age_client` int(11) DEFAULT NULL,
  `num_tel` int(11) DEFAULT NULL,
  `adresse_client` varchar(255) DEFAULT NULL,
  `fonction_client` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `FK_tbl_client` (`situation`),
  CONSTRAINT `FK_tbl_client` FOREIGN KEY (`situation`) REFERENCES `ref_situation` (`id_situation`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_client` */

LOCK TABLES `tbl_client` WRITE;

insert  into `tbl_client`(`id_client`,`cin_client`,`nom_client`,`prenom_client`,`situation`,`age_client`,`num_tel`,`adresse_client`,`fonction_client`) values (1,'v239301','amguir','karim',2,27,671148535,'9araouia','DEV'),(2,'V221133','ennajaren','rachid',1,27,78686767,'3li bouchi','COM'),(3,'V445533','Attouche','Abdelilah',2,27,8786556,'7amria','NET');

UNLOCK TABLES;

/*Table structure for table `tbl_depances` */

DROP TABLE IF EXISTS `tbl_depances`;

CREATE TABLE `tbl_depances` (
  `id_depances` int(11) NOT NULL AUTO_INCREMENT,
  `date_depances` date DEFAULT NULL,
  `id_ref_depances` int(11) DEFAULT NULL,
  `montant_depances` double DEFAULT NULL,
  `etat_payement` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_depances`),
  UNIQUE KEY `id_depances` (`id_depances`),
  KEY `FK_tbl_depances` (`id_ref_depances`),
  CONSTRAINT `FK_tbl_depances` FOREIGN KEY (`id_ref_depances`) REFERENCES `ref_depances` (`id_ref_depances`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_depances` */

LOCK TABLES `tbl_depances` WRITE;

insert  into `tbl_depances`(`id_depances`,`date_depances`,`id_ref_depances`,`montant_depances`,`etat_payement`) values (1,'2013-09-01',2,2001,0),(2,'2013-09-01',3,3000,1),(4,'2013-03-01',1,2222,1);

UNLOCK TABLES;

/*Table structure for table `tbl_facture` */

DROP TABLE IF EXISTS `tbl_facture`;

CREATE TABLE `tbl_facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `id_voiture` int(11) DEFAULT NULL,
  `id_type_lavage` int(11) DEFAULT NULL,
  `montant_reglement` double DEFAULT NULL,
  `commentaire_reglement` varchar(255) DEFAULT NULL,
  `date_reglement` datetime DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_facture`),
  KEY `FK_voiture_tbl_reglement` (`id_voiture`),
  KEY `FK_tbl_facture` (`id_type_lavage`),
  CONSTRAINT `FK_tbl_facture` FOREIGN KEY (`id_type_lavage`) REFERENCES `ref_type_lavage` (`id_type_lavage`),
  CONSTRAINT `FK_voiture_tbl_reglement` FOREIGN KEY (`id_voiture`) REFERENCES `tbl_voiture` (`id_voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_facture` */

LOCK TABLES `tbl_facture` WRITE;

insert  into `tbl_facture`(`id_facture`,`id_voiture`,`id_type_lavage`,`montant_reglement`,`commentaire_reglement`,`date_reglement`,`etat`) values (4,13,2,50,'ok','2013-09-01 00:00:00',0),(5,14,1,444,'OK','2013-08-01 00:00:00',1);

UNLOCK TABLES;

/*Table structure for table `tbl_objectif` */

DROP TABLE IF EXISTS `tbl_objectif`;

CREATE TABLE `tbl_objectif` (
  `id_objectif` int(11) NOT NULL AUTO_INCREMENT,
  `bjectif__date` date DEFAULT NULL,
  `objectif_fixe` int(11) DEFAULT NULL,
  `objectif_realiser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_objectif`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_objectif` */

LOCK TABLES `tbl_objectif` WRITE;

insert  into `tbl_objectif`(`id_objectif`,`bjectif__date`,`objectif_fixe`,`objectif_realiser`) values (1,'2013-01-01',59,55),(2,'2013-02-01',60,0),(3,'2013-03-01',2,4),(4,'2013-04-01',100,99),(5,'2013-05-01',90,40),(6,'2013-06-01',100,30),(7,'2013-07-01',200,33),(8,'2013-08-01',300,200),(9,'2013-09-01',400,66),(10,'2013-10-01',450,40),(11,'2013-11-01',100,40),(12,'2013-12-01',300,50);

UNLOCK TABLES;

/*Table structure for table `tbl_ticket` */

DROP TABLE IF EXISTS `tbl_ticket`;

CREATE TABLE `tbl_ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_facture` int(11) DEFAULT NULL,
  `date_entree_garage` datetime DEFAULT NULL,
  `date_sortie_garage` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `FK_tbl_ticket` (`id_facture`),
  CONSTRAINT `FK_tbl_ticket` FOREIGN KEY (`id_facture`) REFERENCES `tbl_facture` (`id_facture`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_ticket` */

LOCK TABLES `tbl_ticket` WRITE;

insert  into `tbl_ticket`(`id_ticket`,`id_facture`,`date_entree_garage`,`date_sortie_garage`) values (1,4,'2013-09-01 00:00:00','2013-09-01 01:00:00'),(2,5,'2013-09-01 04:00:00','2013-09-01 00:30:00');

UNLOCK TABLES;

/*Table structure for table `tbl_voiture` */

DROP TABLE IF EXISTS `tbl_voiture`;

CREATE TABLE `tbl_voiture` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `immatriculation` varchar(100) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL,
  `id_motorisation` int(11) DEFAULT NULL,
  `couleur` int(11) DEFAULT NULL,
  `nbr_portes` int(11) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `nb_visite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_voiture`),
  KEY `FK_tbl_voiture` (`id_motorisation`),
  KEY `FK_marque_tbl_voiture` (`id_marque`),
  KEY `FK_couleur2_tbl_voiture` (`couleur`),
  KEY `FK_tbl_voiture_client` (`id_client`),
  CONSTRAINT `FK_couleur2_tbl_voiture` FOREIGN KEY (`couleur`) REFERENCES `ref_couleur` (`id_couleur`),
  CONSTRAINT `FK_marque_tbl_voiture` FOREIGN KEY (`id_marque`) REFERENCES `ref_marque` (`marque_id`),
  CONSTRAINT `FK_tbl_voiture` FOREIGN KEY (`id_motorisation`) REFERENCES `ref_motorisation` (`id_motorisation`),
  CONSTRAINT `FK_tbl_voiture_client` FOREIGN KEY (`id_client`) REFERENCES `tbl_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_voiture` */

LOCK TABLES `tbl_voiture` WRITE;

insert  into `tbl_voiture`(`id_voiture`,`id_client`,`immatriculation`,`id_marque`,`id_motorisation`,`couleur`,`nbr_portes`,`modele`,`annee`,`nb_visite`) values (13,1,'2222/A/44',61,3,7,5,'2006',2000,2),(14,2,'44/A/23425',48,2,10,5,'009',400,3),(15,1,'',13,1,5,5,'2000',5220,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
