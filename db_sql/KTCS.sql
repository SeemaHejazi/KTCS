-- CISC 332 ProjectPart1
-- Seema Hejazi     11sh68 10050728
-- Alexandra Poole  12ap23 10071284
--
-- Database: `KTCS`
--
--
CREATE DATABASE IF NOT EXISTS `KTCS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `KTCS`;
-- --------------------------------------------------------
--
-- Table structure for table `Car`
--
DROP TABLE IF EXISTS `Car`;
CREATE TABLE `Car` (
  `VIN` int(11) NOT NULL,
  `Make` varchar(40) NOT NULL,
  `Model` varchar(40) NOT NULL,
  `Year` int(11) NOT NULL,

  `DailyFee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `Car`
--
INSERT INTO `Car` (`VIN`, `Make`, `Model`, `Year`, `DailyFee`) VALUES
(12345678, 'Toyota', 'Corolla', 2013, 30),
(22345678, 'Ford', 'Escape', 2015, 35),
(32345678, 'Toyota', 'Camry', 2012, 32),
(42345678, 'Volkswagen', 'Beetle', 2014, 29);
-- --------------------------------------------------------
--
-- Table structure for table `CarRentalHistory`
--
DROP TABLE IF EXISTS `CarRentalHistory`;
CREATE TABLE `CarRentalHistory` (
  `OReadPickup` int(11) NOT NULL,
  `OReadDropoff` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `MNo` int(11) NOT NULL,
  `LocID` int(11) NOT NULL,
  `VIN` int(11) NOT NULL,
  `DropoffDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `CarRentalHistory`:
--   `DropoffDate`
--       `Reservation` -> `DropoffDate`
--   `LocID`
--       `Location` -> `LocID`
--   `MNo`
--       `Member` -> `MNo`
--   `StatusID`
--       `StatusType` -> `StatusID`
--   `VIN`
--       `Car` -> `VIN`
--
-- Dumping data for table `CarRentalHistory`
--
INSERT INTO `CarRentalHistory` (`OReadPickup`, `OReadDropoff`, `StatusID`, `MNo`, `LocID`, `VIN`, `DropoffDate`) VALUES
(123456, 234456, 1, 123456, 1, 12345678, '2014-07-11'),
(123456, 234567, 3, 223456, 1, 22345678, '2016-01-18');
-- --------------------------------------------------------
--
-- Table structure for table `Charges`
--
DROP TABLE IF EXISTS `Charges`;
CREATE TABLE `Charges` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `MNo` int(11) NOT NULL,
  `RentalLength` int(11) DEFAULT NULL,
  `DailyCharge` int(11) DEFAULT NULL,
  `MonthlyFee` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `PaidStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `Charges`:
--   `DailyCharge`
--       `Car` -> `DailyFee`
--   `MNo`
--       `Member` -> `MNo`
--   `MonthlyFee`
--       `Member` -> `MonthlyFee`
--   `RentalLength`
--       `Reservation` -> `Duration`
--
--
-- Dumping data for table `Charges`
--
INSERT INTO `Charges` (`InvoiceID`, `InvoiceDate`, `MNo`, `RentalLength`, `DailyCharge`, `MonthlyFee`, `Total`, `PaidStatus`) VALUES
(1, '2016-12-31', 123456, 1, 30, 10, 40, 0),
(2, '2016-12-31', 223456, 2, 35, 10, 80, 1),
(3, '2016-12-31', 323456, NULL, NULL, 10, 10, 1),
(4, '2016-12-31', 443456, NULL, NULL, 10, 10, 1),
(5, '2016-12-31', 553456, NULL, NULL, 10, 10, 1);
-- --------------------------------------------------------
--
-- Table structure for table `Location`
--
DROP TABLE IF EXISTS `Location`;
CREATE TABLE `Location` (
  `LocID` int(11) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Province` varchar(4) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `SpaceNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `Location`:
--
-- Dumping data for table `Location`
--
INSERT INTO `Location` (`LocID`, `Address`, `City`, `Province`, `Country`, `SpaceNum`) VALUES
(1, '568 Princess Street', 'Kingston', 'ON', 'Canada', 30),
(2, '1780 Bath Road', 'Kingston', 'ON', 'Canada', 25);
-- --------------------------------------------------------
--
-- Table structure for table `Maintenance`
--
DROP TABLE IF EXISTS `Maintenance`;
CREATE TABLE `Maintenance` (
  `MaintenanceID` int(11) NOT NULL,
  `VIN` int(11) NOT NULL,
  `Date` date NOT NULL,
  `ORead` int(11) NOT NULL,
  `MTypeID` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `Maintenance`:
--   `MTypeID`
--       `maintenancetype` -> `MTypeID`
--   `VIN`
--       `Car` -> `VIN`
--
-- Dumping data for table `Maintenance`
--
INSERT INTO `Maintenance` (`MaintenanceID`, `VIN`, `Date`, `ORead`, `MTypeID`, `Description`) VALUES
(23, 12345678, '2015-12-03', 123345, 1, 'Routine check up, everything is up to standard.'),
(24, 22345678, '2016-01-20', 123345, 2, 'Car not running, repair the starter.'),
(25, 32345678, '2016-03-03', 123456, 3, 'Scrapes and scratches fixed.'),
(26, 42345678, '2016-05-05', 123456, 1, 'Routine checkup, all good in the hood');
-- --------------------------------------------------------
--
-- Table structure for table `maintenancetype`
--
DROP TABLE IF EXISTS `maintenancetype`;
CREATE TABLE `maintenancetype` (
  `MTypeID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `maintenancetype`:
--
--
-- Dumping data for table `maintenancetype`
--
INSERT INTO `maintenancetype` (`MTypeID`, `Name`) VALUES
(1, 'scheduled'),
(2, 'repair'),
(3, 'body work');
-- --------------------------------------------------------
--
-- Table structure for table `Member`
--
DROP TABLE IF EXISTS `Member`;

CREATE TABLE `Member` (
  `MNo` serial NOT NULL,
  `FName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(40) NOT NULL,
  `Province` varchar(4) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `LicenceNo` varchar(40) NOT NULL,
  `RegistrationDate` date NOT NULL,

  `CreditNo` varchar(19) NOT NULL,
  `CreditExpDate` date NOT NULL,

  `MonthlyFee` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `Member`:
--
--
-- Dumping data for table `Member`
--
INSERT INTO `Member` (`MNo`, `FName`, `LName`, `Address`,`City`,`Province`,`Country`, `PhoneNo`, `Email`, `LicenceNo`, `RegistrationDate`, `CreditNo`, `CreditExpDate`, `MonthlyFee`) VALUES
(DEFAULT, 'Mark', 'Smith', '286 Brock Street', 'Kingston', 'ON', 'Canada', 2147483647, 'smith@gmail.com',` R4365-58723-59482`, `2014-08-01`, `5837 3882 7362 4771`, `2018-08-01`, 10),
(DEFAULT, 'Lisa', 'Prince', '980 Earl Street', 'Kingston', 'ON', 'Canada', 2147483647, 'prince@shaw.ca', `R4365-48723-59482`, `2015-08-01`, `4520 3882 7362 4771`, `2018-08-01`, 10),
(DEFAULT, 'Richard', 'Birch', '879 McEwen Drive','Kingston', 'ON', 'Canada', 2147483647, 'rbirch@gmail.com', `R4365-58723-59483`, `2016-08-01`,`5837 3984 7362 4771`, `2018-08-01`, 10),
(DEFAULT, 'Peter', 'Taylor', '121 Maths Street', 'Kingston', 'ON', 'Canada', 2147483647, 'ptaylor@hotmail.com', `R4365-58723-58482`, `2016-04-01`, `5837 7462 7362 4771`, `2018-08-01`, 10),
(DEFAULT, 'Lisa ', 'Laflame', '323 Newsanchor Road', 'Toronto', 'ON', 'Canada', 2147483647, 'llaflame@yahoo.ca', `R4365-58723-57482`, `2016-04-01`,`4520 3882 1010 4771`, `2018-08-01`, 10);
-- --------------------------------------------------------
--
-- Table structure for table `RentalReview`
--
DROP TABLE IF EXISTS `RentalReview`;
CREATE TABLE `RentalReview` (
  `ReviewID` int(11) NOT NULL,
  `MNo` int(11) NOT NULL,
  `VIN` int(11) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `RentalReview`:
--   `MNo`
--       `Member` -> `MNo`
--   `VIN`
--       `Car` -> `VIN`
--
--
-- Dumping data for table `RentalReview`
--
INSERT INTO `RentalReview` (`ReviewID`, `MNo`, `VIN`, `Rating`, `Comment`) VALUES
(1, 123456, 32345678, 4, NULL),
(2, 223456, 22345678, 2, 'Had some engine troubles, ruined my life');
-- --------------------------------------------------------
--
-- Table structure for table `Reservation`
--
DROP TABLE IF EXISTS `Reservation`;
CREATE TABLE `Reservation` (
  `ResNo` int(11) NOT NULL,
  `PickupDate` date NOT NULL,
  `DropoffDate` date NOT NULL,
  `AccessCode` int(11) NOT NULL,
  `MNo` int(11) NOT NULL,
  `VIN` int(11) NOT NULL,
  `LocID` int(11) NOT NULL,
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `Reservation`:
--   `LocID`
--       `Location` -> `LocID`
--   `MNo`
--       `Member` -> `MNo`
--   `VIN`
--       `Car` -> `VIN`
--
--
-- Dumping data for table `Reservation`
--
INSERT INTO `Reservation` (`ResNo`, `PickupDate`, `DropoffDate`, `AccessCode`, `MNo`, `VIN`, `LocID`, `Duration`) VALUES
(1, '2014-07-10', '2014-07-11', 565789, 123456, 12345678, 1, 1),
(2, '2016-01-16', '2016-01-18', 345345, 223456, 22345678, 2, 2);
-- --------------------------------------------------------
--
-- Table structure for table `StatusType`
--
DROP TABLE IF EXISTS `StatusType`;
CREATE TABLE `StatusType` (
  `StatusID` int(11) NOT NULL,
  `Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- RELATIONS FOR TABLE `StatusType`:
--
-- Dumping data for table `StatusType`
--
INSERT INTO `StatusType` (`StatusID`, `Name`) VALUES
(1, 0),
(2, 0),
(3, 0);
--
-- Indexes for dumped tables
--
--
-- Indexes for table `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`VIN`),
  ADD KEY `DailyFee` (`DailyFee`) USING BTREE;
--
-- Indexes for table `CarRentalHistory`
--
ALTER TABLE `CarRentalHistory`
  ADD PRIMARY KEY (`VIN`,`DropoffDate`),
  ADD UNIQUE KEY `StatusID` (`StatusID`),
  ADD UNIQUE KEY `MNo` (`MNo`),
  ADD UNIQUE KEY `VIN` (`VIN`),
  ADD UNIQUE KEY `HistID` (`DropoffDate`,`VIN`),
  ADD KEY `LocID` (`LocID`) USING BTREE;
--
-- Indexes for table `Charges`
--
ALTER TABLE `Charges`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD UNIQUE KEY `MNo` (`MNo`),
  ADD KEY `DailyCharge` (`DailyCharge`),
  ADD KEY `RentalLength` (`RentalLength`) USING BTREE,
  ADD KEY `MonthlyFee` (`MonthlyFee`) USING BTREE;
--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`LocID`);
--
-- Indexes for table `Maintenance`
--
ALTER TABLE `Maintenance`
  ADD PRIMARY KEY (`MaintenanceID`),
  ADD UNIQUE KEY `VIN` (`VIN`),
  ADD KEY `TypeID` (`MTypeID`) USING BTREE;
--
-- Indexes for table `maintenancetype`
--
ALTER TABLE `maintenancetype`
  ADD PRIMARY KEY (`MTypeID`);
--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`MNo`),
  ADD KEY `MonthlyFee` (`MonthlyFee`) USING BTREE;
--
-- Indexes for table `RentalReview`
--
ALTER TABLE `RentalReview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD UNIQUE KEY `MNo` (`MNo`),
  ADD UNIQUE KEY `VIN` (`VIN`);
--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ResNo`),
  ADD UNIQUE KEY `VIN` (`VIN`),
  ADD UNIQUE KEY `MNo` (`MNo`),
  ADD UNIQUE KEY `LocID` (`LocID`),
  ADD UNIQUE KEY `DropoffDate` (`DropoffDate`),
  ADD UNIQUE KEY `PickupDate` (`PickupDate`),
  ADD KEY `Duration` (`Duration`);
--
-- Indexes for table `StatusType`
--
ALTER TABLE `StatusType`
  ADD PRIMARY KEY (`StatusID`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `Charges`
--
ALTER TABLE `Charges`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `LocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Maintenance`
--
ALTER TABLE `Maintenance`
  MODIFY `MaintenanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `maintenancetype`
--
ALTER TABLE `maintenancetype`
  MODIFY `MTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `MNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
--
-- AUTO_INCREMENT for table `RentalReview`
--
ALTER TABLE `RentalReview`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `ResNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `StatusType`
--
ALTER TABLE `StatusType`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `CarRentalHistory`
--
ALTER TABLE `CarRentalHistory`
  ADD CONSTRAINT `DropoffDate` FOREIGN KEY (`DropoffDate`) REFERENCES `Reservation` (`DropoffDate`),
  ADD CONSTRAINT `LocID` FOREIGN KEY (`LocID`) REFERENCES `Location` (`LocID`),
  ADD CONSTRAINT `MNo` FOREIGN KEY (`MNo`) REFERENCES `Member` (`MNo`),
  ADD CONSTRAINT `StatusID` FOREIGN KEY (`StatusID`) REFERENCES `StatusType` (`StatusID`),
  ADD CONSTRAINT `VIN` FOREIGN KEY (`VIN`) REFERENCES `Car` (`VIN`);
--
-- Constraints for table `Charges`
--
ALTER TABLE `Charges`
  ADD CONSTRAINT `Charges_DailyCharge` FOREIGN KEY (`DailyCharge`) REFERENCES `Car` (`DailyFee`),
  ADD CONSTRAINT `Charges_MNo` FOREIGN KEY (`MNo`) REFERENCES `Member` (`MNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Charges_MonthlyFee` FOREIGN KEY (`MonthlyFee`) REFERENCES `Member` (`MonthlyFee`),
  ADD CONSTRAINT `Charges_RentalLength` FOREIGN KEY (`RentalLength`) REFERENCES `Reservation` (`Duration`);
--
-- Constraints for table `Maintenance`
--
ALTER TABLE `Maintenance`
  ADD CONSTRAINT `MTypeID` FOREIGN KEY (`MTypeID`) REFERENCES `maintenancetype` (`MTypeID`),
  ADD CONSTRAINT `Maintenance_VIN` FOREIGN KEY (`VIN`) REFERENCES `Car` (`VIN`);
--
-- Constraints for table `RentalReview`
--
ALTER TABLE `RentalReview`
  ADD CONSTRAINT `RentalReview_MNo` FOREIGN KEY (`MNo`) REFERENCES `Member` (`MNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RentalReview_VIN` FOREIGN KEY (`VIN`) REFERENCES `Car` (`VIN`);
--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Res_LocID` FOREIGN KEY (`LocID`) REFERENCES `Location` (`LocID`),
  ADD CONSTRAINT `Res_MNo` FOREIGN KEY (`MNo`) REFERENCES `Member` (`MNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Res_VIN` FOREIGN KEY (`VIN`) REFERENCES `Car` (`VIN`);
SET FOREIGN_KEY_CHECKS=1;




































