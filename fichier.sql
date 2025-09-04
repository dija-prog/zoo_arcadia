-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 juil. 2025 à 13:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `animal_nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_classe` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_nom`, `id_classe`, `habitat_id`, `image`) VALUES
(430, 'Lion d\'Afrique', 1, 1, 'images/lion d\'Afrique.jpg'),
(431, 'Rat Musqué', 1, 3, 'images/Rat Musqué.jpg'),
(432, 'Tigre de Sibérie', 1, 2, 'images/tigre de Sibérie.jpg'),
(433, 'Éléphant d\'Afrique', 1, 1, 'images/Eléphant d\'Afrique.jpg'),
(434, 'Girafe Masaî', 1, 1, 'images/Girafe Masaî.jpg'),
(435, 'jaguar', 1, 2, 'images/jaguar.jpg'),
(436, 'Singe Hurleur', 1, 2, 'images/Singe Hurleur.jpg'),
(437, 'Hippopotame', 1, 3, 'images/Hippopotame.jpg'),
(438, 'Singe Babouin', 1, 1, 'images/Singe Babouin.jpg'),
(439, 'Loutre', 1, 3, 'images/Loutre.jpg'),
(440, 'Python reticulé', 3, 2, 'images/Python reticulé.jpg'),
(441, 'Alligator', 3, 3, 'images/Alligator.jpg'),
(442, 'Serpent Boa', 3, 2, 'images/Serpent Boa.jpg'),
(443, 'Lézard monitor', 3, 1, 'images/Lézard monitor.jpg'),
(444, 'Tortue Sillonnée', 3, 1, 'images/Tortue Sillonnée.jpg'),
(446, 'Héron cendré', 2, 3, 'images/Héron cendré.jpg'),
(447, 'Flamant Rose', 2, 3, 'images/Flamant Rose.jpeg'),
(448, 'Perroquet', 2, 2, 'images/Perroquet.jpg'),
(449, 'Toucan', 2, 2, 'images/Toucan.jpg'),
(450, 'Aigle Royal', 2, 1, 'images/Aigle Royal.jpg'),
(451, 'Autruche', 2, 1, 'images/Autruche.jpg'),
(453, 'Calao', 2, 2, 'images/Calao.jpg'),
(454, 'Grenouille Taureau', 4, 3, 'images/Grenouille Taureau.jpg'),
(455, 'Rainette des arbres', 4, 3, 'images/Rainette des arbres.jpg'),
(457, 'Dendrobate', 4, 2, 'images/Dendrobate.jpg'),
(458, 'Crapaud Buffle', 4, 1, 'images/Crapaud Buffle.jpg'),
(461, 'Hyène tachetée', 1, 1, 'images/Hyène tachetée.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `avis_id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `commentaire` varchar(50) NOT NULL,
  `isValide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`avis_id`, `pseudo`, `commentaire`, `isValide`) VALUES
(10, 'jean', 'LE ZOO EST INCOYABLE', 1),
(11, 'khadija_araai@outlook.fr', 'hjaijoijdzijdzidjzi', 0);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`) VALUES
(1, 'Mammifères'),
(2, 'Oiseaux'),
(3, 'Reptiles '),
(4, 'Amphibiens');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_habitats`
--

CREATE TABLE `commentaires_habitats` (
  `comment_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` DATETIME DEFAULT CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaires_habitats`
--

INSERT INTO `commentaires_habitats` (`comment_id`, `habitat_id`, `commentaire`, `date_commentaire`) VALUES
(7, 2, 'hj njnej jnjenj zjnjn endjene ', '2024-11-11'),
(9, 1, 'loremm', '2025-01-03'),
(10, 1, 'j\'aime bien le zoo assez sympa ', '2025-01-01'),
(13, 3, 'je trouve cette habitat trés intéressant ', '2024-12-31'),
(14, 2, 'mes enfants ils ont adorées  les animaux de cette habitat', '2024-12-30'),
(15, 2, 'mes enfants ils ont adorées  les animaux de cette habitat', '2024-12-30'),
(18, 1, 'jolie habitat', '2025-01-13'),
(19, 1, 'jolie habitat', '2025-01-13'),
(20, 3, 'j\'aime bien les animaux de l\'habitat marais ', '2025-01-18');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `titre` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `titre`, `email`, `description`) VALUES
(2, 'horaire', 'dijaar9@gmail.com', 'bonjour je veux savoir c&#039;est quand le zoo va réouvrir '),
(3, 'anniversaire', 'Khadija_araai@outlook.fr', 'je veux faire un annevrsaire à mon fils au zoo je veux savoir est ce que c&#039;est possible;'),
(4, 'réclamation', 'dijaar9@gmail.com', 'bonjour je trouve que les toilette il sont pas propre '),
(5, 'HORAIRE', 'khadija_araai@outlook.fr', 'c&#039;est quand l&#039;ouverture de parc ?'),
(6, 'HORAIRE', 'khadija_araai@outlook.fr', 'c&#039;est quand l&#039;ouverture de parc ?'),
(7, 'VISITER', 'khadija_araai@outlook.fr', 'bonjour'),
(8, 'VISITER', 'khadija_araai@outlook.fr', 'bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id_food` int(11) NOT NULL,
  `animal_nom` varchar(50) NOT NULL,
  `foodType` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `animal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id_food`, `animal_nom`, `foodType`, `quantite`, `Date`, `Heure`, `animal_id`) VALUES
(9, 'Tigre de Sibérie', 'viande', 150, '2025-01-08', '13:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `habitat_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`habitat_id`, `nom`, `description`) VALUES
(1, 'Savane Africaine', 'La savane est une formation végétale propre aux régions chaudes à longue saison sèche et dominée par les plantes herbacées de la famille des Poacées (Graminées). Elle est plus ou moins parsemée d\'arbres ou d\'arbustes.Selon la densité (dans l\'ordre croissant) des espèces, on parle de « savane herbeuse », de « savane arbustive », de « savane arborée »,de « savane boisée », puis de forêt claire, la transition se faisant en général de manière progressive.]'),
(2, 'Jungle Tropicale', 'La jungle Écouter est un terme polysémique qui n\'a pas de signification biogéographique précise. Ce terme est un emprunt du hindi via la langue anglaise. La jangal désigne alors une formation végétale sèche comptant une proportion irrégulière d\'arbres présente principalement dans le Teraï. Le succès du livre de Rudyard Kipling, Le Livre de la jungle, a popularisé le terme qui désigne désormais, par extension optimale, selon Roger Brunet1,la forêt dense à la végétation verte et luxuriante, telle que la forêt tropicale.]'),
(3, 'Marais Humide', 'En géographie, un marais est une couche d\'eau stagnante, en général peu profonde, et envahie par la végétation aquatique ou herbacée. C\'est une zone humide. La végétation des marais est constituée d\'espèces adaptées au milieu humide. Sa composition varie selon la hauteur de l\'eau, l\'importance des périodes d\'assèchement, et le taux de salinité. Les espèces dominantes sont les poacées (roseaux), typhacées (massettes), les joncacées (joncs), cypéracées (carex), et autres plantes herbacées et aquatiques, et des plantes ligneuses basses. Dans les marais d\'eau saumâtre, on rencontre des espèces halophiles.]');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_veterinaire`
--

CREATE TABLE `rapport_veterinaire` (
  `id_health` int(11) NOT NULL,
  `etat` text NOT NULL,
  `detail` text NOT NULL,
  `animal_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `foodType` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rapport_veterinaire`
--

INSERT INTO `rapport_veterinaire` (`id_health`, `etat`, `detail`, `animal_id`, `quantite`, `foodType`, `date`) VALUES
(1, 'Malade', '', 450, 200, '100', '2014-11-21'),
(3, 'En bonne santé', '', 450, 150, '100', '2024-12-02'),
(4, 'En bonne santé', '', 450, 150, '150', '2024-12-03'),
(5, 'En bonne santé', '', 450, 100, 'insecte', '2014-11-11'),
(6, 'En bonne santé', 'il est en trés bonne santé ', 430, 150, 'viande', '2025-01-04'),
(7, 'Sous traitement', 'l\'animal il est encore sous le traitement ', 433, 50, 'fruit ', '2025-01-02');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `nom_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`role_id`, `nom_role`) VALUES
(1, 'administrateur'),
(2, 'employé'),
(3, 'vétérenaire');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_nom` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`service_id`, `service_nom`, `description`) VALUES
(6, 'louer une poussete', ' Lorem ipsum dolor sit amet, consectetur conducteu'),
(7, 'traine ', 'faire le tour des habitats de zoo dans le train un');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`username`, `password`, `nom`, `prenom`, `role_id`, `reset_token`, `reset_token_expire`) VALUES
('aithamouk94@gmail.com', '$2y$10$/iuymE47TqFqLJsHortxWeqx6yV1QklTQAuCPiMglIjyhgB1WyTwS', 'Ait Hamou', 'Khadija', 2, NULL, NULL),
('ali@gmail.com', '$2y$10$H3vVqWQLq6TQVSs.BjeimumDkzvxuHO56G7VkSGXkwCjSmy7gwfS.', 'ali', 'ali', 2, NULL, NULL),
('arnezha7@gmail.com', '$2y$10$LDOMiNNIeuyPHouKHQWDCejJQTvtZCZSkzgOG3NphHtDcsY/2d.re', 'nezha', 'nezha', 2, '42f885cb757aa806c380b5537e2c10', '2025-01-19 19:46:16'),
('cocochanel@gmail.fr', '$2y$10$nMAIaihQTwG2EOS3TQ/Q.ujbfyvo.7ResB9MHev6Uyggc9.1pZbcy', 'coco', 'chanel', 2, NULL, NULL),
('dijaar9@gmail.com', '$2y$10$oH0s6vQ.lSxRhvnNAexEG.XC/lslSPruhAIQR.5JpCr5Wd/eyWMqe', 'dija', 'dija', 2, 'bade4c53cbdb3f37dec6d71e6d11fe', '2025-01-19 19:48:31'),
('goncelaves@hotmail.com', '$2y$10$Ys93QtFafyBJ3iANlG1sieO7FvrTsCcdE0PpxmFTqZSgAWR95dgRq', 'Gonçalves', 'Dominique', 3, NULL, NULL),
('hamid@aithamou.com', '$2y$10$5vjivZXD/uVhEIUYhk3Age4H1cLKFnaBW6G6EFDuodudOP07P25hi', 'Ait Hamou', 'hamid', 3, NULL, NULL),
('henrycecil@gmail.com', '$2y$10$qNqLu1vVV3Ro3xn5Eyv15eRoYk2YzxznmMimWFh.hKbWkKweATx4W', 'HENRY', 'CECIL', 2, NULL, NULL),
('isabelle@isabelle.com', '$2y$10$1wAhTJ9KT.17sSon55QG7u64jUz2SpDFbFBlVC5SUUwCF/JHHqP9S', 'isabelle', 'isabelle', 3, NULL, NULL),
('jeanpaul@gmail.com', '$2y$10$55yita0TPjC3lXMmQCwSIuYGX71qGqr1KgIBbwkUNI3h8D920B2oS', 'jean', 'paul', 2, NULL, NULL),
('jose@zooarcadia.com', '$2y$10$jyKnFsxJV2tCqa6oqZ73geK0GUFSzsGNksGzXmP3RH0jHE4HdjkdC', 'jose', 'jose', 1, NULL, NULL),
('KHADIJA@KHADIJA.com', '$2y$10$R7aHG6wEkJ3jSF2Gj9yqFehMfmtLdXNlIVjVkOTh0yCz83jRWgJwa', 'KHADIJA', 'KHADIJA', 2, NULL, NULL),
('lionelmessi@gmail.com', '$2y$10$zVIaSlVvJtB72mhrhm8CWOX5TFKPScJRrPAhzmsFFhiIUjQQRvB9y', 'lionel', 'messi', 2, NULL, NULL),
('mariedupant@gmail.com', '$2y$10$1mpY08dF4XptJ2DX1XejRObUS2SSAK6n.qZ0sLWhISTm09wYzaZBm', 'Dupant', 'Marie', 2, NULL, NULL),
('martin@gmail.com', 'martin@gmail.com', 'MARTIN', 'MARTIN', 2, NULL, NULL),
('mickymous@gmail.fr', '$2y$10$/V6Aoq21cCWicpKEWj4A8uey/6V4TCQqfuKIP5VPVqzFyG1XuIo9C', 'micky', 'mousse', 2, NULL, NULL),
('yanis@gmail.com', '$2y$10$qi9bROZzcl5EIplTl4GD0.O2iqUZ9RkvhBFVZH5rXKIsSO1swjRN6', 'Ait Hamou', 'yanis', 3, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_habitat` (`habitat_id`),
  ADD KEY `fk_classe` (`id_classe`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`avis_id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `commentaires_habitats`
--
ALTER TABLE `commentaires_habitats`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`),
  ADD KEY `fk_animal_id` (`animal_id`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`habitat_id`);

--
-- Index pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD PRIMARY KEY (`id_health`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `avis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaires_habitats`
--
ALTER TABLE `commentaires_habitats`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `habitat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  MODIFY `id_health` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `fk_habitat` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`habitat_id`);

--
-- Contraintes pour la table `commentaires_habitats`
--
ALTER TABLE `commentaires_habitats`
  ADD CONSTRAINT `commentaires_habitats_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`habitat_id`);

--
-- Contraintes pour la table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_animal_id` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Contraintes pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD CONSTRAINT `rapport_veterinaire_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
