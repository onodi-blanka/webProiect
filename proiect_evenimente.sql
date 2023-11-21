-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 11:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect_evenimente`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
                          `ID` int(11) NOT NULL,
                          `EventID` int(11) DEFAULT NULL,
                          `StartTime` time DEFAULT NULL,
                          `EndTime` time DEFAULT NULL,
                          `ActivityDetails` text DEFAULT NULL,
                          `SpeakerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`ID`, `EventID`, `StartTime`, `EndTime`, `ActivityDetails`, `SpeakerID`) VALUES
                                                                                                   (1, 2, '06:54:00', '10:54:00', 'first activity (coffee break)', 1),
                                                                                                   (3, 7, '13:23:00', '01:23:00', 'first activity (coffee break)', 1),
                                                                                                   (4, 7, '19:24:00', '02:24:00', 'second activity (coffee break)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
                        `ID` int(11) NOT NULL,
                        `UserID` int(11) DEFAULT NULL,
                        `EventID` int(11) DEFAULT NULL,
                        `NumberOfTickets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
                         `ID` int(11) NOT NULL,
                         `Name` varchar(255) DEFAULT NULL,
                         `Date` date DEFAULT NULL,
                         `Location` varchar(255) DEFAULT NULL,
                         `Tickets` int(11) DEFAULT NULL,
                         `ContactName` varchar(255) DEFAULT NULL,
                         `ContactPhone` varchar(255) DEFAULT NULL,
                         `ContactEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID`, `Name`, `Date`, `Location`, `Tickets`, `ContactName`, `ContactPhone`, `ContactEmail`) VALUES
                                                                                                                     (1, 'Test', '2023-11-01', 'wadw', 1, 'aawd', '111121', 'esafdc'),
                                                                                                                     (2, 'My new event', '2024-10-30', 'Romania', 300, 'Blanka', '11114141', 'blanka@gmail.com'),
                                                                                                                     (6, 'aasd', '1111-11-11', 'laksd', 21, 'Blanka', '11114141', 'a@a'),
                                                                                                                     (7, 'My new event at 1:30 in the morning', '2023-11-21', 'Romania', 1131231, 'asdasd', '11114141', 'a@a');

-- --------------------------------------------------------

--
-- Table structure for table `eventpartnerssponsors`
--

CREATE TABLE `eventpartnerssponsors` (
                                         `ID` int(11) NOT NULL,
                                         `EventID` int(11) DEFAULT NULL,
                                         `PartnerSponsorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventpartnerssponsors`
--

INSERT INTO `eventpartnerssponsors` (`ID`, `EventID`, `PartnerSponsorID`) VALUES
                                                                              (1, 2, 1),
                                                                              (2, 1, 2),
                                                                              (6, 7, 1),
                                                                              (7, 7, 3),
                                                                              (8, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `partnerssponsors`
--

CREATE TABLE `partnerssponsors` (
                                    `ID` int(11) NOT NULL,
                                    `Name` varchar(255) DEFAULT NULL,
                                    `Type` varchar(255) DEFAULT NULL,
                                    `Details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partnerssponsors`
--

INSERT INTO `partnerssponsors` (`ID`, `Name`, `Type`, `Details`) VALUES
                                                                     (1, 'partner1', 'Partner', 'the first partner'),
                                                                     (2, 'sponsor1', 'Sponsor', 'the first sponsor'),
                                                                     (3, 'Marlboro', 'Partner', 'ethical company'),
                                                                     (4, 'MJFF', 'Sponsor', 'Good ');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
                            `ID` int(11) NOT NULL,
                            `Name` varchar(255) DEFAULT NULL,
                            `Details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`ID`, `Name`, `Details`) VALUES
                                                     (1, 'the first speaker', 'wow it works'),
                                                     (2, 'speaker 2', 'he good'),
                                                     (3, 'bad speaker', 'he bad');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
                           `ID` int(11) NOT NULL,
                           `EventID` int(11) DEFAULT NULL,
                           `UserID` int(11) DEFAULT NULL,
                           `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `ID` int(11) NOT NULL,
                         `Name` varchar(255) DEFAULT NULL,
                         `Password` varchar(255) DEFAULT NULL,
                         `Email` varchar(255) DEFAULT NULL,
                         `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`, `Email`, `isAdmin`) VALUES
                                                                       (1, 'Blanka', '11111', 'onodi@gmail.com', 1),
                                                                       (6, 'blanka2', '11111', 'blanka@b.com', 0),
                                                                       (7, 'Iris', '11111', 'iris@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `SpeakerID` (`SpeakerID`),
  ADD KEY `agenda_ibfk_1` (`EventID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
    ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eventpartnerssponsors`
--
ALTER TABLE `eventpartnerssponsors`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `PartnerSponsorID` (`PartnerSponsorID`),
  ADD KEY `eventpartnerssponsors_ibfk_1` (`EventID`);

--
-- Indexes for table `partnerssponsors`
--
ALTER TABLE `partnerssponsors`
    ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
    ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `EventID` (`EventID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eventpartnerssponsors`
--
ALTER TABLE `eventpartnerssponsors`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `partnerssponsors`
--
ALTER TABLE `partnerssponsors`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
    ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`SpeakerID`) REFERENCES `speakers` (`ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
    ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event` (`ID`);

--
-- Constraints for table `eventpartnerssponsors`
--
ALTER TABLE `eventpartnerssponsors`
    ADD CONSTRAINT `eventpartnerssponsors_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventpartnerssponsors_ibfk_2` FOREIGN KEY (`PartnerSponsorID`) REFERENCES `partnerssponsors` (`ID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
    ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`ID`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
