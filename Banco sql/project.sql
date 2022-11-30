-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 09:00
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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'nC#o informado',
  `telefone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `CPF`, `email`, `telefone`) VALUES
(1, 'Fulana', '009.654.764-98', 'teste@teste.com', '99 999999'),
(2, 'Fulano', '150.150.158-42', 'teste@teste.com', '99 999999');

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
  `id_fornecedor` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` char(18) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT 'nC#o informado',
  `telefone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `cnpj`, `email`, `telefone`) VALUES
(1, 'Naian Web Sollution', '28.329.387/0001-43', 'contato@naian.com.br', '999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagens` int(11) UNSIGNED NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_imagens`, `nome`) VALUES
(10, 'atvdd.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) UNSIGNED NOT NULL,
  `valor_pedido` varchar(20) NOT NULL,
  `forma_pagamento` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL DEFAULT '',
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `endereco` varchar(64) DEFAULT NULL,
  `endereco_numero` int(9) DEFAULT NULL,
  `endereco_cep` int(11) DEFAULT NULL,
  `complemento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `valor_pedido`, `forma_pagamento`, `data`, `usuario_id`, `cliente_id`, `vendedor_id`, `endereco`, `endereco_numero`, `endereco_cep`, `complemento`) VALUES
(14, '500', 'boleto', '28/11/2022-03:49:34', 3, 1, 1, NULL, NULL, NULL, NULL),
(15, '250', 'boleto', '28/11/2022-13:53:12', 3, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `idPedido_Produto` int(11) UNSIGNED NOT NULL,
  `tamanho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `Pedido_id` int(11) DEFAULT NULL,
  `Produtos_idProdutos` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`idPedido_Produto`, `tamanho`, `quantidade`, `valor`, `Pedido_id`, `Produtos_idProdutos`, `usuario_id`) VALUES
(3, 34, 1, 250, 13, 9, NULL),
(5, 34, 1, 250, 14, 9, NULL),
(6, 34, 1, 250, 14, 9, NULL),
(7, 34, 1, 250, 15, 9, NULL),
(8, 34, 1, 250, 16, 9, NULL),
(9, 34, 1, 250, 16, 9, NULL),
(16, 34, 1, 9000, NULL, 12, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) UNSIGNED NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `imagens_id` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `nome_produto`, `preco_produto`, `imagens_id`, `fornecedor_id`) VALUES
(12, 'testeado', 9000, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id_tamanho` int(11) UNSIGNED NOT NULL,
  `tamanho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`id_tamanho`, `tamanho`, `quantidade`, `id_produto`) VALUES
(1, 34, 5, 1),
(2, 35, 1, 1),
(3, 36, 1, 1),
(4, 37, 5, 1),
(5, 38, 0, 1),
(6, 39, 2, 1),
(7, 40, 1, 1),
(8, 41, 0, 1),
(9, 42, 2, 1),
(10, 43, 3, 1),
(24, 34, 4, 7),
(29, 34, 90, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `cpf` char(14) NOT NULL DEFAULT '',
  `telefone` char(15) DEFAULT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `senha` varchar(260) NOT NULL DEFAULT '',
  `tipo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `tipo` int(11) DEFAULT 2,
  `senha` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome`, `CPF`, `email`, `telefone`, `tipo`, `senha`) VALUES
(1, 'Vendedor', '142.152.132-41', 'vendedor@gmail.com', '21997998016', 2, NULL),
(2, 'Vendedora', '145.232.321-41', 'vendedora@gmail.com', '21997998016', 2, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagens`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`idPedido_Produto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Índices para tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagens` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `idPedido_Produto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id_tamanho` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
