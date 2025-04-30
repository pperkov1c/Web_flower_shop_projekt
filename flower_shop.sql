-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 02:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(151, 24, 22, 'TULIPANI - simbol proljeća i elegancije! 🌷', 15, 1, 'WhatsApp Image 2025-02-07 at 12.18.03.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(16, 24, 'Petra Perković', 'perkovic.petra@gmail.com', '0957638919', 'Pozdrav! Zanima me postoji li popust na kupnji više proizvoda?');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'na čekanju'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(25, 24, 'Petra Perković', '0957638919', 'perkovic.petra55@gmail.com', 'kreditna kartica', 'stan br. 11, Banova ulica 64, Osijek, Hrvatska - 31000', ', Kalanhoja – elegancija i dugotrajna ljepota 🏵️ (1) ', 10, '21-02-2025', 'na čekanju');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`) VALUES
(22, 'TULIPANI - simbol proljeća i elegancije! 🌷', 'Unesite dašak svježine i boje u svoj dom s našim predivnim tulipanima! Bilo da tražite savršen poklon za dragu osobu ili želite uljepšati svoj prostor, tulipani su uvijek pravi izbor. Njihovi raskošni cvjetovi dolaze u raznim nijansama - od klasične crvene i romantične ružičaste do elegantne bijele i veselo žute.\r\n\r\n', 15, 'WhatsApp Image 2025-02-07 at 12.18.03.jpeg'),
(23, 'BIJELA RUŽA – simbol čistoće i novih početaka!🌹', 'Bijele ruže oduvijek su bile sinonim za ljubav, poštovanje i ljepotu. Ove nježne i profinjene cvjetne kraljice savršen su izbor za sve prigode – od romantičnih trenutaka do posebnih događaja poput vjenčanja, rođendana ili znakova pažnje.\r\n\r\n', 20, 'WhatsApp Image 2025-01-30 at 14.27.42.jpeg'),
(24, 'Kalanhoja – elegancija i dugotrajna ljepota 🏵️', 'Unesite toplinu i boju u svoj dom s prekrasnom Kalanchoe blossfeldiana, poznatom i kao kalanhoja! Ova izdržljiva i dugotrajna biljka osvaja svojim gustim listovima i raskošnim cvjetovima koji cvjetaju tjednima.', 10, 'WhatsApp Image 2025-02-09 at 21.50.58.jpeg'),
(25, 'Bijela orhideja – simbol prirodne ljepote i sofisticiranosti 💮', 'Unesite eleganciju i mir u svoj prostor s predivnom bijelom orhidejom! Ova elegantna biljka, s nježnim bijelim cvjetovima, donosi sofisticiranost u svaki kutak vašeg doma. Njeni dugotrajni cvjetovi osvajaju svojom ljepotom, a minimalna njega osigurava da uživate u njezinoj gracioznosti tjednima. Savršen izbor za ljubitelje biljaka koji žele unijeti luksuz i harmoniju u svoj interijer.\r\n\r\n\r\n', 13, 'WhatsApp Image 2025-02-09 at 21.50.58 (4).jpeg'),
(26, ' Mammillaria kaktus - egzotična ljepota s dodatkom crvenila🌵', 'Tražite jedinstvenu biljku koja će unijeti dašak egzotike u vaš dom? Naš Mammillaria kaktus savršen je izbor! Ovaj predivni kuglasti kaktus s gustim zlatnim bodljama nije samo dekorativan, već i jednostavan za održavanje. Posebno ga krase crveni plodovi, koji mu daju dodatnu dozu šarma.', 17, 'WhatsApp Image 2025-02-09 at 21.50.58 (5).jpeg'),
(27, ' Božićna zvijezda - kasična elegancija u vašem domu! 🎄', 'Unesite toplinu i blagdanski duh u svoj prostor uz Božićnu zvijezdu (Poinsettia)! Ova predivna biljka s jarko crvenim listovima simbol je radosti i svečanog ugođaja. Njezina raskošna boja i elegantan izgled čine je savršenim dodatkom svakom interijeru.', 13, 'WhatsApp Image 2025-02-09 at 21.50.58 (6).jpeg'),
(28, 'Perzijska ciklama - kraljica zimskog cvjetanja! 🌿', 'Očaravajuća Perzijska ciklama (Cyclamen persicum) poznata je po svojim nježnim, ali raskošnim cvjetovima koji unose eleganciju i svježinu u svaki dom. Njeni baršunasti listovi u kombinaciji s jarkim bojama cvjetova čine je pravim ukrasom u zimskim mjesecima.', 8, 'WhatsApp Image 2025-02-09 at 21.50.58 (7).jpeg'),
(29, 'Sobna palma - simbol harmonije i svježine 🌴', 'Sobna palma je idealna biljka za svaki prostor. Svojim velikim, elegantnim listovima donosi dašak tropskog ugođaja u vaš dom ili ured. Osim što je izuzetno dekorativna, sobna palma poboljšava kvalitetu zraka, čineći prostor zdravijim i ugodnijim. Niska potreba za brigom čini je savršenim izborom za početnike u svijetu biljaka, a njeno prisustvo unosi spokoj i svježinu. Smjestite je na svijetlo mjesto, redovito je zalijevajte i uživajte u njenom bujnom rastu.', 30, 'WhatsApp Image 2025-02-19 at 19.34.34.jpeg'),
(30, 'Magarčev rep - simbol snage i otpornosti🪴', 'Magarčev rep (Sansevieria) simbolizira snagu, otpornost i dugovječnost. Zbog svoje sposobnosti preživljavanja u gotovo svim uvjetima, često se povezuje s izdržljivošću i sposobnošću prilagodbe. U nekim kulturama, također se smatra zaštitnim simbolom, jer se vjeruje da biljka donosi pozitivnu energiju, uspjeh i zaštitu od negativnosti. Njena sposobnost pročišćavanja zraka također je povezuje s čistoćom i zdravljem.', 24, 'WhatsApp Image 2025-02-19 at 19.34.33.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(22, 'Petra', 'perkovic.petra55@gmail.com', '$2y$10$q3KPaM0ylmh6n271cgczheF5tbuPIZ6GFxJH13UEnYsOMZ2yFsC3m', 'admin'),
(24, 'pperkovic', 'perkovic.petra@gmail.com', '$2y$10$26m3i7/FWSDg0GA9Rml5WuLJx6t.aD9lwC0edaD9mCh/xnoAwsyg.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
