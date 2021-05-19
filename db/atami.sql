-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-04-15 07:12:37
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
-- テーブルの構造 `category_nightlife`
--

CREATE TABLE `category_nightlife` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `category_nightlife`
--

INSERT INTO `category_nightlife` (`ID`, `Name`, `Comment`) VALUES
(1, 'バー', ''),
(2, 'スナック', ''),
(3, 'キャバクラ', ''),
(4, 'その他', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `category_restaurant`
--

CREATE TABLE `category_restaurant` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `category_restaurant`
--

INSERT INTO `category_restaurant` (`ID`, `Name`, `Comment`) VALUES
(1, '居酒屋', ''),
(2, '中華料理', ''),
(3, '寿司、魚料理、和食', ''),
(4, '焼肉、ステーキ', ''),
(5, 'フレンチ、イタリアン', ''),
(6, '焼き鳥、串料理', ''),
(7, '洋食', ''),
(8, 'カフェ、バー', ''),
(9, 'らーめん、麵類', ''),
(10, 'その他', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `category_time`
--

CREATE TABLE `category_time` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `category_time`
--

INSERT INTO `category_time` (`ID`, `Name`, `Comment`) VALUES
(1, '新幹線', ''),
(2, '伊東線', ''),
(3, 'JR線', ''),
(4, 'バス', '');

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
  `Info_hotel` longtext NOT NULL,
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
(12, ' ATAMI せかいえ', '熱海駅より（無料送迎あり）\r\n※自社送迎車にてご案内致します。（要事前連絡/予約コメントor電話）', ' 静岡県 熱海市伊豆山269-1', 'hackvideo01@gmail.com', 'hackvideo01430', '7anw2VhZ', '057-0011-722', 0, 'https://www.ikyu.com/00002107/', '35.1099404', '139.0820405', 100, 'ホテリエお薦めホテル特集\r\n★ホテルで働くスタッフがお薦めする●●なホテルをご紹介★ホテルや旅館などの宿泊施設で働くスタッフから様々なテーマで選定されたおすすめのホテルをご紹介いたします。業界関係者ならではの目線で選ばれたホテルを要チェック！', 'HOTELIERにプレスリリースを掲載しませんか？\r\nホテル・旅館関連事業者の方は下記よりお申し込みください。', 1, 1, '', '0000-00-00', '2021-04-12 14:46:29', 'admin', 'admin', '2021-03-31 11:10:45'),
(27, '熱海温泉 湯宿みかんの木', '熱海駅より（無料送迎あり）\r\n※自社送迎車にてご案内致します。（要事前連絡/予約コメントor電話）', '〒413-0012 静岡県熱海市東海岸町１−11 湯宿 みかんの木', 'nguyenlucnl01@gmail.co', 'nguyenlucnl01331', 'RAOyhWO7', '070-3626-4717', 0, 'https://www.ikyu.com/00002107/', '35.0975475', '139.0744113', 500, 'ホテリエお薦めホテル特集\r\n★ホテルで働くスタッフがお薦めする●●なホテルをご紹介★ホテルや旅館などの宿泊施設で働くスタッフから様々なテーマで選定されたおすすめのホテルをご紹介いたします。業界関係者ならではの目線で選ばれたホテルを要チェック！', 'HOTELIERにプレスリリースを掲載しませんか？\r\nホテル・旅館関連事業者の方は下記よりお申し込みください。', 1, 1, '', '0000-00-00', '2021-04-14 15:21:21', 'admin', 'admin', '2021-04-14 15:19:36');

-- --------------------------------------------------------

--
-- テーブルの構造 `nightlife`
--

CREATE TABLE `nightlife` (
  `ID` int(11) NOT NULL,
  `Category_id` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Introduce_cm` longtext NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Time_work` varchar(255) NOT NULL,
  `MemberEmail` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Text1` longtext NOT NULL,
  `Text2` longtext NOT NULL,
  `Text3` longtext NOT NULL,
  `Text4` longtext NOT NULL,
  `Text5` longtext NOT NULL,
  `Image` tinyint(10) NOT NULL,
  `QR_1` text NOT NULL,
  `QR_2` text NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Lng` varchar(255) NOT NULL,
  `Flag` varchar(255) NOT NULL,
  `AdFlag` tinyint(10) NOT NULL,
  `FlagComment` varchar(255) NOT NULL,
  `UpdateFlag` date NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `FromDay` date DEFAULT NULL,
  `ToDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `nightlife`
--

INSERT INTO `nightlife` (`ID`, `Category_id`, `Category`, `Name`, `Introduce_cm`, `Address`, `Time_work`, `MemberEmail`, `UserName`, `Password`, `Tel`, `Text1`, `Text2`, `Text3`, `Text4`, `Text5`, `Image`, `QR_1`, `QR_2`, `Lat`, `Lng`, `Flag`, `AdFlag`, `FlagComment`, `UpdateFlag`, `UpdatedDate`, `UpdatedBy`, `CreatedBy`, `CreatedDate`, `FromDay`, `ToDay`) VALUES
(7, 1, 'バー', '熱海 Bar Vacation', '〒413-0011 静岡県熱海市田原本町７−14', '〒413-0011 静岡県熱海市田原本町７−14', '9-20時', 'nguyenlucnl01@gmail.co', 'nguyenlucnl01701', 'oEMe2RQO', '070-3626-4717', '', '', '', '', '', 0, 'https://murama2singo.wixsite.com/giggle', 'https://murama2singo.wixsite.com/giggle', '35.1023059', '139.0778541', '1', 1, '', '0000-00-00', '2021-04-15 14:05:24', 'admin', 'admin', '2021-04-12 13:41:02', '2021-04-14', '2021-04-17');

-- --------------------------------------------------------

--
-- テーブルの構造 `restaurant`
--

CREATE TABLE `restaurant` (
  `ID` int(11) NOT NULL,
  `Category_id` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Introduce_cm` longtext NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Time_work` varchar(255) NOT NULL,
  `MemberEmail` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Text1` varchar(255) NOT NULL,
  `Text2` varchar(255) NOT NULL,
  `Text3` varchar(255) NOT NULL,
  `Text4` varchar(255) NOT NULL,
  `Text5` varchar(255) NOT NULL,
  `Image` tinyint(10) NOT NULL,
  `QR_1` text NOT NULL,
  `QR_2` text NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Lng` varchar(255) NOT NULL,
  `FlagComment` varchar(255) NOT NULL,
  `UpdateFlag` date NOT NULL,
  `Flag` tinyint(1) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `FromDay` date DEFAULT NULL,
  `ToDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `restaurant`
--

INSERT INTO `restaurant` (`ID`, `Category_id`, `Category`, `Name`, `Introduce_cm`, `Address`, `Time_work`, `MemberEmail`, `UserName`, `Password`, `Tel`, `Text1`, `Text2`, `Text3`, `Text4`, `Text5`, `Image`, `QR_1`, `QR_2`, `Lat`, `Lng`, `FlagComment`, `UpdateFlag`, `Flag`, `UpdatedDate`, `UpdatedBy`, `CreatedBy`, `CreatedDate`, `FromDay`, `ToDay`) VALUES
(290, 2, '中華料理', 'めがね丸', 'めがね丸のホームページをご覧いただきありがとうございます。当店では開業から長年の実績を活かし、その日に獲ったお魚を使用し、毎日新鮮な魚介類や自家製野菜を定食・丼もの・セット料理でお出ししております。', '静岡県熱海市初島191', '10:30–14:30 17:00–19:00', 'nguyenlucnl01@gmail.co', 'nguyenlucnl0150', 'VEZo00sE', '815-5767-1465', '熱海港から高速船で25分で首都圏から一番近い離島の初島で、是非美味しい海鮮料理をご賞味ください。皆様', '', '', '', '', 0, 'https://www.meganemaru.com/', 'https://www.meganemaru.com/', '35.0418845', '139.1697411', '', '0000-00-00', 1, '2021-04-12 12:02:07', 'admin', 'admin', '2021-03-31 18:24:04', NULL, NULL),
(291, 1, '居酒屋', '欧風料理のレストラン', 'メイン料理\r\n白身魚のムニエル / 白身のフライ / 白身魚のソテートマトソース / ハンバーグステーキ / 若鶏のナンチョワ風 / 若鶏のソテーガーリックソース\r\nから1つお選び下さい。', '静岡県熱海市渚町1-1', '11:30〜15:00(LO14:00) 17:30〜21:00(LO20:00)', 'nguyenlucnl01@gmail.co', 'nguyenlucnl01665', 'ioz64kHH', '055-7818-467', '4月のお休みは5日（月）、6日（火）、１2日（月）、19日（月）、26日（月）、30日（金）となりま', '', '', '', '', 0, 'https://atami-clair.com/', 'https://atami-clair.com/', '35.09672', '139.0750414', '', '0000-00-00', 1, '2021-04-15 14:03:31', 'admin', 'admin', '2021-03-31 18:28:56', '2021-04-14', '2021-04-17');

-- --------------------------------------------------------

--
-- テーブルの構造 `time`
--

CREATE TABLE `time` (
  `ID` int(11) NOT NULL,
  `Category_id` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `QR_1` varchar(255) NOT NULL,
  `QR_2` varchar(255) NOT NULL,
  `Flag` tinyint(10) NOT NULL,
  `FlagComment` varchar(255) NOT NULL,
  `UpdateFlag` date NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(255) NOT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `time`
--

INSERT INTO `time` (`ID`, `Category_id`, `Category`, `QR_1`, `QR_2`, `Flag`, `FlagComment`, `UpdateFlag`, `UpdatedDate`, `UpdatedBy`, `CreatedBy`, `CreatedDate`) VALUES
(24, 1, '新幹線', 'https://translate.google.com/?sl=ja&tl=en&text=%E5%AE%BF%E6%B3%8A%0A&op=translate', 'https://translate.google.com/?sl=ja&tl=en&text=%E5%AE%BF%E6%B3%8A%0A&op=translate', 0, '', '0000-00-00', '2021-04-12 09:12:59', 'admin', 'admin', '2021-04-12 09:12:59'),
(25, 2, '伊東線', 'https://stackoverflow.com/questions/9117975/fancybox-close-on-an-iframe', 'https://www.google.com/search?q=rakuten&rlz=1C1FQRR_jaJP940JP940&oq=raku&aqs=chrome.0.0l2j69i57j0l4j69i60.1768j0j4&sourceid=chrome&ie=UTF-8', 1, '', '0000-00-00', '2021-04-14 13:58:07', 'admin', 'admin', '2021-04-14 13:58:07'),
(26, 3, 'JR線', 'https://stackoverflow.com/questions/9117975/fancybox-close-on-an-iframe', 'https://www.google.com/search?q=rakuten&rlz=1C1FQRR_jaJP940JP940&oq=raku&aqs=chrome.0.0l2j69i57j0l4j69i60.1768j0j4&sourceid=chrome&ie=UTF-8', 1, '', '0000-00-00', '2021-04-14 13:58:26', 'admin', 'admin', '2021-04-14 13:58:26'),
(27, 4, 'バス', 'https://stackoverflow.com/questions/9117975/fancybox-close-on-an-iframe', '', 0, '', '0000-00-00', '2021-04-14 14:33:14', 'admin', 'admin', '2021-04-14 13:59:13');

-- --------------------------------------------------------

--
-- テーブルの構造 `tour`
--

CREATE TABLE `tour` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Introduce_cm` longtext NOT NULL,
  `Address` varchar(255) NOT NULL,
  `MemberEmail` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `QR` text NOT NULL,
  `Time_work` varchar(255) NOT NULL,
  `Info_tour` longtext NOT NULL,
  `Other` longtext NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Lng` varchar(255) NOT NULL,
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
-- テーブルのデータのダンプ `tour`
--

INSERT INTO `tour` (`ID`, `Name`, `Introduce_cm`, `Address`, `MemberEmail`, `UserName`, `PassWord`, `Tel`, `QR`, `Time_work`, `Info_tour`, `Other`, `Lat`, `Lng`, `Flag`, `AdFlag`, `FlagComment`, `UpdateFlag`, `UpdatedDate`, `UpdatedBy`, `CreatedBy`, `CreatedDate`) VALUES
(4, '熱海トリックアート', '＜＜お知らせ＞＞\r\n4月24日（金）〜5月20日（水）まで熱海市からの要請及び、新型コロナウイルス感染拡大防止の為、熱海城・熱海トリックアートは休業いたします。営業再開については改めてご連絡いたします。', '〒413-0033　静岡県熱海市熱海1993', 'hackvideo01@gmail.com', 'hackvideo01312', 'zXassKcy', '070-3626-4717', 'http://atami-trickart.com/', '9-23時', '専門の画家が描いた平面画を人間の目の錯覚を\r\nうまく利用し、あたかも平面を立体的に感じてしまう、\r\nとっても不思議で楽しめる新しいアート！\r\n\r\nただ、見るだけのアートではなく、実際にさわったり考えたりし、\r\nさらに思い出として、カメラで撮影したりできます☆\r\n友人・家族・恋人で大盛り上がりできますよ☆', '＜＜お知らせ＞＞\r\n4月24日（金）〜5月20日（水）まで熱海市からの要請及び、新型コロナウイルス感染拡大防止の為、熱海城・熱海トリックアートは休業いたします。営業再開については改めてご連絡いたします。', '35.0807696', '139.0732552', 1, 1, '', '0000-00-00', '2021-04-12 15:09:01', 'admin', 'admin', '2021-04-06 10:37:09');

-- --------------------------------------------------------

--
-- テーブルの構造 `upload_file`
--

CREATE TABLE `upload_file` (
  `ID` int(11) NOT NULL,
  `ID_Mater` int(20) NOT NULL,
  `UploadName` varchar(350) NOT NULL,
  `UploadType` varchar(25) NOT NULL DEFAULT '',
  `UploadPath` varchar(350) NOT NULL,
  `UploadDate` varchar(350) NOT NULL,
  `Type` bit(10) DEFAULT NULL COMMENT '1:restaurant 2:泊まる　３：観光　４：夜遊び'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `upload_file`
--

INSERT INTO `upload_file` (`ID`, `ID_Mater`, `UploadName`, `UploadType`, `UploadPath`, `UploadDate`, `Type`) VALUES
(250, 12, '11.jpg', 'image/jpeg', './upfiles/11.jpg', '2021-04-12 11:59:42', b'0000000010'),
(251, 12, '25.jpg', 'image/jpeg', './upfiles/25.jpg', '2021-04-12 11:59:42', b'0000000010'),
(252, 12, '31.jpg', 'image/jpeg', './upfiles/31.jpg', '2021-04-12 11:59:42', b'0000000010'),
(254, 291, 'meal11.jpg', 'image/jpeg', './upfiles/meal11.jpg', '2021-04-12 12:00:55', b'0000000001'),
(255, 291, 'meal21.jpg', 'image/jpeg', './upfiles/meal21.jpg', '2021-04-12 12:00:55', b'0000000001'),
(256, 291, 'meal3.jpg', 'image/jpeg', './upfiles/meal3.jpg', '2021-04-12 12:00:55', b'0000000001'),
(258, 290, 'megane.1jpg1.jpg', 'image/jpeg', './upfiles/megane.1jpg1.jpg', '2021-04-12 12:02:07', b'0000000001'),
(259, 290, 'megane1.jpg', 'image/jpeg', './upfiles/megane1.jpg', '2021-04-12 12:02:07', b'0000000001'),
(260, 290, 'megane2jpg1.jpg', 'image/jpeg', './upfiles/megane2jpg1.jpg', '2021-04-12 12:02:07', b'0000000001'),
(263, 7, 'bar.jpg', 'image/jpeg', './upfiles/bar.jpg', '2021-04-12 13:41:02', b'0000000100'),
(265, 12, '42.jpg', 'image/jpeg', './upfiles/42.jpg', '2021-04-12 14:46:29', b'0000000010'),
(275, 4, '27.jpg', 'image/jpeg', './upfiles/27.jpg', '2021-04-12 15:09:01', b'0000000011'),
(276, 4, 'meal2.jpg', 'image/jpeg', './upfiles/meal2.jpg', '2021-04-12 15:09:01', b'0000000011'),
(277, 4, 'megane2jpg.jpg', 'image/jpeg', './upfiles/megane2jpg.jpg', '2021-04-12 15:09:01', b'0000000011'),
(288, 27, '12.jpg', 'image/jpeg', './upfiles/12.jpg', '2021-04-14 15:21:21', b'0000000010'),
(289, 27, '26.jpg', 'image/jpeg', './upfiles/26.jpg', '2021-04-14 15:21:21', b'0000000010'),
(290, 27, '32.jpg', 'image/jpeg', './upfiles/32.jpg', '2021-04-14 15:21:21', b'0000000010'),
(291, 27, '45.jpg', 'image/jpeg', './upfiles/45.jpg', '2021-04-14 15:21:21', b'0000000010'),
(295, 291, 'anime.jpg', 'image/jpeg', './upfiles/anime.jpg', '2021-04-15 14:03:31', b'0000000001'),
(296, 7, 'images (1).png', 'image/png', './upfiles/images (1).png', '2021-04-15 14:05:24', b'0000000100'),
(297, 7, 'infographic-circle-banner-vector-template-steps-parts-options-graph-report-presentation-data-visualisation-cycling-64703222.jpg', 'image/jpeg', './upfiles/infographic-circle-banner-vector-template-steps-parts-options-graph-report-presentation-data-visualisation-cycling-64703222.jpg', '2021-04-15 14:05:24', b'0000000100'),
(298, 7, 'shinkansen.png', 'image/png', './upfiles/shinkansen.png', '2021-04-15 14:05:24', b'0000000100');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `ID_Mater` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`ID`, `ID_Mater`, `username`, `password`, `Email`, `role`, `role_name`, `comment`, `createddate`) VALUES
(98, 0, 'admin', '1', '', 1, '', '', '2021-03-29 19:09:37'),
(134, 12, 'hackvideo01430', '7anw2VhZ', 'hackvideo01@gmail.com', 3, '宿泊のユーザ', 'Nguyen Luc', '2021-03-31 11:10:45'),
(138, 290, 'nguyenlucnl0150', 'VEZo00sE', 'nguyenlucnl01@gmail.co', 2, 'お店のユーザ', 'めがね丸', '2021-03-31 18:24:04'),
(139, 291, 'nguyenlucnl01665', 'ioz64kHH', 'nguyenlucnl01@gmail.co', 2, 'お店のユーザ', '欧風料理のレストラン', '2021-03-31 18:28:56'),
(171, 7, 'nguyenlucnl01701', 'oEMe2RQO', 'nguyenlucnl01@gmail.co', 5, '夜遊びのユーザ', '熱海 Bar Vacation', '2021-04-12 13:41:02'),
(176, 27, 'nguyenlucnl01331', 'RAOyhWO7', 'nguyenlucnl01@gmail.co', 3, '宿泊のユーザ', '熱海温泉 湯宿みかんの木', '2021-04-14 15:19:36');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `category_nightlife`
--
ALTER TABLE `category_nightlife`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `category_restaurant`
--
ALTER TABLE `category_restaurant`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `category_time`
--
ALTER TABLE `category_time`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `nightlife`
--
ALTER TABLE `nightlife`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `upload_file`
--
ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `category_nightlife`
--
ALTER TABLE `category_nightlife`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `category_restaurant`
--
ALTER TABLE `category_restaurant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `category_time`
--
ALTER TABLE `category_time`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- テーブルの AUTO_INCREMENT `nightlife`
--
ALTER TABLE `nightlife`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- テーブルの AUTO_INCREMENT `time`
--
ALTER TABLE `time`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- テーブルの AUTO_INCREMENT `tour`
--
ALTER TABLE `tour`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `upload_file`
--
ALTER TABLE `upload_file`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
