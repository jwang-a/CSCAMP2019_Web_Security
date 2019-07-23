DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


LOCK TABLES `account` WRITE;
INSERT INTO `account` VALUES (1,'test1','test1'),(2,'test2','test2'),(3,'M30W','a_very_secure_pwd');
UNLOCK TABLES;
