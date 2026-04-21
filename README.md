# Admin Web Store 🛒

Aplikasi Manajemen Toko Berbasis Web (Admin Web Store). Aplikasi ini memungkinkan pengguna dengan peran Admin, Staf Gudang, dan Guest untuk mengelola data barang dan kategori dengan mudah dan interaktif.

---

## 🚀 Cara Menjalankan Aplikasi (Panduan Pemula)

Ikuti langkah-langkah mudah di bawah ini untuk menjalankan aplikasi di komputer Anda:

### Tahap 1: Persiapan Server (XAMPP)
1. Pastikan Anda sudah menginstal **XAMPP** di komputer Anda.
2. Buka aplikasi **XAMPP Control Panel**.
3. Klik tombol **Start** pada modul **MySQL** (dan **Apache** jika diperlukan) hingga statusnya berjalan (berwarna hijau).

### Tahap 2: Menyiapkan Database
1. Buka browser (Chrome/Firefox/Safari) dan akses tautan ini: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Di menu sebelah kiri, klik tulisan **New** (Baru) untuk membuat database.
3. Masukkan nama database persis seperti ini: **`admin_web_store`**
4. Klik tombol **Create** (Buat).

*(Catatan: Jika database `admin_web_store` sebelumnya sudah ada, Anda bisa melewati langkah ini).*

### Tahap 3: Menyalakan Aplikasi
Dikarenakan beberapa versi XAMPP masih menggunakan PHP versi lama, aplikasi ini dilengkapi cara paling praktis untuk dijalankan secara mandiri melalui Terminal:
1. Buka **Terminal** (jika Anda menggunakan Mac/Linux) atau **Command Prompt / CMD** (jika menggunakan Windows).
2. Arahkan direktori terminal ke folder penyimpanan aplikasi ini. *(Berdasarkan lokasi saat ini: `cd /Applications/XAMPP/xamppfiles/htdocs/admin-web-store`)*
3. Ketik perintah berikut, lalu tekan **Enter**:
   ```bash
   php spark serve --port 8080
   ```
4. Jika muncul tulisan *Development Server started*, **biarkan jendela terminal tersebut terbuka** di latar belakang.

### Tahap 4: Membuka Aplikasi
1. Buka kembali browser web Anda (Chrome/Safari/dll).
2. Kunjungi alamat berikut: 
   👉 **[http://localhost:8080](http://localhost:8080)**
3. Anda akan melihat halaman Login aplikasi Admin Web Store!

---

## 🔑 Informasi Akun (Login)

Aplikasi telah dilengkapi dengan 3 (tiga) jenis akun default yang siap digunakan kapan saja untuk mengetes hak akses (jabatan) yang berbeda:

1. **Akun Admin (Akses Penuh Keseluruhan)**
   - Username: `admin`
   - Password: `admin123`

2. **Akun Staf Gudang (Hanya Bisa Kelola Barang)**
   - Username: `gudang`
   - Password: `gudang123`

3. **Akun Pengunjung / Guest (Hanya Bisa Melihat)**
   - Username: `guest`
   - Password: `guest123`

---

### 🛑 Cara Mematikan Aplikasi
Jika Anda sudah selesai menggunakan aplikasi dan ingin mematikannya:
1. Buka kembali jendela Terminal/CMD yang dibiarkan terbuka tadi.
2. Tekan tombol **`Ctrl + C`** secara bersamaan pada keyboard Anda. Server akan otomatis mati.
3. Anda juga bisa menekan tombol **Stop** pada XAMPP (MySQL) jika sudah selesai sepenuhnya.
