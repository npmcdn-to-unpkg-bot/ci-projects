-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2015 at 05:32 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `pages_type` varchar(80) NOT NULL,
  `pages_link` varchar(200) NOT NULL,
  `perma_link` varchar(200) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `pages_type`, `pages_link`, `perma_link`, `title`, `content`, `meta_description`, `meta_keyword`, `meta_title`, `created_time`, `updated_time`) VALUES
(1, 'pages_type', 'pages_link', 'perma_link', 'blog başlık 2', '<p>dfdf</p>\r\n\r\n<p>&nbsp;asdy.&ccedil;&ouml;kuişj&ouml;ghn &nbsp;ğpk kpğkpğmşdlm lkm klnlasndasofn lksnfpjkfp&nbsp;</p>\r\n', 'asd', 'qwe', '123', '2015-12-11 23:13:49', '2015-12-12 15:36:34'),
(10, 'pages_types', 'pages_link', 'perma_link', 'blog başlık 3', '<p>blog i&ccedil;erik 3</p>\r\n', 'blog içerik 3 meta description', 'blog içerik 3 meta keyword', 'blog içerik 3 meta title', '2015-12-12 09:15:36', '2015-12-12 10:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `blog_to_showcase`
--

CREATE TABLE `blog_to_showcase` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `showcase_id` int(11) NOT NULL,
  `blog_frame` int(11) NOT NULL,
  `blog_views` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_to_showcase`
--

INSERT INTO `blog_to_showcase` (`id`, `blog_id`, `showcase_id`, `blog_frame`, `blog_views`) VALUES
(36, 1, 2, 19, 27),
(37, 10, 2, 19, 27);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cat_link` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `queue` int(11) NOT NULL,
  `list_layout` int(11) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `status`, `cat_link`, `name`, `description`, `image`, `banner`, `queue`, `list_layout`, `meta_description`, `meta_keyword`, `meta_title`, `created_time`, `updated_time`) VALUES
(1, 0, 1, 'cat_link', 'Electronics', 'Electronics desc', '', '', 1, 4, 'Electronics meta_description', 'Electronics meta_keyword', 'Electronics meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(2, 1, 1, 'cat_link', 'Televisions', 'Televisions desc', '', '', 1, 4, 'Televisions meta_description', 'Televisions meta_keyword', 'Televisions meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(3, 1, 1, 'cat_link', 'Portable Electronics', 'Portable Electronics desc', '', '', 2, 4, 'Portable Electronics meta_description', 'Portable Electronics meta_keyword', 'Portable Electronics meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(4, 3, 1, 'cat_link', 'Mp3 Players', 'Mp3 Players desc', '', '', 1, 4, 'Mp3 Players meta_description', 'Mp3 Players meta_keyword', 'Mp3 Players meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(5, 3, 1, 'cat_link', 'Cd Players', 'Cd Players desc', '', '', 2, 4, 'Cd Players meta_description', 'Cd Players meta_keyword', 'Cd Players meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(6, 3, 1, 'cat_link', '2 Way Radios', '2 Way Radios desc', '', '', 3, 4, '2 Way Radios meta_description', '2 Way Radios meta_keyword', '2 Way Radios meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(7, 4, 1, 'cat_link', 'Flash', 'Flash desc', '', '', 1, 4, 'Flash meta_description', 'Flash meta_keyword', 'Flash meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(8, 2, 1, 'cat_link', 'Tube', 'Tube desc', '', '', 2, 4, 'Tube meta_description', 'Tube meta_keyword', 'Tube meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(9, 2, 1, 'cat_link', 'Lcd', 'Lcd desc', '', '', 2, 4, 'Lcd meta_description', 'Lcd meta_keyword', 'Lcd meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(10, 2, 1, 'cat_link', 'Plasma', 'Plasma desc', '', '', 3, 4, 'Plasma meta_description', 'Plasma meta_keyword', 'Plasma meta_title', '2015-10-22 21:00:00', '2015-10-23 20:16:49'),
(11, 10, 1, 'cat_link', 'deneme11', 'deneme11 description', '', '', 1, 4, 'deneme11 meta_description', 'deneme11 meta_keyword', 'deneme11 meta_title', '2015-10-28 21:00:00', '2015-10-29 20:04:58'),
(29, 0, 1, '', 'Kategori 1', 'Kategori 1 açıklama', 'assets/uploads/system/images/catid_29_5mE2uspXTllktR-bban01.png', 'assets/uploads/system/images/catid_29_rCAlPPGHATXpgc-bban01.png', 0, 0, 'Kategori 1 meta description', 'Kategori 1 meta keyword', 'Kategori 1 meta title', '2015-11-17 21:11:04', '2015-11-30 19:52:29'),
(30, 0, 1, '', 'kategori 2', 'kategori 2 açıklama', '', '', 0, 0, 'kategori 2 description', 'kategori 2 keyword', 'kategori 2 title', '2015-11-18 21:38:36', '2015-11-30 20:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7379f31d3aae427714262401597fe752ff7ea3ce', '::1', 1450991084, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303939313038343b757365726e616d657c733a31303a226875736579696e646f6c223b69735f6c6f676765645f696e7c623a313b),
('bf3bff0eafbfb9ad8ed0bf33a652559ce1e9ccfb', '::1', 1450991063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303939303736333b757365726e616d657c733a31303a226875736579696e646f6c223b69735f6c6f676765645f696e7c623a313b),
('c1ac2ead178f4f57fc24db1073b7f3bc98a46493', '::1', 1450990676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303939303434363b757365726e616d657c733a31303a226875736579696e646f6c223b69735f6c6f676765645f696e7c623a313b),
('efbe48768f6377f4f18cf54d4096d1314f75448b', '::1', 1450990315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435303939303036333b757365726e616d657c733a31303a226875736579696e646f6c223b69735f6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `custom_code`
--

CREATE TABLE `custom_code` (
  `id` int(11) NOT NULL,
  `custom_code_name` varchar(120) NOT NULL,
  `custom_code_key` text NOT NULL,
  `custom_code_value` text NOT NULL,
  `file_path` varchar(120) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_code`
--

INSERT INTO `custom_code` (`id`, `custom_code_name`, `custom_code_key`, `custom_code_value`, `file_path`, `create_time`, `update_time`) VALUES
(1, 'themes_head_code', 'themes_head_code', '<meta charset="UTF-8">\r\n<title>frontend - home // themes-folder-x.php ile gelmekte.</title>\r\n<!-- stylesheet.css -->\r\n<link rel="stylesheet" href="assets/uploads/css/bootstrap-theme.min.css" />\r\n<link rel="stylesheet" href="assets/uploads/css/bootstrap.min.css" />\r\n<link rel="stylesheet" href="assets/uploads/css/style.css" />\r\n<!-- script.js -->\r\n<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>\r\n<script src="assets/uploads/js/bootstrap.min.js"></script>', 'themes/head/head.php', '2015-12-04 22:00:00', '2015-12-08 09:27:56'),
(3, 'themes_foot_code', 'themes_foot_code', '<script>\r\n    $(document).ready(function(){\r\n        console.log(''themes-folder-x.php ile geliyor. site bitimi calisiyor..'');\r\n    });\r\n</script>', 'themes/foot/foot.php', '2015-12-04 22:00:00', '2015-12-08 09:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(4, 'php ogreniyorum', 'php-ogreniyorum', 'beyler php ogreniyorum ve ilk makale kayıt islemlerimiz basladi.'),
(5, 'asp.net ogreniyorum', 'aspnet-ogreniyorum', 'asp.net ogreniyorum ve xxx islemleri ole bi basladimki hala devam ediyorum.'),
(6, 'html ogreniyorum', 'html-ogreniyorum', 'htmle basladik ulan ne guzel gidiyor derken nerden bilecektim sanal hammal olacagimi oldukmu sanal hammal hayatim iste o zaman kaydi gitti.');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `showcase`
--

CREATE TABLE `showcase` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `show_home_page` int(11) DEFAULT NULL,
  `themes_area_id` int(11) NOT NULL,
  `themes_id` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showcase`
--

INSERT INTO `showcase` (`id`, `title`, `content`, `show_home_page`, `themes_area_id`, `themes_id`, `create_time`, `update_time`) VALUES
(2, 'vitrin1 gun', '<p>vitrin denemesi başlangı&ccedil;tır. gun&nbsp;</p>\r\n', 1, 23, 0, '2015-12-15 20:42:39', '2015-12-19 09:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `showcase_to_blog`
--

CREATE TABLE `showcase_to_blog` (
  `id` int(11) NOT NULL,
  `showcase_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `showcase_to_categories`
--

CREATE TABLE `showcase_to_categories` (
  `id` int(11) NOT NULL,
  `showcase_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showcase_to_categories`
--

INSERT INTO `showcase_to_categories` (`id`, `showcase_id`, `categories_id`) VALUES
(57, 2, 2),
(58, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `settings_name` varchar(120) NOT NULL,
  `settings_key` text NOT NULL,
  `settings_value` text NOT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `settings_name`, `settings_key`, `settings_value`, `created_time`, `updated_time`) VALUES
(1, 'enable_responsive', 'enable_responsive', '', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(2, 'restrict_roaming', 'restrict_roaming', 'enable', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(3, 'site_logo', 'site_logo', 'assets/uploads/system/images/site_logo_G0PdXLLsmVYmY2-logo.jpg', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(4, 'watermark', 'watermark', '', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(5, 'home_page_sidebar', 'home_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(6, 'home_page_passive_footer', 'home_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:40:05'),
(7, 'category_page_sidebar', 'category_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(8, 'category_page_passive_footer', 'category_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:40:15'),
(9, 'search_page_sidebar', 'search_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(10, 'search_page_passive_footer', 'search_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:40:35'),
(11, 'brand_page_sidebar', 'brand_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(12, 'brand_page_passive_footer', 'brand_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:40:46'),
(13, 'product_page_sidebar', 'product_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(14, 'product_page_passive_footer', 'product_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:40:56'),
(15, 'blog_page_sidebar', 'blog_page_sidebar', 'enable_sidebar', '2015-11-21 22:00:00', '2015-12-22 20:35:57'),
(16, 'blog_page_passive_footer', 'blog_page_passive_footer', '', '2015-11-21 22:00:00', '2015-11-22 18:41:06'),
(17, 'home_restrict_roaming', 'home_restrict_roaming', '', '2015-11-25 22:00:00', '2015-11-26 21:11:38'),
(18, 'listing_restrict_roaming', 'listing_restrict_roaming', 'enable', '2015-11-25 22:00:00', '2015-12-22 20:35:57'),
(19, 'details_restrict_roaming', 'details_restrict_roaming', 'enable', '2015-11-25 22:00:00', '2015-12-22 20:35:57'),
(20, 'blog_restrict_roaming', 'blog_restrict_roaming', 'enable', '2015-11-25 22:00:00', '2015-12-22 20:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `themes_area_id` int(11) NOT NULL,
  `default_themes_id` tinyint(1) NOT NULL,
  `active_themes_id` tinyint(1) NOT NULL,
  `name` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `themes_area_id`, `default_themes_id`, `active_themes_id`, `name`, `content`, `file_path`, `create_time`, `update_time`) VALUES
(17, 2, 1, 1, 'hazir tema footer', '</section>\r\n</div>\r\n<div id="footer">\r\n<div class="container">\r\nhazir tema footer icerik\r\n<br>\r\ngüncelleme: ev footer alanı\r\n</div>\r\n</div>', 'themes/footer/footer17.php', '2015-10-04 14:38:48', '2015-12-06 20:48:40'),
(18, 5, 1, 1, 'hazir tema', 'hazir tema showcase views icerik guncelleme - varsayılan ,aktif', 'themes/showcase/views/showcase-views18.php', '2015-10-04 14:52:44', '2015-10-06 21:34:15'),
(19, 7, 0, 1, 'blog frame', 'hazir tema blog frame icerik', 'themes/blog/frame/blog-frame19.php', '2015-10-04 15:01:26', '2015-12-21 19:58:17'),
(22, 1, 0, 1, 'maviweb1', '<div id="header">\r\n<div class="container">\r\n<div class="logo" style="width:120px;">{logo}</div>\r\n<div class="halan">\r\ngüncelleme: ev header alanı \r\n</div>\r\n</div>\r\n</div>\r\n<section>\r\n<div class="container">', 'themes/header/header22.html', '2015-10-06 20:28:52', '2015-12-22 21:32:54'),
(23, 4, 1, 0, 'hazir tema', 'showcase frame - guncelleme - varsayılan tema, aktif tema', 'themes/showcase/frame/showcase-frame23.php', '2015-10-06 20:33:22', '2015-10-06 21:35:27'),
(24, 4, 0, 1, 'maviweb1', 'tema aktif olarak seçtim', 'themes/showcase/frame/showcase-frame24.php', '2015-10-06 20:35:27', '2015-10-06 21:35:27'),
(25, 1, 0, 0, 'tema yapiliyor', '<div id="header"> \r\n  <div class="logo">{logo}</div>\r\n  <div class="hmenu">\r\n   <ul class="hmenu_ul">\r\n    {kategoriler}\r\n   </ul>\r\n  </div>\r\n  </div>', 'themes/header/header25.php', '2015-10-12 17:11:32', '2015-12-03 21:53:12'),
(26, 1, 1, 0, 'yeni header', 'asd qwe qweasd', 'themes/header/header26.php', '2015-12-21 18:57:49', '2015-12-22 21:32:54'),
(27, 8, 0, 1, 'blog views', 'değişkenleri yapılmamış blog views', 'themes/blog/views/blog-views27.php', '2015-12-21 18:59:04', '2015-12-22 20:08:56'),
(28, 7, 1, 0, 'maviweb1', 'blog içerik deneme maviweb1', 'themes/blog/frame/blog-frame28.php', '2015-12-22 19:08:17', '2015-12-22 20:08:17'),
(29, 8, 1, 0, 'maviweb1', 'blog içerik maviweb1 blog views', 'themes/blog/views/blog-views29.php', '2015-12-22 19:08:56', '2015-12-22 20:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `themes_area`
--

CREATE TABLE `themes_area` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_extension` varchar(120) NOT NULL,
  `class_name` varchar(80) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_area`
--

INSERT INTO `themes_area` (`id`, `parent_id`, `name`, `file_path`, `file_extension`, `class_name`, `create_time`, `update_time`) VALUES
(1, 0, 'header', 'themes/header/', 'header', 'header', '2015-09-22 21:00:00', '2015-10-08 19:41:35'),
(2, 0, 'footer', 'themes/footer/', 'footer', 'footer', '2015-09-22 21:00:00', '2015-10-08 19:41:39'),
(3, 0, 'showcase', 'themes/showcase/', 'showcase', 'showcase', '2015-09-22 21:00:00', '2015-10-08 19:41:47'),
(4, 3, 'showcase frame', 'themes/showcase/frame/', 'showcase-frame', 'showcase_frame', '2015-09-22 21:00:00', '2015-10-08 19:42:15'),
(5, 3, 'showcase views', 'themes/showcase/views/', 'showcase-views', 'showcase_views', '2015-09-22 21:00:00', '2015-10-08 19:42:10'),
(6, 0, 'blog', 'themes/blog/', 'blog', 'blog', '2015-09-22 21:00:00', '2015-10-08 19:42:18'),
(7, 6, 'blog frame', 'themes/blog/frame/', 'blog-frame', 'blog_frame', '2015-09-22 21:00:00', '2015-10-08 19:42:23'),
(8, 6, 'blog views', 'themes/blog/views/', 'blog-views', 'blog_views', '2015-09-22 21:00:00', '2015-10-08 19:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `surname` varchar(120) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`, `created_time`, `updated_time`) VALUES
(2, 'huseyindol', '4af6e55debe20f1aed19dcd8905312873dee6d06d33f973e2b958e43f476c0f1d709233a1eefef25f6382c1cda05a719d927171653f95bbef3409ae524dd7045K853qiCk53FP+wifJ+zlZZhw+jUBUP1lgXhML4WO9BY=', 'huseyindol@gmail.coms', 'huseyin', 'dol', '2015-09-09 00:00:00', '2015-10-06 22:41:04'),
(3, 'zehradol', 'bd8128748da0b91bf001d2601b2bec2b8744dab670884fc10af1782f88a7cc02d1fac9ff6f2d7029adbcc19b0ffd591e04a8a2e82b3c14cdb9fba9c26d1c70ceR7ND6JMqOJfc5lnz6jQ176QOP+begsUv8JzMgwf07mM=', 'zehradol@hotmail.com', 'zehra', 'dol', '2015-09-15 00:00:00', '2015-09-15 20:15:16'),
(4, 'yunusdol', 'ff4104efc909d83477c4fd709621852446aafe88534dd027fb37fc0814aef32dded28aae6c6e18963f4e30dff750b9e6bacdbc3c2b0a44d49593275f2f8617a4N0eawTrIDz6Q6jsAEijGp0A98vHasOXXerMjKihkXuE=', 'yunusdol@hotmail.com', 'yunus', 'dol', '0000-00-00 00:00:00', '2015-09-15 20:33:56'),
(5, 'nergizdol', 'bd7437119079aae2b5fc1dac618a6a74483e06a8d10b0457722bee6aacbe615b79d2d8565d1e0acdc3e93934ed1a33e6341994b01c9a0e674cd3075d6ac331b4y9aqbiTdYX1uNXq4CS9a8BlQ5NOvt71C0cEkmovfcu8=', 'nergizdol@gmail.com', 'nergiz', 'dol', '2015-09-15 22:40:33', '2015-09-15 20:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `users_id` int(11) NOT NULL,
  `phone` char(15) NOT NULL,
  `phone2` char(15) NOT NULL,
  `gsm` char(15) NOT NULL,
  `seniority` varchar(80) NOT NULL,
  `tc_no` char(11) NOT NULL,
  `corporation` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`users_id`, `phone`, `phone2`, `gsm`, `seniority`, `tc_no`, `corporation`, `address`) VALUES
(2, '2125983352', '1234567890', '5445582825', 'senior front-end developers', '1234567890', 'projesoft bilişim hizmetleri web tasarım ve programlama', 'fevzi çakmak mahallesi türkeli sokak no:30 d:4'),
(3, '0123456789', '0123456789', '0123456789', 'muhasebe', '01234567891', 'yılmazer a.ş', 'zehra - xxx xxxx xxxxx xxx'),
(4, '0123456789', '0123456789', '0123456789', 'satış', '01234567891', 'yunus - xxx xxxx xxxxx xxx', 'yunus - xxx xxxx xxxxx xxx'),
(5, '0123456789', '0123456789', '0123456789', 'vezneci', '0123456789', 'nergiz - xxx xxxx xxxxx xxx', 'nergiz - xxx xxxx xxxxx xxx');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `permissions_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `users_id`, `permissions_id`) VALUES
(3, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_type` (`pages_type`) USING BTREE;

--
-- Indexes for table `blog_to_showcase`
--
ALTER TABLE `blog_to_showcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `custom_code`
--
ALTER TABLE `custom_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase`
--
ALTER TABLE `showcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase_to_blog`
--
ALTER TABLE `showcase_to_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcase_to_categories`
--
ALTER TABLE `showcase_to_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `themes_area_id` (`themes_area_id`);

--
-- Indexes for table `themes_area`
--
ALTER TABLE `themes_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD UNIQUE KEY `users_id` (`users_id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `permissions_id` (`permissions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `blog_to_showcase`
--
ALTER TABLE `blog_to_showcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `custom_code`
--
ALTER TABLE `custom_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `showcase`
--
ALTER TABLE `showcase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `showcase_to_blog`
--
ALTER TABLE `showcase_to_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `showcase_to_categories`
--
ALTER TABLE `showcase_to_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `themes_area`
--
ALTER TABLE `themes_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes-area` FOREIGN KEY (`themes_area_id`) REFERENCES `themes_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `details-users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `us_pe-to-permissions` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us_pe-to-users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
