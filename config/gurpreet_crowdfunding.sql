-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2018 at 07:19 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurpreet_crowdfunding`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigncategories`
--

CREATE TABLE `campaigncategories` (
  `id` int(11) NOT NULL,
  `camp_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigncategories`
--

INSERT INTO `campaigncategories` (`id`, `camp_id`, `cat_id`, `created_at`) VALUES
(6, 7, 18, '2018-11-15 10:10:11'),
(7, 6, 19, '2018-11-15 08:02:54'),
(8, 6, 20, '2018-11-15 08:02:58'),
(9, 10, 15, '2018-11-21 12:13:37'),
(10, 10, 16, '2018-11-21 12:13:37'),
(11, 10, 17, '2018-11-21 12:13:37'),
(12, 10, 18, '2018-11-21 12:13:37'),
(13, 10, 19, '2018-11-21 12:13:37'),
(14, 10, 20, '2018-11-21 12:13:37'),
(15, 11, 15, '2018-11-22 06:46:26'),
(23, 5, 15, '2018-11-27 13:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `facebook_message` varchar(1000) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `twitter_message` varchar(500) DEFAULT NULL,
  `term_and_condition` int(2) DEFAULT NULL,
  `business_advisor` int(2) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `ppt_link` varchar(255) DEFAULT NULL,
  `ppt_thumbnail` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(500) DEFAULT NULL,
  `aim` varchar(1000) DEFAULT NULL,
  `story` varchar(1000) DEFAULT NULL,
  `target` int(2) DEFAULT NULL,
  `raise_amount` decimal(8,2) DEFAULT '0.00',
  `stretch_target` decimal(8,2) DEFAULT '0.00',
  `extra_money` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `perks` int(2) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `live` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `slug`, `name`, `facebook_url`, `facebook_message`, `twitter_url`, `twitter_message`, `term_and_condition`, `business_advisor`, `org_id`, `ppt_link`, `ppt_thumbnail`, `image`, `youtube_link`, `aim`, `story`, `target`, `raise_amount`, `stretch_target`, `extra_money`, `keywords`, `perks`, `duration`, `live`, `end_date`, `deal_id`, `status`, `created`, `modified`) VALUES
(6, 12, 'test-campaign', 'test campaign', 'https://www.facebook.com/', 'test message facebook', 'www.twitter.com', 'test message twitter', 1, 1, 14, 'https://gurpreet.gangtask.com/crowdfunding', '1542265748Gwa\'yi blog.jpg', '1542265748BlessingsInnerChild.jpg', 'https://www.youtube.com/', 'test aim sadfa sdfasd fasdf asdfas dfsaf', 'safjkasjdkfljasdfkjaskfjaskdfjksafjirefjkdsfhjkasdyhfiuaewfhjaksdfhfasjdfhakjsdhfuiaewfakjsdhflkuajsdhfuiashfjkashdfkahsDfuiashefjkahsdfjkahsdfuiaSHdfjaSHdfkjahsd', 2, '5000.00', '6000.00', 'asdfasdfasdfasdfasdfasdfa', 'sdfasdfasdf', 19, '4', '2018-11-10', '2018-11-14', 17, 1, '2018-11-15 07:09:08', '2018-11-16 17:05:36'),
(5, 12, 'test-campaign', 'test campaign update', 'https://www.facebook.com/update', 'test message facebook update', 'www.twitter.comupdate', 'test message twitter update', 1, 0, 15, 'https://gurpreet.gangtask.com/crowdfundingupdate', '1543325317feedinghummingbirds_1.jpg', '1543325317Kwagulthmoon_blog.jpg', 'https://www.youtube.com/update', 'test aim faSDfaDS faSDf aSDfaS Dfszdvz cxvdsf aSDfasd faew fasd fa sdf asdfas dfaew fd efa sdfae fa sdfa update', 'safjkasjdkfljasdfkjaskfjaskdfjksafjirefjkdsfhjkasdyhfiuaewfhjaksdfhfasjdfhakjsdhfuiaewfakjsdhflkuajsdhfuiashfjkashdfkahsDfuiashefjkahsdfjkahsdfuiaSHdfjaSHdfkjahsd update', 2, '30000.00', '4000.00', 'asdfasdfasdfasdfasdfasdfa update', 'sdfasdfasdf update', 21, '5', '2018-11-27', '2019-04-27', 18, 1, '2018-11-15 07:09:08', '2018-11-28 09:05:23'),
(7, 12, 'test-campaign', 'test campaign', 'https://www.facebook.com/', 'test message facebook', 'www.twitter.com', 'test message twitter', 1, 1, 14, 'https://gurpreet.gangtask.com/crowdfunding', '1542265748Gwa\'yi blog.jpg', '1542265748BlessingsInnerChild.jpg', 'https://www.youtube.com/', 'test aim faSDfaDS faSDf aSDfaS Dfszdvz cxvdsf aSDfasd faew fasd fa sdf asdfas dfaew fd efa sdfae fa sdfa', 'safjkasjdkfljasdfkjaskfjaskdfjksafjirefjkdsfhjkasdyhfiuaewfhjaksdfhfasjdfhakjsdhfuiaewfakjsdhflkuajsdhfuiashfjkashdfkahsDfuiashefjkahsdfjkahsdfuiaSHdfjaSHdfkjahsd', 2, '8000.00', '6000.00', 'asdfasdfasdfasdfasdfasdfa', 'sdfasdfasdf', 19, '4', '2018-11-14', '2018-11-17', 17, 1, '2018-11-15 07:09:08', '2018-11-16 17:05:46'),
(8, 12, 'flooid-power-systems-inc-project-a', 'Flooid Power Systems, Inc. Project A', 'https://www.facebook.com/', 'test facebook message', 'https://www.twitter.com/', 'test twitter message', 1, 1, 14, 'https://docs.google.com/document/d/1xR_D1apDauNIS36C0AbT-TceWb_4QimlN0BmkQsJVmg/edit', '1542802170Margaret Briere.JPG', '1542802170PatrickLogan.jpg', 'https://www.youtube.com/watch?v=6ZnfsJ6mM5c', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2100.00', '60000.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 'test project', 20, '2', '2018-11-21', '2019-01-21', 16, 1, '2018-11-21 12:09:30', '2018-11-28 18:56:26'),
(11, 35, 'test', 'Test check', 'https://en-gb.facebook.com/login/', 'hello', 'https://en-gb.facebook.com/login/', 'fdf', 1, 0, 15, 'ghjfgjfjjh', '1542869186Desert.jpg', '1542869186Penguins.jpg', 'https://www.youtube.com/watch?v=6lv6APdqrZ0', 'ujfglkjdfglkjfglkfgjlkfgdjlk', 'jdfghlkjghlkjghlkjhlkjhkjhlkj', 2, '1000.00', '500.00', 'invest the same', 'HJFGHJFGJDFK', 18, '1', '2018-11-23', '2018-12-23', 17, 1, '2018-11-22 06:46:26', '2018-11-28 18:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created`) VALUES
(15, 'Community', 'community', 1, '2018-10-30 08:39:16'),
(16, 'Food and Drink', 'food_and_drink', 1, '2018-10-30 08:39:28'),
(17, 'Environment', 'environment', 1, '2018-10-30 08:39:41'),
(18, 'Business', 'business', 1, '2018-10-30 08:39:54'),
(19, 'Sports', 'sports', 1, '2018-10-30 08:40:03'),
(20, 'Charity', 'charity', 1, '2018-10-30 08:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(355) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(355) DEFAULT NULL,
  `message` text,
  `reply` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `reply`, `created`, `modified`) VALUES
(1, 'kuldeep', 'kuldeepjha@avainfotech.com', '7896541233', 'test', 'dsgvdsgdsfhgsfdg', 'hello test reply', '2017-08-16 11:43:56', '2018-11-01 13:28:09'),
(11, 'prateek', 'prateek@avainfotech.com', '1236547895', 'test subject', 'test message', 'hhjjhjhjhjh', '2018-11-01 13:47:55', '2018-11-02 06:10:19'),
(12, 'prateek sharma', 'pratik@avainfotech.com', '1236547895', 'test subject new', 'test message new', 'gdfgsdfgsdfgsdfg', '2018-11-01 13:50:59', '2018-11-01 13:52:17'),
(14, 'prateee', 'prateek@avainfotech.com', '4545454', '45454', '454545', 'jhggjg', '2018-11-02 06:47:57', '2018-11-02 06:48:22'),
(15, 'prateek', 'prateek@avainfotech.com', '565656', 'hello ', '454545454545454', 'vcbvcnvcn', '2018-11-28 06:00:11', '2018-11-28 06:22:56'),
(16, 'rupak', 'rupak@avainfotech.com', '4545454', 'gxgdfgd', 'gsgsfggsgfffgg', NULL, '2018-11-28 07:28:44', '2018-11-28 07:28:44'),
(17, 'prateek', 'prateek@avainfotech.com', '565656', 'dfsgdfgds', 'fgsdfgdfgd', NULL, '2018-11-28 09:49:58', '2018-11-28 09:49:58'),
(18, 'prateek', 'prateek@avainfotech.com', '565656', 'sgdfg', 'sdfgsdfg', NULL, '2018-11-28 09:50:54', '2018-11-28 09:50:54'),
(19, 'prateek', 'prateek@avainfotech.com', '565656', 'dgfsfg', 'sdfgsdfg', NULL, '2018-11-28 09:51:20', '2018-11-28 09:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `name`, `slug`, `image`, `status`, `created`) VALUES
(14, 'Equity', 'equity', '1540893562browser.png', 1, '2018-10-30 09:59:22'),
(15, 'Convertible Note', 'convertible_note', '1540893768notepad.png', 1, '2018-10-30 10:02:48'),
(16, 'Safe Note', 'safe_note', '1540894024note.png', 1, '2018-10-30 10:07:04'),
(17, 'Debt', 'debt', '1540894131debt.png', 1, '2018-10-30 10:08:51'),
(18, 'Revenue Share', 'revenue_share', '1542187028increased-revenue.png', 1, '2018-10-30 10:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `question` varchar(350) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `camp_id`, `question`, `answer`, `created`) VALUES
(55, 5, 'how can i make a return', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2018-11-27 06:41:37'),
(56, 5, 'how to invest money', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute', '2018-11-27 06:42:37'),
(57, 5, 'Where is my car?', 'hfghkjshkjghkjshgkjshglhfglhdfslghdf;lhdflhdfslhdflhsgdlhdsglh', '2018-11-28 05:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `frontbanners`
--

CREATE TABLE `frontbanners` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frontbanners`
--

INSERT INTO `frontbanners` (`id`, `image`, `status`, `created`, `modified`) VALUES
(35, '090902slide.png', 0, '2018-11-03 09:09:02', '2018-11-03 09:09:02'),
(38, '110655gallery-example-5.jpg', 0, '2018-11-03 11:06:55', '2018-11-03 11:06:55'),
(39, '195025Luanda-most-expensive-place-for-expats-to-live.jpg', 0, '2018-11-18 19:50:25', '2018-11-18 19:50:25'),
(44, '195914Building-blue-sky-birds-wire_3840x2160.jpg', 0, '2018-11-18 19:59:14', '2018-11-18 19:59:14'),
(48, '200236Architecture_blue_sky_buildings-Life_HD_Wallpaper_1366x768.jpg', 1, '2018-11-18 20:02:36', '2018-11-28 07:23:35'),
(47, '200152City_white_building_skyscraper_blue_sky_4K_Ultra_HD_1366x768 (1).jpg', 0, '2018-11-18 20:01:52', '2018-11-18 20:01:52'),
(49, '200535risk-taking.jpg', 1, '2018-11-18 20:05:35', '2018-11-28 07:45:56'),
(50, '200558o-que-e-ser-empreendedor.jpg', 1, '2018-11-18 20:05:58', '2018-11-28 07:30:15'),
(51, '200726executivo-e-empreendedor-e1531406147834.jpg', 1, '2018-11-18 20:07:26', '2018-11-28 07:45:48'),
(70, '154289360214314239445bf6b0229bd32.png', 0, '2018-11-22 13:33:22', '2018-11-28 07:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `invests`
--

CREATE TABLE `invests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `camp_id` int(11) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `payment_mode` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `payment_status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'payment status for paypal/payfort',
  `transaction_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'paypal/payfort transaction id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `invests`
--

INSERT INTO `invests` (`id`, `user_id`, `camp_id`, `amount`, `payment_mode`, `created`, `modified`, `payment_status`, `transaction_id`) VALUES
(10, 12, 5, '5000.00', 'paypal', '2018-11-21 06:49:44', '2018-11-21 06:49:44', 'Pending', '04S820311R559850V'),
(12, 12, 5, '5000.00', 'paypal', '2018-11-21 06:49:44', '2018-11-21 06:49:44', 'Pending', '04S820311R559850V'),
(13, 32, 5, '5000.00', 'paypal', '2018-11-21 06:49:44', '2018-11-21 06:49:44', 'Pending', '04S820311R559850V'),
(14, 12, 8, '2000.00', 'paypal', '2018-11-21 13:05:55', '2018-11-21 13:05:55', 'Pending', '36837624PK6295949'),
(15, 12, 5, '50.00', 'paypal', '2018-11-22 07:29:42', '2018-11-22 07:29:42', 'Pending', '62T822145L504293L'),
(18, 12, 8, '5.00', 'paypal', '2018-11-28 05:55:52', '2018-11-28 05:55:52', 'Pending', '6NV03650VW1678831'),
(19, 35, 5, '5.00', 'paypal', '2018-11-28 06:19:31', '2018-11-28 06:19:31', 'Pending', '7RE98688BX953404L'),
(20, 12, 11, '20.00', 'paypal', '2018-11-28 07:56:16', '2018-11-28 07:56:16', 'Pending', '3VY02442YG119071S'),
(21, 12, 11, '100.00', 'paypal', '2018-11-28 08:00:40', '2018-11-28 08:00:40', 'Pending', '88U66376BB571313A'),
(22, 12, 11, '100.00', 'paypal', '2018-11-28 08:02:29', '2018-11-28 08:02:29', 'Pending', '5PG614752V969594A'),
(23, 12, 11, '100.00', 'paypal', '2018-11-28 08:02:29', '2018-11-28 08:02:29', 'Pending', '5PG614752V969594A'),
(24, 12, 11, '100.00', 'paypal', '2018-11-28 08:02:29', '2018-11-28 08:02:29', 'Pending', '5PG614752V969594A'),
(25, 12, 11, '100.00', 'paypal', '2018-11-28 08:02:29', '2018-11-28 08:02:29', 'Pending', '5PG614752V969594A'),
(26, 12, 11, '10.00', 'paypal', '2018-11-28 11:02:11', '2018-11-28 11:02:11', 'Pending', '7W862948VJ753524K');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `slug`, `status`, `created`) VALUES
(14, 'An Individual', 'an_individual', 1, '2018-10-30 09:04:59'),
(15, 'A Registered Charity', 'a_registered_charity', 1, '2018-10-30 09:08:04'),
(16, 'A Registered Organisation', 'a_registered_organisation', 1, '2018-10-30 09:08:16'),
(17, 'A Registered Business', 'a_registered_business', 1, '2018-10-30 09:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `perks`
--

CREATE TABLE `perks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `perks`
--

INSERT INTO `perks` (`id`, `name`, `slug`, `status`, `created`) VALUES
(18, 'Perks One', 'perks_one', 1, '2018-11-14 07:51:06'),
(19, 'Perks Two', 'perks_two', 1, '2018-11-14 07:52:30'),
(20, 'Perks Three', 'perks_three', 1, '2018-11-14 07:52:38'),
(21, 'Perks Four', 'perks_four', 1, '2018-11-14 07:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(250) NOT NULL,
  `meta_value` varchar(1000) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`, `type`, `created`, `modified`) VALUES
(1, 'admin_contact_number', '123456789', '', '2017-03-11 08:19:16', '2017-12-11 14:21:39'),
(2, 'admin_contact_mail', 'kuldeep@avainfotech.com', '', '2017-03-11 08:19:16', '2017-03-11 08:19:16'),
(3, 'address', '1234, Street Name, City, United State', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'facebook_link', 'https://www.facebook.com/', '', '2017-03-14 13:31:30', '2017-03-14 13:31:30'),
(5, 'linkedin_link', 'https://www.linkedin.com', '', '2017-03-14 13:31:30', '2017-03-14 13:31:30'),
(6, 'twitter_link', 'https://www.twitter.com/', '', '2017-03-14 13:31:30', '2017-03-14 13:31:30'),
(8, 'admin_contact_name', 'kuldeep jha', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'youtube_link', 'https://www.youtube.com/', 'commission ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `id` int(11) NOT NULL,
  `slug` varchar(355) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `title` varchar(355) DEFAULT NULL,
  `image` varchar(355) DEFAULT NULL,
  `content` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`id`, `slug`, `position`, `title`, `image`, `content`, `status`, `created`, `modified`) VALUES
(4, 'privacy-policy', 'privacy-policy', 'Privacy Policy', '1512989667pp.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '2017-08-17 08:22:56', '2018-04-10 09:41:23'),
(5, 'terms-and-conditions', 'terms-and-conditions', 'Terms and Conditions', '1512989542tc.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2017-08-17 09:27:54', '2018-04-10 07:47:25'),
(14, 'como-funciona', 'how-it-works', 'Como funciona', '1512989667pp.jpg', '<div class=\"wpb_text_column wpb_content_element  width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 35px; color: #2a2a2a; font-family: \'Benton Sans\', sans-serif; font-size: 20px; background-color: #f7f7f7;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<h1 class=\"cc-summary__title\" style=\"box-sizing: inherit; font-size: 1.4em; margin: 0px 0px 1em; padding: 0px; color: #29383c; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; line-height: 1.15; text-rendering: optimizelegibility; text-align: center; background-color: #ffffff;\">Descubra e invista em empresas/neg&oacute;cios na ARO</h1>\r\n<div class=\"cc-summary__text\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: #29383c; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; background-color: #ffffff;\">\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.25rem; padding: 0px; font-family: inherit; font-size: 1em; line-height: 1.5; text-rendering: optimizelegibility; width: 795px;\">A ARO torna investir acess&iacute;vel e recompensador permitindo di&aacute;riamente investidores a investir&nbsp;ao lado de profissionais e empresas de&nbsp;capital&nbsp;de risco em empresas iniciantes (startups), iniciais e em&nbsp;fase de crescimento.&nbsp;<span style=\"color: #212121; font-family: inherit; text-align: left; white-space: pre-wrap;\">Comece a construir uma carteira de investimentos na ARO e possua uma participa&ccedil;&atilde;o nos neg&oacute;cios em que voc&ecirc; acredita.</span></p>\r\n<div class=\"cc-container__icons\" style=\"box-sizing: inherit; margin: 0px auto; padding: 0px; max-width: 75rem;\">\r\n<div class=\"cc-facts row\" style=\"box-sizing: inherit; margin: 0px auto; padding: 0px; width: 1200px; max-width: 75rem; display: flex; flex-wrap: wrap;\">\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 252px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/thumbs-up.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Novas oportunidades de investimento adicionadas semanalmente</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 252px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/video-play.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Access the full pitch page and watch the video</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 252px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/partnership.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Handpick the businesses you want to back</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 252px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/invest.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Invest from &pound;10 and up alongside professionals and venture capital firms</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 352px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/discussion.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Join the discussion with other investors and entrepreneurs</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 352px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/document-legal.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Build and view investments in your portfolio</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-facts__box\" style=\"box-sizing: inherit; margin: 24px; padding: 0px; align-items: center; flex-grow: 1; justify-content: center; width: 352px;\">\r\n<div class=\"cc-imageBlock\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">\r\n<div class=\"cc-imageBlock__image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><img style=\"box-sizing: inherit; border: 0px; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; max-height: 50px;\" src=\"https://static-crowdcube-com.s3.amazonaws.com/investing-money/icons/send-message.svg\" alt=\"\" /></div>\r\n<div class=\"cc-imageBlock__description\" style=\"box-sizing: inherit; margin: auto; padding: 1em 2em; color: #747474; font-size: 0.875em; max-width: 250px;\">Receive news about the businesses you\'ve invested in</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"cc-container__buttons\" style=\"box-sizing: inherit; margin: 0px auto; padding: 3.125em 0px; max-width: 825px;\">\r\n<div class=\"cc-buttons__text\" style=\"box-sizing: inherit; margin: 0px; padding: 1em 1em 0px; font-size: 1em; max-width: 100%;\">Be part of Europe\'s largest community of equity investors by joining Crowdcube. It\'s free, quick and easy.</div>\r\n</div>\r\n</div>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 30px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 30px; text-align: center;\"><br />Como Funciona</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 30px; text-align: left;\"><img class=\"vc_single_image-img \" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: auto; width: auto; vertical-align: top;\" title=\"1\" src=\"https://learn.indiegogo.com/wp-content/uploads/2015/12/1-340x88.png\" alt=\"1\" width=\"340\" height=\"88\" /></p>\r\n</div>\r\n</div>\r\n<div class=\"vc_row wpb_row vc_inner vc_row-fluid full-width text-color-default text-align-default child-count-3\" style=\"box-sizing: border-box; margin-left: -242px; margin-right: -242px; margin-bottom: 35px; zoom: 1; background-size: cover; background-position: 50% 50%; color: #2a2a2a; font-family: \'Benton Sans\', sans-serif; font-size: 20px; background-color: #f7f7f7; padding-left: 227px; padding-right: 227px;\">\r\n<div class=\"wpb_column vc_column_container vc_col-sm-8 width-default text-color-default text-align-default\" style=\"box-sizing: border-box; width: 538.656px; position: relative; min-height: 1px; padding-left: 0px; padding-right: 0px; float: left; font-size: 18px; margin-bottom: 0px;\">\r\n<div class=\"vc_column-inner \" style=\"box-sizing: border-box; padding-left: 15px; padding-right: 15px; width: 538.656px;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box;\">\r\n<div class=\"wpb_text_column wpb_content_element  vc_custom_1450820805459 width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 0px !important; padding-bottom: 10px !important;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 20px;\">Prepare-se</p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element  width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 35px;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">A nossa plataforma d&aacute;-lhe a liberdade e flexibilidade de definir a sua campanha como quiser: Voc&ecirc; pode decidir o seu objectivo de angaria&ccedil;&atilde;o, criar <em>perks</em> para recompensas, e definir uma <em>deadline</em>&nbsp;(at&eacute; 60 dias).<img class=\"vc_single_image-img \" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: auto; width: auto; vertical-align: top;\" title=\"2\" src=\"https://learn.indiegogo.com/wp-content/uploads/2015/12/2-340x88.png\" alt=\"2\" width=\"340\" height=\"88\" /></p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element  vc_custom_1450820841005 width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 0px !important; padding-bottom: 10px !important;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 20px;\">Lan&ccedil;e a sua campanha</p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element  width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 35px;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; margin-bottom: 0px;\">Voc&ecirc;&nbsp;decide quando tornar a sua campanha ativa - sem aprova&ccedil;&otilde;es necess&aacute;rias.&nbsp;Assim que a sua campanha for lan&ccedil;ada, n&atilde;o deixe de twittar, enviar e-mails e gritar dos telhados - conte a todos!</span>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top vc_custom_1450686586657 width-default text-color-default text-align-default wpb_start_animation animated\" style=\"box-sizing: border-box; opacity: 1; animation: wpb_btt 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0s 1 normal both running; margin-bottom: 0px !important; padding-bottom: 15px !important;\">\r\n<figure class=\"wpb_wrapper vc_figure\" style=\"box-sizing: border-box; display: inline-block; margin: 0px; vertical-align: top; max-width: 100%;\">\r\n<div class=\"vc_single_image-wrapper   vc_box_border_grey\" style=\"box-sizing: border-box; display: inline-block; vertical-align: top; max-width: 100%;\"><img class=\"vc_single_image-img \" style=\"box-sizing: border-box; border: 0px; max-width: 100%; height: auto; width: auto; vertical-align: top;\" title=\"3\" src=\"https://learn.indiegogo.com/wp-content/uploads/2015/12/3-340x88.png\" alt=\"3\" width=\"340\" height=\"88\" /></div>\r\n</figure>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element  vc_custom_1450820881670 width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 0px !important; padding-bottom: 10px !important;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 20px;\">Continue aumentando com o InDemand</p>\r\n</div>\r\n</div>\r\n<div class=\"wpb_text_column wpb_content_element  width-default text-color-default text-align-default  \" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<div class=\"wpb_wrapper\" style=\"box-sizing: border-box; margin-bottom: 0px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; margin-bottom: 0px;\">Depois que a sua campanha de crowdfunding terminar, continue a levantar dinheiro e a criar a sua comunidade pelo tempo que desejar. N&atilde;o h&aacute; nenhuma meta de capta&ccedil;&atilde;o de recursos, nem limites de tempo.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"wpb_column vc_column_container vc_col-sm-2 width-default text-color-default text-align-default\" style=\"box-sizing: border-box; width: 134.656px; position: relative; min-height: 1px; padding-left: 0px; padding-right: 0px; float: left; margin-bottom: 0px;\">&nbsp;</div>\r\n</div>', 1, '2017-08-17 08:22:56', '2018-05-16 07:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `camp_id` int(11) DEFAULT NULL,
  `updates` varchar(800) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `camp_id`, `updates`, `created`) VALUES
(3, 5, 'new update about campaign We have different vendors supplying various products to us. The consolidated set for all purchases/expenses for this month is not ready as of today.', '2018-11-27 05:39:08'),
(4, 5, 'gafrdsegdsfgdsfasDFWe have different vendors supplying various products to us. The consolidated set for all purchases/expenses for this month is not ready as of today.', '2018-11-27 05:40:18'),
(5, 5, 'FGFGHJFGHJFFFFFFFFFFFFFFFFFFFFFFFFFFF4564564564564', '2018-11-28 05:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(355) DEFAULT NULL,
  `name` varchar(355) DEFAULT NULL,
  `last_name` varchar(355) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `paypal_id` varchar(355) DEFAULT NULL,
  `phone` varchar(355) DEFAULT NULL,
  `password` varchar(355) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `linked_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(355) DEFAULT NULL,
  `company` varchar(355) DEFAULT NULL,
  `document` varchar(500) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `profitability_plan` varchar(500) DEFAULT NULL,
  `tax_report` varchar(500) DEFAULT NULL,
  `criminal_registry` varchar(500) DEFAULT NULL,
  `dob` varchar(355) DEFAULT NULL,
  `tokenhash` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `camp_status` int(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `last_name`, `email`, `paypal_id`, `phone`, `password`, `image`, `fb_id`, `linked_id`, `city`, `address`, `country`, `company`, `document`, `company_id`, `profitability_plan`, `tax_report`, `criminal_registry`, `dob`, `tokenhash`, `status`, `camp_status`, `created`, `modified`) VALUES
(1, 'admin', 'kuldeep', 'kumar', 'kuldeep@avainfotech.com', NULL, '696969696', '$2y$10$m.ybo75HqBroub3PqDBCUuyVu4Gug4V24RTc8nE.JlRXLQh1.cy3q', '1541150503JOHN-DOE-PICS-john-doe-7968930-350-240.jpg', NULL, NULL, 'jkjkjkj', 'jkjkjkjkj', 'jjkjkjk', 'jkjkjkjkjkj', NULL, 'jkjkjkjkj', NULL, NULL, NULL, '11/14/2018', NULL, 1, 1, '2018-08-10 10:34:53', '2018-11-02 09:21:43'),
(12, 'user', 'prateek', 'sharma', 'prateek@avainfotech.com', NULL, '565656', '$2y$10$TB/xSplJtqacrjVInvGND.07sTOdFg0KE40eXfH8iG/YaYyUincsa', '1541151443JOHN-DOE-PICS-john-doe-7968930-350-240.jpg', NULL, NULL, 'manimajra', 'dsdsdsds', 'zimbawe', 'cvcvvcv', '1541157420Employer Wireframe Review Completion.docx', '565656', 'https://docs.google.com/document/d/1ZcHxDoIN7BY7iMG5qvPAQLKTBWpoRfPvaul_EkhMa8w/edit', 'https://docs.google.com/document/d/1ZcHxDoIN7BY7iMG5qvPAQLKTBWpoRfPvaul_EkhMa8w/edit', 'https://docs.google.com/document/d/1ZcHxDoIN7BY7iMG5qvPAQLKTBWpoRfPvaul_EkhMa8w/edit', '07/10/2018', '5a0c9b06bf939e02110b5740d9201765', 1, 1, '2018-11-02 09:27:40', '2018-11-28 11:09:53'),
(32, 'user', 'Simerjit', 'Kaur', 'simerjit@avainfotech.com', NULL, NULL, '$2y$10$43zafazEIbcH5lPOmoRL3elR/bii6XFIvBhoRqgNHYhb1AWUFhNLa', NULL, '2119305351731122', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-11-02 13:54:20', '2018-11-02 13:54:20'),
(33, 'admin', 'Carlos ', 'Martins da Cruz', 'carlos_manuel84@hotmail.com', NULL, '00244997854167', '$2y$10$952mIN8QTPyD3RIN0OYpj.FnwNGfz/1Vq2Ujbsi31s1wQRNna4lDq', NULL, NULL, NULL, 'Luanda', '', 'Angola', '', NULL, '', NULL, NULL, NULL, '', ' ', 1, 1, '2018-11-12 21:37:55', '2018-11-18 08:35:49'),
(34, 'admin', 'Valter', 'Flor', 'valterflor@icloud.com', NULL, '00244929550681', '$2y$10$zQSSdOsrAh88QkIXHSib7uAVP/sTQPY5GUAXeLMy8z2puN8cQrV0q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-11-18 08:34:44', '2018-11-18 08:34:44'),
(35, 'user', 'rupak', 'kumar', 'rupak@avainfotech.com', NULL, '4545454', '$2y$10$26EmDzsebwUsxOuB6hRhtuFhaf1Sn3MQbGJuW.i7X9wm/fgSYbqJq', '1542868237Lighthouse.jpg', NULL, NULL, 'Chandigarh', '56565gghgdfhjgdfhjgdhj', 'India', 'ghjgfhghjdfgh', NULL, '565656', 'https://docs.google.com/document/d/1vGokwMXPQItZmTHZQbTO4qwj_SQymFhRS_nJmiH0K3w/edit', 'https://docs.google.com/document/d/1vGokwMXPQItZmTHZQbTO4qwj_SQymFhRS_nJmiH0K3w/edit', 'https://docs.google.com/document/d/1vGokwMXPQItZmTHZQbTO4qwj_SQymFhRS_nJmiH0K3w/edit', '11/21/2018', ' ', 1, 1, '2018-11-22 06:13:03', '2018-11-22 06:33:52'),
(36, 'user', 'Prateek', 'sharma', 'prateek@gmail.com', NULL, '112131231', '$2y$10$8JWSrcpZ4WBVOmDk6ljFP.ht1JLaIOD56zN9BD1RPlrgfg2BT5bhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2018-11-28 05:27:28', '2018-11-28 06:32:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigncategories`
--
ALTER TABLE `campaigncategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontbanners`
--
ALTER TABLE `frontbanners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perks`
--
ALTER TABLE `perks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigncategories`
--
ALTER TABLE `campaigncategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `frontbanners`
--
ALTER TABLE `frontbanners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `perks`
--
ALTER TABLE `perks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
