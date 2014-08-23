#
# Table structure for table 'tx_fluidshare_domain_model_gist'
#
CREATE TABLE tx_fluidshare_domain_model_gist (
	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	confirmed tinyint(1) unsigned DEFAULT '0' NOT NULL,
	url tinytext,
	summary mediumtext,
	tags int(11) unsigned DEFAULT '0' NOT NULL,
	extensions int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_fluidshare_domain_model_tag'
#
CREATE TABLE tx_fluidshare_domain_model_tag (
	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	fe_group int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	confirmed tinyint(1) unsigned DEFAULT '0' NOT NULL,
	name tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_fluidshare_domain_model_extension'
#
CREATE TABLE tx_fluidshare_domain_model_extension (
	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	fe_group int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	name tinytext,
	extension_key tinytext,
	extension_name tinytext,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_fluidshare_gist_tag_mm'
#
#
CREATE TABLE tx_fluidshare_gist_tag_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	tablenames varchar(30) DEFAULT '' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_fluidshare_gist_extension_mm'
#
#
CREATE TABLE tx_fluidshare_gist_extension_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	tablenames varchar(30) DEFAULT '' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
