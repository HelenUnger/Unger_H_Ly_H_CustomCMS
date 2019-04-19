-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2019 at 01:30 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportchek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids'),
(4, 'Shoes'),
(5, 'Gear'),
(6, 'Electronics'),
(7, 'Fan Wear');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_product_id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 3, 16),
(17, 3, 17),
(18, 3, 18),
(19, 4, 19),
(20, 4, 20),
(21, 4, 21),
(22, 4, 22),
(23, 4, 23),
(24, 4, 24),
(25, 4, 25),
(26, 4, 26),
(27, 4, 27),
(28, 4, 28),
(29, 4, 29),
(30, 4, 30),
(31, 5, 31),
(32, 5, 32),
(33, 6, 33),
(34, 6, 34),
(35, 7, 35),
(36, 7, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(30) NOT NULL DEFAULT 'placeholder.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_image`) VALUES
(1, 'Champion Men\'s Packable Jacket', 'Men’s Champion Packable Jacket features a water resistant coating and a half zip from hood. Champion screen logo on left chest. Open bottom with bungie cord for adjustability. Scuba collar with hood. Can be packed into front pocket for travel convenience. Side pockets. Specialty hang tag calls out packing capabilities.', '54.99', 'men_01.jpg'),
(2, 'Nike Sportswear Men\'s Woven An', 'The Nike Sportswear Jacket gives you a classic design built to fight the elements with windbreaker-like coverage. Designed with an adjustable bungee-cord hood, mesh lining adds breathable comfort.', '109.99', 'men_02.jpg'),
(3, 'The North Face Men\'s Jacket', 'This low profile jacket is lightly insulated to keep you comfortable and warm on cool days on the trail or in the city.', '89.99', 'men_03.jpg'),
(4, 'Columbia Men\'s Plus Size Jacke', 'Top-notch rain protection in an ultralight package—this packable rain jacket features full seam sealing and a microporous Omni-Tech® fabrication that shields you from wet weather while allowing excess heat and vapor to escape during dynamic activity.', '110.00', 'men_04.jpg'),
(11, 'The North Face City Jacket', 'From the park to downtown, and every adventure in between, this breathable waterproof trench will keep you dry and comfy when spring gets cold and wet.', '99.99', 'women_01.jpg'),
(12, 'Columbia Women\'s Shell Jacket', 'You’ll be prepared for wet conditions with this shell jacket by Columbia. With an adjustable hood and drawcord waist, rain and cold are kept at bay for optimal warmth', '129.99', 'women_02.jpg'),
(7, 'Champion Women\'s Woven Coaches', 'Women’s Champion Woven Coaches Jacket offers iconic style inspired by Champions archives. Water repellent fabric keeps you dry.', '74.99', 'women_03.jpg'),
(8, 'Nike Sportswear Women\'s Woven ', 'The Nike Sportswear Women’s Woven Jacket is designed with a large hood and mesh lining to help you stay dry and comfortable in style.', '80.00', 'women_04.jpg'),
(9, 'Marmot Women\'s 2 Layer Jacket', 'Just because you’re in town doesn’t exempt you from spring’s fickle conditions. Luckily, the Marmot Lea 2 Layer Women\'s Jacket has a two-layer.', '104.99', 'women_05.jpg'),
(10, 'Columbia Women\'s Hidden Skies ', 'Water-resistant fabric on the outside, and sections of soft jersey on the inside make this rain jacket a gem.', '74.99', 'women_06.jpg'),
(5, 'Speedo Jacket Men', 'The stylish silhouette which can come out simply because it is high stretch material is also characteristic.', '154.99', 'men_05.jpg'),
(6, 'Adidas Original Men\'s Jacket', 'The first adidas track suit debuted in 1967 and revolutionized a shoe company. Today\'s version remasters the archival legend.', '99.99', 'men_06.jpg'),
(13, 'Adidas Boy\'s Wind Jacket', 'Versatile pullover packs into its own fanny pack for coverage when needed.', '99.99', 'kid_01.jpg'),
(14, 'Columbia Boy\'s Winter Gem Jack', 'With water-resistant ripstop fabric and a shaped hood, Nike Sportswear Windrunner Boys’ Full-Zip Hoodie delivers lightweight coverage from the elements.', '129.99', 'kid_02.jpg'),
(15, 'Columbia Boy\'s Winter Jacket', 'Columbia Boy\'s Winter Jacket is an incredibly comfortable and warm winter coat great for being active in the freezing cold.', '119.99', 'kid_03.jpg'),
(16, 'Adidas Girls\'s Wind Jacket', 'Versatile pullover packs into its own fanny pack for coverage when needed.', '99.99', 'kid_04.jpg'),
(17, 'Columbia Girls\'s Winter Jacket', 'Columbia Boy\'s Winter Jacket is an incredibly comfortable and warm winter coat great for being active in the freezing cold.\r\n', '89.99', 'kid_05.jpg'),
(18, 'Nike Girls\'s Wind Jacket', 'With water-resistant ripstop fabric and a shaped hood, Nike Sportswear Windrunner Boys’ Full-Zip Hoodie delivers lightweight coverage from the elements.', '129.99', 'kid_06.jpg'),
(19, 'Nike Flex 2018 RN Men\'s ', 'Top to bottom, the Nike Flex RN 2018 Men’s Running Shoe is built to flex. Its circular-knit upper stretches in key areas, while the dynamic heel design and molded tri-star outsole pattern work together for an adaptive ride that connects you to your run.', '114.99', 'shoes_01.jpg'),
(20, 'Adidas Men\'s Ultra Boost ', 'Get that best-ever feeling on every run. These neutral shoes have a stretchy knit upper with ventilation in key sweat zones to help you stay cool. Energy-returning cushioning and a flexible outsole work together to give you a smooth ride from touch-down to toe-off.', '189.99', 'shoes_02.jpg'),
(21, 'New Balance Men\'s M530 Shoes', 'New Balance’s ever-popular M530 lifestyle shoes get a luxurious makeover in the design of the New Balance Men’s M530 (Lux) Shoes - Basin. Pig suede and leather uppers give the kicks a sumptuous feel, and the sneakers still boast the Encap midsole for unparalleled support.', '64.99', 'shoes_03.jpg'),
(22, 'Nike Flex RN 2018 Women’s Runn', 'Top to bottom, the Nike Flex RN 2018 Women’s Running Shoe is built to flex. Its circular-knit upper stretches in key areas, while the dynamic heel design and molded tri-star outsole pattern work together for an adaptive ride that connects you to your run.', '114.99', 'shoes_04.jpg'),
(23, 'Adidas Women\'s Ultra Boost Run', 'Get that best-ever feeling on every run. These neutral shoes have a stretchy knit upper with ventilation in key sweat zones to help you stay cool. Energy-returning cushioning and a flexible outsole work together to give you a smooth ride from touch-down to toe-off.', '189.99', 'shoes_05.jpg'),
(24, 'New Balance Arishi Womens Runn', 'The New Balance Women\'s 415 Shoes - Black/White features a memory foam comfort insole that keeps your feet comfy while on the go. New Balance women\'s sneakers help you reach your greatest potential.', '89.99', 'shoes_06.jpg'),
(25, 'New Balance Boy Toddler 247 Sh', 'The 247 sneaker is designed to meet the tough demands of being a baby. Give your little one the shoe that stays with them as they explore their world. The sneaker delivers a breathable mesh upper with a stretch comfort fit for easy wear. Shoe is finished with reflective trim to majorly up the cool factor.', '109.99', 'shoes_07.jpg'),
(26, 'Adidas Boy\'s Toddler Superstar', 'The clean lines and effortless style of the original adidas Superstar get scaled down for tiny feet. These infants’ shoes feature a leather upper trimmed in all the details that made this shoe an icon. Hook-and-loop closures make for easy on and off.', '79.99', 'shoes_08.jpg'),
(27, 'Nike Toddler Boys\' Air Max', 'Shaped like a running shoe with distinctive modern style, the Nike Tanjun (TD) Toddler Boys\' Shoe offers flexible, lightweight cushioning and a clean textile upper for a plush feel with a supportive fit.', '89.99', 'shoes_09.jpg'),
(28, 'New Balance Girl\'s 997 Shoes', 'Keep it classic with our 997 for girl. This Made in USA style instantly refines your look with a new upper made from premium pigskin.', '119.99', 'shoes_10.jpg'),
(29, 'Adidas Girl\'s Toddler Supersta', 'Since they first hit the courts in the early ’70s, Stan Smith shoes have become legendary for their simple style. This adidas junior version brings a fresh vibe, adding a shiny, rainbow-like look to the heel tab, while keeping familiar details like the perforated 3-Stripes and leather build.', '54.99', 'shoes_11.jpg'),
(30, 'Nike Girl\'s Shoes', 'Shaped like a running shoe with distinctive modern style, the Nike Tanjun (TD) Toddler Boys\' Shoe offers flexible, lightweight cushioning and a clean textile upper for a plush feel with a supportive fit.', '89.99', 'shoes_12.jpg'),
(31, 'Madd Gear 22', 'Madd Gear quality Retro board great for the stree and can fit in your locker.', '35.99', 'gear_01.jpg'),
(32, 'Madd Gear Kick Extreme Scooter', 'The Kick Xtreme from Madd Gear features technology typically seen on much higher end scooters, making it perfect for entry level riders.', '104.99', 'gear_02.jpg'),
(33, 'Fitbit Versa Smartwatch', 'Say hello to the all New Fitbit Versa—your all-day companion that helps you live your best life. The Versa is a lightweight, water-resistant smartwatch that empowers you to reach health and fitness goals with actionable insights, personalized guidance, on-screen workouts and more. The Fitbit ecosystem is now possible with this Versa smartwatch which can play music over Bluetooth to your Fitbit Flyer headphones. Track your weight and BMI using the Fitbit Aria Smart Scale and view your overall health and fitness on Fitbit Dashboard. You can set goals, track your progress and sleep quality within this dashboard which is nicely laid out and easy to use.\r\n\r\nCarry on with your day as usual and let the Versa help with notifications, quick replies, apps, music and 4+ day battery life*. Want a more personalized experience? Select your favourite clock face among the variety of hi-res colour touchscreen options or choose an accessory band that compliments your wardrobe or lifestyle. ', '249.99', 'watch_01.jpg'),
(34, 'Fitbit Versa Smartwatch', 'Say hello to the all New Fitbit Versa—your all-day companion that helps you live your best life. The Versa is a lightweight, water-resistant smartwatch that empowers you to reach health and fitness goals with actionable insights, personalized guidance, on-screen workouts and more. The Fitbit ecosystem is now possible with this Versa smartwatch which can play music over Bluetooth to your Fitbit Flyer headphones. Track your weight and BMI using the Fitbit Aria Smart Scale and view your overall health and fitness on Fitbit Dashboard. You can set goals, track your progress and sleep quality within this dashboard which is nicely laid out and easy to use.\r\n\r\nCarry on with your day as usual and let the Versa help with notifications, quick replies, apps, music and 4+ day battery life*. Want a more personalized experience? Select your favourite clock face among the variety of hi-res colour touchscreen options or choose an accessory band that compliments your wardrobe or lifestyle. ', '249.99', 'watch_02.jpg'),
(35, 'Arsenal Crest Fan Tee', 'PUMA’s Official Licensed Fanwear gives every fan the possibility to wear his or her team colours in any occasion.', '23.97', 'fan_01.jpg'),
(36, 'Hamilton Tiger Cats Little Kid', 'An exact replica of the Canadian Football League jerseys the Tiger Cats wear at Tim Hortons Field, the Hamilton Tiger Cats Replica Child Home Jersey lets young fans feel like a part of the team.', '59.99', 'fan_02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_created`, `user_updated`) VALUES
(3, 'Admin', 'admin@sportchek.com', '$2y$10$DzmJ3ulP2jWYJzc4Tk.RJelJfpGgANSurmje7v.gTZjioSJdvm4gK', '2019-04-15 16:46:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_product_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
