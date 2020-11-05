-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2020 às 20:16
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `expessoa`
--

CREATE TABLE `expessoa` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(85) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(85) NOT NULL,
  `datanascimento` date NOT NULL,
  `profissao` varchar(85) NOT NULL,
  `usuario` varchar(85) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `expessoa`
--

INSERT INTO `expessoa` (`id`, `tipo`, `nome`, `endereco`, `cidade`, `estado`, `celular`, `email`, `datanascimento`, `profissao`, `usuario`, `data`) VALUES
(9, 'Fisica', 'Carlos Roberto', 'Guilherme Gemballa, Jardim América', 'Rio do Sul', 'PR', '(44)123456789', 'carlos123@gmail.com', '2020-09-18', 'Barista', 'Shaolin', '2020-11-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(85) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(85) NOT NULL,
  `datanascimento` date NOT NULL,
  `profissao` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `tipo`, `nome`, `endereco`, `cidade`, `estado`, `celular`, `email`, `datanascimento`, `profissao`) VALUES
(5, 'Fisica', 'Eric Roberto', 'Rua dos coqueiros', 'Maringá', 'PR', '(44)123456789', 'eric@gmail.com', '2020-09-15', 'Desempregado'),
(6, 'Fisica', 'Shaolin Matador de Porco', 'Fazenda do mato', 'Campo Grande', 'MS', '(44)123456789', 'shaolin@gmail.com', '2020-09-21', 'Açogueiro'),
(15, 'Fisica', 'Ednaldo Pereira', 'Rua do barro', 'Londrina', 'PR', '(44)123456789', 'ednaldopereira@gmail.com', '2020-10-21', 'Cantor'),
(28, 'Juridica', 'SoftPower', 'Avenida Brasil', 'Maringá', 'PR', '(44)123456789', 'contato@softpower.com', '2020-08-13', 'Softhouse'),
(29, 'Fisica', 'Deide Costa', 'Circo da comédia', 'Curitiba', 'PR', '(44)123456789', 'deidecosta@hotmail.com', '2020-10-15', 'Comediante'),
(31, 'Fisica', 'Dom Brother Away', 'Palácio da Alvorada', 'Brasília', 'BR', '(44)123456789', 'away@onu.com', '2020-11-12', 'Imperador do mundo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `nome`, `tipo`) VALUES
(9, 'shaolin', 'dGVzdGU=', 'Shaolin', 'admin'),
(17, 'joao', 'am9hb3ppbmhv', 'Joao', 'normal'),
(18, 'maria', 'bWFyaWF6aW5oYQ==', 'Maria', 'normal'),
(19, 'admin', 'YWRtaW4=', 'Administrador', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `expessoa`
--
ALTER TABLE `expessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `expessoa`
--
ALTER TABLE `expessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
