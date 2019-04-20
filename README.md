# Spektakuler

Kolaborasi tugas mata kuliah Sistem Informasi IF40-04 Telkom University.

## Panduan Pemasangan

* Pasang _web server_ (contohnya Apache)
* Pasang MySQL
* Pasang [Lumen](https://lumen.laravel.com/docs/5.8/installation)
* Salin `.env.example` jadi `.env` kemudian ubah informasi _database_ di sana
* Jalankan _server_ dengan perintah `php -S localhost:8000 -t public`
* Buka [localhost:8000](http://localhost:8000/)
* _Happy coding_!

**Catatan**: Kamu bisa menggunakan XAMPP untuk paket Apache, MySQL, dan PHP.

## Struktur Proyek

```
app/Http/Controllers
├── Controller.php
├── ExampleController.php
└── HumanResource
    ├── Controller.php
    └── ExampleController.php
```

Untuk setiap modul membuat _directory_ khusus sesuai dengan nama modul kamu.
Misalnya Student Management, kamu buat _directory_ baru di
`app/Http/Controllers` dengan nama `StudentManagement`.
Kamu bisa menyalin _directory_ `HumanResource` menjadi `StudentManagement`.
Selanjutnya kamu ubah sedikit isi dari berkas-berkas yang telah disalin.

Pada berkas `app/Http/Controllers/StudentManagement/Controller.php`,
ubah semua `HumanResource` menjadi `StudentManagement` sehingga penampakannya
akan terlihat seperti di bawah.

```php
<?php

namespace App\Http\Controllers\StudentManagement;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
}
```

Selanjutnya kamu dapat membuat _controller_ baru. Sebagai referensi, kamu
dapat melihat isi dari `ExampleController.php`.

Setelah selesai, tambahkan modul kamu di _router_.
Buka berkas `routes/web.php`, tambahkan baris berikut.

```php
$router->group(['prefix' => 'nama-modul'], function () use ($router) {
    $router->group(['namespace' => 'NamaModul'], function () use ($router) {
        $router->get('/', [
            'as' => 'NamaModulIndex',
            'uses' => 'NamaController@index',
        ]);
    });
});
```

Kamu sudah dapat memprogram sekarang.
Jangan lupa untuk membaca dokumentasi Lumen.

## License

Lisensi menggunakan [The MIT License](LICENSE).

