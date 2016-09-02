-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2016 at 01:00 PM
-- Server version: 5.6.30
-- PHP Version: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidmwdem_studymetro`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` bigint(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_structure` text NOT NULL,
  `menu_attributes` text,
  `is_primary` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = Disbale, 1 = Enable',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `description`, `image`, `status`, `date_created`) VALUES
(6, 'Proverbs 31:10', '"Who can find a virtuous woman? for her price is far above rubies."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820844WomanPraying_2000x400.jpg', 1, '2016-06-13 12:27:24'),
(7, 'Hebrews 4:12', '"For the word of God is quick, and powerful, and sharper than any two-edged sword, piercing even to the dividing asunder of soul and spirit, and of the joints and marrow, and is a discerner of the thoughts and intents of the heart."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820867BibleWithLight_2000x400.jpg', 1, '2016-06-13 12:27:47'),
(8, 'Mark 16:15', 'And he said unto them, "Go ye into all the world, and preach the gospel to every creature."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820905EarthInHands2_2000x400.jpg', 1, '2016-06-13 12:28:25'),
(9, '2nd Corinthians 3:17', '"...where the Spirit of the Lord is, there is liberty."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820934ManRaisedHandsInField_2000x400.jpg', 1, '2016-06-13 12:28:54'),
(10, 'Psalm 119:105', '"Thy word is a lamp unto my feet, and a light unto my path."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820954BibleOnTable_2000x400.jpg', 1, '2016-06-13 12:29:14'),
(11, 'Ephesians 5:25', '"Husbands, love your wives, even as Christ also loved the church, and gave himself for it."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465820975CoupleInField_2000x400.jpg', 1, '2016-06-13 12:29:35'),
(12, 'Matthew 13:24', 'Another parable put he forth unto them, saying, "The kingdom of heaven is likened unto a man which sowed good seed in his field."', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/slider/1465821004HandAndSeeds_2000x400.jpg', 1, '2016-06-13 12:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text,
  `meta_title` text,
  `meta_description` text,
  `meta_keywords` text,
  `status` int(11) NOT NULL COMMENT '1 = Enable, 0 = Disable',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_preferences`
--

CREATE TABLE `system_preferences` (
  `id` bigint(20) NOT NULL,
  `preference_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `preference_value` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_preferences`
--

INSERT INTO `system_preferences` (`id`, `preference_key`, `preference_value`) VALUES
(1, 'site_name', 'Study Metro'),
(2, 'site_description', 'Get Your MS in the US-Employment in the USA-Study and Work in Canada'),
(3, 'site_email', 'mobiweb.sid@gmail.com'),
(4, 'facebook_link', 'https://www.facebook.com'),
(5, 'twitter_link', 'https://www.twitter.com'),
(6, 'google_plus_link', 'https://www.google.com'),
(7, 'google_map_link', 'https://map.google.com'),
(8, 'linkedin_link', 'https://www.linked.com'),
(9, 'instagram_link', ''),
(10, 'pinterest_link', ''),
(11, 'youtube_link', ''),
(12, 'copyright_text', ''),
(13, 'footer_name_address', ''),
(14, 'site_logo', 'http://studymetro.sid.mwdemoserver.com/uploads/site/1468584470logo.png'),
(15, 'site_favicon', 'http://studymetro.sid.mwdemoserver.com/uploads/site/1468587853favicon.ico'),
(16, 'public_website_url', 'http://studymetro.sid.mwdemoserver.com'),
(17, 'public_header_title', ''),
(18, 'cms_homepage', '1'),
(19, 'is_show_homepage_alert', '0'),
(20, 'homepage_alert_content', ''),
(21, 'homepage_content', ''),
(22, 'homepage_content_title', ''),
(23, 'user_validated_by_email', '1'),
(24, 'user_validated_by_phone_text', '1'),
(25, 'human_validation', '1'),
(26, 'meta_separator', '-'),
(27, 'meta_description', 'Earn Your MS in the US to find employment in the USA! Or, study and work in Canada! We are the world\'s premiere overseas education consultants.'),
(28, 'meta_keywords', 'Overseas Education Consultants, Study Abroad Student Services, Abroad Education Consultancy Firm, Study Metro, Education Counselor, Study Abroad Programs, Graduation in Abroad, MS in USA'),
(29, 'meta_title', 'Get Your MS in the US-Employment in the USA-Study and Work in Canada');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `user_type` int(11) NOT NULL COMMENT '1 = Super Admin, 2 = Normal Users',
  `user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 = Enable, 0 = Disable',
  `is_email_verified` int(11) NOT NULL DEFAULT '0' COMMENT '1 = Verified, 0 = Unverified',
  `is_phone_verified` int(11) NOT NULL DEFAULT '0' COMMENT '1 = Verified, 0 = Unverified',
  `online_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 = Online, 0 = Offline',
  `is_blocked` int(11) NOT NULL DEFAULT '0' COMMENT '1 = yes, 0 = No',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `password_reset_key`, `phone_number`, `user_type`, `user_status`, `is_email_verified`, `is_phone_verified`, `online_status`, `is_blocked`, `date_created`) VALUES
(1, 'studymetro1', 'sid@mobiwebtech.com', '97431358378969ee56f2195493564010', NULL, NULL, 1, 1, 1, 1, 1, 0, '2016-06-19 04:20:33'),
(6, 'johndeo6', 'johndeo@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '7894561233', 2, 1, 1, 1, 1, 0, '2016-06-19 09:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE `users_meta` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `meta_value` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_meta`
--

INSERT INTO `users_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', 'Study'),
(2, 1, 'last_name', 'Metro'),
(3, 1, 'profile_picture', 'http://studymetro.sid.mwdemoserver.com/uploads/site/14685844811162506392-0-siddharth21-avatar.png'),
(4, 1, 'bio_pic2', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663218841162506392-0-siddharth21-avatar.png'),
(5, 1, 'bio_pic3', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663218881162506392-0-siddharth21-avatar.png'),
(6, 1, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663219011162506392-0-siddharth21-avatar.png'),
(7, 1, 'title', 'Liberty Church Super Admin'),
(8, 1, 'display_name', 'Church Admin'),
(9, 1, 'website', 'http://appyourchurch.com'),
(10, 1, 'home_phone', '7894561230'),
(11, 1, 'work_phone', '7894561230'),
(12, 1, 'address', 'The Magnet Tower'),
(13, 1, 'address_line2', 'New Palasia'),
(14, 1, 'city', 'Indore'),
(15, 1, 'state', 'Madhaya Pradesh'),
(16, 1, 'zip', '452001'),
(17, 1, 'cell_phone', '7894561230'),
(18, 1, 'cell_company', '7894561230'),
(19, 1, 'bio_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(20, 1, 'bio_interest', 'Church CMS'),
(21, 1, 'core_lead_notes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(22, 1, 'hide_contact_info', '0'),
(23, 1, 'send_reminder_email', '1'),
(24, 1, 'send_reminder_text', '1'),
(25, 1, 'send_remainer_at', '1'),
(26, 2, 'first_name', 'Siddharth'),
(27, 2, 'last_name', 'Pandey'),
(28, 2, 'phone_otp', '123456'),
(29, 2, 'title', 'Lorem ipsum is simply dummy text.'),
(30, 2, 'display_name', 'Sid'),
(31, 2, 'website', 'http://mobiwebtech.com'),
(32, 2, 'home_phone', '7894561230'),
(33, 2, 'work_phone', '7894561230'),
(34, 2, 'address', 'The Magnet Tower'),
(35, 2, 'address_line2', 'New Palasia'),
(36, 2, 'city', 'Indore'),
(37, 2, 'state', 'Madhaya Pradesh'),
(38, 2, 'zip', '452001'),
(39, 2, 'cell_phone', '789456123'),
(40, 2, 'cell_company', '7894561230'),
(41, 2, 'bio_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(42, 2, 'bio_interest', 'Lorem Ipsum'),
(43, 2, 'core_lead_notes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(44, 2, 'hide_contact_info', '0'),
(45, 2, 'send_reminder_email', '0'),
(46, 2, 'send_reminder_text', '1'),
(47, 2, 'send_remainer_at', '1'),
(48, 2, 'profile_picture', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663229778.jpg'),
(49, 2, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663229778.jpg'),
(50, 2, 'bio_pic2', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663229841.jpg'),
(51, 2, 'bio_pic3', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663229892.jpg'),
(52, 2, 'email_verification_code', 'bcd61bbacbac0b6a838be819fb72e669'),
(53, 2, 'selected_skin', '9'),
(55, 3, 'last_name', 'Lojo'),
(56, 3, 'phone_otp', '123456'),
(57, 3, 'title', 'Lorem ipsum is simply dummy text.'),
(58, 3, 'display_name', 'eric'),
(59, 3, 'website', 'http://mailinator.com'),
(60, 3, 'home_phone', '7894561230'),
(61, 3, 'work_phone', '7894561230'),
(62, 3, 'address', 'The  Magnet Tower'),
(63, 3, 'address_line2', 'New Palasia'),
(64, 3, 'city', 'Indore'),
(65, 3, 'state', 'Madhaya Pradesh'),
(66, 3, 'zip', '452001'),
(67, 3, 'cell_phone', '7894561230'),
(68, 3, 'cell_company', '7894561230'),
(69, 3, 'bio_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(70, 3, 'bio_interest', 'Lore mIpsum'),
(71, 3, 'core_lead_notes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(72, 3, 'hide_contact_info', '1'),
(73, 3, 'send_reminder_email', '1'),
(74, 3, 'send_reminder_text', '1'),
(75, 3, 'send_remainer_at', '5'),
(76, 3, 'profile_picture', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663232159.jpg'),
(77, 3, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663232159.jpg'),
(78, 3, 'bio_pic2', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663232219.jpg'),
(79, 3, 'bio_pic3', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663232259.jpg'),
(80, 3, 'email_verification_code', '96f34064a1184dc8747435024760a708'),
(81, 3, 'selected_skin', '10'),
(82, 4, 'first_name', 'Satish'),
(83, 4, 'last_name', 'Kumar'),
(84, 4, 'phone_otp', '123456'),
(85, 4, 'title', ''),
(86, 4, 'display_name', ''),
(87, 4, 'website', ''),
(88, 4, 'home_phone', ''),
(89, 4, 'work_phone', ''),
(90, 4, 'address', ''),
(91, 4, 'address_line2', ''),
(92, 4, 'city', ''),
(93, 4, 'state', ''),
(94, 4, 'zip', ''),
(95, 4, 'cell_phone', ''),
(96, 4, 'cell_company', ''),
(97, 4, 'bio_text', ''),
(98, 4, 'bio_interest', ''),
(99, 4, 'core_lead_notes', ''),
(100, 4, 'hide_contact_info', ''),
(101, 4, 'send_reminder_email', ''),
(102, 4, 'send_reminder_text', ''),
(103, 4, 'send_remainer_at', ''),
(104, 4, 'profile_picture', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14664286211353762179_krishna-normal.jpg'),
(105, 4, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14664286211353762179_krishna-normal.jpg'),
(106, 4, 'bio_pic2', ''),
(107, 4, 'bio_pic3', ''),
(108, 4, 'email_verification_code', '20d064747d47316f8915cbbf92b44b8a'),
(109, 4, 'selected_skin', '9'),
(110, 5, 'first_name', 'Albert'),
(111, 5, 'last_name', 'Brown'),
(112, 5, 'phone_otp', '123456'),
(113, 5, 'title', 'Lorem Ipsum'),
(114, 5, 'display_name', 'albertbrown'),
(115, 5, 'website', 'http://mobiwebtech.com'),
(116, 5, 'home_phone', '7894561230'),
(117, 5, 'work_phone', '7894561230'),
(118, 5, 'address', 'The  Magnet Tower'),
(119, 5, 'address_line2', 'New Palasia'),
(120, 5, 'city', 'Indore'),
(121, 5, 'state', 'Madhaya Pradesh'),
(122, 5, 'zip', '452001'),
(123, 5, 'cell_phone', '7894561230'),
(124, 5, 'cell_company', '7894561230'),
(125, 5, 'bio_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(126, 5, 'bio_interest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(127, 5, 'core_lead_notes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(128, 5, 'hide_contact_info', '0'),
(129, 5, 'send_reminder_email', '0'),
(130, 5, 'send_reminder_text', '1'),
(131, 5, 'send_remainer_at', '1'),
(132, 5, 'profile_picture', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663275964.jpg'),
(133, 5, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663275964.jpg'),
(134, 5, 'bio_pic2', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663276024.jpg'),
(135, 5, 'bio_pic3', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663276094.jpg'),
(136, 5, 'email_verification_code', '07250445068b042590b99127ff3f0037'),
(137, 6, 'first_name', 'John'),
(138, 6, 'last_name', 'Deo'),
(139, 6, 'phone_otp', '123456'),
(140, 6, 'title', 'Lorem Ipsum of White Church'),
(141, 6, 'display_name', 'john'),
(142, 6, 'website', 'http://mobiwebtech.com'),
(143, 6, 'home_phone', '789456123015001960'),
(144, 6, 'work_phone', '7894561230'),
(145, 6, 'address', 'The Magnet Tower'),
(146, 6, 'address_line2', 'New Palasia'),
(147, 6, 'city', 'Indore'),
(148, 6, 'state', 'Madhaya Pradesh'),
(149, 6, 'zip', '452001'),
(150, 6, 'cell_phone', '7894561230'),
(152, 6, 'bio_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(153, 6, 'bio_interest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(154, 6, 'core_lead_notes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(155, 6, 'hide_contact_info', '0'),
(156, 6, 'send_reminder_email', '0'),
(157, 6, 'send_reminder_text', '1'),
(158, 6, 'send_remainer_at', '24'),
(159, 6, 'profile_picture', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663278247.jpg'),
(160, 6, 'bio_pic1', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663278247.jpg'),
(161, 6, 'bio_pic2', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663278287.jpg'),
(162, 6, 'bio_pic3', 'http://churchcms.sid.mwdemoserver.com/cms-panel/uploads/users/14663278327.jpg'),
(163, 6, 'email_verification_code', 'de919e997d2a9a85a6ffbb1046766954'),
(164, 5, 'selected_skin', '9'),
(165, 7, 'first_name', 'Sachin'),
(166, 7, 'last_name', 'Tendulkar'),
(167, 7, 'phone_otp', '123456'),
(168, 7, 'title', 'Sachin'),
(169, 7, 'display_name', 'sachin'),
(170, 7, 'website', 'http://mailinator.com'),
(171, 7, 'home_phone', '1234567890'),
(172, 7, 'work_phone', '1234567890'),
(173, 7, 'address', 'Tha Magnet Tower'),
(174, 7, 'address_line2', 'New Palasia'),
(175, 7, 'city', 'Indore'),
(176, 7, 'state', 'Madhaya Pradesh'),
(177, 7, 'zip', '452001'),
(178, 7, 'cell_phone', '7894561230'),
(179, 7, 'cell_company', '7894561230'),
(180, 7, 'bio_text', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(181, 7, 'bio_interest', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(182, 7, 'core_lead_notes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(184, 7, 'send_reminder_email', '0'),
(185, 7, 'send_reminder_text', '0'),
(186, 7, 'send_remainer_at', ''),
(187, 7, 'profile_picture', 'http://churchcms.com/uploads/users/14666845451162506392-0-siddharth21-avatar.png'),
(188, 7, 'bio_pic1', 'http://churchcms.com/uploads/users/14666845451162506392-0-siddharth21-avatar.png'),
(189, 7, 'bio_pic2', 'http://churchcms.com/uploads/users/14666845491162506392-0-siddharth21-avatar.png'),
(190, 7, 'bio_pic3', 'http://churchcms.com/uploads/users/14666845531162506392-0-siddharth21-avatar.png'),
(191, 7, 'email_verification_code', 'b18f3d8251ddf05e2292ba92780f498e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_preferences`
--
ALTER TABLE `system_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `system_preferences`
--
ALTER TABLE `system_preferences`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
