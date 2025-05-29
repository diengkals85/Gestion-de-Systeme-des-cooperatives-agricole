-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gestionagricole
CREATE DATABASE IF NOT EXISTS `gestionagricole` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestionagricole`;

-- Dumping structure for table gestionagricole.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.cooperatives
CREATE TABLE IF NOT EXISTS `cooperatives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_cooperative` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.cotisations
CREATE TABLE IF NOT EXISTS `cotisations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Montant` double(20,2) NOT NULL,
  `Date_cotisation` timestamp NOT NULL,
  `id_membre` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cotisation_id_membre_foreign` (`id_membre`),
  CONSTRAINT `cotisation_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.cultures
CREATE TABLE IF NOT EXISTS `cultures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nom_Culture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rendement_estime` float DEFAULT NULL,
  `rendement_reel` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.employes
CREATE TABLE IF NOT EXISTS `employes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `poste` varchar(100) DEFAULT NULL,
  `salaire` float DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `id_cooperative` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cooperative` (`id_cooperative`),
  CONSTRAINT `FK_employes_cooperatives` FOREIGN KEY (`id_cooperative`) REFERENCES `cooperatives` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.membres
CREATE TABLE IF NOT EXISTS `membres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nom_membre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom_membre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_membre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_adhesion` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.mouvement_stocks
CREATE TABLE IF NOT EXISTS `mouvement_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_mouvement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantite` int NOT NULL,
  `date_mouvement` date DEFAULT NULL,
  `id_stock` bigint unsigned NOT NULL,
  `id_projet` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_projet` (`id_projet`),
  KEY `id_stock` (`id_stock`),
  CONSTRAINT `FK__projetagricoles` FOREIGN KEY (`id_projet`) REFERENCES `projetagricoles` (`id`),
  CONSTRAINT `FK__stocks` FOREIGN KEY (`id_stock`) REFERENCES `stocks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.parcelles
CREATE TABLE IF NOT EXISTS `parcelles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_parcelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `superficie` float NOT NULL DEFAULT '0',
  `localisation_gps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_sol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ph_sol` decimal(3,2) DEFAULT NULL,
  `conductivite_electrique` decimal(5,2) DEFAULT NULL,
  `taux_matiere_organique` decimal(5,2) DEFAULT NULL,
  `azote_total` decimal(5,2) DEFAULT NULL,
  `phosphore_assimilable` decimal(5,2) DEFAULT NULL,
  `potassium_echangeable` decimal(5,2) DEFAULT NULL,
  `id_projet` bigint unsigned NOT NULL,
  `id_culture` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rendement` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parcelle_id_projet_foreign` (`id_projet`),
  KEY `parcelle_id_culture_foreign` (`id_culture`),
  CONSTRAINT `parcelle_id_culture_foreign` FOREIGN KEY (`id_culture`) REFERENCES `cultures` (`id`),
  CONSTRAINT `parcelle_id_projet_foreign` FOREIGN KEY (`id_projet`) REFERENCES `projetagricoles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.partenaires
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(100) NOT NULL,
  `type_partenaire` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.presences
CREATE TABLE IF NOT EXISTS `presences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_presence` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `id_employe` bigint unsigned NOT NULL,
  ` updated_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employe` (`id_employe`),
  CONSTRAINT `FK__employes` FOREIGN KEY (`id_employe`) REFERENCES `employes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.produits
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nom_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` bigint NOT NULL,
  `prix` double(8,2) NOT NULL,
  `id_membre` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_id_membre_foreign` (`id_membre`),
  CONSTRAINT `produit_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.projetagricoles
CREATE TABLE IF NOT EXISTS `projetagricoles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nom_projet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_debut` timestamp NOT NULL,
  `Date_fin` timestamp NOT NULL,
  `Status_projet` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_membre` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projetagricole_id_membre_foreign` (`id_membre`),
  CONSTRAINT `projetagricole_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.ressources
CREATE TABLE IF NOT EXISTS `ressources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_ressource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qte_ressource` bigint NOT NULL,
  `id_cooperative` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_type` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ressource_id_cooperative_foreign` (`id_cooperative`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `FK_ressources_type_ressources` FOREIGN KEY (`id_type`) REFERENCES `type_ressources` (`id`),
  CONSTRAINT `ressource_id_cooperative_foreign` FOREIGN KEY (`id_cooperative`) REFERENCES `cooperatives` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.stocks
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantite_initiale` int NOT NULL DEFAULT '0',
  `quantite_disponible` int NOT NULL DEFAULT '0',
  `seuil_alerte` int NOT NULL DEFAULT '0',
  `id_ressource` bigint unsigned NOT NULL DEFAULT '0',
  `id_cooperative` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ressource` (`id_ressource`),
  KEY `id_cooperative` (`id_cooperative`),
  CONSTRAINT `FK__cooperatives` FOREIGN KEY (`id_cooperative`) REFERENCES `cooperatives` (`id`),
  CONSTRAINT `FK__ressources` FOREIGN KEY (`id_ressource`) REFERENCES `ressources` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.subventions
CREATE TABLE IF NOT EXISTS `subventions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_reception` date NOT NULL,
  `montant` double unsigned NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_partenaire` bigint unsigned NOT NULL,
  `id_cooperative` bigint unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_subventions_partenaires` (`id_partenaire`),
  KEY `FK_subventions_cooperatives` (`id_cooperative`),
  CONSTRAINT `FK_subventions_cooperatives` FOREIGN KEY (`id_cooperative`) REFERENCES `cooperatives` (`id`),
  CONSTRAINT `FK_subventions_partenaires` FOREIGN KEY (`id_partenaire`) REFERENCES `partenaires` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.transactionfinancieres
CREATE TABLE IF NOT EXISTS `transactionfinancieres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type_transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double(20,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_transaction` timestamp NOT NULL,
  `id_cooperative` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactionfinanciere_id_cooperative_foreign` (`id_cooperative`) USING BTREE,
  CONSTRAINT `transactionfinanciere_id_cooperative_foreign` FOREIGN KEY (`id_cooperative`) REFERENCES `cooperatives` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.type_ressources
CREATE TABLE IF NOT EXISTS `type_ressources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.utilisateurressources
CREATE TABLE IF NOT EXISTS `utilisateurressources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantite_utilise` bigint NOT NULL,
  `id_projet` bigint unsigned NOT NULL,
  `id_ressource` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateurressource_id_projet_foreign` (`id_projet`),
  KEY `utilisateurressource_id_ressource_foreign` (`id_ressource`) USING BTREE,
  CONSTRAINT `utilisateurressource_id_projet_foreign` FOREIGN KEY (`id_projet`) REFERENCES `projetagricoles` (`id`),
  CONSTRAINT `utilisateurressource_id_ressource_foreign` FOREIGN KEY (`id_ressource`) REFERENCES `ressources` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table gestionagricole.ventes
CREATE TABLE IF NOT EXISTS `ventes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantite` int unsigned DEFAULT NULL,
  `prix_vente` int unsigned DEFAULT NULL,
  `date_vente` date DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_produit` bigint unsigned DEFAULT NULL,
  `id_client` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_produit` (`id_produit`),
  CONSTRAINT `FK__clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  CONSTRAINT `FK__produits` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
