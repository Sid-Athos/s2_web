-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 07 juil. 2018 à 13:36
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE SCHEMA `mystudio`;

USE mystudio;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mystudio`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `album_ID` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(45) NOT NULL,
  `album_cover` varchar(255) DEFAULT NULL,
  `release_date` timestamp NULL DEFAULT NULL,
  `artist_ID` int(11) NOT NULL,
  PRIMARY KEY (`album_ID`),
  KEY `artist_ID` (`artist_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `artist_ID` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(50) NOT NULL,
  `artist_picture` varchar(255) NOT NULL,
  `category` enum('amateur','pro') NOT NULL,
  PRIMARY KEY (`artist_ID`),
  UNIQUE KEY `artist_ID_UNIQUE` (`artist_ID`),
  UNIQUE KEY `artist_name` (`artist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Structure de la table `fav_by`
--

DROP TABLE IF EXISTS `fav_by`;
CREATE TABLE IF NOT EXISTS `fav_by` (
  `username` int(11) NOT NULL,
  `music` int(11) NOT NULL,
  `fav_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fav_ID`),
  KEY `music_IDx` (`music`),
  KEY `username_IDx` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

DROP TABLE IF EXISTS `musics`;
CREATE TABLE IF NOT EXISTS `musics` (
  `music_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featuring` varchar(45) NOT NULL,
  `music_path` varchar(255) NOT NULL,
  `nb_listening` int(11) NOT NULL DEFAULT '0',
  `lyrics` longtext,
  `trans` longtext,
  `style` int(11) NOT NULL DEFAULT '0',
  `album` int(11) NOT NULL,
  `artist` int(11) NOT NULL,
  PRIMARY KEY (`music_ID`),
  KEY `artist_IDx` (`artist`),
  KEY `style_IDx` (`style`),
  KEY `album_IDx` (`album`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `playlist_ID` int(11) NOT NULL AUTO_INCREMENT,
  `play_title` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `users` int(11) NOT NULL,
  PRIMARY KEY (`playlist_ID`),
  KEY `users_IDx` (`users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `registered_in`
--

DROP TABLE IF EXISTS `registered_in`;
CREATE TABLE IF NOT EXISTS `registered_in` (
  `play_ID` int(11) NOT NULL AUTO_INCREMENT,
  `music` int(11) NOT NULL,
  `playlist` int(11) NOT NULL,
  PRIMARY KEY (`play_ID`),
  KEY `music_IDx` (`music`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

DROP TABLE IF EXISTS `styles`;
CREATE TABLE IF NOT EXISTS `styles` (
  `style_ID` int(11) NOT NULL AUTO_INCREMENT,
  `style_name` varchar(12) NOT NULL,
  PRIMARY KEY (`style_ID`),
  UNIQUE KEY `IDtable1_UNIQUE` (`style_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `styles`
--

INSERT INTO `styles` (`style_ID`, `style_name`) VALUES
(1, 'Rap');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `pw` varchar(25) NOT NULL,
  `category` enum('artiste','auditeur') NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `album` FOREIGN KEY (`album`) REFERENCES `albums` (`album_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `artist` FOREIGN KEY (`artist`) REFERENCES `artists` (`artist_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `style` FOREIGN KEY (`style`) REFERENCES `styles` (`style_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `users` FOREIGN KEY (`users`) REFERENCES `users` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `registered_in`
--
ALTER TABLE `registered_in`
  ADD CONSTRAINT `music` FOREIGN KEY (`music`) REFERENCES `musics` (`music_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `playlist` FOREIGN KEY (`play_ID`) REFERENCES `playlists` (`playlist_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





