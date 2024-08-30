-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2024 at 01:53 AM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MSION`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_industry`
--

CREATE TABLE `company_industry` (
  `id` int NOT NULL,
  `company_industry` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_industry`
--

INSERT INTO `company_industry` (`id`, `company_industry`, `email`) VALUES
(1, 'Social Media Management', 'atosin056@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE `company_services` (
  `id` int NOT NULL,
  `company_service` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_services`
--

INSERT INTO `company_services` (`id`, `company_service`, `email`) VALUES
(1, 'Software Development', 'atosin056@gmail.com'),
(2, 'App Development', 'atosin056@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_socials`
--

CREATE TABLE `company_socials` (
  `id` int NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `x` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_socials`
--

INSERT INTO `company_socials` (`id`, `facebook`, `x`, `youtube`, `linkedin`, `email`) VALUES
(1, NULL, NULL, NULL, 'tosin', 'atosin056@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_stack`
--

CREATE TABLE `company_stack` (
  `id` int NOT NULL,
  `company_stack` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_stack`
--

INSERT INTO `company_stack` (`id`, `company_stack`, `email`) VALUES
(1, 'DevOps', 'atosin056@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

CREATE TABLE `company_users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'none',
  `company_name` varchar(255) NOT NULL DEFAULT 'none',
  `company_website` varchar(255) NOT NULL DEFAULT 'none',
  `company_logo` varchar(255) NOT NULL DEFAULT 'none',
  `tagline` varchar(255) NOT NULL DEFAULT 'none',
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `founding_year` varchar(255) NOT NULL DEFAULT 'none',
  `company_size` varchar(255) NOT NULL DEFAULT 'none',
  `date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `unique_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_users`
--

INSERT INTO `company_users` (`id`, `email`, `password`, `company_name`, `company_website`, `company_logo`, `tagline`, `about`, `location`, `founding_year`, `company_size`, `date_created`, `unique_id`) VALUES
(1, 'atosin056@gmail.com', 'none', 'MSI Nigeria', 'http://msi.com', 'pfp.jpeg', 'Reproductive Choices', 'HIgh Tension<br><br>COnfession', 'Afghanistan', '1111', '500+ Employees', '2024-08-29 08:31:38.417936', '2f4116799197fee23d0cf33487832eaa');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int NOT NULL,
  `skills` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `jobdescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cv_rating` varchar(255) NOT NULL,
  `jobtype` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `application_link` varchar(255) DEFAULT NULL,
  `unique_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `company_logo` varchar(255) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `timecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `requirements` text,
  `responsibilities` text,
  `questions` text NOT NULL,
  `requirements_text` text,
  `responsibilities_text` text,
  `questions_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `jobtitle`, `jobdescription`, `cv_rating`, `jobtype`, `currency`, `salary`, `application_link`, `unique_id`, `company_name`, `status`, `company_logo`, `company_location`, `timecreated`, `deadline`, `location`, `requirements`, `responsibilities`, `questions`, `requirements_text`, `responsibilities_text`, `questions_text`) VALUES
(3, 'Web development', 'Nike is more than a brand; it\'s a movement that connects athletes, communities, and the world through the love of sport. Our diverse range of products, from footwear to apparel and equipment, is designed to help athletes of all levels reach their full potential. We collaborate with the best athletes, coaches, and teams to constantly push the boundaries of performance and style.', '1', 'Internship', 'SHP', '322', 'http://exa.com', '9f61408e3afb633e50cdf1b20de6f466', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Nigeria', '2024-08-29 13:03:16', '2024-08-12', 'Remote', NULL, NULL, '', NULL, NULL, NULL),
(4, 'Project Manager', 'Nike is more than a brand; it\'s a movement that connects athletes, communities, and the world through the love of sport. Our diverse range of products, from footwear to apparel and equipment, is designed to help athletes of all levels reach their full potential. We collaborate with the best athletes, coaches, and teams to constantly push the boundaries of performance and style.', '1', 'part-time', 'SHP', '566000', 'http://tosin.com', '17e62166fc8586dfa4d1bc0e1742c08b', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-08-29 13:18:10', '2024-08-19', 'onsite', NULL, NULL, '', NULL, NULL, NULL),
(9, 'ss', 'ssa', '1', 'Internship', 'CHF', '234567890', 'http://lobvelydate.com', 'f0935e4cd5920aa6c7c996a5ee53a70f', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-08-30 00:26:56', '2024-08-30', 'onsite', 'a', 'syd', 'ddaa', '<li>a</li><li>s</li><li>s</li><li>s</li><li>s</li><li>ss</li><li></li>', '<li>dyyf</li><li>f</li><li>f</li><li>f</li><li>f</li><li>f</li>', '<li>uyu</li><li>e</li><li>e</li><li>e</li><li>e</li><li>e</li><li></li>');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `stack_name` varchar(255) NOT NULL,
  `stack_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `stack_name`, `stack_picture`) VALUES
(1, 'Artificial Intelligence', 'AI.png'),
(2, 'Angular', 'Angular.png'),
(3, 'Atom', 'Atom.png'),
(4, 'AWS', 'AWS (1).png'),
(5, 'Azure', 'Azure.png'),
(6, 'Babel', 'Babel.png'),
(7, 'Blockchain', 'Blockchain.png'),
(8, 'C++', 'c++.png'),
(9, 'C#', 'C%23.png'),
(10, 'Canva', 'Canva.png'),
(11, 'Cloud computing', 'Cloud computing.png'),
(12, 'Cyber security', 'Cybersecurity.png'),
(13, 'Dart', 'Dart.png'),
(14, 'Data scienece', 'Data science.png'),
(15, 'Dev ops', 'DevOps.png'),
(16, 'Django', 'Django.png'),
(17, 'Docker', 'Docker.png'),
(18, 'Eclipse', 'Eclipse.png'),
(19, 'ElasticSearch', 'ElasticSearch.png'),
(20, 'Express Js', 'Express Js.png'),
(21, 'Figma', 'figma.png'),
(22, 'Flask', 'Flask.png'),
(23, 'Flutter', 'Flutter.png'),
(24, 'GCP', 'GCP.png'),
(25, 'Git', 'Git.png'),
(26, 'Go', 'Go.png'),
(27, 'Google Analytics', 'Google Analytics.png'),
(28, 'Google Play', 'Google Play.png'),
(29, 'Gradle', 'Gradle.png'),
(30, 'HTML', 'html.png'),
(31, 'InteliJ IDEA', 'IntelliJ IDEA.png'),
(32, 'java', 'java.png'),
(33, 'Jenkins', 'Jenkins.png'),
(34, 'JIRA', 'JIRA.png'),
(35, 'Js', 'js.png'),
(36, 'Kotlin', 'Kotlin.png'),
(37, 'Kurbenetes', 'Kurbenetes.png'),
(38, 'Laravel', 'Laravel.png'),
(39, 'Machine Learning', 'Machine Learning.png'),
(40, 'Maven', 'Maven.png'),
(41, 'Microsoft Teams', 'Microsoft Teams.png'),
(42, 'Mongo DB', 'Mongo DB.png'),
(43, 'MySql', 'mysql.png'),
(44, 'Next.js', 'Next.js.png'),
(45, 'Node.js', 'Node.js.png'),
(46, 'NPM', 'NPM.png'),
(47, 'Odoo', 'Odoo.png'),
(48, 'PHP', 'php (2).png'),
(49, 'Postgress SQL', 'Postgres SQL.png'),
(50, 'Power BI', 'Power BI.png'),
(51, 'Pycharm', 'Pycharm.png'),
(52, 'React', 'React.png'),
(53, 'Ruby', 'ruby.png'),
(54, 'Ruby on Rails', 'Ruby on Rails.png'),
(55, 'Sass', 'Sass.png'),
(56, 'Slack', 'slack.png'),
(57, 'Spring Boot', 'Spring boot.png'),
(58, 'SQL', 'SQL.png'),
(59, 'Sublime Text', 'Sublime Text.png'),
(60, 'Swift', 'swift.png'),
(61, 'Tableau', 'Tableau.png'),
(62, 'Tailwind', 'Tailwind.png'),
(63, 'Terraform', 'Terraform.png'),
(64, 'Typescript', 'typescript.png'),
(65, 'Visual Studio Code', 'Visual studio code.png'),
(66, 'Vue.js', 'Vue.js.png'),
(67, 'Webflow', 'Webflow.png'),
(68, 'Web Pack', 'Web pack.png'),
(69, 'Yarn', 'Yarn.png'),
(70, 'Bootstrap', 'bootstrap.png'),
(71, 'Python', 'python.png'),
(72, 'CSS', 'css.png'),
(73, 'Javascript', 'Javascript.png');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int NOT NULL,
  `otp` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `otp`, `email`, `date_created`) VALUES
(1, 65118, 'fenwakehinde538@gmail.com', '2024-08-29 08:26:25.449664'),
(2, 83116, 'atosin056@gmail.com', '2024-08-29 08:29:32.878861'),
(3, 89781, 'anifemi513@gmail.com', '2024-08-29 14:04:15.393260'),
(4, 79491, 'atosin056@gmail.com', '2024-08-29 14:04:33.848263'),
(5, 51217, 'atosin056@gmail.com', '2024-08-29 14:04:44.841744'),
(6, 45381, 'atosin056@gmail.com', '2024-08-29 14:08:50.760269'),
(7, 71224, 'atosin056@gmail.com', '2024-08-29 14:11:06.563306'),
(8, 98797, 'atosin056@gmail.com', '2024-08-29 14:16:10.485977'),
(9, 27855, 'atosin056@gmail.com', '2024-08-29 14:16:11.317124'),
(10, 18842, 'atosin056@gmail.com', '2024-08-29 14:19:41.387303'),
(11, 86715, 'atosin056@gmail.com', '2024-08-29 14:29:17.402891');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` int NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `unique_id`, `email`) VALUES
(1, 'f0935e4cd5920aa6c7c996a5ee53a70f', 'fenwakehinde538@gmail.com'),
(2, '17e62166fc8586dfa4d1bc0e1742c08b', 'fenwakehinde538@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `email`) VALUES
(1, 'Strategic Planning', 'fenwakehinde538@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'undefined',
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'undefined',
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'undefined',
  `x` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'undefined',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `linkedin`, `youtube`, `x`, `email`) VALUES
(1, NULL, 'http://tsin.com', NULL, NULL, 'fenwakehinde538@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stack`
--

CREATE TABLE `stack` (
  `id` int NOT NULL,
  `stack` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stack`
--

INSERT INTO `stack` (`id`, `stack`, `email`) VALUES
(1, 'Angular', 'fenwakehinde538@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int NOT NULL,
  `tag` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`, `unique_id`, `company_name`) VALUES
(1, 'House Cleaning', 'e205ee2a5de471a70c1fd1b46033a75f', 'MSI Nigeria'),
(2, 'SEO Optimization', 'a97da629b098b75c294dffdc3e463904', 'MSI Nigeria'),
(3, 'SEO Optimization', 'd67d8ab4f4c10bf22aa353e27879133c', 'MSI Nigeria'),
(4, 'SEO Optimization', 'a5bfc9e07964f8dddeb95fc584cd965d', 'MSI Nigeria'),
(5, 'SEO Optimization', '093f65e080a295f8076b1c5722a46aa2', 'MSI Nigeria'),
(6, 'SEO Optimization', 'e70611883d2760c8bbafb4acb29e3446', 'MSI Nigeria'),
(7, 'SEO Optimization', 'e2ef524fbf3d9fe611d5a8e90fefdc9c', 'MSI Nigeria'),
(8, 'SEO Optimization', '00ac8ed3b4327bdd4ebbebcb2ba10a00', 'MSI Nigeria'),
(9, 'SEO Optimization', '9f61408e3afb633e50cdf1b20de6f466', 'MSI Nigeria'),
(10, 'App Development', '087408522c31eeb1f982bc0eaf81d35f', 'MSI Nigeria'),
(11, 'App Development', 'b53b3a3d6ab90ce0268229151c9bde11', 'MSI Nigeria'),
(12, 'App Development', 'f4b9ec30ad9f68f89b29639786cb62ef', 'MSI Nigeria'),
(13, 'App Development', 'a684eceee76fc522773286a895bc8436', 'MSI Nigeria'),
(14, 'App Development', 'd82c8d1619ad8176d665453cfb2e55f0', 'MSI Nigeria'),
(15, 'Web Development', 'c9e1074f5b3f9fc8ea15d152add07294', 'MSI Nigeria'),
(16, 'Web Development', 'ad61ab143223efbc24c7d2583be69251', 'MSI Nigeria'),
(17, 'Web Development', '9f61408e3afb633e50cdf1b20de6f466', 'MSI Nigeria'),
(18, 'Web Development', '17e62166fc8586dfa4d1bc0e1742c08b', 'MSI Nigeria'),
(19, 'UI/UX Design', '2a38a4a9316c49e5a833517c45d31070', 'MSI Nigeria'),
(20, 'Pet Care', '182be0c5cdcd5072bb1864cdee4d3d6e', 'MSI Nigeria'),
(21, 'Social Media Management', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria'),
(22, 'Tutoring', '98dce83da57b0395e163467c9dae521b', 'MSI Nigeria'),
(23, 'Social Media Management', 'f0935e4cd5920aa6c7c996a5ee53a70f', 'MSI Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `unique_id` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'msiondefaultpassword',
  `fullname` varchar(255) NOT NULL DEFAULT ' ',
  `title` varchar(255) NOT NULL DEFAULT ' ',
  `profile` varchar(255) NOT NULL DEFAULT '',
  `cv` varchar(255) NOT NULL DEFAULT '',
  `biography` text,
  `looking` text,
  `acct_status` varchar(255) NOT NULL DEFAULT 'unverified',
  `cv_rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'none',
  `date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `email`, `password`, `fullname`, `title`, `profile`, `cv`, `biography`, `looking`, `acct_status`, `cv_rating`, `date_created`) VALUES
(1, '6fd72fff64d6a609c3507b05c11a971d', 'fenwakehinde538@gmail.com', '8b8db4833d8a0cd3e6405493647d1207', 'Kehinde Akinfenwa', 'Web designer', 'pfp.jpg', 'Yo THis is my cv i am a designer with 1 month of e.docx', 'Lemme cry', 'Lemme cry', 'unverified', '1', '2024-08-29 08:28:36.186538');

-- --------------------------------------------------------

--
-- Table structure for table `user_experience`
--

CREATE TABLE `user_experience` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'none',
  `company_name` varchar(255) NOT NULL DEFAULT 'none',
  `company_website` varchar(255) NOT NULL DEFAULT 'none',
  `location` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_industry`
--
ALTER TABLE `company_industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_socials`
--
ALTER TABLE `company_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_stack`
--
ALTER TABLE `company_stack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_users`
--
ALTER TABLE `company_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stack`
--
ALTER TABLE `stack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_industry`
--
ALTER TABLE `company_industry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_services`
--
ALTER TABLE `company_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_socials`
--
ALTER TABLE `company_socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_stack`
--
ALTER TABLE `company_stack`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_users`
--
ALTER TABLE `company_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stack`
--
ALTER TABLE `stack`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
