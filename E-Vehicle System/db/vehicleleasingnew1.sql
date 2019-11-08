-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 11:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicleleasingnew1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE IF NOT EXISTS `booking_tbl` (
  `book_id` int(10) NOT NULL AUTO_INCREMENT,
  `from_cab` varchar(50) NOT NULL,
  `to_cab` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cab_id` int(10) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `booking_tbl`
--

INSERT INTO `booking_tbl` (`book_id`, `from_cab`, `to_cab`, `email`, `cab_id`) VALUES
(1, 'Kollam', 'Trivandrum', 'gourisankar123@gmail.com', 6),
(2, 'Kollam', 'Trivandrum', 'gourisankar123@gmail.com', 6),
(3, 'Kollam', 'Kundara', 'gourisankar123@gmail.com', 7),
(4, 'Kollam', 'Kundara', 'gourisankar123@gmail.com', 7),
(5, 'Kollam', 'Kundara', 'gourisankar123@gmail.com', 7),
(6, 'Kollam', 'Ernakulam', 'krish@gmail.com', 8),
(7, 'klm', 'tvm', 'krish@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `branchpayment`
--

CREATE TABLE IF NOT EXISTS `branchpayment` (
  `paymentid` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `branchregistration`
--

CREATE TABLE IF NOT EXISTS `branchregistration` (
  `branchname` varchar(50) NOT NULL,
  `branchaddress` varchar(200) NOT NULL,
  `branchcity` varchar(50) NOT NULL,
  `branchstate` varchar(50) NOT NULL,
  `branchPhone` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `branch_id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `branchregistration`
--

INSERT INTO `branchregistration` (`branchname`, `branchaddress`, `branchcity`, `branchstate`, `branchPhone`, `status`, `branch_id`, `email`) VALUES
('abc', 'abc, kollam', 'kollam', 'kerala', '2147483647', 'accept', 9, 'abc123@gmail.com'),
('ALM Swift', 'Opp Main Road', 'Kollam', 'Kerala', '2147483647', 'accept', 11, 'alm@gmail.com'),
('SM Travels', 'Near beach road', 'Kollam', 'Kerala', '879065467', 'accept', 12, 'sm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cabvehicle`
--

CREATE TABLE IF NOT EXISTS `cabvehicle` (
  `cab_id` int(10) NOT NULL AUTO_INCREMENT,
  `cab_company` varchar(20) NOT NULL,
  `cab_num` varchar(20) NOT NULL,
  `seat` int(10) NOT NULL,
  `model` varchar(20) NOT NULL,
  `charge` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  PRIMARY KEY (`cab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cabvehicle`
--

INSERT INTO `cabvehicle` (`cab_id`, `cab_company`, `cab_num`, `seat`, `model`, `charge`, `status`, `branch_id`) VALUES
(7, 'Santro', 'KL-02-6G987', 7, 'Xing', 50, 'Booked', 'abc123@gmail.com'),
(8, 'Maruthi', 'KL-02-Y2345', 4, 'Swift', 460, 'Booked', 'sm@gmail.com'),
(9, 'Toyota', 'KL-02-6782', 8, 'Innova', 80, 'Booked', 'alm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(20) NOT NULL,
  `cardholder` varchar(50) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `cardno`, `cardholder`) VALUES
(1, '974797059502', 'Gouri S');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL,
  `date` date NOT NULL,
  `emaill` varchar(20) NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `email`, `message`, `date`, `emaill`) VALUES
(8, 'gourisankar123@gmail.com', 'Enjoyed the trip', '2018-04-21', 'gourisankar123@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `leased_vehicles`
--

CREATE TABLE IF NOT EXISTS `leased_vehicles` (
  `leasedVehicleId` int(10) NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `leased_days` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `returndate` date NOT NULL,
  PRIMARY KEY (`leasedVehicleId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `leased_vehicles`
--

INSERT INTO `leased_vehicles` (`leasedVehicleId`, `branch_id`, `vehicle_id`, `reservation_id`, `leased_days`, `status`, `returndate`) VALUES
(5, 0, 22, 35, 8, 'Returned', '2018-05-02'),
(6, 0, 19, 36, 2, 'Returned', '2018-05-04'),
(7, 0, 22, 37, 1, 'Returned', '2018-05-14'),
(8, 0, 19, 38, 1, 'Returned', '2018-05-17'),
(9, 0, 19, 40, 2, 'Returned', '2018-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin'),
(40, 'krish@gmail.com', 'Krishna1', 'user'),
(36, 'abc123@gmail.com', 'abc', 'branch'),
(35, 'gourisankar123@gmail.com', 'gouri', 'user'),
(38, 'arya@gmail.com', 'Arya@1234', 'user'),
(39, 'alm@gmail.com', 'alm', 'branch'),
(41, 'sm@gmail.com', 'sm123', 'branch');

-- --------------------------------------------------------

--
-- Table structure for table `rentlocation`
--

CREATE TABLE IF NOT EXISTS `rentlocation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `rentallocation` varchar(20) NOT NULL,
  `latitude` int(5) NOT NULL,
  `longitude` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationId` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `VehicleId` int(10) NOT NULL,
  `VehicleRegNo` varchar(30) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `bookdate` date NOT NULL,
  `reserdate` varchar(100) NOT NULL,
  `returndate` varchar(100) NOT NULL,
  `totalamt` varchar(30) NOT NULL,
  `advanceamt` varchar(30) NOT NULL,
  `balnaceamt` varchar(30) NOT NULL,
  `rentdays` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`ReservationId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `email`, `VehicleId`, `VehicleRegNo`, `purpose`, `bookdate`, `reserdate`, `returndate`, `totalamt`, `advanceamt`, `balnaceamt`, `rentdays`, `status`) VALUES
(32, 'gourisankar123@gmail.com', 19, 'KL-02-9689', 'for a short trip', '2018-04-19', '2018-04-19', '2018-04-26', '5460', '982.8', '4368', '7', 'cancel'),
(38, 'krish@gmail.com', 19, 'KL-02-9689', 'Tour', '2018-05-13', '2018-05-15', '2018-05-16', '780', '156', '624', '1', 'closed'),
(37, 'krish@gmail.com', 22, 'KL-02-AS685', 'Emergency', '2018-05-13', '2018-05-13', '2018-05-14', '780', '156', '624', '1', 'closed'),
(35, 'krish@gmail.com', 22, 'KL-02-AS685', 'Long trip', '2018-05-02', '2018-05-03', '2018-05-11', '6240', '1248', '4992', '8', 'closed'),
(36, 'gourisankar123@gmail.com', 19, 'KL-02-9689', 'shot trip', '2018-05-02', '2018-05-02', '2018-05-04', '1560', '312', '1248', '2', 'closed'),
(39, 'krish@gmail.com', 18, 'KL-02-2015', 'Trip', '2018-05-13', '2018-05-13', '2018-05-15', '1200', '216', '960', '2', 'cancel'),
(40, 'gourisankar123@gmail.com', 19, 'KL-02-9689', 'Short Trip', '2018-05-13', '2018-05-13', '2018-05-15', '1560', '312', '1248', '2', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `cab_id` int(11) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `book_id`, `cab_id`, `p_status`) VALUES
(1, 1, 6, ''),
(2, 2, 6, 'Pooling'),
(3, 3, 7, 'Pooling'),
(4, 4, 7, ''),
(5, 5, 7, 'Pooling'),
(6, 6, 8, ''),
(7, 7, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE IF NOT EXISTS `userregister` (
  `fname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`fname`, `address`, `city`, `state`, `pincode`, `dateofbirth`, `email`, `phoneno`) VALUES
('Gouri Sankar', 'gouri, kollam', 'kollam', 'kerala', 690518, '1992-04-26', 'gourisankar123@gmail.com', 8125963474),
('Arya S Kumar', 'Arya Nilayam', 'Kollam', 'Kerala', 691230, '1989-01-19', 'arya@gmail.com', 9876432180),
('Krishnaveni', 'Thekkemuri kallada', 'Kollam', 'Kerala', 691502, '1997-08-10', 'krish@gmail.com', 9496975230);

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE IF NOT EXISTS `user_payment` (
  `paymentId` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `advance_amount` int(10) NOT NULL,
  `balance_amount` int(10) NOT NULL,
  `credit_card_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `reservation_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `cancellation_fee` int(10) NOT NULL,
  `return_amount` int(10) NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`paymentId`, `email`, `total_amount`, `advance_amount`, `balance_amount`, `credit_card_no`, `date`, `reservation_id`, `status`, `cancellation_fee`, `return_amount`) VALUES
(1, 'gourisankar123@gmail.com', 11700, 2340, 9360, 2147483647, '2018-04-10', 29, 'reserved', 0, 0),
(2, 'gourisankar123@gmail.com', 10800, 2160, 8640, 2147483647, '2018-04-10', 31, 'cancel', 216, 1944),
(3, 'gourisankar123@gmail.com', 5460, 1092, 4368, 2147483647, '2018-04-19', 32, 'cancel', 109, 983),
(4, 'gourisankar123@gmail.com', 2010, 402, 1608, 2147483647, '2018-04-21', 33, 'reserved', 0, 0),
(5, 'gourisankar123@gmail.com', 1100, 220, 880, 2147483647, '2018-05-02', 34, 'reserved', 0, 0),
(6, 'krish@gmail.com', 6240, 1248, 4992, 2147483647, '2018-05-02', 35, 'reserved', 0, 0),
(7, 'gourisankar123@gmail.com', 1560, 312, 1248, 2147483647, '2018-05-02', 36, 'reserved', 0, 0),
(8, 'krish@gmail.com', 780, 156, 624, 2147483647, '2018-05-13', 37, 'reserved', 0, 0),
(9, 'krish@gmail.com', 780, 156, 624, 2147483647, '2018-05-13', 38, 'reserved', 0, 0),
(10, 'krish@gmail.com', 1200, 240, 960, 2147483647, '2018-05-13', 39, 'cancel', 24, 216),
(11, 'gourisankar123@gmail.com', 1560, 312, 1248, 2147483647, '2018-05-13', 40, 'reserved', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecompany`
--

CREATE TABLE IF NOT EXISTS `vehiclecompany` (
  `VehicleCompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleCompanyName` varchar(25) NOT NULL,
  `VehicleType` int(11) NOT NULL,
  PRIMARY KEY (`VehicleCompanyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `vehiclecompany`
--

INSERT INTO `vehiclecompany` (`VehicleCompanyId`, `VehicleCompanyName`, `VehicleType`) VALUES
(17, 'Maruthi', 15),
(18, 'Chevrolet', 15),
(19, 'Audi', 15),
(20, 'Maruthi Suzuki', 17),
(21, 'Ford', 15),
(24, 'Nano', 15),
(26, 'Toyota', 15);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodel`
--

CREATE TABLE IF NOT EXISTS `vehiclemodel` (
  `VehicleModelId` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleModelName` varchar(50) NOT NULL,
  `VehicleType` int(11) NOT NULL,
  `VehicleCompany` int(11) NOT NULL,
  PRIMARY KEY (`VehicleModelId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `vehiclemodel`
--

INSERT INTO `vehiclemodel` (`VehicleModelId`, `VehicleModelName`, `VehicleType`, `VehicleCompany`) VALUES
(11, '2000', 15, 17),
(12, 'Spark', 15, 18),
(13, 'EECO', 17, 20),
(14, 'Figo', 15, 21),
(15, 'Etios', 15, 26);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicleId` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleType` int(11) NOT NULL,
  `VehicleCompany` int(11) NOT NULL,
  `VehicleModel` int(11) NOT NULL,
  `VehicleRegNo` varchar(20) NOT NULL,
  `InsuranceNo` varchar(20) NOT NULL,
  `InsuranceDate` date NOT NULL,
  `Rent` varchar(20) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `branchId` varchar(100) NOT NULL,
  PRIMARY KEY (`vehicleId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleId`, `VehicleType`, `VehicleCompany`, `VehicleModel`, `VehicleRegNo`, `InsuranceNo`, `InsuranceDate`, `Rent`, `Image`, `branchId`) VALUES
(19, 15, 17, 11, 'KL-02-9689', '6898999898', '2018-04-26', '780', 'attachments/images.jpg', 'abc123@gmail.com'),
(18, 15, 17, 11, 'KL-02-2015', '565896665689', '2018-04-30', '600', 'attachments/index.jpg', 'abc123@gmail.com'),
(22, 15, 21, 14, 'KL-02-AS685', '812039485671', '2018-12-28', '780', 'attachments/figo320x240_320x240.jpg', 'sm@gmail.com'),
(23, 15, 26, 15, 'KL-02-GH874', '719045628764', '2019-05-22', '800', 'attachments/rsz_2013_toyota_etios_320x240.jpg', 'alm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE IF NOT EXISTS `vehicletype` (
  `vehicleTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleName` varchar(50) NOT NULL,
  PRIMARY KEY (`vehicleTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`vehicleTypeId`, `VehicleName`) VALUES
(22, 'Jeep'),
(15, 'Car'),
(17, 'Omni');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
