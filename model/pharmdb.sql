-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2021 at 04:28 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '001', 'Invalid Email or Password', 'warning'),
(2, '002', 'Settings are updated', 'success'),
(3, '003', 'Record Added Successfully', 'success'),
(4, '004', 'Record Successfully Updated', 'success'),
(5, '005', 'Record Successfully Deleted', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(10,0) NOT NULL,
  `units_sold` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productID_idx` (`product_id`),
  KEY `supplierID_idx` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `supplier_id`, `quantity`, `price`, `units_sold`) VALUES
(3, 2, 1, 203, '6532', 2),
(4, 4, 2, 62, '785', 5),
(5, 5, 10, 60, '210', 10),
(6, 6, 11, 46, '100', 25),
(8, 16, 3, 19, '20', NULL),
(9, 22, 11, 3, '1200', NULL),
(10, 17, 12, 3, '1200', 23),
(11, 1, 1, 2, '100', 0),
(12, 2, 1, 203, '6532', 0),
(13, 3, 3, 9, '100', 0),
(15, 5, 5, 6, '100', 0),
(16, 6, 6, 87, '100', 0),
(19, 8, 8, 32, '100', 0),
(27, 16, 16, 5, '100', 0),
(28, 17, 17, 7, '100', 0),
(32, 22, 2, 100, '200', 0),
(33, 23, 3, 65, '200', 0),
(35, 25, 5, 65, '200', 0),
(36, 26, 6, 20, '200', 0),
(37, 27, 7, 20, '200', 0),
(38, 28, 8, 15, '200', 0),
(39, 29, 9, 15, '200', 0),
(40, 30, 10, 15, '200', 0),
(41, 31, 11, 150, '200', 0),
(42, 32, 12, 150, '200', 0),
(43, 33, 13, 150, '200', 0),
(44, 34, 14, 150, '200', 0),
(45, 35, 15, 150, '200', 0),
(46, 36, 16, 150, '200', 0),
(47, 37, 17, 150, '200', 0),
(48, 38, 18, 150, '200', 0),
(49, 39, 19, 150, '200', 0),
(50, 40, 20, 30, '200', 0),
(51, 41, 1, 30, '300', 0),
(52, 42, 2, 30, '300', 0),
(53, 43, 3, 30, '300', 0),
(55, 45, 5, 30, '300', 0),
(56, 46, 6, 65, '300', 0),
(57, 47, 7, 65, '300', 0),
(58, 48, 8, 65, '300', 0),
(59, 49, 9, 65, '300', 0),
(60, 50, 10, 65, '300', 0),
(61, 51, 11, 12, '300', 0),
(62, 52, 12, 12, '300', 0),
(63, 53, 13, 12, '300', 0),
(64, 54, 14, 12, '300', 0),
(65, 55, 15, 40, '300', 0),
(66, 56, 16, 40, '300', 0),
(67, 57, 17, 40, '300', 0),
(68, 58, 18, 40, '300', 0),
(69, 59, 19, 75, '300', 0),
(70, 60, 20, 75, '300', 0),
(71, 61, 1, 75, '400', 0),
(72, 62, 2, 75, '400', 0),
(73, 63, 3, 75, '400', 0),
(76, 65, 5, 75, '400', 0),
(77, 66, 6, 86, '400', 0),
(78, 67, 7, 86, '400', 0),
(79, 68, 8, 86, '400', 0),
(80, 69, 9, 86, '400', 0),
(81, 70, 10, 86, '400', 0),
(82, 71, 11, 86, '400', 0),
(83, 72, 12, 968, '400', 0),
(84, 73, 13, 968, '400', 0),
(85, 74, 14, 968, '400', 0),
(86, 75, 15, 100, '400', 0),
(87, 76, 16, 100, '400', 0),
(88, 77, 17, 100, '400', 0),
(89, 78, 18, 100, '400', 0),
(90, 79, 19, 13, '400', 0),
(91, 80, 20, 13, '400', 0),
(92, 81, 1, 13, '500', 0),
(93, 82, 2, 32, '500', 0),
(94, 83, 3, 32, '500', 0),
(96, 85, 5, 145, '500', 0),
(97, 86, 6, 145, '500', 0),
(98, 87, 7, 145, '500', 0),
(99, 88, 8, 145, '500', 0),
(100, 89, 9, 45, '500', 50),
(101, 90, 10, 45, '500', 40),
(102, 91, 11, 45, '500', 10),
(103, 92, 12, 45, '500', 10),
(104, 93, 13, 565, '50', 20),
(105, 94, 14, 565, '12', 50),
(106, 95, 15, 36, '500', 50),
(107, 96, 16, 36, '5', 20),
(108, 97, 17, 36, '61', 10),
(109, 98, 18, 2, '4', 80),
(110, 99, 19, 28, '55', 10),
(111, 100, 20, 100, '69', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `license_number`) VALUES
(1, 'Ramas', '100 Abbott Park Road, Abbott Park, IL 60064', '077-45625216'),
(2, 'Alex ', 'Altens Industrial Estate, Aberdeen, AB12 3LU', '075-12458969'),
(3, 'Alford', 'Marshalls Road, Belfast, BT5 6SR', '044-25874365'),
(4, 'Ravi Kumar', 'Bexhill on Sea, Sussex, TN40 2JP', '077-45625874'),
(5, 'Santakumar', 'Bruntcliffe Lane, Morley, Leeds, LS27 0YD', '007-22388644'),
(6, 'Lucida', 'Bexhill on Sea, Sussex, TN40 2JP', '044-52981425'),
(7, 'Anderson', 'F-6 Markaz, School Road, Super Market', '045-21447739'),
(8, 'Subbarao', 'Bruntcliffe Lane, Morley, Leeds, LS27 0YD', '077-12346674'),
(9, 'Mukesh', 'Swansea Vale, Swansea, SA7 0AH', '029-12358964'),
(10, 'McDen', 'Albert Road, Bristol, BS2 0XJ', '078-22255588'),
(11, 'Ivan', 'Elliot Way, Perry Barr, Birmingham, B6 7AP', '008-22544166'),
(12, 'Benjamin', '204 Polmadie Road, Glasgow, G42 0PH', '008-22536178'),
(13, 'Sundus', 'Islamabad', '484-44555589'),
(14, 'TheYoungWolf', 'Oman', '029-12352333'),
(15, 'House Lannister', 'Bruntcliffe Lane, Morley, Leeds, LS27 0YD', '077-456513226'),
(16, 'Danaerys', 'Great Grass Sea', '8454845212'),
(18, 'Ernst', 'Elliot Way, Perry Barr, Birmingham, B6 7AP', '845-4845212'),
(26, 'Abbott', '100 Abbott Park Road, Abbott Park, IL 60064', '878-521289'),
(27, 'AHH', 'Altens Industrial Estate, Aberdeen, AB12 3LU', '654-4655191'),
(28, 'B. Braun Melsungen', 'Marshalls Road, Belfast, BT5 6SR', '454-5341806'),
(29, 'Cadila Healthcare', 'Bexhill on Sea, Sussex, TN40 2JP', '545-545116'),
(30, 'Daiichi Sankyo', 'Albert Road, Bristol, BS2 0XJ', '856-85901'),
(31, 'Ego', 'Gateshead, Tyne & Wear, NE8 4YR', '545-5454933'),
(32, 'Fabre-Kramer', '204 Polmadie Road, Glasgow, G42 0PH', '321-8543766'),
(33, 'Galderma', 'Bruntcliffe Lane, Morley, Leeds, LS27 0YD', '498-5314591'),
(34, 'Help Remedies', 'Elliot Way, Perry Barr, Birmingham, B6 7AP', '498-5314591'),
(35, 'Incepta', 'Manor Avenue, Paignton, Devon, TQ3 2HU', '498-5314591'),
(36, 'Janssen Pharmaceutica', 'Harold Hill, Romford, Essex, RM3 8SU', '498-5314591'),
(37, 'Kimia Farma', 'Stonefield Way, Ruislip, Middlesex, HA4 0JP', '498-5314591'),
(38, 'Laboratoires Pierre Fabre', 'Totton, Southampton, SO40 3SZ', '498-5314591'),
(39, 'Mallinckrodt', 'Swansea Vale, Swansea, SA7 0AH', '498-5314591'),
(40, 'NovaBay', 'Suite 1150 Emeryville, CA 94608', '498-5314591'),
(41, 'Octapharma', 'F-6 Markaz, School Road, Super Market', '498-5314591'),
(42, 'PainCeptor Pharma', 'Shop # 2, United Plaza, Blue Area, Islamabad', '498-5314591'),
(43, 'Reckitt Benckiser', 'Shop No.2, Citi bank, Khyber plaza', '498-5314591'),
(44, 'Saidal', 'Near Citi Bank, Khyber Plaza, Blue Area', '498-5314591'),
(45, 'Takeda', 'Banni Chowk', '498-5314591');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `unit` enum('ml','strip','vial','other') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `batch` varchar(45) NOT NULL,
  `manufacturer_id` int NOT NULL,
  `manufacture_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `import_date` date NOT NULL,
  `taxing` decimal(10,2) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `shelf_number` int DEFAULT NULL,
  `barcode` bigint NOT NULL,
  `comment` tinytext,
  PRIMARY KEY (`id`),
  KEY `manufacturerID_idx` (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `unit`, `batch`, `manufacturer_id`, `manufacture_date`, `expiry_date`, `import_date`, `taxing`, `category`, `shelf_number`, `barcode`, `comment`) VALUES
(1, 'Panadol', 'strip', 'bN100x3', 1, '2020-04-20', '2021-01-25', '2020-09-30', '0.00', 'Tablets', 5, 545464231, 'No comments'),
(2, 'Acalabrutinib', 'strip', 'bN24x3', 1, '2020-04-20', '2021-01-01', '2020-09-20', '0.00', 'Tablets', 2, 787412548, 'No comments'),
(3, 'Abarelix', 'strip', 'bN89x9', 2, '2020-05-20', '2021-06-25', '2020-09-20', '0.00', 'Hormones', 6, 133543159, 'No comments'),
(4, 'Abemaciclib', 'vial', 'bN25x3', 1, '2020-03-20', '2021-01-10', '2020-09-20', '0.00', 'Anticoagulants', 4, 213848799, 'No comments'),
(5, 'Acamprosate', 'strip', 'bN54x2', 2, '2020-02-20', '2021-02-21', '2020-09-20', '0.00', 'Protein', 1, 784432117, 'No comments'),
(6, 'Acarbose', 'ml', 'bN894x1', 2, '2020-01-20', '2021-04-20', '2020-09-20', '0.00', 'Alcohol Dependence', 2, 113565468, 'No comments'),
(8, 'Biaxin', 'other', 'bs909x4', 9, '2020-02-11', '2021-02-11', '2020-09-11', '0.00', 'other', 5, 5465454854, 'No comment'),
(16, 'Aspirin', 'strip', 'b200x4', 7, '2020-12-23', '2021-02-24', '2021-01-19', '0.00', 'Tablets', 9, 7875454887, 'No comments'),
(17, 'Ibrufen', 'strip', 'bh999x3', 10, '2020-12-03', '2021-01-30', '2021-01-01', '0.00', 'Tablets', 5, 4654165413, 'High Fever'),
(22, 'Beta xBlockers', 'strip', 'b600x4', 13, '2020-12-17', '2021-02-10', '2021-01-01', '0.00', 'Syrup', 12, 6841354112, ''),
(23, 'Bentyxl (dicyclomine)', 'vial', '10', 1, '2020-02-11', '2022-01-30', '2021-01-21', '2.20', 'Serup', 8, 304, ''),
(24, 'Benzaxc W', 'strip', '10', 3, '2020-02-11', '2022-01-30', '2021-01-21', '2.20', 'Vial', 9, 305, ' given slowly into a vein only'),
(25, 'Benzoxdiazepines-oral', 'ml', '2', 4, '2020-02-11', '2022-01-30', '2021-01-21', '2.20', 'Serup', 9, 306, 'treat various types of cancer'),
(26, 'Benzxoin-topical', 'strip', '10', 5, '2020-02-11', '2022-01-30', '2021-01-21', '2.20', 'Tablet', 9, 307, 'people with tumors in their pancreas to have low blood sugar'),
(27, 'Benzxonatate', 'ml', '10', 6, '2020-02-11', '2022-01-30', '2021-01-21', '2.20', 'Vial', 9, 308, 'nonsteroidal antiinflammatory drug (NSAID)'),
(28, 'Panadol', 'strip', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 1, 213, 'Used to ease headache'),
(29, 'Adalat (nifedipine)', 'ml', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 1, 214, 'Treatment and prevention of angina'),
(30, 'Actonel', 'vial', '1', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 1, 215, ' Prevent and treat certain types of bone loss'),
(31, 'Actos', 'ml', '1', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 1, 216, 'Treatment of type 2 diabetes'),
(32, 'Acular', 'strip', '1', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 2, 217, 'Ketorolac blocks prostaglandin synthesis'),
(33, 'acyclovir', 'vial', '1', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 2, 218, 'Acyclovir is an antiviral drug'),
(34, 'adalimumab', 'ml', '1', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 2, 219, 'Reducing signs and symptoms'),
(35, 'adapalene', 'strip', '1', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 2, 220, 'Treatment of acne vulgaris (pimples)'),
(36, 'Adapin (doxepin)', 'vial', '1', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 3, 221, 'Used primarily to treat depression and anxiety'),
(37, 'adefovir dipivoxil-oral', 'other', '1', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 3, 222, 'Worsening of hepatitis'),
(38, 'Adoxa (doxycycline)', 'strip', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 3, 223, 'synthetic (man-made) antibiotic'),
(39, 'Adipex-P (phentermine)', 'ml', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 3, 224, 'opens breathing passages'),
(40, 'Adrenalin', 'vial', '1', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 4, 225, ' given slowly into a vein only'),
(41, 'Adriamycin', 'ml', '1', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 4, 226, 'treat various types of cancer'),
(42, 'Adrucil', 'strip', '1', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 4, 227, 'combination of inhaled drugs'),
(43, 'Advair Diskus', 'vial', '1', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 4, 228, 'control and prevent symptoms caused by asthma'),
(44, 'Advate', 'ml', '1', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 5, 229, 'control and prevent bleeding episodes'),
(45, 'Advicor (niacin lovastatin)', 'strip', '1', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 5, 230, 'used for lowering cholesterol'),
(46, 'Advicor', 'vial', '1', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 5, 231, ' help lower \"bad\" cholesterol and fats'),
(47, 'ibuprofen', 'other', '1', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 5, 232, 'nonsteroidal anti-inflammatory drugs'),
(48, 'baclofen', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 6, 233, 'narcotic analgesic and anti-spasmodic combination'),
(49, 'BACLOFEN-INJECTION', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 6, 234, 'Tanacetum parthenium is an herb'),
(50, 'BACLOFEN-ORAL', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 6, 235, 'used to prevent minor skin infections'),
(51, 'Bactrim vs Cefdinir', 'ml', '10', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 6, 236, 'an antibiotic used to treat certain bacterial eye infections'),
(52, 'balsalazide disodium', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 7, 237, 'Blocks prostaglandin synthesis'),
(53, 'Balversa erdafitinib', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 7, 238, 'prevent minor skin infections'),
(54, 'becaplermin', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 7, 239, ' relaxes skeletal muscles'),
(55, 'beclomethasone-nasal', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 7, 240, 'used in people with multiple sclerosis'),
(56, 'belimumab (doxepin)', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 8, 241, 'short-term relief of skeletal muscle spasms'),
(57, 'benazepril', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 8, 242, 'muscle relaxant'),
(58, 'BENAZEPRIL-ORAL', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 8, 243, 'synthetic (man-made) antibiotic'),
(59, 'Bentyl (dicyclomine)', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 8, 244, 'High blood pressure'),
(60, 'Benzac W', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 9, 245, ' given slowly into a vein only'),
(61, 'benzodiazepines-oral', 'ml', '2', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 9, 246, 'treat various types of cancer'),
(62, 'benzoin-topical', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 9, 247, 'people with tumors in their pancreas to have low blood sugar'),
(63, 'benzonatate', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 9, 248, 'nonsteroidal antiinflammatory drug (NSAID)'),
(64, 'Beta Blockers', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 12, 249, 'effective in treating fever, pain'),
(65, 'betaine-oral', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 12, 250, 'used for lowering cholesterol'),
(66, 'bethanechol-oral', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 12, 251, ' inflammation and that cause pain and fever'),
(67, 'Biaxin (clarithromycin)', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 12, 252, 'nonsteroidal anti-inflammatory drugs'),
(68, 'cabergoline-oral', 'strip', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 13, 253, 'Used to ease headache'),
(69, 'Caduet', 'ml', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 13, 254, 'Treatment and prevention of angina'),
(70, 'Cafcit', 'vial', '1', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 13, 255, ' Prevent and treat certain types of bone loss'),
(71, 'calamine lotion-topical', 'ml', '1', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 13, 256, 'Treatment of type 2 diabetes'),
(72, 'Calan (verapamil)', 'strip', '1', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 23, 257, 'Ketorolac blocks prostaglandin synthesis'),
(73, 'Calcimar (calcitonin)', 'vial', '1', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 23, 258, 'Acyclovir is an antiviral drug'),
(74, 'calcitonin', 'ml', '1', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 23, 259, 'Reducing signs and symptoms'),
(75, 'calcitriol-oral', 'strip', '1', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 23, 260, 'Treatment of acne vulgaris (pimples)'),
(76, 'calcium salts (doxepin)', 'vial', '1', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 33, 261, 'Used primarily to treat depression and anxiety'),
(77, 'Calciym dipivoxil-oral', 'other', '1', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 33, 262, 'Worsening of hepatitis'),
(78, 'Calmol (doxycycline)', 'strip', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 33, 263, 'synthetic (man-made) antibiotic'),
(79, 'Caltrate-P (phentermine)', 'ml', '1', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 33, 264, 'opens breathing passages'),
(80, 'Caltrate 600 Plus', 'vial', '1', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 43, 265, ' given slowly into a vein only'),
(81, 'Caltrate', 'ml', '1', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 43, 266, 'treat various types of cancer'),
(82, 'Campath', 'strip', '1', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 43, 267, 'combination of inhaled drugs'),
(83, 'canagliflozin Diskus', 'vial', '1', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 43, 268, 'control and prevent symptoms caused by asthma'),
(84, 'candesartan', 'ml', '1', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 53, 269, 'control and prevent bleeding episodes'),
(85, 'cangrelor(abc)', 'strip', '1', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 53, 270, 'used for lowering cholesterol'),
(86, 'Cantil', 'vial', '1', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 53, 271, ' help lower \"bad\" cholesterol and fats'),
(87, 'capsaicin-topical', 'other', '1', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 5, 272, 'nonsteroidal anti-inflammatory drugs'),
(88, 'CAPTOPRIL-ORAL', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 63, 273, 'narcotic analgesic and anti-spasmodic combination'),
(89, 'carbamazsaepine-INJECTION', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 63, 274, 'Tanacetum parthenium is an herb'),
(90, 'BACLOFasEN-CARBAMAZEPI', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 64, 275, 'used to prevent minor skin infections'),
(91, 'Bactrasim vs Cefdinir', 'ml', '10', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 65, 276, 'an antibiotic used to treat certain bacterial eye infections'),
(92, 'balsalazide amide per-ORAL', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 76, 277, 'Blocks prostaglandin synthesis'),
(93, 'Cardeasne (nicardipine)', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 77, 278, 'prevent minor skin infections'),
(94, 'becaplasermin', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 78, 279, ' relaxes skeletal muscles'),
(95, 'beclosamethasone-nasal', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 79, 280, 'used in people with multiple sclerosis'),
(96, 'belimuasmab (doxepin)', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 80, 281, 'short-term relief of skeletal muscle spasms'),
(97, 'benazesapril', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 80, 282, 'muscle relaxant'),
(98, 'BENAZEasPRIL-ORAL', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 81, 283, 'synthetic (man-made) antibiotic'),
(99, 'Bencctyl (dicyclomine)', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 28, 284, 'High blood pressure'),
(100, 'Benczcsaac W', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 29, 285, ' given slowly into a vein only'),
(101, 'benzocdiazepines-oral', 'ml', '2', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 29, 286, 'treat various types of cancer'),
(102, 'benzocin-topical', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 29, 287, 'people with tumors in their pancreas to have low blood sugar'),
(103, 'benzcconatate', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 39, 288, 'nonsteroidal antiinflammatory drug (NSAID)'),
(104, 'Betac Blockers', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 12, 289, 'effective in treating fever, pain'),
(105, 'betacine-oral', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 12, 290, 'used for lowering cholesterol'),
(106, 'bethcanechol-oral', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 12, 291, ' inflammation and that cause pain and fever'),
(107, 'Biaxcin (clarithromycin)', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 12, 292, 'nonsteroidal anti-inflammatory drugs'),
(108, 'baclcofen', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 7, 293, 'narcotic analgesic and anti-spasmodic combination'),
(109, 'BACLcOFEN-INJECTION', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 7, 294, 'Tanacetum parthenium is an herb'),
(110, 'BACLcOFEN-ORAL', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 7, 295, 'used to prevent minor skin infections'),
(111, 'Bactxrim vs Cefdinir', 'ml', '10', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 7, 296, 'an antibiotic used to treat certain bacterial eye infections'),
(112, 'balsaxlazide disodium', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 8, 297, 'Blocks prostaglandin synthesis'),
(113, 'Balvexrsa erdafitinib', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 8, 298, 'prevent minor skin infections'),
(114, 'becapxlermin', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 8, 299, ' relaxes skeletal muscles'),
(115, 'becloxmethasone-nasal', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 8, 300, 'used in people with multiple sclerosis'),
(116, 'belimxumab (doxepin)', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 8, 301, 'short-term relief of skeletal muscle spasms'),
(117, 'benazxepril', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 9, 302, 'muscle relaxant'),
(118, 'BENAZxEPRIL-ORAL', 'strip', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 10, 303, 'synthetic (man-made) antibiotic'),
(119, 'Bentyxl (dicyclomine)', 'ml', '10', 1, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 8, 304, 'High blood pressure'),
(120, 'Benzaxc W', 'vial', '10', 3, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 9, 305, ' given slowly into a vein only'),
(121, 'benzoxdiazepines-oral', 'ml', '2', 4, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 9, 306, 'treat various types of cancer'),
(122, 'benzxoin-topical', 'strip', '10', 5, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 9, 307, 'people with tumors in their pancreas to have low blood sugar'),
(123, 'benzxonatate', 'vial', '10', 6, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 9, 308, 'nonsteroidal antiinflammatory drug (NSAID)'),
(124, 'Beta xBlockers', 'ml', '10', 7, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Serup', 12, 309, 'effective in treating fever, pain'),
(125, 'betaxine-oral', 'strip', '10', 8, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Tablet', 12, 310, 'used for lowering cholesterol'),
(126, 'bethanxechol-oral', 'vial', '10', 9, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Vial', 12, 311, ' inflammation and that cause pain and fever'),
(127, 'Biaxin (claristhromycin)', 'other', '10', 10, '2021-01-11', '2021-01-30', '2021-01-21', '2.20', 'Other', 12, 312, 'nonsteroidal anti-inflammatory drugs');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` enum('Admin','Pharmacist','Cashier') NOT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `salary` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_inx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `desc`, `salary`) VALUES
(1, 'Cashier', '<Enter cashier desc here>', 8000),
(2, 'Pharmacist', '<Enter pharmacist desc here>', 35000),
(3, 'Admin', '<Enter admin desc here>', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

DROP TABLE IF EXISTS `saledetails`;
CREATE TABLE IF NOT EXISTS `saledetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity_sold` int NOT NULL,
  `price_each` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `SaleID_idx` (`sale_id`),
  KEY `productID_idx` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saledetails`
--

INSERT INTO `saledetails` (`id`, `sale_id`, `product_id`, `quantity_sold`, `price_each`) VALUES
(1, 1, 1, 1, 25),
(2, 2, 3, 1, 2000),
(3, 3, 5, 1, 210),
(4, 3, 6, 1, 100),
(5, 4, 6, 1, 100),
(56, 1, 2, 3, 75),
(57, 1, 3, 5, 100),
(58, 1, 6, 2, 75),
(59, 1, 8, 3, 100),
(60, 1, 16, 2, 175),
(61, 2, 22, 8, 10),
(62, 2, 32, 9, 20),
(63, 2, 62, 7, 30),
(64, 2, 72, 5, 30),
(65, 2, 76, 3, 50),
(66, 3, 70, 1, 100),
(67, 3, 30, 5, 120),
(68, 3, 16, 3, 90),
(69, 3, 23, 1, 70),
(70, 3, 68, 3, 150),
(71, 4, 52, 6, 100),
(72, 4, 32, 7, 65),
(73, 4, 47, 6, 9000),
(74, 4, 52, 5, 87),
(75, 4, 62, 4, 153),
(76, 5, 1, 5, 1000),
(77, 5, 39, 1, 650),
(78, 5, 99, 6, 1500),
(79, 5, 97, 1, 2500),
(80, 5, 92, 9, 30);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_date` date NOT NULL,
  `invoice_number` int NOT NULL,
  `user_id` int NOT NULL,
  `total_sale` decimal(20,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `userID_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `invoice_number`, `user_id`, `total_sale`, `discount`, `comment`) VALUES
(1, '2020-12-01', 1, 1, '25.00', '0.00', NULL),
(2, '2020-12-30', 2, 1, '2000.00', '0.00', NULL),
(3, '2020-12-24', 3, 2, '310.00', '10.00', 'Discount coz no change'),
(4, '2020-12-31', 4, 4, '100.00', '0.00', NULL),
(5, '2021-01-18', 11124, 1, '2250.00', '2.00', NULL),
(6, '2021-01-21', 29987, 2, '650.00', '2.00', NULL),
(7, '2021-01-14', 31244, 2, '165.00', '2.00', NULL),
(8, '2020-06-05', 43554, 4, '75.00', '2.00', NULL),
(9, '2020-06-09', 55858, 1, '95.00', '2.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fevicon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `login_image` varchar(100) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `currency` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `fevicon`, `logo`, `title`, `login_image`, `footer`, `currency`) VALUES
(1, 'fevicon-179.png', 'logo-597.png', 'theYoungWolfPharma', 'login_image-324.png', 'Footer', 'Rs.');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`) VALUES
(1, 'Sameul Jackson', '200 Technology Square Cambridge, MA 02139'),
(2, 'Alex limited', 'One Upland Road Norwood, MA 02062'),
(3, 'Alford exchange', 'Plot No. 7, Bilal Plaza, Rawalpindi'),
(5, 'Santa makers', 'Attock Hospital Morgah, Rawalpindi'),
(6, 'Lucida malfoy', 'Main Commercial Market, Saddar, Rawalpindi'),
(7, 'Anderson Paks', 'Shop No. 1, Bahria Heights, Bahria Town'),
(8, 'Subbarao', 'Shop No. 1, Bahria Heights, Bahria Town'),
(9, 'Mukesh traders', 'Stonefield Way, Ruislip, Middlesex, HA7 0JP'),
(10, 'McDen Posse', 'Romford, Essex, RM6 8SU'),
(11, 'Ivan limited', 'Stonefield Way, Ruislip, Middlesex, HA7 0JP'),
(12, 'Benjamin Matthew', 'Perry Barr, Birmingham, B8 8AP'),
(13, 'CrookedMind magicians', 'Main Commercial Market, Saddar, Rawalpindi'),
(14, 'The Rock', 'Dwayne street, WWE'),
(15, 'AbbVie', '200 Technology Square Cambridge, MA 02139'),
(16, 'Acadia', 'One Upland Road Norwood, MA 02062'),
(17, 'Mike Tyson', 'Plot No. 7, Bilal Plaza, Rawalpindi'),
(18, 'Bausch & Lomb', 'Attock Hospital Morgah, Rawalpindi'),
(19, 'Eli Lilly', 'Main Commercial Market, Saddar, Rawalpindi'),
(20, 'Fareva', 'Shop No. 1, Bahria Heights, Bahria Town'),
(21, 'General', 'Warrington, WA2 8UH'),
(22, 'Glenmark', 'Stonefield Way, Ruislip, Middlesex, HA7 0JP'),
(23, 'Horizon', 'Romford, Essex, RM6 8SU'),
(24, 'Intas', 'Paignton, Devon, TQ7 2HU'),
(25, 'Jazz', 'Perry Barr, Birmingham, B8 8AP'),
(26, 'Johnson & Johnson', 'Leeds, LS27 10YD'),
(27, 'King', 'School Road, Super Market,Islamabad'),
(28, 'Kite', 'Din Pavilion,F-7, Jinnah Avenue Islamabad'),
(29, 'Leo', 'Sh# 234 B-214, Al-Fateh Plaza, Rawalpindi'),
(30, 'McNeil Consumer Healthcare', 'Committe Chowk, I-632, Muree Road'),
(31, 'Mustang', 'Shop # 6,Block# 12c,F-7 markaz Islamabad'),
(32, 'Pfizer', '12- Dockyard Road, West Wharf Karachi- 74000 '),
(33, 'Procter & Gamble', 'Industrial Triangle Kahuta Road Islamabad'),
(34, 'Gallardo', 'Banni Chowk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role` enum('Admin','Pharmacist','Cashier') NOT NULL,
  `hashkey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_idx` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `hashkey`) VALUES
(1, 'CashierBoy', 'CashierBoy@gmail.com', 'Cashier', '$2y$10$eqnU/hsNjq3M7h3TvFfwYOKIP/6jHmzBLEFiHyhMaKjf4X3HenLWa'),
(2, 'PharmaBoy', 'PharmaBoy@gmail.com', 'Pharmacist', '$2y$10$eqnU/hsNjq3M7h3TvFfwYOKIP/6jHmzBLEFiHyhMaKjf4X3HenLWa'),
(3, 'AdminBoy', 'AdminBoy@gmail.com', 'Admin', '$2y$10$mUd8jexsPHNz8Ei3t9hn/ezDcnuOn/KrmVLA2a7SvhKjge9k0qfVS'),
(4, 'CashierBoy2', 'CashierBoy2@gmail.com', 'Cashier', NULL),
(6, 'Daenerys', 'daniLove@gmail.com', 'Pharmacist', '$2y$10$kqSa1UL7vCeD9Goi/fLoc.8bYWMTf74di9nC/kOJ/ZumGadlkRHwC'),
(7, 'Syed Afraz', 'AdminBoy99@gmail.com', 'Pharmacist', '$2y$10$3Hiuugw1X1/9m72yp9S.QOUAqsCSPYtYrojuJTvxalupVVH8q2jRC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_products_inventory` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_suppliers_inventory` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_manufacturers_products` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `FK_products_saledetails` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_sales_saledetails` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `FK_users_sales` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_roles_users` FOREIGN KEY (`role`) REFERENCES `roles` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
