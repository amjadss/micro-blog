# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: db.cs.dal.ca (MySQL 5.0.77)
# Database: amjad
# Generation Time: 2012-03-08 10:42:52 -0400
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table a3_user_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `a3_user_info`;

CREATE TABLE `a3_user_info` (
  `u_id` int(10) NOT NULL auto_increment,
  `username` varchar(55) default NULL,
  `email` varchar(55) default NULL,
  `pass` varchar(100) default NULL,
  `avatar` varchar(255) default 'uploads/default_avatar.jpg',
  `registration_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `a3_user_info` WRITE;
/*!40000 ALTER TABLE `a3_user_info` DISABLE KEYS */;

INSERT INTO `a3_user_info` (`u_id`, `username`, `email`, `pass`, `avatar`, `registration_date`)
VALUES
	(23,'Amjad Sulaimani','a@hotmail.com','44b89e773490130c063c0cc5b283d1aee320fa1a','uploads/69290979.png','2012-03-01 03:29:41'),
	(28,'mazen','b@hotmail.com','91ad00ef83773ef71a0c81d04f81968fc904a81e','uploads/pic.png','2012-03-01 04:13:02');

/*!40000 ALTER TABLE `a3_user_info` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
