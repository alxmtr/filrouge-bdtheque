-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Janvier 2017 à 10:35
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cataloguebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `login`, `remember_token`, `password`) VALUES
(1, 'admin', 'qnfMgXchMhCuB7RWYmlfwm7XgS0dZN3mvvuteCSkNqTEVEQiahDmrglVHnE5', '$2y$10$8yV.pvALq3rRFJUnLXLhpuGHK69a7bfIbWs32N8.mH99xA557Lrle');

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `aut_id` int(11) NOT NULL,
  `aut_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteurs`
--

INSERT INTO `auteurs` (`aut_id`, `aut_nom`) VALUES
(1, 'Uderzo'),
(2, 'Hergé'),
(3, 'Ptiluc'),
(4, 'Bilal'),
(5, 'Manu Larcenet'),
(6, 'Riad Satouf'),
(7, 'Gilbert Delahaye et Marcel Marlier'),
(8, 'Letendre'),
(9, 'Gotlib'),
(11, 'Ptiluc'),
(12, 'Gang/Labourot/Lerolle'),
(13, 'Turf'),
(14, 'Allan Moore'),
(15, 'Ayrolles et Massou'),
(16, 'Winshluss'),
(20, 'Robert Kirkman');

-- --------------------------------------------------------

--
-- Structure de la table `bandesdessinees`
--

CREATE TABLE `bandesdessinees` (
  `bd_id` int(11) NOT NULL,
  `bd_titre` varchar(255) NOT NULL,
  `bd_resume` text NOT NULL,
  `bd_image` varchar(255) NOT NULL,
  `bd_auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `bandesdessinees`
--

INSERT INTO `bandesdessinees` (`bd_id`, `bd_titre`, `bd_resume`, `bd_image`, `bd_auteur_id`) VALUES
(3, 'Astérix légionnaire', 'Astérix et Obélix s\'engage dans la légion', '9782012101425.jpg', 1),
(4, 'Tintin et le trésor de Rackham le rouge', 'A la recherche de l\'héritage du capitaine Hadoock.', '9782203001114.jpg', 2),
(45, 'Animal\'Z', 'Histoires croisées aprés une apocalypse nucléaire', '9782203019669.jpg', 4),
(47, 'Martine petit Rat de l\'opera', 'Tout est dans le titre', '9782203101227.jpg', 7),
(48, 'La quete de l\'oiseau du temps', '', '9782205047981.jpg', 8),
(50, 'Rubrique à Brac', 'Trucs en Vrac', '9782205055726.jpg', 9),
(51, 'Le retour à la terre', 'De la banlieue à la campagne', '9782205057331.jpg', 5),
(55, 'La foire aux cochons', '', '9782226109323.jpg', 3),
(56, 'Les Geeks', '', '9782302003781.jpg', 12),
(57, 'The Watchmen', '', '9782809406412.jpg', 14),
(58, 'Pinocchio', '', '9782849610671.jpg', 16),
(65, 'The Walking Dead', 'y a des zombies', '1483624980.jpg', 20);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `com_id` int(11) NOT NULL,
  `com_bd_id` int(11) NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `com_auteur` varchar(255) NOT NULL,
  `com_texte` text NOT NULL,
  `online` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `com_bd_id`, `com_date`, `com_auteur`, `com_texte`, `online`) VALUES
(1, 45, '2009-10-26 19:29:02', 'Dédé', 'Quelqu\'un a vu ma clé à molette ?', 1),
(2, 51, '2009-10-26 19:30:20', 'Roror', 'un trés bon choix', 1),
(3, 4, '2009-10-26 19:50:57', 'Plouf', 'Un grand Classique', 1),
(22, 65, '2017-01-05 14:04:13', 'alex', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `liens_bd_themes`
--

CREATE TABLE `liens_bd_themes` (
  `lien_bd_id` int(11) NOT NULL,
  `lien_themes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `liens_bd_themes`
--

INSERT INTO `liens_bd_themes` (`lien_bd_id`, `lien_themes_id`) VALUES
(3, 1),
(50, 1),
(51, 1),
(55, 1),
(56, 1),
(58, 1),
(48, 2),
(45, 3),
(55, 3),
(58, 3),
(47, 4),
(50, 5),
(56, 5),
(48, 6),
(57, 6),
(45, 7),
(57, 7),
(3, 9),
(65, 11);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_01_04_104219_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `th_id` int(11) NOT NULL,
  `th_intitule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`th_id`, `th_intitule`) VALUES
(1, 'humour'),
(2, 'heroic fantasy'),
(3, 'adulte'),
(4, 'enfant'),
(5, 'sketchs'),
(6, 'série'),
(7, 'science fiction'),
(8, 'médiéval'),
(9, 'Péplum'),
(10, 'Policier'),
(11, 'horreur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_login_unique` (`login`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`aut_id`);

--
-- Index pour la table `bandesdessinees`
--
ALTER TABLE `bandesdessinees`
  ADD PRIMARY KEY (`bd_id`),
  ADD KEY `fk_aut_bd` (`bd_auteur_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_bd_comment` (`com_bd_id`);

--
-- Index pour la table `liens_bd_themes`
--
ALTER TABLE `liens_bd_themes`
  ADD PRIMARY KEY (`lien_bd_id`,`lien_themes_id`),
  ADD KEY `fk_themes_lien` (`lien_themes_id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`th_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `aut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `bandesdessinees`
--
ALTER TABLE `bandesdessinees`
  MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `th_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bandesdessinees`
--
ALTER TABLE `bandesdessinees`
  ADD CONSTRAINT `fk_aut_bd` FOREIGN KEY (`bd_auteur_id`) REFERENCES `auteurs` (`aut_id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_bd_comment` FOREIGN KEY (`com_bd_id`) REFERENCES `bandesdessinees` (`bd_id`);

--
-- Contraintes pour la table `liens_bd_themes`
--
ALTER TABLE `liens_bd_themes`
  ADD CONSTRAINT `fk_bd_lien` FOREIGN KEY (`lien_bd_id`) REFERENCES `bandesdessinees` (`bd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_themes_lien` FOREIGN KEY (`lien_themes_id`) REFERENCES `themes` (`th_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
