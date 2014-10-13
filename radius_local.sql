-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 11 Okt 2014 pada 14.49
-- Versi Server: 5.5.38-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.4

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
-- Struktur dari tabel `mst_users`
--

CREATE TABLE IF NOT EXISTS `mst_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `mst_users`
--

INSERT INTO `mst_users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$2/6KXwB6k4bvxhEzJ9Do.OEn1oqQT943Vrv7IzMs9gYkf6i/zgRX6', 'nNyhPJaZTgWfy7UaWbqnV8q44boYEGeyqnO7rY3Ganm4EAqp4OJTPfObaiJq', '2014-04-05 00:00:00', '2014-10-07 02:47:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
