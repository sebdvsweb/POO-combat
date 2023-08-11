-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 11 août 2023 à 07:10
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `combat`
--

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

CREATE TABLE `heroes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `health_point` int(11) DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `health_point`) VALUES
(1, 'Goku', 100),
(12, 'C-15', 0),
(13, 'C-16', 19),
(14, 'TATANE', 0),
(17, 'JOHNNY', 0),
(18, 'Cell', 0),
(19, 'Cell', 0),
(20, 'Cell', 0),
(21, 'Cell', 0),
(22, 'Cell', 0),
(23, 'Krilin', 100),
(24, 'Bozo', 0),
(25, 'Zobi', 0),
(26, 'Jean-Marie Badiou', 0),
(27, 'Bibi', 39);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
