# ************************************************************
# Sequel Pro SQL dump
# Vers�o 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.4.21-MariaDB)
# Base de Dados: project
# Tempo de Gera��o: 2022-11-28 13:42:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela cliente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'nao informado',
  `telefone` char(15) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;

INSERT INTO `cliente` (`id_cliente`, `nome`, `CPF`, `email`, `telefone`)
VALUES
	(1,'Fulana','','teste@teste.com','99 999999'),
	(2,'Fulano','150.150.158-42','teste@teste.com','99 999999');

/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela endereco
# ------------------------------------------------------------

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_endereco` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero_endereco` int(11) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `complemento` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump da tabela fornecedor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'nao informado',
  `telefone` char(15) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `cnpj`, `email`, `telefone`)
VALUES
	(1,'Naian Web Sollution','28.329.387/0001-43','contato@naian.com.br','999999999');

/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela imagens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `imagens`;

CREATE TABLE `imagens` (
  `id_imagens` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  PRIMARY KEY (`id_imagens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;

INSERT INTO `imagens` (`id_imagens`, `nome`)
VALUES
	(7,'image.png');

/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela pedido
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `valor_pedido` varchar(20) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL,
  `data` varchar(20) NOT NULL DEFAULT '',
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `endereco` varchar(64) DEFAULT NULL,
  `endereco_numero` int(9) DEFAULT NULL,
  `endereco_cep` int(11) DEFAULT NULL,
  `complemento` text DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;

INSERT INTO `pedido` (`id_pedido`, `valor_pedido`, `forma_pagamento`, `data`, `usuario_id`, `cliente_id`, `vendedor_id`, `endereco`, `endereco_numero`, `endereco_cep`, `complemento`)
VALUES
	(14,'500','boleto','28/11/2022-03:49:34',3,1,1,NULL,NULL,NULL,NULL),
	(15,'250','boleto','28/11/2022-13:53:12',3,1,1,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela pedido_produto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pedido_produto`;

CREATE TABLE `pedido_produto` (
  `idPedido_Produto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tamanho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `Pedido_id` int(11) DEFAULT NULL,
  `Produtos_idProdutos` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPedido_Produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pedido_produto` WRITE;
/*!40000 ALTER TABLE `pedido_produto` DISABLE KEYS */;

INSERT INTO `pedido_produto` (`idPedido_Produto`, `tamanho`, `quantidade`, `valor`, `Pedido_id`, `Produtos_idProdutos`, `usuario_id`)
VALUES
	(3,34,1,250,13,9,NULL),
	(5,34,1,250,14,9,NULL),
	(6,34,1,250,14,9,NULL),
	(7,34,1,250,15,9,NULL),
	(8,34,1,250,16,9,NULL),
	(9,34,1,250,16,9,NULL);

/*!40000 ALTER TABLE `pedido_produto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela produtos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_produtos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `imagens_id` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produtos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;

INSERT INTO `produtos` (`id_produtos`, `nome_produto`, `preco_produto`, `imagens_id`, `fornecedor_id`)
VALUES
	(9,'Painel kk',250,7,1);

/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tamanho
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tamanho`;

CREATE TABLE `tamanho` (
  `id_tamanho` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tamanho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_tamanho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tamanho` WRITE;
/*!40000 ALTER TABLE `tamanho` DISABLE KEYS */;

INSERT INTO `tamanho` (`id_tamanho`, `tamanho`, `quantidade`, `id_produto`)
VALUES
	(1,34,5,1),
	(2,35,1,1),
	(3,36,1,1),
	(4,37,5,1),
	(5,38,0,1),
	(6,39,2,1),
	(7,40,1,1),
	(8,41,0,1),
	(9,42,2,1),
	(10,43,3,1),
	(24,34,4,7),
	(26,34,2,9);

/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `cpf` char(14) NOT NULL DEFAULT '',
  `telefone` char(15) DEFAULT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `senha` varchar(260) NOT NULL DEFAULT '',
  `tipo` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`)
VALUES
	(1,'thiago','021.174.540-54','(47) 99225-7589','teste@gmail.com','$argon2i$v=19$m=2048,t=4,p=3$WUtoQ3N4dHNjaGMwVkJNWA$3Kl0P5/e8OkaXPBjwvs23MpVd2CIirVdkbcYA+3sDds',1),
	(3,'Lucas','158.180.187-41','(99) 99999-9999','lucas@naian.com.br','$2y$10$2yipDNfEvyCVbltxgdH98u/p4zQ3d3.uqDWnBeaAU8y5KXiZ8Xzhu',1);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela vendedor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendedor`;

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `tipo` int(11) DEFAULT 2,
  `senha` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vendedor` WRITE;
/*!40000 ALTER TABLE `vendedor` DISABLE KEYS */;

INSERT INTO `vendedor` (`id_vendedor`, `nome`, `CPF`, `email`, `telefone`, `tipo`, `senha`)
VALUES
	(1,'Vendedor','142.152.132-41','lucas@naian.com.br','21997998016',2,NULL),
	(2,'Vendedora','145.232.321-41','contato@naian.com.br','21997998016',2,NULL);

/*!40000 ALTER TABLE `vendedor` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
