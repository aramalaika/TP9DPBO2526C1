# TP9DPBO2526C1
Janji : Saya Aracelli Jasmine Malaika dengan NIM 2501804 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## 1. Deskripsi Program
Program ini merupakan aplikasi berbasis web untuk mengelola data kandidat karyawan dan data lowongan pekerjaan menggunakan konsep **Model-View-Presenter (MVP)**.

Aplikasi dikembangkan menggunakan PHP dan MySQL dengan menerapkan prinsip Passive View, yaitu View hanya bertanggung jawab menampilkan data dan menerima input pengguna. Seluruh proses pengolahan data dilakukan melalui Presenter dan Model.

## 2. Tujuan Program
Tujuan pembuatan program ini adalah:
- Memahami penerapan arsitektur Model-View-Presenter (MVP).
- Memisahkan tanggung jawab antara Model, View, dan Presenter.
- Mengimplementasikan operasi CRUD (Create, Read, Update, Delete).
- Mengelola data kandidat dan lowongan pekerjaan menggunakan database MySQL.
- Menerapkan prinsip Passive View agar View tidak berhubungan langsung dengan Model.

## 3. Teknologi yang Digunakan
- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Database Management:** phpMyAdmin
- **Web Server:** Apache (Laragon)
- **Arsitektur:** Model-View-Presenter (MVP)
- **Editor:** Visual Studio Code

## 4. Fitur Program
### A. Manajemen Data Kandidat
Program menyediakan fitur:
- **Create:** Menambahkan data kandidat baru.
- **Read:** Menampilkan seluruh data kandidat.
- **Update:** Mengubah informasi kandidat.
- **Delete:** Menghapus data kandidat.
Data kandidat terdiri dari ID, nama, posisi yang dilamar, domisili, skor tes, dan pengalaman kerja.

### B. Manajemen Data Lowongan
Program juga menyediakan fitur:
- **Create:** Menambahkan lowongan pekerjaan.
- **Read:** Menampilkan daftar lowongan pekerjaan.
- **Update:** Mengubah informasi lowongan.
- **Delete:** Menghapus data lowongan.
Data lowongan terdiri dari ID, nama lowongan, departemen, deskripsi pekerjaan, dan status lowongan.
Status lowongan memiliki dua pilihan, yaitu Dibuka dan Ditutup.

## 5. Struktur Folder
```text
MPV_Kandidat/
│
├── index.php
│
├── models/
│   ├── DB.php
│   ├── Kandidat.php
│   ├── KontrakModel.php
│   ├── TabelKandidat.php
│   ├── Lowongan.php
│   ├── KontrakLowongan.php
│   └── TabelLowongan.php
│
├── presenters/
│   ├── KontrakPresenter.php
│   ├── PresenterKandidat.php
│   ├── KontrakPresenterLowongan.php
│   └── PresenterLowongan.php
│
├── views/
│   ├── KontrakView.php
│   ├── ViewKandidat.php
│   ├── KontrakViewLowongan.php
│   └── ViewLowongan.php
│
├── template/
│   ├── skin.html
│   ├── form.html
│   ├── lowongan_skin.html
│   └── lowongan_form.html
│
└── dokumentasi/
    └── Demo_MVP_Kandidat.mp4
```

## 6. Desain Arsitektur MVP
Program menggunakan tiga komponen utama:

### A. Model
Model bertugas mengelola data dan berkomunikasi dengan database MySQL.
File yang digunakan:
- `DB.php`
- `Kandidat.php`
- `KontrakModel.php`
- `TabelKandidat.php`
- `Lowongan.php`
- `KontrakLowongan.php`
- `TabelLowongan.php`

### B. View
View bertugas menampilkan data kepada pengguna melalui template HTML dan menyediakan formulir input.
File yang digunakan:
- `KontrakView.php`
- `ViewKandidat.php`
- `KontrakViewLowongan.php`
- `ViewLowongan.php`
View tidak mengakses Model atau Entity secara langsung.

### C. Presenter
Presenter menjadi penghubung antara Model dan View. Presenter mengambil data dari Model, mengolahnya, kemudian mengirimkan hasilnya kepada View untuk ditampilkan.

File yang digunakan:
- `KontrakPresenter.php`
- `PresenterKandidat.php`
- `KontrakPresenterLowongan.php`
- `PresenterLowongan.php`

## 7. Alur Kerja Program
Alur kerja aplikasi menggunakan konsep Model-View-Presenter sebagai berikut:
1. Pengguna membuka aplikasi melalui browser.
2. `index.php` menerima request dari pengguna.
3. Request diteruskan kepada Presenter sesuai halaman yang dipilih.
4. Presenter meminta data kepada Model.
5. Model menjalankan query ke database MySQL.
6. Data hasil query dikembalikan kepada Presenter.
7. Presenter mengolah data dan mengirimkannya ke View.
8. View menampilkan data menggunakan template HTML.
9. Jika pengguna melakukan tambah, edit, atau hapus data, request POST diterima kembali oleh `index.php` dan diteruskan kepada Presenter.
10. Presenter memanggil fungsi Model untuk melakukan perubahan pada database.

## 8. Database
Nama database yang digunakan:

`mvp_kandidat_db`

Database memiliki dua tabel utama:

### Tabel Kandidat

| Kolom | Keterangan |
|---|---|
| id | Primary Key |
| nama | Nama kandidat |
| posisi | Posisi yang dilamar |
| domisili | Domisili kandidat |
| skorTes | Skor hasil tes |
| pengalamanTahun | Pengalaman kerja dalam tahun |

### Tabel Lowongan

| Kolom | Keterangan |
|---|---|
| id | Primary Key |
| nama_lowongan | Nama posisi pekerjaan |
| departemen | Departemen pekerjaan |
| deskripsi | Deskripsi pekerjaan |
| status | Status lowongan |

File export database disertakan dengan nama `mvp_db.sql`.

## 9. Cara Menjalankan Program
1. Pastikan Laragon sudah terpasang.
2. Jalankan Apache dan MySQL melalui Laragon.
3. Salin folder project ke direktori `C:\laragon\www\`.
4. Buka phpMyAdmin melalui browser.
5. Buat database dengan nama `mvp_kandidat_db`.
6. Import file `mvp_db.sql` ke database tersebut.
7. Pastikan konfigurasi koneksi database sudah sesuai.
8. Buka browser dan akses:

`http://localhost/MPV_Kandidat/index.php`

Program siap digunakan.

## 10. Dokumentasi Program
Dokumentasi program berupa screen recording yang memperlihatkan proses penggunaan aplikasi.

https://github.com/user-attachments/assets/9cc5d4e5-59c5-4968-ac42-4848f676c721


https://github.com/user-attachments/assets/1896d712-0ea9-43d6-b930-acfee52a3e09


File dokumentasi tersedia di folder `dokumentasi/`.

## 11. Kesimpulan
Melalui pembuatan program ini, konsep Model-View-Presenter (MVP) dapat diterapkan untuk membangun aplikasi pengelolaan kandidat dan lowongan pekerjaan.

Pemisahan antara Model, View, dan Presenter membuat struktur program lebih terorganisir serta memudahkan proses pengembangan dan pemeliharaan aplikasi.

Program ini juga berhasil menerapkan operasi CRUD pada kedua modul, yaitu data kandidat dan data lowongan pekerjaan.
