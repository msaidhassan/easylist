-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2024 at 02:31 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acfemdgm_easylist`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` enum('أنثي','ذكر') DEFAULT NULL,
  `what` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `important` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `main_field_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `country`, `gender`, `what`, `source`, `important`, `notes`, `user_id`, `new_franchise_id`, `main_field_id`, `created_at`, `updated_at`) VALUES
(13, 'Salem Ashraf', 'salemashraf2002@gmail.com', '+201098971853', 'مصر', NULL, 'فرد', 'المسؤول', '1', NULL, 29, 6, 1, '2024-12-09 22:20:19', '2024-12-09 22:20:19'),
(14, 'mostafa', 'engmostafaaboelalaa@gmail.com', '+376', 'أندورا', NULL, 'فرد', 'الفرانشيز', '2', 'رؤؤرؤرؤر', 29, 6, 2, '2024-12-12 03:22:22', '2024-12-12 03:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `client_attributions`
--

CREATE TABLE `client_attributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `previous_client_id` bigint(20) UNSIGNED NOT NULL,
  `existing_client_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `name_fr`, `code`, `created_at`, `updated_at`) VALUES
(1, 'أندورا', 'Andorra', 'Andorre', 'ad', NULL, NULL),
(2, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'Emirats Arabes Unis', 'ae', NULL, NULL),
(3, 'أفغانستان', 'Afghanistan', 'L\'Afghanistan', 'af', NULL, NULL),
(4, 'أنتيغوا وبربودا', 'Antigua and Barbuda', 'Antigua-et-Barbuda', 'ag', NULL, NULL),
(5, 'أنغيلا', 'Anguilla', 'Anguilla', 'ai', NULL, NULL),
(6, 'ألبانيا', 'Albania', 'Albanie', 'al', NULL, NULL),
(7, 'أرمينيا', 'Armenia', 'Arménie', 'am', NULL, NULL),
(8, 'جزر الأنتيل الهولندية', 'Netherlands Antilles', 'Antilles néerlandaises', 'an', NULL, NULL),
(9, 'أنغولا', 'Angola', 'Angola', 'ao', NULL, NULL),
(10, 'الأرجنتين', 'Argentina', 'Argentine', 'ar', NULL, NULL),
(11, 'النمسا', 'Austria', 'L\'Autriche', 'at', NULL, NULL),
(12, 'أستراليا', 'Australia', 'Australie', 'au', NULL, NULL),
(13, 'أروبا', 'Aruba', 'Aruba', 'aw', NULL, NULL),
(14, 'أذربيجان', 'Azerbaijan', 'Azerbaïdjan', 'az', NULL, NULL),
(15, 'البوسنة والهرسك', 'Bosnia and Herzegovina', 'Bosnie Herzégovine', 'ba', NULL, NULL),
(16, 'بربادوس', 'Barbados', 'La Barbade', 'bb', NULL, NULL),
(17, 'بنغلاديش', 'Bangladesh', 'Bangladesh', 'bd', NULL, NULL),
(18, 'بلجيكا', 'Belgium', 'Belgique', 'be', NULL, NULL),
(19, 'بوركينا فاسو', 'Burkina Faso', 'Burkina Faso', 'bf', NULL, NULL),
(20, 'بلغاريا', 'Bulgaria', 'Bulgarie', 'bg', NULL, NULL),
(21, 'البحرين', 'Bahrain', 'Bahreïn', 'bh', NULL, NULL),
(22, 'بوروندي', 'Burundi', 'Burundi', 'bi', NULL, NULL),
(23, 'بنين', 'Benin', 'Bénin', 'bj', NULL, NULL),
(24, 'برمودا', 'Bermuda', 'Bermudes', 'bm', NULL, NULL),
(25, 'بروناي دار السلام', 'Brunei Darussalam', 'Brunei Darussalam', 'bn', NULL, NULL),
(26, 'بوليفيا', 'Bolivia', 'Bolivie', 'bo', NULL, NULL),
(27, 'البرازيل', 'Brazil', 'Brésil', 'br', NULL, NULL),
(28, 'الباهاما', 'Bahamas', 'Bahamas', 'bs', NULL, NULL),
(29, 'بوتان', 'Bhutan', 'Bhoutan', 'bt', NULL, NULL),
(30, 'بوتسوانا', 'Botswana', 'Botswana', 'bw', NULL, NULL),
(31, 'روسيا البيضاء', 'Belarus', 'Biélorussie', 'by', NULL, NULL),
(32, 'بليز', 'Belize', 'Belize', 'bz', NULL, NULL),
(33, 'كندا', 'Canada', 'Canada', 'ca', NULL, NULL),
(34, 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)', 'cc', NULL, NULL),
(35, 'جمهورية الكونغو الديموقراطية', 'Democratic Republic of the Congo', 'République Démocratique du Congo', 'cd', NULL, NULL),
(36, 'جمهورية افريقيا الوسطى', 'Central African Republic', 'République centrafricaine', 'cf', NULL, NULL),
(37, 'الكونغو', 'Congo', 'Congo', 'cg', NULL, NULL),
(38, 'سويسرا', 'Switzerland', 'Suisse', 'ch', NULL, NULL),
(39, 'ساحل العاج (ساحل العاج)', 'Cote D\'Ivoire (Ivory Coast)', 'Cote D\'Ivoire (Côte d\'Ivoire)', 'ci', NULL, NULL),
(40, 'جزر كوك', 'Cook Islands', 'les Îles Cook', 'ck', NULL, NULL),
(41, 'تشيلي', 'Chile', 'Chili', 'cl', NULL, NULL),
(42, 'الكاميرون', 'Cameroon', 'Cameroun', 'cm', NULL, NULL),
(43, 'الصين', 'China', 'Chine', 'cn', NULL, NULL),
(44, 'كولومبيا', 'Colombia', 'Colombie', 'co', NULL, NULL),
(45, 'كوستا ريكا', 'Costa Rica', 'Costa Rica', 'cr', NULL, NULL),
(46, 'كوبا', 'Cuba', 'Cuba', 'cu', NULL, NULL),
(47, 'الرأس الأخضر', 'Cape Verde', 'Cap-Vert', 'cv', NULL, NULL),
(48, 'جزيرة الكريسماس', 'Christmas Island', 'L\'île de noël', 'cx', NULL, NULL),
(49, 'قبرص', 'Cyprus', 'Chypre', 'cy', NULL, NULL),
(50, 'جمهورية التشيك', 'Czech Republic', 'République Tchèque', 'cz', NULL, NULL),
(51, 'ألمانيا', 'Germany', 'Allemagne', 'de', NULL, NULL),
(52, 'جيبوتي', 'Djibouti', 'Djibouti', 'dj', NULL, NULL),
(53, 'الدنمارك', 'Denmark', 'Danemark', 'dk', NULL, NULL),
(54, 'دومينيكا', 'Dominica', 'Dominique', 'dm', NULL, NULL),
(55, 'جمهورية الدومنيكان', 'Dominican Republic', 'République Dominicaine', 'do', NULL, NULL),
(56, 'الجزائر', 'Algeria', 'Algérie', 'dz', NULL, NULL),
(57, 'الإكوادور', 'Ecuador', 'L\'Équateur', 'ec', NULL, NULL),
(58, 'استونيا', 'Estonia', 'Estonie', 'ee', NULL, NULL),
(59, 'مصر', 'Egypt', 'Egypte', 'eg', NULL, NULL),
(60, 'الصحراء الغربية', 'Western Sahara', 'Sahara occidental', 'eh', NULL, NULL),
(61, 'إريتريا', 'Eritrea', 'Erythrée', 'er', NULL, NULL),
(62, 'إسبانيا', 'Spain', 'Espagne', 'es', NULL, NULL),
(63, 'أثيوبيا', 'Ethiopia', 'Ethiopie', 'et', NULL, NULL),
(64, 'فنلندا', 'Finland', 'Finlande', 'fi', NULL, NULL),
(65, 'فيجي', 'Fiji', 'Fidji', 'fj', NULL, NULL),
(66, 'جزر فوكلاند (مالفيناس)', 'Falkland Islands (Malvinas)', 'Iles Malouines (Malouines)', 'fk', NULL, NULL),
(67, 'ولايات ميكرونيزيا الموحدة', 'Federated States of Micronesia', 'États fédérés de Micronésie', 'fm', NULL, NULL),
(68, 'جزر صناعية', 'Faroe Islands', 'Îles Féroé', 'fo', NULL, NULL),
(69, 'فرنسا', 'France', 'France', 'fr', NULL, NULL),
(70, 'الغابون', 'Gabon', 'Gabon', 'ga', NULL, NULL),
(71, 'بريطانيا العظمى (المملكة المتحدة)', 'Great Britain (UK)', 'Grande-Bretagne (UK)', 'gb', NULL, NULL),
(72, 'غرينادا', 'Grenada', 'Grenade', 'gd', NULL, NULL),
(73, 'جورجيا', 'Georgia', 'Géorgie', 'ge', NULL, NULL),
(74, 'غيانا الفرنسية', 'French Guiana', 'Guinée Française', 'gf', NULL, NULL),
(75, 'لا شيء', 'NULL', 'NUL', 'gg', NULL, NULL),
(76, 'غانا', 'Ghana', 'Ghana', 'gh', NULL, NULL),
(77, 'جبل طارق', 'Gibraltar', 'Gibraltar', 'gi', NULL, NULL),
(78, 'الأرض الخضراء', 'Greenland', 'Groenland', 'gl', NULL, NULL),
(79, 'غامبيا', 'Gambia', 'Gambie', 'gm', NULL, NULL),
(80, 'غينيا', 'Guinea', 'Guinée', 'gn', NULL, NULL),
(81, 'جوادلوب', 'Guadeloupe', 'La guadeloupe', 'gp', NULL, NULL),
(82, 'غينيا الإستوائية', 'Equatorial Guinea', 'Guinée Équatoriale', 'gq', NULL, NULL),
(83, 'اليونان', 'Greece', 'Grèce', 'gr', NULL, NULL),
(84, 'جورجيا وجزر ساندويتش', 'S. Georgia and S. Sandwich Islands', 'Géorgie du Sud et les îles Sandwich du Sud', 'gs', NULL, NULL),
(85, 'غواتيمالا', 'Guatemala', 'Guatemala', 'gt', NULL, NULL),
(86, 'غينيا بيساو', 'Guinea-Bissau', 'Guinée-Bissau', 'gw', NULL, NULL),
(87, 'غيانا', 'Guyana', 'Guyane', 'gy', NULL, NULL),
(88, 'هونغ كونغ', 'Hong Kong', 'Hong Kong', 'hk', NULL, NULL),
(89, 'هندوراس', 'Honduras', 'Honduras', 'hn', NULL, NULL),
(90, 'كرواتيا (هرفاتسكا)', 'Croatia (Hrvatska)', 'Croatie (Hrvatska)', 'hr', NULL, NULL),
(91, 'هايتي', 'Haiti', 'Haïti', 'ht', NULL, NULL),
(92, 'اليونان', 'Hungary', 'Hongrie', 'hu', NULL, NULL),
(93, 'أندونيسيا', 'Indonesia', 'Indonésie', 'id', NULL, NULL),
(94, 'أيرلندا', 'Ireland', 'Irlande', 'ie', NULL, NULL),
(96, 'الهند', 'India', 'Inde', 'in', NULL, NULL),
(97, 'العراق', 'Iraq', 'Irak', 'iq', NULL, NULL),
(98, 'إيران', 'Iran', 'Iran', 'ir', NULL, NULL),
(99, 'أيسلندا', 'Iceland', 'Islande', 'is', NULL, NULL),
(100, 'إيطاليا', 'Italy', 'Italie', 'it', NULL, NULL),
(101, 'جامايكا', 'Jamaica', 'Jamaïque', 'jm', NULL, NULL),
(102, 'الأردن', 'Jordan', 'Jordan', 'jo', NULL, NULL),
(103, 'اليابان', 'Japan', 'Japon', 'jp', NULL, NULL),
(104, 'كينيا', 'Kenya', 'Kenya', 'ke', NULL, NULL),
(105, 'قرغيزستان', 'Kyrgyzstan', 'Kirghizistan', 'kg', NULL, NULL),
(106, 'كمبوديا', 'Cambodia', 'Cambodge', 'kh', NULL, NULL),
(107, 'كيريباس', 'Kiribati', 'Kiribati', 'ki', NULL, NULL),
(108, 'جزر القمر', 'Comoros', 'Comores', 'km', NULL, NULL),
(109, 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', 'Saint-Christophe-et-Niévès', 'kn', NULL, NULL),
(110, 'كوريا الشمالية', 'Korea (North)', 'Corée du Nord', 'kp', NULL, NULL),
(111, 'كوريا، جنوب)', 'Korea (South)', 'COREE DU SUD)', 'kr', NULL, NULL),
(112, 'الكويت', 'Kuwait', 'Koweit', 'kw', NULL, NULL),
(113, 'جزر كايمان', 'Cayman Islands', 'Îles Caïmans', 'ky', NULL, NULL),
(114, 'كازاخستان', 'Kazakhstan', 'Le kazakhstan', 'kz', NULL, NULL),
(115, 'لاوس', 'Laos', 'Laos', 'la', NULL, NULL),
(116, 'لبنان', 'Lebanon', 'Liban', 'lb', NULL, NULL),
(117, 'القديسة لوسيا', 'Saint Lucia', 'Sainte-Lucie', 'lc', NULL, NULL),
(118, 'ليختنشتاين', 'Liechtenstein', 'Le Liechtenstein', 'li', NULL, NULL),
(119, 'سيريلانكا', 'Sri Lanka', 'Sri Lanka', 'lk', NULL, NULL),
(120, 'ليبيريا', 'Liberia', 'Libéria', 'lr', NULL, NULL),
(121, 'ليسوتو', 'Lesotho', 'Lesotho', 'ls', NULL, NULL),
(122, 'ليتوانيا', 'Lithuania', 'Lituanie', 'lt', NULL, NULL),
(123, 'لوكسمبورغ', 'Luxembourg', 'Luxembourg', 'lu', NULL, NULL),
(124, 'لاتفيا', 'Latvia', 'Lettonie', 'lv', NULL, NULL),
(125, 'ليبيا', 'Libya', 'Libye', 'ly', NULL, NULL),
(126, 'المغرب', 'Morocco', 'Maroc', 'ma', NULL, NULL),
(127, 'موناكو', 'Monaco', 'Monaco', 'mc', NULL, NULL),
(128, 'مولدوفا', 'Moldova', 'La Moldavie', 'md', NULL, NULL),
(129, 'مدغشقر', 'Madagascar', 'Madagascar', 'mg', NULL, NULL),
(130, 'جزر مارشال', 'Marshall Islands', 'Iles Marshall', 'mh', NULL, NULL),
(131, 'مقدونيا', 'Macedonia', 'Macédoine', 'mk', NULL, NULL),
(132, 'مالي', 'Mali', 'Mali', 'ml', NULL, NULL),
(133, 'ميانمار', 'Myanmar', 'Myanmar', 'mm', NULL, NULL),
(134, 'منغوليا', 'Mongolia', 'Mongolie', 'mn', NULL, NULL),
(135, 'ماكاو', 'Macao', 'Macao', 'mo', NULL, NULL),
(136, 'جزر مريانا الشمالية', 'Northern Mariana Islands', 'Îles Mariannes du Nord', 'mp', NULL, NULL),
(137, 'مارتينيك', 'Martinique', 'Martinique', 'mq', NULL, NULL),
(138, 'موريتانيا', 'Mauritania', 'Mauritanie', 'mr', NULL, NULL),
(139, 'مونتسيرات', 'Montserrat', 'Montserrat', 'ms', NULL, NULL),
(140, 'مالطا', 'Malta', 'Malte', 'mt', NULL, NULL),
(141, 'موريشيوس', 'Mauritius', 'Maurice', 'mu', NULL, NULL),
(142, 'جزر المالديف', 'Maldives', 'Maldives', 'mv', NULL, NULL),
(143, 'مالاوي', 'Malawi', 'Malawi', 'mw', NULL, NULL),
(144, 'المكسيك', 'Mexico', 'Mexique', 'mx', NULL, NULL),
(145, 'ماليزيا', 'Malaysia', 'Malaisie', 'my', NULL, NULL),
(146, 'موزمبيق', 'Mozambique', 'Mozambique', 'mz', NULL, NULL),
(147, 'ناميبيا', 'Namibia', 'Namibie', 'na', NULL, NULL),
(148, 'كاليدونيا الجديدة', 'New Caledonia', 'Nouvelle Calédonie', 'nc', NULL, NULL),
(149, 'النيجر', 'Niger', 'Niger', 'ne', NULL, NULL),
(150, 'جزيرة نورفولك', 'Norfolk Island', 'l\'ile de Norfolk', 'nf', NULL, NULL),
(151, 'نيجيريا', 'Nigeria', 'Nigeria', 'ng', NULL, NULL),
(152, 'نيكاراغوا', 'Nicaragua', 'Nicaragua', 'ni', NULL, NULL),
(153, 'هولندا', 'Netherlands', 'Pays-Bas', 'nl', NULL, NULL),
(154, 'النرويج', 'Norway', 'Norvège', 'no', NULL, NULL),
(155, 'نيبال', 'Nepal', 'Népal', 'np', NULL, NULL),
(156, 'ناورو', 'Nauru', 'Nauru', 'nr', NULL, NULL),
(157, 'نيوي', 'Niue', 'Niue', 'nu', NULL, NULL),
(158, 'نيوزيلندا (اوتياروا)', 'New Zealand (Aotearoa)', 'Nouvelle-Zélande (Aotearoa)', 'nz', NULL, NULL),
(159, 'سلطنة عمان', 'Oman', 'Oman', 'om', NULL, NULL),
(160, 'بناما', 'Panama', 'Panama', 'pa', NULL, NULL),
(161, 'بيرو', 'Peru', 'Pérou', 'pe', NULL, NULL),
(162, 'بولينيزيا الفرنسية', 'French Polynesia', 'Polynésie française', 'pf', NULL, NULL),
(163, 'بابوا غينيا الجديدة', 'Papua New Guinea', 'Papouasie Nouvelle Guinée', 'pg', NULL, NULL),
(164, 'الفلبين', 'Philippines', 'Philippines', 'ph', NULL, NULL),
(165, 'باكستان', 'Pakistan', 'Pakistan', 'pk', NULL, NULL),
(166, 'بولندا', 'Poland', 'Pologne', 'pl', NULL, NULL),
(167, 'سانت بيير وميكلون', 'Saint Pierre and Miquelon', 'Saint Pierre et Miquelon', 'pm', NULL, NULL),
(168, 'بيتكيرن', 'Pitcairn', 'Pitcairn', 'pn', NULL, NULL),
(169, 'الأراضي الفلسطينية', 'Palestinian Territory', 'Territoire Palestinien', 'ps', NULL, NULL),
(170, 'البرتغال', 'Portugal', 'le Portugal', 'pt', NULL, NULL),
(171, 'بالاو', 'Palau', 'Palau', 'pw', NULL, NULL),
(172, 'باراغواي', 'Paraguay', 'Paraguay', 'py', NULL, NULL),
(173, 'دولة قطر', 'Qatar', 'Qatar', 'qa', NULL, NULL),
(174, 'جمع شمل', 'Reunion', 'Réunion', 're', NULL, NULL),
(175, 'رومانيا', 'Romania', 'Roumanie', 'ro', NULL, NULL),
(176, 'الاتحاد الروسي', 'Russian Federation', 'Fédération Russe', 'ru', NULL, NULL),
(177, 'رواندا', 'Rwanda', 'Rwanda', 'rw', NULL, NULL),
(178, 'المملكة العربية السعودية', 'Saudi Arabia', 'Arabie Saoudite', 'sa', NULL, NULL),
(179, 'جزر سليمان', 'Solomon Islands', 'Les îles Salomon', 'sb', NULL, NULL),
(180, 'سيشيل', 'Seychelles', 'les Seychelles', 'sc', NULL, NULL),
(181, 'سودان', 'Sudan', 'Soudan', 'sd', NULL, NULL),
(182, 'السويد', 'Sweden', 'Suède', 'se', NULL, NULL),
(183, 'سنغافورة', 'Singapore', 'Singapour', 'sg', NULL, NULL),
(184, 'سانت هيلانة', 'Saint Helena', 'Sainte Hélène', 'sh', NULL, NULL),
(185, 'سلوفينيا', 'Slovenia', 'La slovénie', 'si', NULL, NULL),
(186, 'سفالبارد وجان مايان', 'Svalbard and Jan Mayen', 'Svalbard et Jan Mayen', 'sj', NULL, NULL),
(187, 'سلوفاكيا', 'Slovakia', 'La slovaquie', 'sk', NULL, NULL),
(188, 'سيرا ليون', 'Sierra Leone', 'Sierra Leone', 'sl', NULL, NULL),
(189, 'سان مارينو', 'San Marino', 'Saint Marin', 'sm', NULL, NULL),
(190, 'السنغال', 'Senegal', 'Sénégal', 'sn', NULL, NULL),
(191, 'الصومال', 'Somalia', 'Somalie', 'so', NULL, NULL),
(192, 'سورينام', 'Suriname', 'Suriname', 'sr', NULL, NULL),
(193, 'ساو تومي وبرنسيبي', 'Sao Tome and Principe', 'Sao Tomé et Principe', 'st', NULL, NULL),
(194, 'السلفادور', 'El Salvador', 'Le Salvador', 'sv', NULL, NULL),
(195, 'سوريا', 'Syria', 'Syrie', 'sy', NULL, NULL),
(196, 'سوازيلاند', 'Swaziland', 'Swaziland', 'sz', NULL, NULL),
(197, 'جزر تركس وكايكوس', 'Turks and Caicos Islands', 'îles Turques-et-Caïques', 'tc', NULL, NULL),
(198, 'تشاد', 'Chad', 'Le tchad', 'td', NULL, NULL),
(199, 'المناطق الجنوبية لفرنسا', 'French Southern Territories', 'Terres australes françaises', 'tf', NULL, NULL),
(200, 'ليذهب', 'Togo', 'Aller', 'tg', NULL, NULL),
(201, 'تايلاند', 'Thailand', 'Thaïlande', 'th', NULL, NULL),
(202, 'طاجيكستان', 'Tajikistan', 'Tadjikistan', 'tj', NULL, NULL),
(203, 'توكيلاو', 'Tokelau', 'Tokelau', 'tk', NULL, NULL),
(204, 'تركمانستان', 'Turkmenistan', 'Turkménistan', 'tm', NULL, NULL),
(205, 'تونس', 'Tunisia', 'Tunisie', 'tn', NULL, NULL),
(206, 'تونغا', 'Tonga', 'Tonga', 'to', NULL, NULL),
(207, 'ديك رومي', 'Turkey', 'dinde', 'tr', NULL, NULL),
(208, 'ترينداد وتوباغو', 'Trinidad and Tobago', 'Trinité-et-Tobago', 'tt', NULL, NULL),
(209, 'توفالو', 'Tuvalu', 'Tuvalu', 'tv', NULL, NULL),
(210, 'تايوان', 'Taiwan', 'Taïwan', 'tw', NULL, NULL),
(211, 'تنزانيا', 'Tanzania', 'Tanzanie', 'tz', NULL, NULL),
(212, 'أوكرانيا', 'Ukraine', 'Ukraine', 'ua', NULL, NULL),
(213, 'أوغندا', 'Uganda', 'Ouganda', 'ug', NULL, NULL),
(214, 'أوروغواي', 'Uruguay', 'Uruguay', 'uy', NULL, NULL),
(215, 'أوزبكستان', 'Uzbekistan', 'Ouzbékistan', 'uz', NULL, NULL),
(216, 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les-Grenadines', 'vc', NULL, NULL),
(217, 'فنزويلا', 'Venezuela', 'Venezuela', 've', NULL, NULL),
(218, 'جزر العذراء البريطانية)', 'Virgin Islands (British)', 'Îles vierges britanniques', 'vg', NULL, NULL),
(219, 'جزر فيرجن (الولايات المتحدة)', 'Virgin Islands (U.S.)', 'Îles Vierges (États-Unis)', 'vi', NULL, NULL),
(220, 'فيتنام', 'Viet Nam', 'Viet Nam', 'vn', NULL, NULL),
(221, 'فانواتو', 'Vanuatu', 'Vanuatu', 'vu', NULL, NULL),
(222, 'واليس وفوتونا', 'Wallis and Futuna', 'Wallis et Futuna', 'wf', NULL, NULL),
(223, 'ساموا', 'Samoa', 'Samoa', 'ws', NULL, NULL),
(224, 'اليمن', 'Yemen', 'Yémen', 'ye', NULL, NULL),
(225, 'مايوت', 'Mayotte', 'Mayotte', 'yt', NULL, NULL),
(226, 'جنوب أفريقيا', 'South Africa', 'Afrique du Sud', 'za', NULL, NULL),
(227, 'زامبيا', 'Zambia', 'Zambie', 'zm', NULL, NULL),
(228, 'زائير (سابقة)', 'Zaire (former)', 'Zaïre (ancien)', 'zr', NULL, NULL),
(229, 'زيمبابوي', 'Zimbabwe', 'Zimbabwe', 'zw', NULL, NULL),
(230, 'الولايات المتحدة', 'United States of America', 'les États-Unis d\'Amérique', 'us', NULL, NULL),
(231, 'غير معروف', 'unknown', 'unknown', 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationals`
--

CREATE TABLE `educationals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educationals`
--

INSERT INTO `educationals` (`id`, `text`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(1, '<p>هنقول احنا لسة حبايب؟&nbsp;</p>', 6, '2024-11-22 11:19:48', '2024-11-22 17:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `exp` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `main_field_id` bigint(20) UNSIGNED NOT NULL,
  `sub_field_id` bigint(20) UNSIGNED NOT NULL,
  `products` text NOT NULL,
  `languages` varchar(255) NOT NULL,
  `wphone` varchar(255) NOT NULL,
  `vphone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_current_orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`freelancer_current_orders`)),
  `freelancer_delivered_orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`freelancer_delivered_orders`)),
  `instapay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `name`, `age`, `exp`, `country`, `type`, `certificate`, `main_field_id`, `sub_field_id`, `products`, `languages`, `wphone`, `vphone`, `email`, `cv`, `user_id`, `new_franchise_id`, `created_at`, `updated_at`, `freelancer_current_orders`, `freelancer_delivered_orders`, `instapay`) VALUES
(5, 'سلوي سليمان', '30', NULL, 'مصر', 'أنثى', 'ماجيستير في الادب الإنجليزي', 1, 9, 'اخراج ابحاث ورسائل', 'العربية والإنجليزية', '01140039903', '01095311120', 'Salwa.soliman8912@gmail.com', NULL, 25, 6, '2024-12-13 22:44:13', '2024-12-13 22:44:13', NULL, NULL, NULL),
(6, 'مني غازي', '37', NULL, 'مصر', 'أنثى', 'ليسانس دراسات عربيه وإسلامية', 1, 10, 'اخراج ابحاث ورسائل', 'العربيه', '01010463950', '01010463950', 'Omalkora99@gmail.com', 'https://drive.google.com/open?id=1onQHPC2I8qsIBlgi1jssal-Npv3gB-7U', 25, 6, '2024-12-13 22:48:12', '2024-12-13 22:48:12', NULL, NULL, NULL),
(7, 'محمود صالح', '32', NULL, 'مصر', 'ذكر', 'بكالوريوس علوم الحاسب الالى', 10, 20, 'احصائيات المواقع', 'العربية والإنجليزية', '01098009525', '01098009525', 'M.sal89@Yahoo.con', NULL, 25, 6, '2024-12-13 22:51:09', '2024-12-13 22:51:09', NULL, NULL, NULL),
(8, 'سمر اشرف محمد', '29', NULL, 'مصر', 'أنثى', 'بكالوريوس تجارة', 1, 19, 'احصائيات المواقع', 'العربية والإنجليزية', '01018961650', '01018961650', 'Samarasherifs71@gmail.com', 'https://drive.google.com/open?id=1RTKJMRTaXVPXcWuOIZFXm0KHLBgJ90EH', 25, 6, '2024-12-13 22:55:25', '2024-12-13 22:55:25', NULL, NULL, NULL),
(9, 'نرمين حسين السطالى', '35', NULL, 'مصر', 'أنثى', 'بكالوريوس خدمه اجتماعيه', 1, 11, 'اخراج ابحاث ورسائل', 'العربيه', '01008320645', '01008320645', 'norelhosainy@yahoo.com', 'https://drive.google.com/open?id=1sdkhDQe4x9gEiKaqjH3DfDTHst1HBPeS', 25, 6, '2024-12-13 23:00:17', '2024-12-13 23:00:17', NULL, NULL, NULL),
(10, 'رانيا مصطفى حنفى', '30', NULL, 'مصر', 'أنثى', NULL, 3, 9, 'اخراج ابحاث ورسائل', 'العربية والإنجليزية', '01028916647', '01028916647', 'raniamoustafa91@gmail.com', NULL, 25, 6, '2024-12-13 23:03:01', '2024-12-13 23:03:01', NULL, NULL, NULL),
(11, 'صفاء صبحي غراب', '35', NULL, 'مصر', 'أنثى', 'دكتوراه في التربية قسم علم النفس التربوي', 1, 12, 'اخراج ابحاث ورسائل', 'العربية', '01025708701', '01025708701', 'gsafaa082@gmail.com', 'https://drive.google.com/open?id=1J6LYeQVfIlmBqRwMEjyXvz0pRfizRnx4', 25, 6, '2024-12-13 23:20:45', '2024-12-13 23:20:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_orders`
--

CREATE TABLE `freelancer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `freelancer_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `recieve` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_orders`
--

INSERT INTO `freelancer_orders` (`id`, `freelancer_id`, `order_id`, `recieve`, `created_at`, `updated_at`) VALUES
(13, 2, 9, '60', '2024-11-23 15:40:27', '2024-11-23 15:40:27'),
(14, 2, 10, '12000', '2024-11-25 08:47:02', '2024-11-25 08:47:02'),
(15, 2, 11, '1500', '2024-11-25 09:22:58', '2024-11-25 09:22:58'),
(16, 2, 12, '500', '2024-11-25 09:29:17', '2024-11-25 09:29:17'),
(17, 2, 13, '800', '2024-11-25 09:30:57', '2024-11-25 09:30:57'),
(18, 2, 14, '200', '2024-11-25 14:46:55', '2024-11-25 14:46:55'),
(19, 2, 15, '200', '2024-11-25 14:46:56', '2024-11-25 14:46:56'),
(20, 2, 16, '1', '2024-11-25 15:05:44', '2024-11-25 15:05:44'),
(21, 2, 17, '100', '2024-11-25 15:06:54', '2024-11-25 15:06:54'),
(22, 3, 18, '500', '2024-11-25 15:10:52', '2024-11-25 15:10:52'),
(23, 1, 19, '600', '2024-11-25 15:32:34', '2024-11-25 15:32:34'),
(24, 3, 19, '400', '2024-11-25 15:32:34', '2024-11-25 15:32:34'),
(25, 3, 20, '1600', '2024-11-25 15:34:07', '2024-11-25 15:34:07'),
(26, 1, 20, '1400', '2024-11-25 15:34:07', '2024-11-25 15:34:07'),
(27, 2, 21, '100', '2024-11-25 15:40:00', '2024-11-25 15:40:00'),
(28, 3, 20, '1600', '2024-11-25 17:20:42', '2024-11-25 17:20:42'),
(29, 1, 20, '1400', '2024-11-25 17:20:42', '2024-11-25 17:20:42'),
(30, 1, 19, '600', '2024-11-25 17:21:00', '2024-11-25 17:21:00'),
(31, 3, 19, '400', '2024-11-25 17:21:00', '2024-11-25 17:21:00'),
(32, 3, 22, '800', '2024-11-25 17:31:31', '2024-11-25 17:31:31'),
(33, 1, 23, '5', '2024-11-26 20:49:54', '2024-11-26 20:49:54'),
(34, 1, 24, '5', '2024-11-26 20:50:47', '2024-11-26 20:50:47'),
(35, 1, 25, '5', '2024-11-26 20:50:58', '2024-11-26 20:50:58'),
(36, 1, 26, '5', '2024-11-26 20:52:43', '2024-11-26 20:52:43'),
(37, 1, 27, '5', '2024-11-26 20:53:58', '2024-11-26 20:53:58'),
(38, 2, 28, '50', '2024-11-26 21:09:37', '2024-11-26 21:09:37'),
(39, 2, 29, '450', '2024-11-28 09:01:54', '2024-11-28 09:01:54'),
(40, 3, 30, '200', '2024-11-28 10:11:37', '2024-11-28 10:11:37'),
(41, 2, 31, '1000', '2024-11-28 10:14:07', '2024-11-28 10:14:07'),
(43, 4, 33, '100', '2024-11-28 11:54:06', '2024-11-28 11:54:06'),
(45, 2, 29, '450', '2024-11-28 12:10:19', '2024-11-28 12:10:19'),
(46, 1, 35, '400', '2024-12-06 14:31:29', '2024-12-06 14:31:29'),
(47, 2, 35, '400', '2024-12-06 14:31:29', '2024-12-06 14:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `general_inventories`
--

CREATE TABLE `general_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `totalRevenue` varchar(255) NOT NULL,
  `netProfit` varchar(255) NOT NULL,
  `totalFreelancerDues` varchar(255) NOT NULL,
  `affiliateMarketersCommission` varchar(255) NOT NULL,
  `salesOfficerCommission` int(111) DEFAULT NULL,
  `agentSalesCommission` varchar(255) NOT NULL,
  `salesManagerDues` varchar(255) NOT NULL,
  `marketing_manager` int(11) NOT NULL,
  `hr_managerDues` int(11) NOT NULL,
  `technicalDirectorDues` varchar(255) NOT NULL,
  `financialOfficerDues` varchar(255) NOT NULL,
  `ceoRemuneration` varchar(255) NOT NULL,
  `totalSetting` varchar(255) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_field` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`main_field`)),
  `orders_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`orders_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `freelancer_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_data`
--

CREATE TABLE `inventory_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `sales_agent_salary` int(11) NOT NULL,
  `sales_agent` int(11) NOT NULL,
  `sales_officer_salary` int(11) NOT NULL,
  `sales_officer` int(11) NOT NULL,
  `sales_manager_salary` int(11) NOT NULL,
  `sales_manager` int(11) NOT NULL,
  `marketing_manager_salary` int(11) NOT NULL,
  `marketing_manager` int(11) NOT NULL,
  `technical_director_salary` int(11) NOT NULL,
  `technical_director` int(11) NOT NULL,
  `CFO_salary` int(11) NOT NULL,
  `CFO` int(11) NOT NULL,
  `CEO_salary` int(11) NOT NULL,
  `CEO` int(11) NOT NULL,
  `hr_manager_salary` int(11) NOT NULL,
  `hr_manager` int(11) NOT NULL,
  `marketing_level1` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_setting_data`
--

CREATE TABLE `inventory_setting_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_setting_data`
--

INSERT INTO `inventory_setting_data` (`id`, `inventory_id`, `title`, `cost`, `salary`, `created_at`, `updated_at`) VALUES
(1, 4, 'مصاريف التشغيل', '10', '50', '2024-11-30 19:50:02', '2024-11-30 19:50:02'),
(2, 5, 'مصاريف التشغيل', '10', '50', '2024-12-03 09:29:44', '2024-12-03 09:29:44'),
(3, 6, 'مصاريف التشغيل', '10', '50', '2024-12-03 09:31:28', '2024-12-03 09:31:28'),
(4, 7, 'مصاريف التشغيل', '0', '50', '2024-12-06 14:33:44', '2024-12-06 14:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_updates`
--

CREATE TABLE `inventory_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `cost` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تدقيق لغوي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'تايبست', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'تنسيق', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'نسخ وتفريغ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ادخال بيانات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'الوورد Word', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'الاكسيل Excel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'الباور بوينت PowerPoint', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'عربي - اللغة العربية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'انجليزي - انجلش - English', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'فرنسي - French', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'الماني - German', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'ايطالي - Italian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'صيني - Chinese', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'تركي - Turkish', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'حساب ومعادلات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'تنسيق كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'اخراج كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'كتابة ابحاث ورسائل علمية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'عمل تحليل احصائي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, ' SPSS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'كتابة ابحاث جامعية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'كتابة ابحاث بكالوريوس', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'كتابة مشاريع تخرج', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'كتابة ابحاث ماجستير', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'كتابة ابحاث دكتوراة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'كتابة رسائل ماجستير', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'كتابة رسائل دكتوراة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'عمل أو تصميم عروض تقديمية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'عمل أو تصميم باور بوينت', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'كتابة ابحاث نشر', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'نشر الابحاث', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'كتابة ابحاث ترقية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'ترجمة ابحاث ورسائل', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'تدقيق ابحاث ورسائل', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'تنسيق ابحاث ورسائل', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'اخراج ابحاث ورسائل', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'تقرير الاقتباس', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'تقرير الذكاء الاصطناعي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'تنسيق كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'اخراج كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'أخرى', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'ترجمة عامة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'ترجمة طبية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'ترجمة تقنية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'ترجمة قانونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'ترجمة مالية واقتصادية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'ترجمة دينية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'ترجمة علمية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'ترجمة سياسية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'عربي لانجلش', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'name', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'عربي لفرنسي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'فرنسي لعربي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'عربي لتركي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'تركي لعربي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'عربي لألماني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'ألماني لعربي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'عربي لإيطالي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'إيطالي لعربي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'عربي لصيني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'صيني لعربي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'كتابة بروفايل شركة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'كتابة مقالات سيو SEO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'كتابة مقالات وأخبار', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'كتابة محتوى مواقع وصفحات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'تلخيص نصوص', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'تلخيص صوتيات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'تلخيص كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'تلخيص ابحاث', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'كتابة محتوى تسويقي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'كتابة أو تأليف محتوى اعلاني أو اعلانات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'كتابة قانونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'كتابة إعلانية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'تأليف اعلانات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'تأليف وكتابة كتب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'تأليف وكتابة قصص وروايات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'تأليف وكتابة أشعار', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'تأليف وكتابة سيناريو', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'التصميم', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'تصميم هوية بصرية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'تصميم بروفايل شركة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'تصميم لوجو أو شعار', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'تصاميم دعائية وإعلانية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'تصميم سيرة ذاتية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'تعديل صور', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'تصميم مطبوعات وأغلفة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'تصميم مواقع وتطبيقات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'عمل مونتاج فيديوهات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'تعديل فيديو', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'تصميم أو تجميع فيديو', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'تصوير فيديو', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'تصميم انترو أو أوترو', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'تصميم موشن جرافيك', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'تصميم وايت بورد', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'اضافة الترجمة للفيديوهات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'تصوير اعلانات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'تصميم اعلانات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'تصميم فيديوهات اعلانية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'تصميم غلاف أو أغلفة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'تصميم بروشور', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'تصميم توقيع', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'خدمات تعليق صوتي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'تعليق صوتي إعلاني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'تعليق صوتي تعليمي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'تعليق صوتي قصصي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'تعليق صوتي أشعار', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'تعليق صوتي غناء', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'تعليق صوتي دوبلاج', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'تعليق صوتي رد الي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'تعليق صوتي كتب صوتية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'هندسة صوتية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'تعليق صوتي فصحى', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'تعليق صوتي مصري', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'تعليق صوتي خليجي ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'تعليق صوتي أمريكي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'تعليق صوتي بريطاني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'تعليق صوتي عامية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'تسويق الكتروني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'منتجات الكترونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'خطط تسويقية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'استشارات تسويقية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'تسويق مواقع إلكترونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'باك لينك Backlink', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'جيست بوست Guest Post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'التحليل الرباعي SWOT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'تحسين محركات البحث SEO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'تاج مانجر Tag Manager', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'احصائيات المواقع', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'استضافة إعلانية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'التسويق عبر جوجل آدس', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'التسويق عبر فيسبوك', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'التسويق عبر انستقرام', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'التسويق عبر تويتر', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'التسويق عبر تيك توك', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'التسويق عبر سناب شات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'التسويق عبر واتساب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'التسويق عبر تليجرام', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'التسويق عبر البريد الإلكتروني', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'إدارة صفحات أو حسابات أو مجموعات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'بيع وشراء متابعين أو معجبين', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'بيع وشراء اعجابات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'بيع وشراء مشاركات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'بيع وشراء حسابات وصفحات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'بيع وشراء مواقع الكترونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'ادارة صفحات وحسابات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'النشر في المجموعات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'النشر في الصفحات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'النشر في المنتديات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'برمجة مواقع الكترونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'برمجة متاجر الكترونية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'برمجة مواقع اخبارية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'برمجة مواقع شركات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'برمجة منتديات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'برمجة العاب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'برمجة تطبيقات الجوال', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'برمجة تطبيقات اندرويد', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'برمجة تطبيقات ايفون', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'برمجة ووردبريس WordPress', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'برمجة بلوجرBlogger', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'برمجة تطبيقات ويب Web application', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'عمل أو تنفيذ تعديلات برمجية أو تقنية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'برمجة خاصة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'برمجة شات بوت', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'برمجة CSS و HTML', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'برمجة PHP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'برمجة بايثون', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'برمجة Java و .NET', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'عمل مشاريع كاملة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'دراسة جدوى', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'استشارات مهنية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'فوتوشوب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'تصميم جرافيك', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Adobe Illustrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'تصميم بوسترات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'تصميم بنرات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'تصميم 3D', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'أوتوكاد AutoCAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'After Effects', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'علوم طبية - Medical sciences', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'طب بشري - Human medicine', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'طب بيطري - Veterinary medicine', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'صيدلة - Pharmacy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'تمريض - Nursing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'تثقيف صحي Health Education', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'ادارة صحية healthcare management', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'تغذية Nutrition', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'علاج طبيعي Physical therapy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'مختبرات Laboratory', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'اشعة Radiology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'طب اسنان - Dentistry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'صحة الاسنان dental Hygiene', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'هندسة - Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Petroleum Engineering - هندسة بترول', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'هندسة ميكانيكية - Mechanical Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Electronics and Communications Engineering - هندسة إلكترونيات واتصالات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'هندسة اتصالات Telecommunications engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, '  هندسة تشييد - Construction Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Computer Science and Engineering - علوم وهندسة حاسبات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'هندسة معمارية Architectural Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'هندسة معلوماتية Information Technology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'هندسة برمجيات Software Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'هندسة مدنية Civil Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'هندسة كهربائية - Electrical Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'هندسة نووية Nuclear Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'هندسة بيئية environmental Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'هندسة طاقة Energy Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Arts - فنون', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'علوم تربية - Educational sciences', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'تربية رياضية - Physical education', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'تربية فنية Artistic Education', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'فنون جميلة Fine Arts', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'فنون تطبيقية Applied Arts', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'تربية موسيقية - Musical Education', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'تربية نوعية - Quality education', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Educational Studies دراسات تربوية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'علوم - Sciences', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Physics - فيزياء', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Chemistry - كيمياء', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Biology - احياء', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Mathematics - رياضيات', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'أكاديمية الشرطة - Police Academy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'زراعة - Agriculture', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'جغرافيا Geography', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'علوم اجتماعية - social sciences', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'علم اجتماع Sociology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'آثار- Archeology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, '  علم نفس - Psychology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Philosophy - فلسفة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'ألسن لغات - Foreign languages', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'حضارات عربية وإسلامية - Arab and Islamic Civilizations ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'لغويات تطبيقية - Applied Linguistics ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, ' Humanities and Social Sciences - علوم إنسانية واجتماعية', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'حقوق أو قانون - Law', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Tourism and hotels - سياحة وفنادق', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'خدمة اجتماعية Social Services Work', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'شريعة - Islamic Jurisprudence', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'دراسات إسلامية - Islamic studies', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'اقتصاد - Economics', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'اقتصاد منزلي - Home Economics', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'ادارة اعمال - Business Administration', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'علوم سياسية - Political Science', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, ' شئون دولية وسياسات عامة - Global Affairs and Public Policy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'علاقات دولية International Relations', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'ادارة Management', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'تأمين Insurance', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'تسويق Marketing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'دراسات مهنية تطبيقية - Applied Vocational', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'تجارة Commerce', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'موارد بشرية Human Resource', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'علاقات عامة Public Relations', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'مالية Finance', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'محاسبة Accounting', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'تطوير مهني - Career Development ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Evaluation Testing and Assessment - اختبارات وتقييم', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'Public Policy and Administration - سياسات وإدارة عامة', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'حاسبات وتكنولوجيا معلومات - Computer and data science', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'نظم معلومات Information Systems', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'نظم معلومات ادارية Management Information Systems', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'اداب - Arts', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'مصريات - Egyptology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'علم الانسان Anthropology', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, '  تواصل مجتمعي وشراكات - Outreach and Partnerships ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'Art and design - فن وتصميم', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'Journalism and Mass Communication - صحافة وإعلام', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'تاريخ - History ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'English and Comparative Literature - أدب إنجليزي ومقارن', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `main_fields`
--

CREATE TABLE `main_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_fields`
--

INSERT INTO `main_fields` (`id`, `title`, `user_id`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(1, 'البحث العلمي', 25, 6, '0000-00-00 00:00:00', '2024-12-09 18:07:41'),
(2, 'التايبست', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'التدقيق والتنسيق', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'الترجمة', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'الكتابة والتحرير', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'التصميم', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'المونتاج', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'التعليق الصوتي', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'التسويق', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'البرمجة', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'المشاريع والخدمات', 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `management_teams`
--

CREATE TABLE `management_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_manager_salary` int(11) NOT NULL,
  `sales_manager` int(11) NOT NULL,
  `marketing_manager_salary` int(11) NOT NULL,
  `marketing_manager` int(11) NOT NULL,
  `technical_director_salary` int(11) NOT NULL,
  `technical_director` int(11) NOT NULL,
  `CFO_salary` int(11) NOT NULL,
  `CFO` int(11) NOT NULL,
  `CEO_salary` int(11) NOT NULL,
  `CEO` int(11) NOT NULL,
  `hr_manager_salary` int(11) NOT NULL,
  `hr_manager` int(11) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management_teams`
--

INSERT INTO `management_teams` (`id`, `sales_manager_salary`, `sales_manager`, `marketing_manager_salary`, `marketing_manager`, `technical_director_salary`, `technical_director`, `CFO_salary`, `CFO`, `CEO_salary`, `CEO`, `hr_manager_salary`, `hr_manager`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(1, 0, 10, 10, 10, 0, 0, 10, 0, 0, 0, 0, 0, 1, '2024-10-04 11:38:07', '2024-10-04 12:31:33'),
(2, 0, 5, 0, 10, 0, 15, 0, 20, 50, 0, 100, 0, 5, '2024-10-19 18:49:02', '2024-11-12 16:52:21'),
(3, 0, 10, 0, 5, 0, 5, 50, 0, 0, 20, 20, 0, 6, '2024-11-18 16:38:10', '2024-12-06 14:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `marketings`
--

CREATE TABLE `marketings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('enable','disable') NOT NULL,
  `level1` varchar(255) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketings`
--

INSERT INTO `marketings` (`id`, `status`, `level1`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(5, 'enable', '10', 6, '2024-09-11 07:35:15', '2024-11-25 17:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_04_111631_create_customer_table', 1),
(8, '2024_02_08_094051_create_clients_table', 1),
(9, '2024_02_08_104750_create_countries_table', 1),
(14, '2024_03_02_194846_create_new_franchises_table', 1),
(19, '2024_04_02_200025_create_proofs_table', 1),
(22, '2024_06_02_205058_create_permission_tables', 1),
(23, '2024_06_02_212446_add_manager_id_to_users_table', 1),
(27, '2024_06_23_222626_create_permission_tables', 3),
(28, '2024_06_23_225251_create_permissions', 4),
(29, '2024_06_23_230550_add_role_to_users_table', 5),
(33, '2014_10_12_000000_create_users_table', 8),
(34, '2024_02_25_194858_create_main_fields_table', 9),
(35, '2024_02_25_200405_create_sub_fields_table', 10),
(37, '2024_02_04_122152_create_freelancers_table', 11),
(38, '2024_02_06_085204_create_request_freelancers_table', 12),
(40, '2024_03_12_190139_create_orders_table', 14),
(41, '2024_03_15_193909_create_transfers_table', 49),
(42, '2024_03_19_203321_create_client_attributions_table', 16),
(43, '2024_03_31_141314_create_marketings_table', 17),
(44, '2024_05_07_083408_create_operatings_table', 18),
(46, '2024_02_29_130244_create_holidays_table', 20),
(48, '2024_08_05_212732_create_transfer_data_table', 21),
(50, '2024_08_24_125240_add_column_status_to_table_orders', 23),
(53, '2024_08_26_192136_create_inventory_updates_table', 25),
(54, '2024_05_08_154444_create_settings_table', 26),
(55, '2024_08_29_100029_create_general_inventories_table', 27),
(57, '2024_08_24_135906_add_column_status_inventory_and_inventory_date__to_table_orders', 29),
(58, '2024_09_13_165529_add_column_main_field_to_table_general_inventories', 30),
(67, '2024_09_13_183137_create_management_teams_table', 36),
(68, '2024_09_13_183201_create_sales_teams_table', 37),
(69, '2024_09_08_105713_add_column_freelance_status_to_table_request_freelancers', 38),
(71, '2024_10_04_161418_create_freelancer_orders_table', 39),
(72, '2024_10_08_115538_add_orders_id_column_to_table_general_inventories', 40),
(74, '2024_08_16_140352_create_educationals_table', 41),
(75, '2024_10_28_092149_add_column_freelancer_current_orders_and_column_freelance_delivered_orders_to_table_freelancers', 42),
(76, '2024_11_01_183407_add_column_random_number_all_trancfers_to_table_orders', 43),
(78, '2024_11_21_171057_add_instapay_column_to_freelancers_table', 45),
(79, '2024_11_23_204737_add_exp_column_to_freelancers_table', 46),
(80, '2024_11_24_175846_create_keywords_table', 47),
(81, '2024_02_23_120837_create_ratings_table', 48),
(84, '2024_11_20_202216_add_status_column_to_transfers_table', 50),
(91, '2024_11_30_201818_create_inventory_setting_data_table', 54),
(92, '2024_11_30_192855_create_inventory_data_table', 55);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 20),
(4, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 28),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 21),
(5, 'App\\Models\\User', 24),
(5, 'App\\Models\\User', 27),
(5, 'App\\Models\\User', 29),
(5, 'App\\Models\\User', 30),
(6, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 13),
(7, 'App\\Models\\User', 15),
(8, 'App\\Models\\User', 3),
(9, 'App\\Models\\User', 16),
(9, 'App\\Models\\User', 17),
(9, 'App\\Models\\User', 18),
(9, 'App\\Models\\User', 19),
(9, 'App\\Models\\User', 22),
(9, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- Table structure for table `new_franchises`
--

CREATE TABLE `new_franchises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `access` enum('true','false') NOT NULL DEFAULT 'false',
  `username` varchar(255) NOT NULL,
  `allname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `main_field_id` bigint(20) UNSIGNED NOT NULL,
  `sub_field_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `cvalue` varchar(255) NOT NULL,
  `fvalue` varchar(255) NOT NULL,
  `avalue` varchar(255) NOT NULL DEFAULT '20% من ربح الطلب',
  `method` varchar(255) DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `freelancer_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`freelancer_details`)),
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('ملغي','مسلم','قيد المراجعة أو التعديل','جاري') NOT NULL DEFAULT 'جاري',
  `status_inventory` enum('لم يتم','تم') NOT NULL DEFAULT 'لم يتم',
  `inventory_date` timestamp NULL DEFAULT NULL,
  `random_number_transfers` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'عرض المستخدمين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(2, 'اضافة المستخدمين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(3, 'تعديل المستخدمين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(4, 'حذف المستخدمين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(5, 'عرض الصلاحيات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(6, 'اضافة الصلاحيات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(7, 'تعديل الصلاحيات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(8, 'حذف الصلاحيات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(9, 'عرض العملاء', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(10, 'اضافة العملاء', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(11, 'تعديل العملاء', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(12, 'حذف العملاء', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(13, 'عرض الفرانشيز', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(14, 'اضافة الفرانشيز', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(15, 'تعديل الفرانشيز', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(16, 'حذف الفرانشيز', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(17, 'عرض مجالات العمل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(18, 'اضافة مجالات العمل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(19, 'تعديل مجالات العمل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(20, 'حذف مجالات العمل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(21, 'عرض المستقلين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(22, 'اضافة المستقلين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(23, 'تعديل المستقلين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(24, 'حذف المستقلين', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(25, 'عرض الطلبات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(26, 'اضافة الطلبات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(27, 'تعديل الطلبات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(28, 'حذف الطلبات', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(29, 'عرض التسوق بالعمولة', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(30, 'اضافة التسوق بالعمولة', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(31, 'تعديل التسوق بالعمولة', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(32, 'حذف التسوق بالعمولة', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(33, 'عرض التقرير المالي', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(34, 'اضافة التقرير المالي', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(35, 'تعديل التقرير المالي', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(36, 'حذف التقرير المالي', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(37, 'عرض مصاريف التشغيل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(38, 'اضافة مصاريف التشغيل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(39, 'تعديل مصاريف التشغيل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(40, 'حذف مصاريف التشغيل', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(41, 'عرض اعدادات الجرد', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(42, 'اضافة اعدادات الجرد', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(43, 'تعديل اعدادات الجرد', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57'),
(44, 'حذف اعدادات الجرد', 'web', '2024-06-23 20:54:57', '2024-06-23 20:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proofs`
--

CREATE TABLE `proofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `freelancer_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_freelancers`
--

CREATE TABLE `request_freelancers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_field_id` bigint(20) UNSIGNED NOT NULL,
  `sub_field_id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` enum('هام و عاجل','هام وغير عاجل','غير هام وغير عاجل') NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_status` enum('مطلوب','موجود') NOT NULL DEFAULT 'مطلوب'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_freelancers`
--

INSERT INTO `request_freelancers` (`id`, `main_field_id`, `sub_field_id`, `desc`, `status`, `new_franchise_id`, `created_at`, `updated_at`, `freelancer_status`) VALUES
(1, 1, 1, 'good', 'هام وغير عاجل', 1, '2024-07-03 04:16:54', '2024-10-04 10:49:26', 'موجود'),
(2, 1, 1, 'add image ajax', 'هام و عاجل', 1, '2024-09-09 12:00:56', '2024-09-30 22:17:57', 'مطلوب'),
(3, 1, 1, 'new', 'هام و عاجل', 1, '2024-09-10 15:00:42', '2024-09-22 07:25:17', 'مطلوب'),
(4, 4, 4, 'test new', 'هام و عاجل', 1, '2024-09-11 07:42:20', '2024-10-03 16:02:36', 'مطلوب'),
(5, 1, 2, 'test freelsncer status', 'هام وغير عاجل', 1, '2024-09-22 07:25:08', '2024-09-22 07:25:21', 'مطلوب'),
(6, 4, 4, 'بقلك يابو عمو', 'غير هام وغير عاجل', 4, '2024-10-03 16:01:25', '2024-10-03 16:01:52', 'مطلوب'),
(7, 3, 2, 'نجرب تاني', 'هام و عاجل', 4, '2024-10-03 16:03:43', '2024-10-17 06:37:15', 'موجود'),
(8, 1, 1, 'new', 'غير هام وغير عاجل', 5, '2024-10-20 16:58:46', '2024-11-07 00:31:09', 'مطلوب');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-06-23 20:55:18', '2024-06-23 21:28:32'),
(4, 'مسؤول مبيعات', 'web', '2024-06-23 21:42:23', '2024-06-23 21:42:23'),
(5, 'وكيل مبيعات', 'web', '2024-06-23 21:48:50', '2024-06-23 21:48:50'),
(6, 'مسؤول الموارد البشرية', 'web', '2024-06-30 08:30:26', '2024-06-30 08:30:26'),
(7, 'مدير الموارد البشرية', 'web', '2024-06-30 09:08:50', '2024-06-30 09:08:50'),
(9, 'المدير التنفيذي', 'web', '2024-07-03 02:28:37', '2024-07-03 02:28:37'),
(10, 'مدير المبيعات', 'web', '2024-07-27 17:38:54', '2024-07-27 17:38:54'),
(11, 'المدير المالي', 'web', '2024-07-27 17:41:21', '2024-07-27 17:41:21'),
(12, 'مدير التسويق', 'web', '2024-07-27 17:41:52', '2024-07-27 17:41:52'),
(13, 'المدير التقني', 'web', '2024-07-27 17:42:24', '2024-07-27 17:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 1),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 1),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(4, 1),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(5, 1),
(5, 8),
(6, 1),
(6, 8),
(7, 1),
(7, 8),
(8, 1),
(8, 8),
(9, 1),
(9, 8),
(10, 1),
(10, 8),
(11, 1),
(11, 8),
(12, 1),
(12, 8),
(13, 1),
(13, 9),
(14, 1),
(14, 9),
(15, 1),
(15, 9),
(16, 1),
(16, 9),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_teams`
--

CREATE TABLE `sales_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_agent_salary` int(11) NOT NULL,
  `sales_agent` int(11) NOT NULL,
  `sales_officer_salary` int(11) NOT NULL,
  `sales_officer` int(11) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `salary` int(111) NOT NULL DEFAULT 0,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `cost`, `salary`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(9, 'ميزانية التسويق', '10', 0, 1, '2024-09-22 07:25:48', '2024-10-09 12:21:16'),
(16, 'مصاريف التشغيل', '0', 10, 1, '2024-09-24 19:12:33', '2024-10-09 12:21:19'),
(22, 'مصاريف التشغيل', '0', 50, 5, '2024-11-12 16:54:07', '2024-11-12 16:54:16'),
(23, 'ميزانية التطوير', '10', 0, 5, '2024-11-12 16:54:07', '2024-11-12 16:54:07'),
(24, 'مصاريف التشغيل', '0', 50, 6, '2024-11-21 17:30:57', '2024-12-06 14:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_fields`
--

CREATE TABLE `sub_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_field_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_fields`
--

INSERT INTO `sub_fields` (`id`, `title`, `main_field_id`, `user_id`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(1, 'أبحاث جامعية', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'مشاريع التخرج', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'أبحاث الماجستير', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'رسائل الماجستير', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'أبحاث الدكتوراة', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'رسائل الدكتوراة', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'أبحاث النشر', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'أبحاث الترقية', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'ترجمة الابحاث والرسائل', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'تدقيق الأبحاث والرسائل', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'تنسيق الأبحاث والرسائل', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'عروض تقديمية', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'التحليل الاحصائي', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'العملي والمخبري', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'أخرى', 1, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'عربي', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'انجليزي', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'فرنسي', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'حساب ومعادلات', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'إدخال بيانات', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'أخرى', 2, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'عربي', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'انجليزي', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'فرنسي', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'تركي', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ألماني', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'صيني', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'أخرى', 3, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'عربي لانجلش', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'انجلش لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'عربي لفرنسي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'فرنسي لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'عربي لتركي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'تركي لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'عربي لألماني', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'ألماني لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'عربي لإيطالي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'إيطالي لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'عربي لصيني', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'صيني لعربي', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'أخرى', 4, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'بروفايل الشركة', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'مقالات السيو', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'مقالات وأخبار', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'محتوى المواقع والصفحات', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'تلخيص النصوص والصوتيات', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'محتوى التسويقي', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'كتابة القانونية', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'كتابة الإعلانية', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'تأليف كتب', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'تأليف قصص وروايات', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'تأليف أشعار', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'كتابة سيناريو', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'أخرى', 5, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'هوية بصرية', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'بروفايل شركة', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'لوجو أو شعار', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'دعاية واعلان', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'سيرة ذاتية', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'تعديل صور', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'مطبوعات وأغلفة', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'مواقع وتطبيقات', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'أخرى', 6, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'تعديل فيديو', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'تصميم أو تجميع فيديو', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'تصوير فيديو', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'انترو أو أوترو', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'موشن جرافيك', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'تصميم وايت بورد', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'إضافة الترجمة', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'أخرى', 7, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'إعلاني', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'تعليمي', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'قصصي', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'أشعار', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'غناء', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'دوبلاج', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'رد الآلي', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'كتب صوتية', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'هندسة الصوتية', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'أخرى', 8, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'خطط واستشارات تسويقية', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'مواقع إلكترونية', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'تحسين محركات البحث SEO', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'استضافة إعلانية', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'جوجل آدس', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'فيسبوك', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'انستقرام', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'تويتر', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'تيك توك', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'سناب شات', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'واتساب', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'تليجرام', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'بريد إلكتروني', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'أخرى', 9, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'ووردبريس', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'مواقع إلكترونية', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'متاجر إلكترونية', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'تطبيقات اندرويد', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'تطبيقات آيفون', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'تطبيقات ويب', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'تعديلات تقنية', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'برمجة خاصة', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'ألعاب', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'منتديات', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'شات بوت', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'برمجة CSS و HTML', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'برمجة PHP', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'برمجة بايثون', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'برمجة Java و .NET', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'أخرى', 10, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'تنفيذ مشاريع كاملة', 11, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'تنفيذ خدمات معينة', 11, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'دراسة جدوى', 11, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'استشارات مهنية', 11, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'أخرى', 11, 25, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'title', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` enum('لم يتم','تم') NOT NULL DEFAULT 'لم يتم',
  `agent` varchar(255) NOT NULL,
  `officer` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_data`
--

CREATE TABLE `transfer_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `new_franchise_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `about` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `wphone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `pay` varchar(255) DEFAULT NULL,
  `vcashe` varchar(255) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `new_franchise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `about`, `phone`, `wphone`, `facebook`, `pay`, `vcashe`, `card`, `password`, `role`, `manager_id`, `email_verified_at`, `remember_token`, `new_franchise_id`, `created_at`, `updated_at`) VALUES
(25, 'Reviv Solutions', 'solution@gmail.com', 'salem solution', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$rd7EBpVRa9eAtuK2xVd9QO0nc6NvlDldRA/5ZLk2koi8P6BznZJLG', 'المدير التنفيذي', NULL, NULL, NULL, 6, '2024-11-17 16:09:57', '2024-11-17 16:09:57'),
(28, 'محمد أسامة', 'midousama24@gmail.com', 'MohamedOsama', NULL, '⁦015 54804204⁩', '⁦+2015 54804204⁩', 'https://www.facebook.com/MhMd.OSos', 'متاح انستا باي', '⁦01019266912⁩', '1234567', '$2y$10$T7DDqXesIcNiBdCh4QqzBe0yPGvHG2EBqDuObC5jLxmKFpvSq/Tuy', 'مسؤول مبيعات', NULL, NULL, NULL, 6, '2024-12-09 17:39:11', '2024-12-09 17:39:11'),
(29, 'محمود جمال', 'mahmoudgamalxx09@gmail.com', 'MahmoudGamal', NULL, '⁦01010543498⁩', '⁦01010543498⁩', 'https://www.facebook.com/100011207700483', 'متاح انستا باي', '⁦015 55307758⁩', '12345678', '$2y$10$3u1vwILvAnFpGpJLOBeGQ.LkFggeq3ElUcSQFPnZ7NlqgS5.Yhoem', 'وكيل مبيعات', 28, NULL, NULL, 6, '2024-12-09 17:41:41', '2024-12-09 17:41:41'),
(30, 'حنين ياسر', 'hanenyasser69@gmail.com', 'HanenYasser', 'لإضافة المستقلين', '⁦012 00538607⁩', '⁦012 00538607⁩', NULL, NULL, NULL, '123456789', '$2y$10$IG0mXanudpLLa62DNqsg2.F6Xw/onRSaF7Dgw0sGCi7tBjhacemzK', 'وكيل مبيعات', 28, NULL, NULL, 6, '2024-12-13 03:14:30', '2024-12-13 03:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`),
  ADD KEY `clients_new_franchise_id_foreign` (`new_franchise_id`),
  ADD KEY `clients_main_field_id_foreign` (`main_field_id`);

--
-- Indexes for table `client_attributions`
--
ALTER TABLE `client_attributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_attributions_previous_client_id_foreign` (`previous_client_id`),
  ADD KEY `client_attributions_existing_client_id_foreign` (`existing_client_id`),
  ADD KEY `client_attributions_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `educationals`
--
ALTER TABLE `educationals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educationals_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freelancers_main_field_id_foreign` (`main_field_id`),
  ADD KEY `freelancers_sub_field_id_foreign` (`sub_field_id`),
  ADD KEY `freelancers_user_id_foreign` (`user_id`),
  ADD KEY `freelancers_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `freelancer_orders`
--
ALTER TABLE `freelancer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freelancer_orders_freelancer_id_foreign` (`freelancer_id`),
  ADD KEY `freelancer_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `general_inventories`
--
ALTER TABLE `general_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_inventories_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_freelancer_id_foreign` (`freelancer_id`),
  ADD KEY `holidays_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `inventory_data`
--
ALTER TABLE `inventory_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_data_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `inventory_setting_data`
--
ALTER TABLE `inventory_setting_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_setting_data_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `inventory_updates`
--
ALTER TABLE `inventory_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_updates_order_id_foreign` (`order_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_fields`
--
ALTER TABLE `main_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_fields_user_id_foreign` (`user_id`),
  ADD KEY `main_fields_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `management_teams`
--
ALTER TABLE `management_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `management_teams_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `marketings`
--
ALTER TABLE `marketings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketings_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `new_franchises`
--
ALTER TABLE `new_franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_main_field_id_foreign` (`main_field_id`),
  ADD KEY `orders_sub_field_id_foreign` (`sub_field_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proofs`
--
ALTER TABLE `proofs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proofs_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_freelancer_id_foreign` (`freelancer_id`),
  ADD KEY `ratings_new_franchise_id_foreign` (`new_franchise_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `request_freelancers`
--
ALTER TABLE `request_freelancers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_freelancers_main_field_id_foreign` (`main_field_id`),
  ADD KEY `request_freelancers_sub_field_id_foreign` (`sub_field_id`),
  ADD KEY `request_freelancers_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales_teams`
--
ALTER TABLE `sales_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_teams_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `sub_fields`
--
ALTER TABLE `sub_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_fields_main_field_id_foreign` (`main_field_id`),
  ADD KEY `sub_fields_user_id_foreign` (`user_id`),
  ADD KEY `sub_fields_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `transfer_data`
--
ALTER TABLE `transfer_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_data_client_id_foreign` (`client_id`),
  ADD KEY `transfer_data_new_franchise_id_foreign` (`new_franchise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_new_franchise_id_foreign` (`new_franchise_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_attributions`
--
ALTER TABLE `client_attributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationals`
--
ALTER TABLE `educationals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `freelancer_orders`
--
ALTER TABLE `freelancer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `general_inventories`
--
ALTER TABLE `general_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_data`
--
ALTER TABLE `inventory_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_setting_data`
--
ALTER TABLE `inventory_setting_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_updates`
--
ALTER TABLE `inventory_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `main_fields`
--
ALTER TABLE `main_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `management_teams`
--
ALTER TABLE `management_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `new_franchises`
--
ALTER TABLE `new_franchises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proofs`
--
ALTER TABLE `proofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_freelancers`
--
ALTER TABLE `request_freelancers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales_teams`
--
ALTER TABLE `sales_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_fields`
--
ALTER TABLE `sub_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer_data`
--
ALTER TABLE `transfer_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_attributions`
--
ALTER TABLE `client_attributions`
  ADD CONSTRAINT `client_attributions_existing_client_id_foreign` FOREIGN KEY (`existing_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_attributions_new_franchise_id_foreign` FOREIGN KEY (`new_franchise_id`) REFERENCES `new_franchises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_attributions_previous_client_id_foreign` FOREIGN KEY (`previous_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
