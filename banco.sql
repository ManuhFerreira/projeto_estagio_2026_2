-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/09/2026 às 04:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_estagio_2026_2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpessoas`
--

CREATE TABLE `tbpessoas` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `parcelas` varchar(50) NOT NULL,
  `observacoes` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `parcelaspagas` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbpessoas`
--

INSERT INTO `tbpessoas` (`id`, `nomecompleto`, `nascimento`, `cpf`, `celular`, `cidade`, `parcelas`, `observacoes`, `status`, `nome`, `parcelaspagas`) VALUES
(8, 'Emanuele Rodrigues Ferreira', '2006-06-07', '150.437.366-90', '(38) 99999-4161', 'Montes Claros - MG', '10', 'Não há.', 'PENDENTE', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbpessoas`
--
ALTER TABLE `tbpessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
