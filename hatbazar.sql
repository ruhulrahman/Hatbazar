-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 10:50 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatbazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(9, 'Apple'),
(6, 'Asus'),
(10, 'Samsung'),
(7, 'Symphony'),
(11, 'Brother'),
(12, 'Canon'),
(13, 'Yamaha'),
(17, 'Partex'),
(16, 'Hatil'),
(18, 'Fuji'),
(19, 'HP'),
(20, 'RFL'),
(21, 'Gipson'),
(22, 'Epson'),
(25, 'Sunlight'),
(26, 'Corola'),
(27, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `car_n_bike`
--

CREATE TABLE `car_n_bike` (
  `id` int(11) NOT NULL,
  `productName` varchar(150) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `thanaId` int(11) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `price` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `modelYear` int(11) NOT NULL,
  `p_condition` int(11) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `modelName` varchar(100) NOT NULL,
  `bodyType` varchar(100) NOT NULL,
  `fuelType` varchar(100) NOT NULL,
  `engineCapacity` int(11) NOT NULL,
  `myles` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_n_bike`
--

INSERT INTO `car_n_bike` (`id`, `productName`, `categoryId`, `thanaId`, `photos`, `mobile`, `price`, `brandId`, `modelYear`, `p_condition`, `transmission`, `modelName`, `bodyType`, `fuelType`, `engineCapacity`, `myles`, `userId`, `time`) VALUES
(1, 'SW', 5, 2, 'img/upload/3ac771cc85.jpg', '01638584622', 195000, 13, 2015, 1, 'na', 'na', 'na', 'octen', 3500, '98000', 1, '2017-09-25 11:20:21'),
(2, 'Asus A6', 23, 2, 'img/upload/2c2b15c39a.jpg', '01843867772', 19500, 6, 2015, 2, 'na', '002414', 'na', 'na', 500, '500', 1, '2017-10-10 17:21:31'),
(3, 'Galaxy S3', 23, 2, 'img/upload/44dd486bbc.jpg', '01843867772', 45000, 10, 0, 2, 'na', 'na', 'na', 'na', 0, '0', 2, '2017-10-10 17:29:02'),
(4, 'Dosch 3D - Car Details - Coupe', 4, 20, 'img/upload/b086869070.jpg', '01843867772', 3500000, 27, 2017, 1, 'new', 'Ds 3', 'new', 'petrol', 3500, '98000', 1, '2017-11-08 16:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(24, 'Camera'),
(23, 'Mobile'),
(4, 'Car'),
(5, 'Bike'),
(25, 'Watch'),
(26, 'TV'),
(27, 'Freeze'),
(28, 'Computer'),
(29, 'Guiter'),
(30, 'Printer'),
(31, 'Electronics'),
(32, 'Furniture'),
(33, 'Musical Instrument'),
(34, 'House');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `disId` int(11) NOT NULL,
  `districtName` varchar(100) NOT NULL,
  `divId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`disId`, `districtName`, `divId`) VALUES
(1, 'Dhaka City', 1),
(2, 'Rajshahi District', 2),
(3, 'Sathkhira', 4),
(4, 'Ranpur District', 7),
(5, 'Sylhet District', 6),
(6, 'Barishal District', 5),
(7, 'Mymensingh District', 8),
(8, 'Chittagong City', 3),
(9, 'Natore', 2),
(10, 'Gopalgonj', 1),
(11, 'Narsingdi', 1),
(12, 'Bogra', 2),
(13, 'Pabna', 2),
(14, 'Kushtia', 4),
(15, 'Naugaon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `divId` int(11) NOT NULL,
  `divisionName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divId`, `divisionName`) VALUES
(1, 'Dhaka'),
(2, 'Rajshahi'),
(3, 'Chittagong'),
(4, 'Khulna'),
(5, 'Bairshal'),
(6, 'Sylhet'),
(7, 'Rangpur'),
(8, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `electId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `conditionId` int(11) NOT NULL COMMENT 'id=1=new, 2=used',
  `thanaId` int(11) NOT NULL COMMENT 'Location',
  `post_title` varchar(100) NOT NULL,
  `post_desc` varchar(700) NOT NULL,
  `image` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`electId`, `brandId`, `categoryId`, `conditionId`, `thanaId`, `post_title`, `post_desc`, `image`, `price`, `mobile`, `time`, `userId`) VALUES
(3, 21, 29, 2, 25, 'Accoustic Guitar', 'good sound', 'img/upload/b888fad11e.jpg', 5000, '01843867772', '2017-11-06 10:48:29', 1),
(4, 20, 32, 1, 27, 'Chair', 'Comfortable chair', 'img/upload/44d8dffe00.jpg', 3500, '01843867772', '2017-11-06 10:50:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `thanaId` int(11) NOT NULL,
  `thanaName` varchar(100) NOT NULL,
  `disId` int(11) NOT NULL,
  `divId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`thanaId`, `thanaName`, `disId`, `divId`) VALUES
(2, 'Natore Sadar', 9, 2),
(3, 'Singra', 9, 2),
(4, 'Gurudashpur', 9, 2),
(26, 'Baridhara', 1, 1),
(6, 'Tejgaon', 1, 1),
(10, 'Pabna Sadar', 13, 2),
(8, 'Dhanmondi', 1, 1),
(9, 'Mohammadpur', 1, 1),
(11, 'Kumar Khali', 14, 4),
(12, 'Doulatpur', 14, 4),
(13, 'Sathiya', 13, 2),
(14, 'Bheramara', 14, 4),
(16, 'Gulshan', 1, 1),
(17, 'Uttara', 1, 1),
(18, 'Shahbagh', 1, 1),
(19, 'Mohammadpur', 1, 1),
(20, 'Mirpur', 1, 1),
(21, 'Pallabi', 1, 1),
(25, 'Banani', 1, 1),
(23, 'Rampura', 1, 1),
(27, 'Ramna', 1, 1),
(28, 'Paltan', 1, 1),
(29, 'Motijheel', 1, 1),
(30, 'Bonpara', 9, 2),
(31, 'Baghatipara', 1, 1),
(32, 'Lalpur', 9, 2),
(33, 'Puthia', 2, 2),
(34, 'Raipura', 11, 1),
(35, 'Morjal', 11, 1),
(36, 'Bogra Sadar', 12, 2),
(37, 'Shahjahanpur', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unknown',
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '113693764278786917460', 'Ruhul', 'Amin', 'ruhulrahman2233@gmail.com', 'male', 'en', 'https://lh4.googleusercontent.com/-Kf0GpWucbEc/AAAAAAAAAAI/AAAAAAAAE6o/EUYwFGrV0gI/photo.jpg', 'https://plus.google.com/+RuhulAmin14', '2017-10-09 05:47:06', '2017-11-08 10:34:18'),
(2, 'google', '113755487913892432011', 'Sardar  Mahbubur', 'Rahman', 'mahbuburrahmanbrta@gmail.com', '', 'en', 'https://lh5.googleusercontent.com/-LiEyOjVfOVc/AAAAAAAAAAI/AAAAAAAAABU/gz3l9n8SPpg/photo.jpg', 'https://plus.google.com/113755487913892432011', '2017-10-10 03:37:52', '2017-10-10 11:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `website_details`
--

CREATE TABLE `website_details` (
  `id` int(11) NOT NULL,
  `site_title` varchar(200) NOT NULL,
  `site_desc` varchar(500) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'Ruhul Amin'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_details`
--

INSERT INTO `website_details` (`id`, `site_title`, `site_desc`, `keywords`, `author`) VALUES
(3, 'HATBAZAR || à¦¹à¦¾à¦Ÿà¦¬à¦¾à¦œà¦¾à¦° || for Selling', 'à¦ªà§à¦°à¦¨à§‹ à¦—à¦¾à¦¡à¦¼à¦¿ à¦¥à§‡à¦•à§‡ à¦¶à§à¦°à§ à¦•à¦°à§‡ à¦®à§‹à¦¬à¦¾à¦‡à¦² à¦«à§‹à¦¨, à¦à¦®à¦¨à¦•à¦¿ à¦¨à¦¤à§à¦¨ à¦¬à¦¾à¦¡à¦¼à¦¿ à¦¸à¦¹ à¦¸à¦¬à¦•à¦¿à¦›à§ à¦•à§à¦°à¦¯à¦¼-à¦¬à¦¿à¦•à§à¦°à¦¯à¦¼ à¦•à¦°à§à¦¨à¥¤ à¦†à¦ªà¦¨à¦¾à¦° à¦¨à¦¿à¦•à¦Ÿà¦¬à¦°à§à¦¤à§€ à¦¸à§à¦¥à¦¾à¦¨ à¦¥à§‡à¦•à§‡ à¦à¦•à¦Ÿà¦¿ à¦šà¦®à§Žà¦•à¦¾à¦° à¦¡à¦¿à¦² à¦–à§à¦à¦œà§‡ à¦¨à¦¿à¦¨, à¦¬à¦¾ à¦¸à¦¾à¦°à¦¾ à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡ ...', 'bazar, hatbazar, sell, selling site, sell bazar, bd sell site, à¦¬à§‡à¦šà¦¾ à¦•à§‡à¦¨à¦¾, à¦•à§‡à¦¨à¦¾ à¦¬à§‡à¦šà¦¾, à¦•à§à¦°à§Ÿ à¦¬à¦¿à¦•à§à¦°à§Ÿ', 'hatbazar authority');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `car_n_bike`
--
ALTER TABLE `car_n_bike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`disId`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`divId`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`electId`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`thanaId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_details`
--
ALTER TABLE `website_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `car_n_bike`
--
ALTER TABLE `car_n_bike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `disId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `divId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `electId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `thanaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `website_details`
--
ALTER TABLE `website_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
