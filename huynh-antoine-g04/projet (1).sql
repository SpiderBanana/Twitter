-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 avr. 2023 à 23:10
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
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_heure_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `pseudo`, `content`, `tag`, `date_heure_message`) VALUES
(203, 'Scorpion', 'hola', '1', '2023-04-10 19:59:43'),
(204, 'Scorpion', 'hey', '1', '2023-04-10 19:59:48'),
(205, 'Scorpion', 'hey', '1', '2023-04-10 20:01:09'),
(206, 'Scorpion', 'hey', '1', '2023-04-10 20:01:27'),
(207, 'Scorpion', 'hey', '1', '2023-04-10 20:01:44'),
(208, 'Scorpion', 'hey', '1', '2023-04-10 20:01:54'),
(209, 'Scorpion', '@hrllo', '1', '2023-04-10 20:27:58'),
(210, 'Scorpion', '#yooo', '1', '2023-04-10 20:28:13'),
(211, 'Scorpion', '#qzd', '4', '2023-04-10 20:30:39'),
(212, 'Scorpion', '#qzd', '4', '2023-04-10 20:31:09'),
(213, 'Scorpion', '#qzd', '4', '2023-04-10 20:36:28'),
(214, 'Scorpion', 'qzddzq', '1', '2023-04-10 20:36:36'),
(215, 'Scorpion', 'qzddzq', '1', '2023-04-10 20:39:31'),
(216, 'Scorpion', 'qzddzq', '1', '2023-04-10 20:43:12'),
(217, 'Scorpion', 'qz', '1', '2023-04-10 20:43:21'),
(218, 'Scorpion', 'qz', '1', '2023-04-10 20:45:39'),
(219, 'Scorpion', 'qzdqdz', '1', '2023-04-10 20:45:47'),
(220, 'Scorpion', 'qzdqdz', '1', '2023-04-10 20:46:19'),
(221, 'Scorpion', 'qzdqdz', '1', '2023-04-10 20:46:26'),
(222, 'Scorpion', 'qzdqdz', '1', '2023-04-10 20:51:01'),
(223, 'Scorpion', 'qzd', '1', '2023-04-10 20:51:05'),
(224, 'Scorpion', 'qzdqzd', NULL, '2023-04-10 20:52:21'),
(225, 'Scorpion', 'qzd', '1', '2023-04-10 20:54:13'),
(226, 'Scorpion', 'qzd', '1', '2023-04-10 20:57:13'),
(227, 'Scorpion', 'qdz', '1', '2023-04-10 20:57:18'),
(229, 'Scorpion', 'qzd', '1', '2023-04-10 20:58:27'),
(230, 'Scorpion', 'qzd', '1', '2023-04-10 20:59:03'),
(231, 'Scorpion', 'q', '1', '2023-04-10 20:59:07'),
(232, 'Scorpion', 'q', '1', '2023-04-10 20:59:23'),
(233, 'Scorpion', 'q', '1', '2023-04-10 20:59:31'),
(234, 'Scorpion', 'q', '1', '2023-04-10 20:59:41'),
(235, 'Scorpion', 'q', '1', '2023-04-10 20:59:53'),
(236, 'Scorpion', '5', '1', '2023-04-10 21:00:13'),
(237, 'Scorpion', '5', '1', '2023-04-10 21:00:23'),
(238, 'Scorpion', '5', '1', '2023-04-10 21:00:28'),
(239, 'Scorpion', '5', '1', '2023-04-10 21:00:37'),
(240, 'Scorpion', '5', '1', '2023-04-10 21:02:21'),
(241, 'Scorpion', '5', '1', '2023-04-10 21:02:29'),
(242, 'Scorpion', '5', '1', '2023-04-10 21:02:35'),
(243, 'Scorpion', 'qzd', '1', '2023-04-10 21:04:27'),
(244, 'Scorpion', 'qzd', NULL, '2023-04-10 21:06:24'),
(245, 'Scorpion', 'qzd', NULL, '2023-04-10 21:06:35'),
(246, 'Scorpion', 'qd', NULL, '2023-04-10 21:06:43'),
(247, 'Scorpion', 'qd', '1', '2023-04-10 21:06:58'),
(248, 'Scorpion', 'qd', '1', '2023-04-10 21:08:10'),
(249, 'Scorpion', 'qd', '1', '2023-04-10 21:08:20'),
(250, 'Scorpion', 'qd', '1', '2023-04-10 21:08:23'),
(251, 'Scorpion', 'q', '1', '2023-04-10 21:08:27'),
(252, 'Scorpion', 'q', '1', '2023-04-10 21:09:21'),
(253, 'Scorpion', 'q', '1', '2023-04-10 21:10:34'),
(254, 'Scorpion', 'qzd', '1', '2023-04-10 21:10:40'),
(255, 'Scorpion', 'hello', '1', '2023-04-10 21:11:18'),
(256, 'Scorpion', 'qzd', '1', '2023-04-10 21:11:57'),
(257, 'Scorpion', 'qzd', '1', '2023-04-10 21:12:00'),
(258, 'Scorpion', 'qzd', '1', '2023-04-10 21:12:23'),
(259, 'Scorpion', 'dd', '1', '2023-04-10 21:12:27'),
(260, 'Scorpion', 'oke', '1', '2023-04-10 21:13:32'),
(261, 'Scorpion', 'oke', '1', '2023-04-10 21:14:06'),
(262, 'Scorpion', 'dac', '1', '2023-04-10 21:14:13'),
(263, 'Scorpion', 'dac', '1', '2023-04-10 21:18:00'),
(264, 'Scorpion', 'dac', '1', '2023-04-10 21:18:29'),
(265, 'Scorpion', 'dac', '1', '2023-04-10 21:18:39'),
(266, 'Scorpion', 'dac', '1', '2023-04-10 21:20:09'),
(267, 'Scorpion', 'yo', '1', '2023-04-10 21:20:21'),
(268, 'Scorpion', 'qzd', '1', '2023-04-10 21:27:32'),
(269, 'Scorpion', 'qzd', '1', '2023-04-10 21:29:06'),
(270, 'Scorpion', 'dqzd', '1', '2023-04-10 21:29:13'),
(271, 'LordDrimp', 'heyt', '1', '2023-04-10 21:30:10'),
(272, 'LordDrimp', '#hola', '1', '2023-04-10 21:30:37'),
(273, 'LordDrimp', '#hola', '1', '2023-04-10 21:55:31'),
(274, 'LordDrimp', '#hola', '1', '2023-04-10 21:57:42'),
(275, 'LordDrimp', '#hola', '1', '2023-04-10 22:03:30'),
(276, 'LordDrimp', '#hola', '1', '2023-04-10 22:06:24'),
(281, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:53:10'),
(282, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:54:29'),
(283, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:54:51'),
(284, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:55:14'),
(285, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:55:26'),
(286, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:55:48'),
(287, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:56:05'),
(288, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:56:45'),
(289, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:57:03'),
(290, 'LordDrimp', 'holaaaa', '10', '2023-04-11 00:57:24'),
(291, 'LordDrimp', 'qzd', '3', '2023-04-11 01:07:57'),
(292, 'LordDrimp', 'qzd', '3', '2023-04-11 01:09:20'),
(293, 'LordDrimp', 'qzd', '3', '2023-04-11 01:09:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `profile_picture`) VALUES
(1, 'sqkjalsn@dklqjzdnjkqz', '7&yebv*ooCTUmY3txt', 'doqijd', NULL),
(2, 'antoinedqzpdq@dqzd', '7&yebv*ooCTUmY3txt', 'dqzdzqdq', NULL),
(3, 'antoine@dqzkhdbqz', '7&yebv*ooCTUmY3txt', 'dzqdqzdqd', NULL),
(4, 'antoine@iqzfjqzf', '7&yebv*ooCTUmY3txt', 'drimpact', 'uploads/a7864ed499a34ce488c4265b280644f1.jpeg'),
(5, 'antoinedqzkdu@gmail.com', '7&yebv*ooCTUmY3txt', 'yoyoyoyoy', 'uploads/a7864ed499a34ce488c4265b280644f1.jpeg'),
(6, 'antoine@lqzidhnqd', '7&yebv*ooCTUmY3txt', 'drimpactr', 'uploads/feu-1.gif'),
(7, 'antoine@edu.deivnowxfq', '7&yebv*ooCTUmY3txt', 'drimpacrttt', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(8, 'dqkduh@qdnqkdl', '7&yebv*ooCTUmY3txt', 'Scorpion', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(9, 'dqkduh@qdnqkdlqzd', '12345', 'Scorpion', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(10, 'antoineqzdijqzd@qkzjdnq', '7&yebv*ooCTUmY3txt', 'LordDrimp', 'uploads/walter-samperi-198x-piranha-4x.gif');

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
