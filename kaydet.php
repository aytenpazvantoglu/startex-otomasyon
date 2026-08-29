<?php session_start();
// 1. Veritabanı bağlantı kodlarımızı buraya çağırıyoruz.
// "include" demek, o dosyadaki her şeyi buraya kopyala getir demektir.

include("baglan.php");

// 2. Formdan (index.php) gelen verileri yakalıyoruz.
// $_POST['ad_soyad'] -> Buradaki isim index.php'deki name="ad_soyad" ile aynı olmalı.
$ad_soyad = $_POST['ad_soyad'];
$uzmanlik = $_POST['uzmanlik'];
$linkedin = $_POST['linkedin'];

$kontrol = $conn->query("SELECT * FROM katilimcilar WHERE linkedin = '$linkedin'");

if ($kontrol->num_rows > 0){
    // Eğer veritabanında bu linkle biri varsa durduruyoruz
    echo "Bu kullanıcı zaten kayıtlı! <a href='index.php'>Geri Dön</a>";
}
else{
    // Eğer yoksa kaydetmeye devam ediyoruz
    $sql = "INSERT INTO katilimcilar (ad_soyad, uzmanlik, linkedin) VALUES ('$ad_soyad', '$uzmanlik', '$linkedin')";





// 3. Verileri veritabanına eklemek için SQL komutu hazırlıyoruz.
// 'kullanicilar' senin PHPMyAdmin'de oluşturduğun tablonun adıdır.



    if ($conn->query($sql) === TRUE){ // BAŞARILIYSA: Direkt liste sayfasına gönderiyoruz
        $_SESSION['mesaj'] = "Yeni katılımcı başarıyla kaydedildi!";
        $_SESSION['tur'] = "success"; // Yeşil kutu için success
        header("Location: liste.php");
        exit(); // Kodun burada durmasını sağlar, devam etmesin diye
    }   
    else {
        echo "Hata oluştu: " . $conn->error; 
    }

}

// 5. İşimiz bittiği için bağlantıyı kapatıyoruz.
$conn->close();
?>





