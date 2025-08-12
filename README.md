Proyek API Manajemen User (Skill Test)
Ini adalah proyek API RESTful sederhana untuk manajemen pengguna yang dibuat sebagai bagian dari skill test backend. API ini mencakup fungsionalitas CRUD (Create, Read, Update, Delete) untuk data pengguna, lengkap dengan validasi input dan penanganan error yang informatif.

Stack Teknologi
Framework: Laravel 12

Bahasa: PHP 8.2+

Database: MySQL

Web Server (Lokal): XAMPP (Apache)

Dokumentasi: Postman Collection

Instalasi & Cara Menjalankan (Lokal dengan XAMPP)
Pastikan Anda sudah menginstal dan menjalankan XAMPP (service Apache & MySQL harus aktif).

Clone Repository
Clone repository ini ke dalam direktori htdocs XAMPP Anda.

git clone [URL_REPOSITORY_ANDA]
cd [NAMA_FOLDER_PROYEK]

Instal Dependensi
Jalankan perintah berikut untuk menginstal semua paket yang dibutuhkan Laravel.

composer install

Konfigurasi Environment
Salin file .env.example menjadi .env.

copy .env.example .env

Buat Database
Buka phpMyAdmin (http://localhost/phpmyadmin) dan buat database baru, misalnya dengan nama db_user_management.

Atur Koneksi Database di file .env
Buka file .env dan sesuaikan konfigurasinya seperti di bawah ini (password default XAMPP biasanya kosong).

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_user_management
DB_USERNAME=root
DB_PASSWORD=

Generate Key & Jalankan Migrasi
Perintah ini akan membuat tabel users di database Anda.

php artisan key:generate
php artisan migrate

Jalankan Aplikasi
Gunakan server pengembangan bawaan Laravel.

php artisan serve

Aplikasi API sekarang berjalan dan siap diakses di http://127.0.0.1:8000.

Dokumentasi API
Berikut adalah ringkasan untuk setiap endpoint yang tersedia.

1. Get All Users
Method: GET

Endpoint: /api/users

Deskripsi: Mengambil daftar lengkap semua pengguna.

2. Create New User
Method: POST

Endpoint: /api/users

Deskripsi: Mendaftarkan pengguna baru.

Body Request (JSON): name, email, password, password_confirmation, phone_number, is_active, department.

3. Get Specific User
Method: GET

Endpoint: /api/users/{id}

Deskripsi: Mengambil detail satu pengguna berdasarkan ID.

4. Update User
Method: PUT

Endpoint: /api/users/{id}

Deskripsi: Memperbarui data pengguna yang sudah ada.

5. Delete User
Method: DELETE

Endpoint: /api/users/{id}

Deskripsi: Menghapus pengguna dari database.

Catatan: Untuk detail lengkap tentang body request dan contoh respons, silakan impor file User_Management_API.postman_collection.json yang tersedia di root proyek ke aplikasi Postman Anda.
