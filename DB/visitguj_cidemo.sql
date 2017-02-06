-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2016 at 10:40 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `visitguj_cidemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title_tag` varchar(255) DEFAULT NULL,
  `alt_tag` varchar(255) DEFAULT NULL,
  `limage` varchar(255) NOT NULL,
  `ltitle_tag` varchar(255) NOT NULL,
  `lalt_tag` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `d_order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_type`, `title`, `image`, `title_tag`, `alt_tag`, `limage`, `ltitle_tag`, `lalt_tag`, `status`, `d_order`, `created_at`, `updated_at`) VALUES
(11, 'home-slider', 'Android Application development', '1474092512-home-slider.jpg', 'Android Application development', 'Android Application development', '1474092512-home-slider.jpg', 'Android Application development', 'Android Application development', 'Y', 1, '2012-03-23 18:01:35', '2016-09-17 11:09:32'),
(12, 'home-slider', 'Search Engine Optimization', '1474092796-home-slider.jpg', 'Search Engine Optimization', 'Search Engine Optimization', '1474092796-home-slider.jpg', 'Search Engine Optimization', 'Search Engine Optimization', 'Y', 2, '2012-03-23 18:02:52', '2016-09-17 11:09:16'),
(14, 'home-slider', 'Web Design', '1474092399-home-slider.jpg', 'Web Design', 'Web Design', '1474092399-home-slider.jpg', 'Web Design', 'Web Design', 'Y', 3, '2012-03-23 18:05:01', '2016-09-17 11:09:39'),
(104, 'logo', 'Evosta Infotech', '1473313260-logo.png', 'Evosta Infotech', 'Evosta Infotech', '1473313260-logo.png', 'Evosta Infotech', 'Evosta Infotech', 'Y', 1, '2014-03-11 12:09:22', '2016-09-08 11:09:00'),
(130, 'portfolio', 'Biznox Business World ', '1473337037-portfolio.png', 'Biznox Business World - Project 1 Evosta Infotech', 'Biznox Business World - Project 1 Evosta Infotech', '1473337037-portfolio.png', 'Biznox Business World - Project 1 Evosta Infotech', 'Biznox Business World - Project 1 Evosta Infotech', 'Y', 1, '2014-06-07 10:41:52', '2016-09-08 17:09:18'),
(131, 'portfolio', 'Job Portal - Pharma Careers ', '1473337221-portfolio.png', 'Job Portal - Pharma Careers Project 2 Evosta Infotech', 'Job Portal - Pharma Careers Project 2 Evosta Infotech', '1473337221-portfolio.png', 'Job Portal - Pharma Careers Project 2 Evosta Infotech', 'Job Portal - Pharma Careers Project 2 Evosta Infotech', 'Y', 2, '2014-06-07 10:44:58', '2016-09-08 17:09:21'),
(133, 'portfolio', 'GYM ', '1473337975-portfolio.jpg', 'GYM Website', 'GYM Website', '1473337975-portfolio.jpg', 'GYM Website', 'GYM Website', 'Y', 3, '2014-06-07 10:47:57', '2016-09-08 18:09:55'),
(134, 'portfolio', 'Corporate Photography Contest - 2016 ', '1473337878-portfolio.png', 'Corporate Photography Contest', 'Corporate Photography Contest', '1473337878-portfolio.png', 'Corporate Photography Contest', 'Corporate Photography Contest', 'Y', 4, '2014-06-07 10:49:11', '2016-09-08 18:09:18'),
(170, 'portfolio', 'Message Application ', '1473338169-portfolio.png', 'Message Application ', 'Message Application ', '1473338169-portfolio.png', 'Message Application ', 'Message Application ', 'Y', 5, '2016-08-12 07:08:41', '2016-09-08 18:09:09'),
(171, 'home-slider', 'Complete Web Solutions', '1474092918-home-slider.png', 'Complete Web Solutions', 'Complete Web Solutions', '1474092918-home-slider.png', 'Complete Web Solutions', 'Complete Web Solutions', 'Y', 9, '2016-09-17 11:09:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `project_information` longtext NOT NULL,
  `inquiry_file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `fullname`, `location`, `mobile_no`, `email`, `website`, `requirement`, `project_information`, `inquiry_file`, `created_at`, `updated_at`) VALUES
(1, 'chirag boghani', 'Rajkot,Gujarat,India', '8758991010', 'boghani7444@gmail.com', 'www.boghani7444.com', '', 'my site redesign :: www.boghani7444.com ', '', '2016-08-10 11:14:30', '2016-08-10'),
(2, 'boghani chirag', 'rajkot, gujarat, india', '8758991010', 'boghani7444@gmail.com', 'evosta.pws', 'Web Development,Mobile Apps Development,Hire Dedicated Resources', 'dscsdcscdsdcsd', '', '2016-08-12 06:43:23', '0000-00-00'),
(3, 'asfasf', 'rajkot, gujarat, india', '545646546466', 'boghani7444@gmail.com', 'evosta.pws', 'Web Development,Mobile Apps Development,Hire Dedicated Resources,Enterprise Solution', 'sdvcdsvs sdfsd sdvsdv', '', '2016-08-12 01:06:05', '0000-00-00'),
(4, 'boghani chirag', 'rajkot, gujarat, india', '12312332313', 'boghani7444@gmail.com', 'evosta.pws', 'Web Development,Mobile Apps Development,Application Services,Hire Dedicated Resources,Cloud Solutions', 'sacscsdcscsd', '', '2016-08-12 01:07:18', '0000-00-00'),
(5, 'boghani chirag', 'rajkot, gujarat, india', '12312332313', 'boghani7444@gmail.com', 'evosta.pws', 'Web Development,Mobile Apps Development,Application Services,Hire Dedicated Resources,Cloud Solutions', 'sacscsdcscsd', '', '2016-08-12 05:41:44', '0000-00-00'),
(6, 'boghani chirag', 'rajkot, gujarat, india', '12312332313', 'boghani7444@gmail.com', 'evosta.pws', 'Web Development,Mobile Apps Development,Application Services,Hire Dedicated Resources,Cloud Solutions', 'sacscsdcscsd', '', '2016-08-12 05:41:05', '0000-00-00'),
(7, 'chirag test', 'Rajkot, Gujarat, India', '8758991010', 'boghani7444@gmail.com', 'http://www.evostainfotech.com', 'Web Development,Mobile Apps Development,Application Services,Hire Dedicated Resources,Cloud Solutions,IT Consultancy,Embedded Solutions,UI/UX Services', 'vsvdsv d sf sd fd sf sdfsdf sd fsdf ', '', '2016-09-03 11:00:55', '0000-00-00'),
(8, 'chirag test', 'Rajkot, Gujarat, India', '8758991010', 'boghani7444@gmail.com', 'http://www.evostainfotech.com', 'Web Development, Mobile Apps Development, Application Services, Hire Dedicated Resources, Cloud Solutions', 'sdv vsd vsd vsdv sv ', '1472882567-inquiry.pdf', '2016-09-03 11:32:47', '0000-00-00'),
(9, 'chirag test', 'Rajkot, Gujarat, India', '8758991010', 'boghani7444@gmail.com', 'http://www.evostainfotech.com', 'Web Development, Mobile Apps Development, Application Services, Hire Dedicated Resources', 'dcvsvsdvsddvsdv sdfsdfsdf', '1472882787-inquiry.pdf', '2016-09-03 11:36:27', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `service_link` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `sort_keyword` varchar(255) NOT NULL,
  `service_icon` varchar(255) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `d_order` int(15) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_link`, `page_title`, `sort_keyword`, `service_icon`, `service_image`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `status`, `d_order`, `created_at`, `updated_at`) VALUES
(2, 'Mobile Application', 'mobile-application', 'Mobile Application', 'Mobile Application', '1474094045-service-icon.png', '1470834724-service-image.png', 'Android Social Apps | Social Networking Apps Development | Android Application Rajkot- Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', ' App Development - Evosta Infotech Create Smarter Apps for Smarter Businesses Social networks have emerged as one of the best tools for online business marketing and promotion.', '<p>We as a whole know about the real pretended by cell phones, tablets and other versatile electronic contraptions in today&#39;s reality. Alongside them, the various applications that chips away at different portable working frameworks like android, IOS have turned out to be much mainstream. Here comes the centrality of Tech bold and our administrations. We have been effectively creating and conveying Mobile applications according to our customer necessities for over 5 years. We likewise have a demonstrated reputation in web application improvement for above 10 years.</p>\r\n\r\n<p>Versatile application Development is in extraordinary interest nowadays as it has turned into an enthusiasm for innovation applicants to appreciate all the propelled advancements through their phones. OurMobile Application Development Services incorporate iPhone Application Development, Android Application Development and PhoneGap Application Development. We guarantee altered administration with no trade off in the security and believability of the information concerned. The clients can rely on upon our items as we utilize the most solid hotspots for information accumulation and additionally its execution.</p>\r\n\r\n<p>Indeed, even after the presentation of android cell phones in the business sector, iPhone lovers have been faithful to Apple gadgets. Still there are a large number of Apple gadget clients and they steady download new and most recent applications. The iPhone application business sector is exceptionally lucrative yet to beat the graph, you need right application with right functionalities and right backing from the master group. Tech bold Technologies is a main iPhone and iOS application development organization which has been providing different customers since 5 year with creative and tweaked applications which are effectively recorded in the Apple application store.</p>\r\n', '1', 2, '2016-08-10', '2016-09-17'),
(3, 'E-commerce Market Place', 'Ecommerce-Development', 'E-commerce Market Place', 'E-commerce Market Place', '1474094242-service-icon.png', '1470834878-service-image.png', 'E-commerce Market Place - Evosta infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta infotech offers custom E-commerce Market Place Services in Anywhere. our  developers build eCommerce website, web applications, Web Portals and many more.', '<p>Techno Bold Technologies influences the best-of-innovations to create rich, easy to understand and compelling Desktop Applications that work logged off and keep running off the web program. We help you spruce-up your business surroundings through rich, simple to-use, simple to-access, new-era Rich Desktop Applications (RDAs) and Rich Internet Desktop Applications (RIDAs) utilizing the most recent Microsoft Windows Presentation Foundation (WPF), Windows Forms, and Silverlight innovations.</p>\r\n\r\n<p>Software Development Tools and applications continually change, and associations are in a continuous cycle to create instruments and projects that can better mechanize their procedures to give arrangements that give them a maintained upper hand.</p>\r\n\r\n<p>Applying our industry skill, specialized experience, and UI plan aptitude, we create Desktop Applications that accomplishes a very profitable end client environment. That at last results in enhanced execution and business efficiency for our customers. Our Desktop Applications help clients see and oversee a lot of data successfully without getting overpowered by unpredictability.</p>\r\n\r\n<p>Techno Bold Technologies can work with you to characterize your prerequisites, build up a strong useful particular, plan wireframes, build up the application, and after that test it for sending. We have a wide scope of advancement ability.</p>\r\n', '1', 3, '2016-08-10', '2016-09-17'),
(4, 'Web Hosting', 'Web-Hosting', 'Web Hosting', 'Web Hosting', '1474094295-service-icon.png', '1470834964-service-image.png', 'WEB Hosting Company Rajkot - Evosta infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Web Hosting company in Rajkot - India. We provide Dedicated servers as well as shared hosting.', '<p>Conventional programming advancement techniques don&#39;t manage how every now and again or routinely you incorporate the majority of the source on a venture. Developers can work independently for a considerable length of time, days, or even weeks on the same source without acknowledging what number of contentions (and maybe bugs) they are creating.</p>\r\n\r\n<p>Flexible groups, since they are creating powerful code every emphasis, commonly find that they are backed off by the long diff-determination and troubleshooting sessions that frequently happen toward the end of long combination cycles. The more software engineers are sharing the code, the more hazardous this is. Thus, nimble groups frequently subsequently utilize Continuous Integration.</p>\r\n\r\n<p>Constant Integration (CI) includes creating a spotless form of the framework a few times each day, as a rule with a device like Cruise Control, which utilizes Ant and different source-control frameworks. Dexterous groups commonly arrange CI to incorporate computerized gathering, unit test execution, and source control joining. Some of the time CI likewise incorporates consequently running mechanized acknowledgment tests, for example, those created utilizing Fitness.</p>\r\n\r\n<p>Execution of an application is one of the significant issues experienced by programming development companies. We have involvement in Functional and Performance testing of a product be it a Web based application or a customer server application. Our execution testing administrations incorporate burden testing, stress testing, adaptability testing, unwavering quality testing and volume testing.</p>\r\n', '1', 4, '2016-08-10', '2016-09-17'),
(5, 'Digital Marketing', 'digital-marketing', 'DIGITAL MARKETING', 'DIGITAL MARKETING', '1474094370-service-icon.png', '1470835046-service-image.png', 'DIGITAL MARKETING - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Social media, SEO, online reputation , all of it has to come together as one unit to drive results.', '<p>Our Software Application developmenthold the ability in your legacy applications and in the meantime influence on the execution capability of most recent innovations. Whether the improvement toolset is at the desktop or on the Internet, Techno Bold is fit for creating and actualizing Software Development applicationporting ventures. We perform relocation/reengineering of utilizations from existing stages to fresher ones and from more established legacy innovations to more up to date open advances.</p>\r\n\r\n<p>Development system can incorporate a methodology that:</p>\r\n\r\n<ul>\r\n	<li>Incorporates Legacy Systems and new Internet driven innovations.</li>\r\n	<li>Development of frameworks and business rationale to new designs, dialects and electronic situations.</li>\r\n	<li>Guarantees frameworks quality and dependability.</li>\r\n	<li>Supplant a legacy framework, moving the information from the legacy application to the new application while safeguarding information honesty.</li>\r\n	<li>Combine legacy frameworks taking out duplication by moving information and usefulness from different frameworks to a littler number of frameworks.</li>\r\n</ul>\r\n', '1', 5, '2016-08-10', '2016-09-17'),
(7, 'Web Application', 'web-application', 'Web Application', 'Web Application', '1474094142-service-icon.png', '1470836470-service-image.png', 'WEB Application Development - Evosta infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta infotech offers custom Web Application Development Services in Anywhere. our PHP developers build eCommerce website, web applications, Web Portals and many more.', '<h4>We are one of the best web application development organization in USA.</h4>\r\n\r\n<p>At Tech Bold Company , we goes for making intense and compelling web applications that meets the definite prerequisites of our clients in a proficient way. We are masters in application improvement that utilizations propelled web application systems including PHP, JQuery,MySQL, CakePHP, Bootstrap, and ASP.NEt. We likewise performs portable application improvement and the group at Tech Bold had created different applications that capacities well with the current versatile working frameworks.</p>\r\n\r\n<p>Our specialities are experienced task administration, consistent client correspondence and committed group for guaranteeing the quality in every levels of advancement. We promises you proficient webdesigningwith honest to goodness content. We guarantee the straightforwardness over the whole SDLC life cycle. We, the Tech Bold, gives prime significance as per the general inclination of our customers furthermore the items are client driven, which makes us more mainstream among our customers. Without a doubt, we are the best decision for your web application and designingneeds.</p>\r\n\r\n<h2>Web Design</h2>\r\n\r\n<p>When we have an arrangement for the new plan, we contact our customers and persuade and take recommendations for development. This correspondence gives end-to-end go down for setting up the best exertion from our specialized group while they outline the sites. It is required to revive and upgrade the internet searcher friendly substance as indicated by the overhauls in the new site plan.</p>\r\n\r\n<h2>Web Development</h2>\r\n\r\n<p>Our flexible, versatile and easy to understand web developing arrangements depend on the predominant programming rehearses, effective structure programming, coding norms and rules. From execution, quality confirmation, ease of use, security, to stretch testing &ndash; we utilize stringent quality testing measures and most exceptional apparatuses to make best in class and powerful web applications, modified for your business. We additionally guarantees you secure and solid coding highlights with no trade off in the flawlessness. Along these lines, consumer loyalty is accomplished which makes us best in the business.</p>\r\n', '1', 1, '2016-08-10', '2016-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE IF NOT EXISTS `site_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `sort_keyword` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `sequence` int(15) NOT NULL,
  `sort_description` longtext NOT NULL,
  `description` text NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `title`, `page_title`, `page_link`, `sort_keyword`, `meta_title`, `meta_keyword`, `meta_description`, `sequence`, `sort_description`, `description`, `status`, `datetime`) VALUES
(1, 'Home', 'Home', 'home', 'Home', 'Website Development Company | Web Design | Mobile Apps Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta Infotech is a full service website development company offers graphic design, enterprise mobile solutions, web designing, mobile application development.', 1, '', '<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n\r\n<p>The issue of online privacy is extremely crucial for Hidden Brains which is committed to safeguarding the information provided by its members and other visitors logging on to its Web site. As a business entity dedicated to offering professional Enterprise Software &amp; Mobility Solutions and service in India and abroad, Hidden Brains has been actively promoting the concept of privacy and its relevance for organizations with a cyber-presence.</p>\r\n', 'Y', '2016-09-08'),
(2, 'About us', 'About us', 'aboutus', 'Know About Our Company', 'Website Development Company | Web Design | Mobile Apps Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta Infotech is a full service website development company offers graphic design, enterprise mobile solutions, web designing, mobile application development.', 2, 'evosta infotech Website Design Company USA is a standout amongst the most presumed organization situated in USA has effectively finished numerous sitedesigning ventures in USA and crosswise over globe. \r\n Our Digital designers change over attractive thoughts into genuine with innovativeness and energy that will change over your site guests into clients. evosta infotech Website Development Company concentrated on inventive and results-driven answers for organizations going from new businesses to market pioneers. ', '<div><img alt="About Us" src="http://www.evosta.loc/upload/images/abt-innerpage.png" title="About US" /></div>\r\n\r\n<p>evosta infotech was brought up as a live Company in 2015. A firm with best in class developing knowledge to deliver classy products and services in the world of INFORMATION TECHNOLOGY. DREAM of Brother like friends to bring in revolution in IT Sector evolved at a higher pace, now we have clients overseas. We are dedicated, hardworking team of developers and designers working together FOR YOU and YOUR BUSINESS.</p>\r\n\r\n<p>If you are not on web, we can build you an professional website, we&rsquo;ll do SEO and online marketing of your website for you. In simple words, we will promote your website online through SEO, digital marketing and social media marketing. And also if you are on the Web, trust us, we can bring business for you by optimising your website according to SEO standards.</p>\r\n\r\n<p>Web developmentis now a days very essential to achieve business goals. So here we are to help you to accomplish your target.And we are having profoundly experienced planners in our group for finishing the web developingprojects. evosta infotech Website Design Company has turned into a brand name for quality web outlining administration supplier in USA. Our undertaking group comprehends the prerequisites of customer and business nature and gives best results from out of box thoroughly considering innovative web outlining administration.</p>\r\n\r\n<p>We have guaranteed that our Project Management segment is dependably up to the imprint and is adjusted to the organization&#39;s approach of value administration. Our administrations envelop an extensive variety of web innovation administrations. We make utilization of the most recent and most progressive strategies to deal with our activities. Along these lines, with regards to your venture, you can rest guaranteed that it is in safe hands. It is our essential test that the task we embrace is to accomplish all our undertaking objectives. In the meantime we respect all biased undertaking requirements. Inside of the degree, time, and spending plan, we embrace the test of finishing the task to meet the predefined targets.</p>\r\n', 'Y', '2016-09-08'),
(8, 'Services', 'Services', 'services', 'We are best in', 'Services Meta Title', 'Services  Meta Keyword', 'Services Meta Description', 3, 'We are a start up focusing provide small scale web, desktop and mobile application solutions.  we are also focusing on providing professional staffing in information technology area.', '<p>We are a start up focusing provide small scale web, desktop and mobile application solutions. we are also focusing on providing professional staffing in information technology area.</p>\r\n', 'Y', '2016-08-12'),
(9, 'Skills', 'Skills', 'skills', 'We Are Best in', 'PHP | Wordpress | Android | IOS | Digital Marketing Rajkot - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Skills', 4, '', '<p>Skills</p>\r\n', 'Y', '2016-09-08'),
(10, 'Portfolio', 'Portfolio', 'portfolio', 'Our Best Work Experience', 'Portfolio Of Web & App Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Portfolio Of Web & App Development - Evosta Infotech', 5, '', '<p>Portfolio</p>\r\n', 'Y', '2016-09-08'),
(11, 'Job Seeker', 'Job Seeker', 'jobseeker', 'Join With Us', 'Job Seeker | Website Development Company | Web Design | Mobile Apps Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta Infotech is a full service website development company offers graphic design, enterprise mobile solutions, web designing, mobile application development.', 6, '', '<p>Techno Bold is the well established IT Web Solution provider in New Jersy LLC, we are actively looking to add team members. If you are one of the following, then Techno Bold best selection to start your bright career.</p>\r\n\r\n<ul>\r\n	<li>Web Designer</li>\r\n	<li>PHP Developer</li>\r\n	<li>.NET Developer</li>\r\n	<li>Web hosting Provider</li>\r\n	<li>Web hosting Reseller</li>\r\n	<li>SEO Expert</li>\r\n	<li>Software Engineer</li>\r\n</ul>\r\n', 'Y', '2016-09-08'),
(12, 'Get Quote', 'Get Quote', 'inquiry', 'Thank you for reaching out. Let’s Talk!', 'Website Development Company | Web Design | Mobile Apps Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta Infotech is a full service website development company offers graphic design, enterprise mobile solutions, web designing, mobile application development.', 7, '', '<p>Inquiry</p>\r\n', 'Y', '2016-09-08'),
(13, 'Contact Us', 'Contact Us', 'contactus', 'Get IN Touch', 'Website Development Company | Web Design | Mobile Apps Development - Evosta Infotech', 'mobile app development company,App Development Company,Android app development,iPhone apps development,mobile app development,iPad apps development,web development,mobile UI design,Mobile Apps and Game Development Company,Mobile Apps and Game Development', 'Evosta Infotech is a full service website development company offers graphic design, enterprise mobile solutions, web designing, mobile application development.', 8, '', '<p>Contact Us</p>\r\n', 'Y', '2016-09-08'),
(14, '404 Page Not Found', '404 Page Not Found', '404', '404 Page Not Found', '404 Page Not Found', '404 Page Not Found', '404 Page Not Found', 8, '', '404 Page Not Found', 'N', '2016-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `d_order` int(15) NOT NULL,
  `status` enum('N','Y') NOT NULL,
  `description` longtext NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `image`, `d_order`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, '.net', '1470894054-skill.png', 1, 'Y', '<p>\r\n								At Techno bold with master group of .NET Application Development, we are prepared to serve organizations by giving electronic Application Development. Contract our .NET App Developers who are utilizing our in-house mastery and innovation. With refined .NET Framework Development apparatuses, we can make world-class applications and outline improved sites with rich UI. \r\n								</p>', '2016-08-11', '0000-00-00'),
(2, 'PHP', '1470894485-skill.png', 2, 'Y', '<p>\r\n								Techno Bold offers convenient, effective and moderate PHP Programming Services. We have picked up experience through an assortment of PHP Projects accomplished for clients situated in India, UK, USA, Canada, Singapore, Dubai, Hong Kong and Australia. \r\nAt Techno Bold, our exceptional PHP Web Development group relies on experienced PHP Web Developers who have successfully finished various PHP Web Programming ventures like web entryways, web shopping/e-business site advancement, CRM, CMS, interpersonal interaction sites, group sites, and considerably more. \r\n\r\n								</p>', '2016-08-11', '0000-00-00'),
(3, 'Java', '1470894515-skill.png', 3, 'Y', '<p>\r\n									Our Java Experts have solid innovative aptitudes that cover an incredible number of utilization servers, structures, databases, libraries, parts and advancements. The group carefully breaks down business prerequisites and guarantees that clients pick up an ideal innovation for the required arrangement. To handle your task in the most practical way, the group can apply RUP, Agile (Scrum, FDD, and XP) and V-Model venture administration/improvement systems relying upon undertaking sort and needs. \r\n								</p>', '2016-08-11', '0000-00-00'),
(4, 'Android', '1470894540-skill.png', 4, 'Y', '<p>\r\n								The experience we picked up out and about through different testing Android application ventures for customers situated in USA, USA has helped us to make one of a kind, strong Android Applications in brisk turnaround time. At Techno Bold, we embrace demonstrated strategies and investigate Android application advancement instruments to build up a radical new level of applications that emerges from whatever remains of the part. \r\nAndroid SDK Development Platforms \r\nJava Programming on Windows XP (32-bit), Vista (32-or 64-bit), or Windows 7 (32-or 64-bit) and MAC OSX \r\n\r\n								</p>', '2016-08-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `last_login_time` datetime NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'No Email',
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_login_time`, `ipaddress`, `email`, `username`, `password`, `website`, `phone_no`, `address`, `facebook`, `twitter`, `google`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, '2016-10-03 03:27:42', '150.129.150.142', 'info@evostainfotech.com', 'evostainfotech', 'admin123', 'http://www.evostainfotech.com', '+91 8866270486 / 9638181757', '403,Radheshyam Complex 150 <br/>feet Near Balaji Hall part 1,  <br/>Dharam Nagar, Rajkot, Gujarat 360004', 'https://www.facebook.com/Evosta-Infotech-222609808095996/', 'https://twitter.com', 'https://plus.google.com', 'Welcome to Evosta Infotech', 'Welcome to Evosta Infotech', 'Welcome to Evosta Infotech');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
