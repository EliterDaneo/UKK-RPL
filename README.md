# 🚀 Laravel Project Setup Guide

## 📌 Prerequisites
Sebelum mulai, pastikan perangkat Anda telah terpasang:
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL / PostgreSQL / SQLite
- Git

---

## 🔥 Clone & Setup Project
Ikuti langkah-langkah berikut untuk meng-clone dan menjalankan proyek Laravel ini.

### 1️⃣ Clone Repository
```bash
git clone https://github.com/EliterDaneo/UKK-RPL.git
cd UKK-RPL
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```
> **Note:** Sesuaikan konfigurasi database di file `.env`

### 4️⃣ Migrate & Seed Database
```bash
php artisan migrate 
```

### 5️⃣ Run the Application
```bash
php artisan serve
```
Akses proyek di [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🛠 Additional Commands

### ✅ Clear Cache & Config
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📝 Contributing
1. Fork repository ini.
2. Buat branch baru (`git checkout -b feature-branch`).
3. Commit perubahan (`git commit -m 'Menambahkan fitur X'`).
4. Push ke branch Anda (`git push origin feature-branch`).
5. Buat Pull Request.

---

## 🤝 License
Proyek ini menggunakan lisensi **MIT License**.

---

🚀 **Selamat coding!** 🚀

