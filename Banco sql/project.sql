-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2022 às 02:11
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id_caracteristicas` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fk_produtos_id_produtos` int(11) NOT NULL,
  `solado` varchar(20) NOT NULL,
  `lingueta` varchar(20) NOT NULL,
  `palmilha` varchar(20) NOT NULL,
  `material_forro` varchar(25) NOT NULL,
  `tipo_amarracao` varchar(20) NOT NULL,
  `entresola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'não informado',
  `telefone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `numero_endereco` int(11) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `complemento` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'não informado',
  `telefone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `valor_pedido` varchar(20) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL,
  `data` varchar(10) NOT NULL,
  `Vendedor_id_vendedor` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `idPedido_Produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `Pedido_id_pedido` int(11) NOT NULL,
  `Produtos_idProdutos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `quantidade_total` int(11) NOT NULL,
  `id_tamanho_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id_tamanho` int(11) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `telefone` char(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(260) DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `tipo` int(11) DEFAULT 2,
  `senha` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD UNIQUE KEY `id_caracteristicas_UNIQUE` (`id_caracteristicas`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD UNIQUE KEY `id_endereco_UNIQUE` (`id_endereco`),
  ADD KEY `fk_Endereco_Cliente1_idx` (`Cliente_id_cliente`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`idPedido_Produto`),
  ADD KEY `fk_Pedido_Produto_Pedido1_idx` (`Pedido_id_pedido`),
  ADD KEY `fk_Pedido_Produto_Produtos1_idx` (`Produtos_idProdutos`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`),
  ADD KEY `fk_id_tamanho` (`id_tamanho_produto`);

--
-- Índices para tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `idPedido_Produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id_tamanho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_Endereco_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_id_tamanho` FOREIGN KEY (`id_tamanho_produto`) REFERENCES `tamanho` (`id_tamanho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
