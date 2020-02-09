-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 01:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enyro`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartman`
--

DROP TABLE IF EXISTS `apartman`;
CREATE TABLE IF NOT EXISTS `apartman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kolicina` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `picture` text CHARACTER SET latin1 NOT NULL,
  `category` int(11) NOT NULL,
  `price` text CHARACTER SET latin1 DEFAULT NULL,
  `grad` int(11) NOT NULL,
  `uneo` int(11) DEFAULT NULL,
  `rezervisano` int(11) NOT NULL DEFAULT 0,
  `otkazano` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category`),
  KEY `fk_iz_grada` (`grad`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apartman`
--

INSERT INTO `apartman` (`id`, `kolicina`, `title`, `opis`, `date_entered`, `picture`, `category`, `price`, `grad`, `uneo`, `rezervisano`, `otkazano`) VALUES
(54, 'Dvosoban 90m2', 'A Blok', 'Izuzetan, nov stan u potpuno novoj zgradi unutar projekta A BLOK, biće okružena zelenilom i parkovima. Komforan, u potpunosti kvalitetno opremljen, dve spavaće sobe od kojih je jedna master sa sopstvenim kupatilom, dodatno kupatilo, pogled ka reci, cg po utrošku, hlađenje putem multi split sistema, zgrada sa lobijem, recepcijom i kurirom 24/7, pod video nadzorom, garažno mesto uračunato u cenu', '2020-02-09 01:07:15', 'slike/apartmani/original/948134865a-blok-savada-nov-lux-dvosobni-stan-5425635330592-71790198976.jpg', 0, '1500', 1, NULL, 1000, 150);

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

DROP TABLE IF EXISTS `drzava`;
CREATE TABLE IF NOT EXISTS `drzava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `geoSirina` decimal(7,5) NOT NULL,
  `geoDuzina` decimal(7,5) NOT NULL,
  `naziv` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`id`, `geoSirina`, `geoDuzina`, `naziv`) VALUES
(1, '44.81574', '21.47583', 'Srbija'),
(2, '34.81267', '10.45699', 'Bosna'),
(3, '45.80596', '22.47408', 'Hrvatska'),
(4, '44.77270', '20.47504', 'Austrija'),
(5, '44.81890', '20.45745', 'Internacional'),
(6, '7.75000', '2.18333', 'Benin'),
(7, '39.35000', '-9.11670', 'Portugal'),
(8, '20.51299', '99.99999', 'China'),
(9, '-10.59710', '99.99999', 'Indonesia'),
(10, '39.10000', '99.99999', 'China'),
(11, '3.58333', '-77.00000', 'Colombia'),
(12, '36.82091', '66.45921', 'Afghanistan'),
(13, '34.49376', '69.27427', 'Afghanistan'),
(14, '-6.18290', '99.99999', 'Indonesia'),
(15, '48.86670', '2.71670', 'France'),
(16, '43.36667', '25.13333', 'Bulgaria'),
(17, '-2.90054', '-79.00453', 'Ecuador'),
(18, '13.31676', '99.99999', 'Philippines'),
(19, '53.95017', '38.09801', 'Russia'),
(20, '-13.80044', '-99.99999', 'Samoa'),
(21, '40.93639', '68.76972', 'Uzbekistan'),
(22, '-7.73300', '99.99999', 'Indonesia'),
(23, '6.62944', '99.99999', 'Philippines'),
(24, '41.06013', '24.04724', 'Greece'),
(25, '6.58694', '99.99999', 'Philippines'),
(26, '6.51944', '99.99999', 'Philippines'),
(27, '54.17062', '18.54003', 'Poland'),
(28, '3.64333', '97.46279', 'Indonesia'),
(29, '49.84012', '13.35558', 'Czech Republic'),
(30, '46.86436', '87.71608', 'China'),
(31, '26.56378', '99.99999', 'China'),
(32, '1.20062', '31.80062', 'Uganda'),
(33, '41.63030', '-6.58740', 'Portugal'),
(34, '13.90401', '99.99999', 'Philippines'),
(35, '5.29622', '-75.88390', 'Colombia'),
(36, '11.38623', '12.71992', 'Nigeria'),
(37, '49.59146', '19.71119', 'Poland'),
(38, '34.30455', '99.99999', 'China'),
(39, '-8.24410', '99.99999', 'Indonesia'),
(40, '8.14540', '99.99999', 'Philippines'),
(41, '24.63578', '99.99999', 'China'),
(42, '13.76667', '-2.06667', 'Burkina Faso'),
(43, '10.18462', '99.99999', 'Vietnam'),
(44, '-18.38083', '-44.45639', 'Brazil'),
(45, '35.12861', '99.99999', 'Japan'),
(46, '29.21806', '99.99999', 'China'),
(47, '29.90478', '99.99999', 'China'),
(48, '46.58330', '0.33330', 'France'),
(49, '-8.60380', '99.99999', 'Indonesia'),
(50, '39.05000', '-9.05000', 'Portugal'),
(51, '29.09000', '99.99999', 'China'),
(52, '50.44910', '99.99999', 'China'),
(53, '35.32787', '25.14341', 'Greece'),
(54, '16.10280', '99.99999', 'Philippines'),
(55, '17.14860', '-96.81180', 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `gost`
--

DROP TABLE IF EXISTS `gost`;
CREATE TABLE IF NOT EXISTS `gost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `adresa` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `email` text CHARACTER SET latin1 DEFAULT NULL,
  `lozinka` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `datum_registracije` timestamp NULL DEFAULT current_timestamp(),
  `pol` int(11) DEFAULT NULL COMMENT '1-musko, 0-zensko',
  `nivo` int(11) NOT NULL DEFAULT 0,
  `drzava` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `emailJedinstven` (`email`) USING HASH,
  KEY `fk_drzava_porekla` (`drzava`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gost`
--

INSERT INTO `gost` (`id`, `ime`, `adresa`, `email`, `lozinka`, `datum_registracije`, `pol`, `nivo`, `drzava`) VALUES
(950, 'Ronald', '85154 Merchant Alley', 'rfergusonqd@wiley.com', 'CDh85jYgs', '2019-10-05 22:00:00', 0, 0, 1),
(953, 'Tammy', '3 Lillian Plaza', 'tbakerqg@istockphoto.com', 'A4TAg79', '2019-10-05 22:00:00', 1, 0, 1),
(955, 'Martha', '25243 Browning Terrace', 'mwilliamsqi@youtu.be', 't0fNuBInMvxh', '2019-10-05 22:00:00', 1, 1, 1),
(957, 'Nancy', '38 Forest Hill', 'ngardnerqk@mapquest.com', 'uOb5lhKz', '2019-10-05 22:00:00', 0, 0, 1),
(961, 'Patrick', '8638 Monterey Hill', 'psnyderqo@sohu.com', '1lm03DTZRNL8', '2019-10-05 22:00:00', 1, 0, 1),
(962, 'Linda', '602 Steensland Point', 'lfieldsqp@blogger.com', 'W17UvTQ', '2019-10-05 22:00:00', 1, 0, 1),
(966, 'Tammy', '7447 Lighthouse Bay Hill', 'twarrenqt@rakuten.co.jp', 'KmwahIwpn', '2019-10-05 22:00:00', 0, 0, 1),
(969, 'Lawrence', '0069 Dovetail Streett', 'lhowardqw@arstechnica.com', 'Ln8rtEhVGa', '2019-10-05 22:00:00', 1, 1, 1),
(970, 'Ruby', '22 Daystar Junction', 'rfloresqx@google.es', '2gJeoIqyp', '2019-10-05 22:00:00', 1, 1, 1),
(975, 'Randy', '014 Lukken Parkway', 'rallenr2@livejournal.com', 'HhDujEuK', '2019-10-05 22:00:00', 1, 1, 1),
(976, 'William', '18292 Homewood Parkway', 'wpricer3@icio.us', 'luRmBjh', '2019-10-05 22:00:00', 1, 1, 1),
(986, 'Phillip', '1935 Acker Alley', 'pshawrd@posterous.com', 'lmYrWGHj', '2019-10-05 22:00:00', 0, 1, 1),
(987, 'Russell', '07 Brentwood Park', 'rcarpenterre@moonfruit.com', 'zovrnWJB', '2019-10-05 22:00:00', 0, 0, 1),
(988, 'Matthew', '703 Vernon Way', 'mberryrf@comsenz.com', 'cBrTASMnQn', '2019-10-05 22:00:00', 0, 1, 1),
(989, 'Ruby', '8694 Sage Lane', 'rknightrg@state.gov', 'a5vo6EcC3Tu', '2019-10-05 22:00:00', 0, 1, 1),
(990, 'Sara', '42572 Darwin Terrace', 'sdavisrh@sohu.com', 'AgjM3IrS2T6k', '2019-10-05 22:00:00', 1, 1, 1),
(995, 'Stephen', '05 Hovde Lane', 'smorenorm@reddit.com', '3jTzRetR', '2019-10-05 22:00:00', 0, 0, 1),
(998, 'Samuel', '05089 Kedzie Circle', 'sperkinsrp@wikia.com', '9x3GV9A', '2019-10-05 22:00:00', 0, 1, 1),
(1000, 'Roy', '9 Warbler Point', 'rarmstrongrr@java.com', '9INLHvCXd', '2019-10-05 22:00:00', 0, 0, 1),
(1002, 'Milanovic', 'Blok BB', 'enyro@gmail.com', 'denyro', '2019-06-12 08:35:53', 1, 2, 1),
(1003, 'Dragan', 'Nedam BB', 'nyro@gmail.com', 'denyro', '2019-06-12 16:32:23', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
CREATE TABLE IF NOT EXISTS `grad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` text CHARACTER SET latin1 NOT NULL,
  `br_prodatih` int(11) NOT NULL,
  `broj_stanje` int(11) NOT NULL,
  `drzava` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_iz_drzave` (`drzava`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`, `br_prodatih`, `broj_stanje`, `drzava`) VALUES
(0, 'Beograd', 12, 23, 1),
(1, 'Novi sad', 15, 29, 1),
(2, 'Budva', 5, 29, 1),
(3, 'Sutomore', 51, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartman_id` int(11) DEFAULT NULL,
  `gost_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0,
  `broj_noci` int(11) NOT NULL DEFAULT 0,
  `check_in` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kupac` (`gost_id`),
  KEY `fk_artikal` (`apartman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `apartman_id`, `gost_id`, `date`, `status`, `broj_noci`, `check_in`) VALUES
(13, 54, 1002, '2020-02-09 00:53:16', 0, 2, '2020-02-25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartman`
--
ALTER TABLE `apartman`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `fk_iz_drzave` FOREIGN KEY (`grad`) REFERENCES `drzava` (`id`);

--
-- Constraints for table `gost`
--
ALTER TABLE `gost`
  ADD CONSTRAINT `fk_drzava` FOREIGN KEY (`drzava`) REFERENCES `drzava` (`id`),
  ADD CONSTRAINT `fk_drzava_porekla` FOREIGN KEY (`drzava`) REFERENCES `drzava` (`id`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `fk_artikal` FOREIGN KEY (`apartman_id`) REFERENCES `apartman` (`id`),
  ADD CONSTRAINT `fk_kupac` FOREIGN KEY (`gost_id`) REFERENCES `gost` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
