<?php
session_start();
// 1. Veritabanı anahtarımızı getiriyoruz
include("baglan.php");

// 2. URL'den gelen ID'yi yakalıyoruz 
if(isset($_GET["id"])) {
    $id = $_GET["id"];

   // GÜVENLİ SİLME İŞLEMİ(Prepared Statement)
    $sorgu = $conn->prepare("DELETE FROM katilimcilar WHERE id = ?");
    $sorgu->bind_param("i",$id);



    if ($sorgu->execute() === TRUE) {
        $_SESSION['mesaj'] = "Kayıt başarıyla silindi!";
        $_SESSION['tur'] = "success"; // Kırmızı kutu için
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