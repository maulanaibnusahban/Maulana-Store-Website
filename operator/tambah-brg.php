<?php 

session_start();
include '../operator/koneksi.php';
$barang = $_POST['barang'];
$stock = $_POST['stock'];
$harga = $_POST['harga'];

$sql = "INSERT INTO `tblbarang` (`nama_barang`, `stock`, `harga`) VALUES ('$barang', '$stock', '$harga')";
$koneksi->query($sql);

header("Location: ../website/tampilkan.php?hal=edit");

?>