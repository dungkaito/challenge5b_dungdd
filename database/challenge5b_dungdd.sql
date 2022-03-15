-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 07:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge5b_dungdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classwork_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classworks`
--

CREATE TABLE `classworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'test', '2022-03-15 18:16:03', '2022-03-15 18:16:03'),
(2, 3, 2, '123111', '2022-03-15 18:16:10', '2022-03-15 18:18:35'),
(3, 3, 4, 'aloha', '2022-03-15 18:16:19', '2022-03-15 18:16:19'),
(4, 3, 6, 'balbala', '2022-03-15 18:16:27', '2022-03-15 18:16:27'),
(5, 3, 5, 'bdawjdwakjdaw', '2022-03-15 18:16:37', '2022-03-15 18:16:37'),
(6, 1, 3, 'ws', '2022-03-15 18:17:00', '2022-03-15 18:17:00'),
(7, 1, 4, 'test', '2022-03-15 18:17:12', '2022-03-15 18:17:12'),
(8, 1, 5, 'baladsblaw', '2022-03-15 18:17:21', '2022-03-15 18:17:21'),
(9, 1, 6, 'aloha', '2022-03-15 18:17:28', '2022-03-15 18:17:28'),
(10, 1, 3, 'nay dl', '2022-03-15 18:17:49', '2022-03-15 18:17:49');

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
(4, '2022_03_15_141418_create_messages_table', 1),
(5, '2022_03_15_194802_create_classworks_table', 1),
(6, '2022_03_15_213119_create_assignments_table', 1),
(7, '2022_03_15_223542_create_challenges_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `avatar_path`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teacher1', '$2y$10$fttsS/DytUhHKV.ncalde.3XQk5nTR2c.t.1kcPLxYVbx8SVkrmSq', 'Phạm Văn Khánh', 'gv1@viettelcyber.com', '0999999999', 'images/avatars/o3nXVQ8elDaV4FTSxuxDfjVGtUqioUjnR62M9LUi.png', 'Giáo viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:13:56'),
(2, 'teacher2', '$2y$10$LukqYOQH1OPzx0li7Mx1v.dQ0v61bbQTje2ePQzn2yzuh1oMfHFQ.', 'Bùi Văn Dương', 'gv2@viettelcyber.com', '0888888888', 'images/avatars/g5jfvAGr1z7adHuEaWpj4a7qvoZh8WVnFSEWGijT.png', 'Giáo viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:14:16'),
(3, 'student1', '$2y$10$pmk177Xf.c7eF4IqyuXBbe8Q7lt7ghBvZEow9rabm98u8B1135fVe', 'Dương Đình Dũng', 'sv1@viettelcyber.com', '0777777777', 'images/avatars/cC1x3F8lj6LNn3XjHX68215mYW5eVcplQ2iwsRlo.png', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:14:21'),
(4, 'student2', '$2y$10$zufMh5lCGd7yVMUJ9vzLu.rTzheO4bzMY7SmOfVsVuNHBSSDCI1d.', 'Dương Đình Hà', 'sv2@viettelcyber.com', '0666666666', 'images/avatars/In9chVHiIAdlmufke2UtMyEvakASBpT4pcTBia9i.png', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:14:27'),
(5, 'student3', '$2y$10$iyd93SQkbba.ikw5r4tRyupRe1oiTF5GX.jIZG/oG3AOrgx9l0qo.', 'Dương Đình Anh', 'sv3@viettelcyber.com', '0555555555', 'images/avatars/6QWfSr4tFGE4xuKWzVpMHZjRFxplbPdKS4aUpfHg.png', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:14:37'),
(6, 'student4', '$2y$10$Icu.mbdkkueBsvHGmRozH.HppRKaatI/Q.6JOo9KYnvW1jA9ppR0m', 'Dương Đình Tuấn', 'sv4@viettelcyber.com', '0444444444', 'images/avatars/Ku4XY43GxRBhZPNnluoxoFDiJEvWT9PXZZIpGX2p.png', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:14:49'),
(7, 'test1', '$2y$10$kXnaUpOcO80gEI.NxAtdeO1IDRv8p5iJVZer33asBzYAvUHnbKMsi', 'testname1', 'test1@viettelcyber.com', '0612666661', '', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:12:53'),
(8, 'test2', '$2y$10$BGe64a2Bxn6BKu4avpmhHuT0xGc.ajXYWa019eDnybSRGCbEF43tm', 'testname2', 'test2@viettelcyber.com', '0612666662', '', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:12:53'),
(9, 'test3', '$2y$10$RPD.Px4sFjDTK5axamuq/eGg0gOTlRYMl3sSc4FMggwppA9e8p07C', 'testname3', 'test3@viettelcyber.com', '0612666663', '', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:12:53'),
(10, 'test4', '$2y$10$EcHvd1AFH6NDJOSjrryD9OSD6JcCLhW8Md/VBcMnPgbSCq3BNGV8W', 'testname4', 'test4@viettelcyber.com', '0612666664', '', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:53', '2022-03-15 18:12:53'),
(11, 'test5', '$2y$10$JG3490RgC9KBc8Xn6gIMJOdq8WOJ0YPZnbKiKGfe8eW/cQUJSzGT6', 'testname5', 'test5@viettelcyber.com', '0612666665', '', 'Sinh viên', NULL, NULL, '2022-03-15 18:12:54', '2022-03-15 18:12:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_student_id_foreign` (`student_id`),
  ADD KEY `assignments_classwork_id_foreign` (`classwork_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `classworks`
--
ALTER TABLE `classworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classworks_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classworks`
--
ALTER TABLE `classworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_classwork_id_foreign` FOREIGN KEY (`classwork_id`) REFERENCES `classworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classworks`
--
ALTER TABLE `classworks`
  ADD CONSTRAINT `classworks_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
