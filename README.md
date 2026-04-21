# Admin Web Store 🛒

Aplikasi Manajemen Toko Berbasis Web (Admin Web Store). Aplikasi ini memungkinkan pengguna dengan peran Admin, Staf Gudang, dan Guest untuk mengelola data barang dan kategori dengan mudah dan interaktif.

---

## 🚀 Cara Menjalankan Aplikasi di Windows

Aplikasi ini memerlukan **PHP versi 8.1 ke atas**. Ikuti langkah-langkah di bawah ini:

### Tahap 1: Persiapan Server (XAMPP)
1. Pastikan folder aplikasi berada di: `C:\xampp\htdocs\admin-web-store`.
2. Buka **XAMPP Control Panel**.
3. Klik **Start** pada modul **Apache** dan **MySQL**.

### Tahap 2: Menyiapkan Database
1. Buka browser dan akses: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Buat database baru dengan nama: **`admin_web_store`**.
3. Buka **Command Prompt (CMD)**, masuk ke folder aplikasi:
   ```cmd
   cd C:\xampp\htdocs\admin-web-store
   ```
4. Jalankan perintah ini satu per satu:
   ```cmd
   php spark migrate
   php spark db:seed UserSeeder
   ```

### Tahap 3: Memilih Cara Membuka Aplikasi
Pilih salah satu opsi di bawah ini sesuai dengan versi PHP di XAMPP Anda:

#### Opsi A: Jika XAMPP Anda sudah menggunakan PHP 8
Anda bisa langsung mengakses aplikasi melalui Apache:
👉 **[http://localhost/admin-web-store/public](http://localhost/admin-web-store/public)**

#### Opsi B: Jika XAMPP Anda masih PHP 7 (atau muncul error PHP Version)
Gunakan cara ini untuk menjalankan aplikasi menggunakan versi PHP sistem (Terminal):
1. Buka **Command Prompt (CMD)** di folder aplikasi.
2. Ketik perintah berikut:
   ```cmd
   php spark serve --port 8080
   ```
3. Biarkan CMD tetap terbuka, lalu akses melalui browser di:
   👉 **[http://localhost:8080](http://localhost:8080)**

---

## 🔑 Informasi Akun (Login)

1. **Admin (Akses Penuh)**: `admin` / `admin123`
2. **Staf Gudang (Kelola Barang)**: `gudang` / `gudang123`
3. **Guest (Hanya Lihat)**: `guest` / `guest123`

---

### 🛑 Solusi Masalah
- **Error "php is not recognized"**: Anda perlu menambahkan folder PHP (`C:\xampp\php`) ke dalam **Environment Variables System PATH** di Windows.
- **Error PHP Version**: Pastikan versi PHP yang aktif di terminal/CMD adalah versi 8.1 atau lebih tinggi (cek dengan perintah `php -v`).
