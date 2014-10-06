-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2014 at 08:31 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radius`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$2/6KXwB6k4bvxhEzJ9Do.OEn1oqQT943Vrv7IzMs9gYkf6i/zgRX6', '2014-04-05 00:00:00', '2014-04-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE IF NOT EXISTS `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nas`
--

INSERT INTO `nas` (`id`, `nasname`, `shortname`, `type`, `ports`, `secret`, `server`, `community`, `description`) VALUES
(2, '192.168.2.1', 'mikrotik', 'other', 1813, '123', NULL, NULL, 'RADIUS Client');

-- --------------------------------------------------------

--
-- Table structure for table `radacct`
--

CREATE TABLE IF NOT EXISTS `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) DEFAULT NULL,
  `acctstopdelay` int(12) DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctuniqueid` (`acctuniqueid`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `radacct`
--

INSERT INTO `radacct` (`radacctid`, `acctsessionid`, `acctuniqueid`, `username`, `groupname`, `realm`, `nasipaddress`, `nasportid`, `nasporttype`, `acctstarttime`, `acctstoptime`, `acctsessiontime`, `acctauthentic`, `connectinfo_start`, `connectinfo_stop`, `acctinputoctets`, `acctoutputoctets`, `calledstationid`, `callingstationid`, `acctterminatecause`, `servicetype`, `framedprotocol`, `framedipaddress`, `acctstartdelay`, `acctstopdelay`, `xascendsessionsvrkey`) VALUES
(1, '80600016', '7f332442f8497d13', 'reka', '', '', '192.168.2.1', '2153775126', 'Wireless-802.11', '2014-04-05 03:42:40', '2014-04-05 03:57:47', 906, '', '', '', 361956, 2253428, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(2, '80600017', '385b4d2e93283a70', 'reka', '', '', '192.168.2.1', '2153775127', 'Wireless-802.11', '2014-04-05 03:58:35', '2014-04-05 03:58:47', 13, '', '', '', 46363, 305668, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(3, '80600018', '56048b0d8c4719a2', 'reka', '', '', '192.168.2.1', '2153775128', 'Wireless-802.11', '2014-04-05 04:03:03', '2014-04-05 04:03:15', 12, '', '', '', 44854, 165601, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(4, '80600019', '14c0f3cc72cb8c53', 'reka', '', '', '192.168.2.1', '2153775129', 'Wireless-802.11', '2014-04-05 04:05:41', '2014-04-05 04:14:38', 537, '', '', '', 135459, 2747924, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(5, '8060001a', 'c2e756d62296bb36', 'reka', '', '', '192.168.2.1', '2153775130', 'Wireless-802.11', '2014-04-05 05:58:40', '2014-04-05 06:15:57', 1037, '', '', '', 257190, 1539657, 'hotspot1', '10:78:D2:95:B7:C2', 'Lost-Service', '', '', '192.168.5.254', 0, 0, ''),
(6, '8060001b', '59894493529a5f8c', 'reka', '', '', '192.168.2.1', '2153775131', 'Wireless-802.11', '2014-04-05 06:19:04', '2014-04-05 06:29:20', 616, '', '', '', 93792, 1656205, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(7, '8060001d', 'a48f646eb7cd8a8b', 'reka', '', '', '192.168.2.1', '2153775133', 'Wireless-802.11', '2014-04-05 08:12:16', '2014-04-05 08:12:35', 19, '', '', '', 78228, 498745, 'hotspot1', '10:78:D2:95:B7:C2', 'Admin-Reset', '', '', '192.168.5.254', 0, 0, ''),
(8, '8060001e', '9f21b424d572fe82', 'reka', '', '', '192.168.2.1', '2153775134', 'Wireless-802.11', '2014-04-05 08:21:05', '2014-04-05 08:41:37', 1233, '', '', '', 258610, 1246314, 'hotspot1', '10:78:D2:95:B7:C2', 'Lost-Service', '', '', '192.168.5.254', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `radcheck`
--

CREATE TABLE IF NOT EXISTS `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `radcheck`
--

INSERT INTO `radcheck` (`id`, `username`, `attribute`, `op`, `value`) VALUES
(2, 'reka', 'User-Password', '==', 'reka');

-- --------------------------------------------------------

--
-- Table structure for table `radgroupcheck`
--

CREATE TABLE IF NOT EXISTS `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radgroupreply`
--

CREATE TABLE IF NOT EXISTS `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `radgroupreply`
--

INSERT INTO `radgroupreply` (`id`, `groupname`, `attribute`, `op`, `value`) VALUES
(1, 'kusus', 'Mikrotik-Rate-Limit', '==', '512k/512k'),
(2, 'kusus', 'Simultaneous-Use', '==', '1'),
(3, 'siswa', 'Mikrotik-Rate-Limit', '==', '512k/512k'),
(4, 'siswa', 'Simultaneous-Use', '==', '1');

-- --------------------------------------------------------

--
-- Table structure for table `radpostauth`
--

CREATE TABLE IF NOT EXISTS `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radreply`
--

CREATE TABLE IF NOT EXISTS `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radusergroup`
--

CREATE TABLE IF NOT EXISTS `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `radusergroup`
--

INSERT INTO `radusergroup` (`username`, `groupname`, `priority`) VALUES
('reka', 'kusus', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
