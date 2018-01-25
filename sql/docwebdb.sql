-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2018 às 20:48
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docwebdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cenario`
--

CREATE TABLE `cenario` (
  `id` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `imagem` mediumblob NOT NULL,
  `tipo_imagem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codcliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cenario` varchar(256) DEFAULT NULL,
  `compartilhamentos` varchar(256) DEFAULT NULL,
  `qtdeComputadores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `codCliente` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `dominio`
--

CREATE TABLE `dominio` (
  `idDominio` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `nomeDominio` varchar(70) NOT NULL,
  `ipServidor` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressora`
--

CREATE TABLE `impressora` (
  `idImpressora` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `conexao` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idUsuario` int(11) NOT NULL,
  `nomeUser` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idUsuario`, `nomeUser`, `senha`, `estado`, `adm`) VALUES
(1, 'eduardo', '1234', 1, 1),
(4, 'teste', '1234', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modem`
--

CREATE TABLE `modem` (
  `idModem` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `ipModem` varchar(25) NOT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  `servicos` varchar(50) DEFAULT NULL,
  `rangeDhcp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `politica_backup`
--

CREATE TABLE `politica_backup` (
  `id` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `tipo_backup` varchar(30) NOT NULL,
  `servidor_origem` varchar(30) NOT NULL,
  `local_origem` varchar(200) NOT NULL,
  `servidor_destino` varchar(30) NOT NULL,
  `local_destino` varchar(200) NOT NULL,
  `Agendamento` varchar(50) NOT NULL,
  `software_backup` varchar(20) NOT NULL,
  `tipo_sincronizacao` varchar(30) DEFAULT NULL,
  `local_sincronizacao` varchar(50) DEFAULT NULL,
  `agendamento_sinc` varchar(50) DEFAULT NULL,
  `retencao` int(11) DEFAULT NULL,
  `observacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `idServidor` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `Tipo` char(7) NOT NULL,
  `ipInterno` varchar(25) NOT NULL,
  `antivirus` varchar(30) DEFAULT NULL,
  `SO` varchar(50) NOT NULL,
  `hardware` varchar(100) DEFAULT NULL,
  `discos` varchar(50) DEFAULT NULL,
  `servicos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `usuariosadms`
--

CREATE TABLE `usuariosadms` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `codcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `cenario`
--
ALTER TABLE `cenario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codcliente`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`codCliente`);

--
-- Indexes for table `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`idDominio`),
  ADD UNIQUE KEY `nomeDominio` (`nomeDominio`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `impressora`
--
ALTER TABLE `impressora`
  ADD PRIMARY KEY (`idImpressora`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `modem`
--
ALTER TABLE `modem`
  ADD PRIMARY KEY (`idModem`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `politica_backup`
--
ALTER TABLE `politica_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`idServidor`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Indexes for table `usuariosadms`
--
ALTER TABLE `usuariosadms`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_codCliente` (`codcliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cenario`
--
ALTER TABLE `cenario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dominio`
--
ALTER TABLE `dominio`
  MODIFY `idDominio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `impressora`
--
ALTER TABLE `impressora`
  MODIFY `idImpressora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modem`
--
ALTER TABLE `modem`
  MODIFY `idModem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `politica_backup`
--
ALTER TABLE `politica_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servidor`
--
ALTER TABLE `servidor`
  MODIFY `idServidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usuariosadms`
--
ALTER TABLE `usuariosadms`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cenario`
--
ALTER TABLE `cenario`
  ADD CONSTRAINT `cenario_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `dominio`
--
ALTER TABLE `dominio`
  ADD CONSTRAINT `dominio_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `impressora`
--
ALTER TABLE `impressora`
  ADD CONSTRAINT `impressora_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `modem`
--
ALTER TABLE `modem`
  ADD CONSTRAINT `modem_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `politica_backup`
--
ALTER TABLE `politica_backup`
  ADD CONSTRAINT `politica_backup_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codcliente`);

--
-- Limitadores para a tabela `usuariosadms`
--
ALTER TABLE `usuariosadms`
  ADD CONSTRAINT `fk_codCliente` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`codcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
