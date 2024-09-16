-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/08/2023 às 00:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tccbanco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`idadmin`, `email`, `senha`, `nome`) VALUES
(1, 'rafael@rafael.com', '123', 'Rafael Gomes'),
(2, 'anapaula@anapaula.com', '123', 'Ana PAula');

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal`
--

CREATE TABLE `animal` (
  `idanimal` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cor_pelo` varchar(20) NOT NULL,
  `tamanho` varchar(15) NOT NULL,
  `vermifugacao` varchar(15) DEFAULT NULL,
  `vacinas` varchar(15) NOT NULL,
  `castrado` varchar(15) NOT NULL,
  `raca_idraca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `idimagem` int(11) NOT NULL,
  `nomeimagem` varchar(45) NOT NULL,
  `animal_idanimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_adocao`
--

CREATE TABLE `pedido_adocao` (
  `idpedido_adocao` int(11) NOT NULL,
  `animal_idanimal` int(11) NOT NULL,
  `status_pedido` varchar(45) DEFAULT NULL,
  `usuarios_idusuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `idraca` int(11) NOT NULL,
  `nomeraca` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `raca`
--

INSERT INTO `raca` (`idraca`, `nomeraca`) VALUES
(3, 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuarios` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `experienciasantigas` varchar(45) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `motivacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Índices de tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD KEY `fk_animal_raca1_idx` (`raca_idraca`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idimagem`),
  ADD KEY `fk_imagem_animal1_idx` (`animal_idanimal`);

--
-- Índices de tabela `pedido_adocao`
--
ALTER TABLE `pedido_adocao`
  ADD PRIMARY KEY (`idpedido_adocao`),
  ADD KEY `fk_pedido_adocao_animal1_idx` (`animal_idanimal`),
  ADD KEY `fk_pedido_adocao_usuarios1_idx` (`usuarios_idusuarios`);

--
-- Índices de tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`idraca`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idimagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_adocao`
--
ALTER TABLE `pedido_adocao`
  MODIFY `idpedido_adocao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `idraca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_id_raca` FOREIGN KEY (`raca_idraca`) REFERENCES `raca` (`idraca`);

--
-- Restrições para tabelas `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_animal1` FOREIGN KEY (`animal_idanimal`) REFERENCES `animal` (`idanimal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedido_adocao`
--
ALTER TABLE `pedido_adocao`
  ADD CONSTRAINT `fk_pedido_adocao_animal1` FOREIGN KEY (`animal_idanimal`) REFERENCES `animal` (`idanimal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_adocao_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuario` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
