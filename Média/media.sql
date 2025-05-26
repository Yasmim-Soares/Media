-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/05/2025 às 03:11
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
-- Banco de dados: `media`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECIONAR_MEDIA` ()   BEGIN
   SELECT * FROM   semestre;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SELECIONAR_SEMESTRE` ()   BEGIN
   SELECT media FROM semestre;
   END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `nota1` decimal(10,2) NOT NULL,
  `nota2` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notas`
--

INSERT INTO `notas` (`id`, `nome_aluno`, `nota1`, `nota2`) VALUES
(1, 'Yasmim', 6.00, 6.00),
(4, 'Yasmim', 6.00, 6.00),
(5, 'Eduardo', 10.00, 10.00),
(7, 'Eduardo', 10.00, 10.00),
(8, 'Eduardo', 10.00, 10.00),
(9, 'Eduardo', 10.00, 10.00),
(10, '', 0.00, 0.00);

--
-- Acionadores `notas`
--
DELIMITER $$
CREATE TRIGGER `calcular_media_after_insert` AFTER INSERT ON `notas` FOR EACH ROW BEGIN
    DECLARE media DECIMAL(10,2);
    
    -- Calcular a média das duas notas
    SET media = (NEW.nota1 + NEW.nota2) / 2;
    
    -- Inserir os dados na tabela semestre
    INSERT INTO semestre (nome_aluno, nota1, nota2, media)
    VALUES (NEW.nome_aluno, NEW.nota1, NEW.nota2, media);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deletar_dados_media_after_delete` AFTER DELETE ON `notas` FOR EACH ROW BEGIN
    -- Deletar o registro correspondente na tabela semestre usando ID
    DELETE FROM semestre 
    WHERE id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `nota1` decimal(10,2) NOT NULL,
  `nota2` decimal(10,2) NOT NULL,
  `media` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `semestre`
--

INSERT INTO `semestre` (`id`, `nome_aluno`, `nota1`, `nota2`, `media`) VALUES
(1, 'Yasmim', 6.00, 6.00, 6.00),
(4, 'Yasmim', 6.00, 6.00, 6.00),
(5, 'Eduardo', 10.00, 10.00, 10.00),
(7, 'Eduardo', 10.00, 10.00, 10.00),
(8, 'Eduardo', 10.00, 10.00, 10.00),
(9, 'Eduardo', 10.00, 10.00, 10.00),
(10, '', 0.00, 0.00, 0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
