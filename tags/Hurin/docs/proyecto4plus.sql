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

/*Table structure for table `content_pages` */

DROP TABLE IF EXISTS `content_pages`;

CREATE TABLE `content_pages` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `page` int(6) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_content_pages` (`page`),
  CONSTRAINT `FK_content_pages` FOREIGN KEY (`page`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `content_pages` */

insert  into `content_pages`(id,content,title,page,position) values (1,'Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per.\r\n\r\nIus id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei.\r\n\r\nBlandit incorrupte quaerendum in quo, nibh impedit id vis, vel no nullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus phaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus oratio ea mel, offendit persequeris ei vim. Eos dicat oratio partem ut, id cum ignota senserit intellegat. Sit inani ubique graecis ad, quando graecis liberavisse et cum, dicit option eruditi at duo. Homero salutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed, nobis feugiat similique usu ex.\r\n','<h2>Titulo de Prueba</h2>',1,'principal'),(2,'<ul>\r\n<li><a>enlace1</a></li>\r\n<li><a>enlace2</a></li>\r\n</ul>\r\n','<h3>Destacados</h3>',1,'contenido-izq'),(3,'<img src=\"/assets/imgcol1.jpg\" width=\"220\" height=\"140\" alt=\"imagen col1\">\r\n<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>\r\n','<h2>Columna 1</h2>',1,'col1'),(4,'<img src=\"/assets/imgcol2.jpg\" width=\"220\" height=\"140\" alt=\"imagen col2\">\r\n<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>			\r\n','<h2>Columna 2</h2>',1,'col2'),(5,'				<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. </p>','<h2>Columna 3</h2>',1,'col3');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pages` */

insert  into `pages`(id,name) values (1,'home');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `date` datetime DEFAULT NULL,
  `author` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabla generica para la publicacion de contenidos';

/*Data for the table `posts` */

insert  into `posts`(id,content,date,author) values (1,'Contenido del post 1','2011-05-03 13:38:40',1),(2,'Contenido del post 2','2011-05-04 13:39:01',1),(3,'Contenido del post 3','2011-05-05 13:39:01',1),(4,'Contenido del post 4','2011-05-06 13:39:01',1),(5,'Contenido del post 5','2011-05-07 13:39:01',1),(6,'Contenido del post 6','2011-05-08 13:39:01',1),(7,'Contenido del post 7','2011-05-08 13:39:01',1),(8,'Contenido del post 8','2011-05-09 13:39:01',1),(9,'Contenido del post 9','2011-05-09 13:39:01',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
