-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 08 jan. 2018 à 10:32
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaires`
--

CREATE TABLE `t_commentaires` (
  `id_commentaire` int(3) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_commentaires`
--

INSERT INTO `t_commentaires` (`id_commentaire`, `nom`, `email`, `telephone`, `sujet`, `message`) VALUES
(8, 'fdgfdg', 'gfdgfdgd@live.fr', 0, 'fdgfdgf', 'gfdgfd'),
(9, 'fdgfdg', 'gfdgfdgd@live.fr', 0, 'fdgfdgf', 'gfdgfd'),
(10, 'gfdgfd', 'barbara.tousverts@lepoles.com', 663577089, 'gfdgfd', 'gfdgf'),
(11, 'gfdgfd', 'barbara.tousverts@lepoles.com', 663577089, 'gfdgfd', 'gfdgf'),
(12, 'gfdgfd', 'barbara.tousverts@lepoles.com', 663577089, 'gfdgfd', 'gfdgf'),
(13, 'Barbara Tousverts', 'barbara.tousverts@lepoles.com', 663577089, 'vcvcx', 'vcxvcxv'),
(14, 'Barbara Tousverts', 'barbara.tousverts@lepoles.com', 663577089, 'vcvcx', 'vcxvcxv'),
(15, 'Barbara Tousverts', 'barbara.tousverts@lepoles.com', 663577089, 'fgf', 'gfdgfd'),
(16, 'Barbara Tousverts', 'barbara.tousverts@lepoles.com', 663577089, 'fgf', 'gfdgfd'),
(17, 'Barbara Tousverts', 'barbara.tousverts@lepoles.com', 663577089, 'gfgfg', 'gfdgfdg');

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(3) NOT NULL,
  `competence` varchar(30) NOT NULL,
  `c_niveau` int(3) NOT NULL,
  `categorie` enum('dev_front','dev_back','framework') NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `c_niveau`, `categorie`, `utilisateur_id`) VALUES
(1, 'HTML5', 80, 'dev_front', 1),
(2, 'CSS3', 70, 'dev_front', 1),
(3, 'JQUERY', 25, 'dev_front', 1),
(4, 'PHP', 30, 'dev_front', 1),
(5, 'MySQL', 50, 'dev_front', 1),
(6, 'BOOTSTRAP', 35, 'dev_front', 1),
(7, 'RESPONSIVE', 50, 'dev_front', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id_formation` int(3) NOT NULL,
  `f_titre` varchar(50) NOT NULL,
  `f_soustitre` varchar(50) NOT NULL,
  `f_dates` varchar(50) NOT NULL,
  `f_description` text NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `utilisateur_id`) VALUES
(3, 'Formation développeur - intégrateur Web', 'Webforce 3 - LepoleS ', 'Depuis 2017', '<p>Formation labellisée Grande Ecole du Numérique<br />Techniques de développement et intégration web et mobile<br />', 1),
(4, 'Garde d\'enfants', 'Société O2 / Employeur particulier', '2011 - 2015', '', 1),
(5, 'Baccalauréat STG', 'Option : Comptabilité et Finance des Entreprises', '2010', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id_loisir` int(3) NOT NULL,
  `loisir` varchar(30) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id_loisir`, `loisir`, `utilisateur_id`) VALUES
(1, 'fdfs', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id_realisation` int(11) NOT NULL,
  `r_titre` varchar(50) NOT NULL,
  `r_soustitre` varchar(50) NOT NULL,
  `r_dates` varchar(50) NOT NULL,
  `r_description` text NOT NULL,
  `r_photo` varchar(250) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id_realisation`, `r_titre`, `r_soustitre`, `r_dates`, `r_description`, `r_photo`, `utilisateur_id`) VALUES
(1, 'vfxv', 'cvcvc', 'vcxvcx', '<p>vcxvcxvx</p>\r\n', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('H','F') NOT NULL,
  `etat_civil` enum('Mr','Mme') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `site_web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'Barbara', 'Tousverts', 'barbara.tousverts@lepoles.com', 0663577089, 'Barbara92', 'BABAR', '', 26, '1991-06-14', 'F', 'Mme', '207 rue saint-Denis', 92700, 'Colombes', 'France', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_commentaires`
--
ALTER TABLE `t_commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id_realisation`);

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_commentaires`
--
ALTER TABLE `t_commentaires`
  MODIFY `id_commentaire` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id_loisir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id_realisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
