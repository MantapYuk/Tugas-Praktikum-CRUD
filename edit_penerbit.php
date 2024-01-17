<?php
// koneksi database
include 'koneksi.php';
// menangkap data yang di kirim dari form
$id_penerbit = $_POST['id_penerbit'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telpon = $_POST['telpon'];

// update data ke database
mysqli_query($koneksi,"update tabel_penerbit set nama='$nama',
alamat='$alamat', kota='$kota', telpon='$telpon' where id_penerbit='$id_penerbit'");
// mengalihkan halaman kembali ke index.php
header("location:Pengadaan.php");

?>