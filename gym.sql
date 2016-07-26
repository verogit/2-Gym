CREATE SCHEMA IF NOT EXISTS `gym` DEFAULT CHARACTER set utf8;
use `gym`;
-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2016 a las 19:06:33
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_time` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `id_time` (`id_time`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `booking`
--

INSERT INTO `booking` (`id_booking`, `id_time`, `id_user`) VALUES
(1, 9, 4),
(2, 9, 4),
(4, 18, 4),
(10, 13, 4),
(11, 13, 4),
(12, 13, 4),
(13, 13, 4),
(14, 13, 4),
(15, 13, 4),
(22, 18, 10),
(23, 11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `name_class` varchar(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`id_class`, `name_class`, `description`) VALUES
(1, 'BOX-FIT', 'Boxfit is a cardiovascular workout with classes lasting between 45 mins to one hour. It is based on the training used for boxing so it includes skipping, boxing drills including footwork and abdominal workouts – all focusing on fitness and toning.'),
(2, 'SPIN', 'This indoor bike tilts, turns, leans, and steers so it feels like a real road bike. RealRyder gives your body a 5-in-1 workout that focuses on cardio and legs while also working your core and upper body and balance. Cycle your way to a six pack!'),
(3, 'AQUA_FIT', 'Aqua aerobics is a low impact class with a mixture of aerobic and toning exercises to help you increase muscle tone, fle'),
(4, 'Hit CIRCUITS', 'Circuits like you have never experienced before. Functional training aims to shed body fat and challende your fitness.'),
(10, 'Zumba', 'Ditch the workout and join the party!! With Latin inspired music and  dance moves!'),
(21, 'Total Body Condition', 'This class will focus on toning up every aspect of your body with a combination of using your own body resistance and weights.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `contact_us`
--

INSERT INTO `contact_us` (`id_contact`, `name`, `phone_number`, `email`, `message`) VALUES
(3, 'vero', '12345', 'vero@test.com', 'holaaaaaaaaaa'),
(6, 'v', 'v', 'v@f.com', 'fdsdfgfdfd'),
(7, 'v', '123', 'v@tesy.com', '1233445tfvcx'),
(8, 'v', '123', 'v@tesy.com', '1233445tfvcx'),
(9, 'vero', '29042016', 'v@test.com', 'this is a test 24/04/2016 17:04'),
(11, 'Veronica Diegues', '08976654321', 'vero.diegues@gmail.com', 'Dear Manager of Super Fitness,\r\n\r\nI am writing in order to book a zumba class for 30 people in your ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `home_feature`
--

CREATE TABLE IF NOT EXISTS `home_feature` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `information` varchar(200) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `name_image` varchar(150) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id_image`, `name_image`) VALUES
(26, 'abdominal-1203880_960_720.jpg'),
(27, 'active-19413_960_720 .jpg'),
(28, 'belly-2354_960_720.jpg'),
(29, 'Class4.jpg'),
(30, 'crossfit-534615_960_720.jpg'),
(31, 'Gym1.jpeg'),
(32, 'Gym2.jpg'),
(33, 'gym-455164_960_720.jpg'),
(34, 'gym-526995_960_720.jpg'),
(35, 'gymer-1126999_960_720.jpg'),
(36, 'male-719539_960_720.jpg'),
(37, 'male-719549_960_720 (1).jpg'),
(38, 'oak-ridge-104060_960_720.jpg'),
(39, 'photo-1434608519344-49d77a699e1d.jpg'),
(40, 'photo-1434656742621-5c4a7d73d0e7.jpg'),
(41, 'photo-1434682881908-b43d0467b798.jpg'),
(42, 'photo-1437935690510-49ce2c715aee.jpg'),
(43, 'pilates.jpg'),
(44, 'Relax.jpg'),
(45, 'sneakers-933127_960_720.jpg'),
(46, 'training-828764_960_720.jpg'),
(47, 'weights-652488_960_720.jpg'),
(48, 'workingOut.jpg'),
(49, 'zumba.jpeg'),
(50, '926197_651346114919717_1533551050_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id_membership` int(11) NOT NULL AUTO_INCREMENT,
  `name_membership` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_membership`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `membership`
--

INSERT INTO `membership` (`id_membership`, `name_membership`, `price`, `description`) VALUES
(1, 'BLACK LABEL', 50, 'Black Label is an exclusive membership available only in Bondi Platinum and Sydney CBD George Street Platinum Clubs with'),
(2, 'HOME LABEL', 15, 'Home membership allows you to access your nominated Fitness First club (available in a few selected clubs only'),
(3, 'PASSPORT', 28, 'Passport membership allows you to access to all our passport clubs nationwide.'),
(4, 'PLATINUM', 33, 'Platinum membership allows you to access all our clubs nationwide, including our city clubs.\n ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(25) NOT NULL,
  `info1` varchar(200) DEFAULT NULL,
  `info2` varchar(200) DEFAULT NULL,
  `name_img1` varchar(200) DEFAULT NULL,
  `name_img2` varchar(200) DEFAULT NULL,
  `feature1` varchar(200) DEFAULT NULL,
  `feature2` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id_page`, `page_name`, `info1`, `info2`, `name_img1`, `name_img2`, `feature1`, `feature2`) VALUES
(1, 'HOME', NULL, NULL, NULL, NULL, 'Special offer\r\nIf you register now you will have a 25% discount', 'See our new classes'),
(2, 'new page', 'the bests', 'sefgdgsdfd', 'abdominal-1203880_960_720.jpg', 'Gym1.jpeg', NULL, NULL),
(7, 'dfhgfgh', 'aeg shfmgsklgfb sgkdkgdfmngòmdf hòdfmhdh òdh hòdfhmòdlh', 'sngkd fhn sdgòlg òf lgn sfgdlfh òfldfhdfh dhdfhd fhdh dh ', 'oak-ridge-104060_960_720.jpg', 'Gym2.jpg', NULL, NULL),
(10, 'dfhgfgh', 'aeg shfmgsklgfb sgkdkgdfmngòmdf hòdfmhdh òdh hòdfhmòdlh', 'sngkd fhn sdgòlg òf lgn sfgdlfh òfldfhdfh dhdfhd fhdh dh ', 'abdominal-1203880_960_720.jpg', 'abdominal-1203880_960_720.jpg', NULL, NULL),
(12, 'teryrtutyu', 'shhfghfg', 'rgrhgrth', 'Relax.jpg', 'Gym2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` varchar(20) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
('admin', 'administrator'),
('user', 'member');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `first_name`, `last_name`, `phone_number`, `email`) VALUES
(2, 'Veronica', 'Dieguez', '0859837289', ''),
(3, 'Jully', 'Nevado', '0835266401', ''),
(4, 'gabo', 'gonzalez', '123456', 'gabo@test.com'),
(8, 'pedro', 'perez', '123456', 'pedro@test.com'),
(10, 'Britney', 'Spears', '087543211', 'bspears@gmail.com'),
(12, 'David', 'Byrne', '087654321', 'dbyrn@gmail.com'),
(13, 'pepito', 'perez', '15255', 'pepito@test.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id_testemonials` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `is_approved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_testemonials`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `testimonials`
--

INSERT INTO `testimonials` (`id_testemonials`, `id_user`, `title`, `detail`, `is_approved`) VALUES
(11, 10, 'TEST', 'TEST the best gym ', 'YES'),
(20, 10, 'Amazing place!!', '“The Super Fitness … Even though i have trained for years n enjoy training, some gyms can be painful, lack of knowledge, lack of equipment, lack of pure enthusiasm, in the super fitness it has everything, staff and gym users with serious knowledge, ample amounts of equipment, and the enthusiasm as u can see by there bootcamp is infectious, if u wanna place to train and help with goals this is your place..”', 'YES'),
(21, 10, 'Fab place!', '“Joining The Super Fitness for me wasnt joining another gym. It meant becoming part of one big team. Always someone to help you out or offer encouragement if needed. I always look forward to the next training session and its never an hour on a treadmill staring at the tv!! It was daunting at first stepping out of my comfort zone, but I have never looked back. I would say to anyone looking to make a change in their training or to take the first step in a fitness routine, visit Super Fitness be an inspiration!!. You wont be disappointed.”', 'YES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_class`
--

CREATE TABLE IF NOT EXISTS `time_class` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `id_class` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `days` varchar(20) DEFAULT NULL,
  `hour` varchar(20) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_time`),
  KEY `id_class` (`id_class`),
  KEY `id_teacher` (`id_teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `time_class`
--

INSERT INTO `time_class` (`id_time`, `id_class`, `id_teacher`, `days`, `hour`, `duration`) VALUES
(9, 2, 4, 'Tuesday', '7:00', '45'),
(11, 4, 8, 'Wednesday', '15:00', '30'),
(13, 1, 2, 'Frieday', '10:00', '45'),
(17, 10, 3, 'Monday', '19:00', '45'),
(18, 2, 4, 'Saturday', '10:00', '30'),
(25, 1, 2, 'Sunday', '12:00', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password`) VALUES
(1, 'admin', 'Alex', 'Cronin', '0837727377', 'alex.cronin@gcd.ie', 'admin', 'password'),
(4, 'user', 'Vero', 'Dieguez', '123456', 'vero@test.com', 'vero', 'vero'),
(7, 'user', 'ddd', 'ddd', '152', 'v@t.com', 'vd', 'vd'),
(8, 'user', 'ddd', 'ddd', '152', 'v@t.com', 'vd', 'vd'),
(9, 'user', 'Mauro', 'Pessoa', '0879939979', 'mauro.micelli@gmail.com', 'mauropesso', 'mauropesso'),
(10, 'user', 'Jully', 'Nevado', '24042016', 'jully@test.com', 'jully', 'jully'),
(11, 'user', 'Matthew', 'Cunningham', '087654321', 'mattcunninham@gmail.com', 'matthew', '1234'),
(12, 'user', 'Jully', 'Gomez', '087612345', 'jgomez@gmail.com', 'Jully', '0987');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `time_class` (`id_time`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `time_class`
--
ALTER TABLE `time_class`
  ADD CONSTRAINT `time_class_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_class_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
