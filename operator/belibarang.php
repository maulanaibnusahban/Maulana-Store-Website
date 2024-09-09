<?php
session_start();
$nama = $_COOKIE['nama'];
$hal = $_COOKIE['hal'];

include "koneksi.php";
$pembeli = $_POST['pembeli'];
$beli = $_POST['beli'];

// echo $pembeli."beli barang".$barang."dengan harga ".$harga."beli".$beli;
$sql = "SELECT * FROM tblbarang WHERE nama_barang='$nama'";

$hasil = $koneksi->query($sql);
$row = $hasil->fetch_assoc();
$stock = $row['stock'];
$harga = $row['harga'];

echo $sisa = $stock - $beli;
echo $hargaTotal = $harga*$beli;

$update ="UPDATE tblbarang SET stock='$sisa' WHERE nama_barang='$nama'";
$sql2 = "INSERT INTO `tblpembeli` (`nama_pembeli`, `barang_dibeli`, `jumlah`, `jumlah_harga`) VALUES ('$pembeli', '$nama', '$beli','$hargaTotal')";
$hasil = $koneksi -> query($update);
$hasil = $koneksi -> query($sql2);
header("Location:../website/tampilkan.php?hal=".$hal);




?>