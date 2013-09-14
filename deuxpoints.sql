-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 14 Septembre 2013 à 10:36
-- Version du serveur: 5.1.66-0+squeeze1
-- Version de PHP: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `deuxpoints`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(15) NOT NULL,
  `descProduit` varchar(254) DEFAULT NULL,
  `prixUnitaire` decimal(11,0) NOT NULL,
  `Qte` smallint(6) NOT NULL,
  `TypeProduit` varchar(15) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descProduit`, `prixUnitaire`, `Qte`, `TypeProduit`) VALUES
(1, 'Raquette', 'Cette raquette vous donnera du fil à retordre', '500', 3, 'sport'),
(2, 'Poule', 'Une mignone petite poule', '13', 65, 'animal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
