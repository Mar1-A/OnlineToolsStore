-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 02:12 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolboxdb`
--
CREATE DATABASE IF NOT EXISTS `toolboxdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `toolboxdb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(6) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`) VALUES
(1, 'Tool Storages'),
(2, 'Hand Tools'),
(3, 'Cordeless Tools'),
(4, 'Testing Equipments'),
(5, 'Measuring Tools'),
(6, 'Power Tool Batteries'),
(7, 'Tools Sets');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cusID` int(6) NOT NULL,
  `cusFName` varchar(50) DEFAULT NULL,
  `cusLName` varchar(50) DEFAULT NULL,
  `cusEmail` varchar(50) DEFAULT NULL,
  `cusPasswd` varchar(25) NOT NULL,
  `cusAddress` varchar(50) DEFAULT NULL,
  `cusCity` varchar(50) DEFAULT NULL,
  `cusCountry` varchar(50) DEFAULT NULL,
  `cusPostCode` varchar(6) DEFAULT NULL,
  `cusPhoneNum` varchar(10) DEFAULT NULL,
  `dateJoined` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(6) NOT NULL,
  `orderedBy` int(11) NOT NULL,
  `shipedtoFName` varchar(50) DEFAULT NULL,
  `shipedtoLName` varchar(50) DEFAULT NULL,
  `shipedtoAddress` varchar(50) DEFAULT NULL,
  `shipedtoCity` varchar(50) DEFAULT NULL,
  `shipedtoCountry` varchar(50) DEFAULT NULL,
  `shipedtoPC` varchar(6) DEFAULT NULL,
  `orderAmount` float NOT NULL,
  `orderDate` date DEFAULT current_timestamp(),
  `statuID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatues`
--

CREATE TABLE `orderstatues` (
  `statuID` int(11) NOT NULL,
  `statu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatues`
--

INSERT INTO `orderstatues` (`statuID`, `statu`) VALUES
(1, 'Confirmed'),
(2, 'Completed'),
(3, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `prodbrand`
--

CREATE TABLE `prodbrand` (
  `brandID` int(6) NOT NULL,
  `brandaName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodbrand`
--

INSERT INTO `prodbrand` (`brandID`, `brandaName`) VALUES
(1, 'BAHCO'),
(2, 'DEWALT'),
(3, 'MAKITA'),
(4, 'TENG');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(6) NOT NULL,
  `prodName` varchar(250) DEFAULT NULL,
  `prodSNum` varchar(15) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `brandID` int(11) DEFAULT NULL,
  `prodDescription` varchar(500) DEFAULT NULL,
  `prodQuintity` int(11) DEFAULT NULL,
  `prodPrice` float DEFAULT NULL,
  `prodImg` varchar(200) NOT NULL,
  `dateAdded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prodName`, `prodSNum`, `catID`, `brandID`, `prodDescription`, `prodQuintity`, `prodPrice`, `prodImg`, `dateAdded`) VALUES
(4, 'DEWALT TOUGHSYSTEM 2.0 STORAGE TOWER 3 PCS', '231KY', 1, 2, 'Storage system that protects tools from the toughest of site and weather conditions. Polypropylene construction with a visible IP65 water and dust seal. Features easy-to-use, time-saving latches for connecting modules together and a buckled lid with lockable plastic clamps. Supplied with an extendable / detachable handle and wheels for convenient transportation. Compatible with ToughSystem.\r\n\r\n', 10, 159.99, 'img/products/prod4.jpg', '2021-12-06'),
(5, 'Bahco First Fix 244 Hardpoint Saw 550mm (22\")', '111', 2, 1, 'Saw blade for cutting medium thick materials with universal toothing, hardpoint teeth for long lasting sharpness. It has 7/8 teeth per inch', 10, 5.99, 'img/products/prod-11.jpg', '2021-12-11'),
(7, 'DEWALT DCD778P2T-SFGB', '906KV', 3, 2, 'Ergonomic combi drill with brushless motor and XR technology. Features 13mm metal chuck, spindle lock, rubber overmould grip and LED light for workplace illumination. Suitable for consistent screwdriving into a variety of materials with different screw sizes.', 10, 169.99, 'img/products/prod2.jpg', '2021-12-16'),
(8, 'MAKITA DHR242RTJ 3.9KG 18V 5.0AH LI-ION LXT BRUSHLESS', '902KG', 3, 3, 'Brushless SDS rotary hammer drill powered by the Makita 18V lithium battery platform. The DHR242 rotary SDS drill comes equipped with 3 modes of operation: rotary, rotary hammer, and hammer only (for chiselling applications). The soft-grip, rubberized handle allows for comfortable use in any application and at any angle. One-touch slide chuck, adapted for SDS plus drill bits and a soft-grip, ergonomic handle both allow ease and comfort during operation.', 10, 329.99, 'img/products/prod3.jpg', '2021-12-16'),
(9, 'TENG TOOLS EVA HEX & TX KEY SET 42 PIECES ', '2945X', 7, 4, 'Comprehensive set of hex and TX keys. Supplied in a Teng Tools TC tray with removable hinged click and lock lid and dovetail joints. The tools are held in place using 2-colour pre-cut EVA foam tool inserts.', 10, 105.99, 'img/products/prod5.jpg', '2021-12-16'),
(10, 'MAKITA 197627-6 18V 5.0AH LI-ION LXT BATTERIES & CHARGER KIT 5 PIECE SET', '665FV', 6, 3, 'Contains 4 x 5.0Ah Li-ion batteries and a twin-port rapid battery charger. Supplied with a Makita MAKPAC stacking carry case', 10, 349.99, 'img/products/prod6.jpg', '2021-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD KEY `fk_Item` (`orderID`),
  ADD KEY `fk_product` (`prodID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_OrderStat` (`statuID`),
  ADD KEY `orders_ibfk_2` (`orderedBy`);

--
-- Indexes for table `orderstatues`
--
ALTER TABLE `orderstatues`
  ADD PRIMARY KEY (`statuID`);

--
-- Indexes for table `prodbrand`
--
ALTER TABLE `prodbrand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `FK_brandID` (`brandID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cusID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `orderstatues`
--
ALTER TABLE `orderstatues`
  MODIFY `statuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodbrand`
--
ALTER TABLE `prodbrand`
  MODIFY `brandID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `fk_Item` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_OrderStat` FOREIGN KEY (`statuID`) REFERENCES `orderstatues` (`statuID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`orderedBy`) REFERENCES `customers` (`cusID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_brandID` FOREIGN KEY (`brandID`) REFERENCES `prodbrand` (`brandID`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
