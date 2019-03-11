--
-- Database: `printers`
--

CREATE DATABASE IF NOT EXISTS `printers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `printers`;

--
-- Estrutura da tabela `contadores`
--

CREATE TABLE `contadores` (
  `idContador_pk` int(11) NOT NULL,
  `idEquipamento_fk` int(11) NOT NULL,
  `dataContador` datetime NOT NULL,
  `contTotal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `idEquipamento_pk` int(11) NOT NULL,
  `equipNome` varchar(45) NOT NULL,
  `equipIP` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `contadores`
--
ALTER TABLE `contadores`
  ADD PRIMARY KEY (`idContador_pk`),
  ADD UNIQUE KEY `idContador_UNIQUE` (`idContador_pk`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`idEquipamento_pk`),
  ADD UNIQUE KEY `idEquipamento_UNIQUE` (`idEquipamento_pk`);
