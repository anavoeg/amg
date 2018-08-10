-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Ago-2018 às 02:29
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amigo_estou_aqui`
--
CREATE DATABASE IF NOT EXISTS `db_amigo_estou_aqui` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_amigo_estou_aqui`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apadrinhamentos`
--

DROP TABLE IF EXISTS `apadrinhamentos`;
CREATE TABLE `apadrinhamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `casado` tinyint(1) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `renda` double(12,2) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_interesse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena informações de apadrinhamentos.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `desaparecidos`
--

DROP TABLE IF EXISTS `desaparecidos`;
CREATE TABLE `desaparecidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` date NOT NULL,
  `data_desaparecimento` date NOT NULL,
  `visto_por_ultimo` varchar(255) NOT NULL,
  `recompensa` double(10,2) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém informações de crianças desaparecidas.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém os endereços dos padrinhos.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `sigla` char(2) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `sigla`, `nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AM', 'Amazonas'),
(4, 'AP', 'Amapá'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MG', 'Minas Gerais'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MT', 'Mato Grosso'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piauí'),
(18, 'PR', 'Paraná'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RO', 'Rondônia'),
(22, 'RR', 'Roraima'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'SC', 'Santa Catarina'),
(25, 'SE', 'Sergipe'),
(26, 'SP', 'São Paulo'),
(27, 'TO', 'Tocantins'),
(28, 'QE', 'Qualquer Estado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses`
--

DROP TABLE IF EXISTS `interesses`;
CREATE TABLE `interesses` (
  `id` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `genero_crianca` tinyint(1) NOT NULL,
  `idade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém os interesses dos padrinhos.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `status`) VALUES
(1, 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_interesse_id` (`id_interesse`),
  ADD KEY `fk_endereco_id` (`id_endereco`);

--
-- Indexes for table `desaparecidos`
--
ALTER TABLE `desaparecidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `interesses`
--
ALTER TABLE `interesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado_id` (`id_estado`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desaparecidos`
--
ALTER TABLE `desaparecidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `interesses`
--
ALTER TABLE `interesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `apadrinhamentos`
--
ALTER TABLE `apadrinhamentos`
  ADD CONSTRAINT `fk_endereco_id` FOREIGN KEY (`id_endereco`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `interesses`
--
ALTER TABLE `interesses`
  ADD CONSTRAINT `fk_estado_id` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
