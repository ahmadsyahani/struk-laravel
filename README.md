# 🧾 Struk Belanja — Laravel App

Aplikasi web berbasis **Laravel 13** untuk memproses dan menyimpan data struk belanja. Pengguna dapat memasukkan teks mentah dari struk fisik, lalu sistem akan memparsing dan menyimpannya ke database secara terstruktur.

---

## ✨ Fitur

- 📥 Input teks struk belanja secara manual (free-format)
- 🗄️ Penyimpanan ke database menggunakan Laravel Eloquent & DB Transaction
- 🔗 Relasi `Struk` → `StrukItem` (one-to-many)
- 🎨 UI modern dengan glassmorphism & Tailwind CSS
- ⚡ Validasi input server-side dengan pesan error

---

## 🛠️ Tech Stack

| Layer | Teknologi |
|---|---|
| Framework | Laravel 13 (PHP 8.3+) |
| Frontend | Blade + Tailwind CSS (CDN) |
| Database | MySQL / SQLite |
| Font | Plus Jakarta Sans (Google Fonts) |

---

## 📁 Struktur Penting

```
struk-belanja/
├── app/
│   ├── Http/Controllers/
│   │   └── StrukController.php     # Controller utama
│   └── Models/
│       ├── Struk.php               # Model struk (has many items)
│       └── StrukItem.php           # Model item struk
├── database/
│   └── migrations/
│       ├── ..._create_struks_table.php
│       └── ..._create_struk_items_table.php
├── resources/views/
│   └── struks/
│       └── create.blade.php        # Halaman input struk
└── routes/
    └── web.php                     # Route definisi
```

---

## 🗃️ Skema Database

### Tabel `struks`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint | Primary key |
| `store_name` | string | Nama toko (nullable) |
| `struk_date` | date | Tanggal struk (nullable) |
| `total_amount` | decimal(12,2) | Total belanja |
| `created_at` | timestamp | — |
| `updated_at` | timestamp | — |

### Tabel `struk_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint | Primary key |
| `struk_id` | bigint | FK → `struks.id` (cascade delete) |
| `item_name` | string | Nama barang |
| `quantity` | integer | Jumlah |
| `unit_price` | decimal(12,2) | Harga satuan |
| `subtotal` | decimal(12,2) | Subtotal item |
| `created_at` | timestamp | — |
| `updated_at` | timestamp | — |

---

## 🚀 Instalasi & Setup

### 1. Clone repository

```bash
git clone https://github.com/ahmadsyahani/struk-laravel.git
cd struk-laravel
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env`, sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=struk_belanja
DB_USERNAME=root
DB_PASSWORD=
```

> 💡 Atau gunakan SQLite agar lebih simpel:
> ```env
> DB_CONNECTION=sqlite
> ```
> Lalu buat file database: `touch database/database.sqlite`

### 4. Jalankan migrasi

```bash
php artisan migrate
```

### 5. Jalankan server

```bash
php artisan serve
```

Buka di browser: **http://127.0.0.1:8000/struk/create**

---

## 🔗 Routes

| Method | URI | Name | Aksi |
|---|---|---|---|
| `GET` | `/struk/create` | `struk.create` | Tampilkan form input struk |
| `POST` | `/struk/store` | `struk.store` | Simpan struk ke database |

---

## 📌 Roadmap

- [ ] Parsing otomatis teks struk dengan regex
- [ ] Integrasi AI (Gemini API) untuk parsing cerdas
- [ ] Halaman riwayat & detail struk
- [ ] Laporan pengeluaran per periode
- [ ] Export ke PDF / Excel
- [ ] Autentikasi pengguna

---

## 👨‍💻 Author

**Ahmad Syahani**
- GitHub: [@ahmadsyahani](https://github.com/ahmadsyahani)

---

## 📄 License

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
