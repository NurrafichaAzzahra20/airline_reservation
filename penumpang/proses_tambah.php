<?php

session_start(); // Memulai sesi
// Menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari form input
   dan menyimpannya ke dalam variabel */
    $penumpang_id = $_POST['penumpang_id']; // ID penumpang yang dimasukkan
    $nama = $_POST['nama']; // Nama penumpang yang dimasukkan
    $email= $_POST['email']; // Email penumpang yang dimasukkan

    /* Menyusun query SQL untuk menambahkan data
    ke table 'penumpang' */
    $sql = "INSERT INTO penumpang
      (penumpang_id, nama, email)
      VALUES ('$penumpang_id', '$nama', '$email')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

     // Mengecek hasil query dan menyimpan pesan di session
    if ($query) {
        // Jika query berhasil, simpan pesan sukses ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang berhasil ditambahkan!";
    } else {
        // Jika query gagal, simpan pesan gagal ke dalam session
        $_SESSION['notifikasi'] = "Data penumpang gagal ditambahkan!";
    }

    // Mengalihkan pengguna ke halaman index.php
    header('Location: index.php');
} else {
      // Jika halaman ini diakses tanpa tombol 'simpan' ditekan, tampilkan pesan error
    die("Akses ditolak...");
}
?>