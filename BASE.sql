-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18-Ago-2014 às 12:06
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ArduCar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
  `idacao` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao_dispositivo`
--

CREATE TABLE IF NOT EXISTS `acao_dispositivo` (
  `idacao_dispositivo` int(11) NOT NULL,
  `acao` int(11) NOT NULL,
  `dispositivo` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idacao_dispositivo`),
  KEY `acao_disp_disp_idx` (`dispositivo`),
  KEY `acao_disp_acao_idx` (`acao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispositivo`
--

CREATE TABLE IF NOT EXISTS `dispositivo` (
  `iddispositivo` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iddispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `idhistorico` int(11) NOT NULL AUTO_INCREMENT,
  `acao` int(11) NOT NULL,
  `dispositivo` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`idhistorico`),
  KEY `hist_dispo_idx` (`dispositivo`),
  KEY `hist_acao_idx` (`acao`),
  KEY `hist_user_idx` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `idlocalizacao` int(11) NOT NULL AUTO_INCREMENT,
  `dispositivo` int(11) NOT NULL,
  `longitude` varchar(45) NOT NULL,
  `latitude` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlocalizacao`),
  KEY `localiza_disp_idx` (`dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idpessoa`, `nome`, `email`, `telefone`) VALUES
(7, 'Rodrigo', 'contato@patricklobo.com', '3232-1931'),
(8, 'Patrick', 'contato@patricklobo.com', '3232-1931'),
(9, 'Rodrigo', 'contato@patricklobo.com', '3232-1931');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao`
--

CREATE TABLE IF NOT EXISTS `relacao` (
  `idrelacao` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dispositivo` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrelacao`),
  UNIQUE KEY `unico` (`usuario`,`dispositivo`),
  KEY `dispositivo_pertence_idx` (`dispositivo`),
  KEY `usuario_pertence_idx` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acao_dispositivo`
--
ALTER TABLE `acao_dispositivo`
  ADD CONSTRAINT `acao_disp_acao` FOREIGN KEY (`acao`) REFERENCES `acao` (`idacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acao_disp_disp` FOREIGN KEY (`dispositivo`) REFERENCES `dispositivo` (`iddispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `hist_acao` FOREIGN KEY (`acao`) REFERENCES `acao` (`idacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hist_dispo` FOREIGN KEY (`dispositivo`) REFERENCES `dispositivo` (`iddispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hist_user` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `localiza_disp` FOREIGN KEY (`dispositivo`) REFERENCES `dispositivo` (`iddispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `relacao`
--
ALTER TABLE `relacao`
  ADD CONSTRAINT `usuario_pertence` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dispositivo_pertence` FOREIGN KEY (`dispositivo`) REFERENCES `dispositivo` (`iddispositivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
