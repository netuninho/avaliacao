-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2022 às 04:17
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdavaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsistema`
--

CREATE TABLE `tblsistema` (
  `idsistema` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `nordem` int(11) NOT NULL,
  `dtrequisicao` date NOT NULL,
  `dttermino` date NOT NULL,
  `funcionario` varchar(100) NOT NULL,
  `situacao` int(11) NOT NULL,
  `preco` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblsistema`
--

INSERT INTO `tblsistema` (`idsistema`, `cliente`, `nordem`, `dtrequisicao`, `dttermino`, `funcionario`, `situacao`, `preco`) VALUES
(4, 'Manuela Silva', 45, '2022-02-08', '2022-02-23', 'Gabriel', 1, 10.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsituacao`
--

CREATE TABLE `tblsituacao` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblsituacao`
--

INSERT INTO `tblsituacao` (`idsituacao`, `situacao`) VALUES
(1, 'ativo'),
(2, 'inativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblsistema`
--
ALTER TABLE `tblsistema`
  ADD PRIMARY KEY (`idsistema`);

--
-- Índices para tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  ADD PRIMARY KEY (`idsituacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblsistema`
--
ALTER TABLE `tblsistema`
  MODIFY `idsistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tblsituacao`
--
ALTER TABLE `tblsituacao`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
