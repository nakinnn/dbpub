-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 09:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grad_public`
--

-- --------------------------------------------------------

--
-- Table structure for table `education_level`
--

CREATE TABLE `education_level` (
  `id` int(10) NOT NULL,
  `education_name` varchar(100) NOT NULL,
  `total_pub` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education_level`
--

INSERT INTO `education_level` (`id`, `education_name`, `total_pub`) VALUES
(1, 'ป.โท', 1),
(2, 'ป.เอก', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publication_data`
--

CREATE TABLE `publication_data` (
  `id` int(10) NOT NULL,
  `publication_data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `publication_data`
--

INSERT INTO `publication_data` (`id`, `publication_data`) VALUES
(1, 'ฐานข้อมูลระดับนานาชาติอื่น'),
(2, 'TCI กลุ่ม 1'),
(3, 'Scopus'),
(4, 'WoS'),
(5, 'TCI กลุ่ม 2'),
(6, 'SSRN'),
(7, 'EBSCO'),
(8, 'ไม่อยู่ในฐานข้อมูล');

-- --------------------------------------------------------

--
-- Table structure for table `publication_type`
--

CREATE TABLE `publication_type` (
  `id` int(10) NOT NULL,
  `publication_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `publication_type`
--

INSERT INTO `publication_type` (`id`, `publication_type`) VALUES
(1, 'วารสาร'),
(2, 'การประชุมวิชาการระดับชาติ'),
(3, 'การประชุมวิชาการระดับนานาชาติ'),
(4, 'ตีพิมพ์ลักษณะใดลักษณะหนึ่ง');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `course_name`) VALUES
(1, 'MBA'),
(2, 'MBA.Mk'),
(3, 'IMBA'),
(4, 'M.Acc'),
(5, 'MPA'),
(6, 'Ph.D.');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_status_id` int(10) NOT NULL,
  `student_course_id` int(10) NOT NULL,
  `student_principal_advisor` varchar(100) NOT NULL,
  `student_associate_advisor` varchar(100) NOT NULL,
  `student_plan_id` int(10) NOT NULL,
  `education_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `student_name`, `student_status_id`, `student_course_id`, `student_principal_advisor`, `student_associate_advisor`, `student_plan_id`, `education_level`) VALUES
('6410510060', 'ฐิติรัตน์ ประกอบเขาทอง', 3, 4, 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 'ดร.อรรถพร หวังพูนทรัพย์', 2, 2),
('6410510095', 'ธัญพิมล พิริยะนันทกร', 1, 1, 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 'ดร.อรรถพร หวังพูนทรัพย์', 1, 2),
('6410510117', 'นิรุสดี หะยีนิมะ', 1, 2, 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 'ดร.อรรถพร หวังพูนทรัพย์', 2, 2),
('6410510135', 'ปวีณ์สุดา อำพะมะ', 3, 4, 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 'ดร.อรรถพร หวังพูนทรัพย์', 1, 2),
('6410510154', 'พิมพิสา แก้วมณี', 2, 1, 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 'ดร.อรรถพร หวังพูนทรัพย์', 2, 1),
('6410510184', 'มูฮัมหมัดอัซรอฟ จูมะ', 3, 3, 'ดร.อรรถพร หวังพูนทรัพย์', 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 1, 2),
('6410510185', 'มูฮำหมัดนาอีม เฮ็งปิยา', 1, 3, 'ดร.อรรถพร หวังพูนทรัพย์', 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 1, 2),
('6410510233', 'ศุภภัชรา เดชดี', 1, 5, 'ดร.อรรถพร หวังพูนทรัพย์', 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 2, 2),
('6410510327', 'ณัฐวัตร บุญสิน', 1, 2, 'ดร.อรรถพร หวังพูนทรัพย์', 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 2, 1),
('6410510450', 'สุปวีณ์ มณีฉาย', 1, 6, 'ดร.อรรถพร หวังพูนทรัพย์', 'ผศ.ธีรวัฒน์ หังสพฤกษ์', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_plan`
--

CREATE TABLE `student_plan` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_plan`
--

INSERT INTO `student_plan` (`id`, `plan`) VALUES
(1, 'วิทยานิพนธ์'),
(2, 'สารนิพนธ์');

-- --------------------------------------------------------

--
-- Table structure for table `student_public`
--

CREATE TABLE `student_public` (
  `publication_id` int(10) NOT NULL,
  `publication_name` varchar(255) NOT NULL,
  `publication_type_id` int(10) NOT NULL,
  `publication_data_id` int(10) NOT NULL,
  `publication_used` varchar(255) NOT NULL,
  `publication_description` varchar(255) NOT NULL,
  `publication_start` date NOT NULL,
  `publication_end` date NOT NULL,
  `publication_year` year(4) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_public`
--

INSERT INTO `student_public` (`publication_id`, `publication_name`, `publication_type_id`, `publication_data_id`, `publication_used`, `publication_description`, `publication_start`, `publication_end`, `publication_year`, `student_id`) VALUES
(1, 'ปัจจัยที่ผลกระทบต่อความตั้งใจในการใช้บริการธนาคารทางอินเตอร์เน็ต ในเขตกรุงเทพมหานคร ประเทศไทย', 2, 8, '', 'การประชุมวิชาการระดับชาติด้านการบริหารจัดการ ครั้งที่ 7 ประจำปี 2558 วันที่ 28 มิถุนายน 2563 ณ อาคารวิจัยและพัฒนาองค์ความรู้เพื่อการจัดการ คณะวิทยาการจัดการ มหาวิทยาลัยสงขลานครินทร์', '2020-06-28', '2020-06-28', 2020, '6410510060'),
(2, 'ปัจจัยที่มีผลกระทบต่อการตัดสินใจซื้อเสื้อผ้าแฟชั่นผู้หญิงผ่านเครือข่ายสังคมออนไลน์บนเฟสบุ๊คในกรุงเทพมหานคร,ประเทศไทย', 2, 8, '', 'การประชุมวิชาการระดับชาติด้านการบริหารจัดการ ครั้งที่ 7 ประจำปี 2558 วันที่ 28 มิถุนายน 2563 ณ อาคารวิจัยและพัฒนาองค์ความรู้เพื่อการจัดการ คณะวิทยาการจัดการ มหาวิทยาลัยสงขลานครินทร์', '2020-06-28', '2020-06-28', 2020, '6410510095'),
(3, 'Marketing Communications of Direct Response Television Co.Ltd. in The Kingdom of Cambodia.', 2, 5, '', 'In National Conference on Administration and Management of the 8th  Songkhla: Prince of Songkla University, Hat Yai.', '2021-07-02', '2021-07-02', 2021, '6410510117'),
(4, 'Conflict Management between the State and the People: A case of Power Plant in Thailand', 1, 1, '', 'INTERNATIONAL JOURNAL OF SOCIAL SCIENCES AND MANAGEMENT  Vol 3, No 3 (2016)', '2021-07-01', '2021-07-01', 2021, '6410510135'),
(5, 'การจัดการความขัดแย้งจากโครงการก่อสร้างท่าเทียบเรือในจังหวัดสงขลาและสตูล', 2, 8, '', 'การประชุมวิชาการระดับชาติ มหาวิทยาลัยทักษิณ ครั้งที่ 25 . 10-12 มิถุนายน 2558. หอประชุมปาริชาต มหาวิทยาลัยทักษิณ : มหาวิทยาลัยทักษิณ สงขลา.', '2020-06-10', '2020-06-12', 2020, '6410510154'),
(6, 'การจัดการความขัดแย้งระหว่างรัฐกับประชาชนจากการดำเนินโครงการหรือกิจการที่อาจก่อให้เกิดผลกระทบต่อชุมชน: ข้อมูลเชิงคุณภาพจากโครงการโรงแยกก๊าสธรรมชาติจะนะ จังหวัดสงขลา', 3, 4, '', 'การประชุมหาดใหญ่วิชาการระดับชาติ ครั้งที่6 . 26 มิถุนายน 2558. มหาวิทยาลัยหาดใหญ่ : มหาวิทยาลัยหาดใหญ่.\r\n', '2020-06-26', '2020-06-26', 2020, '6410510184');

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE `student_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`id`, `status`) VALUES
(1, 'กำลังศึกษา'),
(2, 'สำเร็จการศึกษา'),
(3, 'ไม่มาลงทะเบียน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education_level`
--
ALTER TABLE `education_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_data`
--
ALTER TABLE `publication_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_type`
--
ALTER TABLE `publication_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_plan`
--
ALTER TABLE `student_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_public`
--
ALTER TABLE `student_public`
  ADD PRIMARY KEY (`publication_id`);

--
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education_level`
--
ALTER TABLE `education_level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publication_data`
--
ALTER TABLE `publication_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publication_type`
--
ALTER TABLE `publication_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_plan`
--
ALTER TABLE `student_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_public`
--
ALTER TABLE `student_public`
  MODIFY `publication_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_status`
--
ALTER TABLE `student_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
