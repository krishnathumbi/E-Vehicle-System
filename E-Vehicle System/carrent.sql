-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2012 at 01:03 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `carcompany`
--

CREATE TABLE IF NOT EXISTS `carcompany` (
  `CoId` int(11) NOT NULL AUTO_INCREMENT,
  `CoName` varchar(100) NOT NULL,
  PRIMARY KEY (`CoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `carcompany`
--

INSERT INTO `carcompany` (`CoId`, `CoName`) VALUES
(1, 'Maruthi'),
(2, 'Hyundai'),
(3, 'Toyota'),
(4, 'Audi'),
(5, 'Bens'),
(6, 'mitsubishi'),
(7, 'tata'),
(8, 'BMW'),
(9, 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `carmodel`
--

CREATE TABLE IF NOT EXISTS `carmodel` (
  `refId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) NOT NULL,
  `carmodel` varchar(30) NOT NULL,
  `cartype` varchar(30) NOT NULL,
  PRIMARY KEY (`refId`),
  UNIQUE KEY `carmodel` (`carmodel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `carmodel`
--

INSERT INTO `carmodel` (`refId`, `typeId`, `carmodel`, `cartype`) VALUES
(1, 1, 'alto', 'hatckback'),
(2, 2, 'santro', 'hatckback'),
(3, 3, 'etios', 'sedan'),
(8, 4, 'Audi A6', 'SUV'),
(9, 1, 'Zen', 'Hatchback'),
(10, 6, 'Lancer', 'Sedan'),
(12, 7, 'swift', 'bulgor'),
(13, 1, 'maruthi 800', 'Hatchback'),
(14, 7, 'swift desire', 'sedan'),
(15, 3, 'swift demptrt', 'sedan'),
(17, 1, 'suzuki', 'sedan'),
(18, 7, 'indica', 'station'),
(19, 8, '530i', 'sedan'),
(20, 8, '760 Li', 'flat'),
(21, 9, 'civic', 'SUV');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `RefId` int(11) NOT NULL AUTO_INCREMENT,
  `CarNo` varchar(30) NOT NULL,
  `CarModel` varchar(30) NOT NULL,
  `carType` int(11) NOT NULL,
  `InsuranceNo` varchar(30) NOT NULL,
  `InsuranceDate` varchar(30) NOT NULL,
  `Rent` int(11) NOT NULL,
  `Image` varchar(200) NOT NULL,
  PRIMARY KEY (`RefId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`RefId`, `CarNo`, `CarModel`, `carType`, `InsuranceNo`, `InsuranceDate`, `Rent`, `Image`) VALUES
(1, 'kl 02 2012', 'suzuki', 2, '57823987678', '2013-02-28', 5000, 'attachments/hatchback car.jpg'),
(2, 'kl 01a 01', 'suzuki', 4, '578356793', '2013-03-28', 5000, 'attachments/suv.jpg'),
(3, 'kl 01 a 02', 'civic', 3, '5464567548', '2013-02-22', 750, 'attachments/00HND311504367E[1].jpg'),
(4, 'kl 02 2013', 'suzuki', 1, '47894567843', '2013-02-28', 2500, 'attachments/sedan-car-mag.jpg'),
(5, 'kl 23 900', 'Lancer', 6, 'amp35654', '2012-10-29', 2000, 'attachments/FORD-2.JPG'),
(6, 'kl 213 454131', 'suzuki', 1, '6784509864', '2013-02-27', 4500, 'attachments/luxury-sedan-cars.jpg'),
(7, 'kl 12345', 'suzuki', 4, '6745905632', '2013-03-28', 4500, 'attachments/santro-2.jpg'),
(8, 'kl 04 2134', '30000', 5, '565656565656', '2012-11-29', 500, 'attachments/Trade-in-Car.jpg'),
(9, 'kl 07 3452', 'etios', 5, '6743908798', '2013-03-28', 6000, 'attachments/35446285_620x433.jpg'),
(10, 'kl 02 56709', 'indica', 7, '6745389327', '2013-03-28', 5000, 'attachments/station wagon.jpg'),
(11, 'kl 05 6789', '530i', 8, '6435792345', '2013-02-28', 7000, 'attachments/bmw_cars_images_3.jpg'),
(12, 'kl 05 2378', '760 Li', 8, '567894367890', '2013-03-28', 7500, 'attachments/bmw_top_car_2010_india.jpg'),
(13, 'kl 09 7854', 'civic', 9, '89654578907', '2013-03-28', 6000, 'attachments/nissan-micra-sedan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `catype`
--

CREATE TABLE IF NOT EXISTS `catype` (
  `ctype` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`ctype`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catype`
--

INSERT INTO `catype` (`ctype`, `description`) VALUES
('station wagon', 'large size with 3.8'),
('Hatchback', 'Simple'),
('SUV', 'large size'),
('sedan', 'large size with 1.5 '),
('flat ulyrse', 'small insize');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL,
  `rentid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`FId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FId`, `name`, `email`, `message`, `rentid`, `date`, `userid`) VALUES
(23, 'blessy rajan', 'blessy@gmail.com', 'haii I want your services.', '315', '2012-12-03', '30'),
(24, 'Ammu', 'ammu@gmail.com', 'haiii', '320', '2012-12-07', '41');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin'),
(32, 'devu', '123', 'user'),
(28, 'manu', '123', 'user'),
(30, 'bless', '123', 'user'),
(31, 'teena', '123', 'user'),
(41, 'ammu', '123', 'user'),
(42, 'anu', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `RefId` int(20) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `carNo` varchar(30) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `bookdate` date NOT NULL,
  `reserdate` varchar(100) NOT NULL,
  `returndate` varchar(100) NOT NULL,
  `totalamt` varchar(30) NOT NULL,
  `advanceamt` varchar(30) NOT NULL,
  `balnaceamt` varchar(30) NOT NULL,
  `rentdays` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`RefId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=321 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`RefId`, `UserId`, `carNo`, `purpose`, `bookdate`, `reserdate`, `returndate`, `totalamt`, `advanceamt`, `balnaceamt`, `rentdays`, `status`) VALUES
(313, 32, 'kl 02 2013', 'for 4 day trip', '2012-12-01', '2012-12-10', '2012-12-14', '10000', '2000', '8000', '4', 'Reserved'),
(320, 41, 'kl 05 6789', 'marriage', '2012-12-07', '2012-12-07', '2012-12-20', '91000', '18200', '72800', '13', 'Reserved'),
(314, 31, 'kl 213 454131', 'trip', '2012-12-01', '2012-12-03', '2012-12-08', '22500', '4050', '18000', '5', 'cancel'),
(315, 30, 'kl 213 454131', 'marriage', '2012-12-01', '2012-12-04', '2012-12-07', '13500', '2700', '10800', '3', 'Reserved'),
(316, 31, 'kl 12345', 'trip', '2012-12-01', '2012-12-04', '2012-12-14', '45000', '9000', '36000', '10', 'Reserved'),
(317, 36, 'kl 09 7854', 'marriage', '2012-12-01', '2012-12-01', '2012-12-04', '18000', '3600', '14400', '3', 'Reserved'),
(318, 30, 'kl 213 454131', 'for 7 day trip', '2012-12-01', '2013-01-15', '2013-01-23', '36000', '7200', '28800', '8', 'Reserved'),
(319, 28, 'kl 01a 01', 'marriage', '2012-12-03', '2012-12-03', '2013-01-15', '215000', '43000', '172000', '43', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE IF NOT EXISTS `userregister` (
  `userid` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`userid`, `name`, `username`, `address`, `city`, `state`, `pincode`, `dateofbirth`, `email`, `phoneno`) VALUES
(28, 'manu', 'manu', 'kollam', 'kollam', 'kerala', 691013, '2012-09-28', 'manu@gmail.com', 8909878890),
(30, 'blessy rajan', 'bless', 'blessy bahavan', 'Cheruvakkal', 'kerala', 691533, '2012-11-01', 'blessy@gmail.com', 9633089076),
(31, 'teena', 'teena', 'teena bhavan', 'kollam', 'kerala', 691599, '1993-11-01', 'teena@gmail.com', 9866045089),
(32, 'Devu r', 'devu', 'Devu bhavan', 'kollam', 'kerala', 691533, '1987-12-22', 'devuu@gmail.com', 9855067089),
(42, 'annu', 'anu', 'anu bhavan', 'thiruvalla', 'kerala', 691533, '0000-00-00', 'anu@gmail.com', 8255089043),
(41, 'Ammu', 'ammu', 'ammubhavan', 'kozhikkodu', 'kerala', 915889, '1984-12-03', 'ammu@gmail.com', 9850987689);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
