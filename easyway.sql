-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 02:27 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyway`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `first_name`, `last_name`, `father_name`, `date_birth`, `user_id`, `alias`, `image`, `status`, `telephone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Jahongir', 'Ismatov', 'Father name', '1996-10-17', 2, 'jahongir', 'profile_2_1571328322.jpg', 1, '+998 90 3738499', 'Toshkent shahri', 'php', '2019-10-17 18:10:22', '2019-10-19 13:10:08'),
(4, 'Doston', 'Ismailov', 'Nishanovich', '1995-03-14', 1, 'dostontiu', 'profile_1_1571413791.png', 1, '+998977458090', 'Toshkent shahri', 'I am php developer.', '2019-10-18 17:10:51', '2019-11-23 16:11:34'),
(5, 'Doston', 'Ismailov', 'Nishanovich', '1995-03-14', 1, 'doston', '', 1, '8977458090', 'Beruniy tumani', 'Web developer', '2019-12-07 00:00:00', '2019-12-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  `region_id` int(11) NOT NULL,
  `lat` varchar(32) DEFAULT NULL,
  `lon` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1570991369);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/debug/*', 2, NULL, NULL, NULL, 1570990674, 1570990674),
('/gii/*', 2, NULL, NULL, NULL, 1570990670, 1570990670),
('/rbac/*', 2, NULL, NULL, NULL, 1570990677, 1570990677),
('/site/*', 2, NULL, NULL, NULL, 1570990660, 1570990660),
('/site/error', 2, NULL, NULL, NULL, 1570996562, 1570996562),
('/site/index', 2, NULL, NULL, NULL, 1570990666, 1570990666),
('admin', 1, 'Admin role', NULL, NULL, 1570991231, 1570991231),
('adminAccess', 2, 'Access to admin', NULL, NULL, 1570990790, 1570990790),
('manager', 1, 'Manager role', NULL, NULL, 1570991151, 1570991151),
('postAccess', 2, 'Access to posts', NULL, NULL, 1570990750, 1570990750),
('sysadmin', 1, 'System administration manager', NULL, NULL, 1570991317, 1570991317),
('sysAdminAccess', 2, 'System admin access that enter gii and show debug', NULL, NULL, 1570990954, 1570990954),
('user ', 1, 'User role', NULL, NULL, 1570991072, 1570991126),
('userAccess', 2, 'Access to users that give a role to users', NULL, NULL, 1570990847, 1570990847);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'manager'),
('admin', 'userAccess'),
('adminAccess', '/site/*'),
('adminAccess', '/site/index'),
('manager', 'adminAccess'),
('manager', 'user '),
('postAccess', '/site/*'),
('postAccess', '/site/index'),
('sysadmin', 'admin'),
('sysadmin', 'sysAdminAccess'),
('sysAdminAccess', '/debug/*'),
('sysAdminAccess', '/gii/*'),
('user ', 'postAccess'),
('userAccess', '/rbac/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  `zip_code` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `zip_code`) VALUES
(1, 'Uzbekistan', 'UZ', '100131'),
(2, 'Saudi Arabia', 'SA', '21577');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count_people` int(11) DEFAULT NULL,
  `arrival_date` datetime DEFAULT NULL,
  `depart_date` datetime DEFAULT NULL,
  `arrival_airport_id` int(11) NOT NULL,
  `depart_airport_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `count_people` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL COMMENT 'Created by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mahram_name`
--

CREATE TABLE `mahram_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Home', NULL, NULL, NULL, NULL),
(2, 'Error page', 1, '/site/error', NULL, NULL),
(3, 'Yana error', 1, '/site/index', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pilgrim`
--

CREATE TABLE `pilgrim` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `p_number` varchar(32) NOT NULL,
  `p_issue_date` date DEFAULT NULL,
  `p_expiry_date` date DEFAULT NULL,
  `p_type` tinyint(1) DEFAULT NULL,
  `p_mrz` varchar(255) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `marital_status` tinyint(1) DEFAULT NULL,
  `mahram_id` int(11) DEFAULT NULL,
  `mahram_name_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `pilgrim_type_id` int(11) NOT NULL,
  `personal_number` bigint(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pilgrim_type`
--

CREATE TABLE `pilgrim_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  `zip_code` varchar(32) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `lat` varchar(32) DEFAULT NULL,
  `lon` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `code`, `zip_code`, `country_id`, `lat`, `lon`) VALUES
(1, 'Tashkent', '123', '123', 1, '41.311081', '69.240562'),
(2, 'Samarkand', 'SAM', '123', 1, '39.652451', '66.970139');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_view` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_view`, `access_token`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '-yFqenz67ekxN68bXV0sqr57ehSXVkV5', NULL, NULL, '$2y$13$YUXq6.WjkQqhYYryUsW/Vuao2ivMnSqNCNHkNhsZgENIvhgO8uePC', NULL, 'dostonberuniy@gmail.com', 10, 1570989753, 1570989753, 'dxQb3X86iGZeroKHp_562HAdjN1ZPcoF_1570989753'),
(2, 'jahongir', 'TqKlDFLUyB33zvSmXTC088StuF0lCMQw', NULL, NULL, '$2y$13$gKLxEppCxAmLJ6rfhkLeR.We9DWZUHDs6I7YL4Q4xV.iDj0DE4GQS', NULL, 'hajumranovza@gmail.com', 10, 1571327157, 1571327157, 'pePO9AZDROnCSn3VOOHDGj2ZinwpnxUu_1571327157');

-- --------------------------------------------------------

--
-- Table structure for table `visa_number`
--

CREATE TABLE `visa_number` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `p_number` varchar(10) DEFAULT NULL,
  `visa` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visa_number`
--

INSERT INTO `visa_number` (`id`, `name`, `p_number`, `visa`, `created_at`) VALUES
(1, 'MAMAYUSUP CHORIEVICH  NARKULOV ', 'FA0957436', '6068991624', '2020-01-05 15:44:02'),
(2, 'MENGSORA YUSUPOVNA  BERDIEVA ', 'FA0957210', '6068992116', '2020-01-05 15:44:39'),
(3, 'NARGIZA   NARKULOVA ', 'AB0497013', '6069001246', '2020-01-05 15:44:55'),
(4, 'NARGIZA MAVLONOVNA  BADALOVA ', 'FA0312828', '6069002229', '2020-01-05 15:45:07'),
(5, 'KHAFIZULLOKH NIZOMIDDINOVI  TOSHBOLTAEV ', 'FA0655347', '6069001431', '2020-01-05 15:45:37'),
(6, 'KHABIBULLOKH NIZOMIDDINOVI  TOSHBOLTAEV ', 'FA0655334', '6069014175', '2020-01-05 15:45:51'),
(7, 'GULBOKHRA TOSHBOLTAEVNA  CHORIEVA ', 'FA0687685', '6069001848', '2020-01-05 15:46:05'),
(8, 'ZEBUNISO TOSHBOLTA KIZI CHORIEVA ', 'FA0139257', '6069014237', '2020-01-05 15:46:20'),
(9, 'SHOKHIDA RAMAZONOVNA  CHORIEVA ', 'FA0680922', '6069001997', '2020-01-05 15:46:36'),
(10, 'MURADJON URINBOEVICH  KUSHINBOEV ', 'FA0951343', '6069002107', '2020-01-05 15:46:51'),
(11, 'MAVLYUDA ISHMAMADOVNA  KUSHINBOEVA ', 'FA0916852', '6069002798', '2020-01-05 15:47:52'),
(12, 'KHURSAN YULDASHEVNA  KENJAEVA ', 'FA0945042', '6069002902', '2020-01-05 15:48:14'),
(13, 'ABDURAKHMON URINOVICH  KENJAEV ', 'FA0936201', '6069003016', '2020-01-05 15:49:05'),
(14, 'ZAYNAB TUROPOVNA  MENGNOROVA ', 'FA0944414', '6069004896', '2020-01-05 15:49:32'),
(15, 'ABDUKHOLIK XXX  ERGASHEV ', 'FA0926058', '6069005267', '2020-01-05 15:49:53'),
(16, 'MALIKA TOJIEVNA  TURAEVA ', 'FA0926068', '6069005636', '2020-01-05 15:50:37'),
(17, 'KHOSIYAT XXX  MENGTURAEVA ', 'FA0936036', '6069005806', '2020-01-05 15:50:56'),
(18, 'KHURRAM XXX  MURODOV ', 'FA0938419', '6069005952', '2020-01-05 15:51:13'),
(19, 'ABAT XXX  SHAYMARDANOVA ', 'FA0475422', '6069006106', '2020-01-05 15:51:30'),
(20, 'GULINOR XXX  JUMAEVA ', 'FA0949906', '6069006203', '2020-01-05 15:52:01'),
(21, 'ALIYAR SHAYMIROVICH  BAYKARAEV ', 'FA0936047', '6069006295', '2020-01-05 15:55:39'),
(22, 'ANOR IBATOVNA  KHOLBAEVA ', 'FA0934981', '6069006443', '2020-01-05 15:55:57'),
(23, 'BOZOR XXX  KHAKIMOV ', 'FA0947618', '6069006622', '2020-01-05 15:56:21'),
(24, 'YUSUF MAMADAMINOVICH  KHOLBAEV ', 'FA0947612', '6069006718', '2020-01-05 15:56:35'),
(25, 'GULSORA KHOLMAMATOVNA  KHAKBERDIEVA ', 'FA0947605', '6069006838', '2020-01-05 15:56:48'),
(26, 'TASHTEMIR XXX  ESANOV ', 'FA0949374', '6069007022', '2020-01-05 15:57:06'),
(27, 'MEKHRI ABDUGAPPAROVNA  DJURABOEVA ', 'FA0947601', '6069007156', '2020-01-05 15:57:22'),
(28, 'UROK SHASAIDOVICH  SAIDOV ', 'FA0938404', '6069008763', '2020-01-05 15:57:37'),
(29, 'SHIRIN XXX  SAMATOVA ', 'FA0938731', '6069008971', '2020-01-05 15:58:25'),
(30, 'ZIYODA OCHILDIEVNA  TOSHMATOVA ', 'FA0936951', '6069009166', '2020-01-05 15:58:44'),
(31, 'SHOKIRJON AKHMEDOVICH  MIRZAEV ', 'FA0948397', '6069009310', '2020-01-05 15:59:23'),
(32, 'PARDAKHOL XXX  MIRZAEVA ', 'FA0931730', '6069009409', '2020-01-05 15:59:55'),
(33, 'TULKIN KHUDAYKULOVICH  SAIDOV ', 'FA0947761', '6069009542', '2020-01-05 16:01:01'),
(35, 'BARNOKIZ ANVAROVNA  SAIDOVA ', 'FA0948398', '6069009642', '2020-01-05 16:03:31'),
(36, 'KHANIFA NAZIROVNA  NAZIROVA ', 'FA0947767', '6069009784', '2020-01-05 16:04:47'),
(37, 'MUZAFAR XXX  KIBRIEV ', 'FA0675314', '6069009893', '2020-01-05 16:05:03'),
(38, 'KORASOCH XXX  KIBRIEVA ', 'FA0675309', '6069010017', '2020-01-05 16:05:19'),
(39, 'MALIKA DOLIEVNA  DAVLYATOVA ', 'FA0521121', '6069010121', '2020-01-05 16:05:34'),
(40, 'ABDUKHOMID AVOEVICH  GULBOEV ', 'FA0654265', '6069010250', '2020-01-05 16:06:26'),
(41, 'MAKHBUBA BOBOEVNA  KHASANOVA ', 'FA0658842', '6068994987', '2020-01-05 16:06:49'),
(42, 'ABDUSATTOR RAKHMANOVICH  SAPAROV ', 'FA0920045', '6068998934', '2020-01-05 16:07:29'),
(43, 'ABDURAKHMON ISMATULLAEVICH  KAMILOV ', 'FA0948290', '6068999476', '2020-01-05 16:07:53'),
(44, 'ISMATULLA NUSRATOVICH  KOMILOV ', 'FA0365334', '6068999674', '2020-01-05 16:08:13'),
(45, 'SAPARTOSH XXX  TULAGANOVA ', 'FA0942142', '6068999860', '2020-01-05 16:08:31'),
(46, 'DILNOZA TASHTUKHTAEVNA  RADJABOVA ', 'FA0242366', '6069000666', '2020-01-05 16:09:07'),
(47, 'SANGIN XXX  SAIDOV ', 'FA0947886', '6069000099', '2020-01-05 16:09:21'),
(48, 'NURILLA SAIDILLAEVICH  SHODMONOV ', 'FA0063191', '6069000288', '2020-01-05 16:09:37'),
(49, 'NIZAMIDDIN   CHORIEV ', 'AC0155212', '6069000465', '2020-01-05 16:09:53'),
(50, 'ISMOIL TOSHBOEVICH  MAMATMURATOV ', 'FA0944436', '6069050793', '2020-01-05 16:25:24'),
(51, 'ROKHATOY MELIBAEVNA  SHODIEVA ', 'FA0920267', '6069050730', '2020-01-05 16:25:48'),
(52, 'LALIKHON MUKHTOROVNA  SOTVOLDIEVA ', 'FA0121362', '6069049297', '2020-01-05 16:26:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-account-user_id` (`user_id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-airport-region_id` (`region_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-flight-arrival_airport_id` (`arrival_airport_id`),
  ADD KEY `idx-flight-depart_airport_id` (`depart_airport_id`),
  ADD KEY `idx-flight-season_id` (`season_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-group-region_id` (`region_id`),
  ADD KEY `idx-group-flight_id` (`flight_id`),
  ADD KEY `idx-group-user_id` (`user_id`);

--
-- Indexes for table `mahram_name`
--
ALTER TABLE `mahram_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pilgrim`
--
ALTER TABLE `pilgrim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-pilgrim-nationality_id` (`nationality_id`),
  ADD KEY `idx-pilgrim-region_id` (`region_id`),
  ADD KEY `idx-pilgrim-mahram_id` (`mahram_id`),
  ADD KEY `idx-pilgrim-mahram_name_id` (`mahram_name_id`),
  ADD KEY `idx-pilgrim-group_id` (`group_id`),
  ADD KEY `idx-pilgrim-pilgrim_type_id` (`pilgrim_type_id`),
  ADD KEY `idx-pilgrim-user_id` (`user_id`);

--
-- Indexes for table `pilgrim_type`
--
ALTER TABLE `pilgrim_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-region-country_id` (`country_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `visa_number`
--
ALTER TABLE `visa_number`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahram_name`
--
ALTER TABLE `mahram_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pilgrim`
--
ALTER TABLE `pilgrim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pilgrim_type`
--
ALTER TABLE `pilgrim_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visa_number`
--
ALTER TABLE `visa_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk-account-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `fk-airport-region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `fk-flight-arrival_airport_id` FOREIGN KEY (`arrival_airport_id`) REFERENCES `airport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-flight-depart_airport_id` FOREIGN KEY (`depart_airport_id`) REFERENCES `airport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-flight-season_id` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk-group-flight_id` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-group-region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-group-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pilgrim`
--
ALTER TABLE `pilgrim`
  ADD CONSTRAINT `fk-pilgrim-group_id` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-mahram_id` FOREIGN KEY (`mahram_id`) REFERENCES `pilgrim` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-mahram_name_id` FOREIGN KEY (`mahram_name_id`) REFERENCES `mahram_name` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-nationality_id` FOREIGN KEY (`nationality_id`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-pilgrim_type_id` FOREIGN KEY (`pilgrim_type_id`) REFERENCES `pilgrim_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-pilgrim-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk-region-country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
