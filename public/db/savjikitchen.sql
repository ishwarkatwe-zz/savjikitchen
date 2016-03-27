-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 06:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `savjikitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_19_142637_create_tblrecipecategories_table', 1),
('2015_04_20_174134_create_recipe_cooking_methods', 1),
('2015_04_20_174427_create_cuisines', 1),
('2015_04_20_174601_create_tags', 1),
('2015_04_21_161918_create_recipes_table', 1),
('2015_04_21_171422_add_recipe_primary_keys', 1),
('2015_04_21_174539_create_recipe_ingredient', 2),
('2015_04_21_180052_create_recipe_cooking_sections', 2),
('2015_04_21_180219_create_recipe_cooking_steps', 2),
('2015_04_21_180442_create_measure_units', 2),
('2015_04_21_180837_add_primary_key_for_incredient', 3),
('2015_04_21_181152_add_sections_primary_keys', 4),
('2015_04_21_181352_add_primary_key_for_recipe_steps', 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_tags`
--

CREATE TABLE IF NOT EXISTS `recipe_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `recipe_tags`
--

INSERT INTO `recipe_tags` (`id`, `recipe_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(4, 170, 4, '2016-01-20 15:41:01', '0000-00-00 00:00:00'),
(12, 170, 12, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(13, 170, 13, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(14, 170, 14, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(15, 170, 15, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(16, 170, 16, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(17, 170, 17, '2016-01-20 17:32:21', '0000-00-00 00:00:00'),
(18, 171, 2, '2016-01-26 09:50:53', '0000-00-00 00:00:00'),
(19, 171, 18, '2016-01-26 09:50:53', '0000-00-00 00:00:00'),
(20, 171, 19, '2016-01-26 09:50:53', '0000-00-00 00:00:00'),
(21, 171, 20, '2016-01-26 09:50:53', '0000-00-00 00:00:00'),
(22, 171, 2, '2016-01-26 09:50:53', '0000-00-00 00:00:00'),
(23, 172, 1, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(24, 172, 21, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(25, 172, 22, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(26, 172, 23, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(27, 172, 24, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(28, 172, 25, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(29, 172, 26, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(30, 172, 27, '2016-01-26 09:57:47', '0000-00-00 00:00:00'),
(31, 173, 1, '2016-01-26 09:59:22', '0000-00-00 00:00:00'),
(32, 173, 28, '2016-01-26 09:59:22', '0000-00-00 00:00:00'),
(33, 173, 29, '2016-01-26 09:59:22', '0000-00-00 00:00:00'),
(34, 173, 30, '2016-01-26 09:59:22', '0000-00-00 00:00:00'),
(35, 174, 1, '2016-01-26 10:00:41', '0000-00-00 00:00:00'),
(36, 174, 31, '2016-01-26 10:00:41', '0000-00-00 00:00:00'),
(37, 174, 32, '2016-01-26 10:00:41', '0000-00-00 00:00:00'),
(38, 174, 33, '2016-01-26 10:00:41', '0000-00-00 00:00:00'),
(39, 175, 1, '2016-01-26 10:02:26', '0000-00-00 00:00:00'),
(40, 175, 34, '2016-01-26 10:02:26', '0000-00-00 00:00:00'),
(41, 175, 35, '2016-01-26 10:02:26', '0000-00-00 00:00:00'),
(42, 176, 1, '2016-01-26 10:03:20', '0000-00-00 00:00:00'),
(43, 176, 34, '2016-01-26 10:03:20', '0000-00-00 00:00:00'),
(44, 176, 35, '2016-01-26 10:03:20', '0000-00-00 00:00:00'),
(45, 177, 1, '2016-01-26 10:06:43', '0000-00-00 00:00:00'),
(46, 177, 2, '2016-01-26 10:06:43', '0000-00-00 00:00:00'),
(47, 177, 36, '2016-01-26 10:06:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '', '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(2, 'Chicken', '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(3, 'Birayni', '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(4, ' Chicken', '2016-01-20 15:41:01', '2016-01-20 15:41:01'),
(5, ' Birayni', '2016-01-20 15:41:01', '2016-01-20 15:41:01'),
(6, '  Birayni', '2016-01-20 16:02:09', '2016-01-20 16:02:09'),
(7, 'Dum', '2016-01-20 16:02:09', '2016-01-20 16:02:09'),
(8, 'Hyderabadi ', '2016-01-20 16:02:09', '2016-01-20 16:02:09'),
(9, 'Spicy', '2016-01-20 16:02:09', '2016-01-20 16:02:09'),
(10, 'Rice', '2016-01-20 16:02:09', '2016-01-20 16:02:09'),
(11, 'Chicken Fry', '2016-01-20 16:02:10', '2016-01-20 16:02:10'),
(12, '   Birayni', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(13, ' Dum', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(14, ' Hyderabadi ', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(15, ' Spicy', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(16, ' Rice', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(17, ' Chicken Fry', '2016-01-20 17:32:20', '2016-01-20 17:32:20'),
(18, 'Crispy', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(19, 'Fried', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(20, 'Curry', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(21, 'Smoked', '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(22, 'Chicken,', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(23, 'Whisky', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(24, '&', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(25, 'Pearl', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(26, 'Barley', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(27, 'Salad', '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(28, 'Kaddu', '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(29, 'ka', '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(30, 'Shorba', '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(31, 'Wasabi', '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(32, 'Aloo', '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(33, 'Tikki', '2016-01-26 10:00:41', '2016-01-26 10:00:41'),
(34, 'Mushroom', '2016-01-26 10:02:25', '2016-01-26 10:02:25'),
(35, 'Khitchda', '2016-01-26 10:02:25', '2016-01-26 10:02:25'),
(36, 'Sajji', '2016-01-26 10:06:42', '2016-01-26 10:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE IF NOT EXISTS `tbl_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_by` int(11) DEFAULT NULL,
  `action_type` enum('R','C','L','F') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id`, `action_by`, `action_type`, `user_id`, `recipe_id`, `comment`, `created_at`, `active`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'R', NULL, 170, NULL, '2016-01-20 15:04:35', 1, '2016-01-20 15:04:35', NULL),
(2, 1, 'L', NULL, 170, NULL, '2016-01-25 13:59:12', 1, '2016-01-25 13:59:12', NULL),
(3, 1, 'C', NULL, 170, 'kjkjk', '2016-01-25 13:59:16', 1, '2016-01-25 13:59:16', NULL),
(4, 1, 'C', NULL, 170, 'jkjkj', '2016-01-25 13:59:18', 1, '2016-01-25 13:59:18', NULL),
(5, 1, 'C', NULL, 170, 'kjkj', '2016-01-25 13:59:30', 1, '2016-01-25 13:59:30', NULL),
(6, 1, 'C', NULL, 170, 'jkjk', '2016-01-25 13:59:32', 1, '2016-01-25 13:59:32', NULL),
(7, 1, 'C', NULL, 170, 'kjkjkj', '2016-01-25 13:59:38', 1, '2016-01-25 13:59:38', NULL),
(8, 1, 'C', NULL, 170, 'jkjkjk', '2016-01-25 13:59:41', 1, '2016-01-25 13:59:41', NULL),
(9, 1, 'C', NULL, 170, 'klklkl', '2016-01-25 13:59:50', 1, '2016-01-25 13:59:50', NULL),
(10, 1, 'C', NULL, 170, 'hhhhhhhhhhhhhh', '2016-01-25 14:00:09', 1, '2016-01-25 14:00:09', NULL),
(11, 1, 'C', NULL, 170, 'vvv', '2016-01-25 14:00:35', 1, '2016-01-25 14:00:35', NULL),
(12, 1, 'C', NULL, 170, 'vvvvcfxf', '2016-01-25 14:00:37', 1, '2016-01-25 14:00:37', NULL),
(13, 1, 'C', NULL, 170, 'cvcvcvcvcvcv', '2016-01-25 14:00:40', 1, '2016-01-25 14:00:40', NULL),
(14, 5, 'R', NULL, 171, NULL, '2016-01-26 09:50:52', 1, '2016-01-26 09:50:52', NULL),
(15, 5, 'R', NULL, 172, NULL, '2016-01-26 09:57:46', 1, '2016-01-26 09:57:46', NULL),
(16, 5, 'R', NULL, 173, NULL, '2016-01-26 09:59:22', 1, '2016-01-26 09:59:22', NULL),
(17, 5, 'R', NULL, 174, NULL, '2016-01-26 10:00:40', 1, '2016-01-26 10:00:40', NULL),
(18, 5, 'R', NULL, 175, NULL, '2016-01-26 10:02:25', 1, '2016-01-26 10:02:25', NULL),
(19, 5, 'R', NULL, 176, NULL, '2016-01-26 10:03:19', 1, '2016-01-26 10:03:19', NULL),
(20, 5, 'R', NULL, 177, NULL, '2016-01-26 10:06:40', 1, '2016-01-26 10:06:40', NULL),
(21, 5, 'L', NULL, 176, NULL, '2016-01-26 10:07:58', 1, '2016-01-26 10:07:58', NULL),
(22, 5, 'C', NULL, 176, 'hi', '2016-01-26 14:23:33', 1, '2016-01-26 14:23:33', NULL),
(23, 5, 'L', NULL, 171, NULL, '2016-01-26 14:34:29', 1, '2016-01-26 14:34:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'YU', 'Yugoslavia'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuisines`
--

CREATE TABLE IF NOT EXISTS `tbl_cuisines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_cuisines`
--

INSERT INTO `tbl_cuisines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'African', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'American', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Asian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Caribbean', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Chinese', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'French', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Greek', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Indian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Italian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Japanese', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Jewish', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Mediterranean', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Mexican', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Middle Eastern', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Moroccan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Spanish', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Thai', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Other', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_measure_units`
--

CREATE TABLE IF NOT EXISTS `tbl_measure_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_measure_units`
--

INSERT INTO `tbl_measure_units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'teaspoon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'tablespoon(tbsp)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'fluid ounce(fl oz)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'gill (about 1/2 cup)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'cup (c)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'pint (fl pt)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'quart (fl qt)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'gallon (gal)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'ml(mL)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'liter, litre (L)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'deciliter, decilitre (dL)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'pound (lb)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ounce (oz)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'milligram or milligramme (mg)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'gram or gramme (g)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'kilogram or kilogramme (kg)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'millimeter or millimetre (mm)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'centimeter or centimetre (cm)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'meter or metre (m)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'inch (in or ")', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Piece', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prepare_time`
--

CREATE TABLE IF NOT EXISTS `tbl_prepare_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_prepare_time`
--

INSERT INTO `tbl_prepare_time` (`id`, `time`) VALUES
(1, '15 Mins'),
(2, '30 Mins'),
(3, '45 Mins'),
(4, '1 Hour'),
(5, '2 Hour'),
(6, '3 Hours / more');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipes`
--

CREATE TABLE IF NOT EXISTS `tbl_recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `cooking_method_id` int(10) unsigned NOT NULL,
  `servings` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuisine_id` int(10) unsigned NOT NULL,
  `preparation_time` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `cooking_time` int(11) NOT NULL,
  `youtube_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_vegetarian` tinyint(1) NOT NULL,
  `links` text COLLATE utf8_unicode_ci NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `activited_by` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_recipes_category_id_foreign` (`category_id`),
  KEY `tbl_recipes_cooking_method_id_foreign` (`cooking_method_id`),
  KEY `tbl_recipes_cuisine_id_foreign` (`cuisine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=178 ;

--
-- Dumping data for table `tbl_recipes`
--

INSERT INTO `tbl_recipes` (`id`, `image`, `name`, `description`, `note`, `category_id`, `cooking_method_id`, `servings`, `cuisine_id`, `preparation_time`, `cooking_time`, `youtube_url`, `is_vegetarian`, `links`, `added_by`, `created_at`, `active`, `activited_by`, `deleted`, `deleted_at`, `deleted_by`, `updated_at`) VALUES
(170, '1453311133.JPG', 'Chicken Dum Briyani', 'Special recipe for chicken lovers and hyderabadi guys, ', 'If you are spicy lover add 1tsp of red chilli powder.', 6, 14, '2', 8, '3', 0, '', 0, '', 1, '2016-01-20 15:04:35', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-20 17:32:20'),
(171, '1453801851.jpg', 'Crispy Fried Curry Chicken', 'Juicy, succulent chicken breasts are cut length-wise, marinated in aromatic masala and batter fried till crispy perfection.', 'Add tomato puree, black pepper, garlic cloves, chopped coriander to mayonnaise. \r\n\r\nMix well.', 6, 2, '2', 1, '1', 0, '', 0, 'http://food.ndtv.com/recipe-crispy-fried-curry-chicken-my-yellow-table-776196', 5, '2016-01-26 09:50:51', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 09:50:51'),
(172, '1453802266.jpg', 'Smoked Chicken, Whisky & Pearl Barley Salad', 'In this recipe, the ancient grain pearl barley gets spiked with whisky and pairs beautifully with the flavour of smoked chicken. The warm salad combined with the crunch of sprouts, cucumber and pomegranate makes it a scrumptious treat.', 'scsdsdsd', 2, 1, '1', 1, '1', 0, '', 0, '', 5, '2016-01-26 09:57:46', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 09:57:46'),
(173, '1453802361.jpg', 'Kaddu ka Shorba', 'utter in a pan and add the chopped garlic. Saute for 1-2 minutes on medium flame and then add the whisky and cooked pearl barley. Saute until the alcohol evaporates. Add salt as per tast', 'asasasas', 2, 5, '12', 9, '2', 0, '', 0, '', 5, '2016-01-26 09:59:22', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 09:59:22'),
(174, '1453802440.jpg', 'Wasabi Aloo Tikki', 'In a large mixing bowl add the pearl barley mixture, smoked chicken and the remaining ingredients. Check seasoning and add more parsley if required. Serve immediately.', 'ssssssssssss', 11, 3, '2', 9, '3', 0, '', 0, '', 5, '2016-01-26 10:00:40', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 10:00:40'),
(175, '1453802545.jpg', 'Mushroom Khitchda', '\r\n2. Heat butter in a pan and add the chopped garlic. Saute for 1-2 minutes on medium flame and then add the whisky and cooked pearl barley. Saute until the alcohol evaporates. Add salt as per taste and take off the f', '', 6, 9, '3', 4, '3', 0, '', 0, '', 5, '2016-01-26 10:02:25', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 10:02:25'),
(176, '1453802599.jpg', 'Mushroom Khitchda', 'butter in a pan and add the chopped garlic. Saute for 1-2 minutes on medium flame and then add the whisky and cooked pearl barley. Saute until the alcohol evaporates. Add salt as per taste ', 's', 8, 5, '111', 7, '2', 0, '', 0, '', 5, '2016-01-26 10:03:19', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 10:03:19'),
(177, '1453802799.jpg', 'Chicken Sajji', 'aaaaaaaaaaaaaa', '', 4, 3, '2', 4, '3', 0, '', 0, '', 5, '2016-01-26 10:06:40', 1, NULL, 0, '0000-00-00 00:00:00', NULL, '2016-01-26 10:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_recipe_categories`
--

INSERT INTO `tbl_recipe_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appetizer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Beverage', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Beverage', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bread', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dessert', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Main', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Salad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Soup', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Side Dish : Grains', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Side Dish : Pasta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Side Dish : Potato', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Side Dish : Vegetable', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_recipe_comments`
--

INSERT INTO `tbl_recipe_comments` (`id`, `recipe_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 170, 1, 'kjkjk', '2016-01-25 13:59:16', '2016-01-25 13:59:16'),
(2, 170, 1, 'jkjkj', '2016-01-25 13:59:18', '2016-01-25 13:59:18'),
(3, 170, 1, 'kjkj', '2016-01-25 13:59:30', '2016-01-25 13:59:30'),
(4, 170, 1, 'jkjk', '2016-01-25 13:59:32', '2016-01-25 13:59:32'),
(5, 170, 1, 'jkjkj', '2016-01-25 13:59:34', '2016-01-25 13:59:34'),
(6, 170, 1, 'jkjkj', '2016-01-25 13:59:36', '2016-01-25 13:59:36'),
(7, 170, 1, 'kjkjkj', '2016-01-25 13:59:38', '2016-01-25 13:59:38'),
(8, 170, 1, 'jkjkjk', '2016-01-25 13:59:40', '2016-01-25 13:59:40'),
(9, 170, 1, 'klklkl', '2016-01-25 13:59:50', '2016-01-25 13:59:50'),
(10, 170, 1, 'klklkl', '2016-01-25 13:59:53', '2016-01-25 13:59:53'),
(11, 170, 1, 'klklkl', '2016-01-25 13:59:55', '2016-01-25 13:59:55'),
(12, 170, 1, 'klklkl', '2016-01-25 13:59:58', '2016-01-25 13:59:58'),
(13, 170, 1, 'hhhhhhhhhhhhhh', '2016-01-25 14:00:09', '2016-01-25 14:00:09'),
(14, 170, 1, 'vvv', '2016-01-25 14:00:35', '2016-01-25 14:00:35'),
(15, 170, 1, 'vvvvcfxf', '2016-01-25 14:00:37', '2016-01-25 14:00:37'),
(16, 170, 1, 'cvcvcvcvcvcv', '2016-01-25 14:00:40', '2016-01-25 14:00:40'),
(17, 176, 5, 'hi', '2016-01-26 14:23:33', '2016-01-26 14:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_cooking_methods`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_cooking_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_recipe_cooking_methods`
--

INSERT INTO `tbl_recipe_cooking_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Baking Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Barbecue Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Blender Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Fondue Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Fried Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Grilling Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ice-Cream Maker Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Microwave Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Pressure Cooker Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Rice Cooker Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Sandwich Press Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Slow Cooker Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Steamed Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Stir-Fry and Wok Recipes', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_cooking_sections`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_cooking_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_recipe_cooking_sections_recipe_id_foreign` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_cooking_steps`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_cooking_steps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_section_id` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_recipe_cooking_steps_recipe_section_id_foreign` (`recipe_section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_ingredients`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_recipe_ingredients_recipe_id_foreign` (`recipe_id`),
  KEY `tbl_recipe_ingredients_unit_id_foreign` (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_recipe_ingredients`
--

INSERT INTO `tbl_recipe_ingredients` (`id`, `recipe_id`, `name`, `unit_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 170, 'Chicken', 15, 300, '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(2, 170, 'Onion', 5, 2, '2016-01-20 15:04:35', '2016-01-20 15:26:35'),
(3, 170, 'Salt', 1, 2, '2016-01-20 15:26:56', '2016-01-20 15:32:32'),
(4, 170, 'Turmeric', 1, 1, '2016-01-20 15:27:41', '2016-01-20 15:27:41'),
(5, 170, 'Tomato', 5, 1, '2016-01-20 15:27:56', '2016-01-20 15:27:56'),
(6, 170, 'Green Chilli', 21, 4, '2016-01-20 15:30:34', '2016-01-20 15:30:34'),
(7, 170, 'Bay Leaves', 21, 2, '2016-01-20 15:30:58', '2016-01-20 15:30:58'),
(8, 170, 'Cumin Seeds ( Jeera )', 1, 1, '2016-01-20 15:32:21', '2016-01-20 15:33:18'),
(9, 170, 'Cardomon ( Yalaki )', 21, 3, '2016-01-20 15:33:10', '2016-01-20 15:33:10'),
(10, 170, 'Cinnamon ( Dalchini )', 21, 1, '2016-01-20 15:34:08', '2016-01-20 15:34:08'),
(11, 170, 'Rice ( Basmati cooked  )', 15, 200, '2016-01-20 15:34:34', '2016-01-20 15:58:55'),
(12, 170, 'Oil ( Any )', 2, 3, '2016-01-20 15:35:51', '2016-01-20 15:35:51'),
(13, 170, 'Ghee', 2, 1, '2016-01-20 15:36:00', '2016-01-20 15:36:00'),
(14, 170, 'Corinder Leaves ( Dhania )', 15, 10, '2016-01-20 15:37:36', '2016-01-20 15:37:36'),
(15, 170, 'Garam Masala', 2, 2, '2016-01-20 15:37:56', '2016-01-20 15:37:56'),
(16, 170, 'Red Chilli Powder', 1, 2, '2016-01-20 15:53:38', '2016-01-20 15:53:38'),
(17, 171, 'chicken breasts', 21, 4, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(18, 171, 'saunf', 2, 1, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(19, 171, 'jeera', 2, 1, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(20, 172, 'sdsdsd', 16, 12, '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(21, 172, 'dfdfdf', 16, 12, '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(22, 172, 'asasas', 15, 12, '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(23, 173, 'qwqw', 6, 1, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(24, 173, 'sdsd', 8, 12, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(25, 174, 'qqqqqqqq', 19, 22, '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(26, 174, 'eeeeeeee', 16, 3, '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(27, 175, 'wwwwwwwwww', 5, 2, '2016-01-26 10:02:25', '2016-01-26 10:02:25'),
(28, 176, 'ffffffffffff', 16, 3, '2016-01-26 10:03:19', '2016-01-26 10:03:19'),
(29, 176, 'zzzzzzzzzzzzzz', 15, 2, '2016-01-26 10:03:19', '2016-01-26 10:03:19'),
(30, 177, 'qqqqqqqqqq', 18, 1, '2016-01-26 10:06:41', '2016-01-26 10:06:41'),
(31, 177, 'qwqw', 16, 1, '2016-01-26 10:06:41', '2016-01-26 10:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_instructions`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `instruction` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_recipe_instructions`
--

INSERT INTO `tbl_recipe_instructions` (`id`, `recipe_id`, `instruction`, `updated_at`, `created_at`) VALUES
(1, 170, 'Take a thick pan add 2tbsp oil and 1tbsp of ghee and heat in low fame.', '2016-01-20 15:48:55', '2016-01-20 15:04:35'),
(2, 170, 'Add green chillis, cumin seeds, Bay leaves, cardomon ( Yalaki ), Cinnamon ( Dalchini ), Fry for 1 min add 2cups of onion fry until it gets golden brown.', '2016-01-20 15:50:24', '2016-01-20 15:44:36'),
(3, 170, 'Add Tomatos and steer it well, for taste add salt and turmeric and 2 tsp of red chilli power.', '2016-01-20 15:53:18', '2016-01-20 15:48:50'),
(4, 170, 'Add chicken and mix it well close the pan for 15 mins in a low fame,  add cooked rice to the pan and steam it for 15 mins to get your Dum Briyani ready :)', '2016-01-20 15:57:57', '2016-01-20 15:57:57'),
(5, 171, 'Cut 4 chicken breasts in length.', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(6, 171, 'Add pounded jeera, saunf, ginger-garlic paste, red chilli powder, dhaniya powder, turmeric powder, lemon juice, black pepper to the chicken, mix well.', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(7, 171, 'Now, add chopped garlic and curry leaves to it. ', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(8, 171, 'Add refined flour and rice flour to the bowl.', '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(9, 172, 'sdsdsd', '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(10, 172, 'wecxxdaqwqw', '2016-01-26 09:57:46', '2016-01-26 09:57:46'),
(11, 173, 'sdsdsd', '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(12, 173, 'qwqw', '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(13, 174, 'wwwwwwwwwwwwww', '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(14, 174, 'ssssssssssssssssss', '2016-01-26 10:00:40', '2016-01-26 10:00:40'),
(15, 175, 'aaaaaaaaaaaaaaaaaaa', '2016-01-26 10:02:25', '2016-01-26 10:02:25'),
(16, 176, 'sssssssssssssssssss', '2016-01-26 10:03:19', '2016-01-26 10:03:19'),
(17, 176, 'ssssssssssssssssss', '2016-01-26 10:03:19', '2016-01-26 10:03:19'),
(18, 177, 'wwwwwwwwwwwww', '2016-01-26 10:06:41', '2016-01-26 10:06:41'),
(19, 177, 'sssssssssss', '2016-01-26 10:06:42', '2016-01-26 10:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe_likes`
--

CREATE TABLE IF NOT EXISTS `tbl_recipe_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_recipe_likes`
--

INSERT INTO `tbl_recipe_likes` (`id`, `recipe_id`, `user_id`, `like`, `created_at`, `updated_at`) VALUES
(1, 170, 1, 1, '2016-01-25 13:59:12', '2016-01-25 13:59:43'),
(2, 176, 5, 1, '2016-01-26 10:07:58', '2016-01-26 10:07:58'),
(3, 171, 5, 1, '2016-01-26 14:34:29', '2016-01-26 14:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`) VALUES
(1, 'Karnataka'),
(2, 'Gujrat'),
(3, 'Tamil Nadu'),
(4, 'Maharastra'),
(5, 'Rajasthan'),
(6, 'Andhra Pradesh'),
(7, 'Madhya Pradesh'),
(8, 'West Bengal'),
(9, 'Chatisgadh'),
(10, 'Haryana'),
(12, 'Kerala'),
(13, 'Delhi'),
(14, 'Other Overseas State');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `name`, `recipe_id`, `created_at`, `updated_at`) VALUES
(1, '', 170, '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(2, 'Chicken', 170, '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(3, 'Birayni', 170, '2016-01-20 15:04:35', '2016-01-20 15:04:35'),
(4, 'chicken', 171, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(5, 'Crispy', 171, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(6, 'Fried', 171, '2016-01-26 09:50:52', '2016-01-26 09:50:52'),
(7, 'Curry', 171, '2016-01-26 09:50:53', '2016-01-26 09:50:53'),
(8, 'Chicken', 171, '2016-01-26 09:50:53', '2016-01-26 09:50:53'),
(9, '', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(10, 'Smoked', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(11, 'Chicken,', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(12, 'Whisky', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(13, '&', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(14, 'Pearl', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(15, 'Barley', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(16, 'Salad', 172, '2016-01-26 09:57:47', '2016-01-26 09:57:47'),
(17, '', 173, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(18, 'Kaddu', 173, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(19, 'ka', 173, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(20, 'Shorba', 173, '2016-01-26 09:59:22', '2016-01-26 09:59:22'),
(21, '', 174, '2016-01-26 10:00:41', '2016-01-26 10:00:41'),
(22, 'Wasabi', 174, '2016-01-26 10:00:41', '2016-01-26 10:00:41'),
(23, 'Aloo', 174, '2016-01-26 10:00:41', '2016-01-26 10:00:41'),
(24, 'Tikki', 174, '2016-01-26 10:00:41', '2016-01-26 10:00:41'),
(25, '', 175, '2016-01-26 10:02:26', '2016-01-26 10:02:26'),
(26, 'Mushroom', 175, '2016-01-26 10:02:26', '2016-01-26 10:02:26'),
(27, 'Khitchda', 175, '2016-01-26 10:02:26', '2016-01-26 10:02:26'),
(28, '', 176, '2016-01-26 10:03:19', '2016-01-26 10:03:19'),
(29, 'Mushroom', 176, '2016-01-26 10:03:20', '2016-01-26 10:03:20'),
(30, 'Khitchda', 176, '2016-01-26 10:03:20', '2016-01-26 10:03:20'),
(31, '', 177, '2016-01-26 10:06:42', '2016-01-26 10:06:42'),
(32, 'Chicken', 177, '2016-01-26 10:06:42', '2016-01-26 10:06:42'),
(33, 'Sajji', 177, '2016-01-26 10:06:43', '2016-01-26 10:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_follow`
--

CREATE TABLE IF NOT EXISTS `tbl_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gender` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `remember_token`, `country_id`, `state_id`, `city`, `created_at`, `updated_at`, `gender`, `contact`, `about`) VALUES
(1, '1453562096.png', 'Ishwar Katwe', 'ishwar.katwe0816@gmail.com', '$2y$10$JO0OFNQwTAIwmg29/y7x0OLfM9xGPFGuP1IW.D82QcSmuFx5OGEjq', 'J4UTK7MIkF33A4sr7i6Rm55d7akhMZLfRLVaD5GrhhZtDwHiK0heTs6sv0sM', 99, 1, 'Hubli', '2015-07-04 04:16:03', '2016-01-23 15:14:57', 'male', '9632463245', 'Hello this is demo text in descs'),
(2, 'default.png', 'vinayak', 'vinayak@gmail.com', '$2y$10$XCz1K9ES2RmQ019xqc/FdOZy9GIIkfeQ42q8YaLO.SV06m.HWV48O', 'XzNAX9A4627gFkWZ8kc0clG3nHRB8EmjztXq57hMOxtiTq9JcZ69WoUpYwoj', 99, 1, 'Mangalore', '2015-07-04 04:16:50', '2016-01-18 15:10:22', 'male', '9060308845', 'Tadka man'),
(3, 'default.png', 'Jayachandra', 'demo@gmail.com', '$2y$10$AUKvmtygdZJEpdow/5heo.xCqfwhjNpHer.CFeD9BqJb0LRrj2g.O', 'ncGoA36qykWE1buwHLhAhUCmYN434oRV5QEvuqItwfWB5ZdchCalwOJRzVDA', NULL, NULL, NULL, '2015-07-12 05:15:32', '2016-01-26 13:42:35', NULL, NULL, NULL),
(4, 'default.png', 'Deviprasad', 'Deviprasad@gmail.com', '$2y$10$S/OREtod7EQjPLdGddKqo.dWy2UnJCj7vFQUcgAHei/IwSk6xoLsK', 'efh0dlC6oYo0eni70nx3jjGzlmYgPOqIaAYP5O5vcks9WMoBG1oLuq08nwvS', NULL, NULL, NULL, '2015-07-12 05:16:01', '2015-12-09 16:40:08', NULL, NULL, NULL),
(5, '1453818600.png', 'keshav', 'keshav@gmail.com', '$2y$10$LsCe/FPLnY71GacCVXSbnuPyqKxiGp/EPkHBUcFcuj0tisP0apigq', 'pEbgwzAYTnHgMQI8lzMoR7qSuJtCQIwvdAbwvsV8hprcrHQvpz25Wiha47VB', 1, 1, '', '2016-01-26 09:34:15', '2016-02-06 07:10:42', 'female', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_recipes`
--
ALTER TABLE `tbl_recipes`
  ADD CONSTRAINT `tbl_recipes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_recipe_categories` (`id`),
  ADD CONSTRAINT `tbl_recipes_cooking_method_id_foreign` FOREIGN KEY (`cooking_method_id`) REFERENCES `tbl_recipe_cooking_methods` (`id`),
  ADD CONSTRAINT `tbl_recipes_cuisine_id_foreign` FOREIGN KEY (`cuisine_id`) REFERENCES `tbl_cuisines` (`id`);

--
-- Constraints for table `tbl_recipe_cooking_steps`
--
ALTER TABLE `tbl_recipe_cooking_steps`
  ADD CONSTRAINT `tbl_recipe_cooking_steps_recipe_section_id_foreign` FOREIGN KEY (`recipe_section_id`) REFERENCES `tbl_recipe_cooking_sections` (`id`);

--
-- Constraints for table `tbl_recipe_ingredients`
--
ALTER TABLE `tbl_recipe_ingredients`
  ADD CONSTRAINT `tbl_recipe_ingredients_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `tbl_recipes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
