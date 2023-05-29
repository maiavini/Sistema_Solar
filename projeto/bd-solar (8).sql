-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Maio-2023 às 22:09
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd-solar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

DROP TABLE IF EXISTS `cidade`;
CREATE TABLE IF NOT EXISTS `cidade` (
  `idCidade` int NOT NULL AUTO_INCREMENT,
  `cidade` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idEstado_FK` int NOT NULL,
  PRIMARY KEY (`idCidade`),
  KEY `idEstado_FK` (`idEstado_FK`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`idCidade`, `cidade`, `idEstado_FK`) VALUES
(10, 'Teresópolis', 19),
(11, 'Rio de Janeiro ', 19),
(12, 'São Paulo', 25),
(13, 'Belo Horizonte', 13),
(14, 'Salvador', 5),
(15, 'Porto Alegre', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` int NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `idCidade_FK` int NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idCidade_FK` (`idCidade_FK`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `cpf`, `telefone`, `rua`, `numero`, `complemento`, `cep`, `idCidade_FK`) VALUES
(39, 'Vinicius Maia Marciano', 129, '21-27425574', 'Rua José', 294, '', '3700-156', 11),
(43, 'Luciana Maia', 112, '36-96566-9988', 'Rua Arara', 2569, 'Bloco 14', '1456-879', 14),
(44, 'Leticia Maia', 124, '33-96221-8899', 'Rua Machado', 650, '2B', '2567-888', 15),
(45, 'Bryanda Rocha', 778, '21-2643-5555', 'Rua Barbosa', 16, '', '2564-445', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int NOT NULL AUTO_INCREMENT,
  `nomeEstado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`idEstado`, `nomeEstado`) VALUES
(1, 'Acre'),
(2, 'Alagoas'),
(3, 'Amapá'),
(4, 'Amazonas'),
(5, 'Bahia'),
(6, 'Ceará'),
(7, 'Distrito Federal'),
(8, 'Espírito Santo'),
(9, 'Goiás'),
(10, 'Maranhão'),
(11, 'Mato Grosso'),
(12, 'Mato Grosso do Sul'),
(13, 'Minas Gerais'),
(14, 'Pará'),
(15, 'Paraíba'),
(16, 'Paraná'),
(17, 'Pernambuco'),
(18, 'Piauí'),
(19, 'Rio de Janeiro'),
(20, 'Rio Grande do Norte'),
(21, 'Rio Grande do Sul'),
(22, 'Rondônia'),
(23, 'Roraima'),
(24, 'Santa Catarina'),
(25, 'São Paulo'),
(26, 'Sergipe'),
(27, 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instalacao`
--

DROP TABLE IF EXISTS `instalacao`;
CREATE TABLE IF NOT EXISTS `instalacao` (
  `idInstal` int NOT NULL AUTO_INCREMENT,
  `data_Agend` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFim` time NOT NULL,
  `status_Inst` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idCliente_FK` int NOT NULL,
  PRIMARY KEY (`idInstal`),
  KEY `idCliente_FK` (`idCliente_FK`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `instalacao`
--

INSERT INTO `instalacao` (`idInstal`, `data_Agend`, `horaInicio`, `horaFim`, `status_Inst`, `idCliente_FK`) VALUES
(19, '2023-06-15', '18:00:00', '19:00:00', 'concluida', 39),
(24, '2023-06-03', '18:00:00', '20:00:00', 'pendente', 43),
(25, '2023-07-12', '07:00:00', '12:00:00', 'pendente', 44),
(26, '2023-06-29', '11:00:00', '15:00:00', 'pendente', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`) VALUES
(1, 'Vinicius Maia', 'vinicius.maia@solar.com', '12345'),
(3, 'Luiza Maia', 'luiza.maia@solar.com', '12345'),
(4, 'Pedro Maia', 'pedro.maia@solar.com', '12345'),
(7, 'Bryanda Maia', 'bryanda.maia@solar.com', '12345');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`idEstado_FK`) REFERENCES `estado` (`idEstado`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idCidade_FK`) REFERENCES `cidade` (`idCidade`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `instalacao`
--
ALTER TABLE `instalacao`
  ADD CONSTRAINT `instalacao_ibfk_1` FOREIGN KEY (`idCliente_FK`) REFERENCES `cliente` (`idCliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
