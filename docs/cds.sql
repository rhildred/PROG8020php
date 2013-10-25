CREATE TABLE IF NOT EXISTS `cds` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'artificial auto-increment index',
  `disk_id` varbinary(255) DEFAULT NULL COMMENT 'calculated id',
  `Title` varchar(255) NOT NULL COMMENT 'name of cd',
  `Arranger` varchar(255) NOT NULL COMMENT 'primary artist or arranger',
  `Genre` varchar(255) DEFAULT NULL COMMENT 'genre ie "blues"',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this is my cd collection' AUTO_INCREMENT=11 ;

INSERT INTO cds(Title, Arranger, Genre) VALUES
('Rumours',	'Fleetwood Mac',	'POP'),
('Dark Side of the Moon',	'Pink Floyd',	'Album Rock'),
('8 Miles',	'Eminem',	'Hip-Hop'),
('Dusty foot philosopher',	'Knaan',	'Hip-Hop'),
('2112',	'Rush',	'Rock and Roll'),
('Cardboard Castles',	'George Watsky',	'Hip-Hop');
