-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 02:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', '2025-01-04 12:51:16'),
(2, 'admin', 'admin1@gmail.com', '$2y$10$w2kFlHAvEP1D4KjmkKzN9u7kfvQ.RqFlow8CHL41URchPZSWQGKW2', '2025-01-04 13:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `email`, `phone`, `cover_letter`, `resume`, `date_applied`) VALUES
(1, 'onik', 'onik@gmail.com', '01780350722', 'tdeeeeeeeeeeeeeeeeeeeee', NULL, '2024-12-25 07:35:10'),
(2, 'onik', 'onik@gmail.com', '01780350722', 'tdeeeeeeeeeeeeeeeeeeeee', NULL, '2024-12-25 07:35:17'),
(3, 'onik', 'onikol@gmail.com', '01780350720', 'huhjhkjk', NULL, '2024-12-25 07:38:40'),
(4, 'onik', 'onikol@gmail.com', '01780350720', 'jhjhk', NULL, '2024-12-31 07:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `posted_on` date NOT NULL,
  `application_deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `location`, `job_type`, `description`, `salary`, `posted_on`, `application_deadline`) VALUES
(4, 'Software Engineer', 'Tech Innovators Ltd.', 'Dhaka', 'Full-time', 'Develop and maintain web applications. Requires expertise in PHP, JavaScript, and MySQL.', 'BDT 60,000', '2024-12-20', '2025-01-05'),
(5, 'Marketing Executive', 'BD Trade Corp.', 'Chattogram', 'Full-time', 'Plan and execute marketing campaigns for FMCG products.', 'BDT 40,000', '2024-12-18', '2025-01-02'),
(6, 'Graphics Designer', 'Creative Minds BD', 'Sylhet', 'Contractual', 'Create visual content for digital platforms. Proficiency in Adobe Photoshop is a must.', 'BDT 25,000', '2024-12-22', '2025-01-10'),
(7, 'Customer Support Officer', 'Trust Bank Limited', 'Dhaka', 'Part-time', 'Handle customer inquiries via phone and email.', 'BDT 18,000', '2024-12-19', '2025-01-03'),
(8, 'Civil Engineer', 'BuildTech Bangladesh', 'Rajshahi', 'Full-time', 'Oversee construction projects, ensuring quality and compliance with regulations.', 'BDT 55,000', '2024-12-21', '2025-01-07'),
(9, 'Content Writer', 'Digital BD Solutions', 'Dhaka', 'Remote', 'Write blog posts and website content. Strong English writing skills required.', 'BDT 20,000', '2024-12-23', '2025-01-15'),
(10, 'Data Analyst', 'FinTech BD', 'Dhaka', 'Full-time', 'Analyze financial data and create reports for stakeholders.', 'BDT 70,000', '2024-12-20', '2025-01-08'),
(11, 'HR Manager', 'Prime Group BD', 'Khulna', 'Full-time', 'Manage recruitment and employee relations for the company.', 'BDT 50,000', '2024-12-17', '2025-01-01'),
(12, 'Digital Marketing Manager', 'E-Shop Bangladesh', 'Dhaka', 'Full-time', 'Develop and implement digital marketing strategies to increase online sales.', 'BDT 45,000', '2024-12-22', '2025-01-12'),
(13, 'Junior Accountant', 'Best Accounting Firm', 'Barishal', 'Full-time', 'Assist with financial records and prepare reports.', 'BDT 30,000', '2024-12-18', '2025-01-05'),
(14, 'Mobile App Developer', 'Techify Solutions', 'Dhaka', 'Full-time', 'Develop and maintain mobile applications for Android and iOS.', 'BDT 65,000', '2024-12-24', '2025-01-15'),
(15, 'Social Media Manager', 'Social Boost BD', 'Chattogram', 'Remote', 'Manage social media accounts and campaigns to increase engagement.', 'BDT 35,000', '2024-12-23', '2025-01-10'),
(16, 'Electrical Engineer', 'PowerGrid Bangladesh Ltd.', 'Dhaka', 'Full-time', 'Design and maintain electrical systems for industrial projects.', 'BDT 60,000', '2024-12-22', '2025-01-08'),
(17, 'UI/UX Designer', 'Design Studio BD', 'Sylhet', 'Contractual', 'Create user-friendly designs for websites and mobile apps.', 'BDT 40,000', '2024-12-21', '2025-01-07'),
(18, 'Software Tester', 'QualityCode Solutions', 'Dhaka', 'Part-time', 'Perform testing of web and mobile applications to identify bugs.', 'BDT 30,000', '2024-12-20', '2025-01-06'),
(19, 'Project Manager', 'InfraTech BD', 'Rajshahi', 'Full-time', 'Manage infrastructure projects and coordinate with teams.', 'BDT 75,000', '2024-12-19', '2025-01-12'),
(20, 'Copywriter', 'Creative Words BD', 'Khulna', 'Remote', 'Write creative content for advertisements and marketing materials.', 'BDT 28,000', '2024-12-18', '2025-01-05'),
(21, 'Sales Executive', 'Global Trade Ltd.', 'Dhaka', 'Full-time', 'Identify and pursue sales opportunities to meet revenue targets.', 'BDT 32,000', '2024-12-17', '2025-01-02'),
(22, 'Operations Manager', 'Fast Delivery Service', 'Barishal', 'Full-time', 'Oversee daily operations and logistics for delivery services.', 'BDT 55,000', '2024-12-16', '2025-01-04'),
(23, 'Video Editor', 'MediaCraft BD', 'Dhaka', 'Contractual', 'Edit promotional videos and advertisements for clients.', 'BDT 25,000', '2024-12-15', '2025-01-03'),
(24, 'Database Administrator', 'DataSecure BD', 'Sylhet', 'Full-Time', 'Manage and optimize company databases for performance and security.', '323333', '2024-12-25', '2025-01-20'),
(25, 'SEO Specialist', 'Rank High Digital', 'Chattogram', 'Remote', 'Optimize websites for search engines to increase organic traffic.', 'BDT 40,000', '2024-12-24', '2025-01-10'),
(26, 'Network Engineer', 'TechNet BD', 'Dhaka', 'Full-time', 'Install and maintain network systems for corporate clients.', 'BDT 60,000', '2024-12-23', '2025-01-18'),
(27, 'Customer Care Executive', 'TeleSupport Ltd.', 'Rajshahi', 'Part-time', 'Provide customer support via phone and email for telecom services.', 'BDT 22,000', '2024-12-22', '2025-01-08'),
(28, 'Backend Developer', 'CodeCraft BD', 'Dhaka', 'Full-time', 'Develop server-side applications using Node.js and MySQL.', 'BDT 65,000', '2024-12-21', '2025-01-12'),
(29, 'Frontend Developer', 'WebTech BD', 'Khulna', 'Full-time', 'Design and implement user interfaces using React.js.', 'BDT 55,000', '2024-12-20', '2025-01-10'),
(30, 'IT Support Specialist', 'SysHelp BD', 'Barishal', 'Full-time', 'Provide technical support for hardware and software issues.', 'BDT 30,000', '2024-12-19', '2025-01-05'),
(31, 'Legal Advisor', 'Law Solutions BD', 'Dhaka', 'Part-time', 'Provide legal counsel on corporate and compliance matters.', 'BDT 50,000', '2024-12-18', '2025-01-07'),
(32, 'Product Manager', 'Innovative Products BD', 'Sylhet', 'Full-time', 'Oversee product development from ideation to launch.', 'BDT 80,000', '2024-12-17', '2025-01-20'),
(33, 'System Analyst', 'FutureTech Ltd.', 'Dhaka', 'Full-time', 'Analyze system requirements and propose efficient IT solutions.', 'BDT 70,000', '2024-12-16', '2025-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'jphyra', 'ewfkjhwekj@jkew.cpm', '$2y$10$0vh1n92.t3j7fCv.Qc2kCulkpYeEWEr.bqdYVMro.n4WzPMyjNbqC', '2024-12-25 07:00:52'),
(2, 'admin', 'admin@gmail.com', '$2y$10$F3M6tSJIbYyzy2onBoVJau48Eeb8MWcqc5.bQt.KpmB1vn2hBf7Zy', '2025-01-04 12:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
