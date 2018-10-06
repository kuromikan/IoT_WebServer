-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-10-06 07:52:49
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `iot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dht`
--

CREATE TABLE `dht` (
  `sn` int(11) NOT NULL,
  `temperature` decimal(10,0) NOT NULL,
  `humidity` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `dht`
--
ALTER TABLE `dht`
  ADD PRIMARY KEY (`sn`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `dht`
--
ALTER TABLE `dht`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
