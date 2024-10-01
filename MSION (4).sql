-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2024 at 08:37 PM
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
-- Database: `MSI Nigeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `coverletter` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `cv_rating` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `fname`, `title`, `phone`, `coverletter`, `email`, `cv`, `cv_rating`, `stage`, `application_status`, `job_id`, `company_name`, `date_entered`) VALUES
(14, 'Oluwole Farounbi', 'Web developer', '080 244 282 01', 'Random text as my cover letter', 'raphael.farounbi@gmail.com', 'Dinesh Mer Cv2.docx', '1', 'Questioning', 'nothing', '6974ce5ac660610b44d9b9fed0ff9548', 'MSI Nigeria', '2024-09-21 12:41:03'),
(15, 'Oluwole Farounbi', 'Web developer', '123 456 789 0', 'Edima', 'raphael.farounbi@gmail.com', 'Dinesh Mer Cv2.docx', '1', 'Questioning', 'nothing', '182be0c5cdcd5072bb1864cdee4d3d6e', 'MSI Nigeria', '2024-09-22 22:34:12'),
(16, 'Oluwole Farounbi', 'Web developer', '123 456 789 0', 'efghjkl', 'raphael.farounbi@gmail.com', 'Dinesh Mer Cv2.docx', '1', 'Questioning', 'nothing', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria', '2024-09-22 22:38:52'),
(17, 'Oluwole Farounbi', 'Web developer', '116 161 616 161 616 161 6', 'Test', 'raphael.farounbi@gmail.com', 'Dinesh Mer Cv2.docx', '1', 'Questioning', 'nothing', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria', '2024-09-22 23:00:38'),
(18, 'Oluwatosin AKinfenwa', 'Web developer', '234 567 89', '0etetetet', 'fenwakehinde538@gmail.com', 'Generated_CV (7).docx', '4', 'Questioning', 'nothing', '33e75ff09dd601bbe69f351039152189', 'MSI Nigeria', '2024-09-22 23:01:41'),
(19, 'Oluwole Farounbi', 'Web developer', '098 765 432 34', 'This is text for the cover letter', 'raphael.farounbi@gmail.com', 'Dinesh Mer Cv2.docx', '1', 'Questioning', 'nothing', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria', '2024-09-29 20:23:06');

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
(1, NULL, NULL, NULL, 'http://tosin.com', 'atosin056@gmail.com');

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
(1, 'atosin056@gmail.com', '5ab90023793d6d7cb4e28235e9f265c5', 'MSI Nigeria', 'http://msi.com', 'pfp.jpeg', 'Reproductive Choices', 'This is  for test<br>', 'Afghanistan', '1111', '500+ Employees', '2024-09-21 11:39:43.836895', '2f4116799197fee23d0cf33487832eaa');

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

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `skills`, `company_name`, `email`) VALUES
(1, 'Project Management', 'McGeorgeConsultingLTD', 'anifemi513@gmail.com'),
(2, 'Public Speaking', 'McGeorgeConsultingLTD', 'anifemi513@gmail.com'),
(3, 'Public Speaking', 'McGeorgeConsultingLTD', 'fenwakehinde538@gmail.com'),
(4, 'PHP', 'McGeorgeConsultingLTD', 'fenwakehinde538@gmail.com'),
(5, 'Mysql', 'McGeorgeConsultingLTD', 'fenwakehinde538@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

CREATE TABLE `hired` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
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
  `questions_text` text,
  `applicants` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `jobtitle`, `jobdescription`, `cv_rating`, `jobtype`, `currency`, `salary`, `application_link`, `unique_id`, `company_name`, `status`, `company_logo`, `company_location`, `timecreated`, `deadline`, `location`, `requirements`, `responsibilities`, `questions`, `requirements_text`, `responsibilities_text`, `questions_text`, `applicants`) VALUES
(1, 'Senior developer', 'My design philosophy centers around a user-centric approach, where every design decision is informed by a deep understanding of the target audience and their needs. Whether designing a logo, website, app or physical product, I focus on creating experiences that are intuitive, engaging, and memorable.\r\nWith a keen eye for aesthetics and a strong understanding of design principles, I bring a unique perspective to every project. From conceptualization to execution, I am committed to delivering designs that not only look great but also perform well in the real world.', '1', 'Internship', 'MAD', '20000', 'http://tosin.com', '182be0c5cdcd5072bb1864cdee4d3d6e', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-22 22:34:12', '2024-09-01', 'onsite', 'Job Requirements', 'Responsibilities', 'Nazareth', '<li class=\"responsibilities\">Tosin</li><li class=\"responsibilities\">is</li><li class=\"responsibilities\">the</li><li class=\"responsibilities\">2nd best</li><li class=\"responsibilities\">teenage</li><li class=\"responsibilities\">programmer</li>', '<li class=\"responsibilities\">Tosin</li><li class=\"responsibilities\">is</li><li class=\"responsibilities\">a</li><li class=\"responsibilities\">good</li><li class=\"responsibilities\">boy</li>', '<li class=\"responsibilities\">wahala</li><li class=\"responsibilities\">pro</li><li class=\"responsibilities\">max</li>', '1'),
(2, 'Mr Joshua', 'Mr Joshua ', '1', 'part-time', 'EGP', '23456789', 'http://example.com', '6974ce5ac660610b44d9b9fed0ff9548', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-21 12:41:03', '2019-11-30', 'Remote', 'Responsibilities', 'Responsibilities', 'Testing', '<li class=\"responsibilities\">You</li><li class=\"responsibilities\">Need</li><li class=\"responsibilities\">to</li><li class=\"responsibilities\">be</li><li class=\"responsibilities\">a</li><li class=\"responsibilities\">dev</li>', '<li class=\"responsibilities\">Mr</li><li class=\"responsibilities\">Joshua</li><li class=\"responsibilities\">is</li><li class=\"responsibilities\">a</li><li class=\"responsibilities\">dev</li>', '<li class=\"responsibilities\">Test</li><li class=\"responsibilities\">I</li><li class=\"responsibilities\">am</li><li class=\"responsibilities\">testing</li>', '1'),
(3, 'Frontend Developer', 'We are a Digital Product Engineering company that is scaling in a big way! We build products, services, and experiences that inspire, excite, and delight. We work at scale — across all devices and digital mediums, and our people exist everywhere in the world (18000+ experts across 36 countries, to be exact). Our work culture is dynamic and non-hierarchical. We are looking for great new colleagues. That\'s where you come in!', '1', 'full-time', 'NOK', '20000', 'http://example.com', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-22 22:38:52', '2024-09-03', 'Remote', 'Responsibilities', 'Requirements', 'Employee Benefits', '<li class=\"responsibilities\">Build web applications with web development best practices</li><li class=\"responsibilities\">Basic understanding of user interface and user experience (UI/UX) design</li><li class=\"responsibilities\">Work with UI/UX Designer to transform wireframes and mock-ups into usable/reusable front-end code with HTML, CSS, and JavaScript.</li><li class=\"responsibilities\">Work with back-end developers to integrate UI components with APIs and databases</li><li class=\"responsibilities\">Optimizing components for maximum performance across a vast array of web-capable devices, mobile and desktop browsers</li><li class=\"responsibilities\">Write high-quality, scalable, and reusable code</li><li class=\"responsibilities\">Collaborate with other teams to identify and resolve complex technical issues</li><li class=\"responsibilities\">Attention to detail</li>', '<li class=\"responsibilities\">Minimum of 3+ year of experience developing modern, responsive, and cross-browser-compatible websites using HTML, CSS, and JavaScript</li><li class=\"responsibilities\">Knowledge of JavaScript frameworks such as Vue and React.</li><li class=\"responsibilities\">Experience with JavaScript libraries such as jQuery and Bootstrap</li><li class=\"responsibilities\">Familiarity with CSS preprocessors such as Sass, Less, or Stylus</li><li class=\"responsibilities\">Experience with building tools such as Gulp, or Webpack</li><li class=\"responsibilities\">MUST HAVE real world experience working on a project</li><li class=\"responsibilities\">Include your CV and portfolio links in the email for easy access.</li>', '<li class=\"responsibilities\">Life insurance</li><li class=\"responsibilities\">Wahala</li>', '1'),
(4, 'Tosin', 'Tosin', '1', 'Internship', 'SHP', '2222222', 'htttp://susususus.com', '642e92efb79421734881b53e1e1b18b6', 'none', 'Active', 'none', '', '2024-09-09 21:55:00', '2024-09-09', 'onsite', 'Requirements', 're', 'u', '<li class=\"responsibilities\">Must be a web developer</li>', '<li class=\"responsibilities\">syssysyya</li>', '<li class=\"responsibilities\">ssysyy</li>', '0'),
(5, 'Project manager', 'PM', '1', 'Volunteer', 'SHP', '345678', 'http://lobvelydate.com', '33e75ff09dd601bbe69f351039152189', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-22 23:01:41', '2024-09-09', 'onsite', 'Requirements', 's', 's', '<li class=\"responsibilities\">Must be a website developer</li><li class=\"responsibilities\">Must have more that 6months of experience</li><li class=\"responsibilities\">Must know PHP</li>', '<li class=\"responsibilities\">ssss</li><li class=\"responsibilities\">s</li><li class=\"responsibilities\">s</li><li class=\"responsibilities\">s</li><li class=\"responsibilities\">s</li><li class=\"responsibilities\"></li>', '<li class=\"responsibilities\"></li><li class=\"responsibilities\">ssss</li>', '1'),
(6, 'Top Notch Web developer', 'Website developer with over 4years of exp', '4', 'Internship', 'SLL', '5000', 'http://tosin.com', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-22 23:00:38', '2024-09-10', 'onsite', 'Requirements', 'Responsibilities', 'wydtedtu', '<li class=\"responsibilities\">Must be willing to learn</li><li class=\"responsibilities\">Must be good in PHP</li><li class=\"responsibilities\">Must be good in MYSQL</li><li class=\"responsibilities\">Must be good in HTML</li>', '<li class=\"responsibilities\">dstduysa</li>', '<li class=\"responsibilities\">yudtwuqttwyuqtu</li>', '1'),
(7, 'web developer', 'Website developer with over 8 years', '5', 'full-time', '', '20000', 'http://tosin.com', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria', 'Active', 'pfp.jpeg', 'Afghanistan', '2024-09-29 20:23:06', '2024-09-29', 'onsite', 'Requirements', 'Responsibilities', 'Random text', '<li class=\"responsibilities\">Must know PHP</li><li class=\"responsibilities\">Must know MYSQL</li><li class=\"responsibilities\">Must Know Javascript</li><li class=\"responsibilities\">Must have a good academic Background</li><li class=\"responsibilities\">Must know HTML</li>', '<li class=\"responsibilities\">These are the following responsibilities</li><li class=\"responsibilities\">must be good</li>', '<li class=\"responsibilities\">THese </li><li class=\"responsibilities\">are</li><li class=\"responsibilities\">random</li>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_filters`
--

CREATE TABLE `job_filters` (
  `id` int NOT NULL,
  `filter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_filters`
--

INSERT INTO `job_filters` (`id`, `filter`) VALUES
(1, 'Asset mnagement'),
(2, 'Audit compilance'),
(3, 'Clinical Services'),
(4, 'Commercial'),
(5, 'Corporate services'),
(6, 'Finance Health'),
(7, 'Human Resource Administration'),
(8, 'Information Technology'),
(9, 'Integrated marketing'),
(10, 'Legal compilance'),
(11, 'Logistics'),
(12, 'Marketing and strategic communication'),
(13, 'Marketing and strategic comunication'),
(14, 'Consultancy'),
(15, 'NGOs'),
(16, 'Operation'),
(17, 'Pharmacy');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `sender` varchar(255) NOT NULL,
  `reciever` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `reciever`, `message`, `date_created`) VALUES
(1, 'atosin056@gmail.com', 'raphael.farounbi@gmail.com', 'yo whatsupp this is a test from Tosin<br>', '2024-09-29 20:29:37');

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
(1, 55247, 'anifemi513@gmail.com', '2024-09-02 15:26:36.915971'),
(2, 67243, 'fenwakehinde538@gmail.com', '2024-09-02 21:24:52.492266'),
(3, 28494, 'atosin056@gmail.com', '2024-09-02 21:53:08.892148'),
(4, 92917, 'fenwakehinde538@gmail.com', '2024-09-02 22:22:42.390176'),
(5, 47843, 'anifemi513@gmail.com', '2024-09-02 22:26:17.782030'),
(6, 73698, 'fenwakehinde538@gmail.com', '2024-09-03 17:02:00.117893'),
(7, 78359, 'ngodukwe@gmail.com', '2024-09-03 21:51:13.245881'),
(8, 99556, 'fenwakehinde538@gmail.com', '2024-09-03 22:11:24.297796'),
(9, 65314, 'okunoyerexd@gmail.com', '2024-09-04 11:47:47.863169'),
(10, 26325, 'rexpauldrex5@gmail.com', '2024-09-04 11:48:49.665619'),
(11, 16176, 'rexpauldrex5@gmail.com', '2024-09-04 11:52:36.576297'),
(12, 45263, 'anifemi513@gmail.com', '2024-09-09 20:23:21.202692'),
(14, 62768, 'fenwakehinde538@gmail.com', '2024-09-10 11:20:14.075872'),
(15, 24831, 'fenwakehinde538@gmail.com', '2024-09-10 15:36:02.974410'),
(16, 25689, 'raphael.farounbi@gmail.com', '2024-09-12 14:04:15.012423');

-- --------------------------------------------------------

--
-- Table structure for table `rejected`
--

CREATE TABLE `rejected` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` int NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 'Public Speaking', 'anifemi513@gmail.com'),
(2, 'Problem Solving', 'anifemi513@gmail.com'),
(3, 'Project Management', 'anifemi513@gmail.com'),
(4, 'Photography', 'anifemi513@gmail.com'),
(5, 'Supply Chain Management', 'fenwakehinde538@gmail.com'),
(6, 'Auditing', 'fenwakehinde538@gmail.com'),
(7, 'Photography', 'fenwakehinde538@gmail.com'),
(8, 'Strategic Planning', 'ngodukwe@gmail.com'),
(9, 'Accounting', 'ngodukwe@gmail.com'),
(10, 'Supply Chain Management', 'fenwakehinde538@gmail.com'),
(11, 'Accounting', 'fenwakehinde538@gmail.com'),
(12, 'Asset Management', 'fenwakehinde538@gmail.com'),
(13, 'Portfolio Management', 'rexpauldrex5@gmail.com'),
(14, 'Public Speaking', 'rexpauldrex5@gmail.com'),
(15, 'Agile Methodology', 'rexpauldrex5@gmail.com'),
(16, 'Auditing', 'rexpauldrex5@gmail.com'),
(17, 'Team Management', 'fenwakehinde538@gmail.com'),
(18, 'Auditing', 'fenwakehinde538@gmail.com'),
(19, 'Wealth Management', 'fenwakehinde538@gmail.com'),
(20, 'Accounting', 'fenwakehinde538@gmail.com'),
(21, 'Brand Management', 'fenwakehinde538@gmail.com'),
(22, 'Business Development', 'raphael.farounbi@gmail.com'),
(23, 'Public Speaking', 'raphael.farounbi@gmail.com'),
(24, 'Project Management', 'raphael.farounbi@gmail.com');

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
(1, 'http://facebook.com', NULL, NULL, 'http://x.com', 'anifemi513@gmail.com'),
(2, NULL, NULL, NULL, 'U no go no', 'fenwakehinde538@gmail.com'),
(3, NULL, NULL, NULL, 'http://x.com', 'ngodukwe@gmail.com'),
(4, 'http://facebook.com', NULL, NULL, 'http://x.com', 'fenwakehinde538@gmail.com'),
(5, NULL, NULL, NULL, 'http://x.com', 'rexpauldrex5@gmail.com'),
(6, 'http://facebook.com', NULL, NULL, NULL, 'fenwakehinde538@gmail.com'),
(7, NULL, NULL, NULL, 'http://Tosin.com', 'fenwakehinde538@gmail.com'),
(8, 'http://facebook.com', NULL, NULL, 'http://x.com', 'fenwakehinde538@gmail.com'),
(9, 'http://facebook.com', NULL, NULL, 'http://x.com', 'raphael.farounbi@gmail.com');

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
(1, 'Angular', 'fenwakehinde538@gmail.com'),
(2, 'Figma', 'anifemi513@gmail.com'),
(3, 'Sketchbook', 'anifemi513@gmail.com'),
(4, 'PHP', 'anifemi513@gmail.com'),
(5, 'MySql', 'anifemi513@gmail.com'),
(6, 'Bootstrap', 'anifemi513@gmail.com'),
(7, 'HTML', 'anifemi513@gmail.com'),
(8, 'CSS', 'anifemi513@gmail.com'),
(9, 'JavaScript', 'anifemi513@gmail.com'),
(10, 'Figma', 'fenwakehinde538@gmail.com'),
(11, 'Sublime Text', 'fenwakehinde538@gmail.com'),
(12, 'SQL', 'fenwakehinde538@gmail.com'),
(13, 'Python', 'ngodukwe@gmail.com'),
(14, 'PyCharm', 'ngodukwe@gmail.com'),
(15, 'Python', 'fenwakehinde538@gmail.com'),
(16, 'PHP', 'rexpauldrex5@gmail.com'),
(17, 'MySql', 'rexpauldrex5@gmail.com'),
(18, 'JavaScript', 'rexpauldrex5@gmail.com'),
(19, 'HTML', 'rexpauldrex5@gmail.com'),
(20, 'CSS', 'rexpauldrex5@gmail.com'),
(21, 'PHP', 'fenwakehinde538@gmail.com'),
(22, 'MySql', 'fenwakehinde538@gmail.com'),
(23, 'JavaScript', 'fenwakehinde538@gmail.com'),
(24, 'PHP', 'fenwakehinde538@gmail.com'),
(25, 'MySql', 'fenwakehinde538@gmail.com'),
(26, 'HTML', 'fenwakehinde538@gmail.com'),
(27, 'CSS', 'fenwakehinde538@gmail.com'),
(28, 'JavaScript', 'fenwakehinde538@gmail.com'),
(29, 'TypeScript', 'fenwakehinde538@gmail.com'),
(30, 'PHP', 'fenwakehinde538@gmail.com'),
(31, 'MySql', 'fenwakehinde538@gmail.com'),
(32, 'PHP', 'raphael.farounbi@gmail.com'),
(33, 'MySql', 'raphael.farounbi@gmail.com'),
(34, 'JavaScript', 'raphael.farounbi@gmail.com'),
(35, 'HTML', 'raphael.farounbi@gmail.com'),
(36, 'CSS', 'raphael.farounbi@gmail.com'),
(37, 'Bootstrap', 'raphael.farounbi@gmail.com');

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
(23, 'Social Media Management', 'f0935e4cd5920aa6c7c996a5ee53a70f', 'MSI Nigeria'),
(24, 'coder', '182be0c5cdcd5072bb1864cdee4d3d6e', 'MSI Nigeria'),
(25, 'Web Development', '182be0c5cdcd5072bb1864cdee4d3d6e', 'MSI Nigeria'),
(26, 'Design', '6974ce5ac660610b44d9b9fed0ff9548', 'MSI Nigeria'),
(27, 'Data Analysis', '6974ce5ac660610b44d9b9fed0ff9548', 'MSI Nigeria'),
(28, 'Design', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria'),
(29, 'HTML', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria'),
(30, 'CSS', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria'),
(31, 'JavaScript', '1ff1de774005f8da13f42943881c655f', 'MSI Nigeria'),
(32, 'Technical Support', '642e92efb79421734881b53e1e1b18b6', 'none'),
(33, 'Tutoring', '33e75ff09dd601bbe69f351039152189', 'MSI Nigeria'),
(34, 'PHP', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria'),
(35, 'MYSQL', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria'),
(36, 'HTML', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria'),
(37, 'Web Development', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria'),
(38, 'Well Paying Job', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'MSI Nigeria'),
(39, 'UI/UX Design', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria'),
(40, 'JS', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria'),
(41, 'Web Development', '93db85ed909c13838ff95ccfa94cebd9', 'MSI Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `unique_id` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'MSI Nigeriadefaultpassword',
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
(4, 'b9e709f4f1746948deb89e8928f336f9', 'ngodukwe@gmail.com', 'ce3d5c6962431277e619a87c265b1ef9', ' ', ' ', '', 'Yo THis is my cv i am a designer with 1 month of e.docx', 'I am a dev', 'I am a sweet dev', 'unverified', '1', '2024-09-03 22:05:14.739313'),
(7, '9b6b49274600928e603580cb381b299e', 'rexpauldrex5@gmail.com', '2865511fba343b0439a083d613ab561b', 'Okunoye Paul', 'Web designer', 'paul.jpeg', 'paul_cv.docx', 'bobo ', 'bobo\r\n\r\n', 'unverified', '1', '2024-09-04 12:09:10.334982'),
(8, '8a662c4cd8df28eeda49c30da8bcb92c', 'anifemi513@gmail.com', 'cf5990a88eb5e103909367feb4c50cad', ' ', ' ', '', 'Student Report Cards.docx', NULL, NULL, 'unverified', '1', '2024-09-09 20:27:04.647291'),
(11, 'd28acd9aa6e17da2fcae2f8cbf37a658', 'fenwakehinde538@gmail.com', '5ab90023793d6d7cb4e28235e9f265c5', 'Oluwatosin AKinfenwa', 'Web developer', 'lol.jpeg', 'Generated_CV (7).docx', 'I am a website develoepr with proficiency in HTML, CSS, PHP, MYSQL, JS, Bootstrap', 'A well paying Job', 'unverified', '4', '2024-09-10 15:51:24.369400'),
(12, 'bbdb0cfaa0aa5edafa32b832117a5bd9', 'raphael.farounbi@gmail.com', '2f308b1f9f41bbb6af34941f3837d360', 'Oluwole Farounbi', 'Web developer', 'engr2.jpeg', 'Dinesh Mer Cv2.docx', 'I am a Good website developer<br>yes Tosin Did it<br>					', 'I know HTML\r\nCSS\r\nJS\r\nPHP\r\nMYSQL', 'unverified', '1', '2024-09-14 08:48:31.242916');

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
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`id`, `email`, `company_name`, `company_website`, `location`, `role`, `start_date`, `end_date`) VALUES
(1, 'anifemi513@gmail.com', 'McGeorgeConsultingLTD', 'http://mcgeorgeconsulting.com', 'Ilorin', 'Intern', 'January 2024', 'Present'),
(2, 'anifemi513@gmail.com', 'McGeorgeConsultingLTD', 'http://mcgeorgeconsulting.com', 'Ilorin', 'Intern', 'January 2024', 'Present'),
(3, 'fenwakehinde538@gmail.com', 'McGeorgeConsultingLTD', 'http://mcgeorgeconsulting.com', 'Ilorin', 'Intern', 'January 2024', 'Present'),
(4, 'fenwakehinde538@gmail.com', 'McGeorgeConsultingLTD', 'http://mcgeorgeconsulting.com', 'Ilorin', 'Intern', 'January 2024', 'Present'),
(5, 'fenwakehinde538@gmail.com', 'McGeorgeConsultingLTD', 'http://mcgeorgeconsulting.com', 'Ilorin', 'Intern', 'January 2024', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `visit` datetime NOT NULL,
  `next_week` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `unique_id`, `visit`, `next_week`) VALUES
(1, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(2, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(3, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(4, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(5, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(6, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(7, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(8, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(9, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(10, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(11, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(12, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(13, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(14, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(15, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00'),
(16, '2f4116799197fee23d0cf33487832eaa', '2024-09-22 00:00:00', '2024-09-29 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_filters`
--
ALTER TABLE `job_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected`
--
ALTER TABLE `rejected`
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
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hired`
--
ALTER TABLE `hired`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_filters`
--
ALTER TABLE `job_filters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rejected`
--
ALTER TABLE `rejected`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stack`
--
ALTER TABLE `stack`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
