-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 10:36 AM
-- Server version: 8.0.13
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_cvecara`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(255) UNSIGNED NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `action`) VALUES
(1, 'Registracija'),
(2, 'Logovanje'),
(3, 'Kreiranje porudzbine'),
(4, 'Dodavanje u korpu');

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `id` int(10) UNSIGNED NOT NULL,
  `postalcode` int(11) NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_city` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`id`, `postalcode`, `adress`, `id_city`) VALUES
(1, 60254, '923 Mohr Key Apt. 997\nJaceside, ID 03645', 5),
(2, 13146, '72929 Oren Heights\nMaceymouth, NV 00985', 14),
(3, 97121, '7038 Farrell Point\nWest Julienhaven, NE 04011-7696', 8),
(4, 69049, '5906 Dare Vista Suite 925\nRessiemouth, WI 98802-3740', 7),
(5, 65441, '87031 Metz Pass\nKossside, ND 92980', 12),
(6, 28326, '179 Gustave Lock\nAngelicabury, WI 27156-9073', 7),
(7, 55856, '183 Bahringer Tunnel Apt. 974\nWest Westonmouth, GA 46554-6058', 14),
(8, 57772, '877 Martin Ridges Suite 343\nRubenshire, UT 02936-2855', 4),
(9, 47413, '713 Paucek Bypass Suite 291\nCortezville, CO 46376-4337', 1),
(10, 80355, '4516 Nienow Islands\nAraceliborough, DC 32254-2211', 19),
(11, 61274, '44920 Chelsie Oval Suite 873\nEast Carley, MI 12520', 12),
(12, 55766, '142 Denesik Stravenue\nLake Flavieton, NC 50673', 10),
(13, 18366, '984 Rau Flats Suite 263\nNorth Celiachester, MD 55820-9490', 17),
(14, 75555, '787 D\'Amore Terrace Suite 514\nHermanport, UT 96904-8832', 20),
(15, 60227, '8118 Dameon Ranch\nJonesberg, TX 01376-6293', 2),
(16, 22640, '5946 Claude Motorway\nOsinskihaven, AZ 27883-7960', 8),
(17, 24929, '598 Kiehn Unions Suite 491\nCristmouth, MT 09036', 2),
(18, 91940, '5941 Walsh Ferry Apt. 825\nLake Maximilliafort, KS 61460-2612', 3),
(19, 35965, '1191 Lang Fields\nLake Wayne, MS 36422-0578', 19),
(20, 27350, '34259 Davis Mills\nDeclanfurt, AK 10695', 12),
(30, 11, 'Milana Rakica 54', 12),
(31, 16546, 'Knea 85', 4),
(32, 11, 'Milana Rakica 54', 18),
(56, 11, 'Milana Rakica 54', 12),
(57, 11256, 'Milana Rakica 88', 7),
(59, 11256, 'Milana Rakica 88', 10),
(60, 11586, 'Dzordza Klemensona 10', 19),
(61, 11000, 'Pozeksa 160', 6);

-- --------------------------------------------------------

--
-- Table structure for table `best_seller`
--

CREATE TABLE `best_seller` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Gleichner, Harris and Aufderhar'),
(2, 'Kiehn-Nolan'),
(3, 'Herzog Group'),
(4, 'Nikolaus-Moore'),
(5, 'Howell and Sons'),
(6, 'Jaskolski, Ward and Fay'),
(7, 'Casper-Rath'),
(8, 'Beahan, Donnelly and Wisoky'),
(9, 'Reichel LLC'),
(10, 'Wyman-Howell'),
(11, 'Hermann Ltd'),
(12, 'Stiedemann, Romaguera and Ward'),
(13, 'Schmitt-O\'Conner'),
(14, 'Kshlerin-Witting'),
(15, 'Stamm-Schuster'),
(16, 'Kassulke, Will and O\'Keefe'),
(17, 'Kozey-Rodriguez'),
(18, 'Boehm PLC'),
(19, 'McCullough LLC'),
(20, 'Yundt, Connelly and Schultz');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_status_cart` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `created_at`, `updated_at`, `deleted_at`, `id_status_cart`) VALUES
(1224, NULL, '2023-01-23 17:35:48', '2023-01-23 17:38:07', NULL, 2),
(1225, NULL, '2023-01-23 17:39:59', '2023-01-23 17:40:00', NULL, 2),
(1226, NULL, '2023-01-23 17:41:17', '2023-01-23 17:41:18', NULL, 2),
(1227, 24, '2023-01-23 17:52:25', '2023-01-23 17:55:27', NULL, 2),
(1229, NULL, '2023-01-23 21:41:15', '2023-01-23 21:41:15', NULL, 1),
(1230, NULL, '2023-01-23 21:45:49', '2023-01-23 21:45:49', NULL, 1),
(1231, NULL, '2023-01-23 21:50:08', '2023-01-23 21:50:08', NULL, 1),
(1232, NULL, '2023-01-23 21:57:26', '2023-01-23 21:57:39', NULL, 2),
(1233, NULL, '2023-01-23 22:10:16', '2023-01-23 22:11:11', NULL, 2),
(1234, 24, '2023-01-23 22:30:21', '2023-01-23 22:33:44', NULL, 2),
(1235, 24, '2023-01-23 22:33:57', '2023-01-23 22:37:33', NULL, 2),
(1236, 24, '2023-01-23 22:37:45', '2023-01-23 22:58:17', NULL, 2),
(1237, 24, '2023-01-23 22:58:45', '2023-01-24 16:51:41', NULL, 2),
(1238, NULL, '2023-01-24 16:47:37', '2023-01-24 16:47:38', NULL, 2),
(1239, 24, '2023-01-24 16:51:51', '2023-01-24 16:52:16', NULL, 2),
(1240, NULL, '2023-01-25 19:06:09', '2023-01-25 19:06:11', NULL, 2),
(1241, NULL, '2023-01-27 13:02:59', '2023-01-27 13:10:39', NULL, 2),
(1242, 24, '2023-01-27 13:15:02', '2023-01-27 13:17:53', NULL, 2),
(1243, 24, '2023-01-27 13:20:46', '2023-01-27 13:21:20', NULL, 2),
(1244, 24, '2023-01-27 13:23:01', '2023-01-27 13:23:14', NULL, 2),
(1245, 24, '2023-01-27 13:26:32', '2023-01-27 13:26:51', NULL, 2),
(1246, NULL, '2023-01-27 23:55:56', '2023-01-27 23:55:57', NULL, 2),
(1247, 24, '2023-01-29 13:14:43', '2023-01-29 13:14:43', NULL, 1),
(1248, 49, '2023-01-29 22:38:21', '2023-01-29 22:44:18', NULL, 2),
(1249, NULL, '2023-01-29 22:49:49', '2023-01-29 22:49:50', NULL, 2),
(1250, NULL, '2023-01-29 22:51:51', '2023-01-29 22:54:28', NULL, 2),
(1251, NULL, '2023-01-30 21:54:59', '2023-01-30 21:55:01', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `id_parent`) VALUES
(1, 'Buketi', NULL),
(2, 'Rezano cvece', NULL),
(3, 'Saksijsko cvece', NULL),
(4, 'Sahrane i pomeni', NULL),
(5, 'Lale', 1),
(6, 'Ljiljani', 1),
(7, 'Ruze', 1),
(8, 'Kale', 2),
(9, 'Hortenzije', 2),
(10, 'Ljubicice', 3),
(11, 'Amarilis', 2),
(12, 'Fikusi', 3),
(13, 'Orhideje', 3),
(14, 'Zumbuli', 3),
(15, 'Suze', 4),
(16, 'Venci', 4);

-- --------------------------------------------------------

--
-- Table structure for table `chart_status`
--

CREATE TABLE `chart_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(12, 'Columbusland'),
(7, 'Danielberg'),
(3, 'Hollieview'),
(6, 'Lake Chandler'),
(8, 'Lake Sophiaview'),
(15, 'Lake Wilfrid'),
(19, 'New Stephania'),
(17, 'North Alexa'),
(20, 'North Archibaldland'),
(11, 'North Draketon'),
(2, 'Port Owenside'),
(5, 'Rodolfofort'),
(4, 'Satterfieldville'),
(1, 'South Carolanne'),
(13, 'South Nedraside'),
(18, 'Talonport'),
(9, 'Thompsonborough'),
(16, 'Torphychester'),
(14, 'Wendymouth'),
(10, 'West Bertaburgh');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'red'),
(3, 'rose'),
(2, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `cupon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `offer` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`id`, `cupon`, `status`, `created_at`, `updated_at`, `deleted_at`, `offer`) VALUES
(1, '374321995245dolores', 1, NULL, NULL, NULL, 0),
(2, '859672431663ratione', 0, NULL, NULL, NULL, 0),
(3, '406923788921voluptas', 1, NULL, NULL, NULL, 0),
(4, '967253097533cumque', 1, NULL, NULL, NULL, 0),
(5, '940452789033doloribus', 1, NULL, NULL, NULL, 0),
(6, '992873259050consequuntur', 1, NULL, NULL, NULL, 0),
(7, '965516541426velit', 1, NULL, NULL, NULL, 0),
(8, '634255190239id', 1, NULL, NULL, NULL, 0),
(9, '379326955391architecto', 0, NULL, NULL, NULL, 0),
(10, '408984528570beatae', 1, NULL, NULL, NULL, 0),
(11, '386037420460voluptatem', 0, NULL, NULL, NULL, 0),
(12, '317895592153culpa', 1, NULL, NULL, NULL, 0),
(13, '963527607720molestiae', 0, NULL, NULL, NULL, 0),
(14, '687256327819velit', 1, NULL, NULL, NULL, 0),
(15, '466896606259ipsum', 0, NULL, NULL, NULL, 0),
(16, '539778492769ut', 0, NULL, NULL, NULL, 0),
(17, '379842262693reiciendis', 0, NULL, NULL, NULL, 0),
(18, '173150665323id', 1, NULL, NULL, NULL, 0),
(19, '725733252082quaerat', 1, NULL, NULL, NULL, 0),
(20, '996775409338pariatur', 0, NULL, NULL, NULL, 0),
(21, 'Marko Dasic', 2, NULL, '2023-01-23 22:37:33', NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_size`
--

CREATE TABLE `global_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_size`
--

INSERT INTO `global_size` (`id`, `size`) VALUES
(1, 'E'),
(2, 'I'),
(3, 'D'),
(4, 'A'),
(5, 'V'),
(6, 'A'),
(7, 'Q'),
(8, 'N'),
(9, 'Q'),
(10, 'I'),
(11, 'U'),
(12, 'S'),
(13, 'V'),
(14, 'V'),
(15, 'D'),
(16, 'D'),
(17, 'E'),
(18, 'N'),
(19, 'S'),
(20, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cart` int(255) UNSIGNED NOT NULL,
  `id_invoice_status` int(255) UNSIGNED NOT NULL DEFAULT '1',
  `id_cupon` int(255) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_adress` int(255) UNSIGNED DEFAULT NULL,
  `serial_number` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_cart`, `id_invoice_status`, `id_cupon`, `first_name`, `last_name`, `email`, `phone`, `id_adress`, `serial_number`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1224, 1, NULL, 'Marko', 'Dasic', 'markodasic70@gmail.com', '+381611357235', NULL, '1.5450505196278E+27', 0, '2023-01-23 17:36:40', '2023-01-23 17:36:40', NULL),
(2, 1224, 1, NULL, 'Marko', 'Dasic', 'markodasic70@gmail.com', '+381611357235', NULL, '-8.545816066323E+26', 0, '2023-01-23 17:37:10', '2023-01-23 17:37:10', NULL),
(3, 1224, 1, NULL, 'Marko', 'Dasic', 'markodasic70@gmail.com', '+381611357235', NULL, '-2.0234248484818E+27', 0, '2023-01-23 17:38:07', '2023-01-23 17:38:07', NULL),
(4, 1225, 1, NULL, 'Marko', 'Dasicsssad', 'markodasic70@gmail.com', '+381611357235', NULL, '1674499200-904688458-1674499200', 0, '2023-01-23 17:40:00', '2023-01-23 17:40:00', NULL),
(5, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499278-380723583-1674499278', 0, '2023-01-23 17:41:18', '2023-01-23 17:41:18', '2023-01-27 18:50:16'),
(6, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499301-1546197435-1674499301', 0, '2023-01-23 17:41:41', '2023-01-23 17:41:41', NULL),
(7, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499339-1500547895-1674499339', 0, '2023-01-23 17:42:19', '2023-01-23 17:42:19', NULL),
(8, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499351-888638246-1674499351', 0, '2023-01-23 17:42:31', '2023-01-23 17:42:31', NULL),
(9, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499473-210972429-1674499473', 0, '2023-01-23 17:44:33', '2023-01-23 17:44:33', NULL),
(10, 1226, 1, NULL, 'Marko', 'Dasic', 'm-crap@crappysoft.com', '+38161357235', NULL, '1674499562-1581218195-1674499562', 0, '2023-01-23 17:46:02', '2023-01-23 17:46:02', NULL),
(11, 1227, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674500127-1354590653-1674500127', 0, '2023-01-23 17:55:27', '2023-01-23 17:55:27', NULL),
(12, 1232, 1, NULL, 'Mukamed', 'Ali', 'as.sls@mail.com', '+38060416486', 31, '1674514659-1675360053-3308507150012213691', 0, '2023-01-23 21:57:39', '2023-01-23 21:57:39', NULL),
(13, 1233, 1, NULL, 'Boban', 'Dasic', 'markodasic70@gmail.com', '+381611357235', NULL, '1674515471-350392884-3538046571130505684', 0, '2023-01-23 22:11:11', '2023-01-23 22:11:11', NULL),
(14, 1227, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674516023-234267736-2359788042826828987', 0, '2023-01-23 22:20:23', '2023-01-23 22:20:23', NULL),
(15, 1227, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674516346-1236868340-2304890130993263268', 0, '2023-01-23 22:25:46', '2023-01-23 22:25:46', NULL),
(16, 1234, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674516824-991519743-2530841527363003480', 0, '2023-01-23 22:33:44', '2023-01-23 22:33:44', NULL),
(17, 1235, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674517053-1214745985-173061607024795533', 0, '2023-01-23 22:37:33', '2023-01-23 22:37:33', NULL),
(18, 1236, 3, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674518296-2014914428-2285400419071317064', 0, '2023-01-23 22:58:16', '2023-01-29 13:15:32', '2023-01-29 13:15:32'),
(20, 1238, 3, NULL, 'Marko', 'Dasic', 'markodasic70@gmail.com', '+381611357235', NULL, '1674582458-1571529640-2843504508827059986', 0, '2023-01-24 16:47:38', '2023-01-29 13:15:53', '2023-01-29 13:15:53'),
(21, 1237, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674582701-2017271528-104766312998307939', 0, '2023-01-24 16:51:41', '2023-01-27 23:06:15', '2023-01-27 23:06:15'),
(22, 1239, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', 32, '1674582736-920098660-205777341749700416', 0, '2023-01-24 16:52:16', '2023-01-27 23:05:49', '2023-01-27 23:05:49'),
(23, 1240, 3, NULL, 'Zarko', 'Zarkovic', 'as.sls@mail.com', '+3816123589636', NULL, '1674677171-984097366-2084987006185031207', 0, '2023-01-25 19:06:11', '2023-01-27 23:06:28', '2023-01-27 23:06:28'),
(24, 1241, 3, NULL, 'proba Za sumu', 'proba za sumu prezime', 'markodasic70@gmail.com', '+381611357235', NULL, '1674828639-1243642254-769146202264418055', 12534.75, '2023-01-27 13:10:39', '2023-01-28 22:52:26', '2023-01-28 22:52:26'),
(25, 1242, 3, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674829073-1694515085-992081782370071694', 18357.75, '2023-01-27 13:17:53', '2023-01-28 22:52:15', '2023-01-28 22:52:15'),
(26, 1243, 3, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674829280-1823395251-399108203142413760', 18100.5, '2023-01-27 13:21:20', '2023-01-27 23:03:11', '2023-01-27 23:03:11'),
(27, 1244, 3, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674829394-651650097-965149208511830132', 6969, '2023-01-27 13:23:14', '2023-01-27 23:03:20', '2023-01-27 23:03:20'),
(28, 1245, 1, NULL, 'Marko', 'Dasic', 'markodasic700@gmail.com', '+381611357235', NULL, '1674829611-1752202748-3267668300156690976', 44064, '2023-01-27 13:26:51', '2023-01-27 13:26:51', '2023-01-27 18:57:10'),
(29, 1246, 3, NULL, 'Nikola', 'Dasic', 'nikoladasic96@gmail.com', '+3816135828438', NULL, '1674867357-1655606713-484287656770517949', 49478.2875, '2023-01-27 23:55:57', '2023-01-27 23:57:20', '2023-01-27 23:57:20'),
(30, 1248, 2, NULL, 'Admin', 'Administrator', 'admin@gmail.com', '+381613254894', 59, '1675035858-774430435-1876695223933131492', 16663.7825, '2023-01-29 22:44:18', '2023-01-29 22:44:58', NULL),
(31, 1249, 1, NULL, 'Mika', 'Mikic', 'as.sls@mail.com', '+3816465468748', NULL, '1675036190-567141036-3040953313751981290', 12744.9, '2023-01-29 22:49:50', '2023-01-29 22:49:50', NULL),
(32, 1250, 1, 21, 'Nikira', 'Sansiro', 'nikita@mail.com', '+381654846468', NULL, '1675036468-514273541-3177156294951178176', 14342.475, '2023-01-29 22:54:28', '2023-01-29 22:54:28', NULL),
(33, 1251, 2, 21, 'Carls', 'Bukovski', 'carls@hotmail.com', '+3811623596548', 60, '1675119301-422321955-577150061458999961', 31874.3625, '2023-01-30 21:55:01', '2023-01-30 21:55:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE `invoice_status` (
  `id` int(255) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`id`, `status`) VALUES
(1, 'Nije poslato'),
(2, 'Poslato / Na cekanju'),
(3, 'Isporuceno');

-- --------------------------------------------------------

--
-- Table structure for table `log_action`
--

CREATE TABLE `log_action` (
  `id` int(10) UNSIGNED NOT NULL,
  `operation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(90, '2022_11_28_210504_product_size', 1),
(236, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(237, '2021_12_05_171358_size', 2),
(238, '2021_12_05_171509_size_product', 2),
(239, '2021_12_05_174500_images', 2),
(240, '2021_12_05_192135_color', 2),
(241, '2021_12_05_192250_color_product', 2),
(242, '2022_11_28_204049_city', 2),
(243, '2022_11_28_205030_brand', 2),
(244, '2022_11_28_205149_category', 2),
(245, '2022_11_28_210435_global_size', 2),
(246, '2022_11_28_210729_adress', 2),
(247, '2022_11_28_210751_favorite', 2),
(248, '2022_11_28_211053_price', 2),
(249, '2022_11_28_211326_offer', 2),
(250, '2022_11_28_211410_product_offer', 2),
(251, '2022_11_28_211433_chart', 2),
(252, '2022_11_28_211454_invoice', 2),
(253, '2022_11_28_211514_chart_status', 2),
(254, '2022_11_28_211539_product_chart', 2),
(255, '2022_11_28_211611_product', 2),
(256, '2022_11_28_211633_best_seller', 2),
(257, '2022_11_28_211655_statistic', 2),
(258, '2022_11_28_211755_log_action', 2),
(259, '2022_11_28_211814_user', 2),
(260, '2022_11_28_211833_cupon', 2),
(261, '2022_11_28_211851_role', 2),
(262, '2022_11_28_223406_foregins_dependecy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `offer`, `amount`, `date_start`, `date_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'modi', 21, '2022-10-25', '2023-01-25', NULL, NULL, NULL),
(2, 'iste', 35, '2022-11-27', '2023-01-25', NULL, NULL, NULL),
(3, 'labore', 26, '2022-08-14', '2023-03-07', NULL, NULL, NULL),
(4, 'aspernatur', 20, '2022-10-28', '2023-02-02', NULL, NULL, NULL),
(5, 'veniam', 4, '2022-11-03', '2023-01-04', NULL, NULL, NULL),
(6, 'et', 47, '2022-08-22', '2023-03-02', NULL, NULL, NULL),
(7, 'quos', 13, '2022-11-03', '2023-01-30', NULL, NULL, NULL),
(8, 'aliquid', 45, '2022-09-03', '2023-01-07', NULL, NULL, NULL),
(9, 'nostrum', 3, '2022-09-28', '2023-02-14', NULL, NULL, NULL),
(10, 'aut', 48, '2022-11-12', '2023-01-10', NULL, NULL, NULL),
(11, 'id', 22, '2022-11-10', '2023-02-23', NULL, NULL, NULL),
(12, 'veritatis', 15, '2022-11-01', '2023-03-23', NULL, NULL, NULL),
(13, 'consequatur', 9, '2022-10-20', '2023-02-06', NULL, NULL, NULL),
(14, 'quibusdam', 44, '2022-11-15', '2023-02-21', NULL, NULL, NULL),
(15, 'qui', 49, '2022-11-20', '2022-12-15', NULL, NULL, NULL),
(16, 'odio', 25, '2022-09-01', '2023-01-04', NULL, NULL, NULL),
(17, 'dolor', 7, '2022-09-02', '2023-01-21', NULL, NULL, NULL),
(18, 'suscipit', 32, '2022-10-25', '2022-12-22', NULL, NULL, NULL),
(19, 'quisquam', 42, '2022-11-13', '2023-01-25', NULL, NULL, NULL),
(20, 'sed', 33, '2022-08-14', '2023-03-02', NULL, NULL, NULL),
(23, 'Zimsko snizenje', 25, '2023-01-24', '2025-04-01', NULL, NULL, NULL),
(24, 'Slaba prodaja popust', 15, '2023-01-01', '2024-01-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price`, `id_product`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20962.00', 11, '2022-12-31 23:00:00', '2023-01-29 21:55:13', '2023-01-29 21:55:13'),
(2, '20515.00', 13, '2022-12-31 23:00:00', '2023-01-29 21:57:21', '2023-01-29 21:57:21'),
(3, '17584.00', 18, '2022-12-31 23:00:00', '2023-01-29 22:02:29', '2023-01-29 22:02:29'),
(4, '8593.00', 15, '2022-12-31 23:00:00', NULL, NULL),
(5, '4646.00', 6, '2022-12-31 23:00:00', '2023-01-29 19:48:08', '2023-01-29 19:48:08'),
(7, '15163.00', 4, '2022-12-31 23:00:00', '2023-01-29 19:41:57', '2023-01-29 19:41:57'),
(8, '2947.00', 14, '2022-12-31 23:00:00', '2023-01-28 23:09:10', '2023-01-28 23:09:10'),
(9, '8833.00', 11, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(10, '16345.00', 12, '2022-12-31 23:00:00', '2023-01-29 21:56:04', '2023-01-29 21:56:04'),
(11, '23838.00', 19, '2022-12-31 23:00:00', '2023-01-29 22:06:33', '2023-01-29 22:06:33'),
(12, '10174.00', 7, '2022-12-31 23:00:00', '2023-01-29 19:49:34', '2023-01-29 19:49:34'),
(13, '14123.00', 20, '2022-12-31 23:00:00', '2023-01-29 22:07:42', '2023-01-29 22:07:42'),
(14, '4186.00', 16, '2022-12-31 23:00:00', '2023-01-29 22:00:04', '2023-01-29 22:00:04'),
(15, '22486.00', 6, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(20, '8914.00', 1, '2022-12-31 23:00:00', '2023-01-29 19:08:22', '2023-01-29 19:08:22'),
(22, '14615.00', 17, '2022-12-31 23:00:00', '2023-01-29 22:01:36', '2023-01-29 22:01:36'),
(23, '18841.00', 7, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(24, '18647.00', 4, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(29, '13228.00', 6, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(30, '750.00', 12, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(31, '1151.00', 8, '2022-12-31 23:00:00', '2023-01-29 19:50:37', '2023-01-29 19:50:37'),
(34, '23326.00', 9, '2022-12-31 23:00:00', '2023-01-29 19:51:56', '2023-01-29 19:51:56'),
(36, '6123.00', 1, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(37, '6806.00', 1, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(38, '9634.00', 7, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(39, '1075.00', 2, '2022-12-31 23:00:00', '2023-01-29 19:32:30', '2023-01-29 19:32:30'),
(40, '12067.00', 5, '2022-12-31 23:00:00', '2023-01-29 19:43:15', '2023-01-29 19:43:15'),
(42, '17153.00', 7, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(43, '23120.00', 10, '2022-12-31 23:00:00', '2023-01-29 19:53:17', '2023-01-29 19:53:17'),
(44, '19643.00', 3, '2022-12-31 23:00:00', '2023-01-29 19:39:46', '2023-01-29 19:39:46'),
(45, '3197.00', 10, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(48, '15432.00', 6, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:31'),
(49, '11362.00', 2, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(51, '12212.00', 2, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(53, '2679.00', 4, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(55, '23235.00', 4, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(56, '13521.00', 1, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(57, '6016.00', 4, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(59, '20745.00', 7, '2022-12-31 23:00:00', NULL, '2022-09-01 14:04:14'),
(60, '300000.00', 14, '2023-01-28 23:09:10', '2023-01-29 21:58:27', '2023-01-29 21:58:27'),
(63, '100000.00', 24, '2023-01-29 00:46:28', '2023-01-29 18:58:38', '2023-01-29 18:58:38'),
(65, '10000.00', 29, '2023-01-29 00:51:07', '2023-01-29 18:56:40', '2023-01-29 18:56:40'),
(66, '1499.00', 29, '2023-01-29 18:56:40', '2023-01-29 18:56:40', NULL),
(67, '1499.00', 24, '2023-01-29 18:58:38', '2023-01-29 18:58:38', NULL),
(71, '1999.00', 1, '2023-01-29 19:08:22', '2023-01-29 19:30:53', '2023-01-29 19:30:53'),
(72, '2499.00', 1, '2023-01-29 19:30:53', '2023-01-29 19:30:53', NULL),
(73, '1899.00', 2, '2023-01-29 19:32:30', '2023-01-29 19:32:30', NULL),
(74, '1899.00', 3, '2023-01-29 19:39:46', '2023-01-29 19:39:46', NULL),
(75, '999.00', 4, '2023-01-29 19:41:57', '2023-01-29 19:41:57', NULL),
(76, '2499.00', 5, '2023-01-29 19:43:15', '2023-01-29 19:43:15', NULL),
(77, '19999.00', 6, '2023-01-29 19:48:09', '2023-01-29 19:48:09', NULL),
(78, '3499.00', 7, '2023-01-29 19:49:34', '2023-01-29 19:49:34', NULL),
(79, '1899.00', 8, '2023-01-29 19:50:37', '2023-01-29 19:50:37', NULL),
(80, '49999.00', 9, '2023-01-29 19:51:56', '2023-01-29 19:51:56', NULL),
(81, '16999.00', 10, '2023-01-29 19:53:17', '2023-01-29 19:53:17', NULL),
(82, '1999.00', 11, '2023-01-29 21:55:13', '2023-01-29 21:55:13', NULL),
(83, '199.00', 12, '2023-01-29 21:56:04', '2023-01-29 21:56:04', NULL),
(84, '3999.00', 13, '2023-01-29 21:57:21', '2023-01-29 21:57:21', NULL),
(85, '1999.00', 14, '2023-01-29 21:58:27', '2023-01-29 21:58:27', NULL),
(86, '299.00', 16, '2023-01-29 22:00:04', '2023-01-29 22:00:04', NULL),
(87, '899.00', 17, '2023-01-29 22:01:36', '2023-01-29 22:01:36', NULL),
(88, '1799.00', 18, '2023-01-29 22:02:29', '2023-01-29 22:02:29', NULL),
(89, '3899.00', 19, '2023-01-29 22:06:33', '2023-01-29 22:06:33', NULL),
(90, '4199.00', 20, '2023-01-29 22:07:42', '2023-01-29 22:07:42', NULL),
(91, '2099.00', 30, '2023-01-29 22:09:28', '2023-01-29 22:09:28', NULL),
(92, '1299.00', 31, '2023-01-29 22:09:53', '2023-01-29 22:09:53', NULL),
(93, '1099.00', 32, '2023-01-29 22:10:21', '2023-01-29 22:10:21', NULL),
(94, '2749.00', 33, '2023-01-29 22:10:55', '2023-01-29 22:10:55', NULL),
(95, '2849.00', 34, '2023-01-29 22:11:48', '2023-01-29 22:11:48', NULL),
(96, '999.00', 35, '2023-01-29 22:12:21', '2023-01-29 22:12:21', NULL),
(97, '1399.00', 36, '2023-01-29 22:12:43', '2023-01-29 22:12:43', NULL),
(98, '2999.00', 37, '2023-01-29 22:14:37', '2023-01-29 22:14:37', NULL),
(99, '1699.00', 38, '2023-01-29 22:15:09', '2023-01-29 22:15:09', NULL),
(100, '4899.00', 39, '2023-01-29 22:15:46', '2023-01-29 22:15:46', NULL),
(101, '2099.00', 40, '2023-01-29 22:16:22', '2023-01-29 22:16:22', NULL),
(102, '2099.00', 41, '2023-01-29 22:16:48', '2023-01-29 22:16:48', NULL),
(103, '3999.00', 42, '2023-01-29 22:17:15', '2023-01-29 22:17:15', NULL),
(104, '2899.00', 43, '2023-01-29 22:17:40', '2023-01-29 22:17:40', NULL),
(105, '2299.00', 44, '2023-01-29 22:18:18', '2023-01-29 22:18:18', NULL),
(106, '2499.00', 45, '2023-01-29 22:18:41', '2023-01-29 22:18:41', NULL),
(107, '6699.00', 46, '2023-01-29 22:19:12', '2023-01-29 22:19:12', NULL),
(108, '2399.00', 47, '2023-01-29 22:19:35', '2023-01-29 22:19:35', NULL),
(109, '3999.00', 48, '2023-01-29 22:19:57', '2023-01-29 22:19:57', NULL),
(110, '3899.00', 49, '2023-01-29 22:20:26', '2023-01-29 22:20:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `forced` tinyint(1) NOT NULL DEFAULT '0',
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `id_category`, `forced`, `src`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kraljevski buket od orijentalnih ljiljana', 6, 1, 'upload/16750291982070202345.png', '2023-01-27 23:00:00', '2023-01-29 20:53:18', NULL),
(2, 'Buket belih ljiljana', 6, 1, 'upload/1675029214399843821.png', '2023-01-27 23:00:00', '2023-01-29 20:53:34', NULL),
(3, 'Buket ruze sa mikla bonbonjerom', 7, 0, 'upload/16750292341450561219.png', '2023-01-27 23:00:00', '2023-01-29 20:53:54', NULL),
(4, 'Mini buket ruza', 7, 0, 'upload/16750292481438628533.png', '2023-01-27 23:00:00', '2023-01-29 20:54:08', NULL),
(5, 'Mini buket belih ruza', 7, 1, 'upload/1675029261862981428.png', '2023-01-27 23:00:00', '2023-01-29 20:54:21', NULL),
(6, 'Buket 101 ruza', 7, 1, 'upload/1675029392394287353.png', '2023-01-27 23:00:00', '2023-01-29 20:56:32', NULL),
(7, 'Buket 21 bela ruza', 7, 0, 'upload/16750347311741957413.jpg', '2023-01-27 23:00:00', '2023-01-29 22:25:31', NULL),
(8, 'Buket lala', 7, 0, 'upload/16750294221377351996.png', '2023-01-27 23:00:00', '2023-01-29 20:57:02', NULL),
(9, '201 ruza u obliku srca', 7, 1, 'upload/1675029440680955310.png', '2023-01-27 23:00:00', '2023-01-29 20:57:20', NULL),
(10, 'Buket 51 ekvadorska ruza', 7, 0, 'upload/1675029464688243456.png', '2023-01-27 23:00:00', '2023-01-29 20:57:44', NULL),
(11, 'Kale u saksiji 20 kom', 8, 1, 'upload/16750349312147348556.png', '2023-01-27 23:00:00', '2023-01-29 22:28:51', NULL),
(12, 'Kale komad', 8, 0, 'upload/167503293633693474.jpg', '2023-01-27 23:00:00', '2023-01-29 21:56:04', NULL),
(13, 'Kale u saksiji', 8, 0, 'upload/1675034985194304231.png', '2023-01-27 23:00:00', '2023-01-29 22:29:45', NULL),
(14, 'Hortenzije sareni saksija', 9, 0, 'upload/16750350171888341455.png', '2023-01-27 23:00:00', '2023-01-29 22:30:17', NULL),
(15, 'Hortenzije bele', 9, 0, 'upload/1675033128404824244.jpg', '2023-01-27 23:00:00', '2023-01-29 21:59:26', NULL),
(16, 'Hortenzije komad', 9, 1, 'upload/16750350681244288101.png', '2023-01-27 23:00:00', '2023-01-29 22:31:08', NULL),
(17, 'Ljubicice mala saksija', 10, 0, 'upload/16750332691440728623.jpg', '2023-01-27 23:00:00', '2023-01-29 22:01:36', NULL),
(18, 'Ljubicice dekorativna korpa', 10, 0, 'upload/1675033317636487087.jpg', '2023-01-27 23:00:00', '2023-01-29 22:02:29', NULL),
(19, 'Viola ljubicica', 10, 1, 'upload/16750335621426850116.jpg', '2023-01-27 23:00:00', '2023-01-29 22:06:33', NULL),
(20, 'Viola ljubicica u okrugloj saksiji', 10, 0, 'upload/1675035104817636267.png', '2023-01-27 23:00:00', '2023-01-29 22:31:44', NULL),
(24, 'Buket ljubicastih lala', 5, 1, 'upload/16750291811189810321.png', '2023-01-29 00:46:28', '2023-01-29 20:53:01', NULL),
(29, 'Buket zutih lala', 5, 1, 'upload/167502916577816583.png', '2023-01-29 00:51:07', '2023-01-29 20:52:45', NULL),
(30, 'Amarilis', 11, 1, 'upload/1675033768280204891.jpg', '2023-01-29 22:09:28', '2023-01-29 22:09:28', NULL),
(31, 'Amarilis za vazu', 11, 1, 'upload/1675033793465681121.jpg', '2023-01-29 22:09:53', '2023-01-29 22:09:53', NULL),
(32, 'Amarilis rznih boja', 11, 1, 'upload/1675033820622107972.jpg', '2023-01-29 22:10:20', '2023-01-29 22:10:20', NULL),
(33, 'Fikus Bendzamin', 12, 1, 'upload/16750351271110102016.png', '2023-01-29 22:10:55', '2023-01-29 22:32:07', NULL),
(34, 'FIkus Robusta', 12, 1, 'upload/16750339081407597675.jpg', '2023-01-29 22:11:48', '2023-01-29 22:11:48', NULL),
(35, 'Orhideja ljubicasta', 13, 1, 'upload/16750339411887093977.png', '2023-01-29 22:12:21', '2023-01-29 22:12:21', NULL),
(36, 'Orhideja bela', 13, 1, 'upload/16750351681867943031.png', '2023-01-29 22:12:43', '2023-01-29 22:32:48', NULL),
(37, 'Orhideja Cimbidijum', 13, 1, 'upload/16750340771653960471.jpg', '2023-01-29 22:14:37', '2023-01-29 22:14:37', NULL),
(38, 'Zumbuli rozi', 14, 1, 'upload/1675035244677691047.png', '2023-01-29 22:15:09', '2023-01-29 22:34:04', NULL),
(39, 'Zumbuli u dekorativnoji saksiji', 14, 1, 'upload/1675035262885339123.png', '2023-01-29 22:15:46', '2023-01-29 22:34:22', NULL),
(40, 'Zumbuli mesani', 14, 1, 'upload/1675035289421077001.png', '2023-01-29 22:16:22', '2023-01-29 22:34:49', NULL),
(41, 'Suza 001', 15, 1, 'upload/1675035307133697679.png', '2023-01-29 22:16:48', '2023-01-29 22:35:07', NULL),
(42, 'Venac 001', 16, 1, 'upload/1675035336761414983.png', '2023-01-29 22:17:15', '2023-01-29 22:35:36', NULL),
(43, 'Venac 003', 16, 1, 'upload/16750353531841298282.png', '2023-01-29 22:17:40', '2023-01-29 22:35:53', NULL),
(44, 'Suza 002', 16, 1, 'upload/1675035370730216495.png', '2023-01-29 22:18:18', '2023-01-29 22:36:10', NULL),
(45, 'Suza 003', 16, 1, 'upload/1675035385625918204.png', '2023-01-29 22:18:41', '2023-01-29 22:36:25', NULL),
(46, 'Venac 004', 16, 1, 'upload/16750354011471022313.png', '2023-01-29 22:19:12', '2023-01-29 22:36:41', NULL),
(47, 'Suza 004', 16, 1, 'upload/16750354231576371026.png', '2023-01-29 22:19:35', '2023-01-29 22:37:03', NULL),
(48, 'Venac 005', 16, 1, 'upload/16750354411221846945.png', '2023-01-29 22:19:57', '2023-01-29 22:37:21', NULL),
(49, 'Venac 006', 16, 1, 'upload/16750354561521793382.png', '2023-01-29 22:20:26', '2023-01-29 22:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cart` int(10) UNSIGNED NOT NULL,
  `id_product` int(255) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`id`, `id_cart`, `id_product`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1322, 1238, 13, 3, NULL, NULL, NULL),
(1323, 1238, 5, 1, NULL, NULL, NULL),
(1324, 1238, 14, 2, NULL, NULL, NULL),
(1325, 1238, 6, 1, NULL, NULL, NULL),
(1326, 1238, 15, 1, NULL, NULL, NULL),
(1327, 1238, 9, 1, NULL, NULL, NULL),
(1328, 1238, 19, 1, NULL, NULL, NULL),
(1329, 1237, 2, 1, NULL, NULL, NULL),
(1333, 1237, 6, 1, NULL, NULL, NULL),
(1335, 1237, 1, 1, NULL, NULL, NULL),
(1336, 1237, 7, 1, NULL, NULL, NULL),
(1337, 1237, 5, 1, NULL, NULL, NULL),
(1340, 1240, 6, 1, NULL, NULL, NULL),
(1341, 1240, 5, 1, NULL, NULL, NULL),
(1342, 1240, 8, 7, NULL, NULL, NULL),
(1343, 1241, 5, 2, NULL, NULL, NULL),
(1344, 1241, 6, 3, NULL, NULL, NULL),
(1347, 1243, 5, 2, NULL, NULL, NULL),
(1348, 1244, 6, 2, NULL, NULL, NULL),
(1349, 1245, 5, 1, NULL, NULL, NULL),
(1350, 1245, 6, 1, NULL, NULL, NULL),
(1353, 1246, 6, 10, NULL, NULL, NULL),
(1354, 1246, 8, 10, NULL, NULL, NULL),
(1355, 1246, 3, 1, NULL, NULL, NULL),
(1425, 1248, 48, 1, NULL, NULL, NULL),
(1426, 1248, 49, 1, NULL, NULL, NULL),
(1427, 1248, 47, 1, NULL, NULL, NULL),
(1428, 1248, 44, 1, NULL, NULL, NULL),
(1429, 1248, 45, 1, NULL, NULL, NULL),
(1430, 1248, 46, 1, NULL, NULL, NULL),
(1431, 1249, 5, 8, NULL, NULL, NULL),
(1432, 1250, 6, 1, NULL, NULL, NULL),
(1433, 1250, 5, 1, NULL, NULL, NULL),
(1434, 1251, 9, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(255) UNSIGNED NOT NULL,
  `id_product` int(255) UNSIGNED NOT NULL,
  `id_color` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `id_product`, `id_color`, `created_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color_size`
--

CREATE TABLE `product_color_size` (
  `id` int(255) UNSIGNED NOT NULL,
  `id_product` int(255) UNSIGNED NOT NULL,
  `id_product_size` int(255) UNSIGNED NOT NULL,
  `id_product_color` int(255) UNSIGNED NOT NULL,
  `lager` int(11) NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color_size`
--

INSERT INTO `product_color_size` (`id`, `id_product`, `id_product_size`, `id_product_color`, `lager`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 1, 1, 1, 5, NULL, NULL, NULL),
(18, 2, 3, 4, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_offer`
--

CREATE TABLE `product_offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL,
  `id_offer` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_offer`
--

INSERT INTO `product_offer` (`id`, `id_product`, `id_offer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 23, '2023-01-24 13:27:45', '2023-01-28 22:55:33', '2023-01-28 22:55:33'),
(2, 2, 23, '2023-01-24 13:28:09', '2023-01-29 19:31:20', '2023-01-29 19:31:20'),
(3, 3, 23, '2023-01-24 13:28:21', '2023-01-29 19:39:46', '2023-01-29 19:39:46'),
(4, 5, 23, '2023-01-24 13:28:39', '2023-01-29 19:43:15', '2023-01-29 19:43:15'),
(5, 5, 20, '2023-01-24 13:29:22', '2023-01-29 19:44:06', '2023-01-29 19:44:06'),
(6, 6, 23, '2023-01-24 13:27:45', NULL, '2023-01-27 23:21:29'),
(7, 8, 23, '2023-01-24 13:27:45', '2023-01-29 19:50:37', '2023-01-29 19:50:37'),
(8, 9, 23, '2023-01-24 13:27:45', '2023-01-29 19:51:56', '2023-01-29 19:51:56'),
(9, 1, 23, '2023-01-28 22:55:33', '2023-01-28 22:55:38', '2023-01-28 22:55:38'),
(10, 1, 23, '2023-01-28 22:55:38', '2023-01-28 22:55:50', '2023-01-28 22:55:50'),
(11, 1, 23, '2023-01-28 22:55:50', '2023-01-28 23:49:09', '2023-01-28 23:49:09'),
(12, 1, 23, '2023-01-28 23:49:09', '2023-01-28 23:50:02', '2023-01-28 23:50:02'),
(13, 1, 23, '2023-01-28 23:50:02', '2023-01-28 23:51:54', '2023-01-28 23:51:54'),
(14, 1, 23, '2023-01-28 23:51:54', '2023-01-28 23:53:05', '2023-01-28 23:53:05'),
(15, 1, 23, '2023-01-28 23:53:05', '2023-01-28 23:54:09', '2023-01-28 23:54:09'),
(16, 1, 23, '2023-01-28 23:54:09', '2023-01-29 19:08:22', '2023-01-29 19:08:22'),
(19, 24, 23, '2023-01-29 00:46:28', '2023-01-29 18:58:38', '2023-01-29 18:58:38'),
(21, 29, 23, '2023-01-29 00:51:07', '2023-01-29 18:56:40', '2023-01-29 18:56:40'),
(22, 29, 23, '2023-01-29 18:56:40', '2023-01-29 18:57:54', '2023-01-29 18:57:54'),
(23, 29, 23, '2023-01-29 18:57:54', '2023-01-29 18:57:54', NULL),
(24, 24, 23, '2023-01-29 18:58:38', '2023-01-29 19:59:39', '2023-01-29 19:59:39'),
(28, 2, 23, '2023-01-29 19:31:20', '2023-01-29 19:31:32', '2023-01-29 19:31:32'),
(29, 2, 23, '2023-01-29 19:31:32', '2023-01-29 19:32:30', '2023-01-29 19:32:30'),
(30, 8, 23, '2023-01-29 19:50:37', '2023-01-29 20:57:02', '2023-01-29 20:57:02'),
(31, 9, 23, '2023-01-29 19:51:56', '2023-01-29 20:57:20', '2023-01-29 20:57:20'),
(32, 24, 23, '2023-01-29 19:59:39', '2023-01-29 20:53:01', '2023-01-29 20:53:01'),
(33, 24, 23, '2023-01-29 20:53:01', '2023-01-29 20:53:01', NULL),
(34, 8, 23, '2023-01-29 20:57:02', '2023-01-29 20:57:02', NULL),
(35, 9, 23, '2023-01-29 20:57:20', '2023-01-29 20:57:20', NULL),
(36, 33, 23, '2023-01-29 22:10:55', '2023-01-29 22:32:07', '2023-01-29 22:32:07'),
(37, 34, 23, '2023-01-29 22:11:48', '2023-01-29 22:11:48', NULL),
(38, 37, 23, '2023-01-29 22:14:37', '2023-01-29 22:14:37', NULL),
(39, 38, 24, '2023-01-29 22:15:09', '2023-01-29 22:34:04', '2023-01-29 22:34:04'),
(40, 39, 24, '2023-01-29 22:15:46', '2023-01-29 22:34:22', '2023-01-29 22:34:22'),
(41, 40, 24, '2023-01-29 22:16:22', '2023-01-29 22:34:49', '2023-01-29 22:34:49'),
(42, 42, 24, '2023-01-29 22:17:15', '2023-01-29 22:35:36', '2023-01-29 22:35:36'),
(43, 43, 24, '2023-01-29 22:17:40', '2023-01-29 22:35:53', '2023-01-29 22:35:53'),
(44, 46, 24, '2023-01-29 22:19:12', '2023-01-29 22:36:41', '2023-01-29 22:36:41'),
(45, 48, 24, '2023-01-29 22:19:57', '2023-01-29 22:37:21', '2023-01-29 22:37:21'),
(46, 49, 24, '2023-01-29 22:20:26', '2023-01-29 22:37:36', '2023-01-29 22:37:36'),
(47, 33, 23, '2023-01-29 22:32:07', '2023-01-29 22:32:07', NULL),
(48, 38, 24, '2023-01-29 22:34:04', '2023-01-29 22:34:04', NULL),
(49, 39, 24, '2023-01-29 22:34:22', '2023-01-29 22:34:22', NULL),
(50, 40, 24, '2023-01-29 22:34:49', '2023-01-29 22:34:49', NULL),
(51, 42, 24, '2023-01-29 22:35:36', '2023-01-29 22:35:36', NULL),
(52, 43, 24, '2023-01-29 22:35:53', '2023-01-29 22:35:53', NULL),
(53, 46, 24, '2023-01-29 22:36:41', '2023-01-29 22:36:41', NULL),
(54, 48, 24, '2023-01-29 22:37:21', '2023-01-29 22:37:21', NULL),
(55, 49, 24, '2023-01-29 22:37:36', '2023-01-29 22:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(255) UNSIGNED NOT NULL,
  `id_product` int(255) UNSIGNED NOT NULL,
  `id_size` int(255) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `id_product`, `id_size`, `created_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `deleted_at`) VALUES
(1, 'user', '0000-00-00 00:00:00', NULL),
(22, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'srednje'),
(2, 'veliko');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE `statistic` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(255) UNSIGNED DEFAULT NULL,
  `id_action` int(255) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistic`
--

INSERT INTO `statistic` (`id`, `id_user`, `id_action`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 24, 2, '2023-01-29', '2023-01-29 12:28:34', NULL),
(2, 24, 4, '2023-01-29', '2023-01-29 13:14:43', NULL),
(3, 24, 4, '2023-01-29', '2023-01-29 13:14:46', NULL),
(4, 24, 4, '2023-01-29', '2023-01-29 13:36:13', NULL),
(5, 24, 4, '2023-01-29', '2023-01-29 13:49:36', NULL),
(6, 24, 4, '2023-01-29', '2023-01-29 13:50:29', NULL),
(7, 24, 4, '2023-01-29', '2023-01-29 13:50:48', NULL),
(8, 24, 4, '2023-01-29', '2023-01-29 13:50:49', NULL),
(9, 24, 4, '2023-01-29', '2023-01-29 13:50:49', NULL),
(10, 24, 4, '2023-01-29', '2023-01-29 13:50:50', NULL),
(11, 24, 4, '2023-01-29', '2023-01-29 13:52:51', NULL),
(12, 24, 4, '2023-01-29', '2023-01-29 13:52:53', NULL),
(13, 24, 4, '2023-01-29', '2023-01-29 13:53:07', NULL),
(14, 24, 4, '2023-01-29', '2023-01-29 13:53:21', NULL),
(15, 24, 4, '2023-01-29', '2023-01-29 13:59:48', NULL),
(16, 24, 4, '2023-01-29', '2023-01-29 14:00:39', NULL),
(17, 24, 4, '2023-01-29', '2023-01-29 14:00:46', NULL),
(18, 24, 4, '2023-01-29', '2023-01-29 14:00:52', NULL),
(19, 24, 4, '2023-01-29', '2023-01-29 14:01:04', NULL),
(20, 24, 4, '2023-01-29', '2023-01-29 14:01:09', NULL),
(21, 24, 4, '2023-01-29', '2023-01-29 14:01:10', NULL),
(22, 24, 4, '2023-01-29', '2023-01-29 14:01:19', NULL),
(23, 24, 4, '2023-01-29', '2023-01-29 14:01:22', NULL),
(24, 24, 4, '2023-01-29', '2023-01-29 14:01:28', NULL),
(25, 24, 4, '2023-01-29', '2023-01-29 14:01:51', NULL),
(26, 24, 4, '2023-01-29', '2023-01-29 14:01:51', NULL),
(27, 24, 4, '2023-01-29', '2023-01-29 14:02:14', NULL),
(28, 24, 4, '2023-01-29', '2023-01-29 14:02:15', NULL),
(29, 24, 4, '2023-01-29', '2023-01-29 14:04:54', NULL),
(30, 24, 4, '2023-01-29', '2023-01-29 14:04:55', NULL),
(31, 24, 4, '2023-01-29', '2023-01-29 14:04:57', NULL),
(32, 24, 4, '2023-01-29', '2023-01-29 14:05:03', NULL),
(33, 24, 4, '2023-01-29', '2023-01-29 14:05:04', NULL),
(34, 24, 4, '2023-01-29', '2023-01-29 14:05:04', NULL),
(35, 24, 4, '2023-01-29', '2023-01-29 14:05:06', NULL),
(36, 24, 4, '2023-01-29', '2023-01-29 14:05:19', NULL),
(37, 24, 4, '2023-01-29', '2023-01-29 14:05:19', NULL),
(38, 24, 4, '2023-01-29', '2023-01-29 14:05:20', NULL),
(39, 24, 4, '2023-01-29', '2023-01-29 14:05:20', NULL),
(40, 24, 4, '2023-01-29', '2023-01-29 14:05:22', NULL),
(41, 24, 4, '2023-01-29', '2023-01-29 14:05:23', NULL),
(42, 24, 4, '2023-01-29', '2023-01-29 14:05:23', NULL),
(43, 24, 4, '2023-01-29', '2023-01-29 14:06:54', NULL),
(44, 24, 4, '2023-01-29', '2023-01-29 14:06:55', NULL),
(45, 24, 4, '2023-01-29', '2023-01-29 14:06:59', NULL),
(46, 24, 4, '2023-01-29', '2023-01-29 14:07:05', NULL),
(47, 24, 4, '2023-01-29', '2023-01-29 14:07:05', NULL),
(48, 24, 4, '2023-01-29', '2023-01-29 14:07:06', NULL),
(49, 24, 4, '2023-01-29', '2023-01-29 14:07:07', NULL),
(50, 24, 4, '2023-01-29', '2023-01-29 14:07:08', NULL),
(51, 24, 4, '2023-01-29', '2023-01-29 14:07:08', NULL),
(52, 24, 4, '2023-01-29', '2023-01-29 14:07:08', NULL),
(53, 24, 4, '2023-01-29', '2023-01-29 14:07:08', NULL),
(54, 24, 4, '2023-01-29', '2023-01-29 14:07:57', NULL),
(55, 24, 4, '2023-01-29', '2023-01-29 14:07:58', NULL),
(56, 24, 4, '2023-01-29', '2023-01-29 14:08:00', NULL),
(57, 24, 4, '2023-01-29', '2023-01-29 14:08:04', NULL),
(58, 24, 4, '2023-01-29', '2023-01-29 14:08:05', NULL),
(59, 24, 4, '2023-01-29', '2023-01-29 14:08:06', NULL),
(60, 24, 4, '2023-01-29', '2023-01-29 14:08:07', NULL),
(61, 24, 4, '2023-01-29', '2023-01-29 14:08:37', NULL),
(62, 24, 4, '2023-01-29', '2023-01-29 14:24:27', NULL),
(63, 24, 4, '2023-01-29', '2023-01-29 14:24:29', NULL),
(64, 24, 4, '2023-01-29', '2023-01-29 14:24:36', NULL),
(65, 24, 4, '2023-01-29', '2023-01-29 14:24:38', NULL),
(66, 24, 4, '2023-01-29', '2023-01-29 14:24:39', NULL),
(67, 24, 4, '2023-01-29', '2023-01-29 14:24:41', NULL),
(68, 24, 4, '2023-01-29', '2023-01-29 14:24:43', NULL),
(69, 24, 4, '2023-01-29', '2023-01-29 14:24:43', NULL),
(70, 24, 4, '2023-01-29', '2023-01-29 14:24:44', NULL),
(71, 24, 4, '2023-01-29', '2023-01-29 14:24:44', NULL),
(72, 24, 4, '2023-01-29', '2023-01-29 14:24:45', NULL),
(73, 24, 4, '2023-01-29', '2023-01-29 14:25:05', NULL),
(74, 24, 4, '2023-01-29', '2023-01-29 14:25:06', NULL),
(75, 24, 4, '2023-01-29', '2023-01-29 14:25:34', NULL),
(76, 24, 4, '2023-01-29', '2023-01-29 14:25:42', NULL),
(77, 24, 4, '2023-01-29', '2023-01-29 14:25:44', NULL),
(78, 24, 4, '2023-01-29', '2023-01-29 14:25:45', NULL),
(79, 24, 4, '2023-01-29', '2023-01-29 14:25:46', NULL),
(80, 24, 4, '2023-01-29', '2023-01-29 14:25:55', NULL),
(81, 24, 4, '2023-01-29', '2023-01-29 14:25:58', NULL),
(82, 24, 4, '2023-01-29', '2023-01-29 14:25:59', NULL),
(83, 24, 4, '2023-01-29', '2023-01-29 14:26:06', NULL),
(84, 24, 4, '2023-01-29', '2023-01-29 14:26:08', NULL),
(85, 24, 4, '2023-01-29', '2023-01-29 14:28:48', NULL),
(86, 24, 4, '2023-01-29', '2023-01-29 14:28:50', NULL),
(87, 24, 4, '2023-01-29', '2023-01-29 14:45:23', NULL),
(88, 24, 4, '2023-01-29', '2023-01-29 14:45:26', NULL),
(89, 24, 4, '2023-01-29', '2023-01-29 14:48:12', NULL),
(90, 24, 4, '2023-01-29', '2023-01-29 14:48:14', NULL),
(91, 24, 4, '2023-01-29', '2023-01-29 14:48:16', NULL),
(92, 24, 4, '2023-01-29', '2023-01-29 14:48:42', NULL),
(93, 24, 4, '2023-01-29', '2023-01-29 14:48:50', NULL),
(94, 24, 4, '2023-01-29', '2023-01-29 14:48:53', NULL),
(95, 24, 4, '2023-01-29', '2023-01-29 14:48:56', NULL),
(96, 24, 4, '2023-01-29', '2023-01-29 14:48:57', NULL),
(97, 24, 4, '2023-01-29', '2023-01-29 14:48:57', NULL),
(98, 24, 4, '2023-01-29', '2023-01-29 14:48:58', NULL),
(99, 24, 4, '2023-01-29', '2023-01-29 14:48:59', NULL),
(100, 24, 4, '2023-01-29', '2023-01-29 14:49:07', NULL),
(101, 24, 4, '2023-01-29', '2023-01-29 14:49:12', NULL),
(102, 24, 4, '2023-01-29', '2023-01-29 14:49:17', NULL),
(103, 24, 4, '2023-01-29', '2023-01-29 14:53:50', NULL),
(104, 24, 4, '2023-01-29', '2023-01-29 14:53:57', NULL),
(105, 24, 4, '2023-01-29', '2023-01-29 14:53:57', NULL),
(106, 24, 4, '2023-01-29', '2023-01-29 14:53:59', NULL),
(107, 24, 4, '2023-01-29', '2023-01-29 15:13:25', NULL),
(108, NULL, 4, '2023-01-29', '2023-01-29 15:13:42', NULL),
(109, NULL, 4, '2023-01-29', '2023-01-29 15:13:43', NULL),
(110, NULL, 4, '2023-01-29', '2023-01-29 15:13:44', NULL),
(111, NULL, 4, '2023-01-29', '2023-01-29 15:13:45', NULL),
(112, NULL, 4, '2023-01-29', '2023-01-29 15:14:00', NULL),
(113, NULL, 4, '2023-01-29', '2023-01-29 15:14:01', NULL),
(114, NULL, 4, '2023-01-29', '2023-01-29 15:14:03', NULL),
(115, NULL, 4, '2023-01-29', '2023-01-29 15:14:09', NULL),
(116, NULL, 4, '2023-01-29', '2023-01-29 15:14:10', NULL),
(117, 24, 2, '2023-01-29', '2023-01-29 15:51:49', NULL),
(118, 48, 1, '2023-01-29', '2023-01-29 17:10:51', NULL),
(119, 48, 2, '2023-01-29', '2023-01-29 17:11:18', NULL),
(120, 49, 1, '2023-01-29', '2023-01-29 17:11:55', NULL),
(121, 49, 2, '2023-01-29', '2023-01-29 17:12:15', NULL),
(122, 49, 2, '2023-01-29', '2023-01-29 17:13:27', NULL),
(123, 49, 2, '2023-01-29', '2023-01-29 17:16:17', NULL),
(124, 49, 2, '2023-01-29', '2023-01-29 17:36:52', NULL),
(125, 49, 2, '2023-01-29', '2023-01-29 17:37:58', NULL),
(126, 49, 2, '2023-01-29', '2023-01-29 18:46:18', NULL),
(127, 49, 4, '2023-01-29', '2023-01-29 22:38:22', NULL),
(128, 49, 4, '2023-01-29', '2023-01-29 22:38:26', NULL),
(129, 49, 4, '2023-01-29', '2023-01-29 22:38:27', NULL),
(130, 49, 4, '2023-01-29', '2023-01-29 22:38:28', NULL),
(131, 49, 4, '2023-01-29', '2023-01-29 22:38:29', NULL),
(132, 49, 4, '2023-01-29', '2023-01-29 22:38:30', NULL),
(133, 49, 3, '2023-01-29', '2023-01-29 22:44:19', NULL),
(134, NULL, 4, '2023-01-29', '2023-01-29 22:49:15', NULL),
(135, NULL, 3, '2023-01-29', '2023-01-29 22:49:50', NULL),
(136, 49, 2, '2023-01-29', '2023-01-29 22:50:03', NULL),
(137, 49, 2, '2023-01-29', '2023-01-29 22:50:16', NULL),
(138, NULL, 4, '2023-01-29', '2023-01-29 22:51:18', NULL),
(139, NULL, 4, '2023-01-29', '2023-01-29 22:51:20', NULL),
(140, NULL, 3, '2023-01-29', '2023-01-29 22:54:28', NULL),
(141, NULL, 4, '2023-01-29', '2023-01-29 22:57:15', NULL),
(142, NULL, 4, '2023-01-30', '2023-01-29 23:42:59', NULL),
(143, NULL, 4, '2023-01-30', '2023-01-29 23:43:13', NULL),
(144, NULL, 4, '2023-01-30', '2023-01-29 23:43:14', NULL),
(145, NULL, 4, '2023-01-30', '2023-01-30 21:49:04', NULL),
(146, NULL, 4, '2023-01-30', '2023-01-30 21:54:03', NULL),
(147, NULL, 3, '2023-01-30', '2023-01-30 21:55:01', NULL),
(148, 49, 2, '2023-01-30', '2023-01-30 21:55:34', NULL),
(149, NULL, 4, '2023-01-30', '2023-01-30 22:14:11', NULL),
(150, NULL, 4, '2023-01-31', '2023-01-31 08:10:33', NULL),
(151, NULL, 4, '2023-01-31', '2023-01-31 08:17:10', NULL),
(152, 50, 1, '2023-01-31', '2023-01-31 08:30:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_adress` int(10) UNSIGNED NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `activation_link`, `change_password`, `active`, `phone`, `id_adress`, `id_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'Marko', 'Dasic', '1', 'markodasic700@gmail.com', '1dc0aaec44ce349ddd61710aa14765c5', '4de1b7a4dc53e4a84c25ffb7cdb580ee', '830f0df3e6d0e5b21c2776b131e2601c', 1, '+381611357235', 30, 1, NULL, NULL, NULL),
(48, 'Marko', 'Dasic', '1', 'markodasic70@gmail.com', '1dc0aaec44ce349ddd61710aa14765c5', 'e6b493d1b89986b0394dcc0c94ff0b15', 'fa3c3aadcde38ba71806d9778453dc64', 1, '+381611357231', 56, 1, NULL, NULL, NULL),
(49, 'Admin', 'Administrator', '1', 'admin@gmail.com', '1dc0aaec44ce349ddd61710aa14765c5', 'b7e8a0fefd7a9b559aaeb569f919bdf4', '42beade20b2eb2324a86dee3ed9112ad', 1, '+381613254894', 57, 22, NULL, NULL, NULL),
(50, 'Marko', 'Marijanovic', '1', 'marko.dasic.110.20@ict.edu.rs', '1dc0aaec44ce349ddd61710aa14765c5', '0311a299b169f90bf3b8d8b992c3ce76', '95ce5f73cbf0e59a9f5405240bde22ad', 1, '+38163586296', 61, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adress_id_city_index` (`id_city`);

--
-- Indexes for table `best_seller`
--
ALTER TABLE `best_seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `best_seller_id_product_index` (`id_product`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id_user_index` (`id_user`),
  ADD KEY `cart_id_status_cart_index` (`id_status_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id_parent_index` (`id_parent`);

--
-- Indexes for table `chart_status`
--
ALTER TABLE `chart_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_city_unique` (`city`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_color_unique` (`color`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupon_cupon_unique` (`cupon`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_id_product_index` (`id_product`),
  ADD KEY `favorite_id_user_index` (`id_user`);

--
-- Indexes for table `global_size`
--
ALTER TABLE `global_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_src_unique` (`src`),
  ADD KEY `images_id_product_index` (`id_product`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id_chart_index` (`id_cart`),
  ADD KEY `id_inovice_status` (`id_invoice_status`,`id_adress`),
  ADD KEY `id_adress` (`id_adress`),
  ADD KEY `id_cupon` (`id_cupon`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_action`
--
ALTER TABLE `log_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_action_id_user_index` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_id_product_index` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_category_index` (`id_category`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cart_id_cart_index` (`id_cart`),
  ADD KEY `indeksk` (`id_product`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_color` (`id_color`);

--
-- Indexes for table `product_color_size`
--
ALTER TABLE `product_color_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product_size`,`id_product_color`),
  ADD KEY `id_product_color` (`id_product_color`),
  ADD KEY `id_product_2` (`id_product`);

--
-- Indexes for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_offer_id_product_index` (`id_product`),
  ADD KEY `product_offer_id_offer_index` (`id_offer`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size` (`id_size`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_role_unique` (`role`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size_size_unique` (`size`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_action`),
  ADD KEY `action` (`id_action`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_activation_link_unique` (`activation_link`),
  ADD UNIQUE KEY `user_change_password_unique` (`change_password`),
  ADD UNIQUE KEY `user_phone_unique` (`phone`),
  ADD KEY `user_id_adress_index` (`id_adress`),
  ADD KEY `user_id_role_index` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `best_seller`
--
ALTER TABLE `best_seller`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1252;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chart_status`
--
ALTER TABLE `chart_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_size`
--
ALTER TABLE `global_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_action`
--
ALTER TABLE `log_action`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1435;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_color_size`
--
ALTER TABLE `product_color_size`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_offer`
--
ALTER TABLE `product_offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistic`
--
ALTER TABLE `statistic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_adress`) REFERENCES `adress` (`id`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`id_cupon`) REFERENCES `cupon` (`id`),
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `invoice_ibfk_5` FOREIGN KEY (`id_invoice_status`) REFERENCES `invoice_status` (`id`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD CONSTRAINT `product_cart_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_cart_ibfk_4` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`);

--
-- Constraints for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD CONSTRAINT `product_offer_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id`),
  ADD CONSTRAINT `product_offer_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `statistic`
--
ALTER TABLE `statistic`
  ADD CONSTRAINT `statistic_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `statistic_ibfk_2` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_id_adress_foreign` FOREIGN KEY (`id_adress`) REFERENCES `adress` (`id`),
  ADD CONSTRAINT `user_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
