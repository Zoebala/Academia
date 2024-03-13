-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour academia
CREATE DATABASE IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `academia`;

-- Listage de la structure de table academia. anneeacads
CREATE TABLE IF NOT EXISTS `anneeacads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libAnnee` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.anneeacads : ~3 rows (environ)
INSERT INTO `anneeacads` (`id`, `libAnnee`) VALUES
	(1, '2022-2023'),
	(2, '2023-2024'),
	(3, '2024-2025');

-- Listage de la structure de table academia. annonce
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.annonce : ~2 rows (environ)
INSERT INTO `annonce` (`id`, `created_at`, `updated_at`, `photo`, `titre`, `contenu`) VALUES
	(1, '2023-08-27 13:59:26', NULL, '1693144766.jpeg', 'Biologie', '<p>La biologie se base sur <em><strong>l&#39;anatomie</strong></em> humaine ainsi que son fonctionnement.</p>'),
	(2, '2023-08-27 14:00:33', '2023-09-19 20:43:18', '1695156198.jpeg', 'Electricité', '<p>L&#39;&eacute;lectricit&eacute; fut d&eacute;couvert par Binjamin franklin.</p>');

-- Listage de la structure de table academia. departements
CREATE TABLE IF NOT EXISTS `departements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint unsigned NOT NULL,
  `libDepartement` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departements_section_id_foreign` (`section_id`),
  CONSTRAINT `departements_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.departements : ~17 rows (environ)
INSERT INTO `departements` (`id`, `section_id`, `libDepartement`) VALUES
	(1, 3, 'Français'),
	(2, 3, 'Anglais-Culture Africaine'),
	(3, 3, 'Français-Latin'),
	(4, 3, 'Histoire'),
	(5, 3, 'O.S. Professionnelle'),
	(6, 3, 'G. Adm I. Scolaire & Form'),
	(7, 1, 'Gestion Commerciale & Administrative'),
	(8, 1, 'Secrétariat comptable commercial et informatique'),
	(9, 1, 'Phytotechnie et Défense des cultures'),
	(10, 1, 'Production et Santé Animale'),
	(11, 2, 'Mathématique-Informatique'),
	(12, 2, 'Informatique et technologies'),
	(13, 2, 'Biologie-Chimie'),
	(14, 2, 'Sciences de la vie et de la terre'),
	(15, 2, 'Informatique de gestion'),
	(16, 2, 'Mathématique-Physique'),
	(17, 2, 'Physique-Electronique'),
	(18, 2, 'Physique-Electricité');

-- Listage de la structure de table academia. elementsdossiers
CREATE TABLE IF NOT EXISTS `elementsdossiers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `demandeInscript` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplomeEtat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulletin5e` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulletin6e` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carteIdentite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestationNais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestationBCVM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestationNation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attestationStatut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etudiant_id` bigint unsigned NOT NULL,
  `profil1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `elementsdossiers_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `elementsdossiers_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.elementsdossiers : ~1 rows (environ)
INSERT INTO `elementsdossiers` (`id`, `demandeInscript`, `diplomeEtat`, `bulletin5e`, `bulletin6e`, `carteIdentite`, `attestationNais`, `attestationBCVM`, `attestationNation`, `attestationStatut`, `etudiant_id`, `profil1`, `profil2`, `profil3`) VALUES
	(1, '169339218753.jpeg', '169339218712.jpeg', '169339218738.jpeg', '169339218759.jpeg', '169339218750.jpeg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
	(2, '169414541672.jpeg', '169414541614.jpeg', '169414541691.jpeg', '169414541630.jpeg', '169414541643.jpeg', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL),
	(3, '169425050675.jpeg', '16942505061.jpeg', '169425050612.jpeg', '169425050632.jpeg', '169425050631.jpeg', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
	(4, '169444032942.jpeg', '169444032924.jpeg', '169444032954.jpeg', '169444032973.jpeg', '169444032991.jpeg', NULL, NULL, NULL, NULL, 4, '169444032968.jpeg', NULL, NULL);

-- Listage de la structure de table academia. etudiants
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postnom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `territoire` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optionSecondaire` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datenais` date NOT NULL,
  `nompere` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nommere` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teletudiant` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teltutaire` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pourcentage` int DEFAULT NULL,
  `ecole` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresseEcole` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `territoireEcole` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_user_id_foreign` (`user_id`),
  CONSTRAINT `etudiants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.etudiants : ~1 rows (environ)
INSERT INTO `etudiants` (`id`, `matricule`, `nom`, `postnom`, `prenom`, `sexe`, `photo`, `province`, `territoire`, `optionSecondaire`, `datenais`, `nompere`, `nommere`, `teletudiant`, `teltutaire`, `adresse`, `nationalite`, `statut`, `user_id`, `created_at`, `updated_at`, `pourcentage`, `ecole`, `adresseEcole`, `territoireEcole`) VALUES
	(1, '2023/1', 'Ely', 'Matou', 'Arsen', 'F', '1693145514.jpeg', 'Kongo-Central', 'Mbanza-Ngungu', 'Scientifique', '1999-12-18', 'Matou', 'Nsimba', '0899365490', '0898092830', '45, Reservoir Q/Noki', 'Congolaise', 1, 2, NULL, NULL, 60, 'Lycée Kivuvu', '45, Reservoir Q/Noki', 'Mbanza-Ngungu'),
	(2, '2023/2', 'Bala', 'Mpalaba', 'tite', 'M', '1694143437.jpg', 'Kongo-Central', 'Mbanza-Ngungu', 'Electronique', '1996-03-12', 'Balabala', 'Biluani', '0893146722', '0894363298', 'Av. Lusawowo 3, Q/Ngungu', 'Congolaise', 1, 3, NULL, NULL, 55, 'Edap /ISP Mbanza-Ngungu', '25, Mweneditu Q/Noki', 'Mbanza-Ngungu'),
	(3, '2023/3', 'toto', 'tata', 'glody', 'F', '1694250378.jpeg', 'Kongo-Central', 'Mbanza-Ngungu', 'Commerciale & Gestion', '1995-08-14', 'kjlklpljkjk', 'jkjkljljlj', '0898723456', '7687676667', 'gjhjhjhj', 'Congolaise', 1, 4, NULL, NULL, 54, 'Edap', '45, mexe,nkkjo', 'klklklkl'),
	(4, '2023/4', 'Kelenda', 'Mwalibongo', 'Ruth', 'F', '1694440180.jpeg', 'Kongo-Central', 'Wasongola', 'Chimie-Biologie', '1998-02-13', 'Kelenda', 'Mwalibongo', '0896071804', '0898092830', '45, Reservoir Q/Noki', 'Congolaise', 1, 5, NULL, NULL, 61, 'Edap/ ISP', '45, Reservoir Q/Noki', 'Mbanza-Ngungu');

-- Listage de la structure de table academia. failed_jobs
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

-- Listage des données de la table academia.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table academia. frais
CREATE TABLE IF NOT EXISTS `frais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `montantFrais` int NOT NULL,
  `motif` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_id` bigint unsigned NOT NULL,
  `etudiant_id` bigint unsigned NOT NULL,
  `promotion_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `frais_annee_id_foreign` (`annee_id`),
  KEY `frais_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `frais_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `anneeacads` (`id`) ON DELETE CASCADE,
  CONSTRAINT `frais_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.frais : ~2 rows (environ)
INSERT INTO `frais` (`id`, `created_at`, `updated_at`, `montantFrais`, `motif`, `annee_id`, `etudiant_id`, `promotion_id`) VALUES
	(2, '2023-09-07 03:59:50', NULL, 20500, 'Frais Inscription', 1, 1, 3),
	(3, '2023-09-08 04:02:00', NULL, 170500, 'Frais', 1, 2, 1),
	(4, '2023-09-09 09:09:13', NULL, 20500, 'Frais Inscription', 1, 3, 3),
	(5, '2023-09-11 13:53:14', NULL, 170500, 'Frais', 1, 4, 3);

-- Listage de la structure de table academia. inscriptions
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dateInscription` datetime NOT NULL,
  `annee_id` bigint unsigned NOT NULL,
  `etudiant_id` bigint unsigned NOT NULL,
  `option_id` bigint unsigned NOT NULL,
  `promotion_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inscriptions_annee_id_foreign` (`annee_id`),
  KEY `inscriptions_etudiant_id_foreign` (`etudiant_id`),
  KEY `inscriptions_option_id_foreign` (`option_id`),
  KEY `inscriptions_promotion_id_foreign` (`promotion_id`),
  CONSTRAINT `inscriptions_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `anneeacads` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inscriptions_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inscriptions_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  CONSTRAINT `inscriptions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.inscriptions : ~0 rows (environ)
INSERT INTO `inscriptions` (`id`, `dateInscription`, `annee_id`, `etudiant_id`, `option_id`, `promotion_id`) VALUES
	(1, '2023-08-30 00:00:00', 1, 1, 1, 3),
	(2, '2023-09-08 04:56:55', 1, 2, 10, 1),
	(3, '2023-09-09 10:08:26', 1, 3, 5, 3),
	(4, '2023-09-11 14:52:09', 1, 4, 3, 3);

-- Listage de la structure de table academia. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinataire` smallint DEFAULT NULL,
  `etudiant_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.messages : ~0 rows (environ)

-- Listage de la structure de table academia. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.migrations : ~15 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2023_04_23_170529_create_anneeacads_table', 2),
	(3, '2023_04_26_164511_create_sections_table', 3),
	(4, '2023_04_26_164016_create_departements_table', 4),
	(5, '2023_04_23_170339_create_options_table', 5),
	(6, '2023_08_26_113858_create_promotions_table', 6),
	(7, '2023_04_22_005534_create_etudiants_table', 7),
	(8, '2023_08_26_114750_create_frais_table', 8),
	(9, '2014_10_12_100000_create_password_resets_table', 9),
	(10, '2019_08_19_000000_create_failed_jobs_table', 9),
	(11, '2023_04_23_171058_create_inscriptions_table', 9),
	(12, '2023_05_05_154354_create_tranchepays_table', 9),
	(13, '2023_05_05_154505_create_elementsdossiers_table', 9),
	(14, '2023_07_13_113545_create_annonce_table', 9),
	(15, '2023_08_09_173008_create_messages_table', 9),
	(17, '2023_08_31_093040_create_typefrais_table', 10);

-- Listage de la structure de table academia. options
CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libOption` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depart_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `options_depart_id_foreign` (`depart_id`),
  CONSTRAINT `options_depart_id_foreign` FOREIGN KEY (`depart_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.options : ~9 rows (environ)
INSERT INTO `options` (`id`, `libOption`, `photo`, `depart_id`) VALUES
	(1, 'Français L. Africaine', '1693144538.jpeg', 1),
	(2, 'Biologie', '1693389349.jpeg', 13),
	(3, 'Informatique & Technologies', '1693389501.jpeg', 12),
	(4, 'Science Com. & Admin', '1693389563.jpeg', 7),
	(5, 'Entrepreneuriat', '1693389634.jpeg', 7),
	(6, 'Math-Informatique', '1693389676.jpeg', 11),
	(7, 'Anglais-Culture Africaine', '1693389861.jpeg', 2),
	(8, 'Chimie', '1693389906.jpeg', 13),
	(9, 'Français-Latin', '1693390036.jpeg', 3),
	(10, 'Physique-Electronique', '1693390088.jpeg', 17),
	(11, 'Secrétariat', '1693390193.jpeg', 8);

-- Listage de la structure de table academia. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.password_resets : ~0 rows (environ)

-- Listage de la structure de table academia. promotions
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libpromotion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.promotions : ~6 rows (environ)
INSERT INTO `promotions` (`id`, `libpromotion`, `created_at`, `updated_at`) VALUES
	(1, 'L1-PADEM', NULL, NULL),
	(2, 'L1-LMD', NULL, NULL),
	(3, 'L2-LMD', NULL, NULL),
	(4, 'L3-LMD', NULL, NULL),
	(5, 'L2-PADEM', NULL, NULL),
	(6, 'L4-LMD', NULL, NULL);

-- Listage de la structure de table academia. sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libSection` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.sections : ~4 rows (environ)
INSERT INTO `sections` (`id`, `libSection`) VALUES
	(1, 'Techniques'),
	(2, 'Sciences & Technologies'),
	(3, 'Lettres, Langues et Arts');

-- Listage de la structure de table academia. tranchepays
CREATE TABLE IF NOT EXISTS `tranchepays` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libTranche` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantTranche` int NOT NULL,
  `dateTranche` datetime NOT NULL,
  `frais_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tranchepays_frais_id_foreign` (`frais_id`),
  CONSTRAINT `tranchepays_frais_id_foreign` FOREIGN KEY (`frais_id`) REFERENCES `frais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.tranchepays : ~7 rows (environ)
INSERT INTO `tranchepays` (`id`, `libTranche`, `montantTranche`, `dateTranche`, `frais_id`) VALUES
	(1, 'Frais Inscription', 20500, '2023-09-07 04:59:50', 2),
	(2, 'Frais Inscription', 20500, '2023-09-08 05:02:00', 3),
	(3, 'Frais Académiques L1 PADEM', 100000, '2023-09-08 05:54:01', 3),
	(4, 'Frais Académiques L1 PADEM', 50000, '2023-09-08 06:00:05', 3),
	(5, 'Frais Inscription', 20500, '2023-09-09 10:09:13', 4),
	(6, 'Frais Inscription', 20500, '2023-09-11 14:53:14', 5),
	(7, 'Frais Académiques L2 LMD', 150000, '2023-09-11 15:19:32', 5);

-- Listage de la structure de table academia. typefrais
CREATE TABLE IF NOT EXISTS `typefrais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Motif` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Montanttypefrais` int NOT NULL,
  `promotion_id` bigint unsigned DEFAULT NULL,
  `annee_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `typefrais_annee_id_foreign` (`annee_id`),
  CONSTRAINT `typefrais_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `anneeacads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.typefrais : ~8 rows (environ)
INSERT INTO `typefrais` (`id`, `Motif`, `Montanttypefrais`, `promotion_id`, `annee_id`, `created_at`, `updated_at`) VALUES
	(1, 'Frais Inscription', 20500, 255, 1, '2023-08-31 09:32:23', NULL),
	(2, 'Frais Académiques L2 PADEM', 809000, 5, 1, '2023-08-31 09:33:01', NULL),
	(3, 'Frais Concours Test', 7500, 255, 1, '2023-08-31 09:33:36', NULL),
	(4, 'Frais Attestation Physique', 25000, 255, 1, '2023-08-31 09:34:03', NULL),
	(5, 'Frais Académiques L1 PADEM', 699000, 6, 1, '2023-08-31 09:34:35', '2023-08-31 11:23:50'),
	(7, 'Frais Académiques L4 LMD', 750000, 4, 1, '2023-08-31 10:27:06', NULL),
	(8, 'Frais Académiques L3 LMD', 700000, 2, 1, '2023-08-31 10:27:53', NULL),
	(9, 'Frais Académiques L1 LMD', 735000, 1, 1, '2023-08-31 10:29:39', NULL),
	(10, 'Frais Académiques L2 LMD', 765000, 3, 1, '2023-08-31 10:31:24', NULL);

-- Listage de la structure de table academia. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Admin` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table academia.users : ~2 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `Admin`, `created_at`, `updated_at`) VALUES
	(1, 'Zoé Bala', 'zoebala288@gmail.com', NULL, '$2y$10$1SnMN6D0TbuD2eE6.oCi/.W0VreX1ftkuk..Mx8cuUT8cA3f85rk.', NULL, 1, '2023-08-27 13:20:18', '2023-08-27 13:20:18'),
	(2, 'Ely', 'Ely@gmail.com', NULL, '$2y$10$ZG1mVIVyVACZqw2JMHiQVOp7hwL2ultXuQzPCjUCSnYmqarpwWOcC', NULL, 0, '2023-08-27 14:06:08', '2023-08-27 14:06:08'),
	(3, 'Tite Mpalaba', 'tite@gmail.com', NULL, '$2y$10$OOY9foGfohBkkfpgHHL0ue0eTrCKybtQ8YQrZbJ/UYwpyxDJ2Zjii', NULL, 0, '2023-09-08 03:10:51', '2023-09-08 03:10:51'),
	(4, 'Glody', 'glodi@gmail.com', NULL, '$2y$10$jeEIkMinffv/3JS0BkWhhONoZaKIAOjbW1c6gnks7028bMyj87oSm', NULL, 0, '2023-09-09 09:01:43', '2023-09-09 09:01:43'),
	(5, 'Kelenda Mwalibongo', 'kelenda@gmail.com', NULL, '$2y$10$QSCNXhKWCvYftrZaKi6zRe51lGtTcutOGumX1nsu9bF1MNNJGxdYK', NULL, 0, '2023-09-11 13:44:45', '2023-09-11 13:44:45');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
