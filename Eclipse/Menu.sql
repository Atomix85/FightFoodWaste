-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2019 at 07:26 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ffw`
--

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `ingredient` varchar(512) NOT NULL,
  `quantity` int(11) NOT NULL,
  `recipe` text NOT NULL,
  `preparation` varchar(16) NOT NULL,
  `cuisson` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`id`, `nom`, `ingredient`, `quantity`, `recipe`, `preparation`, `cuisson`) VALUES
(1, 'tomates farcies', '500 g de chair à saucisse\r\n\r\n4 tomates (ou 8 petites)\r\n\r\n3 oignons\r\n\r\n2 gousses d\'ail\r\n\r\nThym\r\n\r\nPersil\r\n\r\nBeurre\r\n\r\nPoivre\r\n\r\nSel', 4, 'Etape 1\r\nEplucher et hacher les oignons. Eplucher et hacher les gousses d\'ail.\r\nEtape 2\r\nMettre la moitié des oignons dans la chair à saucisse. Ajouter l\'ail, le sel, le poivre et un peu de persil.\r\nEtape 3\r\nCouper le haut des tomates et les évider. Poivrer et saler l\'intérieur. Mettre la farce à l\'intérieur et remettre les chapeaux.\r\nEtape 4\r\nMettre le reste des oignons dans un plat avec la chair des tomates.\r\nEtape 5\r\nMettre les tomates farcies dans le plat. Parsemez d\'un peu de thym et mette une noisette de beurre sur chaque tomates. Faire cuire au four chaud à 180°C (thermostat 6) pendant 1 heure environ.\r\nEtape 6\r\nServir avec du riz.', '20 mins', '1 heure'),
(2, 'tarte poireaux tomates', '2 poireaux\r\n\r\n2 tomates\r\n\r\n3 oeufs\r\n\r\n1 poignée de fromage râpé\r\n\r\n30 cl de crème fraîche épaisse\r\n\r\nPoivre\r\n\r\nSel\r\n\r\nPâte brisée pur beurre', 4, 'Etape 1\r\nCoupez les poireaux en petits morceaux, faites les revenir à la poêle dans un peu d\'huile d\'olive, rajoutez les tomates coupées en petits morceaux, à côté mélangez oeufs, fromages, crème, sel poivre.\r\nEtape 2\r\nRassemblez vos préparations et versez le tout sur votre pâte brisée au beurre. Enfournez pour 30 mn à four Th 210°C', '10 mins', '15 mins'),
(3, 'bolognaise ', '500 g de pates\r\n\r\n1 oignon\r\n\r\n2 gousses d\'ail\r\n\r\n1 carotte\r\n\r\n1 branche de céleri\r\n\r\n850 g de tomate (fraîches ou en boîte selon la saison)\r\n\r\n37.5 ml de vin rouge\r\n\r\n500 g de boeuf haché\r\n\r\n50 cl de bouillon\r\n\r\nPersil\r\n\r\n1 cuillère à café de sucre\r\n\r\n2 cuillères à soupe de huile', 4, 'Etape 1\r\nHachez l\'ail, l\'oignon, puis coupez la carotte et le céleri en petits dés (enlevez les principales nervures du céleri).\r\nEtape 2\r\nFaites chauffer l\'huile dans une casserole assez grande. Faites revenir l\'ail, l\'oignon, la carotte et le céleri à feu doux pendant 5 min en remuant.\r\nEtape 3\r\nAugmenter la flamme, puis ajoutez le boeuf. Faites brunir et remuez de façon à ce que la viande ne fasse pas de gros paquets.\r\nEtape 4\r\nAjoutez le bouillon, le vin rouge, les tomates préalablement coupées assez grossièrement, le sucre et le persil haché. Portez à ébullition.\r\nEtape 5\r\nBaisser ensuite le feu et laissez mijoter à couvert 1h à 1h30, de façon à ce que le vin s\'évapore.\r\nEtape 6\r\nFaites cuire les spaghetti, puis mettez-les dans un plat.\r\nEtape 7\r\nAjoutez la sauce bolognaise.', '20 mins', '1 heure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
