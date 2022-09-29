/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.22-MariaDB : Database - mydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mydb`;

/*Table structure for table `caracteristicas` */

DROP TABLE IF EXISTS `caracteristicas`;

CREATE TABLE `caracteristicas` (
  `idCaracteristicas` int(11) NOT NULL AUTO_INCREMENT,
  `fk_produtos_id_produtos` int(11) NOT NULL,
  `solado` varchar(20) NOT NULL,
  `lingueta` varchar(20) NOT NULL,
  `palmilha` varchar(20) NOT NULL,
  `material_forro` varchar(25) NOT NULL,
  `tipo_amarracao` varchar(20) NOT NULL,
  `entresola` varchar(20) NOT NULL,
  PRIMARY KEY (`idCaracteristicas`),
  UNIQUE KEY `idCaracteristicas_UNIQUE` (`idCaracteristicas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `caracteristicas` */

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

/*Table structure for table `email` */

DROP TABLE IF EXISTS `email`;

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT COMMENT '\n\n',
  `email` varchar(60) NOT NULL DEFAULT 'nao informado',
  `Vendedor_id_vendedor` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  `Cliente_id_usuario` int(11) NOT NULL,
  
  PRIMARY KEY (`id_email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_email_UNIQUE` (`id_email`),
  KEY `fk_Email_Vendedor_idx` (`Vendedor_id_vendedor`),
  KEY `fk_Email_Cliente1_idx` (`Cliente_id_cliente`),
  CONSTRAINT `fk_Email_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Email_Vendedor` FOREIGN KEY (`Vendedor_id_vendedor`) REFERENCES `vendedor` (`id_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    KEY `fk_usuario_Cliente1_idx` (`Cliente_id_usuario`),
  CONSTRAINT `fk_usuario_Cliente1` FOREIGN KEY (`Cliente_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `email` */

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `numero_endereco` int(11) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `complemento` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  UNIQUE KEY `id_endereco_UNIQUE` (`id_endereco`),
  KEY `fk_Endereco_Cliente1_idx` (`Cliente_id_cliente`),
  CONSTRAINT `fk_Endereco_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `endereco` */

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_pedido` varchar(20) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL,
  `data` varchar(10) NOT NULL,
  `Vendedor_id_vendedor` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_Pedido_Vendedor1_idx` (`Vendedor_id_vendedor`),
  KEY `fk_Pedido_Cliente1_idx` (`Cliente_id_cliente`),
  CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Vendedor1` FOREIGN KEY (`Vendedor_id_vendedor`) REFERENCES `vendedor` (`id_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pedido` */

/*Table structure for table `pedido_produto` */

DROP TABLE IF EXISTS `pedido_produto`;

CREATE TABLE `pedido_produto` (
  `idPedido_Produto` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `Pedido_id_pedido` int(11) NOT NULL,
  `Produtos_idProdutos` int(11) NOT NULL,
  PRIMARY KEY (`idPedido_Produto`),
  KEY `fk_Pedido_Produto_Pedido1_idx` (`Pedido_id_pedido`),
  KEY `fk_Pedido_Produto_Produtos1_idx` (`Produtos_idProdutos`),
  CONSTRAINT `fk_Pedido_Produto_Produtos1` FOREIGN KEY (`Produtos_idProdutos`) REFERENCES `produtos` (`id_produtos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pedido_produto` */

insert  into `pedido_produto`(`idPedido_Produto`,`quantidade`,`valor`,`Pedido_id_pedido`,`Produtos_idProdutos`) values 
(1,"1","250",0,3),
(2,"1","250",0,3),
(3,"1","400",0,2),
(4,"1","499",0,4);

/*Table structure for table `produtos` */

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(45) NOT NULL,
  `preco_produto` varchar(20) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `Modelo_idModelo` int(11) NOT NULL,
  PRIMARY KEY (`id_produtos`),
  UNIQUE KEY `id_produtos_UNIQUE` (`id_produtos`),
  KEY `fk_Produtos_Modelo1_idx` (`Modelo_idModelo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `produtos` */

insert  into `produtos`(`id_produtos`,`nome_produto`,`preco_produto`,`quantidade`,`Modelo_idModelo`) values 
(2,"Nike Air Jordan High 1 Tie Dye - unissex","400",98,0),
(3,"Balenciaga Triple S","250",18,0),
(4,"Nike Sb Dunk Low","499",2,0),
(5,"Adidas Yezzy Boost 350 V2","350",0,0);

/*Table structure for table `telefone` */

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(18) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  `Vendedor_id_vendedor` int(11) NOT NULL,
  PRIMARY KEY (`id_telefone`),
  UNIQUE KEY `numero_UNIQUE` (`numero`),
  UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  KEY `fk_Telefone_Cliente1_idx` (`Cliente_id_cliente`),
  KEY `fk_Telefone_Vendedor1_idx` (`Vendedor_id_vendedor`),
  CONSTRAINT `fk_Telefone_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Telefone_Vendedor1` FOREIGN KEY (`Vendedor_id_vendedor`) REFERENCES `vendedor` (`id_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `telefone` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nome`,`cpf`,`telefone`,`email`,`senha`) values 
(1,"teste","477.516.858-40",NULL,NULL,"teste"),
(2,"test","047.734.300-79","1545","trdtc","c71ce8327ddb80f5f2d66ef497a4c2f2ed295a1"),
(3,"loco","003.112.840-86","145566656","veruska6584@uorak.com","7163d28263e69194a23cc96dde29dd92886fb034"),
(4,"trser","212.547.400-07","(14) 99881-244","desenvolvimento@contabilivre.com.br","f0d45e5602bb978a29d940ca611d113ec3feb44d");

/*Table structure for table `vendedor` */

DROP TABLE IF EXISTS `vendedor`;

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `CPF` varchar(14) NOT NULL,
  `senha` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_vendedor`,`CPF`),
  UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  UNIQUE KEY `id_vendedor_UNIQUE` (`id_vendedor`),
  KEY `fk_Vendedor_usuario_idx` (`id_vendedor`),
  CONSTRAINT `fk_Vendedor_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vendedor` */


/*Data for the table `vendedor` */

/*Data for the table `pedido_produto` */

/*Data for the table `produtos` */

insert  into `produtos`(`id_produtos`,`nome_produto`,`preco_produto`,`quantidade`,`Modelo_idModelo`) values 
(2,"Nike Air Jordan High 1 Tie Dye - unissex","400",98,0),
(3,"Balenciaga Triple S","250",18,0),
(4,"Nike Sb Dunk Low","499",2,0),
(5,"Adidas Yezzy Boost 350 V2","350",0,0);


/*Data for the table `endereco` */

insert into `endereco` (`id_endereco`, `numero_endereco`, `rua`, `bairro`, `cidade`, `estado`, `cep`, `complemento`) VALUES
(1, 90, "Beco Pamplona", "7 de Setembro", "Gaspar", "Santa Catarina" "89114-876", 501),
(2, 00, "Rodovia sc-414", "Vila Nova", "Luiz Alves", "Santa Catarina", "89128-000", 0),
(3, 8267, "Rodovia sc-414", "Vila Nova", "Luiz Alves", "Santa Catarina", "89128-000", 0);

/*Data for the table 'cliente'*/

insert  into `cliente`(`id_cliente`, `nome`, `CPF`) values (1,"Ferdinando Rainert", "119.082.619-43");
insert into `cliente`(`id_cliente`, `nome`, `CPF`) values (2,"Bruno Erbs", "108.912.169-52");
insert into `cliente`(`id_cliente`, `nome`, `CPF`) values (3,"Rafael Antônio Bressanini", "103.725.339-65");
insert into `cliente`(`id_cliente`, `nome`, `CPF`) values (4,"Thiago Leopoldo Beffart Weber", "076.147.659-82");


/*Data for the table 'usuarios'*/

insert into `usuario` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) values ("Ferdinando Rainert", "119.082.619-43", "(47)920000706", "fer.rainert@gmail.com");
insert into `usuario` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) values ("Bruno Erbs","108.912.169-52", "(47)99164992", "brunoerbs4@gmail.com", "erbs1311");
insert into `usuario` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) values ("Rafael Antõnio Bressanini", "103.725.339-65", "laimportsloja@gmail.com", "123456");
insert into `usuario` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) values ("Thiago Leopoldo Beffart Weber", "076.147.659-82", "thiago.bw@gmail.com", "123456");


/*Data for the table 'vendedor'*/

insert into `vendedor` (`id_vendedor`, `nome`, `CPF`, `senha`) values (1,"Ferdinando Rainert", "119.082.619-43", "Porradesenha24@",0);
insert into `vendedor` (`id_vendedor`, `nome`, `CPF`, `senha`) values (2, "Bruno Erbs","108.912.169-52", "erbs1311",0);
insert into `vendedor` (`id_vendedor`, `nome`, `CPF`, `senha`) values (3, "Rafael Antõnio Bressanini", "103.725.339-65", "123456",0);
insert into `vendedor` (`id_vendedor`, `nome`, `CPF`, `senha`) values (4, "Thiago Leopoldo Beffart Weber", "076.147.659-82", "123456",0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-25 11:39:03
DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(300) DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1 , /* 1 - VENDEDOR, 2 - CLIENTE - 0 ADMIN**/

  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

