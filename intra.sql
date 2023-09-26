-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 26 Septembre 2023 à 17:35
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `intra`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
`id` int(11) NOT NULL,
  `nom` varchar(120) CHARACTER SET utf16 NOT NULL,
  `date` date NOT NULL,
  `departement` varchar(120) CHARACTER SET utf16 NOT NULL,
  `heureuxEleve` int(11) NOT NULL,
  `moyenHeureuxEleve` int(11) NOT NULL,
  `pasHeureuxEleve` int(11) NOT NULL,
  `heureuxEntreprise` int(11) NOT NULL,
  `moyenHeureuxEntreprise` int(11) NOT NULL,
  `pasHeureuxEntreprise` int(11) NOT NULL,
  `lieu` varchar(250) CHARACTER SET utf16 NOT NULL,
  `Heure` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `date`, `departement`, `heureuxEleve`, `moyenHeureuxEleve`, `pasHeureuxEleve`, `heureuxEntreprise`, `moyenHeureuxEntreprise`, `pasHeureuxEntreprise`, `lieu`, `Heure`) VALUES
(1, 'PizzaStage', '2023-09-28', 'Informatique', 20, 15, 19, 20, 15, 10, 'SB-110', '18:00:00'),
(2, 'PizzaStage2', '2023-09-30', 'Informatique', 20, 18, 19, 21, 22, 23, 'SB-110', '19:30:00'),
(3, 'pizzaStage 3', '2023-09-27', '', 0, 0, 0, 0, 0, 0, '', '11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE IF NOT EXISTS `usager` (
`id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf16 NOT NULL,
  `password` varchar(1000) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `usager`
--

INSERT INTO `usager` (`id`, `user`, `password`) VALUES
(1, 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
 ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
