<?php
// Memulai sesi untuk menggunakan fitur session
session_start();
include("../koneksi.php"); // Menyertakan file koneksi ke database

// Mengecek apakah parameter 'penerbangan_id' ada dalam URL
if (isset($_GET['penerbangan_id'])) {
    // Menyimpan nilai 'penerbangan_id' dari URL ke dalam variabel $id
    $id = $_GET['penerbangan_id'];

    // Sanitasi input untuk mencegah SQL Injection
    $id = mysqli_real_escape_string($db, $id);

    // Membuat query SQL untuk menghapus data berdasarkan 'penerbangan_id'
    $sql = "DELETE FROM penerbangan WHERE penerbangan_id = $id";
    $query = mysqli_query($db, $sql); // Menjalankan query

    // Mengecek apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, simpan notifikasi keberhasilan ke dalam session
        $_SESSION['notifikasi'] = "Data penerbangan berhasil dihapus!";
    } else {
        // Jika gagal, simpan notifikasi kegagalan ke dalam session
        $_SESSION['notifikasi'] = "Data penerbangan gagal dihapus!";
    }

     // Mengalihkan pengguna kembali ke halaman index.php
    header('Location: index.php');
    exit(); // Menghentikan eksekusi untuk mencegah kode setelah ini dijalankan
} else { 
    // Jika parameter 'penerbangan_id' tidak ada, hentikan eksekusi dan tampilkan pesan
    die("Akses ditolak...");
}
?>