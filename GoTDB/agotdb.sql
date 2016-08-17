-- Game of Thrones DATABASE
-- Alexandre Silva



DROP TABLE IF EXISTS `UChar`;
DROP TABLE IF EXISTS `house`;
DROP TABLE IF EXISTS `charHouse`;
DROP TABLE IF EXISTS `status`;
DROP TABLE IF EXISTS `charStat`;

-- character table
CREATE TABLE `UChar` (
	`char_id` int(11) NOT NULL,
	`name` varchar(255) NOT NULL,
	`house` varchar(255) NOT NULL,
	`gender` varchar(255) NOT NULL,
	`status` varchar(255) NOT NULL,
	PRIMARY KEY (`char_id`),
	UNIQUE KEY (`name`)
) ENGINE=InnoDB;

-- house table; main political family they are sworn to
CREATE TABLE `house` (
	`house_id` int(11) NOT NULL AUTO_INCREMENT,
	`house_name` varchar(255) NOT NULL,
	PRIMARY KEY (`house_id`),
	UNIQUE KEY (`house_name`)
) ENGINE=InnoDB;

-- charHouse; house of a character
CREATE TABLE `charHouse` (
	`cid` int(11) NOT NULL,
	`hid` int(11) NOT NULL,
	PRIMARY KEY (`cid`, `hid`),
	FOREIGN KEY (`cid`) REFERENCES `UChar` (`char_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (`hid`) REFERENCES `house` (`house_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE=InnoDB;

-- status: is character alive?
CREATE TABLE `status` (
	`stat_id` int(11) NOT NULL AUTO_INCREMENT,
	`curStat` varchar(255) NOT NULL,
	PRIMARY KEY (`stat_id`),
	UNIQUE KEY (`curStat`)
) ENGINE=InnoDB;

-- charStat; status of character
CREATE TABLE `charStat` (
	`cid` int(11) NOT NULL,
	`sid` int(11) NOT NULL,
	PRIMARY KEY (`cid`, `sid`),
	FOREIGN KEY (`cid`) REFERENCES `UChar` (`char_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (`sid`) REFERENCES `status` (`stat_id`)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE=InnoDB;