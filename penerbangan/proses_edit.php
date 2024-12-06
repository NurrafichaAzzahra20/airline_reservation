<?php

// Memulai sesi untuk menggunakan fitur session
session_start();
include("../koneksi.php"); // Menghubungkan file koneksi database

// Periksa apakah tombol 'simpan' pada form telah ditekan
if(isset($_POST['simpan'])){
    // Ambil data yang dikirim melalui form
    $penerbangan_id = $_POST['id']; // ID penerbangan yang akan diperbarui
    $kota_asal = $_POST['kota_asal']; // Kota Asal baru
    $kota_tujuan = $_POST['kota_tujuan']; // Kota Tujuan baru
    $jam_keberangkatan = $_POST['jam_keberangkatan']; // Jam Keberangkatan

    // Query SQL untuk memperbarui data penumpang berdasarkan ID
    $sql = "UPDATE penerbangan SET 
      kota_asal= '$kota_asal',
      kota_tujuan= '$kota_tujuan',
      jam_keberangkatan= '$jam_keberangkatan'
      WHERE penerbangan_id='$penerbangan_id'"; /* Tentukan ID penerbangan yang diperbarui */

    // Jalankan query pada database
    $query = mysqli_query($db, $sql);

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Jika berhasil, simpan notifikasi keberhasilan ke dalam session
        $_SESSION['notifikasi'] = "Data penerbangan berhasil diperbarui!";
    } else {
        // Jika gagal, simpan notifikasi kegagalan ke dalam session
        $_SESSION['notifikasi'] = "Data penerbangan gagal diperbarui!";
    }

    // Redirect ke halaman index.php
    header('Location: index.php');
    exit(); // Menghentikan eksekusi kode setelah redirect
} else {
    // Jika halaman diakses tanpa tombol 'simpan' ditekan, tampilkan pesan error
    die("Akses ditolak...");
}
?>