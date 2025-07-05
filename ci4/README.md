## 👤 Profil Mahasiswa

| Atribut         | Keterangan            |
| --------------- | --------------------- |
| **Nama**        | Ihsan Rangga          |
| **NIM**         | 312310494             |
| **Kelas**       | TI.23.A.5             |
| **Mata Kuliah** | Pemrograman Website 2 |

# 📌 Laporan Praktikum 4-6

Repository ini berisi laporan praktikum 4, 5, dan 6 untuk mata kuliah Pemrograman Website 2, yang berfokus pada implementasi fitur-fitur penting dalam framework CodeIgniter 4.

Praktikum ini mencakup tiga topik utama:
1.  **Modul Login:** Membangun sistem autentikasi pengguna yang aman.
2.  **Paginasi & Pencarian:** Mengelola penyajian data dalam jumlah besar secara efisien.
3.  **Upload File:** Menangani unggah file gambar dari sisi klien ke server.

Setiap bagian dilengkapi dengan screenshot untuk memvisualisasikan hasil implementasi dan mempermudah pemahaman alur kerja.

## 🔗 Daftar Isi

| No  | Praktikum                                     | Tautan                                                                         |
| --- | --------------------------------------------- | ------------------------------------------------------------------------------ |
| 4   | Praktikum 4: Framework Lanjutan (Modul Login) | [KLIK DISINI](#praktikum-4-framework-lanjutan-modul-login--pemrograman-web-2) |
| 5   | Praktikum 5: Pagination dan Pencarian         | [KLIK DISINI](#praktikum-5-pagination-dan-pencarian--pemrograman-web-2)       |
| 6   | Praktikum 6: Upload File Gambar               | [KLIK DISINI](#praktikum-6-upload-file-gambar--pemrograman-web-2)             |

# Praktikum 4: Framework Lanjutan (Modul Login) — Pemrograman Web 2

## 🎯 Tujuan Praktikum

1.  Memahami konsep fundamental autentikasi (Auth) dan filter untuk akses halaman.
2.  Mampu membangun modul login yang fungsional menggunakan CodeIgniter 4.
3.  Mengimplementasikan proteksi halaman berbasis session dan middleware (filter).
4.  Menerapkan hashing password menggunakan `password_hash()` dan verifikasi dengan `password_verify()`.
5.  Membuat form login yang dapat menangani validasi, menampilkan flash message, dan mengarahkan pengguna.

---

## 🛠️ Tools yang Digunakan

-   Visual Studio Code (VSCode)
-   XAMPP (Apache + MySQL)
-   Web Browser (Chrome / Firefox)
-   CodeIgniter 4 (CI4)

---

## ⚙️ Langkah-langkah Praktikum

### 1. Persiapan Proyek

-   Pastikan instalasi CodeIgniter 4 sudah siap dan dapat diakses.
-   Jalankan layanan Apache dan MySQL dari XAMPP.
-   Buka direktori proyek `lab7_php_ci` di VSCode.

---

### 2. Pembuatan Tabel User di Database

Diperlukan sebuah tabel `user` untuk menyimpan informasi kredensial pengguna.

```sql
CREATE TABLE user (
  id INT(11) AUTO_INCREMENT,
  username VARCHAR(200) NOT NULL,
  useremail VARCHAR(200),
  userpassword VARCHAR(200),
  PRIMARY KEY(id)
);
```

![alt text](image.png)

---

### 3. Membuat Model `UserModel.php`

File model ini bertanggung jawab untuk interaksi dengan tabel `user` di database.

**Lokasi:** `app/Models/UserModel.php`

```php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];
}
```

![alt text](image-1.png)

---

### 4. Membuat Controller `User.php`

Controller ini mengelola logika untuk proses login, logout, dan menampilkan daftar pengguna.

**Lokasi:** `app/Controllers/User.php`

```php
<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', compact('users', 'title'));
    }
    public function login()
    {
        helper(['form']);
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if (!$email) {
            return view('user/login');
        }
        $session = session();
        $model = new UserModel();
        $login = $model->where('useremail', $email)->first();
        if ($login) {
            $pass = $login['userpassword'];
            if (password_verify($password, $pass)) {
                $login_data = [
                    'user_id' => $login['id'],
                    'user_name' => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in' => TRUE,
                ];
                $session->set($login_data);
                return redirect('admin/artikel');
            } else {
                $session->setFlashdata("flash_msg", "Password yang Anda masukkan salah.");
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata("flash_msg", "Email tidak ditemukan.");
            return redirect()->to('/user/login');
        }
    }
}
```

![alt text](image-2.png)

---

### 5. Membuat View Login `login.php`

Ini adalah file tampilan (view) untuk form login pengguna.

**Lokasi:** `app/Views/user/login.php`

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>" />
  </head>

  <body>
    <div id="login-wrapper">
      <h1>Sign In</h1>

      <?php if (session()->getFlashdata('flash_msg')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('flash_msg') ?></div>
      <?php endif; ?>

      <form action="" method="post">
        <div class="mb-3">
          <label for="InputForEmail" class="form-label">Alamat Email</label>
          <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>" />
        </div>

        <div class="mb-3">
          <label for="InputForPassword" class="form-label">Kata Sandi</label>
          <input type="password" name="password" class="form-control" id="InputForPassword" />
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </body>
</html>
```

![alt text](image-3.png)

---

### 6. Membuat Seeder `UserSeeder.php`

Seeder berfungsi untuk mengisi data awal (initial data) ke dalam tabel `user`.

**Perintah CLI:**

```bash
php spark make:seeder UserSeeder
```

**Isi file `UserSeeder.php`:**

```php
<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class UserSeeder extends Seeder
{
public function run()
{
$model = model('UserModel');
$model->insert([
'username' => 'admin',
'useremail' => 'admin@email.com',
'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
]);
}
}
```

**Jalankan Seeder:**

```bash
php spark db:seed UserSeeder
```

![alt text](image-4.png)

---

## Uji Coba Login

- Buka URL berikut di browser: http://localhost:8080/user/login
  ![alt text](image-5.png)

### 7. Menambahkan Filter Autentikasi

Filter ini bertujuan untuk memproteksi halaman agar hanya dapat diakses oleh pengguna yang sudah login.

**File:** `app/Filters/Auth.php`

```php
<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
```

**Registrasi Filter di:** `app/Config/Filters.php`

```php
'auth' => \App\Filters\Auth::class
```

![alt text](image-6.png)

---

### 8. Memperbarui Konfigurasi Rute

Edit file `app/Config/Routes.php` untuk menerapkan filter pada rute yang diinginkan.

```php
$routes->get('admin/artikel', 'Admin\Artikel::index', ['filter' => 'auth']);
```

![alt text](image-7.png)

---

### 9. Menambahkan Fungsi Logout

Tambahkan method `logout()` di dalam `UserController`.

```php
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
```


---

## ✅ Pengujian Aplikasi

1.  Buka halaman login: `http://localhost:8080/user/login`
2.  Masuk menggunakan akun yang dibuat oleh Seeder:
    -   Email: `admin@exaple.com`
    -   Password: `admin123`

![alt text](image-8.png)

3.  Jika berhasil, Anda akan diarahkan ke halaman admin.

![alt text](image-9.png)

4.  Coba akses halaman admin tanpa login, maka akan dialihkan kembali ke halaman login.

![alt text](image-10.png)

---

## 📝 Kesimpulan

-   Sistem autentikasi berhasil diimplementasikan menggunakan session dan filter untuk proteksi halaman.
-   Keamanan password dijamin dengan hashing menggunakan `password_hash()`.
-   Struktur MVC pada CodeIgniter 4 mempermudah pembangunan modul login yang terorganisir.

# Praktikum 5: Pagination dan Pencarian — Pemrograman Web 2

## 🎯 Tujuan Praktikum

1.  Memahami konsep dasar Pagination untuk membagi data menjadi beberapa halaman.
2.  Memahami konsep dasar Pencarian untuk menyaring data berdasarkan kata kunci.
3.  Mengimplementasikan fitur Paging dan Pencarian di halaman daftar artikel menggunakan CodeIgniter 4.

---

## 🛠️ Tools yang Digunakan

-   Visual Studio Code (VSCode)
-   XAMPP (Apache + MySQL)
-   Browser (Chrome / Firefox)
-   Framework CodeIgniter 4

---

## ⚙️ Langkah-langkah Praktikum

### 1. Persiapan Proyek

-   Aktifkan Apache dan MySQL dari XAMPP.
-   Buka folder proyek `lab7_php_ci` di VSCode.
-   Pastikan tabel `artikel` sudah terisi beberapa data untuk pengujian.

---

### 2. Implementasi Pagination di Controller

Buka `app/Controllers/Artikel.php`, lalu modifikasi method `admin_index()`:

```php
public function admin_index() {
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();

    $data = [
        'title'   => $title,
        'artikel' => $model->paginate(10), // Menampilkan 10 artikel per halaman
        'pager'   => $model->pager,
    ];

    return view('artikel/admin_index', $data);
}
```
![alt text](image-11.png)

---

### 3. Menampilkan Navigasi Pagination di View

Buka file `app/Views/artikel/admin_index.php`, lalu tambahkan kode berikut di bawah tabel:

```php
<?= $pager->links(); ?>
```

Kode ini akan secara otomatis menghasilkan link navigasi halaman.


---

### 4. Menambahkan Fungsionalitas Pencarian

Di method `admin_index()` yang sama, tambahkan logika untuk menangani query pencarian:

```php
public function admin_index() {
    $title = 'Daftar Artikel';
    $q = $this->request->getVar('q') ?? '';
    $model = new ArtikelModel();

    if ($q) {
        $artikel = $model->like('judul', $q);
    } else {
        $artikel = $model;
    }

    $data = [
        'title'   => $title,
        'q'       => $q,
        'artikel' => $artikel->paginate(10),
        'pager'   => $model->pager,
    ];

    return view('artikel/admin_index', $data);
}
```

![alt text](image-12.png)
---

### 5. Menambahkan Form Pencarian di View

Sisipkan form pencarian ini di atas tabel artikel:

```php
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari berdasarkan judul...">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>
```

---

### 6. Menyesuaikan Link Pagination dengan Parameter Pencarian

Agar pagination tetap berfungsi saat ada query pencarian, modifikasi link pager menjadi:

```php
<?= $pager->only(['q'])->links(); ?>
```

## 📝 Kesimpulan

-   Fitur paginasi dan pencarian berhasil diimplementasikan untuk meningkatkan pengalaman pengguna (UX) dalam menavigasi data.
-   Metode `paginate()` dan `like()` dari CodeIgniter 4 terbukti sangat efisien untuk mengelola data dalam jumlah besar.
-   Kombinasi kedua fitur ini dapat bekerja secara sinergis dengan penyesuaian minimal pada view dan controller.

---

# Praktikum 6: Upload File Gambar — Pemrograman Web 2

## 🎯 Tujuan Praktikum

1.  Memahami alur dasar proses unggah file/gambar dalam aplikasi web.
2.  Mampu mengimplementasikan fitur unggah gambar ke direktori server dengan CodeIgniter 4.
3.  Mampu menyimpan referensi nama file ke database untuk ditampilkan kembali.

---

## 🛠️ Tools yang Digunakan

-   Visual Studio Code (VSCode)
-   XAMPP (Apache + MySQL)
-   Browser (Chrome / Firefox)
-   Framework CodeIgniter 4

---

## ⚙️ Langkah-langkah Praktikum

### 1. Persiapan Proyek

-   Jalankan layanan Apache & MySQL.
-   Buka direktori proyek `lab7_php_ci` di VSCode.
-   Pastikan fungsionalitas tambah artikel dari praktikum sebelumnya sudah berjalan lancar.

---

### 2. Modifikasi Controller untuk Menangani Upload

Buka file `app/Controllers/Artikel.php`, lalu perbarui method `add()`:

```php
public function add()
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules(['judul' => 'required']);
    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid)
    {
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved())
        {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/gambar', $newName);
        }

        $artikel = new ArtikelModel();
        $artikel->insert([
            'judul'  => $this->request->getPost('judul'),
            'isi'    => $this->request->getPost('isi'),
            'slug'   => url_title($this->request->getPost('judul'), '-', TRUE),
            'gambar' => $newName ?? null, // Simpan nama file baru
        ]);

        return redirect('admin/artikel');
    }

    $title = "Buat Artikel Baru";
    return view('artikel/form_add', compact('title'));
}
```


---

### 3. Modifikasi Form Tambah Artikel

Buka file `app/Views/artikel/form_add.php` dan lakukan perubahan berikut:

#### ✅ Tambahkan Input untuk File:

```html
<p>
  <label>Gambar</label>
  <input type="file" name="gambar" />
</p>
```

#### ✅ Ubah Tag Form untuk Upload File:

Pastikan tag form memiliki atribut `enctype`.

```html
<form action="" method="post" enctype="multipart/form-data">
```


---

### 4. Uji Coba Fitur Upload

-   Buka halaman `Tambah Artikel` pada panel admin.
-   Lengkapi judul, isi artikel, dan pilih sebuah gambar dari perangkat Anda.
-   Klik tombol submit.
    ![alt text](image-13.png)


-   Jika berhasil, gambar akan terunggah ke direktori `public/gambar/` dan informasinya tersimpan di database.

---

## ✅ Hasil yang Diharapkan

-   File gambar berhasil diunggah dan disimpan di dalam direktori `public/gambar`.
-   Nama unik dari file gambar tercatat pada kolom `gambar` di tabel `artikel`.
-   Gambar dapat diakses dan ditampilkan menggunakan URL seperti `base_url('gambar/nama_file_acak.jpg')`.

---

## 📝 Kesimpulan

-   Fitur upload gambar berhasil diimplementasikan menggunakan helper file bawaan CodeIgniter 4.
-   Prosesnya mencakup validasi, pemindahan file ke direktori `public`, dan penyimpanan nama file unik ke database.
-   Penggunaan `enctype="multipart/form-data"` pada form adalah kunci utama agar fungsionalitas upload berjalan.
