<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<fieldset >
    <!--Judul pada fieldset-->
    <legend align="center">Toko Buku Wildan Khoirul Fikri</legend>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="admin.php">Admin</a>
        <a href="pengadaan.php">Pengadaan</a>
    </div>
    <h3 align="center">Selamat Datang Di toko saya</h3>
    <center><h1>Pencarian Buku</h1></center>
   <center><a href="tambah_form.html">Tambah Data</a></center>
    <br>
    <div class="cari">
    <form method="GET" action="index.php">
    <label>Kata Pencarian : </label>
    <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo
    $_GET['kata_cari']; } ?>" />
    <button type="submit">Cari</button>
    </div>
    <table class="table-home">
        <thead class="dalam">
            <tr>
            <th>ID_Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
            <th colspan="2">Aksi/Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //untuk meinclude kan koneksi
            include 'koneksi.php';
            //jika kita klik cari, maka yang tampil query cari ini
            if(isset($_GET['kata_cari'])) {
            //menampung variabel kata_cari dari form pencarian
            $kata_cari = $_GET['kata_cari'];
            $query = "SELECT * FROM tabel_buku WHERE id_buku like '%".$kata_cari."%' OR
            nama_buku like '%".$kata_cari."%' OR
            kategori like '%".$kata_cari."%' ORDER BY id_buku ASC";
            } else {
            //jika tidak ada pencarian, default yang dijalankan query ini
            $query = "SELECT * FROM tabel_buku ORDER BY id_buku ASC";
            }
            $result = mysqli_query($koneksi, $query);
            if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr align="center">
                    <td><?php echo $row['id_buku']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['nama_buku']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['penerbit']; ?></td>
                    <!--Tambahan untuk opsi edit dan hapus-->
                    <td>
                        <a href="edit_form.php?id_buku=<?php echo $row['id_buku']; ?>">EDIT</a>
                        <a href="delete.php?id_buku=<?php echo $row['id_buku']; ?>">HAPUS</a>
                    </td>
                </tr>
    
        <?php
        }
        ?>
    </tbody>
    </table>
    </fieldset>
    </body>
    </html>