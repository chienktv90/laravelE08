
CREATE DATABASE IF NOT EXISTS `phpmvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `phpmvc`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');
