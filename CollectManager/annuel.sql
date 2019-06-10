-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 10 Juin 2019 à 19:43
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
-- Structure de la table `COLLECT`
--

CREATE TABLE `COLLECT` (
  `fk_technicien` int(11) NOT NULL,
  `fk_grp_products` int(11) NOT NULL,
  `date_ramassage` date NOT NULL,
  `message` text,
  `is_confirmed` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `COLLECT`
--

INSERT INTO `COLLECT` (`fk_technicien`, `fk_grp_products`, `date_ramassage`, `message`, `is_confirmed`) VALUES
(1, 21, '2019-06-06', 'j\'aime les carottes !', '3'),
(1, 22, '2019-06-01', 'bonjour', '3');

-- --------------------------------------------------------

--
-- Structure de la table `COMMERCANT`
--

CREATE TABLE `COMMERCANT` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `nom_entreprise` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `adress` varchar(30) NOT NULL,
  `cp` int(11) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `validation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `COMMERCANT`
--

INSERT INTO `COMMERCANT` (`id`, `name`, `fname`, `mail`, `mdp`, `tel`, `nom_entreprise`, `numero`, `adress`, `cp`, `pays`, `validation`) VALUES
(9, 'Bretelle', 'Alan', 'bretellealan@hotmail.fr', '-FH0wGDC6ubzE', 652552813, 'TEAMNET SA', 10, 'rue mercoeur', 75011, 'France', 0);

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
(18, '2019-05-19', '1', 6),
(20, '2019-05-26', '1', 6),
(21, '2019-06-01', '1', 6),
(22, '2019-06-01', '2', 6);

-- --------------------------------------------------------

--
-- Structure de la table `MESSAGE`
--

CREATE TABLE `MESSAGE` (
  `id` int(11) NOT NULL,
  `subject` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `date_msg` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `category` varchar(1) NOT NULL,
  `is_valid` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `MESSAGE`
--

INSERT INTO `MESSAGE` (`id`, `subject`, `message`, `date_msg`, `id_user`, `category`, `is_valid`) VALUES
(1, 'test', 'poiront, petit poisn, legumr', '2019-05-29', 1, '0', '0'),
(7, 'voiture', 'need help', '2019-05-29', 1, '2', '0'),
(8, 'help_service_exchange', 'mercide vouloir bien m\'aider', '2019-05-29', 1, '3', '0'),
(9, 'réparation service !', 'ce service est bien !', '2019-05-29', 1, '4', '1'),
(10, 'garidennahe', 'pourquoi faire ?!', '2019-05-29', 1, '5', '0'),
(11, 'test cuisine', 'Alan veut voir un test ', '2019-05-31', 1, '1', '1'),
(12, 'test_encore', 'zhjhlaklkjd', '2019-05-31', 1, '1', ''),
(13, 'aaa', 'ffffdddddddqqqqqssss', '2019-05-31', 2, '1', '1'),
(14, 'test', 'almfmjfm', '2019-05-31', 1, '5', '0'),
(15, 'ppofsioaae', 'dklkùkùdqkùdncvbqqd', '2019-05-31', 2, '2', '0'),
(16, 'akajlajla', 'lùdvlmflkfljffs', '2019-05-31', 2, '1', '1'),
(17, 'mùlmkmljlhk', 'hhkhkhkhjfyetztsdydfuu', '2019-05-31', 2, '1', '1');

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
  `fk_group_product` int(11) NOT NULL,
  `is_stocked` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`id`, `idProduct`, `name`, `quantity_unit`, `quantity`, `fk_group_product`, `is_stocked`) VALUES
(31, '15767876', 'POULET', '2', 150, 18, '0'),
(32, '15767876', 'BROCOLIE', '1', 5000, 18, '0'),
(35, '15767876', 'pates', '2', 150, 20, '0'),
(36, '15767876', 'carottes', '1', 5000, 20, '0'),
(37, '15767877', 'test', '3', 1, 20, '0'),
(38, '15767877', 'test', '3', 1, 20, '0'),
(39, '15767876', 'pates', '2', 150, 21, '1'),
(40, '15767876', 'carottes', '1', 5000, 21, '1'),
(41, '15767876', 'pates', '2', 150, 22, '1'),
(42, '15767876', 'carottes', '1', 5000, 22, '1');

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
(5, 'Sartrouville', '78500'),
(6, 'Lyon 1', '69001'),
(7, 'Nantes', '44000'),
(8, 'Limoges', '87000'),
(9, 'Marseille 1', '13001'),
(10, 'Toulouse', '31000'),
(11, 'Lille', '59000');

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
(3, 1),
(5, 1);

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
-- Structure de la table `STOCK`
--

CREATE TABLE `STOCK` (
  `entrepot` varchar(3) NOT NULL,
  `secteur` varchar(3) NOT NULL,
  `couloir` varchar(3) NOT NULL,
  `bloc` varchar(3) NOT NULL,
  `fk_product` int(11) NOT NULL,
  `date_arrive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `STOCK`
--

INSERT INTO `STOCK` (`entrepot`, `secteur`, `couloir`, `bloc`, `fk_product`, `date_arrive`) VALUES
('1', '1', '1', '1', 42, '2019-06-03'),
('1', '1', '1', '2', 41, '2019-06-03'),
('1', '1', '2', '1', 40, '2019-06-06'),
('1', '1', '2', '2', 39, '2019-06-06');

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
(6, 'Bretelle', 'Alan', 'bretellealan@hotmail.fr', '0652552813', '-FH0wGDC6ubzE', '93160', 14, 'rue de toule', 'France', '0', '1999-12-26', 3),
(7, 'KHALESSI', 'Kimia', 'kimiakh95@gmail.com', '0680781049', '-FwZ4AWe.A1F.', '95870', 113, 'RUE DE L\'AGRICULTURE', 'France', '0', '2019-05-18', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `COLLECT`
--
ALTER TABLE `COLLECT`
  ADD PRIMARY KEY (`fk_technicien`,`fk_grp_products`),
  ADD KEY `fk_grp_products` (`fk_grp_products`);

--
-- Index pour la table `COMMERCANT`
--
ALTER TABLE `COMMERCANT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `GROUP_PRODUCTS`
--
ALTER TABLE `GROUP_PRODUCTS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`fk_users`);

--
-- Index pour la table `MESSAGE`
--
ALTER TABLE `MESSAGE`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cp` (`cp`);

--
-- Index pour la table `SECTEUR_TECHNICIEN`
--
ALTER TABLE `SECTEUR_TECHNICIEN`
  ADD PRIMARY KEY (`fk_secteur`,`fk_technicien`),
  ADD KEY `fk_commercant` (`fk_technicien`);

--
-- Index pour la table `STAFF`
--
ALTER TABLE `STAFF`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `STOCK`
--
ALTER TABLE `STOCK`
  ADD PRIMARY KEY (`entrepot`,`secteur`,`couloir`,`bloc`),
  ADD KEY `fk_product` (`fk_product`);

--
-- Index pour la table `TECHNICIEN`
--
ALTER TABLE `TECHNICIEN`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

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
-- AUTO_INCREMENT pour la table `COMMERCANT`
--
ALTER TABLE `COMMERCANT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `GROUP_PRODUCTS`
--
ALTER TABLE `GROUP_PRODUCTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `MESSAGE`
--
ALTER TABLE `MESSAGE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `SECTEUR`
--
ALTER TABLE `SECTEUR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `STAFF`
--
ALTER TABLE `STAFF`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `TECHNICIEN`
--
ALTER TABLE `TECHNICIEN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `COLLECT`
--
ALTER TABLE `COLLECT`
  ADD CONSTRAINT `COLLECT_ibfk_1` FOREIGN KEY (`fk_technicien`) REFERENCES `TECHNICIEN` (`id`),
  ADD CONSTRAINT `fk_grp_products` FOREIGN KEY (`fk_grp_products`) REFERENCES `GROUP_PRODUCTS` (`id`);

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
  ADD CONSTRAINT `SECTEUR_TECHNICIEN_ibfk_1` FOREIGN KEY (`fk_secteur`) REFERENCES `SECTEUR` (`id`),
  ADD CONSTRAINT `fk_commercant` FOREIGN KEY (`fk_technicien`) REFERENCES `TECHNICIEN` (`id`);

--
-- Contraintes pour la table `STOCK`
--
ALTER TABLE `STOCK`
  ADD CONSTRAINT `STOCK_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `PRODUCTS` (`id`);

--
-- Contraintes pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD CONSTRAINT `fk_secteur` FOREIGN KEY (`fk_secteur`) REFERENCES `SECTEUR` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
