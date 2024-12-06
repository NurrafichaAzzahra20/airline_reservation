<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // Memulai sesi
?>

<!DOCTYPE html>
<html>
<head>
   <title>Data Penerbangan</title>
<style>

/* Styling untuk tabel dan elemennya */
table, th, td {
  border: 1px solid black; /* Menambahkan garis pada tabel, header, dan data */
  border-collapse: collapse; /* Menggabungkan garis tabel menjadi satu */
  padding: 10px; /* Menambahkan jarak dalam sel */
} 
</style>
</head>
<body>
  <!-- Navigasi untuk berpindah antar halaman data -->
  <div>
    <ul>
      <li><a href="../penerbangan/index.php">Data Penerbangan</a></li>
      <li><a href="../penumpang/index.php">Data Penumpang</a></li>
    <ul>
  </div>

  <h2>Data Penerbangan</h2>
 <!-- Menampilkan notifikasi jika ada pesan dalam session -->
 <?php if (isset($_SESSION['notifikasi'])): ?>
  <p><?php echo $_SESSION['notifikasi']; ?></p>
 <!-- Menghapus notifikasi setelah ditampilkan -->
  <?php unset($_SESSION['notifikasi']); ?>
 <?php endif; ?>

  <!-- Tabel untuk menampilkan data penumpang -->
 <table>
  <thead>
    <tr align="center">
      <th>#</th>
      <th>Kota Asal</th>
      <th>Kota Tujuan</th>
      <th>Jam keberangkatan</th>
      <th><a href="tambah_penerbangan.php">Tambah Data</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1; // Nomor urut untuk tabel
    // Query untuk mengambil semua data dari tabel penerbangan
    $query = $db->query("SELECT * FROM penerbangan");
    // Iterasi data hasil query menggunakan fetch_assoc()
    while ($penerbangan = $query->fetch_assoc()){
    ?> 
    <!-- Untuk menampilkan -->
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $penerbangan['kota_asal'] ?></td>
      <td><?php echo $penerbangan['kota_tujuan'] ?></td>
      <td><?php echo $penerbangan['jam_keberangkatan'] ?></td>
      <td align="center">
         <!-- URL untuk mengedit data penerbangan -->
         <a href="edit_penerbangan.php?penerbangan_id=<?php echo $penerbangan ['penerbangan_id'] ?>">Edit</a> 
         <!-- URL untuk menghapus data penerbangan dengan konfirmasi -->
         <a onclick="return confirm('Anda yakin ingin menghapus data?')"
         href="hapus_penerbangan.php?penerbangan_id=<?php echo $penerbangan ['penerbangan_id'] ?>">Hapus</a>
       </td>
     </tr>
     <?php
     } 
     ?>
   </tbody>
 </table>
 <!-- Menampilkan total jumlah data pada tabel penumpang -->
 <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>