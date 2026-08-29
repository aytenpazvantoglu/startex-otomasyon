<?php session_start();
// 1. Veritabanına bağlan
include("baglan.php");

// 2. Formdan gelen (POST edilen) yeni bilgileri yakala
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"]; // Gizli kutudan gelen ID
    $ad_soyad = $_POST["ad_soyad"];
    $uzmanlik = $_POST["uzmanlik"];
    $linkedin = $_POST["linkedin"];

    
    // GÜVENLİ GÜNCELLEME İŞLEMİ
    $sorgu = $conn->prepare("UPDATE katilimcilar SET ad_soyad = ?, uzmanlik = ?, linkedin = ? WHERE id = ?");
    $sorgu->bind_param("sssi", $ad_soyad, $uzmanlik, $linkedin, $id);
    // "sssi" sırasıyla: string, string, string, integer

    // 4. İşlemi gerçekleştir ve sonucu kontrol et
    if ($sorgu->execute() === TRUE) {
        // Her şey yolundaysa listeye geri dön
        $_SESSION['mesaj'] = "Bilgiler başarıyla güncellendi!";
        $_SESSION['tur'] = "info"; // Mavi kutu için info (ya da warning)
        header("Location: liste.php");
        exit();
    } else {
        echo "Güncelleme hatası: " . $conn->error;
    }
}
?>