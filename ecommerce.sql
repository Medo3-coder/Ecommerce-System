-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 07:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin1249', 'admin@gmail.com', '2021-12-26 08:22:37', '$2y$10$JK9NGjD6HCSEgIYRAbaMC.aFxKhc1pV0LmiVlpVhS5I532hpLnGI2', '', NULL, '2022032112251.jpg', '2021-12-26 08:22:37', '2022-04-27 14:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_name_ar`, `brand_slug_en`, `brand_slug_hin`, `brand_slug_ar`, `brand_image`, `created_at`, `updated_at`) VALUES
(43, 'Apple', 'सैमसंग', 'ابل', 'apple', 'सैमसंग', 'ابل', 'upload/brands/1732538822151388.png', '2022-05-11 12:02:57', '2022-05-11 12:02:57'),
(44, 'Huawei', 'सेब लोगो', 'هواوي', 'huawei', 'सेब-लोगो', 'هواوي', 'upload/brands/1732538860649881.png', '2022-05-11 12:03:33', '2022-05-11 12:03:33'),
(45, 'Oppo', 'सेब लोगो', 'ابوو', 'oppo', 'सेब-लोगो', 'ابوو', 'upload/brands/1732538898923855.png', '2022-05-11 12:04:10', '2022-05-11 12:04:10'),
(46, 'Samsung', 'हुवाई', 'سامسونج', 'samsung', 'हुवाई', 'سامسونج', 'upload/brands/1732538921449660.png', '2022-05-11 12:04:32', '2022-05-11 12:04:32'),
(47, 'vivo', 'हुवाई', 'فيفو', 'vivo', 'हुवाई', 'فيفو', 'upload/brands/1732538975636568.png', '2022-05-11 12:05:23', '2022-05-11 12:05:23'),
(48, 'Xiaomi', 'सैमसंग', 'شاومي', 'xiaomi', 'सैमसंग', 'شاومي', 'upload/brands/1732539023535700.png', '2022-05-11 12:06:09', '2022-05-11 12:06:09'),
(49, 'Lenovo', 'सेब लोगो', 'لينوفو', 'lenovo', 'सेब-लोगो', 'لينوفو', 'upload/brands/1732539200233618.png', '2022-05-11 12:08:57', '2022-05-11 12:08:57'),
(50, 'Hp', 'विवो', 'اتش بي', 'hp', 'विवो', 'اتش-بي', 'upload/brands/1732539225438371.png', '2022-05-11 12:09:21', '2022-05-11 12:09:21'),
(52, 'skin care', 'सैमसंग प्लस', 'عناية بالجلد', 'skin-care', 'सैमसंग-प्लस', 'عناية-بالجلد', 'upload/brands/1732543583766564.jpg', '2022-05-11 13:18:37', '2022-05-11 13:18:37'),
(53, 'Rajah Sosa', 'Brielle King', 'Inga Jacobs', 'rajah-sosa', 'Brielle-King', 'Inga-Jacobs', 'upload/brands/1734722398888479.jpg', '2022-06-04 14:29:58', '2022-06-04 14:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_name_ar`, `category_slug_en`, `category_slug_hin`, `category_slug_ar`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'पहनावा', 'موضة', 'fashion', 'पहनावा', 'موضة', 'icon fa fa-paw', '2022-04-29 22:14:43', '2022-05-08 21:26:45'),
(2, 'Electronics', 'इलेक्ट्रानिक्स', 'إلكترونيات', 'electronics', 'इलेक्ट्रानिक्स', 'إلكترونيات', 'icon fa fa-laptop', '2022-04-29 22:16:34', '2022-05-08 21:27:15'),
(3, 'Sweet Home', 'प्यारा घर', 'منزل جميل', 'sweet-home', 'प्यारा-घर', 'منزل-جميل', 'fa fa-home', '2022-04-29 22:17:38', '2022-04-29 22:17:38'),
(4, 'Appliances', 'उपकरण', 'الأجهزة', 'appliances', 'उपकरण', 'الأجهزة', 'fa fa-shopping-bag', '2022-04-29 22:18:54', '2022-05-08 21:22:39'),
(5, 'Beauty', 'सुंदरता', 'الجمال', 'beauty', 'सुंदरता', 'الجمال', 'fa fa-heartbeat', '2022-04-29 22:20:01', '2022-05-08 21:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HAPPY NEW YEAR1133', 14, '2022-07-13', 1, '2022-06-19 17:18:55', '2022-06-30 19:30:44'),
(4, 'HAPPY NEW YEAR', 12, '2022-07-14', 1, '2022-06-30 19:31:07', '2022-06-30 19:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_25_094312_create_sessions_table', 1),
(7, '2021_12_26_100406_create_admins_table', 2),
(8, '2022_03_20_100505_create_brands_table', 3),
(9, '2022_04_07_210703_create_categories_table', 4),
(11, '2022_04_12_113514_create_sub_categories_table', 5),
(12, '2022_04_13_134604_create_sub_sub_categories_table', 6),
(13, '2022_04_29_085402_create_products_table', 7),
(14, '2022_04_29_090908_create_multi_imgs_table', 7),
(15, '2022_05_06_133425_create_sliders_table', 8),
(16, '2022_06_10_103211_create_wishlists_table', 9),
(17, '2022_06_19_181556_create_coupons_table', 10),
(18, '2022_06_22_143956_create_ship_divisions_table', 11),
(19, '2022_06_26_022513_create_ship_districts_table', 12),
(20, '2022_06_26_045203_create_ship_states_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(4, 32, 'upload/products/multi-Image/1733017559395106.jpg', '2022-05-16 18:52:16', '2022-05-16 18:52:16'),
(5, 32, 'upload/products/multi-Image/1733017559639272.jpg', '2022-05-16 18:52:16', '2022-05-16 18:52:16'),
(7, 34, 'upload/products/multi-Image/1734722890418385.jpeg', '2022-06-04 14:37:47', '2022-06-04 14:37:47'),
(8, 34, 'upload/products/multi-Image/1734722890642210.jpeg', '2022-06-04 14:37:47', '2022-06-04 14:37:47'),
(9, 34, 'upload/products/multi-Image/1734722890880014.jpeg', '2022-06-04 14:37:47', '2022-06-04 14:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `subsubcategory_id` bigint(20) UNSIGNED NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_name_ar`, `product_slug_en`, `product_slug_hin`, `product_slug_ar`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_tags_ar`, `product_size_en`, `product_size_hin`, `product_size_ar`, `product_color_en`, `product_color_hin`, `product_color_ar`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_hin`, `short_descp_ar`, `long_descp_en`, `long_descp_hin`, `long_descp_ar`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(15, 50, 2, 5, 14, 'Newest HP 14\" HD Laptop', 'नवीनतम एचपी 14\" एचडी लैपटॉप', 'أحدث كمبيوتر محمول HP 14 بوصة عالي الدقة', 'newest-hp-14\"-hd-laptop', 'नवीनतम-एचपी-14\"-एचडी-लैपटॉप', 'أحدث-كمبيوتر-محمول-HP-14-بوصة-عالي-الدقة', 'EHwrHWNN', '25', 'Laptop', 'लैपटॉप', 'حاسوب محمول', '14 Inches', 'लैपटॉप', '14 بوصة', 'Dale Pink', 'डेल पिंक', 'دايل بينك', '217.00', '29.00', 'Newest HP 14\" HD Laptop, Windows 11, Intel Celeron Dual-Core Processor Up to 2.60GHz, 4GB RAM, 64GB SSD, Webcam, Dale Pink(Renewed)', 'नवीनतम एचपी 14\" एचडी लैपटॉप, विंडोज 11, इंटेल सेलेरॉन डुअल-कोर प्रोसेसर 2.60GHz तक, 4GB रैम, 64GB SSD, वेब कैमरा, डेल पिंक (नवीनीकृत)', 'أحدث كمبيوتر محمول HP 14 بوصة عالي الدقة ، Windows 11 ، معالج Intel Celeron ثنائي النواة يصل إلى 2.60 جيجاهرتز ، 4 جيجابايت رام ، 64 جيجابايت SSD ، كاميرا ويب ، Dale Pink (تم تجديده)', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Intel Celeron Dual-Core Processor Up to 2.60GHz, 4GB RAM, 64GB SSD</li>\r\n	<li>3x USB Type A, 1x SD Card Reader, 1x Headphone/Microphone</li>\r\n	<li>802.11a/b/g/n/ac (2x2) Wi-Fi and Bluetooth, HP Webcam with Integrated Digital Microphone</li>\r\n	<li>Windows 11 OS, Dale Pink</li>\r\n</ul>', '<pre>\r\n14&quot; विकर्ण एचडी ब्राइटव्यू डब्ल्यूएलईडी-बैकलिट (1366 x 768), इंटेल ग्राफिक्स,\r\nइंटेल सेलेरॉन डुअल-कोर प्रोसेसर 2.60GHz तक, 4GB रैम, 64GB SSD\r\n\r\n</pre>', '<pre>\r\n14 &rdquo;Diagonal HD BrightView WLED-Backlit (1366 x 768) ، Intel Graphics ،\r\nمعالج Intel Celeron ثنائي النواة يصل إلى 2.60 جيجاهرتز وذاكرة وصول عشوائي سعتها 4 جيجابايت ومحرك أقراص مزود بذاكرة مصنوعة من مكونات صلبة سعة 64 جيجابايت\r\n\r\n</pre>\r\n\r\n<p>.</p>', 'upload/products/thambnail/1732543219506440.jpg', 1, NULL, 1, NULL, 1, '2022-05-11 13:12:50', '2022-05-11 13:12:50'),
(16, 52, 5, 14, 41, 'Genius Glow Potion', 'जीनियस ग्लो पोशन', 'جرعة الوهج العبقري', 'genius-glow-potion', 'जीनियस-ग्लो-पोशन', 'جرعة-الوهج-العبقري', 'N03gUJTH', '37', 'skin care', 'त्वचा की देखभाल', 'عناية بالجلد', 'small,medium,larg', 'small,medium,larg', 'كبير,وسط,صغير', 'red,black,blue', 'red,black,blue', 'احمر,اسود ,ازرق', '89.99', '20.00', 'GLOWING SKIN STARTS WITHIN - Genius Glow Potion allows you to support your skin\'s natural beauty while adding convenience and juicy acai flavor to your skin care routine. Reimagine your skin care with one Genius drink daily.', 'ग्लोइंग स्किन भीतर से शुरू होती है - जीनियस ग्लो पोशन आपकी  जोड़ते हुए आपको अपनी त्वचा की प्राकृतिक सुंदरता का समर्थन', 'البشرة المتوهجة تبدأ من الداخل - تسمح لك Genius Glow Potion بدعم جمال بشرتك الطبيعي مع إضافة الراحة ونكهة Acai المثيرة إلى روتين العناية بالبشرة. أعد تخيل العناية ببشرتك مع مشروب Genius واحد يوميًا.', '<ul>\r\n	<li>YOUTHFUL RADIANT SKIN - Genius Glow Potion provides several handpicked natural ingredients, selected for their excellent antioxidant content. Organic lemon powder, beet juice powder, blueberry extract, acai extract, rhodiola, ginseng, and super antioxidant Capros supply your skin with the nutrients it needs for daily radiance.</li>\r\n</ul>', '<pre>\r\nयुवा दीप्तिमान त्वचा - जीनियस ग्लो पोशन कई प्राकृतिक सामग्री प्रदान करता है, जिन्हें उनकी उत्कृष्ट एंटीऑक्सीडेंट सामग्री के लिए चुना गया है। ऑर्गेनिक लेमन पाउडर, चुकंदर का रस पाउडर, ब्लूबेरी का सत्त, अकाई का सत्त, रोडियोला, जिनसेंग, और सुपर एंटीऑक्सीडेंट कैप्रो आपकी त्वचा को दैनिक चमक के लिए आवश्यक पोषक तत्वों की आपूर्ति करते हैं।</pre>', '<pre>\r\nالبشرة المشعة الشابة - توفر Genius Glow Potion العديد من المكونات الطبيعية المنتقاة بعناية ، والمختارة لمحتواها الممتاز من مضادات الأكسدة. مسحوق الليمون العضوي ، ومسحوق عصير البنجر ، ومستخلص التوت ، وخلاصة الآساي ، والروديولا ، والجينسنغ ، ومضادات الأكسدة الفائقة Capros تزود بشرتك بالعناصر الغذائية التي تحتاجها لإشراقها يوميًا.</pre>', 'upload/products/thambnail/1732544058428982.jpg', 1, 1, NULL, NULL, 1, '2022-05-11 13:26:10', '2022-05-11 13:26:10'),
(17, 47, 3, 8, 22, 'Shoshana Vega', 'जीनियस ग्लो पोशन', 'شوشانا فيجا', 'shoshana-vega', 'जीनियस-ग्लो-पोशन', 'شوشانا-فيجا', 'U5B0UryE', '776', 'Laptop', 'test', 'test', 'small,medium,larg,Eum laborum Eiusmod,Consequatur omnis si', 'small,medium,larg,Veniam deserunt eiu,Praesentium fugit v', 'كبير,وسط,صغير,Laborum quae molesti,Sed rerum nesciunt', 'red,black,blue,Voluptatem vero dol,Animi vel mollit do', 'red,black,blue,Et fugiat inventore ,Nobis in dolore ut f', 'احمر,اسود ,ازرق,Voluptatibus vel odi,Esse delectus ut l', '100', '10', 'Proident exercitati', 'Id velit fugit ne', 'Sed rem animi ad in', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</pre>', '<pre>\r\nLorem ipsum dolor sit amet، consectetur adipiscing elit، sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. كل ما في الأمر هو الحد الأدنى من التمرين ، ممارسة التمارين الرياضية.</pre>', 'upload/products/thambnail/1732544624577840.jpg', 1, NULL, 1, 1, 1, '2022-05-11 13:35:10', '2022-05-11 14:17:36'),
(18, 52, 4, 13, 39, 'Teagan Suarez', 'नवीनतम एचपी', 'Trevor Garcia', 'teagan-suarez', 'नवीनतम-एचपी', 'Trevor-Garcia', '5eIelC7b', '976', 'test', 'ms', 'هالو', 'small,medium,larg,Consequuntur itaque ,Aperiam qui asperior,Eos dolores est qui,Nobis odit optio au', 'small,medium,larg,Recusandae Ratione ,Dolor id tempore et,Et distinctio Ab il,Cum dolorum ut volup', 'كبير,وسط,صغير,Nostrud illo perspic,Quis praesentium nis,Ut non sunt totam a,Laboris sunt Nam per', 'red,black,blue,Consequat Voluptate,Ullamco magni cupida,Autem modi amet vel,Pariatur Qui dolor', 'red,black,blue,Nostrud dolor accusa,Corporis velit amet,Deleniti aspernatur ,Et reprehenderit mi', 'احمر,اسود ,ازرق,Adipisicing necessit,Fuga Aliquam ut ali,Et sapiente doloribu,Nisi fugiat officiis', '250', '40', 'Nam cillum molestiae', 'Qui voluptatem Aliq', 'أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिंग एलीट, सेड डू ईयूसमॉड टेम्पोर इनसिडिडंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम, क्विस नोस्ट्रुड एक्सर्सिटेशन उलमको लेबरिस निसि यूट एलिक्विप एक्स ईए कमोडो कॉन्सेक्वेट।</pre>', '<pre>\r\n\r\nأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت\r\nرسة التمارين الرياضية.</pre>', 'upload/products/thambnail/1732544813875283.jpeg', 1, 1, 1, NULL, 1, '2022-05-11 13:38:11', '2022-05-11 13:59:19'),
(20, 45, 2, 5, 13, 'Vanna Aguilar', 'Jocelyn Duke', 'Leroy Franks', 'vanna-aguilar', 'Jocelyn-Duke', 'Leroy-Franks', 'Qui mollit rerum eu', '935', 'Glow', 'Glow', 'Glow', 'small,medium,larg,Omnis incidunt odit,Dolor officia velit', 'small,medium,larg,Accusantium voluptat,Proident praesentiu', 'كبير,وسط,صغير,Dignissimos est ips,In aliquam asperiore', 'red,black,blue,Voluptas expedita si,Illo minim enim labo', 'red,black,blue,Inventore quam ut ma,Sunt dolores quia de', 'احمر,اسود ,ازرق,Non qui eu sint volu,Sequi officiis dicta', '216', '35', '11212121                Sequi ut maiores und', 'Et harum dolor sit i', '212121212121            Autem temporibus ame', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum&nbsp;</p>', '<pre>\r\nलोरेम इप्सम डोलर सिट एमेट कंसेक्टेटूर एडिपिसिसिंग एलीट। मैक्सिमे मोलिशिया,\r\n</pre>\r\n\r\n<pre>\r\nलोरेम इप्सम डोलर सिट एमेट कंसेक्टेटूर एडिपिसिसिंग एलीट। मैक्सिमे मोलिशिया,\r\n</pre>\r\n\r\n<pre>\r\nलोरेम इप्सम डोलर सिट एमेट कंसेक्टेटूर एडिपिसिसिंग एलीट। मैक्सिमे मोलिशिया,\r\n</pre>', '<pre>\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. ماكسيم موليتيا يجب أن يكون هذا هو الحال بالنسبة لسلع ما بعد العمل\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. ماكسيم موليتيا يجب أن يكون هذا هو الحال بالنسبة لسلع ما بعد العمل\r\n</pre>', 'upload/products/thambnail/1733011448553934.jpg', 0, 1, 1, 0, 1, '2022-05-11 14:24:45', '2022-05-30 01:10:29'),
(21, 49, 3, 8, 22, 'Steel Aguilar', 'Hammett Curtis', 'Daphne Vasquez', 'steel-aguilar', 'Hammett-Curtis', 'Daphne-Vasquez', '3PLjwjrc', '685', 'Glow', 'Glow', 'Glow', 'small,medium,larg,Expedita tempore vo', 'small,medium,larg,Reprehenderit aute a', 'كبير,وسط,صغير,Autem quibusdam mole', 'red,black,blue,Voluptatum perspicia', 'red,black,blue,Ea sit porro vitae', 'احمر,اسود ,ازرق,Dolor reprehenderit', '303', NULL, 'Molestiae est quos', 'Elit nulla corporis', 'Laboriosam non aut', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,</p>', 'upload/products/thambnail/1732548649903137.jpeg', 0, 1, 0, 1, 1, '2022-05-11 14:39:09', '2022-05-29 10:38:04'),
(23, 48, 3, 8, 21, 'Leila Morse', 'Charlotte Farley', 'Hiram Schwartz', 'leila-morse', 'Charlotte-Farley', 'Hiram-Schwartz', 'HA7QNFIE', '761', 'Laptop  ', 'लैपटॉप', 'حاسوب محمول', 'small,medium,larg,Nostrum et provident', 'small,medium,larg,Est sunt est debiti', 'كبير,وسط,صغير,Irure quisquam repre', 'red,black,blue,Voluptatum tenetur u', 'red,black,blue,Ut eu officiis ut ut', 'احمر,اسود ,ازرق,Nemo quae non aut eu', '685', '531', 'Quaerat id commodo e', 'Animi voluptatem co', 'Voluptate tempor inc', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733011834147987.jpg', 1, 1, 1, NULL, 1, '2022-05-16 17:21:16', '2022-05-28 09:25:31'),
(24, 44, 4, 11, 30, 'Laith Jensen', 'Tarik Shaffer', 'Meredith Hickman', 'laith-jensen', 'Tarik-Shaffer', 'Meredith-Hickman', '6IcftO4m', '335', 'test', 'test', 'test', 'small,medium,larg,Consequat Nemo volu', 'small,medium,larg,Autem animi exercit', 'كبير,وسط,صغير,Recusandae Sint eo', 'red,black,blue,Ea est recusandae D', 'red,black,blue,Nostrud ab dolore pr', 'احمر,اسود ,ازرق,Dolor ratione et ius', '281', '29', 'Vel consequuntur adi', 'Aliquam cupidatat ut', 'Quia numquam vel ut', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733012024045214.jpg', 1, 1, 1, 1, 1, '2022-05-16 17:24:17', '2022-05-18 17:39:13'),
(26, 44, 3, 8, 23, 'Clio Hart', 'Mason Abbott', 'Angelica Caldwell', 'clio-hart', 'Mason-Abbott', 'Angelica-Caldwell', 'Velit eos officiis i', '150', 'test', 'test', 'test', 'small,medium,larg,Dolorum alias quae d', 'small,medium,larg,Eligendi dolor aut i', 'كبير,وسط,صغير,Numquam commodi face', 'red,black,blue,Et est rerum cupida', 'red,black,blue,Ducimus provident', 'احمر,اسود ,ازرق,Iste labore fugiat c', '699', '491', 'Quia aliquid consect', 'Ad nostrud dolor ten', 'Labore facere et aut', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733014544252381.jpg', 1, 1, NULL, 1, 1, '2022-05-16 18:04:21', '2022-05-16 18:04:21'),
(27, 52, 4, 11, 32, 'Brittany Middleton', 'Neve Matthews', 'Gray Parks', 'brittany-middleton', 'Neve-Matthews', 'Gray-Parks', 'Aut vel vel harum qu', '176', 'test', 'test', 'test', 'small,medium,larg,Omnis ipsa elit am', 'small,medium,larg,Lorem nemo necessita', 'كبير,وسط,صغير,Atque ipsa non est', 'red,black,blue', 'red,black,blue', 'احمر,اسود ,ازرق', '87', '55', 'Ipsa sed rerum eius', 'Corporis esse disti', 'Deserunt illo et ita', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733015379019482.jpeg', 1, 1, 1, 1, 1, '2022-05-16 18:17:37', '2022-05-16 18:17:37'),
(28, 45, 2, 7, 19, 'Eaton Perez', 'Sade Mccarthy', 'Kenyon Martinez', 'eaton-perez', 'Sade-Mccarthy', 'Kenyon-Martinez', 'f9yfca1C', '0', 'test', 'test', 'test', NULL, 'small,medium,larg', 'كبير,وسط,صغير', 'red,black,blue', 'red,black,blue', 'احمر,اسود ,ازرق', '428', '160', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733015801827812.jpg', 1, 1, 1, 1, 1, '2022-05-16 18:24:20', '2022-06-03 13:57:29'),
(31, 49, 1, 11, 32, 'Quincy Mccoy', 'Uriel Pacheco', 'Lani Rios', 'quincy-mccoy', 'Uriel-Pacheco', 'Lani-Rios', 'fEzHhhfH', '976', 'test', 'test', 'test', 'small,medium,larg,Illo dolore reiciend,Eos a rem magni eos', 'small,medium,larg,Aut eu maxime corrup,Nihil aliquid est p', 'كبير,وسط,صغير,Ex sint totam vel q,Voluptate consequatu', 'red,black,blue,Veniam et ipsum mi,Repudiandae reprehen', 'red,black,blue,Qui sunt odio asperi,Aut facere dolorem i', 'احمر,اسود ,ازرق,Earum consectetur e,Sint necessitatibus', '780', '254', 'Dicta sapiente possi', 'Error distinctio Es', 'Quis eum maiores per', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733017140231581.jpeg', 1, 0, 1, 1, 1, '2022-05-16 18:45:36', '2022-05-29 09:58:49'),
(32, 52, 4, 12, 35, 'Nolan Mcclain', 'Macaulay Parrish', 'Brett Roach', 'nolan-mcclain', 'Macaulay-Parrish', 'Brett-Roach', 'Aut dolores exercita', '137', 'Glow', 'Glow', 'Glow', 'small,medium,larg', 'small,medium,larg,lk,nmn', 'كبير,وسط,صغير', 'green,blue,red', 'red,black,blue', 'احمر,اسود ,ازرق', '961', '930', 'Porro expedita quas', 'Necessitatibus fugia', 'Voluptas voluptatibu', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1733017558750860.jpg', 0, 1, 0, 1, 1, '2022-05-16 18:52:15', '2022-06-03 15:28:46'),
(34, 50, 2, 7, 18, 'Genius Glow Potion', 'Maile Barr', 'أحدث كمبيوتر محمول HP 14 بوصة عالي الدقة', 'genius-glow-potion', 'Maile-Barr', 'أحدث-كمبيوتر-محمول-HP-14-بوصة-عالي-الدقة', 'EPioJ9Pr', '100', 'loresm ipsum', 'loresm ipsum', 'loresm ipsum', 'small,medium,larg', 'small,medium,larg', 'كبير,وسط,صغير', 'red,black,blue', 'red,black,blue', 'احمر,اسود ,ازرق', '1000', '100', 'This is my textarea to be replaced wThis is my textarea to be replaced w', 'This is my textarea to be replaced wThis is my textarea to be replaced w', 'This is my textarea to be replaced wThis is my textarea to be replaced w', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', '<p>This is my textarea to be replaced with CKEditor.</p>', 'upload/products/thambnail/1734722890156746.jpg', NULL, 1, 1, 1, 1, '2022-06-04 14:37:46', '2022-06-04 14:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MwF8bZmasFnWgPKaDiwP5YWv2P6K9LGwApIIozrn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNllRUkp5QmRFRXpsN3RPTlVwd0ZQdkRrNEhRT2hVMFZYa1k4cm50dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQzVkVDN1Y3V0sxd0VQY29nSVBCV2ZPU3V5LlhkRkd3SDFBbG15TjN0TW5EVzRHQlQucHloQyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkM1ZFQzdWN1dLMXdFUGNvZ0lQQldmT1N1eS5YZEZHd0gxQWxteU4zdE1uRFc0R0JULnB5aEMiO3M6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6ImJjZjdlZGE0M2ZkYTMzOWRhNDAwY2RmNTgxYzFkZTg0IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTE6e3M6NToicm93SWQiO3M6MzI6ImJjZjdlZGE0M2ZkYTMzOWRhNDAwY2RmNTgxYzFkZTg0IjtzOjI6ImlkIjtzOjI6IjM0IjtzOjM6InF0eSI7czoxOiIxIjtzOjQ6Im5hbWUiO3M6MTg6Ikdlbml1cyBHbG93IFBvdGlvbiI7czo1OiJwcmljZSI7ZDo5MDA7czo2OiJ3ZWlnaHQiO2Q6MTtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YTozOntzOjU6ImltYWdlIjtzOjQ2OiJ1cGxvYWQvcHJvZHVjdHMvdGhhbWJuYWlsLzE3MzQ3MjI4OTAxNTY3NDYuanBnIjtzOjU6ImNvbG9yIjtzOjM6InJlZCI7czo0OiJzaXplIjtzOjU6InNtYWxsIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjc6InRheFJhdGUiO2k6MDtzOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtOO3M6NDY6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBkaXNjb3VudFJhdGUiO2k6MDtzOjg6Imluc3RhbmNlIjtzOjc6ImRlZmF1bHQiO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319czo2OiJjb3Vwb24iO2E6NDp7czoxMToiY291cG9uX25hbWUiO3M6MTQ6IkhBUFBZIE5FVyBZRUFSIjtzOjE1OiJjb3Vwb25fZGlzY291bnQiO2k6MTI7czoxNToiZGlzY291bnRfYW1vdW50IjtkOjEwODtzOjEyOiJ0b3RhbF9hbW91bnQiO2Q6NzkyO319', 1657188577);

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ray Hunt', '2022-06-26 02:08:52', '2022-06-26 02:08:52'),
(3, 1, 'sbfsfbsfb11111', '2022-06-26 02:09:16', '2022-06-26 02:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'masnora', '2022-06-25 22:46:07', '2022-06-25 23:14:15'),
(4, 'Medge Ware', '2022-06-26 02:09:00', '2022-06-26 02:09:00'),
(5, 'Lucas Stout', '2022-06-26 02:09:04', '2022-06-26 02:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'sdsd12', '2022-06-26 03:33:29', '2022-06-26 03:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/Sliders/1732087937287479.jpg', 'slider one1212', 'slider one for Testing1212', 1, '2022-05-06 12:36:19', '2022-05-06 14:16:26'),
(3, 'upload/Sliders/1732095296242302.jpg', 's1111241', 'slider three for Testing', 0, '2022-05-06 13:13:53', '2022-05-11 11:52:24'),
(4, 'upload/Sliders/1732538241284114.jpg', 'slider 3', 'test this slider 3 halooooo', 1, '2022-05-11 11:51:46', '2022-06-17 14:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(11) UNSIGNED NOT NULL,
  `sub_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name_en`, `sub_category_name_hin`, `sub_category_name_ar`, `sub_category_slug_en`, `sub_category_slug_hin`, `sub_category_slug_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mans Top Ware', 'मैंस टॉप वेयर', 'مان توب وير', 'mans-top-ware', 'मैंस-टॉप-वेयर', 'مان-توب-وير', '2022-04-29 22:23:01', '2022-04-29 22:23:01'),
(2, 1, 'Mans Bottom Ware', 'मैन्स बॉटम वेयर', 'ملابس داخلية رجالي', 'mans-bottom-ware', 'मैन्स-बॉटम-वेयर', 'ملابس-داخلية-رجالي', '2022-04-29 22:24:21', '2022-04-29 22:24:21'),
(3, 1, 'Mans Footwear', 'मैन्स फुटवियर', 'احذية رجالي', 'mans-footwear', 'मैन्स-फुटवियर', 'احذية-رجالي', '2022-04-29 22:25:39', '2022-04-29 22:25:39'),
(4, 1, 'Women Footwear', 'महिलाओं के जूते', 'احذية نسائية', 'women-footwear', 'महिलाओं-के-जूते', 'احذية-نسائية', '2022-04-29 22:26:29', '2022-04-29 22:26:29'),
(5, 2, 'Computer Peripherals', 'कंप्यूटर पेरिफेरल्स', 'ملحقات الكمبيوتر', 'computer-peripherals', 'कंप्यूटर-पेरिफेरल्स', 'ملحقات-الكمبيوتر', '2022-04-29 22:28:51', '2022-04-29 22:28:51'),
(6, 2, 'Mobile Accessory', 'मोबाइल एक्सेसरी', 'ملحقات الهاتف المحمول', 'mobile-accessory', 'मोबाइल-एक्सेसरी', 'ملحقات-الهاتف-المحمول', '2022-04-29 22:30:31', '2022-04-29 22:30:31'),
(7, 2, 'Gaming', 'गेमिंग', 'الألعاب', 'gaming', 'गेमिंग', 'الألعاب', '2022-04-29 22:31:36', '2022-04-29 22:31:36'),
(8, 3, 'Home Furnishings', 'घर का सामान', 'اثاث منزلى', 'home-furnishings', 'घर-का-सामान', 'اثاث-منزلى', '2022-04-29 22:34:49', '2022-04-29 22:34:49'),
(9, 3, 'Living Room', 'लिविंग रूम', 'غرفة المعيشة', 'living-room', 'लिविंग-रूम', 'غرفة-المعيشة', '2022-04-29 22:35:58', '2022-04-29 22:35:58'),
(10, 3, 'Home Decor', 'गृह सज्जा', 'ديكور المنزل', 'home-decor', 'गृह-सज्जा', 'ديكور-المنزل', '2022-04-29 22:36:56', '2022-04-29 22:36:56'),
(11, 4, 'Televisions', 'टेलीविजन', 'التلفزيونات', 'televisions', 'टेलीविजन', 'التلفزيونات', '2022-04-29 22:38:06', '2022-04-29 22:38:06'),
(12, 4, 'Washing Machines', 'वाशिंग मशीन', 'غسالات', 'washing-machines', 'वाशिंग-मशीन', 'غسالات', '2022-04-29 22:41:52', '2022-04-29 22:41:52'),
(13, 4, 'Refrigerators', 'रेफ्रिजरेटर', 'ثلاجات', 'refrigerators', 'रेफ्रिजरेटर', 'ثلاجات', '2022-04-29 22:42:29', '2022-04-29 22:42:29'),
(14, 5, 'Beauty and Personal Care', 'सौंदर्य और व्यक्तिगत देखभाल', 'التجميل والعناية الشخصية', 'beauty-and-personal-care', 'सौंदर्य-और-व्यक्तिगत-देखभाल', 'التجميل-والعناية-الشخصية', '2022-04-29 23:15:11', '2022-04-29 23:15:11'),
(15, 5, 'Food and Drinks', 'खाद्य और पेय', 'أطعمة ومشروبات', 'food-and-drinks', 'खाद्य-और-पेय', 'أطعمة-ومشروبات', '2022-04-29 23:33:25', '2022-04-29 23:33:25'),
(16, 5, 'Bady Care', 'बैडी केयर', 'بادي كير', 'bady-care', 'बैडी-केयर', 'بادي-كير', '2022-04-29 23:34:06', '2022-04-29 23:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hin`, `subsubcategory_name_ar`, `subsubcategory_slug_en`, `subsubcategory_slug_hin`, `subsubcategory_slug_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mans Tshirt', 'मैंस टीशर्ट', 'تي شيرت رجالي', 'mans-tshirt', 'मैंस-टीशर्ट', 'تي-شيرت-رجالي', '2022-04-29 23:37:44', '2022-04-29 23:37:44'),
(2, 1, 2, 'Mans Casual Shirts', 'मैंस कैजुअल शर्ट्स', 'قمصان مان كاجوال', 'mans-casual-shirts', 'मैंस-कैजुअल-शर्ट्स', 'قمصان-مان-كاجوال', '2022-04-29 23:38:29', '2022-04-29 23:38:29'),
(3, 1, 1, 'Mans Kurtas', 'मैन्स बॉटम वेयर', 'مان كورتاس', 'mans-kurtas', 'मैन्स-बॉटम-वेयर', 'مان-كورتاس', '2022-04-29 23:40:56', '2022-04-29 23:40:56'),
(4, 1, 2, 'Mans Jeans', 'मैंस जीन्स', 'مان جينز', 'mans-jeans', 'मैंस-जीन्स', 'مان-جينز', '2022-04-29 23:42:17', '2022-04-29 23:42:17'),
(5, 1, 2, 'Man\'s Trousers', 'मैन्स ट्राउजर', 'بنطلون رجالي', 'man\'s-trousers', 'मैन्स-ट्राउजर', 'بنطلون-رجالي', '2022-04-29 23:43:22', '2022-04-29 23:43:22'),
(6, 1, 2, 'Mans Cargos', 'मैन्स ट्राउजर', 'مان للشحن', 'mans-cargos', 'मैन्स-ट्राउजर', 'مان-للشحن', '2022-04-29 23:44:49', '2022-04-29 23:44:49'),
(7, 1, 3, 'Mans Sports Shoes', 'मैन्स स्पोर्ट्स शूज़', 'أحذية رياضية', 'mans-sports-shoes', 'मैन्स-स्पोर्ट्स-शूज़', 'أحذية-رياضية', '2022-04-29 23:46:14', '2022-04-29 23:46:14'),
(8, 1, 3, 'Mans Casual Shoes', 'मैंस कैजुअल शूज़', 'أحذية رجالي عادية', 'mans-casual-shoes', 'मैंस-कैजुअल-शूज़', 'أحذية-رجالي-عادية', '2022-04-29 23:47:17', '2022-04-29 23:47:17'),
(9, 1, 4, 'Women Flats', 'महिला फ्लैट', 'شقق نسائية', 'women-flats', 'महिला-फ्लैट', 'شقق-نسائية', '2022-04-29 23:48:23', '2022-04-29 23:48:23'),
(10, 1, 4, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'كعب نسائي', 'women-heels', 'महिला-ऊँची-एड़ी-के-जूते', 'كعب-نسائي', '2022-04-29 23:49:39', '2022-04-29 23:49:39'),
(11, 1, 4, 'Woman Sheakers', 'महिला शेकर्स', 'أحذية نسائية', 'woman-sheakers', 'महिला-शेकर्स', 'أحذية-نسائية', '2022-04-29 23:51:00', '2022-04-29 23:51:00'),
(12, 2, 5, 'Printers', 'प्रिंटर', 'طابعات', 'printers', 'प्रिंटर', 'طابعات', '2022-04-29 23:52:22', '2022-04-29 23:52:22'),
(13, 2, 5, 'Monitors', 'मॉनिटर्स', 'الشاشات', 'monitors', 'मॉनिटर्स', 'الشاشات', '2022-04-29 23:53:01', '2022-04-29 23:53:01'),
(14, 2, 5, 'PCs', 'प्रोजेक्टर', 'كمبيوتر شخص', 'pcs', 'प्रोजेक्टर', 'كمبيوتر-شخص', '2022-04-29 23:53:53', '2022-05-11 12:58:07'),
(15, 2, 6, 'Plain Cases', 'सादा मामले', 'حالات عادية', 'plain-cases', 'सादा-मामले', 'حالات-عادية', '2022-04-29 23:54:43', '2022-04-29 23:54:43'),
(16, 2, 6, 'Designer Cases', 'डिजाइनर मामले', 'حقائب المصمم', 'designer-cases', 'डिजाइनर-मामले', 'حقائب-المصمم', '2022-04-29 23:55:50', '2022-04-29 23:55:50'),
(17, 2, 6, 'Screen Guards', 'स्क्रीन गार्ड', 'واقيات الشاشة', 'screen-guards', 'स्क्रीन-गार्ड', 'واقيات-الشاشة', '2022-04-29 23:56:52', '2022-04-29 23:56:52'),
(18, 2, 7, 'Gaming Mouse', 'गेमिंग', 'ماوس الألعاب', 'gaming-mouse', 'गेमिंग', 'ماوس-الألعاب', '2022-04-29 23:57:34', '2022-04-29 23:57:34'),
(19, 2, 7, 'Gaming Keyboars', 'गेमिंग कीबोर्ड', 'كي بورد', 'gaming-keyboars', 'गेमिंग-कीबोर्ड', 'كي-بورد', '2022-04-29 23:58:27', '2022-04-29 23:58:27'),
(20, 2, 7, 'Gaming Mousepads', 'गेमिंग माउसपैड', 'مساند ماوس للألعاب', 'gaming-mousepads', 'गेमिंग-माउसपैड', 'مساند-ماوس-للألعاب', '2022-04-29 23:59:08', '2022-04-29 23:59:08'),
(21, 3, 8, 'Bed Liners', 'बेड लाइनर्स', 'أغطية السرير', 'bed-liners', 'बेड-लाइनर्स', 'أغطية-السرير', '2022-04-30 00:00:24', '2022-04-30 00:00:24'),
(22, 3, 8, 'Bedsheets', 'شراشف', 'बेडशीट', 'bedsheets', 'شراشف', 'बेडशीट', '2022-04-30 00:01:12', '2022-04-30 00:01:12'),
(23, 3, 8, 'Blankets', 'कंबल', 'بطاطين', 'blankets', 'कंबल', 'بطاطين', '2022-04-30 00:01:53', '2022-04-30 00:01:53'),
(24, 3, 9, 'Tv Units', 'टीवी इकाइयां', 'وحدات تلفزيون', 'tv-units', 'टीवी-इकाइयां', 'وحدات-تلفزيون', '2022-04-30 00:03:21', '2022-04-30 00:03:21'),
(25, 3, 9, 'Dining Sets', 'डाइनिंग सेट', 'أطقم سفرة', 'dining-sets', 'डाइनिंग-सेट', 'أطقم-سفرة', '2022-04-30 00:03:55', '2022-04-30 00:03:55'),
(26, 3, 9, 'Coffee Tables', 'कॉफी टेबल', 'طاولات قهوة', 'coffee-tables', 'कॉफी-टेबल', 'طاولات-قهوة', '2022-04-30 00:05:04', '2022-04-30 00:05:04'),
(27, 3, 10, 'Lightings', 'लाइटिंग्स', 'الإنارات', 'lightings', 'लाइटिंग्स', 'الإنارات', '2022-04-30 00:05:46', '2022-04-30 00:07:19'),
(28, 3, 10, 'Clocks', 'घड़ियां', 'ساعات', 'clocks', 'घड़ियां', 'ساعات', '2022-04-30 00:08:12', '2022-04-30 00:08:12'),
(29, 3, 10, 'Wall Decor', 'दीवार की सजावट', 'ديكور الحائط', 'wall-decor', 'दीवार-की-सजावट', 'ديكور-الحائط', '2022-04-30 00:09:02', '2022-04-30 00:09:02'),
(30, 4, 11, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'أجهزة التلفاز ذات الشاشات الكبيرة', 'big-screen-tvs', 'बिग-स्क्रीन-टीवी', 'أجهزة-التلفاز-ذات-الشاشات-الكبيرة', '2022-04-30 00:10:41', '2022-04-30 00:10:41'),
(31, 4, 11, 'Smart TVs', 'स्मार्ट टीवी', 'تلفزيونات ذكية', 'smart-tvs', 'स्मार्ट-टीवी', 'تلفزيونات-ذكية', '2022-04-30 00:11:12', '2022-04-30 00:11:12'),
(32, 4, 11, 'OLED TVs', 'स्मार्ट टीवी', 'تلفزيونات ليد', 'oled-tvs', 'स्मार्ट-टीवी', 'تلفزيونات-ليد', '2022-04-30 00:12:14', '2022-04-30 00:12:14'),
(33, 4, 12, 'Washer Dryers', 'वॉशर ड्रायर्स', 'غسالة مجففات', 'washer-dryers', 'वॉशर-ड्रायर्स', 'غسالة-مجففات', '2022-04-30 00:12:49', '2022-04-30 00:12:49'),
(34, 4, 12, 'Washer Only', 'केवल वॉशर', 'غسالة فقط', 'washer-only', 'केवल-वॉशर', 'غسالة-فقط', '2022-04-30 00:13:48', '2022-04-30 00:13:48'),
(35, 4, 12, 'Energy Efficient', 'ऊर्जा कुशल', 'كفاءة في استخدام الطاقة', 'energy-efficient', 'ऊर्जा-कुशल', 'كفاءة-في-استخدام-الطاقة', '2022-04-30 00:14:32', '2022-04-30 00:14:32'),
(36, 4, 13, 'Single Door', 'सिंगल डोर', 'باب واحد', 'single-door', 'सिंगल-डोर', 'باب-واحد', '2022-04-30 00:15:29', '2022-04-30 00:15:29'),
(37, 4, 13, 'Double Door', 'डबल डोर', 'باب مزدوج', 'double-door', 'डबल-डोर', 'باب-مزدوج', '2022-04-30 00:16:00', '2022-04-30 00:16:00'),
(38, 4, 13, 'Mini Rerigerators', 'मिनी रेफ्रिजरेटर', 'ثلاجات صغيرة', 'mini-rerigerators', 'मिनी-रेफ्रिजरेटर', 'ثلاجات-صغيرة', '2022-04-30 00:16:58', '2022-04-30 00:16:58'),
(39, 5, 14, 'Eyes Makeup', 'आई मेकअप', 'مكياج العيون', 'eyes-makeup', 'आई-मेकअप', 'مكياج-العيون', '2022-04-30 00:18:30', '2022-04-30 00:18:30'),
(40, 5, 14, 'Lip Makeup', 'होंठ मेकअप', 'مكياج الشفاه', 'lip-makeup', 'होंठ-मेकअप', 'مكياج-الشفاه', '2022-04-30 00:19:07', '2022-04-30 00:19:07'),
(41, 5, 14, 'Hair Care', 'बालों की देखभाल', 'العناية بالشعر', 'hair-care', 'बालों-की-देखभाल', 'العناية-بالشعر', '2022-04-30 00:20:11', '2022-04-30 00:20:11'),
(42, 5, 15, 'Beverages', 'पेय पदार्थ', 'مشروبات', 'beverages', 'पेय-पदार्थ', 'مشروبات', '2022-04-30 00:20:52', '2022-04-30 00:20:52'),
(43, 5, 15, 'Chocolates', 'चॉकलेट', 'شوكولاتة', 'chocolates', 'चॉकलेट', 'شوكولاتة', '2022-04-30 00:21:45', '2022-04-30 00:21:45'),
(44, 5, 15, 'Snacks', 'स्नैक्स', 'وجبات خفيفة', 'snacks', 'स्नैक्स', 'وجبات-خفيفة', '2022-04-30 00:22:27', '2022-04-30 00:22:27'),
(45, 5, 16, 'Baby Diapers', 'बेबी डायपर', 'حفاضات اطفال', 'baby-diapers', 'बेबी-डायपर', 'حفاضات-اطفال', '2022-04-30 00:23:05', '2022-04-30 00:25:02'),
(46, 5, 16, 'Baby Wipes', 'बेबी वाइप्स', 'مناديل اطفال', 'baby-wipes', 'बेबी-वाइप्स', 'مناديل-اطفال', '2022-04-30 00:23:36', '2022-04-30 00:25:27'),
(47, 5, 16, 'Baby Food', 'बेबी फ़ूड', 'أغذية الأطفال', 'baby-food', 'बेबी-फ़ूड', 'أغذية-الأطفال', '2022-04-30 00:26:08', '2022-04-30 00:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User12345', 'user@gmail.com', '2022-03-17 11:40:02', '$2y$10$3VEC7V7WK1wEPcogIPBWfOSuy.XdFGwH1AlmyN3tMnDW4GBT.pyhC', '01120290147457', NULL, NULL, 'pcyqswVv2polPO0aAvDiZLaFMR9QILsZ2L6oEoiwJz6an87CobrlVwFAaWsE', NULL, '2022031913371.jpg', '2021-12-25 07:59:09', '2022-03-19 11:54:50'),
(2, 'Cody Gregory12', 'babowys@mailinator.com', NULL, '$2y$10$J1d.OQzLwPp/wzuY4iLQuObYNxH.RazNb2OaPGbi55wJVbWpgvJ9u', '+1 (763) 674-1917', NULL, NULL, 'xOIqAsv5tZPDZboDaAv3LsdSVDnhs5bCjep7CVZjpmqtdgWvZhyLbZdFgIB2', NULL, '202203191445woman-gea5dfe0e8_1920.jpg', '2022-03-17 09:39:39', '2022-03-20 03:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(22, 1, 32, '2022-06-19 09:44:26', '2022-06-19 09:44:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multi_imgs_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_subsubcategory_id_foreign` (`subsubcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_states_division_id_foreign` (`division_id`),
  ADD KEY `ship_states_district_id_foreign` (`district_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_sub_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD CONSTRAINT `multi_imgs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subsubcategory_id_foreign` FOREIGN KEY (`subsubcategory_id`) REFERENCES `sub_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD CONSTRAINT `ship_districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `ship_divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD CONSTRAINT `ship_states_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `ship_districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ship_states_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `ship_divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD CONSTRAINT `sub_sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_sub_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
