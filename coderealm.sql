-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 04:02 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coderealm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_role`, `name`, `email`, `password`, `photo_url`, `created_at`) VALUES
(1, 1, 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'adminrasyadh', 'http://localhost/CodeRealm/assets/image/Admin/rasyadh.jpg', '2017-12-06 16:07:34'),
(2, 1, 'admin', 'admin@coderealm.com', 'admincoderealm', '', '2017-12-14 07:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_skills`
--

CREATE TABLE `enroll_skills` (
  `id_enroll_skills` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `enroll_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = false, 1 = true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_skills`
--

INSERT INTO `enroll_skills` (`id_enroll_skills`, `id_skill`, `id_user`, `enroll_status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 2, 1),
(4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id_lecture` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id_lecture`, `id_role`, `name`, `email`, `password`, `photo_url`, `created_at`) VALUES
(1, 2, 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'lecturerasyadh', 'http://localhost/CodeRealm/assets/image/Lecture/1.jpg', '2017-12-08 14:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `created_at`) VALUES
(1, 'admin', '2017-12-02 13:18:34'),
(2, 'lecture', '2017-12-02 13:18:34'),
(3, 'user', '2017-12-02 13:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skill_badge` varchar(255) NOT NULL,
  `enroll_url` varchar(255) NOT NULL,
  `skill_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id_skill`, `skill_name`, `description`, `skill_badge`, `enroll_url`, `skill_file`, `created_at`) VALUES
(1, 'HTML - CSS', 'Learn the fundamentals of design, front-end development, and crafting user experiences that are easy on the eyes.', 'http://localhost/CodeRealm/assets/image/Badge/badge-html-css.png', 'http://localhost/CodeRealm/skills/html-css', 'css-coderealm.docx', '2017-12-17 14:39:33'),
(2, 'JavaScript', 'Spend some time with this powerful scripting language and learn to build lightweight applications with enhanced user interfaces. ', 'http://localhost/CodeRealm/assets/image/Badge/badge-javascript.png', 'http://localhost/CodeRealm/skills/javascript', 'javascript-coderealm.docx', '2017-12-17 14:40:25'),
(3, 'Ruby', 'Master your Ruby skills and increase your Rails street cred by learning to build dynamic, sustainable applications for the web.', 'http://localhost/CodeRealm/assets/image/Badge/badge-ruby.png', 'http://localhost/CodeRealm/skills/ruby', 'ruby-coderealm.docx', '2017-12-17 14:40:34'),
(4, 'PHP', 'Dig into one of the most prevalent programming languages and learn how PHP can help you develop various applications for the web.', 'http://localhost/CodeRealm/assets/image/Badge/badge-php.png', 'http://localhost/CodeRealm/skills/php', 'php-coderealm.docx', '2017-12-17 14:40:43'),
(5, 'Python', 'Explore what it means to store and manipulate data, make decisions with your program, and leverage the power of Python.', 'http://localhost/CodeRealm/assets/image/Badge/badge-python.png', 'http://localhost/CodeRealm/skills/python', 'python-coderealm.docx', '2017-12-17 14:40:53'),
(6, 'Git', 'Build a solid foundation in Git, then pair it with advanced version control skills. Learn how to collaborate on projects effectively with GitHub.', 'http://localhost/CodeRealm/assets/image/Badge/badge-git.png', 'http://localhost/CodeRealm/skills/git', 'git-coderealm.docx', '2017-12-17 14:41:02'),
(7, 'Database', 'Take control of your application’s data layer by learning SQL, and take NoSQL for a spin if you’re feeling non-relational.', 'http://localhost/CodeRealm/assets/image/Badge/badge-database.png', 'http://localhost/CodeRealm/skills/database', 'database-coderealm.docx', '2017-12-17 14:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `skill_course`
--

CREATE TABLE `skill_course` (
  `id_skill_course` int(11) NOT NULL,
  `id_skill_path` int(11) NOT NULL,
  `name_course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skill_course_url` varchar(255) NOT NULL,
  `skill_course_badge` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_course`
--

INSERT INTO `skill_course` (`id_skill_course`, `id_skill_path`, `name_course`, `description`, `skill_course_url`, `skill_course_badge`, `created_at`) VALUES
(1, 1, 'Front-end Foundations', 'Learn how to build a website with HTML and CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/frontend-foundation.png', '2017-12-05 13:23:39'),
(2, 1, 'Front-end Formations', 'Learn the latest versions of HTML and CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/frontend-formation.png', '2017-12-05 13:03:27'),
(3, 2, 'CSS Cross-Country', 'Explore the fundamentals of CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/css.png', '2017-12-05 13:05:04'),
(4, 2, 'Journey Into Mobile', 'Learn mobile-first, adaptive, and responsive web design.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/css-mobile.png', '2017-12-05 13:05:25'),
(5, 3, 'JavaScript Road Trip Part 1', 'An introduction to the very basics of the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-01.png', '2017-12-05 13:06:36'),
(6, 3, 'JavaScript Road Trip Part 2', 'A continued introduction to the very basics of the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-02.png', '2017-12-05 13:06:56'),
(7, 3, 'JavaScript Road Trip Part 3', 'Build important intermediate skills within the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-03.png', '2017-12-05 13:07:17'),
(8, 4, 'Ruby Bits', 'Learn the core bits every Ruby programmer should know.', 'http://localhost/CodeRealm/skills/ruby', 'http://localhost/CodeRealm/assets/image/Course/ruby-bits.png', '2017-12-05 13:08:06'),
(9, 4, 'Ruby Bits Part 2', 'Learn the advanced bits of expert Ruby programming.', 'http://localhost/CodeRealm/skills/ruby', 'http://localhost/CodeRealm/assets/image/Course/ruby-bits-2.png', '2017-12-05 13:08:27'),
(10, 5, 'Try PHP', 'Begin building a foundation in one of the most widely used programming languages.', 'http://localhost/CodeRealm/skills/php', 'http://localhost/CodeRealm/assets/image/Course/try-php.png', '2017-12-05 13:09:03'),
(11, 5, 'Close Encounters With PHP', 'Look to the skies and work with forms, validation, and custom libraries.', 'http://localhost/CodeRealm/skills/php', 'http://localhost/CodeRealm/assets/image/Course/close-php.png', '2017-12-05 13:09:33'),
(12, 6, 'Try Python', 'Begin scaling up your Python knowledge and open the door to plentiful programming possibilities.', 'http://localhost/CodeRealm/skills/python', 'http://localhost/CodeRealm/assets/image/Course/try-python.png', '2017-12-05 13:10:19'),
(13, 6, 'Flying Through Python', 'Continue learning the basics of Python and use them to manage our circus\' Spam Van food truck.', 'http://localhost/CodeRealm/skills/python', 'http://localhost/CodeRealm/assets/image/Course/flying-through-python.png', '2017-12-05 13:10:39'),
(14, 7, 'Try Git', 'Be introduced to the basic concepts of Git version control.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/try-git.png', '2017-12-05 13:11:46'),
(15, 7, 'Git Real', 'Get a more advanced introduction and guide to Git.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/git-real.png', '2017-12-05 13:12:04'),
(16, 7, 'Git Real 2', 'Learn more advanced Git techniques.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/git-real-2.png', '2017-12-05 13:12:22'),
(17, 7, 'Mastering Github', 'Better collaboration through GitHub.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/mastering-github.png', '2017-12-05 13:12:42'),
(18, 8, 'Try SQL', 'Learn basic database manipulation with SQL.', 'http://localhost/CodeRealm/skills/database', 'http://localhost/CodeRealm/assets/image/Course/try-sql.png', '2017-12-05 13:13:44'),
(19, 8, 'The Sequel to SQL', 'Move beyond the basics and learn the most powerful features of relational databases.', 'http://localhost/CodeRealm/skills/database', 'http://localhost/CodeRealm/assets/image/Course/sequel-sql.png', '2017-12-05 13:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `skill_path`
--

CREATE TABLE `skill_path` (
  `id_skill_path` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `title_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_path`
--

INSERT INTO `skill_path` (`id_skill_path`, `id_skill`, `title_path`, `description`, `created_at`) VALUES
(1, 1, 'Getting Started With HTML and CSS', 'HTML and CSS are the languages you can use to build and style websites. In these courses, you’ll learn the basics of HTML and CSS, build your first website, and then review some of the current HTML5 and CSS3 best practices.', '2017-12-05 12:01:32'),
(2, 1, 'Intermediate CSS', 'Simple CSS can get you pretty far, but once you start getting serious about front-end development, you need to get exposed to more advanced topics, such as specificity, floating, animations, and responsive design. These courses teach you some best practices for working with CSS and building responsive websites to get your users moving in the right direction.', '2017-12-05 12:01:47'),
(3, 2, 'JavaScript Language', 'JavaScript is a powerful and popular language for programming on the web. These courses will give you a strong foundation in the JavaScript language so you’ll be ready to move up to frameworks like Angular and Node.js.', '2017-12-05 12:31:34'),
(4, 3, 'Ruby Language', 'Once you understand the basics of Ruby, learning more about the language will help you write better Ruby code and, therefore, better software. These courses give an overview of some of the most important parts of the Ruby programming language.', '2017-12-05 12:07:17'),
(5, 4, 'Getting Started With PHP', 'PHP is a server-side language with the ability to power everything from personal blogs to hugely popular websites. In these courses, you’ll learn the foundational elements of this versatile programming language, including its data types, conditionals, and more.', '2017-12-05 12:07:45'),
(6, 5, 'Getting Started With Python', 'Python is a fast and powerful language that is also easy to use and read, making it great for beginners and experts alike. These courses will take you through the basics of Python, helping you scale up your knowledge and preparing you to build a wide variety of Python applications.', '2017-12-05 12:11:16'),
(7, 6, 'Git', 'Git is the most popular version control system that developers use to track and share code. These courses will take you from a complete beginner to proficiency using Git and GitHub.', '2017-12-05 12:11:42'),
(8, 7, 'SQL', 'Discover how to manipulate relational database systems using SQL. In these courses, you’ll learn how to create a database and work with data inside of it, as well as best practices for modeling data in your apps.', '2017-12-05 12:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `name`, `email`, `username`, `password`, `photo_url`, `created_at`) VALUES
(1, 3, 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'rasyadh', 'rasyadh', 'http://localhost/CodeRealm/assets/image/User/rasyadh.jpg', '2017-12-07 04:32:14'),
(2, 3, 'Muhammad Fatih Abdus Salam', 'mfatihas97@gmail.com', 'mfatihas', 'mfatihas', 'http://localhost/CodeRealm/assets/image/logo.svg', '2017-12-17 14:02:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `photo_url` (`photo_url`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `enroll_skills`
--
ALTER TABLE `enroll_skills`
  ADD PRIMARY KEY (`id_enroll_skills`),
  ADD KEY `id_skill` (`id_skill`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id_lecture`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `photo_url` (`photo_url`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`),
  ADD UNIQUE KEY `skill_badge` (`skill_badge`),
  ADD UNIQUE KEY `enroll_url` (`enroll_url`);

--
-- Indexes for table `skill_course`
--
ALTER TABLE `skill_course`
  ADD PRIMARY KEY (`id_skill_course`),
  ADD UNIQUE KEY `skill_course_url` (`skill_course_url`,`skill_course_badge`),
  ADD KEY `id_skill_path` (`id_skill_path`);

--
-- Indexes for table `skill_path`
--
ALTER TABLE `skill_path`
  ADD PRIMARY KEY (`id_skill_path`),
  ADD KEY `id_skill` (`id_skill`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `photo_url` (`photo_url`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enroll_skills`
--
ALTER TABLE `enroll_skills`
  MODIFY `id_enroll_skills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id_lecture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `skill_course`
--
ALTER TABLE `skill_course`
  MODIFY `id_skill_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `skill_path`
--
ALTER TABLE `skill_path`
  MODIFY `id_skill_path` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll_skills`
--
ALTER TABLE `enroll_skills`
  ADD CONSTRAINT `enroll_skills_ibfk_1` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_skills_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
