-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2013 at 01:21 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `km_inhoud`
--

CREATE TABLE IF NOT EXISTS `km_inhoud` (
  `kmreg_id` int(11) NOT NULL,
  `km_soort` int(11) NOT NULL,
  `dag` date NOT NULL,
  `aantal_km` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`kmreg_id`),
  KEY `FK_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `km_inhoud`
--

INSERT INTO `km_inhoud` (`kmreg_id`, `km_soort`, `dag`, `aantal_km`, `user_id`) VALUES
(1, 1, '2013-12-01', 20, 1),
(2, 2, '2013-12-02', 200, 2),
(3, 3, '2013-12-01', 50, 3),
(4, 2, '2013-12-02', 10, 2),
(5, 1, '2013-12-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_id`, `username`, `password`) VALUES
(1, 'root@gmail.com', 'geheim'),
(2, 'administrator@gmail.com', 'geheim'),
(3, 'customer@gmail.com', 'geheim'),
(4, 'adruijter@gmail.com', 'geheim'),
(5, 'lskdj', 'sglkj'),
(6, 'h.van.straaten@gmail.com', 'geheim'),
(7, 'b.de.boer@gmail.com', 'geheim'),
(8, 'jsdflkj', 'lksjd'),
(9, 'lkjsdflkj', 'lkjsdflkj'),
(10, 'lkjsdflkj', 'lkjsdf'),
(11, 'tas@gamil.com', 'geheim'),
(12, 'adruijter@gmail.com', 'geheim'),
(13, 'test@gmail.com', 'geheim'),
(14, 'adruijter@gmail.com', 'geheim'),
(15, 'bert@gmil.com', '123geheim'),
(16, 'johan@gmail.com', 'geheim'),
(17, 'jaap@gmail.com', 'geheim'),
(18, 'q', 'q'),
(19, 'q', 'q'),
(20, 'q', 'q'),
(21, 'bert@gmail.com', 'geheim'),
(22, 'jlksdflk', 'jlskdjflk'),
(23, 'ej@mail.com', '123456'),
(24, '12@21.gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orderrules`
--

CREATE TABLE IF NOT EXISTS `orderrules` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price_sold` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderrules`
--

INSERT INTO `orderrules` (`order_id`, `product_id`, `price_sold`, `quantity`, `discount`) VALUES
(11, 4, 1.2, 3, '0'),
(11, 5, 2.4, 3, '0'),
(11, 6, 2.45, 2, '0'),
(11, 7, 2.1, 1, '0'),
(11, 11, 4.24, 1, '0'),
(12, 4, 1.2, 3, '0'),
(12, 5, 2.4, 3, '0'),
(12, 6, 2.45, 2, '0'),
(12, 7, 2.1, 1, '0'),
(12, 11, 4.24, 1, '0'),
(14, 6, 1, 1, '0'),
(14, 7, 1, 1, '0'),
(14, 9, 1, 1, '0'),
(15, 6, 1, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_method` enum('bezorgen','ophalen') NOT NULL,
  `shipping_cost` float NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `expiration_date`, `delivery_date`, `shipping_method`, `shipping_cost`) VALUES
(11, 3, '2013-06-10 15:14:09', '2013-06-24 15:14:09', '2013-06-13 15:14:09', 'bezorgen', 2.5),
(12, 3, '2013-06-10 15:15:06', '2013-06-24 15:15:06', '2013-06-13 15:15:06', 'bezorgen', 2.5),
(13, 3, '2013-06-10 15:16:22', '2013-06-24 15:16:22', '2013-06-13 15:16:22', 'bezorgen', 2.5),
(14, 24, '2013-07-01 08:40:05', '2013-07-15 08:40:05', '2013-07-04 08:40:05', 'bezorgen', 2.5),
(15, 1, '2013-12-03 14:32:29', '2013-12-17 14:32:29', '2013-12-06 14:32:29', 'bezorgen', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `foto_name` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `foto_name`) VALUES
(6, 'Cassis', 'Cassis blik 330ml', 1, 'cassis.png'),
(7, 'Cola', 'Cola blik 330ml', 1, 'cola.jpg'),
(9, 'Fanta Orange', 'Fanta Orange blik 330ml', 1, 'fanta.jpg'),
(10, 'Ice-Tea', 'Ice-Tea', 0, 'icetea.jpg'),
(11, 'Mountain Dew', 'Moutain Dew blik 330ml', 1, 'mountaindew.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_users`
--

CREATE TABLE IF NOT EXISTS `ukm_users` (
  `user_id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm_users`
--

INSERT INTO `ukm_users` (`user_id`, `naam`, `achternaam`, `adres`) VALUES
(1, 'henk', 'klaassen', 'veldlaan 1'),
(2, 'piet', 'henks', 'hofstraat 3'),
(3, 'klaas', 'pieters', 'dijkweg 7');

-- --------------------------------------------------------

--
-- Table structure for table `uren_inhoud`
--

CREATE TABLE IF NOT EXISTS `uren_inhoud` (
  `ureg_id` int(11) NOT NULL,
  `uren_soort` int(11) NOT NULL,
  `dag` date NOT NULL,
  `aantal_uren` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ureg_id`),
  KEY `FK_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uren_inhoud`
--

INSERT INTO `uren_inhoud` (`ureg_id`, `uren_soort`, `dag`, `aantal_uren`, `user_id`) VALUES
(1, 3, '2013-12-01', 2, 1),
(2, 2, '2013-12-02', 4, 2),
(3, 5, '2013-12-01', 7, 3),
(4, 1, '2013-12-02', 5, 2),
(5, 2, '2013-12-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `userrole_id` int(10) NOT NULL,
  `role` enum('root','administrator','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`userrole_id`, `role`) VALUES
(1, 'root'),
(2, 'administrator'),
(3, 'customer'),
(4, 'administrator'),
(5, 'administrator'),
(6, 'customer'),
(7, 'customer'),
(8, 'customer'),
(9, 'customer'),
(10, 'root'),
(11, 'root'),
(12, 'customer'),
(13, 'administrator'),
(20, 'customer'),
(21, 'customer'),
(22, 'root'),
(23, 'customer'),
(24, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `street` varchar(250) NOT NULL,
  `housenumber` varchar(10) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `residence` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `mobilephonenumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `infix`, `surname`, `street`, `housenumber`, `zipcode`, `residence`, `phonenumber`, `mobilephonenumber`) VALUES
(1, 'root', 'de', 'root', '', '', '', '', '', ''),
(2, 'admin', 'de', 'admin', '', '', '', '', '', ''),
(3, 'customer', 'de', 'customer', '', '', '', '', '', ''),
(19, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q'),
(22, 'sdfjlk', 'lkjdflkj', 'lksjdflk', '', '', '', '', '', ''),
(23, 'Ernst-Jaap', '', 'boutens', 'weg', '56', '1234AD', 'utrecht', '1234567890', '0612345678'),
(24, 'Ernst-Jaap', '', 'boutens', 'weg', '12', '1234an', 'utrecht', '1234567890', '0612345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_carts`
--

CREATE TABLE IF NOT EXISTS `user_carts` (
  `user_id` int(10) NOT NULL,
  `cart_content` text NOT NULL,
  `insertion_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_carts`
--

INSERT INTO `user_carts` (`user_id`, `cart_content`, `insertion_date`) VALUES
(3, 'a:3:{i:0;a:6:{s:2:"id";s:1:"4";s:4:"name";s:7:"pompoen";s:11:"description";s:12:"pompoen rood";s:5:"price";s:3:"1.2";s:9:"foto_name";s:11:"pompoen.jpg";s:6:"aantal";i:1;}i:1;a:6:{s:2:"id";s:2:"14";s:4:"name";s:8:"rabarber";s:11:"description";s:13:"rode rabarber";s:5:"price";s:4:"5.67";s:9:"foto_name";s:12:"rabarber.png";s:6:"aantal";i:1;}i:2;a:6:{s:2:"id";s:1:"5";s:4:"name";s:12:"chinese kool";s:11:"description";s:14:"kool uit China";s:5:"price";s:3:"2.4";s:9:"foto_name";s:16:"chinese-kool.jpg";s:6:"aantal";i:1;}}', '2013-06-18 07:14:20'),
(2, 'a:0:{}', '2013-12-04 09:47:50'),
(23, 'a:3:{i:0;a:6:{s:2:"id";s:1:"4";s:4:"name";s:7:"pompoen";s:11:"description";s:12:"pompoen rood";s:5:"price";s:3:"1.2";s:9:"foto_name";s:11:"pompoen.jpg";s:6:"aantal";i:1;}i:1;a:6:{s:2:"id";s:2:"14";s:4:"name";s:8:"rabarber";s:11:"description";s:13:"rode rabarber";s:5:"price";s:4:"5.67";s:9:"foto_name";s:12:"rabarber.png";s:6:"aantal";i:1;}i:2;a:6:{s:2:"id";s:1:"5";s:4:"name";s:12:"chinese kool";s:11:"description";s:14:"kool uit China";s:5:"price";s:3:"2.4";s:9:"foto_name";s:16:"chinese-kool.jpg";s:6:"aantal";i:1;}}', '2013-07-01 08:32:59'),
(1, 'a:0:{}', '2013-12-03 14:31:56'),
(24, 'a:0:{}', '2013-07-01 08:40:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `km_inhoud`
--
ALTER TABLE `km_inhoud`
  ADD CONSTRAINT `FK_user_id_kms` FOREIGN KEY (`user_id`) REFERENCES `ukm_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `uren_inhoud`
--
ALTER TABLE `uren_inhoud`
  ADD CONSTRAINT `FK_user_id_uren` FOREIGN KEY (`user_id`) REFERENCES `ukm_users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
