/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.1.54-1ubuntu4 : Database - proyecto4plus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto4plus` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `proyecto4plus`;

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `date` datetime DEFAULT NULL,
  `author` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla generica para la publicacion de contenidos';

/*Data for the table `posts` */

insert  into `posts`(id,content,date,author) values (1,'Contenido del post 1','2011-05-03 13:38:40',1),(2,'Contenido del post 2','2011-05-04 13:39:01',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
