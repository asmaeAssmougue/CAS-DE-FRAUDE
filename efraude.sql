-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 sep. 2021 à 00:11
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
-- Base de données : `efraude`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin', 'admin0123456789'),
('assmougueAsmae', 'assmougue0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `conseildiscipline`
--

CREATE TABLE `conseildiscipline` (
  `loginS` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `PV` text NOT NULL,
  `numApogee` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `numApogee` varchar(535) NOT NULL,
  `numEtd` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `filliere` text NOT NULL,
  `semestre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filliere`
--

CREATE TABLE `filliere` (
  `codeF` int(11) NOT NULL,
  `lib_fill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filliere`
--

INSERT INTO `filliere` (`codeF`, `lib_fill`) VALUES
(1, 'قانون بالعربية'),
(2, 'Droit en Français'),
(3, 'Economie de Gestion'),
(4, 'Sciences Politiques'),
(5, 'Licence D\'études Fondamentales en Sciences Economiques et Gestion'),
(6, 'Licence D\'études Fondamentales en Droit Français'),
(7, 'الاجازة في القانون بالعربية'),
(9, 'Licence D\'études Fondamentales D\'exellence en Sciences de Gestion'),
(10, 'Licence D\'études Fondamentales D\'exellence en Sciences de Politique'),
(11, 'Licence Professionnelle en Management PME-PMI'),
(12, 'العلوم القانونية'),
(13, 'القانون العام والعلوم السياسية'),
(14, 'Droit Publiques et Sciences Politique'),
(15, 'Economie des Territoires'),
(16, 'Sciences de Gestion'),
(17, 'Sciences Economiques'),
(18, 'Finance Publiques et Fiscalité(MS)'),
(19, 'Sciences Juridiques'),
(20, 'Migration et Societés(MS)'),
(21, 'Genre et Politiques Publiques(MS)'),
(22, 'Administration Internationale et Gestion des partenariats dans l\'espace Euro Mediterranee(MS)'),
(23, '(ماستر متخصص)حقوق الانسان القانون الدولي الانساني'),
(24, 'Economie de l\'environnement'),
(25, 'Economie et Evaluation des Politiques Publiques'),
(26, 'Gestion Finance Comptable et Fiscale(MS)'),
(27, 'Management Stratégiques des Ressources Humaines'),
(28, 'Finance Islamiques');

-- --------------------------------------------------------

--
-- Structure de la table `fraude`
--

CREATE TABLE `fraude` (
  `description` text NOT NULL,
  `anneeUniversitaire` varchar(250) NOT NULL,
  `session` text NOT NULL,
  `loginR` varchar(250) NOT NULL,
  `numApogee` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `numApogee` varchar(535) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `responsablebureauexam`
--

CREATE TABLE `responsablebureauexam` (
  `login` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `responsablebureauexam`
--

INSERT INTO `responsablebureauexam` (`login`, `password`) VALUES
('assmougue', 'assmougue0123456789'),
('responsable', 'responsable0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `login` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`login`, `password`) VALUES
('assmougueAsmae', 'assmougue0123456789'),
('secretaire', 'secretaire0123456789');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `conseildiscipline`
--
ALTER TABLE `conseildiscipline`
  ADD UNIQUE KEY `numApogee` (`numApogee`),
  ADD KEY `loginS` (`loginS`),
  ADD KEY `numApogee_2` (`numApogee`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`numApogee`);

--
-- Index pour la table `filliere`
--
ALTER TABLE `filliere`
  ADD PRIMARY KEY (`codeF`);

--
-- Index pour la table `fraude`
--
ALTER TABLE `fraude`
  ADD UNIQUE KEY `numApogee` (`numApogee`),
  ADD KEY `loginR` (`loginR`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numApogee` (`numApogee`);

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
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
