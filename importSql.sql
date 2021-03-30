/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.17 : Database - _wshop_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE
DATABASE /*!32312 IF NOT EXISTS*/`_wshop_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE
`wshop_api`;

/*Table structure for table `produit` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store`
(
    `id`             int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name`           varchar(100) CHARACTER SET utf8 NOT NULL,
    `slug`           varchar(100) CHARACTER SET utf8 NOT NULL,
    `description`    text CHARACTER SET utf8 NOT NULL,
    `updated_at`     datetime   DEFAULT NULL COMMENT 'via trigger ADD/MODIF',
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Déchargement des données de la table `store`
--

INSERT INTO `store` (`id`, `name`, `slug`, `description`, `updated_at`) VALUES
(1, 'Fleux', 'fleux', 'DÃ©pliÃ©e sur prÃ¨s de 350 m2, la boutique Fleux\' offre aux dÃ©sespÃ©rÃ©s de la dÃ©co une profusion dâ€™objets dÃ©calÃ©s et colorÃ©s pour rÃ©veiller leur intÃ©rieur. Ouverte en 2005, la boutique de Luc Moulin et GaÃ©tan Aucher concentre en son sein deux avatars contemporains : le superflu et le luxe (dâ€™oÃ¹ le mot-valise Fleux\')', '2021-03-22 14:07:25'),
 (2, 'Carouche', 'carouche', 'Carouche nâ€™est pas une boutique de meubles ordinaires, mais une brocante singuliÃ¨re. Ici, on ne vend pas seulement, on interprÃ¨te les objets.', '2021-03-22 14:18:01'),
 (3, 'French Touche', 'french-touche', 'AprÃ¨s une dizaine dâ€™annÃ©es rue Jacquemont, câ€™est dÃ©sormais dans la trÃ¨s chouette rue Legendre que lâ€™on retrouve la boutique French Touche. ', '2021-03-22 14:26:04'),
 (4, 'Blou', 'blou', 'l y a deux ans, ils crÃ©ent un concept store qui allie vÃªtements et dÃ©coration, comme il y en a encore peu Ã  Paris. Ils Ã©cument les salons du design et font une veille permanente sur les nouveaux crÃ©ateurs indÃ©pendants.', '2021-03-22 14:19:07'),
 (5, 'L\'Atelier de Pablo', 'latelier-de-pablo', 'InstallÃ©e Ã  mi-chemin entre lâ€™Ã©cole et la maison, la boutique de BÃ©nÃ©dicte se dÃ©plie sur trois niveaux, un sous-sol qui fait office de cave, un rez-de chaussÃ©e dans lequel on trouve le corner enfants, des sacs et plein de babioles chinÃ©es et lâ€™Ã©tage plus axÃ© dÃ©co scandinave.', '2021-03-22 14:20:00'),
(6, 'TsÃ© & TsÃ© associÃ©es', 'tse-tse-associees', 'TsÃ© & TsÃ© associÃ©es ont rÃ©cemment ouvert une nouvelle boutique rue de SÃ©vignÃ© dans le Marais, et elles aiment Ã  penser que la Marquise du mÃªme nom aurait flÃ¢nÃ© de bon grÃ© dans leur antre crÃ©atif.', '2021-03-22 14:20:57'),
(7, 'Borgo delle Tovaglie', 'borgo-delle-tovaglie', 'CachÃ© dans une petite rue du quartier dâ€™Oberkampf, Borgo Delle Tovaglie est le genre dâ€™adresse quâ€™on aurait aimÃ© connaÃ®tre plus tÃ´t. Qui dâ€™ailleurs nâ€™a jamais rÃªvÃ© dâ€™un bout dâ€™Italie dans la capitale ? Eh bien câ€™est chose faite avec cette enseigne hors norme originaire de Bologne.', '2021-03-22 14:21:41'),
(8, 'La TrÃ©sorerie', 'la-tresorerie', 'Avec un nom pareil, on ne pouvait que sâ€™attendre Ã  trouver de belles choses. Pari rÃ©ussi donc pour la TrÃ©sorerie, une bien jolie boutique nichÃ©e depuis avril dans le vivifiant quartier RÃ©publique, Ã  lâ€™exact emplacement dâ€™une ancienne trÃ©sorerie publique.', '2021-03-22 14:22:52'),
(9, 'BobidaVintage', 'bobidavintage', 'A une centaine de mÃ¨tres du mÃ©tro Robespierre trÃ´ne BobidaVintage, temple du mobilier scandinave et comme son nom lâ€™indique, de dÃ©coration vintage. Superbement amÃ©nagÃ©e, la boutique impressionne et on ose Ã  peine y entrer tant tout Ã  lâ€™air prÃ©cieux et relativement cher.', '2021-03-22 14:23:28'),
(10, 'NordBÃ˜', 'nordbo', 'Un concept-store de 20 m2 oÃ¹ lâ€™inspiration scandinave et les tons neigeux nâ€™en rendent pas moins le lieu extrÃªmement chaleureux. Tout comme les sourires dâ€™Alice et StÃ©phanie.', '2021-03-22 14:24:21'),
(11, 'Allt', 'allt', 'Si vous voulez savoir de quel bois la Scandinavie chauffe son intÃ©rieur depuis les annÃ©es 1950, alors ne manquez pas Allt, bien que tout le monde nâ€™ait pas lâ€™idÃ©e dâ€™aller chiner son mobilier dans le 17e.', '2021-03-22 14:25:00');
