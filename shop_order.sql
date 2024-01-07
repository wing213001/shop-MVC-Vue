-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-07 10:24:09
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `shop_order`
--

CREATE TABLE `shop_order` (
  `orderID` int(11) NOT NULL,
  `jobName` varchar(10) COLLATE utf8_unicode_520_ci NOT NULL,
  `buyNum` int(11) NOT NULL,
  `buyerID` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_520_ci NOT NULL,
  `satisfaction` int(11) DEFAULT NULL,
  `result` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- 傾印資料表的資料 `shop_order`
--

INSERT INTO `shop_order` (`orderID`, `jobName`, `buyNum`, `buyerID`, `sellerID`, `status`, `satisfaction`, `result`, `price`, `totalQuantity`) VALUES
(28, 'f2f2f3f', 300, 2, 1, '已送達', 2, 60000, 200, 500),
(32, 'f3f3f', 15, 4, 1, '處理中', NULL, 1500, 100, 30),
(33, 'vrgwgeg', 1, 4, 3, '未處理', NULL, 12, 12, 1),
(34, 'f2f2f3f', 11, 2, 1, '已送達', 1, 2200, 200, 500),
(35, 'ewfqfw', 10, 2, 1, '已送達', 5, 1000, 100, 90),
(36, 'f2f2f3f', 2, 2, 1, '已送達', 4, 400, 200, 500),
(37, 'f2f2f3f', 2, 2, 1, '已送達', 3, 400, 200, 500);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`orderID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
