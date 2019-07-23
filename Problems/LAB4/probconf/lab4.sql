DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `usr` varchar(16) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `flag` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `account` WRITE;
INSERT INTO `account` VALUES ('M30W','a_random_password','flag{L3ARN3D_1NJECT10N_HuH?}');
UNLOCK TABLES;
