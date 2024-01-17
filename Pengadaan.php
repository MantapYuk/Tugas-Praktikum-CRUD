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
    <center><h1>Pengadaan</h1></center>
   <center><a href="tambah_penerbit.html">Tambah Data</a></center>
    <br>
    <div class="cari">
    <form method="GET" action="Pengadaan.php">
    <label>Kata Pencarian : </label>
    <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo
    $_GET['kata_cari']; } ?>" />
    <button type="submit">Cari</button>
    </div>
    <table class="table-home">
        <thead class="dalam">
            <tr>
            <th>ID Penerbit</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
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
            $query = "SELECT * FROM tabel_penerbit WHERE id_penerbit like '%".$kata_cari."%' OR
            nama like '%".$kata_cari."%' OR
            telpon like '%".$kata_cari."%' ORDER BY id_penerbit ASC";
            } else {
            //jika tidak ada pencarian, default yang dijalankan query ini
            $query = "SELECT * FROM tabel_penerbit ORDER BY id_penerbit ASC";
            }
            $result = mysqli_query($koneksi, $query);
            if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr align="center">
                    <td><?php echo $row['id_penerbit']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['kota']; ?></td>
                    <td><?php echo $row['telpon']; ?></td>
                    <!--Tambahan untuk opsi edit dan hapus-->
                    <td>
                        <a href="edit_form1.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">EDIT</a>
                        <a href="delete_penerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">HAPUS</a>
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