# ************************************************************
# Sequel Pro SQL dump
# Vers�o 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.4.21-MariaDB)
# Base de Dados: project_Pl
# Tempo de Gera��o: 2022-11-21 16:27:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela caracteristicas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `caracteristicas`;

CREATE TABLE `caracteristicas` (
  `id_caracteristicas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_produtos_id_produtos` int(11) NOT NULL,
  `solado` varchar(20) NOT NULL,
  `lingueta` varchar(20) NOT NULL,
  `palmilha` varchar(20) NOT NULL,
  `material_forro` varchar(25) NOT NULL,
  `tipo_amarracao` varchar(20) NOT NULL,
  `entresola` varchar(20) NOT NULL,
  PRIMARY KEY (`id_caracteristicas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
  `nome` varchar(100) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'nao informado',
  `telefone` char(15) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump da tabela pedido
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `valor_pedido` varchar(20) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL,
  `data` varchar(10) NOT NULL DEFAULT '',
  `Vendedor_id_vendedor` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idPedido_Produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pedido_produto` WRITE;
/*!40000 ALTER TABLE `pedido_produto` DISABLE KEYS */;

INSERT INTO `pedido_produto` (`idPedido_Produto`, `tamanho`, `quantidade`, `valor`, `Pedido_id`, `Produtos_idProdutos`, `usuario_id`)
VALUES
	(7,36,1,300,NULL,2,2),
	(11,43,5,300,NULL,2,2),
	(12,37,2,300,NULL,2,2),
	(14,43,2,300,NULL,2,2);

/*!40000 ALTER TABLE `pedido_produto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela produtos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id_produtos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `preco_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_produtos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;

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

/*!40000 ALTER TABLE `tamanho` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` char(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(260) DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

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




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
