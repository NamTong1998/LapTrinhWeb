-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2019 lúc 09:49 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom10`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_highlight` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `is_qualified` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `summary`, `content`, `image`, `is_highlight`, `category_id`, `user_id`, `video`, `is_qualified`, `created_at`, `updated_at`) VALUES
(45, 'Overlooked European city slated to be next top food destination', '<p>As one of the world&#39;s largest financial centers, mention of Zurich&#39;s&nbsp;<a href=\"https://www.cnn.com/travel/food-and-drink\" target=\"_blank\">food</a>&nbsp;scene -- if it was mentioned at all -- commonly evoked images of dour bankers in business suits with a penchant for high-end, if conservative, cuisine.</p>\r\n\r\n<p>Over the past few years, however, this is decidedly (and deliciously) not the case. Switzerland&#39;s largest city has upped its culinary cred and is emerging as one of Europe&#39;s hottest food destinations.</p>', 'F4Vk_http___cdn.cnn.com_cnnnext_dam_assets_190312144754-15-zurich-food-rechberg.jpg', 1, 1, 1, NULL, 1, '2019-05-11 07:27:39', '2019-05-11 00:27:39'),
(46, 'Rooftop infinity pool at JFK\'s new TWA Hotel overlooks runway', '<p>Passengers flying from John F. Kennedy International Airport in&nbsp;<a href=\"http://www.cnn.com/travel/destinations/new-york\" target=\"_blank\">New York City</a>&nbsp;will soon be able to witness spectacular views of its famous runways from what could be one of the coolest pools on the planet.</p>\r\n\r\n<p>Due to launch on May 15, the highly anticipated TWA Hotel features an impressive rooftop infinity pool complete with an observation deck where you can see as far as Jamaica Bay.</p>\r\n\r\n<p>The pool, which measures 64 feet long (19.5 meters), is said to have been inspired by the infinity edge pool at the Hotel du Cap-Eden-Roc in Antibes.</p>\r\n\r\n<p>Open 365 days a year, it will transform into a &quot;pool-cuzzi&quot; during winter, when its filtered water can be heated to up to 100 Fahrenheit (37.8 Celsius).</p>', 'M0x6_http___cdn.cnn.com_cnnnext_dam_assets_190423152114-twa-hotel-rendering-3.jpg', 1, 1, 1, NULL, 1, '2019-05-11 07:27:41', '2019-05-11 00:27:41'),
(47, '25 of the most beautiful places around the world', '<p>The world&#39;s a spectacular place, full of hidden and overt beauty in every corner. But beauty&#39;s also subjective. It&#39;d be impossible to get a unanimous decision on the most beautiful places around the world -- but we think this list is a good start to plan your&nbsp;<a href=\"https://www.cnn.com/travel\" target=\"_blank\">travels</a>.</p>\r\n\r\n<p>In celebration of Earth Day, we&#39;ve rounded up the best of the best. From lush African forests to vast Latin American deserts, watery Balkan paradises to ancient Middle Eastern cities, here are our picks for the world&#39;s top breathtaking, beautiful&nbsp;<a href=\"https://www.cnn.com/travel/destinations\" target=\"_blank\">destinations</a>.</p>\r\n\r\n<h3>Bwindi Impenetrable Forest, Uganda</h3>\r\n\r\n<p>Dense, lush and otherworldly, Bwindi Impenetrable Forest is one of the last redoubts of the mountain gorilla. Over 400 call this UNESCO-protected national park home, with the chance for visitors to trek to and meet habituated groups. Its biodiversity extends far beyond its most famous inhabitants, however; 348 bird species and 220 butterfly species can be found within its 331-square-kilometer expanse.</p>\r\n\r\n<h3>Samburu, Kenya</h3>\r\n\r\n<p>Thanks to its relative inaccessibility, Samburu, in the heart of Kenya, is a haven for some of Africa&#39;s most beguiling wildlife. The grassland and acacia-dotted landscapes of its national reserve are home to the endangered reticulated giraffe and Grevy&#39;s zebra, as well as the pioneering Elephant Watch Camp, run by conservationist Saba Douglas-Hamilton.</p>\r\n\r\n<h3>Mount Toubkal, Morocco</h3>\r\n\r\n<p>At 4,167 meters, Mount Toubkal lays claim to the title of &quot;the roof of North Africa.&quot; The path to its summit zigzags across empty valleys, past holy shrines and up steep snowfields before emerging onto a ridge that falls away to give climbers unrivaled views across the Atlas Mountains. It&#39;s a peaceful world away from the buzz of nearby Marrakech.</p>', 'hKaT_http___cdn.cnn.com_cnnnext_dam_assets_190417163838-21-earth-beautiful-places-restricted.jpg', 1, 1, 1, NULL, 1, '2019-05-11 07:27:44', '2019-05-11 00:27:44'),
(48, 'Does sugar make kids hyper? That\'s largely a myth', '<p>If you look at the peer-reviewed evidence, we cannot say sugar absolutely makes kids hyper; however, you can&#39;t discount that sugar may have a slight effect&quot; on behavior, said Kristi L. King, senior pediatric dietitian at Texas Children&#39;s Hospital and spokeswoman for the Academy of Nutrition and Dietetics.</p>\r\n\r\n<p>In the mid-1990s,&nbsp;<a href=\"https://jamanetwork.com/journals/jama/article-abstract/391812\" target=\"_blank\">a meta-analysis</a>&nbsp;reviewed 16 studies on sugar&#39;s effects in children. The research, published in the medical journal JAMA, concluded that sugar does not affect behavior or cognitive performance in children. &quot;However, a small effect of sugar or effects on subsets of children cannot be ruled out,&quot; the article said.</p>', 'PrHs_161027165238-08-sugar-shoot-exlarge-169.jpg', 1, 5, 1, NULL, 1, '2019-05-11 07:27:47', '2019-05-11 00:27:47'),
(49, 'Ultra-processed foods linked to increased cancer risk', '<p>Ultra-processed foods are not known for their health qualities. We know this, yet it&#39;s hard to resist the doughnuts your kind colleague brought into the office. Now, research published&nbsp;<a href=\"http://www.bmj.com/content/360/bmj.k322\" target=\"_blank\">Wednesday in the BMJ</a>&nbsp;may give you at least a longer pause before you pick the pink one with sprinkles.</p>\r\n\r\n<p>Researchers discovered that people who eat more&nbsp;<a href=\"http://www.leeds.ac.uk/yawya/science-and-nutrition/Ultra%20processed%20food.html\" target=\"_blank\">ultra-processed foods</a>&nbsp;have a higher risk of cancer. Such foods are the ones with unrecognizable and unpronounceable words on the list of ingredients -- anything from the candy that turns your tongue blue to healthier-sounding canned soups packed with artificial flavors, additives or emulsifiers. Most food is processed to some degree, but ultra-processed foods are typically much more calorie-, sodium- and&nbsp;<a href=\"http://bmjopen.bmj.com/content/6/3/e009892\" target=\"_blank\">sugar-packed</a>.</p>', 'Mn0I_170308101225-fruit-stock-exlarge-169.jpg', 1, 5, 1, NULL, 1, '2019-05-11 07:27:51', '2019-05-11 00:27:51'),
(50, 'The post-credits of \'Avengers: Endgame\' has something news', '<p>For Marvel Studios, all roads have led to &quot;Avengers: Endgame.&quot; More than a decade and 21 films in the making, the fourth Avengers film finally arrives in theaters this month with almost impossibly high expectations -- both for audiences and the box office.</p>', 'nzP4_190425160639-02-avengers-endgame-thumb-imax-poster-super-tease.jpg', 1, 6, 1, NULL, 1, '2019-05-11 07:27:54', '2019-05-11 00:27:54'),
(51, 'Remember when \'The Oprah Winfrey Show\' made us listen to each other', '<p>&quot;The Oprah Winfrey Show&quot; used to air at 4 p.m. every day on my local station in South Texas.</p>\r\n\r\n<p>Because my elementary, middle and high schools were mere minutes from our family home -- and I was, at times, a bit of a truant -- Oprah Winfrey and I spent countless after-class hours together during the late &#39;90s and &#39;00s.</p>\r\n\r\n<p>At first, I would tune in because she was my favorite celebrity interviewer, and I would feel a twinge of disappointment when I&#39;d come home and find her couch occupied by someone whose faces and names I didn&#39;t recognize. But as the years went on, the episodes about common men and women would become my favorite for the same reason that Winfrey was quickly recognized as a one-of-a-kind talent: she made you care deeply about strangers and understand experiences that weren&#39;t your own.</p>\r\n\r\n<p>Her &quot;talk to people&quot; vs. &quot;talk at people&quot; approach and the way she shined light in the darkest corners of subjects like sexual abuse and racism, made &quot;The Oprah Winfrey Show&quot; a unique television experience -- one that presently feels absent on daytime and broadcast television. (Or anywhere on TV, really.) This, at a time when political and ideological divides could use a bridge-builder and when Americans could use a daily housecall from someone whose message has always been empathy.</p>\r\n\r\n<p>If the country doesn&#39;t need Oprah in the White House; maybe it needs her back on the talk show stage.</p>', 'hf3R_190312094556-20191203-bring-back-oprah-super-16-9.jpg', 1, 6, 1, NULL, 1, '2019-05-11 07:27:58', '2019-05-11 00:27:58'),
(52, 'Coons and Klobuchar: Most Americans can\'t save for retirement. We want to fix that', '<p>What do we mean by barely?&nbsp;<a href=\"https://www.federalreserve.gov/publications/files/2017-report-economic-well-being-us-households-201805.pdf\" target=\"_blank\">Four in 10 American adults</a>&nbsp;do not have cash savings to meet a $400 emergency expense, and unfortunately, $400 emergency expenses are pretty common. So, for far too many Americans, a broken bone, a minor car repair or even school supplies could mean that all the bills can&#39;t be paid at the end of the month.</p>\r\n\r\n<p>For these families, saving for retirement is nearly impossible, and the numbers confirm it: Among families in the bottom half of the income scale, only&nbsp;<a href=\"https://www.federalreserve.gov/publications/files/scf17.pdf\" target=\"_blank\">about 40%</a>hold any kind of a retirement plan.</p>', 'e56a_190425133821-savings-crisis-super-169.jpg', 0, 7, 1, NULL, 1, '2019-05-11 07:28:01', '2019-05-11 00:28:01'),
(53, 'Top Smart Home Tech From Asia', '<p>Intelligent interior design is increasingly about connecting not just speakers or smartphones to the Internet of Things, but everything: think pet feeders, windows, and kitchen appliances.&nbsp;</p>\r\n\r\n<p>Nowhere is this more evident than in Asia, where brands and consumers have been quick to welcome the shift toward better- connected and more-intuitive surroundings. Led by Japan, where smart toilets are already in households around the country, and China, whose middle class is getting more interested in seamless connectivity, the market is expected to grow significantly in the region.&nbsp; Heightened home security is a major benefit of an automated interior, and this starts with door locks, some of which are harnessing facial-recognition technology to add a layer of protection.&nbsp;<strong>ZKTeco&#39;s FL1000</strong><strong>Price available upon request</strong></p>', 'ewOY_large_lock.jpg', 1, 2, 1, NULL, 1, '2019-05-11 07:28:09', '2019-05-11 00:28:09'),
(54, 'Kim Jong Un accuses US of acting in \'bad faith\'', '<p>North Korean leader Kim Jong Un told Russian President Vladimir Putin that he believes the United States acted in &quot;bad faith&quot; at the Hanoi summit, North Korean state media reported.</p>\r\n\r\n<p>The report in North Korea&#39;s state-run KCNA news was released on the final day of Kim&#39;s visit to the far-eastern Russian city of Vladivostok. Kim and Putin met there&nbsp;<a href=\"https://www.cnn.com/asia/live-news/kim-jong-un-vladimir-putin-summit-intl/index.html\" target=\"_blank\">for the first time Thursday</a>, spending about three and a half hours together. The North Korean leader left Vladivostok Friday afternoon aboard his&nbsp;<a href=\"https://edition.cnn.com/2018/03/28/asia/kim-jong-un-train-north-korea-china-intl/index.html\" target=\"_blank\">armored government train</a>.</p>\r\n\r\n<p>KCNA reported that &quot;Kim Jong Un said that the situation on the Korean Peninsula and the region is now at a standstill, and has reached a critical point where it may return to its original state, as the US took a unilateral attitude in bad faith at the recent second DPRK-US summit talks,&quot; using the acronym for North Korea&#39;s formal name, the Democratic People&#39;s Republic of Korea.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>KCNA also said Kim told his Russian hosts that &quot;peace and security on the Korean Peninsula will entirely depend on the US&#39; future attitude, and the DPRK will guard itself for every possible situation.&quot;</p>', '2CRr_190425031452-kju-putin-summit-08-exlarge-169.jpg', 1, 8, 1, NULL, 1, '2019-05-11 07:28:13', '2019-05-11 00:28:13'),
(55, 'Mohamed Salah on target as Liverpool thrash Huddersfield', '<p>Mohamed Salah was in fine form as Liverpool went top of the English Premier League table with an emphatic 5-0 victory over already relegated Huddersfield on Friday, keeping up the pressure on title rival Manchester City which has played a game less.</p>\r\n\r\n<p>The &quot;Egyptian King,&quot; fresh from attending the&nbsp;<a href=\"http://edition.cnn.com/2019/04/17/media/time-100-2019/index.html\" target=\"_blank\">Time 100 Gala</a>&nbsp;in New York earlier this week, set up Naby Keita to open the scoring after just 15 seconds before finding the net himself on the stroke of halftime.</p>', 'qqhs_190426163720-salah-keita-liverpool-huddersfield-exlarge-tease.jpg', 1, 3, 1, NULL, 1, '2019-05-11 07:28:38', '2019-05-11 00:28:38'),
(56, 'Joao Felix: The Benfica teen who is a \'star already\'', '<p>At the tender age of just 19, Joao Felix is already breaking records, not to mention attracting admiring glances from Europe&#39;s biggest clubs and comparisons to some of Portugal&#39;s greatest players.</p>\r\n\r\n<p>The Benfica forward became the youngest player to score a hat-trick in the Europa League when the Portuguese league leaders defeated Eintracht Frankfurt 4-2 in the first leg of their quarterfinal tie in Lisbon (although they would subsequently lose the tie on aggregate).</p>\r\n\r\n<p>On Monday, he grabbed a brace against Maritimo in the Primeira Liga, while a long list of suitors -- which is&nbsp;<a href=\"https://www.thesun.co.uk/sport/football/8845322/man-utd-felix-benfica-4-frankfurt-2/\" target=\"_blank\">reported</a>&nbsp;to include Juventus, Real Madrid, Manchester City and Manchester United -- are said to be tracking his performances, with&nbsp;<a href=\"https://www.calciomercato.com/en/news/from-portugal-ronaldo-will-bring-joao-felix-to-juventus-98782\" target=\"_blank\">Benfica reportedly having inserted a $135 million release clause in the teenager&#39;s contract.</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>Not bad for a player that only made his competitive first team debut last August.</p>', 'ujM3_190423124836-joao-felix-medium-plus-169.jpg', 0, 3, 1, NULL, 1, '2019-05-11 07:28:43', '2019-05-11 00:28:43'),
(57, 'Fact-checking Trump\'s claims about violent crime', '<p>President Donald Trump celebrated declining violent crime rates during a speech at the National Rifle Association&#39;s annual meeting on Friday.</p>\r\n\r\n<p>He made several claims about crime rates, suggesting crime was on the decline thanks to the efforts of his administration.</p>\r\n\r\n<p>&quot;As we protect gun rights for law abiding citizens, we&#39;re also getting guns out of the hands of violent criminals. When I took office two years ago one of my highest priorities was to reduce violent crime. In the two years before my inauguration the murder rate had increased by more than 20%,&quot; Trump said. He added, &quot;And the United States had experienced the largest increase in violent crime in over 25 years.&quot;</p>', 'YPkt_180506073809-trump-nra-0504-large-tease.jpg', 1, 4, 1, NULL, 1, '2019-05-11 07:28:33', '2019-05-11 00:28:33'),
(58, 'Asia\'s 9 busiest airsports in 2019', '<p>With Beijing&#39;s new world-beating airport set to open this year, it adds to the list of megahubs in the region already vying for passengers and airlines while innovating along the way.</p>\r\n\r\n<p>The continent holds nine of the world&#39;s top 20 busiest airports by total passenger numbers (including both domestic and international flights), according to the<a href=\"https://edition.cnn.com/travel/article/worlds-busiest-passenger-airports-preliminary-2016/index.html\" target=\"_blank\">&nbsp;latest&nbsp;</a><a href=\"https://cnn.com/travel/article/worlds-busiest-airports-2018-preliminary/index.html\" target=\"_blank\">report by Airports Council International&nbsp;</a>highlighting preliminary 2018 figures.</p>', 'ZS0A_http___cdn.cnn.com_cnnnext_dam_assets_181017165103-beijing-daxing-terminal.jpg', 1, 1, 1, NULL, 1, '2019-05-11 07:28:24', '2019-05-11 00:28:24'),
(60, 'This Week in Celebrity Homes: Sandra Bullock, Alex Rodriguez.', '<p>Hong Kong, London and New York&mdash;three bastions of wealth&mdash;collectively recorded 124 home sales above $25 million in the year to August, totaling US$5.5 billion, according to new data published Monday.</p>', 'yS12_im-63608.jpg', 0, 1, 1, NULL, 1, '2019-05-11 07:28:19', '2019-05-11 00:28:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Travels', '2019-05-08 20:37:11', '0000-00-00 00:00:00'),
(2, 'Tech', '2019-04-27 08:15:04', '0000-00-00 00:00:00'),
(3, 'Sports', '2019-04-27 08:15:04', '2019-04-21 11:31:10'),
(4, 'Politic', '2019-04-27 08:15:04', '0000-00-00 00:00:00'),
(5, 'Health', '2019-04-27 08:15:04', '0000-00-00 00:00:00'),
(6, 'Media', '2019-05-09 03:30:31', '0000-00-00 00:00:00'),
(7, 'Business', '2019-04-27 08:15:04', '0000-00-00 00:00:00'),
(8, 'World', '2019-04-27 08:15:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `head` varchar(50) NOT NULL,
  `body` varchar(255) NOT NULL,
  `tail` text,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Author'),
(2, 'Reviewer'),
(1000, 'Normal User'),
(1001, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initals` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1000',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `middle_name`, `last_name`, `affiliation`, `gender`, `initals`, `role_id`, `phone`, `country`, `image`, `fax`, `email`, `email_verified_at`, `password`, `remember_token`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blackkat', 'Nam', 'Hoàng', 'Tống', 'Student - Intern', NULL, NULL, 1001, NULL, NULL, 'users_avatar/L4pNl9M93M73dRg9vKKbJ7SCKFGDF5VfnPsa3w1F.jpeg', NULL, 'nam.th.vnist@gmail.com', NULL, '$2y$10$j95tSQs9pEzdvOk8pGu57.1TnCuFTwS3z5IDkRPrg3g5qTymCAv82', 'u3klO0keDFuD6ICcyg9Rh1VE6T5vVn6fJZWiFQ1Bw0ug1JQQlTamMrVXMnF7', '2019-05-09 07:29:17', '2019-04-09 23:56:02', '2019-05-09 07:29:17', NULL),
(2, 'meo_den_98', 'Tony', NULL, 'McKiller', 'Student', 'Male', NULL, 1, NULL, NULL, 'avatar_default/user_default.jpg', NULL, 'nam.th.200698@gmail.com', NULL, '$2y$10$av56CCaqWZxFG93abTJ8puFYDbesVnX8f9WKFtZDWg7dcGTI.cb/y', NULL, NULL, '2019-04-18 01:37:45', '2019-04-26 02:25:51', NULL),
(3, 'tammao', 'Trang', 'Huyen', 'Tang', 'Hihi', 'Female', 'Student', 1000, '0373139222', 'Viet Nam', 'avatar_default/user_default.jpg', '0968319013', 'tanghuyentrangit1998@gmail.com', NULL, '$2y$10$i4flWWIczktKKYaoDCy8qe.vjkF6P6hnYHmhuuf3PBIRveMAOCTl2', NULL, NULL, '2019-04-26 01:03:07', '2019-04-26 01:03:07', NULL),
(4, 'babykute', 'Tam', NULL, 'Mao', 'Hihi', 'Female', 'Student', 1000, '0968319013', 'Viet Nam', 'avatar_default/user_default.jpg', '0968319013', 'haha@gmail.com', NULL, '$2y$10$8aSp6/tv1MGOHy8XCTyhReD1fJUqrnISLotot2DS.nrvqftsDwyy6', NULL, NULL, '2019-04-26 01:38:13', '2019-04-26 01:38:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);



--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
