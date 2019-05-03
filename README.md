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
* Kalau sudah pasang Lumen, harusnya Composer juga udah dipasang.
Kalau belum, pasang [Composer](https://getcomposer.org/download/) terlebih dahulu.
* Jalankan perintah `composer install`
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
├── Asrama
│   ├── Gedung.php
│   └── Kamar.php
├── Helpdesk
│   ├── Complain.php
│   └── User.php
└── HumanResource
    ├── Dosen.php
    └── Fakultas.php
```

_Model_ disesuaikan dengan _table_ yang kamu buat. Apabila kamu mengerjakan modul
**asrama** dan telah membuat _table_ **gedung**, kamu dapat membuat direktori baru
yaitu `app/Models/Asrama` kemudian membuat berkas baru dengan nama `app/Models/Asrama/Gedung.php`.
Isinya dapat kamu lihat dari contoh yang sudah tersedia atau baca saja
[dokumentasinya](https://laravel.com/docs/5.8/eloquent).
Catatan: Dokumentasi Laravel perlu penyesuaian dengan Lumen jadi kamu tidak dapat
mengikuti contohnya begitu saja.

### Seeding

```
database/seeds
├── DatabaseSeeder.php
├── HrDosenSeeder.php
└── HrFakultasSeeder.php
```

_Seeding_ adalah proses dimana kita menambahkan _record_ ke _database_ secara
langsung tanpa melalui program yang kita bangun.
Sebut saja _predefined_ _record_ yang sudah kita masukkan dan siap untuk digunakan.

Cara membuatnya cukup jalankan perintah `php artisan make:seeder <nama modul><nama table>Seeder.php`.
Sebagai contoh, kalau kamu mengerjakan bagian **asrama** dan akan melakukan _seeding_ untuk
_table_ **gedung**, kamu bisa menjalankan
`php artisan make:seeder AsramaGedungSeeder`. Selanjutnya kamu bisa buka berkas tersebut di
`database/seeds/AsramaGedungSeeder.php`. Kamu akan melihat kode seperti di bawah.

```php
<?php

use Illuminate\Database\Seeder;

class AsramaGedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
```

Untuk bisa melakukan _seeding_, pastikan kamu sudah membuat _model_ (dalam hal ini)
yaitu `app/Models/Asrama/Gedung.php`. Panggil _model_ tersebut ke _seeder_.
Kode kamu akan terlihat seperti berikut.

```php
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asrama\Gedung;

class AsramaGedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gedung::create([...]);
    }
}
```

Selanjutnya, buka berkas `database/seeds/DatabaseSeeder.php`.
Tambahkan `AsramaGedungSeeder` di sana.
Kemudian jalankan perintah `composer dump-autload`.
Setelah selesai, kamu sudah dapat melakukan _seeding_ dengan perintah
`php artisan db:seed`.

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

| Nama _Branch_    | Digunakan oleh Kelompok         | Owner           |
|------------------|---------------------------------|-----------------|
| `modul-alumni`   | Kelompok 9 (Alumni)             | @badrus123      |
| `modul-asrama`   | Kelompok 2 (Asrama)             | @wisn           |
| `modul-helpdesk` | Kelompok 7 (Helpdesk)           | @bintangperyoga |
| `modul-hr`       | Kelompok 5 (Human Resource)     | @ghinadya       |
| `modul-lac`      | Kelompok 8 (Language Center)    | @Ghalistan      |
| `modul-logistik` | Kelompok 3 (Logistik)           | @riskach        |
| `modul-openlib`  | Kelompok 6 (Open Library)       | @aupnurzaman    |
| `modul-ppm`      | Kelompok 1 (PPM)                | @rizkiar00      |
| `modul-sm`       | Kelompok 4 (Student Management) | @Mozarella      |

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

