-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 09:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thanhforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `bootstrap`
--

CREATE TABLE `bootstrap` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `content`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 6, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus', NULL, 1, '2016-07-29 02:32:50', '2016-08-04 09:13:21'),
(2, 6, 'Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 1, 1, '2016-07-29 03:47:39', '2016-07-29 03:47:39'),
(3, 6, 'Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 1, 1, '2016-07-29 03:50:34', '2016-07-29 03:50:34'),
(4, 6, ' Donec lacinia congue felis in faucibus.', 1, 1, '2016-07-29 03:58:02', '2016-07-29 03:58:02'),
(5, 6, 'In gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis', NULL, 1, '2016-07-29 03:58:27', '2016-08-04 09:07:43'),
(8, 6, 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 5, 1, '2016-08-08 16:28:08', '2016-08-15 03:44:03'),
(9, 6, 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', NULL, 1, '2016-08-08 16:31:29', '2016-08-15 03:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `laravel`
--

CREATE TABLE `laravel` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php`
--

CREATE TABLE `php` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `introduction` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `introduction`, `title`, `content`, `attachment`, `tag`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'Bootstrap makes front-end web development faster and easier. It''s made for folks of all skill levels, devices of all shapes, and projects of all sizes.', 'Designed for everyone, everywhere.', '<p>Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors,&nbsp;<a href="http://getbootstrap.com/css/#less">Less</a>&nbsp;and&nbsp;<a href="http://getbootstrap.com/css/#sass">Sass</a>. Quickly get started with precompiled CSS or build on the source</p>\r\n\r\n<p>Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries.</p>\r\n\r\n<p>With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.</p>\r\n\r\n<p>Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors,&nbsp;<a href="http://getbootstrap.com/css/#less">Less</a>&nbsp;and&nbsp;<a href="http://getbootstrap.com/css/#sass">Sass</a>. Quickly get started with precompiled CSS or build on the source</p>\r\n\r\n<p>Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries.</p>\r\n\r\n<p>With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.</p>\r\n', NULL, NULL, 1, '2016-07-25 11:01:02', '2016-08-04 06:59:11'),
(7, 'Bootstrap is downloadable in two forms, within which you''ll find the following directories and files, logically grouping common resources and providing both compiled and minified variations.', 'Autoprefixer required for Less/Sass', '<p><strong><a href="https://github.com/twbs/bootlint">Bootlint</a></strong>&nbsp;is the official Bootstrap HTML&nbsp;<a href="http://en.wikipedia.org/wiki/Lint_(software)">linter</a>&nbsp;tool. It automatically checks for several common HTML mistakes in webpages that are using Bootstrap in a fairly &quot;vanilla&quot; way. Vanilla Bootstrap&#39;s components/widgets require their parts of the DOM to conform to certain structures. Bootlint checks that instances of Bootstrap components have correctly-structured HTML. Consider adding Bootlint to your Bootstrap web development toolchain so that none of the common mistakes slow down your project&#39;s development.</p>\r\n\r\n<p>Stay up to date on the development of Bootstrap and reach out to the community with these helpful resources.</p>\r\n\r\n<ul>\r\n	<li>Read and subscribe to&nbsp;<a href="http://blog.getbootstrap.com/">The Official Bootstrap Blog</a>.</li>\r\n	<li>Chat with fellow Bootstrappers using IRC in the&nbsp;<code>irc.freenode.net</code>&nbsp;server, in the&nbsp;<a href="irc://irc.freenode.net/%23bootstrap">##bootstrap channel</a>.</li>\r\n	<li>For help using Bootstrap, ask on&nbsp;<a href="https://stackoverflow.com/questions/tagged/twitter-bootstrap-3">StackOverflow using the tag&nbsp;<code>twitter-bootstrap-3</code></a>.</li>\r\n	<li>Developers should use the keyword&nbsp;<code>bootstrap</code>&nbsp;on packages which modify or add to the functionality of Bootstrap when distributing through&nbsp;<a href="https://www.npmjs.com/browse/keyword/bootstrap">npm</a>&nbsp;or similar delivery mechanisms for maximum discoverability.</li>\r\n	<li>Find inspiring examples of people building with Bootstrap at the&nbsp;<a href="http://expo.getbootstrap.com/">Bootstrap Expo</a>.</li>\r\n</ul>\r\n\r\n<p>You can also follow&nbsp;<a href="https://twitter.com/getbootstrap">@getbootstrap on Twitter</a>&nbsp;for the latest gossip and awesome music videos.</p>\r\n', NULL, NULL, 1, '2016-07-25 11:14:17', '2016-08-01 08:09:33'),
(9, '', 'Cài ??t Laravel 5', '<h3>Y&ecirc;u c?u m&aacute;y ch?</h3>\r\n\r\n<p>Khung Laravel c&oacute; m?t v&agrave;i y&ecirc;u c?u h? th?ng.&nbsp;T?t nhi&ecirc;n, t?t c? nh?ng y&ecirc;u c?u n&agrave;y ???c th?a m&atilde;n b?i<a href="https://laravel.com/docs/5.2/homestead">Laravel Homestead</a>&nbsp;m&aacute;y ?o, do ?&oacute; n&oacute; r?t khuy?n kh&iacute;ch b?n s? d?ng Homestead l&agrave; m&ocirc;i tr??ng ph&aacute;t tri?n Laravel ??a ph??ng c?a b?n.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, n?u b?n kh&ocirc;ng s? d?ng Homestead, b?n s? c?n ph?i ch?c ch?n r?ng m&aacute;y ch? c?a b?n ?&aacute;p ?ng c&aacute;c y&ecirc;u c?u sau:</p>\r\n\r\n<ul>\r\n	<li>PHP&gt; = 5.5.9</li>\r\n	<li>OpenSSL PHP Extension</li>\r\n	<li>PDO PHP Extension</li>\r\n	<li>Mbstring PHP Extension</li>\r\n	<li>Tokenizer PHP Extension</li>\r\n</ul>\r\n\r\n<p><a name="installing-laravel"></a></p>\r\n\r\n<h3>C&agrave;i ??t Laravel</h3>\r\n\r\n<p>Laravel s? d?ng&nbsp;<a href="http://getcomposer.org/">Composer</a>&nbsp;?? qu?n l&yacute; ph? thu?c c?a n&oacute;.&nbsp;V&igrave; v?y, tr??c khi s? d?ng Laravel, ch?c ch?n r?ng b?n ?&atilde; c&agrave;i ??t Composer tr&ecirc;n m&aacute;y c?a b?n.</p>\r\n\r\n<p>Qua Laravel Installer</p>\r\n\r\n<p>??u ti&ecirc;n, download b? c&agrave;i ??t Laravel s? d?ng Composer:</p>\r\n\r\n<pre>\r\n<code>composer global require &quot;laravel/installer&quot;</code></pre>\r\n\r\n<p>H&atilde;y ch?c ch?n ?? ??t c&aacute;c&nbsp;th? m?c (ho?c th? m?c t??ng ???ng cho h? ?i?u h&agrave;nh c?a b?n) trong PATH c?a b?n ??&nbsp;th?c thi c&oacute; th? ???c ??nh v? b?ng h? th?ng c?a b?n.<code>~/.composer/vendor/bin</code><code>laravel</code></p>\r\n\r\n<p>Sau khi c&agrave;i ??t, c&aacute;c&nbsp;l?nh s? t?o m?t c&agrave;i ??t Laravel t??i trong th? m?c b?n ch? ??nh.&nbsp;V&iacute; d?,&nbsp;s? t?o ra m?t th? m?c c&oacute; t&ecirc;n&nbsp;ch?a m?t c&agrave;i ??t Laravel t??i v?i t?t c? c&aacute;c ph? thu?c Laravel ?&atilde; ???c c&agrave;i ??t.Ph??ng ph&aacute;p n&agrave;y c&agrave;i ??t l&agrave; nhanh h?n nhi?u so v?i c&agrave;i ??t qua Composer:<code>laravel new</code><code>laravel new blog</code><code>blog</code></p>\r\n\r\n<pre>\r\n<code>laravel new blog</code></pre>\r\n\r\n<p>Qua Composer T?o-D? &aacute;n</p>\r\n\r\n<p>Ngo&agrave;i ra, b?n c?ng c&oacute; th? c&agrave;i ??t Laravel b?ng c&aacute;ch ph&aacute;t Composer&nbsp;l?nh trong terminal c?a b?n:<code>create-project</code></p>\r\n\r\n<pre>\r\n<code>composer create-project --prefer-dist laravel/laravel blog</code></pre>\r\n\r\n<p><a name="configuration"></a></p>\r\n\r\n<h3>C?u h&igrave;nh</h3>\r\n\r\n<p>Sau khi c&agrave;i ??t, b?n n&ecirc;n c?u h&igrave;nh g?c t&agrave;i li?u / web c?a ?ng d?ng c?a b?n v&agrave;o&nbsp;<code>public</code>th? m?c.</p>\r\n\r\n<p>T?t c? c&aacute;c t?p tin c?u h&igrave;nh cho khung Laravel ???c l?u tr? trong c&aacute;c&nbsp;<code>config</code>th? m?c.&nbsp;M?i t&ugrave;y ch?n l&agrave; t&agrave;i li?u, v&igrave; v?y c?m th?y t? do ?? xem x&eacute;t th&ocirc;ng qua c&aacute;c t?p tin v&agrave; l&agrave;m quen v?i c&aacute;c t&ugrave;y ch?n c&oacute; s?n cho b?n.</p>\r\n\r\n<p>Quy?n th? m?c</p>\r\n\r\n<p>Sau khi c&agrave;i ??t Laravel, b?n c&oacute; th? c?n ph?i c?u h&igrave;nh m?t s? quy?n.&nbsp;Th? m?c trong&nbsp;<code>storage</code>v&agrave;&nbsp;th? m?c n&agrave;y c&oacute; th? ???c ghi b?i m&aacute;y ch? web c?a b?n ho?c Laravel s? kh&ocirc;ng ch?y.&nbsp;N?u b?n ?ang s? d?ng&nbsp;<a href="https://laravel.com/docs/5.2/homestead">Homestead</a>&nbsp;m&aacute;y ?o, nh?ng quy?n n&agrave;y n&ecirc;n ?&atilde; ???c ??t.<code>bootstrap/cache</code></p>\r\n\r\n<p>?ng d?ng ch&iacute;nh</p>\r\n\r\n<p>?i?u ti?p theo b?n c?n l&agrave;m sau khi c&agrave;i ??t Laravel ???c thi?t l?p ph&iacute;m ?ng d?ng c?a b?n ?? m?t chu?i ng?u nhi&ecirc;n.&nbsp;N?u b?n c&agrave;i ??t Laravel qua Composer ho?c c&agrave;i ??t Laravel, ph&iacute;m n&agrave;y ?&atilde; ???c thi?t l?p cho b?n b?i c&aacute;c&nbsp;l?nh.&nbsp;Th&ocirc;ng th??ng, chu?i n&agrave;y n&ecirc;n d&agrave;i 32 k&yacute; t?.&nbsp;?i?u quan tr?ng c&oacute; th? ???c thi?t l?p trong&nbsp;t?p tin m&ocirc;i tr??ng.&nbsp;N?u b?n ch?a ??i t&ecirc;n c&aacute;c&nbsp;t?p tin&nbsp;, b?n n&ecirc;n l&agrave;m ?i?u ?&oacute; ngay b&acirc;y gi?.&nbsp;<strong>N?u c&aacute;c ph&iacute;m ?ng d?ng kh&ocirc;ng ???c thi?t l?p, ng??i s? d?ng phi&ecirc;n v&agrave; d? li?u m&atilde; h&oacute;a kh&aacute;c s? kh&ocirc;ng ???c an to&agrave;n!</strong><code>php artisan key:generate</code><code>.env</code><code>.env.example</code><code>.env</code></p>\r\n\r\n<p>C?u h&igrave;nh b? sung</p>\r\n\r\n<p>Laravel c?n h?u nh? kh&ocirc;ng c&oacute; c?u h&igrave;nh kh&aacute;c ra kh?i h?p.&nbsp;B?n ???c t? do ?? b?t ??u ph&aacute;t tri?n!&nbsp;Tuy nhi&ecirc;n, b?n c&oacute; th? mu?n xem x&eacute;t c&aacute;c&nbsp;t?p tin v&agrave; t&agrave;i li?u c?a n&oacute;.&nbsp;N&oacute; ch?a m?t s? t&ugrave;y ch?n nh?&nbsp;v&agrave;&nbsp;r?ng b?n c&oacute; th? thay ??i t&ugrave;y theo ?ng d?ng c?a b?n.<code>config/app.php</code><code>timezone</code><code>locale</code></p>\r\n\r\n<p>B?n c?ng c&oacute; th? c?u h&igrave;nh m?t v&agrave;i th&agrave;nh ph?n b? sung c?a Laravel, ch?ng h?n nh?:</p>\r\n\r\n<ul>\r\n	<li><a href="https://laravel.com/docs/5.2/cache#configuration">Cache</a></li>\r\n	<li><a href="https://laravel.com/docs/5.2/database#configuration">Database</a></li>\r\n	<li><a href="https://laravel.com/docs/5.2/session#configuration">Session</a></li>\r\n</ul>\r\n\r\n<p>Khi Laravel ???c c&agrave;i ??t, b?n c?ng n&ecirc;n&nbsp;<a href="https://laravel.com/docs/5.2/configuration#environment-configuration">c?u h&igrave;nh m&ocirc;i tr??ng ??a ph??ng c?a b?n</a>&nbsp;.</p>\r\n\r\n<p>ngu?n:&nbsp;<a href="https://laravel.com/docs/5.2">laravel.com</a></p>\r\n', NULL, NULL, 1, '2016-08-04 10:28:04', '2016-08-17 07:07:44'),
(10, 'Bootstrap automatically adapts your pages for various screen sizes. Here''s how to disable this feature so your page works like this non-responsive example.', 'Steps to disable page responsiveness', '<ol>\r\n	<li>Omit the viewport&nbsp;<code>&lt;meta&gt;</code>&nbsp;mentioned in&nbsp;<a href="http://getbootstrap.com/css/#overview-mobile">the CSS docs</a></li>\r\n	<li>Override the&nbsp;<code>width</code>&nbsp;on the&nbsp;<code>.container</code>&nbsp;for each grid tier with a single width, for example&nbsp;<code>width: 970px !important;</code>&nbsp;Be sure that this comes after the default Bootstrap CSS. You can optionally avoid the&nbsp;<code>!important</code>&nbsp;with media queries or some selector-fu.</li>\r\n	<li>If using navbars, remove all navbar collapsing and expanding behavior.</li>\r\n	<li>For grid layouts, use&nbsp;<code>.col-xs-*</code>&nbsp;classes in addition to, or in place of, the medium/large ones. Don&#39;t worry, the extra-small device grid scales to all resolutions.</li>\r\n</ol>\r\n\r\n<p>You&#39;ll still need Respond.js for IE8 (since our media queries are still there and need to be processed). This disables the &quot;mobile site&quot; aspects of Bootstrap.</p>\r\n\r\n<p>Specifically, we support the&nbsp;<strong>latest versions</strong>&nbsp;of the following browsers and platforms.</p>\r\n\r\n<p>Alternative browsers which use the latest version of WebKit, Blink, or Gecko, whether directly or via the platform&#39;s web view API, are not explicitly supported. However, Bootstrap should (in most cases) display and function correctly in these browsers as well. More specific support information is provided below.</p>\r\n', NULL, NULL, 1, '2016-08-10 02:31:02', '2016-08-10 02:31:02'),
(11, 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in fauci', 'Media alignment', '<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>\r\n\r\n<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n\r\n<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>\r\n\r\n<p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n', NULL, NULL, 1, '2016-08-10 03:27:02', '2016-08-10 03:27:02'),
(12, '', 'Panel with heading', '<p>Using color to add meaning to a table row or individual cell only provides a visual indication, which will not be conveyed to users of assistive technologies &ndash; such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (the visible text in the relevant table row/cell), or is included through alternative means, such as additional text hidden with the&nbsp;<code>.sr-only</code>&nbsp;class.</p>\r\n\r\n<p><a href="http://local.thanhforum/post/edit/12#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>\r\n\r\n<p>For proper link coloring, be sure to place links in headings within&nbsp;<code>.panel-title</code>.</p>\r\n\r\n<p>Wrap buttons or secondary text in&nbsp;<code>.panel-footer</code>. Note that panel footers&nbsp;<strong>do not</strong>&nbsp;inherit colors and borders when using contextual variations as they are not meant to be in the foreground.</p>\r\n', NULL, NULL, 1, '2016-08-10 03:29:53', '2016-08-10 03:52:52'),
(13, NULL, 'Laravel 5, custom error messages.', '<p>Plenty of educational sites will teach you how to make a website. But what about those of us who already do that full-time, every single day? Where do we go to further our education? If ever there was a field that required nonstop learning, programming is certainly it.</p>\r\n\r\n<p>Laracasts is the defacto educational resource specifically for working web developers. It&#39;s kinda like&nbsp;<a href="https://laracasts.com/join">Netflix for your career!</a></p>\r\n', NULL, NULL, 3, '2016-08-12 04:49:29', '2016-08-12 04:49:29'),
(14, NULL, 'Laravel 5 Errors Message bag - Insert my own adhoc custom message', '<p>Good day all,</p>\r\n\r\n<p>Would it be a good idea - and also is this possible?</p>\r\n\r\n<ol>\r\n	<li>I am using Laravel 5&#39;s validation features to validate form inputs. But beside the form inputs I have some other checks to do. For example: check if a file exists. This check I will do manually without Validation service.</li>\r\n</ol>\r\n\r\n<p>But I would like to simply write to the message bag?</p>\r\n\r\n<p>For example:</p>\r\n', NULL, NULL, 3, '2016-08-12 04:51:15', '2016-08-12 04:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `avatar`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$10$O0hyl5WGnQi4XQKFdVRW9..S48YaKe4rI3En4GomnjBeBWbRvesQm', 'Ha noi', '01234567891', '1469781552_user-13.jpg', 1, 'U0iUIEivKJlZo8wFNJSNOciuRh5pfBgte8QzS1UvcFhqmT2mVfFXM29Ja93F', '2016-07-21 20:42:46', '2016-08-15 20:19:06'),
(2, '1Test', '1test@example.com', '$2y$10$9NMZ74Dk5HCVbqpgx2/S3OK3YxjoYsRmOHNLIcqjO9xSkgIkKdrj6', NULL, NULL, NULL, 2, 'A6Q1mWm3EzeqtwG1HGKBfihobIW6GHBs3DlRVx4zD6hofdSayWlz57KyqdmW', '2016-08-11 19:11:06', '2016-08-14 22:03:59'),
(3, '2Test', '2test@example.com', '$2y$10$4yFUwXW5R3fyFZBgIEE3ougzfigdlgKuIvNWruaHbBcD7GcFLGxRm', NULL, NULL, NULL, 3, '2UhlIjpWIybyPNu4mSpng3X5P9Bhvg6e9owa7hmBcd9NmipVj1wEqFwLvHET', '2016-08-11 21:48:40', '2016-08-12 02:44:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bootstrap`
--
ALTER TABLE `bootstrap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `laravel`
--
ALTER TABLE `laravel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `php`
--
ALTER TABLE `php`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bootstrap`
--
ALTER TABLE `bootstrap`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `laravel`
--
ALTER TABLE `laravel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `php`
--
ALTER TABLE `php`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bootstrap`
--
ALTER TABLE `bootstrap`
  ADD CONSTRAINT `bootstrap_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `laravel`
--
ALTER TABLE `laravel`
  ADD CONSTRAINT `laravel_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `php`
--
ALTER TABLE `php`
  ADD CONSTRAINT `php_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
