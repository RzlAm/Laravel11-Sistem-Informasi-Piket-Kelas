<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Sistem Informasi Piket Kelas Dengan Laravel 11</h1>
<p align="center">📋 Source code aplikasi pencatatan piket kelas sederhana berbasis Laravel 11 🚀</p>

---

### ✨ Apa itu Si Piket?
Aplikasi yang cocok buat kelas kalian! Dengan aplikasi ini, nggak ada lagi alasan lupa siapa yang harus piket atau siapa yang kabur dari tanggung jawab! 😎

**Fitur utama:**
- Admin bisa dikelola oleh Sekretaris atau Ketua Kelas.
- Jadwal piket, data siswa, hingga statistik singkat, semua terorganisir dengan rapi.

👉 Jangan lupa kasih bintang ya biar makin semangat ngembanginnya! ⭐

---
<br>

## 🚀 Instalasi

Ikuti langkah berikut untuk menjalankan aplikasi:

1. **Clone repository**
   ```
   git clone https://github.com/RzlAm/Laravel11-Sistem-Informasi-Piket-Kelas.git
2. **Masuk ke direktori proyek**
    ```
    cd Laravel11-Sistem-Informasi-Piket-Kelas
3. **Install dependencies dengan Composer**
    ```
    composer install
4. **Copy file konfigurasi `.env`**
    ```
    cp .env.example .env
5. **Generate application key**
    ```
    php artisan key:generate
6. **Setup database**
   
    - **Edit file .env untuk konfigurasi database kamu:**
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=sipiket
        DB_USERNAME=root
        DB_PASSWORD=
    - **Jalankan migrasi dan seed data:**
        ```
        php artisan migrate --seed
7. **Buat link storage**
    ```
    php artisan storage:link
8. **Jalankan aplikasi**
    ```
    php artisan serve
    ```
    Akses aplikasi melalui browser: `http://localhost:8000`
9. **Login ke aplikasi**
    Username: `admin`
    Password: `admin`
<p align="center"> <img src="https://i.imgur.com/gKFJ94M.png" alt="Login Si Piket" width="300"> </p>
<br>

## ✨ Fitur Aplikasi
### Guest
1. Melihat statistik singkat di halaman utama.
2. Melihat jadwal piket.
3. Melihat data piket bulan ini.

### Admin
1. CRUD data siswa.
2. CRUD jadwal piket.
3. CRUD data piket.
4. CRUD akun admin.
5. Mengubah logo dan nama kelas.
<br>

## 🔧 Tech Stack
1. PHP 8.3.13
2. Laravel 11.36.1
3. Font Awesome (Ikon stylish)
4. Adminkit (Template dashboard modern)
5. Chart.js (Visualisasi data)
<br>

## 🤝 Kontribusi
**Mau bantuin ngembangin? Gaskeun aja! 💪**<br>
Fork repository ini.
Buat branch baru untuk fitur kamu: git checkout -b fitur-baru.
Commit perubahan kamu: git commit -m 'Tambah fitur keren'.
Push branch: git push origin fitur-baru.
Buat Pull Request. ✨
<br><br>

## 🏆 Terima Kasih
Terima kasih udah mampir! Jangan lupa kasih bintang ⭐ dan terapkan aplikasi ini di kelas kalian. Kalau bermanfaat, share juga ke teman-teman ya. 😊
