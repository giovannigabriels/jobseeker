# jobseeker

##lakukan git clone

```
cd jobseeker/
```

##Konfigurasi .env, Buka file .env dan atur konfigurasi database sesuai dengan informasi koneksi database Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=nama_pengguna_database
DB_PASSWORD=sandi_database_anda
```

##Instalasi Dependensi

```
composer install
```

##Migrasi Database

```
php artisan migrate
```

##Seeding DB

```
php artisan db:seed
```

##Menjalankan Aplikasi

```
php artisan serve
```

Aplikasi akan berjalan di http://127.0.0.1:8000

IMPORT FILE jobseeker_api.json ke postman untuk melakukan testing
