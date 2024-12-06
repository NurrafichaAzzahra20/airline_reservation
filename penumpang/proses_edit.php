<?php

// Memulai sesi untuk menggunakan fitur session
session_start();
include("../koneksi.php"); // Menghubungkan file koneksi database

// Periksa apakah tombol 'simpan' pada form ditekan
if(isset($_POST['simpan'])) {
   // Ambil data yang dikirim melalui form
    $penumpang_id = $_POST['penumpang_id']; // ID penumpang yang akan diperbarui
    $nama = $_POST['nama']; // Nama baru
    $email = $_POST['email']; // Nama baru

    // Query SQL untuk memperbarui data penumpang berdasarkan ID
    $sql = "UPDATE penumpang SET
      nama= '$nama',
      email= '$email'
      WHERE penumpang_id=$penumpang_id"; /* Tentukan ID penumpang yang diperbarui */
      
     // Jalankan query pada database
    $query = mysqli_query($db, $sql);

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, simpan notifikasi keberhasilan ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang berhasil diperbarui!";
    } else {
        // Jika gagal, simpan notifikasi kegagalan ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang gagal diperbarui!";
    }

    // Redirect ke halaman index.php
    header('Location: index.php');
    exit(); // Menghentikan eksekusi kode setelah redirect
} else {
     // Jika halaman diakses tanpa tombol 'simpan' ditekan, tampilkan pesan error
    die("Akses ditolak...");
}
?>