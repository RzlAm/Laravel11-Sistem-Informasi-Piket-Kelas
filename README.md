<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Sistem Informasi Piket Kelas Dengan Laravel 11
Source code aplikasi pencatatan piket kelas sederhana yang dibuat menggunakan Laravel 11

Aplikasi yang cocok nih buat kelas kalian, biar tahu siapa yang piket dan siapa yang ndak piket hehe.
Untuk Admin bisa di fungsikan sebagai Sekretaris dan Ketua. Jangan lupa star yaa.

# Instalasi
1. Clone repository<br>
   `git clone https://github.com/RzlAm/Laravel11-Sistem-Informasi-Piket-Kelas.git`
2. Masuk ke direktrori projek<br>
   `cd Laravel11-Sistem-Informasi-Piket-Kelas`
3. Install Dependencies dengan Composer<br>
    `composer install`
4. Copy file `.env`<br>
    `cp .env.example .env`
5. Generate application key<br>
    `php artisan key:generate`
6. Setup database<br>
    - Edit file `.env` untuk konfigurasi database kamu (misal, MySQL)<br>
      ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=sipiket
        DB_USERNAME=root
        DB_PASSWORD=
      ```
    -  Jalankan perintah migrasi<br>
      `php artisan migrate`
7. Jalankan aplikasi<br>
    `php artisan serve`<br>
   Buka di browser kalian `http://localhost:8000`


# Fitur 
A. Guest
  1. Melihat statistic singkat di home
  2. Melihat jadwal piket
  3. Melihat data piket bulan ini

B. Admin
  1. CRUD data siswa
  2. CRUD jadwal piket
  3. CRUD data piket
  4. CRUD akun admin
  5. Mengubah logo dan nama kelas

# Tech Stack
1. PHP 8.3.13
2. Laravel 11.36.1
3. Font Awesome
4. Adminkit
5. Chart js

Mau kontribusi?, gasin aja.<br>
Terimakasih telah berkunjung, Jangan lupa untuk memberikan bintang ⭐.
Silahkan juga bagi yang mau clone, dan terapkan di kelas kalian, jangan lupa kasih credit 😊
