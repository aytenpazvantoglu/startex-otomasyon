-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Ağu 2026, 12:40:56
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `startex_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katilimcilar`
--

CREATE TABLE `katilimcilar` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `uzmanlik` varchar(100) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `katilimcilar`
--

INSERT INTO `katilimcilar` (`id`, `ad_soyad`, `uzmanlik`, `linkedin`) VALUES
(15, 'Ayten Pazvantoğlu', 'Bilgisayar Programcısı', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(26, 'Deniz Yılmaz', 'C# & .NET Developer', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(27, 'Kerem Aksoy', 'Android (Kotlin) Developer', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(28, 'Elif Şahin', 'Bulut Güvenlik Uzmanı', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(29, 'Mert Demir', 'PHP Backend Developer', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(30, 'Ayşe Çelik', 'ASP.NET MVC Uzmanı', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(31, 'Burak Yıldız', 'Siber Güvenlik Analisti', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(32, 'Zeynep Aydın', 'Veritabanı Yöneticisi', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(33, 'Ozan Arslan', 'Frontend Developer', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(34, 'Büşra Polat', 'UI/UX Tasarımcı', 'https://linkedin.com/in/ayten-pazvantoğlu'),
(35, 'Tarık Koç', 'DevOps Mühendisi', 'https://linkedin.com/in/ayten-pazvantoğlu');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `katilimcilar`
--
ALTER TABLE `katilimcilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `katilimcilar`
--
ALTER TABLE `katilimcilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
