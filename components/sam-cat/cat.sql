
CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'شرح توضیحات',
  `kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی ',
  `parent` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `hide` int(1) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cat` ADD `family_tree` VARCHAR(1024) NOT NULL AFTER `logo`;

ALTER TABLE `cat` ADD FULLTEXT(`name`);

--spi--
