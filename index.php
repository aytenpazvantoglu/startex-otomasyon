
<?php include("ust.php"); ?>
   

<div class="row justify-content-center"> <!-- row: Satır açar | justify-content-center: İçindekileri yatayda tam ortalar -->
    <div class="col-md-6"> <!-- col-md-6: 12 birimlik ekranın tam yarısını (6 birim) kapla der -->
        <div class="card shadow"> <!-- card: Beyaz, kenarları yuvarlak ve şık bir panel oluşturur | shadow: Hafif bir gölge ekler -->

                <div class="card-header bg-primary text-white"> <!-- Kartın başlık kısmı: bg-primary (mavi arka plan) | text-white (beyaz yazı) -->
                    <h3 class="text-center mb-0">Startex Katılım Formu</h3>
                </div>


                <div class="card-body"> <!-- Kartın ana gövdesi: Form elemanları burada durur -->
                    <form action = "kaydet.php" method="POST"> <!-- Verileri kaydet.php'ye POST yöntemiyle (gizli paketle) gönderiyoruz -->
       
                        <div class="mb-3"> <!-- mb-3: Her giriş kutusu arasına biraz alt boşluk bırakır -->
                            <label class="form-label">Ad Soyad:</label>
                        <!-- form-control: Kutuyu modernleştirir | required: Boş bırakılmasını engeller -->
                            <input type="text" name="ad_soyad" class="form-control" placeholder="Adınızı yazınız..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Uzmanlık Alanı</label>
                            <input type="text" name="uzmanlik" class="form-control" placeholder="Örn: PHP Developer" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Linkedin Linki</label>
                            <!-- type="url": Buraya sadece link girilmesini zorunlu kılar -->
                            <input type="url" name="linkedin" class="form-control" placeholder="https://..." required>
                        </div>

                        <!-- d-grid: Butonun kutuyu tamamen kaplamasını sağlar -->
                        <div class="d-grid">
                            <!-- btn-primary: Butonu mavi yapar -->
                            <button type="submit" class="btn btn-primary">Kaydı Tamamla</button>
                        </div>

                    </form>
                </div>

                <!-- Kartın en alt kısmı (Footer): Listeye gitme linkini buraya koyduk -->
                <div class="card-footer text-center">
                    <!-- text-decoration-none: Alt çizgiyi kaldırır | text-muted: Rengini hafif gri yapar -->
                    <a href="liste.php" class="text-decoration-none text-muted">Kayıtlı Listesini Gör</a>
                </div>

            </div> <!-- card bitişi -->
        </div> <!-- col-md-6 bitişi -->
    </div> <!-- row bitişi -->

<!-- Bu kod, footer'ı zorla aşağı iter. 
     vh-40 demek, ekranın neredeyse yarısı kadar boşluk bırak demektir. -->
<div style="min-height: 39.25vh;"></div>


<?php include("alt.php"); ?>


   

