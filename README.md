# Admin Web Store 🛒

Aplikasi Manajemen Toko Berbasis Web (Admin Web Store). Aplikasi ini memungkinkan pengguna dengan peran Admin, Staf Gudang, dan Guest untuk mengelola data barang dan kategori dengan mudah dan interaktif.

---

## 🚀 Cara Menjalankan Aplikasi di Windows (XAMPP PHP 8)

Ikuti langkah-langkah mudah di bawah ini untuk menjalankan aplikasi di komputer Anda:

### Tahap 1: Persiapan Server (XAMPP)
1. Pastikan folder aplikasi ini berada di dalam folder htdocs XAMPP Anda (Contoh: `C:\xampp\htdocs\admin-web-store`).
2. Buka aplikasi **XAMPP Control Panel**.
3. Klik tombol **Start** pada modul **Apache** dan **MySQL** hingga keduanya berwarna hijau.

### Tahap 2: Menyiapkan Database
1. Buka browser (Chrome/Edge) dan akses: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Di menu sebelah kiri, klik **New** (Baru).
3. Masukkan nama database: **`admin_web_store`** lalu klik **Create** (Buat).
4. Klik tab **Import** di bagian atas.
5. Klik **Choose File** dan cari file database (jika ada file `.sql`) ATAU jika Anda ingin menggunakan fitur otomatis CodeIgniter:
   - Buka **Command Prompt (CMD)**.
   - Masuk ke folder aplikasi: `cd C:\xampp\htdocs\admin-web-store`
   - Ketik perintah: `php spark migrate` lalu tekan Enter.
   - Ketik perintah: `php spark db:seed UserSeeder` lalu tekan Enter.

### Tahap 3: Membuka Aplikasi
Karena Anda menggunakan XAMPP dengan PHP 8, Anda bisa langsung membuka aplikasi melalui browser:

👉 **[http://localhost/admin-web-store/public](http://localhost/admin-web-store/public)**

---

## 🔑 Informasi Akun (Login)

Gunakan akun berikut untuk mencoba hak akses yang berbeda:

1. **Akun Admin (Akses Penuh)**
   - Username: `admin`
   - Password: `admin123`

2. **Akun Staf Gudang (Kelola Barang)**
   - Username: `gudang`
   - Password: `gudang123`

3. **Akun Pengunjung / Guest (Hanya Lihat)**
   - Username: `guest`
   - Password: `guest123`

---

### 🛑 Catatan Tambahan
Jika Anda ingin menggunakan perintah terminal (seperti `php spark ...`) namun muncul error "php is not recognized", pastikan Anda sudah menambahkan folder PHP XAMPP (`C:\xampp\php`) ke dalam **Environment Variables System PATH** di Windows Anda.

Jika tidak ingin repot dengan pengaturan PATH, Anda cukup memastikan Apache dan MySQL di XAMPP menyala dan akses aplikasi melalui link di atas.
