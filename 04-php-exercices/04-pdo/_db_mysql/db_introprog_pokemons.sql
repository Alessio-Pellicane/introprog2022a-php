-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 06 mars 2022 à 14:31
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_introprog_pokemons`
--

-- --------------------------------------------------------

--
-- Structure de la table `pk_list`
--

CREATE TABLE `pk_list` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Pv` int(11) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Type1` int(11) NOT NULL,
  `Type2` int(11) DEFAULT NULL,
  `Editable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pk_list`
--

INSERT INTO `pk_list` (`Id`, `Name`, `Pv`, `Image`, `Type1`, `Type2`, `Editable`) VALUES
(3, 'Pikachu', 35, 'Pikachu.png', 5, NULL, 0),
(4, 'Bulbizarre', 45, 'Bulbizarre.png', 11, 12, 0),
(5, 'Herbizarre', 60, 'Herbizarre.png', 11, 12, 0),
(6, 'Florizarre', 80, 'Florizarre.png', 11, 12, 0),
(7, 'Salamèche', 39, 'Salamèche.png', 7, NULL, 0),
(8, 'Reptincel', 58, 'Reptincel.png', 7, NULL, 0),
(9, 'Dracaufeu', 78, 'Dracaufeu.png', 7, 18, 0),
(10, 'Carapuce', 44, 'Carapuce.png', 4, NULL, 0),
(11, 'Carabaffe', 59, 'Carabaffe.png', 4, NULL, 0),
(12, 'Tortank', 79, 'Tortank.png', 4, NULL, 0),
(13, 'Chenipan', 45, 'Chenipan.png', 9, NULL, 0),
(14, 'Chrysacier', 50, 'Chrysacier.png', 9, NULL, 0),
(15, 'Papilusion', 90, 'Papilusion.png', 9, 18, 0),
(16, 'Aspicot', 40, 'Aspicot.png', 9, 12, 0),
(17, 'Coconfort', 45, 'Coconfort.png', 9, 12, 0),
(18, 'Dardargnan', 65, 'Dardargnan.png', 9, 12, 0),
(19, 'Roucool', 40, 'Roucool.png', 10, 18, 0),
(20, 'Roucoups', 63, 'Roucoups.png', 10, 18, 0),
(21, 'Roucarnage', 83, 'Roucarnage.png', 10, 18, 0),
(22, 'Rattata', 30, 'Rattata.png', 10, NULL, 0),
(23, 'Rattatac', 55, 'Rattatac.png', 10, NULL, 0),
(24, 'Piafabec', 40, 'Piafabec.png', 10, 18, 0),
(25, 'Rapasdepic', 63, 'Rapasdepic.png', 10, 18, 0),
(26, 'Abo', 35, 'Abo.png', 12, NULL, 0),
(27, 'Arbok', 60, 'Arbok.png', 12, NULL, 0),
(28, 'Pikachu', 35, 'Pikachu.png', 5, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pk_types`
--

CREATE TABLE `pk_types` (
  `Id` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pk_types`
--

INSERT INTO `pk_types` (`Id`, `Type`) VALUES
(1, 'Acier'),
(2, 'Combat'),
(3, 'Dragon'),
(4, 'Eau'),
(5, 'Electrik'),
(6, 'Fée'),
(7, 'Feu'),
(8, 'Glace'),
(9, 'Insecte'),
(10, 'Normal'),
(11, 'Plante'),
(12, 'Poison'),
(13, 'Psy'),
(14, 'Roche'),
(15, 'Sol'),
(16, 'Spectre'),
(17, 'Ténèbres'),
(18, 'Vol');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pk_list`
--
ALTER TABLE `pk_list`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Type` (`Type1`,`Type2`),
  ADD KEY `Type2` (`Type2`);

--
-- Index pour la table `pk_types`
--
ALTER TABLE `pk_types`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pk_list`
--
ALTER TABLE `pk_list`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `pk_types`
--
ALTER TABLE `pk_types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pk_list`
--
ALTER TABLE `pk_list`
  ADD CONSTRAINT `pk_list_ibfk_1` FOREIGN KEY (`Type1`) REFERENCES `pk_types` (`Id`),
  ADD CONSTRAINT `pk_list_ibfk_2` FOREIGN KEY (`Type2`) REFERENCES `pk_types` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
