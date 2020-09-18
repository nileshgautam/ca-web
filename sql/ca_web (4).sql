-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2020 at 09:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Business Registrations'),
(2, 'Goods & Services Tax'),
(3, 'Intellectual Property'),
(4, 'Income Tax'),
(5, 'Compliance'),
(6, 'Documents');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

DROP TABLE IF EXISTS `client_details`;
CREATE TABLE IF NOT EXISTS `client_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `head_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `head-img` varchar(200) NOT NULL,
  `client_logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `client_name`, `client_email`, `head_name`, `designation`, `message`, `head-img`, `client_logo`) VALUES
(1, 'Bussiness', 'Bussiness@sample.com', 'Rahul Shrivastava', 'CEO, Ecommerce Mart', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'user.png', 'c1.png'),
(2, 'Hipster', 'Hipster@sample.com', 'Piyush Mehra', 'CEO, Ecommerce Mart', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'user.png', 'c2.png'),
(3, 'Hipstero', 'Hipstero@sample.com', 'Ritika Sharma', 'CEO, Ecommerce Mart', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'user.png', 'c3.png'),
(4, 'Hosoren', 'Hosoren@sample.com', 'Neha Bhatnagar', 'CEO, Ecommerce Mart', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'user.png', 'c4.png'),
(5, 'Retrodesign', 'Retrodesign@sample.com', '', '', '', '', 'c5.png'),
(6, 'Premium', 'Premium@sample.com', '', '', '', '', 'c6.png'),
(7, 'Coffeebrand', 'Coffeebrand@sample.com', '', '', '', '', 'c7.png'),
(8, 'Shopname', 'Shopname@sample.com', '', '', '', '', 'c8.png');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'India'),
(2, 'UAE'),
(3, 'Singapore'),
(4, 'Malaysiya'),
(5, 'California'),
(6, 'Yoganda'),
(7, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `feature_label`
--

DROP TABLE IF EXISTS `feature_label`;
CREATE TABLE IF NOT EXISTS `feature_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_heading` varchar(200) NOT NULL,
  `label_description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature_label`
--

INSERT INTO `feature_label` (`id`, `label_heading`, `label_description`, `image`) VALUES
(1, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w1.png'),
(2, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w2.png'),
(3, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w3.png'),
(4, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w4.png'),
(5, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w5.png'),
(6, 'Feature Label', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'w6.png');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

DROP TABLE IF EXISTS `helpdesk`;
CREATE TABLE IF NOT EXISTS `helpdesk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `query` longtext NOT NULL,
  `files` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helpdesk`
--

INSERT INTO `helpdesk` (`id`, `ticket_id`, `customer_id`, `subject`, `query`, `files`, `date_time`) VALUES
(1, 'TCI0-200910001', 'USR-200910002', 'Testing 1', 'Hai i am testing this feature', 'abcd', '2020-09-10 17:54:10'),
(2, 'TCI0-200918002', 'USR-200910002', 'Testing 1', 'test123', 'abcd', '2020-09-18 14:37:20'),
(3, 'TCI0-200918003', 'USR-200910002', 'test4312', 'test', 'abcd', '2020-09-18 14:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Yatharth Sharma', 'mail@sample.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tranzactionId` varchar(200) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `serviceId` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tranzactionId`, `user_id`, `serviceId`, `package`, `price`, `dateTime`) VALUES
(1, 'TRAN-200910001', 'USR-200910002', '3', 'single', '2000', '2020-09-10 16:52:18'),
(2, 'TRAN-200910002', 'USR-200910002', '1', 'Premium', '16000', '2020-09-10 16:52:18'),
(3, 'TRAN-200915003', 'USR-200915003', '5', 'single', '8000', '2020-09-15 15:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `required_documents`
--

DROP TABLE IF EXISTS `required_documents`;
CREATE TABLE IF NOT EXISTS `required_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` varchar(200) NOT NULL,
  `documents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `required_documents`
--

INSERT INTO `required_documents` (`id`, `service_id`, `documents`) VALUES
(1, '1', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]'),
(2, '2', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]'),
(3, '3', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]'),
(4, '4', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]'),
(5, '5', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]'),
(6, '6', '[\"Aadhar Card\",\"Pan Card\",\"Bank Passbook\",  \"Electricity Bill\"]');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(200) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_price` int(11) NOT NULL,
  `service_short_description` text NOT NULL,
  `service_description` text NOT NULL,
  `keyhighlight_points` text NOT NULL,
  `banner_image` varchar(200) NOT NULL,
  `service_side_image` varchar(200) NOT NULL,
  `label_points` text NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `category_id`, `service_name`, `service_price`, `service_short_description`, `service_description`, `keyhighlight_points`, `banner_image`, `service_side_image`, `label_points`, `priority`) VALUES
(1, '1', 'Proprietorship Company Registration', 2000, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.\r\nA partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0),
(2, '2', 'GST Registration', 1500, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.\r\nA partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0),
(3, '2', 'Udyog Aadhar Registration', 2000, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.\r\nA partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0),
(4, '3', 'Business Current Account 2', 2000, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.\r\nA partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0),
(5, '3', 'Online Payment Gateway', 8000, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.\r\nA partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0),
(6, '1', 'Accounts Receivable Services', 2500, 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', 'A partnership firm is one of the most important forms of a business\r\norganisation, where two or more people come together to form a\r\nbusiness and divide the profits thereof in an agreed ratio.', '[\"Key Highlight 1\",\"Key Highlight 2\",\"Key Highlight 3\",\"Key Highlight 4\",\"Key Highlight 5\",\"Key Highlight 6\"]', '', '', '[{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"},{\"heading\":\"Feature Label\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\"}]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_packages`
--

DROP TABLE IF EXISTS `service_packages`;
CREATE TABLE IF NOT EXISTS `service_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` varchar(100) NOT NULL,
  `packages` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_packages`
--

INSERT INTO `service_packages` (`id`, `service_id`, `packages`) VALUES
(1, '1', '[{\"name\":\"Basic\",\"price\":\"6000\",\"servicesId\":[\"6\",\"4\",\"2\"],\"servicesNames\":[\"Accounts Receivable Services\",\"Business Current Account 2\",\"GST Registration\"]},{\"name\":\"Essential\",\"price\":\"14000\",\"servicesId\":[\"6\",\"4\",\"2\",\"5\"],\"servicesNames\":[\"Accounts Receivable Services\",\"Business Current Account 2\",\"GST Registration\",\"Online Payment Gateway\"]},{\"name\":\"Premium\",\"price\":\"16000\",\"servicesId\":[\"6\",\"4\",\"2\",\"5\",\"3\"],\"servicesNames\":[\"Accounts Receivable Services\",\"Business Current Account 2\",\"GST Registration\",\"Online Payment Gateway\",\"Udyog Aadhar Registration\"]}]'),
(2, '6', '[{\"name\":\"Basic\",\"price\":\"11500\",\"servicesId\":[\"4\",\"2\",\"5\"],\"servicesNames\":[\"Business Current Account 2\",\"GST Registration\",\"Online Payment Gateway\"]},{\"name\":\"Essential\",\"price\":\"13500\",\"servicesId\":[\"4\",\"2\",\"5\",\"1\"],\"servicesNames\":[\"Business Current Account 2\",\"GST Registration\",\"Online Payment Gateway\",\"Proprietorship Company Registration\"]},{\"name\":\"Premium\",\"price\":\"15500\",\"servicesId\":[\"4\",\"2\",\"5\",\"1\",\"3\"],\"servicesNames\":[\"Business Current Account 2\",\"GST Registration\",\"Online Payment Gateway\",\"Proprietorship Company Registration\",\"Udyog Aadhar Registration\"]}]');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_documents`
--

DROP TABLE IF EXISTS `uploaded_documents`;
CREATE TABLE IF NOT EXISTS `uploaded_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `Document_path` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_documents`
--

INSERT INTO `uploaded_documents` (`id`, `user_id`, `service_id`, `document_name`, `Document_path`, `dateTime`) VALUES
(1, 'USR-200910002', '3', 'Aadhar Card', 'uploads/USR-200910002/download (1).png', '2020-09-18 12:55:08'),
(2, 'USR-200910002', '3', 'Pan Card', 'uploads/USR-200910002/review comments.pdf', '2020-09-18 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact_no` int(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'A',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `password`, `contact_no`, `state`, `status`, `datetime`, `role`) VALUES
(1, '191019001', 'sample', 'sample@caweb.com', '123456', 0, '', 'A', '2019-10-19 17:53:13', 'Admin'),
(2, 'USR-200910002', 'Yatharth Sharma', 'as0768299@gmail.com', 'rgUVCGEh', 1234567890, 'Uttar', 'A', '2020-09-10 16:24:11', 'User'),
(3, 'USR-200915003', 'Nilesh Gautam', 'nileshwephyre@gmail.com', 'ud7PFMot', 1234567890, 'delhi)', 'A', '2020-09-15 15:35:04', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

DROP TABLE IF EXISTS `user_services`;
CREATE TABLE IF NOT EXISTS `user_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `service_id`, `package`, `price`, `status`, `timeStamp`) VALUES
(1, 'USR-200910002', 3, 'single', '2000', 'Payment Received', '2020-09-10 16:24:11'),
(2, 'USR-200910002', 1, 'Premium', '16000', 'Payment Received', '2020-09-10 16:33:19'),
(3, 'USR-200915003', 5, 'single', '8000', 'Payment Received', '2020-09-15 15:35:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
