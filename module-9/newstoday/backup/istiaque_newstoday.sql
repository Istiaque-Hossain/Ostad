-- MySQL dump 10.19  Distrib 10.3.35-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: istiaque_newstoday
-- ------------------------------------------------------
-- Server version	10.3.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(20) NOT NULL,
  `c_desc` varchar(255) NOT NULL,
  `c_status` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`c_id`, `c_name`, `c_desc`, `c_status`) VALUES (137,'Uncategorized','Which has no category ',1),(138,'Banglagesh','local',1),(139,'International','whole world',1),(140,' Sports','football, cricket ......',1),(142,'Entertainment   ','fun',0),(143,' Business ','money, trade',1),(144,' Lifestyle ','life tips',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `cmnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmnt_author` int(11) NOT NULL,
  `cmnt_desc` text NOT NULL,
  `cmnt_date` datetime NOT NULL,
  `cmnt_post` int(11) NOT NULL,
  PRIMARY KEY (`cmnt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`cmnt_id`, `cmnt_author`, `cmnt_desc`, `cmnt_date`, `cmnt_post`) VALUES (1,140,'Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.','2021-07-01 19:30:48',2),(2,144,'Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation.','2021-07-08 00:00:00',2),(3,145,'Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum.','2021-07-05 15:48:37',2),(4,145,'this is admin2','2021-07-05 15:59:21',2),(5,147,'vitamin','2021-07-05 16:26:08',19),(8,147,'fruit','2021-07-05 16:42:58',19),(9,147,'love','2021-07-05 16:47:44',19),(29,147,'fd','2021-07-05 23:15:39',25),(31,147,'lol','2021-07-05 23:33:30',25),(34,147,'36','2021-07-05 23:36:07',25),(39,0,'test','2021-07-06 00:18:13',25),(40,0,'2nd test','2021-07-06 00:19:05',25),(41,0,'3rd','2021-07-06 00:21:15',25),(48,147,'final','2021-07-06 00:30:51',25),(49,147,'great post','2021-07-06 00:32:05',2),(51,147,'great','2021-07-06 01:00:27',2),(62,147,'nice','2021-07-06 01:33:49',9),(63,147,'good','2021-07-06 01:33:56',9),(64,147,'wow','2021-07-06 01:34:04',9),(65,147,'joss','2021-07-06 01:34:11',9),(67,147,'1.35','2021-07-06 01:35:41',19),(68,145,'joss','2021-07-06 01:42:50',19),(69,147,'sad','2021-07-06 01:45:21',18),(73,155,'off day','2021-07-06 20:28:15',11);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_author` int(11) NOT NULL,
  `p_desc` text NOT NULL,
  `p_date` datetime NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_cmnt` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_view` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`p_id`, `p_title`, `p_img`, `p_author`, `p_desc`, `p_date`, `p_cat`, `p_cmnt`, `p_status`, `p_view`) VALUES (2,'Ultraconservative cleric Raisi wins Iran presidential vote','1363710496prothomalo-english_2021-06_8763ba92-6e39-4df2-92ca-ae00ef77b7f2_Ebrahim_Raisi.jpg',144,'            Ultraconservative cleric Ebrahim Raisi was declared the winner Saturday of Iran’s presidential election, a widely anticipated result after many political heavyweights were barred from running.\r\n\r\nRaisi won 62 per cent of the vote with about 90 per cent of ballots counted from Friday’s election, poll officials said, without releasing turnout figures, after the three other candidates had conceded defeat.\r\n\r\n“I congratulate the people on their choice,” said outgoing moderate president Hassan Rouhani, who has served the maximum of two consecutive four-year terms and leaves office in August.            ','2021-07-06 17:44:17',139,0,1,178),(9,'De Kock misses ton but South Africa in control against Windies','555853133prothomalo-english_2021-06_a7fcd083-d9c5-4592-9d0d-b6d795f23b5c_SOuth_Africa_West_INdies_Test.jpg',147,'   lorem sdjkdsf kldsdjf ksdjksdjklfjs ksdjlksdjklfjweijsdklkldnvk ksdfjkdsjfkls\'d   ','2021-07-06 17:14:07',140,0,1,20),(10,'Bangladesh reports highest 8,822 Covid cases, 115 more deaths in 24 hrs','1691772708prothomalo-english_2020-05_987fb928-d2a9-4d90-aac5-9903ec143fbd_2020_05_17T034634Z_577729139_RC23QG9KC4RD_RTRMADP_3_HEALTH_CORONAVIRUS_SOUTHASIA.jpg',147,' Bangladesh reported the highest single-day cases of coronavirus on Wednesday, according to the government.\r\n\r\nThe number of detected novel coronavirus cases in Bangladesh rose to 913,258 as 8,822 more cases were reported, after testing 35,105 samples, including rapid antigen tests, in the last 24 hours.\r\n\r\nDuring that time 115 Covid-19 patients died, raising the total deaths in the country to 14,503, said a press release of Directorate General of Health Services (DGHS) Wednesday.\r\n\r\nThe rate of detection in the last 24 hours until 8:00 am was 25.13 per cent, while the overall rate of detection of infected cases in Bangladesh as of Wednesday stands at 13.82 per cent.\r\n\r\nThe health directorate today said as many as 4,550 people recovered from the highly infectious disease in the last 24 hours, taking the number of total recovery to 816,250. ','2021-07-03 00:00:00',138,0,1,5),(11,'Bank transactions closed Sunday, operations in limited scale from Monday','302036prothomalo-english_2021-06_e1f331cd-d82e-4c6d-a954-2ba7602f852b_Bank_2.jpg',144,'      Bank will operate in a limited scale as the government has enforced strict restrictions from 6:00am on 1 July till midnight 7 July to contain the spread of coronavirus.\r\n\r\nBank transitions will remain open from 10:00am to 1:30PM.\r\n\r\nBangladesh Bank issued a gazette notification in this regard on Wednesday. \r\n\r\nBanks will also remain closed on Sunday.\r\n\r\nBank will also remain closed on Thursday as the day is bank holiday.\r\n\r\nAccording to the gazette notification, essential departments of head offices of all banks will mandatorily remain open with limited manpower. Principal branches and all foreign trade sections will have to be kept open with essential manpower.\r\n\r\nIn case of state-owned banks, in consideration of the bank management, a branch will have to be kept open in district headquarters and a branch in upazila level. At best two branches have to be kept open outside the district headquarters.      ','2021-07-03 00:00:00',138,0,1,7),(16,'Discrepancies in distribution of oxygen supply equipment','1572981596prothomalo-english_2020-04_10578330-08e2-492e-81d4-e562f2cc7b7b_2.jpg',147,' In the 13 hours between 8:00pm Thursday and 9:00am Friday at the Mohammad Ali Hospital in Bogura, seven coronavirus patients died. These patients had been suffering from severe respiratory problems. Their families complain that they died due to a lack of high flow nasal cannula, required to supply oxygen.\r\n\r\nThe hospital’s superintendent ATM Nuruzzaman also admitted to the crisis of high flow nasal cannula. Speaking to Prothom Alo on Friday, he said there are complaints that patients have died due to the lack of high flow nasal cannula. He said the hospital did not have the capacity to provide oxygen to more than two patients at a time by means of high flow nasal cannula. In a note issued Friday night, the Bogura deputy commissioner Ziaul Huq also said that the shortage of high flow nasal cannula was creating difficulties in the management of critical patients.\r\n\r\nInquiries made following the deaths of coronavirus patients in Bogura, revealed that there were discrepancies in the information provided by the Directorate General of Health Services (DGHS) regarding high flow nasal cannula.\r\n\r\nAccording to DGHS, there are 1,690 high flow nasal cannulas for coronavirus patients all over the country. But inquiries around eight districts Friday revealed that there were not as many high flow nasal cannulas as shown in the hospital-wise figures provided by DGHS. ','2021-07-03 00:00:00',139,0,1,4),(17,'Global Covid cases surpass 183m','1921182228prothomalo-english_2020-08_ebeefb67-bdc0-417d-a4d0-7c844c12221d_HEALTH_CORONAVIRUS_VIETNAM.jpg',147,'   With the new variants of Covid-19 spreading faster than ever before in several nations, the global coronavirus cases have now topped 183 million.\r\n\r\nAccording to Johns Hopkins University (JHU), the total case count and fatalities reached 183,015,891 and 3,962,894, respectively, on Saturday morning.\r\n\r\nTo date, 3,128,422,118 vaccine doses have been administered across the world. \r\n\r\nThe US, the worst-hit country in terms of cases and deaths, has so far logged 33,693,352 infections and 605,309 fatalities, respectively, as per the JHU data. ','2021-07-03 00:00:00',139,0,1,4),(18,'India’s Covid toll goes past 400,000','1093433831prothomalo-english_2021-04_381b899a-8ec4-44b7-9ff7-190f97bbd2c6_2021_04_24T093736Z_1637509300_RC292N946LHO_RTRMADP_3_HEALTH_CORONAVIRUS_INDIA.jpg',147,' India on Friday became the third country, after the US and Brazil, to cross four lakh deaths due to Covid-19 pandemic. There were 853 deaths reported in past 24 hours.\r\n\r\nAccording to data released by the Union Health and Family Welfare Ministry on Friday, there were 46,617 fresh cases during the same period.\r\n\r\nWith six lakh deaths US is at the top of the list followed by Brazil with 520,000 due to the coronavirus. ','2021-07-03 00:00:00',139,0,1,129),(19,'Why Vitamin C is your skincare’s holy grail','1641505419prothomalo-english_import_media_2016_03_26_5681c5dc28cdf678f68861f09fa3901d-c.jpg',147,'Whether you are a skincare fanatic or have just started your journey towards creating your own beauty regime, you would have come across a multiplicity of ingredients on skincare product labels that often leave you wondering what a good fit for you. The most versatile yet tricky amongst those is Vitamin C.\r\n\r\nMost people get a fair dose of this vitamin from the food, fruits, and vegetables they eat. It is a legendary supplement required to keep our immune system robust and fortify our bodies against diseases. It has also played a crucial part in our fight against Covid-19.\r\n\r\nWith countless benefits internally, the vitamin has equal, if not more, dermatological advantages. Arushi Thapar, senior marketing manager, Plum, PurePlay Skin Sciences Pvt Ltd. shares more on the new ‘in’ natural additive.','2021-07-03 00:00:00',144,0,1,160),(25,'Himsagar is the champagne of mangoes!','205335435prothomalo-english_2021-07_741016b8-c463-45f4-bc58-8e7966060893_vvvv.jpg',147,'Kathleen Ferrier, chair of the Netherlands UNESCO commission and former member of parliament, Laetitia van den Assum, former Dutch diplomat and a member of Kofi Annan commission, or Jan van Zanen, mayor of the Hague, were unfamiliar with the taste and flavour of Bangladeshi mango ‘Himsagar’\r\n\r\nThey tasted ‘Himsagar’ for the first time and termed this mango exported from the Rajshahi orchards, ‘the champagne of mangoes’.','2021-07-05 01:17:20',138,0,1,100),(28,'Bangladesh reports 163 Covid-19 deaths, over 11,500 cases, highest detection rate in 24 hrs','288111778prothomalo-english_2021-06_a747602c-a886-4c6e-9731-d82468f51b44_4.jpg',155,' The number of detected novel coronavirus cases in Bangladesh, according to the government, on Tuesday rose to 966,406 as 11,525 more cases were reported, after testing 36,631 samples, including rapid antigen tests, in the last 24 hours.\r\n\r\nDuring that time 163 more Covid-19 patients died, raising the total deaths in the country to 15,392, said a press release of Directorate General of Health Services (DGHS) today. ','2021-07-06 20:31:33',138,0,1,5);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_banner` varchar(255) NOT NULL,
  `s_post` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`s_id`, `s_banner`, `s_post`) VALUES (1,'banner.jpg',3);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_img` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `u_phone` int(11) DEFAULT NULL,
  `u_dob` date NOT NULL DEFAULT current_timestamp(),
  `u_gender` varchar(10) DEFAULT NULL,
  `u_bio` text DEFAULT NULL,
  `u_education` text DEFAULT NULL,
  `u_status` int(11) DEFAULT NULL,
  `u_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`u_id`, `u_name`, `u_img`, `u_email`, `u_password`, `u_address`, `u_phone`, `u_dob`, `u_gender`, `u_bio`, `u_education`, `u_status`, `u_role`) VALUES (140,'Istiaque','1622526621person (1).png','istiaque@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','chittagong',17310,'2021-06-29','Male','lol','honours',0,0),(144,'Imam','1232526267person (3).jpg','im@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',17154,'0000-00-00','Choose...','','',0,1),(145,'Riaz','794254314person (2).png','ad@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','dhakaa',17151819,'2021-06-30','Choose...','ami tmi','',0,0),(147,'shuvo','1438705246person (5).jpg','shuv@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',0,'0000-00-00','Choose...','','',0,2),(148,'shuvo1','380401950person (4).jpg','shuv1@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',0,'0000-00-00','Choose...','','',0,0),(149,'rafi','2137612870person (1).jpg','rafi@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',17151,'0000-00-00','Choose...','bla bla','',0,0),(150,'Tanvir','1158874252person (1).png','tan@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','tongo',181,'0000-00-00','Choose...','lol','',0,0),(151,'jasi','856459235person (2).jpg','jasi@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','ctg',0,'2021-06-01','Female','lol','hsc',0,0),(152,'xcxc','1641680325person (6).jpg','xcxc@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',0,'0000-00-00','Choose...','','',0,0),(155,'Ryhan','1728589200person (1).jpg','rn@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','',0,'0000-00-00','Choose...','','',0,1),(159,'Server','1667674132depositphotos_118504756-stock-illustration-asian-wok-box-logo.jpg','ser@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','dhaka',1772845793,'2021-09-10','Male','bakar','Bsc',0,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'istiaque_newstoday'
--

--
-- Dumping routines for database 'istiaque_newstoday'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-15 12:43:01
