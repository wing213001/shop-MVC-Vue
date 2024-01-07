-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-07 10:23:58
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
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `jobName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jobContent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `buyNum` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`id`, `jobName`, `jobContent`, `price`, `buyNum`, `result`, `totalQuantity`, `sellerID`) VALUES
(1, 'f2f2f3f', '2f22ff', 200, 315, 10000, 500, 1),
(2, 'f3f3f', '33f3f3f', 100, 15, 3000, 30, 1),
(15, 'fdfsf', 'wefewf', 50, 0, 500, 50, 1),
(16, 'fewfw', 'fwfwef', 30, 0, 1200, 70, 1),
(22, 'bebb', 'bbeeb', 10, 0, 100, 20, 1),
(23, 'ewfqfw', 'fewfw', 100, 10, 0, 90, 1),
(24, 'vrgwgeg', 'wggwege', 12, 1, 0, 1, 3),
(25, 'brgeg', 'ergeg', 100, 0, 0, 100, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
