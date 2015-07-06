-- MySQL dump 10.13  Distrib 5.6.25, for Linux (x86_64)
--
-- Host: 192.168.1.26    Database: sihci
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema',
  `country` varchar(50) NOT NULL COMMENT 'pais de residencia actual',
  `zip_code` int(11) NOT NULL COMMENT 'codigo postal',
  `state` varchar(20) NOT NULL COMMENT 'estado',
  `delegation` varchar(30) NOT NULL COMMENT 'delegacion',
  `city` varchar(50) NOT NULL COMMENT 'ciudad',
  `town` varchar(30) NOT NULL COMMENT 'municipio',
  `colony` varchar(45) NOT NULL COMMENT 'colonia',
  `street` varchar(50) DEFAULT NULL COMMENT 'calle\n',
  `external_number` varchar(8) NOT NULL COMMENT 'numero exterior',
  `internal_number` varchar(8) DEFAULT NULL COMMENT 'numero interior',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'Mexico',45402,'Jalisco','Tonala','Tonala','guadalajara','Rancho la cruz','juarez','2314','NULL','2015-06-06 11:49:12'),(2,'Albania',45452,'Jalisco','Tlaquepaque','La soledad','guadalajara','Rancho la cruz','Limon','2314','NULL','2015-06-06 11:49:12'),(12,'Mexico',45019,'Jalisco','Zapopan','Zapopan','hola','Jardin Real','Jardin de las Azaleas','14','2','2015-06-09 17:55:26'),(13,'Mexico',44840,'Jalisco','Jalisco','Guadalajara','Guadalajara','de ahi','','12','','2015-06-15 15:10:04'),(17,'Andorra',333,'mexico','mexico','mexico','mexico','mexico','mexico','8838388','8888','2015-06-19 18:49:58'),(18,'Mexico',321323,'eeee','eeee','eeee','eeee','eeee','eeee','122','','2015-06-22 11:35:13'),(19,'México',32312,'Jalisco','Tonala','Guadalajara','Tonala','Primavera','Av. juarez','1650','','2015-06-22 12:20:36'),(20,'México',45410,'Jalisco','Tonala','Rancho la cruz','Tonala','Fracc','Prados','N','1640','2015-06-22 12:36:08'),(21,'Albania',32312,'Jalia1111','..md.smd.amd.masdd238423980923','ASMDJDDl94380420vxccccccccccccccllllllllllllllllll','fsdfsdf42323242234324234244234','233333333333333333333333333333333333333333333','322222222222222222222222222222222222222222233','312312','3123121','2015-06-22 14:20:02'),(22,'null',0,'null','null','null','null','null','null','null','null','2015-06-25 13:21:14'),(23,'null',0,'null','null','null','null','null','null','-1','-1','2015-07-02 12:28:15'),(24,'México',44400,'Jalisco','Coajimalpa','Guadalajara','Guadalajara','Monraz','Av. México ','4300','5','2015-07-02 16:12:58');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`addresses_BEFORE_INSERT` BEFORE INSERT ON `addresses` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `admin_specialty_areas`
--

DROP TABLE IF EXISTS `admin_specialty_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_specialty_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_specialty_areas` int(11) NOT NULL,
  `ext_subspecialty` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_specialty_areas` (`id_specialty_areas`),
  CONSTRAINT `admin_specialty_areas_ibfk_1` FOREIGN KEY (`id_specialty_areas`) REFERENCES `specialty_areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_specialty_areas`
--

LOCK TABLES `admin_specialty_areas` WRITE;
/*!40000 ALTER TABLE `admin_specialty_areas` DISABLE KEYS */;
INSERT INTO `admin_specialty_areas` VALUES (1,7,'Fracciones'),(2,7,'Sumas'),(3,7,'Restas'),(4,7,'Multiplicaciones');
/*!40000 ALTER TABLE `admin_specialty_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `art_guides_author`
--

DROP TABLE IF EXISTS `art_guides_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art_guides_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_art_guides` int(11) NOT NULL COMMENT 'fk de la tabla de articulos',
  `names` varchar(30) DEFAULT NULL,
  `last_name1` varchar(20) DEFAULT NULL,
  `last_name2` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL COMMENT 'posicion de autoria o coautoria',
  PRIMARY KEY (`id`),
  KEY `id_articulo_idx` (`id_art_guides`),
  CONSTRAINT `id_art_guides` FOREIGN KEY (`id_art_guides`) REFERENCES `articles_guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art_guides_author`
--

LOCK TABLES `art_guides_author` WRITE;
/*!40000 ALTER TABLE `art_guides_author` DISABLE KEYS */;
INSERT INTO `art_guides_author` VALUES (5,25,'rqwerew','rqwerwer','rweqrwer',41324234),(6,46,'wee','we','ew',1);
/*!40000 ALTER TABLE `art_guides_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_guides`
--

DROP TABLE IF EXISTS `articles_guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_resume` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `isbn` int(11) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `editorial` varchar(80) DEFAULT NULL COMMENT 'nombre de la editorial del libro',
  `edicion` int(11) DEFAULT NULL COMMENT 'edicion del libro',
  `publishing_year` int(11) DEFAULT NULL COMMENT 'a�o en el que se imprimio el libro, combo de a�os',
  `volumen` int(11) DEFAULT NULL COMMENT 'numero de volumen',
  `volumen_no` int(11) DEFAULT NULL COMMENT 'numero de volumen, cantidad',
  `start_page` int(11) NOT NULL COMMENT 'pagina donde inicia el articulo',
  `end_page` int(11) NOT NULL COMMENT 'pagina donde finaliza el articulo',
  `article_type` varchar(20) NOT NULL COMMENT 'tipo de traductor en caso de que exista, radius(traductor, co-traductor)',
  `copies_issued` int(11) DEFAULT NULL COMMENT 'cantidad de ejemplares que se imprimieron',
  `magazine` varchar(50) NOT NULL COMMENT 'nombre de la revista',
  `area` varchar(60) DEFAULT NULL,
  `discipline` varchar(70) DEFAULT NULL,
  `subdiscipline` varchar(100) DEFAULT NULL,
  `url_document` varchar(100) NOT NULL COMMENT 'url de donde se guardara el documento probatorio',
  `keywords` varchar(250) NOT NULL COMMENT 'tags de busqueda',
  `type` varchar(15) DEFAULT NULL COMMENT 'radioboton(articulo,guia)',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_resume`),
  CONSTRAINT `id_curriculum_articles` FOREIGN KEY (`id_resume`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_guides`
--

LOCK TABLES `articles_guides` WRITE;
/*!40000 ALTER TABLE `articles_guides` DISABLE KEYS */;
INSERT INTO `articles_guides` VALUES (22,2,2147483647,'Titulo de algun articulo','Thompson',5,1947,1,5,20,25,'Cientifico',80,'Revista de cientificos','MATEMATICAS','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','/users/2/ArticlesAndGuides/file2147483647.png','matematicas, libros, bool','Duda con tipo','2015-06-19 19:18:13'),(23,1,1234567890,'Manual de practicas para quimica II','Cervantes',2,2015,1,21,82,100,'2131',12,'wee','ASTRONOMIA Y ASTROFISICA','ANALISIS NUMERICO INVESTIGACION OPERATIVA','RESONANCIA PARAMAGNETICA ELECTRONICA','/users/1/ArticlesAndGuides/file28282.png','xs','sxsxs','2015-06-22 14:21:34'),(25,1,31212,'fsdfsd','341234',4134234,1932,41234,41234,42314,55555,'123423',341234,'4123432','MATEMATICAS','LOGICA GENERAL','LOGICA FORMAL','/users/1/ArticlesAndGuides/file31212.png','41234324','412341234','2015-06-23 16:02:36'),(26,9,4145,'rwerw','terer',NULL,1934,425,435354,54353,345534343,'ertt',43,'455543ert','CIENCIAS POLITICAS','LOGICA DEDUCTIVA','LENGUAJES FORMALIZADOS','/users/14/ArticlesAndGuides/file4145.png','5543re','erterte','2015-06-24 11:11:47'),(27,1,NULL,'estrategias de LOL','',NULL,2014,NULL,NULL,21,43,'articulo',NULL,'Atomix','ASTRONOMIA Y ASTROFISICA','LOGICA GENERAL','ALGEBRA DE BOOLE','','eee','Entretenimiento','2015-06-25 11:28:46'),(28,1,1111,'estrategias de Smite','',NULL,2015,1,1,89,90,'Articulo',NULL,'Atomix','FISICA','LOGICA INDUCTIVA METODOLOGIA\r\n			         ','LOGICA FORMAL','','estrategias, smite , no se , jajaja','Entretenimiento','2015-06-25 11:50:34'),(29,1,NULL,'eeee','u',NULL,1940,NULL,NULL,989,8978,'u',NULL,'u','QUIMICA','UNIDADES Y CONSTANTES FISICAS','ULTRASONIDOS','','u','u','2015-06-25 12:06:16'),(30,1,90,'99','009',9,1938,90,90,90,99,'09',9,'090','CIENCIAS DE LA VIDA','OTRAS ESPECIALIDADES EN MATERIA DE LOGICA','GENERALIZACION','','09','09','2015-06-25 12:30:20'),(32,2,NULL,'222','',NULL,1931,NULL,NULL,21,22,'222',NULL,'222','ASTRONOMIA Y ASTROFISICA','LOGICA GENERAL','FUNDAMENTOS DE LAS MATEMATICAS','/users/2/ArticlesAndGuides/file.pdf','222','','2015-06-25 12:57:57'),(34,2,87,'111','111',111,1931,111,111,111,111,'1111',111,'111','MATEMATICAS','LOGICA DEDUCTIVA','LOGICA FORMAL','/users/2/ArticlesAndGuides/file87.pdf','111','111','2015-06-25 13:13:35'),(43,2,NULL,'No lo se','Televisa',1,1932,1,12,21,24,'Articulo',2,'2Q','MATEMATICAS','APLICACIONES DE LA LOGICA','ANALOGIA','/users/2/ArticlesAndGuides/file.pdf','33','Cientifico ','2015-07-02 10:44:35'),(44,2,NULL,'o','i',21,2000,NULL,NULL,23,232,'i',NULL,'i','ASTRONOMIA Y ASTROFISICA','LOGICA GENERAL','SISTEMAS FORMALES','/users/2/ArticlesAndGuides/file.pdf','31232','i','2015-07-02 10:49:15'),(45,2,NULL,'JOna','Televisa',1,1961,21,21,21,21,'Articulo',21,'NEO','LOGICA','APLICACIONES DE LA LOGICA','ANALOGIA','/users/2/ArticlesAndGuides/file.pdf','1','Cientifico ','2015-07-02 10:53:23'),(46,2,11112,'2212','21212',21212,2000,2121,212,212,224,'Articulo',21,'2121','MATEMATICAS','LOGICA GENERAL','LOGICA FORMAL','/users/2/ArticlesAndGuides/file11112.pdf','Ricardo','121212','2015-07-02 12:47:55');
/*!40000 ALTER TABLE `articles_guides` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.8`*/ /*!50003 TRIGGER `sihci`.`articles_guides_BEFORE_INSERT` BEFORE INSERT ON `articles_guides` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `isbn` int(11) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `publisher` varchar(80) NOT NULL COMMENT 'nombre de la editorial del libro',
  `edition` int(11) DEFAULT NULL COMMENT 'edicion del libro',
  `release_date` int(11) NOT NULL COMMENT 'a�o en el que se imprimio el libro, combo de a�os',
  `volume` int(11) DEFAULT NULL COMMENT 'numero de volumen',
  `pages` int(11) NOT NULL COMMENT 'cantidad de paginas del libro',
  `copies_issued` int(11) DEFAULT NULL COMMENT 'cantidad de ejemplares que se imprimieron',
  `work_type` varchar(30) DEFAULT NULL,
  `idioma` varchar(15) DEFAULT NULL COMMENT 'combo de todos los idiomas',
  `traductor_type` varchar(20) DEFAULT NULL COMMENT 'tipo de traductor en caso de que exista, radius(traductor, co-traductor)',
  `traductor` varchar(80) DEFAULT NULL COMMENT 'nombre completo del traductor',
  `area` varchar(40) NOT NULL COMMENT 'combo box (LOGICA, MATEMATICAS, ASTRONOMIA Y ASTROFISICA, FISICA, QUIMICA, CIENCIAS DE LA VIDA, CIENCIAS DE LA TIERRA Y DEL COSMOS, CIENCIAS DE LA SALUD, CIENCIAS AGRONOMICAS Y VETERINARIAS, MEDICINA Y PATOLOGIA HUMANA, CIENCIAS DE LA TECNOLOGIA, ANTROPOLOGIA, DEMOGRAFIA, CIENCIAS ECONOMICAS, GEOGRAFIA, HISTORIA, CIENCIAS JURIDICAS Y DERECHO, LING�ISTICA, PEDAGOGIA, CIENCIAS POLITICAS, PSICOLOGIA, ARTES Y LETRAS, SOCIOLOGIA, CIENCIAS DE LA OCUPACION, ETICA, FILOSOFIA, PROSPECTIVA)',
  `discipline` varchar(60) NOT NULL COMMENT 'combobox() acorde al area\n',
  `subdiscipline` varchar(45) DEFAULT NULL COMMENT 'combobox() de acuerdo a la disciplina',
  `path` varchar(100) NOT NULL,
  `keywords` varchar(250) NOT NULL COMMENT 'tags de busqueda',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_books` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,2,123124,'sadsdsad','sadsadsads',2,32,32,2,232,'sdadsadsa','wqewqewqewq','wewewq','sdadsa','sadadsadsa','asdasdsa','asdsadsa','sadsadsa','asdasdsadsa','2015-06-23 11:07:25'),(2,2,123124,'sadsdsad','sadsadsads',2,32,32,2,232,'sdadsadsa','wqewqewqewq','wewewq','sdadsa','sadadsadsa','asdasdsa','asdsadsa','sadsadsa','asdasdsadsa','2015-06-23 11:07:53'),(3,2,123124,'sadsdsad','sadsadsads',2,32,32,2,232,'sdadsadsa','wqewqewqewq','wewewq','sdadsa','sadadsadsa','asdasdsa','asdsadsa','sadsadsa','asdasdsadsa','2014-05-04 00:00:00'),(4,1,123,'Que esta pensando el Jona 2','Relix',13,2015,1,213,12,'Publicado','Albanés','Traductor','Ricardo Tapia','LOGICA','APLICACIONES DE LA LOGICA','ANALOGIA','XD.html','jona ','2015-06-24 11:48:45'),(5,2,9876,'p','p',NULL,1932,NULL,212,NULL,'','','','','ASTRONOMIA Y ASTROFISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','/users/2/Userbooks/file21.pdf','212','2015-06-25 13:29:13'),(6,10,2232,'Edicion','Edicion',1212,1934,2,2,2,'Autorizado','Alemán','Traductor','','LOGICA','LOGICA DEDUCTIVA','LENGUAJES FORMALIZADOS','/users/15/Userbooks/file2232.pdf','Edicion','2015-06-25 15:05:20'),(8,2,878676,'LOOO','eee',2147483647,2015,111,8009809,98789789,'Traducido','Checo','','','FISICA','OTRAS ESPECIALIDADES EN MATERIA DE LOGICA','TEORIA DE LOS MODELOS','/users/2/Userbooks/file878676.pdf','poipsdoipfidp','2015-06-25 18:53:06'),(9,2,80980,'Que esta pensando jona ','Jonix',1,2015,999999,666,23,'Publicado','Español','','','ASTRONOMIA Y ASTROFISICA','ESPACIOS Y MATERIA INTERPLANETARIOS ASTRONOMIA OPTICA','TEORIA DE LOS MODELOS','/users/2/Userbooks/file80980.pdf','ppppppp','2015-07-01 14:39:50'),(10,2,8788787,'pensamientos Jona 1 ','Jonix',1,2001,1,1,1,'Autorizado','Amharico','Traductor','Ricardo','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','/users/2/Userbooks/file8788787.pdf','dasdas','2015-07-02 12:33:24');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.8`*/ /*!50003 TRIGGER `sihci`.`books_BEFORE_INSERT` BEFORE INSERT ON `books` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_book` int(11) NOT NULL,
  `names` varchar(30) DEFAULT NULL,
  `last_name1` varchar(20) DEFAULT NULL,
  `last_name2` varchar(20) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_libro_idx` (`id_book`),
  CONSTRAINT `id_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_authors`
--

LOCK TABLES `books_authors` WRITE;
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` VALUES (1,4,'Ricardo','Tapia','Cervantes','1'),(2,10,'ricardo','Tapia','Cervantes','1');
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_chapters`
--

DROP TABLE IF EXISTS `books_chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `chapter_title` varchar(100) NOT NULL,
  `book_title` varchar(45) NOT NULL,
  `publishing_year` int(11) DEFAULT NULL,
  `publishers` varchar(255) DEFAULT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `citations` int(11) DEFAULT NULL,
  `total_of_authors` int(11) DEFAULT NULL,
  `area` varchar(60) DEFAULT NULL,
  `discipline` varchar(70) DEFAULT NULL,
  `subdiscipline` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `url_doc` varchar(100) DEFAULT NULL,
  `isbn` int(11) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_chapters` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_chapters`
--

LOCK TABLES `books_chapters` WRITE;
/*!40000 ALTER TABLE `books_chapters` DISABLE KEYS */;
INSERT INTO `books_chapters` VALUES (2,2,'Arreglos Bidimensionales','Cave of Programming',2015,'Los campamochos','Alfa omega',1,1,1,NULL,'ARTES Y LETRAS','TEORIA, ANALISIS Y CRITICA DE LAS BELLAS ARTES','TEATRO','2015-07-01 13:31:23','/users/2/Books_Chapters/Capitulo_libro01-07-2015_13-31-24.jpg',213321,'Artes, la bella vida, jeje'),(3,2,'EL zorro ','EL masapan de doña luz',2015,'213','21321',1,1,1,NULL,'FILOSOFIA','FILOSOFIA DE LOS CONOCIMIENTOS','EPISTEMOLOGIA','2014-06-04 00:00:00','/users/2/Books_Chapters/Capitulo_libro01-07-2015_13-33-07.jpg',4324324,'weqwewq'),(5,2,'eeeeeee','Matematicas',2013,'Santollan ','Santillan',12,12,12,NULL,'CIENCIAS DE LA VIDA','BIOLOGIA CELULAR','CULTIVO CELULAR','2015-07-01 16:25:43','/users/2/Books_Chapters/Capitulo_libro01-07-2015_16-25-43.pdf',NULL,'qwqw'),(6,2,'1.1 Fracciones ','Matematicas para 3 año de primaria ',2006,'www','www',1,214,34,NULL,'ASTRONOMIA Y ASTROFISICA','COSMOLOGIA Y COSMOGONIA','RAYOS COSMICOS','2015-07-02 14:17:29','SoftwareController.php',90004,'matematicas , primarias '),(7,2,'Suma','Matematicas 6 año ',2013,'lOLOL','Santollan',1,293,22,NULL,'ANTROPOLOGIA','ANTROPOLOGIA SOCIAL','JEFATURA','2015-07-02 14:27:54','/users/2/Books_Chapters/Capitulo_libro02-07-2015_14-31-23.pdf',212,'POP');
/*!40000 ALTER TABLE `books_chapters` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`books_chapters_BEFORE_INSERT` BEFORE INSERT ON `books_chapters` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `books_chapters_authors`
--

DROP TABLE IF EXISTS `books_chapters_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_chapters_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_books_chapters` int(11) NOT NULL COMMENT 'fk de la tabla de articulos',
  `names` varchar(30) DEFAULT NULL,
  `last_name1` varchar(20) DEFAULT NULL,
  `last_name2` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL COMMENT 'posicion de autoria o coautoria',
  PRIMARY KEY (`id`),
  KEY `id_chapters_authors_idx` (`id_books_chapters`),
  CONSTRAINT `id_chapters_authors` FOREIGN KEY (`id_books_chapters`) REFERENCES `books_chapters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_chapters_authors`
--

LOCK TABLES `books_chapters_authors` WRITE;
/*!40000 ALTER TABLE `books_chapters_authors` DISABLE KEYS */;
INSERT INTO `books_chapters_authors` VALUES (1,2,'jonathan','Covarrubias ','Saldaña',1),(2,3,'wewqe','wqeqe','qeqweq',23),(3,5,'ricardo','tapia','cervantes',1);
/*!40000 ALTER TABLE `books_chapters_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certifications`
--

DROP TABLE IF EXISTS `certifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `folio` varchar(30) DEFAULT NULL,
  `reference` varchar(30) DEFAULT NULL,
  `reference_type` varchar(15) DEFAULT NULL COMMENT 'combobox(credencial, foja, libro,otra)',
  `specialty` varchar(45) DEFAULT NULL COMMENT 'combobox(Alergia e inmunología clínica  ,  Alergia e inmunología clínica pediátrica  ,  Anatomía patológica  , Anestesiología  , Anestesiología pediátrica  , Angiología y cirugía vascular  , Biología de la reproducción humana  , Cardiología  , Cardiología pediátrica  , Cirugía cardiotorácica  , Cirugía cardiotorácica pediátrica  , Cirugía general  , Cirugía oncológica (adultos)  , Cirugía pediátrica  , Cirugía plástica y reconstructiva  , Coloproctología  ,  Comunicación, audiología y foniatría  ,  Dermatología  ,   Dermatología pediátrica  ,  Dermatopatología  ,  Endocrinología ,  Endocrinología pediátrica  ,   Epidemiología ,  Gastroenterología  ,   Gastroenterología y nutrición pediátrica ,   Genética médica  ,   Geriatría  ,  Ginecología oncológica  ,  Ginecología y obstetricia  ,  Hematología  ,   Hematología pediátrica  ,   Infectología ,   Medicina de la actividad física y deportiva ,   Medicina de rehabilitación  ,   Medicina de urgencias  ,   M',
  `validity_date_start` date NOT NULL COMMENT 'fecha de inicio de vigencia',
  `validity_date_end` date DEFAULT NULL COMMENT 'fecha terminacion de vigencia',
  `type` varchar(45) DEFAULT NULL COMMENT 'combobox(certificacion, recertificacion)',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_certif` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certifications`
--

LOCK TABLES `certifications` WRITE;
/*!40000 ALTER TABLE `certifications` DISABLE KEYS */;
INSERT INTO `certifications` VALUES (9,10,'222','si sepo','','','2015-06-01','2015-06-18','','2015-06-22 14:26:01'),(10,11,'sadasd','asdasdsadsa','credencial','Alergia e inmunología clínica','2015-06-30','2015-06-30','certificación','2015-06-22 15:03:50'),(11,11,'243432','3242343','credencial','audiología y foniatría','2015-06-30','2015-06-30','certificación','2015-06-22 15:14:03'),(13,2,'12345','Documento','credencial','Cirugía cardiotorácica pediátrica','2015-06-30','2015-06-30','certificación','2015-06-23 15:07:16'),(14,2,'6789','sadsad','foja','Alergia e inmunología clínica pediátrica','2015-06-30','2015-06-30','certificación','2015-06-23 15:08:12');
/*!40000 ALTER TABLE `certifications` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`certifications_BEFORE_INSERT` BEFORE INSERT ON `certifications` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `comittee`
--

DROP TABLE IF EXISTS `comittee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comittee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `hospital_unit` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comittee`
--

LOCK TABLES `comittee` WRITE;
/*!40000 ALTER TABLE `comittee` DISABLE KEYS */;
/*!40000 ALTER TABLE `comittee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comittee_users`
--

DROP TABLE IF EXISTS `comittee_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comittee_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comittee` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cu_user_idx` (`id_user`),
  KEY `id_cu_comittee_idx` (`id_comittee`),
  CONSTRAINT `id_cu_comittee` FOREIGN KEY (`id_comittee`) REFERENCES `comittee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_cu_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comittee_users`
--

LOCK TABLES `comittee_users` WRITE;
/*!40000 ALTER TABLE `comittee_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `comittee_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `congresses`
--

DROP TABLE IF EXISTS `congresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `work_title` varchar(200) NOT NULL COMMENT 'titulo del trabajo realizado',
  `year` int(11) DEFAULT NULL COMMENT 'año de participacion',
  `congress` varchar(200) NOT NULL COMMENT 'nombre del congreso',
  `type` varchar(15) DEFAULT NULL COMMENT 'radio boton(naciona, internacional)',
  `country` varchar(50) NOT NULL COMMENT 'id de la tabla paises para identificarlo',
  `work_type` varchar(25) DEFAULT NULL COMMENT 'combobox(Conferencia Magistral, Articulo in Extenso, Ponencia, Poster)',
  `keywords` varchar(250) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_congresos` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congresses`
--

LOCK TABLES `congresses` WRITE;
/*!40000 ALTER TABLE `congresses` DISABLE KEYS */;
INSERT INTO `congresses` VALUES (77,11,'dsfdfds',1949,'dsfdsfds','Internacional','Luxembourg','Articulo in Extenso','dsfdsfds','2015-06-23 14:03:46'),(78,11,'El jefe',1948,'Albino','Internacional','México','Articulo in Extenso','sadfsad','2015-06-23 14:06:48'),(79,10,'esesss',1930,'no','Internacional','México','Conferencia Magistral','sdas','2015-06-25 15:09:34');
/*!40000 ALTER TABLE `congresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`congresses_BEFORE_INSERT` BEFORE INSERT ON `congresses` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `congresses_authors`
--

DROP TABLE IF EXISTS `congresses_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congresses_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_congresses` int(11) NOT NULL COMMENT 'fk de la tabla congresos',
  `names` varchar(30) DEFAULT NULL,
  `last_name1` varchar(20) DEFAULT NULL,
  `last_name2` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL COMMENT 'posicion de autoria o coautoria',
  PRIMARY KEY (`id`),
  KEY `id_congreso_idx` (`id_congresses`),
  CONSTRAINT `id_congresses` FOREIGN KEY (`id_congresses`) REFERENCES `congresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congresses_authors`
--

LOCK TABLES `congresses_authors` WRITE;
/*!40000 ALTER TABLE `congresses_authors` DISABLE KEYS */;
INSERT INTO `congresses_authors` VALUES (43,77,'dsfdsfsd','sdfsdf','sdfdsf',2),(44,78,'asdasds','asdsad','asdsad',1),(45,79,'sepa','la','bola',23);
/*!40000 ALTER TABLE `congresses_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copyrights`
--

DROP TABLE IF EXISTS `copyrights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `copyrights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `participation_type` varchar(20) NOT NULL COMMENT 'combobox(autor,coautor)',
  `title` varchar(150) NOT NULL,
  `application_date` date DEFAULT NULL,
  `step_number` int(11) NOT NULL COMMENT 'numero de tramite',
  `resume` text,
  `beneficiary` varchar(70) DEFAULT NULL,
  `entity` varchar(20) DEFAULT NULL COMMENT 'combobox(publica,privada, sector social)',
  `impact_value` text COMMENT 'Generacion de valor e impacto para el beneficiario',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_copyright` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copyrights`
--

LOCK TABLES `copyrights` WRITE;
/*!40000 ALTER TABLE `copyrights` DISABLE KEYS */;
INSERT INTO `copyrights` VALUES (9,2,'Autor','EL congreso','2015-06-30',123456,'EL resumen de mi congreso','Juan','Pública','no mms','2014-05-06 00:00:00'),(11,2,'Autor','El porfirio','2015-06-30',1234,'dsfdsafasfasfsaadfafadfasd','Ricardo','','sdfdadfadsfasdsassas','2014-05-06 00:00:00'),(12,2,'Autor','Ajalas','2015-06-30',342232432,'DSFDSFLKDSKFJJDASKFJDSKJFKJDSFLKDSFJJ','Julian','Pública','sdkjdhfjkldhsfjkdshfjhdakjsfbabffhjdsgfjhsdgfjdshgfjhasdgfbdsfhksgdfhjghjfdsgjhdsgsdhjgdhjdgsjhsdgfhdjsgdshjagskjgkakahkahhkhakakjffjajddddddfdkajhgds','2014-05-06 00:00:00'),(13,2,'Coautor','EL saúl','2015-06-30',2324234,'sdfdgfdgdsfgfsdg','Saúl','Privada','dfsggsdgdsgfgggfgdgsfsgfd','2014-05-06 00:00:00'),(14,2,'Coautor','Jalisco','2015-06-30',21324,'dfdsfsdfadasfdkajfdshafh','Ismael','Pública','kjsdgfjdgfjhsdgfhjdfg','2014-05-06 00:00:00'),(15,1,'Coautor','asjaksj','2015-06-10',34,'qweqeqew','wewewe','','ew','2014-05-06 00:00:00'),(16,11,'Autor','Algun dia se me ocurrira','2015-06-30',123132,'asdasdsadsafdsf','sadsadsadsad','Privada','asdsadasdsadsadsa','2015-06-06 00:00:00'),(17,10,'Autor','derecho','2015-06-23',121212,'dasda','dsa','Pública','das','2015-06-06 00:00:00'),(19,9,'Coautor','jdskjbk','2015-06-10',543567,'gsfdndfhmn,hn.m,n.,hmdsn.,dns,ndfhm.,nskjgfbk.gfdssgd','ldnsfgnjhnkjhdj.','Privada','lernngsjlnsrjnñjdfnh,mnm,h.,nh,fmhn,mdf,njerhhegjsfdgjkhsgdjhsgjhfdgkjsdhgskjhdgsjfhgfjgskjhgskjhgjkshgf','2013-04-03 00:00:00');
/*!40000 ALTER TABLE `copyrights` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`copyrights_BEFORE_INSERT` BEFORE INSERT ON `copyrights` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL COMMENT 'fk de la tabla personas',
  `id_actual_address` int(11) NOT NULL COMMENT 'fk de la tabla domicilios donde se guardara la direccion actual de la persona',
  `native_country` varchar(50) NOT NULL COMMENT 'fk de la tabla domicilios donde se guardara la direccion origen de la persona',
  `native_language` varchar(45) DEFAULT NULL COMMENT 'lengua materna',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'El curriculum esta activo o inactivo\n',
  `SNI` int(11) DEFAULT NULL,
  `researcher_title` varchar(100) DEFAULT NULL COMMENT 'nombramiento del investigador solo si trabaja en el opd hcg',
  PRIMARY KEY (`id`),
  KEY `id_domicilioactual_idx` (`id_actual_address`),
  KEY `id_user_researcher_idx` (`id_user`),
  CONSTRAINT `id_address` FOREIGN KEY (`id_actual_address`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_user_researcher` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum`
--

LOCK TABLES `curriculum` WRITE;
/*!40000 ALTER TABLE `curriculum` DISABLE KEYS */;
INSERT INTO `curriculum` VALUES (1,1,1,'Jamaica','Español',0,0,'Ciencias de la Salud'),(2,2,2,'Mexico','Español',0,0,'Ciencias de computacionales'),(5,10,13,'Mexico','Español',1,0,'Ciencias de computacionales'),(9,14,12,'Mexico',NULL,1,0,NULL),(10,15,18,'Macau',NULL,1,1221,'Que buen nombramiento tengo'),(11,17,20,'México',NULL,1,-1,'A veces'),(12,25,23,'Mexicano',NULL,1,-1,NULL);
/*!40000 ALTER TABLE `curriculum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designated_committees`
--

DROP TABLE IF EXISTS `designated_committees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designated_committees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comittee` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project_designated_idx` (`id_project`),
  CONSTRAINT `id_project_designated` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designated_committees`
--

LOCK TABLES `designated_committees` WRITE;
/*!40000 ALTER TABLE `designated_committees` DISABLE KEYS */;
/*!40000 ALTER TABLE `designated_committees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directed_thesis`
--

DROP TABLE IF EXISTS `directed_thesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directed_thesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla escolaridades',
  `title` varchar(250) NOT NULL,
  `conclusion_date` date DEFAULT NULL,
  `author` varchar(45) NOT NULL,
  `path` varchar(100) DEFAULT NULL COMMENT 'ruta del documento',
  `grade` varchar(45) DEFAULT NULL COMMENT 'grado academico',
  `sector` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `second_level` varchar(100) DEFAULT NULL,
  `area` varchar(60) DEFAULT NULL,
  `discipline` varchar(70) DEFAULT NULL,
  `subdiscipline` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grades_thesis_idx` (`id_curriculum`),
  CONSTRAINT `id_cves_thesis` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directed_thesis`
--

LOCK TABLES `directed_thesis` WRITE;
/*!40000 ALTER TABLE `directed_thesis` DISABLE KEYS */;
INSERT INTO `directed_thesis` VALUES (17,10,'a','2015-06-01','aca',NULL,'','No especificado','UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA','','','','','2015-06-22 11:47:31'),(22,10,'yoouu','2015-06-25','joina',NULL,'Licenciatura','Instituciones del sector gobierno federal centralizado','UNIVERSIDAD AUTONOMA DE CAMPECHE','LABORATORIO NATURAL LAS JOYAS DE LA SIERRA','PEDAGOGIA','OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA','INDUCCION','2015-06-25 15:08:50'),(23,2,'El jona','2015-07-01','Jona ','Zip.php','Licenciatura','No especificado','BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA','CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS','ANTROPOLOGIA','ANTROPOLOGIA CULTURAL','DANZAS','2015-07-01 17:49:48'),(24,2,'qqq','2015-07-01','Ricardo','/users/2/DirectedThesis/Doc_aprobatorio01-07-2015_17-59-09.pdf','\r\n																Maestria','Instituciones del sector gobierno federal centralizado','UNIVERSIDAD ESTATAL DE SONORA','CENTRO UNIVERSITARIO DE CIENCIAS BIOLOGICAS Y AGROPECUARIAS','GEOGRAFIA','GEOGRAFIA ECONOMICA','DISTRIBUCION DE LOS RECURSOS NATURALES','2015-07-01 17:59:09');
/*!40000 ALTER TABLE `directed_thesis` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`directed_thesis_BEFORE_INSERT` BEFORE INSERT ON `directed_thesis` FOR EACH ROW  SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `docs_identity`
--

DROP TABLE IF EXISTS `docs_identity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docs_identity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `doc_id` varchar(50) DEFAULT NULL,
  `is_Primary` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_identity` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docs_identity`
--

LOCK TABLES `docs_identity` WRITE;
/*!40000 ALTER TABLE `docs_identity` DISABLE KEYS */;
INSERT INTO `docs_identity` VALUES (4,11,'Pasaporte','Pasaporte','/users/17/cve-hc/Pasaporte.pdf',NULL),(5,11,'CURP','CURP','/users/17/cve-hc/CURP.pdf',NULL),(6,11,'IFE','IFE','/users/17/cve-hc/IFE.docx',NULL),(8,10,'Acta','Acta','/users/15/cve-hc/Acta.jpg',NULL),(9,2,'Acta','Acta','/users/2/cve-hc/Acta.png',NULL);
/*!40000 ALTER TABLE `docs_identity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrementable por el sistema',
  `id_person` int(11) NOT NULL COMMENT 'fk de la tabla personas',
  `email` varchar(100) NOT NULL COMMENT 'correo electronico',
  `type` varchar(20) NOT NULL COMMENT 'tipo de correo electronico: trabajo, residencial, particular, campus, otro.',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_emails_idx` (`id_person`),
  CONSTRAINT `id_person_emails` FOREIGN KEY (`id_person`) REFERENCES `persons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (2,13,'11@hotmail.com','Residencial','2015-06-19 11:23:16'),(3,13,'12@hotmail.com','Residencial','2015-06-19 11:46:39'),(5,15,'mas_correos@hotmail.com','Trabajo','2015-06-22 12:51:56'),(6,15,'mas_correos@hotmail.com','Trabajo','2015-06-22 12:52:05'),(7,15,'mas_correos@hotmail.com','Trabajo','2015-06-22 12:52:51'),(11,14,'joel@puntomedio.net','Trabajo','2015-06-24 10:54:37');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`emails_BEFORE_INSERT` BEFORE INSERT ON `emails` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `files_manager`
--

DROP TABLE IF EXISTS `files_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable por el sistema',
  `section` varchar(100) NOT NULL COMMENT 'seccion en la que se mostrara el archivo',
  `file_name` varchar(50) NOT NULL COMMENT 'Nombre del archivo a subir(contcatenar con la url)',
  `path` varchar(100) NOT NULL COMMENT 'ruta absoluta de donde se localiza el archivo + nombre_archivo y extension del archivo\n',
  `start_date` datetime NOT NULL COMMENT 'fecha de inicio para que se muestre el archivo en la seccion',
  `end_date` datetime NOT NULL COMMENT 'fecha de caducidad para que se muestre el archivo en la seccion',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files_manager`
--

LOCK TABLES `files_manager` WRITE;
/*!40000 ALTER TABLE `files_manager` DISABLE KEYS */;
INSERT INTO `files_manager` VALUES (3,'Tramites y servicios','WEQEQWEQ','/Users/mayelgonzalez/Sites/SIHCi/sihci/files_manager/WEQEQWEQ.pdf','2015-06-18 16:05:23','2015-06-20 23:59:59','2015-06-24 16:05:23'),(5,'organigram','ismael','/Users/mayelgonzalez/Sites/SIHCi/sihciismael.pdf','2015-06-24 17:29:46','2015-06-25 23:59:59','2015-06-24 17:29:46'),(6,'organigram','porfis','/Users/mayelgonzalez/Sites/SIHCi/sihciporfis.pdf','2015-06-24 18:09:59','2015-06-25 23:59:59','2015-06-24 18:09:59'),(8,'informationGeneralDirection','ismeleeelelele','/Users/mayelgonzalez/Sites/SIHCi/sihciismeleeelelele.pdf','2015-06-17 18:23:32','2015-06-25 23:59:59','2015-06-24 18:23:32'),(9,'programsPNCP','Anatoía Patológica','/SIHCi/sihci/files_manager/JIMESanatomiapatologica.pdf','2015-06-29 17:54:58','2030-12-31 23:00:00','2015-06-29 17:54:58'),(10,'programsPNCP','Anestesiología','/SIHCi/sihci/files_manager/JIMESanestesiologia.pdf','2015-06-29 17:54:58','2030-12-31 23:00:00','2015-06-29 17:54:58'),(11,'programsPNCP','Cirugia General','/SIHCi/sihci/files_manager/JIMEScirugiageneral.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(12,'programsPNCP','Epidemiologia','/SIHCi/sihci/files_manager/JIMESepidemiologia.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(13,'programsPNCP','Genetica Médica','/SIHCi/sihci/files_manager/JIMESgeneticamedica.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(14,'programsPNCP','Ginecología y Obstetricia','/SIHCi/sihci/files_manager/JIMESginecoobstetricia.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(15,'programsPNCP','Medicina Interna','/SIHCi/sihci/files_manager/JIMESmedicinainterna.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(16,'programsPNCP','Pediatría Médica','/SIHCi/sihci/files_manager/JIMESpediatriamedica.pdf','2015-06-29 17:54:58','2030-12-31 23:59:59','2015-06-29 17:54:58'),(17,'programsPNCP','Radiología','/SIHCi/sihci/files_manager/JIMESradiologia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(18,'programsPNCP','Anatomía Patológica','/SIHCi/sihci/files_manager/FAAESanatomiapatologica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(19,'programsPNCP','Anestesiología','/SIHCi/sihci/files_manager/FAAESanestesiologia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(20,'programsPNCP','Cirugia General','/SIHCi/sihci/files_manager/FAAEScirugiageneral.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(21,'programsPNCP','Genética Médica','/SIHCi/sihci/files_manager/FAAESgeneticamedica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(22,'programsPNCP','Geriatría (PNPC)','/SIHCi/sihci/files_manager/FAAESgeriatria.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(23,'programsPNCP','Ginecología y Obstetricia','/SIHCi/sihci/files_manager/FAAESginecoobstetricia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(24,'programsPNCP','Médicina de Rehabilitación','/SIHCi/sihci/files_manager/FAAESmedicinarehab.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(25,'programsPNCP','Oftalmología.pdf','/SIHCi/sihci/files_manager/FAAESoftalmologia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(26,'programsPNCP','Ortopedia (PNPC)','/SIHCi/sihci/files_manager/FAAEStraumatologia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(27,'programsPNCP','Otorrinolaringología y Cirugía de Cabeza y Cuello ','/SIHCi/sihci/files_manager/FAAESotorrinocirugiacabeza.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(28,'programsPNCP','Patología Clínica','/SIHCi/sihci/files_manager/FAAESpatologiaclinica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(29,'programsPNCP','Pediatría Médica (PNPC)','/SIHCi/sihci/files_manager/FAAESpediatriamedica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(30,'programsPNCP','Psiquiatría','/SIHCi/sihci/files_manager/FAAESpsiquiatria.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(31,'programsPNCP','Radiología e Imagen','/SIHCi/sihci/files_manager/FAAESradiologia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(32,'programsPNCP','Urgencias Médico Quirúgicas','/SIHCi/sihci/files_manager/FAAESurgenciasmedicoquir.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(33,'programsPNCP','Cirugía Laparoscópia (PNPC)','/SIHCi/sihci/files_manager/JIMSUBlaparoscopia.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(34,'programsPNCP','Gastroenterología  y Nutrición Pediátrica','/SIHCi/sihci/files_manager/JIMSUBgastroenterologianutricionpediatrica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(35,'programsPNCP','Hemato-Oncología Pediátrica','/SIHCi/sihci/files_manager/JIMSUBhematologiaoncopediatrica.pdf','2015-06-29 17:54:59','2030-12-31 23:59:59','2015-06-29 17:54:59'),(36,'programsPNCP','Médicina Materno Fetal','/SIHCi/sihci/files_manager/JIMSUBmedicinamaternofetal.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(37,'programsPNCP','Neonatología','/SIHCi/sihci/files_manager/JIMSUBneonatologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(38,'programsPNCP','Neurocirugía','/SIHCi/sihci/files_manager/JIMSUBneurocirugia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(39,'programsPNCP','Reumatología (PNPC)','/SIHCi/sihci/files_manager/JIMSUBreumatologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(40,'programsPNCP','Alergia e Inmunología Clínica','/SIHCi/sihci/files_manager/FAASUBalergiainmuno.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(41,'programsPNCP','Anestesiología Pediátrica','/SIHCi/sihci/files_manager/FAASUBanestesiologiapediatrica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(42,'programsPNCP','Angiología y Cirugía Vascular','/SIHCi/sihci/files_manager/FAASUBangiologiacirugia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(43,'programsPNCP','Cardiología','/SIHCi/sihci/files_manager/FAASUBcardiologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(44,'programsPNCP','Cirugía Cardiotorácica','/SIHCi/sihci/files_manager/FAASUBcirugiacardiotoracica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(45,'programsPNCP','Cirugía Oncológica','/SIHCi/sihci/files_manager/FAASUBcirugiaoncologica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(46,'programsPNCP','Cirugía Pediátrica (PNPC)','/SIHCi/sihci/files_manager/FAASUBcirugiapediatrica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(47,'programsPNCP','Cirugía Plástica y reconstructiva','/SIHCi/sihci/files_manager/FAASUBcirugiaplastica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(48,'programsPNCP','Coloproctología (PNPC)','/SIHCi/sihci/files_manager/FAASUBcoloproctologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(49,'programsPNCP','Dermatología','/SIHCi/sihci/files_manager/FAASUBderma.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(50,'programsPNCP','Dermatología Pediátrica','/SIHCi/sihci/files_manager/FAASUBdermapediatrica.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(51,'programsPNCP','Endocrinología','/SIHCi/sihci/files_manager/FAASUBendocrinologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(52,'programsPNCP','Gastroenterología','/SIHCi/sihci/files_manager/FAASUBgastroenterologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(53,'programsPNCP','Hematología','/SIHCi/sihci/files_manager/FAASUBhematologia.pdf','2015-06-29 17:55:00','2030-12-31 23:59:59','2015-06-29 17:55:00'),(54,'programsPNCP','Hemodinamia y Cardiología Intervencionista','/SIHCi/sihci/files_manager/FAASUBhemodinamia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(55,'programsPNCP','Infectología','/SIHCi/sihci/files_manager/FAASUBinfectologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(56,'programsPNCP','Infectología Pediátria (PNPC)','/SIHCi/sihci/files_manager/FAASUBinfectopediatria.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(57,'programsPNCP','Médicina del Enfermo en estado critico (PNPC)','/SIHCi/sihci/files_manager/FAASUBmedicinaenfermoestadocritico.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(58,'programsPNCP','Nefrología (PNPC)','/SIHCi/sihci/files_manager/FAASUBnefrologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(59,'programsPNCP','Neonatología (PNPC)','/SIHCi/sihci/files_manager/FAASUBneonatologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(60,'programsPNCP','Neurocirugía','/SIHCi/sihci/files_manager/FAASUBneurocirugia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(61,'programsPNCP','Oncología médica','/SIHCi/sihci/files_manager/FAASUBoncologiamedica.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(62,'programsPNCP','Retina Médico Quirúrgica (PNPC)','/SIHCi/sihci/files_manager/FAASUBretinamedica.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(63,'programsPNCP','Reumatología (PNPC)','/SIHCi/sihci/files_manager/FAASUBreumatologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(64,'programsPNCP','Urología','/SIHCi/sihci/files_manager/FAASUBurologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(65,'programsPNCP','Urología Ginecológica (PNPC)','/SIHCi/sihci/files_manager/FAASUBurologiaginecologica.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(66,'programsNoPNCP','Anatoía Patológica','/SIHCi/sihci/files_manager/JIMESanatomiapatologica.pdf','2015-06-29 17:55:01','2030-12-31 23:00:00','2015-06-29 17:55:01'),(67,'programsNoPNCP','Anestesiología','/SIHCi/sihci/files_manager/JIMESanestesiologia.pdf','2015-06-29 17:55:01','2030-12-31 23:00:00','2015-06-29 17:55:01'),(68,'programsNoPNCP','Cirugia General','/SIHCi/sihci/files_manager/JIMEScirugiageneral.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(69,'programsNoPNCP','Epidemiologia','/SIHCi/sihci/files_manager/JIMESepidemiologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(70,'programsNoPNCP','Genetica Médica','/SIHCi/sihci/files_manager/JIMESgeneticamedica.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(71,'programsNoPNCP','Ginecología y Obstetricia','/SIHCi/sihci/files_manager/JIMESginecoobstetricia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(72,'programsNoPNCP','Medicina Interna','/SIHCi/sihci/files_manager/JIMESmedicinainterna.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(73,'programsNoPNCP','Pediatría Médica','/SIHCi/sihci/files_manager/JIMESpediatriamedica.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(74,'programsNoPNCP','Radiología','/SIHCi/sihci/files_manager/JIMESradiologia.pdf','2015-06-29 17:55:01','2030-12-31 23:59:59','2015-06-29 17:55:01'),(75,'programsNoPNCP','Anatomía Patológica','/SIHCi/sihci/files_manager/FAAESanatomiapatologica.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(76,'programsNoPNCP','Anestesiología','/SIHCi/sihci/files_manager/FAAESanestesiologia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(77,'programsNoPNCP','Cirugia General','/SIHCi/sihci/files_manager/FAAEScirugiageneral.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(78,'programsNoPNCP','Genética Médica','/SIHCi/sihci/files_manager/FAAESgeneticamedica.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(79,'programsNoPNCP','Geriatría (PNPC)','/SIHCi/sihci/files_manager/FAAESgeriatria.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(80,'programsNoPNCP','Ginecología y Obstetricia','/SIHCi/sihci/files_manager/FAAESginecoobstetricia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(81,'programsNoPNCP','Médicina de Rehabilitación','/SIHCi/sihci/files_manager/FAAESmedicinarehab.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(82,'programsNoPNCP','Oftalmología.pdf','/SIHCi/sihci/files_manager/FAAESoftalmologia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(83,'programsNoPNCP','Ortopedia (PNPC)','/SIHCi/sihci/files_manager/FAAEStraumatologia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(84,'programsNoPNCP','Otorrinolaringología y Cirugía de Cabeza y Cuello ','/SIHCi/sihci/files_manager/FAAESotorrinocirugiacabeza.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(85,'programsNoPNCP','Patología Clínica','/SIHCi/sihci/files_manager/FAAESpatologiaclinica.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(86,'programsNoPNCP','Pediatría Médica (PNPC)','/SIHCi/sihci/files_manager/FAAESpediatriamedica.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(87,'programsNoPNCP','Psiquiatría','/SIHCi/sihci/files_manager/FAAESpsiquiatria.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(88,'programsNoPNCP','Radiología e Imagen','/SIHCi/sihci/files_manager/FAAESradiologia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(89,'programsNoPNCP','Urgencias Médico Quirúgicas','/SIHCi/sihci/files_manager/FAAESurgenciasmedicoquir.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(90,'programsNoPNCP','Cirugía Laparoscópia (PNPC)','/SIHCi/sihci/files_manager/JIMSUBlaparoscopia.pdf','2015-06-29 17:55:02','2030-12-31 23:59:59','2015-06-29 17:55:02'),(91,'programsNoPNCP','Gastroenterología  y Nutrición Pediátrica','/SIHCi/sihci/files_manager/JIMSUBgastroenterologianutricionpediatrica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(92,'programsNoPNCP','Hemato-Oncología Pediátrica','/SIHCi/sihci/files_manager/JIMSUBhematologiaoncopediatrica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(93,'programsNoPNCP','Médicina Materno Fetal','/SIHCi/sihci/files_manager/JIMSUBmedicinamaternofetal.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(94,'programsNoPNCP','Neonatología','/SIHCi/sihci/files_manager/JIMSUBneonatologia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(95,'programsNoPNCP','Neurocirugía','/SIHCi/sihci/files_manager/JIMSUBneurocirugia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(96,'programsNoPNCP','Reumatología (PNPC)','/SIHCi/sihci/files_manager/JIMSUBreumatologia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(97,'programsNoPNCP','Alergia e Inmunología Clínica','/SIHCi/sihci/files_manager/FAASUBalergiainmuno.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(98,'programsNoPNCP','Anestesiología Pediátrica','/SIHCi/sihci/files_manager/FAASUBanestesiologiapediatrica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(99,'programsNoPNCP','Angiología y Cirugía Vascular','/SIHCi/sihci/files_manager/FAASUBangiologiacirugia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(100,'programsNoPNCP','Cardiología','/SIHCi/sihci/files_manager/FAASUBcardiologia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(101,'programsNoPNCP','Cirugía Cardiotorácica','/SIHCi/sihci/files_manager/FAASUBcirugiacardiotoracica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(102,'programsNoPNCP','Cirugía Oncológica','/SIHCi/sihci/files_manager/FAASUBcirugiaoncologica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(103,'programsNoPNCP','Cirugía Pediátrica (PNPC)','/SIHCi/sihci/files_manager/FAASUBcirugiapediatrica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(104,'programsNoPNCP','Cirugía Plástica y reconstructiva','/SIHCi/sihci/files_manager/FAASUBcirugiaplastica.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(105,'programsNoPNCP','Coloproctología (PNPC)','/SIHCi/sihci/files_manager/FAASUBcoloproctologia.pdf','2015-06-29 17:55:03','2030-12-31 23:59:59','2015-06-29 17:55:03'),(106,'programsNoPNCP','Dermatología','/SIHCi/sihci/files_manager/FAASUBderma.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(107,'programsNoPNCP','Dermatología Pediátrica','/SIHCi/sihci/files_manager/FAASUBdermapediatrica.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(108,'programsNoPNCP','Endocrinología','/SIHCi/sihci/files_manager/FAASUBendocrinologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(109,'programsNoPNCP','Gastroenterología','/SIHCi/sihci/files_manager/FAASUBgastroenterologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(110,'programsNoPNCP','Hematología','/SIHCi/sihci/files_manager/FAASUBhematologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(111,'programsNoPNCP','Hemodinamia y Cardiología Intervencionista','/SIHCi/sihci/files_manager/FAASUBhemodinamia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(112,'programsNoPNCP','Infectología','/SIHCi/sihci/files_manager/FAASUBinfectologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(113,'programsNoPNCP','Infectología Pediátria (PNPC)','/SIHCi/sihci/files_manager/FAASUBinfectopediatria.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(114,'programsNoPNCP','Médicina del Enfermo en estado critico (PNPC)','/SIHCi/sihci/files_manager/FAASUBmedicinaenfermoestadocritico.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(115,'programsNoPNCP','Nefrología (PNPC)','/SIHCi/sihci/files_manager/FAASUBnefrologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(116,'programsNoPNCP','Neonatología (PNPC)','/SIHCi/sihci/files_manager/FAASUBneonatologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(117,'programsNoPNCP','Neurocirugía','/SIHCi/sihci/files_manager/FAASUBneurocirugia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(118,'programsNoPNCP','Oncología médica','/SIHCi/sihci/files_manager/FAASUBoncologiamedica.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(119,'programsNoPNCP','Retina Médico Quirúrgica (PNPC)','/SIHCi/sihci/files_manager/FAASUBretinamedica.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(120,'programsNoPNCP','Reumatología (PNPC)','/SIHCi/sihci/files_manager/FAASUBreumatologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(121,'programsNoPNCP','Urología','/SIHCi/sihci/files_manager/FAASUBurologia.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(122,'programsNoPNCP','Urología Ginecológica (PNPC)','/SIHCi/sihci/files_manager/FAASUBurologiaginecologica.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(123,'scientificMagazines','Publicaciones2009-2013','/SIHCi/sihci/files_manager/Publicaciones20092013.pdf','2015-06-29 17:55:04','2017-12-31 23:59:59','2015-06-29 17:55:04'),(124,'scientificMagazines','Ver tomo No.1','/SIHCi/sihci/files_manager/VertomoNo1.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(125,'scientificMagazines','Ver tomo No.2','/SIHCi/sihci/files_manager/VertomoNo2.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(126,'scientificMagazines','Ver tomo No.3','/SIHCi/sihci/files_manager/VertomoNo3.pdf','2015-06-29 17:55:04','2030-12-31 23:59:59','2015-06-29 17:55:04'),(127,'scientificMagazines','Ver tomo No.4','/SIHCi/sihci/files_manager/VertomoNo4.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(128,'scientificMagazines','Ver tomo No.5','/SIHCi/sihci/files_manager/VertomoNo5.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(129,'scientificMagazines','Ver tomo No.6','/SIHCi/sihci/files_manager/VertomoNo6.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(130,'scientificMagazines','Ver tomo No.7','/SIHCi/sihci/files_manager/VertomoNo7.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(131,'scientificMagazines','Ver tomo No.8','/SIHCi/sihci/files_manager/VertomoNo8.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(132,'scientificMagazines','Ver tomo No.9','/SIHCi/sihci/files_manager/VertomoNo9.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(133,'scientificMagazines','Ver tomo No.10','/SIHCi/sihci/files_manager/VertomoNo10.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(134,'scientificMagazines','Ver tomo No.11','/SIHCi/sihci/files_manager/VertomoNo11.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(135,'proDIME','ProDIME','/SIHCi/sihci/files_manager/prodime.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(136,'registerReniecyt','RENIECYT','/SIHCi/sihci/files_manager/RENIECYT.pdf','2015-06-29 17:55:05','2030-12-31 23:59:59','2015-06-29 17:55:05'),(137,'hospitalUnitJimEthicsCommittee','CIJIM','/SIHCi/sihci/files_manager/CIJIM.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(138,'hospitalUnitJimEthicsCommittee','CEJIM','/SIHCi/sihci/files_manager/CEJIM.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(139,'hospitalUnitJimEthicsCommittee','CBJIM','/SIHCi/sihci/files_manager/CBJIM.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(140,'hospitalUnitJimEthicsCommittee','CEFAA','/SIHCi/sihci/files_manager/CEFAA.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(141,'hospitalUnitJimEthicsCommittee','CIFAA','/SIHCi/sihci/files_manager/CIFAA.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(142,'hospitalUnitJimEthicsCommittee','CBFAA','/SIHCi/sihci/files_manager/CBFAA.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(143,'vinculationWithUniversityInstitutesHospitals','Programas y apoyos internacionales–Diciembre 2014','/SIHCi/sihci/files_manager/ProgramasyapoyosinternacionalesDiciembre2014.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(144,'vinculationWithUniversityInstitutesHospitals','Convenios internacionales junio 2014','/SIHCi/sihci/files_manager/Conveniosinternacionalesjunio2014.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(145,'vinculationWithUniversityInstitutesHospitals','Requisitos para la elaboración de convenios','/SIHCi/sihci/files_manager/Requisitosparalaelaboraciondeconvenios.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(146,'vinculationWithUniversityInstitutesHospitals','Convenios vigentes agosto 2014','/SIHCi/sihci/files_manager/Conveniosvigentesagosto2014.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(147,'investigationNormative','Normatividad de investigación','/SIHCi/sihci/files_manager/Normatividaddeinvestigacion.pdf','2015-06-29 17:55:05','2030-12-21 23:59:59','2015-06-29 17:55:05'),(148,'finehc','FInEHC','/SIHCi/sihci/files_manager/FInEHC.pdf','2015-06-29 17:56:17','2030-12-21 23:59:59','2015-06-29 17:56:17');
/*!40000 ALTER TABLE `files_manager` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`files_manager_BEFORE_INSERT` BEFORE INSERT ON `files_manager` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `country` varchar(50) DEFAULT NULL COMMENT 'pais donde se adquirio el grado',
  `grade` varchar(45) NOT NULL COMMENT 'Grado de estudios (LICENCIATURA, MAESTRIA, DOCTORADO, POSDOCTORADO, ESPECIALIDAD, DIPLOMADO, BACHILLERATO, TECNICO SUPERIOR (PROFESIONAL ASOCIADO))',
  `writ_number` varchar(45) DEFAULT NULL COMMENT 'numero de la cedula profesional',
  `title` varchar(45) NOT NULL COMMENT 'titulo obtenido',
  `obtention_date` date NOT NULL COMMENT 'fecha en que se obtuvo la escolaridad',
  `status` varchar(25) DEFAULT NULL COMMENT 'estatus de la escolaridad(creditos terminados, grado obtenido, proceso, truncado)',
  `thesis_title` varchar(250) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL COMMENT 'sector de la escolaridad(No especificado, Instituciones del sector gobierno federal centralizado, Instituciones del sector entidades paraestatales, Instituciones del sector gobierno de las entidades federativas, Instituciones del sector de educacion superior publicas, Instituciones del sector de educacion superior privadas, Instituciones del sector privado de empresas productivas (adiat), Instituciones / organizaciones no lucrativas, Instituciones / organizaciones extranjeras, consultoras, Gobierno municipal, Gobierno federal descentralizado, Gobierno Federal Desconcentrado, Centros Públicos de Investigación\nCentros Privados de Investigación)',
  `institution` varchar(150) NOT NULL COMMENT 'combo checar conacyt.mx',
  `area` varchar(60) DEFAULT NULL,
  `discipline` varchar(70) DEFAULT NULL,
  `subdiscipline` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_grades_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_grades` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (4,11,'México','Maestria','213123','2131231','2015-06-22',NULL,'weqwewq','En proceso','sector','UNIVERSIDAD TECNOLOGICA DE TORREON','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','2015-06-22 12:55:28'),(5,11,'México','Maestria','213123','2131231','2015-06-22',NULL,'weqwewq','En proceso','sector','UNIVERSIDAD TECNOLOGICA DE TORREON','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','2015-06-22 12:55:37'),(6,11,'México','Maestria','213123','2131231','2015-06-22',NULL,'weqwewq','En proceso','sector','UNIVERSIDAD TECNOLOGICA DE TORREON','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','2015-06-22 12:55:53'),(7,11,'México','Maestria','213123','2131231','2015-06-22',NULL,'weqwewq','En proceso','sector','UNIVERSIDAD TECNOLOGICA DE TORREON','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','2015-06-22 12:59:38'),(8,11,'México','Maestria','213123','2131231','2015-06-22',NULL,'weqwewq','En proceso','sector','UNIVERSIDAD TECNOLOGICA DE TORREON','FISICA','LOGICA DEDUCTIVA','ALGEBRA DE BOOLE','2015-06-22 12:59:42'),(14,10,'Albania','Licenciatura','2131','asesa','2015-06-16','','ese mero','','','UNIVERSIDAD AUTONOMA DE CAMPECHE','1','APLICACIONES DE LA LOGICA','LOGICA FORMAL','2015-06-23 11:37:02'),(15,2,'Afghanistan','Licenciatura','412341234','asdfasdfasd','2015-06-03','Creditos Terminados','asdfasdfasdf','En proceso','Centros Privados de Investigación','UNIVERSIDAD AUTONOMA DE BAJA CALIFORNIA SUR','16','PLANETOLOGIA','OTROS','2015-06-30 11:15:33');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`grades_BEFORE_INSERT` BEFORE INSERT ON `grades` FOR EACH ROW  SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `area` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `start_day` int(11) DEFAULT NULL,
  `start_month` int(11) DEFAULT NULL,
  `start_year` int(11) NOT NULL,
  `hospital_unit` varchar(50) NOT NULL COMMENT 'solo si se elijio OPD en organizacion',
  `rud` varchar(50) DEFAULT NULL COMMENT 'solo si se elijio OPD en organizacion',
  `schedule` varchar(45) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_jobs` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (2,2,'OPD Hospital Civil de Guadalajara','odontología','Odontólogo',12,2,1946,'Hospital Civil Fray Antonio Alcalde','12312123','','2015-05-21 00:00:00'),(3,1,'OPD Hospital Civil de Guadalajara','Artritis','Doctor en Biomedica',5,8,1931,'Hospital Civil Dr. Juan I. Menchaca','12312312312321','','2015-05-21 00:00:00'),(8,5,'Hospital Civil Dr. Juan I. Menchaca','Salud','La vida en la sociedad',8,6,2015,'Hospital Civil Dr. Juan I. Menchaca','sdfdsfsd','sfdsdas','2015-05-21 00:00:00'),(13,9,'OPD Hospital Civil de Guadalajara','otra area','areas',12,13,2233,'Hospital Civil Fray Antonio Alcalde','sdasdas','sdadsa','2015-06-19 17:42:06'),(14,10,'hospital otro','nose','sii',2,3,1930,'NA','','3:00 - 5:00','2015-06-22 12:08:47'),(15,11,'OPD Hospital Civil de Guadalajara','Salud','Enfermero',10,4,2015,'Hospital Civil Dr. Juan I. Menchaca','212312321312312312','9:00 am a 2:00','2015-06-22 12:45:50');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`jobs_BEFORE_INSERT` BEFORE INSERT ON `jobs` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `knowledge_application`
--

DROP TABLE IF EXISTS `knowledge_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `knowledge_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `term1` text NOT NULL COMMENT 'pregunta 1',
  `term2` text NOT NULL COMMENT 'pregunta 2',
  `term3` text NOT NULL COMMENT 'pregunta 3',
  `term4` text NOT NULL COMMENT 'pregunta 4',
  `term5` text NOT NULL COMMENT 'pregunta 5',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ka_cve_idx` (`id_curriculum`),
  CONSTRAINT `id_ka_cve` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knowledge_application`
--

LOCK TABLES `knowledge_application` WRITE;
/*!40000 ALTER TABLE `knowledge_application` DISABLE KEYS */;
INSERT INTO `knowledge_application` VALUES (2,2,'Nada mayel','Nada mayel','Nada mayel','Nada mayel','Nada mayel','2015-06-11 19:28:54'),(6,2,'Prueba Pruebaxxxxx','xxxxxxPrueba 2 prueba 2','xxxxxxxxRespuesta 3','Rxxxxxxespuesta 444444444444444','asdfasdfasdfxxxx','2015-06-19 18:45:02'),(8,9,'nabskdkdbsam','sad.,fb,fmnbds,mug','ds.khjksjhdfslks','elkñtlhehlkjkltjgjhghj','ejñlkteuriehtkehjkrl','2015-06-23 11:24:17');
/*!40000 ALTER TABLE `knowledge_application` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`knowledge_application_BEFORE_INSERT` BEFORE INSERT ON `knowledge_application` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla personas',
  `language` varchar(45) NOT NULL COMMENT 'combobox de todos los idiomas',
  `description` varchar(250) DEFAULT NULL COMMENT 'Descripcion del idioma\n',
  `native_language` varchar(45) DEFAULT NULL COMMENT 'lengua materna',
  `is_traducer` tinyint(1) DEFAULT NULL COMMENT 'el usuario puede ser traductor?',
  `is_teacher` tinyint(1) DEFAULT NULL COMMENT 'el usuario puede ser profesor?',
  `conversational_level` varchar(45) DEFAULT NULL COMMENT 'combobox(alto,medio,bajo)',
  `reading_level` varchar(45) DEFAULT NULL COMMENT 'combobox(alto,medio,bajo)',
  `writting_level` varchar(45) DEFAULT NULL COMMENT 'combobox(alto,medio,bajo)',
  `evaluation_date` date DEFAULT NULL COMMENT 'fecha en que se evaluo su nivel',
  `document_percentage` int(11) NOT NULL COMMENT 'porcentaje que aparece en el documento a subir',
  `path` varchar(100) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personas_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_langs` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (35,1,'Alemán','fs','Escocés',0,0,'Alto','Alto','Alto','2015-06-09',121,'/users/1/UserLanguages/documentPercentage.pdf','2015-06-20 13:05:40'),(36,10,'Escocés','dasdsa','1',0,1,'Alto','Alto','Alto','2015-06-02',32,'/users/15/UserLanguages/documentPercentage36.pdf','2015-06-22 15:16:16'),(38,10,'Arabe','','0',0,0,'','','','2015-06-22',32,'/users/15/UserLanguages/documentPercentage38.pdf','2015-06-22 15:55:47'),(39,10,'Alemán','','',0,0,'','','','2015-06-01',21,'/users/15/UserLanguages/documentPercentage.pdf','2015-06-22 15:59:25'),(40,10,'Amharico','simon','1',1,1,'Medio','Medio','Medio','2015-06-17',32,'/users/15/UserLanguages/documentPercentage.pdf','2015-06-22 16:13:11'),(42,10,'Escocés','ese mero','0',1,0,'Alto','Medio','Alto','2015-06-23',32,'','2015-06-25 15:07:30'),(43,11,'Amharico','','0',0,0,'','','','2015-06-03',111,'/users/17/UserLanguages/documentPercentage.txt','2015-06-25 15:37:45'),(44,11,'Arabe','','0',0,0,'','','','2015-06-03',212,'','2015-06-25 15:38:25'),(45,2,'Eslovaco','examen de super tesis ','0',1,1,'Medio','Medio','Medio','2015-07-01',534,'/users/2/UserLanguages/documentPercentage45.pdf','2015-07-02 13:06:39'),(46,2,'Francés','Examen para optener puntaje minimo requerido para beca de francea','0',0,1,'Medio','Medio','Medio','2015-07-01',922,'','2015-07-02 13:11:07'),(47,2,'Catalan','NO LO SES ','0',1,1,'Alto','Alto','Alto','2015-07-01',333,'/users/2/UserLanguages/documentPercentage47.docx','2015-07-02 13:13:17');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`languages_BEFORE_INSERT` BEFORE INSERT ON `languages` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `patent`
--

DROP TABLE IF EXISTS `patent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `country` varchar(50) DEFAULT NULL COMMENT 'catalogo de paises',
  `participation_type` varchar(20) DEFAULT NULL COMMENT 'combobox(inventor, coinventor)',
  `name` varchar(150) NOT NULL,
  `state` varchar(50) DEFAULT NULL COMMENT 'combobox(en tramite, en explotacion comercial, registrada)',
  `application_type` varchar(20) NOT NULL COMMENT 'radioboton(No. Solicitud, No. Registro)',
  `application_number` int(11) NOT NULL COMMENT 'numero de registro o de solicitud',
  `patent_type` varchar(20) DEFAULT NULL COMMENT 'combobox(diseño industrial, modelo de utilidad, patente)',
  `consession_date` date DEFAULT NULL,
  `record` varchar(250) DEFAULT NULL,
  `presentation_date` date NOT NULL,
  `international_clasification` varchar(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `owner` varchar(70) DEFAULT NULL,
  `resumen` text,
  `industrial_exploitation` tinyint(1) DEFAULT NULL COMMENT 'checkbox',
  `resource_operator` varchar(70) DEFAULT NULL COMMENT 'quien explota el recurso',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_pat` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patent`
--

LOCK TABLES `patent` WRITE;
/*!40000 ALTER TABLE `patent` DISABLE KEYS */;
INSERT INTO `patent` VALUES (15,11,'México','Inventor',' alguna patente','En explotación comercial','No.Solicitud',2132132,'Diseño industrial','2015-06-30','sdasdadadsa','2015-06-30','dsadasda','asdasdas','dsdasd','asdasdsadasdasdasdasdasdsd',127,'asdsadsadsd','2010-10-12 00:00:00'),(16,11,'Albania','Inventor','el porfirio','En explotación comercial','No.Solicitud',8765567,'Modelo de utilidad','2015-06-30','sadsadsa','2015-06-30','sadsadsa','sadsadd','asdsadsa','sadsadsadwwq',127,'sdsadsadda','2014-05-03 00:00:00');
/*!40000 ALTER TABLE `patent` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`patent_BEFORE_INSERT` BEFORE INSERT ON `patent` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `permissions_roles`
--

DROP TABLE IF EXISTS `permissions_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable por el sistema',
  `id_role` int(11) NOT NULL,
  `section` varchar(60) DEFAULT NULL COMMENT 'nombre de la seccion a la que se le estan asignando permisos',
  `Create` tinyint(1) DEFAULT NULL COMMENT '1 autorizado, 0 denegado',
  `Review` tinyint(1) DEFAULT NULL COMMENT '1 autorizado, 0 denegado',
  `Update` tinyint(1) DEFAULT NULL COMMENT '1 autorizado, 0 denegado',
  `Writte` tinyint(1) DEFAULT NULL COMMENT '1 autorizado, 0 denegado',
  PRIMARY KEY (`id`),
  KEY `id_rol_idx` (`id_role`),
  CONSTRAINT `id_rol_permissions` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions_roles`
--

LOCK TABLES `permissions_roles` WRITE;
/*!40000 ALTER TABLE `permissions_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable por el sistema',
  `id_user` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `last_name1` varchar(20) NOT NULL,
  `last_name2` varchar(20) DEFAULT NULL,
  `marital_status` varchar(20) NOT NULL COMMENT 'edo. civil',
  `genre` varchar(10) NOT NULL COMMENT 'genero',
  `birth_date` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `state_of_birth` varchar(45) DEFAULT NULL,
  `curp_passport` varchar(20) NOT NULL COMMENT 'guarda rfc si es investigador, guarda rud si es alumno',
  `photo_url` varchar(100) DEFAULT NULL,
  `person_rfc` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_idx` (`id_user`),
  CONSTRAINT `id_usuario_persons` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,2,'Inv. jonathan','Covarrubias','Saldaña','divorciado','Hombre','1993-10-04','México','Jalisco','TACR931004HCJCNJ','/Users/Saul/Sites/sihci/sihci/users/2/cve-hc/perfil.png','TACR931004HCJ'),(3,4,'Ricardo Porfirio ','Tapia ','Cervantes ','soltero','Hombre','0000-00-00','Austria','Jalisco ','12221212121222',NULL,'RMKKD-F544-94'),(5,1,'Inv. investigador','Segura 3','Lopez','soltero','Hombre','2000-07-02','Antarctica','','GDHEYDJRUDJEUDJRUF','sponsors/1/cve-hc/perfil.png','3847584738473'),(9,10,'Inv. Alejandro','Cardenmas','Saldaña','Soltero','Masculino','1993-10-04','Mexico','Jalisco','ASDECD34343','C://users//Default//fotos','TACR931004HCJ'),(13,14,'Sergio Israel ','Mendoza','Gómez','soltero','Hombre','0000-00-00','Mexico','Jalisco','234646765557',NULL,'MEGS881219DG3'),(14,15,'joel','valdivia','ramirez','soltero','Hombre','1992-01-07','México','','123knfsaon12312oln','/Users/Dan/Sites/SIHCi/sihci/users/15/cve-hc/perfil.png','3213312313213'),(15,17,'Juan','Perez','Orozco','soltero','Hombre','1993-10-04','México','','32132jhkkhj','C:/xampp1/htdocs/SIHCi/sihci/users/17/cve-hc/perfil.png','1234567891112'),(16,18,'Ricardo ','tapia','Cervates','-1','-1','0000-00-00','Antarctica',NULL,'999999999989898989',NULL,NULL),(17,19,'Manuel ','Tapia','Cervantes','-1','-1','0000-00-00','Argentina',NULL,'212121212122212121',NULL,NULL),(18,20,'Porfirio','Tapia','Cervantes ','-1','-1','0000-00-00','Argentina',NULL,'123456789101112131',NULL,NULL),(20,22,'dasdasdsa','dasdasdas','dasdas','-1','-1','0000-00-00','Luxembourg',NULL,'dasdasdasdasdasdas',NULL,NULL),(21,23,'dasdasdsa','dasdasdas','dasdas','-1','-1','0000-00-00','Luxembourg',NULL,'dasdasdasdasdasewq',NULL,NULL),(22,24,'freeravens','frz','frz','-1','-1','0000-00-00','Angola',NULL,'7373u7777euehjjsjs','sponsors/24/cve-hc/perfil.png',NULL),(23,25,'Cesar Arturo','Chavez','Marquez','soltero','Hombre','2000-07-01','Mayotte','','samh45678912zxcvas',NULL,''),(24,26,'Alberto divuh','Flores','Crescencio','-1','-1','0000-00-00','Albania',NULL,'sadadasdasdasdadad',NULL,NULL),(25,27,'Alma Seuh ','Robles','Gomez','-1','-1','0000-00-00','Algeria',NULL,'e342dwqdqdsadsscsc',NULL,NULL),(26,28,'Mario cometi','Lopez','Solorio','-1','-1','0000-00-00','Algeria',NULL,'fffefwefwetwttwetw',NULL,NULL),(27,29,'Elizabeth combio','Sanchez','Arana','-1','-1','0000-00-00','American Samoa',NULL,'3243223rrrrr2rewre',NULL,NULL),(28,30,'Neri cominv','Juarez','Lafourcade','-1','-1','0000-00-00','Algeria',NULL,'weqdsadasdsad23d2d',NULL,NULL),(29,31,'Estela duh','Grajales','Arana','-1','-1','0000-00-00','Albania',NULL,'wq4e3wdqddasdsadsd',NULL,NULL),(30,32,'Ramon sgei','Rodriguez','Soto','-1','-1','0000-00-00','Albania',NULL,'weqweqeq2342432423',NULL,NULL),(31,33,'Victor dg','Almodovar','Perez','-1','-1','0000-00-00','Algeria',NULL,'wdqwdukuiuluiliulu',NULL,NULL),(32,34,'Pedro jiopd','Morales','Jimenez','-1','-1','0000-00-00','Argentina',NULL,'345345353463dfsdfs',NULL,NULL);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema',
  `id_person` int(11) NOT NULL COMMENT 'fk de la tabla personas',
  `type` varchar(20) NOT NULL COMMENT 'tipo de telefono(campus, domicilio,fax, movil, otros, trabajo, télex)',
  `country_code` int(11) NOT NULL COMMENT 'codigo de pais para llamadas internacionales',
  `local_area_code` int(11) NOT NULL COMMENT 'lada del pais',
  `phone_number` int(11) NOT NULL COMMENT 'numero telefonico',
  `extension` int(11) DEFAULT NULL COMMENT 'extension si esta disponible',
  `is_primary` tinyint(1) NOT NULL COMMENT '1 es principal, 0 no lo es',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_person_phones_idx` (`id_person`),
  CONSTRAINT `id_person_phones` FOREIGN KEY (`id_person`) REFERENCES `persons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` VALUES (2,15,'Trabajo',33,33,36839728,NULL,0,'2015-06-22 12:51:57'),(11,14,'Trabajo',55,555,2147483647,NULL,1,'2015-06-24 10:54:54'),(12,14,'Trabajo',22,222,2147483647,NULL,0,'2015-06-25 15:05:22'),(13,1,'Trabajo',52,33,1234567890,NULL,1,'2015-06-30 11:06:37');
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`phones_BEFORE_INSERT` BEFORE INSERT ON `phones` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `postdegree_graduates`
--

DROP TABLE IF EXISTS `postdegree_graduates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postdegree_graduates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pg_cve_idx` (`id_curriculum`),
  CONSTRAINT `id_pg_cve` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postdegree_graduates`
--

LOCK TABLES `postdegree_graduates` WRITE;
/*!40000 ALTER TABLE `postdegree_graduates` DISABLE KEYS */;
INSERT INTO `postdegree_graduates` VALUES (2,2,'Los impuntuales','2015-06-09 18:34:21'),(4,2,'Tenemos que hablar','2015-06-09 18:35:59'),(5,2,'Rodolfo Borja','2015-06-09 18:38:15'),(7,2,'dsad','2015-06-16 13:00:29'),(8,2,'dsfsdf','2015-06-16 13:00:46'),(10,2,'Daniel Ulises Garcia Verdin','2015-06-17 13:23:02'),(11,2,'Juanito Armando De la Ve','2015-06-17 13:23:20'),(13,2,'Rodolfo','2015-06-18 12:59:47'),(14,1,'Rodolfo','2015-06-18 17:05:27'),(15,2,'Daniel Ulises García Verdín','2015-06-19 18:22:39'),(19,9,'Sergio Mendoza Gómez','2015-06-23 09:22:48'),(20,9,'Andrea Gómez Tolentina','2015-06-23 09:33:56'),(22,10,'ese mero','2015-06-23 10:12:39'),(23,2,'asdf','2015-06-24 10:41:32'),(24,1,'asf','2015-06-24 13:48:38'),(25,10,'jonathan','2015-06-25 15:06:10'),(26,11,'Ricardo el chido','2015-06-25 15:10:05'),(27,11,'Ricardo Porfirio Tapia Cervantes','2015-06-25 15:10:40'),(28,10,'Juan','2015-07-02 12:57:17'),(29,10,'Juan','2015-07-02 12:57:18'),(30,10,'Juan','2015-07-02 12:57:18'),(31,10,'Juan','2015-07-02 12:57:18'),(32,10,'Juan','2015-07-02 12:57:18'),(33,10,'Juan','2015-07-02 12:57:18'),(34,10,'Juan','2015-07-02 12:57:19'),(35,10,'Juan','2015-07-02 12:57:19'),(36,10,'Juan','2015-07-02 12:57:19'),(37,10,'Juan','2015-07-02 12:57:19'),(38,10,'Juan','2015-07-02 12:57:19'),(39,10,'Juan','2015-07-02 12:57:20');
/*!40000 ALTER TABLE `postdegree_graduates` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`postdegree_graduates_BEFORE_INSERT` BEFORE INSERT ON `postdegree_graduates` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `press_notes`
--

DROP TABLE IF EXISTS `press_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `press_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL COMMENT 'tipo de participacion',
  `directed_to` varchar(45) DEFAULT NULL COMMENT 'dirigido a',
  `date` date DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `responsible_agency` varchar(45) DEFAULT NULL COMMENT 'dependencia responsable',
  `note` text,
  `is_national` varchar(45) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_press` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `press_notes`
--

LOCK TABLES `press_notes` WRITE;
/*!40000 ALTER TABLE `press_notes` DISABLE KEYS */;
INSERT INTO `press_notes` VALUES (11,10,'Demostraciones','Estudiantes','2015-06-01','Es para ellos','asi es','nada de nada','Nacional','2015-06-22 12:43:05'),(12,1,'Ferias Cientificas y Tecnologi','Empresarios','2015-06-02','POEPQWOEPo','eqweqwe','eqweqweqw','Nacional','2015-06-22 18:24:03'),(13,1,'Demostraciones','Sector Público','2015-06-09','eqweqwe','eqweqw','eqweqweqw','Extranjero','2015-06-22 18:24:35'),(14,10,'Medios Impresos','Estudiantes','2015-06-01','ese mero','as','sa','Extranjero','2015-06-23 10:41:37'),(15,1,'Ferias Cientificas y Tecnologi','Empresarios','2015-06-24','312312','xz<xz<','x<zx','Extranjero','2015-06-24 17:34:03'),(17,10,'Ferias Cientificas y Tecnologi','Público en general','2015-06-25','ese mero','sa','simon vato','Nacional','2015-06-25 15:06:50');
/*!40000 ALTER TABLE `press_notes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`press_notes_BEFORE_INSERT` BEFORE INSERT ON `press_notes` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `discipline` varchar(100) NOT NULL COMMENT 'combobox(Anatomía Patológica, Anestesiología, Angiología, Biología de la Reproducción Humana, Cardiología, Cirugía Cardiotorácica, Cirugía General, Cirugía Maxilofacial, Cirugía Pediátrica, Cirugía Plástica y Reconstructiva, Coloproctología, Audiología, Otoneurología y Foniatría, Dermatología, Endocrinología, Epidemiología, Estomatología, Gastroenterología, Genética Médica, Geriatría, Ginecología y Obstetricia, Hematología, Infectología, Inmunología Clínica y Alergia, Medicina del Enfermo en Estado Crítico, Medicina del Trabajo, Medicina Familiar, Medicina Física y Rehabilitación, Medicina Interna, Medicina Nuclear, Nefrología, Neumología, Oftalmología, Oncología Médica y Radioterapia, Ortopedia y Traumatología, Otorrinolaringología y Cirugía de Cabeza y Cuello, Pediatría Médica, Psiquiatría y Psicología, Radiodiagnóstico e Imagen, Reumatología, Urología, Otro, Neurocirugía)',
  `research_type` varchar(250) NOT NULL COMMENT 'checkbox(biomédica, clínica, educativa, epidemiológica, servicios de salud, otra(textbox))',
  `priority_topic` varchar(100) NOT NULL COMMENT 'combobox(Enfermedades Metabólicas (incluida obesidad)\nEnfermedades Cardiovasculares\nEnfermedades Infecciosas\nAccidentes y Violencia\nCáncer\nEnfermedades crónicas\nEnvejecimiento\nEnfermedades emergentes\nMuertes evitables (incluidas muerte materna y perinatal)\nSalud Mental y Adicciones\nDiscapacidad e Incapacidad\nOtros\n)',
  `sub_topic` varchar(100) NOT NULL,
  `justify` text NOT NULL,
  `is_sni` tinyint(1) NOT NULL,
  `develop_uh` varchar(50) DEFAULT NULL,
  `institution_colaboration` tinyint(1) DEFAULT NULL,
  `national_institutions` tinyint(1) DEFAULT NULL,
  `participant_institutions` text,
  `international_institutions_` tinyint(1) DEFAULT NULL,
  `participant_institutions_international` text,
  `colaboration_type` varchar(150) DEFAULT NULL,
  `has_adtl_caracteristics_a` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_a` text,
  `has_adtl_caracteristics_b` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_b` text,
  `has_adtl_caracteristics_c` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_c` text,
  `has_adtl_caracteristics_d` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_d` text,
  `has_adtl_caracteristics_e` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_e` text,
  `has_adtl_caracteristics_f` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_f` text,
  `has_adtl_caracteristics_g` tinyint(1) DEFAULT NULL,
  `adtl_caracteristics_g` text,
  `status` varchar(20) NOT NULL DEFAULT 'borrador',
  `folio` varchar(20) NOT NULL,
  `is_sponsored` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'El proyecto esta relacionado con la industria(1 si esta patrocinado, 0 no lo esta) default 0',
  `registration_number` varchar(20) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_curriculum_idx` (`id_curriculum`),
  CONSTRAINT `id_curriculum_projects` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (13,2,'Este es un buen proyecto','-1','-1','-1','-1','sas',1,'Hospital Civil Dr. Juan I. Menchaca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'divuh','-1',1,'-1','2015-06-15 09:48:05'),(14,2,'Uno diferente para que el jonhy se enferme','-1','-1','-1','-1','Inventaremos una cura para lodos los que tengan homosexualidad como porfirio',1,'Hospital Civil Dr. Juan I. Menchaca',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'divuh','-1',1,'-1','2015-06-15 12:54:42'),(15,2,'mi proximo proyecto','pro','pro','eses','pro','asas',1,'Hospital Civil Fray Antonio Alcalde',2,2,'ko',12,'mlkn','lkn',1,'klnm',2,'lkn',3,'jkn',4,'ljn',5,'ljb',6,'ljbn',7,'ljbj','divuh','-1',0,'-1','2015-06-16 10:34:16'),(16,2,'mi pro','pro','pro','eses','pro','asas',1,'Hospital Civil Fray Antonio Alcalde',2,2,'ko',12,'mlkn','lkn',1,'klnm',2,'lkn',3,'jkn',4,'ljn',5,'ljb',6,'ljbn',7,'ljbj','divuh','-1',0,'-1','2015-06-16 10:34:19'),(18,2,'mi proximo proyecto','pro','pro','eses','pro','asas',1,'Hospital Civil Fray Antonio Alcalde',2,2,'ko',12,'mlkn','lkn',1,'klnm',2,'lkn',3,'jkn',4,'ljn',5,'ljb',6,'ljbn',7,'ljbj','dictaminado','-1',0,'-1','2015-06-16 10:35:46'),(20,2,'asi es esto','asi es esto','sd','asi es esto','asi es esto','dsf',1,'-1',1,3,'fffg',3,'f','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','asdfasdfasdf cabron ','-1',0,'-1','2015-06-16 10:38:42'),(21,2,'asi es esto','asi es esto','sd','asi es esto','asi es esto','dsf',1,'Hospital Civil Dr. Juan I. Menchaca',1,3,'fffg',3,'f','',NULL,'',NULL,'asfsda',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','borrador','-1',0,'-1','2015-06-16 10:43:36'),(22,2,'asi es esto','asi es esto','sd','asi es esto','asi es esto','dsf',1,'Hospital Civil Dr. Juan I. Menchaca',1,3,'fffg',3,'f','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','borrador','-1',0,'-1','2015-06-16 10:45:25'),(23,2,'asi es esto','asi es esto','sd','asi es esto','asi es esto','dsf',1,'Hospital Civil Dr. Juan I. Menchaca',1,3,'fffg',3,'f','',NULL,'',NULL,'asfsda',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','borrador','-1',0,'-1','2015-06-16 10:45:54'),(30,2,'La vida','Matematicas','as','alta','60','fdsfdsf',1,'Hospital Civil Fray Antonio Alcalde',1,1,'Mexico',-1,'si','buena',NULL,'sdasd',NULL,'sdfsdf',NULL,'sadsdsa',NULL,'sads',NULL,'sdsadsa',NULL,'sdas',NULL,'sdadsa','divuh','-1',0,'-1','2015-06-19 14:15:38'),(31,2,'La vida','Matematicas','as','alta','60','fdsfdsf',1,'Hospital Civil Fray Antonio Alcalde',1,1,'Mexico',-1,'si','buena',NULL,'sdasd',NULL,'sdfsdf',NULL,'sadsdsa',NULL,'sads',NULL,'sdsadsa',NULL,'sdas',NULL,'sdadsa','divuh','-1',0,'-1','2015-06-19 14:15:40'),(32,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'esoss xxxx','-1',1,'-1','2015-06-22 12:53:29'),(33,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'esoss xxxx','-1',1,'-1','2015-06-22 13:25:18'),(34,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'divuh','-1',1,'-1','2015-06-22 13:57:00'),(35,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'divuh','-1',1,'-1','2015-06-22 13:57:05'),(36,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'completado','-1',1,'-1','2015-06-22 14:00:23'),(37,2,'Armando oyos','-1','-1','-1','-1','dsfffsdfss',1,'Hospital Civil Fray Antonio Alcalde',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'completado','-1',1,'-1','2015-06-22 14:18:05'),(38,2,'Este es un buen proyecto','-1','-1','-1','-1','sas',1,'Hospital Civil Dr. Juan I. Menchaca',NULL,NULL,'',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','completado','-1',0,'-1','2013-07-05 00:00:00'),(39,2,'Las farmacias similares no sirven pa nada','farmacias guacala','farmaceutica','las farmacias pinches','pinches farmacias','NEcesitamos una buena justificación para poder continuar con nuestras investigaciónes porque esto es lo que marca nuestro señor dios padre hijo y espiritu santo.',1,'Hospital Civil Dr. Juan I. Menchaca',NULL,NULL,'',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','completado','-1',0,'-1','2014-05-04 00:00:00'),(40,12,'El ibuprofeno aumenta esperanza de vida.','Biología','Algun tipo de investigación','La vida','el Ibuprofeno','Uno de los investigadores del instituto de Texas el doctor Michael Polymenis relató que primero dirigieron sus estudios hacia la levadura de panadero ',1,'-1',NULL,NULL,'',NULL,'','',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'','borrador','-1',1,'-1','2015-07-02 16:13:20');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`projects_BEFORE_INSERT` BEFORE INSERT ON `projects` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `projects_coworkers`
--

DROP TABLE IF EXISTS `projects_coworkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_coworkers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `fullName` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project_coworker_idx` (`id_project`),
  CONSTRAINT `id_project_coworker` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_coworkers`
--

LOCK TABLES `projects_coworkers` WRITE;
/*!40000 ALTER TABLE `projects_coworkers` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_coworkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_docs`
--

DROP TABLE IF EXISTS `projects_docs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proyecto_idx` (`id_project`),
  CONSTRAINT `id_projects_docs` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_docs`
--

LOCK TABLES `projects_docs` WRITE;
/*!40000 ALTER TABLE `projects_docs` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_docs` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`projects_docs_BEFORE_INSERT` BEFORE INSERT ON `projects_docs` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `projects_followups`
--

DROP TABLE IF EXISTS `projects_followups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_followups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `followup` text NOT NULL,
  `url_doc` text,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proyecto_idx` (`id_project`),
  KEY `id_user_followup` (`id_user`),
  CONSTRAINT `id_project_followup` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_user_followup` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_followups`
--

LOCK TABLES `projects_followups` WRITE;
/*!40000 ALTER TABLE `projects_followups` DISABLE KEYS */;
INSERT INTO `projects_followups` VALUES (1,13,2,'Esto es un comentario de prueba','','2015-06-23 11:03:19'),(2,13,2,'sdfasd fasd zxcv zxcv',NULL,'2015-06-23 12:33:14'),(3,13,2,'sdfasd fasd zxcv zxcvasdfasdfasdfasdfasdf',NULL,'2015-06-23 12:37:03'),(4,13,2,'asdfazxcvzxcv',NULL,'2015-06-23 12:39:37'),(5,13,2,'asdfasdfasdfasd asdf asdf zxcv zcxv','/Users/Saul/Sites/sihci/sihci/users/2/projects/132015-06-23 12:57ArchivoComentarioPor_.xlsx','2015-06-23 12:57:38'),(6,13,2,'asdfasdf asdf zxcvz xcvzxcv','/Users/Saul/Sites/sihci/sihci/users/2/projects/132015-06-23 12:59ArchivoComentarioPor_.png','2015-06-23 12:59:27'),(7,13,2,'asdfas zxcvz xcvzxcv','/Users/Saul/Sites/sihci/sihci/users/2/projects/132015-06-23 12:59ArchivoComentarioPor_.xlsx','2015-06-23 12:59:41'),(8,13,2,'asdfasdf ',NULL,'2015-06-23 13:00:07'),(9,13,2,'asdfasv zxcv zxcv',NULL,'2015-06-23 13:02:37'),(10,13,2,'asdfasv zxcv zxcv','/Users/Saul/Sites/sihci/sihci/users/2/projects/132015-06-23 13:02ArchivoComentarioPor_.png','2015-06-23 13:02:45'),(11,13,2,'Comentario de prueba',NULL,'2015-06-23 14:02:10'),(12,14,2,'asdfasdf zxcvz xcv ','/Users/Saul/Sites/sihci/sihci/users/2/projects/142015-06-23 16:45ArchivoComentarioPor_.png','2015-06-23 16:45:52'),(13,14,2,'asdfasdfzxcvzxcv asdf asdf','/Users/Saul/Sites/sihci/sihci/users/2/projects/142015-06-23 16:53ArchivoComentarioPor_.png','2015-06-23 16:53:06'),(14,14,2,'Este comentario esta perron','/Users/Saul/Sites/sihci/sihci/users/2/projects/142015-06-23 16:56ArchivoComentarioPor_.png','2015-06-23 16:56:57'),(15,14,2,'Puto dan sin camel case perro','/Users/Saul/Sites/sihci/sihci/users/2/projects/142015-06-23 16:58ArchivoComentarioPor_.png','2015-06-23 16:58:06'),(16,13,2,'4564 5465a4s65dvzxc3v1 a5sdf',NULL,'2015-06-23 17:01:47'),(17,13,2,'asdfasdfasdf',NULL,'2015-06-23 17:56:33'),(18,14,2,'asdfasdfasdf',NULL,'2015-06-23 17:56:33'),(19,13,2,'Que paso jonathan con tos de dods pedods',NULL,'2015-06-23 18:00:04'),(20,14,2,'asdfasdfasdf',NULL,'2015-06-23 18:01:09'),(21,13,2,'asdfasdfasdf',NULL,'2015-06-23 18:01:10'),(22,14,2,'asdfasdfasdf',NULL,'2015-06-23 18:01:46'),(23,13,2,'asdfasdfasdf',NULL,'2015-06-23 18:01:46'),(24,14,2,'asdfasdfasdfasdfasdf',NULL,'2015-06-23 18:02:57'),(25,13,2,'asdfasdfasdfasdfasdf',NULL,'2015-06-23 18:02:57'),(26,14,2,'asdfasdfasdfasdfasdf',NULL,'2015-06-23 18:03:01'),(27,14,2,'asdfasdf',NULL,'2015-06-23 18:05:18'),(28,13,2,'asdfasdf',NULL,'2015-06-23 18:05:19'),(29,14,2,'asdfasdfasdf',NULL,'2015-06-23 18:06:43'),(30,13,2,'asdfasdfasdf',NULL,'2015-06-23 18:06:43'),(31,13,2,'adsfasdf',NULL,'2015-06-23 18:10:30'),(32,14,2,'adsfasdf',NULL,'2015-06-23 18:10:30'),(33,14,2,'asdfasdf',NULL,'2015-06-23 18:10:58'),(34,13,2,'asdfasdf',NULL,'2015-06-23 18:10:58'),(35,14,2,'asdfasdf',NULL,'2015-06-23 18:11:07'),(36,14,2,'adfasdfasdf',NULL,'2015-06-23 18:11:28'),(37,13,2,'adfasdfasdf',NULL,'2015-06-23 18:11:28'),(38,14,2,'asdf asdf zxcv zxcv zxcv asdf asdf',NULL,'2015-06-23 18:16:31'),(39,13,2,'asdf asdf zxcv zxcv zxcv asdf asdf',NULL,'2015-06-23 18:16:31'),(40,20,2,'asdfasdfasdfasdf ads asdf asdf ',NULL,'2015-06-24 09:48:24'),(41,14,2,'asdfa sdf  zxcv zxcv',NULL,'2015-06-24 10:12:55'),(42,20,2,'asdfa sdf  zxcv zxcv',NULL,'2015-06-24 10:12:55'),(43,14,2,'asdfa sdf  zxcv zxcv',NULL,'2015-06-24 10:13:05'),(44,14,2,'asdfadsf',NULL,'2015-06-24 10:13:18'),(45,20,2,'asdfadsf',NULL,'2015-06-24 10:13:18'),(46,14,2,'asdfasdf',NULL,'2015-06-24 10:15:20'),(47,20,2,'asdfasdf',NULL,'2015-06-24 10:15:20'),(48,14,2,'asdfasdf',NULL,'2015-06-24 10:15:23'),(49,14,2,'adsf',NULL,'2015-06-24 10:19:15'),(50,20,2,'adsf',NULL,'2015-06-24 10:20:13'),(229,32,2,'ewrw',NULL,'2015-06-29 12:37:05'),(230,20,2,'dadwqe',NULL,'2015-06-29 12:57:01'),(231,20,2,'dadwqe',NULL,'2015-06-29 12:57:01'),(232,32,2,'sdfdf',NULL,'2015-06-29 12:57:26'),(233,32,2,'sadasdd',NULL,'2015-06-29 12:58:21'),(234,32,2,'sdfsdfdf',NULL,'2015-06-29 12:59:48'),(235,32,2,'fsdfsd',NULL,'2015-06-29 13:23:08'),(236,13,2,'Esto es un nuevo comentario','/Users/Saul/Sites/sihci/sihci/users/2/projects/13/2015-06-29_13-48ArchivoComentarioPor_.png','2015-06-29 13:48:23'),(237,13,2,'Est es una opcion benevola para todos nosostros, Est es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostrosEst es una opcion benevola para todos nosostros','/Users/Saul/Sites/sihci/sihci/users/2/projects/13/2015-06-29_13-49Archivo.png','2015-06-29 13:49:55'),(238,32,2,'fdfsdfdf',NULL,'2015-06-29 14:01:33'),(239,32,2,'dsdfsdf',NULL,'2015-06-29 14:01:59'),(240,32,2,'dfgdfgdfg',NULL,'2015-06-29 14:03:10'),(241,32,2,'dsffsdf',NULL,'2015-06-29 14:04:18'),(242,32,2,'dsffsdf','/Users/Dan/Sites/SIHCi/sihci/users/2/projects/32/2015-06-29 14:04ArchivoComentarioPor_.pdf','2015-06-29 14:04:32'),(243,13,2,'zxcvzxcvzcxvzxcv',NULL,'2015-06-29 14:13:56'),(244,39,2,'Proyecto enviado a revisión del Jefe de división de unidad hospitalaria.',NULL,'2015-06-29 15:14:25'),(245,20,2,'asdfasdf',NULL,'2015-06-29 16:15:57'),(246,20,2,'asdfasdf',NULL,'2015-06-29 16:15:57'),(247,14,2,'asdf',NULL,'2015-06-29 16:38:34'),(248,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:08:52'),(249,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:09:32'),(250,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:12:13'),(251,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:23:54'),(252,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:33:34'),(253,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:34:33'),(254,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:36:52'),(255,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:37:27'),(256,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-06-29 17:41:37'),(257,13,2,'ºzcASDasasdfasdf',NULL,'2015-06-30 11:48:52'),(258,13,2,'ºzcASDasasdfasdf','/Users/Saul/Sites/sihci/sihci/users/2/projects/13/2015-06-30_12-42Archivo.png','2015-06-30 12:42:31'),(259,32,2,'dsfsdfsdfsdf',NULL,'2015-07-01 13:23:36'),(260,32,2,'dsfsdfsdfsdf',NULL,'2015-07-01 13:23:36'),(261,13,2,'asdf',NULL,'2015-07-01 13:35:39'),(262,13,2,'asdf',NULL,'2015-07-01 13:36:13'),(263,13,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-07-01 14:05:21'),(264,32,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-07-01 14:07:14'),(265,32,2,'asdfasdfasdfasdf',NULL,'2015-07-01 15:31:35'),(266,32,2,'asdfasdf',NULL,'2015-07-01 15:33:40'),(267,32,2,'asdfasdf',NULL,'2015-07-01 15:33:40'),(268,33,2,'Proyecto enviado a revisión del otro wey.',NULL,'2015-07-01 15:38:13'),(269,13,25,'asdf',NULL,'2015-07-02 13:54:44'),(270,13,25,'asdf',NULL,'2015-07-02 13:55:13'),(271,13,24,'comentario de prueba',NULL,'2015-07-02 14:59:00'),(272,13,24,'comentario de prueba','/Users/Saul/Sites/SIHCi/sihci/users/24/projects/13/2015-07-02_14-59Archivo.pdf','2015-07-02 14:59:09'),(273,13,25,'asdf',NULL,'2015-07-02 15:42:27'),(274,13,25,'asdf',NULL,'2015-07-02 15:43:51'),(275,13,25,'asdf',NULL,'2015-07-02 15:44:48'),(276,13,25,'asdf','/Users/Saul/Sites/SIHCi/sihci/users/25/projects/13/2015-07-02_15-45Archivo.png','2015-07-02 15:44:58'),(277,13,25,'Esto es una prueba en projects 13 del investigador','/Users/Saul/Sites/SIHCi/sihci/users/25/projects/13/2015-07-02_15-48Archivo.png','2015-07-02 15:47:59'),(278,13,25,'asdfasdfasdfasdfasdfasdf','/Users/Saul/Sites/SIHCi/sihci/users/25/projects/13/2015-07-02_15-49Archivo.png','2015-07-02 15:49:12');
/*!40000 ALTER TABLE `projects_followups` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.9`*/ /*!50003 TRIGGER `projects_followups_BEFORE_INSERT` BEFORE INSERT ON `projects_followups` FOR EACH ROW SET NEW.creation_date = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `research_areas`
--

DROP TABLE IF EXISTS `research_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_research_cve_idx` (`id_curriculum`),
  CONSTRAINT `id_research_cve` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_areas`
--

LOCK TABLES `research_areas` WRITE;
/*!40000 ALTER TABLE `research_areas` DISABLE KEYS */;
INSERT INTO `research_areas` VALUES (5,1,'Artritis'),(6,1,'odoonto'),(7,2,'prueba para mayel'),(31,9,'oo'),(32,9,'Juan Armando'),(37,11,'La vida humana'),(38,11,'El saul hace enojar'),(41,10,'linea'),(42,10,'asi es');
/*!40000 ALTER TABLE `research_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `research_areas_cv`
--

DROP TABLE IF EXISTS `research_areas_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_areas_cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_research_areas` int(11) NOT NULL,
  `id_research_areas_cv` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_research_areas_idx` (`id_research_areas`),
  KEY `id_research_areas_cv_idx` (`id_research_areas_cv`),
  CONSTRAINT `id_research_areas` FOREIGN KEY (`id_research_areas`) REFERENCES `research_areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_research_areas_cv` FOREIGN KEY (`id_research_areas_cv`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_areas_cv`
--

LOCK TABLES `research_areas_cv` WRITE;
/*!40000 ALTER TABLE `research_areas_cv` DISABLE KEYS */;
/*!40000 ALTER TABLE `research_areas_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrementable por el sistema',
  `name` varchar(70) NOT NULL DEFAULT '' COMMENT 'nombre del rol ',
  `alias` char(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador General','ADMIN'),(2,'No Definido','NF'),(3,'Usuario General','USUARIO'),(11,'División de Investigacion de la Unidad Hospitalaria','DIVUH'),(12,'Subdirector de Enseñanza e Investigacion de la Unidad Hospitalaria','SEUH'),(13,'Comité de Ética en investigación','COMETI'),(14,'Comité de Bioseguridad','COMBIO'),(15,'Comité de investigación','COMINV'),(16,'Director de Unidad Hospitalaria','DUH'),(17,'Subdirector General de Enseñanza e Investigación','SGEI'),(18,'Director General','DG'),(19,'Jefe de investigación OPD','JIOPD');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curriculum` int(11) NOT NULL COMMENT 'fk de la tabla curriculum',
  `country` varchar(50) NOT NULL,
  `participation_type` varchar(20) DEFAULT NULL COMMENT 'combobox(inventor, coinventor)',
  `title` varchar(150) NOT NULL,
  `beneficiary` varchar(70) DEFAULT NULL,
  `entity` varchar(20) DEFAULT NULL COMMENT 'combobox(publica,privada,sector social)',
  `manwork_hours` double DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `sector` varchar(100) NOT NULL COMMENT 'combobox(No especificado, Instituciones del sector gobierno federal centralizado, Instituciones del sector entidades paraestatales, Instituciones del sector gobierno de las entidades federativas, Instituciones del sector de educacion superior publicas, Instituciones del sector de educacion superior privadas, Instituciones del sector privado de empresas productivas (adiat), Instituciones / organizaciones no lucrativas, Instituciones / organizaciones extranjeras, consultoras, Gobierno municipal, Gobierno federal descentralizado, Gobierno Federal Desconcentrado, Centros Públicos de Investigación, Centros Privados de Investigación)',
  `organization` varchar(100) NOT NULL COMMENT 'combobox(MANUFACTURERA OLSON SA DE CV, DREAM BUSINESS WEB SA DE CV, EDC SUPPLY S DE RL DE MI, CLUB DEPORTIVO ATENEA, ADMINISTRACION CENTRO COMERCIAL ANDARES SC, OSOS, SIXSIGMA NETWORKS MEXICO, FERMIN MONTIELRIGOBERTO, ENKONTA S DE RL DE CV, TL EFFICIENCY SA DE CV)',
  `second_level` varchar(100) DEFAULT NULL COMMENT 'combobox() de acuerdo a la organizacion',
  `resumen` text,
  `objective` text,
  `contribution` text COMMENT 'contribucion del solicitante al desarrollo de software',
  `impact_value` text COMMENT 'Generacion de valor e impacto para el beneficiario',
  `innovation_trascen` text COMMENT 'Grado de innovacion y trascendencia',
  `transfer_mechanism` text COMMENT 'Mecanismo de transferencia del desarrollo de software',
  `hr_formation` text COMMENT 'Formacion de recursos humanos',
  `economic_support` tinyint(1) DEFAULT NULL COMMENT 'Recibio apoyo de algun fondo del programas de conacyt',
  `path` varchar(100) DEFAULT NULL COMMENT 'url del documento probatorio',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cv_sw_idx` (`id_curriculum`),
  CONSTRAINT `id_cv_sw` FOREIGN KEY (`id_curriculum`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software`
--

LOCK TABLES `software` WRITE;
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT INTO `software` VALUES (43,2,'Algeria','Co-inventor','TItulo prop soft','Beneficiario','Privada',500,'2015-06-09','Gobierno federal desconcentrado','CLUB DEPORTIVO ATENEA','CENTRO UNIVERSITARIO DE LA COSTA.','Resumen de la propiedad intelectual','Algun objetivo dentro del registro','Yo no contribui en nada','Sabe yo ni lo hice','Algo de innovación genial','Mecanismo algo de transferencia','Algo de formacion de rh',1,'/users/2/Folder_Software/fileSoftware19-06-2015_19-00-44.png','2015-06-19 19:00:44'),(45,2,'Andorra','','E','Dan Garcia','Sector social',21,'2015-06-11','Centros públicos de investigación','DREAM BUSINESS WEB SA DE CV','CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO','dsds','dsdsdsd','dsds','dsd','sdds','dsd','dss',1,'/users/2/Folder_Software/fileSoftware20-06-2015_13-05-19.odt','2011-10-05 00:00:00'),(46,1,'American Samoa','Co-inventor','simon','0000??++++','Pública',10,'2015-06-11','Instituciones del sector gobierno federal centralizado','FERMIN MONTIELRIGOBERTO','CENTRO UNIVERSITARIO DE LA COSTA SUR','simon','simon','simon','simon','simon','simon','simopmn',1,'/users/1/Folder_Software/fileSoftware22-06-2015_13-08-20.pdf','2015-06-22 13:08:20'),(47,11,'México','Co-inventor','Algun dia se me ocurrira','Alguien de por hay','Pública',23,'2015-06-30','Consultoras','ADMINISTRACION CENTRO COMERCIAL ANDARES SC','CENTRO DE ESTUDIOS DEL PACIFICO','asdsadsafdafsdaf','dfdsfdsfdsfds','dsfdsfdds','dsfdsfdsfdsfdsfdsfdsfd','dsfdsfdsfdsfdsfdsf','dsfdsfsDSADSFSsdafdsfa','dsfsafsafsdafaf',1,'','2015-06-22 15:32:51'),(48,10,'Macau','Inventor','simon','asd','Pública',NULL,'0000-00-00','Centros públicos de investigación','CLUB DEPORTIVO ATENEA','','','','','','','','',NULL,'','2015-06-22 15:39:13'),(49,11,'México','Inventor','dsfdsfds','sdfdsfdsfdsf','Pública',32,'2015-06-30','Centros privados de investigación','ADMINISTRACION CENTRO COMERCIAL ANDARES SC','CENTRO DE ESTUDIOS DEL PACIFICO','adsfsdfsdgdfg','dfsgfdsfdsgf','sfdgdsg','dfgdfdsgfd','fdgssdfgfdsg','fdgdsgretredf','fdsgfdgfdsg',1,'','2014-06-22 00:00:00'),(55,1,'American Samoa','Inventor','SOFTTONIC ','Ricardo Tapia','Pública',34342344,'2015-06-02','Gobierno federal desconcentrado','DREAM BUSINESS WEB SA DE CV','CENTRO UNIVERSITARIO DE LOS ALTOS','eaweawe','eawew','aaaa','aaaa','aaa','aaa','aaa',1,'/users/1/folderSoftware/fileSoftware23-06-2015_12-26-16.pdf','2014-05-07 00:00:00'),(57,1,'Algeria','Co-inventor','eaweawe','eawew','Privada',31312,'2015-06-30','Centros públicos de investigación','DREAM BUSINESS WEB SA DE CV','CENTRO DE ESTUDIOS E INVESTIGACION EN COMPORTAMIENTO','','','','','','','',NULL,'','2015-06-23 13:02:19'),(58,1,'Albania','Inventor','00','JONA','Pública',3123,'2015-06-30','Centros privados de investigación','CLUB DEPORTIVO ATENEA','CENTRO DE ESTUDIOS E INVESTIGACIONES EN PSICOLOGIA','','','','','','','',NULL,'','2015-06-23 13:07:18'),(59,10,'Bangladesh','Autor','simon','ese','Sector social',21,'2015-06-26','No especificado','SIXSIGMA NETWORKS MEXICO','CENTRO UNIVERSITARIO DE LOS ALTOS','sa','dassasa','','','','','',1,'/users/15/folderSoftware/fileSoftware25-06-2015_13-54-05.pdf','2015-06-25 13:52:13'),(60,10,'Bahamas','Co-autor','mo','no','Pública',321,'2015-06-23','Consultoras','ADMINISTRACION CENTRO COMERCIAL ANDARES SC','CENTRO DE ESTUDIOS DEL PACIFICO','','','','','','','',NULL,'','2015-06-25 13:53:04'),(66,11,'Albania','','PO','Rick','Pública',2121,'2015-06-25','Centros públicos de investigación','DREAM BUSINESS WEB SA DE CV','','','','','','','','',NULL,'/users/17/folderSoftware/fileSoftware25-06-2015_15-50-54.pdf','2015-02-02 00:00:00'),(69,2,'México','Autor','No se ','','',NULL,'0000-00-00','Centros privados de investigación','CLUB DEPORTIVO ATENEA','','','','','','','','',NULL,'/users/2/folderSoftware/fileSoftware27-06-2015_11-38-02.pdf','2015-02-02 00:00:00'),(70,2,'Algeria','Co-autor','Jonatronix 2000','Saúl ','Pública',21,'2015-07-01','Centros públicos de investigación','APRADIE SC',NULL,'','','','','','','',NULL,'/users/2/folderSoftware/fileSoftware02-07-2015_10-35-02.php','2015-07-02 10:25:34'),(72,2,'Albania','Co-autor','www 12','Ricardo','Pública',33,'2015-07-01','Gobierno federal descentralizado','AGENCIA ESPACIAL MEXICANA',NULL,'ppppp','pppp','ppppp','ppppp','pppp','pppp','pppp',1,'/users/2/folderSoftware/fileSoftware02-07-2015_13-28-55.pdf','2015-07-02 13:26:39'),(73,2,'American Samoa','Co-autor','Super chido one 1','Ricardo','',21,'2015-07-01','Centros públicos de investigación','ACCESOS SIN LIMITE SA DE CV',NULL,'','','','','','','',1,'','2015-07-02 13:32:33');
/*!40000 ALTER TABLE `software` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`software_BEFORE_INSERT` BEFORE INSERT ON `software` FOR EACH ROW SET NEW.creation_date = now() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `specialty_areas`
--

DROP TABLE IF EXISTS `specialty_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialty_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty` varchar(200) NOT NULL,
  `subspecialty` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialty_areas`
--

LOCK TABLES `specialty_areas` WRITE;
/*!40000 ALTER TABLE `specialty_areas` DISABLE KEYS */;
INSERT INTO `specialty_areas` VALUES (5,'Especialidad','Subespecialidad'),(6,'Salud publica','Enfermedades del corazon'),(7,'Matematicas','algebra');
/*!40000 ALTER TABLE `specialty_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor_billing`
--

DROP TABLE IF EXISTS `sponsor_billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sponsor` int(11) NOT NULL,
  `id_address_billing` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sponsor_billing_idx` (`id_sponsor`),
  KEY `id_address_billing_idx` (`id_address_billing`),
  CONSTRAINT `id_address_billing` FOREIGN KEY (`id_address_billing`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_sponsor_billing` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor_billing`
--

LOCK TABLES `sponsor_billing` WRITE;
/*!40000 ALTER TABLE `sponsor_billing` DISABLE KEYS */;
INSERT INTO `sponsor_billing` VALUES (1,4,21,'','','');
/*!40000 ALTER TABLE `sponsor_billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsored_projects`
--

DROP TABLE IF EXISTS `sponsored_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsored_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `id_sponsorship` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project_sp_idx` (`id_project`),
  KEY `id_sponsored_sp_idx` (`id_sponsorship`),
  CONSTRAINT `id_project_sp` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_sponsored_sp` FOREIGN KEY (`id_sponsorship`) REFERENCES `sponsorship` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsored_projects`
--

LOCK TABLES `sponsored_projects` WRITE;
/*!40000 ALTER TABLE `sponsored_projects` DISABLE KEYS */;
INSERT INTO `sponsored_projects` VALUES (1,32,7),(2,33,7),(3,34,7),(4,35,7),(5,36,7),(6,37,7),(7,40,8);
/*!40000 ALTER TABLE `sponsored_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'NO HAY INFORMACION DEL CLIENTE',
  `id_user` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `sponsor_name` varchar(50) NOT NULL COMMENT 'nombre de la empresa',
  `type` varchar(150) NOT NULL COMMENT 'Tipo de identidad',
  `website` varchar(100) DEFAULT NULL,
  `sector` varchar(200) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `main_activity` varchar(100) DEFAULT NULL,
  `legal_structure` varchar(100) DEFAULT NULL,
  `employeess_number` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_idx` (`id_user`),
  KEY `id_sponsor_addressx_idx` (`id_address`),
  CONSTRAINT `id_sponsor_addressx` FOREIGN KEY (`id_address`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_user_sponsorx` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
INSERT INTO `sponsors` VALUES (3,1,17,'mexico','privado','mexico.com','COMERCIO AL POR MENOR','mexico','mexico','mexico','mexico',20,'2015-06-19 18:49:58'),(4,4,19,'Mayonesa S.A.CV.D','no lucrativo','www.Macormic.com','ACTIVIDADES DEL GOBIERNO Y DE ORGANISMOS INTERNACIONALES Y EXTRATERRITORIALES','de la chida ','Consumo','Ventas de mayoreo','No se que sea??',100000,'2015-06-22 12:20:36'),(5,24,24,'Punto Medio Operadora','no lucrativo','www.puntomedio.com','INFORMACION EN MEDIOS MASIVOS',NULL,'Creación de satelites','software','Estructura legal',10,'2015-07-02 16:12:58');
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`sponsors_BEFORE_INSERT` BEFORE INSERT ON `sponsors` FOR EACH ROW SET NEW.creation_date = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sponsors_contact`
--

DROP TABLE IF EXISTS `sponsors_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sponsor` int(11) NOT NULL COMMENT 'fk id de la empresa a la que pertenece',
  `type` varchar(20) NOT NULL COMMENT 'combobox(telefono, celular, fax, email)',
  `value` varchar(20) NOT NULL COMMENT 'valor del tipo elegido ya sea tel, cel, fax o email',
  PRIMARY KEY (`id`),
  KEY `id_empresa_idx` (`id_sponsor`),
  CONSTRAINT `id_sponsor_doc` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors_contact`
--

LOCK TABLES `sponsors_contact` WRITE;
/*!40000 ALTER TABLE `sponsors_contact` DISABLE KEYS */;
INSERT INTO `sponsors_contact` VALUES (5,4,'TELEFONO','555-4444-4443423'),(6,3,'TELEFONO','01--192829383');
/*!40000 ALTER TABLE `sponsors_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors_contacts`
--

DROP TABLE IF EXISTS `sponsors_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sponsor` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contact_sponsor_idx` (`id_sponsor`),
  CONSTRAINT `id_contact_sponsor` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors_contacts`
--

LOCK TABLES `sponsors_contacts` WRITE;
/*!40000 ALTER TABLE `sponsors_contacts` DISABLE KEYS */;
INSERT INTO `sponsors_contacts` VALUES (7,4,'dasdsadasdasdad{}{}{{__:__:_.;;:,.,70097423740827357823085720318888888');
/*!40000 ALTER TABLE `sponsors_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors_docs`
--

DROP TABLE IF EXISTS `sponsors_docs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sponsor` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL COMMENT 'obligatorio uno de cada tipo: (Decreto de creación, acta constitutiva o documento que acredite la creación de la empresa), (Documento con el que se acreditan las facultades del representante o apoderado ), (Licencias, autorizaciones, permisos para las actividades, etc.), (RFC o equivalente ). Opcional para extranjeros(Comprobante de domicilio ), Identificacion del representante oficial.',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa_idx` (`id_sponsor`),
  CONSTRAINT `id_sponsor_docs` FOREIGN KEY (`id_sponsor`) REFERENCES `sponsors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors_docs`
--

LOCK TABLES `sponsors_docs` WRITE;
/*!40000 ALTER TABLE `sponsors_docs` DISABLE KEYS */;
INSERT INTO `sponsors_docs` VALUES (2,3,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/3/docs/Documento_que_acredite_la_creacion_de_la_empresa.png','2015-06-19 18:52:35'),(3,3,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/3/docs/Documento_que_acredite_la_creacion_de_la_empresa.sql','2015-06-22 11:56:17'),(4,4,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/4/docs/Documento_que_acredite_la_creacion_de_la_empresa.sql','2015-06-22 12:34:04'),(5,4,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/4/docs/Documento_que_acredite_la_creacion_de_la_empresa.sql','2015-06-22 12:35:27'),(6,4,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/4/docs/Documento_que_acredite_la_creacion_de_la_empresa.sql','2015-06-22 12:37:02'),(7,3,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/3/docs/Documento_que_acredite_la_creacion_de_la_empresa.png','2015-06-23 12:28:46'),(8,3,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/3/docs/Documento_que_acredite_la_creacion_de_la_empresa.png','2015-06-23 12:49:37'),(9,3,'Documento_que_acredite_la_creacion_de_la_empresa','sponsors/3/docs/Documento_que_acredite_la_creacion_de_la_empresa.png','2015-06-23 12:50:06'),(10,3,'Acreditacion_de_las_facultades_del_representante_o_apoderado','sponsors/3/docs/Acreditacion_de_las_facultades_del_representante_o_apoderado.png','2015-06-23 13:16:21'),(11,3,'Permisos_de_actividades','sponsors/3/docs/Permisos_de_actividades.png','2015-06-23 13:18:45'),(12,3,'RFC_o_equivalente','sponsors/3/docs/RFC_o_equivalente.png','2015-06-23 13:18:45'),(13,3,'Comprobante_de_domicilio','sponsors/3/docs/Comprobante_de_domicilio.png','2015-06-23 13:18:45'),(14,3,'Identificacion_Oficial_del_Representante','sponsors/3/docs/Identificacion_Oficial_del_Representante.png','2015-06-23 13:18:45');
/*!40000 ALTER TABLE `sponsors_docs` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`sponsors_docs_BEFORE_INSERT` BEFORE INSERT ON `sponsors_docs` FOR EACH ROW SET NEW.creation_date = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sponsorship`
--

DROP TABLE IF EXISTS `sponsorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_sponsorer` int(11) NOT NULL COMMENT 'id de la empresa que creo el patrocinio',
  `id_user_researcher` int(11) NOT NULL COMMENT 'id del investigador al que se le invita a participar',
  `project_name` varchar(45) NOT NULL,
  `description` varchar(150) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'estado para revisar si lo ha aceptado el investigador o no, combobox(1=si,2=no) defaul no(0)',
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_investigador_idx` (`id_user_researcher`),
  KEY `id_empresa_usario_idx` (`id_user_sponsorer`),
  CONSTRAINT `id_user_researcherx` FOREIGN KEY (`id_user_researcher`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_user_sponsorer` FOREIGN KEY (`id_user_sponsorer`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsorship`
--

LOCK TABLES `sponsorship` WRITE;
/*!40000 ALTER TABLE `sponsorship` DISABLE KEYS */;
INSERT INTO `sponsorship` VALUES (7,4,2,'Armando oyos','dsfffsdfss','sdfsdfsdf',0,'2015-06-19 15:27:45'),(8,24,25,'El ibuprofeno aumenta esperanza de vida.','Uno de los investigadores del instituto de Texas el doctor Michael Polymenis relató que primero dirigieron sus estudios hacia la levadura de panadero ','ibuprofeno, vida, animales.',1,'2015-07-02 12:59:26');
/*!40000 ALTER TABLE `sponsorship` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`sponsorship_BEFORE_INSERT` BEFORE INSERT ON `sponsorship` FOR EACH ROW SET NEW.creation_date = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `system_log`
--

DROP TABLE IF EXISTS `system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador autoincrmentable por el sistema.',
  `id_user` int(11) NOT NULL COMMENT 'fk de la tabla usuarios',
  `section` varchar(60) NOT NULL COMMENT 'seccion de la accion realizada',
  `details` varchar(150) NOT NULL,
  `action` varchar(250) NOT NULL COMMENT 'descripcion de la accion realizada',
  `datetime` datetime NOT NULL COMMENT 'fecha y hora en que se realizo el log',
  PRIMARY KEY (`id`),
  KEY `id_usuario_idx` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2089 DEFAULT CHARSET=utf8 COMMENT='			';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_log`
--

LOCK TABLES `system_log` WRITE;
/*!40000 ALTER TABLE `system_log` DISABLE KEYS */;
INSERT INTO `system_log` VALUES (1615,15,'Curriculum Vitae','Subsección Datos Personales. Registro Número 14','Modificación','2015-06-30 13:44:27'),(1616,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2015-06-30 13:44:27'),(1617,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1618,1,'Login','Usuario: simon@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1619,1,'Artículos y Guías','Fecha: 2015-06-25 12:30:20. Datos: Titulo: 99','Creación','2015-06-30 13:44:27'),(1620,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1621,1,'Cuenta','Subsección: Cambio Email.','Modificación','2015-06-30 13:44:27'),(1622,2,'Artículos y Guías','Fecha: 2015-06-25 12:48:34. Datos: Titulo: Ti','Creación','2015-06-30 13:44:27'),(1623,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1624,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1625,2,'Artículos y Guías','Fecha: 2015-06-25 12:57:58. Datos: Titulo: 222','Creación','2015-06-30 13:44:27'),(1626,2,'Artículos y Guías','Fecha: 2015-06-25 13:08:09. Datos: Titulo: ewe','Creación','2015-06-30 13:44:27'),(1627,2,'Artículos y Guías','Fecha: 2015-06-25 13:13:35. Datos: Titulo: 111','Creación','2015-06-30 13:44:27'),(1628,2,'Artículos y Guías','Número Registro: 31','Modificación','2015-06-30 13:44:27'),(1629,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2015-06-30 13:44:27'),(1630,21,'Login','Usuario: daniel@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1631,21,'Curriculum Vitae','Subsección Dirección Actual','Creación','2015-06-30 13:44:27'),(1632,21,'Logout','Usuario: Daniel  Garcia Verdin','Cerró Sesión','2015-06-30 13:44:27'),(1633,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1634,2,'Libros','Fecha: 2015-06-25 13:29:13. Datos: Titulo: p','Creación','2015-06-30 13:44:27'),(1635,2,'Libros','Registro Número: 5','Modificación','2015-06-30 13:44:27'),(1636,2,'Libros','Registro Número: 5','Modificación','2015-06-30 13:44:27'),(1637,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1638,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 45','Modificación','2015-06-30 13:44:27'),(1639,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 45','Modificación','2015-06-30 13:44:27'),(1640,15,'Difusión de Prensa','Datos: Demostraciones','Creación','2015-06-30 13:44:27'),(1641,15,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1642,15,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1643,15,'Propiedad Intelectual','Subsección: Software. Número Registro: 59','Modificación','2015-06-30 13:44:27'),(1644,15,'Propiedad Intelectual','Subsección: Software. Número Registro: 59','Modificación','2015-06-30 13:44:27'),(1645,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1646,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 61. Fecha de Creación: 2015-06-25 14:00:08.','Eliminación','2015-06-30 13:44:27'),(1647,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1648,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1649,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1650,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 64','Modificación','2015-06-30 13:44:27'),(1651,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1652,15,'Curriculum Vitae','Subsección Datos Personales. Registro Número 14','Modificación','2015-06-30 13:44:27'),(1653,15,'Curriculum Vitae','Subsección Datos Personales. Registro Número 14','Modificación','2015-06-30 13:44:27'),(1654,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1655,15,'Curriculum Vitae','Subsección Datos de Dirección Actual. Número Registro: 18','Modificación','2015-06-30 13:44:27'),(1656,15,'Curriculum Vitae','Subsección Linea de investigación: asi es.','Creación','2015-06-30 13:44:27'),(1657,15,'Libros','Fecha: 2015-06-25 15:05:20. Datos: Titulo: Edicion','Creación','2015-06-30 13:44:27'),(1658,15,'Curriculum Vitae','Subsección Datos de Contacto. Teléfono','Creación','2015-06-30 13:44:27'),(1659,15,'Libros','Registro Número: 6','Modificación','2015-06-30 13:44:27'),(1660,15,'Curriculum Vitae.','Subsección Formación Académica. Registro Número: 15. Fecha Creación: 2015-06-23 11:38:06. Datos: Maestria. Título de Tésis: asdsadas','Eliminación','2015-06-30 13:44:27'),(1661,15,'Curriculum Vitae.','Subsección Formación Académica. Registro Número: 16. Fecha Creación: 2015-06-23 11:42:17. Datos: Maestria. Título de Tésis: dasd','Eliminación','2015-06-30 13:44:27'),(1662,15,'Curriculum Vitae.','Subsección Nombramientos. Número Registro: 10','Modificación.','2015-06-30 13:44:27'),(1663,17,'Login','Usuario: algo@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1664,15,'Graduados de Posgrado','Nombre del Graduado: jona','Creación','2015-06-30 13:44:27'),(1665,15,'Graduados de Posgrado','Registro Número: 25.','Modificación','2015-06-30 13:44:27'),(1666,15,'Graduados de Posgrado','Registro Número: 18. Fecha de Creación: 2015-06-22 12:42:12. Datos: jonathan marisco garzes','Eliminación','2015-06-30 13:44:27'),(1667,15,'Difusión de Prensa','Datos: Ferias Cientificas y Tecnologi','Creación','2015-06-30 13:44:27'),(1668,15,'Difusión de Prensa','Registro Número: 17.','Modificación','2015-06-30 13:44:27'),(1669,15,'Difusión de Prensa','Registro Número: 16. Fecha de Creación: 2015-06-25 13:46:06. Datos: Demostraciones dirigido a: Empresarios','Eliminación','2015-06-30 13:44:27'),(1670,15,'Idiomas','Nombre del usuario: joel valdivia ramirez','Creación','2015-06-30 13:44:27'),(1671,15,'Idiomas','Registro Número: 41. Fecha de Creación: 2015-06-22 16:14:27. Datos: Checo','Eliminación','2015-06-30 13:44:27'),(1672,15,'Certificaciones por Concejos Médicos','Fecha: 2015-06-25 15:08:04. Datos: Día de Inicio: 2015-06-24.','Creación','2015-06-30 13:44:27'),(1673,15,'Certificaciones por Concejos Médicos','Registro Número: 9','Modificación','2015-06-30 13:44:27'),(1674,15,'Certificaciones por Concejos Médicos','Registro Número: 15. Fecha de Creación: 2015-06-25 15:08:03. Datos: Folio 231221, Especialidad: Comunicación','Eliminación','2015-06-30 13:44:27'),(1675,15,'Tésis Dirigidas','Fecha: 2015-06-25 15:08:50. Datos: Título: yeahh. Autor: joina.','Creación','2015-06-30 13:44:27'),(1676,15,'Tésis Dirigidas','Registro Número: 22','Modificación','2015-06-30 13:44:27'),(1677,15,'Tésis Dirigidas','Registro Número: 16. Fecha de Creación: 2015-06-22 11:46:23. Datos: Título: simon. Autor: dasdas.','Eliminación','2015-06-30 13:44:27'),(1678,15,'Participación en Congresos','Fecha: 2015-06-25 15:09:34. Datos: Puesto: ese. Congreso: no.','Creación','2015-06-30 13:44:27'),(1679,15,'Participación en Congresos','Registro Número: 74. Fecha de Creación: 2015-06-22 14:25:26. Datos: Mi participación. Congreso: ese mero','Eliminación','2015-06-30 13:44:27'),(1680,15,'Participación en Congresos','Registro Número: 79','Modificación','2015-06-30 13:44:27'),(1681,17,'Graduados de Posgrado','Nombre del Graduado: Ricardo el chido','Creación','2015-06-30 13:44:27'),(1682,15,'Capítulos de Libros','Fecha: 2015-06-25 15:10:35. Datos: Titulo: ssss','Creación','2015-06-30 13:44:27'),(1683,17,'Graduados de Posgrado','Nombre del Graduado: Ricardo Porfirio Tapia Cervantes','Creación','2015-06-30 13:44:27'),(1684,15,'Capítulos de Libros','Registro Número: 18','Modificación','2015-06-30 13:44:27'),(1685,15,'Capítulos de Libros','Registro Número: 1. Fecha de Creación: 2015-06-22 14:17:19. Datos: sdada','Eliminación','2015-06-30 13:44:27'),(1686,15,'Capítulos de Libros','Registro Número: 15. Fecha de Creación: 2015-06-24 13:00:26. Datos: nuevo capitulo','Eliminación','2015-06-30 13:44:27'),(1687,15,'Capítulos de Libros','Registro Número: 1. Fecha de Creación: 2015-06-22 14:17:19. Datos: sdada','Eliminación','2015-06-30 13:44:27'),(1688,15,'Libros','Fecha: 2015-06-25 15:12:41. Datos: Titulo: no','Creación','2015-06-30 13:44:27'),(1689,15,'Libros','Registro Número: 7','Modificación','2015-06-30 13:44:27'),(1690,15,'Libros','Registro Número: 7. Fecha de Creación: 2015-06-25 15:12:41. Datos: no','Eliminación','2015-06-30 13:44:27'),(1691,15,'Libros','Registro Número: 6. Fecha de Creación: 2015-06-25 15:05:20. Datos: Edicion','Eliminación','2015-06-30 13:44:27'),(1692,15,'Artículos y Guías','Fecha: 2015-06-25 15:13:31. Datos: Titulo: rwer','Creación','2015-06-30 13:44:27'),(1693,15,'Artículos y Guías','Número Registro: 35','Modificación','2015-06-30 13:44:27'),(1694,15,'Artículos y Guías','Registro Número: 35. Fecha de Creación: 2015-06-25 15:13:31.','Eliminación','2015-06-30 13:44:27'),(1695,15,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1696,15,'Propiedad Intelectual','Subsección: Software. Número Registro: 65','Modificación','2015-06-30 13:44:27'),(1697,15,'Propiedad Intelectual','Subsección: Software. Registro Número: 65. Fecha de Creación: 2015-06-25 15:14:43.','Eliminación','2015-06-30 13:44:27'),(1698,15,'Propiedad Intelectual','Subsección Derechos de Autor','Creación','2015-06-30 13:44:27'),(1699,15,'Propiedad Intelectual','Subsección Derechos de Autor. Registro Número: 20','Modificación','2015-06-30 13:44:27'),(1700,15,'Propiedad Intelectual','Subsección Derechos de Autor. Registro Número: 20','Modificación','2015-06-30 13:44:27'),(1701,15,'Propiedad Intelectual','Subsección Derechos de Autor. Registro Número: 20','Modificación','2015-06-30 13:44:27'),(1702,15,'Propiedad Intelectual','Subsección Derechos de Autor. Registro Número: 20. Fecha de Creación: 2015-06-25 15:15:27. Datos: Autor. Título : dfa','Eliminación','2015-06-30 13:44:27'),(1703,15,'Propiedad Intelectual','Subsección Patentes. Registro Número: 9. Fecha de Creación: 2015-06-19 18:53:12. Datos: Inventor. Estado de Patente: En trámite','Eliminación','2015-06-30 13:44:27'),(1704,15,'Propiedad Intelectual','Subsección Patentes. Registro Número: 12. Fecha de Creación: 2015-06-22 15:28:58. Datos: Coinventor. Estado de Patente: En explotación comercial','Eliminación','2015-06-30 13:44:27'),(1705,15,'Propiedad Intelectual','Subsección Patentes','Creación','2015-06-30 13:44:27'),(1706,15,'Propiedad Intelectual','Subsección Patentes. Registro Número: 14','Modificación','2015-06-30 13:44:27'),(1707,15,'Propiedad Intelectual','Subsección Patentes. Registro Número: 13. Fecha de Creación: 2015-06-22 16:18:35. Datos: Inventor. Estado de Patente: En explotación comercial','Eliminación','2015-06-30 13:44:27'),(1708,15,'Aplicación del Conocimiento','Registro Número: 7. Fecha de Creación: 2015-06-22 13:18:26.','Eliminación','2015-06-30 13:44:27'),(1709,1,'Login','Usuario: investigador@live.com','Ingresó','2015-06-30 13:44:27'),(1710,1,'Cuenta','Subsección: Cambio Email.','Modificación','2015-06-30 13:44:27'),(1711,1,'Login','Usuario: valdivia@blackkandekker.com','Ingresó','2015-06-30 13:44:27'),(1712,17,'Aplicación del Conocimiento',': ','Creación','2015-06-30 13:44:27'),(1713,17,'Aplicación del Conocimiento','Registro Número: 9.','Modificación','2015-06-30 13:44:27'),(1714,17,'Aplicación del Conocimiento','Registro Número: 9. Fecha de Creación: 2015-06-25 15:27:20.','Eliminación','2015-06-30 13:44:27'),(1715,17,'Idiomas','Nombre del usuario: Juan Perez Orozco','Creación','2015-06-30 13:44:27'),(1716,17,'Idiomas','Nombre del usuario: Juan Perez Orozco','Creación','2015-06-30 13:44:27'),(1717,17,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1718,17,'Artículos y Guías','Fecha: 2015-06-25 15:54:44. Datos: Titulo: 9797','Creación','2015-06-30 13:44:27'),(1719,17,'Artículos y Guías','Número Registro: 36','Modificación','2015-06-30 13:44:27'),(1720,17,'Artículos y Guías','Registro Número: 36. Fecha de Creación: 2015-06-25 15:54:44.','Eliminación','2015-06-30 13:44:27'),(1721,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1722,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1723,2,'Login','Usuario: Jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1724,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2015-06-30 13:44:27'),(1725,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2015-06-30 13:44:27'),(1726,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1727,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2015-06-30 13:44:27'),(1728,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1729,2,'Libros','Fecha: 2015-06-25 18:53:06. Datos: Titulo: LOOO','Creación','2015-06-30 13:44:27'),(1730,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1731,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1732,2,'Capítulos de Libros','Fecha: 2015-06-26 09:14:52. Datos: Titulo: sdsfdsfds','Creación','2015-06-30 13:44:27'),(1733,2,'Capítulos de Libros','Registro Número: 19','Modificación','2015-06-30 13:44:27'),(1734,2,'Capítulos de Libros','Fecha: 2015-06-26 09:20:19. Datos: Titulo: algo del porfirio','Creación','2015-06-30 13:44:27'),(1735,2,'Tésis Dirigidas','Fecha: 2015-06-26 09:31:11. Datos: Título: Alguna tesis dirigida. Autor: alguin conocido.','Creación','2015-06-30 13:44:27'),(1736,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1737,14,'Login','Usuario: sergio@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1738,15,'Curriculum Vitae','Subsección Documentos Oficiales. Se subió Acta','Creación','2015-06-30 13:44:27'),(1739,15,'Curriculum Vitae.','Subsección Documentos Oficiales. Registro Número: 7. Datos: Acta.','Eliminación','2015-06-30 13:44:27'),(1740,15,'Curriculum Vitae','Subsección Documentos Oficiales. Se subió Acta','Creación','2015-06-30 13:44:27'),(1741,2,'Capítulos de Libros','Fecha: 2015-06-26 13:25:13. Datos: Titulo: sadsadsadsadsadsadasdas','Creación','2015-06-30 13:44:27'),(1742,2,'Capítulos de Libros','Registro Número: 12. Fecha de Creación: 2015-06-23 15:48:42. Datos: xzcc','Eliminación','2015-06-30 13:44:27'),(1743,15,'Curriculum Vitae','Subsección Datos de Dirección Actual. Número Registro: 18','Modificación','2015-06-30 13:44:27'),(1744,2,'Capítulos de Libros','Registro Número: 21','Modificación','2015-06-30 13:44:27'),(1745,2,'Capítulos de Libros','Registro Número: 21. Fecha de Creación: 2015-06-26 13:25:14. Datos: sadsadsadsadsadsadasdas','Eliminación','2015-06-30 13:44:27'),(1746,2,'Artículos y Guías','Fecha: 2015-06-26 13:51:43. Datos: Titulo: 9','Creación','2015-06-30 13:44:27'),(1747,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1748,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1749,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 67. Fecha de Creación: 2015-06-26 16:10:41.','Eliminación','2015-06-30 13:44:27'),(1750,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 63. Fecha de Creación: 2015-06-25 14:03:30.','Eliminación','2015-06-30 13:44:27'),(1751,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-06-30 13:44:27'),(1752,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-06-30 13:44:27'),(1753,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 62. Fecha de Creación: 2015-06-25 14:01:26.','Eliminación','2015-06-30 13:44:27'),(1754,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 64. Fecha de Creación: 2015-06-25 14:04:03.','Eliminación','2015-06-30 13:44:27'),(1755,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1756,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1757,2,'Capítulos de Libros','Fecha: 2015-06-27 10:16:03. Datos: Titulo: El capitulo','Creación','2015-06-30 13:44:27'),(1758,2,'Capítulos de Libros','Registro Número: 21','Modificación','2015-06-30 13:44:27'),(1759,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1760,2,'Capítulos de Libros','Fecha: 2015-06-27 10:31:45. Datos: Titulo: dsdfsdf','Creación','2015-06-30 13:44:27'),(1761,2,'Capítulos de Libros','Registro Número: 17. Fecha de Creación: 2015-06-25 09:16:38. Datos: Prueba combos','Eliminación','2015-06-30 13:44:27'),(1762,2,'Capítulos de Libros','Registro Número: 21. Fecha de Creación: 2015-06-27 10:16:03. Datos: El capitulo','Eliminación','2015-06-30 13:44:27'),(1763,2,'Capítulos de Libros','Registro Número: 11. Fecha de Creación: 2015-06-23 15:43:11. Datos: Dante','Eliminación','2015-06-30 13:44:27'),(1764,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1765,2,'Capítulos de Libros','Registro Número: 22. Fecha de Creación: 2015-06-27 10:31:46. Datos: dsdfsdf','Eliminación','2015-06-30 13:44:27'),(1766,2,'Capítulos de Libros','Registro Número: 6. Fecha de Creación: 2015-06-23 12:51:24. Datos: Algun capitulo','Eliminación','2015-06-30 13:44:27'),(1767,2,'Capítulos de Libros','Registro Número: 20. Fecha de Creación: 2015-06-26 09:20:20. Datos: algo del porfirio','Eliminación','2015-06-30 13:44:27'),(1768,2,'Capítulos de Libros','Registro Número: 19. Fecha de Creación: 2015-06-26 09:14:53. Datos: algo del jona','Eliminación','2015-06-30 13:44:27'),(1769,2,'Capítulos de Libros','Registro Número: 7. Fecha de Creación: 2015-06-23 12:52:56. Datos: Arreglos Unidimensionales','Eliminación','2015-06-30 13:44:27'),(1770,2,'Capítulos de Libros','Registro Número: 11. Fecha de Creación: 2015-06-23 15:43:11. Datos: Dante','Eliminación','2015-06-30 13:44:27'),(1771,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-06-30 13:44:27'),(1772,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1773,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1774,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1775,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:21:52. Datos: Título: sd´ghcfhjklñsd. Autor: yo mero.','Creación','2015-06-30 13:44:27'),(1776,2,'Tésis Dirigidas','Registro Número: 24. Fecha de Creación: 2015-06-29 09:21:53. Datos: Título: sd´ghcfhjklñsd. Autor: yo mero.','Eliminación','2015-06-30 13:44:27'),(1777,2,'Tésis Dirigidas','Registro Número: 21. Fecha de Creación: 2015-06-23 14:58:52. Datos: Título: Como ignorar a ismael. Autor: El porfirio.','Eliminación','2015-06-30 13:44:27'),(1778,2,'Tésis Dirigidas','Registro Número: 20. Fecha de Creación: 2015-06-23 14:49:40. Datos: Título: asdasd. Autor: asdsadsadsad.','Eliminación','2015-06-30 13:44:27'),(1779,2,'Tésis Dirigidas','Registro Número: 23. Fecha de Creación: 2015-06-26 09:31:12. Datos: Título: Alguna tesis dirigida. Autor: alguin conocido.','Eliminación','2015-06-30 13:44:27'),(1780,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:24:13. Datos: Título: Alguan. Autor: Puede que no sea alguien.','Creación','2015-06-30 13:44:27'),(1781,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:38:02. Datos: Título: dssafdfdsdsf. Autor: dsfdsfdsfdsf.','Creación','2015-06-30 13:44:27'),(1782,2,'Tésis Dirigidas','Registro Número: 26. Fecha de Creación: 2015-06-29 09:38:03. Datos: Título: dssafdfdsdsf. Autor: dsfdsfdsfdsf.','Eliminación','2015-06-30 13:44:27'),(1783,2,'Tésis Dirigidas','Registro Número: 25. Fecha de Creación: 2015-06-29 09:24:14. Datos: Título: Alguan. Autor: Puede que no sea alguien.','Eliminación','2015-06-30 13:44:27'),(1784,2,'Capítulos de Libros','Fecha: 2015-06-29 09:46:20. Datos: Titulo: EL porfirio biendo una muchacha','Creación','2015-06-30 13:44:27'),(1785,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:47:58. Datos: Título: isyuadyfgshad. Autor: saddasasasds.','Creación','2015-06-30 13:44:27'),(1786,2,'Tésis Dirigidas','Registro Número: 27. Fecha de Creación: 2015-06-29 09:47:59. Datos: Título: isyuadyfgshad. Autor: saddasasasds.','Eliminación','2015-06-30 13:44:27'),(1787,2,'Tésis Dirigidas','Registro Número: 19. Fecha de Creación: 2015-06-23 14:45:46. Datos: Título: Administración de usuarios en la escuela. Autor: Silva Delgado Joaquin.','Eliminación','2015-06-30 13:44:27'),(1788,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1789,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:53:11. Datos: Título: La directed_thesis. Autor: Yo.','Creación','2015-06-30 13:44:27'),(1790,2,'Tésis Dirigidas','Fecha: 2015-06-29 09:56:31. Datos: Título: tesis. Autor: jo.','Creación','2015-06-30 13:44:27'),(1791,2,'Tésis Dirigidas','Fecha: 2015-06-29 10:07:45. Datos: Título: Al titulo. Autor: Jona.','Creación','2015-06-30 13:44:27'),(1792,2,'Tésis Dirigidas','Registro Número: 29. Fecha de Creación: 2015-06-29 09:56:32. Datos: Título: tesis. Autor: jo.','Eliminación','2015-06-30 13:44:27'),(1793,2,'Tésis Dirigidas','Registro Número: 28. Fecha de Creación: 2015-06-29 09:53:13. Datos: Título: La directed_thesis. Autor: Yo.','Eliminación','2015-06-30 13:44:27'),(1794,2,'Tésis Dirigidas','Registro Número: 30. Fecha de Creación: 2015-06-29 10:07:46. Datos: Título: Al titulo. Autor: Jona.','Eliminación','2015-06-30 13:44:27'),(1795,2,'Tésis Dirigidas','Fecha: 2015-06-29 10:10:32. Datos: Título: el titulo . Autor: asdsadas.','Creación','2015-06-30 13:44:27'),(1796,2,'Tésis Dirigidas','Registro Número: 31','Modificación','2015-06-30 13:44:27'),(1797,2,'Capítulos de Libros','Fecha: 2015-06-29 10:15:45. Datos: Titulo: sdadasdsadas','Creación','2015-06-30 13:44:27'),(1798,2,'Capítulos de Libros','Fecha: 2015-06-29 10:17:01. Datos: Titulo: dfsdbfdbsfjhsbdjfbdsjhfbdjshbfds','Creación','2015-06-30 13:44:27'),(1799,2,'Capítulos de Libros','Registro Número: 2. Fecha de Creación: 2015-06-29 10:15:46. Datos: sdadasdsadas','Eliminación','2015-06-30 13:44:27'),(1800,2,'Capítulos de Libros','Registro Número: 1. Fecha de Creación: 2015-06-29 09:46:21. Datos: EL porfirio biendo una muchacha','Eliminación','2015-06-30 13:44:27'),(1801,2,'Capítulos de Libros','Registro Número: 3. Fecha de Creación: 2015-06-29 10:17:02. Datos: dfsdbfdbsfjhsbdjfbdsjhfbdjshbfds','Eliminación','2015-06-30 13:44:27'),(1802,2,'Capítulos de Libros','Fecha: 2015-06-29 10:21:23. Datos: Titulo: Arreglos Bidimensionales','Creación','2015-06-30 13:44:27'),(1803,2,'Capítulos de Libros','Registro Número: 4','Modificación','2015-06-30 13:44:27'),(1804,2,'Capítulos de Libros','Registro Número: 4','Modificación','2015-06-30 13:44:27'),(1805,2,'Capítulos de Libros','Registro Número: 4. Fecha de Creación: 2015-06-29 10:21:24. Datos: Arreglos Bidimensionales','Eliminación','2015-06-30 13:44:27'),(1806,2,'Tésis Dirigidas','Registro Número: 31. Fecha de Creación: 2015-06-29 10:10:33. Datos: Título: el titulo . Autor: asdsadas.','Eliminación','2015-06-30 13:44:27'),(1807,2,'Tésis Dirigidas','Fecha: 2015-06-29 10:27:09. Datos: Título: dsfdsfdsfdsfds. Autor: dsfdsfdsfdsfdsfsd.','Creación','2015-06-30 13:44:27'),(1808,2,'Tésis Dirigidas','Registro Número: 32','Modificación','2015-06-30 13:44:27'),(1809,2,'Tésis Dirigidas','Registro Número: 32. Fecha de Creación: 2015-06-29 10:27:10. Datos: Título: Evolicion en el medio ambiente. Autor: yo.','Eliminación','2015-06-30 13:44:27'),(1810,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1811,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1812,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1813,17,'Login','Usuario: algo@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1814,17,'Curriculum Vitae','Subsección Datos Personales. Registro Número 15','Modificación','2015-06-30 13:44:27'),(1815,17,'Capítulos de Libros','Fecha: 2015-06-29 12:09:12. Datos: Titulo: dsadsadasd','Creación','2015-06-30 13:44:27'),(1816,17,'Capítulos de Libros','Registro Número: 5','Modificación','2015-06-30 13:44:27'),(1817,17,'Capítulos de Libros','Fecha: 2015-06-29 12:15:14. Datos: Titulo: q','Creación','2015-06-30 13:44:27'),(1818,17,'Capítulos de Libros','Registro Número: 6','Modificación','2015-06-30 13:44:27'),(1819,17,'Capítulos de Libros','Registro Número: 6. Fecha de Creación: 2015-06-29 12:15:14. Datos: q','Eliminación','2015-06-30 13:44:27'),(1820,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1821,17,'Capítulos de Libros','Registro Número: 5. Fecha de Creación: 2015-06-29 12:09:12. Datos: dsadsadasd','Eliminación','2015-06-30 13:44:27'),(1822,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1823,17,'Tésis Dirigidas','Fecha: 2015-06-29 12:22:10. Datos: Título: j. Autor: j.','Creación','2015-06-30 13:44:27'),(1824,17,'Tésis Dirigidas','Registro Número: 33. Fecha de Creación: 2015-06-29 12:22:11. Datos: Título: j. Autor: j.','Eliminación','2015-06-30 13:44:27'),(1825,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1826,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1827,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1828,1,'Curriculum Vitae','Subsección Datos Personales. Registro Número 5','Modificación','2015-06-30 13:44:27'),(1829,1,'Curriculum Vitae','Subsección Datos Personales. Registro Número 5','Modificación','2015-06-30 13:44:27'),(1830,1,'Curriculum Vitae','Subsección Datos Personales. Registro Número 5','Modificación','2015-06-30 13:44:27'),(1831,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2015-06-30 13:44:27'),(1832,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1833,4,'Logout','Usuario: Ricardo Porfirio  Tapia  Cervantes ','Cerró Sesión','2015-06-30 13:44:27'),(1834,17,'Login','Usuario: algo@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1835,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2015-06-30 13:44:27'),(1836,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1837,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-06-30 13:44:27'),(1838,15,'Login','Usuario: joel@mail.com','Ingresó','2015-06-30 13:44:27'),(1839,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 13:44:27'),(1840,15,'Curriculum Vitae','Subsección Datos Personales. Registro Número 14','Modificación','2015-06-30 13:44:27'),(1841,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1842,4,'Logout','Usuario: Ricardo Porfirio  Tapia  Cervantes ','Cerró Sesión','2014-03-01 01:00:05'),(1843,17,'Login','Usuario: algo@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1844,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2014-03-01 01:00:05'),(1845,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1846,4,'Empresas','Subsección: Datos de Empresa. Registro Número 4','Modificación','2014-03-01 01:00:05'),(1847,4,'Logout','Usuario: Ricardo Porfirio  Tapia  Cervantes ','Cerró Sesión','2014-03-01 01:00:05'),(1848,17,'Login','Usuario: algo@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1849,17,'Curriculum Vitae','Subsección Datos Personales. Registro Número 15','Modificación','2014-03-01 01:00:05'),(1850,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1851,4,'Logout','Usuario: Ricardo Porfirio  Tapia  Cervantes ','Cerró Sesión','2014-03-01 01:00:05'),(1852,17,'Login','Usuario: algo@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1853,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2014-03-01 01:00:05'),(1854,17,'Logout','Usuario: Juan Perez Orozco','Cerró Sesión','2014-03-01 01:00:05'),(1855,17,'Login','Usuario: algo@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1856,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1857,17,'Login','Usuario: algo@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1858,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1859,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1860,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1861,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2014-03-01 01:00:05'),(1862,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1863,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1864,15,'Login','Usuario: joel@mail.com','Ingresó','2014-03-01 01:00:05'),(1865,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2014-03-01 01:00:05'),(1866,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2014-03-01 01:00:05'),(1867,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1868,4,'Login','Usuario: mayonesa@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1869,15,'Login','Usuario: joel@mail.com','Ingresó','2014-03-01 01:00:05'),(1871,17,'Propiedad Intelectual','Subsección Patentes','Creación','2014-03-01 01:00:05'),(1872,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1873,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1874,1,'Logout','Usuario: Inv. investigador Segura 3 Lopez','Cerró Sesión','2014-03-01 01:00:05'),(1875,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1876,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1877,2,'Curriculum Vitae','Subsección Documentos Oficiales. Se subió Acta','Creación','2014-03-01 01:00:05'),(1878,2,'Curriculum Vitae','Subsección Datos de Contacto. Teléfono','Creación','2014-03-01 01:00:05'),(1879,17,'Propiedad Intelectual','Subsección Patentes','Creación','2014-03-01 01:00:05'),(1880,14,'Login','Usuario: sergio@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1881,2,'Curriculum Vitae','Subsección Formación Académica.','Creación','2014-03-01 01:00:05'),(1882,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2014-03-01 01:00:05'),(1883,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1884,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2014-03-01 01:00:05'),(1885,2,'Artículos y Guías','Fecha: 2015-06-30 16:55:29. Datos: Titulo: estrategias de LOL','Creación','2015-06-30 16:55:29'),(1886,2,'Artículos y Guías','Registro Número: 34. Fecha de Creación: 2015-06-25 13:13:35.','Eliminación','2015-06-30 16:56:47'),(1887,2,'Artículos y Guías','Registro Número: 32. Fecha de Creación: 2015-06-25 12:57:57.','Eliminación','2015-06-30 16:56:52'),(1888,2,'Artículos y Guías','Registro Número: 36. Fecha de Creación: 2015-06-30 16:55:29.','Eliminación','2015-06-30 16:56:55'),(1889,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-06-30 16:56:58'),(1890,2,'Artículos y Guías','Registro Número: 33. Fecha de Creación: 2015-06-25 13:08:09.','Eliminación','2015-06-30 16:57:02'),(1891,2,'Artículos y Guías','Registro Número: 31. Fecha de Creación: 2015-06-25 12:48:34.','Eliminación','2015-06-30 16:57:05'),(1892,2,'Artículos y Guías','Registro Número: 35. Fecha de Creación: 2015-06-26 13:51:43.','Eliminación','2015-06-30 16:57:08'),(1893,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-06-30 16:57:12'),(1894,2,'Artículos y Guías','Fecha: 2015-06-30 17:20:46. Datos: Titulo: Guia Pokemon','Creación','2015-06-30 17:20:46'),(1895,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-06-30 17:29:09'),(1896,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 09:10:43'),(1897,15,'Login','Usuario: joel@mail.com','Ingresó','2015-07-01 10:09:32'),(1898,14,'Login','Usuario: sergio@hotmail.com','Ingresó','2015-07-01 11:08:46'),(1899,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 11:15:13'),(1900,2,'Artículos y Guías','Fecha: 2015-07-01 11:18:39. Datos: Titulo: No lo se ','Creación','2015-07-01 11:18:39'),(1901,15,'Logout','Usuario: joel valdivia ramirez','Cerró Sesión','2015-07-01 13:22:56'),(1902,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 13:23:10'),(1903,2,'Capítulos de Libros','Fecha: 2015-07-01 13:29:43. Datos: Titulo: Arreglos Bidimensionales','Creación','2015-07-01 13:29:43'),(1904,2,'Capítulos de Libros','Registro Número: 1. Fecha de Creación: 2015-07-01 13:29:42. Datos: Arreglos Bidimensionales','Eliminación','2015-07-01 13:29:53'),(1905,2,'Capítulos de Libros','Fecha: 2015-07-01 13:31:24. Datos: Titulo: Arreglos Bidimensionales','Creación','2015-07-01 13:31:24'),(1906,2,'Capítulos de Libros','Fecha: 2015-07-01 13:33:08. Datos: Titulo: EL zorro ','Creación','2015-07-01 13:33:08'),(1907,15,'Login','Usuario: joel@mail.com','Ingresó','2015-07-01 14:01:45'),(1908,15,'Login','Usuario: joel@mail.com','Ingresó','2015-07-01 14:03:02'),(1909,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 14:05:57'),(1910,2,'Libros','Fecha: 2015-07-01 14:39:50. Datos: Titulo: Que esta pensando jona ','Creación','2015-07-01 14:39:50'),(1911,2,'Artículos y Guías','Fecha: 2015-07-01 14:55:39. Datos: Titulo: No lo se','Creación','2015-07-01 14:55:39'),(1912,2,'Artículos y Guías','Fecha: 2015-07-01 14:58:09. Datos: Titulo: No lo se','Creación','2015-07-01 14:58:09'),(1913,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-07-01 14:58:40'),(1914,2,'Artículos y Guías','Registro Número: 40. Fecha de Creación: 2015-07-01 14:58:08.','Eliminación','2015-07-01 14:58:43'),(1915,2,'Artículos y Guías','Registro Número: 38. Fecha de Creación: 2014-05-04 00:00:00.','Eliminación','2015-07-01 14:58:46'),(1916,2,'Artículos y Guías','Registro Número: 39. Fecha de Creación: 2015-07-01 14:55:39.','Eliminación','2015-07-01 14:58:50'),(1917,2,'Artículos y Guías','Registro Número: 37. Fecha de Creación: 2015-06-30 17:20:46.','Eliminación','2015-07-01 14:58:53'),(1918,2,'Artículos y Guías','Registro Número: 32. Fecha de Creación: 2015-06-25 12:57:57.','Eliminación','2015-07-01 14:59:05'),(1919,2,'Artículos y Guías','Registro Número: 34. Fecha de Creación: 2015-06-25 13:13:35.','Eliminación','2015-07-01 14:59:08'),(1920,2,'Artículos y Guías','Registro Número: 32. Fecha de Creación: 2015-06-25 12:57:57.','Eliminación','2015-07-01 15:00:55'),(1921,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-07-01 15:00:59'),(1922,2,'Artículos y Guías','Fecha: 2015-07-01 15:02:07. Datos: Titulo: No','Creación','2015-07-01 15:02:07'),(1923,2,'Artículos y Guías','Fecha: 2015-07-01 15:03:49. Datos: Titulo: No','Creación','2015-07-01 15:03:49'),(1924,2,'Artículos y Guías','Registro Número: 41. Fecha de Creación: 2015-07-01 15:02:07.','Eliminación','2015-07-01 15:04:32'),(1925,2,'Artículos y Guías','Número Registro: 42','Modificación','2015-07-01 15:24:46'),(1926,2,'Capítulos de Libros','Fecha: 2015-07-01 16:23:37. Datos: Titulo: PPP','Creación','2015-07-01 16:23:37'),(1927,2,'Capítulos de Libros','Fecha: 2015-07-01 16:25:43. Datos: Titulo: fracciones ','Creación','2015-07-01 16:25:43'),(1928,2,'Capítulos de Libros','Registro Número: 4. Fecha de Creación: 2015-07-01 16:23:37. Datos: PPP','Eliminación','2015-07-01 16:26:21'),(1929,2,'Capítulos de Libros','Registro Número: 5','Modificación','2015-07-01 16:52:51'),(1930,2,'Capítulos de Libros','Registro Número: 5','Modificación','2015-07-01 16:53:53'),(1931,15,'Login','Usuario: joel@mail.com','Ingresó','2015-07-01 17:15:40'),(1932,2,'Tésis Dirigidas','Fecha: 2015-07-01 17:49:48. Datos: Título: No se . Autor: Ricardo.','Creación','2015-07-01 17:49:48'),(1933,2,'Tésis Dirigidas','Registro Número: 23','Modificación','2015-07-01 17:51:56'),(1934,2,'Tésis Dirigidas','Fecha: 2015-07-01 17:59:09. Datos: Título: qqq. Autor: Ricardo.','Creación','2015-07-01 17:59:09'),(1935,2,'Tésis Dirigidas','Registro Número: 23. Fecha de Creación: 2015-07-01 17:49:48. Datos: Título: El jona. Autor: Jona .','Eliminación','2015-07-01 18:06:24'),(1936,2,'Tésis Dirigidas','Registro Número: 24. Fecha de Creación: 2015-07-01 17:59:09. Datos: Título: qqq. Autor: Ricardo.','Eliminación','2015-07-01 18:06:27'),(1937,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 18:08:30'),(1938,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-01 18:10:29'),(1939,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-01 18:57:08'),(1940,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 18:57:21'),(1941,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-01 19:03:01'),(1942,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 19:03:12'),(1943,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-01 19:15:28'),(1944,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-01 19:15:42'),(1945,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-02 08:54:19'),(1946,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 08:54:37'),(1947,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 09:16:37'),(1948,2,'Idiomas','Numero de registro: 45','Creación','2015-07-02 09:21:03'),(1949,2,'Idiomas','Registro Número: 45. Fecha de Creación: 2015-07-02 09:16:37. Datos: Bieloruso','Eliminación','2015-07-02 09:23:03'),(1950,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 09:25:14'),(1951,2,'Idiomas','Numero de registro: 34','Creación','2015-07-02 09:43:37'),(1952,2,'Idiomas','Numero de registro: 34','Creación','2015-07-02 09:51:06'),(1953,2,'Idiomas','Registro Número: 33. Fecha de Creación: 2015-06-19 17:31:52. Datos: Albanés','Eliminación','2015-07-02 10:03:40'),(1954,2,'Idiomas','Registro Número: 34. Fecha de Creación: 2015-06-19 17:32:07. Datos: Amharico','Eliminación','2015-07-02 10:03:42'),(1955,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 10:04:29'),(1956,2,'Idiomas','Registro Número: 46. Fecha de Creación: 2015-07-02 10:04:29. Datos: Armenio','Eliminación','2015-07-02 10:06:31'),(1957,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-02 10:06:49'),(1958,17,'Login','Usuario: algo@hotmail.com','Ingresó','2015-07-02 10:07:01'),(1959,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 10:07:09'),(1960,2,'Idiomas','Registro Número: 47. Fecha de Creación: 2015-07-02 10:07:09. Datos: Arabe','Eliminación','2015-07-02 10:08:08'),(1961,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-02 10:12:34'),(1962,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-07-02 10:25:34'),(1963,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 70','Modificación','2015-07-02 10:30:25'),(1964,15,'Login','Usuario: joel@mail.com','Ingresó','2015-07-02 10:31:28'),(1965,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 70','Modificación','2015-07-02 10:33:47'),(1966,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 10:34:07'),(1967,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 70','Modificación','2015-07-02 10:35:02'),(1968,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 10:35:49'),(1969,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-02 10:40:19'),(1970,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-07-02 10:41:22'),(1971,2,'Artículos y Guías','Registro Número: 42. Fecha de Creación: 2015-07-01 15:03:49.','Eliminación','2015-07-02 10:41:25'),(1972,2,'Artículos y Guías','Registro Número: 32. Fecha de Creación: 2015-06-25 12:57:57.','Eliminación','2015-07-02 10:42:30'),(1973,2,'Artículos y Guías','Registro Número: 34. Fecha de Creación: 2015-06-25 13:13:35.','Eliminación','2015-07-02 10:42:34'),(1974,2,'Artículos y Guías','Fecha: 2015-07-02 10:44:35. Datos: Titulo: No lo se','Creación','2015-07-02 10:44:35'),(1975,25,'Login','Usuario: inv.cesar@hotmail.com','Ingresó','2015-07-02 10:44:56'),(1976,24,'Login','Usuario: empresa@hotmail.com','Ingresó','2015-07-02 10:45:20'),(1977,2,'Artículos y Guías','Registro Número: 43. Fecha de Creación: 2015-07-02 10:44:35.','Eliminación','2015-07-02 10:46:55'),(1978,2,'Artículos y Guías','Fecha: 2015-07-02 10:49:15. Datos: Titulo: o','Creación','2015-07-02 10:49:15'),(1979,2,'Artículos y Guías','Registro Número: 22. Fecha de Creación: 2015-06-19 19:18:13.','Eliminación','2015-07-02 10:51:41'),(1980,2,'Artículos y Guías','Registro Número: 44. Fecha de Creación: 2015-07-02 10:49:15.','Eliminación','2015-07-02 10:51:43'),(1981,2,'Artículos y Guías','Registro Número: 43. Fecha de Creación: 2015-07-02 10:44:35.','Eliminación','2015-07-02 10:51:45'),(1982,2,'Artículos y Guías','Registro Número: 32. Fecha de Creación: 2015-06-25 12:57:57.','Eliminación','2015-07-02 10:51:47'),(1983,2,'Artículos y Guías','Registro Número: 34. Fecha de Creación: 2015-06-25 13:13:35.','Eliminación','2015-07-02 10:51:48'),(1984,2,'Artículos y Guías','Fecha: 2015-07-02 10:53:23. Datos: Titulo: JOna','Creación','2015-07-02 10:53:23'),(1985,2,'Artículos y Guías','Número Registro: 45','Modificación','2015-07-02 10:54:33'),(1986,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-07-02 11:00:52'),(1987,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 45. Fecha de Creación: 2011-10-05 00:00:00.','Eliminación','2015-07-02 11:00:55'),(1988,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 70. Fecha de Creación: 2015-07-02 10:25:34.','Eliminación','2015-07-02 11:00:58'),(1989,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 11:01:00'),(1990,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 68. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 11:01:03'),(1991,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-07-02 11:02:44'),(1992,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 71. Fecha de Creación: 2015-07-02 11:02:44.','Eliminación','2015-07-02 11:03:06'),(1993,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 70. Fecha de Creación: 2015-07-02 10:25:34.','Eliminación','2015-07-02 11:09:16'),(1994,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 45. Fecha de Creación: 2011-10-05 00:00:00.','Eliminación','2015-07-02 11:11:53'),(1995,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-07-02 11:12:19'),(1996,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 11:12:34'),(1997,24,'Logout','Usuario: freeravens frz frz','Cerró Sesión','2015-07-02 11:34:16'),(1998,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 12:24:19'),(1999,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-07-02 12:24:22'),(2000,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 45. Fecha de Creación: 2011-10-05 00:00:00.','Eliminación','2015-07-02 12:24:37'),(2001,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 70. Fecha de Creación: 2015-07-02 10:25:34.','Eliminación','2015-07-02 12:24:40'),(2002,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 12:24:43'),(2003,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-07-02 12:24:46'),(2004,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 45. Fecha de Creación: 2011-10-05 00:00:00.','Eliminación','2015-07-02 12:25:47'),(2005,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 70. Fecha de Creación: 2015-07-02 10:25:34.','Eliminación','2015-07-02 12:25:48'),(2006,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 69. Fecha de Creación: 2015-02-02 00:00:00.','Eliminación','2015-07-02 12:25:50'),(2007,2,'Propiedad Intelectual','Subsección: Software. Registro Número: 43. Fecha de Creación: 2015-06-19 19:00:44.','Eliminación','2015-07-02 12:25:51'),(2008,25,'Curriculum Vitae','Subsección Dirección Actual','Creación','2015-07-02 12:28:17'),(2009,25,'Curriculum Vitae','Subsección Datos Personales. Registro Número 23','Modificación','2015-07-02 12:29:08'),(2010,24,'Login','Usuario: empresa@hotmail.com','Ingresó','2015-07-02 12:30:17'),(2011,26,'Login','Usuario: pruebauno@hotmail.com','Ingresó','2015-07-02 12:30:38'),(2012,2,'Libros','Fecha: 2015-07-02 12:33:24. Datos: Titulo: No lose ','Creación','2015-07-02 12:33:24'),(2013,2,'Libros','Registro Número: 10','Modificación','2015-07-02 12:37:13'),(2014,2,'Libros','Registro Número: 10','Modificación','2015-07-02 12:40:27'),(2015,2,'Libros','Registro Número: 10','Modificación','2015-07-02 12:43:30'),(2016,26,'Logout','Usuario: pruebauno divuh divuh','Cerró Sesión','2015-07-02 12:44:20'),(2017,24,'Logout','Usuario: freeravens frz frz','Cerró Sesión','2015-07-02 12:44:23'),(2018,26,'Login','Usuario: pruebauno@hotmail.com','Ingresó','2015-07-02 12:45:03'),(2019,26,'Logout','Usuario: Alberto divuh Flores Crescencio','Cerró Sesión','2015-07-02 12:47:21'),(2020,24,'Login','Usuario: empresa@hotmail.com','Ingresó','2015-07-02 12:47:28'),(2021,26,'Login','Usuario: divuh@hotmail.com','Ingresó','2015-07-02 12:47:38'),(2022,2,'Artículos y Guías','Fecha: 2015-07-02 12:47:55. Datos: Titulo: 2212','Creación','2015-07-02 12:47:55'),(2023,26,'Logout','Usuario: Alberto divuh Flores Crescencio','Cerró Sesión','2015-07-02 12:48:25'),(2024,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-07-02 12:48:43'),(2025,1,'Logout','Usuario: Inv. investigador Segura 3 Lopez','Cerró Sesión','2015-07-02 12:50:39'),(2026,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-07-02 12:50:56'),(2027,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 12:51:41'),(2028,2,'Artículos y Guías','Número Registro: 46','Modificación','2015-07-02 12:53:43'),(2029,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:17'),(2030,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:18'),(2031,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:18'),(2032,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:18'),(2033,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:18'),(2034,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:19'),(2035,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:19'),(2036,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:19'),(2037,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:19'),(2038,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:20'),(2039,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:20'),(2040,15,'Graduados de Posgrado','Nombre del Graduado: Juan','Creación','2015-07-02 12:57:20'),(2041,1,'Logout','Usuario: Inv. investigador Segura 3 Lopez','Cerró Sesión','2015-07-02 13:00:18'),(2042,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-07-02 13:01:28'),(2043,1,'Logout','Usuario: Inv. investigador Segura 3 Lopez','Cerró Sesión','2015-07-02 13:02:06'),(2044,26,'Login','Usuario: divuh@hotmail.com','Ingresó','2015-07-02 13:02:23'),(2045,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 13:06:40'),(2046,25,'Logout','Usuario: Cesar Arturo Chavez Marquez','Cerró Sesión','2015-07-02 13:07:00'),(2047,2,'Idiomas','Numero de registro: 45','Creación','2015-07-02 13:07:45'),(2048,25,'Login','Usuario: inv.cesar@hotmail.com','Ingresó','2015-07-02 13:08:34'),(2049,26,'Cuenta','Subsección: Cambio Email.','Modificación','2015-07-02 13:09:52'),(2050,1,'Login','Usuario: valdivia@hotmail.com','Ingresó','2015-07-02 13:10:25'),(2051,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 13:11:07'),(2052,2,'Idiomas','Nombre del usuario: Inv. jonathan Covarrubias Saldaña','Creación','2015-07-02 13:13:17'),(2053,2,'Idiomas','Numero de registro: 47','Creación','2015-07-02 13:14:41'),(2054,2,'Idiomas','Numero de registro: 47','Creación','2015-07-02 13:15:33'),(2055,1,'Cuenta','Subsección: Cambio Email.','Modificación','2015-07-02 13:19:02'),(2056,1,'Login','Usuario: valdivia@live.com','Ingresó','2015-07-02 13:21:35'),(2057,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-07-02 13:26:40'),(2058,2,'Propiedad Intelectual','Subsección: Software. Número Registro: 72','Modificación','2015-07-02 13:28:55'),(2059,2,'Propiedad Intelectual','Subsección: Software','Creación','2015-07-02 13:32:33'),(2060,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:53:41'),(2061,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:54:07'),(2062,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:54:47'),(2063,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:55:13'),(2064,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:55:14'),(2065,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:55:14'),(2066,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:55:14'),(2067,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:55:55'),(2068,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:57:17'),(2069,1,'Empresas','Se creo un nuevo registro','creacion','2015-07-02 13:57:12'),(2070,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 13:59:12'),(2071,2,'Capítulos de Libros','Fecha: 2015-07-02 14:17:30. Datos: Titulo: 1.1 Fracciones ','Creación','2015-07-02 14:17:30'),(2072,2,'Capítulos de Libros','Registro Número: 6','Modificación','2015-07-02 14:18:45'),(2073,2,'Capítulos de Libros','Fecha: 2015-07-02 14:27:54. Datos: Titulo: Susmas','Creación','2015-07-02 14:27:54'),(2074,2,'Capítulos de Libros','Registro Número: 7','Modificación','2015-07-02 14:29:07'),(2075,2,'Capítulos de Libros','Registro Número: 7','Modificación','2015-07-02 14:31:23'),(2076,2,'Tésis Dirigidas','Fecha: 2015-07-02 14:39:22. Datos: Título: Problemas de estres en el siglos XIX. Autor: Jona.','Creación','2015-07-02 14:39:22'),(2077,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 14:42:21'),(2078,1,'Empresas','Subsección: Datos de Empresa. Registro Número 3','Modificación','2015-07-02 14:43:23'),(2079,2,'Tésis Dirigidas','Registro Número: 25','Modificación','2015-07-02 14:51:57'),(2080,2,'Tésis Dirigidas','Registro Número: 25','Modificación','2015-07-02 14:56:26'),(2081,2,'Tésis Dirigidas','Registro Número: 25. Fecha de Creación: 2015-07-02 14:39:22. Datos: Título: Problemas de estres en el siglos XIX. Autor: Jona.','Eliminación','2015-07-02 14:56:38'),(2082,2,'Logout','Usuario: Inv. jonathan Covarrubias Saldaña','Cerró Sesión','2015-07-02 15:20:32'),(2083,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 15:22:27'),(2084,24,'Empresas','Subsección: Datos de Facturación','Creación','2015-07-02 16:13:00'),(2085,24,'Empresas','Se creo un nuevo registro','creacion','2015-07-02 16:12:58'),(2086,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 16:21:34'),(2087,2,'Login','Usuario: jonathan@hotmail.com','Ingresó','2015-07-02 16:23:37'),(2088,1,'Login','Usuario: valdivia@live.com','Ingresó','2015-07-02 16:24:05');
/*!40000 ALTER TABLE `system_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id autoincrementable',
  `id_roles` int(11) NOT NULL DEFAULT '1' COMMENT 'fk de tabla roles que guardara el tipo de rol',
  `email` varchar(100) NOT NULL COMMENT 'correo electronico',
  `password` varchar(200) NOT NULL COMMENT 'contrasena encriptada con doble encriptacion sha1 posterior a md5',
  `registration_date` datetime NOT NULL COMMENT 'la fecha y hora en que se registra el usuario',
  `activation_date` datetime NOT NULL COMMENT 'la fecha y hora en que el usuario activa su cuenta, por default 0000-00-00 00:00:00',
  `act_react_key` varchar(200) NOT NULL COMMENT 'guarda llave generada al momento cre crear el registro para su activación o en caso de necesitar recuperar la contraseña. creacion: sha1 md5 sha1 fechahoraactual + email + entero random entre 1000 a 5000',
  `status` varchar(15) NOT NULL DEFAULT 'inactivo' COMMENT '1 activo, 0 inactivo, por default 0 al momento de registrarse',
  `type` varchar(30) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol_idxv` (`id_roles`),
  CONSTRAINT `id_role` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'valdivia@live.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-02-20 00:00:00','2015-02-20 00:00:00','dsfdjksfbhd','activo','moral','2015-06-06 11:48:31'),(2,3,'jonathan@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-02-20 00:00:00','2015-02-20 00:00:00','4b3c2717517ae9b1c0ee4ad86cec93489ec68c4e','activo','fisico','2015-06-06 11:48:31'),(4,3,'mayonesa@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-02-20 00:00:00','2015-02-20 00:00:00','dsfdjksfbhd','activo','moral','2015-06-06 11:48:33'),(10,3,'investigador2@gmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-02-20 00:00:00','2015-02-20 00:00:00','dsfdjksfbhd','activo','fisico','2015-02-01 00:00:00'),(14,3,'sergio@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-09 17:52:19','0000-00-00 00:00:00','556c8e25be06f3486198270c40882b4fe3f82294','activo','fisico','2013-12-04 00:00:00'),(15,3,'joel@mail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-22 10:36:12','0000-00-00 00:00:00','c29a227cb6a1afc4059865b7e7b556f390c1d1c0','activo','fisico','2015-06-22 10:36:12'),(16,3,'alguien@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-02-20 00:00:00','2015-02-20 00:00:00','dsfdjksfbhd','activo','fisico','2015-06-22 12:22:19'),(17,3,'algo@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-22 12:26:18','0000-00-00 00:00:00','a1230742c768c7b886df6d28bc534993c00d8743','activo','fisico','2015-06-22 12:26:18'),(18,3,'ricardo.tapia@gmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-22 15:05:29','0000-00-00 00:00:00','1ed2a6c4899fc87d056aac7b4276a55d22daaa81','activo',NULL,'2015-06-22 15:05:29'),(19,3,'manuel.tapia@gmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-22 15:08:53','0000-00-00 00:00:00','32518a5e007a9da7f9596be6c616909854d4ff9c','activo',NULL,'2015-06-22 15:08:53'),(20,3,'porfirio@gmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-22 15:14:46','0000-00-00 00:00:00','9c730720a10138f473a14a1d241a2983ef5b9deb','activo',NULL,'2015-06-22 15:14:46'),(22,3,'joevl@mail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-25 18:12:28','0000-00-00 00:00:00','cb3312c4c1da19534c566a117e3d4d8cadd0aea4','activo',NULL,'2015-06-25 18:12:28'),(23,3,'joevla@mail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-06-25 18:13:50','0000-00-00 00:00:00','0d156ca0a9134274125159ad59ee73e5f87f7a6c','activo',NULL,'2015-06-25 18:13:50'),(24,3,'empresa@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 10:43:54','0000-00-00 00:00:00','bd441d68b3d8ee41928d47d72aa1e7d6ff90116a','activo','moral','2015-07-02 10:43:54'),(25,3,'inv.cesar@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 10:44:26','0000-00-00 00:00:00','f1ecced31d40fcef1c71be2471c61c27a7863d37','activo','fisico','2015-07-02 10:44:26'),(26,11,'divuh@live.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:47:04','0000-00-00 00:00:00','dfe11ba202262a821f13713e9e6a4b071ab249b4','activo','fisico','2015-07-02 11:47:04'),(27,12,'seuh@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:48:01','0000-00-00 00:00:00','7e84e014ec969d30efc8597c6e95f9203ea3ba8b','activo','fisico','2015-07-02 11:48:01'),(28,13,'cometi@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:48:59','0000-00-00 00:00:00','622de583cac068bde1660dda3e31c385fb6a9251','activo','fisico','2015-07-02 11:48:59'),(29,14,'combio@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:51:59','0000-00-00 00:00:00','d9a7a47925d281e477e733d364ab8b65c795a815','activo','fisico','2015-07-02 11:51:59'),(30,15,'cominv@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:53:09','0000-00-00 00:00:00','82a82ad0489170e5e63d1f8c29ef8922fe116e5c','activo','fisico','2015-07-02 11:53:09'),(31,16,'duh@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:54:09','0000-00-00 00:00:00','b7b35e3ad98189de7f01d50580b177be3bf8009a','activo','fisico','2015-07-02 11:54:09'),(32,17,'sgei@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:55:12','0000-00-00 00:00:00','1631c9c807a5df35299bf16505f3d3ecaad87604','activo','fisico','2015-07-02 11:55:12'),(33,18,'dg@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:56:00','0000-00-00 00:00:00','2e21851ec5fe78125257c8f01a437d0e93454c9f','activo','fisico','2015-07-02 11:56:00'),(34,19,'jiopd@hotmail.com','f6a51c155d95861c35febb700cb661b34f4a85b5','2015-07-02 11:57:26','0000-00-00 00:00:00','b030933687afec7dcdd6f57766de0b91abc41b07','activo','fisico','2015-07-02 11:57:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`192.168.1.34`*/ /*!50003 TRIGGER `sihci`.`users_BEFORE_INSERT` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.creation_date = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-02 16:53:58
