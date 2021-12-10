
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'ایمیل',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='ایمیل های خبرنانه' AUTO_INCREMENT=3 ;


--spi--
