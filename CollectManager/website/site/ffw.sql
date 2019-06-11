-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Sam 18 Mai 2019 à 16:11
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ffw`
--

-- --------------------------------------------------------

--
-- Structure de la table `TECHNICIEN`
--

CREATE TABLE `TECHNICIEN` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `nom_entreprise` varchar(128) NOT NULL,
  `nb_addr` smallint(6) NOT NULL,
  `voie_addr` varchar(128) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `pays` varchar(64) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `last_recall` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `TECHNICIEN`
--

INSERT INTO `TECHNICIEN` (`id`, `name`, `fname`, `mail`, `password`, `tel`, `nom_entreprise`, `nb_addr`, `voie_addr`, `cp`, `pays`, `grade`, `last_recall`) VALUES
(1, 'Bretelle', 'Alan', 'bretellealan@hotmail.fr', '-FH0wGDC6ubzE', '0652552813', 'ESGI', 15, 'rue de toul', '75012', 'France', '0', '2019-05-18 10:49:21'),
(2, 'aaa', 'aa', 'esgi@gmail.com', '-FH0wGDC6ubzE', '0928223828', 'aaa', 12, 'aaaav', '67829', 'fr', '0', '2019-05-18 13:19:00');

-- --------------------------------------------------------

--
-- Structure de la table `GROUP_PRODUCTS`
--

CREATE TABLE `GROUP_PRODUCTS` (
  `id` int(11) NOT NULL,
  `date_submit` date NOT NULL,
  `is_valid` varchar(1) DEFAULT NULL,
  `fk_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `GROUP_PRODUCTS`
--

INSERT INTO `GROUP_PRODUCTS` (`id`, `date_submit`, `is_valid`, `fk_users`) VALUES
(12, '2019-05-18', '1', 7),
(13, '2019-05-18', '0', 6),
(14, '2019-05-18', '0', 7);

-- --------------------------------------------------------

--
-- Structure de la table `PRODUCTS`
--

CREATE TABLE `PRODUCTS` (
  `id` int(11) NOT NULL,
  `idProduct` varchar(13) NOT NULL,
  `name` varchar(64) NOT NULL,
  `quantity_unit` varchar(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fk_group_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`id`, `idProduct`, `name`, `quantity_unit`, `quantity`, `fk_group_product`) VALUES
(19, '15767876', 'POULET', '2', 150, 12),
(20, '15767876', 'BROCOLIE', '1', 5000, 12),
(21, '15767876', 'POULET', '2', 150, 13),
(22, '15767876', 'BROCOLIE', '1', 5000, 13),
(23, '15767876', 'POULET', '2', 150, 14),
(24, '15767876', 'BROCOLIE', '1', 5000, 14);

-- --------------------------------------------------------

--
-- Structure de la table `SECTEUR`
--

CREATE TABLE `SECTEUR` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `cp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `SECTEUR`
--

INSERT INTO `SECTEUR` (`id`, `name`, `cp`) VALUES
(1, 'Paris 12', '75012'),
(2, 'Bezon', '95870'),
(3, 'Noisy-Le-Grand', '93160'),
(4, 'Olonne sur mer', '85340'),
(5, 'Sartrouville', '78500');

-- --------------------------------------------------------

--
-- Structure de la table `SECTEUR_TECHNICIEN`
--

CREATE TABLE `SECTEUR_TECHNICIEN` (
  `fk_secteur` int(11) NOT NULL,
  `fk_technicien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `SECTEUR_TECHNICIEN`
--

INSERT INTO `SECTEUR_TECHNICIEN` (`fk_secteur`, `fk_technicien`) VALUES
(1, 1),
(2, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `STAFF`
--

CREATE TABLE `STAFF` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `nb_addr` smallint(6) NOT NULL,
  `voie_addr` varchar(128) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `pays` varchar(64) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `validation` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `STAFF`
--

INSERT INTO `STAFF` (`id`, `name`, `fname`, `mail`, `password`, `tel`, `nb_addr`, `voie_addr`, `cp`, `pays`, `grade`, `validation`) VALUES
(2, 'KHALESSI', 'Kimia', 'esgi@gmail.com', '-FH0wGDC6ubzE', '0680781049', 113, 'RUE DE L\'AGRICULTURE', '95870', 'France', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `nb_addr` smallint(6) DEFAULT NULL,
  `voie_addr` varchar(128) DEFAULT NULL,
  `pays` varchar(64) DEFAULT NULL,
  `grade` varchar(1) NOT NULL,
  `birthday` date NOT NULL,
  `fk_secteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `USERS`
--

INSERT INTO `USERS` (`id`, `nom`, `prenom`, `mail`, `tel`, `password`, `cp`, `nb_addr`, `voie_addr`, `pays`, `grade`, `birthday`, `fk_secteur`) VALUES
(5, 'az', 'aze', 'aze@hg.fr', '0652552813', '-F/ap7RtKmQ2M', '75012', 10, 'rue de toul', 'France', '0', '1999-12-26', 2),
(6, 'Bretelle', 'Alan', 'bretellealan@hotmail.fr', '0652552813', '-FH0wGDC6ubzE', '75012', 14, 'rue de toul', 'France', '0', '1999-12-26', 1),
(7, 'KHALESSI', 'Kimia', 'kimiakh95@gmail.com', '0680781049', '-FwZ4AWe.A1F.', '95870', 113, 'RUE DE L\'AGRICULTURE', 'France', '0', '2019-05-18', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `TECHNICIEN`
--
ALTER TABLE `TECHNICIEN`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GROUP_PRODUCTS`
--
ALTER TABLE `GROUP_PRODUCTS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`fk_users`);

--
-- Index pour la table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group` (`fk_group_product`);

--
-- Index pour la table `SECTEUR`
--
ALTER TABLE `SECTEUR`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `SECTEUR_TECHNICIEN`
--
ALTER TABLE `SECTEUR_TECHNICIEN`
  ADD PRIMARY KEY (`fk_secteur`,`fk_technicien`),
  ADD KEY `fk_technicien` (`fk_technicien`);

--
-- Index pour la table `STAFF`
--
ALTER TABLE `STAFF`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `fk_secteur` (`fk_secteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `TECHNICIEN`
--
ALTER TABLE `TECHNICIEN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `GROUP_PRODUCTS`
--
ALTER TABLE `GROUP_PRODUCTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `SECTEUR`
--
ALTER TABLE `SECTEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `STAFF`
--
ALTER TABLE `STAFF`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `GROUP_PRODUCTS`
--
ALTER TABLE `GROUP_PRODUCTS`
  ADD CONSTRAINT `user` FOREIGN KEY (`fk_users`) REFERENCES `USERS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD CONSTRAINT `group` FOREIGN KEY (`fk_group_product`) REFERENCES `GROUP_PRODUCTS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `SECTEUR_TECHNICIEN`
--
ALTER TABLE `SECTEUR_TECHNICIEN`
  ADD CONSTRAINT `fk_technicien` FOREIGN KEY (`fk_technicien`) REFERENCES `TECHNICIEN` (`id`);

--
-- Contraintes pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD CONSTRAINT `fk_secteur` FOREIGN KEY (`fk_secteur`) REFERENCES `SECTEUR` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
