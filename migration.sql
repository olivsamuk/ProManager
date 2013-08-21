-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: promanager
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL,
  `insituicao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (37,'BPTran','Batalhão de Polícia de Trânsito do Amapá','2013-07-18 18:09:25',0),(38,'SEICOM','Secretaria de Estado da Indústria e Comércio','2013-07-22 16:13:10',0),(39,'SINDSEP','Sindicato dos Servidores Públicos Federais','2013-07-31 19:00:55',0),(40,'SEED','Secretaria de Estado da Educação do Amapá','2013-08-16 16:44:01',0);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `permissao` varchar(255) NOT NULL,
  `setor_id` int(11) NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES (1,'Samuel Silva de Oliveira','olivsamuk@gmail.com','e10adc3949ba59abbe56e057f20f883e','1',78,'2013-07-17 18:02:59'),(2,'Pedro Moutinho','','','',78,'2013-07-17 18:08:57'),(3,'Bruno Garcia','','','',78,'2013-07-17 18:09:03'),(4,'Marcio Brasil','','','',78,'2013-07-17 18:09:10'),(5,'Rafael Brito','','','',83,'2013-07-17 18:10:08'),(6,'Rodrigo Sebastiani','','','',83,'2013-07-17 18:25:00'),(7,'Vinicius','','','',83,'2013-07-17 18:25:07'),(8,'Jose Alipio Diniz Junior','alipio@prodap.ap.gov.br','e10adc3949ba59abbe56e057f20f883e','1',84,'2013-07-30 16:02:52');
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demandas`
--

DROP TABLE IF EXISTS `demandas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demandas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `rac_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `criado_em` datetime NOT NULL,
  `atualizado_em` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandas`
--

LOCK TABLES `demandas` WRITE;
/*!40000 ALTER TABLE `demandas` DISABLE KEYS */;
INSERT INTO `demandas` VALUES (9,'Criação do Layout','Criação de Layout com html e css',3,5,1,'2013-07-31 17:18:26','0000-00-00 00:00:00'),(10,'Agenda','Cadastro de Eventos',3,5,1,'2013-07-31 17:20:06','0000-00-00 00:00:00'),(11,'Noticias','Cadastro de Noticias',3,5,1,'2013-07-31 17:20:17','0000-00-00 00:00:00'),(12,'Album de Fotos','Cadastro de Fotos',3,5,1,'2013-07-31 17:20:28','0000-00-00 00:00:00'),(13,'Enquete','Desenvolver Enquete',3,5,1,'2013-07-31 17:20:39','0000-00-00 00:00:00'),(17,'Adequação de Layout','Adequar layout à proposta definida pelo clien',5,8,1,'2013-08-16 16:46:21','0000-00-00 00:00:00'),(18,'Noticias','Cadastro de Noticias',5,8,1,'2013-08-16 16:46:33','0000-00-00 00:00:00'),(19,'Notas','Cadastro de Notas',5,8,1,'2013-08-16 16:46:42','0000-00-00 00:00:00'),(20,'Álbum de Fotos','Álbum de Fotos',5,8,1,'2013-08-16 16:46:54','0000-00-00 00:00:00'),(21,'Eventos','Cadastro de Eventor   Fotos',5,8,1,'2013-08-16 16:47:05','0000-00-00 00:00:00'),(22,'Editais','Publicação de Editais',5,8,1,'2013-08-16 16:47:24','0000-00-00 00:00:00'),(23,'Licitação','Publicação de documentos sobre licitações e a',5,8,1,'2013-08-16 16:47:52','0000-00-00 00:00:00'),(24,'Perfil do Gestor','Perfil do Gestor',5,8,1,'2013-08-16 16:49:01','0000-00-00 00:00:00'),(26,'Institucional','Informações sobre a instituição',5,8,1,'2013-08-16 16:49:47','0000-00-00 00:00:00'),(28,'Criação do Layout','Criar Layout do site',11,9,1,'2013-08-20 20:43:56','0000-00-00 00:00:00'),(29,'Area de Noticias','desconhecido',11,9,1,'2013-08-20 20:44:04','0000-00-00 00:00:00'),(30,'Album de Fotos','Cadastrar Fotods',11,9,1,'2013-08-20 20:44:23','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `demandas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
INSERT INTO `instituicoes` VALUES (4,'Prodap','Processamento de Dados do Amapá','2013-07-16 18:31:54');
/*!40000 ALTER TABLE `instituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemas`
--

DROP TABLE IF EXISTS `problemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `conteudo` text NOT NULL,
  `demanda_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemas`
--

LOCK TABLES `problemas` WRITE;
/*!40000 ALTER TABLE `problemas` DISABLE KEYS */;
INSERT INTO `problemas` VALUES (1,'Publicação','Não há previsão de normalização dos serviços de hospedagem do Prodap',17),(2,'Informações','O cliente não repassou todos os dados necessários para a conclusão desta demanda',26),(3,'Incompatibilidade','O layout sugerido pelo cliente não se adequa ao proposto pela COTEC',28);
/*!40000 ALTER TABLE `problemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `criado_em` datetime NOT NULL,
  `atualizado_em` datetime NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `solicitante_id` varchar(45) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (7,'Site BPTran','Web-site do BPTran','2013-08-16 15:43:21','0000-00-00 00:00:00',37,'2',0,1),(8,'Site SEED','Web-site com gerenciamento de conteudo - SEED','2013-08-16 16:45:21','0000-00-00 00:00:00',40,'5',0,1),(9,'Web-site Institucional - SINDSEP','','2013-08-20 20:43:11','0000-00-00 00:00:00',39,'4',0,1);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rac`
--

DROP TABLE IF EXISTS `rac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` varchar(45) NOT NULL,
  `solicitante_id` varchar(45) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `colaborador_id` int(11) NOT NULL,
  `motivo` varchar(45) NOT NULL,
  `etapa` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL,
  `identificacao` int(11) NOT NULL,
  `finalizado` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rac`
--

LOCK TABLES `rac` WRITE;
/*!40000 ALTER TABLE `rac` DISABLE KEYS */;
INSERT INTO `rac` VALUES (5,'40','5',8,1,'Criação de Web-site','Execução','2013-08-20 16:25:49',20130821,1),(9,'37','2',7,0,'Criação de Website','Planejamento','2013-08-20 16:25:49',20130820,0),(11,'39','4',9,0,'Criação do Site','Planejamento','2013-08-20 20:43:41',20130820,1);
/*!40000 ALTER TABLE `rac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setores`
--

DROP TABLE IF EXISTS `setores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `criado_em` datetime NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setores`
--

LOCK TABLES `setores` WRITE;
/*!40000 ALTER TABLE `setores` DISABLE KEYS */;
INSERT INTO `setores` VALUES (78,'Cotec','Coordenadoria de Tecnologia','2013-07-17 17:20:32',0),(79,'Getec','Gerencia de Tecnologia','2013-07-17 17:21:42',0),(80,'Geprod','Gerencia de Produçãoo','2013-07-17 17:23:43',0),(81,'Cored','Coordenadoria de Redes','2013-07-17 17:26:46',4),(83,'Gesist','Gerencia de Sistemas','2013-07-17 18:09:55',4),(84,'GAB','Gabinete','2013-07-30 16:00:44',4);
/*!40000 ALTER TABLE `setores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitantes`
--

DROP TABLE IF EXISTS `solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `cliente_id` varchar(45) NOT NULL,
  `criado_em` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitantes`
--

LOCK TABLES `solicitantes` WRITE;
/*!40000 ALTER TABLE `solicitantes` DISABLE KEYS */;
INSERT INTO `solicitantes` VALUES (2,'Gilcilene Marinho da Trindade','Acessora de Comunicação','gil@bptran.ap.gov.br','99 9135-8526','37','2013-07-19 15:57:33'),(3,'Edivaldo Trindade','Chefe da Nuplan','ed@seicom.ap.gov.br','96 91623226','38','2013-07-22 16:14:19'),(4,'Samuel Benjamin','Gerente de T.I','samuel_benjamin@hotmail.com','96 99999999','39','2013-07-31 19:01:25'),(5,'Gilberto Queiroz','Técnico em Informática','gilbertoqueiroz@hotmail.com','96 8113-3225','40','2013-08-16 16:44:55');
/*!40000 ALTER TABLE `solicitantes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-21 15:54:13
