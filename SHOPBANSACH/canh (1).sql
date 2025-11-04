-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2025 lúc 08:50 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `canh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cost` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `rental_start_date` date DEFAULT NULL,
  `rental_end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `parent_id`, `created_at`, `updated_at`) VALUES
(19, 'Sách Văn Học', 1, NULL, '2025-06-15 04:59:17', '2025-06-15 04:59:17'),
(20, 'Văn Học Việt Nam', 1, 19, '2025-06-15 04:59:49', '2025-06-15 04:59:49'),
(21, 'Sách Kỹ Năng', 1, NULL, '2025-06-15 06:19:02', '2025-06-15 06:19:02'),
(22, 'Kỹ Năng Sống', 1, 21, '2025-06-15 06:19:41', '2025-06-15 06:19:41'),
(23, 'Sách Mầm Non', 1, NULL, '2025-06-15 07:29:09', '2025-06-15 07:29:09'),
(24, 'Sách Thiếu Nhi', 1, NULL, '2025-06-15 07:29:19', '2025-06-15 07:29:19'),
(25, 'Sách Kinh Doanh', 1, NULL, '2025-06-15 07:29:31', '2025-06-15 07:29:31'),
(26, 'Sách Mẹ và Bé', 1, NULL, '2025-06-15 07:29:37', '2025-06-15 07:29:37'),
(27, 'Sách Tham Khảo', 1, NULL, '2025-06-15 07:29:52', '2025-06-15 07:29:52'),
(28, 'Sách Giáo Khoa', 1, NULL, '2025-06-15 07:30:38', '2025-06-15 07:30:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(64, 1, 'products/1749988900_van1.1.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(65, 1, 'products/1749988900_van1.2.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(66, 1, 'products/1749988900_van1.3.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(67, 1, 'products/1749988900_van1.4.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(68, 1, 'products/1749988900_van1.5.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(69, 1, 'products/1749988900_van1.webp', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(70, 2, 'products/1749989054_vhvn1.1.webp', '2025-06-15 05:04:14', '2025-06-15 05:04:14'),
(71, 2, 'products/1749989054_vhvn1.2.webp', '2025-06-15 05:04:14', '2025-06-15 05:04:14'),
(72, 2, 'products/1749989054_vhvn1.webp', '2025-06-15 05:04:14', '2025-06-15 05:04:14'),
(73, 3, 'products/1749989153_vhvn2.1.webp', '2025-06-15 05:05:53', '2025-06-15 05:05:53'),
(74, 3, 'products/1749989153_vhvn2.2.webp', '2025-06-15 05:05:53', '2025-06-15 05:05:53'),
(75, 3, 'products/1749989153_vhvn2.webp', '2025-06-15 05:05:53', '2025-06-15 05:05:53'),
(76, 4, 'products/1749989219_vhvn3.1.webp', '2025-06-15 05:06:59', '2025-06-15 05:06:59'),
(77, 4, 'products/1749989219_vhvn3.2.webp', '2025-06-15 05:06:59', '2025-06-15 05:06:59'),
(78, 4, 'products/1749989219_vhvn3.webp', '2025-06-15 05:06:59', '2025-06-15 05:06:59'),
(79, 5, 'products/1749989274_vhvn4.1.webp', '2025-06-15 05:07:54', '2025-06-15 05:07:54'),
(80, 5, 'products/1749989274_vhvn4.2.webp', '2025-06-15 05:07:54', '2025-06-15 05:07:54'),
(81, 5, 'products/1749989274_vhvn4.webp', '2025-06-15 05:07:54', '2025-06-15 05:07:54'),
(82, 6, 'products/1749989341_vhvn5.1.webp', '2025-06-15 05:09:01', '2025-06-15 05:09:01'),
(83, 6, 'products/1749989341_vhvn5.2.webp', '2025-06-15 05:09:01', '2025-06-15 05:09:01'),
(84, 6, 'products/1749989341_vhvn5.webp', '2025-06-15 05:09:01', '2025-06-15 05:09:01'),
(85, 7, 'products/1749989407_vhvn6.1.webp', '2025-06-15 05:10:07', '2025-06-15 05:10:07'),
(86, 7, 'products/1749989407_vhvn6.webp', '2025-06-15 05:10:07', '2025-06-15 05:10:07'),
(87, 8, 'products/1749989473_vhvn7.1.webp', '2025-06-15 05:11:13', '2025-06-15 05:11:13'),
(88, 8, 'products/1749989473_vhvn7.2.webp', '2025-06-15 05:11:13', '2025-06-15 05:11:13'),
(89, 8, 'products/1749989473_vhvn7.webp', '2025-06-15 05:11:13', '2025-06-15 05:11:13'),
(90, 9, 'products/1749989544_vhvn8.1.webp', '2025-06-15 05:12:24', '2025-06-15 05:12:24'),
(91, 9, 'products/1749989544_vhvn8.webp', '2025-06-15 05:12:24', '2025-06-15 05:12:24'),
(92, 10, 'products/1749989607_vhvn9.1.webp', '2025-06-15 05:13:27', '2025-06-15 05:13:27'),
(93, 10, 'products/1749989607_vhvn9.webp', '2025-06-15 05:13:27', '2025-06-15 05:13:27'),
(94, 11, 'products/1749989667_vhvn0.1.webp', '2025-06-15 05:14:27', '2025-06-15 05:14:27'),
(95, 11, 'products/1749989667_vhvn0.webp', '2025-06-15 05:14:27', '2025-06-15 05:14:27'),
(96, 12, 'products/1749993725_kynang1.1.jpg', '2025-06-15 06:22:05', '2025-06-15 06:22:05'),
(97, 12, 'products/1749993725_kynang1.2.webp', '2025-06-15 06:22:05', '2025-06-15 06:22:05'),
(98, 12, 'products/1749993725_kynang1.webp', '2025-06-15 06:22:05', '2025-06-15 06:22:05'),
(99, 13, 'products/1749993902_kn1.1.webp', '2025-06-15 06:25:02', '2025-06-15 06:25:02'),
(100, 13, 'products/1749993902_kn1.webp', '2025-06-15 06:25:02', '2025-06-15 06:25:02'),
(101, 14, 'products/1749993981_kn2 - Sao chép.webp', '2025-06-15 06:26:21', '2025-06-15 06:26:21'),
(102, 14, 'products/1749993981_kn2.1.webp', '2025-06-15 06:26:21', '2025-06-15 06:26:21'),
(103, 14, 'products/1749993981_kn2.2.webp', '2025-06-15 06:26:21', '2025-06-15 06:26:21'),
(104, 15, 'products/1749994060_kn3.1.jpg', '2025-06-15 06:27:40', '2025-06-15 06:27:40'),
(105, 15, 'products/1749994060_kn3.webp', '2025-06-15 06:27:40', '2025-06-15 06:27:40'),
(106, 16, 'products/1749994132_kn4.1.webp', '2025-06-15 06:28:52', '2025-06-15 06:28:52'),
(107, 16, 'products/1749994132_kn4.2.webp', '2025-06-15 06:28:52', '2025-06-15 06:28:52'),
(108, 16, 'products/1749994132_kn4.webp', '2025-06-15 06:28:52', '2025-06-15 06:28:52'),
(109, 17, 'products/1749994198_kn5.1.webp', '2025-06-15 06:29:58', '2025-06-15 06:29:58'),
(110, 17, 'products/1749994198_kn5.webp', '2025-06-15 06:29:58', '2025-06-15 06:29:58'),
(111, 18, 'products/1749994298_kn6.webp', '2025-06-15 06:31:38', '2025-06-15 06:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_03_16_094301_create_table', 1),
(2, '2025_06_03_025225_create_cache_table', 1),
(3, '2025_06_14_200000_add_book_fields_to_products_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('normal','vnpay') NOT NULL DEFAULT 'normal',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','confirm','ship','delivery','return','cancel') NOT NULL DEFAULT 'pending',
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `type`, `user_id`, `total`, `status`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 10:28:18', '2025-06-15 10:28:18'),
(3, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 10:53:01', '2025-06-15 10:53:01'),
(4, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 10:55:33', '2025-06-15 10:55:33'),
(5, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 10:58:33', '2025-06-15 10:58:33'),
(6, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 10:58:57', '2025-06-15 10:58:57'),
(7, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 11:00:34', '2025-06-15 11:00:34'),
(8, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 11:02:44', '2025-06-15 11:02:44'),
(9, 'normal', 3, 0, 'confirm', 'Chưa cung cấp', 'Chưa cung cấp', '2025-06-15 11:11:19', '2025-06-15 11:11:19'),
(10, 'normal', 3, 226320, 'confirm', 'Bắc Ninh', '0377715537', '2025-06-15 11:14:16', '2025-06-15 11:14:16'),
(11, 'normal', 3, 60800, 'confirm', 'Bắc Ninh', '0377715537', '2025-06-15 11:15:23', '2025-06-15 11:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cost` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `rental_start_date` date DEFAULT NULL,
  `rental_end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `cost`, `quantity`, `rental_start_date`, `rental_end_date`, `created_at`, `updated_at`) VALUES
(3, 10, 3, 226320, 2, NULL, NULL, '2025-06-15 11:14:16', '2025-06-15 11:14:16'),
(4, 11, 16, 60800, 1, NULL, NULL, '2025-06-15 11:15:23', '2025-06-15 11:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `type` enum('sale','rental') NOT NULL DEFAULT 'sale',
  `status` enum('show','hide') NOT NULL DEFAULT 'show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `translator` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `publish_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `avatar`, `category_id`, `description`, `price`, `type`, `status`, `created_at`, `updated_at`, `product_code`, `author`, `translator`, `publisher`, `publish_year`) VALUES
(1, 'Combo 5 Cuốn Tuyển Tập Danh Tác Văn Học Việt Nam', 'products/1749988900_van1.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 600000, 'sale', 'show', '2025-06-15 05:01:40', '2025-06-15 05:01:48', 'SACH-98018', 'Nhiều tác giả', 'Không', 'Văn học', 2023),
(2, 'Gió Lạnh Đầu Mùa + Hà Nội 36 Phố Phường', 'products/1749989054_vhvn1.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 99999, 'sale', 'show', '2025-06-15 05:04:14', '2025-06-15 11:25:33', 'SACH-04329', 'Thạch Lam', 'Không', 'NXB Văn học', 2023),
(3, 'Combo Tuyển Tập Những Tác Phẩm Nổi Tiếng Của Nhà Văn Nam Cao (Chí Phèo + Đời Thừa)', 'products/1749989153_vhvn2.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 69000, 'sale', 'show', '2025-06-15 05:05:36', '2025-06-15 05:05:57', 'SACH-87921', 'Nhiều tác giả', 'Không', 'NXB Văn học', 2025),
(4, 'Gió Lạnh Đầu Mùa - Thạch Lam (Tái Bản)', 'products/1749989219_vhvn3.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 99999, 'sale', 'show', '2025-06-15 05:06:59', '2025-06-15 11:26:28', 'SACH-84338', 'Thạch Lam', 'Không', 'NXB Văn học', 2023),
(5, 'Giông Tố - Vũ Trọng Phụng (Tái Bản)', 'products/1749989274_vhvn4.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 56000, 'sale', 'show', '2025-06-15 05:07:54', '2025-06-15 11:26:47', 'SACH-40011', 'Vũ Trọng Phụng', 'Không', 'NXB Văn học', 2022),
(6, 'Hà Nội 36 Phố Phường (Tái Bản)', 'products/1749989341_vhvn5.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 69000, 'sale', 'show', '2025-06-15 05:09:01', '2025-06-15 11:26:58', 'SACH-95590', 'Thạch Lam', 'Không', 'NXB Văn học', 2023),
(7, 'Nhật Ký Trong Tù - Hồ Chí Minh (Tái Bản)', 'products/1749989407_vhvn6.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 45000, 'sale', 'show', '2025-06-15 05:10:07', '2025-06-15 05:10:13', 'SACH-63370', 'Hồ Chí Minh', 'Không', 'Văn học', 2021),
(8, 'Phóng Sự Việc Làng - Ngô Tất Tố (Tái Bản)', 'products/1749989473_vhvn7.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 99999, 'sale', 'show', '2025-06-15 05:11:13', '2025-06-15 11:27:30', 'SACH-31211', 'Ngô Tất Tố', 'Không', 'NXB Văn học', 2023),
(9, 'Tập Truyện Ngắn Đời Thừa - Nam Cao (Tái Bản)', 'products/1749989544_vhvn8.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 39000, 'sale', 'show', '2025-06-15 05:12:24', '2025-06-15 11:27:41', 'SACH-03839', 'Nam Cao', 'Không', 'Văn học', 2022),
(10, 'Tập Truyện Ngắn Vợ Nhặt - Kim Lân (Tái Bản)', 'products/1749989607_vhvn9.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 35600, 'sale', 'show', '2025-06-15 05:13:27', '2025-06-15 11:28:00', 'SACH-63855', 'Kim Lân', 'Không', 'Văn học', 2025),
(11, 'Tiểu Thuyết Làm Đĩ - Vũ Trọng Phụng (TB)', 'products/1749989667_vhvn0.webp', 20, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 67000, 'sale', 'show', '2025-06-15 05:14:27', '2025-06-15 11:28:13', 'SACH-29164', 'Vũ Trọng Phụng', 'Không', 'NXB Văn học', 2023),
(12, 'Bạn Không Ổn Thì Có Làm Sao', 'products/1749993725_kynang1.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 88000, 'sale', 'show', '2025-06-15 06:22:05', '2025-06-15 11:24:39', 'SACH-74041', 'Megan Devine', 'Thành Bảo Ngọc', 'NXB Thanh Niên', 2020),
(13, 'Đừng Chờ Đợi May Mắn, Nỗ Lực Để Thành Công', 'products/1749993902_kn1.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 210000, 'sale', 'show', '2025-06-15 06:25:02', '2025-06-15 11:25:06', 'SACH-12879', 'Nhiều tác giả', 'Không', 'LTCSHOP Tổng hợp', 2018),
(14, 'Ngày Khám Phá Mind Map', 'products/1749993981_kn2 - Sao chép.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 93000, 'sale', 'show', '2025-06-15 06:26:21', '2025-06-15 06:26:21', 'SACH-15695', 'Doãn Lệ Phương', 'Minh Thúy', 'Thanh niên', 2022),
(15, '28 Cách Để Trở Thành Người Phụ Nữ Giàu Có', 'products/1749994060_kn3.1.jpg', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 48000, 'sale', 'show', '2025-06-15 06:27:40', '2025-06-15 06:27:40', 'SACH-96123', '2 1/2 bạn tốt', 'Tuệ Văn', 'NXB Thanh Niên', 2019),
(16, 'Bạn Có Nhiều Ảnh Hưởng Hơn Bạn Nghĩ', 'products/1749994132_kn4.1.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 76000, 'sale', 'show', '2025-06-15 06:28:52', '2025-06-15 06:28:52', 'SACH-82512', 'Vanessa Bohns', 'Nguyễn Ngọc Ưu', 'NXB Thanh Niên', 2025),
(17, 'Bạn Không Cần Phải Tỏ Ra Hoàn Hảo', 'products/1749994198_kn5.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 99999, 'sale', 'show', '2025-06-15 06:29:58', '2025-06-15 11:24:51', 'SACH-48393', 'Tùng Phi Tòng', 'Phạm Hồng Yến', 'Văn học', 2025),
(18, 'Bí Quyết Đọc Tâm', 'products/1749994298_kn6.webp', 22, '- Kích thước : 14.5x20.5 cm\r\n- Số trang : 336\r\n- Khối lượng : 380 grams\r\n- Bìa : bìa mềm', 84000, 'sale', 'show', '2025-06-15 06:31:38', '2025-06-15 06:31:38', 'SACH-19075', 'TRẦN BÁC NAM', 'Nguyễn Lệ Thu', 'NXB Thanh Niên', 2024);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `infomations` text NOT NULL,
  `features` text NOT NULL,
  `applications` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_descriptions`
--

INSERT INTO `product_descriptions` (`product_id`, `infomations`, `features`, `applications`, `created_at`, `updated_at`) VALUES
(1, 'LTCSHOP xin trân trọng giới thiệu tới bạn đọc bộ sách bao gồm các Tuyển tập danh tác văn học Việt Nam của các nhà văn lớn trong nền văn học nước ta. Với 5 cuốn sách tương ứng với 5 tác giả lớn, mà ở mỗi cuốn là một \"kho tàng\" những tác phẩm có quen thuộc, có lạ mặt đủ sức làm cuốn hút người đọc bằng ngôn từ độc đáo ở nhiều phong cách viết khác nhau.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(2, 'Gió lạnh đầu mùa tập hợp toàn bộ những tác phẩm trong tập truyện ngắn Gió đầu mùa của nhà văn Thạch Lam, cuốn sách bao gồm các truyện: Đứa con đầu lòng, Nhà mẹ Lê, Trở về…Trong những truyện ngắn của ông người ta thấm thía nỗi khổ đau, bất hạnh, hoàn cảnh éo le của những con người nghèo khổ vừa cảm nhận sâu sắc tình người ấm nồng, cao quý, thiêng liêng.\r\nHà Nội có một sức quyến rũ đối với các người ở nơi khác... Ở những hang cùng ngõ hẻm của làng xa, hay ở những nương mật thẳm trong rừng núi, ban chiều vẫn có nhiều người ngóng về một phương trời để cố trông cái ánh sáng của Hà Nội chiếu lên nền mây. Để cho những người mong ước kinh kỳ ấy, và để cho những người ở Hà Nội, chúng ta khuyến khích yêu mến Hà Nội hơn, chúng ta nói đến tất cả những vẻ riêng của Hà Nội, khiến mọi sự đổi thay trong ba mươi sáu phố phường đều có tiếng vang ra khắp mọi nơi.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:04:14', '2025-06-15 11:26:00'),
(3, '1. Sách: Tập Truyện Ngắn Chí Phèo\r\n“Chí Phèo” – tập truyện ngắn tái hiện bức tranh chân thực nông thôn Việt Nam trước 1945, nghèo đói, xơ xác trên con đường phá sản, bần cùng, hết sức thê thảm, người nông dân bị đẩy vào con đường tha hóa, lưu manh hóa. Nam Cao không hề bôi nhọ người nông dân, trái lại nhà văn đi sâu vào nội tâm nhân vật để khẳng định nhân phẩm và bản chất lương thiện ngay cả khi bị vùi dập, cướp mất cà nhân hình, nhân tính của người nông dân, đồng thời kết án đanh thép cái xã hội tàn bạo đó trước 1945.\r\n2. Sách: Tập Truyện Ngắn Đời Thừa\r\n“Đời thừa” - ấn bản mới phát hành của Minh Long Book tuyển chọn những truyện ngắn đặc sắc của Nam Cao xoay quanh cuộc sống người trí thức, với những tuyên ngôn để đời của nhà văn Nam Cao về văn chương, nghệ thuật.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:05:36', '2025-06-15 11:26:21'),
(4, 'Gió lạnh đầu mùa tập hợp toàn bộ những tác phẩm trong tập truyện ngắn Gió đầu mùa của nhà văn Thạch Lam, cuốn sách bao gồm các truyện: Đứa con đầu lòng, Nhà mẹ Lê, Trở về…Trong những truyện ngắn của ông người ta thấm thía nỗi khổ đau, bất hạnh, hoàn cảnh éo le của những con người nghèo khổ vừa cảm nhận sâu sắc tình người ấm nồng, cao quý, thiêng liêng.\r\nKhi giới thiệu về tập truyện ngắn Gió đầu mùa, Thạch Lam viết rằng: \"Đối với tôi văn chương không phải là một cách đem đến cho người đọc sự thoát ly trong sự quên, trái lại văn chương là một thứ khí giới thanh cao và đắc lực mà chúng ta có, để vừa tố cáo và thay đổi một cái thế giới giả dối và tàn ác, làm cho lòng người được thêm trong sạch và phong phú hơn\". Quả thực Thạch Lam đã rất trung thành với triết lý viết văn này và từng trang truyện của ông đều hướng về lớp người lao động bần cùng trong những khung cảnh ảm đạm, heo hút. Một mẹ Lê góa bụa, nghèo khổ phải nuôi một đàn con đông đúc, một bác Dư làm phu xe ở phố hàng Bột, cô Tâm hàng xén trong buổi hoàng hôn... Thạch Lam không gắn nhân vật với những sự kiện bi thảm hóa hoàn cảnh của họ nhưng cũng không khoác lên họ \"một thứ ánh trăng lừa dối\". Chính vì vậy, tác phẩm của Thạch Lam giữ được chất hiện thực nhưng không quá bi kịch như Lão Hạc, Chí Phèo... của Nam Cao.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:06:59', '2025-06-15 11:26:40'),
(5, 'Về tiểu thuyết Giông tố\r\nGiông tố là tác phẩm mang nội dung châm biếm sâu sắc về một xã hội mục nát, sự hỗn loạn khi pha trộn hai nền văn hóa giữa Tây và ta, thể hiện rõ sự bần cùng của những người nghèo khổ và lên án thái độ sa đọa hống hách của kẻ giàu có.\r\nTrong Giông tố, Vũ Trọng Phụng bóc trần mọi khía cạnh xấu xa của con người, sự tha hóa, nhẫn tâm ẩn sâu bên trong một xã hội mục nát. Ông đã thành công xuất sắc trong việc xây dựng một câu chuyện về tầng lớp tư sản thối nát đương thời.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:07:54', '2025-06-15 05:07:54'),
(6, 'Hà Nội 36 phố phường (Bút ký)\r\nNgười Pháp có Paris, người Anh có London, người Tàu có Thượng Hải... Trong các sách vở, trên các báo chí, họ nói đến thành phố của họ một cách tha thiết, mến yêu... Ta phải nghe người Pháp nói đến Paris, người ở Paris, mới hiểu được sự yêu quý ấy đến bực nào.\r\nChúng ta cũng có Hà Nội, một thành phố có nhiều vẻ đẹp, vì Hà Nội đẹp thật (chúng ta chỉ còn tìm những vẻ đẹp ấy ra), và cũng vì chúng ta yêu mến. Yêu mến Hà Nội với tâm hồn người Hà Nội, cũng như người Parisien chính hiệu yêu mến Paris... Trong những cuộc phiếm du, - phiếm du ngoài các phố Hà Nội là một cái thú vô song chỉ người Hà Nội có - ta nên chú ý đến những nét đổi thay của thành phố, nên nhận xét những vẻ đẹp cũng như vẻ xấu của phố phường, thân mật với những thú vui chơi hay những cảnh lầm than, với những người Hà Nội cũng như ta.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:09:01', '2025-06-15 07:25:33'),
(7, 'Trên đường đi đến Túc Vinh (Quảng Tây, Trung Quốc), Chủ tịch Hồ Chí Minh bị chính quyền Tưởng Giới Thạch bắt giam và bị chúng đầy ải qua gần 30 nhà giam của 13 huyện thuộc tỉnh Quảng Tây, trong khoảng thời gian 13 tháng, đến ngày 10 tháng 9 năm 1943 mới được thả tự do. Trong thời gian bị cầm tù, Người đã sáng tác tập Nhật ký trong tù với 133 bài thơ chữ Hán.Thơ nhật ký của Người ghi lại chân thực, chi tiết chế độ nhà tù cũng như chế độ xã hội Trung Quốc thời Tưởng Giới Thạch. Đó là một chế độ thối nát, mục ruỗng, nhiều tệ nạn, nhiều bất công; con người thì cùng cực, chịu nhiều khổ đau. Tập thơ còn tập trung phản ánh rõ nét con người Hồ Chí Minh về đời sống vật chất, đời sống tinh thần trong suốt thời gian ở tù. Trong đó có nói đến cả mối quan hệ của Người với những người cầm quyền, từ những viên cai ngục, đến những nhà chức trách của nhiều cấp của chính quyền Tưởng. Nhưng nội dung chủ đạo của tập cả tập thơ lại thể hiện con người Hồ Chí Minh, một con người vĩ đại.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:10:07', '2025-06-15 05:10:07'),
(8, 'Phóng sự Việc làng chứa đựng một khối lượng kiến thức sâu rộng, được ghi lại rất cụ thể, rành mạch, lôi cuốn bạn đọc đi từ ngạc nhiên này đến bất ngờ khác rất chi tiết về bộ mặt nông thôn với hàng loạt “phong tục, hủ tục” diễn ra liên miên dai dẳng trong đời sống và xã hội dân quê cách đây non một thế kỉ.\r\nViệc làng còn thuật lại các “phong tục” có ý nghĩa tốt đẹp về “sự gắn bó của dân với làng”, về tục “vào ngôi” khi con trẻ ra đời, về lễ nghi khi có người qua đời, về lễ “thượng điền”, về nghệ thuật ẩm thực hoặc một số công việc cần cù trong tập quán làm lúa nước, chăn nuôi gia cầm...\r\nTrải qua biết bao biến đổi, Việc làng vẫn còn ý nghĩa lớn và để lại nhiều bài học có giá trị trong quá trình chọn lọc, cải biến và xây dựng đời sống văn hoá mới trong xã hội nông thôn hiện nay.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:11:13', '2025-06-15 05:11:13'),
(9, '“Đời thừa” - ấn bản mới phát hành của Minh Long Book tuyển chọn những truyện ngắn đặc sắc của Nam Cao xoay quanh cuộc sống người trí thức, với những tuyên ngôn để đời của nhà văn Nam Cao về văn chương, nghệ thuật.\r\nQua sáng tác của mình, Nam Cao thể hiện quan điểm nghệ thuật rằng, một tác phẩm Văn Học phải vượt lên trên tất cả các bờ cõi và giới hạn, phải là một tác phẩm chung cho cả loài người. “Nó phải chứa đựng được một cái gì lớn lao, mạnh mẽ, vừa đau đớn, lại vừa phấn khởi; ca tụng tình yêu, bác ái, công bằng” và \"Văn chương không cần đến sự khéo tay, làm theo một cái khuôn mẫu. Văn chương chỉ dung nạp những người biết đào sâu, biết tìm tòi, khơi những nguồn chưa ai khơi và sáng tạo ra cái gì chưa có\". Ông đòi hỏi nhà văn phải có lương tâm, có nhân cách xứng với nghề; và cho rằng sự cẩu thả trong văn chương chẳng những là bất lương mà còn là đê tiện.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:12:24', '2025-06-15 05:12:24'),
(10, 'Ông quê ở làng Phù Lưu, xã Tân Hồng, huyện Từ Sơn (nay là làng Phù Lưu, phường Đông Ngàn, thị xã Từ Sơn), tỉnh Bắc Ninh. Do hoàn cảnh gia đình khó khăn, ông chỉ được học hết bậc tiểu học rồi phải đi làm. Kim Lân bắt đầu viết truyện ngắn từ năm 1941. Một số truyện (Vợ nhặt, Đứa con người vợ lẽ,...) mang tính chất tự truyện nhưng đã thể hiện được không khí tiêu điều, ảm đạm của nông thôn Việt Nam và cuộc sống lam lũ, vất vả của người nông dân thời kì đó.\r\nSau Cách Mạng tháng Tám, Kim Lân tiếp tục làm báo, viết văn. Ông vẫn chuyên về truyện ngắn và vẫn viết về làng quê Việt Nam - mảng hiện thực mà từ lâu ông đã hiểu biết sâu sắc. Những tác phẩm chính: Nên vợ nên chồng (tập truyện ngắn, 1955), Con chó xấu xí (tập truyện ngắn, 1962).', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:13:27', '2025-06-15 05:13:27'),
(11, 'Sở dĩ tác giả không theo phái người ưa văn hoa bay bướm gọi cái sự ấy là ái tình, không theo hạng người rụt rè gọi là tình dục, nhưng lại gọi nó ra đây bằng cái tên tục của nó, ấy là vì tác giả có quan niệm rất chắc chắn rằng cái sự ấy gần xác thịt hơn là gần linh hồn, chia nó ra làm hai cũng được, gồm nó vào làm một lại càng đúng lẽ sinh lý, hai cái điều hòa tương trợ lẫn nhau, và khi sự khao khát của xác thịt có thỏa mãn thì ái tình tinh thần mới bền chặt được. Nói đến ái tình lý tưởng mà không đếm xỉa đến cái dâm, đó chỉ là việc của hạng mơ mộng hão huyền.\r\nSao người ta lại coi tình dục là không quan trọng, là điều nhơ bẩn? Sao người ta lại cam tâm ngu dốt như thế, lại đạo đức giả đến như thế? Sao lại không dám nói đến cái sự nó vẫn ám ảnh hết thảy mọi hạng người? Sao lại không dám vứt bỏ cái sự hổ thẹn vô lý để giảng dạy về những bộ phận sinh dục là những cái mà đấng Thượng đế dám ban cho nhân loại mà không hổ thẹn?', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 05:14:27', '2025-06-15 05:14:27'),
(12, 'Có một “nghịch lí anh em sinh đôi” của việc làm người. Đầu tiên, không ai có thể sống cuộc đời của bạn thay bạn - không ai có thể đối diện với những điều bạn cảm thấy - và không ai có thể làm điều đó một mình. Thứ hai, khi sống cuộc đời của mình, ta tồn tại để yêu và để mất mát. Không ai biết tại sao. Đơn giản chỉ là vậy thôi. Nếu ta yêu thương, ta sẽ biết thế nào là mất mát và buồn đau. Nếu ta cố gắng né tránh mất mát và buồn đau, ta sẽ không bao giờ biết thực sự yêu thương là gì. Ấy vậy mà, hiểu được cả yêu thương và mất mát là gì chính là điều mang lại cho ta một cuộc đời trọn vẹn và sâu sắc, một cách vô cùng mạnh mẽ và bí ẩn.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:22:05', '2025-06-15 06:22:05'),
(13, '“Nhiệt huyết không phải chỉ là biểu hiện bề ngoài, nó xuất phát từ nội tâm. Khi bạn dốc hết tâm sức, thì đó cũng chính là lúc nhiệt huyết sinh ra.” - Dale Carnegie\r\nNiềm tin là điều kiện cần để con người bắt đầu hành trình chinh phục cuộc sống, tuy nhiên, nó hoàn toàn không phải là điều kiện đủ. Niềm tin chỉ là bước đầu tiên trong hành trình dài đằng đẵng, có niềm tin thôi chưa đủ, chúng ta cần biến niềm tin đó thành hành động. Nếu chỉ tin mà không hành động, chúng ta sẽ mãi là kẻ mơ mộng viển vông. Niềm tin chỉ có ý nghĩa khi chúng ta thực sự cố gắng, công hiến và sống với niềm tin ấy.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:25:02', '2025-06-15 06:25:02'),
(14, 'Sơ đồ tư duy hay còn gọi là mind map là một hình thức ghi chép hoàn toàn mới, là phương pháp đưa quá trình tư duy trừu tượng trong não bộ thể hiện thành bản vẽ ghi nhớ trên trang giấy, bằng cách hình tượng hóa theo một kết cấu phân nhánh kết hợp giữa hình ảnh và chữ viết, giúp nâng cao rõ rệt khả năng ghi nhớ nội dung cần ghi chép, tư duy mạch lạc, rõ ràng. Trong quá trình thực hiện, não bộ được khai phá tiền năng một cách đa dạng hóa từ nhiều góc độ như ngôn ngữ, màu sắc, bố cục, hình ảnh... đòi hỏi sự kết hợp ăn ý giữa não trái và phải, nhờ thế hiệu quả học tập được nâng cao. \r\nCó nhiều người cho rằng, không biết vẽ thì không thể áp dụng sơ đồ tư duy. Điều này là hoàn toàn sai. Vẽ sơ đồ tư duy không phải là một giờ học mĩ thuật. Trong quá trình thực hiện, bạn dùng bút vẽ ra những đường nét và hình ảnh đơn giản để thể hiện ý tưởng của mình. Vì thế, ngay cả khi không biết vẽ, bạn vẫn có thể sử dụng công cụ tư duy này nếu được luyện tập đúng cách.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:26:21', '2025-06-15 06:26:21'),
(15, 'Người giàu có thường không có nợ, hoặc có thể kiểm soát nguồn nợ trong tầm tay. Nhưng để trở thành một người phụ nữ giàu có thì điều cơ bản là bạn phải bỏ hết tất cả các khoản nợ trong cuộc đời, cả về mặt tài chính và tình cảm.\r\n\r\nMột số lời khuyên được đưa ra là đừng chịu trách nhiệm kinh tế với ai, bỏ ngay tính sĩ diện đi, nhận thức lại bản thân, tìm ra những “kẻ xấu” đã ăn hết khoản tiền cố định của bạn,... Về phía tình cảm, hãy xác định tư tưởng rõ ràng về bản thân, chớ có tư tưởng “để đàn ông nuôi”, ôm mộng “mình là công chúa”, vứt bỏ hoàn toàn những người đang “gặm nhấm” cuộc đời bạn”.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:27:40', '2025-06-15 06:27:40'),
(16, 'Chúng ta thường không khen người lạ hoặc bày tỏ lòng biết ơn đối với những người quan trọng trong cuộc sống của mình bởi chúng ta đánh giá thấp tác động từ lời nói của bản thân đến người khác: những người sẽ cảm thấy tuyệt vời biết bao khi nghe những điều tốt đẹp mà chúng ta nói.\r\n\r\nNếu bạn từng cảm thấy mình vô tích sự, vô hình hoặc không biết ăn nói, rất có thể bạn thực sự chẳng mắc phải vấn đề gì trong số ấy. Thay vào đó, những cảm giác này có thể chỉ là kết quả của việc thiếu nhận thức mà dường như tất cả chúng ta đều gặp phải về lời nói, hành động và thậm chí là sự tồn tại thuần túy của chúng ta ảnh hưởng đến người khác: Chúng ta đánh giá thấp tác động từ sự hiện diện của mình đến người khác.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:28:52', '2025-06-15 06:28:52'),
(17, 'Từ nhỏ chúng ta đã được dạy rằng: cảm nhận tích cực là thứ an toàn, được yêu thích; còn cảm nhận tiêu cực là thứ nguy hiểm, không được chào đón.\r\nChúng ta luôn sẵn lòng thể hiện ra mặt tốt, không bằng lòng thể hiện ra mặt xấu của bản thân: lúc nào cũng muốn tỏ ra vui vẻ chứ không thích để người khác thấy mình đang buồn; lúc nào cũng tỏ ra kiên cường, giấu nhẹm đi sự yếu đuối.\r\nTheo thời gian, chúng ta quên mất rằng thực ra mình cũng có nỗi đau, cũng có mặt yếu đuối. Ngay cả khi biết rõ điều đó, chúng ta cũng không chấp nhận nó, càng không muốn người khác biết về nó.\r\n\r\n \r\n\r\nChúng ta đã quen với việc dành niềm vui cho người khác và giữ lại nỗi đau cho mình. Chúng ta cũng đã quen với việc dành sự kiên cường cho người khác, đồng thời giữ lại sự yếu đuối cho bản thân.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:29:58', '2025-06-15 06:29:58'),
(18, 'Xã hội giống như một ván cờ mà ở đó, một nước đi dù sai lầm hay đúng đắn sẽ trực tiếp ảnh hưởng đến tất cả những lựa chọn tiếp theo. Con người là một “social animal” (loài động vật xã hội), cho nên loài người không thể tránh khỏi việc phải tương tác với thế giới bên ngoài dù muốn hay không. “Bí quyết đọc tâm” dẫn dắt chúng ta lên một hành trình tâm lý học gần gũi và trực quan. Gốc rễ của mọi sự thông thái nằm ở việc tự thấu hiểu trái tim của chính mình,3 điều dưới đây là những tóm gọn cơ bản về quá trình phát triển của con người để chúng ta có thể hiểu chính mình từ đó giúp cuộc sống trọn vẹn hơn.', '🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng\r\n🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học\r\n🎁 FREESHIP cho đơn hàng từ 300K trở lên\r\n🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên', '- Đóng gói cẩn thận\r\n- Hỗ trợ khách hàng 24/7', '2025-06-15 06:31:38', '2025-06-15 06:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('sale','rental') NOT NULL DEFAULT 'sale',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `product_id`, `type`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'sale', 99, '2025-06-15 05:01:40', '2025-06-15 05:01:40'),
(2, 2, 'sale', 99, '2025-06-15 05:04:14', '2025-06-15 05:04:14'),
(3, 3, 'sale', 99, '2025-06-15 05:05:36', '2025-06-15 11:26:21'),
(4, 4, 'sale', 99, '2025-06-15 05:06:59', '2025-06-15 05:06:59'),
(5, 5, 'sale', 99, '2025-06-15 05:07:54', '2025-06-15 05:07:54'),
(6, 6, 'sale', 99, '2025-06-15 05:09:01', '2025-06-15 05:09:01'),
(7, 7, 'sale', 99, '2025-06-15 05:10:07', '2025-06-15 05:10:07'),
(8, 8, 'sale', 99, '2025-06-15 05:11:13', '2025-06-15 05:11:13'),
(9, 9, 'sale', 99, '2025-06-15 05:12:24', '2025-06-15 05:12:24'),
(10, 10, 'sale', 99, '2025-06-15 05:13:27', '2025-06-15 05:13:27'),
(11, 11, 'sale', 99, '2025-06-15 05:14:27', '2025-06-15 05:14:27'),
(12, 12, 'sale', 99, '2025-06-15 06:22:05', '2025-06-15 06:22:05'),
(13, 13, 'sale', 99, '2025-06-15 06:25:02', '2025-06-15 06:25:02'),
(14, 14, 'sale', 99, '2025-06-15 06:26:21', '2025-06-15 06:26:21'),
(15, 15, 'sale', 99, '2025-06-15 06:27:40', '2025-06-15 06:27:40'),
(16, 16, 'sale', 98, '2025-06-15 06:28:52', '2025-06-15 11:15:23'),
(17, 17, 'sale', 99, '2025-06-15 06:29:58', '2025-06-15 06:29:58'),
(18, 18, 'sale', 99, '2025-06-15 06:31:38', '2025-06-15 06:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`, `created_at`, `updated_at`) VALUES
('7QWFaceKd0ApAqhI2nDAaECaC3fH9IEZvxCluSlE', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlRIWXZkdHJyOGZvUW9IWVN5ZnBoSkV2QmtrOVJGWGkyeDgydFg5RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvcHJvZHVjdHMvNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750013098, NULL, NULL),
('cM3IeAmZ2Gy6bbojDwd04qJM1g4fyT42Ocl6Y1Hw', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL2xvY2FsaG9zdC9DQU5IL3B1YmxpYy9wcm9kdWN0cy8xNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJTQjBiT0FPemZ1Z1BSSkVWYURRSkxZV051VFJpRkFZODhoRmZsZ2FQIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoidXNlciI7YTo0OntzOjI6ImlkIjtpOjM7czo1OiJlbWFpbCI7czoyNjoibGFpdHJvbmdjYW5oMjUwNEBnbWFpbC5jb20iO3M6NDoibmFtZSI7czo0OiJDYW5oIjtzOjQ6InJvbGUiO3M6ODoiY3VzdG9tZXIiO319', 1750013077, NULL, NULL),
('RgT1I6HypWmttDHTh0PqlVU0xiGjv3rdICh7yiV7', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiSWZ2WExkNml1VUp3bEJCR2tQQ0RYQ0JkR09FR0E2Q2loUUNSRHAzVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvcHJvZHVjdC9zYWxlIjt9fQ==', 1750013062, NULL, NULL),
('tU5p53GLCaxVCdw7cRnFBVhPHAmg9zQhduCUSG5H', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakhHSVFVYUw4VG9tbU1tYnZzTkZ4ZEtkaG05OTlldlduSzFzZ2dBcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750013126, NULL, NULL),
('wsN1dClGfSPEBruWXmbUb9eDqwdgynJFiL4u82Hh', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVlLRmI4Nmg4eW5yMER3R0VXQWNnTnM4M3IxWEUxTE05MnR3ek5WWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750007874, NULL, NULL),
('y7VXIns1Zpi9LedcvwV8VEpPOsYiSPGG9ZVx8gTr', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT1Rsc3dqbng4cmwzM0Q3REZJc0pVRmczVmxnMlhMOTBnenpMM1Q1WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvb3JkZXItc3VjY2Vzcy85Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjQ6InVzZXIiO2E6NDp7czoyOiJpZCI7aTozO3M6NToiZW1haWwiO3M6MjY6ImxhaXRyb25nY2FuaDI1MDRAZ21haWwuY29tIjtzOjQ6Im5hbWUiO3M6NDoiQ2FuaCI7czo0OiJyb2xlIjtzOjg6ImN1c3RvbWVyIjt9fQ==', 1750011084, NULL, NULL),
('Yzmdc62ccHqG1WVep0FFr2ptwcGsvW8h3DmjING5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEhlYXJ0bzRIVW5UZ1BOTUhScUQ4bXpPUkJhamxZU2V4ZTZXTmM3UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3QvQ0FOSC9wdWJsaWMvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6InZpIjt9', 1750007558, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `role` enum('admin','sale','customer') NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `verification_token`, `role`, `phone`, `address`, `date_of_birth`, `gender`, `avatar`, `is_active`, `last_login`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '$2y$12$0C99knp3yDI5q.CPSbzVXO6QX.P6.RhA8WbYc8xMusZSHLv3QmVQO', NULL, 'admin', '0123456789', '123 Admin Street', '1985-05-10', 'male', NULL, 1, '2025-06-15 04:31:00', '2025-06-15 04:31:00', '2025-06-15 04:31:00', '2025-06-15 04:31:00'),
(3, 'Lai trong', 'Canh', 'laitrongcanh2504@gmail.com', '$2y$12$XMEN5byFRs0xk8yo7RTVz.xgwySbGJ2x4w.DHOOqzpBDgRzZPqmdS', NULL, 'customer', '0377715537', 'Bắc Ninh', '2003-03-20', 'male', NULL, 1, NULL, '2025-06-15 06:33:29', '2025-06-15 06:33:18', '2025-06-15 06:33:29'),
(4, 'Van trong', 'Dao', 'laicanh63@gmail.com', '$2y$12$cmd45KbpP7uCOObV4PDwP.JNku0pJVqVVxpfqnHO1szZwiYgEMWWi', NULL, 'customer', '0383636685', 'Dong anh', '2004-03-19', 'male', NULL, 0, NULL, NULL, '2025-06-15 06:37:21', '2025-06-15 06:37:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD KEY `product_descriptions_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_inventories_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD CONSTRAINT `product_descriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
