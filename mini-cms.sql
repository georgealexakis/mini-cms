SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `photos_content` (
  `pid` int(11) NOT NULL,
  `photo_url` varchar(200) NOT NULL,
  `category` varchar(200) CHARACTER SET utf8 NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `photos_content` (`pid`, `photo_url`, `category`, `name`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', '');

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`uid`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Test', 'Test', 'example@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

CREATE TABLE `website_content` (
  `cid` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `website_content` (`cid`, `content`) VALUES
(0, ''),
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, '');


ALTER TABLE `photos_content`
  ADD PRIMARY KEY (`pid`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

ALTER TABLE `website_content`
  ADD PRIMARY KEY (`cid`);


ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
