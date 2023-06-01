-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2023 às 14:02
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
(1, 'Construção'),
(2, 'Educação'),
(3, 'Digital'),
(4, 'Elétrica'),
(5, 'Cuidados'),
(6, 'Outros');

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
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `email`, `telefone`) VALUES
(0, 'pedrulucas@gmail.com', '88996917447'),
(1, 'pedrulucas000@gmail.com', '88999213838'),
(2, 'sarahnithaelly@gmail.com', NULL),
(3, 'sarahnithaelly00@gmail.com', NULL),
(4, 'pedrulucas00@gmail.com', NULL),
(5, 'lucas_borges06@hotmail.com', NULL),
(6, 'yaragatona02@gmail.com', NULL),
(7, 'kaleu@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `habilidade` varchar(40) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `idioma` varchar(15) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idioma`
--

INSERT INTO `idioma` (`id`, `idioma`, `id_usuario`) VALUES
(0, 'Inglês', NULL),
(1, 'Português', NULL),
(2, 'Português', NULL),
(3, 'Português', NULL),
(4, 'Português', NULL),
(5, 'dsss', NULL),
(6, 'nrgb', NULL),
(7, 'fvdcs', NULL),
(8, 'Matemática', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `notas` decimal(2,1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notas`
--

INSERT INTO `notas` (`id`, `notas`, `id_usuario`, `dt`) VALUES
(1, 4.0, 5, '2023-05-29'),
(2, 2.0, 5, '2023-05-29'),
(3, 3.0, 1, '2023-05-29'),
(4, 4.0, 4, '2023-05-29'),
(5, 3.0, 4, '2023-05-30'),
(6, 4.0, 4, '2023-05-30'),
(7, 3.0, 4, '2023-05-30'),
(8, 3.0, 4, '2023-05-30'),
(9, 5.0, 4, '2023-05-30'),
(10, NULL, 4, '2023-05-30'),
(11, 3.0, 4, '2023-05-30'),
(12, 3.0, 4, '2023-05-30'),
(13, 5.0, 4, '2023-05-30'),
(14, 3.0, 4, '2023-05-30'),
(15, 4.0, 4, '2023-05-30');

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
  `contato` varchar(55) DEFAULT NULL,
  `serv_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`id`, `id_categoria`, `id_usuario`, `id_cidade`, `nome`, `valor`, `descricao`, `estado`, `horario`, `img_servico`, `contato`, `serv_status`) VALUES
(50, 0, 1, 0, 'sdsdsdsds', 0.00, 'tryfu', 0, 'manhã', '0395f9f95a3a4dc61707200dddabe5da', 'sarahnithaelly@gmail.com ', 1),
(52, 1, 1, 0, 'Teste1', 0.00, 'bfvdc', 0, '', 'general_work.svg', 'sarahnithaelly@gmail.com ', 1),
(53, 3, 1, 0, 'Professora ', 0.00, 'yrter', 1, 'manhã', 'general_work.svg', 'sarahnithaelly@gmail.com ', 1),
(54, 4, 1, 0, 'Teste 2', 2.00, 'fcghjbk', 0, 'Tarde', 'edc113645b0385e60d3e0e90e77b1502.jpg', 'sarahnithaelly@gmail.com ', 1),
(55, 1, 1, 0, 'sdsdsdsds', 10.00, 'hg fgds', 0, 'Tarde', 'general_work.svg', 'sarahnithaelly@gmail.com ', 1),
(56, 1, 1, 0, 'sdsdsdsds', 10.00, 'ervwc', 0, 'manhã', 'general_work.svg', 'sarahnithaelly@gmail.com ', 1),
(57, 2, 1, 0, 'Teste', 10.00, 'ybrtv', 0, 'manhã', 'f3881886ec1116809f2b65802f708d55', 'sarahnithaelly@gmail.com ', 1),
(58, 5, 1, 0, 'Professora ', 10.00, ' fvdcs', 0, 'manhã', '52b5dfb6afe31dba2fccc0a04fab7987', 'sarahnithaelly@gmail.com ', 1),
(59, 6, 1, 0, 'Professora ', 15.00, 'çlik,umjynh', 0, 'manhã', 'e3fc56788f1fe9ef4a9d61eea2d8b6fa', '88999213838', 1),
(61, 2, 4, 0, 'Aulas de Programacao', 60.00, 'Dou aulas de PHP!', 0, 'Noite', 'cbbb7835c98c6d41b326e97720cbf314', '88996917447', 1),
(62, 2, 4, 0, 'Lucasprog', 45.00, 'Educ', 1, 'Tarde', 'd4ae6847df735ac5f0c4cd883d2471f2', 'lucas_borges06@hotmail.com ', 1);

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
(20, 0, 54),
(22, 0, 55),
(23, 0, 59),
(30, 5, 62),
(31, 6, 62);

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicosfeitos`
--

CREATE TABLE `servicosfeitos` (
  `id` int(11) NOT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicosfeitos`
--

INSERT INTO `servicosfeitos` (`id`, `valor`, `id_usuario`, `dt`) VALUES
(1, 2.00, 1, '0000-00-00'),
(2, 1.00, 1, '0000-00-00'),
(3, 0.00, 1, '2023-05-25'),
(4, 12.00, 1, '2023-05-24'),
(5, 10.00, 1, '2023-05-26'),
(6, 15.00, 1, '2023-05-26'),
(7, 589.00, 4, '2023-05-29'),
(8, 45.00, 4, '2023-05-30'),
(9, 60.00, 4, '2023-05-30'),
(10, 45.00, 4, '2023-05-30'),
(11, 60.00, 4, '2023-05-30'),
(12, 45.00, 4, '2023-05-30');

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
(0, 1, 8, 0, '2001-04-25', 'Front End Mentor', '08445032313', 1, 'Kogamians eu gosto!', 'Pedrol', 'pedro456', 'f8c630c43032d26f872b54aeddcc022a.png', 'Lucas Borges', NULL),
(1, 2, 8, 0, '2001-04-25', 'Front End Mentor', '08778963213', 1, 'Kogamians eu gosto!', 'Pedrol', 'pedro456', 'f8c630c43032d26f872b54aeddcc022a.png', 'Lucas Borges', NULL),
(2, 3, 8, 0, '2001-04-25', 'Front End Mentor', '15978945613', 1, 'Kogamians eu gosto!', 'Pedrol', 'pedro456', 'f8c630c43032d26f872b54aeddcc022a.png', 'Lucas Borges', NULL),
(3, 4, 8, 0, '2001-04-25', 'Front End Mentor', '08445032312', 1, 'Kogamians eu gosto!', 'Pedrol', 'pedro456', 'f8c630c43032d26f872b54aeddcc022a.png', 'Lucas Borges', NULL),
(4, 5, 8, 0, '2002-09-06', 'Front End Mentor', '06907484340', 1, 'Kogamians eu gosto!', 'lucasRep01', '12345678', 'f8c630c43032d26f872b54aeddcc022a.png', 'Lucas Borges', NULL),
(5, 6, NULL, 0, '2202-09-06', NULL, '87458965874', 0, NULL, 'yaratopzera', '12345678', NULL, NULL, NULL),
(6, 7, NULL, 0, '2001-08-05', NULL, '06908458420', 0, NULL, 'kaleu', '12345678', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- Índices de tabela `servicosfeitos`
--
ALTER TABLE `servicosfeitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT de tabela `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `servicoavaliar`
--
ALTER TABLE `servicoavaliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `servicosfeitos`
--
ALTER TABLE `servicosfeitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `idioma`
--
ALTER TABLE `idioma`
  ADD CONSTRAINT `idioma_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

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
-- Restrições para tabelas `servicosfeitos`
--
ALTER TABLE `servicosfeitos`
  ADD CONSTRAINT `servicosfeitos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

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
