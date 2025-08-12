#!/bin/sh

echo "Running database migrations..."
php artisan migrate --force

# Jalankan web server Apache
# Ini adalah perintah default untuk menjalankan server setelah migrasi selesai
echo "Starting Apache server..."
apache2-foreground
