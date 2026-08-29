# 1. PHP'nin Temel Yapı Taşları:


## <?php ... > (PHP Etiketleri): 
HTML kodlarının arasında PHP yazabilmek için motoru çalıştıran anahtardır. Sunucuya "buradaki kodları HTML gibi ekrana basma, arka planda çalıştır" der.


## $ (Dolar İşareti-Değişkenler):
 PHP2de her değişkenin başına konur. Örneğin $id, içinde "15"sayısını tutan bir kutudur. $kontrol veya $conn gibi isimler PHP'nin zorunlu kıldığı kelimeler değildir; bu isimleri kodun ne yaptığını anlamak için (örneğin connection için $conn) kendimiz belirleriz.


## () (Normal Parantez):
 Bir fonksiyonu veya komutu çalıştırırken kullanılır. include("ust.php") derken, fonksiyonun içine hangi dosyayı alacağını parantez ile belirtiriz.


## [] (Köşeli Parantez): 
Formlardan URL veya gizli yollarla gelen paketleri (dizileri) yakalarken kullanılır. Örn: $_POST['ad_soyad']



# 2. Form ve Veri Taşıma Yöntemleri:


## $_POST Metodu:
 Formdaki verileri(isim,link vb) arka planda gizlice ve güvenli bir paket halinde gönderir. Kayıt ekleme veya güncelleme gibi veritabanına veri yazma işlemlerinde (kaydet.php) kullanılır.


## $_GET Metodu: 
Verileri tarayıcının adres çubuğu(URL) üzerinden açıkça gönderir. Örneğin sil.php?id=15 veya arama kutusunda liste.php?ara=siber şeklinde linkte görünür. Veritabanından veri çekmek veya spesifik bir işlem yapmak için kullanılır.



# 3. Kontrol ve Yönlendirme Komutları: 


## isset():
 "Böyle bir veri var mı? İçi dolu mu?" diye kontrol eder. Örneğin isset($_GET["id"]), adres çubuğunda gerçekten bir ID numarası gönderilmiş mi diye bakar; boşsa kodun çökmesini önler. 


## header("Location: liste.php"):
 PHP arka planda işini bitirdikten sonra (örneğin kaydı sildikten sonra) kullanıcıyı beyaz bir ekranda bırakmamak için belirttiğin sayfaya otomatik yönlendirir.


## include("dosya.php"):
 Başka bir dosyanın içindeki tüm kodları, yazıldığı yere kopyalayıp yapıştırır. Navbar veya footer gibi her sayfada tekrar eden kodları tek bir merkezden yönetmeyi sağlar.


## session_start(): 
Kullanıcı siteye girdiğinde ona geçici bir hafıza cüzdanı açar. Örneğin "Kayıt başarıyla eklendi" mesajını bir sayfadan diğerine güvenle taşımak için kullanılır.



# 4. Veritabanı (SQL) ve Güvenlik Komutları:


## SELECT * FROM: 
"Tablodaki tüm sütünları(*) getir" diyen okuma komutudur.


## WHERE:
 SQL'de filtreleme yapar. "Sadece ID'si 15 olanı sil" (WHERE id=15) demezsen tablodaki herkesi siler.


## COUNT(*): 
Tablodaki toplam satır(kayıtlı kişi) sayısını matematiksel olarak sayar ve istatistik kartına yazdırır.


## num_rows: 
Veritabanından dönen cevabın "kaç satır" olduğunu kontrol eder. Örneğin aynı Linkedin linki veritabanında var mı diye aradığımızda sonuç num_rows > 0 çıkarsa, "bu kayıt zaten ekli" diyerek işlemi durdururuz. 


## prepare() ve ?(Soru İşaretleri):
 Dışarıdan gelen verileri(özellikle form girdilerini) SQL komutunun içine doğrudan yazmak yerine "buraya bir veri gelecek, hazırlıklı ol" diyerek bir şablon(?) oluşturur. Sistemin, dışarıdan gelen zararlı metinleri komut olarak çalıştırmasını (SQL Injection) kesin olarak engeller.



### *query Nedir?
Veritabanına doğrudan emir gönderme komutudur. İçine yazılan metni hiç sorgulamadan anında SQL komutu olarak çalıştırır. Eski kodlarımızda veritabanına bir şey sorarken veya eklerken doğrudan $conn->query() şeklinde kullanıyorduk.


### Neden "query" komutlarını "prepare" (hazırlama) komutlarına dönüştürdük?
Çünkü "query" komutu çok saftır; kullanıcının forma yazdığı her şeyi "çalıştırılabilir bir komut" olarak kabul eder. Eğer kötü niyetli biri isim kutusuna adını değil de veritabanını silme kodu yazarsa, query bunu da çalıştırır (Buna SQL Injection denir).
"prepare" ise SQL komutunu ve kullanıcının yazdığı metni birbirinden ayırır. Kullanıcının yazdığı şeye sadece "zararsız bir düz metin" muamelesi yapar. Yani sistemi hacklenmekten korumak için doğrudan emir veren query yerine, veriyi filtreleyen prepare şablonlarına geçiş yaptık.


### get_result Nedir?
Eskiden "query" kullandığımızda cevap bize anında geliyordu. Ama "prepare" ile güvenli bir arama (SELECT) yaptığımızda, sonuçlar hemen elimize gelmez, veritabanının hafızasında güvenli bir şekilde bekler.
 get_result (sonucu getir) komutu, arka planda bekleyen o cevabı alıp PHP'nin okuyabileceği bir pakete dönüştürür. Örneğin kaydet.php dosyasında "Bu Linkedin linkinden veritabanında var mı?" diye sorduğumuzda, cevabı alıp içindeki sayıyı (num_rows) okuyabilmemizi sağlayan komuttur.


### Session, Mesaj ve Tür (Success) Mantığı Nedir?
kaydet.php sayfasında işlemi başarıyla yapıp liste.php'ye yönlendirildiğimizde; liste.php, oraya nereden ve ne yaparak geldiğini bilmez.


### $_SESSION: 
Bu hafıza kaybını önlemek için tarayıcıda geçici bir "cüzdan" oluşturur.


### mesaj: 
O cüzdanın içine koyduğumuz nottur (Örn: "Kayıt başarıyla eklendi!").


### tur ve success:
 Bootstrap'in renk kodlarıdır. Biz cüzdana success yazıp gönderiyoruz, liste.php bu cüzdanı açtığında Bootstrap diyor ki "Bir success gelmiş, o zaman mesajı yeşil bir kutu içinde göstereyim." Eğer silme işlemi olsaydı danger gönderirdik, o da kırmızı kutu yapardı.


### Bootstrap Script (Bundle.min.js) Nedir?
Projeye eklediğimiz Bootstrap CSS  sayfanın kaportası ve boyasıdır (renkler, kutular, hizalamalar).
<script src="..."> linki ise sayfanın motoru ve elektrik aksamıdır. Örneğin, ekrana çıkan yeşil bildirim kutusundaki "X" (kapat) butonuna bastığında kutunun gerçekten kapanabilmesi için bu hazır JavaScript dosyasının projede yüklü olması gerekir.


# 5. URL Parametreleri (Query String) Mantığı:


## ?id=15 Nedir?: İnternette sayfalar arası veri taşımanın en temel yoludur. Örneğin adres çubuğunda duzenle.php?id=15 yazdığında, aslında sunucuya şu mesajı veririz:"Bana düzenle sayfasını aç ama sadece ID'si 15 olan kişinin bilgilerini getir." Arka planda yazdığımız $_GET['id'] kodu, işte bu adres çubuğundaki "15" rakamını alır.



# 6. Bootstrap(Tasarım) Izgara Sistemi:


## container: Sayfanın sağından ve solundan boşluk bırakarak içeriği ortalayan ana taşıyıcı kutudur. 


## row ve col-md-4: Bootstrap, ekranı görünmez 12 eşit parçaya(sütuna) böler. Biz istatistik kartlarında col-md-4 kullanarak "12'nin 4'lük kısmını al" dedik. Böylece 3 tane kart(4+4+4=12) yan yana tam ve orantılı bir şekilde dizilmiş oldu.


## card,card-header ve card-body: Tasarımdaki o beyaz, kenarları hafif yuvarlak ve gölgeli modern kutuları, sıfırdan uzun uzun stil kodları yazmadan oluşturmamızı sağlaan hazır tasarım kalıplarıdır.


## PHP(sunucu): XAMPP üzerinde, yani arka planda çalışır. Bir linke tıkladığımızda, sayfa yenilenip sunucuya gidene kadar PHP hiçbir şey yapamaz.


## JavaScript(tarayıcı): 
Doğrudan kullanılan tarayıcın içinde, bilgisayarda çalışır. Sayfanın yenilenmesine gerek kalmadan senin tıklamalarına anında tepki verir.


# 7. JavaScript ile PHP'yi Durdurma(Silme Onayı):


## Emin misin uyarısı ne işe yarar?:
 PHP sunucu tabanlıdır, yani "Sil" butonuna bastığımız an düşünmeden anında silme işlemini yapar. Araya onclick="return confirm('Emin misin?'), kodunu koyduğumuzda, tarayıcı ekrana bir uyarı kutusu çıkarır. Eğer kullanıcı "İptale" basarsa, bu kod işlemi reddeder ve PHP'nin silme linkine gitmesini engeller.


## onclick: 
Taraıcıya "Bu butona tıklandında hemen linke(sil.php'ye) gitme, önce içindeki JavaScript kodunu çalıştır"diyen tetikleyicidir.


## confirm(): 
Bu kodu %100 JavaScripte ait, tarayıcının içine yerleşik hazır bir fonksiyondur. Ekrana o bildiğimiz "Tamam" ve "İptal" butonları olan pop-up kutusunu çıkarır.


## return(Karar Mekanizması): 
 Eğer "İptal" butonuna basılırsa, JavaScript anında "false"(hayır) cevabını üretir. Bu cevap, HTML'deki href="sil.php?id=15" linkinin çalışmasını bloke eder.



