-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 06-Dez-2022 às 14:42
-- Versão do servidor: 5.7.27-log
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
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
(1, 'Adidas', '42.274.696/0045-55', 'atendimentoadidas@adidas.com', '(11) 5546-3700'),
(2, 'Nike', '59.546.515/0045-55', 'atendimento@lojanike.com', '(11) 4004-9994'),
(3, 'Louis Vuitton', '11.098.433/0014-62', 'brazil@contact.louisvuitton.com', '(11) 3060-5099'),
(4, 'New Balance', '11.098.433/0014-62', 'atendimento@nbbrasil.com', '(11) 3003-7779');

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
(11, 'BadBunnyBlack.jpeg'),
(12, 'airForce1.png'),
(13, 'airJordanChicago.png'),
(14, 'BadBunnyBlue.jpeg'),
(15, 'Blazermid.jpeg'),
(16, 'DunkLowBenJerry.jpeg'),
(17, 'DunkLowNatal.jpeg'),
(18, 'DunkLowTrevo.jpeg'),
(19, 'Jordan4off.jpeg'),
(20, 'LVtrainer.jpeg'),
(21, 'New550laranja.jpeg'),
(22, 'NewBal550Verde.jpeg'),
(23, 'NikeAir.jpeg'),
(24, 'UltraBoost22.jpeg'),
(25, 'YezzyOreo.jpeg'),
(26, 'YezzyOreo.jpeg'),
(27, 'YezzyZebra.jpeg');

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
  `complemento` text
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
(13, 'Adidas Forum Low X Bad Bunny Back To School', 440, 11, 1),
(14, 'Nike Air Force 1 white', 400, 12, 2),
(15, 'Nike Air Jordan 1 â€œChicago Reimaginedâ€', 400, 13, 2),
(16, 'Adidas Forum Low x Bad Bunny Blue Tint', 440, 14, 1),
(17, 'Nike SB Zoom Blazer Mid', 420, 15, 2),
(18, 'Nike Ben & Jerry\'s X Nike Sb Dunk Low Chunky Dunky', 420, 16, 2),
(19, 'Sean Cliver X Nike Sb Dunk Holiday', 420, 17, 2),
(20, 'Nike SB Dunk Low Pro St. Patrick\'s Day', 420, 18, 2),
(21, 'Nike Off-White x Air Jordan 4', 500, 19, 2),
(22, 'Louis Vuitton Trainer, preÃ§o', 480, 20, 3),
(23, 'New Balance 550 Au Lait', 420, 21, 4),
(24, 'New Balance 550 White Green', 420, 22, 4),
(25, 'Nike Air More Uptempo 96', 500, 23, 2),
(26, 'Adidas Ultraboost 22', 400, 24, 1),
(27, 'Adidas Yeezy Boost 350 V2 Oreo', 420, 25, NULL),
(28, 'Adidas Yeezy Boost 350 V2 Oreo', 420, 26, 1),
(29, 'Adidas Yeezy Boost 350 V2 Zebra', 420, 27, 1);

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
(30, 36, 2, 13),
(31, 37, 3, 13),
(32, 38, 3, 13),
(33, 39, 7, 13),
(34, 40, 5, 13),
(35, 41, 5, 13),
(36, 42, 4, 13),
(37, 34, 4, 14),
(38, 35, 5, 14),
(39, 36, 4, 14),
(40, 37, 5, 14),
(41, 38, 5, 14),
(42, 39, 8, 14),
(43, 40, 10, 14),
(44, 41, 6, 14),
(45, 42, 5, 14),
(46, 43, 3, 14),
(47, 36, 4, 15),
(48, 37, 6, 15),
(49, 38, 5, 15),
(50, 39, 8, 15),
(51, 40, 10, 15),
(52, 41, 4, 15),
(53, 42, 5, 15),
(54, 37, 5, 16),
(55, 38, 2, 16),
(56, 39, 3, 16),
(57, 40, 3, 16),
(58, 41, 3, 16),
(59, 42, 2, 16),
(60, 34, 4, 17),
(61, 35, 5, 17),
(62, 36, 3, 17),
(63, 39, 4, 17),
(64, 40, 5, 17),
(65, 41, 4, 17),
(66, 42, 3, 17),
(67, 43, 3, 17),
(68, 34, 2, 18),
(69, 35, 2, 18),
(70, 36, 2, 18),
(71, 37, 3, 18),
(72, 38, 2, 18),
(73, 39, 3, 18),
(74, 40, 3, 18),
(75, 41, 3, 18),
(76, 42, 2, 18),
(77, 43, 2, 18),
(78, 35, 3, 19),
(79, 38, 2, 19),
(80, 39, 2, 19),
(81, 40, 2, 19),
(82, 41, 2, 19),
(83, 42, 2, 19),
(84, 43, 2, 19),
(85, 34, 3, 20),
(86, 35, 3, 20),
(87, 39, 2, 20),
(88, 40, 6, 20),
(89, 41, 6, 20),
(90, 42, 4, 20),
(91, 43, 5, 20),
(92, 34, 7, 21),
(93, 35, 7, 21),
(94, 39, 6, 21),
(95, 40, 6, 21),
(96, 41, 6, 21),
(97, 42, 4, 21),
(98, 43, 3, 21),
(99, 34, 4, 22),
(100, 35, 7, 22),
(101, 39, 6, 22),
(102, 40, 6, 22),
(103, 41, 6, 22),
(104, 42, 4, 22),
(105, 43, 3, 22),
(106, 34, 5, 23),
(107, 35, 5, 23),
(108, 36, 5, 23),
(109, 37, 5, 23),
(110, 38, 6, 23),
(111, 39, 7, 23),
(112, 40, 7, 23),
(113, 41, 6, 23),
(114, 42, 5, 23),
(115, 43, 3, 23),
(116, 34, 3, 24),
(117, 35, 4, 24),
(118, 36, 3, 24),
(119, 37, 3, 24),
(120, 38, 3, 24),
(121, 39, 7, 24),
(122, 40, 6, 24),
(123, 41, 4, 24),
(124, 42, 4, 24),
(125, 43, 3, 24),
(126, 37, 3, 25),
(127, 38, 3, 25),
(128, 39, 4, 25),
(129, 40, 6, 25),
(130, 41, 5, 25),
(131, 42, 3, 25),
(132, 43, 3, 25),
(133, 34, 6, 26),
(134, 35, 6, 26),
(135, 36, 6, 26),
(136, 37, 6, 26),
(137, 38, 6, 26),
(138, 39, 5, 26),
(139, 40, 8, 26),
(140, 41, 5, 26),
(141, 42, 6, 26),
(142, 43, 6, 26),
(145, 34, 5, 27),
(146, 35, 4, 27),
(147, 36, 5, 27),
(148, 37, 5, 27),
(149, 38, 6, 27),
(150, 39, 9, 27),
(151, 40, 10, 27),
(152, 41, 5, 27),
(153, 42, 4, 27),
(154, 43, 5, 27),
(155, 34, 5, 28),
(156, 35, 5, 28),
(157, 36, 5, 28),
(158, 37, 5, 28),
(159, 38, 6, 28),
(160, 39, 6, 28),
(161, 40, 10, 28),
(162, 41, 8, 28),
(163, 42, 6, 28),
(164, 43, 4, 28),
(165, 34, 2, 29),
(166, 35, 3, 29),
(167, 36, 8, 29),
(168, 37, 6, 29),
(169, 38, 7, 29),
(170, 39, 8, 29),
(171, 40, 8, 29),
(172, 41, 4, 29),
(173, 42, 5, 29),
(174, 43, 3, 29);

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
  `tipo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `telefone`, `email`, `senha`, `tipo`) VALUES
(5, 'Rafael Bressanini', '103.725.339-65', '(47) 99686-7053', 'laimportsloja@gmail.com', '$argon2i$v=19$m=2048,t=4,p=3$eXQyRW85N1NlWmJ0UnJIcQ$1+9neyXFK7A0K5hWq60V0/u183Hs3JaAdz5SuHe5a7M', 1);

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
  `tipo` int(11) DEFAULT '2',
  `senha` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome`, `CPF`, `email`, `telefone`, `tipo`, `senha`) VALUES
(1, 'Vendedor', '142.152.132-41', 'vendedor@gmail.com', '21997998016', 2, NULL),
(2, 'Vendedora', '145.232.321-41', 'vendedora@gmail.com', '21997998016', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagens`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`idPedido_Produto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagens` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `idPedido_Produto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id_tamanho` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
