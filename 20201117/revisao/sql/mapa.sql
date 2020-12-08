-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2020 às 21:52
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mapa`
--
CREATE DATABASE 'mapa';
-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(100) NOT NULL,
  `cidade_estado` int(11) NOT NULL,
  `cidade_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cod_cidade`, `nome_cidade`, `cidade_estado`, `cidade_pais`) VALUES
(1, 'Araraqura', 4, 1),
(2, 'La Plata', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `cod_estado` int(11) NOT NULL,
  `nome_estado` varchar(100) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `pais_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`cod_estado`, `nome_estado`, `sigla`, `pais_estado`) VALUES
(4, 'São Paulo', 'sp', 1),
(5, 'Buenos Aires', 'BA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `cod_pais` int(11) NOT NULL,
  `nome_pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`cod_pais`, `nome_pais`) VALUES
(1, 'Brasil'),
(2, 'Argentina');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cidade`),
  ADD KEY `cidade_estado` (`cidade_estado`),
  ADD KEY `cidade_ibfk_2` (`cidade_pais`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cod_estado`),
  ADD KEY `pais_estado` (`pais_estado`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`cod_pais`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cod_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `cod_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `cod_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`cidade_estado`) REFERENCES `estado` (`cod_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cidade_ibfk_2` FOREIGN KEY (`cidade_pais`) REFERENCES `pais` (`cod_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`pais_estado`) REFERENCES `pais` (`cod_pais`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
