-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2018 a las 21:17:47
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `investments2.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nit` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `nit`, `name`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 14069449, 'Ms. Emmanuelle Prosacco', '6949 Lakin Knolls\nCarolynestad, WV 13114', '877.735.8834', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(2, 4382331, 'Lizzie Dach', '759 Rico Drive Apt. 158\nColemanmouth, AK 90599', '877.981.5931', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(3, 5955, 'Leatha Von V', '78278 Olen Parks\nPagacborough, MD 89985-2318', '1-877-946-1419', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(4, 9718293, 'Mr. Rory Dare III', '6535 Stokes Lodge\nWisozkside, HI 64112-9538', '888.637.5817', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(5, 596, 'Prof. Kenya Schmeler I', '70727 Santiago Parkways Apt. 467\nJohnsmouth, CA 64288', '844-440-9182', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(6, 9, 'Rosemarie Gulgowski', '15606 Gulgowski Fort\nUllrichborough, ME 80454-4918', '(888) 567-9053', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(7, 2, 'Nova Mills', '7339 Hudson River\nNew Cletus, MT 53332-7511', '844-826-8521', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(8, 717871, 'Cordie Terry', '790 Carter Spring\nSchummstad, NE 24341', '800-981-5099', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(9, 18, 'Lynn West', '64967 Stamm Alley\nNew Chelsey, GA 61358-2055', '866-730-5945', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(10, 597, 'Prueba Customer', 'por alla', '7656754756', '2018-01-25 16:12:05', '2018-01-25 16:12:05'),
(11, 145, 'prueba Usuario', 'la calle', '6754654756', '2018-01-26 16:31:12', '2018-01-26 16:31:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `debts`
--

CREATE TABLE `debts` (
  `id` int(10) UNSIGNED NOT NULL,
  `initial_balance` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `debts`
--

INSERT INTO `debts` (`id`, `initial_balance`, `current_balance`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1000000, 800000, 9, '2018-01-24 05:00:00', '2018-01-25 14:45:49'),
(2, 500000, 720000, 2, '2018-01-24 05:00:00', '2018-01-26 15:57:22'),
(3, 240000, 50000, 3, '2018-01-25 23:24:28', '2018-01-31 15:33:33'),
(4, 150000, 100000, 8, '2018-01-30 13:32:35', '2018-01-30 13:33:09'),
(5, 115000, 115000, 1, '2018-02-06 16:32:11', '2018-02-06 16:32:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_19_160905_create_customers_table', 1),
(4, '2018_01_19_161635_create_movements_table', 1),
(5, '2018_01_19_161651_create_debts_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL,
  `value` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`id`, `type`, `value`, `percentage`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 0, 76468, 100, 1, 4, '2018-01-23 19:42:18', '2018-01-23 19:42:18'),
(2, 1, 35935, 91, 1, 9, '2018-01-23 19:42:18', '2018-01-23 19:42:18'),
(3, 0, 55500, 79, 1, 3, '2018-01-23 19:42:18', '2018-01-23 19:42:18'),
(4, 0, 44708, 56, 1, 9, '2018-01-23 19:42:18', '2018-01-23 19:42:18'),
(5, 1, 84387, 86, 1, 5, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(6, 0, 31731, 16, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(7, 0, 95476, 97, 1, 2, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(8, 1, 19111, 66, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(9, 0, 68109, 81, 1, 8, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(10, 1, 52334, 75, 1, 4, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(11, 1, 53745, 98, 1, 6, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(12, 1, 74694, 81, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(13, 0, 20644, 89, 1, 9, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(14, 1, 92160, 54, 1, 9, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(15, 0, 84656, 65, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(16, 0, 55256, 18, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(17, 0, 62253, 94, 1, 2, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(18, 1, 56132, 52, 1, 4, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(19, 0, 74102, 5, 1, 9, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(20, 1, 79533, 33, 1, 2, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(21, 0, 77017, 38, 1, 7, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(22, 1, 36662, 55, 1, 9, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(23, 0, 63423, 49, 1, 6, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(24, 0, 37769, 19, 1, 3, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(25, 0, 87075, 53, 1, 5, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(26, 1, 59922, 47, 1, 3, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(27, 1, 70659, 41, 1, 1, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(28, 1, 36319, 78, 1, 3, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(29, 0, 80673, 74, 1, 5, '2018-01-23 19:42:19', '2018-01-23 19:42:19'),
(30, 1, 49204, 9, 1, 7, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(31, 1, 24606, 74, 1, 4, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(32, 0, 45785, 58, 1, 9, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(33, 0, 18178, 54, 1, 4, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(34, 1, 45708, 31, 1, 1, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(35, 1, 38383, 94, 1, 1, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(36, 1, 64386, 44, 1, 7, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(37, 0, 24664, 44, 1, 1, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(38, 0, 50890, 66, 1, 7, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(39, 1, 59151, 6, 1, 9, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(40, 1, 32214, 7, 1, 2, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(41, 0, 37801, 63, 1, 6, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(42, 0, 23892, 38, 1, 7, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(43, 0, 33873, 67, 1, 4, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(44, 0, 16061, 26, 1, 1, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(45, 1, 84299, 71, 1, 6, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(46, 1, 70117, 44, 1, 2, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(47, 1, 43803, 43, 1, 1, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(48, 1, 31337, 25, 1, 2, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(49, 0, 68155, 3, 1, 3, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(50, 1, 75475, 82, 1, 6, '2018-01-23 19:42:20', '2018-01-23 19:42:20'),
(51, 0, 70305, 26, 1, 4, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(52, 0, 43769, 68, 1, 3, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(53, 0, 67819, 33, 1, 1, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(54, 0, 47860, 64, 1, 2, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(55, 1, 98602, 30, 1, 8, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(56, 1, 67115, 7, 1, 8, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(57, 0, 44200, 7, 1, 3, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(58, 1, 68595, 51, 1, 8, '2018-01-23 14:45:47', '2018-01-23 14:45:47'),
(59, 0, 85629, 9, 1, 8, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(60, 0, 75435, 71, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(61, 0, 88369, 55, 1, 4, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(62, 0, 24334, 35, 1, 9, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(63, 0, 64328, 51, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(64, 1, 77094, 34, 1, 5, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(65, 0, 62598, 99, 1, 3, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(66, 1, 81291, 19, 1, 6, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(67, 1, 87488, 62, 1, 6, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(68, 0, 72597, 43, 1, 4, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(69, 1, 17858, 59, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(70, 1, 14537, 42, 1, 9, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(71, 0, 39701, 73, 1, 7, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(72, 0, 58799, 12, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(73, 1, 76534, 49, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(74, 1, 58065, 94, 1, 3, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(75, 1, 61116, 88, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(76, 0, 51510, 34, 1, 4, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(77, 0, 84017, 13, 1, 7, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(78, 1, 11532, 22, 1, 1, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(79, 0, 51791, 98, 1, 4, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(80, 0, 38652, 13, 1, 1, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(81, 0, 79776, 22, 1, 2, '2018-01-23 14:45:48', '2018-01-23 14:45:48'),
(82, 1, 52031, 94, 1, 7, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(83, 1, 44186, 13, 1, 6, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(84, 0, 11619, 76, 1, 1, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(85, 0, 66410, 95, 1, 3, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(86, 0, 16172, 16, 1, 7, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(87, 1, 58670, 86, 1, 9, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(88, 1, 80232, 62, 1, 6, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(89, 1, 88732, 42, 1, 5, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(90, 0, 29361, 49, 1, 3, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(91, 0, 77477, 51, 1, 3, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(92, 0, 47229, 74, 1, 5, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(93, 1, 64919, 19, 1, 1, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(94, 1, 52772, 35, 1, 3, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(95, 1, 28203, 30, 1, 8, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(96, 0, 13429, 28, 1, 7, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(97, 0, 14853, 17, 1, 4, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(98, 1, 30695, 35, 1, 5, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(99, 1, 19283, 98, 1, 6, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(100, 1, 65131, 60, 1, 2, '2018-01-23 14:45:49', '2018-01-23 14:45:49'),
(101, 1, 50000, 0, 8, 9, '2018-01-25 14:45:49', '2018-01-25 14:45:49'),
(102, 0, 240000, 20, 8, 3, '2018-01-25 23:24:29', '2018-01-25 23:24:29'),
(103, 1, 25000, 0, 8, 3, '2018-01-25 23:24:44', '2018-01-25 23:24:44'),
(104, 1, 215000, 0, 8, 3, '2018-01-25 23:24:52', '2018-01-25 23:24:52'),
(105, 0, 420000, 40, 8, 3, '2018-01-25 23:25:10', '2018-01-25 23:25:10'),
(106, 1, 340000, 0, 8, 3, '2018-01-25 23:25:29', '2018-01-25 23:25:29'),
(107, 0, 135000, 35, 1, 2, '2018-01-26 15:56:24', '2018-01-26 15:56:24'),
(108, 1, 135000, 0, 1, 2, '2018-01-26 15:56:52', '2018-01-26 15:56:52'),
(109, 1, 300000, 0, 1, 2, '2018-01-26 15:57:07', '2018-01-26 15:57:07'),
(110, 0, 720000, 20, 1, 2, '2018-01-26 15:57:22', '2018-01-26 15:57:22'),
(111, 0, 150000, 50, 8, 8, '2018-01-30 13:32:36', '2018-01-30 13:32:36'),
(112, 1, 50000, 0, 8, 8, '2018-01-30 13:33:09', '2018-01-30 13:33:09'),
(113, 1, 30000, 0, 1, 3, '2018-01-31 15:33:33', '2018-01-31 15:33:33'),
(114, 0, 115000, 15, 1, 1, '2018-02-06 16:32:11', '2018-02-06 16:32:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nit` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL,
  `role` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nit`, `name`, `email`, `state`, `role`, `password`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 11, 'Mrs. Jazmin Bergnaum DD', 'rashad0@example.net', 1, 'e', '$2y$10$WifiENmg/E2WUS/Q6V5gTOu496vGur88.dkAZRBi/Teolgs7BhpOq', 'tt5e9lP6tz', 'jEbhyyXv1vnCjDQmJFUiK51YxuD0mPPWN4CYUe08SWgOhE5re3m50fEaifk8', '2018-01-23 19:38:10', '2018-01-30 13:31:38'),
(2, 20199268, 'Dr. Paul Cruickshank', 'kprice@example.com', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'PQmeTkKyx6', 'TiucU1pJJ6', '2018-01-23 19:38:10', '2018-01-23 19:38:10'),
(3, 557043, 'Camden Stamm', 'demarcus.mccullough@example.com', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'Mi7SPume8i', 'i1alrYxz3x', '2018-01-23 19:38:10', '2018-01-23 19:38:10'),
(4, 347, 'Prof. Jayson Monahan DDS', 'carter.deron@example.org', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', '4CODyOAMFj', '9i6Q4ZIM4v', '2018-01-23 19:38:10', '2018-01-23 19:38:10'),
(5, 720100, 'Carlee Ruecker', 'adrienne.hammes@example.net', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'nMld6GdfQJ', 'ALPLKnu73A', '2018-01-23 19:38:10', '2018-01-23 19:38:10'),
(6, 704, 'Dr. Trever Dietrich Jr.', 'judy.waters@example.org', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'VtuL0UmoMc', 'n0GQsKYiXf', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(7, 13359917, 'Diana Jenkins DDS', 'janick65@example.net', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'hJAfaxfmBm', 'Fn5n8q7oG3', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(8, 10, 'Josiah Langosh Sr.', 'kelsi5@example.com', 1, 'a', '$2y$10$0bXe4HSrHO.X0LlRAVVPV.1YdQs8guPa5SrNxTIEx2qrMq5UyQv22', 'zsHUYFdN58', 'yiXCqB4o0Zecujfu8h6J4zMRJbYvSOOigT3u2HmgG8xAqngfZinjMwzolaTt', '2018-01-23 19:38:11', '2018-01-25 23:26:08'),
(9, 480, 'Kenyon Mohr', 'hodkiewicz.junior@example.com', 1, 'e', '$2y$10$lpOtnY6lEWr6dvv1UK891.d4isueAAN0s59MtBiP9TFECB.BoEFf6', 'JzFDD3CKOw', 'XO0O799kEe', '2018-01-23 19:38:11', '2018-01-23 19:38:11'),
(10, 9, 'Rober Sehuanez', 'sehuanez@gmail.com', 1, 's', '$2y$10$oPxUBEZQKeLC0ooJY2AuOuLoDtJO8vL80VK8LEzIgxojIgI.B/IMy', 'FOjCT80yyq', 'U2Z2DS7yTDekSgyq6fkBQBMQHhZbQ2P7Gy8TowBEArj8kjINNS3qfDFlQktU', '2018-01-23 19:38:11', '2018-01-27 17:03:41'),
(11, 310, 'Rober Sehuanez Jimenez', 'ejemplo@ejemplo.com', 1, 'e', '$2y$10$DRDHY2/LCaucs.imPBBVI.ob.vU6Sq9Na9GOE4HsSOL3O2uYZHHqC', 'qAq7SJaXx4R61bB0uIpmzDCY2Koe7wqXZE4eD9Uo', NULL, '2018-01-25 14:48:54', '2018-01-25 14:48:54'),
(14, 481, 'prueba registro', 'ejemplo1@ejemplo.com', 1, 'e', '$2y$10$zEN4bM58b2ZZoS1J7vjzTeBMaEWoUOjZkAKFNaAUBvwJNMG63jUI.', '57zgaEU0PNwmMp9rNIKuHqdQmxMlz0TpOfqyonIq', NULL, '2018-01-25 15:57:32', '2018-01-25 15:57:32'),
(15, 54, 'Prueba Supervisor', 'una@una.com', 1, 'a', '$2y$10$2XNNerkLZgLWH3cCIPoNt.FL/zurSe1N1FDdJu5tS/UeXdYI95Lbu', 'rJAUsTZav2pzUAPRUGGrJ5OscvhzyLZk9XSNeVHG', NULL, '2018-01-27 16:53:14', '2018-01-27 16:53:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_nit_unique` (`nit`);

--
-- Indices de la tabla `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debts_customer_id_foreign` (`customer_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movements_user_id_foreign` (`user_id`),
  ADD KEY `movements_customer_id_foreign` (`customer_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `debts`
--
ALTER TABLE `debts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `debts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Filtros para la tabla `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `movements_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `movements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
