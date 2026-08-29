<?php session_start();
// 1. Veritabanına bağlan
include("baglan.php");

// 2. Formdan gelen (POST edilen) yeni bilgileri yakala
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"]; // Gizli kutudan gelen ID
    $ad_soyad = $_POST["ad_soyad"];
    $uzmanlik = $_POST["uzmanlik"];
    $linkedin = $_POST["linkedin"];

    // 3. SQL GÜNCELLEME SORGUSU (UPDATE)
    // Matematiksel mantık: "Set et (ayarla) ad_soyad'ı şu yap, uzmanlık'ı şu yap..."
    $sql = "UPDATE katilimcilar SET 
            ad_soyad = '$ad_soyad', 
            uzmanlik = '$uzmanlik', 
            linkedin = '$linkedin' 
            WHERE id = $id";

    // 4. İşlemi gerçekleştir ve sonucu kontrol et
    if ($conn->query($sql) === TRUE) {
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