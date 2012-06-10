-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2011 at 01:38 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erponlinebd_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_charts`
--

CREATE TABLE IF NOT EXISTS `ac_charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `code` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `memo` text NOT NULL,
  `type` enum('debit','credit') NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ac_charts`
--

INSERT INTO `ac_charts` (`id`, `user_id`, `parent_id`, `code`, `name`, `memo`, `type`, `edate`) VALUES
(1, 15, 0, '10000', 'Assets', '', 'credit', '2011-08-10 19:46:18'),
(2, 15, 0, '20000', 'Liability', '', 'debit', '2011-08-10 19:50:14'),
(3, 15, 0, '30000', 'Equity', '', 'credit', '2011-08-10 19:57:28'),
(4, 15, 0, '40000', 'Revenue', '', 'credit', '2011-08-10 19:58:22'),
(5, 15, 0, '50000', 'Cost of Goods sold', '', 'debit', '2011-08-10 19:58:47'),
(6, 15, 0, '60000', 'Expense', '', 'debit', '2011-08-10 19:59:18'),
(7, 15, 1, '11000', 'Cash on Hand', '', 'credit', '2011-08-10 20:01:03'),
(8, 15, 7, '11010', 'Petty Cash', '', 'credit', '2011-08-10 20:01:54'),
(9, 15, 7, '11020', 'Cash in Registers', '', 'credit', '2011-08-10 20:15:58'),
(10, 15, 7, '11030', 'Savings Account', '', 'credit', '2011-08-10 20:21:21'),
(11, 15, 7, '11050', 'Accounts Receivable', '', 'credit', '2011-08-10 20:21:40'),
(12, 15, 1, '12000', 'Prepaid Expenses', '', 'credit', '2011-08-10 20:22:29'),
(13, 15, 12, '12010', 'Rent', '', 'credit', '2011-08-10 20:22:48'),
(14, 15, 1, '13000', 'Fixed Assets', '', 'credit', '2011-08-10 20:23:25'),
(15, 15, 14, '13010', 'Land', '', 'credit', '2011-08-10 20:23:50'),
(16, 15, 14, '13020', 'Building', '', 'credit', '2011-08-10 20:24:29'),
(17, 15, 14, '13030', 'Equipment', '', 'credit', '2011-08-10 20:24:52'),
(18, 15, 14, '13040', 'Furniture & Fixtures', '', 'credit', '2011-08-10 20:25:22'),
(19, 15, 14, '13050', 'Vehicles', '', 'credit', '2011-08-10 20:25:39'),
(20, 15, 1, '14000', 'Other Assets', '', 'credit', '2011-08-10 20:26:13'),
(21, 15, 20, '14010', 'Employee Advances', '', 'credit', '2011-08-10 20:35:15'),
(22, 15, 20, '14020', 'Security Deposits', '', 'credit', '2011-08-10 20:35:32'),
(23, 15, 2, '21000', 'Current Liabilities', '', 'debit', '2011-08-10 20:36:20'),
(24, 15, 23, '21010', 'Commissions Payable', '', 'debit', '2011-08-10 20:37:10'),
(25, 15, 23, '21020', 'Value Added Tax Payable', '', 'debit', '2011-08-10 20:37:30'),
(26, 15, 2, '22000', 'Wages and Salaries', '', 'debit', '2011-08-10 20:38:28'),
(27, 15, 26, '22010', 'Accrued Wages', '', 'debit', '2011-08-10 20:42:28'),
(28, 15, 26, '22020', 'Commissions', '', 'debit', '2011-08-10 20:42:48'),
(29, 15, 26, '22030', 'Employee Benefits Payable', '', 'debit', '2011-08-10 20:49:42'),
(30, 15, 2, '23000', 'Long Term Liabilities', '', 'debit', '2011-08-10 20:50:56'),
(31, 15, 30, '23010', 'Property Mortgage', '', 'debit', '2011-08-10 20:51:23'),
(32, 15, 30, '23020', 'Business Loans', '', 'debit', '2011-08-10 20:51:58'),
(33, 15, 30, '23030', 'Vehicle Loans', '', 'debit', '2011-08-10 20:52:18'),
(34, 15, 3, '31000', 'Capital', '', 'credit', '2011-08-10 22:16:46'),
(35, 15, 3, '32000', 'Drawing', '', 'credit', '2011-08-10 22:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `ac_credit_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_credit_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_credit_voucher_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_credit_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_credit_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_credit_voucher_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_debit_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_debit_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_debit_voucher_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_debit_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_debit_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_debit_voucher_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_journal_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_journal_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ac_journal_voucher_details`
--

INSERT INTO `ac_journal_voucher_details` (`id`, `user_id`, `voucher_no`, `chart_id`, `debit`, `credit`, `edate`) VALUES
(1, 15, 1001, 8, 5000, 0, '2011-08-11 09:29:26'),
(2, 15, 1001, 24, 0, 5000, '2011-08-11 09:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `ac_journal_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_journal_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ac_journal_voucher_master`
--

INSERT INTO `ac_journal_voucher_master` (`id`, `user_id`, `voucher_no`, `voucher_date`, `emp_id`, `memo`, `edate`) VALUES
(1, 15, 1001, '2011-08-11', 1, '', '2011-08-11 09:29:09'),
(2, 15, 1002, '2011-08-11', 2, '', '2011-08-11 13:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `code` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `company_id`, `user_id`, `parent_id`, `name`, `code`, `edate`) VALUES
(1, 17, 15, 0, 'Soap', '1001', '2011-05-25'),
(2, 17, 15, 0, 'Oil', '1002', '2011-05-25'),
(3, 17, 15, 0, 'evan', '1234560', '2011-06-01'),
(4, 17, 15, 0, 'check', '12321', '2011-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=18 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company`, `edate`) VALUES
(1, 'InnovativeBD', '2010-04-15'),
(17, 'Fusion', '2010-05-02'),
(16, 'Fusion', '2010-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `notes` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_id`, `user_id`, `title`, `first_name`, `last_name`, `address1`, `address2`, `city`, `zip`, `country`, `phone`, `email`, `notes`, `edate`) VALUES
(1, 17, 15, 'Mr.', 'Moinuddin', 'Didar', '705', 'Sohidbagh', 'Dhaka', '1217', 'Bangladesh', '01677336699', 'didar@innovativebd.biz', 'This is a test edited', '2011-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `emp_code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `join` date NOT NULL,
  `address` text NOT NULL,
  `level` varchar(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `user_id`, `emp_code`, `name`, `dob`, `join`, `address`, `level`, `area`, `edate`) VALUES
(1, 15, '', 'Md. Moinuddin Didar', '1985-06-15', '2000-06-15', '8/5, Jigatola', 'RSM', 'Dhaka', '2011-06-20'),
(2, 15, '', 'Tapan Kumer das', '1985-06-15', '2000-06-15', '8/3, Segun Bagichs', 'SM', 'Dhaka', '2011-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `re_order` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=10 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `company_id`, `user_id`, `category_id`, `code`, `name`, `description`, `purchase_price`, `sale_price`, `re_order`, `edate`) VALUES
(1, 17, 15, 1, '111', 'Lux', 'Lux 100gm Soap', 10, 12, 10, '2011-05-26'),
(2, 17, 15, 2, '110', 'Rup Chada 1 Lt.', 'Soyabin Oil 1Lt.', 100, 108, 15, '2011-05-29'),
(3, 17, 15, 3, '654321', 'special cigarate', 'ldkjfakldsj', 10, 12, 50, '2011-06-01'),
(4, 17, 15, 1, '543', 'just a check', 'hi this is check', 34, 54, 50, '2011-06-08'),
(5, 17, 15, 1, '9789', 'another check', 'dasklfjal', 34, 54, 30, '2011-06-08'),
(6, 17, 15, 1, '9789', 'another check', 'dasklfjal', 34, 54, 30, '2011-06-08'),
(7, 17, 15, 1, '987', 'right now', 'hadsfklj', 54, 45, 333, '2011-06-08'),
(8, 17, 15, 2, '4531', 'adsfa', 'dsafadsf', 98, 67, 43, '2011-06-17'),
(9, 17, 15, 2, '1010101', 'check', 'dsklfadslkj', 10, 12, 10, '2011-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `receive_items`
--

CREATE TABLE IF NOT EXISTS `receive_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `receive_items`
--

INSERT INTO `receive_items` (`id`, `company_id`, `user_id`, `supplier_id`, `category_id`, `item_id`, `item_code`, `quantity`, `unit_price`, `edate`) VALUES
(1, 17, 15, 1, 1, 1, '111', 100, 10, '2011-06-04'),
(2, 17, 15, 2, 1, 2, '110', 200, 100, '2011-06-04'),
(3, 17, 15, 2, 1, 3, '654321', 300, 10, '2011-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE IF NOT EXISTS `return_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `return_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `return_master`
--

CREATE TABLE IF NOT EXISTS `return_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `return_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `company_id`, `user_id`, `sales_id`, `item_id`, `item_code`, `quantity`, `unit_price`, `total_price`, `edate`) VALUES
(1, 17, 15, 1, 2, '110', 20, 108, 2160, '2011-06-04'),
(2, 17, 15, 1, 3, '654321', 50, 12, 600, '2011-06-04'),
(3, 17, 15, 1, 1, '111', 40, 12, 480, '2011-06-05'),
(4, 17, 15, 2, 1, '111', 100, 12, 1200, '2011-06-08'),
(5, 17, 15, 3, 1, '111', 50, 12, 600, '2011-06-08'),
(6, 17, 15, 4, 2, '110', 100, 108, 10800, '2011-06-08'),
(7, 17, 15, 5, 1, '111', 50, 12, 600, '2011-06-08'),
(8, 17, 15, 6, 1, '111', 100, 12, 1200, '2011-06-08'),
(9, 17, 15, 6, 7, '987', 54, 45, 2430, '2011-06-08'),
(10, 17, 15, 7, 4, '543', 100, 54, 5400, '2011-06-11'),
(11, 17, 15, 8, 3, '654321', 65, 12, 780, '2011-06-16'),
(12, 17, 15, 8, 6, '9789', 2, 54, 108, '2011-06-16'),
(13, 17, 15, 9, 1, '111', 32, 12, 384, '2011-06-16'),
(15, 17, 15, 11, 6, '9789', 34, 54, 1836, '2011-06-17'),
(16, 17, 15, 12, 1, '111', 55, 12, 660, '2011-06-17'),
(17, 17, 15, 13, 1, '111', 1, 12, 12, '2011-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `sales_master`
--

CREATE TABLE IF NOT EXISTS `sales_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sales_master`
--

INSERT INTO `sales_master` (`id`, `company_id`, `user_id`, `customer_id`, `edate`) VALUES
(1, 17, 15, 1, '2011-06-04'),
(2, 17, 15, 0, '2011-06-08'),
(3, 17, 15, 0, '2011-06-08'),
(4, 17, 15, 0, '2011-06-08'),
(5, 17, 15, 0, '2011-06-08'),
(6, 17, 15, 0, '2011-06-08'),
(7, 17, 15, 0, '2011-06-11'),
(8, 17, 15, 1, '2011-06-16'),
(9, 17, 15, 0, '2011-06-16'),
(10, 17, 15, 0, '2011-06-16'),
(11, 17, 15, 1, '2011-06-17'),
(12, 17, 15, 0, '2011-06-17'),
(13, 17, 15, 1, '2011-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_id`, `user_id`, `first_name`, `last_name`, `email`, `edate`) VALUES
(1, 17, 15, 'Tapan', 'Kumer Das', 'tapan29bd@gmail.com', '2011-05-25'),
(2, 17, 15, 'evan', 'ahamad', 'evan_ahamad@hotmail.com', '2011-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `type` varchar(8) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `code` varchar(32) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `user_id`, `email`, `password`, `full_name`, `type`, `status`, `code`, `edate`) VALUES
(15, 17, 15, 'tapan29bd@gmail.com', 'd033e22ae348aeb5', 'Tapan', 'admin', 'active', '', '2010-05-03'),
(21, 17, 15, 'moinuddindider@gmail.com', 'd033e22ae348aeb5', 'Moinuddin Dider', 'admin', 'active', '', '2011-06-17');
