-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09 Okt 2015 pada 19.37
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_stack_exchange`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sse_answer`
--

CREATE TABLE IF NOT EXISTS `sse_answer` (
  `answer_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `answer_content` text NOT NULL,
  `n_vote` int(11) NOT NULL,
  `answer_date` datetime NOT NULL,
  `thread_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sse_answer`
--

INSERT INTO `sse_answer` (`answer_id`, `user_name`, `user_email`, `answer_content`, `n_vote`, `answer_date`, `thread_id`) VALUES
(1, 'Rinzwind', 'rinzwind@nodomain.com', 'I know that the sudo password protects my computer from being locally hacked by someone having physical access to it.\r\nI do not want to scare you too much, but if someone has physical access you handed access over to them regardless of how strong your password is. It will take 1 reboot by someone for that someone to be able change your root password (can be done from "grub rescue" without the need to supply your current password). By the way: this method is considered valid and a feature, and an accepted security risk (otherwise you would never be able to fix your system in case the password did get compromized).\r\n\r\nbut I know that it is not strong enough if someone can brute-force it remotely.\r\nHere comes something else in play: a ROUTER should be smart enough to lock access from the outside if it is a repeated request asking for the same information over a short periode of time. Basically what you have here is DOS attack (or a DDOS if 2+ computers attacking you). A router should kill that connection and enforce a waiting period before accepting new requests from that connection.', 7, '2015-10-09 21:10:32', 1),
(2, 'A.B.', 'ab@nodomain.com', 'If I have learned anything in the last few years on security, then one thing: Nothing is impossible.\r\n\r\nAs long as you have access to a network, definitely. Each service running on your system that can be accessed over the network is theoretically vulnerable and thus a potential weakness.\r\n\r\nAnd therefore, for an attacker with enough ideas it is possible. You can make your system as secure as possible, but you cannot get to 100% safety ever.\r\n\r\nIt is therefore important to assess what is possible with justifiable technical effort and what protects you so well that you yourself can no longer work.', 6, '2015-10-09 23:00:00', 1),
(4, 'kos', 'kos@nodomain.com', 'Yes they can.\r\n\r\nThere are multiple ways to do so though, and bruteforcing the sudo password is probably not the first one.\r\n\r\nFirst off, the sudo password is your user''s password; so really what they''d need to get is your password.\r\n\r\nSecond, cracking an user''s password using bruteforce to access a system is usually the last resort.\r\n\r\nThere are way more elegant (but mostly more effective) ways of breaking into another system.\r\n', 4, '2015-10-09 23:33:00', 1),
(5, 'Martyn', 'martyn@nodomain.com', 'I don''t know about rooting your device, but I can help with getting your device to be recognised by your computer.\r\n\r\nExact instructions will depend on what OS you are running, but basically you need to find the .android folder in your home directory, and replace the adb_usb.ini file with this one. this tells your computer to let adb work with a load of different usb devices. You may need to type this on the command line to get it to work after you do this:\r\n\r\nadb kill-server\r\nadb start-server\r\n\r\nand now running this should show you your device\r\n\r\nadb devices', 0, '2012-10-19 17:34:00', 2),
(6, 'Matthew Job', 'mj@nodomain.com', 'Try to download and install framaroot in to your device. I think that should work. Link : http://m.apkhere.com/app/com.alephzain.framaroot', 0, '2015-05-16 12:04:00', 2),
(7, 'Joash', 'joash@nodomain.com', 'Install king user it''s a Chinese rooting program just continue clicking the blue button this program can root nearly any android device and works fine no bricking And no computer needed only your phone', 0, '2015-06-18 11:59:00', 2),
(8, 'aeismail', 'aeismail@nodomain.com', 'This is a "Goldilocks" problem—you should try to schedule an internship late enough that you have enough experience to be of interest to a potential internship sponsor, but early enough so that it can have an effect on your long-term development (if you feel it was a sufficiently positive or negative experience to sway your sentiments).\r\n\r\nAs a result, I would say that you should typically do this in the middle of your PhD—probably around your third year or so (assuming that you''re in a typical US graduate program that runs five to six years for a PhD). If you''re in a European-style system, where the coursework has been done before the PhD starts, then it should be done somewhat earlier—perhaps from the middle of the second year on.', 17, '2012-03-16 11:38:00', 3),
(9, 'Suresh', 'suresh@nodomain.com', ' think you''re creating a false dichotomy by saying\r\n\r\nthe internship is certain to eat into vital amount of time he could otherwise spend thinking about research problems\r\nInternships are places where sometimes REALLY interesting problems come up. Especially in engineering, while it''s not critical, it''s very important to keep a finger on what''s happening in industry - the industry/academia divide is a matter of time-horizon rather than fundamental nature of the problem.\r\n\r\nOf course you need to have enough experience to recognize interesting problems, which goes back to @aeismail''s answer. I will also say that doing it late in your career isn''t that bad either, because then you get a three-month interview for a job. That''s how I got my first one :)', 18, '2012-03-16 15:06:00', 3),
(10, 'Arash Rowshan', 'arash@nodomain.com', 'Although the answers above are great, I would like to share a different perspective mainly because I disagree with necessarily waiting until the 3rd year of your Phd. In a lot of internships, you''re exposed to new areas or new perspectives in the same area which can affect your current interests. Although school is good and working on research is even better, still, you learn work mainly at work.', 2, '2015-10-08 00:00:00', 3),
(11, 'Sayan', 'sayan@nodomain.com', 'I think internships are an accessory to research. I believe that the positioning and frequency of internships doesn''t matter as long as they are relevant to one''s PhD [by relevant I mean that if work done on internships could be written down on the final PhD dissertation and/or lead to meaningful publications]. Finding/Securing the correct internship that could positively propel one''s PhD is a challenge, but it is doable.\r\n\r\nI believe having the wisdom to decide whether an internship could contribute to one''s research depends on where you currently stand in the PhD timeline. There is a distinction between a PhD student and a PhD candidate, which I want to point out as you mentioned both the terms.\r\n\r\nA PhD candidate is an advanced PhD student, which means he/she is aware of the fundamental concepts of a particular research area (since a PhD candidate has successfully qualified the core requirements of a dept., which involves getting satisfactory grades in certain key courses for his/her specialization track). So he/she is in a better position (in terms of judgement) to not settle for just any internship (as there are significant amount of internship opportunities for PhD students [this of course depends on country/funding/discipline]), but only the ones that ties well with one''s PhD goals. For instance if someone''s specialization area is compilers, then doing an internship on quantitative research might not be very useful in the near term.\r\n\r\nFor PhD students (in first or second year), since they are (relatively) new in the field and learning the ropes (as majority of their time is spent on courses, reviewing/reading papers, and doing research in whatever time is left), seeking counsel from mentors/adviser regarding internship is fruitful. They could help in a multitude of ways.', 0, '2015-10-09 09:00:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sse_thread`
--

CREATE TABLE IF NOT EXISTS `sse_thread` (
  `thread_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `thread_topic` varchar(100) NOT NULL,
  `thread_content` text NOT NULL,
  `n_vote` int(11) NOT NULL,
  `n_answer` int(11) NOT NULL,
  `thread_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sse_thread`
--

INSERT INTO `sse_thread` (`thread_id`, `user_name`, `user_email`, `thread_topic`, `thread_content`, `n_vote`, `n_answer`, `thread_date`) VALUES
(1, 'mxdsp', 'mxdsp@nodomain.com', 'How important is the sudo password?', 'I know that the sudo password protects my computer from being locally hacked by someone having physical access to it (edit : actually, it doesn''t). My password is strong enough for that purpose, but I know that it is not strong enough if someone can brute-force it remotely.\r\n\r\nCan anybody access my computer in root mode using my sudo password with no physical access to the computer, on a standard Ubuntu desktop installation ?\r\n\r\nIf you do have a network access, definitely yes (Short answer).\r\nIf you do not pay enough attention to security, yes (Long answer).\r\nIf you have "ssh" running, and no 2FA , yes (comments and answers).\r\nOne can access your computer as root without sudo/user password.', 7, 3, '2015-10-09 21:00:00'),
(2, 'Gilad Naaman', 'gilad@nodomain.com', 'How to root Teac Tc-7120', 'I want to root my new Teac TC-7120 device, but couldn''t find any rooting guide targeting it.\r\n\r\nWhat should I do?\r\n\r\nI used the following Guide: http://www.makeuseof.com/tag/root-android-phone-superoneclick-2/\r\n\r\nBut even though my device is connected and in Debugging mode, I can''t get the ADB to recognize it.', 5, 3, '2012-09-06 17:56:00'),
(3, 'Bravo', 'bravo@nodomain.com', 'Timing an internship during PhD', 'Suppose there is an engineering PhD student who is unsure whether to join academia or the industry after his PhD. He does not want to take chances and applies for internship positions during the course of his PhD. Here is a dilemma: the internship is certain to eat into vital amount of time he could otherwise spend thinking about his research problem. OTOH, when he is not fully into research, he is unlikely to get attractive research-based internship positions.\r\n\r\nHow should a PhD candidate time his internship in a way that it does not affect his research and is also a very valuable experience on his PhD resume?', 19, 4, '2012-03-16 10:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sse_answer`
--
ALTER TABLE `sse_answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `sse_thread`
--
ALTER TABLE `sse_thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sse_answer`
--
ALTER TABLE `sse_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sse_thread`
--
ALTER TABLE `sse_thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sse_answer`
--
ALTER TABLE `sse_answer`
  ADD CONSTRAINT `thread_id_ic` FOREIGN KEY (`thread_id`) REFERENCES `sse_thread` (`thread_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
