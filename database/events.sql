-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 15 Février 2017 à 23:46
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `events`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `subtitle` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `date_txt` varchar(100) COLLATE utf8_bin NOT NULL,
  `town` varchar(100) COLLATE utf8_bin NOT NULL,
  `institution_id` int(11) NOT NULL,
  `address` varchar(150) COLLATE utf8_bin NOT NULL,
  `room` varchar(150) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `date_begin_dt` date NOT NULL,
  `date_end_dt` date DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `total_day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `events_participants`
--

CREATE TABLE `events_participants` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `institutions`
--

CREATE TABLE `institutions` (
  `ID` int(11) NOT NULL,
  `NAME` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TEL` varchar(15) DEFAULT NULL,
  `INSTITUTION` varchar(300) NOT NULL,
  `FONCTION` varchar(50) DEFAULT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  `COUNTRY` varchar(50) NOT NULL,
  `LISTED` tinyint(1) NOT NULL DEFAULT '1',
  `DIETARY` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posters`
--

CREATE TABLE `posters` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 NOT NULL,
  `URL` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `FIRST_NAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `LAST_NAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `INSTITUTION` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

CREATE TABLE `programmes` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `DAY` int(11) NOT NULL,
  `TIME_BEGIN` time NOT NULL,
  `TIME_END` time NOT NULL,
  `DESCRIPTION` text,
  `event_id` int(11) NOT NULL,
  `SPEAKER` varchar(250) DEFAULT NULL,
  `BREAK` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rubrics`
--

CREATE TABLE `rubrics` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LINK` varchar(50) NOT NULL,
  `VALIDE` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_institutions` (`institution_id`),
  ADD KEY `fk_events_types` (`type_id`);

--
-- Index pour la table `events_participants`
--
ALTER TABLE `events_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_participants_part` (`participant_id`),
  ADD KEY `fk_events_participants` (`event_id`);

--
-- Index pour la table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_programmes_events` (`event_id`);

--
-- Index pour la table `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events_participants`
--
ALTER TABLE `events_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `posters`
--
ALTER TABLE `posters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`ID`),
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`ID`);

--
-- Contraintes pour la table `events_participants`
--
ALTER TABLE `events_participants`
  ADD CONSTRAINT `fk_events_participants` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_events_participants_part` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`ID`);

--
-- Contraintes pour la table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `fk_programmes_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
