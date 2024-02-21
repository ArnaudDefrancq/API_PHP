-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 fév. 2024 à 12:41
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_test_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `prix` decimal(10,2) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nom`, `description`, `prix`, `categorie`) VALUES
(1, 'Smartphone Apple iPhone 13', 'Le dernier smartphone haut de gamme d\'Apple, équipé d\'un écran OLED et d\'une puce A15 Bionic.', 799.99, 'Électronique'),
(2, 'Smart TV Samsung QLED 4K 65 pouces', 'Une télévision QLED 4K de 65 pouces avec des couleurs vives et un contraste impressionnant.', 1499.99, 'Électronique'),
(3, 'Console de jeu Sony PlayStation 5', 'La dernière console de jeu de Sony, offrant des graphismes ultra-réalistes et des temps de chargement ultra-rapides.', 499.99, 'Électronique'),
(4, 'Chaussures de course Nike Air Zoom Pegasus 38', 'Des chaussures de course Nike légères et réactives, idéales pour les entraînements et les compétitions.', 129.99, 'Vêtements'),
(5, 'Appareil photo Canon EOS R5', 'Un appareil photo sans miroir haut de gamme de Canon, offrant une résolution élevée, une stabilisation d\'image avancée et des capacités vidéo 8K.', 3899.99, 'Électronique'),
(6, 'Ordinateur portable Dell XPS 13', 'Un ordinateur portable ultraportable de Dell avec un écran InfinityEdge, une performance puissante et une autonomie longue durée.', 1099.99, 'Informatique'),
(7, 'Casque sans fil Sony WH-1000XM4', 'Un casque audio sans fil haut de gamme de Sony avec une réduction de bruit active et une qualité sonore exceptionnelle.', 349.99, 'Électronique'),
(8, 'Montre connectée Apple Watch Series 7', 'La dernière montre connectée d\'Apple avec un écran toujours allumé, des fonctionnalités de suivi de la santé avancées et un design élégant.', 399.99, 'Électronique'),
(9, 'Enceinte Bluetooth portable JBL Charge 5', 'Une enceinte Bluetooth portable de JBL avec un son puissant, une batterie longue durée et une conception résistante à l\'eau.', 179.99, 'Électronique'),
(10, 'Écouteurs sans fil Samsung Galaxy Buds Pro', 'Des écouteurs sans fil de Samsung avec une qualité sonore supérieure, une réduction de bruit intelligente et un ajustement confortable.', 199.99, 'Électronique'),
(11, 'Aspirateur robot iRobot Roomba i7+', 'Un aspirateur robot haut de gamme de iRobot avec une aspiration puissante, une cartographie intelligente et un bac à poussière automatique.', 699.99, 'Maison'),
(12, 'Livre \"Le Seigneur des Anneaux\" de J.R.R. Tolkien', 'Une édition spéciale du classique de la littérature fantasy, \"Le Seigneur des Anneaux\", avec une reliure en cuir et des illustrations originales.', 39.99, 'Livres'),
(13, 'Trottinette électrique Xiaomi Mi Electric Scooter Pro 2', 'Une trottinette électrique pliable de Xiaomi avec une autonomie longue durée, des freins doubles et des phares ultra-lumineux.', 499.99, 'Sport'),
(14, 'Barre de son Sonos Arc', 'Une barre de son premium de Sonos avec un son immersif, une compatibilité Dolby Atmos et une installation facile.', 799.99, 'Électronique'),
(15, 'Sac à dos de randonnée Osprey Atmos AG 65', 'Un sac à dos de randonnée confortable et durable de Osprey avec une suspension anti-gravité et de nombreuses poches pour organiser votre équipement.', 269.99, 'Accessoires'),
(16, 'Vélo de route Trek Domane SL 6', 'Un vélo de route léger et performant de Trek avec une géométrie stable, une transmission fluide et des freins à disque hydrauliques.', 2899.99, 'Sport'),
(17, 'Tablette Samsung Galaxy Tab S7+', 'Une tablette haut de gamme de Samsung avec un écran Super AMOLED, un stylet S Pen inclus et des performances de niveau PC.', 849.99, 'Électronique'),
(18, 'Machine à café espresso Breville Barista Pro', 'Une machine à café espresso semi-automatique de Breville avec une mouture intégrée, une extraction précise et une vapeur puissante pour créer des boissons caféinées de qualité barista.', 799.99, 'Alimentation'),
(19, 'Ensemble de couteaux de cuisine Zwilling Pro', 'Un ensemble de couteaux de cuisine de haute qualité de Zwilling avec des lames en acier inoxydable, des poignées ergonomiques et un bloc de rangement élégant.', 299.99, 'Maison'),
(20, 'Drone DJI Mavic Air 2', 'Un drone compact et puissant de DJI avec une caméra 4K stabilisée sur trois axes, une autonomie de vol prolongée et des modes de vol intelligents.', 799.99, 'Électronique'),
(21, 'Console de jeu Xbox Series X', 'La console de jeu de nouvelle génération de Microsoft avec des performances de jeu ultra-rapides, une rétrocompatibilité étendue et un lecteur de disque Blu-ray 4K.', 499.99, 'Électronique'),
(22, 'Écran de jeu MSI Optix MAG274QRF-QD', 'Un écran de jeu QHD de 27 pouces de MSI avec une résolution élevée, un taux de rafraîchissement rapide et une technologie Quantum Dot pour des couleurs vibrantes.', 499.99, 'Électronique'),
(23, 'Imprimante multifonction HP OfficeJet Pro 9015', 'Une imprimante tout-en-un de HP avec une impression sans fil, une numérisation recto verso et une gestion efficace des documents.', 229.99, 'Informatique'),
(24, 'Guitare acoustique Martin D-28', 'Une guitare acoustique emblématique de Martin avec une construction en bois massif, un son riche et une jouabilité confortable.', 2999.99, 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
