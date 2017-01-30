-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jan-2017 às 23:40
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Orlando Nascimento', 'orlandocorreia2@hotmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE IF NOT EXISTS `aluno_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Extraindo dados da tabela `aluno_curso`
--

INSERT INTO `aluno_curso` (`id`, `id_curso`, `id_aluno`) VALUES
(133, 1, 1),
(134, 2, 1),
(135, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `id_modulo`, `id_curso`, `ordem`, `tipo`) VALUES
(1, 1, 1, 1, 'video'),
(2, 1, 1, 2, 'video'),
(3, 2, 1, 1, 'video'),
(4, 3, 1, 1, 'poll'),
(5, 3, 1, 2, 'video'),
(12, 9, 1, 3, 'video'),
(13, 9, 1, 3, 'poll');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(37) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `imagem`, `descricao`) VALUES
(1, 'PHP', 'c07042ed4b24486eb0257e3a01920177.jpg', 'Curso de PHP'),
(2, 'HTML 5', 'a75ced982d749e8f48b33895871c091e.jpg', 'Curso de HTML 5'),
(3, 'JAVASCRIPT', '66d9371e27a9450170d5ba5f784ca679.jpg', 'Curso de JavaScript'),
(4, 'CSS', '8dfc2c04ce77cd3229903076a0920dad.jpg', 'Curso de CSS'),
(7, 'Swift', '0f9c6f77b3cf2ed1516662b6e17526b8.jpg', 'Curso de Swift'),
(8, 'Android', 'd2dac01f781092120cdbf7a39e04b4b8.jpg', 'Curso de Android'),
(12, 'Angularjs', 'f41d4a0a7fc63f9a69139a727a635abd.jpg', 'Curso de Angularjs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas`
--

CREATE TABLE IF NOT EXISTS `duvidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_duvida` datetime NOT NULL,
  `respondida` tinyint(4) NOT NULL,
  `duvida` text NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `duvidas`
--

INSERT INTO `duvidas` (`id`, `data_duvida`, `respondida`, `duvida`, `id_aluno`) VALUES
(1, '2017-01-18 21:59:46', 0, 'porque o video não funciona?', 1),
(2, '2017-01-18 22:05:43', 0, 'porque o video não funciona?', 1),
(3, '2017-01-18 22:06:53', 0, 'porque o video não funciona?', 1),
(4, '2017-01-18 22:06:55', 0, 'porque o video não funciona?', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `data_viewed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_aluno`, `id_aula`, `data_viewed`) VALUES
(22, 1, 1, '2017-01-30 19:21:56'),
(23, 1, 2, '2017-01-30 19:22:06'),
(24, 1, 3, '2017-01-30 19:22:12'),
(25, 1, 4, '2017-01-30 19:23:26'),
(26, 1, 5, '2017-01-30 19:23:35'),
(27, 1, 12, '2017-01-30 19:23:41'),
(28, 1, 13, '2017-01-30 19:23:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`, `id_curso`) VALUES
(1, 'Básico', 1),
(2, 'Intermediário', 1),
(3, 'Avançado', 1),
(9, 'Super Avancado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionarios`
--

CREATE TABLE IF NOT EXISTS `questionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aula` int(11) NOT NULL,
  `pergunta` varchar(100) NOT NULL,
  `opcao1` varchar(100) DEFAULT NULL,
  `opcao2` varchar(100) DEFAULT NULL,
  `opcao3` varchar(100) DEFAULT NULL,
  `opcao4` varchar(100) DEFAULT NULL,
  `resposta` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `questionarios`
--

INSERT INTO `questionarios` (`id`, `id_aula`, `pergunta`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `resposta`) VALUES
(1, 4, 'Qual é a pergunta?', 'Op1', 'Op2', 'Op3', 'Op4', 2),
(3, 13, 'Pergunta do super avançado', 'resposta 1', 'resposta 2', 'resposta 3', 'resposta 4', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'orlandocorreia2@hotmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aula` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `id_aula`, `nome`, `descricao`, `url`) VALUES
(1, 1, 'Aula 1', 'DescriÃ§Ã£o da aula 1 com vÃ­deo', '8802569'),
(2, 2, 'Aula 2', NULL, '8802569'),
(3, 3, 'Aula 3', NULL, '8802569'),
(4, 5, 'Aula 4', NULL, '8802569'),
(6, 7, 'Aula 6', NULL, '8802569'),
(9, 12, 'Super aula', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
