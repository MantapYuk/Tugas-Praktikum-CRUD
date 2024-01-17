<?php
    include "koneksi.php";
    // menangkap data yang di kirim dari form
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit= $_POST['penerbit'];
    // menginput data ke database
    $query = "INSERT INTO tabel_buku VALUES ('$id_buku','$kategori','$nama_buku','$harga','$stok','$penerbit')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
    echo "<script>alert('Buku berhasil ditambahkan');location='admin.php';</script>";
    }
?>