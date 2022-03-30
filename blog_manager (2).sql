-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

CREATE TABLE `ci_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `status`, `last_login`, `is_verify`, `is_admin`, `is_active`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Admin', 'User', 'admin@admin.com', '544354353', '', '$2y$10$dHJDXoy75KG65ybjIWeE4unVxI42Tulbw/Vl9UHuWSRS7JiFGnzhO', 0, '2019-01-09 00:00:00', 1, 1, 1, '', '', '', '2018-03-19 00:00:00', '2021-05-26 06:05:46'),
(2, 2, 'admin1', 'admin1', 'sdfsdfsdf', 'admin1@gmail.com', '654987321', '', '$2y$10$ZXFohMsZ/.3P3eEtoTOoiOHKtR40lz3xH4Ltso9nZLFjZUvaKCGZG', 0, '0000-00-00 00:00:00', 1, 1, 1, 'd2ddea18f00665ce8623e36bd4e3c7c5', '', '', '2021-03-27 00:00:00', '2021-05-19 10:05:33'),
(3, 2, 'subadmin', 'demo', 'sharma', 'demo@gmail.com', '7894561230', '', '$2y$10$j.cEGSpIwmtb6GkLVPapEem8.yzaCYX1zhGhSuiilrYv.Gjwasga6', 0, '0000-00-00 00:00:00', 1, 1, 1, '', '', '', '2021-05-19 10:05:04', '2021-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_blogs`
--

CREATE TABLE `ci_blogs` (
  `id` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL COMMENT 'Seo URL',
  `name` varchar(250) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `sort_description` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `blog_date` date NOT NULL,
  `posted_by` varchar(250) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_blogs`
--

INSERT INTO `ci_blogs` (`id`, `slug`, `name`, `category_id`, `image`, `sort_description`, `description`, `blog_date`, `posted_by`, `sort_order`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'Servo Project Joins The Linux Foundation Fold Desco', NULL, 'assets/img/blogs/bbd483d4874388188285f5f9bd8dab2b.jpg', 'We denounce with righteous indige nation and dislike men who are so beguiled.', '<p>We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.<br></p>', '2021-05-20', 'Admin', 1, 1, 0, 0, '2021-05-20 05:05:01', '2021-05-20 05:05:01'),
(2, 'blog_development', 'Necessity May Give Us Your Best Virtual Court System', 2, 'assets/img/blogs/c89cf7e09c702d6807792922ae073623.jpg', 'At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.', '<p>At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for managing database.<br></p>', '2021-05-22', 'Admin', 2, 1, 0, 0, '2021-05-20 05:05:40', '2022-03-04 00:00:00'),
(3, '', 'Tech Products That Makes Its Easier to Stay at Home', NULL, 'assets/img/blogs/bf05f9aab8649bf32c07152e8ee077c0.jpg', 'We denounce with righteous indige nation and dislike men who are so beguiled.', '<p>We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.We denounce with righteous indige nation and dislike men who are so beguiled.<br></p>', '2021-05-21', 'Admin', 3, 1, 0, 0, '2021-05-20 05:05:28', '2021-05-20 05:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `ci_categories`
--

CREATE TABLE `ci_categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL COMMENT 'Seo URL',
  `parent_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `sort_order` int(3) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `meta_description` varchar(250) NOT NULL,
  `is_feature` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1= feature, 0= non feature ',
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1= active, 0=inactive ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`id`, `slug`, `parent_id`, `name`, `image`, `sort_order`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `is_feature`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 0, 'Gold', '', 1, 'Gold', 'Gold', 'Gold', 'Gold', 1, 1, 1, 1, '2021-05-21 12:05:26', '2021-05-22 10:05:59'),
(2, 'silver', 0, 'Silver', '', 2, 'Silver', 'Silver', 'Silver', 'Silver', 1, 1, 1, 1, '2021-05-21 12:05:47', '2021-05-22 12:05:46'),
(3, 'necessity', 0, 'Manager', 'assets/img/category/59c9c1f2c733cbf1a7ff09052c8a9747.jpg', 1, 'sdfas', 'asdfasdf', 'asdfasdfasd', 'asdfasdf', 1, 1, 1, 1, '2021-06-30 00:00:00', '2021-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_cms`
--

CREATE TABLE `ci_cms` (
  `id` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL COMMENT 'Seo URL',
  `cms_name` varchar(200) NOT NULL,
  `cms_title` varchar(200) NOT NULL,
  `cms_contant` text NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `cms_banner` varchar(250) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1= active, 0=inactive',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_cms`
--

INSERT INTO `ci_cms` (`id`, `slug`, `cms_name`, `cms_title`, `cms_contant`, `meta_title`, `meta_keyword`, `meta_description`, `cms_banner`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'home', 'Home About Second Line', 'Home About Second', '<div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-6 hidden-md\">\r\n                <div class=\"images\">\r\n                   <img src=\"images/about/about-5.png\" alt=\"\"> \r\n                </div> \r\n            </div>\r\n            <div class=\"col-lg-6 pl-60 md-pl-15\">\r\n                <div class=\"sec-title mb-30\">\r\n                    <div class=\"sub-text style4-bg\">About Us</div>\r\n                    <h2 class=\"title pb-20\">\r\n                       We are increasing business success with technology\r\n                    </h2>\r\n                    <div class=\"desc\">\r\n                       We bring digital solutions using the latest web/app technology trend that makes us the best web development company in jodhpur .\r\n                    </div>\r\n                </div> \r\n               <div class=\"rs-skillbar style1 home4\">\r\n                   <div class=\"cl-skill-bar\"> \r\n                      <span class=\"skillbar-title\">Web Development</span>\r\n                      <div class=\"skillbar\" data-percent=\"92\">\r\n                          <p class=\"skillbar-bar\"></p>\r\n                          <span class=\"skill-bar-percent\"></span> \r\n                      </div> \r\n                      <span class=\"skillbar-title\">Mobile App Development</span>\r\n                      <div class=\"skillbar\" data-percent=\"80\">\r\n                          <p class=\"skillbar-bar paste-bg\"></p>\r\n                          <span class=\"skill-bar-percent\"></span> \r\n                      </div> \r\n                      <span class=\"skillbar-title\">E-commerce Solutions</span>\r\n                      <div class=\"skillbar\" data-percent=\"95\">\r\n                          <p class=\"skillbar-bar blue-bg\"></p>\r\n                          <span class=\"skill-bar-percent\"></span> \r\n                      </div>     \r\n                      <span class=\"skillbar-title\">Digital Marketing</span>\r\n                      <div class=\"skillbar\" data-percent=\"78\">\r\n                          <p class=\"skillbar-bar pink-bg\"></p>\r\n                          <span class=\"skill-bar-percent\"></span> \r\n                      </div>\r\n                      <div class=\"btn-part mt-45\">\r\n                          <a class=\"readon started\" href=\"contact_us\">Get Started</a>\r\n                      </div>\r\n                  </div>\r\n               </div> \r\n            </div>\r\n        </div>\r\n    </div>', 'Home About Second', 'Home About Second', 'Home About Second', '', 1, 0, 1, '2021-03-27 13:14:39', '2021-06-11 08:06:22'),
(3, 'about_us', 'About Us', 'About Us', '<div class=\"container\">\r\n        <div class=\"row align-items-center\">\r\n            <div class=\"col-lg-5\">\r\n                <div class=\"sec-title mb-50\">\r\n                    <div class=\"sub-text style4-bg\">About Us</div>\r\n                    <h2 class=\"title pb-20\">\r\n                       Working with 10+ years of the experienced team\r\n                    </h2>\r\n                    <div class=\"desc\">\r\n                      Leading web development company in Jodhpur that has a wide range of services such as web design, development and digital marketing. \r\n                      We Do- Listen, plan, implement and test - our experienced team delivers high quality, affordable web and mobile app solutions all over the globe.\r\n                    </div>\r\n                </div> \r\n                <div class=\"rs-counter style3\">\r\n                    <div class=\"container\">\r\n                        <div class=\"counter-top-area\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-sm-6 sm-pr-0 sm-pl-0 xs-mb-30\">\r\n                                    <div class=\"counter-list\">\r\n                                        <div class=\"counter-text\">\r\n                                            <div class=\"count-number\">\r\n                                                <span class=\"rs-count plus orange-color\">450</span>\r\n                                            </div>\r\n                                            <h3 class=\"title\">Happy Clients</h3>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                                <div class=\"col-sm-6 sm-pr-0 sm-pl-0\">\r\n                                    <div class=\"counter-list\">\r\n                                        <div class=\"counter-text\">\r\n                                            <div class=\"count-number\">\r\n                                                <span class=\"rs-count plus\">750</span>\r\n                                            </div>\r\n                                            <h3 class=\"title\">Project Delivered</h3>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                            </div> \r\n                        </div>\r\n                    </div>\r\n                </div> \r\n            </div>\r\n            <div class=\"col-lg-7\"> \r\n                <div class=\"rs-services style3 md-pt-50\">\r\n                    <div class=\"container\">\r\n                        <div class=\"row\">\r\n                            <div class=\"col-md-6 pr-10 pt-40 sm-pt-0 sm-pr-0 sm-pl-0\">\r\n                               <div class=\"services-item mb-20\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/1.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/1.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Optimized Code</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Easy functionality with modern frameworks that increase your platform loading speed.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>\r\n                               <div class=\"services-item cyan-bg\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/2.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/2.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Experienced Team</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Individual team to perform each task with the result based analysis report.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>  \r\n                            </div>\r\n                            <div class=\"col-md-6 pl-10 sm-pr-0 sm-pl-0 sm-mt-20\">\r\n                               <div class=\"services-item gold-bg mb-20\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/3.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/3.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Agile Approach</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                             Get requirements to perform development, implementation and testing.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>\r\n                               <div class=\"services-item blue-bg\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/4.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/4.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Quick Support</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Available to solve any problem within a very short time.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>  \r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div> \r\n            </div>\r\n        </div>\r\n    </div>', 'About Us', 'About Us', 'About Us', 'assets/img/cms/6a399bceff2fcc3ac4e302fdee845b00.jpg', 1, 1, 1, '2021-05-20 03:05:48', '2021-07-03 00:00:00'),
(1, 'home', 'Home About First Line', 'Home About First', '<div class=\"container\">\r\n        <div class=\"row align-items-center\">\r\n            <div class=\"col-lg-5\">\r\n                <div class=\"sec-title mb-50\">\r\n                    <div class=\"sub-text style4-bg\">About Us</div>\r\n                    <h2 class=\"title pb-20\">\r\n                       Working with 10+ years of the experienced team\r\n                    </h2>\r\n                    <div class=\"desc\">\r\n                      Leading web development company in Jodhpur that has a wide range of services such as web design, development and digital marketing. \r\n                      We Do- Listen, plan, implement and test - our experienced team delivers high quality, affordable web and mobile app solutions all over the globe.\r\n                    </div>\r\n                </div> \r\n                <div class=\"rs-counter style3\">\r\n                    <div class=\"container\">\r\n                        <div class=\"counter-top-area\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-sm-6 sm-pr-0 sm-pl-0 xs-mb-30\">\r\n                                    <div class=\"counter-list\">\r\n                                        <div class=\"counter-text\">\r\n                                            <div class=\"count-number\">\r\n                                                <span class=\"rs-count plus orange-color\">450</span>\r\n                                            </div>\r\n                                            <h3 class=\"title\">Happy Clients</h3>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                                <div class=\"col-sm-6 sm-pr-0 sm-pl-0\">\r\n                                    <div class=\"counter-list\">\r\n                                        <div class=\"counter-text\">\r\n                                            <div class=\"count-number\">\r\n                                                <span class=\"rs-count plus\">750</span>\r\n                                            </div>\r\n                                            <h3 class=\"title\">Project Delivered</h3>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                            </div> \r\n                        </div>\r\n                    </div>\r\n                </div> \r\n            </div>\r\n            <div class=\"col-lg-7\"> \r\n                <div class=\"rs-services style3 md-pt-50\">\r\n                    <div class=\"container\">\r\n                        <div class=\"row\">\r\n                            <div class=\"col-md-6 pr-10 pt-40 sm-pt-0 sm-pr-0 sm-pl-0\">\r\n                               <div class=\"services-item mb-20\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/1.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/1.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Optimized Code</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Easy functionality with modern frameworks that increase your platform loading speed.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>\r\n                               <div class=\"services-item cyan-bg\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/2.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/2.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Experienced Team</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Individual team to perform each task with the result based analysis report.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>  \r\n                            </div>\r\n                            <div class=\"col-md-6 pl-10 sm-pr-0 sm-pl-0 sm-mt-20\">\r\n                               <div class=\"services-item gold-bg mb-20\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/3.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/3.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Agile Approach</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                             Get requirements to perform development, implementation and testing.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>\r\n                               <div class=\"services-item blue-bg\">\r\n                                   <div class=\"services-icon\">\r\n                                       <div class=\"image-part\">\r\n                                           <img class=\"main-img\" src=\"images/services/style3/main-img/4.png\" alt=\"\">\r\n                                           <img class=\"hover-img\" src=\"images/services/style3/hover-img/4.png\" alt=\"\">\r\n                                       </div>\r\n                                   </div>\r\n                                   <div class=\"services-content\">\r\n                                       <div class=\"services-text\">\r\n                                           <h3 class=\"title\"><a href=\"web-development.html\">Quick Support</a></h3>\r\n                                       </div>\r\n                                       <div class=\"services-desc\">\r\n                                           <p>\r\n                                              Available to solve any problem within a very short time.\r\n                                           </p>\r\n                                       </div>\r\n                                   </div>\r\n                               </div>  \r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div> \r\n            </div>\r\n        </div>\r\n    </div>', 'Home About First', 'Home About First', 'Home About First', '', 1, 1, 1, '2021-05-20 03:05:48', '2021-06-11 08:06:32'),
(4, 'demo', 'Career', 'Career', '<h2 class=\"mt-34\">Build Your Career with us <br></h2>\r\n<p> Cras enim urna, interdum nec porttitor vitae, sollicitudin eu eros. Praesent eget mollis nulla, non lacinia urna. Donec sit amet neque auctor, ornare dui rutrum, condimentum justo. Duis dictum, ex accumsan eleifend eleifend, ex justo aliquam nunc, in ultrices ante quam eget massa. Sed scelerisque, odio eu tempor pulvinar, magna tortor finibus lorem, ut mattis tellus nunc ut quam. Curabitur quis ornare leo. Suspendisse bibendum nibh non turpis vestibulum pellentesque. <br></p><ul><li>demo</li><li>ljsdlfjs</li><li>sdfjksdlkfj<br></li></ul>', 'Career', 'Career', 'Career', '', 1, 1, 1, '2021-05-20 03:05:48', '2021-06-18 02:06:18'),
(5, 'about_uss', 'Side Bar About', 'Build Your Career with us', '<p>asfas</p>', 'asdfasdf', 'asdfasdfasd', 'asdfasdf', 'assets/img/cms/87acae1bc7414a1ed7ddc37e627cf642.jpg', 1, 1, 1, '2021-06-30 00:00:00', '2021-07-03 00:00:00'),
(6, 'aassssss', 'Side Bar About', 'sidebar_about', '<p>asfdasdf</p>', 'asdf', 'asdf', 'asdfasdfas', '', 1, 1, 1, '2021-06-30 00:00:00', '2021-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_general_settings`
--

CREATE TABLE `ci_general_settings` (
  `id` int(11) NOT NULL,
  `setting_type` tinyint(5) NOT NULL COMMENT '''1''=>"General Setting", \r\n			''2''=>"Email Setting", \r\n			''3''=>"Social Setting", \r\n			''4''=>"Google reCAPTCHA",\r\n\r\n''5'' =>"SMS Setting"',
  `setting_name` varchar(100) NOT NULL,
  `filed_label` varchar(200) NOT NULL,
  `filed_name` varchar(200) NOT NULL,
  `filed_type` varchar(200) NOT NULL,
  `filed_value` text NOT NULL,
  `field_options` varchar(250) NOT NULL,
  `is_require` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=not, 1= require',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_general_settings`
--

INSERT INTO `ci_general_settings` (`id`, `setting_type`, `setting_name`, `filed_label`, `filed_name`, `filed_type`, `filed_value`, `field_options`, `is_require`, `created_date`, `updated_date`) VALUES
(1, 1, 'favicon', 'Favicon (25*25)', 'favicon', 'file', 'assets/img/3cfa4adbe5d81a5d5ff23b2ec612dd0a.jpg', '', 1, '2021-03-27 19:47:31', '2021-03-27 19:47:31'),
(2, 1, 'logo', 'Logo', 'logo', 'file', 'assets/img/bd70ba5a80849b49798a0c76491e4658.jpg', '', 1, '2021-03-27 19:47:31', '2021-03-27 19:47:31'),
(3, 1, 'application_name', 'Application Name', 'application_name', 'text', 'Blog Management System ', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(4, 1, 'timezone', 'Time Zone', 'timezone', 'text', 'Asia/Kolkata', '', 1, '2021-03-27 19:51:54', '2021-03-27 20:51:54'),
(6, 1, 'copyright', 'Copyright', 'copyright', 'text', 'Copyright © 2021 AYT All rights reserved.', '', 1, '2021-03-27 20:57:18', '2021-03-27 19:57:18'),
(12, 3, 'facebook_link', 'Facebook', 'facebook_link', 'text', 'https://facebook.com', '', 1, '2021-03-27 20:05:52', '2021-03-27 20:05:52'),
(13, 3, 'twitter_link', 'Twitter', 'twitter_link', 'text', 'https://twitter.com', '', 1, '2021-03-27 18:18:14', '2021-03-27 18:22:14'),
(14, 3, 'google_link', 'Google Plus', 'google_link', 'text', 'https://google.com', '', 1, '2021-03-27 18:17:50', '2021-03-27 18:19:50'),
(15, 3, 'youtube_link', 'Youtube', 'youtube_link', 'text', 'https://youtube.com', '', 1, '2021-03-27 18:23:27', '2021-03-27 18:20:27'),
(16, 3, 'linkedin_link', 'LinkedIn', 'linkedin_link', 'text', 'https://linkedin.com', '', 1, '2021-03-27 18:20:59', '2021-03-27 18:26:59'),
(17, 3, 'instagram_link', 'Instagram', 'instagram_link', 'text', 'https://instagram.com', '', 1, '2021-03-27 18:20:56', '2021-03-27 18:24:56'),
(18, 4, 'recaptcha_secret_key', 'Secret Key', 'recaptcha_secret_key', 'text', '', '', 1, '2021-03-30 13:01:15', '2021-03-30 13:01:15'),
(19, 4, 'recaptcha_site_key', 'Site Key', 'recaptcha_site_key', 'text', '', '', 1, '2021-03-30 12:03:19', '2021-03-30 13:03:19'),
(20, 4, 'recaptcha_lang', 'Language', 'recaptcha_lang', 'text', 'en', '', 1, '2021-03-30 14:03:53', '2021-03-30 14:03:53'),
(21, 1, 'meta_title', 'Site Meta Title', 'meta_title', 'text', 'Blog Management System ', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(22, 1, 'meta_keyword', 'Site Meta Keyword', 'meta_keyword', 'text', 'Blog Management System ', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(23, 1, 'meta_description', 'Site Meta Description', 'meta_description', 'textarea', 'Blog Management System ', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(27, 1, 'address', 'Address', 'address', 'textarea', 'Blog Management System ', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(28, 1, 'email', 'Email', 'email', 'text', 'email@test.com', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25'),
(29, 1, 'phone', 'Phone', 'phone', 'text', '1234567880', '', 1, '2021-03-27 17:49:32', '2021-03-27 20:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `ci_modules`
--

CREATE TABLE `ci_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `is_allow` tinyint(2) NOT NULL COMMENT '0=not, 1=allow',
  `is_add` tinyint(2) NOT NULL,
  `is_edit` tinyint(2) NOT NULL,
  `is_delete` tinyint(2) NOT NULL,
  `is_view` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_modules`
--

INSERT INTO `ci_modules` (`id`, `name`, `is_allow`, `is_add`, `is_edit`, `is_delete`, `is_view`) VALUES
(1, 'dashboard', 1, 0, 0, 0, 1),
(2, 'subadmin', 1, 1, 1, 1, 1),
(3, 'users', 1, 1, 1, 1, 1),
(4, 'cms', 1, 1, 1, 0, 1),
(5, 'category', 1, 1, 1, 1, 1),
(6, 'product', 1, 1, 1, 1, 1),
(7, 'service', 1, 1, 1, 1, 1),
(8, 'partner', 1, 1, 1, 1, 1),
(9, 'events', 1, 1, 1, 1, 1),
(10, 'team', 1, 1, 1, 1, 1),
(11, 'career', 1, 1, 1, 0, 1),
(12, 'testimonial', 1, 1, 1, 1, 1),
(13, 'banner', 1, 1, 1, 1, 1),
(14, 'inquiry', 1, 1, 1, 1, 1),
(15, 'general_settings', 1, 1, 1, 1, 1),
(16, 'export', 1, 0, 0, 0, 0),
(17, 'blogs', 1, 1, 1, 1, 1),
(18, 'photo_gallery', 1, 1, 1, 1, 1),
(19, 'news', 1, 1, 1, 1, 1),
(20, 'video_gallery', 1, 1, 1, 1, 1),
(21, 'faq', 1, 1, 1, 1, 1),
(22, 'site_image', 1, 1, 1, 1, 1),
(23, 'role', 1, 1, 1, 1, 1),
(24, 'mail', 1, 0, 1, 1, 1),
(25, 'sms', 1, 1, 1, 1, 1),
(26, 'whatsapp', 1, 0, 1, 1, 1),
(27, 'newsletter', 1, 1, 1, 1, 1),
(28, 'portfolio', 1, 1, 1, 1, 1),
(29, 'scroll_image', 1, 1, 1, 1, 1),
(30, 'tour_categories', 1, 1, 1, 1, 1),
(31, 'tour_list', 1, 1, 1, 1, 1),
(32, 'tour_package', 1, 1, 1, 1, 1),
(33, 'package_inquiry', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '12345', 0, 0, 0, NULL, '2018-10-11 13:34:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ci_blogs`
--
ALTER TABLE `ci_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_categories`
--
ALTER TABLE `ci_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_cms`
--
ALTER TABLE `ci_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_modules`
--
ALTER TABLE `ci_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_admin`
--
ALTER TABLE `ci_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_blogs`
--
ALTER TABLE `ci_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_categories`
--
ALTER TABLE `ci_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_cms`
--
ALTER TABLE `ci_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ci_general_settings`
--
ALTER TABLE `ci_general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ci_modules`
--
ALTER TABLE `ci_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
