<?php session_start();
// 1. Veritabanı bağlantı kodlarımızı buraya çağırıyoruz.
// "include" demek, o dosyadaki her şeyi buraya kopyala getir demektir.

include("baglan.php");

// 2. Formdan (index.php) gelen verileri yakalıyoruz.
// $_POST['ad_soyad'] -> Buradaki isim index.php'deki name="ad_soyad" ile aynı olmalı.
$ad_soyad = $_POST['ad_soyad'];
$uzmanlik = $_POST['uzmanlik'];
$linkedin = $_POST['linkedin'];

$kontrol = $conn->prepare("SELECT * FROM katilimcilar WHERE linkedin = ?");
$kontrol->bind_param("s", $linkedin);
$kontrol->execute();
$sonuc = $kontrol->get_result();


if ($sonuc->num_rows > 0){
    // Eğer veritabanında bu linkle biri varsa durduruyoruz
    // Ekrana düz yazı basmak yerine hata mesajını cüzdana(session) koyup listeye geri yolluyoruz.
    $_SESSION['mesaj'] = "Hata: Bu Linkedin linki ile sisteme zaten kayıt yapılmış!";
    $_SESSION['tur'] = "danger"; // Kırmızı bildirim kutusu
    header("Location: liste.php");
    exit();
}
else{
    // Eğer yoksa kaydetmeye devam ediyoruz
    $sorgu = $conn->prepare("INSERT INTO katilimcilar (ad_soyad, uzmanlik, linkedin) VALUES (?, ?, ?)");
    $sorgu->bind_param("sss", $ad_soyad, $uzmanlik, $linkedin);



// 3. Verileri veritabanına eklemek için SQL komutu hazırlıyoruz.
// 'kullanicilar'  PHPMyAdmin'de oluşturduğum tablonun adıdır.


    if ($sorgu->execute() === TRUE){ 
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





