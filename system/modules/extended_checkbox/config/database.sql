-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

--
-- Table `tl_form_field`
--

CREATE TABLE `tl_form_field` (
	`checkbox_extended_value` varchar(32) NOT NULL default '',
	`checkbox_extended_url` varchar(255) NOT NULL default '',
	`checkbox_extended_singleSRC` varchar(255) NOT NULL default '',
	`checkbox_extended_target` char(1) NOT NULL default '',
	`checkbox_extended_title` varchar(255) NOT NULL default '',
	`checkbox_extended_embed` varchar(255) NOT NULL default '',
	`checkbox_extended_tpl` varchar(64) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;