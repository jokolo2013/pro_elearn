-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 05:30 PM
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
-- Database: `pro_elearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `courses_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2022-05-05 13:26:21', '2022-05-05 13:26:21'),
(2, 8, 1, '2022-05-05 15:02:41', '2022-05-05 15:02:41'),
(3, 8, 77, '2022-05-05 15:24:11', '2022-05-05 15:24:11'),
(4, 6, 77, '2022-05-05 15:25:33', '2022-05-05 15:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_setting`
--

CREATE TABLE `certificate_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_template_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate_setting`
--

INSERT INTO `certificate_setting` (`id`, `courses_id`, `certificate_template_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'ได้ผ่านการอบรมหลักสูตรออนไลน์', '2022-05-05 04:35:45', '2022-05-05 04:35:45'),
(2, 6, 1, 'ได้ผ่านการอบรมหลักสูตรออนไลน์ Learn C++ – Skill up', '2022-05-05 14:39:53', '2022-05-05 14:39:53'),
(3, 5, 1, 'ได้ผ่านการอบรมออนไลน์ Java Online Courses', '2022-05-05 15:06:02', '2022-05-05 15:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_template`
--

CREATE TABLE `certificate_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_image_background` varchar(255) NOT NULL,
  `publish` int(10) NOT NULL COMMENT '0 = private , 1 = public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate_template`
--

INSERT INTO `certificate_template` (`id`, `user_id`, `certificate_image_background`, `publish`, `created_at`, `updated_at`) VALUES
(1, 1, 'certificate-default.png', 1, '2022-05-05 04:33:20', '2022-05-05 04:33:20'),
(2, 1, 'certificate-default-2.png', 1, '2022-05-05 04:53:18', '2022-05-05 04:53:18'),
(3, 1, 'certificate-default-3.png', 1, '2022-05-05 05:02:36', '2022-05-05 05:02:36'),
(4, 1, 'certificate-default-4.png', 1, '2022-05-05 05:03:31', '2022-05-05 05:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `course_type_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_images` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_videos` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_difficulty` int(10) NOT NULL COMMENT '0 = Easy\r\n1 = Normal\r\n2 = Hard',
  `course_times` int(11) NOT NULL,
  `course_will_learn` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course_objective` varchar(255) CHARACTER SET utf8 NOT NULL,
  `viewer` int(11) NOT NULL,
  `publish` int(11) NOT NULL COMMENT '0 = close , 1 = open',
  `courses_passed` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `id_users`, `course_type_id`, `course_name`, `course_images`, `course_videos`, `course_detail`, `course_difficulty`, `course_times`, `course_will_learn`, `course_objective`, `viewer`, `publish`, `courses_passed`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PHP Full Course', 'php.jpg', 'https://www.youtube.com/embed/6EukZDFE_Zg', 'เราจะมาเรียนเรื่อง PHP กัน', 2, 4, 'เรื่อง Loop\r\nเรื่อง การสร้างเงื่อนไข If Else', 'เพื่อได้เรียนรู้เรื่องการสร้าง Loop\r\nเพื่อได้เรียนรู้เรื่องการสร้างเงื่อนไข If Else', 0, 1, 80, '2022-04-04 02:49:47', '2022-04-07 06:36:13'),
(2, 72, 3, 'Online Math Courses - Prostudyly', 'math.jpg', 'https://www.youtube.com/embed/YFWiE8faifU', 'เราจะมาเรียนเรื่อง Math', 1, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 0, 1, 80, '2022-04-04 02:59:15', '2022-04-07 06:36:08'),
(3, 1, 2, 'graphic-design-courses | iMdesign Studio', 'graphic.jpg', 'https://www.youtube.com/embed/be.com/embed/VBjHsxWXLyg', 'เราจะมาเรียนเรื่อง Graphic', 2, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 0, 1, 80, '2022-04-04 03:02:38', '2022-04-07 06:36:02'),
(4, 1, 4, 'Internet Of Things', 'internetofthings.jpg', 'https://www.youtube.com/embed/9wxchUOKWXw', 'อินเทอร์เน็ตของสรรพสิ่ง หรือ ไอโอที หมายถึงเครือข่ายของวัตถุ อุปกรณ์ พาหนะ สิ่งปลูกสร้าง และสิ่งของอื่นๆ ที่มีวงจรอิเล็กทรอนิกส์ ซอฟต์แวร์ เซ็นเซอร์ และการเชื่อมต่อกับเครือข่าย ฝังตัวอยู่', 0, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 0, 1, 80, '2022-04-04 05:47:49', '2022-04-07 06:35:58'),
(5, 1, 1, 'Java Online Courses', 'java.jpg', 'https://www.youtube.com/embed/2qr7gHNErIk', 'จาวาสคริปต์ เป็นภาษาสคริปต์ ทีมีลักษณะการเขียนแบบโพรโทไทป์ ส่วนมากใช้ในหน้าเว็บเพื่อประมวลผลข้อมูลที่ฝั่งของผู้ใช้งาน แต่ก็ยังมีใช้เพื่อเพิ่มเติมความสามารถในการเขียนสคริปต์โดยฝังอยู่ในโปรแกรมอื่น ๆ', 2, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit ', 0, 1, 80, '2022-04-04 13:08:58', '2022-04-04 13:08:58'),
(6, 1, 1, 'Learn C++ – Skill up', '3gFfJNoNab.png', 'https://www.youtube.com/embed/Tm2VzwIZKLc', 'ภาษาซีพลัสพลัส เป็นภาษาโปรแกรมคอมพิวเตอร์อเนกประสงค์ มีโครงสร้างภาษาที่มีการจัดชนิดข้อมูลแบบสแตติก และสนับสนุนรูปแบบการเขียนโปรแกรมที่หลากหลาย ได้แก่ การโปรแกรมเชิงกระบวนคำสั่ง, การนิยามข้อมูล, การโปรแกรมเชิงวัตถุ, และการโปรแกรมแบบเจเนริก ภาษาซีพลัสพลัสเป', 2, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum asperiores non id illum velit quaerat quod magnam accusantium.\r\nLorem ipsum dolor sit', 0, 1, 80, '2022-04-04 13:11:58', '2022-04-07 06:35:49'),
(8, 1, 3, 'test2', '5JLQyBtBFQ.png', 'https://www.youtube.com/embed/kmiAUPwp6-E', 'test', 1, 5, 'test', 'test', 0, 1, 80, '2022-04-06 18:44:48', '2022-04-07 12:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `courses_type`
--

CREATE TABLE `courses_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terst_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courses_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_type`
--

INSERT INTO `courses_type` (`id`, `terst_id`, `courses_type_name`, `created_at`, `updated_at`) VALUES
(1, '', 'Computer', '2022-03-18 13:54:46', '2022-03-18 13:54:46'),
(2, '', 'Graphic', '2022-03-18 13:54:46', '2022-03-18 13:54:46'),
(3, '', 'Math', '2022-03-18 13:55:32', '2022-03-18 13:55:32'),
(4, '', 'Internet of Things', '2022-03-18 13:55:32', '2022-03-18 13:55:32');

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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `lesson_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `id_course`, `lesson_name`, `lesson_sort`, `created_at`, `updated_at`) VALUES
(1, 5, 'แนะนำบทเรียน', 1, '2022-04-05 03:09:18', '2022-04-07 06:53:29'),
(2, 5, 'การสร้าง Loop', 2, '2022-04-05 03:10:20', '2022-04-07 06:53:47'),
(5, 8, 'ทดสอบ', 3, '2022-04-07 07:19:47', '2022-04-07 12:48:38'),
(7, 8, 'การสร้างเงื่อนไข', 2, '2022-04-07 07:19:59', '2022-04-07 07:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_files`
--

CREATE TABLE `lesson_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lessons_id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `lesson_files_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_files_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_files`
--

INSERT INTO `lesson_files` (`id`, `lessons_id`, `id_course`, `lesson_files_name`, `lesson_files_path`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'ไฟล์แนะนำบทเรียน', 'cad_.pdf', '2022-04-05 03:11:32', '2022-04-05 03:11:32'),
(24, 2, 5, 'ไฟล์ประกอบการสร้าง Loop', '1649335443Wireless Concept Quiz.pdf', '2022-04-07 11:34:56', '2022-04-07 12:44:03'),
(25, 7, 8, 'บท 1', '1649335925STM_SA2512_01APR22_05APR22.pdf', '2022-04-07 12:52:05', '2022-04-07 12:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_video`
--

CREATE TABLE `lesson_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lessons_id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `lesson_video_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_video_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_video`
--

INSERT INTO `lesson_video` (`id`, `lessons_id`, `id_course`, `lesson_video_name`, `lesson_video_path`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'วิดีโอแนะนำบทเรียน', 'https://www.youtube.com/embed/DqXRPdg0lNk', '2022-04-05 03:13:43', '2022-04-05 03:13:43'),
(2, 1, 5, 'ทดสอบ', 'https://www.youtube.com/embed/rt3Y3HEj08I', '2022-04-05 17:49:24', '2022-04-05 17:49:24'),
(9, 2, 5, 'บทเรียน 1', 'https://www.youtube.com/embed/Bx40eP9roDc', '2022-04-07 10:28:41', '2022-04-07 12:30:05'),
(10, 2, 5, 'บทเรียน 2', 'https://www.youtube.com/embed/E_wWsU3mxRI', '2022-04-07 12:27:50', '2022-04-07 12:29:59'),
(11, 7, 8, 'วิดีโอ 1', 'https://www.youtube.com/embed/BunzPmvvIvQ', '2022-04-07 12:51:04', '2022-04-07 12:51:38');

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
(1, '2022_02_24_213558_create_role_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 3),
(4, '2019_08_19_000000_create_failed_jobs_table', 3),
(5, '2022_03_17_214454_create_courses_type_table', 4),
(6, '2022_03_17_212828_create_courses_table', 5),
(7, '2022_03_17_214830_create_lessons_table', 6),
(8, '2022_03_17_215100_create_lesson_files_table', 7),
(9, '2022_03_17_215615_create_lesson_video_table', 8);

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
-- Table structure for table `posttest`
--

CREATE TABLE `posttest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `posttest_question` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posttest`
--

INSERT INTO `posttest` (`id`, `courses_id`, `posttest_question`, `created_at`, `updated_at`) VALUES
(17, 6, '1+1=?', '2022-05-01 15:26:57', '2022-05-01 15:26:57'),
(18, 6, '2+2=?', '2022-05-01 15:27:19', '2022-05-01 15:27:19'),
(19, 8, '2+2=?', '2022-05-01 15:28:23', '2022-05-01 15:28:23'),
(20, 8, '16 + 16 = ?', '2022-05-01 15:33:43', '2022-05-01 15:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `posttest_answer`
--

CREATE TABLE `posttest_answer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `posttest_answer` varchar(255) NOT NULL,
  `posttest_score` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posttest_answer`
--

INSERT INTO `posttest_answer` (`id`, `question_id`, `posttest_answer`, `posttest_score`, `created_at`, `updated_at`) VALUES
(21, 17, '1', 0, '2022-05-01 15:26:57', '2022-05-01 15:26:57'),
(22, 17, '2', 1, '2022-05-01 15:26:57', '2022-05-01 15:26:57'),
(23, 17, '3', 0, '2022-05-01 15:26:57', '2022-05-01 15:26:57'),
(24, 17, '4', 0, '2022-05-01 15:26:57', '2022-05-01 15:26:57'),
(25, 18, '1', 0, '2022-05-01 15:27:19', '2022-05-01 15:27:19'),
(26, 18, '2', 0, '2022-05-01 15:27:19', '2022-05-01 15:27:19'),
(27, 18, '3', 0, '2022-05-01 15:27:19', '2022-05-01 15:27:19'),
(28, 18, '4', 1, '2022-05-01 15:27:19', '2022-05-01 15:27:19'),
(29, 19, '1', 0, '2022-05-01 15:28:23', '2022-05-01 15:28:23'),
(30, 19, '2', 0, '2022-05-01 15:28:23', '2022-05-01 15:28:23'),
(31, 19, '3', 0, '2022-05-01 15:28:23', '2022-05-01 15:28:23'),
(32, 19, '4', 1, '2022-05-01 15:28:23', '2022-05-01 15:28:23'),
(33, 20, '16', 0, '2022-05-01 15:33:43', '2022-05-01 15:33:43'),
(34, 20, '24', 0, '2022-05-01 15:33:43', '2022-05-01 15:33:43'),
(35, 20, '32', 1, '2022-05-01 15:33:43', '2022-05-01 15:33:43'),
(36, 20, '64', 0, '2022-05-01 15:33:43', '2022-05-01 15:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `posttest_result`
--

CREATE TABLE `posttest_result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `posttest_answer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posttest_result`
--

INSERT INTO `posttest_result` (`id`, `user_id`, `courses_id`, `question_id`, `posttest_answer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 17, 22, '2022-05-01 16:44:25', '2022-05-01 16:44:25'),
(2, 1, 6, 18, 28, '2022-05-01 16:44:25', '2022-05-01 16:44:25'),
(3, 1, 6, 17, 22, '2022-05-01 16:52:04', '2022-05-01 16:52:04'),
(4, 1, 6, 18, 28, '2022-05-01 16:52:04', '2022-05-01 16:52:04'),
(5, 1, 8, 19, 32, '2022-05-02 06:39:06', '2022-05-02 06:39:06'),
(6, 1, 8, 20, 33, '2022-05-02 06:39:06', '2022-05-02 06:39:06'),
(7, 1, 8, 19, 32, '2022-05-02 06:39:24', '2022-05-02 06:39:24'),
(8, 1, 8, 20, 35, '2022-05-02 06:39:24', '2022-05-02 06:39:24'),
(9, 1, 8, 19, 32, '2022-05-02 06:39:40', '2022-05-02 06:39:40'),
(10, 1, 8, 20, 33, '2022-05-02 06:39:40', '2022-05-02 06:39:40'),
(11, 1, 8, 19, 32, '2022-05-05 14:58:14', '2022-05-05 14:58:14'),
(12, 1, 8, 20, 35, '2022-05-05 14:58:14', '2022-05-05 14:58:14'),
(13, 1, 8, 19, 32, '2022-05-05 15:02:41', '2022-05-05 15:02:41'),
(14, 1, 8, 20, 35, '2022-05-05 15:02:41', '2022-05-05 15:02:41'),
(15, 77, 8, 19, 32, '2022-05-05 15:23:38', '2022-05-05 15:23:38'),
(16, 77, 8, 20, 33, '2022-05-05 15:23:38', '2022-05-05 15:23:38'),
(17, 77, 8, 19, 32, '2022-05-05 15:24:11', '2022-05-05 15:24:11'),
(18, 77, 8, 20, 35, '2022-05-05 15:24:11', '2022-05-05 15:24:11'),
(19, 77, 6, 17, 22, '2022-05-05 15:25:33', '2022-05-05 15:25:33'),
(20, 77, 6, 18, 28, '2022-05-05 15:25:33', '2022-05-05 15:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `pretest`
--

CREATE TABLE `pretest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `pretest_question` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pretest`
--

INSERT INTO `pretest` (`id`, `courses_id`, `pretest_question`, `created_at`, `updated_at`) VALUES
(4, 1, 'test2', '2022-04-20 15:26:38', '2022-04-20 15:26:38'),
(5, 1, 'test2', '2022-04-20 15:27:10', '2022-04-20 15:27:10'),
(6, 1, 'test2', '2022-04-20 15:31:19', '2022-04-20 15:31:19'),
(7, 1, 'test2', '2022-04-20 15:31:21', '2022-04-20 15:31:21'),
(8, 1, 'test2', '2022-04-20 15:31:28', '2022-04-20 15:31:28'),
(9, 1, 'test2', '2022-04-20 15:32:27', '2022-04-20 15:32:27'),
(10, 1, 'test2', '2022-04-20 15:33:17', '2022-04-20 15:33:17'),
(11, 1, 'test2', '2022-04-20 15:33:42', '2022-04-20 15:33:42'),
(12, 1, 'test2', '2022-04-20 15:34:33', '2022-04-20 15:34:33'),
(13, 1, 'test2', '2022-04-20 15:35:24', '2022-04-20 15:35:24'),
(14, 1, 'test2', '2022-04-20 15:35:46', '2022-04-20 15:35:46'),
(22, 6, '1+1 = ?', '2022-05-01 15:26:38', '2022-05-01 15:26:38'),
(23, 8, '1+1 = ?', '2022-05-01 15:28:12', '2022-05-01 15:28:12'),
(24, 8, '4 + 4 = ?', '2022-05-01 15:33:20', '2022-05-01 15:33:20'),
(25, 8, '5 + 5 = ?', '2022-05-01 16:15:13', '2022-05-01 16:15:13'),
(26, 8, '10 + 10 = ?', '2022-05-02 06:45:35', '2022-05-02 06:45:35'),
(27, 8, '100  + 100 = ?', '2022-05-02 06:46:46', '2022-05-02 06:46:46'),
(28, 5, '1+1 = ?', '2022-05-05 15:16:22', '2022-05-05 15:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `pretest_answer`
--

CREATE TABLE `pretest_answer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `pretest_answer` varchar(255) NOT NULL,
  `pretest_score` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pretest_answer`
--

INSERT INTO `pretest_answer` (`id`, `question_id`, `pretest_answer`, `pretest_score`, `created_at`, `updated_at`) VALUES
(5, 12, 'test23', 3, '2022-04-20 15:34:33', '2022-04-20 15:34:33'),
(34, 22, '1', 0, '2022-05-01 15:26:38', '2022-05-01 15:26:38'),
(35, 22, '2', 1, '2022-05-01 15:26:38', '2022-05-01 15:26:38'),
(36, 22, '3', 0, '2022-05-01 15:26:38', '2022-05-01 15:26:38'),
(37, 22, '4', 0, '2022-05-01 15:26:38', '2022-05-01 15:26:38'),
(38, 23, '1', 0, '2022-05-01 15:28:12', '2022-05-01 15:28:12'),
(39, 23, '2', 1, '2022-05-01 15:28:12', '2022-05-01 15:28:12'),
(40, 23, '3', 0, '2022-05-01 15:28:12', '2022-05-01 15:28:12'),
(41, 23, '4', 0, '2022-05-01 15:28:12', '2022-05-01 15:28:12'),
(42, 24, '4', 0, '2022-05-01 15:33:20', '2022-05-01 15:33:20'),
(43, 24, '8', 1, '2022-05-01 15:33:20', '2022-05-01 15:33:20'),
(44, 24, '16', 0, '2022-05-01 15:33:20', '2022-05-01 15:33:20'),
(45, 24, '24', 0, '2022-05-01 15:33:20', '2022-05-01 15:33:20'),
(46, 25, '10', 1, '2022-05-01 16:15:13', '2022-05-01 16:15:13'),
(47, 25, '20', 0, '2022-05-01 16:15:13', '2022-05-01 16:15:13'),
(48, 25, '30', 0, '2022-05-01 16:15:13', '2022-05-01 16:15:13'),
(49, 25, '40', 0, '2022-05-01 16:15:13', '2022-05-01 16:15:13'),
(50, 26, '10', 0, '2022-05-02 06:45:35', '2022-05-02 06:45:35'),
(51, 26, '20', 0, '2022-05-02 06:45:35', '2022-05-02 06:46:03'),
(52, 26, '30', 1, '2022-05-02 06:45:35', '2022-05-02 06:46:03'),
(53, 26, '40', 0, '2022-05-02 06:45:35', '2022-05-02 06:45:35'),
(54, 27, '200', 1, '2022-05-02 06:46:46', '2022-05-02 06:46:46'),
(55, 27, '100', 0, '2022-05-02 06:46:46', '2022-05-02 06:46:46'),
(56, 27, '300', 0, '2022-05-02 06:46:46', '2022-05-02 06:46:46'),
(57, 27, '400', 0, '2022-05-02 06:46:46', '2022-05-02 06:46:46'),
(58, 28, '2', 1, '2022-05-05 15:16:22', '2022-05-05 15:16:22'),
(59, 28, '4', 0, '2022-05-05 15:16:22', '2022-05-05 15:16:22'),
(60, 28, '6', 0, '2022-05-05 15:16:22', '2022-05-05 15:16:22'),
(61, 28, '8', 0, '2022-05-05 15:16:22', '2022-05-05 15:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `pretest_result`
--

CREATE TABLE `pretest_result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `pretest_answer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pretest_result`
--

INSERT INTO `pretest_result` (`id`, `user_id`, `courses_id`, `question_id`, `pretest_answer_id`, `created_at`, `updated_at`) VALUES
(4, 1, 6, 22, 35, '2022-05-01 15:45:11', '2022-05-01 15:45:11'),
(5, 1, 6, 22, 35, '2022-05-01 16:37:32', '2022-05-01 16:37:32'),
(6, 1, 6, 22, 35, '2022-05-01 16:41:24', '2022-05-01 16:41:24'),
(7, 1, 8, 23, 39, '2022-05-01 16:51:32', '2022-05-01 16:51:32'),
(8, 1, 8, 24, 43, '2022-05-01 16:51:32', '2022-05-01 16:51:32'),
(9, 1, 8, 25, 46, '2022-05-01 16:51:32', '2022-05-01 16:51:32'),
(10, 1, 8, 23, 39, '2022-05-02 06:38:27', '2022-05-02 06:38:27'),
(11, 1, 8, 24, 43, '2022-05-02 06:38:27', '2022-05-02 06:38:27'),
(12, 1, 8, 25, 46, '2022-05-02 06:38:27', '2022-05-02 06:38:27'),
(13, 1, 6, 22, 35, '2022-05-05 12:07:11', '2022-05-05 12:07:11'),
(14, 1, 6, 22, 35, '2022-05-05 12:25:50', '2022-05-05 12:25:50'),
(15, 1, 6, 22, 35, '2022-05-05 12:26:28', '2022-05-05 12:26:28'),
(16, 1, 6, 22, 35, '2022-05-05 12:26:29', '2022-05-05 12:26:29'),
(17, 1, 6, 22, 35, '2022-05-05 12:29:42', '2022-05-05 12:29:42'),
(18, 1, 6, 22, 35, '2022-05-05 12:31:15', '2022-05-05 12:31:15'),
(19, 1, 6, 22, 35, '2022-05-05 12:32:17', '2022-05-05 12:32:17'),
(20, 1, 6, 22, 35, '2022-05-05 12:32:24', '2022-05-05 12:32:24'),
(21, 1, 6, 22, 35, '2022-05-05 12:32:48', '2022-05-05 12:32:48'),
(22, 1, 6, 22, 35, '2022-05-05 12:33:21', '2022-05-05 12:33:21'),
(23, 1, 6, 22, 37, '2022-05-05 12:33:35', '2022-05-05 12:33:35'),
(24, 1, 6, 22, 35, '2022-05-05 13:15:16', '2022-05-05 13:15:16'),
(25, 1, 6, 22, 35, '2022-05-05 13:16:52', '2022-05-05 13:16:52'),
(26, 1, 6, 22, 35, '2022-05-05 13:18:19', '2022-05-05 13:18:19'),
(27, 1, 6, 22, 35, '2022-05-05 13:18:55', '2022-05-05 13:18:55'),
(28, 1, 6, 22, 35, '2022-05-05 13:23:17', '2022-05-05 13:23:17'),
(29, 1, 6, 22, 35, '2022-05-05 13:24:12', '2022-05-05 13:24:12'),
(30, 1, 6, 22, 35, '2022-05-05 13:26:21', '2022-05-05 13:26:21'),
(31, 1, 6, 22, 35, '2022-05-05 15:00:38', '2022-05-05 15:00:38'),
(32, 1, 8, 23, 39, '2022-05-05 15:00:53', '2022-05-05 15:00:53'),
(33, 1, 8, 24, 43, '2022-05-05 15:00:53', '2022-05-05 15:00:53'),
(34, 1, 8, 25, 46, '2022-05-05 15:00:53', '2022-05-05 15:00:53'),
(35, 1, 8, 26, 51, '2022-05-05 15:00:53', '2022-05-05 15:00:53'),
(36, 1, 8, 27, 54, '2022-05-05 15:00:53', '2022-05-05 15:00:53'),
(37, 1, 5, 28, 58, '2022-05-05 15:16:36', '2022-05-05 15:16:36'),
(38, 77, 8, 23, 39, '2022-05-05 15:23:19', '2022-05-05 15:23:19'),
(39, 77, 8, 24, 43, '2022-05-05 15:23:19', '2022-05-05 15:23:19'),
(40, 77, 8, 25, 46, '2022-05-05 15:23:19', '2022-05-05 15:23:19'),
(41, 77, 8, 26, 51, '2022-05-05 15:23:19', '2022-05-05 15:23:19'),
(42, 77, 8, 27, 54, '2022-05-05 15:23:19', '2022-05-05 15:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `register_courses`
--

CREATE TABLE `register_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_course` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `pretest_score` int(255) NOT NULL,
  `posttest_score` int(255) NOT NULL,
  `pretest_count` int(255) NOT NULL,
  `posttest_count` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_courses`
--

INSERT INTO `register_courses` (`id`, `id_course`, `id_users`, `pretest_score`, `posttest_score`, `pretest_count`, `posttest_count`, `created_at`, `updated_at`) VALUES
(4, 8, 72, 0, 0, 0, 0, '2022-04-16 15:24:15', '2022-04-16 15:24:15'),
(13, 8, 1, 4, 2, 3, 5, '2022-05-02 06:36:27', '2022-05-05 15:02:41'),
(14, 6, 1, 1, 0, 19, 0, '2022-05-03 13:06:03', '2022-05-05 15:00:38'),
(15, 5, 1, 1, 0, 1, 0, '2022-05-03 13:10:34', '2022-05-05 15:16:36'),
(16, 3, 1, 0, 0, 0, 0, '2022-05-05 15:07:09', '2022-05-05 15:07:09'),
(17, 2, 1, 0, 0, 0, 0, '2022-05-05 15:07:21', '2022-05-05 15:07:21'),
(18, 8, 77, 4, 2, 1, 2, '2022-05-05 15:23:08', '2022-05-05 15:24:11'),
(19, 6, 77, 0, 2, 0, 1, '2022-05-05 15:25:26', '2022-05-05 15:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(0, 'Admin', '2022-02-24 15:05:22', '2022-02-24 15:05:22'),
(1, 'Author', '2022-02-24 15:06:15', '2022-02-24 15:06:15'),
(2, 'Member', '2022-02-24 15:06:23', '2022-02-24 15:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_profile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `Fname`, `Lname`, `Gender`, `tel`, `email`, `email_verified_at`, `password`, `pic_profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Eddy', 'Suttipongs', '2', '094019048', 'admin@admin.com', NULL, '$2y$10$SZXlRmy1MM0ubCjqDRkrX.LCo9MG7mhtTZgx3tPhilz/NWEG47bkm', 'ZJAzj5HqTw.jpg', NULL, '2022-02-24 15:12:09', '2022-03-10 06:18:12'),
(54, 1, 'ytytyty', 'tytytyty', '3', '0940190485', 'tytyt0a1y@tytyty.ty', NULL, '$2y$10$nQAe8bd/LHW4Vpjdg6orjui/HCQP4tOJ7gaVGbClVu55OI2ZJedEG', 'nopic.jpg', NULL, '2022-02-24 18:54:34', '2022-02-24 18:54:34'),
(55, 1, 'user', 'user', '1', '0856565656', 'dddssaasasa@dddd.ddd', NULL, '$2y$10$e1lbQHJZv/n3H4lqVSOqJ.RJ4h6CTRZfuSAybCvXDSkxQTglQPaRi', 'nopic.jpg', NULL, '2022-02-25 04:33:29', '2022-02-25 04:33:29'),
(56, 1, 'user', 'user', '2', '0856565656', 'dddssaasasa@dddd.ddda', NULL, '$2y$10$KoODbFSA6igbaRNmKLPv2ueRARE4vWqCR9iu.Y/4ZOeFjxO60ot2G', 'nopic.jpg', NULL, '2022-02-25 04:34:37', '2022-02-25 04:34:37'),
(57, 2, 'test', 'test', '2', '0856565656', 'test@dddd.ddd', NULL, '$2y$10$SYfpfeFn0l4B.niDGoszAO/tkPZG313isnRVZaxpUVAC8BfvNujTe', 'nopic.jpg', NULL, '2022-02-25 04:41:15', '2022-02-25 04:41:15'),
(58, 2, 'test', 'test', '2', '0856565656', 'testd@dddd.ddd', NULL, '$2y$10$7Ez4dCGDLJf18AHfaznC/.LEtsS6gSYcBucrgg.5aauk88YGc9k8a', 'nopic.jpg', NULL, '2022-02-25 04:43:17', '2022-02-25 04:43:17'),
(59, 2, 'test', 'test', '1', '0856565656', 'tes1td@dddd.ddd', NULL, '$2y$10$4ZY9oXM60cTg1FjPCYjFw.kx58EWkFV1sysTfoL5b2XRrvjpC/DDy', 'nopic.jpg', NULL, '2022-02-25 04:43:31', '2022-02-25 04:43:31'),
(72, 2, 'Nattapong', 'LongKeaw', '2', '0810592178', 'Nattapong@gmail.com', NULL, '$2y$10$BK01o2ZDzv3TfUXTRQnu3OlyGkPdohGCzHWr5X/J0xhw4kQLm9KN2', 'hHL45Rd0dp.jpg', NULL, '2022-03-10 06:27:27', '2022-03-10 06:27:38'),
(75, 2, 'นพรุจ', 'ชูธรรม', '1', '0940190485', 'Nobpharut@gmail.com', NULL, '$2y$10$SEYWAb72/rF4dcsfSmHM1.ad4atTOvRLWY2uXSflHCKn5HY.EeP8O', 'MezYIxQaQa.jpg', NULL, '2022-03-11 07:10:03', '2022-03-11 07:11:32'),
(77, 2, 'นายเก้าสิบหก', 'สิบเจ็ดสิบแปด', '1', '0987876875', 'tenfight@gmail.com', NULL, '$2y$10$VziUVvEiqluPeiYykLFTcewqfX/z.xuXDIVJhL9WnI6AkX5L8KbIW', 'nopic.jpg', NULL, '2022-05-05 15:22:47', '2022-05-05 15:22:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_user_id_FK` (`user_id`),
  ADD KEY `certificate_courses_id_FK` (`courses_id`) USING BTREE;

--
-- Indexes for table `certificate_setting`
--
ALTER TABLE `certificate_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_setting_courses_id_FK` (`courses_id`),
  ADD KEY `certificate_certificate_template_id_FK` (`certificate_template_id`);

--
-- Indexes for table `certificate_template`
--
ALTER TABLE `certificate_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_template_user_id_id_FK` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_id_users_foreign` (`id_users`),
  ADD KEY `courses_course_type_id_foreign` (`course_type_id`);

--
-- Indexes for table `courses_type`
--
ALTER TABLE `courses_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terst_id_fk` (`terst_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_id_course_foreign` (`id_course`);

--
-- Indexes for table `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_files_lessons_id_foreign` (`lessons_id`),
  ADD KEY `lesson_files_id_course_foregign` (`id_course`) USING BTREE;

--
-- Indexes for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_video_lessons_id_foreign` (`lessons_id`) USING BTREE,
  ADD KEY `lesson_videos_id_course_foregign` (`id_course`) USING BTREE;

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
-- Indexes for table `posttest`
--
ALTER TABLE `posttest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posttest_courses_id_FK` (`courses_id`);

--
-- Indexes for table `posttest_answer`
--
ALTER TABLE `posttest_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posttest_answer_question_id_FK` (`question_id`);

--
-- Indexes for table `posttest_result`
--
ALTER TABLE `posttest_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posttest_result_user_id_FK` (`user_id`),
  ADD KEY `posttest_result_courses_id_FK` (`courses_id`),
  ADD KEY `posttest_result_question_id_FK` (`question_id`),
  ADD KEY `posttest_result_posttest_answer_id_FK` (`posttest_answer_id`);

--
-- Indexes for table `pretest`
--
ALTER TABLE `pretest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pretest_courses_id_FK` (`courses_id`);

--
-- Indexes for table `pretest_answer`
--
ALTER TABLE `pretest_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pretest_answer_question_id_FK` (`question_id`);

--
-- Indexes for table `pretest_result`
--
ALTER TABLE `pretest_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pretest_result_user_id_FK` (`user_id`),
  ADD KEY `pretest_result_courses_id_FK` (`courses_id`),
  ADD KEY `pretest_result_question_id_FK` (`question_id`),
  ADD KEY `pretest_result_pretest_answer_id_FK` (`pretest_answer_id`);

--
-- Indexes for table `register_courses`
--
ALTER TABLE `register_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_courses_id_courses_foregign` (`id_course`),
  ADD KEY `register_courses_id_users_foregign` (`id_users`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificate_setting`
--
ALTER TABLE `certificate_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificate_template`
--
ALTER TABLE `certificate_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses_type`
--
ALTER TABLE `courses_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lesson_files`
--
ALTER TABLE `lesson_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lesson_video`
--
ALTER TABLE `lesson_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posttest`
--
ALTER TABLE `posttest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posttest_answer`
--
ALTER TABLE `posttest_answer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posttest_result`
--
ALTER TABLE `posttest_result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pretest`
--
ALTER TABLE `pretest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pretest_answer`
--
ALTER TABLE `pretest_answer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pretest_result`
--
ALTER TABLE `pretest_result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `register_courses`
--
ALTER TABLE `register_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificate_setting`
--
ALTER TABLE `certificate_setting`
  ADD CONSTRAINT `certificate_setting_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificate_setting_ibfk_2` FOREIGN KEY (`certificate_template_id`) REFERENCES `certificate_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificate_template`
--
ALTER TABLE `certificate_template`
  ADD CONSTRAINT `certificate_template_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_type_id_foreign` FOREIGN KEY (`course_type_id`) REFERENCES `courses_type` (`id`),
  ADD CONSTRAINT `courses_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_id_course_foreign` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD CONSTRAINT `lesson_files_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `lesson_files_lessons_id_foreign` FOREIGN KEY (`lessons_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `lesson_video`
--
ALTER TABLE `lesson_video`
  ADD CONSTRAINT `lesson_video_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lesson_video_lessons_id_foreign` FOREIGN KEY (`lessons_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `posttest`
--
ALTER TABLE `posttest`
  ADD CONSTRAINT `posttest_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posttest_answer`
--
ALTER TABLE `posttest_answer`
  ADD CONSTRAINT `posttest_answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `posttest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posttest_result`
--
ALTER TABLE `posttest_result`
  ADD CONSTRAINT `posttest_result_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `posttest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posttest_result_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posttest_result_ibfk_3` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posttest_result_ibfk_4` FOREIGN KEY (`posttest_answer_id`) REFERENCES `posttest_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pretest`
--
ALTER TABLE `pretest`
  ADD CONSTRAINT `pretest_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pretest_answer`
--
ALTER TABLE `pretest_answer`
  ADD CONSTRAINT `pretest_answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `pretest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pretest_result`
--
ALTER TABLE `pretest_result`
  ADD CONSTRAINT `pretest_result_ibfk_2` FOREIGN KEY (`pretest_answer_id`) REFERENCES `pretest_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pretest_result_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pretest_result_ibfk_4` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pretest_result_ibfk_5` FOREIGN KEY (`question_id`) REFERENCES `pretest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register_courses`
--
ALTER TABLE `register_courses`
  ADD CONSTRAINT `register_courses_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_courses_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
