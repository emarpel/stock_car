-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Dez-2023 às 20:54
-- Versão do servidor: 10.2.44-MariaDB-log
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `budaweb_stockcar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `audit`
--

CREATE TABLE `audit` (
  `auditId` int(11) NOT NULL,
  `auditUserId` int(11) NOT NULL,
  `auditDate` date NOT NULL,
  `auditHour` time NOT NULL,
  `auditPage` varchar(50) NOT NULL,
  `auditTypeAction` varchar(50) NOT NULL,
  `auditAction` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `audit`
--

INSERT INTO `audit` (`auditId`, `auditUserId`, `auditDate`, `auditHour`, `auditPage`, `auditTypeAction`, `auditAction`) VALUES
(1, 0, '2023-08-06', '22:46:00', 'page/users/listUsers', 'insert', 'Usuário:  Cadastrado.'),
(2, 0, '2023-08-06', '23:01:00', 'page/users/listUsers', 'delete', 'Usuário:  Deletado.'),
(3, 0, '2023-08-06', '23:01:00', 'page/users/listUsers', 'insert', 'Usuário:  Cadastrado.'),
(4, 0, '2023-08-06', '23:01:00', 'page/users/listUsers', 'delete', 'Usuário:  Deletado.'),
(5, 0, '2023-08-06', '23:04:00', 'page/users/listUsers', 'insert', 'Usuário:  Cadastrado.'),
(6, 0, '2023-08-06', '23:08:00', 'page/users/listUsers', 'delete', 'Usuário:  Deletado.'),
(7, 0, '2023-08-07', '13:35:00', 'page/users/listUsers', 'insert', 'Usuário: asdasdasd Cadastrado.'),
(8, 0, '2023-08-07', '13:35:00', 'page/users/listUsers', 'delete', 'Usuário: asdasdasd Deletado.'),
(9, 0, '2023-09-05', '14:23:00', 'page/users/listUsers', 'insert', 'Usuário: teste Cadastrado.'),
(10, 0, '2023-09-14', '20:17:00', 'page/users/listUsers', 'delete', 'Usuário: teste Deletado.'),
(11, 0, '2023-09-14', '20:18:00', 'page/users/listUsers', 'insert', 'Usuário: Vendedor Cadastrado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configurations`
--

CREATE TABLE `configurations` (
  `configId` int(11) NOT NULL,
  `configSystemName` varchar(20) NOT NULL,
  `configSystemFantasy` varchar(100) NOT NULL,
  `configSystemPhone` varchar(20) NOT NULL,
  `configSystemCNPJ` varchar(30) NOT NULL,
  `configSystemCity` varchar(50) NOT NULL,
  `configPasswordMaster` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `configurations`
--

INSERT INTO `configurations` (`configId`, `configSystemName`, `configSystemFantasy`, `configSystemPhone`, `configSystemCNPJ`, `configSystemCity`, `configPasswordMaster`) VALUES
(1, 'Stock Car', 'STOCK CAR', '(75) 9 9293-0989', '00.000.000-0001-00', 'PAULO AFONSO - BA', 'd3b5a650792466659edc4ce7758712dc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dashboard`
--

CREATE TABLE `dashboard` (
  `dashboardId` int(11) NOT NULL,
  `dashboardType` varchar(200) NOT NULL,
  `dashboardDescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dashboard`
--

INSERT INTO `dashboard` (`dashboardId`, `dashboardType`, `dashboardDescription`) VALUES
(1, 'security', 'Para a sua segurança, a senha padrão é gerada automaticamente pelo sistema e deverá ser alterada para uma de sua preferência ao acessar o sistema pela primeira vez.'),
(5, 'summary', 'Este sistema foi desenvolvido e é mantido por BudaWeb.\r\nAtenciosamente,<br />\r\nDavid Góis - Desenvolvedor Full Stack');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userCPF` varchar(20) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `userCellphone` varchar(20) NOT NULL,
  `userLogin` varchar(20) NOT NULL,
  `userPermission` int(11) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userChangePassword` tinyint(1) NOT NULL DEFAULT 1,
  `userDateCadastre` date NOT NULL,
  `userStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userId`, `userName`, `userCPF`, `userMail`, `userCellphone`, `userLogin`, `userPermission`, `userPassword`, `userChangePassword`, `userDateCadastre`, `userStatus`) VALUES
(1, 'DAVID MARCELO GÓIS SILVA', '002.344.035-00', 'EMARPEL@GMAIL.COM', '(75) 9 9293-0989', 'buda', 20, '0c5cf3ef6c886ca8d37b5583d737527f', 0, '2023-08-06', 1),
(9, 'Vendedor', '123.123.123-12', 'vendedor@budaweb.com.br', '00 0 0000-0000', 'vendedor', 1, 'stockcar123', 1, '2023-09-14', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`auditId`);

--
-- Índices para tabela `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`configId`);

--
-- Índices para tabela `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`dashboardId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userLogin` (`userLogin`),
  ADD UNIQUE KEY `userCPF` (`userCPF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `audit`
--
ALTER TABLE `audit`
  MODIFY `auditId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `configurations`
--
ALTER TABLE `configurations`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `dashboardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
