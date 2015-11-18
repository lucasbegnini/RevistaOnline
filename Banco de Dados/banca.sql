-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2015 às 18:24
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `idAutor` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`idAutor`, `nome`) VALUES
(1, 'Lucas Begnini'),
(2, 'Neil Gaiman'),
(3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `idEditora` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`idEditora`, `nome`) VALUES
(1, 'UEA'),
(2, 'DC comics'),
(3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `revista`
--

CREATE TABLE IF NOT EXISTS `revista` (
  `idUser` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idEditora` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `url` text NOT NULL,
  `idRevista` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `revista`
--

INSERT INTO `revista` (`idUser`, `idAutor`, `idEditora`, `titulo`, `url`, `idRevista`) VALUES
(1, 1, 1, 'teste', 'users/Lucas Begnini/teste', 1),
(1, 1, 1, 'teste4', 'users/Lucas Begnini/teste4', 7),
(1, 2, 2, 'Sandman - Capas de Areia', 'users/Lucas Begnini/Sandman - Capas de Areia', 8),
(1, 3, 3, 'Action Comics SuperMan', 'users/Lucas Begnini/Action Comics SuperMan', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `nome`, `email`, `senha`) VALUES
(1, 'Lucas Begnini', 'lucasbegnini@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`idEditora`);

--
-- Indexes for table `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`idRevista`), ADD KEY `idUser` (`idUser`,`idAutor`,`idEditora`), ADD KEY `idAutor` (`idAutor`), ADD KEY `idEditora` (`idEditora`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `revista`
--
ALTER TABLE `revista`
  MODIFY `idRevista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `revista`
--
ALTER TABLE `revista`
ADD CONSTRAINT `revista_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
ADD CONSTRAINT `revista_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
ADD CONSTRAINT `revista_ibfk_3` FOREIGN KEY (`idEditora`) REFERENCES `editora` (`idEditora`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
