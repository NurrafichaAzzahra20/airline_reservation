<!DOCTYPE html>
<html>
<head>
    <title> penumpang </title>
</head>
<body>
    <h3> Tambah Penumpang</h3>
    <!-- Form untuk menambahkan data penumpang -->
    <form action="proses_tambah.php" method="POST">
         <!-- Membuat tabel untuk tata letak form input -->
        <table border="0">
            <tr>
                <!-- Label dan input untuk Nama -->
                <td>Nama</td>
                 <!-- Input tipe teks untuk nama penumpang, wajib diisi -->
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <!-- Label dan input untuk Email -->
                <td>Email</td>
                <!-- Input tipe teks untuk email penumpang, wajib diisi -->
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
        </table>
        <!-- Tombol untuk mengirimkan form -->
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>