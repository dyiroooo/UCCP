-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 06:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uccportal_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `uccp_accpaidaddmission`
--

CREATE TABLE `uccp_accpaidaddmission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_accpaidaddmission`
--

INSERT INTO `uccp_accpaidaddmission` (`id`, `name`, `status`) VALUES
(365, '312312 512512 perlota', 'Paid'),
(372, 'maalat 321321 itlog', 'Paid'),
(374, '456 456 456', 'Paid'),
(375, '789 789 789', 'Paid'),
(376, '000 000 000', 'Paid'),
(377, '111 111 111', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_accpaidenrollment`
--

CREATE TABLE `uccp_accpaidenrollment` (
  `id` int(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_accpaidenrollment`
--

INSERT INTO `uccp_accpaidenrollment` (`id`, `name`, `course`, `year`, `status`) VALUES
(54, 'clarence 512512 32131', 'BSIS', '1st Year', 'Paid'),
(56, '21421 12412 perlota', 'BSIT', '1st Year', 'Paid'),
(57, 'gelo charlse perlota', 'BSCS', '1st Year', 'Paid'),
(58, 'clar p espejo', 'BSEMC', '1st Year', 'Paid'),
(59, 'jiro allen ibia', 'BSEMC', '1st Year', 'Paid'),
(60, 'clar p espejo', 'BSCS', '1st Year', 'Paid'),
(61, 'gelo charles perlota', 'BSCS', '1st Year', 'Paid'),
(62, 'jiro alien ibia', 'BSCS', '1st Year', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_add_courses`
--

CREATE TABLE `uccp_add_courses` (
  `id` int(11) NOT NULL,
  `courses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_add_courses`
--

INSERT INTO `uccp_add_courses` (`id`, `courses`) VALUES
(40, 'BSCS'),
(43, 'BSEMC'),
(44, 'BSIT'),
(45, 'BSIS');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_admission`
--

CREATE TABLE `uccp_admission` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Number` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `G-Occupation` varchar(255) NOT NULL,
  `G-Contact` int(20) NOT NULL,
  `G-Adress` varchar(255) NOT NULL,
  `Primary` varchar(255) NOT NULL,
  `Primary-Sy` varchar(255) NOT NULL,
  `Highschool` varchar(255) NOT NULL,
  `Highschool-Sy` varchar(255) NOT NULL,
  `Shs` varchar(255) NOT NULL,
  `Shs-Sy` varchar(255) NOT NULL,
  `Firstchoice` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Proof` varchar(255) NOT NULL,
  `Card` varchar(255) NOT NULL,
  `Schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uccp_admission_billing`
--

CREATE TABLE `uccp_admission_billing` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Number` int(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `G-Occupation` varchar(255) NOT NULL,
  `G-Contact` int(20) NOT NULL,
  `G-Adress` varchar(255) NOT NULL,
  `Primary` varchar(255) NOT NULL,
  `Primary-Sy` varchar(255) NOT NULL,
  `Highschool` varchar(255) NOT NULL,
  `Highschool-Sy` varchar(255) NOT NULL,
  `Shs` varchar(255) NOT NULL,
  `Shs-Sy` varchar(255) NOT NULL,
  `Firstchoice` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Proof` varchar(255) NOT NULL,
  `Card` varchar(255) NOT NULL,
  `Schoolyear` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_admission_billing`
--

INSERT INTO `uccp_admission_billing` (`id`, `Name`, `Gender`, `Birthday`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, `G-Contact`, `G-Adress`, `Primary`, `Primary-Sy`, `Highschool`, `Highschool-Sy`, `Shs`, `Shs-Sy`, `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear`, `type`, `totalprice`, `status`) VALUES
(367, 'jiro allen ibia', 'Male', '2022-11-27', 213213, 'ibiajiro@gmail.com', '1231312', '321312', '312321', 321321321, '321321321', '321321', '321321', '21321', '213213', '321321', '123213', 'BSIT', '1669482868695Espejo, Clarence -Xampp Control Panel.png', '5008448606086Slide34.PNG', '6677931474782Slide29.PNG', '3338965737391Slide37.PNG', '2022-2023', 'Admission', '100', ''),
(368, 'angelo charles perlota', 'Female', '2022-11-27', 312312, 'angeloperlota38@gmail.com', '12412412', '12412', '4124', 412412, '412412', '4124', '124214', '412412', '124124', '412412', '12421', 'BSIS', '1669482919526Slide33.PNG', '5008448758579Slide34.PNG', '6677931678105Slide36.PNG', '3338965839052Slide36.PNG', '2022-2023', 'Admission', '100', ''),
(369, 'clarence p espejo', 'Male', '2022-11-27', 2147483647, '2pokendo@gmail.com', '321312321', '1232132', '3213', 312312321, '321321', '312321', '321321', '21321', '3213', '321321321', '312321', 'BSEMC', '1669482998566Slide30.PNG', '5008448995698Slide36.PNG', '6677931994264Slide35.PNG', '3338965997132Slide37.PNG', '2022-2023', '', '', ''),
(370, 'wakanda www poreber', 'Male', '2022-11-27', 312321, 'poreberwakanda71@gmail.com', '312312', '12321312', '3123', 312321312, '312321321', '321321', '312321', '321321', '321321', '123213213', '312312312', 'BSCS', '1669483047675Espejo, Clarence -Xampp Control Panel.png', '5008449143027Slide34.PNG', '6677932190703Slide36.PNG', '3338966095351aaaa.png', '2022-2023', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_admission_schedule`
--

CREATE TABLE `uccp_admission_schedule` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_admission_schedule`
--

INSERT INTO `uccp_admission_schedule` (`id`, `status`, `schoolyear`) VALUES
(280, 'Open', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_course`
--

CREATE TABLE `uccp_course` (
  `id` int(30) NOT NULL,
  `type` varchar(255) NOT NULL,
  `courses` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_course`
--

INSERT INTO `uccp_course` (`id`, `type`, `courses`, `yearlevel`, `totalprice`) VALUES
(1, 'Admission', '', '1st', 100),
(2, '', 'BSCS', '3rd', 300),
(3, '', 'BSIT', '2nd', 250),
(5, '', 'BSOAD', '2nd', 450),
(6, '', 'BSTM', '4th', 500);

-- --------------------------------------------------------

--
-- Table structure for table `uccp_coursefee`
--

CREATE TABLE `uccp_coursefee` (
  `id` int(30) NOT NULL,
  `type` varchar(255) NOT NULL,
  `courses` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_coursefee`
--

INSERT INTO `uccp_coursefee` (`id`, `type`, `courses`, `yearlevel`, `totalprice`) VALUES
(1, 'Admission', '', '', 100),
(2, '', 'BSCS', '3rd', 300),
(3, '', 'BSIT', '2nd', 250),
(6, '', 'BSTM', '4th', 500),
(10, '', 'BSCS', '2nd', 800),
(11, '', 'bsaa', '1st', 12312);

-- --------------------------------------------------------

--
-- Table structure for table `uccp_enrolled`
--

CREATE TABLE `uccp_enrolled` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `diploma` varchar(255) NOT NULL,
  `goodmoral` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_enrolled`
--

INSERT INTO `uccp_enrolled` (`id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`, `status`, `username`, `password`, `account_type`) VALUES
(54, 'clarence 512512 32131', 'Female', '12323211', '2pokendo@gmail.com', '1231232321', 'BSIS', '1st Year', '2022-2023', '1st', '1669482151726Slide33.PNG', '5008446455178Slide34.PNG', '6677928606904Slide36.PNG', '3338964303452Slide34.PNG', '8347410758630Slide33.PNG', '10016892910356Slide29.PNG', 'Paid', '2pokendo@gmail.com', 'clarence51251232131', '1'),
(56, '21421 12412 perlota', 'Female', '213123', '2pokendo@gmail.com', '21321321', 'BSIT', '1st Year', '2021-2022', '2nd', '1669482664175Slide30.PNG', '5008447992527Slide29.PNG', '6677930656703Slide35.PNG', '3338965328351Slide27.PNG', '8347413320879Slide34.PNG', '10016895985055Slide26.PNG', 'Paid', '2pokendo@gmail.com', '2142112412perlota', '1'),
(57, 'gelo charlse perlota', 'Male', '12312', 'angeloperlota38@gmail.com', '321312321', 'BSCS', '1st Year', '2021-2022', '2nd', '1669484059154Slide35.PNG', '5008452177462Slide27.PNG', '6677936236616Slide36.PNG', '3338968118308Slide27.PNG', '8347420295770Espejo, Clarence - Xampp Dashboard.png', '10016904354924Slide30.PNG', 'Paid', 'angeloperlota38@gmail.com', 'gelocharlseperlota', '1'),
(58, 'clar p espejo', 'Male', '12321', '2pokendo@gmail.com', '321321312', 'BSEMC', '1st Year', '2021-2022', '2nd', '1669484099064Espejo, Clarence - Xampp Dashboard.png', '5008452297194aaaa.png', '6677936396258Espejo, Clarence -Xampp Control Panel.png', '3338968198129Slide27.PNG', '83474204953233-19-2022.png', '10016904594388Espejo, Clarence - Xampp Dashboard.png', 'Paid', '2pokendo@gmail.com', 'clarpespejo', '1'),
(59, 'jiro allen ibia', 'Female', '231312', 'ibiajiro@gmail.com', '3123213', 'BSEMC', '1st Year', '2021-2022', '2nd', '1669484126100Espejo, Clarence - Xampp Dashboard.png', '5008452378302Espejo, Clarence -Xampp Control Panel.png', '6677936504402Slide37.PNG', '33389682522013-19-2022.png', '8347420630503aaaa.png', '10016904756604Espejo, Clarence -Xampp Control Panel.png', 'Paid', 'ibiajiro@gmail.com', 'jiroallenibia', '1'),
(60, 'clar p espejo', 'Male', '231231', '2pokendo@gmail.com', '312312', 'BSCS', '1st Year', '2021-2022', '2nd', '1669484491214122190474_1449013528635431_5602754359255891172_n.jpg', '5008453473644aaaa.png', '6677937964859Espejo, Clarence -Xampp Control Panel.png', '3338968982429Slide36.PNG', '8347422456073Slide34.PNG', '10016906947288Slide36.PNG', 'Paid', '2pokendo@gmail.com', 'clarpespejo', '1'),
(61, 'gelo charles perlota', '', '321312', 'angeloperlota38@gmail.com', '3123123', 'BSCS', '1st Year', '2021-2022', '2nd', '1669484600450Slide27.PNG', '5008453801350aaaa.png', '6677938401800Espejo, Clarence - Xampp Dashboard.png', '3338969200900Slide34.PNG', '8347423002250Espejo, Clarence -Xampp Control Panel.png', '10016907602700Slide35.PNG', 'Paid', 'angeloperlota38@gmail.com', 'gelocharlesperlota', '1'),
(62, 'jiro alien ibia', 'Male', '1312321', 'ibiajiro@gmail.com', '321312321', 'BSCS', '1st Year', '2021-2022', '2nd', '1669484630893Slide34.PNG', '5008453892679Espejo, Clarence - Xampp Dashboard.png', '6677938523573aaaa.png', '33389692617863-19-2022.png', '8347423154466aaaa.png', '10016907785359Espejo, Clarence -Xampp Control Panel.png', 'Paid', 'ibiajiro@gmail.com', 'jiroalienibia', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_enrollee`
--

CREATE TABLE `uccp_enrollee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `diploma` varchar(255) NOT NULL,
  `goodmoral` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uccp_enrollment_billing`
--

CREATE TABLE `uccp_enrollment_billing` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `diploma` varchar(255) NOT NULL,
  `goodmoral` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uccp_enrollment_schedule`
--

CREATE TABLE `uccp_enrollment_schedule` (
  `id` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_enrollment_schedule`
--

INSERT INTO `uccp_enrollment_schedule` (`id`, `status`, `schoolyear`, `sem`) VALUES
(61, 'Open', '2021-2022', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_examinees`
--

CREATE TABLE `uccp_examinees` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Number` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `G-Occupation` varchar(255) NOT NULL,
  `G-Contact` int(20) NOT NULL,
  `G-Adress` varchar(255) NOT NULL,
  `Primary` varchar(255) NOT NULL,
  `Primary-Sy` varchar(255) NOT NULL,
  `Highschool` varchar(255) NOT NULL,
  `Highschool-Sy` varchar(255) NOT NULL,
  `Shs` varchar(255) NOT NULL,
  `Shs-Sy` varchar(255) NOT NULL,
  `Firstchoice` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Proof` varchar(255) NOT NULL,
  `Card` varchar(255) NOT NULL,
  `Schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uccp_login`
--

CREATE TABLE `uccp_login` (
  `id` int(11) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Usertype` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_login`
--

INSERT INTO `uccp_login` (`id`, `Username`, `Email`, `Usertype`, `Password`) VALUES
(1, 'registrar', 'registrar@gmail.com', '3', 'registrar'),
(2, 'accounting', 'accounting@gmail.com', '4', 'accounting'),
(3, 'deans', 'dean@gmail.com', '5', 'deans'),
(4, 'admin', 'admin@gmail.com', '6', 'admin'),
(38, 'angeloperlota38@gmail.com', '', '1', 'angelo11perlota1'),
(44, '', '', '', ''),
(45, 'poreberwakanda71@gmail.com', '', '1', 'angelo1perlota'),
(46, '2pokendo@gmail.com', '', '1', '3123123313213232131'),
(48, '2pokendo@gmail.com', '', '1', 'clarencepascualespejo'),
(49, '2pokendo@gmail.com', '', '1', 'gelodperlota'),
(50, '2pokendo@gmail.com', '', '1', 'clarence512512espejo'),
(51, '2pokendo@gmail.com', '', '1', 'clarencedperlota'),
(52, '2pokendo@gmail.com', '', '1', '3123123dperlota'),
(53, '2pokendo@gmail.com', '', '1', '2142112412perlota'),
(54, '2pokendo@gmail.com', '', '1', 'clarence51251232131'),
(56, '2pokendo@gmail.com', '', '1', '2142112412perlota'),
(57, 'angeloperlota38@gmail.com', '', '1', 'gelocharlseperlota'),
(58, '2pokendo@gmail.com', '', '1', 'clarpespejo'),
(59, 'ibiajiro@gmail.com', '', '1', 'jiroallenibia'),
(60, '2pokendo@gmail.com', '', '1', 'clarpespejo'),
(61, 'angeloperlota38@gmail.com', '', '1', 'gelocharlesperlota'),
(62, 'ibiajiro@gmail.com', '', '1', 'jiroalienibia');

-- --------------------------------------------------------

--
-- Table structure for table `uccp_passers`
--

CREATE TABLE `uccp_passers` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Number` int(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `G-Occupation` varchar(255) NOT NULL,
  `G-Contact` int(20) NOT NULL,
  `G-Adress` varchar(255) NOT NULL,
  `Primary` varchar(255) NOT NULL,
  `Primary-Sy` varchar(255) NOT NULL,
  `Highschool` varchar(255) NOT NULL,
  `Highschool-Sy` varchar(255) NOT NULL,
  `Shs` varchar(255) NOT NULL,
  `Shs-Sy` varchar(255) NOT NULL,
  `Firstchoice` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Proof` varchar(255) NOT NULL,
  `Card` varchar(255) NOT NULL,
  `Schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uccp_passers`
--

INSERT INTO `uccp_passers` (`id`, `Name`, `Gender`, `Birthday`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, `G-Contact`, `G-Adress`, `Primary`, `Primary-Sy`, `Highschool`, `Highschool-Sy`, `Shs`, `Shs-Sy`, `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear`) VALUES
(365, '312312 512512 perlota', 'Male', '2022-11-27', 2312321, '2pokendo@gmail.com', 'Barrio Pacita', '123123123', '2312321', 321321321, '31', '3', '13', '3', '133123', '21321', '113', 'BSEMC', '1669481938518Slide27.PNG', '5008445815555Slide34.PNG', '6677927754073Slide36.PNG', '3338963877036Slide36.PNG', '2027-2028'),
(372, 'maalat 321321 itlog', 'Female', '2022-11-27', 3213213, '20200081m.aniceto.kenneth.bscs', '123213213', '3213', '13', 2147483647, 'Barrio Pacita', '412414', '12412', '124214', '4124214', '412421421', '412421412', 'BSCS', '1669483506795mente.jpg', '5008450520387gelo.jpg', '6677934027183clar.jpg', '3338967013591jiro.jpg', '2022-2023'),
(374, '456 456 456', 'Female', '2022-11-27', 456, '2pokendo@gmail.com', '546', '546', '546', 546, '456', '546', '546', '546', '546', '546', '546', 'BSEMC', '1669483602162Slide36.PNG', '5008450806486Slide34.PNG', '6677934408648Slide36.PNG', '3338967204324Slide30.PNG', '2022-2023'),
(375, '789 789 789', 'Male', '2022-11-27', 789, 'ibiajiro@gmail.com', 'Barrio Pacita', '789', '789', 789, '789', '789', '789', '879', '789', '879', '879', 'BSIT', '1669483656104Slide27.PNG', '5008450968314Espejo, Clarence - Xampp Dashboard.png', '6677934624419Espejo, Clarence - Xampp Dashboard.png', '3338967312209Espejo, Clarence -Xampp Control Panel.png', '2022-2023'),
(376, '000 000 000', 'Male', '2022-11-27', 0, 'angeloperlota38@gmail.com', '000', '000', '000', 0, '000', '000', '000', '000', '000', '000', '000', 'BSEMC', '16694836961573-19-2022.png', '5008451088473Espejo, Clarence - Xampp Dashboard.png', '6677934784631Slide28.PNG', '3338967392315aaaa.png', '2022-2023'),
(377, '111 111 111', 'Female', '2022-11-27', 111, 'angeloperlota38@gmail.com', '111', '111', '111', 11, '111', '11', '11', '11', '11', '11', '11', 'BSEMC', '1669483729462Espejo, Clarence -Xampp Control Panel.png', '5008451188386aaaa.png', '6677934917848Slide36.PNG', '3338967458924Espejo, Clarence - Xampp Dashboard.png', '2022-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uccp_accpaidaddmission`
--
ALTER TABLE `uccp_accpaidaddmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_accpaidenrollment`
--
ALTER TABLE `uccp_accpaidenrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_add_courses`
--
ALTER TABLE `uccp_add_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_admission`
--
ALTER TABLE `uccp_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_admission_billing`
--
ALTER TABLE `uccp_admission_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_admission_schedule`
--
ALTER TABLE `uccp_admission_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_course`
--
ALTER TABLE `uccp_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_coursefee`
--
ALTER TABLE `uccp_coursefee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_enrolled`
--
ALTER TABLE `uccp_enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_enrollee`
--
ALTER TABLE `uccp_enrollee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_enrollment_billing`
--
ALTER TABLE `uccp_enrollment_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_enrollment_schedule`
--
ALTER TABLE `uccp_enrollment_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_examinees`
--
ALTER TABLE `uccp_examinees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_login`
--
ALTER TABLE `uccp_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uccp_passers`
--
ALTER TABLE `uccp_passers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uccp_accpaidaddmission`
--
ALTER TABLE `uccp_accpaidaddmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `uccp_accpaidenrollment`
--
ALTER TABLE `uccp_accpaidenrollment`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `uccp_add_courses`
--
ALTER TABLE `uccp_add_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `uccp_admission`
--
ALTER TABLE `uccp_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `uccp_admission_billing`
--
ALTER TABLE `uccp_admission_billing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `uccp_admission_schedule`
--
ALTER TABLE `uccp_admission_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `uccp_course`
--
ALTER TABLE `uccp_course`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uccp_coursefee`
--
ALTER TABLE `uccp_coursefee`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `uccp_enrolled`
--
ALTER TABLE `uccp_enrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `uccp_enrollee`
--
ALTER TABLE `uccp_enrollee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `uccp_enrollment_billing`
--
ALTER TABLE `uccp_enrollment_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `uccp_enrollment_schedule`
--
ALTER TABLE `uccp_enrollment_schedule`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `uccp_examinees`
--
ALTER TABLE `uccp_examinees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `uccp_login`
--
ALTER TABLE `uccp_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `uccp_passers`
--
ALTER TABLE `uccp_passers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
