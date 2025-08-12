Proyek API Manajemen User (Skill Test)Ini adalah proyek API sederhana untuk manajemen pengguna yang dibuat sebagai bagian dari skill test backend. API ini mencakup fungsionalitas CRUD (Create, Read, Update, Delete) untuk data pengguna, lengkap dengan validasi dan penanganan error.Stack TeknologiFramework: Laravel 12Bahasa: PHP 8.2+Database: MySQLWeb Server (Lokal): XAMPP (Apache)Instalasi & Cara Menjalankan LokalPastikan Anda sudah menginstal dan menjalankan XAMPP (Apache & MySQL).Clone Repositorygit clone [URL_REPOSITORY_ANDA]
cd [NAMA_FOLDER_PROYEK]
Instal Dependensi Composercomposer install
Konfigurasi EnvironmentSalin file .env.example menjadi .env.copy .env.example .env
Buat DatabaseBuka phpMyAdmin dan buat database baru dengan nama db_user_management.Atur Koneksi Database di file .envDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_user_management
DB_USERNAME=root
DB_PASSWORD=
Generate Application Key & Migrasiphp artisan key:generate
php artisan migrate
Jalankan Aplikasiphp artisan serve
Aplikasi API sekarang berjalan dan siap diakses di http://127.0.0.1:8000.Dokumentasi APIBerikut adalah dokumentasi untuk setiap endpoint yang tersedia.1. Get All UsersMethod: GETEndpoint: /api/usersDeskripsi: Mengambil daftar lengkap semua pengguna.2. Create New UserMethod: POSTEndpoint: /api/usersDeskripsi: Mendaftarkan pengguna baru.Body Request (JSON): name, email, password, password_confirmation, phone_number, is_active, department.3. Get Specific UserMethod: GETEndpoint: /api/users/{id}Deskripsi: Mengambil detail satu pengguna berdasarkan ID.4. Update UserMethod: PUTEndpoint: /api/users/{id}Deskripsi: Memperbarui data pengguna yang sudah ada.5. Delete UserMethod: DELETEEndpoint: /api/users/{id}Deskripsi: Menghapus pengguna dari database.Catatan: Untuk detail lengkap tentang body request dan contoh respons, silakan impor file User_Management_API.postman_collection.json yang tersedia di root proyek ke aplikasi Postman Anda.
