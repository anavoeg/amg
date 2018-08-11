-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.19 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_amigo_estou_aqui
CREATE DATABASE IF NOT EXISTS `db_amigo_estou_aqui` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_amigo_estou_aqui`;

-- Copiando estrutura para tabela db_amigo_estou_aqui.apadrinhamentos
CREATE TABLE IF NOT EXISTS `apadrinhamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `casado` tinyint(1) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `renda` varchar(12) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `id_interesse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interesse_id` (`id_interesse`),
  KEY `fk_endereco_id` (`id_endereco`),
  CONSTRAINT `fk_endereco_id` FOREIGN KEY (`id_endereco`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que armazena informações de apadrinhamentos.';

-- Copiando dados para a tabela db_amigo_estou_aqui.apadrinhamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `apadrinhamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `apadrinhamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_amigo_estou_aqui.desaparecidos
CREATE TABLE IF NOT EXISTS `desaparecidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idade` date NOT NULL,
  `data_desaparecimento` date NOT NULL,
  `visto_por_ultimo` varchar(255) NOT NULL,
  `recompensa` varchar(12) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém informações de crianças desaparecidas.';

-- Copiando dados para a tabela db_amigo_estou_aqui.desaparecidos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `desaparecidos` DISABLE KEYS */;
INSERT INTO `desaparecidos` (`id`, `nome`, `idade`, `data_desaparecimento`, `visto_por_ultimo`, `recompensa`, `foto`, `status`) VALUES
	(15, 'Pinguis', '1945-02-03', '1966-09-28', 'Oceano pacifico', '350000', './_arquivos/pinguis_571e32a9497bc9ce85a05dda04543fd61533966257132.jpg', 0),
	(17, 'Agua Vivinha', '1998-02-03', '2018-08-09', 'Cidade do Rio de janeiro no bairro riachuelo próximo ao Senac na 24 de maio.', '1500', './_arquivos/agua_vivinha_bd6661231506e0fe52c15a3a77ecc1e71533967643.jpg', 0);
/*!40000 ALTER TABLE `desaparecidos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_amigo_estou_aqui.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém os endereços dos padrinhos.';

-- Copiando dados para a tabela db_amigo_estou_aqui.enderecos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` (`id`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `complemento`, `numero`) VALUES
	(1, '20960-160', 'RJ', 'Rio de Janeiro', 'Riachuelo', 'Rua Bandeira de Gouveia', 'casa', 122),
	(2, '20960-160', 'RJ', 'Rio de Janeiro', 'Riachuelo', 'Rua Bandeira de Gouveia', 'casa', 122),
	(3, '20960-160', 'RJ', 'Rio de Janeiro', 'Riachuelo', 'Rua Bandeira de Gouveia', 'casa', 122),
	(4, '20960-160', 'RJ', 'Rio de Janeiro', 'Riachuelo', 'Rua Bandeira de Gouveia', 'casa', 122);
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;

-- Copiando estrutura para tabela db_amigo_estou_aqui.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(2) NOT NULL,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_amigo_estou_aqui.estados: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Copiando estrutura para tabela db_amigo_estou_aqui.interesses
CREATE TABLE IF NOT EXISTS `interesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `genero_crianca` tinyint(1) NOT NULL,
  `idade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estado_id` (`id_estado`),
  CONSTRAINT `fk_estado_id` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela que mantém os interesses dos padrinhos.';

-- Copiando dados para a tabela db_amigo_estou_aqui.interesses: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `interesses` DISABLE KEYS */;
INSERT INTO `interesses` (`id`, `id_estado`, `genero_crianca`, `idade`) VALUES
	(1, 19, 0, '8 - 10 Anos de idade'),
	(2, 19, 0, '8 - 10 Anos de idade');
/*!40000 ALTER TABLE `interesses` ENABLE KEYS */;

-- Copiando estrutura para tabela db_amigo_estou_aqui.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_amigo_estou_aqui.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `status`) VALUES
	(1, 'admin', '5ebe2294ecd0e0f08eab7690d2a6ee69', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
