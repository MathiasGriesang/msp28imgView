-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 30/04/2018 às 04:48
-- Versão do servidor: 10.1.16-MariaDB
-- Versão do PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ova`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
--

CREATE TABLE `albuns` (
  `id` int(10) UNSIGNED NOT NULL,
  `album` varchar(120) CHARACTER SET utf8 NOT NULL,
  `data_publicacao` date NOT NULL,
  `data_alteracao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `img_video`
--

CREATE TABLE `img_video` (
  `id` int(10) UNSIGNED NOT NULL,
  `album` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `legenda` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `data_publicacao` date NOT NULL,
  `tipo_midia` tinyint(1) NOT NULL,
  `id_video` varchar(15) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `img_video`
--
ALTER TABLE `img_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `img_video`
--
ALTER TABLE `img_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
