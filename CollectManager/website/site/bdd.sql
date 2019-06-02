-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 28, 2019 at 04:57 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projetAnnuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adherent`
--

CREATE TABLE `Adherent` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `age` date NOT NULL,
  `numero` int(11) NOT NULL,
  `addresse` varchar(30) NOT NULL,
  `cp` int(11) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `formule` varchar(10) NOT NULL,
  `validation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Adherent`
--

INSERT INTO `Adherent` (`id`, `name`, `fname`, `mail`, `mdp`, `tel`, `age`, `numero`, `addresse`, `cp`, `pays`, `formule`, `validation`) VALUES
(1, 'KHALESSI', 'Kimia', 'lmm5@gmail.com', '$2y$10$SouuO5WuC5mt98smndJwZOZxaiZf5Js1VwCXwaWUalYIzwRPZyNP.', 680781049, '2019-04-03', 8, 'AGRICULTURE', 95870, 'France', 'basic', 0),
(3, 'KHALESSI', 'Kimia', 'kimiakh95@gmail.com', '$2y$10$P25bB4gS0ETjHUu5IOdyleBzWYNbhsPA3uII5o3o4p5BSmH92Vbee', 680781049, '2019-04-01', 1, 'GRICULTURE', 95870, 'France', 'vip', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adherent`
--
ALTER TABLE `Adherent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Adherent`
--
ALTER TABLE `Adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
