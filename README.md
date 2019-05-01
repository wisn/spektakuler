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

## License

Lisensi menggunakan [The MIT License](LICENSE).

