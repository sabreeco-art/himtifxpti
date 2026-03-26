-- ============================================
-- LearnGo Database Schema
-- Generated from PHP source code analysis
-- ============================================

CREATE DATABASE IF NOT EXISTS `learngo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `learngo`;

-- ============================================
-- TABLE: user
-- ============================================
CREATE TABLE `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(255) DEFAULT NULL,
    `lastname` VARCHAR(255) DEFAULT NULL,
    `lasttname` VARCHAR(255) DEFAULT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) DEFAULT NULL,
    `cpassword` VARCHAR(255) DEFAULT NULL,
    `role` VARCHAR(50) DEFAULT 'Student',
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `image` LONGBLOB DEFAULT NULL,
    `about` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: post (Blog)
-- ============================================
CREATE TABLE `post` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `author` VARCHAR(255) DEFAULT NULL,
    `content` LONGTEXT DEFAULT NULL,
    `categories` VARCHAR(255) DEFAULT NULL,
    `date` DATETIME DEFAULT NULL,
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `img` LONGBLOB DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: course
-- ============================================
CREATE TABLE `course` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `author` VARCHAR(255) DEFAULT NULL,
    `description` LONGTEXT DEFAULT NULL,
    `jumlah_pelajaran` INT DEFAULT 0,
    `jam` INT DEFAULT 0,
    `harga` INT DEFAULT 0,
    `tingkat` VARCHAR(100) DEFAULT NULL,
    `date` DATETIME DEFAULT NULL,
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `img` LONGBLOB DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: materi
-- ============================================
CREATE TABLE `materi` (
    `id_materi` INT AUTO_INCREMENT PRIMARY KEY,
    `id_course` INT DEFAULT NULL,
    `title_materi` VARCHAR(255) DEFAULT NULL,
    `video_link` VARCHAR(500) DEFAULT NULL,
    `deskripsi_materi` LONGTEXT DEFAULT NULL,
    `date_created` DATETIME DEFAULT NULL,
    FOREIGN KEY (`id_course`) REFERENCES `course`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: pages
-- ============================================
CREATE TABLE `pages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `author` VARCHAR(255) DEFAULT NULL,
    `content` LONGTEXT DEFAULT NULL,
    `date` DATETIME DEFAULT NULL,
    `src` VARCHAR(255) DEFAULT NULL,
    `src_db` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: categories
-- ============================================
CREATE TABLE `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `slug` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: media (Library)
-- ============================================
CREATE TABLE `media` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `image` LONGBLOB DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: typecourse
-- ============================================
CREATE TABLE `typecourse` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `description` LONGTEXT DEFAULT NULL,
    `icon` VARCHAR(255) DEFAULT NULL,
    `author` VARCHAR(255) DEFAULT NULL,
    `date` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: homepage
-- ============================================
CREATE TABLE `homepage` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title_1` VARCHAR(255) DEFAULT NULL,
    `subtitle_1` TEXT DEFAULT NULL,
    `btn_1` VARCHAR(100) DEFAULT NULL,
    `btn_2` VARCHAR(100) DEFAULT NULL,
    `src_btn_1` VARCHAR(255) DEFAULT NULL,
    `src_btn_2` VARCHAR(255) DEFAULT NULL,
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `image` LONGBLOB DEFAULT NULL,
    `title_2_1` VARCHAR(255) DEFAULT NULL,
    `title_2_2` VARCHAR(255) DEFAULT NULL,
    `subtitle_2` TEXT DEFAULT NULL,
    `menu_1` VARCHAR(255) DEFAULT NULL,
    `menu_2` VARCHAR(255) DEFAULT NULL,
    `menu_3` VARCHAR(255) DEFAULT NULL,
    `btn_2_1` VARCHAR(100) DEFAULT NULL,
    `nama_file2` VARCHAR(255) DEFAULT NULL,
    `image2` LONGBLOB DEFAULT NULL,
    `title_3_1` VARCHAR(255) DEFAULT NULL,
    `subtitle_3_1` TEXT DEFAULT NULL,
    `title_3_2` VARCHAR(255) DEFAULT NULL,
    `subtitle_3_2` TEXT DEFAULT NULL,
    `title_3_3` VARCHAR(255) DEFAULT NULL,
    `subtitle_3_3` TEXT DEFAULT NULL,
    `subtitle_4_1` TEXT DEFAULT NULL,
    `title_4_1` VARCHAR(255) DEFAULT NULL,
    `btn_4_1` VARCHAR(100) DEFAULT NULL,
    `btntarget_4_1` VARCHAR(255) DEFAULT NULL,
    `title_5_1` VARCHAR(255) DEFAULT NULL,
    `title_6_1` VARCHAR(255) DEFAULT NULL,
    `subtitle_6_1` TEXT DEFAULT NULL,
    `title_cta` VARCHAR(255) DEFAULT NULL,
    `subtitle_cta` TEXT DEFAULT NULL,
    `btn_cta` VARCHAR(100) DEFAULT NULL,
    `btntarget_cta` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: aboutpage
-- ============================================
CREATE TABLE `aboutpage` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `subtitle` TEXT DEFAULT NULL,
    `title_3_1` VARCHAR(255) DEFAULT NULL,
    `jumlah_3_1` VARCHAR(100) DEFAULT NULL,
    `fast_3_1` TEXT DEFAULT NULL,
    `title_3_2` VARCHAR(255) DEFAULT NULL,
    `jumlah_3_2` VARCHAR(100) DEFAULT NULL,
    `fast_3_2` TEXT DEFAULT NULL,
    `title_3_3` VARCHAR(255) DEFAULT NULL,
    `jumlah_3_3` VARCHAR(100) DEFAULT NULL,
    `fast_3_3` TEXT DEFAULT NULL,
    `title_vm` VARCHAR(255) DEFAULT NULL,
    `title_v` VARCHAR(255) DEFAULT NULL,
    `isi_v` LONGTEXT DEFAULT NULL,
    `title_m` VARCHAR(255) DEFAULT NULL,
    `isi_m` LONGTEXT DEFAULT NULL,
    `title_tim` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: contactpage
-- ============================================
CREATE TABLE `contactpage` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) DEFAULT NULL,
    `subtitle` TEXT DEFAULT NULL,
    `n_phone` VARCHAR(20) DEFAULT NULL,
    `email_support` VARCHAR(255) DEFAULT NULL,
    `email_general` VARCHAR(255) DEFAULT NULL,
    `instagram` VARCHAR(255) DEFAULT NULL,
    `twitter` VARCHAR(255) DEFAULT NULL,
    `facebook` VARCHAR(255) DEFAULT NULL,
    `linkedin` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: footerpage
-- ============================================
CREATE TABLE `footerpage` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama_file` VARCHAR(255) DEFAULT NULL,
    `image` LONGBLOB DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `nama_web` VARCHAR(255) DEFAULT NULL,
    `desain_by` VARCHAR(255) DEFAULT NULL,
    `link_ig` VARCHAR(255) DEFAULT NULL,
    `link_fb` VARCHAR(255) DEFAULT NULL,
    `link_twt` VARCHAR(255) DEFAULT NULL,
    `link_lk` VARCHAR(255) DEFAULT NULL,
    `tahun_copyright` INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: commentuser
-- ============================================
CREATE TABLE `commentuser` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(255) DEFAULT NULL,
    `email` VARCHAR(255) DEFAULT NULL,
    `comment` LONGTEXT DEFAULT NULL,
    `date` DATETIME DEFAULT NULL,
    `id_artikel` INT DEFAULT NULL,
    FOREIGN KEY (`id_artikel`) REFERENCES `post`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- TABLE: massage_user (Contact Messages)
-- ============================================
CREATE TABLE `massage_user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(255) DEFAULT NULL,
    `last_name` VARCHAR(255) DEFAULT NULL,
    `email` VARCHAR(255) DEFAULT NULL,
    `massage` LONGTEXT DEFAULT NULL,
    `date` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- DEFAULT DATA: Insert minimal required rows
-- ============================================

-- Homepage (required by index.php)
INSERT INTO `homepage` (`id`, `title_1`, `subtitle_1`, `btn_1`, `btn_2`) VALUES
(1, 'Welcome to LearnGo', 'Platform Belajar Online Terbaik', 'Get Started', 'Learn More');

-- About Page
INSERT INTO `aboutpage` (`id`, `title`, `subtitle`) VALUES
(1, 'About Us', 'Tentang LearnGo');

-- Contact Page
INSERT INTO `contactpage` (`id`, `title`, `subtitle`, `n_phone`, `email_support`, `email_general`) VALUES
(1, 'Contact Us', 'Hubungi Kami', '08123456789', 'support@learngo.com', 'info@learngo.com');

-- Footer Page
INSERT INTO `footerpage` (`id`, `description`, `nama_web`, `desain_by`, `tahun_copyright`) VALUES
(1, 'LearnGo - Platform Belajar Online', 'LearnGo', 'HIMTIF x PTI', 2026);

-- Default Admin User (password: admin123)
INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `cpassword`, `role`) VALUES
(1, 'Admin', 'LearnGo', 'admin@learngo.com', 'admin123', 'admin123', 'Teacher');
