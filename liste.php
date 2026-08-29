<?php 
// 1. Veritabanı bağlantısı
include("baglan.php");

$sorgu_sayi = $conn->query("SELECT COUNT(*) as toplam_kisi FROM katilimcilar");
$istatistik = $sorgu_sayi->fetch_assoc();
$toplam_katilimci = $istatistik['toplam_kisi'];

// TODO: Admin giriş paneli(authentication) sayfaya girmeden önce bir kullanıcı adı ve şifre sorma ekranı 
// TODO: Tablya Excel'e aktarma butonu eklenecek.
// TODO: Sayfalama (Pagination) mantığı kurulacak.
// TODO: Sistem durumu aç/kapa mantığı eklenecek

// 2. Tasarımın üst kısmı (Mavi şerit ve Bootstrap hazırlığı)
include("ust.php"); 

?>

<div class="row mb-4 g-3">
    <!-- Mavi Kart: Toplam Sayı -->
    <div class="col-md-4">
        <div class="card bg-primary text-white text-center shadow-sm h-100">
            <div class="card-body py-3">
                <h6 class="card-title text-uppercase mb-1 " style="font-size: 0.8rem; opacity: 0.8;">Toplam Katılımcı</h6>
                <h2 class="fw-bold mb-0 fs-2"><?php echo $toplam_katilimci; ?></h2>
            </div>
        </div>
    </div>
    
    <!-- Kırmızı Kart: Şehir -->
    <div class="col-md-4">
        <div class="card bg-danger text-white text-center shadow-sm h-100">
            <div class="card-body py-3">
                <h6 class="card-title text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;"">Etkinlik Yeri</h6>
                <h2 class="fw-bold mb-0 fs-2">Sakarya</h2>
            </div>
        </div>
    </div>

    <!-- Yeşil Kart: Durum -->
    <div class="col-md-4">
        <div class="card bg-success text-white text-center shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;"">Sistem Durumu</h6>
                <h2 class="fw-bold mb-0 fs-2">Aktif</h2>
            </div>
        </div>
    </div>
</div>


<?php if(isset($_SESSION['mesaj'])): ?>
    <div class="alert alert-<?php echo $_SESSION['tur']; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo ($_SESSION['tur'] == 'danger') ? 'Kayıt Hatası:' : 'İşlem Başarılı:'; ?></strong> <?php echo $_SESSION['mesaj']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['mesaj']); ?>
<?php endif; ?>

<?php 
// 3. Verileri çekiyoruz

if (isset($_GET['ara']) && $_GET['ara'] != "") {
    //arama kutusu doluysa burası çalışır
    $kelime = $_GET['ara'];
    $sql = "SELECT * FROM katilimcilar WHERE ad_soyad LIKE '%$kelime%' OR uzmanlik LIKE '%$kelime%'";   
}
else {
    //arama kutusu boşsa veya sayfa ilk açıldıysa herkesi getirir.
    $sql = "SELECT * FROM katilimcilar";
}

$sonuc = $conn->query($sql);
?>

<div class="card shadow">
    <div class="card-header bg-dark text-white text-center">
        <h4 class="mb-0">Kayıtlı Katılımcılar</h4>
    </div>
    <div class="card-body">
        
    <!-- Arama Formu Başlangıç -->
    <form action="liste.php" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="ara" class="form-control" placeholder="İsim veya Uzmanlık ara..." value="<?php echo isset($_GET['ara']) ? $_GET['ara'] : ''; ?>">
            <button class="btn btn-primary" type="submit">Ara</button>
            <?php if(isset($_GET['ara'])): ?>
                <a href="liste.php" class="btn btn-secondary">Temizle</a>
            <?php endif; ?>
        </div>
    </form>
    <!-- Arama Formu Bitiş -->

        <!-- Tabloyu Bootstrap sınıflarıyla güzelleştirdik -->
        <table class="table table-striped table-hover mt-2">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ad Soyad</th>
                    <th>Uzmanlık</th>
                    <th>Linkedin</th>
                    <th>İşlemler</th> <!-- Bu yeni sütun Silme butonu için -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($sonuc->num_rows > 0) {
                    while($satir = $sonuc->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $satir["id"] . "</td>";
                        echo "<td>" . $satir["ad_soyad"] . "</td>";
                        echo "<td>" . $satir["uzmanlik"] . "</td>";
                        
                        // Şık bir buton şeklinde Linkedin linki
                        echo "<td><a href='" . $satir["linkedin"] . "' target='_blank' class='btn btn-sm btn-outline-info'>Profili Gör</a></td>";
                        
                        // SİLME BUTONU: sil.php'ye o kişinin ID'sini gönderir
                        echo "<td>";
                            echo "<a href='sil.php?id=" . $satir["id"] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Bu kişiyi silmek istediğine emin misin?\")'>Sil</a>";
                            echo "<a href='duzenle.php?id=" . $satir["id"] . "' class='btn btn-sm btn-warning'>Düzenle</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center text-muted'>Henüz kayıtlı kimse yok.</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>


<div class="text-center mt-5" style="min-height: 20vh;">    
    <a href="index.php" class="btn btn-secondary">Yeni Kayıt Ekranına Dön</a>
</div>

<?php 
// 4. Tasarımın alt kısmını (sayfa kapanışlarını) çağırıyoruz
include("alt.php"); 
?>













