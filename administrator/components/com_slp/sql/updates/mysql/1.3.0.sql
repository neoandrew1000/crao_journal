CREATE TABLE IF NOT EXISTS `#__sitelinkx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wort` varchar(2000) NOT NULL,
  `ersatz` varchar(4000) NOT NULL,
  `schlagwort` varchar(2000) NOT NULL,
  `fenster` varchar(10) NOT NULL,
  `publ` tinyint(1) NOT NULL,
  `begpub` datetime NOT NULL,
  `endpub` datetime NOT NULL,
  `anzahl` INT(11) NOT NULL,
  `suchm` INT(11) NOT NULL,
  `nofollow` tinyint(1) NOT NULL,
  `ausnahme` varchar(32000) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `#__sitelinkx_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) NOT NULL DEFAULT '0',
  `anzahl` int(11) NOT NULL,
  `suchm` int(11) NOT NULL,
  `erreichb` tinyint(1) NOT NULL,
  `fenster` varchar(10) NOT NULL,
  `hinweis` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
