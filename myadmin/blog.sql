
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `who_admin`
--

CREATE TABLE IF NOT EXISTS `who_admin` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `qq` bigint(20) NOT NULL,
  `usertype` int(10) NOT NULL,
  `tel` bigint(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `who_admin`
--

INSERT INTO `who_admin` (`uid`, `username`, `password`, `email`, `qq`, `usertype`, `tel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '253930398@qq.com', 253930398, 1, 18680579276);

-- --------------------------------------------------------

--
-- 表的结构 `who_articles`
--

CREATE TABLE IF NOT EXISTS `who_articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `thumb` varchar(50) NOT NULL,
  `contents` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `who_articles`
--


--
-- 表的结构 `who_categoryes`
--

CREATE TABLE IF NOT EXISTS `who_categoryes` (
  `cid` smallint(10) NOT NULL AUTO_INCREMENT,
  `order` smallint(10) NOT NULL DEFAULT '0',
  `cname` varchar(20) NOT NULL,
  `time` bigint(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `who_categoryes`
--

INSERT INTO `who_categoryes` (`cid`, `order`, `cname`, `time`) VALUES
(1, 0, 'Linux', 1448521575),
(2, 1, 'PHP', 1448521575),
(3, 0, 'CodeIgniter', 0),
(4, 0, 'CSS', 0),
(5, 0, 'Jquery', 0),
(6, 0, 'Aboutlife', 0),
(7, 0, 'mysql', 0);

-- --------------------------------------------------------

--
-- 表的结构 `who_setting`
--

CREATE TABLE IF NOT EXISTS `who_setting` (
  `siteid` int(10) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(50) NOT NULL,
  `siteurl` varchar(50) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `code` text NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`siteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `who_setting`
--

INSERT INTO `who_setting` (`siteid`, `sitename`, `siteurl`, `keywords`, `description`,  `email`) VALUES
(1, 'crossain的博客!', 'http://www.blog.com', 'css,php,codeigniter,linux,jquery', 'hi,crossain', '253930398@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
