<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // mulai sesi
?>

<!DOCTYPE html>
<html>
<head>
   <title>Data Penumpang</title>
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

  <h2>Data Penumpang</h2>
 <!-- Menampilkan Notifikasi Jika Ada -->
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
      <th>Nama</th>
      <th>Email</th>
      <th><a href="tambah_penumpang.php">Tambah Data</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1; // Nomor urut untuk tabel
    // Query untuk mengambil semua data dari tabel penumpang
    $query = $db->query("SELECT * FROM penumpang");
     // Iterasi data hasil query menggunakan fetch_assoc()
    while ($penumpang = $query->fetch_assoc()){
    ?> 
    <!-- Untuk menampilkan -->
    <tr>
      <td><?php echo $no++ ?></td> 
      <td><?php echo $penumpang['nama'] ?></td>  
      <td><?php echo $penumpang['email'] ?></td> 
      <td align="center">
         <!-- URL ke halaman edit data penumpang -->
         <a href="edit_penumpang.php?penumpang_id=<?php echo $penumpang ['penumpang_id'] ?>">Edit</a> 
         <!-- URL untuk menghapus data penumpang dengan konfirmasi -->
         <a onclick="return confirm('Anda yakin ingin menghapus data?')"
         href="hapus_penumpang.php?penumpang_id=<?php echo $penumpang['penumpang_id'] ?>">Hapus</a>
       </td>
     </tr>
     <?php
     } 
     ?>
   </tbody>
 </table>
 <!-- Menghitung jumlah baris yang ada pada table (penumpang) -->
 <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>