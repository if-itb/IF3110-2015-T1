-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Okt 2015 pada 16.09
-- Versi Server: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stackexchange`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `Id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vote` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `answer`
--

INSERT INTO `answer` (`Id`, `qid`, `username`, `email`, `isi`, `datetime`, `vote`) VALUES
(28, 15, 'Dharmang', 'dharmang@informatika.org', 'You can go through the following link as it helped me, should work for you as well. http://hype-free.blogspot.com/2007/07/updating-php-in-xampp-for-windows.html\r\n\r\nRealizing that my answer helped couple of users, here is the edit from original link:\r\n\r\nEdit:\r\nFirst of all Always backup your data.\r\n\r\n    Download the latest binary version of PHP (make sure to get the .zip package not the installer)\r\n    De-archive it to a directory\r\n    Overwrite the contents of directory in the php subfolder of your XAMPP installation directory.\r\n    Overwrite the contents of the directory apachein with the newer versions.\r\n    Now the trick: take the files which have a ''_2'' in their names (for example php5apache2_2.dll or php5apache2_2_filter.dll), copy them in the apachein subdirectory and remove the ''_2'' part, overwriting the existing files. This is necessary because by XAMPP uses Apache version 2.2 and the files with the 2 prefix are built for Apache 2.0, so you must take the files build for the newer version (which has a different plugin interface) and rename them in the filenames XAMPP expects.\r\n\r\nNOTE: there are two directories to be updated with new version of files, namely php sub-directory and apache/bin sub-directory, inside XAMPP installation.\r\n', '2015-10-10 10:52:36', 13),
(27, 15, 's-sharma', 'sharma@informatika.org', 'Take a backup of your htdocs and data folder (subfolder of mysql folder), reinstall upgrade version and replace those folders.', '2015-10-10 10:31:01', 20),
(29, 15, 'prodigitalson', 'prodigitalson@informatika.org', 'I think you need to actually download and install XAMPP with the desired PHP version. I dont think you can just upgrade the components of XAMPP individually unless there is a facility provided for this within XAMPP itself.\r\n', '2015-10-10 10:54:10', 6),
(30, 15, 'tanzeem', 'tanzeem@informatika.org', 'download your desired version of php binary from http://windows.php.net/download/ website. download Thread Safe binary zip version. Unzip the downloaded version of the PHP in a separate folder. Please make sure that your new php folder name is not "PHP". May be you can use filder name as the version name. For example for php 5.4 you can use php54.\r\n\r\nCopy the new php folder into your xampp folder. Now go to yourxampp/apache/conf/extra folder. Open file httpd-xampp.conf from the folder extra. Change the following variables:\r\n\r\nVariable PHPINIDir to be / Varaible LoadModule to be //php5apache2_2.dl\r\n\r\nSave the file httpd-xampp.conf. Restart your XAMPP apache server. If your server get restarted successfully then your server php version is upgraded.\r\n', '2015-10-10 10:55:14', 6),
(31, 15, 'kovpack', 'kovpack@informatika.org', '1) Download new php from official site (better some zip). Old php directory rename to php_old and create again php directory and put there unzipped files.\r\n\r\nIn php.ini connect needed modules if you used something that was turned off by default (like memcached etc.), but don''t forget to add corresponding .dll files.\r\n\r\n2) In my case I had to update Apache. So repeat the same steps: download new package, rename directories, create new apache directory and put there new files.\r\n\r\nNow you can try to restart apache running apache_start.bat from xampp folder (better run this bat, than restart apache service from Windows services window, cause in this case in console you''ll see all errors if there will be some, including lines in config where you''ll have problem). If you updated Apache and run this file, in the list of services you''ll see Apache2.2, but in description you can get another version (in my case that was Apache/2.4.7).\r\n\r\nIn case of Apache update you can get some problems, so mind:\r\n\r\n> after you replace the whole directory, you may need to configure you apache/conf/httpd.conf file (copy virtual hosts from old config, set up DocumentRoots, permissions for directories, all paths, extend list of index files (by default apache has only index.html so other index files will be just ignored and Apache will just list the site root directory in browser), configure you logs etc.)\r\n\r\n> connect modules you need (if you used something that was not turned on by default like mod_rewrite et', '2015-10-10 10:57:03', 1),
(32, 16, 'Meep3D', 'meep@if.itb', 'It''s a common problem when you have two floats inside a block. The best way of fixing it is using clear:both after the second div', '2015-10-10 12:25:24', 1),
(33, 16, 'Mikael S', 'mika@if.itb', 'Aside from the clear: both hack, you can skip the extra element and use overflow: hidden on the wrapping div:\r\n\r\n<div style="overflow: hidden;">\r\n    <div style="float: left;"></div>\r\n    <div style="float: left;"></div>\r\n</div>', '2015-10-10 12:28:52', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `topik` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`Id`, `username`, `topik`, `datetime`, `email`, `isi`, `vote`) VALUES
(16, 'WilliamLou', 'how to make a div to wrap two float divs inside?', '2015-10-10 12:21:37', 'williamlou@informatika.org', 'I don''t know if it''s a common problem, but I can''t find the solution in web so far. I would like to have two divs wrapped inside another div, however these two divs inside have to be align the same level (for example: left one takes 20%width of the wrappedDiv, right one take another 80%). To achieve this purpose, I used the following example CSS. However, now the wrap DIV didn''t wrap those divs all. The wrap Div has a small height than those two divs contained inside. How could I make sure that the wrap Div has the largest height as the contained divs? Thanks!!!', -3),
(15, 'Stanley Ngumo', 'Upgrading PHP in XAMPP for Windows?', '2015-10-10 10:28:06', 'stanley@informatika.org', 'I would like to know how you upgrade PHP in Xampp for Windows? I tried to download the latest PHP version from the main PHP site but when I check (phpinfo) I still get that the previous version is still in use.\r\n\r\nPlease advise.\r\n', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
