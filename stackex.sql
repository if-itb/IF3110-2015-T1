-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2015 at 09:32 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackex`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `a_id` int(7) NOT NULL,
  `q_id` int(7) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vote` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `q_id`, `content`, `name`, `email`, `date_posted`, `vote`) VALUES
(36, 31, 'njsjd', 'rudi', 'jjj@di.om', '2015-10-16 00:39:13', 4),
(37, 31, '1. Fork pada repository ini dengan akun github anda.\r\n2. Silakan commit pada repository anda (hasil fork). Lakukan berberapa commit dengan pesan yang bermakna, contoh: `fix css`, `create post done`, jangan seperti `final`, `benerin dikit`. Disarankan untuk tidak melakukan commit dengan perubahan yang besar karena akan mempengaruhi penilaian (contoh: hanya melakukan satu commit kemudian dikumpulkan). \r\n3. Ubah **Penjelasan Teknis** pada bagian bawah readme.md ini dengan menjelaskan bagaimana cara anda:\r\n   - Melakukan validasi pada client-side\r\n   - Melakukan AJAX (mulai dari pengguna melakukan klik pada tombol vote sampai angka vote berubah).\r\n4. Pull request dari repository anda ke repository ini dengan format **NIM** - **Nama Lengkap** sebelum **Jumat, 16 Oktober 2015 23.59**', 'ahmad', 'ahmad.aidin@students.itb.ac.id', '2015-10-16 00:40:31', 5),
(38, 29, 'semua makanan, kecuali durian terutama seblak', 'Atika', 'atika@sti.com', '2015-10-16 13:29:05', 1),
(39, 29, 'tulang ikan', 'Huntul', 'huntul@dalutfi.com', '2015-10-16 13:29:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `q_id` int(7) NOT NULL,
  `topic` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vote` int(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `topic`, `content`, `name`, `email`, `date_posted`, `vote`) VALUES
(29, 'Makan', 'makanan apa yang paling kamu sukai?', 'Ahmad', 'ahmad@svok.com', '2015-10-16 00:23:27', 3),
(31, 'Apa dah', 'I have an archival application that executes a big archive process on a remote Red Hat machine and takes the stdout and displays it, line-by-line, to the browser using WHILE logic and fgets. For a particular &quot;id&quot; that I need to archive, the process puts up a warning with the following information:', 'Yoga', 'yoga.yogi@si-mail.com', '2015-10-16 00:27:57', 4),
(32, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at maximus diam. Suspendisse euismod sem a consectetur consequat. Quisque imperdiet cursus dolor, vel congue lectus aliquet tempus. Morbi porttitor sed arcu sit amet tempor. Curabitur euismod interdum ipsum ut rutrum. Donec sit amet mattis erat. Sed condimentum mattis mi quis feugiat. Integer molestie tincidunt dolor sed viverra. Curabitur maximus risus justo, ut convallis justo ultrices pellentesque. Nam pharetra nisi eget eros dictum congue. Suspendisse eleifend ligula ut gravida bibendum. Nullam molestie euismod auctor. Integer aliquet nisi ac risus congue, sit amet aliquam eros rhoncus. Morbi porttitor dolor quis lectus vehicula, ac placerat tellus eleifend. Pellentesque ultricies ante a convallis bibendum.', 'Hari', 'hari@minggu.com', '2015-10-16 13:32:25', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD UNIQUE KEY `q_id` (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
