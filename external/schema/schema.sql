
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



CREATE TABLE IF NOT EXISTS `topic_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `fullname` varchar(40) NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO topic_users VALUES (null, 'demo', 'Nicolas Tourne', 'fe01ce2a7fbac8fafaed7c982a04e229', 1331203920);


CREATE TABLE IF NOT EXISTS `topic_topics` (
  `topic_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(50) NOT NULL DEFAULT '',
  `topic_desc` varchar(400) NULL DEFAULT '',
  `user_id` int(11) NOT NULL,						/* User who creates the Topic. FK: topic_users.user_id */
  `cat_id` int(11) NOT NULL,						/* Category which topic belongs. FK: topic_categories.cat_id */
  `comments_count` int(5) NOT NULL DEFAULT '0',
  `followers_count` int(5) NOT NULL DEFAULT '0',  
  `created_on` int(11) NOT NULL,
  `ends_on` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `topic_comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,						/* FK: topic_topics.topic_id */
  `user_id` int(11) NOT NULL,						/* FK: topic_users.user_id */
  `text` varchar(500) NOT NULL DEFAULT '',
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `topic_categories` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL DEFAULT '',
  `cat_desc` varchar(200) NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `topic_categories` values(null, 'Sports', '');
INSERT INTO `topic_categories` values(null, 'Technology', '');
INSERT INTO `topic_categories` values(null, 'News', '');
INSERT INTO `topic_categories` values(null, 'Policy', '');


CREATE TABLE IF NOT EXISTS `topic_follow` (
  `follow_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,						/* FK: topic_topics.topic_id */
  `user_id` int(11) NOT NULL,						/* FK: topic_users.user_id */
  PRIMARY KEY (`follow_id`),
  UNIQUE(`topic_id`, `user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;