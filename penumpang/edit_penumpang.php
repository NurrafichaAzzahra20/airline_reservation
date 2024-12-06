<?php
// Menyertakan file koneksi ke database
include("../koneksi.php");

// Mengambil nilai parameter 'penumpang_id' dari URL
$id = $_GET['penumpang_id'];

// Melakukan query untuk mengambil data penumpang berdasarkan penumpang_id
$query = $db->query("SELECT * FROM penumpang WHERE penumpang_id = '$id'");
$penumpang = $query->fetch_assoc(); // Mengambil hasil query dalam bentuk array asosiatif
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Penumpang</title>
</head>
<body>
    <h3>Edit Penumpang</h3>

    <!-- Form untuk mengedit data penumpang -->
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="id" value="<?php echo $penumpang['penumpang_id']; ?>">
           <!-- Tabel untuk pengaturan input form -->
          <table border="0"> 
            <tr>
                <!-- Label untuk input nama -->
                <td>Nama</td>
                <!-- Input untuk nama penumpang -->
                <td>
                  <input type="text" name="nama"
                   value="<?php echo $penumpang['nama']; ?>" required>
                </td>
               </tr>
               <tr>
                <!-- Label untuk input email -->
                <td>Email</td>
                <!-- Input untuk email penumpang -->
                <td>
                  <input type="email" name="email"
                   value="<?php echo $penumpang['email']; ?>" required>
                </td>
               </tr>
            </table>
            <!-- Tombol untuk menyimpan perubahan -->
            <button type="sumbit" name="simpan">Simpan</button>
          </form>
</body>
</html>