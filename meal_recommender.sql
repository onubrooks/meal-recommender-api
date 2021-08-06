-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 06, 2021 at 05:05 PM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal_recommender`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

DROP TABLE IF EXISTS `allergies`;
CREATE TABLE IF NOT EXISTS `allergies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nut Allergy', 'Allergic to nuts', '2021-08-04 21:51:03', '2021-08-04 21:51:03'),
(2, 'ShellFish Allergy', 'Allergic to ShellFish', '2021-08-04 21:51:18', '2021-08-04 21:51:18'),
(3, 'SeaFood Allergy', 'Allergic to SeaFood', '2021-08-04 21:51:36', '2021-08-04 21:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ewedu', 'Ewedu soup', '2021-08-04 21:45:11', '2021-08-04 21:45:11'),
(2, 'Pounded Yam', 'Yam that is pounded', '2021-08-04 21:45:30', '2021-08-04 21:45:30'),
(3, 'Fufu', 'exotic swallow', '2021-08-04 21:45:46', '2021-08-04 21:45:46'),
(4, 'Akpu', 'exotic swallow with a spice to it', '2021-08-04 21:45:59', '2021-08-04 21:45:59'),
(5, 'Oha soup', 'exotic soup with a bling to it', '2021-08-04 21:46:16', '2021-08-04 21:46:16'),
(6, 'Edikaikong soup', 'exotic soup everyone wants but cant have', '2021-08-04 21:46:39', '2021-08-04 21:46:39'),
(7, 'Boiled rice', 'rice grain boiled', '2021-08-04 21:47:01', '2021-08-04 21:47:01'),
(8, 'Fried rice', 'rice grain fried', '2021-08-04 21:47:10', '2021-08-04 21:47:10'),
(9, 'Jollof rice', 'rice grain jollof', '2021-08-04 21:47:22', '2021-08-04 21:47:22'),
(10, 'Okra soup', 'delicious soup made with the great okra plant', '2021-08-04 21:56:45', '2021-08-04 21:56:45'),
(11, 'Eba', 'delicious swallow', '2021-08-04 22:16:05', '2021-08-04 22:16:05'),
(12, 'Roast Fish', 'fish roasted with hot fire', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(13, 'Beef', 'Nigerian Beef ', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(14, 'Yam', 'yam tubers', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(15, 'Vegetable', 'A vegan Nigerian item.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(16, 'Chicken Sauce', 'Chicken Sauce that can make you fight at weddings. So Yummy!', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(17, 'Tiger Cocoyam', 'Tiger Cocoyam: Ede Eko, the cocoyam you should eat like yam', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(18, 'Spicy Shredded Oil Bean', 'Ugba is the Nigerian restaurant special that will help you repossess your possession! ', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(19, 'Abacha', 'the full option abacha that contains all the possible ingredients you will find in Abacha.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(20, 'Cow Foot Porridge', 'Here\'s one for the cold and rainy day. Wakes up your taste buds!', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(21, 'Peppered Snails', 'Peppered Snail is a common feature in Nigerian restaurants and in the Small Chops section at parties. It\'s too hot to handle!', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(22, 'Spicy Cow Foot', 'You don\'t have to wait to be taken out to a special restaurant or travel to Nigeria to enjoy your next Nkwobi.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(23, 'Nigerian Goat Meat ', 'Goat meat gives the Nigerian Pepper Soup a unique taste.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(24, 'Spicy Goat Head', 'How many mortars of Isi Ewu can you finish', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(25, 'Corn/Maize', 'maize grains from plant shrubs', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(26, 'Beans', 'Beans seeds/grain', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(27, 'Egg Sauce', 'made with eggs, tomatoes and more', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(28, 'Bitterleaf soup', 'local bitterleaf plant so delicious', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(29, 'Peeled Beans', 'peeled beans like no other', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(30, 'Nigerian Dan Wake', 'Beans Dumplings from Northern Nigerian ', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(31, 'Fried Beans', 'Yes, we fry beans too. another great way to enjoy beans.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(32, 'Pepper Soup', 'Light and spicy soup traditionally made with goat meat, but often with fish or other meat, as well as herbs and Nigerian spices.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(33, 'Spinach leaves', 'A rich spinach leafy vegetable', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(34, 'Fried Fish', 'fish fried with spices and flavor', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(35, 'Roasted Fish', 'fish roasted and smeared with smoke', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(36, 'Tomato Pasta', 'This incredibly creamy and sweet tomato pasta is made with fresh tomatoes, almonds, garlic, basil, capers (optional), and extra virgin olive oil.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(37, 'Ketch Up', 'tomato ketchup, red and creamy', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(38, 'Spaghetti', 'spaghetti aglio, olio e peperoncino', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(39, 'Walnuts', 'Walnut Seeds', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(40, 'Chickpea Curry', 'made with simple and nutritious ingredients that you can find pretty much in any kitchen', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(41, 'Taco Boats', 'They are perfect for a quick and easy light dinner.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(42, 'Panzanella Salad', 'If you have some tomatoes, onions, and stale bread, you have most of the essential ingredients for this deliciously simple Tuscan salad', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(43, 'Mashed Chickpea Tabuleth Salad', 'Mashed Chickpea Tabuleth Salad running on rich food', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(44, 'Vegetarian Tacos with Avocado Sauce', 'Loaded with simple roasted veggies and a tangy avocado-tomatillo sauce, these vegetarian tacos are an easy weeknight dinner full of flavor.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(45, 'Asparagus Pesto Pasta', 'When asparagus is in season, this asparagus pesto pasta is a great alternative to the classic pesto recipe.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(46, 'Vegan Mushroom', 'A creamy mushroom that can be used with pasta', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(47, 'Roasted Eggplant', 'Roasted Eggplant for Pasta is a rare delicacy', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(48, 'Noodles', 'This noodles recipe comes together quickly. It’s delicious and very satisfying.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(49, 'Mexican Quinoa', 'black beans, juicy tomatoes, crunchy sweet corn, and creamy avocados makes you drool, this Mexican Quinoa is the perfect dinner recipe you', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(50, 'Vegetarian Paella', ' You don’t need to use the veggies in the recipe. Anything you have in your fridge or freezer works! It’s so easy!', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(51, 'Coconut Lentil Curry', 'This gluten-free, dairy-free, and vegan coconut curry is made with canned lentils and rich coconut milk cream.', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(52, 'Red Lentil Soup With Spinach And Carrots', 'This red lentil soup is quick, simple, and easy to throw together. Made with wholesome red split lentils, it comes together in just 30 minutes', '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(53, 'Crispy Quinoa Sweet Potato Fritters', 'Crispy Quinoa Sweet Potato Fritters', '2021-08-05 13:16:49', '2021-08-05 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_allergies`
--

DROP TABLE IF EXISTS `item_allergies`;
CREATE TABLE IF NOT EXISTS `item_allergies` (
  `item_id` int(11) NOT NULL,
  `allergy_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_allergies`
--

INSERT INTO `item_allergies` (`item_id`, `allergy_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-05 07:51:50', '2021-08-05 07:51:50'),
(2, 2, '2021-08-05 07:52:54', '2021-08-05 07:52:54'),
(3, 2, '2021-08-05 07:53:26', '2021-08-05 07:53:26'),
(3, 3, '2021-08-05 07:53:26', '2021-08-05 07:53:26'),
(12, 1, '2021-08-05 13:19:28', '2021-08-05 13:19:28'),
(4, 2, '2021-08-06 15:54:06', '2021-08-06 15:54:06'),
(4, 1, '2021-08-06 15:54:06', '2021-08-06 15:54:06'),
(8, 3, '2021-08-06 15:54:19', '2021-08-06 15:54:19'),
(8, 1, '2021-08-06 15:54:19', '2021-08-06 15:54:19'),
(10, 3, '2021-08-06 15:54:37', '2021-08-06 15:54:37'),
(13, 1, '2021-08-06 15:54:56', '2021-08-06 15:54:56'),
(15, 2, '2021-08-06 15:55:03', '2021-08-06 15:55:03'),
(18, 3, '2021-08-06 15:55:10', '2021-08-06 15:55:10'),
(21, 1, '2021-08-06 15:55:20', '2021-08-06 15:55:20'),
(24, 1, '2021-08-06 15:55:40', '2021-08-06 15:55:40'),
(24, 2, '2021-08-06 15:55:40', '2021-08-06 15:55:40'),
(28, 3, '2021-08-06 15:55:47', '2021-08-06 15:55:47'),
(28, 2, '2021-08-06 15:55:47', '2021-08-06 15:55:47'),
(31, 1, '2021-08-06 15:55:55', '2021-08-06 15:55:55'),
(31, 2, '2021-08-06 15:55:55', '2021-08-06 15:55:55'),
(35, 1, '2021-08-06 15:56:05', '2021-08-06 15:56:05'),
(35, 3, '2021-08-06 15:56:05', '2021-08-06 15:56:05'),
(39, 1, '2021-08-06 15:56:22', '2021-08-06 15:56:22'),
(39, 3, '2021-08-06 15:56:22', '2021-08-06 15:56:22'),
(39, 2, '2021-08-06 15:56:22', '2021-08-06 15:56:22'),
(42, 1, '2021-08-06 15:56:33', '2021-08-06 15:56:33'),
(42, 3, '2021-08-06 15:56:33', '2021-08-06 15:56:33'),
(42, 2, '2021-08-06 15:56:33', '2021-08-06 15:56:33'),
(43, 1, '2021-08-06 15:56:38', '2021-08-06 15:56:38'),
(43, 3, '2021-08-06 15:56:38', '2021-08-06 15:56:38'),
(43, 2, '2021-08-06 15:56:38', '2021-08-06 15:56:38'),
(45, 1, '2021-08-06 15:56:47', '2021-08-06 15:56:47'),
(45, 3, '2021-08-06 15:56:47', '2021-08-06 15:56:47'),
(47, 1, '2021-08-06 15:57:00', '2021-08-06 15:57:00'),
(47, 2, '2021-08-06 15:57:00', '2021-08-06 15:57:00'),
(49, 1, '2021-08-06 15:57:05', '2021-08-06 15:57:05'),
(49, 2, '2021-08-06 15:57:05', '2021-08-06 15:57:05'),
(50, 3, '2021-08-06 15:57:14', '2021-08-06 15:57:14'),
(50, 2, '2021-08-06 15:57:14', '2021-08-06 15:57:14'),
(51, 3, '2021-08-06 15:57:24', '2021-08-06 15:57:24'),
(52, 3, '2021-08-06 15:57:29', '2021-08-06 15:57:29'),
(53, 1, '2021-08-06 15:57:35', '2021-08-06 15:57:35'),
(54, 1, '2021-08-06 15:57:41', '2021-08-06 15:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Eba and Ewedu', 'special eba from the western part of Nigeria', NULL, '2021-08-04 21:40:03', '2021-08-04 21:40:03'),
(2, 'fufu and Ewedu', 'special fufu from the eastern part of Nigeria', NULL, '2021-08-04 21:41:45', '2021-08-04 21:41:45'),
(3, 'akpu and Ewedu', 'special akpu from the eastern part of Nigeria', NULL, '2021-08-04 21:42:00', '2021-08-04 21:42:00'),
(4, 'pounded yam and Ewedu', 'special pounded yam from the southern part of Nigeria', NULL, '2021-08-04 21:42:25', '2021-08-04 21:42:25'),
(5, 'Eba and Okra', 'special garri cake with okra soup', NULL, '2021-08-04 21:56:07', '2021-08-04 21:56:07'),
(6, 'Grilled Fish with Spice Chilli', 'This is the description', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(7, 'Nigerian Beef Stew Recipe', 'Nigerian Beef Stew Recipe with white rice and chicken', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(8, 'Vegan Yam and Vegetable', 'A vegan Nigerian meal to add to your family menu.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(9, 'Chicken Curry Sauce', 'Chicken Sauce that can make you fight at weddings. So Yummy!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(10, 'Tiger Cocoyam: Ede Eko', 'Tiger Cocoyam: Ede Eko, the cocoyam you should eat like yam', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(11, 'Ugba: Spicy Shredded Oil Bean', 'Ugba is the Nigerian restaurant special that will help you repossess your possession! ', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(12, 'Igbo Abacha (Full)', 'the full option abacha that contains all the possible ingredients you will find in Abacha.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(13, 'Cow Foot Porridge or Pepper Soup', 'Here\'s one for the cold and rainy day. Wakes up your taste buds!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(14, 'Peppered Snails', 'Peppered Snail is a common feature in Nigerian restaurants and in the Small Chops section at parties. It\'s too hot to handle!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(15, 'Nkwobi: Spicy Cow Foot', 'You don\'t have to wait to be taken out to a special restaurant or travel to Nigeria to enjoy your next Nkwobi.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(16, 'Nigerian Goat Meat Pepper Soup', 'Goat meat gives the Nigerian Pepper Soup a unique taste.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(17, 'Nigerian Isi Ewu: Spicy Goat Head', 'How many mortars of Isi Ewu can you finish? Find out!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(18, 'Beans & Corn (Adalu, Beancor, Tchaka)', 'Beans & Corn (Adalu, Beancor, Tchaka) is the meal of the season. Grab it!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(19, 'Baked Nigerian Moi Moi', 'get cute cup-sized Nigerian Moi Moi that kids and your guests would love.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(20, 'White Moi Moi (Ekuru)', 'This Yoruba delicacy is another version of Nigerian Moi Moi that is suitable for vegetarians.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(21, 'Peeled Beans Porridge', 'This beans recipe is perfect for babies and those who crave Breadfruit Porridge but can’t buy breadfruit where they live.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(22, 'Nigerian Dan Wake', 'Dan Wake (Beans Dumplings) is a Northern Nigerian recipe. See how to get tasty results with this traditional meal.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(23, 'Nigerian Fried Beans', 'It is not only rice that we fry ;D, we fry beans too. Check out the Nigerian Fried Beans recipe, another great way to enjoy beans.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(24, 'Pepper Soup', 'Light and spicy soup traditionally made with goat meat, but often with fish or other meat, as well as herbs and Nigerian spices.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(25, 'Efo Riro', 'A rich spinach stew usually made with spinach, scotch bonnets, and red bell peppers.Efo Riro roughly translates to stirred leafy vegetable', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(26, 'Suya', 'This popular Nigerian street food gets its iconic spicy taste from Suya spice, which is made with peanuts, cayenne pepper, salt, and several other seasonings', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(27, 'Ewa Agoyin', 'Made of honey beans (oloyin), this stew is smokey and rich in flavor, and mashed and crunchy in texture. Some call it a stew, others a sauce, but I think we can all agree it\'s a delicacy', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(28, 'No-Cook Creamy Tomato Pasta', 'This incredibly creamy and sweet tomato pasta is made with fresh tomatoes, almonds, garlic, basil, capers (optional), and extra virgin olive oil.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(29, 'Pasta with Peas', 'This Italian pasta with peas is a simple, creamy, and delicious one-pot dinner recipe.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(30, 'Spaghetti with garlic and olive oil', 'spaghetti aglio, olio e peperoncino', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(31, 'Walnut Sauce Pasta ', 'Walnut Sauce Pasta ', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(32, 'Rice with Chickpea Curry', 'made with simple and nutritious ingredients that you can find pretty much in any kitchen', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(33, 'Rainbow “Raw-Maine” Taco Boats', 'They are perfect for a quick and easy light dinner. They are filled with hummus, fresh veggies, sprouts, and a creamy tahini sauce.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(34, 'Panzanella Salad', 'If you have some tomatoes, onions, and stale bread, you have most of the essential ingredients for this deliciously simple Tuscan salad', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(35, 'Mashed Chickpea Tabuleth Salad', 'Mashed Chickpea Tabuleth Salad running on rich food', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(36, 'Vegetarian Tacos with Avocado Sauce', 'Loaded with simple roasted veggies and a tangy avocado-tomatillo sauce, these vegetarian tacos are an easy weeknight dinner full of flavor.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(37, '15-Minute Lo Mein', 'Stir fry dinners are so easy to make. All you need is just some chopped veggies and a hot pan.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(38, 'Blackened Chicken and Avocado Salad', 'And crisp and full of flavor, this easy chicken salad recipe with avocado is the simplest and healthiest meal you can make!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(39, 'Chinese Chicken Salad', 'This salad is all about the delicious Asian Dressing and the slaw-type shape of the ingredients. Don’t skip the crunchy noodles. ', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(40, '15 Minute Sweet and Spicy Chicken Zoodles', 'If you are looking for a low-carb dinner recipe, this is it! It’s made with spiralized zucchini.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(41, 'Teriyaki Chicken & Broccoli', 'Teriyaki Chicken & Broccoli by A Simple Palate', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(42, '15-Minute Garlic Shrimp Zoodles', 'Another low-carb zoodle recipe, this time with sweet and tasty garlic roasted shrimp. Lemon adds a bit of tanginess and freshness to the noodles.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(43, 'Parmesan Crumbed Fish', 'quick emergency fish recipe is perfect with any fish fillet you have. It’s a super-healthy fish recipe with a delicious golden baked crust.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(44, 'Market Spicy Tuna Wraps', 'tuna wraps are just delicious. Full of fresh veggies and drizzled with light chipotle Greek yogurt ranch dressing.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(45, 'Baked Gnocchi with Spinach and Mozzarella', 'This vegetarian baked gnocchi recipe is quick and tasty. A super-simple sauce packed with spinach and tomatoes is topped with mozzarella cheese', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(46, 'Black Kale Pesto Pasta', 'Pesto is an old-time favorite, as you just put all the ingredients in a blender, cook pasta al dente, and you are set for dinner.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(47, 'Butternut Squash Pasta With Sage', 'This creamy and hearty butternut squash pasta is what you are looking for', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(48, 'Asparagus Pesto Pasta', 'When asparagus is in season, this asparagus pesto pasta is a great alternative to the classic pesto recipe.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(49, 'Vegan Mushroom Pasta', 'A creamy mushroom pasta, ready in less than 30 minutes. Each mouthful explodes with flavors. Perfect for a quick, comforting dinner!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(50, 'Roasted Eggplant Pasta ', 'Roasted Eggplant Pasta is a delicious delicacy', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(51, 'Vegan Stir-Fry Noodles', 'This stir-fry udon noodles recipe comes together quickly. It’s delicious and very satisfying.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(52, 'Mexican Quinoa', 'black beans, juicy tomatoes, crunchy sweet corn, and creamy avocados makes you drool, this Mexican Quinoa is the perfect dinner recipe you', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(53, 'Vegetarian Paella', ' You don’t need to use the veggies in the recipe. Anything you have in your fridge or freezer works! It’s so easy!', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(54, 'Coconut Lentil Curry', 'This gluten-free, dairy-free, and vegan coconut curry is made with canned lentils and rich coconut milk cream.', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(55, 'Red Lentil Soup With Spinach And Carrots', 'This red lentil soup is quick, simple, and easy to throw together. Made with wholesome red split lentils, it comes together in just 30 minutes', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49'),
(56, 'Crispy Quinoa Sweet Potato Fritters', 'Crispy Quinoa Sweet Potato Fritters', NULL, '2021-08-05 13:16:49', '2021-08-05 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `meal_items`
--

DROP TABLE IF EXISTS `meal_items`;
CREATE TABLE IF NOT EXISTS `meal_items` (
  `meal_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('main','side') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_items`
--

INSERT INTO `meal_items` (`meal_id`, `item_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'side', '2021-08-04 22:33:05', '2021-08-04 22:33:05'),
(1, 11, 'main', '2021-08-04 22:33:05', '2021-08-04 22:33:05'),
(2, 1, 'side', '2021-08-05 07:36:04', '2021-08-05 07:36:04'),
(2, 3, 'main', '2021-08-05 07:36:04', '2021-08-05 07:36:04'),
(2, 4, 'side', '2021-08-06 11:24:23', '2021-08-06 11:24:23'),
(3, 1, 'side', '2021-08-06 13:43:10', '2021-08-06 13:43:10'),
(3, 4, 'main', '2021-08-06 13:43:10', '2021-08-06 13:43:10'),
(3, 13, 'side', '2021-08-06 13:43:10', '2021-08-06 13:43:10'),
(4, 1, 'side', '2021-08-06 13:44:46', '2021-08-06 13:44:46'),
(4, 2, 'main', '2021-08-06 13:44:46', '2021-08-06 13:44:46'),
(4, 12, 'side', '2021-08-06 13:44:47', '2021-08-06 13:44:47'),
(5, 10, 'side', '2021-08-06 13:46:09', '2021-08-06 13:46:09'),
(5, 11, 'main', '2021-08-06 13:46:09', '2021-08-06 13:46:09'),
(5, 13, 'side', '2021-08-06 13:46:09', '2021-08-06 13:46:09'),
(6, 16, 'side', '2021-08-06 13:48:31', '2021-08-06 13:48:31'),
(6, 12, 'main', '2021-08-06 13:48:31', '2021-08-06 13:48:31'),
(6, 13, 'side', '2021-08-06 13:48:31', '2021-08-06 13:48:31'),
(7, 16, 'side', '2021-08-06 13:56:23', '2021-08-06 13:56:23'),
(7, 22, 'main', '2021-08-06 13:56:23', '2021-08-06 13:56:23'),
(7, 13, 'side', '2021-08-06 13:56:23', '2021-08-06 13:56:23'),
(8, 15, 'side', '2021-08-06 13:58:57', '2021-08-06 13:58:57'),
(8, 14, 'main', '2021-08-06 13:58:57', '2021-08-06 13:58:57'),
(8, 9, 'side', '2021-08-06 13:58:57', '2021-08-06 13:58:57'),
(9, 16, 'side', '2021-08-06 14:00:08', '2021-08-06 14:00:08'),
(9, 21, 'main', '2021-08-06 14:00:08', '2021-08-06 14:00:08'),
(9, 40, 'side', '2021-08-06 14:00:08', '2021-08-06 14:00:08'),
(10, 17, 'side', '2021-08-06 14:02:00', '2021-08-06 14:02:00'),
(10, 21, 'main', '2021-08-06 14:02:00', '2021-08-06 14:02:00'),
(10, 22, 'side', '2021-08-06 14:02:00', '2021-08-06 14:02:00'),
(11, 19, 'side', '2021-08-06 14:16:38', '2021-08-06 14:16:38'),
(11, 18, 'main', '2021-08-06 14:16:38', '2021-08-06 14:16:38'),
(11, 21, 'side', '2021-08-06 14:16:38', '2021-08-06 14:16:38'),
(12, 23, 'side', '2021-08-06 14:17:41', '2021-08-06 14:17:41'),
(12, 19, 'main', '2021-08-06 14:17:41', '2021-08-06 14:17:41'),
(12, 24, 'side', '2021-08-06 14:17:41', '2021-08-06 14:17:41'),
(13, 14, 'side', '2021-08-06 14:19:43', '2021-08-06 14:19:43'),
(13, 20, 'main', '2021-08-06 14:19:43', '2021-08-06 14:19:43'),
(13, 21, 'side', '2021-08-06 14:19:43', '2021-08-06 14:19:43'),
(14, 22, 'side', '2021-08-06 14:20:42', '2021-08-06 14:20:42'),
(14, 21, 'main', '2021-08-06 14:20:42', '2021-08-06 14:20:42'),
(14, 27, 'side', '2021-08-06 14:20:42', '2021-08-06 14:20:42'),
(15, 20, 'side', '2021-08-06 14:22:11', '2021-08-06 14:22:11'),
(15, 22, 'main', '2021-08-06 14:22:11', '2021-08-06 14:22:11'),
(15, 15, 'side', '2021-08-06 14:22:11', '2021-08-06 14:22:11'),
(16, 24, 'side', '2021-08-06 14:23:51', '2021-08-06 14:23:51'),
(16, 23, 'main', '2021-08-06 14:23:51', '2021-08-06 14:23:51'),
(16, 32, 'side', '2021-08-06 14:23:51', '2021-08-06 14:23:51'),
(17, 24, 'side', '2021-08-06 14:24:39', '2021-08-06 14:24:39'),
(17, 23, 'main', '2021-08-06 14:24:39', '2021-08-06 14:24:39'),
(17, 21, 'side', '2021-08-06 14:24:39', '2021-08-06 14:24:39'),
(18, 26, 'side', '2021-08-06 14:25:34', '2021-08-06 14:25:34'),
(18, 25, 'main', '2021-08-06 14:25:34', '2021-08-06 14:25:34'),
(18, 33, 'side', '2021-08-06 14:25:34', '2021-08-06 14:25:34'),
(17, 26, 'side', '2021-08-06 14:26:31', '2021-08-06 14:26:31'),
(17, 29, 'main', '2021-08-06 14:26:31', '2021-08-06 14:26:31'),
(17, 35, 'side', '2021-08-06 14:26:31', '2021-08-06 14:26:31'),
(17, 25, 'main', '2021-08-06 14:26:45', '2021-08-06 14:26:45'),
(17, 33, 'side', '2021-08-06 14:26:45', '2021-08-06 14:26:45'),
(18, 29, 'main', '2021-08-06 14:27:38', '2021-08-06 14:27:38'),
(18, 35, 'side', '2021-08-06 14:27:38', '2021-08-06 14:27:38'),
(19, 26, 'side', '2021-08-06 14:28:49', '2021-08-06 14:28:49'),
(19, 29, 'main', '2021-08-06 14:28:49', '2021-08-06 14:28:49'),
(19, 35, 'side', '2021-08-06 14:28:49', '2021-08-06 14:28:49'),
(20, 26, 'side', '2021-08-06 14:29:02', '2021-08-06 14:29:02'),
(20, 29, 'main', '2021-08-06 14:29:02', '2021-08-06 14:29:02'),
(20, 34, 'side', '2021-08-06 14:29:02', '2021-08-06 14:29:02'),
(21, 20, 'side', '2021-08-06 14:30:18', '2021-08-06 14:30:18'),
(21, 29, 'main', '2021-08-06 14:30:18', '2021-08-06 14:30:18'),
(21, 34, 'side', '2021-08-06 14:30:18', '2021-08-06 14:30:18'),
(22, 29, 'side', '2021-08-06 14:33:06', '2021-08-06 14:33:06'),
(22, 30, 'main', '2021-08-06 14:33:06', '2021-08-06 14:33:06'),
(22, 32, 'side', '2021-08-06 14:33:06', '2021-08-06 14:33:06'),
(23, 34, 'side', '2021-08-06 14:34:25', '2021-08-06 14:34:25'),
(23, 31, 'main', '2021-08-06 14:34:25', '2021-08-06 14:34:25'),
(23, 32, 'side', '2021-08-06 14:34:25', '2021-08-06 14:34:25'),
(24, 33, 'side', '2021-08-06 14:35:26', '2021-08-06 14:35:26'),
(24, 32, 'main', '2021-08-06 14:35:26', '2021-08-06 14:35:26'),
(24, 39, 'side', '2021-08-06 14:35:26', '2021-08-06 14:35:26'),
(25, 36, 'side', '2021-08-06 14:36:20', '2021-08-06 14:36:20'),
(25, 33, 'main', '2021-08-06 14:36:20', '2021-08-06 14:36:20'),
(25, 37, 'side', '2021-08-06 14:36:20', '2021-08-06 14:36:20'),
(26, 23, 'side', '2021-08-06 14:45:46', '2021-08-06 14:45:46'),
(26, 21, 'main', '2021-08-06 14:45:46', '2021-08-06 14:45:46'),
(26, 22, 'side', '2021-08-06 14:45:46', '2021-08-06 14:45:46'),
(27, 29, 'side', '2021-08-06 14:46:46', '2021-08-06 14:46:46'),
(27, 26, 'main', '2021-08-06 14:46:46', '2021-08-06 14:46:46'),
(27, 36, 'side', '2021-08-06 14:46:46', '2021-08-06 14:46:46'),
(28, 38, 'side', '2021-08-06 14:47:38', '2021-08-06 14:47:38'),
(28, 36, 'main', '2021-08-06 14:47:38', '2021-08-06 14:47:38'),
(28, 37, 'side', '2021-08-06 14:47:38', '2021-08-06 14:47:38'),
(28, 39, 'side', '2021-08-06 14:48:10', '2021-08-06 14:48:10'),
(29, 39, 'side', '2021-08-06 14:48:18', '2021-08-06 14:48:18'),
(29, 36, 'main', '2021-08-06 14:48:18', '2021-08-06 14:48:18'),
(29, 37, 'side', '2021-08-06 14:48:18', '2021-08-06 14:48:18'),
(30, 37, 'side', '2021-08-06 14:49:25', '2021-08-06 14:49:25'),
(30, 38, 'main', '2021-08-06 14:49:25', '2021-08-06 14:49:25'),
(30, 18, 'side', '2021-08-06 14:49:25', '2021-08-06 14:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_02_222008_create_meals_table', 1),
(5, '2021_08_02_222046_create_allergies_table', 1),
(6, '2021_08_02_222106_create_items_table', 1),
(7, '2021_08_02_222247_create_user_allergies_table', 1),
(8, '2021_08_02_222319_create_meal_items_table', 1),
(9, '2021_08_02_222345_create_item_allergies_table', 1),
(10, '2021_08_05_104332_create_cache_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brad Pitt', 'pit@onubrooksapi.com', NULL, '$2y$10$5YoHuGIR.NFYmfgHdAiD1uVNrJJqngqT2bPa9Yuxn5xrziPHtOMnS', NULL, '2021-08-04 21:55:02', '2021-08-04 21:55:10'),
(2, 'Harvey Specter', 'harvey@onubrooksapi.com', NULL, '$2y$10$lMOfeDOmPrybpxwDuP3Dh.etk5FO2j08831Bvj4NoWHKo2dB/BOvG', NULL, '2021-08-05 08:01:54', '2021-08-05 08:01:54'),
(3, 'Idris Elba', 'elba@onubrooks.io', NULL, '$2y$10$vDsGE6T0WXWq0lMrn/Si7uyhHHZ85xZF.xMXU2xV4hJFzfxzl1GPO', NULL, '2021-08-05 13:16:50', '2021-08-05 13:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_allergies`
--

DROP TABLE IF EXISTS `user_allergies`;
CREATE TABLE IF NOT EXISTS `user_allergies` (
  `user_id` int(11) NOT NULL,
  `allergy_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_allergies`
--

INSERT INTO `user_allergies` (`user_id`, `allergy_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-08-05 08:00:45', '2021-08-05 08:00:45'),
(1, 1, '2021-08-05 08:00:45', '2021-08-05 08:00:45'),
(2, 2, '2021-08-05 08:02:20', '2021-08-05 08:02:20'),
(3, 1, '2021-08-05 13:19:28', '2021-08-05 13:19:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
