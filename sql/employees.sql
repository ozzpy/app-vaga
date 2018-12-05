-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Dez-2018 às 13:38
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.1.24-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testevaga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `age` int(2) NOT NULL,
  `role` varchar(64) NOT NULL,
  `hiring_date` date NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `name`, `age`, `role`, `hiring_date`, `company`) VALUES
(1, 'Maria', 26, 'recepcionista', '2017-01-27', 'Empresa A'),
(2, 'Thiago', 30, 'técnico', '2018-06-04', 'Empresa B'),
(3, 'Roberto', 24, 'técnico', '2013-02-14', 'Empresa B'),
(4, 'Andreia', 32, 'gerente', '2015-02-01', 'Empresa A'),
(5, 'Jeferson', 32, 'gestor', '2011-08-03', 'Empresa A'),
(6, 'Alberto', 33, 'gestor', '2018-03-03', 'Empresa B'),
(8, 'marta', 26, 'gestor', '2015-01-28', 'Empresa J'),
(9, 'ede', 26, 'recepcionista', '2015-01-28', 'Empresa J');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
