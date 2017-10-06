
-- Dumping data for table `desktops`
--

INSERT INTO `desktops` (`modelNumber`, `processor`, `dimensions`, `ramSize`, `weight`, `cpuCores`, `hddSize`, `brandName`, `price`) VALUES
('ACERASPTC713', 'Intel Core i5-7400', '17.5 x 39.79 x 44.28', '12GB', '18.43', 'Quad-core', '1TB', 'Acer', '549.99'),
('ACEASPATC287', 'AMD A10-7800', '17.5 x 39.79 x 44.28', '12GB', '18.43', 'Quad-core', '1TB', 'Acer', '699.99'),
('MACPRO14100', 'Intel Xeon E5', '0.0 x 25.1 x 16.7', '16GB', '11.02', 'Hexa-core', '256GB', 'Apple', '3499.00'),
('MACPRO24101', 'Intel Xeon E5', '0.0 x 25.1 x 16.7', '16GB', '11.02', 'Octa-core', '256GB', 'Apple', '4699.00'),
('MINIMAC2LL', 'Intel Core i5', '19.7 x 3.6 x 19.7', '8GB', '2.65', 'Dual-core', '1TB', 'Apple', '849.00'),
('ASUSVIVK31CD', 'Intel Core i5-7400', '35 x 39 x 18', '8GB', '13.67', 'Quad-core', '2TB', 'Asus', '799.99'),
('ASUSDESKM32BF', 'AMD A10-7800', '18 x 41 x 38', '8GB', '18.30', 'Quad-core', '2TB', 'Asus', '499.99'),
('ASUSVIV221IC', 'Intel Core i7-7700', '38 x 41 x 18', '12GB', '18.30', 'Quad-core', '1TB', 'Asus', '999.99'),
('DELLiNSi3656', 'AMD A10-8700P', '15.39 x 9.6 x 28.70', '8GB', '6.74', 'Quad-core', '1TB', 'Dell', '599.99'),
('DELLINSi3668', 'Intel Core i7-7700', '15.39 x 35.31 x 30.30', '12GB', '13.91', 'Quad-core', '1TB', 'Dell', '1299.99'),
('MINIPRO600G3', 'Intel Core i5-7500', '17.7 x 17.47 x 3.42', '8GB', '2.67', 'Quad-core', '256GB', 'HP', '1054.00'),
('HPSLIM270-A029', 'AMD A9-9430', '30.7 x 27.5 x 10', '8GB', '9.70', 'Dual-core', '1TB', 'HP', '499.99'),
('HPPAV570-P049', 'AMD A10-9700', '31.5 x 30.7 x 16.3', '12GB', '12.57', 'Quad-core', '1TB', 'HP', '649.99'),
('HPZ2MINIG3', 'Intel Xeon E3-1245 v', '21.6 x 5.8 x 21.6', '16GB', '4.50', 'Quad-core', '512GB', 'HP', '2259.00'),
('SURFSTUD42L', '6th Generation Intel', '43.89 x 63.74 x 1.27', '8GB', '21.08', 'Quad-core', '1TB', 'Microsoft', '3999.99');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`modelNumber`, `processor`, `displaySize`, `ramSize`, `weight`, `cpuCores`, `hddSize`, `batteryType`, `batteryInformation`, `brandName`, `operatingSystem`, `touchFeature`, `cameraInformation`, `price`) VALUES
('C201PA-DS02', 'Rockchip RK3288C', '11.6', '4GB', '907.00', '4', '16GB', '2-cell Li-ion Polyme', '38 Wh', 'ASUS', 'ChromeOS', 0, 'HD Web Camera', '269.99'),
('E200HA-UB02-GD', 'Intel Atom Z8350', '11.6', '4GB', '998.00', '4', '32GB', '2-cell Li-ion Polyme', '38 Wh', 'ASUS', 'Windows 10', 0, 'Yes', '599.17'),
('D540SA-DS01', 'Intel Celeron N3050', '15.6', '4GB', '3000.00', '2', '500GB', '3-cell Li-Ion', '33 Wh', 'ASUS', 'Windows 10', 0, 'Yes', '399.00'),
('E5-774G-52W1', 'Intel Core i5 7th Ge', '17.3', '8GB', '3098.00', '2', '256GB', '4-cell Li-Ion', '2800 mAh', 'Acer', 'Windows 10', 0, 'Yes 720p HDR', '599.99'),
('Watt-W19A', 'Intel Core i7 7th Ge', '13.0', '8GB', '1048.00', '2', '512GB', '?', '41.4 Wh (5449 mAh@7.', 'Huawei', 'Windows 10', 0, 'No', '1299.99'),
('RZ09-01963E32-R3U1', 'Intel Core i7 7th Ge', '13.3', '16GB', '1329.00', '2', '512GB', 'Lithium-Ion', '53.6 Wh', 'Razer', 'Windows 10', 1, 'Yes 720p', '1599.99'),
('XE510C24-K01US', 'Intel Core m3-6Y30', '12.3', '4GB', '1076.00', '2', '32GB', '2-cell Lithium-Ion B', '39 Wh 5140 mAh', 'SAMSUNG', 'ChromeOS', 1, 'Yes 720p', '549.99'),
('KWG13', 'Intel Core i5 7th Ge', '14.0', '4GB', '1750.00', '2', '500GB', 'Lithium-Ion', '42 Wh', 'DELL', 'Windows 10', 0, 'No', '579.99'),
('P2440UA-XS51', 'Intel Core i5 7th Ge', '14.0', '8GB', '1950.00', '2', '256GB', '6-cell Li-Ion Cylind', '72 Wh', 'ASUS', 'Windows 10', 0, 'HD Web Camera', '744.99'),
('80W3004MUS', 'Intel Core i5 7th Ge', '13.3', '8GB', '1229.00', '2', '256GB', 'Lithium-Ion', '46 Wh', 'Lenovo', 'Windows 10', 0, 'Yes 720p', '889.99'),
('A515-51G-5536', 'Intel Core i5 7th Ge', '15.6', '8GB', '2200.00', '2', '1TB', '4-cell Li-Ion', '3220 mAh', 'Acer', 'Windows 10', 0, 'Yes 720p HDR', '579.99'),
('15-cc567nr', 'Intel Core i7 7th Ge', '15.6', '8GB', '1909.00', '2', '1TB', '3-cell Li-Ion', '41 Wh', 'HP', 'Windows 10', 0, 'Yes 720p', '779.99'),
('TMB115-M-C99B', 'Intel Celeron N2840', '11.6', '4GB', '1320.00', '2', '500GB', '4-cell Li-Ion', '3220 mAh', 'Acer', 'Windows 7 Pro', 0, 'Yes', '214.99'),
('E5-553G-1986', 'AMD A12-9700P', '15.6', '8GB', '2390.00', '4', '1TB', '6-cell Li-Ion', '2800 mAh', 'Acer', 'Windows 10', 0, 'Yes 720p HDR', '529.99'),
('i5567-3000GRY', 'Intel Core i3 7th Ge', '15.6', '8GB', '2246.00', '2', '1TB', '3-cell Li-Ion', '42 Wh', 'DELL', 'Windows 10', 1, 'Yes IR', '529.99'),
('MQD32LL/A', 'Intel Core i5', '13.3', '8GB', '2.98', '2', '128 SSD', 'Lithium-Ion Polymer', '54 Wh', 'Apple', 'macOS', 0, 'Yes', '1199.90'),
('15-BW008CA', 'AMD E2-9000e', '15.6', '4GB', '4.30', '2', '500GB', '3-cell Li-ion', '31 Wh ', 'HP', 'Windows 10', 0, 'Yes', '350.89'),
('i7378-10028GRY', 'Intel Core i5', '13.3', '8GB', '3.59', '2', '256GB SSD', '3-cell Lithium Ion', '42 Wh', 'Dell', 'Windows 10', 1, 'Yes', '900.89'),
('i7567-7321BLK-PCA', 'Intel Core i7-7700HQ', '15.6', '8GB', '5.78', '4', '1TB', 'Lithium Ion', '', 'Dell', 'Windows 10', 0, 'Yes', '1400.89'),
('i3552-16040BLK', 'Intel Core i5-7200U', '15.6', '8GB', '3.86', '4', '1TB', '4-Cell Lithium Ion', '40 Wh', 'Dell', 'Windows 10', 0, 'Yes', '450.89'),
('i5567-5802GRY-PCA', 'Intel Core i5-7200U', '15.6', '8GB', '5.07', '2', '1TB', '3-cell Lithium Ion', '42 Wh', 'Dell', 'Windows 10', 0, 'Yes', '700.85'),
('i7559-5637BLK', 'Intel Core i7', '15.6', '8GB', '5.62', '4', '1TB', '6-cell Rechargeable ', '74 Wh', 'Dell', 'Windows 10', 0, 'Yes', '1050.89'),
('20H50047US', 'Intel Core i7-7500U', '15.6', '8GB', '5.07', '4', '256GB SSD', '4-cell Lithium Ion (', '41 Wh', 'Lenovo', 'Windows 10', 0, 'Yes', '1030.89'),
('20H50048US', 'Intel Core i5-7200U', '15.6', '4GB', '5.07', '2', '500GB', '4-cell Lithium Ion (', '41 Wh', 'Lenovo', 'Windows 10 Pro', 0, 'Yes', '595.89'),
('80TJ00LRUS', 'AMD A6-7310', '15.6', '4GB', '4.85', '4', '500GB', '3-cell Li-Polymer', '24 Wh', 'Lenovo', 'Windows 10', 0, 'Yes', '370.89'),
('D9P-00001', 'Intel Core i5-7200U', '13.5', '4GB', '2.76', '2', '128GB SSD', '1-cell Lithium ion', '', 'Microsoft', 'Win 10 S', 1, '720p HD', '1300.89'),
('CR9-00001', 'Intel Core i5-6300U', '13.5', '8GB', '1578.00', '2', '128GB SSD', '1-cell Lithium ion', '', 'Microsoft', 'Win 10 S', 1, '1080P', '1950.89'),
('DAG-00001', 'Intel Core i5-7200U', '13.5', '8GB', '2.76', '2', '256GB SSD', '1-cell Lithium ion', '', 'Microsoft', 'Win 10 S', 1, '720p HD', '1650.89');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--


--
-- Dumping data for table `migrations`
--


-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--


--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`size`, `weight`, `brand`, `modelNumber`, `price`) VALUES
(23, '7.9', 'Acer', 'H236HLBID', '190.00'),
(24, '8.4', 'Acer', 'S241HL ', '178.00'),
(27, '9.5', 'Acer', 'G277HL', '220.00'),
(28, '17.4', 'Asus', 'PB287Q', '600.00'),
(34, '18.5', 'Asus', 'MX34VQ', '1000.00'),
(24, '11.5', 'BenQ', 'RL2460', '250.00'),
(27, '16.5', 'BenQ', 'XL2720', '480.00'),
(24, '8.7', 'Dell', 'U2412M', '350.00'),
(27, '16.6', 'Dell', 'P2715Q', '730.00'),
(34, '17.0', 'Dell', 'U3417W', '1200.00'),
(25, '8.8', 'LG', '25UM58-P', '215.00'),
(27, '9.7', 'LG', '27MP38VQ-B', '200.00'),
(29, '12.1', 'LG', '29UM69G-B', '350.00'),
(28, '11.6', 'Samsung', 'U28E590D', '630.00'),
(32, '13.7', 'Samsung', 'S32F351', '422.00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tablets`
--

--
-- Dumping data for table `tablets`
--

INSERT INTO `tablets` (`modelNumber`, `processor`, `screensize`, `dimensions`, `ramSize`, `weight`, `cpucores`, `hddSize`, `batteryInformation`, `brandName`, `operatingSystem`, `cameraInformation`, `price`) VALUES
('LGPADXII8PLUS', 'Qualcomm Snapdragon', '8.0', '21.87 x 12.7 x 5.9', '2GB', '290.00', 'Octa-core', '32GB', '2900 mAh', 'LG', 'Android 7.0', '5 megapixels', '209.99'),
('ZENPADZ8', 'Qualcomm Snapdragon', '7.9', '20.4 x 13.3 x 6.1', '3GB', '396.00', 'Octa-core', '16GB', '4680 mAH', 'ASUS', 'Android 7.0', '13 megapixels', '249.99'),
('SURFACEPRO2017', 'Intel Core-i7', '12.3', '29.2 x 20.1 x 9.7', '16GB', '784.00', 'Dual-core', '16GB', '5087 mAh', 'MICROSOFT', 'Windows 10', '8 megapixels', '2699.99'),
('APPLE9.7SILVER', 'Apple A9', '9.7', '24 x 16.95 x 6.1', '2GB', '487.00', 'Dual-core', '128GB', '8827 mAh', 'APPLE', 'iOS 10', '8 megapixels', '559.99'),
('GALAXYTAB3', 'Qualcomm Snapdragon ', '9.7', '23.73 x 16.9 x 6.1', '4GB', '429.00', 'Quad-core', '32GB', '6000 mAh', 'SAMSUNG', 'Android 7.0', '13 megapixels', '749.99'),
('YOGATAB3PLUS', 'Qualcomm Snapdragon ', '10.1', '24.7 x 17.9 x 10.23', '3GB', '644.00', 'Octa-core', '32GB', '9300 mAh', 'LENOVO', 'Android 6.0', '13 megapixels', '279.99'),
('HUAWEIM3LT10', 'Qualcomm Snapdragon ', '10.1', '24.1 x 17.15 x 11', '4GB', '310.00', 'Octa-core', '64GB', '6600 mAh', 'HUAWEI', 'Android 7.0', '8 megapixels', '329.99'),
('ZTE10.1ZPAD', 'Qualcomn Snapdragon', '10.1', '25.9 x 17 x 7.3', '2GB', '555.00', 'Octa-core', '16GB', '9070 mAh', 'ZTE', 'Android 6.0', '5 megapixels', '274.99'),
('AcerB3-A30-K5PJ', 'Qualcomn Snapdragon', '10.1', '25.6 x 17.3 x 7.3', '1GB', '477.00', 'Quad-core', '16GB', '3600 mAh', 'ACER', 'Android 6.0', '5 megapixels', '199.99'),
('APPLE9.7GOLD', 'Apple A9', '9.7', '24 x 16.95 x 6.1', '2GB', '487.00', 'Dual-core', '128GB', '8827 mAh', 'APPLE', 'iOS 10', '8 megapixels', '559.99'),
('TAV310PLUS', 'Qualcomn Snapdragon ', '10.1', '26.6 x 17.7 x 7.6', '3GB', '490.00', 'Quad-core', '64GB', '7000 mAh', 'LENOVO', 'Android 6.0', '5 megapixels', '259.99'),
('GALAXYBOOK12', 'Intel Core-i5', '12.0', '29.13 x 19.98 x 7.4', '8GB', '754.00', 'Dual-core', '256GB', '5070 mAh', 'SAMSUNG', 'Windows 10', '13 megapixels', '1899.59'),
('GALAXY TABE9.6', 'Qualcomm Snapdragon ', '9.6', '24.19 x 14.95 x 8.5', '1.5GB', '495.00', 'Quad-core', '8GB', '5000 mAh', 'SAMSUNG', 'Android 4.4', '5 megapixels', '229.99'),
('IPADMINI4GOLD', 'Apple A8', '7.9', '20.32 x 13.46 x 6.1', '2GB', '304.00', 'Dual-core', '128GB', '5124 mAh', 'APPLE', 'iOS 10', '8 megapixels', '529.99'),
('IPADMINI4SILVER', 'Apple A8', '7.9', '20.32 x 13.46 x 6.1', '2GB', '304.00', 'Dual-core', '128GB', '5124 mAh', 'APPLE', 'iOS 10', '8 megapixels', '529.99'),
('ZENPADC70', 'Intel Atom X3', '7.0', '18.9x10.8x.84', '1GB', '265.00', 'Quad-core', '16GB', '2600 mAh', 'ASUS', 'Android 5.0', '2 megapixels', '154.99'),
('ASUSTF304UA', 'Intel Core-i7', '12.6', '29.71x20.82x8.89', '8GB', '860.00', 'Quad-core', '256GB', '7800 mAh', 'ASUS', 'Windows 10', 'N/A', '1399.99'),
('ASUSTF102HA', 'Intel Atom X5', '10.1', '25.9x17.01x1.27', '4GB', '770.00', 'Quad-core', '128GB', '7800 mAh', 'ASUS', 'Windows 10', 'N/A', '549.99'),
('ACERSWITCHA', 'Intel Core-i5', '12.0', '29.2x20.1x1.59', '8GB', '1250.00', 'Quad-core', '128GB', '4870 mAh', 'ACER', 'Windows 10', 'N/A', '949.99'),
('ACERICONIAB1', 'MediaTek Cortex A53', '7.0', '19.05x10.16x1.01', '1GB', '250.00', 'Quad-core', '16GB', '2780 mAh', 'ACER', 'Android 6.0', '2 megapixels', '119.99'),
('ISMARTPLATE', 'MediaTek Cortex A53', '7.0', '26.4x16.4x.91', '1GB', '584.00', 'Quad-core', '8GB', '6000 mAh', 'ISMART', 'Android 7.0', '2 megapixels', '109.99'),
('GALAXYTABA', 'Qualcomm Snapdragon ', '10.1', '15.19x25.4x0.81', '3GB', '526.00', 'Octa-core', '16GB', '7300 mAh', 'SAMSUNG', 'Android 6.0', '8 megapixels', '399.99');

-- --------------------------------------------------------

--
-- Table structure for table `tvs`
--

--
-- Dumping data for table `tvs`
--

INSERT INTO `tvs` (`brand`, `dimensions`, `weight`, `tvType`, `modelNumber`, `price`, `resolution`, `screenSize`) VALUES
('Insignia', '73.33x44.25x9.12', '8.82', 'HD LED ', 'NS-32D311NA17', '208.99', '720p', 32),
('LG', '145.3x83.3x4.66', '25.00', 'LED', 'OLED65W7T', '9995.00', '4K', 65),
('LG', '123.6x77.35x5 ', '20.10', 'Ultra HD', '55UJ752T', '1999.00', '4K', 55),
('LG', '135.89x78.74x8.89', '22.00', 'Ultra HD', '60SJ850T', '2495.00', '4K', 60),
('LG', '146.3x84.2x16.3', '25.00', 'LED,HD', 'OLED65C6T', '4995.00', '4K', 65),
('LG', '145.3x83.3x4.66', '50.27', 'UHD HDR OLED Smart', 'OLED65C7P', '4023.99', '4K', 65),
('LG', '146.1x89.2x6.8', '69.89', 'UHD HDR OLED Smart', 'OLED65G7P', '8029.99', '4K', 65),
('Panasonic', '146.3x84.2x16.3', '43.00', 'Smart', 'TH65EX780A', '2995.00', '4K', 65),
('Panasonic', '164.89x110.8x5.8', '62.00', 'LED', 'TH75EX780A', '5295.00', '4K', 75),
('Panasonic', '72.64x43.33x6.48', '6.00', 'LED', 'TH32E400A', '375.00', '1080p', 32),
('Panasonic', '112.9x71.9x25.6', '11.00', 'LED', 'TH43EX600A', '1095.00', '4K', 43),
('Philips', '77.85x55.68x18.90', '18.19', 'LCD HDTV', '32PFL3506/F7', '654.92', '720p', 32),
('Samsung', '123.6x77.35x5 ', '19.10', 'Ultra HD', 'UA55LS003AWXXY', '3299.00', '4K', 55),
('Samsung', '146.3x84.2x16.3', '26.20', 'LED,LCD', 'UA65LS003AWXXY', '4699.00', '4K', 65),
('Samsung', '111x65.07x9.6', '14.70', 'Smart', 'UA49KU7510WXXY', '1795.00', '4K', 49),
('Samsung', '164.89x110.8x5.8', '42.90', 'HD,LED', 'QA75Q7FAMWXXY', '8495.00', '4K', 75),
('Samsung', '112.89x65.44x6.32', '26.90', 'UHD HDR LED Smart', 'UN50MU6300FXZC', '923.99', '4K', 50),
('Samsung', '164.89x110.8x5.8', '58.42', 'UHD HDR LED Smart', 'UN75MU9000FXZC', '6123.99', '4K', 75),
('Sharp', '112.9x71.9x25.6', '29.98', 'UHD HDR LED Smart', 'LC-50LBU591C', '723.99', '4K', 50),
('Sharp', '97x56.8x8.8', '21.61', 'UHD HDR LED Smart', 'LC-43LBU591C', '508.99', '4K', 43),
('Sharp', '146.3x84.2x16.3', '54.68', 'UHD HDR LED Smart', 'LC-65LBU591C', '1323.99', '4K', 65),
('Sony', '112.9x71.9x25.6', '10.00', 'LED', 'KD43X7000E', '1095.00', '4K', 43),
('Sony', '146.3x84.2x16.3', '42.00', 'Smart', 'KD65X9300E', '3990.00', '4K', 65),
('Sony', '135.89x78.74x8.89', '41.89', 'UHD HDR LED Smart', 'KD60X690E', '1523.99', '4K', 60),
('TCL', '124.71x78.23x22.10', '45.20', 'UHD LED Smart', '55S405', '1539.57', '4K', 55),
('Toshiba', '111x65.07x9.6', '35.27', 'Smart', '49U7750', '950.00', '4K', 49),
('Toshiba', '96.82x56.91x8.73', '16.98', 'LED', '43L420U', '358.99', '1080p', 43),
('VIZIO', '112.78x71.07x22.10', '30.86', 'UHD Smart LED ', 'M50-D1', '1302.46', '4K', 50),
('VIZIO', '72.64x43.33x6.48', '11.79', 'LED Smart', 'D32x-D1', '395.99', '1080p', 32),
('VIZIO', '146.28x84.18x6.38', '55.34', 'UHD HDR XLED Smart', 'M65-E0', '1523.99', '4K', 65);

-- --------------------------------------------------------


