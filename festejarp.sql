-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2016 às 13:32
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festejarp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_prod` int(10) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_prod`, `ip_address`, `quantidade`) VALUES
(2, '::1', 1),
(3, '::1', 1),
(4, '::1', 1),
(7, '::1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categ` int(100) NOT NULL,
  `nome_categ` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categ`, `nome_categ`) VALUES
(1, 'Festa 100 dias'),
(2, 'Festa 300 dias'),
(3, 'Calourada'),
(4, 'Pre-trote'),
(5, 'Show'),
(6, 'Festa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `ip_cliente` varchar(255) NOT NULL,
  `nome_cliente` text NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `senha_cliente` varchar(100) NOT NULL,
  `img_cliente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_forn` int(100) NOT NULL,
  `nome_forn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_forn`, `nome_forn`) VALUES
(1, 'Macauba'),
(2, 'Aroeira'),
(3, 'Barbeer'),
(4, 'Taverna'),
(5, 'Avalon'),
(6, 'Valcano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(100) NOT NULL,
  `categ_produto` int(100) NOT NULL,
  `forn_produto` int(100) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `preco_produto` double NOT NULL,
  `dia_produto` int(11) NOT NULL,
  `mes_produto` int(11) NOT NULL,
  `ano_produto` int(11) NOT NULL,
  `desc_produto` text NOT NULL,
  `img_produto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `categ_produto`, `forn_produto`, `nome_produto`, `preco_produto`, `dia_produto`, `mes_produto`, `ano_produto`, `desc_produto`, `img_produto`) VALUES
(2, 6, 6, 'VIP', 25, 14, 12, 2016, '<p>Melhor festa da regi&atilde;o est&aacute; de volta!!!!</p>', '15129772_895743717228190_1470582631_n.png'),
(3, 6, 2, 'White Party', 35, 8, 10, 2017, '<p>A Rep&uacute;blica Aroeira convida a todos para a White Party! Corra e garanta seu ingresso!</p>', '14432944_1179882872085537_3660580103457724856_n.png'),
(4, 6, 3, 'Barbeer PirÃ´', 30, 1, 3, 2017, '<p>A festa da maior rep&uacute;blica feminina que voc&ecirc; respeita! Ta todo mundo convocado, bora galera!</p>', '13151659_998098310279835_4107338882166246486_n.png'),
(5, 6, 4, 'AniversÃ¡rio 5 anos Taverna', 40, 31, 11, 2016, '<p>Vem todo mundo, chama os amigos!!!!!!</p>', '11707836_857093074380360_7813776845780994105_n.png'),
(6, 1, 0, 'TESTE', 100, 9, 1, 2017, '<p>TESTE</p>', '14713787_1140154916037701_1117909039655853736_n.png'),
(7, 3, 5, 'TESTE 2', 34, 14, 2, 2018, '<p>as</p>', '14563512_1162997420459764_6928759557725017430_.png'),
(8, 6, 3, 'TEST 3', 25, 6, 3, 2017, '<p>Topzera</p>', 'tonifique_o_corpo_15_minutos.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_forn`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categ` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_forn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
