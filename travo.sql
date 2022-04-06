-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 09:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '$2y$10$MYkqMTBsWqUORYWBp75F8epUQBNiFcFFX6HEaSyLI/bZwp3ZJmYmm');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `trip_id` char(20) NOT NULL,
  `hotel1_accomodation` double(10,2) NOT NULL,
  `hotel2_accomodation` double(10,2) NOT NULL,
  `hotel3_accomodation` double(10,2) NOT NULL,
  `total_expenses` double(10,2) NOT NULL,
  `accomodation` double(10,2) NOT NULL,
  `service_charges` double(10,2) NOT NULL,
  `ticket_fees` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`trip_id`, `hotel1_accomodation`, `hotel2_accomodation`, `hotel3_accomodation`, `total_expenses`, `accomodation`, `service_charges`, `ticket_fees`) VALUES
('trip_6241f8431a1da', 14000.00, 0.00, 0.00, 18425.00, 14000.00, 1675.00, 2750.00),
('trip_624201677d8c8', 0.00, 0.00, 0.00, 1155.00, 0.00, 105.00, 1050.00),
('trip_62427670e2b24', 30000.00, 30000.00, 0.00, 70620.00, 60000.00, 6420.00, 4200.00),
('trip_62428e8608016', 34000.00, 0.00, 0.00, 66000.00, 34000.00, 6000.00, 26000.00),
('trip_62428faea288a', 20000.00, 0.00, 0.00, 22000.00, 20000.00, 2000.00, 0.00),
('trip_62429066a5277', 30000.00, 0.00, 0.00, 33110.00, 30000.00, 3010.00, 100.00),
('trip_624290bbb2357', 10000.00, 0.00, 0.00, 11660.00, 10000.00, 1060.00, 600.00),
('trip_62429b8bd1efe', 40000.00, 0.00, 0.00, 77000.00, 40000.00, 7000.00, 30000.00),
('trip_6242a09f4eb79', 20000.00, 50000.00, 0.00, 80630.00, 70000.00, 7330.00, 3300.00),
('trip_6242abf09d06b', 39000.00, 50000.00, 0.00, 100210.00, 89000.00, 9110.00, 2100.00);

-- --------------------------------------------------------

--
-- Table structure for table `chosen_sights`
--

CREATE TABLE `chosen_sights` (
  `trip_id` char(20) NOT NULL,
  `destination_id` char(20) NOT NULL,
  `sight_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `completed_trips`
--

CREATE TABLE `completed_trips` (
  `trip_id` char(20) NOT NULL,
  `traveler_id` char(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` int(5) NOT NULL,
  `category` char(100) NOT NULL,
  `destination_id` char(20) NOT NULL,
  `sight_id` char(20) NOT NULL,
  `hotel_id1` char(20) NOT NULL,
  `hotel_id2` char(20) NOT NULL,
  `hotel_id3` char(20) NOT NULL,
  `no_of_people` int(5) NOT NULL,
  `mileage` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_accounts`
--

CREATE TABLE `deleted_accounts` (
  `acc_id` char(20) NOT NULL,
  `email` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` char(20) NOT NULL,
  `destination` char(100) NOT NULL,
  `latitude` varchar(1000) NOT NULL,
  `longitude` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination`, `latitude`, `longitude`) VALUES
('des_623d7584be4f5', 'Ampara', '7.302019303550546', '81.67548517615444'),
('des_623d758bdc8b1', 'Anuradhapura', '8.313404554376804', '80.40399675668357'),
('des_623d75926962a', 'Badulla', '6.980270885729847', '81.05197824867963'),
('des_623d75997a31f', 'Batticaloa', '7.731723170814688', '81.67351553588317'),
('des_623d75a257b42', 'Colombo', '6.93365794462737', '79.85003626758102'),
('des_623d75a9c7247', 'Galle', '6.033117283924609', '80.21577885408423'),
('des_623d75bade151', 'Gampaha', '7.093856866308807', '79.98930964174977'),
('des_623d75c420f51', 'Hambantota', '6.142942123504823', '81.119237145791'),
('des_623d769ec54e9', 'Jaffna', '9.661411270066717', '80.02593738946106'),
('des_623d76a77172a', 'Kalutara', '6.585540349839917', '79.96059725408593'),
('des_623d76b09eac7', 'Kandy', '7.2902871330591354', '80.63196037416446'),
('des_623d76b8994ff', 'Kegalle', '7.2514311103027085', '80.34580697504147'),
('des_623d76c09a3f2', 'Kilinochchi', '9.380789162552187', '80.37731240725226'),
('des_623d76cd2c14d', 'Kurunegala', '7.487672450318209', '80.3634566706628'),
('des_623d76d94f3d3', 'Mannar', '8.9714701958589', '79.8892298058959'),
('des_623d76fc1832f', 'Matale', '7.467356942030269', '80.6236407181986'),
('des_623d7703f147b', 'Matara', '5.954381396735412', '80.55503864794473'),
('des_623d770b5fc3a', 'Monaragala', '6.872925822887489', '81.35124015352586'),
('des_623d771840913', 'Mullaitivu', '9.26717223156453', '80.8139812416701'),
('des_623d772118e4b', 'Nuwara Eliya', '6.949831318106644', '80.78918586020222'),
('des_623d772a4a610', 'Polonnaruwa', '7.9409125082461065', '81.01506599076065'),
('des_623d77335d82d', 'Puttalam', '8.041273123013859', '79.83926154775955'),
('des_623d773e18515', 'Ratnapura', '6.706541588081052', '80.38352614020735'),
('des_623d7746448b6', 'Trincomalee', '8.582698506024641', '81.2144174461641'),
('des_623d774e1fc92', 'Vavuniya', '8.75297939451248', '80.49482922738726'),
('des_623d79279f28d', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` char(20) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `answer` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
('faq_61692d3d75620', 'Can I choose more than one hotel for one night?', 'No you cannot'),
('faq_61692d54a824a', 'Do you provide hotels for one day tours?', 'No we are not'),
('faq_61692d658d9c7', 'What is the payment method?', 'Only card payments'),
('faq_61692db36bf8a', 'Can we cancel trips?', 'Any planned trip can be cancelled. Only half of the amount will be refunded for aid trips'),
('faq_61692dc941397', 'Can we choose meals?', 'Yes, you can choose any type of meal from the given menu of the day'),
('faq_61692de48b71f', 'Can we book the hotels before paying?', 'No, only details of sights and destinations will be saved to the profile'),
('faq_61692dffd103a', 'Can we register several hotels under the same profile?', 'No, only one hotel should be registered under one hotel owner'),
('faq_61692e13a76ba', 'If we are unable to fulfill the reservation after the customers pay us can we cancel it, Is it possible?', 'No you canâ€™t. You are responsible for their willingness after they pay for the hotel.So you have to find another hotel with all the requirements you promised'),
('faq_61692e2a6e39a', 'If customers are willing to stay more days at the hotel than they paid before. Do they have to contact us through Travo?', 'No. All users are under contact with a pre- defined bond with TRAVO.So if they want to change their plans they can change them after contacting other parties, No need to come through Travo'),
('faq_61692e453f994', 'What is the exact amount of customers allowed to be in  a massive room? ', 'Itâ€™s up to hotel management'),
('faq_61692e5813a63', 'Do the vehicle owners have to participate in the trips? ', 'No, The driver is enough'),
('faq_61692e6b3d239', 'Does the Travo.lk provide drivers to the trips?', 'No, Owners have to assign them'),
('faq_61692e7ee5795', 'How to contact participants before the trip?', 'All contact details regarding hotel owners are provided to the travelers. They were informed to contact you'),
('faq_61d5fb53db727', 'Is travo free', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` char(20) NOT NULL,
  `date` date NOT NULL,
  `feedback` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `date`, `feedback`) VALUES
('fee_6169274f02dc2', '2021-10-15', 'Best place to plan your trip. They even give you a range of meals to choose from.'),
('fee_61692934b53ca', '2021-10-15', 'The service provided was excellent ðŸ˜'),
('fee_616929b7693c0', '2021-10-15', 'Highly recommended to plan your trip in one place. '),
('fee_616929e47512a', '2021-10-15', 'One day tour was all we needed to be stress free. Travo.lk made it a huge success and they even provided us with meals for a fair price.'),
('fee_61692a21d71d1', '2021-10-15', 'Two or three days in little london. Sounds perfect right?? My time there was the best due to travo service'),
('fee_61692a523a92a', '2021-10-15', 'Love to join with you. Keep this up ðŸ‘â¤\r\n'),
('fee_61692ad75b515', '2021-10-15', 'I fully enjoyed 4 days of my life with my whole family thanks to Travo.lk. They are providing the best hotel networks in Sri Lanka. Also this time I didn\'t use my own vehicle thanks to the Travo team.I was able to contact a good driver and a van for the trip through Travo.lk. I was totally free, That\'s the best thing that happened from planning trips with them. To those who are busy as me and unable to fulfill family willings just contact with Travo.'),
('fee_61692b020bfaf', '2021-10-15', 'Have mind blowing places in your mind but don\'t have a way of transportation to visit them. This is the only place that provides details of vehicles to contact them.'),
('fee_61692b166c3a2', '2021-10-15', 'With one tap I got an endless pleasurable experience in my life. Thank you Travo.lk for coming up with this kind of idea to local travelers as well.'),
('fee_61692b3ed2a6f', '2021-10-15', 'You know what, they found me the best place to stay for five days in a row with my whole family. Just not for 4 or 5 members, It\'s for 15 members. Thank you for this. The days we stayed at â€œ Wishrama Shalaâ€ or relatives\' homes are over. I found the best place to plan my future trips as well. That\'s Travo. Hurry Up and try them ! ðŸ˜ŠðŸ˜Š'),
('fee_61692b5ac073a', '2021-10-15', 'Spending your vacation with all your friends is a dream but thanks to this website itâ€™s not a dream anymore'),
('fee_61692bbb1927d', '2021-10-15', 'The maximum number of participation isssss 20..!!! Yeah you saw it right! Why wait further? They do an excellent job in arranging your trip ðŸ˜ƒðŸ™Œ'),
('fee_61692bd335a19', '2021-10-15', 'I stayed at Grand beach hotel - Unawatuna during my second day and it was completely a calm and restful environment. Thank you Travo.lk for your great service you guys provide me during planning my weekend trip.Specially the ease of using this website is priceless'),
('fee_617078b2abde3', '2021-10-21', 'Travo is best for trips');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelID` char(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `regNo` varchar(100) NOT NULL,
  `licenceNo` varchar(100) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `longitude` varchar(1000) NOT NULL,
  `latitude` varchar(1000) NOT NULL,
  `contact1` int(10) NOT NULL,
  `contact2` int(10) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `webUrl` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `hotel_type` char(20) NOT NULL,
  `rep_name` varchar(200) NOT NULL,
  `rep_email` varchar(100) NOT NULL,
  `rep_contact1` int(10) NOT NULL,
  `rep_contact2` int(10) DEFAULT NULL,
  `single_price` double(10,2) NOT NULL,
  `massive_price` double(10,2) NOT NULL,
  `status` char(20) NOT NULL,
  `otp` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelID`, `name`, `regNo`, `licenceNo`, `address_line1`, `address_line2`, `city`, `longitude`, `latitude`, `contact1`, `contact2`, `description`, `webUrl`, `email`, `password`, `hotel_type`, `rep_name`, `rep_email`, `rep_contact1`, `rep_contact2`, `single_price`, `massive_price`, `status`, `otp`) VALUES
('hot_623ff824b0ae5', 'Anantara Peace Heaven Resort', 'SLTDA/SQA/HC/00172', 'HC/2022/0020', 'Goyambokka Estate', 'Tangalle', 'Matara', '80.56115412311678', '5.9648670728605095', 704567893, 662286809, 'Cinnamon Hotels & Resorts will continue to take action that will preserve and protect the environment, local culture, and communities; joining leading hotel chains around the world that are setting trends towards sustainable travel. .', 'https://www.cinnamonhotels.com/', 'fazal@cinnamonhotels.com', '$2y$10$cLkaifckdF87tcQEvBRb5uil99HehzVHI7JL8fHXBQHG1km70I8Na', 'Deluxe', 'Mr. Gayan Abekoon', 'gayanabeykoon@gmail.com', 704567893, 775678947, 15000.00, 40000.00, 'new', 6451),
('hot_623ffb3cb4ed0', 'Cinnamon Lodge', 'SLTDA/SQA/HC/144', 'HC/2022/0040', 'P. O. Box 02', 'Habarane', 'Anuradhapura', '80.74982393033086', '8.035987343648953', 704567893, 112306000, 'Travel Sustainable property\r\nLocated amidst green forests, the Cinnamon Lodge Habarana offers air-conditioned rooms with a private balcony. The hotel boasts a large outdoor pool, a butterfly garden and 3 dining options.', 'https://www.cinnamonhotels.com/cinnamonlodgehabarana/offers?gclid=Cj0KCQjw8_qRBhCXARIsAE2AtRZIJqC6BRZS6bTa7owUExYmZG80BK0-ywET-QQ6SLCHAwCCj40rAdQaAnLXEALw_wcB', 'accountant.lodge@cinnamonhotels.com', '$2y$10$yqZFkjW8G7eR00D4HjHKZekkrf17kv9oiOYWl8yA3qjPq5pgaSi3e', 'Deluxe', 'Mr. Saman Ranawake', 'samanranawake89@gmail.com', 776294489, 775678947, 0.00, 0.00, 'new', 4704),
('hot_623ffd7f35a7e', 'Jetwing Blue', 'SLTDA/SQA/HC/056', 'HC/2022/0011', 'Lewis Place', 'Negombo', 'Gampaha', '79.86663579940796', '7.20749476319646', 312279000, 772360927, 'Revel in our histories. Chase our mysteries. Discover extraordinary places. Unwind in our spaces. At Jetwing Hotels, we promise you are in good hands. With the largest family of hotels and villas across Sri Lanka, we are delighted to welcome you into our homes found on the mountains to the coastline, and everywhere else in between.\r\n\r\nOur legendary hospitality is one that we are truly proud of, and will forever remain synonymous with our name - wherever you may cross paths with us on your travel', 'https://www.jetwinghotels.com/', 'vijith@jetwinghotels.com', '$2y$10$bNEn1fuA/AqqjDe5UEg95u7kSiwmEW01DADXmlnH0v0UjmZYIMO0u', 'Deluxe', 'Mr. Ranjan Senanayake', 'ranjan@jetwinghotels.com', 704567893, 775678943, 0.00, 0.00, 'new', 3748),
('hot_623ffee359a6d', 'Marriot Resort & Spa - Weligama Bay', 'SLTDA/SQA/HC/00211', 'HC/2022/0019', 'No. 700,', 'Matara Road,', 'Matara', '80.43517827987671', '5.990658590276436', 704567893, 115101045, 'Marvel at the captivating beauty of Sri Lanka with a stay at Weligama Bay Marriott Resort & Spa. Set near Mirissa Beach, our 5-star hotel has spectacular water views, superb service and a prime location. Relax and recharge in our spacious hotel rooms and suites that feature indulgent bedding, marble bathrooms with oversized soaking tubs, flat-screen TVs, ample workstations, complimentary Wi-Fi and private balconies, most with direct ocean views. Take advantage of hotel amenities.', 'https://www.marriott.com/en-us/hotels/cmbmc-weligama-bay-marriott-resort-and-spa/overview/', 'dhanuka@hplhotels.com', '$2y$10$qb1tgazMOtZwocHYLsyj8u7CiB5Dux1lavMzDx5Cvozd.oxzfrY1G', 'Deluxe', 'Mr. Ruwan Senadheera', 'ruwansenadheera@gmail.com', 704567893, 775678947, 10000.00, 54000.00, 'new', 4078),
('hot_62400142b1489', 'Ceyloni Panorama Resort', 'SLTDA/SQA/GH/1014', 'GH/2022/0071', 'No. 352/h,', 'Dharmaraja Mawatha,', 'Kandy', '80.64789636093751', '7.3210354714489885', 704567893, 812240400, 'Situated in Kandy, 2.5 km from Sri Dalada Maligawa, Ceyloni Panorama Resort features accommodation with a restaurant, free private parking, a bar and a shared lounge.', 'www.kandypanoramaresort.com', 'reservations.kpr@gmail.com', '$2y$10$baSQvRzV.5pi7eJrHhVHe.1pMlfxWSdObBqt9GsyWBXXSQC58SNmO', 'Deluxe', 'Mr. Suran Piliyandala', 'suranpili70@gmail.com', 776294489, 112678947, 0.00, 0.00, 'new', 9443),
('hot_6240037cd6272', 'Cinnamon Citadel', 'SLTDA/SQA/HC/114', 'HC/2022/0031', 'No. 124,', 'Srimath Kuda Ratwatta Mawatha,', 'Kandy', '80.65765142440796', '7.327373505086316', 704567893, 812234365, 'Travel Sustainable property\r\nLocated 500 metres above sea level, Cinnamon Citadel Kandy offers a spectacular outdoor pool.', 'https://www.cinnamonhotels.com/cinnamoncitadelkandy/offers?gclid=Cj0KCQjw8_qRBhCXARIsAE2AtRa-FyrIPKqdN4c-CvgwNnW3hrOY9-wiWEWwkwV41adLtbjhDd_GM-MaAoeZEALw_wcB', 'accountant.citadel@cinnamonhotels.com', '$2y$10$/gLS40dqdXEEdaQJOknxu.hpj6RwakT8hFQThsKxQX6oJ6HXBylCa', 'Deluxe', 'Miss. Ruwangi Somasiri', 'ruwangisomasiri@gmail.com', 704567893, 775678943, 0.00, 0.00, 'Existing', 6031),
('hot_624004e4112e3', 'Devon Hotel', 'SLTDA/SQA/HC/112', 'HC/2022/0024', 'No. 51,', 'Ampitiya Road,', 'Kandy', '80.65765142440796', '7.392748352302777', 812235164, 772360927, 'Located a 10-minute drive from Kandy Lake, Devon Hotel offers air-conditioned rooms with hot showers. They also feature a swimming pool and a 24-hour rooftop coffee shop.', 'www.devonsrilanka.com', 'devon@sltnet.lk', '$2y$10$UAqMbO7I.F0kZK3Rl79.hOiyrla.gcg4x2IuyMHQqAB8Ig0qQi0vq', 'Deluxe', 'Mr. Anjana Siriwardane', 'anjaandevon@hotel.com', 704567893, 775678947, 0.00, 0.00, 'new', 9368),
('hot_62400659a2281', 'Galavilla Boutique Hotel', 'SLTDA/SQA/TH/00303', 'TH/2022/0048', 'Agalawatta Estate Moragolla,', 'Thalathuoya', 'Kandy', '79.86114263534546', '6.902206909028085', 704567893, 812054908, 'Galavilla Boutique Hotel  is located in the Central Province of Sri Lanka, 17.5 km (30 minutes) from the central old king‘s capital Kandy and overlooking the Knuckles mountain range, a part of the Hill Country. The way to our hotel leads through beautiful mountains, there is no busy highway. Nevertheless, a less-than-an-hour long drive from Kandy will bring you to a place wonderfully combining comfort with nature in the middle of a jungle.', 'www.galavillaspa.com', 'gm@galavillaspa.com', '$2y$10$IqUnLVTgK4NcTFLdKHlrTegUTchG4sYO52QjiM9IoRgUwWobXgcM6', 'Luxury', 'Mr. Luxman Kodithuwakku', 'kuxmankodithuwakku@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 7929),
('hot_624007c956646', 'Hotel Thilanka', 'SLTDA/SQA/TH/019', 'TH/2022/0018', 'No. 3,', 'Sangamitta Mawatha', 'Kandy', '80.64117193222046', '7.327373505086316', 704567893, 814475200, 'Thilanka is located a 5-minute drive from Kandy Town, and is surrounded by the natural beauty of Hunnasgiriya Mountain and Udawattaekelle Natural Reserve. It offers free parking.', 'www.thilankahotel.com', 'accountant.thilanka@gmail.com', '$2y$10$x8hRk.m2dWN.J7olzavnYec0aVKU0SasGTLTRXa8erV9FmdpWh6Lu', 'Superior', 'Mr. Udula Prasannajith', 'udulaprasnnajith@gmail.com', 776294489, 775678943, 0.00, 0.00, 'new', 3886),
('hot_624009ca2af40', 'Gimanhala Hotel', 'SLTDA/SQA/HC/150', 'HC/2022/0037', 'No.754', 'Anuradhapura Road', 'Anuradhapura', '80.41595220565796', '8.325966072078119', 704567893, 662284864, 'Featuring an outdoor pool and a gift shop, Gimanhala Hotel offers peaceful and comfortable accommodation with free WiFi access in its public areas.', 'https://www.booking.com/hotel/lk/gimanhala-dambulla.en-gb.html?label=gimanhala-dambulla-N0xlrA_QLoWDoOI7fYA3AQS162165523423%3Apl%3Ata%3Ap1%3Ap21%2C093%2C000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-21530924192%3Alp1009919%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YXORK0YJiVoOxcWODxYDaAA&sid=7bbf99048abb7ef6829b2c88e823dc78&gclid=Cj0KCQjw8_qRBhCXARIsAE2AtRaMZheWqDwYqA-5MZgWEjpn7TI3sboA_lrIjJDKjH0fs0KtuLWsQtsaAnC8EALw_wcB&aid=311984&ucfs=1&arphpl=1&dest_id=-2215119&dest_type=city&group_adults=2&req_adults=2&no_rooms=1&group_children=0&req_children=0&hpos=1&hapos=1&sr_order=popularity&srpvid=86ed2fe001f4010f&srepoch=1648363713&from=searchresults#hotelTmpl', 'gimanhalaacc@gmail.com', '$2y$10$E4f6OO50y0ZI8m68numoTOxwo0sxPfltT4D.EqayRV/c6USNArIoa', 'Luxury', 'Ms. Yapa Ediriweera', 'yapagimanhalaacc@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 5985),
('hot_62400b53a2b0e', 'Margosa Lake Resort', 'SLTDA/SQA/GH/01733', 'GH/2022/0073', 'Abimansala Road', 'Pulleyar Junction', 'Anuradhapura', '80.41732549667358', '8.403410950639078', 704567893, 252223877, 'Margosa Lake Resort offers accommodation in Anuradhapura, Sri Lanka. The nearest airport is Bandaranaike International Airport is 16 km via Anuradhapura-Padeniya Highway.', 'www.margosalakeresort.lk', 'margosalakeresort@gmail.com', '$2y$10$owmH/RS2vuEY.F3y9v9LkODO2mnk.7MjSlUFYXfJM/ufSGJytAuQu', 'Superior', 'Mr. Gunathilake', 'ruwangunathilake67@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 5661),
('hot_62400cd4075a3', 'Ulagalla Walawwa Resort', 'SLTDA/SQA/BH/025', 'BH/2022/0014', 'No.356,', 'Thirappane,', 'Anuradhapura', '80.50109624862671', '8.366728453281981', 704567893, 665671000, 'Travel Sustainable property\r\nSitting on 58 acres of tropical vegetation, Ulagalla Resort offers villas with plunge pools and free Wi-Fi. It has a spa, freshwater pool and activites like horseback riding and archery.', 'www.ulagallaresorts.com', 'gm-u@ugaescapes.com', '$2y$10$a0pIvd88grgzkS/LuYE2auYI650uuhbsYXOsFsziW9EzL08BbD5si', 'Deluxe', 'Mr. Asel Wickramasinghe', 'aselwickramasinghegmu@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 6359),
('hot_624010f7e57c4', 'Sun and Green Eco Lodge - Dambulla', 'SLTDA/SQA/GH/01256', 'GH/2022/0069', 'Trincomalee Hwy', 'Dambulla', 'Anuradhapura', '80.55328130722046', '8.4808403681578', 704567893, 662284842, 'Offering a garden, Sun and Green Lodge is situated in Dambulla. Dambulla Cave Temple is 5 km from the property while Sigiriya is 9 km away. Free WiFi is offered.', 'https://www.booking.com/hotel/lk/sun-and-green-lodge.en-gb.html?aid=311984;label=sun-and-green-lodge-UGCWJTsgQkZgOhD0tz9vjwS383392104691%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-1110454565467%3Akwd-279579148206%3Alp1009919%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YbSsBl3MCvHsD8UKUHIRFxY;sid=7bbf99048abb7ef6829b2c88e823dc78;dest_id=-2215119;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;hpos=1;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1648365576;srpvid=bb753383f5a100c7;type=total;ucfs=1&#hotelTmpl', 'sungreeneco@gmail.com', '$2y$10$y8eOtF0qBfYFg887QVaX2.eZFR5a6V.0aqgwB4j.mqQcKG3WaMNaG', 'Luxury', 'Mr. Tiran Senanayake', 'tiransunandgreen@gmail.com', 704567893, 662270311, 0.00, 0.00, 'new', 1258),
('hot_6240131b98b44', 'Bay Vista Hotel', 'SLTDA/SQA/GH/01263', 'GH/2022/0085', 'No:227,', 'Arugambay,', 'Ampara', '81.68487310409546', '7.392748352302777', 704567893, 632248577, 'Travel Sustainable property\r\nLocated in the heart of Arugam, Bay Vista offers modern and comfortable accommodation within a 15-minute walk to the famous Arugam Bay surfing area.', 'www.boyvistahotel.com', 'gamunuperera@yahoo.it', '$2y$10$FN8BBLkSBc.yLLstiMzfVep/umveGhZLQLUt9EtIsqP/b7TmnqKIW', 'Luxury', 'Mr. Janith Premathilake', 'janithpremal@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 6270),
('hot_624014a42548b', 'Hideaway Resort', 'SLTDA/SQA/GH/0553', 'GH/2022/0006', 'Ulle,', 'Pottuvil,', 'Ampara', '81.77825689315796', '7.267438132375731', 704567893, 632248259, '250 m from beach\r\nFeaturing an outdoor pool and a restaurant, The Hideaway Resort offers modern accommodation with free Wi-Fi and private spa pool. It offers free private parking and free DVD rental.', 'www.hideawayarugambay.com', 'info@hideawayarugambay.com', '$2y$10$WX7.Uk7l/645RsGW.VcIEOummTfEJfwO3RSeWr9VN8afa4xK8kmIm', 'Luxury', 'Mr. Yadam Weerakoon', 'yadamhideway@gmail.com', 765632100, 775218943, 0.00, 0.00, 'new', 1315),
('hot_6240182ad503e', 'Jetwing Surf', 'SLTDA/SQA/TH/00379', 'TH/2022/0025', 'P20,', 'Kottukal Beach Road,', 'Ampara', '81.73980474472046', '7.3709578076458', 703451289, 112345700, 'ravel Sustainable property\r\nJetwing Surf is located in Pottuvil, 3.1 km from Whiskey Point. Guests can enjoy the on-site restaurant. Free private parking is available on site.', 'www.jetwinghotels.com', 'dilip@jetwinghotels.com', '$2y$10$m3tcpElZuDPQUEZTKB5Zae0wdY4R1CMm/rnZk2ejCAHWOJ5KdXK6y', 'Luxury', 'Mr. Dilip Karannagoda', 'dilip@jetwinghotels.com', 776294489, 775678943, 0.00, 0.00, 'new', 8585),
('hot_624019ea7e2b5', 'Kottukal Beach House', 'SLTDA/SQA/GH/01592', 'GH/2022/0082', 'P20,', 'Hidayapuram,', 'Ampara', '81.73431158065796', '7.425432152294092', 716782100, 632050583, 'Travel Sustainable property\r\nResting on the southeast coast of Sri Lanka in the peaceful village of Pottuvil, Kottukal Beach House by Jetwing is just 4 km from Kottukal Beach.', 'WWW.JETWINGHOTELS.COM', 'vernon@jetwinghotels.com', '$2y$10$em/UMt.wvFpKNor677vNeuE4atG26pN5AAjMvGbCKkTmfkYE6Tqw2', 'Luxury', 'Mr. Yamuna Balasooriya', 'yamuna@jetwinghotels.com', 765632100, 775603941, 0.00, 0.00, 'new', 1943),
('hot_62401fcbb1c23', 'Ambatenna Bungalow', 'SLTDA/SQA/BUN/00641', 'BUN/2022/0004', '1st Cross Road,', 'Bandarawela,', 'Badulla', '81.17400884628296', '7.038520985696091', 704567893, 714482257, 'Ambatenna Bungalow is situated in Bandarawela and offers a shared lounge, a garden and a terrace. The property is 7 km from Haputale and free private parking is offered.\r\n\r\nThe holiday home has 4 bedrooms, 2 bathrooms, bed linen, towels, a flat-screen TV, a dining area, a fully equipped kitchen, and a balcony with garden views. For added convenience, the property can provide towels and bed linen for an extra charge.', 'https://www.booking.com/hotel/lk/ambatenna-bungalow.en-gb.html?aid=356980;label=gog235jc-1DCAsohQFCEmFtYmF0ZW5uYS1idW5nYWxvd0gzWANohQGIAQGYAQm4ARfIAQzYAQPoAQGIAgGoAgO4AoO-gJIGwAIB0gIkNzY3NDFmOTktZDMzOC00Nzc1LWJjNTctZTc3Nzk1YzAwNjk12AIE4AIB;sid=7bbf99048abb7ef6829b2c88e823dc78;dist=0&group_adults=2&keep_landing=1&sb_price_type=total&type=total&', 'tissawarna@gmail.com', '$2y$10$2CVr.9TNPZortTRzw4xWkuSAw3fBEaQIBPB.q.wk3Y6JL1R15tM1q', 'Deluxe', 'Mr.Akila Maithripala', 'akilamaithripala@gmail.com', 752390766, 723490765, 0.00, 0.00, 'new', 5513),
('hot_624033ba73b7d', 'Dolape Villa', 'SLTDA/SQA/BUN/00930', 'BUN/2022/0011', 'Kandekumbura Road,', 'Ballaketuwa,', 'Badulla', '81.05041265487671', '7.013987384038999', 771885286, 714482257, 'Travel Sustainable property\r\nSituated 9 km from Demodara Nine Arch Bridge, Dolape Villa features accommodation with a restaurant, a garden and a 24-hour front desk for your convenience.', 'https://www.booking.com/hotel/lk/dolape-villa.en-gb.html?aid=311984;label=dolape-villa-x7C2tiYoTt6xjz5z6Ev69QS589580222783%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-297601666475%3Akwd-871143200580%3Alp1009919%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YbSsBl3MCvHsD8UKUHIRFxY;sid=7bbf99048abb7ef6829b2c88e823dc78;dest_id=-2216722;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;hpos=1;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1648374611;srpvid=1d2e4529c2d80454;type=total;ucfs=1&#hotelTmpl', 'dolapevilla.lbh@gmail.com', '$2y$10$WQpRK0hqd9fbSrAwYkixc.jwSUqLOGu5vSX.u7PPljXU5ravysvZ2', 'Luxury', 'Mr. Anil Thilakasiri', 'anilthilak78@gmail.com', 765632100, 775678943, 0.00, 0.00, 'new', 4208),
('hot_624035536249d', 'Eagle Nest Holiday Inn', 'SLTDA/SQA/GH/0171', 'GH/2022/0009', 'No. 159,', 'Lower Street,', 'Badulla', '81.10809087753296', '7.000357046554273', 704567893, 552222841, 'Our cabanas are set in large grounds bordered by wetlands which between late November and early March are home to many visiting migratory birds. Many of our guest comment on the quiet, peaceful nature of the hotel grounds. The cabanas are two to three minutes walk from the beach and 4.2km from Tangalle town (10min in three-wheeler). It is an ideal location for those seeking a relaxing, quiet beach holiday and who are interested in wildlife.', 'https://www.tripadvisor.com/Hotel_Review-g304142-d5315956-Reviews-Eagles_Nest_Cabanas-Tangalle_Southern_Province.html', 'chaminda.milton@gmail.com', '$2y$10$xbFrrvJsznFAw8U2Ii.11.B2NdD.NRDFYXaKpITIFo1fRzmlFk5Y6', 'Deluxe', 'Mr. Chaminda Ramanayake', 'chamindaramanayake78@gmail.com', 765632100, 775678947, 0.00, 0.00, 'new', 2668),
('hot_6240372ccd6aa', 'Grand 39', 'SLTDA/SQA/HSU/01136', 'HSU/2022/0026', 'No:39,', 'Ella,', 'Badulla', '81.13555669784546', '7.038520985696091', 572250193, 767099200, 'Located in Ella, 1.6 km from Demodara Nine Arch Bridge, Grand 39 Ella features a terrace and views of the mountain. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. The accommodation provides a shared lounge and an ATM for guests.\r\n\r\nAt the hotel, every room comes with a desk, a flat-screen TV, a private bathroom, bed linen and towels. All rooms are equipped with a safety deposit box, while some rooms here will provide you with ', 'https://www.booking.com/hotel/lk/ella-grand-39.en-gb.html?aid=356980;label=gog235jc-1DCAsohQFCDWVsbGEtZ3JhbmQtMzlIM1gDaIUBiAEBmAEJuAEXyAEM2AED6AEBiAIBqAIDuAK07YCSBsACAdICJGE5ZWY5ODNhLWQ0NzMtNDI4Zi05MTYwLWZhYmNiYmFmMDFiZNgCBOACAQ;sid=7bbf99048abb7ef6829b2c88e823dc78;dist=0&group_adults=2&group_children=0&keep_landing=1&no_rooms=1&sb_price_type=total&type=total&', 'irankarannagoda@gmail.com', '$2y$10$3VH4.eRXpNNoci.StOJvg.i3FuMtT.kD7k.VB90R4q9ooA1MsxajC', 'Deluxe', 'Mr. Heshan Weerasinghe', 'heshanweerasinghe@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 2751),
('hot_6240388257873', 'Coco Ville', 'SLTDA/SQA/BUN/00408', 'BUN/2022/0001', 'C/o Waterville,', 'Kalkuda', 'Batticaloa', '81.68487310409546', '7.730362388306296', 779057986, 779057986, 'This property is 5 minutes walk from the beach. Located in Pasikuda, 1.6 km from Pasikuda Beach, Cocoville provides accommodation with a restaurant, free private parking, a garden and a terrace. The resort features a hot tub and room service.\r\n\r\nGuest rooms are equipped with air conditioning, a flat-screen TV with satellite channels, a fridge, a kettle, a bidet, bathrobes and a desk. Free WiFi and a private bathroom equipped with a shower and a hairdryer are available to all guests as well.', 'www.cocoville.lk', 'jimmijve@yahoo.com', '$2y$10$MfxQEjq/KuCjuhaX5yDs4OTl.Gzrci2kKdW5SkxaX813ZtCFBlxT6', 'Luxury', 'Mr. Ranil Udumalagama', 'raniludumalagama@gmail.com', 776294489, 654929939, 0.00, 0.00, 'new', 3249),
('hot_62403deb49882', 'Riviera Resort', 'SLTDA/SQA/GH/0549', 'GH/2022/0088', 'No.63/14,', 'New Dutch Bar Road,', 'Batticaloa', '81.69036626815796', '7.7575777223775155', 704567893, 654929939, 'Offering an outdoor swimming pool and a restaurant, Riviera Resort is located in Batticaloa. Free WiFi access is available in this resort. The accommodation will provide you with a seating area.', 'http://riviera-online.com/', 'darshan@riviera-online.com', '$2y$10$SQmh84dSgGsBvCT5ugLx2.yEcqum2hfjuAhQglT/1HCqzwNWUZnWq', 'Deluxe', 'Mr. Darshan Selvanagam', 'darshanselvanagam@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 1734),
('hot_62403f47afb7a', 'The Calm Resort And Spa', 'SLTDA/SQA/TH/00282', 'TH/2022/0036', 'National Holiday Resort,', 'Passikudah,', 'Batticaloa', '81.69585943222046', '7.7684633632793725', 704567893, 772360927, 'Retreat to your very own tropical haven upon the glistening shores bordering The Calm Resort & Spa. With elegant rooms, contemporary facilities, and breath-taking ocean views, escape to a world of your own at our Pasikuda hotel. Spend your island holiday discovering the marvels of the region while reveling in the comforts of our stunning 4-star resort.', 'https://www.brownshotels.com/calmpasikuda/', 'thecalm@brownshotels.com', '$2y$10$gJl1S1HwIJxXoNcAIozX9uVyAU74QWxLkdZ/DSmc1Hpcqjr8uACKe', 'Deluxe', 'Mr. Ganesh Boopathi', 'ganeshboopathi@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 5814),
('hot_624040b361ade', 'Aqua Pearl Lake Resort', 'SLTDA/SQA/GH/0326', 'GH/2022/0036', 'No.201,', 'Galkanuwa Road,', 'Colombo', '79.89959478378296', '7.038520985696091', 704567893, 112476590, 'Aqua Pearl Lake Resort invites you to relax and rejuvenate your mind and body while embracing the serene beauty of nature. A unique resort by the bank of Bolgoda river is a thriving oasis which offers you a great holiday experience and memories to treasure for a life time.Beautiful landscaped garden with lush green, walkways and flowers is a famous photographic and a film location. Visit us and enjoy the excellent facilities and gracious hospitality.', 'villa-aquapearl.com', 'aquasamaraweera201@gmail.com', '$2y$10$18xI8KqR6AvC.1mYLb.rLeAjcla7Sz6ZiMJy.kE5e9LjDKWHGRpOC', 'Deluxe', 'Ms. Olivia Jason', 'oliviajason89@gmail.com', 704567893, 112678947, 0.00, 0.00, 'new', 5749),
('hot_624041f2413b3', 'Aurora', 'SLTDA/SQA/HSU/0291', 'HSU/2022/0024', 'No. 9/8,', 'De Saram Road,', 'Colombo', '79.87762212753296', '6.858578074329379', 112715932, 714288033, 'Open after rennovation with upgraded facilities - two large extended balconies with tastfully designed new outdoor furniture - Clean and Safe Holiday House for the accommodation of Foreigners and Sri Lankan expats on holidays. - Located in Mount Lavinia which is 7km down Colombo (towards south) and just 3km away the colombo city limits. - Only 2 minutes walk down to the famous mount lavinia beach. - 07 double bed rooms - all with attached bathrooms and hot water.', 'https://www.tripadvisor.com/Hotel_Review-g499079-d2345959-Reviews-Aurora_Holiday_House_Mount_Lavinia-Dehiwala_Mount_Lavinia_Western_Province.html', 'auroraholiday@hotmail.com', '$2y$10$bo3BD9H4AszIxizv6odUWOd877cLioKcFX2NAIOf/ysf3ngtZZtRe', 'Deluxe', 'Mr. Sudarma Rathnayake', 'sudarmarathnayake@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 2076),
('hot_624043c104ad5', 'Beach View Guest House', 'SLTDA/SQA/GH/0083', 'GH/2022/0074', 'No. 220,', 'Mount Lavinia,', 'Colombo', '79.96551275253296', '6.88039299277348', 112761961, 772360927, 'within 350 m of Midigama Beach and 1.3 km of Acid Beach, Beach View Guest - Midigama offers accommodation with a terrace and as well as free private parking for guests who drive. The guest house features family rooms.\r\n\r\nAt the guest house, every room includes a balcony. The units at Beach View Guest - Midigama come with a private bathroom equipped with a shower.\r\nWeligama Beach is 2.9 km from the accommodation', 'https://www.booking.com/hotel/lk/beach-view-guest.en-gb.html', 'indika.sirisena@thelionpub.com', '$2y$10$r0sj7ayFfBqJVzg3no5lnuq20XrUA3oS4ihk3.psIYT1kaxFeVaY2', 'Deluxe', 'Mr. Indika Sirisena', 'indikasirisena@gmail.com', 704567893, 775678947, 0.00, 0.00, 'Existing', 3201),
('hot_624048dbc3152', 'Galle Face Hotel', 'SLTDA/SQA/HC/122', 'HC/2022/0028', 'No. 02,', 'Galle Road,', 'Colombo', '79.88860845565796', '6.869485658630349', 112541010, 772360927, 'Sri Lanka’s iconic landmark, The Galle Face Hotel, is situated in the heart of Colombo, along the seafront and facing the famous Galle Face Green.One of the oldest hotels east of the Suez, The Galle Face Hotel embraces its rich history and legendary traditions, utilizing them to create engaging, immersive experiences that resonate with old and new generations of travelers alike. No visit to Sri Lanka is complete without staying at this majestic hotel, built in 1864 and recently restored back to', 'www.gallefacehotel.com', 'chamika.krishantha@gallefacehotel.com', '$2y$10$3l0dPpQIByItao9nUGlOv.mBRKOm85awP7u6kbNFM4oI6WqFOoqBa', 'Deluxe', 'Galle Face Hotel management', 'information@gallefacehotel.com', 112541010, 112541072, 0.00, 0.00, 'new', 5817),
('hot_62404b0e8e28a', 'Grand 7 Hotel', 'SLTDA/SQA/TH/00382', 'TH/2022/0042', 'No.154/1,', 'Kesbewa,', 'Colombo', '79.87041234970093', '6.8241493749658595', 112606090, 770809090, 'Located 13 km from Asiri Surgical Hospital in Colombo, Grand 7 Hotel -Kesbewa welcomes guests with a restaurant and bar. Guests can enjoy the on-site restaurant.\r\n\r\nYou will find a 24-hour front desk at the property.\r\n\r\nU.S. Embassy is 16 km from Grand 7 Hotel -Kesbewa. The Bolgoda Lake is 2 km away while Mountlavinia Beach 5 km.The Bellanwila Farmous Buddhist Temple is 4 km.\r\n\r\nRatmalana Airport 5 km away while the entrance to the Southern Highway from Colombo to Matara Kahathuduwa is 2 km. Ban', 'http://wwwsevenelevenhotelcololombo.com/', 'sevenelevenhotelcolombo@gmail.com', '$2y$10$SY9i/hu/J/IULbaF.zq/eOlSJy85IjXV7M1HyIDQMU3EgrSaSLgCC', 'Deluxe', 'Seven Eleven Hotel management', 'grand7dle@gmail.com', 112171188, 770809090, 0.00, 0.00, 'new', 9056),
('hot_62404c0bbe07d', 'Hill Street Villa', 'SLTDA/SQA/HSU/01079', 'HSU/2022/0001', 'No:142,', 'Hill Street,', 'Colombo', '79.89410161972046', '6.869485658630349', 777758715, 772360927, 'Situated in Dehiwala, within 1 km of Mount Lavinia Beach and less than 1 km of National Zoological Gardens of Sri Lanka, Hillstreet Villa provides accommodation with a shared lounge and free WiFi. The accommodation features a shared kitchen, room service and luggage storage for guests.\r\n\r\nAt the hotel, the rooms have a desk, a flat-screen TV, a private bathroom, bed linen and towels.\r\n\r\nGuests at Hillstreet Villa can enjoy a Full English/Irish or an Asian breakfast.', 'https://www.booking.com/hotel/lk/hillstreet-villa.en-gb.html?aid=356980;label=gog235jc-1DCAsohQFCEGhpbGxzdHJlZXQtdmlsbGFIM1gDaIUBiAEBmAEJuAEXyAEM2AED6AEBiAIBqAIDuAL_loGSBsACAdICJGNmOWNkNDc1LTZlYjAtNDQ2Yi1iOWFlLTBjYzI4OWE2NDU2M9gCBOACAQ;sid=7bbf99048abb7ef6829b2c88e823dc78;dist=0&group_adults=2&keep_landing=1&sb_price_type=total&type=total&', 'madukashamil@gmail.com', '$2y$10$jZcIH4gkHYqxVvaaxWg.EeHNZbL9lH.AWz9.wvCrjjCJ2VzK5cUru', 'Deluxe', 'Ms. Maduka Shamali', 'madukashamali79@gmail.com', 704567893, 112161161, 0.00, 0.00, 'new', 6967),
('hot_62404f589e33e', 'Agnus Hotel', 'SLTDA/SQA/GH/01480', 'GH/2022/0111', 'Unawatuna,', 'Bon Vista,', 'Galle', '80.25665044784546', '6.12722051670958', 922228822, 772360927, 'AGNUS Luxury Villa, in Unawatuna is located on top of the picturesque Rumassala mountain, located 2 kilometres from Galle. Rumassala (රූමස්සල) known to colonialists as Buona Vista ’ (a spin off the Spanish buena vista), or ‘pleasant view’, thanks to the breath-taking panorama that stretches from the Indian ocean to the far inland , is the subject of many legends.', 'www.agnusrumassala.hotel.lk', 'harsha.wijewardene@agnusvilla.com', '$2y$10$oYuodsl/1J4tEKz.wC.sQurCsbUIksTgEz14NDKeIXzGs79Cfr2OW', 'Deluxe', 'Mr. Wijewardana', 'reservations@agnusvilla.com', 775200029, 775678943, 4000.00, 27000.00, 'new', 8368),
('hot_624050bf2d652', 'Amor Villa Garden Beach Club', 'SLTDA/SQA/GH/0855', 'GH/2022/0062', 'No. 430,', 'Dalawella,', 'Galle', '80.23467779159546', '6.149067203145983', 114933087, 772360927, 'Amor Villa is a delightful colonial house which has been lovingly restored retaining much of its original charm in Dalawella-Unawatuna, a beautiful coastal village in the Southern Province of Sri Lanka.', 'www.dmorvilla.com', 'amorvilla7@hotmail.com', '$2y$10$P2AiDIuL0f2u1X6lXtVq6eMKOxo0lOxwZY0IU08abOpVywfkvVHdi', 'Deluxe', 'Mr. Kalum Wijegunathunga', 'amorvilla7@hotmail.com', 704567893, 769295395, 4000.00, 28000.00, 'new', 3658),
('hot_6240535e0a22f', 'Ananda Ayurveda Resort', 'SLTDA/SQA/GH/01393', 'GH/2022/0094', 'Hiddaruwa,', 'Kosgoda,', 'Galle', '80.24085743352771', '6.1827456965375305', 778657711, 772360927, 'Your life as a unity of body, senses, mind and soul – that is what we focus on here at paradisiacal ANANDA AYURVEDA RESORT. In this elegant little oasis of tranquility on Sri Lanka’s south coast, openness and hospitality are effortlessly combined with individuality and privacy. Your regeneration and the restoration of your life balance are the ultimate goals with which we welcome you, accompany you, treat you with Ayurvedic practices, say goodbye and welcome you once again. Be ANANDA too!', 'https://www.ananda-resort.com/en/philosophy/', 'info@ananda-resort.com', '$2y$10$EjWLcimsAVJ5wgj6Eh/hEu4SWRdfc7ZB/sV1gt8qGfoTZZ4FsYTku', 'Deluxe', 'Mr. Dunja Stauder', 'd.stauder@ananda-resort.com', 778657711, 767965023, 4000.00, 24000.00, 'new', 4248),
('hot_624054b25cddf', 'Araliya Beach Resort & Spa Unawatuna', 'SLTDA/SQA/TH/00418', 'TH/2022/0023', 'Welladewala Road,', 'Unawatuna', 'Galle', '80.24085743352771', '6.1135658833676025', 912031111, 772360927, 'Embellished with the charms of immaculate beaches, lush coconut groves, and stunning oceanic vistas from all its abodes, Unawatuna Beach Resort & Spa is a premier amongst Unawatuna hotels! Being the first star-class and five-star hotel in Unawatuna, the property is composed of a wide array of exclusive accommodation options, bars, restaurants, boutiques, and entertainment hubs making it an idyllic destination to experience pure tropical bliss!', 'https://www.araliyaresorts.com/araliya-beach/', 'fc@araliyabeachresort.com', '$2y$10$.cv5DkEVrfUI1f3oCUziL.c./NsO0w5eg4PJ/hc2VGHZz0wSFxblO', 'Deluxe', 'Mr. Danapala Siriwardhane', 'info@araliyabeachresort.com', 704567893, 775678943, 6000.00, 36000.00, 'new', 4717),
('hot_624055f046248', 'Asian Jewel Hotel', 'SLTDA/SQA/GH/1011', 'GH/2022/0041', 'Baddegama Road,', 'Hikkaduwa', 'Galle', '80.24566411972046', '6.121758705248631', 914931388, 772360927, 'Situated in Hikkaduwa, Asian Jewel Boutique Hotel is a beautiful property overlooking the lagoon, a 10-minute tuk tuk ride from the main road and beach.', 'https://www.booking.com/hotel/lk/asian-jewel-boutique.en-gb.html?aid=311984;label=asian-jewel-boutique-aX%2AUlj9_77tWeEWSx%2AO3XAS541251926318%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-320922013652%3Alp1009919%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YXORK0YJiVoOxcWODxYDaAA;sid=7bbf99048abb7ef6829b2c88e823dc78;dest_id=-2219694;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;hpos=1;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;srepoch=1648383404;srpvid=54985655248e0080;type=total;ucfs=1&#hotelTmpl', 'jaya87hewage@gmail.com', '$2y$10$f9e2/k3bM0YJbTX2I6TD8uAKYSSH/xklHp1xzDQ5qqB.2Jzm1KfJ2', 'Deluxe', 'Mr. Umal Thilakarathne', 'umalthilakarathne@gmail.com', 704567893, 775678947, 6000.00, 36000.00, 'new', 2369),
('hot_624059c090aca', 'Apsara Resort', 'SLTDA/SQA/GH/0496', 'GH/2022/0021', 'No.539,', 'Nittambuwa.', 'Gampaha', '79.9785058412449', '7.105183661660716', 332292564, 712340923, 'Hotel Apsara Resort Nittambuwa is located in Sri Lanka at the address: No 539, Kandy Road, Malwatta, Nittambuwa, Sri Lanka', 'https://www.apsarakhaolak.com/', 'kans11393@gmail.com', '$2y$10$tsSlHVao/OoA6KVkmepCQuDgX52B/0sgutYTqBMjRYFB0zXta9eIG', 'Luxury', 'Mr, Lal Kumarasiri', 'lalkumarasiri@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 6367),
('hot_62405b110d8c4', 'Catamaran Beach Hotel', 'SLTDA/SQA/TH/009', 'TH/2022/0041', 'No: 209,', 'Negombo', 'Gampaha', '80.01356165261049', '7.091559599566208', 773777739, 312228805, 'Within 20 minutes drive away from the Bandaranaike International Airport, at the Negombo Tourist Area is located the Catamaran Beach Hotel. Recently refurbished, this 46 roomed Hotel has all the amenities of a Tourist Hotel such as a Restaurant, a Bar with a Specialty Restaurant, a Swimming Pool complete with a Kiddies Pool – all located within a Wi-Fi environment and is in close proximity to all the other tourist facilities that are there in the area.', 'www.lsrhotel.com', 'hotelaccounts4@lsr-srilanka.com', '$2y$10$Vq9ZlgQaBKG72nY2vXcqBu7Qoi1my2CRXPis8187DzNS5BGdr6Fvi', 'Deluxe', 'Mr. Tian Kumalasiri', 'gm@LSRhotels.com', 112826125, 112812105, 0.00, 0.00, 'new', 7140),
('hot_62406b1fd728f', 'Goldi Sands Hotel', 'SLTDA/SQA/HC/086', 'HC/2022/0022', 'Ethukala,', 'Negombo,', 'Gampaha', '80.00181390021574', '7.0801070921285785', 312279227, 312233564, 'Negombo is a popular beachside retreat situated just minutes away from the International Airport. It boasts of some of the finest beaches in the country along with other attractions such as the Muthurajawela marshes which is home to many varieties of fauna, flora and birds, 100 km long canal network, the Dutch Fort built in 1672, the ancient churches, the second largest fish market in the country along with the daily fish auctions, lagoon boat rides and much more. Negombo also provides easy acce', 'www.goldisands.com', 'goldi@eureka.lk', '$2y$10$ztc/POSyVXOIVZdiuDYU8eBWUGVynR7fM7r9UKM3lF/Ro4W/GWdoC', 'Deluxe', 'Mr. Yomal Keerthirathna', 'goldi@eureka.lk', 312279227, 312278020, 0.00, 0.00, 'new', 4623),
('hot_6240d6042cfff', 'Gondolas Holiday Lanka', 'SLTDA/SQA/HSU/00773', 'HSU/2022/0022', 'No.750,', 'Maththumagala,', 'Gampaha', '80.00671148300171', '7.093035450575984', 777462533, 112943660, 'Gondolas Holiday Lanka, is proudly known for its unique and hospitable accommodation facilities and tour operation arrangements to enjoy the luxurious surrounding, in paradise Sri Lanka. We provide you with a friendly and personalized service to best suit you and your family’s needs, while suggesting and guiding you of the best way to enjoy your holiday in\r\nSri Lanka.\r\nWe promise you a memorable and enjoyable stay here!', 'WWW.GONDOLASHOLIDAYLANKA.COM', 'tony@gondolasholidaylanka.com', '$2y$10$P9Zp02lB.O3b7v0LRyrsRuUd8MhFyrJU3mRkgtl/PLVyt6/9TZf0y', 'Deluxe', 'Mr. Tony Fernando', 'tony@gondolasholidaylanka.com', 777462533, 112943660, 0.00, 0.00, 'new', 1812),
('hot_6240d78eb685d', 'Hotel J', 'SLTDA/SQA/TH/251', 'TH/2022/0005', 'No.331/1,', 'Negombo,', 'Gampaha', '79.86938238143921', '7.196595114718772', 112345700, 772360927, 'Revel in our histories. Chase our mysteries. Discover extraordinary places. Unwind in our spaces. At Jetwing Hotels, we promise you are in good hands. With the largest family of hotels and villas across Sri Lanka, we are delighted to welcome you into our homes found on the mountains to the coastline, and everywhere else in between.\r\n\r\nOur legendary hospitality is one that we are truly proud of, and will forever remain synonymous with our name - wherever you may cross paths with us on your travel', 'www.jetwinghotels.com', 'praveen@jetwinghotels.com', '$2y$10$fbgOrzn7xz/yq331amHIVe2kpdXBo9C4YzSMNnTwReeB0/oPBX1UO', 'Deluxe', 'Mr. Dileep Irene', 'deileepIre89@gmail.com', 704567893, 112345700, 0.00, 0.00, 'new', 6264),
('hot_6240dd8707db8', 'Chena Huts', 'SLTDA/SQA/BH/00039', 'BH/2022/0011', 'Yala-palatupana,', 'Thissamaharamaya,', 'Hambantota', '79.861243', '6.9270786', 472267100, 772360927, 'Set amongst the golden dunes and the lush greenery in Yala Sri Lanka, Uga Chena Huts blends Sri Lanka’s most celebrated features – its tropical beaches and its exotic wildlife.\r\n\r\nOur Yala hotel has been designed with its surrounding tropical jungles and saline lake in mind. Enveloped in a world of scenic splendour and exotic fauna, our ‘huts’ are luxurious private cabins that offer awe-inspiring views of the surrounding wilderness and seascape.', 'https://www.srilanka.travel/index.php?route=travel/tostay&hotel_type=&hotel_district=Hambantota&is_expired=false', 'gm-ch@ugaescapes.com', '$2y$10$cA5wNd9USZMI.DmzlzN24.M5lmhnYNo8cOcicSirO5fx3Ht7w9TgO', 'Deluxe', 'Mr. Yuvin Athapaththu', 'inquiries@ugaescapes.com', 112117100, 775678943, 0.00, 0.00, 'new', 5110),
('hot_6240def0e5dd7', 'Cinnamon Wild Yala', 'SLTDA/SQA/HC/161', 'HC/2022/0039', 'P. O. Box. 01,', 'Tissamaharama', 'Hambantota', '81.12251026555896', '6.143302183109472', 472239450, 472244455, 'We’re so glad to sense the excitement you’re filled with, to meet our wild neighbours. Yes, we’ve developed the sixth sense, living around the jungle. We’re hoping to greet you soon but chances are, a few of our untamed friends might meet you before us, as the path that you’ll pass to reach us is also the route they take for an evening walk. A little lake bordering us has a few crocodiles, but they keep a safe distance from us. In fact, we set up romantic dinners on a deck, right by the lake.', 'http://www.cinnamonhotels.com/cinnamonwildyala/', 'accountant.wild@cinnamonhotels.com', '$2y$10$bTTvTKNZCI3Te3xn46sWs.6xcJRiY2ejdsGRWmbr42WybPvSQqOjy', 'Deluxe', 'Iceland Business Center', 'icelandbusinesscenter@gmail.com', 112161161, 112161162, 0.00, 0.00, 'new', 9944),
('hot_6240e0404cb82', 'Double Lake View Tissa', 'SLTDA/SQA/HSU/01135', 'HSU/2022/0021', 'No:1033/3,', 'Debarawewa,', 'Hambantota', '81.26575283012757', '6.279086503004446', 472239658, 713042867, 'Located in Tissamaharama, 2.3 km from Tissa Wewa, Double Lake View Tissa & Safari provides accommodation with a restaurant, free private parking, a shared lounge and a garden. Featuring family rooms, this property also provides guests with a terrace. The accommodation features a 24-hour front desk, airport transfers, room service and free WiFi.\r\n\r\nGuests at the hotel can enjoy a à la carte breakfast.\r\n\r\nThe area is popular for cycling and fishing, and car hire is available at Double Lake View Ti', 'https://www.booking.com/hotel/lk/gamunu-lake-spot-amp-yala-safari.en-gb.html?aid=356980;label=gog235jc-1DCAsohQFCIGdhbXVudS1sYWtlLXNwb3QtYW1wLXlhbGEtc2FmYXJpSDNYA2iFAYgBAZgBCbgBF8gBDNgBA-gBAYgCAagCA7gC7r6DkgbAAgHSAiQ0NzA4Yzk5NC05MjVhLTRhM2ItYjU2YS1hMjc4ZDNlNzdkYmLYAgTgAgE;sid=7bbf99048abb7ef6829b2c88e823dc78;dist=0&keep_landing=1&sb_price_type=total&type=total&', 'lakespotgamunu@gmail.com', '$2y$10$E1/sbq3tJ.JscmKZEv5ipOJ6cfDOq82wo7b/V1JlLnKlrnQTCD.3W', 'Superior', 'Mr. Gamunu Hewawissa', 'gamunuhewawissa34@gmail.com', 778657711, 707144695, 0.00, 0.00, 'new', 1093),
('hot_6240e1d569f27', 'Flameback Eco Lodge', 'SLTDA/SQA/GH/01469', 'GH/2022/0060', 'Weerawila Estate,', 'Weerawila,', 'Hambantota', '81.22962696477771', '6.24213312356145', 475100100, 472240179, 'Unravel your senses to the most spectacular eco lodges embossed in a lush eco garden in Weerawila; nestled amidst the gleeful chirps of endemic bird species, the immaculate waters of the bordering lake will miraculously freshen your spirits.\r\n\r\nNestled amidst a bird sanctuary by the tranquil Weerawila lake, our luxury tented lodges offer a legacy of rejuvenation. Enjoy the delectable organic cuisine sourced from local communities, while being part of our eco-friendly glamping escapade.', 'WWW.FLAMEBACKECOLODGE.COM', 'dulaniflamebacke@gmail.com', '$2y$10$Okshu6XdFu28DQ67kdUuYOgn0SCbIrOu7zxmz1HiE5Id1uDnKCgq.', 'Luxury', 'Ms. Dulani Chapa', 'dulanichapa@gmail.com', 704567893, 773638381, 0.00, 0.00, 'Existing', 5379),
('hot_6240e3afae832', 'Hotel Sapid Luck', 'SLTDA/SQA/BUN/00933', 'BUN/2022/0015', 'Weliaragoda Road,', 'Mahasenpura,', 'Hambantota', '81.31060359768186', '6.3010442419006445', 472237004, 718062121, 'Set in Tissamaharama, within 2.3 km of Tissa Wewa and 2 km of Tissamaharama Raja Maha Vihara, Hotel Sapid Luck offers accommodation with a restaurant and free WiFi as well as free private parking for guests who drive. Boasting room service, this property also provides guests with a terrace. The hotel has family rooms.\r\n\r\nAll guest rooms at the hotel come with a seating area and a TV. The rooms come with a private bathroom with a bidet, bathrobes and a hairdryer.', 'Hotelsapidluck@gmail.com', 'nuwantharam@gmail.com', '$2y$10$iwROHOXFuvnt7AHcTm22d.ggnc4To.tAgmMmenqvvkQbmiGmWoa/6', 'Standard', 'Dr. Suhen Bandara', 'suhenanuradha@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 1323),
('hot_6240e56ae63fc', 'Bastian Hotel', 'SLTDA/SQA/GH/0618', 'GH/2022/0028', 'No.37/11,', 'Kandy Road,', 'Jaffna', '80.02404955328143', '9.674507288856875', 212222605, 772360927, 'Well known hotel in Jaffna area. Come and feel the feeling.....', 'www.bastianhotel.com', 'bastianinfo@gmail.com', '$2y$10$xp7H7V9kiLbFJYcbMMi4eOHN29FYP81Md.QqCe15oyWqpqbDKrH8.', 'Deluxe', 'Mr. Vinod Selvaraja', 'vinodselvaraja@gmail.com', 212222605, 772360928, 0.00, 0.00, 'new', 8866),
('hot_6240e6a1d0407', 'Jetwing Jaffna', 'SLTDA/SQA/HC/00203', 'HC/2022/0013', 'No. 37,', 'Mahathmagandi Road,', 'Jaffna', '80.02330216518797', '9.676303691867162', 112345700, 772360927, 'Revel in our histories. Chase our mysteries. Discover extraordinary places. Unwind in our spaces. At Jetwing Hotels, we promise you are in good hands. With the largest family of hotels and villas across Sri Lanka, we are delighted to welcome you into our homes found on the mountains to the coastline, and everywhere else in between.\r\n\r\nOur legendary hospitality is one that we are truly proud of, and will forever remain synonymous with our name - wherever you may cross paths with us on your travel', 'www.jetwingshotels.com', 'christopher.p@jetwinghotels.com', '$2y$10$uw3UzkDfowKHffaZ01dmN.bHXc9aG4pRNFHw.gmm.IurWfl3aw/5q', 'Deluxe', 'Mr. Sumanthiran', 'sumanthiranjetwings@gmail.com', 704567893, 775678947, 0.00, 0.00, 'Existing', 5055),
('hot_6240e799ee7a0', 'North Gate By Jetwing', 'SLTDA/SQA/HC/00204', 'HC/2022/0041', 'No.136,', 'Martine Road,', 'Jaffna', '79.86114263534546', '6.902206909028085', 212030500, 772360927, 'Revel in our histories. Chase our mysteries. Discover extraordinary places. Unwind in our spaces. At Jetwing Hotels, we promise you are in good hands. With the largest family of hotels and villas across Sri Lanka, we are delighted to welcome you into our homes found on the mountains to the coastline, and everywhere else in between.\r\n\r\nOur legendary hospitality is one that we are truly proud of, and will forever remain synonymous with our name - wherever you may cross paths with us on your travel', 'www.jetwingshotels.com', 'sivakumar@jetwinghotels.com', '$2y$10$.ZiguUSSxHZmRSWKOb/HXOj7DXbCVmx4wAMiqIOfwIqzH1SYtsjvW', 'Deluxe', 'Mr. Siva Kumar', 'sivakumar@jetwinghotels.com', 212030500, 772360927, 0.00, 0.00, 'new', 6229),
('hot_6240e9a96e8ad', 'Avani Kalutara Resort', 'SLTDA/SQA/TH/050', 'TH/2022/0016', 'No.40,', 'Katukurunda,', 'Kalutara', '79.97100591659546', '6.607635488451874', 342226537, 772360927, 'Dial up the Flex Factor with our risk-free rates. Enjoy stylish escapes in all our destinations with free cancellation and the freedom to change your dates when you need to.', 'https://www.avanihotels.com/en/kalutara', 'kdisnakan@anantara.com', '$2y$10$eINsMm/75nNAUbare.S9JuFhjq.9noS5rh2N//kYi9QuW04CMLpDa', 'Deluxe', 'Mr. Huang Zitao', 'reserveavani@avanihotels.com', 344297700, 344297701, 0.00, 0.00, 'new', 6759),
('hot_6240eaf97ec14', 'Jie Jie Beach By Jetwing', 'SLTDA/SQA/TH/00356', 'TH/2022/0017', 'No. 150,', 'Uyankalewatta,', 'Kalutara', '79.9061999446893', '6.703599318099865', 387899899, 772360927, 'Ayubowan! (May you live long)\r\n\r\nNot too far away from the bustling city of Colombo, a suburban stretch of beach sits just beyond the pulse of our island capital. As an overlooked getaway upon these shores, our tropical escape conveniently rests between the urban cacophony and coastal hotspots, offering you some of the greatest local experiences from our home of Sri Lankan hospitality.', 'https://www.jetwinghotels.com/jiejiebeachbyjetwing/#gref', 'rukantha@jetwinghotels.com', '$2y$10$Q7keLZawHYJ9YHtNkP7s0.uAQuaYE6vSO8.umh/1uhl9oXTcanMzq', 'Deluxe', 'Mr. Rukanthe Somadisi', 'rukanthajetwing@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 2126),
('hot_6240ecc1ed45e', 'Mermaid Hotel & Club', 'SLTDA/SQA/HC/066', 'HC/2022/0034', 'Mahawaskaduwa,', 'Kalutara,', 'Kalutara', '79.96656678106294', '6.574456686005834', 342237613, 772360927, 'Escape to our all-inclusive tropical resort, nestled in the historic coastal village of Kalutara, on the sunny Southern coastline of Sri Lanka.', 'http://www.mermaidhotelkalutara.com/ppc/?gclid=CIj', 'gm@mermaidhotelnclub.com', '$2y$10$cfVC0SWK.sM3WwOW91jReOil0Pjtr3deaduFA7l7SSQxSgD./sHSW', 'Deluxe', 'Mr. Louis Aponsu', 'louisinmermaid@gmail.com', 704567893, 342237613, 0.00, 0.00, 'new', 6556),
('hot_6240eebbb356f', 'Ranmal Holiday Resort', 'SLTDA/SQA/HC/071', 'HC/2022/0021', 'No.346/5,', 'Gorakana', 'Kalutara', '79.96235745361305', '6.585423755488468', 382298921, 772360927, 'Perfectly located on the bank of Bolgoda Lake, Ran Mal Holiday Resort is a perfect venue for romantic getaways and family vacations alike.\r\n\r\nNestled away from the hustle of the city, the Resort provides a perfect hideout for those who would like to enjoy a relaxing holiday amidst the quietness of a breathtaking lakefront rich in bio diversity.', 'http://www.ranmalholidayresort.com/', 'anura@rodesha.com', '$2y$10$ghkhYUPPkdHVSn6Ug776we/zu6DMJ0JBdMPFSUznSmk3ea5kf04sm', 'Deluxe', 'Mr. Anura Yahampath', 'anurayahampath@gmail.com', 704567893, 382298922, 0.00, 0.00, 'new', 5358),
('hot_6240f0a0ecaed', 'Rosyth Estate House', 'SLTDA/SQA/BV/00039', 'BV/2022/003', 'Rosyth Estate,', 'Pussella,', 'Kegalle', '80.35280227661133', '7.276824847959483', 112501305, 772360927, 'A 1926 colonial planter’s bungalow set in a 62 acre private tea and rubber estate offering outstanding accommodation, exceptional food and extraordinary experiences. The Rosyth Estate House provides guests with the opportunity to experience the beauty and culture of rural Sri Lanka. Explore the estate, visit the local tea factory, chill by the pool or take in the stunning views. Our private house in the hills, run as a boutique hotel is a perfect place to stay.', 'www.rosyth.lk', 'accounts@rosyth.lk', '$2y$10$EFHLUcpfloaNoF83cyJeBu/plVOHWNJbHnb0.Bp2OItLXQtvnzuvW', 'Deluxe', 'Mr. Esanga Ganier', 'esangaganier@gmail.com', 704567893, 775678943, 4000.00, 75000.00, 'new', 5689),
('hot_6240f27890e97', 'Shadow Grove-holiday Park', 'SLTDA/SQA/BUN/00942', 'BUN/2022/0036', 'Welithuduwa Watta,', 'Batakiththa,', 'Kegalle', '80.34341153194457', '7.253404861480302', 114809400, 772360927, 'Holiday parks offer a wide variety of accommodation options, from camping sites through to self-contained cabins and luxury cabins. Holiday Parks are your best option for accommodation when exploring surrounding attractions.', 'www.shadowgrove.lk', 'shadowgrovek@gmail.com', '$2y$10$wyF7s3GNHRWiDPnVUqDm2.Coqp7hVtSy.LQ/k8WpYgrSG5/IssA7q', 'Standard', 'Mr. Greshan Perera', 'greshanperera@gmail.com', 704567893, 775678943, 4000.00, 80000.00, 'new', 1085),
('hot_6240f40bcb1eb', 'The Rafter`s Retreat', 'SLTDA/SQA/GH/01738', 'GH/2022/0092', 'Hilland Group,', 'Kithulgala', 'Kegalle', '80.35037775107227', '7.260321943743323', 362287598, 772360927, 'Welcome to The Rafter’s Retreat Kitulgala, one of the most ideal destinations for water sports and adventure activities in Sri Lanka.\r\n\r\nThe Rafter’s Retreat is the perfect getaway for independent travellers, families, venturesome couples, propped individuals and adrenalin junkies.\r\n\r\nLocated in the heart of Kitulgala – 90 kilometers from Colombo (a two hour and forty-five minute drive along the banks of the Kelani River – adventure, action and a oneness with nature is a key element of here.', 'www.raftersretreat.com', 'talataperera@gmail.com', '$2y$10$aQsUYm7BPL162XSsbVLaj.lKgc6ZcPMJvpL5Dz6mDsDkmGOmq5Cq.', 'Deluxe', 'Mr. Anil Rupasinghe', 'anilrupasinghe@gmail.com', 704567893, 362987597, 0.00, 0.00, 'new', 4943),
('hot_6240f5a4676e2', 'Up Country Rest & Holiday Home', 'SLTDA/SQA/GH/0355', 'GH/2022/0024', 'Welamita Wanguwa,', 'Hingula,', 'Kegalle', '79.86114263534546', '6.902206909028085', 362567501, 772360927, 'Holiday parks offer a wide variety of accommodation options, from camping sites through to self-contained cabins and luxury cabins. Holiday Parks are your best option for accommodation when exploring surrounding attractions.', 'https://www.booking.com/hotel/lk/kelburne-mountain-view-cottages.en-gb.html?aid=356980;label=gog235jc-1BCAMYkgQohQFCCGhhcHV0YWxlSDNYA2iFAYgBAZgBCbgBF8gBDNgBAegBAYgCAagCA7gCpOmDkgbAAgHSAiQzMGUwZGM4NC1kMzY2LTRhZGQtODllMy00NjFkZjZmOWMyODfYAgXgAgE;sid=7bbf99048abb7ef6829b2c88e823dc78', 'heenkendagayan@gmail.com', '$2y$10$qr17ZH.LGjt.0oe9aomkJ.UwDionGuuwoesCWmTwoDZAdsz8Tx4AS', 'Deluxe', 'Mr. Milinda Heenkenda', 'milindaheenkenda@gmail.com', 776294489, 775678943, 0.00, 0.00, 'new', 6123),
('hot_6240f7a50518e', 'Hotel Yapahuwa Paradise', 'SLTDA/SQA/HC/124', 'HC/2022/0029', 'Kingdom Road,', 'Yapahuwa,', 'Kurunegala', '80.3247604709855', '7.448547840568377', 373975055, 772360927, 'Hotel Yapahuwa Paradise always makes your way to have a happy and comfortable stay at Yapahuwa ancient kingdom, which has the ever remarkable attractive flight of steps, giving you boundless merriment to feel yourself at home throughout your stay. The nature of Hotel Yapahuwa Paradise provides each and every guest a charming environment to breathe in, followed by a radiant welcoming smile from our crew at any time of the day.', 'http://www.hotelyapahuwaparadise.com/', 'sunil@yapahuwa-paradise.com', '$2y$10$QtrfG0rIkXMLTGpkmgRWt.b7Yk5P.2J8FPfYF2FKmvnaJjWimqpGS', 'Deluxe', 'Mr. Sunil Senadheera', 'sunilsenadheera@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 5723),
('hot_6240fe4da6fb2', 'Hotel Blue Sky', 'SLTDA/SQA/HC/154', 'HC/2022/0019', 'No.240,', 'Negombo Rd,', 'Kurunegala', '80.18420934677124', '7.476359593385881', 372224777, 713042867, 'Set in Kurunegala, Hotel Blue Sky offers a garden. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. Free private parking is available and the hotel also offers car hire for guests who want to explore the surrounding area.', 'https://www.booking.com/hotel/lk/blue-sky-kurunegala1.en-gb.html', 'hotelbluesky@gmail.com', '$2y$10$mhvfEQRVXA5bCBdiVyEAdOYlHDAOFyvBzUDKPXDJI6/BbtHXGy82m', 'Standard', 'Mr. Iwantha Kabral', 'iwanthakabral@gmail.com', 778657711, 372224778, 0.00, 0.00, 'new', 7523);
INSERT INTO `hotels` (`hotelID`, `name`, `regNo`, `licenceNo`, `address_line1`, `address_line2`, `city`, `longitude`, `latitude`, `contact1`, `contact2`, `description`, `webUrl`, `email`, `password`, `hotel_type`, `rep_name`, `rep_email`, `rep_contact1`, `rep_contact2`, `single_price`, `massive_price`, `status`, `otp`) VALUES
('hot_6241011736af6', 'Birds Park Nature', 'SLTDA/SQA/HC/194', 'HC/2022/0529', 'Wadakada,', 'Polgahawela', 'Kurunegala', '80.22266149520874', '7.470913094766207', 704567893, 373981928, 'Birds Park Polgahawela features accommodation in Egalla. This 3-star hotel offers room service and luggage storage space. The hotel has an outdoor swimming pool and garden views, and guests can enjoy a meal at the restaurant or a drink at the bar.\r\n\r\nAt the hotel, rooms are fitted with a wardrobe, bed linen and a patio with a mountain view. Featuring a private bathroom with a shower and free toiletries, rooms at Birds Park Polgahawela also boast free WiFi.', 'https://www.booking.com/hotel/lk/birds-park-polgahawela.en-gb.html?aid=356980;label=gog235jc-1DCAsohQFCFmJpcmRzLXBhcmstcG9sZ2FoYXdlbGFIM1gDaIUBiAEBmAEJuAEXyAEM2AED6AEBiAIBqAIDuAKL_oOSBsACAdICJDUxNjExZDQzLWQwZGYtNDRjYi05YmRiLTY2NWQ5YTg4ODcyYtgCBOACAQ;sid=7bbf99048abb7ef6829b2c88e823dc78;dist=0&keep_landing=1&sb_price_type=total&type=total&', 'birdsparkhotel@gmail.com', '$2y$10$JvAGz36DJ1Ygv8FSKJ.2HeSAgfbZ9nhspjkJ3JO2A.6SPGdL/mcz2', 'Deluxe', 'Mr. Niron Janitha', 'nironjanith@gmail.com', 704567893, 775678943, 0.00, 0.00, 'Existing', 4764),
('hot_6241029b9be9f', 'Reside Cabana', 'SLTDA/SQA/HC/156', 'HC/2022/0021', 'Regland Watta,', 'Colombo road,', 'Kurunegala', '80.38350064080552', '7.495387274942256', 775415804, 712340923, 'Brilliantly situated in kurunegala over looking to The Remarkables Sri Lankan Heritage with a breathtaking view. Reside Cabana View the spirit of its location.Its works of art, bespoke furniture and refreshing colours, which highlight the unique charm of the place and the serenity of its surroundings..', 'http://residecabana.com/', 'residecabana3@gmail.com', '$2y$10$JSuC0WIOwaelMo/L5QLHvO6usk1ow4DOCAq8qznd7ZhtuU8dvtw76', 'Deluxe', 'Mr. Navod Pushpika', 'navodpushpika87@gmail.com', 704567893, 775415805, 0.00, 0.00, 'new', 2657),
('hot_6241046192fb2', 'Green Line Guest House', 'SLTDA/SQA/GH/01363', 'GH/2022/0011', 'Moonram Pity,', 'Paliyaru,', 'Mannar', '79.89561933316773', '8.998567957820743', 233232614, 111234567, 'To find the charm of life, we have tried to unite for you, what the body, the soul and the heart longs to find a recuperation.\r\n\r\nOur greatest wish is to make you feel at home by presenting you an atmosphere you will not be able to forget, near the river away from crowds and the quietness of the country and the unique scenery. As a team we believe that the difference lies in small details, how about you ?\r\n\r\nIf the main idea of your vacation is only to enjoy the moments you live , welcome here..', 'greenlinerestaurant.com', 'greenlineguesthouse@gmail.com', '$2y$10$aO44DMs6ie.KZedd0Gruqei0m8fP/I9wo5jJ7XbjbYOUjaEXGVNHC', 'Deluxe', 'Mr. Helanka Kariyawasam', 'helankakariyawasam@gmail.com', 704567893, 233232615, 0.00, 0.00, 'new', 8293),
('hot_624105fe99a49', 'The Palmyrah House', 'SLTDA/SQA/GH/01313', 'GH/2022/00416', 'No.11 ,', 'Haine road,', 'Mannar', '79.86114263534546', '6.902206909028085', 777776065, 112869960, 'Palmyrah House is situated in the approximate center of Mannar Island, with easy access to any place on the isle. We offer comfortable rooms, delicious food, a swimming pool, traditional well bath, recreational area, gym, library, bar, restaurant and tours throughout the district.', 'https://www.palmyrahhouse.com/', 'mannar@serendipityretreats.com', '$2y$10$6/6zGZxu0s5lB7BUmg1UMubtrsgTS7LuDeNmOlDPKxzKsXppyTQRq', 'Deluxe', 'Mr. Kleetas Perera', 'kleetasperera@gmail.com', 704567893, 112869966, 0.00, 0.00, 'new', 8458),
('hot_624108cc73cbd', 'Hotel Agape', 'SLTDA/SQA/GH/013634', 'GH/2022/00111', 'No.32 / 31,', 'Seminary Road,', 'Mannar', '79.88600228245919', '9.005171833018633', 704567893, 772360927, 'The Hotel Agape Mannar is a newly built hotel on Mannar Island.\r\n\r\n\r\n\r\nIt has been thoughtfully designed for those who love to explore but still enjoy their creature comforts after a long day!\r\n\r\n\r\n\r\nIt is the first of its kind on the island and offers travellers ten very comfortable en suite and air conditioned guest rooms.', 'http://www.lovethestay.com/', 'hotelagapemannar@gmail.com', '$2y$10$D4/tJMXsTx6sI22FQS24aeP1rrhcTQSLcp275z5M9l85PAmSXAsIm', 'Luxury', 'Mr. Soman', 'somangunathilake@gmail.com', 704567893, 775678943, 0.00, 0.00, 'Existing', 5700),
('hot_62410aa6c6a62', 'Ahash Hotel - Mannar', 'SLTDA/SQA/GH/01913', 'GH/2022/031', 'No.179,', 'Thalvupadu,', 'Mannar', '79.90012796206057', '8.988297620249469', 704567893, 233236611, 'Ahash Hotel warmly welcomes you\r\nRoll in to the weekend with style for a tropical experience in Mannar. Head over to beautiful beach front setting of AHASH and enjoy the tranquility of sandy beach, amazing pool and beautiful sea view rooms with all modern amenities and inbuilt balcony.', 'https://www.tripadvisor.com/Hotel_Review-g2435125-d3680880-Reviews-Hotel_Ahash-Mannar_Northern_Province.html', 'ahashhotel@gmail.com', '$2y$10$oa.nR8t96md/lSGG6ovgVuqIK7g1MrefvikF5Hp3KGGAATK7p7d9S', 'Luxury', 'Mr. Vignam Shantha', 'vignamshantha@gmail.com', 704567893, 233832113, 0.00, 0.00, 'Existing', 2354),
('hot_62410c50a551d', 'Camellia Hills', 'SLTDA/SQA/GH/01440', 'GH/2022/0012', 'William Bungalow,', 'Dickoya,', 'Nuwara Eliya', '80.57108338062038', '6.860749394008708', 514932124, 111234567, 'Sri Lanka is our passion. Our collection of small, stylish, service-driven boutique hotels champion the island’s rich history, dazzling diversity and warm, open-hearted people, while our fusion menus celebrate the country’s abundant variety of fresh local produce.', 'www.teardrop-hotels.com', 'nirosh@teardrop-hotels.com', '$2y$10$6naVrZyCDy7eMqEtO2dB0u21cic2jcJiwmplyR7b1P.hkhPMHkfgG', 'Deluxe', 'Mr. Zenal Oswitta', 'zenaloswitta@gmail.com', 704567893, 112161161, 0.00, 0.00, 'new', 9645),
('hot_62410db67b4f8', 'Goatfell Hotel', 'SLTDA/SQA/GH/01730', 'GH/2022/0051', 'Goatfell Division,', 'Kandapola,', 'Nuwara Eliya', '80.83840121572078', '7.001598802568324', 704567893, 772360927, 'Sri Lanka is our passion. Our collection of small, stylish, service-driven boutique hotels champion the island’s rich history, dazzling diversity and warm, open-hearted people, while our fusion menus celebrate the country’s abundant variety of fresh local produce.', 'www.teardrop-hotels.com', 'goatfellteardrop@gmail.com', '$2y$10$HsNUSACU/maCfDwMPy9emu1Is8ff0czoRehteWKar63YOIF3VAJDa', 'Deluxe', 'Mr. Nisala Weerakkodi', 'nisalaweerakkodi@gmail.com', 778657711, 775678943, 0.00, 0.00, 'Existing', 2591),
('hot_62410f3d1abec', 'Grand Adamspeak', 'SLTDA/SQA/GH/01671', 'GH/2022/0017', 'Seethagangulagama,', 'Nallathanniya', 'Nuwara Eliya', '80.91252437229404', '6.7764825426186', 522055510, 772360927, 'Situated in the heart of Delousie at the starting point of Adamspeak Hill Climb, The Grand Adamspeak is the perfect heaven for those with the time to explore the Adam speak – Sri Lanka’s most popular and most scenic hill climb. With the warm hospitality surrounded by a scenic environment, the guests will be having an unforgettable stay at The Grand Adamspeak. The guests can experience the great view of the Adamspeak mountain top with the clear view of the temple from the restaurant or from most', 'www.grandadamspeak.com', 'grandadamspeak@yahoo.com', '$2y$10$CqSs6hkqcP04WVDmiU0n4uAeVqlw9WWyo/iVOj.7uMDwFn8Tlz8fG', 'Superior', 'Mr. Nathan Kurey', 'nathankurey@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 9676),
('hot_62411095d95e4', 'Heaven Seven', 'SLTDA/SQA/HC/00215', 'HC/2022/0026', 'No 24,', 'Hadon Hill Road,', 'Nuwara Eliya', '80.79381902378842', '6.951865245472228', 522234256, 772360927, 'The fresh greenery and gentle breeze wrapping your soul and mind\r\n\r\nStanding on the balcony of the Heaven Seven, the gentle breeze flowing past you, will make your soul feel loved and joyous. The alluring fragrance of the multi-hued blossoms will fill up your lungs as the grandstand view of the Race Course and the breath-taking view of the City of Nuwara Eliya will definitely mesmerise you. If such a heavenly ambience can be experienced in the Balcony, imaging the height of comforts you’ll be wr', 'https://www.heavensevenhotels.com/nuwara-eliya-hotel/', 'gm.ne@lkbiz.com', '$2y$10$FIJE9xBjRISTQgfvNZqwjOy5aYLqO0o1r9O4J09btbAzMPoPy/5dq', 'Deluxe', 'Mr. Hameed', 'hameedheavenseven@gmail.com', 522234257, 775678947, 0.00, 0.00, 'new', 2600),
('hot_6241126763c58', 'Hill Club', 'SLTDA/SQA/TH/118', 'TH/2022/0011', 'No.29,', 'Grand Hotel Road,', 'Nuwara Eliya', '80.76343334922434', '6.970011818331547', 522222653, 712340923, 'Discover Nature at it’s Finest\r\nThe “Little England of Sri Lanka – Nuwara Eliya” is a fabulous gateway located amidst the addictive scenic beauty of the misty Blue Mountains, which is just the right spot to curl up in comforts, away from the work-o-holic routine of our lives. Hill club is a conceptualised, amazing work of architecture that is simply built to make your vacations a totally pampered, spoiled and luxurious engagement, enticing your senses.', 'https://www.hillclubsrilanka.lk/', 'acchillclub@sltnet.lk', '$2y$10$WW8WAY7vvQYY8vi8cmN4cef88xtxiXqY7smDV1Zcj5htSqnVwm.c2', 'Deluxe', 'Mr. Devin Fonseka', 'devinfonseka@gmail.com', 704567893, 522222652, 0.00, 0.00, 'new', 6068),
('hot_624130c63cf07', 'Kent Cottage', 'SLTDA/SQA/BUN/00888', 'BUN/2022/0002', 'Lot 6,', 'Moon Plains,', 'Nuwara Eliya', '80.73901891708374', '6.969551051512714', 704567893, 777008880, 'Located 2.6 km from Gregory Lake, Kent Cottage provides accommodation with a restaurant, a garden and a 24-hour front desk for your convenience. Both WiFi and private parking are available at the villa free of charge.\r\n\r\nA flat-screen TV with DVD player, private bathroom with bathrobes, and a kitchen with dishwasher are provided in certain units.\r\n\r\nGuests at Kent Cottage can enjoy a Full English/Irish breakfast.', 'www.kentcottage.lk', 'krishansanjeewa22@gmail.com', '$2y$10$IHAi0XRmrO758QTiZcBo/.Z0Oh67JtSeKL9vwYrMrk46x/3CzfaYC', 'Deluxe', 'Mr. Kanesh Priyasad', 'kaneshpriyasad@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 3809),
('hot_624140c851209', 'Langdale Resort & Spa', 'SLTDA/SQA/BH/00031', 'BH/2022/007', 'P. O Box 01,', 'Radella,', 'Nuwara Eliya', '80.78106883321064', '6.993050549233522', 704567893, 522223554, 'The Lourdes Hotel is set amidst the peaceful countryside with 360 degree panoramic views of the Sri Lankan highlands and tea estates. Fully furnished with all modern comforts, this beautiful property makes the perfect holiday accommodation for individuals, couples, travel groups or a family. Offering guests a beautiful and remote setting, the hotel is also perfect for a honeymoon stay. All the ‘Superior’ rooms include a balcony that gives you stunning views of the mountains.', 'http://www.lourdeshotel.lk/', 'prasanjithandradi@yahoo.com', '$2y$10$KF/ujD06SRUzh3yeINFC7e33EsIidlRyI4e3N0qvgyecU6lRZUk8u', 'Deluxe', 'Mr. Dasan Athapaththu', 'dasanathapaththu12@gmail.com', 704567893, 522223555, 0.00, 0.00, 'new', 6557),
('hot_62416d800c9fb', 'Giritale Hotel', 'SLTDA/SQA/HC/057', 'HC/2022/0025', 'National Holiday Resort,', 'Giritale,', 'Polonnaruwa', '80.92303991317749', '7.989781742581581', 272246311, 715520887, 'EXPERIENCE HISTORY & CULTURE\r\nSTAY. SEE. FEEL', 'www.giritalehotel.com', 'ganeshant@gmail.com', '$2y$10$n23mGWp6b73gi9uCSataRuGbQMtQ/z7ZEfb6OUahsdYZXICZwfLkm', 'Deluxe', 'Brian Fonseka', 'brianfonseka89@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 4810),
('hot_62416fb27c3d4', 'Peacock Lake Villa', 'SLTDA/SQA/HSU/01130', 'HSU/2022/0008', 'No.789', 'Polonnaruwa Road,', 'Polonnaruwa', '80.75294833562339', '8.029432492156312', 272246314, 715520889, 'Lake Villa Township’s Peacock Summer Day Camp offers an exciting and adventurous environment for your kids to have an unforgettable summer of fun! Camp will be held in one week sessions and campers can sign up for any or all sessions. Camp days are structured with organized activities but also allow for some down time and weather contingencies if needed.', 'www.peacocklakevillahabarana.com', 'prasannahaba@gmail.com', '$2y$10$T4y9tiYAu4cyLYxxaqMoYOZzRqyDJnrhGty4.hrKw52tcgEJvH40C', 'Deluxe', 'Mr. Amantha Weerasinghe', 'amanthaweerasinghe@gmail.com', 715520887, 715520887, 0.00, 0.00, 'new', 1711),
('hot_6241714f1b9a7', 'Polonnaruwa Holiday Inn', 'SLTDA/SQA/TH/119', 'TH/2022/0010', 'Polonnaruwa Holiday Inn,', 'Bendiwewa,', 'Polonnaruwa', '81.01436421177561', '7.934205977957642', 722223381, 722223380, 'Get your trip off to a great start with a stay at this property, which offers free Wi-Fi in all rooms. Conveniently situated in the Bendiwewa part of Polonnaruwa, this property puts you close to attractions and interesting dining options. As an added bonus, restaurant is provided on-site to conveniently serve your needs.', 'https://www.agoda.com/polonnaruwa-holiday-inn/hotel/polonnaruwa-lk.html?cid=1844104', 'nalinnelson@gmail.com', '$2y$10$J9f1w9zllVGDNL93jQ4f0uxHF2q.gxoPEW0U0mozLgLjZvBoBXuTy', 'Deluxe', 'Mr. Nalin Nelson', 'anilnelson@gmail.com', 722223380, 775678943, 0.00, 0.00, 'new', 2127),
('hot_624172b9c3664', 'Siyanco Holiday Resort', 'SLTDA/SQA/GH/0885', 'GH/2022/0056', 'Siyanco Holiday Resort,', '1st Canal Road,', 'Polonnaruwa', '81.01577420512366', '7.9550309998547855', 272226868, 713042867, 'Our teams of experts are always ready to make your dream holiday a reality. With a wide range of itineraries, we believe your holiday in Sri Lanka will be a memorable one. if not, make your own itinerary together.', 'www.siyancoholidayresort.com', 'siyncoholidayresort@gmail.com', '$2y$10$yMBnA3yX62AJjDRYZ30Ei.S1FdY1.SL5BpkZprrrzV.6EHj9lNPgS', 'Deluxe', 'Mr. Yoshan Wirakkodi', 'yoshanweerakkodi@gmail.com', 704567893, 775678943, 0.00, 0.00, 'Existing', 4354),
('hot_6241743d9a95e', 'Bay Watch And Jayaweera House', 'SLTDA/SQA/HSU/00734', 'HSU/2022/0017', 'No 62/1,', 'Vidanagewarra,', 'Matara', '80.5485636778284', '5.9636664744188925', 412254936, 718421366, 'Our teams of experts are always ready to make your dream holiday a reality. With a wide range of itineraries, we believe your holiday in Sri Lanka will be a memorable one. if not, make your own itinerary together.', '-', 'jpkarunaratna@gmail.com', '$2y$10$yXlwFpKXKqw6A/mDhPtoVeSlRS9Jhf75FLytgUeemmh1QA26Lct1G', 'Deluxe', 'Mr. Malik Seethawaka', 'malikseethawaka@gmail.com', 704567893, 775678943, 4000.00, 90000.00, 'new', 9764),
('hot_6241756df07a4', 'Casa Mija', 'SLTDA/SQA/BUN/00554', 'BUN/2022/0045', 'N0 37,', 'Kamburugamuwa,', 'Matara', '80.58149317900696', '5.933424794584849', 777119447, 777119447, '\"As I pulled into the driveway of the house I could not help but be awed by what lay behind the grand glass facade. Case Mija is a beautifully appointed villa with very comfortable, very clean suites. Its location is on a breathtaking stretch of beach will leave you spellbound.\"\r\n\r\nCasa Mija is a boutique beachfront residence, 5 minutes from Mirissa & 40km from Galle with a private pool and concierge. Casa MiJa can be rented as a complete villa or by room. We sleep 16 people in beds comfortably', 'https://www.airbnb.com/rooms/2156929?source_impression_id=p3_1648456900_t2zyjNa0g4PLlfjN', 'casamijavillasltda@gmail.com', '$2y$10$s2aj7LW3C7EjswExajkuYeFacq/BYUwvgWccM8naLdr7G6YnDnYaG', 'Deluxe', 'Mr. Ivan Thilakarathne', 'ivanthilakarathne12@gmail.com', 704567893, 775678943, 4000.00, 70000.00, 'new', 2282),
('hot_6241792ca49b4', 'Royal Seawind', 'SLTDA/SQA/GH/00328', 'GH/2022/0057', 'No 26,', 'Beach Road Polhena', 'Matara', '80.39243641053267', '5.986104957115643', 412224907, 772360927, 'Dear Guest,\r\n\r\nWe like to welcome you to our Hotel and wish you a pleasant and comfortable stay.\r\n\r\nOur friendly staff will make your holiday, wedding, corporate function, family gathering, reunion, seminar or banquet most enjoyable.', 'www.royalseawind.com', 'chandaniranaweera9@gmail.com', '$2y$10$sgwEPh/FRviIIAQaOtBif.8KAz9bURLPttdCfZtsQtiaOTASDrkvq', 'Deluxe', 'Mr. Vimal Upasinghe', 'vimalupasinghe12@gmail.com', 704567893, 412224908, 4000.00, 59000.00, 'new', 4653),
('hot_62417a738ac4f', 'Cardamon Hotel Nilaveli', 'SLTDA/SQA/TH/00347', 'TH/2022/0038', 'Ward 2,', 'Nilaveli,', 'Trincomalee', '81.19923285509279', '8.684190125596782', 262061600, 712340923, 'Located in Nilaveli, 12 km from Trincomalee, Cardamon Hotel Nilaveli features a restaurant, bar and free WiFi throughout the property.', 'https://www.booking.com/searchresults.en-gb.html?aid=311984;label=cardamom-nilaveli-uFzfzVixeTHfApWzaU7kJwS541176421807%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atiaud-1110454565467%3Akwd-168602903792%3Alp1009919%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YbSsBl3MCvHsD8UKUHIRFxY;sid=7bbf99048abb7ef6829b2c88e823dc78;city=-2230854;expand_sb=1;highlighted_hotels=1610173;hlrd=no_dates;keep_landing=1;redirected=1;source=hotel&gclid=CjwKCAjwuYWSBhByEiwAKd_n_iRx8_vuLNgLvk6Kcodsl3UEGEUlYmDs6P3BQaLuoF0vBCO9WvJcahoCwUUQAvD_BwE&room1=A,A,;', 'gibsons@126.com', '$2y$10$SrratZTT4Ugn5VvcFqclcutDZ..bj3Yxl.m98tc.Wz7bt45Tao0Sa', 'Deluxe', 'Mr. Gilbot Silva', 'gilbotsilva67@gmail.com', 704567893, 262061611, 0.00, 0.00, 'new', 2907),
('hot_62417c176453b', 'Jungle Beach Resort', 'SLTDA/SQA/TH/232', 'TH/2022/0032', '27th Km Post,', 'Kuchchaveli,', 'Trincomalee', '81.16548915661197', '8.689333285657094', 265678701, 262061600, 'Simply known as Uga Jungle Beach, this Sri Lanka beach resort stylishly incorporates its existing environs into its design and experience. Blending in with its surrounding flora, the resort looks and feels like a luxurious tree house. Situated in close proximity to Trincomalee city, our picturesque Sri Lanka resort with private pool options, offers a unique blend of exhilarating adventure activities and sightseeing opportunities – which display its inimitable cultural landscape.', 'www.junglebeach.lk', 'gm-jb@ugaescapes2.com', '$2y$10$gGfj0VghVSJhLLDqKZQXJu7CVxhqZTBuD752wVJMIp7./ovdQPZ5.', 'Deluxe', 'Mr. Malith Kumarapeli', 'malithkumarapeli@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 1964),
('hot_62417f100cc30', 'Nilaveli Beach Hotel', 'SLTDA/SQA/HC/049', 'HC/2021/0017', '11th Mile Post,', 'Nilaveli,', 'Trincomalee', '81.18879548129429', '8.705128071709133', 262232295, 773322295, 'Our teams of experts are always ready to make your dream holiday a reality. With a wide range of itineraries, we believe your holiday in Sri Lanka will be a memorable one. if not, make your own itinerary together.', 'www. tangerinehotels.com', 'accts.nilaveli@gmail.com', '$2y$10$AsUcB/tjho8cK7Rk6FIIVuGVKcci4DZ3PKmWGrHBP5mi4Nm/rRJwa', 'Deluxe', 'Mr. Sam Johnson', 'samnilawelihotel@gmail.com', 704567893, 264920016, 0.00, 0.00, 'new', 6856),
('hot_6241809f10332', 'Nilaveli Beach Resort', 'SLTDA/SQA/GH/01325', 'GH/2022/0064', 'Ward No:04,', 'Irakkakandy,', 'Trincomalee', '81.18035775264164', '8.719982038657133', 262050088, 712340923, 'Our teams of experts are always ready to make your dream holiday a reality. With a wide range of itineraries, we believe your holiday in Sri Lanka will be a memorable one. if not, make your own itinerary together.', 'www.nilavelibeachresort.lk', 'nilavelibeachresort@yahoo.com', '$2y$10$iReyJC2S.GxH5JU0lBfWMuePxhobJQR5COKGDzFuOAizAlSVLVkTi', 'Superior', 'Mr. Bimal Ediriweera', 'bimalediriweera@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 6965),
('hot_62418292463f1', 'Centauria City Hotel', 'SLTDA/SQA/GH/0394', 'GH/2022/0053', 'Pallegama,', 'Embilipitiya,', 'Ratnapura', '80.45744470407055', '6.706757079656958', 472230044, 772360927, 'Centauria City Hotel offers modern rooms with garden views. Featuring its own restaurant, the property provides free Wi-Fi in its common areas. A 24-hour front desk, garden and bar are also available.\r\n\r\nLocated in Embilipitiya, Centauria City Hotel is 100 m from Food City and Embilipitiya, 2 km from Chandrika Wewa Lake. It takes 25 minutes to drive to Udawalawe National Park. Hambantota Town is a 40-minute drive away. It is 100 m from the Embilipitiya bus station.', '-', 'centauriahotel@gmail.com', '$2y$10$AYf8nfXtGRHJKGpYAr7DteNSbJ.hoVw1eg6vzAj9nx9Om7coIf/FO', 'Luxury', 'Mr. Halmanso', 'gihanhalmanso@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 7713),
('hot_624183c77eecc', 'Centauria Lake', 'SLTDA/SQA/HC/075', 'HC/2022/0035', 'New Town,', 'Embilipitiya,', 'Ratnapura', '80.40668249130249', '6.665472847588449', 704567893, 472230514, 'Located in Embilipitiya Town, Centauria Lake Resort is next to Chandrika Lake. This non-smoking resort features an outdoor swimming pool, a range of Ayurveda body treatments and free parking.', 'http://centauriahotel.com/lake/', 'centauria@sltnet.lk', '$2y$10$kvc6i1Hp9hlCCxVzplaE7OBxiQwSVpXMUqVldf2qAKPZfHDWywrWC', 'Deluxe', 'Mr. Udam Thennakoon', 'udamthennakoon@gmail.com', 704567833, 472230515, 0.00, 0.00, 'Existing', 8241),
('hot_624184c32203a', 'Gileemale Retreat', 'SLTDA/SQA/BUN/00944', 'BUN/2022/0038', 'Gileemale Walawwa And Estate,', 'Gileemale,', 'Ratnapura', '80.39477277024073', '6.7153719426520775', 773794381, 472232000, 'This villa with river views has parquet floors, 6 bedrooms and 3 bathrooms with a hot tub, bath and bathrobes. There is a seating area, a dining area and a kitchen complete with a fridge and an oven.\r\n\r\nGuests at the villa can enjoy a Full English/Irish or an Asian breakfast.\r\n\r\nGileemale Walawwa offers a terrace. After a day of hiking or cycling, guests can relax in the garden or in the shared lounge area.', 'www.grandudawalawe.com', 'chandana@grandudawalawe.com', '$2y$10$I40RGfZ/M2Q1OJrZGOkmnOtpa26budwjVNRPftvdmxF61VC6FDy4u', 'Standard', 'Mr. Wenuka Abeysinghe', 'wenukaabeysinghe@gmail.com', 472233215, 775678943, 0.00, 0.00, 'new', 3391),
('hot_6241861b55005', 'Nil Diya Mankada Safari Lodge', 'SLTDA/SQA/GH/01247', 'GH/2022/0100', 'C. D. E. Place,', 'Walawegama,', 'Ratnapura', '80.84974794142228', '6.412350697369527', 704567893, 473629000, 'This Nil Diya Mankada Safari Lodge is situated in an exclusive district of Sri Lanka, in the heart of attractive Udawalawe. Safari Lodge in Udawalawe with such charm and supreme comfort are rare. However, the Nildiyamankada Safari Lodge Sri Lanka Udawalawe effortlessly combines a unique location with a sense of style and character. Situated on walawegama, in one of the best areas in Udawalawe, this contemporary Safari Lodge is perfectly positioned for visiting many of the Udawalawe National Park', 'http://www.nildiyamankada.lk/', 'sswmanagement@gmail.com', '$2y$10$6pX7MVG59hsgvVHd1pMXuu5SF7Ronj7SN91sxhlz2WBl2NZnG0GuO', 'Deluxe', 'Mr. Vinuja Jayakody', 'vinujajayakodi@gmail.com', 704567893, 775678943, 0.00, 0.00, 'new', 4382),
('hot_624187b94f391', 'Amaara Forest Hotel', 'SLTDA/SQA/TH/00321', 'TH/2022/0043', 'No:115,', 'Indigaswewa,', 'Matale', '80.61770396117566', '7.472031383978007', 704567893, 662277277, 'Ayubowan !\r\nWelcome to The Amaara Forest Hotel Sigiriya', 'www.amaaraforest.com', 'anton@worldlink.lk', '$2y$10$L3KyZ0.uITu6zL2sk.uul.nv8q1UVY3d43FY1/cLEEDoNN9suxXrO', 'Deluxe', 'Mr. Uvindu Liyanage', 'uvinduliyanage@gmail.com', 704567893, 662277276, 0.00, 0.00, 'new', 1417),
('hot_6241896494918', 'Anon Rest', 'SLTDA/SQA/GH/0721', 'GH/2022/0023', 'Yapagama,', 'Dambulla', 'Matale', '79.86114263534546', '6.902206909028085', 704567893, 111234567, 'Anon rest situated in the midst of Dambulla, one of the most attractive historic cities in Sri Lanka, has being serving their loyal tourists, customers and guests at our best.', 'http://www.anonrest.com/', 'antons@worldlink.lk', '$2y$10$Vs6XsYtUFDhRXvqCvpx/4.JUVaPfHRyALKHLyg96nXZiywSF.6DmK', 'Deluxe', 'Mr. Ranidu Eppawala', 'ranidueppawala@gmail.com', 704567893, 758900122, 0.00, 0.00, 'new', 8492),
('hot_62418b3fcdab7', 'Ehalagala Lake Resort (private) Limited', 'SLTDA/SQA/TH/00400', 'TH/2022/0047', '59 B,', 'Thalkote Road ,', 'Matale', '80.82690954208374', '7.449126421818201', 704567893, 772360927, 'Feel the spirit of a small universe in INDIAN OCEAN . The EHALAGALA LAKE RESTORT – Centre point of cultural, environmental and scenic synergy in SRI LANKA . We are located in the vicinity of world renowned “LION ROCK” known as SIGIRIYA …the Centre of romance. Time for you to experience unique, memorable and adventurous moments in life. Step into EHALAGALA LAKE RESTORT Centre point of your destination and taste the unmatched variety of cuisine.', 'www.ehalagala.com', 'manager@ehalagala.com', '$2y$10$i1MrkQsF9KSGkne/cfqjs.X2MujjjxnWgBjYjcwITA74.KF2xgEgu', 'Standard', 'Mr. Sunil Anuradha@gmail.com', 'sudilanurada@gmail.com', 704567893, 775678947, 0.00, 0.00, 'new', 9906),
('hot_62418d4db11c2', 'Farcry', 'SLTDA/SQA/GH/01182', 'GH/2022/0113', 'Perakanatte,', 'Wasgamuwa,', 'Matale', '80.65662145614624', '7.487252386745848', 704567893, 663510001, 'Surrounded by tranquil greenery, FarCry Boutique Resort features an outdoor pool, a business centre and 24-hour front desk staff. Offering luxurious suites, it provides complimentary parking and free Wi-Fi access in the entire property. The resort is conveniently a 30-minute drive to the well-known Wasgamuwa National Park. Matale District can be reached with an hour’s drive away, while Colombo city and Bandaranaike International Airport are approximately 4 hours’ drive away.', '-', 'chandrah@crossbrand.lk', '$2y$10$z6qPju6NHFXQWjh4vETCkuP88dFn9gPNKV7I2a/UiDS82mB2TP7Wq', 'Luxury', 'Mr. Thennakoon', 'kumarathennakoon@gmail.com', 704567893, 775678943, 0.00, 0.00, 'Existing', 2724),
('hot_624193f17ed34', 'Hotel Nelly', 'SLTDA/SQA/HC/00163', 'HC/2022/0044', 'No. 84,', '02nd Cross Street,', 'Vavuniya', '80.49816471179422', '8.755239666404263', 704567893, 242224477, 'Hotel Nelly is situated in São Gabriel. There is an outdoor pool and guests can make use of free WiFi and free private parking. Some rooms include a kitchenette with a minibar.', 'WWW.NELLYHOTEL.COM', 'rubankrish@ymail.com', '$2y$10$Dc9pNcwdJqxLedwGtvQWX.Ugw5mZAswg.p4ung4Te9NGj98lCvlDK', 'Deluxe', 'Mr. Gamunu Witharane', 'gamunuwitharana@gmail.com', 765632100, 775678943, 0.00, 5500.00, '0', 3439);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_availability`
--

CREATE TABLE `hotel_availability` (
  `hotelID` char(20) NOT NULL,
  `date` date NOT NULL,
  `single_rooms` int(5) NOT NULL,
  `double_rooms` int(5) NOT NULL,
  `family_rooms` int(5) NOT NULL,
  `massive_rooms` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_availability`
--

INSERT INTO `hotel_availability` (`hotelID`, `date`, `single_rooms`, `double_rooms`, `family_rooms`, `massive_rooms`) VALUES
('hot_62301f70efb16', '2022-04-01', 11, 45, 87, 89),
('hot_62301f70efb16', '2022-04-02', 11, 46, 87, 89),
('hot_623e9f9376d4b', '2022-05-05', 25, 44, 8, 6),
('hot_62400142b1489', '2022-04-04', 3, 3, 0, 2),
('hot_624054b25cddf', '2022-04-05', 50, 98, 100, 75),
('hot_623ffee359a6d', '2022-04-06', 47, 57, 66, 30),
('hot_623ff824b0ae5', '2022-04-08', 200, 150, 149, 50),
('hot_623ffee359a6d', '2022-04-08', 47, 60, 65, 30),
('hot_624050bf2d652', '2022-04-08', 1, 1, 1, 2),
('hot_623ffee359a6d', '2022-04-09', 50, 58, 64, 30),
('hot_624054b25cddf', '2022-04-08', 50, 99, 99, 75);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `hotelID` char(20) NOT NULL,
  `imageID` char(20) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_images`
--

INSERT INTO `hotel_images` (`hotelID`, `imageID`, `image`) VALUES
('hot_623ff5fbc03ad', 'hotelimg_623ff5fbd40', '623ff5fbcfaa15.88865898.jpg'),
('hot_623ff5fbc03ad', 'hotelimg_623ff5fbd4c', '623ff824c50ca0.26119242.jpg'),
('hot_623ff5fbc03ad', 'hotelimg_623ff5fbd58', '6240037ce5d097.59012987.jpg'),
('hot_623ff5fbc03ad', 'hotelimg_623ff5fbd65', '62400142c0b5b2.32231460.jpg'),
('hot_623ff824b0ae5', 'hotelimg_623ff824c9f', '6240037ce58cf8.13798496.jpg'),
('hot_623ff824b0ae5', 'hotelimg_623ff824cad', '623ff824c477f5.33868268.jpg'),
('hot_623ff824b0ae5', 'hotelimg_623ff824cb6', '623ff824c4b769.45025501.jpg'),
('hot_623ff824b0ae5', 'hotelimg_623ff824cbd', '623ff824c50ca0.26119242.jpg'),
('hot_623ffb3cb4ed0', 'hotelimg_623ffb3ccae', '62401fcbc07897.57516390.jpg'),
('hot_623ffb3cb4ed0', 'hotelimg_623ffb3ccbf', '623ffb3cc638a8.64945877.jpg'),
('hot_623ffb3cb4ed0', 'hotelimg_623ffb3ccca', '623ffb3cc672c0.59234779.jpg'),
('hot_623ffb3cb4ed0', 'hotelimg_623ffb3ccd4', '623ffb3cc6a142.44652350.jpg'),
('hot_623ffd7f35a7e', 'hotelimg_623ffd7f4ae', '6240372cdc3df5.53083449.jpg'),
('hot_623ffee359a6d', 'hotelimg_623ffee36fd', '623ffee36b5916.69117842.jpg'),
('hot_623ffee359a6d', 'hotelimg_623ffee3706', '623ffee36b9611.41476296.jpg'),
('hot_623ffee359a6d', 'hotelimg_623ffee3710', '623ffee36bc199.86210113.jpg'),
('hot_623ffee359a6d', 'hotelimg_623ffee371f', '623ffee36c2313.89289805.jpg'),
('hot_62400142b1489', 'hotelimg_62400142c5d', '62400142c0b5b2.32231460.jpg'),
('hot_62400142b1489', 'hotelimg_62400142c6a', '624033ba8366e4.10477429.jpg'),
('hot_62400142b1489', 'hotelimg_62400142c78', '62400142c0ee55.34236018.jpg'),
('hot_62400142b1489', 'hotelimg_62400142c7e', '62400142c10db5.70105121.jpg'),
('hot_6240037cd6272', 'hotelimg_6240037ce9f', '6240037ce58cf8.13798496.jpg'),
('hot_6240037cd6272', 'hotelimg_6240037ceae', '6240037ce58cf8.13798496.jpg'),
('hot_6240037cd6272', 'hotelimg_6240037ceb9', '6240037ce5d097.59012987.jpg'),
('hot_6240037cd6272', 'hotelimg_6240037cebf', '6240037ce5fc81.17284337.jpg'),
('hot_624004e4112e3', 'hotelimg_624004e4248', '624004e42075d3.10843355.jpg'),
('hot_624004e4112e3', 'hotelimg_624004e4252', '624004e420f4c1.40522441.jpg'),
('hot_624004e4112e3', 'hotelimg_624004e4259', '624004e4211bc3.68467342.jpg'),
('hot_624004e4112e3', 'hotelimg_624004e4260', '624004e4213bf1.46079576.jpg'),
('hot_62400659a2281', 'hotelimg_62400659b67', '62400659b1da01.08315254.jpg'),
('hot_62400659a2281', 'hotelimg_62400659b71', '62400659b20784.07788796.jpg'),
('hot_62400659a2281', 'hotelimg_62400659b7e', '62400659b22bc9.76690803.jpg'),
('hot_62400659a2281', 'hotelimg_62400659b88', '62400142c0b5b2.32231460.jpg'),
('hot_624007c956646', 'hotelimg_624007c9684', '624007c964f7a0.08727242.jpg'),
('hot_624007c956646', 'hotelimg_624007c968c', '624007c9652714.00988820.jpg'),
('hot_624007c956646', 'hotelimg_624007c9696', '6240037ce5d097.59012987.jpg'),
('hot_624007c956646', 'hotelimg_624007c96a1', '624007c9654416.27546276.jpg'),
('hot_624009ca2af40', 'hotelimg_624009ca3d8', '624009ca398156.85714104.jpg'),
('hot_624009ca2af40', 'hotelimg_624009ca3de', '62418b3fdc3797.84493994'),
('hot_624009ca2af40', 'hotelimg_624009ca3e6', '624009ca39b785.17041664.jpg'),
('hot_624009ca2af40', 'hotelimg_624009ca3ef', '624009ca39d545.33459872.jpg'),
('hot_62400b53a2b0e', 'hotelimg_62400b53b5b', '62400b53b213f5.52427626.jpg'),
('hot_62400b53a2b0e', 'hotelimg_62400b53b66', '62400b53b24097.95598833.jpg'),
('hot_62400b53a2b0e', 'hotelimg_62400b53b71', '62400b53b25c53.78350773.jpg'),
('hot_62400b53a2b0e', 'hotelimg_62400b53b78', '62400b53b27731.77285336.jpg'),
('hot_62400cd4075a3', 'hotelimg_62400cd4193', '62400cd415d4b7.59178790.jpg'),
('hot_62400cd4075a3', 'hotelimg_62400cd419a', '62400cd4167306.29250086.jpg'),
('hot_62400cd4075a3', 'hotelimg_62400cd41a0', '62400cd41698c0.51717926.jpg'),
('hot_62400cd4075a3', 'hotelimg_62400cd41a7', '62400cd416b2f7.38157184.jpg'),
('hot_62400eea21659', 'hotelimg_62400eea32f', '62400eea2fb319.02124003.jpg'),
('hot_62400eea21659', 'hotelimg_62400eea339', '62400eea300601.37601631.jpg'),
('hot_62400eea21659', 'hotelimg_62400eea341', '62400eea302076.68002249.jpg'),
('hot_62400eea21659', 'hotelimg_62400eea34c', '62400eea3036f9.29536967.jpg'),
('hot_624010f7e57c4', 'hotelimg_624010f8037', '624010f7f41cb0.02193948.jpg'),
('hot_624010f7e57c4', 'hotelimg_624010f803c', '624010f800be90.63011209.jpg'),
('hot_624010f7e57c4', 'hotelimg_624010f8041', '624010f800e662.66813255.jpg'),
('hot_624010f7e57c4', 'hotelimg_624010f8047', '624010f800fe03.93594393.jpg'),
('hot_6240131b98b44', 'hotelimg_6240131bab2', '6240131ba74339.17557539.jpg'),
('hot_6240131b98b44', 'hotelimg_6240131babe', '6240131ba77109.94638479.jpg'),
('hot_6240131b98b44', 'hotelimg_6240131bac3', '6240131ba78fa6.12322756.jpg'),
('hot_6240131b98b44', 'hotelimg_6240131bac8', '6240131ba7a679.16741039.jpg'),
('hot_624014a42548b', 'hotelimg_624014a437d', '62400b53b27731.77285336.jpg'),
('hot_624014a42548b', 'hotelimg_624014a4386', '624014a4340505.58858156.jpg'),
('hot_624014a42548b', 'hotelimg_624014a438c', '624007c9654416.27546276.jpg'),
('hot_624014a42548b', 'hotelimg_624014a4393', '624014a434ce55.80372222.jpg'),
('hot_6240182ad503e', 'hotelimg_6240182ae6f', '6240182ae37d46.44899754.jpg'),
('hot_6240182ad503e', 'hotelimg_6240182ae7a', '6240182ae3a8d6.67178396.jpg'),
('hot_6240182ad503e', 'hotelimg_6240182ae85', '6240182ae3c2f2.12706594.jpg'),
('hot_6240182ad503e', 'hotelimg_6240182ae8d', '6240182ae3d9e0.94352243.jpg'),
('hot_624019ea7e2b5', 'hotelimg_624019ea909', '624019ea8c8e41.89410347.jpg'),
('hot_624019ea7e2b5', 'hotelimg_624019ea90f', '62400eea3036f9.29536967'),
('hot_624019ea7e2b5', 'hotelimg_624019ea916', '624019ea8cfe54.37835453.jpg'),
('hot_624019ea7e2b5', 'hotelimg_624019ea91b', '624019ea8d1961.06818072.jpg'),
('hot_62401c7dd2d72', 'hotelimg_62401c7de56', '62401c7de1a1b7.24284437.jpg'),
('hot_62401c7dd2d72', 'hotelimg_62401c7de5c', '62401c7de21202.96114292.jpg'),
('hot_62401c7dd2d72', 'hotelimg_62401c7de64', '62401c7de25134.28124308.jpg'),
('hot_62401c7dd2d72', 'hotelimg_62401c7de6a', '62401c7de26b83.35980254.jpg'),
('hot_62401fcbb1c23', 'hotelimg_62401fcbc48', '62401fcbc02dd5.02936405.jpg'),
('hot_62401fcbb1c23', 'hotelimg_62401fcbc4e', '62401fcbc05b24.09540060.jpg'),
('hot_62401fcbb1c23', 'hotelimg_62401fcbc58', '62401fcbc07897.57516390.jpg'),
('hot_62401fcbb1c23', 'hotelimg_62401fcbc63', '62401fcbc08ff0.21621765.jpg'),
('hot_624033ba73b7d', 'hotelimg_624033ba86f', '624033ba82a813.84580636.jpg'),
('hot_624033ba73b7d', 'hotelimg_624033ba877', '624033ba831ae2.53387877.jpg'),
('hot_624033ba73b7d', 'hotelimg_624033ba87d', '624033ba834480.21038542.jpg'),
('hot_624033ba73b7d', 'hotelimg_624033ba886', '624033ba8366e4.10477429.jpg'),
('hot_624035536249d', 'hotelimg_62403553766', '6240355370cf24.80811311.jpg'),
('hot_624035536249d', 'hotelimg_62403553770', '62403553710021.09202228.jpg'),
('hot_624035536249d', 'hotelimg_6240355377a', '624035537127f1.23815430.jpg'),
('hot_624035536249d', 'hotelimg_62403553787', '62403553715816.72854805.jpg'),
('hot_6240372ccd6aa', 'hotelimg_6240372cdfd', '6240182ae3d9e0.94352243.jpg'),
('hot_6240372ccd6aa', 'hotelimg_6240372ce06', '6240372cdbeb32.42185287.jpg'),
('hot_6240372ccd6aa', 'hotelimg_6240372ce0e', '6240372cdc1df6.36057833.jpg'),
('hot_6240372ccd6aa', 'hotelimg_6240372ce16', '6240372cdc3df5.53083449.jpg'),
('hot_6240388257873', 'hotelimg_62403882697', '62403deb592690.41358217'),
('hot_6240388257873', 'hotelimg_624038826a0', '62403882660105.61454171.jpg'),
('hot_6240388257873', 'hotelimg_624038826a8', '62403882663347.16787530.jpg'),
('hot_6240388257873', 'hotelimg_624038826b0', '624033ba82a813.84580636'),
('hot_624039ee64de1', 'hotelimg_624039ee769', '624039ee7345c4.95673686.jpg'),
('hot_624039ee64de1', 'hotelimg_624039ee775', '624039ee737c73.57938855.jpg'),
('hot_624039ee64de1', 'hotelimg_624039ee77e', '624039ee739d23.17512133.jpg'),
('hot_624039ee64de1', 'hotelimg_624039ee78e', '624039ee73b728.64851046.jpg'),
('hot_62403b91c9468', 'hotelimg_62403b91db9', '62403b91d7dc25.79039465.jpg'),
('hot_62403b91c9468', 'hotelimg_62403b91dc7', '62403b91d883b2.85222947.jpg'),
('hot_62403b91c9468', 'hotelimg_62403b91dd4', '62403b91d8b385.74101568.jpg'),
('hot_62403b91c9468', 'hotelimg_62403b91dde', '62403b91d8d930.74400709.jpg'),
('hot_62403deb49882', 'hotelimg_62403deb5de', '6240fe4dbd62c0.43424770'),
('hot_62403deb49882', 'hotelimg_62403deb5ea', '62403deb58e568.85361265.jpg'),
('hot_62403deb49882', 'hotelimg_62403deb5f7', '62403deb592690.41358217.jpg'),
('hot_62403deb49882', 'hotelimg_62403deb604', '62403deb594e36.55924096.jpg'),
('hot_62403f47afb7a', 'hotelimg_62403f47c2f', '62404def9e8a62.48778221'),
('hot_62403f47afb7a', 'hotelimg_62403f47c3b', '62403f47be5ea7.81614038.jpg'),
('hot_62403f47afb7a', 'hotelimg_62403f47c44', '62403f47beaf90.03582093.jpg'),
('hot_62403f47afb7a', 'hotelimg_62403f47c4c', '62403f47bee0a7.68510008.jpg'),
('hot_624040b361ade', 'hotelimg_624040b374a', '624040b3703f00.57484334.jpg'),
('hot_624040b361ade', 'hotelimg_624040b3753', '624040b3708045.84521228.jpg'),
('hot_624040b361ade', 'hotelimg_624040b375d', '624040b370acd7.03075222.jpg'),
('hot_624040b361ade', 'hotelimg_624040b3766', '624050bf3cdd47.98301198'),
('hot_624041f2413b3', 'hotelimg_624041f2545', '624041f25017a8.38230704.jpg'),
('hot_624041f2413b3', 'hotelimg_624041f254e', '624041f2505622.64810603.jpg'),
('hot_624041f2413b3', 'hotelimg_624041f2556', '624041f2507553.54344892.jpg'),
('hot_624041f2413b3', 'hotelimg_624041f2560', '624041f25091e9.94433232.jpg'),
('hot_624043c104ad5', 'hotelimg_624043c1186', '624043c11344c1.50490595.jpg'),
('hot_624043c104ad5', 'hotelimg_624043c1193', '624043c113aaa5.38385090.jpg'),
('hot_624043c104ad5', 'hotelimg_624043c119f', '624043c113db39.78437397.jpg'),
('hot_624043c104ad5', 'hotelimg_624043c11aa', '624043c1140439.49585754.jpg'),
('hot_624048dbc3152', 'hotelimg_624048dbd7d', '624048dbd21067.64128715.jpg'),
('hot_624048dbc3152', 'hotelimg_624048dbd8a', '624048dbd24ef0.55252603.jpg'),
('hot_624048dbc3152', 'hotelimg_624048dbd99', '624048dbd27145.02932024.jpg'),
('hot_624048dbc3152', 'hotelimg_624048dbdaa', '624048dbd29450.86532626.jpg'),
('hot_62404b0e8e28a', 'hotelimg_62404b0ea1d', '62404b0e9cb458.16967727.jpg'),
('hot_62404b0e8e28a', 'hotelimg_62404b0ea28', '62404b0e9d1749.77537986.jpg'),
('hot_62404b0e8e28a', 'hotelimg_62404b0ea33', '62404b0e9d4c36.87429975.jpg'),
('hot_62404b0e8e28a', 'hotelimg_62404b0ea3e', '62404b0e9d7947.27164144.jpg'),
('hot_62404c0bbe07d', 'hotelimg_62404c0bd01', '6240fe4dbd62c0.43424770'),
('hot_62404def8f937', 'hotelimg_62404defa1f', '62404def9e8a62.48778221.jpg'),
('hot_62404def8f937', 'hotelimg_62404defa27', '62404def9ec0a2.12614971.jpg'),
('hot_62404def8f937', 'hotelimg_62404defa30', '62404def9ee1c9.78497581.jpg'),
('hot_62404def8f937', 'hotelimg_62404defa38', '62404def9f02c0.73079109.jpg'),
('hot_62404f589e33e', 'hotelimg_62404f58b18', '62404f58ad07c4.94446050.jpg'),
('hot_62404f589e33e', 'hotelimg_62404f58b23', '62404f58ad42b6.59829033.jpg'),
('hot_62404f589e33e', 'hotelimg_62404f58b30', '62404f58ad66e0.14328128.jpg'),
('hot_62404f589e33e', 'hotelimg_62404f58b3a', '62404f58ad8856.73693629.jpg'),
('hot_624050bf2d652', 'hotelimg_624050bf410', '624050bf3c52e9.06425261.jpg'),
('hot_624050bf2d652', 'hotelimg_624050bf41b', '624050bf3c89a0.41640521.jpg'),
('hot_624050bf2d652', 'hotelimg_624050bf425', '624050bf3cb828.91479575.jpg'),
('hot_624050bf2d652', 'hotelimg_624050bf42e', '624050bf3cdd47.98301198.jpg'),
('hot_6240535e0a22f', 'hotelimg_6240535e1c9', '6240535e18c605.57874713.jpg'),
('hot_6240535e0a22f', 'hotelimg_6240535e1d4', '6240535e18fc46.67881143.jpg'),
('hot_6240535e0a22f', 'hotelimg_6240535e1db', '6240535e191c53.63663170.jpg'),
('hot_6240535e0a22f', 'hotelimg_6240535e1e2', '6240535e193911.05880677.jpg'),
('hot_624054b25cddf', 'hotelimg_624054b2703', '624054b26be5a2.72916842.jpg'),
('hot_624054b25cddf', 'hotelimg_624054b2710', '624054b26c1514.58588347.jpg'),
('hot_624054b25cddf', 'hotelimg_624054b2719', '624054b26c3493.02735217.jpg'),
('hot_624054b25cddf', 'hotelimg_624054b2721', '624054b26c52b2.22529401.jpg'),
('hot_624055f046248', 'hotelimg_624055f058e', '624055f0548392.97251928.jpg'),
('hot_624055f046248', 'hotelimg_624055f0596', '624055f054d682.22672447.jpg'),
('hot_624055f046248', 'hotelimg_624055f059f', '624055f054fe71.84805050.jpg'),
('hot_624055f046248', 'hotelimg_624055f05a7', '624055f0552036.97155941.jpg'),
('hot_624057f45b0a9', 'hotelimg_624057f46cf', '62406b1fe672a4.21891264'),
('hot_624059c090aca', 'hotelimg_624059c0a31', '6240535e18c605.57874713'),
('hot_62405b110d8c4', 'hotelimg_62405b1120e', '62406be2a9af21.01268245.jpg'),
('hot_62405b110d8c4', 'hotelimg_62405b1121e', '62405b111cb223.04680161.jpg'),
('hot_62405b110d8c4', 'hotelimg_62405b1122d', '62405b111ce6f7.80896912.jpg'),
('hot_62405b110d8c4', 'hotelimg_62405b11236', '62405b111d0cf5.51002415.jpg'),
('hot_62405f0405373', 'hotelimg_62405f04187', '62405f04147521.86817237.jpg'),
('hot_62405f0405373', 'hotelimg_62405f04193', '62405f0414a688.09686148.jpg'),
('hot_62405f0405373', 'hotelimg_62405f0419e', '62405f0414c276.07771302.jpg'),
('hot_62405f0405373', 'hotelimg_62405f041ab', '62405f0414dbb0.21647591.jpg'),
('hot_62406b1fd728f', 'hotelimg_62406b1feeb', '62406b1fe672a4.21891264.jpg'),
('hot_62406b1fd728f', 'hotelimg_62406b1fef6', '62406b1fe741e7.54524385.jpg'),
('hot_62406b1fd728f', 'hotelimg_62406b1ff02', '624050bf3cdd47.98301198'),
('hot_62406b1fd728f', 'hotelimg_62406b1ff12', '62406b1fe79106.88155614.jpg'),
('hot_62406be29a995', 'hotelimg_62406be2aee', '62406be2a9af21.01268245.jpg'),
('hot_6240d6042cfff', 'hotelimg_6240d6045f4', '6240d604520d29.06872063.jpg'),
('hot_6240d6042cfff', 'hotelimg_6240d60460c', '6240d604527474.10388859.jpg'),
('hot_6240d6042cfff', 'hotelimg_6240d604618', '6240d60452c354.00468305.jpg'),
('hot_6240d6042cfff', 'hotelimg_6240d604620', '624050bf3cdd47.98301198.jpg'),
('hot_6240d78eb685d', 'hotelimg_6240d78ee3e', '6240d78edc09d5.35398655.jpeg'),
('hot_6240d78eb685d', 'hotelimg_6240d78ee4d', '6240d78edc6f31.41575458.jpg'),
('hot_6240d78eb685d', 'hotelimg_6240d78ee5b', '6240d78edccc32.90229916.jpg'),
('hot_6240d78eb685d', 'hotelimg_6240d78ee7f', '6240d78edd22b5.53072726.jpg'),
('hot_6240d98d2614e', 'hotelimg_6240d98d53e', '6240d98d4d20b9.84519610.jpg'),
('hot_6240d98d2614e', 'hotelimg_6240d98d54c', '6240d98d4d93b8.79844769.jpg'),
('hot_6240d98d2614e', 'hotelimg_6240d98d55a', '6240d98d4dde63.76482318.jpg'),
('hot_6240d98d2614e', 'hotelimg_6240d98d566', '6240d98d4e2cf9.86939677.jpg'),
('hot_6240dad1b0245', 'hotelimg_6240dad1dbe', '6240dad1d6e909.06897017.jpg'),
('hot_6240dad1b0245', 'hotelimg_6240dad1dc7', '6240dad1d75201.46816618.jpg'),
('hot_6240dad1b0245', 'hotelimg_6240dad1dd3', '6240dad1d7a268.71494280.jpg'),
('hot_6240dad1b0245', 'hotelimg_6240dad1ddf', '6240dad1d7e8a3.34923540.jpg'),
('hot_6240db3e061c0', 'hotelimg_6240db3e317', '6240db3e2bef36.10493092.jpg'),
('hot_6240db3e061c0', 'hotelimg_6240db3e320', '6240db3e2c91d9.62166092.jpg'),
('hot_6240dc4415c52', 'hotelimg_6240dc44417', '6240dc443c8333.83528806.jpg'),
('hot_6240dc4415c52', 'hotelimg_6240dc44422', '6240dc443d26f4.63349324.jpg'),
('hot_6240dc4415c52', 'hotelimg_6240dc4442d', '6240dc443d6cd5.18656020.jpg'),
('hot_6240dc4415c52', 'hotelimg_6240dc44438', '6240dc443dcf73.74396325.jpg'),
('hot_6240dd8707db8', 'hotelimg_6240dd87338', '6240dd872d8e40.85474451.jpg'),
('hot_6240dd8707db8', 'hotelimg_6240dd87344', '6240dd872e3608.63239992.jpg'),
('hot_6240dd8707db8', 'hotelimg_6240dd87350', '6240dd872ea937.93793210.jpg'),
('hot_6240dd8707db8', 'hotelimg_6240dd8735b', '6240dd872eefc4.66452114.jpg'),
('hot_6240def0e5dd7', 'hotelimg_6240def11b0', '6240e79a217667.74056393.jpg'),
('hot_6240e0404cb82', 'hotelimg_6240e040771', '6240e040724a06.29749721.jpg'),
('hot_6240e0404cb82', 'hotelimg_6240e04077f', '6240e04072f742.01270574.jpg'),
('hot_6240e0404cb82', 'hotelimg_6240e040787', '6240e040733e67.57688831.jpg'),
('hot_6240e0404cb82', 'hotelimg_6240e04078f', '6240e040737827.17435838.jpg'),
('hot_6240e1d569f27', 'hotelimg_6240e1d593f', '6240e1d58f5916.18968317.jpg'),
('hot_6240e1d569f27', 'hotelimg_6240e1d5948', '6240e1d58fcb97.26806742.jpg'),
('hot_6240e1d569f27', 'hotelimg_6240e1d5952', '6240e1d5901288.28738804.jpg'),
('hot_6240e1d569f27', 'hotelimg_6240e1d595d', '6240e1d59056b6.50324680.jpg'),
('hot_6240e3afae832', 'hotelimg_6240e3afda2', '6240e3afd471b0.45085821.jpg'),
('hot_6240e3afae832', 'hotelimg_6240e3afdac', '6240e79a217667.74056393.jpg'),
('hot_6240e3afae832', 'hotelimg_6240e3afdbd', '6240e3afd50c34.11941033.jpg'),
('hot_6240e3afae832', 'hotelimg_6240e3afdc7', '6240e3afd587f3.96064760.jpg'),
('hot_6240e56ae63fc', 'hotelimg_6240e56b1ec', '6240e56b18d273.00826243.jpg'),
('hot_6240e56ae63fc', 'hotelimg_6240e56b1fc', '6240e56b194185.58791037.jpg'),
('hot_6240e56ae63fc', 'hotelimg_6240e56b205', '6240e56b198671.27120783.jpg'),
('hot_6240e56ae63fc', 'hotelimg_6240e56b210', '6240f0a1147da7.50330731.jpg'),
('hot_6240e6a1d0407', 'hotelimg_6240e6a2084', '6240e6a20306b5.44530045.jpg'),
('hot_6240e6a1d0407', 'hotelimg_6240e6a2090', '6240e6a2036f16.55540294.jpg'),
('hot_6240e6a1d0407', 'hotelimg_6240e6a209d', '6240e6a203b8d9.57125289.jpg'),
('hot_6240e6a1d0407', 'hotelimg_6240e6a20a9', '6240e6a203ff93.97967457.jpg'),
('hot_6240e799ee7a0', 'hotelimg_6240e79a266', '6240e79a20b3e7.76443991.jpg'),
('hot_6240e799ee7a0', 'hotelimg_6240e79a271', '6240e79a2129b6.72885228.jpg'),
('hot_6240e799ee7a0', 'hotelimg_6240e79a27b', '6240e79a217667.74056393.jpg'),
('hot_6240e799ee7a0', 'hotelimg_6240e79a286', '6240e79a21bde6.67280878.jpg'),
('hot_6240e9a96e8ad', 'hotelimg_6240e9a988a', '6240e9a983eb09.70753468.jpg'),
('hot_6240e9a96e8ad', 'hotelimg_6240e9a9898', '6240e9a98445e2.24725369.jpg'),
('hot_6240e9a96e8ad', 'hotelimg_6240e9a98a5', '6240e9a9846dd7.91473169.jpg'),
('hot_6240e9a96e8ad', 'hotelimg_6240e9a98b0', '6240e9a98493f4.93889726.jpg'),
('hot_6240eaf97ec14', 'hotelimg_6240eaf99ac', '6240eaf995cc26.17934306.jpg'),
('hot_6240eaf97ec14', 'hotelimg_6240eaf99b8', '6240eaf9961f91.37263789.jpg'),
('hot_6240eaf97ec14', 'hotelimg_6240eaf99c0', '6240eaf99664b5.74502607.jpg'),
('hot_6240eaf97ec14', 'hotelimg_6240eaf99c9', '6240eaf996a8a1.47109859.jpg'),
('hot_6240ecc1ed45e', 'hotelimg_6240ecc2146', '6240d60452c354.00468305'),
('hot_6240ecc1ed45e', 'hotelimg_6240ecc2158', '6240ecc20fa493.34229335.jpg'),
('hot_6240ecc1ed45e', 'hotelimg_6240ecc2161', '6240ecc2104cd0.25870637.jpg'),
('hot_6240ecc1ed45e', 'hotelimg_6240ecc216b', '6240ecc21070a3.91100272.jpg'),
('hot_6240eebbb356f', 'hotelimg_6240eebbcca', '6240eebbc87080.97461385.jpg'),
('hot_6240eebbb356f', 'hotelimg_6240eebbcda', '6240eebbc8ac34.13279176.jpg'),
('hot_6240eebbb356f', 'hotelimg_6240eebbce6', '6240eebbc8d381.42219608.jpg'),
('hot_6240eebbb356f', 'hotelimg_6240eebbcf0', '6240eebbc8fab1.29001792.jpg'),
('hot_6240f0a0ecaed', 'hotelimg_6240f0a118a', '6240f0a113ad57.48803527.jpg'),
('hot_6240f0a0ecaed', 'hotelimg_6240f0a1197', '6240f0a1140460.38406688.jpg'),
('hot_6240f0a0ecaed', 'hotelimg_6240f0a11a4', '6240f0a11459e8.04930337.jpg'),
('hot_6240f0a0ecaed', 'hotelimg_6240f0a11b2', '6240f0a1147da7.50330731.jpg'),
('hot_6240f27890e97', 'hotelimg_6240f278aed', '6240fe4dbd62c0.43424770'),
('hot_6240f27890e97', 'hotelimg_6240f278afc', '6240f278a938f6.39473174.jpg'),
('hot_6240f27890e97', 'hotelimg_6240f278b05', '6240f278a99308.26915361.jpg'),
('hot_6240f27890e97', 'hotelimg_6240f278b10', '6240f278a9d881.30888175.jpg'),
('hot_6240f40bcb1eb', 'hotelimg_6240f40be39', '6240f40bde81d3.76045929.jpg'),
('hot_6240f40bcb1eb', 'hotelimg_6240f40be44', '6240f40bdeeaa2.02892202.jpg'),
('hot_6240f40bcb1eb', 'hotelimg_6240f40be4f', '624100266f0a59.43329807'),
('hot_6240f40bcb1eb', 'hotelimg_6240f40be5d', '6240f40bdf1183.18131510.jpg'),
('hot_6240f5a4676e2', 'hotelimg_6240f5a48ac', '6240f5a4859506.70072114.jpg'),
('hot_6240f5a4676e2', 'hotelimg_6240f5a48b5', '6240f5a4867406.56145946.jpg'),
('hot_6240f5a4676e2', 'hotelimg_6240f5a48bf', '6240f5a486a137.41245622.jpg'),
('hot_6240f5a4676e2', 'hotelimg_6240f5a48c9', '6240f5a486d973.02403518.jpg'),
('hot_6240f7a50518e', 'hotelimg_6240f7a51b2', '6240f7a5161766.32169942.jpg'),
('hot_6240f7a50518e', 'hotelimg_6240f7a51ba', '6240f7a516ccb4.58695052.jpg'),
('hot_6240f7a50518e', 'hotelimg_6240f7a51c2', '6240f7a516f482.45809284.jpg'),
('hot_6240f7a50518e', 'hotelimg_6240f7a51ce', '6240f7a5172d20.17939339.jpg'),
('hot_6240fa211ddcf', 'hotelimg_6240fa213b1', '6240fa21372f67.79159549.jpg'),
('hot_6240fa211ddcf', 'hotelimg_6240fa213bd', '6240fa21377db8.51739236.png'),
('hot_6240fa211ddcf', 'hotelimg_6240fa213cb', '6240fa2137acc4.22130837.jpg'),
('hot_6240fa211ddcf', 'hotelimg_6240fa213d4', '6240fa2137de56.77238196.jpg'),
('hot_6240fcdb6bd3f', 'hotelimg_6240fcdb8cf', '6240fcdb886483.10312305.jpg'),
('hot_6240fcdb6bd3f', 'hotelimg_6240fcdb8d8', '6240fcdb892cc6.61825635.png'),
('hot_6240fcdb6bd3f', 'hotelimg_6240fcdb8e2', '6240fcdb895427.56186094.jpg'),
('hot_6240fcdb6bd3f', 'hotelimg_6240fcdb8f4', '6240fcdb897a21.64355343.jpg'),
('hot_6240fe4da6fb2', 'hotelimg_6240fe4dc2d', '6240fe4dbd2727.92376033.jpg'),
('hot_6240fe4da6fb2', 'hotelimg_6240fe4dc39', '6240fe4dbd62c0.43424770.jpg'),
('hot_6240fe4da6fb2', 'hotelimg_6240fe4dc45', '6240fe4dbda7b0.44473475.jpg'),
('hot_6240fe4da6fb2', 'hotelimg_6240fe4dc4e', '6240fe4dbdd127.60947233.jpg'),
('hot_62410026585cd', 'hotelimg_6241002673d', '624100266f0a59.43329807.jpg'),
('hot_62410026585cd', 'hotelimg_6241002674c', '624100266f4708.73224612.jpg'),
('hot_62410026585cd', 'hotelimg_6241002675a', '624100266f6a68.29116595.jpg'),
('hot_62410026585cd', 'hotelimg_62410026768', '624100266f9c66.38805977.jpg'),
('hot_6241011736af6', 'hotelimg_624101174ef', '624101174a81a9.67176383.jpg'),
('hot_6241011736af6', 'hotelimg_624101174f8', '624101174b1a00.04087617.jpg'),
('hot_6241011736af6', 'hotelimg_62410117501', '624101174b4b97.46898037.jpg'),
('hot_6241011736af6', 'hotelimg_6241011750a', '624101174b9098.24522141.jpg'),
('hot_6241029b9be9f', 'hotelimg_6241029bba3', '6241029bb543a2.06984331.jpg'),
('hot_6241029b9be9f', 'hotelimg_6241029bbaf', '6241029bb58949.10209460.jpg'),
('hot_6241029b9be9f', 'hotelimg_6241029bbbd', '6241029bb5b349.13534689.jpg'),
('hot_6241029b9be9f', 'hotelimg_6241029bbc7', '6241029bb5dc72.67746562.jpg'),
('hot_6241046192fb2', 'hotelimg_62410461b00', '62410461a98818.04583955.jpeg'),
('hot_6241046192fb2', 'hotelimg_62410461b0b', '62410461a9e320.69961979.jpg'),
('hot_6241046192fb2', 'hotelimg_62410461b1b', '62410461aa2585.49141808.jpg'),
('hot_6241046192fb2', 'hotelimg_62410461b27', '62410461aa6f07.59015136.jpg'),
('hot_624105fe99a49', 'hotelimg_624105febd2', '624105feb704c8.88838948.jpg'),
('hot_624105fe99a49', 'hotelimg_624105febde', '624105feb76717.04277123.jpg'),
('hot_624105fe99a49', 'hotelimg_624105febec', '624105feb7ce16.00788444.jpg'),
('hot_624105fe99a49', 'hotelimg_624105febfb', '624105feb81c12.45403791.jpg'),
('hot_624108cc73cbd', 'hotelimg_624108cc932', '624108cc8deb28.05113599.jpg'),
('hot_624108cc73cbd', 'hotelimg_624108cc93a', '624108cc8e5355.98041551.jpg'),
('hot_624108cc73cbd', 'hotelimg_624108cc947', '624108cc8e9d13.43033499.jpg'),
('hot_624108cc73cbd', 'hotelimg_624108cc96e', '624108cc8ee225.96731435.jpg'),
('hot_62410aa6c6a62', 'hotelimg_62410aa6e3e', '6240fcdb897a21.64355343.jpg'),
('hot_62410c50a551d', 'hotelimg_62410c50bde', '62410c50b8e694.56313024.jpg'),
('hot_62410c50a551d', 'hotelimg_62410c50be7', '62410c50b946f7.59791815.jpg'),
('hot_62410c50a551d', 'hotelimg_62410c50bf1', '62410c50b988d8.95493398.jpg'),
('hot_62410c50a551d', 'hotelimg_62410c50bfe', '62410c50b9c598.47435050.jpg'),
('hot_62410db67b4f8', 'hotelimg_62410db6924', '624100266f4708.73224612.jpg'),
('hot_62410f3d1abec', 'hotelimg_62410f3d3c7', '62410f3d369b18.16661830.jpg'),
('hot_62410f3d1abec', 'hotelimg_62410f3d3d6', '62410f3d36eab0.42204352.jpg'),
('hot_62410f3d1abec', 'hotelimg_62410f3d3e1', '62410f3d371fe9.56963668.jpg'),
('hot_62410f3d1abec', 'hotelimg_62410f3d3f0', '62410f3d375335.15690885.jpg'),
('hot_62411095d95e4', 'hotelimg_6241109603c', '62411095ef6615.96021647.jpg'),
('hot_62411095d95e4', 'hotelimg_62411096045', '62411095efbfc9.56096271.jpg'),
('hot_62411095d95e4', 'hotelimg_6241109604e', '62411095f06367.81589381.jpg'),
('hot_62411095d95e4', 'hotelimg_62411096059', '62411095f0d6d4.96264742.jpg'),
('hot_6241126763c58', 'hotelimg_6241126781e', '624112677cfb86.50556969.jpg'),
('hot_6241126763c58', 'hotelimg_6241126782d', '624112677d6a99.78853520.jpg'),
('hot_6241126763c58', 'hotelimg_62411267837', '624112677d95b6.19557709.jpg'),
('hot_6241126763c58', 'hotelimg_6241126784d', '624112677db255.88062419.jpg'),
('hot_624115d53a272', 'hotelimg_624115d5524', '624115d54e21e0.23155969.jpg'),
('hot_624115d53a272', 'hotelimg_624115d552d', '624115d54e57f2.36775490.jpg'),
('hot_624115d53a272', 'hotelimg_624115d5538', '624115d54e7c16.68097928.jpg'),
('hot_624115d53a272', 'hotelimg_624115d5543', '624115d54ea195.18699440.jpg'),
('hot_624130c63cf07', 'hotelimg_624130c6685', '624130c6625138.65007233.jpg'),
('hot_624130c63cf07', 'hotelimg_624130c6690', '624130c662bb81.21178465.jpg'),
('hot_624130c63cf07', 'hotelimg_624130c6699', '624130c6630543.16273556.jpg'),
('hot_624130c63cf07', 'hotelimg_624130c66a7', '624130c6635ef0.90956021.jpg'),
('hot_624140c851209', 'hotelimg_624140c87c2', '624140c8751033.77650259.jpg'),
('hot_624140c851209', 'hotelimg_624140c87d0', '624140c8760ea4.77295501.jpg'),
('hot_624140c851209', 'hotelimg_624140c87e3', '624140c8765a80.96737914.jpg'),
('hot_624140c851209', 'hotelimg_624140c87ed', '624140c876a507.81331020.jpg'),
('hot_62416d800c9fb', 'hotelimg_62416d80215', '62416d801bdb70.22011201.jpg'),
('hot_62416d800c9fb', 'hotelimg_62416d80220', '62416d801c9cf6.07591274.jpg'),
('hot_62416d800c9fb', 'hotelimg_62416d80229', '62416d801cb409.83909410.jpg'),
('hot_62416d800c9fb', 'hotelimg_62416d8022e', '62416d801cc575.49579982.jpg'),
('hot_62416fb27c3d4', 'hotelimg_62416fb28ff', '62416fb28af813.55997044.jpg'),
('hot_62416fb27c3d4', 'hotelimg_62416fb290a', '62416fb28b6419.96712988.jpeg'),
('hot_62416fb27c3d4', 'hotelimg_62416fb2916', '62416fb28b7910.54994224.jpg'),
('hot_62416fb27c3d4', 'hotelimg_62416fb2922', '62416fb28b8804.15121077.jpg'),
('hot_6241714f1b9a7', 'hotelimg_6241714f2e2', '6241714f2a5905.31594358.jpg'),
('hot_6241714f1b9a7', 'hotelimg_6241714f2ed', '6241714f2a7513.69124495.jpg'),
('hot_6241714f1b9a7', 'hotelimg_6241714f2f7', '6241714f2a8879.03752225.jpg'),
('hot_6241714f1b9a7', 'hotelimg_6241714f301', '6241714f2a99e9.71871795.jpg'),
('hot_624172b9c3664', 'hotelimg_624172b9d5e', '62416d801c9cf6.07591274.jpg'),
('hot_6241743d9a95e', 'hotelimg_6241743dace', '6241743da8e483.42465403.jpg'),
('hot_6241743d9a95e', 'hotelimg_6241743dad8', '6241743da90e56.86015906.jpg'),
('hot_6241743d9a95e', 'hotelimg_6241743dae3', '6241743da921d3.10872003.jpg'),
('hot_6241743d9a95e', 'hotelimg_6241743daeb', '6241743da93642.11484665.jpg'),
('hot_6241756df07a4', 'hotelimg_6241756e0f5', '6241756e0b6ee3.65053153.jpg'),
('hot_6241756df07a4', 'hotelimg_6241756e0fe', '6241756e0b9332.20616548.jpg'),
('hot_6241756df07a4', 'hotelimg_6241756e107', '6241756e0ba696.12119089.jpg'),
('hot_6241756df07a4', 'hotelimg_6241756e110', '6241756e0bb9c7.87918332.jpg'),
('hot_624178464f427', 'hotelimg_62417846618', '624178465e8bb1.94733281.jpg'),
('hot_624178464f427', 'hotelimg_6241784661f', '624178465ec143.79567094.jpg'),
('hot_624178464f427', 'hotelimg_62417846624', '624183c78e0153.59171660'),
('hot_624178464f427', 'hotelimg_6241784662c', '624178465edd34.39210927.jpg'),
('hot_6241792ca49b4', 'hotelimg_6241792cb68', '62417f101bd289.90420569.jpg'),
('hot_62417a738ac4f', 'hotelimg_62417a739cd', '62416fb28b7910.54994224.jpg'),
('hot_62417a738ac4f', 'hotelimg_62417a739d8', '62417a7398de55.10866946.jpg'),
('hot_62417a738ac4f', 'hotelimg_62417a739e3', '62418d4dca8a44.06428288'),
('hot_62417a738ac4f', 'hotelimg_62417a739ef', '62417a7398faa5.13874447.jpg'),
('hot_62417c176453b', 'hotelimg_62417c17769', '624184c3309089.18572739.jpg'),
('hot_62417c176453b', 'hotelimg_62417c17774', '62417c17729706.91058674.jpg'),
('hot_62417c176453b', 'hotelimg_62417c1777d', '62417c1772c906.03337007.jpg'),
('hot_62417c176453b', 'hotelimg_62417c17785', '62417c1772e2d4.05387531.jpg'),
('hot_62417f100cc30', 'hotelimg_62417f101f6', '62417f101ba524.77869854.jpg'),
('hot_62417f100cc30', 'hotelimg_62417f10201', '62417f101bc278.81801491.jpg'),
('hot_62417f100cc30', 'hotelimg_62417f1020b', '62417f101bd289.90420569.jpg'),
('hot_62417f100cc30', 'hotelimg_62417f10219', '62417f101be6d4.44115346.jpg'),
('hot_6241809f10332', 'hotelimg_6241809f236', '6241809f1ee217.33713570.jpg'),
('hot_6241809f10332', 'hotelimg_6241809f242', '6241809f1f03a4.67823528.jpg'),
('hot_6241809f10332', 'hotelimg_6241809f24c', '6241809f1f1be8.49144838.jpg'),
('hot_6241809f10332', 'hotelimg_6241809f256', '6241809f1f2c55.62633939.jpg'),
('hot_62418292463f1', 'hotelimg_624182925a3', '62418292550878.14016704.jpg'),
('hot_62418292463f1', 'hotelimg_624182925ac', '624182925526b4.14754950.jpg'),
('hot_62418292463f1', 'hotelimg_624182925b6', '624182925548b6.04188092.jpg'),
('hot_62418292463f1', 'hotelimg_624182925c2', '62418292555fe8.97985703.jpg'),
('hot_624183c77eecc', 'hotelimg_624183c7918', '624183c78de618.54111114.jpg'),
('hot_624183c77eecc', 'hotelimg_624183c7923', '624183c78e0153.59171660.jpg'),
('hot_624183c77eecc', 'hotelimg_624183c792d', '624183c78e14f7.92587571.jpg'),
('hot_624183c77eecc', 'hotelimg_624183c7936', '624183c78e0153.59171660.jpg'),
('hot_624184c32203a', 'hotelimg_624184c334e', '624184c3305000.47102124.jpg'),
('hot_624184c32203a', 'hotelimg_624184c3358', '624184c3306c02.46520781.jpg'),
('hot_624184c32203a', 'hotelimg_624184c3361', '624184c3307fb5.97983402.jpg'),
('hot_624184c32203a', 'hotelimg_624184c336c', '624184c3309089.18572739.jpg'),
('hot_6241861b55005', 'hotelimg_6241861b67d', '6241861b641f29.00158789.jpg'),
('hot_6241861b55005', 'hotelimg_6241861b690', '6241861b644368.36314868.jpg'),
('hot_6241861b55005', 'hotelimg_6241861b69a', '6241861b645be7.90564759.jpg'),
('hot_6241861b55005', 'hotelimg_6241861b6a3', '624183c78e0153.59171660.jpg'),
('hot_624187b94f391', 'hotelimg_624187b9629', '624187b95ddef3.66817525.jpg'),
('hot_624187b94f391', 'hotelimg_624187b9632', '624187b95e0903.98329090.jpg'),
('hot_624187b94f391', 'hotelimg_624187b963a', '624187b95e2478.72265824.jpg'),
('hot_624187b94f391', 'hotelimg_624187b9642', '624187b95e3a74.60386477.jpg'),
('hot_6241896494918', 'hotelimg_62418964a8b', '62418964a2d8a7.53692761.jpg'),
('hot_6241896494918', 'hotelimg_62418964a9e', '62418964a2f397.96511385.jpg'),
('hot_6241896494918', 'hotelimg_62418964ab0', '62418964a30704.23868932.jpg'),
('hot_6241896494918', 'hotelimg_62418964ac3', '62418964a31885.06928203.jpg'),
('hot_62418b3fcdab7', 'hotelimg_62418b3fe2d', '62418b3fdbff39.35064459.jpg'),
('hot_62418b3fcdab7', 'hotelimg_62418b3fe3f', '62418b3fdc23c2.94518774.jpg'),
('hot_62418b3fcdab7', 'hotelimg_62418b3fe52', '62418b3fdc3797.84493994.jpg'),
('hot_62418b3fcdab7', 'hotelimg_62418b3fe65', '62418b3fdc48d6.64938085.jpg'),
('hot_62418d4db11c2', 'hotelimg_62418d4dce8', '62418d4dca5907.62193460.jpg'),
('hot_62418d4db11c2', 'hotelimg_62418d4dcf3', '62418d4dca7719.28429098.jpg'),
('hot_62418d4db11c2', 'hotelimg_62418d4dcfc', '62418d4dca8a44.06428288.jpg'),
('hot_62418d4db11c2', 'hotelimg_62418d4dd06', '62418d4dcaa049.36009167.jpg'),
('hot_624193f17ed34', 'hotelimg_624193f1957', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `hotelID` char(20) NOT NULL,
  `room_type` char(10) NOT NULL,
  `no_of_rooms` int(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `food` char(5) NOT NULL,
  `minibar` char(5) NOT NULL,
  `a/c` char(5) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`hotelID`, `room_type`, `no_of_rooms`, `capacity`, `food`, `minibar`, `a/c`, `price`) VALUES
('hot_623ff5fbc03ad', 'double', 10, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_623ff5fbc03ad', 'family', 10, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_623ff5fbc03ad', 'massive', 10, 8, 'yes', 'yes', 'yes', 36000.00),
('hot_623ff5fbc03ad', 'single', 10, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_623ff824b0ae5', 'double', 150, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_623ff824b0ae5', 'family', 150, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_623ff824b0ae5', 'massive', 50, 9, 'yes', 'yes', 'yes', 40000.00),
('hot_623ff824b0ae5', 'single', 200, 1, 'yes', 'yes', 'yes', 15000.00),
('hot_623ffb3cb4ed0', 'double', 35, 2, 'yes', 'yes', 'yes', 23000.00),
('hot_623ffb3cb4ed0', 'family', 60, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_623ffb3cb4ed0', 'massive', 40, 8, 'yes', 'yes', 'yes', 40000.00),
('hot_623ffb3cb4ed0', 'single', 50, 1, 'yes', 'yes', 'yes', 13000.00),
('hot_623ffd7f35a7e', 'double', 40, 2, 'yes', 'yes', 'yes', 23000.00),
('hot_623ffd7f35a7e', 'family', 28, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_623ffd7f35a7e', 'massive', 20, 8, 'yes', 'yes', 'yes', 44000.00),
('hot_623ffd7f35a7e', 'single', 20, 1, 'yes', 'yes', 'yes', 16000.00),
('hot_623ffee359a6d', 'double', 60, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_623ffee359a6d', 'family', 66, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_623ffee359a6d', 'massive', 30, 8, 'yes', 'yes', 'yes', 54000.00),
('hot_623ffee359a6d', 'single', 50, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_62400142b1489', 'double', 3, 2, 'yes', 'yes', 'yes', 5500.00),
('hot_62400142b1489', 'family', 2, 4, 'yes', 'yes', 'yes', 7000.00),
('hot_62400142b1489', 'massive', 2, 8, 'yes', 'yes', 'yes', 14000.00),
('hot_62400142b1489', 'single', 3, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_6240037cd6272', 'double', 50, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_6240037cd6272', 'family', 20, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_6240037cd6272', 'massive', 21, 8, 'yes', 'yes', 'yes', 47000.00),
('hot_6240037cd6272', 'single', 30, 1, 'yes', 'yes', 'yes', 13000.00),
('hot_624004e4112e3', 'double', 10, 2, 'yes', 'yes', 'yes', 6000.00),
('hot_624004e4112e3', 'family', 5, 4, 'yes', 'yes', 'yes', 10000.00),
('hot_624004e4112e3', 'massive', 4, 8, 'yes', 'yes', 'yes', 17000.00),
('hot_624004e4112e3', 'single', 6, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_62400659a2281', 'double', 2, 2, 'yes', 'yes', 'yes', 4500.00),
('hot_62400659a2281', 'family', 3, 4, 'yes', 'yes', 'yes', 6500.00),
('hot_62400659a2281', 'massive', 5, 8, 'yes', 'yes', 'yes', 9000.00),
('hot_62400659a2281', 'single', 2, 1, 'yes', 'yes', 'yes', 3000.00),
('hot_624007c956646', 'double', 25, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624007c956646', 'family', 30, 4, 'yes', 'yes', 'yes', 14000.00),
('hot_624007c956646', 'massive', 15, 7, 'yes', 'yes', 'yes', 24000.00),
('hot_624007c956646', 'single', 15, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_624009ca2af40', 'double', 5, 2, 'yes', 'yes', 'yes', 8000.00),
('hot_624009ca2af40', 'family', 5, 4, 'yes', 'yes', 'yes', 9500.00),
('hot_624009ca2af40', 'massive', 4, 7, 'yes', 'yes', 'yes', 14000.00),
('hot_624009ca2af40', 'single', 3, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62400b53a2b0e', 'double', 7, 2, 'yes', 'yes', 'yes', 7000.00),
('hot_62400b53a2b0e', 'family', 6, 4, 'yes', 'yes', 'yes', 8900.00),
('hot_62400b53a2b0e', 'massive', 4, 7, 'yes', 'yes', 'yes', 15000.00),
('hot_62400b53a2b0e', 'single', 3, 1, 'yes', 'yes', 'yes', 3500.00),
('hot_62400cd4075a3', 'double', 6, 2, 'yes', 'yes', 'yes', 5000.00),
('hot_62400cd4075a3', 'family', 5, 4, 'yes', 'yes', 'yes', 7900.00),
('hot_62400cd4075a3', 'massive', 6, 8, 'yes', 'yes', 'yes', 13000.00),
('hot_62400cd4075a3', 'single', 4, 1, 'yes', 'yes', 'yes', 3600.00),
('hot_62400eea21659', 'double', 2, 2, 'yes', 'yes', 'yes', 4500.00),
('hot_62400eea21659', 'family', 3, 4, 'yes', 'yes', 'yes', 7500.00),
('hot_62400eea21659', 'massive', 6, 8, 'yes', 'yes', 'yes', 14000.00),
('hot_62400eea21659', 'single', 4, 1, 'yes', 'yes', 'yes', 3500.00),
('hot_624010f7e57c4', 'double', 5, 2, 'yes', 'yes', 'yes', 5000.00),
('hot_624010f7e57c4', 'family', 8, 4, 'yes', 'yes', 'yes', 7500.00),
('hot_624010f7e57c4', 'massive', 5, 8, 'yes', 'yes', 'yes', 16000.00),
('hot_624010f7e57c4', 'single', 4, 1, 'yes', 'yes', 'yes', 3000.00),
('hot_6240131b98b44', 'double', 6, 2, 'yes', 'yes', 'yes', 8600.00),
('hot_6240131b98b44', 'family', 10, 4, 'yes', 'yes', 'yes', 15500.00),
('hot_6240131b98b44', 'massive', 10, 7, 'yes', 'yes', 'yes', 20000.00),
('hot_6240131b98b44', 'single', 4, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_624014a42548b', 'double', 3, 2, 'yes', 'yes', 'yes', 8400.00),
('hot_624014a42548b', 'family', 4, 4, 'yes', 'yes', 'yes', 15000.00),
('hot_624014a42548b', 'massive', 4, 7, 'yes', 'yes', 'yes', 24000.00),
('hot_624014a42548b', 'single', 2, 1, 'yes', 'yes', 'yes', 4300.00),
('hot_6240182ad503e', 'double', 3, 2, 'yes', 'yes', 'yes', 14000.00),
('hot_6240182ad503e', 'family', 7, 4, 'yes', 'yes', 'yes', 20000.00),
('hot_6240182ad503e', 'massive', 5, 8, 'yes', 'yes', 'yes', 38000.00),
('hot_6240182ad503e', 'single', 5, 1, 'yes', 'yes', 'yes', 8500.00),
('hot_624019ea7e2b5', 'double', 1, 2, 'yes', 'yes', 'yes', 8000.00),
('hot_624019ea7e2b5', 'family', 1, 4, 'yes', 'yes', 'yes', 12000.00),
('hot_624019ea7e2b5', 'massive', 1, 8, 'yes', 'yes', 'yes', 24000.00),
('hot_624019ea7e2b5', 'single', 1, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62401c7dd2d72', 'double', 2, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_62401c7dd2d72', 'family', 2, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62401c7dd2d72', 'massive', 2, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_62401c7dd2d72', 'single', 3, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_62401fcbb1c23', 'double', 1, 2, 'yes', 'yes', 'yes', 6000.00),
('hot_62401fcbb1c23', 'family', 2, 4, 'yes', 'yes', 'yes', 10000.00),
('hot_62401fcbb1c23', 'massive', 0, 8, 'yes', 'yes', 'yes', 24000.00),
('hot_62401fcbb1c23', 'single', 1, 1, 'yes', 'yes', 'yes', 3000.00),
('hot_624033ba73b7d', 'double', 12, 2, 'no', 'no', 'no', 5000.00),
('hot_624033ba73b7d', 'family', 2, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624033ba73b7d', 'massive', 2, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_624033ba73b7d', 'single', 34, 1, 'no', 'no', 'no', 6700.00),
('hot_624035536249d', 'double', 4, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624035536249d', 'family', 6, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624035536249d', 'massive', 8, 7, 'no', 'no', 'no', 78000.00),
('hot_624035536249d', 'single', 45, 1, 'no', 'no', 'no', 6700.00),
('hot_6240372ccd6aa', 'double', 2, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_6240372ccd6aa', 'family', 2, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_6240372ccd6aa', 'massive', 34, 6, 'no', 'no', 'no', 90000.00),
('hot_6240372ccd6aa', 'single', 34, 1, 'no', 'no', 'no', 4000.00),
('hot_6240388257873', 'double', 3, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_6240388257873', 'family', 8, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_6240388257873', 'massive', 8, 8, 'no', 'no', 'no', 90000.00),
('hot_6240388257873', 'single', 2, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624039ee64de1', 'double', 25, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624039ee64de1', 'family', 25, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624039ee64de1', 'massive', 10, 9, 'yes', 'yes', 'yes', 40000.00),
('hot_624039ee64de1', 'single', 10, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62403b91c9468', 'double', 25, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_62403b91c9468', 'family', 25, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62403b91c9468', 'massive', 10, 9, 'yes', 'yes', 'yes', 40000.00),
('hot_62403b91c9468', 'single', 10, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62403deb49882', 'double', 3, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_62403deb49882', 'family', 3, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62403deb49882', 'massive', 4, 7, 'no', 'yes', 'yes', 36000.00),
('hot_62403deb49882', 'single', 2, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62403f47afb7a', 'double', 25, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_62403f47afb7a', 'family', 25, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62403f47afb7a', 'massive', 10, 7, 'no', 'yes', 'yes', 36000.00),
('hot_62403f47afb7a', 'single', 10, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624040b361ade', 'double', 6, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624040b361ade', 'family', 5, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624040b361ade', 'massive', 5, 7, 'yes', 'yes', 'yes', 40000.00),
('hot_624040b361ade', 'single', 4, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624041f2413b3', 'double', 3, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624041f2413b3', 'family', 2, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624041f2413b3', 'massive', 9, 9, 'no', 'no', 'no', 90000.00),
('hot_624041f2413b3', 'single', 2, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_624043c104ad5', 'double', 4, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624043c104ad5', 'family', 5, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_624043c104ad5', 'massive', 3, 7, 'yes', 'yes', 'yes', 42000.00),
('hot_624043c104ad5', 'single', 2, 1, 'yes', 'yes', 'yes', 6500.00),
('hot_624048dbc3152', 'double', 50, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_624048dbc3152', 'family', 50, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_624048dbc3152', 'massive', 34, 9, 'yes', 'yes', 'yes', 45000.00),
('hot_624048dbc3152', 'single', 20, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_62404b0e8e28a', 'double', 7, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_62404b0e8e28a', 'family', 5, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62404b0e8e28a', 'massive', 8, 4, 'no', 'no', 'no', 90000.00),
('hot_62404b0e8e28a', 'single', 3, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_62404c0bbe07d', 'double', 1, 2, 'yes', 'yes', 'yes', 8000.00),
('hot_62404c0bbe07d', 'family', 1, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62404c0bbe07d', 'massive', 23, 6, 'no', 'no', 'no', 0.00),
('hot_62404c0bbe07d', 'single', 1, 1, 'yes', 'yes', 'yes', 5000.00),
('hot_62404def8f937', 'double', 1, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_62404def8f937', 'family', 1, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62404def8f937', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_62404def8f937', 'single', 1, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62404f589e33e', 'double', 2, 2, 'yes', 'yes', 'yes', 8500.00),
('hot_62404f589e33e', 'family', 2, 4, 'yes', 'yes', 'yes', 18000.00),
('hot_62404f589e33e', 'massive', 2, 7, 'yes', 'yes', 'yes', 27000.00),
('hot_62404f589e33e', 'single', 1, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_624050bf2d652', 'double', 2, 2, 'yes', 'yes', 'yes', 7000.00),
('hot_624050bf2d652', 'family', 2, 4, 'yes', 'yes', 'yes', 13000.00),
('hot_624050bf2d652', 'massive', 2, 9, 'yes', 'yes', 'yes', 28000.00),
('hot_624050bf2d652', 'single', 1, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_6240535e0a22f', 'double', 4, 2, 'yes', 'yes', 'yes', 7000.00),
('hot_6240535e0a22f', 'family', 3, 4, 'yes', 'yes', 'yes', 14000.00),
('hot_6240535e0a22f', 'massive', 4, 8, 'yes', 'yes', 'yes', 24000.00),
('hot_6240535e0a22f', 'single', 2, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_624054b25cddf', 'double', 100, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624054b25cddf', 'family', 100, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624054b25cddf', 'massive', 75, 9, 'yes', 'yes', 'yes', 36000.00),
('hot_624054b25cddf', 'single', 50, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624055f046248', 'double', 2, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624055f046248', 'family', 2, 4, 'yes', 'yes', 'yes', 20000.00),
('hot_624055f046248', 'massive', 1, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_624055f046248', 'single', 2, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624057f45b0a9', 'double', 3, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624057f45b0a9', 'family', 7, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624057f45b0a9', 'massive', 2, 9, 'yes', 'yes', 'yes', 36000.00),
('hot_624057f45b0a9', 'single', 2, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_624059c090aca', 'double', 4, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624059c090aca', 'family', 2, 4, 'yes', 'yes', 'yes', 22500.00),
('hot_624059c090aca', 'massive', 2, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_624059c090aca', 'single', 2, 1, 'yes', 'yes', 'yes', 4500.00),
('hot_62405b110d8c4', 'double', 19, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_62405b110d8c4', 'family', 10, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62405b110d8c4', 'massive', 10, 9, 'yes', 'yes', 'yes', 36000.00),
('hot_62405b110d8c4', 'single', 10, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62405f0405373', 'double', 10, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_62405f0405373', 'family', 5, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62405f0405373', 'massive', 10, 9, 'yes', 'yes', 'yes', 36000.00),
('hot_62405f0405373', 'single', 5, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62406b1fd728f', 'double', 30, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_62406b1fd728f', 'family', 40, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62406b1fd728f', 'massive', 30, 7, 'yes', 'yes', 'yes', 40000.00),
('hot_62406b1fd728f', 'single', 32, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_62406be29a995', 'double', 4, 2, 'yes', 'yes', 'no', 20000.00),
('hot_62406be29a995', 'family', 4, 4, 'no', 'no', 'no', 30000.00),
('hot_62406be29a995', 'massive', 4, 5, 'no', 'no', 'yes', 90000.00),
('hot_62406be29a995', 'single', 4, 1, 'no', 'no', 'no', 4000.00),
('hot_6240d6042cfff', 'double', 1, 2, 'yes', 'yes', 'yes', 6000.00),
('hot_6240d6042cfff', 'family', 1, 4, 'yes', 'yes', 'yes', 13500.00),
('hot_6240d6042cfff', 'massive', 1, 9, 'yes', 'yes', 'yes', 34000.00),
('hot_6240d6042cfff', 'single', 1, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_6240d78eb685d', 'double', 14, 2, 'yes', 'yes', 'yes', 8500.00),
('hot_6240d78eb685d', 'family', 14, 4, 'yes', 'yes', 'yes', 12700.00),
('hot_6240d78eb685d', 'massive', 5, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_6240d78eb685d', 'single', 5, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_6240d98d2614e', 'double', 5, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_6240d98d2614e', 'family', 4, 4, 'yes', 'yes', 'yes', 16000.00),
('hot_6240d98d2614e', 'massive', 2, 8, 'yes', 'yes', 'yes', 50000.00),
('hot_6240d98d2614e', 'single', 3, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6240dad1b0245', 'double', 60, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_6240dad1b0245', 'family', 50, 4, 'yes', 'yes', 'yes', 16000.00),
('hot_6240dad1b0245', 'massive', 20, 9, 'yes', 'yes', 'yes', 40000.00),
('hot_6240dad1b0245', 'single', 30, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6240db3e061c0', 'double', 23, 2, 'no', 'no', 'no', 5500.00),
('hot_6240db3e061c0', 'family', 13, 4, 'no', 'no', 'no', 6700.00),
('hot_6240db3e061c0', 'massive', 8, 6, 'no', 'no', 'no', 90000.00),
('hot_6240db3e061c0', 'single', 54, 1, 'no', 'yes', 'no', 4000.00),
('hot_6240dc4415c52', 'double', 50, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_6240dc4415c52', 'family', 50, 4, 'yes', 'yes', 'yes', 20000.00),
('hot_6240dc4415c52', 'massive', 20, 7, 'yes', 'yes', 'yes', 40000.00),
('hot_6240dc4415c52', 'single', 30, 1, 'yes', 'yes', 'yes', 6500.00),
('hot_6240dd8707db8', 'double', 4, 2, 'yes', 'yes', 'yes', 8500.00),
('hot_6240dd8707db8', 'family', 5, 4, 'yes', 'yes', 'yes', 16000.00),
('hot_6240dd8707db8', 'massive', 3, 9, 'yes', 'yes', 'yes', 45000.00),
('hot_6240dd8707db8', 'single', 3, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6240def0e5dd7', 'double', 20, 2, 'yes', 'yes', 'yes', 8600.00),
('hot_6240def0e5dd7', 'family', 20, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_6240def0e5dd7', 'massive', 21, 10, 'yes', 'yes', 'yes', 70000.00),
('hot_6240def0e5dd7', 'single', 20, 1, 'yes', 'yes', 'yes', 5000.00),
('hot_6240e0404cb82', 'double', 1, 2, 'yes', 'yes', 'yes', 8500.00),
('hot_6240e0404cb82', 'family', 1, 4, 'yes', 'yes', 'yes', 17000.00),
('hot_6240e0404cb82', 'massive', 2, 10, 'yes', 'yes', 'yes', 60000.00),
('hot_6240e0404cb82', 'single', 34, 1, 'no', 'no', 'no', 4000.00),
('hot_6240e1d569f27', 'double', 2, 2, 'yes', 'yes', 'yes', 8700.00),
('hot_6240e1d569f27', 'family', 2, 4, 'yes', 'yes', 'yes', 20000.00),
('hot_6240e1d569f27', 'massive', 2, 10, 'yes', 'yes', 'yes', 60000.00),
('hot_6240e1d569f27', 'single', 1, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6240e3afae832', 'double', 23, 2, 'no', 'no', 'no', 5600.00),
('hot_6240e3afae832', 'family', 2, 4, 'yes', 'yes', 'yes', 10000.00),
('hot_6240e3afae832', 'massive', 4, 6, 'no', 'no', 'no', 90000.00),
('hot_6240e3afae832', 'single', 23, 1, 'no', 'no', 'no', 4000.00),
('hot_6240e56ae63fc', 'double', 4, 2, 'yes', 'yes', 'yes', 8400.00),
('hot_6240e56ae63fc', 'family', 4, 4, 'yes', 'yes', 'yes', 10000.00),
('hot_6240e56ae63fc', 'massive', 3, 9, 'yes', 'yes', 'yes', 60000.00),
('hot_6240e56ae63fc', 'single', 2, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_6240e6a1d0407', 'double', 25, 2, 'yes', 'yes', 'yes', 29000.00),
('hot_6240e6a1d0407', 'family', 20, 4, 'yes', 'yes', 'yes', 48000.00),
('hot_6240e6a1d0407', 'massive', 8, 6, 'no', 'no', 'no', 90000.00),
('hot_6240e6a1d0407', 'single', 15, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_6240e799ee7a0', 'double', 12, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_6240e799ee7a0', 'family', 20, 4, 'yes', 'yes', 'yes', 44000.00),
('hot_6240e799ee7a0', 'massive', 4, 7, 'no', 'no', 'no', 90000.00),
('hot_6240e799ee7a0', 'single', 12, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_6240e9a96e8ad', 'double', 30, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_6240e9a96e8ad', 'family', 45, 4, 'yes', 'yes', 'yes', 46000.00),
('hot_6240e9a96e8ad', 'massive', 5, 10, 'yes', 'yes', 'yes', 100000.00),
('hot_6240e9a96e8ad', 'single', 25, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_6240eaf97ec14', 'double', 75, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_6240eaf97ec14', 'family', 75, 4, 'yes', 'yes', 'yes', 40000.00),
('hot_6240eaf97ec14', 'massive', 10, 10, 'yes', 'yes', 'yes', 100000.00),
('hot_6240eaf97ec14', 'single', 20, 1, 'yes', 'yes', 'yes', 10000.00),
('hot_6240ecc1ed45e', 'double', 25, 2, 'yes', 'yes', 'yes', 16000.00),
('hot_6240ecc1ed45e', 'family', 25, 4, 'yes', 'yes', 'yes', 38000.00),
('hot_6240ecc1ed45e', 'massive', 14, 10, 'yes', 'yes', 'yes', 90000.00),
('hot_6240ecc1ed45e', 'single', 11, 1, 'yes', 'yes', 'yes', 5800.00),
('hot_6240eebbb356f', 'double', 10, 2, 'yes', 'yes', 'yes', 13000.00),
('hot_6240eebbb356f', 'family', 15, 4, 'yes', 'yes', 'yes', 39000.00),
('hot_6240eebbb356f', 'massive', 5, 10, 'yes', 'yes', 'yes', 60000.00),
('hot_6240eebbb356f', 'single', 5, 1, 'yes', 'yes', 'yes', 6500.00),
('hot_6240f0a0ecaed', 'double', 3, 2, 'yes', 'yes', 'yes', 8900.00),
('hot_6240f0a0ecaed', 'family', 3, 4, 'yes', 'yes', 'yes', 38000.00),
('hot_6240f0a0ecaed', 'massive', 1, 9, 'yes', 'yes', 'yes', 75000.00),
('hot_6240f0a0ecaed', 'single', 0, 1, 'no', 'no', 'no', 4000.00),
('hot_6240f27890e97', 'double', 0, 2, 'no', 'no', 'no', 4000.00),
('hot_6240f27890e97', 'family', 1, 4, 'no', 'no', 'no', 33000.00),
('hot_6240f27890e97', 'massive', 1, 9, 'no', 'no', 'no', 80000.00),
('hot_6240f27890e97', 'single', 0, 1, 'no', 'no', 'no', 4000.00),
('hot_6240f40bcb1eb', 'double', 2, 2, 'yes', 'yes', 'yes', 9000.00),
('hot_6240f40bcb1eb', 'family', 3, 4, 'yes', 'yes', 'yes', 22500.00),
('hot_6240f40bcb1eb', 'massive', 2, 8, 'yes', 'yes', 'yes', 60000.00),
('hot_6240f40bcb1eb', 'single', 23, 1, 'no', 'no', 'no', 4500.00),
('hot_6240f5a4676e2', 'double', 23, 2, 'no', 'no', 'no', 5600.00),
('hot_6240f5a4676e2', 'family', 2, 4, 'yes', 'yes', 'yes', 10500.00),
('hot_6240f5a4676e2', 'massive', 2, 7, 'yes', 'yes', 'no', 30000.00),
('hot_6240f5a4676e2', 'single', 23, 1, 'no', 'no', 'no', 4000.00),
('hot_6240f7a50518e', 'double', 6, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_6240f7a50518e', 'family', 6, 4, 'yes', 'yes', 'yes', 15000.00),
('hot_6240f7a50518e', 'massive', 6, 6, 'no', 'no', 'no', 90000.00),
('hot_6240f7a50518e', 'single', 6, 1, 'yes', 'yes', 'yes', 5700.00),
('hot_6240fa211ddcf', 'double', 7, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_6240fa211ddcf', 'family', 9, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_6240fa211ddcf', 'massive', 6, 6, 'no', 'no', 'no', 90000.00),
('hot_6240fa211ddcf', 'single', 7, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_6240fcdb6bd3f', 'double', 7, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_6240fcdb6bd3f', 'family', 9, 4, 'yes', 'yes', 'yes', 16000.00),
('hot_6240fcdb6bd3f', 'massive', 8, 8, 'no', 'no', 'no', 90000.00),
('hot_6240fcdb6bd3f', 'single', 7, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6240fe4da6fb2', 'double', 10, 2, 'yes', 'yes', 'yes', 7000.00),
('hot_6240fe4da6fb2', 'family', 8, 4, 'yes', 'yes', 'yes', 14000.00),
('hot_6240fe4da6fb2', 'massive', 7, 9, 'no', 'no', 'no', 90000.00),
('hot_6240fe4da6fb2', 'single', 8, 1, 'yes', 'yes', 'yes', 4000.00),
('hot_62410026585cd', 'double', 7, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_62410026585cd', 'family', 4, 4, 'yes', 'yes', 'yes', 19000.00),
('hot_62410026585cd', 'massive', 4, 9, 'yes', 'yes', 'yes', 70000.00),
('hot_62410026585cd', 'single', 3, 1, 'yes', 'yes', 'yes', 5700.00),
('hot_6241011736af6', 'double', 4, 2, 'yes', 'yes', 'yes', 8900.00),
('hot_6241011736af6', 'family', 4, 4, 'yes', 'yes', 'yes', 17000.00),
('hot_6241011736af6', 'massive', 3, 9, 'yes', 'yes', 'yes', 75000.00),
('hot_6241011736af6', 'single', 3, 1, 'yes', 'yes', 'yes', 5700.00),
('hot_6241029b9be9f', '', 0, 2, 'no', 'no', 'no', 0.00),
('hot_6241029b9be9f', 'family', 25, 4, 'yes', 'yes', 'yes', 27000.00),
('hot_6241029b9be9f', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_6241029b9be9f', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_6241046192fb2', 'double', 26, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_6241046192fb2', 'family', 30, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_6241046192fb2', 'massive', 8, 9, 'yes', 'yes', 'yes', 80000.00),
('hot_6241046192fb2', 'single', 13, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_624105fe99a49', 'double', 9, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_624105fe99a49', 'family', 9, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_624105fe99a49', 'massive', 9, 7, 'yes', 'yes', 'yes', 60000.00),
('hot_624105fe99a49', 'single', 9, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_624108cc73cbd', 'double', 14, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624108cc73cbd', 'family', 15, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_624108cc73cbd', 'massive', 7, 7, 'yes', 'yes', 'yes', 60000.00),
('hot_624108cc73cbd', 'single', 7, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_62410aa6c6a62', 'double', 5, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_62410aa6c6a62', 'family', 5, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62410aa6c6a62', 'massive', 4, 6, 'yes', 'yes', 'yes', 50000.00),
('hot_62410aa6c6a62', 'single', 5, 1, 'yes', 'yes', 'yes', 4800.00),
('hot_62410c50a551d', 'double', 10, 2, 'yes', 'yes', 'yes', 13000.00),
('hot_62410c50a551d', 'family', 14, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_62410c50a551d', 'massive', 2, 7, 'yes', 'yes', 'yes', 68000.00),
('hot_62410c50a551d', 'single', 5, 1, 'yes', 'yes', 'yes', 6500.00),
('hot_62410db67b4f8', 'double', 25, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_62410db67b4f8', 'family', 25, 4, 'yes', 'yes', 'yes', 27000.00),
('hot_62410db67b4f8', 'massive', 18, 7, 'yes', 'yes', 'yes', 68000.00),
('hot_62410db67b4f8', 'single', 20, 1, 'yes', 'yes', 'yes', 5800.00),
('hot_62410f3d1abec', 'double', 8, 2, 'yes', 'yes', 'yes', 18000.00),
('hot_62410f3d1abec', 'family', 8, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_62410f3d1abec', 'massive', 7, 7, 'yes', 'yes', 'yes', 60000.00),
('hot_62410f3d1abec', 'single', 4, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62411095d95e4', 'double', 3, 2, 'yes', 'yes', 'yes', 8700.00),
('hot_62411095d95e4', 'family', 4, 4, 'yes', 'yes', 'yes', 16000.00),
('hot_62411095d95e4', 'massive', 3, 7, 'yes', 'yes', 'yes', 53400.00),
('hot_62411095d95e4', 'single', 1, 1, 'yes', 'yes', 'yes', 4700.00),
('hot_6241126763c58', 'double', 15, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_6241126763c58', 'family', 16, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_6241126763c58', 'massive', 8, 7, 'yes', 'yes', 'yes', 60000.00),
('hot_6241126763c58', 'single', 12, 1, 'yes', 'yes', 'yes', 7500.00),
('hot_624115d53a272', 'double', 2, 2, 'yes', 'yes', 'yes', 20000.00),
('hot_624115d53a272', 'family', 2, 4, 'yes', 'yes', 'yes', 48000.00),
('hot_624115d53a272', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_624115d53a272', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_624130c63cf07', 'double', 1, 2, 'yes', 'yes', 'yes', 10000.00),
('hot_624130c63cf07', 'family', 2, 4, 'yes', 'yes', 'yes', 39000.00),
('hot_624130c63cf07', 'massive', 1, 7, 'yes', 'yes', 'yes', 68000.00),
('hot_624130c63cf07', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_624140c851209', 'double', 4, 2, 'yes', 'yes', 'yes', 9000.00),
('hot_624140c851209', 'family', 3, 4, 'yes', 'yes', 'yes', 19000.00),
('hot_624140c851209', 'massive', 5, 7, 'yes', 'yes', 'yes', 62000.00),
('hot_624140c851209', 'single', 2, 1, 'yes', 'yes', 'yes', 4500.00),
('hot_62416d800c9fb', 'double', 10, 2, 'yes', 'yes', 'yes', 14000.00),
('hot_62416d800c9fb', 'family', 10, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62416d800c9fb', 'massive', 10, 7, 'yes', 'yes', 'yes', 36000.00),
('hot_62416d800c9fb', 'single', 10, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62416fb27c3d4', 'double', 0, 2, 'no', 'no', 'no', 0.00),
('hot_62416fb27c3d4', 'family', 2, 4, 'yes', 'yes', 'yes', 10000.00),
('hot_62416fb27c3d4', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_62416fb27c3d4', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_6241714f1b9a7', 'double', 6, 2, 'yes', 'yes', 'yes', 14000.00),
('hot_6241714f1b9a7', 'family', 6, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_6241714f1b9a7', 'massive', 6, 7, 'yes', 'yes', 'yes', 59000.00),
('hot_6241714f1b9a7', 'single', 6, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_624172b9c3664', 'double', 7, 2, 'yes', 'yes', 'yes', 6000.00),
('hot_624172b9c3664', 'family', 3, 4, 'yes', 'yes', 'yes', 14000.00),
('hot_624172b9c3664', 'massive', 4, 7, 'yes', 'yes', 'yes', 40000.00),
('hot_624172b9c3664', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_6241743d9a95e', 'double', 23, 2, 'no', 'no', 'no', 5600.00),
('hot_6241743d9a95e', 'family', 2, 4, 'yes', 'yes', 'yes', 13000.00),
('hot_6241743d9a95e', 'massive', 8, 8, 'no', 'no', 'no', 90000.00),
('hot_6241743d9a95e', 'single', 23, 1, 'no', 'no', 'no', 4000.00),
('hot_6241756df07a4', 'double', 1, 2, 'yes', 'yes', 'yes', 8600.00),
('hot_6241756df07a4', 'family', 2, 4, 'yes', 'yes', 'yes', 22500.00),
('hot_6241756df07a4', 'massive', 2, 8, 'yes', 'yes', 'yes', 70000.00),
('hot_6241756df07a4', 'single', 0, 1, 'no', 'no', 'no', 4000.00),
('hot_624178464f427', 'double', 80, 2, 'yes', 'yes', 'yes', 8700.00),
('hot_624178464f427', 'family', 50, 4, 'yes', 'yes', 'yes', 17000.00),
('hot_624178464f427', 'massive', 18, 7, 'yes', 'yes', 'yes', 54000.00),
('hot_624178464f427', 'single', 50, 1, 'yes', 'yes', 'yes', 6500.00),
('hot_6241792ca49b4', 'double', 3, 2, 'yes', 'yes', 'yes', 5000.00),
('hot_6241792ca49b4', 'family', 5, 4, 'yes', 'yes', 'yes', 12000.00),
('hot_6241792ca49b4', 'massive', 3, 7, 'yes', 'yes', 'yes', 59000.00),
('hot_6241792ca49b4', 'single', 0, 1, 'no', 'no', 'no', 4000.00),
('hot_62417a738ac4f', 'double', 10, 2, 'yes', 'yes', 'yes', 12000.00),
('hot_62417a738ac4f', 'family', 5, 4, 'yes', 'yes', 'yes', 22500.00),
('hot_62417a738ac4f', 'massive', 4, 8, 'yes', 'yes', 'yes', 62000.00),
('hot_62417a738ac4f', 'single', 3, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62417c176453b', 'double', 20, 2, 'yes', 'yes', 'yes', 16000.00),
('hot_62417c176453b', 'family', 20, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_62417c176453b', 'massive', 8, 8, 'yes', 'yes', 'yes', 75000.00),
('hot_62417c176453b', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_62417f100cc30', 'double', 10, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_62417f100cc30', 'family', 20, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_62417f100cc30', 'massive', 13, 7, 'yes', 'yes', 'yes', 62000.00),
('hot_62417f100cc30', 'single', 10, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6241809f10332', 'double', 4, 2, 'yes', 'yes', 'yes', 16000.00),
('hot_6241809f10332', 'family', 4, 4, 'yes', 'yes', 'yes', 34000.00),
('hot_6241809f10332', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_6241809f10332', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_62418292463f1', 'double', 7, 2, 'yes', 'yes', 'yes', 7000.00),
('hot_62418292463f1', 'family', 9, 4, 'yes', 'yes', 'yes', 24000.00),
('hot_62418292463f1', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_62418292463f1', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_624183c77eecc', 'double', 12, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_624183c77eecc', 'family', 20, 4, 'yes', 'yes', 'yes', 27000.00),
('hot_624183c77eecc', 'massive', 8, 8, 'yes', 'yes', 'yes', 68000.00),
('hot_624183c77eecc', 'single', 10, 1, 'yes', 'yes', 'yes', 5800.00),
('hot_624184c32203a', 'double', 4, 2, 'yes', 'yes', 'yes', 5000.00),
('hot_624184c32203a', 'family', 0, 4, 'no', 'no', 'no', 0.00),
('hot_624184c32203a', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_624184c32203a', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_6241861b55005', 'double', 2, 2, 'yes', 'yes', 'yes', 8900.00),
('hot_6241861b55005', 'family', 3, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_6241861b55005', 'massive', 0, 0, 'no', 'no', 'no', 0.00),
('hot_6241861b55005', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_624187b94f391', 'double', 10, 2, 'yes', 'yes', 'yes', 9500.00),
('hot_624187b94f391', 'family', 15, 4, 'yes', 'yes', 'yes', 22500.00),
('hot_624187b94f391', 'massive', 5, 7, 'yes', 'yes', 'yes', 53400.00),
('hot_624187b94f391', 'single', 10, 1, 'yes', 'yes', 'yes', 5500.00),
('hot_6241896494918', 'double', 3, 2, 'yes', 'yes', 'yes', 15000.00),
('hot_6241896494918', 'family', 8, 4, 'yes', 'yes', 'yes', 30000.00),
('hot_6241896494918', 'massive', 4, 7, 'yes', 'yes', 'yes', 53400.00),
('hot_6241896494918', 'single', 3, 1, 'yes', 'yes', 'yes', 6000.00),
('hot_62418b3fcdab7', 'double', 5, 2, 'yes', 'yes', 'yes', 12000.00),
('hot_62418b3fcdab7', 'family', 5, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_62418b3fcdab7', 'massive', 5, 5, 'yes', 'yes', 'yes', 47000.00),
('hot_62418b3fcdab7', 'single', 0, 1, 'yes', 'yes', 'yes', 0.00),
('hot_62418d4db11c2', 'double', 3, 2, 'yes', 'yes', 'yes', 8400.00),
('hot_62418d4db11c2', 'family', 5, 4, 'yes', 'yes', 'yes', 33000.00),
('hot_62418d4db11c2', 'massive', 8, 7, 'yes', 'yes', 'yes', 54000.00),
('hot_62418d4db11c2', 'single', 0, 1, 'no', 'no', 'no', 0.00),
('hot_624193f17ed34', 'double', 4, 2, 'yes', 'yes', 'yes', 12000.00),
('hot_624193f17ed34', 'family', 4, 4, 'yes', 'yes', 'yes', 20000.00),
('hot_624193f17ed34', 'massive', 0, 5, 'no', 'no', 'no', 0.00),
('hot_624193f17ed34', 'single', 4, 1, 'yes', 'yes', 'yes', 5500.00);

-- --------------------------------------------------------

--
-- Table structure for table `sights`
--

CREATE TABLE `sights` (
  `destination_id` char(20) NOT NULL,
  `sight_id` char(20) NOT NULL,
  `sight` char(200) NOT NULL,
  `category` char(100) NOT NULL,
  `ticket_price` double(10,2) NOT NULL,
  `longitude` varchar(1000) NOT NULL,
  `latitude` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sights`
--

INSERT INTO `sights` (`destination_id`, `sight_id`, `sight`, `category`, `ticket_price`, `longitude`, `latitude`) VALUES
('des_623d76b09eac7', 'site_623d7b8267f82', 'Temple of Tooth Relic', 'Pilgrimage', 0.00, '', ''),
('des_623d76b09eac7', 'site_623d7baf5233c', 'Royal Botanic Garden', 'Leisure', 150.00, '', ''),
('des_623d76b09eac7', 'site_623d7be24c5cd', 'Udawatta Kele Sanctuary', 'Leisure', 200.00, '', ''),
('des_623d76b09eac7', 'site_623d7c08af250', 'National Museum Kandy', 'Cultural', 100.00, '', ''),
('des_623d76b09eac7', 'site_623d7c46572c3', 'Nelligala International Buddhist Center', 'Pilgrimage', 0.00, '', ''),
('des_623d772118e4b', 'site_623d7cf31b3de', 'Victoria Park', 'Leisure', 200.00, '', ''),
('des_623d772118e4b', 'site_623d7d6dae641', 'Lovers Leap Waterfall', 'Leisure', 0.00, '', ''),
('des_623d772118e4b', 'site_623d7d9ada32d', 'Moon Plains', 'Leisure', 0.00, '', ''),
('des_623d772118e4b', 'site_623d7f00354ef', 'Ambewela Farm', 'Leisure', 300.00, '', ''),
('des_623d772118e4b', 'site_623d7faa25348', 'Horton Plains National Park', 'Leisure', 150.00, '', ''),
('des_623d7584be4f5', 'site_6241c6e0d8325', 'Kumana National Park', 'Leisure', 2250.00, '6.653401297581098', '81.67065940797329'),
('des_623d7584be4f5', 'site_6241c6fe48ae6', 'Gal Oya National Park - The Crossing', 'Leisure', 3250.00, '7.212331381605359', '81.39874778687954'),
('des_623d7584be4f5', 'site_6241c73460964', 'Deegavapi Stupa', 'Pilgrimage', 0.00, '7.44420264124689', '81.67855583131313'),
('des_623d7584be4f5', 'site_6241c7767e0d9', 'Crocodile Rock', 'Leisure', 0.00, '7.370498276882408', '81.84918724000454'),
('des_623d758bdc8b1', 'site_6241c7fe972df', 'Mahamewna Uyana', 'Pilgrimage', 0.00, '8.317646500333142', '80.45429539010503'),
('des_623d758bdc8b1', 'site_6241c82ac808d', 'Mihintale', 'Pilgrimage', 0.00, '8.35112460693004', '80.5158805847168'),
('des_623d758bdc8b1', 'site_6241c8569ecdd', 'Elephant Pond', 'Pilgrimage', 0.00, '8.3144839673799', '80.42851768434048'),
('des_623d758bdc8b1', 'site_6241c8966019e', 'Archaeological Museum', 'Pilgrimage', 100.00, '8.312893069871691', '80.4106627288749'),
('des_623d758bdc8b1', 'site_6241c921c72bc', 'Thanthirimale', 'Pilgrimage', 0.00, '8.532150186828218', '80.49997000922625'),
('des_623d758bdc8b1', 'site_6241c97105881', 'Tissa Wewa', 'Pilgrimage', 0.00, '8.332436580387458', '80.3822347663734'),
('des_623d75926962a', 'site_6241c9c7a0851', 'Dunhinda Falls', 'Leisure', 200.00, '6.995715892169799', '81.05640784868051'),
('des_623d75926962a', 'site_6241ca0999920', '99 acres', 'Leisure', 0.00, '6.983970108489175', '81.06140663623808'),
('des_623d75926962a', 'site_6241cafc23fe5', 'Fox Hill', 'Leisure', 0.00, '6.991604426743512', '81.05990498073896'),
('des_623d75926962a', 'site_6241cb6eb212e', 'Narangala', 'Leisure', 0.00, '7.004194807637134', '81.08037133575993'),
('des_623d75926962a', 'site_6241cba9dfad5', 'Wewessa Ella Waterfall', '', 0.00, '7.024754982215693', '81.06036036110027'),
('des_623d75926962a', 'site_6241cbef86dcf', 'Nine Arch Bridge', 'Leisure', 0.00, '7.014006905380064', '81.08833495965034'),
('des_623d75997a31f', 'site_6241cc233a74f', 'Batticaloa Fort', 'Leisure', 0.00, '7.734281364625897', '81.70812350947357'),
('des_623d75997a31f', 'site_6241cc4c40a99', 'Batticaloa Lighthouse', 'Leisure', 0.00, '7.75484563739817', '81.68539881706238'),
('des_623d75a257b42', 'site_6241cec467ea0', 'Gangaramaya Temple', 'Pilgrimage', 0.00, '6.891485652495944', '79.85487443815904'),
('des_623d75997a31f', 'site_6241cf441e416', 'Batticaloa Museum', 'Pilgrimage', 0.00, '7.733020824804224', '81.68704480363314'),
('des_623d75997a31f', 'site_6241cf6d1a683', 'New Kallady Bridge', 'Leisure', 0.00, '7.735066759268613', '81.68438980013349'),
('des_623d75a257b42', 'site_6241cfc1467bd', 'Galle Face Green', 'Leisure', 0.00, '6.924089036258972', '79.8451071949055'),
('des_623d75a257b42', 'site_6241cfdf5114f', 'Viharamahadevi Park', 'Leisure', 0.00, '6.914496465700933', '79.86244872670153'),
('des_623d75a257b42', 'site_6241d21def37c', 'Museum', 'Cultural', 100.00, '6.9100327261550625', '79.8609146475792'),
('des_623d75a257b42', 'site_6241d47b52347', 'Planetarium', 'Cultural', 300.00, '6.9049488617472985', '79.86162300095883'),
('des_623d75a257b42', 'site_6241d50b6b978', 'Nelum Kuluna', 'Leisure', 0.00, '6.879289113027452', '79.86017559055522'),
('des_623d75a9c7247', 'site_6241d54dcacd0', 'Galle Dutch Fort', 'Leisure', 0.00, '6.029726402247618', '80.21500686910129'),
('des_623d75a9c7247', 'site_6241d5d4de2b1', 'National Maritime Museum', 'Leisure', 350.00, '6.041523134852195', '80.22385322773496'),
('des_623d75a9c7247', 'site_6241d60ed7709', 'Unawatuna Beach', 'Leisure', 0.00, '6.009715315049208', '80.24834632873535'),
('des_623d75a9c7247', 'site_6241d62dd3819', 'Historical Mansion Museum', 'Leisure', 0.00, '6.045012134385181', '80.21439200887832'),
('des_623d75a9c7247', 'site_6241d6c90ff69', 'Rumassala', 'Leisure', 0.00, '6.033493636405152', '80.21317183986261'),
('des_623d75a9c7247', 'site_6241d739ed7a6', 'Koggala Beach', 'Leisure', 0.00, '6.038302799785356', '80.2049748781919'),
('des_623d75a9c7247', 'site_6241d767ecc65', 'Martin Wickramasinghe Museum', 'Leisure', 500.00, '5.989997034680943', '80.32791137695312'),
('des_623d75bade151', 'site_6241d7ba9268d', 'Kelaniya Raja Maha Viharaya', 'Pilgrimage', 0.00, '6.951265249256841', '79.91863730656614'),
('des_623d75bade151', 'site_6241d8e2f356b', 'Water World', 'Leisure', 2500.00, '6.968779022818361', '79.92442896274626'),
('des_623d75bade151', 'site_6241d933bfedf', 'Thewaththa Church', 'Pilgrimage', 0.00, '7.033771960774398', '79.93463516235352'),
('des_623d75bade151', 'site_6241d9a99e8e4', 'Guruge Nature Park', 'Leisure', 1500.00, '7.066794667255971', '79.90153714522684'),
('des_623d75bade151', 'site_6241da5d996b1', 'Henarathgoda Botanical Garden', 'Leisure', 500.00, '7.081225487432436', '80.00229953254741'),
('des_623d75bade151', 'site_6241da87bb1d0', 'Muthurajawala', 'Leisure', 0.00, '7.071981802039229', '79.87427422682657'),
('des_623d75bade151', 'site_6241db360b836', 'Pamunugama Village and Safari', 'Leisure', 0.00, '7.06595382089911', '79.85265270161327'),
('des_623d75c420f51', 'site_6241db7fb71e9', 'Yala National Park', 'Leisure', 3500.00, '6.323488217707519', '81.38397216796875'),
('des_623d75c420f51', 'site_6241dbcbde9aa', 'Hambantota Beach', 'Leisure', 0.00, '6.128095254760139', '81.12716674804688'),
('des_623d75c420f51', 'site_6241dc052f3d0', 'Bundala national park', 'Leisure', 3500.00, '6.169417144822354', '81.21049453685251'),
('des_623d75c420f51', 'site_6241dc2a74b6a', 'Kumana National Park', 'Leisure', 3000.00, '6.621508700071246', '81.68327551403513'),
('des_623d75c420f51', 'site_6241dc54dbbb0', 'Bundala Safari', 'Leisure', 5000.00, '6.188012915424486', '81.25957458809859'),
('des_623d75c420f51', 'site_6241dc6ccba32', 'Lunugamwehara National Park', 'Leisure', 3000.00, '6.4804444089717546', '81.21525597660332'),
('des_623d75c420f51', 'site_6241dc99127b9', 'Tele Village', 'Leisure', 500.00, '6.218517542229749', '81.31122358352545'),
('des_623d769ec54e9', 'site_6241dcd5d6448', 'Nallur Kandaswamy Kovil', 'Cultural', 0.00, '9.690170154799421', '80.22012769359718'),
('des_623d769ec54e9', 'site_6241dd090a916', 'Fort Jaffna', 'Leisure', 0.00, '9.66016442514025', '80.0100453617459'),
('des_623d769ec54e9', 'site_6241dd2f27c60', 'Jaffna Archeological Museum', 'Cultural', 350.00, '9.667061419838692', '80.02141163441284'),
('des_623d769ec54e9', 'site_6241de000e864', 'Sankaliyan Raj Place', 'Leisure', 200.00, '9.76535193289351', '79.9909860949953'),
('des_623d769ec54e9', 'site_6241de6f4b6bc', 'Jaffna City Ruins', 'Leisure', 0.00, '9.732110572355944', '80.06748088559237'),
('des_623d769ec54e9', 'site_6241deb63a04d', 'Elephant pass', 'Leisure', 0.00, '9.77777882503462', '79.94753886662956'),
('des_623d769ec54e9', 'site_6241df5c0abfc', 'Nagadeepa Boart Ride', 'Leisure', 500.00, '9.611588689691992', '79.77101783946355'),
('des_623d76a77172a', 'site_6241dfc49f535', 'Richmond Castle', 'Leisure', 300.00, '6.560762674647157', '79.97081638106467'),
('des_623d76a77172a', 'site_6241e043ca5dc', 'Fa Hien Caves', 'Cultural', 0.00, '6.564967054304252', '80.11683769099213'),
('des_623d76a77172a', 'site_6241e08e9a7a7', 'Ranjiths Carving and Batik Museum', 'Leisure', 250.00, '6.581398608447888', '79.99546658633996'),
('des_623d76a77172a', 'site_6241e0b50dc08', 'Bodhinagala Forest Hermitage', 'Leisure', 0.00, '6.58292825791119', '80.01343845662932'),
('des_623d76a77172a', 'site_6241e0fe9fb67', 'West Coast Tattoo Studio', 'Leisure', 2500.00, '6.612036414034272', '80.05154930055141'),
('des_623d76b09eac7', 'site_6241e1570d18c', 'Weerapuranappu Garden', 'Leisure', 500.00, '7.265470050668317', '80.63760684960577'),
('des_623d76b8994ff', 'site_6241e206a143a', 'Elephant Orphanage', 'Leisure', 500.00, '7.300656208542345', '80.38734516690155'),
('des_623d76b8994ff', 'site_6241e24b576ea', 'Millennium Elephant Foundation', 'Leisure', 500.00, '7.275122056983866', '80.38361549377441'),
('des_623d76b8994ff', 'site_6241e29d248de', 'Bathalegala', 'Leisure', 0.00, '7.184916782122196', '80.43455148559136'),
('des_623d76b8994ff', 'site_6241e30e0e6c4', 'Foresthill Hideout', 'Leisure', 0.00, '7.248030319261194', '80.38681671344703'),
('des_623d76b8994ff', 'site_6241e37c9bac9', 'Kivulpana', 'Leisure', 200.00, '7.271343364531334', '80.40559837654808'),
('des_623d76b8994ff', 'site_6241e3abba45b', 'Gale Pansala', 'Pilgrimage', 0.00, '7.215358206791587', '80.37902148544266'),
('des_623d76c09a3f2', 'site_6241e403ae80d', 'Chundikulam National Park', 'Leisure', 2500.00, '9.480930805685169', '80.49504634800627'),
('des_623d76c09a3f2', 'site_6241e44597aaf', 'Ruins of Poonakary Fort', 'Leisure', 0.00, '9.377276815197304', '80.3453546658429'),
('des_623d76c09a3f2', 'site_6241e48b0084c', 'Sangupiddi Bridge', 'Leisure', 0.00, '9.386794274693067', '80.38333987835337'),
('des_623d76c09a3f2', 'site_6241e4c22b45e', 'Fort Beschuter', 'Leisure', 0.00, '9.380131694937468', '80.30286155641079'),
('des_623d76c09a3f2', 'site_6241e4e6aedf5', 'Kilinochchi War Memorial', 'Cultural', 0.00, '9.391021789956687', '80.36926274957611'),
('des_623d76c09a3f2', 'site_6241e50fcf21a', 'Mandaitivu', 'Leisure', 0.00, '9.332630246383918', '80.23407638500557'),
('des_623d76cd2c14d', 'site_6241e55824be7', 'Athugala Rock', 'Leisure', 0.00, '7.487069390861869', '80.364990234375'),
('des_623d76cd2c14d', 'site_6241e64d8e174', 'Yakdessagala', 'Leisure', 0.00, '7.483251443080768', '80.37575222950166'),
('des_623d76cd2c14d', 'site_6241e666c2dfc', 'Maraluwawa Rajamaha Viharaya', 'Pilgrimage', 0.00, '7.44816237853989', '80.40100062810136'),
('des_623d76cd2c14d', 'site_6241e6958a609', 'Saragama Lake', 'Leisure', 0.00, '7.494450291327021', '80.36443888330923'),
('des_623d76cd2c14d', 'site_6241e6e27f18d', 'Ridi Viharaya', 'Pilgrimage', 0.00, '7.447922132647892', '80.40687561035156'),
('des_623d76d94f3d3', 'site_6241e724356dd', 'Mannar Fort', 'Leisure', 0.00, '8.975324278832904', '79.91709760152219'),
('des_623d76d94f3d3', 'site_6241e749e341d', 'Baobab Tree Pallimunai', 'Leisure', 0.00, '8.980553952703426', '79.8929156755402'),
('des_623d76d94f3d3', 'site_6241e76d7f2b3', 'Keeri Beach', 'Leisure', 0.00, '8.982714035030561', '79.87154711354837'),
('des_623d76d94f3d3', 'site_6241e7921c3ea', 'Mannar Bird Sanctuary', 'Leisure', 0.00, '8.930776403375189', '79.93042945861816'),
('des_623d76d94f3d3', 'site_6241e7b5a028a', 'Mannar bridge', 'Leisure', 0.00, '8.940490366346449', '79.91693332914537'),
('des_623d76fc1832f', 'site_6241e7f3936e0', 'Sri Muthumari Amman Kovil', 'Pilgrimage', 0.00, '7.477368005950124', '80.62385559082031'),
('des_623d76fc1832f', 'site_6241e81b36e24', 'Aluviharaya Rock Cave Temple', 'Pilgrimage', 0.00, '7.4675210560144025', '80.64045621354708'),
('des_623d76fc1832f', 'site_6241e8544d149', 'Watagoda Ella Waterfall', 'Leisure', 0.00, '7.457716791395459', '80.60570138425383'),
('des_623d76fc1832f', 'site_6241e885c828a', 'Brandigala', 'Leisure', 0.00, '7.488941563108456', '80.58815002441406'),
('des_623d76fc1832f', 'site_6241e8b66455c', 'Kiwla Temple', 'Pilgrimage', 0.00, '7.468103636568184', '80.6407622624149'),
('des_623d76fc1832f', 'site_6241e8d64de4a', 'Padiwita Ambalama', 'Leisure', 0.00, '7.4681555141415625', '80.62688030961642'),
('des_623d76fc1832f', 'site_6241e921ec25f', 'Wasgamuwa National Park', 'Leisure', 3500.00, '7.461250188025386', '80.63340822105059'),
('des_623d7703f147b', 'site_6241e967f2951', 'Polhena Beach', 'Leisure', 0.00, '5.942352730140141', '80.54949761859056'),
('des_623d7703f147b', 'site_6241e99ca8a40', 'Matara Fort', 'Leisure', 0.00, '5.944275439569216', '80.54827735488708'),
('des_623d7703f147b', 'site_6241e9d9b40b5', 'Parewi Duwa Temple', 'Pilgrimage', 0.00, '5.9413865166082065', '80.54925262928009'),
('des_623d7703f147b', 'site_6241ea05a3e18', 'Point Dondra', 'Leisure', 0.00, '5.918715077407458', '80.59115409851074'),
('des_623d7703f147b', 'site_6241ea400b160', 'Seethagala Natural Seawater Pool', 'Leisure', 0.00, '5.9455856193846115', '80.633704662323'),
('des_623d7703f147b', 'site_6241eae404142', 'Wijesekara Ground', 'Leisure', 0.00, '5.9444182119194435', '80.54751088324389'),
('des_623d770b5fc3a', 'site_6241eb54421aa', 'Buduruwagala Raja Maha Viharaya', 'Pilgrimage', 0.00, '6.889708686476159', '81.34391210900704'),
('des_623d770b5fc3a', 'site_6241eb7a7282d', 'Ellewala Waterfall', 'Leisure', 0.00, '6.89264693059447', '81.34568761073405'),
('des_623d770b5fc3a', 'site_6241eb9f9bb24', 'Udawalawe National Park Tours', 'Leisure', 4000.00, '6.898696283033528', '81.35188423097134'),
('des_623d770b5fc3a', 'site_6241ebd52cc68', 'Yala National Park', 'Leisure', 3500.00, '6.551341618320323', '81.60861034845132'),
('des_623d770b5fc3a', 'site_6241ec41e7afd', 'Udawalawa Dam', 'Leisure', 0.00, '6.851892095803658', '81.34906479756243'),
('des_623d770b5fc3a', 'site_6241ec75d2f15', 'Pareiyan Ella Falls', 'Leisure', 0.00, '6.892437819673161', '81.35108604411197'),
('des_623d771840913', 'site_6241ecc665950', 'Chundikulam National Park', 'Leisure', 3000.00, '9.243152194677599', '80.78997656674628'),
('des_623d771840913', 'site_6241ed2996a0c', 'Kokkilai Lagoon', 'Leisure', 0.00, '9.24223375308727', '80.80812295462393'),
('des_623d76cd2c14d', 'site_6241ed5ad8f76', 'Museum', 'Leisure', 150.00, '7.483733879576069', '80.36608878419439'),
('des_623d76d94f3d3', 'site_6241eda563cee', 'Leisure Park', 'Leisure', 2500.00, '8.934435077086706', '79.94578974317812'),
('des_623d7703f147b', 'site_6241ee040db78', 'Museum', 'Leisure', 500.00, '5.944239706806301', '80.5464668603133'),
('des_623d771840913', 'site_6241ee4a50eda', 'Nay Aru', 'Leisure', 0.00, '9.272152652841537', '80.81573184809739'),
('des_623d771840913', 'site_6241ee7176ce6', 'Kokkilai Sanctuary', 'Leisure', 100.00, '9.263370887525184', '80.81701441883939'),
('des_623d771840913', 'site_6241ee8dbe81c', 'Iranamadu Tank', 'Leisure', 0.00, '9.281245915828832', '80.81033818322416'),
('des_623d771840913', 'site_6241eeace73f1', 'Puthukkudiyiruppu War Museum', 'Leisure', 350.00, '9.281965475154212', '80.8132542608196'),
('des_623d772118e4b', 'site_6241eeefbbb0f', 'Lake Gregory', 'Leisure', 0.00, '6.955592142371487', '80.78102195804138'),
('des_623d772118e4b', 'site_6241ef1aed62b', 'Hakgala Botanical Gardens', 'Leisure', 350.00, '6.947557034946787', '80.83053588867188'),
('des_623d772a4a610', 'site_6241ef5a47943', 'Minneriya National Park', 'Leisure', 2500.00, '7.939965201481858', '81.0114844699521'),
('des_623d772a4a610', 'site_6241ef8a31798', 'Polonnaruwa Ancient City', 'Pilgrimage', 0.00, '7.934515773943791', '81.03511674765872'),
('des_623d772a4a610', 'site_6241efa38e64c', 'Angammedilla National Park', 'Leisure', 200.00, '7.944749095817889', '81.02837911572547'),
('des_623d772a4a610', 'site_6241effa1592a', 'Dimbulagala Raja Maha Viharaya', 'Pilgrimage', 0.00, '7.934019780966517', '81.01525665320298'),
('des_623d772a4a610', 'site_6241f0238c979', 'Deepa Uyana', 'Cultural', 0.00, '7.941413028796301', '81.02753222828596'),
('des_623d772a4a610', 'site_6241f048c418e', 'Wildlife Museum', 'Leisure', 400.00, '7.949202781159765', '81.02658592164516'),
('des_623d772a4a610', 'site_6241f05ca5742', 'Rankoth Vehera', 'Pilgrimage', 0.00, '7.948263439194989', '81.0272763436622'),
('des_623d77335d82d', 'site_6241f08f05d73', 'Aiyanar ancient temple', 'Pilgrimage', 0.00, '8.052812818437538', '79.84354235201138'),
('des_623d77335d82d', 'site_6241f0c7423f1', 'Puttalam Beach Park', 'Leisure', 500.00, '8.058061146201409', '79.80648291666921'),
('des_623d77335d82d', 'site_6241f0fb320e1', 'Mee Oya', 'Leisure', 0.00, '8.079820309751772', '79.90524879396476'),
('des_623d77335d82d', 'site_6241f124e3305', 'Blue Bird Park', 'Leisure', 400.00, '8.063988646996462', '79.85189437866211'),
('des_623d77335d82d', 'site_6241f152e0628', 'Farm', 'Leisure', 400.00, '7.857614753902957', '79.78518121539948'),
('des_623d77335d82d', 'site_6241f209555d8', 'Salt Factories', 'Leisure', 0.00, '8.064328574839303', '79.8222827911377'),
('des_623d773e18515', 'site_6241f23e3237d', 'Ratnapura National Museum', 'Leisure', 500.00, '6.683627116583609', '80.39990893688056'),
('des_623d773e18515', 'site_6241f27791044', 'Katugasalla Waterfall', 'Leisure', 0.00, '6.704686165657379', '80.40198683311156'),
('des_623d773e18515', 'site_6241f2a04540e', 'Galpotha Waterfall', '', 100.00, '6.630847128696995', '80.3536605834961'),
('des_623d773e18515', 'site_6241f2da587ab', 'Rajanawa Waterfall', 'Leisure', 0.00, '6.694375585163502', '80.3885870535328'),
('des_623d773e18515', 'site_6241f313b6a2d', 'Discovery Park', 'Leisure', 1000.00, '6.668663681526367', '80.42847302798853'),
('des_623d773e18515', 'site_6241f3414e89c', 'Bateeriya Caves', 'Cultural', 150.00, '6.6212130450228965', '80.38533210754395'),
('des_623d773e18515', 'site_6241f36b727c1', 'Kodippili Mountain', 'Leisure', 0.00, '6.538935869496668', '80.32485756780477'),
('des_623d7746448b6', 'site_6241f3dcc14aa', 'Martime and Naval Museum', 'Leisure', 350.00, '8.569818225273696', '81.23737335205078'),
('des_623d7746448b6', 'site_6241f3f480f0b', 'Town Beach', 'Leisure', 0.00, '8.592011706963874', '81.22527122497559'),
('des_623d7746448b6', 'site_6241f408c8920', 'Sri Thirukoneswaram Kovil', 'Pilgrimage', 0.00, '8.582226737840799', '81.21399060521848'),
('des_623d7746448b6', 'site_6241f42aa48dc', 'Trincomalee War Cemetery', 'Cultural', 0.00, '8.599692131534031', '81.18141174316406'),
('des_623d7746448b6', 'site_6241f447c9232', 'Kanniya Hot Springs', 'Leisure', 200.00, '8.604614310726706', '81.17128372192383'),
('des_623d7746448b6', 'site_6241f46027701', 'Nilaveli Beach', 'Leisure', 0.00, '8.698628147463072', '81.19189299050774'),
('des_623d7746448b6', 'site_6241f481aa091', 'Velgam Vehera', 'Pilgrimage', 0.00, '8.645686549247175', '81.17094039916992'),
('des_623d774e1fc92', 'site_6241f4b5643be', 'Vavuniya Archaeological Museum', '', 400.00, '8.761573328177278', '80.52347241854066'),
('des_623d774e1fc92', 'site_6241f4d60dddc', 'Kandasamy Kovil', 'Pilgrimage', 0.00, '8.735852424624559', '80.51701680520581'),
('des_623d774e1fc92', 'site_6241f50723e0e', 'Vavuniya Water Park', 'Leisure', 2000.00, '8.75977986953484', '80.50062089480241'),
('des_623d774e1fc92', 'site_6241f526e38fe', 'Avusatha pitiya bridge', 'Cultural', 0.00, '8.721731815849873', '80.50502467632465'),
('des_623d774e1fc92', 'site_6241f54217b8f', 'Peraru Kulam', 'Leisure', 0.00, '8.752254455386664', '80.49969981705632'),
('des_623d774e1fc92', 'site_6241f55c6dbf5', 'Maadashamy Kovil', 'Pilgrimage', 0.00, '8.75038255562677', '80.5001663097956');

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

CREATE TABLE `travelers` (
  `travelerID` char(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `contact1` int(10) NOT NULL,
  `contact2` int(10) DEFAULT NULL,
  `otp` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travelers`
--

INSERT INTO `travelers` (`travelerID`, `name`, `address_line1`, `address_line2`, `city`, `email`, `password`, `contact1`, `contact2`, `otp`) VALUES
('tr_62418eb228478', 'Avantha Irushan', 'No.23/14', 'Ganemulla', 'Gampaha', 'awanthairushan@gmail.com', '$2y$10$qtGRAr6BhsrLUcnPLqFbeuoD78DSwIGgERDN7VPzjZJZPRkWw4qdi', 111234567, 704567893, 5849),
('tr_62428f9a3700e', 'Anood rasdeen', '45', 'wadurawa', 'veyangoda', 'anoodrasdeen@gmail.com', '$2y$10$emgWheCDwaMm/iOgj1rUOOUkjTPJnTV0GjWIXKMFsqdewCWe0PEJu', 752645871, 715686954, 6157),
('tr_6242904e48117', 'gihan Shirantha', '45/5', 'naiwala', 'gampaha', 'gihanshirathna@gmail.com', '$2y$10$AYSZQxrKkfnRbiJOqAANjOAN36l7Grq6VkFHi80zhA1H/Sr8usmpm', 332256842, 715623845, 3675);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` char(20) NOT NULL,
  `traveler_id` char(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` char(20) NOT NULL,
  `category` char(20) NOT NULL,
  `destination_id` char(20) NOT NULL,
  `destination_id2` char(20) NOT NULL,
  `destination_id3` char(20) NOT NULL,
  `sight_id` char(200) NOT NULL,
  `sight_id2` char(200) NOT NULL,
  `sight_id3` char(200) NOT NULL,
  `no_of_people` int(5) NOT NULL,
  `mileage` double(10,2) NOT NULL,
  `total_budget` double(10,2) NOT NULL,
  `location_lat` varchar(1000) NOT NULL,
  `location_long` varchar(1000) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `traveler_id`, `start_date`, `end_date`, `no_of_days`, `category`, `destination_id`, `destination_id2`, `destination_id3`, `sight_id`, `sight_id2`, `sight_id3`, `no_of_people`, `mileage`, `total_budget`, `location_lat`, `location_long`, `status`) VALUES
('trip_6241f8431a1da', 'tr_62418eb228478', '2022-04-04', '2022-04-05', '1', 'cultural', 'Kandy', 'Anuradhapura', '-', 'site_623d7b8267f82,site_623d7baf5233c,site_623d7be24c5cd,site_623d7c08af250,site_623d7c46572c3,', 'site_6241c7fe972df,site_6241c82ac808d,site_6241c8569ecdd,site_6241c8966019e,site_6241c921c72bc,', '-', 5, 211.87, 2750.00, '6.902206909028085', '79.86114263534546', 'Paid'),
('trip_624201677d8c8', 'tr_62418eb228478', '2022-04-04', '2022-04-04', '0', 'cultural', 'Kandy', '-', '-', 'site_623d7baf5233c,site_623d7be24c5cd,', '-', '-', 3, 95.37, 1050.00, '6.902206909028085', '79.86114263534546', 'Paid'),
('trip_62420918c925c', 'tr_62418eb228478', '2022-04-05', '2022-04-06', '1', 'cultural', 'Galle', 'Mannar', '-', '', '', '-', 7, 432.96, 0.00, '6.902206909028085', '79.86114263534546', 'Pending'),
('trip_62426fe8201dd', 'tr_62418eb228478', '2022-04-05', '2022-04-06', '1', 'cultural', 'Kegalle', 'Matara', '-', '', '', '-', 6, 212.15, 0.00, '6.902206909028085', '79.86114263534546', 'Pending'),
('trip_62427670e2b24', 'tr_62418eb228478', '2022-04-05', '2022-04-07', '2', 'cultural', 'Galle', 'Matara', 'Badulla', 'site_6241d54dcacd0,site_6241d5d4de2b1,site_6241d60ed7709,site_6241d62dd3819,site_6241d6c90ff69,', 'site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea400b160,site_6241eae404142,site_6241ee040db78,', 'site_6241c9c7a0851,site_6241ca0999920,site_6241cafc23fe5,site_6241cb6eb212e,site_6241cba9dfad5,', 4, 232.69, 4200.00, '6.5858083058247585', '79.96139287948608', 'Completed'),
('trip_62428e8608016', 'tr_62418eb228478', '2022-04-08', '2022-04-09', '1', 'pilgrimage', 'Matara', 'Hambantota', '-', 'site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea05a3e18,', 'site_6241dbcbde9aa,site_6241dc052f3d0,site_6241dc2a74b6a,', '-', 4, 181.50, 26000.00, '6.858578074329379', '80.03692388534546', 'Saved'),
('trip_62428faea288a', 'tr_62428f9a3700e', '2022-04-06', '2022-04-07', '1', 'pilgrimage', 'Matara', 'Mannar', '-', 'site_6241e9d9b40b5,site_6241ea05a3e18,', 'site_6241e76d7f2b3,site_6241e7921c3ea,', '-', 2, 377.42, 0.00, '6.028899406534407', '80.25665044784546', 'Saved'),
('trip_62429066a5277', 'tr_6242904e48117', '2022-04-08', '2022-04-09', '1', 'pilgrimage', 'Matara', 'Colombo', '-', 'site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea05a3e18,', 'site_6241cfc1467bd,site_6241cfdf5114f,site_6241d21def37c,', '-', 1, 216.80, 100.00, '6.203679986217949', '81.26189947128296', 'Saved'),
('trip_624290bbb2357', 'tr_62428f9a3700e', '2022-04-08', '2022-04-09', '1', 'leisure', 'Matara', 'Kandy', '-', 'site_6241e9d9b40b5,site_6241ea05a3e18,', 'site_623d7be24c5cd,site_623d7c08af250,', '-', 2, 171.46, 600.00, '6.001584811837459', '80.35552740097046', 'Saved'),
('trip_62429b8bd1efe', 'tr_62428f9a3700e', '2022-04-06', '2022-04-07', '1', 'leisure', 'Matara', 'Monaragala', '-', 'site_6241e967f2951,site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea05a3e18,site_6241ea400b160,', 'site_6241eb54421aa,site_6241eb7a7282d,site_6241eb9f9bb24,site_6241ebd52cc68,site_6241ec41e7afd,', '-', 4, 188.50, 30000.00, '6.240980689986327', '80.16412125101758', 'Saved'),
('trip_6242a09f4eb79', 'tr_62418eb228478', '2022-04-08', '2022-04-10', '2', 'leisure', 'Galle', 'Matara', 'Badulla', 'site_6241d54dcacd0,site_6241d5d4de2b1,site_6241d6c90ff69,', 'site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea05a3e18,site_6241ea400b160,site_6241eae404142,', 'site_6241c9c7a0851,site_6241ca0999920,site_6241cafc23fe5,', 6, 228.30, 3300.00, '6.552137556132113', '79.98284800961413', 'Paid'),
('trip_6242abf09d06b', 'tr_62418eb228478', '2022-04-08', '2022-04-10', '2', 'pilgrimage', 'Galle', 'Matara', 'Badulla', 'site_6241d54dcacd0,site_6241d5d4de2b1,site_6241d60ed7709,site_6241d62dd3819,', 'site_6241e99ca8a40,site_6241e9d9b40b5,site_6241ea05a3e18,', 'site_6241ca0999920,site_6241cafc23fe5,site_6241cb6eb212e,', 6, 234.70, 2100.00, '6.618548718767501', '79.99297857284546', 'Saved');

-- --------------------------------------------------------

--
-- Table structure for table `trip_home`
--

CREATE TABLE `trip_home` (
  `trip_id` char(20) NOT NULL,
  `no_of_people` int(5) NOT NULL,
  `traveler_id` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trip_hotels`
--

CREATE TABLE `trip_hotels` (
  `hotelId` char(20) CHARACTER SET utf8 NOT NULL,
  `trip_id` char(20) CHARACTER SET utf8 NOT NULL,
  `traveler_id` char(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `day` char(20) CHARACTER SET utf8 NOT NULL,
  `single_count` int(10) NOT NULL,
  `double_count` int(10) NOT NULL,
  `family_count` int(10) NOT NULL,
  `massive_count` int(10) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_hotels`
--

INSERT INTO `trip_hotels` (`hotelId`, `trip_id`, `traveler_id`, `date`, `day`, `single_count`, `double_count`, `family_count`, `massive_count`, `price`) VALUES
('hot_623ffee359a6d', 'trip_6241f8431a1da', 'tr_62418eb228478', '2022-03-29', 'first', 0, 0, 2, 0, 14000.00),
('hot_623ffee359a6d', 'trip_62427670e2b24', 'tr_62418eb228478', '2022-03-29', 'second', 3, 0, 0, 0, 30000.00),
('hot_624054b25cddf', 'trip_62427670e2b24', 'tr_62418eb228478', '2022-04-05', 'first', 0, 2, 0, 0, 30000.00),
('hot_623ff824b0ae5', 'trip_62428e8608016', 'tr_62418eb228478', '2022-04-08', 'first', 0, 0, 1, 0, 34000.00),
('hot_623ffee359a6d', 'trip_62428faea288a', 'tr_62428f9a3700e', '2022-04-06', 'first', 0, 1, 0, 0, 20000.00),
('hot_623ffee359a6d', 'trip_62429066a5277', 'tr_6242904e48117', '2022-04-08', 'first', 0, 0, 1, 0, 30000.00),
('hot_623ffee359a6d', 'trip_624290bbb2357', 'tr_62428f9a3700e', '2022-04-08', 'first', 1, 0, 0, 0, 10000.00),
('hot_623ffee359a6d', 'trip_62429b8bd1efe', 'tr_62428f9a3700e', '2022-03-29', 'first', 0, 2, 0, 0, 40000.00),
('hot_623ffee359a6d', 'trip_6242a09f4eb79', 'tr_62418eb228478', '2022-04-09', 'second', 0, 1, 1, 0, 50000.00),
('hot_624050bf2d652', 'trip_6242a09f4eb79', 'tr_62418eb228478', '2022-04-08', 'first', 0, 1, 1, 0, 20000.00),
('hot_623ffee359a6d', 'trip_6242abf09d06b', 'tr_62418eb228478', '2022-04-09', 'second', 0, 1, 1, 0, 50000.00),
('hot_624054b25cddf', 'trip_6242abf09d06b', 'tr_62418eb228478', '2022-04-08', 'first', 0, 1, 1, 0, 39000.00);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` char(20) NOT NULL,
  `vehicle_no` char(8) NOT NULL,
  `type` char(20) NOT NULL,
  `vehicle_model` char(200) NOT NULL,
  `city` char(50) NOT NULL,
  `owner_id` varchar(20) NOT NULL,
  `price_for_1km` double(10,2) NOT NULL,
  `price_for_day` double(10,2) NOT NULL,
  `driver_type` char(20) NOT NULL,
  `driver_charge` double(10,2) DEFAULT NULL,
  `ac` char(20) NOT NULL,
  `no_of_passengers` int(5) NOT NULL,
  `vehicle_image` longtext NOT NULL,
  `driver_name` char(200) DEFAULT NULL,
  `driver_contact1` int(10) DEFAULT NULL,
  `driver_contact2` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_no`, `type`, `vehicle_model`, `city`, `owner_id`, `price_for_1km`, `price_for_day`, `driver_type`, `driver_charge`, `ac`, `no_of_passengers`, `vehicle_image`, `driver_name`, `driver_contact1`, `driver_contact2`) VALUES
('veh_623ff4329728e', 'CAE6784', '', 'Toyota Axio WXB', 'All Sri Lanka', 'own_623ff432972b6', 60.00, 2500.00, 'with-driver', 1400.00, 'yes', 4, '623ff432a6d270.71262604.jpg', 'Mr.Janith Warnakulasooriya', 725645678, 795432589),
('veh_623feef24981f', 'CAE6789', 'car', 'Suzuki Alto', 'Matara', 'own_623feef249822', 0.00, 0.00, 'without driver', 0.00, 'yes', 5, '623feef25855d2.28086963.jpg', '', 0, 0),
('veh_623ff003e7724', 'CAG 3774', 'car', 'Nissan N16 Sunny', 'All Sri Lanka', 'own_623ff003e7726', 50.00, 1000.00, 'with-driver', 1000.00, 'yes', 4, '623ff00403b767.57437163.jpg', 'Mr.Saman Bandara', 705645356, 112432180),
('veh_62427ffbb1a5e', 'CBB-1562', 'suv', 'Honda CR-V', 'All Sri Lanka', 'own_623ff0de195fe', 70.00, 2700.00, 'with-driver', 0.00, 'yes', 6, '62427ffbb1a6d9.14077131.jpg', '', 0, 0),
('veh_62427eaf457c9', 'CBB-4578', 'van', 'Toyota KDH', 'All Sri Lanka', 'own_623ff0de195fe', 80.00, 1500.00, 'with driver', 1300.00, 'yes', 6, '62427eaf457d58.11885637.jpg', 'Jayantha jayawikrama', 752364580, 715638526),
('veh_623ff1f1669c0', 'GA0127', 'van', 'Toyota CR27', 'Monaragala', 'own_623ff1f1669c2', 0.00, 0.00, 'with driver', 0.00, 'yes', 9, '623ff1f1751385.40077196.jpg', 'Mr. Ajith Perera', 775645321, 112432180),
('veh_623fedca82e10', 'KI8960', 'car', 'Toyota Passo', 'Gampaha', 'own_623fedca82e11', 0.00, 0.00, 'with driver', 0.00, 'yes', 4, '623fedca924137.90585416.jpg', 'Mr.Anura Bandara', 775645321, 765432189),
('veh_623ff320c177a', 'LE 4509', 'bus', 'Mitsubishi Rosa', 'Kalutara', 'own_623ff320c177c', 0.00, 0.00, 'with driver', 0.00, 'yes', 15, '623ff320cfff27.64755605.jpeg', 'Mr. Bandara', 715643699, 795432589);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_owners`
--

CREATE TABLE `vehicle_owners` (
  `owner_id` varchar(20) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `contact1` int(10) NOT NULL,
  `contact2` int(10) NOT NULL,
  `otp` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_owners`
--

INSERT INTO `vehicle_owners` (`owner_id`, `owner_name`, `email`, `password`, `contact1`, `contact2`, `otp`) VALUES
('own_623fedca82e11', 'Nishantha Ayodana', 'nishanthaayodana@gmail.com', '$2y$10$bG4kp97oluLlGbJhnd7CV.eRt4ueHBBUdVUTICKNamcnhMEwy6Zza', 704567893, 111234567, 2795),
('own_623feef249822', 'Mr. Rasika Sanjeewa', 'rasikasanjeewa@gmail.com', '$2y$10$tF8uwgG2eE3AVHhOQQwDDOIzCdbPPom7GS2DhsiCzioHXCp/puc6G', 711234567, 772360927, 1483),
('own_623ff003e7726', 'Mr. Lal Mohreen', 'lalmohreen@gmail.com', '$2y$10$I8viswIL1KD8bC/azIBl..AYPBNfwgJkXloSHA46jsLO6/tddS5GS', 704567893, 111234567, 3285),
('own_623ff0de195fe', 'Mr.Kamal Gunathilaka', 'kamalgunathilaka@gmail.com', '$2y$10$.l7PVEXYXL0MGOYgHerxGeBMtb6Xq91odLVcHZ7a9wrBEL5hUnoUG', 704567893, 772360927, 5257),
('own_623ff1f1669c2', 'Mr. Suranga Athukorala', 'surangaathukorala@gmail.com', '$2y$10$K1fzntYs.DKZpzouwd9DGe6Q6fBGXyAjtscNubdHCfDHrI2UJFAzK', 777890334, 704898942, 7320),
('own_623ff320c177c', 'Mr. Manjula Jayasinghe', 'manjulajayasinghe@gmail.com', '$2y$10$tL1XDwfwlVhC8YMOlxMHI.RcLcifnTCBvL4VDWgI6hygF2nqWbEJa', 776357565, 706357540, 7197),
('own_623ff432972b6', 'Avantha Irushan', 'avanthairushan@gmail.com', '$2y$10$8aB9smCfYKQcw6ys2VbLp.ljbkGYBPxIWCfBssjOtqsjYrFzWlojm', 703451289, 112906790, 4585);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `chosen_sights`
--
ALTER TABLE `chosen_sights`
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `sigh_id` (`sight_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `completed_trips`
--
ALTER TABLE `completed_trips`
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `hotel_id1` (`hotel_id1`),
  ADD KEY `hotel_id2` (`hotel_id2`),
  ADD KEY `hotel_id3` (`hotel_id3`),
  ADD KEY `sight_id` (`sight_id`),
  ADD KEY `traveler_id` (`traveler_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `deleted_accounts`
--
ALTER TABLE `deleted_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `hotel_availability`
--
ALTER TABLE `hotel_availability`
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`imageID`,`hotelID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`hotelID`,`room_type`);

--
-- Indexes for table `sights`
--
ALTER TABLE `sights`
  ADD PRIMARY KEY (`sight_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `travelers`
--
ALTER TABLE `travelers`
  ADD PRIMARY KEY (`travelerID`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `sight_id` (`sight_id`),
  ADD KEY `traveler_id` (`traveler_id`);

--
-- Indexes for table `trip_home`
--
ALTER TABLE `trip_home`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `trip_hotels`
--
ALTER TABLE `trip_hotels`
  ADD PRIMARY KEY (`trip_id`,`hotelId`) USING BTREE,
  ADD KEY `trip_hotels_ibfk_3` (`traveler_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_no`),
  ADD UNIQUE KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `vehicle_owners`
--
ALTER TABLE `vehicle_owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `vehicle_owners` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
