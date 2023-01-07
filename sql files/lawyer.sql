-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 08:56 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `online_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `online_status`) VALUES
(1, 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `related` varchar(350) NOT NULL,
  `contact_reason` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`contact_id`, `name`, `email`, `related`, `contact_reason`, `status`) VALUES
(1, 'Mueez Aslam', 'mueez@gmail.com', 'Everything', 'Nothing', 0),
(2, 'Mueez Aslam', 'mueez@gmail.com', 'Everything', 'Nothing', 0),
(3, 'Mueez Aslam', 'mueez@gmail.com', 'Poor', 'lakdfjlkasflkjasldkjflk', 0),
(4, 'asad', 'asadali@gmail.com', 'new user fareed tezzing me remove him', 'new user fareed tezzing me remove him', 0),
(5, 'faraz', 'farazali@gmail.com', 'client', 'remove client mushtaq he isusing language', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `msg_id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `subject` varchar(350) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `msg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_msg`
--

INSERT INTO `admin_msg` (`msg_id`, `name`, `email`, `subject`, `msg`, `msg_status`) VALUES
(15, 'Mueez Aslam', 'mueez@gmail.com', 'Helpis ', 'ahlkdsfjl aslkdjf alkjflalk adjfl', 0),
(16, 'Abdul Rehman', 'rehman@gmail.com', 'Help', 'aldsjkfklajsdflkajsdklj lkasdjflksjad', 0),
(17, 'fareed', 'fareed@gmail.com', 'asad lawyer is layer please remove him ', 'asad lawyer is layer please remove him asad lawyer is layer please remove him asad lawyer is layer please remove him asad lawyer is layer please remove him ', 0),
(18, 'mushtaq', 'mushtaq@gmail.com', 'please will you tell me faraz office details', 'please will you tell me faraz office detailsplease will you tell me faraz office details', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `client_email` varchar(250) NOT NULL,
  `client_phone` varchar(13) NOT NULL,
  `client_case_detail` varchar(2000) NOT NULL,
  `appoint_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appoint_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `lawyer_id`, `client_id`, `client_name`, `client_email`, `client_phone`, `client_case_detail`, `appoint_date`, `appoint_status`) VALUES
(15, 17, 10, 'Abdul Kabeer', 'kabeer@gmail.com', '03063494840', 'By clicking on send appointment request you agree to send your given information and to visit your profile to this lawyer and you are agreeing to our terms and condition.', '2019-01-09 18:27:14', 2),
(16, 18, 11, 'Shahzado', 'shahzado@gmail.com', '00303030303', 'By clicking on send appointment request you agree to send your given information and to visit your profile to this lawyer and you are agreeing to our terms and condition.', '2019-01-09 19:57:40', 2),
(17, 20, 14, 'fareed', 'fareed@gmail.com', '03216549874', 'I am very upset about my case one and two something this is just dummy text', '2019-01-10 14:03:51', 1),
(18, 17, 11, 'Shahzado', 'shahzado@gmail.com', '00303030303', 'Er. Lorem ipsum dolor sit amet,At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, At vero eos et accusam et justo duo dolores et ea rebum', '2019-01-10 14:39:16', 1),
(19, 21, 15, 'mushtaq', 'mushtaq@gmail.com', '12345678999', 'I am fighting he is a criminal and gain property', '2019-01-11 11:34:11', 1),
(20, 21, 11, 'shahzado', 'shahzado@gmail.com', '12345678999', 'I am fighting he is a criminal and gain property', '2019-01-11 11:34:11', 1),
(21, 22, 16, 'muhiuddin', 'muhiuddin@gmail.com', '21212121212', 'dummy text dummy textdummy textdummy textdummy textdummy textdummy text', '2019-01-12 17:14:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `caste` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `online_status` int(11) NOT NULL,
  `account_status` varchar(50) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`user_id`, `name`, `caste`, `gender`, `city`, `address`, `reason`, `phone`, `email`, `password`, `profile_pic`, `online_status`, `account_status`) VALUES
(10, 'Abdul Kabeer', 'Narejo', 'Male', 'Hyderabad', 'lakjfdsl alkdsjf', 'Lorem Ipsum is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset. ', '03063494840', 'kabeer@gmail.com', 'demo123', 'std1.jpg', 0, 'client'),
(11, 'Shahzado', 'Jamali', 'Male', 'Kotri', 'klasdlkfjas', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', '00303030303', 'shahzado@gmail.com', 'demo123', 'std7.jpg', 0, 'client'),
(12, 'Muhammad Haseeb', 'Narejo', 'Male', 'Mehar', 'Village Jumo Narejo, Tharri Mohabat, Mehar', 'Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,  Stet  et justo duo dolores et ea rebum.  ', '03123456789', 'haseeb@gmail.com', 'demo123', 'std8.jpg', 0, 'client'),
(13, 'Ateeque-ur-Rehman', 'Solangi', 'Male', 'Kotri', ' sadlfj sdf aslfj sdfl ', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', '03030303030', 'ateeq@gmail.com', 'demo123', 'std9.jpg', 0, 'client'),
(15, 'mushtaq', 'gopang', 'Male', 'kotri', 'main bazar phatak', 'i have issue with my brother he is cheating to gain proerty', '12345678999', 'mushtaq@gmail.com', 'Mushtaq000', 'std5.jpg', 0, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `caste` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `office_add` varchar(350) NOT NULL,
  `court` varchar(200) NOT NULL,
  `license` varchar(500) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `specialty` varchar(1000) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `online_status` int(11) NOT NULL,
  `account_status` varchar(50) NOT NULL DEFAULT 'lawyer',
  `account_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`user_id`, `name`, `caste`, `gender`, `city`, `office_add`, `court`, `license`, `phone`, `email`, `password`, `about`, `specialty`, `profile_pic`, `online_status`, `account_status`, `account_views`) VALUES
(15, 'Rashid Ali', 'Chandio', 'Male', 'Kotri', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore  ', 'Supreme', '123kjhkjaasdh1', '03030303303', 'rashid@gmail.com', 'demo123', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', 'Health', 'std5.jpg', 0, 'lawyer', 81),
(16, 'Rehman', 'Brohi', 'Male', 'Hyderabad', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor  ', 'Federal Shariat', '123kjhkjaddh1', '030303033212', 'rehman@gmail.com', 'demo123', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', 'Murder', 'std4.jpg', 0, 'lawyer', 46),
(17, 'Muhammad Mueez', 'Narejoo', 'Male', 'Sukkur', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore. Er', 'Family', '090007865014', '03012122303', 'mueez@gmail.com', 'mueez', 'Er. Lorem ipsum dolor sit amet,At vero eos et accusam et justo duo dolores et ea rebum.  Stet clita kasd gubergren,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  Lorem ipsum dolor sit amet,', 'Family Cases', 'std3.jpg', 0, 'lawyer', 69),
(18, 'Manthar', 'Burgri', 'Male', 'Johi', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor  ', 'District', '123kasdfaddh1', '01212133212', 'manthar@gmail.com', 'demo123', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', 'Buissness', 'std2.jpg', 0, 'lawyer', 19),
(19, 'M Saleh', 'Narejo', 'Male', 'Karachi', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor  ', 'Family Court', '123kasdfaddh1', '03063464740', 'saleh@gmail.com', 'demo123', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,  At vero eos et accusam et justo duo dolores et ea rebum.  Lorem ipsum dolor sit amet,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  Stet clita kasd gubergren,  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  no sea takimata sanctus est Lorem ipsum dolor sit amet.  sed diam voluptua.  ', 'Buissness', 'std10.jpg', 0, 'lawyer', 0),
(20, 'asad', 'noonari', 'Male', 'hyderabad', 'Jamshoro phtak', 'high', '44444', '03053174570', 'asadali@gmail.com', 'Asadali000', 'I am professional lawyer with in 2 year experience ', 'civil and criminal lawyer', 'std7.jpg', 0, 'lawyer', 8),
(21, 'faraz', 'jamali', 'Male', 'jamshoro', 'near alan faqeer', 'high', '1234z', '11212121121', 'farazali@gmail.com', 'Faraz000', 'i win many cases with in experince of 4 years', 'crimnimal layer', 'std9.jpg', 0, 'lawyer', 32),
(22, 'kamlesh', 'bhatia', 'Male', 'jamshoro', 'colony university', 'high', '454a', '03216549877', 'kamesh@gmail.com', 'Kamlesh000', 'I have experince more then 1 year ', 'I am a civil lawyer', 'std5.jpg', 0, 'lawyer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `send_by` varchar(250) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `lawyer_id`, `client_id`, `send_by`, `message`, `message_date`, `message_status`) VALUES
(60, 17, 10, 'client', 'Hi sir ?', '2019-01-09 19:16:50', 2),
(61, 17, 10, 'lawyer', 'Yes ?', '2019-01-09 19:42:05', 2),
(62, 17, 10, 'client', 'Sir, please accept my appointment!', '2019-01-09 19:48:43', 2),
(66, 18, 11, 'client', 'Sir ?', '2019-01-09 20:13:31', 0),
(67, 20, 0, 'lawyer', 'fareed', '2019-01-10 14:04:56', 0),
(68, 20, 0, 'lawyer', 'hello fareed what is your problem please elaborate', '2019-01-10 14:05:23', 0),
(69, 20, 14, 'client', 'hello asad will you help me out to this case I will give a good price ', '2019-01-10 14:08:52', 0),
(70, 17, 10, 'lawyer', 'Dear?', '2019-01-10 14:37:26', 2),
(71, 17, 10, 'lawyer', 'Listen', '2019-01-10 14:37:43', 2),
(72, 17, 11, 'client', 'Sir please accept my request !', '2019-01-10 14:50:19', 0),
(73, 17, 11, 'lawyer', 'What is your quote?', '2019-01-10 15:21:33', 0),
(74, 17, 11, 'lawyer', '?', '2019-01-10 15:21:42', 0),
(75, 21, 15, 'lawyer', 'will you elaborate about your case', '2019-01-11 11:37:59', 0),
(76, 21, 15, 'client', 'yeh sure', '2019-01-11 11:38:54', 0),
(77, 21, 15, 'lawyer', 'What are you doing?', '2019-01-11 11:40:30', 0),
(78, 21, 15, 'lawyer', 'Nothing', '2019-01-11 16:54:53', 0),
(83, 21, 15, 'lawyer', 'hi', '2019-01-11 19:27:18', 0),
(84, 21, 11, 'client', 'hi sir', '2019-01-11 19:32:14', 0),
(85, 21, 15, 'lawyer', '?', '2019-01-11 19:39:17', 0),
(86, 21, 11, 'lawyer', 'hi', '2019-01-11 19:39:27', 0),
(87, 21, 11, 'lawyer', 'shahzado', '2019-01-12 07:12:24', 0),
(88, 22, 16, 'lawyer', 'Hi mouiddin ', '2019-01-12 17:16:32', 0),
(89, 22, 16, 'client', 'Hi sir', '2019-01-12 17:17:28', 0),
(90, 22, 16, 'lawyer', 'hhhhhh', '2019-01-12 17:20:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `admin_msg`
--
ALTER TABLE `admin_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_contact`
--
ALTER TABLE `admin_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_msg`
--
ALTER TABLE `admin_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
