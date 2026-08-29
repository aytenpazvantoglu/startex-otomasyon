# Startex - Katılımcı Kayıt ve Takip Otomasyonu

Bu proje; PHP ve MySQL kullanılarak geliştirilmiş, katılımcı kayıtlarının yönetilmesini sağlayan dinamik bir web otomasyonudur. Temel CRUD (Create, Read, Update, Delete) operasyonlarını ve anlık istatistik takibini içerir.

## 🚀 Özellikler
* **CRUD Operasyonları:** Katılımcı ekleme, listeleme, dinamik arama, güncelleme ve silme.
* **Dinamik İstatistik Paneli:** Toplam kayıtlı katılımcı sayısını ve etkinlik durumunu anlık gösteren sayaç kartları.
* **Arayüz Tasarımı:** Bootstrap ile güçlendirilmiş, kullanıcı dostu ve responsive tasarım.
* **Veritabanı Entegrasyonu:** MySQL ilişkisel veritabanı yapısı ve hazır kurulum şeması (`startex_db.sql`).

## Ekran Görüntüleri

### 1. Yeni Katılımcı Kayıt Formu
<img width="633" height="503" alt="katılım-formu-ekranı" src="https://github.com/user-attachments/assets/6a7b9200-ab38-4a08-9170-36caf1cb1ebc" />

### 2. Katılımcı Listesi ve İstatistik Paneli
<img width="1297" height="916" alt="katılımcılar-tablo" src="https://github.com/user-attachments/assets/3d8fdc5e-49d8-45fa-864f-c709513d7ea0" />

### 3. Kayıt Düzenleme Ekranı
<img width="635" height="557" alt="düzenleme-ekranı" src="https://github.com/user-attachments/assets/10d6bcf3-530d-45fd-bddc-ec05eabaaf73" />

## 💻 Kullanılan Teknolojiler
* **Backend:** PHP
* **Veritabanı:** MySQL
* **Frontend:** HTML5, CSS3, Bootstrap 5
* **Geliştirme Ortamı:** XAMPP (Apache & MariaDB)

## 🛠️ Kurulum Adımları
1. Dosyaları yerel sunucunuzun kök dizinine taşıyın (Örn: `xampp/htdocs/startex`).
2. phpMyAdmin üzerinden `startex_db` adında bir veritabanı oluşturun.
3. Proje klasöründeki `startex_db.sql` dosyasını phpMyAdmin ile içe aktarın (Import).
4. XAMPP üzerinden Apache ve MySQL servislerini başlatın.
5. Tarayıcınızdan `http://localhost/startex/index.php` adresine gidin.
