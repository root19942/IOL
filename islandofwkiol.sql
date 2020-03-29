-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : islandofwkiol.mysql.db
-- Généré le :  jeu. 26 mars 2020 à 17:22
-- Version du serveur :  5.6.46-log
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `islandofwkiol`
--

-- --------------------------------------------------------

--
-- Structure de la table `discution`
--

CREATE TABLE `discution` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timeline` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favories`
--

CREATE TABLE `favories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `favorie_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favories`
--

INSERT INTO `favories` (`id`, `user`, `favorie_user`, `created_at`, `updated_at`) VALUES
(1, 15, 9, '2020-02-11 22:35:36', '2020-02-11 22:35:36'),
(2, 5, 9, '2020-02-12 11:57:28', '2020-02-12 11:57:28'),
(3, 2, 5, '2020-02-15 01:54:43', '2020-02-15 01:54:43'),
(5, 2, 6, '2020-02-27 08:21:37', '2020-02-27 08:21:37'),
(6, 16, 14, '2020-03-10 09:52:54', '2020-03-10 09:52:54');

-- --------------------------------------------------------

--
-- Structure de la table `messagelines`
--

CREATE TABLE `messagelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_first` int(10) UNSIGNED NOT NULL,
  `user_second` int(10) UNSIGNED NOT NULL,
  `vue` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messagelines`
--

INSERT INTO `messagelines` (`id`, `user_first`, `user_second`, `vue`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 0, '2020-02-05 17:05:39', '2020-02-05 17:05:39'),
(2, 2, 6, 0, '2020-02-11 17:49:02', '2020-02-11 17:49:02'),
(3, 2, 4, 0, '2020-02-11 17:49:36', '2020-02-11 17:49:36'),
(4, 14, 13, 0, '2020-02-11 21:54:17', '2020-02-11 21:54:17'),
(5, 14, 6, 0, '2020-02-11 21:55:57', '2020-02-11 21:55:57'),
(6, 14, 3, 0, '2020-02-11 21:56:46', '2020-02-11 21:56:46'),
(7, 14, 9, 0, '2020-02-11 22:06:34', '2020-02-11 22:06:34'),
(8, 5, 6, 0, '2020-02-11 22:25:05', '2020-02-11 22:25:05'),
(9, 15, 9, 0, '2020-02-11 22:34:44', '2020-02-11 22:34:44'),
(10, 15, 13, 0, '2020-02-11 22:38:44', '2020-02-11 22:38:44'),
(11, 5, 15, 0, '2020-02-11 23:45:53', '2020-02-11 23:45:53'),
(12, 2, 5, 0, '2020-02-12 11:51:58', '2020-02-12 11:51:58'),
(13, 4, 5, 0, '2020-02-13 17:26:54', '2020-02-13 17:26:54'),
(14, 4, 7, 0, '2020-02-14 02:59:18', '2020-02-14 02:59:18'),
(15, 2, 12, 0, '2020-02-15 05:30:06', '2020-02-15 05:30:06'),
(16, 16, 3, 0, '2020-03-10 09:52:00', '2020-03-10 09:52:00'),
(17, 16, 14, 0, '2020-03-10 09:53:17', '2020-03-10 09:53:17'),
(18, 5, 14, 0, '2020-03-14 12:01:27', '2020-03-14 12:01:27'),
(19, 14, 12, 0, '2020-03-24 15:21:03', '2020-03-24 15:21:03');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_from` int(10) UNSIGNED NOT NULL,
  `message_line` int(10) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `message_line`, `body`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'slt', '2020-02-05 17:10:00', '2020-02-05 17:10:00'),
(2, 14, 4, 'Bonsoir Louise', '2020-02-11 21:55:03', '2020-02-11 21:55:03'),
(3, 14, 4, 'Comment vas tu?', '2020-02-11 21:55:21', '2020-02-11 21:55:21'),
(4, 14, 5, 'Bonsoir Poupi', '2020-02-11 21:56:19', '2020-02-11 21:56:19'),
(5, 13, 4, 'ca va et toi', '2020-02-11 21:56:31', '2020-02-11 21:56:31'),
(6, 14, 5, 'Bien Merci.', '2020-02-11 21:58:47', '2020-02-11 21:58:47'),
(7, 14, 5, 'Nous somme en phase pilote tous ensemble? Je suis Alexis Noé', '2020-02-11 21:59:32', '2020-02-11 21:59:32'),
(8, 14, 4, 'As tu essayé d\'avoir Hugues?', '2020-02-11 22:00:54', '2020-02-11 22:00:54'),
(9, 13, 4, 'hey', '2020-02-11 22:01:04', '2020-02-11 22:01:04'),
(10, 13, 4, 'pas au chat', '2020-02-11 22:01:23', '2020-02-11 22:01:23'),
(11, 14, 4, 'Le Chat t\'a même fait quoi?', '2020-02-11 22:02:51', '2020-02-11 22:02:51'),
(12, 13, 4, 'rien ohhh', '2020-02-11 22:03:15', '2020-02-11 22:03:15'),
(13, 14, 4, 'Tu vas le voir sur la souris tout à l\'heure.', '2020-02-11 22:03:20', '2020-02-11 22:03:20'),
(14, 14, 4, 'Tu vas le voir sur la souris tout à l\'heure.', '2020-02-11 22:03:32', '2020-02-11 22:03:32'),
(15, 14, 5, 'Allooooo', '2020-02-11 22:03:58', '2020-02-11 22:03:58'),
(16, 13, 4, 'souris what', '2020-02-11 22:04:21', '2020-02-11 22:04:21'),
(17, 14, 7, 'Salut Jeune Chef', '2020-02-11 22:06:57', '2020-02-11 22:06:57'),
(18, 14, 7, 'Dès que je clicque sur ton profil, j\'ai accès à toutes tes informations.', '2020-02-11 22:07:43', '2020-02-11 22:07:43'),
(19, 14, 7, 'Lorsque je fini d\'écrire le méssage, je devrais pouvoir l\'envoyer avec le bouton ENTREE', '2020-02-11 22:08:56', '2020-02-11 22:08:56'),
(20, 14, 7, 'Je te reviens pour les autres ajustements bientôt. Mais il importe aussi de corriger les fautes et cocquilles sur les textes des pages du site.', '2020-02-11 22:10:34', '2020-02-11 22:10:34'),
(21, 5, 8, 'Salut !', '2020-02-11 22:28:49', '2020-02-11 22:28:49'),
(22, 15, 9, 'Hi', '2020-02-11 22:36:35', '2020-02-11 22:36:35'),
(23, 15, 10, 'Hi', '2020-02-11 22:38:54', '2020-02-11 22:38:54'),
(24, 13, 10, 'hello', '2020-02-11 22:39:39', '2020-02-11 22:39:39'),
(25, 13, 10, 'this is good', '2020-02-11 22:40:48', '2020-02-11 22:40:48'),
(26, 15, 10, 'Felicitations maman!!!', '2020-02-11 22:40:54', '2020-02-11 22:40:54'),
(27, 13, 10, 'Thank you', '2020-02-11 22:41:29', '2020-02-11 22:41:29'),
(28, 2, 12, 'slt c\'est fredy', '2020-02-12 11:52:20', '2020-02-12 11:52:20'),
(29, 2, 12, 'cest fred', '2020-02-12 11:53:36', '2020-02-12 11:53:36'),
(30, 2, 12, 'slt', '2020-02-12 12:43:54', '2020-02-12 12:43:54'),
(31, 2, 15, 'slt', '2020-02-15 05:30:32', '2020-02-15 05:30:32'),
(32, 2, 12, 'bonjour', '2020-02-15 07:14:53', '2020-02-15 07:14:53'),
(33, 2, 15, 'teste', '2020-02-15 07:17:52', '2020-02-15 07:17:52'),
(34, 2, 12, 'slt', '2020-02-15 07:26:42', '2020-02-15 07:26:42'),
(35, 14, 12, 'Bonjour Hugo comment vas tu?\nComment et où on paie pour accéder aux contenus du site?', '2020-03-24 15:24:10', '2020-03-24 15:24:10'),
(36, 14, 7, 'Salut HUGO, es tu là???\nComment et où trouver le lien de paiement pour l\'acces aux contenus du site???', '2020-03-24 15:25:39', '2020-03-24 15:25:39'),
(37, 14, 4, 'Salut Louise. Comment vas tu?', '2020-03-24 15:26:40', '2020-03-24 15:26:40');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fredy.rayan@gmail.com', '$2y$10$EiSasIiptgp60cC0GM1UreCAtE1MuLSd3FjIxY.Or4/XRrSvSjRu2', '2020-03-06 06:35:58'),
('h_kemaleu@yahoo.fr', '$2y$10$OqxLkjxCMIuH6i7GHVyuaewM4TsSBfExzARAyvKao98Gk.O59Zony', '2020-03-06 06:44:46');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `pictures` text NOT NULL,
  `interest` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `attraction` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` datetime NOT NULL,
  `pob` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `children` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `interet` varchar(255) DEFAULT NULL,
  `bio` text,
  `img` varchar(255) NOT NULL DEFAULT 'default-profile.png',
  `bannier` varchar(255) DEFAULT 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `subname`, `nickname`, `gender`, `dob`, `pob`, `country`, `town`, `phone`, `profession`, `children`, `email`, `interet`, `bio`, `img`, `bannier`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Deugoue Kemayou', 'Dieudonnee Fredy', 'Root', 'Homme', '1994-09-25 00:00:00', 'Douala', 'CM', 'Douale', '694846550', 'Informaticien', '0', 'fredy.rayan@gmail.com', 'La Lecture,Reseaux sociaux,Jeu Video,Le Sport', 'Fredy est le fred des vred', 'fredy.rayan@gmail.com.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$0j8EkR49BM8oT8HqkpBDnuzhKV/6qpaoiVEtrKLQh50osxGkiwze6', 'je8SIIbROuxpIYoCO4AGY1JPWf8m0huWWOzsId2zFwvrNE2QeLwRBRXcexfG', '2020-01-09 09:33:34', '2020-02-11 17:36:44'),
(3, 'Wangue', 'Cecilia', 'Theresa', 'Femme', '1995-10-01 00:00:00', 'Douala', 'Cameroun', 'Douala', '693855215', 'Informaticienne', '0', 'ceciliawangue97@gmail.com', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$2Bqplod1CRmkxrRN4SUK1um19/XP7rDfxRP3qw0e30orrtaaqAmv2', NULL, '2020-01-14 16:13:54', '2020-01-14 16:13:54'),
(4, 'Cecilia', 'Wangue', 'Thete', 'Femme', '1997-10-01 00:00:00', 'Douala', 'CM', 'Douala', '693855215', 'Informaticienne', '0', 'ceciliawangue@yahoo.fr', 'Reseaux sociaux,La Lecture,La Plage,Le Sport,Le Style,Les Voitures', 'Voilà moi moi moi', 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2011/06/abstract-square-hd-wallpaper.jpg', NULL, '$2y$10$8Dvp39yaU3cNrkxQ3uiqAuqjLmOGZlgt0pUUP2r31z6vKdnhzroKa', NULL, '2020-01-21 11:05:20', '2020-02-13 23:13:30'),
(5, 'Hugues', 'Wilfrid', 'Karsel', 'Homme', '1982-07-07 00:00:00', '1', 'Cameroun', 'Douala', '677547422', 'Informaticien', '3', 'wilfridk82@gmail.com', 'LA TECK,La Lecture', NULL, 'wilfridk82@gmail.com.jpeg', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$eInJryPirCYkjLzPDlxCJeO2yijn/PZsBwVxWC1nH78lIvk31inE2', NULL, '2020-01-25 07:52:42', '2020-02-11 22:28:11'),
(6, 'Olivia', 'Ivannah', 'Poupi', 'Femme', '2016-08-01 00:00:00', 'Douala', 'Cameroun', 'Douala', '677767359', 'Douanier', '1', 'oliviaivannah@yahoo.fr', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$.7y6lvO1wF/QzpC7mJqs5eNn2uALv2rFTwoYchAqPQrM6bF21CVEG', NULL, '2020-01-25 14:17:32', '2020-01-25 14:17:32'),
(7, 'kambo', 'romial', 'kambo', 'Homme', '1995-04-18 00:00:00', 'douala', 'cameroun', 'douala', '97977856', 'graphiste mtion designer', '0', 'romialdEkambo@gmail.com', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$MpGrzMmZf.h/mUay91t/oOi5w2cjKmbOQzfFaRTgiT0usr/Wkx.Yi', NULL, '2020-01-26 12:34:07', '2020-01-26 12:34:07'),
(9, 'Hugues', 'Wilfrid', 'Hugues', 'Homme', '1982-07-07 00:00:00', 'Yaounde', 'Cameroun', 'Douala', '677547422', 'Informaticien', '4', 'h_kemaleu@yahoo.fr', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$eYd4ddnYvLZMGXcwhHTv0uB2qzNBQI1m.6/ilhCXOA.fgmXVhBFwC', NULL, '2020-01-29 07:11:20', '2020-01-29 07:11:20'),
(12, 'teste', 'teste', 'teste', 'Autre', '1994-09-25 00:00:00', 'Douala', 'Cameroon', 'Douala', '694846550', 'teste', '0', 'ddyayatou@gmail.com', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2011/07/wallpapere-kungfu-panda.jpg', NULL, '$2y$10$nMWHDPiU3zMbrHyk1Xuq6.2tYj99TH2Ivc06t/2gMR0R96Z6C5DqO', NULL, '2020-02-11 06:43:52', '2020-02-11 06:46:41'),
(13, 'ingram', 'chantal', 'louise', 'Femme', '1966-11-11 00:00:00', 'usa', 'United States', 'hampton', '7577262762', 'lawyer', '2', 'ingramchantal52@outlook.com', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$2ASoLwGEGDCy25qTJIW2/ebHYPTBl//Tq.33rk/IHAkhep9aRYeVi', NULL, '2020-02-11 19:58:33', '2020-02-11 19:58:33'),
(14, 'NSOME', 'ALEXIS', 'NOAH', 'Homme', '1969-07-15 00:00:00', 'DOUALA', 'Cameroon', 'DOUALA', '+237694211905', 'LOGISTICIEN', '0', 'alexisnoe@yahoo.fr', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$BJfmH7kpNXt9vHvawC/CbOLfOVYnv4pgX/Ci0cw3OTU9KFHzB/qGG', NULL, '2020-02-11 21:50:01', '2020-02-11 21:50:01'),
(15, 'Ngangoum', 'Stephanie', 'Kelly', 'Femme', '1991-04-01 00:00:00', 'Cameroun', 'United States', 'Hampton', '7579150448', 'Etudiante', '0', 'ngangoum24@gmail.com', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$kDn8.tII9bmwote5pMIgqO.i/4Qef2nr38P6YM0.mzk/.eovz5qQe', NULL, '2020-02-11 22:30:33', '2020-02-11 22:30:33'),
(16, 'Desmon', 'TheBrave', 'HitThatChick', 'Homme', '1984-01-06 00:00:00', 'Nylon', 'Afghanistan', 'Nylon', '+237655593444', 'Footballeur', '0', 'desmon2175@yahoo.fr', NULL, NULL, 'default-profile.png', 'http://wallpapere.org/wp-content/uploads/2012/02/imagini-leu.jpg', NULL, '$2y$10$z7sISkUR8l/8OUMw2TTn3O45L2Vf9O.oi.vkP78VdCu.7dA.9GIoK', NULL, '2020-03-10 09:49:28', '2020-03-10 09:49:28');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(156) NOT NULL,
  `pob` varchar(156) NOT NULL,
  `country` varchar(156) NOT NULL,
  `town` varchar(156) NOT NULL,
  `phone` varchar(156) NOT NULL,
  `mail` varchar(56) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `children` int(6) NOT NULL,
  `profil` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name`, `subname`, `nickname`, `gender`, `dob`, `pob`, `country`, `town`, `phone`, `mail`, `password`, `profession`, `children`, `profil`) VALUES
(1, 'ISLAND', 'LOVE', 'islandoflove', 'Male', '13/12/2019', 'Douala', 'Cameroon', 'Douala', '694845215', 'island@oflove.com', '8f0c8b5716c8de6021021b8e3ba6941a', 'lover', 0, 1),
(2, 'LOVE', 'Island', 'loveofisland', 'Female', '15/12/2019', 'Yaounde', 'Cameroon', 'Yaounde', '693856550', 'love@ofisland', '23d561ea6264aa26a14bc8e593c0789f', 'avanturer', 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `discution`
--
ALTER TABLE `discution`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favories`
--
ALTER TABLE `favories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messagelines`
--
ALTER TABLE `messagelines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `discution`
--
ALTER TABLE `discution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favories`
--
ALTER TABLE `favories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messagelines`
--
ALTER TABLE `messagelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
