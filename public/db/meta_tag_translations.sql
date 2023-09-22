-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 03:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_etman`
--

--
-- Dumping data for table `meta_tag_translations`
--

INSERT INTO `meta_tag_translations` (`id`, `meta_tag_id`, `locale`, `slug`, `g_title`, `g_des`, `body_h1`, `breadcrumb`) VALUES
(1, 1, 'ar', 'index', 'عتمان جروب فخر الصناعة المصرية | خدمة العملاء 01006180117', 'عتمان جروب فخر الصناعة المصرية متخصصون فى تصنيع الاشرطة ذاتية اللصق وشرائط الزينة و جميع مستلزمات التعبئة والتغليف بمصر الاسكندرية خدمة العملاء 01006180117', 'عتمان جروب', 'عتمان جروب'),
(2, 1, 'en', 'index', 'Etman Group is the pride of the Egyptian industry Hotline 01006180117', 'Etman Group,the pride of the Egyptian industry, specialized in the manufacture of self-adhesive tapes, PP Ribbon and all packaging Products Hotline 01006180117', 'Etman Group', 'Etman Group'),
(3, 2, 'ar', 'عملائنا', 'عتمان جروب | قائمة بعملائنا', 'بعد اكثر من 40 عام من العمل فى السوق المصرى نتشرف بخدمة عملائنا التى تشرفنا بخدمتهم على مدار السنوات السابقة', 'عملائنا', 'عملائنا'),
(4, 2, 'en', 'our-client', 'Etman Group | Our Client', 'After more than 40 years of working in the Egyptian market, we are honored to serve our customers, which we were honored to serve over the past years', 'Our Client', 'Our Client'),
(5, 3, 'ar', 'أخر-الأخبار', 'عتمان جروب | أخر الاخبار | احدث العروض | الوظائف المتاحة', 'تابع اخر اخبار شركة عتمان جروب وكن دائما على علم باحداث العروض والخصومات التى نقدمه دائما والوظائف المتوفرة حاليا', 'أخر الأخبار', 'أخر الأخبار'),
(6, 3, 'en', 'latest-news', 'Etman Group | Latest news | Latest Offers | Available jobs', 'Follow latest news of the Etman Group and always be aware of the latest offers and discounts that we always offer and the jobs that are currently available', 'Latest news', 'Latest news'),
(7, 4, 'ar', 'page-not-found', 'عذرا !! الصفحة غير موجودة', 'عذرا !! الصفحة غير موجودة', NULL, NULL),
(8, 4, 'en', 'page-not-found', 'Sorry !! Page not found', 'Sorry !! Page not found', NULL, NULL),
(9, 5, 'ar', 'الأسئلة-المتكررة', 'الأسئلة المتكررة | عتمان جروب | الاسكندرية 01006180117', 'تساعدك الأسئلة المتكررة على الرد لجميع الاستفسارت الخاصة بالمنتجات والعروض وطرق الشحن وطرق الدفع المتاحة لدى عتمان جروب', 'الأسئلة المتكررة', 'الأسئلة المتكررة'),
(10, 5, 'en', 'frequently-asked-questions', 'Frequently Asked Questions | Etman Group | 01006180117', 'Frequently asked questions help you answer all inquiries about products, offers, shipping methods and payment methods available at Etman Group', 'Frequently Asked Questions', 'Frequently Asked Questions'),
(11, 6, 'ar', 'سياسية-الاستخدام', 'عتمان جروب | شروط وسياسة الخصوصية', 'شروط وسياسة الخصوصية تعرفك هذه الصفحة بسياساتنا المتعلقة بجمع البيانات الشخصية واستخدامها والكشف عنها عند استخدامك للخدمة والأختيارات المرتبطة بهذه البيانات.', 'سياسية الاستخدم', NULL),
(12, 6, 'en', 'terms-conditions', 'Etman Group | Our Privacy Policy', 'Terms and Privacy Policy This page informs you of our policies regarding the collection, use and disclosure of personal data when you use the Service', 'Terms & Conditions', NULL),
(13, 7, 'ar', 'اتصل-بنا', 'عتمان جروب | اتصل بنا | الاسكندرية 01006180117', 'عتمان جروب المقر الرئيسي 14 ش خليل بك متفرع من اسماعيل صبري - أمام بنك مصر - الجمرك الاسكندرية - مصر / هاتف 01006180117', 'اتصل بنا', NULL),
(14, 7, 'en', 'contact-us', 'Etman Group | Contact Us | Alexandria 0100-6180-117', 'Etman Group Headquarters 14 Khalil Bey St., off Ismail Sabry - in front of Banque Misr - Customs, Alexandria - Egypt  Phone : 01006180117', 'Contact Us', NULL),
(15, 8, 'ar', 'من-نحن', 'عتمان جروب هي شركة محلية منذ عام 1967 | الاسكندرية 01006180117', 'عتمان جروب هي شركة محلية أسسها السيد حسن عتمان منذ عام 1967. بدأت رحلة السيد عتمان نحو النجاح بفضل تطور شركته من خلال إنتاج شرائط البولي بروبلين وشرائط الزينة', 'من نحن', NULL),
(16, 8, 'en', 'about-us', 'Etman Group is a local company since 1967 | Alexandria 01006180117', 'Etman Group is a local company founded and operated by Mr Hassan Etman in 1967. Mr Etman’s journey to success started due to the development of his company by', 'About Us', NULL),
(17, 9, 'ar', 'darkmode', 'عتمان جروب', 'عتمان جروب', NULL, NULL),
(18, 9, 'en', 'darkmode', 'Etman Group', 'Etman Group', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
