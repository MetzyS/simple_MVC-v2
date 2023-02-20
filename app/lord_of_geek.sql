-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 fév. 2023 à 11:50
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lord_of_geek`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_cat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_cat`) VALUES
(1, 'combat'),
(2, 'aventure'),
(3, 'logique');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(140) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `id_console` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`id_console`, `nom`) VALUES
(1, 'nes'),
(2, 'xbox 360'),
(3, 'PC'),
(4, 'GBA'),
(5, 'PS4'),
(6, 'PS5');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `id_exemplaire` int(11) NOT NULL,
  `jeu_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `jeu_id`, `console_id`, `prix`, `image`) VALUES
(1, 1, 1, '30.00', 'zelda-nes.jpeg'),
(2, 2, 2, '10.00', 'skyrim.png'),
(3, 3, 1, '5.00', 'tekken.png'),
(4, 4, 1, '10.00', 'mortal.jpg'),
(5, 5, 3, '3.50', 'portal2.jpg'),
(6, 6, 3, '3.00', 'portal2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id_jeu` int(11) NOT NULL,
  `nom_jeu` varchar(45) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`, `categorie_id`) VALUES
(1, 'the legend of zelda', 2),
(2, 'skyrim', 2),
(3, 'tekken', 1),
(4, 'Mortal Kombat', 1),
(5, 'Portal 2', 3),
(6, 'Pokemon Rouge', 4);

-- --------------------------------------------------------

--
-- Structure de la table `lignes_commande`
--

CREATE TABLE `lignes_commande` (
  `id_ligne` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `exemplaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_client_ville_idx` (`ville_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_client_idx` (`client_id`);

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id_console`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`id_exemplaire`),
  ADD KEY `fk_exemplaire_jeu_idx` (`jeu_id`),
  ADD KEY `fk_exemplaire_console_idx` (`console_id`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id_jeu`),
  ADD KEY `fk_jeu_categorie1_idx` (`categorie_id`);

--
-- Index pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD PRIMARY KEY (`id_ligne`),
  ADD KEY `fk_commande_has_exemplaire_exemplaire1_idx` (`exemplaire_id`),
  ADD KEY `fk_commande_has_exemplaire_commande1_idx` (`commande_id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `id_exemplaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id_jeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id_ville`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `fk_exemplaire_console` FOREIGN KEY (`console_id`) REFERENCES `console` (`id_console`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exemplaire_jeu` FOREIGN KEY (`jeu_id`) REFERENCES `jeu` (`id_jeu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `fk_jeu_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignes_commande`
--
ALTER TABLE `lignes_commande`
  ADD CONSTRAINT `fk_commande_has_exemplaire_commande1` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id_commande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commande_has_exemplaire_exemplaire1` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
