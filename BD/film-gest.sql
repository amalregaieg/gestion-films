-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 28 jan. 2021 à 14:01
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `film-gest`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `nom_prenom`, `date_naissance`) VALUES
(1, 'JEAN-PIERRE BACRI', '1951-05-24'),
(2, 'GILLES LELLOUCHE', '1972-07-05'),
(3, 'EYE HAÏDARA', '1983-03-07'),
(4, 'NAOMI WATTS', '1968-09-28'),
(5, 'EWAN MCGREGOR', '1971-03-30'),
(6, 'TOM HOLLAND', '1996-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210126120221', '2021-01-26 13:05:12', 486),
('DoctrineMigrations\\Version20210126120727', '2021-01-26 13:07:46', 186),
('DoctrineMigrations\\Version20210126133423', '2021-01-26 14:34:53', 370),
('DoctrineMigrations\\Version20210126134527', '2021-01-26 14:45:31', 1595),
('DoctrineMigrations\\Version20210126134745', '2021-01-26 14:47:49', 1885),
('DoctrineMigrations\\Version20210126142724', '2021-01-26 15:27:26', 2093),
('DoctrineMigrations\\Version20210126202821', '2021-01-26 21:29:06', 1471);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `realisateur_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_production` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `realisateur_id`, `titre`, `genre`, `annee_production`) VALUES
(1, 1, 'Le Sens de la fête', 'Comédie', 2017),
(2, 2, 'The Impossible', 'Drame', 1993);

-- --------------------------------------------------------

--
-- Structure de la table `films_acteurs`
--

CREATE TABLE `films_acteurs` (
  `films_id` int(11) NOT NULL,
  `acteurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films_acteurs`
--

INSERT INTO `films_acteurs` (`films_id`, `acteurs_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `film_id`, `rating`, `user_id`, `timestamp`) VALUES
(1, 1, 2, 2, '2021-01-27 16:31:49'),
(2, 2, 5, 2, '2021-01-27 17:26:38'),
(3, 1, 4, 1, '2021-01-27 21:46:55'),
(4, 2, 3, 1, '2021-01-27 18:05:16');

-- --------------------------------------------------------

--
-- Structure de la table `realisateurs`
--

CREATE TABLE `realisateurs` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `realisateurs`
--

INSERT INTO `realisateurs` (`id`, `nom_prenom`, `date_naissance`) VALUES
(1, 'ERIC TOLEDANO', '1973-07-03'),
(2, 'JUAN ANTONIO BAYONA', '0000-00-00'),
(3, 'OLIVIER NAKACHE', '1971-04-15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_bancaire` bigint(20) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `nom_prenom`, `compte_bancaire`, `role`) VALUES
(1, 'joe.hugo@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Joe HUGO', NULL, 'employé'),
(2, 'fred.kawri@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Fred KAWRI', NULL, 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CEECCA51F1D8422E` (`realisateur_id`);

--
-- Index pour la table `films_acteurs`
--
ALTER TABLE `films_acteurs`
  ADD PRIMARY KEY (`films_id`,`acteurs_id`),
  ADD KEY `IDX_A526A0F939610EE` (`films_id`),
  ADD KEY `IDX_A526A0F71A27AFC` (`acteurs_id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CEB607C9567F5183` (`film_id`);

--
-- Index pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `realisateurs`
--
ALTER TABLE `realisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `FK_CEECCA51F1D8422E` FOREIGN KEY (`realisateur_id`) REFERENCES `realisateurs` (`id`);

--
-- Contraintes pour la table `films_acteurs`
--
ALTER TABLE `films_acteurs`
  ADD CONSTRAINT `FK_A526A0F71A27AFC` FOREIGN KEY (`acteurs_id`) REFERENCES `acteurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A526A0F939610EE` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `FK_CEB607C9567F5183` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
