CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_email` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `vote` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `content` text,
  `author` varchar(255) DEFAULT NULL,
  `author_email` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `vote` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;