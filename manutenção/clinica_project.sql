-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 02:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `cod_adm` int(11) NOT NULL,
  `CPF_adm` varchar(11) NOT NULL,
  `nome_adm` varchar(60) NOT NULL,
  `data_nasc_adm` date NOT NULL,
  `telefone_adm` varchar(14) NOT NULL,
  `cod_endereco` int(11) NOT NULL,
  `senha_adm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`cod_adm`, `CPF_adm`, `nome_adm`, `data_nasc_adm`, `telefone_adm`, `cod_endereco`, `senha_adm`) VALUES
(6, '70123222095', 'Alberto de La Cruz', '1983-05-22', '(41) 998657536', 1, '123lola'),
(7, '58883348044', 'Theodor Tadeu', '1999-07-18', '(41) 998657542', 2, 'sugar'),
(8, '52406035026', 'Ana Paula Fernandes', '1995-10-13', '(41) 998657543', 3, '987654'),
(9, '90419839020', 'Vincenzo Cassano', '1984-03-05', '(41) 998657544', 4, '654321'),
(10, '59936361067', 'Harry Potter', '1979-03-09', '(41) 998657545', 5, '748596'),
(11, '78965412363', 'Vininho', '2022-12-06', '(78) 965412369', 20, '246');

-- --------------------------------------------------------

--
-- Table structure for table `consulta_medico_view`
--

CREATE TABLE `consulta_medico_view` (
  `cod_consulta` int(11) NOT NULL,
  `data_consulta` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cod_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consulta_medico_view`
--

INSERT INTO `consulta_medico_view` (`cod_consulta`, `data_consulta`, `status`, `cod_medico`) VALUES
(1, '2022-10-22 19:00:00', 0, 1),
(2, '2022-11-15 15:30:00', 0, 2),
(3, '2022-12-06 20:00:00', 0, 3),
(4, '2023-05-02 16:15:00', 0, 4),
(5, '2023-05-10 08:00:00', 0, 5),
(6, '2023-06-01 22:00:00', 0, 1),
(7, '2023-07-02 16:30:00', 1, 2),
(8, '2023-07-07 11:00:00', 0, 3),
(9, '2023-02-25 09:00:00', 1, 4),
(10, '2023-02-28 14:15:00', 1, 5),
(11, '2022-12-06 16:46:00', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `consulta_paciente_view`
--

CREATE TABLE `consulta_paciente_view` (
  `cod_consulta_marcada` int(11) NOT NULL,
  `cod_consulta` int(11) NOT NULL,
  `cod_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consulta_paciente_view`
--

INSERT INTO `consulta_paciente_view` (`cod_consulta_marcada`, `cod_consulta`, `cod_paciente`) VALUES
(22, 1, 8),
(23, 2, 9),
(28, 3, 13),
(29, 6, 13),
(31, 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `cod_endereco` int(11) NOT NULL,
  `CEP` varchar(8) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento_endereco` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`cod_endereco`, `CEP`, `rua`, `bairro`, `numero`, `complemento_endereco`) VALUES
(1, '54789345', 'Rua Castelo Brás', 'Aldeia dos Camarás', '33', 'BL g APTO 16, PE, igreja velha'),
(2, '74670700', 'Rua Cotovia', 'Santa Genoveva', '564', 'casa, GO'),
(3, '79115800', 'Avenida Doutor Mário de Freitas', 'Parque dos Laranjais', '460', 'sobrado'),
(4, '72801800', 'Rua Maria Lourença', 'Setor Fumal', '1065', 'Casa de trás'),
(5, '79822590', 'Rua Márcio Paiva', 'Vila Toscana', '63', 'BL u APTO 90'),
(6, '37170972', 'Rua Doutor Sá Brito 44', 'Centro', '986', 'Andar de cima'),
(7, '68906856', 'Avenida Vitoria Regia', 'Cabralzinho', '45', 'N/A'),
(8, '69911701', 'Rua São Francisco', 'Bahia Nova', '953', 'N/A'),
(9, '92440072', 'Quadra K Um', 'Guajuviras', '99', 'quadra 12'),
(10, '68911052', 'Avenida Rio Vila Nova', 'Fazendinha', '103', 'N/A'),
(11, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(12, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(13, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(14, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(15, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(16, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(17, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(18, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(19, '12345678', 'rua jose aldei', 'osternak', '123', 'hjdhfjkashfjasfk'),
(20, '78965484', 'Estrela', 'Portao', '22', 'não é uma casa');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `cod_medico` int(11) NOT NULL,
  `nome_medico` varchar(60) NOT NULL,
  `CRM_medico` varchar(6) NOT NULL,
  `especialidade_medico` varchar(30) NOT NULL,
  `formacao_medico` varchar(50) NOT NULL,
  `complemento_medico` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`cod_medico`, `nome_medico`, `CRM_medico`, `especialidade_medico`, `formacao_medico`, `complemento_medico`) VALUES
(1, 'Alberto de La Cruz', '123456', 'Catarata', 'Graduação e phd', 'Fez residência no Hospital Albert Einstei e estudou em harvard'),
(2, 'Theodor Tadeu', '123462', 'Oftalmopediatria', 'Graduação e phd', 'Fez residência no Hospital Albert Einstei e estudou em harvard'),
(3, 'Ana Paula Fernandes', '123463', 'Órbita', 'Graduação , pós e mestrado', 'Fez residência no Hospital Pequeno Príncipe e foi voluntário na Cruz Vermelha'),
(4, 'Vincenzo Cassano', '123464', 'Oftalmopediatria', 'Graduação e phd', 'Fez residência no Hospital Trabalhador'),
(5, 'Harry Potter', '123465', 'Oftalmopediatria', 'Graduação e phd', 'Fez residência na enfermaria de Hogwarts');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `cod_paciente` int(11) NOT NULL,
  `CPF_paciente` varchar(11) NOT NULL,
  `nome_paciente` varchar(60) NOT NULL,
  `data_nasc_paciente` date NOT NULL,
  `telefone_paciente` varchar(14) NOT NULL,
  `cod_endereco` int(11) NOT NULL,
  `cod_plano_saude` int(11) NOT NULL,
  `senha_paciente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='login do paciente';

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`cod_paciente`, `CPF_paciente`, `nome_paciente`, `data_nasc_paciente`, `telefone_paciente`, `cod_endereco`, `cod_plano_saude`, `senha_paciente`) VALUES
(8, '35287017065', 'Rafael Alego', '2000-10-23', '(14) 996451232', 6, 1, 'love124'),
(9, '11832655059', 'Seokjin Kim', '1998-03-09', '(21) 988369465', 7, 2, 'predioazul'),
(10, '80132390043', 'Jimin Park', '2007-05-15', '(14) 986331234', 8, 6, 'racaocao'),
(11, '80984184058', 'Taehyung Kim', '1989-06-09', '(14) 997651235', 9, 8, 'bifebibi'),
(12, '64944835000', 'Yoongi Min', '1999-03-14', '(35) 996459645', 10, 7, 'hohoho'),
(13, '12345678915', 'jose almeida', '2022-09-21', '41992569456', 19, 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `plano_saude`
--

CREATE TABLE `plano_saude` (
  `cod_plano_saude` int(11) NOT NULL,
  `nome_plano_saude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plano_saude`
--

INSERT INTO `plano_saude` (`cod_plano_saude`, `nome_plano_saude`) VALUES
(1, 'Amil'),
(2, 'SulAmerica'),
(3, 'Unimed'),
(4, 'ICS'),
(5, 'Clinipan'),
(6, 'Parana Clinicas'),
(7, 'Bradesco'),
(8, 'Particular (não tenho plano)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`cod_adm`),
  ADD KEY `fk_cod_enderecoadm` (`cod_endereco`);

--
-- Indexes for table `consulta_medico_view`
--
ALTER TABLE `consulta_medico_view`
  ADD PRIMARY KEY (`cod_consulta`),
  ADD KEY `fk_cod_medico` (`cod_medico`);

--
-- Indexes for table `consulta_paciente_view`
--
ALTER TABLE `consulta_paciente_view`
  ADD PRIMARY KEY (`cod_consulta_marcada`),
  ADD UNIQUE KEY `cod_consulta` (`cod_consulta`),
  ADD KEY `fk_cod_consulta` (`cod_consulta`),
  ADD KEY `fk_cod_paciente` (`cod_paciente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`cod_endereco`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`cod_medico`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cod_paciente`),
  ADD KEY `fk_cod_plano_saude` (`cod_plano_saude`),
  ADD KEY `fk_cod_endereco` (`cod_endereco`);

--
-- Indexes for table `plano_saude`
--
ALTER TABLE `plano_saude`
  ADD PRIMARY KEY (`cod_plano_saude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `cod_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `consulta_medico_view`
--
ALTER TABLE `consulta_medico_view`
  MODIFY `cod_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `consulta_paciente_view`
--
ALTER TABLE `consulta_paciente_view`
  MODIFY `cod_consulta_marcada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `cod_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `cod_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plano_saude`
--
ALTER TABLE `plano_saude`
  MODIFY `cod_plano_saude` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adm`
--
ALTER TABLE `adm`
  ADD CONSTRAINT `fk_cod_enderecoadm` FOREIGN KEY (`cod_endereco`) REFERENCES `endereco` (`cod_endereco`);

--
-- Constraints for table `consulta_medico_view`
--
ALTER TABLE `consulta_medico_view`
  ADD CONSTRAINT `fk_cod_medico` FOREIGN KEY (`cod_medico`) REFERENCES `medico` (`cod_medico`);

--
-- Constraints for table `consulta_paciente_view`
--
ALTER TABLE `consulta_paciente_view`
  ADD CONSTRAINT `fk_cod_consulta` FOREIGN KEY (`cod_consulta`) REFERENCES `consulta_medico_view` (`cod_consulta`),
  ADD CONSTRAINT `fk_cod_paciente` FOREIGN KEY (`cod_paciente`) REFERENCES `paciente` (`cod_paciente`);

--
-- Constraints for table `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_cod_endereco` FOREIGN KEY (`cod_endereco`) REFERENCES `endereco` (`cod_endereco`),
  ADD CONSTRAINT `fk_cod_plano_saude` FOREIGN KEY (`cod_plano_saude`) REFERENCES `plano_saude` (`cod_plano_saude`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
