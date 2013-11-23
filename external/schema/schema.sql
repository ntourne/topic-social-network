
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `topic_users`;
CREATE TABLE IF NOT EXISTS `topic_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(20) NOT NULL DEFAULT '',
  `fullname` varchar(40) NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO topic_users VALUES (null, 'demo', 'nicotourne@gmail.com', 'Nicolas Tourne', 'fe01ce2a7fbac8fafaed7c982a04e229', 1331203920);

DROP TABLE IF EXISTS `topic_topics`;
CREATE TABLE IF NOT EXISTS `topic_topics` (
  `topic_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(50) NOT NULL DEFAULT '',
  `topic_desc` varchar(400) NULL DEFAULT '',
  `user_id` int(11) NOT NULL,						/* User who creates the Topic. FK: topic_users.user_id */
  `cat_slug` varchar(20) NULL DEFAULT '',
  `comments_count` int(5) NOT NULL DEFAULT '0',
  `followers_count` int(5) NOT NULL DEFAULT '0',  
  `created_on` int(11) NOT NULL,
  `ends_on` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `topic_comments`;
CREATE TABLE IF NOT EXISTS `topic_comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,						/* FK: topic_topics.topic_id */
  `user_id` int(11) NOT NULL,						/* FK: topic_users.user_id */
  `text` varchar(500) NOT NULL DEFAULT '',
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `topic_categories`;
CREATE TABLE IF NOT EXISTS `topic_categories` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL DEFAULT '',
  `cat_slug` varchar(20) NOT NULL DEFAULT '',
  `cat_desc` varchar(200) NULL DEFAULT '',
  PRIMARY KEY (`cat_id`),
  UNIQUE (`cat_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `topic_categories` values(null, 'Sports', 'sports', '');
INSERT INTO `topic_categories` values(null, 'Technology', 'technology', '');
INSERT INTO `topic_categories` values(null, 'News', 'news', '');
INSERT INTO `topic_categories` values(null, 'Politics', 'politics', '');
INSERT INTO `topic_categories` values(null, 'Entertainment', 'entertainment', '');

DROP TABLE IF EXISTS `topic_follow`;
CREATE TABLE IF NOT EXISTS `topic_follow` (
  `follow_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,						/* FK: topic_topics.topic_id */
  `user_id` int(11) NOT NULL,						/* FK: topic_users.user_id */
  PRIMARY KEY (`follow_id`),
  UNIQUE(`topic_id`, `user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;