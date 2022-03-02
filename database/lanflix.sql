-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 05:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_film`, `qty`) VALUES
(88, 3, 25, 2),
(89, 4, 20, 2),
(90, 5, 16, 2),
(91, 5, 25, 1),
(92, 3, 20, 1),
(93, 4, 16, 1),
(94, 5, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `film_title` varchar(255) NOT NULL,
  `film_genre` varchar(40) NOT NULL,
  `film_synopsis` mediumtext NOT NULL,
  `film_year` int(11) NOT NULL,
  `film_code` varchar(255) NOT NULL,
  `film_type` varchar(255) NOT NULL,
  `film_rating` int(11) NOT NULL,
  `film_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `film_title`, `film_genre`, `film_synopsis`, `film_year`, `film_code`, `film_type`, `film_rating`, `film_img`) VALUES
(1, 'Tenet', 'Sci-Fi', 'When a few objects that can be manipulated and used as weapons in the future fall into the wrong hands, a CIA operative, known as the Protagonist, must save the world.', 2019, 'L3pk_TBkihU', 'Series', 9, 'tenet.jpg'),
(8, 'Inception', 'Action', 'Cobb steals information from his targets by entering their dreams. Saito offers to wipe clean Cobbs criminal history as payment for performing an inception on his sick competitors son.', 2010, 'YoHD9XEInc0', 'Movies', 6, 'inception.jpg'),
(13, 'Nobody', 'Action', 'Hutch Mansell fails to defend himself or his family when two thieves break into his suburban home one night. The aftermath of the incident soon strikes a match to his long-simmering rage. In a barrage of fists, gunfire and squealing tires, Hutch must now save his wife and son from a dangerous adversary and ensure that he will never be underestimated again.', 2021, 'wZti8QKBWPo', 'Series', 8, 'nobody.jpg'),
(14, 'Interstellar', 'Sci-Fi', 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', 2014, 'F6TU69adAzE', 'Movies', 9, 'interstellar.jpg'),
(15, 'Dunkirk', 'War', 'During World War II, soldiers from the British Empire, Belgium and France try to evacuate from the town of Dunkirk during a arduous battle with German forces.', 2017, 'F-eMt3SrfFU', 'Movies', 9, 'dunkrik.jpg'),
(16, 'The Prestige', 'Mystery', 'Two friends and fellow magicians become bitter enemies after a sudden tragedy. As they devote themselves to this rivalry, they make sacrifices that bring them fame but with terrible consequences.', 2006, 'RLtaA9fFNXU', 'Movies', 7, 'the-prestige.jpg'),
(18, 'Luca', 'Animation', 'Set in a beautiful seaside town on the Italian Riviera, the original animated feature is a coming of age story about one young boy experiencing an unforgettable summer filled with gelato, pasta and endless scooter rides.', 2021, 'mYfJxlgR2jw', 'Movies', 6, 'luca.jpg'),
(19, 'Onward', 'Animation', 'In a magical realm where technological advances have taken over, Ian and Barley, two elven brothers, set out on an epic adventure to resurrect their late father for a day.', 2020, 'gn5QmllRCn4', 'Series', 7, 'onward.jpg'),
(20, '#Alive', 'Thriller', 'While a grisly virus ravages a Korean city, Joon-woo tries to stay safe by locking himself inside his apartment. Just as he loses hope, he discovers another survivor.', 2020, 'jQ8CCg1tOqc', 'Movies', 8, 'alive.jpg'),
(25, 'Snake Eyes', 'Action', 'An ancient Japanese clan called the Arashikage welcomes tenacious loner Snake Eyes after he saves the life of their heir apparent. Upon arrival in Japan, the Arashikage teach him the ways of the ninja warrior while also providing him something hes been longing for a home. However, when secrets from Snake Eyes past are revealed, his honor and allegiance get tested even if that means losing the trust of those closest to him.', 2021, 'Vd2sm63Xwfw', 'Movies', 8, 'snake-eyes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `type`) VALUES
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'arlan', 'admin'),
(4, 'member', '202cb962ac59075b964b07152d234b70', 'adi', 'member'),
(5, 'member1', '202cb962ac59075b964b07152d234b70', 'helo', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
