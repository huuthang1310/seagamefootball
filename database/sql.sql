/*
SQLyog Trial v13.1.5  (64 bit)
MySQL - 10.4.6-MariaDB : Database - sgf_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sgf_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sgf_db`;

/*Table structure for table `pool_wp_bonusquestions` */

DROP TABLE IF EXISTS `pool_wp_bonusquestions`;

CREATE TABLE `pool_wp_bonusquestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL DEFAULT '',
  `points` smallint(5) unsigned NOT NULL DEFAULT 0,
  `answer_before_date` datetime NOT NULL,
  `score_date` datetime DEFAULT NULL,
  `match_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_bonusquestions` */

/*Table structure for table `pool_wp_bonusquestions_type` */

DROP TABLE IF EXISTS `pool_wp_bonusquestions_type`;

CREATE TABLE `pool_wp_bonusquestions_type` (
  `question_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `options` text NOT NULL,
  `image` text NOT NULL,
  `max_answers` tinyint(3) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_bonusquestions_type` */

/*Table structure for table `pool_wp_bonusquestions_useranswers` */

DROP TABLE IF EXISTS `pool_wp_bonusquestions_useranswers`;

CREATE TABLE `pool_wp_bonusquestions_useranswers` (
  `question_id` int(10) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `answer` text NOT NULL,
  `correct` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `ixQuestionId` (`question_id`),
  KEY `ixUserId` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_bonusquestions_useranswers` */

/*Table structure for table `pool_wp_groups` */

DROP TABLE IF EXISTS `pool_wp_groups`;

CREATE TABLE `pool_wp_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_groups` */

insert  into `pool_wp_groups`(`id`,`name`) values 
(9,''),
(10,'Groups A'),
(11,'Groups B');

/*Table structure for table `pool_wp_league_users` */

DROP TABLE IF EXISTS `pool_wp_league_users`;

CREATE TABLE `pool_wp_league_users` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `league_id` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  KEY `ixUserLeague` (`user_id`,`league_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_league_users` */

/*Table structure for table `pool_wp_leagues` */

DROP TABLE IF EXISTS `pool_wp_leagues`;

CREATE TABLE `pool_wp_leagues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_defined` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `image` text NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_leagues` */

insert  into `pool_wp_leagues`(`id`,`name`,`user_defined`,`image`) values 
(1,'all users',0,''),
(2,'for money',1,'//localhost/seagamefootball/wp-content/plugins/football-pool/assets/images/league-money-green.png'),
(3,'for free',1,'');

/*Table structure for table `pool_wp_matches` */

DROP TABLE IF EXISTS `pool_wp_matches`;

CREATE TABLE `pool_wp_matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stadium_id` int(10) unsigned NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `home_score` tinyint(3) unsigned DEFAULT NULL,
  `away_score` tinyint(3) unsigned DEFAULT NULL,
  `play_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `matchtype_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ixAwayTeam` (`away_team_id`),
  KEY `ixHomeTeam` (`home_team_id`),
  KEY `ixStadium` (`stadium_id`),
  KEY `ixMatchtype` (`matchtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_matches` */

insert  into `pool_wp_matches`(`id`,`stadium_id`,`home_team_id`,`away_team_id`,`home_score`,`away_score`,`play_date`,`matchtype_id`) values 
(149,24,68,86,NULL,NULL,'2019-10-14 07:23:00',1),
(150,6,85,79,NULL,NULL,'2019-10-14 07:24:00',1),
(151,24,68,71,NULL,NULL,'2019-10-14 07:25:00',1),
(152,15,86,85,NULL,NULL,'2019-10-14 07:25:00',1),
(153,24,71,86,NULL,NULL,'2019-10-14 07:25:00',1),
(154,24,79,68,NULL,NULL,'2019-10-14 07:26:00',1),
(155,24,79,71,NULL,NULL,'2019-10-14 07:27:00',1),
(156,24,68,85,NULL,NULL,'2019-10-14 07:27:00',1),
(157,24,71,85,NULL,NULL,'2019-10-14 07:27:00',1),
(158,24,79,86,NULL,NULL,'2019-10-14 07:27:00',1),
(160,24,94,72,NULL,NULL,'2019-10-14 07:35:00',2),
(161,24,93,76,NULL,NULL,'2019-10-14 07:35:00',2),
(162,24,73,65,NULL,NULL,'2019-10-14 07:35:00',2),
(163,24,65,72,NULL,NULL,'2019-10-14 07:36:00',2),
(164,24,94,76,NULL,NULL,'2019-10-14 07:36:00',2),
(165,24,93,73,NULL,NULL,'2019-10-14 07:39:00',2),
(166,24,73,72,NULL,NULL,'2019-10-14 07:39:00',2),
(167,24,94,65,NULL,NULL,'2019-10-14 07:40:00',2),
(168,24,76,65,NULL,NULL,'2019-10-14 07:40:00',2),
(169,24,72,76,NULL,NULL,'2019-10-14 07:40:00',2),
(170,24,65,93,NULL,NULL,'2019-10-14 07:41:00',2),
(171,24,94,73,NULL,NULL,'2019-10-14 07:41:00',2),
(172,24,93,72,NULL,NULL,'2019-10-14 07:41:00',2),
(173,24,94,93,NULL,NULL,'2019-10-14 07:42:00',2),
(174,24,76,73,NULL,NULL,'2019-10-14 07:42:00',2),
(175,24,97,98,NULL,NULL,'2019-10-14 07:43:00',3),
(176,24,101,102,NULL,NULL,'2019-10-14 07:43:00',3),
(177,24,108,112,NULL,NULL,'2019-10-14 07:44:00',4),
(178,24,104,128,NULL,NULL,'2019-10-14 07:45:00',5);

/*Table structure for table `pool_wp_matchtypes` */

DROP TABLE IF EXISTS `pool_wp_matchtypes`;

CREATE TABLE `pool_wp_matchtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `visibility` tinyint(3) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_matchtypes` */

insert  into `pool_wp_matchtypes`(`id`,`name`,`visibility`) values 
(1,'Bảng A',1),
(2,'Bảng B',1),
(3,'Bán kết',1),
(4,'Tranh hạng 3',1),
(5,'Chung kết',1),
(6,'Final',1),
(7,'Group Stage',1),
(8,'Quarter Finals',1);

/*Table structure for table `pool_wp_predictions` */

DROP TABLE IF EXISTS `pool_wp_predictions`;

CREATE TABLE `pool_wp_predictions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `match_id` int(10) unsigned NOT NULL DEFAULT 0,
  `home_score` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `away_score` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `has_joker` tinyint(4) NOT NULL DEFAULT 0,
  UNIQUE KEY `ixUserMatch` (`user_id`,`match_id`),
  KEY `ixUser` (`user_id`),
  KEY `ixMatch` (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_predictions` */

/*Table structure for table `pool_wp_rankings` */

DROP TABLE IF EXISTS `pool_wp_rankings`;

CREATE TABLE `pool_wp_rankings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_defined` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `calculate` tinyint(3) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_rankings` */

insert  into `pool_wp_rankings`(`id`,`name`,`user_defined`,`calculate`) values 
(1,'default ranking',0,1);

/*Table structure for table `pool_wp_rankings_bonusquestions` */

DROP TABLE IF EXISTS `pool_wp_rankings_bonusquestions`;

CREATE TABLE `pool_wp_rankings_bonusquestions` (
  `ranking_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`ranking_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_rankings_bonusquestions` */

/*Table structure for table `pool_wp_rankings_matches` */

DROP TABLE IF EXISTS `pool_wp_rankings_matches`;

CREATE TABLE `pool_wp_rankings_matches` (
  `ranking_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  PRIMARY KEY (`ranking_id`,`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_rankings_matches` */

/*Table structure for table `pool_wp_scorehistory_s1_t1` */

DROP TABLE IF EXISTS `pool_wp_scorehistory_s1_t1`;

CREATE TABLE `pool_wp_scorehistory_s1_t1` (
  `ranking_id` int(10) unsigned NOT NULL,
  `score_order` int(10) unsigned NOT NULL DEFAULT 0,
  `type` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `score_date` datetime NOT NULL,
  `source_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `score` int(11) unsigned NOT NULL,
  `full` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `toto` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `goal_bonus` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `goal_diff_bonus` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `total_score` int(11) unsigned NOT NULL DEFAULT 0,
  `ranking` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ranking_id`,`type`,`source_id`,`user_id`),
  KEY `ranking_id` (`ranking_id`,`score_order`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_scorehistory_s1_t1` */

/*Table structure for table `pool_wp_scorehistory_s1_t2` */

DROP TABLE IF EXISTS `pool_wp_scorehistory_s1_t2`;

CREATE TABLE `pool_wp_scorehistory_s1_t2` (
  `ranking_id` int(10) unsigned NOT NULL,
  `score_order` int(10) unsigned NOT NULL DEFAULT 0,
  `type` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `score_date` datetime NOT NULL,
  `source_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `score` int(11) unsigned NOT NULL,
  `full` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `toto` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `goal_bonus` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `goal_diff_bonus` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `total_score` int(11) unsigned NOT NULL DEFAULT 0,
  `ranking` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ranking_id`,`type`,`source_id`,`user_id`),
  KEY `ranking_id` (`ranking_id`,`score_order`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_scorehistory_s1_t2` */

/*Table structure for table `pool_wp_seasons` */

DROP TABLE IF EXISTS `pool_wp_seasons`;

CREATE TABLE `pool_wp_seasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_seasons` */

insert  into `pool_wp_seasons`(`id`,`name`) values 
(1,'Season 1');

/*Table structure for table `pool_wp_shoutbox` */

DROP TABLE IF EXISTS `pool_wp_shoutbox`;

CREATE TABLE `pool_wp_shoutbox` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `shout_text` tinytext NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ixDateEntered` (`date_entered`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_shoutbox` */

/*Table structure for table `pool_wp_stadiums` */

DROP TABLE IF EXISTS `pool_wp_stadiums`;

CREATE TABLE `pool_wp_stadiums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `photo` text NOT NULL,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_stadiums` */

insert  into `pool_wp_stadiums`(`id`,`name`,`photo`,`comments`) values 
(3,'Sotsji: Olympic Stadium Fisht','http://localhost/seagamefootball/wp-content/uploads/2019/10/san19.jpg','Sân vận động Olympic Fisht là một sân vận động ngoài trời ở Sochi, Nga. Nằm trong Sochi Olympic Park và được đặt tên theo đỉnh núi Fisht, sân vận động với sức chứa 40,000 khán giả này được xây dựng nhằm phục vụ Thế vận hội mùa Đông năm 2014 và Paralympics, nơi mà tổ chức lễ khai mạc cũng như bế mạc.'),
(4,'Saint-Petersburg: Saint Petersburg Stadium','http://localhost/seagamefootball/wp-content/uploads/2019/10/san16.jpg','Sân vận động Krestovsky, còn được gọi là Zenit Arena, là một sân vận động bóng đá nằm ở phía tây Đảo Krestovsky ở Saint Petersburg, Nga. Nơi đây diễn ra các trận đấu sân nhà của FC Zenit Saint Petersburg. Theo dự kiến sân được hoàn thành vào tháng 12 năm 2008, nhưng sau đó được dời sang cuối năm 2011.'),
(6,'Sân vận động MP Selayang','http://localhost/seagamefootball/wp-content/uploads/2019/10/seagame3.jpg','Sân vận động Hội đồng thành phố Selayang là một sân vận động đa năng ở Selayang, Selangor, Malaysia. Sân vận động thuộc sở hữu của Majlis Perbandaran Selayang. Nó hiện đang được sử dụng chủ yếu cho các trận đấu bóng đá. Sân vận động có sức chứa 16.000. Người thuê sân vận động là Selangor United.'),
(7,'Moskow: Otkrytieje Arena','http://localhost/seagamefootball/wp-content/uploads/2019/10/san12.jpg','à một sân vận động đa năng ở Moskva, Nga. Đây là địa điểm được chủ yếu sử dụng cho các trận đấu bóng đá và là sân nhà của câu lạc bộ Spartak Moscow, thỉnh thoảng nó cũng được lấy làm nơi diễn ra các trận đấu của đội tuyển quốc gia Nga. Sân sẽ có tên là Sân vận động Spartak trong suốt thời gian diễn ra Cúp Liên đoàn các châu lục 2017[3] và giải vô địch bóng đá thế giới 2018.[4] Sân vận động được thiết kế có sức chứa khoảng 45.360 người.'),
(9,'Rostov-on-Don: Rostov Arena','http://localhost/seagamefootball/wp-content/uploads/2019/10/san15.jpg','Đấu trường Rostov là một sân vận động bóng đá ở Rostov trên sông Đông, Nga. Đây là một trong những địa điểm cho Giải vô địch bóng đá thế giới 2018. Sân vận động này cũng tổ chức FC Rostov của Giải bóng đá ngoại hạng Nga, thay thế cho Olimp-2. Sân có sức chứa 45.000 khán giả.'),
(10,'Samara: Cosmos Arena','http://localhost/seagamefootball/wp-content/uploads/2019/10/san17.jpg','Cosmos Arena là một sân vận động bóng đá ở Samara, Nga. Sân vận động là một trong những địa điểm cho Giải vô địch bóng đá thế giới 2018. Nó sẽ được gọi là Samara Arena trong Cúp Thế giới. Nó cũng tổ chức FC Krylia Sovetov Samara của Russian Football National League, thay thế cho sân vận động Metallurg.'),
(11,'Nizhny Novgorod: Strelka Stadium','http://localhost/seagamefootball/wp-content/uploads/2019/10/san14.jpg','Sân vận động có sức chứa khoảng 45,000 chỗ ngồi với 902 chỗ dành cho những người đi xe lăn cùng với những ai đi kèm với họ. Nó được hy vọng là sau khi kết thúc World Cup sẽ trở thành sân nhà của câu lạc bộ FC Olimpiyets Novgorod của Giải bóng đá ngoại hạng Nga.'),
(14,'Estadio Das Dunas, Natal','http://localhost/seagamefootball/wp-content/uploads/2019/10/san5.jpg',' là một sân vận động bóng đá ở Natal , Brazil . Đấu trường có thể che chở 31.375 khán giả, và được thiết kế bởi kiến ​​trúc sư thể thao Christopher Lee của Popantic . [2] [3] [4] Sân vận động tổ chức các trận bóng đá cho FIFA World Cup 2014 được tổ chức tại Brazil. Trong giải đấu, nó có sức chứa 42.000 chổ ngồi.'),
(15,'Sân vận động Shah Alam','http://localhost/seagamefootball/wp-content/uploads/2019/10/seagame2.jpg','Là sân vận động đa chức năng nằm ở Shah Alam, Selangor, Malaysia. Nó được sử dụng chủ yếu cho các trận đấu bóng đá nhưng cũng có cơ sở cho vận động viên. Sân vận động là ngôi nhà cũ của Selangor FA và ngôi nhà hiện tại của PKNS FC, và có sức chứa 80.372 chỗ ngồi.'),
(17,'Estadio Mineirao, Belo Horizonte','http://localhost/seagamefootball/wp-content/uploads/2019/10/san7.jpg','tên chính thức Estádio Governador Magalhães Pinto (Sân vận động thống đốc Magalhães Pinto) được khánh thành năm 1965 tại Belo Horizonte, là sân bóng đá lớn nhất bang Minas Gerais, Brazil.'),
(19,'Sân vận động Quốc gia Mỹ Đình','http://localhost/seagamefootball/wp-content/uploads/2019/10/sanmydinh.jpg','sân Mỹ Đình là trung tâm của Khu liên hợp thể thao quốc gia Việt Nam. Hạng mục chính là một sân thi đấu bóng đá có kích thước 105 mét x 68 mét. Kết hợp với nó là hạng mục thi đấu điền kinh với 8 đường chạy vòng 400 mét và 10 đường chạy thẳng 110 m; 2 hố nhảy cao; 2 hố ném tạ, ném lao, ném tạ xích; 2 khu nhảy sào kép, 2 khu nhảy xa kép. Tổng diện tích khu vực (1 sân chính, 2 sân tập): 17,5 ha.'),
(23,'Estadio Do Maracana, Rio de Janeiro','http://localhost/seagamefootball/wp-content/uploads/2019/10/san6.jpg','Sân vận động là sở hữu của chính quyền tiểu bang Rio de Janeiro. Tên gọi phổ biến lấy từ sông Maracanã, một con sông địa phương trong thành phố. Khánh thành năm 1950 để làm đấu trường cho Giải vô địch bóng đá thế giới 1950, sân vận động này chứng kiến trận đấu giữa chủ nhà Brasil và Uruguay. Khán giả đã thất vọng vì Brasil thua.'),
(24,'Bukit Jalil , Malaysia','http://localhost/seagamefootball/wp-content/uploads/2019/10/seagame1.jpg','Sân vận động quốc gia Bukit Jalil có sức chứa 87.411 chỗ ngồi. Đây là sân vận động đa chức năng, xây dựng năm 1998 để tổ chức Đại hội thể thao Thịnh vượng chung năm 1998. Sân vận động này được xây dựng bởi United Engineers Malaysia BHD và hoàn thành sớm hơn 3 tháng so với kế hoạch.');

/*Table structure for table `pool_wp_teams` */

DROP TABLE IF EXISTS `pool_wp_teams`;

CREATE TABLE `pool_wp_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `photo` text NOT NULL,
  `flag` text NOT NULL,
  `link` varchar(200) NOT NULL DEFAULT '',
  `group_id` int(10) unsigned NOT NULL DEFAULT 0,
  `group_order` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `is_real` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `is_active` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ixGroup` (`group_id`),
  KEY `ixGroupOrder` (`group_order`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

/*Data for the table `pool_wp_teams` */

insert  into `pool_wp_teams`(`id`,`name`,`photo`,`flag`,`link`,`group_id`,`group_order`,`is_real`,`is_active`,`comments`) values 
(65,'U22 Philippines','http://localhost/seagamefootball/wp-content/uploads/2019/10/pilipin.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/51-u8JjOxIL._SX466_.jpg','http://www.fifa.com/worldcup/teams/team=43924/index.html',11,1,1,1,''),
(68,'U22 Myanmar','http://localhost/seagamefootball/wp-content/uploads/2019/10/myan.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/MYAN0001__62250.1460460886.1280.1280.png','http://www.fifa.com/worldcup/teams/team=43849/index.html',10,0,1,1,''),
(71,'U22 Lào','http://localhost/seagamefootball/wp-content/uploads/2019/10/lao.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/images.png','http://www.fifa.com/worldcup/teams/team=43925/index.html',10,0,1,1,''),
(72,'U22 Đông Timor','http://localhost/seagamefootball/wp-content/uploads/2019/10/dongtimo-1.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/Gambar-bendera-Timor-leste.gif','http://www.fifa.com/worldcup/teams/team=43976/index.html',11,4,1,1,''),
(73,'U22 Indonesia','http://localhost/seagamefootball/wp-content/uploads/2019/10/indo.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/Flag-Indonesia.jpg','http://www.fifa.com/worldcup/teams/team=43926/index.html',11,1,1,1,''),
(76,'U22  Campuchia','http://localhost/seagamefootball/wp-content/uploads/2019/10/camp.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/tải-xuống-2.png','http://www.fifa.com/worldcup/teams/team=43901/index.html',11,0,1,1,''),
(79,'U22 Brunei','http://localhost/seagamefootball/wp-content/uploads/2019/10/doi1.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/Gambar-bendera-Timor-leste.gif','http://www.fifa.com/worldcup/teams/team=43854/index.html',10,0,1,1,''),
(85,'U22 Malaysia','http://localhost/seagamefootball/wp-content/uploads/2019/10/campu.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/thPG8X5W98.jpg','http://www.fifa.com/worldcup/teams/team=43922/index.html',10,0,1,1,''),
(86,'U22 Singapore','http://localhost/seagamefootball/wp-content/uploads/2019/10/singa.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/y-nghia-quoc-ky-singapore-1.jpg','http://www.fifa.com/worldcup/teams/team=44037/index.html',10,0,1,1,''),
(93,'U22 Thái Lan','http://localhost/seagamefootball/wp-content/uploads/2019/10/thai.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/images-1.png','http://www.fifa.com/worldcup/teams/team=43935/index.html',11,0,1,1,''),
(94,'U22Việt Nam','http://localhost/seagamefootball/wp-content/uploads/2019/10/vietnam.jpg','http://localhost/seagamefootball/wp-content/uploads/2019/10/thSWBQH1ZH.jpg','http://www.fifa.com/worldcup/teams/team=43843/index.html',11,2,1,1,''),
(97,'Winner Group A','','','',0,0,0,1,''),
(98,'Runner-up Group B','','','',0,0,0,1,''),
(99,'Winner Group C','','','',0,0,0,1,''),
(100,'Runner-up Group D','','','',0,0,0,1,''),
(101,'Winner Group B','','','',0,0,0,1,''),
(102,'Runner-up Group A','','','',0,0,0,1,''),
(103,'Winner Group D','','','',0,0,0,1,''),
(104,'Thắng bán kết 1','','','',9,0,0,1,''),
(105,'Winner Group E','','','',0,0,0,1,''),
(106,'Runner-up Group F','','','',0,0,0,1,''),
(107,'Winner Group G','','','',0,0,0,1,''),
(108,'Thua bán kết 1','','','',9,0,0,1,''),
(109,'Winner Group F','','','',0,0,0,1,''),
(110,'Runner-up Group E','','','',0,0,0,1,''),
(111,'Winner Group H','','','',0,0,0,1,''),
(112,'Thua bán kết 2','','','',9,0,0,1,''),
(113,'Winner match 49','','','',0,0,0,1,''),
(114,'Winner match 50','','','',0,0,0,1,''),
(115,'Winner match 53','','','',0,0,0,1,''),
(116,'Winner match 54','','','',0,0,0,1,''),
(117,'Winner match 51','','','',0,0,0,1,''),
(118,'Winner match 52','','','',0,0,0,1,''),
(119,'Winner match 55','','','',0,0,0,1,''),
(120,'Winner match 56','','','',0,0,0,1,''),
(121,'Winner match 57','','','',0,0,0,1,''),
(122,'Winner match 58','','','',0,0,0,1,''),
(123,'Winner match 59','','','',0,0,0,1,''),
(124,'Winner match 60','','','',0,0,0,1,''),
(126,'Loser match 62','','','',0,0,0,1,''),
(127,'Winner match 61','','','',0,0,0,1,''),
(128,'Thắng bán kết 2','','','',9,0,0,1,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
