# Proyek API Manajemen Pengguna - Skill Test

Sebuah API RESTful sederhana yang dibangun menggunakan Laravel 12 dan MySQL untuk mengelola data pengguna (CRUD - Create, Read, Update, Delete) sebagai bagian dari *skill test* backend.

-----

## Fitur Utama

  - **Tambah Pengguna Baru**: Mendaftarkan pengguna baru ke dalam database.
  - **Lihat Daftar Pengguna**: Menampilkan semua pengguna yang terdaftar.
  - **Lihat Detail Pengguna**: Melihat informasi lengkap dari satu pengguna berdasarkan ID.
  - **Ubah Data Pengguna**: Memperbarui informasi pengguna yang sudah ada.
  - **Hapus Pengguna**: Menghapus data pengguna dari database.

-----

## Tumpukan Teknologi (Tech Stack)

  - **Backend**: [Laravel 12](https://laravel.com/)
  - **Database**: [MySQL](https://www.mysql.com/)
  - **Lingkungan Lokal**: [XAMPP](https://www.apachefriends.org/) (Apache & MySQL)
  - **Dokumentasi**: [Postman](https://www.postman.com/)

-----

## Instalasi dan Setup Lokal

Ikuti langkah-langkah ini untuk menjalankan proyek di komputer lokal Anda.

1.  **Clone Repositori**
    Buka terminal atau Git Bash, arahkan ke direktori `htdocs` XAMPP Anda.

    ```bash
    git clone [URL_REPOSITORY_ANDA]
    ```

2.  **Masuk ke Direktori Proyek**

    ```bash
    cd [NAMA_FOLDER_PROYEK]
    ```

3.  **Install Dependensi**
    Pastikan Anda memiliki [Composer](https://getcomposer.org/) terpasang, lalu jalankan:

    ```bash
    composer install
    ```

4.  **Konfigurasi File Environment**
    Salin file `.env.example` menjadi file baru dengan nama `.env`.

    ```bash
    # Untuk Windows (CMD)
    copy .env.example .env

    # Untuk Linux/macOS/Git Bash
    cp .env.example .env
    ```

5.  **Buat Database**
    Buka browser dan akses `http://localhost/phpmyadmin`. Buat database baru dengan nama `db_user_management`.

6.  **Atur Koneksi Database**
    Buka file `.env` yang baru Anda buat, lalu isi seperti di bawah ini.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_user_management
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    *Catatan: Biarkan `DB_PASSWORD` kosong jika Anda menggunakan pengaturan default XAMPP.*

7.  **Generate Key & Jalankan Migrasi**
    Perintah ini akan membuat tabel `users` di database Anda.

    ```bash
    php artisan key:generate
    php artisan migrate
    ```

8.  **Jalankan Server**

    ```bash
    php artisan serve
    ```

    Aplikasi API sekarang akan berjalan di `http://127.0.0.1:8000`.

-----

## Struktur Rute (API Endpoints)

Berikut adalah rute utama yang digunakan dalam API ini:

| Method | Path                  | Deskripsi                               |
| :----- | :-------------------- | :-------------------------------------- |
| `GET`  | `/api/users`          | Mengambil daftar semua pengguna.        |
| `POST` | `/api/users`          | Menambahkan pengguna baru.              |
| `GET`  | `/api/users/{id}`     | Menampilkan detail satu pengguna.       |
| `PUT`  | `/api/users/{id}`     | Memperbarui data satu pengguna.         |
| `DELETE`| `/api/users/{id}`    | Menghapus satu pengguna.                |

**Catatan**: Untuk detail lengkap tentang *body request* dan contoh respons, silakan impor file `User_Management_API.postman_collection.json` yang tersedia di *root* proyek ke aplikasi Postman Anda.
