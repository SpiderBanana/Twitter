-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 15 avr. 2023 à 21:44
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image_path`) VALUES
(1, 'images/'),
(2, 'images/'),
(3, 'images/'),
(4, 'images/'),
(5, 'images/'),
(6, 'images/'),
(7, 'images/'),
(8, 'images/'),
(9, 'Arrière-plan.jpg'),
(10, 'images/'),
(11, 'images/'),
(12, 'images/'),
(13, 'images/'),
(14, 'images/');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_heure_message` datetime NOT NULL,
  `gif` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `pseudo`, `content`, `tag`, `date_heure_message`, `gif`, `image_path`) VALUES
(601, 'Steave', 'Ce soir je fini One piece !', '9', '2023-04-15 23:25:22', NULL, 'uploads/plan gif marketing strategy.gif'),
(602, 'Momo', 'Play ou Xbox ?', '10', '2023-04-15 23:30:42', NULL, 'uploads/image-GIF.gif');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `profile_picture`) VALUES
(20, 'antoine@gmail.com', '1234', 'Steave', 'uploads/Manchot empereur_CC-BY-SA_Samuel Blanc_Wikimedia.jpg'),
(21, 'huynh@gmail.com', '1234', 'Momo', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(22, 'poyo@gmail.com', '7&yebv*ooCTUmY3txt', 'bonobo', 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
