-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2019 lúc 02:48 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

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
-- Cấu trúc bảng cho bảng `pool_wp_bonusquestions`
--

CREATE TABLE `pool_wp_bonusquestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL DEFAULT '',
  `points` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `answer_before_date` datetime NOT NULL,
  `score_date` datetime DEFAULT NULL,
  `match_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_bonusquestions_type`
--

CREATE TABLE `pool_wp_bonusquestions_type` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `options` text NOT NULL,
  `image` text NOT NULL,
  `max_answers` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_bonusquestions_useranswers`
--

CREATE TABLE `pool_wp_bonusquestions_useranswers` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `answer` text NOT NULL,
  `correct` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_groups`
--

CREATE TABLE `pool_wp_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_groups`
--

INSERT INTO `pool_wp_groups` (`id`, `name`) VALUES
(1, 'Bảng Xếp Hạng ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_leagues`
--

CREATE TABLE `pool_wp_leagues` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_defined` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `image` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_leagues`
--

INSERT INTO `pool_wp_leagues` (`id`, `name`, `user_defined`, `image`) VALUES
(1, 'all users', 0, ''),
(2, 'for money', 1, '//localhost/seagamefootball/wp-content/plugins/football-pool/assets/images/league-money-green.png'),
(3, 'for free', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_league_users`
--

CREATE TABLE `pool_wp_league_users` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `league_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_matches`
--

CREATE TABLE `pool_wp_matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `stadium_id` int(10) UNSIGNED NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `home_score` tinyint(3) UNSIGNED DEFAULT NULL,
  `away_score` tinyint(3) UNSIGNED DEFAULT NULL,
  `play_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `matchtype_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_matches`
--

INSERT INTO `pool_wp_matches` (`id`, `stadium_id`, `home_team_id`, `away_team_id`, `home_score`, `away_score`, `play_date`, `matchtype_id`) VALUES
(68, 16, 71, 72, NULL, NULL, '2014-06-13 22:00:00', 7),
(75, 23, 85, 86, NULL, NULL, '2014-06-15 22:00:00', 7),
(79, 17, 93, 94, NULL, NULL, '2014-06-17 16:00:00', 7),
(85, 21, 73, 79, NULL, NULL, '2014-06-19 16:00:00', 7),
(99, 21, 68, 65, NULL, NULL, '2014-06-23 20:00:00', 7),
(113, 17, 97, 98, NULL, NULL, '2014-06-28 16:00:00', 2),
(114, 23, 99, 100, NULL, NULL, '2014-06-28 20:00:00', 2),
(115, 18, 101, 102, NULL, NULL, '2014-06-29 16:00:00', 2),
(116, 20, 103, 104, NULL, NULL, '2014-06-29 20:00:00', 2),
(117, 21, 105, 106, NULL, NULL, '2014-06-30 16:00:00', 2),
(118, 22, 107, 108, NULL, NULL, '2014-06-30 20:00:00', 2),
(119, 13, 109, 110, NULL, NULL, '2014-07-01 16:00:00', 2),
(120, 15, 111, 112, NULL, NULL, '2014-07-01 20:00:00', 2),
(121, 18, 113, 114, NULL, NULL, '2014-07-04 20:00:00', 8),
(122, 23, 115, 116, NULL, NULL, '2014-07-04 16:00:00', 8),
(123, 15, 117, 118, NULL, NULL, '2014-07-05 20:00:00', 8),
(124, 21, 119, 120, NULL, NULL, '2014-07-05 16:00:00', 8),
(125, 17, 121, 122, NULL, NULL, '2014-07-08 20:00:00', 4),
(126, 13, 123, 124, NULL, NULL, '2014-07-09 20:00:00', 4),
(127, 21, 125, 126, NULL, NULL, '2014-07-12 20:00:00', 5),
(128, 23, 127, 128, NULL, NULL, '2014-07-13 19:00:00', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_matchtypes`
--

CREATE TABLE `pool_wp_matchtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `visibility` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_matchtypes`
--

INSERT INTO `pool_wp_matchtypes` (`id`, `name`, `visibility`) VALUES
(1, 'First Round', 1),
(2, 'Round of 16', 1),
(3, 'Quarter-finals', 1),
(4, 'Semi-finals', 1),
(5, 'Play-off for third place', 1),
(6, 'Final', 1),
(7, 'Group Stage', 1),
(8, 'Quarter Finals', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_predictions`
--

CREATE TABLE `pool_wp_predictions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `match_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `home_score` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `away_score` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `has_joker` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_rankings`
--

CREATE TABLE `pool_wp_rankings` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_defined` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `calculate` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_rankings`
--

INSERT INTO `pool_wp_rankings` (`id`, `name`, `user_defined`, `calculate`) VALUES
(1, 'default ranking', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_rankings_bonusquestions`
--

CREATE TABLE `pool_wp_rankings_bonusquestions` (
  `ranking_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_rankings_matches`
--

CREATE TABLE `pool_wp_rankings_matches` (
  `ranking_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_scorehistory_s1_t1`
--

CREATE TABLE `pool_wp_scorehistory_s1_t1` (
  `ranking_id` int(10) UNSIGNED NOT NULL,
  `score_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `score_date` datetime NOT NULL,
  `source_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `score` int(11) UNSIGNED NOT NULL,
  `full` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `toto` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `goal_bonus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `goal_diff_bonus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `total_score` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ranking` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_scorehistory_s1_t2`
--

CREATE TABLE `pool_wp_scorehistory_s1_t2` (
  `ranking_id` int(10) UNSIGNED NOT NULL,
  `score_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `score_date` datetime NOT NULL,
  `source_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `score` int(11) UNSIGNED NOT NULL,
  `full` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `toto` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `goal_bonus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `goal_diff_bonus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `total_score` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ranking` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_seasons`
--

CREATE TABLE `pool_wp_seasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_seasons`
--

INSERT INTO `pool_wp_seasons` (`id`, `name`) VALUES
(1, 'Season 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_shoutbox`
--

CREATE TABLE `pool_wp_shoutbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `shout_text` tinytext NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_stadiums`
--

CREATE TABLE `pool_wp_stadiums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `photo` text NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_stadiums`
--

INSERT INTO `pool_wp_stadiums` (`id`, `name`, `photo`, `comments`) VALUES
(1, 'Moscow: Olympic Stadium Luzhniki', 'luzhniki.png', ''),
(2, 'Ekaterinburg: Central Stadium', 'ekaterinenburg.png', ''),
(3, 'Sotsji: Olympic Stadium Fisht', 'fisht.png', ''),
(4, 'Saint-Petersburg: Saint Petersburg Stadium', 'saintpetersburg.png', ''),
(5, 'Kazan: Kazan Arena', 'kazan.png', ''),
(6, 'Saransk: Mordovia Arena', 'mordovia.png', ''),
(7, 'Moskow: Otkrytieje Arena', 'spartak.png', ''),
(8, 'Kaliningrad: Arena Baltika', 'kalingrad.png', ''),
(9, 'Rostov-on-Don: Rostov Arena', 'rostov.png', ''),
(10, 'Samara: Cosmos Arena', 'samara.png', ''),
(11, 'Nizhny Novgorod: Strelka Stadium', 'nizhny.png', ''),
(12, 'Volgograd: Volgograd Arena', 'volgograd.png', ''),
(13, 'Arena De Sao Paulo, Sao Paulo', 'arena-de-sao-paulo.jpg', ''),
(14, 'Estadio Das Dunas, Natal', 'estadio-das-dunas.jpg', ''),
(15, 'Arena Fonte Nova, Salvador', 'arena-fonte-nova.jpg', ''),
(16, 'Arena Pantanal, Cuiaba', 'arena-pantanal.jpg', ''),
(17, 'Estadio Mineirao, Belo Horizonte', 'estadio-mineirao.jpg', ''),
(18, 'Estadio Castelao, Fortaleza', 'estadio-castelao.jpg', ''),
(19, 'Arena Amazonia, Manaus', 'arena-amazonia.jpg', ''),
(20, 'Arena Pernambuco, Recife', 'arena-pernambuco.jpg', ''),
(21, 'Estadio Nacional, Brasilia', 'estadio-nacional.jpg', ''),
(22, 'Estadio Beira-Rio, Porto Alegre', 'estadio-beira-rio.jpg', ''),
(23, 'Estadio Do Maracana, Rio de Janeiro', 'estadio-do-maracana.jpg', ''),
(24, 'Arena Da Baixada, Curitiba', 'arena-da-baixada.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pool_wp_teams`
--

CREATE TABLE `pool_wp_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `photo` text NOT NULL,
  `flag` text NOT NULL,
  `link` varchar(200) NOT NULL DEFAULT '',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `group_order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `is_real` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `pool_wp_teams`
--

INSERT INTO `pool_wp_teams` (`id`, `name`, `photo`, `flag`, `link`, `group_id`, `group_order`, `is_real`, `is_active`, `comments`) VALUES
(65, 'Philippines', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/51-u8JjOxIL._SX466_.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/51-u8JjOxIL._SX466_.jpg', 'http://www.fifa.com/worldcup/teams/team=43924/index.html', 0, 1, 1, 1, ''),
(68, 'Myanmar', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/MYAN0001__62250.1460460886.1280.1280.png', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/MYAN0001__62250.1460460886.1280.1280.png', 'http://www.fifa.com/worldcup/teams/team=43849/index.html', 1, 4, 1, 1, ''),
(71, 'Lào', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images.png', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images.png', 'http://www.fifa.com/worldcup/teams/team=43925/index.html', 1, 3, 1, 1, ''),
(72, 'Đông Timor', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Gambar-bendera-Timor-leste.gif', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Gambar-bendera-Timor-leste.gif', 'http://www.fifa.com/worldcup/teams/team=43976/index.html', 0, 4, 1, 1, ''),
(73, 'Indonesia', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Flag-Indonesia.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Flag-Indonesia.jpg', 'http://www.fifa.com/worldcup/teams/team=43926/index.html', 1, 1, 1, 1, ''),
(76, 'Campuchia', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/tải-xuống-2.png', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/tải-xuống-2.png', 'http://www.fifa.com/worldcup/teams/team=43901/index.html', 1, 2, 1, 1, ''),
(79, 'Brunei', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/significado-da-bandeira-do-brunei.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/significado-da-bandeira-do-brunei.jpg', 'http://www.fifa.com/worldcup/teams/team=43854/index.html', 1, 3, 1, 1, ''),
(85, 'Malaysia', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thPG8X5W98.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thPG8X5W98.jpg', 'http://www.fifa.com/worldcup/teams/team=43922/index.html', 1, 1, 1, 1, ''),
(86, 'Singapore', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/y-nghia-quoc-ky-singapore-1.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/y-nghia-quoc-ky-singapore-1.jpg', 'http://www.fifa.com/worldcup/teams/team=44037/index.html', 1, 2, 1, 1, ''),
(93, 'Thái Lan', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images-1.png', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images-1.png', 'http://www.fifa.com/worldcup/teams/team=43935/index.html', 0, 1, 1, 1, ''),
(94, 'Việt Nam', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thSWBQH1ZH.jpg', 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thSWBQH1ZH.jpg', 'http://www.fifa.com/worldcup/teams/team=43843/index.html', 0, 2, 1, 1, ''),
(97, 'Winner Group A', '', '', '', 0, 0, 0, 1, ''),
(98, 'Runner-up Group B', '', '', '', 0, 0, 0, 1, ''),
(99, 'Winner Group C', '', '', '', 0, 0, 0, 1, ''),
(100, 'Runner-up Group D', '', '', '', 0, 0, 0, 1, ''),
(101, 'Winner Group B', '', '', '', 0, 0, 0, 1, ''),
(102, 'Runner-up Group A', '', '', '', 0, 0, 0, 1, ''),
(103, 'Winner Group D', '', '', '', 0, 0, 0, 1, ''),
(104, 'Runner-up Group C', '', '', '', 0, 0, 0, 1, ''),
(105, 'Winner Group E', '', '', '', 0, 0, 0, 1, ''),
(106, 'Runner-up Group F', '', '', '', 0, 0, 0, 1, ''),
(107, 'Winner Group G', '', '', '', 0, 0, 0, 1, ''),
(108, 'Runner-up Group H', '', '', '', 0, 0, 0, 1, ''),
(109, 'Winner Group F', '', '', '', 0, 0, 0, 1, ''),
(110, 'Runner-up Group E', '', '', '', 0, 0, 0, 1, ''),
(111, 'Winner Group H', '', '', '', 0, 0, 0, 1, ''),
(112, 'Runner-up Group G', '', '', '', 0, 0, 0, 1, ''),
(113, 'Winner match 49', '', '', '', 0, 0, 0, 1, ''),
(114, 'Winner match 50', '', '', '', 0, 0, 0, 1, ''),
(115, 'Winner match 53', '', '', '', 0, 0, 0, 1, ''),
(116, 'Winner match 54', '', '', '', 0, 0, 0, 1, ''),
(117, 'Winner match 51', '', '', '', 0, 0, 0, 1, ''),
(118, 'Winner match 52', '', '', '', 0, 0, 0, 1, ''),
(119, 'Winner match 55', '', '', '', 0, 0, 0, 1, ''),
(120, 'Winner match 56', '', '', '', 0, 0, 0, 1, ''),
(121, 'Winner match 57', '', '', '', 0, 0, 0, 1, ''),
(122, 'Winner match 58', '', '', '', 0, 0, 0, 1, ''),
(123, 'Winner match 59', '', '', '', 0, 0, 0, 1, ''),
(124, 'Winner match 60', '', '', '', 0, 0, 0, 1, ''),
(125, 'Loser match 61', '', '', '', 0, 0, 0, 1, ''),
(126, 'Loser match 62', '', '', '', 0, 0, 0, 1, ''),
(127, 'Winner match 61', '', '', '', 0, 0, 0, 1, ''),
(128, 'Winner match 62', '', '', '', 0, 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-10-07 15:13:10', '2019-10-07 15:13:10', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0),
(2, 7, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 08:42:20', '2019-10-09 08:42:20', 'yttyty', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(3, 7, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 08:43:55', '2019-10-09 08:43:55', 'assadasdasd', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(4, 6, 'admin', 'buihuuthang199@gmail.com', '', '::1', '2019-10-09 09:39:21', '2019-10-09 09:39:21', 'drrtretert', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 1),
(5, 6, 'khangdua', 'sfvdfsdfsdf@gmail.com', 'http://sdfsdf', '::1', '2019-10-09 09:40:34', '2019-10-09 09:40:34', 'dfdf', 0, '0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/seagamefootball', 'yes'),
(2, 'home', 'http://localhost/seagamefootball', 'yes'),
(3, 'blogname', 'SeaGames Football', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'buihuuthang199@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:89:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:1:{i:0;s:31:\"football-pool/football-pool.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'seagamefootball', 'yes'),
(41, 'stylesheet', 'seagamefootball', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '44719', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'initial_db_version', '44719', 'yes'),
(94, 'wp_user_roles', 'a:6:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:20:\"manage_football_pool\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:35:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:20:\"manage_football_pool\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:19:\"football_pool_admin\";a:2:{s:4:\"name\";s:19:\"Football Pool Admin\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:20:\"manage_football_pool\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(97, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'sidebars_widgets', 'a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:13:\"array_version\";i:3;}', 'yes'),
(102, 'cron', 'a:7:{i:1570669993;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1570677193;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1570720392;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1570720409;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1570720410;a:1:{s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1570720413;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes'),
(103, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'recovery_keys', 'a:0:{}', 'yes'),
(114, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.2.3.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.2.3.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.2.3-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.2.3-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.2.3\";s:7:\"version\";s:5:\"5.2.3\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.0\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1570634116;s:15:\"version_checked\";s:5:\"5.2.3\";s:12:\"translations\";a:0:{}}', 'no'),
(115, 'theme_mods_twentynineteen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1570461709;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(120, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1570634126;s:7:\"checked\";a:4:{s:15:\"seagamefootball\";s:5:\"1.0.0\";s:14:\"twentynineteen\";s:3:\"1.4\";s:15:\"twentyseventeen\";s:3:\"2.2\";s:13:\"twentysixteen\";s:3:\"2.0\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(121, '_site_transient_timeout_browser_40d2af28a4c309bbb824dc957af59b11', '1571066011', 'no'),
(122, '_site_transient_browser_40d2af28a4c309bbb824dc957af59b11', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"77.0.3865.90\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(123, '_site_transient_timeout_php_check_a5b4d2808570efd012607394df5c6fa9', '1571066012', 'no'),
(124, '_site_transient_php_check_a5b4d2808570efd012607394df5c6fa9', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(128, 'can_compress_scripts', '1', 'no'),
(139, 'current_theme', 'SeaGameFootball', 'yes'),
(140, 'theme_mods_seagamefootball', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(141, 'theme_switched', '', 'yes'),
(142, 'category_children', 'a:0:{}', 'yes'),
(147, 'footballpool_plugin_options', 'a:59:{s:10:\"fullpoints\";i:5;s:10:\"totopoints\";i:2;s:10:\"goalpoints\";i:0;s:10:\"diffpoints\";i:0;s:16:\"joker_multiplier\";i:2;s:9:\"maxperiod\";i:900;s:11:\"use_leagues\";i:1;s:18:\"shoutbox_max_chars\";i:150;s:14:\"hide_admin_bar\";i:1;s:23:\"default_league_new_user\";i:3;s:15:\"dashboard_image\";s:100:\"//localhost/seagamefootball/wp-content/plugins/football-pool/assets/admin/images/dashboardwidget.png\";s:16:\"matches_locktime\";s:0:\"\";s:23:\"bonus_question_locktime\";s:0:\"\";s:22:\"keep_data_on_uninstall\";i:1;s:11:\"use_favicon\";i:0;s:24:\"stop_time_method_matches\";i:0;s:26:\"stop_time_method_questions\";i:0;s:14:\"show_team_link\";i:1;s:24:\"show_venues_on_team_page\";i:1;s:10:\"use_charts\";i:0;s:13:\"export_format\";i:0;s:18:\"match_time_display\";i:0;s:17:\"match_time_offset\";i:0;s:15:\"csv_file_filter\";s:1:\"*\";s:18:\"add_tinymce_button\";i:1;s:23:\"always_show_predictions\";i:0;s:17:\"use_spin_controls\";i:0;s:23:\"groups_page_match_types\";a:1:{i:0;i:1;}s:17:\"match_sort_method\";i:0;s:16:\"auto_calculation\";i:1;s:15:\"ranking_display\";i:0;s:12:\"show_ranking\";i:1;s:15:\"prediction_type\";i:0;s:20:\"prediction_type_draw\";i:1;s:15:\"team_points_win\";i:3;s:16:\"team_points_draw\";i:1;s:23:\"listing_show_team_thumb\";i:1;s:24:\"listing_show_venue_thumb\";i:1;s:26:\"listing_show_team_comments\";i:1;s:27:\"listing_show_venue_comments\";i:1;s:16:\"number_of_jokers\";i:1;s:31:\"show_num_predictions_in_ranking\";i:0;s:24:\"redirect_url_after_login\";s:32:\"http://localhost/seagamefootball\";s:31:\"redirect_url_after_registration\";s:32:\"http://localhost/seagamefootball\";s:21:\"scorehistory_table_s1\";s:18:\"scorehistory_s1_t1\";s:23:\"calculation_in_progress\";i:0;s:31:\"user_page_show_predictions_only\";i:0;s:36:\"user_page_show_finished_matches_only\";i:0;s:28:\"user_page_show_actual_result\";i:0;s:18:\"page_id_tournament\";i:6;s:13:\"page_id_teams\";i:7;s:14:\"page_id_groups\";i:8;s:16:\"page_id_stadiums\";i:9;s:13:\"page_id_rules\";i:10;s:12:\"page_id_pool\";i:11;s:15:\"page_id_ranking\";i:12;s:18:\"page_id_statistics\";i:13;s:12:\"page_id_user\";i:14;s:10:\"db_version\";s:5:\"2.6.7\";}', 'yes'),
(148, 'recently_activated', 'a:0:{}', 'yes'),
(149, 'widget_footballpoolrankingwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(150, 'widget_footballpoollastgameswidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(151, 'widget_footballpoollogoutwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(152, 'widget_footballpoolshoutboxwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(153, 'widget_footballpoolgroupwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(154, 'widget_footballpoolnextpredictionwidget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(155, '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1570634122;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:3:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.1.2\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.1.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:31:\"football-pool/football-pool.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:27:\"w.org/plugins/football-pool\";s:4:\"slug\";s:13:\"football-pool\";s:6:\"plugin\";s:31:\"football-pool/football-pool.php\";s:11:\"new_version\";s:5:\"2.6.7\";s:3:\"url\";s:44:\"https://wordpress.org/plugins/football-pool/\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/plugin/football-pool.2.6.7.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:65:\"https://ps.w.org/football-pool/assets/icon-256x256.png?rev=983880\";s:2:\"1x\";s:65:\"https://ps.w.org/football-pool/assets/icon-128x128.png?rev=983880\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:67:\"https://ps.w.org/football-pool/assets/banner-772x250.png?rev=527470\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(175, '_site_transient_timeout_community-events-d41d8cd98f00b204e9800998ecf8427e', '1570711189', 'no'),
(176, '_site_transient_community-events-d41d8cd98f00b204e9800998ecf8427e', 'a:3:{s:9:\"sandboxed\";b:0;s:8:\"location\";a:1:{s:2:\"ip\";b:0;}s:6:\"events\";a:0:{}}', 'no'),
(196, '_site_transient_timeout_theme_roots', '1570635924', 'no'),
(198, '_site_transient_theme_roots', 'a:4:{s:15:\"seagamefootball\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'no'),
(201, '_transient_timeout_feed_9bbd59226dc36b9b26cd43f15694c5c3', '1570710759', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(202, '_transient_feed_9bbd59226dc36b9b26cd43f15694c5c3', 'a:4:{s:5:\"child\";a:1:{s:0:\"\";a:1:{s:3:\"rss\";a:1:{i:0;a:6:{s:4:\"data\";s:3:\"\n\n\n\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:7:\"version\";s:3:\"2.0\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:1:{s:0:\"\";a:1:{s:7:\"channel\";a:1:{i:0;a:6:{s:4:\"data\";s:49:\"\n	\n	\n	\n	\n	\n	\n	\n	\n	\n	\n		\n		\n		\n		\n		\n		\n		\n		\n		\n	\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:7:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:27:\"News –  – WordPress.org\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:26:\"https://wordpress.org/news\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"WordPress News\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:13:\"lastBuildDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Tue, 08 Oct 2019 21:14:26 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"language\";a:1:{i:0;a:5:{s:4:\"data\";s:5:\"en-US\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:9:\"generator\";a:1:{i:0;a:5:{s:4:\"data\";s:40:\"https://wordpress.org/?v=5.3-beta3-46453\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"item\";a:10:{i:0;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:20:\"WordPress 5.3 Beta 3\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:56:\"https://wordpress.org/news/2019/10/wordpress-5-3-beta-3/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Tue, 08 Oct 2019 20:58:43 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:11:\"Development\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:8:\"Releases\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7312\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:357:\"WordPress 5.3 Beta 3 is now available! This software is still in development,&#160;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version. You can test the WordPress 5.3 beta in two ways: Try the&#160;WordPress Beta Tester&#160;plugin (choose the “bleeding edge nightlies” option) [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Francesca Marano\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:3765:\"\n<p>WordPress 5.3 Beta 3 is now available!</p>\n\n\n\n<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version.</p>\n\n\n\n<p>You can test the WordPress 5.3 beta in two ways:</p>\n\n\n\n<ul><li>Try the&nbsp;<a href=\"https://wordpress.org/plugins/wordpress-beta-tester/\">WordPress Beta Tester</a>&nbsp;plugin (choose the “bleeding edge nightlies” option)</li><li>Or&nbsp;<a href=\"https://wordpress.org/wordpress-5.3-beta3.zip\">download the beta here</a>&nbsp;(zip). </li></ul>\n\n\n\n<p>WordPress 5.3 is slated for release on&nbsp;<a href=\"https://make.wordpress.org/core/5-3/\">November 12, 2019</a>, and we need your help to get there.</p>\n\n\n\n<p>Thanks to the testing and feedback from everyone who tested <a href=\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-2/\">beta 2</a> (and&nbsp;<a href=\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-1/\">beta 1</a>) over&nbsp;<a href=\"https://core.trac.wordpress.org/query?status=closed&amp;changetime=10%2F01%2F2019..10%2F08%2F2019&amp;milestone=5.3&amp;col=id&amp;col=summary&amp;col=status&amp;col=milestone&amp;col=owner&amp;col=type&amp;col=priority&amp;order=priority\">60 tickets have been closed</a>&nbsp;in the past week. </p>\n\n\n\n<h2>Some highlights </h2>\n\n\n\n<ul><li>Fixes and enhancements in the admin interface changes introduced in previous 5.3 beta releases.</li><li>Wording changes in login screen (<a href=\"https://core.trac.wordpress.org/ticket/43037\">#43037</a>).</li><li>Improved accessibility in media upload modal (<a href=\"https://core.trac.wordpress.org/ticket/47149\">#47149</a>).</li><li>Changes in the way the new error handling with images works (<a href=\"https://core.trac.wordpress.org/ticket/48200\">#48200</a>).</li><li>MediaElement.js has been updated from 4.2.6 to 4.2.13 (<a href=\"https://core.trac.wordpress.org/ticket/46681\">#46681</a>). The script is now also being loaded in the footer again. This fixes a regression that happened two years ago, so might be worth noting (<a href=\"https://core.trac.wordpress.org/ticket/44484\">#44484</a>).</li><li>Update to the REST API media endpoint to allow resuming of uploads (<a href=\"https://core.trac.wordpress.org/ticket/47987\">#47987</a>).</li></ul>\n\n\n\n<p>In addition to these, Beta 3 landed a number of small consistency and polish changes to the REST API, including an improvement to the permissions check used when editing comments, a fix for post type controller caching edge cases, and most importantly, the ability to use the _embed parameter to access the full data for a post using the /wp/v2/search endpoint.</p>\n\n\n\n<h2>Developer notes</h2>\n\n\n\n<p>WordPress 5.3 has lots of refinements to polish the developer experience. To keep up, subscribe to the&nbsp;<a href=\"https://make.wordpress.org/core/\">Make WordPress Core blog</a>&nbsp;and pay special attention to the&nbsp;<a href=\"https://make.wordpress.org/core/tag/5-3+dev-notes/\">developer notes</a>&nbsp;tag for updates on those and other changes that could affect your products.</p>\n\n\n\n<h2>How to Help</h2>\n\n\n\n<p>Do you speak a language other than English?&nbsp;<a href=\"https://translate.wordpress.org/projects/wp/dev/\">Help us translate WordPress into more than 100 languages</a>!</p>\n\n\n\n<p>If you think you’ve found a bug, you can post to the&nbsp;<a href=\"https://wordpress.org/support/forum/alphabeta/\">Alpha/Beta area</a>&nbsp;in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report,&nbsp;<a href=\"https://core.trac.wordpress.org/newticket\">file one on WordPress Trac</a>&nbsp;where you can also find a list of&nbsp;<a href=\"https://core.trac.wordpress.org/tickets/major\">known bugs</a>.</p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7312\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:1;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"People of WordPress: Alice Orru\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:66:\"https://wordpress.org/news/2019/10/people-of-wordpress-alice-orru/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Sat, 05 Oct 2019 04:24:01 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:9:\"heropress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:10:\"Interviews\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7288\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:376:\"You’ve probably heard that WordPress is open-source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories. Meet Alice Orru, from Sardinia, Italy. Alice Orru was born in Sardinia, an [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Yvette Sonneveld\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:10122:\"\n<p><em>You’ve probably heard that WordPress is open-source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories.</em></p>\n\n\n\n<h2><strong>Meet Alice Orru, from Sardinia, Italy.</strong></h2>\n\n\n\n<p>Alice Orru was born in Sardinia, an island in the middle of the Mediterranean Sea. As a child, she dreamt of becoming a flight attendant, traveling the world, and speaking many foreign languages.</p>\n\n\n\n<p>Unable to meet the height requirements of her chosen profession, Orru ended up choosing a different path in life, following the Italian mantra: “You have to study something that will guarantee a stable and secure job for life.”</p>\n\n\n\n<p>The unemployment rate in Sardinia is very high, a challenge shared throughout the surrounding islands. In addition to that, Alice wasn’t that keen on having the same job all her life, as her parents had.</p>\n\n\n\n<p>When Orru was 22 she moved to Siena, Tuscany, to finish her studies. That is when she created her first personal blog. The website was built on an Italian platform named Tiscali, which she later migrated to WordPress.com.</p>\n\n\n\n<p>After 2 years in Tuscany Orru moved to Strasbourg, France. She studied French and worked several jobs while living there. Her first serious job was in Milan &#8211; working 40 hours/week in the marketing department of a large, international company. She found herself surrounded by ambitious colleagues and a boss who constantly requested extra —unpaid— working hours per day.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?fit=632%2C422&amp;ssl=1\" alt=\"Alice Orru\" class=\"wp-image-7291\" srcset=\"https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?w=1920&amp;ssl=1 1920w, https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?resize=300%2C200&amp;ssl=1 300w, https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?resize=1024%2C683&amp;ssl=1 1024w, https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?resize=768%2C512&amp;ssl=1 768w, https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?resize=1536%2C1024&amp;ssl=1 1536w, https://i0.wp.com/wordpress.org/news/files/2019/10/IMG_2672.jpg?w=1264&amp;ssl=1 1264w\" sizes=\"(max-width: 632px) 100vw, 632px\" /><figcaption>Alice Orru</figcaption></figure>\n\n\n\n<h2>Choices, choices, choices&#8230;</h2>\n\n\n\n<p>Alice gave up blogging because she wasn’t feeling inspired enough to write. She questioned whether she really wanted to do that job forever; working 10 hours per day under the neon lights of an office. It forced her to set aside her dreams for the time being, and for a while, she mainly lived for the weekends.</p>\n\n\n\n<p>Alice decided to leave the job and moved to Barcelona, Spain, all by herself, in 2012.</p>\n\n\n\n<p>After a few months of intense Spanish learning at the university, she found a job in an international clinic as a “Patient Coordinator.” Orru assisted international patients coming to Barcelona for their treatments. She acted as their translator, interpreter and administrative consultant.&nbsp;</p>\n\n\n\n<p>Patients came from Italy, France, England, Morocco, Senegal, and several other countries. Alice was so inspired by some of their stories, that she started to write again: She dusted off her WordPress blog and filled it with stories about her new life in Barcelona and some of the women she met at the clinic. “I was feeling stronger and more independent than ever,” Orru expressed.</p>\n\n\n\n<h2>Technical issues led to unexpected opportunities</h2>\n\n\n\n<p>In the summer of 2015, Alice was writing on her blog and got stuck with a technical problem. While she was searching through the WordPress.com documentation, she saw a pop-up in the bottom right corner of her screen. It was a staff member of Automattic, checking if she needed help. They chatted for a few minutes and the problem was solved. Alice left the chat with one question, though: how did that person on chat find a support job with WordPress?</p>\n\n\n\n<p>Alice found the official WordPress job page: <a href=\"http://jobs.wordpress.net/\"><strong>jobs.wordpress.net</strong></a> and noticed a job offer that caught her attention: WP Media, a French startup, was looking for a polyglot and remote customer service teammate for one of their plugins, WP Rocket. She read their requirements: fluency in English, French and possibly other languages, excellent experience with WordPress, and some coding skills.</p>\n\n\n\n<p>She knew she didn’t meet all the requirements, but could speak 4 languages, and she had a WordPress blog. She didn’t know anything about PHP, though. Orru had been a WordPress.com user for years and knew she was ready to learn more.</p>\n\n\n\n<p>Orru wrote a cover letter and sent her CV. A Skype interview was conducted and several days later she received the news that she had gotten the job!&nbsp;</p>\n\n\n\n<h2><strong>A steep learning curve</strong></h2>\n\n\n\n<p>The early days in her new job were intense. Alice felt inexperienced but was supported by her teammates. She started studying and reading everything about WordPress for beginners. Initially, she answered easy tickets from customers. All the while her teammates were sending useful material to read, setting up video-calls for 1 to 1 training, and encouraging her the entire time.</p>\n\n\n\n<p>Soon, Orru was replying to customers whose first language was either Spanish or Italian in their native language. This was much appreciated and resulted in several happy comments. Until that moment the plugin’s support had been offered only in English and French.</p>\n\n\n\n<h2><strong>Finding her way in the WordPress community</strong></h2>\n\n\n\n<p>At WordCamp Paris 2016, one of Alice’s teammates introduced her to how the WordPress community collaborated and kept in contact through Slack.</p>\n\n\n\n<p>“You speak multiple languages, why don’t you try to contribute to the polyglots team?” he asked.</p>\n\n\n\n<p>Alice knew very little about contributing to WordPress. She had only been working for WP Media for 6 months and didn’t feel ready to dive into a new challenge and start also contributing to WordPress.</p>\n\n\n\n<p>Yet, curiosity led her to join both the local Italian and the global WordPress Community on Slack. For the first few months, she mainly observed what was happening the channels. Then, she attended WordCamp Milan and met some members of the Italian Polyglots team.</p>\n\n\n\n<p>It was love at first string! Laura, one of the <a href=\"https://make.wordpress.org/polyglots/teams/?locale=it_IT\"><strong>General Translation Editors</strong></a> (GTE) for Italy, taught her how to start contributing and translating, following the polyglots guidelines. She also told her about the Italian community’s big efforts to work together, consistently, to boost and grow WordPress related events in Italy.</p>\n\n\n\n<p>With her teammates’ encouragement, Orru applied to WordCamps as a speaker and gave her first talk in December 2016 at WordCamp Barcelona. After that, she both spoke at WordCamp Torino on April 2017 and at WordCamp Europe in 2017.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://i2.wp.com/wordpress.org/news/files/2019/10/aliceorru-wordcamp-europe.jpg?fit=632%2C356&amp;ssl=1\" alt=\"\" class=\"wp-image-7292\" srcset=\"https://i2.wp.com/wordpress.org/news/files/2019/10/aliceorru-wordcamp-europe.jpg?w=1280&amp;ssl=1 1280w, https://i2.wp.com/wordpress.org/news/files/2019/10/aliceorru-wordcamp-europe.jpg?resize=300%2C169&amp;ssl=1 300w, https://i2.wp.com/wordpress.org/news/files/2019/10/aliceorru-wordcamp-europe.jpg?resize=1024%2C576&amp;ssl=1 1024w, https://i2.wp.com/wordpress.org/news/files/2019/10/aliceorru-wordcamp-europe.jpg?resize=768%2C432&amp;ssl=1 768w\" sizes=\"(max-width: 632px) 100vw, 632px\" /><figcaption>Alice Orru speaking at WordCamp Europe, in Paris, in 2017</figcaption></figure>\n\n\n\n<h2><strong>Dreams evolve, all the time!</strong></h2>\n\n\n\n<p>Orru knows that her experiences are not just due to luck. She used her previous skills and passions and adapted them to a new career and life path.</p>\n\n\n\n<blockquote class=\"wp-block-quote\"><p>“We all have some skills; and if we don’t know which they are exactly, we should take some time to make a list of the things we’re really good at. With that in mind, just try. Apply. Get involved. Don’t get stuck in the feeling of &#8216;I can’t do it because I don’t know enough&#8217;. So that&#8217;s what I did. Without even realizing it, I started putting into reality the dream of the little girl who was born on an island and wanted to travel and speak different languages.WordPress made this possible.  I’m now part of a big community, and I am proud of it.&#8221;</p><cite>Alice Orru</cite></blockquote>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<div class=\"wp-block-image\"><figure class=\"alignleft is-resized\"><img src=\"https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=109%2C82&#038;ssl=1\" alt=\"\" class=\"wp-image-7025\" width=\"109\" height=\"82\" srcset=\"https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?w=1024&amp;ssl=1 1024w, https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=300%2C225&amp;ssl=1 300w, https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=768%2C576&amp;ssl=1 768w\" sizes=\"(max-width: 109px) 100vw, 109px\" data-recalc-dims=\"1\" /></figure></div>\n\n\n\n<p><em>This post is based on an article originally published on HeroPress.com, a community initiative created by <a href=\"https://profiles.wordpress.org/topher1kenobe/\">Topher DeRosia</a>. HeroPress highlights people in the WordPress community who have overcome barriers and whose stories would otherwise go unheard.</em></p>\n\n\n\n<p><em>Meet more WordPress community members over at </em><a href=\"https://heropress.com/\"><em>HeroPress.com</em></a><em>!</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7288\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:2;a:6:{s:4:\"data\";s:48:\"\n		\n		\n				\n		\n				\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:38:\"The Month in WordPress: September 2019\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:73:\"https://wordpress.org/news/2019/10/the-month-in-wordpress-september-2019/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Wed, 02 Oct 2019 08:05:43 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"Month in WordPress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7280\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:338:\"September has been a particularly busy month in the WordPress community—a lot of important work has been done as everyone in the project works towards an upcoming major release. Read on to find out more about this and everything else that has been going on over the past month. WordPress 5.2.3 Security and Maintenance Release [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:15:\"Hugh Lashbrooke\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:7586:\"\n<p>September has been a particularly busy month in the WordPress community—a lot of important work has been done as everyone in the project works towards an upcoming major release. Read on to find out more about this and everything else that has been going on over the past month.</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>WordPress 5.2.3 Security and Maintenance Release</h2>\n\n\n\n<p>Early in September, <a href=\"https://wordpress.org/news/2019/09/wordpress-5-2-3-security-and-maintenance-release/\">version 5.2.3 of WordPress was released</a> as a security and maintenance release. Sixty-two individuals contributed to its 29 fixes and enhancements.</p>\n\n\n\n<p>The security issues fixed in this release owe thanks to numerous people who disclosed them responsibly. You can read more about the vulnerability reporting process <a href=\"https://make.wordpress.org/core/handbook/testing/reporting-security-vulnerabilities/\">in the Core handbook</a>.</p>\n\n\n\n<p>Want to get involved in building WordPress Core? Follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<h2>WordPress 5.3 Enters Beta</h2>\n\n\n\n<p>WhileWordPress 5.3 is slated for release on November 12, it has already entered the beta phase with <a href=\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-2/\">the second beta release being made available</a> at the end of September. As this is a major release, it will feature a number of new features and enhancements, including <a href=\"https://make.wordpress.org/core/2019/09/19/whats-new-in-gutenberg-18-september/\">significant improvements to the block editor</a>, <a href=\"https://make.wordpress.org/core/2019/09/25/whats-new-in-site-health-for-wordpress-5-3/\">updates to the Site Health component</a>, <a href=\"https://make.wordpress.org/core/2019/09/24/new-block-apis-in-wordpress-5-3/\">new block APIs</a>, <a href=\"https://make.wordpress.org/core/2019/09/23/core-widgets-new-aria-current-attribute-in-wordpress-5-3/\">accessibility updates</a>, and <a href=\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-1/\">much more</a>.</p>\n\n\n\n<p>You can test the 5.3 beta release by installing <a href=\"https://wordpress.org/plugins/wordpress-beta-tester/\">the WordPress Beta Tester plugin</a> on any WordPress site, although as this is software that is currently in development, we don’t recommend installing it on a live site.</p>\n\n\n\n<p>Want to get involved in building this release? <a href=\"https://wordpress.org/plugins/wordpress-beta-tester/\">Test the beta</a>, follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<h2>Date/Time Component Improvements</h2>\n\n\n\n<p>For over a year, contributors involved in <a href=\"https://make.wordpress.org/core/components/date-time/\">the Date/Time component</a> of WordPress Core have been working hard on the “wp_date” project. The goal of this project is to fix and streamline the way that Core handles times and dates throughout the platform.</p>\n\n\n\n<p>This ambitious project has seen incremental changes over the last few Core releases. The upcoming 5.3 release <a href=\"https://make.wordpress.org/core/2019/09/23/date-time-improvements-wp-5-3/\">will include the final and most significant changes</a> to the component, bringing much-needed stability to time handling in WordPress Core.</p>\n\n\n\n<p>Want to get involved in the Date/Time component of WordPress Core? <a href=\"https://make.wordpress.org/core/components/date-time/\">Learn more about it</a>, follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core-datetime channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<h2>New Theme Review Team Structure</h2>\n\n\n\n<p>After recent discussions around the goals of the Theme Review team, <a href=\"https://make.wordpress.org/themes/2019/09/24/new-theme-review-team-structure/\">some changes have been made</a> to the leadership structure of the team. The team leads are now ‘representatives’ of different areas of the work that they do. This flat structure allows for representatives to work in more loosely defined areas so they contribute to the team in more diverse ways, and helps the team to be more focused on setting and achieving their goals. The new structure is outlined <a href=\"https://make.wordpress.org/themes/handbook/about/members/\">in the team handbook</a>.</p>\n\n\n\n<p>Want to get involved in reviewing themes for WordPress? Follow <a href=\"https://make.wordpress.org/themes/\">the Theme Review team blog</a>, and join the #themereview channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<h2>New Default Theme: Twenty Twenty</h2>\n\n\n\n<p>The upcoming 5.3 release will also include <a href=\"https://make.wordpress.org/core/2019/09/06/introducing-twenty-twenty/\">a new default theme for WordPress</a>, <em>Twenty Twenty</em>. This theme will have a strong focus on readability and accessibility while being optimized for the block editor that first shipped with WordPress 5.0.</p>\n\n\n\n<p>Development of <em>Twenty Twenty</em> has been going quickly, with <a href=\"https://make.wordpress.org/core/2019/09/30/twenty-twenty-update/\">a recent update</a> showing more of the design and layouts that you can expect when the theme is released with WordPress 5.3 in November.</p>\n\n\n\n<p>Want to get involved in building <em>Twenty Twenty</em>? You can <a href=\"https://github.com/WordPress/twentytwenty\">contribute on GitHub</a>, follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>Further Reading:</h2>\n\n\n\n<ul><li>The Gutenberg project has continued to see regular updates with <a href=\"https://make.wordpress.org/core/2019/09/19/whats-new-in-gutenberg-18-september/\">the latest version</a> set to be included in WordPress 5.3.</li><li>Members of the Community Team <a href=\"https://make.wordpress.org/community/2019/09/13/call-for-participants-creating-a-welcoming-and-diverse-space-online-workshop-on-sun-oct-6/\">will run a workshop</a> to help event organizers create welcoming and diverse spaces for attendees.&nbsp;</li><li>There are some <a href=\"https://make.wordpress.org/updates/2019/09/20/wordpress-user-pro-survey-11-questions-and-a-script/\">proposed updates for the annual WordPress user survey</a> that need community feedback.</li><li><a href=\"https://make.wordpress.org/docs/2019/09/23/summary-for-helphub-meeting-23-september-2019/\">Work continues on the HelpHub project</a> where contributors are moving documentation to the updated support portal.</li><li>The Gutenberg team performed further usability tests in August, <a href=\"https://make.wordpress.org/test/2019/09/06/gutenberg-usability-testing-for-august-2019/\">with some interesting results</a>.</li><li><a href=\"https://buddypress.org/2019/09/buddypress-5-0-0-le-gusto/\">Version 5.0 of BuddyPress was released</a> near the end of this month, featuring a new REST API, improved group management, and other enhancements.</li></ul>\n\n\n\n<p><em>Have a story that we should include in the next “Month in WordPress” post? Please </em><a href=\"https://make.wordpress.org/community/month-in-wordpress-submissions/\"><em>submit it here</em></a><em>.</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7280\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:3;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:20:\"WordPress 5.3 Beta 2\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:56:\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-2/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 30 Sep 2019 21:43:38 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:11:\"Development\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:8:\"Releases\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7262\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:321:\"WordPress 5.3 Beta 2 is now available! This software is still in development, so we don’t recommend running it on a production site. Consider setting up a test site to play with the new version. You can test the WordPress 5.3 beta in two ways: Try the WordPress Beta Tester plugin (choose the “bleeding edge [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Francesca Marano\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:3037:\"\n<p>WordPress 5.3 Beta 2 is now available!</p>\n\n\n\n<p><strong>This software is still in development,</strong> so we don’t recommend running it on a production site. Consider setting up a test site to play with the new version.</p>\n\n\n\n<p>You can test the WordPress 5.3 beta in two ways:</p>\n\n\n\n<ul><li>Try the <a href=\"https://wordpress.org/plugins/wordpress-beta-tester/\">WordPress Beta Tester</a> plugin (choose the “bleeding edge nightlies” option)</li><li>Or <a href=\"https://wordpress.org/wordpress-5.3-beta2.zip\">download the beta here</a> (zip).</li></ul>\n\n\n\n<p>WordPress 5.3 is slated for release on <a href=\"https://make.wordpress.org/core/5-3/\">November 12, 2019</a>, and we need your help to get there. </p>\n\n\n\n<p>Thanks to the testing and feedback from everyone who tested <a href=\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-1/\">beta 1</a>, over <a href=\"https://core.trac.wordpress.org/query?status=closed&amp;changetime=09%2F24%2F2019..&amp;milestone=5.3&amp;group=component&amp;col=id&amp;col=summary&amp;col=owner&amp;col=type&amp;col=priority&amp;col=component&amp;col=version&amp;order=priority\">45 tickets have been closed</a>&nbsp;since then. </p>\n\n\n\n<h2>Some highlights</h2>\n\n\n\n<ul><li>Work continues on the <strong>block editor</strong>.</li><li>Bugs fixed on<strong> Twenty Twenty</strong>.</li><li><strong>Accessibility</strong> bugs fixes and enhancements on the interface changes introduced with 5.3 beta 1:<ul><li>Iterate on the admin interface</li><li>Reduce potential backward compatibility issues</li><li>Improve consistency between admin screens and the block editor</li><li>Better text zoom management</li></ul></li><li>Support <code>rel=\"ugc\"</code> attribute value in comments (<a href=\"https://core.trac.wordpress.org/ticket/48022\">#48022</a>) &#8211; this particular ticket shows the WordPress project ability to integrate quick solutions to things that are changing unexpectedly – like Google new features.</li></ul>\n\n\n\n<h2>Developer notes</h2>\n\n\n\n<p>WordPress 5.3 has lots of refinements to polish the developer experience. To keep up, subscribe to the&nbsp;<a href=\"https://make.wordpress.org/core/\">Make WordPress Core blog</a>&nbsp;and pay special attention to the&nbsp;<a href=\"https://make.wordpress.org/core/tag/5-3+dev-notes/\">developers notes</a>&nbsp;for updates on those and other changes that could affect your products.</p>\n\n\n\n<h2>How to Help</h2>\n\n\n\n<p>Do you speak a language other than English? <a href=\"https://translate.wordpress.org/projects/wp/dev/\">Help us translate WordPress into more than 100 languages</a>!</p>\n\n\n\n<p>If you think you’ve found a bug, you can post to the <a href=\"https://wordpress.org/support/forum/alphabeta/\">Alpha/Beta area</a> in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report, <a href=\"https://core.trac.wordpress.org/newticket\">file one on WordPress Trac</a> where you can also find a list of <a href=\"https://core.trac.wordpress.org/tickets/major\">known bugs</a>.<br></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7262\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:4;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:20:\"WordPress 5.3 Beta 1\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:56:\"https://wordpress.org/news/2019/09/wordpress-5-3-beta-1/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 23 Sep 2019 18:36:11 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:11:\"Development\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:8:\"Releases\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7114\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:321:\"WordPress 5.3 Beta 1 is now available! This software is still in development, so we don’t recommend running it on a production site. Consider setting up a test site to play with the new version. You can test the WordPress 5.3 beta in two ways: Try the WordPress Beta Tester plugin (choose the “bleeding edge [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Francesca Marano\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:9121:\"\n<p>WordPress 5.3 Beta 1 is now available!</p>\n\n\n\n<p><strong>This software is still in development,</strong> so we don’t recommend running it on a production site. Consider setting up a test site to play with the new version.</p>\n\n\n\n<p>You can test the WordPress 5.3 beta in two ways:</p>\n\n\n\n<ul><li>Try the <a href=\"https://wordpress.org/plugins/wordpress-beta-tester/\">WordPress Beta Tester</a> plugin (choose the “bleeding edge nightlies” option)</li><li>Or <a href=\"https://wordpress.org/wordpress-5.3-beta1.zip\">download the beta here</a> (zip).</li></ul>\n\n\n\n<p>WordPress 5.3 is slated for release on <a href=\"https://make.wordpress.org/core/5-3/\">November 12, 2019</a>, and we need your help to get there. Here are some of the big items to test, so we can find and resolve as many bugs as possible in the coming weeks.</p>\n\n\n\n<h2>Block Editor: features and improvements</h2>\n\n\n\n<p>Twelve releases of the Gutenberg plugin are going to be merged into 5.3 which means there’s a long list of exciting new features.&nbsp;</p>\n\n\n\n<p>Here are just a few of them:</p>\n\n\n\n<ul><li>Group block and grouping interactions</li><li>Columns block improvements (width support + patterns)</li><li>Table block improvements (text alignment support, header/footer support, colors)</li><li>Gallery block improvements (reordering inline, caption support)</li><li>Separator block improvements (color support)</li><li>Latest Posts block improvements (support excerpt, content)</li><li>List block improvements (indent/outdent shortcuts, start value and reverse order support)</li><li>Button block improvements (support target, border radius)</li><li>Animations and micro interactions (moving blocks, dropdowns, and a number of small animations to improve the UX)</li><li>Accessibility Navigation Mode which will allow you to navigate with the keyboard between blocks without going into their content.</li><li>Block Style Variations API</li></ul>\n\n\n\n<p>Plus a number of other improvements, amongst them:</p>\n\n\n\n<ul><li>Data Module API improvements (useSelect/useEffect)</li><li>Inserter Help Panel</li><li>Extensibility: DocumentSettingsPanel</li><li>Snackbar notices</li><li>Typewriter Experience</li><li>Fix a number of Accessibility report issues</li></ul>\n\n\n\n<p>If you want to see all the features for each release, here are direct links to the release posts: <a href=\"https://make.wordpress.org/core/2019/09/19/whats-new-in-gutenberg-18-september/\">6.5</a>, <a href=\"https://make.wordpress.org/core/2019/08/28/whats-new-in-gutenberg-28-august/\">6.4</a>, <a href=\"https://make.wordpress.org/core/2019/08/14/whats-new-in-gutenberg-14-august/\">6.3</a>, <a href=\"https://make.wordpress.org/core/2019/07/31/whats-new-in-gutenberg-31-july/\">6.2</a>, <a href=\"https://make.wordpress.org/core/2019/07/10/whats-new-in-gutenberg-10-july/\">6.1</a>, <a href=\"https://make.wordpress.org/core/2019/06/26/whats-new-in-gutenberg-26th-june/\">6.0</a>, <a href=\"https://make.wordpress.org/core/2019/06/12/whats-new-in-gutenberg-12th-june/\">5.9</a>, <a href=\"https://make.wordpress.org/core/2019/05/29/whats-new-in-gutenberg-29th-may/\">5.8</a>, <a href=\"https://make.wordpress.org/core/2019/05/15/whats-new-in-gutenberg-15th-may/\">5.7</a>, <a href=\"https://make.wordpress.org/core/2019/05/01/whats-new-in-gutenberg-1st-may/\">5.6</a>, <a href=\"https://make.wordpress.org/core/2019/04/17/whats-new-in-gutenberg-17th-april/\">5.5</a>, and <a href=\"https://make.wordpress.org/core/2019/04/03/whats-new-in-gutenberg-3rd-april/\">5.4</a>.</p>\n\n\n\n<h3>Continuous effort on performance</h3>\n\n\n\n<p>The team working on the block editor managed to shave off 1.5 seconds of loading time for a particularly sizeable post (~ 36,000 words, ~ 1,000 blocks) since WordPress 5.2.</p>\n\n\n\n<h2>A new default theme: welcome Twenty Twenty</h2>\n\n\n\n<p>WordPress 5.3 introduces <a href=\"https://make.wordpress.org/core/2019/09/06/introducing-twenty-twenty/\">Twenty Twenty</a>, the latest default theme in our project history.&nbsp;</p>\n\n\n\n<p>This elegant new theme is based on the WordPress theme <a href=\"https://www.andersnoren.se/teman/chaplin-wordpress-theme/\">Chaplin</a> which was released on the WordPress.org theme directory earlier this summer.&nbsp;</p>\n\n\n\n<p>It includes full support for the block editor, empowering users to find the right design for their message.</p>\n\n\n\n<h2>Wait! There is more</h2>\n\n\n\n<p>5.3 is going to be a rich release with the inclusion of numerous enhancements to interactions and the interface.</p>\n\n\n\n<h2>Admin interface enhancements</h2>\n\n\n\n<p>Design and Accessibility teams worked together to port some parts of Gutenberg styles into the whole wp-admin interface. Both teams are going to iterate on these changes during the 5.3 beta cycle. These improved styles fix many accessibility issues, improve color contrasts on form fields and buttons, add consistency between editor and admin interfaces, modernize the WordPress color scheme, add better zoom management, and more.</p>\n\n\n\n<h3>Big Images are coming to WordPress</h3>\n\n\n\n<p>Uploading non-optimized, high-resolution pictures from your smartphone isn’t a problem anymore. WordPress now supports resuming uploads when they fail as well as larger default image sizes. That way pictures you add from the block editor look their best no matter how people get to your site.</p>\n\n\n\n<h3>Automatic image rotation during upload</h3>\n\n\n\n<p>Your images will be correctly rotated upon upload according to the EXIF orientation. This feature was first proposed nine years ago. Never give up on your dreams to see your fixes land in WordPress!</p>\n\n\n\n<h3>Site Health Checks</h3>\n\n\n\n<p>The improvements introduced in 5.3 make it easier to identify and understand areas that may need troubleshooting on your site from the Tools -&gt; Health Check screen.</p>\n\n\n\n<h3>Admin Email Verification</h3>\n\n\n\n<p>You’ll now be periodically asked to check that your admin email address is up to date when you log in as an administrator. This reduces the chance that you’ll get locked out of your site if you change your email address.</p>\n\n\n\n<h2>For Developers</h2>\n\n\n\n<h3>Time/Date component fixes</h3>\n\n\n\n<p>Developers can now work with <a href=\"https://make.wordpress.org/core/2019/09/23/date-time-improvements-wp-5-3/\">dates and timezones</a> in a more reliable way. Date and time functionality has received a number of new API functions for unified timezone retrieval and PHP interoperability, as well as many bug fixes.</p>\n\n\n\n<h3>PHP 7.4 Compatibility</h3>\n\n\n\n<p>The WordPress core team is actively preparing to support PHP 7.4 when it is released later this year. WordPress 5.3 contains <a href=\"https://core.trac.wordpress.org/query?status=accepted&amp;status=assigned&amp;status=closed&amp;status=new&amp;status=reopened&amp;status=reviewing&amp;keywords=~php74&amp;milestone=5.3&amp;order=priority\">multiple changes</a> to remove deprecated functionality and ensure compatibility. Please test this beta release with PHP 7.4 to ensure all functionality continues to work as expected and does not raise any new warnings. </p>\n\n\n\n<h3>Other Changes for Developers</h3>\n\n\n\n<ul><li>Multisite<ul><li>Filter sites by status<ul><li><a href=\"https://core.trac.wordpress.org/ticket/37392\">https://core.trac.wordpress.org/ticket/37392</a>&nbsp;</li><li><a href=\"https://core.trac.wordpress.org/ticket/37684\">https://core.trac.wordpress.org/ticket/37684</a>&nbsp;</li></ul></li><li>Save database version in site meta<ul><li><a href=\"https://core.trac.wordpress.org/ticket/41685\">https://core.trac.wordpress.org/ticket/41685</a>&nbsp;</li></ul></li></ul></li><li>Code modernization and PHP 7.4 support<ul><li><a href=\"https://core.trac.wordpress.org/ticket/47678\">https://core.trac.wordpress.org/ticket/47678</a>&nbsp;</li><li><a href=\"https://core.trac.wordpress.org/ticket/47783\">https://core.trac.wordpress.org/ticket/47783</a></li></ul></li><li>Toggle password view<ul><li><a href=\"https://core.trac.wordpress.org/ticket/42888\">https://core.trac.wordpress.org/ticket/42888</a></li></ul></li></ul>\n\n\n\n<p>Keep your eyes on the <a href=\"https://make.wordpress.org/core/\">Make WordPress Core blog</a> for more <a href=\"https://make.wordpress.org/core/tag/5-3+dev-notes/\">5.3 related developer notes</a> in the coming weeks detailing other changes that you should be aware of.</p>\n\n\n\n<h2>What’s next</h2>\n\n\n\n<p>There have been over 400 tickets fixed in WordPress 5.3 so far with numerous bug fixes and improvements to help smooth your WordPress experience.</p>\n\n\n\n<h2>How to Help</h2>\n\n\n\n<p>Do you speak a language other than English? <a href=\"https://translate.wordpress.org/projects/wp/dev/\">Help us translate WordPress into more than 100 languages</a>!</p>\n\n\n\n<p>If you think you’ve found a bug, you can post to the <a href=\"https://wordpress.org/support/forum/alphabeta/\">Alpha/Beta area</a> in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report, <a href=\"https://core.trac.wordpress.org/newticket\">file one on WordPress Trac</a> where you can also find a list of <a href=\"https://core.trac.wordpress.org/tickets/major\">known bugs</a>.<br></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7114\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:5;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"People of WordPress: Abdullah Ramzan\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:71:\"https://wordpress.org/news/2019/09/people-of-wordpress-abdullah-ramzan/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 06 Sep 2019 18:21:22 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:9:\"heropress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:10:\"Interviews\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7086\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:391:\"You’ve probably heard that WordPress is open-source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories. Meet Abdullah Ramzan, from Lahore, Punjab, Pakistan. Abdullah Ramzan was born and brought [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Yvette Sonneveld\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:6788:\"\n<p><em>You’ve probably heard that WordPress is open-source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories.</em></p>\n\n\n\n<h2><strong>Meet Abdullah Ramzan, from Lahore, Punjab, Pakistan.</strong></h2>\n\n\n\n<p>Abdullah Ramzan was born and brought up in the under-developed city of <a href=\"https://en.wikipedia.org/wiki/Layyah\"><strong>​Layyah​</strong></a>, which is situated in Southern Punjab, Pakistan and surrounded by desert and the river ​Sindh​.</p>\n\n\n\n<p>He graduated from college in his home town and started using a computer in ​2010​ when he joined <a href=\"https://gcuf.edu.pk/\"><strong>​Government College University Faisalabad​</strong></a>. Abdullah’s introduction to WordPress happened while he was finishing the last semester of his degree. His final project was based in WordPress.</p>\n\n\n\n<p>Ramzan’s late mother was the real hero in his life, helping him with his Kindergarten homework and seeing him off to school every day.&nbsp;</p>\n\n\n\n<p>Before her heart surgery, Ramzan visited her in the hospital ICU, where she hugged him and said: ​“<strong>Don’t worry, everything will be good</strong>.” Sadly, his mother died during her surgery. However, her influence on Ramzan’s life continues.</p>\n\n\n\n<h3><strong>Start of Ramzan’s Career:</strong></h3>\n\n\n\n<p>After graduation, Ramzan struggled to get his first job. He first joined PressTigers<strong>​</strong> as a Software Engineer and met Khawaja Fahad Shakeel<a href=\"https://twitter.com/FahadShakeel\"><strong>​</strong></a>, his first mentor. Shakeel provided Ramzan with endless support. Something had always felt missing in his life, but he felt like he was on the right track for the first time in his life when he joined the WordPress community.&nbsp;</p>\n\n\n\n<h3><strong>Community – WordCamps and Meetups:</strong></h3>\n\n\n\n<p>Although Ramzan had used WordPress since ​2015​, attending WordPress meetups and open source contributions turned out to be a game-changer for him. He learned a lot from the WordPress community and platform, and developed strong relationships with several individuals. One of them is <a href=\"https://twitter.com/jainnidhi03\"><strong>​</strong></a>Nidhi Jain​ from Udaipur India who he works with on WordPress development. The second is <a href=\"https://twitter.com/desrosj\"><strong>​</strong></a>Jonathan Desrosiers​ who he continues to learn a lot from.</p>\n\n\n\n<p>In addition, Usman Khalid<a href=\"https://twitter.com/Usman__Khalid\"><strong>​</strong></a>, the lead organizer of WC Karachi, mentored Ramzan, helping him to develop his community skills.&nbsp;</p>\n\n\n\n<p>With the mentorship of these contributors, Ramzan is confident supporting local WordPress groups and helped to organize ​WordCamp Karachi​, where he spoke for the first time at an international level event. He believes that WordPress has contributed much to his personal identity.&nbsp;</p>\n\n\n\n<figure class=\"wp-block-image\"><img src=\"https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?resize=632%2C422&#038;ssl=1\" alt=\"Abdullah Ramzan among a group of community members at WordCamp Karachi 2018\" class=\"wp-image-7088\" srcset=\"https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?resize=1024%2C683&amp;ssl=1 1024w, https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?resize=300%2C200&amp;ssl=1 300w, https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?resize=768%2C512&amp;ssl=1 768w, https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?w=2048&amp;ssl=1 2048w, https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?w=1264&amp;ssl=1 1264w, https://i0.wp.com/wordpress.org/news/files/2019/09/AbdullahRamzan.jpeg?w=1896&amp;ssl=1 1896w\" sizes=\"(max-width: 632px) 100vw, 632px\" data-recalc-dims=\"1\" /><figcaption>Abdullah Ramzan at WordCamp Karachi 2018</figcaption></figure>\n\n\n\n<h3><strong>WordPress and the Future:</strong></h3>\n\n\n\n<p>As a <a href=\"https://www.meetup.com/WordPress-Lahore/members/?op=leaders&amp;sort=name\"><strong>​co-organizer of WordPress Meetup Lahore,​</strong></a> he would love to involve more people in the community leadership team, to provide a platform for people to gather under one roof, to learn and share something with each other. </p>\n\n\n\n<p>But he has loftier ambitions. Impressed by <a href=\"https://walktowc.eu/\">Walk to WordCamp Europe</a>, Abdullah is seriously considering walking to WordCamp Asia. He also one day hopes for the opportunity to serve his country as a senator of Pakistan<a href=\"http://www.senate.gov.pk/\"><strong>​</strong></a> and intends to enter the next senate election.</p>\n\n\n\n<h3><strong>Words of Encouragement</strong></h3>\n\n\n\n<p>Abdullah Ramzan knows there is no shortcut to success. “You have to work hard to achieve your goals,” explained Ramzan. He still has much he wishes to accomplish and hopes to be remembered for his impact on the project.</p>\n\n\n\n<p>Abdullah believes WordPress can never die as long as people don’t stop innovating to meet new demands. The beauty of WordPress is that it is made for everyone.</p>\n\n\n\n<p>Ramzan encouraged, “If you seriously want to do something for yourself, do something for others first. Go for open source, you’ll surely learn how to code. You’ll learn how to work in a team. Join local meetups, meet with the folks: help them, learn from them, and share ideas.”</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<div class=\"wp-block-image\"><figure class=\"alignleft is-resized\"><img src=\"https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=109%2C82&#038;ssl=1\" alt=\"\" class=\"wp-image-7025\" width=\"109\" height=\"82\" srcset=\"https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?w=1024&amp;ssl=1 1024w, https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=300%2C225&amp;ssl=1 300w, https://i1.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo.jpg?resize=768%2C576&amp;ssl=1 768w\" sizes=\"(max-width: 109px) 100vw, 109px\" data-recalc-dims=\"1\" /></figure></div>\n\n\n\n<p><em>This post is based on an article originally published on HeroPress.com, a community initiative created by <a href=\"https://profiles.wordpress.org/topher1kenobe/\">Topher DeRosia</a>. HeroPress highlights people in the WordPress community who have overcome barriers and whose stories would otherwise go unheard.</em></p>\n\n\n\n<p><em>Meet more WordPress community members over at </em><a href=\"https://heropress.com/\"><em>HeroPress.com</em></a><em>!</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7086\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:6;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:48:\"WordPress 5.2.3 Security and Maintenance Release\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:84:\"https://wordpress.org/news/2019/09/wordpress-5-2-3-security-and-maintenance-release/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 05 Sep 2019 01:51:15 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:8:\"Releases\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:8:\"Security\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7064\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:368:\"WordPress 5.2.3 is now available! This security and maintenance release features 29 fixes and enhancements. Plus, it adds a number of security fixes—see the list below. These bugs affect WordPress versions 5.2.2 and earlier; version 5.2.3 fixes them, so you&#8217;ll want to upgrade. If you haven&#8217;t yet updated to 5.2, there are also updated versions [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:13:\"Jake Spurlock\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:7645:\"\n<p>WordPress 5.2.3 is now available! </p>\n\n\n\n<p>This security and maintenance release features 29 fixes and enhancements. Plus, it adds a number of security fixes—see the list below.</p>\n\n\n\n<p>These bugs affect WordPress versions 5.2.2 and earlier; version 5.2.3 fixes them, so you&#8217;ll want to upgrade. </p>\n\n\n\n<p>If you haven&#8217;t yet updated to 5.2, there are also updated versions of 5.0 and earlier that fix the bugs for you.</p>\n\n\n\n<h3>Security Updates</h3>\n\n\n\n<ul><li>Props to&nbsp;<a href=\"https://blog.ripstech.com/authors/simon-scannell/\">Simon Scannell of RIPS Technologies</a>&nbsp;for finding and disclosing two issues. The first, a cross-site scripting (XSS) vulnerability found in post previews by contributors. The second was a cross-site scripting vulnerability in stored comments.&nbsp;</li><li>Props to&nbsp;<a href=\"https://security-consulting.icu/blog/\">Tim Coen</a>&nbsp;for disclosing an issue where validation and sanitization of a URL could lead to an open redirect.&nbsp;</li><li>Props to Anshul Jain for disclosing reflected cross-site scripting during media uploads.</li><li>Props to&nbsp;<a href=\"https://fortiguard.com/\">Zhouyuan Yang of Fortinet’s FortiGuard Labs</a>&nbsp;who disclosed a vulnerability for cross-site scripting (XSS) in shortcode previews.</li><li>Props to Ian Dunn of the Core Security Team for finding and disclosing a case where reflected cross-site scripting could be found in the dashboard.</li><li>Props to Soroush Dalili (<a href=\"https://twitter.com/irsdl?lang=en\">@irsdl</a>) from NCC Group for disclosing an issue with URL sanitization that can lead to cross-site scripting (XSS) attacks.</li><li>In addition to the above changes, we are also updating jQuery on older versions of WordPress. This change was&nbsp;<a href=\"https://core.trac.wordpress.org/ticket/47020\">added in 5.2.1</a>&nbsp;and is now being brought to older versions.&nbsp;</li></ul>\n\n\n\n<p>You can browse the&nbsp;<a href=\"https://core.trac.wordpress.org/query?status=closed&amp;resolution=fixed&amp;milestone=5.2.3&amp;order=priority\">full list of changes on Trac</a>.</p>\n\n\n\n<p>For more info, browse the full list of changes on Trac or check out the Version&nbsp;<a href=\"https://wordpress.org/support/wordpress-version/version-5-2-3/\">5.2.3 documentation page</a>.</p>\n\n\n\n<p>WordPress 5.2.3 is a short-cycle maintenance release. The next major release will be&nbsp;<a href=\"https://make.wordpress.org/core/5-3/\">version 5.3.</a></p>\n\n\n\n<p>You can download WordPress 5.2.3 from the button at the top of this page, or visit your<strong> Dashboard → Updates</strong> and click <strong>Update Now</strong>. </p>\n\n\n\n<p>If you have sites that support automatic background updates, they&#8217;ve already started the update process.</p>\n\n\n\n<h2>Thanks and props!</h2>\n\n\n\n<p>This release brings together contributions from more than 62 other people. Thank you to everyone who made this release possible!</p>\n\n\n\n<p><a href=\"https://profiles.wordpress.org/adamsilverstein/\">Adam Silverstein</a>,&nbsp;<a href=\"https://profiles.wordpress.org/xknown/\">Alex Concha</a>,&nbsp;<a href=\"https://profiles.wordpress.org/alpipego/\">Alex Goller</a>,&nbsp;<a href=\"https://profiles.wordpress.org/afercia/\">Andrea Fercia</a>,&nbsp;<a href=\"https://profiles.wordpress.org/aduth/\">Andrew Duthie</a>,&nbsp;<a href=\"https://profiles.wordpress.org/azaozz/\">Andrew Ozz</a>,&nbsp;<a href=\"https://profiles.wordpress.org/afragen/\">Andy Fragen</a>, <a href=\"https://profiles.wordpress.org/762e5e74/\">Ashish Shukla</a>,&nbsp;<a href=\"https://profiles.wordpress.org/wpboss/\">Aslam Shekh</a>,&nbsp;<a href=\"https://profiles.wordpress.org/backermann1978/\">backermann1978</a>,&nbsp;<a href=\"https://profiles.wordpress.org/cdog/\">Catalin Dogaru</a>,&nbsp;<a href=\"https://profiles.wordpress.org/chetan200891/\">Chetan Prajapati</a>,&nbsp;<a href=\"https://profiles.wordpress.org/aprea/\">Chris Aprea</a>,&nbsp;<a href=\"https://profiles.wordpress.org/christophherr/\">Christoph Herr</a>,&nbsp;<a href=\"https://profiles.wordpress.org/danmicamediacom/\">dan@micamedia.com</a>,&nbsp;<a href=\"https://profiles.wordpress.org/diddledan/\">Daniel Llewellyn</a>,&nbsp;<a href=\"https://profiles.wordpress.org/donmhico/\">donmhico</a>,&nbsp;<a href=\"https://profiles.wordpress.org/iseulde/\">Ella van Durpe</a>,&nbsp;<a href=\"https://profiles.wordpress.org/epiqueras/\">epiqueras</a>,&nbsp;<a href=\"https://profiles.wordpress.org/fencer04/\">Fencer04</a>,&nbsp;<a href=\"https://profiles.wordpress.org/flaviozavan/\">flaviozavan</a>,&nbsp;<a href=\"https://profiles.wordpress.org/garrett-eclipse/\">Garrett Hyder</a>,&nbsp;<a href=\"https://profiles.wordpress.org/pento/\">Gary Pendergast</a>,&nbsp;<a href=\"https://profiles.wordpress.org/gqevu6bsiz/\">gqevu6bsiz</a>,&nbsp;<a href=\"https://profiles.wordpress.org/thakkarhardik/\">Hardik Thakkar</a>,&nbsp;<a href=\"https://profiles.wordpress.org/ianbelanger/\">Ian Belanger</a>,&nbsp;<a href=\"https://profiles.wordpress.org/iandunn/\">Ian Dunn</a>,&nbsp;<a href=\"https://profiles.wordpress.org/whyisjake/\">Jake Spurlock</a>,&nbsp;<a href=\"https://profiles.wordpress.org/audrasjb/\">Jb Audras</a>,&nbsp;<a href=\"https://profiles.wordpress.org/jeffpaul/\">Jeffrey Paul</a>,&nbsp;<a href=\"https://profiles.wordpress.org/jikamens/\">jikamens</a>,&nbsp;<a href=\"https://profiles.wordpress.org/johnbillion/\">John Blackbourn</a>,&nbsp;<a href=\"https://profiles.wordpress.org/desrosj/\">Jonathan Desrosiers</a>, <a href=\"https://profiles.wordpress.org/jorgefilipecosta/\">Jorge Costa,</a> <a href=\"https://profiles.wordpress.org/karlgroves/\">karlgroves</a>,&nbsp;<a href=\"https://profiles.wordpress.org/kjellr/\">Kjell Reigstad</a>,&nbsp;<a href=\"https://profiles.wordpress.org/laurelfulford/\">laurelfulford</a>,&nbsp;<a href=\"https://profiles.wordpress.org/majemedia/\">Maje Media LLC</a>,&nbsp;<a href=\"https://profiles.wordpress.org/mspatovaliyski/\">Martin Spatovaliyski</a>,&nbsp;<a href=\"https://profiles.wordpress.org/marybaum/\">Mary Baum</a>,&nbsp;<a href=\"https://profiles.wordpress.org/monikarao/\">Monika Rao</a>,&nbsp;<a href=\"https://profiles.wordpress.org/mukesh27/\">Mukesh Panchal</a>,&nbsp;<a href=\"https://profiles.wordpress.org/nayana123/\">nayana123</a>,&nbsp;<a href=\"https://profiles.wordpress.org/greatislander/\">Ned Zimmerman</a>,&nbsp;<a href=\"https://profiles.wordpress.org/nickdaugherty/\">Nick Daugherty</a>, <a href=\"https://profiles.wordpress.org/rabmalin/\">Nilambar Sharma</a>,&nbsp;<a href=\"https://profiles.wordpress.org/nmenescardi/\">nmenescardi</a>,&nbsp;<a href=\"https://profiles.wordpress.org/bassgang/\">Paul Vincent Beigang</a>,&nbsp;<a href=\"https://profiles.wordpress.org/pedromendonca/\">Pedro Mendonça</a>,&nbsp;<a href=\"https://profiles.wordpress.org/peterwilsoncc/\">Peter Wilson</a>,&nbsp;<a href=\"https://profiles.wordpress.org/sergeybiryukov/\">Sergey Biryukov</a>,&nbsp;<a href=\"https://profiles.wordpress.org/vjik/\">Sergey Predvoditelev</a>,&nbsp;<a href=\"https://profiles.wordpress.org/sharaz/\">Sharaz Shahid</a>,&nbsp;<a href=\"https://profiles.wordpress.org/sstoqnov/\">Stanimir Stoyanov</a>,&nbsp;<a href=\"https://profiles.wordpress.org/ryokuhi/\">Stefano Minoia</a>,&nbsp;<a href=\"https://profiles.wordpress.org/karmatosed/\">Tammie Lister</a>,&nbsp;<a href=\"https://profiles.wordpress.org/isabel_brison/\">tellthemachines</a>,&nbsp;<a href=\"https://profiles.wordpress.org/tmatsuur/\">tmatsuur</a>,&nbsp;<a href=\"https://profiles.wordpress.org/vaishalipanchal/\">Vaishali Panchal</a>,&nbsp;<a href=\"https://profiles.wordpress.org/vortfu/\">vortfu</a>,&nbsp;<a href=\"https://profiles.wordpress.org/tsewlliw/\">Will West</a>, and&nbsp;<a href=\"https://profiles.wordpress.org/yarnboy/\">yarnboy</a>.</p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7064\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:7;a:6:{s:4:\"data\";s:48:\"\n		\n		\n				\n		\n				\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"The Month in WordPress: August 2019\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:70:\"https://wordpress.org/news/2019/09/the-month-in-wordpress-august-2019/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 02 Sep 2019 10:00:13 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"Month in WordPress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7059\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:374:\"This has been a particularly busy month, with a number of interesting and ambitious proposals for the WordPress project along with active progress across the entire community. Core Development and Schedule The upcoming minor release of WordPress, v5.2.3, is currently in the release candidate phase and available for testing. Following that, the next major release [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:15:\"Hugh Lashbrooke\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:9644:\"\n<p>This has been a particularly busy month, with a number of interesting and ambitious proposals for the WordPress project along with active progress across the entire community. </p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>Core Development and Schedule</h2>\n\n\n\n<p>The upcoming minor release of WordPress, v5.2.3, is currently <a href=\"https://make.wordpress.org/core/2019/08/22/wordpress-5-2-3-rc-1/\">in the release candidate phase</a> and available for testing.</p>\n\n\n\n<p>Following that, the next major release is v5.3 and the Core team has laid out <a href=\"https://make.wordpress.org/core/2019/08/21/wordpress-5-3-schedule-and-scope/\">a schedule and scope</a> for development. In addition, <a href=\"https://make.wordpress.org/core/2019/08/27/bug-scrub-schedule-for-5-3/\">a bug scrub schedule</a> and <a href=\"https://make.wordpress.org/accessibility/2019/08/28/wordpress-5-3-accessibility-focused-bug-scrub-schedule/\">an accessibility-focused schedule</a> have been set out to provide dedicated times for contributors to work on ironing out the bugs in the release.</p>\n\n\n\n<p>Want to get involved in building WordPress Core? Follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>.</p>\n\n\n\n<h2>Proposal for User Privacy Improvements</h2>\n\n\n\n<p>The Core Privacy Team <a href=\"https://make.wordpress.org/core/2019/08/07/feature-plugin-discussion-a-consent-and-logging-mechanism-for-user-privacy/\">has proposed a feature plugin</a> to build a consent and logging mechanism for user privacy. This project will focus on improving the user privacy controls in WordPress Core in order to protect site owners and users alike.</p>\n\n\n\n<p>The proposal includes some useful information about building effective controls for users, how other projects have worked on similar efforts, and what kind of time and resources the project will need in order to be developed.</p>\n\n\n\n<p>Want to get involved in this feature project? Follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core-privacy channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a> where there are open office hours every Wednesday at 19:00 UTC.</p>\n\n\n\n<h2>Core Notification System Proposal</h2>\n\n\n\n<p><a href=\"https://make.wordpress.org/core/2019/08/05/feature-project-proposal-wp-notify/\">A proposal has been made</a> for a new feature project to build a robust notification system for WordPress Core. The aim of the project is to build a system to handle notifications for site owners that can be extended by plugin and theme developers.</p>\n\n\n\n<p>This proposal comes on the back of <a href=\"https://core.trac.wordpress.org/ticket/43484\">a Trac ticket</a> opened 18 months ago. With weekly meetings to discuss the project, the team behind WP Notify are <a href=\"https://make.wordpress.org/core/2019/08/28/wp-notify-meeting-recap-august-26-2019/\">in the planning phase</a> while they establish exactly how to develop the feature.<br></p>\n\n\n\n<p>Want to get involved in this feature project? Follow <a href=\"https://make.wordpress.org/core/\">the Core team blog</a>, and join the #core channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a> &#8211; meetings for this project happen every Monday at 14:00 and 22:00 UTC.</p>\n\n\n\n<h2>Local WordPress Development Environment</h2>\n\n\n\n<p>Members of the Core Team <a href=\"https://make.wordpress.org/core/2019/08/05/wordpress-local-environment/\">have put together a local development environment for WordPress</a> that runs on Docker. This environment provides an easy way for developers to get involved with WordPress core development. </p>\n\n\n\n<p>The work on this was inspired by the environment used for local Gutenberg development, <a href=\"https://make.wordpress.org/core/2019/08/30/gutenberg-local-environment-rewrite/\">which has since been improved</a> based on the new work that has been done here.</p>\n\n\n\n<p><a href=\"https://make.wordpress.org/core/2019/08/05/wordpress-local-environment/\">The announcement post</a> explains how to use the Docker environment. If you have any feedback or bug reports, please comment on the post directly.</p>\n\n\n\n<h2>Updates for Older Versions of WordPress</h2>\n\n\n\n<p>On July 30, the Security Team shared that security updates need to undergo the same testing and release process for every major version of WordPress. This means they have to provide long-term support for over fifteen major versions of WordPress. This requires a lot of time and effort, and <a href=\"https://make.wordpress.org/core/2019/07/29/should-security-fixes-continue-to-be-backported-to-very-old-versions-of-wordpress/\">the team has sought feedback on potential solutions for this challenge</a>. </p>\n\n\n\n<p>Following this discussion, <a href=\"https://make.wordpress.org/core/2019/08/07/proposal-auto-update-old-versions-to-4-7/\">a proposal was made to auto-update old versions of WordPress to v4.7</a>. This proposal garnered many responses and has since been updated to incorporate feedback from comments. The current recommendation is to secure the six latest versions and to eventually auto-update all older versions of WordPress to 4.7. Since this proposal was made, it has been discussed at <a href=\"https://make.wordpress.org/hosting/2019/08/26/hosting-meeting-notes-august-19-2019/\">Hosting Team meetings</a> and <a href=\"https://make.wordpress.org/core/2019/08/16/follow-up-discussion-on-major-auto-updates/\">Dev Chat meetings</a>, and the conversation is still ongoing.</p>\n\n\n\n<p>Want to provide feedback on this proposal? Comment on <a href=\"https://make.wordpress.org/core/2019/08/07/proposal-auto-update-old-versions-to-4-7/\">the original post</a> with your thoughts.</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>Further Reading:</h2>\n\n\n\n<ul><li>The recommended minimum PHP version for WordPress Core <a href=\"https://make.wordpress.org/core/2019/08/13/increasing-the-recommended-php-version-in-core/\">has been increased to 7.0</a>.</li><li>Gutenberg development continues at a rapid pace with <a href=\"https://make.wordpress.org/core/2019/08/28/whats-new-in-gutenberg-28-august/\">new updates</a> coming out every month.</li><li>The Core Team is kicking off bug scrub and triage sessions <a href=\"https://make.wordpress.org/core/2019/08/26/apac-triage-and-bug-scrub-sessions/\">at APAC-friendly times</a>.</li><li>WordCamp US announced <a href=\"https://2019.us.wordcamp.org/schedule/\">the event schedule</a> to take place on November 1-3.</li><li>The Plugin Team reminded developers that <a href=\"https://make.wordpress.org/plugins/2019/08/23/reminder-developers-must-comply-with-the-forum-guidelines/\">they need to stick to the Plugin Directory forum guidelines</a> if they choose to use them for support.</li><li>WordPress project leadership is looking at <a href=\"https://make.wordpress.org/updates/2019/07/30/update-sanctions-and-open-source/\">how to respond to political sanctions</a> in light of the open-source nature of the project.&nbsp;</li><li>The Community Team has proposed <a href=\"https://make.wordpress.org/community/2019/08/19/proposal-speaker-feedback-tool/\">a WordCamp speaker feedback tool</a> that will allow more reliable and consistent feedback for WordCamps speakers all over the world.</li><li>The Five for the Future project now has <a href=\"https://make.wordpress.org/updates/2019/08/29/five-for-the-future-proposed-scope-and-mockups/\">more complete mockups</a> and a plan to move forward.</li><li>The Theme Review Team decided to terminate the Trusted Authors program for a number of reasons <a href=\"https://make.wordpress.org/themes/2019/08/14/trusted-author-program-a-year-of-its-journey/\">outlined in the announcement post</a>.</li><li>The Design Team is taking a look at <a href=\"https://make.wordpress.org/design/2019/08/28/discussion-about-the-about-page/\">how they can improve the About page</a> in future WordPress releases.</li><li>This month saw <a href=\"https://make.wordpress.org/cli/2019/08/14/wp-cli-release-v2-3-0/\">the release of v2.3 of WP-CLI</a>, including a number of new commands and improvements.</li><li>WordCamp websites can now make use of <a href=\"https://make.wordpress.org/community/2019/08/19/wordcamp-blocks-are-live/\">custom blocks in the block editor</a> for crafting their content.</li><li>The Mobile Team are looking for testers for the v13.2 release of the <a href=\"https://make.wordpress.org/mobile/2019/08/27/call-for-testing-wordpress-for-android-13-2/\">Android</a> and <a href=\"https://make.wordpress.org/mobile/2019/08/29/call-for-testing-wordpress-for-ios-13-2/\">iOS</a> apps.</li><li>The WordCamp Asia team <a href=\"https://2020.asia.wordcamp.org/2019/08/20/wordcamp-asia-logo-a-design-journey\">published an interesting look</a> at the journey they took to design the event logo.</li><li><a href=\"https://make.wordpress.org/community/2019/08/26/call-for-volunteers-2020-global-sponsorship-working-group/\">A working group of volunteers is being formed</a> to work out the details for the Global Sponsorship Program in 2020.</li><li>In an effort to increase the accessibility of available WordPress themes, the Theme Review Team now requires that <a href=\"https://make.wordpress.org/themes/2019/08/03/planning-for-keyboard-navigation/\">all themes include keyboard navigation</a>.</li></ul>\n\n\n\n<p><em>Have a story that we should include in the next “Month in WordPress” post? Please </em><a href=\"https://make.wordpress.org/community/month-in-wordpress-submissions/\"><em>submit it here</em></a><em>.</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7059\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:8;a:6:{s:4:\"data\";s:51:\"\n		\n		\n				\n		\n				\n		\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:32:\"People of WordPress: Amanda Rush\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:67:\"https://wordpress.org/news/2019/08/people-of-wordpress-amanda-rush/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 09 Aug 2019 21:23:23 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:2:{i:0;a:5:{s:4:\"data\";s:9:\"heropress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}i:1;a:5:{s:4:\"data\";s:10:\"Interviews\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7047\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:373:\"You’ve probably heard that WordPress is open source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories. Meet Amanda Rush from Augusta, Georgia, USA. Amanda Rush is a WordPress [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Yvette Sonneveld\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:6543:\"\n<p><em>You’ve probably heard that WordPress is open source software, and may know that it’s created and run by volunteers. WordPress enthusiasts share many examples of how WordPress changed people’s lives for the better. This monthly series shares some of those lesser-known, amazing stories.</em></p>\n\n\n\n<h2><strong>Meet Amanda Rush from Augusta, Georgia, USA.</strong></h2>\n\n\n\n<p>Amanda Rush is a WordPress advocate with a visual disability. She first started using computers in 1985, which enabled her to turn in homework to her sighted teachers. Screen reader technology for Windows was in its infancy then, so she worked in DOS almost exclusively.</p>\n\n\n\n<p>After graduating high school, Amanda went to college to study computer science, programming with DOS-based tools since compilers for Windows were still inaccessible. As part of her computer science course of study, she learned HTML which began her career in web development.</p>\n\n\n\n<h2>How Amanda got started with WordPress</h2>\n\n\n\n<p>Amanda began maintaining a personal website, and eventually began publishing her own content using LiveJournal. However, controlling the way the page around her content looked was hard, and she soon outgrew the hosted solution.</p>\n\n\n\n<p>So in 2005, Amanda bought customerservant.com, set up a very simple CMS for blogging, and started publishing there. She accepted the lack of design and content, and lack of easy customization because she wasn’t willing to code her own solution. Nor did she want to move to another hosted solution, as she liked being able to customize her own site, as well as publish content.</p>\n\n\n\n<h3><strong>Hebrew dates led her to WordPress</strong></h3>\n\n\n\n<p>At some point, Amanda was looking for an easy way to display the Hebrew dates alongside the Gregorian dates on her blog entries. Unfortunately, the blogging software she was using at the time, did not offer customization options at that level. She decided to research alternative solutions and came across a WordPress plugin that did just that.&nbsp;</p>\n\n\n\n<p>The fact that WordPress would not keep her locked into a visual editor, used themes to customize styling, and offered ways to mark up content, immediately appealed to Amanda. She decided to give it a go.</p>\n\n\n\n<h3><strong>Accessibility caused her to dive deeper</strong></h3>\n\n\n\n<p>When the software Amanda used at work became completely inaccessible, she started learning about WordPress. While she was learning about this new software, <a href=\"https://en.wikipedia.org/wiki/Web_2.0\">Web 2.0</a> was introduced. The lack of support for it in the screen reader she used meant that WordPress administration was completely inaccessible. To get anything done, Amanda needed to learn to find her way in WordPress’ file structure.</p>\n\n\n\n<p>Eventually Amanda started working as an independent contractor for the largest screen reader developer in the market, Freedom Scientific. She worked from home every day and hacked on WordPress after hours.</p>\n\n\n\n<p>Unfortunately Amanda hit a rough patch when her job at Freedom Scientific ended. Using her savings she undertook further studies for various Cisco and Red Hat certifications, only to discover that the required testing for these certifications were completely inaccessible. She could study all she wanted, but wasn’t able to receive grades to pass the courses.</p>\n\n\n\n<p>She lost her financial aid, her health took a turn for the worse, she was diagnosed with Lupus, and lost her apartment. Amanda relocated to Augusta where she had supportive friends who offered her a couch and a roof over her head.</p>\n\n\n\n<h3><strong>But Amanda refused to give up</strong></h3>\n\n\n\n<p>Amanda continued to hack WordPress through all of this. It was the only stable part of her life. She wanted to help make WordPress accessible for people with disabilities, and in 2012 joined the&nbsp; WordPress Accessibility Team. Shortly after that, she finally got her own place to live, and started thinking about what she was going to do with the rest of her working life.</p>\n\n\n\n<p>Listening to podcasts led her to take part in <a href=\"http://wordsesh.org/\">WordSesh</a>, which was delivered completely online and enabled Amanda to participate without needing to travel. She began to interact with WordPress people on Twitter, and continued to contribute to the community as part of the WordPress Accessibility Team. Things had finally started to pick up.</p>\n\n\n\n<h2><strong>Starting her own business</strong></h2>\n\n\n\n<p>In 2014, Amanda officially launched her own business, <a href=\"http://www.customerservant.com/\">Customer Servant Consultancy</a>. Since WordPress is open source, and becoming increasingly accessible, Amanda could modify WordPress to build whatever she wanted and not be at the mercy of web and application developers who know nothing about accessibility. And if she got stuck, she could tap into the community and its resources.</p>\n\n\n\n<p>Improving her circumstances and becoming more self-sufficient means Amanda was able to take back some control over her life in general. She was able to gain independence and create her own business despite being part of the blind community, which has an 80% unemployment rate.&nbsp;</p>\n\n\n\n<p>In her own words:</p>\n\n\n\n<blockquote class=\"wp-block-quote\"><p><em>We’re still fighting discrimination in the workplace, and we’re still fighting for equal access when it comes to the technology we use to do our jobs. But the beauty of WordPress and its community is that we can create opportunities for ourselves.</em></p><p><em>I urge my fellow blind community members to join me inside this wonderful thing called WordPress. Because it will change your lives if you let it.</em></p><cite>Amanda Rush, entrepreneur</cite></blockquote>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<div class=\"wp-block-image\"><figure class=\"alignleft is-resized\"><img src=\"https://i0.wp.com/wordpress.org/news/files/2019/07/heropress_large_white_logo-1.jpg?fit=632%2C474&amp;ssl=1\" alt=\"\" class=\"wp-image-7026\" width=\"110\" height=\"83\" /></figure></div>\n\n\n\n<p><em>This post is based on an article originally published on HeroPress.com, a community initiative created by <a href=\"https://profiles.wordpress.org/topher1kenobe/\">Topher DeRosia</a>. HeroPress highlights people in the WordPress community who have overcome barriers and whose stories would otherwise go unheard.</em></p>\n\n\n\n<p><em>Meet more WordPress community members over at </em><a href=\"https://heropress.com/\"><em>HeroPress.com</em></a><em>!</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7047\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:9;a:6:{s:4:\"data\";s:48:\"\n		\n		\n				\n		\n				\n\n		\n				\n								\n										\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:4:{s:0:\"\";a:6:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:33:\"The Month in WordPress: July 2019\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:68:\"https://wordpress.org/news/2019/08/the-month-in-wordpress-july-2019/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 01 Aug 2019 09:56:05 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"category\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"Month in WordPress\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"https://wordpress.org/news/?p=7040\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:336:\"This month has been characterized by exciting plans and big announcements &#8211; read on to find out what they are and what it all means for the future of the WordPress project. WordCamp Asia Announced The inaugural WordCamp Asia will be in Bangkok, Thailand, on February 21-23, 2020. This will be the first regional WordCamp [&#8230;]\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:15:\"Hugh Lashbrooke\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:40:\"http://purl.org/rss/1.0/modules/content/\";a:1:{s:7:\"encoded\";a:1:{i:0;a:5:{s:4:\"data\";s:6983:\"\n<p>This month has been characterized by exciting plans and big announcements &#8211; read on to find out what they are and what it all means for the future of the WordPress project.</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>WordCamp Asia Announced</h2>\n\n\n\n<p>The inaugural WordCamp Asia will be in Bangkok, Thailand, on February 21-23, 2020. This will be the first regional WordCamp in Asia and it comes after many years of discussions and planning. You can find more information about the event <a href=\"https://2020.asia.wordcamp.org/\">on their website</a> and subscribe to stay up to date with the latest information.</p>\n\n\n\n<p>This is the latest flagship event in the WordCamp program, following WordCamps Europe and US. Tickets <a href=\"https://2020.asia.wordcamp.org/tickets/\">are now on sale</a> and the <a href=\"https://2020.asia.wordcamp.org/call-for-speakers/\">call for speakers</a> is open. Want to get involved in WordCamp Asia? Keep an eye out for volunteer applications, or buy a micro sponsor ticket. You can also join the #wcasia channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a> for updates.</p>\n\n\n\n<h2>WordCamp US Planning Continues</h2>\n\n\n\n<p>The WordCamp US organizing team is excited to announce some new additions to this year’s WCUS in St. Louis, Missouri, on November 1-3, 2019. The first is that there will be an onsite KidsCamp: child-friendly lessons that introduce your young one(s) to the wonderful world of WordPress.&nbsp; <a href=\"https://2019.us.wordcamp.org/kidscamp/\">You can register your child for KidsCamp here</a>. In addition, free, onsite childcare will be provided at this year’s event &#8211; <a href=\"https://2019.us.wordcamp.org/child-care/\">you can sign up here</a>.</p>\n\n\n\n<p>Looking for further ways to get involved? The <a href=\"https://2019.us.wordcamp.org/call-for-volunteers-form/\">call for volunteers is now open</a>. For more information on WordCamp US, <a href=\"https://2019.us.wordcamp.org/\">please visit the event website</a>.</p>\n\n\n\n<h2>Exploring Updates to the WordPress User &amp; Developer Survey</h2>\n\n\n\n<p>To improve the annual WordPress User &amp; Developer Survey, <a href=\"https://make.wordpress.org/updates/2019/06/28/updates-to-the-wordpress-user-developer-survey/\">a call has been made</a> for updates and additional questions that can help us all better understand how people use WordPress.</p>\n\n\n\n<p>To improve the survey, contributor teams are suggesting topics and information that should be gathered to inform contributor work in 2020. Please add your feedback <a href=\"https://make.wordpress.org/updates/2019/06/28/updates-to-the-wordpress-user-developer-survey/\">to the post</a>.</p>\n\n\n\n<h2>Gutenberg Usability Testing Continues</h2>\n\n\n\n<p>Usability tests for Gutenberg continued through June 2019, and <a href=\"https://make.wordpress.org/test/2019/07/10/gutenberg-usability-testing-for-june-2019/\">insights from three recent videos were published</a> last month. This month’s test was similar to WordCamp Europe’s usability tests, and you can read more about those in the <a href=\"https://make.wordpress.org/test/2019/07/05/wceu-usability-test-results-part-one/\">part one</a> and <a href=\"https://make.wordpress.org/test/2019/07/09/wceu-usability-test-results-part-two/\">part two</a> posts. Please help by watching these videos and sharing your observations as comments on the relevant post.</p>\n\n\n\n<p>If you want to help with usability testing, you can also join the #research channel in <a href=\"https://make.wordpress.org/chat/\">the Making WordPress Slack group</a>, or you can write a test script that can be usability tested for Gutenberg.</p>\n\n\n\n<hr class=\"wp-block-separator\" />\n\n\n\n<h2>Further Reading:</h2>\n\n\n\n<ul><li><a href=\"https://make.wordpress.org/updates/2019/07/23/proposal-a-wordpress-advisory-board/\">A proposal has been made</a> to put together a nominated WordPress Advisory Board &#8211; this is certainly an exciting development for the project.</li><li>The Design team <a href=\"https://make.wordpress.org/design/2019/06/28/wceu-contribution-day-recap-design-team/\">reported on the work they did</a> at the WordCamp Europe Contributor Day.</li><li>The Theme Review Team <a href=\"https://make.wordpress.org/themes/2019/07/22/theme-sniffer-v1-1-0-and-wpthemereview-v0-2-0-release/\">has released updated versions</a> of their ThemeSniffer tool and coding standards.</li><li>The Security team <a href=\"https://make.wordpress.org/core/2019/07/29/should-security-fixes-continue-to-be-backported-to-very-old-versions-of-wordpress/\">is looking for feedback</a> on whether security fixes should continue to be backported to very old versions of WordPress. </li><li>The Design and Community teams have worked together to come up with <a href=\"https://make.wordpress.org/community/2019/07/29/proposal-clearer-wordcamp-and-wordpress-chapter-meetup-logo-guidelines/\">official guidelines for how WordCamp logos should be designed</a>.</li><li>The Core team has implemented <a href=\"https://make.wordpress.org/core/2019/07/12/php-coding-standards-changes/\">a few changes</a> to the PHP coding standards within WordPress Core.</li><li>The Community Team <a href=\"https://make.wordpress.org/community/2019/07/26/discussion-what-to-do-in-case-of-irreconcilable-differences/\">is looking for feedback</a> on a tough decision that needs to be made regarding the implementation of the licence expectations within the meetup program.</li><li>The Design team <a href=\"https://make.wordpress.org/design/2019/07/11/block-directory-in-wp-admin-concepts/\">has presented some designs</a> for a Block Directory within the WordPress dashboard.</li><li>A recent release of WordPress saw an increase in the minimum required version of PHP &#8211; the Core team is now looking at <a href=\"https://make.wordpress.org/core/2019/07/29/proposal-for-increasing-recommended-php-version-in-wordpress/\">increasing that minimum further</a>.</li><li>The Site Health feature was first introduced in the 5.1 release of WordPress, and at WordCamp Europe this year <a href=\"https://make.wordpress.org/core/2019/07/01/new-core-component-site-health/\">a new Core component for the feature was added to the project structure</a>.</li><li>The Community Team has posted some interesting data regarding <a href=\"https://make.wordpress.org/community/2019/07/29/numbers-in-the-netherlands/\">WordCamps in the Netherlands</a> over the last few years, as well as <a href=\"https://make.wordpress.org/community/2019/07/31/wordcamps-in-2018/\">WordCamps in 2018</a>.</li><li>The WordCamp Europe team <a href=\"https://2019.europe.wordcamp.org/2019/07/15/survey-results/\">released the results of the attendee survey</a> from this year&#8217;s event in Berlin.</li></ul>\n\n\n\n<p><em>Have a story that we should include in the next “Month in WordPress” post? Please </em><a href=\"https://make.wordpress.org/community/month-in-wordpress-submissions/\"><em>submit it here</em></a><em>.</em></p>\n\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:7:\"post-id\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"7040\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}}}s:27:\"http://www.w3.org/2005/Atom\";a:1:{s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:0:\"\";s:7:\"attribs\";a:1:{s:0:\"\";a:3:{s:4:\"href\";s:32:\"https://wordpress.org/news/feed/\";s:3:\"rel\";s:4:\"self\";s:4:\"type\";s:19:\"application/rss+xml\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:44:\"http://purl.org/rss/1.0/modules/syndication/\";a:2:{s:12:\"updatePeriod\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"\n	hourly	\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:15:\"updateFrequency\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"\n	1	\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:30:\"com-wordpress:feed-additions:1\";a:1:{s:4:\"site\";a:1:{i:0;a:5:{s:4:\"data\";s:8:\"14607090\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}}}}}}}}s:4:\"type\";i:128;s:7:\"headers\";O:42:\"Requests_Utility_CaseInsensitiveDictionary\":1:{s:7:\"\0*\0data\";a:9:{s:6:\"server\";s:5:\"nginx\";s:4:\"date\";s:29:\"Thu, 10 Oct 2019 00:32:35 GMT\";s:12:\"content-type\";s:34:\"application/rss+xml; charset=UTF-8\";s:25:\"strict-transport-security\";s:11:\"max-age=360\";s:6:\"x-olaf\";s:3:\"⛄\";s:13:\"last-modified\";s:29:\"Tue, 08 Oct 2019 21:14:26 GMT\";s:4:\"link\";s:63:\"<https://wordpress.org/news/wp-json/>; rel=\"https://api.w.org/\"\";s:15:\"x-frame-options\";s:10:\"SAMEORIGIN\";s:4:\"x-nc\";s:9:\"HIT ord 2\";}}s:5:\"build\";s:14:\"20130911040210\";}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(203, '_transient_timeout_feed_mod_9bbd59226dc36b9b26cd43f15694c5c3', '1570710760', 'no'),
(204, '_transient_feed_mod_9bbd59226dc36b9b26cd43f15694c5c3', '1570667560', 'no'),
(205, '_transient_timeout_dash_v2_88ae138922fe95674369b1cb3d215a2b', '1570710770', 'no'),
(206, '_transient_dash_v2_88ae138922fe95674369b1cb3d215a2b', '<div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://wordpress.org/news/2019/10/wordpress-5-3-beta-3/\'>WordPress 5.3 Beta 3</a></li></ul></div><div class=\"rss-widget\"><p><strong>RSS Error:</strong> WP HTTP Error: cURL error 28: Operation timed out after 10002 milliseconds with 0 bytes received</p></div>', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(5, 6, '_edit_lock', '1570610348:1'),
(6, 17, '_edit_lock', '1570463850:1'),
(7, 17, '_wp_page_template', 'matchs.php'),
(8, 19, '_wp_attached_file', '2019/10/thSWBQH1ZH.jpg'),
(9, 19, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:298;s:6:\"height\";i:221;s:4:\"file\";s:22:\"2019/10/thSWBQH1ZH.jpg\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"thSWBQH1ZH-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(10, 7, '_edit_lock', '1570612556:1'),
(11, 20, '_wp_attached_file', '2019/10/thPG8X5W98.jpg'),
(12, 20, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:373;s:6:\"height\";i:245;s:4:\"file\";s:22:\"2019/10/thPG8X5W98.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"thPG8X5W98-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"thPG8X5W98-300x197.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:197;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(15, 22, '_wp_attached_file', '2019/10/Gambar-bendera-Timor-leste.gif'),
(16, 22, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:390;s:6:\"height\";i:265;s:4:\"file\";s:38:\"2019/10/Gambar-bendera-Timor-leste.gif\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:38:\"Gambar-bendera-Timor-leste-150x150.gif\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/gif\";}s:6:\"medium\";a:4:{s:4:\"file\";s:38:\"Gambar-bendera-Timor-leste-300x204.gif\";s:5:\"width\";i:300;s:6:\"height\";i:204;s:9:\"mime-type\";s:9:\"image/gif\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(17, 23, '_wp_attached_file', '2019/10/images-1.png'),
(18, 23, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:800;s:6:\"height\";i:532;s:4:\"file\";s:20:\"2019/10/images-1.png\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"images-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"images-1-300x200.png\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:20:\"images-1-768x511.png\";s:5:\"width\";i:768;s:6:\"height\";i:511;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(21, 25, '_wp_attached_file', '2019/10/y-nghia-quoc-ky-singapore-1.jpg'),
(22, 25, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:964;s:6:\"height\";i:644;s:4:\"file\";s:39:\"2019/10/y-nghia-quoc-ky-singapore-1.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:39:\"y-nghia-quoc-ky-singapore-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:39:\"y-nghia-quoc-ky-singapore-1-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:39:\"y-nghia-quoc-ky-singapore-1-768x513.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:513;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}'),
(23, 26, '_wp_attached_file', '2019/10/51-u8JjOxIL._SX466_.jpg'),
(24, 26, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:466;s:6:\"height\";i:310;s:4:\"file\";s:31:\"2019/10/51-u8JjOxIL._SX466_.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:31:\"51-u8JjOxIL._SX466_-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:31:\"51-u8JjOxIL._SX466_-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(25, 27, '_wp_attached_file', '2019/10/MYAN0001__62250.1460460886.1280.1280.png'),
(26, 27, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1085;s:6:\"height\";i:620;s:4:\"file\";s:48:\"2019/10/MYAN0001__62250.1460460886.1280.1280.png\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:48:\"MYAN0001__62250.1460460886.1280.1280-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:48:\"MYAN0001__62250.1460460886.1280.1280-300x171.png\";s:5:\"width\";i:300;s:6:\"height\";i:171;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:48:\"MYAN0001__62250.1460460886.1280.1280-768x439.png\";s:5:\"width\";i:768;s:6:\"height\";i:439;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:49:\"MYAN0001__62250.1460460886.1280.1280-1024x585.png\";s:5:\"width\";i:1024;s:6:\"height\";i:585;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(27, 28, '_wp_attached_file', '2019/10/images.png'),
(28, 28, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:275;s:6:\"height\";i:183;s:4:\"file\";s:18:\"2019/10/images.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"images-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(29, 29, '_wp_attached_file', '2019/10/Flag-Indonesia.jpg'),
(30, 29, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:600;s:6:\"height\";i:400;s:4:\"file\";s:26:\"2019/10/Flag-Indonesia.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:26:\"Flag-Indonesia-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:26:\"Flag-Indonesia-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(31, 30, '_wp_attached_file', '2019/10/tải-xuống-2.png'),
(32, 30, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:281;s:6:\"height\";i:180;s:4:\"file\";s:27:\"2019/10/tải-xuống-2.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:27:\"tải-xuống-2-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(33, 31, '_wp_attached_file', '2019/10/significado-da-bandeira-do-brunei.jpg'),
(34, 31, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:640;s:6:\"height\";i:425;s:4:\"file\";s:45:\"2019/10/significado-da-bandeira-do-brunei.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:45:\"significado-da-bandeira-do-brunei-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:45:\"significado-da-bandeira-do-brunei-300x199.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:199;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(35, 6, '_edit_last', '1'),
(36, 6, '_wp_page_template', 'default'),
(37, 7, '_edit_last', '1'),
(38, 7, '_wp_page_template', 'default'),
(39, 8, '_edit_last', '1'),
(40, 8, '_wp_page_template', 'default'),
(41, 8, '_edit_lock', '1570610871:1'),
(42, 35, '_edit_lock', '1570667513:1'),
(43, 36, '_edit_lock', '1570667593:1'),
(44, 36, '_wp_page_template', 'news.php'),
(45, 38, '_edit_lock', '1570668488:1'),
(46, 38, '_wp_page_template', 'video.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2019-10-07 15:13:10', '2019-10-07 15:13:10', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2019-10-07 15:13:10', '2019-10-07 15:13:10', '', 0, 'http://localhost/seagamefootball/?p=1', 0, 'post', '', 1),
(2, 1, '2019-10-07 15:13:10', '2019-10-07 15:13:10', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/seagamefootball/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2019-10-07 15:13:10', '2019-10-07 15:13:10', '', 0, 'http://localhost/seagamefootball/?page_id=2', 0, 'page', '', 0),
(3, 1, '2019-10-07 15:13:10', '2019-10-07 15:13:10', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/seagamefootball.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2019-10-07 15:13:10', '2019-10-07 15:13:10', '', 0, 'http://localhost/seagamefootball/?page_id=3', 0, 'page', '', 0),
(4, 1, '2019-10-07 15:13:33', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2019-10-07 15:13:33', '0000-00-00 00:00:00', '', 0, 'http://localhost/seagamefootball/?p=4', 0, 'post', '', 0),
(6, 1, '2019-10-07 15:48:45', '2019-10-07 15:48:45', '', 'matches', '', 'publish', 'open', 'closed', '', 'tournament', '', '', '2019-10-09 08:39:07', '2019-10-09 08:39:07', '', 0, 'http://localhost/seagamefootball/tournament/', 0, 'page', '', 1),
(7, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 'teams', '', 'publish', 'open', 'closed', '', 'teams', '', '', '2019-10-09 08:39:42', '2019-10-09 08:39:42', '', 6, 'http://localhost/seagamefootball/tournament/teams/', 0, 'page', '', 2),
(8, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 'groups', '', 'publish', 'open', 'closed', '', 'groups', '', '', '2019-10-09 08:47:50', '2019-10-09 08:47:50', '', 6, 'http://localhost/seagamefootball/tournament/groups/', 0, 'page', '', 0),
(9, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 'venues', '', 'publish', 'closed', 'closed', '', 'stadiums', '', '', '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 6, 'http://localhost/seagamefootball/tournament/stadiums/', 0, 'page', '', 0),
(10, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '<h3>Rules page</h3>\r\n<strong>On this page you can add some information on how to play as a contender in the pool. The plugin supports several shortcodes that you can put in this text. See the help page in the admin for more information about the shortcodes.</strong>\r\n\r\n<strong>The text below is an example for such a page.</strong>\r\n\r\n<h3>Subscription</h3>\r\nSubscription for the pool is easy. All you have to do is think of a login name and a valid email address. If you lost your password, you can generate a new one. Or ask the webmaster.\r\n\r\n<h3>Predicting the matches</h3>\r\nPredict the end score of all the matches in the tournament/competition. You have until 15 minutes before the start of a match to add or change your prediction.\r\nThe server time is used. No discussion about that, so be on time if you want to fill in your scores.\r\n\r\nAs you may have noticed the matches in the next stages are not yet filled at the beginning of the tournament. Once the teams are through to the next round, I will add them. These games can also be changed until 15 minutes before the game starts. Or, if you\'re feeling lucky, you can predict them now.\r\n\r\n<h3>The bonus questions</h3>\r\nYou can earn extra points during the tournament with the bonus questions. These questions must be answered before a given date and time. Each questions shows the points you can earn.\r\n\r\n<h3>The scoring</h3>\r\nIn the group phase the scores at the end of the game are used for the calculation of the scores. For final rounds the score at the end of the game including extra time is used. Goals in a penalty shoot-out are not taken into consideration.\r\n\r\nYou get points for predicting the correct winner of the match or prediction of a draw. We call this the toto score. In case you also predict the exact amount of goals scored, you get extra points. We call this the full score. If you got the goals correct you get the extra goal bonus, even if you didn\'t get the match result correct (e.g. match ends in 1-1 and you predicted 0-1 you will still get [fp-goalpoints] points). The last scoring options is the goal difference bonus: if you predict the correct winner, not the exact score, but you predicted the correct difference in goals, you get the goal difference bonus (e.g. you predicted 3-1 or 4-2 and result is 2-0).\r\n\r\n<table>\r\n<thead>\r\n<tr>\r\n<th></th>\r\n<th>points</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>toto score</td>\r\n<td>[fp-totopoints]</td>\r\n</tr>\r\n<tr>\r\n<td>full score</td>\r\n<td>[fp-fullpoints]</td>\r\n</tr>\r\n<tr>\r\n<tr>\r\n<td>goal bonus</td>\r\n<td>[fp-goalpoints]</td>\r\n</tr>\r\n<tr>\r\n<tr>\r\n<td>goal difference bonus</td>\r\n<td>[fp-diffpoints]</td>\r\n</tr>\r\n<tr>\r\n<td>bonus question</td>\r\n<td>may be different for every question</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\nIf you want to view the ranking, then go to the <a href=\"[fp-link slug=\'ranking\']\">ranking page</a> and pick the correct league. If you\'re logged in, then the league for which you subscribed, is automatically picked.\r\n\r\n<h3>The golden ball</h3>\r\nEach player has one golden ball. If you place this ball next to a match the score for that match is multiplied by [fp-jokermultiplier]. You may place the golden ball next to every match and you can change your mind and move the golden ball, as long this match is still changeable. The golden ball is activated after the prediction for the match is locked. Once activated the golden ball cannot be moved anymore.\r\n\r\n<h3>Same ranking?</h3>\r\nWhen multiple players have the exact same amount of points, then the following sorting rules are applied on the ranking (most important one at the top):\r\n<ol>\r\n	<li>amount of full scores;</li>\r\n	<li>amount of toto scores;</li>\r\n	<li>amount of correct bonus questions.</li>\r\n</ol>\r\n', 'rules', '', 'publish', 'closed', 'closed', '', 'rules', '', '', '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 0, 'http://localhost/seagamefootball/rules/', 0, 'page', '', 0),
(11, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 'prediction sheet', '', 'publish', 'closed', 'closed', '', 'pool', '', '', '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 0, 'http://localhost/seagamefootball/pool/', 0, 'page', '', 0),
(12, 1, '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 'ranking', '', 'publish', 'closed', 'closed', '', 'ranking', '', '', '2019-10-07 15:48:46', '2019-10-07 15:48:46', '', 0, 'http://localhost/seagamefootball/ranking/', 0, 'page', '', 0),
(13, 1, '2019-10-07 15:48:47', '2019-10-07 15:48:47', '', 'statistics', '', 'publish', 'closed', 'closed', '', 'statistics', '', '', '2019-10-07 15:48:47', '2019-10-07 15:48:47', '', 0, 'http://localhost/seagamefootball/statistics/', 0, 'page', '', 0),
(14, 1, '2019-10-07 15:48:47', '2019-10-07 15:48:47', '', 'player predictions', '', 'publish', 'closed', 'closed', '', 'user', '', '', '2019-10-07 15:48:47', '2019-10-07 15:48:47', '', 0, 'http://localhost/seagamefootball/user/', 0, 'page', '', 0),
(16, 1, '2019-10-07 15:53:17', '2019-10-07 15:53:17', '', 'matches', '', 'inherit', 'closed', 'closed', '', '6-autosave-v1', '', '', '2019-10-07 15:53:17', '2019-10-07 15:53:17', '', 6, 'http://localhost/seagamefootball/2019/10/07/6-autosave-v1/', 0, 'revision', '', 0),
(17, 1, '2019-10-07 15:59:52', '2019-10-07 15:59:52', '', 'Matchs', '', 'publish', 'closed', 'closed', '', 'matchs', '', '', '2019-10-07 15:59:52', '2019-10-07 15:59:52', '', 0, 'http://localhost/seagamefootball/?page_id=17', 0, 'page', '', 0),
(18, 1, '2019-10-07 15:59:52', '2019-10-07 15:59:52', '', 'Matchs', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2019-10-07 15:59:52', '2019-10-07 15:59:52', '', 17, 'http://localhost/seagamefootball/2019/10/07/17-revision-v1/', 0, 'revision', '', 0),
(19, 1, '2019-10-08 14:53:10', '2019-10-08 14:53:10', '', 'thSWBQH1ZH', '', 'inherit', 'open', 'closed', '', 'thswbqh1zh', '', '', '2019-10-08 14:53:10', '2019-10-08 14:53:10', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thSWBQH1ZH.jpg', 0, 'attachment', 'image/jpeg', 0),
(20, 1, '2019-10-09 07:19:56', '2019-10-09 07:19:56', '', 'thPG8X5W98', '', 'inherit', 'open', 'closed', '', 'thpg8x5w98', '', '', '2019-10-09 07:19:56', '2019-10-09 07:19:56', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/thPG8X5W98.jpg', 0, 'attachment', 'image/jpeg', 0),
(22, 1, '2019-10-09 07:22:45', '2019-10-09 07:22:45', '', 'Gambar-bendera-Timor-leste', '', 'inherit', 'open', 'closed', '', 'gambar-bendera-timor-leste', '', '', '2019-10-09 07:22:45', '2019-10-09 07:22:45', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Gambar-bendera-Timor-leste.gif', 0, 'attachment', 'image/gif', 0),
(23, 1, '2019-10-09 07:24:21', '2019-10-09 07:24:21', '', 'images-1', '', 'inherit', 'open', 'closed', '', 'images-1', '', '', '2019-10-09 07:24:21', '2019-10-09 07:24:21', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images-1.png', 0, 'attachment', 'image/png', 0),
(25, 1, '2019-10-09 07:29:08', '2019-10-09 07:29:08', '', 'y-nghia-quoc-ky-singapore-1', '', 'inherit', 'open', 'closed', '', 'y-nghia-quoc-ky-singapore-1', '', '', '2019-10-09 07:29:08', '2019-10-09 07:29:08', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/y-nghia-quoc-ky-singapore-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(26, 1, '2019-10-09 07:33:20', '2019-10-09 07:33:20', '', '51-u8JjOxIL._SX466_', '', 'inherit', 'open', 'closed', '', '51-u8jjoxil-_sx466_', '', '', '2019-10-09 07:33:20', '2019-10-09 07:33:20', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/51-u8JjOxIL._SX466_.jpg', 0, 'attachment', 'image/jpeg', 0),
(27, 1, '2019-10-09 07:35:04', '2019-10-09 07:35:04', '', 'MYAN0001__62250.1460460886.1280.1280', '', 'inherit', 'open', 'closed', '', 'myan0001__62250-1460460886-1280-1280', '', '', '2019-10-09 07:35:04', '2019-10-09 07:35:04', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/MYAN0001__62250.1460460886.1280.1280.png', 0, 'attachment', 'image/png', 0),
(28, 1, '2019-10-09 07:36:12', '2019-10-09 07:36:12', '', 'images', '', 'inherit', 'open', 'closed', '', 'images', '', '', '2019-10-09 07:36:12', '2019-10-09 07:36:12', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/images.png', 0, 'attachment', 'image/png', 0),
(29, 1, '2019-10-09 07:38:03', '2019-10-09 07:38:03', '', 'Flag-Indonesia', '', 'inherit', 'open', 'closed', '', 'flag-indonesia', '', '', '2019-10-09 07:38:03', '2019-10-09 07:38:03', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/Flag-Indonesia.jpg', 0, 'attachment', 'image/jpeg', 0),
(30, 1, '2019-10-09 07:38:45', '2019-10-09 07:38:45', '', 'tải xuống (2)', '', 'inherit', 'open', 'closed', '', 'tai-xuong-2', '', '', '2019-10-09 07:38:45', '2019-10-09 07:38:45', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/tải-xuống-2.png', 0, 'attachment', 'image/png', 0),
(31, 1, '2019-10-09 07:40:50', '2019-10-09 07:40:50', '', 'significado-da-bandeira-do-brunei', '', 'inherit', 'open', 'closed', '', 'significado-da-bandeira-do-brunei', '', '', '2019-10-09 07:40:50', '2019-10-09 07:40:50', '', 0, 'http://localhost/seagamefootball/wp-content/uploads/2019/10/significado-da-bandeira-do-brunei.jpg', 0, 'attachment', 'image/jpeg', 0),
(32, 1, '2019-10-09 08:39:07', '2019-10-09 08:39:07', '', 'matches', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2019-10-09 08:39:07', '2019-10-09 08:39:07', '', 6, 'http://localhost/seagamefootball/2019/10/09/6-revision-v1/', 0, 'revision', '', 0),
(33, 1, '2019-10-09 08:39:42', '2019-10-09 08:39:42', '', 'teams', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2019-10-09 08:39:42', '2019-10-09 08:39:42', '', 7, 'http://localhost/seagamefootball/2019/10/09/7-revision-v1/', 0, 'revision', '', 0),
(34, 1, '2019-10-09 08:47:50', '2019-10-09 08:47:50', '', 'groups', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2019-10-09 08:47:50', '2019-10-09 08:47:50', '', 8, 'http://localhost/seagamefootball/2019/10/09/8-revision-v1/', 0, 'revision', '', 0),
(35, 1, '2019-10-10 00:33:25', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-10-10 00:33:25', '0000-00-00 00:00:00', '', 0, 'http://localhost/seagamefootball/?page_id=35', 0, 'page', '', 0),
(36, 1, '2019-10-10 00:35:34', '2019-10-10 00:35:34', '', 'News', '', 'publish', 'closed', 'closed', '', 'news', '', '', '2019-10-10 00:35:34', '2019-10-10 00:35:34', '', 0, 'http://localhost/seagamefootball/?page_id=36', 0, 'page', '', 0),
(37, 1, '2019-10-10 00:35:34', '2019-10-10 00:35:34', '', 'News', '', 'inherit', 'closed', 'closed', '', '36-revision-v1', '', '', '2019-10-10 00:35:34', '2019-10-10 00:35:34', '', 36, 'http://localhost/seagamefootball/2019/10/10/36-revision-v1/', 0, 'revision', '', 0),
(38, 1, '2019-10-10 00:40:14', '2019-10-10 00:40:14', '', 'Video', '', 'publish', 'closed', 'closed', '', 'video', '', '', '2019-10-10 00:40:14', '2019-10-10 00:40:14', '', 0, 'http://localhost/seagamefootball/?page_id=38', 0, 'page', '', 0),
(39, 1, '2019-10-10 00:40:14', '2019-10-10 00:40:14', '', 'Video', '', 'inherit', 'closed', 'closed', '', '38-revision-v1', '', '', '2019-10-10 00:40:14', '2019-10-10 00:40:14', '', 38, 'http://localhost/seagamefootball/2019/10/10/38-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:2:{s:64:\"e3b58cf9282359414d09fe033136fc4ced591f2d1a2bbae68ef652804834064e\";a:4:{s:10:\"expiration\";i:1570718916;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\";s:5:\"login\";i:1570546116;}s:64:\"7e5226625207d58fca4d39e6e21c2801323b5370f7dab160d91f73dc3cfb3bea\";a:4:{s:10:\"expiration\";i:1570840348;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\";s:5:\"login\";i:1570667548;}}'),
(17, 1, 'wp_user-settings', 'libraryContent=browse'),
(18, 1, 'wp_user-settings-time', '1570461207'),
(19, 1, 'wp_dashboard_quick_press_last_post_id', '4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BL5.qQSQz.Bx1L9BpM9QiBC4ieQNbO0', 'admin', 'buihuuthang199@gmail.com', '', '2019-10-07 15:13:09', '', 0, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pool_wp_bonusquestions`
--
ALTER TABLE `pool_wp_bonusquestions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_bonusquestions_type`
--
ALTER TABLE `pool_wp_bonusquestions_type`
  ADD PRIMARY KEY (`question_id`);

--
-- Chỉ mục cho bảng `pool_wp_bonusquestions_useranswers`
--
ALTER TABLE `pool_wp_bonusquestions_useranswers`
  ADD PRIMARY KEY (`question_id`,`user_id`),
  ADD KEY `ixQuestionId` (`question_id`),
  ADD KEY `ixUserId` (`user_id`);

--
-- Chỉ mục cho bảng `pool_wp_groups`
--
ALTER TABLE `pool_wp_groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_leagues`
--
ALTER TABLE `pool_wp_leagues`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_league_users`
--
ALTER TABLE `pool_wp_league_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ixUserLeague` (`user_id`,`league_id`);

--
-- Chỉ mục cho bảng `pool_wp_matches`
--
ALTER TABLE `pool_wp_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixAwayTeam` (`away_team_id`),
  ADD KEY `ixHomeTeam` (`home_team_id`),
  ADD KEY `ixStadium` (`stadium_id`),
  ADD KEY `ixMatchtype` (`matchtype_id`);

--
-- Chỉ mục cho bảng `pool_wp_matchtypes`
--
ALTER TABLE `pool_wp_matchtypes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_predictions`
--
ALTER TABLE `pool_wp_predictions`
  ADD UNIQUE KEY `ixUserMatch` (`user_id`,`match_id`),
  ADD KEY `ixUser` (`user_id`),
  ADD KEY `ixMatch` (`match_id`);

--
-- Chỉ mục cho bảng `pool_wp_rankings`
--
ALTER TABLE `pool_wp_rankings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_rankings_bonusquestions`
--
ALTER TABLE `pool_wp_rankings_bonusquestions`
  ADD PRIMARY KEY (`ranking_id`,`question_id`);

--
-- Chỉ mục cho bảng `pool_wp_rankings_matches`
--
ALTER TABLE `pool_wp_rankings_matches`
  ADD PRIMARY KEY (`ranking_id`,`match_id`);

--
-- Chỉ mục cho bảng `pool_wp_scorehistory_s1_t1`
--
ALTER TABLE `pool_wp_scorehistory_s1_t1`
  ADD PRIMARY KEY (`ranking_id`,`type`,`source_id`,`user_id`),
  ADD KEY `ranking_id` (`ranking_id`,`score_order`,`user_id`);

--
-- Chỉ mục cho bảng `pool_wp_scorehistory_s1_t2`
--
ALTER TABLE `pool_wp_scorehistory_s1_t2`
  ADD PRIMARY KEY (`ranking_id`,`type`,`source_id`,`user_id`),
  ADD KEY `ranking_id` (`ranking_id`,`score_order`,`user_id`);

--
-- Chỉ mục cho bảng `pool_wp_seasons`
--
ALTER TABLE `pool_wp_seasons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_shoutbox`
--
ALTER TABLE `pool_wp_shoutbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixDateEntered` (`date_entered`);

--
-- Chỉ mục cho bảng `pool_wp_stadiums`
--
ALTER TABLE `pool_wp_stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pool_wp_teams`
--
ALTER TABLE `pool_wp_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixGroup` (`group_id`),
  ADD KEY `ixGroupOrder` (`group_order`);

--
-- Chỉ mục cho bảng `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Chỉ mục cho bảng `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Chỉ mục cho bảng `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Chỉ mục cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Chỉ mục cho bảng `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Chỉ mục cho bảng `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Chỉ mục cho bảng `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Chỉ mục cho bảng `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pool_wp_bonusquestions`
--
ALTER TABLE `pool_wp_bonusquestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pool_wp_groups`
--
ALTER TABLE `pool_wp_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `pool_wp_leagues`
--
ALTER TABLE `pool_wp_leagues`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `pool_wp_matches`
--
ALTER TABLE `pool_wp_matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `pool_wp_matchtypes`
--
ALTER TABLE `pool_wp_matchtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `pool_wp_rankings`
--
ALTER TABLE `pool_wp_rankings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `pool_wp_seasons`
--
ALTER TABLE `pool_wp_seasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `pool_wp_shoutbox`
--
ALTER TABLE `pool_wp_shoutbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pool_wp_stadiums`
--
ALTER TABLE `pool_wp_stadiums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `pool_wp_teams`
--
ALTER TABLE `pool_wp_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
