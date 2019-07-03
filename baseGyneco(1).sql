-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 03 Mars 2016 à 08:03
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_patiente`
--
CREATE DATABASE `gestion_patiente` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestion_patiente`;

-- --------------------------------------------------------

--
-- Structure de la table `acte`
--

CREATE TABLE IF NOT EXISTS `acte` (
  `id_acte` int(11) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `mention` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acte`
--

INSERT INTO `acte` (`id_acte`, `designation`, `mention`) VALUES
(1, 'Accouchement', 2500),
(2, 'CÃ©sarienne', 0),
(3, 'Avortement', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(5) NOT NULL,
  `login` varchar(10) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_user`, `login`, `nom`, `password`) VALUES
(1, 'francis', 'Francis RAKOTOMALALA', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `code_categorie` varchar(8) NOT NULL,
  `nb_occup` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`code_categorie`, `nb_occup`, `prix`) VALUES
('C2', 3, 4000),
('C4', 4, 0),
('C3', 5, 5000);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int(11) NOT NULL,
  `code_categorie` varchar(9) NOT NULL,
  `place_occup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `code_categorie`, `place_occup`) VALUES
(11, 'C3', 0),
(14, 'C3', 1),
(15, 'C3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id_registre` int(11) NOT NULL,
  `element` text NOT NULL,
  `valeur` text NOT NULL,
  `lien_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`id_registre`, `element`, `valeur`, `lien_image`) VALUES
(1005, 'figure', 'jackass', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/bumpfie-app-icon-2x.png.jpeg'),
(1005, 'Posteur', 'davah et jackass', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/IMG_0855.JPG'),
(1005, 'sary', 'maso', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/IMG_84403.jpg'),
(1005, 'Echographie', 'Bonne', ''),
(1005, 'icone', 'depanneur', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/depanneur.gif'),
(1005, 'dg', 'dfgd', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/77375306_0.jpg'),
(1005, 'sdfdf', 'sdfsd', ''),
(1005, 'sdfsd', 'sdfsd', ''),
(1005, 'dfgdfg', 'erg', ''),
(1005, 'qsds', 'qsds', 'http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examen/stockageImage/77375306_0.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `examenapres`
--

CREATE TABLE IF NOT EXISTS `examenapres` (
  `id_registre` int(11) NOT NULL,
  `element` text NOT NULL,
  `valeur` text NOT NULL,
  `lien_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `examenapres`
--


-- --------------------------------------------------------

--
-- Structure de la table `lit`
--

CREATE TABLE IF NOT EXISTS `lit` (
  `id_lit` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `occupation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lit`
--

INSERT INTO `lit` (`id_lit`, `id_chambre`, `occupation`) VALUES
(112, 11, 'Libre'),
(141, 14, 'Libre'),
(143, 14, 'OccupÃ©'),
(151, 15, 'Libre'),
(152, 15, 'Libre'),
(153, 15, 'Libre'),
(154, 15, 'Libre'),
(155, 15, 'Libre');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id_operation` int(11) NOT NULL,
  `id_acte` int(11) NOT NULL,
  `id_registre` int(11) NOT NULL,
  `operateur` varchar(30) NOT NULL,
  `date_heure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`id_operation`, `id_acte`, `id_registre`, `operateur`, `date_heure`) VALUES
(3, 1, 1002, 'SF Odettine', '2016-02-19 09:06:57'),
(4, 2, 1004, 'SF Odettine', '2016-02-20 15:11:17'),
(5, 1, 1005, 'Dr Cathy', '2016-02-20 20:51:00');

-- --------------------------------------------------------

--
-- Structure de la table `patiente`
--

CREATE TABLE IF NOT EXISTS `patiente` (
  `id_registre` int(11) NOT NULL,
  `nom_patiente` varchar(30) NOT NULL,
  `gestite` varchar(11) NOT NULL,
  `parite` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patiente`
--

INSERT INTO `patiente` (`id_registre`, `nom_patiente`, `gestite`, `parite`) VALUES
(1002, 'Rasily', 'G1', 'P1'),
(1004, 'Rabetafika', 'G3', 'P3'),
(1005, 'Rabelasika', 'P2', 'G3');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perso` varchar(30) NOT NULL,
  `poste` varchar(15) NOT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`id_perso`, `nom_perso`, `poste`) VALUES
(1, 'Rakoto georges', 'Infirmier'),
(2, 'Cathy', 'Docteur'),
(3, 'Odettine', 'Sagefemme');

-- --------------------------------------------------------

--
-- Structure de la table `protocolea`
--

CREATE TABLE IF NOT EXISTS `protocolea` (
  `id_operation` int(11) NOT NULL,
  `id_bebe` int(11) NOT NULL,
  `element` tinytext NOT NULL,
  `valeur` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `protocolea`
--

INSERT INTO `protocolea` (`id_operation`, `id_bebe`, `element`, `valeur`) VALUES
(4, 2, 'Date d''extraction', '2016-02-02'),
(4, 2, 'Heure d''extraction', '20:10'),
(4, 2, 'Nom du bÃ©bÃ©', 'Rabetafika'),
(4, 2, 'Prenom du bÃ©bÃ©', 'Police'),
(4, 2, 'Sexe', 'Masculin'),
(4, 2, 'Etat', 'Vivant'),
(5, 3, 'Date de dÃ©livrance', '2016-06-15'),
(5, 3, 'Heure de dÃ©livrance', '12:48'),
(5, 3, 'Nom du bÃ©bÃ©', 'Rabelasika'),
(5, 3, 'Prenom du bÃ©bÃ©', 'Maki'),
(5, 3, 'Sexe', 'Masculin'),
(5, 3, 'Etat', 'Mort'),
(5, 4, 'Date de dÃ©livrance', '2016-06-15'),
(5, 4, 'Heure de dÃ©livrance', '12:51'),
(5, 4, 'Nom du bÃ©bÃ©', 'Rabelasika'),
(5, 4, 'Prenom du bÃ©bÃ©', 'Makiana'),
(5, 4, 'Sexe', 'Feminin'),
(5, 4, 'Etat', 'Vivant'),
(5, 3, 'Poids', '150g'),
(5, 3, 'Apgar', '4'),
(5, 4, 'Apgar', '5'),
(5, 4, 'Poids', '175g');

-- --------------------------------------------------------

--
-- Structure de la table `renseignement`
--

CREATE TABLE IF NOT EXISTS `renseignement` (
  `id_registre` int(11) NOT NULL,
  `nom_patiente` varchar(21) NOT NULL,
  `prenom_patiente` varchar(21) NOT NULL,
  `naissance` date NOT NULL,
  `lieu` varchar(16) NOT NULL,
  `pere` varchar(26) NOT NULL,
  `mere` varchar(26) NOT NULL,
  `domicile` varchar(21) NOT NULL,
  `croyance` varchar(15) NOT NULL,
  `profession` varchar(15) NOT NULL,
  `situation` varchar(15) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `renseignement`
--

INSERT INTO `renseignement` (`id_registre`, `nom_patiente`, `prenom_patiente`, `naissance`, `lieu`, `pere`, `mere`, `domicile`, `croyance`, `profession`, `situation`, `contact`) VALUES
(1000, 'RAKOTOSON', 'Gamine', '1995-03-01', 'Tambohobe', 'Rajao', 'Rajery', 'Antanifotsy', 'Kohenable', 'Mpigaka', 'En couple', 'Aty atanana'),
(1003, 'Rabary', 'Claudine', '2016-02-12', 'WC', 'Rajao', 'Rahery', 'Lavabato', 'Catholique', 'Mpisera', 'Tsisy', 'Popo'),
(1004, 'RABELASIKA', 'Gamine', '1986-08-21', 'Fianar', 'Rabelasika', 'Raneny', 'Tanambao', 'Catholique', 'Mpivarotra', 'IllÃ©gale', '03428'),
(1005, 'RABE', 'Lasika', '1989-02-08', 'Tambobe', 'Rabekoto', 'Rabesoa', 'Tambomandrevo', 'Cohen', 'Mpandende', 'En couple', '033223');

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE IF NOT EXISTS `sejour` (
  `id_sejour` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(11) NOT NULL,
  `id_lit` int(11) NOT NULL,
  `id_registre` int(11) NOT NULL,
  `nom_patiente` varchar(25) NOT NULL,
  `date_entree` date NOT NULL,
  `date_sortie` date NOT NULL,
  PRIMARY KEY (`id_sejour`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sejour`
--

INSERT INTO `sejour` (`id_sejour`, `id_chambre`, `id_lit`, `id_registre`, `nom_patiente`, `date_entree`, `date_sortie`) VALUES
(1, 11, 112, 1005, 'Rabelasika', '2016-02-26', '2016-02-29'),
(2, 14, 143, 1004, 'Rabetafika', '2016-02-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE IF NOT EXISTS `visite` (
  `id_visite` int(11) NOT NULL AUTO_INCREMENT,
  `id_registre` int(11) NOT NULL,
  `date_visite` date NOT NULL,
  `demande_visite` text NOT NULL,
  `resultat` text NOT NULL,
  `observation` text NOT NULL,
  PRIMARY KEY (`id_visite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `visite`
--

INSERT INTO `visite` (`id_visite`, `id_registre`, `date_visite`, `demande_visite`, `resultat`, `observation`) VALUES
(1, 1003, '2016-02-10', 'echo', 'dsdg', 'dsgdfg'),
(2, 1005, '2016-03-01', 'Visite', 'Mauvais', 'Refaire');
