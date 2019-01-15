-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 jan. 2019 à 16:40
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cinemax`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Aventures'),
(3, 'Comédie'),
(4, 'Dessin animé'),
(5, 'Documentaire'),
(6, 'Drame'),
(7, 'Fantastique'),
(8, 'Guerre'),
(9, 'Policier'),
(10, 'Science-fiction'),
(11, 'Suspense'),
(12, 'Thriller'),
(13, 'Western');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mail` varchar(40) NOT NULL,
  `mdp` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `mail`, `mdp`) VALUES
(1, 'loudovic93700@gmail.com', 'test123'),
(2, 'loudovic93@gmail.com', 'test123'),
(3, 'loudovic937@gmail.com', 'test123'),
(8, 'moi1@gmail.com', '123456az'),
(9, 'loudo1212@gmail.com', '1212az');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `descriptions` text NOT NULL,
  `director` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `name`, `time`, `descriptions`, `director`, `category`, `image`) VALUES
(1, 'Mission impossible : Fallout', '02:28:00', 'Ethan Hunt accompagné de son équipe de l’Impossible Mission Force et de quelques fidèles alliées sont lancés dans une course contre la montre, suite au terrible échec d’une mission.', 'Christopher McQuarrie', 1, 'mi.jpg'),
(2, 'Tomb Raider', '02:02:00', 'Lara Croft, 21 ans, na ni projet, ni ambition : fille dun explorateur excentrique porté disparu depuis sept ans, cette jeune femme rebelle et indépendante refuse de reprendre lempire de son père. ', 'Roar Uthaug', 2, 'tra.jpg'),
(3, 'Very Bad Trip', '01:48:00', 'Au réveil dun enterrement de vie de garçon bien arrosé, les trois amis du fiancé se rendent compte quil a disparu 40 heures avant la cérémonie de mariage.', 'Todd Phillips', 3, 'vbt.jpg'),
(4, 'Les Indestructibles 2', '02:05:00', 'Cette fois c’est Hélène qui se retrouve sur le devant de la scène laissant à Bob le soin de mener à bien les mille et une missions de la vie quotidienne et de s’occuper de Violette, Flèche et de bébé Jack-Jack.', 'Brad Bird', 4, 'li2.jpg'),
(5, 'Blue', '01:17:00', 'Blue, le nouveau film Disneynature, est une plongée au cœur de l’Océan pour découvrir, comprendre, aimer un monde encore mystérieux et surprenant. Un monde où la nature invente des couleurs, des formes et des sons merveilleux.', 'Alastair Fothergill', 5, 'bl.jpg'),
(6, 'Creed II', '02:10:00', 'La vie est devenue un numéro déquilibriste pour Adonis Creed. Entre ses obligations personnelles et son entraînement pour son prochain grand match, il est à la croisée des chemins.', 'Steven Caple Jr.', 6, 'c2.jpg'),
(7, 'Les Animaux fantastiques', '02:14:00', '1927. Quelques mois aprï¿½s sa capture, le cï¿½lï¿½bre sorcier Gellert Grindelwald sï¿½vade comme il lavait promis et de faï¿½on spectaculaire.', ' David Yates ', 7, 'laf.jpg'),
(8, 'Dunkerque', '01:46:00', 'Au dï¿½but de la Seconde Guerre mondiale, en mai 1940, des troupes alliï¿½es se retrouvent encerclï¿½es par les troupes allemandes ï¿½ Dunkerque, en France. ', ' Christopher Nolan', 8, 'dun.jpg'),
(9, 'Widows', '01:40:00', 'Quatre braqueurs sont tuï¿½s lors dun braquage qui a mal tournï¿½. Leurs veuves dï¿½cident de finir leur travail pour payer les dettes de leurs dï¿½funts ï¿½poux.', 'Steve McQueen', 9, 'lv.jpg'),
(10, 'Avatar', '02:42:00', 'Malgrï¿½ sa paralysie, Jake Sully, un ancien marine immobilisï¿½ dans un fauteuil roulant, est restï¿½ un combattant au plus profond de son ï¿½tre.', 'James Cameron', 10, 'ava.jpg.jpg'),
(11, 'Get Out', '01:44:00', 'Maintenant que Chris et sa copine Rose vont rencontrer leurs parents respectifs, elle linvite dans la rï¿½sidence secondaire de sa famille pour un week-end. ', 'Jordan Peele', 11, 'gto.jpg'),
(12, 'Ã‡a', '02:15:00', 'ï¿½ Derry, dans le Maine, sept gamins ayant du mal ï¿½ sintï¿½grer se sont regroupï¿½s au sein du Club des Ratï¿½s. Rejetï¿½s par leurs camarades, ils sont les cibles favorites des gros durs de lï¿½cole.', 'Andrï¿½s Muschietti', 12, 'ca.jpg'),
(13, 'Django Unchained', '02:45:00', 'Un ancien esclave s\'associe avec un chasseur de primes d\'origine allemande qui la libÃ©rÃ© : il accepte de traquer avec lui des criminels recherchÃ©s. ', 'Quentin Tarantino', 13, 'dju.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
