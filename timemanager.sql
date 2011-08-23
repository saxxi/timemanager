-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 23 ago, 2011 at 09:22 AM
-- Versione MySQL: 5.1.54
-- Versione PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timemanager`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dump dei dati per la tabella `children`
--

INSERT INTO `children` (`id`, `name`) VALUES
(1, 'Molly'),
(2, 'Suzy'),
(3, 'Mary'),
(4, 'Daisy'),
(5, 'Jenny'),
(6, 'Giusy'),
(7, 'Mona'),
(8, 'Amy'),
(9, 'Becky'),
(10, 'Betsy'),
(11, 'Betty'),
(12, 'Cathy'),
(13, 'Cindy'),
(14, 'Debby'),
(15, 'Emily'),
(16, 'Jenny'),
(17, 'Patty'),
(18, 'Stacy');

-- --------------------------------------------------------

--
-- Struttura della tabella `educators`
--

CREATE TABLE IF NOT EXISTS `educators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `educators`
--

INSERT INTO `educators` (`id`, `name`, `email`) VALUES
(1, 'Dick', 'dick@example.com'),
(2, 'Rick', 'rick@example.com'),
(3, 'Joe', 'joe@example.com'),
(4, 'Tim', 'tim@example.com'),
(5, 'Zack', 'zack@example.com'),
(6, 'Tom', 'tom@example.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `txtactivities`
--

CREATE TABLE IF NOT EXISTS `txtactivities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `txtactivities`
--

INSERT INTO `txtactivities` (`id`, `desc`) VALUES
(1, 'Pranzo al sacco'),
(2, 'Visita al museo Bellanza'),
(3, 'Visita al museo Viennese'),
(4, 'Nuoto alla Piscina Sogese'),
(5, 'Brindisi con spumante'),
(6, 'Nuoto alla Piscina Vandelli'),
(7, 'Cannoni per tutti'),
(8, 'Cannoli per non dire Bomboloni');
