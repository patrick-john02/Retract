-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 06:38 PM
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
-- Database: `research_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `action_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `action_name`) VALUES
(4, 'Approved Research Paper'),
(1, 'Created Research Paper'),
(3, 'Deleted Research Paper'),
(2, 'Updated Research Paper');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'Artificial Intelligence', 'Research papers on AI advancements.', '2025-03-03 05:23:43', '2025-03-03 05:23:43', 0, NULL),
(2, 'Cybersecurity', 'Topics related to security and threats.', '2025-03-03 05:23:43', '2025-03-03 05:23:43', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `user_id`, `employee_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 3, 'EMP1001', '2025-03-03 05:23:35', '2025-03-03 05:23:35', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_papers`
--

CREATE TABLE `research_papers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected','published') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `version` int(11) DEFAULT 1,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_papers`
--

INSERT INTO `research_papers` (`id`, `title`, `abstract`, `file_path`, `file_type`, `category_id`, `submitted_by`, `submission_date`, `status`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`, `version`, `last_updated_by`) VALUES
(1, 'Retract', 'An analysis of AI applications in medicine.', 'uploads/ai_healthcare.pdf', 'pdf', 1, 2, '2025-03-03 05:23:49', 'pending', '2025-03-03 05:23:49', '2025-03-04 04:20:29', 0, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `research_progress`
--

CREATE TABLE `research_progress` (
  `id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `stage` enum('proposal','under review','revision','approved','published') DEFAULT 'proposal',
  `progress_details` text NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_progress`
--

INSERT INTO `research_progress` (`id`, `research_id`, `stage`, `progress_details`, `updated_by`, `updated_at`) VALUES
(1, 1, 'under review', 'Initial submission of research paper.', 2, '2025-03-04 04:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `reviewed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `research_id`, `reviewer_id`, `comments`, `rating`, `status`, `reviewed_at`, `created_at`, `updated_at`) VALUES
(5, 1, 3, 'medyo di maganda yung abstract. palitan nyo yan and yung references hindi naka IEEE format. diba sinabihan ko na kayo about dyan', 2, 'approved', '2025-03-04 17:26:29', '2025-03-04 17:26:29', '2025-03-04 17:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 0, NULL, '2025-03-03 05:22:57', '2025-03-03 05:22:57'),
(2, 'Student', 0, NULL, '2025-03-03 05:22:57', '2025-03-03 05:22:57'),
(3, 'Faculty', 0, NULL, '2025-03-03 05:22:57', '2025-03-03 05:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `block` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_id`, `block`, `course`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 2, '2024001', 'A1', 'Computer Science', '2025-03-03 05:23:25', '2025-03-03 05:23:25', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_logs`
--

CREATE TABLE `tracking_logs` (
  `id` int(11) NOT NULL,
  `research_id` int(11) DEFAULT NULL,
  `affected_user_id` int(11) DEFAULT NULL,
  `action_id` int(11) NOT NULL,
  `action_by` int(11) DEFAULT NULL,
  `ip_address` varbinary(16) DEFAULT NULL,
  `log_details` text DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking_logs`
--

INSERT INTO `tracking_logs` (`id`, `research_id`, `affected_user_id`, `action_id`, `action_by`, `ip_address`, `log_details`, `user_agent`, `timestamp`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 1, 2, 1, 3, 0x33323332323335373737, 'Submitted a new research paper.', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-03-03 05:24:06', '2025-03-03 05:24:06', '2025-03-03 05:24:06', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `account_status` enum('active','inactive','banned') DEFAULT 'active',
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `full_name`, `birthday`, `account_status`, `role_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(1, 'jessica', 'admin@example.com', '$2y$10$h7nYAHE0ZGoprfUcdBbq8u9.Fw/s5htscqvvfz1aqfdXnrQpoKH1i', 'System Admin', '1990-01-01', 'active', 1, '2025-03-03 05:23:12', '2025-03-03 05:32:47', 0, NULL),
(2, 'crislyn', 'student01@example.com', '$2y$10$h7nYAHE0ZGoprfUcdBbq8u9.Fw/s5htscqvvfz1aqfdXnrQpoKH1i', 'Crislyn Villanueva', '2002-06-15', 'active', 2, '2025-03-03 05:23:12', '2025-03-04 04:20:56', 0, NULL),
(3, 'bj_narag', 'faculty01@example.com', '$2y$10$h7nYAHE0ZGoprfUcdBbq8u9.Fw/s5htscqvvfz1aqfdXnrQpoKH1i', 'Bj Narag', '1985-03-25', 'active', 3, '2025-03-03 05:23:12', '2025-03-04 17:26:59', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `action_name` (`action_name`),
  ADD KEY `idx_actions_name` (`action_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `idx_faculty_user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_messages_sender` (`sender_id`),
  ADD KEY `idx_messages_receiver` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_notifications_user` (`user_id`);

--
-- Indexes for table `research_papers`
--
ALTER TABLE `research_papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_research_papers_category` (`category_id`),
  ADD KEY `idx_research_papers_user` (`submitted_by`),
  ADD KEY `idx_research_papers_status` (`status`),
  ADD KEY `last_updated_by` (`last_updated_by`),
  ADD KEY `idx_research_papers_title` (`title`);

--
-- Indexes for table `research_progress`
--
ALTER TABLE `research_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `idx_progress_research_id` (`research_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_reviews_research_id` (`research_id`),
  ADD KEY `idx_reviews_reviewer_id` (`reviewer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `idx_students_user_id` (`user_id`);

--
-- Indexes for table `tracking_logs`
--
ALTER TABLE `tracking_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `action_by` (`action_by`),
  ADD KEY `idx_tracking_logs_research` (`research_id`),
  ADD KEY `idx_tracking_logs_user` (`affected_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_papers`
--
ALTER TABLE `research_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_progress`
--
ALTER TABLE `research_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking_logs`
--
ALTER TABLE `tracking_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD CONSTRAINT `faculty_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `research_papers`
--
ALTER TABLE `research_papers`
  ADD CONSTRAINT `research_papers_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `research_papers_ibfk_2` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `research_papers_ibfk_3` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `research_progress`
--
ALTER TABLE `research_progress`
  ADD CONSTRAINT `research_progress_ibfk_1` FOREIGN KEY (`research_id`) REFERENCES `research_papers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `research_progress_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`research_id`) REFERENCES `research_papers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tracking_logs`
--
ALTER TABLE `tracking_logs`
  ADD CONSTRAINT `tracking_logs_ibfk_1` FOREIGN KEY (`research_id`) REFERENCES `research_papers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tracking_logs_ibfk_2` FOREIGN KEY (`affected_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tracking_logs_ibfk_3` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tracking_logs_ibfk_4` FOREIGN KEY (`action_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
