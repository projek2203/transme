-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Mar 2024 pada 00.28
-- Versi server: 10.3.39-MariaDB-cll-lve
-- Versi PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dopt7477_transme`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `level` varchar(255) DEFAULT 'staff',
  `grup` varchar(5) NOT NULL DEFAULT '1',
  `kota` varchar(250) NOT NULL DEFAULT 'pusat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `email`, `image`, `level`, `grup`, `kota`) VALUES
(6, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'projekojek2203@gmail.com', '5dd6246645e5dc999fca4cc8f94d51d9.png', 'admin', '1', '66acc99494bc51d88e295b13ff3a6431d37482aa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `perizinan` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `grup` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `perizinan`, `kode`, `grup`) VALUES
(1, 'hapus', 'dashboard_hapus', '1'),
(2, 'batalkan', 'dashboard_batal', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `no` int(11) NOT NULL,
  `iduser` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `app_email` varchar(500) NOT NULL,
  `app_contact` varchar(500) NOT NULL,
  `app_website` varchar(500) NOT NULL,
  `app_description` text NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `app_aboutus` text NOT NULL,
  `email_subject` varchar(500) NOT NULL,
  `email_subject_confirm` varchar(500) NOT NULL,
  `email_text1` text NOT NULL,
  `email_text2` text NOT NULL,
  `email_text3` text NOT NULL,
  `email_text4` text NOT NULL,
  `app_logo` varchar(500) NOT NULL,
  `smtp_host` varchar(500) NOT NULL,
  `smtp_port` varchar(500) NOT NULL,
  `smtp_username` varchar(500) NOT NULL,
  `smtp_password` varchar(500) NOT NULL,
  `smtp_from` varchar(500) NOT NULL,
  `smtp_secure` varchar(250) NOT NULL,
  `app_name` varchar(500) NOT NULL,
  `app_address` text NOT NULL,
  `app_linkgoogle` varchar(500) NOT NULL,
  `app_currency` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `app_currency_text` varchar(10) NOT NULL,
  `geocode_key` varchar(255) DEFAULT NULL,
  `map_key` varchar(250) NOT NULL,
  `fcm_key` varchar(250) NOT NULL,
  `duitku_merchant` varchar(255) DEFAULT NULL,
  `duitku_key` varchar(255) DEFAULT NULL,
  `duitku_mode` int(11) DEFAULT 0,
  `duitku_status` int(11) DEFAULT 1,
  `maintenance` varchar(1) DEFAULT '0',
  `isotp` int(11) NOT NULL,
  `jasaapp` varchar(255) DEFAULT '0',
  `background` varchar(255) DEFAULT '#4c84ff',
  `digi_user` varchar(255) DEFAULT NULL,
  `digi_api` varchar(255) DEFAULT NULL,
  `digi_mode` varchar(255) DEFAULT NULL,
  `digi_status` varchar(255) DEFAULT NULL,
  `upreff` varchar(255) DEFAULT '100',
  `rewardreff` varchar(255) DEFAULT '100',
  `os_appid` varchar(255) DEFAULT '1234',
  `os_restapi` varchar(255) DEFAULT '1234',
  `os_channel` varchar(255) DEFAULT '1234',
  `os_template` varchar(255) DEFAULT '1234',
  `os_channel_chat` varchar(255) DEFAULT '1234',
  `os_template_chat` varchar(255) DEFAULT '1234',
  `mode` varchar(255) DEFAULT 'Firebase'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `app_settings`
--

INSERT INTO `app_settings` (`id`, `app_email`, `app_contact`, `app_website`, `app_description`, `app_privacy_policy`, `app_aboutus`, `email_subject`, `email_subject_confirm`, `email_text1`, `email_text2`, `email_text3`, `email_text4`, `app_logo`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_from`, `smtp_secure`, `app_name`, `app_address`, `app_linkgoogle`, `app_currency`, `app_currency_text`, `geocode_key`, `map_key`, `fcm_key`, `duitku_merchant`, `duitku_key`, `duitku_mode`, `duitku_status`, `maintenance`, `isotp`, `jasaapp`, `background`, `digi_user`, `digi_api`, `digi_mode`, `digi_status`, `upreff`, `rewardreff`, `os_appid`, `os_restapi`, `os_channel`, `os_template`, `os_channel_chat`, `os_template_chat`, `mode`) VALUES
(1, 'reply@dopanggosipp.com', '0895326129562', 'https://tripport.dopanggosipp.com/', 'Mudahkan Aktivitas Mu Dalam Satu Aplikasi', '', '<h1><strong>                              Aplikasi TRIPPORT Indonesia</strong></h1>\r\n<p><em>Indonesia, dengan populasi yang besar dan perkembangan teknologi yang pesat, menyaksikan transformasi signifikan dalam industri transportasi dan pembayaran. Salah satu inovasi utama yang memimpin perubahan ini adalah aplikasi kelana yang tidak hanya menyediakan layanan transportasi online tetapi juga menawarkan solusi pembayaran PPOB secara digital.</em></p>\r\n<p><strong>1. Transportasi Online: Kemudahan Perjalanan di Ujung Jari</strong></p>\r\n<p>Aplikasi kelana di Indonesia telah merevolusi cara orang bepergian. Dengan sekali sentuhan di layar smartphone, pengguna dapat memesan berbagai jenis transportasi, mulai dari kendaraan roda dua hingga mobil pribadi, untuk mencapai tujuan mereka dengan nyaman dan efisien. Fitur-fitur canggih seperti pemetaan real-time, peringatan kedatangan, dan penilaian pengemudi memberikan pengalaman perjalanan yang lebih baik dan aman.</p>\r\n<p><strong>2. Keunggulan Aplikasi Transportasi Online di Indonesia</strong></p>\r\n<p>Aplikasi kelana tidak hanya menawarkan kenyamanan dalam perjalanan tetapi juga memberikan keunggulan lain, seperti tarif yang transparan, berbagai pilihan kendaraan, dan program loyalitas untuk pengguna setia. Selain itu, berbagai inisiatif keamanan telah diimplementasikan, termasuk pemeriksaan latar belakang pengemudi dan fitur panggilan darurat.</p>\r\n<p><strong>3. Digital PPOB: Transformasi Pembayaran Tagihan</strong></p>\r\n<p>Selain revolusi dalam transportasi, aplikasi kelana juga menyediakan layanan digital pembayaran PPOB. Pengguna dapat membayar tagihan listrik, air, pulsa, televisi berlangganan, dan berbagai layanan lainnya tanpa perlu mengunjungi tempat pembayaran fisik. Ini membantu mengurangi waktu dan usaha yang diperlukan untuk pembayaran tagihan sehari-hari.</p>\r\n<p><strong>4. Kenyamanan dan Efisiensi dalam Satu Aplikasi</strong></p>\r\n<p>Integrasi layanan transportasi online dan PPOB dalam satu aplikasi memberikan keuntungan ganda bagi pengguna. Mereka tidak hanya dapat bepergian dengan mudah tetapi juga dapat mengelola keuangan mereka dengan lebih efisien. Pembayaran tagihan dapat dilakukan di tengah perjalanan, sehingga memberikan kenyamanan yang luar biasa.</p>\r\n<p><strong>5. Tantangan dan Peluang di Masa Depan</strong></p>\r\n<p>Meskipun pertumbuhan pesat aplikasi kelana telah memberikan manfaat besar bagi masyarakat Indonesia, tetapi juga menimbulkan beberapa tantangan, termasuk regulasi, keamanan data, dan persaingan yang semakin ketat. Namun, seiring dengan kemajuan teknologi, ada peluang besar untuk terus mengembangkan solusi inovatif yang dapat meningkatkan kualitas hidup dan memajukan ekonomi digital di Indonesia.</p>\r\n<p><strong>Kesimpulan</strong></p>\r\n<p>Aplikasi kelana di Indonesia tidak hanya membawa revolusi dalam dunia transportasi online tetapi juga menjadi pemimpin dalam penyediaan layanan digital pembayaran PPOB. Transformasi ini bukan hanya mengubah cara orang berpergian dan membayar tagihan, tetapi juga menciptakan ekosistem digital yang mempermudah kehidupan sehari-hari. Dengan terus berinovasi, aplikasi kelana Indonesia berpotensi menjadi pionir dalam industri ini di tingkat global.</p>', 'Atur Ulang Kata Sandi', 'Pendaftaran Diterima', '<div style=\"text-align: justify;\">Kami telah menerima permintaan Anda untuk mengatur ulang kata sandi. Harap konfirmasi melalui tombol di bawah ini:</div>', '<div style=\"text-align: justify;\">Abaikan email ini jika Anda tidak pernah meminta untuk menyetel ulang sandi. Untuk pertanyaan, silakan hubungi</div>', '<div style=\"text-align: justify;\">Terima kasih telah mendaftarkan diri anda sebagai driver kami, kami telah menerima, silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:</div>', '<p>Abaikan email ini jika Anda tidak pernah meminta untuk menyetel ulang sandi. Untuk pertanyaan, silakan hubungi</p>', 'c5e5a9ce72ae54f1e3b0a9995e0842e7.png', 'mail.kelanacorps.xyZ', '465', 'reply@dopanggosipp.com', 'NQW7MR55b{Zz', 'TRANSME', 'ssl', 'Transme', '<p><span style=\"font-size: 14px; text-align: justify;\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Lorem Ipsum hanyalah&nbsp;</span></span></span></p>', 'https://play.google.com/', 'Rp', 'IDR', 'AIzaSyBLrW7IzWzbII0Sex8zrRmCyAZRT7iWqUs', 'AIzaSyBLrW7IzWzbII0Sex8zrRmCyAZRT7iWqUs', 'AAAAnqxcpmw:APA91bGYlzgrR_zrP-wxEMFGnQrXin5F22VQbxU6Y0OGpQzB8GLrgOS8F4Jn8TwEF9wJqkUOqeg4bX1-3lTZTCmtoscyQJA3wUh_8r1SJa1kwTQHrboWEXTuXENtX75SQvQNrG2or2vC', 'D5375', '3e32b6a632e7ddb5190392a7d6e01e47', 1, 1, '0', 0, '0', '#118eea', 'kigoneg99xZg1', 'AIzaSyCmkVwCTlPT6Hsc5efIh2aT0uP6gQeu0QA1', '0', '1', '0', '0', 'c095de52-ad4e-430b-8e25-5db3dd9fc37d', 'M2E4MjVhMTQtZjMyNC00NjE4LTk1MmQtYTkzMGM3Njc0MTQ5', 'bf94e873-80ac-4ab6-b5fc-4746233b9797', 'a3ad7fc9-a7ac-4e70-b945-1b6aa49808fd', 'ad3cb082-6d83-4fae-8198-6ddfd6ddd8c9', 'a3ad7fc9-a7ac-4e70-b945-1b6aa49808fd', 'Onesignal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `id` int(10) UNSIGNED NOT NULL,
  `kota` varchar(200) NOT NULL,
  `promo` varchar(200) NOT NULL,
  `rate1` varchar(200) NOT NULL,
  `rate2` varchar(200) NOT NULL,
  `rate3` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) UNSIGNED NOT NULL,
  `id_kategori` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `foto_berita` varchar(255) DEFAULT NULL,
  `created_berita` timestamp NULL DEFAULT current_timestamp(),
  `status_berita` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_driver`
--

CREATE TABLE `berkas_driver` (
  `id_berkas` int(11) NOT NULL,
  `id_driver` varchar(250) NOT NULL,
  `foto_ktp` varchar(250) NOT NULL,
  `foto_sim` varchar(250) NOT NULL,
  `id_sim` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `berkas_driver`
--

INSERT INTO `berkas_driver` (`id_berkas`, `id_driver`, `foto_ktp`, `foto_sim`, `id_sim`, `created`) VALUES
(405, 'D1708831070', '1708830973-15206.jpg', '1708830973-17957.jpg', '64646464646', '2024-02-25 03:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_item`
--

CREATE TABLE `category_item` (
  `id_kategori_item` int(11) NOT NULL,
  `nama_kategori_item` varchar(250) NOT NULL,
  `foto_kategori_item` varchar(250) NOT NULL DEFAULT 'noimage.jpg',
  `id_merchant` varchar(250) NOT NULL,
  `created_cat_item` timestamp NOT NULL DEFAULT current_timestamp(),
  `all_category` varchar(50) NOT NULL,
  `status_kategori` varchar(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_merchant`
--

CREATE TABLE `category_merchant` (
  `id_kategori_merchant` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `foto_kategori` varchar(250) NOT NULL,
  `id_fitur` varchar(200) NOT NULL,
  `status_kategori` varchar(100) NOT NULL,
  `isall` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idtrans` varchar(255) NOT NULL,
  `idcust` varchar(255) NOT NULL,
  `iddriver` varchar(255) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `isread` varchar(255) DEFAULT '0',
  `fotochat` varchar(255) DEFAULT '0',
  `jam` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `idtrans`, `idcust`, `iddriver`, `pesan`, `isread`, `fotochat`, `jam`, `tanggal`, `level`) VALUES
(1, '16277', 'P1946144648', 'D1697701004', 'test', '0', '0', '16:05:06', '08-11-2023', '1'),
(2, '16277', 'P1946144648', 'D1697701004', 'hallo', '0', '0', '16:06:28', '08-11-2023', '1'),
(3, '16277', 'P1946144648', 'P1946144648', 'iya kak', '0', '0', '16:06:41', '08-11-2023', '0'),
(4, '16277', 'P1946144648', 'D1697701004', 'dmna ?', '0', '0', '16:11:48', '08-11-2023', '1'),
(5, '16277', 'P1946144648', 'P1946144648', 'di rumah', '0', '0', '16:12:03', '08-11-2023', '0'),
(6, '16277', 'P1946144648', 'D1697701004', 'otw', '0', '0', '16:15:38', '08-11-2023', '1'),
(7, '16277', 'P1946144648', 'P1946144648', 'siaaap', '0', '0', '16:15:51', '08-11-2023', '0'),
(8, '16277', 'P1946144648', 'D1697701004', '[Kirim Foto]', '0', '1699434963-83014.jpg', '16:16:03', '08-11-2023', '1'),
(9, '16277', 'P1946144648', 'P1946144648', 'wiih', '0', '0', '16:16:24', '08-11-2023', '0'),
(10, '16277', 'P1946144648', 'P1946144648', '[Kirim Foto]', '0', '1699435024-22127.jpg', '16:17:04', '08-11-2023', '0'),
(11, '20498', 'P1946144648', 'D1697701004', 'hallo', '0', '0', '22:18:55', '10-11-2023', '1'),
(12, '20498', 'P1946144648', 'D1697701004', 'Iyah Hallo Jugaa..', '0', '0', '22:19:11', '10-11-2023', '0'),
(14, '28282', 'P25059', 'D1697701004', 'hallo', '0', '0', '18:51:00', '31-12-2023', '0'),
(15, '28282', 'P25059', 'D1697701004', 'mas', '0', '0', '18:57:42', '31-12-2023', '0'),
(16, '28282', 'P25059', 'D1697701004', 'iyah', '0', '0', '18:57:50', '31-12-2023', '1'),
(26, '14927', 'P65023', 'D1701173796', 'ia pak', '0', '0', '15:23:19', '10-01-2024', '1'),
(33, '24084', 'P123756', 'P123756', 'waduh', '0', '0', '23:55:33', '10-01-2024', '0'),
(35, '20241', 'P5281', 'D1695301140', '[Kirim Foto]', '0', '1704969995-72423.jpg', '17:46:35', '11-01-2024', '1'),
(36, '20241', 'P5281', 'D1695301140', 'dimana pak', '0', '0', '17:46:53', '11-01-2024', '0'),
(41, '13532', 'P40745', 'D1701173796', 'benar mesen Tah ', '0', '0', '20:31:24', '14-01-2024', '1'),
(68, '26260', 'P6007', 'D1700738153', 'mas posisi sesuai', '0', '0', '10:56:41', '07-02-2024', '1'),
(69, '26260', 'P6007', 'D1700738153', 'sesuai\n', '0', '0', '10:57:08', '07-02-2024', '0'),
(70, '16601', 'P91363', 'D1705925332', 'posisi sesuai ', '0', '0', '10:46:31', '09-02-2024', '1'),
(71, '16601', 'P91363', 'D1705925332', 'sewuqi titik ', '0', '0', '10:46:47', '09-02-2024', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_merchant`
--

CREATE TABLE `chat_merchant` (
  `id` int(11) NOT NULL,
  `idtrans` varchar(255) NOT NULL,
  `idmerc` varchar(255) NOT NULL,
  `iddriver` varchar(255) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `isread` varchar(255) DEFAULT '0',
  `fotochat` varchar(255) DEFAULT '0',
  `jam` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_driver`
--

CREATE TABLE `config_driver` (
  `id_driver` varchar(200) NOT NULL,
  `latitude` varchar(30) NOT NULL DEFAULT '0',
  `longitude` varchar(30) NOT NULL DEFAULT '0',
  `bearing` varchar(250) NOT NULL DEFAULT '0',
  `uang_belanja` int(11) NOT NULL DEFAULT 1,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `target` int(11) NOT NULL DEFAULT 0,
  `isreset` int(11) NOT NULL DEFAULT 0,
  `nextday` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '4',
  `reject` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `config_driver`
--

INSERT INTO `config_driver` (`id_driver`, `latitude`, `longitude`, `bearing`, `uang_belanja`, `update_at`, `target`, `isreset`, `nextday`, `status`, `reject`) VALUES
('D1708831070', '0.468372', '101.4180735', '0.0', 1, '2024-03-24 14:38:06', 0, 0, '0000-00-00', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_user`
--

CREATE TABLE `config_user` (
  `id_user` varchar(200) NOT NULL,
  `latitude` varchar(30) NOT NULL DEFAULT '0',
  `longitude` varchar(30) NOT NULL DEFAULT '0',
  `bearing` varchar(250) NOT NULL DEFAULT '0',
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `config_user`
--

INSERT INTO `config_user` (`id_user`, `latitude`, `longitude`, `bearing`, `update_at`) VALUES
('P165857', '0', '0', '0', '2023-12-16 14:00:13'),
('P164609', '0', '0', '0', '2023-12-16 14:48:04'),
('P162311', '0', '0', '0', '2023-12-16 15:27:39'),
('P164259', '0', '0', '0', '2023-12-16 15:46:17'),
('P171605', '0', '0', '0', '2023-12-16 17:20:43'),
('P171800', '0', '0', '0', '2023-12-16 17:24:52'),
('P172205', '0', '0', '0', '2023-12-16 17:31:58'),
('P173526', '0', '0', '0', '2023-12-16 17:37:03'),
('P173256', '0', '0', '0', '2023-12-16 17:38:16'),
('P174203', '0', '0', '0', '2023-12-16 17:43:58'),
('P174313', '0', '0', '0', '2023-12-16 17:45:29'),
('P174440', '0', '0', '0', '2023-12-16 17:47:01'),
('P173738', '0', '0', '0', '2023-12-16 17:47:11'),
('P175058', '0', '0', '0', '2023-12-16 17:52:19'),
('P174646', '0', '0', '0', '2023-12-16 17:54:27'),
('P175145', '0', '0', '0', '2023-12-16 17:59:56'),
('P170023', '0', '0', '0', '2023-12-16 18:01:35'),
('P170550', '0', '0', '0', '2023-12-16 18:07:48'),
('P171009', '0', '0', '0', '2023-12-16 18:12:49'),
('P171133', '0', '0', '0', '2023-12-16 18:15:03'),
('P171031', '0', '0', '0', '2023-12-16 18:18:02'),
('P171949', '0', '0', '0', '2023-12-16 18:25:23'),
('P172150', '0', '0', '0', '2023-12-16 18:25:34'),
('P173304', '0', '0', '0', '2023-12-16 18:37:02'),
('P174314', '0', '0', '0', '2023-12-16 18:44:52'),
('P174015', '0', '0', '0', '2023-12-16 18:47:39'),
('P170030', '0', '0', '0', '2023-12-17 00:02:51'),
('P175950', '0', '0', '0', '2023-12-17 03:02:37'),
('P170050', '0', '0', '0', '2023-12-17 03:03:28'),
('P170623', '0', '0', '0', '2023-12-17 03:07:49'),
('P170338', '0', '0', '0', '2023-12-17 03:09:40'),
('P170752', '0', '0', '0', '2023-12-17 03:10:40'),
('P170309', '0', '0', '0', '2023-12-17 03:11:50'),
('P171333', '0', '0', '0', '2023-12-17 03:17:28'),
('P171212', '0', '0', '0', '2023-12-17 03:19:46'),
('P171637', '0', '0', '0', '2023-12-17 03:20:11'),
('P171913', '0', '0', '0', '2023-12-17 03:20:27'),
('P172120', '0', '0', '0', '2023-12-17 03:25:28'),
('P172505', '0', '0', '0', '2023-12-17 03:26:24'),
('P172226', '0', '0', '0', '2023-12-17 03:26:24'),
('P172618', '0', '0', '0', '2023-12-17 03:27:19'),
('P172539', '0', '0', '0', '2023-12-17 03:29:01'),
('P173028', '0', '0', '0', '2023-12-17 03:32:13'),
('P173459', '0', '0', '0', '2023-12-17 03:37:09'),
('P172911', '0', '0', '0', '2023-12-17 03:37:46'),
('P173725', '0', '0', '0', '2023-12-17 03:38:26'),
('P173734', '0', '0', '0', '2023-12-17 03:38:42'),
('P173543', '0', '0', '0', '2023-12-17 03:39:14'),
('P173334', '0', '0', '0', '2023-12-17 03:40:03'),
('P173948', '0', '0', '0', '2023-12-17 03:41:13'),
('P174022', '0', '0', '0', '2023-12-17 03:41:46'),
('P174013', '0', '0', '0', '2023-12-17 03:43:03'),
('P170926', '0', '0', '0', '2023-12-17 03:44:57'),
('P173805', '0', '0', '0', '2023-12-17 03:45:39'),
('P174430', '0', '0', '0', '2023-12-17 03:45:55'),
('P174435', '0', '0', '0', '2023-12-17 03:49:10'),
('P174602', '0', '0', '0', '2023-12-17 03:49:43'),
('P174823', '0', '0', '0', '2023-12-17 03:50:30'),
('P173701', '0', '0', '0', '2023-12-17 03:51:47'),
('P174846', '0', '0', '0', '2023-12-17 03:53:29'),
('P175038', '0', '0', '0', '2023-12-17 03:55:05'),
('P174920', '0', '0', '0', '2023-12-17 03:55:12'),
('P175105', '0', '0', '0', '2023-12-17 03:55:27'),
('P174936', '0', '0', '0', '2023-12-17 03:55:40'),
('P175246', '0', '0', '0', '2023-12-17 03:57:02'),
('P175516', '0', '0', '0', '2023-12-17 03:57:18'),
('P172906', '0', '0', '0', '2023-12-17 03:58:14'),
('P175322', '0', '0', '0', '2023-12-17 03:59:14'),
('P170133', '0', '0', '0', '2023-12-17 04:03:49'),
('P170948', '0', '0', '0', '2023-12-17 04:13:36'),
('P172016', '0', '0', '0', '2023-12-17 04:21:45'),
('P172517', '0', '0', '0', '2023-12-17 04:26:07'),
('P174036', '0', '0', '0', '2023-12-17 04:41:53'),
('P173739', '0', '0', '0', '2023-12-17 04:42:17'),
('P174042', '0', '0', '0', '2023-12-17 04:44:13'),
('P173748', '0', '0', '0', '2023-12-17 04:49:10'),
('P174159', '0', '0', '0', '2023-12-17 04:50:06'),
('P175332', '0', '0', '0', '2023-12-17 04:55:00'),
('P175758', '0', '0', '0', '2023-12-17 04:59:52'),
('P175531', '0', '0', '0', '2023-12-17 05:00:32'),
('P175533', '0', '0', '0', '2023-12-17 05:03:53'),
('P170458', '0', '0', '0', '2023-12-17 05:07:33'),
('P170530', '0', '0', '0', '2023-12-17 05:12:08'),
('P171554', '0', '0', '0', '2023-12-17 05:17:54'),
('P172105', '0', '0', '0', '2023-12-17 05:24:09'),
('P172400', '0', '0', '0', '2023-12-17 05:28:03'),
('P173225', '0', '0', '0', '2023-12-17 05:37:27'),
('P170021', '0', '0', '0', '2023-12-17 05:38:28'),
('P174607', '0', '0', '0', '2023-12-17 05:47:02'),
('P175239', '0', '0', '0', '2023-12-17 05:57:30'),
('P174438', '0', '0', '0', '2023-12-17 06:01:49'),
('P175818', '0', '0', '0', '2023-12-17 06:04:34'),
('P170427', '0', '0', '0', '2023-12-17 06:06:30'),
('P170548', '0', '0', '0', '2023-12-17 06:09:51'),
('P170637', '0', '0', '0', '2023-12-17 06:10:20'),
('P170906', '0', '0', '0', '2023-12-17 06:10:44'),
('P171102', '0', '0', '0', '2023-12-17 06:11:57'),
('P171154', '0', '0', '0', '2023-12-17 06:13:23'),
('P171713', '0', '0', '0', '2023-12-17 06:17:36'),
('P171830', '0', '0', '0', '2023-12-17 06:19:20'),
('P171639', '0', '0', '0', '2023-12-17 06:21:15'),
('P172402', '0', '0', '0', '2023-12-17 06:26:35'),
('P172736', '0', '0', '0', '2023-12-17 06:28:32'),
('P172654', '0', '0', '0', '2023-12-17 06:29:14'),
('P173429', '0', '0', '0', '2023-12-17 06:37:05'),
('P173203', '0', '0', '0', '2023-12-17 06:37:20'),
('P173250', '0', '0', '0', '2023-12-17 06:37:27'),
('P173835', '0', '0', '0', '2023-12-17 06:41:03'),
('P173928', '0', '0', '0', '2023-12-17 06:41:07'),
('P173814', '0', '0', '0', '2023-12-17 06:44:18'),
('P174605', '0', '0', '0', '2023-12-17 06:51:03'),
('P175232', '0', '0', '0', '2023-12-17 06:55:46'),
('P175908', '0', '0', '0', '2023-12-17 07:02:05'),
('P171436', '0', '0', '0', '2023-12-17 07:16:35'),
('P173252', '0', '0', '0', '2023-12-17 07:36:13'),
('P173915', '0', '0', '0', '2023-12-17 07:46:13'),
('P174700', '0', '0', '0', '2023-12-17 07:50:12'),
('P175507', '0', '0', '0', '2023-12-17 07:56:33'),
('P175709', '0', '0', '0', '2023-12-17 08:02:42'),
('P170101', '0', '0', '0', '2023-12-17 08:02:45'),
('P170834', '0', '0', '0', '2023-12-17 08:09:43'),
('P171101', '0', '0', '0', '2023-12-17 08:15:12'),
('P170705', '0', '0', '0', '2023-12-17 08:31:23'),
('P173241', '0', '0', '0', '2023-12-17 08:49:15'),
('P174817', '0', '0', '0', '2023-12-17 08:49:34'),
('P175022', '0', '0', '0', '2023-12-17 08:52:15'),
('P175307', '0', '0', '0', '2023-12-17 08:54:01'),
('P175548', '0', '0', '0', '2023-12-17 08:57:04'),
('P175731', '0', '0', '0', '2023-12-17 08:58:28'),
('P175929', '0', '0', '0', '2023-12-17 09:01:16'),
('P170049', '0', '0', '0', '2023-12-17 09:03:55'),
('P171303', '0', '0', '0', '2023-12-17 09:17:27'),
('P172632', '0', '0', '0', '2023-12-17 09:29:17'),
('P172617', '0', '0', '0', '2023-12-17 09:31:59'),
('P172921', '0', '0', '0', '2023-12-17 09:35:19'),
('P173540', '0', '0', '0', '2023-12-17 09:36:15'),
('P175053', '0', '0', '0', '2023-12-17 09:51:48'),
('P170555', '0', '0', '0', '2023-12-17 10:09:22'),
('P170841', '0', '0', '0', '2023-12-17 10:14:41'),
('P171652', '0', '0', '0', '2023-12-17 10:19:27'),
('P171904', '0', '0', '0', '2023-12-17 10:21:08'),
('P171912', '0', '0', '0', '2023-12-17 10:21:36'),
('P171945', '0', '0', '0', '2023-12-17 10:23:20'),
('P172249', '0', '0', '0', '2023-12-17 10:25:57'),
('P172106', '0', '0', '0', '2023-12-17 10:26:04'),
('P172342', '0', '0', '0', '2023-12-17 10:26:46'),
('P174016', '0', '0', '0', '2023-12-17 10:44:31'),
('P174122', '0', '0', '0', '2023-12-17 10:45:31'),
('P174635', '0', '0', '0', '2023-12-17 10:49:40'),
('P174636', '0', '0', '0', '2023-12-17 10:50:15'),
('P174857', '0', '0', '0', '2023-12-17 10:52:05'),
('P175215', '0', '0', '0', '2023-12-17 10:58:20'),
('P175707', '0', '0', '0', '2023-12-17 10:58:23'),
('P170036', '0', '0', '0', '2023-12-17 11:01:23'),
('P170729', '0', '0', '0', '2023-12-17 11:10:15'),
('P171347', '0', '0', '0', '2023-12-17 11:19:22'),
('P170615', '0', '0', '0', '2023-12-17 11:24:12'),
('P172223', '0', '0', '0', '2023-12-17 11:24:26'),
('P172137', '0', '0', '0', '2023-12-17 11:25:58'),
('P172040', '0', '0', '0', '2023-12-17 11:27:14'),
('P172548', '0', '0', '0', '2023-12-17 11:31:17'),
('P173729', '0', '0', '0', '2023-12-17 11:37:49'),
('P172047', '0', '0', '0', '2023-12-17 11:38:10'),
('P174547', '0', '0', '0', '2023-12-17 11:49:36'),
('P174446', '0', '0', '0', '2023-12-17 11:53:33'),
('P175012', '0', '0', '0', '2023-12-17 11:53:37'),
('P171645', '0', '0', '0', '2023-12-17 12:22:06'),
('P172124', '0', '0', '0', '2023-12-17 12:23:44'),
('P172428', '0', '0', '0', '2023-12-17 12:29:13'),
('P172752', '0', '0', '0', '2023-12-17 12:31:31'),
('P170405', '0', '0', '0', '2023-12-17 12:41:41'),
('P174241', '0', '0', '0', '2023-12-17 12:46:46'),
('P175040', '0', '0', '0', '2023-12-17 12:54:53'),
('P175424', '0', '0', '0', '2023-12-17 12:56:23'),
('P175708', '0', '0', '0', '2023-12-17 12:59:52'),
('P175646', '0', '0', '0', '2023-12-17 13:04:25'),
('P170546', '0', '0', '0', '2023-12-17 13:07:17'),
('P170750', '0', '0', '0', '2023-12-17 13:10:40'),
('P170914', '0', '0', '0', '2023-12-17 13:11:32'),
('P171305', '0', '0', '0', '2023-12-17 13:15:49'),
('P171250', '0', '0', '0', '2023-12-17 13:17:08'),
('P172046', '0', '0', '0', '2023-12-17 13:29:09'),
('P173118', '0', '0', '0', '2023-12-17 13:32:28'),
('P171039', '0', '0', '0', '2023-12-17 14:12:00'),
('P171237', '0', '0', '0', '2023-12-17 14:14:05'),
('P172134', '0', '0', '0', '2023-12-17 14:25:10'),
('P172754', '0', '0', '0', '2023-12-17 14:29:16'),
('P172949', '0', '0', '0', '2023-12-17 14:31:19'),
('P173205', '0', '0', '0', '2023-12-17 14:33:32'),
('P173305', '0', '0', '0', '2023-12-17 14:34:06'),
('P173444', '0', '0', '0', '2023-12-17 14:36:24'),
('P173707', '0', '0', '0', '2023-12-17 14:38:38'),
('P173909', '0', '0', '0', '2023-12-17 14:40:38'),
('P174108', '0', '0', '0', '2023-12-17 14:42:54'),
('P174328', '0', '0', '0', '2023-12-17 14:44:40'),
('P174531', '0', '0', '0', '2023-12-17 14:46:39'),
('P174708', '0', '0', '0', '2023-12-17 14:48:26'),
('P174901', '0', '0', '0', '2023-12-17 14:50:18'),
('P175042', '0', '0', '0', '2023-12-17 14:52:03'),
('P175224', '0', '0', '0', '2023-12-17 14:53:40'),
('P175401', '0', '0', '0', '2023-12-17 14:55:16'),
('P175537', '0', '0', '0', '2023-12-17 14:56:46'),
('P175704', '0', '0', '0', '2023-12-17 14:58:14'),
('P170453', '0', '0', '0', '2023-12-17 15:08:56'),
('P171727', '0', '0', '0', '2023-12-17 15:22:24'),
('P173913', '0', '0', '0', '2023-12-17 15:40:53'),
('P174603', '0', '0', '0', '2023-12-17 15:47:59'),
('P181814', '0', '0', '0', '2023-12-17 17:20:59'),
('P184337', '0', '0', '0', '2023-12-17 22:52:12'),
('P184859', '0', '0', '0', '2023-12-17 23:51:46'),
('P184928', '0', '0', '0', '2023-12-17 23:52:11'),
('P184159', '0', '0', '0', '2023-12-18 00:44:51'),
('P185308', '0', '0', '0', '2023-12-18 00:55:31'),
('P180720', '0', '0', '0', '2023-12-18 01:08:57'),
('P180945', '0', '0', '0', '2023-12-18 01:11:34'),
('P181432', '0', '0', '0', '2023-12-18 01:16:35'),
('P181721', '0', '0', '0', '2023-12-18 01:18:58'),
('P181920', '0', '0', '0', '2023-12-18 01:21:26'),
('P182139', '0', '0', '0', '2023-12-18 01:23:13'),
('P182328', '0', '0', '0', '2023-12-18 01:25:00'),
('P182513', '0', '0', '0', '2023-12-18 01:26:38'),
('P182651', '0', '0', '0', '2023-12-18 01:28:00'),
('P182701', '0', '0', '0', '2023-12-18 01:28:27'),
('P182734', '0', '0', '0', '2023-12-18 01:28:50'),
('P182813', '0', '0', '0', '2023-12-18 01:29:38'),
('P182914', '0', '0', '0', '2023-12-18 01:30:17'),
('P182956', '0', '0', '0', '2023-12-18 01:31:16'),
('P183036', '0', '0', '0', '2023-12-18 01:31:41'),
('P183207', '0', '0', '0', '2023-12-18 01:33:15'),
('P183332', '0', '0', '0', '2023-12-18 01:34:52'),
('P183511', '0', '0', '0', '2023-12-18 01:36:26'),
('P183645', '0', '0', '0', '2023-12-18 01:38:05'),
('P183933', '0', '0', '0', '2023-12-18 01:42:20'),
('P184231', '0', '0', '0', '2023-12-18 01:43:55'),
('P184421', '0', '0', '0', '2023-12-18 01:45:47'),
('P183838', '0', '0', '0', '2023-12-18 01:51:35'),
('P185349', '0', '0', '0', '2023-12-18 01:55:21'),
('P185520', '0', '0', '0', '2023-12-18 01:56:27'),
('P185541', '0', '0', '0', '2023-12-18 01:57:52'),
('P185707', '0', '0', '0', '2023-12-18 01:58:41'),
('P185804', '0', '0', '0', '2023-12-18 01:59:28'),
('P185859', '0', '0', '0', '2023-12-18 02:00:31'),
('P185955', '0', '0', '0', '2023-12-18 02:01:50'),
('P180050', '0', '0', '0', '2023-12-18 02:02:15'),
('P180228', '0', '0', '0', '2023-12-18 02:03:51'),
('P180255', '0', '0', '0', '2023-12-18 02:04:13'),
('P180404', '0', '0', '0', '2023-12-18 02:05:28'),
('P180432', '0', '0', '0', '2023-12-18 02:05:34'),
('P180556', '0', '0', '0', '2023-12-18 02:07:07'),
('P185238', '0', '0', '0', '2023-12-18 02:08:45'),
('P180739', '0', '0', '0', '2023-12-18 02:08:56'),
('P180715', '0', '0', '0', '2023-12-18 02:09:54'),
('P180914', '0', '0', '0', '2023-12-18 02:10:22'),
('P181014', '0', '0', '0', '2023-12-18 02:11:36'),
('P181041', '0', '0', '0', '2023-12-18 02:11:46'),
('P181212', '0', '0', '0', '2023-12-18 02:13:27'),
('P181221', '0', '0', '0', '2023-12-18 02:14:27'),
('P181440', '0', '0', '0', '2023-12-18 02:15:53'),
('P181505', '0', '0', '0', '2023-12-18 02:16:15'),
('P181630', '0', '0', '0', '2023-12-18 02:17:46'),
('P181803', '0', '0', '0', '2023-12-18 02:19:15'),
('P181931', '0', '0', '0', '2023-12-18 02:20:43'),
('P181907', '0', '0', '0', '2023-12-18 02:21:09'),
('P182107', '0', '0', '0', '2023-12-18 02:22:27'),
('P182144', '0', '0', '0', '2023-12-18 02:23:04'),
('P182243', '0', '0', '0', '2023-12-18 02:23:56'),
('P182315', '0', '0', '0', '2023-12-18 02:24:44'),
('P182417', '0', '0', '0', '2023-12-18 02:25:30'),
('P182457', '0', '0', '0', '2023-12-18 02:26:22'),
('P182550', '0', '0', '0', '2023-12-18 02:27:11'),
('P182632', '0', '0', '0', '2023-12-18 02:28:04'),
('P182729', '0', '0', '0', '2023-12-18 02:28:41'),
('P182429', '0', '0', '0', '2023-12-18 02:29:15'),
('P182816', '0', '0', '0', '2023-12-18 02:29:50'),
('P182902', '0', '0', '0', '2023-12-18 02:30:22'),
('P183007', '0', '0', '0', '2023-12-18 02:31:30'),
('P183056', '0', '0', '0', '2023-12-18 02:32:05'),
('P183227', '0', '0', '0', '2023-12-18 02:33:39'),
('P183201', '0', '0', '0', '2023-12-18 02:34:01'),
('P183356', '0', '0', '0', '2023-12-18 02:35:11'),
('P183412', '0', '0', '0', '2023-12-18 02:35:43'),
('P183530', '0', '0', '0', '2023-12-18 02:36:51'),
('P183604', '0', '0', '0', '2023-12-18 02:37:29'),
('P183711', '0', '0', '0', '2023-12-18 02:38:24'),
('P183740', '0', '0', '0', '2023-12-18 02:38:57'),
('P183852', '0', '0', '0', '2023-12-18 02:40:12'),
('P183914', '0', '0', '0', '2023-12-18 02:40:38'),
('P184049', '0', '0', '0', '2023-12-18 02:42:04'),
('P184105', '0', '0', '0', '2023-12-18 02:42:35'),
('P184217', '0', '0', '0', '2023-12-18 02:43:19'),
('P184256', '0', '0', '0', '2023-12-18 02:44:16'),
('P184330', '0', '0', '0', '2023-12-18 02:44:48'),
('P184454', '0', '0', '0', '2023-12-18 02:46:18'),
('P184501', '0', '0', '0', '2023-12-18 02:46:42'),
('P184636', '0', '0', '0', '2023-12-18 02:47:48'),
('P184656', '0', '0', '0', '2023-12-18 02:48:00'),
('P184814', '0', '0', '0', '2023-12-18 02:49:00'),
('P184807', '0', '0', '0', '2023-12-18 02:49:27'),
('P184924', '0', '0', '0', '2023-12-18 02:50:53'),
('P185115', '0', '0', '0', '2023-12-18 02:52:47'),
('P185301', '0', '0', '0', '2023-12-18 02:54:34'),
('P185444', '0', '0', '0', '2023-12-18 02:56:33'),
('P185646', '0', '0', '0', '2023-12-18 02:58:02'),
('P185813', '0', '0', '0', '2023-12-18 02:59:45'),
('P180008', '0', '0', '0', '2023-12-18 03:01:19'),
('P180040', '0', '0', '0', '2023-12-18 03:02:00'),
('P180141', '0', '0', '0', '2023-12-18 03:03:16'),
('P180747', '0', '0', '0', '2023-12-18 03:12:45'),
('P184101', '0', '0', '0', '2023-12-18 03:42:52'),
('P184259', '0', '0', '0', '2023-12-18 03:46:36'),
('P184917', '0', '0', '0', '2023-12-18 03:53:23'),
('P180340', '0', '0', '0', '2023-12-18 04:05:08'),
('P185543', '0', '0', '0', '2023-12-18 04:57:52'),
('P180116', '0', '0', '0', '2023-12-18 05:02:21'),
('P180453', '0', '0', '0', '2023-12-18 05:06:09'),
('P180312', '0', '0', '0', '2023-12-18 05:06:53'),
('P180829', '0', '0', '0', '2023-12-18 05:09:28'),
('P181011', '0', '0', '0', '2023-12-18 05:11:04'),
('P181354', '0', '0', '0', '2023-12-18 05:14:54'),
('P181513', '0', '0', '0', '2023-12-18 05:16:05'),
('P181421', '0', '0', '0', '2023-12-18 06:15:51'),
('P181714', '0', '0', '0', '2023-12-18 06:18:42'),
('P182346', '0', '0', '0', '2023-12-18 06:26:36'),
('P182645', '0', '0', '0', '2023-12-18 06:29:02'),
('P180125', '0', '0', '0', '2023-12-18 07:02:18'),
('P185252', '0', '0', '0', '2023-12-18 07:57:20'),
('P185827', '0', '0', '0', '2023-12-18 08:00:05'),
('P182046', '0', '0', '0', '2023-12-18 08:23:32'),
('P184223', '0', '0', '0', '2023-12-18 08:44:58'),
('P185319', '0', '0', '0', '2023-12-18 08:54:43'),
('P182026', '0', '0', '0', '2023-12-18 09:27:10'),
('P183151', '0', '0', '0', '2023-12-18 09:34:24'),
('P184022', '0', '0', '0', '2023-12-18 10:48:13'),
('P180039', '0', '0', '0', '2023-12-18 11:01:52'),
('P180204', '0', '0', '0', '2023-12-18 11:03:07'),
('P180333', '0', '0', '0', '2023-12-18 11:04:32'),
('P183537', '0', '0', '0', '2023-12-18 11:38:08'),
('P183135', '0', '0', '0', '2023-12-18 12:32:58'),
('P184626', '0', '0', '0', '2023-12-18 12:47:35'),
('P180518', '0', '0', '0', '2023-12-18 13:06:58'),
('P180759', '0', '0', '0', '2023-12-18 13:10:53'),
('P181722', '0', '0', '0', '2023-12-18 13:20:09'),
('P181138', '0', '0', '0', '2023-12-18 13:23:33'),
('P182331', '0', '0', '0', '2023-12-18 13:28:44'),
('P182624', '0', '0', '0', '2023-12-18 13:29:06'),
('P182709', '0', '0', '0', '2023-12-18 13:30:16'),
('P183153', '0', '0', '0', '2023-12-18 13:34:54'),
('P183409', '0', '0', '0', '2023-12-18 13:36:56'),
('P183119', '0', '0', '0', '2023-12-18 13:37:21'),
('P184009', '0', '0', '0', '2023-12-18 13:41:25'),
('P184402', '0', '0', '0', '2023-12-18 13:45:39'),
('P184654', '0', '0', '0', '2023-12-18 13:47:56'),
('P184847', '0', '0', '0', '2023-12-18 13:50:06'),
('P184939', '0', '0', '0', '2023-12-18 13:51:56'),
('P185118', '0', '0', '0', '2023-12-18 13:52:32'),
('P185248', '0', '0', '0', '2023-12-18 13:53:47'),
('P185729', '0', '0', '0', '2023-12-18 13:58:53'),
('P185910', '0', '0', '0', '2023-12-18 14:00:01'),
('P185941', '0', '0', '0', '2023-12-18 14:01:24'),
('P180145', '0', '0', '0', '2023-12-18 14:02:59'),
('P180324', '0', '0', '0', '2023-12-18 14:04:37'),
('P185823', '0', '0', '0', '2023-12-18 14:05:20'),
('P180504', '0', '0', '0', '2023-12-18 14:06:17'),
('P180557', '0', '0', '0', '2023-12-18 14:07:08'),
('P180636', '0', '0', '0', '2023-12-18 14:07:48'),
('P180817', '0', '0', '0', '2023-12-18 14:09:28'),
('P180846', '0', '0', '0', '2023-12-18 14:11:00'),
('P180951', '0', '0', '0', '2023-12-18 14:11:36'),
('P181158', '0', '0', '0', '2023-12-18 14:13:31'),
('P180741', '0', '0', '0', '2023-12-18 14:13:52'),
('P181356', '0', '0', '0', '2023-12-18 14:15:10'),
('P181059', '0', '0', '0', '2023-12-18 14:16:16'),
('P180718', '0', '0', '0', '2023-12-18 14:17:37'),
('P181717', '0', '0', '0', '2023-12-18 14:19:45'),
('P183118', '0', '0', '0', '2023-12-18 14:32:05'),
('P182549', '0', '0', '0', '2023-12-18 14:33:51'),
('P183958', '0', '0', '0', '2023-12-18 14:40:54'),
('P184054', '0', '0', '0', '2023-12-18 14:45:10'),
('P181201', '0', '0', '0', '2023-12-18 15:13:10'),
('P181649', '0', '0', '0', '2023-12-18 15:18:49'),
('P182546', '0', '0', '0', '2023-12-18 15:27:13'),
('P185316', '0', '0', '0', '2023-12-18 15:54:18'),
('P185525', '0', '0', '0', '2023-12-18 15:56:30'),
('P180513', '0', '0', '0', '2023-12-18 16:06:37'),
('P180502', '0', '0', '0', '2023-12-18 16:07:05'),
('P180716', '0', '0', '0', '2023-12-18 16:08:36'),
('P180849', '0', '0', '0', '2023-12-18 16:10:26'),
('P181039', '0', '0', '0', '2023-12-18 16:12:17'),
('P181229', '0', '0', '0', '2023-12-18 16:14:26'),
('P181437', '0', '0', '0', '2023-12-18 16:16:05'),
('P181619', '0', '0', '0', '2023-12-18 16:17:48'),
('P181759', '0', '0', '0', '2023-12-18 16:19:37'),
('P182005', '0', '0', '0', '2023-12-18 16:21:25'),
('P192628', '0', '0', '0', '2023-12-18 16:31:04'),
('P183022', '0', '0', '0', '2023-12-18 16:31:50'),
('P183204', '0', '0', '0', '2023-12-18 16:33:19'),
('P183337', '0', '0', '0', '2023-12-18 16:35:17'),
('P183528', '0', '0', '0', '2023-12-18 16:37:04'),
('P183720', '0', '0', '0', '2023-12-18 16:38:42'),
('P183723', '0', '0', '0', '2023-12-18 16:39:36'),
('P183950', '0', '0', '0', '2023-12-18 16:41:33'),
('P184157', '0', '0', '0', '2023-12-18 16:42:49'),
('P184146', '0', '0', '0', '2023-12-18 16:43:39'),
('P184350', '0', '0', '0', '2023-12-18 16:45:36'),
('P184529', '0', '0', '0', '2023-12-18 16:46:16'),
('P184603', '0', '0', '0', '2023-12-18 16:47:29'),
('P184741', '0', '0', '0', '2023-12-18 16:49:09'),
('P185120', '0', '0', '0', '2023-12-18 16:53:49'),
('P185407', '0', '0', '0', '2023-12-18 16:55:38'),
('P185551', '0', '0', '0', '2023-12-18 16:57:44'),
('P185839', '0', '0', '0', '2023-12-18 17:00:10'),
('P190021', '0', '0', '0', '2023-12-18 17:01:31'),
('P192819', '0', '0', '0', '2023-12-18 17:29:35'),
('P193203', '0', '0', '0', '2023-12-18 17:33:03'),
('P193854', '0', '0', '0', '2023-12-18 21:42:21'),
('P194915', '0', '0', '0', '2023-12-18 21:54:52'),
('P190518', '0', '0', '0', '2023-12-18 22:09:09'),
('P185146', '0', '0', '0', '2023-12-18 22:39:10'),
('P195031', '0', '0', '0', '2023-12-18 22:59:56'),
('P195756', '0', '0', '0', '2023-12-18 23:00:55'),
('P190000', '0', '0', '0', '2023-12-18 23:01:53'),
('P191425', '0', '0', '0', '2023-12-18 23:18:49'),
('P193033', '0', '0', '0', '2023-12-18 23:32:31'),
('P192744', '0', '0', '0', '2023-12-19 00:32:13'),
('P193917', '0', '0', '0', '2023-12-19 01:43:11'),
('P194906', '0', '0', '0', '2023-12-19 01:53:58'),
('P195653', '0', '0', '0', '2023-12-19 01:57:50'),
('P190726', '0', '0', '0', '2023-12-19 02:08:23'),
('P190654', '0', '0', '0', '2023-12-19 02:10:50'),
('P191313', '0', '0', '0', '2023-12-19 02:16:57'),
('P192844', '0', '0', '0', '2023-12-19 02:36:28'),
('P193907', '0', '0', '0', '2023-12-19 02:40:39'),
('P193844', '0', '0', '0', '2023-12-19 02:42:42'),
('P194259', '0', '0', '0', '2023-12-19 02:48:11'),
('P195129', '0', '0', '0', '2023-12-19 02:54:31'),
('P195459', '0', '0', '0', '2023-12-19 02:57:08'),
('P195750', '0', '0', '0', '2023-12-19 02:59:20'),
('P195947', '0', '0', '0', '2023-12-19 03:01:14'),
('P195753', '0', '0', '0', '2023-12-19 03:01:58'),
('P190134', '0', '0', '0', '2023-12-19 03:02:57'),
('P190344', '0', '0', '0', '2023-12-19 03:04:49'),
('P190510', '0', '0', '0', '2023-12-19 03:06:21'),
('P190640', '0', '0', '0', '2023-12-19 03:08:14'),
('P190847', '0', '0', '0', '2023-12-19 03:09:55'),
('P191015', '0', '0', '0', '2023-12-19 03:11:37'),
('P191154', '0', '0', '0', '2023-12-19 03:13:08'),
('P191323', '0', '0', '0', '2023-12-19 03:14:36'),
('P191502', '0', '0', '0', '2023-12-19 03:16:13'),
('P191633', '0', '0', '0', '2023-12-19 03:17:42'),
('P191759', '0', '0', '0', '2023-12-19 03:19:01'),
('P191920', '0', '0', '0', '2023-12-19 03:20:37'),
('P192219', '0', '0', '0', '2023-12-19 03:23:35'),
('P192358', '0', '0', '0', '2023-12-19 03:25:14'),
('P192533', '0', '0', '0', '2023-12-19 03:26:46'),
('P192712', '0', '0', '0', '2023-12-19 03:28:29'),
('P192848', '0', '0', '0', '2023-12-19 03:29:54'),
('P193014', '0', '0', '0', '2023-12-19 03:31:35'),
('P193315', '0', '0', '0', '2023-12-19 03:34:20'),
('P193458', '0', '0', '0', '2023-12-19 03:36:14'),
('P193633', '0', '0', '0', '2023-12-19 03:37:44'),
('P193626', '0', '0', '0', '2023-12-19 03:38:18'),
('P193801', '0', '0', '0', '2023-12-19 03:39:18'),
('P193934', '0', '0', '0', '2023-12-19 03:40:49'),
('P194110', '0', '0', '0', '2023-12-19 03:42:45'),
('P194310', '0', '0', '0', '2023-12-19 03:44:11'),
('P194430', '0', '0', '0', '2023-12-19 03:45:30'),
('P194515', '0', '0', '0', '2023-12-19 03:46:49'),
('P194548', '0', '0', '0', '2023-12-19 03:47:01'),
('P194723', '0', '0', '0', '2023-12-19 03:48:38'),
('P194854', '0', '0', '0', '2023-12-19 03:49:56'),
('P195016', '0', '0', '0', '2023-12-19 03:51:28'),
('P194954', '0', '0', '0', '2023-12-19 03:51:49'),
('P195151', '0', '0', '0', '2023-12-19 03:53:04'),
('P195331', '0', '0', '0', '2023-12-19 03:54:44'),
('P195508', '0', '0', '0', '2023-12-19 03:56:14'),
('P195631', '0', '0', '0', '2023-12-19 03:57:39'),
('P195802', '0', '0', '0', '2023-12-19 03:59:03'),
('P195928', '0', '0', '0', '2023-12-19 04:00:28'),
('P190047', '0', '0', '0', '2023-12-19 04:01:58'),
('P190213', '0', '0', '0', '2023-12-19 04:03:15'),
('P190335', '0', '0', '0', '2023-12-19 04:04:45'),
('P190511', '0', '0', '0', '2023-12-19 04:06:13'),
('P190635', '0', '0', '0', '2023-12-19 04:07:48'),
('P190829', '0', '0', '0', '2023-12-19 04:09:35'),
('P191125', '0', '0', '0', '2023-12-19 04:12:46'),
('P191301', '0', '0', '0', '2023-12-19 04:14:22'),
('P191441', '0', '0', '0', '2023-12-19 04:16:12'),
('P191442', '0', '0', '0', '2023-12-19 04:16:55'),
('P192650', '0', '0', '0', '2023-12-19 04:31:15'),
('P192659', '0', '0', '0', '2023-12-19 04:32:15'),
('P193306', '0', '0', '0', '2023-12-19 04:35:08'),
('P195324', '0', '0', '0', '2023-12-19 04:56:42'),
('P193858', '0', '0', '0', '2023-12-19 05:40:24'),
('P194040', '0', '0', '0', '2023-12-19 05:42:03'),
('P194217', '0', '0', '0', '2023-12-19 05:43:22'),
('P194349', '0', '0', '0', '2023-12-19 05:45:24'),
('P194556', '0', '0', '0', '2023-12-19 05:47:25'),
('P194750', '0', '0', '0', '2023-12-19 05:49:01'),
('P194922', '0', '0', '0', '2023-12-19 05:50:37'),
('P195055', '0', '0', '0', '2023-12-19 05:52:17'),
('P195237', '0', '0', '0', '2023-12-19 05:53:51'),
('P195414', '0', '0', '0', '2023-12-19 05:55:42'),
('P195601', '0', '0', '0', '2023-12-19 05:57:21'),
('P195744', '0', '0', '0', '2023-12-19 05:58:45'),
('P190005', '0', '0', '0', '2023-12-19 06:01:22'),
('P190252', '0', '0', '0', '2023-12-19 06:04:17'),
('P190436', '0', '0', '0', '2023-12-19 06:05:44'),
('P190604', '0', '0', '0', '2023-12-19 06:07:13'),
('P190731', '0', '0', '0', '2023-12-19 06:09:00'),
('P190916', '0', '0', '0', '2023-12-19 06:10:23'),
('P191042', '0', '0', '0', '2023-12-19 06:11:54'),
('P191209', '0', '0', '0', '2023-12-19 06:13:21'),
('P191340', '0', '0', '0', '2023-12-19 06:15:06'),
('P191130', '0', '0', '0', '2023-12-19 06:16:28'),
('P191559', '0', '0', '0', '2023-12-19 06:17:13'),
('P191738', '0', '0', '0', '2023-12-19 06:18:47'),
('P191903', '0', '0', '0', '2023-12-19 06:20:11'),
('P192030', '0', '0', '0', '2023-12-19 06:21:57'),
('P192224', '0', '0', '0', '2023-12-19 06:23:25'),
('P192349', '0', '0', '0', '2023-12-19 06:24:53'),
('P192509', '0', '0', '0', '2023-12-19 06:26:21'),
('P192636', '0', '0', '0', '2023-12-19 06:27:38'),
('P192756', '0', '0', '0', '2023-12-19 06:29:08'),
('P195448', '0', '0', '0', '2023-12-19 07:55:52'),
('P192708', '0', '0', '0', '2023-12-19 08:29:47'),
('P194551', '0', '0', '0', '2023-12-19 08:49:00'),
('P195407', '0', '0', '0', '2023-12-19 08:55:18'),
('P195534', '0', '0', '0', '2023-12-19 08:56:43'),
('P195657', '0', '0', '0', '2023-12-19 08:57:48'),
('P190054', '0', '0', '0', '2023-12-19 09:02:43'),
('P190301', '0', '0', '0', '2023-12-19 09:04:28'),
('P190508', '0', '0', '0', '2023-12-19 09:06:33'),
('P190523', '0', '0', '0', '2023-12-19 09:06:42'),
('P190701', '0', '0', '0', '2023-12-19 09:08:24'),
('P190029', '0', '0', '0', '2023-12-19 09:09:06'),
('P190841', '0', '0', '0', '2023-12-19 09:09:50'),
('P191008', '0', '0', '0', '2023-12-19 09:11:30'),
('P191146', '0', '0', '0', '2023-12-19 09:13:24'),
('P191625', '0', '0', '0', '2023-12-19 09:17:49'),
('P191835', '0', '0', '0', '2023-12-19 09:20:26'),
('P192055', '0', '0', '0', '2023-12-19 09:22:21'),
('P194136', '0', '0', '0', '2023-12-19 09:43:11'),
('P194336', '0', '0', '0', '2023-12-19 09:44:50'),
('P194923', '0', '0', '0', '2023-12-19 09:50:50'),
('P195112', '0', '0', '0', '2023-12-19 09:52:36'),
('P195307', '0', '0', '0', '2023-12-19 09:55:04'),
('P195538', '0', '0', '0', '2023-12-19 09:56:48'),
('P195707', '0', '0', '0', '2023-12-19 09:58:58'),
('P195921', '0', '0', '0', '2023-12-19 10:00:39'),
('P190058', '0', '0', '0', '2023-12-19 10:02:17'),
('P190234', '0', '0', '0', '2023-12-19 10:03:43'),
('P190359', '0', '0', '0', '2023-12-19 10:05:12'),
('P190811', '0', '0', '0', '2023-12-19 10:09:30'),
('P190954', '0', '0', '0', '2023-12-19 10:11:02'),
('P190800', '0', '0', '0', '2023-12-19 10:11:51'),
('P191123', '0', '0', '0', '2023-12-19 10:12:53'),
('P191311', '0', '0', '0', '2023-12-19 10:14:17'),
('P191435', '0', '0', '0', '2023-12-19 10:15:47'),
('P191410', '0', '0', '0', '2023-12-19 10:17:15'),
('P191611', '0', '0', '0', '2023-12-19 10:17:31'),
('P191750', '0', '0', '0', '2023-12-19 10:19:04'),
('P191919', '0', '0', '0', '2023-12-19 10:20:19'),
('P192034', '0', '0', '0', '2023-12-19 10:21:40'),
('P193515', '0', '0', '0', '2023-12-19 10:38:02'),
('P193812', '0', '0', '0', '2023-12-19 10:39:50'),
('P194030', '0', '0', '0', '2023-12-19 10:42:45'),
('P194211', '0', '0', '0', '2023-12-19 10:44:29'),
('P194342', '0', '0', '0', '2023-12-19 10:45:20'),
('P194534', '0', '0', '0', '2023-12-19 10:47:25'),
('P195007', '0', '0', '0', '2023-12-19 10:53:25'),
('P195337', '0', '0', '0', '2023-12-19 10:55:51'),
('P195603', '0', '0', '0', '2023-12-19 10:58:59'),
('P195924', '0', '0', '0', '2023-12-19 11:01:26'),
('P191115', '0', '0', '0', '2023-12-19 12:13:23'),
('P191421', '0', '0', '0', '2023-12-19 12:16:02'),
('P191931', '0', '0', '0', '2023-12-19 12:20:42'),
('P192113', '0', '0', '0', '2023-12-19 12:22:22'),
('P191930', '0', '0', '0', '2023-12-19 12:22:36'),
('P192324', '0', '0', '0', '2023-12-19 12:25:36'),
('P192553', '0', '0', '0', '2023-12-19 12:27:39'),
('P192910', '0', '0', '0', '2023-12-19 12:30:20'),
('P192824', '0', '0', '0', '2023-12-19 12:30:40'),
('P193117', '0', '0', '0', '2023-12-19 12:33:08'),
('P193419', '0', '0', '0', '2023-12-19 12:35:38'),
('P193322', '0', '0', '0', '2023-12-19 12:35:46'),
('P194444', '0', '0', '0', '2023-12-19 12:46:43'),
('P194657', '0', '0', '0', '2023-12-19 12:48:53'),
('P194939', '0', '0', '0', '2023-12-19 12:51:22'),
('P195139', '0', '0', '0', '2023-12-19 12:53:03'),
('P195314', '0', '0', '0', '2023-12-19 12:54:42'),
('P195608', '0', '0', '0', '2023-12-19 12:59:45'),
('P195840', '0', '0', '0', '2023-12-19 12:59:59'),
('P190022', '0', '0', '0', '2023-12-19 13:01:24'),
('P190146', '0', '0', '0', '2023-12-19 13:03:01'),
('P190330', '0', '0', '0', '2023-12-19 13:07:12'),
('P190208', '0', '0', '0', '2023-12-19 14:03:53'),
('P190410', '0', '0', '0', '2023-12-19 14:05:22'),
('P190539', '0', '0', '0', '2023-12-19 14:06:32'),
('P190655', '0', '0', '0', '2023-12-19 14:08:05'),
('P190823', '0', '0', '0', '2023-12-19 14:09:23'),
('P192403', '0', '0', '0', '2023-12-19 14:25:52'),
('P193213', '0', '0', '0', '2023-12-19 14:33:37'),
('P193451', '0', '0', '0', '2023-12-19 14:35:52'),
('P194033', '0', '0', '0', '2023-12-19 14:41:54'),
('P194236', '0', '0', '0', '2023-12-19 14:43:47'),
('P194413', '0', '0', '0', '2023-12-19 14:45:27'),
('P195024', '0', '0', '0', '2023-12-19 14:51:36'),
('P195628', '0', '0', '0', '2023-12-19 14:57:33'),
('P205355', '0', '0', '0', '2023-12-19 18:56:52'),
('P200856', '0', '0', '0', '2023-12-19 23:11:33'),
('P205130', '0', '0', '0', '2023-12-19 23:52:35'),
('P201324', '0', '0', '0', '2023-12-20 00:14:32'),
('P203527', '0', '0', '0', '2023-12-20 00:36:31'),
('P203716', '0', '0', '0', '2023-12-20 00:38:07'),
('P203816', '0', '0', '0', '2023-12-20 00:39:14'),
('P204056', '0', '0', '0', '2023-12-20 00:41:57'),
('P204639', '0', '0', '0', '2023-12-20 00:47:40'),
('P204831', '0', '0', '0', '2023-12-20 00:49:34'),
('P205201', '0', '0', '0', '2023-12-20 00:53:44'),
('P205406', '0', '0', '0', '2023-12-20 00:55:28'),
('P200555', '0', '0', '0', '2023-12-20 01:07:55'),
('P200814', '0', '0', '0', '2023-12-20 01:09:35'),
('P201413', '0', '0', '0', '2023-12-20 01:15:33'),
('P201445', '0', '0', '0', '2023-12-20 01:15:45'),
('P201600', '0', '0', '0', '2023-12-20 01:16:51'),
('P201547', '0', '0', '0', '2023-12-20 01:17:07'),
('P201713', '0', '0', '0', '2023-12-20 01:18:03'),
('P201718', '0', '0', '0', '2023-12-20 01:18:32'),
('P201817', '0', '0', '0', '2023-12-20 01:19:12'),
('P201844', '0', '0', '0', '2023-12-20 01:20:08'),
('P201927', '0', '0', '0', '2023-12-20 01:20:25'),
('P202045', '0', '0', '0', '2023-12-20 01:21:54'),
('P202133', '0', '0', '0', '2023-12-20 01:22:37'),
('P202253', '0', '0', '0', '2023-12-20 01:23:49'),
('P202218', '0', '0', '0', '2023-12-20 01:23:50'),
('P202448', '0', '0', '0', '2023-12-20 01:26:17'),
('P202646', '0', '0', '0', '2023-12-20 01:28:01'),
('P202821', '0', '0', '0', '2023-12-20 01:30:12'),
('P202914', '0', '0', '0', '2023-12-20 01:30:14'),
('P202825', '0', '0', '0', '2023-12-20 01:30:46'),
('P203349', '0', '0', '0', '2023-12-20 01:34:51'),
('P203513', '0', '0', '0', '2023-12-20 01:35:57'),
('P203403', '0', '0', '0', '2023-12-20 01:36:41'),
('P203611', '0', '0', '0', '2023-12-20 01:36:53'),
('P203705', '0', '0', '0', '2023-12-20 01:37:53'),
('P203707', '0', '0', '0', '2023-12-20 01:38:33'),
('P204000', '0', '0', '0', '2023-12-20 01:41:35'),
('P204152', '0', '0', '0', '2023-12-20 01:44:19'),
('P204532', '0', '0', '0', '2023-12-20 01:47:04'),
('P204714', '0', '0', '0', '2023-12-20 01:49:21'),
('P205346', '0', '0', '0', '2023-12-20 01:55:49'),
('P205740', '0', '0', '0', '2023-12-20 01:59:24'),
('P200049', '0', '0', '0', '2023-12-20 02:02:17'),
('P200237', '0', '0', '0', '2023-12-20 02:03:46'),
('P200357', '0', '0', '0', '2023-12-20 02:04:59'),
('P200527', '0', '0', '0', '2023-12-20 02:06:36'),
('P200702', '0', '0', '0', '2023-12-20 02:08:33'),
('P200857', '0', '0', '0', '2023-12-20 02:09:54'),
('P201104', '0', '0', '0', '2023-12-20 02:14:52'),
('P201532', '0', '0', '0', '2023-12-20 02:17:10'),
('P203710', '0', '0', '0', '2023-12-20 03:38:12'),
('P205720', '0', '0', '0', '2023-12-20 03:59:20'),
('P205903', '0', '0', '0', '2023-12-20 04:02:55'),
('P201032', '0', '0', '0', '2023-12-20 04:12:13'),
('P201231', '0', '0', '0', '2023-12-20 04:13:53'),
('P201415', '0', '0', '0', '2023-12-20 04:15:39'),
('P201614', '0', '0', '0', '2023-12-20 04:17:42'),
('P201825', '0', '0', '0', '2023-12-20 04:20:05'),
('P202032', '0', '0', '0', '2023-12-20 04:22:10'),
('P202231', '0', '0', '0', '2023-12-20 04:23:58'),
('P200934', '0', '0', '0', '2023-12-20 05:11:36'),
('P201112', '0', '0', '0', '2023-12-20 05:13:16'),
('P205552', '0', '0', '0', '2023-12-20 05:16:29'),
('P201400', '0', '0', '0', '2023-12-20 06:14:46'),
('P201534', '0', '0', '0', '2023-12-20 07:16:57'),
('P201756', '0', '0', '0', '2023-12-20 07:19:16'),
('P201852', '0', '0', '0', '2023-12-20 07:21:09'),
('P201944', '0', '0', '0', '2023-12-20 07:22:04'),
('P202255', '0', '0', '0', '2023-12-20 07:24:14'),
('P200226', '0', '0', '0', '2023-12-20 09:07:43'),
('P202636', '0', '0', '0', '2023-12-20 10:28:39'),
('P203115', '0', '0', '0', '2023-12-20 10:32:37'),
('P203327', '0', '0', '0', '2023-12-20 10:34:49'),
('P203518', '0', '0', '0', '2023-12-20 10:36:33'),
('P203653', '0', '0', '0', '2023-12-20 10:38:17'),
('P203910', '0', '0', '0', '2023-12-20 10:40:30'),
('P204100', '0', '0', '0', '2023-12-20 10:42:47'),
('P204306', '0', '0', '0', '2023-12-20 10:44:31'),
('P204444', '0', '0', '0', '2023-12-20 10:46:26'),
('P204642', '0', '0', '0', '2023-12-20 10:48:13'),
('P204950', '0', '0', '0', '2023-12-20 10:51:58'),
('P205222', '0', '0', '0', '2023-12-20 10:53:32'),
('P205349', '0', '0', '0', '2023-12-20 10:55:17'),
('P205546', '0', '0', '0', '2023-12-20 10:57:05'),
('P205721', '0', '0', '0', '2023-12-20 10:58:31'),
('P205851', '0', '0', '0', '2023-12-20 11:02:15'),
('P200234', '0', '0', '0', '2023-12-20 11:04:09'),
('P200446', '0', '0', '0', '2023-12-20 11:06:23'),
('P200803', '0', '0', '0', '2023-12-20 11:10:03'),
('P203708', '0', '0', '0', '2023-12-20 11:39:25'),
('P204012', '0', '0', '0', '2023-12-20 11:42:22'),
('P204335', '0', '0', '0', '2023-12-20 11:46:15'),
('P205916', '0', '0', '0', '2023-12-20 12:02:15'),
('P205507', '0', '0', '0', '2023-12-20 12:04:25'),
('P201510', '0', '0', '0', '2023-12-20 12:17:51'),
('P201719', '0', '0', '0', '2023-12-20 12:18:42'),
('P201724', '0', '0', '0', '2023-12-20 12:18:56'),
('P202601', '0', '0', '0', '2023-12-20 12:27:29'),
('P203232', '0', '0', '0', '2023-12-20 12:35:26'),
('P203650', '0', '0', '0', '2023-12-20 12:38:17'),
('P204009', '0', '0', '0', '2023-12-20 12:41:13'),
('P205304', '0', '0', '0', '2023-12-20 12:54:51'),
('P205535', '0', '0', '0', '2023-12-20 12:57:19'),
('P205747', '0', '0', '0', '2023-12-20 12:59:10'),
('P205954', '0', '0', '0', '2023-12-20 13:01:06'),
('P200125', '0', '0', '0', '2023-12-20 13:02:30'),
('P200255', '0', '0', '0', '2023-12-20 13:04:30'),
('P200452', '0', '0', '0', '2023-12-20 13:06:05'),
('P200623', '0', '0', '0', '2023-12-20 13:07:55'),
('P200409', '0', '0', '0', '2023-12-20 13:08:43'),
('P200812', '0', '0', '0', '2023-12-20 13:09:51'),
('P201018', '0', '0', '0', '2023-12-20 13:11:29'),
('P201158', '0', '0', '0', '2023-12-20 13:13:12'),
('P201342', '0', '0', '0', '2023-12-20 13:14:53'),
('P201551', '0', '0', '0', '2023-12-20 13:18:18'),
('P202146', '0', '0', '0', '2023-12-20 13:27:13'),
('P202417', '0', '0', '0', '2023-12-20 13:27:19'),
('P202611', '0', '0', '0', '2023-12-20 13:27:48'),
('P203023', '0', '0', '0', '2023-12-20 13:32:54'),
('P203514', '0', '0', '0', '2023-12-20 13:39:43'),
('P204409', '0', '0', '0', '2023-12-20 13:46:41'),
('P204908', '0', '0', '0', '2023-12-20 13:51:54'),
('P205426', '0', '0', '0', '2023-12-20 13:56:11'),
('P200606', '0', '0', '0', '2023-12-20 14:16:11'),
('P201916', '0', '0', '0', '2023-12-20 14:20:17'),
('P202033', '0', '0', '0', '2023-12-20 14:21:37'),
('P202154', '0', '0', '0', '2023-12-20 14:22:57'),
('P202311', '0', '0', '0', '2023-12-20 14:24:04'),
('P203815', '0', '0', '0', '2023-12-20 14:39:29'),
('P203950', '0', '0', '0', '2023-12-20 14:40:41'),
('P204116', '0', '0', '0', '2023-12-20 14:42:12'),
('P204256', '0', '0', '0', '2023-12-20 14:43:58'),
('P205230', '0', '0', '0', '2023-12-20 14:53:35'),
('P205401', '0', '0', '0', '2023-12-20 14:54:48'),
('P205702', '0', '0', '0', '2023-12-20 14:57:56'),
('P200007', '0', '0', '0', '2023-12-20 15:00:58'),
('P200112', '0', '0', '0', '2023-12-20 15:01:57'),
('P200209', '0', '0', '0', '2023-12-20 15:03:02'),
('P200325', '0', '0', '0', '2023-12-20 15:04:23'),
('P200449', '0', '0', '0', '2023-12-20 15:05:40'),
('P200557', '0', '0', '0', '2023-12-20 15:06:50'),
('P200819', '0', '0', '0', '2023-12-20 15:09:06'),
('P200929', '0', '0', '0', '2023-12-20 15:10:30'),
('P201709', '0', '0', '0', '2023-12-20 15:18:10'),
('P201821', '0', '0', '0', '2023-12-20 15:19:13'),
('P201936', '0', '0', '0', '2023-12-20 15:20:31'),
('P200210', '0', '0', '0', '2023-12-20 16:03:26'),
('P202916', '0', '0', '0', '2023-12-20 16:29:44'),
('P203024', '0', '0', '0', '2023-12-20 16:35:49'),
('P213023', '0', '0', '0', '2023-12-21 02:32:15'),
('P213300', '0', '0', '0', '2023-12-21 02:34:10'),
('P213428', '0', '0', '0', '2023-12-21 02:36:14'),
('P213653', '0', '0', '0', '2023-12-21 02:38:10'),
('P213847', '0', '0', '0', '2023-12-21 02:40:11'),
('P214102', '0', '0', '0', '2023-12-21 02:42:25'),
('P214254', '0', '0', '0', '2023-12-21 02:44:13'),
('P214451', '0', '0', '0', '2023-12-21 02:46:06'),
('P214622', '0', '0', '0', '2023-12-21 02:47:46'),
('P214800', '0', '0', '0', '2023-12-21 02:49:18'),
('P214730', '0', '0', '0', '2023-12-21 02:50:59'),
('P214948', '0', '0', '0', '2023-12-21 02:51:17'),
('P215223', '0', '0', '0', '2023-12-21 02:53:38'),
('P215405', '0', '0', '0', '2023-12-21 02:55:14'),
('P215541', '0', '0', '0', '2023-12-21 02:56:45'),
('P215704', '0', '0', '0', '2023-12-21 02:58:24'),
('P215845', '0', '0', '0', '2023-12-21 03:00:05'),
('P215546', '0', '0', '0', '2023-12-21 03:00:06'),
('P210023', '0', '0', '0', '2023-12-21 03:01:38'),
('P215954', '0', '0', '0', '2023-12-21 03:03:01'),
('P210202', '0', '0', '0', '2023-12-21 03:03:23'),
('P210207', '0', '0', '0', '2023-12-21 03:03:58'),
('P210346', '0', '0', '0', '2023-12-21 03:05:18'),
('P210542', '0', '0', '0', '2023-12-21 03:06:49'),
('P210706', '0', '0', '0', '2023-12-21 03:08:21'),
('P210852', '0', '0', '0', '2023-12-21 03:10:14'),
('P211031', '0', '0', '0', '2023-12-21 03:11:39'),
('P210847', '0', '0', '0', '2023-12-21 03:12:05'),
('P211158', '0', '0', '0', '2023-12-21 03:13:33'),
('P211505', '0', '0', '0', '2023-12-21 03:16:15'),
('P211328', '0', '0', '0', '2023-12-21 03:17:19'),
('P211630', '0', '0', '0', '2023-12-21 03:18:15'),
('P211646', '0', '0', '0', '2023-12-21 03:18:35'),
('P211423', '0', '0', '0', '2023-12-21 03:19:30'),
('P211843', '0', '0', '0', '2023-12-21 03:19:50'),
('P212008', '0', '0', '0', '2023-12-21 03:21:28'),
('P211552', '0', '0', '0', '2023-12-21 03:21:43'),
('P211924', '0', '0', '0', '2023-12-21 03:22:50'),
('P212144', '0', '0', '0', '2023-12-21 03:23:33'),
('P212354', '0', '0', '0', '2023-12-21 03:25:12'),
('P212535', '0', '0', '0', '2023-12-21 03:27:08'),
('P212518', '0', '0', '0', '2023-12-21 03:31:03'),
('P213007', '0', '0', '0', '2023-12-21 03:31:31'),
('P213140', '0', '0', '0', '2023-12-21 03:33:12'),
('P213151', '0', '0', '0', '2023-12-21 03:33:45'),
('P213400', '0', '0', '0', '2023-12-21 03:35:12'),
('P213551', '0', '0', '0', '2023-12-21 03:37:22'),
('P213336', '0', '0', '0', '2023-12-21 03:38:40'),
('P213740', '0', '0', '0', '2023-12-21 03:38:51'),
('P213908', '0', '0', '0', '2023-12-21 03:40:34'),
('P214052', '0', '0', '0', '2023-12-21 03:42:21'),
('P213910', '0', '0', '0', '2023-12-21 03:42:29'),
('P214237', '0', '0', '0', '2023-12-21 03:43:29'),
('P214239', '0', '0', '0', '2023-12-21 03:44:04'),
('P214252', '0', '0', '0', '2023-12-21 03:44:49'),
('P214349', '0', '0', '0', '2023-12-21 03:45:06'),
('P214439', '0', '0', '0', '2023-12-21 03:46:12'),
('P214541', '0', '0', '0', '2023-12-21 03:46:47'),
('P214707', '0', '0', '0', '2023-12-21 03:47:43'),
('P214640', '0', '0', '0', '2023-12-21 03:48:05'),
('P214809', '0', '0', '0', '2023-12-21 03:49:19'),
('P214828', '0', '0', '0', '2023-12-21 03:49:41'),
('P214938', '0', '0', '0', '2023-12-21 03:50:33'),
('P215018', '0', '0', '0', '2023-12-21 03:51:49'),
('P215047', '0', '0', '0', '2023-12-21 03:51:51'),
('P215212', '0', '0', '0', '2023-12-21 03:53:37'),
('P215400', '0', '0', '0', '2023-12-21 03:55:20'),
('P215411', '0', '0', '0', '2023-12-21 03:57:22'),
('P215712', '0', '0', '0', '2023-12-21 03:59:42'),
('P210004', '0', '0', '0', '2023-12-21 04:01:26'),
('P210223', '0', '0', '0', '2023-12-21 04:03:58'),
('P210417', '0', '0', '0', '2023-12-21 04:05:52'),
('P211604', '0', '0', '0', '2023-12-21 04:17:17'),
('P211732', '0', '0', '0', '2023-12-21 04:18:36'),
('P211854', '0', '0', '0', '2023-12-21 04:20:39'),
('P212058', '0', '0', '0', '2023-12-21 04:22:12'),
('P212226', '0', '0', '0', '2023-12-21 04:23:33'),
('P212349', '0', '0', '0', '2023-12-21 04:25:12'),
('P212534', '0', '0', '0', '2023-12-21 04:26:39'),
('P212653', '0', '0', '0', '2023-12-21 04:27:47'),
('P212808', '0', '0', '0', '2023-12-21 04:29:56'),
('P213052', '0', '0', '0', '2023-12-21 04:32:00'),
('P213218', '0', '0', '0', '2023-12-21 04:33:25'),
('P213132', '0', '0', '0', '2023-12-21 04:33:44'),
('P213340', '0', '0', '0', '2023-12-21 04:34:48'),
('P213516', '0', '0', '0', '2023-12-21 04:36:33'),
('P213620', '0', '0', '0', '2023-12-21 04:37:33'),
('P213700', '0', '0', '0', '2023-12-21 04:38:12'),
('P213837', '0', '0', '0', '2023-12-21 04:39:52'),
('P213821', '0', '0', '0', '2023-12-21 04:41:11'),
('P214318', '0', '0', '0', '2023-12-21 04:44:22'),
('P214444', '0', '0', '0', '2023-12-21 04:45:35'),
('P214713', '0', '0', '0', '2023-12-21 04:48:17'),
('P214631', '0', '0', '0', '2023-12-21 04:50:52'),
('P214959', '0', '0', '0', '2023-12-21 04:51:56'),
('P215848', '0', '0', '0', '2023-12-21 05:00:56'),
('P210119', '0', '0', '0', '2023-12-21 05:05:21'),
('P214014', '0', '0', '0', '2023-12-21 05:41:13'),
('P213923', '0', '0', '0', '2023-12-21 05:42:18'),
('P214145', '0', '0', '0', '2023-12-21 05:42:53'),
('P214308', '0', '0', '0', '2023-12-21 05:44:10'),
('P214424', '0', '0', '0', '2023-12-21 05:45:26'),
('P214540', '0', '0', '0', '2023-12-21 05:46:44'),
('P214658', '0', '0', '0', '2023-12-21 05:48:16'),
('P210338', '0', '0', '0', '2023-12-21 06:07:04'),
('P212643', '0', '0', '0', '2023-12-21 06:27:53'),
('P212809', '0', '0', '0', '2023-12-21 06:29:34'),
('P212959', '0', '0', '0', '2023-12-21 06:31:34'),
('P213155', '0', '0', '0', '2023-12-21 06:33:13'),
('P213333', '0', '0', '0', '2023-12-21 06:34:31'),
('P213446', '0', '0', '0', '2023-12-21 06:36:05'),
('P213621', '0', '0', '0', '2023-12-21 06:37:33'),
('P213751', '0', '0', '0', '2023-12-21 06:38:59'),
('P213914', '0', '0', '0', '2023-12-21 06:40:18'),
('P214034', '0', '0', '0', '2023-12-21 06:41:41'),
('P213714', '0', '0', '0', '2023-12-21 06:42:04'),
('P214251', '0', '0', '0', '2023-12-21 06:44:05'),
('P214437', '0', '0', '0', '2023-12-21 06:45:43'),
('P214600', '0', '0', '0', '2023-12-21 06:47:23'),
('P214742', '0', '0', '0', '2023-12-21 06:48:58'),
('P214914', '0', '0', '0', '2023-12-21 06:50:18'),
('P215035', '0', '0', '0', '2023-12-21 06:51:46'),
('P215203', '0', '0', '0', '2023-12-21 06:53:14'),
('P215539', '0', '0', '0', '2023-12-21 06:57:02'),
('P212552', '0', '0', '0', '2023-12-21 07:28:00'),
('P212931', '0', '0', '0', '2023-12-21 07:31:11'),
('P213138', '0', '0', '0', '2023-12-21 07:32:43'),
('P213259', '0', '0', '0', '2023-12-21 07:34:12'),
('P213427', '0', '0', '0', '2023-12-21 07:36:01'),
('P213617', '0', '0', '0', '2023-12-21 07:37:30'),
('P213750', '0', '0', '0', '2023-12-21 07:39:11'),
('P213925', '0', '0', '0', '2023-12-21 07:40:47'),
('P214106', '0', '0', '0', '2023-12-21 07:42:13'),
('P214228', '0', '0', '0', '2023-12-21 07:43:46'),
('P214945', '0', '0', '0', '2023-12-21 07:50:52'),
('P215155', '0', '0', '0', '2023-12-21 07:53:19'),
('P214040', '0', '0', '0', '2023-12-21 07:54:23'),
('P215337', '0', '0', '0', '2023-12-21 07:54:39'),
('P215455', '0', '0', '0', '2023-12-21 07:56:14'),
('P215632', '0', '0', '0', '2023-12-21 07:57:32'),
('P215750', '0', '0', '0', '2023-12-21 07:58:45'),
('P210349', '0', '0', '0', '2023-12-21 08:05:00'),
('P210519', '0', '0', '0', '2023-12-21 08:06:25'),
('P210649', '0', '0', '0', '2023-12-21 08:07:48'),
('P210804', '0', '0', '0', '2023-12-21 08:09:25'),
('P210940', '0', '0', '0', '2023-12-21 08:10:54'),
('P211246', '0', '0', '0', '2023-12-21 08:13:46'),
('P211401', '0', '0', '0', '2023-12-21 08:15:09'),
('P211532', '0', '0', '0', '2023-12-21 08:16:46'),
('P211705', '0', '0', '0', '2023-12-21 08:18:09'),
('P211831', '0', '0', '0', '2023-12-21 08:19:37'),
('P211620', '0', '0', '0', '2023-12-21 08:20:41'),
('P212001', '0', '0', '0', '2023-12-21 08:21:11'),
('P213102', '0', '0', '0', '2023-12-21 08:35:44'),
('P215858', '0', '0', '0', '2023-12-21 09:02:48'),
('P211146', '0', '0', '0', '2023-12-21 09:15:46'),
('P215245', '0', '0', '0', '2023-12-21 09:56:39'),
('P215615', '0', '0', '0', '2023-12-21 09:58:24'),
('P210127', '0', '0', '0', '2023-12-21 10:02:46'),
('P210800', '0', '0', '0', '2023-12-21 10:10:53'),
('P211601', '0', '0', '0', '2023-12-21 10:19:16'),
('P211930', '0', '0', '0', '2023-12-21 10:20:47'),
('P212705', '0', '0', '0', '2023-12-21 10:28:23'),
('P212602', '0', '0', '0', '2023-12-21 10:28:24'),
('P212407', '0', '0', '0', '2023-12-21 10:29:22'),
('P212707', '0', '0', '0', '2023-12-21 10:29:56'),
('P212547', '0', '0', '0', '2023-12-21 10:32:06'),
('P213025', '0', '0', '0', '2023-12-21 10:34:23'),
('P213404', '0', '0', '0', '2023-12-21 10:35:43'),
('P213056', '0', '0', '0', '2023-12-21 10:37:12'),
('P213818', '0', '0', '0', '2023-12-21 10:41:21'),
('P214330', '0', '0', '0', '2023-12-21 10:45:32'),
('P213836', '0', '0', '0', '2023-12-21 10:48:12'),
('P214838', '0', '0', '0', '2023-12-21 10:49:29'),
('P213950', '0', '0', '0', '2023-12-21 10:50:28'),
('P215419', '0', '0', '0', '2023-12-21 10:55:48'),
('P215829', '0', '0', '0', '2023-12-21 10:59:41'),
('P215922', '0', '0', '0', '2023-12-21 11:01:25'),
('P215707', '0', '0', '0', '2023-12-21 11:03:04'),
('P212056', '0', '0', '0', '2023-12-21 11:22:48'),
('P212501', '0', '0', '0', '2023-12-21 11:27:36'),
('P213757', '0', '0', '0', '2023-12-21 11:43:16'),
('P214041', '0', '0', '0', '2023-12-21 11:44:06'),
('P214230', '0', '0', '0', '2023-12-21 12:05:09'),
('P214321', '0', '0', '0', '2023-12-21 12:44:40'),
('P215746', '0', '0', '0', '2023-12-21 12:59:16'),
('P215944', '0', '0', '0', '2023-12-21 13:01:43'),
('P210225', '0', '0', '0', '2023-12-21 13:05:19'),
('P210543', '0', '0', '0', '2023-12-21 13:09:23'),
('P211017', '0', '0', '0', '2023-12-21 13:12:18'),
('P210927', '0', '0', '0', '2023-12-21 13:12:31'),
('P211232', '0', '0', '0', '2023-12-21 13:14:07'),
('P211554', '0', '0', '0', '2023-12-21 13:19:25'),
('P212100', '0', '0', '0', '2023-12-21 13:22:08'),
('P212306', '0', '0', '0', '2023-12-21 13:24:23'),
('P212627', '0', '0', '0', '2023-12-21 13:27:33'),
('P212910', '0', '0', '0', '2023-12-21 13:30:44'),
('P213110', '0', '0', '0', '2023-12-21 13:32:38'),
('P213253', '0', '0', '0', '2023-12-21 13:34:57'),
('P213518', '0', '0', '0', '2023-12-21 13:38:15'),
('P213829', '0', '0', '0', '2023-12-21 13:43:37'),
('P214545', '0', '0', '0', '2023-12-21 13:46:53'),
('P214708', '0', '0', '0', '2023-12-21 13:48:33'),
('P214954', '0', '0', '0', '2023-12-21 13:51:28'),
('P215141', '0', '0', '0', '2023-12-21 13:53:13'),
('P215341', '0', '0', '0', '2023-12-21 13:55:46'),
('P210108', '0', '0', '0', '2023-12-21 14:04:03'),
('P211159', '0', '0', '0', '2023-12-21 14:14:15'),
('P212258', '0', '0', '0', '2023-12-21 14:24:00'),
('P214157', '0', '0', '0', '2023-12-21 14:44:02'),
('P214736', '0', '0', '0', '2023-12-21 14:48:32'),
('P214854', '0', '0', '0', '2023-12-21 14:49:47'),
('P211608', '0', '0', '0', '2023-12-21 14:53:03'),
('P210416', '0', '0', '0', '2023-12-21 15:05:06'),
('P210521', '0', '0', '0', '2023-12-21 15:06:07'),
('P210624', '0', '0', '0', '2023-12-21 15:07:09'),
('P210722', '0', '0', '0', '2023-12-21 15:08:13'),
('P211214', '0', '0', '0', '2023-12-21 15:13:13'),
('P213911', '0', '0', '0', '2023-12-21 15:40:16'),
('P212956', '0', '0', '0', '2023-12-21 16:31:12'),
('P213401', '0', '0', '0', '2023-12-21 16:35:05'),
('P213522', '0', '0', '0', '2023-12-21 16:36:04'),
('P212822', '0', '0', '0', '2023-12-21 16:36:57'),
('P213723', '0', '0', '0', '2023-12-21 16:38:24'),
('P210953', '0', '0', '0', '2023-12-21 16:47:26'),
('P215207', '0', '0', '0', '2023-12-21 16:52:41'),
('P215332', '0', '0', '0', '2023-12-21 16:54:22'),
('P220531', '0', '0', '0', '2023-12-21 17:06:31'),
('P223110', '0', '0', '0', '2023-12-21 17:32:12'),
('P223239', '0', '0', '0', '2023-12-21 17:33:31'),
('P224904', '0', '0', '0', '2023-12-22 00:51:18'),
('P225312', '0', '0', '0', '2023-12-22 00:56:30'),
('P225926', '0', '0', '0', '2023-12-22 01:05:45'),
('P223255', '0', '0', '0', '2023-12-22 01:39:07'),
('P223924', '0', '0', '0', '2023-12-22 01:40:40'),
('P224056', '0', '0', '0', '2023-12-22 01:42:13'),
('P224238', '0', '0', '0', '2023-12-22 01:43:59'),
('P224150', '0', '0', '0', '2023-12-22 01:44:09'),
('P224422', '0', '0', '0', '2023-12-22 01:45:26'),
('P224540', '0', '0', '0', '2023-12-22 01:46:55'),
('P224710', '0', '0', '0', '2023-12-22 01:48:37'),
('P224903', '0', '0', '0', '2023-12-22 01:50:19'),
('P225038', '0', '0', '0', '2023-12-22 01:52:04'),
('P225224', '0', '0', '0', '2023-12-22 01:54:00'),
('P225424', '0', '0', '0', '2023-12-22 01:56:08'),
('P225640', '0', '0', '0', '2023-12-22 01:58:08'),
('P225750', '0', '0', '0', '2023-12-22 02:02:26'),
('P225734', '0', '0', '0', '2023-12-22 02:03:02'),
('P222148', '0', '0', '0', '2023-12-22 02:24:20'),
('P222453', '0', '0', '0', '2023-12-22 02:29:36'),
('P222811', '0', '0', '0', '2023-12-22 02:33:13'),
('P225551', '0', '0', '0', '2023-12-22 03:02:17'),
('P221623', '0', '0', '0', '2023-12-22 03:18:07'),
('P221821', '0', '0', '0', '2023-12-22 03:19:28'),
('P222034', '0', '0', '0', '2023-12-22 03:21:29'),
('P222220', '0', '0', '0', '2023-12-22 03:23:17'),
('P222742', '0', '0', '0', '2023-12-22 03:28:40'),
('P220408', '0', '0', '0', '2023-12-22 04:06:07'),
('P220641', '0', '0', '0', '2023-12-22 04:08:11');
INSERT INTO `config_user` (`id_user`, `latitude`, `longitude`, `bearing`, `update_at`) VALUES
('P220832', '0', '0', '0', '2023-12-22 04:09:53'),
('P221010', '0', '0', '0', '2023-12-22 04:12:08'),
('P221226', '0', '0', '0', '2023-12-22 04:13:34'),
('P221358', '0', '0', '0', '2023-12-22 04:15:19'),
('P221533', '0', '0', '0', '2023-12-22 04:16:38'),
('P221654', '0', '0', '0', '2023-12-22 04:18:23'),
('P221841', '0', '0', '0', '2023-12-22 04:19:57'),
('P222012', '0', '0', '0', '2023-12-22 04:21:25'),
('P222143', '0', '0', '0', '2023-12-22 04:22:57'),
('P222327', '0', '0', '0', '2023-12-22 04:24:47'),
('P222511', '0', '0', '0', '2023-12-22 04:26:25'),
('P222645', '0', '0', '0', '2023-12-22 04:28:18'),
('P222842', '0', '0', '0', '2023-12-22 04:30:05'),
('P223031', '0', '0', '0', '2023-12-22 04:31:46'),
('P223225', '0', '0', '0', '2023-12-22 04:33:25'),
('P223349', '0', '0', '0', '2023-12-22 04:35:12'),
('P223536', '0', '0', '0', '2023-12-22 04:36:51'),
('P223724', '0', '0', '0', '2023-12-22 04:38:48'),
('P223925', '0', '0', '0', '2023-12-22 04:40:44'),
('P224112', '0', '0', '0', '2023-12-22 04:42:36'),
('P224259', '0', '0', '0', '2023-12-22 04:44:37'),
('P224543', '0', '0', '0', '2023-12-22 04:46:52'),
('P224711', '0', '0', '0', '2023-12-22 04:48:29'),
('P224844', '0', '0', '0', '2023-12-22 04:49:59'),
('P225017', '0', '0', '0', '2023-12-22 04:51:39'),
('P225202', '0', '0', '0', '2023-12-22 04:53:40'),
('P225408', '0', '0', '0', '2023-12-22 04:55:27'),
('P225554', '0', '0', '0', '2023-12-22 04:57:34'),
('P225756', '0', '0', '0', '2023-12-22 04:59:05'),
('P225921', '0', '0', '0', '2023-12-22 05:00:42'),
('P220102', '0', '0', '0', '2023-12-22 05:02:36'),
('P220258', '0', '0', '0', '2023-12-22 05:04:47'),
('P220515', '0', '0', '0', '2023-12-22 05:07:06'),
('P220730', '0', '0', '0', '2023-12-22 05:09:10'),
('P220930', '0', '0', '0', '2023-12-22 05:10:57'),
('P221118', '0', '0', '0', '2023-12-22 05:12:36'),
('P221300', '0', '0', '0', '2023-12-22 05:14:09'),
('P221435', '0', '0', '0', '2023-12-22 05:15:44'),
('P221607', '0', '0', '0', '2023-12-22 05:17:32'),
('P221751', '0', '0', '0', '2023-12-22 05:19:10'),
('P221925', '0', '0', '0', '2023-12-22 05:20:49'),
('P222226', '0', '0', '0', '2023-12-22 05:24:57'),
('P222512', '0', '0', '0', '2023-12-22 05:26:25'),
('P222641', '0', '0', '0', '2023-12-22 05:28:11'),
('P222833', '0', '0', '0', '2023-12-22 05:29:38'),
('P222959', '0', '0', '0', '2023-12-22 05:31:16'),
('P223132', '0', '0', '0', '2023-12-22 05:33:01'),
('P223322', '0', '0', '0', '2023-12-22 05:34:44'),
('P223534', '0', '0', '0', '2023-12-22 05:37:27'),
('P223806', '0', '0', '0', '2023-12-22 05:39:46'),
('P224031', '0', '0', '0', '2023-12-22 05:42:01'),
('P224224', '0', '0', '0', '2023-12-22 05:43:47'),
('P224407', '0', '0', '0', '2023-12-22 05:45:35'),
('P224554', '0', '0', '0', '2023-12-22 05:46:56'),
('P224713', '0', '0', '0', '2023-12-22 05:48:46'),
('P224908', '0', '0', '0', '2023-12-22 05:50:21'),
('P225054', '0', '0', '0', '2023-12-22 05:52:02'),
('P225334', '0', '0', '0', '2023-12-22 05:54:46'),
('P225500', '0', '0', '0', '2023-12-22 05:56:54'),
('P225711', '0', '0', '0', '2023-12-22 05:58:24'),
('P225841', '0', '0', '0', '2023-12-22 05:59:56'),
('P220013', '0', '0', '0', '2023-12-22 06:01:33'),
('P220150', '0', '0', '0', '2023-12-22 06:03:08'),
('P220325', '0', '0', '0', '2023-12-22 06:04:37'),
('P220453', '0', '0', '0', '2023-12-22 06:06:19'),
('P220915', '0', '0', '0', '2023-12-22 07:11:34'),
('P221011', '0', '0', '0', '2023-12-22 07:12:56'),
('P222235', '0', '0', '0', '2023-12-22 07:23:40'),
('P222157', '0', '0', '0', '2023-12-22 07:23:58'),
('P222457', '0', '0', '0', '2023-12-22 07:25:48'),
('P222505', '0', '0', '0', '2023-12-22 07:26:33'),
('P222716', '0', '0', '0', '2023-12-22 07:28:43'),
('P222909', '0', '0', '0', '2023-12-22 07:31:04'),
('P223125', '0', '0', '0', '2023-12-22 07:32:59'),
('P223325', '0', '0', '0', '2023-12-22 07:34:49'),
('P223501', '0', '0', '0', '2023-12-22 07:36:43'),
('P223749', '0', '0', '0', '2023-12-22 07:38:34'),
('P223741', '0', '0', '0', '2023-12-22 07:38:37'),
('P223851', '0', '0', '0', '2023-12-22 07:39:38'),
('P223941', '0', '0', '0', '2023-12-22 07:40:38'),
('P224102', '0', '0', '0', '2023-12-22 07:42:41'),
('P224434', '0', '0', '0', '2023-12-22 07:45:55'),
('P224624', '0', '0', '0', '2023-12-22 07:47:39'),
('P225006', '0', '0', '0', '2023-12-22 07:51:42'),
('P225201', '0', '0', '0', '2023-12-22 07:53:21'),
('P225339', '0', '0', '0', '2023-12-22 07:54:59'),
('P225530', '0', '0', '0', '2023-12-22 07:56:56'),
('P225714', '0', '0', '0', '2023-12-22 07:58:24'),
('P225840', '0', '0', '0', '2023-12-22 08:00:30'),
('P220057', '0', '0', '0', '2023-12-22 08:02:47'),
('P220750', '0', '0', '0', '2023-12-22 08:09:57'),
('P221019', '0', '0', '0', '2023-12-22 08:11:27'),
('P221155', '0', '0', '0', '2023-12-22 08:12:59'),
('P221319', '0', '0', '0', '2023-12-22 08:14:52'),
('P221510', '0', '0', '0', '2023-12-22 08:16:24'),
('P221724', '0', '0', '0', '2023-12-22 08:18:57'),
('P221923', '0', '0', '0', '2023-12-22 08:20:48'),
('P222038', '0', '0', '0', '2023-12-22 08:22:14'),
('P222232', '0', '0', '0', '2023-12-22 08:24:00'),
('P222426', '0', '0', '0', '2023-12-22 08:25:36'),
('P222552', '0', '0', '0', '2023-12-22 08:27:05'),
('P222639', '0', '0', '0', '2023-12-22 08:27:34'),
('P222722', '0', '0', '0', '2023-12-22 08:28:25'),
('P222747', '0', '0', '0', '2023-12-22 08:28:36'),
('P222843', '0', '0', '0', '2023-12-22 08:29:59'),
('P222935', '0', '0', '0', '2023-12-22 08:30:23'),
('P223029', '0', '0', '0', '2023-12-22 08:31:41'),
('P223205', '0', '0', '0', '2023-12-22 08:33:16'),
('P223332', '0', '0', '0', '2023-12-22 08:34:43'),
('P223502', '0', '0', '0', '2023-12-22 08:36:06'),
('P223623', '0', '0', '0', '2023-12-22 08:37:32'),
('P223940', '0', '0', '0', '2023-12-22 08:40:45'),
('P224545', '0', '0', '0', '2023-12-22 08:46:38'),
('P225213', '0', '0', '0', '2023-12-22 08:52:55'),
('P225315', '0', '0', '0', '2023-12-22 08:54:09'),
('P220154', '0', '0', '0', '2023-12-22 09:02:49'),
('P220441', '0', '0', '0', '2023-12-22 09:06:08'),
('P220622', '0', '0', '0', '2023-12-22 09:07:15'),
('P220726', '0', '0', '0', '2023-12-22 09:08:18'),
('P220952', '0', '0', '0', '2023-12-22 09:10:47'),
('P222802', '0', '0', '0', '2023-12-22 10:32:22'),
('P221414', '0', '0', '0', '2023-12-22 11:16:55'),
('P220237', '0', '0', '0', '2023-12-22 12:04:07'),
('P220659', '0', '0', '0', '2023-12-22 12:09:32'),
('P224500', '0', '0', '0', '2023-12-22 13:48:10'),
('P220427', '0', '0', '0', '2023-12-22 14:05:23'),
('P220511', '0', '0', '0', '2023-12-22 14:12:00'),
('P221757', '0', '0', '0', '2023-12-22 14:22:14'),
('P220118', '0', '0', '0', '2023-12-22 15:05:04'),
('P232216', '0', '0', '0', '2023-12-22 22:25:52'),
('P233233', '0', '0', '0', '2023-12-22 22:35:03'),
('P233520', '0', '0', '0', '2023-12-22 22:37:10'),
('P233808', '0', '0', '0', '2023-12-22 22:44:03'),
('P234743', '0', '0', '0', '2023-12-22 22:49:20'),
('P234950', '0', '0', '0', '2023-12-22 22:51:49'),
('P233852', '0', '0', '0', '2023-12-22 23:46:08'),
('P231838', '0', '0', '0', '2023-12-23 01:20:15'),
('P232036', '0', '0', '0', '2023-12-23 01:21:33'),
('P232156', '0', '0', '0', '2023-12-23 01:23:02'),
('P234830', '0', '0', '0', '2023-12-23 01:51:23'),
('P235555', '0', '0', '0', '2023-12-23 01:58:09'),
('P235723', '0', '0', '0', '2023-12-23 02:59:07'),
('P235951', '0', '0', '0', '2023-12-23 03:01:34'),
('P231226', '0', '0', '0', '2023-12-23 03:13:43'),
('P232331', '0', '0', '0', '2023-12-23 07:24:33'),
('P233251', '0', '0', '0', '2023-12-23 07:36:19'),
('P234934', '0', '0', '0', '2023-12-23 14:05:22'),
('P235518', '0', '0', '0', '2023-12-23 14:55:54'),
('P235729', '0', '0', '0', '2023-12-23 14:58:00'),
('P231605', '0', '0', '0', '2023-12-23 15:16:39'),
('P231808', '0', '0', '0', '2023-12-23 15:18:55'),
('P232141', '0', '0', '0', '2023-12-23 15:22:09'),
('P1703345143', '0', '0', '0', '2023-12-23 15:25:43'),
('P1703346225', '0', '0', '0', '2023-12-23 15:43:45'),
('P1703356191', '0', '0', '0', '2023-12-23 18:29:51'),
('P1703356248', '0', '0', '0', '2023-12-23 18:30:48'),
('P1703372260', '0', '0', '0', '2023-12-23 22:57:40'),
('P1703377457', '0', '0', '0', '2023-12-24 00:24:17'),
('P1703381179', '0', '0', '0', '2023-12-24 01:26:19'),
('P1703381464', '0', '0', '0', '2023-12-24 01:31:04'),
('P1703387088', '0', '0', '0', '2023-12-24 03:04:48'),
('P1703389318', '0', '0', '0', '2023-12-24 03:41:58'),
('P1703390110', '0', '0', '0', '2023-12-24 03:55:10'),
('P1703390612', '0', '0', '0', '2023-12-24 04:03:32'),
('P1703392751', '0', '0', '0', '2023-12-24 04:39:11'),
('P1703393364', '0', '0', '0', '2023-12-24 04:49:24'),
('P1703393802', '0', '0', '0', '2023-12-24 04:56:42'),
('P1703398598', '0', '0', '0', '2023-12-24 06:16:38'),
('P1703398823', '0', '0', '0', '2023-12-24 06:20:23'),
('P1703400776', '0', '0', '0', '2023-12-24 06:52:56'),
('P1703401428', '0', '0', '0', '2023-12-24 07:03:48'),
('P1703408861', '0', '0', '0', '2023-12-24 09:07:41'),
('P1703409380', '0', '0', '0', '2023-12-24 09:16:20'),
('P1703412377', '0', '0', '0', '2023-12-24 10:06:17'),
('P1703413744', '0', '0', '0', '2023-12-24 10:29:04'),
('P1703413791', '0', '0', '0', '2023-12-24 10:29:52'),
('P1703413822', '0', '0', '0', '2023-12-24 10:30:22'),
('P1703416771', '0', '0', '0', '2023-12-24 11:19:31'),
('P1703438147', '0', '0', '0', '2023-12-24 17:15:47'),
('P1703455117', '0', '0', '0', '2023-12-24 21:58:37'),
('P253619', '0', '0', '0', '2023-12-25 06:36:47'),
('P255353', '0', '0', '0', '2023-12-25 06:54:23'),
('P255457', '0', '0', '0', '2023-12-25 06:55:48'),
('P253051', '0', '0', '0', '2023-12-25 07:31:40'),
('P254723', '0', '0', '0', '2023-12-25 08:47:55'),
('P254819', '0', '0', '0', '2023-12-25 08:48:42'),
('P250540', '0', '0', '0', '2023-12-25 10:07:54'),
('P253616', '0', '0', '0', '2023-12-25 11:37:53'),
('P253708', '0', '0', '0', '2023-12-25 11:37:54'),
('P250429', '0', '0', '0', '2023-12-25 12:05:04'),
('P254041', '0', '0', '0', '2023-12-25 12:45:50'),
('P263605', '0', '0', '0', '2023-12-25 19:36:47'),
('P263721', '0', '0', '0', '2023-12-25 19:37:51'),
('P263945', '0', '0', '0', '2023-12-25 19:40:18'),
('P264038', '0', '0', '0', '2023-12-25 19:41:33'),
('P265056', '0', '0', '0', '2023-12-25 19:51:21'),
('P265636', '0', '0', '0', '2023-12-26 00:59:11'),
('P261724', '0', '0', '0', '2023-12-26 01:20:51'),
('P261506', '0', '0', '0', '2023-12-26 04:16:58'),
('P265946', '0', '0', '0', '2023-12-26 05:00:19'),
('P260127', '0', '0', '0', '2023-12-26 05:02:18'),
('P261331', '0', '0', '0', '2023-12-26 05:16:44'),
('P261532', '0', '0', '0', '2023-12-26 05:18:11'),
('P261736', '0', '0', '0', '2023-12-26 05:18:35'),
('P263020', '0', '0', '0', '2023-12-26 05:30:49'),
('P260903', '0', '0', '0', '2023-12-26 07:09:30'),
('P262215', '0', '0', '0', '2023-12-26 07:22:48'),
('P261115', '0', '0', '0', '2023-12-26 08:14:01'),
('P260855', '0', '0', '0', '2023-12-26 08:14:48'),
('P263056', '0', '0', '0', '2023-12-26 08:31:20'),
('P263513', '0', '0', '0', '2023-12-26 08:35:42'),
('P260157', '0', '0', '0', '2023-12-26 09:07:18'),
('P264949', '0', '0', '0', '2023-12-26 09:50:39'),
('P262850', '0', '0', '0', '2023-12-26 10:29:22'),
('P263231', '0', '0', '0', '2023-12-26 10:33:01'),
('P264158', '0', '0', '0', '2023-12-26 10:47:10'),
('P271103', '0', '0', '0', '2023-12-27 06:18:03'),
('P275039', '0', '0', '0', '2023-12-27 06:53:34'),
('P271745', '0', '0', '0', '2023-12-27 07:19:33'),
('P271128', '0', '0', '0', '2023-12-27 10:13:57'),
('P273052', '0', '0', '0', '2023-12-27 10:32:11'),
('P274803', '0', '0', '0', '2023-12-27 11:49:49'),
('P280511', '0', '0', '0', '2023-12-27 23:28:43'),
('P282305', '0', '0', '0', '2023-12-28 00:24:40'),
('P282803', '0', '0', '0', '2023-12-28 00:30:20'),
('P283300', '0', '0', '0', '2023-12-28 00:34:27'),
('P285011', '0', '0', '0', '2023-12-28 08:51:08'),
('P284104', '0', '0', '0', '2023-12-28 09:41:40'),
('P295451', '0', '0', '0', '2023-12-29 02:57:56'),
('P290357', '0', '0', '0', '2023-12-29 12:04:59'),
('P302308', '0', '0', '0', '2023-12-30 01:26:45'),
('P311039', '0', '0', '0', '2023-12-31 11:14:03'),
('P313727', '0', '0', '0', '2023-12-31 15:41:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `digi_brand`
--

CREATE TABLE `digi_brand` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'Pulsa',
  `fee` varchar(255) DEFAULT NULL,
  `ikon` varchar(255) DEFAULT NULL,
  `iszone` varchar(255) DEFAULT '0',
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `digi_brand`
--

INSERT INTO `digi_brand` (`id`, `kode`, `nama`, `brand`, `keterangan`, `type`, `fee`, `ikon`, `iszone`, `status`) VALUES
(2, '469198', 'Telkomsel', 'TELKOMSEL', 'Pulsa Telkomsels', 'Pulsa', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(3, '706402', 'Telkomsel Internet', 'TELKOMSEL', 'Paket Internet Telkomsel', 'Data', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(4, '568008', 'XL', 'XL', 'Pulsa XL', 'Pulsa', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(5, '680281', 'Indosat', 'INDOSAT', 'Pulsa Indosat', 'Pulsa', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(6, '279036', 'Axis', 'AXIS', 'Pulsa Axis', 'Pulsa', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(7, '668487', 'Axis Internet', 'AXIS', 'Paket Internet Axis', 'Data', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(8, '654956', 'PLN', 'PLN', 'Topup PLN', 'Pln', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(9, '336849', 'Tri', 'TRI', 'Pulsa Tri', 'Pulsa', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(10, '662150', 'Tri Internet', 'TRI', 'Paket Internet Tri', 'Data', '200', '61697f389539042b1178cbcf97ad3dd9.png', '0', '1'),
(14, '26294', 'Dana', 'DANA', 'Topup Dana', 'E-Money', '200', 'e334ed90de7e082d62675c2c211939a3.png', '0', '1'),
(15, '14707', 'Ovo', 'OVO', 'Topup Ovo', 'E-Money', '200', '2ad3ecd597ad76ee2ebd3dad5995d20f.png', '0', '1'),
(22, '81933', 'Smartfren', 'SMARTFREN', 'Top up pulsa Smartfren', 'Pulsa', '200', 'f680888e2ca3d0b26acce3471f0ce53e.jpeg', '0', '1'),
(24, '69514', 'Mandiri E-Toll', 'E-TOLL', 'Top Up E -Toll', 'E-Money', '500', '07f84caa92a4c1ca40fbdeb5c17b78ba.jpeg', '0', '1'),
(25, '63756', 'SHOPEE PAY', 'SHOPEE PAY', 'SHOPEE PAY', 'E-Money', '200', 'noimage.jpg', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `digi_history`
--

CREATE TABLE `digi_history` (
  `id` int(11) NOT NULL,
  `reffid` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `idpelanggan` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT '1234',
  `harga` varchar(255) DEFAULT NULL,
  `upharga` varchar(255) DEFAULT '0',
  `tujuan` varchar(255) DEFAULT NULL,
  `sn` varchar(255) DEFAULT '1234',
  `refund` varchar(255) DEFAULT '0',
  `tanggal` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `sukses` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `digi_history`
--

INSERT INTO `digi_history` (`id`, `reffid`, `provider`, `sku`, `idpelanggan`, `token`, `harga`, `upharga`, `tujuan`, `sn`, `refund`, `tanggal`, `status`, `sukses`) VALUES
(1359, 'NAGQT', 'Telkomsel 20.000', 'S20', 'P64397', '1234', '19925', '200', '085271210231', '03343600000791222266', '0', '2024-02-26 16:09:40', 'Sukses', '0'),
(1360, 'UYOIL', 'Axis 5.000', 'A5', 'P72952', '1234', '5910', '200', '083806891294', 'TKXL26022A6F38.', '0', '2024-02-26 16:42:48', 'Sukses', '1'),
(1361, '8WVA6', 'Three 5.000', 'T5', 'P24547', '1234', '5610', '200', '0895800680909', 'R2402261724210119', '0', '2024-02-26 17:24:47', 'Sukses', '1'),
(1362, '2MYNZ', 'Telkomsel 10.000', 'S10', 'P64397', '1234', '10170', '200', '085271210231', '03343100000796183251', '0', '2024-02-26 19:25:37', 'Sukses', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `digi_kategori`
--

CREATE TABLE `digi_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `ikon` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `adm` varchar(255) DEFAULT '500',
  `tipe` varchar(255) DEFAULT 'Prabayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `digi_kategori`
--

INSERT INTO `digi_kategori` (`id`, `nama`, `kategori`, `ikon`, `status`, `adm`, `tipe`) VALUES
(1, 'Pulsa', 'Pulsa', '9da7a15bf77c907706b68edfcdf1107d.png', '1', '500', 'Prabayar'),
(2, 'Data', 'Data', 'da2836254a6d4a8b5b27decc37ece20f.jpg', '1', '500', 'Prabayar'),
(3, 'Listrik', 'PLN', 'abb1d7933a2a042e00b53a885110a2f4.png', '1', '500', 'Prabayar'),
(5, 'E-Money', 'E-Money', '16c9c0929bf9df3b6b879abe93d692e6.png', '1', '500', 'Prabayar'),
(6, 'Pascabayar', 'Pascabayar', 'cf351731ea16bedf155e2f83b3932b94.png', '0', '500', 'Pascabayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id` varchar(200) NOT NULL,
  `nama_driver` varchar(20) NOT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `countrycode` varchar(20) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `job` int(11) NOT NULL,
  `gender` varchar(250) DEFAULT 'Male',
  `alamat_driver` text NOT NULL,
  `kendaraan` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reg_id` varchar(250) NOT NULL DEFAULT '1234',
  `status` char(1) DEFAULT '2',
  `point` varchar(250) NOT NULL DEFAULT '0',
  `kota` varchar(250) NOT NULL DEFAULT 'Indramayu',
  `uplink` varchar(255) NOT NULL DEFAULT 'Admin',
  `prioritas` int(11) DEFAULT 0,
  `ostoken` varchar(255) DEFAULT '12345'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id`, `nama_driver`, `no_ktp`, `tgl_lahir`, `no_telepon`, `countrycode`, `phone`, `email`, `password`, `foto`, `rating`, `job`, `gender`, `alamat_driver`, `kendaraan`, `created_at`, `update_at`, `reg_id`, `status`, `point`, `kota`, `uplink`, `prioritas`, `ostoken`) VALUES
('D1708831070', 'test', '5454645466464545', '2024-02-25', '62895326129562', '+62', '895326129562', 'testyu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1708830973-89286.jpg', 3.5, 18, 'Laki-Laki', 'test', 311, '2024-02-25 10:16:13', '2024-03-24 21:35:18', 'cexh2WVdR7ST8nUBnEA_rn:APA91bFcGZYr28b-d_NORnWk5vta-KrfKgfKKfg-87Wcchqx6_QSkw1ECYrJFVL-XAHGrjVjitDGrDRkxtnuPtvllS14GeDjs9Qvd0hs8mIDjxE6FmiTv9fUIpGWepvo8H2lb90zvWYu', '1', '15', 'DKI Jakarta', 'tripport', 0, 'b04819e3-8b91-4dcb-b306-1020749e07e9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver_job`
--

CREATE TABLE `driver_job` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_job` varchar(250) NOT NULL,
  `icon` varchar(20) NOT NULL DEFAULT '1',
  `ismobil` int(11) NOT NULL DEFAULT 0,
  `status_job` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `driver_job`
--

INSERT INTO `driver_job` (`id`, `driver_job`, `icon`, `ismobil`, `status_job`) VALUES
(18, 'Mobil', '2', 0, '1'),
(17, 'Motor', '1', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fitur`
--

CREATE TABLE `fitur` (
  `id_fitur` int(11) NOT NULL,
  `fitur` varchar(20) NOT NULL,
  `biaya` int(11) NOT NULL,
  `biaya_minimum` int(11) NOT NULL,
  `jarak_driver` varchar(255) DEFAULT '1',
  `jarak_minimum` varchar(100) NOT NULL,
  `maks_distance` varchar(250) NOT NULL,
  `wallet_minimum` varchar(100) NOT NULL,
  `komisi` varchar(200) DEFAULT '0',
  `promo` varchar(255) DEFAULT '0',
  `keterangan_biaya` varchar(50) NOT NULL,
  `driver_job` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `home` varchar(1) NOT NULL,
  `parkir` varchar(255) DEFAULT '0',
  `jasaapp` varchar(250) NOT NULL DEFAULT '0',
  `background` varchar(255) NOT NULL DEFAULT '#FDEBF5',
  `startcolor` varchar(255) DEFAULT '#008000',
  `endcolor` varchar(255) NOT NULL DEFAULT '#ADFF2F',
  `angel` varchar(255) DEFAULT '10',
  `tint` varchar(255) NOT NULL DEFAULT '#FDEBF5',
  `usedtint` int(11) NOT NULL DEFAULT 0,
  `padding` int(11) DEFAULT 0,
  `kota` varchar(255) DEFAULT 'all',
  `active` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `fitur`
--

INSERT INTO `fitur` (`id_fitur`, `fitur`, `biaya`, `biaya_minimum`, `jarak_driver`, `jarak_minimum`, `maks_distance`, `wallet_minimum`, `komisi`, `promo`, `keterangan_biaya`, `driver_job`, `keterangan`, `icon`, `home`, `parkir`, `jasaapp`, `background`, `startcolor`, `endcolor`, `angel`, `tint`, `usedtint`, `padding`, `kota`, `active`) VALUES
(1, 'Motor', 1700, 10000, '2', '3', '15', '10000', '5', '1', 'KM', 17, '1 Orang', '560a2ec73846e542a4a25bafef8097ba.png', '1', '0', '0', '#42ae7b', '#c5e4fc', '#c5e4fc', '150', '#ffffff', 0, 20, 'all', '0'),
(2, 'Taxi Bandara', 2500, 12000, '2', '2', '20', '1000', '10', '1', 'KM', 18, '4 Orang', '4cd6bb2df1bffd044a5810790252aac5.png', '1', '0', '0', '#42ae7b', '#ffffff', '#ffffff', '150', '#ffffff', 0, 10, 'all', '1'),
(3, 'Toko Belanja', 2500, 8000, '10', '3', '15', '10000', '10', '1', 'KM', 17, 'Order Food', 'f94f3eb2b00392a3a1597b310772fb7e.jpeg', '4', '0', '0', '#fec13e', '#ffffff', '#ffffff', '150', '#ffffff', 0, 10, 'all', '1'),
(4, 'Toko', 3000, 8000, '1', '1', '10', '10000', '10', '1', 'KM', 17, 'Order Store', '7e9845bded5ca8492960fe21297c4032.png', '4', '0', '0', '#ff6179', '#c5e4fc', '#c5e4fc', '150', '#ffffff', 0, 20, 'all', '0'),
(5, 'Kurir', 2500, 10000, '4', '2', '10', '10000', '10', '1', 'KM', 17, 'Order Send', '3403acd0742d55688c9bafffd57a1920.png', '2', '0', '0', '#303b8d', '#ffffff', '#ffffff', '200', '#ffffff', 0, 1, 'all', '1'),
(9, 'Belanja', 2500, 5000, '3', '1', '10', '10000', '5', '5', 'KM', 17, 'Belanja Lebih Mudah Dan Aman', '406608b43844cbeac70e50c95fbabb80.png', '5', '0', '0', '#FDEBF5', '#ffffff', '#ffffff', '150', '#e4e0ff', 0, 10, 'all', '1'),
(11, 'Mobil XL', 3700, 14000, '1', '1', '20', '10000', '10', '1', 'KM', 18, '6 Orang', 'c0b79187af1cc228f7f38dc35e8f43af.png', '1', '0', '0', '#42ae7b', '#c5e4fc', '#c5e4fc', '150', '#ffffff', 0, 20, 'all', '0'),
(12, 'Bus Mini', 2500, 8000, '5', '1', '10', '10000', '5', '1', 'KM', 18, 'Maksimal 13 Orang', '864671cc1983c7d4eb7c067f3bbe63aa.png', '1', '0', '0', '#FDEBF5', '#c5e4fc', '#c5e4fc', '150', '#e4e0ff', 0, 20, 'all', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `idkey` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `token` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `idkey`, `userid`, `token`, `created`) VALUES
(1, 3, 'M23196', 'f0a1d1761c371e21c37f6520314573fc492d3a13', '2023-08-27 06:05:06'),
(2, 2, 'D1693133500', 'ab9efe3c495b82a2e86025df45e97a72ccc84378', '2023-08-27 17:52:04'),
(3, 2, 'D1697701004', '86894314e667feb2fc257a9a0c87a2c2fe8d5c72', '2023-10-19 14:39:28'),
(4, 3, 'M12551', '225e42ca3e2a22ac68df361f152678c3cdd82211', '2024-01-07 18:38:57'),
(5, 3, 'M10989', 'e7ae6268b35697e564dadf0df98d541fb7e94529', '2024-01-08 00:44:11'),
(7, 3, 'M22397', 'c43686e73b9e6c8185cd0df68bf889f2e1a6665f', '2024-01-08 14:06:48'),
(8, 3, 'M13388', 'bf57a72091fcc3edc0f0a978da1142cc34e85d8f', '2024-01-08 14:07:15'),
(9, 2, 'D1703317708', '4e48eeeb9647cdb040d282f5d297e8e6bff4370b', '2024-01-08 14:12:54'),
(10, 2, 'D1703318776', '9916c6dd94cc260bb71dccc1c69f1663cda37a5a', '2024-01-08 14:13:08'),
(11, 2, 'D1703506181', 'a0c04a3fcabe775b585a1ec09a45daa8782c428f', '2024-01-08 14:13:23'),
(16, 1, 'P220915', 'b19816ac6b8a0083c957fbb000b3a84fd56e9964', '2024-01-09 02:57:01'),
(17, 1, 'P220915', 'b22504a4a1beaaff5e5e59fa128ab0d35aa31f39', '2024-01-09 02:57:05'),
(18, 1, 'P220915', '153435a86223a59369633eae26c6962af09ece52', '2024-01-09 02:57:06'),
(20, 2, 'D1703074080', '6155815472f33e954f633855a1737212ba9d2517', '2024-01-09 07:25:53'),
(21, 2, 'D1703074080', '15efca6c6b17a1a7713289f450984b32f9523ce7', '2024-01-09 07:25:55'),
(25, 2, 'D1701933072', '8352cbaddb1c14b751c6bffc1194f8c31e83d4ea', '2024-01-09 12:34:44'),
(26, 3, 'M24454', 'cf157ce12a9d59db766d403bb022ac3eca6d515a', '2024-01-09 13:07:00'),
(27, 1, 'P140752', '8fb7ec077b497dd378b4354e0269517ba35d969d', '2024-01-09 20:52:44'),
(28, 1, 'P140752', '5707c18dc6d2f3d6ec20bec088c5ea45858c9cca', '2024-01-09 20:52:49'),
(29, 1, 'P140752', '67510982cd74696aca65becbae81195594936b20', '2024-01-09 20:52:55'),
(30, 1, 'P140752', 'a9b9adfaa3cabda693fe4fff2e952f62e3bc3d2d', '2024-01-09 20:53:03'),
(31, 2, 'D1701913132', 'd24e6f4e53ade28b148f8e6c052e1a8d15b86d4b', '2024-01-10 09:04:02'),
(32, 2, 'D1701913132', '3092bf181bda34ce095b8de19cdd422076f7e483', '2024-01-10 09:04:04'),
(33, 2, 'D1701913132', '63f542f804c14b6041233eeafc47d0f34ddcb069', '2024-01-10 09:04:30'),
(34, 2, 'D1701913132', 'ffb17cfe136c4d8e073f6813f9c621f4919ae660', '2024-01-10 09:04:31'),
(35, 2, 'D1701913132', '4e4432bf0da07237bab2084c75224a8fec040997', '2024-01-10 09:04:32'),
(36, 2, 'D1701913132', '565a6511c4f4880569fb6e394fd67ad887cf54c5', '2024-01-10 09:04:43'),
(37, 2, 'D1701913132', '5e608a1047c97dd482fb9921a37359aa6d67f73a', '2024-01-10 09:04:44'),
(38, 2, 'D1701913132', 'f6916a45ee68ba47b9747c87c5e20c738cec06f7', '2024-01-10 09:05:04'),
(39, 2, 'D1701913132', '638389d0001fa7d43e8bf63e9b24cc09b261c815', '2024-01-10 09:05:05'),
(40, 2, 'D1701913132', 'd704dd9ebec44047e413faadb77650681c4233c3', '2024-01-10 09:05:06'),
(41, 2, 'D1701913132', 'c0d0d77e6ea672eeafdb7eef13fa759c3be5f471', '2024-01-10 09:05:46'),
(42, 2, 'D1701913132', '669f0ec664c13494b754b14b6eb9d3ce44ea58c6', '2024-01-10 09:05:47'),
(43, 2, 'D1701913132', 'aaf68f079710babf10fdb9306283c449963133e8', '2024-01-10 09:06:16'),
(44, 2, 'D1701913132', '38f69e1c07c90710ae25be4d6adceaf11dd7eb31', '2024-01-10 09:06:17'),
(45, 2, 'D1701913132', '0b462a1b46938656fa7a31df399d469b57a7339d', '2024-01-10 09:10:51'),
(46, 2, 'D1701913132', '1bffd715c1d58bf87796c3207132fd6045ad2eab', '2024-01-10 09:10:53'),
(47, 1, 'P271103', '155598d6c771f60f495dc197d9856a918f393e73', '2024-01-10 10:07:22'),
(48, 1, 'P271103', '04b2e2a4b2db92a3411fc5abc945dea0ca536990', '2024-01-10 10:07:39'),
(49, 1, 'P271103', '90c9a4c496b262c82351bfc410c8c08893c60eb9', '2024-01-10 10:07:40'),
(50, 1, 'P271103', '1c10c72907e7f0fe7b7629f1af3c11433ae2fab4', '2024-01-10 10:07:46'),
(51, 2, 'D1701913132', 'bd589005746f423e7d72db1b79befd1e9bf7d0cd', '2024-01-10 10:10:05'),
(52, 2, 'D1701913132', '99512a9de8059e8dca5e9a0fdc6acb899aa994f7', '2024-01-10 10:10:07'),
(53, 2, 'D1701913132', 'c49b70221a2a111dd2833e847e71593100d1a2b3', '2024-01-10 10:10:08'),
(54, 2, 'D1701913132', 'cf6933d5368032401dc5243d32452007eb320ddf', '2024-01-10 10:11:06'),
(55, 2, 'D1701913132', 'd2a496bbdf1ffe60bc444a708c0caa393645543c', '2024-01-10 10:55:20'),
(56, 2, 'D1701913132', '3ed86b17ff1c5534e60551828924eb3c3f2de36f', '2024-01-10 10:56:03'),
(57, 2, 'D1701913132', 'e56ad4acea79c170ffb9031f3c5eabb050442239', '2024-01-10 11:16:12'),
(58, 2, 'D1701913132', 'c9298a5613860ef58c272c01a2a8eeb2570d4656', '2024-01-10 11:16:14'),
(59, 2, 'D1701913132', 'c07d7802f5d24c8427b849c90cd49618cdf317c2', '2024-01-10 11:16:59'),
(60, 2, 'D1701913132', 'a64954ee8bae2ff139c03fe1bab77e65b4139cba', '2024-01-10 11:17:15'),
(61, 2, 'D1701913132', 'edb0c6fe6a693fbe719d4c691c6af7ab6e0bced6', '2024-01-10 11:18:12'),
(62, 2, 'D1701913132', 'ae437fbc89b1ae03e6f3335340b151ce5b8b07e7', '2024-01-10 11:18:14'),
(63, 2, 'D1701913132', 'a08d8446008dd895342110feb7f758e4e8edd14b', '2024-01-10 11:27:14'),
(64, 2, 'D1701913132', 'f2dcf9f40050de64a994cd9719dec7b7ee2bdf46', '2024-01-10 14:33:58'),
(65, 2, 'D1701913132', '5fae75c70ee962d3b5a29f14898c37c5ba83067e', '2024-01-10 14:37:03'),
(67, 1, 'P210338', '7b0cd8e3b5172e60abeea4cc297936001c69e2f5', '2024-01-10 20:16:20'),
(68, 2, 'D1701908830', '485af95d7654fed9f246b08397ff764e3e0717ef', '2024-01-10 22:01:31'),
(69, 2, 'D1701913132', '3f46308d0a7a83f4253ec6ce5e715aa06af592a2', '2024-01-11 05:00:59'),
(70, 3, 'M18982', '4ea1de75d40ddf86a7cd6a033266dc0801dcff5a', '2024-01-11 07:14:23'),
(71, 2, 'D1701913132', '15346193d7fb1e536211cf5606a17e122ab4b1ac', '2024-01-11 10:09:09'),
(72, 2, 'D1701913132', '5e1fb63d0fb3e35821ab30b453f3b708729856b9', '2024-01-11 10:09:12'),
(74, 2, 'D1704959354', '0785d0515940dc3db0e907025c720a6d0379b5bf', '2024-01-11 15:04:29'),
(77, 3, 'M11652', '85da3979690c46dbc36691d86ecc509f6345a7e4', '2024-01-13 12:25:42'),
(78, 1, 'P184337', '3dccd0d46fbf5498ffcbdc5f99e17e312c1a3f5b', '2024-01-16 05:22:16'),
(79, 1, 'P184337', '0e6934810b9aa1ec27edd6d6e78095b6b9569574', '2024-01-16 05:22:19'),
(80, 1, 'P184337', '7fd6e5b9e88c3297be5ecb9d3502f39eb70a09c3', '2024-01-16 05:22:22'),
(81, 1, 'P184337', '0922f3944a53dc8f7c59a39158d64cafc048f795', '2024-01-16 05:22:27'),
(82, 1, 'P184337', '3f671024d5aa7e738988724b112e3f388300540a', '2024-01-16 05:22:29'),
(83, 1, 'P184337', 'e45318ba1b22297f7f30d6e62a76d0f1990dba7f', '2024-01-16 05:22:30'),
(84, 1, 'P184337', '0b04ff46550a3bc8ae0039289897ce031146f111', '2024-01-16 05:22:31'),
(85, 1, 'P184337', '58d002cdd6522a7d7a6445aec3570ba9c1c6f6c0', '2024-01-16 05:22:31'),
(86, 1, 'P184337', '626c00fe1f59228a8cd5044119ab1e4f2a162d19', '2024-01-16 05:22:32'),
(87, 1, 'P184337', '240160d9a786a70c37d5833a751c144a0d64fa16', '2024-01-16 05:22:32'),
(88, 1, 'P184337', 'b8a9a4d5c8283cc8b7a45005da7744ce1092b715', '2024-01-16 05:22:33'),
(89, 1, 'P184337', '8b0234cc145265b9045fcc6a29aebedb56f9d8d4', '2024-01-16 05:22:34'),
(90, 1, 'P184337', '40b2366f968c8d1c875feab944a2c8ed8c2c55c8', '2024-01-16 05:22:35'),
(91, 1, 'P1697423126', 'cb1ad03d617bad318d5aa3560d6d76bb9cb6f252', '2024-01-16 22:30:31'),
(92, 2, 'D1705493959', '789a90ebda799d08ebcf646432c529e55f1d7d96', '2024-01-18 19:06:16'),
(93, 2, 'D1705500232', '6edac4a67549afb937e642bfe7c21a4c12168fd9', '2024-01-18 19:06:32'),
(94, 2, 'D1705493959', 'c418b76c5a1fac8f5ddd71d7ebe1b1487d7859ad', '2024-01-18 19:14:56'),
(95, 1, 'P180741', '0d31e40d7a4d2c97718ef718532b84136d1c31af', '2024-01-20 19:40:20'),
(98, 1, 'P22550', 'b4246ab194662d10b818e17e3e6deb9f0e0930da', '2024-01-22 09:07:24'),
(100, 1, 'P173738', '34de596b62da5b930229a56150b9145eea95d398', '2024-01-22 09:20:46'),
(101, 1, 'P173738', 'c26487a49b91c4a51fef4fddd8f825631a5791b4', '2024-01-22 09:20:52'),
(102, 1, 'P173738', '5a09d01766ceedbf626cbdf25dd55f6fcc15cc7b', '2024-01-22 09:21:06'),
(104, 2, 'D1705925332', '6f726c5adb07566d6e0251844dc34aa2724f0443', '2024-01-22 19:09:16'),
(105, 2, 'D1704851860', 'c6409965e05916c5e7200f6fa224f46b75c272de', '2024-01-23 09:55:55'),
(106, 2, 'D1705206761', '3392e25de4fd6593d2781dfb3972a53852dd7c35', '2024-01-23 09:56:05'),
(107, 3, 'M26502', 'b9b9ec279498587c3fab7b4bb12e26ddcfa80b14', '2024-01-24 13:14:15'),
(108, 1, 'P74238', '8fc8f49815cdf966ba97174ba18af4acf56a9584', '2024-01-25 23:52:44'),
(109, 1, 'P74238', '3ac02b9d75f3804d97d1e3b98d7c99d3107e782c', '2024-01-25 23:52:58'),
(110, 1, 'P74238', 'c47da840b4f051cb5eca7d85c99a0b3fbc7cef5f', '2024-01-25 23:53:19'),
(113, 2, 'D1706679990', '3107bc326090c8148aa13aba50b82e7fb4543e96', '2024-01-31 23:53:22'),
(114, 3, 'M14445', '8b0b80340a64e2ebd356e608576b478a03e0fb10', '2024-01-31 23:55:38'),
(115, 2, 'D1699935100', '7e08f37082697ad6924c5c6549034a735c548868', '2024-02-01 06:09:54'),
(116, 3, 'M10827', '78a21836ccbddbb1acbb0728341f96e9b40af836', '2024-02-06 11:51:47'),
(117, 1, 'P75846', 'd25d7f1c3bb3dbd304226454e7838cfb3056f2bc', '2024-02-06 22:24:06'),
(118, 1, 'P75846', 'b233e486413ff0b2e1e54b6c5813c1eed0dd5c1f', '2024-02-06 22:24:32'),
(119, 2, 'D1707277682', 'afd2412f6deb6e1b1f2576432784ad126780e39c', '2024-02-07 10:49:22'),
(120, 2, 'D1707440966', 'f4c6baa9a07b8a735eb935c5cca16c7429280749', '2024-02-09 08:13:58'),
(121, 2, 'D1707443218', '8bf24feb673d7bdeac07a3d054e573f12193e1b8', '2024-02-09 10:33:12'),
(122, 2, 'D1707448889', '82d79d12ad17587a4b7f145576267ef7f7199bf0', '2024-02-09 10:33:29'),
(123, 3, 'M26802', 'eee897b01bcee7cf6d6e0b3c66c1528cd8d6c795', '2024-02-09 14:53:10'),
(124, 2, 'D1707453022', '683b0dbe44a186bf1990dc83db1d57fc7bf50403', '2024-02-10 08:40:28'),
(125, 2, 'D1702904003', 'cab63dcd30b0c24473f4ebbb21ecdfc31279c263', '2024-02-16 19:24:29'),
(126, 2, 'D1708831070', '35b30c5b1551f02cb18dd981adb4eb7487b441e2', '2024-02-25 10:16:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT 'pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `group`
--

INSERT INTO `group` (`id`, `group`, `level`) VALUES
(1, 'Pelanggan', 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_transaksi`
--

CREATE TABLE `history_transaksi` (
  `nomor` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(250) NOT NULL,
  `id_driver` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `proses` int(11) NOT NULL DEFAULT 0,
  `gender` int(11) NOT NULL DEFAULT 1,
  `verif` varchar(255) DEFAULT '321654'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `history_transaksi`
--

INSERT INTO `history_transaksi` (`nomor`, `id_transaksi`, `id_driver`, `waktu`, `status`, `catatan`, `proses`, `gender`, `verif`) VALUES
(1, '24631', 'D1697701004', '2024-01-04 19:36:47', 4, NULL, 0, 1, '321654'),
(2, '28087', 'D1697701004', '2024-01-04 19:37:36', 4, NULL, 0, 1, '321654'),
(3, '14580', 'D1697701004', '2024-01-04 19:40:00', 4, NULL, 0, 1, '6098'),
(4, '25316', 'D1697701004', '2024-01-04 21:27:44', 4, NULL, 0, 1, '4834'),
(5, '15055', 'D1700974029', '2024-01-07 16:36:54', 4, NULL, 0, 1, '321654'),
(6, '29611', 'D1700974029', '2024-01-07 17:05:35', 4, NULL, 0, 1, '321654'),
(7, '23146', 'D1700974029', '2024-01-07 17:13:36', 4, NULL, 0, 1, '321654'),
(8, '13086', 'D0', '2024-01-07 17:44:19', 1, NULL, 0, 1, '1608'),
(9, '23817', 'D0', '2024-01-07 17:44:54', 1, NULL, 0, 1, '7372'),
(10, '19536', 'D0', '2024-01-07 17:48:33', 1, NULL, 0, 1, '6314'),
(11, '20925', 'D0', '2024-01-07 18:17:33', 1, NULL, 0, 1, '9576'),
(12, '27512', 'D0', '2024-01-07 18:21:01', 1, NULL, 0, 1, '4074'),
(13, '11831', 'D0', '2024-01-07 18:22:10', 1, NULL, 0, 1, '1457'),
(14, '19560', 'D0', '2024-01-07 18:23:17', 1, NULL, 0, 1, '321654'),
(15, '28453', 'D0', '2024-01-07 18:27:44', 1, NULL, 0, 1, '3976'),
(16, '29031', 'D0', '2024-01-07 18:29:05', 1, NULL, 0, 1, '4048'),
(17, '15496', 'D0', '2024-01-07 18:40:25', 1, NULL, 0, 1, '8838'),
(18, '12187', 'D1700974029', '2024-01-07 18:41:16', 4, NULL, 0, 1, '321654'),
(19, '18020', 'D0', '2024-01-07 18:42:19', 1, NULL, 0, 1, '8917'),
(20, '21414', 'D0', '2024-01-07 18:44:08', 1, NULL, 0, 1, '880'),
(21, '28480', 'D0', '2024-01-07 18:45:43', 1, NULL, 0, 1, '4471'),
(22, '10684', 'D0', '2024-01-07 19:20:33', 1, NULL, 0, 1, '2239'),
(23, '21174', 'D0', '2024-01-07 19:21:08', 1, NULL, 0, 1, '4280'),
(24, '15486', 'D1700974029', '2024-01-07 19:23:50', 4, NULL, 0, 1, '5333'),
(25, '16024', 'D1700974029', '2024-01-07 19:25:37', 4, NULL, 0, 1, '321654'),
(26, '24177', 'D1700974029', '2024-01-07 20:01:58', 4, NULL, 0, 1, '192'),
(27, '22395', 'D1700974029', '2024-01-07 21:34:25', 4, NULL, 0, 1, '1804'),
(28, '19477', 'D1700974029', '2024-01-07 21:47:17', 4, NULL, 0, 1, '9475'),
(29, '28258', 'D1700974029', '2024-01-07 22:36:02', 4, NULL, 0, 1, '8309'),
(30, '12875', 'D0', '2024-01-08 08:44:52', 1, NULL, 0, 1, '141'),
(31, '13022', 'D0', '2024-01-08 08:46:37', 1, NULL, 0, 1, '7559'),
(32, '29133', 'D0', '2024-01-08 08:48:29', 1, NULL, 0, 1, '7953'),
(33, '25033', 'D1700974029', '2024-01-08 08:49:14', 4, NULL, 0, 1, '321654'),
(34, '29705', 'D0', '2024-01-08 08:49:49', 1, NULL, 0, 1, '1396'),
(35, '11427', 'D0', '2024-01-08 08:51:35', 1, NULL, 0, 1, '2198'),
(36, '22231', 'D0', '2024-01-08 08:53:05', 1, NULL, 0, 1, '3215'),
(37, '13182', 'D0', '2024-01-08 08:53:55', 1, NULL, 0, 1, '3187'),
(38, '27991', 'D0', '2024-01-08 08:54:55', 1, NULL, 0, 1, '6209'),
(39, '24008', 'D0', '2024-01-08 08:56:38', 1, NULL, 0, 1, '5736'),
(40, '29778', 'D0', '2024-01-08 08:57:22', 1, NULL, 0, 1, '8660'),
(41, '27748', 'D0', '2024-01-08 08:58:08', 1, NULL, 0, 1, '4705'),
(42, '29906', 'D0', '2024-01-08 08:58:31', 1, NULL, 0, 1, '1481'),
(43, '16966', 'D0', '2024-01-08 09:01:03', 1, NULL, 0, 1, '1403'),
(44, '17180', 'D0', '2024-01-08 09:01:52', 1, NULL, 0, 1, '8767'),
(45, '27320', 'D0', '2024-01-08 09:02:32', 1, NULL, 0, 1, '4086'),
(46, '28249', 'D1700974029', '2024-01-08 09:02:47', 4, NULL, 0, 1, '5099'),
(47, '16969', 'D1700974029', '2024-01-08 09:20:36', 4, NULL, 0, 1, '6189'),
(48, '22132', 'D1700974029', '2024-01-08 09:34:24', 4, NULL, 0, 1, '5001'),
(49, '10619', 'D0', '2024-01-08 11:18:54', 1, NULL, 0, 1, '8043'),
(50, '12742', 'D0', '2024-01-08 11:19:35', 1, NULL, 0, 1, '5561'),
(51, '10945', 'D1700974029', '2024-01-08 11:20:31', 4, NULL, 0, 1, '321654'),
(52, '10025', 'D0', '2024-01-08 11:21:06', 1, NULL, 0, 1, '5239'),
(53, '23326', 'D0', '2024-01-08 11:22:01', 1, NULL, 0, 1, '7379'),
(54, '15092', 'D0', '2024-01-08 11:22:26', 1, NULL, 0, 1, '1151'),
(55, '16229', 'D0', '2024-01-08 11:24:51', 1, NULL, 0, 1, '4862'),
(56, '29774', 'D0', '2024-01-08 11:25:16', 1, NULL, 0, 1, '1859'),
(57, '26286', 'D0', '2024-01-08 11:29:42', 1, NULL, 0, 1, '2844'),
(58, '23286', 'D0', '2024-01-08 11:30:07', 1, NULL, 0, 1, '8284'),
(59, '26912', 'D0', '2024-01-08 11:30:26', 1, NULL, 0, 1, '4841'),
(60, '24013', 'D1700974029', '2024-01-08 11:31:04', 4, NULL, 0, 1, '321654'),
(61, '11954', 'D0', '2024-01-08 11:31:42', 1, NULL, 0, 1, '8654'),
(62, '13799', 'D0', '2024-01-08 11:54:55', 1, NULL, 0, 1, '1213'),
(63, '28146', 'D1700974029', '2024-01-08 12:00:03', 4, NULL, 0, 1, '321654'),
(64, '13476', 'D1700974029', '2024-01-08 12:01:55', 4, NULL, 0, 1, '3141'),
(65, '12457', 'D1700974029', '2024-01-08 12:14:19', 4, NULL, 0, 1, '8150'),
(66, '19489', 'D0', '2024-01-08 17:44:28', 1, NULL, 0, 1, '9823'),
(67, '20566', 'D0', '2024-01-08 17:44:40', 1, NULL, 0, 1, '9600'),
(68, '29266', 'D0', '2024-01-08 17:47:13', 1, NULL, 0, 1, '824'),
(69, '12264', 'D0', '2024-01-08 17:47:50', 1, NULL, 0, 1, '7778'),
(70, '19425', 'D1695301140', '2024-01-08 19:39:36', 4, NULL, 0, 1, '321654'),
(71, '15152', 'D1695301140', '2024-01-08 19:41:23', 4, NULL, 0, 1, '321654'),
(72, '16870', 'D1695301140', '2024-01-08 19:43:09', 4, NULL, 0, 1, '321654'),
(73, '13646', 'D1695301140', '2024-01-08 19:46:01', 5, NULL, 0, 1, '321654'),
(74, '12619', 'D1695301140', '2024-01-08 19:47:40', 4, NULL, 0, 1, '321654'),
(75, '25449', 'D0', '2024-01-08 23:41:58', 1, NULL, 0, 1, '8919'),
(76, '26598', 'D0', '2024-01-08 23:42:40', 1, NULL, 0, 1, '231'),
(77, '18018', 'D0', '2024-01-08 23:42:59', 1, NULL, 0, 1, '2089'),
(78, '21106', 'D0', '2024-01-09 00:36:09', 1, NULL, 0, 1, '4077'),
(79, '12805', 'D1695301140', '2024-01-09 00:36:58', 4, NULL, 0, 1, '321654'),
(80, '25224', 'D0', '2024-01-09 04:20:56', 1, NULL, 0, 1, '8086'),
(81, '22687', 'D0', '2024-01-09 04:23:24', 1, NULL, 0, 1, '1806'),
(82, '29022', 'D0', '2024-01-09 04:23:47', 1, NULL, 0, 1, '1920'),
(83, '15574', 'D1700974029', '2024-01-09 04:24:18', 4, NULL, 0, 1, '1280'),
(84, '10111', 'D0', '2024-01-09 04:24:43', 1, NULL, 0, 1, '2846'),
(85, '18533', 'D0', '2024-01-09 09:47:44', 1, NULL, 0, 1, '3644'),
(86, '10370', 'D1700974029', '2024-01-09 11:25:51', 4, NULL, 0, 1, '9499'),
(87, '25471', 'D1700974029', '2024-01-09 15:20:00', 4, NULL, 0, 1, '6858'),
(88, '26143', 'D0', '2024-01-09 16:41:09', 1, NULL, 0, 1, '321654'),
(89, '26118', 'D0', '2024-01-09 16:42:17', 1, NULL, 0, 1, '321654'),
(90, '12716', 'D0', '2024-01-09 16:43:15', 1, NULL, 0, 1, '321654'),
(91, '23592', 'D0', '2024-01-09 16:44:53', 1, NULL, 0, 1, '321654'),
(92, '17865', 'D0', '2024-01-09 17:09:57', 1, NULL, 0, 1, '321654'),
(93, '18021', 'D0', '2024-01-09 17:46:42', 1, NULL, 0, 1, '321654'),
(94, '19042', 'D1701173796', '2024-01-09 21:53:15', 4, NULL, 0, 1, '321654'),
(95, '22053', 'D1701162781', '2024-01-09 21:53:50', 4, NULL, 0, 1, '321654'),
(96, '19669', 'D1700974029', '2024-01-10 00:20:06', 4, NULL, 0, 1, '6263'),
(97, '18521', 'D0', '2024-01-10 11:23:36', 1, NULL, 0, 1, '321654'),
(98, '19632', 'D1700974029', '2024-01-10 11:59:32', 4, NULL, 0, 1, '321654'),
(99, '28111', 'D1700974029', '2024-01-10 12:13:11', 4, NULL, 0, 1, '2813'),
(100, '17235', 'D0', '2024-01-10 13:57:26', 1, NULL, 0, 1, '54'),
(101, '21260', 'D1701173796', '2024-01-10 15:17:16', 5, NULL, 0, 1, '321654'),
(102, '29667', 'D1701173796', '2024-01-10 15:17:59', 5, NULL, 0, 1, '321654'),
(103, '20016', 'D0', '2024-01-10 15:20:52', 1, NULL, 0, 1, '8032'),
(104, '14927', 'D1701173796', '2024-01-10 15:23:01', 5, NULL, 0, 1, '321654'),
(105, '16570', 'D1701173796', '2024-01-10 15:38:04', 4, NULL, 0, 1, '321654'),
(106, '13734', 'D0', '2024-01-10 15:47:56', 1, NULL, 0, 1, '5256'),
(107, '17931', 'D1702809158', '2024-01-10 19:51:15', 4, NULL, 0, 1, '321654'),
(108, '15718', 'D0', '2024-01-10 21:04:39', 1, NULL, 0, 1, '321654'),
(109, '16048', 'D0', '2024-01-10 21:07:22', 1, NULL, 0, 1, '321654'),
(110, '19245', 'D0', '2024-01-10 21:09:08', 1, NULL, 0, 1, '321654'),
(111, '25339', 'D0', '2024-01-10 21:33:49', 1, NULL, 0, 1, '321654'),
(112, '24084', 'D1701173796', '2024-01-10 23:54:37', 4, NULL, 0, 1, '321654'),
(113, '29982', 'D0', '2024-01-11 07:09:37', 1, NULL, 0, 1, '321654'),
(114, '26205', 'D1701353940', '2024-01-11 08:44:30', 4, NULL, 0, 1, '321654'),
(115, '22817', 'D1701173796', '2024-01-11 08:55:48', 4, NULL, 0, 1, '321654'),
(116, '22868', 'D1700974029', '2024-01-11 10:47:37', 4, NULL, 0, 1, '6428'),
(117, '11354', 'D1701181780', '2024-01-11 11:58:12', 5, NULL, 0, 1, '7565'),
(118, '27115', 'D1701181780', '2024-01-11 12:03:15', 4, NULL, 0, 1, '8689'),
(119, '11381', 'D1701173796', '2024-01-11 13:42:53', 4, NULL, 0, 1, '321654'),
(120, '12355', 'D0', '2024-01-11 13:43:45', 1, NULL, 0, 1, '321654'),
(121, '16250', 'D0', '2024-01-11 14:39:06', 1, NULL, 0, 1, '321654'),
(122, '17157', 'D0', '2024-01-11 15:09:56', 1, NULL, 0, 1, '321654'),
(123, '18478', 'D1702809158', '2024-01-11 15:51:27', 4, NULL, 0, 1, '9677'),
(124, '20241', 'D1695301140', '2024-01-11 17:45:21', 5, NULL, 0, 1, '321654'),
(125, '14077', 'D1701173796', '2024-01-11 18:45:13', 4, NULL, 0, 1, '321654'),
(126, '26256', 'D1701173796', '2024-01-11 21:05:45', 4, NULL, 0, 1, '321654'),
(127, '10017', 'D1701173796', '2024-01-12 07:36:40', 4, NULL, 0, 1, '321654'),
(128, '22993', 'D1701162781', '2024-01-12 09:04:59', 4, NULL, 0, 1, '321654'),
(129, '19813', 'D0', '2024-01-12 12:49:27', 1, NULL, 0, 1, '8591'),
(130, '10893', 'D0', '2024-01-12 12:51:51', 1, NULL, 0, 1, '6326'),
(131, '17836', 'D1701162781', '2024-01-12 12:53:34', 4, NULL, 0, 1, '321654'),
(132, '13681', 'D0', '2024-01-12 12:58:14', 1, NULL, 0, 1, '5245'),
(133, '24836', 'D1701173796', '2024-01-12 17:02:50', 4, NULL, 0, 1, '321654'),
(134, '27348', 'D1701162781', '2024-01-12 17:04:11', 5, NULL, 0, 1, '321654'),
(135, '14873', 'D0', '2024-01-12 18:02:25', 1, NULL, 0, 1, '8642'),
(136, '14918', 'D1695301140', '2024-01-12 18:17:40', 5, NULL, 0, 1, '321654'),
(137, '21271', 'D0', '2024-01-13 13:04:28', 1, NULL, 0, 1, '321654'),
(138, '14834', 'D0', '2024-01-13 13:08:31', 1, NULL, 0, 1, '321654'),
(139, '22334', 'D0', '2024-01-13 14:34:49', 1, NULL, 0, 1, '321654'),
(140, '21305', 'D0', '2024-01-13 16:20:01', 1, NULL, 0, 1, '321654'),
(141, '12650', 'D1701162781', '2024-01-13 19:47:03', 5, NULL, 0, 1, '321654'),
(142, '13532', 'D1701173796', '2024-01-14 20:30:57', 5, NULL, 0, 1, '321654'),
(143, '19379', 'D1701162781', '2024-01-14 20:51:51', 5, NULL, 0, 1, '321654'),
(144, '11078', 'D1701173796', '2024-01-14 21:13:19', 4, NULL, 0, 1, '321654'),
(145, '18737', 'D0', '2024-01-14 21:16:45', 1, NULL, 0, 1, '321654'),
(146, '11779', 'D1701173796', '2024-01-14 21:18:34', 5, NULL, 0, 1, '321654'),
(147, '22989', 'D1701173796', '2024-01-14 21:22:53', 4, NULL, 0, 1, '321654'),
(148, '12502', 'D0', '2024-01-14 21:34:25', 1, NULL, 0, 1, '321654'),
(149, '23375', 'D0', '2024-01-14 21:36:57', 1, NULL, 0, 1, '321654'),
(150, '20495', 'D0', '2024-01-14 21:39:10', 1, NULL, 0, 1, '321654'),
(151, '14019', 'D0', '2024-01-14 21:43:19', 1, NULL, 0, 1, '321654'),
(152, '22711', 'D1701162781', '2024-01-14 22:11:14', 4, NULL, 0, 1, '321654'),
(153, '26261', 'D1703513848', '2024-01-15 10:42:58', 4, NULL, 0, 1, '321654'),
(154, '10968', 'D1701173796', '2024-01-15 18:08:27', 5, NULL, 0, 1, '7279'),
(155, '14742', 'D1701162781', '2024-01-15 19:20:39', 5, NULL, 0, 1, '321654'),
(156, '16338', 'D1702809158', '2024-01-16 12:46:59', 4, NULL, 0, 1, '321654'),
(157, '16012', 'D1702809158', '2024-01-16 12:53:14', 4, NULL, 0, 1, '4046'),
(158, '15623', 'D1701162781', '2024-01-16 13:09:26', 4, NULL, 0, 1, '321654'),
(159, '15674', 'D0', '2024-01-16 14:57:35', 1, NULL, 0, 1, '321654'),
(160, '22506', 'D0', '2024-01-16 18:24:41', 1, NULL, 0, 1, '321654'),
(161, '20669', 'D0', '2024-01-16 18:25:12', 1, NULL, 0, 1, '321654'),
(162, '22626', 'D0', '2024-01-16 18:25:26', 1, NULL, 0, 1, '321654'),
(163, '28927', 'D0', '2024-01-17 08:52:34', 1, NULL, 0, 1, '321654'),
(164, '26038', 'D0', '2024-01-17 09:19:22', 1, NULL, 0, 1, '321654'),
(165, '24902', 'D0', '2024-01-17 09:21:50', 1, NULL, 0, 1, '321654'),
(166, '18445', 'D0', '2024-01-17 09:24:26', 1, NULL, 0, 1, '5915'),
(167, '15972', 'D0', '2024-01-17 09:28:25', 1, NULL, 0, 1, '321654'),
(168, '11621', 'D0', '2024-01-17 09:30:47', 1, NULL, 0, 1, '321654'),
(169, '26976', 'D0', '2024-01-17 09:48:41', 1, NULL, 0, 1, '321654'),
(170, '25310', 'D0', '2024-01-17 09:50:39', 1, NULL, 0, 1, '321654'),
(171, '11139', 'D0', '2024-01-17 09:52:56', 1, NULL, 0, 1, '321654'),
(172, '25845', 'D1702809158', '2024-01-17 09:55:51', 4, NULL, 0, 1, '321654'),
(173, '20417', 'D0', '2024-01-17 12:54:04', 1, NULL, 0, 1, '321654'),
(174, '20507', 'D0', '2024-01-17 12:55:09', 1, NULL, 0, 1, '321654'),
(175, '18608', 'D0', '2024-01-17 15:01:18', 1, NULL, 0, 1, '321654'),
(176, '21159', 'D0', '2024-01-17 15:03:57', 1, NULL, 0, 1, '321654'),
(177, '20607', 'D1702809158', '2024-01-18 09:41:37', 4, NULL, 0, 1, '321654'),
(178, '14329', 'D1702809158', '2024-01-18 09:43:51', 4, NULL, 0, 1, '2401'),
(179, '17396', 'D0', '2024-01-20 12:42:06', 1, NULL, 0, 1, '321654'),
(180, '26917', 'D0', '2024-01-20 12:44:12', 1, NULL, 0, 1, '321654'),
(181, '22698', 'D0', '2024-01-20 12:48:24', 1, NULL, 0, 1, '321654'),
(182, '18759', 'D0', '2024-01-20 12:50:27', 1, NULL, 0, 1, '321654'),
(183, '10672', 'D0', '2024-01-20 13:08:17', 1, NULL, 0, 1, '321654'),
(184, '21669', 'D1701181780', '2024-01-20 13:47:11', 5, NULL, 0, 1, '321654'),
(185, '23651', 'D0', '2024-01-21 17:44:17', 1, NULL, 0, 1, '321654'),
(186, '15439', 'D0', '2024-01-21 17:44:57', 1, NULL, 0, 1, '321654'),
(187, '22652', 'D0', '2024-01-21 17:46:25', 1, NULL, 0, 1, '321654'),
(188, '29732', 'D1700738153', '2024-01-21 17:47:34', 5, NULL, 0, 1, '321654'),
(189, '25220', 'D1708831070', '2024-01-22 10:56:02', 4, NULL, 0, 1, '7030'),
(190, '27378', 'D1700738153', '2024-01-22 14:11:58', 5, NULL, 0, 1, '321654'),
(191, '29658', 'D1705925332', '2024-01-22 19:15:36', 4, NULL, 0, 1, '321654'),
(192, '26983', 'D1705925332', '2024-01-22 19:19:20', 4, NULL, 0, 1, '321654'),
(193, '11508', 'D0', '2024-01-23 09:41:34', 1, NULL, 0, 1, '321654'),
(194, '21111', 'D0', '2024-01-23 09:50:21', 1, NULL, 0, 1, '321654'),
(195, '18761', 'D1702809158', '2024-01-23 09:51:36', 4, NULL, 0, 1, '321654'),
(196, '22244', 'D0', '2024-01-23 09:53:59', 1, NULL, 0, 1, '9028'),
(197, '10744', 'D1702809158', '2024-01-23 09:59:13', 4, NULL, 0, 1, '5075'),
(198, '26288', 'D1702809158', '2024-01-24 09:44:53', 4, NULL, 0, 1, '321654'),
(199, '17872', 'D1702809158', '2024-01-24 09:48:46', 4, NULL, 0, 1, '6055'),
(200, '17627', 'D1701173796', '2024-01-25 08:02:29', 4, NULL, 0, 1, '321654'),
(201, '19159', 'D1702809158', '2024-01-25 09:10:59', 4, NULL, 0, 1, '321654'),
(202, '16620', 'D1702809158', '2024-01-25 09:15:14', 4, NULL, 0, 1, '9768'),
(203, '21001', 'D0', '2024-01-26 08:16:47', 1, NULL, 0, 1, '321654'),
(204, '21370', 'D1702809158', '2024-01-26 09:26:02', 5, NULL, 0, 1, '321654'),
(205, '25461', 'D1702809158', '2024-01-26 09:28:05', 4, NULL, 0, 1, '321654'),
(206, '19567', 'D1702809158', '2024-01-26 09:29:42', 4, NULL, 0, 1, '5007'),
(207, '22107', 'D0', '2024-01-26 09:31:41', 1, NULL, 0, 1, '321654'),
(208, '15035', 'D1702809158', '2024-01-26 13:31:15', 5, NULL, 0, 1, '321654'),
(209, '13837', 'D1701162781', '2024-01-26 13:33:45', 4, NULL, 0, 1, '321654'),
(210, '22210', 'D1702809158', '2024-01-26 13:54:36', 4, NULL, 0, 1, '321654'),
(211, '23217', 'D1702809158', '2024-01-26 13:58:33', 4, NULL, 0, 1, '2958'),
(212, '28239', 'D1702809158', '2024-01-26 14:45:48', 5, NULL, 0, 1, '321654'),
(213, '14237', 'D1701162781', '2024-01-26 15:14:08', 4, NULL, 0, 1, '321654'),
(214, '12064', 'D0', '2024-01-27 00:39:43', 1, NULL, 0, 1, '321654'),
(215, '23446', 'D0', '2024-01-27 03:25:18', 1, NULL, 0, 1, '321654'),
(216, '24188', 'D1701173796', '2024-01-27 07:09:25', 4, NULL, 0, 1, '321654'),
(217, '29199', 'D0', '2024-01-27 07:10:54', 1, NULL, 0, 1, '321654'),
(218, '28315', 'D0', '2024-01-27 13:57:47', 1, NULL, 0, 1, '321654'),
(219, '26668', 'D0', '2024-01-27 14:54:00', 1, NULL, 0, 1, '321654'),
(220, '20604', 'D0', '2024-01-27 14:57:25', 1, NULL, 0, 1, '321654'),
(221, '20414', 'D1700106662', '2024-01-27 14:59:50', 5, NULL, 0, 1, '321654'),
(222, '15267', 'D0', '2024-01-27 15:09:36', 1, NULL, 0, 1, '321654'),
(223, '25925', 'D1701162781', '2024-01-27 15:11:47', 4, NULL, 0, 1, '321654'),
(224, '11165', 'D1701162781', '2024-01-27 15:23:07', 4, NULL, 0, 1, '321654'),
(225, '25706', 'D1701162781', '2024-01-28 08:47:15', 4, NULL, 0, 1, '321654'),
(226, '14480', 'D0', '2024-01-28 10:07:58', 1, NULL, 0, 1, '1035'),
(227, '13915', 'D1702809158', '2024-01-29 09:10:38', 4, NULL, 0, 1, '321654'),
(228, '24291', 'D1700106662', '2024-01-29 17:36:06', 5, NULL, 0, 1, '321654'),
(229, '19081', 'D1700106662', '2024-01-29 21:53:02', 4, NULL, 0, 1, '321654'),
(230, '26747', 'D1702809158', '2024-01-30 08:42:57', 5, NULL, 0, 1, '321654'),
(231, '16783', 'D1702809158', '2024-01-30 08:51:21', 4, NULL, 0, 1, '2668'),
(232, '16488', 'D0', '2024-01-30 09:59:38', 1, NULL, 0, 1, '321654'),
(233, '29492', 'D0', '2024-01-30 10:02:21', 1, NULL, 0, 1, '4968'),
(234, '26199', 'D1702809158', '2024-01-31 09:13:20', 5, NULL, 0, 1, '321654'),
(235, '23792', 'D1702809158', '2024-01-31 09:16:15', 5, NULL, 0, 1, '3077'),
(236, '14355', 'D1702809158', '2024-01-31 09:17:44', 5, NULL, 0, 1, '321654'),
(237, '17727', 'D1702809158', '2024-02-01 09:28:54', 5, NULL, 0, 1, '321654'),
(238, '14002', 'D1702809158', '2024-02-01 09:30:14', 5, NULL, 0, 1, '4328'),
(239, '19771', 'D1702809158', '2024-02-02 09:00:49', 5, NULL, 0, 1, '321654'),
(240, '16257', 'D1702809158', '2024-02-02 09:03:38', 5, NULL, 0, 1, '932'),
(241, '28530', 'D1700106662', '2024-02-02 09:38:40', 4, NULL, 0, 1, '321654'),
(242, '26019', 'D1702809158', '2024-02-02 09:43:37', 5, NULL, 0, 1, '321654'),
(243, '13687', 'D0', '2024-02-02 17:12:47', 1, NULL, 0, 1, '321654'),
(244, '10452', 'D0', '2024-02-02 17:13:13', 1, NULL, 0, 1, '321654'),
(245, '11259', 'D0', '2024-02-02 17:13:46', 1, NULL, 0, 1, '321654'),
(246, '10753', 'D0', '2024-02-02 17:16:33', 1, NULL, 0, 1, '321654'),
(247, '11463', 'D0', '2024-02-02 17:17:02', 1, NULL, 0, 1, '321654'),
(248, '19643', 'D0', '2024-02-03 07:10:07', 1, NULL, 0, 1, '321654'),
(249, '12158', 'D1699323909', '2024-02-03 11:35:47', 5, NULL, 0, 1, '321654'),
(250, '14908', 'D1700106662', '2024-02-04 17:19:31', 4, NULL, 0, 1, '321654'),
(251, '27984', 'D1701162781', '2024-02-04 20:04:46', 4, NULL, 0, 1, '321654'),
(252, '21096', 'D0', '2024-02-05 10:15:19', 1, NULL, 0, 1, '321654'),
(253, '17634', 'D0', '2024-02-05 11:39:10', 1, NULL, 0, 1, '321654'),
(254, '25865', 'D0', '2024-02-05 11:40:52', 1, NULL, 0, 1, '3765'),
(255, '26510', 'D1702809158', '2024-02-05 11:41:46', 5, NULL, 0, 1, '321654'),
(256, '10069', 'D1701162781', '2024-02-05 12:29:40', 4, NULL, 0, 1, '321654'),
(257, '12890', 'D0', '2024-02-05 12:54:13', 1, NULL, 0, 1, '2872'),
(258, '23172', 'D1700738153', '2024-02-05 12:55:54', 5, NULL, 0, 1, '321654'),
(259, '27106', 'D1695301140', '2024-02-05 18:10:23', 5, NULL, 0, 1, '321654'),
(260, '16597', 'D1702809158', '2024-02-06 09:44:10', 5, NULL, 0, 1, '321654'),
(261, '14155', 'D0', '2024-02-06 09:46:48', 1, NULL, 0, 1, '2362'),
(262, '12080', 'D1701162781', '2024-02-06 10:55:22', 4, NULL, 0, 1, '321654'),
(263, '14408', 'D0', '2024-02-07 09:12:44', 1, NULL, 0, 1, '321654'),
(264, '13268', 'D1702809158', '2024-02-07 09:13:06', 5, NULL, 0, 1, '321654'),
(265, '24174', 'D0', '2024-02-07 09:15:20', 1, NULL, 0, 1, '9475'),
(266, '26260', 'D1700738153', '2024-02-07 10:55:41', 5, NULL, 0, 1, '321654'),
(267, '17048', 'D0', '2024-02-09 08:11:42', 1, NULL, 0, 1, '321654'),
(268, '25894', 'D1700738153', '2024-02-09 08:29:39', 5, NULL, 0, 1, '321654'),
(269, '22710', 'D0', '2024-02-09 10:42:27', 1, NULL, 0, 1, '321654'),
(270, '20041', 'D0', '2024-02-09 10:44:35', 1, NULL, 0, 1, '321654'),
(271, '13653', 'D0', '2024-02-09 10:45:18', 1, NULL, 0, 1, '321654'),
(272, '16601', 'D1705925332', '2024-02-09 10:45:41', 5, NULL, 0, 1, '321654'),
(273, '29131', 'D0', '2024-02-09 10:45:46', 1, NULL, 0, 1, '321654'),
(274, '20974', 'D0', '2024-02-11 16:16:51', 1, NULL, 0, 1, '321654'),
(275, '21798', 'D1699323909', '2024-02-11 16:18:09', 5, NULL, 0, 1, '321654'),
(276, '23996', 'D1702809158', '2024-02-12 09:50:04', 4, NULL, 0, 1, '321654'),
(277, '22497', 'D1702809158', '2024-02-12 09:51:05', 4, NULL, 0, 1, '5240'),
(278, '17781', 'D1702809158', '2024-02-13 09:53:02', 4, NULL, 0, 1, '321654'),
(279, '13870', 'D1702809158', '2024-02-13 09:54:09', 4, NULL, 0, 1, '7507'),
(280, '21776', 'D1700974029', '2024-02-16 09:21:53', 4, NULL, 0, 1, '321654'),
(281, '15320', 'D1699323909', '2024-02-17 06:10:26', 5, NULL, 0, 1, '321654'),
(282, '10877', 'D1702809158', '2024-02-19 09:39:12', 4, NULL, 0, 1, '321654'),
(283, '21573', 'D1702809158', '2024-02-19 09:39:54', 4, NULL, 0, 1, '9905'),
(284, '22159', 'D1702809158', '2024-02-20 09:24:05', 4, NULL, 0, 1, '321654'),
(285, '21612', 'D1702809158', '2024-02-20 09:24:59', 4, NULL, 0, 1, '170'),
(286, '19891', 'D1702809158', '2024-02-21 11:03:37', 4, NULL, 0, 1, '321654'),
(287, '29975', 'D1702809158', '2024-02-21 11:04:42', 4, NULL, 0, 1, '1316'),
(288, '12758', 'D1702809158', '2024-02-22 09:52:50', 4, NULL, 0, 1, '321654'),
(289, '23536', 'D1702809158', '2024-02-22 09:53:23', 4, NULL, 0, 1, '9666'),
(294, '17962', 'D1708831070', '2024-03-18 09:28:53', 4, NULL, 0, 1, '321654'),
(291, '21456', 'D0', '2024-02-26 01:46:18', 1, NULL, 0, 1, '321654'),
(293, '27860', 'D1708831070', '2024-03-18 09:25:19', 4, NULL, 0, 1, '321654'),
(295, '24559', 'D1708831070', '2024-03-18 14:14:43', 4, NULL, 0, 1, '321654'),
(296, '14016', 'D1708831070', '2024-03-18 14:23:38', 4, NULL, 0, 1, '321654'),
(297, '14157', 'D1708831070', '2024-03-18 14:28:05', 4, NULL, 0, 1, '321654'),
(298, '14365', 'D1708831070', '2024-03-18 15:22:02', 4, NULL, 0, 1, '321654'),
(299, '25220', 'D1708831070', '2024-03-24 21:33:16', 4, NULL, 0, 1, '321654'),
(300, '15044', 'D1708831070', '2024-03-24 21:34:13', 4, NULL, 0, 1, '321654'),
(301, '12571', 'D1708831070', '2024-03-24 21:35:30', 4, NULL, 0, 1, '321654');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbok`
--

CREATE TABLE `inbok` (
  `no` int(10) UNSIGNED NOT NULL,
  `id` varchar(255) NOT NULL,
  `idpesan` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_merchant` varchar(250) NOT NULL,
  `nama_item` varchar(250) NOT NULL,
  `harga_item` int(11) NOT NULL,
  `harga_promo` int(11) NOT NULL,
  `kategori_item` varchar(200) NOT NULL,
  `deskripsi_item` text NOT NULL,
  `foto_item` varchar(250) NOT NULL,
  `created_item` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_item` varchar(10) NOT NULL,
  `status_promo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_news`
--

CREATE TABLE `kategori_news` (
  `id_kategori_news` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kategori_news`
--

INSERT INTO `kategori_news` (`id_kategori_news`, `kategori`, `created`) VALUES
(1, 'Wisata', '2023-06-30 06:53:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_k` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `jenis` char(1) NOT NULL,
  `nomor_kendaraan` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_k`, `merek`, `tipe`, `jenis`, `nomor_kendaraan`, `warna`) VALUES
(4, 'honda', 'beat', '', '1234', 'merah'),
(3, 'Honda Beat', 'Matic', '', 'E123B', 'Hitam'),
(2, 'Yamaha Mio', 'Matic', '', 'E6541B', 'Hitam'),
(1, 'Honda Beat', 'Matic', '', 'E3214B', 'Hitam'),
(5, 'honda', 'honda', '1', '2343', 'hitam'),
(6, 'civiv', 'HONDA', '1', 'B1305 KLN', 'Putih'),
(7, 'Honda', 'Genio', '', 'DE 4881 DE', 'Hitam'),
(8, 'Honda', 'matic', '', 'DE 2992 D', 'hitam'),
(9, ' honda scopy', 'matic', '', 'DE3513DC', 'coklat hitam'),
(10, 'Honda', 'matic', '', 'DE 3521D', 'hitam'),
(11, 'Honda', 'matic', '', ' DE 4701 DC', 'hitam'),
(12, 'Honda', 'matic', '', 'DE 6542 DC', 'hitam'),
(13, 'Yamaha Mio', 'matic', '', 'DE2526LP', 'merah'),
(14, 'HITAM HONDA VARIO 16', 'matic', '', 'DE 4969 DE', 'hitam'),
(15, 'hitam honda beat', 'matic', '', ' 5407', 'hitam'),
(16, ' Merah HONDA supra x', ' Merah HONDA supra x', '', 'DE 4693 DE', ' Merah HONDA supra x 125'),
(17, 'HONDA', 'SCOPY', '', 'DE 2664 DF', 'MERAH'),
(18, 'Honda', 'bead', '', 'DE 3693 DA', 'biru'),
(19, 'Honda', 'matic', '', 'DE 3521D', 'hitam'),
(20, 'Honda', 'matic', '', 'DE 2992 D', 'hitam'),
(21, 'Yamaha', 'Mx', '', 'DE 2992 DD', 'Putih'),
(22, 'Hobda', 'beat', '', 'DE 2781 DE', 'Hitam'),
(23, 'HONDA', 'Vario', '', 'DE 6542 DC', 'Hitam'),
(24, 'Yamaha Grand Filano', 'Matic', '', 'DM3398JU', 'Biru'),
(25, 'mio m3', 'matic', '', 'De 3337 De', 'merah hitam'),
(26, 'Kawasaki ninja', 'kompling', '', 'B02271 UFC', 'hitam metalic'),
(27, 'YAMAHA', 'mio gear', '', 'DE 4491 DE', 'Merah Hitam'),
(28, 'honda', 'matic', '', 'B5475FOK', 'hitam'),
(29, 'HONDA', 'Scopy', '', 'DE 2632 DF', 'Merah Hitam'),
(30, 'HONDA', 'SCOPY', '', 'DE 6134 LH', 'COKELAT CREAM'),
(31, 'YAMAHA', 'Fino Grande', '', 'DE 5119 DE', 'MERAH'),
(32, 'Beat', 'Metic', '', 'DE 5407 DE', 'HITAM'),
(33, 'Yamaha ', 'metic', '', 'DE4792NE', 'hitam'),
(34, 'jupiter 150cc', 'Cth', '', '5893', 'Merah'),
(35, 'Honda ', 'Vario', '', 'E 9999 TME', 'putih'),
(36, 'Toyota Avanza', 'Matic', '', 'B1883WYA', 'hitam'),
(37, 'honda', 'beat', '', 'DE 3148 DE', 'hitam'),
(38, 'Yamaha', 'metic', '', 'De4792ne', 'hitam'),
(39, 'suzuki', 'nex', '', 'DE 5077 DB', 'hijau'),
(40, 'Yamaha ', 'Jupiter', '', 'DE6094DB', 'biru'),
(41, 'Avanza', 'manual', '', 'E 1925 LN', 'Hitam'),
(42, 'honda', 'vario 160', '', 'DE 4969 DE', 'hitam'),
(43, 'HONDA', 'BEAT', '', 'E3292IR', 'HIJAU/PUTIH'),
(44, 'Wuling', 'Matic', '', 'E 1207 LX', 'Merah'),
(45, 'NMAX', 'Matic', '', 'E 3105 HL', 'Hitam'),
(46, 'Nmax', 'Matic', '', 'E6032HY', 'Merah'),
(47, 'nmax', 'matic', '', 'E 6032 HY', 'merah'),
(48, 'nissan', 'manual', '', 'B2568SFG', 'hitam'),
(49, 'inova', 'reborn', '', 'B11111C', 'Putih'),
(50, 'Toyota', 'manual', '', 'E 1174 NA', 'Putih'),
(51, 'Honda beat', 'matic', '', 'E 4781 JN', 'Hitam'),
(52, 'fino', 'matic', '', 'E 6912 HL', 'Putih'),
(53, 'honda', 'matic', '', 'E3289JD', 'hitam'),
(54, 'Honda', 'matic', '', 'N 3718 NT', 'hitam'),
(55, 'daihatsu', 'manual', '', 'T1663GH', 'abu abu'),
(56, 'Honda Scoopy ', 'matic', '', 'E4964JU', 'hitam'),
(57, 'honda', 'metik', '', 'E 1234 LK', 'hitam'),
(58, 'yamaha', 'mio m3', '', 'DE 2968 XX', 'hitam'),
(59, 'Revo X', 'Rante', '', 'DE4827DE', 'Merah hitam'),
(60, 'Yamaha ', 'metik', '', 'de 4792 ne', 'hitam'),
(61, 'Avanza ', 'Manual', '', 'E 1186 SD', 'Silver metalik'),
(62, 'motor Honda Scoopy ', 'matic', '', 'E 3107 PBF ', 'silver '),
(63, 'Honda Vario ', 'Matic', '', 'E 5019 JZ', 'Sikver'),
(64, 'honda vario', 'metic', '', 'E 5521 ju', 'merah'),
(65, 'honda', 'metic', '', 'E6423IB', 'hitam'),
(66, 'honda', 'matic', '', 'E 3031 HAC ', 'hitam'),
(67, 'Honda ', 'matic ', '', 'E4964JU', 'hitam '),
(68, 'YAMAHA ', 'LEXI', '', 'E 4970 HJ', 'HITAM'),
(69, 'Honda beat', 'matic', '', 'B 3686 KWE', 'merah putih'),
(70, 'honda', 'manual', '', 'E 2818 IQ', 'hitam merah'),
(71, 'HONDA BEAT', 'metic', '1', 'B 6407 VKS', 'putih biru'),
(72, 'honda', 'vario 125', '', 'B 3203_TSZ', 'biru putih'),
(73, 'Beat', 'Matic', '1', 'E 4959 JA', 'Hitam'),
(102, 'Honda Beat Street', 'Matic', '', 'E 5258 OO', 'Hitam'),
(74, 'Honda PCX 160', 'matic', '', 'E 5021 OZ', 'merah'),
(75, 'Honda', 'matic', '', 'E 2838 HJ', 'hitam'),
(76, 'honda', 'matic', '', 'E 5438 IZ', 'putih biru'),
(77, 'honda', 'metik', '', ' E 2887 JM', 'putih'),
(78, 'honda', 'matic', '', 'E 2469 HAC', 'hitam'),
(79, 'Honda ', 'matic', '', 'E6524JE', 'merah'),
(80, 'Honda', 'matic', '', 'E 5158 OO', 'Silver'),
(81, 'YAMAHA', 'metic', '', 'E 5028 PAR', 'silver hitam'),
(82, 'Yamaha ', 'asepguntoro78@gmail.', '', 'asepguntoro78@gmail.com', 'asepguntoro78@gmail.com'),
(83, 'HONDA', 'BEAT', '', ' E 5360 I', 'hitam'),
(84, 'HONDA', 'Manual', '', 'E 6510 HI', 'Hitam'),
(85, 'honda', 'matic', '', 'E 2257 JN', 'merah'),
(86, 'Yamaha ', 'Nmax', '', 'E 4955 00', 'biru tua'),
(87, 'honda', 'bebek', '', 'E 3176 IU', 'hitam'),
(88, 'honda', 'matic', '', 'b4424kti', 'hitam'),
(89, 'beat', 'matic', '', 'E 3141 IG', 'BLUE'),
(90, 'Honda', 'Matic', '', 'E 4112 BF', 'Hitam'),
(91, 'yamaha soul 125', 'matic', '', 'E 2569 IZ', 'putih'),
(92, 'Honda', 'Matic', '', 'B 123 CVC', 'Merah'),
(93, 'test', 'test', '', 'test', 'test'),
(94, 'test', 'test', '', 'test', 'test'),
(95, 'test', 'test', '', 'test', 'test'),
(96, 'test', 'test', '', 'test', 'test'),
(97, 'test', 'test', '', 'test', 'test'),
(98, 'test', 'test', '', 'test', 'test'),
(99, 'Mio m3', 'Syach Berry Erlangga', '', 'Syach Berry Erlangga ', 'Syach Berry Erlangga '),
(100, 'Honda ', 'hanifzahra84@gmail.c', '', 'hanifzahra84@gmail.com', 'hanifzahra84@gmail.com'),
(101, 'test', 'test', '', 'test', 'test'),
(103, 'Yamaha', 'GT125', '', 'E 4084 B0', 'putih'),
(104, 'yamaha', 'matic', '', 'E 4542 CA', 'hitam'),
(105, 'Yamaha', 'Bebek', '', 'E 5660 LU', 'Putih'),
(106, 'mio ', 'matic', '', 'E 5648 CT', 'Hitam'),
(107, 'yamaha', 'matic', '', 'E 2165 DQ', 'hijau'),
(108, 'honda', 'saefulslamet44@gmail', '', 'saefulslamet44@gmail.com', 'saefulslamet44@gmail.com'),
(109, 'honda', 'matic', '', 'E 5167 TN', 'putih'),
(110, 'yamaha', 'matic', '', 'e2265cd', 'putih'),
(111, 'honda 2016', 'muhamadakbarfebrian', '', 'muhamadakbarfebrian', 'muhamadakbarfebrian'),
(112, 'Honda', 'Matic', '', 'E 4112 BF', 'Hitam'),
(113, 'honda', 'matic', '1', 'E 3632 DO', 'putih'),
(114, 'motor revo fit ', 'gigi', '', 'E 2480', 'hitam'),
(115, 'Honda', 'Matic', '', 'E 5855 BK', 'Merah'),
(116, 'honda vario', 'matic', '', 'E 2254 BP', 'Merah'),
(117, 'Yamaha ', 'matict', '', 'E 5888 HD', 'merah hitam'),
(118, 'honda ', 'laeliyahyesi@gmail.c', '', 'laeliyahyesi@gmail.com', 'laeliyahyesi@gmail.com'),
(119, 'Wuling', 'Matic', '', 'E 1207 LK', 'Merah'),
(120, 'HONDA', 'SCOPY', '', 'DE 2282 DF', 'MERAH'),
(121, 'HONDA BEAT', 'matic', '', 'E4702BI', 'BIRU'),
(122, 'Yamaha', 'Vino', '', 'DE 2888 XX', 'Hijau Metalik'),
(123, 'Vixion ', 'vixion', '', 'f4231ms', 'hitam'),
(124, 'suzuki', 'manual', '', 'E 3655 IV', 'Hitam'),
(125, 'NMAX ', 'Matic', '', 'E5246JF', 'merah'),
(126, 'honda beat', 'Matic', '1', 'E 2695 DF', 'Hitam'),
(172, 'Suzuki Titan', 'swarnadwipa.go@gmail', '', 'swarnadwipa.go@gmail.com', 'swarnadwipa.go@gmail.com'),
(127, 'Honda', 'Matic', '', 'H 2018 IS', 'biru'),
(128, 'Mio Fino ', 'nurchfino@gmail.com', '', 'nurchfino@gmail.com', 'nurchfino@gmail.com'),
(129, 'Vario', 'matic', '', 'H 3855 A', 'putih'),
(130, 'Honda', 'agungwaluyo166@gmail', '', 'agungwaluyo166@gmail.com', 'agungwaluyo166@gmail.com'),
(131, 'yamaha', 'mio', '', 'DE 2015 NJ', 'Abu-Abu'),
(132, 'Yamaha', 'Matic', '', 'E 5402 DJ', 'Hijau'),
(133, 'honda', 'supra', '', 'H 2460 CP', 'hitam'),
(134, 'Honda ', 'matic', '', 'E 2909 BE', 'hitam'),
(135, 'beat', 'haririhasan957@gmail', '', 'haririhasan957@gmail.com', 'haririhasan957@gmail.com'),
(136, 'yamaha', 'matic', '', 'E 6010 BM', 'hitam'),
(137, 'Honda Vario matic', 'matic', '', 'E 2035 IK', 'putih'),
(138, 'Datsun', 'Manual', '', 'E 1509 RE', 'ABU ABU'),
(139, 'Honda', 'Matic', '', 'E 3253 CZ', 'Hitam'),
(140, 'Honda', 'Matic', '', 'E 5715 IC', 'Hitam'),
(141, 'Yamaha', 'Matic', '', 'E 5398 IO', 'Putih'),
(142, 'Honda', 'Matic', '', 'E 5715 IC', 'Hitam'),
(143, 'Datsun', 'Manual', '', 'E 15O9 RE', 'Abu abu'),
(144, 'Honda Vario', 'matic', '', 'E 3228 CG', 'Putih'),
(145, 'honda', 'matic', '', 'E 5218 CH', 'hitam'),
(146, 'Honda', 'Matic', '1', 'E 3952 DO', 'Merah'),
(173, 'honda', 'matic', '', 'E 3731 CI', 'putih'),
(147, 'Honda', 'Matic', '1', 'E 4588 IP', 'Putih biru'),
(148, 'Yamaha', 'Matic', '', 'E 4791 DD', 'Merah'),
(149, 'scoopy', 'matic', '', 'H 4667 WS', 'putih'),
(150, 'daihatsu ', 'manual', '', 'E1132LS', 'merah solid'),
(151, 'Honda beat', 'matic', '', 'E 2283 BP', 'hitam'),
(152, 'HONDA', 'saputraandrian44@gma', '', 'saputraandrian44@gmail.com', 'saputraandrian44@gmail.com'),
(153, 'honda', 'matic', '', 'E 5287 DT', 'hijau'),
(154, 'honda', 'matic', '', 'E 2830 BT', 'putih merah'),
(155, 'honda', 'matic', '', 'E 4915 BI', 'putih hitam'),
(156, 'Honda', 'Matic', '', 'E3310YBF', 'Silver'),
(157, 'honda', 'matic', '', 'E 5729 DD', 'hitam'),
(158, 'yamaha', 'matic', '', 'E 5016 DJ', 'hitam'),
(159, 'honda', 'matic', '', 'E 3731 CI', 'putih'),
(160, 'Honda', 'matic', '', 'E 5218 CH', 'Hitam'),
(161, 'Honda', 'matic', '', 'E 5218 CH', 'Hitam'),
(162, 'yamaha', 'matic', '', 'E 5016 DJ', 'abu-abu'),
(163, 'yamaha', 'matic', '', 'E 5016 DJ', 'abu-abu'),
(164, 'Yamaha', 'Matic', '', 'E 6037 XR', 'Hitam'),
(165, 'Honda', 'matic', '', 'E 5218 CH', 'Hitam'),
(166, 'honda suprax125', 'manual', '', 'Z2083UF', 'hitam'),
(167, 'HONDA', 'METIC', '', 'E 5348 BP', 'Rina Nurjanah'),
(168, 'honda', 'vario 125 matic', '', 'E4588IP', 'white blue'),
(169, 'Honda', 'Matic', '', 'E 2091 BR', 'Merah'),
(170, 'honda', 'matic', '', 'E 3541 CV', 'hitam'),
(171, 'Honda Vario', 'Matic', '1', 'E 4547 DT', 'Hitam'),
(174, 'Yamaha Mio gear 125', 'koesdinar75@gmail.co', '', 'koesdinar75@gmail.com', 'koesdinar75@gmail.com'),
(175, 'Yamaha', 'Matic', '', 'E 3208 ER', 'Hitam'),
(176, 'honda', 'matic', '', 'E 2204DS', 'hitam'),
(177, 'aerox new abs', 'matic', '', 'E 5453 DQ', 'hita'),
(178, 'Honda Beat Street Ta', 'alfarizisaputra21@gm', '', 'alfarizisaputra21@gmail.com', 'alfarizisaputra21@gmail.com'),
(179, 'Yamaha', 'Matic', '', 'E 6168 BQ', 'Hitam'),
(180, 'Motor Beat ', 'Motor Best', '', 'E 6916 HAB', 'Biru-Hitam'),
(181, 'HONDA ', 'MATIC', '', 'E 1328 LK', 'HITAM'),
(182, 'yamaha', 'smio', '', 'b 1234', 'hitam'),
(183, 'Toyota', 'yaris', '', 'B 123 SL', 'hitam'),
(184, 'Nissan Juke', 'Matic', '', 'H 8552 HF', 'grey metalic'),
(185, 'Toyota', 'Manual', '', 'E 1076 RE', 'Hitam'),
(186, 'Honda', 'Matic', '', 'E 5402 DJ', 'Hitam'),
(187, 'Honda', 'Matic', '', 'E 5529 DJ', 'Hitam'),
(188, 'yamaha', 'kopling', '', 'E 2555 AU', 'merah marun'),
(189, 'vario', 'matic', '', 'E 2937 jw', 'hitam'),
(190, 'honda', 'matic', '', 'E5575IN', 'Hitam'),
(191, 'Honda', 'Bebek', '', 'E 2483 CG', 'Hitam'),
(192, 'mio m3', 'matik', '', 'E.2630CU', 'merah'),
(193, 'YAMAHA ', 'JUPITER MX', '', 'H 2091 PN', 'BIRU'),
(194, 'honda', 'matic', '', 'E 3044 DK', 'hitam merah'),
(195, 'Honda', 'Matic', '', 'E 4059 BZ', 'Merah'),
(196, 'yamaha', 'matic', '', 'E 4881 KT', 'biru'),
(197, 'Honda Vario 150', 'matic', '', 'E 4679 ON', 'abu abu'),
(198, 'honda scopy', 'metic', '', 'E3913PAS', 'putih hitam'),
(199, 'Toyota', 'manual', '', 'E1068PZ', 'Putih'),
(200, 'toyota', 'manual', '', 'B 1583 DKN', 'silver'),
(201, 'Yamaha Mio 3M', 'Matic', '', 'BE 2936 ABP', 'Hitam'),
(202, 'suzuki', 'matic', '', 'E 5138 BZ', 'putih'),
(203, 'honda', 'matic', '', 'E 5722 AY', 'hitam'),
(204, 'honda', 'matic', '', 'E 6410 BP', 'hitam'),
(205, 'Toyota rush', 'Manual', '', 'B1583DKN', 'Silver '),
(206, 'Honda', 'Matic', '1', 'E   1   CRB', 'Putih'),
(207, 'Honda Scoopy', 'matic', '', 'B 4363 SHY', 'coklat hitam'),
(208, 'honda', 'matic', '1', 'E 5562 AT', 'hitam'),
(209, 'honda', 'matic', '', 'E 2403 CI', 'putih'),
(210, 'suzuki', 'matic', '', 'E 3785 DT', 'merah'),
(211, 'Toyota Avanza', 'Manual', '1', 'E 1822 RR', 'Putih'),
(217, 'vario', 'matic', '', 'E 3724 TX', 'biru'),
(212, 'Daihatsu Terios', 'Manual', '', 'E 1598 RB', 'Hitam'),
(213, 'toyota agya', 'manual', '', 'E1709RZ', 'kuning'),
(214, 'honda', 'matic', '', 'E 6595 PBH', 'hitam'),
(215, 'Toyota calya', 'Manual', '1', 'E 1190 RI', 'Putih'),
(218, 'Honda Brio', 'manual', '', 'E 1360 SE', 'merah'),
(216, 'Toyota Calya', 'manual', '', 'Z 1215 YJ', 'Abu Abu'),
(219, 'toyota', 'manual', '', 'E1610SI', 'putih'),
(220, 'Toyota Avanza ', 'manual', '', 'E 1463 RR', 'silver'),
(221, 'Dahiatsu', 'manual', '', 'E 1014 RN', 'Silver'),
(222, 'honda', 'matic', '', 'e4431pbf', 'merah'),
(223, 'vario', 'matic', '', 'E 3724 TX', 'biru'),
(224, 'Xenia', 'manual', '', 'E1499RD', 'putih'),
(225, 'yamaha mio', 'matic', '', 'E3842PBQ', 'merah hitam'),
(226, 'toyota avanza', 'manual', '', 'E 1276 SF', 'putih'),
(227, 'honda', 'manual', '', 'E6598 PBV', 'putih biru'),
(228, 'Toyota', 'manual', '', 'E1833RX', 'Putih'),
(229, 'Honda', 'metic', '', 'E 3101 PAV', 'putih'),
(230, 'VELOZ', 'manual', '', 'E1262SI', 'putih'),
(231, 'honda brio E', 'manual', '', 'E 1403 RX', 'kuning '),
(232, 'daihatsu sigra', 'manual', '', 'E 1677 RR', 'putih'),
(233, 'honda', 'manual', '', 'E 1652 RX', 'putih'),
(234, 'toyota', 'manual', '', 'E 1205 SF', 'putih'),
(235, 'toyota', 'manual', '', 'E 1189 SE', 'hitam'),
(236, 'daihatsu', 'manual', '', 'B 2448 TZV', 'merah'),
(237, 'Honda Brio ', 'metic', '', 'E 1770 SH', 'abu baja metalik '),
(238, 'honda', 'matic', '', 'E 4157 JR', 'hitam'),
(239, 'honda', 'matic', '', 'E 3770 NN', 'hitam'),
(240, 'honda', 'manual', '', 'E 3964 BY', 'hitam'),
(241, 'Honda Beat', '2019 Matic', '', 'E5423CQ', 'hitam'),
(242, 'Toyota rush ', 'matic', '', 'B1583DKN', 'silver'),
(243, 'honda scoopy', 'matic', '', 'B4363SHY', 'coklat hitam'),
(244, 'beat th 2019', 'matic', '', 'E5754CT', 'merah hitam'),
(245, 'Suzuki Karimun wagon', 'Manual', '', 'B 1712 SIF', 'Hitam'),
(246, 'honda', 'matic', '', 'E 2722 BZ', 'hitam'),
(247, 'kawasaki', 'manual', '', 'E 4915 YN', 'hitam'),
(248, 'honda', 'matic', '', 'E 6865 HK', 'hitam'),
(249, 'yamaha', 'matic', '', 'E 4721 CT', 'hitam'),
(250, 'honda', 'matic', '', 'E 5167 TN', 'hitam'),
(251, 'Toyota', 'Manual', '', 'E 1752 RV', 'Silver Metalic'),
(252, 'YAMAYA GEAR', 'MATIC', '', 'E 5614 PCL', 'HIJAU'),
(253, 'YAMAHA', 'matic', '', 'E 5770 jj', 'putih'),
(254, 'Honda', 'supra x 125', '1', 'E 6524 BC', 'Hitam'),
(255, 'honda', 'manual', '', 'E 5794 AS', 'putih'),
(256, 'yamaha', 'matic', '', 'E 3796 HW', 'putih'),
(257, 'Yamaha', 'Matic', '', 'E 3851 DF', 'Hijau'),
(258, 'honda', 'matic', '', 'E 3831 HD', 'merah'),
(259, 'yamaha', 'manual', '', 'E 2399 NL', 'putih'),
(260, 'Yamaha Mio', 'Matic', '', 'BE 4203 BI', 'Hitam'),
(261, 'Daihatsu', 'Manual', '', 'BE 1663 AMN', 'Coklat'),
(262, 'vario', 'matic', '', 'BE 2382 AFV', 'abu abu'),
(263, 'suzuki', 'manual', '', 'E 3533 KJ', 'biru'),
(264, 'Yamaha aerox 165 cc', 'matic ', '', 'e3547pbh', 'abu abu hitam'),
(265, 'yamaha', 'vixion', '', 'E 4214 PBL', 'merah '),
(266, 'daihatsu sigra', 'matic', '', 'b1733rol', 'putih'),
(267, 'daihatsu', 'manual', '', 'B1610HFS', 'hitam'),
(268, 'Honda', 'bebek', '', 'B 5895 TPJ', 'item'),
(269, 'honda', 'matic', '', 'E 4358 IN', 'hitam'),
(270, 'yamaha ', 'vixion', '', 'E4214PBL', 'Merah'),
(271, 'Daihatsu Sigra', 'manual', '', 'B 2912 FKR', 'Putih'),
(272, 'yamaha', 'matic', '', 'E 5715 DJ', 'biru'),
(273, 'honda', 'matic', '', 'E 4356 IN', 'hitam'),
(274, 'yamaha', 'matic', '', 'E 2219  PAT', 'merah'),
(275, 'honda', 'matic', '', 'E 2283 BP', 'hitam'),
(276, 'honda', 'matic', '', 'E 4175 DQ', 'hitam'),
(277, 'honda', 'matic', '', 'E 6062 NP', 'putih biru'),
(278, 'Honda ', 'matic', '', 'E 4768 XX', 'hitam'),
(279, 'honda', 'bebek', '', 'bg 4221 is', 'oren hitam'),
(280, 'honda vario 110', 'matic', '', 'E 6698 BH', 'merah'),
(281, 'honda', 'manual', '', 'E 6623 az', 'hitam'),
(282, 'nmax merah', 'suyoto160716@gmail.c', '', 'suyoto160716@gmail.com', 'suyoto160716@gmail.com'),
(283, 'YAMAHA', 'METICK', '', 'B 3686 KRH', 'HITAM'),
(284, 'honda', 'bebek', '', 'd 2807 ij', 'hitam orange'),
(285, 'xenia ', 'azizahaprilia123@gma', '', 'azizahaprilia123@gmail.com', 'azizahaprilia123@gmail.com'),
(286, 'Jupiter Z', 'Yamaha', '', 'B 6777 EAG', 'HITAM'),
(287, 'N MAX', '2022', '', 'F 6500 FHV', 'Hitam'),
(288, 'Honda', '20002', '', 'F3490NB', 'silver'),
(289, 'honda', 'matic', '', 'B 5784 KBU', 'silver hitam'),
(290, 'Yamaha Mio Gear', 'Matic', '', 'A3819DZ', 'Hitam'),
(291, 'Honda', 'Matic', '', 'Z6586EY', 'Hitam'),
(292, 'Daihatsu Ayla X 1.0', 'Manual', '', 'D1868UAX', 'Abu Metalik'),
(293, 'Honda Vario 125 Tehn', 'Matic', '', 'B4878FHM', 'Hitam'),
(294, 'Honda Vario 125', 'Matic', '', 'B4878FHM', 'Hitam'),
(295, 'toyota calya', 'dinawarsita28@gmail.', '', 'dinawarsita28@gmail.com', 'dinawarsita28@gmail.com'),
(296, 'Honda Vario 125', 'parlinhutajulu1964@g', '', 'parlinhutajulu1964@gmail.com', 'parlinhutajulu1964@gmail.com'),
(297, 'honda', 'bebek', '', 'D6053XGI', 'hitam'),
(298, 'yamaha gear ', 'matic', '', 'B3150UZS', 'hitam'),
(299, 'Honda ', 'metic', '', 'E 6838 OO', 'hitam'),
(300, 'Honda HRV', 'metic', '', 'B 1757 ERU', 'Hitam'),
(301, 'Yamaha', 'Matic', '', 'B3770PUP', 'Putih'),
(302, 'Honda', 'matic', '', 'B4807sjy', 'merah'),
(303, 'honda beat stret', 'matic', '', 'F6888FIG', 'hitam'),
(304, 'Yamaha N Max ', 'Matic', '', 'B4853STO', 'abus abu'),
(305, 'vario', 'matic', '', 'B 4469 FBH', 'hitam'),
(306, 'Yamaha Fino 125', 'matic', '', 'B 4285 SCA', 'abu abu'),
(307, 'Suzuki ', 'matic', '', 'f4277zx', 'hitam'),
(308, 'calya', 'manual', '', 'b 1473 dol', 'silver'),
(309, 'yamaha', 'mio', '', 'B 3951 FDS', 'biru'),
(310, 'HONDA BAET ', 'MATIC', '', 'D 3741 KY', 'PUTIH'),
(311, 'HONDA', 'MATIC', '1', 'B 3222 TVC', 'MERAH'),
(312, 'toyota', 'matic', '', 'B 1111 V', 'Putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kodepromo`
--

CREATE TABLE `kodepromo` (
  `id_promo` int(11) NOT NULL,
  `nama_promo` varchar(250) NOT NULL,
  `kode_promo` varchar(250) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal_promo` varchar(500) NOT NULL,
  `minimal` varchar(250) NOT NULL DEFAULT '0',
  `type_promo` varchar(250) NOT NULL,
  `expired` varchar(250) NOT NULL,
  `fitur` varchar(250) NOT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `image_promo` varchar(500) NOT NULL,
  `jenis` varchar(255) DEFAULT 'semua',
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kodepromo`
--

INSERT INTO `kodepromo` (`id_promo`, `nama_promo`, `kode_promo`, `keterangan`, `nominal_promo`, `minimal`, `type_promo`, `expired`, `fitur`, `id_user`, `image_promo`, `jenis`, `status`) VALUES
(3, 'Gratis Ongkir Seribu', 'DISC1RB', 'Diskon Ongkir Rp1000', '1000', '5000', 'fix', '2024-02-28', '1', NULL, 'aa453fd40b9dcded2bf08f5a71669eb8.jpg', 'semua', '1'),
(4, 'Diskon 1RB', 'OJEK1RB', 'Diskon Ojek Rp1000', '1000', '10000', 'fix', '2023-06-30', '1', NULL, 'dda40071fc53b697fdf91a16cd885a66.jpg', 'saldo', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
--

CREATE TABLE `komisi` (
  `id` int(11) NOT NULL,
  `id_driver` varchar(255) DEFAULT NULL,
  `komisi` varchar(255) DEFAULT '0',
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `no` int(11) NOT NULL,
  `id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_bank`
--

CREATE TABLE `list_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(250) NOT NULL,
  `image_bank` varchar(250) NOT NULL,
  `rekening_bank` varchar(250) NOT NULL,
  `status_bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `list_bank`
--

INSERT INTO `list_bank` (`id_bank`, `nama_bank`, `image_bank`, `rekening_bank`, `status_bank`) VALUES
(1, 'VA BRI', 'aa485e1e12e0e8115291451518735f30.png', '13281231669952242', '0'),
(2, 'VA MANDIRI', 'c4c8aeccf92f3837251193ffa8723822.png', '886082316609952242', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pelanggan`
--

CREATE TABLE `lokasi_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `utama` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchant`
--

CREATE TABLE `merchant` (
  `id_merchant` varchar(250) NOT NULL,
  `id_fitur` varchar(100) NOT NULL,
  `nama_merchant` varchar(250) NOT NULL,
  `alamat_merchant` varchar(250) NOT NULL,
  `latitude_merchant` varchar(250) NOT NULL,
  `longitude_merchant` varchar(250) NOT NULL,
  `jam_buka` varchar(250) NOT NULL,
  `jam_tutup` varchar(250) NOT NULL,
  `category_merchant` varchar(100) NOT NULL,
  `foto_merchant` varchar(250) NOT NULL,
  `telepon_merchant` varchar(250) NOT NULL,
  `deskripsi_merchant` text NOT NULL,
  `phone_merchant` varchar(250) NOT NULL,
  `country_code_merchant` varchar(20) NOT NULL,
  `status_merchant` varchar(250) NOT NULL,
  `open_merchant` varchar(20) NOT NULL,
  `token_merchant` varchar(500) DEFAULT '1234',
  `ostoken` varchar(255) DEFAULT '1234'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `midtrans`
--

CREATE TABLE `midtrans` (
  `no` int(10) UNSIGNED NOT NULL,
  `id` varchar(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `rek` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` varchar(200) NOT NULL,
  `nama_mitra` varchar(250) NOT NULL,
  `jenis_identitas_mitra` varchar(250) NOT NULL,
  `nomor_identitas_mitra` varchar(250) NOT NULL,
  `alamat_mitra` varchar(250) NOT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `email_mitra` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `telepon_mitra` varchar(250) NOT NULL,
  `phone_mitra` varchar(250) NOT NULL,
  `country_code_mitra` varchar(250) NOT NULL,
  `id_merchant` varchar(250) NOT NULL,
  `partner` varchar(250) NOT NULL,
  `status_mitra` varchar(10) NOT NULL,
  `created_mitra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notice`
--

CREATE TABLE `notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `ikon` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `keterangan`, `harga`, `ikon`, `status`) VALUES
(3, 'Lainnya', 'Kirim Paket Dengan Ukuran Tidak Lebih Dari 2kg Yaah', '2500', 'b3df4a5e87457a326629154b9cdbcb3c.png', '1'),
(4, 'Dokumen', 'Tidak Menerima Surat Tanah / Rumah', '5000', 'fc3f5e40218a8904b29283df18bb0de8.png', '1'),
(6, 'Elektronik', 'Pastikan Bisa Di Angkut Oleh Kendaraan Roda dua yah', '8500', '72b8dad0f9c0c1784b7568730aa998ad.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payusettings`
--

CREATE TABLE `payusettings` (
  `id` int(11) NOT NULL,
  `payu_key` varchar(250) NOT NULL,
  `payu_id` varchar(250) NOT NULL,
  `payu_salt` varchar(250) NOT NULL,
  `payu_debug` varchar(250) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(200) NOT NULL,
  `fullnama` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `countrycode` varchar(20) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(255) DEFAULT 'Laki-Laki',
  `kota` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `rating_pelanggan` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` varchar(250) DEFAULT '1234',
  `fotopelanggan` varchar(500) NOT NULL,
  `response` varchar(255) DEFAULT '0',
  `refferal` varchar(255) DEFAULT NULL,
  `ostoken` varchar(255) DEFAULT '12345'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `fullnama`, `email`, `no_telepon`, `countrycode`, `phone`, `password`, `created_on`, `jenis`, `kota`, `tgl_lahir`, `rating_pelanggan`, `status`, `token`, `fotopelanggan`, `response`, `refferal`, `ostoken`) VALUES
('P72952', 'test', 'tests@gmail.com', '62895326129562', '+62', '895326129562', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2024-02-24 10:20:37', 'Laki-Laki', 'DKI Jakarta', '2024-02-24', 0, 1, 'd2OEatWFTWafNriXK1gfZ2:APA91bHTo5aJm2gSMsGCvV1UwBtVQS7Tlu2xdwtTPj8U_VMkv7OBE-RQrudXccHU-hSqvdExD90TeB421Pwh2UnSvodHm-QIzY-oOFWBVQiSgjq4GdUij6K5NB4RNbzEBOqByiYJ9HAU', '1708770037-88263.jpg', '0', 'B2I01', '55c31e3d-614a-4383-ae0d-f2ed792576f4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `poin` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `image_poin` varchar(255) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`id`, `kode`, `nama`, `poin`, `keterangan`, `nilai`, `tipe`, `image_poin`, `expire`, `status`) VALUES
(2, 'PN1000', 'Reward Rp1rb', '10', 'Tukarkan Poin 1000', '1000', '1', '005a76de9dc025bf8edd52d3d9fe9ef4.png', '2023-12-31', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE `point` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_user` varchar(200) NOT NULL DEFAULT '0',
  `point` varchar(200) DEFAULT '0',
  `tipe` varchar(200) NOT NULL,
  `reward` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `kode` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppob_filter`
--

CREATE TABLE `ppob_filter` (
  `id` int(11) NOT NULL,
  `filter` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppob_group`
--

CREATE TABLE `ppob_group` (
  `id` int(11) NOT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ppob_group`
--

INSERT INTO `ppob_group` (`id`, `produk`, `kode`, `type`, `icon`, `banner`) VALUES
(1, 'PLN PASCA', 'PLN PASCABAYAR', '1', 'pln.png', '25d39e778834c901495414e6b26fcdc1.png'),
(2, 'PDAM', 'PDAM', '1', 'pdam.png', '25d39e778834c901495414e6b26fcdc1.png'),
(3, 'INTERNET', 'INTERNET PASCABAYAR', '1', 'internet.png', '25d39e778834c901495414e6b26fcdc1.png'),
(4, 'BPJS', 'BPJS KESEHATAN', '1', 'bpjs.png', '25d39e778834c901495414e6b26fcdc1.png'),
(5, 'MULTIFINANCE', 'MULTIFINANCE', '1', 'bill.png', '25d39e778834c901495414e6b26fcdc1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppob_produk`
--

CREATE TABLE `ppob_produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT '0',
  `admin` varchar(255) DEFAULT '0',
  `groupid` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ppob_produk`
--

INSERT INTO `ppob_produk` (`id`, `kode`, `produk`, `keterangan`, `harga`, `admin`, `groupid`, `status`) VALUES
(1, 'plnpasca', 'Pln Pascabayar', 'Keterangan Produk PLN', '0', '2500', '1', '1'),
(2, 'PDAMBDG', 'PDAM Kabupaten Bandung', 'Keterangan Produk PDAM', '0', '2500', '2', '1'),
(3, 'PDAMCRB', 'PDAM Kabupaten Cirebon', 'Keterangan Produk PDAM', '0', '2500', '2', '1'),
(4, 'SPEEDY', 'SPEEDY & INDIHOME', 'Keterangan Produk Internet', '0', '2500', '3', '1'),
(5, 'BPJS', 'Bpjs Kesehatan', 'Keterangan Produk Bpjs', '0', '2500', '4', '1'),
(6, 'ADIRA', 'ADIRA Finance', 'ADIRA Finance', '0', '3475', '5', '1'),
(7, 'WOMFINANCE', 'WOMFINANCE', 'WOMFINANCE', '0', '475', '5', '1'),
(8, 'BAF', 'BAF Finance', 'BAF Finance', '0', '3000', '5', '1'),
(9, 'CLIPAN', 'Clipan Finance\r\n', 'Clipan Finance', '0', '2500', '5', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppob_type`
--

CREATE TABLE `ppob_type` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT 'Prabayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ppob_type`
--

INSERT INTO `ppob_type` (`id`, `nama`, `tipe`) VALUES
(1, 'Tagihan', 'Pascabayar'),
(2, 'Transfer', 'Pascabayar'),
(3, 'Prabayar', 'Prabayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promosi`
--

CREATE TABLE `promosi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_berakhir` date NOT NULL,
  `fitur_promosi` int(11) NOT NULL,
  `link_promosi` varchar(500) DEFAULT NULL,
  `type_promosi` varchar(250) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `is_show` varchar(3) NOT NULL,
  `jenis` varchar(255) DEFAULT 'semua',
  `lokasi` varchar(255) DEFAULT 'all',
  `action` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `promosi`
--

INSERT INTO `promosi` (`id`, `tanggal_dibuat`, `tanggal_berakhir`, `fitur_promosi`, `link_promosi`, `type_promosi`, `foto`, `is_show`, `jenis`, `lokasi`, `action`) VALUES
(13, '2024-02-26 10:39:12', '2024-12-18', 0, 'https://velotiket.com/wahanamulyatiket', 'link', 'f69361a79a0742fd92aaeb8f9627e4a9.png', '1', 'semua', 'All', 0),
(12, '2024-02-26 10:38:11', '2024-11-13', 0, 'https://velotiket.com/wahanamulyatiket', 'link', '2053cda0bcbebfa930ae1555e713f6ca.png', '1', 'semua', 'All', 0),
(10, '2024-02-24 10:53:02', '2024-03-09', 0, 'https://velotiket.com/wahanamulyatiket', 'link', 'e0e7fd29077766e97084610a56a138fd.jpg', '1', 'semua', 'all', 0),
(14, '2024-02-26 10:39:41', '2024-12-11', 0, 'https://velotiket.com/wahanamulyatiket', 'link', '06cbf79bf31f8e52ff7913f610ca29c2.png', '1', 'semua', 'All', 0),
(15, '2024-02-26 10:40:05', '2024-11-14', 0, 'https://velotiket.com/wahanamulyatiket', 'link', 'beb5931be0bad12cda36e6639237d506.png', '1', 'semua', 'All', 0),
(16, '2024-02-26 10:41:17', '2024-12-11', 0, 'https://velotiket.com/wahanamulyatiket', 'link', '8e96cec46042595e0d55b3e73a4e666e.png', '1', 'semua', 'All', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_driver`
--

CREATE TABLE `rating_driver` (
  `nomor` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` varchar(200) NOT NULL,
  `id_driver` varchar(200) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `catatan` varchar(200) DEFAULT 'Good job',
  `rating` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `rating_driver`
--

INSERT INTO `rating_driver` (`nomor`, `id_pelanggan`, `id_driver`, `id_transaksi`, `catatan`, `rating`, `update_at`) VALUES
(1, 'P1946144648', 'D1697701004', 28299, 'Good job', 5, '2023-10-19 19:30:14'),
(2, 'P1946144648', 'D1697701004', 20088, 'Good job', 5, '2023-10-21 18:21:52'),
(3, 'P1946144648', 'D1697701004', 18313, 'Good job', 5, '2023-10-21 18:22:53'),
(4, 'P1946144648', 'D1697701004', 26493, 'Good job', 5, '2023-10-31 14:09:56'),
(5, 'P1946144648', 'D1697701004', 12821, 'Good job', 5, '2023-11-01 11:12:53'),
(6, 'P1946144648', 'D1697701004', 14089, 'Good job', 5, '2023-11-07 04:20:50'),
(7, 'P1946144648', 'D1697701004', 18235, 'Good job', 5, '2023-11-07 04:22:35'),
(8, 'P25059', 'D1697701004', 11041, 'Good job', 5, '2023-12-20 02:54:15'),
(9, 'P25059', 'D1697701004', 29296, 'Good job', 5, '2023-12-31 15:49:32'),
(10, 'P25059', 'D1697701004', 11774, 'Good job', 5, '2024-01-01 21:12:42'),
(11, 'P25059', 'D1697701004', 17235, 'Good job', 5, '2024-01-03 12:27:05'),
(12, 'P25059', 'D1697701004', 18719, 'Good job', 5, '2024-01-03 14:02:32'),
(13, 'P25059', 'D1697701004', 22279, 'Good job', 5, '2024-01-04 15:31:54'),
(14, 'P25059', 'D1697701004', 15307, 'Good job', 5, '2024-01-04 17:46:14'),
(15, 'P25059', 'D1697701004', 22370, 'Good job', 5, '2024-01-04 18:47:43'),
(16, 'P25059', 'D1697701004', 17935, 'Good job', 5, '2024-01-04 18:56:31'),
(17, 'P25059', 'D1697701004', 29668, 'Good job', 5, '2024-01-04 18:57:28'),
(18, 'P25059', 'D1697701004', 11905, 'Good job', 5, '2024-01-04 18:58:47'),
(19, 'P25059', 'D1697701004', 27166, 'Good job', 5, '2024-01-04 19:03:37'),
(20, 'P25059', 'D1697701004', 27400, 'Good job', 5, '2024-01-04 19:04:40'),
(21, 'P25059', 'D1697701004', 22031, 'Good job', 5, '2024-01-04 19:10:20'),
(22, 'P25059', 'D1697701004', 10291, 'Good job', 5, '2024-01-04 19:13:12'),
(23, 'P25059', 'D1697701004', 24631, 'Good job', 5, '2024-01-04 19:37:17'),
(24, 'P25059', 'D1697701004', 28087, 'Good job', 5, '2024-01-04 19:37:56'),
(25, 'P25059', 'D1697701004', 14580, 'Good job', 5, '2024-01-04 19:40:35'),
(26, 'P25059', 'D1697701004', 25316, 'Good job', 5, '2024-01-04 21:28:15'),
(75, 'P65337', 'D1701173796', 22989, 'Good job', 5, '2024-01-14 21:33:38'),
(74, 'P65337', 'D1701173796', 11078, 'Good job', 5, '2024-01-14 21:13:49'),
(73, 'P1701173177', 'D1701173796', 24836, 'Good job', 5, '2024-01-12 17:03:45'),
(72, 'P65023', 'D1701162781', 17836, 'Good job', 5, '2024-01-12 12:56:18'),
(71, 'P65337', 'D1701162781', 22993, 'Good job', 5, '2024-01-12 09:18:20'),
(68, 'P65337', 'D1701173796', 14077, 'Good job', 5, '2024-01-11 19:05:19'),
(67, 'P143920', 'D1702809158', 18478, 'Good job', 5, '2024-01-11 15:53:59'),
(66, 'P1701173177', 'D1701173796', 11381, 'Good job', 5, '2024-01-11 13:43:26'),
(65, 'P65023', 'D1701181780', 27115, 'Good job', 5, '2024-01-11 12:25:51'),
(38, 'P98042', 'D1700974029', 28249, 'Good job', 5, '2024-01-08 09:03:28'),
(69, 'P65337', 'D1701173796', 26256, 'Good job', 5, '2024-01-11 21:06:52'),
(63, 'P1701173177', 'D1701173796', 22817, 'Good job', 5, '2024-01-11 08:56:30'),
(62, 'P72850', 'D1701353940', 26205, 'Good job', 5, '2024-01-11 08:52:41'),
(61, 'P123756', 'D1701173796', 24084, 'Good job', 5, '2024-01-10 23:55:39'),
(60, 'P72850', 'D1702809158', 17931, 'Good job', 5, '2024-01-10 19:52:23'),
(59, 'P65023', 'D1701173796', 16570, 'Good job', 5, '2024-01-10 15:38:57'),
(46, 'P5281', 'D1695301140', 19425, 'Good job', 5, '2024-01-08 19:41:13'),
(47, 'P5281', 'D1695301140', 15152, 'Good job', 1, '2024-01-08 19:42:13'),
(48, 'P5281', 'D1695301140', 16870, 'Good job', 5, '2024-01-08 19:46:40'),
(49, 'P5281', 'D1695301140', 12619, 'Good job', 5, '2024-01-08 19:48:18'),
(50, 'P5281', 'D1695301140', 12805, 'Good job', 5, '2024-01-09 00:37:16'),
(70, 'P1701173177', 'D1701173796', 10017, 'Good job', 5, '2024-01-12 07:37:08'),
(53, 'P65023', 'D1701173796', 19042, 'Good job', 5, '2024-01-09 21:54:31'),
(54, 'P65337', 'D1701162781', 22053, '1000', 5, '2024-01-09 22:03:58'),
(56, 'P98110', 'D1700974029', 19669, 'Good job', 5, '2024-01-10 00:20:52'),
(76, 'P65337', 'D1701162781', 22711, 'Good job', 5, '2024-01-14 22:34:57'),
(77, 'P52011', 'D1703513848', 26261, 'Good job', 5, '2024-01-15 10:59:39'),
(78, 'P60316', 'D1702809158', 16012, 'Good job', 5, '2024-01-16 12:56:46'),
(79, 'P60316', 'D1702809158', 16338, 'Good job', 5, '2024-01-16 12:57:31'),
(80, 'P65337', 'D1701162781', 15623, 'Good job', 5, '2024-01-16 13:11:32'),
(81, 'P60316', 'D1702809158', 25845, 'Good job', 5, '2024-01-18 09:42:42'),
(82, 'P60316', 'D1702809158', 14329, 'Good job', 5, '2024-01-18 09:45:07'),
(83, 'P60316', 'D1702809158', 20607, 'Good job', 5, '2024-01-18 09:45:22'),
(84, 'P5281', 'D1705925332', 29658, 'Good job', 5, '2024-01-22 19:19:10'),
(85, 'P5281', 'D1705925332', 26983, 'Good job', 5, '2024-01-22 19:20:10'),
(86, 'P60316', 'D1702809158', 18761, 'Good job', 5, '2024-01-23 09:53:28'),
(87, 'P60316', 'D1702809158', 10744, 'Good job', 5, '2024-01-23 10:01:17'),
(88, 'P60316', 'D1702809158', 26288, 'Good job', 5, '2024-01-24 09:45:37'),
(89, 'P65023', 'D1701173796', 17627, 'Good job', 5, '2024-01-25 08:37:11'),
(90, 'P60316', 'D1702809158', 19159, 'Good job', 5, '2024-01-25 09:14:22'),
(91, 'P60316', 'D1702809158', 17872, 'Good job', 5, '2024-01-25 09:14:55'),
(92, 'P60316', 'D1702809158', 16620, 'Good job', 5, '2024-01-25 09:21:42'),
(93, 'P60316', 'D1702809158', 25461, 'Good job', 5, '2024-01-26 09:29:09'),
(94, 'P60316', 'D1702809158', 19567, 'Good job', 5, '2024-01-26 09:30:38'),
(95, 'P65337', 'D1702809158', 23217, 'Good job', 5, '2024-01-26 13:59:41'),
(96, 'P65337', 'D1702809158', 22210, 'Good job', 5, '2024-01-26 14:31:09'),
(97, 'P65337', 'D1701162781', 14237, 'Good job', 5, '2024-01-26 15:15:53'),
(98, 'P60316', 'D1701162781', 13837, 'Good job', 5, '2024-01-26 22:54:48'),
(99, 'P1701173177', 'D1701173796', 24188, 'Good job', 5, '2024-01-27 07:10:12'),
(100, 'P145145', 'D1701162781', 25925, 'Good job', 5, '2024-01-27 15:14:11'),
(101, 'P60316', 'D1702809158', 13915, 'Good job', 5, '2024-01-29 09:11:32'),
(102, 'P60316', 'D1702809158', 16783, 'Good job', 5, '2024-01-30 08:55:16'),
(103, 'P65610', 'D1700106662', 28530, 'Good job', 5, '2024-02-02 15:59:28'),
(104, 'P65337', 'D1701162781', 27984, 'Good job', 5, '2024-02-04 20:23:24'),
(105, 'P65610', 'D1700106662', 14908, 'Good job', 5, '2024-02-05 10:11:29'),
(106, 'P60316', 'D1702809158', 23996, 'Good job', 5, '2024-02-12 09:50:52'),
(107, 'P60316', 'D1702809158', 22497, 'Good job', 5, '2024-02-12 09:51:46'),
(108, 'P60316', 'D1702809158', 17781, 'Good job', 5, '2024-02-13 09:53:27'),
(109, 'P92316', 'D1700974029', 21776, 'Good job', 5, '2024-02-16 09:23:00'),
(110, 'P60316', 'D1702809158', 10877, 'Good job', 5, '2024-02-19 09:39:37'),
(111, 'P60316', 'D1702809158', 22159, 'Good job', 5, '2024-02-20 09:24:42'),
(112, 'P60316', 'D1702809158', 21612, 'Good job', 5, '2024-02-20 09:25:30'),
(113, 'P60316', 'D1702809158', 19891, 'Good job', 5, '2024-02-21 11:04:30'),
(114, 'P72952', 'D1708831070', 27860, 'Good job', 5, '2024-03-18 09:28:02'),
(115, 'P72952', 'D1708831070', 17962, 'Good job', 5, '2024-03-18 09:31:08'),
(116, 'P72952', 'D1708831070', 24559, 'Good job', 1, '2024-03-18 14:16:15'),
(117, 'P72952', 'D1708831070', 14016, 'Good job', 5, '2024-03-18 14:25:26'),
(118, 'P72952', 'D1708831070', 14157, 'Good job', 5, '2024-03-18 14:29:40'),
(119, 'P72952', 'D1708831070', 14365, 'Good job', 5, '2024-03-18 15:22:43'),
(120, 'P72952', 'D1708831070', 25220, 'Good job', 1, '2024-03-24 21:34:04'),
(121, 'P72952', 'D1708831070', 15044, 'Good job', 1, '2024-03-24 21:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `redeem`
--

CREATE TABLE `redeem` (
  `id` int(10) UNSIGNED NOT NULL,
  `iduser` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `poin` varchar(255) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `refferal`
--

CREATE TABLE `refferal` (
  `id` int(11) NOT NULL,
  `iduser` varchar(255) DEFAULT NULL,
  `idtujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kodeuser` varchar(255) DEFAULT NULL,
  `kodeaccept` varchar(255) DEFAULT NULL,
  `reward` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `refferal`
--

INSERT INTO `refferal` (`id`, `iduser`, `idtujuan`, `kodeuser`, `kodeaccept`, `reward`) VALUES
(1003, 'P195414', '0', '8YJ54', '5D3A8', '1'),
(1004, 'P195601', '0', 'TYVCE', '5D3A8', '1'),
(1005, 'P195744', '0', 'UYIRA', '5D3A8', '1'),
(1006, 'P190005', '0', 'RV0RS', '5D3A8', '1'),
(1007, 'P190252', '0', '0YXOT', '5D3A8', '1'),
(1008, 'P190436', '0', '6K8MY', '5D3A8', '1'),
(1009, 'P190604', '0', 'ATDPM', '5D3A8', '1'),
(1010, 'P190731', '0', '2NJMU', '5D3A8', '1'),
(1011, 'P190916', '0', '5FMHA', '5D3A8', '1'),
(1012, 'P191042', '0', 'MMI0M', '5D3A8', '1'),
(1013, 'P191209', '0', 'LQC2H', '5D3A8', '1'),
(1014, 'P191340', '0', '2O1Y2', '5D3A8', '1'),
(1015, 'P191130', '0', 'HABVV', 'E6WBR', '1'),
(1016, 'P191559', '0', '9N06D', '5D3A8', '1'),
(1017, 'P191738', '0', '9WVUH', '5D3A8', '1'),
(1018, 'P191903', '0', 'EWPOW', '5D3A8', '1'),
(1019, 'P192030', '0', 'NFHB7', '5D3A8', '1'),
(1020, 'P192224', '0', '38XN6', '5D3A8', '1'),
(1021, 'P192349', '0', 'NXXCR', '5D3A8', '1'),
(1022, 'P192509', '0', 'J5LOC', '5D3A8', '1'),
(1023, 'P192636', '0', '0IJBB', '5D3A8', '1'),
(1024, 'P192756', '0', 'FLHQY', '5D3A8', '1'),
(1025, 'P195448', '0', 'M6Z1O', '48OUA', '1'),
(1026, 'P192708', '0', '2J9ZV', 'E6wbr', '1'),
(1027, 'P195407', '0', 'QWWHV', '48OUA', '1'),
(1028, 'P195534', '0', 'SYLOW', '48OUA', '1'),
(1029, 'P195657', '0', 'I29ZE', '48OUA', '1'),
(1030, 'P195818', '0', '4YC4C', '48OUA', '1'),
(1031, 'P190054', '0', 'JOS9U', '5D3A8', '1'),
(1032, 'P190301', '0', 'ZS52R', '5D3A8', '1'),
(1033, 'P190335', '0', 'M8INI', '5IP33', '1'),
(1034, 'P190508', '0', '5U1AI', '5D3A8', '1'),
(1035, 'P190523', '0', '7U547', '5IP33', '1'),
(1036, 'P190701', '0', 'WV448', '5D3A8', '1'),
(1037, 'P190029', '0', 'CFLES', 'e6wbr', '1'),
(1038, 'P190841', '0', 'B3MJ8', '5D3Ai', '1'),
(1039, 'P191008', '0', 'I4Z2X', '5D3A8', '1'),
(1040, 'P191146', '0', 'QL41F', '5D3A8', '1'),
(1041, 'P191625', '0', '1IQAW', '5D3A8', '1'),
(1042, 'P191835', '0', 'B0K8Q', '5D3A8', '1'),
(1043, 'P192055', '0', 'OTLDP', '5D3A8', '1'),
(1044, 'P194136', '0', '83HBH', '5D3A8', '1'),
(1045, 'P194336', '0', 'YTQQG', '5D3A8', '1'),
(1046, 'P194923', '0', 'WD6I0', '5D3A8', '1'),
(1047, 'P195112', '0', 'M5493', '5D3A8', '1'),
(1048, 'P195307', '0', 'LODYA', '5D3A8', '1'),
(1049, 'P195538', '0', '9P4EZ', '5D3A8', '1'),
(1050, 'P195707', '0', 'U9RN5', '5D3A8', '1'),
(1051, 'P195921', '0', 'WN5XN', '5D3A8', '1'),
(1052, 'P190058', '0', 'TR6YK', '5D3A8', '1'),
(1053, 'P190234', '0', '5WLBY', '5D3A8', '1'),
(1054, 'P190359', '0', '3AVBV', '5D3A8', '1'),
(1055, 'P190811', '0', 'HU7KD', '5D3A8', '1'),
(1056, 'P190954', '0', 'HJGXG', '5D3A8', '1'),
(1057, 'P190800', '0', 'KGTC8', 'LKEZ6', '1'),
(1058, 'P191123', '0', 'H955O', '5D3A8', '1'),
(1059, 'P191154', '0', '712K2', '7U547', '1'),
(1060, 'P191311', '0', '7DJSQ', '5D3A8', '1'),
(1061, 'P191435', '0', 'NCS6I', '5D3A8', '1'),
(1062, 'P191410', '0', '6MOJ3', '9LX7U', '1'),
(1063, 'P191611', '0', 'IGHP1', '5D3A8', '1'),
(1064, 'P191745', '0', 'IA7BJ', '7U547', '1'),
(1065, 'P191750', '0', 'P7NBK', '5D3A8', '1'),
(1066, 'P191919', '0', 'VY4JR', '5D3A8', '1'),
(1067, 'P192034', '0', 'JC1AT', '5D3A8', '1'),
(1068, 'P193515', '0', 'LILOR', 'AQU5S', '1'),
(1069, 'P193812', '0', 'U3VGM', 'AQU5S', '1'),
(1070, 'P194030', '0', 'ZVRC8', 'AQU5S', '1'),
(1071, 'P194211', '0', 'CE5KR', 'LKEZ6', '1'),
(1072, 'P194342', '0', 'EH18Y', 'AQU5S', '1'),
(1073, 'P194534', '0', 'GSAJF', 'AQU5S', '1'),
(1074, 'P195007', '0', 'K2TYO', 'AQU5S', '1'),
(1075, 'P195337', '0', 'IUXEZ', 'AQU5S', '1'),
(1076, 'P195603', '0', 'FWAV2', 'AQU5S', '1'),
(1077, 'P191930', '0', 'G5CDJ', '7U547', '1'),
(1078, 'P195924', '0', 'THVNG', 'AQU5S', '1'),
(1079, 'P191756', '0', 'N5N1F', 'LKEZ6 ', '1'),
(1080, 'P191115', '0', 'WSXYM', 'E6WBR', '1'),
(1081, 'P191421', '0', '15YDY', '7U547', '1'),
(1082, 'P191931', '0', 'RQHHW', '7U547', '1'),
(1083, 'P192113', '0', 'BW4GJ', '7U547', '1'),
(1084, 'P191930', '0', '3603G', 'AQU5S', '1'),
(1085, 'P192324', '0', 'QC853', 'AQU5S', '1'),
(1086, 'P192553', '0', 'LO0EN', 'AQU5S', '1'),
(1087, 'P192910', '0', '3RR6I', '7U547', '1'),
(1088, 'P192824', '0', '663RG', 'AQU5S', '1'),
(1089, 'P193117', '0', '6VFSA', 'AQU5S', '1'),
(1090, 'P193419', '0', '4C8S9', '7U547', '1'),
(1091, 'P193322', '0', 'EWNZK', 'AQU5S', '1'),
(1092, 'P194444', '0', 'LBBLK', 'AQU5S', '1'),
(1093, 'P194657', '0', 'HDSY8', 'AQU5S', '1'),
(1094, 'P194939', '0', 'RJQ2E', 'AQU5S', '1'),
(1095, 'P195139', '0', '48IKT', 'AQU5S', '1'),
(1096, 'P195314', '0', '9KHEI', 'AQU5S', '1'),
(1097, 'P195459', '0', 'ZIKCE', 'AQU5S', '1'),
(1098, 'P195608', '0', 'CE1GQ', 'LKEZ6', '1'),
(1099, 'P195840', '0', '5IOB1', 'AQU5S', '1'),
(1100, 'P190022', '0', '3V9IC', 'AQU5S', '1'),
(1101, 'P190146', '0', '19S80', 'AQU5S', '1'),
(1102, 'P190208', '0', 'ZA9N3', '5D3A8', '1'),
(1103, 'P190410', '0', 'WP1HA', '5D3A8', '1'),
(1104, 'P190539', '0', '7TT8N', '5D3A8', '1'),
(1105, 'P190655', '0', 'PZC2Q', '5D3A8', '1'),
(1106, 'P190823', '0', '20XVR', '5D3A8', '1'),
(1107, 'P192403', '0', 'HDSV1', '7U547', '1'),
(1108, 'P193213', '0', 'P1SQX', '7U547', '1'),
(1109, 'P193451', '0', 'QWR8E', '7U547', '1'),
(1110, 'P194033', '0', 'XIUHR', '7U547', '1'),
(1111, 'P194236', '0', 'GW4KI', '7U547', '1'),
(1112, 'P194413', '0', 'EU43J', '7U547', '1'),
(1113, 'P195024', '0', 'A83ZS', '7U547', '1'),
(1114, 'P195628', '0', 'D84IQ', '7U547', '1'),
(1115, 'P200518', '0', 'N7ODU', '7U547', '1'),
(1116, 'P200843', '0', 'WILMX', '7U547', '1'),
(1117, 'P201324', '0', '1GYOM', '7U547', '1'),
(1118, 'P202454', '0', 'FJXD5', 'ZPICR', '1'),
(1119, 'P203527', '0', 'G2ZPH', '7U547', '1'),
(1120, 'P203716', '0', '0U464', '7U547', '1'),
(1121, 'P203816', '0', 'CU34B', '7U547', '1'),
(1122, 'P204056', '0', 'DKF69', '7U547', '1'),
(1123, 'P204639', '0', '562Q5', '7U547', '1'),
(1124, 'P204831', '0', '5GSLS', '7U547', '1'),
(1125, 'P205201', '0', '4JG6X', '7U547', '1'),
(1126, 'P205406', '0', 'Q0OW3', '7U547', '1'),
(1127, 'P200555', '0', '1RMP8', '5D3A8', '1'),
(1128, 'P200814', '0', 'IFMWS', '5D3A8', '1'),
(1129, 'P201413', '0', '1LFIG', 'AQU5S', '1'),
(1130, 'P201445', '0', 'H4QNH', '7U547', '1'),
(1131, 'P201600', '0', '7SIHY', '7U547', '1'),
(1132, 'P201547', '0', 'QR6M3', 'AQU5S', '1'),
(1133, 'P201713', '0', 'ES0GI', '7U547', '1'),
(1134, 'P201718', '0', 'MEUS3', 'AQU5S', '1'),
(1135, 'P201817', '0', 'CESH0', '7U547', '1'),
(1136, 'P201844', '0', 'M2860', 'AQU5S', '1'),
(1137, 'P201927', '0', '53Y70', '7U547', '1'),
(1138, 'P202045', '0', 'DNSVR', 'AQU5S', '1'),
(1139, 'P202133', '0', '9CLI4', '7U547', '1'),
(1140, 'P202253', '0', 'XKG0U', '7U547', '1'),
(1141, 'P202218', '0', 'YA8DZ', 'AQU5S', '1'),
(1142, 'P202448', '0', '01X1C', 'AQU5S', '1'),
(1143, 'P202131', '0', 'U8GGH', 'ZPICR', '1'),
(1144, 'P202646', '0', 'UKYS7', 'AQU5S', '1'),
(1145, 'P202914', '0', 'A87EA', '7U547', '1'),
(1146, 'P202825', '0', 'BDOJX', 'AQU5S', '1'),
(1147, 'P203349', '0', '46209', '7U547', '1'),
(1148, 'P203513', '0', 'E9HC2', '7U547', '1'),
(1149, 'P203403', '0', '0XX7U', 'AQU5S', '1'),
(1150, 'P203611', '0', 'CKW5R', '7U547', '1'),
(1151, 'P203705', '0', 'XV96C', '7U547', '1'),
(1152, 'P203707', '0', 'QVOEN', 'AQU5S', '1'),
(1153, 'P204000', '0', '5E3B4', 'AQU5S', '1'),
(1154, 'P204152', '0', 'Q3MF0', 'AQU5S', '1'),
(1155, 'P204532', '0', 'FRX9X', 'AQU5S ', '1'),
(1156, 'P204714', '0', '3KTRW', 'AQU5S', '1'),
(1157, 'P205346', '0', 'D077P', 'AQU5S', '1'),
(1158, 'P205740', '0', 'B2H68', 'AQU5S', '1'),
(1159, 'P200049', '0', 'UTQWL', 'AQU5S', '1'),
(1160, 'P200237', '0', 'LKKTR', 'AQU5S', '1'),
(1161, 'P200357', '0', 'UB5IK', 'AQU5S', '1'),
(1162, 'P200527', '0', 'TOFIJ', 'AQU5S', '1'),
(1163, 'P200702', '0', 'HY3UI', 'AQU5S', '1'),
(1164, 'P200857', '0', '834MM', 'AQU5S', '1'),
(1165, 'P201104', '0', 'J3HK5', 'AQU5S', '1'),
(1166, 'P201532', '0', 'ZNBRM', 'AQU5S', '1'),
(1167, 'P205720', '0', 'SD53P', '5IP33', '1'),
(1168, 'P205903', '0', 'V06ZC', 'LKEZ6', '1'),
(1169, 'P201032', '0', '2EX3C', '5D3A8', '1'),
(1170, 'P201231', '0', '66WEB', '5D3A8', '1'),
(1171, 'P201415', '0', '86IY3', '5D3A8', '1'),
(1172, 'P201614', '0', 'D59F7', '5D3A8', '1'),
(1173, 'P201825', '0', '44DMG', '5D3A8', '1'),
(1174, 'P202032', '0', 'KDGV4', '5D3A8', '1'),
(1175, 'P202231', '0', '39VVR', '5D3A8', '1'),
(1176, 'P205552', '0', '08AFE', 'LKEZ6', '1'),
(1177, 'P201534', '0', 'RJU7C', '5D3A8', '1'),
(1178, 'P201756', '0', 'GN0VC', '5D3A8', '1'),
(1179, 'P201852', '0', 'E8NCM', '5IP33', '1'),
(1180, 'P201944', '0', 'I2AKP', '5D3A8', '1'),
(1181, 'P202255', '0', 'GLJGO', '5D3A8', '1'),
(1182, 'P202308', '0', 'NY8JY', '7U547', '1'),
(1183, 'P202637', '0', '89L0K', '7U547', '1'),
(1184, 'P202636', '0', 'V2RJY', '5D3A8', '1'),
(1185, 'P203115', '0', 'TCHNJ', '5D3A8', '1'),
(1186, 'P203327', '0', 'Q9QPE', '5D3Q8', '1'),
(1187, 'P203518', '0', 'JZ4RX', '5D3A8', '1'),
(1188, 'P203653', '0', '9534R', '5D3A8', '1'),
(1189, 'P203910', '0', 'TZZRA', '5D3A8', '1'),
(1190, 'P204100', '0', 'T8CTM', '5D3A8', '1'),
(1191, 'P204306', '0', 'PEJEP', '5D3A8', '1'),
(1192, 'P204444', '0', '94MU5', '5D3A8', '1'),
(1193, 'P204642', '0', '2EJC2', '5D3A8', '1'),
(1194, 'P204831', '0', '52ZVX', '5D3A8', '1'),
(1195, 'P204950', '0', 'FDTYT', '5D3A8', '1'),
(1196, 'P205222', '0', '2GL9D', '5D3A8', '1'),
(1197, 'P205349', '0', 'BFE9Y', '5D3A8', '1'),
(1198, 'P205546', '0', 'MDCW4', '5D3A8', '1'),
(1199, 'P205721', '0', 'PF4KL', '5D3A8', '1'),
(1200, 'P205851', '0', 'YNNJA', '5D3A8', '1'),
(1201, 'P200234', '0', '1B58D', '5D3A8', '1'),
(1202, 'P200446', '0', 'RZ4MC', '5D3A8', '1'),
(1203, 'P200543', '0', 'SOFUO', '7U547', '1'),
(1204, 'P200709', '0', 'G7N27', '7U547', '1'),
(1205, 'P200803', '0', '9LVSY', '5D3A8', '1'),
(1206, 'P201021', '0', 'R5TM8', '7U547', '1'),
(1207, 'P203304', '0', 'S6X3K', 'AQU5S', '1'),
(1208, 'P203708', '0', 'JP3JN', 'AQU5S', '1'),
(1209, 'P204012', '0', 'YG7R9', 'AQU5S', '1'),
(1210, 'P204335', '0', 'A7RAL', 'AQU5S', '1'),
(1211, 'P203910', '0', '74L6K', 'ZPICR', '1'),
(1212, 'P205916', '0', 'BUEWM', 'ZPICR ', '1'),
(1213, 'P200134', '0', 'ZA9PW', '7U547', '1'),
(1214, 'P200248', '0', 'AU0TD', '7U547', '1'),
(1215, 'P205507', '0', 'HX5LY', 'LKEZ6', '1'),
(1216, 'P200445', '0', 'MYJV7', '7U547', '1'),
(1217, 'P200751', '0', 'EEUZA', '7U547', '1'),
(1218, 'P200847', '0', 'X279A', '7U547', '1'),
(1219, 'P201035', '0', 'O8WZV', '5IP33', '1'),
(1220, 'P201311', '0', 'T5BOR', '7U547', '1'),
(1221, 'P201510', '0', 'H76NO', '9LX7U', '1'),
(1222, 'P202601', '0', 'QWVOD', '1RPSV', '1'),
(1223, 'P203650', '0', '4LFZK', 'W1WHU', '1'),
(1224, 'P204009', '0', '0FLB7', 'W1WHU', '1'),
(1225, 'P204350', '0', 'B0MH3', 'W1WHU', '1'),
(1226, 'P205304', '0', 'Z6QPM', '5D3A8', '1'),
(1227, 'P205535', '0', '5RRPG', '5D3A8', '1'),
(1228, 'P205747', '0', '1TYB8', '5D3A8', '1'),
(1229, 'P205954', '0', '5DX7Q', '5D3A8', '1'),
(1230, 'P200125', '0', 'R8YXM', '5D3A8', '1'),
(1231, 'P200255', '0', '8I4Q1', '5D3A8', '1'),
(1232, 'P200452', '0', 'W1B9P', '5D3A8', '1'),
(1233, 'P200623', '0', '12RDA', '5D3A8', '1'),
(1234, 'P200409', '0', 'TK3GZ', 'ZPICR', '1'),
(1235, 'P200812', '0', '0HUVR', '5D3A8', '1'),
(1236, 'P201018', '0', '6YCPB', '5D3A8', '1'),
(1237, 'P201158', '0', '0KIYI', '5D3A8', '1'),
(1238, 'P201342', '0', 'FSI4U', '5D3A8', '1'),
(1239, 'P201510', '0', 'M2DMA', '5D3A8', '1'),
(1240, 'P201551', '0', '6F7M4', 'ZPICR', '1'),
(1241, 'P202146', '0', 'HYJ7B', 'ROYQF', '1'),
(1242, 'P202417', '0', 'N0Q7V', 'ZPICR', '1'),
(1243, 'P202611', '0', 'S9ASL', 'AQU5S', '1'),
(1244, 'P203023', '0', 'NTNUN', 'ZPICR', '1'),
(1245, 'P203514', '0', 'Q7DBT', 'ZPICR', '1'),
(1246, 'P204409', '0', 'SHIAM', 'ZPICR', '1'),
(1247, 'P204908', '0', '808L9', 'ZPICR', '1'),
(1248, 'P205426', '0', 'EN6RF', 'ZPICR', '1'),
(1249, 'P200130', '0', 'CLTYL', 'W1WHU', '1'),
(1250, 'P200402', '0', 'FGNI8', 'W1WHU', '1'),
(1251, 'P200706', '0', 'Q8KTK', 'W1WHU', '1'),
(1252, 'P200817', '0', 'SKFUT', 'W1WHU', '1'),
(1253, 'P200937', '0', '22O63', 'W1WHU', '1'),
(1254, 'P201057', '0', 'RUAB8', 'W1WHU', '1'),
(1255, 'P201756', '0', 'PT1B0', 'W1WHU', '1'),
(1256, 'P201916', '0', '8DYOY', 'W1WHU', '1'),
(1257, 'P202033', '0', 'SYAZT', 'W1WHU', '1'),
(1258, 'P202154', '0', 'XKODP', 'W1WHU', '1'),
(1259, 'P202311', '0', '9BJJ9', 'W1WHU', '1'),
(1260, 'P202417', '0', 'CQ42Q', 'W1WHU', '1'),
(1261, 'P203815', '0', 'G2Y8J', 'W1WHU', '1'),
(1262, 'P203950', '0', 'G3VLT', 'W1WHU', '1'),
(1263, 'P204116', '0', 'NQ8RL', 'W1WHU', '1'),
(1264, 'P204256', '0', 'UDVR1', 'W1WHU', '1'),
(1265, 'P205230', '0', 'NUDYN', 'W1WHU', '1'),
(1266, 'P205052', '0', '7A5Z0', 'ZPICR', '1'),
(1267, 'P205401', '0', 'AEF20', 'W1WHU', '1'),
(1268, 'P205702', '0', '7B67M', 'W1WHU', '1'),
(1269, 'P205443', '0', 'YMRBQ', 'ZPICR', '1'),
(1270, 'P200007', '0', '9JOWO', 'W1WHU', '1'),
(1271, 'P200112', '0', 'PP88W', 'W1WHU', '1'),
(1272, 'P205948', '0', 'QWNBJ', 'ZPICR', '1'),
(1273, 'P200209', '0', 'B62ES', 'W1WHU', '1'),
(1274, 'P200325', '0', 'JBWIN', 'W1WHU', '1'),
(1275, 'P200449', '0', 'KN8H1', 'W1WHU', '1'),
(1276, 'P200557', '0', '0OZ5F', 'W1WHU', '1'),
(1277, 'P200712', '0', 'OYH4O', 'W1WHU', '1'),
(1278, 'P200819', '0', 'GJUJJ', 'W1WHU', '1'),
(1279, 'P200929', '0', '0KDT3', 'W1WHU', '1'),
(1280, 'P201709', '0', '1RPV5', 'W1WHU', '1'),
(1281, 'P201821', '0', 'QOO91', 'W1WHU', '1'),
(1282, 'P201936', '0', '381B3', 'W1WHU', '1'),
(1283, 'P203024', '0', '9UAO6', 'suci', '1'),
(1284, 'P213023', '0', 'MOCDA', '5D3A8', '1'),
(1285, 'P213300', '0', 'M2IZZ', '5D3A8', '1'),
(1286, 'P213428', '0', 'X4ML2', '5D3A8', '1'),
(1287, 'P213653', '0', '8NEJD', '5D3A8', '1'),
(1288, 'P213847', '0', 'UZI9B', '5D3A8', '1'),
(1289, 'P214102', '0', 'SFDC8', '5D3A8', '1'),
(1290, 'P214254', '0', 'BP5FK', '5D3A8', '1'),
(1291, 'P214451', '0', 'BVZCH', '5D3A8', '1'),
(1292, 'P214622', '0', 'H6N7E', '5D3A8', '1'),
(1293, 'P214800', '0', 'P3IIR', '5D3A8', '1'),
(1294, 'P214730', '0', 'Q36JX', 'ROYQF', '1'),
(1295, 'P214948', '0', 'ERCKF', '5D3A8', '1'),
(1296, 'P215023', '0', 'GM02V', 'W1WHU', '1'),
(1297, 'P215200', '0', 'NSE69', 'W1WHU', '1'),
(1298, 'P215223', '0', '5557Z', '5D3A8', '1'),
(1299, 'P215315', '0', 'N4ZQ0', 'W1WHU', '1'),
(1300, 'P215405', '0', 'L827U', '5D3A8', '1'),
(1301, 'P215429', '0', 'OJ511', 'W1WHU', '1'),
(1302, 'P215541', '0', 'EUES6', '5D3A8', '1'),
(1303, 'P215629', '0', '195C3', 'W1WHU', '1'),
(1304, 'P215704', '0', 'L74ZJ', '5D3A8', '1'),
(1305, 'P215743', '0', 'UPAXO', 'W1WHU', '1'),
(1306, 'P215851', '0', 'GPXZW', 'W1WHU', '1'),
(1307, 'P215845', '0', '7V3UO', '5D3A8', '1'),
(1308, 'P215546', '0', 'APWV7', 'ROYQF', '1'),
(1309, 'P210023', '0', 'IX581', '5D3A8', '1'),
(1310, 'P210133', '0', 'BJNXT', 'W1WHU', '1'),
(1311, 'P215954', '0', 'BWBYY', 'ROYQF', '1'),
(1312, 'P210202', '0', '7KDMK', '5D3A8', '1'),
(1313, 'P210235', '0', '7EPLS', 'W1WHU', '1'),
(1314, 'P210346', '0', '6U4XE', '5D3A8', '1'),
(1315, 'P210542', '0', 'JBK7O', '5D3A8', '1'),
(1316, 'P210706', '0', '7WW3F', '5D3A8', '1'),
(1317, 'P210852', '0', 'KFNFZ', '5D3A8', '1'),
(1318, 'P211031', '0', 'F2989', '5D3A8', '1'),
(1319, 'P210847', '0', 'MOIRN', 'ROYQF', '1'),
(1320, 'P211158', '0', 'WA6WN', '5D3A8', '1'),
(1321, 'P211505', '0', '02UCG', '5D3A8', '1'),
(1322, 'P211328', '0', 'HRUJ9', 'ROYQF', '1'),
(1323, 'P211630', '0', 'DO2SG', '5D3A8', '1'),
(1324, 'P211646', '0', 'ZQM0I', 'AQU5S', '1'),
(1325, 'P211423', '0', 'YZTLG', 'ROYQF', '1'),
(1326, 'P211843', '0', 'I7QYB', '5D3A8', '1'),
(1327, 'P212008', '0', 'LAPAH', '5D3A8', '1'),
(1328, 'P211552', '0', 'IBL1W', 'E6WBR', '1'),
(1329, 'P211924', '0', 'JLIT7', 'AQU5S', '1'),
(1330, 'P212144', '0', '1VW2G', '5D3A8', '1'),
(1331, 'P212354', '0', 'P6D9C', '5D3A8', '1'),
(1332, 'P212535', '0', 'MYDJX', '5D3A8', '1'),
(1333, 'P212518', '0', 'DRKAC', 'AQU5S', '1'),
(1334, 'P213007', '0', 'U8AJ9', '5D3A8', '1'),
(1335, 'P213140', '0', 'POY5C', 'AQU5S', '1'),
(1336, 'P213151', '0', 'LB7D1', '5D3A8', '1'),
(1337, 'P213400', '0', 'G1ZGN', '5D3A8', '1'),
(1338, 'P213551', '0', '899B5', '5D3A8', '1'),
(1339, 'P213336', '0', 'S0KWD', 'AQU5S', '1'),
(1340, 'P213740', '0', 'SDT81', '5D3A8', '1'),
(1341, 'P213908', '0', 'GCHCP', '5D3A8', '1'),
(1342, 'P214052', '0', '5DDHU', '5D3A8', '1'),
(1343, 'P213910', '0', 'SETL7', 'AQU5S', '1'),
(1344, 'P214237', '0', 'YCHPX', 'W1WHU', '1'),
(1345, 'P214239', '0', 'O25TN', '5D3A8', '1'),
(1346, 'P214252', '0', '5MROZ', 'AQU5S', '1'),
(1347, 'P214349', '0', 'T7MD3', 'W1WHU', '1'),
(1348, 'P214439', '0', '10FUS', '5D3A8', '1'),
(1349, 'P214541', '0', '0RL4K', 'W1WHU', '1'),
(1350, 'P214707', '0', 'ZS1XT', 'W1WHU', '1'),
(1351, 'P214640', '0', '1JOUX', '5D3A8', '1'),
(1352, 'P214809', '0', 'R198Y', 'W1WHU', '1'),
(1353, 'P214828', '0', 'FTFHC', '5D3A8', '1'),
(1354, 'P214938', '0', 'YPLIT', 'W1WHU', '1'),
(1355, 'P215018', '0', 'J0YHK', '5D3A8', '1'),
(1356, 'P215047', '0', '8VKNZ', 'W1WHU', '1'),
(1357, 'P215212', '0', '5755M', '5D3A8', '1'),
(1358, 'P215400', '0', 'XKMIA', '5D3A8', '1'),
(1359, 'P215546', '0', '9W9DJ', '5D3A8', '1'),
(1360, 'P215411', '0', 'DDD2E', 'ROYQF', '1'),
(1361, 'P215712', '0', 'J7QX2', '5D3A8', '1'),
(1362, 'P210004', '0', 'LKRPX', '5D3A8', '1'),
(1363, 'P210223', '0', 'BKX43', '5D3A8', '1'),
(1364, 'P210417', '0', 'Q4E03', '5D3A8', '1'),
(1365, 'P211604', '0', '84Q4V', '5D3A8', '1'),
(1366, 'P211732', '0', 'MKWO6', '5D3A8', '1'),
(1367, 'P211854', '0', 'MQHD1', '5D3A8', '1'),
(1368, 'P212058', '0', 'QCZMY', '5D3A8', '1'),
(1369, 'P212226', '0', 'BFOXF', '5D3A8', '1'),
(1370, 'P212349', '0', 'NR9QA', '5D3A8', '1'),
(1371, 'P212534', '0', 'H01O2', '5D3A8', '1'),
(1372, 'P212653', '0', 'I9EQ3', '5D3A8', '1'),
(1373, 'P212808', '0', 'Z5VZI', '5D3A8', '1'),
(1374, 'P213052', '0', '6P1NG', '5D3A8', '1'),
(1375, 'P213218', '0', '1TS3V', '5D3A8', '1'),
(1376, 'P213132', '0', 'W5D15', 'ZPICR', '1'),
(1377, 'P213340', '0', 'IFFWO', '5D3A8', '1'),
(1378, 'P213516', '0', '8WCFX', '5D3A8', '1'),
(1379, 'P213620', '0', 'A0D73', 'W1WHU', '1'),
(1380, 'P213700', '0', 'ZXFVC', '5D3A8', '1'),
(1381, 'P213837', '0', '2AD46', '5D3A8', '1'),
(1382, 'P213821', '0', 'VFT5C', 'G48Y5', '1'),
(1383, 'P214318', '0', '2NPAO', 'W1WHU', '1'),
(1384, 'P214444', '0', '9L5YU', 'W1WHU', '1'),
(1385, 'P214713', '0', '6A9KU', 'W1WHU', '1'),
(1386, 'P214713', '0', 'MY0UU', 'G48Y5', '1'),
(1387, 'P214631', '0', 'W5KKK', 'ZPICR ', '1'),
(1388, 'P214959', '0', '3M5T7', 'G48Y5', '1'),
(1389, 'P215848', '0', '0GJFT', 'VFT5C', '1'),
(1390, 'P210119', '0', '0D63B', 'ROYQF', '1'),
(1391, 'P214014', '0', 'XQJDN', '5D3A8', '1'),
(1392, 'P213923', '0', 'ACOY4', 'ROYQF ', '1'),
(1393, 'P214145', '0', 'CC3T0', '5D3A8', '1'),
(1394, 'P214308', '0', 'DZZ4F', '5D3A8', '1'),
(1395, 'P214424', '0', '3EWTG', '5D3A8', '1'),
(1396, 'P214540', '0', '26J3M', '5D3A8', '1'),
(1397, 'P214658', '0', 'NKIZF', '5D3A8', '1'),
(1398, 'P210338', '0', '2BC07', 'ROYQF', '1'),
(1399, 'P212643', '0', 'L039K', '5D3A8', '1'),
(1400, 'P212809', '0', 'C82Z2', '5D3A8', '1'),
(1401, 'P212959', '0', 'MDZB6', '5D3A8', '1'),
(1402, 'P213155', '0', 'VJGIJ', 'tD3A8', '1'),
(1403, 'P213333', '0', 'TKIS0', '5D3A8', '1'),
(1404, 'P213446', '0', 'WRT87', '5D3A8', '1'),
(1405, 'P213621', '0', '0MBUF', '5D3A8', '1'),
(1406, 'P213751', '0', 'J965K', '5D3A8', '1'),
(1407, 'P213914', '0', 'CTQ7R', '5D3A8', '1'),
(1408, 'P213714', '0', 'HMPGW', 'ZPICR', '1'),
(1409, 'P214034', '0', 'G6OF7', '5D3A8', '1'),
(1410, 'P214251', '0', 'L6MCU', '5D3A8', '1'),
(1411, 'P214437', '0', 'SRCEK', '5D3A8', '1'),
(1412, 'P214600', '0', 'K179X', '5D3A8', '1'),
(1413, 'P214742', '0', '49KPP', '5D3A8', '1'),
(1414, 'P214914', '0', '52YCT', '5D3A8', '1'),
(1415, 'P215035', '0', '42LXM', '5D3A8', '1'),
(1416, 'P215203', '0', '6A4VK', '5D3A8', '1'),
(1417, 'P215539', '0', 'VAVBO', '5D3A8', '1'),
(1418, 'P215725', '0', '8A7ZL', '5D3Q8', '1'),
(1419, 'P215846', '0', '82A1B', '5D3A8', '1'),
(1420, 'P212552', '0', 'LSP77', 'ZPICR ', '1'),
(1421, 'P212534', '0', '6EVRN', 'ROYQF', '1'),
(1422, 'P212847', '0', 'HIM63', 'ROYQF', '1'),
(1423, 'P212931', '0', 'J5Q1N', '5D3A8', '1'),
(1424, 'P213138', '0', '44SRL', '5D3A8', '1'),
(1425, 'P213235', '0', 'PLZ4H', 'ROYQF', '1'),
(1426, 'P213259', '0', '7VD58', '5D3A8', '1'),
(1427, 'P213427', '0', 'IYFQN', '5D3A8', '1'),
(1428, 'P213617', '0', 'V132M', '5D3A8', '1'),
(1429, 'P213750', '0', '0J7KU', '5D3A8', '1'),
(1430, 'P213925', '0', '669DP', '5D3A8', '1'),
(1431, 'P214106', '0', 'PCOQN', '5D3A8', '1'),
(1432, 'P214228', '0', 'RHT54', '5D3A8', '1'),
(1433, 'P214945', '0', 'MOWV8', '5D3A8', '1'),
(1434, 'P215155', '0', 'XJTDF', '5D3A8', '1'),
(1435, 'P214040', '0', 'D4ETC', 'OBA2G', '1'),
(1436, 'P215337', '0', 'ZQ8PU', '5D3A8', '1'),
(1437, 'P215455', '0', 'PYICG', '5D3A8', '1'),
(1438, 'P215632', '0', 'Y3W7G', '5D3A8', '1'),
(1439, 'P215750', '0', '4GUXZ', '5D3A8', '1'),
(1440, 'P210349', '0', 'LPW45', '5D3A8', '1'),
(1441, 'P210519', '0', 'PUOAI', '5D3A8', '1'),
(1442, 'P210649', '0', '6GS56', '5D3A8', '1'),
(1443, 'P210804', '0', 'CJFM4', '5D3A8', '1'),
(1444, 'P210940', '0', 'Q7M3X', '5D3A8', '1'),
(1445, 'P211246', '0', 'L5UZO', '5D3A8', '1'),
(1446, 'P211401', '0', 'N656H', '5D3A8', '1'),
(1447, 'P211532', '0', 'J7O3B', '5D3A8', '1'),
(1448, 'P211705', '0', 'UEPOC', '5D3A8', '1'),
(1449, 'P211831', '0', 'YAW02', '5D3A8', '1'),
(1450, 'P211620', '0', 'JGDON', 'LKEZ6', '1'),
(1451, 'P212001', '0', 'VDW6M', '5D3A8', '1'),
(1452, 'P213102', '0', 'M9X0G', 'ROYQF', '1'),
(1453, 'P213952', '0', '0DOH2', 'LKEZ6', '1'),
(1454, 'P215858', '0', 'VU8YH', 'ROYQF', '1'),
(1455, 'P211146', '0', 'OEYDQ', 'ROYQF', '1'),
(1456, 'P215245', '0', 'T479B', 'ROYQF', '1'),
(1457, 'P215615', '0', 'KH6LQ', '5IP33', '1'),
(1458, 'P215754', '0', 'YBWUS', 'ROYQF', '1'),
(1459, 'P210127', '0', 'PHNZ4', 'ROYQF', '1'),
(1460, 'P211601', '0', 'U071H', 'ROYQF', '1'),
(1461, 'P211930', '0', '9615J', '5IP33', '1'),
(1462, 'P212226', '0', '4BBNK', 'ROYQF', '1'),
(1463, 'P212705', '0', 'C98P2', 'ROYQF ', '1'),
(1464, 'P212602', '0', '7N2N6', 'E6WBR', '1'),
(1465, 'P212407', '0', 'TPVQ0', 'ROYQF', '1'),
(1466, 'P212707', '0', 'G1GSE', 'E6WBR', '1'),
(1467, 'P212547', '0', '39NHU', 'ROYQF', '1'),
(1468, 'P213025', '0', '4K2BP', 'ROYQF', '1'),
(1469, 'P213404', '0', 'VSZ9S', '5IP33', '1'),
(1470, 'P213056', '0', 'P6CN9', 'ROYQF', '1'),
(1471, 'P213818', '0', '1E6IZ', 'ROYQF', '1'),
(1472, 'P214052', '0', '1MBON', 'ROYQF', '1'),
(1473, 'P214239', '0', 'HABP5', 'ROYQF ', '1'),
(1474, 'P214330', '0', 'VBTR1', 'selin', '1'),
(1475, 'P213836', '0', 'TXQGU', 'ROYQF', '1'),
(1476, 'P214838', '0', 'PFWA7', 'ROYQF', '1'),
(1477, 'P213950', '0', '7ZU34', 'ROYQF', '1'),
(1478, 'P212610', '0', '37JDS', 'ROYQF', '1'),
(1479, 'P215035', '0', '7YHSQ', 'ROYQF', '1'),
(1480, 'P215419', '0', 'WKO2L', '5IP33', '1'),
(1481, 'P215420', '0', 'NG9IV', 'ROYQF', '1'),
(1482, 'P215829', '0', 'BYZPS', 'ROYQF', '1'),
(1483, 'P215735', '0', 'GAWHM', 'ROYQF', '1'),
(1484, 'P215922', '0', 'A1VCF', 'ROYQF', '1'),
(1485, 'P210046', '0', 'Z8XXR', 'ROYQF', '1'),
(1486, 'P215707', '0', 'T7EMW', 'ROYQF', '1'),
(1487, 'P210315', '0', '5ONT6', 'ROYQF', '1'),
(1488, 'P210316', '0', '34IJC', 'ROYQF', '1'),
(1489, 'P210523', '0', '0S41I', 'ROYQF', '1'),
(1490, 'P210929', '0', 'WJOM1', 'W1WHU', '1'),
(1491, 'P211150', '0', 'K7JPK', 'ROYQF', '1'),
(1492, 'P211559', '0', 'GRV45', 'W1WHU', '1'),
(1493, 'P212056', '0', 'W7DP5', 'ROYQF', '1'),
(1494, 'P212501', '0', 'G0NBP', 'ROYQF', '1'),
(1495, 'P213551', '0', 'IN17E', 'ROYQF', '1'),
(1496, 'P213757', '0', 'IHCF0', 'ROYQF', '1'),
(1497, 'P214230', '0', 'D67BB', 'ROYQF', '1'),
(1498, 'P212237', '0', 'V0VMG', 'ROYQF', '1'),
(1499, 'P213536', '0', 'RDY3L', 'ROYQF', '1'),
(1500, 'P215746', '0', 'WUNU8', 'AQU5S', '1'),
(1501, 'P215944', '0', 'L2SUI', 'AQU5S', '1'),
(1502, 'P210225', '0', 'N9XGT', 'AQU5S', '1'),
(1503, 'P210543', '0', 'G88NL', 'AQU5S', '1'),
(1504, 'P211017', '0', 'FZCJS', 'AQU5S', '1'),
(1505, 'P210927', '0', 'BAUUI', 'ROYQF', '1'),
(1506, 'P211232', '0', 'CMQY1', 'AQU5S', '1'),
(1507, 'P211554', '0', 'SKAF9', 'AQU5S', '1'),
(1508, 'P212100', '0', 'CV0O9', 'AQU5S', '1'),
(1509, 'P212306', '0', 'ASFJ8', 'AQU5S', '1'),
(1510, 'P212627', '0', 'LXTQI', 'AQU5S', '1'),
(1511, 'P212910', '0', 'UDZCL', 'AQU5S', '1'),
(1512, 'P213110', '0', 'IVTRC', 'AQU5S', '1'),
(1513, 'P213253', '0', 'WPC5W', 'AQU5S', '1'),
(1514, 'P213518', '0', '560X0', 'AQU5S', '1'),
(1515, 'P213829', '0', 'Z5ISK', 'AQU5S', '1'),
(1516, 'P214349', '0', '5721K', 'AQU5S', '1'),
(1517, 'P214545', '0', 'VTXG1', 'AQU5S', '1'),
(1518, 'P214708', '0', 'CR2JS', 'AQU5S', '1'),
(1519, 'P214954', '0', '2058D', 'AQU5S', '1'),
(1520, 'P215141', '0', 'LMAWI', 'AQU5S', '1'),
(1521, 'P215341', '0', 'I4ZEI', 'AQU5S', '1'),
(1522, 'P215839', '0', 'AFYT1', 'W1WHU', '1'),
(1523, 'P210026', '0', '3TCOB', 'W1WHU', '1'),
(1524, 'P210131', '0', 'DTM1J', 'W1WHU', '1'),
(1525, 'P210108', '0', 'LSNUV', 'ROYQF', '1'),
(1526, 'P211159', '0', 'NP8C5', 'ZPICR ', '1'),
(1527, 'P212149', '0', '1R7AR', 'W1WHU', '1'),
(1528, 'P212258', '0', 'YCWWK', 'W1WHU', '1'),
(1529, 'P213934', '0', '64K5X', 'ROYQF', '1'),
(1530, 'P214157', '0', 'GFNJ7', 'W1WHU', '1'),
(1531, 'P214736', '0', 'V62X3', 'W1WHU', '1'),
(1532, 'P214854', '0', 'MDHJI', 'W1WHU', '1'),
(1533, 'P211608', '0', 'YPEWQ', 'ZPICR ', '1'),
(1534, 'P210416', '0', '1W09F', 'W1WHU', '1'),
(1535, 'P210521', '0', 'YHG5Q', 'W1WHU', '1'),
(1536, 'P210624', '0', 'N8H7L', 'W1WHU', '1'),
(1537, 'P210722', '0', 'YUMZI', 'W1WHU', '1'),
(1538, 'P211214', '0', 'MDBVC', 'W1WHU', '1'),
(1539, 'P213911', '0', 'A0F5L', 'W1WHU', '1'),
(1540, 'P212956', '0', 'R2OOF', 'W1WHU', '1'),
(1541, 'P213401', '0', '5CII6', 'W1WHU', '1'),
(1542, 'P213522', '0', '9JRQ8', 'W1WHU', '1'),
(1543, 'P213621', '0', 'GA7T8', 'W1WHU', '1'),
(1544, 'P213723', '0', '9A85T', 'W1WHU', '1'),
(1545, 'P210953', '0', '3BKM1', 'ROYQF', '1'),
(1546, 'P215207', '0', 'SJAM3', 'W1WHU', '1'),
(1547, 'P215332', '0', '2JJV1', 'W1WHU', '1'),
(1548, 'P220531', '0', '8JT5H', 'W1WHU', '1'),
(1549, 'P223110', '0', '24EOB', 'W1WHU', '1'),
(1550, 'P223239', '0', '5Y5HA', 'W1WHU', '1'),
(1551, 'P224123', '0', 'S1XT4', 'ROYQF', '1'),
(1552, 'P225023', '0', '4IUS7', 'ROYQF', '1'),
(1553, 'P225359', '0', 'PM9FD', 'ROYQF', '1'),
(1554, 'P224904', '0', 'NV4N9', 'ROYQF', '1'),
(1555, 'P225312', '0', '1V1UX', 'ROYQF', '1'),
(1556, 'P225926', '0', 'G2EAP', 'ROYQF', '1'),
(1557, 'P223255', '0', 'K8G2S', '5D3A8', '1'),
(1558, 'P223924', '0', 'VRKFZ', '5D3A8', '1'),
(1559, 'P224056', '0', 'X06WF', '5D3A8', '1'),
(1560, 'P224238', '0', 'LA7W2', '5D3A8', '1'),
(1561, 'P224150', '0', 'LJR6V', 'ROYQF', '1'),
(1562, 'P224422', '0', 'I7CJH', '5D3A8', '1'),
(1563, 'P224540', '0', 'F6MTV', '5D3A8', '1'),
(1564, 'P224710', '0', 'TMSDT', '5D3A8', '1'),
(1565, 'P224903', '0', 'ENWKC', '5D3A8', '1'),
(1566, 'P225038', '0', '8BSYA', '5D3A8', '1'),
(1567, 'P225224', '0', 'LWB68', '5D3A8', '1'),
(1568, 'P225424', '0', '0UDNB', '5D3A8', '1'),
(1569, 'P225640', '0', 'T6230', '5D3A8', '1'),
(1570, 'P225750', '0', '7DS45', 'ROYQF', '1'),
(1571, 'P225734', '0', '99KU6', 'ROYQF', '1'),
(1572, 'P220652', '0', 'NSD3R', 'ROYQF', '1'),
(1573, 'P220758', '0', 'FH3CL', 'ROYQF', '1'),
(1574, 'P221203', '0', 'H4U7U', 'ROYQF', '1'),
(1575, 'P221352', '0', 'ITVK7', 'ROYQF ', '1'),
(1576, 'P221538', '0', '3ESZG', 'ROYQF ', '1'),
(1577, 'P222148', '0', 'J7HBY', 'ROYQF', '1'),
(1578, 'P222453', '0', 'U3NNM', 'ROYQV', '1'),
(1579, 'P222811', '0', 'TWBH0', 'ROYQF', '1'),
(1580, 'P225713', '0', 'FDUD6', 'ROYQF', '1'),
(1581, 'P225551', '0', 'RU1ZK', 'ROYQF', '1'),
(1582, 'P225948', '0', 'Z7ME3', 'ROYQF ', '1'),
(1583, 'P220235', '0', '23UXS', 'ROYQF ', '1'),
(1584, 'P221623', '0', 'GRSBR', 'W1WHU', '1'),
(1585, 'P221821', '0', 'RYYJC', 'W1WHU', '1'),
(1586, 'P222034', '0', '3JTU5', 'W1WHU', '1'),
(1587, 'P222220', '0', 'T6TCK', 'W1WHU', '1'),
(1588, 'P222742', '0', 'AQJ67', 'W1WHU', '1'),
(1589, 'P222516', '0', 'UJORA', 'ROYQF', '1'),
(1590, 'P223122', '0', 'TVZN6', 'ROYQF', '1'),
(1591, 'P223548', '0', 'RTA2Y', 'ROYQF', '1'),
(1592, 'P220408', '0', 'I3DZS', '5D3A8', '1'),
(1593, 'P220641', '0', 'XNESO', '5D3A8', '1'),
(1594, 'P220832', '0', '8IEXC', '5D3A8', '1'),
(1595, 'P221010', '0', '8N7A7', '5D3A8', '1'),
(1596, 'P221226', '0', 'LUDK0', '5D3A8', '1'),
(1597, 'P221358', '0', 'MF8IB', '5D3A8', '1'),
(1598, 'P221533', '0', 'U2961', '5D3A8', '1'),
(1599, 'P221654', '0', 'U1517', '5D3A8', '1'),
(1600, 'P221841', '0', 'H6AAA', '5D3A8', '1'),
(1601, 'P222012', '0', 'UMNKK', '5D3A8', '1'),
(1602, 'P222143', '0', 'JES9T', '5D3A8', '1'),
(1603, 'P222327', '0', 'E1TAR', '5D3A8', '1'),
(1604, 'P222511', '0', 'RV49L', '5D3A8', '1'),
(1605, 'P222645', '0', 'CMJLL', '5D3A8', '1'),
(1606, 'P222842', '0', 'KNRNM', '5D3A8', '1'),
(1607, 'P223031', '0', 'FVIRE', '5D3A8', '1'),
(1608, 'P223225', '0', 'KAEC6', '5D3A8', '1'),
(1609, 'P223349', '0', '4N11E', '5D3A8', '1'),
(1610, 'P223536', '0', 'IJRLZ', '5D3A8', '1'),
(1611, 'P223620', '0', 'IPCHZ', 'ROYQF ', '1'),
(1612, 'P223724', '0', 'N9EC1', '5D3A8', '1'),
(1613, 'P223807', '0', '7K83I', 'ROYQF ', '1'),
(1614, 'P223925', '0', 'UVUO9', '5D3A8', '1'),
(1615, 'P224112', '0', '41JCO', '5D3A8', '1'),
(1616, 'P224259', '0', 'AEIST', '5D3A8', '1'),
(1617, 'P224543', '0', 'IEOQS', '5D3A8', '1'),
(1618, 'P224711', '0', '5EK66', '5D3A8', '1'),
(1619, 'P224844', '0', '15CWI', '5D3A8', '1'),
(1620, 'P225017', '0', 'AAPRK', '5D3A8', '1'),
(1621, 'P225202', '0', '85SYB', '5D3A8', '1'),
(1622, 'P225408', '0', '8G0RH', '5D3A8', '1'),
(1623, 'P225554', '0', 'T80H4', '5D3A8', '1'),
(1624, 'P225756', '0', 'AMQ4Y', '5D3A8', '1'),
(1625, 'P225921', '0', 'YW16Y', '5D3A8', '1'),
(1626, 'P220102', '0', '8W7XS', '5D3A8', '1'),
(1627, 'P220258', '0', 'CJCH2', '5D3A8', '1'),
(1628, 'P220515', '0', 'EBLJN', '5D3A8', '1'),
(1629, 'P220730', '0', 'G48WI', 'tD3A8', '1'),
(1630, 'P220930', '0', 'S99RD', '5D3A8', '1'),
(1631, 'P221118', '0', '9Z42M', '5D3A8', '1'),
(1632, 'P221300', '0', 'LN8H5', '5D3A8', '1'),
(1633, 'P221435', '0', 'WUZIG', '5D3A8', '1'),
(1634, 'P221607', '0', 'QEOIQ', '5D3A8', '1'),
(1635, 'P221751', '0', 'I8VA5', '5D3A8', '1'),
(1636, 'P221925', '0', '0KLEF', '5D3A8', '1'),
(1637, 'P222226', '0', 'UB1MA', '5D3A8', '1'),
(1638, 'P222512', '0', 'NMB0N', '5D3A8', '1'),
(1639, 'P222641', '0', 'L3D4H', '5D3A8', '1'),
(1640, 'P222833', '0', 'ZHCT7', '5D3A8', '1'),
(1641, 'P222959', '0', 'FS7KE', '5D3A8', '1'),
(1642, 'P223132', '0', 'P38PX', '5D3A8', '1'),
(1643, 'P223322', '0', '1TGN6', '5D3A8', '1'),
(1644, 'P223534', '0', '8EBDW', '5D3A8', '1'),
(1645, 'P223806', '0', 'JU1J4', 'tD3A8', '1'),
(1646, 'P224031', '0', '9PHR5', '5D3A8', '1'),
(1647, 'P224224', '0', '0S7XO', '5D3A8', '1'),
(1648, 'P224407', '0', 'WU4BE', '5D3A8', '1'),
(1649, 'P224554', '0', '9PMC4', '5D3A8', '1'),
(1650, 'P224713', '0', 'I37A1', '5D3A8', '1'),
(1651, 'P224908', '0', 'J3CNZ', '5D3A8', '1'),
(1652, 'P225054', '0', '42P0H', '5D3A8', '1'),
(1653, 'P225500', '0', 'LHU2Z', '5D3A8', '1'),
(1654, 'P225711', '0', 'N2D6Z', '5D3A8', '1'),
(1655, 'P225841', '0', '25GJ1', '5D3A8', '1'),
(1656, 'P220013', '0', 'KN25J', '5D3A8', '1'),
(1657, 'P220150', '0', 'VPPM6', '5D3A8', '1'),
(1658, 'P220325', '0', 'A7DI9', '5D3A8', '1'),
(1659, 'P220453', '0', 'OT4TI', '5D3A8', '1'),
(1660, 'P222604', '0', 'N0YVY', 'ROYQF', '1'),
(1661, 'P222952', '0', '4AHUM', 'ROYQF', '1'),
(1662, 'P223508', '0', '0RZX2', 'ROYQF', '1'),
(1663, 'P224222', '0', 'MZCP7', 'ROYQF', '1'),
(1664, 'P224550', '0', 'N4R5G', 'ROYQF', '1'),
(1665, 'P221011', '0', '82494', 'AQU5S', '1'),
(1666, 'P222235', '0', '6T4NA', 'W1WHU', '1'),
(1667, 'P222225', '0', 'MCJMW', 'ROYQF', '1'),
(1668, 'P222157', '0', '82YKA', 'AQU5S', '1'),
(1669, 'P222424', '0', 'VP3TW', 'ROYQF', '1'),
(1670, 'P222457', '0', 'BJQ5O', 'W1WHU', '1'),
(1671, 'P222505', '0', 'Z4Z62', 'AQU5S', '1'),
(1672, 'P222716', '0', 'JO6ST', 'AQU5S', '1'),
(1673, 'P222909', '0', 'AXXF7', 'AQU5S', '1'),
(1674, 'P223000', '0', 'N58JO', 'ROYQF', '1'),
(1675, 'P223125', '0', '7E4CR', 'AQU5S', '1'),
(1676, 'P223110', '0', 'HLK60', 'ZPICR', '1'),
(1677, 'P223325', '0', 'HXEFY', 'AQU5S', '1'),
(1678, 'P223501', '0', '9EIMY', 'AQU5S', '1'),
(1679, 'P223749', '0', '5PU1S', 'W1WHU', '1'),
(1680, 'P223741', '0', '27E5Y', 'AQU5S', '1'),
(1681, 'P223851', '0', 'ENEMG', 'W1WHU', '1'),
(1682, 'P223941', '0', '0HU1V', 'AQU5S', '1'),
(1683, 'P224102', '0', '9HX78', 'AQU5S', '1'),
(1684, 'P224434', '0', '4CCS4', 'AQU5S', '1'),
(1685, 'P224624', '0', 'Z1LK6', 'AQU5S', '1'),
(1686, 'P225006', '0', 'AJIGW', '5D3A8', '1'),
(1687, 'P225201', '0', 'YBK6I', '5D3A8', '1'),
(1688, 'P225339', '0', '69ICT', '5D3A8', '1'),
(1689, 'P225530', '0', 'IBJ5C', '5D3A8', '1'),
(1690, 'P225714', '0', 'NFDPG', '5D3A8', '1'),
(1691, 'P225840', '0', 'JN4XH', '5D3A8', '1'),
(1692, 'P220057', '0', 'OWRON', '5D3A8', '1'),
(1693, 'P220750', '0', 'S6A43', '5D3A8', '1'),
(1694, 'P221019', '0', '685WD', '5D3A8', '1'),
(1695, 'P221155', '0', 'T8DNT', '5D3A8', '1'),
(1696, 'P221319', '0', 'T3IQX', '5D3A8', '1'),
(1697, 'P221510', '0', '31PN4', '5D3A8', '1'),
(1698, 'P221724', '0', 'BW19S', '5D3A8', '1'),
(1699, 'P221923', '0', '9YUXR', 'ROYQF', '1'),
(1700, 'P222038', '0', 'P3AWR', '5D3A8', '1'),
(1701, 'P222232', '0', '6E4QB', '5D3A8', '1'),
(1702, 'P222426', '0', 'WTJIY', '5D3A8', '1'),
(1703, 'P222552', '0', '2909K', '5D3A8', '1'),
(1704, 'P222639', '0', '1ADXY', 'W1WHU', '1'),
(1705, 'P222722', '0', 'X87ZW', '5D3A8', '1'),
(1706, 'P222747', '0', '9E2WK', 'W1WHU', '1'),
(1707, 'P222843', '0', 'DRVCK', '5D3A8', '1'),
(1708, 'P222935', '0', 'MQ9YO', 'W1WHU', '1'),
(1709, 'P223029', '0', '0199S', '5D3A8', '1'),
(1710, 'P223205', '0', 'O3VO7', '5D3A8', '1'),
(1711, 'P223332', '0', 'Z4621', '5D3A8', '1'),
(1712, 'P223502', '0', '7F1QC', '5D3A8', '1'),
(1713, 'P223623', '0', 'JD3UU', '5D3A8', '1'),
(1714, 'P223749', '0', 'I5L64', '5D3A8', '1'),
(1715, 'P223940', '0', '6H855', '5D3A8', '1'),
(1716, 'P224545', '0', 'UGSFM', 'W1WHU', '1'),
(1717, 'P225213', '0', '3LP5W', 'W1WHU', '1'),
(1718, 'P225315', '0', '4IIZW', 'W1WHU', '1'),
(1719, 'P220154', '0', 'WY7V4', 'W1WHU', '1'),
(1720, 'P220441', '0', 'YJR81', 'W1WHU', '1'),
(1721, 'P220622', '0', 'R6SGI', 'W1WHU', '1'),
(1722, 'P220726', '0', 'M9YFK', 'W1WHU', '1'),
(1723, 'P220832', '0', '22LF6', 'W1WHU', '1'),
(1724, 'P220952', '0', 'C1IA4', 'W1WHU', '1'),
(1725, 'P222802', '0', 'DWXOU', 'ROYQF', '1'),
(1726, 'P223614', '0', '8A0L7', 'ROYQF', '1'),
(1727, 'P220659', '0', '9KK7V', 'RYOQF', '1'),
(1728, 'P221434', '0', 'JR8OU', 'ROYQF', '1'),
(1729, 'P221745', '0', 'EON0Z', 'ROYQF', '1'),
(1730, 'P224500', '0', 'KIFBX', 'ZPICR', '1'),
(1731, 'P220427', '0', 'SWOHH', '27february', '1'),
(1732, 'P221218', '0', 'VMOB7', 'KIFBX', '1'),
(1733, 'P221438', '0', 'OPPMM', 'KIFBX', '1'),
(1734, 'P221650', '0', 'ZQW6E', 'KIFBX', '1'),
(1735, 'P221411', '0', 'OICD9', 'KIFBX', '1'),
(1736, 'P221757', '0', 'CDD8K', 'ROYQF', '1'),
(1737, 'P222458', '0', 'STNVE', 'KIFBX', '1'),
(1738, 'P224428', '0', 'VXIF7', 'KIFBX', '1'),
(1739, 'P232216', '0', 'F9P6K', 'RQYQF', '1'),
(1740, 'P232732', '0', '1E294', 'RQYQF', '1'),
(1741, 'P233233', '0', 'TYQYU', 'RQYQF', '1'),
(1742, 'P233520', '0', 'MCQA0', 'RQYQF', '1'),
(1743, 'P233808', '0', 'YB5C4', 'RQYQF', '1'),
(1744, 'P234743', '0', 'NQH73', 'RQYQF', '1'),
(1745, 'P234950', '0', '8MBFK', 'RQYQR', '1'),
(1746, 'P233852', '0', 'HZNM5', 'ZPICR', '1'),
(1747, 'P230529', '0', 'XEHSH', 'ROYQF', '1'),
(1748, 'P230827', '0', 'S76YP', 'ROYQF', '1'),
(1749, 'P231838', '0', 'XO1F7', '5D3A8', '1'),
(1750, 'P232036', '0', 'NK11N', '5D3A8', '1'),
(1751, 'P232156', '0', '7KGNW', '5D3A8', '1'),
(1752, 'P234830', '0', '2MEDB', 'E6WBR', '1'),
(1753, 'P235555', '0', 'S8D38', '9DV3V', '1'),
(1754, 'P235723', '0', 'BITXG', '5D3A8', '1'),
(1755, 'P235951', '0', '7MQR1', '5D3A8', '1'),
(1756, 'P231226', '0', 'ZMI20', '5D3A8', '1'),
(1757, 'P232331', '0', 'F0LBU', 'AQU5S', '1'),
(1758, 'P234934', '0', '7LJN8', 'LKEZ6', '1'),
(1759, 'P242804', '0', 'QY5A9', 'VFT5C', '1'),
(1760, 'P242956', '0', 'UX80T', 'VFT5C', '1'),
(1761, 'P245345', '0', 'XCWIM', 'ROYQF', '1'),
(1762, 'P250540', '0', 'DYMLZ', 'E6WBR', '1'),
(1763, 'P253616', '0', 'F0KOJ', 'E6WBR', '1'),
(1764, 'P254041', '0', 'WA7RS', 'LKEZ6', '1'),
(1765, 'P265636', '0', 'N1G28', 'ZPICR', '1'),
(1766, 'P261724', '0', '8S5OD', 'ZPICR', '1'),
(1767, 'P261331', '0', 'JQ0U3', '121212', '1'),
(1768, 'P260157', '0', '7E1Q7', 'ZPICR', '1'),
(1769, 'P265314', '0', 'YCY4S', 'XLLE1', '1'),
(1770, 'P271103', '0', 'LQYDZ', 'ZPICR', '1'),
(1771, 'P271905', '0', 'VEBKJ', 'NO6u6', '1'),
(1772, 'P272153', '0', '9QHG5', 'ZPICR', '1'),
(1773, 'P272644', '0', 'K8UD1', 'ZPICR', '1'),
(1774, 'P271128', '0', '0JIUL', 'XLLE1', '1'),
(1775, 'P273052', '0', 'P097W', 'xlle1', '1'),
(1776, 'P280511', '0', 'A8PV0', 'ZPICR', '1'),
(1777, 'P282803', '0', '76BRV', 'SXJJ9', '1'),
(1778, 'P283300', '0', 'W5ID9', 'SXJJ9', '1'),
(1779, 'P302308', '0', 'VO3L3', 'E6WBR', '1'),
(1780, 'P7730', '0', 'TD5JZ', '15379', '1'),
(1781, 'P64705', '0', 'AU5LE', '242639', '1'),
(1782, 'P67424', '0', '6T8XE', 'ZPICR ', '1'),
(1783, 'P44279', '0', 'Q0GEE', 'AF6CC', '1'),
(1784, 'P68637', '0', 'QOD2Y', 'LKEZ6', '1'),
(1785, 'P84848', '0', '2IR39', 'LKEZ6', '1'),
(1786, 'P70184', '0', '1UVO9', 'ABX5Q', '1'),
(1787, 'P48609', '0', '8S3JH', 'ABX5Q', '1'),
(1788, 'P27135', '0', 'IXTK5', 'ABX5Q', '1'),
(1789, 'P10614', '0', 'H32YN', 'G48Y5', '1'),
(1790, 'P98493', '0', 'C6KU8', 'G48Y5', '1'),
(1791, 'P69712', '0', 'NVM8R', 'LKEZ6', '1'),
(1792, 'P96028', '0', 'LGW0M', 'ZPICR', '1'),
(1793, 'P49165', '0', 'JUY98', 'ZPICR', '1'),
(1794, 'P49378', '0', 'QK9GV', 'ZPICR ', '1'),
(1795, 'P77682', '0', 'WG9I3', 'ZPICR', '1'),
(1796, 'P84470', '0', 'Q3R5Y', '75PLU', '1'),
(1797, 'P47599', '0', '0H1Q0', '75PLU', '1'),
(1798, 'P9167', '0', 'YKMPB', 'ZPICR', '1'),
(1799, 'P82540', '0', '3LGIT', 'IY6A0', '1'),
(1800, 'P85803', '0', 'Q318X', '5D3A8', '1'),
(1801, 'P76798', '0', 'WNH2O', 'ZPICR', '1'),
(1802, 'P4036', '0', 'MGHOJ', '5IP33', '1'),
(1803, 'P5119', '0', 'XPM9E', '5IP33', '1'),
(1804, 'P23545', '0', 'N5IHY', '46W8L', '1'),
(1805, 'P40745', '0', '1UJ6A', 'ZPICR', '1'),
(1806, 'P45029', '0', 'G3HAO', 'ZPICR', '1'),
(1807, 'P22482', '0', 'D9XFN', 'ZPICR', '1'),
(1808, 'P38042', '0', 'VV5P7', 'ZPICR', '1'),
(1809, 'P8284', '0', 'FUPSZ', 'ZPICR', '1'),
(1810, 'P29250', '0', 'IQR9I', 'p097w', '1'),
(1811, 'P67785', '0', 'RJ8GT', '140687', '1'),
(1812, 'P8884', '0', '9RZ8N', '5IP33', '1'),
(1813, 'P9823', '0', 'YZ949', '5IP33', '1'),
(1814, 'P40367', '0', 'ICA2S', '5IP33', '1'),
(1815, 'P56365', '0', 'Q426E', 'E6WBR', '1'),
(1816, 'P98042', '0', 'OLFJ4', '3LGIT', '1'),
(1817, 'P44408', '0', 'JNXAZ', '5D09X', '1'),
(1818, 'P14845', '0', '3E5QH', '5IP33', '1'),
(1819, 'P-60468', '0', 'SOE44', 'FZSSN', '1'),
(1820, 'P54556', '0', 'SJ2Q5', 'FZASN', '1'),
(1821, 'P61477', '0', 'MZM4W', 'SVFPR', '1'),
(1822, 'P-18999', '0', 'HQSYL', 'D5M5F', '1'),
(1823, 'P61391', '0', 'N09TS', '5D09X', '1'),
(1824, 'P69956', '0', 'ZHWE2', 'N09TS', '1'),
(1825, 'P12191', '0', 'IIY8P', 'YF7GC', '1'),
(1826, 'P33449', '0', 'UYVIT', '22LWX', '1'),
(1827, 'P-70733', '0', '1VU84', 'E6WBR', '1'),
(1828, 'P-23024', '0', 'P8DP8', 'P097W', '1'),
(1829, 'P43607', '0', 'Y5BA1', 'YF7GC', '1'),
(1830, 'P94793', '0', 'L6Z18', 'ZPICR', '1'),
(1831, 'P41113', '0', '1IQMD', 'N09TS', '1'),
(1832, 'P-68740', '0', 'DG351', '75PLU', '1'),
(1833, 'P22550', '0', 'EQD25', 'D5M5F', '1'),
(1834, 'P55606', '0', 'HE5S5', 'W4YJ8', '1'),
(1835, 'P-97024', '0', 'CBYBL', 'HE5S5', '1'),
(1836, 'P92316', '0', 'U6A7W', 'R4HN5', '1'),
(1837, 'P42831', '0', 'EN8CN', 'ZPICR', '1'),
(1838, 'P49938', '0', '9346C', 'EQD25', '1'),
(1839, 'P-97208', '0', 'PJYWP', 'AQU5S', '1'),
(1840, 'P56571', '0', 'K4FG1', 'AQU5S', '1'),
(1841, 'P41112', '0', 'I1XA3', 'EQD25', '1'),
(1842, 'P27374', 'P92316', 'IB6BF', 'U6A7W', '1'),
(1843, 'P-84080', 'P41112', 'W20M0', 'I1XA3', '1'),
(1844, 'P-81394', 'P41112', '57U29', 'I1XA3', '1'),
(1845, 'P25143', 'P41112', 'J3DQ5', 'I1XA3', '1'),
(1846, 'P-88383', 'P84080', 'ACC13', 'W20M0', '1'),
(1847, 'P34530', 'P41112', 'EK7JI', 'I1XA3', '1'),
(1848, 'P84756', 'P261115', 'ZQQJD', 'XLLE1', '1'),
(1849, 'P-12176', 'P261115', 'QBKST', 'XLLE1', '1'),
(1850, 'P28061', 'P261115', 'K5E2J', 'XLLE1', '1'),
(1851, 'P-47903', 'P41112', '56FIH', 'I1XA3', '1'),
(1852, 'P-8969', 'P60316', 'AOLVJ', 'AQU5S', '1'),
(1853, 'P23217', 'P41112', 'QCCRP', 'I1XA3', '1'),
(1854, 'P49195', 'P261115', '5A4ZO', 'XLLE1', '1'),
(1855, 'P60007', NULL, '0NRJ6', '123456', '1'),
(1856, 'P30475', 'P61391', 'THMA8', 'N09TS', '1'),
(1857, 'P27715', 'P261115', '6RKOC', 'xlle1', '1'),
(1858, 'P44554', 'P41112', 'VP9E9', 'I1XA3', '1'),
(1859, 'P6485', 'P170555', 'CAJR6', '46W8L', '1'),
(1860, 'P70933', 'P22550', 'APZRS', 'EQD25', '1'),
(1861, 'P65621', 'P61391', 'BLF6A', 'N09TS', '1'),
(1862, 'P-4774', 'P78026', 'HVNAO', 'YF7GC', '1'),
(1863, 'P4941', 'P30475', 'CP4ZX', 'THMA8', '1'),
(1864, 'P-52909', 'P78026', 'HF7JN', 'YF7GC', '1'),
(1865, 'P90209', 'P78026', '824NN', 'YF7GC', '1'),
(1866, 'P22596', 'P78026', 'VCCFI', 'YF7GC', '1'),
(1867, 'P82035', 'P185543', 'D7E9J', 'E6WBR', '1'),
(1868, 'P-17010', 'P185543', 'UYH4E', 'E6WBR', '1'),
(1869, 'P76506', 'P78026', 'XS700', 'YF7GC', '1'),
(1870, 'P13174', 'P78026', '56QOY', 'YF7GC', '1'),
(1871, 'P-66912', 'P78026', 'NYMEZ', 'YF7GC', '1'),
(1872, 'P87693', 'P22550', 'EZXQN', 'EQD25', '1'),
(1873, 'P-60735', 'P78026', 'IZR94', 'YF7GC', '1'),
(1874, 'P-77433', 'P78026', 'JBY92', 'YF7GC', '1'),
(1875, 'P55981', 'P78026', '8FCT4', 'YF7GC', '1'),
(1876, 'P-13194', 'P78026', '808BS', 'YF7GC', '1'),
(1877, 'P34507', 'P78026', '2P7DD', 'YF7GC', '1'),
(1878, 'P44482', 'P170555', 'H8P4J', '46W8L', '1'),
(1879, 'P-18791', 'P41113', 'F66KJ', '1IQMD', '1'),
(1880, 'P-96141', 'P44482', 'PHEHU', 'H8P4J', '1'),
(1881, 'P-90088', 'P261115', '8BU4J', 'XLLE1', '1'),
(1882, 'P78461', 'P41113', 'W51SN', '1IQMD', '1'),
(1883, 'P18133', 'P12191', 'PY65T', 'IIY8P', '1'),
(1884, 'P-74363', 'P41113', 'KGRUB', '1IQMD', '1'),
(1885, 'P-26311', 'P170555', 'FJ8QY', '46W8L', '1'),
(1886, 'P-31427', 'P43920', '5YJ5S', '5D09X', '1'),
(1887, 'P-32624', 'P87693', 'LGHJC', 'EZXQN', '1'),
(1888, 'P92655', 'P87693', '8EP6T', 'EZXQN', '1'),
(1889, 'P-33804', 'P87693', 'VGRRM', 'EZXQN', '1'),
(1890, 'P93881', 'P92655', 'M5RIG', '8EP6T', '1'),
(1891, 'P-72097', 'P273052', 'CR7HD', 'P097W', '1'),
(1892, 'P6478', 'P43920', 'LIGRK', '5D09X', '1'),
(1893, 'P83678', 'P41113', 'HYU0D', '1IQMD', '1'),
(1894, 'P79387', 'P261115', 'DUVTC', 'XLLE1', '1'),
(1895, 'P18318', NULL, '0BINR', 'XLL1', '1'),
(1896, 'P-25706', 'P261115', 'L1REL', 'XLLE1', '1'),
(1897, 'P-95925', 'P261115', 'CNKMT', 'XLLE1', '1'),
(1898, 'P-12470', 'P261115', 'R8OM3', 'XLLE1', '1'),
(1899, 'P-82012', 'P261115', '5N7UH', 'XLLE1', '1'),
(1900, 'P-3757', 'P83678', '87CYD', 'HYU0D', '1'),
(1901, 'P48927', 'P41113', 'T2OD3', '1IQMD', '1'),
(1902, 'P50686', 'P43920', '4NG1U', '5D09X', '1'),
(1903, 'P23534', 'P78026', 'AI0GL', 'YF7GC', '1'),
(1904, 'P-95638', NULL, 'ML2O4', '124', '1'),
(1905, 'P-59275', 'P43920', 'W1RGC', '5D09X', '1'),
(1906, 'P-45168', 'P6485', 'G74LP', 'CAJR6', '1'),
(1907, 'P9749', 'P43920', 'BZ7JO', '5D09X', '1'),
(1908, 'P-69151', 'P43920', 'CAZDO', '5D09X', '1'),
(1909, 'P-56242', 'P78026', 'T0JU3', 'YF7GC', '1'),
(1910, 'P-69940', 'P22550', 'FEWTL', 'EQD25', '1'),
(1911, 'P-18468', 'P78026', '8OZF5', 'YF7GC', '1'),
(1912, 'P-75901', 'P78026', '2MTXP', 'YF7GC', '1'),
(1913, 'P-99168', NULL, '4758O', '46WBL', '1'),
(1914, 'P52268', NULL, 'S7JPZ', '050920', '1'),
(1915, 'P64785', 'P1700903922', '1S88D', 'K3922', '1'),
(1916, 'P-30502', 'P41113', 'VOBKZ', '1IQMD', '1'),
(1917, 'P30578', 'P170555', 'UOFJO', '46W8L', '1'),
(1918, 'P-70189', 'P41113', '48D9K', '1IQMD', '1'),
(1919, 'P36345', 'P1700903922', '1FV0N', 'K3922', '1'),
(1920, 'P-24622', 'P1700903922', 'GKACW', 'K3922', '1'),
(1921, 'P-10763', 'P60316', 'H15P6', 'AQU5S', '1'),
(1922, 'P59215', 'P1700903922', 'ZJYZ4', 'K3922', '1'),
(1923, 'P92368', 'P30578', 'LLCMV', 'UOFJO', '1'),
(1924, 'P77002', 'P30578', 'RJW9C', 'UOFJO', '1'),
(1925, 'P69466', 'P1700903922', 'ZM54B', 'k3922', '1'),
(1926, 'P11736', 'P9710', 'DQOVO', 'RFK2L', '1'),
(1927, 'P-78222', 'P30578', '451XU', 'UOFJO', '1'),
(1928, 'P-58682', 'P1700903922', 'KFI5F', 'K3922', '1'),
(1929, 'P68189', 'P30578', '35S9G', 'UOFJO', '1'),
(1930, 'P95153', 'P60316', 'TAUW4', 'AQU5S', '1'),
(1931, 'P91427', 'P30578', 'XRZ5A', 'UOFJO', '1'),
(1932, 'P-20331', 'P30578', '8AZKX', 'UOFJO', '1'),
(1933, 'P94758', 'P88383', 'ABTO2', 'ACC13', '1'),
(1934, 'P70720', 'P30578', 'HR8U6', 'UOFJO', '1'),
(1935, 'P-31743', 'P60316', 'MC32I', 'AQU5S', '1'),
(1936, 'P10474', 'P61011', 'QXXIT', 'JE9CW', '1'),
(1937, 'P-96034', NULL, 'PTLZ7', 'YE9CW', '1'),
(1938, 'P38190', 'P61011', '8KM6F', 'JE9CW', '1'),
(1939, 'P-75846', NULL, 'VB6XY', 'YE9CW', '1'),
(1940, 'P32427', 'P6478', 'ENFXV', 'LIGRK', '1'),
(1941, 'P551', 'P1700903922', 'RY3EF', 'k3922', '1'),
(1942, 'P-53832', 'P69940', '1PYCM', 'FEWTL', '1'),
(1943, 'P72254', 'P53832', 'SWD0G', '1PYCM', '1'),
(1944, 'P-6007', 'P61011', 'RBVD9', 'JE9CW', '1'),
(1945, 'P25976', 'P1703455117', '2SVEB', 'KL2342', '1'),
(1946, 'P19158', 'P1703455117', 'YMDBY', 'KL2342', '1'),
(1947, 'P31119', 'P1703455117', 'ITZPE', 'KL2342', '1'),
(1948, 'P-34186', 'P1700903848', 'UDRZP', 'kl34332', '1'),
(1949, 'P-48662', 'P170555', 'OE7DE', '46w8l', '1'),
(1950, 'P-68646', 'P1703455117', 'KFS77', 'KL2342', '1'),
(1951, 'P-51593', NULL, 'VNRWH', '123456', '1'),
(1952, 'P37341', 'P1700903922', 'POHNM', 'K3922', '1'),
(1953, 'P-31562', NULL, '3UEUW', '123', '1'),
(1954, 'P-75679', 'P9710', 'SGM6Q', 'RFK2L', '1'),
(1955, 'P-79329', NULL, 'MDOJE', 'YE3CW', '1'),
(1956, 'P83816', 'P60316', 'HNEXZ', 'AQU5S', '1'),
(1957, 'P54573', 'P1700903848', 'BU7D4', 'KL34332', '1'),
(1958, 'P-91363', 'P1700903922', 'R1YHA', 'k3922', '1'),
(1959, 'P-62466', 'P9710', '1NH9E', 'RFK2L', '1'),
(1960, 'P85170', 'P51139', 'K56OD', 'VKHMQ', '1'),
(1961, 'P10547', 'P41113', 'FPM7S', '1IQMD', '1'),
(1962, 'P-61300', 'P6007', 'D4L5V', 'RBVD9', '1'),
(1963, 'P-63016', 'P185238', 'DMJDV', 'OQ43B', '1'),
(1964, 'P65096', 'P9710', 'M2BB5', 'RFK2L', '1'),
(1965, 'P68241', 'P60316', 'KG2A7', 'AQU5S', '1'),
(1966, 'P-63558', 'P96889', '0JXSM', 'KDYBC', '1'),
(1967, 'P-35965', 'P1700903922', 'K9OQ1', 'K3922', '1'),
(1968, 'P-47184', 'P185238', 'QHVBS', 'OQ43B', '1'),
(1969, 'P62781', 'P12191', 'ALD0N', 'IIY8P', '1'),
(1970, 'P2060', 'P12191', 'U6K7D', 'IIY8P', '1'),
(1971, 'P-55291', 'P12191', 'Q6FG2', 'IIY8P', '1'),
(1972, 'P38962', 'P62781', 'CWC6U', 'ALD0N', '1'),
(1973, 'P-5138', 'P62781', 'D58OI', 'ALD0N', '1'),
(1974, 'P59660', NULL, '33DUO', 'a', '1'),
(1975, 'P-91484', 'P1700903848', '6DHG5', 'kl34332', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `requestjaket`
--

CREATE TABLE `requestjaket` (
  `id` int(11) NOT NULL,
  `id_driver` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `diterima` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `nomor` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `saldo` int(11) DEFAULT 0,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`nomor`, `id_user`, `saldo`, `update_at`) VALUES
(1037, 'P150039', 0, '2023-12-15 10:01:47'),
(1038, 'P150243', 0, '2023-12-15 10:03:56'),
(1039, 'P150915', 0, '2023-12-15 10:10:31'),
(1040, 'P151049', 0, '2023-12-15 10:12:01'),
(1041, 'P150932', 0, '2023-12-15 10:12:16'),
(1042, 'P150944', 0, '2023-12-15 10:12:32'),
(1043, 'P150943', 0, '2023-12-15 10:13:00'),
(1044, 'P151219', 0, '2023-12-15 10:13:47'),
(1045, 'P151402', 0, '2023-12-15 10:15:59'),
(1046, 'P151258', 0, '2023-12-15 10:16:24'),
(1047, 'P151123', 0, '2023-12-15 10:16:29'),
(1048, 'P151616', 0, '2023-12-15 10:17:35'),
(1049, 'P151752', 0, '2023-12-15 10:19:07'),
(1050, 'P151435', 0, '2023-12-15 10:19:47'),
(1051, 'P151930', 0, '2023-12-15 10:21:01'),
(1052, 'P152123', 0, '2023-12-15 10:22:43'),
(1053, 'P152326', 0, '2023-12-15 10:24:55'),
(1054, 'P152511', 0, '2023-12-15 10:26:23'),
(1055, 'P152454', 0, '2023-12-15 10:26:54'),
(1056, 'P152750', 0, '2023-12-15 10:30:05'),
(1057, 'P152621', 0, '2023-12-15 10:30:28'),
(1058, 'P152602', 0, '2023-12-15 10:30:40'),
(1059, 'P152719', 0, '2023-12-15 10:31:10'),
(1060, 'P151905', 0, '2023-12-15 10:31:43'),
(1061, 'P153321', 0, '2023-12-15 10:37:39'),
(1062, 'P153532', 0, '2023-12-15 10:37:56'),
(1063, 'P153534', 0, '2023-12-15 10:40:21'),
(1064, 'P153859', 0, '2023-12-15 10:40:29'),
(1065, 'P154344', 0, '2023-12-15 10:45:15'),
(1066, 'P150209', 0, '2023-12-15 11:03:31'),
(1067, 'P150224', 0, '2023-12-15 11:03:58'),
(1068, 'P150349', 0, '2023-12-15 11:05:11'),
(1069, 'P150417', 0, '2023-12-15 11:05:40'),
(1070, 'P150538', 0, '2023-12-15 11:07:05'),
(1071, 'P150553', 0, '2023-12-15 11:07:27'),
(1072, 'P150725', 0, '2023-12-15 11:08:38'),
(1073, 'P150740', 0, '2023-12-15 11:08:57'),
(1074, 'P150857', 0, '2023-12-15 11:10:04'),
(1075, 'P150911', 0, '2023-12-15 11:10:19'),
(1076, 'P151020', 0, '2023-12-15 11:11:19'),
(1077, 'P151134', 0, '2023-12-15 11:12:40'),
(1078, 'P151257', 0, '2023-12-15 11:14:05'),
(1079, 'P151427', 0, '2023-12-15 11:15:34'),
(1080, 'P151550', 0, '2023-12-15 11:16:55'),
(1081, 'P151710', 0, '2023-12-15 11:18:32'),
(1082, 'P151852', 0, '2023-12-15 11:20:09'),
(1083, 'P152132', 0, '2023-12-15 11:22:49'),
(1084, 'P152305', 0, '2023-12-15 11:24:18'),
(1085, 'P152435', 0, '2023-12-15 11:25:42'),
(1086, 'P152601', 0, '2023-12-15 11:26:59'),
(1087, 'P152720', 0, '2023-12-15 11:28:28'),
(1088, 'P152844', 0, '2023-12-15 11:29:54'),
(1089, 'P153009', 0, '2023-12-15 11:31:13'),
(1090, 'P153128', 0, '2023-12-15 11:32:44'),
(1091, 'P153259', 0, '2023-12-15 11:34:05'),
(1092, 'P153420', 0, '2023-12-15 11:35:33'),
(1093, 'P153550', 0, '2023-12-15 11:36:54'),
(1094, 'P151037', 0, '2023-12-15 12:11:57'),
(1095, 'P151215', 0, '2023-12-15 12:13:27'),
(1096, 'P151350', 0, '2023-12-15 12:14:55'),
(1097, 'P151513', 0, '2023-12-15 12:16:37'),
(1098, 'P151652', 0, '2023-12-15 12:18:00'),
(1099, 'P151817', 0, '2023-12-15 12:19:35'),
(1100, 'P151952', 0, '2023-12-15 12:21:00'),
(1101, 'P152116', 0, '2023-12-15 12:22:32'),
(1102, 'P152306', 0, '2023-12-15 12:24:11'),
(1103, 'P152433', 0, '2023-12-15 12:25:37'),
(1104, 'P152606', 0, '2023-12-15 12:27:20'),
(1105, 'P152751', 0, '2023-12-15 12:29:24'),
(1106, 'P152946', 0, '2023-12-15 12:31:18'),
(1107, 'P153142', 0, '2023-12-15 12:32:52'),
(1108, 'P153307', 0, '2023-12-15 12:34:12'),
(1109, 'P153431', 0, '2023-12-15 12:35:40'),
(1110, 'P153558', 0, '2023-12-15 12:37:01'),
(1111, 'P153716', 0, '2023-12-15 12:38:30'),
(1112, 'P153852', 0, '2023-12-15 12:40:06'),
(1113, 'P154035', 0, '2023-12-15 12:42:10'),
(1114, 'P154258', 0, '2023-12-15 12:44:29'),
(1115, 'P154445', 0, '2023-12-15 12:46:01'),
(1116, 'P154623', 0, '2023-12-15 12:47:46'),
(1117, 'P154802', 0, '2023-12-15 12:49:30'),
(1118, 'P154850', 0, '2023-12-15 12:50:57'),
(1119, 'P155021', 0, '2023-12-15 12:51:29'),
(1120, 'P155704', 0, '2023-12-15 12:59:37'),
(1121, 'P155954', 0, '2023-12-15 13:01:03'),
(1122, 'P150131', 0, '2023-12-15 13:02:35'),
(1123, 'P150153', 0, '2023-12-15 13:03:03'),
(1124, 'P150324', 0, '2023-12-15 13:04:45'),
(1125, 'P150503', 0, '2023-12-15 13:07:24'),
(1126, 'P150739', 0, '2023-12-15 13:08:44'),
(1127, 'P154613', 0, '2023-12-15 13:48:17'),
(1128, 'D1702624552', 10000, '2023-12-15 14:15:52'),
(1129, 'P151538', 0, '2023-12-15 14:16:40'),
(1130, 'P151705', 0, '2023-12-15 14:18:26'),
(1131, 'P151903', 0, '2023-12-15 14:20:33'),
(1132, 'P152053', 0, '2023-12-15 14:22:42'),
(1133, 'P152451', 0, '2023-12-15 14:26:23'),
(1134, 'P152748', 0, '2023-12-15 14:29:11'),
(1135, 'D1702625357', 10000, '2023-12-15 14:29:17'),
(1136, 'P152928', 0, '2023-12-15 14:30:33'),
(1137, 'P153049', 0, '2023-12-15 14:32:06'),
(1138, 'P154105', 0, '2023-12-15 14:45:34'),
(1139, 'P154200', 0, '2023-12-15 14:47:27'),
(1140, 'P155624', 0, '2023-12-15 14:59:42'),
(1141, 'P154459', 0, '2023-12-15 16:46:24'),
(1142, 'P154710', 0, '2023-12-15 16:48:26'),
(1143, 'P154846', 0, '2023-12-15 16:49:45'),
(1144, 'P155039', 0, '2023-12-15 16:51:42'),
(1145, 'P154955', 0, '2023-12-15 16:55:39'),
(1146, 'P152244', 0, '2023-12-15 17:24:47'),
(1147, 'P153618', 0, '2023-12-15 17:37:51'),
(1148, 'P154534', 0, '2023-12-15 17:48:20'),
(1149, 'P155318', 0, '2023-12-15 17:54:40'),
(1150, 'P155540', 0, '2023-12-15 17:56:57'),
(1151, 'P155713', 0, '2023-12-15 17:58:18'),
(1152, 'P155829', 0, '2023-12-15 17:59:30'),
(1153, 'P150004', 0, '2023-12-15 18:01:06'),
(1154, 'P150159', 0, '2023-12-15 18:02:55'),
(1155, 'P150355', 0, '2023-12-15 18:05:31'),
(1404, 'P170841', 0, '2023-12-17 17:14:41'),
(1157, 'P154603', 0, '2023-12-15 18:48:56'),
(1158, 'P154908', 0, '2023-12-15 18:50:15'),
(1159, 'P155051', 0, '2023-12-15 18:52:41'),
(1160, 'P155317', 0, '2023-12-15 18:54:46'),
(1161, 'P155504', 0, '2023-12-15 18:57:34'),
(1162, 'P155808', 0, '2023-12-15 19:00:02'),
(1163, 'P151245', 0, '2023-12-15 19:13:59'),
(1164, 'P151831', 0, '2023-12-15 19:20:02'),
(1165, 'P152114', 0, '2023-12-15 19:22:30'),
(1166, 'P152301', 0, '2023-12-15 19:24:36'),
(1167, 'P152818', 0, '2023-12-15 19:29:38'),
(1168, 'P152959', 0, '2023-12-15 19:31:23'),
(1169, 'P153016', 0, '2023-12-15 19:31:30'),
(1170, 'P153140', 0, '2023-12-15 19:33:02'),
(1171, 'P153322', 0, '2023-12-15 19:34:45'),
(1172, 'P153342', 0, '2023-12-15 19:35:25'),
(1173, 'P153643', 0, '2023-12-15 19:37:42'),
(1174, 'P153631', 0, '2023-12-15 19:38:02'),
(1175, 'P153755', 0, '2023-12-15 19:39:26'),
(1176, 'P153958', 0, '2023-12-15 19:41:18'),
(1177, 'P154055', 0, '2023-12-15 19:42:12'),
(1178, 'P154328', 0, '2023-12-15 19:44:53'),
(1179, 'P154505', 0, '2023-12-15 19:46:05'),
(1180, 'P155323', 0, '2023-12-15 19:55:37'),
(1181, 'P150807', 0, '2023-12-15 20:09:34'),
(1182, 'P150910', 0, '2023-12-15 20:10:21'),
(1183, 'P151042', 0, '2023-12-15 20:12:11'),
(1184, 'P151250', 0, '2023-12-15 20:13:57'),
(1185, 'P151227', 0, '2023-12-15 20:14:08'),
(1186, 'P151433', 0, '2023-12-15 20:17:36'),
(1187, 'P151849', 19550, '2023-12-15 20:19:37'),
(1188, 'P153452', 0, '2023-12-15 20:36:16'),
(1189, 'P154119', 0, '2023-12-15 20:43:01'),
(1190, 'P155917', 0, '2023-12-15 21:01:34'),
(1191, 'P154236', 0, '2023-12-15 21:44:17'),
(1192, 'P155535', 0, '2023-12-15 21:56:55'),
(1193, 'P150337', 0, '2023-12-15 22:04:37'),
(1194, 'P152014', 0, '2023-12-15 22:21:57'),
(1195, 'P152732', 0, '2023-12-15 22:29:01'),
(1196, 'P153749', 0, '2023-12-15 22:38:22'),
(1197, 'P150150', 0, '2023-12-15 23:04:16'),
(1198, 'P151222', 0, '2023-12-15 23:13:46'),
(1199, 'P151547', 0, '2023-12-15 23:17:39'),
(1200, 'P152614', 0, '2023-12-15 23:27:33'),
(1201, 'P153102', 0, '2023-12-15 23:32:07'),
(1202, 'P153302', 0, '2023-12-15 23:33:57'),
(1203, 'P161516', 0, '2023-12-16 01:16:47'),
(1204, 'P164208', 0, '2023-12-16 06:44:04'),
(1205, 'P164818', 0, '2023-12-16 06:52:03'),
(1206, 'P165206', 2000, '2023-12-16 06:55:16'),
(1207, 'P165308', 0, '2023-12-16 06:56:33'),
(1208, 'M20607', 0, '2023-12-16 07:12:26'),
(1209, 'D1702686990', 760, '2023-12-16 07:36:30'),
(1210, 'P161133', 0, '2023-12-16 08:13:16'),
(1211, 'P164013', 2000, '2023-12-16 08:42:41'),
(1212, 'P164719', 0, '2023-12-16 08:50:56'),
(1213, 'P165517', 0, '2023-12-16 08:59:10'),
(1214, 'P160026', 0, '2023-12-16 09:04:35'),
(1215, 'P161223', 0, '2023-12-16 09:13:20'),
(1216, 'P161347', 0, '2023-12-16 09:14:48'),
(1217, 'D1702693643', 10000, '2023-12-16 09:27:23'),
(1218, 'P162918', 0, '2023-12-16 09:34:21'),
(1219, 'P163859', 450, '2023-12-16 09:41:46'),
(1220, 'P165049', 0, '2023-12-16 09:53:43'),
(1221, 'P160328', 0, '2023-12-16 10:05:47'),
(1222, 'D1702696559', 50000, '2023-12-16 10:15:59'),
(2750, 'P76506', 0, '2024-01-18 12:06:22'),
(1224, 'P164008', 0, '2023-12-16 11:41:25'),
(1225, 'P164150', 0, '2023-12-16 11:45:22'),
(1226, 'P164540', 0, '2023-12-16 11:47:18'),
(1227, 'P162126', 0, '2023-12-16 12:22:36'),
(1228, 'P164644', 0, '2023-12-16 12:48:23'),
(1229, 'P164921', 0, '2023-12-16 12:50:51'),
(1230, 'P165113', 0, '2023-12-16 12:53:18'),
(1231, 'P165444', 0, '2023-12-16 12:57:04'),
(1232, 'P160133', 0, '2023-12-16 13:03:15'),
(1233, 'P160413', 0, '2023-12-16 13:06:10'),
(1234, 'P160652', 0, '2023-12-16 13:08:36'),
(1235, 'P160904', 0, '2023-12-16 13:10:37'),
(1236, 'P161300', 0, '2023-12-16 13:14:58'),
(1237, 'P161900', 0, '2023-12-16 13:20:33'),
(1238, 'P162102', 0, '2023-12-16 13:22:25'),
(1239, 'P162308', 0, '2023-12-16 13:24:23'),
(1240, 'P162453', 0, '2023-12-16 13:26:15'),
(1241, 'P162653', 0, '2023-12-16 13:28:05'),
(1242, 'P162412', 0, '2023-12-16 13:29:03'),
(1243, 'P162851', 0, '2023-12-16 13:31:20'),
(1244, 'P163148', 0, '2023-12-16 13:33:14'),
(1245, 'P163233', 0, '2023-12-16 13:34:30'),
(1246, 'P163342', 0, '2023-12-16 13:35:03'),
(1247, 'P162244', 0, '2023-12-16 14:24:06'),
(1248, 'P162605', 0, '2023-12-16 14:27:40'),
(1249, 'P163115', 0, '2023-12-16 14:32:59'),
(1250, 'P163327', 0, '2023-12-16 14:35:29'),
(1251, 'P163607', 0, '2023-12-16 14:37:54'),
(1252, 'P164221', 0, '2023-12-16 14:45:04'),
(1253, 'P163425', 0, '2023-12-16 16:35:17'),
(1254, 'P160113', 0, '2023-12-16 17:02:31'),
(1255, 'P160719', 0, '2023-12-16 17:08:47'),
(1256, 'P160918', 0, '2023-12-16 17:10:53'),
(1257, 'P160656', 0, '2023-12-16 20:08:10'),
(1258, 'P160839', 0, '2023-12-16 20:10:24'),
(1259, 'P161047', 0, '2023-12-16 20:12:17'),
(1260, 'P161237', 0, '2023-12-16 20:14:00'),
(1261, 'P161423', 0, '2023-12-16 20:15:59'),
(1262, 'P162657', 2000, '2023-12-16 20:32:13'),
(1263, 'P164219', 0, '2023-12-16 20:48:47'),
(1264, 'P165642', 0, '2023-12-16 20:58:05'),
(1265, 'P165857', 0, '2023-12-16 21:00:13'),
(1266, 'P164609', 0, '2023-12-16 21:48:04'),
(1267, 'P162311', 0, '2023-12-16 22:27:39'),
(1268, 'P164259', 0, '2023-12-16 22:46:17'),
(1269, 'P171605', 2550, '2023-12-17 00:20:43'),
(1270, 'P171800', 0, '2023-12-17 00:24:52'),
(1271, 'P172205', 3950, '2023-12-17 00:31:58'),
(1272, 'P173526', 3950, '2023-12-17 00:37:03'),
(1273, 'P173256', 50000, '2023-12-17 00:38:16'),
(1274, 'P174203', 50000, '2023-12-17 00:43:58'),
(1275, 'P174313', 145, '2023-12-17 00:45:29'),
(1276, 'P174440', 1625, '2023-12-17 00:47:01'),
(1277, 'P173738', 50000, '2023-12-17 00:47:11'),
(1278, 'P175058', 4300, '2023-12-17 00:52:19'),
(1279, 'P174646', 4300, '2023-12-17 00:54:27'),
(1280, 'P175145', 50000, '2023-12-17 00:59:56'),
(1281, 'P170023', 145, '2023-12-17 01:01:35'),
(1282, 'P170550', 4650, '2023-12-17 01:07:48'),
(1283, 'P171009', 225, '2023-12-17 01:12:49'),
(1284, 'P171133', 20000, '2023-12-17 01:15:03'),
(1285, 'P171031', 20000, '2023-12-17 01:18:02'),
(1286, 'P171949', 9535, '2023-12-17 01:25:23'),
(1287, 'P172150', -20520, '2023-12-17 01:25:34'),
(1288, 'P173304', 3607, '2023-12-17 01:37:02'),
(1289, 'P174314', 0, '2023-12-17 01:44:52'),
(1290, 'P174015', 0, '2023-12-17 01:47:39'),
(1291, 'P170030', 0, '2023-12-17 07:02:51'),
(1292, 'P175950', 0, '2023-12-17 10:02:37'),
(1293, 'P170050', 0, '2023-12-17 10:03:28'),
(1294, 'P170623', 0, '2023-12-17 10:07:49'),
(1295, 'P170338', 0, '2023-12-17 10:09:40'),
(1296, 'P170752', 0, '2023-12-17 10:10:40'),
(1297, 'P170309', 0, '2023-12-17 10:11:50'),
(1298, 'P171333', 0, '2023-12-17 10:17:28'),
(1299, 'P171212', 0, '2023-12-17 10:19:46'),
(1300, 'P171637', 0, '2023-12-17 10:20:11'),
(1301, 'P171913', 0, '2023-12-17 10:20:27'),
(1302, 'P172120', 0, '2023-12-17 10:25:28'),
(1303, 'P172505', 0, '2023-12-17 10:26:24'),
(1304, 'P172226', 0, '2023-12-17 10:26:24'),
(1305, 'P172618', 0, '2023-12-17 10:27:19'),
(1306, 'P172539', 0, '2023-12-17 10:29:01'),
(1307, 'P173028', 0, '2023-12-17 10:32:13'),
(1308, 'P173459', 0, '2023-12-17 10:37:09'),
(1309, 'P172911', 0, '2023-12-17 10:37:46'),
(1310, 'P173725', 0, '2023-12-17 10:38:26'),
(1311, 'P173734', 0, '2023-12-17 10:38:42'),
(1312, 'P173543', 0, '2023-12-17 10:39:14'),
(1313, 'P173334', 0, '2023-12-17 10:40:03'),
(1314, 'P173948', 0, '2023-12-17 10:41:13'),
(1315, 'P174022', 0, '2023-12-17 10:41:46'),
(1316, 'P174013', 0, '2023-12-17 10:43:03'),
(1317, 'P170926', 0, '2023-12-17 10:44:57'),
(1318, 'P173805', 0, '2023-12-17 10:45:39'),
(1319, 'P174430', 0, '2023-12-17 10:45:55'),
(1320, 'P174435', 0, '2023-12-17 10:49:10'),
(1321, 'P174602', 0, '2023-12-17 10:49:43'),
(1322, 'P174823', 0, '2023-12-17 10:50:31'),
(1323, 'P173701', 0, '2023-12-17 10:51:47'),
(1324, 'P174846', 0, '2023-12-17 10:53:29'),
(1325, 'P175038', 0, '2023-12-17 10:55:05'),
(1326, 'P174920', 0, '2023-12-17 10:55:12'),
(1327, 'P175105', 0, '2023-12-17 10:55:27'),
(1328, 'P174936', 0, '2023-12-17 10:55:40'),
(1329, 'P175246', 0, '2023-12-17 10:57:02'),
(1330, 'P175516', 0, '2023-12-17 10:57:18'),
(1331, 'P172906', 0, '2023-12-17 10:58:14'),
(1332, 'P175322', 0, '2023-12-17 10:59:14'),
(1333, 'P170133', 0, '2023-12-17 11:03:49'),
(1334, 'P170948', 0, '2023-12-17 11:13:36'),
(1335, 'P172016', 0, '2023-12-17 11:21:45'),
(1336, 'P172517', 0, '2023-12-17 11:26:07'),
(1337, 'P174036', 0, '2023-12-17 11:41:53'),
(1338, 'P173739', 0, '2023-12-17 11:42:17'),
(1339, 'P174042', 0, '2023-12-17 11:44:13'),
(1340, 'P173748', 0, '2023-12-17 11:49:10'),
(1341, 'P174159', 0, '2023-12-17 11:50:06'),
(1342, 'P175332', 0, '2023-12-17 11:55:00'),
(1343, 'P175758', 0, '2023-12-17 11:59:52'),
(1344, 'P175531', 0, '2023-12-17 12:00:32'),
(1345, 'P175533', 0, '2023-12-17 12:03:53'),
(1346, 'P170458', 0, '2023-12-17 12:07:33'),
(1347, 'P170530', 0, '2023-12-17 12:12:08'),
(1348, 'P171554', 0, '2023-12-17 12:17:54'),
(1349, 'P172105', 0, '2023-12-17 12:24:09'),
(1350, 'P172400', 0, '2023-12-17 12:28:03'),
(1351, 'P173225', 0, '2023-12-17 12:37:27'),
(1352, 'P170021', 0, '2023-12-17 12:38:28'),
(1353, 'P174607', 0, '2023-12-17 12:47:02'),
(1354, 'P175239', 0, '2023-12-17 12:57:30'),
(1355, 'P174438', 0, '2023-12-17 13:01:49'),
(1356, 'P175818', 0, '2023-12-17 13:04:34'),
(1357, 'P170427', 0, '2023-12-17 13:06:30'),
(1358, 'P170548', 0, '2023-12-17 13:09:51'),
(1359, 'P170637', 0, '2023-12-17 13:10:20'),
(1360, 'P170906', 0, '2023-12-17 13:10:44'),
(1361, 'P171102', 0, '2023-12-17 13:11:57'),
(1362, 'P171154', 0, '2023-12-17 13:13:23'),
(1363, 'P171713', 0, '2023-12-17 13:17:36'),
(1364, 'P171830', 0, '2023-12-17 13:19:20'),
(1365, 'P171639', 0, '2023-12-17 13:21:15'),
(1366, 'P172402', 0, '2023-12-17 13:26:35'),
(1367, 'P172736', 0, '2023-12-17 13:28:32'),
(1368, 'P172654', 0, '2023-12-17 13:29:14'),
(1369, 'D1702794976', 10000, '2023-12-17 13:36:16'),
(1370, 'P173429', 0, '2023-12-17 13:37:05'),
(1371, 'P173203', 0, '2023-12-17 13:37:20'),
(1372, 'P173250', 0, '2023-12-17 13:37:27'),
(1373, 'P173835', 0, '2023-12-17 13:41:03'),
(1374, 'P173928', 0, '2023-12-17 13:41:07'),
(1375, 'P173814', 0, '2023-12-17 13:44:18'),
(1376, 'P174605', 0, '2023-12-17 13:51:03'),
(1377, 'P175232', 0, '2023-12-17 13:55:46'),
(1378, 'P175908', 0, '2023-12-17 14:02:05'),
(1379, 'P171436', 0, '2023-12-17 14:16:35'),
(1380, 'P173252', 0, '2023-12-17 14:36:13'),
(1381, 'P173915', 0, '2023-12-17 14:46:13'),
(1382, 'P174700', 0, '2023-12-17 14:50:12'),
(1383, 'P175507', 0, '2023-12-17 14:56:33'),
(1384, 'P175709', 0, '2023-12-17 15:02:42'),
(1385, 'P170101', 0, '2023-12-17 15:02:45'),
(1386, 'P170834', 0, '2023-12-17 15:09:43'),
(1387, 'P171101', 0, '2023-12-17 15:15:12'),
(1388, 'P170705', 0, '2023-12-17 15:31:23'),
(1389, 'P173241', 0, '2023-12-17 15:49:15'),
(1390, 'P174817', 0, '2023-12-17 15:49:34'),
(1391, 'P175022', 0, '2023-12-17 15:52:15'),
(1392, 'P175307', 0, '2023-12-17 15:54:01'),
(1393, 'P175548', 0, '2023-12-17 15:57:04'),
(1394, 'P175731', 0, '2023-12-17 15:58:28'),
(1395, 'P175929', 0, '2023-12-17 16:01:16'),
(1396, 'P170049', 0, '2023-12-17 16:03:55'),
(1397, 'P171303', 0, '2023-12-17 16:17:27'),
(1398, 'P172632', 10000, '2023-12-17 16:29:17'),
(1399, 'P172617', 0, '2023-12-17 16:31:59'),
(1400, 'P172921', 0, '2023-12-17 16:35:19'),
(1401, 'P173540', 0, '2023-12-17 16:36:15'),
(1402, 'P175053', 0, '2023-12-17 16:51:48'),
(1405, 'P171652', 0, '2023-12-17 17:19:27'),
(1406, 'P171904', 0, '2023-12-17 17:21:08'),
(1407, 'P171912', 0, '2023-12-17 17:21:36'),
(1829, 'P195448', 0, '2023-12-19 14:55:52'),
(1409, 'P171945', 0, '2023-12-17 17:23:20'),
(2647, 'P51139', 6000, '2024-01-07 15:26:54'),
(1411, 'P172106', 0, '2023-12-17 17:26:04'),
(1412, 'P172342', 0, '2023-12-17 17:26:46'),
(1413, 'D1702809158', 687922, '2023-12-17 17:32:38'),
(1414, 'P174016', 0, '2023-12-17 17:44:31'),
(1415, 'P174122', 0, '2023-12-17 17:45:31'),
(1416, 'P174635', 0, '2023-12-17 17:49:40'),
(1417, 'P174636', 0, '2023-12-17 17:50:15'),
(1418, 'P174857', 0, '2023-12-17 17:52:05'),
(1419, 'P175215', 0, '2023-12-17 17:58:20'),
(1420, 'P175707', 0, '2023-12-17 17:58:23'),
(1421, 'P170036', 0, '2023-12-17 18:01:23'),
(1422, 'P170729', 0, '2023-12-17 18:10:15'),
(1423, 'P171347', 0, '2023-12-17 18:19:22'),
(1424, 'P170615', 0, '2023-12-17 18:24:12'),
(1425, 'P172223', 0, '2023-12-17 18:24:26'),
(1426, 'P172137', 0, '2023-12-17 18:25:58'),
(1427, 'P172040', 0, '2023-12-17 18:27:14'),
(1428, 'P172548', 0, '2023-12-17 18:31:17'),
(1429, 'P173729', 0, '2023-12-17 18:37:49'),
(1430, 'P172047', 0, '2023-12-17 18:38:10'),
(1431, 'P174547', 0, '2023-12-17 18:49:36'),
(1432, 'P174446', 0, '2023-12-17 18:53:33'),
(1433, 'P175012', 2000, '2023-12-17 18:53:37'),
(1434, 'P171645', 0, '2023-12-17 19:22:06'),
(1435, 'P172124', 0, '2023-12-17 19:23:44'),
(1436, 'P172428', 0, '2023-12-17 19:29:13'),
(1437, 'P172752', 0, '2023-12-17 19:31:31'),
(1438, 'P170405', 0, '2023-12-17 19:41:41'),
(1439, 'P174241', 0, '2023-12-17 19:46:46'),
(1440, 'P175040', 0, '2023-12-17 19:54:53'),
(1441, 'P175424', 0, '2023-12-17 19:56:23'),
(1442, 'P175708', 0, '2023-12-17 19:59:52'),
(1443, 'P175646', 0, '2023-12-17 20:04:25'),
(1444, 'P170546', 0, '2023-12-17 20:07:17'),
(1445, 'P170750', 0, '2023-12-17 20:10:40'),
(1446, 'P170914', 0, '2023-12-17 20:11:32'),
(1447, 'P171305', 0, '2023-12-17 20:15:49'),
(1448, 'P171250', 0, '2023-12-17 20:17:08'),
(1449, 'P172046', 0, '2023-12-17 20:29:09'),
(1450, 'P173118', 0, '2023-12-17 20:32:28'),
(1830, 'P192708', 0, '2023-12-19 15:29:47'),
(1452, 'P171039', 0, '2023-12-17 21:12:00'),
(1453, 'P171237', 0, '2023-12-17 21:14:05'),
(1454, 'P172134', 0, '2023-12-17 21:25:10'),
(1455, 'P172754', 0, '2023-12-17 21:29:16'),
(1456, 'P172949', 0, '2023-12-17 21:31:19'),
(1457, 'P173205', 0, '2023-12-17 21:33:32'),
(1458, 'P173305', 0, '2023-12-17 21:34:06'),
(1459, 'P173444', 0, '2023-12-17 21:36:24'),
(1460, 'P173707', 0, '2023-12-17 21:38:38'),
(1461, 'P173909', 0, '2023-12-17 21:40:38'),
(1462, 'P174108', 0, '2023-12-17 21:42:54'),
(1463, 'P174328', 0, '2023-12-17 21:44:40'),
(1464, 'P174531', 0, '2023-12-17 21:46:39'),
(1465, 'P174708', 0, '2023-12-17 21:48:26'),
(1466, 'P174901', 0, '2023-12-17 21:50:18'),
(1467, 'P175042', 0, '2023-12-17 21:52:03'),
(1468, 'P175224', 0, '2023-12-17 21:53:40'),
(1469, 'P175401', 0, '2023-12-17 21:55:16'),
(1470, 'P175537', 0, '2023-12-17 21:56:46'),
(1471, 'P175704', 0, '2023-12-17 21:58:14'),
(1472, 'P170453', 0, '2023-12-17 22:08:56'),
(1473, 'P171727', 0, '2023-12-17 22:22:24'),
(1474, 'P173913', 0, '2023-12-17 22:40:53'),
(1475, 'P174603', 0, '2023-12-17 22:47:59'),
(1476, 'M10050', 10000, '2023-12-17 23:12:14'),
(1477, 'P181814', 0, '2023-12-18 00:20:59'),
(1478, 'P184337', 0, '2023-12-18 05:52:12'),
(1479, 'P184859', 0, '2023-12-18 06:51:46'),
(1480, 'P184928', 0, '2023-12-18 06:52:11'),
(1481, 'P184159', 0, '2023-12-18 07:44:51'),
(1482, 'P185308', 0, '2023-12-18 07:55:31'),
(1483, 'P180720', 0, '2023-12-18 08:08:57'),
(1484, 'P180945', 0, '2023-12-18 08:11:34'),
(1485, 'P181432', 0, '2023-12-18 08:16:35'),
(1486, 'P181721', 0, '2023-12-18 08:18:58'),
(1487, 'P181920', 0, '2023-12-18 08:21:26'),
(1488, 'P182139', 0, '2023-12-18 08:23:13'),
(1489, 'P182328', 0, '2023-12-18 08:25:00'),
(1490, 'P182513', 0, '2023-12-18 08:26:38'),
(1491, 'P182651', 0, '2023-12-18 08:28:00'),
(1492, 'P182701', 0, '2023-12-18 08:28:27'),
(1493, 'P182734', 0, '2023-12-18 08:28:50'),
(1494, 'P182813', 0, '2023-12-18 08:29:38'),
(1495, 'P182914', 0, '2023-12-18 08:30:17'),
(1496, 'P182956', 0, '2023-12-18 08:31:16'),
(1497, 'P183036', 0, '2023-12-18 08:31:41'),
(1498, 'P183207', 0, '2023-12-18 08:33:15'),
(1499, 'P183332', 0, '2023-12-18 08:34:52'),
(1500, 'P183511', 0, '2023-12-18 08:36:26'),
(1501, 'P183645', 0, '2023-12-18 08:38:05'),
(1502, 'P183933', 0, '2023-12-18 08:42:20'),
(1503, 'P184231', 0, '2023-12-18 08:43:55'),
(1504, 'P184421', 0, '2023-12-18 08:45:47'),
(1505, 'P183838', 0, '2023-12-18 08:51:35'),
(1506, 'P185349', 0, '2023-12-18 08:55:21'),
(1507, 'P185520', 0, '2023-12-18 08:56:27'),
(1508, 'P185541', 0, '2023-12-18 08:57:52'),
(1509, 'P185707', 0, '2023-12-18 08:58:41'),
(1510, 'P185804', 0, '2023-12-18 08:59:28'),
(1511, 'P185859', 0, '2023-12-18 09:00:31'),
(1512, 'P185955', 0, '2023-12-18 09:01:50'),
(1513, 'P180050', 0, '2023-12-18 09:02:15'),
(1514, 'P180228', 0, '2023-12-18 09:03:51'),
(1515, 'P180255', 0, '2023-12-18 09:04:13'),
(1516, 'P180404', 0, '2023-12-18 09:05:28'),
(1517, 'P180432', 0, '2023-12-18 09:05:34'),
(1518, 'P180556', 0, '2023-12-18 09:07:07'),
(1519, 'P185238', 106000, '2023-12-18 09:08:45'),
(1520, 'P180739', 0, '2023-12-18 09:08:56'),
(1521, 'P180715', 0, '2023-12-18 09:09:54'),
(1522, 'P180914', 0, '2023-12-18 09:10:22'),
(1523, 'P181014', 0, '2023-12-18 09:11:36'),
(1524, 'P181041', 0, '2023-12-18 09:11:46'),
(1525, 'P181212', 0, '2023-12-18 09:13:27'),
(1526, 'P181221', 0, '2023-12-18 09:14:27'),
(1527, 'P181440', 0, '2023-12-18 09:15:53'),
(1528, 'P181505', 0, '2023-12-18 09:16:15'),
(1529, 'P181630', 0, '2023-12-18 09:17:46'),
(1530, 'P181803', 0, '2023-12-18 09:19:15'),
(1531, 'P181931', 0, '2023-12-18 09:20:43'),
(1532, 'P181907', 0, '2023-12-18 09:21:09'),
(1533, 'P182107', 0, '2023-12-18 09:22:27'),
(1534, 'P182144', 0, '2023-12-18 09:23:04'),
(1535, 'P182243', 0, '2023-12-18 09:23:56'),
(1536, 'P182315', 0, '2023-12-18 09:24:44'),
(1537, 'P182417', 0, '2023-12-18 09:25:30'),
(1538, 'P182457', 0, '2023-12-18 09:26:22'),
(1539, 'P182550', 0, '2023-12-18 09:27:11'),
(1540, 'P182632', 0, '2023-12-18 09:28:04'),
(1541, 'P182729', 0, '2023-12-18 09:28:41'),
(1542, 'P182429', 0, '2023-12-18 09:29:15'),
(1543, 'P182816', 0, '2023-12-18 09:29:50'),
(1544, 'P182902', 0, '2023-12-18 09:30:22'),
(1545, 'P183007', 0, '2023-12-18 09:31:30'),
(1546, 'P183056', 0, '2023-12-18 09:32:05'),
(1547, 'P183227', 0, '2023-12-18 09:33:39'),
(1548, 'P183201', 0, '2023-12-18 09:34:01'),
(1549, 'P183356', 0, '2023-12-18 09:35:11'),
(1550, 'P183412', 0, '2023-12-18 09:35:43'),
(1551, 'P183530', 0, '2023-12-18 09:36:51'),
(1552, 'P183604', 0, '2023-12-18 09:37:29'),
(1553, 'P183711', 0, '2023-12-18 09:38:24'),
(1554, 'P183740', 0, '2023-12-18 09:38:57'),
(1555, 'P183852', 0, '2023-12-18 09:40:12'),
(1556, 'P183914', 0, '2023-12-18 09:40:38'),
(1557, 'P184049', 0, '2023-12-18 09:42:04'),
(1558, 'P184105', 0, '2023-12-18 09:42:35'),
(1559, 'P184217', 0, '2023-12-18 09:43:19'),
(1560, 'P184256', 0, '2023-12-18 09:44:16'),
(1561, 'P184330', 0, '2023-12-18 09:44:48'),
(1562, 'P184454', 0, '2023-12-18 09:46:18'),
(1563, 'P184501', 0, '2023-12-18 09:46:42'),
(1564, 'P184636', 0, '2023-12-18 09:47:48'),
(1565, 'P184656', 0, '2023-12-18 09:48:00'),
(1566, 'P184814', 0, '2023-12-18 09:49:00'),
(1567, 'P184807', 0, '2023-12-18 09:49:27'),
(1568, 'P184924', 0, '2023-12-18 09:50:53'),
(1569, 'P185115', 0, '2023-12-18 09:52:47'),
(1570, 'P185301', 0, '2023-12-18 09:54:34'),
(1571, 'P185444', 0, '2023-12-18 09:56:33'),
(1572, 'P185646', 0, '2023-12-18 09:58:02'),
(1573, 'P185813', 0, '2023-12-18 09:59:45'),
(1574, 'P180008', 0, '2023-12-18 10:01:19'),
(1575, 'P180040', 0, '2023-12-18 10:02:00'),
(1576, 'P180141', 0, '2023-12-18 10:03:16'),
(1577, 'P180747', 0, '2023-12-18 10:12:45'),
(1578, 'P184101', 0, '2023-12-18 10:42:52'),
(1579, 'P184259', 0, '2023-12-18 10:46:36'),
(1580, 'P184917', 0, '2023-12-18 10:53:23'),
(1581, 'P180340', 0, '2023-12-18 11:05:08'),
(1582, 'P185543', -185, '2023-12-18 11:57:52'),
(1583, 'P180116', 0, '2023-12-18 12:02:21'),
(1584, 'P180453', 0, '2023-12-18 12:06:09'),
(1585, 'P180312', 0, '2023-12-18 12:06:53'),
(1586, 'P180829', 0, '2023-12-18 12:09:28'),
(1587, 'P181011', 0, '2023-12-18 12:11:04'),
(1588, 'P181354', 0, '2023-12-18 12:14:54'),
(1589, 'P181513', 0, '2023-12-18 12:16:05'),
(1590, 'D1702876734', 10000, '2023-12-18 12:18:54'),
(1591, 'D1702879358', 10000, '2023-12-18 13:02:38'),
(1592, 'P181421', 0, '2023-12-18 13:15:51'),
(1593, 'P181714', 0, '2023-12-18 13:18:42'),
(1594, 'P182346', 10600, '2023-12-18 13:26:36'),
(1595, 'P182645', 0, '2023-12-18 13:29:02'),
(1596, 'P180125', 0, '2023-12-18 14:02:18'),
(1597, 'D1702885856', 10000, '2023-12-18 14:50:56'),
(1598, 'P185252', 0, '2023-12-18 14:57:20'),
(1599, 'P185827', 0, '2023-12-18 15:00:05'),
(1600, 'P182046', 0, '2023-12-18 15:23:32'),
(1601, 'P184223', 0, '2023-12-18 15:44:58'),
(1602, 'P185319', 0, '2023-12-18 15:54:43'),
(1603, 'P182026', 0, '2023-12-18 16:27:10'),
(1604, 'P183151', 8415, '2023-12-18 16:34:24'),
(1605, 'M13388', 0, '2023-12-18 16:44:30'),
(1606, 'M23865', 10000, '2023-12-18 17:00:36'),
(1607, 'M12110', 10000, '2023-12-18 17:30:35'),
(1608, 'M24604', 0, '2023-12-18 17:35:46'),
(1609, 'P184022', 0, '2023-12-18 17:48:13'),
(1610, 'P180039', 0, '2023-12-18 18:01:52'),
(1611, 'P180204', 0, '2023-12-18 18:03:07'),
(1612, 'P180333', 0, '2023-12-18 18:04:32'),
(1613, 'P183537', 0, '2023-12-18 18:38:08'),
(1614, 'D1702900900', 10000, '2023-12-18 19:01:40'),
(1615, 'D1702901167', 0, '2023-12-18 19:06:07'),
(1616, 'D1702901691', 0, '2023-12-18 19:14:51'),
(1617, 'D1702901751', 10000, '2023-12-18 19:15:51'),
(1618, 'D1702901900', 10000, '2023-12-18 19:18:20'),
(1619, 'D1702901983', 10000, '2023-12-18 19:19:43'),
(1620, 'D1702902430', 0, '2023-12-18 19:27:10'),
(1621, 'P183135', 0, '2023-12-18 19:32:58'),
(1622, 'D1702903091', 10000, '2023-12-18 19:38:11'),
(1623, 'D1702903195', 0, '2023-12-18 19:39:55'),
(1624, 'D1702903244', 0, '2023-12-18 19:40:44'),
(1625, 'P184626', 0, '2023-12-18 19:47:35'),
(1626, 'D1702903661', 10000, '2023-12-18 19:47:41'),
(1627, 'D1702904003', 10000, '2023-12-18 19:53:23'),
(1628, 'D1702904355', 10000, '2023-12-18 19:59:15'),
(1629, 'D1702904656', 10000, '2023-12-18 20:04:16'),
(1630, 'D1702904725', 10000, '2023-12-18 20:05:25'),
(1631, 'D1702904779', 10000, '2023-12-18 20:06:19'),
(1632, 'P180518', 0, '2023-12-18 20:06:58'),
(1633, 'D1702905027', 10000, '2023-12-18 20:10:27'),
(1634, 'P180759', 2000, '2023-12-18 20:10:53'),
(1635, 'D1702905106', 10000, '2023-12-18 20:11:46'),
(1636, 'D1702905340', 10000, '2023-12-18 20:15:40'),
(1637, 'D1702905425', 10000, '2023-12-18 20:17:05'),
(1638, 'D1702905455', 0, '2023-12-18 20:17:35'),
(1639, 'P181722', 0, '2023-12-18 20:20:09'),
(1640, 'P181138', 0, '2023-12-18 20:23:33'),
(1641, 'D1702905820', 10000, '2023-12-18 20:23:40'),
(1642, 'D1702906030', 10000, '2023-12-18 20:27:10'),
(1643, 'P182331', 0, '2023-12-18 20:28:44'),
(1644, 'P182624', 4000, '2023-12-18 20:29:06'),
(1645, 'D1702906173', 10000, '2023-12-18 20:29:33'),
(1646, 'P182709', 2000, '2023-12-18 20:30:16'),
(1647, 'D1702906264', 10000, '2023-12-18 20:31:04'),
(1648, 'P183153', 0, '2023-12-18 20:34:54'),
(1649, 'P183409', 0, '2023-12-18 20:36:56'),
(1650, 'P183119', 0, '2023-12-18 20:37:21'),
(1651, 'P184009', 0, '2023-12-18 20:41:25'),
(1652, 'P184402', 0, '2023-12-18 20:45:39'),
(1653, 'D1702907192', 10000, '2023-12-18 20:46:32'),
(1654, 'P184654', 0, '2023-12-18 20:47:56'),
(1655, 'P184847', 0, '2023-12-18 20:50:06'),
(1656, 'P184939', 0, '2023-12-18 20:51:56'),
(1657, 'P185118', 0, '2023-12-18 20:52:32'),
(1658, 'D1702907627', 10000, '2023-12-18 20:53:47'),
(1659, 'P185248', 0, '2023-12-18 20:53:47'),
(1660, 'P185729', 0, '2023-12-18 20:58:53'),
(1661, 'P185910', 0, '2023-12-18 21:00:01'),
(1662, 'P185941', 0, '2023-12-18 21:01:24'),
(1663, 'P180145', 0, '2023-12-18 21:02:59'),
(1664, 'P180324', 0, '2023-12-18 21:04:37'),
(1665, 'P185823', 0, '2023-12-18 21:05:20'),
(1666, 'P180504', 0, '2023-12-18 21:06:17'),
(1667, 'P180557', 0, '2023-12-18 21:07:08'),
(1668, 'P180636', 0, '2023-12-18 21:07:48'),
(1669, 'P180817', 0, '2023-12-18 21:09:28'),
(1670, 'P180846', 0, '2023-12-18 21:11:00'),
(1671, 'P180951', 0, '2023-12-18 21:11:36'),
(1672, 'P181158', 0, '2023-12-18 21:13:31'),
(1673, 'P180741', 0, '2023-12-18 21:13:52'),
(1674, 'P181356', 0, '2023-12-18 21:15:10'),
(1675, 'P181059', 0, '2023-12-18 21:16:16'),
(1676, 'P180718', 0, '2023-12-18 21:17:37'),
(1677, 'P181717', 0, '2023-12-18 21:19:45'),
(1678, 'P183118', 0, '2023-12-18 21:32:05'),
(1679, 'P182549', 0, '2023-12-18 21:33:51'),
(1680, 'P183958', 0, '2023-12-18 21:40:54'),
(1681, 'P184054', 0, '2023-12-18 21:45:10'),
(1682, 'P181201', 0, '2023-12-18 22:13:10'),
(1683, 'P181649', 0, '2023-12-18 22:18:49'),
(1684, 'D1702912888', 10000, '2023-12-18 22:21:28'),
(1685, 'P182546', 0, '2023-12-18 22:27:13'),
(1686, 'D1702914343', 10000, '2023-12-18 22:45:43'),
(1687, 'P185316', 0, '2023-12-18 22:54:18'),
(1688, 'P185525', 0, '2023-12-18 22:56:30'),
(1689, 'P180513', 0, '2023-12-18 23:06:37'),
(1690, 'P180502', 0, '2023-12-18 23:07:05'),
(1691, 'P180716', 0, '2023-12-18 23:08:36'),
(1692, 'P180849', 0, '2023-12-18 23:10:26'),
(1693, 'P181039', 0, '2023-12-18 23:12:17'),
(1694, 'P181229', 0, '2023-12-18 23:14:26'),
(1695, 'P181437', 0, '2023-12-18 23:16:05'),
(1696, 'P181619', 0, '2023-12-18 23:17:48'),
(1697, 'P181759', 0, '2023-12-18 23:19:37'),
(1698, 'P182005', 0, '2023-12-18 23:21:25'),
(1699, 'P192628', 10000, '2023-12-18 23:31:04'),
(1700, 'P183022', 0, '2023-12-18 23:31:50'),
(1701, 'P183204', 0, '2023-12-18 23:33:19'),
(1702, 'P183337', 0, '2023-12-18 23:35:17'),
(1703, 'P183528', 0, '2023-12-18 23:37:04'),
(1704, 'P183720', 0, '2023-12-18 23:38:42'),
(1705, 'P183723', 0, '2023-12-18 23:39:36'),
(1706, 'P183950', 0, '2023-12-18 23:41:33'),
(1707, 'P184157', 0, '2023-12-18 23:42:49'),
(1708, 'P184146', 0, '2023-12-18 23:43:39'),
(1709, 'P184350', 0, '2023-12-18 23:45:36'),
(1710, 'P184529', 0, '2023-12-18 23:46:16'),
(1711, 'P184603', 0, '2023-12-18 23:47:29'),
(1712, 'P184741', 0, '2023-12-18 23:49:09'),
(1713, 'P185120', 0, '2023-12-18 23:53:49'),
(1714, 'P185407', 0, '2023-12-18 23:55:38'),
(1715, 'P185551', 0, '2023-12-18 23:57:44'),
(1716, 'P185839', 0, '2023-12-19 00:00:10'),
(1717, 'P190021', 0, '2023-12-19 00:01:31'),
(1718, 'P192819', 0, '2023-12-19 00:29:35'),
(1719, 'P193203', 0, '2023-12-19 00:33:03'),
(1720, 'P193854', 0, '2023-12-19 04:42:21'),
(1721, 'P194915', 0, '2023-12-19 04:54:52'),
(1722, 'P190518', 0, '2023-12-19 05:09:09'),
(1723, 'P185146', 0, '2023-12-19 05:39:10'),
(1724, 'P195031', 0, '2023-12-19 05:59:56'),
(1725, 'P195756', 0, '2023-12-19 06:00:55'),
(1726, 'P190000', 0, '2023-12-19 06:01:53'),
(1727, 'P191425', 0, '2023-12-19 06:18:49'),
(1728, 'P193033', 0, '2023-12-19 06:32:31'),
(1729, 'P192744', 0, '2023-12-19 07:32:13'),
(1730, 'P193917', 4000, '2023-12-19 08:43:11'),
(1731, 'P194906', 0, '2023-12-19 08:53:58'),
(1732, 'P195653', 0, '2023-12-19 08:57:50'),
(1733, 'P190726', 0, '2023-12-19 09:08:23'),
(1734, 'P190654', 0, '2023-12-19 09:10:50'),
(1735, 'P191313', 0, '2023-12-19 09:16:57'),
(1736, 'P192844', 0, '2023-12-19 09:36:28'),
(1737, 'P193907', 0, '2023-12-19 09:40:39'),
(1738, 'P193844', 0, '2023-12-19 09:42:42'),
(1739, 'P194259', 0, '2023-12-19 09:48:11'),
(1740, 'P195129', 0, '2023-12-19 09:54:31'),
(1741, 'P195459', 0, '2023-12-19 09:57:08'),
(1742, 'P195750', 0, '2023-12-19 09:59:20'),
(1743, 'P195947', 0, '2023-12-19 10:01:14'),
(1744, 'P195753', 0, '2023-12-19 10:01:58'),
(1745, 'P190134', 0, '2023-12-19 10:02:57'),
(1746, 'P190344', 0, '2023-12-19 10:04:49'),
(1747, 'P190510', 0, '2023-12-19 10:06:21'),
(1748, 'P190640', 0, '2023-12-19 10:08:14'),
(1749, 'P190847', 0, '2023-12-19 10:09:55'),
(1750, 'P191015', 0, '2023-12-19 10:11:37'),
(1751, 'P191154', 0, '2023-12-19 10:13:08'),
(1752, 'P191323', 0, '2023-12-19 10:14:36'),
(1753, 'P191502', 0, '2023-12-19 10:16:13'),
(1754, 'P191633', 0, '2023-12-19 10:17:42'),
(1755, 'P191759', 0, '2023-12-19 10:19:01'),
(1756, 'P191920', 0, '2023-12-19 10:20:37'),
(1757, 'P192219', 0, '2023-12-19 10:23:35'),
(1758, 'P192358', 0, '2023-12-19 10:25:14'),
(1759, 'P192533', 0, '2023-12-19 10:26:46'),
(1760, 'P192712', 0, '2023-12-19 10:28:29'),
(1761, 'P192848', 0, '2023-12-19 10:29:54'),
(1762, 'P193014', 0, '2023-12-19 10:31:35'),
(1763, 'P193315', 0, '2023-12-19 10:34:20'),
(1764, 'P193458', 0, '2023-12-19 10:36:14'),
(1765, 'P193633', 0, '2023-12-19 10:37:44'),
(1766, 'P193626', 0, '2023-12-19 10:38:18'),
(1767, 'P193801', 0, '2023-12-19 10:39:18'),
(1768, 'P193934', 0, '2023-12-19 10:40:49'),
(1769, 'P194110', 0, '2023-12-19 10:42:45'),
(1770, 'P194310', 0, '2023-12-19 10:44:11'),
(1771, 'P194430', 0, '2023-12-19 10:45:30'),
(1772, 'P194515', 0, '2023-12-19 10:46:49'),
(1773, 'P194548', 0, '2023-12-19 10:47:01'),
(1774, 'P194723', 0, '2023-12-19 10:48:38'),
(1775, 'P194854', 0, '2023-12-19 10:49:56'),
(1776, 'P195016', 0, '2023-12-19 10:51:28'),
(1777, 'P194954', 0, '2023-12-19 10:51:49'),
(1778, 'P195151', 0, '2023-12-19 10:53:04'),
(1779, 'P195331', 0, '2023-12-19 10:54:44'),
(1780, 'P195508', 0, '2023-12-19 10:56:14'),
(1781, 'P195631', 0, '2023-12-19 10:57:39'),
(1782, 'P195802', 0, '2023-12-19 10:59:03'),
(1783, 'P195928', 0, '2023-12-19 11:00:28'),
(1784, 'P190047', 0, '2023-12-19 11:01:58'),
(1785, 'P190213', 0, '2023-12-19 11:03:15'),
(1786, 'P190335', 0, '2023-12-19 11:04:45'),
(1787, 'P190511', 0, '2023-12-19 11:06:13'),
(1788, 'P190635', 0, '2023-12-19 11:07:48'),
(1789, 'P190829', 0, '2023-12-19 11:09:35'),
(1790, 'P191125', 0, '2023-12-19 11:12:46'),
(1791, 'P191301', 0, '2023-12-19 11:14:22'),
(1792, 'P191441', 0, '2023-12-19 11:16:12'),
(1793, 'P191442', 0, '2023-12-19 11:16:55'),
(1794, 'P192650', 0, '2023-12-19 11:31:15'),
(1795, 'P192659', 0, '2023-12-19 11:32:15'),
(1796, 'P193306', 0, '2023-12-19 11:35:08'),
(1797, 'P195324', 0, '2023-12-19 11:56:42'),
(1798, 'P193858', 0, '2023-12-19 12:40:24'),
(1799, 'P194040', 0, '2023-12-19 12:42:03'),
(1800, 'P194217', 0, '2023-12-19 12:43:22'),
(1801, 'P194349', 0, '2023-12-19 12:45:24'),
(1802, 'P194556', 0, '2023-12-19 12:47:25'),
(1803, 'P194750', 0, '2023-12-19 12:49:01'),
(1804, 'P194922', 0, '2023-12-19 12:50:37'),
(1805, 'P195055', 0, '2023-12-19 12:52:17'),
(1806, 'P195237', 0, '2023-12-19 12:53:51'),
(1807, 'P195414', 0, '2023-12-19 12:55:42'),
(1808, 'P195601', 0, '2023-12-19 12:57:21'),
(1809, 'P195744', 0, '2023-12-19 12:58:45'),
(1810, 'P190005', 0, '2023-12-19 13:01:22'),
(1811, 'P190252', 0, '2023-12-19 13:04:17'),
(1812, 'P190436', 0, '2023-12-19 13:05:44'),
(1813, 'P190604', 0, '2023-12-19 13:07:13'),
(1814, 'P190731', 0, '2023-12-19 13:09:00'),
(1815, 'P190916', 0, '2023-12-19 13:10:23'),
(1816, 'P191042', 0, '2023-12-19 13:11:54'),
(1817, 'P191209', 0, '2023-12-19 13:13:21'),
(1818, 'P191340', 0, '2023-12-19 13:15:06'),
(1819, 'P191130', 0, '2023-12-19 13:16:28'),
(1820, 'P191559', 0, '2023-12-19 13:17:13'),
(1821, 'P191738', 0, '2023-12-19 13:18:47'),
(1822, 'P191903', 0, '2023-12-19 13:20:11'),
(1823, 'P192030', 0, '2023-12-19 13:21:57'),
(1824, 'P192224', 0, '2023-12-19 13:23:25'),
(1825, 'P192349', 0, '2023-12-19 13:24:53'),
(1826, 'P192509', 0, '2023-12-19 13:26:21'),
(1827, 'P192636', 0, '2023-12-19 13:27:38'),
(1828, 'P192756', 0, '2023-12-19 13:29:08'),
(1831, 'P194551', 0, '2023-12-19 15:49:00'),
(1832, 'P195407', 0, '2023-12-19 15:55:18'),
(1833, 'P195534', 0, '2023-12-19 15:56:43'),
(1834, 'P195657', 0, '2023-12-19 15:57:48'),
(1835, 'P190054', 0, '2023-12-19 16:02:43'),
(1836, 'P190301', 0, '2023-12-19 16:04:28'),
(1837, 'P190508', 0, '2023-12-19 16:06:33'),
(1838, 'P190523', 1050, '2023-12-19 16:06:42'),
(1839, 'P190701', 0, '2023-12-19 16:08:24'),
(1840, 'P190029', 0, '2023-12-19 16:09:06'),
(1841, 'P190841', 0, '2023-12-19 16:09:50'),
(1842, 'P191008', 0, '2023-12-19 16:11:30'),
(1843, 'P191146', 0, '2023-12-19 16:13:24'),
(1844, 'P191625', 0, '2023-12-19 16:17:49'),
(1845, 'P191835', 0, '2023-12-19 16:20:26'),
(1846, 'P192055', 0, '2023-12-19 16:22:21'),
(1847, 'P194136', 0, '2023-12-19 16:43:11'),
(1848, 'P194336', 0, '2023-12-19 16:44:50'),
(1849, 'P194923', 0, '2023-12-19 16:50:50'),
(1850, 'P195112', 0, '2023-12-19 16:52:36'),
(1851, 'P195307', 0, '2023-12-19 16:55:04'),
(1852, 'P195538', 0, '2023-12-19 16:56:48'),
(1853, 'P195707', 0, '2023-12-19 16:58:58'),
(1854, 'P195921', 0, '2023-12-19 17:00:39'),
(1855, 'P190058', 0, '2023-12-19 17:02:17'),
(1856, 'D1702980179', 10000, '2023-12-19 17:02:59'),
(1857, 'P190234', 0, '2023-12-19 17:03:43'),
(1858, 'P190359', 0, '2023-12-19 17:05:12'),
(1859, 'P190811', 0, '2023-12-19 17:09:30'),
(1860, 'P190954', 0, '2023-12-19 17:11:02'),
(1861, 'P190800', 0, '2023-12-19 17:11:51'),
(1862, 'P191123', 0, '2023-12-19 17:12:53'),
(1863, 'P191311', 0, '2023-12-19 17:14:17'),
(1864, 'P191435', 0, '2023-12-19 17:15:47'),
(1865, 'P191410', 0, '2023-12-19 17:17:15'),
(1866, 'P191611', 0, '2023-12-19 17:17:31'),
(1867, 'P191750', 0, '2023-12-19 17:19:04'),
(1868, 'P191919', 0, '2023-12-19 17:20:19'),
(1869, 'P192034', 0, '2023-12-19 17:21:40'),
(1870, 'P193515', 0, '2023-12-19 17:38:02'),
(1871, 'P193812', 0, '2023-12-19 17:39:50'),
(1872, 'P194030', 0, '2023-12-19 17:42:45'),
(1873, 'P194211', 0, '2023-12-19 17:44:29'),
(1874, 'P194342', 0, '2023-12-19 17:45:20'),
(1875, 'P194534', 0, '2023-12-19 17:47:25'),
(1876, 'P195007', 0, '2023-12-19 17:53:25'),
(1877, 'P195337', 0, '2023-12-19 17:55:51'),
(1878, 'P195603', 0, '2023-12-19 17:58:59'),
(1879, 'P195924', 0, '2023-12-19 18:01:26'),
(1880, 'D1702987120', 0, '2023-12-19 18:58:40'),
(1881, 'P191115', 0, '2023-12-19 19:13:23'),
(1882, 'P191421', 0, '2023-12-19 19:16:02'),
(1883, 'P191931', 0, '2023-12-19 19:20:42'),
(1884, 'P192113', 0, '2023-12-19 19:22:22'),
(1885, 'P191930', 0, '2023-12-19 19:22:36'),
(1886, 'P192324', 0, '2023-12-19 19:25:36'),
(1887, 'P192553', 0, '2023-12-19 19:27:39'),
(1888, 'P192910', 0, '2023-12-19 19:30:20'),
(1889, 'P192824', 0, '2023-12-19 19:30:40'),
(1890, 'P193117', 0, '2023-12-19 19:33:08'),
(1891, 'P193419', 0, '2023-12-19 19:35:38'),
(1892, 'P193322', 0, '2023-12-19 19:35:46'),
(1893, 'D1702989594', 10000, '2023-12-19 19:39:54'),
(1894, 'P194444', 0, '2023-12-19 19:46:43'),
(1895, 'P194657', 0, '2023-12-19 19:48:53'),
(1896, 'P194939', 0, '2023-12-19 19:51:22'),
(1897, 'P195139', 0, '2023-12-19 19:53:03'),
(1898, 'P195314', 0, '2023-12-19 19:54:42'),
(1899, 'P195608', 0, '2023-12-19 19:59:45'),
(1900, 'P195840', 0, '2023-12-19 19:59:59'),
(1901, 'P190022', 0, '2023-12-19 20:01:24'),
(1902, 'P190146', 0, '2023-12-19 20:03:01'),
(1903, 'D1702990993', 10000, '2023-12-19 20:03:13'),
(1904, 'P190330', 0, '2023-12-19 20:07:12'),
(1905, 'P190208', 0, '2023-12-19 21:03:53'),
(1906, 'P190410', 0, '2023-12-19 21:05:22'),
(1907, 'P190539', 0, '2023-12-19 21:06:32'),
(1908, 'P190655', 0, '2023-12-19 21:08:05'),
(1909, 'P190823', 0, '2023-12-19 21:09:23'),
(1910, 'P192403', 0, '2023-12-19 21:25:52'),
(1911, 'P193213', 0, '2023-12-19 21:33:37'),
(1912, 'P193451', 0, '2023-12-19 21:35:52'),
(1913, 'P194033', 0, '2023-12-19 21:41:54'),
(1914, 'P194236', 0, '2023-12-19 21:43:47'),
(1915, 'P194413', 0, '2023-12-19 21:45:27'),
(1916, 'P195024', 0, '2023-12-19 21:51:36'),
(1917, 'P195628', 0, '2023-12-19 21:57:33'),
(1918, 'D1702999128', 0, '2023-12-19 22:18:48'),
(1919, 'P205355', 0, '2023-12-20 01:56:52'),
(1920, 'P200856', 0, '2023-12-20 06:11:33'),
(1921, 'P205130', 0, '2023-12-20 06:52:35'),
(1922, 'P201324', 0, '2023-12-20 07:14:32'),
(1923, 'P203527', 0, '2023-12-20 07:36:31'),
(1924, 'P203716', 0, '2023-12-20 07:38:07'),
(1925, 'P203816', 0, '2023-12-20 07:39:14'),
(1926, 'P204056', 0, '2023-12-20 07:41:57'),
(1927, 'P204639', 0, '2023-12-20 07:47:40'),
(1928, 'P204831', 0, '2023-12-20 07:49:34'),
(1929, 'P205201', 0, '2023-12-20 07:53:44'),
(1930, 'P205406', 0, '2023-12-20 07:55:28'),
(1931, 'P200555', 0, '2023-12-20 08:07:55'),
(1932, 'P200814', 0, '2023-12-20 08:09:35'),
(1933, 'P201413', 0, '2023-12-20 08:15:33'),
(1934, 'P201445', 0, '2023-12-20 08:15:45'),
(1935, 'P201600', 0, '2023-12-20 08:16:51'),
(1936, 'P201547', 0, '2023-12-20 08:17:07'),
(1937, 'P201713', 0, '2023-12-20 08:18:03'),
(1938, 'P201718', 0, '2023-12-20 08:18:32'),
(1939, 'P201817', 0, '2023-12-20 08:19:12'),
(1940, 'P201844', 0, '2023-12-20 08:20:08'),
(1941, 'P201927', 0, '2023-12-20 08:20:25'),
(1942, 'P202045', 0, '2023-12-20 08:21:54'),
(1943, 'P202133', 0, '2023-12-20 08:22:37'),
(1944, 'P202253', 0, '2023-12-20 08:23:49'),
(1945, 'P202218', 0, '2023-12-20 08:23:50'),
(1946, 'P202448', 0, '2023-12-20 08:26:17'),
(1947, 'P202646', 0, '2023-12-20 08:28:01'),
(1948, 'P202821', 0, '2023-12-20 08:30:12'),
(1949, 'P202914', 0, '2023-12-20 08:30:14'),
(1950, 'P202825', 0, '2023-12-20 08:30:46'),
(1951, 'P203349', 0, '2023-12-20 08:34:51'),
(1952, 'P203513', 0, '2023-12-20 08:35:57'),
(1953, 'P203403', 0, '2023-12-20 08:36:41'),
(1954, 'P203611', 0, '2023-12-20 08:36:53'),
(1955, 'P203705', 0, '2023-12-20 08:37:53'),
(1956, 'P203707', 0, '2023-12-20 08:38:33'),
(1957, 'P204000', 0, '2023-12-20 08:41:35'),
(1958, 'P204152', 0, '2023-12-20 08:44:19'),
(1959, 'P204532', 0, '2023-12-20 08:47:04'),
(1960, 'P204714', 0, '2023-12-20 08:49:21'),
(1961, 'P205346', 0, '2023-12-20 08:55:49'),
(1962, 'P205740', 0, '2023-12-20 08:59:24'),
(1963, 'P200049', 0, '2023-12-20 09:02:17'),
(1964, 'P200237', 0, '2023-12-20 09:03:46'),
(1965, 'P200357', 0, '2023-12-20 09:04:59'),
(1966, 'P200527', 0, '2023-12-20 09:06:36'),
(1967, 'P200702', 0, '2023-12-20 09:08:33'),
(1968, 'P200857', 0, '2023-12-20 09:09:54'),
(1969, 'P201104', 0, '2023-12-20 09:14:52'),
(1970, 'P201532', 0, '2023-12-20 09:17:10'),
(1971, 'D1703040608', 10000, '2023-12-20 09:50:08'),
(1972, 'P203710', 0, '2023-12-20 10:38:12'),
(1973, 'P205720', 0, '2023-12-20 10:59:20'),
(1974, 'P205903', 0, '2023-12-20 11:02:55'),
(1975, 'P201032', 0, '2023-12-20 11:12:13'),
(1976, 'P201231', 0, '2023-12-20 11:13:53'),
(1977, 'P201415', 0, '2023-12-20 11:15:39'),
(1978, 'P201614', 0, '2023-12-20 11:17:42'),
(1979, 'P201825', 0, '2023-12-20 11:20:05'),
(1980, 'P202032', 0, '2023-12-20 11:22:10'),
(1981, 'P202231', 0, '2023-12-20 11:23:58'),
(1982, 'D1703046363', 0, '2023-12-20 11:26:03'),
(1983, 'D1703047456', 0, '2023-12-20 11:44:16'),
(1984, 'D1703048192', 0, '2023-12-20 11:56:32'),
(1985, 'P200934', 0, '2023-12-20 12:11:36'),
(1986, 'P201112', 0, '2023-12-20 12:13:16'),
(1987, 'P205552', 0, '2023-12-20 12:16:29'),
(1988, 'D1703051232', 0, '2023-12-20 12:47:12'),
(1989, 'P201400', 23975, '2023-12-20 13:14:46'),
(1990, 'D1703052968', 0, '2023-12-20 13:16:08'),
(1991, 'M22012', 20000, '2023-12-20 13:53:13'),
(1992, 'P201534', 0, '2023-12-20 14:16:57'),
(1993, 'P201756', 0, '2023-12-20 14:19:16'),
(1994, 'P201852', 0, '2023-12-20 14:21:09'),
(1995, 'P201944', 0, '2023-12-20 14:22:04'),
(1996, 'P202255', 0, '2023-12-20 14:24:14'),
(1997, 'P200226', 0, '2023-12-20 16:07:43'),
(1998, 'P202636', 0, '2023-12-20 17:28:39'),
(1999, 'P203115', 0, '2023-12-20 17:32:37'),
(2000, 'P203327', 0, '2023-12-20 17:34:49'),
(2001, 'P203518', 0, '2023-12-20 17:36:33'),
(2002, 'P203653', 0, '2023-12-20 17:38:17'),
(2003, 'P203910', 0, '2023-12-20 17:40:30'),
(2004, 'P204100', 0, '2023-12-20 17:42:47'),
(2005, 'P204306', 0, '2023-12-20 17:44:31'),
(2006, 'P204444', 0, '2023-12-20 17:46:26'),
(2007, 'P204642', 0, '2023-12-20 17:48:13'),
(2008, 'P204950', 0, '2023-12-20 17:51:58'),
(2009, 'P205222', 0, '2023-12-20 17:53:32'),
(2010, 'P205349', 0, '2023-12-20 17:55:17'),
(2011, 'P205546', 0, '2023-12-20 17:57:05'),
(2012, 'P205721', 0, '2023-12-20 17:58:31'),
(2013, 'P205851', 0, '2023-12-20 18:02:15'),
(2014, 'P200234', 0, '2023-12-20 18:04:09'),
(2015, 'P200446', 0, '2023-12-20 18:06:23'),
(2016, 'P200803', 0, '2023-12-20 18:10:03'),
(2017, 'P203708', 0, '2023-12-20 18:39:25'),
(2018, 'P204012', 0, '2023-12-20 18:42:22'),
(2019, 'P204335', 0, '2023-12-20 18:46:15'),
(2020, 'P205916', 0, '2023-12-20 19:02:15'),
(2021, 'P205507', 0, '2023-12-20 19:04:25'),
(2022, 'D1703074071', 0, '2023-12-20 19:07:51'),
(2023, 'D1703074080', 0, '2023-12-20 19:08:00'),
(2024, 'P201510', 0, '2023-12-20 19:17:51'),
(2025, 'P201719', 0, '2023-12-20 19:18:42'),
(2026, 'P201724', 2000, '2023-12-20 19:18:56'),
(2027, 'P202601', 0, '2023-12-20 19:27:29'),
(2028, 'P203232', -49750, '2023-12-20 19:35:26'),
(2029, 'P203650', 0, '2023-12-20 19:38:17'),
(2030, 'P204009', 0, '2023-12-20 19:41:13'),
(2031, 'P205304', 0, '2023-12-20 19:54:51'),
(2032, 'P205535', 0, '2023-12-20 19:57:19'),
(2033, 'P205747', 0, '2023-12-20 19:59:10'),
(2034, 'P205954', 0, '2023-12-20 20:01:06'),
(2035, 'P200125', 0, '2023-12-20 20:02:30'),
(2036, 'P200255', 0, '2023-12-20 20:04:30'),
(2037, 'P200452', 0, '2023-12-20 20:06:05'),
(2038, 'P200623', 0, '2023-12-20 20:07:55'),
(2039, 'P200409', 0, '2023-12-20 20:08:43'),
(2040, 'P200812', 0, '2023-12-20 20:09:51'),
(2041, 'P201018', 0, '2023-12-20 20:11:29'),
(2042, 'P201158', 0, '2023-12-20 20:13:12'),
(2043, 'P201342', 0, '2023-12-20 20:14:53'),
(2044, 'P201551', 0, '2023-12-20 20:18:18'),
(2045, 'P202146', 0, '2023-12-20 20:27:13'),
(2046, 'P202417', 0, '2023-12-20 20:27:19'),
(2047, 'P202611', 0, '2023-12-20 20:27:48'),
(2048, 'P203023', 0, '2023-12-20 20:32:54'),
(2049, 'P203514', 0, '2023-12-20 20:39:43'),
(2050, 'P204409', 0, '2023-12-20 20:46:41'),
(2051, 'P204908', 0, '2023-12-20 20:51:54'),
(2052, 'P205426', 0, '2023-12-20 20:56:11'),
(2053, 'P200606', 0, '2023-12-20 21:16:11'),
(2054, 'P201916', 0, '2023-12-20 21:20:17'),
(2055, 'P202033', 0, '2023-12-20 21:21:37'),
(2056, 'P202154', 0, '2023-12-20 21:22:57'),
(2057, 'P202311', 0, '2023-12-20 21:24:04'),
(2058, 'P203815', 0, '2023-12-20 21:39:29'),
(2059, 'P203950', 0, '2023-12-20 21:40:41'),
(2060, 'P204116', 0, '2023-12-20 21:42:12'),
(2061, 'P204256', 0, '2023-12-20 21:43:58'),
(2062, 'P205230', 0, '2023-12-20 21:53:35'),
(2063, 'P205401', 0, '2023-12-20 21:54:48'),
(2064, 'P205702', 0, '2023-12-20 21:57:56'),
(2065, 'P200007', 0, '2023-12-20 22:00:58'),
(2066, 'P200112', 0, '2023-12-20 22:01:57'),
(2067, 'P200209', 0, '2023-12-20 22:03:02'),
(2068, 'P200325', 0, '2023-12-20 22:04:23'),
(2069, 'P200449', 0, '2023-12-20 22:05:40'),
(2070, 'P200557', 0, '2023-12-20 22:06:50'),
(2071, 'P200819', 0, '2023-12-20 22:09:06'),
(2072, 'P200929', 0, '2023-12-20 22:10:30'),
(2073, 'P201709', 0, '2023-12-20 22:18:10'),
(2074, 'P201821', 0, '2023-12-20 22:19:13'),
(2075, 'P201936', 0, '2023-12-20 22:20:31'),
(2076, 'P200210', 0, '2023-12-20 23:03:26'),
(2078, 'P203024', 0, '2023-12-20 23:35:49'),
(2079, 'D1703090401', 0, '2023-12-20 23:40:01'),
(2080, 'P213023', 0, '2023-12-21 09:32:15'),
(2081, 'P213300', 0, '2023-12-21 09:34:10'),
(2082, 'P213428', 0, '2023-12-21 09:36:14'),
(2083, 'P213653', 0, '2023-12-21 09:38:10'),
(2084, 'P213847', 0, '2023-12-21 09:40:11'),
(2085, 'P214102', 0, '2023-12-21 09:42:25'),
(2086, 'P214254', 0, '2023-12-21 09:44:13'),
(2087, 'P214451', 0, '2023-12-21 09:46:06'),
(2088, 'P214622', 0, '2023-12-21 09:47:46'),
(2089, 'P214800', 0, '2023-12-21 09:49:18'),
(2090, 'P214730', 0, '2023-12-21 09:50:59'),
(2091, 'P214948', 0, '2023-12-21 09:51:17'),
(2092, 'P215223', 0, '2023-12-21 09:53:38'),
(2093, 'P215405', 0, '2023-12-21 09:55:14'),
(2094, 'P215541', 0, '2023-12-21 09:56:45'),
(2095, 'P215704', 0, '2023-12-21 09:58:24'),
(2096, 'P215845', 0, '2023-12-21 10:00:05'),
(2097, 'P215546', 0, '2023-12-21 10:00:06'),
(2098, 'P210023', 0, '2023-12-21 10:01:38'),
(2099, 'P215954', 0, '2023-12-21 10:03:01'),
(2100, 'P210202', 0, '2023-12-21 10:03:23'),
(2101, 'P210207', 0, '2023-12-21 10:03:58'),
(2102, 'P210346', 0, '2023-12-21 10:05:18'),
(2103, 'P210542', 0, '2023-12-21 10:06:49'),
(2104, 'P210706', 0, '2023-12-21 10:08:21'),
(2105, 'P210852', 0, '2023-12-21 10:10:14'),
(2106, 'P211031', 0, '2023-12-21 10:11:39'),
(2107, 'P210847', 0, '2023-12-21 10:12:05'),
(2108, 'P211158', 0, '2023-12-21 10:13:33'),
(2109, 'P211505', 0, '2023-12-21 10:16:15'),
(2110, 'P211328', 0, '2023-12-21 10:17:19'),
(2111, 'P211630', 0, '2023-12-21 10:18:15'),
(2112, 'P211646', 0, '2023-12-21 10:18:35'),
(2113, 'P211423', 0, '2023-12-21 10:19:30'),
(2114, 'P211843', 0, '2023-12-21 10:19:50'),
(2115, 'P212008', 0, '2023-12-21 10:21:28'),
(2116, 'P211552', 0, '2023-12-21 10:21:43'),
(2117, 'P211924', 0, '2023-12-21 10:22:50'),
(2118, 'P212144', 0, '2023-12-21 10:23:33'),
(2119, 'P212354', 0, '2023-12-21 10:25:12'),
(2120, 'P212535', 0, '2023-12-21 10:27:08'),
(2121, 'P212518', 0, '2023-12-21 10:31:03'),
(2122, 'P213007', 0, '2023-12-21 10:31:31'),
(2123, 'P213140', 0, '2023-12-21 10:33:12'),
(2124, 'P213151', 0, '2023-12-21 10:33:45'),
(2125, 'P213400', 0, '2023-12-21 10:35:12'),
(2126, 'P213551', 0, '2023-12-21 10:37:22'),
(2127, 'P213336', 0, '2023-12-21 10:38:40'),
(2128, 'P213740', 0, '2023-12-21 10:38:51'),
(2129, 'P213908', 0, '2023-12-21 10:40:34'),
(2130, 'P214052', 0, '2023-12-21 10:42:21'),
(2131, 'P213910', 0, '2023-12-21 10:42:29'),
(2132, 'P214237', 0, '2023-12-21 10:43:29'),
(2133, 'P214239', 0, '2023-12-21 10:44:04'),
(2134, 'P214252', 0, '2023-12-21 10:44:49'),
(2135, 'P214349', 0, '2023-12-21 10:45:06'),
(2136, 'P214439', 0, '2023-12-21 10:46:12'),
(2137, 'P214541', 0, '2023-12-21 10:46:47'),
(2138, 'P214707', 0, '2023-12-21 10:47:43'),
(2139, 'P214640', 0, '2023-12-21 10:48:05'),
(2140, 'P214809', 0, '2023-12-21 10:49:19'),
(2141, 'P214828', 0, '2023-12-21 10:49:41'),
(2142, 'P214938', 0, '2023-12-21 10:50:33'),
(2143, 'P215018', 0, '2023-12-21 10:51:49'),
(2144, 'P215047', 0, '2023-12-21 10:51:51'),
(2145, 'P215212', 0, '2023-12-21 10:53:37'),
(2146, 'P215400', 0, '2023-12-21 10:55:20'),
(2147, 'P215411', 0, '2023-12-21 10:57:22'),
(2148, 'P215712', 0, '2023-12-21 10:59:42'),
(2149, 'P210004', 0, '2023-12-21 11:01:26'),
(2150, 'P210223', 0, '2023-12-21 11:03:58'),
(2151, 'P210417', 0, '2023-12-21 11:05:52'),
(2152, 'P211604', 0, '2023-12-21 11:17:17'),
(2153, 'P211732', 0, '2023-12-21 11:18:36'),
(2154, 'P211854', 0, '2023-12-21 11:20:39'),
(2155, 'P212058', 0, '2023-12-21 11:22:12'),
(2156, 'P212226', 0, '2023-12-21 11:23:33'),
(2157, 'P212349', 0, '2023-12-21 11:25:12'),
(2158, 'P212534', 0, '2023-12-21 11:26:39'),
(2159, 'P212653', 0, '2023-12-21 11:27:47'),
(2160, 'P212808', 0, '2023-12-21 11:29:56'),
(2161, 'P213052', 0, '2023-12-21 11:32:00'),
(2162, 'P213218', 0, '2023-12-21 11:33:25'),
(2163, 'P213132', 0, '2023-12-21 11:33:44'),
(2164, 'P213340', 0, '2023-12-21 11:34:48'),
(2165, 'P213516', 0, '2023-12-21 11:36:33'),
(2166, 'P213620', 0, '2023-12-21 11:37:33'),
(2167, 'P213700', 0, '2023-12-21 11:38:12'),
(2168, 'P213837', 0, '2023-12-21 11:39:52'),
(2169, 'P213821', 2000, '2023-12-21 11:41:11'),
(2170, 'P214318', 0, '2023-12-21 11:44:22'),
(2171, 'P214444', 0, '2023-12-21 11:45:35'),
(2172, 'P214713', 0, '2023-12-21 11:48:17'),
(2173, 'P214631', 0, '2023-12-21 11:50:52'),
(2174, 'P214959', 0, '2023-12-21 11:51:56'),
(2175, 'P215848', 0, '2023-12-21 12:00:56'),
(2176, 'P210119', 0, '2023-12-21 12:05:21'),
(2177, 'D1703136223', 10000, '2023-12-21 12:23:43'),
(2178, 'P214014', 0, '2023-12-21 12:41:13'),
(2179, 'P213923', 0, '2023-12-21 12:42:18'),
(2180, 'P214145', 0, '2023-12-21 12:42:53'),
(2181, 'P214308', 0, '2023-12-21 12:44:10'),
(2182, 'P214424', 0, '2023-12-21 12:45:26'),
(2183, 'P214540', 0, '2023-12-21 12:46:44'),
(2184, 'P214658', 0, '2023-12-21 12:48:16'),
(2185, 'P210338', 0, '2023-12-21 13:07:04'),
(2186, 'P212643', 0, '2023-12-21 13:27:53'),
(2187, 'P212809', 0, '2023-12-21 13:29:34'),
(2188, 'P212959', 0, '2023-12-21 13:31:34'),
(2189, 'P213155', 0, '2023-12-21 13:33:13'),
(2190, 'P213333', 0, '2023-12-21 13:34:31');
INSERT INTO `saldo` (`nomor`, `id_user`, `saldo`, `update_at`) VALUES
(2191, 'P213446', 0, '2023-12-21 13:36:05'),
(2192, 'P213621', 0, '2023-12-21 13:37:33'),
(2193, 'P213751', 0, '2023-12-21 13:38:59'),
(2194, 'P213914', 0, '2023-12-21 13:40:18'),
(2195, 'P214034', 0, '2023-12-21 13:41:41'),
(2196, 'P213714', 0, '2023-12-21 13:42:04'),
(2197, 'P214251', 0, '2023-12-21 13:44:05'),
(2198, 'P214437', 0, '2023-12-21 13:45:43'),
(2199, 'P214600', 0, '2023-12-21 13:47:23'),
(2200, 'P214742', 0, '2023-12-21 13:48:58'),
(2201, 'P214914', 0, '2023-12-21 13:50:18'),
(2202, 'P215035', 0, '2023-12-21 13:51:46'),
(2203, 'P215203', 0, '2023-12-21 13:53:14'),
(2204, 'D1703141600', 0, '2023-12-21 13:53:20'),
(2205, 'P215539', 0, '2023-12-21 13:57:02'),
(2206, 'D1703142753', 0, '2023-12-21 14:12:33'),
(2207, 'P212552', 0, '2023-12-21 14:28:00'),
(2208, 'P212931', 0, '2023-12-21 14:31:11'),
(2209, 'P213138', 0, '2023-12-21 14:32:43'),
(2210, 'P213259', 0, '2023-12-21 14:34:12'),
(2211, 'P213427', 0, '2023-12-21 14:36:01'),
(2212, 'P213617', 0, '2023-12-21 14:37:30'),
(2213, 'P213750', 0, '2023-12-21 14:39:11'),
(2214, 'P213925', 0, '2023-12-21 14:40:47'),
(2215, 'P214106', 0, '2023-12-21 14:42:13'),
(2216, 'P214228', 0, '2023-12-21 14:43:46'),
(2217, 'P214945', 0, '2023-12-21 14:50:52'),
(2218, 'P215155', 0, '2023-12-21 14:53:19'),
(2219, 'P214040', 0, '2023-12-21 14:54:23'),
(2220, 'P215337', 0, '2023-12-21 14:54:39'),
(2221, 'P215455', 0, '2023-12-21 14:56:14'),
(2222, 'P215632', 0, '2023-12-21 14:57:32'),
(2223, 'P215750', 0, '2023-12-21 14:58:45'),
(2224, 'P210349', 0, '2023-12-21 15:05:00'),
(2225, 'P210519', 0, '2023-12-21 15:06:25'),
(2226, 'P210649', 0, '2023-12-21 15:07:48'),
(2227, 'P210804', 0, '2023-12-21 15:09:25'),
(2228, 'P210940', 0, '2023-12-21 15:10:54'),
(2229, 'P211246', 0, '2023-12-21 15:13:46'),
(2230, 'P211401', 0, '2023-12-21 15:15:09'),
(2231, 'P211532', 0, '2023-12-21 15:16:46'),
(2232, 'P211705', 0, '2023-12-21 15:18:09'),
(2233, 'P211831', 0, '2023-12-21 15:19:37'),
(2234, 'P211620', 7790, '2023-12-21 15:20:41'),
(2235, 'P212001', 0, '2023-12-21 15:21:11'),
(2236, 'P213102', 0, '2023-12-21 15:35:44'),
(2237, 'P215858', 0, '2023-12-21 16:02:48'),
(2238, 'P211146', 0, '2023-12-21 16:15:46'),
(2239, 'P215245', 0, '2023-12-21 16:56:39'),
(2240, 'P215615', 0, '2023-12-21 16:58:24'),
(2241, 'P210127', 0, '2023-12-21 17:02:46'),
(2242, 'P210800', 0, '2023-12-21 17:10:53'),
(2243, 'D1703153501', 10000, '2023-12-21 17:11:41'),
(2244, 'P211601', 0, '2023-12-21 17:19:16'),
(2245, 'P211930', 0, '2023-12-21 17:20:47'),
(2246, 'P212705', 0, '2023-12-21 17:28:23'),
(2247, 'P212602', 0, '2023-12-21 17:28:24'),
(2248, 'P212407', 0, '2023-12-21 17:29:22'),
(2249, 'P212707', 20000, '2023-12-21 17:29:56'),
(2250, 'P212547', 0, '2023-12-21 17:32:06'),
(2251, 'P213025', 0, '2023-12-21 17:34:23'),
(2252, 'P213404', 0, '2023-12-21 17:35:43'),
(2253, 'P213056', 0, '2023-12-21 17:37:12'),
(2254, 'P213818', 0, '2023-12-21 17:41:21'),
(2255, 'P214330', 0, '2023-12-21 17:45:32'),
(2256, 'P213836', 0, '2023-12-21 17:48:12'),
(2257, 'P214838', 0, '2023-12-21 17:49:29'),
(2258, 'P213950', 0, '2023-12-21 17:50:28'),
(2259, 'P215419', 0, '2023-12-21 17:55:48'),
(2260, 'P215829', 0, '2023-12-21 17:59:41'),
(2261, 'P215922', 0, '2023-12-21 18:01:25'),
(2262, 'P215707', 0, '2023-12-21 18:03:04'),
(2263, 'P212056', 0, '2023-12-21 18:22:48'),
(2264, 'P212501', 0, '2023-12-21 18:27:36'),
(2265, 'P213757', 0, '2023-12-21 18:43:16'),
(2266, 'P214041', 0, '2023-12-21 18:44:06'),
(2267, 'P214230', 0, '2023-12-21 19:05:09'),
(2268, 'P214321', 0, '2023-12-21 19:44:40'),
(2269, 'P215746', 0, '2023-12-21 19:59:16'),
(2270, 'P215944', 0, '2023-12-21 20:01:43'),
(2271, 'P210225', 0, '2023-12-21 20:05:19'),
(2272, 'P210543', 0, '2023-12-21 20:09:23'),
(2273, 'P211017', 0, '2023-12-21 20:12:18'),
(2274, 'P210927', 0, '2023-12-21 20:12:31'),
(2275, 'P211232', 0, '2023-12-21 20:14:07'),
(2276, 'P211554', 0, '2023-12-21 20:19:25'),
(2277, 'P212100', 0, '2023-12-21 20:22:08'),
(2278, 'P212306', 0, '2023-12-21 20:24:23'),
(2279, 'P212627', 0, '2023-12-21 20:27:33'),
(2280, 'P212910', 0, '2023-12-21 20:30:44'),
(2281, 'P213110', 0, '2023-12-21 20:32:38'),
(2282, 'P213253', 0, '2023-12-21 20:34:57'),
(2283, 'P213518', 0, '2023-12-21 20:38:15'),
(2284, 'P213829', 0, '2023-12-21 20:43:37'),
(2285, 'P214545', 0, '2023-12-21 20:46:53'),
(2286, 'P214708', 0, '2023-12-21 20:48:33'),
(2287, 'P214954', 0, '2023-12-21 20:51:28'),
(2288, 'P215141', 0, '2023-12-21 20:53:13'),
(2289, 'P215341', 0, '2023-12-21 20:55:46'),
(2290, 'P210108', 0, '2023-12-21 21:04:03'),
(2291, 'D1703167623', 10000, '2023-12-21 21:07:03'),
(2292, 'P211159', 0, '2023-12-21 21:14:15'),
(2293, 'P212258', 0, '2023-12-21 21:24:00'),
(2294, 'P214157', 0, '2023-12-21 21:44:02'),
(2295, 'P214736', 0, '2023-12-21 21:48:32'),
(2296, 'P214854', 0, '2023-12-21 21:49:47'),
(2297, 'P211608', 0, '2023-12-21 21:53:03'),
(2298, 'P210416', 0, '2023-12-21 22:05:06'),
(2299, 'P210521', 0, '2023-12-21 22:06:07'),
(2300, 'P210624', 0, '2023-12-21 22:07:09'),
(2301, 'P210722', 0, '2023-12-21 22:08:13'),
(2302, 'P211214', 0, '2023-12-21 22:13:13'),
(2303, 'P213911', 0, '2023-12-21 22:40:16'),
(2304, 'P212956', 0, '2023-12-21 23:31:12'),
(2305, 'P213401', 0, '2023-12-21 23:35:05'),
(2306, 'P213522', 0, '2023-12-21 23:36:04'),
(2307, 'P212822', 0, '2023-12-21 23:36:57'),
(2308, 'P213723', 0, '2023-12-21 23:38:24'),
(2309, 'P210953', 0, '2023-12-21 23:47:26'),
(2310, 'P215207', 0, '2023-12-21 23:52:41'),
(2311, 'P215332', 0, '2023-12-21 23:54:22'),
(2312, 'P220531', 0, '2023-12-22 00:06:31'),
(2313, 'P223110', 0, '2023-12-22 00:32:12'),
(2314, 'P223239', 0, '2023-12-22 00:33:31'),
(2315, 'P224904', 0, '2023-12-22 07:51:18'),
(2316, 'P225312', 0, '2023-12-22 07:56:30'),
(2317, 'P225926', 0, '2023-12-22 08:05:45'),
(2318, 'P223255', 0, '2023-12-22 08:39:07'),
(2319, 'P223924', 0, '2023-12-22 08:40:40'),
(2320, 'P224056', 0, '2023-12-22 08:42:13'),
(2321, 'P224238', 0, '2023-12-22 08:43:59'),
(2322, 'P224150', 0, '2023-12-22 08:44:09'),
(2323, 'P224422', 0, '2023-12-22 08:45:26'),
(2324, 'P224540', 0, '2023-12-22 08:46:55'),
(2325, 'P224710', 0, '2023-12-22 08:48:37'),
(2326, 'P224903', 0, '2023-12-22 08:50:19'),
(2327, 'P225038', 0, '2023-12-22 08:52:04'),
(2328, 'P225224', 0, '2023-12-22 08:54:00'),
(2329, 'P225424', 0, '2023-12-22 08:56:08'),
(2330, 'P225640', 0, '2023-12-22 08:58:08'),
(2331, 'P225750', 0, '2023-12-22 09:02:26'),
(2332, 'P225734', 0, '2023-12-22 09:03:02'),
(2333, 'P222148', 0, '2023-12-22 09:24:20'),
(2334, 'P222453', 0, '2023-12-22 09:29:36'),
(2335, 'P222811', 0, '2023-12-22 09:33:13'),
(2336, 'P225551', 0, '2023-12-22 10:02:17'),
(2337, 'P221623', 0, '2023-12-22 10:18:07'),
(2338, 'P221821', 0, '2023-12-22 10:19:28'),
(2339, 'P222034', 0, '2023-12-22 10:21:29'),
(2340, 'P222220', 0, '2023-12-22 10:23:17'),
(2341, 'P222742', 0, '2023-12-22 10:28:40'),
(2342, 'P220408', 0, '2023-12-22 11:06:07'),
(2343, 'P220641', 0, '2023-12-22 11:08:11'),
(2344, 'P220832', 0, '2023-12-22 11:09:53'),
(2345, 'P221010', 0, '2023-12-22 11:12:08'),
(2346, 'P221226', 0, '2023-12-22 11:13:34'),
(2347, 'P221358', 0, '2023-12-22 11:15:19'),
(2348, 'P221533', 0, '2023-12-22 11:16:38'),
(2349, 'P221654', 0, '2023-12-22 11:18:23'),
(2350, 'P221841', 0, '2023-12-22 11:19:57'),
(2351, 'P222012', 0, '2023-12-22 11:21:25'),
(2352, 'P222143', 0, '2023-12-22 11:22:57'),
(2353, 'P222327', 0, '2023-12-22 11:24:47'),
(2354, 'P222511', 0, '2023-12-22 11:26:25'),
(2355, 'P222645', 0, '2023-12-22 11:28:18'),
(2356, 'P222842', 0, '2023-12-22 11:30:05'),
(2357, 'P223031', 0, '2023-12-22 11:31:46'),
(2358, 'P223225', 0, '2023-12-22 11:33:25'),
(2359, 'P223349', 0, '2023-12-22 11:35:12'),
(2360, 'P223536', 0, '2023-12-22 11:36:51'),
(2361, 'P223724', 0, '2023-12-22 11:38:48'),
(2362, 'P223925', 0, '2023-12-22 11:40:44'),
(2363, 'P224112', 0, '2023-12-22 11:42:36'),
(2364, 'P224259', 0, '2023-12-22 11:44:37'),
(2365, 'P224543', 0, '2023-12-22 11:46:52'),
(2366, 'P224711', 0, '2023-12-22 11:48:29'),
(2367, 'P224844', 0, '2023-12-22 11:49:59'),
(2368, 'P225017', 0, '2023-12-22 11:51:39'),
(2369, 'P225202', 0, '2023-12-22 11:53:40'),
(2370, 'P225408', 0, '2023-12-22 11:55:27'),
(2371, 'P225554', 0, '2023-12-22 11:57:34'),
(2372, 'P225756', 0, '2023-12-22 11:59:05'),
(2373, 'P225921', 0, '2023-12-22 12:00:42'),
(2374, 'P220102', 0, '2023-12-22 12:02:36'),
(2375, 'P220258', 0, '2023-12-22 12:04:47'),
(2376, 'P220515', 0, '2023-12-22 12:07:06'),
(2377, 'P220730', 0, '2023-12-22 12:09:10'),
(2378, 'P220930', 0, '2023-12-22 12:10:57'),
(2379, 'P221118', 0, '2023-12-22 12:12:36'),
(2380, 'P221300', 0, '2023-12-22 12:14:09'),
(2381, 'P221435', 0, '2023-12-22 12:15:44'),
(2382, 'P221607', 0, '2023-12-22 12:17:32'),
(2383, 'P221751', 0, '2023-12-22 12:19:10'),
(2384, 'P221925', 0, '2023-12-22 12:20:49'),
(2385, 'P222226', 0, '2023-12-22 12:24:57'),
(2386, 'P222512', 0, '2023-12-22 12:26:25'),
(2387, 'P222641', 0, '2023-12-22 12:28:11'),
(2388, 'P222833', 0, '2023-12-22 12:29:38'),
(2389, 'P222959', 0, '2023-12-22 12:31:16'),
(2390, 'P223132', 0, '2023-12-22 12:33:01'),
(2391, 'P223322', 0, '2023-12-22 12:34:44'),
(2392, 'P223534', 0, '2023-12-22 12:37:27'),
(2393, 'P223806', 0, '2023-12-22 12:39:46'),
(2394, 'P224031', 0, '2023-12-22 12:42:01'),
(2395, 'P224224', 0, '2023-12-22 12:43:47'),
(2396, 'P224407', 0, '2023-12-22 12:45:35'),
(2397, 'P224554', 0, '2023-12-22 12:46:56'),
(2398, 'P224713', 0, '2023-12-22 12:48:46'),
(2399, 'P224908', 0, '2023-12-22 12:50:21'),
(2400, 'P225054', 0, '2023-12-22 12:52:02'),
(2401, 'P225334', 0, '2023-12-22 12:54:46'),
(2402, 'P225500', 0, '2023-12-22 12:56:54'),
(2403, 'P225711', 0, '2023-12-22 12:58:24'),
(2404, 'P225841', 0, '2023-12-22 12:59:56'),
(2405, 'P220013', 0, '2023-12-22 13:01:33'),
(2406, 'P220150', 0, '2023-12-22 13:03:08'),
(2407, 'P220325', 0, '2023-12-22 13:04:37'),
(2408, 'P220453', 0, '2023-12-22 13:06:19'),
(2409, 'D1703227849', 0, '2023-12-22 13:50:49'),
(2410, 'P220915', 0, '2023-12-22 14:11:34'),
(2411, 'P221011', 0, '2023-12-22 14:12:56'),
(2412, 'P222235', 0, '2023-12-22 14:23:40'),
(2413, 'P222157', 0, '2023-12-22 14:23:58'),
(2414, 'P222457', 0, '2023-12-22 14:25:48'),
(2415, 'P222505', 0, '2023-12-22 14:26:33'),
(2416, 'P222716', 0, '2023-12-22 14:28:43'),
(2417, 'P222909', 0, '2023-12-22 14:31:04'),
(2418, 'P223125', 0, '2023-12-22 14:32:59'),
(2419, 'P223325', 0, '2023-12-22 14:34:49'),
(2420, 'P223501', 0, '2023-12-22 14:36:43'),
(2421, 'P223749', 0, '2023-12-22 14:38:34'),
(2422, 'P223741', 0, '2023-12-22 14:38:37'),
(2423, 'P223851', 0, '2023-12-22 14:39:38'),
(2424, 'P223941', 0, '2023-12-22 14:40:38'),
(2425, 'P224102', 0, '2023-12-22 14:42:41'),
(2426, 'P224434', 0, '2023-12-22 14:45:55'),
(2427, 'P224624', 0, '2023-12-22 14:47:39'),
(2428, 'P225006', 0, '2023-12-22 14:51:42'),
(2429, 'P225201', 0, '2023-12-22 14:53:21'),
(2430, 'P225339', 0, '2023-12-22 14:54:59'),
(2431, 'P225530', 0, '2023-12-22 14:56:56'),
(2432, 'P225714', 0, '2023-12-22 14:58:24'),
(2433, 'P225840', 0, '2023-12-22 15:00:30'),
(2434, 'P220057', 0, '2023-12-22 15:02:47'),
(2435, 'P220750', 0, '2023-12-22 15:09:57'),
(2436, 'P221019', 0, '2023-12-22 15:11:27'),
(2437, 'P221155', 0, '2023-12-22 15:12:59'),
(2438, 'P221319', 0, '2023-12-22 15:14:52'),
(2439, 'P221510', 0, '2023-12-22 15:16:24'),
(2440, 'P221724', 0, '2023-12-22 15:18:57'),
(2441, 'P221923', 0, '2023-12-22 15:20:48'),
(2442, 'P222038', 0, '2023-12-22 15:22:14'),
(2443, 'P222232', 0, '2023-12-22 15:24:00'),
(2444, 'P222426', 0, '2023-12-22 15:25:36'),
(2445, 'P222552', 0, '2023-12-22 15:27:05'),
(2446, 'P222639', 0, '2023-12-22 15:27:34'),
(2447, 'P222722', 0, '2023-12-22 15:28:25'),
(2448, 'P222747', 0, '2023-12-22 15:28:36'),
(2449, 'P222843', 0, '2023-12-22 15:29:59'),
(2450, 'P222935', 0, '2023-12-22 15:30:23'),
(2451, 'P223029', 0, '2023-12-22 15:31:41'),
(2452, 'P223205', 0, '2023-12-22 15:33:16'),
(2453, 'P223332', 0, '2023-12-22 15:34:43'),
(2454, 'P223502', 0, '2023-12-22 15:36:06'),
(2455, 'P223623', 0, '2023-12-22 15:37:32'),
(2456, 'P223940', 0, '2023-12-22 15:40:45'),
(2457, 'P224545', 0, '2023-12-22 15:46:38'),
(2458, 'P225213', 0, '2023-12-22 15:52:55'),
(2459, 'P225315', 0, '2023-12-22 15:54:09'),
(2460, 'P220154', 0, '2023-12-22 16:02:49'),
(2461, 'P220441', 0, '2023-12-22 16:06:08'),
(2462, 'P220622', 0, '2023-12-22 16:07:15'),
(2463, 'P220726', 0, '2023-12-22 16:08:18'),
(2464, 'P220952', 0, '2023-12-22 16:10:47'),
(2465, 'P222802', 0, '2023-12-22 17:32:22'),
(2466, 'D1703242814', 0, '2023-12-22 18:00:14'),
(2467, 'P221414', 0, '2023-12-22 18:16:55'),
(2468, 'P220237', 0, '2023-12-22 19:04:07'),
(2469, 'P220659', 0, '2023-12-22 19:09:32'),
(2470, 'D1703247189', 20000, '2023-12-22 19:13:09'),
(2471, 'P224500', 0, '2023-12-22 20:48:10'),
(2472, 'P220427', 0, '2023-12-22 21:05:23'),
(2473, 'P220511', 0, '2023-12-22 21:12:00'),
(2474, 'P221757', 0, '2023-12-22 21:22:14'),
(2475, 'P220118', 0, '2023-12-22 22:05:04'),
(2476, 'P232216', 0, '2023-12-23 05:25:52'),
(2477, 'P233233', 0, '2023-12-23 05:35:03'),
(2478, 'P233520', 0, '2023-12-23 05:37:10'),
(2479, 'P233808', 0, '2023-12-23 05:44:03'),
(2480, 'P234743', 0, '2023-12-23 05:49:20'),
(2481, 'P234950', 0, '2023-12-23 05:51:49'),
(2482, 'P233852', 0, '2023-12-23 06:46:08'),
(2483, 'P231838', 0, '2023-12-23 08:20:15'),
(2484, 'P232036', 0, '2023-12-23 08:21:33'),
(2485, 'P232156', 0, '2023-12-23 08:23:02'),
(2486, 'P234830', 2965, '2023-12-23 08:51:23'),
(2487, 'D1703296502', 9760, '2023-12-23 08:55:02'),
(2488, 'P235555', 0, '2023-12-23 08:58:09'),
(2489, 'P235723', 0, '2023-12-23 09:59:07'),
(2490, 'P235951', 0, '2023-12-23 10:01:34'),
(2491, 'P231226', 0, '2023-12-23 10:13:43'),
(2492, 'D1703306204', 0, '2023-12-23 11:36:44'),
(2493, 'P232331', 0, '2023-12-23 14:24:33'),
(2494, 'P233251', 0, '2023-12-23 14:36:19'),
(2495, 'D1703317708', 0, '2023-12-23 14:48:28'),
(2496, 'D1703318776', 0, '2023-12-23 15:06:16'),
(2497, 'P234934', 0, '2023-12-23 21:05:22'),
(2499, 'P235729', 0, '2023-12-23 21:58:00'),
(2500, 'P231605', 0, '2023-12-23 22:16:39'),
(2501, 'P231808', 0, '2023-12-23 22:18:55'),
(2502, 'P232141', 0, '2023-12-23 22:22:09'),
(2503, 'P1703345143', 0, '2023-12-23 22:25:43'),
(2504, 'P1703346225', 0, '2023-12-23 22:43:45'),
(2505, 'P1703356191', 0, '2023-12-24 01:29:51'),
(2506, 'P1703356248', 0, '2023-12-24 01:30:48'),
(2507, 'D1703370380', 0, '2023-12-24 05:26:20'),
(2508, 'D1703370416', 0, '2023-12-24 05:26:56'),
(2509, 'P1703372260', 0, '2023-12-24 05:57:40'),
(2511, 'P1703381179', 0, '2023-12-24 08:26:19'),
(2512, 'P1703381464', 0, '2023-12-24 08:31:04'),
(2513, 'P1703387088', 0, '2023-12-24 10:04:48'),
(2514, 'P1703389318', 0, '2023-12-24 10:41:58'),
(2515, 'P1703390110', 0, '2023-12-24 10:55:10'),
(2516, 'P1703390612', 0, '2023-12-24 11:03:32'),
(2523, 'P1703401428', 0, '2023-12-24 14:03:48'),
(2519, 'P1703393802', 0, '2023-12-24 11:56:42'),
(2520, 'P1703398598', 0, '2023-12-24 13:16:38'),
(2521, 'P1703398823', 0, '2023-12-24 13:20:23'),
(2524, 'D1703404069', 20000, '2023-12-24 14:47:49'),
(2526, 'P1703409380', 0, '2023-12-24 16:16:20'),
(2527, 'P1703412377', 0, '2023-12-24 17:06:17'),
(2528, 'P1703413744', 0, '2023-12-24 17:29:04'),
(2529, 'P1703413791', 0, '2023-12-24 17:29:52'),
(2530, 'P1703413822', 0, '2023-12-24 17:30:22'),
(2531, 'P1703416771', 0, '2023-12-24 18:19:31'),
(2532, 'P1703438147', 0, '2023-12-25 00:15:47'),
(2533, 'P1703455117', 26200, '2023-12-25 04:58:37'),
(2534, 'D1703483899', 0, '2023-12-25 12:58:19'),
(2535, 'P253619', 0, '2023-12-25 13:36:47'),
(2536, 'P255353', 0, '2023-12-25 13:54:23'),
(2537, 'P255457', 0, '2023-12-25 13:55:48'),
(2538, 'P253051', 0, '2023-12-25 14:31:40'),
(2539, 'P254723', 0, '2023-12-25 15:47:55'),
(2540, 'P254819', 0, '2023-12-25 15:48:42'),
(2541, 'P250540', 0, '2023-12-25 17:07:54'),
(2542, 'P253616', 0, '2023-12-25 18:37:53'),
(2543, 'P253708', 0, '2023-12-25 18:37:54'),
(2544, 'P250429', 0, '2023-12-25 19:05:04'),
(2545, 'D1703506181', 0, '2023-12-25 19:09:41'),
(2546, 'D1703506938', 0, '2023-12-25 19:22:18'),
(2547, 'P254041', 0, '2023-12-25 19:45:50'),
(2548, 'D1703513848', 10580, '2023-12-25 21:17:28'),
(2549, 'D1703516119', 0, '2023-12-25 21:55:19'),
(2550, 'P263605', 0, '2023-12-26 02:36:47'),
(2551, 'P263721', 0, '2023-12-26 02:37:51'),
(2552, 'P263945', 0, '2023-12-26 02:40:18'),
(2553, 'P264038', 0, '2023-12-26 02:41:33'),
(2554, 'P265056', 0, '2023-12-26 02:51:21'),
(2555, 'P265636', 0, '2023-12-26 07:59:11'),
(2556, 'P261724', 0, '2023-12-26 08:20:51'),
(2557, 'P261506', 0, '2023-12-26 11:16:58'),
(2558, 'P265946', 0, '2023-12-26 12:00:19'),
(2559, 'P260127', 0, '2023-12-26 12:02:18'),
(2561, 'P261532', 0, '2023-12-26 12:18:11'),
(2564, 'M10381', 0, '2023-12-26 13:51:14'),
(2563, 'P263020', 0, '2023-12-26 12:30:49'),
(2565, 'D1703574286', 0, '2023-12-26 14:04:46'),
(2566, 'P260903', 0, '2023-12-26 14:09:30'),
(2567, 'P262215', 0, '2023-12-26 14:22:48'),
(2568, 'P261115', 33000, '2023-12-26 15:14:01'),
(2569, 'P260855', 0, '2023-12-26 15:14:48'),
(2570, 'P263056', 0, '2023-12-26 15:31:20'),
(2660, 'P68485', 3000, '2024-01-10 01:42:41'),
(2572, 'P260157', 0, '2023-12-26 16:07:18'),
(2623, 'P72038', 300, '2024-01-03 17:31:12'),
(2576, 'P264158', 0, '2023-12-26 17:47:10'),
(2577, 'M20702', 0, '2023-12-27 10:37:50'),
(2578, 'M16144', 10000, '2023-12-27 10:44:27'),
(2579, 'M27450', 10000, '2023-12-27 10:55:00'),
(2580, 'M20599', 0, '2023-12-27 10:58:05'),
(2581, 'M14476', 10000, '2023-12-27 11:27:18'),
(2582, 'D1703656354', 0, '2023-12-27 12:52:34'),
(2583, 'P271103', 2000, '2023-12-27 13:18:03'),
(2584, 'P275039', 0, '2023-12-27 13:53:34'),
(2585, 'P271745', 0, '2023-12-27 14:19:33'),
(2586, 'P271128', 2000, '2023-12-27 17:13:57'),
(2587, 'P273052', 1925, '2023-12-27 17:32:11'),
(2588, 'P274803', 0, '2023-12-27 18:49:49'),
(2589, 'D1703678505', 10000, '2023-12-27 19:01:45'),
(2590, 'D1703687187', 10000, '2023-12-27 21:26:27'),
(2591, 'P280511', 2000, '2023-12-28 06:28:43'),
(2592, 'P282305', 0, '2023-12-28 07:24:40'),
(2593, 'P282803', 2000, '2023-12-28 07:30:20'),
(2594, 'P283300', 2000, '2023-12-28 07:34:27'),
(2595, 'D1703726268', 0, '2023-12-28 08:17:48'),
(2596, 'M11762', 10000, '2023-12-28 10:02:50'),
(2597, 'P285011', 0, '2023-12-28 15:51:08'),
(2599, 'P295451', 0, '2023-12-29 09:57:56'),
(2600, 'P290357', 0, '2023-12-29 19:04:59'),
(2601, 'M22397', 0, '2023-12-30 00:27:50'),
(2704, 'P47903', 0, '2024-01-14 17:40:28'),
(2603, 'P311039', 0, '2023-12-31 18:14:03'),
(2604, 'P313727', 0, '2023-12-31 22:41:23'),
(2605, 'D1704117482', 0, '2024-01-01 20:58:00'),
(2606, 'D1704120859', 0, '2024-01-01 21:53:52'),
(2607, 'P66854', 0, '2024-01-01 21:57:53'),
(2608, 'P26235', 0, '2024-01-01 22:57:07'),
(2609, 'M17655', 50000, '2024-01-02 11:27:43'),
(2610, 'D1704178568', 0, '2024-01-02 13:55:02'),
(2611, 'P96212', 0, '2024-01-02 22:17:04'),
(2612, 'D1704256904', 0, '2024-01-03 11:39:58'),
(2613, 'P42670', 0, '2024-01-03 11:53:55'),
(2614, 'P43920', 11910, '2024-01-03 14:58:28'),
(2615, 'P31840', 3600, '2024-01-03 15:01:27'),
(2616, 'D1704269755', 100000, '2024-01-03 15:15:46'),
(2617, 'P58674', 0, '2024-01-03 15:30:51'),
(2618, 'P58854', 0, '2024-01-03 15:39:51'),
(2619, 'P78026', 995, '2024-01-03 16:30:09'),
(2626, 'D1704293401', 0, '2024-01-03 21:48:12'),
(2627, 'P54759', 0, '2024-01-04 11:01:13'),
(2628, 'P23545', 3000, '2024-01-04 12:58:19'),
(2629, 'D1704349204', 0, '2024-01-04 13:19:23'),
(2630, 'P40745', 3000, '2024-01-04 21:43:01'),
(2632, 'P23677', 0, '2024-01-04 22:47:08'),
(2633, 'P45029', 3000, '2024-01-05 13:28:13'),
(2634, 'P22482', 3000, '2024-01-05 13:39:46'),
(2635, 'M19035', 0, '2024-01-05 16:32:45'),
(2636, 'P29250', 3000, '2024-01-05 21:19:58'),
(2637, 'P67785', 3000, '2024-01-06 10:14:37'),
(2638, 'D1704513591', 0, '2024-01-06 10:58:07'),
(2639, 'D1704532929', 0, '2024-01-06 16:13:12'),
(2640, 'P8884', 3000, '2024-01-06 18:03:02'),
(2641, 'P9823', 3000, '2024-01-07 00:02:41'),
(2642, 'P40367', 3000, '2024-01-07 00:09:03'),
(2643, 'P56365', 3000, '2024-01-07 01:54:01'),
(2644, 'P14097', 0, '2024-01-07 07:34:08'),
(2645, 'P7552', 0, '2024-01-07 11:50:48'),
(2646, 'D1704605354', 0, '2024-01-07 12:27:35'),
(2648, 'D1704626108', 0, '2024-01-07 18:14:35'),
(2649, 'P15758', 0, '2024-01-08 09:25:31'),
(2650, 'M20440', 0, '2024-01-08 11:12:23'),
(2653, 'P5281', 1028572, '2024-01-08 19:20:31'),
(2659, 'P98110', 0, '2024-01-10 00:11:16'),
(2652, 'D1704713328', 0, '2024-01-08 18:27:48'),
(2654, 'P18999', 40000, '2024-01-08 19:32:26'),
(2655, 'P61391', 12000, '2024-01-08 20:57:55'),
(2656, 'P69956', 0, '2024-01-08 21:11:05'),
(2657, 'P12191', 37000, '2024-01-09 12:59:31'),
(2658, 'M24454', 10000, '2024-01-09 13:06:40'),
(2682, 'P42831', 0, '2024-01-11 21:48:28'),
(2662, 'P33449', 0, '2024-01-10 01:51:47'),
(2663, 'D1704851860', 0, '2024-01-10 08:57:30'),
(2664, 'P70733', 0, '2024-01-10 19:50:34'),
(2665, 'P23024', 0, '2024-01-10 21:51:08'),
(2666, 'P43607', 0, '2024-01-10 23:16:42'),
(2667, 'P14884', 0, '2024-01-11 02:59:32'),
(2668, 'M18982', 10000, '2024-01-11 07:13:47'),
(52000, 'P92316', 21275, '2024-01-11 20:27:01'),
(2670, 'P94793', 0, '2024-01-11 11:59:09'),
(2671, 'D1704959354', 0, '2024-01-11 14:47:48'),
(2672, 'P41113', 19777, '2024-01-11 14:50:41'),
(2673, 'P68740', 0, '2024-01-11 18:04:36'),
(2674, 'P22550', 3925, '2024-01-11 18:27:21'),
(2675, 'P33127', 0, '2024-01-11 18:35:48'),
(2681, 'P85372', 0, '2024-01-11 20:55:02'),
(2683, 'P49938', 0, '2024-01-11 21:52:25'),
(2684, 'P97208', 0, '2024-01-12 11:29:45'),
(2685, 'P56571', 0, '2024-01-12 11:32:33'),
(2686, 'P41112', 955, '2024-01-12 14:29:30'),
(2687, 'P27374', 0, '2024-01-12 16:56:52'),
(2688, 'P84080', 3000, '2024-01-12 17:47:00'),
(2689, 'P81394', 0, '2024-01-12 20:23:18'),
(2690, 'P25143', 0, '2024-01-12 20:43:59'),
(2691, 'P88383', 3000, '2024-01-12 21:07:00'),
(2692, 'P34530', 0, '2024-01-12 22:30:42'),
(2693, 'P93785', 0, '2024-01-12 23:18:48'),
(2694, 'P88049', 0, '2024-01-13 09:38:30'),
(2695, 'M11652', 0, '2024-01-13 12:24:38'),
(2696, 'P84756', 0, '2024-01-13 18:56:50'),
(2697, 'P1103', 0, '2024-01-13 20:25:42'),
(2698, 'P12176', 0, '2024-01-14 02:08:31'),
(2699, 'P36980', 0, '2024-01-14 04:25:19'),
(2700, 'P89024', 0, '2024-01-14 07:25:47'),
(2701, 'D1705206761', 0, '2024-01-14 11:32:06'),
(2702, 'P99327', 0, '2024-01-14 12:40:04'),
(2703, 'P28061', 0, '2024-01-14 14:13:55'),
(2705, 'P8969', 0, '2024-01-14 20:07:32'),
(2706, 'P23217', 0, '2024-01-14 22:19:27'),
(2707, 'P30555', 0, '2024-01-15 08:22:14'),
(2708, 'P27145', 0, '2024-01-15 08:25:20'),
(2709, 'P52011', 0, '2024-01-15 09:01:40'),
(2710, 'P28468', 0, '2024-01-15 14:22:42'),
(2711, 'P49195', 0, '2024-01-15 15:08:40'),
(2712, 'D1705316312', 0, '2024-01-15 17:58:32'),
(2713, 'P60007', 0, '2024-01-15 18:59:10'),
(2714, 'P49196', 0, '2024-01-15 23:56:36'),
(2715, 'P47352', -10900, '2024-01-16 01:55:54'),
(2716, 'P17015', 0, '2024-01-16 06:46:56'),
(2717, 'P84856', 0, '2024-01-16 09:05:22'),
(2718, 'D1705371468', 0, '2024-01-16 09:16:20'),
(2719, 'P30475', 3000, '2024-01-16 11:58:02'),
(2720, 'D1705383953', 0, '2024-01-16 12:45:30'),
(2721, 'D1705390750', 0, '2024-01-16 14:38:44'),
(2722, 'P27715', 0, '2024-01-16 17:46:54'),
(2723, 'P2088', 0, '2024-01-16 17:58:06'),
(2724, 'D1705403325', 0, '2024-01-16 18:07:40'),
(2725, 'D1705403280', 0, '2024-01-16 18:07:44'),
(2726, 'P44554', 0, '2024-01-16 19:39:04'),
(2727, 'P56399', 0, '2024-01-16 21:06:31'),
(2728, 'P62009', 0, '2024-01-17 00:53:45'),
(2729, 'P91025', 0, '2024-01-17 08:48:51'),
(2730, 'P8864', 0, '2024-01-17 11:32:19'),
(2731, 'P6485', 3000, '2024-01-17 13:11:31'),
(2732, 'P70933', 0, '2024-01-17 13:28:20'),
(2733, 'P65621', 0, '2024-01-17 14:01:39'),
(2734, 'P66360', 0, '2024-01-17 17:01:01'),
(2735, 'P91395', 0, '2024-01-17 18:16:45'),
(2736, 'P4774', 0, '2024-01-17 18:31:04'),
(2737, 'D1705493959', 0, '2024-01-17 19:18:16'),
(2738, 'P4780', 2590, '2024-01-17 21:00:18'),
(2739, 'P66823', 0, '2024-01-17 21:02:24'),
(2740, 'D1705500232', 0, '2024-01-17 21:03:14'),
(2741, 'P4941', 0, '2024-01-17 21:09:04'),
(2742, 'P59502', 0, '2024-01-17 21:38:05'),
(2743, 'P52909', 0, '2024-01-17 21:56:50'),
(2744, 'P1171', 4685, '2024-01-18 00:22:09'),
(2745, 'P90209', 0, '2024-01-18 01:00:07'),
(2746, 'P22596', 0, '2024-01-18 01:03:08'),
(2747, 'P60237', 0, '2024-01-18 07:58:37'),
(2749, 'P17010', 905, '2024-01-18 11:08:15'),
(2751, 'P36927', 0, '2024-01-18 17:53:32'),
(2752, 'P69353', 960, '2024-01-18 23:03:40'),
(2753, 'D1705599148', 0, '2024-01-19 00:31:23'),
(2754, 'D1705601706', 0, '2024-01-19 01:05:52'),
(2755, 'P13174', 0, '2024-01-19 10:03:53'),
(2756, 'P54534', 0, '2024-01-19 13:35:12'),
(2757, 'P66912', 0, '2024-01-19 19:48:52'),
(2758, 'P87693', 3095, '2024-01-19 20:08:15'),
(2759, 'P60735', 0, '2024-01-20 01:27:52'),
(2760, 'P77433', 0, '2024-01-20 01:32:31'),
(2761, 'P55981', 0, '2024-01-20 01:37:03'),
(2762, 'P13194', 0, '2024-01-20 16:37:40'),
(2763, 'P34507', 0, '2024-01-20 17:01:16'),
(2764, 'P60387', 0, '2024-01-20 19:18:46'),
(2765, 'D1705757537', 0, '2024-01-20 20:30:43'),
(2766, 'P92495', 0, '2024-01-20 23:31:09'),
(2767, 'P2472', 0, '2024-01-21 11:39:46'),
(2768, 'P44482', 3000, '2024-01-21 16:32:13'),
(2769, 'P34451', 0, '2024-01-21 16:56:51'),
(2770, 'P18791', 0, '2024-01-21 17:19:52'),
(2771, 'P57468', 0, '2024-01-22 08:06:11'),
(2772, 'P78897', 0, '2024-01-22 10:52:47'),
(2773, 'P96141', 0, '2024-01-22 14:34:57'),
(2779, 'M26502', 0, '2024-01-23 16:21:46'),
(2777, 'D1705925332', 26500, '2024-01-22 19:08:21'),
(2776, 'P40882', 10000, '2024-01-22 17:40:37'),
(2778, 'P90088', 0, '2024-01-23 13:35:06'),
(2780, 'P78461', 0, '2024-01-23 17:41:12'),
(2781, 'P18133', 0, '2024-01-23 19:07:37'),
(2782, 'P74363', 0, '2024-01-23 22:39:55'),
(2783, 'P26311', 0, '2024-01-24 16:43:17'),
(2784, 'P75896', 0, '2024-01-24 22:40:21'),
(2785, 'P90916', 0, '2024-01-25 16:17:43'),
(2786, 'P84180', 0, '2024-01-25 18:24:01'),
(2787, 'P37094', 0, '2024-01-25 22:53:18'),
(2788, 'P31427', 10000, '2024-01-26 17:23:59'),
(2789, 'D1706290243', 0, '2024-01-27 00:28:40'),
(2790, 'P32624', 0, '2024-01-27 08:40:57'),
(2791, 'P92655', 3000, '2024-01-27 08:41:34'),
(2792, 'P33804', 0, '2024-01-27 11:25:29'),
(2793, 'P93881', 0, '2024-01-27 14:02:02'),
(2794, 'P72097', 0, '2024-01-28 01:19:52'),
(2795, 'P6478', 113250, '2024-01-28 20:39:46'),
(2796, 'M14445', 0, '2024-01-28 22:55:02'),
(2797, 'P83678', 3000, '2024-01-28 23:26:18'),
(2798, 'P12300', 0, '2024-01-29 13:31:54'),
(2799, 'P53345', 0, '2024-01-29 14:21:03'),
(2800, 'P97371', 0, '2024-01-29 19:06:48'),
(2801, 'P3158', 0, '2024-01-29 21:12:18'),
(2802, 'P81940', 0, '2024-01-29 21:32:03'),
(2803, 'P54725', 0, '2024-01-29 21:56:38'),
(2804, 'P79387', 0, '2024-01-30 13:48:00'),
(2805, 'P18318', 0, '2024-01-30 14:07:45'),
(2806, 'P99803', 0, '2024-01-30 15:32:35'),
(2807, 'P25706', 0, '2024-01-30 16:57:29'),
(2808, 'P95925', 0, '2024-01-30 17:38:14'),
(2809, 'P92860', 0, '2024-01-30 18:55:04'),
(2810, 'P85225', 0, '2024-01-30 19:39:38'),
(2811, 'P12470', 0, '2024-01-30 20:22:24'),
(2812, 'P82012', 0, '2024-01-30 20:42:42'),
(2813, 'P51134', 0, '2024-01-31 00:24:03'),
(2814, 'P3757', 1650, '2024-01-31 01:47:08'),
(2815, 'P9710', 6190, '2024-01-31 07:26:13'),
(2816, 'D1706679990', 0, '2024-01-31 12:46:30'),
(2817, 'P48927', 0, '2024-01-31 16:29:20'),
(2818, 'D1706707348', 0, '2024-01-31 20:22:16'),
(2819, 'P25190', 0, '2024-02-01 01:00:52'),
(2820, 'P50686', 20000, '2024-02-01 16:53:20'),
(2821, 'P23534', 0, '2024-02-01 19:18:11'),
(2822, 'P73185', 0, '2024-02-02 07:31:36'),
(2823, 'P99863', 0, '2024-02-02 13:36:11'),
(2824, 'P87634', 0, '2024-02-03 14:08:20'),
(2825, 'P90133', 0, '2024-02-03 18:58:27'),
(2826, 'P95638', 0, '2024-02-03 23:11:18'),
(2827, 'P59275', 0, '2024-02-03 23:58:41'),
(2828, 'P50329', 0, '2024-02-04 01:02:56'),
(2829, 'D1707026533', 0, '2024-02-04 12:56:20'),
(2830, 'D1707026605', 0, '2024-02-04 12:57:52'),
(2831, 'P45168', 0, '2024-02-04 12:58:15'),
(2832, 'P9749', 0, '2024-02-04 13:01:20'),
(2833, 'D1707045697', 0, '2024-02-04 18:08:43'),
(2834, 'P69151', 49925, '2024-02-04 18:48:54'),
(2835, 'P56242', 0, '2024-02-04 22:52:16'),
(2836, 'D1707095167', 0, '2024-02-05 08:04:59'),
(2837, 'P69940', 3000, '2024-02-05 09:38:17'),
(2838, 'D1707102226', 0, '2024-02-05 10:00:13'),
(2839, 'P18468', 0, '2024-02-05 10:33:13'),
(2840, 'P61011', 9000, '2024-02-05 10:52:09'),
(2841, 'D1707108830', 0, '2024-02-05 11:53:10'),
(2842, 'M13547', 0, '2024-02-05 12:32:45'),
(2843, 'M10827', 0, '2024-02-05 12:43:17'),
(2844, 'P75901', 0, '2024-02-05 13:05:08'),
(2845, 'P15540', 0, '2024-02-05 14:06:04'),
(2846, 'D1707119106', 0, '2024-02-05 14:43:49'),
(2847, 'P99168', 0, '2024-02-05 16:13:50'),
(2848, 'P52268', 0, '2024-02-05 19:37:05'),
(2849, 'P34582', 0, '2024-02-06 01:17:28'),
(2850, 'P64785', 0, '2024-02-06 10:30:55'),
(2851, 'P30502', 0, '2024-02-06 11:17:35'),
(2852, 'P90869', 0, '2024-02-06 11:24:54'),
(2853, 'P70669', 0, '2024-02-06 11:54:56'),
(52001, 'P30578', 41000, '2024-02-06 13:39:58'),
(52002, 'P1675', 0, '2024-02-06 14:07:00'),
(52003, 'P70189', 0, '2024-02-06 14:34:18'),
(52004, 'P36345', 0, '2024-02-06 14:42:19'),
(52005, 'D1707206376', 0, '2024-02-06 14:54:07'),
(52006, 'P24622', 0, '2024-02-06 15:28:18'),
(52007, 'P10763', 0, '2024-02-06 16:16:48'),
(52008, 'P59215', 0, '2024-02-06 17:07:24'),
(52009, 'P92368', 0, '2024-02-06 17:43:00'),
(52010, 'P77002', 0, '2024-02-06 17:50:26'),
(52011, 'P69466', 0, '2024-02-06 18:15:09'),
(52012, 'P11736', 0, '2024-02-06 18:18:07'),
(52013, 'P78222', 0, '2024-02-06 18:20:14'),
(52014, 'P58682', 0, '2024-02-06 18:39:34'),
(52015, 'P68189', 0, '2024-02-06 18:46:49'),
(52016, 'P95153', 0, '2024-02-06 19:05:20'),
(52017, 'P91427', 0, '2024-02-06 19:22:42'),
(52018, 'P20331', 0, '2024-02-06 19:35:39'),
(52019, 'P94758', 0, '2024-02-06 19:57:43'),
(52020, 'P70720', 0, '2024-02-06 20:02:23'),
(52021, 'P31743', 0, '2024-02-06 20:03:24'),
(52022, 'P10474', 0, '2024-02-06 21:51:47'),
(52023, 'P96034', 0, '2024-02-06 22:11:48'),
(52024, 'P38190', 0, '2024-02-06 22:11:52'),
(52025, 'P75846', 0, '2024-02-06 22:17:31'),
(52026, 'P32427', 0, '2024-02-07 08:10:23'),
(52027, 'P551', 0, '2024-02-07 08:16:41'),
(52028, 'P53832', 3000, '2024-02-07 08:19:23'),
(52029, 'P72254', 0, '2024-02-07 08:22:38'),
(52030, 'D1707274417', 0, '2024-02-07 09:37:46'),
(52031, 'D1707273733', 0, '2024-02-07 09:41:09'),
(52032, 'D1707276635', 0, '2024-02-07 10:23:29'),
(52033, 'P6007', 3000, '2024-02-07 10:31:59'),
(52034, 'D1707277682', 0, '2024-02-07 10:47:28'),
(52035, 'D1707279299', 0, '2024-02-07 11:14:08'),
(52036, 'D1707282280', 0, '2024-02-07 11:51:09'),
(52037, 'P25976', 0, '2024-02-07 12:02:11'),
(52038, 'D1707284538', 0, '2024-02-07 12:41:06'),
(52039, 'P19158', 0, '2024-02-07 15:57:25'),
(52040, 'P62086', 0, '2024-02-07 16:06:01'),
(52041, 'P31119', 0, '2024-02-07 16:08:57'),
(52042, 'P34186', 0, '2024-02-07 16:13:39'),
(52043, 'P48662', 0, '2024-02-07 16:40:45'),
(52044, 'P68646', 0, '2024-02-07 18:02:30'),
(52045, 'P51593', 0, '2024-02-07 19:34:48'),
(52046, 'P37341', 0, '2024-02-07 20:00:39'),
(52047, 'D1707312019', 0, '2024-02-07 20:18:15'),
(52048, 'D1707320314', 0, '2024-02-07 22:31:04'),
(52049, 'P31562', 0, '2024-02-07 22:34:35'),
(52050, 'P75679', 0, '2024-02-07 23:48:07'),
(52051, 'P40934', 0, '2024-02-08 11:04:15'),
(52052, 'P79329', 0, '2024-02-08 15:38:25'),
(52053, 'P83816', 0, '2024-02-08 22:40:37'),
(52054, 'P54573', 0, '2024-02-09 07:54:08'),
(52055, 'D1707440966', 0, '2024-02-09 08:09:08'),
(52056, 'P70635', 0, '2024-02-09 08:30:26'),
(52057, 'D1707443218', 0, '2024-02-09 08:46:33'),
(52058, 'P91363', 0, '2024-02-09 10:11:33'),
(52059, 'P62466', 0, '2024-02-09 10:11:57'),
(52060, 'D1707448889', 0, '2024-02-09 10:21:21'),
(52061, 'P85170', 0, '2024-02-09 10:22:41'),
(52062, 'D1707453022', 0, '2024-02-09 11:29:34'),
(52063, 'P10547', 0, '2024-02-09 12:49:35'),
(52064, 'M26802', 0, '2024-02-09 14:49:15'),
(52065, 'P61300', 0, '2024-02-09 20:23:38'),
(52066, 'P63016', 0, '2024-02-09 23:42:53'),
(52067, 'P65096', 0, '2024-02-10 02:01:46'),
(52068, 'P68241', 0, '2024-02-10 09:15:50'),
(52069, 'P70308', 0, '2024-02-10 15:52:49'),
(52070, 'P92173', 0, '2024-02-10 16:33:08'),
(52071, 'D1707558287', 0, '2024-02-10 16:43:42'),
(52072, 'P96889', 3000, '2024-02-10 17:51:14'),
(52073, 'P63558', 0, '2024-02-10 17:54:30'),
(52074, 'P35965', 0, '2024-02-12 12:42:54'),
(52075, 'P62977', 0, '2024-02-12 17:17:24'),
(52076, 'P22269', 0, '2024-02-13 15:39:01'),
(52077, 'P41933', 0, '2024-02-16 16:15:30'),
(52078, 'P47184', 0, '2024-02-16 21:05:46'),
(52079, 'P62781', 3000, '2024-02-16 22:39:07'),
(52080, 'P2060', 0, '2024-02-16 22:45:57'),
(52081, 'P55291', 0, '2024-02-16 22:59:56'),
(52082, 'P38962', 0, '2024-02-17 01:36:58'),
(52083, 'P65466', 0, '2024-02-17 14:20:55'),
(52084, 'P6190', 0, '2024-02-17 23:25:38'),
(52085, 'P52390', 0, '2024-02-18 08:57:37'),
(52086, 'D1708222378', 0, '2024-02-18 09:09:23'),
(52087, 'P67972', 0, '2024-02-18 20:15:27'),
(52088, 'P5138', 0, '2024-02-19 06:02:06'),
(52089, 'P4021', 0, '2024-02-19 08:48:37'),
(52090, 'P59660', 0, '2024-02-19 15:09:26'),
(52091, 'P10775', 0, '2024-02-19 18:36:20'),
(52092, 'P31114', 0, '2024-02-19 21:03:23'),
(52093, 'M21751', 0, '2024-02-20 13:33:20'),
(52094, 'D1708427267', 0, '2024-02-20 18:07:20'),
(52095, 'D1708443246', 0, '2024-02-20 22:32:19'),
(52096, 'P36656', 0, '2024-02-21 14:08:25'),
(52097, 'P91484', 0, '2024-02-22 09:42:51'),
(52098, 'D1708578573', 0, '2024-02-22 12:08:15'),
(52099, 'P72952', 23040, '2024-02-24 17:20:37'),
(52102, 'D1708831070', 201501, '2024-02-25 10:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_transaksi` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `status_transaksi`) VALUES
(3, 'proses'),
(4, 'selesai'),
(5, 'batal'),
(2, 'diterima'),
(1, 'mencari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `id` varchar(255) NOT NULL DEFAULT '',
  `id_pelanggan` varchar(200) NOT NULL,
  `id_driver` varchar(200) DEFAULT NULL,
  `order_fitur` tinyint(4) NOT NULL,
  `start_latitude` varchar(20) NOT NULL,
  `start_longitude` varchar(20) NOT NULL,
  `end_latitude` varchar(20) NOT NULL,
  `end_longitude` varchar(20) NOT NULL,
  `home` varchar(255) DEFAULT '2',
  `jarak` double NOT NULL,
  `harga` int(11) NOT NULL,
  `jasaapp` int(11) DEFAULT 0,
  `waktu_order` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `estimasi_time` varchar(500) NOT NULL,
  `tanggal` varchar(250) DEFAULT NULL,
  `alamat_asal` varchar(500) NOT NULL,
  `alamat_tujuan` varchar(500) NOT NULL,
  `kredit_promo` int(11) NOT NULL DEFAULT 0,
  `biaya_akhir` int(11) DEFAULT 0,
  `pakai_wallet` tinyint(1) NOT NULL DEFAULT 0,
  `rate` varchar(11) NOT NULL,
  `penumpang` int(11) DEFAULT 1,
  `jenis` varchar(255) DEFAULT 'Semua',
  `isaccept` varchar(11) DEFAULT '0',
  `metode` varchar(255) DEFAULT 'tunai',
  `timeout` varchar(255) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `id`, `id_pelanggan`, `id_driver`, `order_fitur`, `start_latitude`, `start_longitude`, `end_latitude`, `end_longitude`, `home`, `jarak`, `harga`, `jasaapp`, `waktu_order`, `waktu_selesai`, `estimasi_time`, `tanggal`, `alamat_asal`, `alamat_tujuan`, `kredit_promo`, `biaya_akhir`, `pakai_wallet`, `rate`, `penumpang`, `jenis`, `isaccept`, `metode`, `timeout`) VALUES
(295, '24559', 'P72952', 'D1708831070', 2, '-6.1126997891477', '106.68430801481', '-6.1185707336963', '106.68855898082', '1', 1.6, 12000, 0, '2024-03-18 14:14:43', '2024-03-18 07:15:11', '5 menit', '18/Mar/2024', 'Jl. Perancis No.44, RT.005/RW.007, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 'Taman Makota, Jl. Husein Sastranegara, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 0, 12000, 0, '1.0', 1, 'Semua', '0', '0', '0'),
(294, '17962', 'P72952', 'D1708831070', 2, '-6.2086859867577', '106.95041030645', '-6.2185855218481', '106.95239044726', '1', 1.4, 12000, 0, '2024-03-18 09:28:53', '2024-03-18 02:30:38', '4 menit', '18/Mar/2024', 'QXR2+G44, RW.6, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950, Indonesia', 'Jl. Raya St. Cakung No.37, RT.10/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950, Indonesia', 0, 12000, 0, '5.0', 1, 'Semua', '0', '0', '0'),
(293, '27860', 'P72952', 'D1708831070', 2, '-6.2185855218481', '106.95239044726', '-6.2185855218481', '106.95239044726', '1', 0, 12000, 0, '2024-03-18 09:25:19', '2024-03-18 02:26:42', '1 Menit', '18/Mar/2024', 'Jl. Raya St. Cakung No.37, RT.10/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950, Indonesia', 'Jl. Raya St. Cakung No.37, RT.10/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950, Indonesia', 0, 12000, 0, '5.0', 1, 'Semua', '0', '0', '0'),
(296, '14016', 'P72952', 'D1708831070', 2, '-6.1198505250422', '106.68555155396', '-6.1185847350769', '106.68856870383', '1', 1.5, 12000, 0, '2024-03-18 14:23:38', '2024-03-18 07:25:18', '5 Menit', '18/Mar/2024', 'Jl. Husein Sastranegara No.98, RT.004/RW.8, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 'Jl. Perumahan Mahkota Indah No.25, RT.001/RW.009, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 0, 12000, 0, '5.0', 1, 'Semua', '0', '0', '0'),
(297, '14157', 'P72952', 'D1708831070', 2, '-6.1116756759285', '106.68663114309', '-6.1185764009218', '106.68854959309', '1', 1.2, 12000, 0, '2024-03-18 14:28:05', '2024-03-18 07:29:31', '5 menit', '18/Mar/2024', 'Jl. Husein Sastranegara No.33, RT.2/RW.3, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 'Jl. Perumahan Mahkota Indah No.25, RT.001/RW.009, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 0, 12000, 0, '5.0', 1, 'Semua', '0', '0', '0'),
(298, '14365', 'P72952', 'D1708831070', 2, '-6.1116770094105', '106.68678805232', '-6.1185910690347', '106.6886350885', '1', 1.2, 12000, 0, '2024-03-18 15:22:02', '2024-03-18 08:22:24', '5 Menit', '18/Mar/2024', 'Jl. Husein Sastranegara No.33, RT.2/RW.3, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 'Jl. Perumahan Mahkota Indah No.25, RT.001/RW.009, Benda, Kec. Benda, Kota Tangerang, Banten 15125, Indonesia', 0, 12000, 0, '5.0', 1, 'Semua', '0', '0', '0'),
(299, '25220', 'P72952', 'D1708831070', 2, '0.4683906194775', '101.41806621104', '0.492178', '101.438412', '1', 4.3, 22750, 0, '2024-03-24 21:33:16', '2024-03-24 14:33:46', '10 Menit', '24/Mar/2024', 'FC99+965, Jl. Soekarno - Hatta, Delima, Kec. Tampan, Kota Pekanbaru, Riau 28289, Indonesia', 'Jl. Paus, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau, Indonesia', 0, 22750, 0, '1.0', 1, 'Semua', '0', '0', '0'),
(300, '15044', 'P72952', 'D1708831070', 2, '0.46844895557397', '101.41795992851', '0.4796811', '101.4451151', '1', 3.9, 21750, 0, '2024-03-24 21:34:13', '2024-03-24 14:35:11', '8 menit', '24/Mar/2024', 'FC99+96V, Gg. Masjid Arrosyidin, Sidomulyo Tim., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28289, Indonesia', 'Jl. Arifin Ahmad, Tengkerang Tengah, Kec. Marpoyan Damai, Kota Pekanbaru, Riau, Indonesia', 0, 21750, 0, '1.0', 1, 'Semua', '0', '0', '0'),
(301, '12571', 'P72952', 'D1708831070', 2, '0.46829808635795', '101.41811516136', '0.4175197', '101.2415965', '1', 22.6, 68500, 0, '2024-03-24 21:35:30', '2024-03-24 14:37:15', '32 menit', '24/Mar/2024', 'FC99+965, Jl. Soekarno - Hatta, Delima, Kec. Tampan, Kota Pekanbaru, Riau 28289, Indonesia', 'Jl. Tol Pekanbaru - Bangkinang, Kualu Nenas, Kec. Tambang, Kabupaten Kampar, Riau, Indonesia', 0, 68500, 0, '', 1, 'Semua', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail_merchant`
--

CREATE TABLE `transaksi_detail_merchant` (
  `id_trans_merchant` int(11) NOT NULL,
  `id_transaksi` varchar(250) NOT NULL,
  `id_merchant` varchar(250) NOT NULL,
  `total_biaya` varchar(250) NOT NULL,
  `harga_akhir` varchar(250) NOT NULL,
  `struk` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail_send`
--

CREATE TABLE `transaksi_detail_send` (
  `id_send` int(11) NOT NULL,
  `id_transaksi` varchar(250) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `nama_pengirim` varchar(250) NOT NULL,
  `nama_penerima` varchar(250) NOT NULL,
  `telepon_pengirim` varchar(250) NOT NULL,
  `telepon_penerima` varchar(250) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_item`
--

CREATE TABLE `transaksi_item` (
  `id_trans_item` int(11) NOT NULL,
  `id_item` varchar(200) NOT NULL,
  `id_merchant` varchar(100) NOT NULL,
  `id_transaksi` varchar(200) NOT NULL,
  `jumlah_item` varchar(200) NOT NULL,
  `catatan_item` text NOT NULL,
  `total_harga` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_jasa`
--

CREATE TABLE `transaksi_jasa` (
  `no` int(11) NOT NULL,
  `idtransaksi` varchar(255) NOT NULL,
  `idpelanggan` varchar(255) DEFAULT NULL,
  `struk` varchar(255) DEFAULT 'noimages.png',
  `biaya` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `catatan` tinytext DEFAULT NULL,
  `tanggal` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `upgrade`
--

CREATE TABLE `upgrade` (
  `id` int(11) NOT NULL,
  `iddriver` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `upgrade`
--

INSERT INTO `upgrade` (`id`, `iddriver`, `nama`, `tanggal`, `status`) VALUES
(2, 'D1687401264', 'demo', '2023-06-27 12:34:14', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher` varchar(20) NOT NULL,
  `tipe_voucher` char(1) NOT NULL,
  `untuk_fitur` int(11) NOT NULL,
  `tanggal_expired` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `count_to_use` int(11) NOT NULL,
  `is_valid` varchar(3) NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet`
--

CREATE TABLE `wallet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `uuid` varchar(250) DEFAULT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `nama_pemilik` varchar(500) NOT NULL DEFAULT 'sistem',
  `rekening` varchar(250) NOT NULL,
  `tujuan` varchar(250) DEFAULT '-',
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `foto_bukti` varchar(200) DEFAULT NULL,
  `reff` varchar(255) DEFAULT '0',
  `uplink` varchar(255) NOT NULL DEFAULT 'aplikasi'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `wallet`
--

INSERT INTO `wallet` (`id`, `id_user`, `uuid`, `invoice`, `jumlah`, `bank`, `nama_pemilik`, `rekening`, `tujuan`, `waktu`, `type`, `status`, `foto_bukti`, `reff`, `uplink`) VALUES
(435, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 09:26:42', 'Order-', 1, NULL, 'Order41728', 'aplikasi'),
(436, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 09:30:38', 'Order-', 1, NULL, 'Order27952', 'aplikasi'),
(437, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 14:15:11', 'Order-', 1, NULL, 'Order64463', 'aplikasi'),
(438, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 14:25:18', 'Order-', 1, NULL, 'Order12701', 'aplikasi'),
(439, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 14:29:31', 'Order-', 1, NULL, 'Order12424', 'aplikasi'),
(440, 'D1708831070', NULL, NULL, 1200, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-18 15:22:24', 'Order-', 1, NULL, 'Order19973', 'aplikasi'),
(441, 'D1708831070', NULL, NULL, 2275, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-24 21:33:46', 'Order-', 1, NULL, 'Order11291', 'aplikasi'),
(442, 'D1708831070', NULL, NULL, 2175, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-24 21:35:11', 'Order-', 1, NULL, 'Order94543', 'aplikasi'),
(443, 'D1708831070', NULL, NULL, 6850, 'Taxi Bandara', 'test', 'wallet', '-', '2024-03-24 21:37:15', 'Order-', 1, NULL, 'Order70630', 'aplikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `webview`
--

CREATE TABLE `webview` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ikon` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `webview`
--

INSERT INTO `webview` (`id`, `nama`, `url`, `ikon`, `status`) VALUES
(1, 'Agen Tiketing', 'https://login.velosita.com/sistem-agen/login', '8bb658d1b93757171fec2da794cbc66d.jpg', '1'),
(2, 'Pesawat', 'https://velotiket.com/wahanamulyatiket', 'f8c364dedaee54fbfd9aa50fce76fd46.jpeg', '1'),
(3, 'Chargo', 'https://sentralcargo.co.id/', 'caa22c96282da37584dbead85f994c8a.jpeg', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indeks untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`) USING BTREE;

--
-- Indeks untuk tabel `berkas_driver`
--
ALTER TABLE `berkas_driver`
  ADD PRIMARY KEY (`id_berkas`) USING BTREE;

--
-- Indeks untuk tabel `category_item`
--
ALTER TABLE `category_item`
  ADD PRIMARY KEY (`id_kategori_item`) USING BTREE;

--
-- Indeks untuk tabel `category_merchant`
--
ALTER TABLE `category_merchant`
  ADD PRIMARY KEY (`id_kategori_merchant`) USING BTREE;

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `chat_merchant`
--
ALTER TABLE `chat_merchant`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `config_driver`
--
ALTER TABLE `config_driver`
  ADD PRIMARY KEY (`id_driver`) USING BTREE,
  ADD KEY `latitude` (`latitude`) USING BTREE,
  ADD KEY `longitude` (`longitude`) USING BTREE;

--
-- Indeks untuk tabel `config_user`
--
ALTER TABLE `config_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `latitude` (`latitude`) USING BTREE,
  ADD KEY `longitude` (`longitude`) USING BTREE;

--
-- Indeks untuk tabel `digi_brand`
--
ALTER TABLE `digi_brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `digi_history`
--
ALTER TABLE `digi_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `digi_kategori`
--
ALTER TABLE `digi_kategori`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `no_telepon` (`no_telepon`) USING BTREE,
  ADD UNIQUE KEY `no_ktp` (`no_ktp`) USING BTREE;

--
-- Indeks untuk tabel `driver_job`
--
ALTER TABLE `driver_job`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id_fitur`) USING BTREE;

--
-- Indeks untuk tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `history_transaksi`
--
ALTER TABLE `history_transaksi`
  ADD PRIMARY KEY (`nomor`,`id_transaksi`) USING BTREE,
  ADD UNIQUE KEY `nomor` (`nomor`) USING BTREE;

--
-- Indeks untuk tabel `inbok`
--
ALTER TABLE `inbok`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`) USING BTREE;

--
-- Indeks untuk tabel `kategori_news`
--
ALTER TABLE `kategori_news`
  ADD PRIMARY KEY (`id_kategori_news`) USING BTREE;

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_k`) USING BTREE,
  ADD UNIQUE KEY `id` (`id_k`) USING BTREE;

--
-- Indeks untuk tabel `kodepromo`
--
ALTER TABLE `kodepromo`
  ADD PRIMARY KEY (`id_promo`) USING BTREE;

--
-- Indeks untuk tabel `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indeks untuk tabel `list_bank`
--
ALTER TABLE `list_bank`
  ADD PRIMARY KEY (`id_bank`) USING BTREE;

--
-- Indeks untuk tabel `lokasi_pelanggan`
--
ALTER TABLE `lokasi_pelanggan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`) USING BTREE;

--
-- Indeks untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`) USING BTREE,
  ADD UNIQUE KEY `email_mitra` (`email_mitra`) USING BTREE,
  ADD UNIQUE KEY `telepon_mitra` (`telepon_mitra`) USING BTREE;

--
-- Indeks untuk tabel `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `payusettings`
--
ALTER TABLE `payusettings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `no_telepon` (`no_telepon`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`) USING BTREE;

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ppob_filter`
--
ALTER TABLE `ppob_filter`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ppob_group`
--
ALTER TABLE `ppob_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ppob_produk`
--
ALTER TABLE `ppob_produk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ppob_type`
--
ALTER TABLE `ppob_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `rating_driver`
--
ALTER TABLE `rating_driver`
  ADD PRIMARY KEY (`nomor`) USING BTREE,
  ADD UNIQUE KEY `nomor` (`nomor`) USING BTREE;

--
-- Indeks untuk tabel `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `refferal`
--
ALTER TABLE `refferal`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `requestjaket`
--
ALTER TABLE `requestjaket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`nomor`) USING BTREE,
  ADD UNIQUE KEY `nomor` (`nomor`) USING BTREE,
  ADD UNIQUE KEY `id_user` (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`,`id_pelanggan`,`waktu_order`,`id`) USING BTREE,
  ADD UNIQUE KEY `nomor` (`id`(250)) USING BTREE;

--
-- Indeks untuk tabel `transaksi_detail_merchant`
--
ALTER TABLE `transaksi_detail_merchant`
  ADD PRIMARY KEY (`id_trans_merchant`) USING BTREE;

--
-- Indeks untuk tabel `transaksi_detail_send`
--
ALTER TABLE `transaksi_detail_send`
  ADD PRIMARY KEY (`id_send`) USING BTREE;

--
-- Indeks untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  ADD PRIMARY KEY (`id_trans_item`) USING BTREE;

--
-- Indeks untuk tabel `transaksi_jasa`
--
ALTER TABLE `transaksi_jasa`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indeks untuk tabel `upgrade`
--
ALTER TABLE `upgrade`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `reff` (`reff`) USING BTREE;

--
-- Indeks untuk tabel `webview`
--
ALTER TABLE `webview`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berkas_driver`
--
ALTER TABLE `berkas_driver`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT untuk tabel `category_item`
--
ALTER TABLE `category_item`
  MODIFY `id_kategori_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `category_merchant`
--
ALTER TABLE `category_merchant`
  MODIFY `id_kategori_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `chat_merchant`
--
ALTER TABLE `chat_merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `digi_brand`
--
ALTER TABLE `digi_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `digi_history`
--
ALTER TABLE `digi_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1368;

--
-- AUTO_INCREMENT untuk tabel `digi_kategori`
--
ALTER TABLE `digi_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `driver_job`
--
ALTER TABLE `driver_job`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `history_transaksi`
--
ALTER TABLE `history_transaksi`
  MODIFY `nomor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT untuk tabel `inbok`
--
ALTER TABLE `inbok`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT untuk tabel `kategori_news`
--
ALTER TABLE `kategori_news`
  MODIFY `id_kategori_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_k` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT untuk tabel `kodepromo`
--
ALTER TABLE `kodepromo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `list_bank`
--
ALTER TABLE `list_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi_pelanggan`
--
ALTER TABLE `lokasi_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `payusettings`
--
ALTER TABLE `payusettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poin`
--
ALTER TABLE `poin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `point`
--
ALTER TABLE `point`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ppob_filter`
--
ALTER TABLE `ppob_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ppob_group`
--
ALTER TABLE `ppob_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ppob_produk`
--
ALTER TABLE `ppob_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ppob_type`
--
ALTER TABLE `ppob_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `rating_driver`
--
ALTER TABLE `rating_driver`
  MODIFY `nomor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `redeem`
--
ALTER TABLE `redeem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `refferal`
--
ALTER TABLE `refferal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1976;

--
-- AUTO_INCREMENT untuk tabel `requestjaket`
--
ALTER TABLE `requestjaket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `nomor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52104;

--
-- AUTO_INCREMENT untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail_merchant`
--
ALTER TABLE `transaksi_detail_merchant`
  MODIFY `id_trans_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail_send`
--
ALTER TABLE `transaksi_detail_send`
  MODIFY `id_send` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  MODIFY `id_trans_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `transaksi_jasa`
--
ALTER TABLE `transaksi_jasa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `upgrade`
--
ALTER TABLE `upgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT untuk tabel `webview`
--
ALTER TABLE `webview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
