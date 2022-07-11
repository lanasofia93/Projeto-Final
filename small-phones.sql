CREATE DATABASE small-phones;

USE small-phones;

CREATE TABLE `Atendimento` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `ID_tecnico` int(11) DEFAULT NULL,
  `ID_remetente` int(11) NOT NULL,
  `nome_remetente` varchar(200) DEFAULT NULL,
  `email_remetente` varchar(150) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `data_prazo` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Aguardando',
  `aceito` tinyint(1) NOT NULL DEFAULT 0,
  `concluido` tinyint(1) NOT NULL DEFAULT 0,
  `prazo` tinyint(1) NOT NULL DEFAULT 0,
  `adiado` tinyint(1) NOT NULL DEFAULT 0,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descricao` varchar(5000) DEFAULT NULL,
  `endereco` varchar(2000) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `Tecnico` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `formacao` varchar(200) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(2000) DEFAULT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `idade` int(11) NOT NULL,
  `endereco` varchar(2000) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `imagem` varchar(250) NOT NULL DEFAULT 'user-profile.png',
  `area_atuacao` varchar(200) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `Usuario` (
  `ID` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `idade` int(11) NOT NULL,
  `endereco` varchar(1000) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(2000) NOT NULL,
  `imagem` varchar(250) NOT NULL DEFAULT 'user-profile.png',
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `Atendimento`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `Tecnico`
  ADD PRIMARY KEY (`matricula`);

ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `Atendimento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Tecnico`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
