/*
SQLyog Ultimate v8.8 
MySQL - 5.5.24-log : Database - fba_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fba_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fba_db`;

/*Table structure for table `analito` */

DROP TABLE IF EXISTS `analito`;

CREATE TABLE `analito` (
  `id_analito` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_analito`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `analito` */

insert  into `analito`(`id_analito`,`descripcion`) values (1,'IRT - Tripsina Inmunoreactiva'),(2,'Galactosa'),(3,'Phe - Fenilalanina'),(4,'TSH');

/*Table structure for table `analito_calibrador` */

DROP TABLE IF EXISTS `analito_calibrador`;

CREATE TABLE `analito_calibrador` (
  `id_calibrador` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_calibrador`,`id_analito`),
  KEY `fk_metodo_calibrador_calibrador1_idx` (`id_calibrador`),
  KEY `fk_metodo_calibrador_analito1_idx` (`id_analito`),
  CONSTRAINT `fk_metodo_calibrador_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_metodo_calibrador_calibrador1` FOREIGN KEY (`id_calibrador`) REFERENCES `calibrador` (`id_calibrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_calibrador` */

insert  into `analito_calibrador`(`id_calibrador`,`id_analito`) values (1,1),(1,2),(1,3),(1,4),(2,1),(2,2),(2,3),(2,4),(3,1),(3,2),(3,3),(3,4),(4,1),(4,2),(4,3),(4,4);

/*Table structure for table `analito_decision` */

DROP TABLE IF EXISTS `analito_decision`;

CREATE TABLE `analito_decision` (
  `id_decision` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_decision`,`id_analito`),
  KEY `fk_analito_decision_analito1_idx` (`id_analito`),
  CONSTRAINT `fk_analito_decision_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_decision1` FOREIGN KEY (`id_decision`) REFERENCES `decision` (`id_decision`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_decision` */

insert  into `analito_decision`(`id_decision`,`id_analito`) values (1,1),(2,1),(3,1),(4,1),(5,1),(1,2),(6,2),(7,2),(8,2),(1,3),(8,3),(9,3),(1,4),(10,4),(11,4),(12,4);

/*Table structure for table `analito_interpretacion` */

DROP TABLE IF EXISTS `analito_interpretacion`;

CREATE TABLE `analito_interpretacion` (
  `id_interpretacion` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_interpretacion`,`id_analito`),
  KEY `fk_table1_analito2_idx` (`id_analito`),
  CONSTRAINT `fk_table1_analito2` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_interpretacion1` FOREIGN KEY (`id_interpretacion`) REFERENCES `interpretacion` (`id_interpretacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_interpretacion` */

insert  into `analito_interpretacion`(`id_interpretacion`,`id_analito`) values (1,1),(2,1),(1,2),(2,2),(1,3),(2,3),(1,4),(2,4);

/*Table structure for table `analito_metodo` */

DROP TABLE IF EXISTS `analito_metodo`;

CREATE TABLE `analito_metodo` (
  `id_analito` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  PRIMARY KEY (`id_analito`,`id_metodo`),
  KEY `fk_table1_metodo1_idx` (`id_metodo`),
  CONSTRAINT `fk_table1_analito3` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_metodo1` FOREIGN KEY (`id_metodo`) REFERENCES `metodo` (`id_metodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_metodo` */

insert  into `analito_metodo`(`id_analito`,`id_metodo`) values (1,1),(4,1),(1,2),(4,2),(1,3),(4,3),(1,4),(4,4),(1,5),(4,5),(2,6),(3,6),(2,7),(3,7),(3,8),(3,9),(3,10),(3,11),(3,12),(4,13),(4,14),(4,15),(4,16),(4,17);

/*Table structure for table `analito_papel_filtro` */

DROP TABLE IF EXISTS `analito_papel_filtro`;

CREATE TABLE `analito_papel_filtro` (
  `id_analito` int(11) NOT NULL,
  `id_papel_filtro` int(11) NOT NULL,
  PRIMARY KEY (`id_analito`,`id_papel_filtro`),
  KEY `fk_metodo_papel_filtro_analito1_idx` (`id_analito`),
  KEY `fk_analito_papel_filtro_papel_filtro1_idx` (`id_papel_filtro`),
  CONSTRAINT `fk_analito_papel_filtro_papel_filtro1` FOREIGN KEY (`id_papel_filtro`) REFERENCES `papel_filtro` (`id_papel_filtro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_metodo_papel_filtro_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_papel_filtro` */

insert  into `analito_papel_filtro`(`id_analito`,`id_papel_filtro`) values (1,1),(1,2),(1,3),(1,4),(2,1),(2,2),(2,3),(2,4),(3,1),(3,2),(3,3),(3,4),(4,1),(4,2),(4,3),(4,4);

/*Table structure for table `analito_reactivo` */

DROP TABLE IF EXISTS `analito_reactivo`;

CREATE TABLE `analito_reactivo` (
  `id_reactivo` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_reactivo`,`id_analito`),
  KEY `id_reactivo` (`id_reactivo`),
  KEY `fk_metodo_reactivo_analito1_idx` (`id_analito`),
  CONSTRAINT `fk_metodo_reactivo_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_reactivo` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivo` (`id_reactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_reactivo` */

insert  into `analito_reactivo`(`id_reactivo`,`id_analito`) values (1,1),(1,2),(1,3),(1,4),(2,1),(2,2),(2,3),(2,4),(3,1),(3,2),(3,3),(3,4),(4,1),(4,2),(4,3),(4,4),(5,1),(5,4),(6,1),(6,4),(7,1),(7,2),(7,3),(7,4),(8,2),(8,3),(8,4),(9,2),(9,3),(9,4),(10,2),(10,3),(10,4),(11,2),(12,2),(12,3),(12,4),(13,3),(14,3),(15,3),(15,4),(16,3),(17,3),(18,3),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4);

/*Table structure for table `analito_valor_corte` */

DROP TABLE IF EXISTS `analito_valor_corte`;

CREATE TABLE `analito_valor_corte` (
  `id_valor_corte` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_valor_corte`,`id_analito`),
  KEY `fk_metodo_valor_corte_valor_corte1_idx` (`id_valor_corte`),
  KEY `fk_metodo_valor_corte_analito1_idx` (`id_analito`),
  CONSTRAINT `fk_metodo_valor_corte_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_metodo_valor_corte_valor_corte1` FOREIGN KEY (`id_valor_corte`) REFERENCES `valor_corte` (`id_valor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `analito_valor_corte` */

insert  into `analito_valor_corte`(`id_valor_corte`,`id_analito`) values (1,4),(2,3),(3,2),(4,1);

/*Table structure for table `calibrador` */

DROP TABLE IF EXISTS `calibrador`;

CREATE TABLE `calibrador` (
  `id_calibrador` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_calibrador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `calibrador` */

insert  into `calibrador`(`id_calibrador`,`descripcion`) values (1,'Papel de filtro. Preparacion propia'),(2,'Papel de filtro. Comerciales'),(3,'Liquidos. Preparacion propia'),(4,'Liquidos. Comerciales');

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `cod_postal` varchar(10) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`,`id_pais`),
  KEY `fk_ciudad_pais1_idx` (`id_pais`),
  CONSTRAINT `fk_ciudad_pais1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`id_ciudad`,`descripcion`,`cod_postal`,`id_pais`) values (1,'Avellaneda','1872',1),(2,'Bahia Blanca','8000',1),(3,'Cafayate','4427',1),(4,'Corrientes','3400',1),(5,'Formosa','3600',1),(6,'La Plata','1900',1),(7,'La Rioja','5300',1),(8,'Mendoza','5500',1),(9,'Neuquén','8300',1),(10,'Posadas','3300',1),(11,'Rio Gallegos','9400',1),(12,'Rosario','2000',1),(13,'San Juan','5400',1),(14,'San Miguel de Tucuman','4000',1),(15,'San Salvador de Jujuy','4600',1),(16,'Santa Fe','3000',1),(17,'Santa Rosa','6300',1),(18,'Santiago del Estero','4200',1),(19,'Usuahia','9410',1),(20,'Viedma','8500',1);

/*Table structure for table `decision` */

DROP TABLE IF EXISTS `decision`;

CREATE TABLE `decision` (
  `id_decision` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_decision`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `decision` */

insert  into `decision`(`id_decision`,`descripcion`) values (1,'Ninguna'),(2,'Repetir IRT en otra muestra en Papel'),(3,'Realizar Test del Sudor'),(4,'Realizar estudios moleculares (DNA)'),(5,'Realizar Test del Sudor y estudios moleculares'),(6,'Repetir Gal en otra muestra en Papel'),(7,'Dosar G1PUT en la misma muestra en Papel'),(8,'Realizar pruebas confirmatorias'),(9,'Repetir Phe en otra muestra en Papel'),(10,'Repetir TSH en otra muestra en Papel'),(11,'Hacer pruebas confirmatorias en suero'),(12,'Repetir TSH en papel y confirmar en suero');

/*Table structure for table `encuesta` */

DROP TABLE IF EXISTS `encuesta`;

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `id_resultado` int(11) NOT NULL,
  PRIMARY KEY (`id_encuesta`,`id_resultado`),
  KEY `fk_encuesta_resultado1_idx` (`id_resultado`),
  CONSTRAINT `fk_encuesta_resultado1` FOREIGN KEY (`id_resultado`) REFERENCES `resultado` (`id_resultado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `encuesta` */

insert  into `encuesta`(`id_encuesta`,`fecha_inicio`,`fecha_cierre`,`id_resultado`) values (1,'2013-11-06','2013-11-07',10);

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date NOT NULL,
  `laboratorio_id_lab` int(11) NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `id_encuesta` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  PRIMARY KEY (`id_inscripcion`,`laboratorio_id_lab`,`id_encuesta`,`id_analito`),
  KEY `fk_inscripcion_laboratorio1_idx` (`laboratorio_id_lab`),
  KEY `fk_inscripcion_encuesta1_idx` (`id_encuesta`),
  KEY `fk_inscripcion_analito1_idx` (`id_analito`),
  CONSTRAINT `fk_inscripcion_analito1` FOREIGN KEY (`id_analito`) REFERENCES `analito` (`id_analito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_encuesta1` FOREIGN KEY (`id_encuesta`) REFERENCES `encuesta` (`id_encuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_laboratorio1` FOREIGN KEY (`laboratorio_id_lab`) REFERENCES `laboratorio` (`id_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `inscripcion` */

insert  into `inscripcion`(`id_inscripcion`,`fecha_ingreso`,`laboratorio_id_lab`,`fecha_baja`,`id_encuesta`,`id_analito`) values (1,'2013-11-18',3,'2013-11-18 00:00:00',1,1);

/*Table structure for table `interpretacion` */

DROP TABLE IF EXISTS `interpretacion`;

CREATE TABLE `interpretacion` (
  `id_interpretacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_interpretacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `interpretacion` */

insert  into `interpretacion`(`id_interpretacion`,`descripcion`) values (1,'Normal'),(2,'Elevado');

/*Table structure for table `laboratorio` */

DROP TABLE IF EXISTS `laboratorio`;

CREATE TABLE `laboratorio` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `cod_lab` varchar(15) NOT NULL,
  `institucion` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `domicilio_corresp` varchar(50) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `coord_x` varchar(50) DEFAULT NULL,
  `coord_y` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  PRIMARY KEY (`id_lab`,`id_tipo`,`id_ciudad`),
  KEY `fk_laboratorio_tipo_lab1_idx` (`id_tipo`),
  KEY `fk_laboratorio_ciudad1_idx` (`id_ciudad`),
  CONSTRAINT `fk_laboratorio_ciudad1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laboratorio_tipo_lab1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_lab` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `laboratorio` */

insert  into `laboratorio`(`id_lab`,`cod_lab`,`institucion`,`sector`,`responsable`,`domicilio`,`domicilio_corresp`,`mail`,`tel`,`coord_x`,`coord_y`,`estado`,`id_tipo`,`id_ciudad`) values (0,'FBA','FBA','FBA','FBA','FBA','FBA','','','','',1,1,1),(3,'584ad','Lab S.A','Bio','Edgard','45 647','45 647','','','-34','-50',1,6,14);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(5400) DEFAULT NULL,
  `perfil` varchar(5400) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`destino`,`perfil`) values (1,'barnavIndexAdmin.html','Administrador'),(2,'barnavIndexFBA.html','FBA, Administrador'),(3,'barnavIndexLaboratorio.html','Laboratorio, Administrador');

/*Table structure for table `metodo` */

DROP TABLE IF EXISTS `metodo`;

CREATE TABLE `metodo` (
  `id_metodo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `metodo` */

insert  into `metodo`(`id_metodo`,`descripcion`) values (1,'IRMA - RIA'),(2,'ELISA'),(3,'DELFIA'),(4,'AUTODELFIA'),(5,'LUMINEX'),(6,'Enzimatico Colorimetrico'),(7,'Enzimatico Fluorometrico'),(8,'Inhibicion Bacteriana (BIA)'),(9,'HPLC'),(10,'MS/MS'),(11,'Cromatografia en capa fina (TLC)'),(12,'Electrofresis Capilar'),(13,'FEIA'),(14,'MEIA'),(15,'CLIA (Quimioluminiscencia)'),(16,'ECLIA (Electroquimioluminiscencia)'),(17,'GSP');

/*Table structure for table `muestra` */

DROP TABLE IF EXISTS `muestra`;

CREATE TABLE `muestra` (
  `id_muestra` int(11) NOT NULL AUTO_INCREMENT,
  `resultado_control` int(11) NOT NULL,
  `id_interpretacion` int(11) NOT NULL,
  `id_decision` int(11) NOT NULL,
  `id_resultado` int(11) NOT NULL,
  PRIMARY KEY (`id_muestra`,`id_interpretacion`,`id_decision`,`id_resultado`),
  KEY `fk_muestra_interpretacion1_idx` (`id_interpretacion`),
  KEY `fk_muestra_decision1_idx` (`id_decision`),
  KEY `fk_muestra_resultado1_idx` (`id_resultado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `muestra` */

insert  into `muestra`(`id_muestra`,`resultado_control`,`id_interpretacion`,`id_decision`,`id_resultado`) values (21,54,2,6,10),(22,34,1,1,10);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `pais` */

insert  into `pais`(`id_pais`,`descripcion`) values (1,'Argentina'),(2,'Bolivia'),(3,'Chile'),(4,'Colombia'),(5,'Costa Rica'),(6,'Cuba'),(7,'Ecuador'),(8,'El Salvador'),(9,'Guatemala'),(10,'Honduras'),(11,'Mexico'),(12,'Nicaragua'),(13,'Panama'),(14,'Paraguay'),(15,'Peru'),(16,'Puerto Rico'),(17,'Republica Dominicana'),(18,'Uruguay'),(19,'Venezuela');

/*Table structure for table `papel_filtro` */

DROP TABLE IF EXISTS `papel_filtro`;

CREATE TABLE `papel_filtro` (
  `id_papel_filtro` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_papel_filtro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `papel_filtro` */

insert  into `papel_filtro`(`id_papel_filtro`,`descripcion`) values (1,'Whatman #903'),(2,'Macherey Nagel'),(3,'Ahistrom/PerkinElmer Grade 226'),(4,'Munktell Grade TFN');

/*Table structure for table `reactivo` */

DROP TABLE IF EXISTS `reactivo`;

CREATE TABLE `reactivo` (
  `id_reactivo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_reactivo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `reactivo` */

insert  into `reactivo`(`id_reactivo`,`descripcion`) values (1,'Preparacion propia'),(2,'MP'),(3,'BIORAD'),(4,'PERKIN ELMER'),(5,'CIS BIO'),(6,'BIOCLONE'),(7,'INTERCIENTIFICA'),(8,'ANILABSYSTEMS'),(9,'SUMA'),(10,'NEOGENESIS'),(11,'ASTORIA PACIFIC'),(12,'ZENTECH'),(13,'DIFCO'),(14,'SIGMA'),(15,'NEOMETRICS'),(16,'DIFCO-SIGMA'),(17,'CHROMSYSTEMS'),(18,'MBIOLOG DIAGNOSTICOS'),(19,'DPC'),(20,'ABBOTT'),(21,'PASTEUR'),(22,'ROCHE'),(23,'BAYER'),(24,'DIASORIN'),(25,'ACCUBIND');

/*Table structure for table `resultado` */

DROP TABLE IF EXISTS `resultado`;

CREATE TABLE `resultado` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) DEFAULT NULL,
  `fecha_recepcion` date DEFAULT NULL,
  `fecha_analisis` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `id_lab` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `id_reactivo` int(11) NOT NULL,
  `id_calibrador` int(11) NOT NULL,
  `id_analito` int(11) NOT NULL,
  `id_papel_filtro` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  PRIMARY KEY (`id_resultado`,`id_lab`,`id_metodo`,`id_reactivo`,`id_calibrador`,`id_analito`,`id_papel_filtro`,`id_valor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `resultado` */

insert  into `resultado`(`id_resultado`,`comentario`,`fecha_recepcion`,`fecha_analisis`,`fecha_ingreso`,`id_lab`,`id_metodo`,`id_reactivo`,`id_calibrador`,`id_analito`,`id_papel_filtro`,`id_valor`) values (10,'RESULTADO1','2013-11-18','2013-11-01','2013-11-19',3,3,6,4,1,3,4);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `rol` */

insert  into `rol`(`id_rol`,`descripcion`) values (1,'Administrador'),(2,'FBA'),(3,'Laboratorio'),(5,'Laboratorio_3');

/*Table structure for table `tipo_lab` */

DROP TABLE IF EXISTS `tipo_lab`;

CREATE TABLE `tipo_lab` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_lab` */

insert  into `tipo_lab`(`id_tipo`,`descripcion`) values (1,'Metrologico'),(2,'Clinico'),(3,'Patologico'),(4,'Infectologico'),(5,'Inmunologico'),(6,'Epidemiologico'),(7,'Microbiologico'),(8,'Hematologico'),(9,'Quimico'),(10,'Bio-Quimico'),(11,'Biologico');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_rol1_idx` (`id_usuario`),
  KEY `fk_usuario_rol1` (`id_rol`),
  CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`username`,`password`,`email`,`id_rol`,`activo`) values (1,'admin','admin',NULL,1,1),(5,'lab3','lab3','',5,1),(6,'fba','fba','',2,1);

/*Table structure for table `valor_corte` */

DROP TABLE IF EXISTS `valor_corte`;

CREATE TABLE `valor_corte` (
  `id_valor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_valor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `valor_corte` */

insert  into `valor_corte`(`id_valor`,`descripcion`) values (1,'35 mIU/L'),(2,'45 mg/dl'),(3,'54 U/g Hb'),(4,'56 ng/ml');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
