-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 10:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'Azeem', 'Akram', 'blogadmin@gmail.com', '$2y$10$PXWZJfqpGF24WZGVOMFbQehUAB7BBQFzugZAFWb55E.6bLT93u/IW', '2024-04-02 20:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `type` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `image`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Opinion: Is the US on the brink of another civil war', 'gettyimages-2059255165.webp', 'Three months into 2024, it seems dire predictions of political violence are now commonly issued both by the country’s extreme fringes as well as from the mainstream. Former President Donald Trump has been perhaps the most vociferous prognosticator, warning that there would be “bedlam in the country” should the criminal charges against him lead to a 2024 election loss. Nowadays, even seemingly mundane political procedures can also result in promises of violence. When the US Supreme Court sided with the Biden administration in January, allowing federal border agents to remove concertina wire put in place by the state of Texas, some in elected office said it was a sign of civil war. In its threat assessment for 2024, the Department of Homeland Security forecast that, among other threats, the 2024 election cycle would be a “key event for possible violence…”\r\nIn her 2022 book, “How Civil Wars Start: And How to Stop Them,” renowned political scientist Barbara F. Walter argues that “we are closer to civil war than any of us would like to believe” because of a toxic mix of political extremism and polarization, social and cultural tribalism, the popular embrace of conspiracy theories, proliferation of guns and well-armed militias and the erosion of faith in government and the liberal, Western democratic state. Among the key factors she cites is accelerationism — which Walter describes as “the apocalyptic belief that modern society is irredeemable and that its end must be hastened, so that a new order can be brought into being.”', 4, '2024-03-20 20:29:04', '2024-03-20 20:19:38'),
(2, 'Panic mode sets in for Trump as he faces deadline for massive bond US', '230627211612-trump-tape-republicans-2024.jpeg', 'Trump’s lawyers acknowledged Monday that he was struggling to find an insurance company willing to underwrite his $454 million bond. Privately, Trump had been counting on Chubb, which underwrote his $91.6 million bond to cover the E. Jean Carroll judgment, to come through, but the insurance giant informed his attorneys in the last several days that that option was off the table.\r\nTrump’s team has sought out wealthy supporters and weighed what assets could be sold – and fast. The presumptive GOP presidential nominee himself has become increasingly concerned about the optics the March 25 deadline could present – especially the prospect that someone whose identity has long been tied to his wealth would confront financial crisis. Trump has continued to privately lash out at the New York Attorney General Letitia James and Judge Arthur Engoron over the matter, these sources told CNN.', 2, '2024-03-26 20:50:02', '2024-03-20 20:21:59'),
(3, 'Fed meeting recap: Everything Powell said during Wednesday’s market', 'abc.webp', 'The three major averages hovered near the flatline as investors braced themselves for the Federal Reserve’s rate decision.\r\n\r\nThe S&P 500 inched downward by 0.06%, while the Nasdaq Composite ticked lower by 0.08%, as of 1:36 p.m. ET. The Dow Jones Industrial Average slipped by roughly 6 points, or 0.02%.The three major averages hovered near the flatline as investors braced themselves for the Federal Reserve’s rate decision.\r\n\r\nThe S&P 500 inched downward by 0.06%, while the Nasdaq Composite ticked lower by 0.08%, as of 1:36 p.m. ET. The Dow Jones Industrial Average slipped by roughly 6 points, or 0.02%.', 4, '2024-03-20 21:13:33', '2024-03-20 21:13:33'),
(4, 'Dollar Tree Easter 2024 DIY’s', 'IMG_3878.jpeg', 'Hey guys! I am so excited for these brand new Easter Dollar Tree DIY‘s for 2024! All of these are of course, super simple to create and very customizable. I really wanted to go with a high end rustic feel for my DIY‘s, but you can definitely switch out the look by just picking brighter colors or even pastel colors if those are more your style. My favorite DIY from this set definitely has to be the wood block pieces in Easter shapes. They got a complete transformation by just using scrapbooking paper, it is so simple, but looks so elegant. I even have some free printable’s down below for some one minute DIY’s that take no time at all! Don’t forget to watch the video below to see how everything came together.\r\nHey guys! I am so excited for these brand new Easter Dollar Tree DIY‘s for 2024! All of these are of course, super simple to create and very customizable. I really wanted to go with a high end rustic feel for my DIY‘s, but you can definitely switch out the look by just picking brighter colors or even pastel colors if those are more your style. My favorite DIY from this set definitely has to be the wood block pieces in Easter shapes. They got a complete transformation by just using scrapbooking paper, it is so simple, but looks so elegant. I even have some free printable’s down below for some one minute DIY’s that take no time at all! Don’t forget to watch the video below to see how everything came together.\r\nHey guys! I am so excited for these brand new Easter Dollar Tree DIY‘s for 2024! All of these are of course, super simple to create and very customizable. I really wanted to go with a high end rustic feel for my DIY‘s, but you can definitely switch out the look by just picking brighter colors or even pastel colors if those are more your style. My favorite DIY from this set definitely has to be the wood block pieces in Easter shapes. They got a complete transformation by just using scrapbooking paper, it is so simple, but looks so elegant. I even have some free printable’s down below for some one minute DIY’s that take no time at all! Don’t forget to watch the video below to see how everything came together.\r\nHey guys! I am so excited for these brand new Easter Dollar Tree DIY‘s for 2024! All of these are of course, super simple to create and very customizable. I really wanted to go with a high end rustic feel for my DIY‘s, but you can definitely switch out the look by just picking brighter colors or even pastel colors if those are more your style. My favorite DIY from this set definitely has to be the wood block pieces in Easter shapes. They got a complete transformation by just using scrapbooking paper, it is so simple, but looks so elegant. I even have some free printable’s down below for some one minute DIY’s that take no time at all! Don’t forget to watch the video below to see how everything came together.', 2, '2024-03-26 20:39:51', '2024-03-26 20:39:51'),
(5, 'Opinion: Is the US on the brink of another civil war', 'gettyimages-2059255165.webp', 'Three months into 2024, it seems dire predictions of political violence are now commonly issued both by the country’s extreme fringes as well as from the mainstream. Former President Donald Trump has been perhaps the most vociferous prognosticator, warning that there would be “bedlam in the country” should the criminal charges against him lead to a 2024 election loss. Nowadays, even seemingly mundane political procedures can also result in promises of violence. When the US Supreme Court sided with the Biden administration in January, allowing federal border agents to remove concertina wire put in place by the state of Texas, some in elected office said it was a sign of civil war. In its threat assessment for 2024, the Department of Homeland Security forecast that, among other threats, the 2024 election cycle would be a “key event for possible violence…”\r\nIn her 2022 book, “How Civil Wars Start: And How to Stop Them,” renowned political scientist Barbara F. Walter argues that “we are closer to civil war than any of us would like to believe” because of a toxic mix of political extremism and polarization, social and cultural tribalism, the popular embrace of conspiracy theories, proliferation of guns and well-armed militias and the erosion of faith in government and the liberal, Western democratic state. Among the key factors she cites is accelerationism — which Walter describes as “the apocalyptic belief that modern society is irredeemable and that its end must be hastened, so that a new order can be brought into being.”', 5, '2024-03-20 20:29:04', '2024-03-20 20:19:38'),
(6, 'Opinion: Is the US on the brink of another civil war', 'gettyimages-2059255165.webp', 'Three months into 2024, it seems dire predictions of political violence are now commonly issued both by the country’s extreme fringes as well as from the mainstream. Former President Donald Trump has been perhaps the most vociferous prognosticator, warning that there would be “bedlam in the country” should the criminal charges against him lead to a 2024 election loss. Nowadays, even seemingly mundane political procedures can also result in promises of violence. When the US Supreme Court sided with the Biden administration in January, allowing federal border agents to remove concertina wire put in place by the state of Texas, some in elected office said it was a sign of civil war. In its threat assessment for 2024, the Department of Homeland Security forecast that, among other threats, the 2024 election cycle would be a “key event for possible violence…”\r\nIn her 2022 book, “How Civil Wars Start: And How to Stop Them,” renowned political scientist Barbara F. Walter argues that “we are closer to civil war than any of us would like to believe” because of a toxic mix of political extremism and polarization, social and cultural tribalism, the popular embrace of conspiracy theories, proliferation of guns and well-armed militias and the erosion of faith in government and the liberal, Western democratic state. Among the key factors she cites is accelerationism — which Walter describes as “the apocalyptic belief that modern society is irredeemable and that its end must be hastened, so that a new order can be brought into being.”', 5, '2024-03-20 20:29:04', '2024-03-20 20:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Social'),
(2, 'Living Style'),
(3, 'Technology'),
(4, 'Political'),
(7, 'Fashion'),
(13, 'Space');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `blog_post_id`, `isApproved`) VALUES
(3, 'Test comment 2', 3, 1, 1),
(5, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search', 4, 1, 1),
(7, 'Test comment from test user', 6, 2, 0),
(8, 'Test comment', 4, 2, 1),
(9, 'This is another comment', 4, 2, 1),
(10, 'Test', 8, 2, 1),
(11, 'Test', 8, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'Azeem', 'Akram', 'azeemakram1997@gmail.com', '$2y$10$QvFnCiylpcGrfuj.DAwgaubOojB./AMY4paO/HEUBMOE1BILfeGyu', '2024-03-07 01:49:48'),
(3, 'Azeem', 'Akram', 'azeemakram126@gmail.com', '$2y$10$9QalRRexJ/dEJqGOkcCgxeM0bHkQu.7juFWVT2NsZ0N8H3VcMi4PO', '2024-03-23 00:01:30'),
(4, 'Syed', 'Sadat', 'syedsadat@gmail.com', '$2y$10$bJQXQf36NppHQNaicG8KeehXu9S/EY2GRfDoJxCkpwBS6cBPCrswm', '2024-03-23 00:49:43'),
(5, 'Azeem', 'Akram', 'syedsadat11@gmail.com', '$2y$10$PXWZJfqpGF24WZGVOMFbQehUAB7BBQFzugZAFWb55E.6bLT93u/IW', '2024-04-03 01:44:45'),
(8, 'Test', 'user', 'test123@gmail.com', '$2y$10$yGws2I923TTjLtl3Gs6zAOYWppnJJu7twYaT1LbX1vhqzMBTYw53G', '2024-06-01 01:00:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
