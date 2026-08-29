<?php 
include("baglan.php");
include("ust.php"); 

// 1. Hangi kayıt düzenlenecek? ID'yi yakala.
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // 2. Veritabanından bu kişinin güncel bilgilerini çek
    $sorgu = $conn->query("SELECT * FROM katilimcilar WHERE id = $id");
    $kayit = $sorgu->fetch_assoc();
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-warning"> <!-- Kenarı sarı yaparak düzenleme olduğunu belli ettik -->
            <div class="card-header bg-warning text-dark">
                <h3 class="text-center mb-0">Kaydı Düzenle</h3>
            </div>
            <div class="card-body">
                <!-- Verileri guncelle.php'ye gönderiyoruz -->
                <form action="guncelle.php" method="POST">
                    
                    <!-- GİZLİ INPUT: ID numarasını kullanıcı görmesin ama formla beraber gitsin -->
                    <input type="hidden" name="id" value="<?php echo $kayit['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Ad Soyad:</label>
                        <!-- value kısmına veritabanından gelen eski bilgiyi yazıyoruz -->
                        <input type="text" name="ad_soyad" class="form-control" value="<?php echo $kayit['ad_soyad']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uzmanlık Alanı</label>
                        <input type="text" name="uzmanlik" class="form-control" value="<?php echo $kayit['uzmanlik']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Linkedin Linki</label>
                        <input type="url" name="linkedin" class="form-control" value="<?php echo $kayit['linkedin']; ?>" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Değişiklikleri Kaydet</button>
                        <a href="liste.php" class="btn btn-light border">İptal Et</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include("alt.php"); ?>