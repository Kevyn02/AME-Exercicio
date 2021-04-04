-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2021 às 02:03
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ame_exercicio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `CD_FUNCIONARIO` int(11) NOT NULL,
  `NR_MATRICULA` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `DT_ADMISSAO` date NOT NULL,
  `CD_FK_SETOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`CD_FUNCIONARIO`, `NR_MATRICULA`, `NOME`, `DT_ADMISSAO`, `CD_FK_SETOR`) VALUES
(1, 100001, 'MAIRA MARTINHO LAUREANO', '2001-04-15', 2),
(2, 100002, 'GIANI CALDAS MATOS', '2001-04-15', 2),
(3, 100003, 'GENESIA AREOSA DAMASCENO', '2001-05-01', 2),
(4, 100004, 'VANESSA ALMADA MONTEIRO', '2001-05-10', 2),
(5, 100005, 'IOAN BELCHIORINHO GINJEIRA', '2001-07-22', 1),
(6, 100006, 'ROSARINHO PADILHA PESEIRO', '2001-07-10', 3),
(7, 100007, 'EMANUELLE GRANGEIA VIANA', '2001-08-13', 3),
(8, 100008, 'YASSNA PROENCA BOUCAS', '2001-09-03', 4),
(11, 100009, 'MATEO REGALADO RABELO', '2002-02-04', 6),
(12, 100010, 'ROBERT EIRO OLEIRO', '2002-02-04', 6),
(13, 100011, 'BARTOLOMEU BOGADO FRANCA', '2002-03-05', 7),
(14, 100012, 'MARCO MAGALHAES BERNARDES', '2002-03-11', 5),
(15, 100013, 'RUAN COVILHA BRITO', '2003-05-05', 1),
(16, 100014, 'DEISE TABORDA CAIADO', '2003-06-02', 8),
(17, 100015, 'MARVIN RAMIRES CORTES', '2003-06-02', 8),
(18, 100016, 'EDUARDA FLAVIO PECANHA', '2003-06-02', 8),
(19, 100017, 'IULIAN PASSOS VILARINHO', '2003-06-02', 8),
(20, 100018, 'CLAUDIO GRAVATO FRANQUEIRA', '2003-07-07', 4),
(21, 100019, 'GEOVANNA PORTO LIMA', '2003-08-05', 2),
(22, 100020, 'JANUARIO ATILANO SANTANA', '2003-08-05', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `CD_SETOR` int(11) NOT NULL,
  `NM_SETOR` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`CD_SETOR`, `NM_SETOR`) VALUES
(1, 'INFORMATICA'),
(2, 'RECEPCAO'),
(3, 'RECURSOS HUMANOS'),
(4, 'CONTABILIDADE'),
(5, 'FINANCEIRO'),
(6, 'PORTARIA'),
(7, 'DIRETORIA'),
(8, 'CALL CENTER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `CD_USUARIO` int(11) NOT NULL,
  `USER` varchar(50) NOT NULL,
  `NM_USUARIO` varchar(200) NOT NULL,
  `TP_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`CD_USUARIO`, `USER`, `NM_USUARIO`, `TP_USUARIO`) VALUES
(1, 'USUARIO', 'USUARIO COMUM', 0),
(2, 'ADMINISTRADOR', 'USUARIO ADMINISTRADOR', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`CD_FUNCIONARIO`),
  ADD UNIQUE KEY `NR_MATRICULA` (`NR_MATRICULA`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`CD_SETOR`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CD_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `CD_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `CD_SETOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CD_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
