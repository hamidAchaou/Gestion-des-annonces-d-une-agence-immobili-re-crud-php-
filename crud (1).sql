-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 fév. 2023 à 08:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `space` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `announce`
--

INSERT INTO `announce` (`id`, `title`, `type`, `price`, `space`, `date`, `location`, `image`, `discription`) VALUES
(29, 'Villa Nord', 'Sale', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/3.jpg', 'best villa '),
(30, 'villa Noir', 'Vent', 30000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/2.jpg', 'best villa in tanga lbalya'),
(31, 'Villa Nord', 'Vent', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/6.jpg', 'best villa '),
(32, 'villa Noir', 'Vent', 3000000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/4.jpg', 'best villa in tanga lbalya'),
(33, 'Villa Nord', 'Sale', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/3.jpg', 'best villa '),
(34, 'villa Noir', 'Vent', 3000000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/4.jpg', 'best villa in tanga lbalya'),
(35, 'Villa Nord', 'Sale', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/3.jpg', 'best villa '),
(36, 'villa Noir', 'Vent', 3000000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/4.jpg', 'best villa in tanga lbalya'),
(37, 'villa Noir', 'Vent', 3000000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/4.jpg', 'best villa in tanga lbalya'),
(38, 'Villa Nord', 'Sale', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/3.jpg', 'best villa '),
(39, 'Villa Nord', 'Sale', 300000, 1000, '2023-02-07', 'Gznaya', 'uploads/3.jpg', 'best villa '),
(40, 'villa Noir', 'Vent', 3000000, 1200, '2023-02-07', 'tanga lbalya', 'uploads/4.jpg', 'best villa in tanga lbalya');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
