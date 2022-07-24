-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 mai 2019 à 03:56
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(8, 'filtre'),
(9, 'embrayage'),
(11, 'accessoires'),
(12, 'echappement');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCom` int(20) NOT NULL AUTO_INCREMENT,
  `idClt` int(11) NOT NULL,
  `date` date NOT NULL,
  `livraison` varchar(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`idCom`),
  KEY `idClt` (`idClt`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCom`, `idClt`, `date`, `livraison`, `quantite`, `total`, `etat`) VALUES
(28, 91, '2019-05-04', 'non', 2, 100, 1),
(34, 91, '2019-05-05', 'non', 1, 100, 1),
(35, 91, '2019-05-05', 'non', 1, 100, 0),
(36, 550, '2019-05-06', 'non', 1, 80, 0),
(37, 550, '2019-05-06', 'non', 3, 160, 0),
(38, 550, '2019-05-06', 'non', 1, 120, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_visiteur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` varchar(50) NOT NULL,
  `jaime` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_visiteur` (`id_visiteur`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_visiteur`, `id_produit`, `date`, `comment`, `jaime`) VALUES
(1, 548, 8, '2019-05-06 00:00:00', 'j\'aime', 0),
(2, 91, 8, '2019-05-06 00:00:00', 'genial', 2),
(3, 550, 8, '2019-05-06 00:00:00', 'j\'aime', 0);

-- --------------------------------------------------------

--
-- Structure de la table `constructeur`
--

DROP TABLE IF EXISTS `constructeur`;
CREATE TABLE IF NOT EXISTS `constructeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `constructeur`
--

INSERT INTO `constructeur` (`id`, `nom`) VALUES
(7, 'citron'),
(9, 'fiat'),
(8, 'polo'),
(10, 'seat');

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Service_FK` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `garage`
--

INSERT INTO `garage` (`id`, `name`, `address`, `id_service`) VALUES
(5, 'garage two', '1km route sidi toumi Beni khalled', 3),
(7, 'garage 3', 'tunisia', 1),
(13, 'garage 6', 'bouhjar monastir5', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

DROP TABLE IF EXISTS `lignecommande`;
CREATE TABLE IF NOT EXISTS `lignecommande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCom` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `nomProd` varchar(50) DEFAULT NULL,
  `qte` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCom` (`idCom`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`id`, `idCom`, `idProd`, `nomProd`, `qte`, `prix`) VALUES
(40, 27, 2, 'embrayage', 3, 100),
(41, 28, 3, 'filtre', 2, 50),
(47, 32, 2, 'embrayage', 1, 100),
(48, 33, 2, 'embrayage', 1, 100),
(49, 34, 2, 'embrayage', 1, 100),
(50, 35, 2, 'embrayage', 1, 100),
(51, 36, 6, 'echappement', 1, 80),
(52, 37, 10, 'accessoire', 3, 30),
(53, 37, 8, 'usinage', 1, 30),
(54, 37, 7, 'disque', 1, 40),
(55, 38, 6, 'echappement', 1, 80),
(56, 38, 7, 'disque', 1, 40);

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `idl` varchar(255) DEFAULT NULL,
  `idClt` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cite` varchar(255) NOT NULL,
  `codep` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numt` int(255) NOT NULL,
  `datel` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `idl`, `idClt`, `nom`, `prenom`, `adresse`, `description`, `cite`, `codep`, `email`, `numt`, `datel`) VALUES
(3, '93', 1, 'zayeneaaaaa', 'takwa', 'jjjj', 'hhhh', 'jjj', 99, 'client@email.com', 95322200, '2019-05-02'),
(4, '93', 91, 'client', 'client', 'esprit shotrana, batiments', 'batiments', 'tunis', 666, 'client3@email.com', 21548798, '2019-05-04'),
(5, NULL, 91, 'client', 'client', 'sfakous, balas', 'bat7a', 'tunis', 1002, 'client3@email.com', 21548798, '2019-05-04'),
(6, NULL, 548, 'takwa', 'takwa99', 'esprit shotrana, batiments', 'batiments', 'tunis', 999, 'takwa@email.com', 95322200, '2019-05-05'),
(7, NULL, 548, 'takwa', 'takwa99', 'esprit shotrana, batiments', 'bat', 'tunis', 112, 'takwa@email.com', 95322200, '2019-05-05'),
(8, '93', 550, 'client5', 'client5', 'esprit shotrana, batiments', 'batiments', 'tunis', 888, 'client5@email.com', 95322200, '2019-05-06');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `tel` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`id`, `nom`, `email`, `numero`, `web`, `role`, `mdp`, `tel`) VALUES
(547, 'cyrine', 'cyrine@email.com', 555, 'www.google.com', 'livreur', '1234', 95322200),
(789, 'ines lachiheb', 'ines@gmail.com', 8, 'www.etsz.com', 'livreur', '123', 52140609),
(58, 'takwa', 'takwa.zayene@esprit.tn', 95322200, 'www.google.com', 'qedf<ed', '1234', 254);

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `id_constructeur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_constructeur` (`id_constructeur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id`, `nom`, `id_constructeur`) VALUES
(6, 'nissan', 7),
(7, 'polo5', 8),
(8, 'polo7', 8),
(9, 'C1', 7),
(10, 'C4', 7);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `nomProd` varchar(50) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `idClient`, `nomProd`, `idProduit`, `quantite`, `prix`) VALUES
(3, 90, 'filtre', 3, 2, 50),
(4, 90, 'embrayage', 2, 1, 100),
(6, 91, 'filtre', 3, 100, 50),
(13, 548, 'filtre', 3, 20, 50),
(14, 91, 'filtre1', 5, 1, 70),
(15, 91, 'echappement', 9, 2, 90),
(17, 550, 'filtre2', 4, 61, 70);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `datea` datetime DEFAULT CURRENT_TIMESTAMP,
  `qte` int(11) NOT NULL,
  `description` text NOT NULL,
  `constructeur` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `reference`, `nom`, `prix`, `datea`, `qte`, `description`, `constructeur`, `modele`, `image`, `categorie_id`) VALUES
(4, 'FFF01', 'filtre2', 70, '2019-05-15 00:00:00', 50, 'filtre', '7', 'Modifier le modele', '8303672671.jpg', 8),
(5, 'FFF02', 'filtre1', 70, '2019-05-17 00:00:00', 80, 'nouveau produit', '8', 'polo7', '6908459868.jpg', 8),
(6, 'FFF03', 'echappement', 80, '2019-05-22 00:00:00', 8, 'echappement', '7', 'C1', '7550221138.png', 8),
(7, 'FFF04', 'disque', 40, '2019-05-16 00:00:00', 88, 'disque3', '7', 'C1', '3481711785.jpg', 8),
(8, 'FFF05', 'usinage', 30, '2019-05-15 00:00:00', 49, 'piece automobile', '8', 'polo7', '1044545520.jpg', 11),
(9, 'FFF06', 'echappement', 90, '2019-05-15 00:00:00', 70, 'echappement', '7', 'C4', '4790306560.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rating` int(1) NOT NULL,
  `garage_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `garage_id`, `user_id`) VALUES
(1, 2, 2, 1),
(2, 4, 5, 1),
(3, 5, 2, 3),
(4, 2, 5, 3),
(5, 3, 5, 91),
(6, 4, 5, 548),
(7, 5, 5, 550);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `sujet` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `email`, `phone`, `sujet`) VALUES
(1, 'gg', 'gg', 'gg', 1, 'gg', 'gg', 11, 'gg'),
(4, 'client', 'client', 'hhh', 2145, 'Sfax', 'hhh@hh', 21, 'hhh');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL DEFAULT '0',
  `date_begin` varchar(100) DEFAULT NULL,
  `date_end` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_technicien` int(11) DEFAULT NULL,
  `id_garage` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_client`, `date_begin`, `date_end`, `status`, `id_technicien`, `id_garage`, `id_service`) VALUES
(1, 6, '2019-04-25T20:33', '2019-04-27T01:03', 'accepted', 13, 5, 1),
(2, 6, '2019-04-28T04:04', NULL, 'refused', 13, 7, 2),
(3, 6, '2019-04-28T03:02', '2019-04-30T02:04', 'accepted', 14, 2, 1),
(4, 9, '2019-04-10T05:05', '2019-04-10T05:05', 'accepted', 13, 2, 1),
(5, 9, '2019-10-16T06:05', NULL, 'refused', 21, 2, 2),
(6, 3, '2019-05-11T05:05', NULL, 'refused', 3, 2, 2),
(7, 1, '2019-05-31T07:07', '', 'accepted', 3, 2, 2),
(8, 1, '2019-05-08T08:05', '', 'accepted', 3, 2, 1),
(9, 1, '2019-05-07T04:04', NULL, 'refused', 3, 2, 1),
(10, 1, '2019-05-22T07:07', '2019-05-08T04:05', 'accepted', 3, 2, 2),
(11, 1, '2019-05-16T05:08', '2019-05-15T23:06', 'accepted', 3, 2, 1),
(12, 1, '2019-05-15T08:08', NULL, 'wait', 89, 5, 2),
(13, 1, '2019-05-15T05:05', NULL, 'wait', 1, 7, 2),
(14, 0, '2019-05-07T05:05', NULL, 'wait', 89, 5, 3),
(15, 90, '2019-05-22T06:06', NULL, 'wait', 2, 7, 1),
(16, 91, '2019-05-16T08:08', NULL, 'wait', 89, 5, 1),
(17, 91, '2019-05-08T05:05', '', 'accepted', 92, 7, 1),
(18, 91, '2019-05-10T05:05', NULL, 'refused', 92, 7, 2),
(19, 91, '2019-05-01T05:05', NULL, 'refused', 92, 7, 2),
(20, 91, '2019-05-14T05:05', '2019-05-21T05:05', 'accepted', 92, 7, 1),
(21, 91, '2019-05-16T05:05', '2019-05-01T05:05', 'accepted', 92, 7, 2),
(22, 91, '2019-05-02T05:55', '2019-05-17T11:11', 'accepted', 92, 7, 1),
(23, 91, '2019-05-22T05:05', NULL, 'refused', 92, 7, 2),
(24, 548, '2019-05-07T05:05', NULL, 'wait', 92, 7, 2),
(25, 548, '2019-05-07T05:05', NULL, 'wait', 92, 7, 2),
(26, 550, '2019-05-22T05:03', '2019-05-14T05:05', 'accepted', 549, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `name`) VALUES
(1, 'Vidange'),
(2, 'Lavage'),
(3, 'Maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `id_garage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `garage_FK` (`id_garage`)
) ENGINE=InnoDB AUTO_INCREMENT=552 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `email`, `password`, `role`, `number`, `id_garage`) VALUES
(1, 'takwaaaaa', 'zay', 'takwa', 'client@email.com', '1234', 'user', '95322200', 7),
(4, 'sirine', 'sirine', 'sirine', 'sirine@esprit.tn', '1234', 'user', '23546556856', NULL),
(6, 'client', 'client', 'client', 'lachihebines46@gmail.com', '1234', 'user', '95322200', NULL),
(88, 'hhh', 'hhh', 'hh', 'takwa.zayene@esprit.tn', '1234', 'livreur', '95322200', NULL),
(90, 'adel', 'adel', 'adel', 'adel@email.com', '1234', 'user', '211548787', NULL),
(91, 'client', 'client', 'client', 'client3@email.com', '1234', 'user', '21548798', NULL),
(92, 'amine', 'amine', 'amine', 'amine@email.com', '1234', 'technicien', '95322200', 7),
(93, 'admin', 'admin', 'admin', 'admin@email.com', '1234', 'admin', '95322200', NULL),
(94, 'anis99', 'anis99', 'anis', 'anis@email.com', '1234', 'technicien', '95322200', 13),
(547, 'cyrine', 'cyrine', 'cyrine', 'cyrine@email.com', '1234', 'livreur', '95322200', NULL),
(548, 'takwa99', 'takwa', 'takwa99', 'takwa@email.com', '1234', 'user', '95322200', NULL),
(550, 'client5', 'client5', 'client5', 'client5@email.com', '1234', 'user', '95322200', NULL),
(551, 'tech5', 'tech5', 'tech5', 'tech5@email.com', '1234', 'technicien', '555555', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `url` varchar(30) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `tel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nom`, `prenom`, `id`, `email`, `url`, `occupation`, `mdp`, `tel`) VALUES
('vfbg', 'dfbg', 'takwa', 'takwa.zayene@esprit.tn', 'www.google.com', 'sdfgn', 'fdvdbg', 52356),
('vfbg', 'dfbg', 'vbv', 'takwa.zayene@esprit.tn', 'wwwfvbg', 'sdfgn', 'lkjvfbfgf', 52356),
('vfbg', 'dfbg', '5f', 'takwa.zayene@esprit.tn', 'wwwfvbg', 'sdfgn', 'fdvd', 52356),
('takk', 'takkkkk', 'takkkk', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'ttt', 'haha', 25),
('dcv', 'vdddf', 'fff', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'fv', 'haha', 578),
('ghbr', 'meryem', 'lundi', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'fvbgf', 'takwa', 77777),
('hosny', 'tamer', '99999', 'takwa.zayene@esprit.tn', 'https://www.google.com', 'vxd ', 'haha', 555),
('meryem', 'meryem', 'meryem', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'vxd ', 'takwa', 58),
('meryem', 'meryem', 'mimi', 'zayyoussef@hotmail.com', 'www.google.com', 'jjf', 'haha', 33),
('meryem', 'meryem', 'ma', 'zayyoussef@hotmail.com', 'https://www.google.com', 'jjf', 'haha', 33),
('meryem', 'hhhhhhh', '599', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'client', 'takwa', 15),
('ghbr', 'fvs', 'eno', 'takwa.zayene@esprit.tn', 'https://www.google.com', 'hh', 'tak', 2222222),
('dha7ka', 'hhhhhhh', 'hhhh', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'hhhhhhh', 'takk', 21),
('ggggg', 'ggggggg', 'coucou', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'sdfgn', 'tak', 989898),
('vgth', 'gth', 'pstt', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'cc', 'takwa', 55),
('gggg', 'gggggg', 'jiji', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'edfz', '777', 22222),
('ghbr', 'meryem', 'gogo', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'qedf<ed', 'tak', 44),
('takkkkkkkou', 'vvvv', 'lllllll', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'kliuh', 'takk', 52356),
('ghbr', 'meryem', 'shhhh', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'sdfgn', 'takk', 2222222),
('client', 'client', 'rimmmmm', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'douz', 99),
('meryem', 'meryem', '444', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'qedf<ed', 'takk', 444),
('takwa', 'zayeneee', 'bibi', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'admin', 'bibi', 22),
('takwa', 'zayeneee', 'cc', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'client', 'cc', 22),
('meryem', 'fvs', 'client', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'client', 'takwa', 33),
('client', 'client', 'tttttttt', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'takwa', 99),
('client', 'client', 'ichrak', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'ichrak', 99),
('client', 'client', 'ssssssss', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'takwa', 99),
('client', 'client', 'xx', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'takwa', 99),
('client', 'client', 'nn', 'takwa.zayene@esprit.tn', 'https://www.facebook.com', 'client', 'haha', 99),
('ghbr', 'fvs', 'kk', 'takwa.zayene@esprit.tn', 'https://www.facebook.com/', 'client', 'takwa', 211111);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClt`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_visiteur`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `id_Service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`id_constructeur`) REFERENCES `constructeur` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `garage_FK` FOREIGN KEY (`id_garage`) REFERENCES `garage` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
