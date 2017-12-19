/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100129
Source Host           : localhost:3306
Source Database       : coderealm

Target Server Type    : MYSQL
Target Server Version : 100129
File Encoding         : 65001

Date: 2017-12-19 16:10:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `photo_url` (`photo_url`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'adminrasyadh', 'http://localhost/CodeRealm/assets/image/Admin/rasyadh.jpg', '2017-12-06 23:07:34');
INSERT INTO `admin` VALUES ('2', '1', 'admin', 'admin@coderealm.com', 'admincoderealm', '', '2017-12-14 14:58:52');

-- ----------------------------
-- Table structure for badge
-- ----------------------------
DROP TABLE IF EXISTS `badge`;
CREATE TABLE `badge` (
  `id` int(10) NOT NULL,
  `nama_badge` varchar(255) NOT NULL,
  `img` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of badge
-- ----------------------------
INSERT INTO `badge` VALUES ('1', 'HTML-CSS Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-html-css.png');
INSERT INTO `badge` VALUES ('2', 'JavaScript Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-javascript.png');
INSERT INTO `badge` VALUES ('3', 'Ruby Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-ruby.png');
INSERT INTO `badge` VALUES ('4', 'PHP Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-php.png');
INSERT INTO `badge` VALUES ('5', 'Python Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-python.png');
INSERT INTO `badge` VALUES ('6', 'Git Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-git.png');
INSERT INTO `badge` VALUES ('7', 'Database Badge', 'http://localhost/CodeRealm/assets/image/Badge/badge-database.png');

-- ----------------------------
-- Table structure for badgenuser
-- ----------------------------
DROP TABLE IF EXISTS `badgenuser`;
CREATE TABLE `badgenuser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_badge` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_mmbadge_user` (`id_user`),
  KEY `fk_mmbadge_badge` (`id_badge`),
  CONSTRAINT `fk_mmbadge_badge` FOREIGN KEY (`id_badge`) REFERENCES `badge` (`id`),
  CONSTRAINT `fk_mmbadge_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of badgenuser
-- ----------------------------
INSERT INTO `badgenuser` VALUES ('1', '5', '2', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_lecture` int(10) NOT NULL,
  `nama_course` varchar(255) DEFAULT NULL,
  `keterangan` char(255) DEFAULT NULL,
  `img` text,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_course_lecture` (`id_lecture`),
  CONSTRAINT `fk_course_lecture` FOREIGN KEY (`id_lecture`) REFERENCES `lecture` (`id_lecture`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '2', 'Teknologi Web', 'Course untuk memahami teknologi-teknologi web saat ini', 'http://sm.pcmag.com/pcmag_uk/guide/t/the-best-w/the-best-web-hosting-services-of-2018_7r86.jpg', '1');

-- ----------------------------
-- Table structure for course_detail
-- ----------------------------
DROP TABLE IF EXISTS `course_detail`;
CREATE TABLE `course_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_course` int(10) NOT NULL,
  `nama_detail` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `img` char(255) DEFAULT NULL,
  `point` int(10) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_course_detail` (`id_course`),
  CONSTRAINT `fk_course_detail` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of course_detail
-- ----------------------------
INSERT INTO `course_detail` VALUES ('1', '1', 'Ajax', 'Memahami lebih dalam ajax', 'http://www.seanmcquaide.com/wp-content/uploads/2017/12/illu_ajax-et-l-echange-de-donnees-en-javascript1-440x220.png', '100', '1');

-- ----------------------------
-- Table structure for enroll_course
-- ----------------------------
DROP TABLE IF EXISTS `enroll_course`;
CREATE TABLE `enroll_course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_course` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `total_poin` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mmenrollcourse_course` (`id_course`),
  KEY `fk_mmenrollcourse_user` (`id_user`),
  CONSTRAINT `fk_mmenrollcourse_course` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`),
  CONSTRAINT `fk_mmenrollcourse_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of enroll_course
-- ----------------------------

-- ----------------------------
-- Table structure for enroll_skills
-- ----------------------------
DROP TABLE IF EXISTS `enroll_skills`;
CREATE TABLE `enroll_skills` (
  `id_enroll_skills` int(11) NOT NULL AUTO_INCREMENT,
  `id_skill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `enroll_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = false, 1 = true',
  PRIMARY KEY (`id_enroll_skills`),
  KEY `id_skill` (`id_skill`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `enroll_skills_ibfk_1` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `enroll_skills_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of enroll_skills
-- ----------------------------
INSERT INTO `enroll_skills` VALUES ('1', '1', '1', '1');
INSERT INTO `enroll_skills` VALUES ('2', '2', '1', '1');
INSERT INTO `enroll_skills` VALUES ('3', '2', '2', '1');
INSERT INTO `enroll_skills` VALUES ('4', '1', '2', '1');
INSERT INTO `enroll_skills` VALUES ('5', '3', '1', '0');
INSERT INTO `enroll_skills` VALUES ('6', '5', '2', '1');
INSERT INTO `enroll_skills` VALUES ('7', '5', '1', '1');

-- ----------------------------
-- Table structure for lecture
-- ----------------------------
DROP TABLE IF EXISTS `lecture`;
CREATE TABLE `lecture` (
  `id_lecture` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lecture`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `photo_url` (`photo_url`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lecture
-- ----------------------------
INSERT INTO `lecture` VALUES ('1', '2', 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'lecturerasyadh', 'http://localhost/CodeRealm/assets/image/Lecture/1.jpg', '2017-12-08 21:28:34');
INSERT INTO `lecture` VALUES ('2', '2', 'Muhammad Fatih Abdus Salam', 'mfatihas@gravicodev.com', 'lecturefatih', 'http://localhost/CodeRealm/assets/image/Lecture/2.jpg', '2017-12-19 15:29:35');
INSERT INTO `lecture` VALUES ('3', '2', 'Prasetyo', 'prasetyo@gmail.com', 'prasetyo', 'http://localhost/CodeRealm/assets/image/Lecture/WIN_20170927_184313.JPG', '2017-12-19 15:55:25');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin', '2017-12-02 20:18:34');
INSERT INTO `role` VALUES ('2', 'lecture', '2017-12-02 20:18:34');
INSERT INTO `role` VALUES ('3', 'user', '2017-12-02 20:18:34');

-- ----------------------------
-- Table structure for skills
-- ----------------------------
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skill_badge` varchar(255) NOT NULL,
  `enroll_url` varchar(255) NOT NULL,
  `skill_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_skill`),
  UNIQUE KEY `skill_badge` (`skill_badge`),
  UNIQUE KEY `enroll_url` (`enroll_url`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skills
-- ----------------------------
INSERT INTO `skills` VALUES ('1', 'HTML - CSS', 'Learn the fundamentals of design, front-end development, and crafting user experiences that are easy on the eyes.', 'http://localhost/CodeRealm/assets/image/Badge/badge-html-css.png', 'http://localhost/CodeRealm/skills/html-css', 'css-coderealm.docx', '2017-12-17 21:39:33');
INSERT INTO `skills` VALUES ('2', 'JavaScript', 'Spend some time with this powerful scripting language and learn to build lightweight applications with enhanced user interfaces. ', 'http://localhost/CodeRealm/assets/image/Badge/badge-javascript.png', 'http://localhost/CodeRealm/skills/javascript', 'javascript-coderealm.docx', '2017-12-17 21:40:25');
INSERT INTO `skills` VALUES ('3', 'Ruby', 'Master your Ruby skills and increase your Rails street cred by learning to build dynamic, sustainable applications for the web.', 'http://localhost/CodeRealm/assets/image/Badge/badge-ruby.png', 'http://localhost/CodeRealm/skills/ruby', 'ruby-coderealm.docx', '2017-12-17 21:40:34');
INSERT INTO `skills` VALUES ('4', 'PHP', 'Dig into one of the most prevalent programming languages and learn how PHP can help you develop various applications for the web.', 'http://localhost/CodeRealm/assets/image/Badge/badge-php.png', 'http://localhost/CodeRealm/skills/php', 'php-coderealm.docx', '2017-12-17 21:40:43');
INSERT INTO `skills` VALUES ('5', 'Python', 'Explore what it means to store and manipulate data, make decisions with your program, and leverage the power of Python.', 'http://localhost/CodeRealm/assets/image/Badge/badge-python.png', 'http://localhost/CodeRealm/skills/python', 'python-coderealm.docx', '2017-12-17 21:40:53');
INSERT INTO `skills` VALUES ('6', 'Git', 'Build a solid foundation in Git, then pair it with advanced version control skills. Learn how to collaborate on projects effectively with GitHub.', 'http://localhost/CodeRealm/assets/image/Badge/badge-git.png', 'http://localhost/CodeRealm/skills/git', 'git-coderealm.docx', '2017-12-17 21:41:02');
INSERT INTO `skills` VALUES ('7', 'Database', 'Take control of your application’s data layer by learning SQL, and take NoSQL for a spin if you’re feeling non-relational.', 'http://localhost/CodeRealm/assets/image/Badge/badge-database.png', 'http://localhost/CodeRealm/skills/database', 'database-coderealm.docx', '2017-12-17 21:41:16');

-- ----------------------------
-- Table structure for skill_course
-- ----------------------------
DROP TABLE IF EXISTS `skill_course`;
CREATE TABLE `skill_course` (
  `id_skill_course` int(11) NOT NULL AUTO_INCREMENT,
  `id_skill_path` int(11) NOT NULL,
  `name_course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skill_course_url` varchar(255) NOT NULL,
  `skill_course_badge` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_skill_course`),
  UNIQUE KEY `skill_course_url` (`skill_course_url`,`skill_course_badge`),
  KEY `id_skill_path` (`id_skill_path`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skill_course
-- ----------------------------
INSERT INTO `skill_course` VALUES ('1', '1', 'Front-end Foundations', 'Learn how to build a website with HTML and CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/frontend-foundation.png', '2017-12-05 20:23:39');
INSERT INTO `skill_course` VALUES ('2', '1', 'Front-end Formations', 'Learn the latest versions of HTML and CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/frontend-formation.png', '2017-12-05 20:03:27');
INSERT INTO `skill_course` VALUES ('3', '2', 'CSS Cross-Country', 'Explore the fundamentals of CSS.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/css.png', '2017-12-05 20:05:04');
INSERT INTO `skill_course` VALUES ('4', '2', 'Journey Into Mobile', 'Learn mobile-first, adaptive, and responsive web design.', 'http://localhost/CodeRealm/skills/html-css', 'http://localhost/CodeRealm/assets/image/Course/css-mobile.png', '2017-12-05 20:05:25');
INSERT INTO `skill_course` VALUES ('5', '3', 'JavaScript Road Trip Part 1', 'An introduction to the very basics of the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-01.png', '2017-12-05 20:06:36');
INSERT INTO `skill_course` VALUES ('6', '3', 'JavaScript Road Trip Part 2', 'A continued introduction to the very basics of the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-02.png', '2017-12-05 20:06:56');
INSERT INTO `skill_course` VALUES ('7', '3', 'JavaScript Road Trip Part 3', 'Build important intermediate skills within the JavaScript language.', 'http://localhost/CodeRealm/skills/javascript', 'http://localhost/CodeRealm/assets/image/Course/javascript-03.png', '2017-12-05 20:07:17');
INSERT INTO `skill_course` VALUES ('8', '4', 'Ruby Bits', 'Learn the core bits every Ruby programmer should know.', 'http://localhost/CodeRealm/skills/ruby', 'http://localhost/CodeRealm/assets/image/Course/ruby-bits.png', '2017-12-05 20:08:06');
INSERT INTO `skill_course` VALUES ('9', '4', 'Ruby Bits Part 2', 'Learn the advanced bits of expert Ruby programming.', 'http://localhost/CodeRealm/skills/ruby', 'http://localhost/CodeRealm/assets/image/Course/ruby-bits-2.png', '2017-12-05 20:08:27');
INSERT INTO `skill_course` VALUES ('10', '5', 'Try PHP', 'Begin building a foundation in one of the most widely used programming languages.', 'http://localhost/CodeRealm/skills/php', 'http://localhost/CodeRealm/assets/image/Course/try-php.png', '2017-12-05 20:09:03');
INSERT INTO `skill_course` VALUES ('11', '5', 'Close Encounters With PHP', 'Look to the skies and work with forms, validation, and custom libraries.', 'http://localhost/CodeRealm/skills/php', 'http://localhost/CodeRealm/assets/image/Course/close-php.png', '2017-12-05 20:09:33');
INSERT INTO `skill_course` VALUES ('12', '6', 'Try Python', 'Begin scaling up your Python knowledge and open the door to plentiful programming possibilities.', 'http://localhost/CodeRealm/skills/python', 'http://localhost/CodeRealm/assets/image/Course/try-python.png', '2017-12-05 20:10:19');
INSERT INTO `skill_course` VALUES ('13', '6', 'Flying Through Python', 'Continue learning the basics of Python and use them to manage our circus\' Spam Van food truck.', 'http://localhost/CodeRealm/skills/python', 'http://localhost/CodeRealm/assets/image/Course/flying-through-python.png', '2017-12-05 20:10:39');
INSERT INTO `skill_course` VALUES ('14', '7', 'Try Git', 'Be introduced to the basic concepts of Git version control.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/try-git.png', '2017-12-05 20:11:46');
INSERT INTO `skill_course` VALUES ('15', '7', 'Git Real', 'Get a more advanced introduction and guide to Git.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/git-real.png', '2017-12-05 20:12:04');
INSERT INTO `skill_course` VALUES ('16', '7', 'Git Real 2', 'Learn more advanced Git techniques.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/git-real-2.png', '2017-12-05 20:12:22');
INSERT INTO `skill_course` VALUES ('17', '7', 'Mastering Github', 'Better collaboration through GitHub.', 'http://localhost/CodeRealm/skills/git', 'http://localhost/CodeRealm/assets/image/Course/mastering-github.png', '2017-12-05 20:12:42');
INSERT INTO `skill_course` VALUES ('18', '8', 'Try SQL', 'Learn basic database manipulation with SQL.', 'http://localhost/CodeRealm/skills/database', 'http://localhost/CodeRealm/assets/image/Course/try-sql.png', '2017-12-05 20:13:44');
INSERT INTO `skill_course` VALUES ('19', '8', 'The Sequel to SQL', 'Move beyond the basics and learn the most powerful features of relational databases.', 'http://localhost/CodeRealm/skills/database', 'http://localhost/CodeRealm/assets/image/Course/sequel-sql.png', '2017-12-05 20:14:10');

-- ----------------------------
-- Table structure for skill_path
-- ----------------------------
DROP TABLE IF EXISTS `skill_path`;
CREATE TABLE `skill_path` (
  `id_skill_path` int(11) NOT NULL AUTO_INCREMENT,
  `id_skill` int(11) NOT NULL,
  `title_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_skill_path`),
  KEY `id_skill` (`id_skill`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skill_path
-- ----------------------------
INSERT INTO `skill_path` VALUES ('1', '1', 'Getting Started With HTML and CSS', 'HTML and CSS are the languages you can use to build and style websites. In these courses, you’ll learn the basics of HTML and CSS, build your first website, and then review some of the current HTML5 and CSS3 best practices.', '2017-12-05 19:01:32');
INSERT INTO `skill_path` VALUES ('2', '1', 'Intermediate CSS', 'Simple CSS can get you pretty far, but once you start getting serious about front-end development, you need to get exposed to more advanced topics, such as specificity, floating, animations, and responsive design. These courses teach you some best practices for working with CSS and building responsive websites to get your users moving in the right direction.', '2017-12-05 19:01:47');
INSERT INTO `skill_path` VALUES ('3', '2', 'JavaScript Language', 'JavaScript is a powerful and popular language for programming on the web. These courses will give you a strong foundation in the JavaScript language so you’ll be ready to move up to frameworks like Angular and Node.js.', '2017-12-05 19:31:34');
INSERT INTO `skill_path` VALUES ('4', '3', 'Ruby Language', 'Once you understand the basics of Ruby, learning more about the language will help you write better Ruby code and, therefore, better software. These courses give an overview of some of the most important parts of the Ruby programming language.', '2017-12-05 19:07:17');
INSERT INTO `skill_path` VALUES ('5', '4', 'Getting Started With PHP', 'PHP is a server-side language with the ability to power everything from personal blogs to hugely popular websites. In these courses, you’ll learn the foundational elements of this versatile programming language, including its data types, conditionals, and more.', '2017-12-05 19:07:45');
INSERT INTO `skill_path` VALUES ('6', '5', 'Getting Started With Python', 'Python is a fast and powerful language that is also easy to use and read, making it great for beginners and experts alike. These courses will take you through the basics of Python, helping you scale up your knowledge and preparing you to build a wide variety of Python applications.', '2017-12-05 19:11:16');
INSERT INTO `skill_path` VALUES ('7', '6', 'Git', 'Git is the most popular version control system that developers use to track and share code. These courses will take you from a complete beginner to proficiency using Git and GitHub.', '2017-12-05 19:11:42');
INSERT INTO `skill_path` VALUES ('8', '7', 'SQL', 'Discover how to manipulate relational database systems using SQL. In these courses, you’ll learn how to create a database and work with data inside of it, as well as best practices for modeling data in your apps.', '2017-12-05 19:12:10');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `photo_url` (`photo_url`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '3', 'Rasyadh Abdul Aziz', 'rasyadhabdulaziz@gmail.com', 'rasyadh', 'rasyadh', 'http://localhost/CodeRealm/assets/image/User/rasyadh.jpg', '2017-12-07 11:32:14');
INSERT INTO `user` VALUES ('2', '3', 'Muhammad Fatih Abdus Salam', 'mfatihas@gravicodev.com', 'mfatihas', 'mfatihas', 'http://localhost/CodeRealm/assets/image/logo.svg', '2017-12-19 15:31:45');
