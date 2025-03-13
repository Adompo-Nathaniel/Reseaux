-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 sep. 2023 à 00:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp4`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `title`, `category_id`) VALUES
(1, 'Film', 1),
(2, 'Musique', 1),
(3, 'Jeux', 1),
(4, 'Sport', 1),
(5, 'Informatique', 1),
(6, 'Culture', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `text`, `date`, `user_id`, `forum_id`) VALUES
(1, 'J\'aime bien les films', '2023-09-28 09:46:34', 1, 1),
(2, 'J\'aime bien la musique', '2023-09-28 09:46:34', 1, 2),
(3, 'J\'aime bien les jeux', '2023-09-28 09:46:34', 1, 3),
(4, 'J\'aime bien le sport', '2023-09-28 09:46:34', 1, 4),
(5, 'J\'aime bien l\'informatique', '2023-09-28 09:46:34', 1, 5),
(6, 'J\'aime bien les films', '2023-09-28 09:46:34', 2, 1),
(7, 'J\'aime bien la musique', '2023-09-28 09:46:34', 2, 2),
(8, 'J\'aime bien les jeux', '2023-09-28 09:46:34', 2, 3),
(9, 'J\'aime bien le sport', '2023-09-28 09:46:34', 2, 4),
(10, 'J\'aime bien l\'informatique', '2023-09-28 09:46:34', 2, 5),
(11, 'J\'aime bien les films', '2023-09-28 09:46:34', 3, 1),
(12, 'J\'aime bien la musique', '2023-09-28 09:46:34', 3, 2),
(13, 'J\'aime bien les jeux', '2023-09-28 09:46:34', 3, 3),
(14, 'J\'aime bien le sport', '2023-09-28 09:46:34', 3, 4),
(15, 'J\'aime bien l\'informatique', '2023-09-28 09:46:34', 3, 5),
(16, 'J\'aime bien les films', '2023-09-28 09:46:34', 4, 1),
(17, 'J\'aime bien la musique', '2023-09-28 09:46:34', 4, 2),
(18, 'J\'aime bien les jeux', '2023-09-28 09:46:34', 4, 3),
(19, 'J\'aime bien le sport', '2023-09-28 09:46:34', 4, 4),
(20, 'J\'aime bien l\'informatique', '2023-09-28 09:46:34', 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'Lappom', 'Lappom'),
(2, 'Enzo', 'chpa1'),
(3, 'Akram', 'chpa2'),
(4, 'Ryzwann', 'chpa3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_forum_id` (`forum_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_forum_id` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
