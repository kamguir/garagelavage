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

/*Table structure for table `lnk_type_lavage_facture` */

DROP TABLE IF EXISTS `lnk_type_lavage_facture`;

CREATE TABLE `lnk_type_lavage_facture` (
  `id_type_lavage` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  PRIMARY KEY (`id_type_lavage`,`id_facture`),
  KEY `FK_lnk_type_lavage_facture` (`id_facture`),
  CONSTRAINT `FK_lnk_type_lavage_facture` FOREIGN KEY (`id_facture`) REFERENCES `tbl_facture` (`id_facture`),
  CONSTRAINT `FK_lnk_type_lavage_facture1` FOREIGN KEY (`id_type_lavage`) REFERENCES `ref_type_lavage` (`id_type_lavage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lnk_type_lavage_facture` */

LOCK TABLES `lnk_type_lavage_facture` WRITE;

insert  into `lnk_type_lavage_facture`(`id_type_lavage`,`id_facture`) values (6,193),(5,194);

UNLOCK TABLES;

/*Table structure for table `lnk_user_profil` */

DROP TABLE IF EXISTS `lnk_user_profil`;

CREATE TABLE `lnk_user_profil` (
  `user_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`profil_id`),
  KEY `FK_lnk_user_profil2` (`profil_id`),
  CONSTRAINT `lnk_user_profil_FK_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `lnk_user_profil_FK_2` FOREIGN KEY (`profil_id`) REFERENCES `ref_profil` (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lnk_user_profil` */

LOCK TABLES `lnk_user_profil` WRITE;

insert  into `lnk_user_profil`(`user_id`,`profil_id`) values (1,1);

UNLOCK TABLES;

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

/*Table structure for table `ref_depenses` */

DROP TABLE IF EXISTS `ref_depenses`;

CREATE TABLE `ref_depenses` (
  `id_ref_depenses` int(11) NOT NULL,
  `libelle_depenses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ref_depenses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_depenses` */

LOCK TABLES `ref_depenses` WRITE;

insert  into `ref_depenses`(`id_ref_depenses`,`libelle_depenses`) values (1,'eau'),(2,'electricité'),(3,'loyer'),(4,'employes'),(5,'Achat New Matériels'),(6,'maintenance Matériels'),(7,'produits lavage');

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

insert  into `ref_marque`(`marque_id`,`marque_libelle`) values (1,'alfa romeo                                        '),(2,'aro                                               '),(3,'aston martin                                      '),(4,'audi                                              '),(5,'auverland                                         '),(7,'bmw                                               '),(8,'cadillac                                          '),(9,'chevrolet                                         '),(10,'chrysler                                          '),(11,'citroen                                           '),(12,'daewoo                                            '),(13,'daihatsu                                          '),(14,'dallas                                            '),(15,'ferrari                                           '),(16,'fiat                                              '),(17,'ford                                              '),(18,'fso                                               '),(19,'honda                                             '),(20,'hyundai                                           '),(21,'isuzu                                             '),(23,'jaguar                                            '),(24,'jeep                                              '),(25,'kia                                               '),(26,'lada                                              '),(27,'lamborghini                                       '),(28,'lancia                                            '),(29,'land-rover                                        '),(30,'ldv                                               '),(31,'lexus                                             '),(32,'lotus                                             '),(33,'maserati                                          '),(34,'maybach                                           '),(35,'mazda                                             '),(36,'mega                                              '),(37,'mercedes                                    '),(39,'mini                                              '),(40,'mitsubishi                                        '),(41,'nissan                                            '),(43,'opel                                              '),(44,'peugeot                                           '),(45,'piaggio                                           '),(46,'porsche                                           '),(47,'proton                                            '),(48,'renault                                           '),(49,'renault v.i.                                      '),(51,'rolls royce                                       '),(52,'rover                                             '),(54,'seat                                              '),(55,'skoda                                             '),(56,'smart                                             '),(57,'sovamag                                           '),(58,'ssangyong                                         '),(60,'suzuki                                            '),(61,'toyota                                            '),(64,'volkswagen                                        '),(65,'volvo                                             ');

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

/*Table structure for table `ref_nbr_portes` */

DROP TABLE IF EXISTS `ref_nbr_portes`;

CREATE TABLE `ref_nbr_portes` (
  `id_nbr_portes` int(11) NOT NULL,
  `libellet_nbr_portes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nbr_portes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_nbr_portes` */

LOCK TABLES `ref_nbr_portes` WRITE;

insert  into `ref_nbr_portes`(`id_nbr_portes`,`libellet_nbr_portes`) values (2,'2 portes (sans hayon)'),(3,'3 portes (2 portes + hayon)'),(4,'4 portes (sans hayon)'),(5,'5 portes (4 portes + hayon)');

UNLOCK TABLES;

/*Table structure for table `ref_profil` */

DROP TABLE IF EXISTS `ref_profil`;

CREATE TABLE `ref_profil` (
  `profil_id` int(11) NOT NULL,
  `profil_libelle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ref_profil` */

LOCK TABLES `ref_profil` WRITE;

insert  into `ref_profil`(`profil_id`,`profil_libelle`) values (1,'admin_site'),(2,'user');

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
  `montant_lavage` double DEFAULT NULL,
  `time_lavage` time DEFAULT NULL,
  PRIMARY KEY (`id_type_lavage`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ref_type_lavage` */

LOCK TABLES `ref_type_lavage` WRITE;

insert  into `ref_type_lavage`(`id_type_lavage`,`libelle`,`montant_lavage`,`time_lavage`) values (1,'lavage extérieur',14,'00:10:00'),(2,'lavage Normal',25,'00:20:00'),(3,'lavage sans eau',10,'00:10:00'),(4,'lavage motorisation',10,'00:10:00'),(5,'lavage complet',200,'00:30:00'),(6,'vidange',15,'00:10:00');

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
  `is_employe` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_client`),
  KEY `FK_tbl_client` (`situation`),
  CONSTRAINT `FK_tbl_client` FOREIGN KEY (`situation`) REFERENCES `ref_situation` (`id_situation`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_client` */

LOCK TABLES `tbl_client` WRITE;

insert  into `tbl_client`(`id_client`,`cin_client`,`nom_client`,`prenom_client`,`situation`,`age_client`,`num_tel`,`adresse_client`,`fonction_client`,`is_employe`) values (1,'v239303','amguir','karim',2,27,671148535,'41 lotissment Saada','DEV',1),(2,'V221133','ennajaren','rachid',1,27,78686767,'3li bouchi','COM',0),(3,'V445533','Attouche','Abdelilah',2,27,8786556,'7amria','NET',0),(4,'v239301','Rafiki','Yassine',1,26,2147483647,'SAADA khenifra','ddd',0),(5,'cqs02s','ettiss','anass',3,27,0,'casablanca','qsqs',0),(6,'209876T5','Mondir','Younes',1,43,2147483647,'Khénifra','Professeur',0),(7,'casa0003','idbelid','said',3,27,0,'ifrane maroc','developpeur',0),(8,'V445566','ait addi','Youssef',2,27,67676767,'sidi maarouf 2 casabmanca','ingénieur test',0),(9,'22KKII','boujbir','ayoub',2,33,2147483647,'','',0),(10,'a0102230','chegrane','maria',3,25,65656565,'az32324','admin reseaux',0),(11,'V443322','smaili','Fouad',2,30,671148535,'achbaro','gr',0),(12,'d213698','Atouil','Ghizlane',1,32,661616161,'casa','administration',0),(13,'v993322','tinaji','moustapha',2,30,671148535,'amalou','',1),(14,'','rachid','rach',1,NULL,0,'','',1);

UNLOCK TABLES;

/*Table structure for table `tbl_depenses` */

DROP TABLE IF EXISTS `tbl_depenses`;

CREATE TABLE `tbl_depenses` (
  `id_depenses` int(11) NOT NULL AUTO_INCREMENT,
  `date_depenses` date DEFAULT NULL,
  `id_ref_depenses` int(11) DEFAULT NULL,
  `montant_depenses` double DEFAULT NULL,
  `etat_payement` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_depenses`),
  UNIQUE KEY `id_depances` (`id_depenses`),
  KEY `FK_tbl_depances` (`id_ref_depenses`),
  CONSTRAINT `FK_tbl_depenses` FOREIGN KEY (`id_ref_depenses`) REFERENCES `ref_depenses` (`id_ref_depenses`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_depenses` */

LOCK TABLES `tbl_depenses` WRITE;

insert  into `tbl_depenses`(`id_depenses`,`date_depenses`,`id_ref_depenses`,`montant_depenses`,`etat_payement`) values (30,'2014-03-05',2,0,1);

UNLOCK TABLES;

/*Table structure for table `tbl_employeur` */

DROP TABLE IF EXISTS `tbl_employeur`;

CREATE TABLE `tbl_employeur` (
  `id_employeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_employeur` varchar(50) DEFAULT NULL,
  `prenom_employeur` varchar(50) DEFAULT NULL,
  `nom_societe` varchar(30) DEFAULT NULL,
  `num_telephone_employeur` varchar(20) DEFAULT NULL,
  `adresse_societe` varchar(100) DEFAULT NULL,
  `ville_societe` varchar(50) DEFAULT NULL,
  `adresse_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_employeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_employeur` */

LOCK TABLES `tbl_employeur` WRITE;

insert  into `tbl_employeur`(`id_employeur`,`nom_employeur`,`prenom_employeur`,`nom_societe`,`num_telephone_employeur`,`adresse_societe`,`ville_societe`,`adresse_email`) values (1,'Boujbir','Ayoub','Lavage Ayoub','0662527722','41 tamoumant oumrabiaa ','Khénifra','ayoub.boujbir@gmail.com');

UNLOCK TABLES;

/*Table structure for table `tbl_facture` */

DROP TABLE IF EXISTS `tbl_facture`;

CREATE TABLE `tbl_facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `id_voiture` int(11) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `prix_lavage` double DEFAULT NULL,
  `commentaire_reglement` varchar(255) DEFAULT NULL,
  `date_reglement` datetime DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_facture`),
  KEY `FK_voiture_tbl_reglement` (`id_voiture`),
  KEY `FK_tbl_facture` (`id_employe`),
  CONSTRAINT `FK_tbl_facture_employe` FOREIGN KEY (`id_employe`) REFERENCES `tbl_client` (`id_client`),
  CONSTRAINT `FK_voiture_tbl_reglement` FOREIGN KEY (`id_voiture`) REFERENCES `tbl_voiture` (`id_voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_facture` */

LOCK TABLES `tbl_facture` WRITE;

insert  into `tbl_facture`(`id_facture`,`id_voiture`,`id_employe`,`prix_lavage`,`commentaire_reglement`,`date_reglement`,`etat`) values (5,165,2,10,'','2014-03-07 15:35:07',1),(191,165,1,55,'','2014-03-07 15:34:26',1),(193,241,1,15,'VIDANGE','2014-03-08 02:33:50',1),(194,242,13,200,'','2014-03-08 02:35:48',1);

UNLOCK TABLES;

/*Table structure for table `tbl_objectif` */

DROP TABLE IF EXISTS `tbl_objectif`;

CREATE TABLE `tbl_objectif` (
  `id_objectif` int(11) NOT NULL AUTO_INCREMENT,
  `objectif_date` date DEFAULT NULL,
  `objectif_fixe` int(11) DEFAULT '0',
  `objectif_realise` int(11) DEFAULT '0',
  PRIMARY KEY (`id_objectif`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_objectif` */

LOCK TABLES `tbl_objectif` WRITE;

insert  into `tbl_objectif`(`id_objectif`,`objectif_date`,`objectif_fixe`,`objectif_realise`) values (18,'2014-03-07',55,5);

UNLOCK TABLES;

/*Table structure for table `tbl_param_portail` */

DROP TABLE IF EXISTS `tbl_param_portail`;

CREATE TABLE `tbl_param_portail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param_lib` varchar(127) DEFAULT NULL,
  `param_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_param_portail` */

LOCK TABLES `tbl_param_portail` WRITE;

insert  into `tbl_param_portail`(`id`,`param_lib`,`param_value`) values (1,'VERSION','1.4.4'),(2,'NOM_PROJET','Gestion Lavage');

UNLOCK TABLES;

/*Table structure for table `tbl_tapis` */

DROP TABLE IF EXISTS `tbl_tapis`;

CREATE TABLE `tbl_tapis` (
  `num_tapis` int(11) NOT NULL AUTO_INCREMENT,
  `taille_tapis` int(11) DEFAULT NULL,
  `prix_mettre_carre` double DEFAULT '15',
  `montant_lavage_tapis` double DEFAULT NULL,
  `date_lavage_tapis` datetime DEFAULT NULL,
  PRIMARY KEY (`num_tapis`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_tapis` */

LOCK TABLES `tbl_tapis` WRITE;

insert  into `tbl_tapis`(`num_tapis`,`taille_tapis`,`prix_mettre_carre`,`montant_lavage_tapis`,`date_lavage_tapis`) values (22,8,15,120,'2014-03-08 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_ticket` */

LOCK TABLES `tbl_ticket` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(200) DEFAULT NULL,
  `user_prenom` varchar(200) DEFAULT NULL,
  `user_login` varchar(200) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_mail` varchar(200) DEFAULT NULL,
  `user_compte_active` tinyint(1) DEFAULT NULL,
  `user_last_cnx` datetime DEFAULT NULL,
  `user_nb_cnx` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`user_id`,`user_nom`,`user_prenom`,`user_login`,`user_password`,`user_mail`,`user_compte_active`,`user_last_cnx`,`user_nb_cnx`) values (1,'amguir','karim','karim','karim',NULL,1,'2014-03-08 02:31:59',18);

UNLOCK TABLES;

/*Table structure for table `tbl_voiture` */

DROP TABLE IF EXISTS `tbl_voiture`;

CREATE TABLE `tbl_voiture` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `immatriculation` varchar(100) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL,
  `id_motorisation` int(11) DEFAULT NULL,
  `couleur` varchar(30) DEFAULT NULL,
  `nbr_portes` int(11) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `nb_visite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_voiture`),
  KEY `FK_tbl_voiture` (`id_motorisation`),
  KEY `FK_marque_tbl_voiture` (`id_marque`),
  KEY `FK_couleur2_tbl_voiture` (`couleur`),
  KEY `FK_tbl_voiture_client` (`id_client`),
  KEY `FK_tbl_voiture_nbr_portes` (`nbr_portes`),
  CONSTRAINT `FK_marque_tbl_voiture` FOREIGN KEY (`id_marque`) REFERENCES `ref_marque` (`marque_id`),
  CONSTRAINT `FK_tbl_voiture` FOREIGN KEY (`id_motorisation`) REFERENCES `ref_motorisation` (`id_motorisation`),
  CONSTRAINT `FK_tbl_voiture_client` FOREIGN KEY (`id_client`) REFERENCES `tbl_client` (`id_client`),
  CONSTRAINT `FK_tbl_voiture_nbr_portes` FOREIGN KEY (`nbr_portes`) REFERENCES `ref_nbr_portes` (`id_nbr_portes`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_voiture` */

LOCK TABLES `tbl_voiture` WRITE;

insert  into `tbl_voiture`(`id_voiture`,`id_client`,`immatriculation`,`id_marque`,`id_motorisation`,`couleur`,`nbr_portes`,`modele`,`annee`,`nb_visite`) values (165,1,'6638/1/24',30,1,'52CC5E',5,'2008',2013,1),(241,2,'1111/1/24',7,2,'54FF47',5,'',0,1),(242,5,'22222/1/15',4,1,'0D0D0D',5,'',0,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
