-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 12 Janvier 2016 à 17:36
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `mailing`
--

-- --------------------------------------------------------

--
-- Structure de la table `maillist`
--

CREATE TABLE `maillist` (
`id` int(11) unsigned NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `subscribed` tinyint(1) DEFAULT NULL,
  `uniqid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maillist`
--

INSERT INTO `maillist` (`id`, `mail`, `date`, `confirmed`, `subscribed`, `uniqid`) VALUES
(31, 'kevin@gmail.com', '2016-01-12 17:17:22', 0, 0, '56952712e84c1'),
(32, 'bouboule@gmail.com', '2016-01-12 17:17:32', 0, 0, '5695271c83c68');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
`id` int(11) unsigned NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `hash`, `secret`, `mail`) VALUES
(1, 'admin', '$2y$10$euBi2I91WBNqZJZL1e/GY.SFetM3h5x6le/HscJifPH1/4PN8VBF6', '5694c3884f212', NULL),
(29, NULL, '$2y$10$FWKNUDs1zs9tuE7xFv3HJeaWCd44UN1.5PqFIe2iMYCjAhXOhvN0i', '5694c921c4750', NULL),
(30, NULL, '$2y$10$.4Rfiu1uYeiGeQCgxOIoSuIWkY1M7FyGXCtwfXc7FJ/q1Njacpenu', '5694c9255bf19', NULL),
(31, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, '0'),
(33, NULL, NULL, NULL, '0'),
(34, NULL, NULL, NULL, '0'),
(35, NULL, NULL, NULL, '0'),
(36, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, '0'),
(38, NULL, NULL, NULL, '0'),
(39, NULL, NULL, NULL, '0'),
(40, NULL, NULL, NULL, '0'),
(41, NULL, NULL, NULL, '0'),
(42, NULL, NULL, NULL, 'noxoor@gmail.com'),
(43, NULL, NULL, NULL, 'noxoor@gmail.com'),
(44, NULL, NULL, NULL, 'noxoor@gmail.com'),
(45, NULL, NULL, NULL, 'noxoor@gmail.com'),
(46, NULL, NULL, NULL, 'tamere@gmail.com'),
(47, NULL, NULL, NULL, 'tamer2e@gmail.com'),
(48, NULL, NULL, NULL, 'noxo2or@gmail.com'),
(49, NULL, NULL, NULL, '1tamere@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `maillist`
--
ALTER TABLE `maillist`
 ADD PRIMARY KEY (`id`), ADD KEY `confirmed` (`mail`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `maillist`
--
ALTER TABLE `maillist`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
