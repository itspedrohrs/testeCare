-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Mar-2021 às 21:03
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_care`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `recipient`
--

CREATE TABLE `recipient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(30) NOT NULL,
  `place` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `district` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `idCounty` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numberRecipient` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `recipient`
--

INSERT INTO `recipient` (`id`, `name`, `cpf_cnpj`, `place`, `number`, `district`, `county`, `idCounty`, `state`, `zipCode`, `country`, `email`, `numberRecipient`, `date_created`) VALUES
(53, 'Leonardo da Silva Diuncanse', '', 'Rua Geraldo Vieira', '068', 'Jardim Aquarius', '', 3549904, 'SP', 12246024, '1058', 'leonardo.diuncanse@care-br.com', 9, '2021-03-18 00:00:15'),
(56, 'SAMSUNG ELETRONICA DA AMAZONIA LTDA', '00280273002938', 'Avenida Antonio Candido Machado', '3100', 'Jordanesia', '', 3509205, 'SP', 7776415, '1058', '', 1, '2021-03-18 00:00:29');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `recipient`
--
ALTER TABLE `recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
