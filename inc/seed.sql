CREATE DATABASE IF NOT EXISTS `3WireWish` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `3WireWish`;

CREATE TABLE IF NOT EXISTS `WishList` (
    `ID` int(11) unsigned NOT NULL auto_increment,
    `NAME` varchar(255) NOT NULL default '',
    `TYPE` varchar(255) NOT NULL default '',
    `IMAGE` varchar(255) default '',
    `URL` varchar(255) default '',
    `PRICE` decimal NOT NULL default '0.00',
    `SOURCE` varchar(255) NOT NULL default '',
    `NOTES` varchar(255) default '',
    `OBTAINED` boolean NOT NULL default '0',
    PRIMARY KEY  (`ID`)
);

CREATE TABLE IF NOT EXISTS `ADMIN-USER` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `USERNAME` varchar(255) NOT NULL UNIQUE default '',
  `PASSWORD` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
);

INSERT INTO `ADMIN-USER` (`USERNAME`, `PASSWORD`) VALUES (`RoyUnderhill`, `woodwrightShop`);

--INSERT INTO `products` (`sku`, `name`, `img`, `price`, `paypal`) VALUES(101, 'Logo Shirt, Red', 'img/shirts/shirt-101.jpg', 18.00, '9P7DLECFD4LKE');
