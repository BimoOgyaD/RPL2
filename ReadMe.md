MooHub - PHP Native project (PHP 8.1) Github lewat alamat URL : https://github.com/BimoOgyaD/RPL2

Projek website penyedia informasi sederhana 

Cara menjalankanya lewat (XAMPP):
1. Ekstrak folder moohub.zip ke dalam folder htdocs di XAMPP sehingga path-nya menjadi htdocs/moohub/.
2. Buat database baru di phpMyAdmin dengan nama moohub_db dan import file database.sql yang sudah disediakan.
3. Pastikan PHP versi 8.1 aktif di XAMPP.
4. Buka browser dan akses website melalui http://localhost/moohub/public/.
5. Admin dapat menggunakan menu News untuk menambah, atau menghapus berita.

Struktur Folder:
1. css/ Berisi file style.css untuk styling seluruh halaman.
2. admin/ Berisi halaman admin seperti login.php untuk login, register.php untuk daftar admin baru, dashboard.php untuk halaman utama admin, berita.php untuk CRUD berita, katalog.php untuk CRUD katalog, dan logout.php untuk keluar dari sesi admin.
3. includes/ → Berisi template dan konfigurasi seperti header.php untuk bagian atas halaman, footer.php untuk bagian bawah, dan koneksi.php untuk pengaturan koneksi database menggunakan PDO.
4. index.php → Halaman utama yang diakses publik untuk melihat informasi dan berita.

Fitur:
1. Pengunjung dapat melihat daftar berita dan detailnya tanpa harus login.
2. Admin dapat login untuk mengelola seluruh konten: tambah, edit, dan hapus berita serta katalog.
3. Dashboard admin sederhana dan mudah digunakan.
4. Logout untuk mengakhiri sesi admin.

Konfigurasi database ada di includes/koneksi.php.
