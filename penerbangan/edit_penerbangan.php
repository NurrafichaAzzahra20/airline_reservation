<?php
// Menyertakan file koneksi ke database
include("../koneksi.php");

// Mengambil nilai parameter 'penerbangan_id' dari URL
$id = $_GET['penerbangan_id'];

// Melakukan query untuk mengambil data penerbangan berdasarkan penerbangan_id
$query = $db->query("SELECT * FROM penerbangan WHERE penerbangan_id = '$id'");
$penerbangan = $query->fetch_assoc(); // Mengambil hasil query dalam bentuk array asosiatif
?>
<!DOCTYPE html>
<html>
<head>  
    <title>Edit Penerbangan</title>
</head>
<body>
    <h3>Edit Penerbangan</h3>
    <!-- Form untuk mengedit data penerbangan -->
    <form action="proses_edit.php" method="POST">
        <!-- Menyembunyikan input ID untuk keperluan pemrosesan di server -->
        <input type="hidden" name="id" value="<?php echo $penerbangan['penerbangan_id']; ?>">
        <!-- Tabel untuk pengaturan input form -->
        <table border="0">
            <tr>
                <!-- Label untuk input kota_asal -->
                <td>Kota Asal</td>
                <!-- Input untuk kota asal -->
                <td>
                    <input type="text" name="kota_asal" value="<?php echo $penerbangan['kota_asal']; ?>" required>
                </td>
            </tr>
            <tr>
                <!-- Label untuk input kota_tujuan -->
                <td>Kota Tujuan</td>
                <!-- Input untuk kota tujuan  -->
                <td>
                    <input type="text" name="kota_tujuan" value="<?php echo $penerbangan['kota_tujuan']; ?>" required>
                </td>
            </tr>
            <tr>
                <!-- Label untuk input jam_keberangkatan -->
                <td>Jam Keberangkatan</td>
                <!-- Input untuk kota jam keberangkatan -->
                <td>
                    <input type="time" name="jam_keberangkatan" value="<?php echo $penerbangan_id['jam_keberangkatan']; ?>" required>
                </td>
            </tr>
        </table>
         <!-- Tombol untuk menyimpan perubahan -->
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>