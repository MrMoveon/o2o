#生活服务分类表
CREATE TABLE `o2o_category`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL DEFAULT  '',
  `parent_id` int(10) unsigned NOT NULL default 0,
  `listorder` int(8) unsigned NOT NULL default 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY parent_id(`parent_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#城市表
CREATE TABLE `o2o_city`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(50) NOT NULL DEFAULT '',
  `uname` VARCHAR(50) NOT NULL DEFAULT '',
  `parent_id` INT(10) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY parent_id(`parent_id`),
  UNIQUE KEY uname(`uname`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商圈表
CREATE TABLE `o2o_area`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(50)  NOT NULL DEFAULT '',
  `city_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `parent_id` INT(10) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY parent_id(`parent_id`),
  KEY city_id(`city_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


#商户表
CREATE TABLE `o2o_bis`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(50)  NOT NULL DEFAULT '',
  `email` VARCHAR(50)  NOT NULL DEFAULT '',
  `logo` VARCHAR(255)  NOT NULL DEFAULT '',
  `licence_logo` VARCHAR(255)  NOT NULL DEFAULT '',
  `description` TEXT NOT NULL ,
  `city_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `city_path` VARCHAR(50)  NOT NULL DEFAULT '',
  `bank_info` VARCHAR(50)  NOT NULL DEFAULT '',
  `money` DECIMAL (20,2) unsigned NOT NULL DEFAULT '0.00',
  `bank_name` VARCHAR(50)  NOT NULL DEFAULT '',
  `bank_user` VARCHAR(50)  NOT NULL DEFAULT '',
  `faren` VARCHAR(20)  NOT NULL DEFAULT '',
  `fanren_tel` VARCHAR(20)  NOT NULL DEFAULT '',
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY city_id(`city_id`),
  KEY name(`name`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#商户账户表
CREATE TABLE `o2o_bis_account`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `username` VARCHAR(50)  NOT NULL DEFAULT '',
  `password` CHAR(32)  NOT NULL DEFAULT '',
  `code` VARCHAR(10)  NOT NULL DEFAULT '',
  `bis_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `last_login_ip` VARCHAR(20) NOT NULL DEFAULT '',
  `last_login_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `is_main` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY bis_id(`bis_id`),
  KEY username(`username`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


#商户门店表
CREATE TABLE `o2o_bis_location`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(50)  NOT NULL DEFAULT '',
   `logo` VARCHAR(255)  NOT NULL DEFAULT '',
  `address` VARCHAR(255)  NOT NULL DEFAULT '',
  `tel` VARCHAR(20)  NOT NULL DEFAULT '',
  `contact` VARCHAR(20)  NOT NULL DEFAULT '',
  `xpoint` VARCHAR(20)  NOT NULL DEFAULT '',
  `ypoint` VARCHAR(20)  NOT NULL DEFAULT '',
  `bis_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `open_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `content` text NOT NULL,
  `is_main` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `api_address` VARCHAR(255)  NOT NULL DEFAULT '',
  `category_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `category_path` VARCHAR(50)  NOT NULL DEFAULT '',
  `city_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `city_path` VARCHAR(50)  NOT NULL DEFAULT '',
  `bank_info` VARCHAR(50)  NOT NULL DEFAULT '',
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY city_id(`city_id`),
  KEY category_id(`category_id`),
  KEY bis_id(`bis_id`),
  KEY name(`name`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


#团购商品表
CREATE TABLE `o2o_deal`(
  `id` INT(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(100)  NOT NULL DEFAULT '',
  `category_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `se_category_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `bis_id` INT(11) unsigned NOT NULL DEFAULT 0,
 `location_ids` VARCHAR(100)  NOT NULL DEFAULT '',
   `image` VARCHAR(255)  NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `end_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `origin_price` DECIMAL (20,2) unsigned NOT NULL DEFAULT '0.00',
  `current_price` DECIMAL (20,2) unsigned NOT NULL DEFAULT '0.00',
  `city_id` INT(11) unsigned NOT NULL DEFAULT 0,
  `buy_count` INT(11) unsigned NOT NULL DEFAULT 0,
  `total_count` INT(11) unsigned NOT NULL DEFAULT 0,
  `coupons_begin_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `coupons_end_tim` INT(11) unsigned NOT NULL DEFAULT 0,
  `xpoint` VARCHAR(20)  NOT NULL DEFAULT '',
  `ypoint` VARCHAR(20)  NOT NULL DEFAULT '',
   `bis_account_id` INT(11) unsigned NOT NULL DEFAULT 0,
   `balance_price` DECIMAL (20,2) unsigned NOT NULL DEFAULT '0.00',
   `notes` text NOT NULL ,
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY category_id(`category_id`),
  KEY se_category_id(`se_category_id`),
  KEY city_id(`city_id`),
  KEY end_time(`end_time`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



#用户表
CREATE TABLE `o2o_user`(
   `id` INT(11) unsigned NOT NULL auto_increment,
  `username` VARCHAR(20)  NOT NULL DEFAULT '',
  `password` CHAR(32)  NOT NULL DEFAULT '',
  `code` VARCHAR(10)  NOT NULL DEFAULT '',
  `email`  VARCHAR(30)  NOT NULL DEFAULT '',
  `mobile`  VARCHAR(20)  NOT NULL DEFAULT '',
  `last_login_ip` VARCHAR(20) NOT NULL DEFAULT '',
  `last_login_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY email(`email`),
  UNIQUE KEY username(`username`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


#推荐位表
CREATE TABLE `o2o_featured`(
   `id` INT(11) unsigned NOT NULL auto_increment,
   `type` tinyint(1) NOT NULL DEFAULT 0,
  `title` VARCHAR(30)  NOT NULL DEFAULT '',
  `image` VARCHAR(255)  NOT NULL DEFAULT '',
  `url` VARCHAR(255)  NOT NULL DEFAULT '',
  `description` VARCHAR(255)  NOT NULL DEFAULT '',
  `listorder` INT(8) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` INT(11) unsigned NOT NULL DEFAULT 0,
  `update_time` INT(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;