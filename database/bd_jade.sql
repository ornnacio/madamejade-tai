-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2021 at 12:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_jade`
--

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'jooj@gmail.com', 'hh2YNMqb4Nw7KdL', '2021-11-16 02:51:51', '2021-11-16 02:51:51'),
(2, 'joaogpiva@gmail.com', '123123', '2021-11-16 04:16:47', '2021-11-16 04:16:47'),
(3, 'admin@admin.com', 'admin123', '2021-11-16 17:04:59', '2021-11-16 17:04:59');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_14_212729_create_login_table', 1),
(5, '2021_07_22_002327_create_produtos_table', 1),
(6, '2021_07_26_231846_create_pedidos_table', 1),
(7, '2021_08_02_195630_create_mudas_table', 1),
(8, '2021_11_14_002441_add_imagem_produto', 1),
(9, '2021_11_15_233830_create_produto_categorias_table', 2),
(10, '2021_11_15_234424_alter_produto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mudas`
--

CREATE TABLE `mudas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `espécie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_plantação` date NOT NULL,
  `data_germinação` date NOT NULL,
  `número_filhas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mudas`
--

INSERT INTO `mudas` (`id`, `espécie`, `data_plantação`, `data_germinação`, `número_filhas`, `created_at`, `updated_at`) VALUES
(1, 'Orelha de elefante', '2020-06-19', '2021-10-02', 3, NULL, '2021-11-16 19:09:32'),
(2, 'McSqbj5b iNjhl8tz', '2020-02-26', '2021-07-18', 4, NULL, NULL),
(3, 'Wz6kVHoq K0rYHU2g', '2019-07-09', '2021-03-03', 3, NULL, NULL),
(4, 'l75PpV2V KPtpHlfE', '2019-09-12', '2021-01-28', 0, NULL, NULL),
(5, 'jDIcbyFv MRasHbbf', '2021-11-26', '2019-12-13', 4, NULL, NULL),
(6, 'NIr5pLT9 hs8zYqjX', '2019-08-13', '2021-07-27', 4, NULL, NULL),
(7, '9lue1jEX g4ngMt05', '2021-08-03', '2020-05-05', 1, NULL, NULL),
(8, 'oEXlbsSV NckLUNm8', '2021-09-23', '2020-11-19', 0, NULL, NULL),
(9, 'r3P1GkYi LU92Gjqy', '2019-05-06', '2021-01-03', 3, NULL, NULL);

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
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrição` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente`, `descrição`, `total`, `id_produto`, `created_at`, `updated_at`) VALUES
(3, 'tXXdaHPrO9', 'QMlyVgWxt37rbKX1xOgp', '18.00', 12, NULL, NULL),
(4, '0IIwm41R2w', 'Y3E6byjhk30SvPQfDsb6', '69.00', 15, NULL, NULL),
(7, 'kztHsl60SQ', '16IbKlz5YlWrnH1LTBDt', '68.00', 11, NULL, NULL),
(8, '5FkHBiOu31', 'YuNQNAprI9zyJbcR4dt6', '93.00', 8, NULL, NULL),
(9, 'Cristiane', 'pqjIKfxVWApnqZAUnHL4', '40.00', 18, NULL, '2021-11-16 19:07:41'),
(12, 'iITUU61rlu', 'f23xF2ZMTE3Rle0zWnnE', '86.00', 12, NULL, NULL),
(14, 'nihKOGdeYe', '4xTKOgaEKA2uOS6CcbaH', '67.00', 12, NULL, NULL),
(16, 'FSNtWrIlJw', 'esmmJeZwrTwVHi3jQLuu', '19.00', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preço` decimal(8,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `nome_arquivo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produto_categoria` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `desc`, `preço`, `quantidade`, `created_at`, `nome_arquivo`, `produto_categoria`, `updated_at`) VALUES
(6, 'np9RH7UP', 'lMzPi9UbDMsMr0TP', '9.00', 43, NULL, '20211116141005.jpeg', '11', '2021-11-16 17:10:05'),
(8, 'D9EvKRNn', 'k24OUVi9hlzwIl8H', '48.00', 23, NULL, '20211116141055.jpeg', '11', '2021-11-16 17:10:55'),
(9, '3lHPKKq0', 'hKZGzM3DahwVFxzZ', '66.00', 8, NULL, '20211116141116.jpeg', '9', '2021-11-16 17:11:16'),
(11, 'kIFLJt6F', '7kvDaU0TpiUCNqX6', '59.00', 24, NULL, '20211116141206.jpeg', '12', '2021-11-16 17:12:06'),
(12, 'CZ1sgSbf', 'klspQpim8mWabPtE', '39.00', 43, NULL, '20211116141236.jpeg', '9', '2021-11-16 17:12:36'),
(14, 'Adubo Florikan', '1w61YmPqhtEccYLX', '85.00', 41, NULL, '20211116141953.jpeg', '10', '2021-11-16 17:19:53'),
(15, 'Adubo', 'Adubo para suculenta', '20.00', 27, NULL, '20211116160526.jpeg', '10', '2021-11-16 19:05:26'),
(18, 'Colar de rubi', 'Suculenta roxa', '25.00', 80, '2021-11-16 19:06:28', '20211116160628.jpeg', '9', '2021-11-16 19:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `produto_categorias`
--

CREATE TABLE `produto_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produto_categorias`
--

INSERT INTO `produto_categorias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(9, 'Planta', NULL, NULL),
(10, 'Adubo', NULL, NULL),
(11, 'Vaso', NULL, NULL),
(12, 'Decorativo', NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mudas`
--
ALTER TABLE `mudas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id_produto_foreign` (`id_produto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_categorias`
--
ALTER TABLE `produto_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mudas`
--
ALTER TABLE `mudas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produto_categorias`
--
ALTER TABLE `produto_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
