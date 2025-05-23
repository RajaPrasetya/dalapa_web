# Dalapa Web

DALAPA Web adalah sistem manajemen tiket gangguan dan work order yang memungkinkan teknisi dan admin untuk mengelola penanganan masalah teknis.

## Fitur Aplikasi

### Sistem Autentikasi
- **Login** - Autentikasi untuk Admin dan Teknisi

### Pengelolaan Tiket Gangguan
- **Buat Tiket Gangguan** - Membuat dan mencatat tiket gangguan baru
- **Lihat Tiket Gangguan** - Melihat detail dan status tiket gangguan
- **Update Tiket Gangguan** - Mengubah informasi dan memperbarui status tiket
- **Hapus Tiket Gangguan** - Menghapus tiket dari sistem jika diperlukan

### Pengelolaan Work Order
- **Buat Work Order** - Membuat dan mencatat work order baru
- **Lihat Work Order** - Melihat detail dan status work order
- **Update Work Order** - Mengubah informasi dan memperbarui status work order
- **Hapus Work Order** - Menghapus work order dari sistem jika diperlukan
- **Upload Foto**  - Mengunggah dokumentasi visual pekerjaan
- **Tutup Work Order**  - Menyelesaikan dan menutup work order

### Pengelolaan Material
- **Tambah Material** - Menambahkan material baru ke inventaris
- **Lihat Material** - Melihat detail dan jumlah stok material
- **Update Material** - Mengubah informasi dan memperbarui jumlah stok material
- **Hapus Material** - Menghapus material dari sistem jika diperlukan
- **Kelola Stok** - Mencatat penggunaan dan penambahan stok material


## Requirements

- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM

## Installation

1. Clone the repository
    ```bash
    git clone <repository-url>
    cd dalapa_web
    ```

2. Install Composer dependencies
    ```bash
    composer install
    ```

3. Install NPM dependencies
    ```bash
    npm install
    ```

4. Create a copy of your .env file
    ```bash
    cp .env.example .env
    ```

5. Generate an app encryption key
    ```bash
    php artisan key:generate
    ```

6. Create an empty database for the application

7. Configure your database in the .env file
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dalapa_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

8. Migrate the database
    ```bash
    php artisan migrate
    ```

9. Seed the database
    ```bash
    php artisan db:seed
    ```

## Running the Application

Start the development server:

```bash
composer run dev
```

You can now access the application at http://localhost:8000
