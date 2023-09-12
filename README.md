# jobseeker

##lakukan git clone

cd jobseeker/

##Konfigurasi .env, Buka file .env dan atur konfigurasi database sesuai dengan informasi koneksi database Anda:

##Instalasi Dependensi

composer install

##Migrasi Database

php artisan migrate

##Seeding DB

php artisan db:seed

##Menjalankan Aplikasi

php artisan serve

Aplikasi akan berjalan di http://127.0.0.1:8000

IMPORT FILE jobseeker_api.json ke postman untuk melakukan testing
