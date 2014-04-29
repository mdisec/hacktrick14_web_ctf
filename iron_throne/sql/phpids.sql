use iron_throne;
--
-- Table structure for table `phpids_bans`
--

CREATE TABLE IF NOT EXISTS `phpids_bans` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `phpids_disabled_accounts`
--

CREATE TABLE IF NOT EXISTS `phpids_disabled_accounts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `reason` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `phpids_intrusions`
--

CREATE TABLE IF NOT EXISTS `phpids_intrusions` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  `page` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `user_browser` varchar(250) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `server_ip` varchar(50) NOT NULL,
  `event_impact` bigint(11) unsigned NOT NULL,
  `session_impact` bigint(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

