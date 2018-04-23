-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 03:46 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balcony`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `address` text,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `image`, `channel`, `name`, `gender`, `email`, `phone_number`, `address`, `username`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, NULL, NULL, NULL, NULL, 'lukman@gmail.com', NULL, NULL, 'lukman', '$2y$10$/meYiRiaixwquqhbyqq7veHx9qX/oV3qLC2f74z0T1hOXkQ/1T4gO', NULL, NULL, '2018-02-26 19:20:22', '2018-02-26 19:20:22', NULL),
(7, NULL, NULL, NULL, NULL, 'lukmanfrdas@gmail.com', NULL, NULL, 'lukman', '$2y$10$m0RYIRzvd4kb1pwjtpB.XOXtq0ZvDHZQ5VEKVLcgTCK3TEM0BzaAK', 'user_pages/20180303144821/DzNVngdnbz7w1p0w1J9cTYRSEtgInUzBPAtHiqL3.jpeg', NULL, '2018-03-03 07:32:40', '2018-03-03 07:48:21', NULL),
(8, 'user_pages/20180303161406/6VQ9Y2NUI67lczhs4d203CNmGP8bBToiuVFXUrdY.jpeg', 'udud dulu', 'Davi Ciawi', NULL, 'davirmd19@gmail.com', '087777284664', NULL, 'davi', '$2y$10$iy7rwpjZ0G6d/5lNRzBBbebyFJPeRtfmlgsvGM1B/vXLi9uCOLIiO', 'user_pages/20180303162625/ynggZ2mlGfBP7sW6U7UCq2LcpXvyQpWvFEBBMTvr.png', NULL, '2018-03-03 08:37:13', '2018-03-03 09:26:25', NULL),
(9, 'user_pages/20180303154313/SstdBJG0YB6m0w60P1hNPu0s5ykUkfRBQN8MIvKR.jpeg', 'dddd', 'Davi Ciawi', 'laki-laki', 'davi@gmail.com', '087777284664', NULL, 'davi', '$2y$10$PFkvt7eki.WZl3X.sGSePejp8cUxSj/64b1KDFLxWHptrqrr86PVe', 'user_pages/avatars/default.jpg', NULL, '2018-03-03 08:42:28', '2018-03-03 08:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_id`, `channel_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 40, 8, 'dasasdasdasd', '2018-03-03 09:58:19', '2018-03-03 09:58:19', NULL),
(10, 40, 8, 'ghjhgvj', '2018-03-03 10:01:18', '2018-03-03 10:01:18', NULL),
(11, 40, 8, 'dasdsadsadasdasdsadas', '2018-03-03 10:02:32', '2018-03-03 10:02:32', NULL),
(12, 42, 8, 'asdf', '2018-03-03 10:27:09', '2018-03-03 10:27:09', NULL),
(13, 42, 8, 'asdfs', '2018-03-03 10:27:26', '2018-03-03 10:27:26', NULL),
(14, 42, 8, 'asdfs', '2018-03-03 10:27:40', '2018-03-03 10:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `content_category_id` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `subtitle` text,
  `content_preview` text,
  `content` text,
  `slug` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE `content_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_categories`
--

INSERT INTO `content_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Komputer', '2018-02-27 02:35:55', '2018-02-27 02:35:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_comments`
--

CREATE TABLE `content_comments` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content_medias`
--

CREATE TABLE `content_medias` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `type_media` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content_tags`
--

CREATE TABLE `content_tags` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `disbursements`
--

CREATE TABLE `disbursements` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'afd', '<p>asfsadf</p>', '2018-03-03 21:37:40', '2018-03-03 21:37:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `video_id` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `channel_id`, `video_id`, `sort`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 9, 42, NULL, '::1', '2018-03-03 09:04:57', '2018-03-03 09:04:57', NULL),
(33, 8, 42, NULL, '::1', '2018-03-03 09:27:13', '2018-03-03 09:27:13', NULL),
(35, NULL, 42, NULL, '::1', '2018-03-03 15:29:13', '2018-03-03 15:29:13', NULL),
(39, NULL, 40, NULL, '::1', '2018-03-03 15:29:46', '2018-03-03 15:29:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `looks`
--

CREATE TABLE `looks` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `looks`
--

INSERT INTO `looks` (`id`, `video_id`, `ip`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 42, '::1', '6', '2018-03-03 09:04:58', '2018-03-03 09:04:58', NULL),
(14, 40, '::1', '6', '2018-03-03 15:29:36', '2018-03-03 15:29:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loves`
--

CREATE TABLE `loves` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `url`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'videos', 'Video', 'icon-diamond', '2018-02-25 19:46:48', '2018-02-25 19:46:48', NULL),
(2, NULL, 'content_blogs', 'Content', 'icon-diamond', '2018-02-25 19:47:10', '2018-02-25 19:47:10', NULL),
(3, NULL, 'channels', 'Channel', 'icon-diamond', '2018-02-25 19:47:42', '2018-02-25 19:47:42', NULL),
(4, NULL, 'content_categories', 'Kategori Content', 'icon-diamond', '2018-02-25 19:48:01', '2018-02-25 19:48:01', NULL),
(5, NULL, 'video_categories', 'Kategori Video', 'icon-diamond', '2018-02-25 19:48:25', '2018-02-25 19:48:25', NULL),
(6, NULL, 'banners', 'Banner', 'icon-diamond', '2018-02-27 00:26:06', '2018-02-27 00:26:06', NULL),
(9, NULL, 'roles', 'Role', 'icon-diamond', '2018-02-27 00:28:01', '2018-02-27 00:28:01', NULL),
(10, NULL, 'users', 'User', 'icon-diamond', '2018-02-27 00:32:52', '2018-02-27 00:32:52', NULL),
(11, NULL, 'settings', 'Setting', 'icon-diamond', '2018-02-27 00:34:15', '2018-02-27 00:34:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_details`
--

CREATE TABLE `playlist_details` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_look`
-- (See below for the actual view)
--
CREATE TABLE `query_look` (
`id` int(11)
,`channel_id` int(11)
,`video_category_id` int(11)
,`title` varchar(255)
,`image` varchar(255)
,`path` varchar(255)
,`description` text
,`created_at` timestamp
,`updated_at` timestamp
,`deleted_at` datetime
,`count_looks` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_love`
-- (See below for the actual view)
--
CREATE TABLE `query_love` (
`id` int(11)
,`channel_id` int(11)
,`video_category_id` int(11)
,`title` varchar(255)
,`image` varchar(255)
,`path` varchar(255)
,`description` text
,`created_at` timestamp
,`updated_at` timestamp
,`deleted_at` datetime
,`count_love` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Admin', '2018-02-25 20:00:32', '2018-02-25 20:00:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_menus`
--

CREATE TABLE `role_menus` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_menus`
--

INSERT INTO `role_menus` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(41, 1, 1, NULL, NULL, NULL),
(42, 1, 2, NULL, NULL, NULL),
(43, 1, 3, NULL, NULL, NULL),
(44, 1, 4, NULL, NULL, NULL),
(45, 1, 5, NULL, NULL, NULL),
(46, 1, 6, NULL, NULL, NULL),
(47, 1, 9, NULL, NULL, NULL),
(48, 1, 10, NULL, NULL, NULL),
(49, 1, 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(45) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'look', '6', 'text', NULL, '2018-02-28 02:34:21', NULL),
(2, 'love', '12', 'text', NULL, '2018-02-28 02:34:21', NULL),
(3, 'minimum income', '100000', 'text', NULL, NULL, NULL),
(4, 'subcribe', '6', 'text', NULL, NULL, NULL),
(5, 'pagging_index_playlist', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(6, 'pagging_index_trending', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(7, 'pagging_index_popular', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(8, 'pagging_tending', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(9, 'pagging_history', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(10, 'pagging_news', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(11, 'pagging_articel', '6', 'number', NULL, '2018-03-01 03:43:38', NULL),
(12, 'pagging_search', '0', 'number', NULL, '2018-03-01 03:43:38', NULL),
(13, 'pagging_video_detail', '0', 'number', NULL, '2018-03-01 03:43:38', NULL),
(14, 'pagging_update_news', '0', 'number', NULL, '2018-03-03 17:54:39', NULL),
(15, 'pagging_update_article', '0', 'number', NULL, '2018-03-03 17:55:13', NULL),
(16, 'pagging_popular', '0', 'number', NULL, '2018-03-03 18:07:08', NULL),
(17, 'pagging_channel_upload', '0', 'number', NULL, '2018-03-03 18:09:07', NULL),
(18, 'pagging_channel_upload_popular', '0', 'number', NULL, '2018-03-03 18:09:40', NULL),
(19, 'pagging_channel_playlist', '0', 'number', NULL, '2018-03-03 18:10:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcribes`
--

CREATE TABLE `subcribes` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcribes`
--

INSERT INTO `subcribes` (`id`, `from_id`, `to_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 9, 8, NULL, '2018-03-03 09:07:59', '2018-03-03 09:07:59', NULL),
(13, 8, 8, NULL, '2018-03-03 10:59:52', '2018-03-03 10:59:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'komputer', '2018-02-27 02:43:09', '2018-02-27 02:43:09', NULL),
(2, 'komputer', '2018-02-27 02:43:27', '2018-02-27 02:43:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'lukman', '$2y$10$y206roSg7lEd86U3V9esB.rpXOBJq0V.tF/GaIhVc4recEP5Xbep2', NULL, '2018-02-21 06:13:56', '2018-02-21 06:13:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `video_category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `channel_id`, `video_category_id`, `title`, `image`, `path`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 8, 1, 'aaaa', NULL, '/uploads/20180303153822/10000000_179840455928783_6871422991805186048_n.mp4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore', '2018-03-03 08:38:22', '2018-03-03 08:40:55', NULL),
(41, 8, 1, 'bbbb', NULL, '/uploads/20180303153946/22648785_366727037106089_6224473751635886080_n.mp4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore', '2018-03-03 08:39:46', '2018-03-03 08:41:21', NULL),
(42, 8, 1, 'cccc', 'user_pages/20180303154036/ATzpqz2aIPEjbJyTXTOv8l3g9BcyVLh49EgbBqDw.png', '/uploads/20180303154016/ksZpvAloXKQgN5VisaJLEl31zRshjNxdrgB9nAtY (1).mp4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore', '2018-03-03 08:40:16', '2018-03-03 08:40:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `query_look`
--
DROP TABLE IF EXISTS `query_look`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_look`  AS  select `videos`.`id` AS `id`,`videos`.`channel_id` AS `channel_id`,`videos`.`video_category_id` AS `video_category_id`,`videos`.`title` AS `title`,`videos`.`image` AS `image`,`videos`.`path` AS `path`,`videos`.`description` AS `description`,`videos`.`created_at` AS `created_at`,`videos`.`updated_at` AS `updated_at`,`videos`.`deleted_at` AS `deleted_at`,(select count(`looks`.`id`) from `looks` where (`looks`.`video_id` = `videos`.`id`)) AS `count_looks` from `videos` where isnull(`videos`.`deleted_at`) ;

-- --------------------------------------------------------

--
-- Structure for view `query_love`
--
DROP TABLE IF EXISTS `query_love`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_love`  AS  select `videos`.`id` AS `id`,`videos`.`channel_id` AS `channel_id`,`videos`.`video_category_id` AS `video_category_id`,`videos`.`title` AS `title`,`videos`.`image` AS `image`,`videos`.`path` AS `path`,`videos`.`description` AS `description`,`videos`.`created_at` AS `created_at`,`videos`.`updated_at` AS `updated_at`,`videos`.`deleted_at` AS `deleted_at`,(select count(`loves`.`id`) from `loves` where (`loves`.`video_id` = `videos`.`id`)) AS `count_love` from `videos` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_videos1_idx` (`video_id`),
  ADD KEY `fk_comments_users1_idx` (`channel_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contents_content_categories1_idx` (`content_category_id`);

--
-- Indexes for table `content_categories`
--
ALTER TABLE `content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_comments`
--
ALTER TABLE `content_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users1_idx` (`channel_id`),
  ADD KEY `fk_content_comments_contents1_idx` (`content_id`);

--
-- Indexes for table `content_medias`
--
ALTER TABLE `content_medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_content_medias_contents1_idx` (`content_id`);

--
-- Indexes for table `content_tags`
--
ALTER TABLE `content_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_content_tags_tags1_idx` (`tag_id`),
  ADD KEY `fk_content_tags_contents1_idx` (`content_id`);

--
-- Indexes for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disbursements_channels1_idx` (`channel_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loves_videos1_idx` (`video_id`),
  ADD KEY `fk_loves_channels1_idx` (`channel_id`);

--
-- Indexes for table `looks`
--
ALTER TABLE `looks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_looks_videos1_idx` (`video_id`);

--
-- Indexes for table `loves`
--
ALTER TABLE `loves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loves_videos1_idx` (`video_id`),
  ADD KEY `fk_loves_channels1_idx` (`channel_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_menus1_idx` (`parent_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_playlists_channels1_idx` (`channel_id`);

--
-- Indexes for table `playlist_details`
--
ALTER TABLE `playlist_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_playlist_details_playlists1_idx` (`playlist_id`),
  ADD KEY `fk_playlist_details_videos1_idx` (`video_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_menus_roles1_idx` (`role_id`),
  ADD KEY `fk_role_menus_menus1_idx` (`menu_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribes`
--
ALTER TABLE `subcribes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcribes_users1_idx` (`from_id`),
  ADD KEY `fk_subcribes_users2_idx` (`to_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles1_idx` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_users_idx` (`channel_id`),
  ADD KEY `fk_videos_video_categories1_idx` (`video_category_id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_categories`
--
ALTER TABLE `content_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content_comments`
--
ALTER TABLE `content_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_medias`
--
ALTER TABLE `content_medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_tags`
--
ALTER TABLE `content_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disbursements`
--
ALTER TABLE `disbursements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `loves`
--
ALTER TABLE `loves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `playlist_details`
--
ALTER TABLE `playlist_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subcribes`
--
ALTER TABLE `subcribes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_videos1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `fk_contents_content_categories1` FOREIGN KEY (`content_category_id`) REFERENCES `content_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content_comments`
--
ALTER TABLE `content_comments`
  ADD CONSTRAINT `fk_comments_users10` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_content_comments_contents1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content_medias`
--
ALTER TABLE `content_medias`
  ADD CONSTRAINT `fk_content_medias_contents1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content_tags`
--
ALTER TABLE `content_tags`
  ADD CONSTRAINT `fk_content_tags_contents1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_content_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD CONSTRAINT `fk_disbursements_channels1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `fk_loves_channels10` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_loves_videos10` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `looks`
--
ALTER TABLE `looks`
  ADD CONSTRAINT `fk_looks_videos1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loves`
--
ALTER TABLE `loves`
  ADD CONSTRAINT `fk_loves_channels1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_loves_videos1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menus_menus1` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `fk_playlists_channels1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `playlist_details`
--
ALTER TABLE `playlist_details`
  ADD CONSTRAINT `fk_playlist_details_playlists1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_playlist_details_videos1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_menus`
--
ALTER TABLE `role_menus`
  ADD CONSTRAINT `fk_role_menus_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_menus_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcribes`
--
ALTER TABLE `subcribes`
  ADD CONSTRAINT `fk_subcribes_users1` FOREIGN KEY (`from_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subcribes_users2` FOREIGN KEY (`to_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_users` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videos_video_categories1` FOREIGN KEY (`video_category_id`) REFERENCES `video_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
balcony