-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 03:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` varchar(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `image` varchar(10) DEFAULT 'false',
  `telephone` varchar(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `fullname`, `date`, `address`, `notes`, `image`, `telephone`, `active`) VALUES
('00-0000', 'EWMS הזמנה למלאי  (רכש)', '2020-09-16 21:00:00', 'EWMS הזמנה למלאי  (רכש)', 'EWMS הזמנה למלאי (רכש)', 'true', '999-999-9999', 1),
('00-0105', 'ארטור זרנקין', '2020-09-16 21:00:00', 'השושנים 1216/8, נוף הגליל', 'תלמיד מצטיין', 'true', '052-889-9664', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemid` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `itemname` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'global',
  `category` varchar(50) NOT NULL DEFAULT 'global',
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'false',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 0,
  `storage` varchar(20) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `emphasize` varchar(5) NOT NULL DEFAULT 'pcs',
  `maxquantity` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `itemcounter` int(11) NOT NULL DEFAULT 0,
  `storage_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `created_at`, `itemname`, `type`, `category`, `description`, `image`, `updated_at`, `quantity`, `storage`, `price`, `emphasize`, `maxquantity`, `active`, `itemcounter`, `storage_updated_at`) VALUES
('0-000-00000', '2020-09-17 10:17:22', 'פריט נסיוני', 'global', 'global', 'פריט נסיוני', 'true', '2020-10-08 22:51:36', 196, '000-A-000', 20, 'ea', NULL, 1, 442, '2020-10-08 06:01:46'),
('1-000-10010', '2020-09-17 10:53:55', 'גיטרה חשמלית לבנה', 'global', 'musicinstrument', 'כלי נגינה 1', 'true', '2020-10-08 22:29:08', 13, '100-A-001', 2100, 'ea', NULL, 1, 50, '2020-09-17 11:48:00'),
('1-000-10011', '2020-09-17 10:54:23', 'גיטרה חשמלית שחורה', 'global', 'musicinstrument', 'כלי נגינה 2', 'true', '2020-10-09 02:51:37', 14, '100-A-002', 1200, 'ea', NULL, 1, 101, '2020-10-09 02:51:37'),
('1-000-10012', '2020-09-17 10:55:24', 'אורגן גיטרה', 'global', 'musicinstrument', 'כלי נגינה 3', 'true', '2020-10-08 22:50:25', 21, '100-B-010', 2000, 'ea', NULL, 1, 66, '2020-09-23 10:11:03'),
('1-000-10013', '2020-09-17 10:56:01', 'אורגן YAMAHA', 'global', 'musicinstrument', 'כלי נגינה 4', 'true', '2020-10-08 22:37:08', 20, '100-B-002', 1100, 'ea', NULL, 1, 41, '2020-09-17 11:50:05'),
('1-000-10014', '2020-09-17 10:56:42', 'אורגן CASIO', 'global', 'musicinstrument', 'כלי נגינה 5', 'true', '2020-10-08 13:16:03', 20, '100-B-001', 512, 'ea', NULL, 1, 21, '2020-09-17 11:49:43'),
('1-000-10015', '2020-09-17 10:57:14', 'גיטרה אקוסטית', 'global', 'musicinstrument', 'כלי נגינה 6', 'true', '2020-10-08 13:16:01', 26, '100-A-004', 650, 'ea', NULL, 1, 106, '2020-10-06 11:39:02'),
('1-000-10016', '2020-09-17 10:57:46', 'גיטרה 12 מיטרים', 'global', 'musicinstrument', 'כלי נגינה 7', 'true', '2020-10-08 13:15:59', 20, '100-A-005', 740, 'ea', NULL, 1, 39, '2020-09-17 11:51:29'),
('1-000-10017', '2020-09-17 10:58:26', 'גיטרה קלאסית YAMAHA', 'global', 'musicinstrument', 'כלי נגינה 8', 'true', '2020-10-08 13:15:57', 19, '100-A-006', 750, 'ea', NULL, 1, 63, '2020-10-01 01:33:17'),
('1-000-10018', '2020-09-17 10:59:08', 'גיטרה קלאסית MADRIGAL', 'global', 'musicinstrument', 'כלי נגינה 9', 'true', '2020-10-08 13:15:55', 12, '100-A-007', 780, 'ea', NULL, 1, 103, '2020-09-17 11:52:49'),
('1-000-10019', '2020-09-17 10:59:53', 'גיטרה קלאסית פשוטה', 'global', 'musicinstrument', 'כלי נגינה 10', 'true', '2020-10-08 13:15:51', 0, '100-A-008', 340, 'ea', NULL, 1, 76, '2020-09-17 11:53:21'),
('1-000-10020', '2020-09-17 11:00:31', 'טופים', 'nufunction', 'musicinstrument', 'כלי נגינה 11', 'true', '2020-10-08 13:15:49', 2, '100-C-001', 400, 'ea', NULL, 1, 11, '2020-09-17 11:53:53'),
('1-234-56789', '2020-09-25 02:20:33', 'פריט נסיוני ללא תמונה1', 'global', 'global', '', 'false', '2020-10-08 13:15:47', 5, NULL, 0, 'ea', NULL, 1, 188, '2020-10-06 10:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `customerid` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `order_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_closed_at` timestamp NULL DEFAULT NULL,
  `orderpaidprice` int(11) NOT NULL DEFAULT 0,
  `orderpaid` tinyint(1) NOT NULL DEFAULT 0,
  `suppliedpaidprice` int(11) NOT NULL DEFAULT 0,
  `suppliedpaid` tinyint(1) NOT NULL DEFAULT 0,
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `totallines` int(11) DEFAULT NULL,
  `internal` tinyint(1) NOT NULL DEFAULT 0,
  `ordernote` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `customerid`, `userid`, `order_created_at`, `order_updated_at`, `order_closed_at`, `orderpaidprice`, `orderpaid`, `suppliedpaidprice`, `suppliedpaid`, `closed`, `totallines`, `internal`, `ordernote`) VALUES
(120000194, '00-0105', 42, '2020-10-09 02:51:37', '2020-10-09 02:51:37', NULL, 0, 0, 0, 0, 0, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `ai` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `itemid` varchar(20) NOT NULL,
  `orderquantity` int(11) NOT NULL DEFAULT 0,
  `supplyquantity` int(11) NOT NULL DEFAULT 0,
  `oi_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `close` tinyint(1) NOT NULL DEFAULT 0,
  `received` tinyint(1) NOT NULL DEFAULT 0,
  `oi_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderprice` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`ai`, `orderid`, `itemid`, `orderquantity`, `supplyquantity`, `oi_updated_at`, `close`, `received`, `oi_created_at`, `orderprice`) VALUES
(184, 120000194, '1-000-10011', 5, 0, '2020-10-09 02:51:37', 0, 0, '2020-10-09 02:51:37', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` text NOT NULL,
  `userpassport` varchar(20) NOT NULL,
  `userfullname` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `tries` int(11) NOT NULL DEFAULT 10,
  `user_registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `permission` int(11) NOT NULL DEFAULT 0,
  `usernote` text DEFAULT NULL,
  `user_lastconnected_at` timestamp NULL DEFAULT current_timestamp(),
  `logoutvalue` text DEFAULT NULL,
  `username_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `userpassword`, `userpassport`, `userfullname`, `active`, `tries`, `user_registered_at`, `user_updated_at`, `permission`, `usernote`, `user_lastconnected_at`, `logoutvalue`, `username_updated_at`) VALUES
(42, 'admin', '$2y$10$TlXjLjHdg42OH4TcS3xTIOsd4pMS0.7qy4IIbJOxTNkXDbMgWG2sq', '000000000', 'מנהל המערכת', 1, 10, '2020-10-03 00:15:14', '2020-10-08 13:50:13', 5, NULL, '2020-10-03 00:34:08', NULL, '2020-08-04 10:31:51'),
(43, 'legopart', '$2y$10$DY7fG9yXBygOYNucXz3.NeN1rES6irw80m3CLfV7W8XbaPfnKvIv2', '304445943', 'ארטור זרנקין', 1, 10, '2020-10-03 00:15:14', '2020-10-06 09:16:32', 5, NULL, '2020-10-03 00:34:08', NULL, '2020-10-04 22:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `zrel_category`
--

CREATE TABLE `zrel_category` (
  `itemcategory` varchar(50) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zrel_category`
--

INSERT INTO `zrel_category` (`itemcategory`, `categoryname`) VALUES
('electricity', 'מוצרי חשמל'),
('global', 'כללי'),
('meatproduct', 'מוצרי בשר'),
('musicinstrument', 'כלי נגינה');

-- --------------------------------------------------------

--
-- Table structure for table `zrel_itempcs`
--

CREATE TABLE `zrel_itempcs` (
  `pcs` varchar(20) NOT NULL,
  `pcsname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zrel_itempcs`
--

INSERT INTO `zrel_itempcs` (`pcs`, `pcsname`) VALUES
('cm', 'סמ'),
('cm2', 'סמ\"ר'),
('ea', 'יח'),
('kg', 'קג'),
('pcs', 'פריטים'),
('service', 'שרות'),
('set', 'סט');

-- --------------------------------------------------------

--
-- Table structure for table `zrel_itemtype`
--

CREATE TABLE `zrel_itemtype` (
  `itemtype` varchar(50) NOT NULL,
  `itemtypename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zrel_itemtype`
--

INSERT INTO `zrel_itemtype` (`itemtype`, `itemtypename`) VALUES
('datelimit', 'בעל תוקף'),
('global', 'כללי'),
('nufunction', 'לא תקין'),
('registration', 'רישום על המשאיל'),
('returnable', 'ניתן להחזיר'),
('waranty', 'בעל אחריות');

-- --------------------------------------------------------

--
-- Table structure for table `zrel_permission`
--

CREATE TABLE `zrel_permission` (
  `permission` int(11) NOT NULL,
  `permissionname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zrel_permission`
--

INSERT INTO `zrel_permission` (`permission`, `permissionname`) VALUES
(0, '*חסום*'),
(1, 'צפיה בלבד'),
(2, 'פריטים ולקוחות'),
(3, 'הזמנות'),
(4, 'מלאי ורכש'),
(5, 'מנהל ראשי!');

-- --------------------------------------------------------

--
-- Table structure for table `z_test`
--

CREATE TABLE `z_test` (
  `ok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `z_test`
--

INSERT INTO `z_test` (`ok`) VALUES
('ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemid`),
  ADD UNIQUE KEY `storage` (`storage`),
  ADD KEY `type` (`type`),
  ADD KEY `category` (`category`),
  ADD KEY `emphasize` (`emphasize`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`ai`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userpassport` (`userpassport`),
  ADD KEY `permission` (`permission`);

--
-- Indexes for table `zrel_category`
--
ALTER TABLE `zrel_category`
  ADD PRIMARY KEY (`itemcategory`);

--
-- Indexes for table `zrel_itempcs`
--
ALTER TABLE `zrel_itempcs`
  ADD PRIMARY KEY (`pcs`);

--
-- Indexes for table `zrel_itemtype`
--
ALTER TABLE `zrel_itemtype`
  ADD PRIMARY KEY (`itemtype`) USING BTREE;

--
-- Indexes for table `zrel_permission`
--
ALTER TABLE `zrel_permission`
  ADD PRIMARY KEY (`permission`);

--
-- Indexes for table `z_test`
--
ALTER TABLE `z_test`
  ADD PRIMARY KEY (`ok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120000195;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `ai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category`) REFERENCES `zrel_category` (`itemcategory`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`type`) REFERENCES `zrel_itemtype` (`itemtype`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`emphasize`) REFERENCES `zrel_itempcs` (`pcs`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `item` (`itemid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`permission`) REFERENCES `zrel_permission` (`permission`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
