-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 juil. 2021 à 06:05
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `casdefraude`
--

-- --------------------------------------------------------

--
-- Structure de la table `conseildiscipline`
--

CREATE TABLE `conseildiscipline` (
  `idConseil` int(11) NOT NULL,
  `loginS` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `PV` text NOT NULL,
  `numApogee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `effectuerfraude`
--

CREATE TABLE `effectuerfraude` (
  `numApogee` int(11) NOT NULL,
  `idFraude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `envoyerrapport`
--

CREATE TABLE `envoyerrapport` (
  `loginS` varchar(50) NOT NULL,
  `loginR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `numApogee` int(11) NOT NULL,
  `numEtd` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `filliere` varchar(50) NOT NULL,
  `optionFill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fraude`
--

CREATE TABLE `fraude` (
  `idFraude` int(11) NOT NULL,
  `description` text NOT NULL,
  `anneeUniversitaire` varchar(50) NOT NULL,
  `session` text NOT NULL,
  `loginR` varchar(50) NOT NULL,
  `numApogee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `numApogee` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `responsablebureauexam`
--

CREATE TABLE `responsablebureauexam` (
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `responsablebureauexam`
--

INSERT INTO `responsablebureauexam` (`login`, `password`) VALUES
('asmae.assmougue@gmail.com', 'azerty0123456789'),
('nom.prenom@gmail.com', 'responsable0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`login`, `password`) VALUES
('asmae.assmougue@gmail.com', 'azerty0123456789'),
('nom.prenom@um5.ac.ma', 'secretaire0123456789');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conseildiscipline`
--
ALTER TABLE `conseildiscipline`
  ADD PRIMARY KEY (`idConseil`),
  ADD KEY `loginS` (`loginS`),
  ADD KEY `numApogee` (`numApogee`);

--
-- Index pour la table `effectuerfraude`
--
ALTER TABLE `effectuerfraude`
  ADD PRIMARY KEY (`numApogee`,`idFraude`),
  ADD KEY `idFraude` (`idFraude`),
  ADD KEY `numApogee` (`numApogee`);

--
-- Index pour la table `envoyerrapport`
--
ALTER TABLE `envoyerrapport`
  ADD PRIMARY KEY (`loginS`,`loginR`),
  ADD KEY `loginR` (`loginR`),
  ADD KEY `loginS` (`loginS`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`numApogee`);

--
-- Index pour la table `fraude`
--
ALTER TABLE `fraude`
  ADD PRIMARY KEY (`idFraude`),
  ADD KEY `loginR` (`loginR`),
  ADD KEY `numApogee` (`numApogee`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numApogee` (`numApogee`);

--
-- Index pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Index pour la table `responsablebureauexam`
--
ALTER TABLE `responsablebureauexam`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conseildiscipline`
--
ALTER TABLE `conseildiscipline`
  MODIFY `idConseil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fraude`
--
ALTER TABLE `fraude`
  MODIFY `idFraude` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conseildiscipline`
--
ALTER TABLE `conseildiscipline`
  ADD CONSTRAINT `conseildiscipline_ibfk_1` FOREIGN KEY (`loginS`) REFERENCES `secretaire` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conseildiscipline_ibfk_2` FOREIGN KEY (`numApogee`) REFERENCES `etudiant` (`numApogee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `effectuerfraude`
--
ALTER TABLE `effectuerfraude`
  ADD CONSTRAINT `effectuerfraude_ibfk_1` FOREIGN KEY (`idFraude`) REFERENCES `fraude` (`idFraude`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `effectuerfraude_ibfk_2` FOREIGN KEY (`numApogee`) REFERENCES `etudiant` (`numApogee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `envoyerrapport`
--
ALTER TABLE `envoyerrapport`
  ADD CONSTRAINT `envoyerrapport_ibfk_1` FOREIGN KEY (`loginR`) REFERENCES `responsablebureauexam` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `envoyerrapport_ibfk_2` FOREIGN KEY (`loginS`) REFERENCES `secretaire` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fraude`
--
ALTER TABLE `fraude`
  ADD CONSTRAINT `fraude_ibfk_1` FOREIGN KEY (`loginR`) REFERENCES `responsablebureauexam` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fraude_ibfk_2` FOREIGN KEY (`numApogee`) REFERENCES `etudiant` (`numApogee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`numApogee`) REFERENCES `etudiant` (`numApogee`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
