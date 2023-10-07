-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 oct. 2023 à 21:29
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
-- Base de données : `minimarket`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoires`
--

CREATE TABLE `accessoires` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `idc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accessoires`
--

INSERT INTO `accessoires` (`id`, `image`, `nom`, `prix`, `description`, `idc`) VALUES
(11, 'https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.blog.happy-chantilly.com%2Faccessoires-pour-homme-futur-marie-concours-avec-trendhim%2F&amp;psig=AOvVaw2R2Iv_LqcWZU87jVTs_jeM&amp;ust=1696696296162000&amp;source=images&amp;cd=vfe&amp;opi=89978449&amp;ved=0CBEQjRxqFwoTCLDEq7Ps4YEDFQAAAAAdAAAAABAE', 'Bracelet', 20, 'azaerer', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `motdepasse` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(1, 'mini', 'mini@admin.com', 'mini1234');

-- --------------------------------------------------------

--
-- Structure de la table `cosmetic`
--

CREATE TABLE `cosmetic` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `idc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cosmetic`
--

INSERT INTO `cosmetic` (`id`, `image`, `nom`, `prix`, `description`, `idc`) VALUES
(1, 'https://www.zinabel.ma/4912-large_default/rouge-a-levres-liquide-longue-tenue-golden-rose.jpg', 'Rouge a levres', 40, 'Rouge à lèvres Liquide Longue Tenue Golden Rose', 2),
(2, 'http://cdn.shopify.com/s/files/1/0281/9797/8187/products/2.1.jpg?v=1598254911', 'mascara revolution', 62, 'MAKEUP REVOLUTION BIG LASH VOLUME MASCARA', 2),
(3, 'https://media-afr-cdn.oriflame.com/productImage/?externalMediaId=product-management-media%2F38538%2F38538.png%3Fversion%3D1650444302&q=90', 'Giordani Gold', 215, 'Eau de Parfum Giordani Gold Man', 2),
(5, 'https://parabella.ma/303-large_default/vichy-ideal-soleil-creme-onctueuse-spf-50-50ml.jpg', 'Crème Soleil', 130, 'VICHY IDEAL SOLEIL Crème onctueuse SPF 50+ 50ml', 2),
(6, 'https://www.chanel.com/images/w_0.51,h_0.51,c_crop/q_auto:good,f_auto,fl_lossy,dpr_1.2/w_1920/n-5-eau-de-parfum-spray-3-4fl-oz--packshot-default-125530-9518357119006.jpg', 'Channel Parfum Femme', 370, 'EAU DE PARFUM VAPORISATEUR\r\nRéf. 125530\r\n', 2),
(7, 'data:image/jpeg;base64,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', 'Savon', 20, 'Savon', 2),
(8, 'https://www.maybelline.ma/~/media/mny/mena%20hub/eye-make-up/eye-liner/master-precise-liner/maybelline-eye-liner-master-precise-black-o.jpg?thn=0&amp;w=380&amp;hash=195A3B7B69D75BFA6BE12A80928155E6159D80C0', 'EYELINER MASTER PRECISE', 45, 'Eyeliner maybelline', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(80) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `idc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`, `idc`) VALUES
(8, 'https://img.ltwebstatic.com/images3_pi/2023/01/09/1673261589e67f10d9beff3c7b74eaa11834d3b19e_thumbnail_405x552.webp', 'Men shirt', 149, 'Homme 1 pièce Chemise unicolore à bouton', 1),
(14, 'https://img.ltwebstatic.com/images3_pi/2022/10/31/1667194336d52b6dcf665108f5aafdfb3b9e1554db_thumbnail_405x552.webp', 'Chemise homme', 200, 'Chemise carreau pour les hommes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'az', 'aymanelouardiji@gmail.com', 'azazaz'),
(19, 'aymann', 'ayman@gmail.com', 'ayman');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accessoires`
--
ALTER TABLE `accessoires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cosmetic`
--
ALTER TABLE `cosmetic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
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
-- AUTO_INCREMENT pour la table `accessoires`
--
ALTER TABLE `accessoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cosmetic`
--
ALTER TABLE `cosmetic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
