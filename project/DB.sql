-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 11:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MeduriBiblioteca`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addPhone` (IN `Numero` BIGINT, `Cliente` VARCHAR(20))   BEGIN
  INSERT INTO tTelefono (Numero, Cliente) 
  VALUES (Numero,Cliente);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPrenotazione` (IN `Prodotto` VARCHAR(13), `Cliente` VARCHAR(20))   BEGIN
	INSERT into tRichiesta (Prodotto, Cliente, Data)
    VALUES (Prodotto, Cliente, CURDATE());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `CodiceFiscale` VARCHAR(20), IN `Nome` VARCHAR(15), IN `Cognome` VARCHAR(15), IN `Email` VARCHAR(40), IN `Password` VARCHAR(100))   BEGIN
  INSERT INTO tCliente (CodiceFiscale, Nome, Cognome, Email, Password)
  VALUES (CodiceFiscale, Nome, Cognome, Email, Password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminaPrenotazione` (IN `ISBN` VARCHAR(13), `Cliente` VARCHAR(20))   BEGIN
	DELETE FROM tRichiesta 
    WHERE Prodotto = ISBN AND Cliente = Cliente;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tAccettazione`
--

CREATE TABLE `tAccettazione` (
  `id` int(11) NOT NULL,
  `Richiesta` int(11) NOT NULL,
  `Addetto` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tAddetto`
--

CREATE TABLE `tAddetto` (
  `id` int(11) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tAutore`
--

CREATE TABLE `tAutore` (
  `id` int(11) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tCasaEditrice`
--

CREATE TABLE `tCasaEditrice` (
  `id` int(11) NOT NULL,
  `Nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tCliente`
--

CREATE TABLE `tCliente` (
  `CodiceFiscale` varchar(20) NOT NULL,
  `Nome` varchar(15) NOT NULL,
  `Cognome` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tProdotto`
--

CREATE TABLE `tProdotto` (
  `ISBN` varchar(13) NOT NULL,
  `Titolo` varchar(50) NOT NULL,
  `AnnoPubblicazione` int(4) NOT NULL,
  `Autore` int(11) NOT NULL,
  `CasaEditrice` int(11) NOT NULL,
  `NPagine` int(4) NOT NULL,
  `Descrizione` text NOT NULL,
  `PathFoto` varchar(50) DEFAULT NULL,
  `isLibro` tinyint(1) NOT NULL DEFAULT 1,
  `AnnoRiferimento` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tRestituzione`
--

CREATE TABLE `tRestituzione` (
  `id` int(11) NOT NULL,
  `Accettazione` int(11) NOT NULL,
  `Addetto` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tRichiesta`
--

CREATE TABLE `tRichiesta` (
  `id` int(11) NOT NULL,
  `Prodotto` varchar(13) NOT NULL,
  `Cliente` varchar(20) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tTelefono`
--

CREATE TABLE `tTelefono` (
  `Numero` bigint(20) NOT NULL,
  `Prefisso` int(3) NOT NULL DEFAULT 39,
  `Cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tAccettazione`
--
ALTER TABLE `tAccettazione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Addetto` (`Addetto`),
  ADD KEY `Richiesta` (`Richiesta`);

--
-- Indexes for table `tAddetto`
--
ALTER TABLE `tAddetto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tAutore`
--
ALTER TABLE `tAutore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tCasaEditrice`
--
ALTER TABLE `tCasaEditrice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tCliente`
--
ALTER TABLE `tCliente`
  ADD PRIMARY KEY (`CodiceFiscale`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tProdotto`
--
ALTER TABLE `tProdotto`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `CasaEditrice` (`CasaEditrice`),
  ADD KEY `Autore` (`Autore`);

--
-- Indexes for table `tRestituzione`
--
ALTER TABLE `tRestituzione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Addetto` (`Addetto`),
  ADD KEY `Accettazione` (`Accettazione`);

--
-- Indexes for table `tRichiesta`
--
ALTER TABLE `tRichiesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cliente` (`Cliente`),
  ADD KEY `Prodotto` (`Prodotto`);

--
-- Indexes for table `tTelefono`
--
ALTER TABLE `tTelefono`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `Cliente` (`Cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tAccettazione`
--
ALTER TABLE `tAccettazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tAddetto`
--
ALTER TABLE `tAddetto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tAutore`
--
ALTER TABLE `tAutore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tCasaEditrice`
--
ALTER TABLE `tCasaEditrice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tRestituzione`
--
ALTER TABLE `tRestituzione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tRichiesta`
--
ALTER TABLE `tRichiesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tAccettazione`
--
ALTER TABLE `tAccettazione`
  ADD CONSTRAINT `tAccettazione_ibfk_1` FOREIGN KEY (`Addetto`) REFERENCES `tAddetto` (`id`),
  ADD CONSTRAINT `tAccettazione_ibfk_2` FOREIGN KEY (`Richiesta`) REFERENCES `tRichiesta` (`id`);

--
-- Constraints for table `tProdotto`
--
ALTER TABLE `tProdotto`
  ADD CONSTRAINT `tProdotto_ibfk_1` FOREIGN KEY (`CasaEditrice`) REFERENCES `tCasaEditrice` (`id`),
  ADD CONSTRAINT `tProdotto_ibfk_2` FOREIGN KEY (`Autore`) REFERENCES `tAutore` (`id`);

--
-- Constraints for table `tRestituzione`
--
ALTER TABLE `tRestituzione`
  ADD CONSTRAINT `tRestituzione_ibfk_1` FOREIGN KEY (`Addetto`) REFERENCES `tAddetto` (`id`),
  ADD CONSTRAINT `tRestituzione_ibfk_2` FOREIGN KEY (`Accettazione`) REFERENCES `tAccettazione` (`id`);

--
-- Constraints for table `tRichiesta`
--
ALTER TABLE `tRichiesta`
  ADD CONSTRAINT `tRichiesta_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `tCliente` (`CodiceFiscale`),
  ADD CONSTRAINT `tRichiesta_ibfk_2` FOREIGN KEY (`Prodotto`) REFERENCES `tProdotto` (`ISBN`);

--
-- Constraints for table `tTelefono`
--
ALTER TABLE `tTelefono`
  ADD CONSTRAINT `tTelefono_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `tCliente` (`CodiceFiscale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
