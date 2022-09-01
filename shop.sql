-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `half_price` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `half_price`, `price`, `image`, `quantity`, `user_id`) VALUES
(86, 'Singapuri fry rice', '', '140', 'veg_singapuririce.jpg', 1, 5),
(87, 'Veg bhel', '', '140', 'veg_bhel.jpg', 3, 5),
(89, 'Hakka noodles', '', '80', 'veg_hakka.jpg', 1, 5),
(94, 'Dragon rice', '', '240', 'ch_gradragrice.jpg', 3, 2),
(96, 'Hot n Spice rice', '', '240', 'ch_grahnsrice.jpg', 1, 2),
(97, 'Apple lolly pop', '', '150', 'dry_applelollipop.jpg', 1, 2),
(98, 'Chicken darbari', '', '280', 'twa_darbari.jpg', 2, 2),
(99, 'Kulcha butter', '', '22', 'chappati_butterkulcha.jpg', 3, 2),
(100, 'Chappati', '', '8', 'chappati_roti.jpg', 3, 5),
(101, 'Apple lolly pop', '', '150', 'dry_applelollipop.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cat_name`, `image`, `descr`) VALUES
(1, 'Veg', 'veg.jpg', 'Keep calm and go vegan.\r\n\r\n'),
(2, 'Non Veg', 'non_veg.jpg', 'Hear and taste the crunch'),
(3, 'Tawa ', 'tava.jpg', 'Enjoy the taste of our spices'),
(4, 'Others', 'roti.jpg', 'Enjoy the real taste of tandoor');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `pid`, `time`, `comment_by`) VALUES
(5, 'Loved the food', 5, '2022-08-25 08:39:49', 2),
(6, 'Enjoyyed it', 30, '2022-08-25 08:41:12', 2),
(7, 'healthy soup', 52, '2022-08-26 03:29:40', 2),
(15, 'Nice', 5, '2022-08-27 03:09:38', 5),
(18, 'fgd', 2, '2022-08-27 03:12:40', 5),
(20, 'ad', 5, '2022-08-27 03:12:52', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `half_price` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `half_price`, `price`, `image`, `sid`) VALUES
(1, 'Manchow Soup', '0', '80', 'veg_manchow.jpg', 1),
(2, 'Hot n Sour Soup', '0', '80', 'hotnsour_v.jpg', 1),
(3, 'Dragon Soup', '0', '80', 'veg_dragon.jpg', 1),
(4, 'Hakka noodles', '80', '120', 'veg_hakka.jpg', 2),
(5, 'Schezwan noodles', '80', '120', 'veg_schezwan.jpg', 2),
(6, 'Hot n Spice fry noodles', '100', '150', 'veg_hotnspice_nodles.jpg', 2),
(7, 'Singapuri noodles', '80', '120', 'veg_singapuri.jpg', 2),
(8, 'Butter garlic noodles', '80', '120', 'butter_garlic_veg.jpg', 2),
(9, 'Chilly garlic noodles', '80', '120', 'chilly_garlic_veg.jpg', 2),
(10, 'Hongkong noodles', '80', '120', 'veg_hongkong.jpg', 2),
(11, 'Burn chilly noodles', '80', '120', 'veg_burnchilly.jpg', 2),
(12, 'Burn garlic noodles', '80', '120', 'veg_burngarlic.jpg', 2),
(20, 'Veg manchurian', '70', '120', 'veg_manchurian.jpg', 3),
(21, 'Paneer chilly', '150', '220', 'panner_chilly.jpg', 3),
(22, 'Paneer crispy', '150', '220', 'panner_crispy.jpg', 3),
(23, 'Veg Fry rice', '80', '120', 'ver_fryrice.jpg', 4),
(24, 'Chilly garlic rice', '100', '140', 'chillygarlicriceveg.jpg', 4),
(25, 'Schezwan Rice', '80', '120', 'veg_schezwanrice.jpg', 4),
(26, 'Soya fry rice', '80', '120', 'ver_soyafryrice.jpg', 4),
(27, 'Burn chilly fry rice', '100', '140', 'veg_burnchilyrice.jpg', 4),
(28, 'Butter fry rice', '110', '150', 'butter_vegfryrice.jpg', 4),
(29, 'Burn garlic fry rice', '110', '150', 'burngarlic_vegrice.jpg', 4),
(30, 'Singapuri fry rice', '100', '140', 'veg_singapuririce.jpg', 4),
(31, 'Veg bhel', '100', '140', 'veg_bhel.jpg', 4),
(32, 'Maska chicken', '150', '220', 'maskachikn.jpg', 5),
(33, 'Thai spice', '150', '220', 'thaispice.jpg', 5),
(34, 'Golden dry', '150', '220', 'goldedry.jpg', 5),
(35, 'Green thai dry', '150', '220', 'greenthaidry.jpg', 5),
(36, 'Burn chilly dry', '150', '220', 'dry_burnchilly.jpg', 5),
(37, 'Chilly dry', '150', '220', 'dry_chilly.jpg', 5),
(38, 'Oyster Dry', '150', '220', 'dry_oyster.jpg', 5),
(39, 'Schezwan Dry', '150', '220', 'schezwandry.jpg', 5),
(40, 'Shanghai dry', '150', '220', 'dry_shanghai.jpg', 5),
(41, 'Wafeer chicken', '150', '220', 'dry_wafeer.jpg', 5),
(42, 'Pan fry dry', '150', '220', 'dry_panfry.jpg', 5),
(43, 'Black bean dry', '150', '220', 'dry_blackbean.jpg', 5),
(44, 'Ogust Dry', '150', '220', 'dry_ogust.jpg', 5),
(45, 'Hot n spice Dry', '150', '220', 'dry_hotnspice.jpg', 5),
(46, 'Lolly pop oil fry', '150', '220', 'ch_lollipop.jpg', 5),
(47, 'Apple lolly pop', '150', '220', 'dry_applelollipop.jpg', 5),
(48, 'Crispy dry', '150', '220', 'crispydry.jpg', 5),
(49, 'Chicken manchow soup', '0', '100', 'ch_man.jpg', 6),
(50, 'Hot n Sour Soup', '0', '100', 'ch_hotnsour.jpg', 6),
(51, 'Hot n Spice Soup', '0', '120', 'hotnspice.jpg', 6),
(52, 'Dragon Soup', '0', '120', 'ch_dragon.jpg', 6),
(53, 'Fry rice', '100', '140', 'ch_fryrice.jpg', 7),
(56, 'Chilly garlic rice', '120', '180', 'ch_garlicrice.jpg', 7),
(57, 'schezwan rice', '100', '140', 'ch_schezwan.jpg', 7),
(58, 'Soya fry rice', '100', '140', 'soya_chicnrice.jpg', 7),
(59, 'Burn chilly fry rice', '120', '180', 'ch_burnchillyrice.jpg', 7),
(60, 'Butter fry rice', '120', '180', 'ch_butterrice.jpg', 7),
(61, 'Burn garlic fry rice', '120', '180', 'bu_gar_ch_rice.jpg', 7),
(62, 'Singapuri rice', '120', '180', 'ch_sangapuririce.jpg', 7),
(63, 'Hakka noodles', '100', '140', 'ch_hakka.jpg', 8),
(64, 'Schezwan noodles', '100', '140', 'ch_scheznood.jpg', 8),
(65, 'Hot n spice fry noodles', '120', '180', 'ch_hotnspicenood.jpg', 8),
(66, 'Singapuri noodles', '100', '140', 'ch_singanood.jpg', 8),
(67, 'Butter garlic noodles', '120', '180', 'ch_butgarnood.jpg', 8),
(68, 'Chilly garlic noodles', '120', '160', 'ch_chillgarnood.jpg', 8),
(69, 'Hong kong noodles', '100', '140', 'ch_hongkongnoods.jpg', 8),
(70, 'Burn chilly noodles', '120', '180', 'ch_burnchillynood.jpg', 8),
(71, 'Burn garlic noodles', '120', '180', 'ch_burngarnood.jpg', 8),
(72, 'Burn chilly rice', '140', '240', 'ch_grburnrice.jpg', 9),
(73, 'Tripple rice', '140', '240', 'ch_gravtriprice.jpg', 9),
(74, 'Dragon rice', '140', '240', 'ch_gradragrice.jpg', 9),
(75, 'Chilly rice', '140', '240', 'ch_grachillyrice.jpg', 9),
(76, 'Oyster chilly rice', '140', '240', 'ch_graoystrice.jpg', 9),
(77, 'Hakka pot rice', '140', '240', 'ch_grahakkapotrice.jpg', 9),
(78, 'Crispy rice', '140', '240', 'ch_gracrispyrice.jpg', 9),
(79, 'Schezwan pepper rice', '140', '240', 'ch_graschezrice.jpg', 9),
(80, 'Hot n Spice rice', '140', '240', 'ch_grahnsrice.jpg', 9),
(81, 'Chicken Bhuna', '00', '220', 'twa_bhuna.jpg', 10),
(82, 'Chicken Tikka masala', '00', '170', 'twa_tikkamasala.jpg', 10),
(84, 'Tikka fry', '00', '260', 'twa_tikkafry.jpg', 10),
(85, 'Golden juice', '00', '350', 'twa_goldenjuice.jpg', 10),
(88, 'Chicken Dilkhush', '00', '350', 'twa_dilkhush.jpg', 10),
(89, 'Chicken zafrani gravy', '0', '350', 'twa_zafranigravy.jpg', 10),
(90, 'Chicken golden gravy', '0', '250', 'twa_goldengravy.jpg', 10),
(91, 'Chicken darbari', '0', '280', 'twa_darbari.jpg', 10),
(92, 'Chicken tawa fry', '0', '140', 'twa_sptawafry.jpg', 10),
(93, 'Amdavadi tawa', '0', '180', 'twa_amdavaditawa.jpg', 10),
(94, 'Chicken Afghani', '0', '250', 'twa_chicknafghani.jpg', 10),
(95, 'Chicken chatpata', '0', '240', 'twa_chatpata.jpg', 10),
(96, 'Chicken toofani', '0', '250', 'twa_toofani.jpg', 10),
(97, 'Ginger boneless', '0', '280', 'twa_ginger.jpg', 10),
(98, 'Chicken patiala', '0', '200', 'twa_patiala.jpg', 10),
(99, 'Bhuna pulav', '0', '160', 'twa_pulavbhuna.jpg', 11),
(100, 'Tikka pulav', '0', '150', 'twa_pulavtikka.jpg', 11),
(101, 'Dilkhush pulav', '0', '230', 'twa_pulavdilkhush.jpg', 11),
(102, 'Golden pulav', '0', '210', 'twa_pulavgolden.jpg', 11),
(103, 'Darbari pulav', '0', '180', 'twa_pulavdarbari.jpg', 11),
(104, 'Afghani pulav', '0', '170', 'twa_pulavafghani.jpg', 11),
(105, 'Chatpata pulav', '0', '170', 'twa_pulavchatpata.jpg', 11),
(106, 'Toofani pulav', '0', '170', 'twa_pulavtoofani.jpg', 11),
(107, 'Boneless biryani', '0', '190', 'twa_biryani.jpg', 11),
(108, 'Egg pulav', '0', '80', 'twa_eggpulav.jpg', 11),
(109, 'Omlet', '0', '50', 'twa_omlet.jpg', 12),
(110, 'Anda kheema', '0', '60', 'twa_eggkheema.jpg', 12),
(111, 'Anda bhrji', '0', '60', 'twa_eggbhurji.jpg', 12),
(112, 'Anda gotala', '0', '80', 'twa_egggotala.jpg', 12),
(113, 'Anda dhosa', '0', '140', 'twa_eggdhosa.jpg', 12),
(114, 'Anda Curry', '0', '60', 'twa_eggcurry.jpg', 12),
(115, 'Mutton bhuna', '0', '200', 'twa_muttonbhuna.jpg', 13),
(116, 'Mutton fry', '0', '200', 'twa_muttonfry.jpg', 13),
(117, 'Chaap fry', '0', '200', 'twa_muttonchaap.jpg', 13),
(118, 'Bombay chaap', '0', '250', 'twa_muttonbombaychaap.jpg', 13),
(119, 'Bheja fry', '0', '170', 'twa_muttonbhejafry.jpg', 13),
(120, 'Lasangna bheja', '0', '220', 'twa_muttonlasangna.jpg', 13),
(121, 'Chatni Bheja', '0', '240', 'twa_muttonchatnibheja.jpg', 13),
(122, 'Chappati', '0', '8', 'chappati_roti.jpg', 14),
(123, 'Chappati butter', '0', '15', 'chapati_butter.jpg', 14),
(124, 'Kulcha', '0', '15', 'chappati_kulcha.jpg', 14),
(125, 'Kulcha butter', '0', '22', 'chappati_butterkulcha.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sid` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sid`, `sub_name`, `cid`) VALUES
(1, 'Veg Soup', 1),
(2, 'Veg Noodles', 1),
(3, 'VegDry', 1),
(4, 'Veg Rice', 1),
(5, 'Starter non veg dry', 2),
(6, 'Starter Non Veg Soup', 2),
(7, 'Non Veg Rice', 2),
(8, 'Non Veg Noodles', 2),
(9, 'Non veg gravy Rice', 2),
(10, 'Chicken Tawa', 3),
(11, 'Tawa pulav', 3),
(12, 'Egg Funda', 3),
(13, 'Mutton(no beef)', 3),
(14, 'Chappati', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `password`) VALUES
(1, 'mak', '$2y$10$CG3XTwmFVPNmOfBjTmksv.bgXG.yWlDUmsxgJiYbDbGTiLkZWRLG2'),
(2, 'Nomaan', '$2y$10$nk8mYmmtUfYy6GXSl4g58OCWYOldYdsIz9iEDz8ZOA4Ozxf3KhHe2'),
(3, 'Rock', '$2y$10$ooimFaMMgOC0mivAynZzpedgt3Z8cx.O.DfWel.Pn30wqyVvBob.y'),
(4, 'q', '$2y$10$u0CmE/IjIEjLC53iobRH5uSiLVowDO5XZqSCSLA1cHaAuMZv7Q9JG'),
(5, 't', '$2y$10$g4VPT1ZkYm9lS/1kfIcv9.XclRIGcTWTsCCNwTGFWmTlaTuYRC/qe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
