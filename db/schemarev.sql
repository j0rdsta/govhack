SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `suburb_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(256) NOT NULL,
  `review` text NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `rating` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
