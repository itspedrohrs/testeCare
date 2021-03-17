-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Mar-2021 às 21:05
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
-- Estrutura da tabela `invoice`
--

CREATE TABLE `invoice` (
  `id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total_value` float NOT NULL,
  `id_recipient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `total_value`, `id_recipient`) VALUES
('NFe35201209066241000884550010000201701856793856', '2020-12-18', 1883.14, 56),
('NFe35210109066241000884550010000239271131415750', '2021-01-19', 840, 55),
('NFe35210109066241000884550010000239701493068731', '2021-01-19', 840, 54),
('NFe35210109066241000884550010000247551442611532', '2021-01-22', 840, 53);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
