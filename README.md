<h1 align="center">Selamat datang di Aplikasi Perpustakaan👋</h1>

[](url)
![Screenshot_2021-01-30 Figma(1)](https://user-images.githubusercontent.com/55536560/106356894-60009700-6335-11eb-97c9-185bca17066c.png)

[![](https://img.shields.io/github/issues/rizalihwan/perpustakaan?style=flat-square)](https://img.shields.io/github/issues/rizalihwan/perpustakaan?style=flat-square) ![](https://img.shields.io/github/stars/rizalihwan/perpustakaan?style=flat-square)
![](https://img.shields.io/github/forks/rizalihwan/perpustakaan?style=flat-square) 
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a> [![saythanks](https://img.shields.io/badge/say-thanks-ff69b4.svg?style=flat-square)](https://saythanks.io/to/rizalihwan94%40gmail.com)  [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com) [![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity) [![made-for-VSCode](https://img.shields.io/badge/Made%20for-VSCode-1f425f.svg?style=flat-square)](https://code.visualstudio.com/)

### 🤔 Apa itu Perpustakaan?
Web Perpustakaan Open Source yang dibuat oleh <a href="https://github.com/rizalihwan"> Rizal Ihwan Sulaiman. </a> **Perpustakaan adalah website peminjaman dan pengembalian buku di perpustakaan.** Perpustakaan dibuat untuk memudahkan proses peminjaman dan pengembalian buku dengan mudah.

### 🎉 Kenapa dibuat Open Source?
Untuk memudahkan peminjaman dan pengembalian buku di perpustakaan secara digital. Dan untuk bahan belajar bagi yang ingin mempelajari framework Laravel.

### 📆 <a href="#">Release Date</a>
- 31 January 2021

------------

 ### 👤 Default Akun untuk login
	
**Admin Default Akun**
- Username: admin
- Password: password

**Siswa Default Akun**
- Username: siswa
- Password: password

------------

## 💻 Install

1. **Clone Repository**
```bash
git clone https://github.com/rizalihwan/perpustakaan.git
cd perpustakaan
composer install
npm install
copy .env.example .env
```

2. **Buka ```.env``` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai, karena di project ini menggunakan PostgreSQL jadi saya kasih contoh seperti berikut, dan jika kamu ingin menggunakan MySQL atau lainnya tinggal sesuaikan.**
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=perpus
DB_USERNAME=postgres
DB_PASSWORD=root
```

3. **Instalasi website**
```bash
php artisan key:generate
php artisan db:fresh (because i create new command for migrate tables & run the seeder)
php artisan storage:link
```

4. **Jalankan website**
```command
php artisan serve
```

## 🧑 Author

👤 <a href="https://www.facebook.com/izal.whanz/"> **Rizal Ihwan**</a>
- Facebook : <a href="https://www.facebook.com/izal.whanz/"> Rizal Ihwan</a>
- LinkedIn : <a href="https://www.linkedin.com/in/rizal-ihwan-98a8a9199/"> Rizal Ihwan</a>

## 🤝 Contributing
Sangat berterima kasih bagi yang ingin berkontribusi. **Karena Project ini saya selesaikan sendiri, tapi apabila anda ingin berkontribusi sangat dipersilahkan ya.**


## 📝 License
- Copyright © 2021 Rizal Ihwan.
- **Perpustakaan is open-sourced software licensed under the MIT license.**

------------

- **Feel free to ask me at [Telegram](https://t.me/ihw_me/).**

