-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2015 at 01:35 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jnahian_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `j_user`
--

CREATE TABLE IF NOT EXISTS `j_user` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(50) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_role` tinyint(4) NOT NULL,
  `u_dob` varchar(50) NOT NULL,
  `u_image` varchar(200) NOT NULL,
  `u_msg` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `j_user`
--

INSERT INTO `j_user` (`u_id`, `u_fname`, `u_lname`, `u_username`, `u_email`, `u_pass`, `u_role`, `u_dob`, `u_image`, `u_msg`) VALUES
(4, 'Julkar Naen', 'Nahian', 'jnahian', 'nahian_is@yahoo.com', 'cc6afb1343f92c867d90ee21d670be0e6bfbbd63', 1, '26 August, 1988', 'user1434796385cartoon-characters-to-draw-hd-cool-7.jpg', 'hello'),
(6, 'Md. Mostofa ', 'Kamal', 'mmk', 'mmkjony@luminous-it.com', 'c0fe656dbeb8fdbeeaf34ffd990833962f846b5a', 2, '11 February, 1991', 'user1434798827graphic_design_hover.png', 'Faisa gesi mainkar cipay'),
(8, 'Farid', 'Khan', 'kfarid', 'farid@gamil.com', '3c9645a85615bf88549a582675b2c9de9ab59384', 2, '1 June, 2015', '', 'dsgfdsghfdhgfjfgg dfhfd j'),
(9, 'Farid', 'Khan', 'nfarid', 'farid@gamil.com', '2d80a38506282bf5f11478f70c027650e0c983b3', 2, '1 June, 2015', '', 'dsgfdsghfdhgfjfgg dfhfd j'),
(10, 'ayreherghyewra', 'Khan', 'kmmk', 'dasfaf@afffaf.fasf', '4ea910b0bdc43c3e817722c0f589e3b313e7ed22', 2, '1 June, 2015', '', 'safdsfh tgsdgdsgsdg'),
(11, 'Md. Mostofa', 'Mehdi', 'jonygar', 'jony@gar.com', 'e0045ab0b8f7f482f06cb3d99e9318f64cf1fc6a', 3, '1 June, 2015', '', 'safdsfh tgsdgdsgsdg'),
(12, 'Md Romel', 'Khan', 'romel', 'romel@gmail.com', '536c4ac0558dd0aed2dca72dc8a131cfd95c9a73', 2, '1 June, 2015', '', 'Hi, What&#039;s up.'),
(13, 'Rajib', 'Hasan', 'hrajib', 'rajibh@gmail.com', 'c6e4e39fa2d337394f2fb1eb1f608cb765e41277', 2, '1 June, 2015', '', 'Hi, What&#039;s up.'),
(14, 'df sdf sadf ', 'sdfsd fsf ', 'as dfsd f', 'sdflkj@sdflj.com', '14f8bf20cac744cb67bf6772c90ac0c042667d27', 1, '18 June, 2015', '', 'as dfsdf dsf sfd'),
(15, 'egtqwrqw', 'gagewqw', 'sdgsdg', 'farid@gamil.com', 'e1847411c1c504301700a7e3a447046485c4f403', 2, '1 June, 2015', '', 'ewwahyeherheshrarh'),
(16, 'gsdgsaeg', 'dgasdgads', 'dsgasdg', 'gdads@ddsg.fads', '7d5916ee40e66a4cf9c500827ccb1640340db039', 2, '11 June, 2015', '', 'dfghsdghsdhgahgdsfhasdhs'),
(22, 'gsdgsaeg', 'dgasdgads', 'dsgasdgdsa', 'gdads@ddsg.fads', '7d5916ee40e66a4cf9c500827ccb1640340db039', 2, '11 June, 2015', '', 'dfghsdghsdhgahgdsfhasdhs'),
(23, 'Nahian', 'Khan', 'admin', 'admin@jnahian.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, '2 June, 2015', 'user1435212085boss3.png', 'fgdsgfdhahrweharhe'),
(24, 'jkdsgaj', 'afasfasf', 'asfasf', 'asfasfas@afaf.fasf', '977b9f33b60b4b5a57234613517078a3bfeec783', 2, '4 June, 2015', 'user1435212706', 'afsasfa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `j_user`
--
ALTER TABLE `j_user`
  ADD PRIMARY KEY (`u_id`), ADD UNIQUE KEY `u_username` (`u_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `j_user`
--
ALTER TABLE `j_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
