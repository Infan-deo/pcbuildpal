-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc_components`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabinets`
--

CREATE TABLE `cabinets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `form_factor` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabinets`
--

INSERT INTO `cabinets` (`id`, `name`, `form_factor`, `brand`, `price_inr`) VALUES
(1, 'NZXT H510', 'ATX Mid Tower', 'NZXT', 8000.00),
(2, 'Cooler Master MasterBox Q300L', 'Micro-ATX', 'Cooler Master', 4000.00),
(3, 'Corsair Carbide 275R', 'ATX Mid Tower', 'Corsair', 6000.00),
(4, 'Phanteks Eclipse P400', 'ATX Mid Tower', 'Phanteks', 7000.00),
(5, 'Thermaltake Core P3', 'Open Frame', 'Thermaltake', 9000.00);

-- --------------------------------------------------------

--
-- Table structure for table `coolers`
--

CREATE TABLE `coolers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coolers`
--

INSERT INTO `coolers` (`id`, `name`, `type`, `brand`, `price_inr`) VALUES
(1, 'Noctua NH-D15', 'Air Cooler', 'Noctua', 8000.00),
(2, 'Corsair H100i RGB PLATINUM', 'Liquid Cooler', 'Corsair', 12000.00),
(3, 'Cooler Master Hyper 212 RGB', 'Air Cooler', 'Cooler Master', 5000.00),
(4, 'NZXT Kraken X63', 'Liquid Cooler', 'NZXT', 10000.00),
(5, 'be quiet! Dark Rock Pro 4', 'Air Cooler', 'be quiet!', 9000.00);

-- --------------------------------------------------------

--
-- Table structure for table `graphics_cards`
--

CREATE TABLE `graphics_cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `memory` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `fan_type` varchar(50) NOT NULL,
  `memory_clock_speed` int(11) NOT NULL,
  `graphics_ram_type` varchar(10) NOT NULL,
  `wattage` int(11) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graphics_cards`
--

INSERT INTO `graphics_cards` (`id`, `name`, `memory`, `brand`, `fan_type`, `memory_clock_speed`, `graphics_ram_type`, `wattage`, `price_inr`) VALUES
(1, 'NVIDIA GeForce RTX 3060 8GB Dual-fan 1500 clock speed GDDR6', 8, 'NVIDIA', 'Dual', 1500, 'GDDR6', 170, 40000.00),
(2, 'AMD Radeon RX 5700 XT 8gb triple-fan 1750 clock-speed GDDR6', 8, 'AMD', 'Triple', 1750, 'GDDR6', 225, 45000.00),
(3, 'NVIDIA GeForce GTX 1660 Ti 6gb dual-fan 1500 clock-speed GDDR5', 6, 'NVIDIA', 'Dual', 1500, 'GDDR5', 120, 25000.00),
(4, 'AMD Radeon RX 580 4gb dual-fan 2000 clock-speed GDDR5', 4, 'AMD', 'Dual', 2000, 'GDDR5', 185, 30000.00),
(5, 'INNO3D GEFORCE RTX 3050 TWIN X2 8GB GDDR6 GRAPHICS CARD (N30502-08D6-1190VA42)', 8, 'NVIDIA', 'dual', 1600, 'GDDR6', 130, 21000.00),
(6, 'ASUS ROG STRIX GEFORCE RTX 4090 OC EDITION 24GB GDDR6X GRAPHICS CARD', 24, 'NVIDIA', 'Triple', 2640, 'GDDR6X', 450, 2300000.00);

-- --------------------------------------------------------

--
-- Table structure for table `keyboards`
--

CREATE TABLE `keyboards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `switch_type` varchar(50) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keyboards`
--

INSERT INTO `keyboards` (`id`, `name`, `switch_type`, `brand`, `price_inr`) VALUES
(1, 'Corsair K95 RGB Platinum XT', 'Cherry MX Brown', 'Corsair', 15000.00),
(2, 'Logitech G Pro X', 'Swappable', 'Logitech', 8000.00),
(3, 'Razer BlackWidow Elite', 'Razer Green', 'Razer', 12000.00),
(4, 'SteelSeries Apex Pro', 'Adjustable', 'SteelSeries', 18000.00),
(5, 'HyperX Alloy FPS Pro', 'Cherry MX Red', 'HyperX', 9000.00);

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `resolution` varchar(20) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`id`, `name`, `resolution`, `brand`, `price_inr`) VALUES
(1, 'Dell 24-inch 1080p', '1920x1080', 'Dell', 15000.00),
(2, 'LG Ultragear 27-inch 1440p', '2560x1440', 'LG', 25000.00),
(3, 'ASUS ROG Swift 34-inch 4K', '3840x2160', 'ASUS', 60000.00),
(4, 'Acer Nitro 24-inch 1080p', '1920x1080', 'Acer', 12000.00),
(5, 'Samsung Odyssey 32-inch 1440p', '2560x1440', 'Samsung', 35000.00);

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chipset` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `socket_type` varchar(50) NOT NULL,
  `ram_type` varchar(10) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`id`, `name`, `chipset`, `brand`, `socket_type`, `ram_type`, `price_inr`) VALUES
(1, 'ASUS ROG Strix Z490-E LGA1200 DDR4', 'Z490', 'ASUS', 'LGA1200', 'DDR4', 18000.00),
(2, 'MSI B450 TOMAHAWK MAX AM4 DDR4', 'B450', 'MSI', 'AM4', 'DDR4', 10000.00),
(3, 'GIGABYTE Z390 AORUS PRO LGA1151 DDR4', 'Z390', 'GIGABYTE', 'LGA1151', 'DDR4', 20000.00),
(4, 'ASRock B550 Steel Legend AM4 DDR4', 'B550', 'ASRock', 'AM4', 'DDR4', 15000.00),
(5, 'MSI MPG X570 GAMING PRO CARBON WIFI', 'X570', 'MSI', 'AM4', 'DDR4', 25000.00),
(6, 'ASROCK B650E STEEL LEGEND WIFI AM5 ATX MOTHERBOARD (B650E-STEEL-LEGEND-WIFI)', 'B650E', 'ASRock', 'AM5', 'DDR5', 28000.00),
(7, 'ASUS PRIME B760-PLUS LGA1700 ATX MOTHERBOARD (PRIME-B760-PLUS)', 'B760', 'ASUS', 'LGA1700 ', 'DDR5', 16600.00),
(8, 'ASUS ROG STRIX B760-F GAMING WIFI LGA1700 ATX MOTHERBOARD (ROG-STRIX-B760-F-GAMING-WIFI)', 'B760-F', 'ASUS', 'AM5', 'DDR5', 26000.00);

-- --------------------------------------------------------

--
-- Table structure for table `mouse`
--

CREATE TABLE `mouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dpi` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mouse`
--

INSERT INTO `mouse` (`id`, `name`, `dpi`, `brand`, `price_inr`) VALUES
(1, 'Logitech G502 Hero', 16000, 'Logitech', 5000.00),
(2, 'Razer DeathAdder Elite', 16000, 'Razer', 6000.00),
(3, 'Corsair Dark Core RGB/SE', 16000, 'Corsair', 7000.00),
(4, 'SteelSeries Rival 600', 12000, 'SteelSeries', 8000.00),
(5, 'Logitech MX Master 3', 4000, 'Logitech', 9000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_page`
--

CREATE TABLE `order_page` (
  `id` int(25) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `invoice_num` varchar(15) NOT NULL,
  `componentName` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `category` varchar(25) NOT NULL,
  `price_inr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_page`
--

INSERT INTO `order_page` (`id`, `user_id`, `invoice_num`, `componentName`, `productId`, `order_date`, `category`, `price_inr`) VALUES
(48, 'uidf39xM', 'INV0374354', 'processors', 6, '2024-03-10', 'Gaming', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `processors`
--

CREATE TABLE `processors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `generation` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `socket_type` varchar(50) NOT NULL,
  `Gpu_type` varchar(25) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `processors`
--

INSERT INTO `processors` (`id`, `name`, `generation`, `brand`, `socket_type`, `Gpu_type`, `price_inr`) VALUES
(1, 'INTEL CORE I3-10105 3.7 GHZ QUAD-CORE LGA 1200 PROCESSOR(BX8070110105)', 10, 'intel', 'LGA1200', 'n/a', 10000.00),
(2, 'AMD RYZEN 3 3200G PROCESSOR WITH RADEON RX VEGA 8 GRAPHICS (YD3200C5FHBOX)', 3, 'AMD', 'AM4', 'Vega 8 Grapics', 13000.00),
(3, 'INTEL CORE I7-12700K 12TH GEN ALDER LAKE PROCESSOR (BX8071512700K)', 12, 'intel', 'LGA1700', 'Intel UHD 770', 32000.00),
(4, 'AMD RYZEN 5 5600 DESKTOP PROCESSOR (UP TO 3.5GHZ)', 5, 'AMD', 'AM4', 'n/a', 22000.00),
(5, 'INTEL CORE I3-13100F 13TH GEN DESKTOP PROCESSOR (BX8071513100F)', 13, 'intel', 'LGA1200', 'n/a', 10700.00),
(6, 'INTEL CORE I9 14900K 14TH GEN DESKTOP PROCESSOR', 14, 'intel', 'LGA1700', 'n/a', 55000.00),
(7, 'INTEL CORE I7 10700F DESKTOP PROCESSOR (16M CACHE, UP TO 4.80 GHZ)', 10, 'intel', 'LGA1200', 'n/a', 21000.00),
(8, 'AMD RYZEN 9 5950X PROCESSOR', 5, 'AMD', 'AM4', 'n/a', 39000.00),
(9, 'AMD RYZEN 7 5700G PROCESSOR WITH RADEON GRAPHICS', 5, 'AMD', 'AM4', 'Radeon graphics', 17500.00),
(10, 'AMD RYZEN 5 7600 GAMING DESKTOP PROCESSOR (100-100001015BOX)', 7, 'AMD', 'AM5', 'Radeon graphics', 18500.00);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `ram_type` varchar(10) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `name`, `brand`, `capacity`, `speed`, `ram_type`, `price_inr`) VALUES
(1, 'Corsair 8gb 3200mhz DDR4 CORSAIR DOMINATOR PLATINUM RGB 16GB (2X8GB) DDR4 DRAM 3200MHZ C16 RAM (CMT16GX4M2E3200C16)', 'Corsair', 16, 3200, 'DDR4', 8900.00),
(2, 'G.SKILL 16GB (2X8GB) RIPJAWS V SERIES DDR4 3200MHZ DESKTOP RAM (F4-3200C14D-16GVK)', 'G.Skill', 16, 3200, 'DDR4', 12000.00),
(3, 'Crucial 32gb 3600mhz DDR4', 'Crucial', 32, 3600, 'DDR4', 15000.00),
(4, 'KINGSTON FURY BEAST 8GB (8GBX1) DDR4 3200MHZ (BLACK) (KF432C16BB-8)', 'Kingston', 8, 3200, 'DDR4', 2000.00),
(5, 'HYPERX FURY RGB 16GB (16GBX1) DDR4 3600MHZ RAM (HX436C17FB3A-16)', 'HyperX', 16, 3600, 'DDR4', 6000.00),
(6, 'CORSAIR DOMINATOR PLATINUM 32GB(2X16GB) DDR5 RGB DRAM 7000MHZ CL34 DESKTOP RAM (CMT32GX5M2X7000C34)', 'Corsair', 32, 7000, 'DDR5', 18000.00),
(7, 'PATRIOT VIPER VENOM 16GB(2X8GB) DDR5 5200MHZ DESKTOP GAMING RAM (PVV516G520C36K)', 'PATRIOT', 16, 5200, 'DDR5', 7900.00),
(8, 'CORSAIR VENGEANCE 16GB(16GBX1) DDR5 DRAM 5600MHZ C40 DESKTOP RAM (BLACK) (CMK16GX5M1B5600C40)', 'Corsair\r\n', 16, 5600, 'DDR5', 5640.00),
(9, 'ADATA XPG SPECTRIX D60G RGB 8GB (8GBX1) DDR4 3200MHZ DESKTOP RAM (AX4U32008G16A-ST60)', 'ADATA', 8, 3200, 'DDR4', 2500.00),
(10, 'CORSAIR VENGEANCE 32GB (16GBX2) DDR5 6000MHZ CL36 DESKTOP RAM BLACK (CMK32GX5M2E6000C36)', 'Corsair', 32, 6000, 'DDR5', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `smps`
--

CREATE TABLE `smps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `wattage` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smps`
--

INSERT INTO `smps` (`id`, `name`, `wattage`, `brand`, `price_inr`) VALUES
(1, 'Corsair CX550M', 550, 'Corsair', 5000.00),
(2, 'EVGA 600 BQ', 600, 'EVGA', 6000.00),
(3, 'Cooler Master MWE 650', 650, 'Cooler Master', 5500.00),
(4, 'Antec Earthwatts Gold Pro 750W', 750, 'Antec', 7000.00),
(5, 'Seasonic Focus GX-850', 850, 'Seasonic', 9000.00),
(6, 'ASUS ROG STRIX 550W 80 PLUS GOLD SMPS', 550, 'ASUS', 19900.00),
(7, 'COOLER MASTER MWE 650 V2 80 PLUS BRONZE SMPS (MPE-6501-ACABW-BIN)', 650, 'Cooler Master', 5050.00),
(8, 'CORSAIR RM1000E 1000 WATT 80 PLUS GOLD ATX 3.0 POWER SUPPLY (CP-9020264-IN)', 1000, 'Corsair', 15400.00),
(9, 'DEEPCOOL DQ1000M-V3L 1000 WATT 80 PLUS GOLD CERTIFIED FULLY MODULAR POWER SUPPLY BLACK (R-DQA00M-FB0B-UK)', 1000, 'Deepcool', 11500.00),
(10, 'NZXT C650 650 WATT 80 PLUS GOLD FULLY MODULAR POWER SUPPLY (NP-C650M-UK)', 650, 'Nzxt', 8799.00);

-- --------------------------------------------------------

--
-- Table structure for table `storage_type`
--

CREATE TABLE `storage_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_inr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storage_type`
--

INSERT INTO `storage_type` (`id`, `name`, `type`, `capacity`, `price_inr`) VALUES
(1, 'ANT ESPORTS 690 NEO 1TB SATA INTERNAL SSD (690-NEO-SATA-1TB)', 'SSD SATA', 1000, 5120.00),
(2, 'ADATA XPG GAMMIX S11 PRO 512GB M.2 NVME SSD (AGAMMIXS11P-512GT-C)', 'NVME M.2', 512, 4000.00),
(3, 'CRUCIAL P3 500GB NVME M.2 GEN 3.0 INTERNAL SSD (CT500P3SSD8)', 'NVME M.2', 500, 3900.00),
(4, 'SEAGATE 1TB 7200 RPM Barracuda Desktop Internal Hard Drive\r\n', 'Internal HDD', 1000, 5000.00),
(5, 'WESTERN DIGITAL BLUE 2TB 7200 RPM DESKTOP HDD HARD DRIVE (WD20EZBX)', 'Internal HDD', 2000, 5950.00),
(6, 'CORSAIR MP600 PRO LPX 1TB PCIE GEN4 NVME M.2 INTERNAL SSD (CSSD-F1000GBMP600PLP)', 'NVME M.2', 1000, 11500.00),
(7, 'SAMSUNG 980 NVME M.2 500GB INTERNAL SSD (MZ-V8V500BW)', 'NVME M.2', 500, 4950.00),
(8, 'WESTERN DIGITAL BLUE SA510 500GB INTERNAL SSD (WDS500G3B0A)', 'SSD SATA', 500, 3860.00),
(9, 'SEAGATE 2TB 7200 RPM BARRACUDA DESKTOP INTERNAL HARD DRIVE', 'Internal HDD', 2000, 6600.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
('uid7S2GC', 'Lee jea rock', 'leejearock@gmali.com', 'lee123'),
('uidf39xM', 'infan', 'infandeol@gmail.com', 'infan444'),
('uidKxarb', 'george', 'george@gmail.com', 'geo123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coolers`
--
ALTER TABLE `coolers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyboards`
--
ALTER TABLE `keyboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_page`
--
ALTER TABLE `order_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smps`
--
ALTER TABLE `smps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_type`
--
ALTER TABLE `storage_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coolers`
--
ALTER TABLE `coolers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keyboards`
--
ALTER TABLE `keyboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `motherboards`
--
ALTER TABLE `motherboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mouse`
--
ALTER TABLE `mouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_page`
--
ALTER TABLE `order_page`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `processors`
--
ALTER TABLE `processors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `smps`
--
ALTER TABLE `smps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `storage_type`
--
ALTER TABLE `storage_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
