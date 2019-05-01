# Spektakuler

Kolaborasi tugas mata kuliah Sistem Informasi IF40-04 Telkom University.

## Spesifikasi

* PHP ~= 7.2.17
* MySQL ~= 5.7
* Composer ~= 1.8.5
* Lumen ~= 5.8

## Panduan Pemasangan

* Pasang _web server_ (contohnya Apache)
* Pasang MySQL
* Pasang [Lumen](https://lumen.laravel.com/docs/5.8/installation)
* Salin `.env.example` jadi `.env` kemudian ubah informasi _database_ di sana
* Jalankan _server_ dengan perintah `php -S localhost:8000 -t public`
* Buka [localhost:8000](http://localhost:8000/)
* _Happy coding_!

**Catatan**: Kamu bisa menggunakan XAMPP untuk paket Apache, MySQL, dan PHP.

**PERINGATAN**: Jangan _push_ kode kamu ke _master branch_!

## Struktur Proyek

### Routes

```
routes
├── api
│   ├── v1
│   │   ├── alumni.php
│   │   ├── asrama.php
│   │   ├── helpdesk.php
│   │   ├── hr.php
│   │   ├── lac.php
│   │   ├── logistik.php
│   │   ├── openlib.php
│   │   ├── ppm.php
│   │   └── sm.php
│   └── v1.php
├── api.php
└── web.php
```

Sunting _routes_ sesuai dengan modul yang sedang kamu kerjakan.
**Jangan sentuh _routes_ lain selain bagian modul kamu**!
Apabila kamu mengerjakan bagian modul **asrama**, kamu hanya boleh mengubah berkas
`routes/api/v1/asrama.php` saja.

### Controllers

```
app/Http/Controllers
├── Api
│   ├── Controller.php
│   └── V1
│       ├── Alumni
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── Asrama
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── Controller.php
│       ├── Helpdesk
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── HumanResource
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── LanguageCenter
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── Logistik
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── OpenLibrary
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       ├── Ppm
│       │   ├── Controller.php
│       │   └── ExampleController.php
│       └── StudentManagement
│           ├── Controller.php
│           └── ExampleController.php
└── Controller.php
```

Masing-masing modul sudah dibuatkan direktori untuk membuat _controller_ yang dibutuhkan.
**Jangan sentuh _controller_ modul lain**!
Kamu boleh menghapus berkas `ExampleController.php` yang ada di direktori modul kamu.
Hal tersebut sangat disarankan!

### Migrations

```
database/migrations
├── 2019_05_02_004038_<nama migration>_table.php
└── 2019_05_02_005541_create_cache_table.php
```

_Migration_ ini digunakan untuk membuat/menghapus _table_ secara otomatis.
Untuk membuat _migration_ baru, kamu hanya perlu menjalankan perintah
`php artisan make:migration create_<nama migration kamu>_table.php`.
Sebagai contoh, apabila kamu mengerjakan modul **asrama** dan ingin membuat _table_
untuk daftar **gedung**, kamu bisa menjalankan perintah
`php artisan make:migration create_asrama_gedung_table`.
Selanjutnya, periksa isi dari _migration_ yang telah dibuat.

Kamu bisa melihat dari contoh yang sudah ada atau baca saja
[dokumentasinya](https://laravel.com/docs/5.8/migrations).

### Models

```
app/Models
└── Helpdesk
    ├── Complain.php
    └── User.php
```

_Model_ disesuaikan dengan _table_ yang kamu buat. Apabila kamu mengerjakan modul
**asrama** dan telah membuat _table_ **gedung**, kamu dapat membuat direktori baru
yaitu `app/Models/Asrama` kemudian membuat berkas baru dengan nama `app/Models/Asrama/Gedung.php`.
Isinya dapat kamu lihat dari contoh yang sudah tersedia atau baca saja
[dokumentasinya](https://laravel.com/docs/5.8/eloquent).
Catatan: Dokumentasi Laravel perlu penyesuaian dengan Lumen jadi kamu tidak dapat
mengikuti contohnya begitu saja.

### Branches

```
  master
  modul-alumni
  modul-asrama
  modul-helpdesk
  modul-hr
  modul-lac
  modul-logistik
  modul-openlib
  modul-ppm
  modul-sm
  staging
```

| Nama _Branch_    | Digunakan oleh Kelompok         |
|------------------|---------------------------------|
| `modul-alumni`   | Kelompok 9 (Alumni)             |
| `modul-asrama`   | Kelompok 2 (Asrama)             |
| `modul-helpdesk` | Kelompok 7 (Helpdesk)           |
| `modul-hr`       | Kelompok 5 (Human Resource)     |
| `modul-lac`      | Kelompok 8 (Language Center)    |
| `modul-logistik` | Kelompok 3 (Logistik)           |
| `modul-openlib`  | Kelompok 6 (Open Library)       |
| `modul-ppm`      | Kelompok 1 (PPM)                |
| `modul-sm`       | Kelompok 4 (Student Management) |

### Branches Khusus

**Master**

_Branch_ **_master_** digunakan sebagai pusat pengembangan.
Apabila di bagian _branch_ masing-masing modul telah siap untuk beberapa
fiturnya, kodenya sudah dapat di-_merge_ ke _master_.

**Staging**

_Branch_ ini dikhususkan sebagai pusat _deployment_ menuju _server staging_
yang telah disediakan yaitu di Heroku. Sumber kode yang akan digunakan
oleh _branch_ _staging_ adalah dari _branch_ _master_.

## Panduan Mengerjakan

Sebelum melakukan apapun, pastikan kamu pindah ke _branch_ yang telah disediakan.
Apabila kamu mengerjakan modul **asrama**, pindahkan _working directory_ kamu
ke _branch_ `modul-asrama` dengan perintah `git checkout modul-asrama`.
Ganti `asrama` dengan nama modul kamu yang telah diberitahukan di bagian
[branches](#branches) di atas.

Kemudian, pastikan untuk melakukan `git pull origin master` terlebih dahulu
agar nantinya tidak terjadi konflik dengan _branch_ kamu.

## Demonstrasi API

Kamu dapat mengunjungi [spektakuler-staging.herokuapp.com][1] untuk melihat
demonya. Untuk mengakses _endpoint_ tertentu, gunakan URL
`spektakuler-staging.herokuapp.com/api/v1/<nama modul>/<endpoint>`.

[1]: https://spektakuler-staging.herokuapp.com/

## License

Lisensi menggunakan [The MIT License](LICENSE).

