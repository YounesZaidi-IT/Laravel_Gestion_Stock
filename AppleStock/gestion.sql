-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 avr. 2019 à 18:24
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `function`, `country`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'James', 'a@gmail.com', 'Seller', 'Madrid', NULL, '$2y$10$umJfXDYl9VzjC1lbO4kR2.fFr3yDF3ORtmVsGLzA5Xnpnv1utxL2i', NULL, '2019-04-24 11:06:55', '2019-04-24 11:06:55'),
(5, 'soumaya', 'mmm@live.fr', 'editeur', 'Tanger', NULL, '$2y$10$j18dVoLXyK46106uci4sr.sH.sWJhNPNKmdxm2jRCblhnBR/hCXmG', NULL, '2019-04-24 11:19:20', '2019-04-24 11:19:20'),
(10, 'jihane', 'dht@live.fr', 'admin', 'lyon', NULL, '$2y$10$VxtUXDLXVYN6pfG.M9qvIuprvZRaohtl2WVps7m.g1eYPGnmfNUH.', NULL, '2019-04-26 10:35:05', '2019-04-26 10:35:05'),
(12, 'Karim', 'karim@live.fr', 'Seller', 'London', NULL, '$2y$10$YxRa.TgmEyfser8Ez0TrluQVFV821gNWqMFiKdRvmibZN7oWIRZFG', NULL, '2019-04-26 14:57:54', '2019-04-26 14:57:54'),
(13, 'Younes', 'test@gmail.com', 'admin', 'Tanger', NULL, '$2y$10$lZ0AZywXr401otFHQwdMb.1NnK0.vJ.bbQTkzZq85QXdgfPM1gpAa', NULL, '2019-04-26 15:10:35', '2019-04-26 15:10:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
