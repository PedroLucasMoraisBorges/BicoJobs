-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2023 às 13:50
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bicojobs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(0, 'Alimentação'),
(1, 'Construção');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `cep` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `cep`) VALUES
(0, 'Caririaçu'),
(1, 'Juazeiro do Norte'),
(2, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `email`, `telefone`, `id_usuario`) VALUES
(0, 'pedrulucas@gmail.com', '88997974194', NULL),
(1, 'pedrulucas000@gmail.com', '88999213838', NULL),
(2, 'sarahnithaelly@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `idioma` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idioma`
--

INSERT INTO `idioma` (`id`, `idioma`) VALUES
(0, 'Inglês'),
(1, 'Português'),
(2, 'Português'),
(3, 'Português'),
(4, 'Português');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `notas` decimal(2,1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `descricao` varchar(350) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `horario` varchar(20) DEFAULT NULL,
  `img_servico` varchar(50) DEFAULT NULL,
  `contato` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`id`, `id_categoria`, `id_usuario`, `id_cidade`, `nome`, `valor`, `descricao`, `estado`, `horario`, `img_servico`, `contato`) VALUES
(44, 0, 0, 0, 'sdsdsdsds', 2.00, 'dcfvghbj', 1, 'manhã', '10dd05da27f9c33aa13eef6272e2a00a.jpg', 'pedrulucas000@gmail.com '),
(45, 0, 0, 0, 'sdsdsdsds', 0.00, 'gvhbjnkm', 0, 'manhã', 'ae3d06e8a4c1a3798e07f063f7fc8128.jpg', 'pedrulucas000@gmail.com '),
(46, 1, 0, 0, 'sdsdsdsds', 0.00, 'ghjbkl', 0, 'manhã', '9d860aa66a2542be1fbd2b9e8c4e5a8a.jpg', '88999213838');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicoavaliar`
--

CREATE TABLE `servicoavaliar` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicoavaliar`
--

INSERT INTO `servicoavaliar` (`id`, `id_usuario`, `id_servico`) VALUES
(1, 0, 44);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_contato` int(11) DEFAULT NULL,
  `id_idioma` int(11) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `habilidades` varchar(35) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `descricao` varchar(350) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `img_perfil` varchar(100) DEFAULT NULL,
  `nome_comp` varchar(75) DEFAULT NULL,
  `quant_servicos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_contato`, `id_idioma`, `id_cidade`, `dt_nascimento`, `habilidades`, `cpf`, `tipo_usuario`, `descricao`, `nome`, `senha`, `img_perfil`, `nome_comp`, `quant_servicos`) VALUES
(0, 1, 0, 0, '2001-04-25', 'js', '08445032313', 1, 'Teste', 'Pedrol', 'pedro456', '5de28a8cb84398bf3b9c240d3ade99ee.jpg', 'PEDRO LUCAS DE MORAIS BORGES', NULL),
(1, 2, NULL, 0, '2001-04-25', NULL, '08778963213', 0, NULL, 'teste', 'pedro456', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cidade` (`id_cidade`);

--
-- Índices de tabela `servicoavaliar`
--
ALTER TABLE `servicoavaliar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contato` (`id_contato`),
  ADD KEY `id_idioma` (`id_idioma`),
  ADD KEY `id_cidade` (`id_cidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `servicoavaliar`
--
ALTER TABLE `servicoavaliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `servico_ibfk_3` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`);

--
-- Restrições para tabelas `servicoavaliar`
--
ALTER TABLE `servicoavaliar`
  ADD CONSTRAINT `servicoavaliar_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `servicoavaliar_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_idioma`) REFERENCES `idioma` (`id`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
