-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 11 Okt 2014 pada 06.46
-- Versi Server: 5.5.36-MariaDB-1
-- Versi PHP: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `radius`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nas`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `nas`
--

INSERT INTO `nas` (`id`, `nasname`, `shortname`, `type`, `ports`, `secret`, `server`, `community`, `description`) VALUES
(2, '192.168.2.1', 'mikrotik', 'other', 1813, '123', NULL, NULL, 'RADIUS Client'),
(3, '192.168.2.100', 'ubuntu', 'other', 1813, 'rahasia123', NULL, NULL, 'RADIUS Client');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radacct`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `radacct`
--

INSERT INTO `radacct` (`radacctid`, `acctsessionid`, `acctuniqueid`, `username`, `groupname`, `realm`, `nasipaddress`, `nasportid`, `nasporttype`, `acctstarttime`, `acctstoptime`, `acctsessiontime`, `acctauthentic`, `connectinfo_start`, `connectinfo_stop`, `acctinputoctets`, `acctoutputoctets`, `calledstationid`, `callingstationid`, `acctterminatecause`, `servicetype`, `framedprotocol`, `framedipaddress`, `acctstartdelay`, `acctstopdelay`, `xascendsessionsvrkey`) VALUES
(38, '80600013', '2fb7768b361d8b5e', 'reka', '', '', '192.168.2.1', '2153775123', 'Wireless-802.11', '2014-10-07 01:02:03', '2014-10-07 01:11:56', 593, '', '', '', 12531, 322610, 'hotspot1', '00:1D:72:3A:9E:E6', 'Admin-Reset', '', '', '192.168.100.254', 0, 0, ''),
(39, '80600014', 'fb4e2c559c374131', 'reka', '', '', '192.168.2.1', '2153775124', 'Wireless-802.11', '2014-10-07 01:12:14', '2014-10-07 01:38:15', 1561, '', '', '', 3255592, 19020730, 'hotspot1', '00:1D:72:3A:9E:E6', 'Lost-Service', '', '', '192.168.100.254', 0, 0, ''),
(40, '80600016', '7f332442f8497d13', 'reka', '', '', '192.168.2.1', '2153775126', 'Wireless-802.11', '2014-10-07 01:45:00', '2014-10-07 02:23:58', 2339, '', '', '', 35047998, 2368892951, 'hotspot1', '10:BF:48:36:FF:50', 'Admin-Reset', '', '', '192.168.100.253', 0, 0, ''),
(41, '80600017', '385b4d2e93283a70', 'reka', '', '', '192.168.2.1', '2153775127', 'Wireless-802.11', '2014-10-07 02:24:14', '2014-10-07 02:36:50', 756, '', '', '', 18266774, 2382116665, 'hotspot1', '10:BF:48:36:FF:50', 'Lost-Service', '', '', '192.168.100.253', 0, 0, ''),
(42, '80600018', '56048b0d8c4719a2', 'reka', '', '', '192.168.2.1', '2153775128', 'Wireless-802.11', '2014-10-07 03:23:33', '2014-10-07 04:55:05', 5492, '', '', '', 28544838, 1673847560, 'hotspot1', '10:BF:48:36:FF:50', 'Lost-Service', '', '', '192.168.100.253', 0, 0, ''),
(43, '80600019', '14c0f3cc72cb8c53', 'reka', '', '', '192.168.2.1', '2153775129', 'Wireless-802.11', '2014-10-07 04:59:40', '2014-10-07 05:00:16', 36, '', '', '', 125475, 676262, 'hotspot1', '10:BF:48:36:FF:50', 'Admin-Reset', '', '', '192.168.100.253', 0, 0, ''),
(44, '8060001f', 'f268e0bcfd5d8cb0', 'reka', '', '', '192.168.2.1', '2153775135', 'Wireless-802.11', '2014-10-07 05:09:53', '2014-10-07 05:18:16', 503, '', '', '', 1994792, 102309891, 'hotspot1', '10:BF:48:36:FF:50', 'Admin-Reset', '', '', '192.168.100.253', 0, 0, ''),
(45, '80600020', '6a3c680e98b8fab3', 'reka', '', '', '192.168.2.1', '2153775136', 'Wireless-802.11', '2014-10-07 05:18:35', '2014-10-07 07:20:30', 7315, '', '', '', 1924475, 63241302, 'hotspot1', '10:BF:48:36:FF:50', 'Lost-Service', '', '', '192.168.100.253', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radcheck`
--

CREATE TABLE IF NOT EXISTS `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `radcheck`
--

INSERT INTO `radcheck` (`id`, `username`, `attribute`, `op`, `value`) VALUES
(2, 'reka', 'Cleartext-Password', ':=', 'reka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radgroupcheck`
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
-- Struktur dari tabel `radgroupreply`
--

CREATE TABLE IF NOT EXISTS `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `radgroupreply`
--

INSERT INTO `radgroupreply` (`id`, `groupname`, `attribute`, `op`, `value`) VALUES
(1, 'kusus', 'Mikrotik-Rate-Limit', '==', '0/0'),
(2, 'kusus', 'Simultaneous-Use', '==', '1'),
(5, 'guru', 'Mikrotik-Rate-Limit', '==', '1024k/1024k'),
(6, 'guru', 'Simultaneous-Use', '==', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radpostauth`
--

CREATE TABLE IF NOT EXISTS `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `radpostauth`
--

INSERT INTO `radpostauth` (`id`, `username`, `pass`, `reply`, `authdate`) VALUES
(1, 'reka', 'reka', 'Access-Accept', '2014-04-21 02:32:59'),
(2, 'reka', 'reka', 'Access-Accept', '2014-04-21 02:41:20'),
(3, 'reka', 'reka', 'Access-Accept', '2014-04-21 07:33:58'),
(4, 'paijo', 'paijo', 'Access-Accept', '2014-04-21 07:34:45'),
(5, 'reka', '0xbd51d20b12fdf0f5b8fbd638bb97a1bc0c', 'Access-Accept', '2014-04-21 07:35:36'),
(6, 'reka', '0x42291def99643434ff4e4ae48bc83f1cd8', 'Access-Accept', '2014-04-21 07:41:10'),
(7, 'paijo', '0x1ebb69156c38be8224bb3151b5d93081d3', 'Access-Accept', '2014-04-21 07:43:14'),
(8, 'paijo', '0x6892e8ce0eee09c255819aeca2b6207e6d', 'Access-Accept', '2014-04-21 07:45:29'),
(9, 'reka', '0xf095d07b634c9d16beb900b4acb5696b41', 'Access-Accept', '2014-04-21 07:46:15'),
(10, 'reka', '0x902513f59ff6fbc290d6bcd8a1e06fcef6', 'Access-Accept', '2014-04-21 07:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `radreply`
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
-- Struktur dari tabel `radusergroup`
--

CREATE TABLE IF NOT EXISTS `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `radusergroup`
--

INSERT INTO `radusergroup` (`username`, `groupname`, `priority`) VALUES
('reka', 'kusus', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
