-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2015 at 03:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `StackExchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `Answer`
--

CREATE TABLE IF NOT EXISTS `Answer` (
`answer_id` int(4) unsigned NOT NULL,
  `question_id` int(4) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `vote` int(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Answer`
--

INSERT INTO `Answer` (`answer_id`, `question_id`, `email`, `name`, `content`, `vote`, `time`) VALUES
(1, 0, '0', 'saya', 'Distya cantik banget. like a princess', 0, '2015-10-16 09:00:37'),
(2, 0, '0', '', '', 0, '2015-10-16 09:00:37'),
(3, 11, '0', 'Chaer', 'Cantikacitata', 3, '2015-10-16 09:00:37'),
(4, 11, '0', 'saya', 'Myawawyaywaw', 15, '2015-10-16 09:00:37'),
(5, 11, '0', 'saya', 'Myawawyaywaw', 3, '2015-10-16 09:00:37'),
(6, 15, '0', 'aa', 'sasas', 0, '2015-10-16 09:00:37'),
(7, 15, '0', 'sasa', 'fsfs', 0, '2015-10-16 09:00:37'),
(8, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(9, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(10, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(11, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(12, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(13, 15, '0', 'sasa', 'sasa', 0, '2015-10-16 09:00:37'),
(14, 15, '0', 'asas', 'sasa', 0, '2015-10-16 09:00:37'),
(15, 15, '0', 'asas', 'sasa', 0, '2015-10-16 09:00:37'),
(16, 15, '0', 'asas', 'sasa', 0, '2015-10-16 09:00:37'),
(17, 15, '0', 'sasad', 'sasa', 0, '2015-10-16 09:00:37'),
(18, 15, '0', 'sasad', 'sasa', 0, '2015-10-16 09:00:37'),
(19, 11, '0', 'cantikaaa', 'Silililil', 0, '2015-10-16 09:00:37'),
(20, 11, '0', 'cantikaaa', 'Silililil', 0, '2015-10-16 09:00:37'),
(21, 11, '0', 'cantikaaa', 'Silililil', 0, '2015-10-16 09:00:37'),
(22, 11, '0', 'cantikaaa', 'Silililil', 0, '2015-10-16 09:00:37'),
(23, 54, '0', 'Ciatata', 'asa', 0, '2015-10-16 09:00:37'),
(24, 54, '0', 'Ciatata', 'asa', 0, '2015-10-16 09:00:37'),
(25, 11, '0', 'Nilta', 'Semangat ya chaer:)', 0, '2015-10-16 09:00:37'),
(26, 11, 'venny.cantik@gmail.com', 'Venny', 'Halo chaer, semangat yaah:3', 0, '2015-10-16 09:00:37'),
(27, 11, 'venny.cantik@gmail.com', 'Venny', 'Halo chaer, semangat yaah:3', 0, '2015-10-16 09:00:37'),
(28, 11, 'venny.cantik@gmail.com', 'Venny', 'Halo chaer, semangat yaah:3', 0, '2015-10-16 09:00:37'),
(29, 11, 'venny.cantik@gmail.com', 'Venny', 'Halo chaer, semangat yaah:3', 9, '2015-10-16 09:00:37'),
(30, 11, 'nilta@yahoo.com', 'Nilta', 'Semangat ya chaer:)', 0, '2015-10-16 09:00:37'),
(31, 136, '', 'Cha', '', 5, '2015-10-16 09:00:37'),
(32, 136, 'chanmonite@yahoo.com', 'myaw', 'WOY DIBAJAK WOY HAHAHA', 0, '2015-10-16 09:00:37'),
(33, 11, '', '', '', 0, '2015-10-16 09:00:37'),
(34, 11, '', '', '', 0, '2015-10-16 09:00:37'),
(35, 11, 'sa@gmail.com', 'Chairuni Aulia Nusapati', 'Ini cantik', 0, '2015-10-16 09:00:37'),
(36, 137, 'chanmonite@yahoo.com', 'Chairuni Aulia Nusapati', 'Ohiya Sasi, itu udah aku cek kok. Itu bener ada di tasku. Makasih ya udah balikin haha. Udah dicuciin pula:) maacii', 2, '2015-10-16 09:00:37'),
(37, 141, 'feryandi@xampp.com', 'Fery', 'Hello Jessica.\r\nCongratulations:\r\nYou successfully installed XAMPP on this system!\r\nNow you can start using Apache and Co. Firstly you should try Â»StatusÂ« on the left navigation to make sure everything works fine.\r\n\r\nAfter testing you may take a look at the examples below the test link.\r\n\r\nIf you want to start programming PHP or Perl (or whatever ;) please take a look at the XAMPP manual first and get more information about your XAMPP installation.\r\n\r\nGood luck,\r\nKai "Oswald" Seidler + Kay Vogelgesang', 5, '2015-10-16 09:00:37'),
(38, 141, 'sulebule@yahoo.com', 'Sule', 'Mba, saya iki ora ngerti sama pertanyaan mbak. Iku XAMPP opo seh? Aku ora ngerti.', -5, '2015-10-16 09:00:37'),
(39, 146, 'chaer@gmail.com', 'Chairuni ''Aulia Nusapati', 'Waa tifaaaaaa so cute', 0, '2015-10-16 09:34:41'),
(40, 147, 'omnom@yahoo.com', 'Chairuni Aulia Nusapati', 'Bew. itu ada di kotak alatku', 0, '2015-10-16 10:12:40'),
(41, 147, 'saskiaasahadatina@gmail.com', 'Sasi', 'kemaren aku liat dibawain maya bew', 0, '2015-10-16 10:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
`question_id` int(4) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `vote` int(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`question_id`, `name`, `email`, `topic`, `content`, `vote`, `time`) VALUES
(30, 'Doe Miller', 'john@example.com', 'Galau', 'Tio malem-malem galau soalnya ganemu runner hew', 2, '2015-10-16 09:01:02'),
(58, 'Chairuni Aulia Nusap', 'chairuni.aulia.nusapati@gmail.', 'Kenapa', 'Kenapa aku lapar', 0, '2015-10-16 09:01:02'),
(61, 'Chairuni Aulia Nusap', 'chairuni.aulia.nusapati@gmail.', 'Tio', 'Kasian dia lagi galau', 0, '2015-10-16 09:01:02'),
(65, 'Gazandi', 'Gazandi@myaw.com', 'MBD GMN NIH?', 'Gmn ya kabarnya MBD. Udah kelar sih haha', 0, '2015-10-16 09:01:02'),
(129, 'Zulva', 'zulvacantik@hotmail.com', 'Aku Masuk Koran', 'Aku keren kan kasuk koran?', 0, '2015-10-16 09:01:02'),
(130, 'Atika Hasiholan', 'atika@stei.itb.ac.id', 'Kenapa Aku Famous?', 'Saya sudah tau sejak lama kalau saya itu famous...', 0, '2015-10-16 09:01:02'),
(137, 'Saskia Ayuningtyas', 'sasi96@hotmail.com', 'Mouthpiece', 'Chaer, minggu lalu aku pinjem mouthpiece sama kamu. Itu udah aku taro di tas kamu ya. Ada ga? hhe. Kalo ga ada kabarin aja yaah. \r\nDitunggu kabarnyaaaa.\r\n', 0, '2015-10-16 09:01:02'),
(138, 'Jessica Handayani', 'jeshan@yahoo.com', 'XAMPP needs you', 'We are working on a new Welcome page for XAMPP and we need your help! ', 0, '2015-10-16 09:01:02'),
(139, 'Jessica Handayani', 'jeshan@yahoo.com', 'XAMPP needs you', 'We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. ', 0, '2015-10-16 09:01:02'),
(140, 'Jessica Handayani', 'jeshan@yahoo.com', 'XAMPP needs you', 'We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. ', 0, '2015-10-16 09:01:02'),
(141, 'Jessica Handayani', 'jeshan@yahoo.com', 'XAMPP needs you', 'We are working on a new Welcome page for XAMPP and we need your help! You can you can see the current version at Dashboard. We are improving our current "FAQs" and adding new "How to" guides. We posted some suggestions for new guides at ApacheFriends forum. If you have any comments or suggestions for the new welcome page, please don''t hesitate to post in the forum. Your feedback will help us improve XAMPP!. If you have any comments or suggestions for the new welcome page, please don''t hesitate to post in the forum. Your feedback will help us improve XAMPP!', 1, '2015-10-16 09:01:02'),
(142, 'William Sentosa', 'sensosa.sekali@hotmail.com', 'Ini AI Apa Kabar ya?', 'Bingung banget gua. Ini AI susah banget gangerti lagi. Ada yang kepikiran ga cara ngebikinnya? huhuhu', 0, '2015-10-16 09:02:10'),
(143, 'William Sentosa', 'sensosa.sekali@hotmail.com', 'Internet gue', 'Gilz internet mati. Ada yang tau internet apa yang nyala sekarang?', 0, '2015-10-16 09:03:24'),
(144, 'Ellie Elephant', 'ellie@gmail.com', 'Did you know About Elephant?', 'Throughout history, the elephant has played an important role in human economies, religion, and culture. The immense size, strength, and stature of this largest living land animal has intrigued people of many cultures for hundreds of years.\r\n\r\nIn Asia, elephants have served as beasts of burden in war and peace. Some civilizations have regarded elephants as gods, and they have been symbols of royalty for some.\r\n\r\nElephants have entertained us in circuses and festivals around the world. For centuries, the elephantâ€™s massive tusks have been prized for their ivory.\r\n\r\nThe African elephant once roamed the entire continent of Africa, and the Asian elephant ranged from Syria to northern China and the islands of Indonesia. These abundant populations have been reduced to groups in scattered areas south of the Sahara and in isolated patches in India, Sri Lanka, and Southeast Asia.\r\n\r\nDemand for ivory, combined with habitat loss from human settlement, has led to a dramatic decline in elephant populations in the last few decades. In 1930, there were between 5 and 10 million African elephants. By 1979, there were 1.3 million.\r\n\r\nIn 1989, when they were added to the international list of the most endangered species, there were about 600,000 remaining, less than one percent of their original number.\r\n\r\nAsian elephants were never as abundant as their African cousins, and today they are even more endangered than African elephants. At the turn of the century, there were an estimated 200,000 Asian elephants. Today there are probably no more than 35,000 to 40,000 left in the wild.', 2, '2015-10-16 09:15:06'),
(145, 'Ellie Elephant', 'ellie@gmail.com', 'Did you know About Elephant? It is endangered!!!', 'Throughout history, the elephant has played an important role in human economies, religion, and culture. The immense size, strength, and stature of this largest living land animal has intrigued people of many cultures for hundreds of years.\r\n\r\nIn Asia, elephants have served as beasts of burden in war and peace. Some civilizations have regarded elephants as gods, and they have been symbols of royalty for some.\r\n\r\nElephants have entertained us in circuses and festivals around the world. For centuries, the elephantâ€™s massive tusks have been prized for their ivory.\r\n\r\nThe African elephant once roamed the entire continent of Africa, and the Asian elephant ranged from Syria to northern China and the islands of Indonesia. These abundant populations have been reduced to groups in scattered areas south of the Sahara and in isolated patches in India, Sri Lanka, and Southeast Asia.\r\n\r\nDemand for ivory, combined with habitat loss from human settlement, has led to a dramatic decline in elephant populations in the last few decades. In 1930, there were between 5 and 10 million African elephants. By 1979, there were 1.3 million.\r\n\r\nIn 1989, when they were added to the international list of the most endangered species, there were about 600,000 remaining, less than one percent of their original number.\r\n\r\nAsian elephants were never as abundant as their African cousins, and today they are even more endangered than African elephants. At the turn of the century, there were an estimated 200,000 Asian elephants. Today there are probably no more than 35,000 to 40,000 left in the wild.\r\n\r\nDescription\r\n\r\nAt first glance, African and Asian elephants appear the same. An informed eye, however, can distinguish the two species. An African bull elephant (adult male) can weigh as much as 14,000 to 16,000 pounds (6300 to 7300 kg) and grow to 13 feet (four meters) at the shoulder. Its smaller relative, the Asian elephant, averages 5,000 pounds (2300 kg) and 9 to 10 feet (3 meters) tall.\r\n\r\nThe African elephant is sway-backed and has a tapering head, while the Asian elephant is hump-backed and has a huge, domed head. Probably the most interesting difference between the two species is their ears. Oddly, the African elephantâ€™s large ears match the shape of the African continent, and the Asian elephantâ€™s smaller ears match the shape of India.\r\n\r\nElongated incisors (front teeth), more commonly known as tusks, grow up to 7 inches (18 cm) per year. All elephants have tusks, except for female Asian elephants. The largest of the African bullsâ€™ tusks can weigh as much as 160 pounds (73 kg) and grow to 12 feet (4 meters) long. Most animals this big, however, are gone; they were the first to be killed for their ivory.\r\n\r\nMost African elephants live on the savanna, but some live in forests or even deserts. Most Asian elephants live in forests. As herbivores (plant eaters), elephants consume grass, foliage, fruit, branches, twigs, and tree bark. Elephants spend three-quarters of its day eating, and they eats as much as 400 pounds (880 kg) of vegetation each day. For this task, they have only four teeth for chewing.\r\n\r\nIn the hot climates of their native habitats, elephants need about 50 gallons (190 liters) of water to drink every day. Elephants boast the largest nose in the world, which is actually part nose and part upper lip. It is a large natural hose, with a six-gallon (23-liter) capacity.\r\n\r\nRole in the Ecosystem\r\n\r\nElephants are considered a Keystone species in the African landscape. They pull down trees, break up bushes, create salt licks, dig waterholes, and forge trails. Other animals, including humans, like the pygmies of the Central African Republic, depend on the openings elephants create in the forest and brush and in the waterholes they dig.\r\n\r\nEven elephant droppings are important to the environment. Baboons and birds pick through dung for undigested seeds and nuts, and dung beetles reproduce in these deposits. The nutrient-rich manure replenishes depleted soil. Finally, it is a vehicle for seed dispersal. Some seeds will not germinate unless they have passed through an elephantâ€™s digestive system.\r\n\r\nBehavior\r\n\r\nWild elephants have strong family ties. The females and young are social, living in groups under the leadership of an older female or matriarch. Adult males are solitary, although they stay in contact with the females over great distances, using sounds well below the range of human hearing. Family groups communicate with each other using these low-frequency vibrations.\r\n\r\nIt is an eerie sight to see several groups converging on a waterhole from miles apart, apparently by some prearranged signal, when human observers have heard nothing.\r\n\r\nThe natural lifespan of an elephant, about 70 years, is comparable to a humanâ€™s. Elephants reach breeding age at about 15 years of age. Females generally give birth to one 200-pound baby after a 22-month pregnancy.\r\n\r\nElephants and Humans\r\n\r\nHumans first tamed Asian elephants more than 4,000 years ago. In the past, humans used elephants in war. Elephants have been called the â€œpredecessors to the tankâ€ because of their immense size and strength. They were important to military supply lines as recently as the Vietnam War in the 1960s.\r\n\r\nAlthough African elephants are harder to train than Asian, they too have worked for humans, mostly during wartime. For example, the elephants that carried Hannibalâ€™s troops across the Alps to attack the Romans in 200 B.C. were African.\r\n\r\nIn modern times humans use elephants primarily for heavy jobs like hauling logs. An elephant is the ultimate off-road vehicle and can get tremendous traction even on slippery mud. An elephant actually walks on its toes, aided by a great flesh-heel pad that can conform to the ground.\r\n\r\nIn some remote areas of Southeast Asia it is still more economical to use elephants for work than it is to use modern machinery. Scientific researchers use elephants for transportation in the hard-to-reach, swampy areas they study, and tourists ride elephants to view wildlife in Asian reserves. Elephants are the ideal mobile viewing platform in the tall grass found in many parks.\r\n\r\nAsia has always had a strong cultural connection to the elephant. In Chinese, the phrase â€œto ride an elephantâ€ sounds the same as the word for happiness. When Thailand was called Siam, the sacred White Elephant dominated the flag and culture. According to Thai legend, in the beginning all elephants were white and flew through the air, like the clouds and rain.\r\n\r\nThousands of years later, a white elephant entered the side of Queen Sirimahamaya as she lay sleeping. Later she gave birth to Prince Siddhartha, the future Guatama Buddha. Among the predominantly Buddhist kingdoms of Southeast Asia, the most auspicious event possible during a monarchâ€™s reign was the finding of a white elephant.\r\n\r\n', 0, '2015-10-16 09:15:59'),
(146, 'Tifa', 'tifa@gmail.com', 'Kucing Terbang', 'I just love cats. I can''t stand it.', 0, '2015-10-16 09:31:08'),
(147, 'bewe', 'aldishabintang@gmail.com', 'mallet dimana nih?', 'kemaren aku kehilangan mallet di atm center ada yang tau ga?\r\n', 0, '2015-10-16 10:12:11'),
(148, 'Arjuna', 'arjunagbt@gmail.com', 'misc.', 'ada yang tau authorized reseller Audemars Piguet di bandung?', 0, '2015-10-16 10:17:27'),
(149, 'mita', 'peha@gmail.com', 'kabar', 'haiiirrr caeritiii apa kabarrrr? lagi sibuk apa sekarang wkwk gerilya 8jam nya jgn lupa yaaa luvvv', 0, '2015-10-16 10:25:21'),
(150, 'Ike Larasayu', 'Larasike@gmail.com', 'MBWG in your eyes', 'Menurut lo MBWG tuh gimana sih? Ngeselin yak? Jawab aja jujur!!!!!!!', 0, '2015-10-16 11:01:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answer`
--
ALTER TABLE `Answer`
 ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
 ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answer`
--
ALTER TABLE `Answer`
MODIFY `answer_id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
MODIFY `question_id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
