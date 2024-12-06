<?php
// Memulai sesi untuk menggunakan fitur session
session_start();
// Menyertakan file koneksi ke database
include("../koneksi.php");

// Mengecek apakah parameter 'penumpang_id' ada dalam URL
if (isset($_GET['penumpang_id'])) {
    // Menyimpan nilai 'penumpang_id' dari URL ke dalam variabel $id
    $id = $_GET['penumpang_id'];

     // Sanitasi input untuk mencegah SQL Injection
    $id = mysqli_real_escape_string($db, $id);

      // Membuat query SQL untuk menghapus data berdasarkan 'penumpang_id'
    $sql = "DELETE FROM penumpang WHERE penumpang_id='$id'";
    $query = mysqli_query($db, $sql); // Menjalankan query

      // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, simpan notifikasi keberhasilan ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang berhasil ditambahkan!";
    } else {
        // Jika gagal, simpan notifikasi kegagalan ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang gagal ditambahkan!";
    }

    // Mengalihkan pengguna kembali ke halaman index.php
    header('Location: index.php');
    exit(); // Menghentikan eksekusi untuk mencegah kode setelah ini dijalankan
} else {
    // Jika parameter 'penumpang_id' tidak ada, hentikan eksekusi dan tampilkan pesan
    die("Akses ditolak...");
}
?>