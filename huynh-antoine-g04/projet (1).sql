-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 14 avr. 2023 à 21:15
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
(440, 'Drimpact', 'dqfqzfqf', '1', '2023-04-14 01:38:41', NULL, NULL),
(441, 'Drimpact', 'dqfqzfqf', '1', '2023-04-14 01:39:09', NULL, ''),
(442, 'Drimpact', 'dqzdzqfqfc', '1', '2023-04-14 01:39:16', NULL, ''),
(443, 'Drimpact', 'dqzdzqfqfc', '1', '2023-04-14 01:39:54', NULL, ''),
(444, 'Drimpact', 'qdfqzfzf', '1', '2023-04-14 01:40:08', NULL, ''),
(445, 'Drimpact', 'qdfqzfzf', '1', '2023-04-14 01:43:17', NULL, ''),
(446, 'Drimpact', 'qdfqzfzf', '1', '2023-04-14 01:43:48', NULL, ''),
(447, 'Drimpact', 'qdfqzfzf', '1', '2023-04-14 01:44:24', NULL, ''),
(448, 'Drimpact', 'dq', '1', '2023-04-14 01:44:53', NULL, 'uploads/22.PNG'),
(449, 'Drimpact', 'dq', '1', '2023-04-14 01:48:17', NULL, 'uploads/22.PNG'),
(450, 'Drimpact', 'dq', '1', '2023-04-14 01:51:04', NULL, 'uploads/22.PNG'),
(451, 'Drimpact', 'dq', '1', '2023-04-14 01:51:07', NULL, 'uploads/22.PNG'),
(452, 'Drimpact', 'dq', '1', '2023-04-14 01:52:20', NULL, 'uploads/22.PNG'),
(453, 'Drimpact', 'dq', '1', '2023-04-14 01:52:27', NULL, 'uploads/22.PNG'),
(454, 'Drimpact', 'dq', '1', '2023-04-14 01:52:29', NULL, 'uploads/22.PNG'),
(455, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:52:57', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(456, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:54:00', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(457, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:55:08', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(458, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:55:33', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(459, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:55:46', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(460, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:55:53', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(461, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:56:03', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(462, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:56:53', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(463, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:57:03', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(464, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:58:26', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(465, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:58:36', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(466, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:58:47', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(467, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 01:59:46', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(468, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:00:11', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(469, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:00:21', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(470, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:00:32', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(471, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:00:38', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(472, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:01:05', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(473, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:02:36', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(474, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:03:44', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(475, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:04:13', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(476, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:05:17', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(477, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:05:35', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(478, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:05:46', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(479, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:06:22', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(480, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:06:38', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(481, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:07:20', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(482, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:07:45', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(483, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:09:05', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(484, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:09:27', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(485, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:09:43', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(486, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:09:54', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(487, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:10:39', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(488, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:10:56', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(489, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:11:09', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(490, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:11:20', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(491, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:11:52', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(492, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:14:07', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(493, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:14:45', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(494, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:15:36', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(495, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:17:33', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(496, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:17:52', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(497, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:19:25', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(498, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:20:00', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(499, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:20:10', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(500, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:23:42', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(501, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:24:20', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(502, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:24:27', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(503, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:24:47', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(504, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:24:54', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(505, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:27:04', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(506, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:27:11', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(507, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:27:20', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(508, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:27:32', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(509, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:27:41', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(510, 'Drimpact', 'tynhbkjl', '1', '2023-04-14 02:28:17', NULL, 'uploads/canape_210_de_red_edition_indien_2.jpg'),
(511, 'Drimpact', 'qzdzqd', '1', '2023-04-14 02:29:20', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(512, 'Drimpact', 'qzdzqd', '1', '2023-04-14 02:29:35', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(513, 'Drimpact', 'qzdzqd', '1', '2023-04-14 02:32:41', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(514, 'Drimpact', 'dqdqzdq', '1', '2023-04-14 02:32:56', NULL, ''),
(515, 'Drimpact', 'dqdqzdq', '1', '2023-04-14 02:33:44', NULL, ''),
(516, 'Drimpact', 'kpùpkiù', '1', '2023-04-14 02:33:54', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(517, 'Drimpact', 'kpùko', '1', '2023-04-14 02:34:03', NULL, ''),
(518, 'Drimpact', 'kpùko', '1', '2023-04-14 02:34:17', NULL, ''),
(519, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:34:19', NULL, ''),
(520, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:34:25', NULL, ''),
(521, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:34:51', NULL, ''),
(522, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:36:22', NULL, ''),
(523, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:36:37', NULL, ''),
(524, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:37:13', NULL, ''),
(525, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:37:48', NULL, ''),
(526, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:38:14', NULL, ''),
(527, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:38:54', NULL, ''),
(528, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:40:21', NULL, ''),
(529, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:43:28', NULL, ''),
(530, 'Drimpact', 'qzdzq', '1', '2023-04-14 02:43:50', NULL, ''),
(531, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:45:22', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(532, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:45:35', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(533, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:45:44', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(534, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:49:01', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(535, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:49:16', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(536, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:49:49', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(537, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:49:55', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(538, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:50:11', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(539, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:50:15', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(540, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:50:27', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(541, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:50:37', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(542, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:50:55', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(543, 'Drimpact', 'dqdqzd', '1', '2023-04-14 02:51:17', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(544, 'Drimpact', 'fqfqzfkhbq', '2', '2023-04-14 02:51:22', NULL, ''),
(545, 'Drimpact', 'fgjf', '1', '2023-04-14 02:52:25', NULL, 'uploads/81CwSp0ZGqL._SL1200_.jpg'),
(546, 'Drimpact', 'dqdqzdjmjm', '1', '2023-04-14 02:53:30', NULL, 'uploads/B_pqgatUYAE3bP3.jpg'),
(547, 'Drimpact', 'dqdqzdjmjm', '1', '2023-04-14 02:54:08', NULL, 'uploads/B_pqgatUYAE3bP3.jpg'),
(548, 'Drimpact', 'dqdqzdjmjm', '1', '2023-04-14 02:54:15', NULL, 'uploads/B_pqgatUYAE3bP3.jpg'),
(549, 'Drimpact', 'dqdqzdjmjm', '1', '2023-04-14 02:54:19', NULL, 'uploads/B_pqgatUYAE3bP3.jpg'),
(550, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:54:27', NULL, ''),
(551, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:54:56', NULL, ''),
(552, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:54:58', NULL, ''),
(553, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:55:16', NULL, ''),
(554, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:55:28', NULL, ''),
(555, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:55:37', NULL, ''),
(556, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:55:47', NULL, ''),
(557, 'Drimpact', 'qfqfz', '1', '2023-04-14 02:55:54', NULL, ''),
(558, 'Drimpact', 'qfqfz', '1', '2023-04-14 03:03:30', NULL, ''),
(559, 'Drimpact', 'hey', '1', '2023-04-14 03:33:38', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(560, 'Drimpact', 'hey', '1', '2023-04-14 03:36:27', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(561, 'Drimpact', 'hey', '1', '2023-04-14 03:36:59', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(562, 'Drimpact', 'hey', '1', '2023-04-14 03:37:22', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(563, 'Drimpact', 'hey', '1', '2023-04-14 03:37:27', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(564, 'Drimpact', 'hey', '1', '2023-04-14 03:37:38', NULL, 'uploads/Canapé-simple-©-Made.jpg'),
(566, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:31:16', NULL, ''),
(567, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:32:24', NULL, ''),
(568, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:32:52', NULL, ''),
(569, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:33:01', NULL, ''),
(570, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:33:12', NULL, ''),
(571, 'Drimpact', 'dqzdqd', '1', '2023-04-14 04:33:22', NULL, ''),
(573, 'loloollool', 'fqfhqoiufhc', '1', '2023-04-14 04:36:22', NULL, 'uploads/diamond.gif'),
(574, 'loloollool', 'coucou', '1', '2023-04-14 05:29:27', NULL, '');

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
(4, 'antoine@iqzfjqzf', '7&yebv*ooCTUmY3txt', 'drimpact', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(5, 'antoinedqzkdu@gmail.com', '7&yebv*ooCTUmY3txt', 'yoyoyoyoy', 'uploads/a7864ed499a34ce488c4265b280644f1.jpeg'),
(6, 'antoine@lqzidhnqd', '7&yebv*ooCTUmY3txt', 'drimpactr', 'uploads/feu-1.gif'),
(7, 'antoine@edu.deivnowxfq', '7&yebv*ooCTUmY3txt', 'drimpacrttt', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(8, 'dqkduh@qdnqkdl', '7&yebv*ooCTUmY3txt', 'Scorpion', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(9, 'dqkduh@qdnqkdlqzd', '12345', 'Scorpion', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(10, 'antoineqzdijqzd@qkzjdnq', '7&yebv*ooCTUmY3txt', 'LordDrimp', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(11, 'antoine@dkzqjdn', '7&yebv*ooCTUmY3txt', 'qdqdqzd', NULL),
(12, 'dkqduhq@dkqzjdnq', '7&yebv*ooCTUmY3txt', 'drimpact', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(13, 'antoineqzdqd@dqzkhdb', '7&yebv*ooCTUmY3txt', 'LordDrimp', NULL),
(14, 'antoine@gmail.com', '7&yebv*ooCTUmY3txt', 'Drimpact', 'uploads/walter-samperi-198x-piranha-4x.gif'),
(15, 'antoinehuynh@gmail.com', '7&yebv*ooCTUmY3txt', 'loloollool', 'uploads/fiole.gif');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
