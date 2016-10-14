-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 21 Οκτ 2015 στις 11:11:53
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `is`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cust_prof`
--

CREATE TABLE IF NOT EXISTS `cust_prof` (
  `custID` varchar(8) NOT NULL,
  `custPass` varchar(16) DEFAULT NULL,
  `custName` varchar(30) DEFAULT NULL,
  `custSurname` varchar(30) DEFAULT NULL,
  `custAddress` varchar(15) DEFAULT NULL,
  `custPaymentInfo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `cust_prof`
--

INSERT INTO `cust_prof` (`custID`, `custPass`, `custName`, `custSurname`, `custAddress`, `custPaymentInfo`) VALUES
('blazy8', '1234', 'Maria', 'Siapera', 'Example 7', 'Cash'),
('dukaki', '1234', 'Konstantinos', 'Douloudis', 'Example 500', 'CC 5555 6666 8888 3333'),
('qwerty', '1234', 'dffdfd', 'dfdf', 'dfdf', 'dffddf');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `emp_cred`
--

CREATE TABLE IF NOT EXISTS `emp_cred` (
  `empID` varchar(16) NOT NULL,
  `empPass` varchar(16) DEFAULT NULL,
  `empTrust` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `emp_cred`
--

INSERT INTO `emp_cred` (`empID`, `empPass`, `empTrust`) VALUES
('kdoul', '1234', NULL),
('maria', '1234', NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order_rec`
--

CREATE TABLE IF NOT EXISTS `order_rec` (
  `orderID` int(11) NOT NULL,
  `custID` varchar(8) NOT NULL,
  `orderDate` date DEFAULT NULL,
  `orderIsReady` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prod2order`
--

CREATE TABLE IF NOT EXISTS `prod2order` (
  `prodID` varchar(10) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prod2sales`
--

CREATE TABLE IF NOT EXISTS `prod2sales` (
  `prodID` varchar(10) NOT NULL,
  `salesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prod_info`
--

CREATE TABLE IF NOT EXISTS `prod_info` (
  `prodID` varchar(10) NOT NULL,
  `prodName` varchar(20) DEFAULT NULL,
  `prodMan` varchar(15) DEFAULT NULL,
  `prodDesc` varchar(500) DEFAULT NULL,
  `whenAdded` date DEFAULT NULL,
  `prodPic` char(50) DEFAULT NULL,
  `prodPrice` int(11) DEFAULT NULL,
  `prodInv` int(11) DEFAULT NULL,
  `prodMinDesc` char(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `prod_info`
--

INSERT INTO `prod_info` (`prodID`, `prodName`, `prodMan`, `prodDesc`, `whenAdded`, `prodPic`, `prodPrice`, `prodInv`, `prodMinDesc`) VALUES
('6s', 'iPhone 6s', 'APPLE', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'apple-iphone-6-4.jpg', 599, 8, 'Lipsum dolor sit amet.'),
('air2', 'IPAD AIR 2', 'APPLE', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'apple-ipad-air-2-new.jpg', 455, 7, 'Lipsum dolor sit amet.'),
('butter2', 'HTC BUTTERFLY 2', 'HTC', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'htc-butterfly-2-new.jpg', 236, 4, 'Lipsum dolor sit amet.'),
('cityman', 'LUMIA 1520', 'NOKIA', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'nokia-lumia-1520-ofic.jpg', 349, 4, 'Lipsum dolor sit amet.'),
('d855', 'G3 32GB', 'LG', 'Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. ', '2015-09-09', 'lg-g3-1.jpg', 380, 10, 'Lipsum dolor etc. Lipsum dolor etc.'),
('H815', 'G4 32GB', 'LG', 'Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. Lipsum dolor etc. ', '2015-09-09', 'lg-g4.jpg', 400, 2, 'Lipsum dolor etc. Lipsum dolor etc.'),
('m4aq', 'XPERIA M4 AQUA', 'SONY', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'sony-xperia-m4-aqua.jpg', 199, 15, 'Lipsum dolor sit amet.'),
('oneM8', 'HTC ONE M8 32GB', 'HTC', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'htc-one-m8.jpg', 500, 11, 'Lipsum dolor sit amet.'),
('s6', 'GALAXY S6', 'SAMSUNG', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'samsung-galaxy-s6.jpg', 799, 3, 'Lipsum dolor sit amet.'),
('tabs2', 'GALAXY TAB S2', 'SAMSUNG', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'samsung-galaxy-tab-s2-97.jpg', 449, 5, 'Lipsum dolor sit amet.'),
('talkman', 'LUMIA 930', 'NOKIA', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'nokia-lumia-930-new.jpg', 349, 4, 'Lipsum dolor sit amet.'),
('z5', 'XPERIA Z5', 'SONY', 'Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. Lipsum dolor sit amet. ', '2015-09-09', 'sony-xperia-z.jpg', 899, 0, 'Lipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `recycle_rc`
--

CREATE TABLE IF NOT EXISTS `recycle_rc` (
  `deviceID` int(11) NOT NULL,
  `custID` varchar(8) NOT NULL,
  `deviceName` varchar(40) DEFAULT NULL,
  `deviceState` varchar(30) DEFAULT NULL,
  `deviceType` varchar(30) DEFAULT NULL,
  `priceBonus` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `recycle_rc`
--

INSERT INTO `recycle_rc` (`deviceID`, `custID`, `deviceName`, `deviceState`, `deviceType`, `priceBonus`) VALUES
(234, 'dukaki', 'blblb', 'new', 'Tablet', 20);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sales_rec`
--

CREATE TABLE IF NOT EXISTS `sales_rec` (
  `salesID` int(11) NOT NULL,
  `custID` varchar(8) NOT NULL,
  `salesDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `sales_rec`
--

INSERT INTO `sales_rec` (`salesID`, `custID`, `salesDate`) VALUES
(1, 'dukaki', '2015-09-09'),
(2, 'dukaki', '2015-09-09'),
(3, 'dukaki', '2015-09-09'),
(4, 'dukaki', '2015-09-09'),
(5, 'dukaki', '2015-09-09'),
(6, 'dukaki', '2015-09-09'),
(7, 'dukaki', '2015-09-09');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sn_rec`
--

CREATE TABLE IF NOT EXISTS `sn_rec` (
  `serialNumb` int(11) NOT NULL,
  `salesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `sn_rec`
--

INSERT INTO `sn_rec` (`serialNumb`, `salesID`) VALUES
(0, 6);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `cust_prof`
--
ALTER TABLE `cust_prof`
  ADD PRIMARY KEY (`custID`);

--
-- Ευρετήρια για πίνακα `emp_cred`
--
ALTER TABLE `emp_cred`
  ADD PRIMARY KEY (`empID`);

--
-- Ευρετήρια για πίνακα `order_rec`
--
ALTER TABLE `order_rec`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_cust2order` (`custID`);

--
-- Ευρετήρια για πίνακα `prod2order`
--
ALTER TABLE `prod2order`
  ADD PRIMARY KEY (`prodID`,`orderID`),
  ADD KEY `FK_prod2order2` (`orderID`);

--
-- Ευρετήρια για πίνακα `prod2sales`
--
ALTER TABLE `prod2sales`
  ADD PRIMARY KEY (`prodID`,`salesID`),
  ADD KEY `FK_prod2sales2` (`salesID`);

--
-- Ευρετήρια για πίνακα `prod_info`
--
ALTER TABLE `prod_info`
  ADD PRIMARY KEY (`prodID`);

--
-- Ευρετήρια για πίνακα `recycle_rc`
--
ALTER TABLE `recycle_rc`
  ADD PRIMARY KEY (`deviceID`),
  ADD KEY `FK_cust2rec` (`custID`);

--
-- Ευρετήρια για πίνακα `sales_rec`
--
ALTER TABLE `sales_rec`
  ADD PRIMARY KEY (`salesID`),
  ADD KEY `FK_cust2sales` (`custID`);

--
-- Ευρετήρια για πίνακα `sn_rec`
--
ALTER TABLE `sn_rec`
  ADD PRIMARY KEY (`serialNumb`),
  ADD KEY `FK_sn2sales` (`salesID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `order_rec`
--
ALTER TABLE `order_rec`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `recycle_rc`
--
ALTER TABLE `recycle_rc`
  MODIFY `deviceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT για πίνακα `sales_rec`
--
ALTER TABLE `sales_rec`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `order_rec`
--
ALTER TABLE `order_rec`
  ADD CONSTRAINT `FK_cust2order` FOREIGN KEY (`custID`) REFERENCES `cust_prof` (`custID`);

--
-- Περιορισμοί για πίνακα `prod2order`
--
ALTER TABLE `prod2order`
  ADD CONSTRAINT `FK_prod2order` FOREIGN KEY (`prodID`) REFERENCES `prod_info` (`prodID`),
  ADD CONSTRAINT `FK_prod2order2` FOREIGN KEY (`orderID`) REFERENCES `order_rec` (`orderID`);

--
-- Περιορισμοί για πίνακα `prod2sales`
--
ALTER TABLE `prod2sales`
  ADD CONSTRAINT `FK_prod2sales` FOREIGN KEY (`prodID`) REFERENCES `prod_info` (`prodID`),
  ADD CONSTRAINT `FK_prod2sales2` FOREIGN KEY (`salesID`) REFERENCES `sales_rec` (`salesID`);

--
-- Περιορισμοί για πίνακα `recycle_rc`
--
ALTER TABLE `recycle_rc`
  ADD CONSTRAINT `FK_cust2rec` FOREIGN KEY (`custID`) REFERENCES `cust_prof` (`custID`);

--
-- Περιορισμοί για πίνακα `sales_rec`
--
ALTER TABLE `sales_rec`
  ADD CONSTRAINT `FK_cust2sales` FOREIGN KEY (`custID`) REFERENCES `cust_prof` (`custID`);

--
-- Περιορισμοί για πίνακα `sn_rec`
--
ALTER TABLE `sn_rec`
  ADD CONSTRAINT `FK_sn2sales` FOREIGN KEY (`salesID`) REFERENCES `sales_rec` (`salesID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
