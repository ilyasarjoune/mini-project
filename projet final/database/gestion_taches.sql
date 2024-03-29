-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 mars 2024 à 18:46
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
-- Base de données : `gestion_taches`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `IDCAT` int(11) NOT NULL,
  `nameC` varchar(255) DEFAULT NULL,
  `descriptionC` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`IDCAT`, `nameC`, `descriptionC`, `userid`) VALUES
(1, 'work', 'tasks of work', 1),
(2, 'home', 'tasks for home 1', 1),
(3, 'tkharbia', 'drgdfgdfg', NULL),
(5, 'personal', 'personal staff\r\n', 1),
(7, 'home', 'home\r\n', 11);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `IDTask` int(11) NOT NULL,
  `IDuser` int(11) DEFAULT NULL,
  `idCAT` int(11) DEFAULT NULL,
  `titleT` varchar(255) DEFAULT NULL,
  `descriptionT` varchar(255) DEFAULT NULL,
  `statu` varchar(55) DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`IDTask`, `IDuser`, `idCAT`, `titleT`, `descriptionT`, `statu`, `deadline`) VALUES
(3, 1, 1, 'get ajob', 'uhuiiuhjih', 'In progress', '2024-03-21'),
(10, 1, 2, 'test', 'testjjj', 'Not started', '2024-03-16'),
(12, 1, 2, 'test', 'test', 'done', '2024-03-16'),
(13, 1, 2, 'test', 'test', 'done', '2024-03-16'),
(14, 1, 2, 'test', 'test', 'done', '2024-03-16'),
(15, 1, 2, 'test', 'test', 'done', '2024-03-16'),
(17, 1, NULL, 'jj', 'jj', 'Not started', '2024-03-23'),
(18, 1, 1, 'kkk', 'kkk', 'Not started', '2024-03-17'),
(21, 11, 7, 'testn1', 'hiii', 'In progress', '2024-03-10'),
(23, 1, 5, 'htfy', 'tftytf', 'In progress', '2024-03-16'),
(24, 1, 5, 'cghg', 'fghfgh', 'Done', '2024-03-16'),
(25, 12, 1, 'ssss', 'ssss', 'Not started', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `IDuser` int(11) NOT NULL,
  `nomU` varchar(55) DEFAULT NULL,
  `prenomU` varchar(55) DEFAULT NULL,
  `emailU` varchar(55) DEFAULT NULL,
  `motpass` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IDuser`, `nomU`, `prenomU`, `emailU`, `motpass`) VALUES
(1, 'aarjoune', 'ilyas', 'ilyas@check.com', 'aaa'),
(2, 'bjbj', 'jbj', 'il@j.com', '12a'),
(3, 'uu', 'uu', 'uu@uu.ma', '123'),
(4, 'gg', 'gg', 'gg', 'gg'),
(5, 'test', 'test', 'test@pp', '123'),
(6, 'te', 'test', 'tt@hh', '123'),
(7, 'te', 'test', 'tt@hh', '123'),
(8, 'te', 'test', 'tt@hh', '123'),
(9, 'te', 'test', 'tt@hh', '123'),
(10, 'hmed', 'hmeeeer', 'hmed@jfjf', '123'),
(11, 'aarjoune', 'amine', 'amine@amine.ma', '123'),
(12, 'popo', 'popo', 'popo@popo.ma', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IDCAT`),
  ADD KEY `fk_userid` (`userid`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`IDTask`),
  ADD KEY `IDuser` (`IDuser`),
  ADD KEY `idCAT` (`idCAT`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDuser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `IDCAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `IDTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `IDuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`IDuser`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `users` (`IDuser`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`idCAT`) REFERENCES `category` (`IDCAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
