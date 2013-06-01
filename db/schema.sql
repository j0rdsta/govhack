SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `data_crime` (
  `crime_id` int(11) NOT NULL AUTO_INCREMENT,
  `suburb_name` varchar(50) NOT NULL,
  `crime` varchar(25) NOT NULL,
  `count` int(11) unsigned NOT NULL,
  `year` int(11) unsigned NOT NULL,
  PRIMARY KEY (`crime_id`),
  KEY `crime` (`crime`),
  KEY `suburb_name` (`suburb_name`),
  KEY `year` (`year`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6201 ;

CREATE TABLE `data_population` (
  `population_id` int(11) NOT NULL AUTO_INCREMENT,
  `suburb_name` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `population` int(20) unsigned NOT NULL,
  `year` int(11) unsigned NOT NULL,
  PRIMARY KEY (`population_id`),
  KEY `suburb_name` (`suburb_name`),
  KEY `year` (`year`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=606 ;

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `suburb_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `rating` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `suburbs` (
  `suburb_id` int(10) unsigned NOT NULL,
  `suburb_name` varchar(50) NOT NULL,
  `latitude` decimal(11,7) NOT NULL,
  `longitude` decimal(11,7) NOT NULL,
  `crime_total` int(10) unsigned NOT NULL,
  `crime_percentile` float NOT NULL,
  `crime_ranking` int(10) unsigned NOT NULL,
  `crime_growth` float NOT NULL,
  `population_total` int(10) unsigned NOT NULL,
  `population_percentile` float NOT NULL,
  `population_ranking` int(10) unsigned NOT NULL,
  `population_growth` float NOT NULL,
  PRIMARY KEY (`suburb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;