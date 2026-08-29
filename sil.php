<?php
session_start();
// 1. Veritabanı anahtarımızı getiriyoruz
include("baglan.php");

// 2. URL'den gelen ID'yi yakalıyoruz (Örn: sil.php?id=5)
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // 3. SQL Silme Sorgusu (ÇOK DİKKATLİ OLUNMALI!)
    // WHERE id = $id demezsek tüm tabloyu siler. Bu bir yazılımcı kabusudur.
    $sql = "DELETE FROM katilimcilar WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // 4. Silme başarılıysa bizi hemen liste sayfasına geri gönder
        $_SESSION['mesaj'] = "Kayıt başarıyla silindi!";
        $_SESSION['tur'] = "danger"; // Kırmızı kutu için
        header("Location: liste.php");
        exit(); // Kodun burada durmasını sağlar
    } else {
        echo "Hata oluştu: " . $conn->error;
    }
} else {
    // Eğer ID gelmeden bu sayfaya girilmeye çalışılırsa ana sayfaya at
    header("Location: liste.php");
    exit();
}
?>