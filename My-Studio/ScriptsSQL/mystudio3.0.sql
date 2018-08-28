-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 juin 2018 à 00:01
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(45) NOT NULL,
  `album_cover` varchar(250) NOT NULL,
  `release_date` timestamp(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id_album`, `album_name`, `album_cover`, `release_date`) VALUES
(1, 'Soulstreet', 'Views/images/soul.jpeg', '2018-06-20 22:00:00.0000'),
(2, 'Bled', 'Views/images/cheb.jpeg', '2018-06-18 22:00:00.0000'),
(3, 'la fierté des notres', 'Views/images/rohff.jpeg', '2018-06-07 22:00:00.0000'),
(4, 'Babylone', 'Views/images/bob.jpeg', '2018-06-07 22:00:00.0000'),
(5, 'PDRG', 'Views/images/pdrg.jpeg', '2016-07-05 22:00:00.0000'),
(6, 'Première consultation', 'Views/images/doc.jpeg', '2017-06-08 22:00:00.0000'),
(7, 'Ipseité', 'Views/images/damso.jpeg', '2018-06-14 22:00:00.0000'),
(8, 'N.I 2.0', 'Views/images/N.I.jpeg', '2018-06-03 22:00:00.0000'),
(9, 'Formidable', 'Views/images/formidable.jpeg', '2018-06-11 22:00:00.0000'),
(10, 'Melodies', 'Views/images/bruel.jpeg', '2018-06-03 22:00:00.0000'),
(11, 'Valses', 'Views/images/bruel.jpeg', '2018-06-07 22:00:00.0000');

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id_artist` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(25) NOT NULL,
  `category` set('amateur','pro') NOT NULL,
  PRIMARY KEY (`id_artist`),
  UNIQUE KEY `id_artist_UNIQUE` (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id_artist`, `artist_name`, `category`) VALUES
(1, 'Soulking', 'pro'),
(2, 'Cheb khaled', 'pro'),
(3, 'Rohff', 'pro'),
(4, 'Booba', 'pro'),
(5, 'Bruel', 'pro'),
(6, 'Bob Marley', 'pro'),
(7, 'Ray Charles', 'pro'),
(8, 'Doc gyneco', 'pro'),
(9, 'Damso', 'pro'),
(10, 'Ninho', 'pro'),
(11, 'Stromae', 'pro');

-- --------------------------------------------------------

--
-- Structure de la table `fav_by`
--

DROP TABLE IF EXISTS `fav_by`;
CREATE TABLE IF NOT EXISTS `fav_by` (
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `id_fav` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_fav`),
  KEY `music_idx` (`music_id`),
  KEY `username_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

DROP TABLE IF EXISTS `musics`;
CREATE TABLE IF NOT EXISTS `musics` (
  `id_music` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `featuring` varchar(45) NOT NULL,
  `nb_listening` int(11) DEFAULT '0',
  `lyrics` longtext,
  `trans` longtext,
  `music_path` varchar(225) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_music`),
  KEY `artist_idx` (`artist_id`),
  KEY `style_idx` (`style_id`),
  KEY `album_idx` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musics`
--

INSERT INTO `musics` (`id_music`, `title`, `featuring`, `nb_listening`, `lyrics`, `trans`, `music_path`, `style_id`, `album_id`, `artist_id`) VALUES
(1, 'Ya Chebba', '', 0, NULL, NULL, '', 2, 2, 2),
(2, 'Mi Amigo', '', 0, NULL, NULL, '', 1, 1, 1),
(4, 'Dounia', '', 0, NULL, NULL, NULL, 1, 5, 3),
(5, 'No women no cry', '', 0, NULL, NULL, NULL, 3, 4, 6),
(6, 'regrette', '', 0, NULL, NULL, NULL, 1, 3, 3),
(7, 'Vanessa', '', 0, NULL, NULL, NULL, 1, 6, 8),
(8, 'Dems', '', 0, NULL, NULL, NULL, 1, 7, 9),
(9, 'Marie', '', 0, NULL, NULL, NULL, 6, 9, 11),
(10, 'Vivre', '', 0, NULL, NULL, NULL, 6, 10, 5),
(11, 'Mourrir', '', 0, NULL, NULL, NULL, 6, 11, 5),
(12, 'Rasta gang', '', 0, NULL, NULL, NULL, 3, 4, 6),
(13, 'Gros teh', '', 0, NULL, NULL, NULL, 3, 4, 6),
(17, 'Pro Era', 'Suspect', 0, NULL, NULL, 'musics/Suspect Feat Pro Era.mp3', NULL, NULL, NULL),
(31, 'Capital Steez', 'Killuminati', 0, NULL, NULL, 'musics/Pennyroyal.mp3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `play_title` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `users_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `registered_in`
--

DROP TABLE IF EXISTS `registered_in`;
CREATE TABLE IF NOT EXISTS `registered_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `music_idx` (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

DROP TABLE IF EXISTS `styles`;
CREATE TABLE IF NOT EXISTS `styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style_name` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idtable1_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `styles`
--

INSERT INTO `styles` (`id`, `style_name`) VALUES
(1, 'RAP'),
(2, 'RAI'),
(3, 'RAGGAE'),
(4, 'BLUES'),
(5, 'JAZZ'),
(6, 'VARIETE'),
(7, 'RNB');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `pw` varchar(25) NOT NULL,
  `category` enum('artiste','auditeur') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `pw`, `category`) VALUES
(1, 'Isma49', 'rfo', 'artiste'),
(2, 'Ismael', 'nkokp', 'artiste');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id_album`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id_artist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `style` FOREIGN KEY (`style_id`) REFERENCES `styles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `registered_in`
--
ALTER TABLE `registered_in`
  ADD CONSTRAINT `music` FOREIGN KEY (`music_id`) REFERENCES `musics` (`id_music`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `playlist` FOREIGN KEY (`id`) REFERENCES `playlists` (`id_playlist`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
