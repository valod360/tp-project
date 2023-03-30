-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mars 2023 à 18:02
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `abrzr6_engine`
--

DROP TABLE IF EXISTS `abrzr6_engine`;
CREATE TABLE IF NOT EXISTS `abrzr6_engine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abrzr6_engine`
--

INSERT INTO `abrzr6_engine` (`id`, `type`) VALUES
(1, '180cv');

-- --------------------------------------------------------

--
-- Structure de la table `abzr6_aerodromes`
--

DROP TABLE IF EXISTS `abzr6_aerodromes`;
CREATE TABLE IF NOT EXISTS `abzr6_aerodromes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `oaciCode` varchar(4) NOT NULL,
  `descriptionFleet` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abzr6_aerodromes`
--

INSERT INTO `abzr6_aerodromes` (`id`, `name`, `oaciCode`, `descriptionFleet`) VALUES
(1, 'paris-bourjet', 'lfbg', 'DR-400');

-- --------------------------------------------------------

--
-- Structure de la table `abzr6_planes`
--

DROP TABLE IF EXISTS `abzr6_planes`;
CREATE TABLE IF NOT EXISTS `abzr6_planes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `id_abrzr6_engine` int NOT NULL,
  `id_abzr6_aerodromes` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `abzr6_planes_abrzr6_engine_FK` (`id_abrzr6_engine`),
  KEY `abzr6_planes_abzr6_aerodromes0_FK` (`id_abzr6_aerodromes`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abzr6_planes`
--

INSERT INTO `abzr6_planes` (`id`, `name`, `images`, `description`, `price`, `id_abrzr6_engine`, `id_abzr6_aerodromes`) VALUES
(6, 'DR-400', '', '50hr', 175, 1, 1),
(7, 'cessna-citation', '', '', 200, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `abzr6_reservations`
--

DROP TABLE IF EXISTS `abzr6_reservations`;
CREATE TABLE IF NOT EXISTS `abzr6_reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loan` datetime NOT NULL,
  `loanReturn` datetime NOT NULL,
  `price` int NOT NULL,
  `caution` int NOT NULL,
  `activityType` varchar(50) NOT NULL,
  `id_users` int NOT NULL,
  `id_planes` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_users_FK` (`id_users`),
  KEY `reservations_planes0_FK` (`id_planes`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abzr6_reservations`
--

INSERT INTO `abzr6_reservations` (`id`, `loan`, `loanReturn`, `price`, `caution`, `activityType`, `id_users`, `id_planes`) VALUES
(7, '2023-04-19 00:00:00', '2023-04-30 00:00:00', 0, 2023, 'Réservation', 6, 6),
(8, '2023-03-30 00:00:00', '2023-03-31 00:00:00', 0, 2023, 'Réservation', 6, 6),
(9, '2023-04-07 00:00:00', '2023-04-09 00:00:00', 0, 2023, 'Réservation', 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `abzr6_sellappointment`
--

DROP TABLE IF EXISTS `abzr6_sellappointment`;
CREATE TABLE IF NOT EXISTS `abzr6_sellappointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sellAppointment_users_FK` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `abzr6_users`
--

DROP TABLE IF EXISTS `abzr6_users`;
CREATE TABLE IF NOT EXISTS `abzr6_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `major` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abzr6_users`
--

INSERT INTO `abzr6_users` (`id`, `firstName`, `lastName`, `postalCode`, `major`, `password`, `city`, `email`, `phoneNumber`) VALUES
(2, 'Jhon', 'Doe', '', 22, 'azerty', 'compiegne', 'jhon@yahoo.fr', '0617281314'),
(3, 'Arthur', 'DELCLOQUE', '', 24, '$2y$10$J4jjjv0XL6mztE.nYqtJ9u/HAzvymDiVuqf9Lk4rLFAQXzRoyfm2u', 'COMPIEGNE', 'jean-hugue@yahoo.fr', '0617281315'),
(4, 'Arthur', 'DELCLOQUE', '', 25, '$2y$10$4HkfxbSMQ629AZ7q9NH5jeHEQqlvxIRvjqc/7APfwSHWyvG67dBvy', 'COMPIEGNE', 'a.delcloque@yahoo.fr', '0617281315'),
(5, 'Arthur', 'DELCLOQUE', '', 47, '$2y$10$0Y4Iwnj2zy2g6RonztFN9.E3EUjd4J8HgP4nBG4b36OC1tMFc5086', 'COMPIEGNE', 'jeandelarue@yahoo.fr', '0617281315'),
(6, 'Arthur', 'DELCLOQUE', '', 56, '$2y$10$j2QPj8HZy2Wr7YkDFJnmN.pf8sVt3Gxhw/0YAlfFSqyCRxCUzENDy', 'COMPIEGNE', 'stab@yahoo.fr', '0617281315');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abzr6_planes`
--
ALTER TABLE `abzr6_planes`
  ADD CONSTRAINT `abzr6_planes_abrzr6_engine_FK` FOREIGN KEY (`id_abrzr6_engine`) REFERENCES `abrzr6_engine` (`id`),
  ADD CONSTRAINT `abzr6_planes_abzr6_aerodromes0_FK` FOREIGN KEY (`id_abzr6_aerodromes`) REFERENCES `abzr6_aerodromes` (`id`);

--
-- Contraintes pour la table `abzr6_reservations`
--
ALTER TABLE `abzr6_reservations`
  ADD CONSTRAINT `reservations_planes0_FK` FOREIGN KEY (`id_planes`) REFERENCES `abzr6_planes` (`id`),
  ADD CONSTRAINT `reservations_users_FK` FOREIGN KEY (`id_users`) REFERENCES `abzr6_users` (`id`);

--
-- Contraintes pour la table `abzr6_sellappointment`
--
ALTER TABLE `abzr6_sellappointment`
  ADD CONSTRAINT `sellAppointment_users_FK` FOREIGN KEY (`id_users`) REFERENCES `abzr6_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
