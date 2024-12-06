<!DOCTYPE html>
<html>
<head>
    <title> penerbangan </title>
</head>
<body>
    <h3> Tambah Penerbangan</h3>
     <!-- Form untuk menambahkan data penerbangan -->
    <form action="proses_tambah.php" method="POST">
        <!-- Membuat tabel untuk tata letak form input -->
        <table border="0">
            <tr>
                <!-- Membuat tabel untuk tata letak form input -->
                <td>Kota Asal</td>
                <!-- Input tipe teks untuk kota asal penerbangan, wajib diisi -->
                <td><input type="text" name="kota_asal" required></td>
            </tr>
            <tr>
                <!-- Label dan input untuk Kota Tujuan -->
                <td>Kota Tujuan</td>
                <!-- Input tipe teks untuk kota tujuan penerbangan, wajib diisi -->
                <td><input type="text" name="kota_tujuan" required></td>
            </tr>
            <tr>
                <!-- Label dan input untuk Jam keberangkatan -->
                <td>jam keberangkatan</td>
                <!-- Input tipe teks untuk kota tujuan penerbangan, wajib diisi -->
                <td><input type="time" name="jam_keberangkatan" required></td>
            </tr>
        </table>
        <!-- Tombol untuk mengirimkan form -->
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>