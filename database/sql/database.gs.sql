DROP TABLE IF EXISTS `ladder_player`;

CREATE TABLE `ladder_player` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rank` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;