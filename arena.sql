-- -------------------------------------------------------------
-- TablePlus 5.1.0(468)
--
-- https://tableplus.com/
--
-- Database: arena
-- Generation Time: 2022-12-03 05:56:39.6560
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint unsigned NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
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

CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
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

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ratings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  KEY `ratings_rateable_id_index` (`rateable_id`),
  KEY `ratings_rateable_type_index` (`rateable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facilities` json NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `rooms_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_editor` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Стандарт', '2022-11-29 07:57:37', '2022-11-29 07:57:37'),
(2, 'Полу-люкс', '2022-11-29 07:57:52', '2022-11-29 07:57:52'),
(3, 'Люкс', '2022-11-29 07:58:00', '2022-11-29 07:58:00');

INSERT INTO `comments` (`id`, `username`, `review`, `created_at`, `updated_at`, `room_id`, `is_published`) VALUES
(5, 'Постоялец', 'Супер-пупер', '2022-12-02 14:31:35', '2022-12-03 05:04:31', 1, 1),
(6, 'Максим', 'Средненько', '2022-12-02 14:33:51', '2022-12-02 14:34:04', 1, 1),
(7, 'Гость', 'Очень плохо', '2022-12-02 14:34:41', '2022-12-02 14:36:25', 1, 1),
(10, 'Максим', 'Номер просто пушка!', '2022-12-03 03:47:32', '2022-12-03 03:48:00', 3, 1),
(11, 'Чек-чек', 'Достойно очень', '2022-12-03 03:56:05', '2022-12-03 05:10:30', 3, 1),
(12, 'Проходил мимо', 'Оставил каммент', '2022-12-03 05:09:10', '2022-12-03 05:10:31', 3, 1),
(13, 'Лучший', 'Камент от лучшего', '2022-12-03 05:10:59', '2022-12-03 05:11:51', 3, 1);

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(7, 'Макисм Треск', 'djtresk@gmail.com', '+7 (922) 482 2449', 'Очень крутой сайт, хочу такой же!', '2022-12-03 05:05:59', '2022-12-03 05:05:59'),
(8, 'Хозяие', 'хозяин@хозяин.ру', '+7 (922) 482 2449', 'Сообщение от хозяина', '2022-12-03 05:15:37', '2022-12-03 05:15:37'),
(9, 'туцшисщши', 'ищищ@ищ.иуг', '+7 (909) 890 8098', 'оиоилоищищишгиг', '2022-12-03 05:16:42', '2022-12-03 05:16:42'),
(10, 'Хозяин', 'хозяин@хз.хз', '+7 (990) 909 0900', 'Сообщение от хозяина', '2022-12-03 05:17:55', '2022-12-03 05:17:55'),
(11, 'Максим Владимирович', 'tresk@icloud.com', '+7 (922) 482 2449', 'Это сообщение не спам!', '2022-12-03 05:19:39', '2022-12-03 05:19:39');

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(15, 'App\\Models\\Room', 3, 'f0d6740c-987c-4997-a8d6-1780618c472c', 'thumbs', 'Hotel_097', 'j3Sv6LtMOcG42IJz28pLnRNMvAM87k-metaSG90ZWxfMDk3LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 6205078, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 1, '2022-12-02 10:18:23', '2022-12-02 10:18:46'),
(16, 'App\\Models\\Room', 3, '633ed9c1-5f87-4671-95ab-22232de39395', 'thumbs', 'Hotel_075', 'XOoPzRILDSOoU8dynC5HorMzww5FHY-metaSG90ZWxfMDc1LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 4478570, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 2, '2022-12-02 10:28:43', '2022-12-02 10:28:44'),
(17, 'App\\Models\\Room', 1, '8f89a285-de06-4cc9-9400-ba3be6829be1', 'thumbs', 'Hotel_096', 'KPMicGyHw4fya6IjJb2pQxGp3vDN3M-metaSG90ZWxfMDk2LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 6098011, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 1, '2022-12-02 10:34:08', '2022-12-02 10:34:09'),
(18, 'App\\Models\\Room', 1, 'a302f7f7-6466-4ddc-9e50-4c2e66d6e0dc', 'thumbs', 'Hotel_089', 'uNPkln2p7xBTi84ue5lWlbghOYvBno-metaSG90ZWxfMDg5LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 5975000, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 2, '2022-12-02 10:34:09', '2022-12-02 10:34:09'),
(19, 'App\\Models\\Room', 2, '8eb01f97-7eaa-4041-86bd-1589998ed633', 'thumbs', 'IMG_3495', 'TPGDYv0l3slvCiDXFuwCogEXvEEuVI-metaSU1HXzM0OTUuSlBH-.jpg', 'image/jpeg', 'public', 'public', 3918756, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 1, '2022-12-02 10:39:05', '2022-12-02 10:39:06'),
(20, 'App\\Models\\Room', 2, 'd7943e8e-4b84-4e0b-9e30-68f69dbbc93f', 'thumbs', 'IMG_3496', 'v4fIwZ4EMHlEZWvqLZo8Rd1LKQrRDP-metaSU1HXzM0OTYuSlBH-.jpg', 'image/jpeg', 'public', 'public', 3553738, '[]', '[]', '{\"thumb\": true, \"thumbWebp\": true}', '[]', 2, '2022-12-02 10:39:06', '2022-12-02 10:39:06'),
(22, 'App\\Models\\Room', 1, 'df1c7054-2810-4177-a0f2-0733fb59a42f', 'headers', 'room-header', 'Pkk1prj6dnGg6wx5LgMlkvaP6kjWG4-metacm9vbS1oZWFkZXIuanBn-.jpg', 'image/jpeg', 'public', 'public', 715689, '[]', '[]', '{\"header\": true, \"headerWebp\": true}', '[]', 7, '2022-12-02 10:54:34', '2022-12-02 10:54:34'),
(28, 'App\\Models\\Room', 1, '84bf309f-907f-452f-bf04-4e95a991c40c', 'sliders', 'Hotel_096', 'L1uS0WJfvsUVzGynVDj8EYK3xFFLGw-metaSG90ZWxfMDk2LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 6098011, '[]', '[]', '{\"slider\": true, \"sliderWebp\": true, \"sliderThumb\": true, \"sliderThumbWebp\": true}', '[]', 1, '2022-12-02 11:02:10', '2022-12-02 11:02:16'),
(29, 'App\\Models\\Room', 1, '13c364d0-1717-4dab-9e8f-07d2271de1c5', 'sliders', 'Hotel_018', 'BxFU7lT0AYIfD2VgdRBa14MzOVcEuH-metaSG90ZWxfMDE4LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 8498249, '[]', '[]', '{\"slider\": true, \"sliderWebp\": true, \"sliderThumb\": true, \"sliderThumbWebp\": true}', '[]', 2, '2022-12-02 11:02:11', '2022-12-02 11:02:16'),
(31, 'App\\Models\\Room', 1, '7159a08d-6a1e-419d-b93c-1bb40b8c3fd3', 'sliders', 'Hotel_075', 'bJ5Ww5FhiWZa95lgRS8oQPCqjPLDT1-metaSG90ZWxfMDc1LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 4478570, '[]', '[]', '{\"slider\": true, \"sliderWebp\": true, \"sliderThumb\": true, \"sliderThumbWebp\": true}', '[]', 3, '2022-12-02 11:02:14', '2022-12-02 11:06:55'),
(32, 'App\\Models\\Room', 1, 'f1cc95d1-a9f0-4ea2-85bc-59f971968a05', 'sliders', 'Hotel_087', 'NNoLP9YkpylvRubDoYIBvBVaKCnKqx-metaSG90ZWxfMDg3LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 5008972, '[]', '[]', '{\"slider\": true, \"sliderWebp\": true, \"sliderThumb\": true, \"sliderThumbWebp\": true}', '[]', 4, '2022-12-02 11:02:15', '2022-12-02 11:06:55'),
(33, 'App\\Models\\Room', 1, '4586cddc-d3cd-47f8-ba3a-85f0235121ae', 'sliders', 'Hotel_019', 'xrKP4bW1zTEnOjqNTbOzvxSy9XoApw-metaSG90ZWxfMDE5LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 6308063, '[]', '[]', '{\"slider\": true, \"sliderWebp\": true, \"sliderThumb\": true, \"sliderThumbWebp\": true}', '[]', 5, '2022-12-02 11:06:53', '2022-12-02 11:06:55'),
(34, 'App\\Models\\Room', 1, 'cef3a325-4d44-4dce-b88e-8cd6f847bc95', 'seo', 'Hotel_096', 'e0VBPFUMDTOTFo1MDOTyHA8FAGaVRH-metaSG90ZWxfMDk2LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 6098011, '[]', '[]', '{\"ogImage\": true}', '[]', 8, '2022-12-02 16:14:38', '2022-12-02 16:14:38'),
(39, 'App\\Models\\RoomsPage', 23, 'e6dfd5df-e13b-420a-b7f4-16b08af30f8f', 'headers', 'rooms-header', 'UjhikIawfFLLaqCsiHj4nLVZpTDo29-metacm9vbXMtaGVhZGVyLmpwZw==-.jpg', 'image/jpeg', 'public', 'public', 1058103, '[]', '[]', '{\"header\": true, \"headerWebp\": true}', '[]', 3, '2022-12-02 20:21:01', '2022-12-02 20:21:01'),
(40, 'App\\Models\\RoomsPage', 23, '789c48c7-ef35-4a6f-8e18-1a5139b0f145', 'seo', 'Hotel_059', 'oz9mP8tw2L98HO4nkptgGz7alFtrMC-metaSG90ZWxfMDU5LkpQRw==-.jpg', 'image/jpeg', 'public', 'public', 4842490, '[]', '[]', '{\"ogImage\": true}', '[]', 4, '2022-12-02 20:24:34', '2022-12-02 20:24:34'),
(41, 'App\\Models\\Post', 1, '6b6d93f3-2459-4a9b-a812-d8a5edab6592', 'news', 'sergey-isakhanyan-C8r8Tqvr2Mg-unsplash', 'IyLHGEbnRRixUXY8zYSXrecSx3UDz3-metac2VyZ2V5LWlzYWtoYW55YW4tQzhyOFRxdnIyTWctdW5zcGxhc2guanBn-.jpg', 'image/jpeg', 'public', 'public', 379620, '[]', '[]', '{\"news\": true, \"newsWebp\": true}', '[]', 1, '2022-12-02 21:10:32', '2022-12-02 21:10:32'),
(42, 'App\\Models\\Post', 1, '839d84cc-2390-4974-97af-f5655d04e27c', 'news', 'sergey-isakhanyan-C8r8Tqvr2Mg-unsplash', 'XnEp9kJJjKV3LHpW1fzODOc9EE8zvy-metac2VyZ2V5LWlzYWtoYW55YW4tQzhyOFRxdnIyTWctdW5zcGxhc2guanBn-.jpg', 'image/jpeg', 'public', 'public', 379620, '[]', '[]', '{\"news\": true, \"newsWebp\": true}', '[]', 2, '2022-12-02 21:19:42', '2022-12-02 21:19:43'),
(43, 'App\\Models\\Post', 1, '7a03b5f9-ce00-462a-8709-4b8a41bd5c6c', 'news', 'sergey-isakhanyan-C8r8Tqvr2Mg-unsplash', 'NQIsjWNDvlEVw8d23qqQIVo1vCn7yM-metac2VyZ2V5LWlzYWtoYW55YW4tQzhyOFRxdnIyTWctdW5zcGxhc2guanBn-.jpg', 'image/jpeg', 'public', 'public', 379620, '[]', '[]', '{\"news\": true, \"newsWebp\": true}', '[]', 3, '2022-12-03 02:36:20', '2022-12-03 02:36:21'),
(44, 'App\\Models\\Post', 1, 'd6b48ff8-0c8f-4122-b226-0d0c5f3e1ad4', 'news', 'sergey-isakhanyan-C8r8Tqvr2Mg-unsplash', '5oob3ssqBDL4O08iwms0SzCitIeSCU-metac2VyZ2V5LWlzYWtoYW55YW4tQzhyOFRxdnIyTWctdW5zcGxhc2guanBn-.jpg', 'image/jpeg', 'public', 'public', 379620, '[]', '[]', '{\"news\": true, \"newsWebp\": true}', '[]', 4, '2022-12-03 03:29:32', '2022-12-03 03:29:33');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_29_072434_create_rooms_table', 2),
(6, '2022_11_29_073202_create_categories_table', 2),
(7, '2022_11_29_073314_create_comments_table', 2),
(8, '2022_11_29_073659_add_field_to_comments_table', 3),
(9, '2022_11_29_083826_create_media_table', 4),
(10, '2022_11_29_112620_add_field_to_comments_table', 5),
(13, '2022_11_29_120331_create_ratings_table', 6),
(14, '2022_11_29_140124_change_column_type_in_rooms_table', 7),
(15, '2022_12_02_054135_create_contacts_table', 8),
(16, '2022_12_02_155755_create_seo_table', 9),
(20, '2022_12_02_162019_create_rooms_pages_table', 10),
(26, '2022_12_02_202614_create_posts_table', 11);

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('djtresk@gmail.com', '$2y$10$9ZDzcZ.nvucRUHeq3BPwd..Jcl118IIXbi6d3AoK7zYETd9U46Or2', '2022-12-03 04:23:20');

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `excerpt`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'На горнолыжном курорте «Шерегеш» построят еще один отель', 'na-gornolyznom-kurorte-sereges-postroiat-eshhe-odin-otel', '<p>Объект расположится в секторе «А». Номерной фонд гостиницы будет насчитывать 120 номеров. Также на территории отеля построят бассейн и спа-комплекс. Ввод в эксплуатацию запланирован в 2026 году. Проект реализует компания «Сибшахтострой». Такую информацию представителям СМИ сообщили в департаменте информационной политики правительства Кемеровской области.</p><p>Дополнительно сообщается, что в соответствии с соглашением, заключенным с властями региона, компания «Сибшахтострой» построила на курорте «Шерегеш» веревочный парк. Также в планах значится строительство картингового центра. Отметим, что компания «Сибшахтострой» управляет двумя отелями категории «4 звезды», расположенными на этом курорте.</p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;7152.jpg&quot;,&quot;filesize&quot;:159100,&quot;height&quot;:800,&quot;href&quot;:&quot;http://arena.test/storage/BZVubwdnQRZUHEXwHdlsqOVmZ7lJ41iutnUjNg1U.jpg&quot;,&quot;url&quot;:&quot;http://arena.test/storage/BZVubwdnQRZUHEXwHdlsqOVmZ7lJ41iutnUjNg1U.jpg&quot;,&quot;width&quot;:1200}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://arena.test/storage/BZVubwdnQRZUHEXwHdlsqOVmZ7lJ41iutnUjNg1U.jpg\"><img src=\"http://arena.test/storage/BZVubwdnQRZUHEXwHdlsqOVmZ7lJ41iutnUjNg1U.jpg\" width=\"1200\" height=\"800\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">7152.jpg</span> <span class=\"attachment__size\">155.37 KB</span></figcaption></a></figure></p><p>«Шерегеш» является одним из наиболее популярных горнолыжных курортов в Сибири. В настоящее время общая емкость номерного фонда составляет около 4 300 мест (входят как коллективные средства размещения, так и частное жилье в посуточной аренде). В соответствии с прогнозом специалистов корпорации «Туризм.РФ» из-за увеличение туристического потока к 2030 году потребуется построить более 3 500 номеров для размещения гостей.</p>', 'Объект расположится в секторе «А». Номерной фонд гостиницы будет насчитывать 120 номеров. Также на территории отеля построят бассейн и спа-комплекс.', '2022-12-03 04:26:00', '2022-12-03 03:29:32', '2022-12-03 04:25:18');

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `comment`, `rateable_type`, `rateable_id`) VALUES
(3, '2022-12-02 14:31:35', '2022-12-02 14:31:35', 5, NULL, 'App\\Models\\Comment', 5),
(4, '2022-12-02 14:33:51', '2022-12-02 14:33:51', 3, NULL, 'App\\Models\\Comment', 6),
(5, '2022-12-02 14:34:41', '2022-12-02 14:34:41', 1, NULL, 'App\\Models\\Comment', 7),
(6, '2022-12-02 14:36:13', '2022-12-02 14:36:13', 4, NULL, 'App\\Models\\Comment', 8),
(7, '2022-12-02 14:37:59', '2022-12-02 14:37:59', 5, NULL, 'App\\Models\\Comment', 9),
(8, '2022-12-03 03:47:32', '2022-12-03 03:47:32', 5, NULL, 'App\\Models\\Comment', 10),
(9, '2022-12-03 03:56:05', '2022-12-03 03:56:05', 4, NULL, 'App\\Models\\Comment', 11),
(10, '2022-12-03 05:09:10', '2022-12-03 05:09:10', 2, NULL, 'App\\Models\\Comment', 12),
(11, '2022-12-03 05:10:59', '2022-12-03 05:10:59', 5, NULL, 'App\\Models\\Comment', 13);

INSERT INTO `rooms` (`id`, `name`, `description`, `price`, `facilities`, `seo_title`, `seo_description`, `seo_image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Номер «Стандарт»', 'Одноместное размещение', '2500₽ за ночь', '[{\"facilities\": \"Двухспальная кровать\"}, {\"facilities\": \"Жидкое мыло\"}]', 'Стандартный номер в гостинице «Арена»', 'Гостиничный номер стоимостью  2500₽ за ночь в Тюмени. Одноместное размещение.', NULL, 1, '2022-11-29 08:15:39', '2022-11-29 14:17:50'),
(2, 'Номер «Полу-люкс»', 'Двухместное размещение', '4500₽ за ночь', '[{\"facilities\": \"Кровать\"}]', NULL, NULL, NULL, 2, '2022-11-29 14:19:32', '2022-11-29 14:19:32'),
(3, 'Номер «Стандарт»', 'Двухместное размещение', '2800₽ за ночь', '[{\"facilities\": \"Телевизор\"}]', NULL, NULL, NULL, 1, '2022-12-02 10:15:23', '2022-12-02 10:15:23');

INSERT INTO `rooms_pages` (`id`, `page_title`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(23, 'Все номера', 'Типы гостиничных номеров', 'Онлайн бронирование номеров в Тюмени. Гостиничные номера от 2500₽ за сутки. ', '2022-12-02 19:53:13', '2022-12-02 20:08:42');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `is_editor`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tresk', 'djtresk@gmail.com', '2022-11-30 00:00:00', '$2y$10$26.LaBPQu1U01UswPZZUnuX8eDFYyi8FLorx0oSbLk2rCcgXE/bC2', 1, 1, 'Lpi2Md6pq16CuYEgtbCCC1J6WPFKeC-metaRFNDMDUxMTIuanBn-.jpg', 'jTrbnYnJDvGlHHymRLLPdstonwL1ri5SqQedA1KEKYLha7RjNrjhqDL1UIK7', '2022-11-29 07:21:29', '2022-12-03 04:09:14');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;