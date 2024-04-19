-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 18 avr. 2024 à 15:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mission2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Formations`
--

CREATE TABLE `Formations` (
  `ID_Formation` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Domaine` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Cout` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Formations`
--

INSERT INTO `Formations` (`ID_Formation`, `Nom`, `Domaine`, `Description`, `Cout`) VALUES
(1, 'PowerPoint Niveau 2', 'Informatique', 'Perfectionnement sur PowerPoint', 55.00),
(2, 'Photoshop Niveau 1', 'Informatique', 'Initiation au traitement des images numériques', 110.00),
(3, 'Soirée d\'information sur la convention collective nationale du sport', 'Gestion', 'Information sur la législation sportive', 0.00),
(4, 'Actualisation des connaissances sur la convention collective nationale du sport', 'Gestion', 'Mise à jour des connaissances en législation sportive', 0.00),
(5, 'Comptabilité', 'Gestion', 'Fondamentaux de la comptabilité associative', 0.00),
(6, 'Recherche de partenariat', 'Gestion', 'Stratégies de recherche de partenariat', 0.00),
(7, 'Organiser une manifestation éco responsable', 'Développement Durable', 'Organisation d’événements écoresponsables', 0.00),
(8, 'Prévention et secours civique (PSC)', 'Secourisme', 'Techniques de premiers secours', 0.00),
(9, 'Bonnes pratiques et premiers secours', 'Secourisme', 'Pratiques essentielles en premiers secours', 0.00),
(10, 'Conduite de réunion', 'Communication', 'Techniques efficaces pour conduire une réunion', 0.00),
(11, 'Communiquer avec la presse', 'Communication', 'Stratégies de communication avec les médias', 0.00),
(12, 'Langues étrangères', 'Communication', 'Cours de langues pour contextes professionnels', 0.00),
(13, 'test', 'test', 'test', 1.00),
(14, 'Test 1', 'Informatique', 'Test 1', 100.00);

-- --------------------------------------------------------

--
-- Structure de la table `Inscriptions`
--

CREATE TABLE `Inscriptions` (
  `ID_Inscription` int(11) NOT NULL,
  `ID_Participant` int(11) NOT NULL,
  `ID_Session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Participants`
--

CREATE TABLE `Participants` (
  `ID_Participant` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Statut` enum('Bénévole','Salarié') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Participants`
--

INSERT INTO `Participants` (`ID_Participant`, `Nom`, `Prenom`, `Statut`) VALUES
(1, 'Dupont', 'Pierre', 'Salarié'),
(2, 'Dupont', 'Pierre', 'Bénévole'),
(3, 'Dupont', 'Pierre', 'Bénévole'),
(4, 'Dupont', 'Pierre', 'Bénévole'),
(5, 'Dupont', 'Pierre', 'Bénévole'),
(6, 'Dupont', 'Pierre', 'Bénévole'),
(7, 'Dupont', 'Pierre', 'Bénévole'),
(8, 'Dupont', 'Pierre', 'Bénévole'),
(9, 'Dupont', 'Pierre', 'Bénévole');

-- --------------------------------------------------------

--
-- Structure de la table `Sessions`
--

CREATE TABLE `Sessions` (
  `ID_Session` int(11) NOT NULL,
  `ID_Formation` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Horaire` time NOT NULL,
  `Lieu` varchar(255) NOT NULL,
  `Public` varchar(500) DEFAULT NULL,
  `Intervenant` varchar(500) NOT NULL,
  `Contenu` varchar(500) DEFAULT NULL,
  `dateLimiteInscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Sessions`
--

INSERT INTO `Sessions` (`ID_Session`, `ID_Formation`, `Date`, `Horaire`, `Lieu`, `Public`, `Intervenant`, `Contenu`, `dateLimiteInscription`) VALUES
(4, 3, '2024-04-22', '20:40:00', 'Toulouse', 'Salariés', 'Test', 'test 1', '2024-04-18'),
(13, 11, '2024-05-06', '17:50:00', 'Toulouse', 'Salariés', 'Test', 'aizjn oiaz azoienaizjn oiaz azoienaizjn oiaz azoienaizjn oiaz azoienaizjn oiaz', '2024-04-29'),
(14, 8, '2024-05-06', '13:20:00', 'Toulouse', 'Salariés', 'Test 1', 'Test', '2024-04-29'),
(15, 1, '2024-04-30', '13:30:00', 'Toulouse', 'test', 'Test', 'test', '2024-04-26'),
(16, 6, '2024-04-30', '13:30:00', 'Toulouse', 'test', 'Test', 'test', '2024-04-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Formations`
--
ALTER TABLE `Formations`
  ADD PRIMARY KEY (`ID_Formation`);

--
-- Index pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  ADD PRIMARY KEY (`ID_Inscription`),
  ADD KEY `ID_Participant` (`ID_Participant`),
  ADD KEY `ID_Session` (`ID_Session`);

--
-- Index pour la table `Participants`
--
ALTER TABLE `Participants`
  ADD PRIMARY KEY (`ID_Participant`);

--
-- Index pour la table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`ID_Session`),
  ADD KEY `ID_Formation` (`ID_Formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Formations`
--
ALTER TABLE `Formations`
  MODIFY `ID_Formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  MODIFY `ID_Inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Participants`
--
ALTER TABLE `Participants`
  MODIFY `ID_Participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `ID_Session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`ID_Participant`) REFERENCES `Participants` (`ID_Participant`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`ID_Session`) REFERENCES `Sessions` (`ID_Session`);

--
-- Contraintes pour la table `Sessions`
--
ALTER TABLE `Sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`ID_Formation`) REFERENCES `Formations` (`ID_Formation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
