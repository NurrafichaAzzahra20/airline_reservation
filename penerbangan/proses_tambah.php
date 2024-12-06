<?php

session_start(); // Memulai sesi
//Menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
/* Mengambil nilai dari form input
    dan menyimpannya ke dalam variabel */
$penerbangan_id = $_POST['penerbangan_id']; // ID penerbangan yang dimasukkan
$kota_asal = $_POST['kota_asal']; // Kota Asal yang dimasukkan
$kota_tujuan = $_POST['kota_tujuan']; // Kota Tujuan yang dimasukkan
$jam_keberangkatan = $_POST['jam_keberangkatan']; // Jam Keberangkatan yang dimasukkan
    
/* Menyusun query SQL untuk menambahkan data 
ke tabel 'penerbangan' */
$sql = "INSERT INTO penerbangan
(penerbangan_id, kota_asal, kota_tujuan, jam_keberangkatan) 
VALUES ('$penerbangan_id', '$kota_asal', '$kota_tujuan', '$jam_keberangkatan')";

// Menjalankan query dan menyimpan hasilnya dalam variabel $query
$query = mysqli_query($db, $sql);

// Mengecek hasil query dan menyimpan pesan di session
if ($query) {
     // Jika query berhasil, simpan pesan sukses ke dalam session
    $_SESSION['notifikasi'] = "Data penerbangan berhasil ditambahkan!";
} else{
     // Jika query gagal, simpan pesan gagal ke dalam session
    $_SESSION['notifikasi'] = "Data penerbangan gagal ditambahkan!";
}
// Mengalihkan pengguna ke halaman index.php
header('Location: index.php');
} else{
    // Jika halaman ini diakses tanpa tombol 'simpan' ditekan, tampilkan pesan error
    die("Akses ditolak...");
}
?>