-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 16, 2019 lúc 07:37 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sgf_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-10-07 15:13:10', '2019-10-07 15:13:10', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, 'post-trashed', '', '', 0, 0),
(2, 7, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 08:42:20', '2019-10-09 08:42:20', 'yttyty', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(3, 7, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 08:43:55', '2019-10-09 08:43:55', 'assadasdasd', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(4, 6, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 09:39:21', '2019-10-09 09:39:21', 'drrtretert', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(5, 6, 'khangdua', 'sfvdfsdfsdf@gmail.com', 'http://sdfsdf', '::1', '2019-10-09 09:40:34', '2019-10-09 09:40:34', 'dfdf', 0, '0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 0),
(6, 65, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-14 09:03:09', '2019-10-14 09:03:09', 'sdfsdfsdf', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(7, 77, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-14 09:04:08', '2019-10-14 09:04:08', 'sdfgsfsf', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(8, 6, 'asdas', 'asa@gmail.com', 'http://adfasdasd.com', '::1', '2019-10-16 06:58:08', '2019-10-16 06:58:08', 'asdasd', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '', 0, 0),
(9, 6, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-16 07:01:09', '2019-10-16 07:01:09', 'adasd', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_actions`
--

DROP TABLE IF EXISTS `wp_ig_actions`;
CREATE TABLE IF NOT EXISTS `wp_ig_actions` (
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `count` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `link_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `list_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`contact_id`,`message_id`,`campaign_id`,`type`,`link_id`,`list_id`),
  KEY `contact_id` (`contact_id`),
  KEY `message_id` (`message_id`),
  KEY `campaign_id` (`campaign_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_blocked_emails`
--

DROP TABLE IF EXISTS `wp_ig_blocked_emails`;
CREATE TABLE IF NOT EXISTS `wp_ig_blocked_emails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_campaigns`
--

DROP TABLE IF EXISTS `wp_ig_campaigns`;
CREATE TABLE IF NOT EXISTS `wp_ig_campaigns` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `from_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci,
  `list_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_template_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `meta` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `base_template_id` (`base_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_campaigns`
--

INSERT INTO `wp_ig_campaigns` (`id`, `slug`, `name`, `type`, `parent_id`, `parent_type`, `subject`, `body`, `from_name`, `from_email`, `reply_to_name`, `reply_to_email`, `categories`, `list_ids`, `base_template_id`, `status`, `meta`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'welcome-to-email-subscribers', 'Welcome To Email Subscribers', 'newsletter', NULL, NULL, NULL, '', 'SeaGames Football', 'buihuuthang199@gmail.com', 'SeaGames Football', 'buihuuthang199@gmail.com', '', '1', 88, 1, NULL, '2019-10-14 09:33:09', NULL, NULL),
(2, 'new-post-published-posttitle', 'New Post Published - {{POSTTITLE}}', 'post_notification', NULL, NULL, NULL, '', 'buihuuthang199@gmail.com', 'SeaGames Football', 'buihuuthang199@gmail.com', 'SeaGames Football', '##3##2##4##1##5##', '1', 89, 1, NULL, '2019-10-14 09:33:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_contactmeta`
--

DROP TABLE IF EXISTS `wp_ig_contactmeta`;
CREATE TABLE IF NOT EXISTS `wp_ig_contactmeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `contact_id` (`contact_id`),
  KEY `meta_ley` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_contacts`
--

DROP TABLE IF EXISTS `wp_ig_contacts`;
CREATE TABLE IF NOT EXISTS `wp_ig_contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wp_user_id` int(10) NOT NULL DEFAULT '0',
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `is_disposable` tinyint(1) DEFAULT '0',
  `is_rolebased` tinyint(1) DEFAULT '0',
  `is_webmail` tinyint(1) DEFAULT '0',
  `is_deliverable` tinyint(1) DEFAULT '0',
  `is_sendsafely` tinyint(1) DEFAULT '0',
  `meta` longtext CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  KEY `wp_user_id` (`wp_user_id`),
  KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_contacts`
--

INSERT INTO `wp_ig_contacts` (`id`, `wp_user_id`, `first_name`, `last_name`, `email`, `source`, `form_id`, `status`, `unsubscribed`, `hash`, `created_at`, `updated_at`, `is_verified`, `is_disposable`, `is_rolebased`, `is_webmail`, `is_deliverable`, `is_sendsafely`, `meta`) VALUES
(1, 1, 'buihuuthang199@gmail.com', '', 'buihuuthang199@gmail.com', 'admin', 0, 'verified', 0, 'ihdyva-lrzjch-movnuh-cdliet-kaomjp', '2019-10-14 09:30:49', '0000-00-00 00:00:00', 1, 0, 0, 0, 1, 1, ''),
(2, 0, 'buihuuthang199', '', 'buihuuthang199@gmail.com', 'admin', 0, 'verified', 0, 'diebjm-vxhwcj-udogqb-ugdvpl-ablrzx', '2019-10-14 09:33:08', '0000-00-00 00:00:00', 1, 0, 0, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_contacts_ips`
--

DROP TABLE IF EXISTS `wp_ig_contacts_ips`;
CREATE TABLE IF NOT EXISTS `wp_ig_contacts_ips` (
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`created_on`,`ip`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_contact_meta`
--

DROP TABLE IF EXISTS `wp_ig_contact_meta`;
CREATE TABLE IF NOT EXISTS `wp_ig_contact_meta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact_id` bigint(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `contact_id` (`contact_id`),
  KEY `meta_ley` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_forms`
--

DROP TABLE IF EXISTS `wp_ig_forms`;
CREATE TABLE IF NOT EXISTS `wp_ig_forms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `settings` longtext COLLATE utf8mb4_unicode_ci,
  `styles` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `af_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_forms`
--

INSERT INTO `wp_ig_forms` (`id`, `name`, `body`, `settings`, `styles`, `created_at`, `updated_at`, `deleted_at`, `af_id`) VALUES
(1, 'First Form', 'a:4:{i:0;a:5:{s:4:\"type\";s:4:\"text\";s:4:\"name\";s:4:\"Name\";s:2:\"id\";s:4:\"name\";s:6:\"params\";a:3:{s:5:\"label\";s:0:\"\";s:4:\"show\";b:0;s:8:\"required\";b:0;}s:8:\"position\";i:1;}i:1;a:5:{s:4:\"type\";s:4:\"text\";s:4:\"name\";s:5:\"Email\";s:2:\"id\";s:5:\"email\";s:6:\"params\";a:3:{s:5:\"label\";s:52:\"Nhập email để nhận thông báo tin mới.....\";s:4:\"show\";b:1;s:8:\"required\";b:1;}s:8:\"position\";i:2;}i:2;a:5:{s:4:\"type\";s:8:\"checkbox\";s:4:\"name\";s:5:\"Lists\";s:2:\"id\";s:5:\"lists\";s:6:\"params\";a:4:{s:5:\"label\";s:5:\"Lists\";s:4:\"show\";b:0;s:8:\"required\";b:1;s:6:\"values\";a:1:{i:0;s:1:\"2\";}}s:8:\"position\";i:3;}i:3;a:5:{s:4:\"type\";s:6:\"submit\";s:4:\"name\";s:6:\"submit\";s:2:\"id\";s:6:\"submit\";s:6:\"params\";a:3:{s:5:\"label\";s:10:\"Đăng ký\";s:4:\"show\";b:1;s:8:\"required\";b:1;}s:8:\"position\";i:4;}}', 'a:2:{s:5:\"lists\";a:1:{i:0;s:1:\"2\";}s:4:\"desc\";s:0:\"\";}', NULL, '2019-10-14 09:30:50', '2019-10-16 06:46:48', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_links`
--

DROP TABLE IF EXISTS `wp_ig_links`;
CREATE TABLE IF NOT EXISTS `wp_ig_links` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message_id` int(10) UNSIGNED NOT NULL,
  `campaign_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id` (`campaign_id`),
  KEY `message_id` (`message_id`),
  KEY `link` (`link`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_lists`
--

DROP TABLE IF EXISTS `wp_ig_lists`;
CREATE TABLE IF NOT EXISTS `wp_ig_lists` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_lists`
--

INSERT INTO `wp_ig_lists` (`id`, `slug`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'Test', '2019-10-14 09:30:49', NULL, NULL),
(2, 'main', 'Main', '2019-10-14 09:30:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_lists_contacts`
--

DROP TABLE IF EXISTS `wp_ig_lists_contacts`;
CREATE TABLE IF NOT EXISTS `wp_ig_lists_contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `list_id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optin_type` tinyint(4) NOT NULL,
  `subscribed_at` datetime DEFAULT NULL,
  `subscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_at` datetime DEFAULT NULL,
  `unsubscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_lists_contacts`
--

INSERT INTO `wp_ig_lists_contacts` (`id`, `list_id`, `contact_id`, `status`, `optin_type`, `subscribed_at`, `subscribed_ip`, `unsubscribed_at`, `unsubscribed_ip`) VALUES
(1, 1, 1, 'subscribed', 1, '2019-10-14 09:30:50', '', NULL, NULL),
(2, 2, 1, 'subscribed', 1, '2019-10-14 09:30:50', '', NULL, NULL),
(3, 1, 2, 'subscribed', 1, '2019-10-14 09:33:08', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_mailing_queue`
--

DROP TABLE IF EXISTS `wp_ig_mailing_queue`;
CREATE TABLE IF NOT EXISTS `wp_ig_mailing_queue` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `meta` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_mailing_queue`
--

INSERT INTO `wp_ig_mailing_queue` (`id`, `hash`, `campaign_id`, `subject`, `body`, `count`, `status`, `start_at`, `finish_at`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'xjsqnt-ospwlz-ywzrsl-dwocfl-akgzti', 1, 'Welcome To Email Subscribers', '<strong style=\"color: #990000\">What can you achieve using Email Subscribers?</strong><p>Add subscription forms on website, send HTML newsletters & automatically notify subscribers about new blog posts once it is published. You can also Import or Export subscribers from any list to Email Subscribers.</p> <strong style=\"color: #990000\">Plugin Features</strong><ol> <li>Send notification emails to subscribers when new blog posts are published.</li> <li>Subscribe form available with 3 options to setup.</li> <li>Double Opt-In and Single Opt-In support.</li> <li>Email notification to admin when a new user signs up (Optional).</li> <li>Automatic welcome email to subscriber.</li> <li>Auto add unsubscribe link in the email.</li> <li>Import/Export subscriber emails to migrate to any lists.</li> <li>Default WordPress editor to create emails.</li> </ol> <strong>Thanks & Regards,</strong><br>Admin', 2, 'Sent', '2019-10-14 09:33:09', '2019-10-14 09:33:16', NULL, '2019-10-14 09:33:09', '2019-10-14 09:33:09'),
(2, 'duqnkp-pnxegb-mzwdfi-apbcxu-wfkzai', 2, 'New Post Published - CH Czech 2-1 Anh', '<p>Hello {{NAME}},</p>\n<p>We have published a new blog article on our website : CH Czech 2-1 Anh<br />\n<a href=\'http://localhost/seagamefootball/ch-czech-2-1-anh/\' target=\'_blank\'><img width=\"150\" height=\"150\" src=\"http://localhost/seagamefootball/wp-content/uploads/2019/10/HLANH-150x150.jpg\" class=\"attachment-thumbnail size-thumbnail wp-post-image\" alt=\"\" /></a></p>\n<p>You can view it from this link : <a href=\'http://localhost/seagamefootball/ch-czech-2-1-anh/\' target=\'_blank\'>http://localhost/seagamefootball/ch-czech-2-1-anh/</a></p>\n<p>Thanks &#038; Regards,<br />\nAdmin</p>\n<p>You received this email because in the past you have provided us your email address : {{EMAIL}} to receive notifications when new updates are posted.</p>\n', 2, 'Sent', '2019-10-14 09:33:17', '2019-10-14 09:33:20', NULL, '2019-10-14 09:33:17', '2019-10-14 09:33:17'),
(3, 'phqvxj-qnvmax-vhqybg-zehqrs-uptald', 2, 'New Post Published - hfghfg', '<p>Hello {{NAME}},</p>\n<p>We have published a new blog article on our website : hfghfg</p>\n<p>You can view it from this link : <a href=\'http://localhost/seagamefootball/hfghfg/\' target=\'_blank\'>http://localhost/seagamefootball/hfghfg/</a></p>\n<p>Thanks &#038; Regards,<br />\nAdmin</p>\n<p>You received this email because in the past you have provided us your email address : {{EMAIL}} to receive notifications when new updates are posted.</p>\n', 2, 'Sent', '2019-10-14 09:41:03', '2019-10-14 09:41:27', 'a:2:{s:7:\"post_id\";i:90;s:4:\"type\";s:17:\"post_notification\";}', '2019-10-14 09:39:49', '2019-10-14 09:39:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_queue`
--

DROP TABLE IF EXISTS `wp_ig_queue`;
CREATE TABLE IF NOT EXISTS `wp_ig_queue` (
  `contact_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `campaign_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `requeued` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `added` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `timestamp` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sent_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priority` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `count` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `error` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ignore_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `options` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`contact_id`,`campaign_id`,`requeued`,`options`),
  KEY `contact_id` (`contact_id`),
  KEY `campaign_id` (`campaign_id`),
  KEY `requeued` (`requeued`),
  KEY `timestamp` (`timestamp`),
  KEY `priority` (`priority`),
  KEY `count` (`count`),
  KEY `error` (`error`),
  KEY `ignore_status` (`ignore_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_ig_sending_queue`
--

DROP TABLE IF EXISTS `wp_ig_sending_queue`;
CREATE TABLE IF NOT EXISTS `wp_ig_sending_queue` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mailing_queue_id` int(10) NOT NULL DEFAULT '0',
  `mailing_queue_hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `contact_id` int(10) NOT NULL DEFAULT '0',
  `contact_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` longtext COLLATE utf8mb4_unicode_ci,
  `opened` int(1) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `opened_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_ig_sending_queue`
--

INSERT INTO `wp_ig_sending_queue` (`id`, `mailing_queue_id`, `mailing_queue_hash`, `campaign_id`, `contact_id`, `contact_hash`, `email`, `status`, `links`, `opened`, `sent_at`, `opened_at`) VALUES
(1, 1, 'xjsqnt-ospwlz-ywzrsl-dwocfl-akgzti', 1, 1, 'ihdyva-lrzjch-movnuh-cdliet-kaomjp', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:33:16', '0000-00-00 00:00:00'),
(2, 1, 'xjsqnt-ospwlz-ywzrsl-dwocfl-akgzti', 1, 2, 'diebjm-vxhwcj-udogqb-ugdvpl-ablrzx', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:33:16', '0000-00-00 00:00:00'),
(3, 2, 'duqnkp-pnxegb-mzwdfi-apbcxu-wfkzai', 2, 1, 'ihdyva-lrzjch-movnuh-cdliet-kaomjp', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:33:20', '0000-00-00 00:00:00'),
(4, 2, 'duqnkp-pnxegb-mzwdfi-apbcxu-wfkzai', 2, 2, 'diebjm-vxhwcj-udogqb-ugdvpl-ablrzx', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:33:20', '0000-00-00 00:00:00'),
(5, 3, 'phqvxj-qnvmax-vhqybg-zehqrs-uptald', 2, 1, 'ihdyva-lrzjch-movnuh-cdliet-kaomjp', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:41:24', '0000-00-00 00:00:00'),
(6, 3, 'phqvxj-qnvmax-vhqybg-zehqrs-uptald', 2, 2, 'diebjm-vxhwcj-udogqb-ugdvpl-ablrzx', 'buihuuthang199@gmail.com', 'Sent', '', 0, '2019-10-14 09:41:24', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
