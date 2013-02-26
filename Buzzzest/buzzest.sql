/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.1.30-community : Database - buzzzest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`buzzzest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `buzzzest`;

/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `ANSID` int(11) NOT NULL AUTO_INCREMENT,
  `QID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  `ANSWER` text,
  `ADATE` date DEFAULT NULL,
  `ATIME` datetime NOT NULL,
  `ASTATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ANSID`),
  KEY `QID` (`QID`),
  KEY `UID` (`UID`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`QID`) REFERENCES `querstions` (`QID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `answers` */

insert  into `answers`(`ANSID`,`QID`,`UID`,`ANSWER`,`ADATE`,`ATIME`,`ASTATUS`) values (1,3,11,'testing!!! ','2012-11-07','2012-11-07 12:16:51',1),(2,3,11,'testing ','2012-11-07','2012-11-07 12:18:01',1),(3,5,11,'hfghfgh','2012-11-10','2012-11-10 11:44:34',1),(4,5,11,' rtyryt','2012-11-10','2012-11-10 11:44:43',1);

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `BLID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `BLTEXT` text,
  `BLDATE` date DEFAULT NULL,
  `BLTIME` datetime DEFAULT NULL,
  `BLSTATUS` int(11) DEFAULT NULL,
  `CATID` int(11) DEFAULT NULL,
  `BLTITLE` varchar(500) DEFAULT NULL,
  `BLSUMMARY` text,
  PRIMARY KEY (`BLID`),
  KEY `UID` (`UID`),
  KEY `FK_blog` (`CATID`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  CONSTRAINT `FK_blog` FOREIGN KEY (`CATID`) REFERENCES `category` (`CATID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `blog` */

insert  into `blog`(`BLID`,`UID`,`BLTEXT`,`BLDATE`,`BLTIME`,`BLSTATUS`,`CATID`,`BLTITLE`,`BLSUMMARY`) values (1,1,'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum','2012-11-05','2012-11-05 12:13:12',1,1,'lorem ipsum','lorem ipsumlorem ipsumlorem ipsumlorem ipsum'),(3,11,'asd','2012-11-09','2012-11-09 17:58:45',1,1,'sad','ads'),(4,11,'fdsfds','2012-11-09','2012-11-09 17:59:06',1,2,'sdffsd','sdffds');

/*Table structure for table `blog_comments` */

DROP TABLE IF EXISTS `blog_comments`;

CREATE TABLE `blog_comments` (
  `BLCMTID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `BLCDATE` date DEFAULT NULL,
  `BLCTIME` datetime NOT NULL,
  `BLCSTATUS` int(11) DEFAULT NULL,
  `BLCTEXT` text,
  `BLID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BLCMTID`),
  KEY `UID` (`UID`),
  KEY `BLID` (`BLID`),
  CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`BLID`) REFERENCES `blog` (`BLID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `blog_comments` */

insert  into `blog_comments`(`BLCMTID`,`UID`,`BLCDATE`,`BLCTIME`,`BLCSTATUS`,`BLCTEXT`,`BLID`) values (1,2,'2012-11-05','2012-11-05 12:19:59',1,'testing!!!',1),(2,11,'2012-11-07','2012-11-07 11:47:52',1,'testing!!!!',1),(3,11,'2012-11-07','2012-11-07 11:48:36',1,'testing',1),(6,11,'2012-11-09','2012-11-09 17:58:50',1,'asadsdsdsadsa',3);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `CATID` int(11) NOT NULL AUTO_INCREMENT,
  `CATNAME` varchar(500) DEFAULT NULL,
  `CATSTATUS` int(11) DEFAULT NULL,
  `CATEGORYID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CATID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`CATID`,`CATNAME`,`CATSTATUS`,`CATEGORYID`) values (1,'Entertainment',1,1),(2,'Sports',1,1),(3,'News',1,1),(4,'Religious',1,1),(5,'Science',1,1),(6,'Environmental',1,1),(7,'Politics',1,1),(8,'Business',1,1),(9,'Personal',1,1),(10,'Close Ended',1,2),(11,'Open Ended',1,2);

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `CMTID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `CDATE` date DEFAULT NULL,
  `CTIME` datetime NOT NULL,
  `CSTATUS` int(11) DEFAULT NULL,
  `CTEXT` text,
  `POSTID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CMTID`),
  KEY `UID` (`UID`),
  KEY `POSTID` (`POSTID`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`POSTID`) REFERENCES `post` (`POSTID`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`CMTID`,`UID`,`CDATE`,`CTIME`,`CSTATUS`,`CTEXT`,`POSTID`) values (3,1,'2013-02-25','2013-02-25 11:14:47',1,'my new pic ',31),(4,11,'2013-02-25','2013-02-25 11:23:16',1,'nice!!!! ',31);

/*Table structure for table `following` */

DROP TABLE IF EXISTS `following`;

CREATE TABLE `following` (
  `FOLLOWID` int(11) NOT NULL AUTO_INCREMENT,
  `FOLLOWDATE` date DEFAULT NULL,
  `FOLLOWTIME` datetime DEFAULT NULL,
  `FOLLOWSTATUS` int(11) DEFAULT NULL,
  `POSTID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  PRIMARY KEY (`FOLLOWID`),
  KEY `FK_following` (`UID`),
  KEY `FK1_following` (`POSTID`),
  CONSTRAINT `FK1_following` FOREIGN KEY (`POSTID`) REFERENCES `post` (`POSTID`),
  CONSTRAINT `FK_following` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `following` */

/*Table structure for table `friends` */

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `FRNID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `FSTATUS` int(11) DEFAULT NULL,
  `FDATE` date DEFAULT NULL,
  `FTIME` datetime DEFAULT NULL,
  `MAILSTATUS` int(11) DEFAULT NULL,
  `FRIENDID` int(11) DEFAULT NULL,
  PRIMARY KEY (`FRNID`),
  KEY `UID` (`UID`),
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `friends` */

insert  into `friends`(`FRNID`,`UID`,`FSTATUS`,`FDATE`,`FTIME`,`MAILSTATUS`,`FRIENDID`) values (1,1,1,'2012-11-06','2012-11-06 17:46:55',1,11),(2,11,1,'2012-11-06','2012-11-06 17:47:16',1,1);

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `LIKID` int(11) NOT NULL AUTO_INCREMENT,
  `LIKDATE` date DEFAULT NULL,
  `LIKTIME` datetime DEFAULT NULL,
  `LIKSTATUS` int(11) DEFAULT NULL,
  `POSTID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LIKID`),
  KEY `FK_likes` (`UID`),
  KEY `FK1_likes` (`POSTID`),
  CONSTRAINT `FK1_likes` FOREIGN KEY (`POSTID`) REFERENCES `post` (`POSTID`),
  CONSTRAINT `FK_likes` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

/*Table structure for table `likes_blog` */

DROP TABLE IF EXISTS `likes_blog`;

CREATE TABLE `likes_blog` (
  `BLIKID` int(11) NOT NULL AUTO_INCREMENT,
  `BLIKDATE` date DEFAULT NULL,
  `BLIKTIME` datetime DEFAULT NULL,
  `BLIKSTATUS` int(11) DEFAULT NULL,
  `BLID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BLIKID`),
  KEY `BFK_likes` (`UID`),
  KEY `BFK1_likes` (`BLID`),
  CONSTRAINT `BFK_likes` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  CONSTRAINT `FK_likes_blog` FOREIGN KEY (`BLID`) REFERENCES `blog` (`BLID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `likes_blog` */

insert  into `likes_blog`(`BLIKID`,`BLIKDATE`,`BLIKTIME`,`BLIKSTATUS`,`BLID`,`UID`) values (1,'2012-11-09','2012-11-09 18:00:18',1,3,1);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `MSGID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `MSG` text,
  `MSGDATE` date DEFAULT NULL,
  `MSGTIME` datetime DEFAULT NULL,
  `TOMSGID` int(11) DEFAULT NULL,
  `MSGSTATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`MSGID`),
  KEY `UID` (`UID`),
  CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `message` */

insert  into `message`(`MSGID`,`UID`,`MSG`,`MSGDATE`,`MSGTIME`,`TOMSGID`,`MSGSTATUS`) values (1,1,'hi testing','2013-01-14','2013-01-14 19:00:00',11,0),(2,1,'hi testing','2013-01-14','2013-01-14 19:00:00',12,1),(3,1,'hi testing','2013-01-14','2013-01-14 19:00:00',10,0),(4,9,'hi testing','2013-01-14','2013-01-14 19:00:00',1,1),(5,12,'testing','2013-01-14','2013-01-14 19:01:20',1,1),(6,1,'skdhf ','2013-01-14','2013-01-14 20:44:13',12,0),(7,12,' dfgdgfdfg','2013-01-14','2013-01-14 20:46:00',1,1),(8,12,'wewerwerwerrwe ','2013-01-14','2013-01-14 20:46:13',1,1);

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `POSTID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `POST` text,
  `POSTDATE` date DEFAULT NULL,
  `POSTTIME` datetime DEFAULT NULL,
  `PSTATUS` int(11) DEFAULT NULL,
  `PHOTOYN` int(11) DEFAULT '0',
  PRIMARY KEY (`POSTID`),
  KEY `UID` (`UID`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

insert  into `post`(`POSTID`,`UID`,`POST`,`POSTDATE`,`POSTTIME`,`PSTATUS`,`PHOTOYN`) values (4,11,'dfgdfgdgfsfsdfsdf','2012-11-06','2012-11-06 11:41:59',1,NULL),(9,1,'hi testing!!!','2012-11-08','2012-11-08 12:05:14',1,NULL),(13,11,'sdfsdfsdf','2012-11-08','2012-11-08 12:19:52',1,NULL),(14,1,'testing','2012-11-20','2012-11-20 17:34:22',1,NULL),(15,1,'testing!!!!!!!','2012-11-20','2012-11-20 17:34:34',1,NULL),(16,1,'hi','2012-11-20','2012-11-20 17:34:40',1,NULL),(17,1,'checking','2012-11-20','2012-11-20 17:34:45',1,NULL),(18,1,'scrolller','2012-11-20','2012-11-20 17:34:56',1,NULL),(19,1,'need','2012-11-20','2012-11-20 17:44:26',1,NULL),(20,1,'more','2012-11-20','2012-11-20 17:44:31',1,NULL),(21,1,'number','2012-11-20','2012-11-20 17:44:40',1,NULL),(22,1,'of ','2012-11-20','2012-11-20 17:44:47',1,NULL),(23,1,'post','2012-11-20','2012-11-20 17:44:52',1,NULL),(24,1,'lorem lipsunm','2012-11-21','2012-11-21 12:34:09',1,NULL),(25,1,'updates','2012-11-21','2012-11-21 12:34:18',1,NULL),(26,1,'hi','2012-11-21','2012-11-21 12:34:22',1,NULL),(27,1,'heeelp','2012-11-21','2012-11-21 12:35:14',1,NULL),(28,1,'dgdfgdf','2012-11-21','2012-11-21 12:35:17',1,NULL),(29,1,'dfgdgdgf','2012-11-21','2012-11-21 12:35:20',1,NULL),(30,1,'0007-jpg_063107.jpg','2013-02-25','2013-02-25 10:55:06',1,1),(31,1,'3D-Cartoon-Tinker-Bell-by-hqwallpaper.in.jpg','2013-02-25','2013-02-25 10:58:09',1,1);

/*Table structure for table `querstions` */

DROP TABLE IF EXISTS `querstions`;

CREATE TABLE `querstions` (
  `QID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `QDATE` date DEFAULT NULL,
  `QTIME` datetime NOT NULL,
  `QUESTION` text,
  `QSTATUS` int(11) DEFAULT NULL,
  `CATID` int(11) DEFAULT NULL,
  PRIMARY KEY (`QID`),
  KEY `UID` (`UID`),
  KEY `FK_querstions` (`CATID`),
  CONSTRAINT `FK_querstions` FOREIGN KEY (`CATID`) REFERENCES `category` (`CATID`),
  CONSTRAINT `querstions_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `querstions` */

insert  into `querstions`(`QID`,`UID`,`QDATE`,`QTIME`,`QUESTION`,`QSTATUS`,`CATID`) values (3,1,'2012-11-06','2012-11-06 11:24:50','fgdgdg',1,11),(4,11,'2012-11-07','2012-11-07 17:27:24','dfgffff',1,10),(5,11,'2012-11-10','2012-11-10 11:44:27','7tyutyu',1,10);

/*Table structure for table `share` */

DROP TABLE IF EXISTS `share`;

CREATE TABLE `share` (
  `SHRID` int(11) NOT NULL AUTO_INCREMENT,
  `POSTID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  `SHDATE` date DEFAULT NULL,
  `SHTIME` datetime DEFAULT NULL,
  `SHSTATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`SHRID`),
  KEY `FK_share` (`UID`),
  KEY `FK1_share` (`POSTID`),
  CONSTRAINT `FK1_share` FOREIGN KEY (`POSTID`) REFERENCES `post` (`POSTID`),
  CONSTRAINT `FK_share` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `share` */

insert  into `share`(`SHRID`,`POSTID`,`UID`,`SHDATE`,`SHTIME`,`SHSTATUS`) values (1,9,11,'2012-11-09','2012-11-09 18:12:49',1),(2,31,11,'2013-02-25','2013-02-25 11:23:24',1);

/*Table structure for table `share_blog` */

DROP TABLE IF EXISTS `share_blog`;

CREATE TABLE `share_blog` (
  `BSHRID` int(11) NOT NULL AUTO_INCREMENT,
  `BLID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  `BSHDATE` date DEFAULT NULL,
  `BSHTIME` datetime DEFAULT NULL,
  `BSHSTATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`BSHRID`),
  KEY `BFK_share` (`UID`),
  KEY `BFK1_share` (`BLID`),
  CONSTRAINT `BFK_share` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  CONSTRAINT `FK_share_blog` FOREIGN KEY (`BLID`) REFERENCES `blog` (`BLID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `share_blog` */

insert  into `share_blog`(`BSHRID`,`BLID`,`UID`,`BSHDATE`,`BSHTIME`,`BSHSTATUS`) values (1,4,1,'2012-11-09','2012-11-09 18:00:14',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UNAME` varchar(500) DEFAULT NULL,
  `UPASSWORD` text,
  `USTATUS` int(11) DEFAULT NULL,
  `UFULLNAME` varchar(500) DEFAULT NULL,
  `UEMAILID` varchar(500) DEFAULT NULL,
  `UBIO` text,
  `UINDUSTRY` varchar(500) DEFAULT NULL,
  `UOCCUPATION` varchar(500) DEFAULT NULL,
  `UINTEREST` varchar(500) DEFAULT NULL,
  `UGENDER` int(11) DEFAULT NULL,
  `UWEBSITE` text,
  `UPHOTO` text,
  `UACCOUNT` int(11) DEFAULT NULL,
  `UDOB` date DEFAULT NULL,
  `UPLACE` varchar(500) DEFAULT NULL,
  `UDESCRIPTION` text,
  `UTAGLINE` varchar(500) DEFAULT NULL,
  `UTYPE` varchar(500) DEFAULT NULL,
  `USPECIALITIES` text,
  `UMISSION` text,
  `UFOUNDED` varchar(500) DEFAULT NULL,
  `UEMPCOUNT` int(11) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`UID`,`UNAME`,`UPASSWORD`,`USTATUS`,`UFULLNAME`,`UEMAILID`,`UBIO`,`UINDUSTRY`,`UOCCUPATION`,`UINTEREST`,`UGENDER`,`UWEBSITE`,`UPHOTO`,`UACCOUNT`,`UDOB`,`UPLACE`,`UDESCRIPTION`,`UTAGLINE`,`UTYPE`,`USPECIALITIES`,`UMISSION`,`UFOUNDED`,`UEMPCOUNT`) values (1,'sonymamtha','+dfnjKRY2ONeBS3vNJaymTLFWrVTsXnqhmpNIcBiZ3g=',1,'Mamtha    ','sonymamtha@gmail.com','lorem lipsum','IT                                  ','software engineer                                  ','music                                  ',2,'http://www.google.com','../uploads/1/profile/images.jpg',1,'1988-12-30','Bangalore                                  ',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'vinaykp3','NlUAbNzFlU8OL2XMFVfTHVcZQDl1Kz9jtPZm/v1frew=',1,'vinay','sonymamtha@yahoo.in',NULL,NULL,NULL,NULL,NULL,'http://www.google.com','../uploads/2/profile/15.JPG',2,NULL,NULL,'lorem lipsum',NULL,NULL,NULL,NULL,NULL,NULL),(3,'nagamani','s3QZUL4FF6IzpfzHxcy+1keH7ZsAMO42U4K7sBvBO5U=',1,'nagamani','sonymamtha@example.com',NULL,'IT',NULL,NULL,NULL,'http://www.google.com',NULL,3,NULL,'Bangalore',NULL,'tesing','IT','lorem lipsum','lorem lipsum','1988',1),(4,'pramodsony','uFaUICXErhzJ7gzEG5D0/1jF2HhRO7hAQ+dLJ4Z4a3E=',1,'Pramod','pramod@examle.com','lorem lipsum','blalbla','Student','music',1,'http://google.com',NULL,1,'1996-09-26','Bangalore',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'anithasony','r4JDcGwVKGfuN7xOlVgfQ5kprqx5HiO748KqNbhANJo=',1,'Anitha','anitha@example.com',NULL,NULL,NULL,NULL,NULL,'http://www.google.com',NULL,2,NULL,NULL,'lorem lipsum',NULL,NULL,NULL,NULL,NULL,NULL),(6,'sohansony','D0s8nbKmicB6Nddb6H79By15BfNJITKbbFq2+46HfW8=',1,'Sohan','sohan@skjhsf.com',NULL,'IT',NULL,NULL,NULL,'http://www.google.com',NULL,3,NULL,'pune',NULL,'my world','lorem','java','lorem lipsum','1988',20),(7,'rita','8bo9rm3Sf8o56UKzB/phE8QOEucptg9G9ys5qWwilMI=',1,'Rita','rita@example.com','lorem lipsum','Lorem lipsum','housewife','books',2,'http://google.com',NULL,1,'1997-01-01','Bangalore',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'nisha','kJq5NQVpQUitXGHhyJwLTszlLPNy0MPtHogewvLGNsw=',1,'Nisha','nisha@example.com',NULL,NULL,NULL,NULL,NULL,'http://www.google.com',NULL,2,NULL,NULL,'lorem lipsum',NULL,NULL,NULL,NULL,NULL,NULL),(9,'donald','+dhxV7oMTaB1WrpYOBkaV0h/ceVEPAg3h8RnRY2snAg=',1,'Donald','donald@duck.com',NULL,NULL,NULL,NULL,NULL,'http://www.google.com',NULL,2,NULL,NULL,'lorem lispum',NULL,NULL,NULL,NULL,NULL,NULL),(10,'maya','XiFWGEgaTa6dV28HF1mNc7DVwzxj5asfUJk0NVIRNEM=',1,'Maya','maya@example.com',NULL,NULL,NULL,NULL,NULL,'http://www.google.com',NULL,2,NULL,NULL,'lorem lipsum',NULL,NULL,NULL,NULL,NULL,NULL),(11,'piya','3bZOCO+XtVGG1iIGB5chbu8hTg22pHkPNVgHAKJ4+98=',1,'Piya','piya@example.com',NULL,'IT',NULL,NULL,NULL,'http://www.google.com','../uploads/11/profile/images (10).jpg',3,NULL,'pune',NULL,'my world','lorem','lorem lipsum','lorem lipsum','1988',20),(12,'zoya','OxJ6/ijpV8Xs66YMIGNBikj9MLJn2WmcQVVJTcKJvis=',1,'Zoya','zoya@example.com','lorem lipsum','blalbla','Student','books',2,'http://google.com',NULL,1,'1967-01-01','Bangalore',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'rajeev','+gW/HBm5RKBnwPamt0fEUTn6Xdrgc/uBy/izb7Wkemg=',1,'Rajeev','rajeev@ksf.com',NULL,'IT',NULL,NULL,NULL,'http://www.google.com',NULL,3,NULL,'pune',NULL,'my world','lorem','QTP','lorem lipsum','1988',20),(14,'yash','YvoftafAtMQPf8OEcvHeKYseF+pnK5v7hBvx8Nggui8=',1,'yash','yash@example.com',NULL,NULL,NULL,NULL,NULL,'http://www.google.com',NULL,2,NULL,NULL,'lorem lipsum',NULL,NULL,NULL,NULL,NULL,NULL),(15,'rose','nyq9Ab8P5UzjrEUJnYm5wlF3S0ZSZdnQhG9LyogRXvo=',1,'rose','rose@example.com','lorem lipsum','blalbla','Student','dance',2,'http://google.com',NULL,1,'1979-04-04','Banglore',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
