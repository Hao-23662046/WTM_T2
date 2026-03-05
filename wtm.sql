-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2025 at 01:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2025-12-22 03:27:25', '2025-12-22 03:27:25'),
(2, 'Samsung', '2025-12-22 03:27:25', '2025-12-22 03:27:25'),
(3, 'Xiaomi', '2025-12-22 03:27:25', '2025-12-21 20:28:37');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_customer` varchar(11) NOT NULL,
  `order_status` text NOT NULL,
  `order_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_customer`, `order_status`, `order_note`) VALUES
(19, '2025-12-15 02:46:59', '4', '2', 'aaa1'),
(20, '2025-12-15 02:48:49', '4', '4', NULL),
(21, '2025-12-15 02:55:31', '1', '1', 'eeeee');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_product_quantity` int(11) NOT NULL,
  `order_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `order_product_id`, `order_product_quantity`, `order_product_price`) VALUES
(26, 19, 3, 1, 32990000),
(27, 20, 1, 1, 34990000),
(28, 21, 3, 1, 32990000);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_description`, `product_category`) VALUES
(1, 'Điện thoại iPhone 17 Pro 256GB', 34990000, 'img/iphone-17-pro-cam-8-638930812109839492-750x500.jpg', 'Đặc điểm nổi bật của iPhone 17 Pro\r\n• Khẳng định đẳng cấp với khung nhôm nguyên khối chắc chắn và diện mạo mới.\r\n• Hình ảnh hiển thị hoàn hảo, siêu mượt trên màn hình ProMotion viền mỏng hơn.\r\n• Nhiếp ảnh chuyên nghiệp với bộ ba camera 48 MP và khả năng zoom quang học 8x.\r\n• Chinh phục mọi giới hạn với chip A19 Pro được tối ưu bởi tản nhiệt buồng hơi.\r\n• Duy trì hiệu suất đỉnh cao nhờ viên pin lớn, xem video đến 31 giờ.', 1),
(2, 'Điện thoại Samsung Galaxy S25 Ultra 5G 12GB/256GB', 27480000, 'img/galaxy-s25-ultra-xanh-duong-1-638748062746442173-750x500.jpg', 'Samsung đã chính thức trình làng mẫu smartphone cao cấp mới mang tên Samsung Galaxy S25 Ultra. Đây là mẫu sản phẩm được kỳ vọng là “danh mục” chiến lược của Samsung trong năm 2025, hứa hẹn tiếp tục đẩy mạnh vị thế dẫn đầu của hãng trong ngành công nghiệp di động với thiết kế thẩm mỹ, cấu hình và trợ năng AI đỉnh cao.\r\nBo góc đẹp mắt, tinh tế hơn, “xịn hơn”\r\nGalaxy S25 Ultra giữ nguyên thiết kế mạnh mẽ và tinh tế từ dòng S24 Ultra, đồng thời bổ sung một số nâng cấp đáng chú ý. Máy sử dụng khung viền titanium, bền hơn nhôm và mang lại vẻ sang trọng, cao cấp. Mặt lưng kính mờ giúp chống bám vân tay và mang lại cảm giác cầm nắm thoải mái.', 2),
(3, 'Điện thoại iPhone Air 256GB', 32990000, 'img/iphone-air-xanh-8-638930804073268530-750x500.jpg', 'Đặc điểm nổi bật của iPhone Air\r\n• Ấn tượng với độ mỏng nhẹ kỷ lục từ khung Titan cao cấp 6.54 mm.\r\n• Trải nghiệm không gian rộng rãi và sống động trên màn hình ProMotion 120 Hz 6.5 inch.\r\n• Ghi lại khoảnh khắc đáng nhớ một cách dễ dàng qua camera chính 48 MP chất lượng cao.\r\n• Giải quyết mọi công việc với hiệu năng đỉnh cao của chip A19 Pro.\r\n• Luôn tràn đầy năng lượng với thời lượng xem video đến 27 giờ.', 1),
(4, 'Điện thoại iPhone 16e 256GB', 17190000, 'img/iphone-16e-white-3-638756438151866432-750x500.jpg', 'Sau sự thành công của iPhone SE 2022 (SE 3), Apple đã quay trở lại mạnh mẽ hơn với iPhone 16e 256GB, được ra mắt vào tháng 02/2025. Sở hữu thiết kế nhỏ gọn, Face ID tiện lợi, chip A18 mạnh mẽ cùng hệ thống camera 2 trong 1 tinh gọn, thiết bị này hứa hẹn mang lại khả năng hoạt động ấn tượng với mức giá lý tưởng.', 1),
(5, 'Máy tính bảng iPad Air M3 11 inch 5G 128GB', 17590000, 'img/ipad-air-m3-11-inch-5g-gray-1-638771985645790639-750x500.jpg', 'Tháng 3 năm 2025, Apple tiếp tục viết nên câu chuyện thành công của dòng iPad bằng sự ra mắt của iPad Air M3 11 inch 5G, đem đến cho người dùng nhiều cải thiện hơn so với trước, tiêu điểm chính không thể không nhắc đến chính là chip M3 mạnh mẽ, cho phép người dùng sáng tạo hiệu quả và linh hoạt hơn.\r\nThiết kế tinh gọn, màu sắc hiện đại\r\niPad Air M3 11 inch 5G sở hữu thiết kế tối giản nhưng hiện đại, với độ mỏng chỉ 6.1 mm và khối lượng nhẹ 460g, thiết bị giúp bạn có thể dễ dàng mang theo, linh hoạt sử dụng trong nhiều tình huống, từ làm việc tại quán cà phê đến học tập tại thư viện. Thiết kế vẫn giữ nét đặc trưng từ iPad Air 6 M2 nhưng được nâng cấp với hiệu năng mạnh mẽ hơn.', 1),
(6, 'Điện thoại Samsung Galaxy S25 FE 5G 8GB/256GB', 15490000, 'img/samsung-galaxy-s25-fe-navy-1-638938966553842550-750x500.jpg', 'Samsung Galaxy S25 FE 256GB không chỉ là một chiếc điện thoại, mà còn là người bạn đồng hành hàng ngày. Với hiệu năng mạnh mẽ và Galaxy AI, máy giúp bạn chụp ảnh, làm việc và giao tiếp dễ dàng hơn. Đây cũng là mẫu FE mỏng nhẹ nhất, thiết kế gọn gàng, mang đến nhiều tiện ích trong một thiết bị dễ cầm nắm.\r\nSang trọng, bền bỉ và thông minh\r\nGalaxy S25 FE có thiết kế siêu mỏng 7.4 mm và khối lượng 190g, mang lại sự gọn nhẹ hiếm thấy ở dòng FE. Viền màn hình mảnh mở rộng không gian hiển thị, đồng thời giữ cảm giác cầm chắc và thoải mái. Dù màn hình lớn, máy vẫn dễ dùng bằng một tay. Cụm camera đặc trưng của dòng Galaxy tiếp tục được duy trì, tạo vẻ ngoài quen thuộc và tinh tế.', 2),
(7, 'Máy tính bảng Samsung Galaxy Tab S11 5G 12GB/128GB', 20990000, 'img/samsung-galaxy-tab-s11-sliver-1-638949155224444648-750x500.jpg', 'Đặc điểm nổi bật Samsung Galaxy Tab S11 5G\r\nMediaTek Dimensity 9400+ mang lại hiệu năng đa nhiệm vượt trội.\r\nMàn hình Dynamic AMOLED 2X 120 Hz sắc nét, mượt mà.\r\nKhung Armor Aluminum bền bỉ, tăng cường khả năng chịu lực.\r\nBút S Pen cải tiến giảm độ trễ hỗ trợ viết vẽ tự nhiên.\r\nKết nối 5G tốc độ cao đảm bảo truy cập internet ổn định mọi lúc.\r\nDung lượng pin lớn, hỗ trợ sạc nhanh 45W tiện lợi.\r\nSamsung Galaxy Tab S11 5G là mẫu máy tính bảng cao cấp, hỗ trợ tốt cho việc làm việc chuyên nghiệp và giải trí. Máy được nâng cấp mạnh về cấu hình cùng thiết kế tinh tế hơn so với bản tiền nhiệm. Đây là lựa chọn phù hợp cho những ai cần một thiết bị mạnh mẽ nhưng vẫn đảm bảo tính di động mỗi ngày.\r\nThiết kế khung Armor Aluminum bền bỉ và kiểu dáng mỏng nhẹ\r\nSamsung Galaxy Tab S11 5G vẫn giữ phong cách thiết kế tối giản, tinh tế đặc trưng của dòng Tab S. Thân máy mỏng giúp bạn cầm nắm thoải mái và dễ dàng mang theo trong túi xách khi đi làm. Các đường nét được hoàn thiện vuông vức, mang lại cảm giác chắc chắn và hiện đại từ mọi góc nhìn.\r\n\r\nCác đường nét vuông vức trên Samsung Galaxy Tab S11 5G giúp máy trông hiện đại, mang lại cảm giác chắc chắn khi sử dụng', 2),
(8, 'Xiaomi 15T Pro 5G 12GB 512GB', 19490000, 'img/xiaomi_15t_pro_xam_4_2ee52ca1ee.webp', 'Trong phân khúc flagship, Xiaomi 15T Pro nổi bật với hiệu năng hàng đầu, màn hình ấn tượng và cụm camera Leica đỉnh cao. Thiết bị được xây dựng để đáp ứng nhu cầu của người dùng hiện đại, từ giải trí đa phương tiện, chụp ảnh chuyên nghiệp cho đến trải nghiệm AI. Với những nâng cấp đáng kể so với thế hệ trước, Xiaomi 15T Pro hứa hẹn là một trong những smartphone đáng chú ý nhất năm nay.\r\nXiaomi 15T Pro\r\nCụm camera Leica kép, zoom xa sắc nét\r\nXiaomi 15T Pro được ví như một chiếc máy ảnh chuyên nghiệp với thiết kế nhỏ gọn khi sở hữu cụm camera Leica Summilux VARIO-SUMMILUX. Camera chính 50MP với cảm biến Light Fusion 900 có kích thước điểm ảnh 2,4μm và khẩu độ f/1,62, hỗ trợ OIS, mang đến khả năng chụp thiếu sáng xuất sắc. Camera siêu tele 50MP khẩu độ f/3.0, tiêu cự 115mm với OIS cho phép chụp ảnh zoom xa rõ nét, hỗ trợ zoom kỹ thuật số lên đến 100x.', 3),
(9, 'Xiaomi 15 Ultra 5G 16GB 512GB', 27790000, 'img/xiaomi_15_ultra_bac_5_2d18398535.webp', 'Xiaomi 15 Ultra mang đến trải nghiệm nhiếp ảnh đỉnh cao với hệ thống camera Leica thế hệ mới, hiệu suất mạnh mẽ từ vi xử lý Snapdragon 8 Elite, thiết kế sang trọng và bền bỉ cùng màn hình AMOLED WQHD+ siêu sắc nét. Với hàng loạt công nghệ tiên tiến, chiếc điện thoại Xiaomi này không chỉ dành cho những người yêu thích chụp ảnh mà còn hướng đến người dùng cần hiệu suất mạnh mẽ, thiết kế cao cấp và trải nghiệm phần mềm mượt mà.\r\n\r\nXiaomi 15 Ultra ảnh 1\r\nCamera Leica thế hệ mới, được bảo vệ bởi kính cường lực cao cấp\r\nXiaomi 15 Ultra đưa trải nghiệm nhiếp ảnh di động lên một tầm cao mới với sự kết hợp giữa công nghệ tiên tiến và ống kính Leica đẳng cấp. Hệ thống camera được tinh chỉnh tỉ mỉ, giúp nâng cao khả năng chụp ảnh và quay video chuyên nghiệp. Đặc biệt, ống kính ngoài được bảo vệ bởi kính cường lực Corning Gorilla Glass 7i, kết hợp lớp phủ chống phản xạ kép, giúp giảm hiện tượng chói sáng và mang lại hình ảnh sắc nét đáng kinh ngạc.', 3),
(10, 'Samsung Galaxy Z Flip7 5G 12GB 256GB', 23490000, 'img/samsung_galaxy_z_flip7_xanh_1_1f10dbac20.webp', 'Galaxy Z Flip 7 là thế hệ điện thoại gập mới sở hữu màn hình ngoài lớn 4.1 inch, thiết kế thời thượng cùng bộ sưu tập màu sắc trẻ trung. Viên pin 4300mAh kết hợp chip Exynos 2500 cho hiệu năng mạnh mẽ, xử lý mượt mà các tác vụ AI. Đây chính là trợ lý thông minh nhỏ gọn, phù hợp với người dùng yêu công nghệ và thời trang.\r\nMàn hình ngoài tràn viền 4.1 inch, đột phá trong trải nghiệm\r\nSamsung Galaxy Z Flip 7 sở hữu màn hình phụ FlexWindow rộng 4.1 inch, đánh dấu kích thước lớn nhất từng xuất hiện trên dòng Flip. Viền màn hình được tinh chỉnh mỏng chỉ 1.25mm, tạo nên cảm giác hiển thị liền mạch và tinh tế hơn đáng kể so với thế hệ trước.Tấm nền Super AMOLED cao cấp hỗ trợ tần số quét từ 60 đến 120Hz, mang lại chuyển động mượt mà trong từng thao tác. Độ sáng tối đa đạt tới 2600 nits giúp hiển thị rõ ràng ngay cả trong môi trường có ánh sáng mạnh. Từ việc kiểm tra thông báo đến chụp ảnh nhanh hay điều khiển nhạc, tất cả đều hiển thị rõ nét và dễ dàng thao tác ngay từ màn hình phụ.\r\nMặt kính bên ngoài được bảo vệ bởi Gorilla Glass Victus 2, nâng cao khả năng chống trầy xước và chịu lực. Cùng với đó là thiết kế bản lề chắc chắn, giúp thiết bị vận hành linh hoạt và bền bỉ theo thời gian.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cQYFPgStGFRs97NcEAULr89NzgWjrcocMSRxW6fC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0FoMkRvVkp3SjR6S3pWckxWUDdrdkdnMmNGTjA4M2Z6R2lMUXJyQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766836573),
('MbqJgMOgPAabXVpW2QHV3TIQRbC70cQu2msOnHTX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoid0VLQUQ4c2NQV0x2cnNkUXNkREExOU8wa1lHMkRCNGhTQTh1ZkNvaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo3OiJ1c2VyX2lkIjtpOjE7czoxMzoidXNlcl9mdWxsbmFtZSI7czoxODoiUXXhuqNuIHRy4buLIHZpw6puIjtzOjk6ImxvZ2dlZF9pbiI7YjoxO3M6OToidXNlcl9yb2xlIjtpOjE7czo1OiJyb2xlcyI7YToxOntpOjA7aToxO319', 1766798797);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_address`, `user_role`) VALUES
(1, 'admin', '123', 'Quản trị viên', '33 Vĩnh Viễn, quận 10', 1),
(2, 'dhm', '123', 'Nguyễn Văn A', 'quận 7', 0),
(4, 'user', '123', 'Nguyễn Công Hảo', '33 Vĩnh Viễn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
