-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-08-14 11:42:04
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `chatapp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `ID` int(8) UNSIGNED NOT NULL,
  `UserName` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `contents`
--

CREATE TABLE `contents` (
  `ID` int(8) UNSIGNED NOT NULL,
  `send` int(8) UNSIGNED NOT NULL,
  `receive` int(8) UNSIGNED NOT NULL,
  `type` varchar(16) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- テーブルのインデックス `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `contents`
--
ALTER TABLE `contents`
  MODIFY `ID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
