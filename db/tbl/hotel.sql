-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-30 10:05:58
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `atami`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `hotel`
--

CREATE TABLE `hotel` (
  `ID` int(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Introduce_cm` longtext NOT NULL,
  `Address` varchar(255) NOT NULL,
  `MemberEmail` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Image` tinyint(10) NOT NULL,
  `QR` text NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Lng` varchar(255) NOT NULL,
  `Room_number` int(255) NOT NULL,
  `Info_hotel` text NOT NULL,
  `Other` longtext NOT NULL,
  `Flag` tinyint(10) NOT NULL,
  `AdFlag` tinyint(10) NOT NULL,
  `FlagComment` varchar(255) NOT NULL,
  `UpdateFlag` date NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `hotel`
--

INSERT INTO `hotel` (`ID`, `Name`, `Introduce_cm`, `Address`, `MemberEmail`, `UserName`, `Password`, `Tel`, `Image`, `QR`, `Lat`, `Lng`, `Room_number`, `Info_hotel`, `Other`, `Flag`, `AdFlag`, `FlagComment`, `UpdateFlag`, `UpdatedDate`, `UpdatedBy`, `CreatedBy`, `CreatedDate`) VALUES
(7, 'Nguyen Luc', 'f', '三島市南町', 'nguyenlucnl01@gmail.com', 'nguyenlucnl01584', 'SN6UKfGn', '070-3626-4717', 0, 'https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_slideshow_auto', '', '', 100, 'd', 'f', 1, 1, '', '0000-00-00', '0000-00-00 00:00:00', 'admin', 'admin', '2021-03-30 15:48:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
