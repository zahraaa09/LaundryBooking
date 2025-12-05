# 🧺 Laundry Booking System

Sistem manajemen pemesanan laundry berbasis web yang dibangun dengan Laravel. Aplikasi ini memudahkan pelanggan untuk memesan layanan laundry dan admin untuk mengelola pesanan.

## ✨ Fitur Utama

### 👤 Customer
- Registrasi dan Login
- Browse layanan laundry
- Booking layanan
- Tracking status pesanan
- Riwayat pemesanan

### 🔐 Admin
- Dashboard statistik (Total User, Layanan, Pesanan)
- Manajemen pesanan (Pending & Selesai)
- Kelola layanan laundry
- Manajemen user
- Laporan transaksi

## 🎨 Teknologi

- **Framework**: Laravel 10+
- **Database**: MySQL
- **Frontend**: Blade Template, Tailwind CSS
- **Icons**: Font Awesome 6.5.1

## 📋 Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (untuk asset compilation)

## 🚀 Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/laundry-booking.git
cd laundry-booking
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laundry_booking
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi Database
```bash
php artisan migrate
```

### 5. Seed Data (Opsional)
```bash
php artisan db:seed
```

### 6. Compile Assets
```bash
npm run dev
# atau untuk production
npm run build
```

### 7. Jalankan Server
```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://localhost:8000`

## 📁 Struktur Project

```
laundry-booking/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── OrderController.php
│   │   │   └── Customer/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Order.php
│   │   └── Service.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   └── orders/
│   │   ├── customer/
│   │   └── layouts/
│   │       └── admin.blade.php
├── routes/
│   └── web.php
└── public/
```

## 🎯 Cara Menggunakan

### Menjalankan Aplikasi

1. **Jalankan Laravel Server**
```bash
php artisan serve
```

2. **Akses Admin Dashboard**
- URL: `http://localhost:8000/admin/dashboard`
- Login dengan akun admin yang telah dibuat

3. **Akses Customer Page**
- URL: `http://localhost:8000`
- Registrasi atau login sebagai customer

### Membuat Admin User

```bash
php artisan tinker
```

Kemudian jalankan:
```php
$user = new App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@laundry.com';
$user->password = bcrypt('password123');
$user->role = 'admin';
$user->save();
```

## 🔧 Konfigurasi Tambahan

### Tailwind CSS
Pastikan file `tailwind.config.js` sudah dikonfigurasi dengan benar:
```js
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
],
```

### Font Awesome
Font Awesome sudah terintegrasi via CDN di layout admin. Jika ingin instalasi lokal:
```bash
npm install @fortawesome/fontawesome-free
```

## 📝 Routes Utama

### Admin Routes
- `GET /admin/dashboard` - Dashboard admin
- `GET /admin/orders` - Daftar pesanan
- `GET /admin/orders/{id}` - Detail pesanan
- `PUT /admin/orders/{id}` - Update status pesanan
- `GET /admin/services` - Kelola layanan

### Customer Routes
- `GET /` - Homepage
- `GET /services` - Daftar layanan
- `POST /booking` - Buat pemesanan
- `GET /my-orders` - Riwayat pesanan

## 🎨 Tema Warna

Aplikasi menggunakan tema **Maroon & Cream**:
- Primary: Maroon (#7F1D1D, #991B1B)
- Secondary: Cream (#FEF3C7, #FEFCE8, #FFFAF0)

## 🐛 Troubleshooting

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "Mix manifest not found"
```bash
npm run dev
```

### Error: "SQLSTATE[HY000] [1045]"
Periksa konfigurasi database di file `.env`

### Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## 📦 Deployment

### Production Setup

1. **Set Environment**
```bash
APP_ENV=production
APP_DEBUG=false
```

2. **Optimize**
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

3. **Set Permissions**
```bash
chmod -R 755 storage bootstrap/cache
```

## 🤝 Kontribusi

1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 License

Project ini menggunakan [MIT License](LICENSE)

## 👨‍💻 Developer

Dikembangkan dengan ❤️ untuk memudahkan manajemen laundry

## 📧 Kontak
- Email: support@laundry.com
- Website: https://laundry-booking.com

---

⭐ Jangan lupa berikan bintang jika project ini membantu!
