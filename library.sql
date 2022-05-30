-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2021 at 01:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--

CREATE TABLE `add_book` (
  `bookId` int(10) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `bookTitle` varchar(200) NOT NULL,
  `bookAuthor` varchar(50) NOT NULL,
  `bookPublisher` varchar(50) NOT NULL,
  `bookStatus` varchar(10) DEFAULT NULL,
  `bookRegularcost` float NOT NULL,
  `bookExtentedcost` float NOT NULL,
  `type` varchar(10) NOT NULL,
  `borrower` varchar(50) DEFAULT NULL,
  `borrowDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `extendDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_book`
--

INSERT INTO `add_book` (`bookId`, `ISBN`, `bookTitle`, `bookAuthor`, `bookPublisher`, `bookStatus`, `bookRegularcost`, `bookExtentedcost`, `type`, `borrower`, `borrowDate`, `returnDate`, `extendDate`) VALUES
(10001, '9781387642410', 'Power of Technology 7th Edition', 'Mastrian Layween', 'lulu.com', 'Borrowed', 2.5, 1, 'Book', '11627', '2021-08-20', '2021-08-28', NULL),
(10002, '9781284182095', 'Informatics for Health Professionals', 'Kathleen Briklyn; McGonigle, Dee', 'Jones & Bartlett Learning', 'Available', 1.9, 0.5, 'Workbook', NULL, NULL, NULL, NULL),
(10003, '9781984881250', '2034: A Novel of the Next World War', 'James Admiral', 'Penguin Press', 'Available', 2, 1.2, 'Textbook', NULL, NULL, NULL, NULL),
(10005, '9780133356724', 'Digital Image Processing', 'Gonzalez, Rafael; Woods, Richard', 'Pearson', 'Extended', 4.5, 2, 'Workbook', '11627', '2021-08-19', '2021-08-25', '2021-08-27'),
(10006, '9780593238295', 'AI 2041: Ten Visions for Our Future', 'Kai-Fu; Qiufan, Chen', 'Currency', 'Available', 2.9, 1.2, 'Textbook', NULL, NULL, NULL, NULL),
(10007, '9780367670566', 'Games, Third Edition', 'Millington, Ian', 'CRC Press', 'Available', 3, 1.5, 'Book', NULL, NULL, NULL, NULL),
(10009, '9780393422108', 'Environmental Science and Sustainability', 'Sherman, Daniel J.; Montgomery, David R.', 'W. W. Norton & Company', 'Available', 3, 2, 'Book', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `userId` bigint(12) NOT NULL,
  `bookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`userId`, `bookId`) VALUES
(11627, 10003),
(11627, 10002),
(11627, 10001),
(11627, 10007),
(11627, 10007),
(12465, 10009),
(18181, 10007);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `libId` int(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `libFirstName` varchar(50) NOT NULL,
  `libLastName` varchar(50) NOT NULL,
  `libPhone` varchar(15) NOT NULL,
  `libEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`libId`, `password`, `libFirstName`, `libLastName`, `libPhone`, `libEmail`) VALUES
(80001, '123', 'Katelynn', 'Yeo', '82938492', 'ky@gmail.com'),
(80002, '123', 'Cindy', 'Wong', '82738292', 'cindyw@gmail.com'),
(80003, '123', 'Amanda', 'Yong', '99273847', 'amanda@gmail.com'),
(80004, '123', 'Lau', 'Zhi Xin', '72837283', 'zx@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userFirstName` varchar(20) NOT NULL,
  `userLastName` varchar(20) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `password`, `userFirstName`, `userLastName`, `userPhone`, `userEmail`) VALUES
(11627, '123', 'Alexander', 'Lim', '82938492', 'alex@gmail.com'),
(12121, '123', 'Cindy', 'Yeo', '93827382', 'cindy@gmail.com'),
(12345, '123', 'Andrew', 'Ang', '72839293', 'andrew@gmail.com'),
(12465, '123', 'John', 'Lim Zhein Xin', '92837283', 'johnlzx@gmail.com'),
(18181, '123', 'Johnson', 'Johnny', '72837282', 'john@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `fk_1` (`userId`),
  ADD KEY `fk_2` (`bookId`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`libId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`bookId`) REFERENCES `add_book` (`bookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
