-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2022 às 15:43
-- Versão do servidor: 5.7.20-log
-- versão do PHP: 8.1.6

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
  `idCaracteristicas` int(11) NOT NULL,
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
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL COMMENT '\n\n',
  `email` varchar(60) NOT NULL DEFAULT 'NI',
  `Vendedor_id_vendedor` int(11) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  `Cliente_id_usuario` int(11) NOT NULL
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
  `nome_produto` varchar(45) NOT NULL,
  `preco_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `Modelo_idModelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL,
  `numero` char(15) NOT NULL,
  `Cliente_id_cliente` int(11) NOT NULL,
  `Vendedor_id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tipo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) VALUES
(48, 'thiago', '076.147.659-82', '(47) 99225-7589', 'thgleopoldo900@gmail.com', '$argon2i$v=19$m=2048,t=4,p=3$blFVTGJTN2h3Q2pBNS45Tw$NYGUt8TjIXEyFZFv/1gJtOT5tMmwcT7hdE4p55laz5M', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar (40) NOT NULL,
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
  ADD PRIMARY KEY (`idCaracteristicas`),
  ADD UNIQUE KEY `idCaracteristicas_UNIQUE` (`idCaracteristicas`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`);

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `id_email_UNIQUE` (`id_email`),
  ADD KEY `Email_Vendedor_idx` (`Vendedor_id_vendedor`),
  ADD KEY `Email_Cliente1_idx` (`Cliente_id_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD UNIQUE KEY `id_endereco_UNIQUE` (`id_endereco`),
  ADD KEY `fk_Endereco_Cliente1_idx` (`Cliente_id_cliente`);

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
  ADD UNIQUE KEY `id_produtos_UNIQUE` (`id_produtos`),
  ADD KEY `fk_Produtos_Modelo1_idx` (`Modelo_idModelo`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`),
  ADD UNIQUE KEY `numero_UNIQUE` (`numero`),
  ADD UNIQUE KEY `id_telefone_UNIQUE` (`id_telefone`),
  ADD KEY `fk_Telefone_Cliente1_idx` (`Cliente_id_cliente`),
  ADD KEY `fk_Telefone_Vendedor1_idx` (`Vendedor_id_vendedor`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`,`CPF`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `id_vendedor_UNIQUE` (`id_vendedor`),
  ADD KEY `fk_Vendedor_usuario_idx` (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `idCaracteristicas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT COMMENT '\n\n';

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `idPedido_Produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_Endereco_Cliente1` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
