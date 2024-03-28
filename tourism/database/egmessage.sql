-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2024-01-31 09:02:14
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `egmessage`
--
CREATE DATABASE IF NOT EXISTS `egmessage` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `egmessage`;

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'content',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'username',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'time'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='messages';

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `name`, `addtime`) VALUES
(1, 'hello world', 'Today is a wonderful day', 'test', '2024-01-31 00:37:23'),
(2, 'evaluate', 'This website is really great', 'test', '2024-01-31 00:43:39');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'username',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'password',
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'admin or user',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'reg time'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='users';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `addtime`) VALUES
(1, 'admin', 'admin888', 1, '2024-01-31 00:11:37'),
(2, 'test', 'test', 0, '2024-01-31 00:17:16');

--
-- 转储表的索引
--

--
-- 表的索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
