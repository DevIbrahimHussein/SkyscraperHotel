-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 01:20 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HotelManagementSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `CheckIn` date DEFAULT NULL,
  `CheckOut` date DEFAULT NULL,
  `NbOfAdults` smallint(6) DEFAULT NULL,
  `NbOfChildren` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `UserID`, `RoomID`, `CheckIn`, `CheckOut`, `NbOfAdults`, `NbOfChildren`) VALUES
(1, 1, 1, NULL, NULL, 1, 1),
(2, 4, 1, NULL, NULL, 1, 1),
(3, 4, 1, NULL, NULL, 1, 1),
(4, 4, 1, NULL, NULL, 1, 0),
(5, 4, 1, NULL, NULL, 1, 0),
(6, 4, 1, NULL, NULL, 1, 0),
(7, 4, 1, NULL, NULL, 1, 0),
(8, 4, 1, NULL, NULL, 1, 0),
(9, 4, 1, NULL, NULL, 1, 0),
(10, 4, 1, NULL, NULL, 1, 0),
(11, 4, 1, NULL, NULL, 1, 0),
(12, 4, 1, NULL, NULL, 1, 0),
(13, 4, 1, '2018-05-15', NULL, 1, 0),
(14, 4, 1, NULL, NULL, 1, 0),
(15, 4, 1, NULL, NULL, 1, 0),
(16, 4, 1, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `CityName`) VALUES
(1, 'New York'),
(2, 'White Plains'),
(3, 'AmityVille'),
(4, 'Buffalo'),
(5, 'Rochester'),
(6, 'Yorkers'),
(7, 'Utica'),
(8, 'Huntington');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Status` varchar(30) NOT NULL,
  `PostDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `HotelID` int(11) NOT NULL,
  `HotelName` varchar(255) NOT NULL,
  `HotelRating` double NOT NULL,
  `HotelDescription1` text NOT NULL,
  `HotelDescription2` text NOT NULL,
  `HotelDescription3` text NOT NULL,
  `HotelMotto` text NOT NULL,
  `ApproximatePrice` int(11) NOT NULL,
  `ImageID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `HotelStatus` varchar(255) NOT NULL,
  `HotelTags` text NOT NULL,
  `CommentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`HotelID`, `HotelName`, `HotelRating`, `HotelDescription1`, `HotelDescription2`, `HotelDescription3`, `HotelMotto`, `ApproximatePrice`, `ImageID`, `CityID`, `Email`, `PhoneNumber`, `HotelStatus`, `HotelTags`, `CommentCount`) VALUES
(1, 'Hotel Pennyslvania', 4, '                         Something very Important               ', '                         Very Nice hotel, yad yad yada               ', '                         asda               ', 'Only the best can have the best.', 300, 1, 1, 'hotel@hotmail.com', 123312, 'public', '                                        ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `Image1` text NOT NULL,
  `Image2` text NOT NULL,
  `Image3` text NOT NULL,
  `Image4` text NOT NULL,
  `Image5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`) VALUES
(1, 'sroom2.jpg', 'roomOp2.jpg', 'carouselroom1.jpg', 'restaurant.jpg', 'bar1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `View` varchar(255) NOT NULL,
  `Floor` smallint(6) NOT NULL,
  `NbOfBeds` tinyint(4) NOT NULL,
  `SizeOfBeds` varchar(255) NOT NULL,
  `Price` smallint(6) NOT NULL,
  `ImageID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomName`, `Type`, `Description`, `View`, `Floor`, `NbOfBeds`, `SizeOfBeds`, `Price`, `ImageID`, `HotelID`) VALUES
(1, 'Rooftop Room', 'Suite', '    Why settle for middle when you can have top?', 'City View', 82, 2, 'King', 150, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceID`, `ServiceName`, `Description`, `Price`) VALUES
(3, 'Breakfast', 'Breakfast included for the rest of your stay.', 150),
(4, 'Car Rental', 'Rent one of our finest cars to freely discover the wonders of New York anytime and anywhere!', 100),
(5, 'Travel Guide', 'Let one of our most professional guide team in New York show you around and give you an experience you will never forget!', 75),
(6, 'Airport-Hotel Transportations', 'No one to pick you up? We got you covered!', 50),
(7, 'Spa and Gym', 'A day indoors? How about a spa day? Or a healthy training in the gym?', 30),
(8, 'Safe', 'Paranoid of being in a strange city? Carrying valuable items while you travel? Ask for a safe in the room!', 30),
(9, 'Bike Rental', 'Tired of taking cabs? Walking is too slow? Rent a bike!', 10),
(10, 'Baggage Storage', 'Trust us! You can leave you baggage with us free of charge whether you still have not booked, booked or checked out of the hotel.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` int(15) NOT NULL,
  `Address` text NOT NULL,
  `CityID` int(11) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` smallint(6) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `CityID`, `Gender`, `Age`, `Role`) VALUES
(1, 'itsme_ali97@hotmail.com', 'Password', 'Ali', 'Chaalan', 2147483647, 'Saida, Al-Wastani Street', 2, 'Male', 20, 'admin'),
(2, 'sereen@hotmail.com', 'Password', 'Sereen', 'Jalloul', 2147483647, '121 Street', 5, 'Female', 20, 'subscriber'),
(3, 'ibrahimhussein19.98@gmail.com', '123123', 'ibrahim', 'Hussein', 76614115, 'Beirut', 1, 'Male', 20, 'admin'),
(4, 'ibrahim98h@outlook.com', '123123', 'bob', 'hussein', 76614115, 'beirut', 6, 'Male', 19, 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `userservices`
--

CREATE TABLE `userservices` (
  `UserServiceID` int(11) NOT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userservices`
--

INSERT INTO `userservices` (`UserServiceID`, `ServiceID`, `UserID`) VALUES
(27, 10, 2),
(24, 8, 2),
(22, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userservices`
--
ALTER TABLE `userservices`
  ADD PRIMARY KEY (`UserServiceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userservices`
--
ALTER TABLE `userservices`
  MODIFY `UserServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
